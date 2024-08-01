<?php
include('../koneksi.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Ambil ID pesanan dari form
    $order_id = $_POST['order_id'];

    // Pastikan ID pesanan valid
    if (!empty($order_id) && is_numeric($order_id)) {
        // Hapus pesanan dari tabel orders
        $delete_query = $db->prepare("DELETE FROM orders WHERE id = ?");
        $delete_query->bind_param('i', $order_id);

        if ($delete_query->execute()) {
            // Redirect ke halaman daftar pesanan setelah penghapusan berhasil
            header('Location: ./index.php?halaman=orders');
            exit;
        } else {
            echo "Error deleting order: " . $db->error;
        }
    } else {
        echo "Invalid order ID!";
    }
} else {
    echo "Invalid request method!";
}
?>
