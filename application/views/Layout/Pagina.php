
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Panel de Control
        <small>Resúmen del sistema</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard active"></i> <?php echo $titulo; ?></a></li>
      </ol>

    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <!--
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon">
              <i class="fa fa-user"></i>
            </span>
            <div class="info-box-content">
              <span class="info-box-text">Personal</span>
              <span class="info-box-number">
                "<?php echo $Empleados;?>"
                <small>Usuarios Registrados.</small>
              </span>
            </div>
          </div>
        </div>

        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon">
              <i class="fa fa-building-o"></i>
            </span>
            <div class="info-box-content">
              <span class="info-box-text">Dependencias</span>
              <span class="info-box-number">
                "<?php echo $Dependencias;?>"
                <small>Registradas.</small>
              </span>
            </div>
          </div>
        </div>

        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon">
              <i class="fa fa-newspaper-o"></i>
            </span>
            <div class="info-box-content">
              <span class="info-box-text">Noticias</span>
              <span class="info-box-number">
                "<?php echo $Noticias;?>"
                <small>Registradas.</small>
              </span>
            </div>
          </div>
        </div>

        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon">
              <i class="fa fa-calendar"></i>
            </span>
            <div class="info-box-content">
              <span class="info-box-text">Eventos</span>
              <span class="info-box-number">
                "<?php echo $Eventos;?>"
                <small>Registrados.</small>
              </span>
            </div>
          </div>
        </div>

        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon">
              <i class="fa fa-star-o"></i>
            </span>
            <div class="info-box-content">
              <span class="info-box-text">Categorias</span>
              <span class="info-box-number">
                "<?php  echo $Categorias;?>"
                <small>Registradas.</small>
              </span>
            </div>
          </div>
        </div>

        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon">
              <i class="fa fa-commenting-o"></i>
            </span>
            <div class="info-box-content">
              <span class="info-box-text">Comentarios</span>
              <span class="info-box-number">
                "<?php  echo $Comentarios;?>"
                <small>Registrados.</small>
              </span>
            </div>
          </div>
        </div>

        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon">
              <i class="fa fa-folder-open-o"></i>
            </span>
            <div class="info-box-content">
              <span class="info-box-text">Archivos</span>
              <span class="info-box-number">
                "<?php  echo $Comentarios;?>"
                <small>Registrados.</small>
              </span>
            </div>
          </div>
        </div> -->
        <!-- Info Box -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3><?php echo $Empleados;?></h3>

              <p>Usuarios</p>
            </div>
            <div class="icon">
              <i class="fa fa-user"></i>
            </div>
            <a href="<?php echo base_url();?>index.php/Personal" class="small-box-footer">
              Más Información <i class="fa fa-arrow-circle-right"></i>
            </a>
          </div>
        </div>

        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3><?php echo $Dependencias;?></h3>

              <p>Dependencias</p>
            </div>
            <div class="icon">
              <i class="fa fa-building"></i>
            </div>
            <a href="<?php echo base_url();?>index.php/Dependencia" class="small-box-footer">
              Más Información <i class="fa fa-arrow-circle-right"></i>
            </a>
          </div>
        </div>

        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3><?php echo $Noticias;?></h3>

              <p>Noticias</p>
            </div>
            <div class="icon">
              <i class="fa fa-newspaper-o"></i>
            </div>
            <a href="<?php echo base_url();?>index.php/Noticia" class="small-box-footer">
              Más Información <i class="fa fa-arrow-circle-right"></i>
            </a>
          </div>
        </div>

        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3><?php echo $Eventos;?></h3>

              <p>Eventos</p>
            </div>
            <div class="icon">
              <i class="fa fa-calendar"></i>
            </div>
            <a href="<?php echo base_url();?>index.php/Evento" class="small-box-footer">
              Más Información <i class="fa fa-arrow-circle-right"></i>
            </a>
          </div>
        </div>

        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3><?php echo $Categorias;?></h3>

              <p>Categorias</p>
            </div>
            <div class="icon">
              <i class="fa fa-star"></i>
            </div>
            <a href="<?php echo base_url();?>index.php/Categoria" class="small-box-footer">
              Más Información <i class="fa fa-arrow-circle-right"></i>
            </a>
          </div>
        </div>

        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3><?php echo $Comentarios;?></h3>

              <p>Comentarios</p>
            </div>
            <div class="icon">
              <i class="fa fa-commenting"></i>
            </div>
            <a href="<?php echo base_url();?>index.php/Comentario" class="small-box-footer">
              Más Información <i class="fa fa-arrow-circle-right"></i>
            </a>
          </div>
        </div>

        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3><?php echo $Comentarios;?></h3>

              <p>Archivos</p>
            </div>
            <div class="icon">
              <i class="fa fa-folder"></i>
            </div>
            <a href="<?php echo base_url();?>index.php/Archivo" class="small-box-footer">
              Más Información <i class="fa fa-arrow-circle-right"></i>
            </a>
          </div>
        </div>
      </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
