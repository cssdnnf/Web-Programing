<?php
include('../koneksi.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil data dari form
    $username = mysqli_real_escape_string($db, $_POST['username']);
    $password = mysqli_real_escape_string($db, $_POST['password']);
    $level = mysqli_real_escape_string($db, $_POST['level']);
    $name = mysqli_real_escape_string($db, $_POST['name']);
    
    // Periksa apakah username sudah ada
    $check_query = "SELECT username FROM users WHERE username='$username'";
    $check_result = mysqli_query($db, $check_query);
    
    if (mysqli_num_rows($check_result) > 0) {
        // Username sudah ada
        header('Location: ./index.php?halaman=user&error=username_exists');
        exit;
    } else {
        // Username belum ada, lanjutkan dengan INSERT
        $query = "INSERT INTO users (username, password, level, name) 
                  VALUES ('$username', md5('$password'), '$level', '$name')";
        
        if (mysqli_query($db, $query)) {
            header('Location: ./index.php?halaman=user');
            exit;
        } else {
            // Jika terjadi error dalam query INSERT
            header('Location: ./index.php?halaman=user&error=query_failed');
            exit;
        }
    }
} else {
    header('Location: ./index.php?halaman=user');
    exit;
}
?>