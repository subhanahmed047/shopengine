<?php
namespace App\Controller\Admin;

use App\Controller\AppController;
use ZipArchive;
use Cake\Filesystem\Folder;
use App\Form\InputForm;
use Cake\Utility\Security;

class ThemesController extends AppController
{

    public function index()
    {
        $this->set('themes', $this->Themes->all_themes());
        $this->set('active_theme', $this->Themes->active_theme());
        $this->set('salt', Security::salt());
    }

    public function activateTheme($name)
    {
        $this->autoRender = false;
        $this->request->allowMethod('ajax');

        $status = false;
        if($this->Themes->activate_theme($name)){
            $status = true;
        }
        echo $status;
    }

    public function deactivateTheme($name)
    {
        $this->autoRender = false;
        $this->request->allowMethod('ajax');

        $status = false;
        if($this->Themes->deactivate_theme($name)){
            $status = true;
        }
        echo $status;
    }

}
?>