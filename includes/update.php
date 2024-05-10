<?php

if (!defined('SQL_INJECTION_IN_PHP')) {
	die('Direct access not permitted');
}

if (isset($_GET['first_name'], $_GET['last_name'], $_GET['birth_date'])) {
	$update_query = "UPDATE students SET first_name='{$_GET['first_name']}', last_name='{$_GET['last_name']}', birth_date='{$_GET['birth_date']}' WHERE id={$_GET['id']}";
	$result = $pdo->exec( $update_query );

	if ($result) {
		?>

		<div class="alert alert-success" role="alert">
			Usuario actualizado
		</div>

		<?php
	} else {
		?>

		<div class="alert alert-warning" role="alert">
			Hubo un problema actualizando el usuario: <?= json_encode( $pdo->errorInfo() ) ?>
		</div>
		
    <?php
	}

	?>

	<a class="btn btn-primary active" href="?action=search">
		Regresar
	</a>
	
  <?php
} else {
	$query = "SELECT id, first_name, last_name, birth_date from students where id={$_GET['id']}";
	$row   = $pdo->query( $query )->fetch();

	?>

	<h2>Editar estudiante <?= $_GET['id'] ?></h2>
	<hr/>

	<form method="get">
		<input type="hidden" name="action" value="update"/>
		<input type="hidden" name="id" value="<?= $_GET['id'] ?>">
		
    <label>
			Nombre:
			<input type="text" name="first_name" value="<?= $row['first_name'] ?>"/>
		</label>

		<br/>
		
    <label>
			Apellidos:
			<input type="text" name="last_name" value="<?= $row['last_name'] ?>"/>
		</label>

		<br/>

		<label>
			Fecha de nacimiento:
			<input type="text" name="birth_date" value="<?= $row['birth_date'] ?>"/>
		</label>
		
    <hr/>
		
    <input type="submit" class="btn btn-primary" value="Actualizar">
		<a href="?action=search" class="btn btn-secondary">
			Regresar
		</a>
	</form>

	<?php
}
