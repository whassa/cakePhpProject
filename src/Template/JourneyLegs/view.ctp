<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Journey Leg'), ['action' => 'edit', $journeyLeg->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Journey Leg'), ['action' => 'delete', $journeyLeg->id], ['confirm' => __('Are you sure you want to delete # {0}?', $journeyLeg->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Journey Legs'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Journey Leg'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Bookings'), ['controller' => 'Bookings', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Booking'), ['controller' => 'Bookings', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Legs'), ['controller' => 'Legs', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Leg'), ['controller' => 'Legs', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="journeyLegs view large-9 medium-8 columns content">
    <h3><?= h($journeyLeg->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Booking') ?></th>
            <td><?= $journeyLeg->has('booking') ? $this->Html->link($journeyLeg->booking->id, ['controller' => 'Bookings', 'action' => 'view', $journeyLeg->booking->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Leg') ?></th>
            <td><?= $journeyLeg->has('leg') ? $this->Html->link($journeyLeg->leg->id, ['controller' => 'Legs', 'action' => 'view', $journeyLeg->leg->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($journeyLeg->id) ?></td>
        </tr>
    </table>
</div>
