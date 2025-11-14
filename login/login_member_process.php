<?php
session_start();
include('../connection.php');
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header("Location: login_member.php");
    exit;
}

$email = mysqli_real_escape_string($conn, $_POST['email']);
$password = mysqli_real_escape_string($conn, $_POST['password']);

$query_member = mysqli_query($conn, "SELECT * FROM member WHERE member_email='$email' AND Password='$password'");

if (mysqli_num_rows($query_member) > 0) {
    $member = mysqli_fetch_assoc($query_member);
    
    $_SESSION['status'] = 'login';
    $_SESSION['role'] = 'member';
    $_SESSION['MemCode'] = $member['MemCode'];
    $_SESSION['MemberName'] = $member['MemberName'];
    $_SESSION['member_email'] = $member['member_email'];
    
    header("Location: ../pages/booking.php");
    exit;
}

header("Location: login_member.php?pesan=gagal");
exit;
?>