<?php
include '../config/db.php';
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $u = mysqli_real_escape_string($conn, $_POST['username']);
    $p = mysqli_real_escape_string($conn, $_POST['password']);
    $res = mysqli_query($conn, "SELECT * FROM admins WHERE username='$u' AND password='$p'");
    if (mysqli_num_rows($res) > 0) { $_SESSION['admin'] = $u; header("Location: dashboard.php"); }
}
?>
<!DOCTYPE html>
<html>
<head><link rel="stylesheet" href="../assets/style.css"></head>
<body>
    <div class="container" style="max-width:400px; margin-top:100px;">
        <h2 style="text-align:center;">Admin Access</h2>
        <form method="POST">
            <input type="text" name="username" placeholder="Username" required>
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit">Login</button>
        </form>
        <p style="text-align:center;"><a href="../index.php">Back to Home</a></p>
    </div>
</body>
</html>