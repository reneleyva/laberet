<?php 
	session_start(); 
	include '../conexion.php';

	$id = $_SESSION['id'];
    $fotoPortada = "";

    $imagePath = "uploads/";
    // Random bytes
    $bytes = openssl_random_pseudo_bytes(32);
    if (isset($_FILES['foto-portada']['name'])) {
        /* Foto portada */
        $origName = $_FILES['foto-portada']['name'];
        $imageFtype = $_FILES['foto-portada']['type'];
        $imageFerror = $_FILES['foto-portada']['error'];
        $tmp_name = $_FILES['foto-portada']['tmp_name'];
        $name = (string)bin2hex($bytes); //Para que sean imagenes con nombres unicos. 
        $tipo = explode('/', $imageFtype)[1];
        $fotoPortada = $imagePath.$name.".".$tipo;
        echo "PATH: ".$fotoPortada;
        if (!empty($name)) {

            if  (move_uploaded_file($tmp_name, "../".$fotoPortada)) {
                echo 'Uploaded';
            } else {
                echo "ERROR";
                exit();
            }

        }
    }

    // Borro la foto anterior

    $sql = "SELECT fotoPortada from libreria WHERE idLibreria=".$id."; ";
    $res = mysqli_query($con, $sql);
    $url = mysqli_fetch_array($res)['fotoPortada'];
    echo "<br>La que tenía antes: ".$url;
    unlink('../'.$url); //LO borro ALV 
    
    // Actualizar foto de perfil de librería con nueva foto 
    $sql = "UPDATE libreria SET 
    		fotoPortada='".$fotoPortada."' 
    		WHERE idLibreria=".$id." ;"; 

    mysqli_query($con, $sql);
    header("Location: .");

?>