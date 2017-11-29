<link rel="stylesheet" href="../css/navbar-user.css">
<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
	  <!-- Brand and toggle get grouped for better mobile display -->
	  <div class="navbar-header col-lg-2 col-md-2 col-sm-2">
	    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
	      <span class="sr-only">Toggle navigation</span>
	      <span class="icon-bar"></span>
	      <span class="icon-bar"></span>
	      <span class="icon-bar"></span>
	    </button>
	    <a class="navbar-brand navbar-left" href="../"><img id="icon" src="../img/logo.png" alt=""></a>
		<!-- <a class="navbar-brand navbar-left laberet" href="#"><b>LABERET</b></a> -->
	  </div>

	  <!-- Collect the nav links, forms, and other content for toggling -->
	  <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
	    <div id="list" class="">
	    	<ul class="nav navbar-nav navbar-right">
		   	  	
		   	  <li id="cart"><a href="../carrito"><img src="../img/white-cart.png" alt=""><b>(<?php echo count($_SESSION['carrito'])?>)</b></a></li>
		   	  <li><a href="../buscar">Catálogo</a></li>
		   	  <li><a href="../librerias">Librerías</a></li>
		      <li><a href="../pedidosEspeciales">Pedidos Especiales</a></li>
		      
		      <li class="dropdown">
		        <a href="" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-cog"><b class="caret"></b></a>
		        <ul class="dropdown-menu">
		          <li><a href="../editarPerfil">Configurar Cuenta</a></li>
		          <li><a href="../historialCompras">Historial de Compras</a></li>
		          <li class="divider"></li>
		          <li><a href="../salir">Salir</a></li>
		        </ul>
		      </li>
			</ul>
	    </div>	
	    
	  </div><!-- /.navbar-collapse -->
</nav> <!-- END NAV -->
