<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header("Location: ../login_admin.php");
    exit;
}

$email = $_POST['email'];
$password = $_POST['password'];

$apiUrl = "http://springboot:8080/api/admins/login";

$data = json_encode([
    "adminEmail" => $email,
    "password" => $password
]);

$ch = curl_init($apiUrl);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, [
    "Content-Type: application/json"
]);
curl_setopt($ch, CURLOPT_POSTFIELDS, $data);

$response = curl_exec($ch);
$httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
curl_close($ch);

if ($httpCode !== 200 || empty($response)) {
    header("Location: login_admin.php?pesan=gagal");
    exit;
}

$admin = json_decode($response, true);

$_SESSION['status'] = 'login';
$_SESSION['role'] = 'admin';
$_SESSION['AdminCode'] = $admin['adminCode'];
$_SESSION['AdminName'] = $admin['adminName'];
$_SESSION['SuperAdminCode'] = $admin['superAdminCode'];

header("Location: ../admin/adminpanel.php");
exit;
