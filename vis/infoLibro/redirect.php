<?php 
session_start();
if (!isset($_GET['id'])) {
	echo "404";
	exit();
}

if (!isset($_SESSION['type'])) {
	header("location: ../../");
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