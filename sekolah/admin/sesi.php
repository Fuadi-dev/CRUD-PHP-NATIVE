<?php 
    include '../../koneksi.php';

    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }

    $sesi = $_SESSION['admin_email'];
    if ($sesi == true) {
       $sql = "SELECT * FROM admin WHERE email = '$sesi'";
        $query = mysqli_query($db, $sql);
        $data = mysqli_fetch_assoc($query);
    } else {
        header('location: ../login.php');
    }
?>