-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               8.0.33 - MySQL Community Server - GPL
-- Server OS:                    Win64
-- HeidiSQL Version:             12.0.0.6468
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for techmart
CREATE DATABASE IF NOT EXISTS `techmart` /*!40100 DEFAULT CHARACTER SET utf8mb3 */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `techmart`;

-- Dumping structure for table techmart.admin
CREATE TABLE IF NOT EXISTS `admin` (
  `email` varchar(100) NOT NULL,
  `password` varchar(45) DEFAULT NULL,
  `fname` varchar(45) DEFAULT NULL,
  `lname` varchar(45) DEFAULT NULL,
  `vaarification_code` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- Dumping data for table techmart.admin: ~0 rows (approximately)
REPLACE INTO `admin` (`email`, `password`, `fname`, `lname`, `vaarification_code`) VALUES
	('janaka@gmail.com', '12345', 'Janaka', 'Sangeeth', NULL);

-- Dumping structure for table techmart.brand
CREATE TABLE IF NOT EXISTS `brand` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=77 DEFAULT CHARSET=utf8mb3;

-- Dumping data for table techmart.brand: ~76 rows (approximately)
REPLACE INTO `brand` (`id`, `name`) VALUES
	(1, 'ASUS'),
	(2, 'DELL'),
	(3, 'ACER'),
	(4, 'MSI'),
	(5, 'HP'),
	(6, 'TOSHIBA'),
	(7, 'LENOVO'),
	(8, 'ZEBEX'),
	(9, 'GENIUS'),
	(10, 'AK'),
	(11, 'SAMSUNG'),
	(12, 'CANON'),
	(13, 'AOPEN'),
	(14, 'COLORSIT'),
	(15, 'LANSAN'),
	(16, 'INTEL'),
	(17, 'KINGSTON'),
	(18, 'EPSON'),
	(19, 'ARMAGGEDDON'),
	(20, 'GAMEMAX'),
	(21, 'ALCATROZ'),
	(22, 'THERMALTAKE'),
	(23, 'HAVIT'),
	(24, 'MICROSOFT'),
	(25, 'DAHUA'),
	(26, 'ADATA'),
	(27, 'SANDISK'),
	(28, 'TRANSCEND'),
	(29, 'SEAGATE'),
	(30, 'LOGITECH'),
	(31, 'CREATIVE'),
	(32, 'APPLE'),
	(33, 'RAPOO'),
	(34, 'GIGABYTE'),
	(35, 'CORSAIR'),
	(36, 'TECHPRO'),
	(37, 'BIOSTAR'),
	(38, 'HUAWEI'),
	(39, 'ZTE'),
	(40, 'VIEWSONIC'),
	(41, 'JEDEL'),
	(42, 'SONICGEAR'),
	(43, 'JBL'),
	(44, 'MICROLAB'),
	(45, 'DCP'),
	(46, 'ZONERICH'),
	(47, 'ROMOSS'),
	(48, 'AMD'),
	(49, 'LEXAR'),
	(50, 'ZEBRONICS'),
	(51, 'XIAOMI'),
	(52, 'MICROPACK'),
	(53, 'TEAM'),
	(54, 'OPPO'),
	(55, 'PNY'),
	(56, 'AZEK'),
	(57, 'NETAC'),
	(58, 'IMPERION'),
	(59, 'FOR INTEL'),
	(60, 'ESONIC'),
	(61, 'KASPERSKY'),
	(62, 'WD'),
	(63, 'V-COLOR'),
	(64, 'MERCUSYS'),
	(65, 'GAMEDIAS'),
	(66, 'ULTRADISK'),
	(67, 'KUMI'),
	(68, 'TP-LINK'),
	(69, 'UNBRANDED'),
	(70, 'SYMBOL'),
	(71, 'Baseus'),
	(72, 'BOYA'),
	(73, 'WIWU'),
	(74, 'LDNIO'),
	(75, 'ANKER'),
	(76, 'No Brand');

-- Dumping structure for table techmart.brand_has_model
CREATE TABLE IF NOT EXISTS `brand_has_model` (
  `id` int NOT NULL AUTO_INCREMENT,
  `model_id` int NOT NULL,
  `brand_id` int NOT NULL,
  `Sub_category_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_brand_has_model_model1_idx` (`model_id`),
  KEY `fk_brand_has_model_brand1_idx` (`brand_id`),
  KEY `fk_brand_has_model_Sub_category1_idx` (`Sub_category_id`),
  CONSTRAINT `fk_brand_has_model_brand1` FOREIGN KEY (`brand_id`) REFERENCES `brand` (`id`),
  CONSTRAINT `fk_brand_has_model_model1` FOREIGN KEY (`model_id`) REFERENCES `model` (`id`),
  CONSTRAINT `fk_brand_has_model_Sub_category1` FOREIGN KEY (`Sub_category_id`) REFERENCES `sub_category` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb3;

-- Dumping data for table techmart.brand_has_model: ~17 rows (approximately)
REPLACE INTO `brand_has_model` (`id`, `model_id`, `brand_id`, `Sub_category_id`) VALUES
	(11, 1, 5, 1),
	(15, 2, 2, 1),
	(16, 2, 5, 1),
	(17, 2, 1, 1),
	(18, 2, 6, 1),
	(19, 2, 3, 1),
	(20, 2, 62, 1),
	(21, 3, 1, 2),
	(22, 4, 1, 2),
	(23, 5, 1, 2),
	(24, 6, 7, 2),
	(25, 7, 3, 2),
	(26, 2, 30, 26),
	(27, 2, 4, 4),
	(28, 2, 23, 26),
	(29, 2, 76, 26),
	(30, 1, 12, 1);

-- Dumping structure for table techmart.cart
CREATE TABLE IF NOT EXISTS `cart` (
  `id` int NOT NULL AUTO_INCREMENT,
  `qty` int DEFAULT NULL,
  `product_id` int NOT NULL,
  `user_email` varchar(100) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_cart_product1_idx` (`product_id`),
  KEY `fk_cart_user1_idx` (`user_email`),
  CONSTRAINT `fk_cart_product1` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`),
  CONSTRAINT `fk_cart_user1` FOREIGN KEY (`user_email`) REFERENCES `user` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb3;

-- Dumping data for table techmart.cart: ~4 rows (approximately)
REPLACE INTO `cart` (`id`, `qty`, `product_id`, `user_email`) VALUES
	(13, 1, 65, 'ben@gmail.com'),
	(14, 1, 67, 'ben@gmail.com'),
	(18, 1, 48, 'janakasangeethjava3@gmail.com');

-- Dumping structure for table techmart.category
CREATE TABLE IF NOT EXISTS `category` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  `icon_path` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb3;

-- Dumping data for table techmart.category: ~8 rows (approximately)
REPLACE INTO `category` (`id`, `name`, `icon_path`) VALUES
	(1, 'LAPTOP AND ACCESSORIES', 'reso\\cat_icon\\1.svg'),
	(2, 'GAMING', 'reso\\cat_icon\\2.svg'),
	(3, 'COMPUTER AND ACCESSORIES', 'reso\\cat_icon\\3.svg'),
	(4, 'NETWORKING', 'reso\\cat_icon\\4.svg'),
	(5, 'OFFICE AUTOMATION', 'reso\\cat_icon\\5.svg'),
	(6, 'SECURITY SOLUTIONS', 'reso\\cat_icon\\6.svg'),
	(7, 'AUDIO & VISUAL', 'reso\\cat_icon\\7.svg'),
	(8, 'PHONES & TABS', 'reso\\cat_icon\\8.svg');

-- Dumping structure for table techmart.city
CREATE TABLE IF NOT EXISTS `city` (
  `id` int NOT NULL AUTO_INCREMENT,
  `city_name` varchar(45) DEFAULT NULL,
  `district_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_city_district1_idx` (`district_id`),
  CONSTRAINT `fk_city_district1` FOREIGN KEY (`district_id`) REFERENCES `district` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=utf8mb3;

-- Dumping data for table techmart.city: ~38 rows (approximately)
REPLACE INTO `city` (`id`, `city_name`, `district_id`) VALUES
	(1, 'Colombo', 1),
	(2, 'Dehiwala-Mount Lavinia', 1),
	(3, 'Moratuwa', 1),
	(4, 'Sri Jayawardenepura Kotte', 1),
	(5, 'Negombo', 2),
	(6, 'Kelaniya', 2),
	(7, 'Gampaha', 2),
	(8, 'Kalutara', 3),
	(9, 'Panadura', 3),
	(10, 'Beruwala', 3),
	(11, 'Kandy', 4),
	(12, 'Peradeniya', 4),
	(13, 'Gampola', 4),
	(14, 'Matale', 5),
	(15, 'Dambulla', 5),
	(16, 'Nuwara Eliya', 6),
	(17, 'Hatton', 6),
	(18, 'Bandarawela', 6),
	(19, 'Galle', 7),
	(20, 'Matara', 8),
	(21, 'Hambantota', 9),
	(22, 'Jaffna', 10),
	(23, 'Kilinochchi', 10),
	(24, 'Mannar', 11),
	(25, 'Vavuniya', 12),
	(26, 'Batticaloa', 13),
	(27, 'Ampara', 14),
	(28, 'Trincomalee', 15),
	(29, 'Kurunegala', 16),
	(30, 'Puttalam', 17),
	(31, 'Anuradhapura', 18),
	(32, 'Polonnaruwa', 19),
	(33, 'Badulla', 20),
	(34, 'Monaragala', 21),
	(35, 'Ratnapura', 22),
	(36, 'Balangoda', 22),
	(37, 'Kegalle', 23),
	(38, 'Mawanella', 23);

-- Dumping structure for table techmart.color
CREATE TABLE IF NOT EXISTS `color` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb3;

-- Dumping data for table techmart.color: ~22 rows (approximately)
REPLACE INTO `color` (`id`, `name`) VALUES
	(1, 'Red'),
	(2, 'Blue'),
	(3, 'Green'),
	(4, 'Yellow'),
	(5, 'Orange'),
	(6, 'Purple'),
	(7, 'Pink'),
	(8, 'Brown'),
	(9, 'Black'),
	(10, 'White'),
	(11, 'Gray'),
	(12, 'Silver'),
	(13, 'Gold'),
	(14, 'Beige'),
	(15, 'Turquoise'),
	(16, 'Navy'),
	(17, 'Maroon'),
	(18, 'Lime'),
	(19, 'Teal'),
	(20, 'Cyan'),
	(21, 'Magenta'),
	(22, 'Indigo');

-- Dumping structure for table techmart.condition
CREATE TABLE IF NOT EXISTS `condition` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb3;

-- Dumping data for table techmart.condition: ~2 rows (approximately)
REPLACE INTO `condition` (`id`, `name`) VALUES
	(1, 'Brandnew'),
	(2, 'Used');

-- Dumping structure for table techmart.district
CREATE TABLE IF NOT EXISTS `district` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  `province_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_district_province1_idx` (`province_id`),
  CONSTRAINT `fk_district_province1` FOREIGN KEY (`province_id`) REFERENCES `province` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb3;

-- Dumping data for table techmart.district: ~25 rows (approximately)
REPLACE INTO `district` (`id`, `name`, `province_id`) VALUES
	(1, 'Colombo', 9),
	(2, 'Gampaha', 9),
	(3, 'Kalutara', 9),
	(4, 'Kandy', 1),
	(5, 'Matale', 1),
	(6, 'Nuwara Eliya', 1),
	(7, 'Galle', 7),
	(8, 'Matara', 7),
	(9, 'Hambantota', 7),
	(10, 'Jaffna', 3),
	(11, 'Kilinochchi', 3),
	(12, 'Mannar', 3),
	(13, 'Mullaitivu', 3),
	(14, 'Vavuniya', 3),
	(15, 'Batticaloa', 2),
	(16, 'Ampara', 2),
	(17, 'Trincomalee', 2),
	(18, 'Kurunegala', 5),
	(19, 'Puttalam', 5),
	(20, 'Anuradhapura', 4),
	(21, 'Polonnaruwa', 4),
	(22, 'Badulla', 8),
	(23, 'Monaragala', 8),
	(24, 'Ratnapura', 6),
	(25, 'Kegalle', 6);

-- Dumping structure for table techmart.feedbacks
CREATE TABLE IF NOT EXISTS `feedbacks` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_email` varchar(100) NOT NULL,
  `product_id` int NOT NULL,
  `feedback` text,
  `feedback_type_id` int NOT NULL,
  `stars_id` int NOT NULL,
  `date` datetime DEFAULT NULL,
  `status` int DEFAULT NULL,
  `invoice_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_feedbacks_product1_idx` (`product_id`),
  KEY `fk_feedbacks_user1_idx` (`user_email`),
  KEY `fk_feedbacks_feedback_type1_idx` (`feedback_type_id`),
  KEY `fk_feedbacks_stars1_idx` (`stars_id`),
  KEY `fk_feedbacks_invoice1_idx` (`invoice_id`),
  CONSTRAINT `fk_feedbacks_feedback_type1` FOREIGN KEY (`feedback_type_id`) REFERENCES `feedback_type` (`id`),
  CONSTRAINT `fk_feedbacks_invoice1` FOREIGN KEY (`invoice_id`) REFERENCES `invoice` (`id`),
  CONSTRAINT `fk_feedbacks_product1` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`),
  CONSTRAINT `fk_feedbacks_stars1` FOREIGN KEY (`stars_id`) REFERENCES `stars` (`id`),
  CONSTRAINT `fk_feedbacks_user1` FOREIGN KEY (`user_email`) REFERENCES `user` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- Dumping data for table techmart.feedbacks: ~0 rows (approximately)

-- Dumping structure for table techmart.feedback_img
CREATE TABLE IF NOT EXISTS `feedback_img` (
  `path` varchar(200) NOT NULL,
  `feedbacks_id` int NOT NULL,
  PRIMARY KEY (`path`),
  KEY `fk_feedback_img_feedbacks1_idx` (`feedbacks_id`),
  CONSTRAINT `fk_feedback_img_feedbacks1` FOREIGN KEY (`feedbacks_id`) REFERENCES `feedbacks` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- Dumping data for table techmart.feedback_img: ~0 rows (approximately)

-- Dumping structure for table techmart.feedback_type
CREATE TABLE IF NOT EXISTS `feedback_type` (
  `id` int NOT NULL AUTO_INCREMENT,
  `type` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- Dumping data for table techmart.feedback_type: ~0 rows (approximately)

-- Dumping structure for table techmart.gender
CREATE TABLE IF NOT EXISTS `gender` (
  `id` int NOT NULL,
  `gen` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- Dumping data for table techmart.gender: ~2 rows (approximately)
REPLACE INTO `gender` (`id`, `gen`) VALUES
	(1, 'Male'),
	(2, 'Female');

-- Dumping structure for table techmart.images
CREATE TABLE IF NOT EXISTS `images` (
  `code` varchar(200) NOT NULL,
  `product_id` int NOT NULL,
  PRIMARY KEY (`code`),
  KEY `fk_images_product1_idx` (`product_id`),
  CONSTRAINT `fk_images_product1` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- Dumping data for table techmart.images: ~32 rows (approximately)
REPLACE INTO `images` (`code`, `product_id`) VALUES
	('reso//product_images//2_0_667813281795e.jpeg', 48),
	('reso//product_images//2_0_667813e674ad5.jpeg', 49),
	('reso//product_images//2_0_66781422eb4cd.jpeg', 50),
	('reso//product_images//2_0_667814a0ce065.jpeg', 51),
	('reso//product_images//2_0_667815cbc26d3.png', 52),
	('reso//product_images//2_0_6678160cdc84e.png', 53),
	('reso//product_images//2_0_66781659b331d.png', 54),
	('reso//product_images//2_0_6678171fd6312.png', 55),
	('reso//product_images//2_1_6678171fd820e.png', 55),
	('reso//product_images//3_0_667817b8d2d8a.png', 56),
	('reso//product_images//3_1_667817b8d4798.png', 56),
	('reso//product_images//3_2_667817b8d562f.png', 56),
	('reso//product_images//4_0_667818328e84f.png', 57),
	('reso//product_images//4_1_667818329005f.png', 57),
	('reso//product_images//4_2_6678183291626.png', 57),
	('reso//product_images//5_0_6678189ad3d6d.png', 58),
	('reso//product_images//5_1_6678189ad5953.png', 58),
	('reso//product_images//6_0_667830f8ba1c6.png', 59),
	('reso//product_images//6_1_667830f8bc44c.png', 59),
	('reso//product_images//7_0_667832db92a6d.png', 60),
	('reso//product_images//7_1_667832db9590d.png', 60),
	('reso//product_images//2_0_6678334241936.png', 61),
	('reso//product_images//2_0_667a46e5ef7e9.jpeg', 62),
	('reso//product_images//2_1_667a46e5f2439.png', 62),
	('reso//product_images//2_0_667a472a60fcb.png', 63),
	('reso//product_images//2_1_667a472a62511.png', 63),
	('reso//product_images//2_0_667a476311181.png', 64),
	('reso//product_images//2_0_667a47b866bb5.png', 65),
	('reso//product_images//2_0_667a5ffcbfff0.png', 66),
	('reso//product_images//2_0_667a604e8c418.png', 67),
	('reso//product_images//2_1_667a604e8da0a.png', 67),
	('reso//product_images//2_2_667a604e8f04f.png', 67);

-- Dumping structure for table techmart.invoice
CREATE TABLE IF NOT EXISTS `invoice` (
  `id` int NOT NULL AUTO_INCREMENT,
  `order_id` varchar(45) DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `total` double DEFAULT NULL,
  `delivary` double DEFAULT NULL,
  `status` int DEFAULT NULL,
  `user_email` varchar(100) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_invoice_user1_idx` (`user_email`),
  CONSTRAINT `fk_invoice_user1` FOREIGN KEY (`user_email`) REFERENCES `user` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb3;

-- Dumping data for table techmart.invoice: ~7 rows (approximately)
REPLACE INTO `invoice` (`id`, `order_id`, `date`, `total`, `delivary`, `status`, `user_email`) VALUES
	(4, 'ITM285586', '2024-06-24 13:28:56', 28750, 250, 0, 'janakasangeethjava3@gmail.com'),
	(5, 'ITM623324', '2024-06-24 13:55:24', 14950, 250, 0, 'janakasangeethjava3@gmail.com'),
	(6, 'ITM840959', '2024-06-24 20:26:58', 18450, 250, 0, 'janakasangeethjava3@gmail.com'),
	(7, 'ITM125825', '2024-06-25 20:46:48', 11650, 250, 0, 'ben@gmail.com'),
	(8, 'ITM983564', '2024-06-28 00:13:43', 28750, 250, 0, 'janakasangeethjava3@gmail.com'),
	(9, 'ITM453541', '2024-06-28 09:37:49', 4050, 250, 0, 'janakasangeethjava3@gmail.com'),
	(10, 'ITM952332', '2024-06-28 12:48:21', 8050, 250, 0, 'janakasangeethjava3@gmail.com');

-- Dumping structure for table techmart.invoice_items
CREATE TABLE IF NOT EXISTS `invoice_items` (
  `id` int NOT NULL AUTO_INCREMENT,
  `invoice_id` int NOT NULL,
  `product_id` int DEFAULT NULL,
  `qty` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_invoice_items_invoice1_idx` (`invoice_id`),
  CONSTRAINT `fk_invoice_items_invoice1` FOREIGN KEY (`invoice_id`) REFERENCES `invoice` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb3;

-- Dumping data for table techmart.invoice_items: ~7 rows (approximately)
REPLACE INTO `invoice_items` (`id`, `invoice_id`, `product_id`, `qty`) VALUES
	(6, 4, 54, 1),
	(7, 5, 49, 2),
	(8, 6, 52, 2),
	(9, 7, 62, 1),
	(10, 8, 66, 1),
	(11, 9, 65, 1),
	(12, 10, 48, 2);

-- Dumping structure for table techmart.mini_category
CREATE TABLE IF NOT EXISTS `mini_category` (
  `id` int NOT NULL AUTO_INCREMENT,
  `mini_name` varchar(45) DEFAULT NULL,
  `Sub_category_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_mini_category_Sub_category1_idx` (`Sub_category_id`),
  CONSTRAINT `fk_mini_category_Sub_category1` FOREIGN KEY (`Sub_category_id`) REFERENCES `sub_category` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=113 DEFAULT CHARSET=utf8mb3;

-- Dumping data for table techmart.mini_category: ~98 rows (approximately)
REPLACE INTO `mini_category` (`id`, `mini_name`, `Sub_category_id`) VALUES
	(1, 'NOTEBOOK ADAPTERS', 1),
	(2, 'NOTEBOOK BATTERIES', 1),
	(3, 'NOTEBOOK DVD/BLUE-RAY DRIVERS', 1),
	(4, 'NOTEBOOK HARD DISK', 1),
	(5, 'NOTEBOOK RAMS', 1),
	(6, 'NOTEBOOK FAN', 1),
	(7, 'ASUS', 2),
	(8, 'HP', 2),
	(9, 'ACER', 2),
	(10, 'DELL', 2),
	(11, 'LENOVO', 2),
	(12, 'HUAWEI', 2),
	(13, 'MACBOOKS', 2),
	(14, 'INTEL', 2),
	(15, 'LENOVO GAMING', 3),
	(16, 'ACER GAMING', 3),
	(17, 'MSI LAPTOP', 3),
	(18, 'ASUS GAMING', 3),
	(19, 'DELL GAMING', 3),
	(20, 'CASING FAN', 4),
	(21, 'GAMING CASING', 4),
	(22, 'COOLING SYSTEMS', 4),
	(23, 'JOYSTICKS AND WHEELS', 4),
	(24, 'GAMING HEADSETS', 4),
	(25, 'GAME MOUSE, KEYBOARD', 4),
	(26, 'GAMING CHAIR', 4),
	(27, '250W- 550W POWER SUPPLY', 5),
	(28, '550W-800W POWER SUPPLY', 5),
	(29, 'ABOVE 800W POWER SUPPLY', 5),
	(44, 'TOOLS & ACCESSORIES', 7),
	(45, 'DONGLE', 7),
	(46, 'VGA/HDMI SPLITTERS', 7),
	(47, 'POWER CABLE', 7),
	(48, 'USB & PRINTER CABLE', 7),
	(49, 'VGA CABLE', 7),
	(50, 'AUDIO CABLE', 7),
	(51, 'CONVERTERS', 7),
	(52, 'HDMI CABLES', 7),
	(53, 'KVM SWITCHES & CABLES', 7),
	(54, 'PARALLEL & SERIAL CABLE', 7),
	(55, 'PCI IO CARDS', 7),
	(56, 'PCIEX IO CARDS', 7),
	(57, 'HUBS', 7),
	(58, 'UPS BATTERIES', 8),
	(59, 'LINE INTERACTIVE UPS', 8),
	(60, 'ONLINE UPS', 8),
	(61, 'FLASH DRIVE, SD CARDS', 24),
	(62, 'SSD AND M.2', 24),
	(63, 'EXTERNAL HARD DISK', 24),
	(64, 'INTERNAL HARD DISK', 24),
	(65, 'ACCESS POINTS', 10),
	(66, 'POWERLINE ADAPTERS', 10),
	(67, 'WI-FI EXTENDERS', 10),
	(68, 'SOHO SWITCHES', 10),
	(69, 'PATCH CABLES', 11),
	(70, 'UTP CABLES', 11),
	(71, 'POE OTHER', 11),
	(72, 'PATCH PANELS', 12),
	(73, 'CONNECTORS AND ADDONS', 12),
	(74, 'NETWORK RACKS', 12),
	(75, 'NETWORK TOOLS', 12),
	(76, 'FINGER PRINT', 13),
	(77, 'FACE RECOGNITION', 13),
	(78, 'OHP PROJECTORS', 14),
	(79, 'PORTABLE PROJECTORS', 14),
	(80, 'BARCODE SCANNERS', 15),
	(81, 'POS PRINTERS', 15),
	(82, 'CASH DRAWER', 15),
	(83, 'CASH REGISTER', 15),
	(84, 'CASH COUNTERS', 15),
	(85, 'CUSTOMER DISPLAY', 15),
	(86, 'TOUCH SYSTEMS', 15),
	(87, 'SCANNERS', 16),
	(88, 'LASER PRINTERS', 16),
	(89, 'INK TANK PRINTERS', 16),
	(90, 'ALL-IN-ONE PRINTER', 16),
	(91, 'INKJET PRINTERS', 16),
	(92, 'DOT MATRIX PRINTERS', 16),
	(93, 'BARCODE PRINTERS', 16),
	(94, 'BUSINESS PRINTERS', 16),
	(95, 'POWER BANKS', 21),
	(96, 'CHARGING DEVICES', 21),
	(97, 'PHONE CABLES', 21),
	(98, 'MOBILE HEAD PHONE AND EAR PHONES', 21),
	(99, 'MOBILE BLUETOOTH HEADSET', 21),
	(100, 'WIRELESS CHARGERS', 21),
	(101, 'MEMORY CARDS', 21),
	(102, 'NOKIA PHONES', 22),
	(103, 'HUAWEI PHONE', 22),
	(104, 'XIAOMI PHONES', 22),
	(105, 'VIVO PHONES', 22),
	(106, 'SAMSUNG PHONES', 22),
	(107, 'APPLE iPHONE', 22),
	(108, 'OPPO PHONES', 22),
	(109, 'ZTE PHONE', 22),
	(110, 'REALME', 22),
	(111, 'TCL PHONES', 22),
	(112, 'HeadPhones', 26);

-- Dumping structure for table techmart.model
CREATE TABLE IF NOT EXISTS `model` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb3;

-- Dumping data for table techmart.model: ~7 rows (approximately)
REPLACE INTO `model` (`id`, `name`) VALUES
	(1, 'HP Pavilion'),
	(2, 'No Model'),
	(3, 'X1504V'),
	(4, 'UP3404V'),
	(5, 'Vivobook 15 X513'),
	(6, '5500U'),
	(7, 'A515');

-- Dumping structure for table techmart.product
CREATE TABLE IF NOT EXISTS `product` (
  `id` int NOT NULL AUTO_INCREMENT,
  `price` double DEFAULT NULL,
  `qty` int DEFAULT NULL,
  `description` text,
  `title` varchar(200) DEFAULT NULL,
  `datetime_added` datetime DEFAULT NULL,
  `delivery_fee_colombo` double DEFAULT NULL,
  `delivery_fee_other` double DEFAULT NULL,
  `color_id` int NOT NULL,
  `condition_id` int NOT NULL,
  `status_id` int NOT NULL,
  `admin_email` varchar(100) NOT NULL,
  `mini_category_id` int NOT NULL,
  `brand_has_model_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_product_color1_idx` (`color_id`),
  KEY `fk_product_condition1_idx` (`condition_id`),
  KEY `fk_product_status1_idx` (`status_id`),
  KEY `fk_product_admin1_idx` (`admin_email`),
  KEY `fk_product_mini_category1_idx` (`mini_category_id`),
  KEY `fk_product_brand_has_model1_idx` (`brand_has_model_id`),
  CONSTRAINT `fk_product_admin1` FOREIGN KEY (`admin_email`) REFERENCES `admin` (`email`),
  CONSTRAINT `fk_product_brand_has_model1` FOREIGN KEY (`brand_has_model_id`) REFERENCES `brand_has_model` (`id`),
  CONSTRAINT `fk_product_color1` FOREIGN KEY (`color_id`) REFERENCES `color` (`id`),
  CONSTRAINT `fk_product_condition1` FOREIGN KEY (`condition_id`) REFERENCES `condition` (`id`),
  CONSTRAINT `fk_product_mini_category1` FOREIGN KEY (`mini_category_id`) REFERENCES `mini_category` (`id`),
  CONSTRAINT `fk_product_status1` FOREIGN KEY (`status_id`) REFERENCES `status` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=73 DEFAULT CHARSET=utf8mb3;

-- Dumping data for table techmart.product: ~21 rows (approximately)
REPLACE INTO `product` (`id`, `price`, `qty`, `description`, `title`, `datetime_added`, `delivery_fee_colombo`, `delivery_fee_other`, `color_id`, `condition_id`, `status_id`, `admin_email`, `mini_category_id`, `brand_has_model_id`) VALUES
	(48, 3900, 7, 'AC input voltage: 100 ~ 240V 50 ~ 60Hz\r\nDC output voltage: 19V\r\nDC output current: 4.74A\r\nPower: 90W\r\nConnector size : 5.5mm x 2.5mm (ref to the picture)', 'NOTEBOOK CHARGERS - FOR ASUS 19V 4.74A', '2024-06-23 17:50:56', 100, 250, 9, 1, 1, 'janaka@gmail.com', 1, 17),
	(49, 7350, -1, 'Part numbers:\r\n3ICR19/66-2 HSTNN-Q88C-5\r\n633733-1A1 HSTNN-Q89C\r\n633733-321 HSTNN-XB2E\r\n633805-001 HSTNN-XB2F\r\n650938-001 HSTNN-XB2G\r\nHSTNN-DB2R HSTNN-XB2H\r\nHSTNN-I02C HSTNN-XB2I\r\nHSTNN-I97C-3 HSTNN-XB2N\r\nHSTNN-I97C-4 HSTNN-XB2O\r\nHSTNN-I98C-5 HSTNN-XB2R\r\nHSTNN-I99C-3 HSTNN-XB2T\r\nHSTNN-I99C-4 HSTNN-XB3C\r\nHSTNN-IB2R LC32BA122\r\nHSTNN-LB2R PR06\r\nHSTNN-OB2R PR09\r\nHSTNN-Q87C-4 QK646AA\r\nHSTNN-Q87C-5 QK646U\r\nHSTNN-Q88C-4 \r\n\r\nCompatible laptop models:\r\nHP:\r\nProBook 4330s ProBook 4331s\r\nProBook 4430s ProBook 4431s\r\nProBook 4435s Probook 4436s\r\nProBook 4440s ProBook 4441s\r\nProBook 4446s ProBook 4530s\r\nProBook 4535s ProBook 4540s\r\nProbook 4545s ProBook 4740s', 'NOTEBOOK BATTERY - FOR HP (PR06) 4330s 4331s 4430s-(6m)', '2024-06-23 17:54:06', 100, 250, 9, 1, 1, 'janaka@gmail.com', 2, 16),
	(50, 5700, 9, 'Compatible Models\r\nToshiba Satellite C850 C855D C855-S5206 C855-S5214 PA5024U-1BRS', 'NOTEBOOK BATTERY - FOR TOSHIBA PA5024U C850', '2024-06-23 17:55:06', 100, 250, 11, 1, 1, 'janaka@gmail.com', 2, 18),
	(51, 4900, 1, 'Compatible Models:\r\n\r\nAspire 2930 Aspire 4715Z Aspire 4935\r\nAspire 2930G Aspire 4720 Aspire 4935G\r\nAspire 2930Z Aspire 4720G Aspire 5236\r\nAspire 4230 Aspire 4720Z Aspire 5335\r\nAspire 4235 Aspire 4720ZG Aspire 5536\r\nAspire 4310 Aspire 4730 Aspire 5536G\r\nAspire 4315 Aspire 4730Z Aspire 5735\r\nAspire 4320 Aspire 4730ZG Aspire 5735Z\r\nAspire 4330 Aspire 4736 Aspire 5738\r\nAspire 4336 Aspire 4736G Aspire 5738G\r\nAspire 4520 Aspire 4736Z Aspire 5738Z\r\nAspire 4520G Aspire 4736ZG Aspire 5738ZG\r\nAspire 4530 Aspire 4740G Aspire 5740\r\nAspire 4535G Aspire 4920 Aspire 5740D 3D\r\nAspire 4710 Aspire 4920G Aspire 5740DG\r\nAspire 4710G Aspire 4930 Aspire 5740G\r\nAspire 4710Z Aspire 4930G', 'NOTEBOOK BATTERY - FOR ACER ASPIRE 4710/ 4920', '2024-06-23 17:57:12', 100, 250, 2, 1, 1, 'janaka@gmail.com', 1, 19),
	(52, 9100, 7, 'Part Number	WD5000LPCX\r\nCapacity	500GB\r\nInterface	SATA 6 Gb/s\r\nUser Sectors per Drive	976,773,168\r\nAdvanced Format (AF)	Yes\r\nForm Factor	2.5-inch\r\nRoHS Compliant	Yes\r\nPERFORMANCE\r\nData Transfer Rates\r\nInterface Speed\r\nInternal Transfer Rate (max)	3 Gb/s\r\n147 MB/s\r\nCache (MB)	8\r\nAverage Latency (ms)	5.5\r\nRotational Speed	5400\r\nAverage Drive Ready Time (sec)	2.8\r\nRELIABILITY/DATA INTEGRITY\r\nLoad/Unload Cycles	600,000\r\nNon-Recoverable Read Errors per Bits Read	<1 in 10e14\r\nPOWER MANAGEMENT\r\n5VDC Â±10% (A, peak)	1.00\r\nAverage Power Requirements (W)\r\nRead/Write\r\nIdle\r\nStandby/Sleep	1.4\r\n0.55\r\n0.13\r\nENVIRONMENTAL SPECIFICATIONS\r\nTemberature (Â°C)\r\nOperating\r\nNon-Operating	0 to 60\r\n-40 to 65\r\nShock (Gs)\r\nOperating (2 ms, read)\r\nNon-Operating	400\r\n1000 (2 ms)\r\nAcoustics (dBA)\r\nIdle\r\nSeek (average)	17\r\n22\r\nPHYSICAL DIMENSIONS\r\nHeight (in/mm)	0.28/7.0\r\nLength (in/mm)	3.94/100.20\r\nWidth (in/mm)	2.75/69.85\r\nWeight (ib/kg, Â± 10%)	0.25/0.09', 'WD 500GB NOTEBOOK (2y)', '2024-06-23 18:02:11', 100, 250, 10, 1, 1, 'janaka@gmail.com', 4, 20),
	(53, 9650, 10, '\r\nForm Factor	2.5-inch\r\nInterface	SATA 6 Gbit/s\r\nFormatted Capacity	500 GB	 \r\nBuffer Size	8 MiB\r\nRotation Speed	5,400 rpm\r\nInternal Transfer Speed	638.9 ~ 1288.6 Mbit/s Typ.\r\nMTTF	600,000 hours\r\nPower Consumption ( Low Power Idle )	0.55 W Typ.\r\nWeight	92 g Max', 'HDD - TOSHIBA 500GB NOTEBOOK SLIM(2y)', '2024-06-23 18:03:16', 100, 250, 12, 1, 1, 'janaka@gmail.com', 4, 18),
	(54, 28500, 9, 'Enclosure: Internal\r\nCapacity: 2TB\r\nBuffer Size: 16MB\r\nSpindle Speed: 5400 RPM\r\nInterface: SATAIII', 'TOSHIBA 2TB NOTEBOOK HDD (2y)', '2024-06-23 18:04:33', 100, 250, 7, 1, 1, 'janaka@gmail.com', 4, 18),
	(55, 221000, 110, 'Generation	11th Gen\r\nProcessor	IntelÂ® Coreâ„¢ i3-1115G4 Processor 3.0 GHz (6M Cache, up to 4.1 GHz, 2 cores)\r\nChipset	Share\r\nIntegrated GPU	IntelÂ® UHD Graphics\r\nStorage	512 GB NVME\r\nUpgardability To SSD	Upgradable, Need to remove bottom/top case\r\nMemory	4GB DDR4 on board\r\nDisplay â€“ Panel Size	15.6-inch\r\nDisplay â€“ Resolution	FHD (1920 x 1080)\r\nDisplay â€“ Panel Tech	IPS-level Panel -N/A\r\nDisplay â€“ Aspect Ratio	16:09\r\nDisplay â€“ Brightness	200nits\r\nDisplay â€“ Anti Glare	Anti-glare display\r\nKeyboard	Backlit Chiclet Keyboard with Num-key\r\nScreen Pad	\r\nAudio	Audio by ICEpowerÂ®, Built-in speaker,Built-in microphone / harman/kardon (Mainstream)\r\nVoice Control	with Cortana support\r\nWeb Cam	720p HD camera / Without privacy shutter\r\nI/O Ports	1x HDMI 1.4, 1x Headphone out / 1x USB 3.2 Gen ,1 Type-A,1x USB 3.2 Gen 1 Type-C,2x USB 2.0 Type-A / Micro SD 4.0,card reader\r\nWi-Fi	Intel Wi-Fi 6(Gig+)(802.11ax)\r\nBluetooth	Bluetooth 5.0 (Dual band) 2*2\r\nBattery	42WHrs, 3S1P, 3-cell Li-ion\r\nPower Adapter	Ã¸4.0, 45W AC Adapter, Output: 19V DC, 2.37A,\r\nPower Requirements (Voltage/Frequency)	45W, Input: 100~240V AC 50/60Hz universal\r\nHousing Material	Plastic\r\nDimensions	35.90 x 23.50 x 1.99 ~ 1.99 cm\r\nWeight	1.80 kg\r\nOperating System	Windows 10 Home', 'ASUS X513EA-BQ1631 CORE I3 11GN|4GB|512SSD|W11|BLK(2y)with bag', '2024-06-23 18:07:51', 100, 250, 8, 1, 1, 'janaka@gmail.com', 7, 17),
	(56, 335000, 10, 'Model\r\nX1504V\r\n\r\nColor\r\nQuiet Blue\r\n\r\nOperating System\r\nWindows 11 Home - ASUS recommends Windows 11 Pro for business\r\n\r\nProcessor\r\nIntelÂ® Coreâ„¢ i7-1355U Processor 1.7 GHz (12MB Cache, up to 5.0 GHz, 10 cores, 12 Threads)\r\n\r\nGraphics\r\nIntel Iris Xáµ‰ Graphics\r\n*Intel Iris Xáµ‰ Graphics is only available in models with IntelÂ® Coreâ„¢ i5/i7/i9 processors and dual-channel memory.\r\n\r\nDisplay\r\n15.6-inch, FHD (1920 x 1080) 16:9 aspect ratio, IPS-level Panel, LED Backlit, 60Hz refresh rate, 250nits, 45% NTSC color gamut, Anti-glare display, TÃœV Rheinland-certified, Non-touch screen, (Screen-to-body ratio)84%\r\n\r\nMemory\r\n8GB DDR4 on board\r\n8GB DDR4 SO-DIMM\r\nTotal system memory upgradeable to:16GB\r\n*Dual-channel memory support requires at least one SO-DIMM module.\r\n\r\nStorage\r\n512GB M.2 NVMeâ„¢ PCIeÂ® 3.0 SSD\r\n\r\nExpansion Slots (includes used)\r\n1x DDR4 SO-DIMM slot\r\n1x M.2 2280 PCIe 4.0x4\r\n\r\nI/O Ports\r\n1x USB 2.0 Type-A\r\n1x USB 3.2 Gen 1 Type-C\r\n2x USB 3.2 Gen 1 Type-A\r\n1x HDMI 1.4\r\n1x 3.5mm Combo Audio Jack\r\n1x DC-in\r\n\r\nKeyboard & Touchpad\r\nBacklit Chiclet Keyboard, 1.4mm Key-travel, Precision Touchpad\r\n\r\nCamera\r\n720p HD camera\r\nWith privacy shutter\r\n\r\nAudio\r\nSonicMaster\r\nBuilt-in speaker\r\nBuilt-in array microphone\r\nwith Cortana voice-recognition support\r\n\r\nNetwork and Communication\r\nWi-Fi 6E(802.11ax) (Dual band) 2*2 + BluetoothÂ® 5.3 Wireless Card\r\n\r\nBattery\r\n42WHrs, 3S1P, 3-cell Li-ion\r\n\r\nPower Supply\r\nÃ¸4.5, 45W AC Adapter, Output: 19V DC, 2.37A, 45W, Input: 100~240V AC 50/60Hz universal\r\n\r\nWeight\r\n1.70 kg (3.75 lbs)\r\n\r\nDimensions (W x D x H)\r\n35.97 x 23.25 x 1.79 ~ 1.79 cm (14.16" x 9.15" x 0.70" ~ 0.70")\r\n\r\nMyASUS Features\r\nSystem diagnosis\r\nBattery health charging\r\nFan Profile\r\nSplendid\r\nTru2Life\r\nFunction key lock\r\nWiFi SmartConnect\r\nLink to MyASUS\r\nTaskFirst\r\nLive update\r\nAI Noise Canceling\r\n\r\nASUS Exclusive technology\r\nASUS Antimicrobial Guard Plus\r\n\r\nMilitary Grade\r\nUS MIL-STD 810H military-grade standard\r\n\r\nEcolabels & Compliances\r\nEnergy star 8.0\r\nRoHS\r\nREACH\r\n\r\nSecurity\r\nBIOS Booting User Password Protection\r\nTrusted Platform Module (Firmware TPM)\r\nBIOS setup user password\r\nMcAfeeÂ® LiveSafeâ„¢\r\nFingerprint sensor integrated with Touchpad', 'ASUS X1504V i7|13GN|16GB|512SSD|W11|BLUE(2y)', '2024-06-23 18:10:24', 100, 250, 2, 1, 1, 'janaka@gmail.com', 7, 21),
	(57, 394000, 21, 'Model\r\nUP3404V\r\n\r\nProcessor\r\nIntel Core i5 â€“ 1340P 1.9 GHz (12MB Cache, up to 4.6 GHz, 12 cores, 16 Threads)\r\n\r\nStorage\r\n512GB M.2 NVMe PCIe 4.0 SSD\r\n\r\nMemory\r\n8GB LPDDR5 on board (1 extra slot Available)\r\n\r\nDisplay\r\n14.0â€³, 2.8K (2880 x 1800) OLED 16:10 aspect ratio, 0.2ms response time, 90Hz refresh rate, 400nits, 550nits HDR peak brightness, 100% DCI-P3 color gamut, 1,000,000:1, VESA CERTIFIED Display\r\n\r\nGraphics\r\nIntel Iris Xe Graphics\r\n\r\nI/O Ports\r\n1x USB 3.2 Gen 2 Type-A\r\n2x Thunderbolt 4 supports display/power delivery\r\n1x HDMI 2.1 TMDS\r\n1x 3.5mm Combo Audio Jack\r\n\r\nKeyboard & Touchpad\r\nBacklit Chiclet Keyboard, 1.4mm Key-travel, Touchpad, support Number Pad\r\n\r\nCamera\r\nFHD camera with IR function to support Windows Hello\r\n\r\nAudio\r\nSmart Amp Technology\r\nBuilt-in speaker\r\nBuilt-in array microphone\r\nharman/kardon (Premium)\r\nwith Cortana voice-recognition support\r\n\r\nNetwork and Communication\r\nWi-Fi 6E(802.11ax) (Dual band) 2*2 + Bluetooth 5.3 Wireless Card (*Bluetooth version may change with OS version different.)\r\n\r\nBattery\r\n75WHrs, 2S2P, 4-cell Li-ion\r\n\r\nPower Supply\r\nTYPE-C, 65W AC Adapter, Output: 20V DC, 3.25A, 65W, Input: 100-240V AC 50/60GHz universal\r\n\r\nWeight\r\n1.50 kg (3.31 lbs)\r\n\r\nColor\r\nFoggy Silver\r\n\r\nOperating System\r\nWindows 11 Home', 'ASUS UP3404V i5|13GN|8GB|512SSD|14\'|W11(2y)', '2024-06-23 18:12:26', 100, 250, 10, 1, 1, 'janaka@gmail.com', 7, 22),
	(58, 221450, 14, 'IntelÂ® Coreâ„¢ i3-1115G4 Processor 3.0 GHz (6M Cache, up to 4.1 GHz, 2 cores)\r\n\r\nIntelÂ® UHD Graphics\r\n\r\n4GB DDR4 on board\r\n\r\n512GB M.2 NVMeâ„¢ PCIeÂ® 3.0 SSD\r\n\r\n15.6-inch, FHD (1920 x 1080) 16:9 aspect ratio, LED Backlit, 200nits, 45% NTSC color gamut, Anti-glare display\r\n\r\n1x DDR4 SO-DIMM slot\r\n1x M.2 2280 PCIe 3.0x2\r\n1x STD 2.5â€ SATA HDD\r\n\r\n1x USB 3.2 Gen 1 Type-A\r\n1x USB 3.2 Gen 1 Type-C\r\n2x USB 2.0 Type-A\r\n1x HDMI 1.4\r\n1x Headphone out\r\nMicro SD card reader\r\nMicro SD 4.0 card reader\r\n\r\nBacklit Chiclet Keyboard with Num-key\r\n\r\nBuilt-in speaker\r\nBuilt-in microphone\r\n\r\nWi-Fi 6(802.11ax)+Bluetooth 5.0 (Dual band) 2*2\r\n\r\n35.90 x 23.50 x 1.99 ~ 1.99 cm (14.13" x 9.25" x 0.78" ~ 0.78")\r\n\r\nWindows 10\r\n\r\nCobalt Blue', 'ASUS X513E-BQ1632W CORE i3 11GN|4GB|512SSD|W11|BLU(2y)with bag', '2024-06-23 18:14:10', 100, 250, 2, 1, 1, 'janaka@gmail.com', 7, 23),
	(59, 250400, 0, 'Processor\r\nAMD Ryzen 5 5500U (6C / 12T, 2.1 / 4.0GHz, 3MB L2 / 8MB L3)\r\n\r\nGraphic\r\nAMD Radeon 2GB Dedicated Graphic\r\n\r\nChipset\r\nAMD SoC Platform\r\n\r\nMemory\r\n4GB Soldered DDR4-3200 + 4GB SO-DIMM DDR4-3200\r\n\r\nMemory Slots\r\nOne memory soldered to system board, one DDR4 SO-DIMM slot, dual-channel capable\r\n\r\nMax Memory\r\nUp to 12GB (4GB soldered + 8GB SO-DIMM) DDR4-3200 offering\r\n\r\nStorage\r\n512GB SSD M.2 2242 PCIe 3.0Ã—4 NVMe\r\n\r\nStorage Support\r\nModels with 45Wh battery: one drive, 1x M.2 SSD\r\nâ€¢ M.2 2242 SSD up to 512GB\r\nâ€¢ M.2 2280 SSD up to 1TB\r\n\r\nStorage Slot\r\nModels with 45Wh battery: one M.2 slot\r\nâ€¢ One M.2 2280 PCIe 3.0 x4 slot\r\n\r\nCard Reader\r\n4-in-1 Card Reader\r\n\r\nOptical\r\nNone\r\n\r\nAudio Chip\r\nHigh Definition (HD) Audio, Realtek ALC3287 codec\r\n\r\nSpeakers\r\nStereo speakers, 1.5W x2, Dolby Audio\r\n\r\nCamera\r\nHD 720p with Privacy Shutter\r\n\r\nMicrophone\r\n2x, Array\r\n\r\nBattery\r\nIntegrated 45Wh\r\n\r\nMax Battery Life\r\nModels with 45Wh battery:\r\nMobileMark 2018: 9.5 hr\r\nLocal video (1080p) playback@150nits: 11 hr\r\n\r\nPower Adapter\r\n65W Round Tip (2-pin, Wall-mount)\r\n\r\nDisplay\r\n15.6â€³ FHD (1920Ã—1080) IPS 300nits Anti-glare\r\n\r\nTouchscreen\r\nNone\r\n\r\nKeyboard\r\nBacklit, English (EU)\r\n\r\nSurface Treatment\r\nIMR (In-Mold Decoration by Roller)\r\n\r\nCase Material\r\nPC-ABS (Top), PC-ABS (Bottom)\r\n\r\nDimensions (WxDxH)\r\n359.2 x 236.5 x 19.9 mm (14.14 x 9.31 x 0.78 inches)\r\n\r\nEthernet\r\nNo Onboard Ethernet\r\n\r\nWLAN + Bluetooth\r\n11ac, 2Ã—2 + BT5.0\r\n\r\nStandard Ports\r\n1x USB 2.0\r\n1x USB 3.2 Gen 1\r\n1x USB-C 3.2 Gen 1 (support data transfer only)\r\n1x HDMI 1.4b\r\n1x Card reader\r\n1x Headphone / microphone combo jack (3.5mm)\r\n1x Power connector\r\n\r\nSecurity Chip\r\nFirmware TPM 2.0\r\n\r\nOperating System\r\nWindows 11 Home 64 Single Language, English', 'LENOVO SLIM 3 15ALC6 RYZEN5 5500U|8GB|512SSD|2GV|W11|grey(3y)', '2024-06-23 19:58:08', 100, 250, 9, 1, 1, 'janaka@gmail.com', 11, 24),
	(60, 201150, 21, 'Processor & Chipset\r\nProcessor Type	Coreâ„¢ i5\r\nProcessor Model	IntelÂ® Core i5-1135G7 processor\r\nProcessor Speed (turbo)	4.20 GHz\r\nProcessor Core	Quad-core (4 Core)\r\nMemory\r\nStandard Memory	4 GB\r\nMaximum Memory	upto 16 GB\r\nMemory Technology	DDR4 SDRAM\r\nStorage\r\nTotal Storage Drive Capacity	1 TB HDD 6.3 cm (2.5-inch) 5400 RPM\r\n 	 \r\nDisplay & Graphics\r\nScreen Size	39.6 cm (15.6")\r\nDisplay Screen Type	39.6 cm display with Full HD 1920 x 1080, Acer ComfyViewâ„¢ LED-backlit TFT LCD\r\nGraphics Controller Manufacturer	IntelÂ®\r\nGraphics Controller Model	IntelÂ® IrisÂ® Xe Graphics\r\nAudio\r\nSpeakers	Yes\r\nNumber of Speakers	2\r\nSpeaker Output Mode	Stereo\r\nNetwork & Communication\r\nWireless LAN	Yes\r\nWireless LAN Standard	IEEE 802.11 a/b/g/n+ac+ax\r\nEthernet Technology	Gigabit Ethernet\r\nBluetooth	Yes\r\nBluetooth Standard	5.0\r\nBuilt-in Devices\r\nWebcam	Yes\r\nWebcam Resolution (front)	HD webcam with 1280 x 720 resolution, 720p HD audio/video recording\r\nFingerprint Reader	No\r\nInterfaces/Ports\r\nHDMI	Yes\r\nUSB	Yes\r\nTotal Number of USB Ports	1 X USB 3.2 port with power-off charging , 2 X USB 3.2 port , 1 X USB Type-C port\r\nNetwork (RJ-45)	Yes\r\nInput Devices\r\nPointing Device Type	Multi-gesture touchpad, supporting two-finger scroll; pinch; gestures to open Cortana, Action Center, multitasking\r\nKeyboard Type	100-/101-/104-key FineTip backlit keyboard with independent numeric keypad, international language support, and power button\r\nBattery Information\r\nNumber of Cells	3\r\nBattery Chemistry	Lithium-Ion (Li-Ion)\r\nBattery Capacity	 3-cell Li-ion battery pack | Battery life up to 8.5 hours (based on video playback test results)\r\nPower Description\r\nPower Supply	3-pin AC adapter\r\nPhysical Characteristics\r\nColor	Silver\r\nHeight	1.79 cm\r\nWidth	36.3 cm\r\nDepth	23.8 cm\r\nWeight (Approximate)	1.6 kg', 'ACER A515-56-53LE CORE i5 11GN|4GB|1TB|W10|SIL (2y)', '2024-06-23 20:06:11', 100, 250, 11, 1, 1, 'janaka@gmail.com', 9, 25),
	(61, 226000, 15, '11th Generation Intel(R) Core( TM) i5-1135G7 Processor (8MB C ache, up to 4.2 GHz)\r\n\r\n512GB M.2 PCIe NVMe Solid State Drive\r\n\r\nIntel(R) UHD Graphics with the shared graphics memory\r\n\r\n8GB, 1x8GB, DDR4, 2666MHz\r\n\r\n15.6-inch FHD (1920 x 1080) Anti-glare LED Backlight Non-touch Narrow Border WVA Display\r\n\r\n802.11ac 1x1 WiFi and Bluetooth\r\n\r\nWindows 11 Home, Single Language English\r\n\r\nMicrosoft(R) Office Home and Student 2021\r\n\r\nPlatinum Silver', 'DELL 3511 CORE i5 11GN|8GB|512SSD|W11(2y)SIL', '2024-06-23 20:07:54', 100, 250, 12, 1, 1, 'janaka@gmail.com', 10, 15),
	(62, 11400, 20, 'DIMENSIONS\r\n\r\nHeight x Width x Depth:\r\n6.30 in (160 mm) x 6.89 in (175 mm) x 2.36 in (60 mm)\r\nWeight: 3.52 oz (0.1 Kg)\r\nTECHNICAL SPECIFICATIONS\r\n\r\nInput Impedance: 20 Ohms\r\n\r\nSensitivity (headphone): 115dB +/-3dB\r\n\r\nSensitivity (microphone): -42dBV/Pa +/- 3dB\r\n\r\nFrequency response (Headset): 20Hz - 20kHz\r\n\r\nFrequency response (Microphone): 100Hz - 16kHz\r\n\r\nCable length: 5.90 ft (1.8m)\r\n\r\nConnections: USB-A compatible (1.1, 2.0, 3.0)\r\nSYSTEM REQUIREMENTS\r\n\r\nWorks with Common calling applications across almost all platforms and operating systems\r\nWindowsÂ® or macOSÂ®\r\nChrome OSâ„¢\r\nUSB port (Type A port or adapter)', 'LOGITECH H340 USB HEADPHONE(2y)', '2024-06-25 09:56:13', 100, 250, 9, 1, 1, 'janaka@gmail.com', 112, 26),
	(63, 13500, 20, 'Brand - msi\r\n\r\nModel - S37-2100921-SV1', 'MSI DS501 GAMING HEADSET S37-2100921-SV1 (1Y)', '2024-06-25 09:57:22', 100, 250, 1, 1, 1, 'janaka@gmail.com', 24, 27),
	(64, 700, 17, 'Headphones â€“ with microphone\r\nheadset, ear\r\n3.5mm Jack\r\nIPX4 certification\r\nimpedance: 320 Ohm\r\nStylish silver color\r\nheadphones weigh 68 g', 'HAVIT HV-H204D HEAD PHONE(1y)', '2024-06-25 09:58:19', 100, 250, 9, 1, 1, 'janaka@gmail.com', 112, 28),
	(65, 3800, 21, 'Bluetooth Chip:JL6955F\r\nBluetooth Version:V5.3\r\nDrive Unit:40mm\r\nTransmission Distance:â‰¥10m\r\nStandby Time: About 80H\r\nBattery Capacity:200mAh\r\nCharging Time: About 2-3H\r\nMusic Time: About 6-8H\r\nCall Time: About 6-8H\r\nFrequency Response: 20HZ-20KHZ\r\nSensitivity: 116Â±3db', 'CELEBRAT A27 WIRELESS STEREO HEADPHONES(6m)', '2024-06-25 09:59:44', 100, 250, 6, 1, 1, 'janaka@gmail.com', 112, 29),
	(66, 28500, 10, '\r\nCPU\r\nAMD Ryzenâ„¢ 5 7535 HS-Processors with AMD XDNAâ„¢ architecture\r\n\r\n \r\n\r\nOS\r\nWindows 11 Home (MSI recommends Windows 11 Pro for business.)\r\n\r\n \r\n\r\nDISPLAY\r\n15.6" FHD (1920x1080), 144Hz, IPS-Level\r\n\r\n \r\n\r\nGRAPHICS    \r\nNVIDIAÂ® GeForce RTXâ„¢ 2050 Laptop GPU 4GB GDDR6\r\nUp to 1170MHz Boost Clock 45W Maximum Graphics Power with Dynamic Boost.\r\n\r\n \r\n\r\nMEMORY\r\n8GB\r\nDDR5-4800\r\n2 Slots\r\n\r\n \r\n\r\nSTORAGE CAPABILITY\r\nSSD slot (NVMe PCIe Gen4)\r\n512GB  \r\n\r\n \r\n\r\nSECURITY\r\nFirmware Trusted Platform Module(fTPM) 2.0 Kensington Lock\r\n\r\n \r\n\r\nWEBCAM\r\nHD type (30fps@720p)\r\n\r\n \r\n\r\nKEYBOARD\r\nSingle Backlit Keyboard (Blue)\r\n\r\nCOMMUNICATION\r\nGb LAN\r\n802.11 ax Wi-Fi 6E + Bluetooth v5.3\r\n\r\n \r\n\r\nAUDIO\r\n2x 2W Speaker\r\n\r\n \r\n\r\nAUDIO JACK\r\n1x Mic-in, 1x Headphone-out\r\n\r\n \r\n\r\nI/O PORTS\r\n1x Type-C (USB3.2 Gen2 / DP) with PD charging\r\n3x Type-A USB3.2 Gen1\r\n1x HDMIâ„¢ 2.1 (8K @ 60Hz / 4K @ 120Hz)\r\n1x RJ45\r\n\r\n \r\n\r\nBATTERY\r\n3-Cell\r\n52.4 Battery (Whr)\r\n\r\n \r\n\r\nAC ADAPTER\r\n120W adapter\r\n\r\n \r\n\r\nDIMENSION (WXDXH)\r\n359 x 254 x 21.7 mm\r\n\r\n \r\n\r\nWEIGHT (W/ BATTERY)\r\n1.86 kg\r\n\r\n \r\n\r\nCOLOR\r\nCosmos Gray', 'MSI THIN A15 B7UCX-096LK RYZEN 5-7535HS|15.6\' FHD IPS 144Hz|W11|GRAY(2y)', '2024-06-25 11:43:16', 100, 250, 11, 1, 1, 'janaka@gmail.com', 17, 27),
	(67, 30500, 23, 'Model\r\nMSI Modern 15 B12M â€“ i7\r\n\r\nProcessor\r\nIntel Core i7 â€“ 1255U Processor\r\n\r\nRAM\r\n8GB DDR4 RAM\r\n\r\nStorage\r\n512GB NVME M.2 SSD\r\n\r\nDisplay Size\r\n15.6â€ FHD (1920Ã—1080), 1080P, NanoEdge, IPS Level Display\r\n\r\nGraphics\r\nIntel Iris Xe Graphics\r\n\r\nKeyboard\r\nBacklight Keyboard (Single-Color, White)\r\n\r\nOperating System\r\nWindows 11 Home\r\n\r\nAudio\r\n2x 2W Speaker\r\n\r\nAudio Jack\r\n1x Mic-in/Headphone-out Combo Jack\r\n\r\nI/O Ports\r\n1x Type-C USB3.2 Gen2 with PD charging\r\n1x Type-A USB3.2 Gen2\r\n2x Type-A USB2.0\r\n1x Micro SD Card Reader\r\n1x (4K @ 30Hz) HDMIâ„¢\r\n\r\nBattery\r\n3-Cell\r\n39.3/53.8 Battery (Whr)\r\n\r\nAC Adapter\r\n65W adapter\r\n\r\nDimension (WxDxH)\r\n359 x 241 x 19.9 mm\r\n\r\nWeight (w/ Battery)\r\n1.7 kg\r\n\r\nColor\r\nClassic Black\r\n\r\n*Get Free HAVIT HV-H2262D Wired Portable Folding Headset', 'MSI MODERN 15-B12M CORE i7 12GN|8GB|512SSD|W11|BLACK(2y)', '2024-06-25 11:44:38', 100, 250, 12, 1, 1, 'janaka@gmail.com', 17, 27);

-- Dumping structure for table techmart.profile_image
CREATE TABLE IF NOT EXISTS `profile_image` (
  `path` varchar(120) NOT NULL,
  `user_email` varchar(100) NOT NULL,
  PRIMARY KEY (`path`),
  KEY `fk_profile_image_user1_idx` (`user_email`),
  CONSTRAINT `fk_profile_image_user1` FOREIGN KEY (`user_email`) REFERENCES `user` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- Dumping data for table techmart.profile_image: ~0 rows (approximately)
REPLACE INTO `profile_image` (`path`, `user_email`) VALUES
	('reso/profile_img/Janaka_667836eb58c20.jpeg', 'janakasangeethjava3@gmail.com');

-- Dumping structure for table techmart.promo_code
CREATE TABLE IF NOT EXISTS `promo_code` (
  `id` int NOT NULL AUTO_INCREMENT,
  `code` varchar(10) NOT NULL,
  `discount` double NOT NULL,
  PRIMARY KEY (`id`,`code`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb3;

-- Dumping data for table techmart.promo_code: ~0 rows (approximately)
REPLACE INTO `promo_code` (`id`, `code`, `discount`) VALUES
	(1, 'DELI2024', 250);

-- Dumping structure for table techmart.promo_code_has_user
CREATE TABLE IF NOT EXISTS `promo_code_has_user` (
  `id` int NOT NULL AUTO_INCREMENT,
  `promo_code_id` int NOT NULL,
  `user_email` varchar(100) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_promo_code_has_user_user1_idx` (`user_email`),
  KEY `fk_promo_code_has_user_promo_code1_idx` (`promo_code_id`),
  CONSTRAINT `fk_promo_code_has_user_promo_code1` FOREIGN KEY (`promo_code_id`) REFERENCES `promo_code` (`id`),
  CONSTRAINT `fk_promo_code_has_user_user1` FOREIGN KEY (`user_email`) REFERENCES `user` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb3;

-- Dumping data for table techmart.promo_code_has_user: ~0 rows (approximately)
REPLACE INTO `promo_code_has_user` (`id`, `promo_code_id`, `user_email`) VALUES
	(2, 1, 'janakasangeethjava3@gmail.com');

-- Dumping structure for table techmart.province
CREATE TABLE IF NOT EXISTS `province` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb3;

-- Dumping data for table techmart.province: ~9 rows (approximately)
REPLACE INTO `province` (`id`, `name`) VALUES
	(1, 'Central'),
	(2, 'Eastern'),
	(3, 'Northern'),
	(4, 'North Central'),
	(5, 'North Western'),
	(6, 'Sabaragamuwa'),
	(7, 'Southern'),
	(8, 'Uva'),
	(9, 'Western');

-- Dumping structure for table techmart.recent
CREATE TABLE IF NOT EXISTS `recent` (
  `id` int NOT NULL AUTO_INCREMENT,
  `product_id` int NOT NULL,
  `user_email` varchar(100) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_recent_product1_idx` (`product_id`),
  KEY `fk_recent_user1_idx` (`user_email`),
  CONSTRAINT `fk_recent_product1` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`),
  CONSTRAINT `fk_recent_user1` FOREIGN KEY (`user_email`) REFERENCES `user` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb3;

-- Dumping data for table techmart.recent: ~10 rows (approximately)
REPLACE INTO `recent` (`id`, `product_id`, `user_email`) VALUES
	(1, 66, 'janakasangeethjava3@gmail.com'),
	(2, 66, 'janakasangeethjava3@gmail.com'),
	(3, 65, 'janakasangeethjava3@gmail.com'),
	(4, 61, 'janakasangeethjava3@gmail.com'),
	(5, 66, 'janakasangeethjava3@gmail.com'),
	(6, 64, 'janakasangeethjava3@gmail.com'),
	(7, 49, 'janakasangeethjava3@gmail.com'),
	(8, 67, 'janakasangeethjava3@gmail.com'),
	(9, 63, 'janakasangeethjava3@gmail.com'),
	(10, 65, 'janakasangeethjava3@gmail.com');

-- Dumping structure for table techmart.shipping_charges
CREATE TABLE IF NOT EXISTS `shipping_charges` (
  `id` int NOT NULL AUTO_INCREMENT,
  `price` double DEFAULT NULL,
  `city_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_shipping_charges_city1_idx` (`city_id`),
  CONSTRAINT `fk_shipping_charges_city1` FOREIGN KEY (`city_id`) REFERENCES `city` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- Dumping data for table techmart.shipping_charges: ~0 rows (approximately)

-- Dumping structure for table techmart.stars
CREATE TABLE IF NOT EXISTS `stars` (
  `id` int NOT NULL AUTO_INCREMENT,
  `star_type` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- Dumping data for table techmart.stars: ~0 rows (approximately)

-- Dumping structure for table techmart.status
CREATE TABLE IF NOT EXISTS `status` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb3;

-- Dumping data for table techmart.status: ~2 rows (approximately)
REPLACE INTO `status` (`id`, `name`) VALUES
	(1, 'Active'),
	(2, 'InActive');

-- Dumping structure for table techmart.sub_category
CREATE TABLE IF NOT EXISTS `sub_category` (
  `id` int NOT NULL AUTO_INCREMENT,
  `sub_name` varchar(45) DEFAULT NULL,
  `Category_id` int NOT NULL,
  PRIMARY KEY (`id`,`Category_id`),
  KEY `fk_Sub_category_Category1_idx` (`Category_id`),
  CONSTRAINT `fk_Sub_category_Category1` FOREIGN KEY (`Category_id`) REFERENCES `category` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb3;

-- Dumping data for table techmart.sub_category: ~26 rows (approximately)
REPLACE INTO `sub_category` (`id`, `sub_name`, `Category_id`) VALUES
	(1, 'ACCESSORIES', 1),
	(2, 'LAPTOPS', 1),
	(3, 'GAMING LAPTOP', 1),
	(4, 'GAMING ACCESSORIES', 2),
	(5, 'GAMING POWER SUPPLY', 2),
	(6, 'GAMING COMPONENTS', 2),
	(7, 'CABLES, CONVERTERS AND ACCESSORIES', 3),
	(8, 'UPS', 3),
	(9, 'OPTICAL AND OTHER', 3),
	(10, 'NETWORK EXPANSION', 4),
	(11, 'NETWORK CABLES', 4),
	(12, 'NETWORK ACCESSORIES', 4),
	(13, 'TIME ATTENDANCE', 5),
	(14, 'PROJECTORS', 5),
	(15, 'POS SYSTEM', 5),
	(16, 'PRINTERS & SCANNERS', 5),
	(17, 'CCTV', 6),
	(18, 'ACCESS CONTROL', 6),
	(19, 'ALARMS & DETECTORS', 6),
	(20, 'SPEAKER SYSTEMS', 7),
	(21, 'PHONE, TAB ACCESSORIES', 8),
	(22, 'MOBILE PHONES', 8),
	(23, 'WEARABLES & GADGETS', 8),
	(24, 'STORAGE', 3),
	(25, 'VR BOX', 7),
	(26, 'Head Phones', 7);

-- Dumping structure for table techmart.user
CREATE TABLE IF NOT EXISTS `user` (
  `email` varchar(100) NOT NULL,
  `fname` varchar(45) DEFAULT NULL,
  `lname` varchar(45) DEFAULT NULL,
  `password` varchar(20) DEFAULT NULL,
  `joined_date` datetime DEFAULT NULL,
  `verification_code` varchar(20) DEFAULT NULL,
  `status` int DEFAULT NULL,
  `gender_id` int NOT NULL,
  `mobile` varchar(12) DEFAULT NULL,
  PRIMARY KEY (`email`),
  KEY `fk_user_gender_idx` (`gender_id`),
  CONSTRAINT `fk_user_gender` FOREIGN KEY (`gender_id`) REFERENCES `gender` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- Dumping data for table techmart.user: ~2 rows (approximately)
REPLACE INTO `user` (`email`, `fname`, `lname`, `password`, `joined_date`, `verification_code`, `status`, `gender_id`, `mobile`) VALUES
	('ben@gmail.com', 'Ben', 'Ten', '12345', '2024-06-25 20:39:06', NULL, 1, 1, '0712738478'),
	('janakasangeethjava3@gmail.com', 'Janaka', 'Sangeeth', '12346', '2024-06-23 20:16:02', '667e50b0346ad', 1, 1, '+94762228848');

-- Dumping structure for table techmart.user_has_address
CREATE TABLE IF NOT EXISTS `user_has_address` (
  `id` int NOT NULL AUTO_INCREMENT,
  `line1` text,
  `line2` text,
  `postal_code` varchar(10) DEFAULT NULL,
  `user_email` varchar(100) NOT NULL,
  `city_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_user_has_address_user1_idx` (`user_email`),
  KEY `fk_user_has_address_city1_idx` (`city_id`),
  CONSTRAINT `fk_user_has_address_city1` FOREIGN KEY (`city_id`) REFERENCES `city` (`id`),
  CONSTRAINT `fk_user_has_address_user1` FOREIGN KEY (`user_email`) REFERENCES `user` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb3;

-- Dumping data for table techmart.user_has_address: ~2 rows (approximately)
REPLACE INTO `user_has_address` (`id`, `line1`, `line2`, `postal_code`, `user_email`, `city_id`) VALUES
	(1, 'Yakala RD', '', '50062', 'janakasangeethjava3@gmail.com', 7),
	(2, '1 st Lane', 'Colombo 2', '50062', 'ben@gmail.com', 1);

-- Dumping structure for table techmart.watchlist
CREATE TABLE IF NOT EXISTS `watchlist` (
  `id` int NOT NULL AUTO_INCREMENT,
  `product_id` int NOT NULL,
  `user_email` varchar(100) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_watchlist_product1_idx` (`product_id`),
  KEY `fk_watchlist_user1_idx` (`user_email`),
  CONSTRAINT `fk_watchlist_product1` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`),
  CONSTRAINT `fk_watchlist_user1` FOREIGN KEY (`user_email`) REFERENCES `user` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb3;

-- Dumping data for table techmart.watchlist: ~0 rows (approximately)
REPLACE INTO `watchlist` (`id`, `product_id`, `user_email`) VALUES
	(2, 61, 'janakasangeethjava3@gmail.com');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
