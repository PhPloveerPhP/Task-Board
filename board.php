<?php 

include './functions/functions.php';


$error = false;
$config = include './config/config.php';

try {
    $dsn = 'mysql:host=' . $config['db']['host'] . ';dbname=' . $config['db']['name'];
    $conexion = new PDO($dsn, $config['db']['user'], $config['db']['pass'], $config['db']['options']);
    $query = "SELECT * FROM tasks";
    $sentence = $conexion->prepare($query);
    $sentence->execute();
    $tasks = $sentence->fetchAll();

} catch (PDOException $error ) {
    $error = $error->getMessage();
}
?>




<?php if ($tasks && $sentence->rowCount() > 0): ?>


    <?php include "Parts/board_header.php" ?>

        <body>
            <main class="content">
                <div class="container p-0">
                    <h1 class="h3 mb-3">My Board</h1>
                    
                    <div class="row">

                            <!-- Upcoming Column -->
                        <div class="col-12 col-lg-6 col-xl-3">
                            <div class="card card-border-primary">
                                <div class="card-header">
                                    <h5 class="card-title">Upcoming</h5>
                                    <h6 class="card-subtitle text-muted">
                                        Nam pretium turpis et arcu. Duis arcu tortor.
                                    </h6>
                                </div>
                                <div class="card-body p-3">

                                    <?php foreach($tasks as $task => $value) {
                                        if ($value["status"] == "U") {
                                            $card = create_card($value["description"]);
                                            echo $card;
                                    }} ?>

                                    <a href="#" class="btn btn-card btn-primary btn-block" type="button" data-toggle="modal" data-target="#exampleModal">Add new</a>
                                </div>
                            </div>
                        </div>

                        <!-- In Progress Column-->
                        <div class="col-12 col-lg-6 col-xl-3">
                            <div class="card card-border-warning">
                                <div class="card-header">
                                    <h5 class="card-title">In Progress</h5>
                                    <h6 class="card-subtitle text-muted">
                                        Nam pretium turpis et arcu. Duis arcu tortor.
                                    </h6>
                                </div>
                                <div class="card-body">
                                    
                                     <!-- Insert tasks -->
                                    <?php foreach($tasks as $task => $value) {
                                        if ($value["status"] == "P") {
                                            $card = create_card($value["description"]);
                                            echo $card;
                                    }}?>
                                
                                    <a href="#" class="btn btn-card btn-primary btn-block">Add new</a>
                                </div>
                            </div>
                        </div>

                        <!-- On Hold Column-->
                        <div class="col-12 col-lg-6 col-xl-3">
                            <div class="card card-border-danger">
                                <div class="card-header">
                                    <h5 class="card-title">On hold</h5>
                                    <h6 class="card-subtitle text-muted">
                                        Nam pretium turpis et arcu. Duis arcu tortor.
                                    </h6>
                                </div>
                                <div class="card-body">
                                        
                                <!-- Insert tasks -->
                                <?php foreach($tasks as $task => $value) {                                        
                                    if ($value["status"] == "H") {
                                        $card = create_card($value["description"]);
                                        echo $card;
                                }}?>

                                    <a href="#" class="btn btn-card btn-primary btn-block">Add new</a>
                                </div>
                            </div>
                        </div>

                        <!-- Completed Column -->
                        <div class="col-12 col-lg-6 col-xl-3">
                            <div class="card card-border-success">
                                <div class="card-header">
                                    <h5 class="card-title">Completed</h5>
                                    <h6 class="card-subtitle text-muted">
                                        Nam pretium turpis et arcu. Duis arcu tortor.
                                    </h6>
                                </div>
                                <div class="card-body">
                                    
                                <!-- Insert tasks -->
                                <?php foreach($tasks as $task => $value) {      
                                    if ($value["status"] == "C") {
                                        $card = create_card($value["description"]);
                                        echo $card;
                                }}?>

                                    <a href="#" class="btn btn-card btn-primary btn-block">Add new</a>
                                </div>
                            </div>
                        </div>

                    </div>

                    
                </div>
            </main>
        
    
    <?php include "Parts/modals.php" ?>
    <?php include "Parts/footer.php" ?>

<?php else: ?>

    <html>
        <h1>ERROR</h1>
    </html>

<?php endif ?>