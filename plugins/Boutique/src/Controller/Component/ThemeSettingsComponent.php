<?php

namespace Boutique\Controller\Component;

use Cake\Controller\Component;

class ThemeSettingsComponent extends Component
{

    private $settings_json;

    public function initialize(array $config){
        $this->settings_json = ROOT.DS."plugins".DS.$this->request->params['plugin'].DS."settings.json";
    }

    private function readSettings(){
        return json_decode(file_get_contents($this->settings_json), true);
    }
    private function writeSettings($settings_array){
        return file_put_contents($this->settings_json, json_encode($settings_array));
    }

    public function getLogo(){
        return $this->readSettings()["logo"];
    }

    public function setLogo($src){
        $content = $this->readSettings();
        $content['logo'] = $src;
        $this->writeSettings($content);
    }

}