-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 11, 2020 at 11:12 AM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.3.12

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
  `is_deleted` tinyint(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `banners`
--

INSERT INTO `banners` (`id`, `title`, `sub_title`, `description`, `banner`, `is_deleted`) VALUES
(1, 'test', 'Save up to 49% off', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit', 'assets/uploads/banners/3.jpg', 0),
(2, 'sale', 'sale 80% off', 'cdsfdssgg', 'assets/uploads/banners/2.jpg', 0),
(3, 'sale', 'Save up to 49% off', 'adads', 'assets/uploads/banners/1.jpg', 0),
(4, 'sale', 'sale 80% off', 'aaSAsASa', 'assets/uploads/banners/watch.jpg', 0);

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

DROP TABLE IF EXISTS `brands`;
CREATE TABLE IF NOT EXISTS `brands` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `logo` mediumtext NOT NULL,
  `is_deleted` tinyint(1) NOT NULL DEFAULT 0,
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
  `total_amount` decimal(9,2) NOT NULL,
  `user_ip` varchar(50) NOT NULL,
  `date` datetime NOT NULL,
  `is_deleted` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `product_id` (`product_id`)
) ENGINE=InnoDB AUTO_INCREMENT=484 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `user_id`, `product_id`, `quantity`, `total_amount`, `user_ip`, `date`, `is_deleted`) VALUES
(483, 56, 31, 1, '200.00', '::1', '2020-05-11 02:50:23', 1);

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
  `is_header` tinyint(1) NOT NULL DEFAULT 0,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `is_deleted` tinyint(1) NOT NULL DEFAULT 0,
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
  `add_date` datetime NOT NULL DEFAULT current_timestamp(),
  `is_deleted` tinyint(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`),
  KEY `product_id` (`product_id`)
) ENGINE=InnoDB AUTO_INCREMENT=50 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comments`
--

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
(33, 2, 'komalproject', 'kdc@narola.email', 'aaaaaaaaaaaaaa', '2020-04-15 04:07:42', 0),
(34, 4, 'komalproject', 'kdc@narola.email', 'aaaaaaaaaaaa', '2020-04-22 12:14:56', 0),
(35, 4, 'asa', 'kdc@narola.email', 'aaaaaaaaaaaa', '2020-04-22 12:15:09', 0),
(36, 4, 'komalproject', 'komalkhalasi.13@gmail.com', 'addSDASDASAS', '2020-04-27 02:53:10', 0),
(37, 2, 'komalproject', 'komalkhalasi.13@gmail.com', 'adsadasdasdasds', '2020-04-27 03:28:38', 0),
(38, 4, 'sdfdfd', 'vxvx@dfdgddvf', 'sfdsfdfdfgdfgdf', '2020-04-30 06:01:18', 0),
(39, 4, 'ASAD', 'acaa@fsd', 'ASDASD', '2020-04-30 06:02:49', 0),
(40, 4, 'asdas', 'user@gmail.com', 'sass', '2020-04-30 06:03:50', 0),
(41, 2, 'komalproject', 'komalkhalasi.13@gmail.com', 'sczsfcdsfcdsfcsd', '2020-05-04 06:14:07', 0),
(42, 9, 'komalproject', 'komalkhalasi90@gmail.com', 'aXXXXXXXXXXXXXX', '2020-05-04 06:23:01', 0),
(43, 4, 'komalproject', 'kdc@narola.email', 'asdasdasfasfa', '2020-05-07 05:49:57', 0),
(44, 4, 'asdasdas', 'komalkhalasi90@gmail.com', 'asdasdasfsdsd', '2020-05-07 05:50:04', 0),
(45, 4, 'asfasf', 'komalkhalasi90@gmail.com', 'asdasdasfasfs', '2020-05-07 05:50:14', 0),
(46, 4, 'ADASDASD', 'komalkhalasi90@gmail.com', 'ASFASFSAF', '2020-05-07 05:50:24', 0),
(47, 4, 'komalproject', 'komalkhalasi90@gmail.com', 'ASASFSAFSFSF', '2020-05-07 05:50:32', 0),
(48, 4, 'adas', 'komalkhalasi90@gmail.com', 'asdasdasdasd', '2020-05-07 05:51:14', 0),
(49, 31, 'komal', 'kdc@narola.email', 'asdasdasdasdas', '2020-05-11 03:37:19', 0);

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
  `used` int(11) NOT NULL DEFAULT 0,
  `start_date` datetime DEFAULT NULL,
  `end_date` datetime DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `is_deleted` tinyint(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`),
  UNIQUE KEY `code` (`code`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `coupons`
--

INSERT INTO `coupons` (`id`, `code`, `type`, `amount`, `quantity`, `used`, `start_date`, `end_date`, `is_active`, `is_deleted`) VALUES
(1, 'code', 0, 500, 15, 12, '2020-03-31 00:00:00', '2020-05-22 00:00:00', 1, 0),
(2, 'shop30', 1, 30, 10, 1, '2020-04-01 00:00:00', '2020-05-21 00:00:00', 1, 0),
(3, 'cart600', 0, 600, 10, 1, '2020-03-21 00:00:00', '2020-05-16 00:00:00', 1, 0),
(4, 'shoe70', 1, 70, 50, 6, '2020-02-05 00:00:00', '2020-05-14 00:00:00', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `email_templates`
--

DROP TABLE IF EXISTS `email_templates`;
CREATE TABLE IF NOT EXISTS `email_templates` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `slug` varchar(100) NOT NULL,
  `name` mediumtext NOT NULL,
  `subject` mediumtext NOT NULL,
  `message` text NOT NULL,
  `placeholders` longtext NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `slug` (`slug`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `email_templates`
--

INSERT INTO `email_templates` (`id`, `slug`, `name`, `subject`, `message`, `placeholders`) VALUES
(1, 'forgot-password', 'Forgot Password', 'Reset Password Instructions', '<h2></h2><h3 style=\"text-align: justify; \"><span style=\"font-size: 14pt;\">Hello {firstname} {lastname},</span></h3><p style=\"text-align: justify; \"><span style=\"font-size: 13px; letter-spacing: normal;\">Someone, hopefully, you, has requested to reset the password for your </span>{company_name} account with email <b>{email}</b>.</p><span style=\"font-size: 13px; letter-spacing: normal; color: inherit; font-family: inherit;\"><p style=\"text-align: justify;\"><span style=\"color: inherit; font-family: inherit;\">If you did not perform this request, you can safely ignore this email </span>and your password will remain the same. <span style=\"color: inherit; font-family: inherit;\">Otherwise, click the link below to complete the process.</span></p><p style=\"text-align: justify;\"><a href=\"{reset_password_link}\" target=\"_blank\" style=\"font-family: inherit; background-color: rgb(255, 255, 255);\">Reset Password</a></p><p style=\"text-align: justify;\">Please note that this link is valid for next 1 hour only. You won\'t be able to change the password after the link gets expired.</p></span><p></p><p style=\"text-align: justify; \"><span style=\"font-size: 13px; letter-spacing: normal; color: inherit; font-family: inherit;\">Regards,</span></p><p style=\"text-align: justify; \"><span style=\"color: inherit; font-family: inherit; font-size: 13px; letter-spacing: normal;\">{company_name}</span></p>', 'a:6:{s:11:\"{firstname}\";s:14:\"User Firstname\";s:10:\"{lastname}\";s:13:\"User Lastname\";s:7:\"{email}\";s:10:\"User Email\";s:20:\"{reset_password_url}\";s:18:\"Reset Password URL\";s:17:\"{email_signature}\";s:15:\"Email Signature\";s:14:\"{company_name}\";s:12:\"Company Name\";}'),
(2, 'new-user-signup', 'New User Sign Up', 'Welcome {company_name}', '<p></p><p></p><p></p><h1><b>Dear {firstname} {lastname}</b></h1><br>Thank you for registering on {company_name}.<br><br>We just wanted to say welcome.<br><br>Please contact us if you need any help.<br><br>Click the link below to verify your email<p></p><p><a href=\"{email_verification_url}\" target=\"_blank\">Verify Your Email</a><br><br>Kind Regards, <br>{email_signature}<br><br>(This is an automated email, so please don\\\'t reply to this email address)<br></p><p></p><p></p><p></p>', 'a:5:{s:11:\"{firstname}\";s:14:\"User Firstname\";s:10:\"{lastname}\";s:13:\"User Lastname\";s:24:\"{email_verification_url}\";s:22:\"Email Verification URL\";s:17:\"{email_signature}\";s:15:\"Email Signature\";s:14:\"{company_name}\";s:12:\"Company Name\";}'),
(3, 'order-placed', 'Your Order Placed Successfully', 'Your Order Placed Successfully', '<p><span style=\"color: rgb(34, 34, 34); font-family: \"Open Sans\", sans-serif; font-size: 14px;\">Hello {customer_name},</span><br style=\"color: rgb(34, 34, 34); font-family: \"Open Sans\", sans-serif; font-size: 14px;\"><span style=\"color: rgb(34, 34, 34); font-family: \"Open Sans\", sans-serif; font-size: 14px;\">Your Order Number is </span>{order_amount}<br style=\"color: rgb(34, 34, 34); font-family: \"Open Sans\", sans-serif; font-size: 14px;\"><span style=\"color: rgb(34, 34, 34); font-family: \"Open Sans\", sans-serif; font-size: 14px;\">Your order has been placed successfully</span><br></p>', 'a:4:{s:15:\"{customer_name}\";s:13:\"Customer Name\";s:14:\"{order_amount}\";s:12:\"Order Amount\";s:12:\"{admin_name}\";s:10:\"Admin Name\";s:13:\"{admin_email}\";s:11:\"Admin Email\";}'),
(5, 'thanks-for-product-review', 'Thanks For Product Review', 'Thank you for reviewing {product_name}... on {company_name}', '<table cellpadding=\"0\" cellspacing=\"0\" border=\"0\"  style=\"border-spacing:0;margin-right:50px; margin-left: 0px; auto;width:640px\"><tr><td>\r\n<hr border=\"4\" style=\"margin-right:420px;margin-left:420px;backgroung-color:33ADFF\"><table cellpadding=\"0\" cellspacing=\"0\" border=\"0\"  style=\"border-spacing:0;margin-right:150px; margin-left: 700px; auto;width:640px\"><tr><td style=\"margin-left: 400px;text-align: center;font-size: 35px;\"><b>{company_name}</b></td></tr></table><hr border=\"40\" style=\"margin-right:420px;margin-left:420px;backgroung-color:33ADFF\"><table cellpadding=\"0\" cellspacing=\"0\" border=\"0\" align=\"center\" style=\"border-spacing:0;margin:0 auto;width:640px\"><tbody><tr><td align=\"left\"><span style=\"color:#000000;font-size:24px;line-height:26px\">Thanks {firstname},</span><br><br><span>Your latest customer review is live on {company_name}. We and millions of shoppers on {company_name} appreciate the time you took to share your experience with this item.</span></td></tr></tbody></table><br><br><br><table width=\"640\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\" bgcolor=\"#FFFFFF\" align=\"center\"><tbody><tr><td valign=\"top\" align=\"left\" width=\"110\"><a href=\"{products_detail_url}\"><img width=\"90\" src=\"{image_url}\" ></a></td><td valign=\"top\" align=\"left\" style=\"font-size:16px;line-height:18px;border:1px black\"><span><img style=\"display:inline\" src=\"\" class=\"CToWUd\"><br> <span style=\"font-size:14px;line-height:18px;color:#888888\">   from <a href=\"\">{firstname} {lastname}</a>   on {review_date}</span></span><br><span style=\"font-size:14px;line-height:18px;color:#363636;\"><strong>Star rating :</strong><span > {star_rating} <img src=\"http://localhost/gcart/assets/themes/default/images/str.jpg\" height=\"15px\" width=\"15px\"> <span style=\"font-size:14px;line-height:18px;color:#363636\"><strong><br>{review_msg}</strong></span><br> <span style=\"font-size:4px;line-height:4px;color:#ffffff\"></span></td></tr></tbody></table ><hr border=\"40\" style=\"margin-right:420px;margin-left:420px;backgroung-color:33ADFF\"><table width=\"640\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\" bgcolor=\"#FFFFFF\" align=\"center\"><tr><td>Kind Regards, <br>{email_signature}<br><br>(This is an automated email, so please don\\\'t reply to this email address)<br></td></tr></table></td></tr></table>', 'a:20:{i:0;s:11:\"{fristname}\";i:1;s:14:\"User Firstname\";i:2;s:10:\"{lastname}\";i:3;s:13:\"User Lastname\";i:4;s:14:\"{company_name}\";i:5;s:12:\"Company Name\";i:6;s:17:\"{email_signature}\";i:7;s:15:\"Email Signature\";i:8;s:21:\"{products_detail_url}\";i:9;s:20:\"Products detail page\";i:10;s:11:\"{image_url}\";i:11;s:17:\"Product image url\";i:12;s:13:\"{review_date}\";i:13;s:20:\"Products review date\";i:14;s:13:\"{star_rating}\";i:15;s:11:\"Star rating\";i:16;s:12:\"{review_msg}\";i:17;s:19:\"Products review msg\";i:18;s:14:\"{product_name}\";i:19;s:13:\"Products Name\";}'),
(6, 'confirm-order', 'Confirm Order', 'Your {company_name} order', '<hr border=\"4\" style=\"margin-right:420px;margin-left:420px;backgroung-color:33ADFF\">\r\n<table >\r\n<tr>\r\n<td style=\"text-align: center;font-size: 22px;\"><b>{company_name}</b></td>\r\n</tr>\r\n</table>\r\n<hr border=\"40\" style=\"margin-right:420px;margin-left:420px;backgroung-color:33ADFF\">\r\n<table >\r\n<tbody>\r\n<tr>\r\n<td align=\"left\"><span style=\"color:#000000;font-size:24px;line-height:26px\"><b>Hello {firstname} ,</b></span><br><br><span>Thank you for your order. We’ll send a confirmation when your order ships. Your estimated delivery date is indicated below. If you would like to view the status of your order or make any changes to it, please visit Your Orders on {company_name}</span>\r\n</td>\r\n</tr>\r\n</tbody>\r\n</table><br>\r\n<hr border=\"40\" style=\"margin-right:420px;margin-left:420px;backgroung-color:33ADFF\">\r\n<table cellpadding=\"0\" cellspacing=\"0\" >\r\n<tbody>\r\n<tr width=\"100%\">\r\n<td align=\"left\" width=\"50%\">\r\n<span><b>Arriving :</b></span><br>\r\n<span>{frist_date}-</span><br>\r\n<span>{second_date}</span><br>\r\n<br>\r\n</td>\r\n<td align=\"left\" width=\"50%\">\r\n<span><b>Your order will be sent to:</b></span><br>\r\n<span> {firstname} </span><br>\r\n<span>{house_no} {societyname}</span><br>\r\n<span>{city} , {state} {pincode}</span><br>\r\n</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n<br>\r\n<table cellpadding=\"0\" cellspacing=\"0\" border=\"0\" >\r\n<tbody>\r\n<tr>\r\n<td style=\"font-size:25px;\"><b><U>Order Details</U></b><br></td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n<br>\r\n<table cellpadding=\"0\" cellspacing=\"0\" border=\"0\" >\r\n<tbody>\r\n<tr>\r\n<td style=\"font-size:15px;\">Order #{order_number}</td>\r\n</tr>\r\n<tr>\r\n<td style=\"font-size:15px;\">Placed on {order_date}</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n<br>\r\n{products_data}\r\n\r\n<br>\r\n<br>\r\n<table cellpadding=\"0\" cellspacing=\"0\" border=\"0\" >\r\n<tbody>\r\n<tr style=\"margin-top:20px;\" width=\"100%\">\r\n<td valign=\"top\" align=\"left\" width=\"40%\"></td>\r\n\r\n\r\n<td valign=\"top\" width=\"40%\" align=\"right\">\r\n	<span>Item Subtotal:</span><br>\r\n	<span>Shipping & Handling:</span><br>\r\n	<span>Promotion Applied:</span><br><br>\r\n	<span><b>Order Total:</b></span>\r\n\r\n</td>\r\n\r\n<td valign=\"top\" width=\"20%\" align=\"right\">\r\n	<span>{sub_total}</span><br>\r\n	<span>{shipping_amount}</span><br>\r\n	<span>{coupon_amount}</span><br><br>\r\n	<span><b>{grand_total}</b></span>\r\n	<span><?php echo \'komal\' ?></span>\r\n</td>\r\n</tr>\r\n</tbody>\r\n</table >\r\n<hr border=\"40\" style=\"margin-right:420px;margin-left:420px;backgroung-color:33ADFF\">\r\n<table cellpadding=\"0\" cellspacing=\"0\" border=\"0\" >\r\n<tr>\r\n<td>Kind Regards, <br>{email_signature}<br><br>(This is an automated email, so please don\\\'t reply to this email address)<br>\r\n</td>\r\n</tr>\r\n</table>\r\n', 'a:34:{i:0;s:14:\"{company_name}\";i:1;s:12:\"company Name\";i:2;s:11:\"{firstname}\";i:3;s:14:\"User fristname\";i:4;s:12:\"{frist_date}\";i:5;s:24:\"Order delivery firstdate\";i:6;s:13:\"{second_date}\";i:7;s:25:\"Order delivery secontdate\";i:8;s:10:\"{house_no}\";i:9;s:17:\"User house number\";i:10;s:13:\"{societyname}\";i:11;s:17:\"User society name\";i:12;s:6:\"{city}\";i:13;s:9:\"User city\";i:14;s:7:\"{state}\";i:15;s:10:\"User state\";i:16;s:9:\"{pincode}\";i:17;s:12:\"User pincode\";i:18;s:14:\"{order_number}\";i:19;s:12:\"Order number\";i:20;s:12:\"{order_date}\";i:21;s:10:\"Order date\";i:22;s:15:\"{products_data}\";i:23;s:15:\"Products detail\";i:24;s:11:\"{sub_total}\";i:25;s:9:\"Sub total\";i:26;s:17:\"{shipping_amount}\";i:27;s:15:\"Shipping amount\";i:28;s:15:\"{coupon_amount}\";i:29;s:13:\"Coupon amount\";i:30;s:13:\"{grand_total}\";i:31;s:11:\"Grand total\";i:32;s:17:\"{email_signature}\";i:33;s:15:\"Email Signature\";}');

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
  `is_deleted` tinyint(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`),
  KEY `product_id` (`product_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hot_deals`
--

INSERT INTO `hot_deals` (`id`, `product_id`, `type`, `value`, `start_date`, `end_date`, `is_deleted`) VALUES
(3, 6, 1, 60, '2020-03-31 00:00:00', '2020-04-12 00:00:00', 0),
(4, 5, 1, 20, '2020-04-14 00:00:00', '2020-05-21 00:00:00', 0),
(5, 4, 0, 1000, '2020-04-13 00:00:00', '2020-05-21 00:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `news_letters`
--

DROP TABLE IF EXISTS `news_letters`;
CREATE TABLE IF NOT EXISTS `news_letters` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(50) NOT NULL,
  `created_date` datetime NOT NULL DEFAULT current_timestamp(),
  `is_deleted` tinyint(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=148 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `news_letters`
--

INSERT INTO `news_letters` (`id`, `email`, `created_date`, `is_deleted`) VALUES
(1, 'bdp@narola.email', '2020-03-11 00:00:00', 0),
(2, 'vrp@narola.email', '2020-04-03 17:26:04', 0),
(3, 'vrtp@narola.email', '2020-04-04 12:16:27', 0),
(4, 'vixutipatel129@gmail.com', '2020-04-06 19:57:33', 0),
(128, 'kdc@narola.email', '2020-04-11 10:17:12', 0),
(130, 'komal@gmail.com', '2020-04-14 10:30:37', 0),
(134, 'ss@gmail.com', '2020-04-14 10:34:47', 0),
(136, 'ADSAD@DXGDG', '2020-04-14 10:35:29', 0),
(137, 'aa@gmail.com', '2020-04-17 09:34:50', 0),
(138, 'komal@gmail', '2020-04-25 11:38:20', 0),
(139, 'dharav@gmail', '2020-04-25 11:38:56', 0),
(140, 'dharav@gmail.com', '2020-04-25 11:39:46', 0),
(141, 'dharav1@gmail.com', '2020-04-25 11:40:37', 0),
(142, 'aa@gmail.vcc', '2020-05-04 18:44:11', 0),
(143, 'ss@gmial.com', '2020-05-07 11:21:41', 0),
(144, 'qas@gmail.com', '2020-05-07 11:23:31', 0),
(145, 'xasw@gmail.com', '2020-05-07 11:23:53', 0),
(146, 'fdes@gmail.com', '2020-05-07 11:24:11', 0),
(147, 'deaa@gmail.com', '2020-05-11 15:48:14', 0);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE IF NOT EXISTS `orders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `coupon_id` int(11) DEFAULT 0,
  `order_number` varchar(32) NOT NULL,
  `invoice_number` bigint(20) NOT NULL,
  `total_products` int(11) NOT NULL,
  `grand_total` decimal(7,2) NOT NULL,
  `order_date` date NOT NULL,
  `order_status` tinyint(1) NOT NULL,
  `payment_method` varchar(20) NOT NULL DEFAULT 'cash on delivery',
  `payment_status` tinyint(1) NOT NULL DEFAULT 0,
  `is_deleted` tinyint(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`),
  UNIQUE KEY `order_number` (`order_number`),
  KEY `coupon_id` (`coupon_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=94 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `coupon_id`, `order_number`, `invoice_number`, `total_products`, `grand_total`, `order_date`, `order_status`, `payment_method`, `payment_status`, `is_deleted`) VALUES
(1, 2, NULL, '7490285', 6584130147, 4, '24820.94', '2020-03-04', 1, 'cash on delivery', 1, 0),
(2, 3, NULL, '7654321', 972014563, 6, '55620.94', '2020-03-10', 0, 'cash on delivery', 1, 0),
(18, 1, NULL, '14252221', 45886107, 1, '9000.00', '2020-04-29', 0, 'cash on delivery', 0, 0),
(53, 57, NULL, '17967908', 56954675, 1, '45000.00', '2020-04-30', 0, 'cash on delivery', 0, 0),
(57, 56, NULL, '34890746', 37685057, 1, '60000.00', '2020-04-30', 0, 'cash on delivery', 0, 0),
(58, 56, NULL, '58779433', 44840956, 1, '3600.00', '2020-04-30', 0, 'cash on delivery', 0, 0),
(59, 56, NULL, '36042446', 69908121, 1, '4500.00', '2020-04-30', 0, 'cash on delivery', 0, 0),
(60, 56, 4, '27874400', 70403882, 3, '14460.00', '2020-05-04', 0, 'cash on delivery', 0, 0),
(61, 56, NULL, '83017450', 71711493, 1, '1250.00', '2020-05-04', 0, 'cash on delivery', 0, 0),
(62, 56, NULL, '84731313', 16287123, 1, '2500.00', '2020-05-04', 0, 'cash on delivery', 0, 0),
(63, 56, NULL, '96292663', 19565298, 1, '1250.00', '2020-05-04', 0, 'cash on delivery', 0, 0),
(64, 57, NULL, '47921652', 72395328, 1, '12000.00', '2020-05-04', 0, 'cash on delivery', 0, 0),
(65, 57, NULL, '31426615', 44905450, 2, '31400.00', '2020-05-04', 0, 'cash on delivery', 0, 0),
(66, 56, NULL, '81143114', 31845720, 2, '13250.00', '2020-05-04', 0, 'cash on delivery', 0, 0),
(67, 57, NULL, '4563149', 83525873, 1, '30000.00', '2020-05-04', 0, 'cash on delivery', 0, 0),
(68, 56, NULL, '28959243', 69409745, 1, '30000.00', '2020-05-05', 0, 'cash on delivery', 0, 0),
(69, 56, NULL, '73349552', 82334913, 1, '12000.00', '2020-05-05', 0, 'cash on delivery', 0, 0),
(70, 56, 1, '9921671', 27894523, 2, '12750.00', '2020-05-05', 0, 'cash on delivery', 0, 0),
(71, 56, NULL, '14028810', 97473507, 1, '1250.00', '2020-05-05', 0, 'cash on delivery', 0, 0),
(72, 56, NULL, '73058972', 40210945, 1, '1250.00', '2020-05-05', 0, 'cash on delivery', 0, 0),
(73, 56, NULL, '30212215', 8259823, 1, '1250.00', '2020-05-05', 0, 'cash on delivery', 0, 0),
(74, 56, NULL, '9357797', 78426721, 1, '1250.00', '2020-05-05', 0, 'cash on delivery', 0, 0),
(75, 56, NULL, '23657800', 85134660, 1, '1250.00', '2020-05-05', 0, 'cash on delivery', 0, 0),
(76, 56, NULL, '34122708', 40567785, 1, '12000.00', '2020-05-05', 0, 'cash on delivery', 0, 0),
(77, 56, NULL, '67098790', 59122936, 1, '12000.00', '2020-05-05', 0, 'cash on delivery', 0, 0),
(78, 56, NULL, '18311877', 75600821, 1, '12000.00', '2020-05-05', 0, 'cash on delivery', 0, 0),
(79, 56, NULL, '94989220', 66038486, 1, '45000.00', '2020-05-05', 0, 'cash on delivery', 0, 0),
(80, 56, NULL, '63400702', 13568045, 1, '12000.00', '2020-05-05', 0, 'cash on delivery', 0, 0),
(81, 56, NULL, '42512520', 51324655, 1, '30000.00', '2020-05-05', 0, 'cash on delivery', 0, 0),
(82, 56, NULL, '64770518', 63495176, 1, '12000.00', '2020-05-05', 0, 'cash on delivery', 0, 0),
(83, 56, NULL, '99428142', 82937875, 1, '30000.00', '2020-05-05', 0, 'cash on delivery', 0, 0),
(84, 56, NULL, '52556575', 44774489, 1, '45000.00', '2020-05-05', 0, 'cash on delivery', 0, 0),
(85, 56, NULL, '93517815', 5193903, 1, '30000.00', '2020-05-05', 0, 'cash on delivery', 0, 0),
(86, 56, NULL, '74893466', 23430458, 1, '45000.00', '2020-05-05', 0, 'cash on delivery', 0, 0),
(87, 56, 3, '95411766', 12351177, 1, '29400.00', '2020-05-06', 0, 'cash on delivery', 0, 0),
(88, 56, NULL, '70397475', 99885359, 1, '45000.00', '2020-05-06', 0, 'cash on delivery', 0, 0),
(89, 1, NULL, '62527021', 15317619, 2, '42000.00', '2020-05-06', 0, 'cash on delivery', 0, 0),
(90, 56, NULL, '47707248', 40034397, 1, '9600.00', '2020-05-07', 0, 'cash on delivery', 0, 0),
(91, 56, NULL, '821983', 54053060, 2, '11200.00', '2020-05-07', 0, 'cash on delivery', 0, 0),
(92, 56, 2, '30992808', 27744891, 1, '20300.00', '2020-05-09', 0, 'cash on delivery', 0, 0),
(93, 56, NULL, '72633138', 65570016, 1, '200.00', '2020-05-11', 0, 'cash on delivery', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

DROP TABLE IF EXISTS `order_items`;
CREATE TABLE IF NOT EXISTS `order_items` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `vendor_status` tinyint(1) NOT NULL DEFAULT 0,
  `quantity` int(11) NOT NULL,
  `total_amount` decimal(7,2) NOT NULL,
  `is_deleted` tinyint(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`),
  KEY `order_id` (`order_id`),
  KEY `product_id` (`product_id`)
) ENGINE=InnoDB AUTO_INCREMENT=113 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`id`, `order_id`, `product_id`, `vendor_status`, `quantity`, `total_amount`, `is_deleted`) VALUES
(1, 1, 1, 1, 2, '15700.70', 0),
(2, 1, 2, 1, 2, '9120.24', 0),
(3, 2, 3, 0, 2, '30800.00', 0),
(4, 2, 2, 0, 2, '9120.24', 0),
(5, 6, 4, 0, 5, '99999.99', 0),
(6, 6, 8, 0, 3, '36000.00', 0),
(7, 6, 11, 0, 1, '1250.00', 0),
(8, 7, 8, 0, 1, '12000.00', 0),
(9, 8, 12, 0, 1, '15000.00', 0),
(10, 9, 11, 0, 1, '1250.00', 0),
(11, 10, 8, 0, 1, '12000.00', 0),
(12, 11, 3, 0, 1, '45000.00', 0),
(13, 12, 8, 0, 1, '12000.00', 0),
(14, 13, 11, 0, 1, '1250.00', 0),
(15, 14, 8, 0, 1, '12000.00', 0),
(16, 15, 11, 0, 1, '1250.00', 0),
(17, 16, 12, 0, 1, '15000.00', 0),
(18, 17, 11, 0, 1, '1250.00', 0),
(19, 18, 4, 0, 1, '30000.00', 0),
(20, 19, 8, 0, 2, '24000.00', 0),
(21, 20, 12, 0, 1, '15000.00', 0),
(22, 21, 8, 0, 1, '12000.00', 0),
(23, 21, 12, 0, 1, '15000.00', 0),
(24, 22, 11, 0, 1, '1250.00', 0),
(25, 23, 5, 0, 1, '12000.00', 0),
(26, 24, 11, 0, 1, '1250.00', 0),
(27, 25, 8, 0, 1, '12000.00', 0),
(28, 25, 12, 0, 1, '15000.00', 0),
(29, 26, 11, 0, 1, '1250.00', 0),
(30, 27, 11, 0, 1, '1250.00', 0),
(31, 28, 4, 0, 1, '30000.00', 0),
(32, 29, 11, 0, 1, '1250.00', 0),
(33, 30, 11, 0, 5, '6250.00', 0),
(34, 31, 4, 0, 1, '30000.00', 0),
(35, 32, 4, 0, 1, '30000.00', 0),
(36, 33, 8, 0, 1, '12000.00', 0),
(37, 34, 4, 0, 1, '30000.00', 0),
(38, 35, 4, 0, 1, '30000.00', 0),
(39, 36, 4, 0, 1, '30000.00', 0),
(40, 37, 4, 0, 1, '30000.00', 0),
(41, 38, 4, 0, 1, '30000.00', 0),
(42, 39, 4, 0, 1, '30000.00', 0),
(43, 40, 3, 0, 1, '45000.00', 0),
(44, 41, 3, 0, 1, '45000.00', 0),
(45, 42, 4, 0, 1, '30000.00', 0),
(46, 43, 4, 0, 1, '30000.00', 0),
(47, 44, 3, 0, 1, '45000.00', 0),
(48, 45, 7, 0, 1, '15000.00', 0),
(49, 46, 3, 0, 1, '45000.00', 0),
(50, 47, 7, 0, 1, '15000.00', 0),
(51, 48, 3, 0, 1, '45000.00', 0),
(52, 48, 7, 0, 1, '15000.00', 0),
(53, 49, 4, 0, 1, '30000.00', 0),
(54, 49, 8, 0, 1, '12000.00', 0),
(55, 49, 3, 0, 1, '45000.00', 0),
(56, 50, 4, 0, 1, '30000.00', 0),
(57, 50, 8, 0, 1, '12000.00', 0),
(58, 51, 10, 0, 1, '32000.00', 0),
(59, 51, 3, 0, 1, '45000.00', 0),
(60, 51, 7, 0, 1, '15000.00', 0),
(61, 52, 4, 0, 1, '30000.00', 0),
(62, 52, 3, 0, 1, '45000.00', 0),
(63, 52, 6, 0, 1, '1200.00', 0),
(64, 53, 3, 0, 1, '45000.00', 0),
(65, 54, 3, 0, 1, '45000.00', 0),
(66, 55, 4, 0, 1, '30000.00', 0),
(67, 55, 7, 0, 1, '15000.00', 0),
(68, 56, 4, 0, 1, '30000.00', 0),
(69, 57, 4, 0, 2, '60000.00', 0),
(70, 58, 8, 0, 1, '12000.00', 0),
(71, 59, 7, 0, 1, '15000.00', 0),
(72, 60, 4, 0, 1, '30000.00', 0),
(73, 60, 8, 0, 1, '12000.00', 0),
(74, 60, 5, 0, 2, '24000.00', 0),
(75, 61, 11, 0, 1, '1250.00', 0),
(76, 62, 11, 0, 2, '2500.00', 0),
(77, 63, 11, 0, 1, '1250.00', 0),
(78, 64, 8, 0, 1, '12000.00', 0),
(79, 65, 4, 0, 1, '29000.00', 0),
(80, 65, 6, 0, 2, '2400.00', 0),
(81, 66, 13, 0, 1, '1250.00', 0),
(82, 66, 8, 0, 1, '12000.00', 0),
(83, 67, 4, 0, 1, '30000.00', 0),
(84, 68, 4, 0, 1, '30000.00', 0),
(85, 69, 8, 0, 1, '12000.00', 0),
(86, 70, 8, 0, 1, '12000.00', 0),
(87, 70, 11, 0, 1, '1250.00', 0),
(88, 71, 11, 0, 1, '1250.00', 0),
(89, 72, 11, 0, 1, '1250.00', 0),
(90, 73, 11, 0, 1, '1250.00', 0),
(91, 74, 11, 0, 1, '1250.00', 0),
(92, 75, 11, 0, 1, '1250.00', 0),
(93, 76, 5, 0, 1, '12000.00', 0),
(94, 77, 5, 0, 1, '12000.00', 0),
(95, 78, 5, 0, 1, '12000.00', 0),
(96, 79, 3, 0, 1, '45000.00', 0),
(97, 80, 8, 0, 1, '12000.00', 0),
(98, 81, 4, 0, 1, '30000.00', 0),
(99, 82, 8, 0, 1, '12000.00', 0),
(100, 83, 4, 0, 1, '30000.00', 0),
(101, 84, 3, 0, 1, '45000.00', 0),
(102, 85, 4, 0, 1, '30000.00', 0),
(103, 86, 3, 0, 1, '45000.00', 0),
(104, 87, 12, 0, 2, '30000.00', 0),
(105, 88, 3, 0, 1, '45000.00', 0),
(106, 89, 5, 0, 1, '12000.00', 0),
(107, 89, 2, 0, 3, '30000.00', 0),
(108, 90, 5, 0, 1, '9600.00', 0),
(109, 91, 2, 0, 1, '10000.00', 0),
(110, 91, 6, 0, 1, '1200.00', 0),
(111, 92, 4, 0, 1, '29000.00', 0),
(112, 93, 31, 0, 1, '200.00', 0);

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
  `name` varchar(100) NOT NULL,
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
  `add_date` datetime NOT NULL DEFAULT current_timestamp(),
  `is_sale` tinyint(1) NOT NULL DEFAULT 0,
  `is_hot` tinyint(1) NOT NULL DEFAULT 0,
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `is_deleted` tinyint(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`),
  KEY `vendor_id` (`vendor_id`),
  KEY `brand_id` (`brand_id`),
  KEY `category_id` (`category_id`),
  KEY `sub_category_id` (`sub_category_id`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `vendor_id`, `brand_id`, `category_id`, `sub_category_id`, `name`, `slug`, `sku`, `short_description`, `long_description`, `thumb_image`, `images`, `quantity`, `old_price`, `price`, `related_products`, `tags`, `add_date`, `is_sale`, `is_hot`, `is_active`, `is_deleted`) VALUES
(2, 1, 4, 4, 3, 'smart watch', 'smart-watch', 4589769, 'dwfd', 'dsfdsf', 'assets/uploads/products/watch_1.jpg', 'a:3:{i:0;s:45:\"assets/uploads/products/1584168342--nike4.jpg\";i:1;s:45:\"assets/uploads/products/1584168342--nike3.jpg\";i:2;s:45:\"assets/uploads/products/1584168342--nike2.jpg\";}', 6, '15000.00', '10000.00', 'a:1:{i:0;s:1:\"1\";}', 'watch,smart-watch', '2020-04-08 11:40:48', 0, 1, 1, 0),
(3, 1, 1, 2, 4, 'Android TV', 'Android-TV', 7856948, 'dsfdsggg\r\ndfg\r\nddg', 'dsgdfgd\r\ndfgdfg\r\ndfgdfg\r\ndfag\r\n', 'assets/uploads/products/tv1.jpg', 'a:3:{i:0;s:45:\"assets/uploads/products/1584168342--nike4.jpg\";i:1;s:45:\"assets/uploads/products/1584168342--nike3.jpg\";i:2;s:45:\"assets/uploads/products/1584168342--nike2.jpg\";}', 0, '50000.00', '45000.00', 'a:1:{i:0;s:1:\"1\";}', 'led-tv', '2020-04-08 11:40:48', 0, 0, 1, 0),
(4, 1, 1, 2, 4, 'android LED 108 cm', 'android-LED-108-cm', 456985, 'qwdwddsdf', 'sffgdgdfgf\r\ndsgdfgdf\r\ndfgdfg\r\ndfag\r\nd', 'assets/uploads/products/tv1.jpg', 'a:3:{i:0;s:45:\"assets/uploads/products/1584168342--nike4.jpg\";i:1;s:45:\"assets/uploads/products/1584168342--nike3.jpg\";i:2;s:45:\"assets/uploads/products/1584168342--nike2.jpg\";}', 4, '38000.00', '30000.00', 'a:1:{i:0;s:1:\"1\";}', 'tv,aaa,w2ww', '2020-04-08 11:40:48', 1, 0, 1, 0),
(5, 2, 3, 4, 3, 'watch 3', 'watch-3', 789587, 'dfdsfdsfsf', 'sdfsdfdsfdsfdsf', 'assets/uploads/products/watch_2.jpg', '', 0, '15000.00', '12000.00', '', 'watch,aaa,smobile', '2020-04-08 11:40:48', 1, 0, 1, 0),
(6, 1, 1, 4, 3, 'watch 4', 'watc-4', 789658, 'dgdfgdfg', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', 'assets/uploads/products/watch_3.jpg', '', 1, '1500.00', '1200.00', '', 'smart-watch', '2020-04-08 11:40:48', 0, 1, 1, 0),
(7, 1, 4, 2, 4, 'LED TV', 'LED-TV', 789654, 'dsad', 'adad', 'assets/uploads/products/tv1.jpg', '', 4, '20000.00', '15000.00', '', 'tv', '2020-04-08 11:40:48', 0, 0, 1, 0),
(8, 1, 1, 2, 5, 'android mobiles', 'android-mobile', 879589, 'dsfsdf', 'fsfsdf', 'assets/uploads/products/tv1.jpg', '', 0, '20000.00', '12000.00', '', 'mobile,smart-mobile ', '2020-04-08 11:40:48', 0, 0, 1, 0),
(9, 1, 1, 2, 4, 'tv', 'tv', 7895647, 'sdsf', 'adadasd', 'assets/uploads/products/tv1.jpg', '', 5, '20000.00', '10000.00', '', 'tv', '2020-04-08 11:40:48', 0, 0, 1, 0),
(10, 1, 1, 2, 4, 'LED TV 108 cm ', 'LED-TV-108-cm ', 789658, 'acacascas', 'saADSADSAD', 'assets/uploads/products/tv1.jpg', 'a:3:{i:0;s:45:\"assets/uploads/products/1584168342--nike4.jpg\";i:1;s:45:\"assets/uploads/products/1584168342--nike3.jpg\";i:2;s:45:\"assets/uploads/products/1584168342--nike2.jpg\";}', 9, '45000.00', '32000.00', '', 'tv', '2020-04-08 11:40:48', 0, 0, 1, 0),
(11, 1, 2, 1, 2, 'shirt', 'shirt', 799658, 'axcxzc', 'zxczxczxczxcsdfsd', 'assets/uploads/products/shirt3.jpg', '', 0, '1500.00', '1250.00', '', 'shirt,aaa,smobile,mmmobile', '2020-04-08 11:40:48', 0, 0, 1, 0),
(12, 1, 3, 2, 5, 'mi mobile phone', 'mi-mobile-phone', 789456, 'sdfdg', 'dsfgsdg', 'assets/uploads/products/tv1.jpg', '', 0, '18000.00', '15000.00', '', 'mi-mobile', '2020-04-08 11:40:48', 0, 0, 1, 0),
(13, 1, 5, 2, 10, 'earphone', 'earphone', 799658, 'cfddfc', 'nkjhkfd', 'assets/uploads/products/watch_1.jpg', '', 9, '1800.00', '1250.00', '', 'ear-phone', '2020-04-08 11:40:48', 0, 0, 1, 0),
(30, 1, 6, 2, 5, 'MI tv 41ench', 'mi-tv', 799658, 'sdfsdvsddssd', 'ssdfsdfsd', 'assets/uploads/products/tv1.jpg', '', 2, '20000.00', '18000.00', '', 'tv', '2020-05-08 17:10:41', 0, 0, 1, 0),
(31, 1, 5, 2, 5, 'data cable 2 inch', 'data-cable', 789658, 'Ada', 'adaDASD', 'assets/uploads/products/tv1.jpg', '', 9, '500.00', '200.00', '', 'cable', '2020-05-09 14:23:46', 0, 0, 1, 0);

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
  `add_date` datetime NOT NULL DEFAULT current_timestamp(),
  `is_deleted` tinyint(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`),
  KEY `product_id` (`product_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=74 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reviews`
--

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
(63, 56, 3, 5, 'aaaaaaaaaaaaaaaaa', '2020-05-07 11:46:43', 0),
(64, 56, 4, 5, 'adsadsadasdsa', '2020-05-07 12:38:43', 0),
(65, 56, 4, 4, 'werewtertertertretr', '2020-05-08 00:00:00', 0),
(66, 56, 4, 5, 'wetertretertret', '2020-05-07 18:08:00', 0),
(67, 1, 4, 4, 'efesfdsfdsfds', '2020-05-07 18:08:23', 0),
(68, 1, 4, 4, 'wefewfefsfs', '2020-05-07 18:08:33', 0),
(69, 56, 8, 5, 'sdasdsadsadasd', '2020-05-09 12:41:33', 0),
(73, 56, 31, 5, 'sfsdfdsfsdfsdfsfd', '2020-05-11 03:47:11', 0);

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
(30, 'vendors_registration', '0');

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
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `is_deleted` tinyint(1) NOT NULL DEFAULT 0,
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
-- Table structure for table `tmp_order_datas`
--

DROP TABLE IF EXISTS `tmp_order_datas`;
CREATE TABLE IF NOT EXISTS `tmp_order_datas` (
  `user_id` int(11) NOT NULL,
  `coupon_id` int(11) NOT NULL,
  KEY `user_id` (`user_id`),
  KEY `coupon_id` (`coupon_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `role_id` int(11) NOT NULL DEFAULT 0,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `mobile` bigint(20) NOT NULL,
  `password` varchar(32) NOT NULL,
  `profile_image` mediumtext NOT NULL,
  `last_login` datetime NOT NULL,
  `last_ip` varchar(50) NOT NULL,
  `signup_date` datetime DEFAULT current_timestamp(),
  `last_password_change` datetime DEFAULT NULL,
  `new_pass_key` varchar(32) NOT NULL,
  `new_pass_key_requested` datetime NOT NULL,
  `sign_up_key` varchar(32) NOT NULL,
  `is_email_verified` tinyint(1) NOT NULL,
  `is_active` tinyint(1) NOT NULL,
  `is_admin` tinyint(1) NOT NULL DEFAULT 0,
  `is_deleted` tinyint(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`),
  KEY `role_id` (`role_id`)
) ENGINE=InnoDB AUTO_INCREMENT=59 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `role_id`, `firstname`, `lastname`, `email`, `mobile`, `password`, `profile_image`, `last_login`, `last_ip`, `signup_date`, `last_password_change`, `new_pass_key`, `new_pass_key_requested`, `sign_up_key`, `is_email_verified`, `is_active`, `is_admin`, `is_deleted`) VALUES
(1, 1, 'bhavik', 'patel', 'bdp@narola.email', 9978554691, '53acf5f531943514246a7ed92f496a7d', '', '2020-05-06 15:36:04', '::1', '2020-02-27 12:11:21', '2020-03-13 14:58:30', '', '2020-02-24 03:04:19', '', 1, 1, 1, 0),
(2, 0, 'User', 'User', 'user@gmail.com', 7878787878, 'ee11cbb19052e40b07aac0ca060c23ee', './assets/uploads/users/16-1-user.png', '2020-04-06 00:11:44', '::1', '2020-02-11 09:22:00', NULL, '-', '2020-03-03 00:00:00', '-', 1, 1, 0, 0),
(3, 0, 'anonymous', 'user', 'anonymous@gmail.com', 6565656565, '294de3557d9d00b3d2d8a1e6aab028cf', '-', '2020-03-12 12:28:39', '::1', '2020-03-02 05:13:28', NULL, '-', '2020-03-03 00:00:00', '-', 1, 1, 0, 0),
(8, 0, 'vixuti', 'patel', 'vrpp@narola.email', 9898675454, '7f237be719ee43162b69b1ea52140237', 'assets/uploads/users/1586111609-default_img.png', '2020-04-06 18:46:03', '::1', '2020-04-03 17:55:12', '2020-04-06 18:45:51', '', '0000-00-00 00:00:00', '6ec3125f81559a5cbfa7b37cccbc5cd3', 1, 1, 0, 0),
(11, 0, 'mili', 'tandel', 'mili@gmail.com', 8787676565, '76681a82dd1c41a61bf1d3fbcf20b608', 'assets/uploads/users/1586111945-default_img.png', '2020-04-06 00:08:28', '::1', '2020-04-03 18:03:07', NULL, '', '0000-00-00 00:00:00', '4b8de18fee1f85d06bad557d87ae41a0', 1, 1, 1, 0),
(45, 0, 'krina', 'patel', 'krina@gmail.com', 9878676567, '72f361fbf1ac746ef085c4a83bae0c44', '', '0000-00-00 00:00:00', '', '2020-04-06 15:19:19', NULL, '', '0000-00-00 00:00:00', '6db32f2b64fdad0b91b6c122382f8aaa', 0, 0, 0, 0),
(51, 0, 'jina', 'tandel', 'gcart.team@gmail.com', 9898786765, '1ac5a38d78b1c5159298aa191fb8b8d8', '', '2020-04-06 18:48:31', '::1', '2020-04-06 19:02:15', '2020-04-06 19:15:56', '', '0000-00-00 00:00:00', 'd0086194fbd3d608459c24afcb750405', 1, 1, 0, 0),
(52, 0, 'ayushi', 'patel', 'vrpl@narola.email', 9887677656, '3e44e7ddd8c1c14677d4043253c67833', '', '0000-00-00 00:00:00', '', '2020-04-06 19:33:10', NULL, '', '0000-00-00 00:00:00', 'ea3aaf65954c4b2d153a224ef60d3286', 1, 1, 0, 0),
(53, 0, 'vrp', 'narola', 'vixuti@gmail.com', 8787676556, '3e76c356c75da6415a8e741a6d50ffee', '', '2020-04-06 19:29:48', '::1', '2020-04-06 19:43:41', NULL, '', '0000-00-00 00:00:00', '33ec2d7a2f5d5b2ea48b9324e9bc1d6f', 1, 1, 0, 0),
(54, 0, 'ekta', 'patel', 'vrp@narola.email', 9898787667, '521b7f3b9f5189310321f1db7cf8eadd', 'assets/uploads/users/1586182037-dell.png', '2020-04-06 19:35:50', '::1', '2020-04-06 19:50:02', NULL, '', '0000-00-00 00:00:00', '019ef84b71ef206bea5d14aaaf7e5743', 1, 1, 0, 0),
(56, 0, 'komal', 'chhipa', 'komalkhalasi.13@gmail.com', 7894569856, '8ffa9b29c4b60ee0510b52f535fb5bf9', 'assets/uploads/users/1587624786-1586182037-dell.png', '2020-05-11 15:04:18', '::1', '2020-04-20 12:23:41', NULL, '', '0000-00-00 00:00:00', 'be76e829f4fa3b554fd60a31222b391e', 1, 1, 0, 0),
(57, 0, 'dharav', 'chhipa', 'dch@narola.email', 4569874569, 'e8dfa887017d643d55d68a6fc9cb9e8c', '', '2020-05-04 19:13:49', '::1', '2020-04-30 17:25:07', NULL, '', '0000-00-00 00:00:00', 'bb1e0f16ea4240465763728f5cd6f28a', 1, 1, 0, 0),
(58, 0, 'komal', 'chhipa', 'kdc@narola.email', 7896584789, '8ffa9b29c4b60ee0510b52f535fb5bf9', '', '0000-00-00 00:00:00', '', '2020-05-04 15:58:08', NULL, '', '0000-00-00 00:00:00', '943b63b1b28335dfab696915a0a68c84', 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `users_addresses`
--

DROP TABLE IF EXISTS `users_addresses`;
CREATE TABLE IF NOT EXISTS `users_addresses` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `users_id` int(11) NOT NULL,
  `house_or_village` varchar(250) NOT NULL,
  `street_or_society` varchar(250) NOT NULL,
  `city` varchar(50) NOT NULL,
  `state` varchar(50) NOT NULL,
  `pincode` int(6) NOT NULL,
  `is_deleted` tinyint(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`),
  KEY `users_id` (`users_id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users_addresses`
--

INSERT INTO `users_addresses` (`id`, `users_id`, `house_or_village`, `street_or_society`, `city`, `state`, `pincode`, `is_deleted`) VALUES
(1, 1, 'C-122', 'nayak near shiv temple ,adaan shope', 'navsari', 'Gujarat', 123456, 0),
(2, 2, 'asw', 'mrl', 'navsari', 'gujarat', 396436, 0),
(3, 3, 'annyms-1', 'ayms-2', 'annnn', 'gujarat', 396436, 0),
(4, 8, 'bilimora', 'antalia', 'navsari', 'gujarat', 0, 0),
(5, 11, '', '', '', '', 0, 0),
(6, 51, '', '', '', '', 0, 0),
(7, 53, 'antalia', 'balaji nagar', 'navsari', 'gujarat', 0, 0),
(8, 54, '', '', '', '', 0, 0),
(9, 56, 'B-301', 'Star world recidency ,Near bagban circle', 'Surat', 'Gujarat', 123456, 0),
(10, 57, 'B-301', 'stw ,grren ciry,pal', 'suart', 'gujarat', 123456, 0);

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
  `is_admin` tinyint(1) NOT NULL DEFAULT 0,
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
) ENGINE=InnoDB AUTO_INCREMENT=325 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `wishlist`
--

INSERT INTO `wishlist` (`id`, `user_id`, `product_id`, `is_deleted`) VALUES
(51, 56, 11, 1),
(52, 56, 13, 1),
(53, 56, 12, 1),
(55, 56, 12, 1),
(56, 56, 12, 1),
(57, 56, 5, 1),
(58, 56, 12, 1),
(59, 56, 8, 1),
(60, 56, 11, 1),
(61, 56, 11, 1),
(62, 56, 13, 1),
(63, 56, 13, 1),
(64, 56, 11, 1),
(65, 56, 12, 1),
(66, 56, 12, 1),
(67, 56, 11, 1),
(68, 56, 11, 1),
(69, 56, 6, 1),
(70, 56, 6, 1),
(71, 56, 6, 1),
(72, 56, 13, 1),
(73, 56, 12, 1),
(74, 56, 11, 1),
(75, 56, 8, 1),
(76, 56, 6, 1),
(77, 56, 11, 1),
(78, 56, 2, 1),
(79, 56, 5, 1),
(80, 56, 6, 1),
(81, 56, 4, 1),
(82, 56, 6, 1),
(83, 56, 3, 1),
(84, 56, 8, 1),
(86, 56, 11, 1),
(87, 56, 12, 1),
(88, 56, 5, 1),
(89, 56, 6, 1),
(90, 56, 4, 1),
(91, 56, 12, 1),
(92, 56, 11, 1),
(93, 56, 13, 1),
(94, 56, 11, 1),
(95, 56, 12, 1),
(96, 56, 5, 1),
(97, 56, 5, 1),
(98, 56, 4, 1),
(99, 56, 4, 1),
(100, 56, 4, 1),
(101, 56, 5, 1),
(102, 56, 5, 1),
(103, 56, 5, 1),
(104, 56, 11, 1),
(107, 56, 11, 1),
(113, 56, 4, 1),
(114, 56, 4, 1),
(116, 56, 5, 1),
(117, 56, 11, 1),
(118, 56, 11, 1),
(119, 56, 13, 1),
(120, 56, 11, 1),
(121, 56, 8, 1),
(122, 56, 3, 1),
(123, 56, 13, 1),
(124, 56, 11, 1),
(125, 56, 8, 1),
(126, 56, 12, 1),
(127, 56, 8, 1),
(128, 56, 4, 1),
(129, 56, 3, 1),
(130, 1, 8, 1),
(131, 1, 8, 1),
(132, 1, 11, 1),
(133, 1, 8, 1),
(134, 1, 4, 1),
(135, 1, 3, 1),
(136, 1, 11, 1),
(137, 56, 4, 1),
(138, 56, 2, 1),
(139, 56, 5, 1),
(140, 56, 6, 1),
(141, 1, 7, 1),
(142, 1, 12, 1),
(143, 56, 11, 1),
(144, 56, 12, 1),
(145, 56, 8, 1),
(146, 56, 3, 1),
(147, 56, 2, 1),
(148, 56, 5, 1),
(149, 56, 6, 1),
(150, 56, 11, 1),
(151, 56, 13, 1),
(152, 56, 7, 1),
(153, 56, 10, 1),
(154, 56, 9, 1),
(155, 56, 8, 1),
(156, 56, 12, 1),
(157, 56, 2, 1),
(158, 56, 5, 1),
(159, 56, 6, 1),
(160, 56, 4, 1),
(161, 56, 4, 1),
(162, 56, 4, 1),
(163, 56, 4, 1),
(164, 56, 4, 1),
(165, 56, 4, 1),
(166, 56, 8, 1),
(167, 56, 8, 1),
(168, 56, 3, 1),
(169, 56, 8, 1),
(170, 56, 2, 1),
(171, 56, 2, 1),
(172, 56, 5, 1),
(173, 56, 2, 1),
(174, 56, 2, 1),
(175, 56, 11, 1),
(176, 56, 11, 1),
(177, 56, 11, 1),
(178, 56, 11, 1),
(179, 56, 4, 1),
(180, 56, 8, 1),
(181, 56, 3, 1),
(182, 56, 5, 1),
(183, 56, 5, 1),
(184, 56, 5, 1),
(185, 56, 5, 1),
(186, 56, 5, 1),
(187, 56, 2, 1),
(188, 56, 6, 1),
(189, 56, 5, 1),
(190, 56, 5, 1),
(191, 56, 2, 1),
(192, 56, 5, 1),
(193, 56, 6, 1),
(194, 56, 6, 1),
(195, 56, 6, 1),
(196, 56, 5, 1),
(197, 56, 5, 1),
(198, 56, 5, 1),
(199, 56, 5, 1),
(200, 56, 2, 1),
(201, 56, 6, 1),
(202, 56, 5, 1),
(203, 56, 2, 1),
(204, 56, 5, 1),
(205, 56, 5, 1),
(206, 56, 5, 1),
(207, 56, 5, 1),
(208, 56, 5, 1),
(209, 56, 5, 1),
(210, 56, 5, 1),
(211, 56, 2, 1),
(212, 56, 2, 1),
(213, 56, 2, 1),
(214, 56, 5, 1),
(215, 56, 6, 1),
(216, 56, 6, 1),
(217, 56, 6, 1),
(218, 56, 4, 1),
(219, 56, 5, 1),
(220, 56, 6, 1),
(221, 56, 6, 1),
(222, 56, 2, 1),
(223, 56, 5, 1),
(224, 56, 6, 1),
(225, 56, 4, 1),
(226, 56, 5, 1),
(227, 56, 5, 1),
(228, 56, 5, 1),
(229, 56, 4, 1),
(230, 56, 5, 1),
(231, 56, 5, 1),
(232, 56, 5, 1),
(233, 56, 5, 1),
(234, 56, 4, 1),
(235, 56, 5, 1),
(236, 56, 5, 1),
(237, 56, 5, 1),
(238, 56, 5, 1),
(239, 56, 5, 1),
(240, 56, 5, 1),
(241, 56, 5, 1),
(242, 56, 5, 1),
(243, 56, 4, 1),
(244, 56, 5, 1),
(245, 56, 5, 1),
(246, 56, 5, 1),
(247, 56, 5, 1),
(248, 56, 5, 1),
(249, 56, 5, 1),
(250, 56, 5, 1),
(251, 56, 4, 1),
(252, 56, 5, 1),
(253, 56, 5, 1),
(254, 56, 5, 1),
(255, 56, 2, 1),
(256, 56, 5, 1),
(257, 56, 5, 1),
(258, 56, 5, 1),
(259, 56, 5, 1),
(260, 56, 5, 1),
(261, 56, 5, 1),
(262, 56, 4, 1),
(263, 56, 4, 1),
(264, 56, 4, 1),
(265, 56, 4, 1),
(266, 56, 4, 1),
(267, 56, 4, 1),
(268, 56, 4, 1),
(269, 56, 4, 1),
(270, 56, 4, 1),
(271, 56, 4, 1),
(272, 56, 5, 1),
(273, 56, 2, 1),
(274, 56, 6, 1),
(275, 56, 5, 1),
(276, 56, 11, 1),
(277, 56, 11, 1),
(278, 56, 11, 1),
(279, 56, 11, 1),
(280, 56, 4, 1),
(281, 56, 5, 1),
(282, 56, 11, 1),
(283, 56, 4, 1),
(284, 56, 5, 1),
(285, 56, 11, 1),
(286, 56, 9, 1),
(287, 56, 4, 1),
(288, 56, 8, 1),
(289, 56, 9, 1),
(290, 1, 3, 1),
(291, 1, 2, 1),
(292, 1, 3, 1),
(293, 1, 2, 1),
(294, 56, 2, 1),
(295, 56, 2, 1),
(296, 56, 2, 1),
(297, 56, 2, 1),
(298, 56, 2, 1),
(299, 56, 2, 1),
(300, 56, 5, 1),
(301, 56, 3, 1),
(302, 56, 4, 1),
(303, 56, 4, 1),
(304, 56, 4, 1),
(305, 56, 7, 1),
(306, 56, 8, 1),
(307, 56, 8, 1),
(308, 56, 8, 1),
(309, 56, 2, 1),
(310, 56, 5, 1),
(311, 56, 6, 1),
(312, 56, 4, 1),
(313, 56, 3, 1),
(314, 56, 7, 1),
(315, 56, 8, 1),
(316, 56, 4, 1),
(317, 56, 5, 1),
(318, 56, 4, 1),
(319, 56, 8, 0),
(320, 56, 13, 1),
(321, 56, 13, 0),
(322, 56, 4, 1),
(323, 56, 30, 0),
(324, 56, 31, 1);

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
-- Constraints for table `sub_categories`
--
ALTER TABLE `sub_categories`
  ADD CONSTRAINT `sub_categories_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`);

--
-- Constraints for table `tmp_order_datas`
--
ALTER TABLE `tmp_order_datas`
  ADD CONSTRAINT `tmp_order_datas_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `tmp_order_datas_ibfk_2` FOREIGN KEY (`coupon_id`) REFERENCES `coupons` (`id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`);

--
-- Constraints for table `users_addresses`
--
ALTER TABLE `users_addresses`
  ADD CONSTRAINT `users_addresses_ibfk_1` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`);

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
