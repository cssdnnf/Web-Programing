<?php
include('../koneksi.php');

function resize_image($file, $w, $h) {
    list($width, $height) = getimagesize($file);
    $ratio_orig = $width / $height;

    if ($w / $h > $ratio_orig) {
        $w = 600;
    } else {
        $h = 500;
    }

    $src = imagecreatefromstring(file_get_contents($file));
    $dst = imagecreatetruecolor($w, $h);
    imagecopyresampled($dst, $src, 0, 0, 0, 0, $w, $h, $width, $height);
    imagedestroy($src);
    return $dst;
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['edit'])) {
    $id = $_POST['edit'];
    $judul = $_POST['judul'];
    $deskripsi = $_POST['deskripsi'];
    $harga = $_POST['harga'];
    $category = $_POST['category'];
    $query_get_category = mysqli_query($db, "SELECT category FROM menu WHERE id = $id");
    $category_row = mysqli_fetch_assoc($query_get_category);
    $old_category = $category_row['category'];
    $gambar = '';

    if ($_FILES['gambar']['size'] > 0 && $_FILES['gambar']['error'] == 0) {
        $gambar_tmp = $_FILES['gambar']['tmp_name'];
        $upload_dir = '../assets/images/menu/';
        $allowed_types = array('jpg', 'jpeg', 'png', 'gif');
        $file_parts = pathinfo($_FILES['gambar']['name']);
        $file_ext = strtolower($file_parts['extension']);

        if (in_array($file_ext, $allowed_types)) {
            $resized_image = resize_image($gambar_tmp, 600, 500);
            $gambar = uniqid() . '.' . $file_ext;
            imagejpeg($resized_image, $upload_dir . $gambar);
            imagedestroy($resized_image);
        } else {
            echo "Tipe file tidak diizinkan.";
            exit;
        }
    } else {
        $query_get_gambar = mysqli_query($db, "SELECT gambar FROM menu WHERE id = $id");
        $gambar_row = mysqli_fetch_assoc($query_get_gambar);
        $gambar = $gambar_row['gambar'];
    }
    if ($category != $old_category) {
        switch ($category) {
            case 'burgers':
                $prefix_id = '1';
                break;
            case 'sides':
                $prefix_id = '2';
                break;
            case 'drinks':
                $prefix_id = '3';
                break;
            case 'desserts':
                $prefix_id = '4';
                break;
            default:
                $prefix_id = '0'; 
                break;
        }

        $query_last_id = mysqli_query($db, "SELECT MAX(SUBSTRING(id, 2)) AS max_id FROM menu WHERE category = '$category'");
        $max_id_row = mysqli_fetch_assoc($query_last_id);
        $max_id = $max_id_row['max_id'] ? $max_id_row['max_id'] : 0;
        $new_id = $prefix_id . str_pad(($max_id + 1), 3, '0', STR_PAD_LEFT); 
        $new_id = $prefix_id . ($max_id + 1);
    } else {
        $new_id = $id;
    }
    
    $query_update = "UPDATE menu SET judul = '$judul', deskripsi = '$deskripsi', harga = $harga, gambar = '$gambar', category = '$category', id = '$new_id' WHERE id = $id";
    if (mysqli_query($db, $query_update)) {
        header('Location: ./index.php?halaman=menu');
        exit;
    } else {
        echo "Gagal melakukan update: " . mysqli_error($db);
    }
} else {
    header('Location: ./index.php?halaman=menu');
    exit;
}
?>
