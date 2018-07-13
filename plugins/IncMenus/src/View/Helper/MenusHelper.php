<?php

namespace IncMenus\View\Helper;

use Cake\View\Helper;
use Cake\View\StringTemplateTrait;

/**
 * Class MenusHelper
 * @package IncMenus\View\Helper
 */
class MenusHelper extends Helper
{

    use StringTemplateTrait;

    protected $_defaultConfig = [
        'templates' => [
            'label' => '<label for="{{for}}">{{content}}</label>',
        ],
    ];

    public function initialize(array $config)
    {
        parent::initialize($config);
    }

    /**
     * @param $menu
     * @param array $options
     * @param null $parent
     */
    public function buildMenu($menu, $options = [], $parent = null)
    {
        // default options array: Standard
        $default_options = [
            'ul_class' => '',
            'nested_ul_class' => '',
            'ul_id' => '',
            'nested_ul_id' => '',
            'li_class' => '',
            'nested_li_class' => '',
            'li_id' => '',
            'nested_li_id' => '',
            'a_class' => '',
            'a_id' => '',
            'opening_html_tags' => '',
            'closing_html_tags' => ''
        ];
        //if options array is empty then use default array otherwise replace options in default options.
        empty($options) ? $options = $default_options : $options = array_merge($default_options, $options);

        //checking for ul class, whether it is nested or not. And assigning class.
        $parent == null ? $ul_class = $options['ul_class'] : $ul_class = $options['nested_ul_class'];

        //checking for ul id, whether it is nested or not. And assigning id.
        $parent == null ? $ul_id = $options['ul_id'] : $ul_id = $options['nested_ul_id'];

        //throwing defined html tags if ul is nested
        if ($ul_class == $options['nested_ul_class']) {
            echo "$options[opening_html_tags]";
        }

        //echo ul and set class based on previous checks (nested or not)
        echo "<ul class='" . $ul_class . "' id = '" . $ul_id . "'>";
        foreach ($menu as $item) {

            // setting class for li
            $li_class = $options['nested_li_class'];
            if ($ul_class == $options['ul_class']) {
                $li_class = $options['li_class'];
            }

            //setting id for li

            $li_id = $options['nested_li_id'];
            if ($ul_class == $options['ul_class'] || $ul_id == $options['ul_id']) {
                $li_id = $options['li_id'];
            }

            echo "<li class='" . $li_class . "' id='" . $li_id . "'>" . "<a class='" . $options['a_class'] . "'  id='" . $options['a_id'] . "'href='" . $item['url'] . "'>" . $item['title'] . "</a>";
            if (!empty($item['children'])) {
                $this->buildMenu($item['children'], $options, $item['id']); // here is the recursion
            }
            echo "</li>";
        }
        echo "</ul>";

        //throwing closing tags if nested ul is present
        if ($ul_class == $options['nested_ul_class']) {
            echo "$options[closing_html_tags]";
        }
    }
}

?>
