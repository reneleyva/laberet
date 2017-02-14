<?php
include '../conexion.php';

// if (!isset($_GET['id'])) {
// 	echo "error";
// 	exit();
// }

// $id = $_GET['id'];
$id = 6;
try {
	$sql = "SELECT * FROM libreria WHERE idLibreria = ".$id.";";
	$result = $pdo->query($sql);
	$row = $result->fetch();
	$nombre = $row['Nombre'];
	$direccion = $row['direccion'];
	$telefono = $row['telefono'];
	$fotoPerfil = $row['fotoPerfil'];
	$fotoPortada = $row['fotoPortada'];
	$idLibreria = $id;
} catch (Exception $e) {
	echo "Pene de Morubio";
}

try{
	//Tales que pertenecen a la librería-
	$sql = 'SELECT idLibro, titulo,autor,precio,tags,fotoFrente,fotoAtras,fechaAdicion FROM Libro where LibreriaidLibreria = '.$id.';';
	$result = $pdo->query($sql);
	$tam = 0;
	$vacio = True;
	while ($row2 = $result->fetch()) { //Ojo con la cantidad
		    $vacio = False;
		    $tam++;
		    $titulos[]=$row2['titulo'];
		    $idLibros[] = $row2['idLibro'];
		    $autores[] = $row2['autor'];
		    $precios[]=$row2['precio'];
		    $fotoFrente[]=$row2['fotoFrente'];
		    $fotoAtras[]=$row2['fotoAtras'];
		    $fechas[]=$row2['fechaAdicion'];
	}
	if ($vacio) {
		echo 'No hay libros que mostrar.';
		exit();
	}
} catch (PDOException $e) {
	$error = 'Error fetching books: ' . $e->getMessage();
	exit();
}