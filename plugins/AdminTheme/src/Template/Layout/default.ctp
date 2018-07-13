<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?= $this->name . " | Shop Engine" ?>
    </title>

    <?= $this->Html->meta(
        'favicon.ico',
        '/favicon.ico',
        ['type' => 'icon']
    ); ?>
    <?= $this->fetch('meta') ?>

    <?= $this->Html->css([
        'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css',
        'https://maxcdn.bootstrapcdn.com/font-awesome/4.6.2/css/font-awesome.min.css',
        'animate.min.css',
        'popup',
        'custom.css'
    ]) ?>

    <?= $this->fetch('css') ?>

    <?= $this->Html->script([
        'https://code.jquery.com/jquery.min.js',
        'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js',
        'nicescroll/jquery.nicescroll.min.js'
    ]); ?>

</head>
<body class="nav-md">
<?= $this->Flash->render() ?>

<div class="container body">
    <div class="main_container">
        <div class="col-md-3 left_col">
            <div class="left_col scroll-view">
                <?= $this->element('sidebar'); ?>
            </div>
        </div>
        <div class="top_nav">
            <div class="nav_menu">
                <?= $this->element('topbar', ['authUser' => $authUser]); ?>
            </div>
        </div>

        <div class="right_col" role="main">
            <?= $this->fetch('content'); ?>
        </div>
    </div>
</div>

<?= $this->Html->script([
    'custom.js'
]) ?>

<?= $this->fetch('script') ?>

</body>
</html>
