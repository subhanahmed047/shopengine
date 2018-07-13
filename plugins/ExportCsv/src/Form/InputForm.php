<?php

/**
 * Created by PhpStorm.
 * User: Admin
 * Date: 5/8/2016
 * Time: 3:45 PM
 */
namespace ExportCsv\Form;

use Cake\Form\Form;
use Cake\Form\Schema;
use Cake\Validation\Validator;

class InputForm extends Form
{
    protected function _buildSchema(Schema $schema)
    {
        return $schema->addField('csv', 'file');
    }

    protected function _buildValidator(Validator $validator)
    {
        return $validator->notEmpty('csv', 'This field is required');
    }

    protected function _execute(array $data)
    {
        // Send an email.
        return true;
    }
}