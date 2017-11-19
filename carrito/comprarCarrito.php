<?php 
	include '../lib/Libro.php';
	session_start(); 
	$carrito = $_SESSION['carrito']; 

	function vendeLibro($libro) {
		echo $libro->getTitulo();
	}

	foreach ($carrito as $libro) {
		vendeLibro($libro);
	}
	
?>