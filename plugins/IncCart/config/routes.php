<?php
use Cake\Routing\RouteBuilder;
use Cake\Routing\Router;

Router::plugin(
    'IncCart',
    ['path' => '/inc-cart'],
    function (RouteBuilder $routes) {
        $routes->fallbacks('DashedRoute');
    }
);
