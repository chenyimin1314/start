/*
Navicat MySQL Data Transfer

Source Server         : mysql
Source Server Version : 100124
Source Host           : localhost:3306
Source Database       : cart

Target Server Type    : MYSQL
Target Server Version : 100124
File Encoding         : 65001

Date: 2017-09-03 22:46:55
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for cart
-- ----------------------------
DROP TABLE IF EXISTS `cart`;
CREATE TABLE `cart` (
  `cid` int(11) NOT NULL AUTO_INCREMENT,
  `pid` int(11) NOT NULL,
  `cnum` int(11) DEFAULT '1',
  `uid` int(11) DEFAULT NULL,
  `check` tinyint(2) DEFAULT '0',
  PRIMARY KEY (`cid`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of cart
-- ----------------------------
INSERT INTO `cart` VALUES ('13', '56', '6', '1', '0');

-- ----------------------------
-- Table structure for order
-- ----------------------------
DROP TABLE IF EXISTS `order`;
CREATE TABLE `order` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pids` varchar(255) DEFAULT NULL,
  `nums` varchar(255) DEFAULT NULL,
  `total` decimal(10,2) DEFAULT NULL,
  `create_time` bigint(20) DEFAULT NULL,
  `uid` int(11) DEFAULT NULL,
  `status` tinyint(2) DEFAULT '0' COMMENT '0:未付款\r\n1:已付款未发货\r\n2:已发货\r\n3交易完成\r\n4:交易取消',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of order
-- ----------------------------
INSERT INTO `order` VALUES ('1', '30,5', '5,4', '166685.00', '1503202054', '1', '0');
INSERT INTO `order` VALUES ('2', '29', '2', '2.00', '1503214540', '1', '0');
INSERT INTO `order` VALUES ('3', '32,30', '2,3', '100245.00', '1503457786', '1', '1');
INSERT INTO `order` VALUES ('4', '44,39', '2,4', '292.00', '1503817061', '1', '0');
INSERT INTO `order` VALUES ('5', '48,40', '1,2', '2224.00', '1503817151', '1', '1');
INSERT INTO `order` VALUES ('6', '44', '3', '366.00', '1503817359', '1', '1');
INSERT INTO `order` VALUES ('7', '48,27', '30,1', '62.00', '1503995355', '1', '1');
INSERT INTO `order` VALUES ('8', '44', '1', '122.00', '1504062531', '1', '1');
INSERT INTO `order` VALUES ('9', '45,56', '3,1', '18978.00', '1504364630', '1', '1');
INSERT INTO `order` VALUES ('10', '56,55', '2,1', '24735.00', '1504364922', '1', '1');
INSERT INTO `order` VALUES ('12', '56,55', '3,1', '37047.00', '1504366061', '1', '0');

-- ----------------------------
-- Table structure for product
-- ----------------------------
DROP TABLE IF EXISTS `product`;
CREATE TABLE `product` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `price` decimal(10,2) DEFAULT '0.00',
  `lock` tinyint(4) DEFAULT '0',
  `detail` varchar(255) DEFAULT '',
  `img` varchar(255) DEFAULT '',
  `num` int(11) DEFAULT '0',
  `create_time` bigint(20) DEFAULT NULL,
  `del` tinyint(4) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=59 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of product
-- ----------------------------
INSERT INTO `product` VALUES ('4', '444', '4.00', '1', '4', '/aa', null, '1502769506', '1');
INSERT INTO `product` VALUES ('5', '5', '5.00', '0', '5', '/cc', null, '1502769819', '1');
INSERT INTO `product` VALUES ('6', '7', '7.00', '0', '7', '/dd', null, '1502770455', '1');
INSERT INTO `product` VALUES ('15', 'z', '22.00', '0', 'z', '', '0', '1502793331', '0');
INSERT INTO `product` VALUES ('16', 'dd', '2.00', '0', 'dd', '', '0', '1502793355', '1');
INSERT INTO `product` VALUES ('17', 'h', '1.00', '0', 'h', '', '0', '1502793367', '1');
INSERT INTO `product` VALUES ('18', '1', '1.00', '0', '1', '', '0', '1502808524', '1');
INSERT INTO `product` VALUES ('19', '2', '2.00', '0', '2', '', '0', '1502808530', '1');
INSERT INTO `product` VALUES ('20', '21212', '1212.00', '0', '11212', '', '0', '1503044409', '1');
INSERT INTO `product` VALUES ('21', 'd', '12.00', '0', 'd', '', '0', '1503044416', '0');
INSERT INTO `product` VALUES ('22', '444', '12.00', '0', '123', '', '0', '1503044423', '0');
INSERT INTO `product` VALUES ('23', '43', '34.00', '1', '34', '', '0', '1503044428', '0');
INSERT INTO `product` VALUES ('24', '3', '3.00', '0', '3', '', '0', '1503044432', '0');
INSERT INTO `product` VALUES ('25', '66', '6.00', '0', '66', '', '0', '1503044440', '0');
INSERT INTO `product` VALUES ('26', '111', '111.00', '0', '111', '', '0', '1503044445', '0');
INSERT INTO `product` VALUES ('27', '2', '2.00', '0', '2', '', '0', '1503107825', '0');
INSERT INTO `product` VALUES ('28', '22', '0.00', '0', '', '', '0', '1503114474', '0');
INSERT INTO `product` VALUES ('29', '1111', '1.00', '0', '111', '/upload/img.jpg', '0', '1503115879', '0');
INSERT INTO `product` VALUES ('30', '3', '33333.00', '0', '3', '/upload/15031246302.jpg', '0', '1503122937', '0');
INSERT INTO `product` VALUES ('31', '3311', '55.00', '0', '3311', 'aa', '0', '1503124106', '1');
INSERT INTO `product` VALUES ('32', '111', '123.00', '0', '111', '/upload/1503451696QQ图片20150320171348_mh1426842952445.jpg', '0', '1503372058', '0');
INSERT INTO `product` VALUES ('33', '3311', '11111.00', '0', '2211', '/upload/1503452537长岛冰茶.jpg', '0', '1503452516', '0');
INSERT INTO `product` VALUES ('34', 'www', '0.00', '0', 'www', '/upload/1503456826长岛冰茶.jpg', '0', '1503456826', '1');
INSERT INTO `product` VALUES ('35', 'ff', '0.00', '0', 'ff', '/upload/1503456842长岛冰茶.jpg', '0', '1503456842', '1');
INSERT INTO `product` VALUES ('36', '22', '0.00', '0', '2', '/upload/1503457026长岛冰茶.jpg', '0', '1503457026', '0');
INSERT INTO `product` VALUES ('37', '11', '12.00', '0', '11', '/upload/1503472626', '0', '1503472626', '0');
INSERT INTO `product` VALUES ('38', '11', '12.00', '0', '11', '/upload/1503473268QQ图片20150320171348_mh1426842952445.jpg', '0', '1503473268', '0');
INSERT INTO `product` VALUES ('39', '1122', '12.00', '0', '222', '/upload/1503473423长岛冰茶.jpg', '0', '1503473423', '0');
INSERT INTO `product` VALUES ('40', '2221', '1111.00', '0', '2221', '/upload/1503475136长岛冰茶.jpg', '0', '1503473476', '0');
INSERT INTO `product` VALUES ('41', '333311', '12.00', '0', '33311', '/upload/1504261542长岛冰茶.jpg', '0', '1503473557', '0');
INSERT INTO `product` VALUES ('42', '2', '2.00', '1', '2', '', '0', '1503475509', '1');
INSERT INTO `product` VALUES ('43', '3333111', '12.00', '1', '333111', '', '0', '1503475585', '1');
INSERT INTO `product` VALUES ('44', '钻戒', '122.00', '0', '1111', '/upload/1503543149长岛冰茶.jpg', '0', '1503543149', '0');
INSERT INTO `product` VALUES ('45', '11122', '2222.00', '0', '111', '/upload/1503631218QQ图片20150320171348_mh1426842952445.jpg', '0', '1503630708', '0');
INSERT INTO `product` VALUES ('46', '11111', '22.00', '1', '11111', '/upload/1503631231长岛冰茶.jpg', '0', '1503631231', '1');
INSERT INTO `product` VALUES ('47', '112', '22.00', '1', '11', '/upload/1503631560长岛冰茶.jpg', '0', '1503631560', '1');
INSERT INTO `product` VALUES ('48', '2', '2.00', '0', '2', '/upload/1503803792QQ图片20150320171348.jpg', '0', '1503803779', '1');
INSERT INTO `product` VALUES ('49', '1', '3.00', '0', '22', '/upload/1503968659长岛冰茶.jpg', '0', '1503968659', '1');
INSERT INTO `product` VALUES ('50', '22', '44.00', '0', '33', '/upload/1503968803长岛冰茶.jpg', '0', '1503968803', '1');
INSERT INTO `product` VALUES ('51', '44', '66.00', '1', '55', '/upload/1503970416QQ图片20150320171348_mh1426842952445.jpg', '0', '1503968886', '1');
INSERT INTO `product` VALUES ('52', '1111', '4.00', '1', '33', '/upload/1503971405长岛冰茶.jpg', '0', '1503971405', '1');
INSERT INTO `product` VALUES ('53', '22333', '555.00', '0', '444', '/upload/1503972291QQ图片20150320171348_mh1426842952445.jpg', '0', '1503972105', '1');
INSERT INTO `product` VALUES ('54', '1111111111111222', '22.00', '1', '11', '/upload/1503981739QQ图片20150320171348_mh1426842952445.jpg', '0', '1503981728', '1');
INSERT INTO `product` VALUES ('55', '34511', '111.00', '0', '123', '/upload/1503982535QQ图片20150320171348.jpg', '0', '1503982526', '0');
INSERT INTO `product` VALUES ('56', '111', '12312.00', '0', '111111111', '/upload/1504261527长岛冰茶.jpg', '0', '1504261527', '0');
INSERT INTO `product` VALUES ('57', '4445', '12.00', '1', '334', '/upload/1504321295长岛冰茶.jpg', '0', '1504321295', '0');
INSERT INTO `product` VALUES ('58', '111', '33.00', '0', '222', '/upload/1504406058太子.jpg', '0', '1504406058', '0');

-- ----------------------------
-- Table structure for user
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `account` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES ('1', 'admin', 'admin');
INSERT INTO `user` VALUES ('2', 'user', 'user');
