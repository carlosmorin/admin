 
 <header class="main-header">
    <!-- Logo -->
    <a href="<?= URL?>dashboard" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>HDF</b></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg nopad"><b> HOTEL DON FELIPE</b></span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
       <i class="fas fa-bars"></i>

      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle shadow" data-toggle="dropdown">
              <i class="fas fa-user-circle"></i>
              <span class="hidden-xs"><?= $_SESSION['user'][0]['name']?></span>
            </a>
            <ul class="dropdown-menu animated flipInY">
              <!-- User image -->
              <li class="user-header u-color">
                <!-- <i class="fas fa-user-circle"></i>-->
                <div class="user-box">
                  <div class="u-img">
                    <img class="img-thumbnail" src="<?=URL_IMG?>profile-avatar.png">
                  </div>
                  <div class="u-text">

                  </div>               
                </div>
              </li>
              <li class="divider" role="separator"></li>
              
              <li>
                <a href="<?=URL?>profile?mail=<?=$_SESSION['user'][0]['mail']?>">Perfil <i class="fas fa-user"></i></a>
              </li>

              <li class="divider" role="separator"></li>
              <li>
                <a href="<?=URL?>login/logout">Salir <i class="fas fa-power-off"></i></a>
              </li>  
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
        </ul>
      </div>
    </nav>
 </header>

<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar slimScrollDiv">

      <!-- Sidebar user panel (optional) -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?= URL_IMG ?>/logo.jpg" class="img-circle" alt="User Image">
          <span style="font-size: 12px; color: #fff; text-align: left; padding-left: 10px;">
            <?= $_SESSION['user'][0]['mail'] ?>
          </span>
        </div>
      
      </div>
      
      <!-- Sidebar Menu -->
	    <ul class="sidebar-menu" data-widget="tree">
  			<li>
          <a href="<?=URL?>users/">
            <i class="far fa-circle"></i> <span>Usuarios</span>
          </a>
        </li>
        <li>
          <a href="<?=URL?>rooms/">
            <i class="far fa-circle"></i> <span>Habitaciones</span>
          </a>
        </li>

        <li>
          <a href="<?=URL?>events/">
            <i class="far fa-circle"></i> <span>Eventos</span>
          </a>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-cog"></i> <span>Catalogos</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?=URL?>extras/">Extras</a></li>
            <li><a href="<?=URL?>beds/">Camas</a></li>
            <li><a href="<?=URL?>entertainment/">Entretenimiento</a></li>
            <li><a href="<?=URL?>spaces/">Espacios</a></li>
          </ul>
        </li>
        <li>
          <a href="<?=URL?>contact_messages/">
            <i class="far fa-circle"></i> <span>Mensajes de contacto</span>
          </a>
        </li>
        <li>
          <a href="<?=URL?>login/logout/">
            <i class="far fa-circle icon"></i> <span>Salir</span>
          </a>
        </li>
    	</ul>
      <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>


<!-- contenedor pull-right-containercipal para todas las paginas -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="clear"> </div>
    <div class="clear"> </div>
    <div class="clear"> </div>
    <div class="clear"> </div>


