<?= $this->assign('title', 'Add Page'); ?>

<?= $this->Form->create($node, ['class' => 'form-horizontal ']) ?>
<div class="row">
    <div class="col-sm-12 col-md-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2> Add Page </h2>
                <ul class="nav navbar-right panel_toolbox">
                    <?= $this->Form->input("Add Page", ['type' => 'submit', 'class' => 'btn btn-success pull-right']) ?>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content" style="display:block;">
                <div class="col-sm-9 col-sx-12">
                    <?php
                    $content = '';

                    foreach ($fields as $field):
                        if (is_string($field)) {
                            $no_display_fields_array = ['id', 'apps_id','image_dir', 'created', 'modified', 'lft', 'rght', 'parent_id'];
                            if (in_array(strtolower($field), $no_display_fields_array)) {
                                // do nothing
                            } else {
                                if (strcasecmp($field, 'status') == 0) {
                                    $content .=
                                        '<div class="form-group">
                                            <label class="control-label col-md-2 col-sm-2 col-xs-12">
                                                ' . $this->Form->label($field) . '
                                            </label>
                                        <div class="col-md-10 col-sm-10 col-xs-12">' . $this->Form->input($field, [
                                            'options' => ['1' => 'Published', '2' => 'UnPublished', '3' => 'Trash'],
                                            'label' => false,
                                            'class' => 'form-control col-md-7 col-xs-12',
                                        ]) . '</div></div>';
                                } else if (strpos($field, 'ud_') === false) {
                                    $content .=
                                        '<div class="form-group">
                                            <label class="control-label col-md-2 col-sm-2 col-xs-12">
                                                ' . $this->Form->label($field) . '
                                            </label>
                                        <div class="col-md-10 col-sm-10 col-xs-12">' . $this->Form->input($field, [
                                            'label' => false,
                                            'class' => 'form-control col-md-7 col-xs-12',
                                        ]) . '</div></div>';
                                }
                            }
                        }
                    endforeach;
                    // print all form data
                    echo $content;
                    ?>
                    <?= $this->Form->input(__('Add Page'), ['type' => 'submit', 'class' => 'btn btn-success pull-right']) ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->Form->end() ?>

<?php echo $this->Html->script(['http://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js',
    'http://cdn.ckeditor.com/4.5.9/standard/ckeditor.js'
]); ?>

<script>
    $(document).ready(function () {
        var categories = $('#categories-id');
        categories.val(<?= $cat_id ?>);
        categories.on('change', function () {
            window.location.href = "<?php echo Cake\Routing\Router::url(array("action" => "add"));?>" + "/" + categories.val();
        });
    });
</script>
<script>
    CKEDITOR.replace('description');
</script>