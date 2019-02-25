<?php

use yii\helpers\Html;

?>

<main role="main" class="container">
					
	<div id="nav-buttons" class="row text-center">
		<div class="col-sm-4">
			<a href="#" id="buses" @click.prevent="pageSelect = 1" class="btn btn-default btn-lg"><i class="fa fa-bus fa-3x"></i><br>АВТОБУСЫ</a>
		</div> <!-- end col -->
		<div class="col-sm-4">
			<a href="#" id="stations" @click.prevent="pageSelect = 2" class="btn btn-default btn-lg"><i class="fa fa-arrow-up fa-3x"></i><br>ОСТАНОВКИ</a>
		</div> <!-- end col -->
		<div class="col-sm-4">
			<a href="#" id="taxi" @click.prevent="pageSelect = 3" class="btn btn-default btn-lg"><i class="fa fa-taxi fa-3x"></i><br>ТАКСИ</a>
		</div> <!-- end col -->
	</div> <!-- end row -->
	
	<div id="buses-list" class="row animated fadeIn" v-if="pageSelect == 1">
		<div class="col-md-12">
			<div class="buses-block" style="background-color: #f8f8f8; margin: 1em 0;">
				<div class="row text-center">
					<div class="form-group visible-xs col-xs-12">
						<input type="text" @keyup="searchBusByName()" class="form-control input-lg" id="searchBusInput" placeholder="Номер маршрута...">
					</div>
					<div class="col-xs-12" style="padding: 1em 2em;">
						<?php foreach( $buses as $bus): ?>
							<div 
								@click="selectBus(<?= $bus->num ?>)" 
								class="bus-list-item col-xs-3 col-sm-2 btn btn-default" 
								:class="{ selected : busSelectedNum == <?= $bus->num ?>}"
								style="margin: 0.5em;"
							>
								<p class="text-center"><?= $bus->num ?></p>
							</div> <!-- end col -->
						<?php endforeach; ?>
					</div>
				</div> <!-- end row -->
			</div> <!-- end buses-block -->
		</div> <!-- end col -->
		
		<div v-if="busSelectedNum != 0" class="col-md-12 animated fadeIn">
			<div class="buses-block row">
				<div class="bus-selected-num col-xs-3 col-sm-2 text-center">
					<p>{{ busSelectedNum > 0 ? busSelectedNum : 'A' }}</p>
				</div>
				<div class="col-xs-12 col-sm-10">
					<div class="form-group">
						<input type="text" class="form-control input-lg" id="searchStationsForSelectedBus" placeholder="Введите название остановки...">
					</div>
					<div class="buses-block row">
						<?php foreach( $routes as $route): ?>
							<div 
								v-if="busSelectedNum == <?= $route->bus->num ?>"
								@click="selectStation(<?= $route->station->id ?>)"
								class="station-list-item col-xs-12 col-md-12" 
								:class="{ selected : stationSelectedId == <?= $route->station->id ?>}"
							>
								<p><?= $route->station->name ?>  (<?= $route->station->area ?>)</p>
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

	<div id="taxi-list" class="row text-center" v-if="pageSelect == 3">
		<?php foreach( $taxi as $tax): ?>
			<div 
				@click="selectTaxi(<?= $tax->id ?>)" 
				class="taxi-list-item col-xs-12 col-md-12" 
				:class="{ selected : taxiSelectedId == <?= $tax->id ?>}"
			>
				<p><?= $tax->name ?></p>
			</div> <!-- end col -->
		<?php endforeach; ?>
	</div> <!-- end row -->
	
</main> <!-- end main -->