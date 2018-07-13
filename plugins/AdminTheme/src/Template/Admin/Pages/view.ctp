<div class="row">
    <div class="col-sm-12 col-md-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2> <?= h($node->title) ?> </h2>
                <ul class="nav navbar-right panel_toolbox">
                    <?= $this->Html->Link(__('<i class="fa fa-pencil"></i> Edit Page'), [
                        'prefix' => 'admin',
                        'action' => 'edit',
                        $node->id
                    ], [
                            'class' => 'btn btn-sm btn-success pull-right',
                            'escape' => false,
                        ]
                    ); ?>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content" style="display:block;">
                <div class="col-sm-9 col-sx-12">
                    <table class="vertical-table table table-striped responsive-utilities jambo_table">
                        <?php

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
                            <th><?= __('Title') ?></th>
                            <td><?= h($node->title) ?></td>
                        </tr>
                        <tr>
                            <th><?= __('Description') ?></th>
                            <td><?= html_entity_decode($node->description) ?></td>
                        </tr>
                        <tr>
                            <th><?= __('Status') ?></th>
                            <td><?= h($status_string) ?></td>
                        </tr>
                        <tr>
                            <th><?= __('Created') ?></th>
                            <td><?= h($node->created) ?></td>
                        </tr>

                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
