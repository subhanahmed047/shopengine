<?= $this->start('css'); ?>
<?= $this->Html->css([
    'https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css'
]); ?>
<?= $this->end(); ?>
<?= $this->start('script'); ?>
<?= $this->Html->script([
    'https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js',
    'https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js'
]); ?>
<?= $this->end(); ?>

<div class="row">
    <div class="col-md-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Categories
                </h2>
                <ul class="nav navbar-right panel_toolbox">
                    <?= $this->Html->Link(__('<i class="fa fa-plus-circle"></i> Add Page'), [
                        'prefix' => 'admin',
                        'controller' => 'Home',
                        'action' => 'add'
                    ], [
                            'class' => 'btn btn-sm btn-primary pull-right',
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
                                <th><?= __('Name') ?></th>
                                <th><?= __('Parent') ?></th>
                                <th class="actions"><?= __('Actions') ?></th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($categories as $category): ?>
                                <tr>
                                    <td><?= h($category->name) ?></td>
                                    <td><?= $category->has('parent_category') ? $this->Html->Link(h($category->parent_category->name), ['action' => 'view', $category->parent_category->id]) : '-' ?></td>
                                    <td class="actions">
                                        <?= $this->Html->link(__('View'), ['action' => 'view', $category->id]) ?>
                                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $category->id]) ?>
                                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $category->id], ['confirm' => __('Are you sure you want to delete # {0}?', $category->id)]) ?>
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
