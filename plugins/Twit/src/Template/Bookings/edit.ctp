<div class="wrapper"  style="margin-top: 60px">
    <div class="sidebar-wrapper">
       <ul class="sidebar-nav">
        <div class="header"><h3><?= __('Actions') ?></h3></div>
	    <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $booking->bookingid],
                ['confirm' => __('Are you sure you want to delete # {0}?', $booking->bookingid)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Bookings'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Passangers'), ['controller' => 'Passangers', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Passanger'), ['controller' => 'Passangers', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Journey Legs'), ['controller' => 'JourneyLegs', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Journey Leg'), ['controller' => 'JourneyLegs', 'action' => 'add']) ?></li>
       </ul>
    </div>
    
</div>





<div class="container" style="margin-top: 60px">
	<div class="col-md-8">
    <?= $this->Form->create($booking) ?>
    <fieldset>
        <legend><?= __('Edit Booking') ?></legend>
        <?php
            echo $this->Form->input('passanger_id', ['options' => $passangers]);
            echo $this->Form->input('datebooking');
            echo $this->Form->input('numberinparty');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit'),['class' => 'btn btn-default']) ?>
    <?= $this->Form->end() ?>
</div>
</div>