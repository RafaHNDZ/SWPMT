
  <!-- =============================================== -->

  <!-- Left side column. contains the sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
  <?php if(!$this->session->userdata('login_status') == false){?>
    <section class="sidebar">
      <!-- Sidebar user panel
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?php echo base_url();?>assets/img/user2-160x160.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php echo $this->session->userdata('Nombre');?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
       search form
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
       /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        <li class="header">Menú Principals</li>
        <li class="treeview">
          <a href="<?php echo base_url();?>index.php/Admin">
            <i class="fa fa-dashboard"></i> <span>Panel de Control</span>
          </a>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-user"></i>
            <span>Personal</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url();?>index.php/Personal/RegistroPersonal"><i class="fa fa-user-plus"></i> Registrar Personal</a></li>
            <li><a href="<?php echo base_url();?>index.php/Personal"><i class="fa fa-list-ol"></i> Lista de Personal</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-building"></i>
            <span>Dependencias</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url();?>index.php/Dependencia/Registro_Dependencia"><i class="fa fa-plus-circle"></i> Registrar Dependencia</a></li>
            <li><a href="<?php echo base_url();?>index.php/Dependencia/"><i class="fa fa-list-ol"></i> Lista de Dependencias</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-newspaper-o"></i>
            <span>Noticias</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url();?>index.php/Noticia/Registro_Noticia"><i class="fa fa-plus-circle"></i>Registrar Noticia</a></li>
            <li><a href="<?php echo base_url();?>index.php/Noticia"><i class="fa fa-list-ol"></i> Lista de Noticia</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-calendar"></i>
            <span>Eventos</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url();?>index.php/Evento/Registro_Evento"><i class="fa fa-plus-circle"></i> Registrar Evento</a></li>
            <li><a href="<?php echo base_url();?>index.php/Evento"><i class="fa fa-list-ol"></i> Lista de Evento</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-star-o"></i>
            <span>Categorias</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url();?>index.php/Categoria/Registro_Categoria"><i class="fa fa-plus-circle"></i> Registrar Categoria</a></li>
            <li><a href="<?php echo base_url();?>index.php/Categoria"><i class="fa fa-list-ol"></i> Lista de Categorias</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-commenting-o"></i>
            <span>Comentarios</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <!--<li><a href="../UI/general.html"><i class="fa fa-plus-circle"></i> Registrar Categoria</a></li> -->
            <li><a href="../UI/icons.html"><i class="fa fa-list-ol"></i> Lista de Categorias</a></li>
          </ul>
        </li>
      </ul>
    </section>
  <?php } ?>
    <!-- /.sidebar -->
  </aside>
