<?php

if (!defined('SQL_INJECTION_IN_PHP')) {
	die('Direct access not permitted');
}

?>

<form method="get">
  <input type="hidden" name="action" value="search" />

  <label>
    Nombre:
    <input type="text" name="first_name" value="<?= $_GET['first_name'] ?? '' ?>">
  </label>

  <label>
    Apellidos:
    <input type="text" name="last_name" value="<?= $_GET['last_name'] ?? '' ?>">
  </label>

  <input type="submit" value="Buscar">
</form>

<?php

$first_name = $_GET['first_name'] ?? '';
$last_name  = $_GET['last_name'] ?? '';

$count_query = 'SELECT COUNT(*) as num_rows from students where hidden = 0 ';
$query = 'SELECT id, first_name, last_name, birth_date from students where hidden = 0 ';

$filters = '';

if (!empty($first_name) || !empty($last_name)) {
  if (isset($_GET['first_name']) && !empty($_GET['first_name'])) {
    $filters .= "AND first_name LIKE '%{$_GET['first_name']}%' ";
  }

  if (isset($_GET['last_name']) && !empty($_GET['last_name'])) {
    $filters .= "AND last_name LIKE '%{$_GET['last_name']}%' ";
  }
}

$page  = $_GET['page'] ?? 1;
$query .= $filters . ' LIMIT 5 OFFSET ' . ( $page - 1 ) * 5;

try {
  $count_query = $pdo->query($count_query . $filters);
  $count_result = $count_query ? $count_query->fetch()['num_rows'] : 0;
  $count_query->closeCursor();

  $num_pages = ($count_result / 5) + (($count_result % 5) ? 1 : 0);
} catch (PDOException $e) {
  $count_result = 0;
  $num_pages = 1;
}

$result = $pdo->query($query);

if ($count_result === 0) {
  $count_result = $result ? $result->rowCount() : 0;
}

?>

<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">Id</th>
      <th scope="col">Nombre</th>
      <th scope="col">Apellidos</th>
      <th scope="col">Fecha de nacimiento</th>
      <th scope="col">Acciones</th>
    </tr>
  </thead>

  <tbody>
    <?php
      if ($result) {
        foreach ($result as $row) {
          echo '<tr>';
          echo '<th scope="row">' . $row['id'] . '</th>';
          echo '<td>' . $row['first_name'] . '</td>';
          echo '<td>' . $row['last_name'] . '</td>';
          echo '<td>' . $row['birth_date'] . '</td>';
          echo '<td>';
          echo '<a href="?action=update&id=' . $row['id'] . '"><i class="fas fa-pencil-alt"></i></a>&nbsp;';
          echo '<a href="?action=delete&id=' . $row['id'] . '"><i class="fas fa-trash"></i></a>';
          echo '</td>';
          echo '</tr>';
        }
      }
    ?>
  </tbody>
</table>

<p>Numero de estudiantes: <?= $count_result ?></p>

<?php
  for ($i = 1; $i <= $num_pages; $i++) {
    if ($action === 'search') {
      $filter = '&action=search&first_name=' . $first_name . '&last_name=' . $last_name;
    } else {
      $filter = '';
    }

    echo '<a href="?page=' . $i . $filter . '">' . $i . '</a> ';
  }
?>

<hr/>
<a href="?action=insert" class="btn btn-primary">
  Agregar estudiante
</a>
