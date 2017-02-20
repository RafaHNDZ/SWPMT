
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Noticias
        <small>Lista de Noticias</small>
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
              <table class="table table-hover table-responsive">
                <tbody><tr>
                  <th>Titulo</th>
                  <th>Dependencia</th>
                  <th>Categoria</th>
                  <th>Opciones</th>
                </tr>
                <?php
                if($Noticias != null){
                  foreach($Noticias as $P){
                ?>
                <tr>
                  <td><?php echo $P->Titulo?></td>
                  <td><?php echo $P->NombreDependencia?></td>
                  <td><?php echo $P->NombreCategoria?></td>
                  <td>
                    <button type="button" onclick="getNew(<?php echo $P->idNoticia; ?>)" class="btn btn-warning">Editar</button>
                  </td>
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
  <!-- /.content-wrapper -->
<script>
    $(function () {
      // Replace the <textarea id="editor1"> with a CKEditor
      // instance, using default configuration.
      CKEDITOR.replace('resumen');
      //bootstrap WYSIHTML5 - text editor
    });
</script>
  <!-- Modal -->
  <div class="modal fade" id="Modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="myModalLabel">Modal title</h4>
        </div>
        <div class="modal-body">
          <form role="form" id="form-update-noticia" action="<?php echo base_url();?>index.php/Noticia/Update" method="POST">
            <div class="box-body">
              <div class="form-group col-xs-12 col-md-4">
                <label for="titulo">Titulo</label>
                <input type="text" class="form-control" id="titulo" name="titulo" placeholder="Titulo" maxlength="60">
                <input type="hidden" name="idN" id="idN" readonly="">
                <p class="help-block">Maximo 45 caracteres</p>
              </div>
              <div class="form-group col-xs-12 col-md-4">
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
              <div class="form-group col-xs-12 col-md-4">
                <label for="categoria">Categoria</label>
                <select class="form-control" id="categoria" name="categoria">
                  <option value="">Escoja Uno</option>
                  <?php
                    if($Categorias != null){
                      foreach($Categorias as $Cat){
                        ?>
                  <option value="<?php echo $Cat->idCategoria;?>"><?php echo $Cat->NombreCategoria;?></option>
                        <?php
                      }
                    }
                  ?>
                </select>
              </div>
              <div class="form-group col-xs-12">
                <label for="resumen">Resumen</label>
                <textarea class="form-control" rows="3" id="resumen" name="resumen" placeholder="Escribe el resumen de la noticia aquí..."></textarea>
              </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
          <button type="submit" class="btn btn-primary">Guardar Cambios</button>
        </div>
          </form>
      </div>
    </div>
  </div>
</div>
<script>
  function getNew(id){
    $.ajax({
      url: '<?php echo base_url();?>index.php/Noticia/GetInfo',
      type: 'POST',
      dataType: 'json',
      data: {idNoticia:id}
    })
    .done(function(response) {
      console.log("success");

      var idN = response[0]['idNoticia'];
      var Contenido = response[0]['Contenido'];
      var Dependencia = response[0]['Dependencia_idDependencia'];
      var Titulo = response[0]['Titulo'];
      var Categoria = response[0]['Categoria_idCategoria'];

      document.getElementById("idN").value = idN;
      document.getElementById("titulo").value = Titulo;
      //document.getElementById("resumen").value = Contenido;
      document.getElementById("categoria").value = Categoria;
      document.getElementById("dependencia").value = Dependencia;
      CKEDITOR.instances["resumen"].setData(Contenido);

      $('#Modal').modal('show');
    })
    .fail(function() {
      console.log("error");
      alert("No se pudo conectar al servidor. \n Intente más tarde...");
    })
    .always(function() {
      console.log("complete");
    });
  }
</script>
