<?php
include '../config/db.php';
session_start();
if (!isset($_SESSION['admin'])) { header("Location: login.php"); exit(); }
$res = mysqli_query($conn, "SELECT * FROM employees");
?>
<!DOCTYPE html>
<html>
<head><link rel="stylesheet" href="../assets/style.css"></head>
<body>
    <div class="header-nav"><div>Admin Portal</div><div><a href="dashboard.php">Dashboard</a><a href="../logout.php">Logout</a></div></div>
    <div class="container">
        <h2>Employee Directory</h2>
        <table>
            <tr><th>Name</th><th>Email</th><th>Phone</th><th>Action</th></tr>
            <?php while($row = mysqli_fetch_assoc($res)) { ?>
            <tr>
                <td><?php echo $row['name']; ?></td>
                <td><?php echo $row['email']; ?></td>
                <td><?php echo $row['phone']; ?></td>
                <td><a href="process.php?action=delete_emp&id=<?php echo $row['id']; ?>" style="color:red;" onclick="return confirm('Delete?')">Remove</a></td>
            </tr>
            <?php } ?>
        </table>
    </div>
</body>
</html>