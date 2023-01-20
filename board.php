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

// if ($tasks && $sentence-> rowCount() > 0) {
                //     foreach ($tasks as $task => $value) {
                //     echo $value["description"];
                //     }
                // }

?>




<?php if ($tasks && $sentence->rowCount() > 0): ?>


    <?php include "Parts/board_header.php" ?>


        <body>
            <main class="content">
                <div class="container p-0">
                    <h1 class="h3 mb-3">Kanban Board</h1>
                    
                    <div class="row">

                            <!-- Upcoming Column -->
                        <div class="col-12 col-lg-6 col-xl-3">
                            <div class="card card-border-primary">
                                <div class="card-header">
                                    <div class="card-actions float-right">
                                        <div class="dropdown show">
                                            <a href="#" data-toggle="dropdown" data-display="static">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                                    stroke-linecap="round" stroke-linejoin="round"
                                                    class="feather feather-more-horizontal align-middle">
                                                    <circle cx="12" cy="12" r="1"></circle>
                                                    <circle cx="19" cy="12" r="1"></circle>
                                                    <circle cx="5" cy="12" r="1"></circle>
                                                </svg>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <a class="dropdown-item" href="#">Action</a>
                                                <a class="dropdown-item" href="#">Another action</a>
                                                <a class="dropdown-item" href="#">Something else here</a>
                                            </div>
                                        </div>
                                    </div>
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

                                    <a href="#" class="btn btn-card btn-primary btn-block">Add new</a>
                                </div>
                            </div>
                        </div>

                        <!-- In Progress Column-->
                        <div class="col-12 col-lg-6 col-xl-3">
                            <div class="card card-border-warning">
                                <div class="card-header">
                                    <div class="card-actions float-right">
                                        <div class="dropdown show">
                                            <a href="#" data-toggle="dropdown" data-display="static">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                                    stroke-linecap="round" stroke-linejoin="round"
                                                    class="feather feather-more-horizontal align-middle">
                                                    <circle cx="12" cy="12" r="1"></circle>
                                                    <circle cx="19" cy="12" r="1"></circle>
                                                    <circle cx="5" cy="12" r="1"></circle>
                                                </svg>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <a class="dropdown-item" href="#">Action</a>
                                                <a class="dropdown-item" href="#">Another action</a>
                                                <a class="dropdown-item" href="#">Something else here</a>
                                            </div>
                                        </div>
                                    </div>
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
                                    <div class="card-actions float-right">
                                        <div class="dropdown show">
                                            <a href="#" data-toggle="dropdown" data-display="static">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                                    stroke-linecap="round" stroke-linejoin="round"
                                                    class="feather feather-more-horizontal align-middle">
                                                    <circle cx="12" cy="12" r="1"></circle>
                                                    <circle cx="19" cy="12" r="1"></circle>
                                                    <circle cx="5" cy="12" r="1"></circle>
                                                </svg>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <a class="dropdown-item" href="#">Action</a>
                                                <a class="dropdown-item" href="#">Another action</a>
                                                <a class="dropdown-item" href="#">Something else here</a>
                                            </div>
                                        </div>
                                    </div>
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
                                    <div class="card-actions float-right">
                                        <div class="dropdown show">
                                            <a href="#" data-toggle="dropdown" data-display="static">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                                    stroke-linecap="round" stroke-linejoin="round"
                                                    class="feather feather-more-horizontal align-middle">
                                                    <circle cx="12" cy="12" r="1"></circle>
                                                    <circle cx="19" cy="12" r="1"></circle>
                                                    <circle cx="5" cy="12" r="1"></circle>
                                                </svg>
                                            </a>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <a class="dropdown-item" href="#">Action</a>
                                                <a class="dropdown-item" href="#">Another action</a>
                                                <a class="dropdown-item" href="#">Something else here</a>
                                            </div>
                                        </div>
                                    </div>
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

    <?php include "Parts/footer.php" ?>

<?php else: ?>

    <html>
        <h1>ERROR</h1>
    </html>

<?php endif ?>