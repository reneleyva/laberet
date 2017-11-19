<!DOCTYPE html>
<html>
<head>
	<!-- Bootstrap css -->
	<link rel="stylesheet" href="../css/bootstrap.min.css"> 
	<link rel="stylesheet" href="../css/jquery-ui.min.css">
	<link rel="stylesheet" href="../css/admin.css"> 
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="../js/admin.js"></script>

	<title>Administración de Laberet</title>
</head>
<body>
	<!-- NavBar -->
	<nav class="navbar navbar-inverse .navbar-fixed-top">
	  <div class="container-fluid">
	    <div class="navbar-header">
	    	<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
	        	<span class="icon-bar"></span>
	        	<span class="icon-bar"></span>
	        	<span class="icon-bar"></span> 
	      	</button>
	      <a class="navbar-brand" href="#">Laberet</a>
	    </div>
	    <div class="collapse navbar-collapse" id="myNavbar">
			<ul class="nav navbar-nav">
				<li class="active"><a href="#">Home</a></li>
				<li><a href="#">Historial de ventas.</a></li>
			</ul>
			<ul class="nav navbar-nav navbar-right">
				<li><a href="../salir"><span class="glyphicon glyphicon-log-in"></span> Salir</a></li>
			</ul>
    	</div>
	  </div>
	</nav>
	<!--End  NavBar -->

	<div class="col-md-12">
		<input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for names..">

		<table id="myTable">
		  <tr class="header">
		    <th style="width:10%;"></th>
		    <th style="width:20%;">Pedido</th>
		    <th style="width:30%;">Libros Ordenados</th>
		    <th style="width:40%;">Fecha</th>
		    <th style="width:50%;">Monto</th>
		    <th style="width:30%;">Estatus</th>
		  </tr>
		  <tr>
		    <td>#</td>
		    <td>1</td>
		    <td>12</td>
		    <td>12/10/2017</td>
		    <td>$689.00</td>
		  </tr>
		  <tr>
		    <td>#</td>
		    <td>2</td>
		    <td>56</td>
		    <td>03/09/2017</td>
		    <td>$223.00</td>
		  </tr>
		  <tr>
		    <td>#</td>
		    <td>3</td>
		    <td>4</td>
		    <td>15/10/2017</td>
		    <td>$884.80</td>
		  </tr>
		</table>
		
	</div>
</body>
</html>