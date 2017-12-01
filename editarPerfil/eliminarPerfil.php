<?php 
	include '../conexion.php';
	session_start();
	$id = $_SESSION['id'];
	$sql = "DELETE FROM usuario WHERE idUsuario=".$id."";
	// echo $sql;
	mysqli_query($con, $sql);


?>