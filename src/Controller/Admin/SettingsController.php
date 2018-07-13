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

class SettingsController extends AppController
{

    public function index()
    {

    }

    public function update(){
        $this->autoRender = false;
        $this->modelClass = false;

        if($this->request->is('post')){
            $siteName = $this->request->data('sitename');
            $currency_unit = $this->request->data('currency');
            $settings = [
                'SiteName' => $siteName,
                'currency' => $currency_unit
            ];

            if($this->Settings->updateSettings($settings)){
                $this->Flash->success('Successfully Updates Settings');
                $this->redirect(['action' => 'index']);
            }
        }
    }

}