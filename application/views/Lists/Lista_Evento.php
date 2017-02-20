
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Lista de Eventos
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
              <h3 class="box-title">Eventos Dentro del Sistema</h3>

              <div class="box-tools">
                <div class="input-group input-group-sm" style="width: 150px;">
                  <input type="text" name="table_search" class="form-control pull-right" placeholder="Buscar...">

                  <div class="input-group-btn">
                    <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                  </div>
                </div>
              </div>
            </div>
            <!-- /.box-header -->
            <?php
            if($Eventos != null){
              ?>
            <div class="box-body table-responsive no-padding">
              <table class="table table-hover">
                <tbody><tr>
                  <th>ID</th>
                  <th>Titulo</th>
                  <th>Dependencia</th>
                  <th>Categoria</th>
                  <th>Fecha</th>
                  <th>Opciones</th>
                </tr>
                <?php
                  foreach($Eventos as $E){
                ?>
                <tr>
                  <td><?php echo $E->idEvento?></td>
                  <td><?php echo $E->Nombre?></td>
                  <td><?php echo $E->NombreDependencia?></td>
                  <td><?php echo $E->NombreCategoria?></td>
                  <td><?php echo $E->Fecha;?></td>
                  <td>
                    <button type="button" name="button" class="btn btn-warning">Editar</button>
                    <button type="button" name="button" class="btn btn-danger">Borrar</button>
                  </td>
                </tr>
                <?php
                }}else{
                  ?>
                  <div class="callout callout-info">
                    <h4>Sin Registros</h4>
                    <p>La lista de eventos esta vacia.</p>
                  </div>
                  <?php
                }
                ?>
              </tbody>
              </table>
                <ul class="pagination">
                <?php
                  /* Se imprimen los números de página */
                  echo $this->pagination->create_links();
                ?>
                </ul>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
      </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
