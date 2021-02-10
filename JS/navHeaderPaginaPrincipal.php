<?php 
	namespace JS;

?>

<script>
	var barra_navegacion = $('#barraNavegacion');
	var btn_barra_navegacion = $('.btn-letra-color-black');

	$(document).ready(function(){

		var navTransparente = function() {
			barra_navegacion.addClass('mt-4');
			barra_navegacion.addClass('fondo-transparente');
			barra_navegacion.removeClass('fondo-white');
			btn_barra_navegacion.addClass('btn-letra-color-white');
			btn_barra_navegacion.removeClass('btn-letra-color-black');
			barra_navegacion.removeClass('border-bottom-nav');
			barra_navegacion.addClass('fixed-top');
		}

		var navBlanca = function() {
			barra_navegacion.removeClass('mt-4');
			barra_navegacion.removeClass('fondo-transparente');
			barra_navegacion.addClass('fondo-white');
			btn_barra_navegacion.addClass('btn-letra-color-black');
			btn_barra_navegacion.removeClass('btn-letra-color-white');
			barra_navegacion.addClass('border-bottom-nav');	
			barra_navegacion.addClass('fixed-top');
		}

		navTransparente();

		$(window).scroll(function(){

			if($(this).scrollTop() >= 56){
				navBlanca();

			}	else{
				navTransparente();
			}
		});
	});

</script>
			
		
