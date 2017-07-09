
$(document).ready(function () {
	$("input[name='registro']").click(obtenerDatos);
});

function registrarUsuario(nombreUsuario, email, nombre, apellido, contrasenia, contrasenia2) {
	var parametros = {
		"do": "guardarUsuario",
		"nombre_usuario": nombreUsuario,
		"email": email,
		"nombre": nombre,
		"apellido": apellido,
		"contrasenia": contrasenia,
		"contrasenia2": contrasenia2
	}
	$.ajax({
		data: parametros,
		url: '../interfaces/validarRegistro.php',
		type: 'POST',
		success: function (respuesta) {
			var data = JSON.parse(respuesta);
			if (data.status === "ok") {
				mostrarModal("verde", data.descripcion);
				setTimeout(function(){
					location.href ="index.php";
				}, 1500);
			} else {
				mostrarModal("rojo", data.descripcion);
			}
			
		},
		error: function(respuesta) {
			var data = JSON.parse(respuesta);
        	mostrarModal("rojo", respuesta.descripcion);
        }
    });
}

function obtenerDatos() {
	var seguir = validar();
	if (seguir) {
		var nombreUsuario = $("input[name='nombre_usuario']").val();
		var email = $("input[name='email']").val();
		var nombre = $("input[name='nombre']").val();
		var apellido = $("input[name='apellido']").val();
		var contrasenia = $("input[name='contrasenia']").val();
		var contrasenia2 = $("input[name='contrasenia2']").val();
		registrarUsuario(nombreUsuario, email, nombre, apellido, contrasenia, contrasenia2);
	}
}

