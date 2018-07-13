<?php

namespace Settings\Controller\Component;

use Cake\Controller\Component;
use Cake\Core\Exception\Exception;


class SettingsComponent extends Component
{
    private $settingsJson;

    public function initialize(array $config)
    {
        $this->settingsJson = ROOT . DS . 'plugins' . DS . 'settings' . DS . 'config' . DS . 'site.json';
    }

    private function readSettings()
    {
        return json_decode(file_get_contents($this->settings_json), true);
    }

    private function writeSettings($settings){
        return file_put_contents($this->settingsJson, json_encode($settings));
    }

    public function setSiteName($name){
        $settings = $this->readSettings();
        $settings['SiteName'] = $name;
        return $this->writeSettings($settings);
    }

    public function updateSettings($settings){
        return $this->writeSettings($settings);
    }
}