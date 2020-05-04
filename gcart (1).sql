-- phpMyAdmin SQL Dump
<<<<<<< HEAD
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 08, 2020 at 09:22 AM
-- Server version: 5.7.26
-- PHP Version: 7.2.18
=======
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 20, 2020 at 09:50 AM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.3.12
>>>>>>> 022d7a6b9ec5ea2eb26a67a83e61761003432976

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
  `banner` mediumtext NOT NULL,
<<<<<<< HEAD
  `is_deleted` tinyint(1) NOT NULL DEFAULT '0',
=======
  `is_deleted` tinyint(1) NOT NULL DEFAULT 0,
>>>>>>> 022d7a6b9ec5ea2eb26a67a83e61761003432976
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `banners`
--

INSERT INTO `banners` (`id`, `title`, `sub_title`, `description`, `banner`, `is_deleted`) VALUES
(1, 'test', 'Save up to 49% off', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit', 'assets/upload/banner/3.jpg', 0),
(2, 'sale', 'sale 80% off', 'cdsfdssgg', 'assets/upload/banner/2.jpg', 0),
(3, 'sale', 'Save up to 49% off', 'adads', 'assets/upload/banner/1.jpg', 0),
(4, 'sale', 'sale 80% off', 'aaSAsASa', 'assets/upload/banner/watch.jpg', 0);

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
  `is_deleted` tinyint(1) NOT NULL DEFAULT '0',
=======
  `is_deleted` tinyint(1) NOT NULL DEFAULT 0,
>>>>>>> 022d7a6b9ec5ea2eb26a67a83e61761003432976
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `name`, `logo`, `is_deleted`) VALUES
(1, 'nike', 'assets/uploads/brands/dell.png', 0),
(2, 'puma', 'assets/uploads/brands/dell.png', 0),
(4, 'samsung', 'assets/uploads/brands/dell.png', 0),
(5, 'google', 'assets/uploads/brands/dell.png', 0),
(6, 'dell', 'assets/uploads/brands/dell.png', 0),
(7, 'nike', 'assets/uploads/brands/nike.png', 0),
(8, 'blueline', 'assets/uploads/brands/brand3.png', 0),
(9, 'caferacer', 'assets/uploads/brands/brand6.png', 0),
(10, 'hot foil', 'assets/uploads/brands/brand1.png', 0),
(11, 'get lucky', 'assets/uploads/brands/brand2.png', 0),
(12, 'lifestyle', 'assets/uploads/brands/lifestyle.png', 0),
(13, 'adidas', 'assets/uploads/brands/adidas.png', 0);

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
<<<<<<< HEAD
=======
  `user_ip` varchar(50) NOT NULL,
>>>>>>> 022d7a6b9ec5ea2eb26a67a83e61761003432976
  `date` datetime NOT NULL,
  `is_deleted` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `product_id` (`product_id`)
<<<<<<< HEAD
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
=======
) ENGINE=InnoDB AUTO_INCREMENT=124 DEFAULT CHARSET=latin1;
>>>>>>> 022d7a6b9ec5ea2eb26a67a83e61761003432976

--
-- Dumping data for table `cart`
--

<<<<<<< HEAD
INSERT INTO `cart` (`id`, `user_id`, `product_id`, `quantity`, `total_amount`, `date`, `is_deleted`) VALUES
(1, 1, 2, 2, '9120.24', '2020-03-20 10:54:29', 0),
(2, 1, 3, 2, '30800.00', '2020-03-20 10:54:41', 0),
(3, 1, 1, 1, '7850.35', '2020-03-30 04:09:30', 0);
=======
INSERT INTO `cart` (`id`, `user_id`, `product_id`, `quantity`, `total_amount`, `user_ip`, `date`, `is_deleted`) VALUES
(1, 1, 2, 6, '60000.00', '::1', '2020-03-20 10:54:29', 1),
(2, 1, 3, 8, '99999.99', '::1', '2020-03-20 10:54:41', 1),
(3, 2, 1, 5, '90000.00', '::1', '2020-03-30 04:09:30', 0),
(7, 2, 5, 2, '99999.99', '::1', '2020-04-15 12:22:08', 0),
(11, NULL, 2, 10, '2332.00', '::1', '2020-04-02 00:00:00', 1),
(28, NULL, 2, 1, '10000.00', '::2', '2020-04-16 02:49:18', 0),
(42, NULL, 4, 10, '99999.99', '::1', '2020-04-16 05:19:09', 1),
(54, 1, 4, 5, '99999.99', '::1', '2020-04-16 05:43:47', 1),
(60, NULL, 5, 1, '12000.00', '::1', '2020-04-16 05:56:39', 1),
(62, NULL, 11, 34, '42500.00', '::1', '2020-04-17 10:17:12', 1),
(63, 1, 5, 2, '24000.00', '::1', '2020-04-17 03:26:04', 1),
(64, 1, 8, 1, '12000.00', '::1', '2020-04-17 03:27:51', 1),
(65, 1, 12, 12, '99999.99', '::1', '2020-04-17 03:28:05', 0),
(66, 1, 11, 15, '18750.00', '::1', '2020-04-17 03:57:27', 1),
(67, NULL, 4, 1, '30000.00', '::1', '2020-04-17 04:38:31', 1),
(68, NULL, 5, 1, '12000.00', '::1', '2020-04-17 04:38:35', 1),
(84, NULL, 8, 1, '12000.00', '::1', '2020-04-17 06:30:39', 1),
(85, NULL, 8, 2, '24000.00', '::1', '2020-04-17 06:33:50', 1),
(86, NULL, 11, 1, '1250.00', '::1', '2020-04-18 09:45:48', 1),
(87, NULL, 11, 1, '1250.00', '::1', '2020-04-18 09:47:03', 1),
(88, NULL, 11, 1, '1250.00', '::1', '2020-04-18 09:47:22', 1),
(89, NULL, 11, 1, '1250.00', '::1', '2020-04-18 09:47:40', 1),
(90, NULL, 11, 1, '1250.00', '::1', '2020-04-18 09:48:27', 1),
(91, NULL, 11, 1, '1250.00', '::1', '2020-04-18 09:49:18', 1),
(92, NULL, 11, 1, '1250.00', '::1', '2020-04-18 09:49:58', 1),
(93, NULL, 11, 1, '1250.00', '::1', '2020-04-18 09:50:38', 1),
(94, NULL, 11, 1, '1250.00', '::1', '2020-04-18 09:51:19', 1),
(95, NULL, 11, 1, '1250.00', '::1', '2020-04-18 09:51:54', 1),
(96, NULL, 11, 1, '1250.00', '::1', '2020-04-18 09:52:21', 1),
(97, NULL, 11, 1, '1250.00', '::1', '2020-04-18 09:54:01', 1),
(98, NULL, 11, 2, '2500.00', '::1', '2020-04-18 09:58:02', 1),
(99, NULL, 11, 1, '1250.00', '::1', '2020-04-18 10:00:03', 1),
(100, NULL, 11, 2, '2500.00', '::1', '2020-04-18 10:00:22', 1),
(101, NULL, 11, 2, '2500.00', '::1', '2020-04-18 10:01:12', 1),
(102, NULL, 11, 2, '2500.00', '::1', '2020-04-18 10:02:13', 1),
(103, NULL, 11, 1, '1250.00', '::1', '2020-04-18 10:02:48', 1),
(104, NULL, 11, 3, '3750.00', '::1', '2020-04-18 10:03:12', 1),
(105, NULL, 4, 1, '30000.00', '::1', '2020-04-18 10:03:27', 1),
(106, 1, 1, 2, '36000.00', '::1', '2020-04-18 11:56:18', 1),
(107, 1, 1, 11, '99999.99', '::1', '2020-04-18 02:06:26', 1),
(108, 1, 1, 18, '99999.99', '::1', '2020-04-18 02:45:49', 1),
(109, 1, 2, 3, '30000.00', '::1', '2020-04-18 02:59:46', 1),
(110, 1, 3, 1, '45000.00', '::1', '2020-04-18 03:04:44', 1),
(111, NULL, 9, 25, '99999.99', '::1', '2020-04-18 07:24:34', 0),
(112, 1, 4, 16, '99999.99', '::1', '2020-04-18 07:25:35', 1),
(113, 1, 11, 13, '16250.00', '::1', '2020-04-18 07:26:17', 1),
(114, NULL, 5, 2, '24000.00', '::1', '2020-04-18 07:28:36', 1),
(115, NULL, 5, 2, '24000.00', '::1', '2020-04-18 07:28:47', 0),
(116, 1, 5, 2, '24000.00', '::1', '2020-04-18 07:30:04', 1),
(117, 1, 8, 3, '36000.00', '::1', '2020-04-18 08:24:49', 0),
(118, 1, 3, 1, '45000.00', '::1', '2020-04-18 09:52:26', 1),
(119, NULL, 4, 1, '30000.00', '::1', '2020-04-20 10:12:57', 0),
(120, NULL, 11, 2, '2500.00', '::1', '2020-04-20 11:23:45', 0),
(121, 56, 8, 1, '12000.00', '::1', '2020-04-20 12:25:54', 0),
(122, 56, 12, 1, '15000.00', '::1', '2020-04-20 12:26:04', 0),
(123, 56, 3, 3, '99999.99', '::1', '2020-04-20 03:05:25', 0);
>>>>>>> 022d7a6b9ec5ea2eb26a67a83e61761003432976

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
  `is_header` tinyint(1) NOT NULL DEFAULT '0',
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `is_deleted` tinyint(1) NOT NULL DEFAULT '0',
=======
  `is_header` tinyint(1) NOT NULL DEFAULT 0,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `is_deleted` tinyint(1) NOT NULL DEFAULT 0,
>>>>>>> 022d7a6b9ec5ea2eb26a67a83e61761003432976
  PRIMARY KEY (`id`),
  UNIQUE KEY `slug` (`slug`),
  KEY `banner_id` (`banner_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `banner_id`, `name`, `slug`, `icon`, `is_header`, `is_active`, `is_deleted`) VALUES
(1, 1, 'clothing', 'clothing', 'fa-shopping-bag', 1, 1, 0),
(2, 2, 'electronics', 'electronics-shop', 'fa-laptop', 1, 1, 0),
(3, 1, 'jewellery', 'jewellery', 'fa-diamond', 1, 1, 0),
(4, 4, 'watches', 'watches', 'fa-clock-o', 1, 1, 0),
(5, 3, 'home and garden', 'homeandgarden', 'fa-envira', 1, 1, 0),
(6, 2, 'sport', 'sport', 'fa-futbol-o', 0, 1, 0);

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
<<<<<<< HEAD
  `is_deleted` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `product_id` (`product_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
=======
  `add_date` datetime NOT NULL DEFAULT current_timestamp(),
  `is_deleted` tinyint(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`),
  KEY `product_id` (`product_id`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=latin1;
>>>>>>> 022d7a6b9ec5ea2eb26a67a83e61761003432976

--
-- Dumping data for table `comments`
--

<<<<<<< HEAD
INSERT INTO `comments` (`id`, `product_id`, `user_name`, `user_email`, `comment`, `is_deleted`) VALUES
(1, 2, 'patel', 'patel@mail.com', 'nice product', 0),
(2, 3, 'patel2', 'patel7@mail.com', 'product', 0),
(3, 1, 'patel', 'patel7@mail.com', 'product', 0),
(4, 3, 'patel', 'patel44@mail.com', 'product', 0);
=======
INSERT INTO `comments` (`id`, `product_id`, `user_name`, `user_email`, `comment`, `add_date`, `is_deleted`) VALUES
(1, 2, 'patel', 'patel@mail.com', 'nice product', '2020-04-10 11:54:46', 0),
(2, 4, 'patel2', 'patel7@mail.com', 'product sdcss', '2020-04-08 11:54:46', 0),
(3, 1, 'patel', 'patel7@mail.com', 'product', '2020-04-10 11:54:46', 0),
(4, 3, 'patel', 'patel44@mail.com', 'product', '2020-04-01 11:54:46', 0),
(13, 4, 'komalproject', 'kdc@narola.email', 'aaaaaaaaaaaaaaaa', '2020-04-10 07:19:16', 0),
(16, 4, 'komalproject', 'kdc@narola.email', 'good products', '2020-04-11 10:33:01', 0),
(17, 7, 'komalproject', 'kdc@narola.email', 'aaaaaaaaaaa', '2020-04-11 10:45:30', 0),
(18, 3, 'komalproject', 'kdc@narola.email', 'aaaaaaaaaa', '2020-04-11 11:46:56', 0),
(19, 5, 'komalproject', 'kdc@narola.email', 'gooooooooooood', '2020-04-11 11:51:15', 0),
(20, 5, 'komalproject', 'kdc@narola.email', 'aaaaaaaaaaaaaaaaa', '2020-04-11 11:55:43', 0),
(24, 1, 'aaa', 'kdc@narola.email', 'aaaaaaaaaaaa', '2020-04-11 03:19:34', 0),
(25, 3, 'komalproject', 'kdc@narola.email', 'aaaaaaaaaa', '2020-04-13 11:42:25', 0),
(26, 4, 'komalproject', 'kdc@narola.email', 'aaaaaaaaaaa', '2020-04-13 06:38:42', 0),
(27, 4, 'komalproject', 'kdc@narola.email', 'ASD-scs=xcsc', '2020-04-13 06:39:14', 0),
(28, 11, 'komalproject', 'kdc@narola.email', 'goood products', '2020-04-14 09:46:14', 0),
(29, 2, 'komalproject', 'kdc@narola.email', 'aaaaaaaaaaaaa', '2020-04-14 10:13:37', 0),
(30, 2, 'komalproject', 'kdc@narola.email', 'aaaaaaaaaaaaaaaa', '2020-04-14 11:22:27', 0),
(31, 2, 'komalproject', 'kdc@narola.email', 'aaaaaaaaaaaaaaa', '2020-04-14 11:31:44', 0),
(32, 4, 'komalproject', 'kdc@narola.email', 'sasasaasasasa', '2020-04-15 10:03:58', 0),
(33, 2, 'komalproject', 'kdc@narola.email', 'aaaaaaaaaaaaaa', '2020-04-15 04:07:42', 0);
>>>>>>> 022d7a6b9ec5ea2eb26a67a83e61761003432976

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
<<<<<<< HEAD
  `used` int(11) NOT NULL DEFAULT '0',
  `start_date` datetime DEFAULT NULL,
  `end_date` datetime DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `is_deleted` tinyint(1) NOT NULL DEFAULT '0',
=======
  `used` int(11) NOT NULL DEFAULT 0,
  `start_date` datetime DEFAULT NULL,
  `end_date` datetime DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `is_deleted` tinyint(1) NOT NULL DEFAULT 0,
>>>>>>> 022d7a6b9ec5ea2eb26a67a83e61761003432976
  PRIMARY KEY (`id`),
  UNIQUE KEY `code` (`code`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `coupons`
--

INSERT INTO `coupons` (`id`, `code`, `type`, `amount`, `quantity`, `used`, `start_date`, `end_date`, `is_active`, `is_deleted`) VALUES
(1, 'code', 0, 500, 10, 0, '2020-03-31 00:00:00', '2022-03-30 00:00:00', 1, 0),
(2, 'shop30', 1, 30, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1, 0),
(3, 'cart600', 0, 600, 0, 0, '2020-03-21 00:00:00', '2020-05-16 00:00:00', 1, 0),
(4, 'shoe70', 1, 70, 50, 0, '2020-03-20 00:00:00', '2020-03-28 00:00:00', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `email_templates`
--

DROP TABLE IF EXISTS `email_templates`;
CREATE TABLE IF NOT EXISTS `email_templates` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `slug` varchar(100) CHARACTER SET latin1 NOT NULL,
  `name` mediumtext CHARACTER SET latin1 NOT NULL,
  `subject` mediumtext CHARACTER SET latin1 NOT NULL,
  `message` text CHARACTER SET latin1 NOT NULL,
  `placeholders` longtext CHARACTER SET latin1 NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `slug` (`slug`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `email_templates`
--

INSERT INTO `email_templates` (`id`, `slug`, `name`, `subject`, `message`, `placeholders`) VALUES
(2, 'new-user-signup', 'New User Sign Up', 'Welcome {company_name}', '<p></p><p></p><p></p><h1><b>Dear {firstname} {lastname}</b></h1><br>Thank you for registering on {company_name}.<br><br>We just wanted to say welcome.<br><br>Please contact us if you need any help.<br><br>Click the link below to verify your email<p></p><p><a href=\"{email_verification_url}\" target=\"_blank\">Verify Your Email</a><br><br>Kind Regards, <br>{email_signature}<br><br>(This is an automated email, so please don\\\'t reply to this email address)<br></p><p></p><p></p><p></p>', 'a:5:{s:11:\"{firstname}\";s:14:\"User Firstname\";s:10:\"{lastname}\";s:13:\"User Lastname\";s:24:\"{email_verification_url}\";s:22:\"Email Verification URL\";s:17:\"{email_signature}\";s:15:\"Email Signature\";s:14:\"{company_name}\";s:12:\"Company Name\";}'),
(1, 'forgot-password', 'Forgot Password', 'Reset Password Instructions', '<h2></h2><h3 style=\"text-align: justify; \"><span style=\"font-size: 14pt;\">Hello {firstname} {lastname},</span></h3><p style=\"text-align: justify; \"><span style=\"font-size: 13px; letter-spacing: normal;\">Someone, hopefully, you, has requested to reset the password for your&nbsp;</span>{company_name} account with email <b>{email}</b>.</p><span style=\"font-size: 13px; letter-spacing: normal; color: inherit; font-family: inherit;\"><p style=\"text-align: justify;\"><span style=\"color: inherit; font-family: inherit;\">If you did not perform this request, you can safely ignore this email&nbsp;</span>and your password will remain the same.&nbsp;<span style=\"color: inherit; font-family: inherit;\">Otherwise, click the link below to complete the process.</span></p><p style=\"text-align: justify;\"><a href=\"{reset_password_link}\" target=\"_blank\" style=\"font-family: inherit; background-color: rgb(255, 255, 255);\">Reset Password</a></p><p style=\"text-align: justify;\">Please note that this link is valid for next 1 hour only. You won\'t be able to change the password after the link gets expired.</p></span><p></p><p style=\"text-align: justify; \"><span style=\"font-size: 13px; letter-spacing: normal; color: inherit; font-family: inherit;\">Regards,</span></p><p style=\"text-align: justify; \"><span style=\"color: inherit; font-family: inherit; font-size: 13px; letter-spacing: normal;\">{company_name}</span></p>', 'a:6:{s:11:\"{firstname}\";s:14:\"User Firstname\";s:10:\"{lastname}\";s:13:\"User Lastname\";s:7:\"{email}\";s:10:\"User Email\";s:20:\"{reset_password_url}\";s:18:\"Reset Password URL\";s:17:\"{email_signature}\";s:15:\"Email Signature\";s:14:\"{company_name}\";s:12:\"Company Name\";}'),
(4, 'loader', 'loader', '', '', 'a:5:{s:5:\"{img}\";s:4:\"logo\";s:17:\"{www/google.com/}\";s:23:\"email_verification_url	\";s:17:\"{email_signature}\";s:15:\"Email Signature\";s:14:\"{company_name}\";s:12:\"Company Name\";s:6:\"{logo}\";s:3:\"img\";}'),
(3, 'logo', 'logo', 'trial', '<p>{www/google.com/}</p><p>ijvjfvfv<br></p>', 'a:5:{s:5:\"{img}\";s:4:\"logo\";s:17:\"{www/google.com/}\";s:23:\"email_verification_url	\";s:17:\"{email_signature}\";s:15:\"Email Signature\";s:14:\"{company_name}\";s:12:\"Company Name\";s:6:\"{logo}\";s:3:\"img\";}');

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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

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
  `type` tinyint(1) NOT NULL,
  `value` bigint(20) NOT NULL,
  `start_date` datetime NOT NULL,
  `end_date` datetime NOT NULL,
  `off_percentage` varchar(20) NOT NULL,
<<<<<<< HEAD
  `is_deleted` tinyint(1) NOT NULL DEFAULT '0',
=======
  `is_deleted` tinyint(1) NOT NULL DEFAULT 0,
>>>>>>> 022d7a6b9ec5ea2eb26a67a83e61761003432976
  PRIMARY KEY (`id`),
  KEY `product_id` (`product_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hot_deals`
--

INSERT INTO `hot_deals` (`id`, `product_id`, `type`, `value`, `start_date`, `end_date`, `off_percentage`, `is_deleted`) VALUES
<<<<<<< HEAD
(3, 1, 1, 60, '2020-03-31 00:00:00', '2020-04-25 00:00:00', '35', 0),
(4, 5, 0, 500, '2020-04-04 19:55:00', '2020-04-06 19:57:27', '35', 0),
(5, 4, 0, 1000, '2020-04-02 00:00:00', '2020-04-24 00:00:00', '', 0);
=======
(3, 1, 1, 60, '2020-03-31 00:00:00', '2020-04-12 00:00:00', '35', 0),
(4, 5, 0, 500, '2020-04-14 00:00:00', '2020-04-30 19:57:27', '35', 0),
(5, 4, 0, 1000, '2020-04-13 00:00:00', '2020-04-24 00:00:00', '', 0);
>>>>>>> 022d7a6b9ec5ea2eb26a67a83e61761003432976

-- --------------------------------------------------------

--
-- Table structure for table `news_letters`
--

DROP TABLE IF EXISTS `news_letters`;
CREATE TABLE IF NOT EXISTS `news_letters` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(50) NOT NULL,
<<<<<<< HEAD
  `created_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `is_deleted` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
=======
  `created_date` datetime NOT NULL DEFAULT current_timestamp(),
  `is_deleted` tinyint(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=138 DEFAULT CHARSET=latin1;
>>>>>>> 022d7a6b9ec5ea2eb26a67a83e61761003432976

--
-- Dumping data for table `news_letters`
--

INSERT INTO `news_letters` (`id`, `email`, `created_date`, `is_deleted`) VALUES
(1, 'bdp@narola.email', '2020-03-11 00:00:00', 0),
(2, 'vrp@narola.email', '2020-04-03 17:26:04', 0),
(3, 'vrtp@narola.email', '2020-04-04 12:16:27', 0),
<<<<<<< HEAD
(4, 'vixutipatel129@gmail.com', '2020-04-06 19:57:33', 0);
=======
(4, 'vixutipatel129@gmail.com', '2020-04-06 19:57:33', 0),
(128, 'kdc@narola.email', '2020-04-11 10:17:12', 0),
(130, 'komal@gmail.com', '2020-04-14 10:30:37', 0),
(134, 'ss@gmail.com', '2020-04-14 10:34:47', 0),
(136, 'ADSAD@DXGDG', '2020-04-14 10:35:29', 0),
(137, 'aa@gmail.com', '2020-04-17 09:34:50', 0);
>>>>>>> 022d7a6b9ec5ea2eb26a67a83e61761003432976

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE IF NOT EXISTS `orders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
<<<<<<< HEAD
  `coupon_id` int(11) DEFAULT '0',
=======
  `coupon_id` int(11) DEFAULT 0,
>>>>>>> 022d7a6b9ec5ea2eb26a67a83e61761003432976
  `order_number` varchar(32) NOT NULL,
  `invoice_number` bigint(20) NOT NULL,
  `total_products` int(11) NOT NULL,
  `grand_total` decimal(7,2) NOT NULL,
  `order_date` date NOT NULL,
  `order_status` tinyint(1) NOT NULL,
  `payment_method` varchar(20) NOT NULL DEFAULT 'cash on delivery',
<<<<<<< HEAD
  `payment_status` tinyint(1) NOT NULL DEFAULT '0',
  `is_deleted` tinyint(1) NOT NULL DEFAULT '0',
=======
  `payment_status` tinyint(1) NOT NULL DEFAULT 0,
  `is_deleted` tinyint(1) NOT NULL DEFAULT 0,
>>>>>>> 022d7a6b9ec5ea2eb26a67a83e61761003432976
  PRIMARY KEY (`id`),
  UNIQUE KEY `order_number` (`order_number`),
  KEY `coupon_id` (`coupon_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `coupon_id`, `order_number`, `invoice_number`, `total_products`, `grand_total`, `order_date`, `order_status`, `payment_method`, `payment_status`, `is_deleted`) VALUES
(1, 2, NULL, '7490285', 6584130147, 4, '24820.94', '2020-03-04', 1, 'cash on delivery', 1, 0),
(2, 3, NULL, '7654321', 972014563, 6, '55620.94', '2020-03-10', 0, 'cash on delivery', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

DROP TABLE IF EXISTS `order_items`;
CREATE TABLE IF NOT EXISTS `order_items` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
<<<<<<< HEAD
  `vendor_status` tinyint(1) NOT NULL DEFAULT '0',
  `quantity` int(11) NOT NULL,
  `total_amount` decimal(7,2) NOT NULL,
  `is_deleted` tinyint(1) NOT NULL DEFAULT '0',
=======
  `vendor_status` tinyint(1) NOT NULL DEFAULT 0,
  `quantity` int(11) NOT NULL,
  `total_amount` decimal(7,2) NOT NULL,
  `is_deleted` tinyint(1) NOT NULL DEFAULT 0,
>>>>>>> 022d7a6b9ec5ea2eb26a67a83e61761003432976
  PRIMARY KEY (`id`),
  KEY `order_id` (`order_id`),
  KEY `product_id` (`product_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`id`, `order_id`, `product_id`, `vendor_status`, `quantity`, `total_amount`, `is_deleted`) VALUES
(1, 1, 1, 1, 2, '15700.70', 0),
(2, 1, 2, 1, 2, '9120.24', 0),
(3, 2, 3, 0, 2, '30800.00', 0),
(4, 2, 2, 0, 2, '9120.24', 0);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `vendor_id` int(11) NOT NULL,
  `brand_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `sub_category_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `slug` varchar(50) NOT NULL,
  `sku` int(11) NOT NULL,
  `short_description` mediumtext NOT NULL,
  `long_description` longtext NOT NULL,
  `thumb_image` mediumtext NOT NULL,
  `images` mediumtext NOT NULL,
  `quantity` int(11) NOT NULL,
  `old_price` decimal(8,2) NOT NULL,
  `price` decimal(8,2) NOT NULL,
  `related_products` text NOT NULL,
  `tags` text NOT NULL,
<<<<<<< HEAD
  `add_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `is_sale` tinyint(1) NOT NULL DEFAULT '0',
  `is_hot` tinyint(1) NOT NULL DEFAULT '0',
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `is_deleted` tinyint(1) NOT NULL DEFAULT '0',
=======
  `add_date` datetime NOT NULL DEFAULT current_timestamp(),
  `is_sale` tinyint(1) NOT NULL DEFAULT 0,
  `is_hot` tinyint(1) NOT NULL DEFAULT 0,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `is_deleted` tinyint(1) NOT NULL DEFAULT 0,
>>>>>>> 022d7a6b9ec5ea2eb26a67a83e61761003432976
  PRIMARY KEY (`id`),
  KEY `vendor_id` (`vendor_id`),
  KEY `brand_id` (`brand_id`),
  KEY `category_id` (`category_id`),
  KEY `sub_category_id` (`sub_category_id`)
<<<<<<< HEAD
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;
=======
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=latin1;
>>>>>>> 022d7a6b9ec5ea2eb26a67a83e61761003432976

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `vendor_id`, `brand_id`, `category_id`, `sub_category_id`, `name`, `slug`, `sku`, `short_description`, `long_description`, `thumb_image`, `images`, `quantity`, `old_price`, `price`, `related_products`, `tags`, `add_date`, `is_sale`, `is_hot`, `is_active`, `is_deleted`) VALUES
<<<<<<< HEAD
(1, 1, 1, 2, 4, 'smart tv 108cm', 'smart-tv-108cm', 458964, 'dsfdsfdfadsafsfsdf\r\nfdsfdgdfg\r\nsdgdfgdf\r\nfgdfg', 'ffsdfsfdagdfhfghfg\r\ndfgdhfgshfgh\r\nsgdfhfghfgfg\r\nsgdfghghfghfg\r\nsdgg', 'assets/upload/products/tv1.jpg', 'a:2:{i:0;s:30:\"assets/upload/products/tv1.jpg\";i:1;s:30:\"assets/upload/products/tv5.jpg\";}', 0, '20000.00', '18000.00', 'a:1:{i:0;s:1:\"1\";}', 'tv,led-tv', '2020-04-08 11:40:48', 1, 0, 1, 0),
(2, 1, 4, 4, 3, 'smart watch', 'smart-watch', 4589769, 'dwfd', 'dsfdsf', 'assets/upload/products/watch_1.jpg', 'a:2:{i:0;s:30:\"assets/upload/products/tv1.jpg\";i:1;s:30:\"assets/upload/products/tv5.jpg\";}', 0, '15000.00', '10000.00', 'a:1:{i:0;s:1:\"1\";}', 'watch', '2020-04-08 11:40:48', 0, 1, 1, 0),
(3, 1, 1, 2, 4, 'Android TV', 'Android-TV', 7856948, 'dsfdsggg\r\ndfg\r\nddg', 'dsgdfgd\r\ndfgdfg\r\ndfgdfg\r\ndfag\r\n', 'assets/upload/products/tv2.jpg', 'a:2:{i:0;s:30:\"assets/upload/products/tv1.jpg\";i:1;s:30:\"assets/upload/products/tv5.jpg\";}', 10, '50000.00', '45000.00', 'a:1:{i:0;s:1:\"1\";}', 'led-tv', '2020-04-08 11:40:48', 0, 0, 1, 0),
(4, 1, 1, 2, 4, 'android LED 108 cm', 'android-LED-108-cm', 456985, 'qwdwddsdf', 'sffgdgdfgf\r\ndsgdfgdf\r\ndfgdfg\r\ndfag\r\nd', 'assets/upload/products/tv1.jpg', '', 11, '38000.00', '30000.00', 'a:1:{i:0;s:1:\"1\";}', 'tv', '2020-04-08 11:40:48', 1, 0, 1, 0),
(5, 1, 3, 4, 3, 'watch 3', 'watch-3', 789587, 'dfdsfdsfsf', 'sdfsdfdsfdsfdsf', 'assets/upload/products/watch_2.jpg', '', 4, '15000.00', '12000.00', '', 'watch', '2020-04-08 11:40:48', 1, 0, 1, 0),
(6, 1, 1, 4, 3, 'watch 4', 'watc-4', 789658, 'dgdfgdfg', 'dfgdhfhs', 'assets/upload/products/watch_3.jpg', '', 5, '1500.00', '1200.00', '', 'smart-watch', '2020-04-08 11:40:48', 0, 1, 1, 0),
(7, 1, 4, 2, 4, 'LED TV', 'LED-TV', 789654, 'dsad', 'adad', 'assets/upload/products/tv1.jpg', '', 10, '20000.00', '15000.00', '', 'tv', '2020-04-08 11:40:48', 0, 0, 1, 0),
(8, 1, 1, 2, 5, 'android mobile', 'android-mobile', 879589, 'dsfsdf', 'fsfsdf', 'assets/upload/products/tv1.jpg', '', 5, '20000.00', '12000.00', '', 'mobile', '2020-04-08 11:40:48', 0, 0, 1, 0),
=======
(1, 1, 1, 2, 4, 'smart tv 108cm', 'smart-tv-108cm', 458964, 'dsfdsfdfadsafsfsdf\r\nfdsfdgdfg\r\nsdgdfgdf\r\nfgdfg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', 'assets/upload/products/tv1.jpg', 'a:2:{i:0;s:30:\"assets/upload/products/tv1.jpg\";i:1;s:30:\"assets/upload/products/tv5.jpg\";}', 0, '20000.00', '18000.00', 'a:1:{i:0;s:1:\"1\";}', 'tv,led-tv', '2020-04-08 11:40:48', 1, 0, 1, 0),
(2, 1, 4, 4, 3, 'smart watch', 'smart-watch', 4589769, 'dwfd', 'dsfdsf', 'assets/upload/products/watch_1.jpg', 'a:2:{i:0;s:30:\"assets/upload/products/tv1.jpg\";i:1;s:30:\"assets/upload/products/tv5.jpg\";}', 5, '15000.00', '10000.00', 'a:1:{i:0;s:1:\"1\";}', 'watch,smart-watch', '2020-04-08 11:40:48', 0, 1, 1, 0),
(3, 1, 1, 2, 4, 'Android TV', 'Android-TV', 7856948, 'dsfdsggg\r\ndfg\r\nddg', 'dsgdfgd\r\ndfgdfg\r\ndfgdfg\r\ndfag\r\n', 'assets/upload/products/tv2.jpg', 'a:2:{i:0;s:30:\"assets/upload/products/tv1.jpg\";i:1;s:30:\"assets/upload/products/tv5.jpg\";}', 10, '50000.00', '45000.00', 'a:1:{i:0;s:1:\"1\";}', 'led-tv', '2020-04-08 11:40:48', 0, 0, 1, 0),
(4, 1, 1, 2, 4, 'android LED 108 cm', 'android-LED-108-cm', 456985, 'qwdwddsdf', 'sffgdgdfgf\r\ndsgdfgdf\r\ndfgdfg\r\ndfag\r\nd', 'assets/upload/products/tv1.jpg', '', 11, '38000.00', '30000.00', 'a:1:{i:0;s:1:\"1\";}', 'tv,aaa,w2ww', '2020-04-08 11:40:48', 1, 0, 1, 0),
(5, 1, 3, 4, 3, 'watch 3', 'watch-3', 789587, 'dfdsfdsfsf', 'sdfsdfdsfdsfdsf', 'assets/upload/products/watch_2.jpg', '', 4, '15000.00', '12000.00', '', 'watch', '2020-04-08 11:40:48', 1, 0, 1, 0),
(6, 1, 1, 4, 3, 'watch 4', 'watc-4', 789658, 'dgdfgdfg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', 'assets/upload/products/watch_3.jpg', '', 5, '1500.00', '1200.00', '', 'smart-watch', '2020-04-08 11:40:48', 0, 1, 1, 0),
(7, 1, 4, 2, 4, 'LED TV', 'LED-TV', 789654, 'dsad', 'adad', 'assets/upload/products/tv1.jpg', '', 10, '20000.00', '15000.00', '', 'tv', '2020-04-08 11:40:48', 0, 0, 1, 0),
(8, 1, 1, 2, 5, 'android mobile', 'android-mobile', 879589, 'dsfsdf', 'fsfsdf', 'assets/upload/products/tv1.jpg', '', 5, '20000.00', '12000.00', '', 'mobile,smart-mobile ', '2020-04-08 11:40:48', 0, 0, 1, 0),
>>>>>>> 022d7a6b9ec5ea2eb26a67a83e61761003432976
(9, 1, 1, 2, 4, 'tv', 'tv', 7895647, 'sdsf', 'adadasd', 'assets/upload/products/tv1.jpg', '', 5, '20000.00', '10000.00', '', 'tv', '2020-04-08 11:40:48', 0, 0, 1, 0),
(10, 1, 1, 2, 4, 'LED TV 108 cm ', 'LED-TV-108-cm ', 789658, 'acacascas', 'saADSADSAD', 'assets/upload/products/tv1.jpg', 'a:2:{i:0;s:30:\"assets/upload/products/tv1.jpg\";i:1;s:30:\"assets/upload/products/tv5.jpg\";}', 10, '45000.00', '32000.00', '', 'tv', '2020-04-08 11:40:48', 0, 0, 1, 0),
(11, 1, 2, 1, 2, 'shirt', 'shirt', 799658, 'axcxzc', 'zxczxczxczxcsdfsd', 'assets/upload/products/shirt3.jpg', '', 10, '1500.00', '1250.00', '', 'shirt', '2020-04-08 11:40:48', 0, 0, 1, 0),
(12, 1, 3, 2, 5, 'mi mobile phone', 'mi-mobile-phone', 789456, 'sdfdg', 'dsfgsdg', 'assets/upload/products/tv1.jpg', '', 5, '18000.00', '15000.00', '', 'mi-mobile', '2020-04-08 11:40:48', 0, 0, 1, 0),
(13, 1, 5, 2, 10, 'earphone', 'earphone', 799658, 'cfddfc', 'nkjhkfd', 'assets/upload/products/watch_1.jpg', '', 10, '1800.00', '1250.00', '', 'ear-phone', '2020-04-08 11:40:48', 0, 0, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `product_images`
--

DROP TABLE IF EXISTS `product_images`;
CREATE TABLE IF NOT EXISTS `product_images` (
  `product_id` int(11) NOT NULL,
  `image` mediumtext NOT NULL,
<<<<<<< HEAD
  `is_deleted` tinyint(1) NOT NULL DEFAULT '0',
=======
  `is_deleted` tinyint(1) NOT NULL DEFAULT 0,
>>>>>>> 022d7a6b9ec5ea2eb26a67a83e61761003432976
  KEY `product_id` (`product_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
<<<<<<< HEAD
  `is_deleted` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `product_id` (`product_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;
=======
  `add_date` datetime NOT NULL DEFAULT current_timestamp(),
  `is_deleted` tinyint(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`),
  KEY `product_id` (`product_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=latin1;
>>>>>>> 022d7a6b9ec5ea2eb26a67a83e61761003432976

--
-- Dumping data for table `reviews`
--

<<<<<<< HEAD
INSERT INTO `reviews` (`id`, `user_id`, `product_id`, `star_ratings`, `review`, `is_deleted`) VALUES
(1, 1, 1, 3, 'fdsfdfdsf', 0),
(2, 3, 2, 5, 'hfvfg', 0),
(3, 1, 3, 2, 'dfdsfds', 0),
(7, 1, 5, 4, 'good products', 0),
(8, 3, 2, 2, 'amazing', 0),
(9, 1, 3, 5, 'good one', 0);
=======
INSERT INTO `reviews` (`id`, `user_id`, `product_id`, `star_ratings`, `review`, `add_date`, `is_deleted`) VALUES
(1, 1, 1, 3, 'fdsfdfdsf', '2020-04-10 11:26:41', 0),
(2, 3, 2, 5, 'hfvfg', '2020-04-10 11:26:41', 0),
(3, 1, 3, 2, 'dfdsfds', '2020-04-09 11:26:41', 0),
(8, 3, 2, 2, 'amazing', '2020-04-10 11:26:41', 0),
(23, 1, 4, 5, 'aaaa ssds 02adas', '2020-04-13 06:37:19', 0),
(24, 1, 2, 5, 'Amazing products', '2020-04-14 09:47:29', 0),
(25, 1, 13, 5, 'very nice earphone', '2020-04-15 10:27:56', 0),
(26, 1, 5, 5, 'goooooood', '2020-04-17 05:44:17', 0),
(27, 1, 11, 5, 'gooooooooood', '2020-04-18 09:59:55', 0),
(28, 56, 3, 5, 'kkkkkkkkkkkkkkkkkkk', '2020-04-20 03:07:11', 0);
>>>>>>> 022d7a6b9ec5ea2eb26a67a83e61761003432976

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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `permissions`) VALUES
(0, 'user', '-'),
(1, 'admin', '-'),
(2, 'user', '-');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

DROP TABLE IF EXISTS `settings`;
CREATE TABLE IF NOT EXISTS `settings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(256) NOT NULL,
  `value` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `name`, `value`) VALUES
(1, 'company_name', 'GCART'),
(2, 'allowed_file_types', 'a:3:{i:0;s:4:\".jpg\";i:1;s:4:\".png\";i:2;s:4:\".gif\";}'),
(3, 'date_format', 'j-m-Y'),
(4, 'time_format', 'h:i A'),
(5, 'facebook_url', 'http://facebook.com'),
(6, 'smtp_host', 'smtp.gmail.com'),
(7, 'smtp_port', '465'),
(8, 'smtp_user', 'gcart.team@gmail.com'),
(9, 'smtp_password', 'gcartdemo$'),
(10, 'from_email', 'gcart.team@gmail.com'),
(11, 'from_name', 'GCART TEAM'),
(12, 'reply_to_email', 'gcart.team@gmail.com\r\n'),
(13, 'reply_to_name', 'GCART '),
(16, 'log_activity', '0'),
(19, 'company_email', 'gcart.team@gmail.com'),
(20, 'twitter_url', 'http://twitter.com'),
(21, 'smtp_encryption', 'ssl'),
(22, 'email_signature', 'GCART TEAM'),
(23, 'email_header', '<!doctype html>\r\n                            <html>\r\n                            <head>\r\n                              <meta name=\"viewport\" content=\"width=device-width\" />\r\n                              <meta http-equiv=\"Content-Type\" content=\"text/html; charset=UTF-8\" />\r\n                              <style>\r\n                                body {\r\n                                 background-color: #f6f6f6;\r\n                                 font-family: sans-serif;\r\n                                 -webkit-font-smoothing: antialiased;\r\n                                 font-size: 14px;\r\n                                 line-height: 1.4;\r\n                                 margin: 0;\r\n                                 padding: 0;\r\n                                 -ms-text-size-adjust: 100%;\r\n                                 -webkit-text-size-adjust: 100%;\r\n                               }\r\n                               table {\r\n                                 border-collapse: separate;\r\n                                 mso-table-lspace: 0pt;\r\n                                 mso-table-rspace: 0pt;\r\n                                 width: 100%;\r\n                               }\r\n                               table td {\r\n                                 font-family: sans-serif;\r\n                                 font-size: 14px;\r\n                                 vertical-align: top;\r\n                               }\r\n                                   /* -------------------------------------\r\n                                     BODY & CONTAINER\r\n                                     ------------------------------------- */\r\n                                     .body {\r\n                                       background-color: #f6f6f6;\r\n                                       width: 100%;\r\n                                     }\r\n                                     /* Set a max-width, and make it display as block so it will automatically stretch to that width, but will also shrink down on a phone or something */\r\n\r\n                                     .container {\r\n                                       display: block;\r\n                                       margin: 0 auto !important;\r\n                                       /* makes it centered */\r\n                                       max-width: 680px;\r\n                                       padding: 10px;\r\n                                       width: 680px;\r\n                                     }\r\n                                     /* This should also be a block element, so that it will fill 100% of the .container */\r\n\r\n                                     .content {\r\n                                       box-sizing: border-box;\r\n                                       display: block;\r\n                                       margin: 0 auto;\r\n                                       max-width: 680px;\r\n                                       padding: 10px;\r\n                                     }\r\n                                   /* -------------------------------------\r\n                                     HEADER, FOOTER, MAIN\r\n                                     ------------------------------------- */\r\n\r\n                                     .main {\r\n                                       background: #fff;\r\n                                       border-radius: 3px;\r\n                                       width: 100%;\r\n                                     }\r\n                                     .wrapper {\r\n                                       box-sizing: border-box;\r\n                                       padding: 20px;\r\n                                     }\r\n                                     .footer {\r\n                                       clear: both;\r\n                                       padding-top: 10px;\r\n                                       text-align: center;\r\n                                       width: 100%;\r\n                                     }\r\n                                     .footer td,\r\n                                     .footer p,\r\n                                     .footer span,\r\n                                     .footer a {\r\n                                       color: #999999;\r\n                                       font-size: 12px;\r\n                                       text-align: center;\r\n                                     }\r\n                                     hr {\r\n                                       border: 0;\r\n                                       border-bottom: 1px solid #f6f6f6;\r\n                                       margin: 20px 0;\r\n                                     }\r\n                                   /* -------------------------------------\r\n                                     RESPONSIVE AND MOBILE FRIENDLY STYLES\r\n                                     ------------------------------------- */\r\n\r\n                                     @media only screen and (max-width: 620px) {\r\n                                       table[class=body] .content {\r\n                                         padding: 0 !important;\r\n                                       }\r\n                                       table[class=body] .container {\r\n                                         padding: 0 !important;\r\n                                         width: 100% !important;\r\n                                       }\r\n                                       table[class=body] .main {\r\n                                         border-left-width: 0 !important;\r\n                                         border-radius: 0 !important;\r\n                                         border-right-width: 0 !important;\r\n                                       }\r\n                                     }\r\n                                   </style>\r\n                                 </head>\r\n                                 <body class=\"\">\r\n                                  <table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" class=\"body\">\r\n                                    <tr>\r\n                                     <td> </td>\r\n                                     <td class=\"container\">\r\n                                      <div class=\"content\">\r\n                                        <!-- START CENTERED WHITE CONTAINER -->\r\n                                        <table class=\"main\">\r\n                                          <!-- START MAIN CONTENT AREA -->\r\n                                          <tr>\r\n                                           <td class=\"wrapper\">\r\n                                            <table border=\"0\" cellpadding=\"0\" cellspacing=\"0\">\r\n                                              <tr>\r\n                                               <td>'),
(24, 'email_footer', '</td>\r\n                             </tr>\r\n                           </table>\r\n                         </td>\r\n                       </tr>\r\n                       <!-- END MAIN CONTENT AREA -->\r\n                     </table>\r\n                     <!-- START FOOTER -->\r\n                     <div class=\"footer\">\r\n                      <table border=\"0\" cellpadding=\"0\" cellspacing=\"0\">\r\n                        <tr>\r\n                          <td class=\"content-block\">\r\n                            <span>You are \r\n receiving this email because of your account on {company_name}</span>\r\n                          </td>\r\n                        </tr>\r\n                      </table>\r\n                    </div>\r\n                    <!-- END FOOTER -->\r\n                    <!-- END CENTERED WHITE CONTAINER -->\r\n                  </div>\r\n                </td>\r\n                <td> </td>\r\n              </tr>\r\n            </table>\r\n            </body>\r\n            </html>'),
(29, 'maintenance', '0'),
(30, 'vendors_registration', '1');

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
<<<<<<< HEAD
  `is_deleted` tinyint(1) NOT NULL DEFAULT '0',
=======
  `is_deleted` tinyint(1) NOT NULL DEFAULT 0,
>>>>>>> 022d7a6b9ec5ea2eb26a67a83e61761003432976
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `slider_settings`
--

INSERT INTO `slider_settings` (`id`, `title`, `sub_title`, `description`, `image`, `is_deleted`) VALUES
(1, 'world fashion', 'get upto 40% OFF ', 'Highlight your personality  and look with these fabulous and exquisite fashion.', 'assets/uploads/sliders/01.jpg', 0),
(2, 'top brands', 'new collections', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.', 'assets/uploads/sliders/02.jpg', 0),
(3, 'crazy super deals', 'get up to 70% OFF', '', 'assets/uploads/sliders/s1.jfif', 0);

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
<<<<<<< HEAD
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `is_deleted` tinyint(1) NOT NULL DEFAULT '0',
=======
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `is_deleted` tinyint(1) NOT NULL DEFAULT 0,
>>>>>>> 022d7a6b9ec5ea2eb26a67a83e61761003432976
  PRIMARY KEY (`id`),
  UNIQUE KEY `slug` (`slug`),
  KEY `category_id` (`category_id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sub_categories`
--

INSERT INTO `sub_categories` (`id`, `category_id`, `name`, `slug`, `is_active`, `is_deleted`) VALUES
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

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
<<<<<<< HEAD
  `role_id` int(11) NOT NULL DEFAULT '0',
=======
  `role_id` int(11) NOT NULL DEFAULT 0,
>>>>>>> 022d7a6b9ec5ea2eb26a67a83e61761003432976
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `mobile` bigint(20) NOT NULL,
  `password` varchar(32) NOT NULL,
  `profile_image` mediumtext NOT NULL,
  `last_login` datetime NOT NULL,
  `last_ip` varchar(50) NOT NULL,
<<<<<<< HEAD
  `signup_date` datetime DEFAULT CURRENT_TIMESTAMP,
=======
  `signup_date` datetime DEFAULT current_timestamp(),
>>>>>>> 022d7a6b9ec5ea2eb26a67a83e61761003432976
  `last_password_change` datetime DEFAULT NULL,
  `new_pass_key` varchar(32) NOT NULL,
  `new_pass_key_requested` datetime NOT NULL,
  `sign_up_key` varchar(32) NOT NULL,
  `is_email_verified` tinyint(1) NOT NULL,
  `is_active` tinyint(1) NOT NULL,
<<<<<<< HEAD
  `is_admin` tinyint(1) NOT NULL DEFAULT '0',
  `is_deleted` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `role_id` (`role_id`)
) ENGINE=InnoDB AUTO_INCREMENT=55 DEFAULT CHARSET=latin1;
=======
  `is_admin` tinyint(1) NOT NULL DEFAULT 0,
  `is_deleted` tinyint(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`),
  KEY `role_id` (`role_id`)
) ENGINE=InnoDB AUTO_INCREMENT=57 DEFAULT CHARSET=latin1;
>>>>>>> 022d7a6b9ec5ea2eb26a67a83e61761003432976

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `role_id`, `firstname`, `lastname`, `email`, `mobile`, `password`, `profile_image`, `last_login`, `last_ip`, `signup_date`, `last_password_change`, `new_pass_key`, `new_pass_key_requested`, `sign_up_key`, `is_email_verified`, `is_active`, `is_admin`, `is_deleted`) VALUES
<<<<<<< HEAD
(1, 1, 'bhavik', 'patel', 'bdp@narola.email', 9978554691, '53acf5f531943514246a7ed92f496a7d', '', '2020-04-08 14:38:05', '::1', '2020-02-27 12:11:21', '2020-03-13 14:58:30', '', '2020-02-24 03:04:19', '', 1, 1, 1, 0),
=======
(1, 1, 'bhavik', 'patel', 'bdp@narola.email', 9978554691, '53acf5f531943514246a7ed92f496a7d', '', '2020-04-18 19:29:23', '::1', '2020-02-27 12:11:21', '2020-03-13 14:58:30', '', '2020-02-24 03:04:19', '', 1, 1, 1, 0),
>>>>>>> 022d7a6b9ec5ea2eb26a67a83e61761003432976
(2, 0, 'User', 'User', 'user@gmail.com', 7878787878, 'ee11cbb19052e40b07aac0ca060c23ee', './assets/uploads/users/16-1-user.png', '2020-04-06 00:11:44', '::1', '2020-02-11 09:22:00', NULL, '-', '2020-03-03 00:00:00', '-', 1, 1, 0, 0),
(3, 0, 'anonymous', 'user', 'anonymous@gmail.com', 6565656565, '294de3557d9d00b3d2d8a1e6aab028cf', '-', '2020-03-12 12:28:39', '::1', '2020-03-02 05:13:28', NULL, '-', '2020-03-03 00:00:00', '-', 1, 1, 0, 0),
(8, 0, 'vixuti', 'patel', 'vrpp@narola.email', 9898675454, '7f237be719ee43162b69b1ea52140237', 'assets/uploads/users/1586111609-default_img.png', '2020-04-06 18:46:03', '::1', '2020-04-03 17:55:12', '2020-04-06 18:45:51', '', '0000-00-00 00:00:00', '6ec3125f81559a5cbfa7b37cccbc5cd3', 1, 1, 0, 0),
(11, 0, 'mili', 'tandel', 'mili@gmail.com', 8787676565, '76681a82dd1c41a61bf1d3fbcf20b608', 'assets/uploads/users/1586111945-default_img.png', '2020-04-06 00:08:28', '::1', '2020-04-03 18:03:07', NULL, '', '0000-00-00 00:00:00', '4b8de18fee1f85d06bad557d87ae41a0', 1, 1, 1, 0),
(45, 0, 'krina', 'patel', 'krina@gmail.com', 9878676567, '72f361fbf1ac746ef085c4a83bae0c44', '', '0000-00-00 00:00:00', '', '2020-04-06 15:19:19', NULL, '', '0000-00-00 00:00:00', '6db32f2b64fdad0b91b6c122382f8aaa', 0, 0, 0, 0),
(51, 0, 'jina', 'tandel', 'gcart.team@gmail.com', 9898786765, '1ac5a38d78b1c5159298aa191fb8b8d8', '', '2020-04-06 18:48:31', '::1', '2020-04-06 19:02:15', '2020-04-06 19:15:56', '', '0000-00-00 00:00:00', 'd0086194fbd3d608459c24afcb750405', 1, 1, 0, 0),
(52, 0, 'ayushi', 'patel', 'vrpl@narola.email', 9887677656, '3e44e7ddd8c1c14677d4043253c67833', '', '0000-00-00 00:00:00', '', '2020-04-06 19:33:10', NULL, '', '0000-00-00 00:00:00', 'ea3aaf65954c4b2d153a224ef60d3286', 1, 1, 0, 0),
(53, 0, 'vrp', 'narola', 'vixuti@gmail.com', 8787676556, '3e76c356c75da6415a8e741a6d50ffee', '', '2020-04-06 19:29:48', '::1', '2020-04-06 19:43:41', NULL, '', '0000-00-00 00:00:00', '33ec2d7a2f5d5b2ea48b9324e9bc1d6f', 1, 1, 0, 0),
<<<<<<< HEAD
(54, 0, 'ekta', 'patel', 'vrp@narola.email', 9898787667, '521b7f3b9f5189310321f1db7cf8eadd', 'assets/uploads/users/1586182037-dell.png', '2020-04-06 19:35:50', '::1', '2020-04-06 19:50:02', NULL, '', '0000-00-00 00:00:00', '019ef84b71ef206bea5d14aaaf7e5743', 1, 1, 0, 0);
=======
(54, 0, 'ekta', 'patel', 'vrp@narola.email', 9898787667, '521b7f3b9f5189310321f1db7cf8eadd', 'assets/uploads/users/1586182037-dell.png', '2020-04-06 19:35:50', '::1', '2020-04-06 19:50:02', NULL, '', '0000-00-00 00:00:00', '019ef84b71ef206bea5d14aaaf7e5743', 1, 1, 0, 0),
(55, 0, 'komal', 'chhipa', 'kdc@narola.email', 7895469874, '8ffa9b29c4b60ee0510b52f535fb5bf9', '', '0000-00-00 00:00:00', '', '2020-04-20 12:21:17', NULL, '', '0000-00-00 00:00:00', 'e1639d4e08112dffbaa0691efc026c18', 0, 0, 0, 0),
(56, 0, 'komal', 'chhipa', 'komalkhalasi.13@gmail.com', 7894569856, '8ffa9b29c4b60ee0510b52f535fb5bf9', '', '2020-04-20 14:34:08', '::1', '2020-04-20 12:23:41', NULL, '', '0000-00-00 00:00:00', 'be76e829f4fa3b554fd60a31222b391e', 1, 1, 0, 0);
>>>>>>> 022d7a6b9ec5ea2eb26a67a83e61761003432976

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
<<<<<<< HEAD
  `is_deleted` tinyint(1) NOT NULL DEFAULT '0',
=======
  `is_deleted` tinyint(1) NOT NULL DEFAULT 0,
>>>>>>> 022d7a6b9ec5ea2eb26a67a83e61761003432976
  PRIMARY KEY (`id`),
  KEY `users_id` (`users_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users_address`
--

INSERT INTO `users_address` (`id`, `users_id`, `address_1`, `address_2`, `city`, `state`, `pincode`, `is_deleted`) VALUES
(1, 1, 'asw', 'mrl', 'navsari', 'gujarat', 396436, 0),
(2, 2, 'asw', 'mrl', 'navsari', 'gujarat', 396436, 0),
(3, 3, 'annyms-1', 'ayms-2', 'annnn', 'gujarat', 396436, 0),
(4, 8, 'bilimora', 'antalia', 'navsari', 'gujarat', 0, 0),
(5, 11, '', '', '', '', 0, 0),
(6, 51, '', '', '', '', 0, 0),
(7, 53, 'antalia', 'balaji nagar', 'navsari', 'gujarat', 0, 0),
(8, 54, '', '', '', '', 0, 0);

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
  `subscription_id` int(11) DEFAULT NULL,
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
<<<<<<< HEAD
  `is_admin` tinyint(1) NOT NULL DEFAULT '0',
=======
  `is_admin` tinyint(1) NOT NULL DEFAULT 0,
>>>>>>> 022d7a6b9ec5ea2eb26a67a83e61761003432976
  `is_deleted` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `subscription_id` (`subscription_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vendors`
--

INSERT INTO `vendors` (`id`, `subscription_id`, `firstname`, `lastname`, `email`, `mobile`, `password`, `profile_image`, `owner_name`, `shop_name`, `address`, `city`, `pincode`, `logo`, `shop_number`, `registration_number`, `subscribe_date`, `shop_details`, `total_products`, `last_login`, `last_ip`, `new_pass_key`, `new_pass_key_requested`, `sign_up_key`, `last_password_change`, `is_email_verified`, `is_active`, `is_admin`, `is_deleted`) VALUES
(1, 1, 'bhavik', 'patel', 'bdp@narola.email', 9978554691, '53acf5f531943514246a7ed92f496a7d', 'assets/uploads/vendors/profile/1584168542-profile.png', 'admin', 'all in one store', 'mrl', 'surat', 396445, 'assets/uploads/vendors/logo/1585282690-logo_3.jpg', 7, 0, '2020-03-01 00:00:00', 'all sports items available', 37, '2020-03-01 00:00:00', '::1', '-', '2020-03-01 00:00:00', '-', '2020-03-02 14:58:30', 1, 1, 1, 0),
(2, 1, 'bdp', '7', 'bdp@mail.com', 9978554691, '29a2047bb5908c54034763e93eb92e1c', 'assets/uploads/vendors/profile/1584163289-profile.png\r\n', 'bdp', 'b7', 'mrl', 'navsari', 396445, 'assets/uploads/vendors/logo/1584424477-logo_1.jpg', 127, 0, '2020-03-02 00:00:00', '-', 39, '2020-02-17 10:32:20', '::1', '', '2020-02-26 00:00:00', '', NULL, 1, 1, 0, 0),
(4, NULL, 'kalpana', 'patel', 'kp@gmail.com', 9878676545, '760cace8efc1d83449521ed19438be02', '', 'kaplana', 'HP store', 'bilimora', '', 396321, '', 8874, 888344, '0000-00-00 00:00:00', '', 0, '0000-00-00 00:00:00', '', '', '0000-00-00 00:00:00', 'e03de56a8ce397589dcdbd7a7c748f7d', NULL, 0, 0, 0, 0),
(5, NULL, 'mira', 'patel', 'mira@gmail.com', 8987787656, '59696065bfcc1bdf8eefaf2c5984a19b', '', 'mira patel', 'unique shop', 'narayan nagar', '', 396321, '', 987, 867876, '0000-00-00 00:00:00', '', 0, '0000-00-00 00:00:00', '', '', '0000-00-00 00:00:00', 'b1a195ca9e32948cd658058e6af9b21b', NULL, 0, 0, 0, 0),
(6, NULL, 'mira', 'patel', 'mira@gmail.com', 8987787656, '59696065bfcc1bdf8eefaf2c5984a19b', '', 'mira patel', 'unique shop', 'narayan nagar', '', 396321, '', 987, 867876, '0000-00-00 00:00:00', '', 0, '0000-00-00 00:00:00', '', '', '0000-00-00 00:00:00', '421ddbec8d248a54b0d81aa9bdcdaf61', NULL, 0, 0, 0, 0);

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
<<<<<<< HEAD
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
=======
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=latin1;
>>>>>>> 022d7a6b9ec5ea2eb26a67a83e61761003432976

--
-- Dumping data for table `wishlist`
--

INSERT INTO `wishlist` (`id`, `user_id`, `product_id`, `is_deleted`) VALUES
<<<<<<< HEAD
(1, 1, 3, 0),
(2, 1, 3, 0),
(3, 1, 2, 0),
(4, 1, 5, 0),
(5, 1, 6, 0);
=======
(5, 2, 6, 0),
(17, 2, 4, 0),
(18, 1, 2, 1),
(19, 1, 1, 1),
(20, 1, 3, 1),
(21, 1, 11, 1),
(22, 1, 5, 1),
(23, 1, 11, 1),
(24, 1, 11, 1),
(25, 1, 11, 1),
(26, 1, 4, 1),
(27, 1, 5, 1),
(28, 1, 11, 1),
(29, 1, 8, 1),
(30, 1, 8, 1),
(31, 1, 8, 1),
(32, 1, 11, 1),
(33, 1, 11, 0),
(34, 1, 3, 1),
(35, 56, 12, 0);
>>>>>>> 022d7a6b9ec5ea2eb26a67a83e61761003432976

--
-- Constraints for dumped tables
--

--
-- Constraints for table `categories`
--
ALTER TABLE `categories`
  ADD CONSTRAINT `categories_ibfk_1` FOREIGN KEY (`banner_id`) REFERENCES `banners` (`id`);

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`vendor_id`) REFERENCES `vendors` (`id`),
  ADD CONSTRAINT `products_ibfk_2` FOREIGN KEY (`brand_id`) REFERENCES `brands` (`id`),
  ADD CONSTRAINT `products_ibfk_3` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`),
  ADD CONSTRAINT `products_ibfk_4` FOREIGN KEY (`sub_category_id`) REFERENCES `sub_categories` (`id`);

--
-- Constraints for table `product_images`
--
ALTER TABLE `product_images`
  ADD CONSTRAINT `product_images_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

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
