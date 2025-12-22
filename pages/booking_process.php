<?php
session_start();

if (
    !isset($_SESSION['status']) ||
    $_SESSION['status'] !== 'login' ||
    $_SESSION['role'] !== 'member'
) {
    header("Location: ../login_member.php?pesan=belum_login");
    exit;
}

$memberName  = $_SESSION['MemberName'];
$memberEmail = $_SESSION['member_email'];

$visitDate   = $_POST['visit_date'];

$adultQty   = (int)($_POST['adult_qty'] ?? 0);
$studentQty = (int)($_POST['student_qty'] ?? 0);
$childQty   = (int)($_POST['child_qty'] ?? 0);
$familyQty  = (int)($_POST['family_qty'] ?? 0);

if (($adultQty + $studentQty + $childQty + $familyQty) === 0) {
    header("Location: booking.php?error=no_tickets");
    exit;
}

$prices = [
    'Adult'   => 25000,
    'Student' => 20000,
    'Child'   => 10000,
    'Family'  => 50000
];

$total =
    ($adultQty   * $prices['Adult']) +
    ($studentQty * $prices['Student']) +
    ($childQty   * $prices['Child']) +
    ($familyQty  * $prices['Family']);

$tickets = [];
if ($adultQty)   $tickets[] = "Adult";
if ($studentQty) $tickets[] = "Student";
if ($childQty)   $tickets[] = "Child";
if ($familyQty)  $tickets[] = "Family";

$ticketType = implode(", ", $tickets);

$payload = [
    "memberName"    => $memberName,
    "memberEmail"   => $memberEmail,
    "ticketType"    => $ticketType,
    "quantity"      => ($adultQty + $studentQty + $childQty + $familyQty),
    "total"         => $total,
    "visitDate"     => $visitDate,
    "paymentStatus" => "Pending",
    "paymentMethod" => "Transfer"
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
    error_log("BOOKING API ERROR: ".$response);
    header("Location: booking.php?error=api_failed");
    exit;
}

$_SESSION['booking_success'] = json_decode($response, true);
header("Location: booking_confirmation.php");
exit;
