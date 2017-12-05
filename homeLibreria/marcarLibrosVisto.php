<?php
	
	include '../conexion.php';
	$ids = $_POST['ids'];

	$sql = "UPDATE librovendido SET 
			visto=1 WHERE idLibroVendido in (".$ids.");";

	mysqli_query($con, $sql);


?>