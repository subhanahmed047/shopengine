<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 6/8/2016
 * Time: 12:48 PM
 */

namespace App\Controller\Admin;

use App\Controller\AppController;
use Cake\Core\Exception\Exception;
use Cake\Event\Event;
use Cake\Routing\Route;

class PagesController extends AppController
{

    public function index()
    {
        $nodes = $this->Nodes->find('ByType',['node_type' => 'page'])->contain([
            'Apps', 'Categories'
        ]);

        $nodes = $this->paginate($nodes);
        $this->set(compact('nodes'));
        $this->set('_serialize', ['nodes']);

    }
    public function view($id){

        $nodes = $this->Nodes->get($id, [
            'contain' => ['Apps', 'Categories']
        ]);

        $this->set('node', $nodes);
        $this->set('_serialize', ['node']);
    }

    public function add($cat_id = 0)
    {
        if($cat_id != 0){
            throw new Exception('No such Category. Invalid attempt');
        }

        $node = $this->Nodes->newEntity();
        if ($this->request->is('post')) {
            $this->request->data['apps_id'] = 1;
            $this->request->data['categories_id'] = 0;
            $this->request->data['node_type'] = 'page';
            $node = $this->Nodes->patchEntity($node, $this->request->data);
            if ($this->Nodes->save($node)) {
                $this->Flash->success(__('The Page has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The page could not be saved. Please, try again.'));
            }
        }

        $apps = $this->Nodes->Apps->find('list', ['limit' => 200]);

        $fields = $this->getDefaultFields();

        $this->set(compact('node', 'apps', 'fields', 'cat_id'));
        $this->set('_serialize', ['node']);

    }

    public function edit($id = null, $cat_id = 0)
    {
        if($cat_id != 0){
            throw new Exception('No such Category. Invalid attempt');
        }
        $node = $this->Nodes->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $this->request->data['apps_id'] = 1;
            $node = $this->Nodes->patchEntity($node, $this->request->data);
            if ($this->Nodes->save($node)) {
                $this->Flash->success(__('The page has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The page could not be saved. Please, try again.'));
            }
        }
        $apps = $this->Nodes->Apps->find('list', ['limit' => 200]);
        $categories = $this->Nodes->Categories->find('list')->first();

        $fields = $this->getDefaultFields();

        $this->set(compact('node', 'apps', 'categories','fields'));
        $this->set('_serialize', ['node']);
    }

    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $node = $this->Nodes->get($id);
        if ($this->Nodes->delete($node)) {
            $this->Flash->success(__('The page has been deleted.'));
        } else {
            $this->Flash->error(__('The page could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }

    private function getDefaultFields()
    {
        $fields = $this->Nodes->schema()->columns();

        $default_fields_array = [];
        $no_display_fields_array = ['price','quantity','thumb','image','node_type','categories_id','parent_id'];

        foreach ($fields as $field) {
            if(!in_array(strtolower($field), $no_display_fields_array)) {
                if (strpos($field, 'ud_') === false) {
                    array_push($default_fields_array, $field);
                }
            }
        }
        return $default_fields_array;
    }
    public function beforeFilter(Event $event)
    {
        $this->loadModel('Nodes');
        parent::beforeFilter($event);
    }

}