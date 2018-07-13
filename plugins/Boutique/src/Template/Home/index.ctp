<?= $this->html->css(['flexslider.css']); ?>
<?= $this->html->script(['jquery.flexslider.js']); ?>
<?= $this->start('slider'); ?>
<?= $this->element('slider'); ?>
<?= $this->end(); ?>
<?= $this->element('index/featured-products'); ?>