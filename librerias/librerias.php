<?php 

include '../conexion.php';
include_once '../lib/Libreria.php';

$librerias = array();
$sql = "SELECT * FROM libreria;";
$query = mysqli_query($con, $sql);

while ($row = mysqli_fetch_array($query)) {
	$l = new Libreria();
	$l->fill($row);
	array_push($librerias, $l);
}
