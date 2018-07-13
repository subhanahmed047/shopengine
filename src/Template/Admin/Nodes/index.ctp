<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Node'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Apps'), ['controller' => 'Apps', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New App'), ['controller' => 'Apps', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Categories'), ['controller' => 'Categories', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Category'), ['controller' => 'Categories', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="nodes index large-9 medium-8 columns content">
    <h3><?= __('Nodes') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('apps_id') ?></th>
                <th><?= $this->Paginator->sort('categories_id') ?></th>
                <th><?= $this->Paginator->sort('title') ?></th>
                <th><?= $this->Paginator->sort('quantity') ?></th>
                <th><?= $this->Paginator->sort('status') ?></th>
                <th><?= $this->Paginator->sort('price') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($nodes as $node):
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
            <tr>
                <td><?= $this->Number->format($node->id) ?></td>
                <td><?= $node->has('app') ? $this->Html->link($node->app->title, ['controller' => 'Apps', 'action' => 'view', $node->app->id]) : '' ?></td>
                <td><?= $node->has('category') ? $this->Html->link($node->category->name, ['controller' => 'Categories', 'action' => 'view', $node->category->id]) : '' ?></td>
                <td><?= h($node->title) ?></td>
                <td><?= h($node->quantity) ?></td>
                <td><?= h($status_string) ?></td>
                <td><?= $this->Number->format($node->price) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $node->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $node->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $node->id], ['confirm' => __('Are you sure you want to delete # {0}?', $node->id)]) ?>
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
