<link rel="stylesheet" href="../css/navbar-libreria.css">	
<nav class="<?php if($current_page == 'buscar') {echo "navbar-fixed-top ";} ?>navbar navbar-default" role="navigation">
	  <!-- Brand and toggle get grouped for better mobile display -->
	  <div class="navbar-header col-lg-2 col-md-2">
	    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#collapse-target">
	      <span class="sr-only">Toggle navigation</span>
	      <span class="icon-bar"></span>
	      <span class="icon-bar"></span>
	      <span class="icon-bar"></span>
	    </button>
	    <a class="navbar-brand navbar-left" href="../"><img id="icon" src="../img/logo.png" alt=""></a>
		<!-- <a class="navbar-brand navbar-left laberet" href="#"><b>LABERET</b></a> -->
	  </div>

	  <!-- Collect the nav links, forms, and other content for toggling -->
	  <div class="collapse navbar-collapse" id="collapse-target">
	   
	   <div id="list" class="col-lg-9 col-md-9">
	   		<ul class="nav navbar-nav navbar-left">
	   			<?php if($current_page == 'inicio'):   ?>
					<li class="active"><a href>Inicio</a></li>
				<?php else: ?>
					<li><a href="../homeLibreria">Inicio</a></li>
				<?php endif; ?>

				<?php if($current_page == 'agregarLibro'): ?>
					<li class="active"><a href>Agregar Libro</a></li>
				<?php else: ?>
					<li><a href="../agregarLibro">Agregar Libro</a></li>
				<?php endif; ?>

				
				<li><a href="#">Ventas</a></li>
				<li><a href="#">Pedidos Especiales</a></li>

				<?php if($current_page == 'buscar'): ?>
					<li class="active"><a href>Catálogo Universal</a></li>
				<?php else: ?>
					<li><a href="../buscar">Catálogo Universal</a></li>
				<?php endif; ?>
			</ul>
	   </div>

	    <div id="drop" class="col-lg-1 col-md-1">

	    	<ul class="nav navbar-nav navbar-right">
		      <li class="dropdown">
		        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-cog"><b class="caret"></b></span> </a>
		        <ul class="dropdown-menu">
		          <li><a href="../editarPerfilLibreria">Configurar Cuenta</a></li>
		          <li><a href="#">Historial de Ventas</a></li>
		          <li class="divider"></li>
		          <li><a href="../salir">Salir</a></li>
		        </ul>
		      </li>
			</ul>
	    </div>	
	    
	  </div><!-- /.navbar-collapse -->
</nav> <!-- END NAV -->