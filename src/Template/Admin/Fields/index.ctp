<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Field'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Fieldtypes'), ['controller' => 'Fieldtypes', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Fieldtype'), ['controller' => 'Fieldtypes', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Apps'), ['controller' => 'Apps', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New App'), ['controller' => 'Apps', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="fields index large-9 medium-8 columns content">
    <h3><?= __('Fields') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
        <tr>
            <th><?= $this->Paginator->sort('id') ?></th>
            <th><?= $this->Paginator->sort('fieldTypes_id') ?></th>
            <th><?= $this->Paginator->sort('Category') ?></th>
            <th><?= $this->Paginator->sort('title') ?></th>
            <th><?= $this->Paginator->sort('created') ?></th>
            <th class="actions"><?= __('Actions') ?></th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($fields as $field): ?>
            <tr>
                <td><?= $this->Number->format($field->id) ?></td>
                <td><?= $field->has('fieldtype') ? $this->Html->link($field->fieldtype->name, ['controller' => 'Fieldtypes', 'action' => 'view', $field->fieldtype->id]) : '' ?></td>
                <td>
                    <?php
                    $category_ids = [];
                    $category_names = [];
                    foreach ($field->categories as $category) {
                        array_push($category_ids, $category->id);
                        array_push($category_names, $category->name);
                    }
                    $categories = array_combine($category_ids, $category_names);
                    foreach ($categories as $id => $name) {
                        echo $this->Html->link($name, ['controller' => 'Categories', 'action' => 'view', $id], ['target' => '_blank']). "<br>";
                    }
                    
                    ?>
                </td>
                <td><?= h($field->title) ?></td>
                <td><?= h($field->created) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $field->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $field->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $field->id], ['confirm' => __('Are you sure you want to delete # {0}?', $field->id)]) ?>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
        </ul>
        <p><?= $this->Paginator->counter() ?></p>
    </div>
</div>
