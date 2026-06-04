<?php
include '../config/db.php';
session_start();
if (!isset($_SESSION['admin'])) { header("Location: login.php"); exit(); }
$res = mysqli_query($conn, "SELECT * FROM users");
?>
<!DOCTYPE html>
<html>
<head><link rel="stylesheet" href="../assets/style.css"></head>
<body>
    <div class="header-nav"><div>Admin Portal</div><div><a href="dashboard.php">Dashboard</a><a href="../logout.php">Logout</a></div></div>
    <div class="container">
        <h2>Registered Consumers</h2>
        <table>
            <tr><th>Service No</th><th>Name</th><th>Type</th><th>Reading</th><th>Action</th></tr>
            <?php while($row = mysqli_fetch_assoc($res)) { ?>
            <tr>
                <td><?php echo $row['service_number']; ?></td>
                <td><?php echo $row['name']; ?></td>
                <td><?php echo ucfirst($row['type']); ?></td>
                <td><?php echo $row['current_reading']; ?></td>
                <td><a href="process.php?action=delete_user&id=<?php echo $row['id']; ?>" style="color:red;" onclick="return confirm('Delete User?')">Remove</a></td>
            </tr>
            <?php } ?>
        </table>
    </div>
</body>
</html>