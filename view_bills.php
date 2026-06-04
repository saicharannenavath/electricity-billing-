<?php
include '../config/db.php';
session_start();
if (!isset($_SESSION['admin'])) { header("Location: login.php"); exit(); }
$res = mysqli_query($conn, "SELECT * FROM bills ORDER BY id DESC");
?>
<!DOCTYPE html>
<html>
<head><link rel="stylesheet" href="../assets/style.css"></head>
<body>
    <div class="header-nav"><div>Admin Portal</div><div><a href="dashboard.php">Dashboard</a><a href="../logout.php">Logout</a></div></div>
    <div class="container">
        <h2>Billing & Payment Status</h2>
        <table>
            <tr><th>SN</th><th>Period</th><th>Amount</th><th>Status</th><th>Action</th></tr>
            <?php while($row = mysqli_fetch_assoc($res)) { ?>
            <tr>
                <td><?php echo $row['service_number']; ?></td>
                <td><?php echo $row['billing_period']; ?></td>
                <td>₹<?php echo $row['amount']; ?></td>
                <td style="color:<?php echo ($row['status']=='Paid')?'green':'red'; ?>; font-weight:bold;"><?php echo $row['status']; ?></td>
                <td><a href="process.php?action=toggle&id=<?php echo $row['id']; ?>">Toggle Status</a></td>
            </tr>
            <?php } ?>
        </table>
    </div>
</body>
</html>