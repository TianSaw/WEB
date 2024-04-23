<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "blog";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $email = $_POST['email'];

    // 查询数据库以获取与提供的用户名关联的电子邮件地址
    $sql = "SELECT * FROM user WHERE username = '$username'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $db_email = $row['email'];

        if ($email === $db_email) {
            // 将用户名和电子邮件地址传递到重置密码页面
            header("Location: reset_password.php?username=$username&email=$email");
            exit();
        } else {
            echo "<script>alert('Username and email do not match');</script>";
            echo "<script>window.location.href = 'login.php';</script>";
        }
    } else {
        echo "<script>alert('Username not found');</script>";
        echo "<script>window.location.href = 'login.php';</script>";
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="main">
<video autoplay loop muted plays-inline class="back-video">
        <source src="mian.mp4" type="video/mp4">
    </video>
    <div class="wrapper">
    <h1>Forgot Password</h1>
    <form method="post" action="">
    <div class="input-box">
        <label for="username">Username:</label><br>
        <input type="text" id="username" name="username" required><br><br>
        </div>
        <div class="input-box">
        <label for="email">Email:</label><br>
        <input type="email" id="email" name="email" required>
        </div>
        <button type="submit" class="btn"value="Reset Password">Reset Password</button>
    </form>
    </div>
    </div>
</body>
</html>
