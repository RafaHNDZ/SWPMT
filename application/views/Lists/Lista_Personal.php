
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Lista de Personal
        <small>Relene el Formulario.</small>
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
              <h3 class="box-title">Personal Dentro del Sistema</h3>

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
            <div class="box-body">
              <table class="table table-hover table-bordered">
                <tbody><tr>
                  <th>Nombre</th>
                  <th>Dependencia</th>
                  <th>Status</th>
                  <th>Tipo</th>
                  <th>Opciones</th>
                </tr>
                <?php
                if($Personal != null){
                  foreach($Personal as $P){
                ?>
                <tr>
                  <td><?php echo $P->Nombre?></td>
                  <td><?php echo $P->NombreDependencia?></td>
                  <td>
                    <?php
                      switch ($P->Estatus) {
                        case '1':
                          echo '<span class="label label-success">Activo</span>';
                          break;

                        default:
                          echo '<span class="label label-warning">Inactivo</span>';
                          break;
                      }
                    ?>
                  </td>
                  <td>
                    <?php
                      switch ($P->Tipo) {
                        case '1':
                          echo '<span class="label label-danger">Super Administrador</span>';
                          break;

                        default:
                          echo '<span class="label label-success">Personal</span>';
                          break;
                      }
                    ?>
                  </td>
                  <th>
                      <button class="btn btn-warning" id="btn-edit-user" onclick="editUsuer(<?php echo $P->idUsuario; ?>)">Editar</button>
                      <a href="<?php echo base_url();?>index.php/Personal/Perfil/<?php echo $P->idUsuario; ?>" class="btn btn-default" type="submit">Perfil</a>
                  </th>
                </tr>
                <?php
                }}else{

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
  <!-- Modal -->
  <div class="modal fade" id="Modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="myModalLabel">Formulario de Actualización</h4>
        </div>
        <div class="modal-body">
          <form role="form" id="form-update-empleado" action="<?php echo base_url();?>index.php/Personal/Update" method="POST">
            <div class="box-body">
              <div class="form-group">
                <label for="nombre">Nombre</label>
                <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre" maxlength="60">
                <input type="hidden" name="idUsuario" id="idUsuario" value="">
                <p class="help-block">Maximo 60 caracteres</p>
              </div>
              <div class="form-group">
                <label for="email">E-Mail</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="E-Mail" maxlength="45">
                <p class="help-block">Maximo 45 caracteres</p>
              </div>
              <div class="form-group">
                <label for="pass">Contraseña</label>
                <input type="password" class="form-control" id="pass" name="pass" placeholder="Sin Cambios" maxlength="45">
                <p class="help-block">Maximo 45 caracteres</p>
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
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
          <button type="submit" id="btn-save" data-loading-text="<i class='fa fa-circle-o-notch fa-spin'></i> Procesando..." class="btn btn-primary">Guardar Cambios</button>
        </form>
        <div class="alert alert-danger" id="msg-error" style="text-align: left;">
          <strong>¡Importante!</strong>Corregir los siguientes errores:
          <div class="list-errors"></div>
        </div>
        </div>
      </div>
    </div>
  </div>
  <!-- /.content-wrapper -->
  <script>

  $("#msg-error").hide();

  function editUsuer(id){
    $.ajax({
      url: '<?php echo base_url();?>index.php/Personal/GetInfo',
      type: 'POST',
      dataType: 'json',
      data: {idUsuario:id}
    })
    .done(function(response) {
      console.log("success");
      //alert(response[0]['Nombre']);
      var idUsuario = response[0]['idUsuario'];
      var Nombre = response[0]['Nombre'];
      var Email = response[0]['Email'];
      var Estatus  = response[0]['Estatus'];
      var Password = response[0]['Password'];
      var Tipo = response[0]['Tipo'];
      var Dependencia = response[0]['Dependencia_idDependencia'];

      document.getElementById("nombre").value = Nombre;
      document.getElementById("email").value = Email;
      document.getElementById("estado").value = Estatus;
      document.getElementById("dependencia").value = Dependencia;
      document.getElementById("idUsuario").value = idUsuario;

      $('#Modal').modal({
        show:true
      });
    })
    .fail(function() {
      console.log("error");
      alert("Intente nuevamente mas tarde");
    })
    .always(function() {
      console.log("complete");
    });

  }
  </script>
