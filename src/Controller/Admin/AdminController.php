<?php
namespace App\Controller\Admin;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;

class AdminController extends AppController
{

    public function index()
    {

        $users = TableRegistry::get('users');
        $orders = TableRegistry::get('orders');
        $nodes = TableRegistry::get('nodes');


        $users_count = $users->find()->count();
        $orders_count = $orders->find()->count();
        $products_count = $nodes->find('ByType', ['node_type' => 'product'])->count();


        $total_sales = $orders->find()->select('prod_total')->sumOf('prod_total');

        $this->set(compact('users_count', 'products_count', 'orders_count', 'total_sales'));
    }

}

?>
