function marcar(id){
	var parametros = {
		"do": "enviar",
		"id": id
	}

	$.ajax({
		data: parametros,
		url: '../interfaces/marcarEncontrado.php',
		type: 'POST',
		success: function (respuesta) {
			var data = JSON.parse(respuesta);
			if (data.status === "ok") {
				mostrarModal("verde",data.descripcion);
				setTimeout(function(){
					location.href ="perdidos.php";
				}, 1500);
			} else {
				mostrarModal("rojo",data.descripcion);
			}
		},
		error: function(respuesta) {
			var data = JSON.parse(respuesta);
        	alert("Ocurrió un error! :(");
        }
    });
}