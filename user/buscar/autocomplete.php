<?php

 //database configuration
$dbHost = 'localhost';
$dbUsername = 'root';
$dbPassword = 'root';
$dbName = 'laberet';

$db = new mysqli($dbHost,$dbUsername,$dbPassword,$dbName);

//termino
$keyword = $_GET['term'];

//Por autor 
$query = $db->query("SELECT autor from Libro WHERE autor LIKE '".$keyword."%';");

$data = array();

while ($row = $query->fetch_assoc()) {
    if (!in_array($row['autor'], $data, false)) {
    	// echo "Valor: ".$row['autor'];
   		$data[] = $row['autor'];
    }
}

echo "VAlor1: ".$data[1];
echo "VAlor2: ".$data[2];

if ($data[1] == $data[2]) {
	echo "The same shit";
} else {
	echo "WTF";
}
$query = $db->query("SELECT titulo from Libro WHERE titulo LIKE '".$keyword."%';");

while ($row = $query->fetch_assoc()) {
	if (!in_array($row['titulo'], $data))
   		$data[] = $row['titulo'];
}

// echo json_encode($data);
// if (in_array("Jaime Sabines", $data)) {
// 	echo "jlkjlkj";
// }
// else 
// 	echo "Nope";
