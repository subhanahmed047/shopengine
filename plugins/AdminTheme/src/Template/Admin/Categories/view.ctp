
<div class="row">
    <div class="col-sm-12 col-md-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <?php $label = ucwords(str_replace("_", " ", $category->name)); ?>
                <h2> <?= h($label) ?> </h2>
                <ul class="nav navbar-right panel_toolbox">
                    <?= $this->Html->Link(__('<i class="fa fa-bars"></i> View All'), [
                        'prefix' => 'admin',
                        'action' => 'index'
                    ], [
                            'class' => 'btn btn-sm btn-primary pull-right',
                            'escape' => false,
                        ]
                    ); ?>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content" style="display:block;">
                <div class="col-sm-9 col-sx-12">
                    <table class="vertical-table table table-striped responsive-utilities jambo_table">

                        <tr>
                            <th><?= __('Name') ?></th>
                            <td><?= h($category->name) ?></td>
                        </tr>
                        <tr>
                            <th><?= __('Parent') ?></th>
                            <td><?= $category->has('parent_category') ? $this->Html->Link(h($category->parent_category->name), ['action' => 'view', $category->parent_category->id]) : '-' ?></td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-sm-12 col-md-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2> <?= h('Related Fields') ?> </h2>
                <ul class="nav navbar-right panel_toolbox">

                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content" style="display:block;">
                <div class="col-sm-9 col-sx-12">
                    <table class="vertical-table table table-striped responsive-utilities jambo_table">
                        <thead>
                        <th><?= __('Title') ?></th>
                        <th><?= __('Type') ?></th>
                        </thead>
                        <?php foreach ($related_fields as $related_field): ?>
                            <tr>
                                <td><?= h($related_field['title']) ?></td>
                                <td><?= h($related_field['type']) ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
