<?php
include '../../conexion.php';

$id = 6; // Aquí debería de ser una variable

try {
	$sql = "SELECT * FROM libreria WHERE idLibreria = ".$id.";";
	$result = $pdo->query($sql);
	$row = $result->fetch();
	$nombre = $row['Nombre'];
	$direccion = $row['direccion'];
	$telefono = $row['telefono'];
} catch (Exception $e) {
	echo $e->getMessage();
}

try {
	$books = null;
	$sql = "SELECT titulo,autor,precio,fotoFrente,fotoAtras,idLibro,isbn,fechaAdicion
	       FROM libro WHERE LibreriaidLibreria = ".$id.";";
	$result = $pdo->query($sql);
	while ($row2 = $result->fetch()) { //Ojo con la cantidad
		$books[] = array('id' => $row2['idLibro'], 'titulo' => $row2['titulo'],
			             'autor' => $row2['autor'],'precio' => $row2['precio'],
		                 'fotoFrente' => $row2['fotoFrente'],
		                 'fotoAtras' => $row2['fotoAtras'],'isbn' => $row2['isbn'],
		                 'fechaAdicion' => $row2['fechaAdicion']);
	}
} catch (Exception $e) {
	echo $e->getMessage();
}
