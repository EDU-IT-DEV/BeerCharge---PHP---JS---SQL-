<?php 
namespace Vistas\Cuenta\Login; 

?>


<form action="" method="POST" enctype="multipart/form-data" class="px-4 py-3" id="formularioLogearse">

	<div class="form-group">
		<label for="emailLogin" class="col-form-label">Email: </label>
		<input type="email" class="form-control form-control-sm" id="emailLogin" name="email" placeholder="ej.: ejemplo@hotmail.com">
	</div>

	<div class="form-group">
		<label for="contraLogin" class="col-form-label">Contraseña: </label>
		<input type="password" class="form-control form-control-sm" id="contraLogin" name="contra" placeholder="Ingrese su contraseña">
	</div>
	
	<div class="text-center">

		<i id="iconoCarga" class="fa fa-spinner fa-pulse fa-2x fa-fw quitarContenedor"></i>
		<a href="<?= BASE ?>paginaPrincipal/inicio" class="btn btn-secondary">Salir</a>
		<input type="submit" class="btn btn-primary" id="inputLogearse" value="Logearse">

	</div>
</form>

<script>
	
	$(document).ready(function(){

		var btn_registrarse = $('#inputLogearse');
		
		btn_registrarse.on('click', function(e){
			
			e.preventDefault();
			
			var iconoCarga = $('#iconoCarga');

			$.ajax({

				url : '<?= BASE ?>gestionCuenta/login',
				data : 	$("#formularioLogearse").serialize(),
				type : 'POST',

				beforeSend : function(){
					iconoCarga.show();
				},

				success : function(rta){
					setTimeout(function(){

						iconoCarga.hide();
					}, 5000);

					window.location = '<?= BASE ?>paginaPrincipal/inicio';
				},

				error : function(xhr, status){
					console.log(xhr);
					setTimeout(function(){

						iconoCarga.hide();
					}, 5000);
				},

				complete : function(xhr, status){

				}
			});
		});

	});
	

</script>
