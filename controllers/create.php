<?php

$mysqli = include_once('../database/connection.php');

$nombres = $_POST['nombres'];
$edad = $_POST['edad'];
$email = $_POST['email'];
$guardar = $_POST['guardar'];



try {

    $statement = $mysqli->prepare('INSERT INTO usuario(nombres, edad, email) VALUES (?,?,?)');

    $statement->bind_param('sis', $nombres, $edad, $email);

    $statement->execute();

    echo 'AGREGADO';

    $statement->close();
} catch (Exception $e) {
    print_r($e);
}

header("Location: /prueba/index.php");
die();
