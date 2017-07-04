function adoptar(id, idPerro){
	var parametros = {
		"do": "adoptar",
		"usuario": id,
		"perro": idPerro
	}

	$.ajax({
		data: parametros,
		url: '../interfaces/adoptarApadrinar.php',
		type: 'POST',
		success: function (respuesta) {
			var data = JSON.parse(respuesta);
			if (data.status === "ok") {
				mostrarModal(data.descripcion);
				setTimeout(function(){
					location.href ="perros.php";
				}, 1500);
			} else {
				mostrarModal(data.descripcion);
			}
		},
		error: function(respuesta) {
			var data = JSON.parse(respuesta);
        	alert("Ocurrió un error! :(");
        }
    });
}

function apadrinar(id, idPerro){
	var parametros = {
		"do": "apadrinar",
		"usuario": id,
		"perro": idPerro
	}

	$.ajax({
		data: parametros,
		url: '../interfaces/adoptarApadrinar.php',
		type: 'POST',
		success: function (respuesta) {
			var data = JSON.parse(respuesta);
			if (data.status === "ok") {
				mostrarModal(data.descripcion);
				setTimeout(function(){
					location.href ="perros.php";
				}, 1500);
			} else {
				mostrarModal(data.descripcion);
			}
		},
		error: function(respuesta) {
			var data = JSON.parse(respuesta);
        	alert("Ocurrió un error! :(");
        }
    });
}