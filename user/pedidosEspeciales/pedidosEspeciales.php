<?php 

include '../../conexion.php';

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
			usuarioidUsuario = 1;';     

		$pdo->exec($sql);
		$exito = True;
	} catch(Exception $e) {
  		echo 'Message: ' .$e->getMessage();
	}
	if ($exito) {
		include 'pedidosEspeciales-enviado.html';
	}
		
	exit();	
}