<?php
session_start();

$servername = "localhost";
$username = "root"; 
$password = ""; 
$dbname = "blog";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// 检查是否有有效的 "remember me" cookie
if(isset($_COOKIE['remember_me'])) {
    // 通过 cookie 中存储的信息来自动填充用户名和密码
    $cookie_data = json_decode($_COOKIE['remember_me'], true);
    $username = $cookie_data['username'];
    $password = $cookie_data['password'];
} else {
    $username = "";
    $password = "";
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $input_username = $_POST['username'];
    $input_password = $_POST['password'];
    $remember_me = isset($_POST['remember_me']) ? true : false;

    // 验证用户名和密码
    $sql = "SELECT * FROM user WHERE username = '$input_username'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $hashed_password = $row['password'];
        if (password_verify($input_password, $hashed_password)) {
            // 如果用户选择了 "Remember Me"，创建一个持久性的 cookie
            if($remember_me) {
                $cookie_data = array(
                    'username' => $input_username,
                    'password' => $input_password
                );
                $cookie_data_json = json_encode($cookie_data);
                setcookie('remember_me', $cookie_data_json, time() + (86400 * 30), '/'); // 30 days
            } else {
                // 如果用户未选择 "Remember Me"，清除保存的 cookie
                setcookie('remember_me', '', time() - 3600, '/'); // 删除 cookie
            }

            // 设置用户会话
            $_SESSION['username'] = $input_username;
            $_SESSION['password'] = $input_password;
            // 跳转到用户页面或管理员页面
            if ($input_username == "admin") {
                header("Location: /admin/dashboard.php");
            } else {
                header("Location: /user/home.php");
            }
            exit();
        } else {
            echo "<script>alert('Invalid username or password');</script>";
            echo "<script>window.location.href = 'login.php';</script>";
        }
    } else {
        echo "<script>alert('User not found');</script>";
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
    <title>E-GAMING</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
    </header>
   <div class="main">
    <video autoplay loop muted plays-inline class="back-video">
        <source src="mian.mp4" type="video/mp4">
    </video>
    <div class="wrapper">
        <form method="post" action="login.php">
            <h1>Login Your Account</h1>
            <div class="input-box">
                <input type="text" name="username" placeholder="Username" value="<?php echo $username; ?>" required>
            </div>
            <div class="input-box">
                <input type="password" name="password" placeholder="Password" value="<?php echo $password; ?>" required>
            </div>
            <div class="remember-forgot">
                <label><input type="checkbox" name="remember_me" <?php if(isset($_COOKIE['remember_me'])) echo "checked"; ?>>Remember me</label>
                <a href="forgot_password.php">Forgot password</a>
            </div>
            <button type="submit" class="btn">Login</button>

            <div class="register-link">
                <p>Don't have an account?<a href="register.php">Register</a></p>
            </div>
        </form>
    </div>
   </div>
</body>
</html>
