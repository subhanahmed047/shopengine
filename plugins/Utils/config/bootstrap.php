<?php
/**
 * Created by PhpStorm.
 * User: Subhan Ahmed
 * Date: 5/14/2016
 * Time: 2:16 PM
 */
use Cake\Routing\Router;
use App\Utility\AdminMenus\AdminMenus;

AdminMenus::addMenuItem('util', 'Utilities', Router::url(['controller' => 'pages', 'action' => 'index']), 'fa fa-home');
