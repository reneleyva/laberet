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
	    	<ul class="nav navbar-nav navbar-left">
		   	  
		   	  <?php if($current_page == 'inicio'): ?>
		   	  	<li class="active"><a href>Inicio</a></li>	
		   	  <?php else: ?>
		   	  	<li><a href="index.php">Inicio</a></li>
		   	  <?php endif; ?>
		   	  <?php if($current_page == 'agregarLibreria'): ?>
		   	  	<li class="active"><a href>Agregar Libreria</a></li>	
		   	  <?php else: ?>
		   	  	<li><a href="agregarLibreria.php">Agregar Libreria</a></li>
		   	  <?php endif; ?>
		   	  
		      
			</ul>
			<ul class="nav navbar-nav navbar-right">
		   	  	
		   	  <li><a href="../salir"><span class="glyphicon glyphicon-log-out"></span> Salir</a></li>
		      
			</ul>
	    </div>	
	    
	  </div><!-- /.navbar-collapse -->
</nav> <!-- END NAV -->
