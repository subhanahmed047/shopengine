
<div class="row">
    <div class="col-sm-12 col-md-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title">
                <?php $label = ucwords(str_replace("_", " ", $node->title)); ?>
                <h2> <?= h($label) ?> </h2>
                <ul class="nav navbar-right panel_toolbox">
                    <?= $this->Html->Link(__('<i class="fa fa-bars"></i> View All'), [
                        'prefix' => 'admin',
                        'action' => 'index',
                        $node->id
                    ], [
                            'class' => 'btn btn-sm btn-primary pull-right',
                            'escape' => false,
                        ]
                    ); ?>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content" style="display:block;">
                <div class="col-sm-9 col-sx-12">
                    <table class="vertical-table table table-striped responsive-utilities jambo_table">
                        <?php

                        $status = $node->status;
                        $status_string = '';
                        switch ($status) {
                            case 1:
                                $status_string = 'Published';
                                break;
                            case 2:
                                $status_string = 'Unpublished';
                                break;
                            case 3;
                                $status_string = 'Trash';
                                break;
                        }

                        ?>
                        <tr>
                            <th><?= __('ID') ?></th>
                            <td><?= $this->Number->format($node->id) ?></td>
                        </tr>
                        <tr>
                            <th><?= __('Categories') ?></th>
                            <td>
                                <?= $node->has('category') ? $this->Html->link($node->category->name, ['controller' => 'Categories', 'action' => 'view', $node->category->id]) : ''
                                //h($node->category->name)   ?>
                            </td>
                        </tr>
                        <tr>
                            <th><?= __('Title') ?></th>

                            <td><?= h($label) ?></td>
                        </tr>
                        <tr>
                            <th><?= __('Quantity') ?></th>
                            <td><?= h($node->quantity) ?></td>
                        </tr>
                        <tr>
                            <th><?= __('Price') ?></th>
                            <td><?= h($node->price) ?></td>
                        </tr>
                        <tr>
                            <th><?= __('Status') ?></th>
                            <td><?= h($status_string) ?></td>
                        </tr>
                        <tr>
                            <th><?= __('Created') ?></th>
                            <td><?= h($node->created) ?></td>
                        </tr>
                        <!--<tr>
                            <th> /*= __('Created') */ */?> Buy This Product</th>
                            <td>
                                <form name="_xclick" action="https://www.sandbox.paypal.com/zaman" method="post">
                                    <input type="hidden" name="cmd" value="_xclick">
                                    <input type="hidden" name="business" value="zamanhaider31-buyer@gmail.com">
                                    <input type="hidden" name="currency_code" value="USD">
                                    <input type="hidden" name="quantity" value="1">
                                    <input type="hidden" name="item_name"
                                           value="<?/*= h($node->has('category') ? $this->Html->link($node->category->name, ['controller' => 'Categories', 'action' => 'view', $node->category->id]) : '' . ' ' . $node->title) */?>">
                                    <input type="hidden" name="return"
                                           value="http://www.demos.learnwebscripts.com/paypal/success.php">
                                    <input type="hidden" name="amount" value="<?/*= h($node->price) */?>">
                                    <input type="image" src="http://www.paypal.com/en_US/i/btn/btn_buynow_LG.gif"
                                           border="0"
                                           name="submit" alt="Make payments with PayPal - it's fast, free and secure!">
                                </form>

                            </td>
                        </tr>-->
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
