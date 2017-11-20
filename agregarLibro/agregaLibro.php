<?php
    
    include '../conexion.php';
    session_start();
    $idLibreria = $_SESSION['id'];

	/* Consulta para obetener el id mayor */
	$idMaximo = 'SELECT max(idLibro) as max from libro;';
	$result = mysqli_query($con, $idMaximo);
	$value = mysqli_fetch_array($result);
	$id = $value['max'];

    $titulo = $_POST['titulo'];
    $autor =  $_POST['autor'];
    $isbn = NULL;
    if (isset($_POST['isbn'])) {
        $isbn = $_POST['isbn'];
    }
    
    $precio = $_POST['precio'];
    $tags = $_POST['tags'];
    //Se agrega el autor como tag. 
    $tags = $tags." ".$autor;
    $fotoAtrasPath = "";
    $fotoFrentePath = "";

    $imagePath = "uploads/";

    if (isset($_FILES['fotoFrente']['name'])) {
        /* Foto portada */
        $name = $_FILES['fotoFrente']['name'];
        $imageFtype = $_FILES['fotoFrente']['type'];
        $imageFerror = $_FILES['fotoFrente']['error'];
        $tmp_name = $_FILES['fotoFrente']['tmp_name'];
        $name = $id.$name; //Para que sean imagenes con nombres unicos. 
        $fotoFrentePath = $imagePath.$name;
        echo "PATH:".$fotoFrentePath;
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
    

    if (isset($_FILES['fotoAtras']['name'])) {
        /* Foto portada */
        $name = $_FILES['fotoAtras']['name'];
        $imageFtype = $_FILES['fotoAtras']['type'];
        $imageFerror = $_FILES['fotoAtras']['error'];
        $tmp_name = $_FILES['fotoAtras']['tmp_name'];

        $name = $id.$name; //Para que sean imagenes con nombres unicos. 
        $fotoAtrasPath = $imagePath.$name;

        if (!empty($name)) {

            if  (move_uploaded_file($tmp_name, "../".$fotoAtrasPath)) {
                // echo 'Uploaded';
            }

        } else {
            echo 'please choose a file';
        }

    }


$sql = 'INSERT INTO libro SET
        idLibro = '.($id+1).',
		titulo = "' . $titulo . '",
		autor = "'.$autor.'",
        fechaAdicion = CURDATE(),
		precio = "'.$precio.'",
		tags = "'.$tags.'",
		idLibreria = '.$idLibreria.',
		fotoFrente = "'.$fotoFrentePath.'",
		fotoAtras = "'.$fotoAtrasPath.'";'; 
mysqli_query($con, $sql);
        
    	
header('Location: .');
exit();