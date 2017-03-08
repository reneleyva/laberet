<?php include 'redirect.php';?>
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
	<link rel="stylesheet" type="text/css" href="../../css/navbar-vis.css">
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
		   
		   <div id="list" class="col-lg-10 col-md-10">
		   		<ul class="nav navbar-nav navbar-right">
					<li class="active"><a href="#">Inicio</a></li>
			            <li><a href="/buscar">Catálogo</a></li>
			            <li><a href="#librerias">Librerías</a></li>
			            <li><a href="user/registrarse">Registrarse</a></li>
			            <li><a href="user/inicioSesion">Iniciar Sesión</a></li>
				</ul>
		   </div>
		    
		  </div><!-- /.navbar-collapse -->
	</nav> <!-- END NAV -->
	
	<div class="container">
		<?php include 'info.php'; ?>
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
				
				<button id="add-cart" type="button" class="btn btn-default btn-lg"> <span class="glyphicon glyphicon-shopping-cart"></span> Añadir al carrito</button>

				<?php 
					if (isset($_SESSION['cart'])) {
						// include "../../temp/Libro.php";
						$book = Libro::getLibro($id);
						if ($book) {
							echo "YA ESTÁ!!!!!!!!!!";
						}
					} else {

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
						<p class="text-center"><?php echo $libreria->getDireccion(); ?></p>
						<div class="row text-center">
							<a href="../infoLibreria/?id=<?php echo $libreria->getId(); ?>"><button type="" class="btn btn-default">VER PERFIL</button></a>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="row card">
			<h3 class="text-center">Libros Relacionados</h3>
			<!-- <img src="img/back-grey.png" id="prev" class="col-lg-1 col-md-1 col-sm-1"></img> -->
			<div id="prev-relacionados" class="prev col-lg-1 col-md-2 col-sm-2 col-xs-3">
				<span class="glyphicon glyphicon-menu-left"></span>
			</div>

			<div id="carousel-relacionados" class="carousel col-lg-10 col-md-8 col-sm-8 col-xs-6	">

			<?php if(!$relacionados){
				echo "NO HAY LIRBOS RELACIONADOS";
				// exit();
			}
			foreach ($relacionados as $book): ?>
				<div class="thumbnail libro">
					<div class="caption">
						<a href="#"><img class="book-cover" src="../../<?php echo $book->getFotoFrente();?>" alt="Brave Men"></a>
						<div class="info">
							<p class="book-title"><?php echo $book->getTitulo();?></p>
							<a class="book-author" href="#"><?php echo $book->getAutor();?></a>
							<p class="book-price"><b><?php echo '$'.$book->getPrecio().' MXN';?></b></p>
						</div>
						<input type="text" class="id" hidden="true" value="<?php echo htmlspecialchars($book->getId(), ENT_QUOTES, 'UTF-8');?>">
					</div>
				</div>
				
			<?php endforeach; ?>
				
				
			</div><!-- Fin Carousel -->

			<!-- <img src="img/next-grey.png" id="next" class="col-lg-1 col-md-1 col-sm-1"></img> -->
			<div id="next-relacionados" class="next col-lg-1 col-md-2 col-sm-2 col-xs-3">
				<span class="glyphicon glyphicon-menu-right"></span>
			</div>
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
								<a href="../../">Inicio</a><br>
								<a href="#">Catálogo</a><br>
								<a href="#">Pedidos Especiales</a>
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