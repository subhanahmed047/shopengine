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
                <h2>Products
                </h2>
                <ul class="nav navbar-right panel_toolbox">
                    <?= $this->Html->Link(__('<i class="fa fa-plus-circle"></i> Add Product'), [
                        'prefix' => 'admin',
                        'controller' => 'Products',
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
                        <table cellpadding="0" cellspacing="0" class="table table-striped responsive-utilities jambo_table"
                               id="datatable">
                            <thead>
                            <tr>
                                <th><?= __('Title') ?></th>
                                <th><?= __('Category') ?></th>
                                <th><?= __('Stock') ?></th>
                                <th><?= __('Status') ?></th>
                                <th><?= __('Price') ?></th>
                                <th class="actions"><?= __('Actions') ?></th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($nodes as $node):
                                $status = $node->status;
                                $status_string = '';
                                switch ($status) {
                                    case 1:
                                        $status_string = 'Published';
                                        break;
                                    case 2:
                                        $status_string = 'Unpublished';
                                        break;
                                    case 3;
                                        $status_string = 'Trash';
                                        break;
                                }


                                ?>
                                <tr>
                                    <td><?= h($node->title) ?></td>
                                    <td><?= $node->has('category') ? $this->Html->link($node->category->name, ['controller' => 'Categories', 'action' => 'view', $node->category->id]) : '' ?></td>
                                    <td><?= h($node->quantity) ?></td>
                                    <td><?= h($status_string) ?></td>
                                    <td><?= $this->Number->format($node->price) ?></td>
                                    <td class="actions">
                                        <?= $this->Html->link(__('View'), ['action' => 'view', $node->id]) ?>
                                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $node->id]) ?>
                                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $node->id], ['confirm' => __('Are you sure you want to delete # {0}?', $node->id)]) ?>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
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
