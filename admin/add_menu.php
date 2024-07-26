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

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $judul = $_POST['judul'];
    $deskripsi = $_POST['deskripsi'];
    $harga = $_POST['harga'];
    $category = $_POST['category'];

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
        $gambar = '';
    }

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

    $query_max_id = "SELECT MAX(id) AS max_id FROM menu WHERE category = '$category'";
    $result = mysqli_query($db, $query_max_id);
    $row = mysqli_fetch_assoc($result);
    $max_id = $row['max_id'];
    $new_id = $prefix_id . sprintf('%03d', ($max_id + 1));
    $query_insert = "INSERT INTO menu (id, judul, deskripsi, harga, gambar, category) 
                     VALUES ('$new_id', '$judul', '$deskripsi', $harga, '$gambar', '$category')";
    if (mysqli_query($db, $query_insert)) {
        header('Location: ./index.php?halaman=menu');
        exit;
    } else {
        echo "Gagal melakukan insert: " . mysqli_error($db);
    }
} else {
    header('Location: ./index.php?halaman=menu');
    exit;
}

?>
