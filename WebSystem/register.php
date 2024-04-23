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
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    // 检查密码是否匹配
    if ($password !== $confirm_password) {
        echo "<script>alert('Error: Passwords do not match');</script>";
        echo "<script>window.location.href = 'register.php';</script>";
        exit();
    }

    // 检查用户名是否已存在
    $sql_check_username = "SELECT * FROM user WHERE username = '$username'";
    $result_check_username = $conn->query($sql_check_username);
    if ($result_check_username->num_rows > 0) {
        echo "<script>alert('Error: Username already exists');</script>";
        echo "<script>window.location.href = 'register.php';</script>";
        exit();
    }

    // 检查邮箱地址是否已存在
    $sql_check_email = "SELECT * FROM user WHERE email = '$email'";
    $result_check_email = $conn->query($sql_check_email);
    if ($result_check_email->num_rows > 0) {
        echo "<script>alert('Error: Email already exists');</script>";
        echo "<script>window.location.href = 'register.php';</script>";
        exit();
    }

    // 对密码进行加密
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // 插入新用户数据
    $sql = "INSERT INTO user (email, username, password) VALUES ('$email', '$username', '$hashed_password')";
    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Registration successful');</script>";
        echo "<script>window.open('login.php', '_self');</script>";
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-GAMING</title>
    <link rel="stylesheet" href="style.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>
   <div class="main">
    <video autoplay loop muted plays-inline class="back-video">
        <source src="mian.mp4" type="video/mp4">
    </video>
    <div class="wrapper">
        <form method="post" action="">
            <h1>Register New Account</h1>
            <div class="input-box">
                <input type="text" name="email" placeholder="Email" required>
            </div>
            <div class="input-box">
                <input type="text" name="username" placeholder="Username" required>
            </div>
            <div class="input-box">
                <input type="password" name="password" placeholder="Password" required>
            </div>
            <div class="input-box">
                <input type="password" name="confirm_password" placeholder="Confirm Password" required>
            </div>
            <button type="submit" class="btn">Register</button>
        </form>
    </div>
   </div>
</body>
</html>
