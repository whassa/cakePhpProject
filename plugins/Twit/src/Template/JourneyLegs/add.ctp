<div class="wrapper"  style="margin-top: 60px">
    <div class="sidebar-wrapper">
       <ul class="sidebar-nav">
        <div class="header"><h3><?= __('Actions') ?></h3></div>
		<li><?= $this->Html->link(__('List Journey Legs'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Bookings'), ['controller' => 'Bookings', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Booking'), ['controller' => 'Bookings', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Legs'), ['controller' => 'Legs', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Leg'), ['controller' => 'Legs', 'action' => 'add']) ?></li>
       </ul>
    </div>
    
</div>

<div class="container" style="margin-top: 60px">
	<div class="col-md-8">
    <?= $this->Form->create($journeyLeg) ?>
    <fieldset>
        <legend><?= __('Add Journey Leg') ?></legend>
        <?php
            echo $this->Form->input('booking_id', ['options' => $bookings]);
            echo $this->Form->input('leg_id', ['options' => $legs]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit'),['class' => 'btn btn-default']) ?>
    <?= $this->Form->end() ?>
</div>
</div>