<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 6/8/2016
 * Time: 12:48 PM
 */

namespace App\Controller;

use Cake\Core\Exception\Exception;
use Cake\Event\Event;
use Cake\Routing\Route;
use Cake\ORM\TableRegistry;

class PagesController extends AppController
{
    public function view($id){
        $nodes_table = TableRegistry::get('nodes');
        $page = $nodes_table->get($id, [
            'contain' => ['Apps', 'Categories']
        ]);

        $this->set('page', $page);
        $this->set('_serialize', ['page']);
    }
}