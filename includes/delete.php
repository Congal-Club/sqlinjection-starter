<?php

if (!defined('SQL_INJECTION_IN_PHP')) {
	die('Direct access not permitted');
}

$id = $_GET['id'];
$delete_query = 'DELETE FROM students where id = ' . $id;
$result = $pdo->exec($delete_query);

if ($result) {
	?>

	<div class="alert alert-success" role="alert">
		Usuario <?= $id ?> eliminado
	</div>

	<?php
} else {
	?>

	<div class="alert alert-warning" role="alert">
		No se puede encontrar el usuario <?= $id ?>
	</div>

	<?php
}

?>
	<a class="btn btn-primary active" href="?action=search">
		Regresar
	</a>
<?php
