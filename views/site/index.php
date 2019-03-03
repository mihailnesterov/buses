<?php

use yii\helpers\Html;

?>

<main role="main" class="container">
					
	<div id="nav-buttons" class="row text-center">
		<div class="col-sm-4">
			<a href="#" id="buses" @click.prevent="pageSelect = 1" class="btn btn-default btn-lg1"><i class="fa fa-bus fa-3x"></i><br>АВТОБУСЫ</a>
		</div> <!-- end col -->
		<div class="col-sm-4">
			<a href="#" id="stations" @click.prevent="pageSelect = 2" class="btn btn-default btn-lg1"><i class="fa fa-arrow-up fa-3x"></i><br>ОСТАНОВКИ</a>
		</div> <!-- end col -->
		<div class="col-sm-4">
			<a href="#" id="taxi" @click.prevent="pageSelect = 3" class="btn btn-default btn-lg1"><i class="fa fa-taxi fa-3x"></i><br>АВТО</a>
		</div> <!-- end col -->
	</div> <!-- end row -->
	
	<div id="buses-list" class="row animated fadeIn" v-if="pageSelect == 1">
		<div class="col-md-12">
			<div class="buses-block bg-light-gray">
				<div class="row text-center">
					<div class="form-group visible-xs col-xs-12">
						<input type="text" @keyup="searchBusByName()" class="form-control input-lg" id="searchBusInput" placeholder="Номер маршрута...">
					</div>
					<div class="col-xs-12" style="padding: 1em 2em;">
						<?php foreach( $buses as $bus): ?>
							<div 
								@click="selectBus('<?= $bus->num ?>'),selectOwner('<?= $bus->owner ?>')"
								class="bus-list-item col-xs-3 col-sm-2 btn btn-default" 
								:class="{ selected : busSelectedNum == '<?= $bus->num ?>'}"
							>
								<p class="text-center"><?= $bus->num ?></p>
							</div> <!-- end col -->
						<?php endforeach; ?>
					</div>
				</div> <!-- end row -->
			</div> <!-- end buses-block -->
		</div> <!-- end col -->
		
		<div v-if="busSelectedNum != ''" class="col-md-12 animated fadeIn">
			<div class="buses-block row text-center bg-white">
				<div class="col-xs-12 col-sm-4 col-md-3 text-center">
					<div class="bus-selected-num">
						<!--<p> busSelectedNum != '' ? busSelectedNum : 'A' </p>-->
						<p v-if="busSelectedNum != ''">{{ busSelectedNum }}</p>
					</div>
					<p>{{ busOwner }}</p>
					<hr>
					<p class="small">text text text text text text</p>
				</div>
				<div class="col-xs-12 col-sm-8 col-md-9">
					<div class="stations-block row">
					<div class="form-group">
						<input type="text" class="form-control input-lg" id="searchStationsForSelectedBus" placeholder="Введите остановку или улицу...">
					</div>
						<?php foreach( $routes as $route): ?>
							<div 
								v-if="busSelectedNum == '<?= $route->bus->num ?>'"
								@click="selectStation(<?= $route->station->id ?>)"
								class="bus-list-item" 
								:class="{ selected : stationSelectedId == <?= $route->station->id ?>}"
							>
								<p><?= $route->station->name ?>  /  <?= $route->station->area ?></p>
							</div> <!-- end col -->
						<?php endforeach; ?>
					</div> <!-- end buses-block -->
				</div> <!-- end col -->
			</div> <!-- end row -->
		</div> <!-- end col -->
		
	</div> <!-- end row -->
	
	<div id="stations-list" class="row text-left animated fadeIn" v-if="pageSelect == 2">
		<div class="form-group">
			<input style="max-width:600px;" type="text" class="form-control input-lg" id="searchStation" placeholder="Название остановки/улицы...">
		</div>
		<?php foreach( $stations as $station): ?>
			<div 
				@click="selectStation(<?= $station->id ?>)" 
				class="station-list-item col-xs-12 col-md-8" 
				:class="{ selected : stationSelectedId == <?= $station->id ?>}"
			>
				<p><?= $station->name ?>  (<?= $station->area ?>)</p>
			</div> <!-- end col -->
		<?php endforeach; ?>
	</div> <!-- end row -->

	<div id="taxi-list" class="row text-center animated fadeIn" v-if="pageSelect == 3">
		<?php foreach( $taxi as $tax): ?>
			<div class="col-xs-12 col-md-6">
			<div 
				@click="selectTaxi(<?= $tax->id ?>)" 
				class="taxi-list-item" 
				:class="{ selected : taxiSelectedId == <?= $tax->id ?>}"
			>
				<h5><?= $tax->name ?></h5>
				<hr>
				<p><a href="tel:<?= $tax->phone ?>" title="Набрать номер"><i class="fa fa-volume-control-phone"></i> <?= $tax->phone ?></a></p>
				</div> <!-- end col -->
			</div> <!-- end col -->
		<?php endforeach; ?>
	</div> <!-- end row -->
	
</main> <!-- end main -->