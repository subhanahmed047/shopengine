<?php

namespace Boutique\Controller\Admin;

use Boutique\Controller\AppController;

class SettingsController extends AppController
{

    public function index(){
        $this->autoRender = false;
        debug($this->ThemeSettings->getLogo());
    }

}