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
// $carrito = $_SESSION['cart'];
// echo isset($_SESSION['cart'][121]);
// echo $_SESSION['cart'][121]->getTitulo();
if (isset($_SESSION['cart'][$id])) {
	unset($_SESSION['cart'][$id]);
}
// foreach (array_keys($carrito, $id) as $key) {
//     unset($carrito[$key]);
// }

// for ($i = 0; $i < count($carrito); $i++) {
// 	if(!isset($carrito[$i]))
// 		continue;
// 	$book = $carrito[$i];
// 	if ($book->getId() == $id) 
// 		unset($_SESSION['cart'][$i]);
// }

// header("Location: .");
exit();