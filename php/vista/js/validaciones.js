function validar() {
	validarNombreUsuario();
}

function validarNombreUsuario() {
	var nombreUsuario = $("input[name='nombre_usuario']").val();
	alert(nombreUsuario);
}





/*	
registrarse = function() {
	var data = $(".formulario_registro").serializeArray();
	console.log(data);
	$.ajax({
		data: data,
		url: '../controlador/validarRegistro.php',
		type: 'POST',
		success: function (response) {
		    alert("Todo bien :)");
		},
		error: function(response) {
        	alert("Ocurrió un error! :(");
        }
    });
}*/