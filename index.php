<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- <meta name="viewport" content="width=device-width, initial-scale=1"> -->
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- <link rel="icon" href="../../favicon.ico"> -->

	<title>Laberet</title>
	<!-- Bootstrap css -->
	<link rel="stylesheet" href="css/bootstrap.min.css"> 
	<link rel="stylesheet" href="css/style.css"> 
	<link rel="stylesheet" type="text/css" href="slick/slick.css"/>
	<link rel="stylesheet" type="text/css" href="slick/slick-theme.css"/>
	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->


</head>
<body>
	<!-- ****** EMPIEZAN ELEMENTOS ******* -->
	

	<nav class="navbar navbar-default navbar-fixed-top">
		<div class="container">
			<div class="navbar-header">
		          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
		            <span class="sr-only">Toggle navigation</span>
		            <span class="icon-bar"></span>
		            <span class="icon-bar"></span>
		            <span class="icon-bar"></span>
		          </button>
		          <a class="navbar-brand navbar-left" href="#"><img src="img/laberet_icon.png" alt=""></a>
		          <a class="navbar-brand" href="#"><b>LABERET</b></a>
        	</div>

        	<div id="navbar" class="navbar-collapse collapse">
        		
        		<ul class="nav navbar-nav navbar-right">
        			<li class="active"><a href="#">Inicio</a></li>
		            <li><a href="./user/buscar">Catálogo</a></li>
		            <li><a href="#librerias">Librerías</a></li>
		            <li><a href="registrarse.html">Registrarse</a></li>
		            <li><a href="iniciarSesion.html">Iniciar Sesión</a></li>
		            
          		</ul>
        	</div>
		</div>
	</nav> <!-- END NAV -->
	
	
	<div class="container-fluid">
	<!-- HEADER -->
		<div class="row-fluid">
			<h1 id="element" class="centering text-center">Encuentra Los Libros Que Amas</h1>
			<h2 class="centering text-center"></h2>
			<div id="buscar" class="centering text-center">
				<input id="busqueda" class="" type="text" name="" value="" placeholder=""><button type="" id="btn-busqueda" class="btn btn-default btn-lg"><span class="glyphicon glyphicon-search"></span></button>
			</div>
	 	</div> <!-- FIN HEADER -->
		
    </div>
	
	<!-- Lo que hacemos -->
	<div class="container">
		<div id="go1" class="hl"></div>
		<h2 class="text-center">Lo que hacemos</h2>
		<div  class="row" id="lo_que_hacemos">
			<div class="col-lg-4 col-md-12 card">
				<div class="row">
					<div class="col-lg-12 col-md-6 col-sm-6 text-center">
						<img src="img/LoQueHacemos.jpg" alt="">
					</div>
					
					<div class="texto" class="col-lg-12 col-md-6 col-sm-6">
						<p> Proporcionamos a las librerías de la ciudad la infraestuctura para catalogar sus mejores libros y venderlos en linea.</p>
					</div>
					
				</div>
			</div>
			
			<div class="col-lg-4 col-md-12 card">
				<div class="row">
					<div class="col-lg-12 col-md-6 col-sm-6 text-center">
						<img src="img/LoQueHacemos.jpg" alt="">
					</div>
					
					<div class="texto" class="col-lg-12 col-md-6 col-sm-6">
						<p>Ayudamos a las librerías a ordenar su inventario en nuestra base de datos y a llevar un control exacto de sus ventas y su presencia en linea.</p>
					</div>
					
				</div>
			</div>

			<div class="col-lg-4 col-md-12 card">
				<div class="row">
					<div class="col-lg-12 col-md-6 col-sm-6 text-center">
						<img src="img/LoQueHacemos.jpg" alt="">
					</div>
					
					<div class="texto" class="col-lg-12 col-md-6 col-sm-6">
						<p>Envíamos los libros que compres en linea a cualquier parte. </p>
					</div>
					
				</div>
			</div>

		</div>
		<div class="hl"></div>
	</div> <!-- FIN Lo que hacemos -->
	
	<!-- INICIO Carousel Librerías -->
	<div id="librerias" class="container-fluid">
		<h2 class="text-center">Descubre libros de entre 20 librerías de la ciudad.</h2>

		 <div class="row carousel">
			<div>
				<div id="box">
					<div class="row text-center">
						<h4 class="col-lg-12"><b>Librería Aurora</b></h4>
					</div>
					<div class="circle"></div>
					<p>Donceles #2 col. centro</p>
					<div class="row text-center">
						<a href="#"><button type="" class="btn btn-default">VER PERFIL</button></a>
					</div>
				</div>
			</div>

			<div>
				<div id="box">
					<div class="row text-center">
						<h4 class="col-lg-12"><b>Librería Aurora</b></h4>
					</div>
					<div class="circle"></div>
					<p>Donceles #2 col. centro</p>
					<div class="row text-center">
						<a href="#"><button type="" class="btn btn-default">VER PERFIL</button></a>
					</div>
				</div>
			</div>

			<div>
				<div id="box">
					<div class="row text-center">
						<h4 class="col-lg-12"><b>Librería Aurora</b></h4>
					</div>
					<div class="circle"></div>
					<p>Donceles #2 col. centro</p>
					<div class="row text-center">
						<a href="#"><button type="" class="btn btn-default">VER PERFIL</button></a>
					</div>
				</div>
			</div>

			<div>
				<div id="box">
					<div class="row text-center">
						<h4 class="col-lg-12"><b>Librería Aurora</b></h4>
					</div>
					<div class="circle"></div>
					<p>Donceles #2 col. centro</p>
					<div class="row text-center">
						<a href="#"><button type="" class="btn">VER PERFIL</button></a>
					</div>
				</div>
			</div>

		</div> <!-- FIN Carousel -->
		
		<img src="img/prev.png" alt="<" id="prev">
		<img src="img/next.png" alt=">" id="next">

		<div id="ver_catalogo" class="text-center btn-catalogo">
			<a href="#"><button class="btn btn-default btn-ver">VER TODAS LAS LIBRERIAS</button></a>
		</div>
		
		
		
	</div><!-- FIN Libreria -->
	
	<div class="container">
		<div class="row ultimos-libros">

			<h2 class="text-center">Ultimos Libros Agregados.</h2>
			<div class="thumbnail libro col-lg-3 col-md-6">
				<div class="caption">
					<a href="#"><img class="book-cover" src="img/brave-men.jpg" alt="Brave Men"></a>
					<div class="info">
						<p class="book-title">Brave men</p>
						<a class="book-author" href="#">Ernie Pyle</a>
						<p class="book-price">$230</p>
					</div>
				</div>
			</div>

			<div class="thumbnail libro col-lg-3 col-md-6">
				<div class="caption">
					<img class="book-cover" src="img/fundacion-cover.jpg" alt="Brave Men">
					<div class="info">
						<p class="book-title">Fundación</p>
						<a class="book-author" href="#">Isaac Asimov</a>
						<p class="book-price">$230</p>
					</div>
				</div>
			</div>

			<div class="thumbnail libro col-lg-3 col-md-6">
				<div class="caption">
					<img class="book-cover" src="img/tarumba-cover.jpg" alt="Brave Men">
					<div class="info">
						<p class="book-title">Brave men</p>
						<a class="book-author" href="#">Ernie Pyle</a>
						<p class="book-price">$230</p>
					</div>
				</div>
			</div>

			<div class="thumbnail libro col-lg-3 col-md-6">
				<div class="caption">
					<img class="book-cover" src="img/brave-men.jpg" alt="Brave Men">
					<div class="info">
						<p class="book-title">Brave men</p>
						<a class="book-author" href="#">Ernie Pyle</a>
						<p class="book-price">$230</p>
					</div>
				</div>
			</div>

			<div class="row text-center btn-catalogo">
				<a href="#"><button class="btn btn-default btn-ver">VER CATALAGO COMPLETO</button></a>
			</div>

			<div id="footer-hl" class="hl"></div>

			<div class="row footer text-center">
				<div class="col-lg-4">
					<div class="row">
						<img src="img/laberet_icon.png" alt="">
						<b>LABERET</b>
					</div>
					<div class="row">
						<p>Made with <img src="img/love.png" alt="Love"> by APSUS</p>
					</div>
				</div>
				<div class="col-lg-4"><p><span class="glyphicon glyphicon-phone"></span> Cel. (044) 5556213423 </p>
				<p><span class="glyphicon glyphicon-phone"></span> Cel. (044) 5556213423 </p>
				<p><span class="glyphicon glyphicon-phone"></span> Cel. (044) 5556213423 </p>
				</div>
				<div class="col-lg-4 hidden-md hidden-sm hidden-xs">
					<div class="row nav">
						<a href="#">Inicio</a><br>
						<a href="#" title="Catalogo">Registrarse</a><br>
						<a href="#">Iniciar Sesión</a>
					</div>
				</div>
			</div><!-- FIN Footer -->

		</div>
	</div> <!-- FIN Ultimos Libros -->
	
	<!-- ****** TERMINAN ELEMENTOS ******* -->
	
	<!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="slick/slick.min.js"></script>
    <script src="js/typed.js"></script>
    <script src="js/carousel.js"></script>
</body>
</html>