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

function mostrarModal(color, mensaje) {
	var modal = document.getElementById('myModal');
	$('#mensaje').text(mensaje);
	if (color == "rojo") {
		$('.modal-title').css("background-color", "#f44336");
	} else {
		if (color == "verde") {
			$('.modal-title').css("background-color", "#4CAF50");
		}
	}
	modal.style.display = "block";
}