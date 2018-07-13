<?php $products = [
    'nodes' => 'Nodes',
    'orders' => 'Orders',
    'users' => 'Users'
]; ?>
<div class="container">
    <div class="row">
        <div class="col-sm-6 col-sm-offset-3">
            <?= $this->Form->create('export' , ['url' => ['action' => 'export']]); ?>
            <?= $this->Form->input('table', ['options' => $products, 'label' => 'Select a Table you want to Export', 'class' => 'form-control']); ?>
            <?= $this->Form->button(__('Export'), [
                'class' => 'btn btn-success pull-right',
                'style' => 'margin-top: 5px;'
            ]); ?>
            <?= $this->Form->end(); ?>

        </div>
    </div>
</div>