<?php

$config = include './config/config.php';

$result = [
    'error' => true,
    'message' => '',
];

try {

    $dsn = 'mysql:host=' . $config['db']['host'] . ';dbname=' . $config['db']['name'];
    $conection = new PDO($dsn, $config['db']['user'], $config['db']['pass'], $config['db']['options']);

    $sentence = $conection->prepare("SELECT * FROM users");
    $sentence->execute();
    $arr_users = $sentence->fetchAll(PDO::FETCH_ASSOC);
    $handler = false;

    $user = [
        'name' => $_POST["username"],
        'passw' => $_POST["password"],
        'email' => $_POST["email"],
    ];

    foreach ($arr_users as $users => $value) {
        if ($value["name"] == $user["name"] || $value["email"] == $user["email"]) {
            $handler = true;
        }

    }

    if (!$handler) {
        $sentence = $conection->prepare("INSERT INTO users (name, email, passw) values (?,?,?)");
        $sentence->bindParam(1, $user["name"]);
        $sentence->bindParam(2, $user["email"]);
        $sentence->bindParam(3, $user["passw"]);
        $sentence->execute();?>

        <script>
          window.location.href = "./index.php";
        </script>

        <?php

    } else {
        $result["error"] = true;
        $result["message"] = " The email or username already exists";
    }

} catch (PDOException $error) {
    $result['error'] = true;
    $result['message'] = $error->getMessage();
}

?>