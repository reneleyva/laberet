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
	<!-- Cloudinary shit -->

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
</head>
<body>
	<?php 
		$current_page = 'agregarLibro';
		include '../components/navbar-libreria.php';
	?>

	
	<div class="container">
		
		<h2 class="text-center"><b>Agregar Nuevo Libro.</b></h2>
		<div class="row formulario">
			<div  class="col-lg-3">
				<div class="row preview">
					<img id="foto-frente" src="" alt="">
				</div>
				<div class="row subir" data-pos="frente">
				 
					<label>Foto de Frente</label><br>
					<button type="button" id="upload-frente" class="upload-btn btn"><i class="fa fa-upload" aria-hidden="true"></i> SUBIR</button>
					
				</div>
			</div>
			<div class="col-lg-3">
				<div class="row preview">
					<img id="foto-atras" src="" alt="">
				</div>
				<div class="row subir" data-pos="atras">
				
					<label>Foto de Atrás</label><br>
					<button type="button" id="upload-atras" class="upload-btn btn"><i class="fa fa-upload" aria-hidden="true"></i> SUBIR</button>
					
				</div>
			</div>
			<form id="nuevo-libro" action="agregaLibro.php" method="post"  enctype="multipart/form-data" class="col-lg-6">
				<div class="form-control err-msg ">Precio no válido!.</div>
				
				<div id="frenteInput" style="display:none;">
					<?php echo cl_image_upload_tag('fotoFrente', array("callback" => $cors_location)); ?>
				 </div>

				 <div id="atrasInput" style="display:none;">
				 	<?php echo cl_image_upload_tag('fotoAtras', array("callback" => $cors_location)); ?>
				 </div>

				<div class="form-group">
					 <div class="labels col-lg-4">
					 
						<!-- <input style="display: none;" required type="file" name="fotoFrente" id="fotoFrente" accept="image/x-png,image/jpeg" > -->
						<!-- <input  style="display: none;" required type="file" name="fotoAtras" id="fotoAtras" accept="image/x-png,image/jpeg"> -->
					 	<label for="autor" class="col-form-label">Autor</label><br>
					 	<label for="titulo" required class="col-form-label">Título</label><br>
					 	<label for="precio" required class="col-form-label">Precio($)</label><br>
					 	<!-- <label for="lenguaje" required class="col-form-label">Lenguaje</label><br> -->
					 	<label for="tags" class="col-form-label">Tags.</label>
					 </div>
					 <div class="inputs col-lg-8">
					 	<input type="text" required class="form-control" name="autor" id="autor" placeholder="Julio Verne">
					 	<input type="text" class="form-control" name="titulo" id="titulo" placeholder="...">
					 	<input type="text" class="form-control" name="precio" id="precio" placeholder="$00.00">
					 
						<!-- <input type="text" class="form-control" name="lenguaje" id="lenguaje" placeholder="" value="Español"> -->
						<div class="etiquetas">
							<input type="text" id="tags" name="tags" value="" class="tags form-control" data-role="tagsinput">
								
						</div>
						<p style="font-size: 12pt;margin-bottom: 0px;">*El autor se agrega automáticamente como tag</p>
					 </div>
					
					 <button class="btn btn-default" type="submit"><b>Enviar</b></button>
				</div>

			</form>
		</div>
	</div>	

		

	<?php include '../components/footer-libreria.php'; 
			$id = $_SESSION['id'];
			include '../homeLibreria/vendidosEnLinea.php';?>
	
	<?php if ($librosVendidos): ?>
		<div class="modal fade" id="modal-venta" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		  <div class="modal-dialog" role="document">
		    <div class="modal-content">
		      <div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		        <h3 class="modal-title" id="titulo"><b>¡Venta en Linea!</b></h3>
		      </div>
		      <div class="modal-body">
		        <div>
		        	<h3><b>Los siguientes Libros han sido vendidos en linea.</b></h3>
		        	<h4>Se recomienda apartar estos libros para envio.</h4>
					
					<?php foreach ($librosVendidos as $row): ?>
						<div class="libro col-lg-12" data-id="<?php echo $row['idLibroVendido']; ?>">
				        	<div class="book-cover col-lg-4">
				        		<img src="<?php echo $row['fotoFrente']; ?>" alt="Foto" />
				        	</div>

							<div class="info col-lg-8">
								<p class="book-title"><b>Titulo: </b><?php echo $row['titulo']; ?></p>
								<p class="book-author" href="#"><b>Autor: </b><?php echo $row['autor']; ?></p>
								<?php if ($row['isbn']): ?>
									<p><b>ISBN:</b> <?php echo $row['isbn']; ?></p>
								<?php endif ?>
								
								<p class="book-price"><b>Precio: </b>$<?php echo $row['precio']; ?></p>
							</div>
				       	</div>
					<?php endforeach ?>

		        	

		        </div>

		        <div class="modal-footer">
		        	<h3 id="total"><b>Total: $<?php echo $totalVendidos; ?><b></h3>
	                <button style="font-size: 15pt;" type="button" class="btn btn-default" data-dismiss="modal"><b>Cerrar</b></button>
	            </div>

		      </div>
		      
		    </div>
		  </div>
		</div> <!-- END Modal -->
	<?php endif ?>
	<!-- Modal -->

	<!-- FIN ELEMENTOS -->
	
	<script src="../js/bootstrap.min.js"></script>
	<script src="../js/jquery-ui.min.js"></script>
	<script src="../js/bootstrap-tagsinput.js"></script>
	<script src="../js/agregarNuevo.js" ></script>
	<script src="../js/autocomplete.js"></script>
	<script src="../js/notificacionesLibreria.js"></script>
	<script src="../js/typeahead.js"></script>
	
</html>