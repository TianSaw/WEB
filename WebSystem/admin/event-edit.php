<?php
session_start();
require 'dbcon.php';

$event_id = $name = $venue = $date = $time = $description = '';

if(isset($_GET['id'])) {
    $event_id = mysqli_real_escape_string($con, $_GET['id']);
    $query = "SELECT * FROM events WHERE id='$event_id' ";
    $query_run = mysqli_query($con, $query);

    if(mysqli_num_rows($query_run) > 0) {
        $event = mysqli_fetch_array($query_run);
        $name = $event['name'];
        $venue = $event['venue'];
        $date = $event['date'];
        $time = $event['time'];
        $description = $event['description'];
    }
}

if(isset($_POST['save_event'])) {
    $name = $_POST['name'];
    $venue = $_POST['venue'];
    $date = $_POST['date'];
    $time = $_POST['time'];
    $description = $_POST['description'];

    // 将事件信息保存到数据库
    $query = "UPDATE events SET name='$name', venue='$venue', date='$date', time='$time', description='$description' WHERE id='$event_id' ";
    mysqli_query($con, $query);

    $_SESSION['message'] = "Event updated successfully";
    $_SESSION['msg_type'] = "success";

    header("location: index.php");
}
?>
<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Hello, world!</title>
</head>
<body>
    <div class="container mt-5">
        <?php include('message.php'); ?>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Event Edit
                        <a href="index.php" class="btn bttn-danger float-end">Back</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <form action="<?php echo $_SERVER['PHP_SELF'] . "?id=$event_id"; ?>" method="POST">
                            <div class="mb-3">
                                <label>Event Name</label>
                                <input type="text" name="name" class="form-control" value="<?php echo $name; ?>">
                            </div>
                            <div class="mb-3">
                                <label>Event Venue </label>
                                <input type="text" name="venue" class="form-control" value="<?php echo $venue; ?>">
                            </div>
                            <div class="mb-3">
                                <label>Event Date </label>
                                <input type="date" name="date" class="form-control" value="<?php echo $date; ?>">
                            </div>
                            <div class="mb-3">
                                <label>Event Time</label>
                                <input type="time" name="time" class="form-control" value="<?php echo $time; ?>">
                            </div>
                            <div class="mb-3">
                                <label>Event Description</label>
                                <textarea name="description" class="form-control"><?php echo $description; ?></textarea>
                            </div>
                            <div class="mb-3">
                                <button type="submit" name="save_event" class="btn btn-primary">Save Event</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>
