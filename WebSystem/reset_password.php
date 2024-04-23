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
    $new_password = $_POST['new_password'];
    $confirm_new_password = $_POST['confirm_new_password'];

    // 检查密码是否为空
    if (empty($new_password) || empty($confirm_new_password)) {
        echo "<script>alert('Please enter both new password and confirm password');</script>";
        exit;
    }

    if ($new_password === $confirm_new_password) {
        // 加密新密码
        $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);

        // 使用预处理语句防止 SQL 注入攻击
        $sql = "UPDATE user SET password = ? WHERE username = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ss", $hashed_password, $username);

        if ($stmt->execute()) {
            echo "<script>alert('Password updated successfully');</script>";
            echo "<script>window.location.href = 'login.php';</script>";
            exit;
        } else {
            echo "<script>alert('Error updating password');</script>";
        }
    } else {
        echo "<script>alert('Passwords do not match');</script>";
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="main">
        <video autoplay loop muted plays-inline class="back-video">
            <source src="mian.mp4" type="video/mp4">
        </video>
        <div class="wrapper">
            <h1>Reset Password</h1>
            <form method="post" action="">
                <input type="hidden" name="username" value="<?php echo isset($_GET['username']) ? htmlspecialchars($_GET['username']) : ''; ?>">
                <div class="input-box">
                    <label for="new_password">New Password:</label><br>
                    <input type="password" id="new_password" name="new_password" required><br><br>
                </div>
                <div class="input-box">
                    <label for="confirm_new_password">Confirm New Password:</label><br>
                    <input type="password" id="confirm_new_password" name="confirm_new_password" required><br><br>
                </div>
                <div class="input-box">
                    <button type="submit" class="btn">Reset Password</button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
