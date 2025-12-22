<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header("Location: register_member.php");
    exit;
}

$member_name = $_POST['member_name'];
$member_email = $_POST['member_email'];
$gender = $_POST['gender'];
$address = $_POST['address'];
$phone_number = $_POST['phone_number'];
$password = $_POST['password'];
$confirm_password = $_POST['confirm_password'];

if ($password !== $confirm_password) {
    header("Location: register_member.php?pesan=password_mismatch");
    exit;
}

if (!in_array($gender, ['Male', 'Female'])) {
    header("Location: register_member.php?pesan=error_gender");
    exit;
}

$payload = json_encode([
    "memberName" => $member_name,
    "memberEmail" => $member_email,
    "gender" => $gender,
    "address" => $address,
    "phoneNumber" => $phone_number,
    "password" => $password
]);

$ch = curl_init("http://172.31.208.1:8080/api/members/register");
curl_setopt_array($ch, [
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_POST => true,
    CURLOPT_HTTPHEADER => [
        "Content-Type: application/json"
    ],
    CURLOPT_POSTFIELDS => $payload
]);

$response = curl_exec($ch);
curl_close($ch);

$result = json_decode($response, true);

if ($result && isset($result['success']) && $result['success'] === true) {
    header("Location: login_member.php?success=Registration successful! Please login.");
    exit;
}

header("Location: register_member.php?pesan=error");
exit;
