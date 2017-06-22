$(document).ready(function () {
	//obtenerPerdidos();
});

function obtenerPerdidos() {
	//var indice = document.getElementsByClassName("perdido").length;
	var indice = 0;
	$.ajax({
		url: "../interfaces/mostrarPerdidos.php",
		method: "post",
		data: {
			"do": "mostrarPerdidos",
			"indice": indice
		}
	}).done(function (datos) {
		return datos;
	}).fail(function (datos) {
		console.info("Fallo la conexion - Error 404");
		console.log(datos);
	});
}