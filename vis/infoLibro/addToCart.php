<?php 

include '../../conexion.php';
include '../../temp/Libro.php';
session_start();

if(!isset($_GET['id'])) {
	header("Location: .");
	exit();
}

if ($_SESSION['type'] == 'invitado') {
	//NO ha iniciado sesión, aún. 
	header("location: ../inicioSesion");
	exit();
} 

$idLibro = $_GET['id'];
$book = Libro::getLibro($idLibro);

if (!in_array($book, $_SESSION['cart'])) {
	array_push($_SESSION['cart'], $book);
} else {
	echo "YA ESATABA";
}

// echo $_SESSION['cart'][0]->getTitulo();
// header("Location: .");
// exit();
