<!DOCTYPE html>
<html lang="en">
<head>
    <title><?= $this->fetch('title'); ?></title>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= $this->Html->meta(
        'favicon.ico',
        '/favicon.ico',
        ['type' => 'icon']
    ); ?>
    <?= $this->fetch('meta'); ?>

    <?= $this->Html->css([
        'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css',
        'style',
        'https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css',
        '//fonts.googleapis.com/css?family=Lato:100,300,400,700,900',
        '//fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900',
        'memenu',
        'flexslider',
        'animate.min.css',
        'royalslider/royalslider.css',
        'royalslider/skins/default-inverted/rs-default-inverted.css'
    ]); ?>


    <?= $this->Html->css('rs-plugin/css/settings.css', ['media' => 'screen']); ?>
    <?= $this->fetch('css'); ?>

    <?= $this->Html->script([
        'https://ajax.googleapis.com/ajax/libs/jquery/2.2.3/jquery.min.js',
        'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js'
    ]); ?>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>
<body>

<?= $this->element('topbar'); ?>
<?= $this->element('header'); ?>

<?php if ($this->fetch('slider')): ?>
    <?= $this->fetch('slider') ?>
<?php endif; ?>
<section class="blog-wrapper">
    <div class="container">
        <?= $this->fetch('content'); ?>
    </div>
</section>

<?= $this->element('footer'); ?>
<?= $this->element('copyrights'); ?>

<div id="back-top"><a href="#"><i class="fa fa-angle-up"></i></a></div>
<?= $this->Html->script([
    'menu',
    'owl.carousel.min.js',
    'jquery.parallax-1.1.3.js',
    'jquery.simple-text-rotator.js',
    'wow.min.js',
    'custom'
]); ?>
<?= $this->fetch('script'); ?>
</body>
</html>
