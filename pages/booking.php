<?php
session_start();

if (!isset($_SESSION['status']) || $_SESSION['status'] !== 'login' || !isset($_SESSION['role']) || $_SESSION['role'] !== 'member') {
    header("Location: ../login/login_member.php?pesan=belum_login");
    exit();
}

$memCode = $_SESSION['MemCode'];
$memberName = $_SESSION['MemberName'];
$memberEmail = $_SESSION['member_email'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Your Visit - Museum Bekasi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="../assets/css/booking.css" rel="stylesheet">
</head>
<body>
    <nav>
        <ul class="navbar-list">
            <li class="logo">
                <a href="#">MUSEUM BEKASI</a>
            </li>
            <li class="toggle" id="toggle-menu">
                <svg width="30" height="30" viewBox="0 0 30 30" fill="white">
                    <rect y="5" width="30" height="3"/>
                    <rect y="14" width="30" height="3"/>
                    <rect y="23" width="30" height="3"/>
                </svg>
            </li>
            <div class="nav-items" id="nav-items">
                <li class="navbar-item">
                    <a href="#exhibition" class="navbar-link">Exhibition</a>
                </li>
                <li class="navbar-item">
                    <a href="#visit" class="navbar-link">Visit</a>
                </li>
                <li class="navbar-item">
                    <a href="#collection" class="navbar-link">Collection</a>
                </li>
                <li class="navbar-item">
                    <a href="#shop" class="navbar-link">Shop</a>
                </li>
                <li class="navbar-item">
                    <span class="navbar-link">Welcome, <?php echo htmlspecialchars($memberName); ?>!</span>
                </li>
                <li class="navbar-item">
                    <a href="../logout.php" class="navbar-button">Logout</a>
                </li>
            </div>
        </ul>
    </nav>

    <div class="hero-section">
        <div class="container">
            <h1>BOOK YOUR VISIT</h1>
            <p>Reserve your entry and explore the wonders of Museum Bekasi</p>
        </div>
    </div>

    <div class="booking-container" id="bookingSection">
        <div class="row">
            <div class="col-lg-8">
                <div class="booking-card">
                    <h2 class="section-title">BOOKING DETAILS</h2>
                    
                    <form id="bookingForm" action="booking_process.php" method="POST">
                        
                        <div class="form-section">
                            <h3 class="subsection-title">SELECT DATE & TIME</h3>
                            
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label class="form-label">VISIT DATE *</label>
                                    <input type="date" class="form-control" name="visit_date" id="visitDate" required min="<?php echo date('Y-m-d', strtotime('+1 day')); ?>">
                                </div>
                                <!-- <div class="col-md-6">
                                    <label class="form-label">TIME SLOT *</label>
                                    <select class="form-select" name="visit_time" id="visitTime" required>
                                        <option value="">Select time</option>
                                        <option value="09:00">09:00 AM</option>
                                        <option value="10:00">10:00 AM</option>
                                        <option value="11:00">11:00 AM</option>
                                        <option value="12:00">12:00 PM</option>
                                        <option value="13:00">01:00 PM</option>
                                        <option value="14:00">02:00 PM</option>
                                        <option value="15:00">03:00 PM</option>
                                        <option value="16:00">04:00 PM</option>
                                    </select>
                                </div> -->
                            </div>
                        </div>

                        <div class="form-section">
                            <h3 class="subsection-title">SELECT TICKETS</h3>
                            
                            <div class="ticket-type-card">
                                <div class="ticket-header">
                                    <div>
                                        <div class="ticket-name">ADULT</div>
                                        <div class="ticket-price">Rp 25,000</div>
                                    </div>
                                </div>
                                <div class="ticket-description">
                                    For visitors aged 18 and above. Full access to all galleries.
                                </div>
                                <div class="quantity-selector">
                                    <label class="form-label">Quantity:</label>
                                    <input type="number" class="form-control qty-input ticket-qty" name="adult_qty" data-price="25000" data-type="Adult" min="0" value="0">
                                </div>
                            </div>

                            <div class="ticket-type-card">
                                <div class="ticket-header">
                                    <div>
                                        <div class="ticket-name">STUDENT</div>
                                        <div class="ticket-price">Rp 20,000</div>
                                    </div>
                                </div>
                                <div class="ticket-description">
                                    For students with valid ID. Complete museum access.
                                </div>
                                <div class="quantity-selector">
                                    <label class="form-label">Quantity:</label>
                                    <input type="number" class="form-control qty-input ticket-qty" name="student_qty" data-price="20000" data-type="Student" min="0" value="0">
                                </div>
                            </div>

                            <div class="ticket-type-card">
                                <div class="ticket-header">
                                    <div>
                                        <div class="ticket-name">CHILD</div>
                                        <div class="ticket-price">Rp 10,000</div>
                                    </div>
                                </div>
                                <div class="ticket-description">
                                    For children under 18. Must be accompanied by adult.
                                </div>
                                <div class="quantity-selector">
                                    <label class="form-label">Quantity:</label>
                                    <input type="number" class="form-control qty-input ticket-qty" name="child_qty" data-price="10000" data-type="Child" min="0" value="0">
                                </div>
                            </div>

                            <div class="ticket-type-card">
                                <div class="ticket-header">
                                    <div>
                                        <div class="ticket-name">FAMILY PASS</div>
                                        <div class="ticket-price">Rp 50,000</div>
                                    </div>
                                </div>
                                <div class="ticket-description">
                                    For 2 adults and up to 2 children. Best value for families.
                                </div>
                                <div class="quantity-selector">
                                    <label class="form-label">Quantity:</label>
                                    <input type="number" class="form-control qty-input ticket-qty" name="family_qty" data-price="50000" data-type="Family" min="0" value="0">
                                </div>
                            </div>
                        </div>

                        <div class="form-section">
                            <h3 class="subsection-title">YOUR DETAILS</h3>
                            
                            <div class="mb-3">
                                <label class="form-label">FULL NAME *</label>
                                <input type="text" class="form-control" name="full_name" value="<?php echo htmlspecialchars($memberName); ?>" readonly>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">EMAIL ADDRESS *</label>
                                <input type="email" class="form-control" name="email" value="<?php echo htmlspecialchars($memberEmail); ?>" readonly>
                                <small style="color: var(--light-gray);">Tickets will be sent to this email</small>
                            </div>

                            <!-- <div class="mb-3">
                                <label class="form-label">PHONE NUMBER *</label>
                                <input type="tel" class="form-control" name="phone" required placeholder="+62">
                            </div> -->

                            <!-- <div class="mb-3">
                                <label class="form-label">SPECIAL REQUIREMENTS (OPTIONAL)</label>
                                <textarea class="form-control" name="special_requirements" rows="3" placeholder="Accessibility needs or special requests"></textarea>
                            </div> -->

                            <div class="form-check mb-3">
                                <input class="form-check-input" type="checkbox" id="terms" required>
                                <label class="form-check-label" for="terms">
                                    I agree to the <a href="#" style="color: var(--primary-black); text-decoration: underline;">terms and conditions</a> *
                                </label>
                            </div>
                        </div>

                        <button type="submit" class="btn-primary mt-4">
                            COMPLETE BOOKING
                        </button>
                    </form>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="summary-card">
                    <h3 class="summary-title">ORDER SUMMARY</h3>
                    
                    <div class="summary-row">
                        <span>Date:</span>
                        <strong id="summaryDate">—</strong>
                    </div>
                    <!-- <div class="summary-row">
                        <span>Time:</span>
                        <strong id="summaryTime">—</strong>
                    </div> -->
                    
                    <div id="ticketsSummary">
                        <div class="summary-row">
                            <span>Tickets:</span>
                            <strong>Not selected</strong>
                        </div>
                    </div>
                    
                    <div class="summary-row total-row">
                        <span>TOTAL:</span>
                        <strong id="totalPrice">Rp 0</strong>
                    </div>

                    <div class="info-box mt-3">
                        <strong>Important:</strong>
                        <ul style="margin: 10px 0 0 0; padding-left: 20px;">
                            <li>Museum closed on Mondays</li>
                            <li>Arrive 15 minutes early</li>
                            <li>Bring valid ID</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <footer>
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
    <script src="../assets/js/booking.js"></script>
</body>
</html>