<?php
include 'conexion.php';

//Cosulta para buscar las librerías.
try {
	$sql = "SELECT Nombre,direccion,fotoPerfil,idLibreria FROM libreria;";
	$result = $pdo->query($sql);
	$librerias = Null;
	while ($row = $result->fetch()) {
		$librerias[] = array('Nombre' => $row['Nombre'], 'direccion' => $row['direccion'],
			                 'fotoPerfil' => $row['fotoPerfil'],
			                 'idLibreria' => $row['idLibreria']);
	}
} catch (Exception $e) {
	echo "Pene de Morubio";
}