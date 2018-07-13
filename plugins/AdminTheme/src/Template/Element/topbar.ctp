<nav class="" role="navigation">
    <div class="nav toggle">
        <a id="menu_toggle"><i class="fa fa-bars"></i></a>
    </div>
    <ul class="nav navbar-nav navbar-right">
        <?= $this->Html->Link(__('<i class="fa fa-tv"></i> Visit Store'), [
            '_name' => 'shop'
        ], [
                'class' => 'btn btn-default user-profile pull-right margin-top-12',
                'escape' => false,
                'target' => '_blank',
                'aria-expanded' => "false"
            ]
        ); ?>

        <li class="">
            <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                <?= $authUser['name'] ?>
                <span class=" fa fa-angle-down"></span>
            </a>
            <ul class="dropdown-menu dropdown-usermenu animated fadeInDown pull-right">
                <li><?= $this->Html->Link(__("Profile"), [
                        '_name' => 'admin:users:profile',
                        $authUser['id']
                    ]); ?></li>
                <li>
                    <a href="javascript:;">
                        <span class="badge bg-red pull-right">50%</span>
                        <span>Settings</span>
                    </a>
                </li>
                <li>
                    <a href="javascript:;">Help</a>
                </li>
                <li>
                    <?= $this->Html->Link(__('Log Out'), [
                        '_name' => 'users:logout'
                    ]); ?>
                </li>
            </ul>
        </li>
    </ul>
</nav>
