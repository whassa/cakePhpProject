
<div class="wrapper"  style="margin-top: 60px">
    <div class="sidebar-wrapper">
       <ul class="sidebar-nav">
       <div class="header"><h3><?= __('Actions') ?></h3></div>
        <li><?= $this->Html->link(__('New File'), ['action' => 'add']) ?></li>
		<li><?= $this->Html->link(__('List Passangers Files'), ['controller' => 'PassangerFile', 'action' => 'index']) ?></li>
       </ul>
    </div>
    
</div>



<div class="container" style="margin-top: 60px">
	<div class="col-md-8">
    <h3><?= __('Files') ?></h3>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('path') ?></th>
                <th scope="col"><?= $this->Paginator->sort('created') ?></th>
                <th scope="col"><?= $this->Paginator->sort('modified') ?></th>
                <th scope="col"><?= $this->Paginator->sort('status') ?></th>
				<th scope="col"><?= $this->Paginator->sort('image') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($files as $file): ?>
            <tr>
                <td><?= h($file->name) ?></td>
                <td><?= h($file->path) ?></td>
                <td><?= h($file->created) ?></td>
                <td><?= h($file->modified) ?></td>
                <td><?= h($file->status) ?></td>
				<td><embed src="<?= $file->path.$file->name ?>" width="180px" height="150px"></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $file->id]) ?>
					<?= $this->Html->link(__('Edit'), ['action' => 'edit', $file->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $file->id], ['confirm' => __('Are you sure you want to delete # {0}?', $file->id)]) ?>
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
	<li><?= $this->Html->link(__('List Passangers Files'), ['controller' => 'PassangerFile', 'action' => 'index']) ?></li>