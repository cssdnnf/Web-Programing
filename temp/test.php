<?php
session_start();
include('../koneksi.php');

// Inisialisasi keranjang belanja jika belum ada
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = array();
}

// Fungsi untuk menambah item ke keranjang
function addToCart($productId, $quantity) {
    if (isset($_SESSION['cart'][$productId])) {
        $_SESSION['cart'][$productId] += $quantity;
    } else {
        $_SESSION['cart'][$productId] = $quantity;
    }
}

// Fungsi untuk mengurangi item dari keranjang
function removeFromCart($productId, $quantity) {
    if (isset($_SESSION['cart'][$productId])) {
        $_SESSION['cart'][$productId] -= $quantity;
        if ($_SESSION['cart'][$productId] <= 0) {
            unset($_SESSION['cart'][$productId]);
        }
    }
}

// Menambahkan item ke keranjang
if (isset($_POST['action']) && $_POST['action'] == 'add') {
    $productId = $_POST['productId'];
    $quantity = intval($_POST['quantity']);
    addToCart($productId, $quantity);
}

// Mengurangi item dari keranjang
if (isset($_POST['action']) && $_POST['action'] == 'remove') {
    $productId = $_POST['productId'];
    $quantity = intval($_POST['quantity']);
    removeFromCart($productId, $quantity);
}

// Menyimpan keranjang belanja ke database
if (isset($_POST['action']) && $_POST['action'] == 'checkout') {
    $userId = 1; // Ganti dengan ID pengguna yang sesuai, bisa diambil dari sesi atau login
    $menuId = 1; // Ganti dengan ID menu yang sesuai, bisa diambil dari formulir atau logika lain
    
    $totalBarang = 0;
    $totalHarga = 0;
    
    foreach ($_SESSION['cart'] as $productId => $quantity) {
        // Query untuk mendapatkan harga produk
        $result = mysqli_query($db, "SELECT harga FROM menu WHERE id = $productId");
        $row = mysqli_fetch_assoc($result);
        $harga = $row['harga'];
        
        $totalBarang += $quantity;
        $totalHarga += $harga * $quantity;
    }
    
    // Menyimpan ke tabel orders
    $stmt = mysqli_prepare($db, "INSERT INTO orders (t_barang, t_harga, menu_id, user_id) VALUES (?, ?, ?, ?)");
    mysqli_stmt_bind_param($stmt, "idii", $totalBarang, $totalHarga, $menuId, $userId);
    mysqli_stmt_execute($stmt);
    
    // Hapus keranjang setelah checkout
    $_SESSION['cart'] = array();
}

// Menampilkan keranjang
echo '<pre>';
print_r($_SESSION['cart']);
echo '</pre>';
?>

<!-- Formulir untuk menambah item -->
<form method="post">
    <input type="hidden" name="action" value="add">
    Product ID: <input type="text" name="productId" required>
    Quantity: <input type="number" name="quantity" required>
    <button type="submit">Add to Cart</button>
</form>

<!-- Formulir untuk mengurangi item -->
<form method="post">
    <input type="hidden" name="action" value="remove">
    Product ID: <input type="text" name="productId" required>
    Quantity: <input type="number" name="quantity" required>
    <button type="submit">Remove from Cart</button>
</form>

<!-- Formulir untuk checkout -->
<form method="post">
    <input type="hidden" name="action" value="checkout">
    <button type="submit">Checkout</button>
</form>
