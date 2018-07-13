<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 5/28/2016
 * Time: 5:21 PM
 */

namespace Uploader\Controller\Admin;

use Cake\Core\Exception\Exception;
use Uploader\Controller\AppController;
use Uploader\Form\InputForm;
use Cake\Filesystem\Folder;
use Cake\Filesystem\File;
use ZipArchive;

class InputController extends AppController
{

    public function input()
    {
        $input = new InputForm();
        /*$admin = $this->request->param('prefix');
        debug($admin);
        die;*/
        if ($this->request->is('post')) {
            $data = $this->request->data;

            if (substr(strtolower(strrchr($data['zip']['name'], '.')), 1) == 'zip') {

                $dir = new Folder($this->uploadDir(['plugins']));
                $dir->create($this->uploadDir(['plugins']) . DS . 'temp');
                $this->uploadFile(['plugins/temp'], $data['zip']);

                /* Extracting zip file in temp folder*/
                $zip = new ZipArchive;
                if ($zip->open($this->uploadDir(['plugins/temp']) . DS . $data['zip']['name']) === TRUE) {
                    $zip->extractTo($this->uploadDir(['plugins/temp']));
                    $zip->close();

                    /* Deleting zip file */
                    unlink($this->uploadDir(['plugins/temp']) . DS . $data['zip']['name']);

                    /* If plugin already exists, the temp dir will be removed along with its content */
                    $directories_in_temp = glob($this->uploadDir(['plugins/temp']) . '/*', GLOB_ONLYDIR);
                    $new_plugin = $this->minimizeDirectoryPaths($directories_in_temp);
                    //$var = $this->uploadDir(['plugins/temp']).DS.$new_plugin[0].DS.'info.json';
                    $path = $this->uploadDir(['plugins/temp']) . DS . $new_plugin[0] . DS . 'info.json';
                    $file = new File($path);
                    $var = '';
                    if ($file->exists()) {
                        $var = file_get_contents($this->uploadDir(['plugins/temp']) . DS . $new_plugin[0] . DS . 'info.json');
                    } else {
                        throw new Exception('Invalid Upload! The uploaded file does not meet the standards.');
                    }
                    $info = json_decode($var, true);
                    foreach ($info as $key => $value) {
                        if ($key == "theme") {
                            $path = ROOT . DS . "plugins" . DS . "Settings" . DS . "config" . DS . "themes.json";
                            $themes = file_get_contents($path);
                            $themes = json_decode($themes, true);
                            array_push($themes['themes'], $info['theme']);
                            $themes = json_encode($themes);
                            file_put_contents($path, $themes);
                            //debug($themes);die;
                        } else if ($key == "plugin") {
                            $path = ROOT . DS . "plugins" . DS . "Settings" . DS . "config" . DS . "plugins.json";
                            $plugins = file_get_contents($path);
                            $plugins = json_decode($plugins, true);
                            array_push($plugins['plugins'], $info['plugin']);
                            $plugins = json_encode($plugins);
                            file_put_contents($path, $plugins);
                            //debug($plugins);die;
                        }
                    }

                    $directories_in_plugins = glob($this->uploadDir(['plugins']) . '/*', GLOB_ONLYDIR);
                    $all_plugins = $this->minimizeDirectoryPaths($directories_in_plugins);
                    $c = array_intersect($new_plugin, $all_plugins);
                    if (count($c) > 0) {
                        $this->deleteDirectory($this->uploadDir(['plugins/temp']));
                        $this->Flash->error('The Plugin (' . $new_plugin[0] . ') is already present.');
                    } else {
                        /* Moving from temp to plugin folder*/
                        $src = $this->uploadDir(['plugins/temp']);
                        $dest = $this->uploadDir(['plugins']);
                        $this->recurse_copy($src, $dest);

                        /* Now deleting temp folder*/
                        $this->deleteDirectory($this->uploadDir(['plugins/temp']));
                        $this->modifyBootstrap($new_plugin[0]);

                        /* to test it echo something and debug it.*/
                        $output = shell_exec('composer dump-autoload');
                        $this->Flash->success('Plugin Successfully Installed');
                    }
                } else {
                    $this->Flash->error('Installation Failed');
                }
            } else {
                $this->Flash->error('Only zip files are acceptable');
            }
        }
        $this->set('input', $input);
    }

    public function uploadImages($path, $data)
    {
        $this->autoRender = false;
        $status = [];
        foreach ($data as $image) {
            $ext = substr(strtolower(strrchr($image['name'], '.')), 1);
            $allow_extensions = ['jpg', 'JPG', 'jpeg', 'JPEG', 'png', 'PNG', 'gif', 'GIF'];
            in_array($ext, $allow_extensions) ? $this->uploadFile([$path], $image) ? $status[] = true : $status[] = false : $status[] = false;
        }
        if (in_array(false, $status)) {
            return false;
        }
        return true;
    }

    public function uploadImage($path, $image)
    {
        $this->autoRender = false;
        $status = false;

        $ext = substr(strtolower(strrchr($image['name'], '.')), 1);
        $allow_extensions = ['jpg', 'JPG', 'jpeg', 'JPEG', 'png', 'PNG', 'gif', 'GIF'];
        in_array($ext, $allow_extensions) ? $this->uploadFile([$path], $image) ? $status = true : $status = false : $status = false;

        if ($status == false) {
            return false;
        }
        return true;
    }

    public function renameImage($file)
    {
        $ext = substr(strtolower(strrchr($file['name'], '.')), 1);
        $newFileName = $this->generateRandomCode($file['name']) . '.' . $ext;
        return $newFileName;
    }

    private function generateRandomCode($fileName)
    {
        return $this->clean(str_shuffle($fileName) . date("Y-m-d-h-i-sa"));
    }

    private function clean($string)
    {
        $string = str_replace('-', '', $string); // Replaces all spaces with hyphens.

        return preg_replace('/[^A-Za-z0-9\-]/', '', $string); // Removes special chars.
    }

    public function uploadDir($path = array())
    {
        return ROOT . DS . $path[0];
    }

    public function uploadFile($path = array(), $fileToUpload = null)
    {
        if (!$fileToUpload) {
            return false;
        }
        $dir = new Folder($this->uploadDir($path), true, 755);
        $tmp_file = new File($fileToUpload['tmp_name']);
        if (!$tmp_file->exists()) {
            return false;
        }
        $file = new File($dir->path . DS . $fileToUpload['name']);
        if (!$tmp_file->copy($dir->pwd() . DS . $fileToUpload['name'])) {
            return false;
        }
        $file->close();
        $tmp_file->delete();
        return true;
    }

    private function minimizeDirectoryPaths($directories)
    {
        $plugins_array = array();
        foreach ($directories as $directory) {
            $link_array = explode('/', $directory);
            $plugins_array[] = end($link_array);
        }
        return $plugins_array;
    }

    private function deleteDirectory($path)
    {
        if (is_dir($path) === true) {
            $files = array_diff(scandir($path), array('.', '..'));
            foreach ($files as $file) {
                $this->deleteDirectory(realpath($path) . '/' . $file);
            }
            return rmdir($path);
        } else if (is_file($path) === true) {
            return unlink($path);
        }
        return false;
    }

    private function recurse_copy($src, $dst)
    {
        $dir = opendir($src);
        @mkdir($dst);
        while (false !== ($file = readdir($dir))) {
            if (($file != '.') && ($file != '..')) {
                if (is_dir($src . '/' . $file)) {
                    $this->recurse_copy($src . '/' . $file, $dst . '/' . $file);
                } else {
                    copy($src . '/' . $file, $dst . '/' . $file);
                }
            }
        }
        closedir($dir);
    }

    private function modifyBootstrap($plugin)
    {
        $bootstrap = new File(ROOT . DS . 'config' . DS . 'bootstrap.php', false);
        $contents = $bootstrap->read();
        if (!preg_match("@\n\s*Plugin::loadAll@", $contents)) {
            $autoload = "'autoload' => true, ";
            $bootstrap->append(sprintf(
                "\nPlugin::load('%s', [%s'bootstrap' => false, 'routes' => true]);\n",
                $plugin,
                $autoload
            ));
        }
    }


}