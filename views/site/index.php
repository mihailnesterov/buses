<?php

use yii\helpers\Html;

?>

<main role="main" class="container">
					
	<div id="nav-buttons" class="row text-center">
		<div class="col-sm-4">
			<a href="#" class="btn btn-success btn-lg"><i class="fa fa-bus fa-3x"></i><br>АВТОБУСЫ</a>
		</div> <!-- end col -->
		<div class="col-sm-4">
			<a href="#" class="btn btn-success btn-lg"><i class="fa fa-arrow-up fa-3x"></i><br>ОСТАНОВКИ</a>
		</div> <!-- end col -->
		<div class="col-sm-4">
			<a href="#" class="btn btn-warning btn-lg"><i class="fa fa-taxi fa-3x"></i><br>ТАКСИ</a>
		</div> <!-- end col -->
	</div> <!-- end row -->

	<div id="buses-list" class="row text-center">
		<?php foreach( $buses as $bus): ?>
			<div 
				@click="selectBus(<?= $bus->num ?>)" 
				class="bus-list-item col-xs-3 col-sm-2 col-md-1" 
				:class="{ selected : busSelectedNum == <?= $bus->num ?>}"
			>
				<p><?= $bus->num ?></p>
			</div> <!-- end col -->
		<?php endforeach; ?>
	</div> <!-- end row -->
	
</main> <!-- end main -->