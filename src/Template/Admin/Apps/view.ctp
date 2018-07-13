<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit App'), ['action' => 'edit', $app->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete App'), ['action' => 'delete', $app->id], ['confirm' => __('Are you sure you want to delete # {0}?', $app->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Apps'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New App'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="apps view large-9 medium-8 columns content">
    <h3><?= h($app->title) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Title') ?></th>
            <td><?= h($app->title) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($app->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Created') ?></th>
            <td><?= h($app->created) ?></td>
        </tr>
    </table>
</div>
