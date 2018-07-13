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
        'http://fonts.googleapis.com/css?family=Lato:300,300italic,400,400italic,700,700italic|Shadows+Into+Light',
        '/js/tfingi-megamenu/tfingi-megamenu-frontend.css',
        'color-schemes/turquoise.css'

    ]); ?>

    <?= $this->fetch('css'); ?>

    <?= $this->Html->script([
        'https://ajax.googleapis.com/ajax/libs/jquery/2.2.3/jquery.min.js',
        'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js',
        'la_boutique'
    ]); ?>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>
<body>
<div class="wrapper">
    <?= $this->element('header', [
        'authUser' => $authUser
    ]); ?>
    <?= $this->element('navigation'); ?>
    <section class="main">
        <section class="home">
            <?php
                if($this->fetch('slider')){
                    echo $this->fetch('slider');
                }
            ?>
            <?= $this->fetch('content'); ?>
        </section>
    </section>
    <?= $this->element('footer'); ?>
</div>

<?= $this->fetch('script'); ?>
</body>
</html>
