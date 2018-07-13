<?php
namespace Settings\View\Helper;

use Cake\View\Helper;

class SettingsHelper extends Helper
{
    private $settings_json;

    public function initialize(array $config)
    {
        $this->settings_json = ROOT . DS . "plugins" . DS . "Settings" . DS . "config" . DS . "site.json";
    }

    private function readSettings()
    {
        return json_decode(file_get_contents($this->settings_json), true);
    }

    public function getSiteName()
    {
        return $this->readSettings()["SiteName"];
    }

    public function getCurrencyUnit(){
        return $this->readSettings()["currency"];
    }
}

?>
