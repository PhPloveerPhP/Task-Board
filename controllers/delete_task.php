<?php

$result = [
    'error' => false,
    'message' => 'Task deleted successfully',
];

$config = include './config/config.php';

try {
    $dsn = 'mysql:host=' . $config['db']['host'] . ';dbname=' . $config['db']['name'];
    $conection = new PDO($dsn, $config['db']['user'], $config['db']['pass'], $config['db']['options']);

    $task = [
        "id_user" => $_SESSION["id"],
        "id_task" => intval($_POST["delete"]),
    ];

    $sentence = $conection->prepare("DELETE FROM tasks WHERE id_task = :task and id_user = :user");
    $sentence->bindParam(':user', $task["id_user"]);
    $sentence->bindParam(':task', $task["id_task"]);
    $sentence->execute();

} catch (PDOException $error) {
    $result['error'] = true;
    $result['message'] = $error->getMessage();
}
