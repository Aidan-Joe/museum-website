<?php
session_start();
include('../connection.php');

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header("Location: register_member.php");
    exit;
}
mysqli_query($conn, "CALL GenerateMemberCode(@newCode)");
    $result = mysqli_query($conn, "SELECT @newCode AS newCode");
    $row = mysqli_fetch_assoc($result);
    $memcode = $row['newCode'];

$member_name = mysqli_real_escape_string($conn, $_POST['member_name']);
$member_email = mysqli_real_escape_string($conn, $_POST['member_email']);
$gender = mysqli_real_escape_string($conn, $_POST['gender']);
$address = mysqli_real_escape_string($conn, $_POST['address']);
$phone_number = mysqli_real_escape_string($conn, $_POST['phone_number']);
$password = mysqli_real_escape_string($conn, $_POST['password']);
$confirm_password = mysqli_real_escape_string($conn, $_POST['confirm_password']);

if ($password !== $confirm_password) {
    header("Location: register_member.php?pesan=password_mismatch");
    exit;
}


$check_email = mysqli_query($conn, "SELECT * FROM member WHERE member_email='$member_email'");
if (mysqli_num_rows($check_email) > 0) {
    header("Location: register_member.php?pesan=email_exists");
    exit;
}

if (!in_array($gender, ['Male', 'Female'])) {
    header("Location: register_member.php?pesan=error");
    exit;
}

$query = "INSERT INTO member (MemCode, MemberName, Gender, Address, PhoneNumber, member_email, Password) 
          VALUES ('$memcode', '$member_name', '$gender', '$address', '$phone_number', '$member_email', '$password')";

if (mysqli_query($conn, $query)) {
    header("Location: login_member.php?success=Registration successful! Please login.");
    exit;
} else {
    header("Location: register_member.php?pesan=error");
    exit;
}
?>