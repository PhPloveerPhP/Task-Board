<?php

    $config = include 'config.php';

try {
    // Create connection
    $conexion = new PDO('mysql:host=' . $config['db']['host'], $config['db']['user'], $config['db']['pass'], $config['db']['options']);
    $sql = file_get_contents("./db/db.sql");
    $conexion->exec($sql);
    echo "Creado todo con exito";
} catch (PDOException $error) {
    // If there is an error an exception is thrown
    echo $error->getMessage();
}


?>