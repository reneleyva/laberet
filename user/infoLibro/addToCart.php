<?php 

include '../../conexion.php';
include '../../temp/Libro.php';
session_start();

if(!isset($_GET['id'])) {
	header("Location: .");
	exit();
}

if ($_SESSION['nombre'] == 'invitado') {
	header("location: ../inicioSesion");
	exit();
} 

$idLibro = $_GET['id'];
$sql = "SELECT * FROM Libro WHERE idLibro = ".$idLibro.";";
$result = $pdo->query($sql);
$row = $result->fetch();
$book = new Libro();
$book->fill($row);
if(count($_SESSION['cart']) == 0)
{
	array_push($_SESSION['cart'], $book)

}
else
{
	foreach ($_SESSION['cart'] as $cart) {
		if($book.compareTo($cart))
			echo "Fuck you";
	}
	array_push($_SESSION['cart'], $book)
}
echo $_SESSION['cart'][0]->getTitulo();
// header("Location: .");
// exit();
