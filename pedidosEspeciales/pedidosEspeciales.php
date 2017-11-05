<?php 

include '../../conexion.php';
session_start();

if (isset($_POST['isbn'])){
	
	$isbn = $_POST['isbn'];
	$autor = $_POST['autor'];
	$titulo = $_POST['titulo'];
	$descripcion = $_POST['descripcion'];
	$exito = False;
	try{
		$sql = 'INSERT INTO pedidosespeciales SET
			isbn ="' . $isbn . '",
			autor = "'.$autor.'",
			titulo = "'.$titulo.'",
			descripcion = "'.$descripcion.'",
			idUsuario = '.$_SESSION['id'].';';     

		$pdo->exec($sql);
		$exito = True;
	} catch(Exception $e) {
  		echo 'Message: ' .$e->getMessage();
	}
	if ($exito) {
		header('Location: ./pedidosEspeciales-enviado.php');
	}
		
	exit();	
}