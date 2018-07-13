<?php
use Cake\Routing\Router;

Router::plugin(
    'Utils',
    ['path' => '/utils'],
    function ($routes) {
        $routes->fallbacks('DashedRoute');
    }
);
