<?php
include 'conexion.php';
$librerias = Null;
//Cosulta para buscar las librerías.
try {
	$sql = "SELECT Nombre,direccion,fotoPerfil,idLibreria FROM Libreria;";
	$result = $pdo->query($sql);
	
	while ($row = $result->fetch()) {
		$librerias[] = array('Nombre' => $row['Nombre'], 'direccion' => $row['direccion'],
			                 'fotoPerfil' => $row['fotoPerfil'],
			                 'idLibreria' => $row['idLibreria']);
	}
} catch (Exception $e) {
	echo "Pene de Morubio";
}