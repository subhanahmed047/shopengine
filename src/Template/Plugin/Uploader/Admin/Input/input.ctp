<?= $this->start('css'); ?>
<?= $this->Html->css('dropzone.css'); ?>
<?= $this->end(); ?>
<?= $this->start('script'); ?>
<?= $this->Html->script('dropzone.js'); ?>
<?= $this->end(); ?>

<div class="row">
    <div class="col-md-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Upload Content
                    <small> Upload Themes & Plugins here</small>
                </h2>
                <ul class="nav navbar-right panel_toolbox">
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <?php

                echo $this->Form->create($input, ['type' => 'file', 'class' => "dropzone"]);
                echo $this->Form->input('zip', ['type' => 'file']);
                echo $this->Form->button('Submit');
                echo $this->Form->end();

                ?>
            </div>
        </div>
    </div>
</div>

