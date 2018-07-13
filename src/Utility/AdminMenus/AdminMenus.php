<?php

namespace App\Utility\AdminMenus;

/**
 * Created by PhpStorm.
 * User: Subhan Ahmed
 * Date: 5/8/2016
 * Time: 6:55 PM
 */
class AdminMenus
{

    private static $menus = [];


    public static function getAdminMenuStructure()
    {
        return self::$menus;
    }

    public static function addMenuItem($item_id, $title, $url, $icon = '')
    {
        $menu_item = [
            "id" => $item_id,
            "title" => $title,
            "url" => $url,
            "children" => [],
            "parent" => null,
            "icon" => $icon
        ];
        array_push(self::$menus, $menu_item);
        return self::getAdminMenuStructure();
    }

    public static function addChild($item_id, $title, $url, $parent_id, &$array = null)
    {
        if ($array === null) {
            $array = &static::$menus;
        }

        $child = [
            "id" => $item_id,
            "title" => $title,
            "url" => $url,
            "children" => [],
            "parent" => $parent_id
        ];
        foreach ($array as $key => &$value) {
            if (is_array($value)) {
                static::addChild($item_id, $title, $url, $parent_id, $value);
            }
            if ($key == "id" && $value == $parent_id) {
                array_push($array["children"], $child);
            }
        }
    }

    private static function getMenuItem($item_id, $menus)
    {
        foreach ($menus as $menu) {
            if (strcasecmp($item_id, $menu["id"]) != 0) {
                if (!empty($menu["children"])) {
                    return self::getMenuItem($item_id, $menu["children"]);
                }
            } else {
                return $menu;
            }
        }
    }


    public static function buildMenu($menu = null)
    {
        if (!isset($menu)) {
            $menu = static::$menus;
        }
        foreach ($menu as $menu_item) {
            if (!isset($menu_item['parent'])) {
                if(!empty($menu_item['children'])){
                    $menu_item['url'] = "javascript:void(0)";
                }
                echo '<li><a href=" '. $menu_item['url'] .' "><i class="'.$menu_item["icon"].'"></i>' . $menu_item['title'] . '</a>';
                if (!empty($menu_item['children'])) {
                    echo "<ul class='nav child_menu' style='display: none'>";
                       foreach($menu_item['children'] as $child_item){
                           echo "<li><a href=" . $child_item['url'] . ">". $child_item['title'] . "</a></li>";
                           if(!empty($child_item['children'])){
                               return self::buildMenu($child_item['children']);
                           }
                       }
                    echo "</ul>";
                }
                echo "</li>";
            }
        }
    }
}

/*public static function buildMenu($array = null)
{
    if (!isset($array)) {
        $array = static::$menus;
    }
    foreach ($array as $item) {
        if(isset($item['parent'])){ // it means its a sub child
            echo "<ul class='nav child_menu' style='display: none'>";
            foreach ($item as $menuItem) {
                echo "<li><a href=" . $item['url'] . "><i class='fa fa-home'></i>" . $item['title'] . "</a></li>";
            }
            echo "</ul>";
        }
        else{
            echo "<li><a href=" . $item['url'] . "><i class='fa fa-home'></i>" . $item['title'] . "</a>";
        }
        if(!empty($item['children'])){
            return self::buildMenu($item['children']);
        }
        echo "</li>";
    }
}*/
