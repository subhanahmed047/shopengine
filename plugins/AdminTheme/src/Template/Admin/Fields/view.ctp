
<div class="row">
    <div class="col-sm-12 col-md-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <?php $label = ucwords(str_replace("_", " ", $field->title));   ?>
                <h2> <?= h($label) ?> </h2>
                <ul class="nav navbar-right panel_toolbox">
                    <?= $this->Html->Link(__('<i class="fa fa-bars"></i> View All'), [
                        'prefix' => 'admin',
                        'action' => 'index',
                        $field->id
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
                            <th><?= __('Field Types') ?></th>
                            <td><?= $field->has('fieldtype') ? $this->Html->link($field->fieldtype->name, [
                                    'controller' => 'Fieldtypes',
                                    'action' => 'view', $field->fieldtype->id
                                ]) : '' ?></td>
                        </tr>
                        <tr>
                            <th><?= __('Categories') ?></th>
                            <td>
                                <ul class="push-left">
                                    <?php
                                    foreach ($field->categories as $category):
                                        ?>
                                        <li style="list-style-type: none;">
                                            <?php
                                            echo $this->Html->link(__($category->name), [
                                                "controller" => "Categories",
                                                "action" => "view",
                                                $category->id
                                            ]);
                                            ?>
                                        </li>
                                        <?php
                                    endforeach;
                                    ?>
                                </ul>
                            </td>
                        </tr>
                        <tr>
                            <th><?= __('Title') ?></th>

                            <td><?= h($label) ?></td>
                        </tr>
                        <tr>
                            <th><?= __('Created') ?></th>
                            <td><?= h($field->created) ?></td>
                        </tr>

                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
