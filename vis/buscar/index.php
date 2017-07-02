<?php include "variable-sesion.php" ?>
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
	<link rel="stylesheet" href="../../css/jquery-ui.min.css"> 
	<link rel="stylesheet" href="../../css/busqueda-style.css"> 
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
	<div class="container">

		<div class="row">
			
			<form action="." class="row form-inline" method="get" accept-charset="utf-8">
				<div id="search-form" class="form-group">
					<div class="input-group">
						<!-- BUSQUEDA -->
						<input type="text" name="q" maxlength="40" id="keyword" class="form-control" placeholder="Buscar...">       
						<span class="input-group-btn">
							<button class="btn btn-default" type="submit"><span class="glyphicon glyphicon-search"></span></button>
						</span>

						<select name="s" class="form-control">
							  <option value="todo">Todo</option>
							  <option value="autor">Autor</option>
							  <option value="titulo">Titulo</option>
							  <option value="categoria">Categoria</option>
						</select>
				    </div>
				
				<!-- Para javascript -->
				<?php if (isset($_GET['s'])) {
					echo "<input type='text' id='selected' hidden value='".$_GET['s']."'>";
				} ?>
				 
				</div>
			</form>

			
		</div>
		
		<div class="row muestra"> <!-- INICIO MUESTRA -->
			<?php 
				  include 'busca.php'; 
				  include '../../pagination.php';
			?>
			
			
			<?php 
			if (isset($_GET['q'])) {
				echo "<h3 class='resultado'>Resultados para: <span>".htmlspecialchars($keyword, ENT_QUOTES, 'UTF-8')."</span></h3>";

			}

			if(!$books){
				include 'busqueda-error.html';
				exit();
			}

			$total = 0; //Total de libros ya generados
			$numLibros = count($books);
			$numPaginas = ceil($numLibros/16); //Num de páginas

			for ($i = ($page-1)*16; $i < $numLibros and $total < 16;$i++) { 
				$book = $books[$i];
				?>
				<div class="thumbnail libro col-lg-3 col-md-6 col-sm-6 col-xs-12	">
					<div class="caption">
						<a href="#"><img class="book-cover" src="../../<?php echo htmlspecialchars($book->getFotoFrente(), ENT_QUOTES, 'UTF-8');?>" alt=""></a>
						<div class="info">
							<p class="book-title">
								<?php echo htmlspecialchars($book->getTitulo(), ENT_QUOTES, 'UTF-8'); ?>
							</p>
							<p class="book-author">
								<?php echo htmlspecialchars($book->getAutor(), ENT_QUOTES, 'UTF-8'); ?>
							</p>
							<p class="book-price">
							<b>
								$<?php echo "<b>". htmlspecialchars($book->getPrecio(), ENT_QUOTES, 'UTF-8')."</b> MXN";?>
							</b>
							</p>
						</div>
					</div>
					<input type="text" class="id" hidden="true" value="<?php echo $book->getId();?>">
				</div>
			<?php $total++;} ?>
		
		<div class="paginas text-center col-lg-12 col-md-12 col-sm-12">
			<nav class="" aria-label="Page navigation">
				<ul class="pagination">
					
					<?php 
						showPagination($books, $page, 16);
					 ?>

				</ul>
			</nav>
		</div>
		

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

	<!-- FIN ELEMENTOS -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script src="../../js/bootstrap.min.js"></script>
	<script src="../../js/linkLibro.js"></script>
	<script src="../../js/jquery-ui.min.js"></script>
	<script src="../../js/busca.js"></script>
	<script src="../../js/optionHack.js"></script>
</body>
</html>