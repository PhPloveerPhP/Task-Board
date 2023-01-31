<?php
    $config = include 'config.php';

try {
    $conexion = new PDO('mysql:host=' . $config['db']['host'], $config['db']['user'], $config['db']['pass'], $config['db']['options']);
    $sql = file_get_contents("./db/db.sql");
    $conexion->exec($sql);
    echo "Creado todo con exito";
} catch (PDOException $error) {
    echo $error->getMessage();
}


?>