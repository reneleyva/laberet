<?php
include '../conexion.php';

//Se supone que ya se revisó si ha iniciado sesión antes. 
$id = $_SESSION['id'] ; // Aquí debería de ser una variable


$sql = "SELECT * FROM libreria WHERE idLibreria = ".$id.";";
$result = mysqli_query($con, $sql);
$row = mysqli_fetch_array($result);
$nombre = $row['nombre'];
$direccion = $row['direccion'];
$telefono = $row['telefono'];
$fotoPerfil = $row['fotoPerfil'];
$fotoPortada =  $row['fotoPortada'];




$books = null;
$sql = "SELECT idLibro, titulo,autor,precio,fotoFrente,fotoAtras,isbn,fechaAdicion
       FROM libro WHERE idLibreria = ".$id.";";
$result = mysqli_query($con, $sql);
while ($row2 = mysqli_fetch_array($result)) { //Ojo con la cantidad
	$books[] = array('id' => $row2['idLibro'], 'titulo' => $row2['titulo'],
		             'autor' => $row2['autor'],'precio' => $row2['precio'],
	                 'fotoFrente' => $row2['fotoFrente'],
	                 'fotoAtras' => $row2['fotoAtras'],'isbn' => $row2['isbn'],
	                 'fechaAdicion' => $row2['fechaAdicion']);
}

