<?php
include '../conexion.php';
include_once "../lib/Libro.php";
include_once "../lib/Libreria.php";

function resize($url) {
	return join("upload/h_240", explode("upload", $url));
};

$books = array();
/*Aseguro que GET['id'] va estar pues 
* perfil.php se ejecuta primero en la vista y este lo checa antes. */
$libreria = Libreria::getLibreria($_GET['id']); 

if (!isset($_GET['q']) or !isset($_GET['s']) ) {
	//No se está buscando nada se despliegan todos los libros. 
	$books = $libreria->getLibros();
} else {

	$keyword = $_GET['q']; //Palabra clave. 
	$selection = $_GET['s']; //selection

	//Según la busqueda.
	switch ($selection) {
		    case 'todo':
		        $books = $libreria->buscaTodo($keyword);
		        break;

		    case 'autor':
		        $books = $libreria->buscaAutor($keyword);
		        break;

		    case 'titulo':
		       	$books = $libreria->buscaTitulo($keyword);
		        break;

		    case 'categoria':
		    	$books = $libreria->buscaTodo($keyword);
		    	break;
	}

}