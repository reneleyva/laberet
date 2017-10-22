<?php
include '../../conexion.php';
include '../../lib/Libro.php';
include '../../lib/Libreria.php';

if (!isset($_GET['id'])) {
	echo "error";
	exit();
}

$id = $_GET['id'];
$libreria = Libreria::getLibreria($id);

if (!$libreria) {
	header("Location: ../404.html");
}
