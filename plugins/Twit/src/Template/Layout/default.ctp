<?php
$cakeDescription = 'CakePHP: the rapid development php framework';
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <?= $this->Html->charset(); ?>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	
    <?php
        echo $this->Html->meta('icon');
		echo $this->Html->css('bootstrap.min.css');
		echo $this->Html->css('bootstrap-theme.min.css');
		echo $this->Html->css('starter-template.css');
        echo $this->fetch('meta');
        echo $this->fetch('css');
		echo $this->Html->script('bootstrap.min.js');
		
		?>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	
	
	<?
			echo $this->Html->script('navigation');
    ?>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>

    
    <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
		  <?=  $this->Html->link(__('Africa AirLine'),['controller' =>'Passangers','action' => 'index'],['class'=>'navbar-brand'] )?>
        </div>
        <div class="collapse navbar-collapse">
          <ul class="nav navbar-nav">	
            <li><?=  $this->Html->link( __('Passanger'),['controller' =>'Passangers','action' => 'index'] )?></li>
            <li><?=  $this->Html->link( __('Users'),['action' => 'index','controller' =>'Users'] )?></li>
            <li><?=  $this->Html->link( __('Booking'),['action' => 'index','controller' =>'Bookings'] )?></li>
			<li><?=  $this->Html->link( __('Legs'),['action' => 'index','controller' =>'Legs'] )?></li>
			<li><?=  $this->Html->link( __('Files'),['action' => 'index','controller' =>'Files'] )?></li>
			<li><?=  $this->Html->link( __('Events'),['action' => 'index','controller' =>'Evenements'] )?></li>
			<li><?=  $this->Html->link( __('Event test coverage'),'/webroot/coverage/src/Controller/EvenementsController.php.html' )?></li>
			<li><?=  $this->Html->link( __('Pays'),['action' => 'index','controller' =>'Pays'] )?></li>
			<li><?=  $this->Html->link( __('Provinces'),['action' => 'index','controller' =>'Provinces'] )?></li>
			
			
          </ul>
		<ul class="nav navbar-nav navbar-right">
			<li>
						<?php $loguser = $this->request->session()->read('Auth.User');
						if ($loguser) {
							$user = $loguser['username']; 
							
							echo $this->Html->link($user . '   logout <span class="glyphicon glyphicon-log-out"></span>', ['controller' => 'Users', 'action' => 'logout'],array('escape' => FALSE));
							
						} else {
							
							echo $this->Html->link('login <span class="glyphicon glyphicon-log-in"></span>',['controller' => 'Users', 'action' => 'login'], array('escape' => FALSE));
						}?>
					
			
			</li>
		</ul>
        </div><!--/.nav-collapse -->
      </div>
    </div>

        <?= $this->Flash->render(); ?>
		<?= $this->Flash->render('auth'); ?>
        <?= $this->fetch('content'); ?>
	<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
	<script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/jquery-ui.min.js"></script>
	<?= $this->fetch('script') ?>
	</body>
</html>