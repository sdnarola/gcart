-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 22, 2020 at 07:07 AM
-- Server version: 5.7.26
-- PHP Version: 7.3.5

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
  `banner` text NOT NULL,
  `is_deleted` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `banners`
--

INSERT INTO `banners` (`id`, `title`, `sub_title`, `description`, `banner`, `is_deleted`) VALUES
(1, 'crazy', 'sales', 'new men\'s fashion', 'assets/uploads/banners/banner.jpg', 0),
(2, 'flash sale', 'up to 50% off', '', 'assets/uploads/banners/home.png', 0),
(3, 'New fashion', 'save up to 50% OFF', 'new collections', 'assets/uploads/banners/home-banner.jpg', 0);

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

DROP TABLE IF EXISTS `brands`;
CREATE TABLE IF NOT EXISTS `brands` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `logo` mediumtext NOT NULL,
  `is_deleted` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `name`, `logo`, `is_deleted`) VALUES
(1, 'nike', 'assets/uploads/brands/1590043123-nike_logo.png', 0);

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

DROP TABLE IF EXISTS `cart`;
CREATE TABLE IF NOT EXISTS `cart` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `user_ip` varchar(200) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `total_amount` decimal(7,2) NOT NULL,
  `date` datetime NOT NULL,
  `is_deleted` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `product_id` (`product_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `user_id`, `user_ip`, `product_id`, `quantity`, `total_amount`, `date`, `is_deleted`) VALUES
(1, 2, '::1', 1, 2, '3000.00', '2020-05-21 02:13:23', 1),
(2, 1, '::1', 1, 2, '5000.00', '2020-05-21 02:14:05', 1),
(3, 1, '::1', 2, 1, '1200.00', '2020-05-21 02:57:41', 1),
(4, 1, '::1', 1, 1, '2500.00', '2020-05-21 02:57:43', 1),
(5, 0, '::1', 1, 1, '1500.00', '2020-05-22 11:30:11', 1),
(6, 3, '::1', 2, 1, '1200.00', '2020-05-22 11:53:50', 1);

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
  `is_header` tinyint(1) NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `is_deleted` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `slug` (`slug`),
  KEY `banner_id` (`banner_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `banner_id`, `name`, `slug`, `icon`, `is_header`, `is_active`, `is_deleted`) VALUES
(1, 2, 'sports', 'sports', 'assets/uploads/main_categories/1590043013-gcart.png', 0, 1, 0),
(2, 2, 'electronics', 'electronics', 'assets/uploads/main_categories/1590064818-1584163197-tv1.jpg', 0, 1, 0),
(3, 2, 'clothes', 'clothes', 'assets/uploads/main_categories/1590064954-tshirt.jpg', 0, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

DROP TABLE IF EXISTS `cities`;
CREATE TABLE IF NOT EXISTS `cities` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `state_id` int(11) NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `is_deleted` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `state_id` (`state_id`)
) ENGINE=InnoDB AUTO_INCREMENT=604 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`id`, `name`, `state_id`, `is_active`, `is_deleted`) VALUES
(1, 'North and Middle Andaman', 32, 1, 0),
(2, 'South Andaman', 32, 1, 0),
(3, 'Nicobar', 32, 1, 0),
(4, 'Adilabad', 1, 1, 0),
(5, 'Anantapur', 1, 1, 0),
(6, 'Chittoor', 1, 1, 0),
(7, 'East Godavari', 1, 1, 0),
(8, 'Guntur', 1, 1, 0),
(9, 'Hyderabad', 1, 1, 0),
(10, 'Kadapa', 1, 1, 0),
(11, 'Karimnagar', 1, 1, 0),
(12, 'Khammam', 1, 1, 0),
(13, 'Krishna', 1, 1, 0),
(14, 'Kurnool', 1, 1, 0),
(15, 'Mahbubnagar', 1, 1, 0),
(16, 'Medak', 1, 1, 0),
(17, 'Nalgonda', 1, 1, 0),
(18, 'Nellore', 1, 1, 0),
(19, 'Nizamabad', 1, 1, 0),
(20, 'Prakasam', 1, 1, 0),
(21, 'Rangareddi', 1, 1, 0),
(22, 'Srikakulam', 1, 1, 0),
(23, 'Vishakhapatnam', 1, 1, 0),
(24, 'Vizianagaram', 1, 1, 0),
(25, 'Warangal', 1, 1, 0),
(26, 'West Godavari', 1, 1, 0),
(27, 'Anjaw', 3, 1, 0),
(28, 'Changlang', 3, 1, 0),
(29, 'East Kameng', 3, 1, 0),
(30, 'Lohit', 3, 1, 0),
(31, 'Lower Subansiri', 3, 1, 0),
(32, 'Papum Pare', 3, 1, 0),
(33, 'Tirap', 3, 1, 0),
(34, 'Dibang Valley', 3, 1, 0),
(35, 'Upper Subansiri', 3, 1, 0),
(36, 'West Kameng', 3, 1, 0),
(37, 'Barpeta', 2, 1, 0),
(38, 'Bongaigaon', 2, 1, 0),
(39, 'Cachar', 2, 1, 0),
(40, 'Darrang', 2, 1, 0),
(41, 'Dhemaji', 2, 1, 0),
(42, 'Dhubri', 2, 1, 0),
(43, 'Dibrugarh', 2, 1, 0),
(44, 'Goalpara', 2, 1, 0),
(45, 'Golaghat', 2, 1, 0),
(46, 'Hailakandi', 2, 1, 0),
(47, 'Jorhat', 2, 1, 0),
(48, 'Karbi Anglong', 2, 1, 0),
(49, 'Karimganj', 2, 1, 0),
(50, 'Kokrajhar', 2, 1, 0),
(51, 'Lakhimpur', 2, 1, 0),
(52, 'Marigaon', 2, 1, 0),
(53, 'Nagaon', 2, 1, 0),
(54, 'Nalbari', 2, 1, 0),
(55, 'North Cachar Hills', 2, 1, 0),
(56, 'Sibsagar', 2, 1, 0),
(57, 'Sonitpur', 2, 1, 0),
(58, 'Tinsukia', 2, 1, 0),
(59, 'Araria', 4, 1, 0),
(60, 'Aurangabad', 4, 1, 0),
(61, 'Banka', 4, 1, 0),
(62, 'Begusarai', 4, 1, 0),
(63, 'Bhagalpur', 4, 1, 0),
(64, 'Bhojpur', 4, 1, 0),
(65, 'Buxar', 4, 1, 0),
(66, 'Darbhanga', 4, 1, 0),
(67, 'Purba Champaran', 4, 1, 0),
(68, 'Gaya', 4, 1, 0),
(69, 'Gopalganj', 4, 1, 0),
(70, 'Jamui', 4, 1, 0),
(71, 'Jehanabad', 4, 1, 0),
(72, 'Khagaria', 4, 1, 0),
(73, 'Kishanganj', 4, 1, 0),
(74, 'Kaimur', 4, 1, 0),
(75, 'Katihar', 4, 1, 0),
(76, 'Lakhisarai', 4, 1, 0),
(77, 'Madhubani', 4, 1, 0),
(78, 'Munger', 4, 1, 0),
(79, 'Madhepura', 4, 1, 0),
(80, 'Muzaffarpur', 4, 1, 0),
(81, 'Nalanda', 4, 1, 0),
(82, 'Nawada', 4, 1, 0),
(83, 'Patna', 4, 1, 0),
(84, 'Purnia', 4, 1, 0),
(85, 'Rohtas', 4, 1, 0),
(86, 'Saharsa', 4, 1, 0),
(87, 'Samastipur', 4, 1, 0),
(88, 'Sheohar', 4, 1, 0),
(89, 'Sheikhpura', 4, 1, 0),
(90, 'Saran', 4, 1, 0),
(91, 'Sitamarhi', 4, 1, 0),
(92, 'Supaul', 4, 1, 0),
(93, 'Siwan', 4, 1, 0),
(94, 'Vaishali', 4, 1, 0),
(95, 'Pashchim Champaran', 4, 1, 0),
(96, 'Bastar', 36, 1, 0),
(97, 'Bilaspur', 36, 1, 0),
(98, 'Dantewada', 36, 1, 0),
(99, 'Dhamtari', 36, 1, 0),
(100, 'Durg', 36, 1, 0),
(101, 'Jashpur', 36, 1, 0),
(102, 'Janjgir-Champa', 36, 1, 0),
(103, 'Korba', 36, 1, 0),
(104, 'Koriya', 36, 1, 0),
(105, 'Kanker', 36, 1, 0),
(106, 'Kawardha', 36, 1, 0),
(107, 'Mahasamund', 36, 1, 0),
(108, 'Raigarh', 36, 1, 0),
(109, 'Rajnandgaon', 36, 1, 0),
(110, 'Raipur', 36, 1, 0),
(111, 'Surguja', 36, 1, 0),
(112, 'Diu', 29, 1, 0),
(113, 'Daman', 29, 1, 0),
(114, 'Central Delhi', 25, 1, 0),
(115, 'East Delhi', 25, 1, 0),
(116, 'New Delhi', 25, 1, 0),
(117, 'North Delhi', 25, 1, 0),
(118, 'North East Delhi', 25, 1, 0),
(119, 'North West Delhi', 25, 1, 0),
(120, 'South Delhi', 25, 1, 0),
(121, 'South West Delhi', 25, 1, 0),
(122, 'West Delhi', 25, 1, 0),
(123, 'North Goa', 26, 1, 0),
(124, 'South Goa', 26, 1, 0),
(125, 'Ahmedabad', 5, 1, 0),
(126, 'Amreli District', 5, 1, 0),
(127, 'Anand', 5, 1, 0),
(128, 'Banaskantha', 5, 1, 0),
(129, 'Bharuch', 5, 1, 0),
(130, 'Bhavnagar', 5, 1, 0),
(131, 'Dahod', 5, 1, 0),
(132, 'The Dangs', 5, 1, 0),
(133, 'Gandhinagar', 5, 1, 0),
(134, 'Jamnagar', 5, 1, 0),
(135, 'Junagadh', 5, 1, 0),
(136, 'Kutch', 5, 1, 0),
(137, 'Kheda', 5, 1, 0),
(138, 'Mehsana', 5, 1, 0),
(139, 'Narmada', 5, 1, 0),
(140, 'Navsari', 5, 1, 0),
(141, 'Patan', 5, 1, 0),
(142, 'Panchmahal', 5, 1, 0),
(143, 'Porbandar', 5, 1, 0),
(144, 'Rajkot', 5, 1, 0),
(145, 'Sabarkantha', 5, 1, 0),
(146, 'Surendranagar', 5, 1, 0),
(147, 'Surat', 5, 1, 0),
(148, 'Vadodara', 5, 1, 0),
(149, 'Valsad', 5, 1, 0),
(150, 'Ambala', 6, 1, 0),
(151, 'Bhiwani', 6, 1, 0),
(152, 'Faridabad', 6, 1, 0),
(153, 'Fatehabad', 6, 1, 0),
(154, 'Gurgaon', 6, 1, 0),
(155, 'Hissar', 6, 1, 0),
(156, 'Jhajjar', 6, 1, 0),
(157, 'Jind', 6, 1, 0),
(158, 'Karnal', 6, 1, 0),
(159, 'Kaithal', 6, 1, 0),
(160, 'Kurukshetra', 6, 1, 0),
(161, 'Mahendragarh', 6, 1, 0),
(162, 'Mewat', 6, 1, 0),
(163, 'Panchkula', 6, 1, 0),
(164, 'Panipat', 6, 1, 0),
(165, 'Rewari', 6, 1, 0),
(166, 'Rohtak', 6, 1, 0),
(167, 'Sirsa', 6, 1, 0),
(168, 'Sonepat', 6, 1, 0),
(169, 'Yamuna Nagar', 6, 1, 0),
(170, 'Palwal', 6, 1, 0),
(171, 'Bilaspur', 7, 1, 0),
(172, 'Chamba', 7, 1, 0),
(173, 'Hamirpur', 7, 1, 0),
(174, 'Kangra', 7, 1, 0),
(175, 'Kinnaur', 7, 1, 0),
(176, 'Kulu', 7, 1, 0),
(177, 'Lahaul and Spiti', 7, 1, 0),
(178, 'Mandi', 7, 1, 0),
(179, 'Shimla', 7, 1, 0),
(180, 'Sirmaur', 7, 1, 0),
(181, 'Solan', 7, 1, 0),
(182, 'Una', 7, 1, 0),
(183, 'Anantnag', 8, 1, 0),
(184, 'Badgam', 8, 1, 0),
(185, 'Bandipore', 8, 1, 0),
(186, 'Baramula', 8, 1, 0),
(187, 'Doda', 8, 1, 0),
(188, 'Jammu', 8, 1, 0),
(189, 'Kargil', 8, 1, 0),
(190, 'Kathua', 8, 1, 0),
(191, 'Kupwara', 8, 1, 0),
(192, 'Leh', 8, 1, 0),
(193, 'Poonch', 8, 1, 0),
(194, 'Pulwama', 8, 1, 0),
(195, 'Rajauri', 8, 1, 0),
(196, 'Srinagar', 8, 1, 0),
(197, 'Samba', 8, 1, 0),
(198, 'Udhampur', 8, 1, 0),
(199, 'Bokaro', 34, 1, 0),
(200, 'Chatra', 34, 1, 0),
(201, 'Deoghar', 34, 1, 0),
(202, 'Dhanbad', 34, 1, 0),
(203, 'Dumka', 34, 1, 0),
(204, 'Purba Singhbhum', 34, 1, 0),
(205, 'Garhwa', 34, 1, 0),
(206, 'Giridih', 34, 1, 0),
(207, 'Godda', 34, 1, 0),
(208, 'Gumla', 34, 1, 0),
(209, 'Hazaribagh', 34, 1, 0),
(210, 'Koderma', 34, 1, 0),
(211, 'Lohardaga', 34, 1, 0),
(212, 'Pakur', 34, 1, 0),
(213, 'Palamu', 34, 1, 0),
(214, 'Ranchi', 34, 1, 0),
(215, 'Sahibganj', 34, 1, 0),
(216, 'Seraikela and Kharsawan', 34, 1, 0),
(217, 'Pashchim Singhbhum', 34, 1, 0),
(218, 'Ramgarh', 34, 1, 0),
(219, 'Bidar', 9, 1, 0),
(220, 'Belgaum', 9, 1, 0),
(221, 'Bijapur', 9, 1, 0),
(222, 'Bagalkot', 9, 1, 0),
(223, 'Bellary', 9, 1, 0),
(224, 'Bangalore Rural District', 9, 1, 0),
(225, 'Bangalore Urban District', 9, 1, 0),
(226, 'Chamarajnagar', 9, 1, 0),
(227, 'Chikmagalur', 9, 1, 0),
(228, 'Chitradurga', 9, 1, 0),
(229, 'Davanagere', 9, 1, 0),
(230, 'Dharwad', 9, 1, 0),
(231, 'Dakshina Kannada', 9, 1, 0),
(232, 'Gadag', 9, 1, 0),
(233, 'Gulbarga', 9, 1, 0),
(234, 'Hassan', 9, 1, 0),
(235, 'Haveri District', 9, 1, 0),
(236, 'Kodagu', 9, 1, 0),
(237, 'Kolar', 9, 1, 0),
(238, 'Koppal', 9, 1, 0),
(239, 'Mandya', 9, 1, 0),
(240, 'Mysore', 9, 1, 0),
(241, 'Raichur', 9, 1, 0),
(242, 'Shimoga', 9, 1, 0),
(243, 'Tumkur', 9, 1, 0),
(244, 'Udupi', 9, 1, 0),
(245, 'Uttara Kannada', 9, 1, 0),
(246, 'Ramanagara', 9, 1, 0),
(247, 'Chikballapur', 9, 1, 0),
(248, 'Yadagiri', 9, 1, 0),
(249, 'Alappuzha', 10, 1, 0),
(250, 'Ernakulam', 10, 1, 0),
(251, 'Idukki', 10, 1, 0),
(252, 'Kollam', 10, 1, 0),
(253, 'Kannur', 10, 1, 0),
(254, 'Kasaragod', 10, 1, 0),
(255, 'Kottayam', 10, 1, 0),
(256, 'Kozhikode', 10, 1, 0),
(257, 'Malappuram', 10, 1, 0),
(258, 'Palakkad', 10, 1, 0),
(259, 'Pathanamthitta', 10, 1, 0),
(260, 'Thrissur', 10, 1, 0),
(261, 'Thiruvananthapuram', 10, 1, 0),
(262, 'Wayanad', 10, 1, 0),
(263, 'Alirajpur', 11, 1, 0),
(264, 'Anuppur', 11, 1, 0),
(265, 'Ashok Nagar', 11, 1, 0),
(266, 'Balaghat', 11, 1, 0),
(267, 'Barwani', 11, 1, 0),
(268, 'Betul', 11, 1, 0),
(269, 'Bhind', 11, 1, 0),
(270, 'Bhopal', 11, 1, 0),
(271, 'Burhanpur', 11, 1, 0),
(272, 'Chhatarpur', 11, 1, 0),
(273, 'Chhindwara', 11, 1, 0),
(274, 'Damoh', 11, 1, 0),
(275, 'Datia', 11, 1, 0),
(276, 'Dewas', 11, 1, 0),
(277, 'Dhar', 11, 1, 0),
(278, 'Dindori', 11, 1, 0),
(279, 'Guna', 11, 1, 0),
(280, 'Gwalior', 11, 1, 0),
(281, 'Harda', 11, 1, 0),
(282, 'Hoshangabad', 11, 1, 0),
(283, 'Indore', 11, 1, 0),
(284, 'Jabalpur', 11, 1, 0),
(285, 'Jhabua', 11, 1, 0),
(286, 'Katni', 11, 1, 0),
(287, 'Khandwa', 11, 1, 0),
(288, 'Khargone', 11, 1, 0),
(289, 'Mandla', 11, 1, 0),
(290, 'Mandsaur', 11, 1, 0),
(291, 'Morena', 11, 1, 0),
(292, 'Narsinghpur', 11, 1, 0),
(293, 'Neemuch', 11, 1, 0),
(294, 'Panna', 11, 1, 0),
(295, 'Rewa', 11, 1, 0),
(296, 'Rajgarh', 11, 1, 0),
(297, 'Ratlam', 11, 1, 0),
(298, 'Raisen', 11, 1, 0),
(299, 'Sagar', 11, 1, 0),
(300, 'Satna', 11, 1, 0),
(301, 'Sehore', 11, 1, 0),
(302, 'Seoni', 11, 1, 0),
(303, 'Shahdol', 11, 1, 0),
(304, 'Shajapur', 11, 1, 0),
(305, 'Sheopur', 11, 1, 0),
(306, 'Shivpuri', 11, 1, 0),
(307, 'Sidhi', 11, 1, 0),
(308, 'Singrauli', 11, 1, 0),
(309, 'Tikamgarh', 11, 1, 0),
(310, 'Ujjain', 11, 1, 0),
(311, 'Umaria', 11, 1, 0),
(312, 'Vidisha', 11, 1, 0),
(313, 'Ahmednagar', 12, 1, 0),
(314, 'Akola', 12, 1, 0),
(315, 'Amrawati', 12, 1, 0),
(316, 'Aurangabad', 12, 1, 0),
(317, 'Bhandara', 12, 1, 0),
(318, 'Beed', 12, 1, 0),
(319, 'Buldhana', 12, 1, 0),
(320, 'Chandrapur', 12, 1, 0),
(321, 'Dhule', 12, 1, 0),
(322, 'Gadchiroli', 12, 1, 0),
(323, 'Gondiya', 12, 1, 0),
(324, 'Hingoli', 12, 1, 0),
(325, 'Jalgaon', 12, 1, 0),
(326, 'Jalna', 12, 1, 0),
(327, 'Kolhapur', 12, 1, 0),
(328, 'Latur', 12, 1, 0),
(329, 'Mumbai City', 12, 1, 0),
(330, 'Mumbai suburban', 12, 1, 0),
(331, 'Nandurbar', 12, 1, 0),
(332, 'Nanded', 12, 1, 0),
(333, 'Nagpur', 12, 1, 0),
(334, 'Nashik', 12, 1, 0),
(335, 'Osmanabad', 12, 1, 0),
(336, 'Parbhani', 12, 1, 0),
(337, 'Pune', 12, 1, 0),
(338, 'Raigad', 12, 1, 0),
(339, 'Ratnagiri', 12, 1, 0),
(340, 'Sindhudurg', 12, 1, 0),
(341, 'Sangli', 12, 1, 0),
(342, 'Solapur', 12, 1, 0),
(343, 'Satara', 12, 1, 0),
(344, 'Thane', 12, 1, 0),
(345, 'Wardha', 12, 1, 0),
(346, 'Washim', 12, 1, 0),
(347, 'Yavatmal', 12, 1, 0),
(348, 'Bishnupur', 13, 1, 0),
(349, 'Churachandpur', 13, 1, 0),
(350, 'Chandel', 13, 1, 0),
(351, 'Imphal East', 13, 1, 0),
(352, 'Senapati', 13, 1, 0),
(353, 'Tamenglong', 13, 1, 0),
(354, 'Thoubal', 13, 1, 0),
(355, 'Ukhrul', 13, 1, 0),
(356, 'Imphal West', 13, 1, 0),
(357, 'East Garo Hills', 14, 1, 0),
(358, 'East Khasi Hills', 14, 1, 0),
(359, 'Jaintia Hills', 14, 1, 0),
(360, 'Ri-Bhoi', 14, 1, 0),
(361, 'South Garo Hills', 14, 1, 0),
(362, 'West Garo Hills', 14, 1, 0),
(363, 'West Khasi Hills', 14, 1, 0),
(364, 'Aizawl', 15, 1, 0),
(365, 'Champhai', 15, 1, 0),
(366, 'Kolasib', 15, 1, 0),
(367, 'Lawngtlai', 15, 1, 0),
(368, 'Lunglei', 15, 1, 0),
(369, 'Mamit', 15, 1, 0),
(370, 'Saiha', 15, 1, 0),
(371, 'Serchhip', 15, 1, 0),
(372, 'Dimapur', 16, 1, 0),
(373, 'Kohima', 16, 1, 0),
(374, 'Mokokchung', 16, 1, 0),
(375, 'Mon', 16, 1, 0),
(376, 'Phek', 16, 1, 0),
(377, 'Tuensang', 16, 1, 0),
(378, 'Wokha', 16, 1, 0),
(379, 'Zunheboto', 16, 1, 0),
(380, 'Angul', 17, 1, 0),
(381, 'Boudh', 17, 1, 0),
(382, 'Bhadrak', 17, 1, 0),
(383, 'Bolangir', 17, 1, 0),
(384, 'Bargarh', 17, 1, 0),
(385, 'Baleswar', 17, 1, 0),
(386, 'Cuttack', 17, 1, 0),
(387, 'Debagarh', 17, 1, 0),
(388, 'Dhenkanal', 17, 1, 0),
(389, 'Ganjam', 17, 1, 0),
(390, 'Gajapati', 17, 1, 0),
(391, 'Jharsuguda', 17, 1, 0),
(392, 'Jajapur', 17, 1, 0),
(393, 'Jagatsinghpur', 17, 1, 0),
(394, 'Khordha', 17, 1, 0),
(395, 'Kendujhar', 17, 1, 0),
(396, 'Kalahandi', 17, 1, 0),
(397, 'Kandhamal', 17, 1, 0),
(398, 'Koraput', 17, 1, 0),
(399, 'Kendrapara', 17, 1, 0),
(400, 'Malkangiri', 17, 1, 0),
(401, 'Mayurbhanj', 17, 1, 0),
(402, 'Nabarangpur', 17, 1, 0),
(403, 'Nuapada', 17, 1, 0),
(404, 'Nayagarh', 17, 1, 0),
(405, 'Puri', 17, 1, 0),
(406, 'Rayagada', 17, 1, 0),
(407, 'Sambalpur', 17, 1, 0),
(408, 'Subarnapur', 17, 1, 0),
(409, 'Sundargarh', 17, 1, 0),
(410, 'Karaikal', 27, 1, 0),
(411, 'Mahe', 27, 1, 0),
(412, 'Puducherry', 27, 1, 0),
(413, 'Yanam', 27, 1, 0),
(414, 'Amritsar', 18, 1, 0),
(415, 'Bathinda', 18, 1, 0),
(416, 'Firozpur', 18, 1, 0),
(417, 'Faridkot', 18, 1, 0),
(418, 'Fatehgarh Sahib', 18, 1, 0),
(419, 'Gurdaspur', 18, 1, 0),
(420, 'Hoshiarpur', 18, 1, 0),
(421, 'Jalandhar', 18, 1, 0),
(422, 'Kapurthala', 18, 1, 0),
(423, 'Ludhiana', 18, 1, 0),
(424, 'Mansa', 18, 1, 0),
(425, 'Moga', 18, 1, 0),
(426, 'Mukatsar', 18, 1, 0),
(427, 'Nawan Shehar', 18, 1, 0),
(428, 'Patiala', 18, 1, 0),
(429, 'Rupnagar', 18, 1, 0),
(430, 'Sangrur', 18, 1, 0),
(431, 'Ajmer', 19, 1, 0),
(432, 'Alwar', 19, 1, 0),
(433, 'Bikaner', 19, 1, 0),
(434, 'Barmer', 19, 1, 0),
(435, 'Banswara', 19, 1, 0),
(436, 'Bharatpur', 19, 1, 0),
(437, 'Baran', 19, 1, 0),
(438, 'Bundi', 19, 1, 0),
(439, 'Bhilwara', 19, 1, 0),
(440, 'Churu', 19, 1, 0),
(441, 'Chittorgarh', 19, 1, 0),
(442, 'Dausa', 19, 1, 0),
(443, 'Dholpur', 19, 1, 0),
(444, 'Dungapur', 19, 1, 0),
(445, 'Ganganagar', 19, 1, 0),
(446, 'Hanumangarh', 19, 1, 0),
(447, 'Juhnjhunun', 19, 1, 0),
(448, 'Jalore', 19, 1, 0),
(449, 'Jodhpur', 19, 1, 0),
(450, 'Jaipur', 19, 1, 0),
(451, 'Jaisalmer', 19, 1, 0),
(452, 'Jhalawar', 19, 1, 0),
(453, 'Karauli', 19, 1, 0),
(454, 'Kota', 19, 1, 0),
(455, 'Nagaur', 19, 1, 0),
(456, 'Pali', 19, 1, 0),
(457, 'Pratapgarh', 19, 1, 0),
(458, 'Rajsamand', 19, 1, 0),
(459, 'Sikar', 19, 1, 0),
(460, 'Sawai Madhopur', 19, 1, 0),
(461, 'Sirohi', 19, 1, 0),
(462, 'Tonk', 19, 1, 0),
(463, 'Udaipur', 19, 1, 0),
(464, 'East Sikkim', 20, 1, 0),
(465, 'North Sikkim', 20, 1, 0),
(466, 'South Sikkim', 20, 1, 0),
(467, 'West Sikkim', 20, 1, 0),
(468, 'Ariyalur', 21, 1, 0),
(469, 'Chennai', 21, 1, 0),
(470, 'Coimbatore', 21, 1, 0),
(471, 'Cuddalore', 21, 1, 0),
(472, 'Dharmapuri', 21, 1, 0),
(473, 'Dindigul', 21, 1, 0),
(474, 'Erode', 21, 1, 0),
(475, 'Kanchipuram', 21, 1, 0),
(476, 'Kanyakumari', 21, 1, 0),
(477, 'Karur', 21, 1, 0),
(478, 'Madurai', 21, 1, 0),
(479, 'Nagapattinam', 21, 1, 0),
(480, 'The Nilgiris', 21, 1, 0),
(481, 'Namakkal', 21, 1, 0),
(482, 'Perambalur', 21, 1, 0),
(483, 'Pudukkottai', 21, 1, 0),
(484, 'Ramanathapuram', 21, 1, 0),
(485, 'Salem', 21, 1, 0),
(486, 'Sivagangai', 21, 1, 0),
(487, 'Tiruppur', 21, 1, 0),
(488, 'Tiruchirappalli', 21, 1, 0),
(489, 'Theni', 21, 1, 0),
(490, 'Tirunelveli', 21, 1, 0),
(491, 'Thanjavur', 21, 1, 0),
(492, 'Thoothukudi', 21, 1, 0),
(493, 'Thiruvallur', 21, 1, 0),
(494, 'Thiruvarur', 21, 1, 0),
(495, 'Tiruvannamalai', 21, 1, 0),
(496, 'Vellore', 21, 1, 0),
(497, 'Villupuram', 21, 1, 0),
(498, 'Dhalai', 22, 1, 0),
(499, 'North Tripura', 22, 1, 0),
(500, 'South Tripura', 22, 1, 0),
(501, 'West Tripura', 22, 1, 0),
(502, 'Almora', 33, 1, 0),
(503, 'Bageshwar', 33, 1, 0),
(504, 'Chamoli', 33, 1, 0),
(505, 'Champawat', 33, 1, 0),
(506, 'Dehradun', 33, 1, 0),
(507, 'Haridwar', 33, 1, 0),
(508, 'Nainital', 33, 1, 0),
(509, 'Pauri Garhwal', 33, 1, 0),
(510, 'Pithoragharh', 33, 1, 0),
(511, 'Rudraprayag', 33, 1, 0),
(512, 'Tehri Garhwal', 33, 1, 0),
(513, 'Udham Singh Nagar', 33, 1, 0),
(514, 'Uttarkashi', 33, 1, 0),
(515, 'Agra', 23, 1, 0),
(516, 'Allahabad', 23, 1, 0),
(517, 'Aligarh', 23, 1, 0),
(518, 'Ambedkar Nagar', 23, 1, 0),
(519, 'Auraiya', 23, 1, 0),
(520, 'Azamgarh', 23, 1, 0),
(521, 'Barabanki', 23, 1, 0),
(522, 'Badaun', 23, 1, 0),
(523, 'Bagpat', 23, 1, 0),
(524, 'Bahraich', 23, 1, 0),
(525, 'Bijnor', 23, 1, 0),
(526, 'Ballia', 23, 1, 0),
(527, 'Banda', 23, 1, 0),
(528, 'Balrampur', 23, 1, 0),
(529, 'Bareilly', 23, 1, 0),
(530, 'Basti', 23, 1, 0),
(531, 'Bulandshahr', 23, 1, 0),
(532, 'Chandauli', 23, 1, 0),
(533, 'Chitrakoot', 23, 1, 0),
(534, 'Deoria', 23, 1, 0),
(535, 'Etah', 23, 1, 0),
(536, 'Kanshiram Nagar', 23, 1, 0),
(537, 'Etawah', 23, 1, 0),
(538, 'Firozabad', 23, 1, 0),
(539, 'Farrukhabad', 23, 1, 0),
(540, 'Fatehpur', 23, 1, 0),
(541, 'Faizabad', 23, 1, 0),
(542, 'Gautam Buddha Nagar', 23, 1, 0),
(543, 'Gonda', 23, 1, 0),
(544, 'Ghazipur', 23, 1, 0),
(545, 'Gorkakhpur', 23, 1, 0),
(546, 'Ghaziabad', 23, 1, 0),
(547, 'Hamirpur', 23, 1, 0),
(548, 'Hardoi', 23, 1, 0),
(549, 'Mahamaya Nagar', 23, 1, 0),
(550, 'Jhansi', 23, 1, 0),
(551, 'Jalaun', 23, 1, 0),
(552, 'Jyotiba Phule Nagar', 23, 1, 0),
(553, 'Jaunpur District', 23, 1, 0),
(554, 'Kanpur Dehat', 23, 1, 0),
(555, 'Kannauj', 23, 1, 0),
(556, 'Kanpur Nagar', 23, 1, 0),
(557, 'Kaushambi', 23, 1, 0),
(558, 'Kushinagar', 23, 1, 0),
(559, 'Lalitpur', 23, 1, 0),
(560, 'Lakhimpur Kheri', 23, 1, 0),
(561, 'Lucknow', 23, 1, 0),
(562, 'Mau', 23, 1, 0),
(563, 'Meerut', 23, 1, 0),
(564, 'Maharajganj', 23, 1, 0),
(565, 'Mahoba', 23, 1, 0),
(566, 'Mirzapur', 23, 1, 0),
(567, 'Moradabad', 23, 1, 0),
(568, 'Mainpuri', 23, 1, 0),
(569, 'Mathura', 23, 1, 0),
(570, 'Muzaffarnagar', 23, 1, 0),
(571, 'Pilibhit', 23, 1, 0),
(572, 'Pratapgarh', 23, 1, 0),
(573, 'Rampur', 23, 1, 0),
(574, 'Rae Bareli', 23, 1, 0),
(575, 'Saharanpur', 23, 1, 0),
(576, 'Sitapur', 23, 1, 0),
(577, 'Shahjahanpur', 23, 1, 0),
(578, 'Sant Kabir Nagar', 23, 1, 0),
(579, 'Siddharthnagar', 23, 1, 0),
(580, 'Sonbhadra', 23, 1, 0),
(581, 'Sant Ravidas Nagar', 23, 1, 0),
(582, 'Sultanpur', 23, 1, 0),
(583, 'Shravasti', 23, 1, 0),
(584, 'Unnao', 23, 1, 0),
(585, 'Varanasi', 23, 1, 0),
(586, 'Birbhum', 24, 1, 0),
(587, 'Bankura', 24, 1, 0),
(588, 'Bardhaman', 24, 1, 0),
(589, 'Darjeeling', 24, 1, 0),
(590, 'Dakshin Dinajpur', 24, 1, 0),
(591, 'Hooghly', 24, 1, 0),
(592, 'Howrah', 24, 1, 0),
(593, 'Jalpaiguri', 24, 1, 0),
(594, 'Cooch Behar', 24, 1, 0),
(595, 'Kolkata', 24, 1, 0),
(596, 'Malda', 24, 1, 0),
(597, 'Midnapore', 24, 1, 0),
(598, 'Murshidabad', 24, 1, 0),
(599, 'Nadia', 24, 1, 0),
(600, 'North 24 Parganas', 24, 1, 0),
(601, 'South 24 Parganas', 24, 1, 0),
(602, 'Purulia', 24, 1, 0),
(603, 'Uttar Dinajpur', 24, 1, 0);

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
  `add_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `is_deleted` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `product_id` (`product_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `product_id`, `user_name`, `user_email`, `comment`, `add_date`, `is_deleted`) VALUES
(1, 2, 'patel', 'patel@mail.com', 'nice product', '2020-05-07 19:12:24', 0),
(2, 3, 'patel2', 'patel7@mail.com', 'product', '2020-05-07 19:12:24', 0),
(3, 1, 'patel', 'patel7@mail.com', 'product', '2020-05-07 19:12:24', 0),
(4, 3, 'patel', 'patel44@mail.com', 'product', '2020-05-07 19:12:24', 0);

-- --------------------------------------------------------

--
-- Table structure for table `contact_us`
--

DROP TABLE IF EXISTS `contact_us`;
CREATE TABLE IF NOT EXISTS `contact_us` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `title` varchar(200) DEFAULT NULL,
  `comments` varchar(250) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contact_us`
--

INSERT INTO `contact_us` (`id`, `name`, `email`, `title`, `comments`) VALUES
(1, 'vixuti', 'vrp@narola.email', 'gud job', 'gud website'),
(4, 'maya', 'maya@gmail', 'regarding selling account', 'please activate my  sellings account '),
(5, 'maya', 'maya@gmail', 'regarding selling account', 'please activate my  sellings account '),
(6, 'mitali patel', 'vrp@narola.email', 's', 'mm'),
(7, 'mitali patel', 'vrp@narola.email', 'b', 'b'),
(8, 'mitali patel', 'vrp@narola.email', 's', 'b'),
(9, 'vixuti', 'vrp@narola.email', 's', 'c'),
(10, 'hnn', 'hjtyjh@g', 'n', 'n');

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

DROP TABLE IF EXISTS `countries`;
CREATE TABLE IF NOT EXISTS `countries` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `countryCode` char(2) NOT NULL DEFAULT '',
  `name` varchar(45) NOT NULL DEFAULT '',
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `is_deleted` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=251 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `countryCode`, `name`, `is_active`, `is_deleted`) VALUES
(1, 'AD', 'Andorra', 1, 0),
(2, 'AE', 'United Arab Emirates', 1, 0),
(3, 'AF', 'Afghanistan', 1, 0),
(4, 'AG', 'Antigua and Barbuda', 1, 0),
(5, 'AI', 'Anguilla', 1, 0),
(6, 'AL', 'Albania', 1, 0),
(7, 'AM', 'Armenia', 1, 0),
(8, 'AO', 'Angola', 1, 0),
(9, 'AQ', 'Antarctica', 1, 0),
(10, 'AR', 'Argentina', 1, 0),
(11, 'AS', 'American Samoa', 1, 0),
(12, 'AT', 'Austria', 1, 0),
(13, 'AU', 'Australia', 1, 0),
(14, 'AW', 'Aruba', 1, 0),
(15, 'AX', 'Ã…land', 1, 0),
(16, 'AZ', 'Azerbaijan', 1, 0),
(17, 'BA', 'Bosnia and Herzegovina', 1, 0),
(18, 'BB', 'Barbados', 1, 0),
(19, 'BD', 'Bangladesh', 1, 0),
(20, 'BE', 'Belgium', 1, 0),
(21, 'BF', 'Burkina Faso', 1, 0),
(22, 'BG', 'Bulgaria', 1, 0),
(23, 'BH', 'Bahrain', 1, 0),
(24, 'BI', 'Burundi', 1, 0),
(25, 'BJ', 'Benin', 1, 0),
(26, 'BL', 'Saint BarthÃ©lemy', 1, 0),
(27, 'BM', 'Bermuda', 1, 0),
(28, 'BN', 'Brunei', 1, 0),
(29, 'BO', 'Bolivia', 1, 0),
(30, 'BQ', 'Bonaire', 1, 0),
(31, 'BR', 'Brazil', 1, 0),
(32, 'BS', 'Bahamas', 1, 0),
(33, 'BT', 'Bhutan', 1, 0),
(34, 'BV', 'Bouvet Island', 1, 0),
(35, 'BW', 'Botswana', 1, 0),
(36, 'BY', 'Belarus', 1, 0),
(37, 'BZ', 'Belize', 1, 0),
(38, 'CA', 'Canada', 1, 0),
(39, 'CC', 'Cocos [Keeling] Islands', 1, 0),
(40, 'CD', 'Democratic Republic of the Congo', 1, 0),
(41, 'CF', 'Central African Republic', 1, 0),
(42, 'CG', 'Republic of the Congo', 1, 0),
(43, 'CH', 'Switzerland', 1, 0),
(44, 'CI', 'Ivory Coast', 1, 0),
(45, 'CK', 'Cook Islands', 1, 0),
(46, 'CL', 'Chile', 1, 0),
(47, 'CM', 'Cameroon', 1, 0),
(48, 'CN', 'China', 1, 0),
(49, 'CO', 'Colombia', 1, 0),
(50, 'CR', 'Costa Rica', 1, 0),
(51, 'CU', 'Cuba', 1, 0),
(52, 'CV', 'Cape Verde', 1, 0),
(53, 'CW', 'Curacao', 1, 0),
(54, 'CX', 'Christmas Island', 1, 0),
(55, 'CY', 'Cyprus', 1, 0),
(56, 'CZ', 'Czech Republic', 1, 0),
(57, 'DE', 'Germany', 1, 0),
(58, 'DJ', 'Djibouti', 1, 0),
(59, 'DK', 'Denmark', 1, 0),
(60, 'DM', 'Dominica', 1, 0),
(61, 'DO', 'Dominican Republic', 1, 0),
(62, 'DZ', 'Algeria', 1, 0),
(63, 'EC', 'Ecuador', 1, 0),
(64, 'EE', 'Estonia', 1, 0),
(65, 'EG', 'Egypt', 1, 0),
(66, 'EH', 'Western Sahara', 1, 0),
(67, 'ER', 'Eritrea', 1, 0),
(68, 'ES', 'Spain', 1, 0),
(69, 'ET', 'Ethiopia', 1, 0),
(70, 'FI', 'Finland', 1, 0),
(71, 'FJ', 'Fiji', 1, 0),
(72, 'FK', 'Falkland Islands', 1, 0),
(73, 'FM', 'Micronesia', 1, 0),
(74, 'FO', 'Faroe Islands', 1, 0),
(75, 'FR', 'France', 1, 0),
(76, 'GA', 'Gabon', 1, 0),
(77, 'GB', 'United Kingdom', 1, 0),
(78, 'GD', 'Grenada', 1, 0),
(79, 'GE', 'Georgia', 1, 0),
(80, 'GF', 'French Guiana', 1, 0),
(81, 'GG', 'Guernsey', 1, 0),
(82, 'GH', 'Ghana', 1, 0),
(83, 'GI', 'Gibraltar', 1, 0),
(84, 'GL', 'Greenland', 1, 0),
(85, 'GM', 'Gambia', 1, 0),
(86, 'GN', 'Guinea', 1, 0),
(87, 'GP', 'Guadeloupe', 1, 0),
(88, 'GQ', 'Equatorial Guinea', 1, 0),
(89, 'GR', 'Greece', 1, 0),
(90, 'GS', 'South Georgia and the South Sandwich Islands', 1, 0),
(91, 'GT', 'Guatemala', 1, 0),
(92, 'GU', 'Guam', 1, 0),
(93, 'GW', 'Guinea-Bissau', 1, 0),
(94, 'GY', 'Guyana', 1, 0),
(95, 'HK', 'Hong Kong', 1, 0),
(96, 'HM', 'Heard Island and McDonald Islands', 1, 0),
(97, 'HN', 'Honduras', 1, 0),
(98, 'HR', 'Croatia', 1, 0),
(99, 'HT', 'Haiti', 1, 0),
(100, 'HU', 'Hungary', 1, 0),
(101, 'ID', 'Indonesia', 1, 0),
(102, 'IE', 'Ireland', 1, 0),
(103, 'IL', 'Israel', 1, 0),
(104, 'IM', 'Isle of Man', 1, 0),
(105, 'IN', 'India', 1, 0),
(106, 'IO', 'British Indian Ocean Territory', 1, 0),
(107, 'IQ', 'Iraq', 1, 0),
(108, 'IR', 'Iran', 1, 0),
(109, 'IS', 'Iceland', 1, 0),
(110, 'IT', 'Italy', 1, 0),
(111, 'JE', 'Jersey', 1, 0),
(112, 'JM', 'Jamaica', 1, 0),
(113, 'JO', 'Jordan', 1, 0),
(114, 'JP', 'Japan', 1, 0),
(115, 'KE', 'Kenya', 1, 0),
(116, 'KG', 'Kyrgyzstan', 1, 0),
(117, 'KH', 'Cambodia', 1, 0),
(118, 'KI', 'Kiribati', 1, 0),
(119, 'KM', 'Comoros', 1, 0),
(120, 'KN', 'Saint Kitts and Nevis', 1, 0),
(121, 'KP', 'North Korea', 1, 0),
(122, 'KR', 'South Korea', 1, 0),
(123, 'KW', 'Kuwait', 1, 0),
(124, 'KY', 'Cayman Islands', 1, 0),
(125, 'KZ', 'Kazakhstan', 1, 0),
(126, 'LA', 'Laos', 1, 0),
(127, 'LB', 'Lebanon', 1, 0),
(128, 'LC', 'Saint Lucia', 1, 0),
(129, 'LI', 'Liechtenstein', 1, 0),
(130, 'LK', 'Sri Lanka', 1, 0),
(131, 'LR', 'Liberia', 1, 0),
(132, 'LS', 'Lesotho', 1, 0),
(133, 'LT', 'Lithuania', 1, 0),
(134, 'LU', 'Luxembourg', 1, 0),
(135, 'LV', 'Latvia', 1, 0),
(136, 'LY', 'Libya', 1, 0),
(137, 'MA', 'Morocco', 1, 0),
(138, 'MC', 'Monaco', 1, 0),
(139, 'MD', 'Moldova', 1, 0),
(140, 'ME', 'Montenegro', 1, 0),
(141, 'MF', 'Saint Martin', 1, 0),
(142, 'MG', 'Madagascar', 1, 0),
(143, 'MH', 'Marshall Islands', 1, 0),
(144, 'MK', 'Macedonia', 1, 0),
(145, 'ML', 'Mali', 1, 0),
(146, 'MM', 'Myanmar [Burma]', 1, 0),
(147, 'MN', 'Mongolia', 1, 0),
(148, 'MO', 'Macao', 1, 0),
(149, 'MP', 'Northern Mariana Islands', 1, 0),
(150, 'MQ', 'Martinique', 1, 0),
(151, 'MR', 'Mauritania', 1, 0),
(152, 'MS', 'Montserrat', 1, 0),
(153, 'MT', 'Malta', 1, 0),
(154, 'MU', 'Mauritius', 1, 0),
(155, 'MV', 'Maldives', 1, 0),
(156, 'MW', 'Malawi', 1, 0),
(157, 'MX', 'Mexico', 1, 0),
(158, 'MY', 'Malaysia', 1, 0),
(159, 'MZ', 'Mozambique', 1, 0),
(160, 'NA', 'Namibia', 1, 0),
(161, 'NC', 'New Caledonia', 1, 0),
(162, 'NE', 'Niger', 1, 0),
(163, 'NF', 'Norfolk Island', 1, 0),
(164, 'NG', 'Nigeria', 1, 0),
(165, 'NI', 'Nicaragua', 1, 0),
(166, 'NL', 'Netherlands', 1, 0),
(167, 'NO', 'Norway', 1, 0),
(168, 'NP', 'Nepal', 1, 0),
(169, 'NR', 'Nauru', 1, 0),
(170, 'NU', 'Niue', 1, 0),
(171, 'NZ', 'New Zealand', 1, 0),
(172, 'OM', 'Oman', 1, 0),
(173, 'PA', 'Panama', 1, 0),
(174, 'PE', 'Peru', 1, 0),
(175, 'PF', 'French Polynesia', 1, 0),
(176, 'PG', 'Papua New Guinea', 1, 0),
(177, 'PH', 'Philippines', 1, 0),
(178, 'PK', 'Pakistan', 1, 0),
(179, 'PL', 'Poland', 1, 0),
(180, 'PM', 'Saint Pierre and Miquelon', 1, 0),
(181, 'PN', 'Pitcairn Islands', 1, 0),
(182, 'PR', 'Puerto Rico', 1, 0),
(183, 'PS', 'Palestine', 1, 0),
(184, 'PT', 'Portugal', 1, 0),
(185, 'PW', 'Palau', 1, 0),
(186, 'PY', 'Paraguay', 1, 0),
(187, 'QA', 'Qatar', 1, 0),
(188, 'RE', 'RÃ©union', 1, 0),
(189, 'RO', 'Romania', 1, 0),
(190, 'RS', 'Serbia', 1, 0),
(191, 'RU', 'Russia', 1, 0),
(192, 'RW', 'Rwanda', 1, 0),
(193, 'SA', 'Saudi Arabia', 1, 0),
(194, 'SB', 'Solomon Islands', 1, 0),
(195, 'SC', 'Seychelles', 1, 0),
(196, 'SD', 'Sudan', 1, 0),
(197, 'SE', 'Sweden', 1, 0),
(198, 'SG', 'Singapore', 1, 0),
(199, 'SH', 'Saint Helena', 1, 0),
(200, 'SI', 'Slovenia', 1, 0),
(201, 'SJ', 'Svalbard and Jan Mayen', 1, 0),
(202, 'SK', 'Slovakia', 1, 0),
(203, 'SL', 'Sierra Leone', 1, 0),
(204, 'SM', 'San Marino', 1, 0),
(205, 'SN', 'Senegal', 1, 0),
(206, 'SO', 'Somalia', 1, 0),
(207, 'SR', 'Suriname', 1, 0),
(208, 'SS', 'South Sudan', 1, 0),
(209, 'ST', 'SÃ£o TomÃ© and PrÃ­ncipe', 1, 0),
(210, 'SV', 'El Salvador', 1, 0),
(211, 'SX', 'Sint Maarten', 1, 0),
(212, 'SY', 'Syria', 1, 0),
(213, 'SZ', 'Swaziland', 1, 0),
(214, 'TC', 'Turks and Caicos Islands', 1, 0),
(215, 'TD', 'Chad', 1, 0),
(216, 'TF', 'French Southern Territories', 1, 0),
(217, 'TG', 'Togo', 1, 0),
(218, 'TH', 'Thailand', 1, 0),
(219, 'TJ', 'Tajikistan', 1, 0),
(220, 'TK', 'Tokelau', 1, 0),
(221, 'TL', 'East Timor', 1, 0),
(222, 'TM', 'Turkmenistan', 1, 0),
(223, 'TN', 'Tunisia', 1, 0),
(224, 'TO', 'Tonga', 1, 0),
(225, 'TR', 'Turkey', 1, 0),
(226, 'TT', 'Trinidad and Tobago', 1, 0),
(227, 'TV', 'Tuvalu', 1, 0),
(228, 'TW', 'Taiwan', 1, 0),
(229, 'TZ', 'Tanzania', 1, 0),
(230, 'UA', 'Ukraine', 1, 0),
(231, 'UG', 'Uganda', 1, 0),
(232, 'UM', 'U.S. Minor Outlying Islands', 1, 0),
(233, 'US', 'United States', 1, 0),
(234, 'UY', 'Uruguay', 1, 0),
(235, 'UZ', 'Uzbekistan', 1, 0),
(236, 'VA', 'Vatican City', 1, 0),
(237, 'VC', 'Saint Vincent and the Grenadines', 1, 0),
(238, 'VE', 'Venezuela', 1, 0),
(239, 'VG', 'British Virgin Islands', 1, 0),
(240, 'VI', 'U.S. Virgin Islands', 1, 0),
(241, 'VN', 'Vietnam', 1, 0),
(242, 'VU', 'Vanuatu', 1, 0),
(243, 'WF', 'Wallis and Futuna', 1, 0),
(244, 'WS', 'Samoa', 1, 0),
(245, 'XK', 'Kosovo', 1, 0),
(246, 'YE', 'Yemen', 1, 0),
(247, 'YT', 'Mayotte', 1, 0),
(248, 'ZA', 'South Africa', 1, 0),
(249, 'ZM', 'Zambia', 1, 0),
(250, 'ZW', 'Zimbabwe', 1, 0);

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
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `is_deleted` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `code` (`code`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `coupons`
--

INSERT INTO `coupons` (`id`, `code`, `type`, `amount`, `quantity`, `used`, `start_date`, `end_date`, `is_active`, `is_deleted`) VALUES
(1, 'shop30', 1, 30, 0, 0, '2020-05-22 00:00:00', '2020-05-30 00:00:00', 1, 0);

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
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `email_templates`
--

INSERT INTO `email_templates` (`id`, `slug`, `name`, `subject`, `message`, `placeholders`) VALUES
(2, 'new-user-signup', 'New User Sign Up', 'Welcome {company_name}', '<p></p><p></p><p></p><h1><b>Dear {firstname} {lastname}</b></h1><br>Thank you for registering on {company_name}.<br><br>We just wanted to say welcome.<br><br>Please contact us if you need any help.<br><br>Click the link below to verify your email<p></p><p><a href=\"{email_verification_url}\" target=\"_blank\">Verify Your Email</a><br><br>Kind Regards, <br>{email_signature}<br><br>(This is an automated email, so please don\\\'t reply to this email address)<br></p><p></p><p></p><p></p>', 'a:5:{s:11:\"{firstname}\";s:14:\"User Firstname\";s:10:\"{lastname}\";s:13:\"User Lastname\";s:24:\"{email_verification_url}\";s:22:\"Email Verification URL\";s:17:\"{email_signature}\";s:15:\"Email Signature\";s:14:\"{company_name}\";s:12:\"Company Name\";}'),
(1, 'forgot-password', 'Forgot Password', 'Reset Password Instructions', '<h2></h2><h3 style=\"text-align: justify; \"><span style=\"font-size: 14pt;\">Hello {firstname} {lastname},</span></h3><p style=\"text-align: justify; \"><span style=\"font-size: 13px; letter-spacing: normal;\">Someone, hopefully, you, has requested to reset the password for your&nbsp;</span>{company_name} account with email <b>{email}</b>.</p><span style=\"font-size: 13px; letter-spacing: normal; color: inherit; font-family: inherit;\"><p style=\"text-align: justify;\"><span style=\"color: inherit; font-family: inherit;\">If you did not perform this request, you can safely ignore this email&nbsp;</span>and your password will remain the same.&nbsp;<span style=\"color: inherit; font-family: inherit;\">Otherwise, click the link below to complete the process.</span></p><p style=\"text-align: justify;\"><a href=\"{reset_password_link}\" target=\"_blank\" style=\"font-family: inherit; background-color: rgb(255, 255, 255);\">Reset Password</a></p><p style=\"text-align: justify;\">Please note that this link is valid for next 1 hour only. You won\'t be able to change the password after the link gets expired.</p></span><p></p><p style=\"text-align: justify; \"><span style=\"font-size: 13px; letter-spacing: normal; color: inherit; font-family: inherit;\">Regards,</span></p><p style=\"text-align: justify; \"><span style=\"color: inherit; font-family: inherit; font-size: 13px; letter-spacing: normal;\">{company_name}</span></p>', 'a:6:{s:11:\"{firstname}\";s:14:\"User Firstname\";s:10:\"{lastname}\";s:13:\"User Lastname\";s:7:\"{email}\";s:10:\"User Email\";s:20:\"{reset_password_url}\";s:18:\"Reset Password URL\";s:17:\"{email_signature}\";s:15:\"Email Signature\";s:14:\"{company_name}\";s:12:\"Company Name\";}'),
(4, 'loader', 'loader', '', '', 'a:5:{s:5:\"{img}\";s:4:\"logo\";s:17:\"{www/google.com/}\";s:23:\"email_verification_url	\";s:17:\"{email_signature}\";s:15:\"Email Signature\";s:14:\"{company_name}\";s:12:\"Company Name\";s:6:\"{logo}\";s:3:\"img\";}'),
(3, 'logo', 'logo', 'trial', '<p>{www/google.com/}</p><p>ijvjfvfv<br></p>', 'a:5:{s:5:\"{img}\";s:4:\"logo\";s:17:\"{www/google.com/}\";s:23:\"email_verification_url	\";s:17:\"{email_signature}\";s:15:\"Email Signature\";s:14:\"{company_name}\";s:12:\"Company Name\";s:6:\"{logo}\";s:3:\"img\";}'),
(5, 'order-placed', 'Your Order Placed Successfully', 'Your Order Placed Successfully', '<p><span style=\"color: rgb(34, 34, 34); font-family: \"Open Sans\", sans-serif; font-size: 14px;\">Hello {customer_name},</span><br style=\"color: rgb(34, 34, 34); font-family: \"Open Sans\", sans-serif; font-size: 14px;\"><span style=\"color: rgb(34, 34, 34); font-family: \"Open Sans\", sans-serif; font-size: 14px;\">Your Order Number is </span>{order_amount}<br style=\"color: rgb(34, 34, 34); font-family: \"Open Sans\", sans-serif; font-size: 14px;\"><span style=\"color: rgb(34, 34, 34); font-family: \"Open Sans\", sans-serif; font-size: 14px;\">Your order has been placed successfully</span><br></p>', 'a:4:{s:15:\"{customer_name}\";s:13:\"Customer Name\";s:14:\"{order_amount}\";s:12:\"Order Amount\";s:12:\"{admin_name}\";s:10:\"Admin Name\";s:13:\"{admin_email}\";s:11:\"Admin Email\";}'),
(6, 'thanks-for-product-review', 'Thanks For Product Review', 'Thank you for reviewing {product_name}... on {company_name}', '<table cellpadding=\"0\" cellspacing=\"0\" border=\"0\"  style=\"border-spacing:0;margin-right:50px; margin-left: 0px; auto;width:640px\"><tr><td>\r\n<hr border=\"4\" style=\"margin-right:420px;margin-left:420px;backgroung-color:33ADFF\"><table cellpadding=\"0\" cellspacing=\"0\" border=\"0\"  style=\"border-spacing:0;margin-right:150px; margin-left: 700px; auto;width:640px\"><tr><td style=\"margin-left: 400px;text-align: center;font-size: 35px;\"><b>{company_name}</b></td></tr></table><hr border=\"40\" style=\"margin-right:420px;margin-left:420px;backgroung-color:33ADFF\"><table cellpadding=\"0\" cellspacing=\"0\" border=\"0\" align=\"center\" style=\"border-spacing:0;margin:0 auto;width:640px\"><tbody><tr><td align=\"left\"><span style=\"color:#000000;font-size:24px;line-height:26px\">Thanks {firstname},</span><br><br><span>Your latest customer review is live on {company_name}. We and millions of shoppers on {company_name} appreciate the time you took to share your experience with this item.</span></td></tr></tbody></table><br><br><br><table width=\"640\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\" bgcolor=\"#FFFFFF\" align=\"center\"><tbody><tr><td valign=\"top\" align=\"left\" width=\"110\"><a href=\"{products_detail_url}\"><img width=\"90\" src=\"{image_url}\" ></a></td><td valign=\"top\" align=\"left\" style=\"font-size:16px;line-height:18px;border:1px black\"><span><img style=\"display:inline\" src=\"\" class=\"CToWUd\"><br> <span style=\"font-size:14px;line-height:18px;color:#888888\">   from <a href=\"\">{firstname} {lastname}</a>   on {review_date}</span></span><br><span style=\"font-size:14px;line-height:18px;color:#363636;\"><strong>Star rating :</strong><span > {star_rating} <img src=\"http://localhost/gcart/assets/themes/default/images/str.jpg\" height=\"15px\" width=\"15px\"> <span style=\"font-size:14px;line-height:18px;color:#363636\"><strong><br>{review_msg}</strong></span><br> <span style=\"font-size:4px;line-height:4px;color:#ffffff\"></span></td></tr></tbody></table ><hr border=\"40\" style=\"margin-right:420px;margin-left:420px;backgroung-color:33ADFF\"><table width=\"640\" border=\"0\" cellspacing=\"0\" cellpadding=\"0\" bgcolor=\"#FFFFFF\" align=\"center\"><tr><td>Kind Regards, <br>{email_signature}<br><br>(This is an automated email, so please don\\\'t reply to this email address)<br></td></tr></table></td></tr></table>', 'a:20:{i:0;s:11:\"{fristname}\";i:1;s:14:\"User Firstname\";i:2;s:10:\"{lastname}\";i:3;s:13:\"User Lastname\";i:4;s:14:\"{company_name}\";i:5;s:12:\"Company Name\";i:6;s:17:\"{email_signature}\";i:7;s:15:\"Email Signature\";i:8;s:21:\"{products_detail_url}\";i:9;s:20:\"Products detail page\";i:10;s:11:\"{image_url}\";i:11;s:17:\"Product image url\";i:12;s:13:\"{review_date}\";i:13;s:20:\"Products review date\";i:14;s:13:\"{star_rating}\";i:15;s:11:\"Star rating\";i:16;s:12:\"{review_msg}\";i:17;s:19:\"Products review msg\";i:18;s:14:\"{product_name}\";i:19;s:13:\"Products Name\";}'),
(7, 'confirm-order', 'Confirm Order', 'Your {company_name} order', '<hr border=\"4\" style=\"margin-right:420px;margin-left:420px;backgroung-color:33ADFF\">\r\n<table >\r\n<tr>\r\n<td style=\"text-align: center;font-size: 22px;\"><b>{company_name}</b></td>\r\n</tr>\r\n</table>\r\n<hr border=\"40\" style=\"margin-right:420px;margin-left:420px;backgroung-color:33ADFF\">\r\n<table >\r\n<tbody>\r\n<tr>\r\n<td align=\"left\"><span style=\"color:#000000;font-size:24px;line-height:26px\"><b>Hello {firstname} ,</b></span><br><br><span>Thank you for your order. We’ll send a confirmation when your order ships. Your estimated delivery date is indicated below. If you would like to view the status of your order or make any changes to it, please visit Your Orders on {company_name}</span>\r\n</td>\r\n</tr>\r\n</tbody>\r\n</table><br>\r\n<hr border=\"40\" style=\"margin-right:420px;margin-left:420px;backgroung-color:33ADFF\">\r\n<table cellpadding=\"0\" cellspacing=\"0\" >\r\n<tbody>\r\n<tr width=\"100%\">\r\n<td align=\"left\" width=\"50%\">\r\n<span><b>Arriving :</b></span><br>\r\n<span>{frist_date}-</span><br>\r\n<span>{second_date}</span><br>\r\n<br>\r\n</td>\r\n<td align=\"left\" width=\"50%\">\r\n<span><b>Your order will be sent to:</b></span><br>\r\n<span> {firstname} </span><br>\r\n<span>{house_no} {societyname}</span><br>\r\n<span>{city} , {state} {pincode}</span><br>\r\n</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n<br>\r\n<table cellpadding=\"0\" cellspacing=\"0\" border=\"0\" >\r\n<tbody>\r\n<tr>\r\n<td style=\"font-size:25px;\"><b><U>Order Details</U></b><br></td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n<br>\r\n<table cellpadding=\"0\" cellspacing=\"0\" border=\"0\" >\r\n<tbody>\r\n<tr>\r\n<td style=\"font-size:15px;\">Order #{order_number}</td>\r\n</tr>\r\n<tr>\r\n<td style=\"font-size:15px;\">Placed on {order_date}</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n<br>\r\n{products_data}\r\n\r\n<br>\r\n<br>\r\n<table cellpadding=\"0\" cellspacing=\"0\" border=\"0\" >\r\n<tbody>\r\n<tr style=\"margin-top:20px;\" width=\"100%\">\r\n<td valign=\"top\" align=\"left\" width=\"40%\"></td>\r\n\r\n\r\n<td valign=\"top\" width=\"40%\" align=\"right\">\r\n	<span>Item Subtotal:</span><br>\r\n	<span>Shipping & Handling:</span><br>\r\n	<span>Promotion Applied:</span><br><br>\r\n	<span><b>Order Total:</b></span>\r\n\r\n</td>\r\n\r\n<td valign=\"top\" width=\"20%\" align=\"right\">\r\n	<span>{sub_total}</span><br>\r\n	<span>{shipping_amount}</span><br>\r\n	<span>{coupon_amount}</span><br><br>\r\n	<span><b>{grand_total}</b></span>\r\n	<span><?php echo \'komal\' ?></span>\r\n</td>\r\n</tr>\r\n</tbody>\r\n</table >\r\n<hr border=\"40\" style=\"margin-right:420px;margin-left:420px;backgroung-color:33ADFF\">\r\n<table cellpadding=\"0\" cellspacing=\"0\" border=\"0\" >\r\n<tr>\r\n<td>Kind Regards, <br>{email_signature}<br><br>(This is an automated email, so please don\\\'t reply to this email address)<br>\r\n</td>\r\n</tr>\r\n</table>\r\n', 'a:34:{i:0;s:14:\"{company_name}\";i:1;s:12:\"company Name\";i:2;s:11:\"{firstname}\";i:3;s:14:\"User fristname\";i:4;s:12:\"{frist_date}\";i:5;s:24:\"Order delivery firstdate\";i:6;s:13:\"{second_date}\";i:7;s:25:\"Order delivery secontdate\";i:8;s:10:\"{house_no}\";i:9;s:17:\"User house number\";i:10;s:13:\"{societyname}\";i:11;s:17:\"User society name\";i:12;s:6:\"{city}\";i:13;s:9:\"User city\";i:14;s:7:\"{state}\";i:15;s:10:\"User state\";i:16;s:9:\"{pincode}\";i:17;s:12:\"User pincode\";i:18;s:14:\"{order_number}\";i:19;s:12:\"Order number\";i:20;s:12:\"{order_date}\";i:21;s:10:\"Order date\";i:22;s:15:\"{products_data}\";i:23;s:15:\"Products detail\";i:24;s:11:\"{sub_total}\";i:25;s:9:\"Sub total\";i:26;s:17:\"{shipping_amount}\";i:27;s:15:\"Shipping amount\";i:28;s:15:\"{coupon_amount}\";i:29;s:13:\"Coupon amount\";i:30;s:13:\"{grand_total}\";i:31;s:11:\"Grand total\";i:32;s:17:\"{email_signature}\";i:33;s:15:\"Email Signature\";}'),
(8, 'renew-subscription-plan', 'Renew Subscription Plan', 'Renew Subscription Plan', '<p margin-bottom:\"=\"\" 20px;=\"\" color:=\"\" rgb(78,=\"\" 91,=\"\" 115);=\"\" font-family:=\"\" \\\"=\"\" source=\"\\\" \\\"\"=\"\" sans=\"\\\" pro\\\",=\"\\\" sans-serif;=\"\\\" font-size:=\"\\\" 16px;\\\"=\"\\\">Hello&nbsp;{firstname}&nbsp;{lastname} ,</p><p margin-bottom:\"=\"\" 20px;=\"\" color:=\"\" rgb(78,=\"\" 91,=\"\" 115);=\"\" font-family:=\"\" \\\"=\"\" source=\"\\\" \\\"\"=\"\" sans=\"\\\" pro\\\",=\"\\\" sans-serif;=\"\\\" font-size:=\"\\\" 16px;\\\"=\"\\\">This is a reminder that your membership with&nbsp;{company_name} expired on&nbsp;{expired_date} and you are now within your membership grace period.To know about subscription plans you can contact us.</p><p margin-bottom:\"=\"\" 20px;=\"\" color:=\"\" rgb(78,=\"\" 91,=\"\" 115);=\"\" font-family:=\"\" \\\"=\"\" source=\"\\\" \\\"\"=\"\" sans=\"\\\" pro\\\",=\"\\\" sans-serif;=\"\\\" font-size:=\"\\\" 16px;\\\"=\"\\\">We hope that you will take the time to renew your membership and remain part of our community.</p><p margin-bottom:\"=\"\" 20px;=\"\" color:=\"\" rgb(78,=\"\" 91,=\"\" 115);=\"\" font-family:=\"\" \\\"=\"\" source=\"\\\" \\\"\"=\"\" sans=\"\\\" pro\\\",=\"\\\" sans-serif;=\"\\\" font-size:=\"\\\" 16px;\\\"=\"\\\"><a href=\"{url}\" style=\"background-color: rgb(255, 255, 255);\">Click Here For Re-new Plan</a></p><p margin-bottom:\"=\"\" 20px;=\"\" color:=\"\" rgb(78,=\"\" 91,=\"\" 115);=\"\" font-family:=\"\" \\\"=\"\" source=\"\\\" \\\"\"=\"\" sans=\"\\\" pro\\\",=\"\\\" sans-serif;=\"\\\" font-size:=\"\\\" 16px;\\\"=\"\\\"></p><p margin-bottom:\"=\"\" 20px;=\"\" color:=\"\" rgb(78,=\"\" 91,=\"\" 115);=\"\" font-family:=\"\" \\\"=\"\" source=\"\\\" \\\"\"=\"\" sans=\"\\\" pro\\\",=\"\\\" sans-serif;=\"\\\" font-size:=\"\\\" 16px;\\\"=\"\\\">Kind regards,</p><p margin-bottom:\"=\"\" 20px;=\"\" color:=\"\" rgb(78,=\"\" 91,=\"\" 115);=\"\" font-family:=\"\" \\\"=\"\" source=\"\\\" \\\"\"=\"\" sans=\"\\\" pro\\\",=\"\\\" sans-serif;=\"\\\" font-size:=\"\\\" 16px;\\\"=\"\\\">{email_signature}<br></p><div><br></div>', 'a:6:{s:11:\"{firstname}\";s:14:\"User Firstname\";s:10:\"{lastname}\";s:13:\"User Lastname\";s:5:\"{url}\";s:20:\"Update Subscriptions\";s:17:\"{email_signature}\";s:15:\"Email Signature\";s:14:\"{company_name}\";s:12:\"Company Name\";s:14:\"{expired_date}\";s:12:\"Expired Date\";}');

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
(1, 'Six started far placing saw respect', 'Nam enim risus, molestie et, porta ac, aliquam ac, risus. Quisque lobortis. Phasellus pellentesque purus in massa. Aenean in pede. Phasellus ac libero ac tellus pellentesque semper. Sed ac felis. Sed commodo, magna quis lacinia ornare, quam ante aliq...<br><br>', 0),
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
  `is_deleted` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `product_id` (`product_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hot_deals`
--

INSERT INTO `hot_deals` (`id`, `product_id`, `type`, `value`, `start_date`, `end_date`, `is_deleted`) VALUES
(1, 1, 0, 500, '2020-05-22 00:00:00', '2020-05-31 00:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `news_letters`
--

DROP TABLE IF EXISTS `news_letters`;
CREATE TABLE IF NOT EXISTS `news_letters` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(50) NOT NULL,
  `created_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `is_deleted` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `news_letters`
--

INSERT INTO `news_letters` (`id`, `email`, `created_date`, `is_deleted`) VALUES
(1, 'vat69@mail.com', '2020-05-22 11:30:28', 0);

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
  `grand_total` decimal(9,2) NOT NULL,
  `order_date` date NOT NULL,
  `order_status` tinyint(1) NOT NULL,
  `invoice_date` date DEFAULT NULL,
  `payment_method` varchar(20) NOT NULL DEFAULT 'cash on delivery',
  `payment_status` tinyint(1) NOT NULL DEFAULT '0',
  `is_deleted` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `order_number` (`order_number`),
  KEY `coupon_id` (`coupon_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `coupon_id`, `order_number`, `invoice_number`, `total_products`, `grand_total`, `order_date`, `order_status`, `invoice_date`, `payment_method`, `payment_status`, `is_deleted`) VALUES
(1, 1, NULL, '60509970', 96195708, 1, '5000.00', '2020-05-21', 2, NULL, 'cash on delivery', 1, 0),
(2, 1, NULL, '22474988', 82908904, 2, '3700.00', '2020-05-21', 0, NULL, 'cash on delivery', 1, 0),
(3, 2, NULL, '22895246', 96815176, 1, '3000.00', '2020-05-22', 0, NULL, 'cash on delivery', 0, 0),
(4, 3, NULL, '17206213', 14795728, 1, '1200.00', '2020-05-22', 2, NULL, 'cash on delivery', 1, 0);

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
  `total_amount` decimal(9,2) NOT NULL,
  `is_deleted` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `order_id` (`order_id`),
  KEY `product_id` (`product_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`id`, `order_id`, `product_id`, `vendor_status`, `quantity`, `total_amount`, `is_deleted`) VALUES
(1, 1, 1, 2, 2, '5000.00', 0),
(2, 2, 2, 0, 1, '1200.00', 0),
(3, 2, 1, 0, 1, '2500.00', 0),
(4, 3, 1, 2, 2, '3000.00', 0),
(5, 4, 2, 2, 1, '1200.00', 0);

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
  `slug` varchar(50) NOT NULL,
  `sku` varchar(20) NOT NULL,
  `short_description` mediumtext NOT NULL,
  `long_description` longtext NOT NULL,
  `thumb_image` mediumtext NOT NULL,
  `images` mediumtext,
  `quantity` int(11) NOT NULL,
  `price` decimal(7,2) NOT NULL,
  `old_price` decimal(7,2) NOT NULL,
  `related_products` text,
  `tags` text NOT NULL,
  `add_date` datetime NOT NULL,
  `is_sale` tinyint(1) NOT NULL DEFAULT '0',
  `is_hot` tinyint(1) NOT NULL DEFAULT '0',
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `is_deleted` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `vendor_id` (`vendor_id`),
  KEY `brand_id` (`brand_id`),
  KEY `category_id` (`category_id`),
  KEY `sub_category_id` (`sub_category_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `vendor_id`, `brand_id`, `category_id`, `sub_category_id`, `name`, `slug`, `sku`, `short_description`, `long_description`, `thumb_image`, `images`, `quantity`, `price`, `old_price`, `related_products`, `tags`, `add_date`, `is_sale`, `is_hot`, `is_active`, `is_deleted`) VALUES
(1, 1, 1, 1, 1, 'nike rn6', 'nike-rn6', '9132-d9b4', 'nike sports shoes', 'running shoes', 'assets/uploads/products/1590043584-1584331676-nike1.jpg', 'a:3:{i:0;s:57:\"assets/uploads/products/1590043584--1584168342--nike3.jpg\";i:1;s:57:\"assets/uploads/products/1590043584--1584168342--nike2.jpg\";i:2;s:57:\"assets/uploads/products/1590043584--1584168342--nike4.jpg\";}', 5, '2000.00', '2500.00', 'N;', 'nike, sports, shoes', '2020-05-21 12:16:24', 0, 1, 1, 0),
(2, 1, 1, 1, 1, 'adidas', 'adidas', '4757-f49c', 'puma', 'shoes', 'assets/uploads/products/1590053240-1584331763-puma.png', 'a:4:{i:0;s:55:\"assets/uploads/products/1590053240--1584331763-puma.png\";i:1;s:57:\"assets/uploads/products/1590053240--1584332286--puma1.jpg\";i:2;s:57:\"assets/uploads/products/1590053240--1584332286--puma4.png\";i:3;s:57:\"assets/uploads/products/1590053240--1584332286--puma2.png\";}', 8, '1200.00', '0.00', 'a:1:{i:0;s:1:\"1\";}', 'puma, shoes', '2020-05-21 02:57:20', 0, 0, 1, 0);

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
  `add_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `is_deleted` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `product_id` (`product_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=latin1;

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
(12, 'reply_to_email', 'gcart.team@gmail.com'),
(13, 'reply_to_name', 'GCART '),
(16, 'log_activity', '0'),
(19, 'company_email', 'gcart.team@gmail.com'),
(20, 'twitter_url', 'http://twitter.com'),
(21, 'smtp_encryption', 'ssl'),
(22, 'email_signature', 'GCART TEAM'),
(23, 'email_header', '<!doctype html>\r\n                            <html>\r\n                            <head>\r\n                              <meta name=\"viewport\" content=\"width=device-width\" />\r\n                              <meta http-equiv=\"Content-Type\" content=\"text/html; charset=UTF-8\" />\r\n                              <style>\r\n                                body {\r\n                                 background-color: #f6f6f6;\r\n                                 font-family: sans-serif;\r\n                                 -webkit-font-smoothing: antialiased;\r\n                                 font-size: 14px;\r\n                                 line-height: 1.4;\r\n                                 margin: 0;\r\n                                 padding: 0;\r\n                                 -ms-text-size-adjust: 100%;\r\n                                 -webkit-text-size-adjust: 100%;\r\n                               }\r\n                               table {\r\n                                 border-collapse: separate;\r\n                                 mso-table-lspace: 0pt;\r\n                                 mso-table-rspace: 0pt;\r\n                                 width: 100%;\r\n                               }\r\n                               table td {\r\n                                 font-family: sans-serif;\r\n                                 font-size: 14px;\r\n                                 vertical-align: top;\r\n                               }\r\n                                   /* -------------------------------------\r\n                                     BODY & CONTAINER\r\n                                     ------------------------------------- */\r\n                                     .body {\r\n                                       background-color: #f6f6f6;\r\n                                       width: 100%;\r\n                                     }\r\n                                     /* Set a max-width, and make it display as block so it will automatically stretch to that width, but will also shrink down on a phone or something */\r\n\r\n                                     .container {\r\n                                       display: block;\r\n                                       margin: 0 auto !important;\r\n                                       /* makes it centered */\r\n                                       max-width: 680px;\r\n                                       padding: 10px;\r\n                                       width: 680px;\r\n                                     }\r\n                                     /* This should also be a block element, so that it will fill 100% of the .container */\r\n\r\n                                     .content {\r\n                                       box-sizing: border-box;\r\n                                       display: block;\r\n                                       margin: 0 auto;\r\n                                       max-width: 680px;\r\n                                       padding: 10px;\r\n                                     }\r\n                                   /* -------------------------------------\r\n                                     HEADER, FOOTER, MAIN\r\n                                     ------------------------------------- */\r\n\r\n                                     .main {\r\n                                       background: #fff;\r\n                                       border-radius: 3px;\r\n                                       width: 100%;\r\n                                     }\r\n                                     .wrapper {\r\n                                       box-sizing: border-box;\r\n                                       padding: 20px;\r\n                                     }\r\n                                     .footer {\r\n                                       clear: both;\r\n                                       padding-top: 10px;\r\n                                       text-align: center;\r\n                                       width: 100%;\r\n                                     }\r\n                                     .footer td,\r\n                                     .footer p,\r\n                                     .footer span,\r\n                                     .footer a {\r\n                                       color: #999999;\r\n                                       font-size: 12px;\r\n                                       text-align: center;\r\n                                     }\r\n                                     hr {\r\n                                       border: 0;\r\n                                       border-bottom: 1px solid #f6f6f6;\r\n                                       margin: 20px 0;\r\n                                     }\r\n                                   /* -------------------------------------\r\n                                     RESPONSIVE AND MOBILE FRIENDLY STYLES\r\n                                     ------------------------------------- */\r\n\r\n                                     @media only screen and (max-width: 620px) {\r\n                                       table[class=body] .content {\r\n                                         padding: 0 !important;\r\n                                       }\r\n                                       table[class=body] .container {\r\n                                         padding: 0 !important;\r\n                                         width: 100% !important;\r\n                                       }\r\n                                       table[class=body] .main {\r\n                                         border-left-width: 0 !important;\r\n                                         border-radius: 0 !important;\r\n                                         border-right-width: 0 !important;\r\n                                       }\r\n                                     }\r\n                                   </style>\r\n                                 </head>\r\n                                 <body class=\"\">\r\n                                  <table border=\"0\" cellpadding=\"0\" cellspacing=\"0\" class=\"body\">\r\n                                    <tr>\r\n                                     <td>Â </td>\r\n                                     <td class=\"container\">\r\n                                      <div class=\"content\">\r\n                                        <!-- START CENTERED WHITE CONTAINER -->\r\n                                        <table class=\"main\">\r\n                                          <!-- START MAIN CONTENT AREA -->\r\n                                          <tr>\r\n                                           <td class=\"wrapper\">\r\n                                            <table border=\"0\" cellpadding=\"0\" cellspacing=\"0\">\r\n                                              <tr>\r\n                                               <td>'),
(24, 'email_footer', '</td>\r\n                             </tr>\r\n                           </table>\r\n                         </td>\r\n                       </tr>\r\n                       <!-- END MAIN CONTENT AREA -->\r\n                     </table>\r\n                     <!-- START FOOTER -->\r\n                     <div class=\"footer\">\r\n                      <table border=\"0\" cellpadding=\"0\" cellspacing=\"0\">\r\n                        <tr>\r\n                          <td class=\"content-block\">\r\n                            <span>You are \r\n receiving this email because of your account on {company_name}</span>\r\n                          </td>\r\n                        </tr>\r\n                      </table>\r\n                    </div>\r\n                    <!-- END FOOTER -->\r\n                    <!-- END CENTERED WHITE CONTAINER -->\r\n                  </div>\r\n                </td>\r\n                <td>Â </td>\r\n              </tr>\r\n            </table>\r\n            </body>\r\n            </html>'),
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
  `is_deleted` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `slider_settings`
--

INSERT INTO `slider_settings` (`id`, `title`, `sub_title`, `description`, `image`, `is_deleted`) VALUES
(1, 'world fashion', 'get upto 40% OFF ', 'Highlight your personality  and look with these fabulous and exquisite fashion.', 'assets/uploads/sliders/01.jpg', 0),
(2, 'top brands', 'new collections', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.', 'assets/uploads/sliders/02.jpg', 0),
(3, 'crazy super deals', 'get up to 70% OFF', '', 'assets/uploads/sliders/s1.jfif', 0),
(4, 'hbsjhs', 'hbkhb', 'njknn', 'assets/uploads/sliders/default_slider.png', 1);

-- --------------------------------------------------------

--
-- Table structure for table `states`
--

DROP TABLE IF EXISTS `states`;
CREATE TABLE IF NOT EXISTS `states` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `country_id` int(11) NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `is_deleted` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `states`
--

INSERT INTO `states` (`id`, `name`, `country_id`, `is_active`, `is_deleted`) VALUES
(1, 'ANDHRA PRADESH', 105, 1, 0),
(2, 'ASSAM', 105, 1, 0),
(3, 'ARUNACHAL PRADESH', 105, 1, 0),
(4, 'BIHAR', 105, 1, 0),
(5, 'GUJARAT', 105, 1, 0),
(6, 'HARYANA', 105, 1, 0),
(7, 'HIMACHAL PRADESH', 105, 1, 0),
(8, 'JAMMU & KASHMIR', 105, 1, 0),
(9, 'KARNATAKA', 105, 1, 0),
(10, 'KERALA', 105, 1, 0),
(11, 'MADHYA PRADESH', 105, 1, 0),
(12, 'MAHARASHTRA', 105, 1, 0),
(13, 'MANIPUR', 105, 1, 0),
(14, 'MEGHALAYA', 105, 1, 0),
(15, 'MIZORAM', 105, 1, 0),
(16, 'NAGALAND', 105, 1, 0),
(17, 'ORISSA', 105, 1, 0),
(18, 'PUNJAB', 105, 1, 0),
(19, 'RAJASTHAN', 105, 1, 0),
(20, 'SIKKIM', 105, 1, 0),
(21, 'TAMIL NADU', 105, 1, 0),
(22, 'TRIPURA', 105, 1, 0),
(23, 'UTTAR PRADESH', 105, 1, 0),
(24, 'WEST BENGAL', 105, 1, 0),
(25, 'DELHI', 105, 1, 0),
(26, 'GOA', 105, 1, 0),
(27, 'PONDICHERY', 105, 1, 0),
(28, 'LAKSHDWEEP', 105, 1, 0),
(29, 'DAMAN & DIU', 105, 1, 0),
(30, 'DADRA & NAGAR', 105, 1, 0),
(31, 'CHANDIGARH', 105, 1, 0),
(32, 'ANDAMAN & NICOBAR', 105, 1, 0),
(33, 'UTTARANCHAL', 105, 1, 0),
(34, 'JHARKHAND', 105, 1, 0),
(35, 'CHATTISGARH', 105, 1, 0);

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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subscriptions`
--

INSERT INTO `subscriptions` (`id`, `title`, `cost`, `days`, `product_limit`, `description`, `is_deleted`) VALUES
(1, 'welcome', '0.00', 30, 10, 'Welcome trial plan', 0),
(2, 'gold', '500.00', 250, 70, 'gold', 0),
(3, 'standard', '250.00', 40, 25, 'standard', 0),
(4, 'platinum', '100.00', 20, 20, 'platinum', 0);

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
  `is_active` tinyint(1) NOT NULL,
  `is_deleted` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `slug` (`slug`),
  KEY `category_id` (`category_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sub_categories`
--

INSERT INTO `sub_categories` (`id`, `category_id`, `name`, `slug`, `is_active`, `is_deleted`) VALUES
(1, 1, 'track', 'track', 1, 0);

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
  `role_id` int(11) NOT NULL DEFAULT '0',
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `mobile` bigint(20) NOT NULL,
  `password` varchar(32) NOT NULL,
  `profile_image` mediumtext NOT NULL,
  `last_login` datetime NOT NULL,
  `last_ip` varchar(50) NOT NULL,
  `signup_date` datetime DEFAULT CURRENT_TIMESTAMP,
  `last_password_change` datetime DEFAULT NULL,
  `new_pass_key` varchar(32) NOT NULL,
  `new_pass_key_requested` datetime NOT NULL,
  `sign_up_key` varchar(32) NOT NULL,
  `is_email_verified` tinyint(1) NOT NULL,
  `is_active` tinyint(1) NOT NULL,
  `is_admin` tinyint(1) NOT NULL DEFAULT '0',
  `is_deleted` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `role_id` (`role_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `role_id`, `firstname`, `lastname`, `email`, `mobile`, `password`, `profile_image`, `last_login`, `last_ip`, `signup_date`, `last_password_change`, `new_pass_key`, `new_pass_key_requested`, `sign_up_key`, `is_email_verified`, `is_active`, `is_admin`, `is_deleted`) VALUES
(1, 1, 'bhavik', 'patel', 'bdp@narola.email', 9978554691, '939c0c999030aaf9dc160e089d23567e', 'assets/uploads/users/1590040964-apple-logo.png', '2020-05-22 12:34:21', '::1', '2020-05-21 11:31:16', NULL, '', '0000-00-00 00:00:00', '0eed72f533f41c072430ad9409222fb3', 1, 1, 1, 0),
(2, 0, 'akash', 'patel', 'patelakash164@gmail.com', 9574612134, 'e29d88c21bb07d8877785fcfe6ce88a5', 'assets/uploads/users/default_user.png', '2020-05-22 11:31:02', '::1', '2020-05-21 14:28:39', NULL, '', '0000-00-00 00:00:00', '17fdfb507268e98cd4c3ae8a867dcfd6', 1, 1, 0, 0),
(3, 0, 'parth', 'patel', 'parth8406.10@gmail.com', 6353810699, '8936d2bd29809a951964f08ca07453ef', 'assets/uploads/users/default_user.png', '2020-05-22 12:04:47', '::1', '2020-05-22 11:51:49', NULL, '', '0000-00-00 00:00:00', '00388580e8b19341e7c7b81de7d966a7', 1, 1, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `users_addresses`
--

DROP TABLE IF EXISTS `users_addresses`;
CREATE TABLE IF NOT EXISTS `users_addresses` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `users_id` int(11) NOT NULL,
  `house_or_village` varchar(250) DEFAULT NULL,
  `street_or_society` varchar(250) DEFAULT NULL,
  `landmark` varchar(250) DEFAULT NULL,
  `city_id` int(11) DEFAULT NULL,
  `state_id` int(11) DEFAULT NULL,
  `pincode` int(6) DEFAULT NULL,
  `is_deleted` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `users_id` (`users_id`),
  KEY `city_id` (`city_id`),
  KEY `state_id` (`state_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users_addresses`
--

INSERT INTO `users_addresses` (`id`, `users_id`, `house_or_village`, `street_or_society`, `landmark`, `city_id`, `state_id`, `pincode`, `is_deleted`) VALUES
(1, 1, '7', 'Ashirwad society', 'kadoli', 140, 5, 396436, 0),
(2, 2, '12', 'ASW', 'kdl', 147, 5, 396558, 0),
(3, 3, '11', 'Ashirwad', 'kadoli', 140, 5, 396436, 0);

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `vendors`
--

DROP TABLE IF EXISTS `vendors`;
CREATE TABLE IF NOT EXISTS `vendors` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `subscription_id` int(11) DEFAULT '1',
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `mobile` bigint(20) NOT NULL,
  `password` varchar(32) NOT NULL,
  `profile_image` mediumtext NOT NULL,
  `owner_name` varchar(50) NOT NULL,
  `shop_name` varchar(50) NOT NULL,
  `address` varchar(100) NOT NULL,
  `city_id` varchar(50) NOT NULL,
  `state_id` int(11) NOT NULL,
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

INSERT INTO `vendors` (`id`, `subscription_id`, `firstname`, `lastname`, `email`, `mobile`, `password`, `profile_image`, `owner_name`, `shop_name`, `address`, `city_id`, `state_id`, `pincode`, `logo`, `shop_number`, `registration_number`, `subscribe_date`, `shop_details`, `total_products`, `last_login`, `last_ip`, `new_pass_key`, `new_pass_key_requested`, `sign_up_key`, `last_password_change`, `is_email_verified`, `is_active`, `is_admin`, `is_deleted`) VALUES
(1, 2, 'bhavik', 'patel', 'bdp@narola.email', 9978554691, '939c0c999030aaf9dc160e089d23567e', '', 'BHAVIK', 'B-7', 'Ashirwad society', '140', 5, 396436, 'assets/uploads/vendors/logo/1590121281-logo_3.jpg', 77, 7, '2020-05-22 10:05:56', 'all items available', 2, '0000-00-00 00:00:00', '', '', '0000-00-00 00:00:00', '20edcd26d621224a551fb1d5dfb761d1', NULL, 1, 1, 0, 0),
(2, 1, 'akash', 'patel', 'patelakash164@gmail.com', 9574612134, 'e29d88c21bb07d8877785fcfe6ce88a5', '', 'AKASH', 'AK-8', 'asw', '147', 5, 396558, '', 8, 789, '0000-00-00 00:00:00', '', 0, '0000-00-00 00:00:00', '', '', '0000-00-00 00:00:00', '3fcc18d5de8d2617781d10bc6b0c7bac', NULL, 1, 1, 0, 0);

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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `wishlist`
--

INSERT INTO `wishlist` (`id`, `user_id`, `product_id`, `is_deleted`) VALUES
(1, 2, 1, 0);

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
  ADD CONSTRAINT `products_ibfk_2` FOREIGN KEY (`brand_id`) REFERENCES `brands` (`id`),
  ADD CONSTRAINT `products_ibfk_3` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`),
  ADD CONSTRAINT `products_ibfk_4` FOREIGN KEY (`sub_category_id`) REFERENCES `sub_categories` (`id`),
  ADD CONSTRAINT `products_ibfk_5` FOREIGN KEY (`vendor_id`) REFERENCES `vendors` (`id`);

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
-- Constraints for table `users_addresses`
--
ALTER TABLE `users_addresses`
  ADD CONSTRAINT `users_addresses_ibfk_1` FOREIGN KEY (`city_id`) REFERENCES `cities` (`id`),
  ADD CONSTRAINT `users_addresses_ibfk_2` FOREIGN KEY (`state_id`) REFERENCES `states` (`id`);

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
