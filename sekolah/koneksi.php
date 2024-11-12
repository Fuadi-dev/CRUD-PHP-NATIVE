<?php
$hostname = "localhost";
$username = "root";
$password = "";
$database = "sekolah";

$db = mysqli_connect($hostname, $username, $password, $database);
if ($db->connect_error) {
    echo "koneksi database rusak ";
    die("error: " . $db->connect_error);
}
?>