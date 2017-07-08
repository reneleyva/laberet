<?php 
session_start();
if (!isset($_GET['id'])) {
	header("Location: ../404.html");
	exit();
}

if (!isset($_SESSION['type'])) {
	//PRIMERA VEZ EN LA PAGINA
	$_SESSION['type'] = 'invitado';
	//Agregar al Log. 
}
$id = $_GET['id'];
$tipo = $_SESSION['type'];

if ($tipo != 'invitado') {
	if ($tipo == 'libreria') {
		header("location: ../../libreria/infoLibro/?id=".$id);
	} else if ($tipo == 'usuario') {
		header("location: ../../user/infoLibro/?id=".$id);
	}
}