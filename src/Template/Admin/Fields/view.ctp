<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Field'), ['action' => 'edit', $field->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Field'), ['action' => 'delete', $field->id], ['confirm' => __('Are you sure you want to delete # {0}?', $field->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Fields'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Field'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Fieldtypes'), ['controller' => 'Fieldtypes', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Fieldtype'), ['controller' => 'Fieldtypes', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Apps'), ['controller' => 'Apps', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New App'), ['controller' => 'Apps', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="fields view large-9 medium-8 columns content">
    <h3><?= h($field->title) ?></h3>
    <table class="vertical-table">
        <tr>
            <th><?= __('Fieldtype') ?></th>
            <td><?= $field->has('fieldtype') ? $this->Html->link($field->fieldtype->name, ['controller' => 'Fieldtypes', 'action' => 'view', $field->fieldtype->id]) : '' ?></td>
        </tr>
       <!-- <tr>
            <th><?/*= __('App') */?></th>
            <td><?/*= $field->has('app') ? $this->Html->link($field->app->title, ['controller' => 'Apps', 'action' => 'view', $field->app->id]) : '' */?></td>
        </tr>-->
        <tr>
            <th><?= __('Title') ?></th>
            <td><?= h($field->title) ?></td>
        </tr>
        <tr>
            <th><?= __('Id') ?></th>
            <td><?= $this->Number->format($field->id) ?></td>
        </tr>
        <tr>
            <th><?= __('Categories') ?></th>
            <td>
                <ul>
                    <?php
                    foreach ($field->categories as $category):
                        ?>
                        <li style="list-style-type: none;">
                            <?php
                                echo $this->Html->link(__($category->name), [
                                    "controller" => "Tests",
                                    "action" => "view",
                                    $category->id
                                ]);
                            ?>
                        </li>
                        <?php
                    endforeach;
                    ?>
                </ul>
            </td>
        </tr>
        <tr>
            <th><?= __('Created') ?></th>
            <td><?= h($field->created) ?></td>
        </tr>
    </table>
</div>
