<div class="wrapper"  style="margin-top: 60px">
    <div class="sidebar-wrapper">
       <ul class="sidebar-nav">
        <div class="header"><h3><?= __('Actions') ?></h3></div>
      <li><?= $this->Html->link(__('List Files'), ['action' => 'index']) ?></li>
       </ul>
    </div>
    
</div>

<div class="container" style="margin-top: 60px">
	<div class="col-md-8">
    <fieldset>
        <legend><?= __('Add File') ?></legend>
        <h1>Upload File</h1>
		<div class="content">
			<?= $this->Flash->render() ?>
			<div class="upload-frm">
				<?php echo $this->Form->create($uploadData, ['type' => 'file']); ?>
				<?php echo $this->Form->input('file', ['type' => 'file', 'class' => 'form-control']); ?>
				
		</div>
	</div>
    </fieldset>
	<br>
   <?php echo $this->Form->button(__('Submit'), ['type'=>'submit', 'class' => 'form-controlbtn btn-default']); ?>
    <?= $this->Form->end() ?>
</div>
</div>
