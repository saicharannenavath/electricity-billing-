<?php
include '../config/db.php';
session_start();
if (!isset($_SESSION['admin'])) { header("Location: login.php"); exit(); }
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name']; $email = $_POST['email']; $phone = $_POST['phone']; $pass = $_POST['password'];
    mysqli_query($conn, "INSERT INTO employees (name, email, phone, password) VALUES ('$name', '$email', '$phone', '$pass')");
    header("Location: view_employees.php");
}
?>
<!DOCTYPE html>
<html>
<head><link rel="stylesheet" href="../assets/style.css"></head>
<body>
    <div class="header-nav"><div>Admin Portal</div><div><a href="dashboard.php">Dashboard</a><a href="../logout.php">Logout</a></div></div>
    <div class="container">
        <h2>Register Employee</h2>
        <form method="POST">
            <input type="text" name="name" placeholder="Full Name" pattern="[a-zA-Z ]+" title="Letters only" required>
            <input type="email" name="email" placeholder="Email Address" required>
            <input type="text" name="phone" placeholder="Phone (10 digits)" pattern="[0-9]{10}" required>
            <input type="password" name="password" placeholder="Assign Password" required>
            <button type="submit">Add Staff Member</button>
        </form>
    </div>
</body>
</html>