<?php

// Define error and success messages
$result = [
    'error' => false,
    'message' => 'Task created successfully',
];

// Check if the form was well submitted
if (trim($_POST["task_description"]) == "" || $_POST["task_status"] == "Choose...") {
    $result = [
        'error' => true,
        'message' => 'Error creating task',
    ];

} else {
    $config = include './config/config.php';

    try {
        $dsn = 'mysql:host=' . $config['db']['host'] . ';dbname=' . $config['db']['name'];
        $conection = new PDO($dsn, $config['db']['user'], $config['db']['pass'], $config['db']['options']);
        // Insert data
        $sentence = $conection->prepare("INSERT INTO tasks (id_user, description, status) values (?,?,?)");
        $sentence->bindParam(1, $_SESSION["id"]);
        $sentence->bindParam(2, $_POST["task_description"]);
        $sentence->bindParam(3, $_POST["task_status"]);
        // Execute sentence
        $sentence->execute();

    } catch (PDOException $error) {
        $result['error'] = true;
        $result['message'] = $error->getMessage();
    }
}
