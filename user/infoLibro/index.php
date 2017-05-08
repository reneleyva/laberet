<?php 
include 'info.php';
session_start();
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
	<link rel="stylesheet" href="../../css/bootstrap.min.css"> 
	<link rel="stylesheet" type="text/css" href="../../slick/slick.css"/>
	<link rel="stylesheet" type="text/css" href="../../slick/slick-theme.css"/>
	<link rel="stylesheet" href="../../css/infoLibro-style.css"> 
	<link rel="stylesheet" type="text/css" href="../../css/navbar-user.css">
	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
	
</head>
<body>
	<nav class="navbar navbar-default" role="navigation">
	  <!-- Brand and toggle get grouped for better mobile display -->
	  <div class="navbar-header col-lg-2 col-md-2 col-sm-2">
	    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
	      <span class="sr-only">Toggle navigation</span>
	      <span class="icon-bar"></span>
	      <span class="icon-bar"></span>
	      <span class="icon-bar"></span>
	    </button>
	    <a class="navbar-brand navbar-left" href="../../"><img id="icon" src="../../img/logo.png" alt=""></a>
		<!-- <a class="navbar-brand navbar-left laberet" href="#"><b>LABERET</b></a> -->
	  </div>

	  <!-- Collect the nav links, forms, and other content for toggling -->
	  <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
	    <div id="search" class="col-lg-4 col-md-4 col-sm-3 ">
	        <form action="../buscar" method="GET" class="navbar-form" role="search">
		        <div class="input-group">
		            <input type="text" class="form-control" placeholder="Search" name="q">
		            <input type="text" hidden name="s" value="todo">
		            <div class="input-group-btn">
		                <button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
		            </div>
		        </div>
	        </form>
	    </div> 
	    <div id="list" class="col-lg-6 col-md-6 col-sm-7">
	    	<ul class="nav navbar-nav navbar-right">
		   	  <li id="cart"><a href="../carrito"><img src="../../img/grey-cart.png" alt=""><b>(<?php echo count($_SESSION['cart']) ?>)</b></a></li>	
		      <li><a href="../pedidosEspeciales">Pedidos Especiales</a></li>
		      <li class="dropdown">
		        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><b>Cuenta</b> <b class="caret"></b></a>
		        <ul class="dropdown-menu">
		          <li><a href="#">Configurar Cuenta</a></li>
		          <li><a href="#">Historial de Compras</a></li>
		          <li class="divider"></li>
		          <li><a href="../salir">Salir</a></li>
		        </ul>
		      </li>
			</ul>
	    </div>	
	    
	  </div><!-- /.navbar-collapse -->
</nav> <!-- END NAV -->

	<div class="container">
		<div class="row bookInfo" data-id="<?php echo $book->getId();?>">

			<div class="photos col-lg-4 col-md-4 col-sm-6 col-xs-6">
				<div class="cover">
					<img src="../../<?php echo $book->getFotoFrente();?>" alt="">					
				</div>
				<div class="back">
					<img src="../../<?php echo $book->getFotoAtras();?>" alt="">
				</div>
			</div>
			
			<div class="info col-lg-4 col-md-4 col-sm-6 col-xs-6">
				<p class="title">
				<?php echo $book->getTitulo();?></p>

				<p><a class="author" href="../buscar/?q=<?php echo $book->getAutor();?>&s=autor">
					<?php echo $book->getAutor();?>
				</a></p>
				<p><b>Precio: </b> $<?php echo $book->getPrecio();?></p>
				<p><b>Ubicación:</b> <a href="../infoLibreria/?id=<?php echo $libreria->getId();?>">
					<?php echo $libreria->getNombre();?>
				</a></p>
				<p><b>ISBN: </b> <?php echo $book->getIsbn();?></p>
				<p><b>Tags: </b> 
				<?php 
				$tags = explode(" ", trim($book->getTags(), " "));
				for ($i=0; $i < count($tags); $i++) { 
					if ($tags[$i] != '')
						echo '<a href="../buscar/?q='.$tags[$i].'&s=todo" class="label label-default">'.$tags[$i].'</a> ';
				} 
				?><!-- Fin php -->
		
				</p>
				
				<?php 
				include_once "../../temp/Libro.php";
				//Checa si está en carrito 
				

				$carrito =  $_SESSION['cart'];
		
				if(!$carrito) {
					echo "<button id='add-cart' type='button' class='btn btn-md'><b> <span class='glyphicon glyphicon-shopping-cart'></span> Añadir al carrito </b></button>";
				} else if ($book->inArray($carrito)) {
					echo "<a id='in-cart'  class='btn btn-md'><b> <span class='glyphicon glyphicon-ok'></span> Añadido </b></a>";
				} else {
					echo "<button id='add-cart' type='button' class='btn btn-md'><b> <span class='glyphicon glyphicon-shopping-cart'></span> Añadir al carrito </b></button>";
				}

				?>
				
			</div>

			<div class="libreria col-lg-4 col-md-4 hidden-sm hidden-xs">
				<div class="perfil">
					<div id="box">
						<div class="row text-center">
							<h4 class="col-lg-12"><b><?php echo $libreria->getNombre(); ?></b></h4>
						</div>
						<div class="circle" style="background: url(../../<?php echo $libreria->getFotoPerfil()?>) no-repeat no-repeat center center;"></div>
						<div class="row text-center">
							<a href="../infoLibreria/?id=<?php echo $libreria->getId(); ?>"><button type="" class="btn btn-sm">Ver Perfil</button></a>
						</div>
					</div>
				</div>
			</div>
		</div>
		
		<h3 class="text-center" id="libros-relacionados"><b>Libros Relacionados</b></h3>
		<div class="row card">
			
			<!-- <img src="img/back-grey.png" id="prev" class="col-lg-1 col-md-1 col-sm-1"></img> -->
			<div id="prev-relacionados" class="prev col-lg-1 col-md-2 col-sm-2 col-xs-3">
				<span class="glyphicon glyphicon-menu-left"></span>
			</div>

			<div id="carousel-relacionados" class="col-lg-10 col-md-8 col-sm-8 col-xs-6	">

			<?php 

			if(!$relacionados) {
				echo "NO HAY LIRBOS RELACIONADOS";
				// exit();
			}
			foreach ($relacionados as $book): ?>

				<div class="thumbnail libro">
					<div class="caption">
						<a href="#"><img class="book-cover" src="../../<?php echo $book->getFotoFrente();?>" alt="Brave Men"></a>
						 <div class="info">
							<p class="book-title"><?php echo $book->getTitulo();?></p>
							<p class="book-author" href="#"><?php echo $book->getAutor();?></p>
							<p class="book-price"><b><?php echo '$'.$book->getPrecio().' MXN';?></b></p>
						</div> 
						<input type="text" class="id" hidden="true" value="<?php echo htmlspecialchars($book->getId(), ENT_QUOTES, 'UTF-8');?>">
					</div>
				</div>

				

			<?php endforeach; ?>
				
			</div>
			<div id="next-relacionados" class="next col-lg-1 col-md-2 col-sm-2 col-xs-3">
				<span class="glyphicon glyphicon-menu-right"></span>
			</div>	
		</div><!-- Fin Carousel -->

			<!-- <img src="img/next-grey.png" id="next" class="col-lg-1 col-md-1 col-sm-1"></img> -->
			
		</div>
		
		


			<!-- Modal -->
			<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
			  <div class="modal-dialog" role="document">
			    <div class="modal-content">
			      <div class="modal-header">
			        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			        <h4 class="modal-title" id="titulo">Imágenes</h4>
			      </div>
			      <div class="modal-body">
			        <div class="row">
			        	<div class="modal-cover col-lg-6">
			        		<img src="../../<?php echo htmlspecialchars($book->getFotoFrente(), ENT_QUOTES, 'UTF-8');?>" alt="">
			        	</div>
			        	<div class="modal-back col-lg-6">
			        		<img src="../../<?php echo htmlspecialchars($book->getFotoAtras(), ENT_QUOTES, 'UTF-8');?>" alt="">
			        	</div>
			        </div>
			      </div>
			      
			    </div>
			  </div>
			</div>
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
						<a href="#">Inicio</a><br>
						<a href="vis/buscar">Catálogo</a><br>
						<a href="vis/registrarse">Registrarse</a><br>
						<a href="vis/inicioSesion">Iniciar Sesión</a>
					</div>
				</div>
			</div>
		</div><!-- FIN Footer -->
	</div>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script src="../../js/bootstrap.min.js"></script>
	<script type="text/javascript" src="../../slick/slick.min.js"></script>
	<script src="../../js/infoLibro.js"></script>
	<script src="../../js/linkLibro.js"></script>
</body>
</html>