<?php 
session_start();
if (!isset($_GET['id']) or $_GET['id'] == '') {
	header("Location: ../404.html");
	exit();
}

if (!isset($_SESSION['type'])) {
	include_once '../../lib/Log.php';
	//PRIMERA VEZ EN LA PAGINA
	$_SESSION['type'] = 'invitado';
	//Agregar al Log. 
	Log::guardaVisita();
}

$id = $_GET['id'];
$tipo = $_SESSION['type'];

if ($tipo != 'invitado') {
	if ($tipo == 'libreria') {
		header("location: ../../libreria/infoLibreria/?id=".$id);
	} else if ($tipo == 'user') {
		header("location: ../../user/infoLibreria/?id=".$id);
	}
}