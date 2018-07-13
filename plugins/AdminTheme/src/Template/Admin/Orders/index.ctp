<?= $this->start('css'); ?>
<?= $this->Html->css([
    'https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css'
]); ?>
<?= $this->end(); ?>
<?= $this->start('script'); ?>
<?= $this->Html->script([
    'https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js',
    'https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js'
]); ?>
<?= $this->end(); ?>

<div class="row">
    <div class="col-md-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Orders</h2>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <div class="row">
                    <div class="col-sm-12">
                        <table cellpadding="0" cellspacing="0"
                               class="table table-striped responsive-utilities jambo_table"
                               id="datatable">
                            <thead>
                            <tr>
                                <th><?= __('Customer') ?></th>
                                <th><?= __('Total Quantity') ?></th>
                                <th><?= __('Total Price') ?></th>
                                <th><?= __('Payment Status') ?></th>
                                <th><?= __('Created') ?></th>
                               <!-- <th class="actions"><?/*= __('Actions') */?></th>-->
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <?php

                                foreach ($orders as $order): ?>
                                <td><?= h($order->customer->first_name) ?></td>
                                <td><?= h($order->total_quantity); ?></td>
                                <td><?= $this->Number->format(h($order->total_price)) ?></td>
                                <td><?= h($order->payment_status) ?></td>
                                <td><?= $order->created ?></td>
                                <!--<td class="actions">
                                    <?/*= $this->Html->link(__('View'), ['action' => 'view', $order->id]) */?>
                                    <?/*= $this->Form->postLink(__('Delete'), ['action' => 'delete', $order->id], ['confirm' => __('Are you sure you want to delete # {0}?', $order->id)]) */?>
                                </td>-->
                            </tr>
                            <?php endforeach; ?>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function () {
        $('#datatable').DataTable();
    });
</script>
