{extends file="base.tpl"}


{block name=head}
	<link rel="stylesheet" type="text/css" href="css/login.css">
{/block}

{block name=section}
	<section class="section-login">
		<form class="formulario_login" action="../controlador/validarUsuario.php" method="POST" onsubmit="return validarIniciarSesion();">
			<div class="container">
				<h1>INICIAR SESIÓN</h1>
				<label for="usuario"><b>Usuario</b></label>
				<input type="text" id="usuario" name="nombre_usuario" placeholder="Ingrese usuario" required>
				<label for="contrasenia"><b>Contraseña</b></label>
				<input type="password"  id="contrasenia" placeholder="Ingrese password" name="contrasenia" required>
				<div class="botones">
					<input type="submit" id="iniciarSesion" name="iniciarSesion" value="Iniciar Sesión">
				</div>
			</div>
		</form>
	</section>
{/block}
