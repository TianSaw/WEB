<?php
require 'dbcon.php';
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Event View</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Event View Details 
                            <a href="index.php" class="btn btn-danger float-end">BACK</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <?php
                        if(isset($_GET['id']))
                        {
                            $event_id = mysqli_real_escape_string($con, $_GET['id']);
                            $query = "SELECT * FROM events WHERE id='$event_id' ";
                            $query_run = mysqli_query($con, $query);

                            if(mysqli_num_rows($query_run) > 0)
                            {
                                $event = mysqli_fetch_array($query_run);
                                ?>
                                <div class="mb-3">
                                    <label>Event Name</label>
                                    <p class="form-control"><?= $event['name']; ?></p>
                                </div>
                                <div class="mb-3">
                                    <label>Event Venue</label>
                                    <p class="form-control"><?= $event['venue']; ?></p>
                                </div>
                                <div class="mb-3">
                                    <label>Event Date</label>
                                    <p class="form-control"><?= $event['date']; ?></p>
                                </div>
                                <div class="mb-3">
                                    <label>Event Time</label>
                                    <p class="form-control"><?= $event['time']; ?></p>
                                </div>
                                <div class="mb-3">
                                    <label>Event Description</label>
                                    <p class="form-control"><?= $event['description']; ?></p>
                                </div>
                                <?php
                            }
                            else
                            {
                                echo "<h4>No Such Id Found</h4>";
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
