<?php 
	$carrito = $_SESSION['carrito']; 
	$total = 0;
	foreach ($carrito as $book) {
		$total += $book->getPrecio();
	}

	// Envio 
	$total += 100; 
	$bytes = openssl_random_pseudo_bytes(32);
	$numOrden = (string)bin2hex($bytes);
	$numOrden = strtoupper(substr($numOrden, -6));
?>