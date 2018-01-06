<?php
    
    include '../conexion.php';
    require '../lib/cloudinary/src/Cloudinary.php';
    require '../lib/cloudinary/src/Uploader.php';
    require '../lib/cloudinary/src/Api.php';
    session_start();
    $idLibreria = $_SESSION['id'];

    $titulo = $_POST['titulo'];
    $autor =  $_POST['autor'];
    $isbn = NULL;
    if (isset($_POST['isbn'])) {
        $isbn = $_POST['isbn'];
    }
    
    $precio = $_POST['precio'];
    $tags = $_POST['tags'];
    //Se agrega el autor como tag. 
    $autorTags = join(" ", explode(" ", $autor));
    $tags = $tags." ".$autorTags;
    

    $cloud = getenv('CLOUD_NAME');

    $fotoAtrasUrl = $_POST['fotoAtras'];
    $fotoFrenteUrl = $_POST['fotoFrente'];

    $fotoFrenteUrl = "http://res.cloudinary.com/".$cloud."/".explode("#", $fotoFrenteUrl)[0];
    $fotoAtrasUrl = "http://res.cloudinary.com/".$cloud."/".explode("#", $fotoAtrasUrl)[0];

$sql = 'INSERT INTO libro SET
		titulo = "' . $titulo . '",
		autor = "'.$autor.'",
        fechaAdicion = CURDATE(),
		precio = "'.$precio.'",
		tags = "'.$tags.'",
		idLibreria = '.$idLibreria.',
		fotoFrente = "'.$fotoFrenteUrl.'",
		fotoAtras = "'.$fotoAtrasUrl.'";'; 

// echo $sql;
mysqli_query($con, $sql);
        
header('Location: .');
exit();