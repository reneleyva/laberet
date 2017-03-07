<?php
// Conexión.
include_once '../../conexion.php';
include_once ('../../temp/Libro.php');
include_once ('../../temp/Busqueda.php');

$books = array(); //Los libros a regresar. 

//Ver si issert q y s.
if (!isset($_GET['q']) or !isset($_GET['s'])) {
	//No han buscado nada regreso todos los libros. 
	$books = Busqueda::buscaGeneral("");
} else {
	$keyword = $_GET['q']; //Palabra clave. 
	$selection = $_GET['s']; //selection

	//Según la busqueda.
	switch ($selection) {
		    case 'Todo':
		        $books = Busqueda::buscaGeneral($keyword);
		        break;

		    case 'Autor':
		        $books = Busqueda::buscaAutor($keyword);
		        break;

		    case 'Titulo':
		       	$books = Busqueda::buscaTitulo($keyword);
		        break;

		    case 'Categoria':
		    	$books = Busqueda::buscaGeneral($keyword);
		    	break;
		}
}