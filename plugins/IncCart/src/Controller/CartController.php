<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 6/18/2016
 * Time: 9:45 PM
 */

namespace IncCart\Controller;

use App\Controller\AppController;

class CartController extends AppController
{
    public function addToCart()
    {
        $this->autoRender = false;
        $this->request->allowMethod('ajax');
        if($this->request->is('post')){
            $product = $this->request->data;
            if($this->Cart->addToCart($product)){
                echo true;
            }else{
                echo false;
            }
        }
    }
    

}