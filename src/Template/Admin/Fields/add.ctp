<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Fields'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Fieldtypes'), ['controller' => 'Fieldtypes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Fieldtype'), ['controller' => 'Fieldtypes', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Apps'), ['controller' => 'Apps', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New App'), ['controller' => 'Apps', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="fields form large-9 medium-8 columns content">
    <?= $this->Form->create($field) ?>
    <fieldset>
        <legend><?= __('Add Field') ?></legend>
        <?php
            echo $this->Form->input('fieldTypes_id', ['options' => $fieldtypes]);
            //echo $this->Form->hidden('apps_id', ['options' => $apps]);
            echo $this->Form->input('categories._ids', ['options' => $categories, 'label' => 'Categories (You may select multiple)', 'required' => true]);
            echo $this->Form->input('title');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
