<?php
include '../../functions/functions.php';

$error = false;
$config = include '../../config/config.php';

try {

    $dsn = 'mysql:host=' . $config['db']['host'] . ';dbname=' . $config['db']['name'];
    $conexion = new PDO($dsn, $config['db']['user'], $config['db']['pass'], $config['db']['options']);
    $sentence = $conexion->prepare("SELECT * FROM users");
    $sentence->execute();
    $users = $sentence->fetchAll();

} catch (PDOException $error) {
    $error = $error->getMessage();
}

?>