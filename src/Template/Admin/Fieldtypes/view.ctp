<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Fieldtype'), ['action' => 'edit', $fieldtype->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Fieldtype'), ['action' => 'delete', $fieldtype->id], ['confirm' => __('Are you sure you want to delete # {0}?', $fieldtype->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Fieldtypes'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Fieldtype'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="fieldtypes view large-9 medium-8 columns content">
    <h3><?= h($fieldtype->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Name') ?></th>
            <td><?= h($fieldtype->name) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($fieldtype->id) ?></td>
        </tr>
    </table>
</div>
