//$(document).on("ready",inicio);

//function inicio(){

	$("#msg-error").hide();
	$("#msg-ok").hide();

	$("#form").submit(function(event){

		event.preventDefault();
		var formData = new FormData($("#form")[0]);
		$.ajax({
			url:$("form").attr("action"),
			type:$("form").attr("method"),
			data:formData,
			cache:false,
			contentType:false,
			processData:false,
			success:function(respuesta){
				if(respuesta==="ok"){
					//$("#msg-error").hide();
					//$("#msg-ok").show();
					$("#form")[0].reset();
							$.notify({
								// options
								//title: 'Alto',
								message: 'Registrado'
							},{
								// settings
								type: 'success',
								allow_dismiss: false,
								placement: {
									from: "bottom",
									align: "right"
								},
							});
				}else{
					if(respuesta === "fail"){
						$.notify({
							// options
							//title: 'Alto',
							message: 'Algo fallo'
						},{
							// settings
							type: 'danger',
							allow_dismiss: false,
							placement: {
								from: "bottom",
								align: "right"
							},
						});
					}else{
						//$("#msg-error").show();
						//$(".list-errors").html(respuesta);
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
			},error:function(){
				alert("Ocurrio un Error");
			},fail:function(respuesta){
				alert("Fallo: " + respuesta);
			}
		});
	});
// Form Dependencia
 /**
	$("#form-dependencia").submit(function(event){

		event.preventDefault();
		$.ajax({
			url:$("form").attr("action"),
			type:$("form").attr("method"),
			data:$("form").serialize(),
			success:function(respuesta){
				if(respuesta==="ok"){
					$("#msg-error").hide();
					$("#msg-ok").show();
					$("#form-dependencia")[0].reset();
					    setTimeout(function() {
					        $("#msg-ok").fadeOut(1500);
					    },5000);
				}else{
					if(respuesta === "fail"){
						alert("fail");
					}else{
					$.notify({
							// options
							//title: 'Alto',
							message: respuesta
						},{
							// settings
							type: 'danger',
							allow_dismiss: false,
							placement: {
								from: "bottom",
								align: "right"
							},
						});
					}
				}
			}
		});
	});

// Form Noticia
	$("#form-noticia").submit(function(event){

		event.preventDefault();
		$.ajax({
			url:$("form").attr("action"),
			type:$("form").attr("method"),
			data:$("form").serialize(),
			success:function(respuesta){
				if(respuesta==="ok"){
					$.notify({
						// options
						//title: 'Alto',
						message: 'Registrado'
					},{
						// settings
						type: 'success',
						allow_dismiss: false,
						placement: {
							from: "bottom",
							align: "right"
						},
					});
					$("#form-noticia")[0].reset();
				}else{
					if(respuesta === "fail"){
					$.notify({
						// options
						//title: 'Alto',
						message: 'No se pudo registrar\nContacte al administrador'
					},{
						// settings
						type: 'danger',
						allow_dismiss: false,
						placement: {
							from: "bottom",
							align: "right"
						},
					});
					}else{
						$.notify({
							// options
							//title: 'Alto',
							message: respuesta
						},{
							// settings
							type: 'warning',
							allow_dismiss: false,
							placement: {
								from: "bottom",
								align: "right"
							},
						});
					}
				}
			}
		});
	});

	// Form Evento
		$("#form-evento").submit(function(event){
			event.preventDefault();
			$.ajax({
				url:$("form").attr("action"),
				type:$("form").attr("method"),
				data:$("form").serialize(),
				success:function(respuesta){
					if(respuesta==="ok"){
						$("#form-evento")[0].reset();
						$.notify({
							// options
							//title: 'Alto',
							message: 'Registrado'
						},{
							// settings
							type: 'danger',
							allow_dismiss: false,
							placement: {
								from: "bottom",
								align: "right"
							},
						});
					}else{
						if(respuesta === "fail"){
							alert("No se pudo registrar");
						}else{
						$.notify({
							// options
							//title: 'Alto',
							message: respuesta
						},{
							// settings
							type: 'danger',
							allow_dismiss: false,
							placement: {
								from: "bottom",
								align: "right"
							},
						});
						}
					}
				}
			});
		});
		**/
//}
