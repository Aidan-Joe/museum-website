<?php
$host = "localhost";      
$user = "root";           
$pass = "";               
$db   = "db_museum";      

$conn = mysqli_connect($host, $user, $pass, $db);

if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
function db_disconnect ($con) {
    mysqli_close($con);
}
?>