
<div class="container">

<div class="row" style="margin-top:80px">
    <div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">
		<?= $this->Flash->render('auth') ?>
			<?= $this->Form->create() ?>
			<fieldset>
				<h2>Please Sign In</h2>
				<hr class="colorgraph">
				<div class="form-group">
                    <?= $this->Form->input('username', ['label' => __('username')]) ?>
				</div>
				<div class="form-group">
					<?= $this->Form->input('password', ['label' => __('password')]); ?>
				</div>
				<hr class="colorgraph">
				<div class="row">
					<div class="col-xs-6 col-sm-6 col-md-6">
						<?= $this->Form->button(__('Se Connecter'),['class' => 'btn btn-lg btn-success btn-block']) ?>
					</div>
					<div class="col-xs-6 col-sm-6 col-md-6">
						<?= $this->Html->link('<button type="button" class="btn btn-danger">'.__('Enregistrement').'</button>', ['action' => 'add'],array('escape' => FALSE)) ?>
					</div>
				</div>
			</fieldset>
		<?= $this->Form->end() ?>
	</div>
</div>

</div>