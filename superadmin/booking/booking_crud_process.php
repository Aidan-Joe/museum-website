<?php
if (!isset($conn)) {
    include_once('../connection.php'); 
}

// Add Booking
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add_booking'])) {
    $memberName = mysqli_real_escape_string($conn, $_POST['MemberName'] ?? '');
    $email = mysqli_real_escape_string($conn, $_POST['member_email'] ?? '');
    $ticketType = mysqli_real_escape_string($conn, $_POST['TicketType'] ?? '');
    $quantity = intval($_POST['Quantity'] ?? 1);
    $total = floatval($_POST['Total'] ?? 0);
    $date = mysqli_real_escape_string($conn, $_POST['TransactionDate'] ?? date('Y-m-d'));
    $paymentMethod = mysqli_real_escape_string($conn, $_POST['PaymentMethod'] ?? 'Cash');

    $mres = mysqli_query($conn, "SELECT MemCode FROM member WHERE member_email = '$email' LIMIT 1");
    if ($mres && mysqli_num_rows($mres)) {
        $MemberCode = mysqli_fetch_assoc($mres)['MemCode'];
    } else {
        mysqli_query($conn, "CALL GenerateMemberCode(@newCode)");
        $res = mysqli_query($conn, "SELECT @newCode AS newCode");
        $row = mysqli_fetch_assoc($res);
        $MemberCode = $row['newCode'];

        $q = "INSERT INTO member (MemCode, MemberName, Gender, Address, PhoneNumber, member_email, Password)
              VALUES ($MemberCode, '$memberName', '', '', '', '$email', '1234')";
        mysqli_query($conn, $q);
    }

    mysqli_query($conn, "CALL GenerateTransactionCode(@newCode)");
    $res = mysqli_query($conn, "SELECT @newCode AS newCode");
    $row = mysqli_fetch_assoc($res);
    $TransactionCode = $row['newCode'];

    $adminCode = intval($_SESSION['AdminCode'] ?? 0);
    $adminCode = intval($user['id'] ?? 1);
    mysqli_query($conn, "INSERT INTO transaction (TransactionCode, AdminCode, MemCode, TransactionDate, TotalTransaction)
          VALUES ('$TransactionCode', $adminCode, $MemberCode, '$date', $total)");

    $ticketRes = mysqli_query($conn, "SELECT TicketCode FROM ticket t
        JOIN ticketcategory tc ON t.TicketCategoryCode = tc.TicketCategoryCode WHERE tc.CategoryType = '$ticketType'LIMIT 1
    ");
    $ticketRow = mysqli_fetch_assoc($ticketRes);
    $existingTicketCode = $ticketRow['TicketCode'] ?? null;

    if ($existingTicketCode) {
        mysqli_query($conn, "INSERT INTO transdetail (TransactionCode, TicketCode, TicketType, Quantity)
              VALUES ('$TransactionCode', '$existingTicketCode', '$ticketType', $quantity)");
    } else {
        die('Error: Ticket type not found in table ticket');
    }

    // Payment
    mysqli_query($conn, "CALL GeneratePaymentCode(@newCode)");
    $res = mysqli_query($conn, "SELECT @newCode AS newCode");
    $row = mysqli_fetch_assoc($res);
    $PaymentCode = $row['newCode'];

    mysqli_query($conn, "INSERT INTO payment (PaymentCode, TransactionCode, PaymentDate, PaymentMethod, Status)
          VALUES ('$PaymentCode', '$TransactionCode', '$date', '$paymentMethod', 'Pending')");

    header("Location: " . $_SERVER['PHP_SELF']);
    exit;
}


// Edit Booking
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['edit_booking'])) {
    $trx = mysqli_real_escape_string($conn, $_POST['TransactionCode'] ?? '');
    $memberName = mysqli_real_escape_string($conn, $_POST['MemberName'] ?? '');
    $email = mysqli_real_escape_string($conn, $_POST['member_email'] ?? '');
    $ticketType = mysqli_real_escape_string($conn, $_POST['TicketType'] ?? '');
    $quantity = intval($_POST['Quantity'] ?? 1);
    $total = floatval($_POST['Total'] ?? 0);
    $date = mysqli_real_escape_string($conn, $_POST['TransactionDate'] ?? date('Y-m-d'));
    $pstatus = mysqli_real_escape_string($conn, $_POST['PaymentStatus'] ?? 'Pending');
    $paymentMethod = mysqli_real_escape_string($conn, $_POST['PaymentMethod'] ?? 'Cash');

    // Update
    $r = mysqli_query($conn, "SELECT MemCode FROM transaction WHERE TransactionCode = '$trx' LIMIT 1");
    if ($r && mysqli_num_rows($r)) {
        $mem = intval(mysqli_fetch_assoc($r)['MemCode']);
        mysqli_query($conn, "UPDATE member 
                             SET MemberName='$memberName', member_email='$email' 
                             WHERE MemCode = $mem");
    }

    mysqli_query($conn, "UPDATE transaction 
                         SET TransactionDate = '$date', TotalTransaction = $total 
                         WHERE TransactionCode = '$trx'");

    mysqli_query($conn, "UPDATE transdetail 
                         SET TicketType = '$ticketType', Quantity = $quantity 
                         WHERE TransactionCode = '$trx'");

    mysqli_query($conn, "UPDATE payment 
                         SET PaymentMethod = '$paymentMethod', Status = '$pstatus' 
                         WHERE TransactionCode = '$trx'");

    header("Location: " . $_SERVER['PHP_SELF']);
    exit;
} 

// Delete
if (isset($_GET['delete_booking'])) {
    $trx = mysqli_real_escape_string($conn, $_GET['delete_booking']);

    mysqli_query($conn, "DELETE FROM payment WHERE TransactionCode = '$trx'");
    mysqli_query($conn, "DELETE FROM transdetail WHERE TransactionCode = '$trx'");
    mysqli_query($conn, "DELETE FROM transaction WHERE TransactionCode = '$trx'");
  
    header("Location: " . $_SERVER['PHP_SELF']);
    exit;
}
?>
