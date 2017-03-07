<?php 

include '../../conexion.php';
include '../../temp/Libro.php';
include '../../temp/Libreria.php';

if (!isset($_REQUEST['id'])) {
	echo "404";
	exit();
}

$id = $_REQUEST['id'];
$book = Libro::getLibro($id);
$libreria = Libreria::getLibreria($book->getIdLibreria());
$relacionados = $book->getLibrosRelacionados();
