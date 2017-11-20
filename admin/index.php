<?php 
	include_once '../lib/LibroVendido.php';
	include_once '../lib/Busqueda.php';
 ?>

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
	      <a class="navbar-brand" href="#">Historial de Ventas.</a>
	    </div>
	    <div class="collapse navbar-collapse" id="myNavbar">
	    	<!--
			<ul class="nav navbar-nav">
				<li class="active"><a href="#">Home</a></li>
				<li><a href="#">Historial de ventas.</a></li>
			</ul> -->
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
		    <th style="width:5%;"></th>
		    <th style="width:10%;">Pedido</th>
		    <th style="width:20%;">Libros Ordenados</th>
		    <th style="width:20%;">Fecha</th>
		    <th style="width:10%;">Monto</th>
		    <th style="width:60%;">Estatus</th>
		  </tr>
		  	<!-- Para llenar la tabla -->
		    <?php  
				$query = Busqueda::getPedidos();
				if ($query) {
					while ($row = mysqli_fetch_array($query)){
						$status =  $row["status"];
						if ($status == "1") {
						 	$color = "'verde'";
						 	$status = "ENTREGADO";
						} else {
							$color = "'rojo'";
							$status = "NO ENTREGADO";
						} 
						?> 
						<tr class=<?php  echo $color;?> >
						    <td onclick="detalle(<?php echo $row["id"];?>)" ><span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span></td>
						    <td><?php echo $row["id"]; ?> </td>
						    <td><?php echo $row["libros"]; ?></td>
						    <!--<td><?php ; ?></td> -->
						    <td>22/07/2023</td>
						    <td>$ <?php echo $row["precio"]; ?></td>
						    <td><?php echo $status; ?></td>
						</tr>
						<?php
					}
				} else {
					?>
					<h1>No hay Datos Aún</h1> 
					<?php  
				}
			?>
		</table>
		
	</div>

	<!-- Modal -->
	<div id="myModal" class="modal fade" role="dialog">
	  <div class="modal-dialog">

	    <!-- Modal content-->
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal">&times;</button>
	        <h3 class="modal-title" style="text-align: center">Libros Pertenecientes al Pedido</h3>
	      </div>
	      <div class="modal-body">
	        <table id="tablaLibros"> </table>
			<table id="tablaPrecio">
			  <tr class="header">
			    <th id="total" style="width:50%; text-align: right;"></th>
			  </tr>
			</table>
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-success" data-dismiss="modal">Cerrar</button>
	      </div>
	    </div>

	  </div>
	</div>
</body>
</html>