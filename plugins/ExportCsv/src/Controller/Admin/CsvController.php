<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 5/7/2016
 * Time: 4:00 PM
 */

namespace ExportCsv\Controller\Admin;

use ExportCsv\Controller\AppController;
use Cake\ORM\TableRegistry;


class CsvController extends AppController
{
    public function index()
    {

    }

    public function export()
    {
        $this->autoRender = false;

        if ($this->request->is('post')) {
            $this->exportTable($this->request->data('table'));
        }

    }

    private function exportTable($tableName = null)
    {
        $this->response->download($tableName . '_export.csv');
        $table = TableRegistry::get($tableName);
        $data = $table->find('all')->toArray();
        $_header = (array)$table->schema()->columns();
        $_serialize = 'data';
        $this->response->download($tableName . '_export.csv');
        $this->set(compact('data', '_serialize', '_header'));
        $this->viewClass = 'CsvView.Csv';
        //return;
    }

    public function importCsv()
    {

    }

}
