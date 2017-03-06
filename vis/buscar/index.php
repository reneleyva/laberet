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
		    <a class="navbar-brand navbar-left" href="#"><img id="icon" src="../../img/logo.png" alt=""></a>
			<!-- <a class="navbar-brand navbar-left laberet" href="#"><b>LABERET</b></a> -->
		  </div>

		  <!-- Collect the nav links, forms, and other content for toggling -->
		  <div class="collapse navbar-collapse" id="collapse-target">
		   
		   <div id="list" class="col-lg-10 col-md-10">
		   		<ul class="nav navbar-nav navbar-right">
					<li ><a href="#">Inicio</a></li>
			            <li class="active"><a href="../buscar">Catálogo</a></li>
			            <li><a href="#">Librerías</a></li>
			            <li><a href="../registrarse">Registrarse</a></li>
			            <li><a href="../inicioSesion">Iniciar Sesión</a></li>
				</ul>
		   </div>
		    
		  </div><!-- /.navbar-collapse -->
	</nav> <!-- END NAV -->

	<div class="container">

		<div class="row">
			
			<form action="busca.php" class="form-inline" method="post" accept-charset="utf-8">
				<div class="form-group">
					<div class="input-group	">
						<!-- BUSQUEDA -->
						<input type="text" name="keyword" id="keyword" class="form-control" placeholder="Search for...">       
						<span class="input-group-btn">
							<button class="btn btn-default" type="submit"><span class="glyphicon glyphicon-search"></span></button>
						</span>
				    </div>
				    
				<select name="selection" class="form-control">
					  <option>Todo</option>
					  <option>Autor</option>
					  <option>Titulo</option>
					  <option>Categoria</option>
				</select>
				    
				</div>
			</form>

			<!-- <h3 class="resultado">Resultados para: <span>Julio Cortazar</span></h3> -->
		</div>
		
		<div class="row muestra"> <!-- INICIO MUESTRA -->
			<?php include 'muestraLibros.php'; 
				  include '../../pagination.php';
			?>
			 
			<?php 
			if(!$books){
				echo "FUCK!";
				exit();
			}

			$total = 0; //Total de libros ya generados
			$numLibros = count($books);
			$numPaginas = ceil($numLibros/16); //Num de páginas

			for ($i = ($page-1)*16; $i < $numLibros and $total < 16;$i++) { 
				$book = $books[$i];
				?>
				<div class="thumbnail libro  col-lg-3 col-md-6">
					<div class="caption">
						<a href="#"><img class="book-cover" src="../../<?php echo $book['fotoFrente']?>" alt=""></a>
						<div class="info">
							<p class="book-title">
								<?php echo $book['titulo'];?>
							</p>
							<a class="book-author" href="#">
								<?php echo $book['autor'];?>
							</a>
							<p class="book-price">
							<b>
								$<?php echo $book['precio']." MXN";?>
							</b>
							</p>
						</div>
					</div>
					<input type="text" class="id" hidden="true" value="<?php echo $book['id'];?>">
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


	<!-- FIN ELEMENTOS -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script src="../../js/bootstrap.min.js"></script>
	<script src="../../js/linkLibro.js"></script>
	<script src="../../js/jquery-ui.min.js"></script>
	<script src="../../js/busca.js"></script>
</body>
</html>