<!DOCTYPE html>
<html lang="en">
<head>
    <title><?= $this->fetch('title');?></title>

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
        'http://fonts.googleapis.com/css?family=Roboto:400,300,500,700',
        '/js/owl-carousel/owl.carousel.css',
        'main',
    ]); ?>
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
<div class="container">
    <?php if ($this->fetch('slider')): ?>
            <?= $this->fetch('slider') ?>
    <?php endif; ?>
    <?= $this->fetch('content'); ?>
</div>

<?= $this->element('footer'); ?>

<div id="back-top"><a href="#"><i class="fa fa-angle-up"></i></a></div>
<?= $this->Html->script([
    'owl-carousel/owl.carousel.min.js'
]); ?>
<?= $this->fetch('script'); ?>
</body>
</html>
