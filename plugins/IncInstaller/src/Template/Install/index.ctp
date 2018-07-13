<section class="container">
    <div class="row" style="margin-top: 100px;">
        <div class="col-sm-4 col-sm-offset-4">
            <?= $this->Flash->render('auth') ?>
            <h3 class="text-center text-muted">Enter Credentials</h3>
            <?= $this->Form->create() ?>
            <div>
                <?= $this->Form->input('host', [
                    'class' => 'form-control',
                    'placeholder' => 'Host i.e localhost',
                    'required' => true,
                    'label' => false,
                    'value' => 'localhost'
                ]); ?>
            </div>
            <div>
                <?= $this->Form->input('username', [
                    'class' => 'form-control',
                    'placeholder' => 'Username i.e root',
                    'required' => true,
                    'label' => false,
                    'value' => 'root'
                ]); ?>
            </div>
            <div>
                <?= $this->Form->input('password', [
                    'class' => 'form-control',
                    'placeholder' => 'Password',
                    'label' => false
                ]); ?>
            </div>
            <div>
                <?= $this->Form->input('database', [
                    'class' => 'form-control',
                    'placeholder' => 'Database Name',
                    'required' => true,
                    'label' => false
                ]); ?>
            </div>
            <div>
                <br>
                <?php
                echo $this->Form->button(__('Generate Shop'), [
                    'class' => 'btn btn-primary submit pull-right margin-top-5',
                    'id' => 'generate'
                ]);
                echo $this->Form->end()
                ?>
            </div>
            <div class="clearfix"></div>
            <div class="separator">
                <div class="clearfix"></div>
                <br/>
                <div class="text-center">
                    <h1><?= $this->Html->Link($this->Html->image('AdminTheme.logo.png'), [
                            '_name' => 'shop'
                        ], [
                            'escape' => false
                        ]); ?> Shop Engine</h1>

                    <p>©2016 All Rights Reserved. <br><?= $this->Html->Link(__('TeamIncredibles'), [
                            'http://teamincredibles.com'
                        ], [
                            'target' => '_blank'
                        ]); ?>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
$('#generate').click( function(){
    $(this).text('Generating Your Store ...');
});
</script>