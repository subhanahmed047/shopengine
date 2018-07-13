<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 6/8/2016
 * Time: 12:48 PM
 */

namespace App\Controller\Admin;

use App\Controller\AppController;
use Cake\Core\Exception\Exception;
use Cake\Event\Event;
use Cake\Routing\Route;

class PluginsController extends AppController
{

    public function index()
    {
        $this->set('plugins', $this->Plugins->all_plugins());
        $this->set('active_plugins', $this->Plugins->active_plugins());
        $this->set('active_plugin_names', $this->Plugins->active_plugin_names());
    }

    public function activatePlugin($name)
    {
        $this->autoRender = false;
        $this->request->allowMethod('ajax');

        $status = false;
        if($this->Plugins->activate_plugin($name)){
            $status = true;
        }
        echo $status;
    }

    public function deactivatePlugin($name)
    {
        $this->autoRender = false;
        $this->request->allowMethod('ajax');

        $status = false;
        if($this->Plugins->deactivate_plugin($name)){
            $status = true;
        }
        echo $status;
    }

    public function test($name){
        $this->autoRender = false;
        $this->Plugins->deactivate_plugin($name);
        //$this->Plugins->activate_plugin($name);
    }
}