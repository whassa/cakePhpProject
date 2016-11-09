<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $journeyLeg->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $journeyLeg->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Journey Legs'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Bookings'), ['controller' => 'Bookings', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Booking'), ['controller' => 'Bookings', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Legs'), ['controller' => 'Legs', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Leg'), ['controller' => 'Legs', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="journeyLegs form large-9 medium-8 columns content">
    <?= $this->Form->create($journeyLeg) ?>
    <fieldset>
        <legend><?= __('Edit Journey Leg') ?></legend>
        <?php
            echo $this->Form->input('booking_id', ['options' => $bookings]);
            echo $this->Form->input('leg_id', ['options' => $legs]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
