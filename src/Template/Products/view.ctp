<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Node'), ['action' => 'edit', $node->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Node'), ['action' => 'delete', $node->id], ['confirm' => __('Are you sure you want to delete # {0}?', $node->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Nodes'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Node'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Apps'), ['controller' => 'Apps', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New App'), ['controller' => 'Apps', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Categories'), ['controller' => 'Categories', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Category'), ['controller' => 'Categories', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="nodes view large-9 medium-8 columns content">
    <h3><?= h($node->title) ?></h3>
    <table class="vertical-table">
        <?php

        $status = $node->status;
        $status_string = '';
        switch($status){
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
        
        <!--<tr>
            <th><?/*= __('App') */?></th>
            <td><?/*= $node->has('app') ? $this->Html->link($node->app->title, ['controller' => 'Apps', 'action' => 'view', $node->app->id]) : '' */?></td>
        </tr>-->
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($node->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Category') ?></th>
            <td><?= /*$node->has('category') ? $this->Html->link($node->category->name, ['controller' => 'Categories', 'action' => 'view', $node->category->id]) : ''*/
                h($node->category->name)?></td>
        </tr>
        <tr>
            <th><?= __('Title') ?></th>
            <td><?= h($node->title) ?></td>
        </tr>
        <tr>
            <th><?= __('Quantity') ?></th>
            <td><?= h($node->quantity) ?></td>
        </tr>
        <tr>
            <th><?= __('Price') ?></th>
            <td><?= $this->Number->format($node->price) ?></td>
        </tr>
        <!--<tr>
            <th><?/*= __('Thumb') */?></th>
            <td><?/*= h($node->thumb) */?></td>
        </tr>-->
        <tr>
            <th><?= __('Image') ?></th>
            <td><?= h($node->image) ?></td>
        </tr>
        <tr>
            <th><?= __('Status') ?></th>
            <td><?= h($status_string) ?></td>
        </tr>
        <tr>
            <th><?= __('Created') ?></th>
            <td><?= h($node->created) ?></td>
        </tr>
       <!-- <tr>
            <th><?/*= __('Modified') */?></th>
            <td><?/*= h($node->modified) */?></td>
        </tr>-->
        <tr>
            <th><?/*= __('Created') */?> Buy This Product</th>
            <td><form name="_xclick" action="https://www.sandbox.paypal.com/zaman" method="post">
                 <input type="hidden" name="cmd" value="_xclick">
                 <input type="hidden" name="business" value="zamanhaider31-buyer@gmail.com">
                 <input type="hidden" name="currency_code" value="USD">
                 <input type="hidden" name="quantity" value="1">
                 <input type="hidden" name="item_name" value="<?= h($node->category->name.' '.$node->title) ?>">
                 <input type="hidden" name="return" value="http://www.demos.learnwebscripts.com/paypal/success.php">
                 <input type="hidden" name="amount" value="<?= h($node->price) ?>">
                 <input type="image" src="http://www.paypal.com/en_US/i/btn/btn_buynow_LG.gif" border="0" name="submit" alt="Make payments with PayPal - it's fast, free and secure!">
                </form>

</td>
        </tr>
    </table>
</div>
