<?php
include '../../conexion.php';
include '../../temp/Libro.php';
include '../../temp/Libreria.php';

if (!isset($_GET['id'])) {
	echo "error";
	exit();
}

$id = $_GET['id'];
$libreria = Libreria::getLibreria($id);

if (!$libreria) {
	header("Location: ../404.html");
}
