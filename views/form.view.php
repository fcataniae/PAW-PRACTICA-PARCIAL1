<main>
	<h1>Encuesta sobre lenguajes de programacion</h1>

	<form action="/action_page" method="POST" >
		<fieldset>
			<legend></legend>
			<label for="nombre"> Nombre: </label>
			<input type="text" name="nombre" id="nombre" required="true">

			<label for="apellido"> Apellido: </label>
			<input type="text" name="apellido" id="apellido" required="true">

		  <label for="email">Email: </label>
			<input type="email" name="email" id="email" required="true">

			<label for="lenguaje">Lenguaje: </label>
			<select id="lenguaje" name="lenguaje">
				<option></option>
				<?php foreach ($json_lenguajes as $lenguaje): ?>
					<option> <?= $lenguaje["lenguaje"] ?> </option>
				<?php endforeach ?>
			</select>
			<label for="lenguaje2"> Otro Lenguaje: </label>
			<input type="text" name="lenguaje2" id="lenguaje2">

			<button type="submit" > Enviar</button>
		  <button type="reset" >Limpiar</button>
		</fieldset>
	</form>
</main>
