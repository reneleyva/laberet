<?php 

include '../conexion.php';
include '../lib/Libro.php';
include '../lib/Libreria.php';
include '../lib/Busqueda.php';

function resize($url, $size) {
	return join("upload/h_".$size, explode("upload", $url));
};


if (!isset($_REQUEST['id'])) {
	header("Location: ../404.html");
	exit();
}

$id = $_REQUEST['id'];
$book = Libro::getLibro($id);

if ($book === NULL) {
	header("Location: ../404.html");
	exit();
}
$libreria = Libreria::getLibreria($book->getIdLibreria());
$relacionados = Busqueda::getLibrosRelacionados($id);
