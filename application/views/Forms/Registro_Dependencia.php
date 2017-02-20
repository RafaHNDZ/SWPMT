
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Registro de Dependencia
        <small>Rellene el Formulario.</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url();?>"><i class="fa fa-dashboard"></i> Panel de Control</a></li>
        <li><a href="<?php echo base_url();?>index.php/Dependencia">Dependencias</a></li>
        <li class="active"><?php echo $titulo ?></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
      <!-- Caja Formulario -->
        <div class="col-md-4 col-md-offset-4">
          <div class="box box-primary">
            <div class="box-header with-border" style="text-align: center;">
              <h3 class="box-title">Nueva Dependencia</h3>
            </div>
            <div class="alert alert-danger" id="msg-error" style="text-align: left;">
              <strong>¡Importante!</strong> Corregir los siguientes errores:
              <div class="list-errors"></div>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" id="form-dependencia" action="<?php echo base_url();?>index.php/Dependencia/Guardar" method="POST">
              <div class="box-body">
                <div class="form-group">
                  <label for="nombre">Nombre</label>
                  <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre" maxlength="60">
                  <p class="help-block">Maximo 45 caracteres</p>
                </div>
              <div class="box-footer">
                <div class="col-xs-12">
                  <div class="alert alert-success" id="msg-ok">
                    <strong>Guardado.</strong> El registro se guardo.
                  </div>
                </div>
                <button type="submit" class="btn btn-warning pull-lefth">Cancelar</button>
                <button type="submit" class="btn btn-success pull-right">Registrar</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
    <!-- Functions JS -->
  <script  src="<?php echo base_url();?>assets/js/Functions.js"></script>
