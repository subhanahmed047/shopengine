<?php
use Cake\Routing\Router;

/*Router::plugin(
    'ExportCsv',
    ['path' => '/csv'],
    function ($routes) {
        $routes->fallbacks('DashedRoute');
    }
);*/

Router::prefix('admin', ['_namePrefix' => 'admin:'], function ($routes) {
    $routes->scope('/import', ['plugin' => 'ExportCsv', 'controller' => 'Input', '_namePrefix' => 'csv:'], function ($routes) {
        $routes->connect('/', ['action' => 'index'], ['_name' => 'import']);
        $routes->fallbacks('DashedRoute');
    });
    $routes->scope('/export', ['plugin' => 'ExportCsv', 'controller' => 'Csv', '_namePrefix' => 'csv:'], function ($routes) {
        $routes->connect('/', ['action' => 'index'], ['_name' => 'export']);
        $routes->fallbacks('DashedRoute');
    });
});