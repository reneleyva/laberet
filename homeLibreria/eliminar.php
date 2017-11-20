<?php
include '../conexion.php';

if(!isset($_GET['id'])) {
	header("Location: .");
	exit();
}

$idLibro = $_GET['id'];

$sql = "DELETE FROM libro WHERE idLibro = ".$idLibro.";";
mysqli_query($con, $sql);
header("Location: index.php");
exit();
