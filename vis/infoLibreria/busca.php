<?php
include '../../conexion.php';
include_once "../../temp/Libro.php";
include_once "../../temp/Libreria.php";
$books = array();
/*Aseguro que GET['id'] va estar pues 
* perfil.php se ejecuta primero en la vista y este lo checa antes. */
$libreria = Libreria::getLibreria($_GET['id']); 

if (!isset($_GET['q']) or !isset($_GET['s']) ) {
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