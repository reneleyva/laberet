<?php
include '../conexion.php'; 
session_start(); 
$id = $_SESSION['id']; 

$sql = "SELECT * from direccion WHERE idUsuario = ".$id.";";
$query = mysqli_query($con, $sql);
$direccion = mysqli_fetch_array($query);  
?>