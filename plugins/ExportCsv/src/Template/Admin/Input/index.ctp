<?php
/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 5/15/2016
 * Time: 4:17 PM
 */


echo $this->Form->create($input,['multiple'=> true,'type' => 'file']);
echo $this->Form->input('csv', ['type' => 'file']);
//echo $this->Form->button('Submit');
echo $this->Html->link('Image', [
    'controller' => 'image-uploader/image-uploader',
    'action' => 'getAllImages'
]);
echo $this->Form->end();