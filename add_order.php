<?php
include('./koneksi.php');

// Ambil data dari formulir
$menu_id = $_POST['menu_id'];
$user_id = $_POST['user_id'];

// Periksa apakah data sudah ada di tabel orders untuk pengguna dan menu ini
$query = "SELECT * FROM orders WHERE menu_id = ? AND user_id = ?";
$stmt = $db->prepare($query);
$stmt->bind_param("ii", $menu_id, $user_id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    // Jika data sudah ada, update jumlah dan harga (misalnya, harga dalam tabel orders)
    $row = $result->fetch_assoc();
    $new_quantity = $row['t_barang'] + 1; // Misalkan Anda menambah 1 setiap kali
    $update_query = "UPDATE orders SET t_barang = ?, t_harga = t_harga + (SELECT harga FROM menu WHERE id = ?) WHERE menu_id = ? AND user_id = ?";
    $update_stmt = $db->prepare($update_query);
    $update_stmt->bind_param("iiii", $new_quantity, $menu_id, $menu_id, $user_id);
    $update_stmt->execute();
} else {
    // Jika data belum ada, tambahkan data baru ke tabel orders
    $insert_query = "INSERT INTO orders (t_barang, t_harga, menu_id, user_id) 
                     SELECT 1, harga, id, ? FROM menu WHERE id = ?";
    $insert_stmt = $db->prepare($insert_query);
    $insert_stmt->bind_param("ii", $user_id, $menu_id);
    $insert_stmt->execute();
}

// Redirect ke halaman yang diinginkan setelah berhasil
//header("Location: cart.php"); // Ganti dengan halaman keranjang Anda
//exit();
?>