<?php
namespace App\Controller\Admin;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;
use Cake\Utility\Inflector;
use Cake\Utility\Xml;
use Phinx\Db\Table;
use Cake\Datasource\ConnectionManager;
//App::uses('ShellDispatcher', 'Console');
use Cake\Console\Shell;


/**
 * Fields Controller
 *
 * @property \App\Model\Table\FieldsTable $Fields
 */
class FieldsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Fieldtypes', 'Apps', 'Categories']
        ];
        $fields = $this->paginate($this->Fields);
        $this->set(compact('fields'));
        $this->set('_serialize', ['fields']);
    }

    /**
     * View method
     *
     * @param string|null $id Field id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $field = $this->Fields->get($id, [
            'contain' => ['Fieldtypes', 'Apps', 'Categories']
        ]);

        $this->set('field', $field);
        $this->set('_serialize', ['field']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $field = $this->Fields->newEntity();
        if ($this->request->is('post')) {
            $this->request->data['apps_id'] = 1;
            $field = $this->Fields->patchEntity($field, $this->request->data);
            //debug($this->request->data);die;
            $this->setFieldsXml($this->request->data['fields'], $field['categories']);
            //debug($this->request->data);die;
            /*$nodes = TableRegistry::get('nodes');
            if (!$nodes->hasField($field->title)) {
                if ($this->Fields->save($field)) {
                    $this->addNewColumn("ud_" . $field->title);
                    $this->Flash->success(__('The field has been saved.'));
                    return $this->redirect(['action' => 'index']);
                } else {
                    $this->Flash->error(__('The field could not be saved. Please, try again.'));
                }
            } else {
                $this->Flash->error(__('The field already exists. Please, try another.'));
            }*/
        }
        $fieldtypes = $this->Fields->Fieldtypes->find('list', ['limit' => 200]);
        $apps = $this->Fields->Apps->find('list', ['limit' => 200]);

        $categories = $this->Fields->Categories->find('list');

        $this->set(compact('field', 'fieldtypes', 'apps', 'categories'));
        $this->set('_serialize', ['field']);
    }

    /**
     * @param $col_name
     */
    public function addNewColumn($col_name)
    {
        $connection = ConnectionManager::get('default');
        $results = $connection->execute("ALTER TABLE nodes ADD $col_name varchar(250)");
    }

    /**
     * Edit method
     *
     * @param string|null $id Field id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    /*public function edit($id = null)
    {
        $field = $this->Fields->get($id, [
            'contain' => ['Categories']
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $this->request->data['apps_id'] = 1;
            $field = $this->Fields->patchEntity($field, $this->request->data);
            if ($this->Fields->save($field)) {
                $this->Flash->success(__('The field has been saved.'));
                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The field could not be saved. Please, try again.'));
            }
        }
        $fieldtypes = $this->Fields->Fieldtypes->find('list', ['limit' => 200]);
        $apps = $this->Fields->Apps->find('list', ['limit' => 200]);
        $categories = $this->Fields->Categories->find('list');

        $this->set(compact('field', 'fieldtypes', 'apps', 'categories'));
        $this->set('_serialize', ['field']);
    }*/

    /**
     * Delete method
     *
     * @param string|null $id Field id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
/*    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $field = $this->Fields->get($id);
        if ($this->Fields->delete($field)) {
            $this->Flash->success(__('The field has been deleted.'));
        } else {
            $this->Flash->error(__('The field could not be deleted. Please, try again.'));
        }
        return $this->redirect(['action' => 'index']);
    }*/

    public function setFieldsXml($data,$categories)
    {
        $this->autorender = false;
        //$this->request->allowMethod('ajax');

        //$data = $this->request->data('data');
        file_put_contents(WWW_ROOT . 'form.xml', htmlspecialchars_decode($data));
        $this->readXml($categories);
        return $this->redirect(['action' => 'index']);

    }

    public function readXml($categories)
    {
        $this->autoRender = false;

        $xml = Xml::build(WWW_ROOT . 'form.xml');
        $xml = Xml::toArray($xml);
        $vals = $xml['form-template']['fields']['field'];

        if(array_key_exists('@class', $vals)){
            /*Single field*/
            $array = $vals;
            $vals = [];
            array_push($vals,$array);
            $xml['form-template']['fields']['field'] = [];
            $xml['form-template']['fields']['field'] = $vals;
        }
        //debug($vals);die;
        /*if(!is_array($xml['form-template']['fields']['field'][0])) {

        }*/
        //array_push($xml['form-template']['fields']['field'],$categories);
        //debug($xml); die;
        $nodes = TableRegistry::get('nodes');
        foreach ($xml['form-template']['fields'] as $xml) {
            foreach ($xml as $key => $value) {
                //echo $value['@label'];

                //debug($key.' => '.$value);die;
                $new_field = Inflector::underscore($value['@label']);
                $new_field = Inflector::slug($new_field, '_');

                $prefixed = 'ud_' . $new_field;
                /* Check if prefixed column already exists */
                if($nodes->hasField($prefixed)) {
                    /* Show error flash here */
                    echo "Already Exists <br>";
                }else{
                    $fields = $this->Fields->newEntity();
                    $fields->title = $new_field;
                    $fields->apps_id = 1;
                    /*getting fieldTypes id here according to type of fields and setting*/
                    $field_types_table = TableRegistry::get('fieldtypes');
                    $field_types = $field_types_table->find()->select(['id'])->where(['name' => $value['@type']]);
                    $fields->fieldTypes_id = $field_types->toArray()[0]['id'];
                    //debug();die;
                    $fields->categories = $categories;
                    !empty($value['@placeholder']) ? $fields->placeholder = $value['@placeholder'] : $fields->placeholder = null;
                    !empty($value['@required']) ? $fields->required = 'true' : $fields->required = 'false';
                    $fields->class = $value['@class'];
                    //$fields = $this->Fields->patchEntity($fields, $fields);
                    if ($this->Fields->save($fields)) {
                        //echo $fields->id . '<br>';
                        if (!empty($value['option'])) {
                            foreach ($value['option'] as $value3) {
                                /*Getting options here*/
                                $id = $fields->id;
                                $options = $this->Fields->newEntity();
                                $options->parent_id = $id;
                                $options->apps_id = 1;
                                $options->fieldTypes_id = 1;
                                //$options->categories = $categories;
                                $options->options = $value3['@value'];
                                $options->vals = $value3['@'];
                                if ($this->Fields->save($options)) {

                                    /*Show some Flash*/
                                }
                            }
                        }
                        /*make column at nodes - $prefixed */
                        $this->addNewColumn($prefixed);

                    }
                }
            }
        }
    }
}
