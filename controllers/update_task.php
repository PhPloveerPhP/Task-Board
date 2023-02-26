<?php

$config = include '../config/config.php';
// Define error and success messages
$result = [
    'error' => false,
    'message' => "",
];

try {

    $dsn = 'mysql:host=' . $config['db']['host'] . ';dbname=' . $config['db']['name'];
    $conection = new PDO($dsn, $config['db']['user'], $config['db']['pass'], $config['db']['options']);

    // Get Data
    $sentence = $conection->prepare("SELECT id_task FROM tasks WHERE id_user = :id_user");
    $sentence->bindParam(':id_user', $_SESSION["id"]);
    $sentence->execute();
    $arr = $sentence->fetchAll();
    
    $handler = false;
    
    $list_id = [];
    foreach ($arr as $task) {
        array_push($list_id, $task['id_task']);
    }
    // Check user task
    $handler = in_array($_POST['id_task'], $list_id);
    
    // If task is not from user redirect to board
    if (!$handler) {
        echo '<script>
        window.location.href = "../board.php";
        </script>';

    } else {

        // Update task and redirect to board
        $task = [  
            "id_task" => $_POST["id_task"],
            "description" => $_POST["description"],
        ];

        $sentence = $conection->prepare("UPDATE tasks set description = :description where id_task = :id_task");
        $sentence->bindParam(':id_task', $task["id_task"]);
        $sentence->bindParam(':description', $task["description"]);
        $sentence->execute();

        echo '<script>
        window.location.href = "../board.php";
        </script>';
    }

} catch (PDOException $error) {
    $result['error'] = true;
    $result['message'] = $error->getMessage();
}
