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
	<link rel="stylesheet" href="../../css/bootstrap.min.css"> 
	<link rel="stylesheet" type="text/css" href="../../css/bootstrap-tagsinput.css">
	<link rel="stylesheet" href="../../css/navbar-libreria.css"> 
	<link rel="stylesheet" href="../../css/agregar-nuevo-style.css"> 
	
	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>
<body>
	<nav class="navbar navbar-default" role="navigation">
	  <!-- Brand and toggle get grouped for better mobile display -->
	  <div class="navbar-header col-lg-2 col-md-2">
	    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#collapse-target">
	      <span class="sr-only">Toggle navigation</span>
	      <span class="icon-bar"></span>
	      <span class="icon-bar"></span>
	      <span class="icon-bar"></span>
	    </button>
	    <a class="navbar-brand navbar-left" href="#"><img id="icon" src="../../img/logo.png" alt=""></a>
		<!-- <a class="navbar-brand navbar-left laberet" href="#"><b>LABERET</b></a> -->
	  </div>

	  <!-- Collect the nav links, forms, and other content for toggling -->
	  <div class="collapse navbar-collapse" id="collapse-target">
	   
	   <div id="list" class="col-lg-9 col-md-9">
	   		<ul class="nav navbar-nav navbar-left">
				<li ><a href="../home">Inicio</a></li>
				<li class="active"><a href="#">Agregar Libro</a></li>
				<li><a href="#">Ventas</a></li>
				<li><a href="#">Pedidos Especiales</a></li>
				<li><a href="#">Catálogo Universal</a></li>
			</ul>
	   </div>

	    <div id="drop" class="col-lg-1 col-md-1">

	    	<ul class="nav navbar-nav navbar-right">
		      <li class="dropdown">
		        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-cog"><b class="caret"></b></span> </a>
		        <ul class="dropdown-menu">
		          <li><a href="#">Configurar Cuenta</a></li>
		          <li><a href="#">Historial de Ventas</a></li>
		          <li class="divider"></li>
		          <li><a href="#">Salir</a></li>
		        </ul>
		      </li>
			</ul>
	    </div>	
	    
	  </div><!-- /.navbar-collapse -->
</nav> <!-- END NAV -->

	
	<div class="container">
		<?php 
			//Revisa la sesión
			session_start();
			if (!isset($_SESSION['id'])) {
				//NO ha iniciado sesión
				header("location: ../../user/inicioSesion");
			} else if ($_SESSION['type'] != 'libreria') {
				//No es una libreria
				header("location: ../../user/home");
			}
		 ?>
		<h2 class="text-center"><b>Agregar Nuevo Libro.</b></h2>
		<div class="row formulario">
			<div class="vista-previa col-lg-4">
				<img id="preview" src="../../img/images.jpg" alt="">
				
			</div>
			<form id="nuevo-libro" action="agregaLibro.php" method="post"  enctype="multipart/form-data" class="col-lg-8">
				<div class="form-control err-msg ">Precio no válido!.</div>
				<div class="form-group">
					 <div class="labels col-lg-6">
						
					 	<label for="isbn" class="col-form-label">ISBN (opcional)</label><br>
					 	<label for="autor" class="col-form-label">Autor</label><br>
					 	<label for="titulo" required class="col-form-label">Título</label><br>
					 	<label for="precio" required class="col-form-label">Precio($)</label><br>
					 	<!-- <label for="lenguaje" required class="col-form-label">Lenguaje</label><br> -->
					 	<label for="tags" class="col-form-label">Tags.</label>
					 </div>
					 <div class="inputs col-lg-6">
					 	<input type="text" class="form-control" name="isbn" id="isbn" placeholder="0803287682">
					 	<input type="text" required class="form-control" name="autor" id="autor" placeholder="Julio Verne">
					 	<input type="text" class="form-control" name="titulo" id="titulo" placeholder="...">
					 	<input type="text" class="form-control" name="precio" id="precio" placeholder="$00.00">
					 
						<!-- <input type="text" class="form-control" name="lenguaje" id="lenguaje" placeholder="" value="Español"> -->
						<input type="text" id="tags" name="tags" value="" class=" tags form-control" data-role="tagsinput">
					 </div>
					 <input required type="file" name="fotoFrente" id="fotoFrente" accept="image/x-png,image/jpeg" >
					<input  required type="file" name="fotoAtras" id="fotoAtras" accept="image/x-png,image/jpeg">
					 <button class="btn btn-default" type="submit"><b>Enviar</b></button>
				</div>
				
			</form>
		</div>
	</div>	

		
		
	<div class="container-fluid footer">
		<div class="row-fluid text-center">
				<div class="col-lg-4">
					<div class="row">
						<img src="img/logo-white.png" alt="">
						<b>LABERET</b>
					</div>
					<div class="row">
						<p>Made with <img src="img/love.png" alt="Love"> by APSUS</p>
					</div>
				</div>
				<div class="col-lg-4"><p><span class="glyphicon glyphicon-phone"></span> Cel. (044) 5556213423 </p>
				<p><span class="glyphicon glyphicon-phone"></span> Cel. (044) 5556213423 </p>
				<p><span class="glyphicon glyphicon-phone"></span> Cel. (044) 5526752006 </p>
				</div>
				<div class="col-lg-4 hidden-md hidden-sm hidden-xs">
					<div class="row nav centered">
						<a href="#">Inicio</a><br>
						<a href="#">Ventas</a><br>
						<a href="#" title="Catalogo">Agregar Libro</a><br>
						
						<a href="#">Pedidos Especiales</a><br>
						<a href="#">Catálogo Universal</a><br>
					</div>
				</div>
			</div><!-- FIN Footer -->
	</div>

	

	<!-- FIN ELEMENTOS -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script src="../../js/bootstrap.min.js"></script>
	<script src="../../js/bootstrap-tagsinput.js"></script>
	<script src="../../js/agregarNuevo.js" ></script>

</html>