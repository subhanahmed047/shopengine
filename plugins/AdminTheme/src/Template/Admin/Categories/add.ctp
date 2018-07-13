
<?= $this->Form->create($category, ['class' => 'form-horizontal ']) ?>
<div class="row">
    <div class="col-sm-12 col-md-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2> Add Category </h2>
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

                    <div class="form-group">
                        <label class="control-label col-md-2 col-sm-2 col-xs-12">
                            Name
                        </label>
                        <div class="col-md-10 col-sm-10 col-xs-12">
                            <?= $this->Form->input('Name', [
                            'label' => false,
                            'class' => 'form-control col-md-7 col-xs-12',
                            ]); ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-2 col-sm-2 col-xs-12">
                            Parent
                        </label>
                        <div class="col-md-10 col-sm-10 col-xs-12">
                            <?= $this->Form->input('Name', [
                                'label' => false,
                                'class' => 'form-control col-md-7 col-xs-12',
                                'options' => $parents,
                                'empty' => 'Select Parent'
                            ]); ?>
                        </div>
                    </div>
                    <?= $this->Form->input("Add Category", ['type' => 'submit', 'class' => 'btn btn-success pull-right']) ?>

                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->Form->end(); ?>