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
	$sql = "SELECT titulo,autor,precio,fotoFrente,fotoAtras,idLibro
	       FROM libro WHERE LibreriaidLibreria = ".$id.";";
	$result = $pdo->query($sql);
	while ($row2 = $result->fetch()) { //Ojo con la cantidad
		$books[] = array('id' => $row2['idLibro'], 'titulo' => $row2['titulo'],
			             'autor' => $row2['autor'],'precio' => $row2['precio'],
		                 'fotoFrente' => $row2['fotoFrente'],'fotoAtras' => $row2['fotoAtras']);
	}
} catch (Exception $e) {
	echo $e->getMessage();
}

/*

if (!isset($_GET['id'])) {
	echo "erro";
	exit();
}

$id = $_GET['id'];
try {
	$sql = "SELECT * FROM libreria WHERE idLibreria = ".$id.";";
	$result = $pdo->query($sql);
	$row = $result->fetch();
	$nombre = $row['Nombre'];
	$direccion = $row['direccion'];
	$telefono = $row['telefono'];
} catch (Exception $e) {
	echo "Pene de Morubio";
}


try{
	//Tales que pertenecen a la librería-
	$sql = 'SELECT idLibro, titulo,autor,precio,tags,fotoFrente,fotoAtras FROM Libro where LibreriaidLibreria = '.$id.';';
	$result = $pdo->query($sql);
	$contador = 0;
	$vacio = True;
	while ($row2 = $result->fetch()) { //Ojo con la cantidad
		    $vacio = False;
			$books[] = array('id' => $row2['idLibro'], 'titulo' => $row2['titulo'],'autor' => $row2['autor'],'precio' => $row2['precio'],
			'fotoFrente' => $row2['fotoFrente'],'fotoAtras' => $row2['fotoAtras']);
	}
	if ($vacio) {
		echo 'No hay libros que mostrar.';
		exit();
	}
} catch (PDOException $e) {
	$error = 'Error fetching books: ' . $e->getMessage();
	exit();
}


*/