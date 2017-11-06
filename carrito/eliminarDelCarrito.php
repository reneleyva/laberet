<?php 
include ('../lib/Libro.php');
session_start();

if (!isset($_GET['id'])) {
	header("Location: .");
	exit();
}

$id = $_GET['id'];
//recorrer carrito 
// $test = array();
// array_push($test, 'LOOOL');
// echo $test[0];
// echo isset($_SESSION['cart'][121]);
// echo $_SESSION['cart'][121]->getTitulo();
if (isset($_SESSION['carrito'][$id])) {
	unset($_SESSION['carrito'][$id]);
}

// for ($i = 0; $i < count($carrito); $i++) {
// 	if(!isset($carrito[$i]))
// 		continue;
// 	$book = $carrito[$i];
// 	if ($book->getId() == $id) 
// 		unset($_SESSION['cart'][$i]);
// }

header("Location: .");
exit();