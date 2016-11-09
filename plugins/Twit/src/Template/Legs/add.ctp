<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Journey Legs'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Bookings'), ['controller' => 'Bookings', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Booking'), ['controller' => 'Bookings', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Legs'), ['controller' => 'Legs', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Leg'), ['controller' => 'Legs', 'action' => 'add']) ?></li>
    </ul>
</nav>




<div class="container" style="margin-top: 60px">
	<div class="col-md-8">
    <?= $this->Form->create($leg) ?>
    <fieldset>
        <legend><?= __('Add Leg') ?></legend>
        <?php
            echo $this->Form->input('actual_departure_time');
            echo $this->Form->input('actual_arrival_time');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit'),['class' => 'btn btn-default']) ?>
    <?= $this->Form->end() ?>
</div>
</div>
