<?php 
	include '../conexion.php';
	include '../lib/Libro.php';
	session_start(); 
	$carrito = $_SESSION['carrito']; 

 	//Obtengo alguna llave que usaré como id de la orden. 
	//Aseguro categoricamente que este id es único. 
	reset($carrito);
	$first_key = key($carrito);
	$fecha = new DateTime();
	$sql = "INSERT INTO pedido_entrega SET 
			id=".$first_key.", 
			fecha=".$fecha->getTimestamp()."
			status=0,
			idUsuario=".$_SESSION['id'].";";

	mysqli_query($con, $sql);
	foreach ($carrito as $libro) {
		$libro->setAsLibroVendido($_SESSION['id'], $first_key);
	}

	$_SESSION['carrito'] = array(); 
	echo "<h2>TODOS LOS LIBROS EN CARRITO HAN SIDO COMPRADOS PRRO!</h2>";
	
?>