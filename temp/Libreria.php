<?php 

/**
* Clase Para Librería
*/
class Libreria
{
	
	private $id;
	private $nombre;
	private $fotoPerfil;
	private $fotoPortada;
	private $telefono;
	private $direccion;
	private $coordenadas;

	function __construct(){}

	function fill(array $row) {
		$this->id = $row['idLibreria'];
		$this->nombre = $row['nombre'];
		$this->fotoPerfil = $row['fotoPerfil'];
		$this->fotoPortada = $row['fotoPortada'];
		$this->telefono = $row['telefono'];
		$this->direccion = $row['direccion'];
		$this->coordenadas = $row['coordenadas'];
	}

	//Regresa una libreria haciendo una consulta por id. 
	//Regresa NULL sino se encontró.
	function getLibreria($id) {
		include "../conexion.php";
		$sql = "SELECT * FROM Libreria WHERE idLibreria = ".$id.";";
		$result = $pdo->query($sql);
		$row = $result->fetch();

		if (!$row) {
			return Null;
		} else {
			$lib = new Libreria();
			$lib->fill($row);
			return $lib;
		}

	}
	//GETTERS AND SETTERS
	public function getId(){
		return $this->id;
	}

	public function setId($id){
		$this->id = $id;
	}

	public function getNombre(){
		return $this->nombre;
	}

	public function setNombre($nombre){
		$this->nombre = $nombre;
	}

	public function getFotoPerfil(){
		return $this->fotoPerfil;
	}

	public function setFotoPerfil($fotoPerfil){
		$this->fotoPerfil = $fotoPerfil;
	}

	public function getFotoPortada(){
		return $this->fotoPortada;
	}

	public function setFotoPortada($fotoPortada){
		$this->fotoPortada = $fotoPortada;
	}

	public function getTelefono(){
		return $this->telefono;
	}

	public function setTelefono($telefono){
		$this->telefono = $telefono;
	}

	public function getDireccion(){
		return $this->direccion;
	}

	public function setDireccion($direccion){
		$this->direccion = $direccion;
	}

	public function getCoordenadas(){
		return $this->coordenadas;
	}

	public function setCoordenadas($coordenadas){
		$this->coordenadas = $coordenadas;
	}
}

// $lib = Libreria::getLibreria(14);
// echo $lib->getNombre();
