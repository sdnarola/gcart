-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
<<<<<<< HEAD
-- Generation Time: Apr 06, 2020 at 10:05 AM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.3.12
=======
-- Generation Time: Mar 20, 2020 at 11:35 AM
-- Server version: 5.7.26
-- PHP Version: 7.3.5
>>>>>>> 7a0667f849e90ca2023a3e4e797402951a5a6d3e

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gcart`
--

-- --------------------------------------------------------

--
-- Table structure for table `banners`
--

DROP TABLE IF EXISTS `banners`;
CREATE TABLE IF NOT EXISTS `banners` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) NOT NULL,
  `sub_title` text NOT NULL,
  `description` mediumtext NOT NULL,
  `banner_image` mediumtext NOT NULL,
  `is_deleted` tinyint(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`)
<<<<<<< HEAD
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
=======
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
>>>>>>> 7a0667f849e90ca2023a3e4e797402951a5a6d3e

--
-- Dumping data for table `banners`
--

<<<<<<< HEAD
INSERT INTO `banners` (`id`, `title`, `sub_title`, `description`, `banner_image`, `is_deleted`) VALUES
(1, 'test', 'Save up to 49% off', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit', 'assets/upload/banner/3.jpg', 0),
(2, 'sale', 'sale 80% off', 'cdsfdssgg', 'assets/upload/banner/2.jpg', 0),
(3, 'sale', 'Save up to 49% off', 'adads', 'assets/upload/banner/1.jpg', 0),
(4, 'sale', 'sale 80% off', 'aaSAsASa', 'assets/upload/banner/watch.jpg', 0);
=======
INSERT INTO `banners` (`id`, `title`, `sub_title`, `description`, `banner`, `is_deleted`) VALUES
(1, 'cat', 'cattt', 'trtrt', 'fd', 0);
>>>>>>> 7a0667f849e90ca2023a3e4e797402951a5a6d3e

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

DROP TABLE IF EXISTS `brands`;
CREATE TABLE IF NOT EXISTS `brands` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `logo` mediumtext NOT NULL,
<<<<<<< HEAD
  `is_deleted` tinyint(4) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
=======
  `is_deleted` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
>>>>>>> 7a0667f849e90ca2023a3e4e797402951a5a6d3e

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `name`, `logo`, `is_deleted`) VALUES
<<<<<<< HEAD
(1, 'hot foil', 'assets/upload/brands/brand1.png', 0),
(2, 'nike', 'assets/upload/brands/brand1.png', 0),
(3, 'chanel', 'assets/upload/brands/brand1.png', 0),
(4, 'dolce & gabbana', 'assets/upload/brands/brand1.png', 0),
(5, 'forever 18', 'assets/upload/brands/brand1.png', 0);
=======
(1, 'nike', '-', 0),
(2, 'puma', '-', 0),
(3, 'lg', '-', 0),
(4, 'samsung', '-', 0);
>>>>>>> 7a0667f849e90ca2023a3e4e797402951a5a6d3e

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

DROP TABLE IF EXISTS `cart`;
CREATE TABLE IF NOT EXISTS `cart` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `total_amount` decimal(7,2) NOT NULL,
  `date` datetime NOT NULL,
  `is_deleted` tinyint(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `product_id` (`product_id`)
<<<<<<< HEAD
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
=======
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
>>>>>>> 7a0667f849e90ca2023a3e4e797402951a5a6d3e

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `user_id`, `product_id`, `quantity`, `total_amount`, `date`, `is_deleted`) VALUES
<<<<<<< HEAD
(1, 1, 9, 1, '1200.00', '2020-03-17 00:00:00', 0);
=======
(1, 1, 2, 2, '9120.24', '2020-03-20 10:54:29', 0),
(2, 1, 3, 2, '30800.00', '2020-03-20 10:54:41', 0);
>>>>>>> 7a0667f849e90ca2023a3e4e797402951a5a6d3e

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `banner_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `slug` varchar(50) NOT NULL,
  `icon` mediumtext NOT NULL,
<<<<<<< HEAD
  `is_header` tinyint(1) NOT NULL DEFAULT 0,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `is_deleted` tinyint(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`),
  UNIQUE KEY `slug` (`slug`),
  KEY `banner_id` (`banner_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
=======
  `is_header` tinyint(1) NOT NULL,
  `is_active` tinyint(1) NOT NULL,
  `is_deleted` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `slug` (`slug`),
  KEY `banner_id` (`banner_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
>>>>>>> 7a0667f849e90ca2023a3e4e797402951a5a6d3e

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `banner_id`, `name`, `slug`, `icon`, `is_header`, `is_active`, `is_deleted`) VALUES
<<<<<<< HEAD
(1, 1, 'clothing', 'clothing', 'fa-shopping-bag', 1, 1, 0),
(2, 2, 'electronics', 'electronics-shope', 'fa-laptop', 1, 1, 0),
(3, 1, 'jewellery', 'jewellery', 'fa-diamond', 1, 1, 0),
(4, 4, 'watches', 'watches', 'fa-clock-o', 1, 1, 0),
(5, 3, 'home and garden', 'homeandgarden', 'fa-envira', 1, 1, 0),
(6, 2, 'sport', 'sport', 'fa-futbol-o', 0, 1, 0);
=======
(1, 1, 'sports', 'sports-item', '-', 1, 1, 0),
(2, 1, 'pants', 'pant', '-', 1, 1, 0),
(3, 1, 'electronics', 'ele-item', '-', 1, 1, 0);
>>>>>>> 7a0667f849e90ca2023a3e4e797402951a5a6d3e

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

DROP TABLE IF EXISTS `comments`;
CREATE TABLE IF NOT EXISTS `comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `user_email` varchar(50) NOT NULL,
  `comment` text NOT NULL,
  `is_deleted` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `product_id` (`product_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `product_id`, `user_name`, `user_email`, `comment`, `is_deleted`) VALUES
(1, 2, 'patel', 'patel@mail.com', 'nice product', 0),
(2, 3, 'patel2', 'patel7@mail.com', 'product', 0),
(3, 1, 'patel', 'patel7@mail.com', 'product', 0),
(4, 3, 'patel', 'patel44@mail.com', 'product', 0);

-- --------------------------------------------------------

--
-- Table structure for table `coupons`
--

DROP TABLE IF EXISTS `coupons`;
CREATE TABLE IF NOT EXISTS `coupons` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(32) NOT NULL,
  `type` tinyint(1) NOT NULL,
  `amount` bigint(10) NOT NULL,
  `quantity` int(11) NOT NULL,
  `used` int(11) NOT NULL DEFAULT '0',
  `start_date` datetime DEFAULT NULL,
  `end_date` datetime DEFAULT NULL,
<<<<<<< HEAD
  `is_deleted` tinyint(1) NOT NULL DEFAULT 0,
=======
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `is_deleted` tinyint(1) NOT NULL DEFAULT '0',
>>>>>>> 7a0667f849e90ca2023a3e4e797402951a5a6d3e
  PRIMARY KEY (`id`),
  UNIQUE KEY `code` (`code`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `coupons`
--

INSERT INTO `coupons` (`id`, `code`, `type`, `amount`, `quantity`, `used`, `start_date`, `end_date`, `is_active`, `is_deleted`) VALUES
(1, 'code', 0, 500, 10, 0, '2020-03-20 00:00:00', '2020-03-29 00:00:00', 1, 0),
(2, 'shop30', 1, 30, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 0),
(3, 'cart600', 0, 600, 0, 0, '2020-03-21 00:00:00', '2020-05-16 00:00:00', 1, 0),
(4, 'shoe70', 1, 70, 50, 0, '2020-03-20 00:00:00', '2020-03-28 00:00:00', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `faqs`
--

DROP TABLE IF EXISTS `faqs`;
CREATE TABLE IF NOT EXISTS `faqs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `question` varchar(100) NOT NULL,
  `answer` varchar(700) NOT NULL,
  `is_deleted` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `faqs`
--

INSERT INTO `faqs` (`id`, `question`, `answer`, `is_deleted`) VALUES
(1, 'Six started far placing saw respect', '\r\nNam enim risus, molestie et, porta ac, aliquam ac, risus. Quisque lobortis. Phasellus pellentesque purus in massa. Aenean in pede. Phasellus ac libero ac tellus pellentesque semper. Sed ac felis. Sed commodo, magna quis lacinia ornare, quam ante aliq...<br><br>', 0),
(5, 'Civilly why how end viewing related', 'Nam enim risus, molestie et, porta ac, aliquam ac, risus. Quisque lobortis. Phasellus pellentesque purus in massa. Aenean in pede. Phasellus ac libero ac tellus pellentesque semper. Sed ac felis. Sed commodo, magna quis lacinia ornare, quam ante aliquam nisi, eu iaculis leo purus venenatis dui.<br>', 0);

-- --------------------------------------------------------

--
-- Table structure for table `hot_deals`
--

DROP TABLE IF EXISTS `hot_deals`;
CREATE TABLE IF NOT EXISTS `hot_deals` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `product_id` int(11) NOT NULL,
<<<<<<< HEAD
  `from_date_time` datetime NOT NULL,
  `to_date_time` datetime NOT NULL,
  `off_percentage` varchar(10) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `product_id` (`product_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
=======
  `type` tinyint(1) NOT NULL,
  `value` bigint(20) NOT NULL,
  `start_date` datetime NOT NULL,
  `end_date` datetime NOT NULL,
  `is_deleted` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `product_id` (`product_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
>>>>>>> 7a0667f849e90ca2023a3e4e797402951a5a6d3e

--
-- Dumping data for table `hot_deals`
--

<<<<<<< HEAD
INSERT INTO `hot_deals` (`id`, `product_id`, `from_date_time`, `to_date_time`, `off_percentage`) VALUES
(1, 3, '2020-03-17 00:00:00', '2020-04-17 00:00:00', '35');
=======
INSERT INTO `hot_deals` (`id`, `product_id`, `type`, `value`, `start_date`, `end_date`, `is_deleted`) VALUES
(1, 1, 0, 500, '2020-03-21 00:00:00', '2020-03-29 00:00:00', 0),
(2, 2, 1, 50, '2020-03-21 00:00:00', '2020-03-28 00:00:00', 0);
>>>>>>> 7a0667f849e90ca2023a3e4e797402951a5a6d3e

-- --------------------------------------------------------

--
-- Table structure for table `news_letters`
--

DROP TABLE IF EXISTS `news_letters`;
CREATE TABLE IF NOT EXISTS `news_letters` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(50) NOT NULL,
  `created_date` datetime NOT NULL,
  `is_deleted` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE IF NOT EXISTS `orders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `coupon_id` int(11) DEFAULT '0',
  `order_number` varchar(32) NOT NULL,
  `invoice_number` bigint(20) NOT NULL,
  `total_products` int(11) NOT NULL,
  `grand_total` decimal(7,2) NOT NULL,
  `order_date` datetime NOT NULL,
  `order_status` tinyint(1) NOT NULL,
<<<<<<< HEAD
  `payment_method` varchar(20) NOT NULL DEFAULT 'CASH ON DELIVERY',
  `payment_status` tinyint(1) NOT NULL DEFAULT 0,
  `is_deleted` tinyint(1) NOT NULL DEFAULT 0,
=======
  `payment_method` varchar(20) NOT NULL DEFAULT 'cash on delivery',
  `payment_status` tinyint(1) NOT NULL DEFAULT '0',
  `is_deleted` tinyint(1) NOT NULL DEFAULT '0',
>>>>>>> 7a0667f849e90ca2023a3e4e797402951a5a6d3e
  PRIMARY KEY (`id`),
  UNIQUE KEY `order_number` (`order_number`),
  KEY `coupon_id` (`coupon_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `coupon_id`, `order_number`, `invoice_number`, `total_products`, `grand_total`, `order_date`, `order_status`, `payment_method`, `payment_status`, `is_deleted`) VALUES
(1, 2, NULL, '7490285', 6584130147, 4, '24820.94', '2020-03-11 15:36:48', 1, 'cash on delivery', 0, 0),
(2, 3, NULL, '7654321', 972014563, 6, '55620.94', '2020-03-10 03:05:05', 2, 'cash on delivery', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

DROP TABLE IF EXISTS `order_items`;
CREATE TABLE IF NOT EXISTS `order_items` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `vendor_status` tinyint(1) NOT NULL DEFAULT '0',
  `quantity` int(11) NOT NULL,
  `total_amount` decimal(7,2) NOT NULL,
  `is_deleted` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `order_id` (`order_id`),
  KEY `product_id` (`product_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`id`, `order_id`, `product_id`, `vendor_status`, `quantity`, `total_amount`, `is_deleted`) VALUES
(1, 1, 1, 2, 2, '15700.70', 0),
(2, 1, 2, 1, 2, '9120.24', 0),
(3, 2, 3, 1, 2, '30800.00', 0),
(4, 2, 2, 1, 2, '9120.24', 0),
(5, 2, 1, 2, 2, '15700.70', 0);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `vendor_id` int(11) DEFAULT '0',
  `brand_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `sub_category_id` int(11) DEFAULT '0',
  `name` varchar(50) NOT NULL,
<<<<<<< HEAD
  `slug` varchar(50) NOT NULL,
  `sku` int(11) NOT NULL,
=======
  `sku` varchar(20) NOT NULL,
>>>>>>> 7a0667f849e90ca2023a3e4e797402951a5a6d3e
  `short_description` mediumtext NOT NULL,
  `long_description` longtext NOT NULL,
  `thumb_image` mediumtext NOT NULL,
  `images` mediumtext NOT NULL,
  `quantity` int(11) NOT NULL,
<<<<<<< HEAD
  `old_price` decimal(8,2) NOT NULL,
  `new_price` decimal(8,2) NOT NULL,
  `related_products` text NOT NULL,
  `tags` text NOT NULL,
  `is_sale` tinyint(1) NOT NULL DEFAULT 0,
  `is_hot` tinyint(1) NOT NULL DEFAULT 0,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `is_deleted` tinyint(1) NOT NULL DEFAULT 0,
=======
  `price` decimal(7,2) NOT NULL,
  `old_price` decimal(7,2) NOT NULL,
  `related_products` text,
  `tags` text NOT NULL,
  `add_date` datetime NOT NULL,
  `is_sale` tinyint(1) NOT NULL DEFAULT '0',
  `is_hot` tinyint(1) NOT NULL DEFAULT '0',
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `is_deleted` tinyint(1) NOT NULL DEFAULT '0',
>>>>>>> 7a0667f849e90ca2023a3e4e797402951a5a6d3e
  PRIMARY KEY (`id`),
  KEY `vendor_id` (`vendor_id`),
  KEY `brand_id` (`brand_id`),
  KEY `category_id` (`category_id`),
  KEY `sub_category_id` (`sub_category_id`)
<<<<<<< HEAD
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `vendor_id`, `brand_id`, `category_id`, `sub_category_id`, `name`, `slug`, `sku`, `short_description`, `long_description`, `thumb_image`, `images`, `quantity`, `old_price`, `new_price`, `related_products`, `tags`, `is_sale`, `is_hot`, `is_active`, `is_deleted`) VALUES
(1, 1, 1, 2, 4, 'smart tv 108cm', 'smart-tv-108cm', 458964, 'dsfdsfdfadsafsfsdf\r\nfdsfdgdfg\r\nsdgdfgdf\r\nfgdfg', 'ffsdfsfdagdfhfghfg\r\ndfgdhfgshfgh\r\nsgdfhfghfgfg\r\nsgdfghghfghfg\r\nsdgg', 'assets/upload/products/tv1.jpg', 'a:2:{i:0;s:30:\"assets/upload/products/tv1.jpg\";i:1;s:30:\"assets/upload/products/tv5.jpg\";}', 0, '20000.00', '18000.00', '', 'tv,led-tv', 1, 0, 1, 0),
(2, 1, 4, 4, 3, 'smart watch', 'smart-watch', 4589769, 'dwfd', 'dsfdsf', 'assets/upload/products/watch_1.jpg', 'a:2:{i:0;s:30:\"assets/upload/products/tv1.jpg\";i:1;s:30:\"assets/upload/products/tv5.jpg\";}', 0, '15000.00', '10000.00', '', 'watch', 0, 1, 1, 0),
(3, 1, 1, 2, 4, 'Android TV', 'Android-TV', 7856948, 'dsfdsggg\r\ndfg\r\nddg', 'dsgdfgd\r\ndfgdfg\r\ndfgdfg\r\ndfag\r\n', 'assets/upload/products/tv2.jpg', 'a:2:{i:0;s:30:\"assets/upload/products/tv1.jpg\";i:1;s:30:\"assets/upload/products/tv5.jpg\";}', 10, '50000.00', '45000.00', '', 'led-tv', 0, 0, 1, 0),
(4, 1, 1, 2, 4, 'android LED 108 cm', 'android-LED-108-cm', 456985, 'qwdwddsdf', 'sffgdgdfgf\r\ndsgdfgdf\r\ndfgdfg\r\ndfag\r\nd', 'assets/upload/products/tv1.jpg', '', 11, '38000.00', '30000.00', '', 'tv', 1, 0, 1, 0),
(5, 1, 3, 4, 3, 'watch 3', 'watch-3', 789587, 'dfdsfdsfsf', 'sdfsdfdsfdsfdsf', 'assets/upload/products/watch_2.jpg', '', 4, '15000.00', '12000.00', '', 'watch', 1, 0, 1, 0),
(6, 1, 1, 4, 3, 'watch 4', 'watc-4', 789658, 'dgdfgdfg', 'dfgdhfhs', 'assets/upload/products/watch_3.jpg', '', 5, '1500.00', '1200.00', '', 'smart-watch', 0, 1, 1, 0),
(7, 1, 4, 2, 4, 'LED TV', 'LED-TV', 789654, 'dsad', 'adad', 'assets/upload/products/tv1.jpg', '', 10, '20000.00', '15000.00', '', 'tv', 0, 0, 1, 0),
(8, 1, 1, 2, 5, 'android mobile', 'android-mobile', 879589, 'dsfsdf', 'fsfsdf', 'assets/upload/products/tv1.jpg', '', 5, '20000.00', '12000.00', '', 'mobile', 0, 0, 1, 0),
(9, 1, 1, 2, 4, 'tv', 'tv', 7895647, 'sdsf', 'adadasd', 'assets/upload/products/tv1.jpg', '', 5, '20000.00', '10000.00', '', 'tv', 0, 0, 1, 0),
(10, 1, 1, 2, 4, 'LED TV 108 cm ', 'LED-TV-108-cm ', 789658, 'acacascas', 'saADSADSAD', 'assets/upload/products/tv1.jpg', 'a:2:{i:0;s:30:\"assets/upload/products/tv1.jpg\";i:1;s:30:\"assets/upload/products/tv5.jpg\";}', 10, '45000.00', '32000.00', '', 'tv', 0, 0, 1, 0),
(11, 1, 2, 1, 2, 'shirt', 'shirt', 799658, 'axcxzc', 'zxczxczxczxcsdfsd', 'assets/upload/products/shirt3.jpg', '', 10, '1500.00', '1250.00', '', 'shirt', 0, 0, 1, 0),
(12, 1, 3, 2, 5, 'mi mobile phone', 'mi-mobile-phone', 789456, 'sdfdg', 'dsfgsdg', 'assets/upload/products/tv1.jpg', '', 5, '18000.00', '15000.00', '', 'mi-mobile', 0, 0, 1, 0),
(13, 1, 5, 2, 10, 'earphone', 'earphone', 799658, 'cfddfc', 'nkjhkfd', 'assets/upload/products/watch_1.jpg', '', 10, '1800.00', '1250.00', '', 'ear-phone', 0, 0, 1, 0);

-- --------------------------------------------------------
=======
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
>>>>>>> 7a0667f849e90ca2023a3e4e797402951a5a6d3e

--
-- Dumping data for table `products`
--

<<<<<<< HEAD
DROP TABLE IF EXISTS `product_images`;
CREATE TABLE IF NOT EXISTS `product_images` (
  `product_id` int(11) NOT NULL,
  `image` mediumtext NOT NULL,
  `is_deleted` tinyint(1) NOT NULL DEFAULT 0,
  KEY `product_id` (`product_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
=======
INSERT INTO `products` (`id`, `vendor_id`, `brand_id`, `category_id`, `sub_category_id`, `name`, `sku`, `short_description`, `long_description`, `thumb_image`, `images`, `quantity`, `price`, `old_price`, `related_products`, `tags`, `add_date`, `is_sale`, `is_hot`, `is_active`, `is_deleted`) VALUES
(1, 1, 1, 1, 1, 'Nike Rn6', '8311-8a40', 'running shoes', 'nike brand, shoes for men, sports shoes', 'assets/uploads/products/1584331676-nike1.jpg', 'a:3:{i:0;s:45:\"assets/uploads/products/1584168342--nike4.jpg\";i:1;s:45:\"assets/uploads/products/1584168342--nike3.jpg\";i:2;s:45:\"assets/uploads/products/1584168342--nike2.jpg\";}', 7, '7350.35', '7850.35', 'N;', 'nike, shoes, running', '2020-03-09 07:20:19', 0, 1, 1, 0),
(2, 2, 2, 1, 1, 'Puma Tr-7', '222-2044', 'sports shoes', 'puma brand, shoes for men.', 'assets/uploads/products/1584331763-puma.png', 'a:4:{i:0;s:45:\"assets/uploads/products/1584332286--puma1.jpg\";i:1;s:45:\"assets/uploads/products/1584332286--puma3.png\";i:2;s:45:\"assets/uploads/products/1584332286--puma2.png\";i:3;s:45:\"assets/uploads/products/1584332286--puma4.png\";}', 9, '2280.06', '4560.12', 'a:1:{i:0;s:1:\"1\";}', 'puma, men shoes', '2020-03-01 10:12:43', 1, 1, 1, 0),
(3, 2, 4, 3, 5, 'Samsung-32', '2764-cb26', 'led tv', 'samsung brand, 32 led tv, samrt tv', 'assets/uploads/products/1584163197-tv1.jpg', 'a:4:{i:0;s:43:\"assets/uploads/products/1584163197--tv3.jpg\";i:1;s:43:\"assets/uploads/products/1584163197--tv2.jpg\";i:2;s:43:\"assets/uploads/products/1584163197--tv4.jpg\";i:3;s:43:\"assets/uploads/products/1584163197--tv6.jpg\";}', 23, '15400.00', '0.00', 'N;', 'tv, samsung, smart tv', '2020-03-04 17:18:10', 1, 0, 1, 0);
>>>>>>> 7a0667f849e90ca2023a3e4e797402951a5a6d3e

--
-- Dumping data for table `product_images`
--

INSERT INTO `product_images` (`product_id`, `image`, `is_deleted`) VALUES
(1, 'assets/upload/products/tv1.jpg,assets/upload/products/tv5.jpg,assets/upload/products/tv3.jpg', 0);

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

DROP TABLE IF EXISTS `reviews`;
CREATE TABLE IF NOT EXISTS `reviews` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `star_ratings` int(11) NOT NULL,
  `review` text NOT NULL,
  `is_deleted` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `product_id` (`product_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `user_id`, `product_id`, `star_ratings`, `review`, `is_deleted`) VALUES
(1, 1, 1, 3, 'fdsfdfdsf', 0),
(2, 3, 2, 5, 'hfvfg', 0),
(3, 1, 3, 2, 'dfdsfds', 0),
(4, 2, 3, 4, 'fd', 0);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
CREATE TABLE IF NOT EXISTS `roles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `permissions` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `permissions`) VALUES
(1, 'admin', '-'),
(2, 'user', '-');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

DROP TABLE IF EXISTS `settings`;
CREATE TABLE IF NOT EXISTS `settings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `value` varchar(500) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `name`, `value`) VALUES
(1, 'company_name', 'Gcart');

-- --------------------------------------------------------

--
-- Table structure for table `slider_settings`
--

DROP TABLE IF EXISTS `slider_settings`;
CREATE TABLE IF NOT EXISTS `slider_settings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) NOT NULL,
  `sub_title` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `image` mediumtext NOT NULL,
  `is_deleted` tinyint(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `subscriptions`
--

DROP TABLE IF EXISTS `subscriptions`;
CREATE TABLE IF NOT EXISTS `subscriptions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(30) NOT NULL,
  `cost` decimal(8,2) NOT NULL,
  `days` int(11) NOT NULL,
  `product_limit` int(11) NOT NULL,
  `description` text NOT NULL,
  `is_deleted` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subscriptions`
--

INSERT INTO `subscriptions` (`id`, `title`, `cost`, `days`, `product_limit`, `description`, `is_deleted`) VALUES
(1, '-', '11.00', 10, 1, '1', 0);

-- --------------------------------------------------------

--
-- Table structure for table `sub_categories`
--

DROP TABLE IF EXISTS `sub_categories`;
CREATE TABLE IF NOT EXISTS `sub_categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `slug` varchar(50) NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `is_deleted` tinyint(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`),
  UNIQUE KEY `slug` (`slug`),
  KEY `category_id` (`category_id`)
<<<<<<< HEAD
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;
=======
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
>>>>>>> 7a0667f849e90ca2023a3e4e797402951a5a6d3e

--
-- Dumping data for table `sub_categories`
--

INSERT INTO `sub_categories` (`id`, `category_id`, `name`, `slug`, `is_active`, `is_deleted`) VALUES
<<<<<<< HEAD
(1, 1, 'tops', 'tops', 1, 0),
(2, 1, 'shirts', 'shirts', 1, 0),
(3, 4, 'sport wear', 'sport_wear', 1, 0),
(4, 2, 'tv', 'tv', 1, 0),
(5, 2, 'mobile', 'mobile', 1, 0),
(6, 2, 'keyboards', 'keyboards', 1, 0),
(7, 3, 'ring', 'ring', 1, 0),
(8, 2, 'ac', 'ac', 1, 0),
(9, 2, 'laptop', 'laptop', 1, 0),
(10, 2, 'earphone', 'earphone', 1, 0),
(11, 2, 'data cable', 'data_cable', 1, 0),
(12, 2, 'fen', 'fen', 1, 0),
(13, 2, 'table fen', 'table_fen', 0, 0),
(14, 2, 'mouse', 'mouse', 1, 0),
(15, 2, 'monitor', 'monitor', 1, 0),
(16, 5, 'table carpate', 'table_carpate', 1, 0);
=======
(1, 1, 'shoes', 's-sh', 1, 0),
(2, 1, 'tracks', 'sp-track', 1, 0),
(3, 2, 'tracks', 'sp-tr', 1, 0),
(4, 3, 'mobile', 'mb-ele', 1, 0),
(5, 3, 'tv', 'ele-tv', 1, 0);
>>>>>>> 7a0667f849e90ca2023a3e4e797402951a5a6d3e

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `role_id` int(11) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `mobile` bigint(20) NOT NULL,
  `password` varchar(32) NOT NULL,
  `profile_image` mediumtext NOT NULL,
  `last_login` datetime NOT NULL,
  `last_ip` varchar(50) NOT NULL,
  `signup_date` datetime NOT NULL,
  `last_password_change` datetime DEFAULT NULL,
  `new_pass_key` varchar(32) NOT NULL,
  `new_pass_key_requested` datetime NOT NULL,
  `sign_up_key` varchar(32) NOT NULL,
  `is_email_verified` tinyint(1) NOT NULL,
  `is_active` tinyint(1) NOT NULL,
<<<<<<< HEAD
  `is_admin` tinyint(1) NOT NULL DEFAULT 0,
  `is_deleted` tinyint(1) NOT NULL,
=======
  `is_admin` tinyint(1) NOT NULL DEFAULT '0',
  `is_deleted` tinyint(1) NOT NULL DEFAULT '0',
>>>>>>> 7a0667f849e90ca2023a3e4e797402951a5a6d3e
  PRIMARY KEY (`id`),
  KEY `role_id` (`role_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `role_id`, `firstname`, `lastname`, `email`, `mobile`, `password`, `profile_image`, `last_login`, `last_ip`, `signup_date`, `last_password_change`, `new_pass_key`, `new_pass_key_requested`, `sign_up_key`, `is_email_verified`, `is_active`, `is_admin`, `is_deleted`) VALUES
(1, 1, 'bhavik', 'patel', 'bdp@narola.email', 9978554691, '53acf5f531943514246a7ed92f496a7d', '', '2020-03-20 17:01:17', '::1', '2020-02-27 12:11:21', '2020-03-13 14:58:30', '', '2020-02-24 03:04:19', '', 1, 1, 1, 0),
(2, 2, 'user', 'user', 'user@gmail.com', 7878787878, 'ee11cbb19052e40b07aac0ca060c23ee', '-', '2020-03-20 09:43:12', '::1', '2020-03-03 00:00:00', NULL, '-', '2020-03-03 00:00:00', '-', 1, 1, 0, 0),
(3, 2, 'anonymous', 'user', 'anonymous@gmail.com', 6565656565, '294de3557d9d00b3d2d8a1e6aab028cf', '-', '2020-03-12 12:28:39', '::1', '2020-03-03 00:00:00', NULL, '-', '2020-03-03 00:00:00', '-', 1, 1, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `users_address`
--

DROP TABLE IF EXISTS `users_address`;
CREATE TABLE IF NOT EXISTS `users_address` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `users_id` int(11) NOT NULL,
  `address_1` varchar(250) NOT NULL,
  `address_2` varchar(250) NOT NULL,
  `city` varchar(50) NOT NULL,
  `state` varchar(50) NOT NULL,
  `pincode` int(6) NOT NULL,
  `is_deleted` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `users_id` (`users_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users_address`
--

INSERT INTO `users_address` (`id`, `users_id`, `address_1`, `address_2`, `city`, `state`, `pincode`, `is_deleted`) VALUES
(1, 1, 'asw', 'mrl', 'navsari', 'gujarat', 396436, 0),
(2, 2, 'asw', 'mrl', 'navsari', 'gujarat', 396436, 0),
(3, 3, 'annyms-1', 'ayms-2', 'annnn', 'gujarat', 396436, 0);

-- --------------------------------------------------------

--
-- Table structure for table `user_auto_login`
--

DROP TABLE IF EXISTS `user_auto_login`;
CREATE TABLE IF NOT EXISTS `user_auto_login` (
  `key_id` char(32) NOT NULL,
  `user_id` int(11) NOT NULL,
  `user_agent` varchar(150) NOT NULL,
  `last_ip` varchar(40) NOT NULL,
  `last_login` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `vendors`
--

DROP TABLE IF EXISTS `vendors`;
CREATE TABLE IF NOT EXISTS `vendors` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `subscription_id` int(11) DEFAULT '0',
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `mobile` bigint(20) NOT NULL,
  `password` varchar(32) NOT NULL,
  `profile_image` mediumtext NOT NULL,
  `owner_name` varchar(50) NOT NULL,
  `shop_name` varchar(50) NOT NULL,
  `address` varchar(100) NOT NULL,
  `city` varchar(50) NOT NULL,
  `pincode` int(6) NOT NULL,
  `logo` mediumtext NOT NULL,
  `shop_number` int(11) NOT NULL,
  `registration_number` bigint(20) DEFAULT NULL,
  `subscribe_date` datetime NOT NULL,
  `shop_details` varchar(100) NOT NULL,
  `total_products` int(11) NOT NULL,
  `last_login` datetime NOT NULL,
  `last_ip` varchar(50) NOT NULL,
  `new_pass_key` varchar(32) NOT NULL,
  `new_pass_key_requested` datetime NOT NULL,
  `sign_up_key` varchar(32) NOT NULL,
  `last_password_change` datetime DEFAULT NULL,
  `is_email_verified` tinyint(1) NOT NULL,
  `is_active` tinyint(1) NOT NULL,
  `is_admin` tinyint(1) NOT NULL DEFAULT '0',
  `is_deleted` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `subscription_id` (`subscription_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vendors`
--

INSERT INTO `vendors` (`id`, `subscription_id`, `firstname`, `lastname`, `email`, `mobile`, `password`, `profile_image`, `owner_name`, `shop_name`, `address`, `city`, `pincode`, `logo`, `shop_number`, `registration_number`, `subscribe_date`, `shop_details`, `total_products`, `last_login`, `last_ip`, `new_pass_key`, `new_pass_key_requested`, `sign_up_key`, `last_password_change`, `is_email_verified`, `is_active`, `is_admin`, `is_deleted`) VALUES
(1, 1, 'bhavik', 'patel', 'bdp@narola.email', 9978554691, '53acf5f531943514246a7ed92f496a7d', 'assets/uploads/vendors/profile/1584168542-profile.png', 'admin', 'all in one sports store', 'mrl', 'surat', 396445, 'assets/uploads/vendors/logo/1584424639-logo_4.jpg', 7, 0, '2020-03-01 00:00:00', 'all sports items available', 50, '2020-03-01 00:00:00', '::1', '-', '2020-03-01 00:00:00', '-', '2020-03-02 14:58:30', 1, 1, 1, 0),
(2, 1, 'bdp', '7', 'bdp@mail.com', 9978554691, '53acf5f531943514246a7ed92f496a7d', 'assets/uploads/vendors/profile/1584163289-profile.png', '-', 'B7', '-', '-', 333333, 'assets/uploads/vendors/logo/1584424477-logo_1.jpg', 1212, 22, '2020-03-02 00:00:00', '-', 47, '2020-02-17 10:32:20', '::1', '', '2020-02-26 00:00:00', '', NULL, 1, 1, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

DROP TABLE IF EXISTS `wishlist`;
CREATE TABLE IF NOT EXISTS `wishlist` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `is_deleted` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `product_id` (`product_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `wishlist`
--

INSERT INTO `wishlist` (`id`, `user_id`, `product_id`, `is_deleted`) VALUES
(1, 1, 3, 0),
<<<<<<< HEAD
(2, 1, 4, 0),
(3, 1, 1, 0);
=======
(2, 1, 3, 0),
(3, 1, 2, 0);
>>>>>>> 7a0667f849e90ca2023a3e4e797402951a5a6d3e

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `cart_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Constraints for table `categories`
--
ALTER TABLE `categories`
  ADD CONSTRAINT `categories_ibfk_1` FOREIGN KEY (`banner_id`) REFERENCES `banners` (`id`);

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Constraints for table `hot_deals`
--
ALTER TABLE `hot_deals`
  ADD CONSTRAINT `hot_deals_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`coupon_id`) REFERENCES `coupons` (`id`),
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`),
  ADD CONSTRAINT `order_items_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_2` FOREIGN KEY (`brand_id`) REFERENCES `brands` (`id`),
  ADD CONSTRAINT `products_ibfk_3` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`),
  ADD CONSTRAINT `products_ibfk_4` FOREIGN KEY (`sub_category_id`) REFERENCES `sub_categories` (`id`),
  ADD CONSTRAINT `products_ibfk_5` FOREIGN KEY (`vendor_id`) REFERENCES `vendors` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `reviews_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `reviews_ibfk_3` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `sub_categories`
--
ALTER TABLE `sub_categories`
  ADD CONSTRAINT `sub_categories_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`);

--
-- Constraints for table `users_address`
--
ALTER TABLE `users_address`
  ADD CONSTRAINT `users_address_ibfk_1` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `vendors`
--
ALTER TABLE `vendors`
  ADD CONSTRAINT `vendors_ibfk_1` FOREIGN KEY (`subscription_id`) REFERENCES `subscriptions` (`id`);

--
-- Constraints for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD CONSTRAINT `wishlist_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `wishlist_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
