<section class="login_content">
    <h1>Create Acount</h1>
    <?= $this->Form->create($user) ?>
    <div>
        <?= $this->Form->input('name', [
            'class' => 'form-control',
            'placeholder' => 'Full Name',
            'required' => true,
            'label' => false
        ]); ?>
    </div>
    <div>
        <?= $this->Form->input('username', [
            'class' => 'form-control',
            'placeholder' => 'Username',
            'required' => true,
            'label' => false
        ]); ?>
    </div>
    <div>
        <?php
        if($authUser['role'] == 'admin') {
            echo $this->Form->input('role', [
                'options' => ['admin' => 'Admin', 'manager' => 'Manager', 'customer' => 'Customer'],
                'class' => 'form-control',
                'required' => true,
                'label' => false,
                'style' => 'margin-bottom: 20px'
            ]);
        }
        ?>
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
        echo $this->Form->button(__('Register'), [
            'class' => 'btn btn-default submit pull-right'
        ]);
        echo $this->Form->end()
        ?>
    </div>
    <div class="clearfix"></div>
    <div class="separator">

        <p class="change_link">Already a member?
            <?= $this->Html->Link(__('Login'), [
                '_name' => 'users:login'
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


