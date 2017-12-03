<?php 
include_once 'PedidoEspecial.php';

// Clase para obtener consultas relacionadas con pedidos especiales.
class PedidosEspeciales {
	
	//Vacío
	function __construct() {}

	function getPedidosEspeciales (){
		include "../conexion.php";
		$sql = "SELECT * FROM pedidosespeciales";
		$pedidos = array();		
		$result = mysqli_query($con, $sql);
		while ($row = mysqli_fetch_array($result)){
			$book = new PedidoEspecial();
			$book->fill($row);
			echo $book -> getPrecio();
			array_push($pedidos,$book);
		}
		return $pedidos;
	}
}