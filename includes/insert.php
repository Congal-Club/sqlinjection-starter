<?php

if (!defined('SQL_INJECTION_IN_PHP')) {
	die('Direct access not permitted');
}

if (isset($_GET['first_name'], $_GET['last_name'], $_GET['birth_date'])) {
	$insert_query = 'INSERT INTO students(first_name, last_name, birth_date) VALUES (' . "'{$_GET['first_name']}', '{$_GET['last_name']}', '{$_GET['birth_date']}')";
	$result = $pdo->exec($insert_query);

	if ($result) {
		?>

		<div class="alert alert-success" role="alert">
			Usuario insertado
		</div>

		<?php
	} else {
		?>

		<div class="alert alert-warning" role="alert">
			Hubo un problema insertando el usuario: <?= json_encode( $pdo->errorInfo() ) ?>
		</div>

		<?php
	}

	?>

	<a class="btn btn-primary active" href="?action=search">
		Regresar
	</a>
	
  <?php
} else {
	?>

	<h2>Agregar estudiante</h2>
	<hr/>

	<form method="get">
		<input type="hidden" name="action" value="insert"/>
    
		<div>
			<label>
				Nombre:
				<input type="text" name="first_name">
			</label>
		</div>

		<div>
			<label>
				Apellidos:
				<input type="text" name="last_name">
			</label>
		</div>

		<div>
			<label>
				Fecha de nacimiento:
				<input type="text" name="birth_date">
			</label>
		</div>

		<input type="submit" class="btn btn-primary" value="Agregar">
		<a href="?action=search" class="btn btn-secondary">
			Regresar
		</a>
	</form>
    
	<?php
}
