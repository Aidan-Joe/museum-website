<?php
$DB_HOST = getenv('DB_HOST') ?: 'mysql';
$DB_USER = getenv('DB_USER') ?: 'root';
$DB_PASS = getenv('DB_PASSWORD') ?: 'password';
$DB_NAME = getenv('DB_NAME') ?: 'db_museum';
$DB_PORT = getenv('DB_PORT') ?: 3306;

$conn = mysqli_connect($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME, $DB_PORT);

if (!$conn) {
    die("Database connection failed: " . mysqli_connect_error());
}
?>
