<?php 

/**
* Usuario
*/
class Usuario
{
	private $id;
	private $correo;
	private $nombre;
	private $carrito;

	//No incluye password por que no. 
	function __construct(){
		$this->carrito = array();
	}

	//Llena el objeto. 
	function fill($row) {
		$this->id = $row['idUsuario'];
		$this->nombre = $row['nombre'];
		$this->correo = $row['correo'];
	}

	//Regresa un usuario haciendo una consulta por id. 
	//Regresa NULL sino se encontró.
	function getUsuario($id) {
		include "../../conexion.php";
		$sql = "SELECT * FROM Usuario WHERE idUsuario = ".$id.";";
		$result = $pdo->query($sql);
		$row = $result->fetch();

		if (!$row) {
			return Null;
		} else {
			$user = new Usuario();
			$user->fill($row);
			return $user;
		}
	}

	/** Regresa en un arreglo los libros recientemente 
	* comprados por el usuario. */
	public function getCompras() {
		include "../../conexion.php";
		include_once "../../temp/Libro.php";
		$compras = array();
		
		$sql = "SELECT * FROM Usuario WHERE idUsuario = ".$id.";";
		$result = $pdo->query($sql);
		$row = $result->fetch();
	}

	//agrega un elemento al carrito; EL un Objeto Libro. 
	public function addToCart($libro) {
		array_push($this->carrito, $libro);
	}

	public function getId(){
		return $this->id;
	}

	public function setId($id){
		$this->id = $id;
	}

	public function getCorreo(){
		return $this->correo;
	}

	public function setCorreo($correo){
		$this->correo = $correo;
	}

	public function getNombre(){
		return $this->nombre;
	}

	public function setNombre($nombre){
		$this->nombre = $nombre;
	}

	public function getCarrito(){
		return $this->carrito;
	}

	public function setCarrito($carrito){
		$this->carrito = $carrito;
	}

}

// $user = Usuario::getUsuario(1);
// include 'Libro.php';
// $libro = Libro::getLibro(2);
// $user->addToCart($libro);
// echo $user->getCarrito()[0]->getAutor();