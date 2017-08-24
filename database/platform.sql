# Host: localhost  (Version: 5.5.47)
# Date: 2017-07-06 23:29:29
# Generator: MySQL-Front 5.3  (Build 4.234)

/*!40101 SET NAMES utf8 */;

#
# Structure for table "tdc_admin"
#

CREATE TABLE `tdc_admin` (
  `Id` int(11) NOT NULL AUTO_INCREMENT COMMENT '管理员id',
  `ad_name` varchar(20) DEFAULT NULL COMMENT '管理员名字',
  `ad_password` varchar(20) DEFAULT NULL COMMENT '管理员密码',
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=gbk COMMENT='平台管理员表';

#
# Data for table "tdc_admin"
#

INSERT INTO `tdc_admin` VALUES (1,'admin','admin');

#
# Structure for table "tdc_field"
#

CREATE TABLE `tdc_field` (
  `field_Id` int(11) NOT NULL AUTO_INCREMENT COMMENT '模板id',
  `field` text COMMENT '模板值',
  `AddTime` datetime DEFAULT NULL COMMENT '添加模板时间',
  `TDC_id` int(11) DEFAULT NULL COMMENT '企业id',
  PRIMARY KEY (`field_Id`)
) ENGINE=MyISAM AUTO_INCREMENT=23 DEFAULT CHARSET=gbk COMMENT='模板字段表';

#
# Data for table "tdc_field"
#

INSERT INTO `tdc_field` VALUES (3,'a:4:{i:0;s:3:\"aaa\";i:1;s:3:\"bbb\";i:2;s:3:\"ccc\";i:3;s:3:\"ddd\";}','2017-05-25 14:55:36',1),(4,'a:2:{i:0;s:3:\"111\";i:1;s:3:\"aaa\";}','2017-05-25 21:47:39',1),(6,'a:2:{i:0;s:3:\"fff\";i:1;s:3:\"ggg\";}','2017-05-31 12:32:04',1),(7,'a:2:{i:0;s:3:\"jjj\";i:1;s:3:\"mmm\";}','2017-05-31 15:24:03',1),(8,'a:2:{i:0;s:3:\"bbb\";i:1;s:3:\"ccc\";}','2017-05-31 15:51:30',1),(9,'a:2:{i:0;s:3:\"yyy\";i:1;s:3:\"uuu\";}','2017-05-31 16:07:32',1),(11,'a:3:{i:0;s:9:\"来源地\";i:1;s:9:\"目的地\";i:2;s:6:\"售价\";}','2017-06-03 17:19:59',1),(12,'a:3:{i:0;s:12:\"商品名称\";i:1;s:9:\"起始地\";i:2;s:9:\"目的地\";}','2017-06-05 20:30:41',8),(13,'a:4:{i:0;s:12:\"生产日期\";i:1;s:9:\"保质期\";i:2;s:12:\"商品描述\";i:3;s:12:\"运输方式\";}','2017-06-05 20:32:24',8),(14,'a:3:{i:0;s:12:\"出厂日期\";i:1;s:9:\"报关号\";i:2;s:12:\"让人认同\";}','2017-06-09 10:56:09',8),(15,'a:3:{i:0;s:12:\"商品名称\";i:1;s:12:\"生产日期\";i:2;s:9:\"保质期\";}','2017-06-09 20:13:19',19),(16,'a:3:{i:0;s:3:\"aaa\";i:1;s:3:\"bbb\";i:2;s:3:\"ccc\";}','2017-07-01 10:47:13',8),(17,'a:3:{i:0;s:12:\"商品名称\";i:1;s:12:\"生产日期\";i:2;s:9:\"保质期\";}','2017-07-02 11:10:22',8),(18,'a:3:{i:0;s:12:\"商品名称\";i:1;s:12:\"生产日期\";i:2;s:9:\"保质期\";}','2017-07-02 18:15:11',8),(19,'a:8:{i:0;s:12:\"生产场地\";i:1;s:1:\"1\";i:2;s:1:\"1\";i:3;s:1:\"1\";i:4;s:1:\"1\";i:5;s:1:\"1\";i:6;s:1:\"1\";i:7;s:0:\"\";}','2017-07-02 18:37:19',8),(20,'a:8:{i:0;s:12:\"商品名称\";i:1;s:9:\"启运港\";i:2;s:9:\"原产国\";i:3;s:9:\"停靠地\";i:4;s:9:\"目的地\";i:5;s:12:\"运输方式\";i:6;s:12:\"交通工具\";i:7;s:12:\"商品编号\";}','2017-07-02 20:17:32',8),(21,'a:3:{i:0;s:7:\"asllas \";i:1;s:13:\"商品名字 \";i:2;s:12:\"出厂日期\";}','2017-07-04 08:24:07',78),(22,'a:3:{i:0;s:0:\"\";i:1;s:0:\"\";i:2;s:0:\"\";}','2017-07-05 08:32:42',8);

#
# Structure for table "tdc_goods"
#

CREATE TABLE `tdc_goods` (
  `goods_Id` int(11) NOT NULL AUTO_INCREMENT COMMENT '商品id',
  `field_Id` int(11) DEFAULT NULL COMMENT '模板id',
  `TDC_id` int(11) DEFAULT NULL COMMENT '企业id',
  `goods_data` text COMMENT '商品数据',
  `AddTime` datetime DEFAULT NULL COMMENT '添加商品时间',
  `Goods_Status` smallint(6) DEFAULT NULL COMMENT '审核状态',
  `Reason` varchar(255) DEFAULT NULL COMMENT '未审核通过原因',
  PRIMARY KEY (`goods_Id`)
) ENGINE=MyISAM AUTO_INCREMENT=31 DEFAULT CHARSET=gbk COMMENT='商品表';

#
# Data for table "tdc_goods"
#

INSERT INTO `tdc_goods` VALUES (1,11,1,'a:3:{i:0;s:6:\"测试\";i:1;s:3:\"233\";i:2;s:3:\"123\";}','2017-06-01 15:55:13',0,NULL),(5,6,1,'a:2:{i:0;s:3:\"aaa\";i:1;s:3:\"bbb\";}','2017-06-02 12:00:05',0,NULL),(12,11,1,'a:3:{i:0;s:6:\"拉拉\";i:1;s:10:\"2017-06-07\";i:2;s:2:\"30\";}','2017-06-03 20:43:51',0,NULL),(15,13,8,'a:4:{i:0;s:10:\"2017-06-04\";i:1;s:2:\"60\";i:2;s:12:\"别样辣条\";i:3;s:9:\"海运123\";}','2017-06-05 20:34:48',0,NULL),(16,12,8,'a:3:{i:0;s:6:\"甜瓜\";i:1;s:6:\"信阳\";i:2;s:6:\"洛阳\";}','2017-06-05 20:35:09',1,NULL),(17,11,1,'a:3:{i:0;s:4:\"1111\";i:1;s:4:\"1111\";i:2;s:3:\"111\";}','2017-06-07 11:01:05',0,NULL),(18,11,1,'a:3:{i:0;s:3:\"222\";i:1;s:3:\"222\";i:2;s:3:\"222\";}','2017-06-07 11:01:15',0,NULL),(19,11,1,'a:3:{i:0;s:3:\"333\";i:1;s:3:\"333\";i:2;s:3:\"333\";}','2017-06-07 11:01:25',0,NULL),(20,11,1,'a:3:{i:0;s:3:\"444\";i:1;s:3:\"444\";i:2;s:3:\"444\";}','2017-06-07 11:01:35',0,NULL),(21,11,1,'a:3:{i:0;s:3:\"555\";i:1;s:3:\"555\";i:2;s:3:\"555\";}','2017-06-07 11:01:43',0,NULL),(22,11,1,'a:3:{i:0;s:3:\"666\";i:1;s:3:\"666\";i:2;s:3:\"666\";}','2017-06-07 11:01:51',0,NULL),(23,11,1,'a:3:{i:0;s:3:\"777\";i:1;s:3:\"777\";i:2;s:3:\"777\";}','2017-06-07 11:02:00',2,'2345'),(24,11,1,'a:3:{i:0;s:3:\"888\";i:1;s:3:\"888\";i:2;s:3:\"888\";}','2017-06-07 11:02:08',0,NULL),(25,11,1,'a:3:{i:0;s:3:\"999\";i:1;s:3:\"999\";i:2;s:3:\"999\";}','2017-06-07 11:02:17',2,'1234'),(26,14,8,'a:3:{i:0;s:10:\"2017-06-07\";i:1;s:2:\"45\";i:2;s:2:\"er\";}','2017-06-09 11:00:49',2,'ccc'),(27,15,19,'a:3:{i:0;s:15:\"小神童雪糕\";i:1;s:10:\"2017-06-06\";i:2;s:1:\"1\";}','2017-06-09 20:18:01',0,NULL),(28,16,8,'a:3:{i:0;s:5:\"asdfg\";i:1;s:3:\"dfg\";i:2;s:3:\"fgh\";}','2017-07-01 10:47:37',2,'长的丑呗'),(29,14,8,'a:3:{i:0;s:10:\"2017-07-04\";i:1;s:3:\"456\";i:2;s:3:\"789\";}','2017-07-02 13:50:07',0,NULL),(30,21,78,'a:3:{i:0;s:5:\"12345\";i:1;s:5:\"23456\";i:2;s:10:\"2017-07-20\";}','2017-07-04 08:25:16',1,NULL);

#
# Structure for table "tdc_master"
#

CREATE TABLE `tdc_master` (
  `TDC_No` bigint(20) NOT NULL AUTO_INCREMENT,
  `TDC_URL` varchar(200) DEFAULT NULL,
  `TDC_FWID` varchar(20) DEFAULT NULL,
  `TDC_Count` int(10) NOT NULL DEFAULT '0',
  `TDC_Active` varchar(10) NOT NULL DEFAULT 'N',
  `TDC_FWTime` datetime DEFAULT NULL,
  `TDC_TDC_id_Ref` int(10) DEFAULT NULL,
  `TDC_goods_Id_Ref` bigint(20) DEFAULT NULL,
  `TDC_TYPE` varchar(2) DEFAULT NULL,
  `Function_Type` int(5) NOT NULL DEFAULT '1' COMMENT '1—防伪溯源码 ，2—溯源码，3—防伪码',
  PRIMARY KEY (`TDC_No`),
  UNIQUE KEY `TDC_FWID` (`TDC_FWID`)
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=gbk;

#
# Data for table "tdc_master"
#

INSERT INTO `tdc_master` VALUES (1,'http://localhost:8080/TDC/index.php/Qr_Code/qr_show?tdcno==WDs=','5385871871921',0,'Y',NULL,1,12,'1',0),(2,'http://localhost:8080/TDC/index.php/Qr_Code/qr_show?tdcno==VTU=','3156771538437',0,'Y',NULL,1,12,'1',0),(3,'http://localhost:8080/TDC/index.php/Qr_Code/qr_show?tdcno==WTg=','6556094617601',0,'Y',NULL,1,1,'1',0),(4,'http://localhost:8080/TDC/index.php/Qr_Code/qr_show?tdcno==UTc=','5356094517697',0,'Y',NULL,1,12,'1',0),(5,'http://localhost:8080/TDC/index.php/Qr_Code/qr_show?tdcno==BGM=','5783213023730',0,'Y',NULL,1,5,'2',0),(6,'http://localhost:8080/TDC/index.php/Qr_Code/qr_show?tdcno==VjI=','6983213294869',0,'Y',NULL,1,5,'2',0),(7,'http://localhost:8080/TDC/index.php/Qr_Code/qr_show?tdcno==VzI=','1748462530204',0,'Y',NULL,8,15,'1',0),(8,'http://localhost:8080/TDC/index.php/Qr_Code/qr_show?tdcno==BG4=','6148462530956',3,'Y','2017-06-06 09:14:21',8,15,'1',1),(9,'http://localhost:8080/TDC/index.php/Qr_Code/qr_show?tdcno==AGs=','9748377976354',0,'Y',NULL,8,14,'2',2),(10,'http://localhost:8080/TDC/index.php/Qr_Code/qr_show?tdcno==AGMCMA==','6648377676247',2,'Y','2017-06-06 11:33:50',8,14,'2',3),(11,'http://localhost:8080/TDC/index.php/Qr_Code/qr_show?tdcno==B2RQYw==','5319326299164',0,'Y',NULL,8,13,'2',1),(12,'http://localhost:8080/TDC/index.php/Qr_Code/qr_show?tdcno==VjUFNQ==','9619309218844',0,'Y',NULL,8,13,'1',2),(13,'http://localhost:8080/TDC/index.php/Qr_Code/qr_show?tdcno==WDsDMg==','0819284396516',0,'Y',NULL,8,14,'1',3),(14,'http://localhost:8080/TDC/index.php/Qr_Code/qr_show?tdcno==UDNfaQ==','3004358632379',0,'Y',NULL,1,5,'1',1),(15,'http://localhost:8080/TDC/index.php/Qr_Code/qr_show?tdcno==VzRUYw==','7899771672863',0,'N',NULL,1,NULL,'1',1),(16,'http://localhost:8080/TDC/index.php/Qr_Code/qr_show?tdcno==VjVTZw==','6199771576875',0,'N',NULL,1,NULL,'1',1),(17,'http://localhost:8080/TDC/index.php/Qr_Code/qr_show?tdcno==WTpSZw==','5399181375949',0,'N',NULL,8,NULL,'2',2),(18,'http://localhost:8080/TDC/index.php/Qr_Code/qr_show?tdcno==UTJeZA==','1999181175790',0,'N',NULL,8,NULL,'2',2),(19,'http://localhost:8080/TDC/index.php/Qr_Code/qr_show?tdcno==VTYEPw==','0234360447432',0,'Y',NULL,8,26,'1',1),(20,'http://localhost:8080/TDC/index.php/Qr_Code/qr_show?tdcno==B2cHNQ==','5034360246826',0,'Y',NULL,8,26,'1',1),(21,'http://localhost:8080/TDC/index.php/Qr_Code/qr_show?tdcno==AmJVZg==','9379675908254',0,'Y',NULL,19,27,'1',1),(22,'http://localhost:8080/TDC/index.php/Qr_Code/qr_show?tdcno==B2cFNQ==','9779080425971',0,'Y',NULL,19,27,'2',2),(23,'http://localhost:8080/TDC/index.php/Qr_Code/qr_show?tdcno==WDhWZw==','5491940729454',0,'N',NULL,8,NULL,'1',1),(24,'http://localhost:8080/TDC/index.php/Qr_Code/qr_show?tdcno==B2cFMw==','7791960528322',0,'N',NULL,8,NULL,'1',1),(25,'http://localhost:8080/TDC/index.php/Qr_Code/qr_show?tdcno==AmIANw==','0038848035506',0,'N',NULL,8,NULL,'1',1),(26,'http://localhost:8080/TDC/index.php/Qr_Code/qr_show?tdcno==AmJfaw==','1538402076804',0,'N',NULL,8,NULL,'1',1),(27,'http://localhost:8080/TDC/index.php/Qr_Code/qr_show?tdcno==AGADNg==','9038248546474',0,'N',NULL,8,NULL,'1',1),(28,'http://localhost:8080/TDC/index.php/Qr_Code/qr_show?tdcno==VTVSaA==','2338919651952',0,'N',NULL,8,NULL,'1',1),(29,'http://localhost:8080/TDC/index.php/Qr_Code/qr_show?tdcno==BGQFPg==','2838726915512',0,'Y',NULL,8,16,'1',1),(30,'http://localhost:8080/TDC/index.php/Qr_Code/qr_show?tdcno==VTRUZg==','3235289748897',0,'Y',NULL,8,16,'1',1),(31,'http://localhost:8080/TDC/index.php/Qr_Code/qr_show?tdcno==VTRXZA==','1835188186340',0,'N',NULL,8,NULL,'1',1),(32,'http://localhost:8080/TDC/index.php/Qr_Code/qr_show?tdcno==A2JTYw==','5735679883194',0,'N',NULL,8,NULL,'1',1),(33,'http://localhost:8080/TDC/index.php/Qr_Code/qr_show?tdcno==B2ZVZA==','0228922899162',0,'N',NULL,8,NULL,'1',1),(34,'http://localhost:8080/TDC/index.php/Qr_Code/qr_show?tdcno==WDlRZw==','4028794808490',0,'N',NULL,8,NULL,'1',1),(35,'http://localhost:8080/TDC/index.php/Qr_Code/qr_show?tdcno==VTRSZQ==','4428191273952',0,'N',NULL,8,NULL,'1',1),(36,'http://localhost:8080/TDC/index.php/Qr_Code/qr_show?tdcno==AmMFMQ==','1428585670962',0,'N',NULL,8,NULL,'1',1),(37,'http://localhost:8080/TDC/index.php/Qr_Code/qr_show?tdcno==BGUHMg==','2124838187828',0,'N',NULL,8,NULL,'1',1),(38,'http://localhost:8080/TDC/index.php/Qr_Code/qr_show?tdcno==VzZSaA==','3324444565473',0,'N',NULL,8,NULL,'1',1),(39,'http://localhost:8080/TDC/index.php/Qr_Code/qr_show?tdcno==VzYEPw==','4124390123690',0,'N',NULL,8,NULL,'1',1),(40,'http://localhost:8080/TDC/index.php/Qr_Code/qr_show?tdcno==VjAAMg==','4624242902269',0,'N',NULL,8,NULL,'1',1),(41,'http://localhost:8080/TDC/index.php/Qr_Code/qr_show?tdcno==UTcENw==','7624266497545',0,'N',NULL,8,NULL,'1',1),(42,'http://localhost:8080/TDC/index.php/Qr_Code/qr_show?tdcno==AmRRYQ==','9724934702399',0,'N',NULL,8,NULL,'1',1),(43,'http://localhost:8080/TDC/index.php/Qr_Code/qr_show?tdcno==UTdSYw==','7424772366919',0,'Y',NULL,8,16,'1',1),(44,'http://localhost:8080/TDC/index.php/Qr_Code/qr_show?tdcno==VTNTZQ==','7863892255037',0,'Y',NULL,78,30,'1',1);

#
# Structure for table "tdc_menu"
#

CREATE TABLE `tdc_menu` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `menu` varchar(30) DEFAULT NULL COMMENT '菜单名称',
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '状态 1开启 0关闭',
  `parent_id` mediumint(8) DEFAULT NULL COMMENT '父级id',
  `addtime` datetime DEFAULT NULL COMMENT '添加时间',
  `url` varchar(60) DEFAULT NULL COMMENT 'url地址',
  `url_type` tinyint(4) unsigned NOT NULL DEFAULT '1' COMMENT '是否是本站的地址 1是 0 不是',
  `path` varchar(255) DEFAULT '0' COMMENT 'id直接字符串结合',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=25 DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

#
# Data for table "tdc_menu"
#

INSERT INTO `tdc_menu` VALUES (1,'首页',1,0,'1899-12-29 00:00:00','Login/index',1,'0'),(2,'企业信息管理',1,1,'2017-06-13 00:00:00','1',1,'0-2'),(3,'模板信息管理',1,1,NULL,'1',1,'0-3'),(4,'商品信息管理',1,1,NULL,'1',1,'0-4'),(5,'二维码管理',1,1,NULL,'1',1,'0-5'),(6,'企业信息总览',1,2,NULL,'User/UserInfo',1,'0-2-6'),(7,'模板信息总览',1,3,NULL,'Template/templateInfo',1,'0-3-7'),(8,'新增模板信息',1,3,NULL,'Template/add_template',1,'0-3-8'),(9,'商品信息查询',1,4,NULL,'Goods_add/Goods_Search',1,'0-4-9'),(10,'商品信息展示',1,4,NULL,'Goods_add/data_show',1,'0-4-10'),(11,'根据模板增加商品信息',1,4,NULL,'Goods_add/Goods_Add',1,'0-4-11'),(12,'二维码生成并激活',1,5,NULL,'Qr_Code/qr_add',1,'0-5-12'),(13,'只生成二维码',1,5,NULL,'Qr_Code/QR_Add_only',1,'0-5-13'),(14,'只激活二维码',1,5,NULL,'Qr_Code/qr_active_only',1,'0-5-14'),(15,'二维码回收',1,5,NULL,'Qr_Code/qr_Notactive',1,'0-5-15'),(16,'二维码更新',1,5,NULL,'Qr_Code/qr_Transform',1,'0-5-16'),(17,'导出excel',1,5,NULL,'Export/export_show',1,'0-5-17'),(18,'号段激活情况',1,5,NULL,'Qr_Code/search_active',1,'0-5-18'),(19,'使用比例',1,5,NULL,'Qr_Code/qr_UseScale',1,'0-5-19'),(20,'权限管理',1,1,NULL,'1',1,'0-20'),(21,'管理员列表',1,20,NULL,'Limit/admin_list',1,'0-20-21'),(22,'添加管理员',1,20,NULL,'Limit/admin_add',1,'0-20-22'),(23,'权限组列表',1,20,NULL,'Limit/limit_list',1,'0-20-23'),(24,'添加权限组',1,20,NULL,'Limit/limit_add',1,'0-20-24');

#
# Structure for table "tdc_role"
#

CREATE TABLE `tdc_role` (
  `Role_id` int(2) NOT NULL AUTO_INCREMENT COMMENT '角色id',
  `Role_name` varchar(200) DEFAULT NULL COMMENT '全权限',
  `Menu_id` varchar(255) DEFAULT NULL COMMENT '菜单列表',
  `Create_time` datetime DEFAULT NULL COMMENT '添加时间',
  `Admin_id` int(11) DEFAULT NULL COMMENT '管理员id',
  PRIMARY KEY (`Role_id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=gbk ROW_FORMAT=DYNAMIC;

#
# Data for table "tdc_role"
#

INSERT INTO `tdc_role` VALUES (1,'全权限','1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24','2011-11-25 13:43:07',8),(2,'仅企业信息权限','1,2,6,20,21,22,23,24','2011-11-25 13:43:07',8),(3,'测试','1,3,7,8,4,9,10,11','2017-06-29 18:00:27',8),(5,'222','1,2,6,20,21,22,23,24','2017-06-29 21:58:01',9),(6,'全权限','1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24','2017-06-29 18:00:27',9),(8,'全权限','1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24','2017-07-03 10:43:56',76),(9,'全权限','1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24','2017-07-03 10:51:23',77),(10,'全权限','1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24','2017-07-04 08:18:04',78),(11,'wzy','1,2,6,3,7,8,20,21,22,23,24','2017-07-04 08:21:16',78);

#
# Structure for table "tdc_user"
#

CREATE TABLE `tdc_user` (
  `TDC_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '用户id',
  `User_Id` varchar(20) DEFAULT NULL COMMENT '企业登录账号',
  `User_Password` varchar(20) DEFAULT NULL COMMENT '用户密码',
  `Is_Admin` int(2) NOT NULL DEFAULT '0' COMMENT '超级管理员',
  `User_role` int(6) DEFAULT NULL COMMENT '用户权限组',
  `Admin_id` int(11) DEFAULT NULL COMMENT '管理员id',
  `CompanyName` varchar(50) DEFAULT NULL COMMENT '企业名称',
  `CompanyLogo` varchar(50) DEFAULT NULL COMMENT '企业logo',
  `Company_Certification` varchar(50) NOT NULL DEFAULT '' COMMENT '企业资质',
  `CompanyType` int(11) DEFAULT NULL COMMENT '企业类型',
  `ContactPerson` varchar(10) DEFAULT NULL COMMENT '联系人',
  `PhoneNumber` varchar(13) DEFAULT NULL COMMENT '联系电话',
  `Email` varchar(20) DEFAULT NULL COMMENT '邮箱',
  `User_Register_Time` datetime DEFAULT NULL COMMENT '注册时间',
  `Company_Status` smallint(6) DEFAULT NULL COMMENT '审核状态',
  `Reason` varchar(255) DEFAULT NULL COMMENT '未通过审核原因',
  PRIMARY KEY (`TDC_id`)
) ENGINE=InnoDB AUTO_INCREMENT=80 DEFAULT CHARSET=gbk ROW_FORMAT=COMPACT COMMENT='注册企业用户';

#
# Data for table "tdc_user"
#

INSERT INTO `tdc_user` VALUES (8,'aaa','aaa',1,1,8,'aaa','uploads_logo/2017070315022041411精美.jpg','uploads_zizhi/2017070315022021822好看.jpg',1,'aaa','13027526927','2311492227@qq.com','2017-05-29 18:00:48',1,NULL),(9,'bbb','bbb',1,1,9,'bbb','uploads_logo/bbb首尔生活.jpg','uploads_zizhi/111郑欧购.jpg',2,'bbb','bbb','bbb','2017-05-29 18:02:36',0,NULL),(16,'ddd','ddd',1,NULL,NULL,'ddd','uploads_logo/万国全球购aaa.png','uploads_zizhi/111郑欧购.jpg',2,'ddd','ddd','ddd','2017-05-29 18:10:59',2,'2345'),(18,'zy','123456',0,NULL,NULL,'zy大佬','uploads_logo/万国全球购aaa.png','uploads_zizhi/111郑欧购.jpg',7,'12345','12345','12345','2017-06-09 16:55:56',1,NULL),(19,'2345','345',0,2,8,'1234','uploads_logo/万国全球购aaa.png','uploads_zizhi/111郑欧购.jpg',1,'123','123','123','2017-06-09 17:53:36',0,NULL),(20,'123','123',0,3,8,'123','uploads_logo/万国全球购aaa.png','uploads_zizhi/111郑欧购.jpg',1,'123','123','123','2017-06-14 21:54:34',1,NULL),(21,'ypj','ypj',0,1,8,NULL,NULL,'',NULL,NULL,NULL,NULL,NULL,NULL,NULL),(73,'1','1',0,5,9,'1','uploads_logo/万国全球购.png','uploads_zizhi/11资质照片.jpg',1,'1','13027526927','12@12.com','2017-06-19 20:56:51',0,NULL),(74,'111','111',0,2,8,NULL,NULL,'',NULL,NULL,NULL,NULL,'2017-06-29 21:33:12',NULL,NULL),(76,'ypj521','ypj521',1,8,76,'111','uploads_logo/20170703104544686万国全球购.png','uploads_zizhi/20170703104544362万国全球购.png',2,'ypj','13027526927','2311492227@qq.com','2017-07-03 10:43:56',0,NULL),(77,'xhhypj','xhhypj',1,9,77,'aaa','uploads_logo/20170703105152334万国全球购.png','uploads_zizhi/20170703105152196万国全球购.png',4,'ypj','13027526927','2311492227@qq.com','2017-07-03 10:51:23',0,NULL),(78,'wanghy','wanghy',1,10,78,'23456','uploads_logo/2017070408185179922好看.jpg','uploads_zizhi/2017070408185148711精美.jpg',3,'4jtry','13027526927','2311492227@qq.com','2017-07-04 08:18:04',1,NULL),(79,'jinpei','jinpei',0,11,78,NULL,NULL,'',NULL,NULL,NULL,NULL,'2017-07-04 08:21:55',NULL,NULL);
