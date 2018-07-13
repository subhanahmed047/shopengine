<?php
use Cake\Routing\RouteBuilder;
use Cake\Routing\Router;

Router::plugin(
    'AdminTheme',
    ['path' => '/admin-theme'],
    function (RouteBuilder $routes) {
        $routes->fallbacks('DashedRoute');
    }
);
