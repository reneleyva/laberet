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
	<link rel="stylesheet" href="../../css/historialVentas.css"> 
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
	
	<div class="container">

		<div class="row muestra"> <!-- INICIO MUESTRA -->
			<h2 class="text-center">Historial De Ventas </h2>
			<h4 class="text-center">Total Compras en Linea: $1278</h4>
			<form class="form-inline">
				<div class="form-group">
					<label for="" class="form-group">Ordenar Por: </label>
					<select name="" class="form-control">
						<option value="reciente">Más Reciente</option>
						<option value="antiguo">Más Antiguo</option>
					</select>
					<label class="checkbox-inline"><input type="checkbox" checked value="">Vendidos en Linea</label>
					<label class="checkbox-inline"><input type="checkbox" checked value="">Vendidos en Tienda</label>
				</div>
			</form>
			<div class="hl col-lg-12 col-md-12 col-sm-12 col-xs-12"></div>
			
			

			<div class="thumbnail row libro col-lg-6 col-md-6 col-sm-12">
				<div class="caption">
					<img class="book-cover col-lg-6 col-md-6 col-sm-6 col-xs-6" src="../../img/brave-men.jpg" alt="Brave Men">
					<div class="info col-lg-6 col-md-6 col-sm-6 col-xs-6">
						<p class="book-title">Brave men</p>
						<a class="book-author" href="#">Ernie Pyle</a>
						<p class="book-price"><b>Precio: </b>$250</p>
						<p><b>ISBN: </b>9788435020848</p>
						<p><b>Fecha de Adición: </b>12/04/17</p>
						<p><b>Fecha de Venta: </b>12/04/17</p>
					</div>
				</div>
			</div>

			<div class="thumbnail row libro col-lg-6 col-md-6 col-sm-12">
				<div class="caption">
					<img class="book-cover col-lg-6 col-md-6 col-sm-6 col-xs-6" src="../../img/brave-men.jpg" alt="Brave Men">
					<div class="info col-lg-6 col-md-6 col-sm-6 col-xs-6">
						<p class="book-title">Brave men</p>
						<a class="book-author" href="#">Ernie Pyle</a>
						<p class="book-price"><b>Precio: </b>$250</p>
						<p><b>ISBN: </b>9788435020848</p>
						<p><b>Fecha de Adición: </b>12/04/17</p>
						<p><b>Fecha de Venta: </b>12/04/17</p>
					</div>
				</div>
			</div>
			
			<div class="hl col-lg-12 col-md-12 col-sm-12 col-xs-12"></div>
			
			<div class="thumbnail row libro col-lg-6 col-md-6 col-sm-12">
				<div class="caption">
					<img class="book-cover col-lg-6 col-md-6 col-sm-6 col-xs-6" src="../../img/brave-men.jpg" alt="Brave Men">
					<div class="info col-lg-6 col-md-6 col-sm-6 col-xs-6">
						<p class="book-title">Brave men</p>
						<a class="book-author" href="#">Ernie Pyle</a>
						<p class="book-price"><b>Precio: </b>$250</p>
						<p><b>ISBN: </b>9788435020848</p>
						<p><b>Fecha de Adición: </b>12/04/17</p>
						<p><b>Fecha de Venta: </b>12/04/17</p>
					</div>
				</div>
			</div>

			<div class="thumbnail row libro col-lg-6 col-md-6 col-sm-12">
				<div class="caption">
					<img class="book-cover col-lg-6 col-md-6 col-sm-6 col-xs-6" src="../../img/brave-men.jpg" alt="Brave Men">
					<div class="info col-lg-6 col-md-6 col-sm-6 col-xs-6">
						<p class="book-title">Brave men</p>
						<a class="book-author" href="#">Ernie Pyle</a>
						<p class="book-price"><b>Precio: </b>$250</p>
						<p><b>ISBN: </b>9788435020848</p>
						<p><b>Fecha de Adición: </b>12/04/17</p>
						<p><b>Fecha de Venta: </b>12/04/17</p>
					</div>
				</div>
			</div>
			
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

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script src="../../js/bootstrap.min.js"></script>

</body>
</html>