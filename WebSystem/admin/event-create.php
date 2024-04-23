<?php
session_start();

$host = "localhost"; 
$username = "root"; 
$password = ""; 
$database = "blog"; 

$con = mysqli_connect($host, $username, $password, $database);

if(mysqli_connect_errno()) {
    die("Connection failed: " . mysqli_connect_error());
}

if(isset($_POST['save_event'])) {
    $name = $_POST['name'];
    $venue = $_POST['venue'];
    $date = $_POST['date'];
    $time = $_POST['time'];
    $description = $_POST['description'];

    $query = "INSERT INTO events (name, venue, date, time, description) VALUES ('$name', '$venue', '$date', '$time', '$description')";
    mysqli_query($con, $query);

    $_SESSION['message'] = "Event saved successfully";
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Add Event</title>
</head>
<body>
    <div class="container mt-5">
        <?php include('message.php'); ?>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Event Add
                        <a href="index.php" class="btn bttn-danger float-end">Back</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <form action="code.php" method="POST">
                            <div class="mb-3">
                                <label>Event Name</label>
                                <input type="text" name="name" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label>Event Venue</label>
                                <input type="text" name="venue" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label>Event Date</label>
                                <input type="date" name="date" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label>Event Time</label>
                                <input type="time" name="time" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label>Event Description</label>
                                <textarea name="description" class="form-control"></textarea>
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
