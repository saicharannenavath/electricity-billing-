<?php
include '../config/db.php';
session_start();
if (!isset($_SESSION['admin'])) { exit(); }
$action = $_GET['action']; $id = $_GET['id'];
if ($action == 'delete_emp') { mysqli_query($conn, "DELETE FROM employees WHERE id='$id'"); header("Location: view_employees.php"); }
if ($action == 'delete_user') { mysqli_query($conn, "DELETE FROM users WHERE id='$id'"); header("Location: view_users.php"); }
if ($action == 'toggle') {
    $r = mysqli_query($conn, "SELECT status FROM bills WHERE id='$id'");
    $row = mysqli_fetch_assoc($r);
    $new = ($row['status'] == 'Paid') ? 'Unpaid' : 'Paid';
    mysqli_query($conn, "UPDATE bills SET status='$new' WHERE id='$id'");
    header("Location: view_bills.php");
}
?>