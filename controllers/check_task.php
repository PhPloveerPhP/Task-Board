<?php
var_dump($_POST["check"])
        // $result = [
        //     'error' => false,
        //     'message' => 'Tarea creada con exito'
        // ];

        // $config = include './config/config.php';

        // try {
        //     $dsn = 'mysql:host='.$config['db']['host'].';dbname='.$config['db']['name'];
        //     $conexion = new PDO($dsn, $config['db']['user'], $config['db']['pass'], $config['db']['options']);
            
        //     $task = [
        //         "id_user" => 1,
        //         "description" => $_POST["task_description"],
        //         "status" => $_POST["task_status"], 
        //     ];

        //     $sentence = $conexion->prepare("INSERT INTO tasks (id_user, description, status) values (?,?,?)");
        //     $sentence->bindParam(1, $task["id_user"]);
        //     $sentence->bindParam(2, $task["description"]);
        //     $sentence->bindParam(3, $task["status"]);

        //     $sentence->execute();

        // } catch (PDOException $error) {
        //     $result['error'] = true;
        //     $result['message'] = $error->getMessage();
        // }
    
?>