<?php
include '../../conexion.php';

//Se supone que ya se revisó si ha iniciado sesión antes. 
$id = $_SESSION['id'] ; // Aquí debería de ser una variable

try {
	$sql = "SELECT * FROM Libreria WHERE idLibreria = ".$id.";";
	$result = $pdo->query($sql);
	$row = $result->fetch();
	$nombre = $row['nombre'];
	$direccion = $row['direccion'];
	$telefono = $row['telefono'];
	$fotoPerfil = $row['fotoPerfil'];
	$fotoPortada =  $row['fotoPortada'];
	
} catch (Exception $e) {
	echo $e->getMessage();
}

try {
	$books = null;
	$sql = "SELECT idLibro, titulo,autor,precio,fotoFrente,fotoAtras,isbn,fechaAdicion
	       FROM Libro WHERE idLibreria = ".$id.";";
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
