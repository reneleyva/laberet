<?php 

include '../../conexion.php';
include '../../lib/Libro.php';
session_start();

if(!isset($_GET['id'])) {
	header("Location: .");
	exit();
}

$idLibro = $_GET['id'];

if ($_SESSION['type'] == 'invitado') {
	//NO ha iniciado sesión, aún. 
	header("location: ../inicioSesion/?idLibro=".$idLibro);
	exit();
} 


$book = Libro::getLibro($idLibro);

if (!in_array($book, $_SESSION['cart'])) {
	array_push($_SESSION['cart'], $book);
} else {
	echo "YA ESATABA";
}

// echo $_SESSION['cart'][0]->getTitulo();
// header("Location: .");
// exit();
