<?php 


$result = [
    'error' => false,
    'message' => 'User deleted successfully',
];

$config = include '../../config/config.php';

try {
    $dsn = 'mysql:host=' . $config['db']['host'] . ';dbname=' . $config['db']['name'];
    $conexion = new PDO($dsn, $config['db']['user'], $config['db']['pass'], $config['db']['options']);

    $sentence = $conexion->prepare("DELETE FROM users WHERE id_user = :id_user");
    $sentence->bindParam(':id_user', $_POST["delete_usr"]);
    $sentence->execute();

} catch (PDOException $error) {
    $result['error'] = true;
    $result['message'] = $error->getMessage();
}


?>