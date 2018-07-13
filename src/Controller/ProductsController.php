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

class ProductsController extends AppController
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
    public function view($id){
        $nodes_table = TableRegistry::get('nodes');
        $product = $nodes_table->get($id, [
            'contain' => ['Apps', 'Categories']
        ]);

        $attributes = [];
        foreach($product->toArray() as $key => $value){
            if(substr($key, 0, 3) == 'ud_' && $value != null){
                $attributes[str_replace('ud_', '', $key)] = $value;
            }
        }

        $related_products = $this->relatedProducts($product);
        $this->set(compact('product', 'related_products', 'attributes'));
        $this->set('_serialize', ['product', 'related_products']);
    }

    public function addToCart($product, $ajax = true){
        $this->autoRender = false;
        $this->request->allowMethod('ajax');
        //$product = explode(',', $product);

        $data = explode(',',$this->request->data('data'));

        $product_array = [
            'id' => $data[0],
            'title' => $data[1],
            'price' => $data[2],
            'src' => $data[3],
            'quantity' => 1
        ];
        //$this->test();
        echo $this->Cart->addToCart($product_array);
    }
    public function test(){
       echo true;
    }
    private function relatedProducts($product){
        $nodes_table = TableRegistry::get('nodes');
        $products = $nodes_table->find('ByType',['node_type' => 'product'])->contain([
            'Apps', 'Categories'
        ])->where(['Nodes.categories_id' => $product->category->id])->limit(10);
        return $products;
    }

}