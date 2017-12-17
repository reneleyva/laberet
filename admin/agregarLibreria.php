<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Laberet | Admin</title>
	<link rel="stylesheet" href="../css/bootstrap.min.css">
	<link rel="stylesheet" href="../css/agregar-nuevo-style.css">
</head>
<body>
	
	<?php 
	$current_page = 'agregarLibreria';
	include '../components/navbar-admin.php'; ?>

	<div class="container">
		<h2 class="text-center"><strong>Agregar Libreria</strong></h2>
		<form action="agregarLib.php" method="post"  enctype="multipart/form-data" >
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
					<label>Foto Perfil: <input type="file" required name="fotoPerfil" id="fotoPerfil" value="" accept="image/x-png,image/jpeg"></label>
				</div>
				<div class="col-lg-6">
					<label>Foto Portada<input  type="file" required name="fotoPortada" id="fotoPortada" value="" accept="image/x-png,image/jpeg"></label>
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="../../js/bootstrap.min.js"></script>

</html>