<?php 
session_start();

if (isset($_GET['edit'])){
    $info =  explode(',', $_GET['edit']);
}?>

<?php if(isset($_POST["update"]))
    include "../controllers/update_task.php" ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task Editor</title>
    <link rel="stylesheet" href="../css/editor_task.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body style="background-color: #f8fafb;">
    <div class="father_editor">
        <div class="jumbotron" style="background: transparent; text-align:center;">            
            <form action="<?php echo $_SERVER["PHP_SELF"]?>" method="post">
                <div class="mb-3 d-flex flex-column">
                    <h2 for="Task Info" class="form-h1">Task Editor</h2>
                    <textarea style="background-color: #f8fafb; border: 1px solid; padding: 10px" type="text" class="form-control" rows="3" cols="30" placeholder="<?php echo $info[1] ?>" name="description" required></textarea>
                    <input type="text" hidden name="id_task" value="<?php echo $info[0]?>">
                </div>
                <a href="../board.php" class="btn btn-card btn-dark" style="color: white;">Back</a>
                <button type="submit" class="btn btn-card btn-primary" name="update">Update</button>
            </form>
        </div>
    </div>
</body>
</html>