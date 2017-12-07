<?php

include '../conexion.php';

$nombre = $_POST['nombre'];
$telefono = $_POST['telefono'];
$direccion = $_POST['direccion'];
$coordenadas = $_POST['coordenadas'];
$nombreUsuario = $_POST['nombreUsuario'];
$pass = md5($_POST['password']."teamolizzteamoluz");
$correo = $_POST['correo'];

$imagePath = "uploads/";
$fotoPerfilPath = "";
$fotoPortadaPath = "";


if (isset($_FILES['fotoPerfil']['name'])) {
        // Foto perfil
        $name = $_FILES['fotoPerfil']['name'];
        $imageFtype = $_FILES['fotoPerfil']['type'];
        $imageFerror = $_FILES['fotoPerfil']['error'];
        $tmp_name = $_FILES['fotoPerfil']['tmp_name'];

        $fotoPerfilPath = $imagePath.$name;

        if (!empty($name)) {

            if  (move_uploaded_file($tmp_name, "../".$fotoPerfilPath)) {
                // echo 'Uploaded';
            }

        } else {
            echo 'please choose a file';
        }

} else {
    echo "NOT IMAGE";
}


if (isset($_FILES['fotoPortada']['name'])) {
        // Foto portada 
        $name = $_FILES['fotoPortada']['name'];
        $imageFtype = $_FILES['fotoPortada']['type'];
        $imageFerror = $_FILES['fotoPortada']['error'];
        $tmp_name = $_FILES['fotoPortada']['tmp_name'];

        $fotoPortadaPath = $imagePath.$name;

        if (!empty($name)) {

            if  (move_uploaded_file($tmp_name, "../".$fotoPortadaPath)) {
                // echo 'Uploaded';
            }

        } else {
            echo 'please choose a file';
        }
} else {
    echo "<br>NOT IMAGE TOO";
}

$sql = 'INSERT INTO libreria SET
			nombre ="' .$nombre.'",
			fotoPerfil = "'.$fotoPerfilPath.'",
			fotoPortada = "'.$fotoPortadaPath.'",
            telefono = "'.$telefono.'",
			direccion = "'.$direccion.'",
            correo = "'.$correo.'",
			coordenadas = "'.$coordenadas.';"';     

mysqli_query($con, $sql);

// Consulta para obetener el id mayor 
$idMaximo = 'SELECT max(idLibreria) as max from libreria;';
$query = mysqli_query($con, $idMaximo);
$value = mysqli_fetch_array($query);
$id = $value['max'];
echo $pass;
$sql = 'INSERT INTO administradorlibreria SET
			nombreUsuario ="' .$nombreUsuario.'",
			password = "'.$pass.'",
			idLibreria = "'.$id.'";';     
mysqli_query($con, $sql);
header("location: ./");
exit();

