<section class="login_content">
    <?= $this->Flash->render('auth') ?>
    <h1>Login</h1>
    <?= $this->Form->create() ?>
    <div>
        <?= $this->Form->input('username', [
            'class' => 'form-control',
            'placeholder' => 'Username',
            'required' => true,
            'label' => false
        ]); ?>
    </div>
    <div>
        <?= $this->Form->input('password', [
            'class' => 'form-control',
            'placeholder' => 'Password',
            'required' => true,
            'label' => false
        ]); ?>
    </div>
    <div>
        <?php
        echo $this->Html->Link(__('Lost Password?'), [
            '#'
        ], [
            'class' => 'pull-left'
        ]);
        echo $this->Form->button(__('Log in'), [
            'class' => 'btn btn-default submit pull-right'
        ]);
        echo $this->Form->end()
        ?>
    </div>
    <div class="clearfix"></div>
    <div class="separator">

        <p class="change_link">New to site?
            <?= $this->Html->Link(__('Create Account'), [
                '_name' => 'users:register'
            ]); ?>
        </p>
        <div class="clearfix"></div>
        <br/>
        <div>
            <h1><?= $this->Html->Link($this->Html->image('logo.png'), [
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
</section>
