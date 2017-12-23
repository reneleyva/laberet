<?php
// Conexión.
include '../conexion.php';
include ('../lib/Libro.php');
include ('../lib/Busqueda.php');

// Inserta valores para redimensionar un link de cloudinary,
function resize($url) {
	return join("upload/h_260", explode("upload", $url));
};

$books = array(); //Los libros a regresar. 
//Ver si issert q y s.
if (!isset($_GET['term']) or !isset($_GET['s'])) {
	//No han buscado nada regreso todos los libros. 
	$books = Busqueda::buscaGeneral("");
} else {
	$keyword = $_GET['term']; //Palabra clave. 
	$selection = $_GET['s']; //selection

	//Según la busqueda.
	switch ($selection) {
		    case 'todo':
		        $books = Busqueda::buscaGeneral($keyword);
		        break;

		    case 'autor':
		        $books = Busqueda::buscaAutor($keyword);
		        break;

		    case 'titulo':
		       	$books = Busqueda::buscaTitulo($keyword);
		        break;

		    case 'categoria':
		    	$books = Busqueda::buscaGeneral($keyword);
		    	break;
		}
}