<?php
if (!isset($conn)) {
    include_once('../connection.php'); 
}

$stats = [
    'total_bookings' => (int)(mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) AS c FROM transaction"))['c'] ?? 0),
    'pending_bookings' => (int)(mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) AS c FROM payment WHERE Status = 'Pending'"))['c'] ?? 0),
    'today_visitors' => (int)(mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) AS c FROM transaction WHERE TransactionDate = CURDATE()"))['c'] ?? 0),
    'monthly_revenue' => (float)(mysqli_fetch_assoc(mysqli_query($conn, "SELECT IFNULL(SUM(TotalTransaction),0) AS s FROM transaction WHERE MONTH(TransactionDate) = MONTH(CURDATE())"))['s'] ?? 0),
];

$recentBookings = mysqli_query($conn,
    "SELECT 
        t.TransactionCode AS BookingID,
        m.MemberName AS VisitorName,
        m.member_email AS Email,
        tc.CategoryType AS TicketType,
        td.Quantity AS Quantity,
        t.TotalTransaction AS Total,
        t.TransactionDate AS VisitDate,
        p.Status AS PaymentStatus
     FROM transaction t
     JOIN transdetail td ON t.TransactionCode = td.TransactionCode
     JOIN ticketcategory tc ON td.TicketType = tc.CategoryType
     JOIN member m ON t.MemCode = m.MemCode
     LEFT JOIN payment p ON p.TransactionCode = t.TransactionCode
     ORDER BY t.TransactionDate ASC, t.TransactionCode ASC
     LIMIT 5"
);

$bookings = mysqli_query($conn,
    "SELECT 
        t.TransactionCode AS BookingID,
        m.MemberName AS VisitorName,
        m.member_email AS Email,
        td.TicketType AS TicketType,
        td.Quantity AS Quantity,
        t.TotalTransaction AS Total,
        t.TransactionDate AS VisitDate,
        p.Status AS PaymentStatus
     FROM transaction t
     JOIN transdetail td ON t.TransactionCode = td.TransactionCode
     JOIN member m ON t.MemCode = m.MemCode
     LEFT JOIN payment p ON p.TransactionCode = t.TransactionCode
     ORDER BY t.TransactionDate ASC, t.TransactionCode ASC"
);
?>


?>