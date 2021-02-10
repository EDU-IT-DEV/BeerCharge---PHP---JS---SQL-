<?php 
	namespace Config;

	define("ROOT", str_replace('\\', '/', dirname(__DIR__)) . '/');  
	/* 	
		-Se reemplazan todas "\\" por "/" del url que devuelde dirname(__DIR__)
		- dirname(__DIR__) devuelve lo siguiente.		 'D:\---Programas--------Instalados---\WampServer\wamp64\www\Laboratorio_IV\TP beer(2018)\Trabajo_Final'
		-las barras se cambian. 						 'D:\---Programas--------Instalados---\WampServer\wamp64\www\Laboratorio_IV\TP beer(2018)\Trabajo_Final'
		- por ultimo se agrega una "/" al final del url. 'D:/---Programas--------Instalados---/WampServer/wamp64/www/Laboratorio_IV/TP beer(2018)/Trabajo_Final/'
		-Finalmente queda definida la constante ROOT como una ruta absoluta.
	*/
	$base= explode($_SERVER['DOCUMENT_ROOT'], ROOT);
	/* 
		$_SERVER['DOCUMENT_ROOT' tiene dentro la url para llegar a la raiz 	'D:/---Programas--------Instalados---/WampServer/wamp64/www' (la cual se toma como metodo de separacion, es por eso que luego %base queda con todo lo que tiene la url ROOT, pero quitandole todo lo que tiene $_SERVER['DOCUMENT_ROOT'])
	
		-explode() borra desde WWW hacia atras 								'D:/---Programas--------Instalados---/WampServer/wamp64/www/Laboratorio_IV/TP beer(2018)/Trabajo_Final/' que es lo que tiene la constante ROOT
		
		' y por ultimo quedaria la variable $base con las siguiente url:   '/Laboratorio_IV/TP beer(2018)/Trabajo_Final/'  (en la segunda por de larray que seria $base[1]. Y base[0] queda vacia, no nos sirve)
	*/
	define("BASE", $base[1]);	//$base[1] quedatia como la url completa desde la raiz de nuestro proyecto (ya sea trabando en local o en un servidor)

	/*********************************/

	define('DB_HOST', 'localhost');
	define('DB_NAME', 'beeeerbd');
	define('DB_USER', 'root');
	define('DB_PASS', '');
 ?>