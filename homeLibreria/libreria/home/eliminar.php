<?php
include '../../conexion.php';

if(!isset($_GET['id'])) {
	header("Location: .");
	exit();
}

$idLibro = $_GET['id'];

$sql = "DELETE FROM Libro WHERE idLibro = ".$idLibro.";";
$pdo->query($sql);
header("Location: index.php");
