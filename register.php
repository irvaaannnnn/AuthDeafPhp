<?php
include "service/database.php";
session_start();

$register_message = '';

if (isset($_SESSION['is_Login'])) {
    header("Location: dashboard.php");
}

if (isset($_POST['register'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $hash_password = hash('sha256', $password);

    try {
        $sql = "INSERT INTO users (username, password) VALUES ('$username', '$hash_password')";

        if ($db->query($sql)) {
            $register_message = "Daftar akun berhasil, silahkan Login";
        } else {
            $register_message = "Daftar Akun gagal, silahkan coba lagi";
        }
    } catch (mysqli_sql_exception) {
        $register_message = "Username sudah digunakan";
    }
    $db->close();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php include "layout/header.html" ?>

    <h3>Daftar Akun Regis</h3>
    <i><?= $register_message ?></i>

    <form action="register.php" method="POST">
        <input type="text" placeholder="name" name="username">
        <input type="password" placeholder="password" name="password">
        <button type="submit" name="register">Daftar Sekarang</button>
    </form>

    <?php include "layout/footer.html" ?>
</body>

</html>