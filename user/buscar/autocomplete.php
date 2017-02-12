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

echo json_encode($data);