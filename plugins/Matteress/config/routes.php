<?php
use Cake\Routing\RouteBuilder;
use Cake\Routing\Router;

Router::plugin(
    'Matteress',
    ['path' => '/matteress'],
    function (RouteBuilder $routes) {
        $routes->fallbacks('DashedRoute');
    }
);
