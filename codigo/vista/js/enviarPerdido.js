var reader  = new FileReader();
var silueta = false;
var foto = false;
var siluetaElegida;

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
	if ( (reader.readyState != 2) && (silueta == false) ) {
		while (reader.readyState != 2) {

		}
		silueta = false;
	}
	if (sexo == null) {
		sexo = "null";	
	}
	if (fechaDesaparicion == "") {
		fechaDesaparicion = 'null';	
	}
	if (nombre == "") {
		nombre = 'null';
	}
	if (silueta) {
		var foto = siluetaElegida;
		var tipoFoto = 'silueta';
	} else {
		var foto = reader.result;
		var tipoFoto = 'foto';
	}
	var parametros = {
		"do": "enviar",
		"titulo": titulo,
		"descripcion": descripcion,
		"foto": foto,
		"tipoFoto": tipoFoto,
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
    	silueta = false;
    	$('#img-ok').hide();
		$('#btn-silueta').text("Ya se eligió una foto");
		$('#btn-silueta').css("background-color", "#CC0000");
    	foto = true;
	} else {
    	mostrarModal("Error, no hay imagen");
	}
}

function cargarSilueta(img) {
	if (foto != true) {
		silueta = true;
		siluetaElegida = img.id;
		$('#img-ok').show();
		$('#btn-silueta').css("background-color", "#007E33");
		$('#btn-silueta').css("color", "#f2f2f2");
		$("#btn-silueta").attr('estado', 'oculto');
		setTimeout(function() {
			$("#siluetas").hide();
			$('#btn-silueta').text("Silueta elegida");
		}, 1000);
	}
}

function mostrarOcultarImg() {
	var estado = $("#btn-silueta").attr('estado');
	if (estado == 'oculto') {
		if (foto != true) {
			$("#btn-silueta").attr('estado', 'visible');
			$("#siluetas").show();
		}
	} else if (estado == 'visible') {
		$("#btn-silueta").attr('estado', 'oculto');
		$("#siluetas").hide();
	}
}
