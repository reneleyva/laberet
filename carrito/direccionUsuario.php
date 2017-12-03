<?php
include '../conexion.php'; 
$id = $_SESSION['id']; 

$sql = "SELECT * from direccion WHERE idUsuario = ".$id.";";
$query = mysqli_query($con, $sql);
$direccion = NULL; 
if ($query) {
	$direccion = mysqli_fetch_array($query); 
}
	
?>