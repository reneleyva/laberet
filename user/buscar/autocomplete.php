<?php

 //database configuration
$dbHost = 'localhost';
$dbUsername = 'root';
$dbPassword = 'root';
$dbName = 'laberet';

//connect with the database
$db = new mysqli($dbHost,$dbUsername,$dbPassword,$dbName);

//get search term
$keyword = $_GET['term'];

//get matched data from skills table
$query = $db->query("SELECT titulo,autor from Libro where lower(tags) 
		        like lower('".$keyword."%') or lower(titulo) like lower('".$keyword."%') 
		        or lower(autor) like lower('% ".$keyword."%');");


$data=Null;
while ($row = $query->fetch_assoc()) {
    $data[] = $row['autor'];
    echo $row['autor'];
    $data[] = $row['titulo'];
}

echo json_encode($data);
