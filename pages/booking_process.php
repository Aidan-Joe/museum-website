<?php
session_start();
include('../connection.php');

if (!isset($_SESSION['status']) || $_SESSION['status'] !== 'login' || !isset($_SESSION['role']) || $_SESSION['role'] !== 'member') {
    header("Location: ../login_member.php?pesan=belum_login");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header("Location: booking.php");
    exit;
}

$memCode = $_SESSION['MemCode'];

$visit_date = mysqli_real_escape_string($conn, $_POST['visit_date']);

$adult_qty = (int)$_POST['adult_qty'];
$student_qty = (int)$_POST['student_qty'];
$child_qty = (int)$_POST['child_qty'];
$family_qty = (int)$_POST['family_qty'];

if ($adult_qty <= 0 && $student_qty <= 0 && $child_qty <= 0 && $family_qty <= 0) {
    header("Location: booking.php?error=no_tickets");
    exit;
}

$prices = [
    'Adult' => 25000,
    'Student' => 20000,
    'Child' => 10000,
    'Family' => 50000
];

$total_transaction = ($adult_qty * $prices['Adult']) + 
                     ($student_qty * $prices['Student']) + 
                     ($child_qty * $prices['Child']) + 
                     ($family_qty * $prices['Family']);

mysqli_begin_transaction($conn);

try {
    mysqli_query($conn, "CALL GenerateTransactionCode(@newCode)");
    $result = mysqli_query($conn, "SELECT @newCode AS newCode");
    $row = mysqli_fetch_assoc($result);
    $transaction_code = $row['newCode'];

    $admin_code = 1;

    $query_transaction = "INSERT INTO transaction (TransactionCode, AdminCode, MemCode, TransactionDate, TotalTransaction) 
                         VALUES ('$transaction_code', '$admin_code', '$memCode', '$visit_date', '$total_transaction')";
    
    if (!mysqli_query($conn, $query_transaction)) {
        throw new Exception("Transaction insert failed: " . mysqli_error($conn));
    }

    $ticket_mapping = [
        'Adult' => 'Tcc01',
        'Student' => 'Tcc02',
        'Child' => 'Tcc03',
        'Family' => 'Tcc04'
    ];

    function createTransactionDetail($conn, $transaction_code, $category_type, $quantity, $ticket_mapping) {
        if ($quantity <= 0) return true;
        
        $category_code = $ticket_mapping[$category_type];

        $ticket_query = "SELECT TicketCode FROM ticket WHERE TicketCategoryCode = '$category_code' LIMIT 1";
        $ticket_result = mysqli_query($conn, $ticket_query);
        
        if (!$ticket_result || mysqli_num_rows($ticket_result) === 0) {
            throw new Exception("Ticket not found for category: $category_type");
        }
        
        $ticket_row = mysqli_fetch_assoc($ticket_result);
        $ticket_code = $ticket_row['TicketCode'];

        $detail_insert = "INSERT INTO transdetail (TransactionCode, TicketCode, TicketType, Quantity) 
                         VALUES ('$transaction_code', '$ticket_code', '$category_type', '$quantity')";
        
        if (!mysqli_query($conn, $detail_insert)) {
            throw new Exception("Transaction detail insert failed: " . mysqli_error($conn));
        }
        
        return true;
    }

    if ($adult_qty > 0) {
        createTransactionDetail($conn, $transaction_code, 'Adult', $adult_qty, $ticket_mapping);
    }
    if ($student_qty > 0) {
        createTransactionDetail($conn, $transaction_code, 'Student', $student_qty, $ticket_mapping);
    }
    if ($child_qty > 0) {
        createTransactionDetail($conn, $transaction_code, 'Child', $child_qty, $ticket_mapping);
    }
    if ($family_qty > 0) {
        createTransactionDetail($conn, $transaction_code, 'Family', $family_qty, $ticket_mapping);
    }
    
    mysqli_query($conn, "CALL GeneratePaymentCode(@newCode)");
    $payment_result = mysqli_query($conn, "SELECT @newCode AS newCode");
    $payment_row = mysqli_fetch_assoc($payment_result);
    $payment_code = $payment_row['newCode'];
    
    $payment_insert = "INSERT INTO payment (PaymentCode, TransactionCode, PaymentDate, PaymentMethod, Status) 
                      VALUES ('$payment_code', '$transaction_code', '$visit_date', 'Transfer', 'Pending')";
    
    if (!mysqli_query($conn, $payment_insert)) {
        throw new Exception("Payment insert failed: " . mysqli_error($conn));
    }
    
    mysqli_commit($conn);
    
    $success_data = [
        'transaction_code' => $transaction_code,
        'payment_code' => $payment_code,
        'visit_date' => $visit_date,
        'total' => $total_transaction,
        'adult_qty' => $adult_qty,
        'student_qty' => $student_qty,
        'child_qty' => $child_qty,
        'family_qty' => $family_qty,
    ];
    
    $_SESSION['booking_success'] = $success_data;
    header("Location: booking_confirmation.php");
    exit;
    
} catch (Exception $e) {
    mysqli_rollback($conn);
    error_log("Booking error: " . $e->getMessage());
    header("Location: booking.php?error=booking_failed&msg=" . urlencode($e->getMessage()));
    exit;
}
?>