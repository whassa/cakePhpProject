<div class="wrapper"  style="margin-top: 60px">
    <div class="sidebar-wrapper">
       <ul class="sidebar-nav">
       <div class="header"><h3><?= __('Actions') ?></h3></div>
        <li><?= $this->Html->link(__('New Journey Leg'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Bookings'), ['controller' => 'Bookings', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Booking'), ['controller' => 'Bookings', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Legs'), ['controller' => 'Legs', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Leg'), ['controller' => 'Legs', 'action' => 'add']) ?></li>
       </ul>
    </div>
    
</div>


<div class="container" style="margin-top: 60px">
	<div class="col-md-8">
    <h3><?= __('Journey Legs') ?></h3>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('booking_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('leg_id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($journeyLegs as $journeyLeg): ?>
            <tr>
                <td><?= $journeyLeg->has('booking') ? $this->Html->link($journeyLeg->booking->datebooking, ['controller' => 'Bookings', 'action' => 'view', $journeyLeg->booking->datebooking]) : '' ?></td>
                <td><?= $journeyLeg->has('leg') ? $this->Html->link($journeyLeg->leg->actual_departure_time, ['controller' => 'Legs', 'action' => 'view', $journeyLeg->leg->actual_departure_time]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $journeyLeg->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $journeyLeg->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $journeyLeg->id], ['confirm' => __('Are you sure you want to delete # {0}?', $journeyLeg->id)]) ?>
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
