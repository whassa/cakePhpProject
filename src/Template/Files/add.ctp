<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Files'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="files form large-9 medium-8 columns content">
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
   <?php echo $this->Form->button(__('Submit'), ['type'=>'submit', 'class' => 'form-controlbtn btn-default']); ?>
    <?= $this->Form->end() ?>
</div>
