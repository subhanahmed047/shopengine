<?= $this->Form->create($node, ['class' => 'form-horizontal form-label-left','type' => 'file']) ?>
<div class="row">
    <div class="col-sm-12 col-md-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2><?= __('Add Product') ?></h2>
                <ul class="nav navbar-right panel_toolbox">
                    <?= $this->Form->input("Add Product", ['type' => 'submit', 'class' => 'btn btn-success pull-right']) ?>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content" style="display:block;">
                <div class="col-sm-12 col-sx-12">
                    <?php
                    $content = '';
                    foreach ($fields as $field):
                        $label = '';
                        if ($field == 'categories_id') {
                            $label = ucfirst(str_replace("_id", "", $field));
                        } else {
                            $label = ucwords(str_replace("_", " ", $field));
                        }
                        /*if(substr($field, 0, 3) == 'ud_'){
                            $label = str_replace("ud_", "", $field);
                        }*/

                        if (is_string($field)) {
                            $no_display_fields_array = ['id', 'apps_id', 'thumb', 'node_type', 'image_dir', 'created', 'modified', 'lft', 'rght', 'parent_id'];
                            if (in_array(strtolower($field), $no_display_fields_array)) {
                                // do nothing
                            } else {
                                if (strcasecmp($field, 'status') == 0 && $field != 'image') {

                                    $content .= '<div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="title">  ' .
                                        $label
                                        . '
                                       </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">' .
                                        $this->Form->input($field, [
                                            'options' => ['1' => 'Published', '2' => 'UnPublished', '3' => 'Trash'],
                                            'label' => false,
                                            'class' => 'form-control col-md-7 col-xs-12'
                                        ]) . '

                                        </div>
                                    </div>';

                                } else if (substr($field, 0, 3) != 'ud_' && $field != 'image') {
                                    $content .= '<div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="title"> ' . $label . '
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">' . $this->Form->input($field, [
                                            'label' => false,
                                            'class' => 'form-control col-md-7 col-xs-12'
                                        ]) . '

                                        </div>
                                    </div>';
                                } else if($field == 'image'){
                                    $content .= '<div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="title"> ' . $label . '
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">' . $this->Form->input($field.'[]', [
                                            'label' => false,
                                            'class' => 'form-control col-md-7 col-xs-12',
                                            'type' => 'file',
                                            'multiple' => 'true'
                                        ]) . '

                                        </div>
                                    </div>';
                                }else {
                                    $label = str_replace("ud_", "", $field);
                                    $label = ucwords(str_replace("_", " ", $label));
                                    $required = false;
                                    $small_tag = '';
                                    if($ud_fields_options[$field]['required']=='true'){
                                        $required = true;
                                        $small_tag = '<sup style="color:red">*</sup>';
                                    }else{
                                        $required = false;
                                    }

                                    $content .= '<div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="title"> '.$label.' '.$small_tag.'
                                        </label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">' . $this->Form->input($field, [
                                            'type' => $ud_fields_options[$field]['type'],
                                            'placeholder' => $ud_fields_options[$field]['placeholder'],
                                            'required' => $required,
                                            'label' => false,
                                            'class' => 'form-control col-md-7 col-xs-12',
                                            'options' => $ud_fields_options[$field]['options']

                                        ]) . '

                                        </div>
                                    </div>';
                                }
                            }
                        }
                    endforeach;

                    echo $content;

                    ?>

                    <?= $this->Form->end() ?>
                </div>
            </div>
        </div>
    </div>
</div>

<?php echo $this->Html->script([
    'http://code.jquery.com/jquery.min.js']); ?>
<script>
    $(document).ready(function () {
        var categories = $('#categories-id');
        categories.val(<?= $cat_id ?>);
        categories.on('change', function () {
            window.location.href = "<?php echo Cake\Routing\Router::url(array("action" => "add"));?>" + "/" + categories.val();
        });
    });

</script>
