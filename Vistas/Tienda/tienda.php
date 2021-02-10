<?php 
namespace Vistas\Tienda;

use Modelo\Pedido as Pedido;
use Modelo\TipoCerveza as TipoCerveza;



$listadoProductosPedido = array();
$cantidadProductosPedido = 0;

if (isset($_SESSION['pedido'])) {
	$pedido = $_SESSION['pedido'];
	$listadoProductosPedido = $pedido->getListaProductos();

	$cantidadProductosPedido = count($listadoProductosPedido);
}

$controladora = new \Controladora\GestionProductoControladora();
$listadoProductos=$controladora->listarTodos();

$controladoraPedidos=new \Controladora\GestionPedidoControladora();

$controladoraSucursales =new \Controladora\GestionSucursalControladora();
$listadoSucursales=$controladoraSucursales->listarTodos();





?>

<!DOCTYPE html>
<html>
<head>
	<title>Tienda ONLINE</title>
</head>
<body>

	

	<div class="conteiner" id="fondito">
		
		<div class="row">

			<div class="col-md-6">

				<section>

					<form  action="<?= BASE ?>gestionLineaPedido/agregarpedido"  method="POST">

						<select name="tipoCervezaElegido" id="elegida" required>

							<option value="">Seleccione tipo de Cerveza...</option>
							<?php 
							foreach ($listadoProductos as $key => $value)
							{
								?>
								<option value="<?= $value->getID() ?>"><?php echo $value->getNombre()?>  Precio:$ <?php echo $controladoraPedidos->calculaMonto($value->getTipoCerveza()->getPrecioLitro(),$value->getCapacidad()) ?> </option>
								<?php

							}
							?>
						</select>


						<div>

							<label id="cant">Cantidad:</label>
							<input type="number" value="1" min="1" id="cant" name="cantidad" require>

						</div>	


						<div>
							<input type="submit" id="Agregar" value="Agregar">

						</div>

					</form>

				</section>

			</div>

			<div class="col-md-6">

				<div class="row" style="font-size: 17px">

					<h5><strong>Lista de Pedidos:</strong></h5>

					<form action="<?= BASE ?>gestionLineaPedido/eliminar" method="POST">

						<article class="row">

							<div class="col-lg-10 col-md-9 col-sm-8 col-7">
								
								<table class="table" border="1" width="50%">
									<thead>
										<tr>
											<th>Nombre: </th>
											<th>Precio por litro: $ </th>
											<th>Precio producto: $</th>
											<th>Capacidad: </th>

										</tr>
									</thead>
									<tbody>
										<?php
										foreach($listadoProductosPedido as $value)
											{ ?>
												<tr>
													<td><?= $value->getNombre(); ?></td>
													<td><?= $value->getTipoCerveza()->getPrecioLitro() ?></td>
													<td><?= $controladoraPedidos->calculaMonto($value->getTipoCerveza()->getPrecioLitro(),$value->getCapacidad()) ?></td>
													<td><?= $value->getCapacidad() ?> ml.</td>
													<td><input type="submit" class="btn btn-danger cursor-pointer" id="inputProductoEliminar" value="Eliminar"></input></td>

												</tr>
												<?php } ?>

											</tbody>
										</table>
										<?} ?>



									</div>

								</article>

							</form>



						</div>
					</div>





					<div class="row" style="display: none;">

						<div class="col-md-8">


							<div >

								<input type="radio" name="entrega" value="sucursal" required>Retira en sucursal

								<input type="radio"  name="entrega" value="domicilio" required>Recibe en domicilio

							</div>


							<div id="panelDireccionSucursal" style="display: none;">
								<label for="direccionSucursal">Sucuarsales: </label>
								<select name="cantidad" id="direccionSucursal">

									<option>Seleccione una Sucursal...</option>
									<?php 
									foreach ($listadoSucursales as $listadoSucursales)
									{
										?>
										<option value="<?php echo $listadoSucursales->getID() ?>"><?php echo $listadoSucursales->getNombre() ?></option>
										<?php
									}
									?>


								</select>
							</div>

							<div id="panelDireccionElegida" style="display: none;">

								<label for="direccionUsuario">Ingrese direccion: </label>
								<input type="text" placeholder="Ingrese la Dirección" id="direccionUsuario" name="direccion2" value="<?php echo $_SESSION['clienteLogueado']->getDireccion() ?>">

							</div>


							<!--<i class="fa fa-shopping-cart" aria-hidden="true"></i>-->
						</div>

					</div>



			<script>

				$(document).ready(function() {
					$("input[type=radio]").click(function(event){
						var valor = $(event.target).val();
						if(valor =="sucursal"){
							$("#panelDireccionSucursal").show();
							$("#panelDireccionElegida").hide();
						} else if (valor == "domicilio") {
							$("#panelDireccionSucursal").hide();
							$("#panelDireccionElegida").show();
						} 
					});
				});


			</script>



		</body>
		</html>