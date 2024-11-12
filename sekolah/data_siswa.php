<?php
    include "koneksi.php";
    include "sesi.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Siswa</title>
    <link rel="stylesheet" href="/css/data.css">
</head>
<?php include "navbar.php"?>
<body>
    <h1>Data Siswa</h1>
    <table>
        <thead>
            <tr>
                <th>NIS</th>
                <th>Nama Siswa</th>
                <th>Kelas</th>
                <th>Alamat</th>
                <th>TTL</th>
                <th>Telepon</th>
            </tr>
        </thead>
        <tbody>
            
            <?php
            $query = "SELECT * FROM siswa";
            $result = mysqli_query($db, $query);
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>" . $row['nis'] . "</td>";
                echo "<td>" . $row['nama_siswa'] . "</td>";
                echo "<td>" . $row['kelas'] . "</td>";
                echo "<td>" . $row['alamat'] . "</td>";
                echo "<td>" . $row['ttl'] . "</td>";
                echo "<td>" . $row['telp'] . "</td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>
</body>
</html>
