<?php
include "../../koneksi.php";
include "../sesi.php";

$row = []; // Inisialisasi variabel $row

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_mapel = $_POST['id_mapel'];
    $nama_mapel = $_POST['mapel']; // Mengubah nama variabel untuk konsistensi
    $nik = $_POST['nik'];
    $jpl = $_POST['jpl'];
    $kelas = $_POST['kelas'];

    $query = "UPDATE mapel SET nama_mapel='$nama_mapel', nik='$nik', jumlah_jam='$jpl', kelas='$kelas' WHERE id_mapel='$id_mapel'";
    
    if (mysqli_query($db, $query)) {
        header("Location: data_mapel.php");
        exit();
    } else {
        echo "Error updating record: " . mysqli_error($db);
    }
}

if (isset($_GET['id_mapel'])) {
    $id_mapel = $_GET['id_mapel'];
    $query = "SELECT * FROM mapel WHERE id_mapel='$id_mapel'";
    $result = mysqli_query($db, $query);
    
    if ($result) { // Pastikan query berhasil
        $row = mysqli_fetch_assoc($result);
    } else {
        echo "Error fetching record: " . mysqli_error($db);
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data Mapel</title>
    <link rel="stylesheet" href="/css/input.css">
</head>
<body>
    <div class="container">
        <h1 class="title">Edit Data Mapel</h1>
        <form class="edit-form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
            <input type="hidden" name="id_mapel" value="<?php echo isset($row['id_mapel']) ? $row['id_mapel'] : ''; ?>">
            
            <div class="form-group">
                <label for="mapel">Nama Mapel:</label>
                <input type="text" id="mapel" name="mapel" value="<?php echo isset($row['nama_mapel']) ? $row['nama_mapel'] : ''; ?>" required>
                </br>
            </div>

            <div class="form-group">
                <label for="nik">NIK Guru Mengajar:</label>
                <input type="number" id="nik" name="nik" value="<?php echo isset($row['nik']) ? $row['nik'] : ''; ?>" required>
                </br>
            </div>
            
            <div class="form-group">
                <label for="jpl">Jumlah Jam Pelajaran:</label>
                <input type="number" id="jpl" name="jpl" value="<?php echo isset($row['jumlah_jam']) ? $row['jumlah_jam'] : ''; ?>" required>
                </br>
            </div>
            
            <div class="form-group">
                <label for="kelas">Kelas Yang Diajar:</label>
                <input type="text" id="kelas" name="kelas" value="<?php echo isset($row['kelas']) ? $row['kelas'] : ''; ?>" required>
                </br>
            </div>
            
            <button type="submit" class="submit-btn">Simpan</button>
        </form>
    </div>
</body>
</html>
