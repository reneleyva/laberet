<?php 
session_start();
if (!isset($_GET['id'])) {
	header("Location: ../404.html");
	exit();
}

if (!isset($_SESSION['type'])) {
	header("location: ../../");
}
$id = $_GET['id'];
$tipo = $_SESSION['type'];

if ($tipo != 'invitado') {
	if ($tipo == 'libreria') {
		header("location: ../../libreria/infoLibreria/?id=".$id);
	} else if ($tipo == 'usuario') {
		header("location: ../../user/infoLibreria/?id=".$id);
	}
}