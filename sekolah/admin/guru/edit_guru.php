<?php
include "../../koneksi.php";
include "../sesi.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nik = $_POST['nik'];
    $nama_guru = $_POST['nama_guru'];
    $alamat = $_POST['alamat'];
    $ttl = $_POST['ttl'];
    $telp = $_POST['telp'];

    $query = "UPDATE guru SET nama_guru='$nama_guru', alamat='$alamat', ttl='$ttl', telp='$telp' WHERE nik='$nik'";
    
    if (mysqli_query($db, $query)) {
        header("Location: data_guru.php");
        exit();
    } else {
        echo "Error updating record: " . mysqli_error($db);
    }
}

if (isset($_GET['nik'])) {
    $nik = $_GET['nik'];
    $query = "SELECT * FROM guru WHERE nik='$nik'";
    $result = mysqli_query($db, $query);
    $row = mysqli_fetch_assoc($result);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data Guru</title>
    <link rel="stylesheet" href="/css/input.css">
</head>
<body>
    <div class="container">
        <h1 class="title">Edit Data Guru</h1>
        <form class="edit-form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
            <input type="hidden" name="nik" value="<?php echo $row['nik']; ?>">
            
            <div class="form-group">
                <label for="nama_guru">Nama Guru:</label>
                <input type="text" id="nama_guru" name="nama_guru" value="<?php echo $row['nama_guru']; ?>" required>
                </br>
            </div>

            <div class="form-group">
                <label for="alamat">Alamat:</label>
                <textarea id="alamat" name="alamat" cols="50" rows= "5" required><?php echo $row['alamat']; ?></textarea>
                </br>
            </div>
            
            <div class="form-group">
                <label for="ttl">TTL:</label>
                <input type="text" id="ttl" name="ttl" value="<?php echo $row['ttl']; ?>" required>
                </br>
            </div>
            
            <div class="form-group">
                <label for="telp">Telepon:</label>
                <input type="text" id="telp" name="telp" value="<?php echo $row['telp']; ?>" required>
                </br>
            </div>
            
            <button type="submit" class="submit-btn">simpan</button>
        </form>
    </div>
</body>
</html>
