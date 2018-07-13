<?= $this->start('css'); ?>
<?= $this->Html->css(['form-builder', 'form-render']); ?>
<?= $this->end(); ?>

<div class="row">
    <div class="col-sm-12 col-md-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2> Add Node </h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content" style="display:block;">
                <?= $this->Form->create($node, ['class' => 'form-horizontal form-label-left']) ?>
                <fieldset>
                    <?php
                    $content = '';

                    foreach ($fields as $field):
                        if (is_string($field)) {
                            $no_display_fields_array = ['id', 'apps_id', 'created', 'modified', 'lft', 'rght', 'parent_id'];
                            if (in_array(strtolower($field), $no_display_fields_array)) {
                                // do nothing
                            } else {
                                if (strcasecmp($field, 'status') == 0) {
                                    $content .=
                                        '<div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12">
                                                ' . $this->Form->label($field) . '
                                            </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">' . $this->Form->input($field, [
                                            'options' => ['1' => 'Published', '2' => 'UnPublished', '3' => 'Trash'],
                                            'label' => false,
                                            'class' => 'form-control col-md-7 col-xs-12',
                                        ]) . '</div></div>';
                                } else if (strpos($field, 'ud_') === false) {
                                    $content .=
                                        '<div class="form-group">
                                            <label class="control-label col-md-3 col-sm-3 col-xs-12">
                                                ' . $this->Form->label($field) . '
                                            </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">' . $this->Form->input($field, [
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
                </fieldset>
                <!--<hr>-->
                <div class="ln_solid"></div>
                <div id="ud-fields">
                </div>
                <div class="form-group">
                    <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                        <?= $this->Form->button(__('Submit'), ['class' => 'btn btn-success']) ?>
                    </div>
                </div>
                <?= $this->Form->end() ?>
                <hr>
                <!-- form builder-->
                <section id="main_content" class="inner">
                    <div class="build-form">
                        <textarea id="fb-template"></textarea>
                    </div>
                    <div class="render-form clearfix">
                        <form id="rendered-form">
                            <p class="cta">Add some fields to the formBuilder above and render them here.</p>
                        </form>
                        <button type="button" id="render-form-button" class="btn btn-primary edit-form">Edit Form
                        </button>
                    </div>
                </section>
            </div>
        </div>
    </div>
</div>

<?php echo $this->Html->script(['http://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js',
    'form-builder',
    'form-render',
    'dropdown',
    'formBuilderSettings'
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