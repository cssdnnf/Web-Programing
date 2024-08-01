<?php
include('../koneksi.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil data dari form
    $username = $_POST['username'];
    $password = $_POST['password'];
    $level = $_POST['level'];
    $name = $_POST['name'];

    // Verifikasi bahwa username tidak kosong
    if (empty($username)) {
        echo "Username tidak boleh kosong.";
        exit;
    }

    // Siapkan query SQL untuk memperbarui data pengguna
    // Jika password diisi, kita harus meng-update password juga
    if (!empty($password)) {
        $query = "UPDATE users SET password = md5('$password'), level = '$level', name = '$name' WHERE username = '$username'";
    } else {
        // Jika password kosong, jangan mengubahnya
        $query = "UPDATE users SET level = '$level', name = '$name' WHERE username = '$username'";
    }

    // Eksekusi query
    if (mysqli_query($db, $query)) {
        header('Location: ./index.php?halaman=user');
        exit;
    } else {
        echo "Error: " . mysqli_error($db);
        exit;
    }
} else {
    header('Location: ./index.php?halaman=user');
    exit;
}


?>
