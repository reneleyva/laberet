<?php 

include '../../conexion.php';
include '../../temp/Libro.php';

if(!isset($_GET['id'])) {
	echo "404";
	exit();
}

$id = $_GET['id'];

//Seleccionar Libro. 
$book = Libro::getLibro($id);

//Eliminar Libro
$sql = "DELETE FROM Libro WHERE idLibro = ".$id.";";
$pdo->query($sql);

//añadir Libro a Libro Vendido en Linea. 
$sql = "INSERT INTO LibroVendido SET 
	autor = '".$book->getAutor()."',
	titulo = '".$book->getTitulo()."',
	isbn = '".$book->getIsbn()."',
	precio = ".$book->getPrecio().",
	fotoFrente = '".$book->getFotoFrente()."',
	vendidoLinea = '',
	tags = '".$book->getTags()."',
	idLibreria = '".$book->getIdLibreria()."';";

$pdo->query($sql);
header("Location: .");
