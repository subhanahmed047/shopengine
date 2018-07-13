<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 6/8/2016
 * Time: 12:57 AM
 */

namespace App\Controller\Admin;

use Cake\Event\Event;
use Cake\ORM\TableRegistry;
use Cake\Routing\Route;
use App\Controller\AppController;
use Symfony\Component\Config\Definition\Exception\Exception;
use Uploader\Controller\Admin\InputController;


class ProductsController extends AppController
{

    public function index()
    {
        $nodes = $this->Nodes->find('ByType', ['node_type' => 'product'])->contain([
            'Apps', 'Categories'
        ]);

        $nodes = $this->paginate($nodes);
        $this->set(compact('nodes'));
        $this->set('_serialize', ['nodes']);

    }

    public function view($id)
    {

        $nodes = $this->Nodes->get($id, [
            'contain' => ['Apps', 'Categories']
        ]);

        $this->set('node', $nodes);
        $this->set('_serialize', ['node']);
    }


    public function add($cat_id = 1)
    {
        if ($cat_id == 0) {
            throw new Exception('No such Category. Invalid attempt');
        }

        $node = $this->Nodes->newEntity();
        if ($this->request->is('post')) {
            $this->request->data['apps_id'] = 1;
            $this->request->data['node_type'] = 'product';
            $this->request->data['image_dir'] = 'webroot/img/product_img/';
            if (count($this->request->data['image']) != 0) {

                $input = new InputController();
                for ($i = 0; $i < count($this->request->data['image']); $i++) {
                    $this->request->data['image'][$i]['name'] = $input->renameImage($this->request->data['image'][$i]);
                }
                $input->uploadImages('webroot/img/product_img', $this->request->data['image']);
                $all_images = [];
                foreach ($this->request->data['image'] as $image) {
                    array_push($all_images, $image['name']);
                }
                $img = implode(',', $all_images);
                unset($this->request->data['image']);
                $this->request->data['image'] = $img;
            }
            $node = $this->Nodes->patchEntity($node, $this->request->data);
            if ($this->Nodes->save($node)) {
                $this->Flash->success(__('The product has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The product could not be saved. Please, try again.'));
            }
        }

        $apps = $this->Nodes->Apps->find('list', ['limit' => 200]);

        $categories = $this->Nodes->Categories->find('list', ['limit' => 200])->skip(1);

        $fields = $this->getDefaultFields();
        $ud_fields = $this->getUserDefinedFields($cat_id);
        $ud_fields_options_array = $this->getUserDefinedFieldsOptions($ud_fields);
        $fields = array_merge($fields, $ud_fields);
        $ud_fields_options = [];
        foreach($ud_fields_options_array as $option){

            $ud_fields_options['ud_'.$option->toArray()['title']] = $option->toArray();
        }
        $this->set(compact('node', 'apps', 'categories', 'fields', 'cat_id', 'ud_fields_options'));
        $this->set('_serialize', ['node']);

    }

    public function edit($id = null, $cat_id = 1)
    {
        if ($cat_id == 0) {
            throw new Exception('No such Category. Invalid attempt');
        }
        $node = $this->Nodes->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $this->request->data['apps_id'] = 1;
            $node = $this->Nodes->patchEntity($node, $this->request->data);
            if ($this->Nodes->save($node)) {
                $this->Flash->success(__('The product has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The product could not be saved. Please, try again.'));
            }
        }
        $apps = $this->Nodes->Apps->find('list', ['limit' => 200]);
        $categories = $this->Nodes->Categories->find('list', ['limit' => 200])->skip(1);

        $fields = $this->getDefaultFields();
        $ud_fields = $this->getUserDefinedFields($cat_id);
        $ud_fields_options_array = $this->getUserDefinedFieldsOptions($ud_fields);
        $fields = array_merge($fields, $ud_fields);
        $ud_fields_options = [];
        foreach($ud_fields_options_array as $option){

            $ud_fields_options['ud_'.$option->toArray()['title']] = $option->toArray();
        }
        $this->set(compact('node', 'apps', 'categories', 'fields', 'cat_id', 'ud_fields_options'));
        $this->set('_serialize', ['node']);
    }

    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $node = $this->Nodes->get($id);
        if ($this->Nodes->delete($node)) {
            $this->Flash->success(__('The product has been deleted.'));
        } else {
            $this->Flash->error(__('The product could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }

    private function getDefaultFields()
    {
        $fields = $this->Nodes->schema()->columns();

        $default_fields_array = [];

        foreach ($fields as $field) {
            if (strpos($field, 'ud_') === false) {
                array_push($default_fields_array, $field);
            }
        }
        return $default_fields_array;
    }

    private function getUserDefinedFields($cat_id)
    {
        $ud_fields_array = [];
        $categories = TableRegistry::get('Categories');

        $fields = $categories->get($cat_id, [
            'contain' => ['Fields']
        ]);

        foreach ($fields->fields as $field) {
            array_push($ud_fields_array, 'ud_'.$field->title);
        }

        return $ud_fields_array;
    }

    public function getUserDefinedFieldsOptions($ud_fields)
    {
        $ud_fields_options = [];
        $fields_table = TableRegistry::get('Fields');
        $field_types_table = TableRegistry::get('fieldtypes');
        foreach ($ud_fields as $field) {

            $label = str_replace("ud_", "", $field);

            $result = $fields_table->find()->where(['title ' => $label]);

            /*Reading fieldTypes table to get name at given id*/
            $field_types = $field_types_table->find()->select(['name'])->where(['id' => $result->toArray()[0]['fieldTypes_id']]);
            /*Un setting fileTypes_id and setting type name */
            unset($result->toArray()[0]['fieldTypes_id']);
            $result->toArray()[0]['type'] = $field_types->toArray()[0]['name'];

            /*Making options and values array in case of checkbox-group, select or radio-group */
            $types_array_to_check = ['file','text','password','email','checkbox','radio'];
            if(!in_array($result->toArray()[0]['type'],$types_array_to_check)){
                $options = $fields_table->find()->select(['options','vals'])->where(['parent_id' => $result->toArray()[0]['id']]);
                $options_values = $options->toArray();
                $array = [];
                foreach($options_values as $key => $op){
                    $array[$op->toArray()['options']] = $op->toArray()['vals'];
                }
                $result->toArray()[0]['options'] = $array;
            }

            /*Adding result set at key i.e field name*/
            $ud_fields_options[$field] = $result->toArray()[0];
        }
        return $ud_fields_options;

    }

    public function beforeFilter(Event $event)
    {
        $this->loadModel('Nodes');
        parent::beforeFilter($event);
    }
}