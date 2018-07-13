<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $app->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $app->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Apps'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="apps form large-9 medium-8 columns content">
    <?= $this->Form->create($app) ?>
    <fieldset>
        <legend><?= __('Edit App') ?></legend>
        <?php
            echo $this->Form->input('title');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
