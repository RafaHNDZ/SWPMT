<div class="content-wrapper" style="min-height: 1111px;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
      <?php //echo var_dump($EmpleadoInfo); ?>
        Perfil de Empleado
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url();?>"><i class="fa fa-dashboard"></i> Panel de Control</a></li>
        <li><a href="<?php echo base_url();?>/index.php/Personal">Personal</a></li>
        <li class="active"><?php echo $titulo ?></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <div class="row">
        <div class="col-md-3">
            <?php if($EmpleadoInfo[0]->Img_Usuario == null){
              $Img_Usuario = "default_avatar.png";
            }else{
              $Img_Usuario = $EmpleadoInfo[0]->Img_Usuario;
            } ?>
          <!-- Profile Image -->
          <div class="box box-primary">
            <div class="box-body box-profile">
              <img class="profile-user-img img-responsive img-circle" src="<?php echo base_url();?>assets/uploads/images/<?php echo $Img_Usuario;?>" alt="User profile picture">

              <h3 class="profile-username text-center"><?php echo $EmpleadoInfo[0]->Nombre; ?></h3>

              <p class="text-muted text-center"><?php echo $EmpleadoInfo[0]->NombreDependencia; ?></p>

              <ul class="list-group list-group-unbordered">
                <li class="list-group-item">
                  <b>Noticias</b> <a class="pull-right"><?php echo $NewsPosted; ?></a>
                </li>
                <li class="list-group-item">
                  <b>Eventos</b> <a class="pull-right"><?php echo $EventsPosted; ?></a>
                </li>
              </ul>
              <!--
              <a href="#" class="btn btn-primary btn-block"><b>Follow</b></a>
              -->
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

          <!-- About Me Box -->
          <div class="box box-primary collapsed-box">
            <div class="box-header with-border">
              <h3 class="box-title">Acerca de Mi</h3>
              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse">
                  <i class="fa fa-plus"></i>
                </button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <strong><i class="fa fa-book margin-r-5"></i> Education</strong>

              <p class="text-muted">
                B.S. in Computer Science from the University of Tennessee at Knoxville
              </p>

              <hr>

              <strong><i class="fa fa-map-marker margin-r-5"></i> Location</strong>

              <p class="text-muted">Malibu, California</p>

              <hr>

              <strong><i class="fa fa-pencil margin-r-5"></i> Skills</strong>

              <p>
                <span class="label label-danger">UI Design</span>
                <span class="label label-success">Coding</span>
                <span class="label label-info">Javascript</span>
                <span class="label label-warning">PHP</span>
                <span class="label label-primary">Node.js</span>
              </p>

              <hr>

              <strong><i class="fa fa-file-text-o margin-r-5"></i> Notes</strong>

              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam fermentum enim neque.</p>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
        <div class="col-md-9">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#activity" data-toggle="tab">Actividad</a></li>
              <li><a href="#timeline" data-toggle="tab" onclick="loadTimeLine(<?php echo $EmpleadoInfo[0]->idUsuario;?>)">Timeline</a></li>
              <li><a href="#settings" data-toggle="tab">Configuración</a></li>
              <li><a href="#info" data-toggle="tab">Información</a></li>
            </ul>
            <div class="tab-content">
              <div class="active tab-pane" id="activity">
                <!-- Post -->
                <div class="post">
                  <div class="user-block">
                    <img class="img-circle img-bordered-sm" src="<?php echo base_url();?>/assets//img/user1-128x128.jpg" alt="user image">
                        <span class="username">
                          <a href="#">Jonathan Burke Jr.</a>
                          <a href="#" class="pull-right btn-box-tool"><i class="fa fa-times"></i></a>
                        </span>
                    <span class="description">Shared publicly - 7:30 PM today</span>
                  </div>
                  <!-- /.user-block -->
                  <p>
                    Lorem ipsum represents a long-held tradition for designers,
                    typographers and the like. Some people hate it and argue for
                    its demise, but others ignore the hate as they create awesome
                    tools to help create filler text for everyone from bacon lovers
                    to Charlie Sheen fans.
                  </p>
                  <ul class="list-inline">
                    <li><a href="#" class="link-black text-sm"><i class="fa fa-share margin-r-5"></i> Share</a></li>
                    <li><a href="#" class="link-black text-sm"><i class="fa fa-thumbs-o-up margin-r-5"></i> Like</a>
                    </li>
                    <li class="pull-right">
                      <a href="#" class="link-black text-sm"><i class="fa fa-comments-o margin-r-5"></i> Comments
                        (5)</a></li>
                  </ul>

                  <input class="form-control input-sm" type="text" placeholder="Type a comment">
                </div>
                <!-- /.post -->
              </div>
              <!-- /.tab-pane -->
              <div class="tab-pane" id="timeline">
                <!-- The timeline -->
                <div class="row">
                  <div id="timeline">
                  </div>
                </div>
              </div>
              <!-- /.tab-pane -->

              <div class="tab-pane" id="settings">
                <div class="row">
                  <div class="col-sm-8">
                    <form class="form-horizontal" id="form-update-empleado" action="<?php echo base_url();?>index.php/Personal/Update" method="post">
                      <div class="form-group">
                        <label for="nombre" class="col-sm-2 control-label">Nombre</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre" maxlength="60" value="<?php echo $EmpleadoInfo[0]->Nombre;?>" onchange="button();">
                          <input type="hidden" name="idUsuario" id="idUsuario" value="<?php echo $EmpleadoInfo[0]->idUsuario;?>">
                          <p class="help-block">Maximo 60 caracteres</p>
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="email" class="col-sm-2 control-label">E-Mail</label>

                        <div class="col-sm-10">
                          <input type="email" class="form-control" name="email" id="email" placeholder="Email" value="<?php echo $EmpleadoInfo[0]->Email;?>">
                          <p class="help-block">Maximo 60 caracteres</p>
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="pass" class="col-sm-2 control-label">Contraseña</label>
                        <div class="col-sm-10">
                          <input type="password" class="form-control" name="pass" id="pass" placeholder="Sin Cambios">
                          <p class="help-block">Maximo 45 caracteres</p>
                        </div>
                      </div>
                      <div class="form-group">
                        <input type="hidden" name="dependencia" id="dependencia" value="<?php echo $EmpleadoInfo[0]->Dependencia_idDependencia;?>" readonly>
                        <input type="hidden" name="estado" id="estado" value="<?php echo $EmpleadoInfo[0]->Estatus;?>" readonly>
                      </div>
                      <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                          <button type="submit" id="btn-save" disabled class="btn btn-success">Guardar</button>
                        </div>
                      </div>
                    </form>
                  </div>
                  <!-- Panel de Avatar -->
                  <div class="col-sm-4">
                    <div id="kv-avatar-errors-1" class="center-block" style="width:800px;display:none"></div>
                    <form class="text-center" action="/avatar_upload.php" method="post" enctype="multipart/form-data">
                        <div class="kv-avatar center-block" style="width:200px">
                            <input id="avatar-1" name="avatar-1" type="file" class="file-loading">
                        </div>
                        <!-- include other inputs if needed and include a form submit (save) button -->
                    </form>
                  </div>
                </div>
              </div>
              <div class="tab-pane" id="info">

              </div>
              <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
          </div>
          <!-- /.nav-tabs-custom -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

    </section>
    <!-- /.content -->
  </div>
  <!-- FileInput -->
<script src="<?php echo base_url();?>assets/js/fileinput.min.js"></script>
<script>
function button(){
  $('#btn-save').attr("disabled", false);
}

 function loadTimeLine(id){
  //alert("Cargando Timeline de: " + id);

  $.ajax({
    url: '<?php echo base_url();?>index.php/TimeLine/GetTimeLineByUser',
    type: 'post',
    //dataType: 'json',
    data:{'idUsuario':id}
  })
  .done(function(resp){
    console.log("done");
    $("#timeline").html(resp);
  })
  .fail(function(){
    console.log("fail");
    $("#timeline").html('<p>No se pudo cargar el timeline</p>');
  })
  .always(function(resp){
    console.log("complete");
  });


 }
 
  var btnCust = '<button type="button" class="btn btn-default" title="Add picture tags" ' + 
      'onclick="alert(\'Call your custom code here.\')">' +
      '<i class="glyphicon glyphicon-tag"></i>' +
      '</button>'; 
  $("#avatar-1").fileinput({
      overwriteInitial: true,
      maxFileSize: 1500,
      showClose: false,
      showCaption: false,
      browseLabel: '',
      removeLabel: '',
      browseIcon: '<i class="glyphicon glyphicon-folder-open"></i>',
      removeIcon: '<i class="glyphicon glyphicon-remove"></i>',
      removeTitle: 'Cancelar o revertir cambios',
      elErrorContainer: '#kv-avatar-errors-1',
      msgErrorClass: 'alert alert-block alert-danger',
      defaultPreviewContent: '<img src="<?php echo base_url();?>assets/uploads/default_avatar.png" alt="Tu Avatar" style="width:160px">',
      layoutTemplates: {main2: '{preview} ' +  btnCust + ' {remove} {browse}'},
      allowedFileExtensions: ["jpg", "png", "gif"]
  });
</script>
