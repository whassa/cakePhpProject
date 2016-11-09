<div class="wrapper"  style="margin-top: 60px">
    <div class="sidebar-wrapper">
      <ul class="sidebar-nav">
       <div class="header"><h3><?= __('Actions') ?></h3></div>
        <li><?= $this->Html->link(__('New Leg'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Journey Legs'), ['controller' => 'JourneyLegs', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Journey Leg'), ['controller' => 'JourneyLegs', 'action' => 'add']) ?></li>
       </ul>
    </div>
    
</div>



<div class="container" style="margin-top: 60px">
	<div class="col-md-8">
    <h2><?= __('Legs') ?></h2>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('actual_departure_time') ?></th>
                <th scope="col"><?= $this->Paginator->sort('actual_arrival_time') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($legs as $leg): ?>
            <tr>
                <td><?= h($leg->actual_departure_time) ?></td>
                <td><?= h($leg->actual_arrival_time) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $leg->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $leg->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $leg->id], ['confirm' => __('Are you sure you want to delete # {0}?', $leg->id)]) ?>
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