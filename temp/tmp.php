<?php
session_start();

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

// Menampilkan keranjang
echo '<pre>';
print_r($_SESSION['cart']);
//echo "tes";
echo '</pre>';
?>

<!-- Formulir untuk menambah item -->
<form method="post">
    <input type="hidden" name="action" value="add">
    Product ID: <input type="text" name="productId" required>
    Quantity: <input type="number" name="quantity" min="1" required>

    <button type="submit">Add to Cart</button>
</form>

<!-- Formulir untuk mengurangi item -->
<form method="post">
    <input type="hidden" name="action" value="remove">
    Product ID: <input type="text" name="productId" required>
    Quantity: <input type="number" name="quantity" min="1" required>
    <button type="submit">Remove from Cart</button>
</form>



