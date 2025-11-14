<?php
session_start();
include('../connection.php');

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header("Location: ../login_admin.php");
    exit;
}

$email = mysqli_real_escape_string($conn, $_POST['email']);
$password = mysqli_real_escape_string($conn, $_POST['password']);

$query_superadmin = mysqli_query($conn, "SELECT * FROM superadmin WHERE superadmin_email='$email' AND Password='$password' AND Status='Active'");

if (mysqli_num_rows($query_superadmin) > 0) {
    $superadmin = mysqli_fetch_assoc($query_superadmin);
    
    $_SESSION['status'] = 'login';
    $_SESSION['role'] = 'superadmin';
    $_SESSION['SuperAdminCode'] = $superadmin['SuperAdminCode'];
    $_SESSION['Name'] = $superadmin['Name'];
    
    header("Location: ../superadmin/superadminpanel.php");
    exit;
}

$query_admin = mysqli_query($conn, "SELECT * FROM admin WHERE admin_email='$email' AND Password='$password' AND Status='Active'");

if (mysqli_num_rows($query_admin) > 0) {
    $admin = mysqli_fetch_assoc($query_admin);
    
    $_SESSION['status'] = 'login';
    $_SESSION['role'] = 'admin';
    $_SESSION['AdminCode'] = $admin['AdminCode'];
    $_SESSION['AdminName'] = $admin['AdminName'];
    $_SESSION['SuperAdminCode'] = $admin['SuperAdminCode'];
    
    header("Location: ../admin/adminpanel.php");
    exit;
}

header("Location: login_admin.php?pesan=gagal");
exit;
?>