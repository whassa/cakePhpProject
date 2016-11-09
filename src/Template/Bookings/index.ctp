<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Booking'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Passangers'), ['controller' => 'Passangers', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Passanger'), ['controller' => 'Passangers', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Journey Legs'), ['controller' => 'JourneyLegs', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Journey Leg'), ['controller' => 'JourneyLegs', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="bookings index large-9 medium-8 columns content">
    <h3><?= __('Bookings') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('passanger_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('datebooking') ?></th>
                <th scope="col"><?= $this->Paginator->sort('numberinparty') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($bookings as $booking): ?>
            <tr>
                <td><?= $this->Number->format($booking->id) ?></td>
                <td><?= $booking->has('passanger') ? $this->Html->link($booking->passanger->id, ['controller' => 'Passangers', 'action' => 'view', $booking->passanger->id]) : '' ?></td>
                <td><?= h($booking->datebooking) ?></td>
                <td><?= $this->Number->format($booking->numberinparty) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $booking->bookingid]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $booking->bookingid]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $booking->bookingid], ['confirm' => __('Are you sure you want to delete # {0}?', $booking->bookingid)]) ?>
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
