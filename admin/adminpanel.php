<?php
session_start();
include_once('../connection.php'); 

if (!isset($_SESSION['status']) || $_SESSION['status'] !== 'login' || $_SESSION['role'] !== 'admin') {
    header("Location: ../login_admin.php");
    exit;
}

$adminId = intval($_SESSION['AdminCode']);
$adminQuery = mysqli_query($conn, "SELECT * FROM admin WHERE AdminCode = $adminId AND Status='Active' LIMIT 1");
if (!$adminQuery || mysqli_num_rows($adminQuery) == 0) {
    die("Admin not found or inactive.");
}

$user = mysqli_fetch_assoc($adminQuery);$isAdmin = true;

include_once('booking/booking_crud_process.php');
include_once('booking/dashboard_data.php');
?>

<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Admin Panel</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
<link href="../assets/css/adminpanel.css" rel="stylesheet">

</head>
<body>
<div class="sidebar">
    <div class="sidebar-header">
        <h4><i class="fas fa-landmark"></i> Museum Bekasi</h4>
        <small class="text-white-50">Management Portal</small>
    </div>
    <ul class="nav flex-column mt-3">
        <li class="nav-item"><a class="nav-link active" href="#" onclick="showSection('dashboard')"><i class="fas fa-chart-line"></i> Dashboard</a></li>
        <li class="nav-item"><a class="nav-link" href="#" onclick="showSection('bookings')"><i class="fas fa-ticket-alt"></i> Bookings & Tickets</a></li>
        <li class="nav-item"><a class="nav-link" href="#" onclick="showSection('settings')"><i class="fas fa-cog"></i> Settings</a></li>
    </ul>
</div>

<div class="main-content p-4">
    <div class="top-bar d-flex justify-content-between align-items-center mb-4">
        <div>
            <h5 class="mb-0">Welcome back, <?php echo htmlspecialchars($user['AdminName']); ?></h5>
            <small class="text-muted"><i class="fas fa-user"></i> Admin</small>
        </div>
        <div class="dropdown">
            <button class="btn btn-light dropdown-toggle" data-bs-toggle="dropdown"><i class="fas fa-user-circle"></i> Profile</button>
            <ul class="dropdown-menu dropdown-menu-end">
                <li><a class="dropdown-item" href="#"><i class="fas fa-user"></i> My Profile</a></li>
                <li><a class="dropdown-item" href="#"><i class="fas fa-key"></i> Change Password</a></li>
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item text-danger" href="../logout.php"><i class="fas fa-sign-out-alt"></i> Logout</a></li>
            </ul>
        </div>
    </div>

    <div id="dashboard-section">
        <h4 class="mb-4">Dashboard Overview</h4>
            
        <div class="row g-3 mb-4">
            <div class="col-md-3">
                <div class="stat-card">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <p class="text-muted mb-1">Total Bookings</p>
                            <h3 class="mb-0"><?php echo number_format($stats['total_bookings']); ?></h3>
                        </div>
                        <div class="stat-icon bg-primary bg-opacity-10 text-primary">
                            <i class="fas fa-ticket-alt"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="stat-card">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <p class="text-muted mb-1">Pending</p>
                            <h3 class="mb-0"><?php echo number_format($stats['pending_bookings']); ?></h3>
                        </div>
                        <div class="stat-icon bg-warning bg-opacity-10 text-warning">
                            <i class="fas fa-clock"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="stat-card">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <p class="text-muted mb-1">Today's Visitors</p>
                            <h3 class="mb-0"><?php echo number_format($stats['today_visitors']); ?></h3>
                        </div>
                        <div class="stat-icon bg-success bg-opacity-10 text-success">
                            <i class="fas fa-users"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="stat-card">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <p class="text-muted mb-1">Monthly Revenue</p>
                            <h3 class="mb-0">Rp<?php echo number_format($stats['monthly_revenue'], 2); ?></h3>
                        </div>
                        <div class="stat-icon bg-info bg-opacity-10 text-info">
                            <i class="fas fa-dollar-sign"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <h5>Recent Bookings</h5>
        <div class="card-white shadow-sm mb-4 p-3">
            <div class="table-responsive">
                <table class="table table-hover mb-0">
                    <thead><tr><th>ID</th><th>Visitor</th><th>Visit Date</th><th>Tickets</th><th>Total</th><th>Status</th></tr></thead>
                    <tbody>
                    <?php if ($recentBookings && mysqli_num_rows($recentBookings)>0): while($rb = mysqli_fetch_assoc($recentBookings)): ?>
                        <?php
                            $status = $rb['PaymentStatus'] ?: 'Pending';
                            $badgeClass = ($status === 'Confirmed') ? 'badge-status-confirmed' : (($status === 'Pending') ? 'badge-status-pending' : 'badge-status-cancelled');
                        ?>
                        <tr>
                            <td>#<?php echo htmlspecialchars($rb['BookingID']); ?></td>
                            <td><?php echo htmlspecialchars($rb['VisitorName']); ?></td>
                            <td><?php echo !empty($rb['VisitDate'])?date('M d, Y',strtotime($rb['VisitDate'])):'-'; ?></td>
                            <td><?php echo (int)$rb['Quantity'] . 'x ' . htmlspecialchars($rb['TicketType']); ?></td>
                            <td>Rp<?php echo number_format((float)$rb['Total'],2); ?></td>
                            <td><span class="badge <?php echo $badgeClass; ?>"><?php echo $status; ?></span></td>
                        </tr>
                    <?php endwhile; else: ?>
                        <tr><td colspan="7" class="text-center">No recent bookings</td></tr>
                    <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div id="bookings-section" style="display:none;">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h4>Bookings & Ticket Management</h4>
            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addBookingModal"><i class="fas fa-plus"></i> New Booking</button>
        </div>

        <div class="card-white shadow-sm p-3">
            <div class="d-flex mb-3">
                <input class="form-control me-2" placeholder="Search bookings..." id="searchBookings">
                <div style="width:200px;">
                    <select id="filterStatus" class="form-select">
                        <option value="">All Status</option>
                        <option value="Pending">Pending</option>
                        <option value="Confirmed">Confirmed</option>
                        <option value="Cancelled">Cancelled</option>
                    </select>
                </div>
            </div>

            <div class="table-responsive">
                <table class="table table-hover mb-0" id="bookingsTable">
                    <thead><tr><th>Booking ID</th><th>Visitor Name</th><th>Email</th><th>Ticket Type</th><th>Quantity</th><th>Visit Date</th><th>Total</th><th>Status</th><th>Actions</th></tr></thead>
                    <tbody>
                    <?php if ($bookings && mysqli_num_rows($bookings)>0): while($b = mysqli_fetch_assoc($bookings)): ?>
                        <?php $status = $b['PaymentStatus'] ?: 'Pending';
                              $badgeClass = ($status === 'Confirmed') ? 'badge-status-confirmed' : (($status === 'Pending') ? 'badge-status-pending' : 'badge-status-cancelled');
                        ?>
                        <tr data-transaction="<?php echo htmlspecialchars($b['BookingID']); ?>"
                            data-visitor="<?php echo htmlspecialchars($b['VisitorName']); ?>"
                            data-email="<?php echo htmlspecialchars($b['Email']); ?>"
                            data-ticket="<?php echo htmlspecialchars($b['TicketType']); ?>"
                            data-qty="<?php echo (int)$b['Quantity']; ?>"
                            data-total="<?php echo htmlspecialchars($b['Total']); ?>"
                            data-date="<?php echo htmlspecialchars($b['VisitDate']); ?>"
                            data-status="<?php echo htmlspecialchars($b['PaymentStatus']); ?>"
                        >
                            <td>#<?php echo htmlspecialchars($b['BookingID']); ?></td>
                            <td><?php echo htmlspecialchars($b['VisitorName']); ?></td>
                            <td><?php echo htmlspecialchars($b['Email']); ?></td>
                            <td><?php echo htmlspecialchars($b['TicketType']); ?></td>
                            <td><?php echo (int)$b['Quantity']; ?></td>
                            <td><?php echo !empty($b['VisitDate'])?date('M d, Y',strtotime($b['VisitDate'])):'-'; ?></td>
                            <td>Rp<?php echo number_format((float)$b['Total'],2); ?></td>
                            <td><span class="badge <?php echo $badgeClass; ?>"><?php echo $status; ?></span></td>
                            <td>
                                <button class="btn btn-sm btn-info"><i class="fas fa-eye"></i></button>
                                <button class="btn btn-sm btn-primary btn-edit-booking" data-bs-toggle="modal" data-bs-target="#editBookingModal"><i class="fas fa-edit"></i></button>
                                <a href="?delete_booking=<?php echo urlencode($b['BookingID']); ?>" onclick="return confirm('Delete this booking?')" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></a>
                            </td>
                        </tr>
                    <?php endwhile; else: ?>
                        <tr><td colspan="9" class="text-center">No bookings found</td></tr>
                    <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div id="settings-section" style="display:none;">
        <h4>Settings</h4>
        <div class="table-container">
            <h5 class="mb-3">Profile Settings</h5>
            <form class="row g-3 align-items-center">
                <div class="col-md-6">
                    <label class="form-label">Full Name</label>
                    <input class="form-control" value="<?php echo htmlspecialchars($user['AdminName']); ?>">
                </div>
                <div class="col-md-6">
                    <label class="form-label">Email</label>
                    <input class="form-control" value="<?php echo htmlspecialchars($user['admin_email']); ?>">
                </div>
                <div class="col-12 mt-3">
                    <button class="btn btn-primary">Save Changes</button>
                </div>
            </form>
        </div>
    </div>

<?php include('booking/booking_crud.php'); ?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="../assets/js/adminpanel.js"></script>
</body>
</html>
