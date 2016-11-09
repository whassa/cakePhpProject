<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Booking'), ['action' => 'edit', $booking->bookingid]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Booking'), ['action' => 'delete', $booking->bookingid], ['confirm' => __('Are you sure you want to delete # {0}?', $booking->bookingid)]) ?> </li>
        <li><?= $this->Html->link(__('List Bookings'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Booking'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Passangers'), ['controller' => 'Passangers', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Passanger'), ['controller' => 'Passangers', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Journey Legs'), ['controller' => 'JourneyLegs', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Journey Leg'), ['controller' => 'JourneyLegs', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="bookings view large-9 medium-8 columns content">
    <h3><?= h($booking->bookingid) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Passanger') ?></th>
            <td><?= $booking->has('passanger') ? $this->Html->link($booking->passanger->id, ['controller' => 'Passangers', 'action' => 'view', $booking->passanger->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($booking->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Numberinparty') ?></th>
            <td><?= $this->Number->format($booking->numberinparty) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Datebooking') ?></th>
            <td><?= h($booking->datebooking) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Journey Legs') ?></h4>
        <?php if (!empty($booking->journey_legs)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Booking Id') ?></th>
                <th scope="col"><?= __('Leg Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($booking->journey_legs as $journeyLegs): ?>
            <tr>
                <td><?= h($journeyLegs->booking_id) ?></td>
                <td><?= h($journeyLegs->leg_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'JourneyLegs', 'action' => 'view', $journeyLegs->]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'JourneyLegs', 'action' => 'edit', $journeyLegs->]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'JourneyLegs', 'action' => 'delete', $journeyLegs->], ['confirm' => __('Are you sure you want to delete # {0}?', $journeyLegs->)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
