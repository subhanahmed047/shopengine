<nav class="navigation">
    <div class="container">

        <div class="row">
            <div class="col-md-9">

                <a href="#" class="main-menu-button">Navigation</a>
                <!-- Begin Menu Container -->
                <div class="megamenu_container">
                    <div class="menu-main-navigation-container">
                        <?php
                            $options = [
                                'ul_class' => 'main-menu',
                                'ul_id' => 'menu-main-navigation',
                                'li_class' => 'menu-item-has-children',
                                'nested_li_class' => '',
                                'nested_ul_class' => 'sub_menu'
                            ];

                        echo $this->Menus->buildMenu($menu_items, $options);

                        ?>

                    </div>
                </div>


            </div>

            <div class="col-md-3 visible-lg">


            </div>
        </div>

    </div>
</nav>