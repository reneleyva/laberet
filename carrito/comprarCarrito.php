<?php 
	include '../conexion.php';
	include_once '../lib/Libro.php';
	session_start(); 
	$carrito = $_SESSION['carrito']; 

 	//Obtengo alguna llave que usaré como id de la orden. 
	//Aseguro categoricamente que este id es único. 
	reset($carrito);
	$first_key = key($carrito);
	$sql = "INSERT INTO entrega SET 
			id=".$first_key.", 
			fecha=CURDATE(),
			status=0,
			idUsuario=".$_SESSION['id'].";";

	echo $sql;
	mysqli_query($con, $sql);
	
	foreach ($carrito as $libro) {
		$libro->setAsLibroVendido($_SESSION['id'], $first_key);
	}

	$_SESSION['carrito'] = array(); 
	$_SESSION['pago'] = false; 
	exit(); 
	// echo "<h2>TODOS LOS LIBROS EN CARRITO HAN SIDO COMPRADOS PRRO!</h2>";
?>