<?php
$status = (array_keys($_POST["check"]))[0];

foreach ($_POST["check"] as $key => $value) {
    $id = (array_keys($value)[0]);
}

$config = include './config/config.php';

if ($status == "U") {
    $status = "P";
} elseif ($status == "P") {
    $status = "H";
} elseif ($status == "H") {
    $status = "C";
} elseif ($status == "C") {
    try {
        $dsn = 'mysql:host=' . $config['db']['host'] . ';dbname=' . $config['db']['name'];
        $conexion = new PDO($dsn, $config['db']['user'], $config['db']['pass'], $config['db']['options']);

        $task = [
            "id_user" => 1,
            "id_task" => $id,
        ];

        $sentence = $conexion->prepare("DELETE FROM tasks WHERE id_task = :task and id_user = :user");
        $sentence->bindParam(':user', $task["id_user"]);
        $sentence->bindParam(':task', $task["id_task"]);
        $sentence->execute();

    } catch (PDOException $error) {
        $result['error'] = true;
        $result['message'] = $error->getMessage();
    }

}

try {
    $task = [
        "id_user" => 1,
        "id_task" => $id,
        "status" => $status,
    ];

    $dsn = 'mysql:host=' . $config['db']['host'] . ';dbname=' . $config['db']['name'];
    $conexion = new PDO($dsn, $config['db']['user'], $config['db']['pass'], $config['db']['options']);

    $sentence = $conexion->prepare("UPDATE tasks SET status = ? where id_task = ? and id_user = ?");
    $sentence->bindParam(1, $task["status"]);
    $sentence->bindParam(2, $task["id_task"]);
    $sentence->bindParam(3, $task["id_user"]);
    $sentence->execute();

} catch (PDOException $error) {
    $result['error'] = true;
    $result['message'] = $error->getMessage();
}
