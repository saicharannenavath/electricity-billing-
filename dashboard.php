<?php
session_start();
if (!isset($_SESSION['admin'])) { header("Location: login.php"); exit(); }
?>
<!DOCTYPE html>
<html>
<head><link rel="stylesheet" href="../assets/style.css"></head>
<body>
    <div class="header-nav">
        <div style="font-size:20px; font-weight:bold;">Admin Dashboard</div>
        <a href="../logout.php">Logout</a>
    </div>
    <div class="container">
        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px;">
            <button onclick="location.href='add_employee.php'">Add Employee</button>
            <button onclick="location.href='view_employees.php'">View Employees</button>
            <button onclick="location.href='add_user.php'">Add New User</button>
            <button onclick="location.href='view_users.php'">View All Users</button>
            <button style="grid-column: span 2; background:#27ae60;" onclick="location.href='view_bills.php'">Manage Bills & Payments</button>
        </div>
    </div>
</body>
</html>