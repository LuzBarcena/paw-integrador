var reader  = new FileReader();

$(document).ready(function () {
	$("input[name='enviar']").click(obtenerDatos);
});

function obtenerDatos() {
	var seguir = validarPerdido();
	if (seguir) {
		var titulo = $("input[name='titulo']").val();
		var descripcion = $("textarea[name='descripcion']").val();
		console.log(titulo +" "+ descripcion +" "+ getLatitud() +" "+ getLongitud());
		enviarPerdido(titulo, descripcion, getLatitud(), getLongitud());
	}
}

function enviarPerdido(titulo, descripcion, latitud, longitud) {
	if ( reader.readyState != 2) {
		while (reader.readyState != 2) {

		}
	}
	var foto = reader.result;
	console.log(foto);
	var parametros = {
		"do": "enviar",
		"titulo": titulo,
		"descripcion": descripcion,
		"foto": foto,
		"latitud": latitud,
		"longitud": longitud
	}
	$.ajax({
		data: parametros,
		url: '../interfaces/validarPerdido.php',
		type: 'POST',
		success: function (respuesta) {
			var data = JSON.parse(respuesta);
			if (data.status === "ok") {
				mostrarModal(data.descripcion);
				setTimeout(function(){
					location.href ="perdidos.php";
				}, 2500);
			} else {
				mostrarModal(data.descripcion);
			}
			
		},
		error: function(respuesta) {
			var data = JSON.parse(respuesta);
			console.log(data);
        	alert("Ocurrió un error! :(");
        }
    });
}

function previewFile() {
	var file    = document.querySelector('input[type=file]').files[0];

	if (file) {
    	reader.readAsDataURL(file);
	} else {
    	mostrarModal("Error, no hay imagen");
	}
}