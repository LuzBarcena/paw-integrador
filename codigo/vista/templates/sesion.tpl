{block name=sesion}
	{if {$haySesion}}
		<p id="nombreSesion"> Usuario {$usuario}</p>
		<form class="form-sesion-registro" action="../controlador/handler.php" method="POST">
			<input class="btn-sesion-registro" type="submit" name="cerrarSesion" value="Cerrar Sesión">
		</form>
	{else}
		<form class="form-sesion-registro" action="../controlador/handler.php" method="POST">
			<input class="btn-sesion-registro" type="submit" name="iniciarSesion" value="Iniciar Sesión">
			<input class="btn-sesion-registro" type="submit" name="registrarse" value="Registrarse">
		</form>
	{/if}
{/block}