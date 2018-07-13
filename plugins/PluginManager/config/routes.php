<?php
use Cake\Routing\Router;

Router::plugin(
    'PluginManager',
    ['path' => '/plugin-manager'],
    function ($routes) {
        $routes->fallbacks('DashedRoute');
    }
);
