<?php include "redirect.php" ?>
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
	<link rel="stylesheet" href="../../css/librerias-style.css"> 
	<link rel="stylesheet" href="../../css/navbar-vis.css">
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
		    <a class="navbar-brand navbar-left" href="../../"><img id="icon" src="../../img/logo.png" alt=""></a>
			<!-- <a class="navbar-brand navbar-left laberet" href="#"><b>LABERET</b></a> -->
		  </div>

		  <!-- Collect the nav links, forms, and other content for toggling -->
		  <div class="collapse navbar-collapse" id="collapse-target">
		   
		   <div id="list" class="col-lg-10 col-md-10">
		   		<ul class="nav navbar-nav navbar-right">
			            <li><a href="../buscar">Catálogo</a></li>
			            <li><a href="../librerias">Librerías</a></li>
			            <li><a href="../registrarse">Registrarse</a></li>
			            <li>
			              <p class="navbar-btn">
			                <a href="../inicioSesion" class="btn btn-success">Iniciar Sesión</a>
			              </p>
		            	</li> 
				</ul>
		   </div>
		    
		  </div><!-- /.navbar-collapse -->
	</nav> <!-- END NAV -->
	<?php include "librerias.php" ?>
	<div class="container muestra">

	
	<?php foreach ($librerias as $libreria): ?>
			
		<div class="libreria col-lg-4" data-id="<?php echo $libreria->getId() ?>">
			<div class="wrap">
				<div class="imagen" style="background: url(../../<?php echo $libreria->getFotoPerfil(); ?>) no-repeat no-repeat center center;">
					<h3><?php echo $libreria->getNombre(); ?></h3>
				</div>
				<div class="info">
					
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Iusto, deserunt.</p>
				</div>
			</div>
		</div>

	<?php endforeach; ?>
	</div>
	<div class="container-fluid footer">
		<div class="row-fluid text-center">
			<div class="col-lg-4">
				<div class="row">
					<img src="../../img/logo-white.png" alt="">
					<b>LABERET</b>
				</div>
				<div class="row">
					<p>Made with <img src="../../img/love.png" alt="Love"> by APSUS</p>
				</div>
			</div>
			<div class="col-lg-4"><p><span class="glyphicon glyphicon-phone"></span> Cel. (044) 5556213423 </p>
			<p><span class="glyphicon glyphicon-phone"></span> Cel. (044) 5556213423 </p>
			<p><span class="glyphicon glyphicon-phone"></span> Cel. (044) 5526752006 </p>
			</div>
			<div class="col-lg-4 hidden-md hidden-sm hidden-xs">
				<div class="menu row nav centered">
					<div style="text-align: left">
						<a href="../../">Inicio</a><br>
						<a href=".">Catálogo</a><br>
						<a href="../registrarse">Registrarse</a><br>
						<a href="../inicioSesion">Iniciar Sesión</a>
					</div>
				</div>
			</div>
		</div><!-- FIN Footer -->
	</div>

	<!-- FIN ELEMENTOS -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script src="../../js/bootstrap.min.js"></script>
	<script src="../../js/linkLibreria.js"></script>

</body>
</html>