<header id="header-style-1">
    <div class="container">
        <nav class="navbar yamm navbar-default">
            <div class="navbar-header">
                <button type="button" data-toggle="collapse" data-target="#navbar-collapse-1" class="navbar-toggle">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a href="index-2.html" class="navbar-brand">Jollyany</a>
            </div><!-- end navbar-header -->

            <div id="navbar-collapse-1" class="navbar-collapse collapse navbar-right">
                <?php
                $options = [
                    'ul_class' => 'nav navbar-nav',
                    'nested_ul_class' => 'dropdown-menu',
                    'li_class' => 'dropdown yamm-fw',
                    'opening_html_tags' => '<div class="yamm-content">
                                                    <div class="row">',
                    'closing_html_tags' => '</div></div>'
                ];

               // $this->Menus->buildMenu($menu_items, $options);

                ?>
                <ul class='nav navbar-nav' id=''>
                    <li class='dropdown yamm-fw' id=''><a class='' id='' href='#'>Home</a></li>
                    <li class='dropdown yamm-fw' id=''><a class='' id='' href='#'>Products</a>
                        <div class="yamm-content">
                            <div class="row">
                                <ul class='col-sm-4' id=''>
                                    <li class='' id=''><a class='' id='' href='#'>Bags</a></li>
                                    <li class='' id=''><a class='' id='' href='#'>Shoes</a></li>
                                </ul>
                            </div>
                        </div>
                    </li>
                    <li class='dropdown yamm-fw' id=''><a class='' id='' href='#'>About</a></li>
                    <li class='dropdown yamm-fw' id=''><a class='' id='' href='#'>Portfolio</a>
                        <div class="yamm-content">
                            <div class="row">
                                <ul class='col-sm-4' id=''>
                                    <li class='' id=''><a class='' id='' href='#'>Gallery</a></li>
                                </ul>
                            </div>
                        </div>
                    </li>
                </ul>

            </div><!-- #navbar-collapse-1 -->            </nav><!-- end navbar yamm navbar-default -->
    </div><!-- end container -->
</header><!-- end header-style-1 -->

