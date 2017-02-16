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
	<link rel="stylesheet" href="../../css/homeLibreria-style.css"> 
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
				<li class="active"><a href="#">Inicio</a></li>
				<li><a href="#">Agregar Libro</a></li>
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

    <?php include 'libreria.php';?>
	<div class="container-fluid">
		<div class="row-fluid">
			<div>
				<div id="box">
					<div class="circle"></div>
					<div class="row text-center">
						<h2 class="col-lg-12"><b><?php echo $nombre;?></b></h2>
						<p><?php echo $direccion;?></p>
						<p><?php echo 'Tel: '.$telefono;?></p>
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
					  <option>Suspenso</option>
					  <option>Miedo</option>
					  <option>Matemáticas</option>
				</select>
				    
				</div>

				<button id="agregar-nuevo" class="btn btn-default"><b> <span class="glyphicon glyphicon-plus-sign"></span> Agregar Nuevo Libro</b></button>
			</form>
		</div>

		
		<div class="row muestra"> <!-- INICIO MUESTRA -->
			
			<div class="hl col-lg-12 col-md-12 col-sm-12 col-xs-12"></div>
			<?php include 'libreria.php';?>
			<?php if (!$books) {
					echo "FUCK!";
					exit();
				} 
			?>
			<?php foreach ($books as $book): ?>
				<div class="thumbnail row libro col-lg-6 col-md-6 col-sm-12">
				<div class="caption">
					<img class="book-cover col-lg-6 col-md-6 col-sm-6 col-xs-6" src="../../<?php echo $book['fotoFrente']?>" alt="Foto">
					<div class="info col-lg-6 col-md-6 col-sm-6 col-xs-6">
						<p class="book-title"><?php
				        	echo htmlspecialchars($book['titulo'], ENT_QUOTES, 'UTF-8');?></p>
						<a class="book-author" href="#"><?php
				        	echo htmlspecialchars($book['autor'], ENT_QUOTES, 'UTF-8');?></a>
						<p class="book-price"><?php
				        	echo htmlspecialchars("$ ".$book['precio'], ENT_QUOTES, 'UTF-8');?></p>
						<p><?php
				        	echo htmlspecialchars($book['isbn'], ENT_QUOTES, 'UTF-8');?></p>
						<p><?php
				        	echo htmlspecialchars('Fecha: '.$book['fechaAdicion'], ENT_QUOTES, 'UTF-8');?></p>
					</div>
				</div>
				<div class="row botones text-center col-lg-12 col-md-12 col-sm-12">
					<button class="btn btn-default"><b><span class="glyphicon glyphicon-pencil"></span> Editar</b></button>
					<button class="btn btn-default"><b><span class="glyphicon glyphicon-ok"></span> Vendido En Tienda</b></button>
					<button class="btn btn-default"><b><span class="glyphicon glyphicon-remove"></span> Eliminar</b></button>
				</div>
			</div>
			<?php endforeach; ?>				
			
			<div class="hl col-lg-12 col-md-12 col-sm-12 col-xs-12"></div>

			<nav class="text-center col-lg-12 col-md-12 col-sm-12" aria-label="Page navigation">
			  <ul class="pagination">
			    <li>
			      <a href="#" aria-label="Previous">
			        <span aria-hidden="true">&laquo;</span>
			      </a>
			    </li>
			    <li class="active"><a href="#">1</a></li>
			    <li><a href="#">2</a></li>
			    <li><a href="#">3</a></li>
			    <li><a href="#">4</a></li>
			    <li><a href="#">5</a></li>
			    <li>
			      <a href="#" aria-label="Next">
			        <span aria-hidden="true">&raquo;</span>
			      </a>
			    </li>
			  </ul>
			</nav>
		</div> <!-- FIN MUESTRA DE LIBROS -->
		

		
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
	<script src="js/bootstrap.min.js"></script>

</body>
</html>