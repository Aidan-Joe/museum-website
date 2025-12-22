<?php
session_start();

$email = trim($_POST['email']);
$password = trim($_POST['password']);

$payload = json_encode([
    "email" => $email,
    "password" => $password
]);

$ch = curl_init("http://172.31.208.1:8080/api/members/login");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, [
    "Content-Type: application/json"
]);
curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);

$response = curl_exec($ch);
$httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
curl_close($ch);

$result = json_decode($response, true);

if ($httpCode === 200 && $result['success']) {
    $m = $result['data'];

    $_SESSION['status'] = 'login';
    $_SESSION['role'] = 'member';
    $_SESSION['MemCode'] = $m['memCode'];
    $_SESSION['MemberName'] = $m['memberName'];
    $_SESSION['member_email'] = $m['memberEmail'];

    header("Location: ../pages/booking.php");
    exit;
}

header("Location: login_member.php?pesan=gagal");
exit;
