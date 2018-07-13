<?= $this->assign('title', 'Menus'); ?>

<div class="row">
    <div class="col-md-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Menus
                    <small> Navigation's of your store</small>
                </h2>
                <ul class="nav navbar-right panel_toolbox">
                    <?= $this->Html->Link(__('<i class="fa fa-plus-circle"></i> Add Menu'), [
                        '_name' => 'admin:menus:add'
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
                        <table cellpadding="0" cellspacing="0">
                            <thead>
                            <tr>
                                <th><?= $this->Paginator->sort('id') ?></th>
                                <th><?= $this->Paginator->sort('title') ?></th>
                                <th class="actions"><?= __('Actions') ?></th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($menus as $menu): ?>
                                <tr>
                                    <td><?= $this->Number->format($menu->id) ?></td>
                                    <td><?= h($menu->title) ?></td>
                                    <td class="actions">
                                        <?= $this->Html->link(__('View'), ['action' => 'view', $menu->id]) ?>
                                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $menu->id]) ?>
                                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $menu->id], ['confirm' => __('Are you sure you want to delete # {0}?', $menu->id)]) ?>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                            </tbody>
                        </table>
                        <div class="paginator">
                            <ul class="pagination">
                                <?= $this->Paginator->prev('< ' . __('previous')) ?>
                                <?= $this->Paginator->numbers() ?>
                                <?= $this->Paginator->next(__('next') . ' >') ?>
                            </ul>
                            <p><?= $this->Paginator->counter() ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
