<?php 
	include_once '../lib/Libro.php';
	session_start(); 
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

	echo json_encode($total);

 ?>