<?php

include 'conexion.php';

//termino
$keyword = $_GET['term'];

if (strlen($keyword) < 3) {
	exit();
}

//Busco Por autor 
$sql = "SELECT DISTINCT autor from Libro WHERE autor LIKE '%".$keyword."%';";
$result = $pdo->query($sql);
$data = array();

while ($row = $result->fetch()) {
   	array_push($data, $row['autor']);
}

//Busco por titulo de libro
$sql = "SELECT DISTINCT titulo from Libro WHERE titulo LIKE '".$keyword."%';";
$result = $pdo->query($sql);

while ($row = $result->fetch()) {
   	array_push($data, $row['titulo']);
}


//Para que no muestre muchos 
//resultados si los datos son muchos se cortan
if (sizeof($data) > 5) {
	echo json_encode(array_slice($data, 10));
} else {
	echo json_encode($data);
}
