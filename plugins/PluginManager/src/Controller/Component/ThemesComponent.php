<?php

namespace PluginManager\Controller\Component;

use Cake\Controller\Component;
use Symfony\Component\Config\Definition\Exception\Exception;

/**
 * User: Subhan Ahmed
 * Date: 5/29/2016
 * Time: 7:21 PMddd
 */
class ThemesComponent extends Component
{

    private $themesJson;

    public function initialize(array $config){
        $this->themesJson = ROOT . DS . 'plugins' . DS . 'settings' . DS . 'config' . DS . 'themes.json';
    }
    /*
    * Get all Themes
    * */
    public function all_themes()
    {
        return json_decode(file_get_contents($this->themesJson), true)['themes'];
    }

    /*
    * Get Active Themes
    * */
    public function active_theme()
    {
        return json_decode(file_get_contents($this->themesJson), true)['active_theme'];
    }

    public function get_theme($name)
    {
        if(!isset($name)){
            throw new Exception('Name not defined');
        }
        $all_themes = $this->all_themes();
        $required_theme = [];
        foreach ($all_themes as $theme) {
            if (strcasecmp($theme['name'], $name) == 0) {
                $required_theme = $theme;
            }
        }
        if (empty($required_theme)) {
            return false;
        }
        return $required_theme;
    }

    public function activate_theme($name)
    {
        if (strcasecmp($name, $this->active_theme()['name']) == 0) {
            throw new Exception("Theme is already activated");
        }
        $theme = $this->get_theme($name);

        $themes = json_decode(file_get_contents($this->themesJson), true);
        $themes['active_theme'] = $theme;

        if(file_put_contents($this->themesJson, json_encode($themes))){
            return true;
        }
        return false;
    }


}