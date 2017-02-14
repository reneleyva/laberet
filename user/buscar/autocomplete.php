<?php

$dbHost = 'localhost';
$dbUsername = 'root';
$dbPassword = 'root';
$dbName = 'laberet';

$db = new mysqli($dbHost,$dbUsername,$dbPassword,$dbName);

//termino
$keyword = $_GET['term'];

//Busco Por autor 
$query = $db->query("SELECT DISTINCT autor from Libro WHERE autor LIKE '".$keyword."%';");

$data = array();

while ($row = $query->fetch_assoc()) {
   	array_push($data, $row['autor']);
}


//Busco por titulo de libro
$query = $db->query("SELECT titulo from Libro WHERE titulo LIKE '%".$keyword."%';");

while ($row = $query->fetch_assoc()) {
   	array_push($data, $row['titulo']);
}

//Para que no muestre muchos 
//resultados si los datos son muchos se cortan
if (sizeof($data) > 5) {
	echo json_encode(array_slice($data, 10));
} else {
	echo json_encode($data);
}
