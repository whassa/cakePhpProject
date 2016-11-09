<div class="wrapper"  style="margin-top: 60px">
    <div class="sidebar-wrapper">
       <ul class="sidebar-nav">
       <div class="header"><h3><?= __('Actions') ?></h3></div>
           <li><?= $this->Html->link(__('New Province'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Pays'), ['controller' => 'Pays', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Pays'), ['controller' => 'Pays', 'action' => 'add']) ?></li>
       </ul>
    </div>
    
</div>

<div class="container" style="margin-top: 60px">
	<div class="col-md-8">
    <h3><?= __('Provinces') ?></h3>
    <table  class="table table-bordered">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('nom') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($provinces as $province): ?>
            <tr>
                <td><?= h($province->nom) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $province->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $province->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $province->id], ['confirm' => __('Are you sure you want to delete # {0}?', $province->id)]) ?>
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
