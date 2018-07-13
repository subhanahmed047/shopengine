<?php
use Cake\Routing\RouteBuilder;
use Cake\Routing\Router;

Router::prefix('admin', ['_namePrefix' => 'admin:'], function ($routes) {
    $routes->scope('/users', ['plugin' => 'IncUsers', 'controller' => 'Users', '_namePrefix' => 'users:'], function ($routes) {
        $routes->connect('/', ['action' => 'index'], ['_name' => 'index']);
        $routes->connect('/add', ['action' => 'add'], ['_name' => 'add']);
        $routes->connect('/edit/:id', ['action' => 'edit'], ['pass' => ['id'], 'id' => '[[:xdigit:]-]+', '_name' => 'edit']);
        $routes->connect('/profile/:id', ['action' => 'view'], ['pass' => ['id'], 'id' => '[[:xdigit:]-]+', '_name' => 'profile']);
        $routes->fallbacks('DashedRoute');
    });
});

Router::scope('/', ['plugin' => 'IncUsers', 'controller' => 'Users', '_namePrefix' => 'users:'], function ($routes) {
    $routes->connect('/login', ['action' => 'login'], ['_name' => 'login']);
    $routes->connect('/logout', ['action' => 'logout'], ['_name' => 'logout']);
    $routes->connect('/register', ['action' => 'add'], ['_name' => 'register']);
    $routes->connect('/reset', ['action' => 'reset'], ['_name' => 'reset']);
    $routes->fallbacks('DashedRoute');
});

