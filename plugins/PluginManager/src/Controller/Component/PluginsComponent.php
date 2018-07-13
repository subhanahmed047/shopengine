<?php

namespace PluginManager\Controller\Component;

use Cake\Controller\Component;
use Cake\Core\Exception\Exception;


class PluginsComponent extends Component
{
    private $pluginsJson;

    public function initialize(array $config)
    {
        $this->pluginsJson = ROOT . DS . 'plugins' . DS . 'settings' . DS . 'config' . DS . 'plugins.json';
    }

    /*
    * Get all plugins
    * */
    public function all_plugins()
    {
        return json_decode(file_get_contents($this->pluginsJson), true)['plugins'];
    }

    /*
    * Get Active plugins`
    * */
    public function active_plugins()
    {
        return json_decode(file_get_contents($this->pluginsJson), true)['active_plugins'];
    }

    public function active_plugin_names()
    {
        $names = [];
        $active_plugins = json_decode(file_get_contents($this->pluginsJson), true)['active_plugins'];
        foreach ($active_plugins as $active_plugin) {
            array_push($names, $active_plugin['name']);
        }
        return $names;
    }

    public function get_plugin($name)
    {
        if (!isset($name)) {
            throw new Exception('Name not defined');
        }
        $all_plugins = $this->all_plugins();
        $required_plugin = [];
        foreach ($all_plugins as $plugin) {
            if (strcasecmp($plugin['name'], $name) == 0) {
                $required_plugin = $plugin;
            }
        }
        if (empty($required_plugin)) {
            return false;
        }
        return $required_plugin;
    }

    public function activate_plugin($name)
    {
        $plugin_to_activate = $this->get_plugin($name);

        $plugins = json_decode(file_get_contents($this->pluginsJson), true);
        array_push($plugins['active_plugins'], $plugin_to_activate);

        if (file_put_contents($this->pluginsJson, json_encode($plugins))) {
            return true;
        }
        return false;
    }

    public function deactivate_plugin($name)
    {
        $active_plugins = $this->active_plugins();
        $all_plugins = json_decode(file_get_contents($this->pluginsJson), true);
        debug($all_plugins);
        $plugin = $this->get_plugin($name);
        debug($plugin);
        foreach ($active_plugins as $key => $active_plugin) {
            if ($active_plugin['name'] == $plugin['name']) {
                unset($active_plugins[$key]);
            }
        }
        $all_plugins['active_plugins'] = $active_plugins;
        debug($active_plugins);
        if (file_put_contents($this->pluginsJson, json_encode($all_plugins))) {
            return true;
        }
        return false;
    }

}
