<?php 
include_once 'PedidoEspecial.php';

// Clase para obtener consultas relacionadas con pedidos especiales.
class PedidosEspeciales {
	
	//Vacío
	function __construct() {}

	function getPedidosEspeciales (){
		include "../../conexion.php";
		$sql = "SELECT * FROM pedidosespeciales";
		$pedidos = array();		
		$result = $pdo->query($sql);
		while ($row = $result->fetch()){
			$book = new PedidoEspecial();
			$book->fill($row);
			$book -> getPrecio();
			array_push($pedidos,$book);
		}
		return $pedidos;
	}
}