<div class="wrapper"  style="margin-top: 60px">
    <div class="sidebar-wrapper">
       <ul class="sidebar-nav">
       <div class="header"><h3><?= __('Actions') ?></h3></div>
		<li><?= $this->Html->link(__('Edit Journey Leg'), ['action' => 'edit', $journeyLeg->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Journey Leg'), ['action' => 'delete', $journeyLeg->id], ['confirm' => __('Are you sure you want to delete # {0}?', $journeyLeg->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Journey Legs'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Journey Leg'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Bookings'), ['controller' => 'Bookings', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Booking'), ['controller' => 'Bookings', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Legs'), ['controller' => 'Legs', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Leg'), ['controller' => 'Legs', 'action' => 'add']) ?> </li>
       </ul>
    </div>
    
</div>

<div class="container" style="margin-top: 60px">
	<div class="col-md-8">
    <h3><?= (__('Journey legs')) ?></h3>
    <table class="table">
        <tr>
            <th scope="row"><?= __('Booking') ?></th>
            <td><?= $journeyLeg->has('booking') ? $this->Html->link($journeyLeg->booking->datebooking, ['controller' => 'Bookings', 'action' => 'view', $journeyLeg->booking->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Leg') ?></th>
            <td><?= $journeyLeg->has('leg') ? $this->Html->link($journeyLeg->leg->actual_departure_time, ['controller' => 'Legs', 'action' => 'view', $journeyLeg->leg->id]) : '' ?></td>
        </tr>
    </table>
</div>
</div>
