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

<<<<<<< HEAD
$data = NULL;
=======

$data=Null;
>>>>>>> 27473e2b9a6e32397e0f3dfd3f4ce466d67d09fb
while ($row = $query->fetch_assoc()) {
    $data[] = $row['autor'];
    echo $row['autor'];
    $data[] = $row['titulo'];
}

<<<<<<< HEAD
//echo "jsnkjadihsuh";
=======
>>>>>>> 27473e2b9a6e32397e0f3dfd3f4ce466d67d09fb
echo json_encode($data);
