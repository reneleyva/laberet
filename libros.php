<?php
include_once 'lib/Libro.php';
include 'conexion.php';

//Cosulta para buscar las librerías.
try {
	$sql = "SELECT * from libro LIMIT 4";
	$query = mysqli_query($con, $sql);
	$libros = array();
	while ($row = mysqli_fetch_array($query)) {
		$l = new Libro();
		$l->fill($row);
		array_push($libros, $l);
	}
} catch (Exception $e) { 
	echo "Error en libros.php";
}