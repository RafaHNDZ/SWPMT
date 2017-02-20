
$("#form-update-empleado").submit(function(event){
  event.preventDefault();
    $.ajax({
      url: $("form").attr("action"),
      type: $("form").attr("method"),
      data: $("form").serialize()
    })
    .done(function(response) {
      console.log("success");
      if(response === "ok"){
        $('#Modal').modal('hide');
        $("#msg-error").hide();
        location.reload();
      }else if(response === 'fail'){
        //alert("No se pudo actualizar. \nPuede que no se hicieran cambios en la información...");
        $.notify({
          // options
          //title: 'Alto',
          message: 'No se actualizo la informacion. \n¿Realizo cambios en la información?'
        },{
          // settings
          type: 'info',
          allow_dismiss: false,
          placement: {
            from: "bottom",
            align: "right"
          },
        });
      }else{
        //$("#msg-error").show();
        //$(".list-errors").html(response);
        //alert(response);
        $.notify({
          // options
          //title: 'Alto',
          message: response
        },{
          // settings
          type: 'info',
          allow_dismiss: false,
          placement: {
            from: "bottom",
            align: "right"
          },
        });
        // Termina Notifiación
      }
      $("#btn-save").removeClass('disabled');
    })
    .fail(function() {
      console.log("error");
      alert("No se pudo actualizar el regitro. \nIntente más tarde...");
      $("#btn-save").removeClass('disabled');
    })
    .always(function() {
      console.log("complete");
    });
    $("#btn-save").addClass('disabled');
});

$("#form-update-noticia").submit(function(event) {
  event.preventDefault();
    $.ajax({
      url: $("form").attr("action"),
      type: $("form").attr("method"),
      data: $("form").serialize()
    })
    .done(function(response) {
      console.log("success");
      if(response === "ok"){
        $('#Modal').modal('hide');
        $("#msg-error").hide();
        location.reload();
      }else if(response === 'fail'){
        alert("No se pudo actualizar. \nPuede que no se hicieran cambios en la información...");
      }else{
        $("#msg-error").show();
        $(".list-errors").html(response);
        alert(response);
      }
    })
    .fail(function() {
      console.log("error");
      alert("No se pudo actualizar el regitro. \nIntente más tarde...");
    })
    .always(function() {
      console.log("complete");
    });
});

