<?php 

include_once 'LibroVendido.php';
/**
* Usuario
*/
class Usuario {
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
		include "../conexion.php";
		$sql = "SELECT * FROM usuario WHERE idUsuario = ".$id.";";
		$query = mysqli_query($con, $sql);
		$row = mysqli_fetch_array($query);

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
	public function getCompras($id) {
		include "../conexion.php";
		include_once "../lib/Libro.php";
		$compras = array();		
		$sql = "SELECT * FROM libroVendido Natural join Libreria WHERE idUsuario = ".$id.";";
		$query = mysqli_query($con, $sql);
		while ($row = mysqli_fetch_array($query)){
			$book = new LibroVendido();
			$book->fill($row);
			array_push($compras,$book);
		}
		return $compras;
		//Falta
	}

	// Actualiza los datos de un usuario en la BD.
	public function actualizaUsuario ($id,$nombre,$correo,$pass){
		include "../conexion.php";	
		$sql = "UPDATE usuario set nombre ='".$nombre."',correo = '".$correo."', password = '".$pass."'  
				WHERE idUsuario = ".$id.";";
		$query = mysqli_query($con, $sql);
		return ($query);
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

		//Algunas funciones (por acabar).

	// Regresa todos los libros surtidos (no sé por que hago esto xd)
	public function getLibrosSurtidos (){
		include "../conexion.php";
		$sql = "SELECT * from pedidosEspeciales P join librosurtido L where P.idPedido = L.PedidosEspecialesidPedido";
		$libros = array();		
		$query = mysqli_query($con, $sql);
		while ($row = mysqli_fetch_array($query)){
			$libro = new PedidoEspecial();
			$libro->fill($row);
			array_push($libros,$libro);
		}
		return $libros;
	}

	// Regresa los libros que ya le surtieron la usuario (dudas, cuando se elimina uno)
	public function getLibroSurtido($id_usuario){
		include "../conexion.php";
		$sql = "SELECT * from pedidosEspeciales P join librosurtido L where P.idPedido = L.PedidosEspecialesidPedido and idUsuario = '$id_usuario'";
		$libros = array();		
		$query = mysqli_query($con, $sql);
		if(!$query) {
			return NULL;
		}
		while ($row = mysqli_fetch_array($query)){
			$libro = new PedidoEspecial();
			$libro->fill($row);
			array_push($libros,$libro);
		}
		return $libros;	
	} 

}

// $user = Usuario::getUsuario(1);
// include 'Libro.php';
// $libro = Libro::getLibro(2);
// $user->addToCart($libro);
// echo $user->getCarrito()[0]->getAutor();