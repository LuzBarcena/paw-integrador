var reader  = new FileReader();

$(document).ready(function () {
	$("input[name='enviar']").click(obtenerDatos);
});

function obtenerDatos() {
	var seguir = validarPerdido();
	if (seguir) {
		var titulo = $("input[name='titulo']").val();
		var descripcion = $("textarea[name='descripcion']").val();
		var fechaDesaparicion = $("input[name='fecha_desaparicion']").val();
		var sexo = $("input:radio[name='sexo']:checked").val();
		var nombre = $("input[name='nombre']").val();
		enviarPerdido(titulo, descripcion, getLatitud(), getLongitud(), fechaDesaparicion, sexo, nombre);
	}
}

function enviarPerdido(titulo, descripcion, latitud, longitud, fechaDesaparicion, sexo, nombre) {
	if (reader.readyState != 2) {
		while (reader.readyState != 2) {

		}
	}
	if (sexo == null) {
		console.log("sexo");
		sexo = "null";	
	}
	if (fechaDesaparicion == "") {
		console.log("fechaDesaparicion");
		fechaDesaparicion = 'null';	
	}
	if (nombre == "") {
		console.log("nombre");
		nombre = 'null';
	}

	var foto = reader.result;
	var parametros = {
		"do": "enviar",
		"titulo": titulo,
		"descripcion": descripcion,
		"foto": foto,
		"latitud": latitud,
		"longitud": longitud,
		"fechaDesaparicion": fechaDesaparicion,
		"sexo": sexo,
		"nombre": nombre
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

function cargarImagen() {
	var file = document.querySelector('input[type=file]').files[0];

	if (file) {
    	reader.readAsDataURL(file);
	} else {
    	mostrarModal("Error, no hay imagen");
	}
}