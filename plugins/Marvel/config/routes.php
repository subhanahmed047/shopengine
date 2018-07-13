<?php
use Cake\Routing\RouteBuilder;
use Cake\Routing\Router;

Router::plugin(
    'Marvel',
    ['path' => '/marvel'],
    function (RouteBuilder $routes) {
        $routes->fallbacks('DashedRoute');
    }
);
