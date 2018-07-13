<?php

$this->start('css');
echo $this->Html->css([
    'https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css'
]);

$this->end();
$this->start('script');
echo $this->Html->script([
    'https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js',
    'https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js'
]);

$this->end();

?>

<div class="row">
    <div class="col-md-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Fields
                </h2>
                <ul class="nav navbar-right panel_toolbox">
                    <?= $this->Html->Link(__('<i class="fa fa-plus-circle"></i> Add Field'), [
                        'prefix' => 'admin',
                        'controller' => 'Fields',
                        'action' => 'add'
                    ], [
                            'class' => 'btn btn-sm btn-success pull-right',
                            'escape' => false,
                        ]
                    ); ?>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <div class="row">
                    <div class="col-sm-12">
                        <table cellpadding="0" cellspacing="0"
                               class="table table-striped responsive-utilities jambo_table"
                               id="datatable">
                            <thead>
                            <tr>
                                <th><?= __('Field Type') ?></th>
                                <th><?= __('Category') ?></th>
                                <th><?= __('Title') ?></th>
                                <th><?= __('Created') ?></th>
                                <th class="actions"><?= __('Actions') ?></th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($fields as $field): ?>
                                <tr>
                                    <td><?= $field->has('fieldtype') ? $this->Html->link($field->fieldtype->name, ['controller' => 'Fieldtypes', 'action' => 'view', $field->fieldtype->id]) : '' ?></td>
                                    <td>
                                        <?php
                                        $category_ids = [];
                                        $category_names = [];
                                        foreach ($field->categories as $category) {
                                            array_push($category_ids, $category->id);
                                            array_push($category_names, $category->name);
                                        }
                                        $categories = array_combine($category_ids, $category_names);
                                        foreach ($categories as $id => $name) {
                                            echo $this->Html->link($name, ['controller' => 'Categories', 'action' => 'view', $id], ['target' => '_blank']) . "<br>";
                                        }

                                        ?>
                                    </td>
                                    <td><?= h($field->title) ?></td>
                                    <td><?= h($field->created) ?></td>
                                    <td class="actions">
                                        <?= $this->Html->link(__('View'), ['action' => 'view', $field->id]) ?>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function () {
        $('#datatable').DataTable();
    });
</script>
