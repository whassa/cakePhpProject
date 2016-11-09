<?php echo $this->Html->script('app.js', ['block' => true]); ?>

<div class="container" style="margin-top: 60px">
	<div class="col-md-8">
    <h3><?= __('Events') ?></h3>
			
	</div>
</div>

<div class="container">
	<form action="Evenements/add.json" class="form-inline" role="form" id="add-Events">
		<div class="form-group">
		 	<div class="input-append" id="task-input">
			  <input class="form-control input-lg" name="name" type="text" id="inputLarge" placeholder="Enter an event...">
			  <button type="submit" class="btn btn-primary btn-lg">Add Event</button>
		  	</div>
	  	</div>
	</form>
	
	<div class="Events-container" id="Events">
		<div id="notdone-label"><h5>To make</h5></div>
		<div id="notdone"></div>
	</div>
	
	<div class="Events-container" id="Events">
		<div id="done-label"><h5>Recently done...</h5></div>
		<div id="done"></div>
	</div>
	
</div>