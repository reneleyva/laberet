<?php 
	include '../lib/Busqueda.php';
	$accion = $_GET['accion'];
	// Si se piden los datos
	if ($accion == 'getDetalle') {
		$id = $_GET['id_pedido'];
		// Busca el detalle
		$json = Busqueda::getDetalle($id);
		// Regresa la nfo en forma de JSON
		echo json_encode($json);
	}
?>