<?php 
	include '../lib/Busqueda.php';
	$accion = $_GET['accion'];
	// Si se piden los datos
	if ($accion == 'getDetalle') {
		$id = $_GET['id_pedido'];
		$json = Busqueda::getDetalle($id);
		echo json_encode($json);
		// echo $json;
	}
?>