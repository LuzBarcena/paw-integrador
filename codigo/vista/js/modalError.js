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

function mostrarError(error) {
	var modal = document.getElementById('myModal');
	var p = document.getElementById("mensajeError");
	$('#mensajeError').text(error);
	modal.style.display = "block";
}