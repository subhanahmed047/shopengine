<?php
namespace App\Controller\Admin;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;
use Cake\Routing\Router;
use Cake\Utility\Inflector;

/**
 * MenuItems Controller
 *
 * @property \App\Model\Table\MenuItemsTable $MenuItems
 */
class MenuItemsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['ParentMenuItems', 'Menus']
        ];
        $menuItems = $this->paginate($this->MenuItems);

        $this->set(compact('menuItems'));
        $this->set('_serialize', ['menuItems']);
    }

    /**
     * View method
     *
     * @param string|null $id Menu Item id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $menuItem = $this->MenuItems->get($id, [
            'contain' => ['ParentMenuItems', 'Menus', 'ChildMenuItems']
        ]);

        $this->set('menuItem', $menuItem);
        $this->set('_serialize', ['menuItem']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $menuItem = $this->MenuItems->newEntity();
        if ($this->request->is('post')) {
            $url = explode(',', $this->request->data['url']);

            if ($url[2] == 'home') {
                $this->request->data['url'] = Router::url(['prefix' => false, 'controller' => 'Home', 'action' => 'index']);
            } else {
                $controller = Inflector::pluralize($url[0]);
                $action = $url[1];
                if ($url[2] == "all") {
                    $id = null;
                    $action = 'index';
                } else {
                    $id = $url[2];
                }
                $this->request->data['url'] = Router::url(['prefix' => false, 'controller' => $controller, 'action' => $action, $id]);
            }
            $menuItem = $this->MenuItems->patchEntity($menuItem, $this->request->data);
            if ($this->MenuItems->save($menuItem)) {
                $this->Flash->success(__('The menu item has been saved.'));
                return $this->redirect(['controller' => 'Menus', 'action' => 'index']);
            } else {
                $this->Flash->error(__('The menu item could not be saved. Please, try again.'));
            }
        }

        /* Get All note types */
        $nodes_table = TableRegistry::get('nodes');
        $node_types = $nodes_table->find('NodeTypes');
        $nodes = [];
        foreach ($node_types as $node_type) {
            $nodes[ucfirst($node_type['node_type'])] = ucfirst($node_type['node_type']);
        }
        $node_types = $nodes;

        $pages_array = $nodes_table->find('Pages');
        $pages = [];
        //$pages['pages'] = 'pages';
        foreach ($pages_array as $page) {
            $pages[$page['id']] = ucfirst($page['title']);
        }

        /**/
        /* Get all Categories*/
        $categories_table = TableRegistry::get('categories');
        $category_names = $categories_table->find('CategoriesNames');
        $categories = [];
        $categories['all'] = 'All Products';
        foreach ($category_names as $category) {
            $categories[$category['id']] = ucfirst($category['name']);
        }
        //debug($categories);
        /**/
        $parentMenuItems = $this->MenuItems->ParentMenuItems->find('list', ['limit' => 200]);
        $menus = $this->MenuItems->Menus->find('list', ['limit' => 200]);
        $this->set(compact('menuItem', 'parentMenuItems', 'menus', 'node_types', 'categories', 'pages'));
        $this->set('_serialize', ['menuItem']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Menu Item id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $menuItem = $this->MenuItems->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $menuItem = $this->MenuItems->patchEntity($menuItem, $this->request->data);
            if ($this->MenuItems->save($menuItem)) {
                $this->Flash->success(__('The menu item has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The menu item could not be saved. Please, try again.'));
            }
        }
        $parentMenuItems = $this->MenuItems->ParentMenuItems->find('list', ['limit' => 200]);
        $menus = $this->MenuItems->Menus->find('list', ['limit' => 200]);
        $this->set(compact('menuItem', 'parentMenuItems', 'menus'));
        $this->set('_serialize', ['menuItem']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Menu Item id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $menuItem = $this->MenuItems->get($id);
        if ($this->MenuItems->delete($menuItem)) {
            $this->Flash->success(__('The menu item has been deleted.'));
        } else {
            $this->Flash->error(__('The menu item could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }

    public function test()
    {
        $this->autoRender = false;

        /*$node = $this->MenuItems->get(2);
        echo $this->MenuItems->childCount($node);*/

        $children = $this->MenuItems
            ->find('treeList', [
                'keyPath' => 'id',
                'valuePath' => 'title',
                'spacer' => '_'
            ])->toArray();


        debug($children);

        $children = $this->MenuItems
            ->find('all', ['for' => 2])
            ->find('threaded')
            ->toArray();

        debug($children);

        // Breadcrumbs
        /*$nodeId = 5;
        $crumbs = $this->MenuItems->find('path', ['for' => $nodeId]);

        foreach ($crumbs as $crumb) {
            echo $crumb->title . ' > ';
        }*/
        die;
    }
}
