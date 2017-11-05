<?php 
session_start();
if (!isset($_GET['id']) or $_GET['id'] == '') {
	header("Location: ../404.html");
	exit();
}

if (!isset($_SESSION['tipo'])) {
	//PRIMERA VEZ EN LA PAGINA
	$_SESSION['tipo'] = 'invitado';
	//Agregar al Log. 
}