<?php
session_start();
require 'dbcon.php';
?>
<!doctype html>
<html lang="en">
<head>
  
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="admin.css">
<link rel="stylesheet" href="index.css">

<!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

<title>Events CRUD</title>
</head>
<body>
<div class="sidebar">
        <div class="sidebar-brand">
            <h1><span class="lab la-accusoft"></span>E-GAMING</h1>
        </div>
        <div class="sidebar-menu">
            <ul>
                <li>
                    <a href="dashboard.php"><span class="las la-igloo"></span><span>Dashboard</span></a>
                </li>
                <li>
                    <a href="customer.php"><span class="las la-user"></span><span>Customer</span></a>
                </li>
                <li>
                    <a href="index.php" class="active"><span class="las la-clipboard"></span><span>Event</span></a>
                </li>
                <li>
                    <a href=""><span class="las la-clipboard-list"></span><span>Booking</span></a>
                </li>
                <li>
                    <a href="../index.php"><span class="las la-user-circle"></span><span>Log Out</span></a>
                </li>
            </ul>
        </div>
    </div>
    <div class="main-content">
<div class="container mt-4">

    <?php include('message.php'); ?>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Events Details
                        <a href="event-create.php" class="btn btn-primary float-end">Add Events</a>
                    </h4>
                </div>
                <div class="card-body">

                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Event Name</th>
                                <th>Event Venue</th>
                                <th>Event Date</th>
                                <th>Event Time</th>
                                <th>Event Description</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                $query = "SELECT * FROM events";
                                $query_run = mysqli_query($con, $query);

                                if(mysqli_num_rows($query_run) > 0)
                                {
                                    foreach($query_run as $event)
                                    {
                                        ?>
                                        <tr>
                                            <td><?= $event['id']; ?></td>
                                            <td><?= $event['name']; ?></td>
                                            <td><?= $event['venue']; ?></td>
                                            <td><?= $event['date']; ?></td>
                                            <td><?= $event['time']; ?></td>
                                            <td><?= $event['description']; ?></td>
                                            <td>
                                                <a href="event-view.php?id=<?= $event['id']; ?>" class="btn btn-info btn-sm">View</a>
                                                <a href="event-edit.php?id=<?= $event['id']; ?>" class="btn btn-success btn-sm">Edit</a>
                                                <form action="code.php" method="POST" class="d-inline" onsubmit="return confirmDelete()">
                                                    <input type="hidden" name="delete_event_id" value="<?= $event['id']; ?>">
                                                    <button type="submit" name="delete_event" class="btn btn-danger btn-sm">Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                        <?php
                                    }
                                }
                                else
                                {
                                    echo "<h5> No Record Found </h5>";
                                }
                            ?>
                            
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
</div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
function confirmDelete() {
    return confirm("Are you sure you want to delete this event?");
}
</script>
                               
</body>
</html>
