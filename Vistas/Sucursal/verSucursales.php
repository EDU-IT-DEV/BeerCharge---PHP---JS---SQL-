<?php 
namespace Vistas\Sucursal;

use Modelo\Sucursal as Sucursal;

if (!isset($listado)) {
	echo '<script language="javascript">alert("No hay Sucursales Cargadas...");</script>'; 
	header('Location: ' . BASE . 'paginaPrincipal/inicio');

}
?>

	<!--
	
		Inicio Mapa Google Maps

	-->

	<div class="py-3">
		
		<article class="container fondo-secondary border-all-primary">

			<header id="headerListaProductos" class="text-center fuente-montserrat">
				<h2>Sucursales</h2>
				<p class="color-gray fuente-lato">Estas son las Sucursales con las que estamos trabajando.</p>
			</header>

			<div id="map">

			</div>

			
			<div class="table-responsive">

				<table class="table table-hover mt-3">
					<thead class="thead-dark">
						<tr>
							<th scope="col">#</th>
							<th scope="col">Nombre</th>
							<th scope="col">Dirección</th>
							<th scope="col">Teléfono</th>
						</tr>
					</thead>

					<tbody>

						<?php if (!empty($listado)){ ?>
						<?php foreach ($listado as $key => $value) { ?>
						<tr>
							<td scope="row">
								<input type="radio" name="sucursales" id="radio<?= $key ?>" data-target="<?= $value->getDireccion() ?>" value="<?= $value->getId() ?>" required>
							</td>
							<td><label for="radio<?= $key ?>"><?= $value->getNombre() ?></label></td>
							<td><label for="radio<?= $key ?>"><?= $value->getDireccion() ?></label></td>
							<td><label for="radio<?= $key ?>"><?= $value->getTelefono() ?></label></td>
						</tr>


						<?php } ?>	
						<?php } else { ?>

						<tr>	
							<th colspan="8" class="text-center"><label>No hay Sucursales que mostrar</label></th>
						</tr>

						<?php } ?>
					</tbody>

				</table>
				
			</div>	

			<p class="font-weight-light font-italic text-right">(*) Selecciona el circulo de la columna para visualizar la sucursal en el mapa.</p>

		</article>

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

		$(document).ready(function(){

			var radiobtn_sucursal = $('input[type="radio"]');

			radiobtn_sucursal.change(function(){

				var direccion = $(this).attr('data-target');
				var res = direccion.concat(', Mar del Plata, Buenos Aires, Argentina');
				var geocoder = new google.maps.Geocoder();

				geocoder.geocode({ 'address': res }, geocodeResult);

				function geocodeResult(results, status) {

					if (status == 'OK') {

						var mapOptions = {
							center: results[0].geometry.location,
							mapTypeId: google.maps.MapTypeId.ROADMAP
						};

						map = new google.maps.Map($("#map").get(0), mapOptions);
						map.fitBounds(results[0].geometry.viewport);
						var markerOptions = { position: results[0].geometry.location }
						var marker = new google.maps.Marker(markerOptions);
						marker.setMap(map);

					} else {
						alert("Geocoding no tuvo éxito debido a: " + status);
					}
				}
			});
		});

	</script>

	<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAkzL2_jAMKE4RL8JOrRRL8mu4xck6epZ8&callback=initMap"></script>
	<!--
	
		Fin Mapa Google Maps

	-->