<?php
use Cake\Routing\RouteBuilder;
use Cake\Routing\Router;

/*Router::plugin(
    'Boutique',
    ['path' => '/'],
    function (RouteBuilder $routes) {

        $routes->fallbacks('DashedRoute');
    }
);*/

Router::prefix('admin', ['_namePrefix' => 'admin:'], function ($routes) {
    $routes->scope('/settings/theme', ['plugin' => 'Boutique', 'controller' => 'Settings', '_namePrefix' => 'settings:'], function ($routes) {
        $routes->connect('/', ['action' => 'index'], ['_name' => 'index']);
        $routes->fallbacks('DashedRoute');
    });
});