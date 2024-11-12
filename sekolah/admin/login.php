<?php 
include '../koneksi.php';   
session_start();
$pesan = '';

if(isset($_SESSION['is_admin_login'])){
    header("Location: siswa/data_siswa.php");
}

if(isset($_POST['login'])){
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM admin WHERE email = '$email' AND password = '$password'";                                                                        
    $result = $db -> query($sql);

    if($result -> num_rows > 0){
        $data = $result -> fetch_assoc();
        $_SESSION['admin_email'] = $data['email'];
        $_SESSION['is_admin_login'] = true;
        header("Location: siswa/data_siswa.php");
    }else{
        $pesan = "Email atau password salah";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="css/login.css">
</head>
<body>
    <div class="container">
        <div class="form-container">
            <h2>LOGIN</h2>
            <i><?=$pesan; ?></i>
            <form action="/admin/login.php" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <input type="text" placeholder="Email" name="email" required>
                </div>
                <div class="form-group">
                    <input type="password" placeholder="Password" name="password" required>
                </div>
                <button type="submit" name="login">Login</button>
            </form>
            <a href="register.php">Belum punya akun?</a>
        </div>
    </div>
</body>

