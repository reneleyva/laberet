<?php 
	session_start(); 
    require '../lib/cloudinary/src/Cloudinary.php';
    require '../lib/cloudinary/src/Uploader.php';
    require '../lib/cloudinary/src/Api.php';
	include '../conexion.php';

	$id = $_SESSION['id'];

    $cloud = getenv('CLOUD_NAME');
    
    $fotoPortadaPath = $_POST['fotoPortada'];
    $fotoPortadaPath = "http://res.cloudinary.com/".$cloud."/".explode("#", $fotoPortadaPath)[0];

  
    // Actualizar foto de perfil de librería con nueva foto 
    $sql = "UPDATE libreria SET 
    		fotoPortada='".$fotoPortadaPath."' 
    		WHERE idLibreria=".$id." ;"; 

    mysqli_query($con, $sql);
    header("Location: .");

?>