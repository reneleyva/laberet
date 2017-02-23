<?php 

include '../../conexion.php';

if (!isset($_GET['id'])) {
	echo "404";
	exit();
}

$id = $_GET['id'];
$sql = "SELECT * FROM Libro WHERE idLibro = ".$id.";";
$result = $pdo->query($sql);
$row = $result->fetch();

if (!$row) {
	echo "404";
	exit();
}

$fotoFrente = $row['fotoFrente'];
$fotoAtras = $row['fotoAtras'];
$isbn = $row['isbn'];
$autor = $row['autor'];
$titulo = $row['titulo'];
$precio = $row['precio'];
// $tags = explode($row['tags'], " ");
$tags = implode(", ", explode(" ", trim($row['tags'])));

