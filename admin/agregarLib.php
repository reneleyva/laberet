<?php
require '../lib/cloudinary/src/Cloudinary.php';
require '../lib/cloudinary/src/Uploader.php';
require '../lib/cloudinary/src/Api.php';
include '../conexion.php';

$nombre = $_POST['nombre'];
$telefono = $_POST['telefono'];
$direccion = $_POST['direccion'];
$coordenadas = $_POST['coordenadas'];
$nombreUsuario = $_POST['nombreUsuario'];
$pass = md5($_POST['password']."teamolizzteamoluz");
$correo = $_POST['correo'];
$facebook = $_POST['facebook'];
$instagram = $_POST['instagram'];
$twitter = $_POST['twitter']; 

$fotoPerfilPath = "";
$fotoPortadaPath = "";

$cloud = getenv('CLOUD_NAME');
$api_key = getenv('API_KEY');
$api_secret = getenv('API_SECRET');

\Cloudinary::config(array( 
  "cloud_name" => $cloud,  
  "api_key" => $api_key, 
  "api_secret" => $api_secret 
));



$fotoPerfil = \Cloudinary\Uploader::upload($_FILES['fotoPerfil']['tmp_name']); 
$fotoPortada = \Cloudinary\Uploader::upload($_FILES['fotoPortada']['tmp_name']); 

$fotoPerfilPath = $fotoPerfil['url'];
$fotoPortadaPath = $fotoPortada['url'];

echo $fotoPerfilPath."<br>";
echo $fotoPortadaPath;

$sql = 'INSERT INTO libreria SET
			nombre ="' .$nombre.'",
			fotoPerfil = "'.$fotoPerfilPath.'",
			fotoPortada = "'.$fotoPortadaPath.'",
            telefono = "'.$telefono.'",
			direccion = "'.$direccion.'",
            correo = "'.$correo.'",
            facebook = "'.$facebook.'",
            instagram = "'.$instagram.'",
            twitter = "'.$twitter.'",
			coordenadas = "'.$coordenadas.';"';     

mysqli_query($con, $sql);

// Consulta para obetener el id mayor 
$idMaximo = 'SELECT max(idLibreria) as max from libreria;';
$query = mysqli_query($con, $idMaximo);
$value = mysqli_fetch_array($query);
$id = $value['max'];
echo $pass;
$sql = 'INSERT INTO administradorlibreria SET
			nombreUsuario ="' .$nombreUsuario.'",
			password = "'.$pass.'",
			idLibreria = "'.$id.'";';     
mysqli_query($con, $sql);
header("location: ./");
exit();

