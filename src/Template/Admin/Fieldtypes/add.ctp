<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Fieldtypes'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="fieldtypes form large-9 medium-8 columns content">
    <?= $this->Form->create($fieldtype) ?>
    <fieldset>
        <legend><?= __('Add Fieldtype') ?></legend>
        <?php
            echo $this->Form->input('name');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
