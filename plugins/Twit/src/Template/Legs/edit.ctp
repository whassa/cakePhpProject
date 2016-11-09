<div class="wrapper"  style="margin-top: 60px">
    <div class="sidebar-wrapper">
       <ul class="sidebar-nav">
        <div class="header"><h3><?= __('Actions') ?></h3></div>
		<li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $leg->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $leg->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Legs'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Journey Legs'), ['controller' => 'JourneyLegs', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Journey Leg'), ['controller' => 'JourneyLegs', 'action' => 'add']) ?></li>
       </ul>
    </div>
    
</div>

<div class="container" style="margin-top: 60px">
	<div class="col-md-8">
    <?= $this->Form->create($leg) ?>
    <fieldset>
        <legend><?= __('Edit Leg') ?></legend>
        <?php
            echo $this->Form->input('actual_departure_time');
            echo $this->Form->input('actual_arrival_time');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
</div>
