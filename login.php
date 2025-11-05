<?php
// Area PHP - Backend
session_start();
include 'koneksi.php';

if(isset($_POST['login'])){
    $username = $_POST['username'];
    $password = $_POST['password'];

    $query  = "select * from users where username='$username'";
    $result = mysqli_query($koneksi, $query);
    $user   = mysqli_fetch_assoc($result);

    if($user && password_verify($password, $user['password'])){
        $_SESSION['username'] = $user['username'];
        $_SESSION['nama_lengkap'] = $user['nama_lengkap'];
        // header("Location: home.php");
    } else {
        echo "<script>alert('Username atau Password salah');</script>";
    }
}
?>

<!DOCTYPE html>
<!-- Area Interface - Frontend -->
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- <link rel="stylesheet" href="style1.css">
    <link rel="stylesheet" href="style1.css"> -->
    <link rel = "stylesheet" href="style1.css?v=<?= time()?>">
    <!-- <link rel="stylesheet" href="style1.css"> -->
</head>
<body>
    <h1>Welcome To The Bean Community</h1>
    <form method="POST">
        <fieldset>
            <table>
            <tr>
                <td><input type="text" name="username" placeholder="Username" ></td>
            </tr>
            <tr>
                <td><input type="text" name="password" placeholder="Password"></td>
            </tr>
            <tr>
                <td><input type="submit" name="login" value="Login"></td>
            </tr>
            <tr>
                <td>-------------- YURRR --------------</td>
            </tr>
            <tr>
                <td>No account? No problem → <a href="register.php">Register</a></td>
            </tr>
            </table>
        </fieldset>
    </form>
</body>
</html>