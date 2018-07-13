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
<!--
<div class="row">
    <div class="col-md-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Menus
                    <small> Navigation's of your store</small>
                </h2>
                <ul class="nav navbar-right panel_toolbox">
                    <? /*= $this->Html->Link(__('<i class="fa fa-plus-circle"></i> Add Menu'), [
                        '_name' => 'admin:menus:add'
                    ], [
                            'class' => 'btn btn-sm btn-primary pull-right',
                            'escape' => false,
                        ]
                    ); */ ?>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <div class="row">
                    <div class="col-sm-12">
                        <table cellpadding="0" cellspacing="0"
                               class="table table-striped responsive-utilities jambo_table" id="datatable">
                            <thead>
                            <tr>
                                <th><? /*= __('Title') */ ?></th>
                                <th class="actions"><? /*= __('Actions') */ ?></th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php /*foreach ($menus as $menu): */ ?>
                                <tr>
                                    <td><? /*= h($menu->title) */ ?></td>
                                    <td class="actions">
                                        <? /*= $this->Html->link(__('View'), ['action' => 'view', $menu->id]) */ ?>
                                        <? /*= $this->Html->link(__('Edit'), ['action' => 'edit', $menu->id]) */ ?>
                                        <? /*= $this->Form->postLink(__('Delete'), ['action' => 'delete', $menu->id], ['confirm' => __('Are you sure you want to delete' . $menu->title . '?', $menu->id)]) */ ?>
                                        <?php /*if ($menu->id != $primary_menu) { */ ?>
                                            <? /*= $this->Form->postLink("<span class='btn btn-xs btn-primary'>Set Primary</span>", ['action' => 'setPrimaryMenu', $menu->id], ['escape' => false, 'confirm' => __('Are you sure you want to Set this menu as primary menu?', $menu->id)]) */ ?>
                                        <?php /*} else { */ ?>
                                            <? /*= "<span class='label label-success'>Primary</span>" */ ?>
                                        <?php /*} */ ?>
                                    </td>
                                </tr>
                            <?php /*endforeach; */ ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>-->

<div class="row">
    <div class="col-md-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Menus
                    <small> Navigation's of your store</small>
                </h2>
                <ul class="nav navbar-right panel_toolbox">
                    <button type="button" class="btn btn-sm btn-info pull-right" data-toggle="modal"
                            data-target=".bs-add-modal-sm"><i class='fa fa-plus-circle'></i> Add New Menu
                    </button>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <div class="row">
                    <?php foreach ($menus as $menu): ?>
                        <div class="col-md-6 col-sm-6 col-xs-12 clearfix">
                            <div class="x_panel">
                                <div class="x_title">
                                    <h2 class="text-muted"><?= ucfirst($menu->title) ?></h2>
                                    <div class="btn-group-sm dropup pull-right">
                                        <button class="btn btn-default btn-sm dropdown-toggle" type="button"
                                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fa fa-bars"></i>
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li class="text-danger">
                                                <?= $this->Form->postLink("<i class='fa fa-trash'></i> Delete", ['action' => 'delete', $menu->id], ['confirm' => __('Are you sure you want to delete' . $menu->title . '?', $menu->id), 'escape' => false]); ?>
                                            </li>
                                            <li>
                                                <?= $this->Form->postLink("<i class='fa fa-pencil'></i> Edit", 'javascript::void(0)', ['escape' => false, 'data-toggle' => "modal", 'data-target' => ".bs-edit-modal-sm"]); ?>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="pull-right">
                                        <?= $this->html->Link("<i class='fa fa-plus-circle'></i> Add Items", [
                                            'controller' => 'MenuItems',
                                            'action' => 'add'
                                        ], [
                                            'class' => 'btn btn-xs btn-warning',
                                            'escape' => false
                                        ]); ?>
                                    </div>
                                    <div class="text-info pull-right">
                                        <?php if ($menu->id != $primary_menu) { ?>
                                            <?= $this->Form->postLink("<span class='btn btn-xs btn-primary' style='color:white;'>Set Primary</span>", ['action' => 'setPrimaryMenu', $menu->id], ['escape' => false, 'confirm' => __('Are you sure you want to Set this menu as primary menu?', $menu->id)]) ?>
                                        <?php } else { ?>
                                            <?= "<span class='label label-info' style='color: white;'>Primary</span>" ?>
                                        <?php } ?>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="x_content">
                                    <div class="">
                                        <ul class="to_do">
                                            <?php foreach ($items_array[$menu->id] as $menu_item): ?>
                                                <li><?= $menu_item ?></li>
                                            <?php endforeach; ?>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
                <small class="text-muted margin-bottom-5">Primary Menu is automaticlly selected as your top page
                    navigation
                </small>
            </div>
        </div>
    </div>
</div>


<div class="modal fade bs-add-modal-sm" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <?= $this->Form->create('menu', ['url' => ['controller' => 'Menus', 'action' => 'add']]) ?>
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">×</span>
                </button>
                <h4 class="modal-title" id="myModalLabel2">Add New Menu</h4>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <?= $this->Form->input('title', [
                        'required' => true,
                        'class' => 'form-control'
                    ]); ?>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <?= $this->Form->button(__('Save'), [
                    'class' => 'btn btn-primary'
                ]) ?>
            </div>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>


<div class="modal fade bs-edit-modal-sm" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <?= $this->Form->create('',['url' => ['controller' => 'Menus', 'action' => 'edit']]) ?>
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">×</span>
                </button>
                <h4 class="modal-title" id="myModalLabel2">Add New Menu</h4>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <?= $this->Form->input('title', [
                        'required' => true,
                        'class' => 'form-control'
                    ]); ?>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <?= $this->Form->button(__('Save'), [
                    'class' => 'btn btn-primary'
                ]) ?>
            </div>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>

<script>
    $(document).ready(function () {
        $('#datatable').DataTable();
    });
</script>
