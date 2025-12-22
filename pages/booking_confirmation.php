<?php
session_start();

/* =========================
   AUTH CHECK
========================= */
if (
    !isset($_SESSION['status']) ||
    $_SESSION['status'] !== 'login' ||
    !isset($_SESSION['role']) ||
    $_SESSION['role'] !== 'member'
) {
    header("Location: ../login_member.php?pesan=belum_login");
    exit();
}

if (!isset($_SESSION['booking_success']) || !is_array($_SESSION['booking_success'])) {
    header("Location: booking.php");
    exit();
}

/* =========================
   API RESPONSE
========================= */
$response = $_SESSION['booking_success'];
$data = $response['data'] ?? [];

/* =========================
   SESSION USER
========================= */
$memberName  = $_SESSION['MemberName'] ?? ($data['memberName'] ?? '-');
$memberEmail = $_SESSION['member_email'] ?? ($data['memberEmail'] ?? '-');

/* =========================
   BOOKING DATA (REAL API)
========================= */
$transactionCode = $data['transactionCode'] ?? '-';
$paymentCode     = '-'; // API belum mengirim paymentCode
$visitDate       = $data['visitDate'] ?? null;

$ticketType = $data['ticketType'] ?? '-';
$quantity   = (int)($data['quantity'] ?? 0);
$total      = (int)($data['total'] ?? 0);
$paymentStatus = $data['paymentStatus'] ?? 'Pending';

/* =========================
   CLEAR SESSION
========================= */
unset($_SESSION['booking_success']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Booking Confirmed - Museum Bekasi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="../assets/css/booking.css" rel="stylesheet">
</head>
<body>

<nav>
    <ul class="navbar-list">
        <li class="logo"><a href="#">MUSEUM BEKASI</a></li>
        <div class="nav-items">
            <li><span>Welcome, <?= htmlspecialchars($memberName) ?>!</span></li>
            <li><a href="../logout.php">Logout</a></li>
        </div>
    </ul>
</nav>

<div class="booking-container" style="margin-top:100px;">
<div class="row justify-content-center">
<div class="col-lg-8">

<div class="booking-card text-center">
    <h2 class="section-title">BOOKING CONFIRMED</h2>
    <p>Your booking has been confirmed. Check your email for tickets.</p>

    <div class="info-box text-start">
        <h5>BOOKING DETAILS</h5>

        <p><strong>Reference:</strong> <?= htmlspecialchars($transactionCode) ?></p>
        <p><strong>Payment Code:</strong> <?= htmlspecialchars($paymentCode) ?></p>
        <p><strong>Name:</strong> <?= htmlspecialchars($memberName) ?></p>
        <p><strong>Email:</strong> <?= htmlspecialchars($memberEmail) ?></p>
        <p><strong>Date:</strong>
            <?= $visitDate ? date('F j, Y', strtotime($visitDate)) : '-' ?>
        </p>

        <div>
            <strong>Tickets:</strong>
            <ul>
                <li><?= htmlspecialchars($ticketType) ?> × <?= $quantity ?></li>
            </ul>
        </div>

        <p style="font-size:1.3rem;">
            <strong>Total Paid:</strong> Rp <?= number_format($total) ?>
        </p>

        <div class="alert alert-info">
            <strong>Payment Status:</strong> <?= htmlspecialchars($paymentStatus) ?><br>
            <small>Please complete your payment via bank transfer.</small>
        </div>
    </div>

</div>
</div>
</div>
</div>

</body>
</html>
