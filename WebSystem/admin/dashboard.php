<?php
// 连接数据库
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "blog";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// 查询数据库中用户的数量
$sql = "SELECT COUNT(*) AS user_count FROM user";
$result = $conn->query($sql);

$user_count = 0;
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $user_count = $row["user_count"];
}

$conn->close();
?>
<?php
// 连接数据库
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "blog";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// 查询数据库中事件的数量
$sql_event_count = "SELECT COUNT(*) AS event_count FROM events";
$result_event_count = $conn->query($sql_event_count);

$event_count = 0;
if ($result_event_count->num_rows > 0) {
    $row_event_count = $result_event_count->fetch_assoc();
    $event_count = $row_event_count["event_count"];
}

// 获取部分事件信息
$sql_events = "SELECT id, name, date, venue FROM events";
$result_events = $conn->query($sql_events);

$events = array();
if ($result_events->num_rows > 0) {
    while ($row_event = $result_events->fetch_assoc()) {
        $events[] = $row_event;
    }
}

$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">   
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <link rel="stylesheet" href="admin.css">
</head>
<body>
    <div class="sidebar">
        <div class="sidebar-brand">
            <h1><span class="lab la-accusoft"></span>E-GAMING</h1>
        </div>
        <div class="sidebar-menu">
            <ul>
                <li>
                    <a href="" class="active"><span class="las la-igloo"></span><span>Dashboard</span></a>
                </li>
                <li>
                    <a href="customer.php"><span class="las la-user"></span><span>Customer</span></a>
                </li>
                <li>
                    <a href="index.php"><span class="las la-clipboard"></span><span>Event</span></a>
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
        <header>
            <h2>
                <label for="">
                    <span class="las la-bars"></span>
                </label>
                Dashboard
            </h2>
            <div class="search-wrapper">
                <span class="las la-search"></span>
                <input type="search" placeholder="Search here">
            </div>
            <div class="user-wrapper">
                <img src="admin.png" width="40px" height="40px" alt="">
                <div>
                    <h4>Huat</h4>
                    <small>Super admin</small>
                </div>
            </div>
        </header>
        <main>
            <div class="cards">
                <!-- Display user count -->
                <div class="card-single">
                    <div>
                        <h1><?php echo $user_count; ?></h1>
                        <span>Customers</span>
                    </div>
                    <div>
                        <span class="las la-users"></span>
                    </div>
                </div>

                <!-- Display other card singles -->
                <div class="card-single">
                    <div>
                        <h1><?php echo $event_count; ?></h1>
                        <span>Events</span>
                    </div>
                    <div>
                        <span class="las la-clipboard"></span>
                    </div>
                </div>
                <div class="card-single">
                    <div>
                        <h1>24</h1>
                        <span>Booking</span>
                    </div>
                    <div>
                        <span class="las la-clipboard-list"></span>
                    </div>
                </div>

                <div class="card-single">
                    <div>
                        <h1>RM1500</h1>
                        <span>Income</span>
                    </div>
                    <div>
                        <span class="lab la-google-wallet"></span>
                    </div>
                </div>
            </div>

            <div class="recent-grid">
                <!-- Recent events and customers content goes here -->
            </div>
        </main>
    </div>
</body>
</html>
