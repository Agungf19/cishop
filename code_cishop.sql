-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 11 Jul 2020 pada 15.12
-- Versi server: 10.2.31-MariaDB-log
-- Versi PHP: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `code_cishop`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `subtotal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `cart`
--

INSERT INTO `cart` (`id`, `id_user`, `id_product`, `qty`, `subtotal`) VALUES
(1, 2, 3, 2, 500000),
(2, 2, 4, 1, 150000),
(3, 2, 6, 1, 215000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `category`
--

INSERT INTO `category` (`id`, `slug`, `title`) VALUES
(1, 'laptops-gaming', 'Laptops Gaming'),
(2, 'smartphones', 'Smartphones'),
(3, 'game-console', 'Game Console'),
(4, 'powerbank', 'Powerbank'),
(5, 'chargers', 'Chargers'),
(6, 'accesories', 'Accesories'),
(7, 'camera', 'Camera'),
(8, 'smartwatch', 'Smartwatch');

-- --------------------------------------------------------

--
-- Struktur dari tabel `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `date` date NOT NULL,
  `invoice` varchar(100) NOT NULL,
  `total` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `catatan` varchar(255) NOT NULL,
  `status` enum('waiting','paid','delivered','cancel') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `orders`
--

INSERT INTO `orders` (`id`, `id_user`, `date`, `invoice`, `total`, `name`, `address`, `phone`, `catatan`, `status`) VALUES
(13, 1, '2020-07-11', '120200711214712', 500000, 'admin', 'Desa, RT/RW, Kecamatan, Kabupaten - Provinsi', '085726674498', 'Mohon packing dengan aman dan rapi dan tambahkan bublewrap', 'waiting');

-- --------------------------------------------------------

--
-- Struktur dari tabel `orders_confirm`
--

CREATE TABLE `orders_confirm` (
  `id` int(11) NOT NULL,
  `id_orders` int(11) NOT NULL,
  `account_name` varchar(255) NOT NULL,
  `account_number` varchar(50) NOT NULL,
  `nominal` int(11) NOT NULL,
  `note` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `orders_detail`
--

CREATE TABLE `orders_detail` (
  `id` int(11) NOT NULL,
  `id_orders` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `qty` int(4) NOT NULL,
  `subtotal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `orders_detail`
--

INSERT INTO `orders_detail` (`id`, `id_orders`, `id_product`, `qty`, `subtotal`) VALUES
(1, 1, 1, 1, 7000000),
(2, 2, 2, 2, 1000000),
(3, 2, 4, 2, 300000),
(4, 3, 2, 1, 500000),
(5, 4, 2, 1, 500000),
(6, 5, 3, 2, 500000),
(7, 6, 6, 1, 215000),
(8, 7, 7, 1, 1858000),
(9, 8, 2, 1, 500000),
(10, 9, 3, 1, 250000),
(11, 10, 2, 3, 1500000),
(12, 11, 2, 1, 500000),
(13, 12, 2, 3, 1500000),
(14, 13, 2, 1, 500000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `id_category` int(11) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `merk` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `is_available` tinyint(1) NOT NULL DEFAULT 1,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `product`
--

INSERT INTO `product` (`id`, `id_category`, `slug`, `title`, `merk`, `description`, `price`, `is_available`, `image`) VALUES
(1, 2, 'new-iphone-11-pro-max-2020', 'New Iphone 11 Pro Max 2020', 'Apple', 'New smartphone form apple', 7000000, 1, 'newiphone11promax.jpg'),
(2, 3, 'ps-3-stick-console', 'PS 3 Stik Console', 'X-Box', 'Stick controller for PS 3', 500000, 1, 'ps-3-stik-console-20200703181601.jpg'),
(3, 4, 'powerbank-asus-2000-mah', 'Powerbank Asus 2000 mAh', 'Asus', 'Powerbank Asus :\r\n1. 2000 mAh\r\n2. 2 port usb type 3.0\r\n3. output 2 amper', 250000, 1, 'powerbankasus2000mah.jpg'),
(4, 6, 'headset-gaming-rexus', 'headset Gaming Rexus', 'Rexus', 'Headset gaming smartphone', 150000, 1, 'headset-20200702103747.jpg'),
(5, 7, 'kamera-canon-1100d', 'Kamera Canon 1100d', 'Canon', 'Kamera Canon 1100d :\r\n1. Lensa terjual terpisah\r\n2. Anti air IP68\r\n3. Sudah termasuk tas, battery dan charger', 3600000, 1, 'kamera-canon-1100d-20200703184614.jpg'),
(6, 6, 'sd-card-128gb', 'SD Card 128GB', 'SanDisk', 'SD Card 128GB merk Sandisk', 215000, 1, 'sd-card-128gb-20200703184759.jpg'),
(7, 8, 'smartwatch-samsung-gear-s2', 'Smartwatch Samsung Gear S2', 'Samsung', 'Smartwatch Samsung Gear S2 :\r\n1. Anti air IP68\r\n2. Koneksi Bluethoot\r\n', 1858000, 1, 'smartwatch-samsung-gear-s2-20200703185315.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `no_tlp` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('admin','member') NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `name`, `alamat`, `no_tlp`, `email`, `password`, `role`, `is_active`, `image`) VALUES
(1, 'admin', 'Desa, RT/RW, Kecamatan, Kabupaten - Provinsi', '085726674498', 'admin@gmail.com', '$2y$10$4RycOEyyP2YXQSFTOOSP3uP5YU/Q.cVLr0.FdvwAladLnMbST86..', 'admin', 1, 'admin-20200701201410.png'),
(2, 'Hakim', '', '0', 'hakim@gmail.com', '$2y$10$m5BMc5fpNskWoG1BEWkiqefJpidYxHa5JA9HyJX12MPbsx2ZLy/lK', 'member', 1, 'hakim-20200702104103.jpg');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `orders_confirm`
--
ALTER TABLE `orders_confirm`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `orders_detail`
--
ALTER TABLE `orders_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT untuk tabel `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `orders_confirm`
--
ALTER TABLE `orders_confirm`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `orders_detail`
--
ALTER TABLE `orders_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
