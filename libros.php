<?php
include_once 'lib/Libro.php';
include 'conexion.php';

function resize($url) {
	return join("upload/h_260", explode("upload", $url));
};

//Cosulta para buscar las librerías.
try {
	$sql = "SELECT * FROM libro ORDER BY idLibro DESC LIMIT 4";
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