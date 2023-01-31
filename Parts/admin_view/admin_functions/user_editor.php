<?php

$config = include '../../config/config.php';

$result = [
    'error' => false,
    'message' => "",
];

try {
    $dsn = 'mysql:host=' . $config['db']['host'] . ';dbname=' . $config['db']['name'];
    $conexion = new PDO($dsn, $config['db']['user'], $config['db']['pass'], $config['db']['options']);

    $sentence = $conexion->prepare("SELECT * FROM users");
    $sentence->execute();
    $all = $sentence->fetchAll();
    $handler = false;

    foreach ($all as $user) {
        if ($user["email"] == $_POST["email"]) {{
            $handler = true;
        }
        }

        if (!$handler) {
            $sentence = $conexion->prepare("UPDATE users set name = :name, email = :email, passw = :passw where id_user = :id_user");
            $sentence->bindParam(':name', $_POST["name"]);
            $sentence->bindParam(':email', $_POST["email"]);
            $sentence->bindParam(':passw', $_POST["passw"]);
            $sentence->bindParam(':id_user', $_POST["id"]);
            $sentence->execute();
            ?>
            <script>
                window.location.href = "./index.php";
            </script>
        <?php } else {?>
            <script>
                window.location.href = "./index.php";
            </script>
        <?php }?>

<?php
}
} catch (PDOException $error) {
    $result['error'] = true;
    $result['message'] = $error->getMessage();
}?>