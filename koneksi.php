<?php
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_DATABASE', 'webprog');

// Melakukan koneksi ke database
$db = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);

//Memeriksa koneksi
// if (!$db) {
//     die("Koneksi database gagal: " . mysqli_connect_error());
// } else {
//     echo "Koneksi ke database berhasil!";
// }
?>