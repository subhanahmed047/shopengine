<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?= $this->fetch('title') . " | Shop Engine" ?>
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
        'custom.css',
        'popup'
    ]) ?>

    <?= $this->fetch('css') ?>

    <?= $this->Html->script([
        'https://code.jquery.com/jquery.min.js',
        'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js',
    ]); ?>

</head>
<body class="nav-md" style="background: rgb(228, 228, 228);">
<?= $this->Flash->render() ?>

<div class="">
    <a class="hiddenanchor" id="toregister"></a>
    <a class="hiddenanchor" id="tologin"></a>

    <div id="wrapper">
        <?= $this->fetch('content'); ?>
    </div>
</div>

<?= $this->fetch('script') ?>

</body>
</html>
