<?php 

include '../../conexion.php';
include_once '../../lib/Libreria.php';

$librerias = array();
$sql = "SELECT * FROM Libreria;";
$result = $pdo->query($sql);

while ($row = $result->fetch()) {
	$l = new Libreria();
	$l->fill($row);
	array_push($librerias, $l);
}
