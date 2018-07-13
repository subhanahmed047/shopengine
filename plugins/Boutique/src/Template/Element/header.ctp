<div class="header">
    <!-- Top bar -->
    <div class="top">
        <div class="container">
            <div class="row">
                <div class="col-sm-6">
                </div>
                <div class="col-sm-6 hidden-xs">
                    <ul class="list-inline pull-right">
                        <li>
                            <?php
                            if (isset($authUser['user'])) {
                                echo $this->Html->Link("<i class='fa fa-sign-in'></i> Login", [
                                    '_name' => 'users:login'
                                ], [
                                    'escape' => false,
                                    'title' => 'Login'
                                ]);
                                echo $this->Html->Link("<i class='fa fa-user'></i> Register", [
                                    '_name' => 'users:register'
                                ], [
                                    'escape' => false,
                                    'title' => 'Register'
                                ]);
                            } else {
                                echo $this->Html->Link("<i class='fa fa-sign-out'></i> Logout", [
                                    '_name' => 'users:logout'
                                ], [
                                    'escape' => false,
                                    'title' => 'Logout'
                                ]);
                                if ($authUser['role'] == 'admin') {
                                    echo $this->Html->Link("    | <i class='fa fa-dashboard'></i> Goto Dashboard", [
                                        '_name' => 'admin:dashboard'
                                    ], [
                                        'escape' => false,
                                        'title' => 'Dashboard'
                                    ]);
                                }
                            }
                            ?>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- End class="top" -->

    <!-- Logo-->
    <div class="bottom">
        <div class="container">
            <div class="row">
                <div class="col-sm-5 col-md-6">

                    <!-- Logo -->
                    <div class="logo">
                        <?= $this->Html->Link($this->Settings->getSiteName(), [
                            '_name' => 'shop'
                        ], [
                            'escape' => false,
                            'class' => 'font-50'
                        ]);
                        ?>
                    </div>
                    <!-- End class="logo"-->

                </div>
                <!-- Mini cart -->
                <div class="mini-cart">
                    <a href="cart.html" title="Go to cart &rarr;">
                        <span>3</span>
                    </a>
                </div>
                <!-- End class="mini-cart" -->

            </div>
        </div>
    </div>
    <!-- End class="bottom" -->

</div>