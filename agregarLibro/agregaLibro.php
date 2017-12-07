<?php
    
    include '../conexion.php';
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
    $fotoAtrasPath = "";
    $fotoFrentePath = "";

    $imagePath = "uploads/";
    $bytes = openssl_random_pseudo_bytes(32);
    if (isset($_FILES['fotoFrente']['name'])) {
        $name = $_FILES['fotoFrente']['name'];
        $imageFtype = $_FILES['fotoFrente']['type'];
        $imageFerror = $_FILES['fotoFrente']['error'];
        $tmp_name = $_FILES['fotoFrente']['tmp_name'];
        $name = (string)bin2hex($bytes); //Para que sean imagenes con nombres unicos. 
        $tipo = explode('/', $imageFtype)[1];
        $fotoFrentePath = $imagePath.$name.".".$tipo;

        if (!empty($name)) {

            if  (move_uploaded_file($tmp_name, "../".$fotoFrentePath)) {
                echo 'Uploaded';
            } else {
                echo "NOPE";
            }

        } else {
            echo 'please choose a file';
        }

    } 
    
    $bytes = openssl_random_pseudo_bytes(32);
    if (isset($_FILES['fotoAtras']['name'])) {
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


$sql = 'INSERT INTO libro SET
		titulo = "' . $titulo . '",
		autor = "'.$autor.'",
        fechaAdicion = CURDATE(),
		precio = "'.$precio.'",
		tags = "'.$tags.'",
		idLibreria = '.$idLibreria.',
		fotoFrente = "'.$fotoFrentePath.'",
		fotoAtras = "'.$fotoAtrasPath.'";'; 
mysqli_query($con, $sql);
        
    	
// header('Location: .');
exit();