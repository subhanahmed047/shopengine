<?php

use Cake\Routing\Router;
use App\Event\UserListener;
use Cake\Event\EventManager;

use App\Utility\AdminMenus\AdminMenus;

//EventManager::instance()->on(new UserListener());

AdminMenus::addMenuItem('users', 'Users', Router::url(['controller' => 'Users', 'action' => 'index']), 'fa fa-users');
