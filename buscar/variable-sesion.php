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

$keyword = ""; //Palabra clave. 
$selection = ""; //selection
$tipo = $_SESSION['type'];

if ($tipo != 'invitado') {
	//NO debería de estar aquí redirijo
	if ($tipo == 'libreria') {
		if (isset($_GET['q']) or isset($_GET['s'])) {
			$keyword = $_GET['q']; //Palabra clave. 
			$selection = $_GET['s']; //selection
			header("location: ../../libreria/buscar?q=".$keyword."&s=".$selection);
			exit();
		} else {
			header("location: ../../libreria/buscar");
			exit();
		}

	}  else if ($tipo == 'user') {
		if (isset($_GET['q']) or isset($_GET['s'])) {
			$keyword = $_GET['q']; //Palabra clave. 
			$selection = $_GET['s']; //selection
			header("location: ../../user/buscar?q=".$keyword."&s=".$selection);
			exit();
		} else {
			header("location: ../../user/buscar");
			exit();
		}
	}  
} 