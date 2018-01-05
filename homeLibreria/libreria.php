<?php
include '../conexion.php';
include_once '../lib/Libreria.php';
include_once '../lib/Libro.php';

// Inserta valores para redimensionar un link de cloudinary,
function resize($url) {
	return join("upload/h_260", explode("upload", $url));
};

//Se supone que ya se revisó si ha iniciado sesión antes. 
$id = $_SESSION['id'] ; // Aquí debería de ser una variable

$libreria = Libreria::getLibreria($id);

$books = null; 

if (isset($_GET['term'])) {
	$books = $libreria->buscaTodo($_GET['term']);
} else {
	$books = $libreria->getLibros();
}



// $sql = "SELECT idLibro, titulo,autor,precio,fotoFrente,fotoAtras,isbn,fechaAdicion
//        FROM libro WHERE idLibreria = ".$id.";";
// $result = mysqli_query($con, $sql);
// while ($row2 = mysqli_fetch_array($result)) { //Ojo con la cantidad
// 	$books[] = array('id' => $row2['idLibro'], 'titulo' => $row2['titulo'],
// 		             'autor' => $row2['autor'],'precio' => $row2['precio'],
// 	                 'fotoFrente' => $row2['fotoFrente'],
// 	                 'fotoAtras' => $row2['fotoAtras'],'isbn' => $row2['isbn'],
// 	                 'fechaAdicion' => $row2['fechaAdicion']);
// }

