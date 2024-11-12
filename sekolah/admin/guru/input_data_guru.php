<?php
    include "../../koneksi.php";
    $pesan ="";
    include "../sesi.php";
    if(isset($_POST['daftar'])){
        $nik = $_POST['nik'];
        $nama = $_POST['nama'];
        $alamat = $_POST['alamat'];
        $ttl = $_POST['ttl'];
        $no_telp = $_POST['telp'];
        
        $check_nik = "SELECT * from guru where nik = '$nik'";
        $result = $db->query($check_nik);

        if ($result->num_rows > 0) {
            $pesan = "NIK Sudah Ada Gunakan NIK baru Yang Lain!";
        } else {
            $sql = "INSERT INTO guru (nik, nama_guru, alamat, ttl, telp) VALUES ('$nik', '$nama', '$alamat', '$ttl', '$no_telp')";
            if($db->query($sql)){
               header("Location: data_guru.php");
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
    <title>Input Data Guru</title>
    <link rel="stylesheet" href="../css/input.css">
</head>
<body>
    <div class="container">
        <h2>Input Data Guru</h2>
        <i><?=$pesan?></i>
        <form action="input_data_guru.php" method="post">
            <div class="form-group">
                <label for="nik">NIK</label>
                <input type="number" name="nik" placeholder ="Masukan NIK" required>
                </br>
            </div>
            <div class="form-group">
                <label for="nama">Nama</label>
                <input type="text" name="nama" placeholder="Masukan Nama Guru" required>
                </br>
            </div>
            <div class="form-group">
                <label for="alamat">Alamat</label>
                <textarea name="alamat" placeholder="Masukan Alamat Lengkap" cols="50" rows="5" required></textarea>
                </br>
            </div>
            <div class="form-group">
                <label for="ttl">Tanggal Lahir</label>
                <input type="date" name="ttl" id="" required>
                </br>
            </div>
            <div class="form-group">
                <label for="telp">No HP</label>
                <Input type="number" name="telp" placeholder="Masukan No HP" required>
                </br>
            </div>
            <button type="submit" name="daftar">Simpan</button> <a href="data_guru.php">Kembali</a>
        </form>
    </div>
</body>
</html>