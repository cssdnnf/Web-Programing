<?php
include('../koneksi.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $order_id = $_POST['order_id'];
    $action = $_POST['action'];

    // Dapatkan detail pesanan
    $query = $db->prepare("SELECT t_barang FROM orders WHERE id = ?");
    $query->bind_param('i', $order_id);
    $query->execute();
    $result = $query->get_result();
    $order = $result->fetch_assoc();

    if ($order) {
        $current_quantity = $order['t_barang'];

        // Tentukan perubahan jumlah
        if ($action == 'increase') {
            $new_quantity = $current_quantity + 1;
        } elseif ($action == 'decrease' && $current_quantity > 1) {
            $new_quantity = $current_quantity - 1;
        } else {
            $new_quantity = $current_quantity; // Tidak mengubah jika jumlah tidak bisa dikurangi
        }

        // Update jumlah barang di database
        $update_query = $db->prepare("UPDATE orders SET t_barang = ? WHERE id = ?");
        $update_query->bind_param('ii', $new_quantity, $order_id);
        $update_query->execute();

        // Update total harga
        $menu_query = $db->prepare("SELECT harga FROM menu JOIN orders ON menu.id = orders.menu_id WHERE orders.id = ?");
        $menu_query->bind_param('i', $order_id);
        $menu_query->execute();
        $menu_result = $menu_query->get_result();
        $menu = $menu_result->fetch_assoc();
        $total_price = $new_quantity * $menu['harga'];

        // Format harga dengan 3 digit desimal
        $formatted_price = number_format($total_price, 3, '.', '');

        // Pastikan kolom t_harga di database adalah DECIMAL
        $update_total_price_query = $db->prepare("UPDATE orders SET t_harga = ? WHERE id = ?");
        $update_total_price_query->bind_param('di', $formatted_price, $order_id);
        $update_total_price_query->execute();

        // Redirect atau tampilkan pesan sukses
        header('Location: ./index.php?halaman=orders'); // Ganti dengan nama file Anda
        exit;
    } else {
        echo "Order not found!";
    }
} else {
    echo "Invalid request!";
}
?>
