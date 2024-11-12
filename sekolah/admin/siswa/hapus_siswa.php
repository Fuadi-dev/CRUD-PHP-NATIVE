<?php
include "../../koneksi.php";
include "../sesi.php";

if (isset($_GET['nis'])) {
    $nis = $_GET['nis'];
    
    $query = "DELETE FROM siswa WHERE nis='$nis'";
    
    if (mysqli_query($db, $query)) {
        header("Location: data_siswa.php");
        exit();
    } else {
        echo "Error deleting record: " . mysqli_error($db);
    }
} else {
    echo "NIS tidak ditemukan.";
}
?>
