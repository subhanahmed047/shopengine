<?php
    echo $this->html->css(['flexslider.css']);
    echo $this->html->script(['jquery.flexslider.js']);
    $this->start('slider');
        echo $this->element('slider');
    $this->end();
    echo $this->element('index/featured-products');
?>
