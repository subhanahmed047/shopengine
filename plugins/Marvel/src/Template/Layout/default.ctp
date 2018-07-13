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
        'https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css',
        'http://fonts.googleapis.com/css?family=Exo:400,300,600,500,400italic,700italic,800,900',
        'theme.css',
        'theme-animate'
    ]); ?>

    <?= $this->fetch('css'); ?>

    <?= $this->Html->script([
        'https://ajax.googleapis.com/ajax/libs/jquery/2.2.3/jquery.min.js',
        'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js',
        'theme.js',

    ]); ?>
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <![endif]-->

</head>
<body class="front bg-pattern-dark">
<div class="body">
    <?= $this->element('header'); ?>
    <div role="main" class="main with-sidebar">
        <section class="main-content-wrap">

            <?= $this->fetch('slider'); ?>
            <?= $this->fetch('content'); ?>
    </div>
</div>
<?= $this->element('footer'); ?>
<?= $this->fetch('script'); ?>

</body>
</html>
