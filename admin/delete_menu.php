<?php
include('../koneksi.php'); 
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['delete_menu'])) {
    $menu_id = $_POST['menu_id'];
    $query_delete = "DELETE FROM menu WHERE id = $menu_id";
    if (mysqli_query($db, $query_delete)) {
        header('Location: ./index.php?halaman=menu');
        exit;
    } else {
        echo "Gagal melakukan delete: " . mysqli_error($db);
    }
} else {
    header('Location: ./index.php?halaman=menu');
    exit;
}
?>
