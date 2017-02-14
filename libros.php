<?php
include 'conexion.php';

//Cosulta para buscar las librerías.
try {
	$sql = "SELECT titulo,autor,precio,fotoFrente,LibreriaidLibreria,idLibro FROM libro
	        order by fechaAdicion DESC;";
	$result = $pdo->query($sql);
	$libros = Null;
	$contador = 1;
	while ($row = $result->fetch()) {
		if ($contador < 5) {
			$contador++;
			$libros[] = array('titulo' => $row['titulo'],'autor' => $row['autor'],
			        'precio' => $row['precio'],'fotoFrente' => $row['fotoFrente'],
			         'idLibro' => $row['idLibro']);
		} else {
			break;
		}
	}
} catch (Exception $e) { 
	echo "Pene de Morubio";
}