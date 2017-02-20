<div class="login-box">
  <div class="login-logo">
    <a href="../../index2.html"><b>Tarimoro</b> GTO</a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Accede con tus datos</p>

    <form id="form-login" action="<?php echo base_url();?>index.php/Login/Login/" method="post">
      <div class="form-group has-feedback">
        <input type="email" class="form-control" placeholder="Email" id="email" name="email">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" placeholder="Password" id="pass" name="pass">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Acceder</button>
        </div>
        <!-- /.col -->
      </div>
    </form>
    <div class="col-xs-12">
      <div id="alert"></div>
    </div>
  </div>
  <!-- /.login-box-body -->
</div>

<script  src="<?php echo base_url();?>assets/js/Functions.js"></script>

<script>
  $("#form-login").submit(function(event){

    event.preventDefault();

    $.ajax({
      url:$("form").attr("action"),
      type:$("form").attr("method"),
      data:$("form").serialize(),
      success:function(respuesta){
        if(respuesta==="ok"){
          //alert("Correcto");
          window.location.href = "<?php echo base_url();?>index.php/Admin";
        }else{
          if(respuesta === "fail"){
            //alert("Revisa tus Datos");
            $.notify({
              // options
              title: 'Alto',
              message: 'Datos Incorrectos'
            },{
              // settings
              type: 'warning',
              placement: {
                from: "bottom",
                align: "right"
              },
            });
          }else{
            if(respuesta === 'blocked'){
              //alert("Ese usuario esta bloqueado");
              $.notify({
              	// options
                title: 'Alto',
              	message: 'Usuario Bloqueado'
              },{
              	// settings
              	type: 'danger',
                placement: {
              		from: "bottom",
              		align: "right"
              	},
              });
            }else{
              $("#msg-error").show();
              $(".alert").html(respuesta);
              //alert(respuesta);
              $.notify({
              	// options
                //title: 'Alto',
              	message: respuesta
              },{
              	// settings
              	type: 'info',
                allow_dismiss: false,
                placement: {
              		from: "bottom",
              		align: "right"
              	},
              });
            }
          }
        }
      },fail:function(){
        console.log("fail");
      },error:function(){
        alert("Error al conectar con el servidor.\nRevise su conexion a internet.");
      },always:function(){
        console.log("complet");
      }
    });
  });

</script>
