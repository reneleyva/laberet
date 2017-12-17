<?php 
	include_once '../lib/LibroVendido.php';
	include_once '../lib/Busqueda.php';
	//Revisa la sesión
	session_start();
	if (!isset($_SESSION['tipo'])) {
		//NO ha iniciado sesión
		header("location: ../");
	} else if ($_SESSION['tipo'] != 'admin') {
		//No es una libreria
		header("location: ../");	
	}
 ?>

<!DOCTYPE html>
<html>
<head>
	<!-- Bootstrap css -->
	<link rel="stylesheet" href="../css/admin.css"> 
	<link rel="stylesheet" href="../css/bootstrap.min.css"> 	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="../js/admin.js"></script>

	<title>Administración de Laberet</title>
</head>
<body>
	
	<?php 
	$current_page = 'inicio';
	include '../components/navbar-admin.php'; ?>
	<div class="container" style="margin-top: 100px;">
		
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
						    <td><?php echo $row["fecha"]; ?></td>
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