<?php 
session_start();
if (!isset($_SESSION['tipo'])) {
	//NO ha iniciado sesión
	header("location: ../");
} else if ($_SESSION['tipo'] != 'admin') {
	//No es una libreria
	header("location: ../");	
}

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Laberet | Admin</title>
	<link rel="stylesheet" href="../css/bootstrap.min.css">
	<link rel="stylesheet" href="../css/agregar-nuevo-style.css">
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.0.0/sweetalert2.min.css">

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script type="text/javascript" src="../js/cloudinary_js/jquery.ui.widget.js"></script>
	<script type="text/javascript" src="../js/cloudinary_js/jquery.iframe-transport.js"></script>
	<script type="text/javascript" src="../js/cloudinary_js/jquery.fileupload.js"></script>
	<script type="text/javascript" src="../js/cloudinary_js/jquery.cloudinary.js"></script>
	<script>
	 	$(function() {
		  if($.fn.cloudinary_fileupload !== undefined) {
		    $("input.cloudinary-fileupload[type=file]").cloudinary_fileupload();
		  }
		});
	</script>	

	<?php 
	require '../lib/cloudinary/src/Cloudinary.php';
    require '../lib/cloudinary/src/Uploader.php';
    require '../lib/cloudinary/src/Api.php';
    $api_key = "176317843429194";
	$cloud = "dzu2umeba"; 
	$api_secret = "SqdUW7QjZaFri1WJo93DUiP1eyo";

    \Cloudinary::config(array( 
      "cloud_name" => $cloud,  
      "api_key" => $api_key, 
      "api_secret" => $api_secret 
    ));

    echo cloudinary_js_config();

    if (array_key_exists('REQUEST_SCHEME', $_SERVER)) {   
	  $cors_location = $_SERVER["REQUEST_SCHEME"] . "://" . $_SERVER["SERVER_NAME"] .
	    dirname($_SERVER["SCRIPT_NAME"]) . "/cloudinary_cors.html";
	} else {
	  $cors_location = "https://" . $_SERVER["HTTP_HOST"] . "/cloudinary_cors.html";
	}

	 ?>

	<style>
		.cloudinary-fileupload {
		    display: block !important;
		}
	</style>
</head>
<body>
	
	<?php 
	$current_page = 'agregarLibreria';
	include '../components/navbar-admin.php'; ?>

	<div class="container">
		<h2 class="text-center"><strong>Agregar Libreria</strong></h2>
		<form action="agregarLib.php" method="post"  enctype="multipart/form-data" id="agregarLibreria">
			<div class="row">
				<div class="col-lg-6">
					<label>Nombre: <input class="form-control" required type="text" name="nombre" value=""></label>
				</div>

				<div class="col-lg-6">
					<label>Direccion:<input class="form-control" required type="text" name="direccion" value=""></label>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-6">
					<label>Foto Perfil: </label>
					<?php echo cl_image_upload_tag('fotoPerfil', array("callback" => $cors_location)); ?>
				</div>
				<div class="col-lg-6">
					<label>Foto Portada <?php echo cl_image_upload_tag('fotoPortada', array("callback" => $cors_location)); ?></label>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-6">
					<label>Telefono:<input class="form-control" required type="text" name="telefono" value=""></label>
				</div>
				<div class="col-lg-6">
					<label>Coordenadas: <input class="form-control" required type="text" name="coordenadas" value=""></label>
				</div>
			</div>

			<div class="row">
				<div class="col-lg-6">
					<label>Nombre de Usaurio: <input class="form-control" required type="text" name="nombreUsuario" value=""></label>
				</div>
				<div class="col-lg-6">
					<label>Password: <input class="form-control" required type="text" name="password" value=""></label>
				</div>
			</div>

			<div class="row">
				<div class="col-lg-6">
					<label>correo: <input class="form-control" required type="text" name="correo" value=""></label>
				</div>

				<div class="col-lg-6">
					<label>Facebook URL: <input class="form-control" type="text" name="facebook" value=""></label>
				</div>
			</div>

			<div class="row">
				<div class="col-lg-6">
					<label>Instagram URL: <input class="form-control" type="text" name="instagram" value=""></label>
				</div>

				<div class="col-lg-6">
					<label>Twitter URL: <input class="form-control" type="text" name="twitter" value=""></label>
				</div>
			</div>
			<button type="submit" id="enviar" class="btn btn-success"><b>ENVIAR</b></button>
		</form>
	</div>
</body>

<style>

	.container {
		margin-top: 100px; 
	}
	form {
		width: 80%;
		margin: auto;
	}

	form label {
		margin-top: 20px; 
		width: 100%;
	}

	#enviar {
		float: right; <
	}
</style>
<!-- FIN ELEMENTOS -->
<script src="../js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.0.0/sweetalert2.min.js"></script>
<script src="../js/agregarLibreria-admin.js"></script>
</html>