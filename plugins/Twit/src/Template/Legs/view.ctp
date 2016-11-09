<div class="wrapper"  style="margin-top: 60px">
    <div class="sidebar-wrapper">
       <ul class="sidebar-nav">
       <div class="header"><h3><?= __('Actions') ?></h3></div>
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Leg'), ['action' => 'edit', $leg->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Leg'), ['action' => 'delete', $leg->id], ['confirm' => __('Are you sure you want to delete # {0}?', $leg->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Legs'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Leg'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Journey Legs'), ['controller' => 'JourneyLegs', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Journey Leg'), ['controller' => 'JourneyLegs', 'action' => 'add']) ?> </li>
       </ul>
    </div>
    
</div>


<div class="container" style="margin-top: 60px">
	<div class="col-md-8">
    <h3><?= (__('Legs')) ?></h3>
    <table class="table">
        <tr>
            <th scope="row"><?= __('Actual Departure Time') ?></th>
            <td><?= h($leg->actual_departure_time) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Actual Arrival Time') ?></th>
            <td><?= h($leg->actual_arrival_time) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Journey Legs') ?></h4>
        <?php if (!empty($leg->journey_legs)): ?>
        <table class="table">
            <tr>
                <th scope="col"><?= __('Booking Id') ?></th>
                <th scope="col"><?= __('Leg Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($leg->journey_legs as $journeyLegs): ?>
            <tr>
                <td><?= h($journeyLegs->booking_id) ?></td>
                <td><?= h($journeyLegs->leg_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'JourneyLegs', 'action' => 'view', $journeyLegs->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'JourneyLegs', 'action' => 'edit', $journeyLegs->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'JourneyLegs', 'action' => 'delete', $journeyLegs->id], ['confirm' => __('Are you sure you want to delete # {0}?', $journeyLegs->leg_id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
</div>
