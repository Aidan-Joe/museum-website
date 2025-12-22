<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header("Location: ../login_admin.php");
    exit;
}

$email = $_POST['email'];
$password = $_POST['password'];

$payload = json_encode([
    "email" => $email,
    "password" => $password
]);

function callApi($url, $payload) {
    $ch = curl_init($url);

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

    return json_decode($response, true);
}

$superadminApi = "http://172.31.208.1:8080/api/superadmin/login";
$result = callApi($superadminApi, $payload);

if ($result && isset($result['success']) && $result['success'] === true) {
    $sa = $result['data'];

    $_SESSION['status'] = 'login';
    $_SESSION['role'] = 'superadmin';
    $_SESSION['SuperAdminCode'] = $sa['superAdminCode'];
    $_SESSION['Name'] = $sa['name'];

    header("Location: ../superadmin/superadminpanel.php");
    exit;
}

$adminApi = "http://172.31.208.1:8080/api/admins/login";
$result = callApi($adminApi, $payload);

if ($result && isset($result['success']) && $result['success'] === true) {
    $admin = $result['data'];

    $_SESSION['status'] = 'login';
    $_SESSION['role'] = 'admin';
    $_SESSION['AdminCode'] = $admin['adminCode'];
    $_SESSION['AdminName'] = $admin['adminName'];
    $_SESSION['SuperAdminCode'] = $admin['superAdminCode'];

    header("Location: ../admin/adminpanel.php");
    exit;
}

header("Location: ../login_admin.php?pesan=gagal");
exit;
