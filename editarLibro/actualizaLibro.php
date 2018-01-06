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

    if (isset($_POST['fotoFrente'])) { 
        $fotoFrenteUrl = $_POST['fotoFrente'];
        $fotoFrenteUrl = "http://res.cloudinary.com/".$cloud."/".explode("#", $fotoFrenteUrl)[0];
    }

    if (isset($_POST['fotoAtras'])) {
        $fotoAtrasUrl = $_POST['fotoAtras'];
        $fotoAtrasUrl = "http://res.cloudinary.com/".$cloud."/".explode("#", $fotoAtrasUrl)[0];
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