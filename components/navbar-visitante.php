<link rel="stylesheet" href="../css/navbar-vis.css">
<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
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
       
       <div id="list" class="col-lg-10 col-md-10">
          <ul class="nav navbar-nav navbar-right">
                  <?php if($current_page == 'buscar') : ?>
                    <li class="active"><a href="">Catálogo</a></li>
                  <?php else: ?>
                    <li><a href="../buscar">Catálogo</a></li>
                  <?php endif; ?>
                  
                  <li><a href="../librerias">Librerías</a></li>

                  <?php if($current_page == 'registrarse') : ?>
                    <li class="active"><a href="">Registrarse</a></li><li>
                  <?php else: ?>
                    <li><a href="../registrarse">Registrarse</a></li>
                  <li>
                  <?php endif; ?>
                  
                    <p class="navbar-btn">
                      <?php if($current_page == 'inicio_sesion') : ?>
                        <a href="" class="btn btn-success">Iniciar Sesión</a>

                      <?php else: ?>
                        <a href="../inicioSesion" class="btn btn-success">Iniciar Sesión</a>
                      <?php endif; ?>
                      
                    </p>
                  </li> 
        </ul>
       </div>
        
      </div><!-- /.navbar-collapse -->
  </nav> <!-- END NAV -->