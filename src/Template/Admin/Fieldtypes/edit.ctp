<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $fieldtype->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $fieldtype->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Fieldtypes'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="fieldtypes form large-9 medium-8 columns content">
    <?= $this->Form->create($fieldtype) ?>
    <fieldset>
        <legend><?= __('Edit Fieldtype') ?></legend>
        <?php
            echo $this->Form->input('name');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
