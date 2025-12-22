<?php
if (!isset($conn)) {
    include_once('../connection.php');
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add_booking'])) {

    $payload = [
    "memberName"      => trim($_POST['MemberName']),
    "memberEmail"     => trim($_POST['member_email']),
    "ticketType"      => ucfirst(strtolower($_POST['TicketType'])),
    "quantity"        => (int) $_POST['Quantity'],
    "total"           => (float) $_POST['Total'],
    "transactionDate" => date('Y-m-d', strtotime($_POST['TransactionDate'])),
    "paymentMethod"   => in_array($_POST['PaymentMethod'] ?? '', ['Cash','Credit','Transfer']) 
                          ? $_POST['PaymentMethod'] 
                          : 'Cash',
    "paymentStatus"   => $_POST['PaymentStatus'] ?? 'Pending',
    "adminCode"       => $_SESSION['AdminCode'] ?? 1
];


    $ch = curl_init("http://172.31.208.1:8080/api/bookings");
    curl_setopt_array($ch, [
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_POST           => true,
        CURLOPT_HTTPHEADER     => ["Content-Type: application/json"],
        CURLOPT_POSTFIELDS     => json_encode($payload)
    ]);

    $response = curl_exec($ch);
    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);

    if ($httpCode !== 201) {
        die("API CREATE ERROR ($httpCode): " . $response);
    }

    header("Location: ".$_SERVER['PHP_SELF']);
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['edit_booking'])) {

    $trx = $_POST['TransactionCode'];

    $payload = [
        "memberName"      => trim($_POST['MemberName']),
        "memberEmail"     => trim($_POST['member_email']),
        "ticketType"      => ucfirst(strtolower($_POST['TicketType'])),
        "quantity"        => (int) $_POST['Quantity'],
        "total"           => (float) $_POST['Total'],
        "transactionDate" => date('Y-m-d', strtotime($_POST['TransactionDate'])),
        "paymentMethod"   => ucfirst(strtolower($_POST['PaymentMethod'])),
        "paymentStatus"   => $_POST['PaymentStatus'] ?? "Pending"
    ];

    $ch = curl_init("http://172.31.208.1:8080/api/bookings/$trx");
    curl_setopt_array($ch, [
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_CUSTOMREQUEST  => "PUT",
        CURLOPT_HTTPHEADER     => ["Content-Type: application/json"],
        CURLOPT_POSTFIELDS     => json_encode($payload)
    ]);

    $response = curl_exec($ch);
    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);

    if ($httpCode !== 200) {
        die("API UPDATE ERROR ($httpCode): " . $response);
    }
    header("Location: ".$_SERVER['PHP_SELF']);
    exit;
}

if (isset($_GET['delete_booking'])) {

    $trx = $_GET['delete_booking'];

    $ch = curl_init("http://172.31.208.1:8080/api/bookings/$trx");
    curl_setopt_array($ch, [
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_CUSTOMREQUEST  => "DELETE"
    ]);

    $response = curl_exec($ch);
    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);

    if ($httpCode !== 200) {
        die("API DELETE ERROR ($httpCode): " . $response);
    }

    header("Location: ".$_SERVER['PHP_SELF']);
    exit;
}
?>
