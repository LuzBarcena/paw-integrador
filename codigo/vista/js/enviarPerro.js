var reader  = new FileReader();

$(document).ready(function () {
	$("input[name='alta']").click(obtenerDatos);
});

function obtenerDatos() {
	var seguir = validarPerro();
	if (seguir) {
		var nombre = $("input[name='nombre']").val();
		var particularidad = $("textarea[name='particularidad']").val();
		var peso = $("input[name='peso']").val();
		var edad = $("input:radio[name='edad']:checked").val();
		var sexo = $("input:radio[name='sexo']:checked").val();
		var tamanio = $("input:radio[name='tamanio']:checked").val();
		var raza = $("#raza_select option:selected").text();
		var selected = new Array();
		$("input[name='referencias']:checked").each(function() {
			selected.push($(this).val());
		});
		enviarPerro(nombre, edad, sexo, particularidad, tamanio, peso, raza, selected);
	}
}

function enviarPerro(nombre, edad, sexo, particularidad, tamanio, peso, raza, referencias) {
	if (reader.readyState != 2) {
		while (reader.readyState != 2) {
		}
	}

	if (sexo == null) {
		sexo = 'null';	
	}

	if (peso == '') {
		peso = 'null';	
	}

	if (edad == null) {
		edad = 'null';
	}

	if (particularidad == null) {
		particularidad = 'null';
	}

	if (referencias.length == 0) {
		referencias = 'null';
	}
	
	var foto = reader.result;

	var parametros = {
		"do": "enviar",
		"foto": foto,
		"nombre": nombre,
		"edad": edad,
		"sexo":sexo,
		"particularidad": particularidad,
		"tamanio": tamanio,
		"peso": peso,
		"raza": raza,
		"referencias": referencias
	}
	$.ajax({
		data: parametros,
		url: '../interfaces/validarPerro.php',
		type: 'POST',
		success: function (respuesta) {
			var data = JSON.parse(respuesta);
			if (data.status === "ok") {
				mostrarModal("verde", data.descripcion);
			} else {
				mostrarModal("rojo", respuesta.descripcion);
			}
		},
		error: function(respuesta) {
			var data = JSON.parse(respuesta);
        	mostrarModal("rojo", respuesta.descripcion);
        }
    });
}

function cargarImagen() {
	var file = document.querySelector('input[type=file]').files[0];

	if (file) {
    	reader.readAsDataURL(file);
	} else {
    	mostrarModal("rojo","Error, no hay imagen");
	}
}

function mostrarOcultarImg() {
	console.log($("#btn-silueta").attr(estado));

}