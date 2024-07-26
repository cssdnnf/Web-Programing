<?php
include('../koneksi.php'); 
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['delete_user'])) {
    $user_id = $_POST['user_id'];
    $query_delete = "DELETE FROM users WHERE id = $user_id";
    if (mysqli_query($db, $query_delete)) {
        header('Location: ./index.php?halaman=user');
        exit;
    } else {
        echo "Gagal melakukan delete: " . mysqli_error($db);
    }
} else {
    header('Location: ./index.php?halaman=user');
    exit;
}
?>
