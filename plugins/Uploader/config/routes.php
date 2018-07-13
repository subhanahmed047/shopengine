<?php
use Cake\Routing\Router;

Router::prefix('admin', ['_namePrefix'=>'admin:'], function ($routes) {
    $routes->scope('/upload', ['plugin'=>'Uploader', 'controller'=> 'Input', '_namePrefix'=>'upload:'], function ($routes) {
        $routes->connect('/plugin/',['action' => 'input'], ['_name' => 'plugin']);
        $routes->fallbacks('DashedRoute');
    });
});
