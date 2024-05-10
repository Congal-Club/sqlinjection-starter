<?php

if (!defined('SQL_INJECTION_IN_PHP')) {
	die('Direct access not permitted');
}

?>

<!doctype html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/214f4b7d30.js" crossorigin="anonymous"></script>
    <title>School ITA | Starter</title>
    <link rel='icon' href='assets/favicon.png' type='image/png' />
  </head>

  <body>
    <div class="container">
      <h1>Administrar estudiantes<?= defined('SAFE_VERSION') ? ' (Versión segura)' : '' ?></h1>
      <hr/>
