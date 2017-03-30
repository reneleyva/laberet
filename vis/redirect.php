<?php 

//Checo que tipo de Usuario es y si debería de estar aquí. 

session_start();

if (!isset($_SESSION['type'])) {
	header("location: ../../");
}

$tipo = $_SESSION['type'];
if ($tipo != 'invitado') {
	if ($tipo == 'libreria') {
		header("location: ../../libreria/home");
	} else if ($tipo == 'usuario') {
		header("location: ../../user/home");
	}
}	