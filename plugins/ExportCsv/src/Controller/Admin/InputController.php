<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 5/15/2016
 * Time: 4:11 PM
 */

namespace ExportCsv\Controller\Admin;

use ExportCsv\Controller\AppController;
use ExportCsv\Form\InputForm;
use Cake\ORM\TableRegistry;

class InputController extends AppController
{

    var $entities;

    public function index()
    {
        $input = new InputForm();
        if ($this->request->is('post')) {
            if ($input->execute($this->request->data)) {
                $data = $this->request->data;
                if(!empty($data['csv']['name']))
                {
                    $file = $data['csv'];
                    if ((isset($file['tmp_name']) &&($file['error'] == UPLOAD_ERR_OK)))
                    {
                        $this->Flash->success('We will get back to you soon.');
                        $delim = ','; $enc = '"'; $line = "\n";
                        $entities = [];
                        foreach( str_getcsv ( file_get_contents( $file['tmp_name'] ), $line ) as $row )
                        {
                            $entity = str_getcsv($row, $delim, $enc);
                            array_push($entities, $entity);
                        }
                        $headers = $entities[0];
                        array_shift($entities);
                        $entities = $this->buildEntity($headers, $entities);

                        $nodes_table = TableRegistry::get('Nodes');
                        $nodes_entities = $nodes_table->newEntities($entities);
                        $nodes_table->connection()->transactional(function () use ($nodes_table, $nodes_entities) {
                            foreach ($nodes_entities as $entity) {
                                $nodes_table->save($entity, ['atomic' => false]);
                            }
                        });
                    }else{
                        $this->Flash->error('Error.');
                    }
                }
            } else {
                $this->Flash->error('There was a problem submitting your form.');
            }
        }
        $this->set('input', $input);
    }
    private function buildEntity($header, $entities){
        $built_entities = [];
        foreach ($entities as $entity) {
            array_push($built_entities, array_combine($header, $entity));
        }
        return $built_entities;
    }
}