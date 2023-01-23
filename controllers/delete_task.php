<?php 

$result = [
    'error' => false,
    'message' => 'Tarea eliminada con exito'
];

$config = include './config/config.php';

try {
    $dsn = 'mysql:host='.$config['db']['host'].';dbname='.$config['db']['name'];
    $conexion = new PDO($dsn, $config['db']['user'], $config['db']['pass'], $config['db']['options']);
    
      $id_task = array_keys($_POST["delete"])[0];

    $task = [
        "id_user" => 1,
        "id_task" => $id_task,
    ];

    $sentence = $conexion->prepare("DELETE FROM tasks WHERE id_task = :task and id_user = :user");
    $sentence->bindParam(':user', $task["id_user"]);
    $sentence->bindParam(':task', $task["id_task"]);
    $sentence->execute();

} catch (PDOException $error) {
    echo "hola";
    $result['error'] = true;
    $result['message'] = $error->getMessage();
}

?>