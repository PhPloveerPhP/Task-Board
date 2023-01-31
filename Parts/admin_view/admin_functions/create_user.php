<?php

$result = [
    'error' => false,
    'message' => 'Usuario Creado',
];

$config = include '../../config/config.php';

if (trim($_POST["usr_name"], " ") == "" || trim($_POST["usr_email"], " ") == "" || trim($_POST["usr_passw"], " ") == " "){
    $result["error"] = true;
    $result["message"] = "Error: Campos Incompletos";

} else {

        try {
            $dsn = 'mysql:host=' . $config['db']['host'] . ';dbname=' . $config['db']['name'];
            $conexion = new PDO($dsn, $config['db']['user'], $config['db']['pass'], $config['db']['options']);
        
            $sentence = $conexion->prepare("SELECT * FROM users");
            $sentence->execute();
            $all = $sentence->fetchAll();
            $handler = false;
        
            foreach ($all as $user){
                if ($user["email"] == $_POST["usr_email"]){ {
                    $handler = true;
                } 
            }

            if (!$handler) {
                $sentence = $conexion->prepare("INSERT INTO users (name, email, passw) VALUES (:name, :email, :passw)");
                $sentence->bindParam(':name', $_POST["usr_name"]);
                $sentence->bindParam(':email', $_POST["usr_email"]);
                $sentence->bindParam(':passw', $_POST["usr_passw"]);
                $sentence->execute();

            } else {
                $result["error"] = true;
                $result["message"] = "This email is already in use";
            }

        }
        
        } catch (PDOException $error) {
            $result['error'] = true;
            $result['message'] = $error->getMessage();
        }
        
    }



?>