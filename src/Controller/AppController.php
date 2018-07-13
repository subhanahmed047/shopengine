<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link      http://cakephp.org CakePHP(tm) Project
 * @since     0.2.9
 * @license   http://www.opensource.org/licenses/mit-license.php MIT License
 */
namespace App\Controller;

use App\Utility\AdminMenus\AdminMenus;
use Cake\Controller\Controller;
use Cake\Event\Event;
use Cake\Routing\Router;
use Cake\Utility\Security;

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @link http://book.cakephp.org/3.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller
{

    private $site_json;

    public $paginate = [
        // Other keys here.
        'maxLimit' => 10
    ];

    /**
     * Initialization hook method.
     *
     * Use this method to add common initialization code like loading components.
     *
     * e.g. `$this->loadComponent('Security');`
     *
     * @return void
     */
    public function initialize()
    {
        parent::initialize();

        $this->site_json = ROOT . DS . 'plugins' . DS . 'settings' . DS . 'config' . DS . 'site.json';

        $this->loadComponent('RequestHandler');
        $this->loadComponent('Flash');
        $this->loadComponent('UtilPhp');
        $this->loadComponent('PluginManager.Themes');
        $this->loadComponent('PluginManager.Plugins');
        $this->loadComponent('IncMenus.SiteMenus');
        $this->loadComponent('IncCart.Cart');
        $this->loadComponent('Settings.Settings');
        $this->loadComponent('Auth', [
            'loginRedirect' => [
                '_name' => 'admin:dashboard',
            ],
            'logoutRedirect' => [
                '_name' => 'shop'
            ],
            'loginAction' => [
                '_name' => 'users:login'
            ],
            'unauthorizedRedirect' => [
                '_name' => 'shop'
            ],
            'authorize' => 'Controller'
        ]);

        $this->loadComponent('Cookie');
        $this->Cookie->configKey('Cart', [
            'expires' => '10 days'
        ]);
    }

    /**
     * Before render callback.
     *
     * @param \Cake\Event\Event $event The beforeRender event.
     * @return void
     */
    public function beforeRender(Event $event)
    {
        $theme_to_display = null;
        $layout = null;


        /* If not Installed */
        if ($this->request->params['plugin'] === "IncInstaller") {
            $theme_to_display = 'AdminTheme';
            $layout = 'AdminTheme.empty';
        }

        /* For Logon or Register */
        if ($this->request->params['controller'] === "Users" && in_array($this->request->params['action'], ['add', 'login'])) {
            $theme_to_display = 'AdminTheme';
            $this->viewBuilder()->layout('AdminTheme.empty');
        } else if ($this->request->param('prefix') == "admin") { /* For Admin Dashboard */
            $theme_to_display = 'AdminTheme';
        } else { /* For Frontend Website */
            $theme_to_display = $this->Themes->active_theme()['name'];
            if (isset($this->request->params['pass'][0])) {
                $preview_theme = openssl_decrypt($this->request->params['pass'][0], 'aes128', Security::salt(), true, "1234567812345678");
                if (!empty($this->Themes->get_theme($preview_theme))) {
                    $theme_to_display = $preview_theme;
                }
            }
        }

        $this->viewBuilder()->theme($theme_to_display);
        if (isset($layout)) {
            $this->viewBuilder()->layout($layout);
        }


        if (!array_key_exists('_serialize', $this->viewVars) &&
            in_array($this->response->type(), ['application/json', 'application/xml'])
        ) {
            $this->set('_serialize', true);
        }

        if ($this->request->params['plugin'] != "IncInstaller" && $this->request->params['controller'] != "Install") {

            $this->set('authUser', $this->Auth->user());
            $this->setAdminMenuItems();

            // set menu_items for global access
            $this->set('menu_items', $this->SiteMenus->get_menu_items($this->SiteMenus->get_primary_menu()));
            //set currency globally
            $this->set('currency_unit', $this->getCurrency());

            //set cart globally
            $this->set('cart', $this->Cart->getCart());
        }
    }

    public function beforeFilter(Event $event)
    {
    }

    public function isAuthorized($user = null)
    {
        // Any registered user can access public functions
        /*if (empty($this->request->params['prefix'])) {
            return true;
        }

        if (empty($this->request->params['controller'] == 'install')) {
            return true;
        }


        // Only admins can access admin functions
        if ($this->request->params['prefix'] === 'admin') {
            return (bool)($user['role'] === 'admin');
        } else if ($this->request->params['prefix'] !== 'admin') {
            return true;
        }*/

        // Default deny
        return true;
    }


    private function setAdminMenuItems()
    {
        AdminMenus::addMenuItem('home', 'Home', Router::url(['_name' => 'admin:dashboard'], true), 'fa fa-home');

        AdminMenus::addMenuItem('fields', 'Fields', Router::url(['prefix' => 'admin', 'plugin' => false, 'controller' => 'Fields', 'action' => 'index'], true), 'fa fa-database');
        AdminMenus::addChild('all_fields', 'All Fields', Router::url(['plugin' => false, 'controller' => 'Fields', 'action' => 'index']), 'fields');
        AdminMenus::addChild('add_field', 'Add Field', Router::url(['plugin' => false, 'controller' => 'Fields', 'action' => 'add']), 'fields');


        AdminMenus::addMenuItem('pages', 'Pages', Router::url(['plugin' => false, 'controller' => 'Pages', 'action' => 'index'], true), 'fa fa-files-o');
        AdminMenus::addChild('all_pages', 'All Pages', Router::url(['plugin' => false, 'controller' => 'Pages', 'action' => 'index']), 'pages');
        AdminMenus::addChild('add_page', 'Add Page', Router::url(['plugin' => false, 'controller' => 'Pages', 'action' => 'add']), 'pages');


        AdminMenus::addMenuItem('products', 'Products', Router::url(['plugin' => false, 'controller' => 'Products', 'action' => 'index'], true), 'fa fa-shopping-bag');
        AdminMenus::addChild('all_products', 'All Products', Router::url(['plugin' => false, 'controller' => 'Products', 'action' => 'index']), 'products');
        AdminMenus::addChild('add_product', 'Add Product', Router::url(['plugin' => false, 'controller' => 'Products', 'action' => 'add']), 'products');

        AdminMenus::addMenuItem('categories', 'Categories', Router::url(['prefix' => 'admin', 'plugin' => false, 'controller' => 'Categories', 'action' => 'index'], true), 'fa  fa-sitemap');
        AdminMenus::addChild('all_categories', 'All Categories', Router::url(['plugin' => false, 'controller' => 'categories', 'action' => 'index']), 'categories');
        AdminMenus::addChild('addCategory', 'Add Category', Router::url(['plugin' => false, 'controller' => 'categories', 'action' => 'add']), 'categories');


        if ($this->Auth->user('role') && $this->Auth->user('role') === 'admin') {

            AdminMenus::addMenuItem('orders', 'Orders', Router::url(['prefix' => 'admin', 'plugin' => false, 'controller' => 'Orders', 'action' => 'index'], true), 'fa fa-money');

            AdminMenus::addMenuItem('users', 'Users', Router::url(['_name' => 'admin:users:index'], true), 'fa fa-sitemap');
            AdminMenus::addMenuItem('menus', 'Menus', Router::url(['_name' => 'admin:menus:index'], true), 'fa fa-list-ul');
            AdminMenus::addChild('all_menus', 'All Menus', Router::url(['plugin' => false, 'controller' => 'Menus', 'action' => 'index']), 'menus');
            AdminMenus::addChild('menu-items', 'Menu Items', Router::url(['plugin' => false, 'controller' => 'MenuItems', 'action' => 'add']), 'menus');

            AdminMenus::addMenuItem('settings', 'Settings', Router::url(['prefix' => 'admin', 'plugin' => false, 'controller' => 'Settings', 'action' => 'index'], true), 'fa fa-wrench');

        }

        AdminMenus::addMenuItem('plugins', 'Plugins', Router::url(['prefix' => 'admin', 'plugin' => false, 'controller' => 'Plugins', 'action' => 'index'], true), 'fa fa-usb');

        AdminMenus::addMenuItem('themes', 'Themes', Router::url(['prefix' => 'admin', 'plugin' => false, 'controller' => 'Themes', 'action' => 'index'], true), 'fa fa-television');

        $pluginsJson = ROOT.DS.'plugins'.DS.'settings'.DS.'config'.DS.'plugins.json';
        $active_plugins = json_decode(file_get_contents($pluginsJson), true)['active_plugins'];
        foreach ($active_plugins as $active_plugin) {
            if($active_plugin['name'] == "ExportCsv"){
                AdminMenus::addMenuItem('csv', 'CSV', Router::url(['_name'  => 'admin:csv:export'], true), 'fa fa-file');
                AdminMenus::addChild('csvimport', 'Import', Router::url(['_name'  => 'admin:csv:import']), 'csv');
                AdminMenus::addChild('csvemport', 'Export', Router::url(['_name'  => 'admin:csv:export']), 'csv');

            }
        }

    }

    public function getCurrency()
    {
        $currency = json_decode(file_get_contents($this->site_json), true)['currency'];
        return $currency;
    }

}
