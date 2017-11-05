<?php

include '../conexion.php';

//termino
$keyword = $_GET['term'];
if (strlen($keyword) < 3) {
	exit();
}

//Busco Por autor 
$sql = "SELECT DISTINCT autor from libro WHERE autor LIKE '%".$keyword."%' LIMIT 5;";
$query = mysqli_query($con, $sql);
$data = array();

while ($row = mysqli_fetch_array($query)) {
   	array_push($data, $row['autor']);
}

//Busco por titulo de libro
$sql = "SELECT DISTINCT titulo from libro WHERE titulo LIKE '".$keyword."%' LIMIT 5;";
$query = mysqli_query($con, $sql);

while ($row = mysqli_fetch_array($query)) {
   	array_push($data, $row['titulo']);
}

echo json_encode($data);