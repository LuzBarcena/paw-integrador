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
		var tamaño = $("input:radio[name='tamaño']:checked").val();
		enviarPerro(nombre, edad, sexo, particularidad, tamaño, peso);
	}
}

function enviarPerro(nombre, edad, sexo, particularidad, tamaño, peso) {
	if (reader.readyState != 2) {
		while (reader.readyState != 2) {

		}
	}

	var foto = reader.result;
	alert(nombre + " " + edad + " " + sexo + " " + " " + particularidad + " " + tamaño + " " + peso);
	var parametros = {
		"do": "enviar",
		"foto": foto,
		"nombre": nombre,
		"edad": edad,
		"sexo":sexo,
		"particularidad": particularidad,
		"tamaño": tamaño,
		"peso": peso
	}
	$.ajax({
		data: parametros,
		url: '../interfaces/validarPerro.php',
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

function cargarImagen() {
	var file = document.querySelector('input[type=file]').files[0];

	if (file) {
    	reader.readAsDataURL(file);
	} else {
    	mostrarModal("Error, no hay imagen");
	}
}