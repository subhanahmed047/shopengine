<?php

namespace AdminTheme\View\Helper;

use Cake\Utility\Inflector;
use Cake\View\Helper;


class AdminFormHelper extends Helper
{
    public $helpers = ['Form'];

    public function input($fieldName, $options = [], $label = null)
    {
        if (empty($label)) {
            $label = Inflector::humanize($fieldName);
        }
        $options['label'] = false;
        $options['class'] = 'form-control col-sm-12 col-xs-12 margin-bottom-5';
        $openingTags = "<div class='form-group'><label class='col-md-3 col-sm-3 col-xs-12'>" . $label . "</label><div class='col-md-9 col-sm-9 col-xs-12'>";
        $closingTags = "</div></div>";

        return $openingTags . $this->Form->input($fieldName, $options) . $closingTags;
    }
}