<?php 

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
if (!isset($_SESSION['carrito'][$idLibro])) {
	$_SESSION['carrito'][$idLibro] = $book; 
	header("location: .?id=".$idLibro);
} else {
	header("location: .?id=".$idLibro);
	exit(); 
}

// echo $_SESSION['cart'][0]->getTitulo();

