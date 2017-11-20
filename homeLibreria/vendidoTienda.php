<?php 

include '../conexion.php';
include '../lib/Libro.php';

if(!isset($_GET['id'])) {
	echo "404";
	exit();
}

$id = $_GET['id'];

//Seleccionar Libro. 
$book = Libro::getLibro($id);

//Eliminar Libro
$sql = "DELETE FROM libro WHERE idLibro = ".$id.";";
mysqli_query($con, $sql);

$fecha = new DateTime();
//añadir Libro a Libro Vendido en Linea. 
$sql = "INSERT INTO librovendido SET 
	autor = '".$book->getAutor()."',
	titulo = '".$book->getTitulo()."',
	isbn = '".$book->getIsbn()."',
	precio = ".$book->getPrecio().",
	fotoFrente = '".$book->getFotoFrente()."',
	vendidoLinea = '0',
	fechaVenta = CURDATE(),
	tags = '".$book->getTags()."',
	idLibreria = '".$book->getIdLibreria()."';";

// echo $sql;
mysqli_query($con, $sql);
exit(); 
// header("Location: .");
