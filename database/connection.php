<?php

$host = "127.0.0.1:3306";

$user = "root";

$password = "";

$database = "prueba";



$connection = new mysqli($host, $user, $password, $database);

if ($connection->connect_errno) {
    echo 'FALLO LA CONEXION';
}


return $connection;
