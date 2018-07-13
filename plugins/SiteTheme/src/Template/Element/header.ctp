<div id="sticky">

    <header>
        <div class="container">
            <div class="row">

                <!-- Logo -->
                <div id="logo" class="col-sm-3">
                    <?=
                    $this->Html->Link($this->Html->image('logo2.png', ['alt' => 'Logo']), [
                        'controller' => 'Home',
                        'action' => 'index'
                    ], [
                        'escape' => false
                    ]);
                    ?>
                </div>
                <!--/ logo -->

                <!-- Menu -->
                <div class="col-sm-6">
                    <nav id="menu" class="navbar">
                        <div class="navbar-header"><span id="category" class="visible-xs">Categories</span>
                            <button type="button" class="btn btn-navbar navbar-toggle" data-toggle="collapse"
                                    data-target=".navbar-ex1-collapse"><i class="fa fa-bars"></i></button>
                        </div>
                        <div class="collapse navbar-collapse navbar-ex1-collapse">
                            <?php
                            $options = [
                                'ul_class' => 'nav navbar-nav',
                                'nested_ul_class' => 'list-unstyled',
                                'li_class' => 'dropdown',
                                'opening_html_tags' => '<span class="dropdown-triangle"></span>
                                                        <div class="dropdown-menu">
                                                            <div class="dropdown-inner">',
                                'closing_html_tags' => '</div></div>'
                            ];
                            ?>
                            <?= $this->Menus->buildMenu($menu_items, $options); ?>
                        </div>
                    </nav>
                </div>
                <!--/ Menu -->

                <!-- Shopping Cart -->
                <div class="col-sm-3">
                    <div class="shopping-cart">
                        <button type="button" data-toggle="dropdown"
                                class="btn btn-inverse btn-lg btn-block dropdown-toggle"><span class="cart-text">CART / $0.00</span><span
                                class="cart-icon"><strong>0</strong><span class="cart-icon-handle"></span></span>
                        </button>
                        <ul class="dropdown-menu pull-right">
                            <li class="dropdown-triangle"></li>
                            <li>
                                <p>Your shopping cart is empty!</p>
                            </li>
                        </ul>
                    </div>

                </div>
                <!--/ Shopping Cart -->

            </div>
        </div>
    </header>

</div>