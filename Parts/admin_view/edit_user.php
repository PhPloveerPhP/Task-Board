<?php if(isset($_SESSION["id"])): ?>
   <?php if ($_SESSION != "admin"): ?>
        <script>
            window.location.href = "../../index.php";
        </script>
    <?php endif ?>
<?php endif ?>


<?php if(isset($_POST["edit_usr"]))
    $info = (explode("," ,$_POST["edit_usr"]));
?>

<?php if(isset($_POST["update"]))
    include './admin_functions/user_editor.php' ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editor</title>
    <link rel="stylesheet" href="../../css/editor_task.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./fonts/icomoon/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
    <div class="father_editor_admin">
        <div class="form_cont_admin">            
            <form action="<?php echo $_SERVER["PHP_SELF"]?>" method="post">

                <div class="mb-3 d-flex flex-column">
                    <label for="Task Info" class="form-label">ID User</label>
                    <input disabled type="number" class="form-control" name="id" value="<?php echo $info[0] ?>" style="text-align: center;">
                    <input hidden name="id" value="<?php echo $info[0] ?>">
                </div>

                <div class="mb-3 d-flex flex-column">
                    <label for="Task Info" class="form-label">Name</label>
                    <input type="text" class="form-control" name="name" value="<?php echo $info[1] ?>" style="text-align: center;">
                </div>

                <div class="mb-3 d-flex flex-column">
                    <label for="Task Info" class="form-label">Email</label>
                    <input type="email" class="form-control" name="email" value="<?php echo $info[2] ?>" style="text-align: center;">
                </div>

                <div class="mb-3 d-flex flex-column">
                    <label for="Task Info" class="form-label">Password</label>
                    <input type="text" class="form-control" name="passw" value="<?php echo $info[3] ?>" style="text-align: center;">
                </div>

                <a href="./index.php" class="btn btn-card btn-dark" style="color: white;">Back</a>
                <button type="submit" class="btn btn-card btn-primary" name="update">Update</button>
            </form>
        </div>
    </div>
</body>
</html>