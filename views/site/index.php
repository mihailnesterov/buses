<?php

use yii\helpers\Html;

?>

<main role="main" class="container">
					
	<div id="nav-buttons" class="row text-center">
		<div class="col-xs-4">
			<a href="#" id="buses" @click.prevent="pageSelect = 1" class="btn btn-default"><i class="fa fa-bus fa-2x"></i><br><span>АВТОБУСЫ</span></a>
		</div> <!-- end col -->
		<div class="col-xs-4">
			<a href="#" id="stations" @click.prevent="pageSelect = 2" class="btn btn-default"><i class="fa fa-arrow-up fa-2x"></i><br><span>ОСТАНОВКИ</span></a>
		</div> <!-- end col -->
		<div class="col-xs-4">
			<a href="#" id="taxi" @click.prevent="pageSelect = 3" class="btn btn-default"><i class="fa fa-taxi fa-2x"></i><br><span>АВТО</span></a>
		</div> <!-- end col -->
	</div> <!-- end row -->
	
	<div id="buses-list" class="row animated fadeIn" v-if="pageSelect == 1">
		<div class="col-md-12">
			<div class="buses-block bg-light-gray">
				<div class="row text-center">
					<div class="form-group hidden col-xs-12">
						<input type="text" @keyup="searchBusByName()" class="form-control input-lg" id="searchBusInput" placeholder="Номер маршрута...">
					</div>
					<div class="col-xs-12" style="padding: 1em 2em;">
					<div class="row">
						<?php foreach( $buses as $bus): ?>
							<div 
								@click="selectBus('<?= $bus->num ?>'),selectOwner('<?= $bus->owner ?>'),selectComment('<?= $bus->comment ?>')"
								class="bus-list-item col-xs-5 col-sm-3 col-md-2 btn btn-default" 
								:class="{ selected : busSelectedNum == '<?= $bus->num ?>'}"
							>
								<p class="text-center"><?= $bus->num ?></p>
							</div> <!-- end col -->
						<?php endforeach; ?>
						</div>
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
					<p v-if="busComment != ''" class="bus-comment small">{{ busComment }}</p>
				</div>
				<div class="col-xs-12 col-sm-8 col-md-9">
					<div v-if="stationSelectedId == 0" id="selected-bus-stations-list" class="stations-block row">
						<div class="form-group hidden">
							<input type="text" :keyup="searchStation()" class="form-control input-lg" id="searchStationsForSelectedBus" placeholder="Введите остановку или улицу...">
						</div>
						<?php foreach( $routes as $route): ?>
							<div 
								v-if="busSelectedNum == '<?= $route->bus->num ?>'"
								@click="selectStation(<?= $route->station->id ?>, '<?= $route->station->name ?>')"
								class="bus-list-item" 
								:class="{ selected : stationSelectedId == <?= $route->station->id ?> }"
							>
								<p><?= $route->station->name ?>  /  <?= $route->station->area ?></p>
							</div> <!-- end bus-list-item -->
						<?php endforeach; ?>
					</div> <!-- end stations-block row -->
					<div class="selected-station-block row animated fadeIn" v-if="stationSelectedId != 0">
						<div class="selected-station-item col-xs-12">
							<h3>{{ stationSelectedName }}</h3>
							<hr>
							<?php foreach( $routes as $route): ?>
								<div 
									v-if="stationSelectedId == '<?= $route->station->id ?>' && busSelectedNum == '<?= $route->bus->num ?>'"
									class="route-list-item" 
									:class="{ selected : routeSelectedId == <?= $route->station->id ?> }"
								>
									<h4><?= $route->day->name ?></h4>
									<p><?= $route->hours ?>  :  <?= $route->minutes ?></p>
								</div> <!-- end bus-list-item -->
							<?php endforeach; ?>
						</div> <!-- end col -->
					</div> <!-- end selected-station-block row -->
				</div> <!-- end col -->
			</div> <!-- end buses-block row -->
		</div> <!-- end col -->
		
	</div> <!-- end buses-list row -->
	
	<div id="stations-list" class="row text-left animated fadeIn" v-if="pageSelect == 2">
		<div class="col-xs-12 col-md-8">
			<div class="form-group hidden">
				<input style="max-width:600px;" type="text" class="form-control input-lg" id="searchStation" placeholder="Название остановки/улицы...">
			</div>
			<?php foreach( $stations as $station): ?>
				<div 
					@click="selectStation(<?= $station->id ?>)" 
					class="station-list-item" 
					:class="{ selected : stationSelectedId == <?= $station->id ?>}"
				>
					<p><?= $station->name ?>  (<?= $station->area ?>)</p>
				</div>
			<?php endforeach; ?>
		</div> <!-- end col -->

		<div class="col-xs-12 col-md-4">
			<div class="row">
				<?php foreach( $routes as $route): ?>
					<div 
						v-if="stationSelectedId == '<?= $route->station->id ?>'"
						@click="selectBusesByStation('<?= $route->bus->num ?>')"
						class="bus-list-item col-xs-5 col-sm-4 btn btn-default" 
						:class="{ selected : busSelectedNum == '<?= $route->bus->num ?>'}"
					>
						<p class="text-center"><?= $route->bus->num ?></p>
					</div> <!-- end bus-list-item -->
				<?php endforeach; ?>
			</div> <!-- end row -->

			<div class="selected-station-block row animated fadeIn" v-if="stationSelectedId != 0">
				<div class="selected-station-item col-xs-12">
					<hr>
					<?php foreach( $routes as $route): ?>
						<div 
							v-if="stationSelectedId == '<?= $route->station->id ?>' && busSelectedNum == '<?= $route->bus->num ?>'"
							class="route-list-item" 
							:class="{ selected : routeSelectedId == <?= $route->station->id ?> }"
						>
							<h4><?= $route->day->name ?></h4>
							<hr>
							<p><?= $route->hours ?>  :  <?= $route->minutes ?></p>
						</div> <!-- end bus-list-item -->
					<?php endforeach; ?>
				</div> <!-- end col -->
			</div> <!-- end selected-station-block row -->

		</div> <!-- end col -->
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