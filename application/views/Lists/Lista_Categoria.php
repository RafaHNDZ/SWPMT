
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Lista de Dependencias
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url();?>"><i class="fa fa-dashboard"></i> Panel de Control</a></li>
        <li class="active"><?php echo $titulo; ?></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
      <!-- Caja Formulario -->
        <div class="col-md-10 col-md-offset-1">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Dependencias Dentro del Sistema</h3>

              <div class="box-tools">
                <div class="input-group input-group-sm" style="width: 150px;">
                </div>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table class="table table-hover">
                <tbody><tr>
                  <th>ID</th>
                  <th>Nombre</th>
                </tr>
                <?php
                if($Categorias != null){
                  foreach($Categorias as $C){
                ?>
                <tr>
                  <td><?php echo $C->idCategoria?></td>
                  <td><?php echo $C->NombreCategoria?></td>
                </tr>
                <?php
                }}else{

                }
                ?>
              </tbody>
              </table>
            </div>
            <!-- /.box-body -->
            <div class="box-footer clearfix">
                <ul class="pagination pagination-sm no-margin pull-right">
                <?php
                  /* Se imprimen los números de página */
                  echo $this->pagination->create_links();
                ?>
                </ul>
            </div>
          </div>
          <!-- /.box -->
        </div>
      </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
