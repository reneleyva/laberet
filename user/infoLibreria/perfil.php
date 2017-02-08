<?php
include '../../conexion.php';

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
	$sql = 'SELECT titulo,autor,precio,tags,fotoFrente,fotoAtras FROM Libro';
	$result = $pdo->query($sql);
	$contador = 0;
	$vacio = True;
	while ($row2 = $result->fetch()) { //Ojo con la cantidad
		    $vacio = False;
			$books[] = array('titulo' => $row2['titulo'],'autor' => $row2['autor'],'precio' => $row2['precio'],
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