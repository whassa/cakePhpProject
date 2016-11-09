<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $province->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $province->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Provinces'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Pays'), ['controller' => 'Pays', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Pay'), ['controller' => 'Pays', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="provinces form large-9 medium-8 columns content">
    <?= $this->Form->create($province) ?>
    <fieldset>
        <legend><?= __('Edit Province') ?></legend>
        <?php
            echo $this->Form->input('nom');
            echo $this->Form->input('pays_id', ['options' => $pays]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
