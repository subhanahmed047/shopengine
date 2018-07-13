<?php
use Cake\Routing\RouteBuilder;
use Cake\Routing\Router;

Router::plugin(
    'SiteTheme',
    ['path' => '/site-theme'],
    function (RouteBuilder $routes) {
        $routes->fallbacks('DashedRoute');
    }
);
