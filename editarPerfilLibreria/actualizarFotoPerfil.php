<?php 
	session_start(); 
	include '../conexion.php';

	$id = $_SESSION['id'];
    $fotoPerfil = "";

    $imagePath = "uploads/";
    // Random bytes
    $bytes = openssl_random_pseudo_bytes(32);
    if (isset($_FILES['foto-perfil']['name'])) {
        /* Foto portada */
        $origName = $_FILES['foto-perfil']['name'];
        $imageFtype = $_FILES['foto-perfil']['type'];
        $imageFerror = $_FILES['foto-perfil']['error'];
        $tmp_name = $_FILES['foto-perfil']['tmp_name'];
        $name = (string)bin2hex($bytes); //Para que sean imagenes con nombres unicos. 
        $tipo = explode('/', $imageFtype)[1];
        $fotoPerfil = $imagePath.$name.".".$tipo;
        echo "PATH: ".$fotoPerfil;
        if (!empty($name)) {

            if  (move_uploaded_file($tmp_name, "../".$fotoPerfil)) {
                echo 'Uploaded';
            } else {
                echo "ERROR";
                exit();
            }

        }
    }

    // Borro la foto anterior

    $sql = "SELECT fotoPerfil from libreria WHERE idLibreria=".$id."; ";
    $res = mysqli_query($con, $sql);
    $url = mysqli_fetch_array($res)['fotoPerfil'];
    echo "<br>La que tenía antes: ".$url;
    unlink('../'.$url); //LO borro ALV 

    //Actualizar foto de perfil de librería con nueva foto 
    $sql = "UPDATE libreria SET 
    		fotoPerfil='".$fotoPerfil."' 
    		WHERE idLibreria=".$id." ;"; 

    mysqli_query($con, $sql);
    header("Location: .");

?>