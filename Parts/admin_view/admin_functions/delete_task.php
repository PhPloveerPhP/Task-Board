<?php 

$result = [
    'error' => false,
    'message' => 'Task Deleted',
];

$config = include '../../config/config.php';

try {
    $dsn = 'mysql:host=' . $config['db']['host'] . ';dbname=' . $config['db']['name'];
    $conexion = new PDO($dsn, $config['db']['user'], $config['db']['pass'], $config['db']['options']);

    $sentence = $conexion->prepare("DELETE FROM tasks WHERE id_task = :id_task");
    $sentence->bindParam(':id_task', $_POST["delete_task"]);
    $sentence->execute();

} catch (PDOException $error) {
    $result['error'] = true;
    $result['message'] = $error->getMessage();
}


?>