<?php 

include '../../conexion.php';
include '../../temp/Libro.php';
include '../../temp/Libreria.php';
include '../../temp/Busqueda.php';

if (!isset($_REQUEST['id'])) {
	header("Location: ../404.html");
	exit();
}

$id = $_REQUEST['id'];
$book = Libro::getLibro($id);
$libreria = Libreria::getLibreria($book->getIdLibreria());
$relacionados = Busqueda::getLibrosRelacionados($id);
