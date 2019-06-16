<?php
/**
 * Routes configuration
 *
 * In this file, you set up routes to your controllers and their actions.
 * Routes are very important mechanism that allows you to freely connect
 * different URLs to chosen controllers and their actions (functions).
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

use Cake\Core\Plugin;
use Cake\Routing\RouteBuilder;
use Cake\Routing\Router;

use Cake\Datasource\ConnectionManager;

/**
 * The default class to use for all routes
 *
 * The following route classes are supplied with CakePHP and are appropriate
 * to set as the default:
 *
 * - Route
 * - InflectedRoute
 * - DashedRoute
 *
 * If no call is made to `Router::defaultRouteClass()`, the class used is
 * `Route` (`Cake\Routing\Route\Route`)
 *
 * Note that `Route` does not do any inflections on URLs which will result in
 * inconsistently cased URLs when used with `:plugin`, `:controller` and
 * `:action` markers.
 *
 */


Router::defaultRouteClass('DashedRoute');

/*Router::prefix('admin', function ($routes) {
    // All routes here wil be prefixed with `/admin`
    // And have the prefix => admin route element added.
    $routes->connect('/', ['controller' => 'Admin', 'action' => 'index']);
    $routes->fallbacks('DashedRoute');
});*/
/*
    Router::scope('/install', ['plugin' => 'IncInstaller', 'controller' => 'Install', '_namePrefix' => 'install:'], function ($routes) {
        $routes->connect('/', ['action' => 'index'], ['_name' => 'index']);
        $routes->fallbacks('DashedRoute');
    });*/

// $datasource_json = ROOT . DS . "plugins" . DS . "Settings" . DS . "config" . DS . "datasource.json";
// $content = json_decode(file_get_contents($datasource_json), true);


Router::prefix('admin', ['_namePrefix' => 'admin:'], function ($routes) {
    /*
        if (empty($content)) {
            $routes->redirect('/*', ['plugin' => 'IncInstaller', 'controller' => 'install', 'action' => 'index', 'prefix' => null]);
        }*/

    $routes->connect('/', ['controller' => 'admin', 'action' => 'index'], ['_name' => 'dashboard']);

    $routes->scope('/menus', ['controller' => 'Menus', '_namePrefix' => 'menus:'], function (RouteBuilder $routes) {
        $routes->connect('/', ['action' => 'index'], ['_name' => 'index']);
        $routes->connect('/add', ['action' => 'add'], ['_name' => 'add']);
        $routes->connect('/edit/:id', ['action' => 'edit'], ['pass' => ['id'], 'id' => '[[:xdigit:]-]+', '_name' => 'edit']);
    });
    $routes->scope('/pages', ['controller' => 'Pages ', '_namePrefix' => 'pages:'], function (RouteBuilder $routes) {
        $routes->connect('/', ['action' => 'index'], ['_name' => 'index']);
        $routes->connect('/add', ['action' => 'add'], ['_name' => 'add']);
        $routes->connect('/edit/:id', ['action' => 'edit'], ['pass' => ['id'], 'id' => '[[:xdigit:]-]+', '_name' => 'edit']);
    });

    $routes->scope('/products', ['controller' => 'Products', '_namePrefix' => 'products:'], function (RouteBuilder $routes) {
        $routes->connect('/', ['action' => 'index'], ['_name' => 'index']);
        $routes->connect('/add', ['action' => 'add'], ['_name' => 'add']);
        $routes->connect('/edit/:id', ['action' => 'edit'], ['pass' => ['id'], 'id' => '[[:xdigit:]-]+', '_name' => 'edit']);
    });

    $routes->connect('/:controller', ['action' => 'index'], ['routeClass' => 'DashedRoute']);
    $routes->connect('/:controller/:action/*', [], ['routeClass' => 'DashedRoute']);
});

Router::scope('/', function (RouteBuilder $routes) {
    /*if (empty($content)) {
        $routes->redirect('/*', ['plugin' => 'IncInstaller', 'controller' => 'install', 'action' => 'index']);
    }*/
    //$routes->redirect('/*', ['plugin' => 'IncInstaller', 'controller' => 'install', 'action' => 'index']);
    //debug($content);
    //$password = empty($content['password'])?'':':'.$content['password'];
    //$dsn = 'mysql:'.DS.DS.$content['username'].$password.'@'.$content['host'].DS.$content['database'];
    //debug($dsn);
    /*ConnectionManager::config('install', [
        'className' => 'Cake\Database\Connection',
        'driver' => 'Cake\Database\Driver\Mysql',
        'persistent' => false,
        'host' => 'localhost',
        'username' => 'root',
        'password' => '',
        'database' => 'cp3_clothes',
        'encoding' => 'utf8',
        'timezone' => 'UTC',
        'cacheMetadata' => true,
    ]);
    $connection = ConnectionManager::get('install');
    $isConnected = false;
    try{
        $isConnected = $connection->connect();
    } catch(\Cake\Core\Exception\Exception $e){
        $isConnected = false;
    }
    debug($isConnected);
    die;*/

    /*if (empty($datasource)) {
        $routes->redirect('/*', ['plugin' => 'IncInstaller', 'controller' => 'install', 'action' => 'index']);
    }*/

    /**
     * Here, we are connecting '/' (base path) to a controller called 'Home',
     * its action called 'display', and we pass a param to select the view file
     * to use (in this case, src/Template/Home/home.ctp)...
     */
    $routes->connect('/', ['controller' => 'Home', 'action' => 'index'], ['_name' => 'shop']);

    $routes->connect('/catalog', ['controller' => 'Products', 'action' => 'index']);
    $routes->connect('/product/:id', ['controller' => 'Products', 'action' => 'view'], ['pass' => ['id'], 'id' => '[[:xdigit:]-]+']);

    $routes->connect('/pages', ['controller' => 'Pages', 'action' => 'index']);
    $routes->connect('page/:id', ['controller' => 'Pages', 'action' => 'view'], ['pass' => ['id'], 'id' => '[[:xdigit:]-]+']);


    $routes->connect('/checkout', ['controller' => 'Orders', 'action' => 'add']);
    /**
     * ...and connect the rest of 'Home' controller's URLs.
     */
    //$routes->connect('/pages/*', ['controller' => 'Home', 'action' => 'display']);

    /**
     * Connect catchall routes for all controllers.
     *
     * Using the argument `DashedRoute`, the `fallbacks` method is a shortcut for
     *    `$routes->connect('/:controller', ['action' => 'index'], ['routeClass' => 'DashedRoute']);`
     *    `$routes->connect('/:controller/:action/*', [], ['routeClass' => 'DashedRoute']);`
     *
     * Any route class can be used with this method, such as:
     * - DashedRoute
     * - InflectedRoute
     * - Route
     * - Or your own route class
     *
     * You can remove these routes once you've connected the
     * routes you want in your application.
     */
    $routes->fallbacks('DashedRoute');
});
/**
 * Load all plugin routes.  See the Plugin documentation on
 * how to customize the loading of plugin routes.
 */
Plugin::routes();

