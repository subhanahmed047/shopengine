<?php

namespace Utils\View\Helper;

use Cake\Utility\Security;
use Cake\View\Helper;
use Cake\View\StringTemplateTrait;

/**
 * Class MenusHelper
 * @package IncMenus\View\Helper
 */
class LinkCryptHelper extends Helper
{

    public $helpers = ['Html'];
    private $crypt_method = 'aes128';

    public function initialize(array $config)
    {
        parent::initialize($config);
    }

    public function encrypted_link($title, $controller, $action, $data, $options = [], $prefix = null)
    {
        return $this->Html->link($title, [
            'controller' => $controller,
            'action' => $action,
            openssl_encrypt($data, $this->crypt_method, Security::salt())
        ], $options);
    }

    public function decrypt_link_data($data)
    {
        return openssl_decrypt($data, $this->crypt_method, Security::salt());
    }

}

?>
