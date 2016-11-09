<div class="wrapper"  style="margin-top: 60px">
    <div class="sidebar-wrapper">
       <ul class="sidebar-nav">
       <div class="header"><h3><?= __('Actions') ?></h3></div>
        <li><?= $this->Html->link(__('Edit Booking'), ['action' => 'edit', $booking->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Booking'), ['action' => 'delete', $booking->id], ['confirm' => __('Are you sure you want to delete # {0}?', $booking->bookingid)]) ?> </li>
        <li><?= $this->Html->link(__('List Bookings'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Booking'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Passangers'), ['controller' => 'Passangers', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Passanger'), ['controller' => 'Passangers', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Journey Legs'), ['controller' => 'JourneyLegs', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Journey Leg'), ['controller' => 'JourneyLegs', 'action' => 'add']) ?> </li>
       </ul>
    </div>
    
</div>


<div class="container" style="margin-top: 60px">
	<div class="col-md-8">
    <h3><?= (__('booking')) ?></h3>
    <table class="table">
        <tr>
            <th scope="row"><?= __('Passanger') ?></th>
            <td><?= $booking->has('passanger') ? $this->Html->link($booking->passanger->prenom, ['controller' => 'Passangers', 'action' => 'view', $booking->passanger->id]) : '' ?></td>
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
</div>
</div>
