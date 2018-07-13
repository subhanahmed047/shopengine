<?php
    $this->start('css');
        echo $this->Html->css(['bootstrap-multiselect.css', 'form-builder', 'form-render']);
    $this->end();
    echo $this->Form->create($field, ['class' => 'form-horizontal form-label-left', 'id' => 'fields-form'])
?>
<div class="row">
    <div class="col-sm-12 col-md-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <h2> Add Field </h2>
                <ul class="nav navbar-right panel_toolbox">

                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content" style="display:block;">

                <?php
                echo $this->AdminForm->input('categories._ids', ['options' => $categories, 'required' => true, 'id' => 'categories-select'], 'Select Categories');
                echo $this->Form->input('fields', ['id' => 'custom-rendered-fields', 'value' => '', 'hidden' => true, 'label' => false]);
                ?>
                <hr>
                <!-- form builder-->
                <section id="main_content" class="inner">
                    <div class="build-form">
                        <textarea id="fb-template"></textarea>
                    </div>
                    <div class="render-form clearfix">
                        <div id="rendered-form">
                            <p class="cta">Add some fields to the formBuilder above and render them here.</p>
                        </div>
                        <button type="button" id="render-form-button" class="btn btn-primary edit-form">Edit Form
                        </button>
                    </div>

                </section>
                <!-- <div class="btn btn-default" id="custom-rendered-fields">Hello</div>-->
            </div>
        </div>
    </div>
</div>
<?= $this->Form->end() ?>


<?php echo $this->Html->script([

    'http://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js',
    'form-builder',
    'form-render',
    'dropdown',
    'formBuilderSettings',
    'bootstrap.min.js',
    'bootstrap-multiselect'
]); ?>
<script>
    /*var categories_select = $('#categories-select');

    categories_select.multiselect({
        buttonWidth: '100%',
        enableFiltering: true
    });*/
    /*if(document.getElementById('custom-rendered-fields').innerText != 'Hello') {
        alert('Not equal');
        $.ajax({
            url: "http://localhost/shop/data.php",
            data: {data: document.getElementById('custom-rendered-fields').innerText},
            type: 'post',
            success: function (data) {
                alert("Posted");
            }
        });
    }*/

    /*$('#custom-rendered-fields').click(function(){
        var fields = $('#custom-rendered-fields').text();
        //alert(fields);
        $.ajax({
            type: "POST",
            data: {data:fields},
            url:"?php echo Cake\Routing\Router::url(array("controller" => "Fields", "action" => "setFieldsXml"));?>",
            success: function (data, textStatus, jqXHR) {
                alert("Success: " + data);
            },
            error: function (data, textStatus, jqXHR) {
                alert("Error: " + data);
            }
        });
    });*/
</script>

<script>
    var categories_select = $('#categories-select');

    categories_select.multiselect({
        buttonWidth: '100%',
        enableFiltering: true
    });
</script>
