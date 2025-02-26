/*
 Navicat Premium Data Transfer

 Source Server         : 127.0.0.1
 Source Server Type    : MySQL
 Source Server Version : 80021
 Source Host           : localhost:3306
 Source Schema         : xadmin_rel

 Target Server Type    : MySQL
 Target Server Version : 80021
 File Encoding         : 65001

 Date: 18/11/2024 14:53:20
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for group
-- ----------------------------
DROP TABLE IF EXISTS `group`;
CREATE TABLE `group`  (
  `gid` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `groupname` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `menuid` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '' COMMENT 'all：所有，0：全部不可见，1|2|3：对应可见menuid',
  `comment` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT '' COMMENT '说明',
  PRIMARY KEY (`gid`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of group
-- ----------------------------
INSERT INTO `group` VALUES (1, '超级管理员', 'all', '请勿修改');
INSERT INTO `group` VALUES (2, '无权限用户', '', '请勿修改');

-- ----------------------------
-- Table structure for menu
-- ----------------------------
DROP TABLE IF EXISTS `menu`;
CREATE TABLE `menu`  (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `parentid` int NOT NULL DEFAULT 0 COMMENT '父菜单',
  `displayorder` int UNSIGNED NOT NULL DEFAULT 0 COMMENT '菜单排序',
  `iconfont` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT '',
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT '',
  `refresh` int UNSIGNED NOT NULL DEFAULT 0 COMMENT '0：在tab打开；\r\n1：在tab打开并刷新；',
  `href` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT '' COMMENT '为空则href默认为 javascript:;',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of menu
-- ----------------------------
INSERT INTO `menu` VALUES (1, 0, 0, 'fa-solid fa-gear', '系统管理', 0, '');
INSERT INTO `menu` VALUES (2, 1, 0, 'fa-solid fa-list', '菜单管理', 1, '?p=menu');
INSERT INTO `menu` VALUES (3, 1, 1, 'fa-solid fa-users-gear', '用户组管理', 1, '?p=group');
INSERT INTO `menu` VALUES (4, 1, 2, 'fa-solid fa-user-gear', '用户管理', 1, '?p=member');
INSERT INTO `menu` VALUES (5, 1, 3, 'fa-brands fa-git-alt', '图标', 1, '?p=menuchoosefontawesome');

-- ----------------------------
-- Table structure for user
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user`  (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `gph` char(6) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `username` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `groupid` int UNSIGNED NOT NULL DEFAULT 0,
  `extgroupids` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '' COMMENT '以“|”分隔',
  `ggsecret` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `ggtolerance` tinyint UNSIGNED NOT NULL DEFAULT 1 COMMENT '谷歌秘钥过期时间=ggtolerance×30秒',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES (1, '800001', '搜索客', '111111', 1, '', '', 1);

SET FOREIGN_KEY_CHECKS = 1;
