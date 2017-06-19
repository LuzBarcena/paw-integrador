$(document).ready(function () {
	$("input[name='registro']").click(obtenerDatos);
});

function registrarUsuario(nombreUsuario, email, nombre, apellido, contrasenia, contrasenia2, fecha) {
	var parametros = {
		"do": "guardarUsuario",
		"nombre_usuario": nombreUsuario,
		"email": email,
		"nombre": nombre,
		"apellido": apellido,
		"contrasenia": contrasenia,
		"contrasenia2": contrasenia2,
		"fecha_nacimiento": fecha
	}
	$.ajax({
		data: parametros,
		url: '../interfaces/validarRegistro.php',
		type: 'POST',
		success: function (respuesta) {
			var data = JSON.parse(respuesta);
			console.log(data);
			if (data.status === "ok") {
				//alert(data.descripcion);
				mostrarError(data.descripcion);
				setTimeout(function(){
					location.href ="index.php";
				}, 3000);
			} else {
				//alert(data.descripcion);
				mostrarError(data.descripcion);
			}
			
		},
		error: function(respuesta) {
			var data = JSON.parse(respuesta);
			console.log(data);
        	alert("Ocurrió un error! :(");
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
		var fecha = $("input[name='fecha_nacimiento']").val();
		registrarUsuario(nombreUsuario, email, nombre, apellido, contrasenia, contrasenia2, fecha);
	}
}

