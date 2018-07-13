<?php

namespace Uploader\Controller\Component;

use Cake\Controller\Component;
use Cake\Filesystem\Folder;
use Cake\Filesystem\File;
use Cake\Core\Exception\Exception;

class UploaderComponent extends Component
{

    public function get_upload_dir($path = array())
    {
        return ROOT.DS. $path[0];
    }

    public function upload_file_to_dir($path = array(), $fileToUpload = null)
    {
        if (!isset($fileToUpload)) {
            throw new Exception("Path is undefined");
        }

        $dir = new Folder($this->get_upload_dir($path), true, 755);
        $tmp_file = new File($fileToUpload['tmp_name']);
       /* if (!$tmp_file->exists()) {
            return false;
        }*/
        $file = new File($dir->path . DS . $fileToUpload['name']);
        if (!$tmp_file->copy($dir->pwd() . DS . $fileToUpload['name'])) {
            return false;
        }
        $file->close();
        $tmp_file->delete();
        return true;
    }

}

?>