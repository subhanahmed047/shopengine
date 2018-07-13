<?= $this->assign('title', 'Admin | Shop Engine'); ?>

<div class="row">
    <div class="col-md-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Plugins
                    <small> Enhance you store</small>
                </h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li>
                        <?= $this->Html->Link(__("<i class='fa fa-upload'></i> Upload Plugin"), [
                            '_name' => 'admin:upload:plugin'
                        ], [
                            'class' => 'btn btn-sm btn-info pull-right',
                            'escape' => false
                        ]); ?>
                    </li>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <p>Installed Plugins</p>

                <div class="row">
                    <?php foreach ($active_plugins as $plugin): ?>

                        <div class="col-sm-4">
                            <div class="thumbnail">
                                <div class="image view view-first">
                                    <img style="width: 100%; display: block;"
                                         src="<?= $plugin['src'] ?>"
                                         alt="image"/>
                                </div>
                                <div class="caption">
                                    <p><strong><?= $plugin['name'] ?></strong>
                                    </p>
                                    <p>By: <?= $plugin['author'] ?></p>
                                </div>
                                <div class="controls">
                                    <button class="btn btn-sm btn-primary pull-right margin-top-5 deactivate-plugin"
                                            data-name="<?= $plugin['name'] ?>">Deactivate
                                    </button>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
                <hr>
                <div class="row">

                    <p>All plugins</p>

                    <?php foreach ($plugins as $plugin): ?>

                        <?php if (!in_array($plugin['name'], $active_plugin_names)): ?>
                            <div class="col-sm-4">
                                <div class="thumbnail">
                                    <div class="image view view-first">
                                        <img style="width: 100%; display: block;" src="<?= $plugin['src'] ?>"
                                             alt="image"/>
                                    </div>
                                    <div class="caption">
                                        <p><strong><?= $plugin['name'] ?></strong>
                                        </p>
                                        <p class="text-muted">By: <?= $plugin['author'] ?></p>
                                    </div>
                                    <div class="controls">
                                        <button class="btn btn-sm btn-primary pull-right margin-top-5 activate-plugin"
                                                data-name="<?= $plugin['name'] ?>">Activate
                                        </button>
                                        <div class="btn-group margin-top-5 margin-right-5 dropup pull-right">
                                            <button class="btn btn-default btn-sm dropdown-toggle" type="button"
                                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="fa fa-bars"></i>
                                            </button>
                                            <ul class="dropdown-menu">
                                                <li class="text-danger">
                                                    <?= $this->Html->Link("<i class='fa fa-phone'></i> Contact Developer", "javascript:void(0)", ['class' => 'contactDeveloper text-danger', 'data-name' => $plugin['name'], 'escape' => false]); ?>
                                                </li>
                                                <li class="text-danger">
                                                    <?= $this->Html->Link("<i class='fa fa-file'></i> Support Page", "javascript:void(0)", ['class' => 'deletePlugin text-danger', 'data-name' => $plugin['name'], 'escape' => false]); ?>
                                                </li>
                                                <li class="divider"></li>
                                                <li class="text-danger">
                                                    <?= $this->Html->Link("<i class='fa fa-trash-o'></i> Delete This Plugin", "javascript:void(0)", ['class' => 'deletePlugin text-danger', 'data-name' => $plugin['name'], 'escape' => false]); ?>
                                                </li>
                                            </ul>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $('document').ready(function () {
        $('.activate-plugin').on('click', function () {
            var pluginName = $(this).attr('data-name');
            $(this).html("<i class='fa fa-circle-o-notch fa-spin fa-fw'></i> Activating...");
            $.ajax({
                type: "POST",
                url: "<?php echo Cake\Routing\Router::url([
                    "controller" => "Plugins",
                    "action" => "activate_plugin"
                ])?>" + "/" + pluginName,
                cache: false,
                success: function (data, textStatus, jqXHR) {
                    $(this).html("Activated");
                    location.reload();
                },
                error: function (data) {
                    alert('There was an error activating the plugin. Please try again later.');
                }
            });
        });

        $('.deactivate-plugin').on('click', function () {
            var pluginName = $(this).attr('data-name');
            $(this).html("<i class='fa fa-circle-o-notch fa-spin fa-fw'></i> Deactivating...");
            $.ajax({
                type: "POST",
                url: "<?php echo Cake\Routing\Router::url([
                    "controller" => "Plugins",
                    "action" => "deactivate_plugin"
                ])?>" + "/" + pluginName,
                cache: false,
                success: function (data, textStatus, jqXHR) {
                    $(this).html("Deactivated");
                    location.reload();
                },
                error: function (data) {
                    alert('There was an error deactivating the plugin. Please try again later.');
                }
            });
        });
    });
</script>
