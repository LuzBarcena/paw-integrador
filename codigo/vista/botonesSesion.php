<?php
	include_once '../controlador/SesionControlador.php';
?>

<?php if (SesionControlador::haySesion()): ?>
			<p id="nombreSesion"> Usuario <?= SesionControlador::getSesion(); ?> </p>
			<form class="form-sesion-registro" action="../controlador/handler.php" method="POST">
				<input class="btn-sesion-registro" type="submit" name="cerrarSesion" value="Cerrar Sesión">
			</form>
		<?php else: ?>
			<form class="form-sesion-registro" action="../controlador/handler.php" method="POST">
				<input class="btn-sesion-registro" type="submit" name="iniciarSesion" value="Iniciar Sesión">
				<input class="btn-sesion-registro" type="submit" name="registrarse" value="Registrarse">
			</form>
		<?php endif ; ?>