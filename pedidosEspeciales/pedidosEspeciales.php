<?php 

include '../conexion.php';
session_start();

if (isset($_POST['isbn'])){
	
$isbn = $_POST['isbn'];
$autor = $_POST['autor'];
$titulo = $_POST['titulo'];
$descripcion = $_POST['descripcion'];
$sql = 'INSERT INTO pedidosespeciales SET
	isbn ="' . $isbn . '",
	autor = "'.$autor.'",
	titulo = "'.$titulo.'",
	descripcion = "'.$descripcion.'",
	idUsuario = '.$_SESSION['id'].';';     

mysqli_query($con, $sql);
header('Location: ./pedidosEspeciales-enviado.php');
exit();	

}