<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 6/8/2016
 * Time: 12:57 AM
 */

namespace App\Controller;

use Cake\Event\Event;
use Cake\ORM\TableRegistry;
use Cake\Routing\Route;

class CartsController extends AppController
{

    public function index()
    {
        $nodes_table = TableRegistry::get('nodes');
        $products = $nodes_table->find('ByType',['node_type' => 'product'])->contain([
            'Apps', 'Categories'
        ]);

        $products = $this->paginate($products);
        $this->set(compact('products'));
        $this->set('_serialize', ['products']);

    }
}