<?php 
namespace Vistas;

?>


		<!--

			Comienzo de la lista de productos

		-->

		<div class="pt-3 pb-5">

			<article id="listaProductos" class="container mb-3 px-5 fondo-secondary border-all-primary">

				<header id="headerListaProductos" class="text-center fuente-montserrat">
					<h2>Productos Disponibles</h2>
					<p class="color-gray fuente-lato">Estos son algunos de los productos disponibles a la venta.</p>
				</header>

				<section class="row">
					
					<?php foreach ($listado as $key => $value) { ?>

					<article class="col-lg-3 col-md-4 col-sm-6 mb-4">
						
						<div class="card">
							<img  src="<?= $value->getFotoDireccion() ?>" alt="Cerveza <?= $value->getNombre() ?>" data-from="card">
							<div class="card-footer">
								<h5 class="card-title text-center"><?= $value->getNombre() . " " . $value->getCapacidad() . "ml."?></h5>
							</div>
						</div>

					</article>

					<?php } ?>	

				</section>

			</article>

		</div>
	<!--

		Fin de la lista de productos

	-->

	<!--
	
		Inicio Mapa Google Maps

	-->
	<div class="fondo-secondary">

		<header id="headerMapa" class="text-center fuente-montserrat py-4">
			<h2>Mapa con las Sucursales</h2>
			<p class="color-gray fuente-lato">Aqui podrás visualizar las Sucursales con sus respectivas direcciones.</p>
		</header>

		<div id="map">

		</div>

	</div>

	<script>

		var map;

		function initMap() {
			
			var uluru = {lat: -37.997162, lng: -57.54972};
			
			var map = new google.maps.Map(document.getElementById('map'), {
				zoom: 14,
				center: uluru
			});

			
		}
			
			/*
			// Geolocalización
			if (navigator.geolocation) {
				navigator.geolocation.getCurrentPosition(function(position) {
					var pos = {
						lat: position.coords.latitude,
						lng: position.coords.longitude
					};

					infoWindow.setPosition(pos);
					infoWindow.setContent('Location found.');
					map.setCenter(pos);
					
					var marker = new google.maps.Marker({
						position: pos,
						map: map
					});

				}, function() {
					handleLocationError(true, infoWindow, map.getCenter());
				});

			} else {

				var marker = new google.maps.Marker({
					position: uluru,
					map: map
				});

				// Browser doesn't support Geolocation
				handleLocationError(false, infoWindow, map.getCenter());
			}
		}

		function handleLocationError(browserHasGeolocation, infoWindow, pos) {
			infoWindow.setPosition(pos);
			infoWindow.setContent(browserHasGeolocation ?
			'Error: The Geolocation service failed.' :
			'Error: Your browser doesn\'t support geolocation.');
		}*/

	</script>

	<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAkzL2_jAMKE4RL8JOrRRL8mu4xck6epZ8&callback=initMap"></script>
	<!--
	
		Fin Mapa Google Maps

	-->
