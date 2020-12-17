-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 12, 2020 at 03:43 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_js`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_barang` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kategori_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga` double DEFAULT NULL,
  `stok` int(11) NOT NULL,
  `gambar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id`, `nama_barang`, `deskripsi`, `kategori_id`, `harga`, `stok`, `gambar`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Selang 50 m', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. At dolore recusandae saepe sunt, tempora voluptatibus! Aut quam sint ut voluptas? Dolore esse hic porro quas repellendus sint voluptatum. At, dolore!', '1,2,3', 75000, 25, 'Selang-1564747022.jpg', '2019-08-02 02:51:06', '2019-08-05 07:43:22', NULL),
(2, 'Sendok', 'Sendok untuk makan', '1', 10000, 1000, 'Sendok-1564747234.jpg', '2019-08-02 03:23:09', '2020-07-09 08:09:00', NULL),
(5, 'Markisa', 'Lorem ipsum dolor sit ametddd', '1', 60000, 90, 'Markisa-1565020323.jpg', '2019-08-05 08:52:04', '2020-07-09 08:08:38', NULL),
(6, 'sdsdsd', 'waedesasdfg', '1', 40000, 33, 'sdsdsd-1591593238.png', '2020-06-07 22:13:59', '2020-06-07 22:30:12', '2020-06-07 22:30:12'),
(7, 'gkjhbkjb', 'khjgjhgb', '3', 967000, 67, 'gkjhbkjb-1593668842.jpg', '2020-07-01 22:47:22', '2020-07-01 22:47:22', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `barang_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `user_id`, `barang_id`, `qty`, `created_at`, `updated_at`) VALUES
(34, 11, 1, 1, '2020-07-08 20:08:06', '2020-07-08 20:08:06'),
(42, 13, 1, 1, '2020-07-12 03:12:47', '2020-07-12 03:12:47');

-- --------------------------------------------------------

--
-- Table structure for table `delivery`
--

CREATE TABLE `delivery` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `kode_pos` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `no_telp` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `delivery`
--

INSERT INTO `delivery` (`id`, `user_id`, `nama`, `email`, `alamat`, `kode_pos`, `no_telp`) VALUES
(1, '1', 'John Doe', 'john.doe@gmail.com', 'Komp. Ciperna no. 18', '40921', '087822193321'),
(2, '2', 'Budi Doremi', 'budi.doremi@gmail.com', 'Komp. Ciperna no. 19', '40921', '087822193321'),
(3, '2', 'Bude Budi', 'budi.doremi@gmail.com', 'Komp. Ciperna no. 20', '40921', '087822193321'),
(4, '6', 'John Snow', 'john.snow@gmail.com', 'Komp. Panghegar No. 17', '40293', '081232918821'),
(5, '7', 'Agung', 'agung@gmail.com', 'jalan otista, gang anggrek, no.04', '41211', '081320573156'),
(6, '8', 'ajis', 'ajis@gmail.com', 'jalan otista, gang anggrek, no.04', '41211', '081320573156'),
(7, '9', 'rudi', 'rudi@gmail.com', 'jalan otista, gang anggrek, no.04', '41211', '081320573156'),
(8, '10', 'ladalada', 'lada@gmail.com', 'jalan otista, gang anggrek, no.04', '41211', '081320573156'),
(9, '10', 'ladalada', 'lada@gmail.com', 'jalan otista, gang anggrek, no.04', '43124', '081320573156'),
(10, '11', 'saya', 'saya@gmail.com', 'jalan otista, gang anggrek, no.04', '41211', '081320573156'),
(11, '13', 'sekut', 'agung@gmail.com', 'jalan otista, gang anggrek, no.04', '43124', '081320573156'),
(12, '14', 'yayang', 'yayang@gmail.com', 'jalan otista, gang anggrek, no.04', '41211', '081320573156');

-- --------------------------------------------------------

--
-- Table structure for table `detail_transaksi`
--

CREATE TABLE `detail_transaksi` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `transaksi_id` int(11) NOT NULL,
  `barang_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `detail_transaksi`
--

INSERT INTO `detail_transaksi` (`id`, `transaksi_id`, `barang_id`, `qty`) VALUES
(1, 1, 1, 5),
(2, 1, 2, 3),
(3, 11, 2, 7),
(4, 11, 4, 4),
(5, 12, 2, 2),
(6, 12, 4, 2),
(7, 13, 2, 3),
(8, 13, 5, 2),
(9, 13, 1, 3),
(10, 14, 1, 3),
(11, 14, 5, 2),
(12, 15, 5, 3),
(13, 16, 5, 1),
(14, 17, 5, 4),
(15, 18, 2, 6),
(16, 19, 2, 5),
(17, 20, 7, 38),
(18, 21, 5, 1),
(19, 22, 5, 1),
(20, 23, 1, 2),
(21, 24, 1, 4),
(22, 25, 1, 44),
(23, 26, 2, 4),
(24, 27, 2, 5),
(25, 28, 1, 5),
(26, 29, 1, 5),
(27, 30, 7, 1),
(28, 31, 1, 1),
(29, 32, 2, 1),
(30, 33, 1, 4),
(31, 34, 1, 2),
(32, 35, 1, 1),
(33, 36, 1, 1),
(34, 37, 1, 1),
(35, 38, 1, 1),
(36, 38, 2, 1),
(37, 39, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_kategori` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id`, `nama_kategori`) VALUES
(1, 'Pakaian'),
(5, 'Celana');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(2, '2014_10_12_000000_create_users_table', 1),
(3, '2019_08_02_074841_create_barang_table', 1),
(4, '2019_08_02_074952_create_transaksi_table', 1),
(5, '2019_08_02_075722_create_detail_transaksi_table', 1),
(6, '2019_08_02_075939_create_kategori_table', 1),
(7, '2019_08_02_092920_alter_table_barang', 2),
(8, '2019_08_02_093106_alter_table_transaksi', 3),
(9, '2019_08_02_114637_alter_table_barang', 4),
(10, '2019_08_02_123913_alter_table_user', 5),
(12, '2019_08_03_010906_create_table_cart', 6),
(13, '2019_08_03_045315_create_delivery', 7),
(14, '2019_08_03_054528_alter_table_delivery', 8),
(15, '2019_08_03_060435_alter_table_transaksi', 9),
(16, '2019_08_05_164522_alter_table_barang', 10);

-- --------------------------------------------------------

--
-- Table structure for table `pemesanan`
--

CREATE TABLE `pemesanan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nama` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `no_hp` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `warna` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ukuran` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_520_nopad_ci DEFAULT NULL,
  `bahan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alamat` varchar(225) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jumlah` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gambar` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pemesanan`
--

INSERT INTO `pemesanan` (`id`, `user_id`, `nama`, `no_hp`, `email`, `warna`, `ukuran`, `bahan`, `alamat`, `jumlah`, `gambar`, `status`) VALUES
(8, NULL, 'Agung', '081320573156', 'agung@gmail.com', 'Coklat', 'M', 'Katun', 'jalan otista, gang anggrek, no.04', '25', 'pemesanan-1594319183.png', '2'),
(9, NULL, 'Agung', '081320573156', 'agung@gmail.com', 'Coklat', 'M', 'Katun', 'jalan otista, gang anggrek, no.04', '25', NULL, '2');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `delivery_id` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `total_harga` double DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `buktipembayaran` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id`, `user_id`, `delivery_id`, `status`, `total_harga`, `created_at`, `updated_at`, `buktipembayaran`) VALUES
(36, 13, 11, 2, 75000, '2020-07-09 11:29:28', '2020-07-09 11:29:39', '36-1594319379.jpg'),
(37, 14, 12, 1, 75000, '2020-07-09 23:44:03', '2020-07-09 23:44:03', NULL),
(38, 13, 11, 1, 85000, '2020-07-10 19:05:02', '2020-07-10 19:05:02', NULL),
(39, 13, 11, 1, 75000, '2020-07-12 02:57:15', '2020-07-12 02:57:15', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `level` int(11) NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `nama`, `email`, `password`, `level`, `remember_token`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Admin', 'admin@gmail.com', 'admin', 1, NULL, '2019-08-02 08:16:39', '2019-08-02 08:16:42', NULL),
(13, 'Agung', 'agung@gmail.com', 'agung123', 2, NULL, '2020-07-09 04:49:19', '2020-07-09 04:49:19', NULL),
(14, 'yayang', 'yayang@gmail.com', '12345678', 2, NULL, '2020-07-09 23:43:32', '2020-07-09 23:43:32', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `delivery`
--
ALTER TABLE `delivery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pemesanan`
--
ALTER TABLE `pemesanan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `delivery`
--
ALTER TABLE `delivery`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `pemesanan`
--
ALTER TABLE `pemesanan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
