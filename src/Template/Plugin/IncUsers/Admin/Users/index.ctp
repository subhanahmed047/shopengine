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
                <h2>Users</h2>
                <ul class="nav navbar-right panel_toolbox">
                    <?= $this->Html->Link(__('<i class="fa fa-plus-circle"></i> Add User'), [
                        '_name' => 'users:register'
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
                               class="table table-striped table-responsive jambo_table" id="datatable">
                            <thead>
                            <tr>
                                <th><?= __('Username') ?></th>
                                <th><?= __('Name') ?></th>
                                <th><?= __('Role') ?></th>
                                <th><?= __('Registered On') ?></th>
                                <th><?= __('Modified') ?></th>
                                <th class="actions"><?= __('Actions') ?></th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($users as $user): ?>
                                <tr>
                                    <td><?= h($user->username) ?></td>
                                    <td><?= h($user->name) ?></td>
                                    <td><?= h($user->role) ?></td>
                                    <td><?= h($user->created) ?></td>
                                    <td><?= h($user->modified) ?></td>
                                    <td class="actions">
                                        <?= $this->Html->link(__('View'), ['action' => 'view', $user->id]) ?>
                                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $user->id]) ?>
                                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $user->id], ['confirm' => __('Are you sure you want to delete # {0}?', $user->id)]) ?>
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
