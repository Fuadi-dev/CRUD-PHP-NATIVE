<?php 
include '../koneksi.php';
$pesan = '';
include 'sesi.php';

if(isset($_POST['daftar'])){
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    
    $check_email = "SELECT * FROM admin WHERE email = '$email'";
    $result = $db -> query($check_email);

    if( $result -> num_rows > 0){
        $pesan = "email sudah terdaftar";
    }else{
        $query = "INSERT INTO admin (username, email, password) VALUES ('$username', '$email', '$password')";
        if($db -> query($query)){
            $pesan = "Berhasil mendaftar";
            header('location: index.php');
        }else{
            $pesan = "Gagal mendaftar";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="css/login.css">
</head>
<body>
    <div class="container">
        <div class="form-container">
            <h2>REGISTER</h2>
            <i><?=$pesan; ?></i>
            <form action="register.php" method="post">
                <div class="form-group">    
                    <input type="text" placeholder="username" name="username" required>
                </div>
                <div class="form-group">
                    <input type="text" placeholder="email" name="email" required>
                </div>
                <div class="form-group">
                    <input type="password" placeholder="password" name="password" required>
                </div>
                <button type="submit" name="daftar">Register</button>
            </form>
        </div>
    </div>
</body>
</html>