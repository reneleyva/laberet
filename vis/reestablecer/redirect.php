<?php 

//Checo que tipo de Usuario es y si debería de estar aquí. 
session_start();
if (!isset($_SESSION['type'])) {
	// include_once '../../lib/Log.php';
	// //PRIMERA VEZ EN LA PAGINA
	// $_SESSION['type'] = 'invitado';
	// //Agregar al Log. 
	// Log::guardaVisita();
	header("location: ../../");
}

$tipo = $_SESSION['type'];
if ($tipo != 'invitado') {
	if ($tipo == 'libreria') {
		header("location: ../../libreria/home");
	} else if ($tipo == 'user') {
		header("location: ../../user/home");
	}
}	