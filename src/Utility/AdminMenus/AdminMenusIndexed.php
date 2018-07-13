<?php

namespace App\Utility\AdminMenus;

/**
 * Created by PhpStorm.
 * User: Subhan Ahmed
 * Date: 5/8/2016
 * Time: 6:55 PM
 */
class AdminMenusIndexed
{

    private static $menus = [];

    public static function addAdminMenuItem($item_id, $title, $slug, $parent = null){
        $menu_item = [
            "id" => $item_id,
            "title" => $title,
            "slug" => $slug,
            "children" => [],
            "parent" => $parent
        ];

        $item = self::getMenuItem($item_id, self::$menus);
        if(isset($item)){
            throw new Exception("Menu Item Id: $item_id already exists.");
        } else{
            array_push(self::$menus, $menu_item);
        }

        return self::getAdminMenuStructure();
    }

    public static function addChildToItem($item_id, $child_id, $title, $slug, $menus){
        $child= [
            "id" => $child_id,
            "title" => $title,
            "slug" => $slug,
            "children" => [],
            "parent" => $item_id
        ];

        $parent_item = self::getMenuItem($item_id,$menus);
        array_push($parent_item["children"], $child);
        debug(self::getParentArray($parent_item, $menus));

    }

    public static function getParentArray($children, $menus){
        $parent_id = $children["parent"];
        if(isset($parent_id)){
            $extdChildren = $children;
            $children = self::getMenuItem($parent_id, $menus);
            array_push($children["children"], $extdChildren);
            return self::getParentArray($children, $menus);
        } else{
            return $children;
        }
    }


    public static function getAdminMenuStructure(){
        return self::$menus;
    }

    public static function getMenuItem($item_id, $menus){
        foreach ($menus as $menu) {
            if(strcasecmp($item_id, $menu["id"]) != 0){
                if(!empty($menu["children"])){
                    return self::getMenuItem($item_id, $menu["children"]);
                }
            }
            else{
                return $menu;
            }
        }
    }
}
