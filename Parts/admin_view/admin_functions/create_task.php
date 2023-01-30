<?php

$result = [
    'error' => false,
    'message' => 'Usuario Creado',
];

$config = include '../../config/config.php';

if (trim($_POST["id_user"], " ") == "" || trim($_POST["description"], " ") == "" || trim($_POST["task_status"], " ") == " "){
    $result["error"] = true;
    $result["message"] = "Error: Campos Incompletos";
} else {
    try {
        $dsn = 'mysql:host=' . $config['db']['host'] . ';dbname=' . $config['db']['name'];
        $conexion = new PDO($dsn, $config['db']['user'], $config['db']['pass'], $config['db']['options']);
    
        $sentence = $conexion->prepare("INSERT INTO tasks (id_user, description, status) VALUES (:id_user, :description, :status)");
        $sentence->bindParam(':id_user', $_POST["id_user"]);
        $sentence->bindParam(':description', $_POST["description"]);
        $sentence->bindParam(':status', $_POST["task_status"]);
        $sentence->execute();
    
    } catch (PDOException $error) {
        $result['error'] = true;
        $result['message'] = $error->getMessage();
    }
}



?>