<?php 

$result = [
    'error' => false,
    'message' => 'Tarea eliminada con exito'
];

$config = include './config/config.php';

try {
    $dsn = 'mysql:host='.$config['db']['host'].';dbname='.$config['db']['name'];
    $conexion = new PDO($dsn, $config['db']['user'], $config['db']['pass'], $config['db']['options']);

    $task = [
        "id_user" => $_SESSION["id"],
        "id_task" => array_keys($_POST["delete"])[0],
    ];

    $sentence = $conexion->prepare("DELETE FROM tasks WHERE id_task = :task and id_user = :user");
    $sentence->bindParam(':user', $task["id_user"]);
    $sentence->bindParam(':task', $task["id_task"]);
    $sentence->execute();

} catch (PDOException $error) {
    $result['error'] = true;
    $result['message'] = $error->getMessage();
}

?>