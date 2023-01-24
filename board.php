<!-- Create Task -->
<?php if (isset($_POST["submit"]))
    include "./controllers/create_task.php" 
?>

<!-- Delete Task -->
<?php if(isset($_POST["delete"]))
    include "./controllers/delete_task.php"
?>

<!-- Check Task -->
<?php if(isset($_POST["check"]))
    include "./controllers/check_task.php"
?>

<!-- Showing Tasks -->
<?php include './controllers/show_tasks.php'?>


<!-- Showing Array of Tasks -->

<?php include "Parts/board_header.php"?>

    <body>
    <?php if (isset($result)):?>
            <div class="container mt-3">
                <div class="row">
                    <div class="col-md-12">
                        <div class="alert alert-<?= $result['error'] ? 'danger' : 'success' ?>" role="alert">
                            <?= $result['message'] ?>
                        </div>
                    </div>
                </div>
            </div>
            <?php endif?>
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

                                <?php foreach ($tasks as $task => $value) {
                                        if ($value["status"] == "U") {
                                            $card = create_card(
                                                htmlspecialchars($value["description"]),
                                                htmlspecialchars($value["id_task"]),
                                                htmlspecialchars($value["status"])
                                            );
                                            echo $card;
                                    }}?>


                                <button href="#" data-toggle="modal" data-target="#create_task"
                                    class="btn btn-card btn-primary btn-block">Add new</button>

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
                                <?php foreach ($tasks as $task => $value) {
                                        if ($value["status"] == "P") {
                                            $card = create_card(
                                                htmlspecialchars($value["description"]),
                                                htmlspecialchars($value["id_task"]),
                                                htmlspecialchars($value["status"])
                                            );
                                            echo $card;
                                    }}?>


                                <button href="#" data-toggle="modal" data-target="#create_task"
                                    class="btn btn-card btn-primary btn-block">Add new</button>

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
                                <?php foreach ($tasks as $task => $value) {
                                        if ($value["status"] == "H") {
                                            $card = create_card(
                                                htmlspecialchars($value["description"]),
                                                htmlspecialchars($value["id_task"]),
                                                htmlspecialchars($value["status"])
                                            );
                                            echo $card;
                                    }}?>


                                <button href="#" data-toggle="modal" data-target="#create_task"
                                    class="btn btn-card btn-primary btn-block">Add new</button>

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
                                <?php foreach ($tasks as $task => $value) {
                                        if ($value["status"] == "C") {
                                            $card = create_card(
                                                htmlspecialchars($value["description"]),
                                                htmlspecialchars($value["id_task"]),
                                                htmlspecialchars($value["status"])
                                            );
                                            echo $card;
                                    }}?>

                                <button href="#" data-toggle="modal" data-target="#create_task"
                                    class="btn btn-card btn-primary btn-block" >Add new</button>
                            </div>
                        </div>
                    </div>

                </div>
            </div>



        </main>


        <?php include "Parts/modals.php"?>
        <?php include "Parts/footer.php"?>


