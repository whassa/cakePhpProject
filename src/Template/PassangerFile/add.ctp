<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Passanger File'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Passangers'), ['controller' => 'Passangers', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Passanger'), ['controller' => 'Passangers', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Files'), ['controller' => 'Files', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New File'), ['controller' => 'Files', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="passangerFile form large-9 medium-8 columns content">
    <?= $this->Form->create($passangerFile) ?>
    <fieldset>
        <legend><?= __('Add Passanger File') ?></legend>
        <?php
            echo $this->Form->input('passanger_id', ['options' => $passangers]);
            echo $this->Form->input('files_id', ['options' => $files]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
