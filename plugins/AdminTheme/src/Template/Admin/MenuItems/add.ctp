<div class="row">
    <div class="col-md-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Menus
                    <small> Navigation's of your store</small>
                </h2>
                <ul class="nav navbar-right panel_toolbox"></ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <div class="row">
                    <div class="col-sm-8 col-sm-offset-2">
                        <?= $this->Form->create($menuItem, ['class' => 'form-horizontal form-label-left']) ?>

                        <?= $this->Form->input('url', ['type' => 'hidden', 'id' => 'url']); ?>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="title"> Link with
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <?= $this->Form->input('link', ['options' => $node_types, 'class' => 'form-control col-xs-12', 'label' => false, 'id' => 'controllers']); ?>
                                    </div>
                                    <div class="col-sm-6">
                                        <?php //debug($pages); ?>
                                        <?= $this->Form->input('link', ['options' => $pages, 'class' => 'form-control col-xs-12', 'label' => false, 'id' => 'actions']); ?>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="title"> Parent
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <?= $this->Form->input('parent_id', ['options' => $parentMenuItems, 'class' => 'form-control col-md-7 col-xs-12', 'label' => false, 'empty' => 'No parent menu']); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="title"> Menu
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <?= $this->Form->input('menu_id', ['options' => $menus, 'class' => 'form-control col-md-7 col-xs-12', 'label' => false]); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12" for="title">Title <span
                                    class="required">*</span>
                            </label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <?= $this->Form->input('title', ['class' => 'form-control col-md-7 col-xs-12', 'label' => false, 'id' => 'title', 'required' => true]); ?>
                            </div>
                        </div>

                        <div class="ln_solid"></div>
                        <div class="form-group">
                            <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                                <?= $this->Form->button(__('Submit'), [
                                    'class' => 'btn btn-success pull-right'
                                ]) ?>
                            </div>
                        </div>
                        <?= $this->Form->end() ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>

    $('#controllers').change(function () {
        var controller = $('#controllers').val();
        switch (controller) {
            case 'Page':
                $('#actions').empty();
            <?php foreach ($pages as $key => $value): ?>
                $('#actions').append('<option value="<?= $key; ?>"><?= $value; ?></option>');
            <?php endforeach; ?>
                //alert('yes');
                bindURL();
                break;
            case 'Product':
                $('#actions').empty();
            <?php foreach ($categories as $key => $value): ?>
                $('#actions').append('<option value="<?= $key; ?>"><?= $value; ?></option>');
            <?php endforeach; ?>
                bindURL();
                break;
        }
    });
    bindURL();
    $('#actions').change(function () {
        bindURL();
        $('#title').val($('#actions option:selected').text());
    });

    function bindURL() {
        var controller = $('#controllers').val();
        var id = $('#actions').val();
        var url = controller + ',view,' + id;
        $('#url').val(url);
    }

</script>
