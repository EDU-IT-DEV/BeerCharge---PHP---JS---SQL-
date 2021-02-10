<?php  
namespace Vistas\Cuenta;


if (isset($_SESSION['cuentaUsuario'])) {
	$cuenta = $_SESSION['cuentaUsuario'];

	if ($cuenta->getTipoUsuario() !== 'Administrador') {
		header('Location: ' . BASE . 'paginaPrincipal/inicio');
	}

}	else {
	header('Location: ' . BASE . 'paginaPrincipal/inicio');
}

?>

<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>jQuery UI Tabs - Vertical Tabs functionality</title>
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script>
  $( function() {
    $( "#tabs" ).tabs().addClass( "ui-tabs-vertical ui-helper-clearfix" );
    $( "#tabs li" ).removeClass( "ui-corner-top" ).addClass( "ui-corner-left" );
  } );
  </script>
</head>
<body>

<header class="text-center fuente-montserrat border-bottom-primary pt-5">
			<h2>Panel Administrativo</h2>
</header>
 
<div id="tabs" data-tipo="submenu-admin">
  <ul>
    <li><a href="#tabs-1">-Tipos de Cervezas</a></li>
    <li><a href="#tabs-2">-Productos</a></li>
    <li><a href="#tabs-3">-Sucursales</a></li>
    <li><a href="#tabs-4">-Pedidos</a></li>
  </ul>
  <div id="tabs-1">
    <h2>-Menú Tipos de Cervezas</h2>
   		<li class="list-group-item"><a href="<?= BASE ?>gestionTipoCerveza/vistaAgregar" class="btn">Agregar un Tipo de Cerveza</a></li>
	 	<li class="list-group-item"><a href="<?= BASE ?>gestionTipoCerveza/vistaModificar" class="btn">Modificar un Tipo de Cerveza</a></li>
		<li class="list-group-item"><a href="<?= BASE ?>gestionTipoCerveza/vistaEliminar" class="btn">Eliminar un Tipo de Cerveza</a></li>
  </div>
  <div id="tabs-2">
    <h2>-Menú Productos</h2>
   		<li class="list-group-item"><a href="<?= BASE ?>gestionProducto/vistaAgregar" class="btn">Agregar un Producto</a></li>
		<li class="list-group-item"><a href="<?= BASE ?>gestionProducto/vistaModificar" class="btn">Modificar un Producto</a></li>
		<li class="list-group-item"><a href="<?= BASE ?>gestionProducto/vistaEliminar" class="btn">Borrar un Producto</a></li>
  </div>
  <div id="tabs-3">
    <h2>-Menú Sucursales</h2>
    	<li class="list-group-item"><a href="<?= BASE ?>gestionSucursal/vistaAgregar" class="btn">Agregar una Sucursal</a></li>
		<li class="list-group-item"><a href="<?= BASE ?>gestionSucursal/vistaModificar" class="btn">Modificar una Sucursal</a></li>
		<li class="list-group-item"><a href="<?= BASE ?>gestionSucursal/vistaEliminar" class="btn">Borrar una Sucursal</a></li>
  </div>
  <div id="tabs-4">
    <h2>-Menú Pedidos</h2>
    	<li class="list-group-item"><a href="<?= BASE ?>gestionPedido/listaPedidosAdmin" class="btn">Ver todos los Pedidos</a></li>
  </div>
</div>
</body>
</html>
