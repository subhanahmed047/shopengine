<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Order'), ['action' => 'edit', $order->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Order'), ['action' => 'delete', $order->id], ['confirm' => __('Are you sure you want to delete # {0}?', $order->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Orders'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Order'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Customers'), ['controller' => 'Customers', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Customer'), ['controller' => 'Customers', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Nodes'), ['controller' => 'Nodes', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Node'), ['controller' => 'Nodes', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="orders view large-9 medium-8 columns content">
    <h3><?= h($order->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Customer') ?></th>
            <td><?= $order->has('customer') ? $this->Html->link($order->customer->id, ['controller' => 'Customers', 'action' => 'view', $order->customer->id]) : '' ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($order->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Total Quantity') ?></th>
            <td><?= $this->Number->format($order->total_quantity) ?></td>
        </tr>
        <tr>
            <th><?= __('Total Price') ?></th>
            <td><?= $this->Number->format($order->total_price) ?></td>
        </tr>
        <tr>
            <th><?= __('Created') ?></th>
            <td><?= h($order->created) ?></td>
        </tr>
        <tr>
            <th><?= __('Modified') ?></th>
            <td><?= h($order->modified) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Nodes') ?></h4>
        <?php if (!empty($order->nodes)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Apps Id') ?></th>
                <th><?= __('Categories Id') ?></th>
                <th><?= __('Parent Id') ?></th>
                <th><?= __('Title') ?></th>
                <th><?= __('Quantity') ?></th>
                <th><?= __('Status') ?></th>
                <th><?= __('Price') ?></th>
                <th><?= __('Thumb') ?></th>
                <th><?= __('Image') ?></th>
                <th><?= __('Node Type') ?></th>
                <th><?= __('Description') ?></th>
                <th><?= __('Lft') ?></th>
                <th><?= __('Rght') ?></th>
                <th><?= __('Created') ?></th>
                <th><?= __('Modified') ?></th>
                <th><?= __('Ud Engine No') ?></th>
                <th><?= __('Ud Toyota Barcode') ?></th>
                <th><?= __('Ud Mehran Efi') ?></th>
                <th><?= __('Ud Chasis No') ?></th>
                <th><?= __('Ud Model') ?></th>
                <th><?= __('Ud Email') ?></th>
                <th><?= __('Ud Tyres') ?></th>
                <th><?= __('Ud Name') ?></th>
                <th><?= __('Ud Gender') ?></th>
                <th><?= __('Ud Country') ?></th>
                <th><?= __('Ud Send Newsletters') ?></th>
                <th><?= __('Ud Game') ?></th>
                <th><?= __('Ud Boy') ?></th>
                <th><?= __('Ud Test Field') ?></th>
                <th><?= __('Ud Faran') ?></th>
                <th><?= __('Ud Jango') ?></th>
                <th><?= __('Ud Head Lights') ?></th>
                <th><?= __('Ud Text Field') ?></th>
                <th><?= __('Ud Stereo') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($order->nodes as $nodes): ?>
            <tr>
                <td><?= h($nodes->id) ?></td>
                <td><?= h($nodes->apps_id) ?></td>
                <td><?= h($nodes->categories_id) ?></td>
                <td><?= h($nodes->parent_id) ?></td>
                <td><?= h($nodes->title) ?></td>
                <td><?= h($nodes->quantity) ?></td>
                <td><?= h($nodes->status) ?></td>
                <td><?= h($nodes->price) ?></td>
                <td><?= h($nodes->thumb) ?></td>
                <td><?= h($nodes->image) ?></td>
                <td><?= h($nodes->node_type) ?></td>
                <td><?= h($nodes->description) ?></td>
                <td><?= h($nodes->lft) ?></td>
                <td><?= h($nodes->rght) ?></td>
                <td><?= h($nodes->created) ?></td>
                <td><?= h($nodes->modified) ?></td>
                <td><?= h($nodes->ud_Engine_no) ?></td>
                <td><?= h($nodes->ud_toyota_barcode) ?></td>
                <td><?= h($nodes->ud_mehran_efi) ?></td>
                <td><?= h($nodes->ud_chasis_no) ?></td>
                <td><?= h($nodes->ud_Model) ?></td>
                <td><?= h($nodes->ud_email) ?></td>
                <td><?= h($nodes->ud_Tyres) ?></td>
                <td><?= h($nodes->ud_name) ?></td>
                <td><?= h($nodes->ud_gender) ?></td>
                <td><?= h($nodes->ud_country) ?></td>
                <td><?= h($nodes->ud_send_newsletters) ?></td>
                <td><?= h($nodes->ud_game) ?></td>
                <td><?= h($nodes->ud_boy) ?></td>
                <td><?= h($nodes->ud_test_field) ?></td>
                <td><?= h($nodes->ud_faran) ?></td>
                <td><?= h($nodes->ud_jango) ?></td>
                <td><?= h($nodes->ud_head_lights) ?></td>
                <td><?= h($nodes->ud_text_field) ?></td>
                <td><?= h($nodes->ud_stereo) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'Nodes', 'action' => 'view', $nodes->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'Nodes', 'action' => 'edit', $nodes->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'Nodes', 'action' => 'delete', $nodes->id], ['confirm' => __('Are you sure you want to delete # {0}?', $nodes->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
