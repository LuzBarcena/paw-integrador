{extends file="base.tpl"}

{block name=head}
	<link rel="stylesheet" type="text/css" href="css/agregarPerdido.css">
	<script type="text/javascript" src="js/agregarPerdido.js"></script>
{/block}

{block name=section}
	<section id="">
		<form>
			<div class="container">
				<h1>AGREGAR PERDIDO</h1>
				<label for="usuario"><b>Título:</b></label>
				<input type="text" id="titulo" name="titulo" placeholder="Ingrese título" required>
				<label for="descripcion"><b>Descripción:</b></label>
				<input type="text"  id="descripcion" placeholder="Ingrese descripción" name="descripcion" required>
				<textarea name="descripcion" rows="5" cols="40" required></textarea>
				Seleccione una imagen:
				<input type="file" name="imagen" id="imagen">
				<div class="botones">
					<input type="button" id="agregarPerdido" name="agregarPerdido" value="Agregar">
				</div>
			</div>
		</form>
	</section>
{/block}