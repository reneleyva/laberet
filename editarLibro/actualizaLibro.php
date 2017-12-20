<?php
    
    include '../conexion.php';
    require '../lib/cloudinary/src/Cloudinary.php';
    require '../lib/cloudinary/src/Uploader.php';
    require '../lib/cloudinary/src/Api.php';

    session_start();
    $idLibreria = $_SESSION['id'];
    $idLibro = $_POST['idLibro'];
    $titulo = $_POST['titulo'];
    $autor =  $_POST['autor'];
    $isbn = NULL;
    if (isset($_POST['isbn']) && $_POST['isbn'] != "") {
        echo "ISBN<br>";
        $isbn = $_POST['isbn'];
    }
    
    $precio = $_POST['precio'];
    $tags = $_POST['tags'];

    $fotoAtrasUrl = $_POST['fotoAtras-original'];
    $fotoFrenteUrl = $_POST['fotoFrente-original'];

    $cloud = getenv('CLOUD_NAME');
    $api_key = getenv('API_KEY');
    $api_secret = getenv('API_SECRET');

    \Cloudinary::config(array( 
      "cloud_name" => $cloud,  
      "api_key" => $api_key, 
      "api_secret" => $api_secret 
    ));

    if (isset($_FILES['fotoFrente']) && !empty($_FILES['fotoFrente']['name'])) { 
        $fotoFrente = \Cloudinary\Uploader::upload($_FILES['fotoFrente']['tmp_name']); 
        $fotoFrenteUrl = $fotoFrente['url'];
    }

    if (isset($_FILES['fotoAtras']) && !empty($_FILES['fotoAtras']['name'])) {
        $fotoAtras = \Cloudinary\Uploader::upload($_FILES['fotoAtras']['tmp_name']); 
        $fotoAtrasUrl = $fotoAtras['url'];
    }
    
    

$sql = 'UPDATE libro SET
		titulo = "' . $titulo . '",
		autor = "'.$autor.'",
		precio = "'.$precio.'",
		tags = "'.$tags.'",
		fotoFrente = "'.$fotoFrenteUrl.'",
		fotoAtras = "'.$fotoAtrasUrl.'" 
        WHERE idLibro='.$idLibro.' ;'; 

echo $sql;
mysqli_query($con, $sql);
    	
header('Location: ../index.php#muestra');
exit();