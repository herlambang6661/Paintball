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

 Date: 08/08/2023 16:09:05
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
) ENGINE = InnoDB AUTO_INCREMENT = 15 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of pb_barang
-- ----------------------------
INSERT INTO `pb_barang` VALUES (13, '2023-08-07', 'B-00011', 'Kecap', 'Admin', '2023-08-07 15:56:43');
INSERT INTO `pb_barang` VALUES (14, '2023-08-07', 'B-00012', 'Mouse', 'Admin', '2023-08-07 15:56:51');

-- ----------------------------
-- Table structure for pb_kedatangan
-- ----------------------------
DROP TABLE IF EXISTS `pb_kedatangan`;
CREATE TABLE `pb_kedatangan`  (
  `id_kedatangan` int NOT NULL AUTO_INCREMENT,
  `tgl` date NULL DEFAULT NULL,
  `noform` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `dibuat` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `tmpstp` timestamp NULL DEFAULT current_timestamp,
  PRIMARY KEY (`id_kedatangan`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of pb_kedatangan
-- ----------------------------

-- ----------------------------
-- Table structure for pb_kedatanganitm
-- ----------------------------
DROP TABLE IF EXISTS `pb_kedatanganitm`;
CREATE TABLE `pb_kedatanganitm`  (
  `id_kedatanganitm` int NOT NULL AUTO_INCREMENT,
  `tgl_kedatanganitm` date NULL DEFAULT NULL,
  `form_kedatangan` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
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
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of pb_kedatanganitm
-- ----------------------------

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
