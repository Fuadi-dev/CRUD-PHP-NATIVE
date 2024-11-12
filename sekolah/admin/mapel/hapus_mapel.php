<?php
include "../../koneksi.php";
include "../sesi.php";

if (isset($_GET['id_mapel'])) {
    $id = $_GET['id_mapel'];
    
    $query = "DELETE FROM mapel WHERE id_mapel='$id'";
    
    if (mysqli_query($db, $query)) {
        header("Location: data_mapel.php");
        exit();
    } else {
        echo "Error deleting record: " . mysqli_error($db);
    }
} else {
    echo "id tidak ditemukan.";
}
?>
