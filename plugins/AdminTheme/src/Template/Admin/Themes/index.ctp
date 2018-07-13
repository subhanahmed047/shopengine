<div class="row">
    <div class="col-md-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Themes
                    <small> Look & Feel of your store</small>
                </h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li>
                        <?= $this->Html->Link(__("<i class='fa fa-upload'></i> Upload Theme"), [
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
                <p>Active Theme</p>
                <div class="row">
                    <div class="col-sm-4">
                        <div class="thumbnail">
                            <div class="image view view-first">
                                <img style="width: 100%; display: block;"
                                     src="<?= $active_theme['src'] ?>"
                                     alt="image"/>
                            </div>
                            <div class="caption">
                                <p><strong><?= $active_theme['name'] ?></strong>
                                </p>
                                <p>By: <?= $active_theme['author'] ?></p>
                            </div>
                            <div class="controls">
                                <?= $this->Html->Link(__('<i class="fa fa-tv"></i> Visit Store'), [
                                    'prefix' => false,
                                    'controller' => 'Home',
                                    'action' => 'index'
                                ], [
                                        'class' => 'btn btn-sm btn-warning pull-right margin-top-5',
                                        'escape' => false,
                                        'target' => '_blank'
                                    ]
                                ); ?>
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="row">

                    <p>All Themes</p>

                    <?php foreach ($themes as $theme): ?>

                        <?php if (strcasecmp($theme['name'], $active_theme['name']) !== 0): ?>
                            <div class="col-sm-4">
                                <div class="thumbnail">
                                    <div class="image view view-first">
                                        <img style="width: 100%; display: block;" src="<?= $theme['src'] ?>"
                                             alt="image"/>
                                    </div>
                                    <div class="caption">
                                        <p><strong><?= $theme['name'] ?></strong>
                                        </p>
                                        <p>By: <?= $theme['author'] ?></p>
                                    </div>
                                    <div class="controls">
                                        <button class="btn btn-sm btn-primary pull-right margin-top-5 activate-theme"
                                                data-name="<?= $theme['name'] ?>">Activate
                                        </button>
                                        <?php debug($theme['name']);?>
                                        <?= $this->Html->Link(__('Preview'), [
                                            'prefix' => false,
                                            'controller' => 'Home',
                                            'action' => 'index',
                                            openssl_encrypt($theme['name'], 'aes128', $salt, true, "1234567812345678")
                                        ], [
                                                'class' => 'btn btn-sm btn-default pull-right margin-top-5',
                                                'escape' => false,
                                                'target' => '_blank'
                                            ]
                                        ); ?>
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
        $('.activate-theme').on('click', function () {
            var themeName = $(this).attr('data-name');
            $(this).html("<i class='fa fa-circle-o-notch fa-spin fa-fw'></i> Activating...");
            $.ajax({
                type: "POST",
                url: "<?php echo Cake\Routing\Router::url([
                    "controller" => "Themes",
                    "action" => "activate_theme"
                ])?>" + "/" + themeName,
                cache: false,
                success: function (data, textStatus, jqXHR) {
                    $(this).html("Activated");
                    location.reload();
                },
                error: function (data) {
                    alert('There was an error activating the theme. Please try again later.');
                }
            });
        });
    });
</script>
