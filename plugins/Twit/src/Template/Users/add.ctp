
<div class="wrapper"  style="margin-top: 60px">
    <div class="sidebar-wrapper">
       <ul class="sidebar-nav">
        <div class="header"><h3><?= __('Actions') ?></h3></div>
        <li><?= $this->Html->link(__('List Users'), ['action' => 'index']) ?></li>
       </ul>
    </div>
    
</div>

<div class="container" style="margin-top: 60px">
	<div class="col-md-8">
    <?= $this->Form->create($user) ?>
    <fieldset>
        <legend><?= __('Add User') ?></legend>
        <?php
            echo $this->Form->input('username');
            echo $this->Form->input('password');
			echo $this->Form->input('email');
            echo $this->Form->input('role', ['options' => ['admin' => 'admin', 'superuser' => 'superuse']]);
        ?>
		
		<!-- include the BotDetect layout stylesheet -->
		<?= $this->Html->css(captcha_layout_stylesheet_url(), ['inline' => false]) ?>

		<!-- show captcha image -->
		<?= captcha_image_html() ?>


		<!-- Captcha code user input textbox -->
		 <?= 	$this->Form->input('CaptchaCode', [
				'label' => 'Retype the characters from the picture:',
				'maxlength' => '10',
				'style' => 'width: 270px;',
				'id' => 'CaptchaCode'
			]) ?>
    </fieldset>
    <?= $this->Form->button(__('Submit'),['class' => 'btn btn-default']) ?>
    <?= $this->Form->end() ?>
	</div>
</div>
