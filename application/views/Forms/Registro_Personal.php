
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Registro de Empleado
        <small>Rellene el Formulario.</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url();?>"><i class="fa fa-dashboard"></i> Panel de Control</a></li>
        <li><a href="<?php echo base_url();?>index.php/Personal">Personal</a></li>
        <li class="active"><?php echo $titulo; ?></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
      <!-- Caja Formulario -->
        <div class="col-md-4 col-md-offset-4">
          <div class="box box-primary">
            <div class="box-header with-border" style="text-align: center;">
              <h3 class="box-title">Nuevo Empleado</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" id="form" action="<?php echo base_url();?>index.php/Personal/Guardar" method="POST" enctype="multipart/form-data">
              <div class="box-body">
                <div class="form-group">
                  <label for="nombre">Nombre</label>
                  <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre" maxlength="60">
                  <p class="help-block">Maximo 60 caracteres</p>
                </div>
                <div class="form-group">
                  <label for="email">E-Mail</label>
                  <input type="email" class="form-control" id="email" name="email" placeholder="E-Mail" maxlength="45">
                  <p class="help-block">Maximo 45 caracteres</p>
                </div>
                <div class="form-group">
                  <label for="pass">Contraseña</label>
                  <input type="password" class="form-control" id="pass" name="pass" placeholder="Contraseña" maxlength="45">
                  <p class="help-block">Maximo 45 caracteres</p>
                </div>
                <div class="form-group">
                  <label for="img_usuario">Foto de Perfil</label>
                  <input type="file" name="img_usuario" id="img_usuario">
                  <p class="help-block">Formato png o jpg. Maximo 2 Mb.</p>
                </div>
                <div class="form-group">
                  <label>Estado</label>
                  <select class="form-control" id="estado" name="estado">
                    <option value="">Escoja Uno</option>
                    <option value="1">Activo</option>
                    <option value="2">Inactivo</option>
                  </select>
                </div>
                <div class="form-group">
                  <label>Dependencia</label>
                  <select class="form-control" id="dependencia" name="dependencia">
                    <option value="">Escoja Uno</option>
                    <?php
                      if($Dependencias != null){
                        foreach($Dependencias as $Depe){
                          ?>
                    <option value="<?php echo $Depe->idDependencia;?>"><?php echo $Depe->NombreDependencia;?></option>
                          <?php
                        }
                      }
                    ?>
                  </select>
                </div>
              </div>
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="" class="btn btn-warning pull-lefth">Cancelar</button>
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
