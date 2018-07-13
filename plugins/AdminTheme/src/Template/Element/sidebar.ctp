<?php use App\Utility\AdminMenus\AdminMenus; ?>

<div class="navbar nav_title" style="border: 0;">
    <?= $this->Html->Link($this->Html->image('logo.png')." <span>Shop Engine</span>", [
        '_name' => 'admin:dashboard'
    ], [
        'escape' => false,
        'class' => 'site_title'
    ]);
    ?>
</div>
<div class="clearfix"></div>

<br/>


<!-- sidebar menu -->
<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">

    <div class="menu_section">
        <ul class="nav side-menu">
                <?php AdminMenus::buildMenu(); ?>
        </ul>
    </div>

</div>
<!-- /sidebar menu -->

<!-- /menu footer buttons -->
<!--<div class="sidebar-footer hidden-small">
    <a data-toggle="tooltip" data-placement="top" title="Settings">
        <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
    </a>
    <a data-toggle="tooltip" data-placement="top" title="FullScreen">
        <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
    </a>
    <a data-toggle="tooltip" data-placement="top" title="Lock">
        <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
    </a>
    <a data-toggle="tooltip" data-placement="top" title="Logout">
        <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
    </a>
</div>-->
