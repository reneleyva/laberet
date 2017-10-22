<?php

include '../../conexion.php';

//termino
$keyword = $_GET['term'];

if (strlen($keyword) < 3) {
	exit();
}
//Busco Por autor 
$sql = "SELECT DISTINCT autor from Libro WHERE autor LIKE '%".$keyword."%' LIMIT 5;";
$result = $pdo->query($sql);
$data = array();

while ($row = $result->fetch()) {
   	array_push($data, $row['autor']);
}

//Busco por titulo de libro
$sql = "SELECT DISTINCT titulo from Libro WHERE titulo LIKE '".$keyword."%' LIMIT 5;";
$result = $pdo->query($sql);

while ($row = $result->fetch()) {
   	array_push($data, $row['titulo']);
}


//Para que no muestre muchos 
//resultados si los datos son muchos se cortan
echo json_encode($data);

