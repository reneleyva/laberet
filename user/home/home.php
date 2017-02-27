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
	<link rel="stylesheet" href="../../css/home-style.css"> 
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
		      <li><a href="pedidosEspeciales.html">Pedidos Especiales</a></li>
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
	
	<!-- EMPIEZA CAROUSEL -->
	<div class="container">
		<div class="row card">
			<h4 class="text-center">Últimos Libros Agregados</h4>
			<!-- <img src="img/back-grey.png" id="prev" class="col-lg-1 col-md-1 col-sm-1"></img> -->
			<div id="prev-libros" class="prev col-lg-1 col-md-2 col-sm-2 col-xs-3">
				<span class="glyphicon glyphicon-menu-left"></span>
			</div>

			<div id="carousel-libros" class="carousel col-lg-10 col-md-8 col-sm-8 col-xs-6	">
				
				<?php include '../buscar/muestraLibros.php';
					if(!$books){
						echo "FUCK!";
						exit();
					}
					foreach ($books as $book):
				?>
				<div class="thumbnail libro">
					<div class="caption">
						<a href="#"><img class="book-cover" src="../../<?php echo $book['fotoFrente'];?>" alt="PENE"></a>
						<div class="info">
							<p class="book-title"><?php echo $book['titulo'];?></p>
							<a class="book-author" href="#"><?php echo $book['autor'];?></a>
							<p class="book-price"><?php echo $book['precio'];?></p>
						</div>
					</div>
				</div>
				<?php endforeach;?>			
				</div><!-- Fin Carousel -->

			<!-- <img src="img/next-grey.png" id="next" class="col-lg-1 col-md-1 col-sm-1"></img> -->
			<div id="next-libros" class="next col-lg-1 col-md-2 col-sm-2 col-xs-3">
				<span class="glyphicon glyphicon-menu-right"></span>
			</div>
		</div>
		
		<!-- Empieza Carousel Librerías -->
		<div class="row card">
			<h4 class="text-center">Últimas Librerías Agregadas</h4>
			<!-- <img src="img/back-grey.png" id="prev" class="col-lg-1 col-md-1 col-sm-1"></img> -->
			<div id="prev-librerias" class="prev col-lg-2 col-md-2 col-sm-3 col-xs-3">
				<span class="glyphicon glyphicon-menu-left"></span>
			</div>

			<div id="carousel-librerias" class="carousel col-lg-8 col-md-8 col-sm-6 col-xs-6	">
			<?php 
			include '../../librerias.php';
			if(!$librerias){
				echo "FUCK!";
				exit();
			}
			foreach ($librerias as $libreria): ?>	
				<div class="perfil">
					<div id="box">
						<div class="row text-center">
							<h4 class="col-lg-12"><b><?php echo $libreria['Nombre'];?></b></h4>
						</div>
						<div style="background: url(
						<?php echo htmlspecialchars('../../img/'.$libreria['fotoPerfil'], ENT_QUOTES, 'UTF-8');?>
					 ) no-repeat no-repeat center center;" class="circle"></div>
						<p><?php echo $libreria['direccion'];?></p>
						<div class="row text-center">
							<a href="#"><button type="" class="btn btn-default">VER PERFIL</button></a>
						</div>
					</div>
				</div>
			<?php endforeach;?>
				
			</div><!-- Fin Carousel -->

			<!-- <img src="img/next-grey.png" id="next" class="col-lg-1 col-md-1 col-sm-1"></img> -->
			<div id="next-librerias" class="next col-lg-2 col-md-2 col-sm-3 col-xs-3">
				<span class="glyphicon glyphicon-menu-right"></span>
			</div>
		</div>
		

		<!-- Pedido Especial -->
		<?php 
		$lunaAmaARene = False;
		if ($lunaAmaARene):?>
		<div class="row card pedido-especial">
			<h3 class="text-center"><b>Librería Aurora ha surtido tu pedido especial.</b></h3>
			<div class="libro">
				<div class="col-lg-2 col-lg-offset-4 col-md-2 col-md-offset-4 col-sm-6 col-sm-offset-0 col-xs-5 col-xs-offset-0">
					<img class="book-cover" src="img/brave-men.jpg" alt="Brave Men">
				</div>
				<div class="info col-lg-2 col-lg-offset-4 col-md-2 col-md-offset-4 col-sm-6 col-sm-offset-0 col-xs-7 col-xs-offset-0">
					<p class="book-title">Brave men</p>
					<a class="book-author" href="#">Ernie Pyle</a>
					<p><b>Autor: </b><a href="#">Ernie Pyle</a></p>
					<p><b>Ubicación: </b><a href="#" title="Librería Aurora">Librería Aurora</a></p>
					<p class="book-price">$230</p>
					<button type="" class="btn btn-default"><b>Ver Libro</b></button>
				</div>
			</div>
		</div> <!-- Fin Pedido Especial -->
		<?php endif; ?>

		<?php 
		$JazMeAma = False; // Pero será verdadero
		if ($JazMeAma):?>
		<!-- Compras Recientes -->
		<div class="row card compras-recientes">
			<h4 class="text-center"><b>Tus compras recientes.</b></h4>
			<div id="prev-compras" class="prev col-lg-1 col-md-1 col-sm-2 col-xs-2">
					<span class="glyphicon glyphicon-menu-left"></span>
			</div>
			
			<!-- IMPORTANTE! si son menos de 3 elementos ponerle style="float: none;" -->
			<div id="carousel-compras" class="row col-lg-10 col-md-10 col-sm-8 col-xs-8">
				
				<div class="cover col-lg-1 col-md-5">
					<img src="img/fundacion-cover.jpg" alt="">
				</div>

				<div class="info col-lg-5 col-md-5">
					<p><b>Fundación</b></p>
					<p><b>Autor:</b> <a href="#" title="Isaac Asimov">Isaac Asimov</a></p>
					<p><b>Vendedor: </b> <a href="#">Librería Aurora</a></p>
					<p>$230</p>
				</div>

				<div class="cover col-lg-1 col-md-5">
					<img src="img/fundacion-cover.jpg" alt="">
				</div>

				<div class="info col-lg-5 col-md-5">
					<p><b>Fundación</b></p>
					<p><b>Autor:</b> <a href="#" title="Isaac Asimov">Isaac Asimov</a></p>
					<p><b>Vendedor: </b> <a href="#">Librería Aurora</a></p>
					<p>$230</p>
				</div>
				
				<div class="cover col-lg-1 col-md-5">
					<img src="img/fundacion-cover.jpg" alt="">
				</div>

				<div class="info col-lg-5 col-md-5">
					<p><b>Fundación</b></p>
					<p><b>Autor:</b> <a href="#" title="Isaac Asimov">Isaac Asimov</a></p>
					<p><b>Vendedor: </b> <a href="#">Librería Aurora</a></p>
					<p>$230</p>
				</div>

			</div>

			<div id="next-compras" class="next col-lg-1 col-md-1 col-sm-2 col-xs-2">
			
				<span class="glyphicon glyphicon-menu-right"></span>
			</div>
			<a href="" title="" class="btn btn-default centered"><b>Ver Todas Las Compras</b></a>
		</div> <!-- Fin Compras Recientes.  -->
		<?php endif; ?>

		<!-- Libros que Quizas le ineteresen -->
		<div class="row card">
			<h4 class="text-center">Libros que Quizás te interesen.</h4>
			<!-- <img src="img/back-grey.png" id="prev" class="col-lg-1 col-md-1 col-sm-1"></img> -->
			<div id="prev-intereses" class="prev col-lg-1 col-md-2 col-sm-2 col-xs-3">
				<span class="glyphicon glyphicon-menu-left"></span>
			</div>

			<div id="carousel-intereses" class="carousel col-lg-10 col-md-8 col-sm-8 col-xs-6	">
			<?php include '../buscar/muestraLibros.php';
				if(!$books){
					echo "PENE DE LUNA";
					exit();
				}
				foreach ($books as $book):
			?>
				<div class="thumbnail libro">
					<div class="caption">
						<a href="#"><img class="book-cover" src="../../<?php echo $book['fotoFrente']?>" alt="Brave Men"></a>
						<div class="info">
							<p class="book-title"><?php echo $book['titulo']?></p>
							<a class="book-author" href="#"><?php echo $book['autor']?></a>
							<p class="book-price"><?php echo $book['precio']?></p>
						</div>
					</div>
				</div>
			<?php endforeach?>
				
			</div><!-- Fin Carousel -->

			<!-- <img src="img/next-grey.png" id="next" class="col-lg-1 col-md-1 col-sm-1"></img> -->
			<div id="next-intereses" class="next col-lg-1 col-md-2 col-sm-2 col-xs-3">
				<span class="glyphicon glyphicon-menu-right"></span>
			</div>
		</div>

		<!-- <div id="footer-hl" class="hl"></div> -->
		
		<!-- Footer -->
		<!-- <div class="row footer text-center">
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
									<a href="#">Pedidos Especiales</a><br>
									<a href="#">Historial de Compras</a>
								</div>
							</div>
						</div>
					</div><!-- FIN Footer -->
	</div>
	<!-- FIN ELEMENTOS -->

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script src="../../js/bootstrap.min.js"></script>
	<script type="text/javascript" src="../../slick/slick.min.js"></script>
	<script src="../../js/home-carousel.js"></script>
</body>
</html>