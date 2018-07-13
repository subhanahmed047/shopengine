<div class="container-fluid" style="min-height: 350px;
                                    background: url('http://www.splitshire.com/wp-content/uploads/2015/03/SplitShire-8098-1800x1200.jpg');
                                    background-position: center;">
    <h1 class="text-center" style="color: white; margin-top: 17%; font-family: " Helvetica Neue", Helvetica, Arial,
    sans-serif">Welcome to your Store, <?= $authUser['name'] ?></h1>

</div>
<br><br>
<div class="row">
    <div class="col-md-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Here are the things you can do with your store.</h2>
                <ul class="nav navbar-right panel_toolbox"></ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="well text-center">
                            <h2>Change The Look & Feel of you store.</h2>
                            <?= $this->Html->Link("<i class='fa fa-television'></i> Go to Themes", [
                                'controller' => 'Themes',
                                'action' => 'index'
                            ], [
                                'class' => 'btn btn-warning',
                                'escape' => false
                            ]); ?>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="well text-center">
                            <h2>Add your store's first product.</h2>
                            <?= $this->Html->Link("<i class='fa fa-tag'></i> New Product", [
                                'controller' => 'Products',
                                'action' => 'add'
                            ], [
                                'class' => 'btn btn-success',
                                'escape' => false
                            ]); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>