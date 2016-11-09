<?php echo $this->Html->script('table.js', ['block' => true]); ?>
<div class="wrapper"  style="margin-top: 60px">
    <div class="sidebar-wrapper">
       <ul class="sidebar-nav">
       <div class="header"><h3><?= __('Actions') ?></h3></div>
       <li><?= $this->Html->link(__('List Passangers'), ['action' => 'index']) ?></li>
       </ul>
    </div>
    
</div>




<div class="container" style="margin-top: 60px">
	<div class="col-md-8">
    <?= $this->Form->create($passanger) ?>
    <fieldset>
        <legend><?= __('Add Passanger') ?></legend>
        <?php
            echo $this->Form->input('prenom');
            echo $this->Form->input('nom');
            echo $this->Form->input('telephone');
            echo $this->Form->input('email');
            echo $this->Form->input('adresse');
            echo $this->Form->input('ville');
			echo $this->Form->input('pays_id', ['options' => $pays]);
			echo $this->Form->input('province_id',['options' => $provinces]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit'),['class' => 'btn btn-default'] ) ?>
    <?= $this->Form->end() ?>
</div>
</div>
