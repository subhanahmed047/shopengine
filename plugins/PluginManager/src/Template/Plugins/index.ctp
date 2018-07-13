<html>
<head>
    <title>Plugins</title>
    <?= $this->Html->css('https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css'); ?>
</head>
<body>
<div class="container">
    <h1><?= __('All Themes') ?></h1>
    <div class="row">
        <?php foreach ($themes as $theme): ?>
            <div class="col-sm-4">
                    <table class="table vertical-table table-responsive table-bordered table-hover">
                        <tr>
                            <th><?= __('Name') ?></th>
                            <td><?= h($theme->name) ?></td>
                        </tr>
                        <tr>
                            <th><?= __('Author') ?></th>
                            <td><?= h($theme->author) ?></td>
                        </tr>
                        <tr>
                            <th><?= __('Version') ?></th>
                            <td><?= h($theme->version) ?></td>
                        </tr>
                    </table>
                </div>
        <?php endforeach; ?>
    </div>
</div>
</body>
</html>