<?php
    include "koneksi.php";
    include "sesi.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Mapel</title>
    <link rel="stylesheet" href="/css/data.css">
</head>
<?php include "navbar.php"?>
<body>
    <h1>Data Mapel</h1>
    <table>
        <thead>
            <tr>
                <th>ID Mapel</th>
                <th>Nama Mapel</th>
                <th>NIK</th>
                <th>Jumlah Jam</th>
                <th>Kelas</th>
                
            </tr>
        </thead>
        <tbody>
            
            <?php
            $query = "SELECT * FROM mapel";
            $result = mysqli_query($db, $query);
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>" . $row['id_mapel'] . "</td>";
                echo "<td>" . $row['nama_mapel'] . "</td>";
                echo "<td>" . $row['nik'] . "</td>";
                echo "<td>" . $row['jumlah_jam'] . "</td>";
                echo "<td>" . $row['kelas'] . "</td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>
</body>
</html>
