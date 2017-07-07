{block name=sesion}
	{if {$haySesion}}
		<a class="sesion" href="../controlador/handler.php?value=perfil"><span class="fa fa-user"> Usuario {$usuario}</a>
		<a class="sesion" href="../controlador/handler.php?value=cerrarSesion"><span class="fa fa-window-close"> Cerrar sesión</a>
	{else}
		<a class="sesion" href="../controlador/handler.php?value=iniciarSesion"><span class="fa fa-user"></span> Iniciar sesión</a>
		<a class="sesion" href="../controlador/handler.php?value=registrarse"><span class="fa fa-user-plus	"> Registrarse</a>
	{/if}
{/block}