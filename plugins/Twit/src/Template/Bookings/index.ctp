<div class="wrapper"  style="margin-top: 60px">
    <div class="sidebar-wrapper">
       <ul class="sidebar-nav">
       <div class="header"><h3><?= __('Actions') ?></h3></div>
        <li><?= $this->Html->link(__('New Booking'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Passangers'), ['controller' => 'Passangers', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Passanger'), ['controller' => 'Passangers', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Journey Legs'), ['controller' => 'JourneyLegs', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Journey Leg'), ['controller' => 'JourneyLegs', 'action' => 'add']) ?></li>
       </ul>
    </div>
    
</div>




<div class="container" style="margin-top: 60px">
	<div class="col-md-8">
    <h2><?= __('Bookings') ?></h2>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('passanger_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('datebooking') ?></th>
                <th scope="col"><?= $this->Paginator->sort('numberinparty') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($bookings as $booking): ?>
            <tr>
                <td><?= $booking->has('passanger') ? $this->Html->link($booking->passanger->prenom, ['controller' => 'Passangers', 'action' => 'view', $booking->passanger->id]) : '' ?></td>
                <td><?= h($booking->datebooking) ?></td>
                <td><?= $this->Number->format($booking->numberinparty) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $booking->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $booking->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $booking->id], ['confirm' => __('Are you sure you want to delete # {0}?', $booking->id)]) ?>
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
