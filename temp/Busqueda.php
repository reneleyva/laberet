<?php 

/**
* Clase para Libro. 
*/
class Busqueda {
	/*
	private $id;
	private $autor;
	private $titulo;
	private $isbn;
	private $fechaAdicion;
	private $precio;
	private $fotoFrente;
	private $fotoAtras;
	private $tags;
	private $idLibreria;
	*/

	//Vacio 
	function __construct() {}

	function Busca(){
		include "../../conexion.php";
		$sql = "SELECT * FROM Libro;";
		$result = $pdo->query($sql);
		$row = $result->fetch();
		$books[] = null;
		while ($row = $result->fetch()){
			//$vacio = False;
			$book = new Libro();
			$book->fill($row);
		}
	}