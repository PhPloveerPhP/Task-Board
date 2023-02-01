<?php
$config = include './config/config.php';

if ($_POST["username"] == $_ENV["ADMIN_USER"] && $_POST["password"] == $_ENV["ADMIN_PASS"]) {
    $_SESSION["admin"] = 1;
    ?>
    <script>
        window.location.href = "./Parts/admin_view/index.php";
    </script>

<?php } else {

    try {

        $dsn = 'mysql:host=' . $config['db']['host'] . ';dbname=' . $config['db']['name'];
        $conection = new PDO($dsn, $config['db']['user'], $config['db']['pass'], $config['db']['options']);

        $sentence = $conection->prepare("SELECT * FROM users");
        $sentence->execute();
        $arr_users = $sentence->fetchAll(PDO::FETCH_ASSOC);
        $handler = "";

        $user = [
            'name' => $_POST["username"],
            'passw' => $_POST["password"],
        ];

        foreach ($arr_users as $users => $value) {
            if ($value["name"] == $user["name"]) {
                $handler = true;
            }
        }

        if ($handler) {

            $sentence = $conection->prepare("SELECT passw, id_user from users where name='" . $user["name"] . "'");
            $sentence->execute();
            $find_user = $sentence->fetch(PDO::FETCH_ASSOC);

            if ($user["passw"] == $find_user["passw"]) {
                $_SESSION["id"] = $find_user["id_user"];
                ?>

                <script>
                    window.location.href = "./board.php";
                </script>

            <?php

            } else {
                $result = [
                    'error' => true,
                    'message' => 'Incorrect password',
                ];
            }

        } else {
            $result["error"] = true;
            $result["message"] = " This user doesn't exist";
        }

    } catch (PDOException $error) {
        $result['error'] = true;
        $result['message'] = $error->getMessage();
    }
}

?>