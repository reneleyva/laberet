<?php 

include '../../conexion.php';
include '../../lib/Libro.php';
session_start();

if(!isset($_GET['id'])) {
	header("Location: .");
	exit();
}

if ($_SESSION['nombre'] == 'invitado') {
	header("location: ../inicioSesion");
	exit();
} 

$idLibro = $_GET['id'];
$sql = "SELECT * FROM Libro WHERE idLibro = ".$idLibro.";";
$result = $pdo->query($sql);
$row = $result->fetch();
$book = new Libro();
$book->fill($row);

//Agregar Libro
$_SESSION['cart'][$idLibro] =  $book;
header("Location: .?id=".$idLibro);
exit();