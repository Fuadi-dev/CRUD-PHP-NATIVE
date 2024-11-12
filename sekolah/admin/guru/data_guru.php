<?php
    include "../../koneksi.php";
    include "../sesi.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Guru</title>
    <link rel="stylesheet" href="/css/data.css">
</head>
<body>
    <?php include "../navbar.php"?>
    <h1>Data Guru</h1>
    <table>
        <thead>
            <tr>
                <th>NIK</th>
                <th>Nama Guru</th>
                <th>Alamat</th>
                <th>TTL</th>
                <th>NO HP</th>
                <th>Opsi</th>
            </tr>
        </thead>
        <tbody>
            
            <?php
            $query = "SELECT * FROM guru";
            $result = mysqli_query($db, $query);
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>" . $row['nik'] . "</td>";
                echo "<td>" . $row['nama_guru'] . "</td>";
                echo "<td>" . $row['alamat'] . "</td>";
                echo "<td>" . $row['ttl'] . "</td>";
                echo "<td>" . $row['telp'] . "</td>";
                echo "<td>
                        <a href='edit_guru.php?nik=" . $row['nik'] . "' class='edit-btn'>Edit</a>
                        <a href='hapus_guru.php?nik=" . $row['nik'] . "' class='delete-btn' onclick='return confirm(\"Apakah Anda yakin ingin menghapus data ini?\")'>Hapus</a>
                      </td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>
    <p class="register-link"><a href="input_data_guru.php">Tambah Data Baru</a></p>
</body>
</html>
