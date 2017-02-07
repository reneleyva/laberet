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
	    <a class="navbar-brand navbar-left" href="#"><img id="icon" src="../../img/logo.png" alt=""></a>
		<!-- <a class="navbar-brand navbar-left laberet" href="#"><b>LABERET</b></a> -->
	  </div>

	  <!-- Collect the nav links, forms, and other content for toggling -->
	  <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
	    <div id="search" class="col-lg-4 col-md-4 col-sm-3 ">
	        <form class="navbar-form" role="search">
	        <div class="input-group">
	            <input type="text" class="form-control" placeholder="Search" name="q">
	            <div class="input-group-btn">
	                <button class="btn btn-default" type="submit"><i class="glyphicon glyphicon-search"></i></button>
	            </div>
	        </div>
	        </form>
	    </div>
	    <div id="list" class="col-lg-6 col-md-6 col-sm-7">
	    	<ul class="nav navbar-nav navbar-right">
		   	  <li id="cart"><a href="#"><img src="../../img/grey-cart.png" alt=""><b>(0)</b></a></li>	
		      <li><a href="#">Pedidos Especiales</a></li>
		      <li class="dropdown">
		        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><b>Cuenta</b> <b class="caret"></b></a>
		        <ul class="dropdown-menu">
		          <li><a href="#">Configurar Cuenta</a></li>
		          <li><a href="#">Historial de Compras</a></li>
		          <li class="divider"></li>
		          <li><a href="#">Salir</a></li>
		        </ul>
		      </li>
			</ul>
	    </div>	
	    
	  </div><!-- /.navbar-collapse -->
</nav> <!-- END NAV -->
	
	<div class="container">
		<div class="row bookInfo">
			<?php include 'info.php'; ?>

			<div class="photos col-lg-4 col-md-4 col-sm-6 col-xs-6">
				<div class="cover">
					<img src="../../<?php echo htmlspecialchars($row['fotoFrente'], ENT_QUOTES, 'UTF-8');?>" alt="">					
				</div>
				<div class="back">
					<img src="../../<?php echo htmlspecialchars($row['fotoAtras'], ENT_QUOTES, 'UTF-8');?>" alt="">					
				</div>
			</div>
			
			<div class="info col-lg-4 col-md-4 col-sm-6 col-xs-6">
				<p class="title">
				<?php echo htmlspecialchars($row['titulo'], ENT_QUOTES, 'UTF-8');?></p>

				<p><a class="author" href="#">
					<?php echo htmlspecialchars($row['autor'], ENT_QUOTES, 'UTF-8');?>
				</a></p>
				<p><b>Precio: </b> $<?php echo htmlspecialchars($row['precio'], ENT_QUOTES, 'UTF-8');?></p>
				<p><b>Ubicación: </b> <a href="#">
					<?php echo htmlspecialchars($nombreLibreria, ENT_QUOTES, 'UTF-8');?>
				</a></p>
				<p><b>ISBN: </b> <?php echo htmlspecialchars($row['isbn'], ENT_QUOTES, 'UTF-8');?></p>
				<p><b>Tags: </b> 
				<?php 

				for ($i=0; $i < count($tags); $i++) { 
					echo ' <a href="#" class="label label-default">'.$tags[$i].'</a> ';
				} 
				?><!-- Fin php -->
		
				</p>
				
				<button type="" class="btn btn-default btn-lg"> <span class="glyphicon glyphicon-shopping-cart"></span> Añadir al carrito</button>
			</div>

			<div class="libreria col-lg-4 col-md-4 hidden-sm hidden-xs">
				<div class="perfil">
					<div id="box">
						<div class="row text-center">
							<h4 class="col-lg-12"><b><?php echo $nombreLibreria; ?></b></h4>
						</div>
						<div class="circle"></div>
						<p class="text-center"><?php echo $libreria['direccion']; ?></p>
						<div class="row text-center">
							<a href="#"><button type="" class="btn btn-default"><b>VER PERFIL</b></button></a>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="row card">
			<?php 
				foreach ($relacionados as $libro) {
					echo $libro['titulo']." ";
				}
			?>
			<h3 class="text-center">Libros Relacionados</h3>
			<!-- <img src="img/back-grey.png" id="prev" class="col-lg-1 col-md-1 col-sm-1"></img> -->
			<div id="prev-relacionados" class="prev col-lg-1 col-md-2 col-sm-2 col-xs-3">
				<span class="glyphicon glyphicon-menu-left"></span>
			</div>

			<div id="carousel-relacionados" class="carousel col-lg-10 col-md-8 col-sm-8 col-xs-6	">
				
				<div class="thumbnail libro">
					<div class="caption">
						<a href="#"><img class="book-cover" src="img/brave-men.jpg" alt="Brave Men"></a>
						<div class="info">
							<p class="book-title">Brave men</p>
							<a class="book-author" href="#">Ernie Pyle</a>
							<p class="book-price">$230</p>
						</div>
					</div>
				</div>
				
				
			</div><!-- Fin Carousel -->

			<!-- <img src="img/next-grey.png" id="next" class="col-lg-1 col-md-1 col-sm-1"></img> -->
			<div id="next-relacionados" class="next col-lg-1 col-md-2 col-sm-2 col-xs-3">
				<span class="glyphicon glyphicon-menu-right"></span>
			</div>
		</div>
		
		<div id="footer-hl" class="hl"></div>
		
		<!-- Footer -->
		<div class="row footer text-center">
				<div class="col-lg-4">
					<div class="row">
						<img src="img/laberet_icon.png" alt="">
						<b>LABERET</b>
					</div>
				</div>
				<div class="col-lg-4">
				<p><span class="glyphicon glyphicon-phone"></span> Cel. (044) 5556213423 </p>
				<p><span class="glyphicon glyphicon-envelope"></span> contact@laberet.com </p>
				</div>
				<div class="col-lg-4 hidden-md hidden-sm hidden-xs">
					<div class="row nav">
						<a href="#">Inicio</a><br>
						<a href="#">Pedidos Especiales</a><br>
						<a href="#">Catálogo</a>
					</div>
				</div>
			</div><!-- FIN Footer -->


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
			        		<img src="img/brave-men.jpg" alt="">
			        	</div>
			        	<div class="modal-back col-lg-6">
			        		<img src="img/braveMen-back.jpg" alt="">
			        	</div>
			        </div>
			      </div>
			      
			    </div>
			  </div>
			</div>
	</div>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script src="../../js/bootstrap.min.js"></script>
	<script type="text/javascript" src="../../slick/slick.min.js"></script>
	<script src="../../js/infoLibro.js"></script>
</body>
</html>