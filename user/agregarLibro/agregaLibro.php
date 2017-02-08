<?php
    
    include '../../conexion.php';

	/* Consulta para obetener el id mayor */
	$idMaximo = 'SELECT max(idLibro) as max from Libro;';
	$result = $pdo->query($idMaximo);
	$value = $result -> fetch();
	$id = $value['max'];

    $titulo = $_POST['titulo'];
    $autor =  $_POST['autor'];
    $lenguaje = $_POST['lenguaje'];
    $isbn = $_POST['isbn'];
    $precio = $_POST['precio'];
    $tags = $_POST['tags'];
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

        if (!empty($name)) {

            if  (move_uploaded_file($tmp_name, "../../".$fotoFrentePath)) {
                // echo 'Uploaded';
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

            if  (move_uploaded_file($tmp_name, "../../".$fotoAtrasPath)) {
                // echo 'Uploaded';
            }

        } else {
            echo 'please choose a file';
        }

    }
	
    //$hoy = getdate();
    $anio = date('Y');
    $mes = date('m');
    $dia = date('d');
    $fecha = $anio.'/'.$mes.'/'.$dia;


    $sql = 'INSERT INTO Libro SET
			titulo ="' . $titulo . '",
			autor = "'.$autor.'",
			isbn = "'.$isbn.'",
            fechaAdicion = "'.$fecha.'",
			precio = "'.$precio.'",
			tags = "'.$tags.'",
			LibreriaidLibreria = 6,
			fotoFrente = "'.$fotoFrentePath.'",
			fotoAtras = "'.$fotoAtrasPath.'";';     

	$pdo->exec($sql);
    header('Location: http://localhost/laberet/user/agregarLibro/');
   	exit();