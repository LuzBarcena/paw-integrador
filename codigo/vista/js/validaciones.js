/*En vez de alerta hay que cambiar por algun span en el html y cambiarlo desde acá*/

function validar() {
	var nombreUsuarioValido = validarNombreUsuario();
	var mailValido = validarEmail();
	var nombreValido = validarNombre();
	var apellidoValido = validarApellido();
	var contraseniaValida = validarContrasenia();

	return nombreUsuarioValido && mailValido && nombreValido && apellidoValido && contraseniaValida;
}

function validarIniciarSesion(){
	var nombreUsuarioValido = validarNombreUsuario();
	var contraseniaValida = validarContraseniaS();
	return nombreUsuarioValido && contraseniaValida;
}


function validarPerdido(){
	//obligatorios
	var titulo = $("input[name='titulo']").val();
	var descripcion = $("textarea[name='descripcion']").val();
	var direccion = $("input[name='direccion']").val();
	var tel = $("input[name='tel']").val();
	//no obligatorios
	var nombre = $("input[name='nombre']").val();
	var fecha = $("input[name='fecha_desaparicion']").val();
	var sexo = $("input[name='sexo']:checked").val();

	if (campoVacio(tel)) return false;
	if (longitudExcedida(tel, 50, true)) return false;
	if ( ! soloNumeros(tel)) return false;
	
	if (campoVacio(descripcion)) return false;
	if (longitudExcedida(descripcion, 250, true)) return false;
	if ( ! esTextoyNumeros(descripcion)) return false;

	if (campoVacio(direccion)) return false;

	if (campoVacio(titulo)) return false;
	if (longitudExcedida(titulo, 50, true)) return false;
	if ( ! esTextoyNumeros(titulo)) return false;
	
	if ( ! esFechaMenorActual(fecha)) return false;

	if (nombre != ""){
		if (longitudExcedida(nombre, 50, true)) return false;
		if ( ! soloTexto(nombre)) return false;
	}	

	return true;
}

function validarPerro(){
	var nombre = $("input[name='nombre']").val();
	var particularidad = $("textarea[name='particularidad']").val();
	var peso = $("input[name='peso']").val();
	var tamanio = $("input:radio[name='tamanio']:checked").val();
	var raza = $("#raza_select option:selected").val();
	
	if (campoVacio(raza)) return false;
	
	if (campoVacio(tamanio)) return false;
	
	if (campoVacio(nombre)) return false;
	if (longitudExcedida(nombre, 50, true)) return false;
	if ( ! esTextoyNumeros(nombre)) return false;
	
	if (particularidad != null) {
		if (longitudExcedida(particularidad, 200, true)) return false;
		if ( ! esTextoyNumeros(particularidad)) return false;
	}
	
	if (peso != '') {
		if ( ! soloDecimales(peso)) return false;
	}	
	
	return true;
}

function validarRadio(radio){
  	var p = 0;
  	for (var i = 0; i < radio.length; i++) {
   	 	 if(radio[i].checked) {
      		p = p + 1; 
    	}
  	}
  	if(p > 0){
  		return true;
  	}else{
  		mostrarModal("rojo", "Debe selecionar una opción");
  		return false;
  	}

}

function validarContraseniaS() {
	var contrasenia = $("input[name='contrasenia']").val();
	if (campoVacio(contrasenia)) return false;
	if (longitudExcedida(contrasenia, 30, false)) return false;
	if (!esTextoyNumeros(contrasenia)) return false;
	return true;
}


function campoVacio(campo) {
	if (campo == "") {
		//alert("Hay por lo menos un campo vacío");
		mostrarModal("rojo", "Hay por lo menos un campo obligatorio vacío");
		return true;
	} else {
		if (campo == null) {
			mostrarModal("rojo", "Hay por lo menos un campo obligatorio vacío");
			return true;
		} else {
			return false;
		}
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
			mostrarModal("rojo", error);
		} else {
			var error = "¡La longitud de la contraseña no puede ser superior a " + longitud + " caracteres!";
			//alert(error);
			mostrarModal("rojo",  error);
		}
		return true;
	}
	else {
		return false;
	}
}

function soloTexto(campo) {
	var expresion = /^[a-zA-Z áéíóúñüàè]+$/i;
	//var expresion = /^([a-zA-Z\s])*$/;
	if (expresion.test(campo)) {
		return true; 
	}
	else {
		var error = "Solo se puede ingresar texto, y usted ingresó: " + campo;
		//alert(error);
		mostrarModal("rojo",  error);
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
		mostrarModal("rojo",  error);
		return false;
	}
}

function soloDecimales(campo) {
	var expresion = /^[0-9]+(\.[0-9]+)?$/;
	if (expresion.test(campo)) {
		return true;
	}
	else {
		var error = "Solo se puede ingresar números, y usted ingresó: " + campo;
		//alert(error);
		mostrarModal("rojo",  error);
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
		mostrarModal("rojo",  error);
		return false;
	}
}

function esTextoyNumeros(campo, mostrar) {
	if (/^([ áéíóúñüàèa-zA-Z0-9\s])*$/.test(campo)) {
		return true;
	}
	else {
		if ( mostrar ) {
			var error = "Solo se puede ingresar texto y números, y usted ingresó: " + campo;
			//alert(error);
			mostrarModal("rojo",  error);
		} else {
			var error = "Solo se puede ingresar texto y números.";
			//alert(error);
			mostrarModal("rojo",  error);
		}
		return false;
	}
}

function validarNombreUsuario() {
	var nombreUsuario = $("input[name='nombre_usuario']").val();
	if (campoVacio(nombreUsuario)) return false;
	if (longitudExcedida(nombreUsuario, 30, true)) return false;
	if (!esTextoyNumeros(nombreUsuario)) return false;
	return true;
}

function validarEmail() {
	var email = $("input[name='email']").val();
	if (campoVacio(email)) return false;
	if (longitudExcedida(email, 50, true)) return false;
	if (!esMail(email)) return false;
	return true;
}

function validarNombre() {
	var nombre = $("input[name='nombre']").val();
	if (campoVacio(nombre)) return false;
	if (longitudExcedida(nombre, 50, true)) return false;
	if (!soloTexto(nombre)) return false;
	return true;
}

function validarApellido() {
	var apellido = $("input[name='apellido']").val();
	if (campoVacio(apellido)) return false;
	if (longitudExcedida(apellido, 50, true)) return false;
	if (!soloTexto(apellido)) return false;
	return true;
}

function validarContrasenia() {
	var contrasenia = $("input[name='contrasenia']").val();
	var contrasenia2 = $("input[name='contrasenia2']").val();
	if (campoVacio(contrasenia)) return false;
	if (campoVacio(contrasenia2)) return false;
	if (longitudExcedida(contrasenia, 30, false)) return false;
	if (longitudExcedida(contrasenia2, 30, false)) return false;
	if (contraseniasDistintas(contrasenia, contrasenia2)) return false;
	if (!esTextoyNumeros(contrasenia)) return false;
	return true;
}

function contraseniasDistintas(contrasena, contrasena2) {
	if (contrasena !== contrasena2) {
		var error = "Las contraseñas no coinciden.";
		//alert(error);
		mostrarModal("rojo",  error);
		return true;
	} else {
		return false;
	}
}

/**
 * Si devuelve true significa que la fecha es anterior, y si devuelve false significa 
 * que la fehca introducida es posterior a la actual.
 */
function esFechaMenorActual(date) {
	var x = new Date();
	var fecha = date.split("-");
	if (fecha[0]>1000) {
		x.setFullYear(fecha[0], fecha[1]-1, fecha[2]);
	} else {
		x.setFullYear(fecha[2], fecha[1]-1, fecha[0]);	
	}
	var today = new Date();
	if (x >= today) {
		var error = "La fecha de desaparición es posterior al día de hoy";
		mostrarModal("rojo",  error);
		return false;
	} else {
		return true;
	}
}