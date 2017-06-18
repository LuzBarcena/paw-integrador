/*En vez de alerta hay que cambiar por algun span en el html y cambiarlo desde acá*/

function validar() {
	var nombreUsuarioValido = validarNombreUsuario();
	var mailValido = validarEmail();
	var nombreValido = validarNombre();
	var apellidoValido = validarApellido();
	var contraseniaValida = validarContrasenia();
	var fechaValida = validarFecha();

	return nombreUsuarioValido && mailValido && nombreValido && apellidoValido && contraseniaValida && fechaValida;
}

function validarIniciarSesion(){
	var nombreUsuarioValido = validarNombreUsuario();
	var contraseniaValida = validarContraseniaS();
	return nombreUsuarioValido && contraseniaValida;
}


function validarContraseniaS() {
	var contrasenia = $("input[name='contrasenia']").val();
	if (campoVacio(contrasenia)) return false;
	if (longitudExcedida(contrasenia, 30)) return false;
	if (!esTextoyNumeros(contrasenia)) return false;
	return true;
}


function campoVacio(campo) {
	if (campo === "") {
		//alert("Hay por lo menos un campo vacío");
		mostrarError("Hay por lo menos un campo vacío");
		return true;
	}
	else {
		return false;
	}
}

function longitudInsuficiente(campo) {
	if (campo.length < 3) {
		return true;
	}
	else {
		return false;
	}
}
/**
 * [longitudExcedida description]
 * @param  campo es el campo al que se le verifica su longitud 
 * @param  longitud es el valor maximo de caracteres que puede tener maximo
 * @param  mostrar es un booleano que dice si muestro el campo o no, por ejemplo a la pass no mostrarla
 * @return si la longitud esta excedidad es true, sino false
 */
function longitudExcedida(campo, longitud, mostrar) {
	if (campo.length > longitud) {
		if ( mostrar ) {
			var error = "¡La longitud de " + campo + " no puede ser superior a " + longitud + " caracteres!";
			//alert(error);
			mostrarError(error);
		} else {
			var error = "¡La longitud de la contraseña no puede ser superior a " + longitud + " caracteres!";
			//alert(error);
			mostrarError(error);
		}
		return true;
	}
	else {
		return false;
	}
}

function soloTexto(campo) {
	var expresion = /^[a-z áéíóúñüàè]+$/i;
	//var expresion = /^([a-zA-Z\s])*$/;
	if (expresion.test(campo)) {
		return true; 
	}
	else {
		var error = "Solo se puede ingresar texto, y usted ingresó: " + campo;
		//alert(error);
		mostrarError(error);
		return false;
	}
}

function soloNumeros(campo) {
	if (/^([0-9\s])*$/.test(campo)) {
		return true;
	}
	else {
		var error = "Solo se puede ingresar números, y usted ingresó: " + campo;
		//alert(error);
		mostrarError(error);
		return false;
	}
}

function esMail(campo) {
	var expresion = /^[-\w.%+]{1,64}@(?:[A-Z0-9-]{1,63}\.){1,125}[A-Z]{2,63}$/i;
	if (expresion.test(campo)) {
		return true;
	}
	else {
		var error = "El mail " + campo + " no tiene formato de mail.";
		//alert(error);
		mostrarError(error);
		return false;
	}
}

function esTextoyNumeros(campo, mostrar) {
	if (/^([a-zA-Z0-9\s])*$/.test(campo)) {
		return true;
	}
	else {
		if ( mostrar ) {
			var error = "Solo se puede ingresar texto y números, y usted ingresó: " + campo;
			//alert(error);
			mostrarError(error);
		} else {
			var error = "Solo se puede ingresar texto y números.";
			//alert(error);
			mostrarError(error);
		}
		return false;
	}
}

function validarNombreUsuario() {
	var nombreUsuario = $("input[name='nombre_usuario']").val();
	if (campoVacio(nombreUsuario)) return false;
	if (longitudExcedida(nombreUsuario, 30)) return false;
	if (!esTextoyNumeros(nombreUsuario)) return false;
	return true;
}

function validarEmail() {
	var email = $("input[name='email']").val();
	if (campoVacio(email)) return false;
	if (longitudExcedida(email, 50)) return false;
	if (!esMail(email)) return false;
	return true;
}

function validarNombre() {
	var nombre = $("input[name='nombre']").val();
	if (campoVacio(nombre)) return false;
	if (longitudExcedida(nombre, 50)) return false;
	if (!soloTexto(nombre)) return false;
	return true;
}

function validarApellido() {
	var apellido = $("input[name='apellido']").val();
	if (campoVacio(apellido)) return false;
	if (longitudExcedida(apellido, 50)) return false;
	if (!soloTexto(apellido)) return false;
	return true;
}

function validarContrasenia() {
	var contrasenia = $("input[name='contrasenia']").val();
	var contrasenia2 = $("input[name='contrasenia2']").val();
	if (campoVacio(contrasenia)) return false;
	if (campoVacio(contrasenia2)) return false;
	if (longitudExcedida(contrasenia, 30, true)) return false;
	if (longitudExcedida(contrasenia2, 30, true)) return false;
	if (contraseniasDistintas(contrasenia, contrasenia2)) return false;
	if (!esTextoyNumeros(contrasenia)) return false;
	return true;
}

function contraseniasDistintas(contrasena, contrasena2) {
	if (contrasena !== contrasena2) {
		var error = "Las contraseñas no coinciden.";
		//alert(error);
		mostrarError(error);
		return true;
	} else {
		return false;
	}
}

function validarFecha() {
	var fecha = $("input[name='fecha_nacimiento']").val();
	if (campoVacio(fecha)) return false;
	var hoy = new Date();
	var fechaFormulario = new Date(fecha);
	hoy.setHours(0,0,0,0);
	if (hoy <= fechaFormulario) {
		var error = "La fecha de nacimiento es posterior al día de hoy";
		//alert(error);
		mostrarError(error);
		return false;
	}
	return true;
}