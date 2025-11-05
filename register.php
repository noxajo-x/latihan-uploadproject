<?php
include 'koneksi.php';
// Cek aoakah form telah dibuat
if(isset($_POST['register'])){
    // Ambil data dari form
    $username = $_POST['username'];

    $nama = $_POST['nama_lengkap']; // Menangkap nama lengkap dari form
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); //Enskripsi password

    //Simpan data ke database
    $query = "insert into users (username, password, nama_lengkap) values ('$username', '$password', '$nama')";
    // Eksekusi query
    $result = mysqli_query($koneksi, $query);

    // Cek apakah query berhasil
    if($result){
        // redirect ke halaman login setelah registrasi sukses
        echo "<script>alert('Registrasi Anda Telah Berhasil');
        window.location='login.php';</script>";
    } else{
        //  Tampilkan pesan eror jika registrasi gagal
        echo "Gagal registrasi";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style2.css">
</head>
<body>
    <h1>Form Registrasi</h1>
    <form method="POST">
        <fieldset>
            <table>
                <tr>
                    <td>
                        <label for="nama">Nama:</label> 
                    </td>
                    <td>:</td>
                    <td>
                        <input type="text" name="nama_lengkap">
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="username">Username:</label>
                    </td>
                    <td>:</td>
                    <td>
                        <input type="text" name="username">
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="username">Password:</label>
                    </td>
                    <td>:</td>
                    <td>
                        <input type="password" name="password">
                    </td>
                </tr>
                <tr>
                    <td colspan="3" style="text-align:center;"><input type="submit" name="register" value="Daftar"></td>
                </tr>
                <tr>
                    <td colspan="3" style="text-align:center;">Login yuk<a href="login.php">Login</a></td>
                </tr>
            </table>
        </fieldset>
    </form>
</body>
</html>