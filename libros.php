<?php
include 'conexion.php';

//Cosulta para buscar las librerías.
try {
	$sql = "SELECT titulo,autor,precio,LibreriaidLibreria FROM libro;";
	$result = $pdo->query($sql);
	$libros = Null;
	while ($row = $result->fetch()) {
		$libros[] = array('titulo' => $row['titulo'],'autor' => $row['autor'],
			        'precio' => $row['precio']);
	}
} catch (Exception $e) {
	echo "Pene de Morubio";
}