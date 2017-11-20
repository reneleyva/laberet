<?php 
//Revisa la sesión
session_start();
if (!isset($_SESSION['tipo'])) {
	//NO ha iniciado sesión
	header("location: ../");
	exit(); 
} 

if ($_SESSION['tipo'] == 'usuario') {
	//No es una libreria
	header("location: ../home");

} else if ($_SESSION['tipo'] == 'visitante'){
	header("location: ../");
}

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- <meta name="viewport" content="width=device-width, initial-scale=1"> -->
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- <link rel="icon" href="../../favicon.ico"> -->

	<title>Laberet</title>
	<!-- Bootstrap css -->
	<link rel="stylesheet" href="../css/bootstrap.min.css"> 
	<link rel="stylesheet" type="text/css" href="../css/bootstrap-tagsinput.css">
	<link rel="stylesheet" href="../css/agregar-nuevo-style.css"> 
	<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="../css/jquery-ui.min.css"> 
	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>
<body>
	<?php 
		include '../components/navbar-libreria.php';
	?>

	
	<div class="container">
		
		<h2 class="text-center"><b>Agregar Nuevo Libro.</b></h2>
		<div class="row formulario">
			<div  class="col-lg-3">
				<div class="row preview">
					<img id="foto-frente" src="" alt="">
				</div>
				<div class="row subir">
				 
					<label>Foto de Frente</label><br>
					<button type="button" id="upload-frente" class="upload-btn btn"><i class="fa fa-upload" aria-hidden="true"></i> SUBIR</button>
				</div>
			</div>
			<div  class="col-lg-3">
				<div class="row preview">
					<img id="foto-atras" src="" alt="">
				</div>
				<div class="row subir">
				
					<label>Foto de Atrás</label><br>
					<button type="button" id="upload-atras" class="upload-btn btn"><i class="fa fa-upload" aria-hidden="true"></i> SUBIR</button>
				</div>
			</div>
			<form id="nuevo-libro" action="agregaLibro.php" method="post"  enctype="multipart/form-data" class="col-lg-6">
				<div class="form-control err-msg ">Precio no válido!.</div>
				<div class="form-group">
					 <div class="labels col-lg-4">
						<input style="display: none;" required type="file" name="fotoFrente" id="fotoFrente" accept="image/x-png,image/jpeg" >
						<input  style="display: none;" required type="file" name="fotoAtras" id="fotoAtras" accept="image/x-png,image/jpeg">
					 	<label for="isbn" class="col-form-label">ISBN (opcional)</label><br>
					 	<label for="autor" class="col-form-label">Autor</label><br>
					 	<label for="titulo" required class="col-form-label">Título</label><br>
					 	<label for="precio" required class="col-form-label">Precio($)</label><br>
					 	<!-- <label for="lenguaje" required class="col-form-label">Lenguaje</label><br> -->
					 	<label for="tags" class="col-form-label">Tags.</label>
					 </div>
					 <div class="inputs col-lg-8">
					 	<input type="text" class="form-control" name="isbn" id="isbn" placeholder="0803287682">
					 	<input type="text" required class="form-control" name="autor" id="autor" placeholder="Julio Verne">
					 	<input type="text" class="form-control" name="titulo" id="titulo" placeholder="...">
					 	<input type="text" class="form-control" name="precio" id="precio" placeholder="$00.00">
					 
						<!-- <input type="text" class="form-control" name="lenguaje" id="lenguaje" placeholder="" value="Español"> -->
						<input type="text" id="tags" name="tags" value="" class=" tags form-control" data-role="tagsinput">
						<p style="font-size: 12pt;">*El autor se agrega automáticamente como tag</p>
					 </div>
					
					 <button class="btn btn-default" type="submit"><b>Enviar</b></button>
				</div>
				
			</form>
		</div>
	</div>	

		

	<?php include '../components/footer-libreria.php'; ?>

	<!-- FIN ELEMENTOS -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script src="../js/bootstrap.min.js"></script>
	<script src="../js/jquery-ui.min.js"></script>
	<script src="../js/bootstrap-tagsinput.js"></script>
	<script src="../js/agregarNuevo.js" ></script>
	<script src="../js/autocomplete.js"></script>

</html>