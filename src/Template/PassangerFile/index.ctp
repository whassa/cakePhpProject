<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Passanger File'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Passangers'), ['controller' => 'Passangers', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Passanger'), ['controller' => 'Passangers', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Files'), ['controller' => 'Files', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New File'), ['controller' => 'Files', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="passangerFile index large-9 medium-8 columns content">
    <h3><?= __('Passanger File') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('passanger_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('files_id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($passangerFile as $passangerFile): ?>
            <tr>
                <td><?= $passangerFile->has('passanger') ? $this->Html->link($passangerFile->passanger->id, ['controller' => 'Passangers', 'action' => 'view', $passangerFile->passanger->id]) : '' ?></td>
                <td><?= $passangerFile->has('file') ? $this->Html->link($passangerFile->file->name, ['controller' => 'Files', 'action' => 'view', $passangerFile->file->id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $passangerFile->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $passangerFile->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $passangerFile->id], ['confirm' => __('Are you sure you want to delete # {0}?', $passangerFile->id)]) ?>
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
