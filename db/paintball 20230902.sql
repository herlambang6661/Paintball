/*
 Navicat Premium Data Transfer

 Source Server         : Localhost
 Source Server Type    : MySQL
 Source Server Version : 100427
 Source Host           : localhost:3306
 Source Schema         : paintball

 Target Server Type    : MySQL
 Target Server Version : 100427
 File Encoding         : 65001

 Date: 02/09/2023 12:46:41
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for pb_barang
-- ----------------------------
DROP TABLE IF EXISTS `pb_barang`;
CREATE TABLE `pb_barang`  (
  `id_barang` int NOT NULL AUTO_INCREMENT,
  `tgl_input` date NULL DEFAULT NULL,
  `kodebarang` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `namabarang` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `user_input` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `tmpstp` timestamp NULL DEFAULT current_timestamp,
  PRIMARY KEY (`id_barang`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 27 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of pb_barang
-- ----------------------------
INSERT INTO `pb_barang` VALUES (26, '2023-09-02', 'B-00001', 'Paintball', 'Admin', '2023-09-02 08:28:16');

-- ----------------------------
-- Table structure for pb_kedatangan
-- ----------------------------
DROP TABLE IF EXISTS `pb_kedatangan`;
CREATE TABLE `pb_kedatangan`  (
  `id_kedatangan` int NOT NULL AUTO_INCREMENT,
  `tgl` date NULL DEFAULT NULL,
  `noform` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `keterangan` longtext CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `dibuat` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `tmpstp` timestamp NULL DEFAULT current_timestamp,
  PRIMARY KEY (`id_kedatangan`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 29 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of pb_kedatangan
-- ----------------------------
INSERT INTO `pb_kedatangan` VALUES (28, '2023-09-02', 'K-2300001', '<p><br></p>', 'Admin', '2023-09-02 10:03:01');

-- ----------------------------
-- Table structure for pb_kedatanganitm
-- ----------------------------
DROP TABLE IF EXISTS `pb_kedatanganitm`;
CREATE TABLE `pb_kedatanganitm`  (
  `id_kedatanganitm` int NOT NULL AUTO_INCREMENT,
  `tgl_kedatanganitm` date NULL DEFAULT NULL,
  `form_kedatangan` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `kodekedatangan` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `kodebarang` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `namabarang` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `qty` float NULL DEFAULT NULL,
  `satuan` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `matauang` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `harga` float NULL DEFAULT NULL,
  `kurs` float NULL DEFAULT NULL,
  `trucking` float NULL DEFAULT NULL,
  `bea_cukai` float NULL DEFAULT NULL,
  `dibuat` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `tmpstp` timestamp NULL DEFAULT current_timestamp,
  PRIMARY KEY (`id_kedatanganitm`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 23 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of pb_kedatanganitm
-- ----------------------------
INSERT INTO `pb_kedatanganitm` VALUES (22, '2023-09-02', 'K-2300001', 'D-00001', 'B-00001', 'Paintball', 1500, 'pcs', 'IDR', 10000, 0, 0, 30000, 'Admin', '2023-09-02 10:03:01');

-- ----------------------------
-- Table structure for pb_pengeluaran
-- ----------------------------
DROP TABLE IF EXISTS `pb_pengeluaran`;
CREATE TABLE `pb_pengeluaran`  (
  `id_pengeluaran` int NOT NULL AUTO_INCREMENT,
  `tgl` date NULL DEFAULT NULL,
  `noform` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `keterangan` longtext CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `dibuat` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `tmpstp` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id_pengeluaran`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of pb_pengeluaran
-- ----------------------------

-- ----------------------------
-- Table structure for pb_pengeluaranitm
-- ----------------------------
DROP TABLE IF EXISTS `pb_pengeluaranitm`;
CREATE TABLE `pb_pengeluaranitm`  (
  `id_pengeluaranitm` int NOT NULL AUTO_INCREMENT,
  `tgl_pengeluaranitm` date NULL DEFAULT NULL,
  `form_pengeluaran` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `kodepengeluaran` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `kodebarang` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `namabarang` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `qty` float NULL DEFAULT NULL,
  `satuan` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `harga` float NULL DEFAULT NULL,
  `kurs` float NULL DEFAULT NULL,
  `trucking` float NULL DEFAULT NULL,
  `bea_cukai` float NULL DEFAULT NULL,
  `ekspedisi` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `status` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `dibuat` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `tmpstp` timestamp NULL DEFAULT current_timestamp,
  PRIMARY KEY (`id_pengeluaranitm`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 12 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of pb_pengeluaranitm
-- ----------------------------

-- ----------------------------
-- Table structure for pb_stock
-- ----------------------------
DROP TABLE IF EXISTS `pb_stock`;
CREATE TABLE `pb_stock`  (
  `id_stock` int NOT NULL AUTO_INCREMENT,
  `kodebarang` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `nama` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `qty` int NULL DEFAULT NULL,
  `dibuat` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `tmpstp` timestamp NULL DEFAULT current_timestamp,
  PRIMARY KEY (`id_stock`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 7 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of pb_stock
-- ----------------------------
INSERT INTO `pb_stock` VALUES (6, 'B-00001', 'Paintball', 1521, 'Admin', '2023-09-02 08:28:16');

-- ----------------------------
-- Table structure for pb_users
-- ----------------------------
DROP TABLE IF EXISTS `pb_users`;
CREATE TABLE `pb_users`  (
  `id_user` int NOT NULL AUTO_INCREMENT,
  `nick` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `username` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `level` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `tmpstp` timestamp NULL DEFAULT current_timestamp,
  PRIMARY KEY (`id_user`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of pb_users
-- ----------------------------
INSERT INTO `pb_users` VALUES (1, 'Admin', 'adm', 'adm123', 'Admin', '2023-08-03 13:33:31');
INSERT INTO `pb_users` VALUES (2, 'Supir', 'spr', 'spr123', 'User', '2023-08-03 13:33:48');

SET FOREIGN_KEY_CHECKS = 1;
