<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 5/15/2016
 * Time: 4:17 PM
 */


echo $this->Form->create($input,['type' => 'file']);
echo $this->Form->input('zip', ['type' => 'file']);
echo $this->Form->button('Submit');
echo $this->Form->end();