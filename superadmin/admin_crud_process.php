<?php
if (!isset($conn)) {
    include_once('../../connection.php'); 
}
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add_admin'])) {
    $name = mysqli_real_escape_string($conn, $_POST['AdminName'] ?? '');
    $email = mysqli_real_escape_string($conn, $_POST['admin_email'] ?? '');
    $password = mysqli_real_escape_string($conn, $_POST['Password'] ?? '');

    mysqli_query($conn, "CALL GenerateAdminCode(@newCode)");
    $res = mysqli_query($conn, "SELECT @newCode AS newCode");
    $row = mysqli_fetch_assoc($res);
    $AdminCode = $row['newCode'];

    $q = "INSERT INTO admin (AdminCode, SuperAdminCode, AdminName, Address, PhoneNumber, Status, admin_email, Password)
          VALUES ($AdminCode, 1, '$name', '', '', 'Active', '$email', '$password')";
    mysqli_query($conn, $q);

    header("Location: " . $_SERVER['PHP_SELF']);
    exit;
}

if (isset($_GET['toggle_admin'])) {
    $id = intval($_GET['toggle_admin']);
    $r = mysqli_query($conn, "SELECT Status FROM admin WHERE AdminCode = $id LIMIT 1");
    if ($r && mysqli_num_rows($r)) {
        $row = mysqli_fetch_assoc($r);
        $new = ($row['Status'] === 'Active') ? 'Inactive' : 'Active';
        mysqli_query($conn, "UPDATE admin SET Status = '".mysqli_real_escape_string($conn,$new)."' WHERE AdminCode = $id");
    }
    header("Location: " . $_SERVER['PHP_SELF']);
    exit;
}

if (isset($_GET['delete_admin'])) {
    $id = intval($_GET['delete_admin']);
    mysqli_query($conn, "DELETE FROM admin WHERE AdminCode = $id");
    header("Location: " . $_SERVER['PHP_SELF']);
    exit;
}

?>