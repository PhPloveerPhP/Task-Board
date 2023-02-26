<?php
include './functions/functions.php';

$error = false;
$config = include './config/config.php';

try {
    // Create connection
    $dsn = 'mysql:host=' . $config['db']['host'] . ';dbname=' . $config['db']['name'];
    $conexion = new PDO($dsn, $config['db']['user'], $config['db']['pass'], $config['db']['options']);
    // Get data
    $query = "SELECT * FROM tasks where id_user = " . $_SESSION["id"];
    $sentence = $conexion->prepare($query);
    // Execute sentence
    $sentence->execute();
    $tasks = $sentence->fetchAll();

} catch (PDOException $error) {
    $error = $error->getMessage();
}
