<?php


$config = include '../config/config.php';

try {
    $dsn = 'mysql:host=' . $config['db']['host'] . ';dbname=' . $config['db']['name'];
    $conexion = new PDO($dsn, $config['db']['user'], $config['db']['pass'], $config['db']['options']);

    $task = [
        "id_task" => intval($_GET["edit"]),
    ];

    $sentence = $conexion->prepare("SELECT description FROM tasks WHERE id_task = :id_task");
    $sentence->bindParam(':id_task', $task["id_task"]);
    $sentence->execute();
    $arr = $sentence->fetch();

} catch (PDOException $error) {
    $result['error'] = true;
    $result['message'] = $error->getMessage();
}

?>