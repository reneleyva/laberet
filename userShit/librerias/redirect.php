<?php 

//Checo que tipo de Usuario es y si debería de estar aquí. 

session_start();
if (!isset($_SESSION['type'])) {
	include_once '../../lib/Log.php';
	//PRIMERA VEZ EN LA PAGINA
	$_SESSION['type'] = 'invitado';
	//Agregar al Log. 
	Log::guardaVisita();
}

$tipo = $_SESSION['type'];
if ($tipo != 'invitado') {
	if ($tipo == 'libreria') {
		header("location: ../../libreria/librerias");
	} else if ($tipo == 'usuario') {
		header("location: ../../user/librerias");
	}
}	