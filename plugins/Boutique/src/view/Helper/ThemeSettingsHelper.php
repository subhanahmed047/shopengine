<?php
namespace Boutique\View\Helper;

use Cake\View\Helper;

class ThemeSettingsHelper extends Helper
{
    private $settings_json;

    public function initialize(array $config){
        $this->settings_json = ROOT.DS."plugins".DS.$this->request->params['plugin'].DS."settings.json";
    }

    private function readSettings(){
        return json_decode(file_get_contents($this->settings_json), true);
    }

    public function getLogo(){
        return $this->readSettings()["logo"];
    }
}

?>
