<?php 

// Clase para modelar Libro surtido y pedido
Class PedidoEspecial {
	private $id_pedido; // El del join (la otra tabla)
	private $idLibreria;
	private $foto;
	private $precio;
	private $descripcion;

	// Constructor
	/*
	function __construct(){
		$this-> = array();
	}
	*/
	

	//Llena el objeto. 
	function fill($row) {
		$this->id_pedido = $row['idPedido'];
		$this->idLibreria = $row['LibreriaidLibreria'];
		$this->foto = $row['foto'];
		$this->descripcion = $row['descripcion'];
		$this->precio = $row['precio'];
	}

	// Getters  
	function getFoto(){
		return $this->foto;
	}

	function getPrecio(){
		return $this->precio;
	}

	function getDescripcion(){
		return $this->descripcion;
	}

	function getidLibreria(){
		return $this->idLibreria;
	}
}

?>