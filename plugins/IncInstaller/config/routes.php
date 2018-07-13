<?php
use Cake\Routing\Router;

Router::scope('/install', ['plugin' => 'IncInstaller', 'controller' => 'Install', '_namePrefix' => 'install:'], function ($routes) {
    $routes->connect('/', ['action' => 'index'], ['_name' => 'index']);
    $routes->fallbacks('DashedRoute');
});
