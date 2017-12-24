<?php 
	$carrito = $_SESSION['carrito']; 
	$total = 0;
	foreach ($carrito as $book) {
		$total += $book->getPrecio();
	}

	// Envio 
	$envio = 0; 
	$items = count($_SESSION['carrito']);

	switch ($items) {
		case 1: 
			$envio = 50; 
			break; 
		case 2: 
			$envio = 60; 
			break; 

		case 3: 
			$envio = 70;
			break; 

		case 4: 
			$envio = 80;
			break; 

		case 5: 
			$envio = 100; 
			break; 

		default:
			$envio = 150; 
			break;  

	}
	
	$total += $envio; 

	$bytes = openssl_random_pseudo_bytes(32);
	$numOrden = (string)bin2hex($bytes);
	$numOrden = strtoupper(substr($numOrden, -6));
?>