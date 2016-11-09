<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Journey Leg'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Bookings'), ['controller' => 'Bookings', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Booking'), ['controller' => 'Bookings', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Legs'), ['controller' => 'Legs', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Leg'), ['controller' => 'Legs', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="journeyLegs index large-9 medium-8 columns content">
    <h3><?= __('Journey Legs') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('booking_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('leg_id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($journeyLegs as $journeyLeg): ?>
            <tr>
                <td><?= $this->Number->format($journeyLeg->id) ?></td>
                <td><?= $journeyLeg->has('booking') ? $this->Html->link($journeyLeg->booking->id, ['controller' => 'Bookings', 'action' => 'view', $journeyLeg->booking->id]) : '' ?></td>
                <td><?= $journeyLeg->has('leg') ? $this->Html->link($journeyLeg->leg->id, ['controller' => 'Legs', 'action' => 'view', $journeyLeg->leg->id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $journeyLeg->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $journeyLeg->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $journeyLeg->id], ['confirm' => __('Are you sure you want to delete # {0}?', $journeyLeg->id)]) ?>
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
