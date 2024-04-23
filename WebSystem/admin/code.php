<?php
session_start();
require 'dbcon.php';

if (isset($_POST['delete_event'])) {
    $event_id = $_POST['delete_event_id']; 
    $query = "DELETE FROM events WHERE id = '$event_id'";
    $result = mysqli_query($con, $query);
    if ($result) {
        $_SESSION['message'] = "Event deleted successfully";
        $_SESSION['msg_type'] = "success";
    } else {
        $_SESSION['message'] = "Failed to delete event";
        $_SESSION['msg_type'] = "danger";
    }
    header("location: index.php");
    exit;
}

if(isset($_POST['update_event'])) {
    $event_id = mysqli_real_escape_string($con, $_POST['event_id']);
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $venue = mysqli_real_escape_string($con, $_POST['venue']);
    $date = mysqli_real_escape_string($con, $_POST['date']);
    $time = mysqli_real_escape_string($con, $_POST['time']);
    $description = mysqli_real_escape_string($con, $_POST['description']);

    $query = "UPDATE events SET name='$name', venue='$venue', date='$date', time='$time', description='$description' WHERE id='$event_id'";
    $query_run = mysqli_query($con, $query);

    if($query_run) {
        $_SESSION['message'] = "Event Updated Successfully";
        header("Location: index.php");
        exit();
    } else {
        $_SESSION['message'] = "Event Not Updated";
        header("Location: index.php");
        exit();
    }
}

if(isset($_POST['save_event'])) {
    $name = mysqli_real_escape_string($con, $_POST['name']);
    $venue = mysqli_real_escape_string($con, $_POST['venue']);
    $date = mysqli_real_escape_string($con, $_POST['date']);
    $time = mysqli_real_escape_string($con, $_POST['time']);
    $description = mysqli_real_escape_string($con, $_POST['description']);

    // 将事件信息保存到数据库
    $query = "INSERT INTO events (name, venue, date, time, description) VALUES ('$name', '$venue', '$date', '$time', '$description')";
    $query_run = mysqli_query($con, $query);

    if($query_run) {
        $_SESSION['message'] = "Event saved successfully";
        $_SESSION['msg_type'] = "success";
    } else {
        $_SESSION['message'] = "Error: Event not saved";
        $_SESSION['msg_type'] = "danger";
    }

    header("location: index.php");
    exit();
}
?>
