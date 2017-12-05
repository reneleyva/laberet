<?php 
	include '../conexion.php';

	$sql = "SELECT * from librovendido WHERE idLibreria=".$id." AND vendidoLinea=1 AND visto=0;";
	$query = mysqli_query($con, $sql);
	$librosVendidos = array();
	$totalVendidos = 0; 
	while ($row = mysqli_fetch_array($query)) {
		array_push($librosVendidos, $row);
		$totalVendidos += $row['precio'];
	}


?>