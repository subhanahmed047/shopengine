<?php

namespace IncCart\Controller\Component;

use Cake\Controller\Component;

/**
 * Created by PhpStorm.
 * User: Subhan Ahmed
 * Date: 5/29/2016
 * Time: 7:21 PM
 */
class CartComponent extends Component
{

    public function addToCart($product)
    {
        $products = $this->getCart();
        array_push($products, $product);
        if($this->getControllerCookie()->write("Cart", $products)){
            return true;
        }
        return false;
    }

    public function removeFromCart($product)
    {
        $resultant_product = [];
        $products = $this->getCart();
        foreach ($products as $cart_product) {
            if ($cart_product['id'] == $product['id']) {

            }
        }
        return $resultant_product;
    }

    public function truncateCart()
    {
        return $this->getControllerCookie()->delete('Cart');
    }

    public function getCart()
    {
        return $this->isExistCartCookie() ? $this->getControllerCookie()->read('Cart') : [];
    }


    public function isExistCartCookie()
    {
        return $this->getControllerCookie()->check("Cart");
    }

    public function getControllerCookie()
    {
        return $this->_registry->getController()->Cookie;
    }
}