-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 31 Jul 2024 pada 13.02
-- Versi server: 10.4.24-MariaDB
-- Versi PHP: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `webprog`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `menu`
--

CREATE TABLE `menu` (
  `id` varchar(4) NOT NULL,
  `judul` varchar(20) NOT NULL,
  `deskripsi` varchar(100) NOT NULL,
  `harga` varchar(7) NOT NULL,
  `gambar` varchar(40) NOT NULL,
  `category` enum('burgers','sides','drinks','desserts') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `menu`
--

INSERT INTO `menu` (`id`, `judul`, `deskripsi`, `harga`, `gambar`, `category`) VALUES
('1001', 'HAMBURGER: MENU 001', 'Roti, daging sapi, keju, tomat dan timun.', '20.000', 'Burger/menu-burger-01.png', 'burgers'),
('1002', 'HAMBURGER: MENU 002', 'Roti, double daging sapi, keju, tomat.', '24.000', 'Burger/menu-burger-02.png', 'burgers'),
('1003', 'HAMBURGER: MENU 003', 'Roti, daging ayam, keju, tomat dan timun.', '21.000', 'Burger/menu-burger-03.png', 'burgers'),
('1004', 'HAMBURGER: MENU 004', 'Roti, double daging ayam, keju, tomat.', '23.000', 'Burger/menu-burger-04.png', 'burgers'),
('1005', 'HAMBURGER: MENU 005', 'Roti, daging, keju, tomat dan timun.', '26.000', 'Burger/menu-burger-05.png', 'burgers'),
('1006', 'HAMBURGER: MENU 006', 'Roti, daging, keju, tomat dan timun.', '28.000', 'Burger/menu-burger-06.png', 'burgers'),
('1007', 'HAMBURGER: MENU 007', 'Roti, daging, keju, tomat dan timun.', '26.000', 'Burger/menu-burger-07.png', 'burgers'),
('1008', 'HAMBURGER: MENU 008', 'Roti, daging, keju, tomat dan timun.', '22.000', 'Burger/menu-burger-08.png', 'burgers'),
('1112', 'DESSERTS: MENU 0083', 'DESSERTS: MENU 0083', '19.000', '66a1d4a71fa40.jpg', 'burgers'),
('2001', 'KENTANG GORENG', 'Makanan cemilan pengisi perut.', '12.000', 'Sides/menu-sides-01.png', 'sides'),
('2002', 'KENTANG GULUNG', 'Makanan cemilan pengisi perut.', '12.000', 'Sides/menu-sides-02.png', 'sides'),
('2003', 'NUGGET AYAM', 'Makanan cemilan pengisi perut.', '12.000', 'Sides/menu-sides-03.png', 'sides'),
('2004', 'SOSIS SAPI', 'Makanan cemilan pengisi perut.', '12.000', 'Sides/menu-sides-04.png', 'sides'),
('2005', 'ONION RING', 'Makanan cemilan pengisi perut.', '12.000', 'Sides/menu-sides-05.png', 'sides'),
('2006', 'MOZZARELLA STICKS', 'Makanan cemilan pengisi perut.', '12.000', 'Sides/menu-sides-06.png', 'sides'),
('3001', 'SIRUP MARJAM MERAH', 'Minuman penghilang rasa haus.', '18.000', 'Drink/menu-drink-01.png', 'drinks'),
('3002', 'ES TEH MANIS', 'Minuman penghilang rasa haus.', '18.000', 'Drink/menu-drink-02.png', 'drinks'),
('3003', 'ES LEMON', 'Minuman penghilang rasa haus.', '18.000', 'Drink/menu-drink-03.png', 'drinks'),
('3004', 'JUS MANGGA', 'Minuman penghilang rasa haus.', '18.000', 'Drink/menu-drink-04.png', 'drinks'),
('3005', 'ES JERUK', 'Minuman penghilang rasa haus.', '18.000', 'Drink/menu-drink-05.png', 'drinks'),
('3006', 'ES KOPI', 'Minuman penghilang rasa haus.', '18.000', 'Drink/menu-drink-06.png', 'drinks'),
('4001', 'DESSERTS: MENU 001', 'Makanan Penutup', '16.000', 'Dessert/menu-dessert-01.png', 'desserts'),
('4002', 'DESSERTS: MENU 002', 'Makanan Penutup', '16.000', 'Dessert/menu-dessert-02.png', 'desserts'),
('4003', 'DESSERTS: MENU 003', 'Makanan Penutup', '16.000', 'Dessert/menu-dessert-03.png', 'desserts'),
('4004', 'DESSERTS: MENU 004', 'Makanan Penutup', '16.000', 'Dessert/menu-dessert-04.png', 'desserts'),
('4005', 'DESSERTS: MENU 005', 'Makanan Penutup', '16.000', 'Dessert/menu-dessert-05.png', 'desserts'),
('4006', 'DESSERTS: MENU 006', 'Makanan Penutup', '16.000', 'Dessert/menu-dessert-06.png', 'desserts'),
('4007', 'DESSERTS: MENU 007', 'Makanan Penutup', '16.000', 'Dessert/menu-dessert-07.png', 'desserts'),
('4008', 'DESSERTS: MENU 008', 'Makanan Penutup', '16.000', 'Dessert/menu-dessert-08.png', 'desserts');

-- --------------------------------------------------------

--
-- Struktur dari tabel `orders`
--

CREATE TABLE `orders` (
  `id` int(4) NOT NULL,
  `t_barang` int(2) NOT NULL,
  `t_harga` decimal(15,3) NOT NULL,
  `menu_id` varchar(4) NOT NULL,
  `user_id` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `orders`
--

INSERT INTO `orders` (`id`, `t_barang`, `t_harga`, `menu_id`, `user_id`) VALUES
(1168, 4, '72.000', '3006', 28),
(1170, 1, '24.000', '1002', 29),
(1171, 2, '32.000', '4004', 29),
(1172, 4, '72.000', '3002', 29),
(1173, 2, '44.000', '1008', 28),
(1174, 4, '48.000', '2006', 28),
(1175, 1, '24.000', '1002', 31),
(1176, 1, '18.000', '3004', 31),
(1177, 2, '24.000', '2003', 31),
(1179, 2, '36.000', '3006', 31);

-- --------------------------------------------------------

--
-- Struktur dari tabel `setting`
--

CREATE TABLE `setting` (
  `id` varchar(2) NOT NULL,
  `title_web` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `setting`
--

INSERT INTO `setting` (`id`, `title_web`) VALUES
('10', 'Food and Beverage | F & B - Web Programming');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(2) NOT NULL,
  `username` varchar(10) NOT NULL,
  `password` varchar(32) NOT NULL,
  `level` enum('admin','user') NOT NULL,
  `name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `level`, `name`) VALUES
(21, 'admin', '0192023a7bbd73250516f069df18b500', 'admin', 'Cassiel D. Ferdinand'),
(28, 'shalu', '256221b2892290829245a4ee86a45fc1', 'user', 'Siti Shalu P'),
(29, 'vico', '60dc68f927216263ee2c9a8cf2b3e0af', 'user', 'M. Vico Lacosto'),
(31, 'user12', 'd781eaae8248db6ce1a7b82e58e60435', 'user', 'user 001');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Menu` (`menu_id`),
  ADD KEY `User` (`user_id`);

--
-- Indeks untuk tabel `setting`
--
ALTER TABLE `setting`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1180;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `Menu` FOREIGN KEY (`menu_id`) REFERENCES `menu` (`id`),
  ADD CONSTRAINT `User` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
