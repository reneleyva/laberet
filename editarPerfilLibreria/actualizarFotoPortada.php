<?php 
	session_start(); 
    require '../lib/cloudinary/src/Cloudinary.php';
    require '../lib/cloudinary/src/Uploader.php';
    require '../lib/cloudinary/src/Api.php';
	include '../conexion.php';

	$id = $_SESSION['id'];

    $cloud = getenv('CLOUD_NAME');
    $api_key = getenv('API_KEY');
    $api_secret = getenv('API_SECRET');

    \Cloudinary::config(array( 
      "cloud_name" => $cloud,  
      "api_key" => $api_key, 
      "api_secret" => $api_secret 
    ));

    $fotoPortada = \Cloudinary\Uploader::upload($_FILES['foto-portada']['tmp_name']); 
    $fotoPortadaPath = $fotoPortada['url'];
  
    // Actualizar foto de perfil de librería con nueva foto 
    $sql = "UPDATE libreria SET 
    		fotoPortada='".$fotoPortadaPath."' 
    		WHERE idLibreria=".$id." ;"; 

    mysqli_query($con, $sql);
    header("Location: .");

?>