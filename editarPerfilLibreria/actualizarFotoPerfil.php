<?php 
	session_start(); 
    require '../lib/cloudinary/src/Cloudinary.php';
    require '../lib/cloudinary/src/Uploader.php';
    require '../lib/cloudinary/src/Api.php';
	include '../conexion.php';

	$id = $_SESSION['id'];

    $cloud = getenv('CLOUD_NAME');

    $fotoPerfilPath = $_POST['fotoPerfil'];

    $fotoPerfilPath = "http://res.cloudinary.com/".$cloud."/".explode("#", $fotoPerfilPath)[0];


    //Actualizar foto de perfil de librería con nueva foto 
    $sql = "UPDATE libreria SET 
    		fotoPerfil='".$fotoPerfilPath."' 
    		WHERE idLibreria=".$id." ;"; 

    mysqli_query($con, $sql);
    header("Location: .");

?>