<?php
use Cake\Routing\RouteBuilder;
use Cake\Routing\Router;

Router::plugin(
    'IncMenus',
    ['path' => '/inc-menus'],
    function (RouteBuilder $routes) {
        $routes->fallbacks('DashedRoute');
    }
);
