<?php
if (session_status() === PHP_SESSION_NONE) session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add_admin'])) {

    $payload = [
        "adminName" => $_POST['AdminName'],
        "adminEmail" => $_POST['admin_email'],
        "password" => $_POST['Password'],
        "status" => "Active",
        "superAdminCode" => 1
    ];

    $ch = curl_init("http://172.31.208.1:8080/api/admins");
    curl_setopt_array($ch, [
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_POST => true,
        CURLOPT_HTTPHEADER => ["Content-Type: application/json"],
        CURLOPT_POSTFIELDS => json_encode($payload)
    ]);

    curl_exec($ch);
    curl_close($ch);

    header("Location: " . $_SERVER['PHP_SELF']);
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['edit_admin'])) {

    $adminCode = $_POST['AdminCode'];

    $payload = [
        "adminName"  => $_POST['AdminName'],
        "adminEmail" => $_POST['admin_email'],
        "status"     => $_POST['Status']
    ];

    if (!empty($_POST['Password'])) {
        $payload['password'] = $_POST['Password'];
    }

    $ch = curl_init("http://172.31.208.1:8080/api/admins/$adminCode");
    curl_setopt_array($ch, [
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_CUSTOMREQUEST => "PUT",
        CURLOPT_HTTPHEADER => ["Content-Type: application/json"],
        CURLOPT_POSTFIELDS => json_encode($payload)
    ]);

    curl_exec($ch);
    curl_close($ch);

    header("Location: " . $_SERVER['PHP_SELF']);
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['toggle_admin_api'])) {

    $adminCode = $_POST['AdminCode'];
    $current   = $_POST['CurrentStatus'];

    $newStatus = ($current === 'Active') ? 'Inactive' : 'Active';

    $payload = [
        "status" => $newStatus
    ];

    $ch = curl_init("http://172.31.208.1:8080/api/admins/$adminCode");
    curl_setopt_array($ch, [
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_CUSTOMREQUEST => "PUT",
        CURLOPT_HTTPHEADER => ["Content-Type: application/json"],
        CURLOPT_POSTFIELDS => json_encode($payload)
    ]);

    curl_exec($ch);
    curl_close($ch);

    header("Location: " . $_SERVER['PHP_SELF']);
    exit;
}

if (isset($_GET['delete_admin'])) {

    $id = intval($_GET['delete_admin']);

    $ch = curl_init("http://172.31.208.1:8080/api/admins/$id");
    curl_setopt_array($ch, [
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_CUSTOMREQUEST => "DELETE"
    ]);

    curl_exec($ch);
    curl_close($ch);

    header("Location: " . $_SERVER['PHP_SELF']);
    exit;
}
