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

 Date: 10/08/2023 10:23:27
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
) ENGINE = InnoDB AUTO_INCREMENT = 26 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of pb_barang
-- ----------------------------
INSERT INTO `pb_barang` VALUES (22, '2023-08-09', 'B-00001', 'Kecap', 'Admin', '2023-08-09 10:21:03');
INSERT INTO `pb_barang` VALUES (23, '2023-08-09', 'B-00002', 'Saos', 'Admin', '2023-08-09 10:21:13');
INSERT INTO `pb_barang` VALUES (24, '2023-08-09', 'B-00003', 'Lada', 'Admin', '2023-08-09 10:21:35');
INSERT INTO `pb_barang` VALUES (25, '2023-08-09', 'B-00004', 'Baso', 'Admin', '2023-08-09 13:14:25');

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
) ENGINE = InnoDB AUTO_INCREMENT = 14 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of pb_kedatangan
-- ----------------------------
INSERT INTO `pb_kedatangan` VALUES (9, '2023-08-09', 'K-2300001', '', 'Admin', '2023-08-09 10:27:18');
INSERT INTO `pb_kedatangan` VALUES (10, '2023-08-09', 'K-2300002', '', 'Admin', '2023-08-09 12:43:42');
INSERT INTO `pb_kedatangan` VALUES (11, '2023-08-09', 'K-2300003', '', 'Admin', '2023-08-09 12:53:37');
INSERT INTO `pb_kedatangan` VALUES (12, '2023-08-09', 'K-2300004', '', 'Admin', '2023-08-09 13:15:01');
INSERT INTO `pb_kedatangan` VALUES (13, '2023-08-08', 'K-2300005', '', 'Admin', '2023-08-09 13:15:53');

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
  `harga` float NULL DEFAULT NULL,
  `kurs` float NULL DEFAULT NULL,
  `trucking` float NULL DEFAULT NULL,
  `bea_cukai` float NULL DEFAULT NULL,
  `dibuat` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `tmpstp` timestamp NULL DEFAULT current_timestamp,
  PRIMARY KEY (`id_kedatanganitm`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 11 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of pb_kedatanganitm
-- ----------------------------
INSERT INTO `pb_kedatanganitm` VALUES (6, '2023-08-09', 'K-2300001', 'D-00001', 'B-00001', 'Kecap', 5, 'pcs', 10000, 0, 0, 10000, 'Admin', '2023-08-09 10:27:18');
INSERT INTO `pb_kedatanganitm` VALUES (7, '2023-08-09', 'K-2300002', 'D-00002', 'B-00001', 'Kecap', 15, 'pcs', 15000, 0, 0, 10000, 'Admin', '2023-08-09 12:43:42');
INSERT INTO `pb_kedatanganitm` VALUES (8, '2023-08-09', 'K-2300003', 'D-00003', 'B-00002', 'Saos', 1, '1', 1, 1, 1, 1, 'Admin', '2023-08-09 12:53:37');
INSERT INTO `pb_kedatanganitm` VALUES (9, '2023-08-09', 'K-2300004', 'D-00004', 'B-00004', 'Baso', 100, 'PCS', 15000, 0, 0, 10000, 'Admin', '2023-08-09 13:15:02');
INSERT INTO `pb_kedatanganitm` VALUES (10, '2023-08-08', 'K-2300005', 'D-00005', 'B-00004', 'Baso', 9, 'pcs', 10000, 0, 0, 10000, 'Admin', '2023-08-09 13:15:53');

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
INSERT INTO `pb_pengeluaran` VALUES (1, '2023-08-10', 'E-2300001', '', 'Admin', NULL);

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
INSERT INTO `pb_pengeluaranitm` VALUES (11, '2023-08-10', 'E-2300001', 'F-00001', 'B-00001', 'Kecap', 1, 'pcs', 10000, 0, 0, 10000, NULL, NULL, 'Admin', '2023-08-10 09:18:52');

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
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of pb_stock
-- ----------------------------
INSERT INTO `pb_stock` VALUES (2, 'B-00001', 'Kecap', 20, 'Admin', '2023-08-09 10:21:03');
INSERT INTO `pb_stock` VALUES (3, 'B-00002', 'Saos', 1, 'Admin', '2023-08-09 10:21:13');
INSERT INTO `pb_stock` VALUES (4, 'B-00003', 'Lada', 0, 'Admin', '2023-08-09 10:21:35');
INSERT INTO `pb_stock` VALUES (5, 'B-00004', 'Baso', 109, 'Admin', '2023-08-09 13:14:25');

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
