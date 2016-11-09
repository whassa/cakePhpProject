<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Passanger File'), ['action' => 'edit', $passangerFile->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Passanger File'), ['action' => 'delete', $passangerFile->id], ['confirm' => __('Are you sure you want to delete # {0}?', $passangerFile->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Passanger File'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Passanger File'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Passangers'), ['controller' => 'Passangers', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Passanger'), ['controller' => 'Passangers', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Files'), ['controller' => 'Files', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New File'), ['controller' => 'Files', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="passangerFile view large-9 medium-8 columns content">
    <h3><?= h($passangerFile->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Passanger') ?></th>
            <td><?= $passangerFile->has('passanger') ? $this->Html->link($passangerFile->passanger->id, ['controller' => 'Passangers', 'action' => 'view', $passangerFile->passanger->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('File') ?></th>
            <td><?= $passangerFile->has('file') ? $this->Html->link($passangerFile->file->name, ['controller' => 'Files', 'action' => 'view', $passangerFile->file->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($passangerFile->id) ?></td>
        </tr>
    </table>
</div>
