<div class="wrapper"  style="margin-top: 60px">
    <div class="sidebar-wrapper">
       <ul class="sidebar-nav">
       <div class="header"><h3><?= __('Actions') ?></h3></div>
        <li><?= $this->Html->link(__('List Provinces'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Pays'), ['controller' => 'Pays', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Pay'), ['controller' => 'Pays', 'action' => 'add']) ?></li>
       </ul>
    </div>
    
</div>
<div class="container" style="margin-top: 60px">
	<div class="col-md-8">
    <?= $this->Form->create($province) ?>
    <fieldset>
        <legend><?= __('Add Province') ?></legend>
        <?php
            echo $this->Form->input('nom');
            echo $this->Form->input('pays_id');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
</div>