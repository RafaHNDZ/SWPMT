
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Registro de Noticia
        <small>Rellene el Formulario.</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url();?>"><i class="fa fa-dashboard"></i> Panel de Control</a></li>
        <li><a href="<?php echo base_url();?>index.php/Noticia">Noticias</a></li>
        <li class="active"><?php echo $titulo; ?></li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="row">
      <!-- Caja Formulario -->
        <div class="col-md-10 col-md-offset-1">
          <div class="box box-primary">
            <div class="box-header with-border" style="text-align: center;">
              <h3 class="box-title">Nueva Noticia</h3>
            </div>
            <div class="alert alert-danger" id="msg-error" style="text-align: left;">
              <strong>¡Importante!</strong> Corregir los siguientes errores:
              <div class="list-errors"></div>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" id="form" action="<?php echo base_url();?>index.php/Noticia/Guardar" method="POST">
              <div class="box-body">
                <div class="form-group col-xs-12 col-md-4">
                  <label for="titulo">Titulo</label>
                  <input type="text" class="form-control" id="titulo" name="titulo" placeholder="Titulo" maxlength="60">
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
                  <p class="help-block">Maximo 200 caracteres.</p>
                </div>
              <div class="box-footer">
                <div class="col-xs-12">
                  <div class="alert alert-success" id="msg-ok">
                    <strong>Guardado.</strong> El registro se guardo.
                  </div>
                </div>
                <div class="col-xs-12">
                  <button type="submit" class="btn btn-warning pull-lefth">Cancelar</button>
                  <button type="submit" class="btn btn-success pull-right">Registrar</button>
                </div>
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
  <script>
    $(function () {
      // Replace the <textarea id="editor1"> with a CKEditor
      // instance, using default configuration.
      CKEDITOR.replace('resumen');
      //bootstrap WYSIHTML5 - text editor
      /*$("#input-4").fileinput({
        showCaption: false,
        maxFileCount: 10,
        mainClass: "input-group-lg",
        language: "es"
      }); */
    });
  </script>
