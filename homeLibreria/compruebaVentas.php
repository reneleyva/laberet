<?php 
	session_start();
	include '../conexion.php';

	$id = $_SESSION['id'];
	// Comprueba si la librería tiene libros vendidos en linea en ordenes que no hayan sido notificados todavía. 
	$sql = "SELECT 1 from librovendido WHERE idLibreria=".$id." AND vendidoLinea=1 AND visto=0;";
	$res = mysqli_query($con, $sql);
	$row = mysqli_fetch_array($res);

	if ($row) {
		echo 1;
		exit();
	} else {
		echo 0;
		exit();
	}
	
?>