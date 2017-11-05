<?php 

include '../conexion.php';
include '../lib/Libro.php';
session_start();

if(!isset($_GET['id'])) {
	header("Location: .");
	exit();
}

$idLibro = $_GET['id'];

if ($_SESSION['tipo'] == 'invitado') {
	//NO ha iniciado sesión, aún. 
	header("location: ../inicioSesion/?idLibro=".$idLibro);
	exit();
} 


$book = Libro::getLibro($idLibro);

if (!in_array($book, $_SESSION['carrito'])) {
	array_push($_SESSION['carrito'], $book);
	// header("location: ./?id=".$idLibro);
	exit();

} else {
	echo "YA ESATABA";
	// header("location: ./?id=".$idLibro);
	echo count($_SESSION['carrito']);
	exit();
}

// echo $_SESSION['cart'][0]->getTitulo();

