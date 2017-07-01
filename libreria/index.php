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
	<link rel="stylesheet" href="../css/navbar-libreria.css">  
	<link rel="stylesheet" href="../css/homeLibreria-style.css"> 
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
	    <a class="navbar-brand navbar-left" href="#"><img id="icon" src="../img/logo.png" alt=""></a>
		<!-- <a class="navbar-brand navbar-left laberet" href="#"><b>LABERET</b></a> -->
	  </div>

	  <!-- Collect the nav links, forms, and other content for toggling -->
	  <div class="collapse navbar-collapse" id="collapse-target">
	   
	   <div id="list" class="col-lg-9 col-md-9">
	   		<ul class="nav navbar-nav navbar-left">
				<li class="active"><a href="#">Inicio</a></li>
				<li><a href="/agregarLibro">Agregar Libro</a></li>
				<li><a href="#">Ventas</a></li>
				<li><a href="#">Pedidos Especiales</a></li>
				<li><a href="../user/buscar">Catálogo Universal</a></li>
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
		          <li><a href="../user/salir">Salir</a></li>
		        </ul>
		      </li>
			</ul>
	    </div>	
	    
	  </div><!-- /.navbar-collapse -->
</nav> <!-- END NAV -->
	<?php include 'perfil.php'; ?>
	<div style="background: url(../img/<?php echo $fotoPortada?>) no-repeat no-repeat center center;" class="container-fluid">
		<div class="row-fluid">
			<div>
				<div id="box">
					
					<div class="circle" style="background: url(../img/<?php echo $fotoPerfil?>) no-repeat no-repeat center center;"></div>
					<div class="row text-center">
						<h2 class="col-lg-12"><b><?php echo $nombre ?></b></h2>
						<p><?php echo $direccion ?></p>
						<p><?php echo $telefono ?></p>
					</div>
				</div>
			</div>
		</div>
	</div> <!-- Fin fluid -->
	


	<div class="container">
		<div class="row">
			
			<form action="" class="form-inline" method="post" accept-charset="utf-8">
				<h2 class="text-center"><b>Catálogo en Tienda.</b></h2>
				<div class="form-group">
					<div class="input-group">
						<input type="text" class="form-control" placeholder="Search for...">
						<span class="input-group-btn">
							<button class="btn btn-default" type="button"><span class="glyphicon glyphicon-search"></span></button>
						</span>
				    </div>
				    
				<select name="" class="form-control">
					  <option>TODO</option>
					  <option>Stuff</option>
					  <option>Stuff</option>
					  <option>Stuff</option>
				</select>
				    
				</div>

				<a href="agregarLibro" class="btn btn-default"><b> <span class="glyphicon glyphicon-plus-sign"></span> Agregar Nuevo Libro</b> <input type="text" class="id" hidden="true" value="<?php echo htmlspecialchars($idLibreria, ENT_QUOTES, 'UTF-8');?>"></a>
			</form>
		</div>

		<?php
		if(!($tam%2== 0)){
			$tam = $tam+1;
		} 
		for ($x = 0;$x<=($tam/2)+1;$x+=2): ?>
		<div class="row muestra"> <!-- INICIO MUESTRA -->
			
			<div class="hl col-lg-12 col-md-12 col-sm-12 col-xs-12"></div>
			
			<div class="thumbnail row libro col-lg-6 col-md-6 col-sm-12" data-id="<?php
				        echo htmlspecialchars($idLibros[$x], ENT_QUOTES, 'UTF-8');?>">
				<div class="caption">
					<img class="book-cover col-lg-6 col-md-6 col-sm-6 col-xs-6" src="../<?php echo $fotoFrente[$x]?>" alt="PENE">
					<div class="info col-lg-6 col-md-6 col-sm-6 col-xs-6">
						<p class="book-title"><?php
				        	echo htmlspecialchars($titulos[$x], ENT_QUOTES, 'UTF-8');
				        ?></p>
						<a class="book-author" href="#"><?php
				        	echo htmlspecialchars($autores[$x], ENT_QUOTES, 'UTF-8');
				        ?></a>
						<p class="book-price"><b>Precio: $ </b><?php
				        	echo htmlspecialchars($precios[$x], ENT_QUOTES, 'UTF-8');
				        ?></p>
						<p><b>ISBN: </b>9788435020848</p>
						<p><b>Fecha Adición: </b><?php echo $fechas[$x]?></p>
						<p><b>Lenguaje: </b>Inglés</p>
					</div>
				</div>

				<div class="row botones text-center col-lg-12 col-md-12 col-sm-12">
					<button class="btn btn-default"><b><span class="glyphicon glyphicon-pencil"></span> Editar</b></button>
					<button class="btn btn-default"><b><span class="glyphicon glyphicon-ok"></span> Vendido En Tienda</b></button>
					<button class="btn btn-default"><b><span class="glyphicon glyphicon-remove"></span> Eliminar</b></button>
				</div>
			</div>
				<?php 
				// Para evita poner de más
				if ($x > ($tam/2)) {
					break;
				} ?>
			<div class="thumbnail row libro col-lg-6 col-md-6 col-sm-12" data-id="<?php
				        echo htmlspecialchars($idLibros[$x], ENT_QUOTES, 'UTF-8');?>">
				<div class="caption">
					<img class="book-cover col-lg-6 col-md-6 col-sm-6 col-xs-6" src="../<?php echo $fotoFrente[$x+1]?>" alt="Foto">
					<div class="info col-lg-6 col-md-6 col-sm-6 col-xs-6">
						<p class="book-title"><?php
				        	echo htmlspecialchars($titulos[$x+1], ENT_QUOTES, 'UTF-8');
				        ?></p>
						<a class="book-author" href="#"><?php
				        	echo htmlspecialchars($autores[$x+1], ENT_QUOTES, 'UTF-8');
				        ?></a>
						<p class="book-price"><b>Precio: $ </b><?php
				        	echo htmlspecialchars($precios[$x+1], ENT_QUOTES, 'UTF-8');
				        ?></p>
						<p><b>ISBN: </b>9788435020848</p>
						<p><b>Fecha Adición: </b><?php echo $fechas[$x+1]?></p>
						<p><b>Lenguaje: </b>Inglés</p>
					</div>
				</div>

				<div class="row botones text-center col-lg-12 col-md-12 col-sm-12">
					<button class="btn btn-default"><b><span class="glyphicon glyphicon-pencil"></span> Editar</b></button>
					<button class="btn btn-default"><b><span class="glyphicon glyphicon-ok"></span> Vendido En Tienda</b></button>
					<button class="btn btn-default"><b><span class="glyphicon glyphicon-remove"></span> Eliminar</b></button>
				</div>
			</div>

		</div>
		<?php endfor; ?>


			 <!-- FIN MUESTRA DE LIBROS -->
		

	<div class="hl col-lg-12 col-md-12 col-sm-12 col-xs-12"></div>
	<div class="container footer">
		<div class="row-fluid text-center">
				<div class="col-lg-4">
					<div class="row">
						<img src="../img/logo-white.png" alt="">
						<b>LABERET</b>
					</div>
					<div class="row">
						<p>Made with <img src="../img/love.png" alt="Love"> by APSUS</p>
					</div>
				</div>
				<div class="col-lg-4"><p><span class="glyphicon glyphicon-phone"></span> Cel. (044) 5556213423 </p>
				<p><span class="glyphicon glyphicon-phone"></span> Cel. (044) 5556213423 </p>
				<p><span class="glyphicon glyphicon-phone"></span> Cel. (044) 5556213423 </p>
				</div>
				<div class="col-lg-4 hidden-md hidden-sm hidden-xs">
					<div class="row nav centered">
						<a href="#">Inicio</a><br>
						<a href="#" title="Catalogo">Registrarse</a><br>
						<a href="#">Iniciar Sesión</a>
					</div>
				</div>
			</div><!-- FIN Footer -->
	</div>

	

	<!-- FIN ELEMENTOS -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script src="../js/bootstrap.min.js"></script>

</body>
</html>