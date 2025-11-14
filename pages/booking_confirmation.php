<?php
session_start();

if (!isset($_SESSION['status']) || $_SESSION['status'] !== 'login' || !isset($_SESSION['role']) || $_SESSION['role'] !== 'member') {
    header("Location: ../login_member.php?pesan=belum_login");
    exit();
}

if (!isset($_SESSION['booking_success'])) {
    header("Location: booking.php");
    exit();
}

$booking = $_SESSION['booking_success'];
$memberName = $_SESSION['MemberName'];
$memberEmail = $_SESSION['member_email'];

unset($_SESSION['booking_success']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking Confirmed - Museum Bekasi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="../assets/css/booking.css" rel="stylesheet">
    <style>
        .confirmation-icon {
            font-size: 5rem;
            color: #28a745;
            margin-bottom: 1rem;
        }
        .info-box {
            background-color: #f8f9fa;
            border: 1px solid #dee2e6;
            border-radius: 8px;
            padding: 1.5rem;
        }
        .btn-outline {
            background-color: white;
            color: #333;
            border: 2px solid #333;
            padding: 1rem 2.5rem;
            font-weight: 700;
            text-transform: uppercase;
            cursor: pointer;
            transition: all 0.3s;
        }
        .btn-outline:hover {
            background-color: #333;
            color: white;
        }
    </style>
</head>
<body>
    <nav>
        <ul class="navbar-list">
            <li class="logo">
                <a href="#">MUSEUM BEKASI</a>
            </li>
            <div class="nav-items">
                <li class="navbar-item">
                    <span class="navbar-link">Welcome, <?php echo htmlspecialchars($memberName); ?>!</span>
                </li>
                <li class="navbar-item">
                    <a href="../logout.php" class="navbar-button">Logout</a>
                </li>
            </div>
        </ul>
    </nav>

    <div class="booking-container" style="margin-top: 100px;">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="booking-card text-center">
                    <div class="confirmation-icon">✓</div>
                    <h2 class="section-title text-center">BOOKING CONFIRMED</h2>
                    <p style="font-size: 1.1rem; color: #666; margin-bottom: 2rem;">
                        Your booking has been confirmed. Check your email for tickets.
                    </p>
                    
                    <div class="info-box text-start">
                        <h5 style="font-weight: 700; margin-bottom: 1rem; font-size: 1.2rem;">BOOKING DETAILS</h5>
                        <p style="margin-bottom: 0.5rem;"><strong>Reference:</strong> <?php echo htmlspecialchars($booking['transaction_code']); ?></p>
                        <p style="margin-bottom: 0.5rem;"><strong>Payment Code:</strong> <?php echo htmlspecialchars($booking['payment_code']); ?></p>
                        <p style="margin-bottom: 0.5rem;"><strong>Name:</strong> <?php echo htmlspecialchars($memberName); ?></p>
                        <p style="margin-bottom: 0.5rem;"><strong>Email:</strong> <?php echo htmlspecialchars($memberEmail); ?></p>
                        <p style="margin-bottom: 0.5rem;"><strong>Date:</strong> <?php echo date('F j, Y', strtotime($booking['visit_date'])); ?></p>
                        
                        <div style="margin: 1rem 0;">
                            <strong>Tickets:</strong>
                            <ul style="margin-top: 0.5rem;">
                                <?php if ($booking['adult_qty'] > 0): ?>
                                    <li>Adult: <?php echo $booking['adult_qty']; ?> × Rp 25,000 = Rp <?php echo number_format($booking['adult_qty'] * 25000); ?></li>
                                <?php endif; ?>
                                <?php if ($booking['student_qty'] > 0): ?>
                                    <li>Student: <?php echo $booking['student_qty']; ?> × Rp 20,000 = Rp <?php echo number_format($booking['student_qty'] * 20000); ?></li>
                                <?php endif; ?>
                                <?php if ($booking['child_qty'] > 0): ?>
                                    <li>Child: <?php echo $booking['child_qty']; ?> × Rp 10,000 = Rp <?php echo number_format($booking['child_qty'] * 10000); ?></li>
                                <?php endif; ?>
                                <?php if ($booking['family_qty'] > 0): ?>
                                    <li>Family Pass: <?php echo $booking['family_qty']; ?> × Rp 50,000 = Rp <?php echo number_format($booking['family_qty'] * 50000); ?></li>
                                <?php endif; ?>
                            </ul>
                        </div>
                        
                        <p style="margin-bottom: 0; font-size: 1.3rem; margin-top: 1rem;"><strong>Total Paid:</strong> Rp <?php echo number_format($booking['total']); ?></p>
                        
                        <div class="alert alert-info mt-3">
                            <strong>Payment Status:</strong> Pending<br>
                            <small>Please complete your payment via bank transfer. Your booking will be confirmed once payment is received.</small>
                        </div>
                    </div>

                    <div style="margin-top: 2.5rem;">
                        <h5 style="font-weight: 700; margin-bottom: 1.5rem; font-size: 1.2rem;">NEXT STEPS</h5>
                        <ul style="text-align: left; max-width: 500px; margin: 0 auto; line-height: 2;">
                            <li>Complete payment via bank transfer</li>
                            <li>Check your email for payment instructions</li>
                            <li>Present tickets (digital or printed) at entrance</li>
                            <li>Arrive 15 minutes before your time slot</li>
                            <li>Enjoy your museum experience!</li>
                        </ul>
                    </div>

                    <div style="margin-top: 2.5rem; display: flex; gap: 1rem; justify-content: center; flex-wrap: wrap;">
                        <button class="btn-primary" style="width: auto; padding: 1rem 2.5rem;" onclick="window.print()">
                            PRINT CONFIRMATION
                        </button>
                        <button class="btn-outline" style="width: auto; padding: 1rem 2.5rem;" onclick="location.href='booking.php'">
                            NEW BOOKING
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <footer style="margin-top: 50px;">
        <div class="footer-container">
            <div class="upper-footer">
                <h3 class="footer-title">Connect with us</h3>
                <div class="social-links">
                    <a href="#"><span>f</span></a>
                    <a href="#"><span>t</span></a>
                    <a href="#"><span>i</span></a>
                    <a href="#"><span>y</span></a>
                </div>
            </div>

            <div class="footer-columns">
                <div class="column">
                    <h3>Free entry</h3>
                    <p>Great Joe Street, Bekasi</p>
                    <p>+62 815-8675-6523</p>
                </div>

                <div class="column">
                    <h3>Opening hours</h3>
                    <p>Daily: 10.00–17.00 (Fridays: 20.30)</p>
                    <p>Last entry: 16.45 (Fridays: 20.15)</p>
                </div>

                <div class="column">
                    <h3>About us</h3>
                    <ul>
                        <li><a href="#">Contact us</a></li>
                    </ul>
                </div>

                <div class="column">
                    <h3>Visit</h3>
                    <ul>
                        <li><a href="#">Museum map</a></li>
                        <li><a href="#">Exhibitions</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>