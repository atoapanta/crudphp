<?php

$mysqli = include_once('../database/connection.php');

$idUsuario = $_POST['idUsuario'];

$sql = 'DELETE FROM usuario WHERE idUsuario = ' . $idUsuario;

echo $sql;
