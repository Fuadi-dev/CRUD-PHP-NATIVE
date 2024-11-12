<?php
include "../../koneksi.php";
include "../sesi.php";
$pesan="";
 if(isset($_POST['daftar'])){
    $nis = $_POST['nis'];
    $nama = $_POST['nama_siswa'];
    $kelas = $_POST['kelas'];
    $alamat = $_POST['alamat'];
    $ttl = $_POST['ttl'];
    $no_telp = $_POST['telp'];

    $check_nis = "SELECT * FROM siswa WHERE nis = '$nis'";
    $result = $db->query($check_nis);

    if($result->num_rows > 0) {
        $pesan = "NIS Sudah Digunakan Gunakan Nomer NIS Yang Lain!";
    } else {
        $sql = "INSERT INTO siswa (nis, nama_siswa, kelas, alamat, ttl, telp) VALUES ('$nis', '$nama', '$kelas', '$alamat', '$ttl', '$no_telp')";
        if($db->query($sql)){
           header("Location: data_siswa.php");
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
    <title>Input Data Siswa</title>
    <link rel="stylesheet" href="../css/input.css">
</head>
<body>
    <div class="container">
        <h2>Input Data Siswa</h2>
        <i><?=$pesan?></i>
        <form action="input_data_siswa.php" method="post">
            <div class="form-group">
                <label for="nis">NIS</label>
                <input type="number" name="nis" placeholder="Masukan NIS" required>
                </br>
            </div>
            <div class="form-group">
                <label for="nama">Nama</label>
                <input type="text" name="nama_siswa" placeholder="Masukan Nama Siswa" required>
                </br>
            </div>
            <div class="form-group">
                <label for="kelas">Kelas</label>
                <input type="text" name ="kelas" placeholder="Masukan Kelas" required>
                </br>
            </div>
            <div class="form-group">
                <label for="alamat">Alamat</label>
                <textarea name="alamat" placeholder="Masukan Alamat Lengkap" cols="50" rows="5" required></textarea>
                </br>
            </div>
            <div class="form-group">
                <label for="ttl">Tanggal Lahir</label>
                <input type="date" name="ttl" id="ttl" required>
            </div>
            <div class="form-group">
                <label for="telp"></label>Nomer HP</label>
                <input type="number" name="telp" placeholder="Masukan NO HP" required>
                </br>
            </div>
            <button type="submit" name="daftar">Simpan</button><a href="data_siswa.php">kembali</a>
        </form>
    </div>
</body>
</html>