<?php

$arr = explode(",", $_POST["check"]);

$config = include './config/config.php';

if ($arr[0] == "C") {

    try {
        $dsn = 'mysql:host=' . $config['db']['host'] . ';dbname=' . $config['db']['name'];
        $conexion = new PDO($dsn, $config['db']['user'], $config['db']['pass'], $config['db']['options']);

        $task = [
            "id_user" => $_SESSION["id"],
            "id_task" => $arr[1],
        ];

        $sentence = $conexion->prepare("DELETE FROM tasks WHERE id_task = :task and id_user = :user");
        $sentence->bindParam(':user', $task["id_user"]);
        $sentence->bindParam(':task', $task["id_task"]);
        $sentence->execute();

    } catch (PDOException $error) {
        $result['error'] = true;
        $result['message'] = $error->getMessage();
    }

} else {

    if ($arr[0] == "U") {
        $arr[0] = "P";
    } elseif ($arr[0] == "P") {
        $arr[0] = "H";
    } elseif ($arr[0] == "H") {
        $arr[0] = "C";
    }

    try {
        $task = [
            "id_user" => $_SESSION["id"],
            "id_task" => $arr[1],
            "status" => $arr[0],
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

}
