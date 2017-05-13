/*
SQLyog Trial v12.4.1 (64 bit)
MySQL - 5.6.27-log : Database - pharmacydb
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`pharmacydb` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `pharmacydb`;

/*Table structure for table `bill_export_shipment` */

DROP TABLE IF EXISTS `bill_export_shipment`;

CREATE TABLE `bill_export_shipment` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `bill_export_id` int(10) unsigned NOT NULL,
  `shipment_id` int(10) unsigned NOT NULL,
  `quantity` int(10) unsigned NOT NULL,
  `total_amount` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `bill_export_shipment` */

insert  into `bill_export_shipment`(`id`,`bill_export_id`,`shipment_id`,`quantity`,`total_amount`) values 
(1,1,1,1,2000),
(2,2,4,1,8000),
(3,3,17,2,40000),
(4,4,1,9,18000),
(5,5,12,2,40000),
(6,6,2,46,1150000),
(7,7,4,2,16000),
(8,8,19,4,60000),
(9,9,20,1,2000),
(10,10,4,1,8000),
(11,11,9,10,250000),
(12,12,7,40,1120000),
(13,13,4,1,8000),
(14,14,21,20,40000),
(15,15,18,20,200000),
(16,16,17,1,20000),
(17,17,17,1,20000),
(18,18,17,1,20000),
(19,19,17,1,20000),
(20,20,17,1,20000),
(21,21,17,1,20000),
(22,22,17,1,20000),
(23,23,17,0,0),
(24,24,17,1,20000),
(25,25,17,1,20000),
(26,26,17,0,0),
(27,27,17,0,0),
(28,28,17,0,0),
(29,29,21,3,6000),
(30,30,17,1,20000),
(31,31,17,0,0),
(32,32,17,0,0),
(33,33,17,1,20000);

/*Table structure for table `bill_exports` */

DROP TABLE IF EXISTS `bill_exports`;

CREATE TABLE `bill_exports` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `code` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sub_pharmacy_id` int(10) unsigned NOT NULL,
  `creator_id` int(10) unsigned NOT NULL,
  `total_amount` bigint(20) unsigned NOT NULL,
  `received_amount` bigint(20) unsigned NOT NULL,
  `customer_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `bill_exports` */

insert  into `bill_exports`(`id`,`code`,`sub_pharmacy_id`,`creator_id`,`total_amount`,`received_amount`,`customer_name`,`created_at`) values 
(1,'',2,2,2000,2000,'','2017-05-03 15:05:03'),
(2,'',3,3,10000,10000,'','2017-05-03 15:24:30'),
(3,'',2,2,40000,40000,'','2017-05-05 03:34:39'),
(4,'',2,2,18000,18000,'','2017-05-05 07:25:37'),
(5,'',1,1,40000,40000,'','2017-05-07 10:58:03'),
(6,'',3,3,1150000,0,'','2017-05-07 15:51:16'),
(7,'',3,3,16000,0,'','2017-05-08 15:30:04'),
(8,'',4,5,60000,0,'','2017-05-08 15:36:19'),
(9,'',14,20,2000,0,'','2017-05-09 15:39:31'),
(10,'',3,3,8000,10000,'','2017-05-09 16:13:56'),
(11,'',3,3,250000,0,'','2017-05-09 16:14:32'),
(12,'',3,3,1120000,0,'','2017-05-09 16:15:11'),
(13,'',3,3,8000,80000,'','2017-05-10 15:59:10'),
(14,'',2,2,40000,40000,'','2017-05-13 07:50:34'),
(15,'',2,2,200000,200000,'','2017-05-13 07:52:05'),
(16,'',2,2,20000,0,'','2017-05-13 08:09:53'),
(17,'',2,2,20000,20000,'','2017-05-13 08:10:18'),
(18,'',2,2,20000,20000,'','2017-05-13 08:11:46'),
(19,'',2,2,20000,20000,'','2017-05-13 08:15:18'),
(20,'',2,2,20000,20000,'','2017-05-13 08:16:30'),
(21,'',2,2,20000,20000,'','2017-05-13 08:17:40'),
(22,'',2,2,20000,20000,'','2017-05-13 08:19:38'),
(23,'',2,2,0,0,'','2017-05-13 10:21:47'),
(24,'',2,2,20000,20000,'','2017-05-13 10:23:25'),
(25,'',2,2,20000,20000,'','2017-05-13 10:28:06'),
(26,'',2,2,0,0,'','2017-05-13 11:17:59'),
(27,'',2,2,0,0,'','2017-05-13 11:22:34'),
(28,'',2,2,0,0,'','2017-05-13 11:24:22'),
(29,'',2,2,6000,10000,'','2017-05-13 13:10:07'),
(30,'',2,2,20000,100000,'','2017-05-13 13:15:50'),
(31,'',2,2,0,0,'','2017-05-13 13:22:44'),
(32,'',2,2,0,0,'','2017-05-13 13:22:46'),
(33,'',2,2,20000,20000,'','2017-05-13 13:26:26');

/*Table structure for table `bill_imports` */

DROP TABLE IF EXISTS `bill_imports`;

CREATE TABLE `bill_imports` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `code` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_amount` bigint(20) unsigned NOT NULL,
  `creator_id` int(10) unsigned NOT NULL,
  `sub_pharmacy_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `bill_imports` */

insert  into `bill_imports`(`id`,`code`,`total_amount`,`creator_id`,`sub_pharmacy_id`,`created_at`,`updated_at`) values 
(1,'',200000,2,2,'2017-04-27 14:17:18','2017-04-27 14:17:18'),
(2,'',750000,3,3,'2017-04-27 14:22:39','2017-04-27 14:22:39'),
(3,'',6300000,3,3,'2017-04-27 14:27:07','2017-04-27 14:27:07'),
(4,'',2280000,3,3,'2017-04-27 15:07:38','2017-04-27 15:07:38'),
(5,'',1870000,3,3,'2017-04-27 15:09:38','2017-04-27 15:09:38'),
(6,'',1950000,3,3,'2017-04-27 15:21:09','2017-04-27 15:21:09'),
(7,'',100000,1,1,'2017-04-27 15:37:42','2017-04-27 15:37:42'),
(8,'',6000000,4,7,'2017-04-27 15:39:14','2017-04-27 15:39:14'),
(9,'',1000000,4,7,'2017-04-27 15:52:20','2017-04-27 15:52:20'),
(10,'',700000,1,1,'2017-04-28 16:27:34','2017-04-28 16:27:34'),
(11,'',200000,2,2,'2017-05-05 03:31:36','2017-05-05 03:31:36'),
(12,'',10000,2,2,'2017-05-07 15:33:01','2017-05-07 15:33:01'),
(13,'',10000000,5,4,'2017-05-08 15:35:56','2017-05-08 15:35:56'),
(14,'',15144129,20,14,'2017-05-09 15:39:15','2017-05-09 15:39:15'),
(15,'',200000,2,2,'2017-05-13 07:49:17','2017-05-13 07:49:17'),
(16,'',1000000,20,14,'2017-05-13 09:40:53','2017-05-13 09:40:53'),
(17,'',1000000,2,2,'2017-05-13 13:33:19','2017-05-13 13:33:19');

/*Table structure for table `categories` */

DROP TABLE IF EXISTS `categories`;

CREATE TABLE `categories` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `categories` */

insert  into `categories`(`id`,`name`,`description`) values 
(1,'Thực phẩm chức năng','Hàng bổ sung chất dinh dưỡng, không phải là thuốc'),
(2,'Thuốc','Hàng bổ sung chất dinh dưỡng, không phải là thuốc'),
(3,'Dụng cụ','Hàng bổ sung chất dinh dưỡng, không phải là thuốc');

/*Table structure for table `migrations` */

DROP TABLE IF EXISTS `migrations`;

CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `migrations` */

insert  into `migrations`(`id`,`migration`,`batch`) values 
(4,'2014_10_12_000000_create_users_table',1),
(5,'2014_10_12_100000_create_password_resets_table',1),
(6,'2017_03_29_143700_create_medic_database',1);

/*Table structure for table `password_resets` */

DROP TABLE IF EXISTS `password_resets`;

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `password_resets` */

/*Table structure for table `pharmacies` */

DROP TABLE IF EXISTS `pharmacies`;

CREATE TABLE `pharmacies` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `account` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner_name` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `certificate_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `pharmacies_account_unique` (`account`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `pharmacies` */

insert  into `pharmacies`(`id`,`name`,`account`,`address`,`phone`,`email`,`owner_name`,`certificate_id`,`created_at`,`updated_at`) values 
(1,'Olala','manhmaluc','Ha Noi','0973232734','ngocmanh1712@gmail.com','Lưu Ngọc Mạnh',NULL,'2017-04-26 18:35:12','2017-04-26 18:35:12'),
(2,'Nhà thuốc anh Anh','Anhnph','1','1','anh@gmail.com','Nguyễn Phạm Hùng Anh',NULL,'2017-04-27 04:14:32','2017-04-27 04:14:32'),
(3,'Hiếu Hạnh','hieuhanh','Láng Hạ - Đống Đa - Hà Nội','01647556187','Hieu_dhd@gmail.com','Nguyễn Văn Hiếu',NULL,'2017-04-27 13:44:44','2017-04-27 13:44:44'),
(4,'Nhà Thuốc Tuấn Phương','itp','Hà Nội','0908837886','phuonghup91@gmail.com','Nguyễn Như Phương',NULL,'2017-04-27 14:46:44','2017-04-27 14:46:44'),
(5,'Đặng Đô','dodv212','55555555','5555555','dodv212@gmail.com','Đặng Văn Đô',NULL,'2017-05-05 03:44:09','2017-05-05 03:44:09'),
(6,'Trường Giang','giangnpt','Hà Nội','13245646798','giangnpt@gmail.com','Nguyễn Phạm Trường Giang',NULL,'2017-05-06 10:02:32','2017-05-06 10:02:32'),
(7,'gádgd','kjsadhf','dfasgwe','sadgasfgsa','kjsdhf@jkhfa','hjsfadk',NULL,'2017-05-08 14:25:14','2017-05-08 14:25:14'),
(9,'Nhà Thuốc của Giang','giangnguyenpham','Đà Nẵng','0906203789','giangnpt94@gmail.com','Nguyen Pham Truong Giang',NULL,'2017-05-09 15:03:47','2017-05-09 15:03:47'),
(10,'Quang Thịnh','thinhtq','56 Chùa Bộc','0912564853','thinhtq@gmail.com','Trác Quang Thịnh',NULL,'2017-05-09 15:50:54','2017-05-09 15:50:54'),
(11,'abc','a','123','123','a@gmail.com','a',NULL,'2017-05-09 17:10:30','2017-05-09 17:10:30'),
(12,'Nhà thuốc Vân Xinh','nuvatica','Cầu Giấy - Hà Nội','01655448178','ntcv.uet@gmail.com','Nguyễn Thị Cẩm Vân',NULL,'2017-05-09 17:46:25','2017-05-09 17:46:25'),
(13,'HT','htcrazy','Dm trái đất','01647556187','hieunguyenvandkh@gmail.com','Hiếu',NULL,'2017-05-12 12:29:39','2017-05-12 12:29:39');

/*Table structure for table `product_defaults` */

DROP TABLE IF EXISTS `product_defaults`;

CREATE TABLE `product_defaults` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` bigint(20) unsigned NOT NULL,
  `unit` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=52 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `product_defaults` */

insert  into `product_defaults`(`id`,`name`,`price`,`unit`,`category_id`,`created_at`,`updated_at`) values 
(1,'Thuốc trĩ',10000,NULL,1,NULL,NULL),
(2,'Eyelight Xanh',10000,NULL,2,NULL,NULL),
(3,'Eyelight Đỏ',15000,NULL,2,NULL,NULL),
(4,'Khẩu Trang',2000,NULL,3,NULL,NULL),
(5,'Viên cốm',50000,NULL,1,NULL,NULL),
(6,'HUMAN ALBUMIN BAXTER INJ 200G/L 50ML 1\'S',0,NULL,1,NULL,NULL),
(7,'SADAPRON 300',0,NULL,1,NULL,NULL),
(8,'AMIKACIN 250 MG/ML',0,NULL,1,NULL,NULL),
(9,'CORDARONE 200MG B/   2BLS X 15 TABS',0,NULL,1,NULL,NULL),
(10,'CARDILOPIN',0,NULL,1,NULL,NULL),
(11,'PRAVERIX 500MG',0,NULL,1,NULL,NULL),
(12,'CURAM TAB 625MG 5X4\'S',0,NULL,1,NULL,NULL),
(13,'CURAM TAB 1000MG 5X2\'S',0,NULL,1,NULL,NULL),
(14,'ANOZEOL TAB 1MG 2X14\'S',0,NULL,1,NULL,NULL),
(15,'TORMEG-20',0,NULL,1,NULL,NULL),
(16,'PAXIRASOL',0,NULL,1,NULL,NULL),
(17,'BUPIVACAINE AGUETTANT 5MG/ML',0,NULL,1,NULL,NULL),
(18,'BUPIVACAINE FOR SPINAL ANAESTHESIA AGUETTANT 5MG/ML',0,NULL,1,NULL,NULL),
(19,'BUPIVACAINE AGUETTANT 5MG/ML',0,NULL,1,NULL,NULL),
(20,'XALVOBIN 500MG FILM-COATED TABLET',0,NULL,1,NULL,NULL),
(21,'MILDOCAP',0,NULL,1,NULL,NULL),
(22,'TEGRETOL 200 TAB 200MG 5X10\'S',0,NULL,1,NULL,NULL),
(23,'CARBIMAZOLE 5',0,NULL,1,NULL,NULL),
(24,'CEFAZOLIN ACTAVIS',0,NULL,1,NULL,NULL),
(25,'CEFTRIAXONE PANPHARMA',0,NULL,1,NULL,NULL),
(26,'CEFUROXIME PANPHARMA',0,NULL,1,NULL,NULL),
(27,'XORIMAX TAB 500MG 10\'S',0,NULL,1,NULL,NULL),
(28,'CILOXAN DROP 0.3% 5ML',0,NULL,1,NULL,NULL),
(29,'CIPRINOL 200MG/100ML SOLUTION FOR INTRAVENOUS INFUSION',0,NULL,1,NULL,NULL),
(30,'VIPROLOX 500',0,NULL,1,NULL,NULL),
(31,'REMECLAR 500',0,NULL,1,NULL,NULL),
(32,'MILRIXA',0,NULL,1,NULL,NULL),
(33,'RENAPRIL 10MG',0,NULL,1,NULL,NULL),
(34,'RENAPRIL 5MG',0,NULL,1,NULL,NULL),
(35,'FAMOGAST',0,NULL,1,NULL,NULL),
(36,'PMS-FLUOXETINE',0,NULL,1,NULL,NULL),
(37,'FUROSEMIDUM POLPHARMA',0,NULL,1,NULL,NULL),
(38,'GOLDDICRON',0,NULL,1,NULL,NULL),
(39,'GOLDDICRON',0,NULL,1,NULL,NULL),
(40,'BUSCOPAN TAB. 10MG B/100',0,NULL,1,NULL,NULL),
(41,'MIXIPEM 500MG/500MG',0,NULL,1,NULL,NULL),
(42,'ISOMONIT RETARD TAB 60MG 3X10\'S',0,NULL,1,NULL,NULL),
(43,'VOLFACINE TAB 500MG 1X5\'S',0,NULL,1,NULL,NULL),
(44,'ALUVIA TAB 200MG 120\'S',0,NULL,1,NULL,NULL),
(45,'EROLIN',0,NULL,1,NULL,NULL),
(46,'MELOFLAM',0,NULL,1,NULL,NULL),
(47,'MELORICH',0,NULL,1,NULL,NULL),
(48,'MEDROL TAB 16MG 30\'S',0,NULL,1,NULL,NULL),
(49,'METHYLPREDNISOLON SOPHARMA',0,NULL,1,NULL,NULL),
(50,'METHYLDOPA 250',0,NULL,1,NULL,NULL),
(51,'MORETEL',0,NULL,1,NULL,NULL);

/*Table structure for table `product_input_types` */

DROP TABLE IF EXISTS `product_input_types`;

CREATE TABLE `product_input_types` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `product_input_types` */

insert  into `product_input_types`(`id`,`name`) values 
(1,'Hộp'),
(2,'Ống'),
(3,'Chai'),
(4,'Tuýp'),
(5,'Vỉ'),
(6,'Lọ'),
(7,'Viên'),
(8,'Gói'),
(9,'Túi'),
(10,'Bơm tiêm'),
(11,'Bút tiêm'),
(12,'Kit'),
(13,'Thùng'),
(14,'Chiếc');

/*Table structure for table `products` */

DROP TABLE IF EXISTS `products`;

CREATE TABLE `products` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` bigint(20) unsigned NOT NULL,
  `min_quantity` int(10) unsigned DEFAULT '5',
  `unit` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category_id` int(10) unsigned NOT NULL,
  `pharmacy_id` int(10) unsigned NOT NULL,
  `creator_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `products` */

insert  into `products`(`id`,`name`,`price`,`min_quantity`,`unit`,`category_id`,`pharmacy_id`,`creator_id`,`created_at`,`updated_at`) values 
(1,'Khẩu Trang',2000,5,NULL,3,2,2,'2017-04-27 14:17:18','2017-04-27 14:17:18'),
(2,'BUSCOPAN TAB. 10MG B/100',25000,6,NULL,2,3,3,'2017-04-27 14:22:39','2017-05-10 14:17:48'),
(3,'HUMAN ALBUMIN BAXTER INJ 200G/L 50ML 1\'S',80000,5,NULL,2,3,3,'2017-04-27 14:27:07','2017-04-27 14:27:07'),
(4,'ANOZEOL TAB 1MG 2X14\'S',8000,5,NULL,2,3,3,'2017-04-27 14:27:07','2017-04-27 14:27:07'),
(5,'MILRIXA',24000,5,NULL,2,3,3,'2017-04-27 15:07:38','2017-04-27 15:07:38'),
(6,'VOLFACINE TAB 500MG 1X5\'S',56000,5,NULL,1,3,3,'2017-04-27 15:07:38','2017-04-27 15:07:38'),
(7,'BUPIVACAINE FOR SPINAL ANAESTHESIA AGUETTANT 5MG/ML',28000,5,NULL,1,3,3,'2017-04-27 15:09:38','2017-04-27 15:09:38'),
(8,'PMS-FLUOXETINE',36000,5,NULL,2,3,3,'2017-04-27 15:09:38','2017-04-27 15:09:38'),
(9,'VOLFACINE TAB 500MG 1X5\'S',5000,5,NULL,2,3,3,'2017-04-27 15:21:09','2017-04-27 15:21:09'),
(10,'CORDARONE 200MG B/   2BLS X 15 TABS',20000,5,NULL,1,1,1,'2017-04-27 15:37:42','2017-04-27 15:37:42'),
(11,'metadium',20000,5,NULL,1,4,4,'2017-04-27 15:39:14','2017-04-27 15:39:14'),
(12,'Alexmin',100000,5,NULL,1,4,4,'2017-04-27 15:39:14','2017-04-27 15:39:14'),
(13,'Flucam',50000,5,NULL,1,4,4,'2017-04-27 15:52:20','2017-04-27 15:52:20'),
(14,'TORMEG-20',1000,5,NULL,1,1,1,'2017-04-28 16:27:34','2017-04-28 16:27:34'),
(15,'HUMAN ALBUMIN BAXTER INJ 200G/L 50ML 1\'S',20000,5,NULL,1,2,2,'2017-05-05 03:31:36','2017-05-05 03:31:36'),
(16,'HUMAN ALBUMIN BAXTER INJ 200G/L 50ML 1\'S',100000,10,'Hộp',1,1,1,'2017-05-07 10:52:16','2017-05-07 10:52:16'),
(17,'CARDILOPIN',10000,10,'Viên',2,2,2,'2017-05-07 15:31:28','2017-05-07 15:31:28'),
(18,'SADAPRON 300',15000,5,'Viên',1,3,5,'2017-05-08 15:35:26','2017-05-08 15:35:26'),
(19,'Khẩu Trang',2000,20,'Vỉ',3,9,20,'2017-05-09 15:38:13','2017-05-09 15:38:13'),
(20,'HUMAN ALBUMIN BAXTER INJ 200G/L 50ML 1\'S',0,NULL,'Hộp',1,11,22,'2017-05-09 17:28:44','2017-05-09 17:28:44'),
(21,'Eyelight Xanh',10000,NULL,'Viên',2,11,22,'2017-05-09 17:32:27','2017-05-09 17:32:27'),
(22,'CORDARONE 200MG B/   2BLS X 15 TABS',0,NULL,'Hộp',1,11,22,'2017-05-09 17:32:58','2017-05-09 17:32:58'),
(23,'Khẩu Trang',2000,NULL,'Viên',3,11,22,'2017-05-09 17:33:09','2017-05-09 17:33:09'),
(24,'MILDOCAP',10000,10,'Viên',1,2,2,'2017-05-13 05:00:16','2017-05-13 05:00:16'),
(25,'BUPIVACAINE AGUETTANT 5MG/ML',10000,10,'Vỉ',1,3,3,'2017-05-13 06:30:06','2017-05-13 06:30:06'),
(26,'AMIKACIN 250 MG/ML',10000,10,'Viên',1,2,2,'2017-05-13 07:29:34','2017-05-13 07:29:34'),
(27,'Viên cốm',2000,100,'Viên',1,2,2,'2017-05-13 07:35:23','2017-05-13 07:35:23'),
(28,'METHYLDOPA 250',15000,5,'Hộp',2,3,3,'2017-05-13 09:06:04','2017-05-13 09:06:04'),
(29,'Eyelight Xanh',10000,NULL,'Hộp',2,9,20,'2017-05-13 09:40:24','2017-05-13 09:40:24'),
(30,'Thuốc trĩ',20000,20,'Lọ',2,2,2,'2017-05-13 13:32:43','2017-05-13 13:32:43');

/*Table structure for table `shipments` */

DROP TABLE IF EXISTS `shipments`;

CREATE TABLE `shipments` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `product_id` int(10) unsigned NOT NULL,
  `bill_import_id` int(10) unsigned NOT NULL,
  `manufactured_date` timestamp NULL DEFAULT NULL,
  `expire_date` timestamp NULL DEFAULT NULL,
  `input_price` bigint(20) unsigned NOT NULL,
  `input_unit` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sale_price` bigint(20) unsigned NOT NULL,
  `sale_unit` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `exchange_value` int(10) unsigned NOT NULL DEFAULT '1',
  `input_quantity` int(10) unsigned NOT NULL,
  `quantity` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `shipments` */

insert  into `shipments`(`id`,`product_id`,`bill_import_id`,`manufactured_date`,`expire_date`,`input_price`,`input_unit`,`sale_price`,`sale_unit`,`exchange_value`,`input_quantity`,`quantity`,`created_at`,`updated_at`) values 
(1,1,1,'2017-04-04 14:17:18','2017-04-28 14:17:18',20000,'Hộp',2000,'Viên',50,10,0,'2017-04-27 14:17:18','2017-05-05 07:25:37'),
(2,2,2,'2017-01-20 14:22:39','2019-01-20 14:22:39',15000,'Hộp',25000,'Hộp',1,50,4,'2017-04-27 14:22:39','2017-05-07 15:51:16'),
(3,3,3,'2016-12-30 14:27:07','2019-12-30 14:27:07',45000,'Hộp',80000,'Hộp',1,100,100,'2017-04-27 14:27:07',NULL),
(4,4,3,'2016-11-25 14:27:07','2019-11-25 14:27:07',30000,'Hộp',8000,'Tuýp',10,60,55,'2017-04-27 14:27:07','2017-05-10 15:59:11'),
(5,5,4,'2017-04-20 15:07:38','2019-04-20 15:07:38',12000,'Hộp',24000,'Hộp',1,30,30,'2017-04-27 15:07:38',NULL),
(6,6,4,'2017-01-20 15:07:38','2019-01-20 15:07:38',32000,'Hộp',56000,'Hộp',1,60,60,'2017-04-27 15:07:38',NULL),
(7,7,5,'2017-04-04 15:09:38','2019-06-07 15:09:38',13000,'Hộp',28000,'Hộp',1,40,0,'2017-04-27 15:09:38','2017-05-09 16:15:11'),
(8,8,5,'2017-01-10 15:09:38','2019-06-06 15:09:38',15000,'Vỉ',36000,'Vỉ',1,50,50,'2017-04-27 15:09:38',NULL),
(9,1,5,'2017-01-02 15:09:38','2020-03-11 15:09:38',12000,'Hộp',25000,'Hộp',1,50,40,'2017-04-27 15:09:38','2017-05-09 16:14:32'),
(10,9,6,'2017-01-10 15:21:09','2019-01-10 15:21:09',50000,'Hộp',5000,'Viên',30,30,30,'2017-04-27 15:21:09',NULL),
(11,8,6,'2017-01-10 15:21:09','2019-01-08 15:21:09',15000,'Hộp',36000,'Hộp',1,30,30,'2017-04-27 15:21:09',NULL),
(12,10,7,NULL,NULL,10000,'Hộp',20000,'Hộp',1,10,8,'2017-04-27 15:37:42','2017-05-07 10:58:03'),
(13,11,8,'2017-04-27 15:39:14','2019-04-27 15:39:14',10000,'Hộp',20000,'Hộp',1,100,100,'2017-04-27 15:39:14',NULL),
(14,12,8,'2017-04-18 15:39:14','2019-04-23 15:39:14',50000,'Hộp',100000,'Hộp',1,100,100,'2017-04-27 15:39:14',NULL),
(15,13,9,'2017-04-12 15:52:20','2019-04-11 15:52:20',10000,'Hộp',50000,'Hộp',1,100,100,'2017-04-27 15:52:20',NULL),
(16,14,10,'2017-04-26 16:27:34','2017-10-31 16:27:34',70000,'Hộp',1000,'Viên',100,10,1000,'2017-04-28 16:27:34',NULL),
(17,15,11,'2017-05-02 03:31:36','2017-05-31 03:31:36',10000,'Vỉ',20000,'Hộp',20,20,387,'2017-05-05 03:31:36','2017-05-13 13:26:26'),
(18,17,12,'2017-05-01 15:33:01','2017-05-15 15:33:01',5000,'Hộp',10000,'Viên',10,2,0,'2017-05-07 15:33:01','2017-05-13 07:52:06'),
(19,18,13,'2017-05-08 15:35:56','2017-05-27 15:35:56',10000,'Hộp',15000,'Viên',1,1000,996,'2017-05-08 15:35:56','2017-05-08 15:36:20'),
(20,19,14,NULL,NULL,123123,'Hộp',2000,'Vỉ',12,123,1475,'2017-05-09 15:39:15','2017-05-09 15:39:31'),
(21,27,15,'2017-05-10 07:49:17','2017-05-24 07:49:17',20000,'Hộp',2000,'Viên',20,10,177,'2017-05-13 07:49:17','2017-05-13 13:10:07'),
(22,29,16,NULL,NULL,1000,'Hộp',10000,'Hộp',1,1000,1000,'2017-05-13 09:40:53',NULL),
(23,30,17,NULL,NULL,50000,'Hộp',20000,'Lọ',10,20,200,'2017-05-13 13:33:19',NULL);

/*Table structure for table `sub_pharmacies` */

DROP TABLE IF EXISTS `sub_pharmacies`;

CREATE TABLE `sub_pharmacies` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pharmacy_id` int(10) unsigned NOT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `sub_pharmacies` */

insert  into `sub_pharmacies`(`id`,`name`,`pharmacy_id`,`address`,`phone`,`created_at`,`updated_at`) values 
(1,'Olala',1,'Ha Noi','0973232734','2017-04-26 18:35:12','2017-04-26 18:35:12'),
(2,'Nhà thuốc anh Anh',2,'1','1','2017-04-27 04:14:32','2017-04-27 04:14:32'),
(3,'Hiếu Hạnh',3,'Láng Hạ - Đống Đa - Hà Nội','01647556187','2017-04-27 13:44:44','2017-04-27 13:44:44'),
(4,'Cầu giấy',3,'123 Xuân Thủy - Cầu Giấy','01682452784','2017-04-27 13:46:07','2017-04-27 13:46:07'),
(5,'Đống Đa',3,'Láng Hạ - Đống Đa - Hà Nội','01632565254','2017-04-27 13:46:24','2017-04-27 13:46:24'),
(6,'Hai Bà Trưng',3,'89 Minh Khai - Hai Bà Trưng','0964648379','2017-04-27 13:47:34','2017-04-27 13:47:34'),
(7,'Nhà Thuốc Tuấn Phương',4,'Hà Nội','0908837886','2017-04-27 14:46:44','2017-04-27 14:46:44'),
(8,'Tuấn Phương 2',4,'Hà Tĩnh','0908837886','2017-04-27 15:45:47','2017-04-27 15:45:47'),
(9,'Ahihi',1,'Hung Yen','0973232734','2017-04-28 16:28:09','2017-04-28 16:28:09'),
(10,'chi nhánh 2',2,'vui vẻ','01692921312','2017-05-05 02:54:57','2017-05-05 02:54:57'),
(11,'Đặng Đô',5,'55555555','5555555','2017-05-05 03:44:09','2017-05-05 03:44:09'),
(12,'Trường Giang',6,'Hà Nội','13245646798','2017-05-06 10:02:32','2017-05-06 10:02:32'),
(13,'gádgd',7,'dfasgwe','sadgasfgsa','2017-05-08 14:25:14','2017-05-08 14:25:14'),
(14,'Nhà Thuốc của Giang',9,'Đà Nẵng','0906203789','2017-05-09 15:03:48','2017-05-09 15:03:48'),
(15,'Chi nhánh 1',9,'Đà Nẵng 1','09062037891','2017-05-09 15:11:50','2017-05-09 15:11:50'),
(16,'Quang Thịnh',10,'56 Chùa Bộc','0912564853','2017-05-09 15:50:55','2017-05-09 15:50:55'),
(17,'abc',11,'123','123','2017-05-09 17:10:30','2017-05-09 17:10:30'),
(18,'a',11,'123','123','2017-05-09 17:19:29','2017-05-09 17:19:29'),
(19,'a',11,'123','123','2017-05-09 17:19:38','2017-05-09 17:19:38'),
(20,'Nhà thuốc Vân Xinh',12,'Cầu Giấy - Hà Nội','01655448178','2017-05-09 17:46:25','2017-05-09 17:46:25'),
(21,'HT',13,'Dm trái đất','01647556187','2017-05-12 12:29:39','2017-05-12 12:29:39');

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `pharmacy_id` int(10) unsigned NOT NULL,
  `sub_pharmacy_id` int(10) unsigned DEFAULT NULL,
  `account` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` tinyint(1) NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `birthday` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_account_unique` (`account`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `users` */

insert  into `users`(`id`,`pharmacy_id`,`sub_pharmacy_id`,`account`,`email`,`password`,`name`,`address`,`phone`,`role`,`remember_token`,`created_at`,`updated_at`,`birthday`) values 
(1,1,9,'manhmaluc','ngocmanh1712@gmail.com','$2y$10$84vhl/PhtHs9XWc19LMmU.gLQ79y1dvt.uzN0hMdn8NCNLCZUaxPK','Lưu Ngọc Mạnh','Ha Noi','0973232734',1,'UQaKUHqI61i3vTt70rtK3NJPLP31VYjQ5E2bhKLZdVStv7XB8edjU9i51tLO','2017-04-26 18:34:49','2017-05-09 15:06:12','1993-02-21'),
(2,2,2,'Anhnph','anhnph.dev@gmail.com','$2y$10$7bPkVr7OhfWt7wtwm//GBOrjL4AbpSFczygv75VyYGLX/kCMBoSXG','Nguyễn Phạm Hùng Anh','Hà Tĩnh','01692828568',1,'NL4P80fdfsIKQ4IKcsxjquPwXXbUCWTY9ykuAc9WYh5vv1t57LJ6fhQgGLFd','2017-04-27 04:13:46','2017-04-27 04:14:32','1993-02-21'),
(3,3,3,'hieunv','Hieu_dhd@gmail.com','$2y$10$XhKamSDNMBditBt4SU.bMOmNCigwEyF8ava5PQjaM.1wgw0m3EN/2','Nguyễn Văn Hiếu','Láng Hạ - Đống Đa - Hà Nội','0164755618',1,'9YcipaN0qjOGilOHk8Lgh2nQQcQ1iFlNByfiDFOPkkLnrZ6IgreiQ0PNZZgC','2017-04-27 13:44:13','2017-05-13 15:46:56','1993-02-21'),
(4,4,7,'itp','phuonghup91@gmail.com','$2y$10$rWdSz30xA845bi/y21VexevmFAh5yFvpDNKa84tRKeKs4rL1Lu4we','Nguyễn Như Phương','Hà Nội','0908837886',1,NULL,'2017-04-27 14:45:54','2017-04-27 14:46:44','1993-02-21'),
(5,3,3,'hongnt','nguyenthihong92@gmail.com','$2y$10$QFiDNakjlxzPNXMIVmh4peGM6gtzP3u/d6KDfJRw9qu1.2ONQe0oG','Nguyễn Thị Hồng','Cầu Giấy - Hà Nội','01632565254',2,'9wBd0CfYIpMW20z9jhyaMerVz9hsynrp2M5mOc0X7rtJrG1tvOWbIMDpVT6s','2017-04-27 15:22:27','2017-05-09 15:14:06',NULL),
(6,3,6,'linhnk','khanhlinh_93@gmail.com','$2y$10$PRtyG3ikPZdsE5GoJK/xnejxD1MhAdVnmiWokEflDKnL4Q3e.2/jC','Nguyễn Khánh Linh','Láng Hạ - Đống Đa - Hà Nội','01265245685',2,'of38v3bEHpb39Wyn37BeMPDQvWSBBNFlgl1tdBYx7sUWXwxy7OEfz7TnWLEN','2017-04-27 15:23:10','2017-04-27 15:23:10','1993-02-21'),
(7,3,5,'duyentt','Duyentrinh@gmail.com','$2y$10$Ym6kFupfrhmzu9uGZ822Ee6oUckYovhBvZFrrTtYuDIPFD6Tigwfe','Trịnh Thị Duyên','Hoàng Mai - Hà Nội','0964648379',2,NULL,'2017-04-27 15:24:06','2017-04-27 15:24:06','1993-02-21'),
(8,3,5,'maitt','maitran@gmail.com','$2y$10$4bY9C5ykKOrjUbn1hduBEOj7azvInZciuxFTP4Ooh3IuMUIVpSJJe','Trần Thị Mai','Thanh Xuân - Hà Nội','01685236987',2,NULL,'2017-04-27 15:24:50','2017-04-27 15:24:50','1993-02-21'),
(9,3,3,'haont','haont_232@gmail.com','$2y$10$duLgksjIJhkx63idj0PhLeAY6/plpV1icYYbtZaEp/NhZ3LzamHZK','Nguyễn Thị Hảo','Đống Đa - Hà Nội','01674568521',2,NULL,'2017-04-27 15:25:36','2017-04-27 15:25:36','1993-02-21'),
(10,3,5,'Maiht','mai_hoang_93@gmail.com','$2y$10$RhmtlQoFbx6Y6ak/OW30I.pKQxKcUkOf5inwryExVBY/5ueIlie0i','Hoàng Thị Mai','Nam Từ Liêm - Hà Nội','0986548574',2,NULL,'2017-04-27 15:26:40','2017-05-11 14:53:18','1993-02-21'),
(11,3,6,'nhungnt','nguyen_nhung_91@gmail.com','$2y$10$t24IjFYC937RGfgldFtW5e.n3LVX1xJGNUmDVBCfS/1Jyd/1kiPJ.','Nguyễn Thị Nhung','Cầu Diễn - Nam Từ Liêm','01648976548',2,NULL,'2017-04-27 15:27:43','2017-04-27 15:27:43','1993-02-21'),
(12,3,3,'thaontp','thaontp92@gmail.com','$2y$10$pJFCNFYKKp6f3ci72UHEieHsBnAq5YqpOKiBPUq3BUQli41Eioz2i','Nguyễn Thị Phương Thảo','Đống Đa - Hà Nội','01647556187',2,NULL,'2017-04-27 15:28:30','2017-04-27 15:28:30','1993-02-21'),
(14,3,3,'dodv','dodv212@gmail.com','$2y$10$mUtX/YAXZNruHsfWoKAOz.6b7lzj4l8xjZHhgbRzmGck8x.rfD.mS','Đặng Văn Đô','Hà nội','01682452784',2,'SB4CimuwaLawF3JJZXo1gAjpfcavP9bKTlICnMI7L2Z24MhZ5S5wntpAjyI0','2017-05-04 15:42:30','2017-05-04 15:42:30','1995-02-21'),
(15,3,3,'hunganh','dodv212@gmail.com','$2y$10$wrwf8/1NDwiaOrN/OsUnG.Z12uH4ibrqOHHnDl0C1tRzmdWf1UZii','Hùng anh','Cầu Giấy - Hà Nội','01647556187',1,'hdAosD66h2dI80mJ2OY9FEF5cZ1emAEfo9xl0JHq8DPH8OyyVsCKaZgY7kPp','2017-05-04 16:34:21','2017-05-13 10:06:03','21/02/1995'),
(16,2,10,'dodv1','aaa@gmail.com','$2y$10$fzaDP1ZLqznsg6YI./eub.6.777GlIH54c5TSQN8i6vaUjdD64D02','Đặng Văn Đô',NULL,NULL,2,NULL,'2017-05-05 02:53:09','2017-05-05 02:55:10',NULL),
(17,5,11,'dodv212','dodv212@gmail.com','$2y$10$3Q2gchJX2OtNpFiBejoHLe0zS5DdW6FJWgE2tIjGth9ADdUhdHgea','Đặng Văn Đô','132456','123456',1,'d1EcwrUpsWl67SkBR5RiaMA4ZQehCAjMuWayMcH9Vj2f3tCiXDqk6SSMObGK','2017-05-05 03:44:08','2017-05-05 03:44:09',NULL),
(18,6,12,'giangnpt','giangnpt@gmail.com','$2y$10$8nAUsM2gHjvb45Yr.ZxiFex2UDBgu.ofCYeVQVlvHqDw3PR5nHUSu','Nguyễn Phạm Trường Giang','hà nội','0123456799',1,'fT7iFj2iGqa7xuXovkkY3JeuqJPi20D7R6B9zDceHjcd5YXYXefV9wmjYFzn','2017-05-06 10:02:31','2017-05-06 10:02:32',NULL),
(19,7,13,'kjsadhf','kjsdhf@jkhfa','$2y$10$0ZSznHkVD4GXlSY2y1zd6u2zca/Tf/0vceRxz7nnjPSFIPSFvoJ8O','hjsfadk','sadfsadg','jksdhafk',1,'eYTnxvFr8vUdCpvJ9CaKhkYBqfeNsJKiqSAPKU3qT79y6FuKl9dVQL9nSKYc','2017-05-08 14:25:14','2017-05-08 14:25:15',NULL),
(20,9,14,'giangnguyenpham','giangnpt94@gmail.com','$2y$10$MCeu.BTrucAyGbZTfTeBd.FaDNsKkB52fjEPWc9FASscUZbR30d8G','Nguyen Pham Trường Giang','Đà Nẵng','0906203789',1,'R9HLadXXW3uVNxo3LBJraprp1n4GxhksB5uuFsB1cj06ibQEn3lzqImiQJzd','2017-05-09 15:03:47','2017-05-09 15:03:49',NULL),
(21,10,16,'thinhtq','thinhtq@gmail.com','$2y$10$jgTrDvl9HRmAlI5tcDmPlu1/6bh88um0x36Pl36AF/3Qinu49OMVG','Trác Quang Thịnh','Hà Nội','0912564853',1,'3CV4vmMu3NATXBdN8Y9KzXacuE1ygCBwSWz8Qz1fX35FM6OnFf3hLpUYVJPM','2017-05-09 15:50:54','2017-05-09 15:50:55',NULL),
(22,11,18,'a','a@gmail.com','$2y$10$xGL0BQY32yObgXcGoG4I6OBkif8Eyv8sadLkTpLqOeRlWklLmXfAq','a','123','123',1,NULL,'2017-05-09 17:10:30','2017-05-09 17:27:13',NULL),
(23,11,18,'c','c@gmail.com','$2y$10$Z8dLKvBk4P46tjBGlZpYKu7t45ES1QEf34pMEPmlPcwJkxSDHuZiO','c','a','1',2,NULL,'2017-05-09 17:26:08','2017-05-09 17:27:13','12'),
(24,12,20,'nuvatica','ntcv.uet@gmail.com','$2y$10$mG4Sm7u2dmR7boGFATTD4u6ys.Z/YW6fHjMnHiZzWvekqgjT2CWr2','Nguyễn Thị Cẩm Vân','Hà Nội','01655448178',1,'dxahZ3Vg8rjyBIOTysSjXopb7MRdKTc8AuQoB5HXyKw2jfzjSSYqZQK5vZNd','2017-05-09 17:46:25','2017-05-09 17:46:25',NULL),
(25,13,21,'htcrazy','hieunguyenvandkh@gmail.com','$2y$10$EaYbZp6oKCr4feCM1HdqluUI9ZAAxvz.O2BcJK1.1ZVwFWBRlSFkK','Hiếu','Trái đất','01647556187',1,NULL,'2017-05-12 12:29:39','2017-05-12 12:29:39',NULL),
(26,2,10,'phucnh','phucnh@gmail.com','$2y$10$Sh59lu2Y1jdP5UG8Qj.G2eYSL8Eif8NatHBqjk4UQjys/7XNNuQ2q','Nguyễn Hoàng Phúc',NULL,NULL,2,'DSG5GR9YRR1Un4JZRfZkL4yoNfEJcA4GAHbXKXZ3pPWKtxjCEwwNLe5mXprn','2017-05-13 13:36:12','2017-05-13 13:51:29','05/19/1993');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
