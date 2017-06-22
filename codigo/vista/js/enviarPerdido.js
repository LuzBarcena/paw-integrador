$(document).ready(function () {
	$("input[name='enviar']").click(obtenerDatos);
});

function obtenerDatos() {
	var seguir = validarPerdido();
	if (seguir) {
		var titulo = $("input[name='titulo']").val();
		var descripcion = $("input[name='descripcion']").val();
		enviarPerdido(titulo, descripcion);
	}
}

function enviarPerdido(titulo, descripcion) {
	var parametros = {
		"do": "enviar",
		"titulo": titulo,
		"descripcion": descripcion
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