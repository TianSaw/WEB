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
                    <a href="dashboard.php"><span class="las la-igloo"></span><span>Dashboard</span></a>
                </li>
                <li>
                    <a href="customer.php" class="active"><span class="las la-user"></span><span>Customer</span></a>
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
    <?php
// Connect to the database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "blog";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve user data
$sql_user = "SELECT * FROM user";
$result_user = $conn->query($sql_user);

// Retrieve activity data
$sql_activity = "SELECT * FROM user_activity";
$result_activity = $conn->query($sql_activity);

// Close the connection
$conn->close();
?>
  <h1>User Information</h1>
    
    <?php if ($result_user->num_rows > 0): ?>
        <table>
            <tr>
                <th>User ID</th>
                <th>Username</th>
                <th>Email</th>
                <th>Login Time</th>
                <th>Logout Time</th>
            </tr>
            <?php while ($row_user = $result_user->fetch_assoc()): ?>
                <tr>
                    <td><?php echo $row_user["id"]; ?></td>
                    <td><?php echo $row_user["username"]; ?></td>
                    <td><?php echo $row_user["email"]; ?></td>
                    <?php
                    // Find the corresponding activity for the user
                    $activity_found = false;
                    while ($row_activity = $result_activity->fetch_assoc()) {
                        if ($row_activity["user_id"] == $row_user["id"]) {
                            echo "<td>" . $row_activity["login_time"] . "</td>";
                            echo "<td>" . $row_activity["logout_time"] . "</td>";
                            $activity_found = true;
                            break; // Stop searching for activity once found
                        }
                    }
                    // If no activity found, display empty cells
                    if (!$activity_found) {
                        echo "<td></td><td></td>";
                    }
                    ?>
                </tr>
            <?php endwhile; ?>
        </table>
    <?php else: ?>
        <p>No users found.</p>
    <?php endif; ?>
</body>
</html>

</body>
</html>