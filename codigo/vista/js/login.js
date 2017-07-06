$(document).ready(function () {
	$("input[name='iniciarSesion']").click(obtenerDatos);
});

function obtenerDatos() {
	var seguir = validarIniciarSesion();
	if (seguir) {
		var nombreUsuario = $("input[name='nombre_usuario']").val();
		var contrasenia = $("input[name='contrasenia']").val();
		loguear(nombreUsuario, contrasenia);
	}
}

function loguear(nombreUsuario, contrasenia) {
	var parametros = {
		"do": "iniciarSesion",
		"nombre_usuario": nombreUsuario,
		"contrasenia": contrasenia
	}
	$.ajax({
		data: parametros,
		url: '../interfaces/validarLogueo.php',
		type: 'POST',
		success: function (respuesta) {
			var data = JSON.parse(respuesta);
			if (data.status === "ok") {
				mostrarModal("¡Correcto!", data.descripcion);
				setTimeout(function(){
					location.href ="index.php";
				}, 2500);
			} else {
				mostrarModal("Error", data.descripcion);
			}
			
		},
		error: function(respuesta) {
			var data = JSON.parse(respuesta);
			console.log(data);
        	alert("Ocurrió un error! :(");
        }
    });
}