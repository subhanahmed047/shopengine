<!--<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?/*= __('Actions') */?></li>
        <li><?/*= $this->Html->link(__('List Orders'), ['action' => 'index']) */?></li>
        <li><?/*= $this->Html->link(__('List Customers'), ['controller' => 'Customers', 'action' => 'index']) */?></li>
        <li><?/*= $this->Html->link(__('New Customer'), ['controller' => 'Customers', 'action' => 'add']) */?></li>
        <li><?/*= $this->Html->link(__('List Nodes'), ['controller' => 'Nodes', 'action' => 'index']) */?></li>
        <li><?/*= $this->Html->link(__('New Node'), ['controller' => 'Nodes', 'action' => 'add']) */?></li>
    </ul>
</nav>-->

<div class="orders form large-9 medium-8 columns content">
    <?= $this->Form->create($order) ?>
    <fieldset>
        <legend><?= __('Add Order') ?></legend>
        <?php
            echo $this->Form->input('customer.first_name');
            echo $this->Form->input('customer.last_name');
            echo $this->Form->input('customer.email');
            echo $this->Form->input('customer.phone');
            echo $this->Form->input('customer.billing_address');
            echo $this->Form->input('customer.country',['options' => ['Pakistan' => 'Pakistan', 'China' => 'China', 'United States of America' => 'United States of America']]);
            echo $this->Form->input('customer.city', ['label'=>'Town/City']);
            echo $this->Form->input('payment_method',['options' => ['Payment on Delivery' => 'Payment on Delivery', 'Stripe' => 'Stripe', 'PayU' => 'PayU']]);

            echo '<hr><label>Your Order:</label>';
            echo '<div class="row">
                    <div class="col-sm-8">';
            foreach($products as $product){
                echo '<div class="col-sm-12 form-control">'.$product['name'].' X '.$product['quantity'].'</div>';
            }
            echo '<div class="col-sm-12 form-control">Total Quantity:'.$quantity.' | Total Price: '.$price.'</div>';
            echo '</div></div><hr>';
        ?>

    </fieldset>
    <?= $this->Form->button(__('Proceed to Checkout')) ?>
    <?= $this->Form->end() ?>
</div>
