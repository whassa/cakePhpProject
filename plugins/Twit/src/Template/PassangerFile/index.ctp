<div class="wrapper"  style="margin-top: 60px">
    <div class="sidebar-wrapper">
       <ul class="sidebar-nav">
       <div class="header"><h3><?= __('Actions') ?></h3></div>
        <li><?= $this->Html->link(__('New Passanger File'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Passangers'), ['controller' => 'Passangers', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Passanger'), ['controller' => 'Passangers', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Files'), ['controller' => 'Files', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New File'), ['controller' => 'Files', 'action' => 'add']) ?></li>
       </ul>
    </div>
    
</div>

<div class="container" style="margin-top: 60px">
	<div class="col-md-8">
    <h3><?= __('Passanger File') ?></h3>
    <table class="table table-bordered">
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
</div>
