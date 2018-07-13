<?php

namespace IncMenus\Controller\Component;

use Cake\Controller\Component;
use Cake\ORM\TableRegistry;
use Cake\Core\Exception\Exception;

/**
 * Class MenusComponent
 * @package IncMenus\Controller\Component
 */
class SiteMenusComponent extends Component
{
    /**
     * @param $menu
     * @return array
     */
    public function get_menu_items($menu){
        $menuItemsTable = TableRegistry::get('MenuItems');
        $menu_items = [];
        if(!isset($menu)){
            throw new Exception('Menu is not defined');
        }
        else if(!($menuItemsTable->exists(['menu_id' => $menu]))){
            return $menu_items;
        }

        $menu_items = $menuItemsTable
            ->find('all', ['for' => $menu])
            ->find('threaded')
            ->where(['menu_id' => $menu])
            ->toArray();

        return $menu_items;
    }

    public function set_primary_menu($menu){
        $menus_settingsJson = ROOT.DS.'plugins'.DS.'settings'.DS.'config'.DS.'menus.json';
        $menu_settings = json_decode(file_get_contents($menus_settingsJson), true);
        $menu_settings['primary-menu'] = $menu;
        if(file_put_contents($menus_settingsJson, json_encode($menu_settings))){
            return true;
        }
        return false;
    }

    public function get_primary_menu(){
        $menus_settingsJson = ROOT.DS.'plugins'.DS.'settings'.DS.'config'.DS.'menus.json';
        $menu_settings = json_decode(file_get_contents($menus_settingsJson), true);
        return $menu_settings['primary-menu'];
    }

}
