<?php 
include '../../conexion.php';
include ('../../temp/Libro.php');
session_start();

if (!isset($_GET['id'])) {
	header("Location: .");
	exit();
}

$id = $_GET['id'];

//recorrer carrito 
$carrito = $_SESSION['cart'];

for ($i = 0; $i < count($carrito); $i++) {
	$book = $carrito[$i];
	if ($book->getId() == $id) 
		unset($_SESSION['cart'][$i]);
}

exit();
