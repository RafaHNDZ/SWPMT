  <header class="main-header">
    <!-- Logo -->
  <?php if(!$this->session->userdata('login_status') == false){?>
    <a href="<?php echo base_url();?>" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>T</b>Gto</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Tarimoro</b> GTO</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a>
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Messages: style can be found in dropdown.less-->
          <!-- Notifications: style can be found in dropdown.less -->
        <?php if($browser != "Chrome" and $browser != "Opera"){ ?>
          <li class="dropdown notifications-menu">
            <a class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-flag" data-toggle="tooltip" data-placement="bottom" title="Notificaciones del Sistema"></i>
              <span class="label label-danger">!</span>
            </a>
            <ul class="dropdown-menu">
              <li class="header">Notificaciones del Sistema</li>
              <li>
                <!-- inner menu: contains the actual data -->
                <ul class="menu">
                  <li>
                    <a>
                      <i class="fa fa-warning" data-toggle="tooltip" data-placement="bottom" title="El navegador <?php echo $browser; ?> no es compatible"></i> Descarga Google Chrome u Opera.
                    </a>
                  </li>
                </ul>
              </li>
              <li class="footer"><a href="#">View all</a></li>
            </ul>
          </li>
        <?php } ?>
          <!-- User Account: style can be found in dropdown.less -->
          <li class="user-header">
            <?php if($this->session->userdata('Img_Usuario') == null){
              $Img_Usuario = "default_avatar.png";
            }else{
              $Img_Usuario = $this->session->userdata('Img_Usuario');
            } ?>
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="<?php echo base_url();?>assets/uploads/images/<?php echo $Img_Usuario;?>" class="user-image" alt="User Image">
              <span class="hidden-xs"><?php echo $this->session->userdata('Nombre');?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="<?php echo base_url();?>assets/uploads/images/<?php echo $Img_Usuario;?>" class="img-circle" alt="User Image">
                <p>
                  <?php echo $this->session->userdata('Nombre');?> - Web Developer
                  <small>Member since Nov. 2012</small>
                </p>
              </li>
              <!-- Menu Body
              <li class="user-body">
                <div class="row">
                  <div class="col-xs-4 text-center">
                    <a href="#">Followers</a>
                  </div>
                  <div class="col-xs-4 text-center">
                    <a href="#">Sales</a>
                  </div>
                  <div class="col-xs-4 text-center">
                    <a href="#">Friends</a>
                  </div>
                </div>
              </li>
              -->
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                    <a href="<?php echo base_url();?>index.php/Personal/Perfil/<?php echo $this->session->userdata('idUsuario') ?>" class="btn btn-default btn-flat" type="submit">Perfil</a>
                </div>
                <div class="pull-right">
                  <a href="<?php echo base_url();?>index.php/Login/LogOut" class="btn btn-default btn-flat">Cerrar Sesión</a>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
          <li>
          <!--
            <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
            -->
          </li>
        </ul>
      </div>
    </nav>
  <?php } ?>
  </header>
