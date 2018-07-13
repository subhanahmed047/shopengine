<?php
use Cake\Routing\RouteBuilder;
use Cake\Routing\Router;

Router::plugin(
    'Settings',
    ['path' => '/settings'],
    function (RouteBuilder $routes) {
        $routes->fallbacks('DashedRoute');
    }
);
