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
    
    echo $titulo."<br>";
    echo $autor."<br>";
    echo $precio."<br>"
    echo $tags."<br>";
    
    $cloud = getenv('CLOUD_NAME');
    $api_key = getenv('API_KEY');
    $api_secret = getenv('API_SECRET');

    \Cloudinary::config(array( 
      "cloud_name" => $cloud,  
      "api_key" => $api_key, 
      "api_secret" => $api_secret 
    ));

    $fotoFrente = \Cloudinary\Uploader::upload_large($_FILES['fotoFrente']['tmp_name']); 
    $fotoAtras = \Cloudinary\Uploader::upload_large($_FILES['fotoAtras']['tmp_name']); 

    $fotoAtrasUrl = $fotoAtras['url'];
    $fotoFrenteUrl = $fotoFrente['url'];


$sql = 'INSERT INTO libro SET
		titulo = "' . $titulo . '",
		autor = "'.$autor.'",
        fechaAdicion = CURDATE(),
		precio = "'.$precio.'",
		tags = "'.$tags.'",
		idLibreria = '.$idLibreria.',
		fotoFrente = "'.$fotoFrenteUrl.'",
		fotoAtras = "'.$fotoAtrasUrl.'";'; 

echo $sql;
// mysqli_query($con, $sql);
        
// header('Location: .');
exit();