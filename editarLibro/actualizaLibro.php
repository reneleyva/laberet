<?php
    
    include '../conexion.php';
    session_start();
    $idLibreria = $_SESSION['id'];
    $idLibro = $_POST['idLibro'];
    $titulo = $_POST['titulo'];
    $autor =  $_POST['autor'];
    $isbn = NULL;
    if (isset($_POST['isbn'])) {
        $isbn = $_POST['isbn'];
    }
    
    $precio = $_POST['precio'];
    $tags = $_POST['tags'];
    //Se agrega el autor como tag. 
    $fotoAtrasPath = $_POST['fotoAtras-original'];
    $fotoFrentePath = $_POST['fotoFrente-original'];


    $imagePath = "uploads/";
    $bytes = openssl_random_pseudo_bytes(32);
    if (isset($_FILES['fotoFrente']) && !empty($_FILES['fotoFrente']['name'])) {
        /* Foto portada */
        $name = $_FILES['fotoFrente']['name'];
        $imageFtype = $_FILES['fotoFrente']['type'];
        $imageFerror = $_FILES['fotoFrente']['error'];
        $tmp_name = $_FILES['fotoFrente']['tmp_name'];
        $name = (string)bin2hex($bytes); //Para que sean imagenes con nombres unicos. 
        $tipo = explode('/', $imageFtype)[1];
        $fotoFrentePath = $imagePath.$name.".".$tipo;

        if (!empty($name)) {

            if  (move_uploaded_file($tmp_name, "../".$fotoFrentePath)) {
                // echo 'Uploaded';
            } else {
                echo "NOPE";
            }

        } else {
            echo 'please choose a file';
        }

    } 
    

    $bytes = openssl_random_pseudo_bytes(32);
    if (isset($_FILES['fotoAtras']) && !empty($_FILES['fotoAtras']['name'])) {
        /* Foto portada */
        $name = $_FILES['fotoAtras']['name'];
        $imageFtype = $_FILES['fotoAtras']['type'];
        $imageFerror = $_FILES['fotoAtras']['error'];
        $tmp_name = $_FILES['fotoAtras']['tmp_name'];
        $name = (string)bin2hex($bytes); //Para que sean imagenes con nombres unicos. 
        $tipo = explode('/', $imageFtype)[1];
        $fotoAtrasPath = $imagePath.$name.".".$tipo;
        
        if (!empty($name)) {

            if  (move_uploaded_file($tmp_name, "../".$fotoAtrasPath)) {
                // echo 'Uploaded';
            }

        } else {
            echo 'please choose a file';
        }

    }

    // echo $fotoAtrasPath."<br>";
    // echo $fotoFrentePath;

$sql = 'UPDATE libro SET
		titulo = "' . $titulo . '",
		autor = "'.$autor.'",
        isbn= "'.$isbn.'",
		precio = "'.$precio.'",
		tags = "'.$tags.'",
		fotoFrente = "'.$fotoFrentePath.'",
		fotoAtras = "'.$fotoAtrasPath.'" 
        WHERE idLibro='.$idLibro.' ;'; 

mysqli_query($con, $sql);
        
    	
header('Location: ../index.php#muestra');
exit();