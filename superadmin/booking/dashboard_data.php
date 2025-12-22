<?php

function apiGet(string $url): array
{
    $ch = curl_init($url);
    curl_setopt_array($ch, [
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_HTTPHEADER     => ["Content-Type: application/json"],
        CURLOPT_TIMEOUT        => 10
    ]);

    $response = curl_exec($ch);
    curl_close($ch);

    $decoded = json_decode($response, true);
    return is_array($decoded) ? $decoded : [];
}

$statsRes = apiGet("http://172.31.208.1:8080/api/dashboard/stats");

$stats = [
    'total_bookings'   => $statsRes['data']['total_bookings']   ?? 0,
    'pending_bookings' => $statsRes['data']['pending_payments'] ?? 0,
    'today_visitors'   => $statsRes['data']['today_visitors']   ?? 0,
    'monthly_revenue'  => $statsRes['data']['monthly_revenue']  ?? 0,
];

$bookingRes = apiGet("http://172.31.208.1:8080/api/bookings");
$bookings   = $bookingRes['data'] ?? [];

$recentBookings = array_slice($bookings, 0, 5);
