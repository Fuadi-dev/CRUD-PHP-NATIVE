<?php
include "../../koneksi.php";
include "../sesi.php";

if (isset($_GET['nik'])) {
    $nik = $_GET['nik'];
    
    $query = "DELETE FROM guru WHERE nik='$nik'";
    
    if (mysqli_query($db, $query)) {
        header("Location: data_guru.php");
        exit();
    } else {
        echo "Error deleting record: " . mysqli_error($db);
    }
} else {
    echo "NIK tidak ditemukan.";
}
?>
