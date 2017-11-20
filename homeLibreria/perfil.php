<?php
include '../conexion.php';

// if (!isset($_GET['id'])) {
// 	echo "error";
// 	exit();
// }

// $id = $_GET['id'];
$id = 6;
$sql = "SELECT * FROM libreria WHERE idLibreria = ".$id.";";
$query = mysqli_query($con, $sql);
$row = mysqli_fetch_array($query);
$nombre = $row['nombre'];
$direccion = $row['direccion'];
$telefono = $row['telefono'];
$fotoPerfil = $row['fotoPerfil'];
$fotoPortada = $row['fotoPortada'];
$idLibreria = $id;

//Tales que pertenecen a la librería-
$sql = 'SELECT idLibro, titulo,autor,precio,tags,fotoFrente,fotoAtras,fechaAdicion FROM libro where idLibreria = '.$id.';';
$query = mysqli_query($con, $sql);
$tam = 0;
$vacio = True;
while ($row2 = mysqli_fetch_array($query)) { //Ojo con la cantidad
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