<?php

$config = include '../config/config.php';
$result = [
    'error' => false,
    'message' => "",
];

try {
    $dsn = 'mysql:host=' . $config['db']['host'] . ';dbname=' . $config['db']['name'];
    $conexion = new PDO($dsn, $config['db']['user'], $config['db']['pass'], $config['db']['options']);

    $task = [
        "id_task" => $_POST["id_task"],
        "description" => $_POST["description"],
    ];

    $sentence = $conexion->prepare("UPDATE tasks set description = :description where id_task = :id_task");
    $sentence->bindParam(':id_task', $task["id_task"]);
    $sentence->bindParam(':description', $task["description"]);
    $sentence->execute();

?>

    <script>
        window.location.href = "../board.php";
    </script>

<?php

} catch (PDOException $error) {
    $result['error'] = true;
    $result['message'] = $error->getMessage();
}

?>