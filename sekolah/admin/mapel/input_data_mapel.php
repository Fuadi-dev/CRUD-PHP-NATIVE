<?php
    include "../../koneksi.php";
    include "../sesi.php";
    $pesan ="";
    if(isset($_POST['tambah'])){
        $id = $_POST['id'];
        $mapel = $_POST['mapel'];
        $nik = $_POST['nik'];
        $jpl = $_POST['jpl'];
        $kelas = $_POST['kelas'];
        
        $check_id = "SELECT * from mapel where id_mapel = '$id'";
        $result = $db->query($check_id);

        if ($result->num_rows > 0) {
            $pesan = "id mapel Sudah Ada Gunakan id mapel baru Yang Lain!";
        } else {
            $sql = "INSERT INTO mapel (id_mapel, nama_mapel, nik, jumlah_jam, kelas) VALUES ('$id', '$mapel', '$nik', '$jpl', '$kelas')";
            if($db->query($sql)){
               header("Location: data_mapel.php");
            }
            else{
                $pesan="Gagal Mendaftar!";
            }
        }

    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Input Data Mapel</title>
    <link rel="stylesheet" href="/css/input.css">
</head>
<body>
    <div class="container">
        <h2>Input Data Mapel</h2>
        <i><?=$pesan?></i>
            <form class="edit-form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
            <input type="hidden" name="id" value="<?php echo $row['id_mapel']; ?>">
            
            <div class="form-group">
                <label for="mapel">Nama Mapel:</label>
                <input type="text" id="mapel" name="mapel" value="<?php echo $row['nama_mapel']; ?>" required>
                </br>
            </div>

            <div class="form-group">
                <label for="nik">NIK Guru Mengajar:</label>
                <input type="number" id="nik" name="nik" value="<?php echo $row['nik']; ?>" required>
                </br>
            </div>
            
            <div class="form-group">
                <label for="jpl">Jumlah Jam Pelajaran:</label>
                <input type="number" id="jpl" name="jpl" value="<?php echo $row['jumlah_jam']; ?>" required>
                </br>
            </div>
            
            <div class="form-group">
                <label for="kelas">Kelas Yang Diajar:</label>
                <input type="text" id="kelas" name="kelas" value="<?php echo $row['kelas']; ?>" required>
                </br>
            </div>
            
            <button type="submit" class="submit-btn">Simpan</button>
        </form>
    </div>
</body>
</html>