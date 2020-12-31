/*
 Navicat Premium Data Transfer

 Source Server         : 33060
 Source Server Type    : MySQL
 Source Server Version : 100414
 Source Host           : localhost:33060
 Source Schema         : db_js

 Target Server Type    : MySQL
 Target Server Version : 100414
 File Encoding         : 65001

 Date: 31/12/2020 00:43:10
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for barang
-- ----------------------------
DROP TABLE IF EXISTS `barang`;
CREATE TABLE `barang`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `kodebarang` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `nama_barang` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `kategori_id` bigint(20) UNSIGNED NOT NULL,
  `harga` double NULL DEFAULT NULL,
  `stok` int(11) NOT NULL,
  `gambar` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `deleted_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `fk1_barang`(`kategori_id`) USING BTREE,
  CONSTRAINT `fk1_barang` FOREIGN KEY (`kategori_id`) REFERENCES `kategori` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 15 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of barang
-- ----------------------------
INSERT INTO `barang` VALUES (8, 'GMK001', 'Gamis warna kuning', 'Gamis dengan warna kuning dan nyaman dipakai', 1, 50000, 0, 'Gamis warna kuning-1594640049.jpg', '2020-07-13 11:34:09', '2020-07-13 11:34:09', NULL);
INSERT INTO `barang` VALUES (9, 'GMB001', 'Gamis warna biru', 'Gamis dengan warna biru dan nyaman saat dipakai', 1, 55000, 1, 'Gamis warna biru-1594640099.jpg', '2020-07-13 11:34:59', '2020-12-03 04:59:50', NULL);
INSERT INTO `barang` VALUES (10, 'GMP001', 'Gamis warna pink', 'Gamis dengan warna pink dan nyaman dipakai', 1, 50000, 1, 'Gamis warna pink-1594640152.jpg', '2020-07-13 11:35:52', '2020-12-08 21:06:31', NULL);
INSERT INTO `barang` VALUES (12, 'GM311', 'Celana', 'Uje ada ada aja', 5, 130000, 0, 'Celana-1606946835.jpg', '2020-12-03 05:07:15', '2020-12-08 21:03:12', '2020-12-08 21:03:12');
INSERT INTO `barang` VALUES (13, 'GM345', 'Celana', 'adasdsadasd', 5, 50000, 10, 'Celana-1607442449.jpg', '2020-12-08 22:47:29', '2020-12-08 23:03:31', '2020-12-08 23:03:31');
INSERT INTO `barang` VALUES (14, 'GM345', 'Celana', 'adasdasdad', 5, 50000, 0, 'Celana-1607443462.jpg', '2020-12-08 23:04:01', '2020-12-08 23:10:44', NULL);

-- ----------------------------
-- Table structure for cart
-- ----------------------------
DROP TABLE IF EXISTS `cart`;
CREATE TABLE `cart`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` int(10) UNSIGNED NOT NULL,
  `barang_id` bigint(20) UNSIGNED NOT NULL,
  `qty` int(11) NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `fk1_cart`(`user_id`) USING BTREE,
  INDEX `fk2_cart`(`barang_id`) USING BTREE,
  CONSTRAINT `fk1_cart` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `fk2_cart` FOREIGN KEY (`barang_id`) REFERENCES `barang` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 67 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for delivery
-- ----------------------------
DROP TABLE IF EXISTS `delivery`;
CREATE TABLE `delivery`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `nama` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `alamat` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `no_telp` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `idprovinsi` int(11) NULL DEFAULT NULL,
  `idkota` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 19 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of delivery
-- ----------------------------
INSERT INTO `delivery` VALUES (17, '26', 'Muhammad Riwandi', 'riwandindi17@gmail.com', 'Alamat lengkap di bandung', '083120501577', 9, 55);
INSERT INTO `delivery` VALUES (18, '27', 'Agung', 'agung@gmail.com', 'Jl. Otitsta, Gg.Anggrek', '081320573156229', 9, 428);

-- ----------------------------
-- Table structure for detail_permintaan
-- ----------------------------
DROP TABLE IF EXISTS `detail_permintaan`;
CREATE TABLE `detail_permintaan`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idpembelian` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `idbarang` bigint(20) UNSIGNED NULL DEFAULT NULL,
  `qty` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `fk2_detail_pembelian`(`idbarang`) USING BTREE,
  INDEX `fk1_detail_pembelian`(`idpembelian`) USING BTREE,
  CONSTRAINT `fk1_detail_pembelian` FOREIGN KEY (`idpembelian`) REFERENCES `permintaan` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `fk2_detail_pembelian` FOREIGN KEY (`idbarang`) REFERENCES `barang` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of detail_permintaan
-- ----------------------------
INSERT INTO `detail_permintaan` VALUES (1, '1', 14, 20);

-- ----------------------------
-- Table structure for detail_transaksi
-- ----------------------------
DROP TABLE IF EXISTS `detail_transaksi`;
CREATE TABLE `detail_transaksi`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `transaksi_id` bigint(20) UNSIGNED NOT NULL,
  `barang_id` bigint(20) UNSIGNED NOT NULL,
  `qty` int(11) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `fk1_detail_transaksi`(`transaksi_id`) USING BTREE,
  INDEX `fk2_detail_transaksi`(`barang_id`) USING BTREE,
  CONSTRAINT `fk1_detail_transaksi` FOREIGN KEY (`transaksi_id`) REFERENCES `transaksi` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `fk2_detail_transaksi` FOREIGN KEY (`barang_id`) REFERENCES `barang` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 58 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for kategori
-- ----------------------------
DROP TABLE IF EXISTS `kategori`;
CREATE TABLE `kategori`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nama_kategori` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of kategori
-- ----------------------------
INSERT INTO `kategori` VALUES (1, 'Pakaian');
INSERT INTO `kategori` VALUES (5, 'Celana');

-- ----------------------------
-- Table structure for kota
-- ----------------------------
DROP TABLE IF EXISTS `kota`;
CREATE TABLE `kota`  (
  `idkota` int(11) NOT NULL,
  `idprovinsi` int(11) NULL DEFAULT NULL,
  `nama` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `tipe` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `kodepos` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  PRIMARY KEY (`idkota`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of kota
-- ----------------------------
INSERT INTO `kota` VALUES (1, 21, 'Aceh Barat', 'Kabupaten', '23681');
INSERT INTO `kota` VALUES (2, 21, 'Aceh Barat Daya', 'Kabupaten', '23764');
INSERT INTO `kota` VALUES (3, 21, 'Aceh Besar', 'Kabupaten', '23951');
INSERT INTO `kota` VALUES (4, 21, 'Aceh Jaya', 'Kabupaten', '23654');
INSERT INTO `kota` VALUES (5, 21, 'Aceh Selatan', 'Kabupaten', '23719');
INSERT INTO `kota` VALUES (6, 21, 'Aceh Singkil', 'Kabupaten', '24785');
INSERT INTO `kota` VALUES (7, 21, 'Aceh Tamiang', 'Kabupaten', '24476');
INSERT INTO `kota` VALUES (8, 21, 'Aceh Tengah', 'Kabupaten', '24511');
INSERT INTO `kota` VALUES (9, 21, 'Aceh Tenggara', 'Kabupaten', '24611');
INSERT INTO `kota` VALUES (10, 21, 'Aceh Timur', 'Kabupaten', '24454');
INSERT INTO `kota` VALUES (11, 21, 'Aceh Utara', 'Kabupaten', '24382');
INSERT INTO `kota` VALUES (12, 32, 'Agam', 'Kabupaten', '26411');
INSERT INTO `kota` VALUES (13, 23, 'Alor', 'Kabupaten', '85811');
INSERT INTO `kota` VALUES (14, 19, 'Ambon', 'Kota', '97222');
INSERT INTO `kota` VALUES (15, 34, 'Asahan', 'Kabupaten', '21214');
INSERT INTO `kota` VALUES (16, 24, 'Asmat', 'Kabupaten', '99777');
INSERT INTO `kota` VALUES (17, 1, 'Badung', 'Kabupaten', '80351');
INSERT INTO `kota` VALUES (18, 13, 'Balangan', 'Kabupaten', '71611');
INSERT INTO `kota` VALUES (19, 15, 'Balikpapan', 'Kota', '76111');
INSERT INTO `kota` VALUES (20, 21, 'Banda Aceh', 'Kota', '23238');
INSERT INTO `kota` VALUES (21, 18, 'Bandar Lampung', 'Kota', '35139');
INSERT INTO `kota` VALUES (22, 9, 'Bandung', 'Kabupaten', '40311');
INSERT INTO `kota` VALUES (23, 9, 'Bandung', 'Kota', '40111');
INSERT INTO `kota` VALUES (24, 9, 'Bandung Barat', 'Kabupaten', '40721');
INSERT INTO `kota` VALUES (25, 29, 'Banggai', 'Kabupaten', '94711');
INSERT INTO `kota` VALUES (26, 29, 'Banggai Kepulauan', 'Kabupaten', '94881');
INSERT INTO `kota` VALUES (27, 2, 'Bangka', 'Kabupaten', '33212');
INSERT INTO `kota` VALUES (28, 2, 'Bangka Barat', 'Kabupaten', '33315');
INSERT INTO `kota` VALUES (29, 2, 'Bangka Selatan', 'Kabupaten', '33719');
INSERT INTO `kota` VALUES (30, 2, 'Bangka Tengah', 'Kabupaten', '33613');
INSERT INTO `kota` VALUES (31, 11, 'Bangkalan', 'Kabupaten', '69118');
INSERT INTO `kota` VALUES (32, 1, 'Bangli', 'Kabupaten', '80619');
INSERT INTO `kota` VALUES (33, 13, 'Banjar', 'Kabupaten', '70619');
INSERT INTO `kota` VALUES (34, 9, 'Banjar', 'Kota', '46311');
INSERT INTO `kota` VALUES (35, 13, 'Banjarbaru', 'Kota', '70712');
INSERT INTO `kota` VALUES (36, 13, 'Banjarmasin', 'Kota', '70117');
INSERT INTO `kota` VALUES (37, 10, 'Banjarnegara', 'Kabupaten', '53419');
INSERT INTO `kota` VALUES (38, 28, 'Bantaeng', 'Kabupaten', '92411');
INSERT INTO `kota` VALUES (39, 5, 'Bantul', 'Kabupaten', '55715');
INSERT INTO `kota` VALUES (40, 33, 'Banyuasin', 'Kabupaten', '30911');
INSERT INTO `kota` VALUES (41, 10, 'Banyumas', 'Kabupaten', '53114');
INSERT INTO `kota` VALUES (42, 11, 'Banyuwangi', 'Kabupaten', '68416');
INSERT INTO `kota` VALUES (43, 13, 'Barito Kuala', 'Kabupaten', '70511');
INSERT INTO `kota` VALUES (44, 14, 'Barito Selatan', 'Kabupaten', '73711');
INSERT INTO `kota` VALUES (45, 14, 'Barito Timur', 'Kabupaten', '73671');
INSERT INTO `kota` VALUES (46, 14, 'Barito Utara', 'Kabupaten', '73881');
INSERT INTO `kota` VALUES (47, 28, 'Barru', 'Kabupaten', '90719');
INSERT INTO `kota` VALUES (48, 17, 'Batam', 'Kota', '29413');
INSERT INTO `kota` VALUES (49, 10, 'Batang', 'Kabupaten', '51211');
INSERT INTO `kota` VALUES (50, 8, 'Batang Hari', 'Kabupaten', '36613');
INSERT INTO `kota` VALUES (51, 11, 'Batu', 'Kota', '65311');
INSERT INTO `kota` VALUES (52, 34, 'Batu Bara', 'Kabupaten', '21655');
INSERT INTO `kota` VALUES (53, 30, 'Bau-Bau', 'Kota', '93719');
INSERT INTO `kota` VALUES (54, 9, 'Bekasi', 'Kabupaten', '17837');
INSERT INTO `kota` VALUES (55, 9, 'Bekasi', 'Kota', '17121');
INSERT INTO `kota` VALUES (56, 2, 'Belitung', 'Kabupaten', '33419');
INSERT INTO `kota` VALUES (57, 2, 'Belitung Timur', 'Kabupaten', '33519');
INSERT INTO `kota` VALUES (58, 23, 'Belu', 'Kabupaten', '85711');
INSERT INTO `kota` VALUES (59, 21, 'Bener Meriah', 'Kabupaten', '24581');
INSERT INTO `kota` VALUES (60, 26, 'Bengkalis', 'Kabupaten', '28719');
INSERT INTO `kota` VALUES (61, 12, 'Bengkayang', 'Kabupaten', '79213');
INSERT INTO `kota` VALUES (62, 4, 'Bengkulu', 'Kota', '38229');
INSERT INTO `kota` VALUES (63, 4, 'Bengkulu Selatan', 'Kabupaten', '38519');
INSERT INTO `kota` VALUES (64, 4, 'Bengkulu Tengah', 'Kabupaten', '38319');
INSERT INTO `kota` VALUES (65, 4, 'Bengkulu Utara', 'Kabupaten', '38619');
INSERT INTO `kota` VALUES (66, 15, 'Berau', 'Kabupaten', '77311');
INSERT INTO `kota` VALUES (67, 24, 'Biak Numfor', 'Kabupaten', '98119');
INSERT INTO `kota` VALUES (68, 22, 'Bima', 'Kabupaten', '84171');
INSERT INTO `kota` VALUES (69, 22, 'Bima', 'Kota', '84139');
INSERT INTO `kota` VALUES (70, 34, 'Binjai', 'Kota', '20712');
INSERT INTO `kota` VALUES (71, 17, 'Bintan', 'Kabupaten', '29135');
INSERT INTO `kota` VALUES (72, 21, 'Bireuen', 'Kabupaten', '24219');
INSERT INTO `kota` VALUES (73, 31, 'Bitung', 'Kota', '95512');
INSERT INTO `kota` VALUES (74, 11, 'Blitar', 'Kabupaten', '66171');
INSERT INTO `kota` VALUES (75, 11, 'Blitar', 'Kota', '66124');
INSERT INTO `kota` VALUES (76, 10, 'Blora', 'Kabupaten', '58219');
INSERT INTO `kota` VALUES (77, 7, 'Boalemo', 'Kabupaten', '96319');
INSERT INTO `kota` VALUES (78, 9, 'Bogor', 'Kabupaten', '16911');
INSERT INTO `kota` VALUES (79, 9, 'Bogor', 'Kota', '16119');
INSERT INTO `kota` VALUES (80, 11, 'Bojonegoro', 'Kabupaten', '62119');
INSERT INTO `kota` VALUES (81, 31, 'Bolaang Mongondow (Bolmong)', 'Kabupaten', '95755');
INSERT INTO `kota` VALUES (82, 31, 'Bolaang Mongondow Selatan', 'Kabupaten', '95774');
INSERT INTO `kota` VALUES (83, 31, 'Bolaang Mongondow Timur', 'Kabupaten', '95783');
INSERT INTO `kota` VALUES (84, 31, 'Bolaang Mongondow Utara', 'Kabupaten', '95765');
INSERT INTO `kota` VALUES (85, 30, 'Bombana', 'Kabupaten', '93771');
INSERT INTO `kota` VALUES (86, 11, 'Bondowoso', 'Kabupaten', '68219');
INSERT INTO `kota` VALUES (87, 28, 'Bone', 'Kabupaten', '92713');
INSERT INTO `kota` VALUES (88, 7, 'Bone Bolango', 'Kabupaten', '96511');
INSERT INTO `kota` VALUES (89, 15, 'Bontang', 'Kota', '75313');
INSERT INTO `kota` VALUES (90, 24, 'Boven Digoel', 'Kabupaten', '99662');
INSERT INTO `kota` VALUES (91, 10, 'Boyolali', 'Kabupaten', '57312');
INSERT INTO `kota` VALUES (92, 10, 'Brebes', 'Kabupaten', '52212');
INSERT INTO `kota` VALUES (93, 32, 'Bukittinggi', 'Kota', '26115');
INSERT INTO `kota` VALUES (94, 1, 'Buleleng', 'Kabupaten', '81111');
INSERT INTO `kota` VALUES (95, 28, 'Bulukumba', 'Kabupaten', '92511');
INSERT INTO `kota` VALUES (96, 16, 'Bulungan (Bulongan)', 'Kabupaten', '77211');
INSERT INTO `kota` VALUES (97, 8, 'Bungo', 'Kabupaten', '37216');
INSERT INTO `kota` VALUES (98, 29, 'Buol', 'Kabupaten', '94564');
INSERT INTO `kota` VALUES (99, 19, 'Buru', 'Kabupaten', '97371');
INSERT INTO `kota` VALUES (100, 19, 'Buru Selatan', 'Kabupaten', '97351');
INSERT INTO `kota` VALUES (101, 30, 'Buton', 'Kabupaten', '93754');
INSERT INTO `kota` VALUES (102, 30, 'Buton Utara', 'Kabupaten', '93745');
INSERT INTO `kota` VALUES (103, 9, 'Ciamis', 'Kabupaten', '46211');
INSERT INTO `kota` VALUES (104, 9, 'Cianjur', 'Kabupaten', '43217');
INSERT INTO `kota` VALUES (105, 10, 'Cilacap', 'Kabupaten', '53211');
INSERT INTO `kota` VALUES (106, 3, 'Cilegon', 'Kota', '42417');
INSERT INTO `kota` VALUES (107, 9, 'Cimahi', 'Kota', '40512');
INSERT INTO `kota` VALUES (108, 9, 'Cirebon', 'Kabupaten', '45611');
INSERT INTO `kota` VALUES (109, 9, 'Cirebon', 'Kota', '45116');
INSERT INTO `kota` VALUES (110, 34, 'Dairi', 'Kabupaten', '22211');
INSERT INTO `kota` VALUES (111, 24, 'Deiyai (Deliyai)', 'Kabupaten', '98784');
INSERT INTO `kota` VALUES (112, 34, 'Deli Serdang', 'Kabupaten', '20511');
INSERT INTO `kota` VALUES (113, 10, 'Demak', 'Kabupaten', '59519');
INSERT INTO `kota` VALUES (114, 1, 'Denpasar', 'Kota', '80227');
INSERT INTO `kota` VALUES (115, 9, 'Depok', 'Kota', '16416');
INSERT INTO `kota` VALUES (116, 32, 'Dharmasraya', 'Kabupaten', '27612');
INSERT INTO `kota` VALUES (117, 24, 'Dogiyai', 'Kabupaten', '98866');
INSERT INTO `kota` VALUES (118, 22, 'Dompu', 'Kabupaten', '84217');
INSERT INTO `kota` VALUES (119, 29, 'Donggala', 'Kabupaten', '94341');
INSERT INTO `kota` VALUES (120, 26, 'Dumai', 'Kota', '28811');
INSERT INTO `kota` VALUES (121, 33, 'Empat Lawang', 'Kabupaten', '31811');
INSERT INTO `kota` VALUES (122, 23, 'Ende', 'Kabupaten', '86351');
INSERT INTO `kota` VALUES (123, 28, 'Enrekang', 'Kabupaten', '91719');
INSERT INTO `kota` VALUES (124, 25, 'Fakfak', 'Kabupaten', '98651');
INSERT INTO `kota` VALUES (125, 23, 'Flores Timur', 'Kabupaten', '86213');
INSERT INTO `kota` VALUES (126, 9, 'Garut', 'Kabupaten', '44126');
INSERT INTO `kota` VALUES (127, 21, 'Gayo Lues', 'Kabupaten', '24653');
INSERT INTO `kota` VALUES (128, 1, 'Gianyar', 'Kabupaten', '80519');
INSERT INTO `kota` VALUES (129, 7, 'Gorontalo', 'Kabupaten', '96218');
INSERT INTO `kota` VALUES (130, 7, 'Gorontalo', 'Kota', '96115');
INSERT INTO `kota` VALUES (131, 7, 'Gorontalo Utara', 'Kabupaten', '96611');
INSERT INTO `kota` VALUES (132, 28, 'Gowa', 'Kabupaten', '92111');
INSERT INTO `kota` VALUES (133, 11, 'Gresik', 'Kabupaten', '61115');
INSERT INTO `kota` VALUES (134, 10, 'Grobogan', 'Kabupaten', '58111');
INSERT INTO `kota` VALUES (135, 5, 'Gunung Kidul', 'Kabupaten', '55812');
INSERT INTO `kota` VALUES (136, 14, 'Gunung Mas', 'Kabupaten', '74511');
INSERT INTO `kota` VALUES (137, 34, 'Gunungsitoli', 'Kota', '22813');
INSERT INTO `kota` VALUES (138, 20, 'Halmahera Barat', 'Kabupaten', '97757');
INSERT INTO `kota` VALUES (139, 20, 'Halmahera Selatan', 'Kabupaten', '97911');
INSERT INTO `kota` VALUES (140, 20, 'Halmahera Tengah', 'Kabupaten', '97853');
INSERT INTO `kota` VALUES (141, 20, 'Halmahera Timur', 'Kabupaten', '97862');
INSERT INTO `kota` VALUES (142, 20, 'Halmahera Utara', 'Kabupaten', '97762');
INSERT INTO `kota` VALUES (143, 13, 'Hulu Sungai Selatan', 'Kabupaten', '71212');
INSERT INTO `kota` VALUES (144, 13, 'Hulu Sungai Tengah', 'Kabupaten', '71313');
INSERT INTO `kota` VALUES (145, 13, 'Hulu Sungai Utara', 'Kabupaten', '71419');
INSERT INTO `kota` VALUES (146, 34, 'Humbang Hasundutan', 'Kabupaten', '22457');
INSERT INTO `kota` VALUES (147, 26, 'Indragiri Hilir', 'Kabupaten', '29212');
INSERT INTO `kota` VALUES (148, 26, 'Indragiri Hulu', 'Kabupaten', '29319');
INSERT INTO `kota` VALUES (149, 9, 'Indramayu', 'Kabupaten', '45214');
INSERT INTO `kota` VALUES (150, 24, 'Intan Jaya', 'Kabupaten', '98771');
INSERT INTO `kota` VALUES (151, 6, 'Jakarta Barat', 'Kota', '11220');
INSERT INTO `kota` VALUES (152, 6, 'Jakarta Pusat', 'Kota', '10540');
INSERT INTO `kota` VALUES (153, 6, 'Jakarta Selatan', 'Kota', '12230');
INSERT INTO `kota` VALUES (154, 6, 'Jakarta Timur', 'Kota', '13330');
INSERT INTO `kota` VALUES (155, 6, 'Jakarta Utara', 'Kota', '14140');
INSERT INTO `kota` VALUES (156, 8, 'Jambi', 'Kota', '36111');
INSERT INTO `kota` VALUES (157, 24, 'Jayapura', 'Kabupaten', '99352');
INSERT INTO `kota` VALUES (158, 24, 'Jayapura', 'Kota', '99114');
INSERT INTO `kota` VALUES (159, 24, 'Jayawijaya', 'Kabupaten', '99511');
INSERT INTO `kota` VALUES (160, 11, 'Jember', 'Kabupaten', '68113');
INSERT INTO `kota` VALUES (161, 1, 'Jembrana', 'Kabupaten', '82251');
INSERT INTO `kota` VALUES (162, 28, 'Jeneponto', 'Kabupaten', '92319');
INSERT INTO `kota` VALUES (163, 10, 'Jepara', 'Kabupaten', '59419');
INSERT INTO `kota` VALUES (164, 11, 'Jombang', 'Kabupaten', '61415');
INSERT INTO `kota` VALUES (165, 25, 'Kaimana', 'Kabupaten', '98671');
INSERT INTO `kota` VALUES (166, 26, 'Kampar', 'Kabupaten', '28411');
INSERT INTO `kota` VALUES (167, 14, 'Kapuas', 'Kabupaten', '73583');
INSERT INTO `kota` VALUES (168, 12, 'Kapuas Hulu', 'Kabupaten', '78719');
INSERT INTO `kota` VALUES (169, 10, 'Karanganyar', 'Kabupaten', '57718');
INSERT INTO `kota` VALUES (170, 1, 'Karangasem', 'Kabupaten', '80819');
INSERT INTO `kota` VALUES (171, 9, 'Karawang', 'Kabupaten', '41311');
INSERT INTO `kota` VALUES (172, 17, 'Karimun', 'Kabupaten', '29611');
INSERT INTO `kota` VALUES (173, 34, 'Karo', 'Kabupaten', '22119');
INSERT INTO `kota` VALUES (174, 14, 'Katingan', 'Kabupaten', '74411');
INSERT INTO `kota` VALUES (175, 4, 'Kaur', 'Kabupaten', '38911');
INSERT INTO `kota` VALUES (176, 12, 'Kayong Utara', 'Kabupaten', '78852');
INSERT INTO `kota` VALUES (177, 10, 'Kebumen', 'Kabupaten', '54319');
INSERT INTO `kota` VALUES (178, 11, 'Kediri', 'Kabupaten', '64184');
INSERT INTO `kota` VALUES (179, 11, 'Kediri', 'Kota', '64125');
INSERT INTO `kota` VALUES (180, 24, 'Keerom', 'Kabupaten', '99461');
INSERT INTO `kota` VALUES (181, 10, 'Kendal', 'Kabupaten', '51314');
INSERT INTO `kota` VALUES (182, 30, 'Kendari', 'Kota', '93126');
INSERT INTO `kota` VALUES (183, 4, 'Kepahiang', 'Kabupaten', '39319');
INSERT INTO `kota` VALUES (184, 17, 'Kepulauan Anambas', 'Kabupaten', '29991');
INSERT INTO `kota` VALUES (185, 19, 'Kepulauan Aru', 'Kabupaten', '97681');
INSERT INTO `kota` VALUES (186, 32, 'Kepulauan Mentawai', 'Kabupaten', '25771');
INSERT INTO `kota` VALUES (187, 26, 'Kepulauan Meranti', 'Kabupaten', '28791');
INSERT INTO `kota` VALUES (188, 31, 'Kepulauan Sangihe', 'Kabupaten', '95819');
INSERT INTO `kota` VALUES (189, 6, 'Kepulauan Seribu', 'Kabupaten', '14550');
INSERT INTO `kota` VALUES (190, 31, 'Kepulauan Siau Tagulandang Biaro (Sitaro)', 'Kabupaten', '95862');
INSERT INTO `kota` VALUES (191, 20, 'Kepulauan Sula', 'Kabupaten', '97995');
INSERT INTO `kota` VALUES (192, 31, 'Kepulauan Talaud', 'Kabupaten', '95885');
INSERT INTO `kota` VALUES (193, 24, 'Kepulauan Yapen (Yapen Waropen)', 'Kabupaten', '98211');
INSERT INTO `kota` VALUES (194, 8, 'Kerinci', 'Kabupaten', '37167');
INSERT INTO `kota` VALUES (195, 12, 'Ketapang', 'Kabupaten', '78874');
INSERT INTO `kota` VALUES (196, 10, 'Klaten', 'Kabupaten', '57411');
INSERT INTO `kota` VALUES (197, 1, 'Klungkung', 'Kabupaten', '80719');
INSERT INTO `kota` VALUES (198, 30, 'Kolaka', 'Kabupaten', '93511');
INSERT INTO `kota` VALUES (199, 30, 'Kolaka Utara', 'Kabupaten', '93911');
INSERT INTO `kota` VALUES (200, 30, 'Konawe', 'Kabupaten', '93411');
INSERT INTO `kota` VALUES (201, 30, 'Konawe Selatan', 'Kabupaten', '93811');
INSERT INTO `kota` VALUES (202, 30, 'Konawe Utara', 'Kabupaten', '93311');
INSERT INTO `kota` VALUES (203, 13, 'Kotabaru', 'Kabupaten', '72119');
INSERT INTO `kota` VALUES (204, 31, 'Kotamobagu', 'Kota', '95711');
INSERT INTO `kota` VALUES (205, 14, 'Kotawaringin Barat', 'Kabupaten', '74119');
INSERT INTO `kota` VALUES (206, 14, 'Kotawaringin Timur', 'Kabupaten', '74364');
INSERT INTO `kota` VALUES (207, 26, 'Kuantan Singingi', 'Kabupaten', '29519');
INSERT INTO `kota` VALUES (208, 12, 'Kubu Raya', 'Kabupaten', '78311');
INSERT INTO `kota` VALUES (209, 10, 'Kudus', 'Kabupaten', '59311');
INSERT INTO `kota` VALUES (210, 5, 'Kulon Progo', 'Kabupaten', '55611');
INSERT INTO `kota` VALUES (211, 9, 'Kuningan', 'Kabupaten', '45511');
INSERT INTO `kota` VALUES (212, 23, 'Kupang', 'Kabupaten', '85362');
INSERT INTO `kota` VALUES (213, 23, 'Kupang', 'Kota', '85119');
INSERT INTO `kota` VALUES (214, 15, 'Kutai Barat', 'Kabupaten', '75711');
INSERT INTO `kota` VALUES (215, 15, 'Kutai Kartanegara', 'Kabupaten', '75511');
INSERT INTO `kota` VALUES (216, 15, 'Kutai Timur', 'Kabupaten', '75611');
INSERT INTO `kota` VALUES (217, 34, 'Labuhan Batu', 'Kabupaten', '21412');
INSERT INTO `kota` VALUES (218, 34, 'Labuhan Batu Selatan', 'Kabupaten', '21511');
INSERT INTO `kota` VALUES (219, 34, 'Labuhan Batu Utara', 'Kabupaten', '21711');
INSERT INTO `kota` VALUES (220, 33, 'Lahat', 'Kabupaten', '31419');
INSERT INTO `kota` VALUES (221, 14, 'Lamandau', 'Kabupaten', '74611');
INSERT INTO `kota` VALUES (222, 11, 'Lamongan', 'Kabupaten', '64125');
INSERT INTO `kota` VALUES (223, 18, 'Lampung Barat', 'Kabupaten', '34814');
INSERT INTO `kota` VALUES (224, 18, 'Lampung Selatan', 'Kabupaten', '35511');
INSERT INTO `kota` VALUES (225, 18, 'Lampung Tengah', 'Kabupaten', '34212');
INSERT INTO `kota` VALUES (226, 18, 'Lampung Timur', 'Kabupaten', '34319');
INSERT INTO `kota` VALUES (227, 18, 'Lampung Utara', 'Kabupaten', '34516');
INSERT INTO `kota` VALUES (228, 12, 'Landak', 'Kabupaten', '78319');
INSERT INTO `kota` VALUES (229, 34, 'Langkat', 'Kabupaten', '20811');
INSERT INTO `kota` VALUES (230, 21, 'Langsa', 'Kota', '24412');
INSERT INTO `kota` VALUES (231, 24, 'Lanny Jaya', 'Kabupaten', '99531');
INSERT INTO `kota` VALUES (232, 3, 'Lebak', 'Kabupaten', '42319');
INSERT INTO `kota` VALUES (233, 4, 'Lebong', 'Kabupaten', '39264');
INSERT INTO `kota` VALUES (234, 23, 'Lembata', 'Kabupaten', '86611');
INSERT INTO `kota` VALUES (235, 21, 'Lhokseumawe', 'Kota', '24352');
INSERT INTO `kota` VALUES (236, 32, 'Lima Puluh Koto/Kota', 'Kabupaten', '26671');
INSERT INTO `kota` VALUES (237, 17, 'Lingga', 'Kabupaten', '29811');
INSERT INTO `kota` VALUES (238, 22, 'Lombok Barat', 'Kabupaten', '83311');
INSERT INTO `kota` VALUES (239, 22, 'Lombok Tengah', 'Kabupaten', '83511');
INSERT INTO `kota` VALUES (240, 22, 'Lombok Timur', 'Kabupaten', '83612');
INSERT INTO `kota` VALUES (241, 22, 'Lombok Utara', 'Kabupaten', '83711');
INSERT INTO `kota` VALUES (242, 33, 'Lubuk Linggau', 'Kota', '31614');
INSERT INTO `kota` VALUES (243, 11, 'Lumajang', 'Kabupaten', '67319');
INSERT INTO `kota` VALUES (244, 28, 'Luwu', 'Kabupaten', '91994');
INSERT INTO `kota` VALUES (245, 28, 'Luwu Timur', 'Kabupaten', '92981');
INSERT INTO `kota` VALUES (246, 28, 'Luwu Utara', 'Kabupaten', '92911');
INSERT INTO `kota` VALUES (247, 11, 'Madiun', 'Kabupaten', '63153');
INSERT INTO `kota` VALUES (248, 11, 'Madiun', 'Kota', '63122');
INSERT INTO `kota` VALUES (249, 10, 'Magelang', 'Kabupaten', '56519');
INSERT INTO `kota` VALUES (250, 10, 'Magelang', 'Kota', '56133');
INSERT INTO `kota` VALUES (251, 11, 'Magetan', 'Kabupaten', '63314');
INSERT INTO `kota` VALUES (252, 9, 'Majalengka', 'Kabupaten', '45412');
INSERT INTO `kota` VALUES (253, 27, 'Majene', 'Kabupaten', '91411');
INSERT INTO `kota` VALUES (254, 28, 'Makassar', 'Kota', '90111');
INSERT INTO `kota` VALUES (255, 11, 'Malang', 'Kabupaten', '65163');
INSERT INTO `kota` VALUES (256, 11, 'Malang', 'Kota', '65112');
INSERT INTO `kota` VALUES (257, 16, 'Malinau', 'Kabupaten', '77511');
INSERT INTO `kota` VALUES (258, 19, 'Maluku Barat Daya', 'Kabupaten', '97451');
INSERT INTO `kota` VALUES (259, 19, 'Maluku Tengah', 'Kabupaten', '97513');
INSERT INTO `kota` VALUES (260, 19, 'Maluku Tenggara', 'Kabupaten', '97651');
INSERT INTO `kota` VALUES (261, 19, 'Maluku Tenggara Barat', 'Kabupaten', '97465');
INSERT INTO `kota` VALUES (262, 27, 'Mamasa', 'Kabupaten', '91362');
INSERT INTO `kota` VALUES (263, 24, 'Mamberamo Raya', 'Kabupaten', '99381');
INSERT INTO `kota` VALUES (264, 24, 'Mamberamo Tengah', 'Kabupaten', '99553');
INSERT INTO `kota` VALUES (265, 27, 'Mamuju', 'Kabupaten', '91519');
INSERT INTO `kota` VALUES (266, 27, 'Mamuju Utara', 'Kabupaten', '91571');
INSERT INTO `kota` VALUES (267, 31, 'Manado', 'Kota', '95247');
INSERT INTO `kota` VALUES (268, 34, 'Mandailing Natal', 'Kabupaten', '22916');
INSERT INTO `kota` VALUES (269, 23, 'Manggarai', 'Kabupaten', '86551');
INSERT INTO `kota` VALUES (270, 23, 'Manggarai Barat', 'Kabupaten', '86711');
INSERT INTO `kota` VALUES (271, 23, 'Manggarai Timur', 'Kabupaten', '86811');
INSERT INTO `kota` VALUES (272, 25, 'Manokwari', 'Kabupaten', '98311');
INSERT INTO `kota` VALUES (273, 25, 'Manokwari Selatan', 'Kabupaten', '98355');
INSERT INTO `kota` VALUES (274, 24, 'Mappi', 'Kabupaten', '99853');
INSERT INTO `kota` VALUES (275, 28, 'Maros', 'Kabupaten', '90511');
INSERT INTO `kota` VALUES (276, 22, 'Mataram', 'Kota', '83131');
INSERT INTO `kota` VALUES (277, 25, 'Maybrat', 'Kabupaten', '98051');
INSERT INTO `kota` VALUES (278, 34, 'Medan', 'Kota', '20228');
INSERT INTO `kota` VALUES (279, 12, 'Melawi', 'Kabupaten', '78619');
INSERT INTO `kota` VALUES (280, 8, 'Merangin', 'Kabupaten', '37319');
INSERT INTO `kota` VALUES (281, 24, 'Merauke', 'Kabupaten', '99613');
INSERT INTO `kota` VALUES (282, 18, 'Mesuji', 'Kabupaten', '34911');
INSERT INTO `kota` VALUES (283, 18, 'Metro', 'Kota', '34111');
INSERT INTO `kota` VALUES (284, 24, 'Mimika', 'Kabupaten', '99962');
INSERT INTO `kota` VALUES (285, 31, 'Minahasa', 'Kabupaten', '95614');
INSERT INTO `kota` VALUES (286, 31, 'Minahasa Selatan', 'Kabupaten', '95914');
INSERT INTO `kota` VALUES (287, 31, 'Minahasa Tenggara', 'Kabupaten', '95995');
INSERT INTO `kota` VALUES (288, 31, 'Minahasa Utara', 'Kabupaten', '95316');
INSERT INTO `kota` VALUES (289, 11, 'Mojokerto', 'Kabupaten', '61382');
INSERT INTO `kota` VALUES (290, 11, 'Mojokerto', 'Kota', '61316');
INSERT INTO `kota` VALUES (291, 29, 'Morowali', 'Kabupaten', '94911');
INSERT INTO `kota` VALUES (292, 33, 'Muara Enim', 'Kabupaten', '31315');
INSERT INTO `kota` VALUES (293, 8, 'Muaro Jambi', 'Kabupaten', '36311');
INSERT INTO `kota` VALUES (294, 4, 'Muko Muko', 'Kabupaten', '38715');
INSERT INTO `kota` VALUES (295, 30, 'Muna', 'Kabupaten', '93611');
INSERT INTO `kota` VALUES (296, 14, 'Murung Raya', 'Kabupaten', '73911');
INSERT INTO `kota` VALUES (297, 33, 'Musi Banyuasin', 'Kabupaten', '30719');
INSERT INTO `kota` VALUES (298, 33, 'Musi Rawas', 'Kabupaten', '31661');
INSERT INTO `kota` VALUES (299, 24, 'Nabire', 'Kabupaten', '98816');
INSERT INTO `kota` VALUES (300, 21, 'Nagan Raya', 'Kabupaten', '23674');
INSERT INTO `kota` VALUES (301, 23, 'Nagekeo', 'Kabupaten', '86911');
INSERT INTO `kota` VALUES (302, 17, 'Natuna', 'Kabupaten', '29711');
INSERT INTO `kota` VALUES (303, 24, 'Nduga', 'Kabupaten', '99541');
INSERT INTO `kota` VALUES (304, 23, 'Ngada', 'Kabupaten', '86413');
INSERT INTO `kota` VALUES (305, 11, 'Nganjuk', 'Kabupaten', '64414');
INSERT INTO `kota` VALUES (306, 11, 'Ngawi', 'Kabupaten', '63219');
INSERT INTO `kota` VALUES (307, 34, 'Nias', 'Kabupaten', '22876');
INSERT INTO `kota` VALUES (308, 34, 'Nias Barat', 'Kabupaten', '22895');
INSERT INTO `kota` VALUES (309, 34, 'Nias Selatan', 'Kabupaten', '22865');
INSERT INTO `kota` VALUES (310, 34, 'Nias Utara', 'Kabupaten', '22856');
INSERT INTO `kota` VALUES (311, 16, 'Nunukan', 'Kabupaten', '77421');
INSERT INTO `kota` VALUES (312, 33, 'Ogan Ilir', 'Kabupaten', '30811');
INSERT INTO `kota` VALUES (313, 33, 'Ogan Komering Ilir', 'Kabupaten', '30618');
INSERT INTO `kota` VALUES (314, 33, 'Ogan Komering Ulu', 'Kabupaten', '32112');
INSERT INTO `kota` VALUES (315, 33, 'Ogan Komering Ulu Selatan', 'Kabupaten', '32211');
INSERT INTO `kota` VALUES (316, 33, 'Ogan Komering Ulu Timur', 'Kabupaten', '32312');
INSERT INTO `kota` VALUES (317, 11, 'Pacitan', 'Kabupaten', '63512');
INSERT INTO `kota` VALUES (318, 32, 'Padang', 'Kota', '25112');
INSERT INTO `kota` VALUES (319, 34, 'Padang Lawas', 'Kabupaten', '22763');
INSERT INTO `kota` VALUES (320, 34, 'Padang Lawas Utara', 'Kabupaten', '22753');
INSERT INTO `kota` VALUES (321, 32, 'Padang Panjang', 'Kota', '27122');
INSERT INTO `kota` VALUES (322, 32, 'Padang Pariaman', 'Kabupaten', '25583');
INSERT INTO `kota` VALUES (323, 34, 'Padang Sidempuan', 'Kota', '22727');
INSERT INTO `kota` VALUES (324, 33, 'Pagar Alam', 'Kota', '31512');
INSERT INTO `kota` VALUES (325, 34, 'Pakpak Bharat', 'Kabupaten', '22272');
INSERT INTO `kota` VALUES (326, 14, 'Palangka Raya', 'Kota', '73112');
INSERT INTO `kota` VALUES (327, 33, 'Palembang', 'Kota', '30111');
INSERT INTO `kota` VALUES (328, 28, 'Palopo', 'Kota', '91911');
INSERT INTO `kota` VALUES (329, 29, 'Palu', 'Kota', '94111');
INSERT INTO `kota` VALUES (330, 11, 'Pamekasan', 'Kabupaten', '69319');
INSERT INTO `kota` VALUES (331, 3, 'Pandeglang', 'Kabupaten', '42212');
INSERT INTO `kota` VALUES (332, 9, 'Pangandaran', 'Kabupaten', '46511');
INSERT INTO `kota` VALUES (333, 28, 'Pangkajene Kepulauan', 'Kabupaten', '90611');
INSERT INTO `kota` VALUES (334, 2, 'Pangkal Pinang', 'Kota', '33115');
INSERT INTO `kota` VALUES (335, 24, 'Paniai', 'Kabupaten', '98765');
INSERT INTO `kota` VALUES (336, 28, 'Parepare', 'Kota', '91123');
INSERT INTO `kota` VALUES (337, 32, 'Pariaman', 'Kota', '25511');
INSERT INTO `kota` VALUES (338, 29, 'Parigi Moutong', 'Kabupaten', '94411');
INSERT INTO `kota` VALUES (339, 32, 'Pasaman', 'Kabupaten', '26318');
INSERT INTO `kota` VALUES (340, 32, 'Pasaman Barat', 'Kabupaten', '26511');
INSERT INTO `kota` VALUES (341, 15, 'Paser', 'Kabupaten', '76211');
INSERT INTO `kota` VALUES (342, 11, 'Pasuruan', 'Kabupaten', '67153');
INSERT INTO `kota` VALUES (343, 11, 'Pasuruan', 'Kota', '67118');
INSERT INTO `kota` VALUES (344, 10, 'Pati', 'Kabupaten', '59114');
INSERT INTO `kota` VALUES (345, 32, 'Payakumbuh', 'Kota', '26213');
INSERT INTO `kota` VALUES (346, 25, 'Pegunungan Arfak', 'Kabupaten', '98354');
INSERT INTO `kota` VALUES (347, 24, 'Pegunungan Bintang', 'Kabupaten', '99573');
INSERT INTO `kota` VALUES (348, 10, 'Pekalongan', 'Kabupaten', '51161');
INSERT INTO `kota` VALUES (349, 10, 'Pekalongan', 'Kota', '51122');
INSERT INTO `kota` VALUES (350, 26, 'Pekanbaru', 'Kota', '28112');
INSERT INTO `kota` VALUES (351, 26, 'Pelalawan', 'Kabupaten', '28311');
INSERT INTO `kota` VALUES (352, 10, 'Pemalang', 'Kabupaten', '52319');
INSERT INTO `kota` VALUES (353, 34, 'Pematang Siantar', 'Kota', '21126');
INSERT INTO `kota` VALUES (354, 15, 'Penajam Paser Utara', 'Kabupaten', '76311');
INSERT INTO `kota` VALUES (355, 18, 'Pesawaran', 'Kabupaten', '35312');
INSERT INTO `kota` VALUES (356, 18, 'Pesisir Barat', 'Kabupaten', '35974');
INSERT INTO `kota` VALUES (357, 32, 'Pesisir Selatan', 'Kabupaten', '25611');
INSERT INTO `kota` VALUES (358, 21, 'Pidie', 'Kabupaten', '24116');
INSERT INTO `kota` VALUES (359, 21, 'Pidie Jaya', 'Kabupaten', '24186');
INSERT INTO `kota` VALUES (360, 28, 'Pinrang', 'Kabupaten', '91251');
INSERT INTO `kota` VALUES (361, 7, 'Pohuwato', 'Kabupaten', '96419');
INSERT INTO `kota` VALUES (362, 27, 'Polewali Mandar', 'Kabupaten', '91311');
INSERT INTO `kota` VALUES (363, 11, 'Ponorogo', 'Kabupaten', '63411');
INSERT INTO `kota` VALUES (364, 12, 'Pontianak', 'Kabupaten', '78971');
INSERT INTO `kota` VALUES (365, 12, 'Pontianak', 'Kota', '78112');
INSERT INTO `kota` VALUES (366, 29, 'Poso', 'Kabupaten', '94615');
INSERT INTO `kota` VALUES (367, 33, 'Prabumulih', 'Kota', '31121');
INSERT INTO `kota` VALUES (368, 18, 'Pringsewu', 'Kabupaten', '35719');
INSERT INTO `kota` VALUES (369, 11, 'Probolinggo', 'Kabupaten', '67282');
INSERT INTO `kota` VALUES (370, 11, 'Probolinggo', 'Kota', '67215');
INSERT INTO `kota` VALUES (371, 14, 'Pulang Pisau', 'Kabupaten', '74811');
INSERT INTO `kota` VALUES (372, 20, 'Pulau Morotai', 'Kabupaten', '97771');
INSERT INTO `kota` VALUES (373, 24, 'Puncak', 'Kabupaten', '98981');
INSERT INTO `kota` VALUES (374, 24, 'Puncak Jaya', 'Kabupaten', '98979');
INSERT INTO `kota` VALUES (375, 10, 'Purbalingga', 'Kabupaten', '53312');
INSERT INTO `kota` VALUES (376, 9, 'Purwakarta', 'Kabupaten', '41119');
INSERT INTO `kota` VALUES (377, 10, 'Purworejo', 'Kabupaten', '54111');
INSERT INTO `kota` VALUES (378, 25, 'Raja Ampat', 'Kabupaten', '98489');
INSERT INTO `kota` VALUES (379, 4, 'Rejang Lebong', 'Kabupaten', '39112');
INSERT INTO `kota` VALUES (380, 10, 'Rembang', 'Kabupaten', '59219');
INSERT INTO `kota` VALUES (381, 26, 'Rokan Hilir', 'Kabupaten', '28992');
INSERT INTO `kota` VALUES (382, 26, 'Rokan Hulu', 'Kabupaten', '28511');
INSERT INTO `kota` VALUES (383, 23, 'Rote Ndao', 'Kabupaten', '85982');
INSERT INTO `kota` VALUES (384, 21, 'Sabang', 'Kota', '23512');
INSERT INTO `kota` VALUES (385, 23, 'Sabu Raijua', 'Kabupaten', '85391');
INSERT INTO `kota` VALUES (386, 10, 'Salatiga', 'Kota', '50711');
INSERT INTO `kota` VALUES (387, 15, 'Samarinda', 'Kota', '75133');
INSERT INTO `kota` VALUES (388, 12, 'Sambas', 'Kabupaten', '79453');
INSERT INTO `kota` VALUES (389, 34, 'Samosir', 'Kabupaten', '22392');
INSERT INTO `kota` VALUES (390, 11, 'Sampang', 'Kabupaten', '69219');
INSERT INTO `kota` VALUES (391, 12, 'Sanggau', 'Kabupaten', '78557');
INSERT INTO `kota` VALUES (392, 24, 'Sarmi', 'Kabupaten', '99373');
INSERT INTO `kota` VALUES (393, 8, 'Sarolangun', 'Kabupaten', '37419');
INSERT INTO `kota` VALUES (394, 32, 'Sawah Lunto', 'Kota', '27416');
INSERT INTO `kota` VALUES (395, 12, 'Sekadau', 'Kabupaten', '79583');
INSERT INTO `kota` VALUES (396, 28, 'Selayar (Kepulauan Selayar)', 'Kabupaten', '92812');
INSERT INTO `kota` VALUES (397, 4, 'Seluma', 'Kabupaten', '38811');
INSERT INTO `kota` VALUES (398, 10, 'Semarang', 'Kabupaten', '50511');
INSERT INTO `kota` VALUES (399, 10, 'Semarang', 'Kota', '50135');
INSERT INTO `kota` VALUES (400, 19, 'Seram Bagian Barat', 'Kabupaten', '97561');
INSERT INTO `kota` VALUES (401, 19, 'Seram Bagian Timur', 'Kabupaten', '97581');
INSERT INTO `kota` VALUES (402, 3, 'Serang', 'Kabupaten', '42182');
INSERT INTO `kota` VALUES (403, 3, 'Serang', 'Kota', '42111');
INSERT INTO `kota` VALUES (404, 34, 'Serdang Bedagai', 'Kabupaten', '20915');
INSERT INTO `kota` VALUES (405, 14, 'Seruyan', 'Kabupaten', '74211');
INSERT INTO `kota` VALUES (406, 26, 'Siak', 'Kabupaten', '28623');
INSERT INTO `kota` VALUES (407, 34, 'Sibolga', 'Kota', '22522');
INSERT INTO `kota` VALUES (408, 28, 'Sidenreng Rappang/Rapang', 'Kabupaten', '91613');
INSERT INTO `kota` VALUES (409, 11, 'Sidoarjo', 'Kabupaten', '61219');
INSERT INTO `kota` VALUES (410, 29, 'Sigi', 'Kabupaten', '94364');
INSERT INTO `kota` VALUES (411, 32, 'Sijunjung (Sawah Lunto Sijunjung)', 'Kabupaten', '27511');
INSERT INTO `kota` VALUES (412, 23, 'Sikka', 'Kabupaten', '86121');
INSERT INTO `kota` VALUES (413, 34, 'Simalungun', 'Kabupaten', '21162');
INSERT INTO `kota` VALUES (414, 21, 'Simeulue', 'Kabupaten', '23891');
INSERT INTO `kota` VALUES (415, 12, 'Singkawang', 'Kota', '79117');
INSERT INTO `kota` VALUES (416, 28, 'Sinjai', 'Kabupaten', '92615');
INSERT INTO `kota` VALUES (417, 12, 'Sintang', 'Kabupaten', '78619');
INSERT INTO `kota` VALUES (418, 11, 'Situbondo', 'Kabupaten', '68316');
INSERT INTO `kota` VALUES (419, 5, 'Sleman', 'Kabupaten', '55513');
INSERT INTO `kota` VALUES (420, 32, 'Solok', 'Kabupaten', '27365');
INSERT INTO `kota` VALUES (421, 32, 'Solok', 'Kota', '27315');
INSERT INTO `kota` VALUES (422, 32, 'Solok Selatan', 'Kabupaten', '27779');
INSERT INTO `kota` VALUES (423, 28, 'Soppeng', 'Kabupaten', '90812');
INSERT INTO `kota` VALUES (424, 25, 'Sorong', 'Kabupaten', '98431');
INSERT INTO `kota` VALUES (425, 25, 'Sorong', 'Kota', '98411');
INSERT INTO `kota` VALUES (426, 25, 'Sorong Selatan', 'Kabupaten', '98454');
INSERT INTO `kota` VALUES (427, 10, 'Sragen', 'Kabupaten', '57211');
INSERT INTO `kota` VALUES (428, 9, 'Subang', 'Kabupaten', '41215');
INSERT INTO `kota` VALUES (429, 21, 'Subulussalam', 'Kota', '24882');
INSERT INTO `kota` VALUES (430, 9, 'Sukabumi', 'Kabupaten', '43311');
INSERT INTO `kota` VALUES (431, 9, 'Sukabumi', 'Kota', '43114');
INSERT INTO `kota` VALUES (432, 14, 'Sukamara', 'Kabupaten', '74712');
INSERT INTO `kota` VALUES (433, 10, 'Sukoharjo', 'Kabupaten', '57514');
INSERT INTO `kota` VALUES (434, 23, 'Sumba Barat', 'Kabupaten', '87219');
INSERT INTO `kota` VALUES (435, 23, 'Sumba Barat Daya', 'Kabupaten', '87453');
INSERT INTO `kota` VALUES (436, 23, 'Sumba Tengah', 'Kabupaten', '87358');
INSERT INTO `kota` VALUES (437, 23, 'Sumba Timur', 'Kabupaten', '87112');
INSERT INTO `kota` VALUES (438, 22, 'Sumbawa', 'Kabupaten', '84315');
INSERT INTO `kota` VALUES (439, 22, 'Sumbawa Barat', 'Kabupaten', '84419');
INSERT INTO `kota` VALUES (440, 9, 'Sumedang', 'Kabupaten', '45326');
INSERT INTO `kota` VALUES (441, 11, 'Sumenep', 'Kabupaten', '69413');
INSERT INTO `kota` VALUES (442, 8, 'Sungaipenuh', 'Kota', '37113');
INSERT INTO `kota` VALUES (443, 24, 'Supiori', 'Kabupaten', '98164');
INSERT INTO `kota` VALUES (444, 11, 'Surabaya', 'Kota', '60119');
INSERT INTO `kota` VALUES (445, 10, 'Surakarta (Solo)', 'Kota', '57113');
INSERT INTO `kota` VALUES (446, 13, 'Tabalong', 'Kabupaten', '71513');
INSERT INTO `kota` VALUES (447, 1, 'Tabanan', 'Kabupaten', '82119');
INSERT INTO `kota` VALUES (448, 28, 'Takalar', 'Kabupaten', '92212');
INSERT INTO `kota` VALUES (449, 25, 'Tambrauw', 'Kabupaten', '98475');
INSERT INTO `kota` VALUES (450, 16, 'Tana Tidung', 'Kabupaten', '77611');
INSERT INTO `kota` VALUES (451, 28, 'Tana Toraja', 'Kabupaten', '91819');
INSERT INTO `kota` VALUES (452, 13, 'Tanah Bumbu', 'Kabupaten', '72211');
INSERT INTO `kota` VALUES (453, 32, 'Tanah Datar', 'Kabupaten', '27211');
INSERT INTO `kota` VALUES (454, 13, 'Tanah Laut', 'Kabupaten', '70811');
INSERT INTO `kota` VALUES (455, 3, 'Tangerang', 'Kabupaten', '15914');
INSERT INTO `kota` VALUES (456, 3, 'Tangerang', 'Kota', '15111');
INSERT INTO `kota` VALUES (457, 3, 'Tangerang Selatan', 'Kota', '15332');
INSERT INTO `kota` VALUES (458, 18, 'Tanggamus', 'Kabupaten', '35619');
INSERT INTO `kota` VALUES (459, 34, 'Tanjung Balai', 'Kota', '21321');
INSERT INTO `kota` VALUES (460, 8, 'Tanjung Jabung Barat', 'Kabupaten', '36513');
INSERT INTO `kota` VALUES (461, 8, 'Tanjung Jabung Timur', 'Kabupaten', '36719');
INSERT INTO `kota` VALUES (462, 17, 'Tanjung Pinang', 'Kota', '29111');
INSERT INTO `kota` VALUES (463, 34, 'Tapanuli Selatan', 'Kabupaten', '22742');
INSERT INTO `kota` VALUES (464, 34, 'Tapanuli Tengah', 'Kabupaten', '22611');
INSERT INTO `kota` VALUES (465, 34, 'Tapanuli Utara', 'Kabupaten', '22414');
INSERT INTO `kota` VALUES (466, 13, 'Tapin', 'Kabupaten', '71119');
INSERT INTO `kota` VALUES (467, 16, 'Tarakan', 'Kota', '77114');
INSERT INTO `kota` VALUES (468, 9, 'Tasikmalaya', 'Kabupaten', '46411');
INSERT INTO `kota` VALUES (469, 9, 'Tasikmalaya', 'Kota', '46116');
INSERT INTO `kota` VALUES (470, 34, 'Tebing Tinggi', 'Kota', '20632');
INSERT INTO `kota` VALUES (471, 8, 'Tebo', 'Kabupaten', '37519');
INSERT INTO `kota` VALUES (472, 10, 'Tegal', 'Kabupaten', '52419');
INSERT INTO `kota` VALUES (473, 10, 'Tegal', 'Kota', '52114');
INSERT INTO `kota` VALUES (474, 25, 'Teluk Bintuni', 'Kabupaten', '98551');
INSERT INTO `kota` VALUES (475, 25, 'Teluk Wondama', 'Kabupaten', '98591');
INSERT INTO `kota` VALUES (476, 10, 'Temanggung', 'Kabupaten', '56212');
INSERT INTO `kota` VALUES (477, 20, 'Ternate', 'Kota', '97714');
INSERT INTO `kota` VALUES (478, 20, 'Tidore Kepulauan', 'Kota', '97815');
INSERT INTO `kota` VALUES (479, 23, 'Timor Tengah Selatan', 'Kabupaten', '85562');
INSERT INTO `kota` VALUES (480, 23, 'Timor Tengah Utara', 'Kabupaten', '85612');
INSERT INTO `kota` VALUES (481, 34, 'Toba Samosir', 'Kabupaten', '22316');
INSERT INTO `kota` VALUES (482, 29, 'Tojo Una-Una', 'Kabupaten', '94683');
INSERT INTO `kota` VALUES (483, 29, 'Toli-Toli', 'Kabupaten', '94542');
INSERT INTO `kota` VALUES (484, 24, 'Tolikara', 'Kabupaten', '99411');
INSERT INTO `kota` VALUES (485, 31, 'Tomohon', 'Kota', '95416');
INSERT INTO `kota` VALUES (486, 28, 'Toraja Utara', 'Kabupaten', '91831');
INSERT INTO `kota` VALUES (487, 11, 'Trenggalek', 'Kabupaten', '66312');
INSERT INTO `kota` VALUES (488, 19, 'Tual', 'Kota', '97612');
INSERT INTO `kota` VALUES (489, 11, 'Tuban', 'Kabupaten', '62319');
INSERT INTO `kota` VALUES (490, 18, 'Tulang Bawang', 'Kabupaten', '34613');
INSERT INTO `kota` VALUES (491, 18, 'Tulang Bawang Barat', 'Kabupaten', '34419');
INSERT INTO `kota` VALUES (492, 11, 'Tulungagung', 'Kabupaten', '66212');
INSERT INTO `kota` VALUES (493, 28, 'Wajo', 'Kabupaten', '90911');
INSERT INTO `kota` VALUES (494, 30, 'Wakatobi', 'Kabupaten', '93791');
INSERT INTO `kota` VALUES (495, 24, 'Waropen', 'Kabupaten', '98269');
INSERT INTO `kota` VALUES (496, 18, 'Way Kanan', 'Kabupaten', '34711');
INSERT INTO `kota` VALUES (497, 10, 'Wonogiri', 'Kabupaten', '57619');
INSERT INTO `kota` VALUES (498, 10, 'Wonosobo', 'Kabupaten', '56311');
INSERT INTO `kota` VALUES (499, 24, 'Yahukimo', 'Kabupaten', '99041');
INSERT INTO `kota` VALUES (500, 24, 'Yalimo', 'Kabupaten', '99481');
INSERT INTO `kota` VALUES (501, 5, 'Yogyakarta', 'Kota', '55111');

-- ----------------------------
-- Table structure for migrations
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 24 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of migrations
-- ----------------------------
INSERT INTO `migrations` VALUES (2, '2014_10_12_000000_create_users_table', 1);
INSERT INTO `migrations` VALUES (3, '2019_08_02_074841_create_barang_table', 1);
INSERT INTO `migrations` VALUES (4, '2019_08_02_074952_create_transaksi_table', 1);
INSERT INTO `migrations` VALUES (5, '2019_08_02_075722_create_detail_transaksi_table', 1);
INSERT INTO `migrations` VALUES (6, '2019_08_02_075939_create_kategori_table', 1);
INSERT INTO `migrations` VALUES (7, '2019_08_02_092920_alter_table_barang', 2);
INSERT INTO `migrations` VALUES (8, '2019_08_02_093106_alter_table_transaksi', 3);
INSERT INTO `migrations` VALUES (9, '2019_08_02_114637_alter_table_barang', 4);
INSERT INTO `migrations` VALUES (10, '2019_08_02_123913_alter_table_user', 5);
INSERT INTO `migrations` VALUES (12, '2019_08_03_010906_create_table_cart', 6);
INSERT INTO `migrations` VALUES (13, '2019_08_03_045315_create_delivery', 7);
INSERT INTO `migrations` VALUES (14, '2019_08_03_054528_alter_table_delivery', 8);
INSERT INTO `migrations` VALUES (15, '2019_08_03_060435_alter_table_transaksi', 9);
INSERT INTO `migrations` VALUES (16, '2019_08_05_164522_alter_table_barang', 10);
INSERT INTO `migrations` VALUES (17, '2020_12_17_160206_create_table_retur', 11);
INSERT INTO `migrations` VALUES (18, '2020_12_22_210023_add_nullable_constraint_to_my_table', 12);
INSERT INTO `migrations` VALUES (19, '2020_12_25_014427_add_user_id_to_retur_table', 12);
INSERT INTO `migrations` VALUES (20, '2020_12_29_225820_create_retur_pembelian_table', 12);
INSERT INTO `migrations` VALUES (21, '2020_12_29_235519_add_status_to_pembelian_table', 12);
INSERT INTO `migrations` VALUES (22, '2020_12_30_000049_add_default_value_to_status_on_pembelian_table', 12);
INSERT INTO `migrations` VALUES (23, '2020_12_30_015140_drop_retur_pembelian_table', 12);

-- ----------------------------
-- Table structure for pembelian
-- ----------------------------
DROP TABLE IF EXISTS `pembelian`;
CREATE TABLE `pembelian`  (
  `idpembelian` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `idpermintaan` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `idsupplier` int(11) NULL DEFAULT NULL,
  `totalharga` int(11) NULL DEFAULT NULL,
  `keterangan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` datetime(0) NULL DEFAULT NULL,
  `updated_at` datetime(0) NULL DEFAULT NULL,
  `status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Proses Pemesanan ke Supplier',
  PRIMARY KEY (`idpembelian`) USING BTREE,
  INDEX `fk2_pembelian`(`idsupplier`) USING BTREE,
  INDEX `fk1_pembelian`(`idpermintaan`) USING BTREE,
  CONSTRAINT `fk1_pembelian` FOREIGN KEY (`idpermintaan`) REFERENCES `permintaan` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `fk2_pembelian` FOREIGN KEY (`idsupplier`) REFERENCES `supplier` (`idsupplier`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of pembelian
-- ----------------------------
INSERT INTO `pembelian` VALUES ('6UxMdSjsj8', '1', 7, 75000, 'adadaqda', '2020-12-08 23:47:29', '2020-12-08 23:47:29', '');

-- ----------------------------
-- Table structure for penerimaan
-- ----------------------------
DROP TABLE IF EXISTS `penerimaan`;
CREATE TABLE `penerimaan`  (
  `idpembelian` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `iduser` int(10) UNSIGNED NULL DEFAULT NULL,
  `created_at` datetime(0) NULL DEFAULT NULL,
  `updated_at` datetime(0) NULL DEFAULT NULL,
  PRIMARY KEY (`idpembelian`) USING BTREE,
  CONSTRAINT `fk1_penerimaan` FOREIGN KEY (`idpembelian`) REFERENCES `pembelian` (`idpembelian`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for permintaan
-- ----------------------------
DROP TABLE IF EXISTS `permintaan`;
CREATE TABLE `permintaan`  (
  `id` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `iduser` int(10) UNSIGNED NULL DEFAULT NULL,
  `created_at` datetime(0) NULL DEFAULT NULL,
  `updated_at` datetime(0) NULL DEFAULT NULL,
  `istemp` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `fk2_permintaan`(`iduser`) USING BTREE,
  CONSTRAINT `fk2_permintaan` FOREIGN KEY (`iduser`) REFERENCES `users` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of permintaan
-- ----------------------------
INSERT INTO `permintaan` VALUES ('1', 1, '2020-12-08 23:46:34', '2020-12-08 23:46:57', 0);

-- ----------------------------
-- Table structure for provinsi
-- ----------------------------
DROP TABLE IF EXISTS `provinsi`;
CREATE TABLE `provinsi`  (
  `idprovinsi` int(11) NOT NULL,
  `nama` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  PRIMARY KEY (`idprovinsi`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of provinsi
-- ----------------------------
INSERT INTO `provinsi` VALUES (1, 'Bali');
INSERT INTO `provinsi` VALUES (2, 'Bangka Belitung');
INSERT INTO `provinsi` VALUES (3, 'Banten');
INSERT INTO `provinsi` VALUES (4, 'Bengkulu');
INSERT INTO `provinsi` VALUES (5, 'DI Yogyakarta');
INSERT INTO `provinsi` VALUES (6, 'DKI Jakarta');
INSERT INTO `provinsi` VALUES (7, 'Gorontalo');
INSERT INTO `provinsi` VALUES (8, 'Jambi');
INSERT INTO `provinsi` VALUES (9, 'Jawa Barat');
INSERT INTO `provinsi` VALUES (10, 'Jawa Tengah');
INSERT INTO `provinsi` VALUES (11, 'Jawa Timur');
INSERT INTO `provinsi` VALUES (12, 'Kalimantan Barat');
INSERT INTO `provinsi` VALUES (13, 'Kalimantan Selatan');
INSERT INTO `provinsi` VALUES (14, 'Kalimantan Tengah');
INSERT INTO `provinsi` VALUES (15, 'Kalimantan Timur');
INSERT INTO `provinsi` VALUES (16, 'Kalimantan Utara');
INSERT INTO `provinsi` VALUES (17, 'Kepulauan Riau');
INSERT INTO `provinsi` VALUES (18, 'Lampung');
INSERT INTO `provinsi` VALUES (19, 'Maluku');
INSERT INTO `provinsi` VALUES (20, 'Maluku Utara');
INSERT INTO `provinsi` VALUES (21, 'Nanggroe Aceh Darussalam (NAD)');
INSERT INTO `provinsi` VALUES (22, 'Nusa Tenggara Barat (NTB)');
INSERT INTO `provinsi` VALUES (23, 'Nusa Tenggara Timur (NTT)');
INSERT INTO `provinsi` VALUES (24, 'Papua');
INSERT INTO `provinsi` VALUES (25, 'Papua Barat');
INSERT INTO `provinsi` VALUES (26, 'Riau');
INSERT INTO `provinsi` VALUES (27, 'Sulawesi Barat');
INSERT INTO `provinsi` VALUES (28, 'Sulawesi Selatan');
INSERT INTO `provinsi` VALUES (29, 'Sulawesi Tengah');
INSERT INTO `provinsi` VALUES (30, 'Sulawesi Tenggara');
INSERT INTO `provinsi` VALUES (31, 'Sulawesi Utara');
INSERT INTO `provinsi` VALUES (32, 'Sumatera Barat');
INSERT INTO `provinsi` VALUES (33, 'Sumatera Selatan');
INSERT INTO `provinsi` VALUES (34, 'Sumatera Utara');

-- ----------------------------
-- Table structure for retur
-- ----------------------------
DROP TABLE IF EXISTS `retur`;
CREATE TABLE `retur`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `transaksi_id` int(11) NOT NULL,
  `reason` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `bukti_barang` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `noresi` int(11) NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for supplier
-- ----------------------------
DROP TABLE IF EXISTS `supplier`;
CREATE TABLE `supplier`  (
  `idsupplier` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `notelp` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `isdelete` int(1) NULL DEFAULT 0,
  PRIMARY KEY (`idsupplier`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 8 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of supplier
-- ----------------------------
INSERT INTO `supplier` VALUES (6, 'ardi', '081241432412', 1);
INSERT INTO `supplier` VALUES (7, 'ardi', '081241432412', 0);

-- ----------------------------
-- Table structure for transaksi
-- ----------------------------
DROP TABLE IF EXISTS `transaksi`;
CREATE TABLE `transaksi`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` int(10) UNSIGNED NOT NULL,
  `delivery_id` bigint(20) UNSIGNED NOT NULL,
  `status` int(11) NOT NULL,
  `total_harga` double NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `buktipembayaran` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `kadaluarsabayar` datetime(0) NULL DEFAULT NULL,
  `noresi` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `fk1_transaksi`(`status`) USING BTREE,
  INDEX `fk2_transaksi`(`user_id`) USING BTREE,
  INDEX `fk3_transaksi`(`delivery_id`) USING BTREE,
  CONSTRAINT `fk1_transaksi` FOREIGN KEY (`status`) REFERENCES `transaksi_status` (`idstatus`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `fk2_transaksi` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `fk3_transaksi` FOREIGN KEY (`delivery_id`) REFERENCES `delivery` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 59 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for transaksi_status
-- ----------------------------
DROP TABLE IF EXISTS `transaksi_status`;
CREATE TABLE `transaksi_status`  (
  `idstatus` int(11) NOT NULL,
  `keterangan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  PRIMARY KEY (`idstatus`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of transaksi_status
-- ----------------------------
INSERT INTO `transaksi_status` VALUES (1, 'Menunggu Pembayaran');
INSERT INTO `transaksi_status` VALUES (2, 'Menunggu Verifikasi Pembayaran dari Petugas');
INSERT INTO `transaksi_status` VALUES (3, 'Telah dibayar');
INSERT INTO `transaksi_status` VALUES (4, 'Sudah dikirim');
INSERT INTO `transaksi_status` VALUES (5, 'Barang diterima');
INSERT INTO `transaksi_status` VALUES (6, 'Waktu Pembayaran telah lewat');
INSERT INTO `transaksi_status` VALUES (7, 'Bukti Pembayaran ditolak');

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `level` int(11) NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `deleted_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 28 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES (1, 'Agung', 'admin@gmail.com', 'admin', 1, NULL, '2019-08-02 15:16:39', '2020-12-08 22:44:07', NULL);
INSERT INTO `users` VALUES (26, 'Muhammad Riwandi', 'riwandindi17@gmail.com', '12345678', 2, NULL, '2020-11-11 18:32:11', '2020-11-12 09:42:06', NULL);
INSERT INTO `users` VALUES (27, 'Agung', 'agung@gmail.com', 'agung1234', 2, NULL, '2020-12-02 13:12:40', '2020-12-02 13:12:40', NULL);

-- ----------------------------
-- Table structure for users_detail
-- ----------------------------
DROP TABLE IF EXISTS `users_detail`;
CREATE TABLE `users_detail`  (
  `iduser` int(10) UNSIGNED NOT NULL,
  `alamat` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `idprovinsi` int(11) NULL DEFAULT NULL,
  `idkota` int(11) NULL DEFAULT NULL,
  `telepon` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  PRIMARY KEY (`iduser`) USING BTREE,
  INDEX `fk2_users_detail`(`idprovinsi`) USING BTREE,
  INDEX `fk3_users_detail`(`idkota`) USING BTREE,
  CONSTRAINT `fk1_users_detail` FOREIGN KEY (`iduser`) REFERENCES `users` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `fk2_users_detail` FOREIGN KEY (`idprovinsi`) REFERENCES `provinsi` (`idprovinsi`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `fk3_users_detail` FOREIGN KEY (`idkota`) REFERENCES `kota` (`idkota`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of users_detail
-- ----------------------------
INSERT INTO `users_detail` VALUES (1, '-', 1, 1, NULL);
INSERT INTO `users_detail` VALUES (26, 'Alamat lengkap di bandung', 9, 22, '083120501577');
INSERT INTO `users_detail` VALUES (27, 'Jl. Otitsta, Gg.Anggrek', 9, 428, '081320573156229');

SET FOREIGN_KEY_CHECKS = 1;
