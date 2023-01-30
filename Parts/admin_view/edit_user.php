

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editor</title>
    <link rel="stylesheet" href="../css/editor_task.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./fonts/icomoon/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
    <div class="father_editor">
        <div class="form_cont">            
            <form action="<?php echo $_SERVER["PHP_SELF"]?>" method="post">
                <div class="mb-3 d-flex flex-column">
                    <label for="Task Info" class="form-label"></label>
                    <textarea type="text" class="form-control" placeholder="<?php echo $info[1] ?>" name="description" required></textarea>
                    <input type="text" hidden name="id_task" value="<?php echo $info[0]?>">
                </div>
                <a href="../board.php" class="btn btn-card btn-dark" style="color: white;">Back</a>
                <button type="submit" class="btn btn-card btn-primary" name="update">Update</button>
            </form>
        </div>
    </div>
</body>
</html>