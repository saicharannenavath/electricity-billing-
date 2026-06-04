<?php
include '../config/db.php';
include '../modules/validation.php';
session_start();
if (!isset($_SESSION['admin'])) { header("Location: login.php"); exit(); }
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $sn = "SRV" . rand(10000, 99999);
    $n = $_POST['name']; $a = $_POST['address']; $p = $_POST['phone']; $pin = $_POST['pincode'];
    $e = $_POST['email']; $r = $_POST['reading']; $t = $_POST['type'];
    $errors = array();
    if (!validateName($n)) { $errors[] = 'Name must contain only alphabets and spaces.'; }
    if (!validatePhone($p)) { $errors[] = 'Phone must be exactly 10 digits.'; }

    // Very small chance of duplicate generated SN - check and regenerate
    $exists = mysqli_query($conn, "SELECT id FROM users WHERE service_number='$sn'");
    if (mysqli_num_rows($exists) > 0) { $sn = "SRV" . rand(10000, 99999); }

    if (empty($errors)) {
        mysqli_query($conn, "INSERT INTO users (service_number, name, address, phone, pincode, email, current_reading, type) VALUES ('$sn','$n','$a','$p','$pin','$e','$r','$t')");
        echo "<script>alert('User Registered! SN: $sn'); window.location='view_users.php';</script>";
    } else {
        $msg = implode('\\n', $errors);
        echo "<script>alert('".$msg."');</script>";
    }
}
?>
<!DOCTYPE html>
<html>
<head><link rel="stylesheet" href="../assets/style.css"></head>
<body>
    <div class="header-nav"><div>Admin Portal</div><div><a href="dashboard.php">Dashboard</a><a href="../logout.php">Logout</a></div></div>
    <div class="container">
        <h2>Consumer Registration</h2>
        <form method="POST">
            <input type="text" name="name" placeholder="Name" pattern="[a-zA-Z ]+" required>
            <textarea name="address" placeholder="Address" required></textarea>
            <input type="text" name="phone" placeholder="Mobile" pattern="[0-9]{10}" required>
            <input type="text" name="pincode" placeholder="Pincode" pattern="[0-9]{6}" required>
            <input type="email" name="email" placeholder="Email" required>
            <input type="number" name="reading" placeholder="Current Reading" required>
            <select name="type">
                <option value="household">Household</option>
                <option value="commercial">Commercial</option>
                <option value="industrial">Industrial</option>
            </select>
            <button type="submit">Create Account</button>
        </form>
    </div>
</body>
</html>