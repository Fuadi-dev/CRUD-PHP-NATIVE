<?php
    include "D:/laragon/www/sekolah/koneksi.php";
    include "D:/laragon/www/sekolah/admin/sesi.php";

    if(isset($_POST['logout'])){
        logout();   
    }
    function logout() {                                                                                                                                                                                                                                            
        session_unset();
        session_destroy();
        header('Location: ../login.php');
        exit();
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/navbar.css">

</head>
<body>
    <header>
        <nav class="navbar">
            <div class="logo">
                <img src="../../img/logo.png" alt="Logo">
            </div>

            <ul class="nav-links">
                <li><a href="/admin/guru/data_guru.php">Data Guru</a></li>
                <li><a href="/admin/mapel/data_mapel.php">Data Mapel</a></li>
                <li><a href="/admin/siswa/data_siswa.php">Data Siswa</a></li>
            </ul>
            <div class="button">  
               <form action="/admin/navbar.php" method="post">
                <button type="submit" name ="logout">Logout</button>
               </form>
            </div>
        </nav>
    </header>
</body>
</html>