$(document).ready(function () {
	setearModal();
});

function setearModal() {
	var modal = document.getElementById('myModal');
	var span = document.getElementsByClassName("close")[0];

	span.onclick = function() {
		modal.style.display = "none";
	}
	window.onclick = function(event) {
	    if (event.target == modal) {
			modal.style.display = "none";
	    }
	}
}

function mostrarModal(mensaje) {
	var modal = document.getElementById('myModal');
	var p = document.getElementById("mensaje");
	$('#mensaje').text(mensaje);
	modal.style.display = "block";
}