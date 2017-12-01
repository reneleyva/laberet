<?php 
	include_once '../lib/Libro.php';
	session_start(); 
	$carrito = $_SESSION['carrito']; 
	$total = 0;
	foreach ($carrito as $book) {
		$total += $book->getPrecio();
	}

	// Envio 
	$total += 100; 

	echo json_encode($total);

 ?>