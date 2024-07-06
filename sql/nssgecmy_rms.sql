-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 24, 2024 at 10:53 AM
-- Server version: 5.7.23-23
-- PHP Version: 8.1.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `nssgecmy_rms`
--

-- --------------------------------------------------------

--
-- Table structure for table `core_availables`
--

CREATE TABLE `core_availables` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `core_availables`
--

INSERT INTO `core_availables` (`id`, `name`) VALUES
(1, 'Available'),
(2, 'Booked');

-- --------------------------------------------------------

--
-- Table structure for table `core_contacts`
--

CREATE TABLE `core_contacts` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(45) NOT NULL,
  `contact_category_id` int(10) UNSIGNED NOT NULL,
  `contact_no` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `core_contacts`
--

INSERT INTO `core_contacts` (`id`, `name`, `contact_category_id`, `contact_no`, `email`) VALUES
(1, 'Akram Hoshen', 1, '01633962936', 'akramhoshen2018@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `core_contact_categories`
--

CREATE TABLE `core_contact_categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `core_contact_categories`
--

INSERT INTO `core_contact_categories` (`id`, `name`) VALUES
(1, 'Family'),
(2, 'Relatives'),
(3, 'Friends'),
(4, 'Student');

-- --------------------------------------------------------

--
-- Table structure for table `core_cosmetics`
--

CREATE TABLE `core_cosmetics` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(45) NOT NULL,
  `cosmetics_category_id` int(10) UNSIGNED NOT NULL,
  `produtcs` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `core_cosmetics`
--

INSERT INTO `core_cosmetics` (`id`, `name`, `cosmetics_category_id`, `produtcs`) VALUES
(1, 'Alovera gel', 1, 'Gel type'),
(2, 'Dark black', 3, 'Leikme'),
(4, 'Alovera gel', 1, 'Gel type');

-- --------------------------------------------------------

--
-- Table structure for table `core_cosmetics_categories`
--

CREATE TABLE `core_cosmetics_categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `core_cosmetics_categories`
--

INSERT INTO `core_cosmetics_categories` (`id`, `name`) VALUES
(1, 'Facial gel'),
(2, 'Moistureriszer'),
(3, 'Eay Liner'),
(4, 'Maskara');

-- --------------------------------------------------------

--
-- Table structure for table `core_customers`
--

CREATE TABLE `core_customers` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(45) NOT NULL,
  `mobile` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `address` text NOT NULL,
  `photo` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `core_customers`
--

INSERT INTO `core_customers` (`id`, `name`, `mobile`, `email`, `created_at`, `updated_at`, `address`, `photo`) VALUES
(1, 'Jahidul Islam', '45345435435', 'jahid@yahoo.com', '2021-12-14 06:43:13', '2021-12-14 06:43:13', '', ''),
(2, 'Rejaul Karim', '4353445546', 'Reza@yahoo.com', '2021-12-14 06:43:13', '2021-12-14 06:43:13', '', ''),
(3, 'Niyamot', '3434343', 'niyamot@yahoo.com', '2021-12-14 00:44:25', '2021-12-14 00:44:25', '', ''),
(4, 'Kamrul', '23432432423', 'kamrul@gmail.com', '2022-02-14 17:11:33', '2022-02-14 17:11:33', '', ''),
(5, 'Silvia', '34324232', 'silvia@gmail.com', '2022-02-14 17:13:24', '2022-02-14 17:13:24', '', ''),
(6, 'Akram Hoshen', '01633962936', 'akram2018@gmail.com', '2023-12-05 18:35:20', '2023-12-05 18:35:20', 'Indira,Road', '6.jpeg'),
(8, 'Afzal Hossain', '01722065466', 'Afzal@gmail.com', '2024-03-27 18:35:41', '2024-03-27 18:35:41', '', ''),
(9, 'Ahmed Khan', '+919876543210', 'ahmed.khan@example.com', '2024-03-28 19:08:02', '2024-03-28 19:08:02', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `core_departments`
--

CREATE TABLE `core_departments` (
  `id` int(10) UNSIGNED NOT NULL,
  `code` varchar(45) NOT NULL,
  `name` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `core_departments`
--

INSERT INTO `core_departments` (`id`, `code`, `name`) VALUES
(1, '10', 'Accounts'),
(3, '30', 'HR'),
(4, '40', 'Sales and Marketing'),
(5, '20', 'Team Leader'),
(6, '30', 'Superviser'),
(7, '40', 'CM'),
(8, '50', 'Chef'),
(9, '60', 'Clener ');

-- --------------------------------------------------------

--
-- Table structure for table `core_districts`
--

CREATE TABLE `core_districts` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(45) NOT NULL,
  `division_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `core_districts`
--

INSERT INTO `core_districts` (`id`, `name`, `division_id`) VALUES
(1, 'Narayangang', 1),
(2, 'Nonakhali', 3),
(3, 'Feni', 3),
(4, 'Tingile', 1),
(5, 'Gajipur', 1),
(6, 'Potuakhali', 2),
(7, 'Dhaka', 1);

-- --------------------------------------------------------

--
-- Table structure for table `core_divisions`
--

CREATE TABLE `core_divisions` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `core_divisions`
--

INSERT INTO `core_divisions` (`id`, `name`) VALUES
(1, 'Dhaka'),
(2, 'Borishal'),
(3, 'Chottrogram');

-- --------------------------------------------------------

--
-- Table structure for table `core_employees`
--

CREATE TABLE `core_employees` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(45) NOT NULL,
  `position_id` int(10) UNSIGNED NOT NULL,
  `contact_no` int(10) UNSIGNED NOT NULL,
  `address` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `core_employees`
--

INSERT INTO `core_employees` (`id`, `name`, `position_id`, `contact_no`, `address`) VALUES
(1, 'Rony', 5, 1984351844, '');

-- --------------------------------------------------------

--
-- Table structure for table `core_manufacturers`
--

CREATE TABLE `core_manufacturers` (
  `id` int(10) NOT NULL,
  `name` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `core_manufacturers`
--

INSERT INTO `core_manufacturers` (`id`, `name`) VALUES
(1, 'APCL'),
(2, 'ISL'),
(3, 'IDB');

-- --------------------------------------------------------

--
-- Table structure for table `core_orders`
--

CREATE TABLE `core_orders` (
  `id` int(10) UNSIGNED NOT NULL,
  `table_id` int(10) UNSIGNED NOT NULL,
  `order_date` datetime NOT NULL,
  `order_total` varchar(45) NOT NULL,
  `remark` text NOT NULL,
  `status_id` int(10) UNSIGNED NOT NULL,
  `discount` float NOT NULL,
  `vat` float NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `chekedout` tinyint(3) UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `core_orders`
--

INSERT INTO `core_orders` (`id`, `table_id`, `order_date`, `order_total`, `remark`, `status_id`, `discount`, `vat`, `created_at`, `updated_at`, `chekedout`) VALUES
(1, 1, '0000-00-00 00:00:00', '262.5', '', 3, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 1),
(2, 2, '0000-00-00 00:00:00', '609', '', 1, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0),
(3, 3, '0000-00-00 00:00:00', '262.5', '', 1, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0),
(4, 3, '0000-00-00 00:00:00', '294', '', 1, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0),
(5, 1, '2024-01-19 00:00:00', '304.5', '', 3, 0, 0, '2024-01-19 07:17:14', '2024-01-19 07:17:14', 1),
(6, 1, '2024-01-21 00:00:00', '315', '', 1, 0, 0, '2024-01-20 22:29:43', '2024-01-20 22:29:43', 0),
(7, 4, '2024-01-21 00:00:00', '472.5', '', 1, 0, 0, '2024-01-20 22:30:32', '2024-01-20 22:30:32', 0),
(8, 1, '2024-01-21 00:00:00', '472.5', '', 3, 0, 0, '2024-01-21 05:14:55', '2024-01-21 05:14:55', 1),
(9, 1, '2024-01-21 00:00:00', '472.5', '', 3, 0, 0, '2024-01-21 05:16:41', '2024-01-21 05:16:41', 1),
(10, 5, '2024-01-21 00:00:00', '315', '', 1, 0, 0, '2024-01-21 05:22:30', '2024-01-21 05:22:30', 1),
(11, 5, '2024-01-21 00:00:00', '472.5', '', 1, 0, 0, '2024-01-21 05:44:03', '2024-01-21 05:44:03', 0),
(12, 4, '2024-01-21 00:00:00', '315', '', 1, 0, 0, '2024-01-21 10:55:32', '2024-01-21 10:55:32', 0),
(13, 6, '2024-02-05 00:00:00', '262.5', '', 1, 0, 0, '2024-02-05 07:40:57', '2024-02-05 07:40:57', 0),
(14, 7, '2024-02-05 00:00:00', '420', '', 1, 0, 0, '2024-02-05 07:41:16', '2024-02-05 07:41:16', 0),
(15, 7, '2024-02-05 00:00:00', '420', '', 1, 0, 0, '2024-02-05 07:41:28', '2024-02-05 07:41:28', 0),
(16, 7, '2024-02-05 00:00:00', '420', '', 3, 0, 0, '2024-02-05 07:41:32', '2024-02-05 07:41:32', 1),
(17, 8, '2024-02-07 00:00:00', '383.25', '', 1, 0, 0, '2024-02-06 21:05:38', '2024-02-06 21:05:38', 0),
(18, 2, '2024-03-28 00:00:00', '399', '', 1, 0, 0, '2024-03-27 19:20:00', '2024-03-27 19:20:00', 0),
(19, 9, '2024-03-29 00:00:00', '294', '', 3, 0, 0, '2024-03-28 16:01:12', '2024-03-28 16:01:12', 1),
(20, 15, '2024-03-30 00:00:00', '472.5', '', 3, 0, 0, '2024-03-30 02:16:10', '2024-03-30 02:16:10', 1),
(21, 10, '2024-04-30 00:00:00', '1470', 'need very fast', 1, 0, 0, '2024-04-30 00:06:22', '2024-04-30 00:06:22', 0),
(22, 9, '2024-05-24 00:00:00', '714', '', 1, 0, 0, '2024-05-24 10:10:31', '2024-05-24 10:10:31', 0);

-- --------------------------------------------------------

--
-- Table structure for table `core_order_details`
--

CREATE TABLE `core_order_details` (
  `id` int(10) UNSIGNED NOT NULL,
  `order_id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `qty` float NOT NULL,
  `price` float NOT NULL,
  `vat` float NOT NULL DEFAULT '0',
  `discount` float NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `core_order_details`
--

INSERT INTO `core_order_details` (`id`, `order_id`, `product_id`, `qty`, `price`, `vat`, `discount`, `created_at`, `updated_at`) VALUES
(1, 1, 3, 1, 300, 0, 50, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 2, 1, 2, 290, 0, 0, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 3, 3, 1, 300, 0, 50, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, 4, 3, 1, 300, 0, 20, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(5, 5, 1, 1, 290, 0, 0, '2024-01-19 01:17:14', '2024-01-19 01:17:14'),
(6, 6, 3, 1, 300, 0, 0, '2024-01-20 16:29:43', '2024-01-20 16:29:43'),
(7, 7, 4, 1, 450, 0, 0, '2024-01-20 16:30:32', '2024-01-20 16:30:32'),
(8, 8, 4, 1, 450, 0, 0, '2024-01-20 23:14:55', '2024-01-20 23:14:55'),
(9, 9, 4, 1, 450, 0, 0, '2024-01-20 23:16:41', '2024-01-20 23:16:41'),
(10, 10, 3, 1, 300, 0, 0, '2024-01-20 23:22:30', '2024-01-20 23:22:30'),
(11, 11, 4, 1, 450, 0, 0, '2024-01-20 23:44:03', '2024-01-20 23:44:03'),
(12, 12, 3, 1, 300, 0, 0, '2024-01-21 04:55:32', '2024-01-21 04:55:32'),
(13, 13, 3, 1, 300, 0, 50, '2024-02-05 01:40:57', '2024-02-05 01:40:57'),
(14, 14, 5, 1, 400, 0, 0, '2024-02-05 01:41:16', '2024-02-05 01:41:16'),
(15, 16, 4, 1, 450, 0, 50, '2024-02-05 01:41:32', '2024-02-05 01:41:32'),
(16, 17, 5, 1, 400, 0, 35, '2024-02-06 15:05:38', '2024-02-06 15:05:38'),
(17, 18, 6, 1, 380, 0, 0, '2024-03-27 13:20:00', '2024-03-27 13:20:00'),
(18, 19, 3, 1, 300, 0, 20, '2024-03-28 22:01:12', '2024-03-28 22:01:12'),
(19, 20, 4, 1, 450, 0, 0, '2024-03-30 08:16:10', '2024-03-30 08:16:10'),
(20, 21, 3, 2, 300, 0, 0, '2024-04-30 06:06:22', '2024-04-30 06:06:22'),
(21, 21, 5, 2, 400, 0, 0, '2024-04-30 06:06:22', '2024-04-30 06:06:22'),
(22, 22, 3, 1, 300, 0, 20, '2024-05-24 16:10:31', '2024-05-24 16:10:31'),
(23, 22, 4, 1, 450, 0, 50, '2024-05-24 16:10:31', '2024-05-24 16:10:31');

-- --------------------------------------------------------

--
-- Table structure for table `core_persons`
--

CREATE TABLE `core_persons` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(45) NOT NULL,
  `position_id` int(10) UNSIGNED NOT NULL,
  `sex` tinyint(1) NOT NULL,
  `dob` date NOT NULL,
  `doj` date NOT NULL,
  `mobile` varchar(45) NOT NULL,
  `address` varchar(45) DEFAULT NULL,
  `inactive` tinyint(1) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `core_persons`
--

INSERT INTO `core_persons` (`id`, `name`, `position_id`, `sex`, `dob`, `doj`, `mobile`, `address`, `inactive`) VALUES
(1, 'Jahidul Islam', 1, 0, '2000-01-01', '2021-01-01', '677657657567', 'Rampura', 0),
(2, 'Rony', 4, 0, '1997-03-04', '0000-00-00', '01761435555', 'Mirpur 10, Dhaka', 0),
(3, 'Abir Hasan', 4, 0, '1994-02-21', '0000-00-00', '01761435656', 'FirmGate, Dhaka-1215', 0),
(4, 'Sajjad', 4, 0, '2002-12-20', '2024-01-19', '01716435967', 'Barishal', 0),
(5, 'Akram Hoshen', 4, 0, '1996-02-08', '2023-06-20', '01633962936', 'Indira,Road', 0),
(6, 'Bristy', 4, 1, '1995-08-18', '2023-05-02', '0198438976', 'Kazipara', 0);

-- --------------------------------------------------------

--
-- Table structure for table `core_positions`
--

CREATE TABLE `core_positions` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(45) NOT NULL,
  `grade` int(10) UNSIGNED NOT NULL,
  `department_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `core_positions`
--

INSERT INTO `core_positions` (`id`, `name`, `grade`, `department_id`) VALUES
(1, 'Programmer', 6, 2),
(2, 'System Analyst', 3, 1),
(4, 'Waiter', 8, 4),
(5, 'Manager', 10, 4),
(6, 'Team Leader', 15, 4);

-- --------------------------------------------------------

--
-- Table structure for table `core_pro`
--

CREATE TABLE `core_pro` (
  `id` int(10) NOT NULL,
  `name` varchar(50) NOT NULL,
  `offer_price` double DEFAULT NULL,
  `manufacturer_id` int(10) NOT NULL,
  `regular_price` double NOT NULL,
  `description` text,
  `photo` varchar(50) DEFAULT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `section_id` int(10) UNSIGNED NOT NULL,
  `is_featured` tinyint(1) DEFAULT '0',
  `star` int(10) UNSIGNED DEFAULT NULL,
  `is_brand` tinyint(1) DEFAULT '0',
  `offer_discount` float DEFAULT '0',
  `uom_id` int(10) UNSIGNED NOT NULL,
  `weight` float DEFAULT NULL,
  `barcode` varchar(45) NOT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `core_pro`
--

INSERT INTO `core_pro` (`id`, `name`, `offer_price`, `manufacturer_id`, `regular_price`, `description`, `photo`, `category_id`, `section_id`, `is_featured`, `star`, `is_brand`, `offer_discount`, `uom_id`, `weight`, `barcode`, `created_at`, `updated_at`) VALUES
(36, 'Brown Borka', 2500, 1, 3000, '', 'brown-borka.jpg', 2, 1, 1, 5, 1, 0, 1, 0, '4456342342', '2022-02-06 00:02:07', '2022-02-06 00:02:07'),
(39, 'Apple', 333, 1, 333, '', 'apple.png', 2, 3, 0, 2, 0, 2, 2, 4, '3432433', '2022-02-06 11:07:17', '2022-02-06 11:07:17'),
(40, 'Red Apple', 222, 1, 222, '', 'red-apple.jpg', 2, 3, 0, 1, 0, 1, 2, 2, '34242323', '2022-02-06 11:08:35', '2022-02-06 11:08:35'),
(42, 'Laptop', 90000, 3, 70000, 'Hp Notebook', '42.jpg', 6, 1, NULL, NULL, NULL, NULL, 3, NULL, '4325364', '2022-01-13 03:51:21', '2022-01-13 03:51:21'),
(43, 'Camera', 40000, 3, 30000, 'Black', '43.png', 5, 1, 0, 1, 0, 0, 3, 1, '45645', '2022-02-15 22:35:29', '2022-02-15 22:35:29'),
(45, 'Beauty Blendar', 120, 1, 150, 'beuty Blendar', '45.jpg', 12, 4, NULL, NULL, NULL, NULL, 1, NULL, '1234', '2022-01-13 06:34:32', '2022-01-13 06:34:32'),
(46, 'Eyeliner', 180, 1, 200, 'Eyeliner', '46.jpg', 12, 4, NULL, NULL, NULL, NULL, 1, NULL, '2222', '2022-01-13 06:38:44', '2022-01-13 06:38:44'),
(47, 'Beef Biriyani', 999, 3, 1000, 'Healthy & Hygenic', '47.png', 4, 3, 0, 0, 0, 0, 3, 0, '123abc', '2022-02-15 22:36:34', '2022-02-15 22:36:34'),
(48, 'Black Borka', 3000, 3, 3300, 'Stylish & Artistic', '48.jpg', 9, 2, 0, 0, 0, 0, 1, 0, '123098', '2022-02-15 22:36:53', '2022-02-15 22:36:53');

-- --------------------------------------------------------

--
-- Table structure for table `core_products`
--

CREATE TABLE `core_products` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(45) NOT NULL,
  `details` text NOT NULL,
  `price` int(10) UNSIGNED NOT NULL,
  `product_category_id` int(10) UNSIGNED NOT NULL,
  `photo` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `core_products`
--

INSERT INTO `core_products` (`id`, `name`, `details`, `price`, `product_category_id`, `photo`) VALUES
(1, 'Beef Burger', 'Beef peaty double cheese', 290, 1, 'download-jpg.jpg'),
(3, 'Passta', 'Chicken backed naga ', 300, 2, 'passta.jpg'),
(4, 'Pizza', '4Season Chicken Pizza 12 \'Inc\'.', 450, 2, 'pizza.jpg'),
(5, 'Dam-biriyani', 'beef', 400, 2, 'dam-biriyani.jpg'),
(6, 'Peri-Pasta', 'Chicken', 380, 2, 'peri-pasta.jpg'),
(7, 'Spicy Chicken Curry', 'Tender chicken pieces cooked in a rich blend of aromatic spices, served with fragrant basmati rice.', 13, 4, 'spicy-chicken-curry.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `core_product_categories`
--

CREATE TABLE `core_product_categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(45) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `core_product_categories`
--

INSERT INTO `core_product_categories` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Beef-iteams', '2024-03-29 00:49:50', '2024-03-29 00:49:50'),
(2, 'Chiken-iteams', '2024-03-29 00:50:02', '2024-03-29 00:50:02'),
(3, 'Fish-iteams', '2024-03-29 00:50:06', '2024-03-29 00:50:06'),
(4, 'Rice', '2024-03-29 00:50:09', '2024-03-29 00:50:09'),
(5, 'Drinks', '2024-03-29 00:50:14', '2024-03-29 00:50:14'),
(6, 'Desserts', '2024-03-29 01:04:48', '2024-03-29 01:04:48');

-- --------------------------------------------------------

--
-- Table structure for table `core_product_categories0`
--

CREATE TABLE `core_product_categories0` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(45) NOT NULL,
  `section_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `core_product_categories0`
--

INSERT INTO `core_product_categories0` (`id`, `name`, `section_id`, `created_at`, `updated_at`) VALUES
(3, 'Fish', 3, '2022-01-11 06:46:24', NULL),
(4, 'Drugs', 3, '2022-01-11 06:46:24', NULL),
(9, 'Women\'s', 2, '2022-01-11 06:46:24', NULL),
(10, 'Men\'s', 2, '2022-01-11 06:46:24', NULL),
(11, 'Kids', 2, '2022-01-11 06:46:24', NULL),
(12, 'Cosmatics', 4, '2022-01-11 06:46:24', NULL),
(13, 'Chicken', 3, '2024-02-02 14:00:06', '2024-02-02 20:00:06'),
(14, 'Beef', 3, '2024-02-02 14:54:06', '2024-02-02 20:54:06'),
(15, 'Murg-massallam', 3, '2024-02-03 17:28:04', '2024-02-03 23:28:04'),
(16, 'Vegetables', 1, '2024-02-04 05:24:56', '2024-02-04 11:24:56'),
(17, 'Beef', 1, '2024-02-04 05:25:26', '2024-02-04 11:25:26'),
(19, 'Chicken', 1, '2024-02-04 05:25:57', '2024-02-04 11:25:57'),
(20, 'Lemon', 1, '2024-02-04 05:26:20', '2024-02-04 11:26:20'),
(21, 'Mint leaf', 1, '2024-02-04 05:26:58', '2024-02-04 11:26:58'),
(22, 'Salt', 1, '2024-02-04 05:27:54', '2024-02-04 11:27:54'),
(23, 'Sugur', 1, '2024-02-04 05:28:12', '2024-02-04 11:28:12'),
(24, 'powder-milk', 1, '2024-02-04 05:28:30', '2024-02-04 11:28:30'),
(25, 'Flour', 1, '2024-02-04 05:28:55', '2024-02-04 11:28:55'),
(26, 'Corn-starch', 1, '2024-02-04 05:29:18', '2024-02-04 11:29:18'),
(27, 'Olive', 1, '2024-02-04 05:30:02', '2024-02-04 11:30:02'),
(28, 'Black-olive', 1, '2024-02-04 05:30:16', '2024-02-04 11:30:16'),
(29, 'Mint-Lamoned', 7, '2024-02-04 05:31:03', '2024-02-04 11:31:03'),
(30, 'Clear Soup', 7, '2024-02-04 05:40:25', '2024-02-04 11:40:25'),
(31, 'Chicken-burger', 7, '2024-02-04 05:41:35', '2024-02-04 11:41:35'),
(32, 'Chicken-cheese Burger', 7, '2024-02-04 05:42:03', '2024-02-04 11:42:03'),
(33, 'Pink-suses Passta', 7, '2024-02-04 05:45:04', '2024-02-04 11:45:04'),
(34, 'White-suses Passta', 7, '2024-02-04 05:45:25', '2024-02-04 11:45:25'),
(35, 'Masrum-Pizza', 7, '2024-02-04 05:45:52', '2024-02-04 11:45:52'),
(36, 'Double-cheses Pizza', 7, '2024-02-04 05:46:25', '2024-02-04 11:46:25'),
(37, 'Beef Burger', 7, '2024-02-04 05:52:10', '2024-02-04 11:52:10'),
(38, 'Olive and cheses funteint Pizza', 7, '2024-02-04 05:53:37', '2024-02-04 11:53:37'),
(39, 'Mixed Fried Rice', 7, '2024-02-04 05:54:01', '2024-02-04 11:54:01'),
(40, 'Biriyani', 7, '2024-02-04 05:54:19', '2024-02-04 11:54:19'),
(41, 'Muttan Biriyani', 7, '2024-02-04 05:55:05', '2024-02-04 11:55:05'),
(42, 'Beef Biriyani', 7, '2024-02-04 05:56:03', '2024-02-04 11:56:03'),
(43, 'Chicken Roest', 7, '2024-02-04 05:56:38', '2024-02-04 11:56:38');

-- --------------------------------------------------------

--
-- Table structure for table `core_product_sections`
--

CREATE TABLE `core_product_sections` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(45) NOT NULL,
  `unit_id` int(10) UNSIGNED DEFAULT NULL,
  `photo` varchar(145) DEFAULT NULL,
  `icon` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `core_product_sections`
--

INSERT INTO `core_product_sections` (`id`, `name`, `unit_id`, `photo`, `icon`) VALUES
(1, 'Section1', 1, NULL, NULL),
(2, 'Section2', 1, NULL, NULL),
(3, 'Section3', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `core_product_units`
--

CREATE TABLE `core_product_units` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(45) NOT NULL,
  `photo` varchar(45) DEFAULT NULL,
  `icon` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `core_product_units`
--

INSERT INTO `core_product_units` (`id`, `name`, `photo`, `icon`) VALUES
(1, 'Electronics', NULL, NULL),
(2, 'Grocery', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `core_purchases`
--

CREATE TABLE `core_purchases` (
  `id` int(10) UNSIGNED NOT NULL,
  `supplier_id` int(10) UNSIGNED NOT NULL,
  `purchase_date` datetime NOT NULL,
  `delivery_date` datetime NOT NULL,
  `shipping_address` text NOT NULL,
  `purchase_total` double NOT NULL,
  `paid_amount` double NOT NULL,
  `remark` text NOT NULL,
  `status_id` int(10) UNSIGNED NOT NULL,
  `discount` float NOT NULL DEFAULT '0',
  `vat` float NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `core_purchase_details`
--

CREATE TABLE `core_purchase_details` (
  `id` int(10) UNSIGNED NOT NULL,
  `purchase_id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `qty` float NOT NULL,
  `price` float NOT NULL,
  `vat` float NOT NULL DEFAULT '0',
  `discount` float NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `core_roles`
--

CREATE TABLE `core_roles` (
  `id` int(10) NOT NULL,
  `name` varchar(20) NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `core_roles`
--

INSERT INTO `core_roles` (`id`, `name`, `updated_at`, `created_at`) VALUES
(1, 'Admin', '2021-12-30 15:10:10', '2021-12-30 09:10:19');

-- --------------------------------------------------------

--
-- Table structure for table `core_sections`
--

CREATE TABLE `core_sections` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `core_sections`
--

INSERT INTO `core_sections` (`id`, `name`) VALUES
(1, 'Raw-products'),
(7, 'Food & Bevareg');

-- --------------------------------------------------------

--
-- Table structure for table `core_status`
--

CREATE TABLE `core_status` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `core_status`
--

INSERT INTO `core_status` (`id`, `name`) VALUES
(1, 'Food-processing'),
(2, 'Sarved-food'),
(3, 'Chaked-out');

-- --------------------------------------------------------

--
-- Table structure for table `core_stocks`
--

CREATE TABLE `core_stocks` (
  `id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `qty` float NOT NULL,
  `transaction_type_id` int(10) UNSIGNED NOT NULL,
  `remark` text,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `warehouse_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `core_stocks`
--

INSERT INTO `core_stocks` (`id`, `product_id`, `qty`, `transaction_type_id`, `remark`, `created_at`, `warehouse_id`) VALUES
(1, 17, -1, 1, 'Order', '0000-00-00 00:00:00', 0),
(2, 17, -1, 1, 'Order', '0000-00-00 00:00:00', 0),
(3, 28, -1, 1, 'Order', '2021-12-28 12:02:36', 0),
(4, 28, -4, 1, 'Order', '2021-12-28 12:02:36', 0),
(5, 17, -2, 1, 'Order', '2021-12-13 05:24:00', 0),
(6, 17, -2, 1, 'Order', '2021-12-13 05:38:13', 0),
(7, 28, -1, 1, 'Order', '2021-12-28 12:02:36', 0),
(8, 17, -1, 1, 'Order', '2021-12-13 05:39:01', 0),
(9, 28, -1, 1, 'Order', '2021-12-28 12:02:36', 0),
(10, 17, -1, 1, 'Order', '2021-12-13 05:41:14', 0),
(11, 28, 17, 1, 'Adjustment', '2021-12-28 12:03:12', 0),
(12, 17, -2, 1, 'Order', '2021-12-15 07:48:59', 0),
(13, 20, -5, 1, 'Adjustment', '2021-12-28 06:49:11', 0),
(14, 20, 50, 1, 'Adjustment', '2021-12-28 06:54:21', 0),
(15, 28, 70, 1, 'Adjustment', '2021-12-28 07:13:51', 0),
(16, 20, 30, 1, 'Adjustment', '2021-12-28 07:13:51', 0),
(17, 28, -1, 1, 'Order', '2022-01-06 01:39:11', 0),
(18, 29, -1, 1, 'Order', '2022-01-06 01:39:11', 0),
(19, 29, -1, 1, 'Order', '2022-01-06 01:43:37', 0),
(20, 28, -1, 1, 'Order', '2022-01-06 01:43:37', 0),
(21, 20, -1, 1, 'Order', '2022-01-06 01:43:37', 0),
(22, 28, -10, 1, 'Order', '2022-01-06 04:14:42', 0),
(23, 30, -1, 1, 'Order', '2022-01-07 22:05:54', 0),
(24, 31, -1, 1, 'Order', '2022-01-07 22:05:54', 0),
(25, 20, -1, 1, 'Order', '2022-01-07 22:05:54', 0),
(26, 29, -1, 1, 'Order', '2022-01-07 22:06:58', 0),
(27, 20, -1, 1, 'Order', '2022-01-07 22:06:58', 0),
(28, 30, -1, 1, 'Order', '2022-01-07 22:06:58', 0),
(29, 32, -1, 1, 'Order', '2022-01-07 22:06:58', 0),
(30, 29, -1, 1, 'Order', '2022-01-07 22:07:27', 0),
(31, 28, -1, 1, 'Order', '2022-01-07 22:07:27', 0),
(32, 31, -1, 1, 'Order', '2022-01-07 22:07:27', 0),
(33, 32, -2, 1, 'Order', '2022-01-07 22:07:27', 0),
(34, 30, -1, 1, 'Order', '2022-01-07 22:07:27', 0),
(35, 20, -1, 1, 'Order', '2022-01-07 22:07:27', 0),
(36, 1, -1, 1, 'Order', '0000-00-00 00:00:00', 0),
(37, 3, -2, 1, 'Order', '0000-00-00 00:00:00', 0),
(38, 3, -1, 1, 'Order', '0000-00-00 00:00:00', 0),
(39, 3, -1, 1, 'Order', '0000-00-00 00:00:00', 0),
(40, 1, -1, 1, 'Order', '0000-00-00 00:00:00', 0),
(41, 3, -1, 1, 'Order', '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `core_stock_adjustments`
--

CREATE TABLE `core_stock_adjustments` (
  `id` int(10) UNSIGNED NOT NULL,
  `adjustment_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `user_id` int(10) UNSIGNED NOT NULL,
  `remark` text NOT NULL,
  `adjustment_type_id` int(10) UNSIGNED NOT NULL,
  `werehouse_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `core_stock_adjustments`
--

INSERT INTO `core_stock_adjustments` (`id`, `adjustment_at`, `user_id`, `remark`, `adjustment_type_id`, `werehouse_id`) VALUES
(1, '2021-12-27 18:00:00', 1, 'ddd', 2, 1),
(2, '2021-12-27 18:00:00', 1, 'ddd', 2, 1),
(3, '2021-12-27 18:00:00', 1, 'ddddfd', 6, 1),
(4, '2021-12-27 18:00:00', 1, 'NA', 6, 2);

-- --------------------------------------------------------

--
-- Table structure for table `core_stock_adjustment_details`
--

CREATE TABLE `core_stock_adjustment_details` (
  `id` int(10) UNSIGNED NOT NULL,
  `adjustment_id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `qty` float NOT NULL,
  `price` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `core_stock_adjustment_details`
--

INSERT INTO `core_stock_adjustment_details` (`id`, `adjustment_id`, `product_id`, `qty`, `price`) VALUES
(1, 2, 20, 5, 400),
(2, 3, 20, 50, 400),
(3, 4, 28, 70, 6650),
(4, 4, 20, 30, 300);

-- --------------------------------------------------------

--
-- Table structure for table `core_stock_adjustment_types`
--

CREATE TABLE `core_stock_adjustment_types` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(45) NOT NULL,
  `factor` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `core_stock_adjustment_types`
--

INSERT INTO `core_stock_adjustment_types` (`id`, `name`, `factor`) VALUES
(1, 'Is Outdated', -1),
(2, 'Is Damaged', -1),
(3, 'Material Missing', -1),
(4, 'Product Is Obsolete', -1),
(5, 'Existing Inventory', 1),
(6, 'Fixed/Found Inventory', 1);

-- --------------------------------------------------------

--
-- Table structure for table `core_suppliers`
--

CREATE TABLE `core_suppliers` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(45) NOT NULL,
  `mobile` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `core_suppliers`
--

INSERT INTO `core_suppliers` (`id`, `name`, `mobile`, `email`) VALUES
(1, 'Md. Shahin', '34223423455444', 'shahin@yahoo.com'),
(2, 'Tauhid Imdad', '343254354235433', 'tauhid@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `core_tables`
--

CREATE TABLE `core_tables` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(45) NOT NULL,
  `capacity` int(10) UNSIGNED NOT NULL,
  `person_id` int(10) UNSIGNED NOT NULL,
  `available_id` int(10) UNSIGNED NOT NULL,
  `status_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `core_tables`
--

INSERT INTO `core_tables` (`id`, `name`, `capacity`, `person_id`, `available_id`, `status_id`) VALUES
(1, 'Solo Delight', 6, 1, 1, 1),
(2, '2wo Temptations', 8, 1, 1, 1),
(3, '3hree Cheers', 6, 1, 1, 1),
(4, '4our Feast', 6, 2, 1, 1),
(5, '5ive Flavors', 6, 2, 1, 1),
(6, '6ix Senses', 6, 2, 1, 1),
(7, 'Lucky 7 Lounge', 6, 3, 1, 1),
(8, '8ight Delights', 8, 3, 1, 1),
(9, '9ine Tastes', 6, 3, 1, 1),
(10, '10 Infinity Bites', 8, 3, 1, 1),
(11, '11 Prime Table', 8, 4, 1, 1),
(12, '12elve Harmony', 4, 2, 1, 1),
(13, '13irteen Palates', 4, 4, 1, 1),
(14, 'Zero Gravity Dining', 4, 5, 1, 1),
(15, '15thteen Fusion', 4, 6, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `core_tasks`
--

CREATE TABLE `core_tasks` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(45) NOT NULL,
  `task_types_id` int(10) UNSIGNED NOT NULL,
  `departments_id` int(10) UNSIGNED NOT NULL,
  `duretion` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `core_tasks`
--

INSERT INTO `core_tasks` (`id`, `name`, `task_types_id`, `departments_id`, `duretion`) VALUES
(1, 'Akram Hoshen', 1, 2, 8),
(2, 'Bristy', 1, 3, 9);

-- --------------------------------------------------------

--
-- Table structure for table `core_task_types`
--

CREATE TABLE `core_task_types` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `core_task_types`
--

INSERT INTO `core_task_types` (`id`, `name`) VALUES
(1, 'Reguler '),
(2, 'Ireguler');

-- --------------------------------------------------------

--
-- Table structure for table `core_thanas`
--

CREATE TABLE `core_thanas` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(45) NOT NULL,
  `district_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `core_thanas`
--

INSERT INTO `core_thanas` (`id`, `name`, `district_id`) VALUES
(1, 'Savar', 7),
(2, 'Mirpur', 7),
(3, 'Sonargaon', 1),
(4, 'Ruppur', 1),
(5, 'Maizdi', 2),
(6, 'Sangol', 6);

-- --------------------------------------------------------

--
-- Table structure for table `core_transaction_types`
--

CREATE TABLE `core_transaction_types` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `core_transaction_types`
--

INSERT INTO `core_transaction_types` (`id`, `name`) VALUES
(1, 'Sales Order'),
(2, 'Sales Return'),
(3, 'Purchase Order'),
(4, 'Purchase Return'),
(5, 'Positive Stock Adjustment'),
(6, 'Negative Stock Adjustment');

-- --------------------------------------------------------

--
-- Table structure for table `core_uom`
--

CREATE TABLE `core_uom` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `core_uom`
--

INSERT INTO `core_uom` (`id`, `name`) VALUES
(1, 'Piece'),
(2, 'Kg'),
(3, 'Pack'),
(4, 'Litter'),
(5, 'Gram');

-- --------------------------------------------------------

--
-- Table structure for table `core_users`
--

CREATE TABLE `core_users` (
  `id` int(10) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `role_id` int(10) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `full_name` varchar(50) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `photo` varchar(50) DEFAULT NULL,
  `verify_code` varchar(50) DEFAULT NULL,
  `inactive` tinyint(1) UNSIGNED DEFAULT '1',
  `mobile` varchar(50) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `core_users`
--

INSERT INTO `core_users` (`id`, `username`, `role_id`, `password`, `email`, `full_name`, `created_at`, `photo`, `verify_code`, `inactive`, `mobile`, `updated_at`) VALUES
(91, 'admin', 1, '111111', 'akramhoshen1996@gmail.com', 'Md. Akram Hoshen', '2024-03-27 23:24:33', '91.jpg', '555', 0, '01761435967', '0000-00-00 00:00:00'),
(127, 'Towhid', 1, '111111', 'towhid1@outlook.com', 'Mohammad Towhidul Islam', '2022-02-15 15:00:46', '127.jpg', '45354353', 0, '34324324', '2022-02-15 21:00:46'),
(128, 'Sawpna', 1, '333', 'swapna@yahoo.com', 'Sawpna Akter', '2022-02-15 14:59:39', '128.jpg', '45354353333', 0, '34343434', '2022-02-15 20:59:39'),
(129, 'Kamrul', 1, '111111', 'kamrul@yahoo.com', 'Kamrul', '2022-02-15 14:59:57', '129.jpg', '45354353333', 0, '323333333333', '2022-02-15 20:59:57'),
(131, 'Forhad', 1, '33333', 'forhad@yahoo.com', 'Forhad Hassan', '2021-12-30 09:24:19', '131.jpg', '4535435333333', 0, '32333333', NULL),
(132, 'Mujahid', 1, '343434', 'robiul@yahoo.com', 'Mujahid Islam', '2021-12-30 09:07:22', '132.jpg', '4535435333333', 0, '2343243242', '2021-12-30 05:45:24');

-- --------------------------------------------------------

--
-- Table structure for table `core_view_order`
--

CREATE TABLE `core_view_order` (
  `id` int(10) UNSIGNED NOT NULL,
  `order_id` int(10) UNSIGNED NOT NULL,
  `order_details_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `core_warehouses`
--

CREATE TABLE `core_warehouses` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(45) NOT NULL,
  `city` varchar(45) NOT NULL,
  `contact` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `core_warehouses`
--

INSERT INTO `core_warehouses` (`id`, `name`, `city`, `contact`) VALUES
(1, 'Tajgon', 'Dhaka', '4543534534'),
(2, 'Rangpur', 'Rangpur', '324242342'),
(3, 'Badda', 'Rampura', '3434334324');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `core_availables`
--
ALTER TABLE `core_availables`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `core_contacts`
--
ALTER TABLE `core_contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `core_contact_categories`
--
ALTER TABLE `core_contact_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `core_cosmetics`
--
ALTER TABLE `core_cosmetics`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `core_cosmetics_categories`
--
ALTER TABLE `core_cosmetics_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `core_customers`
--
ALTER TABLE `core_customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `core_departments`
--
ALTER TABLE `core_departments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `core_districts`
--
ALTER TABLE `core_districts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `core_divisions`
--
ALTER TABLE `core_divisions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `core_employees`
--
ALTER TABLE `core_employees`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `core_manufacturers`
--
ALTER TABLE `core_manufacturers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `core_orders`
--
ALTER TABLE `core_orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `core_order_details`
--
ALTER TABLE `core_order_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `core_persons`
--
ALTER TABLE `core_persons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `core_positions`
--
ALTER TABLE `core_positions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `core_pro`
--
ALTER TABLE `core_pro`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uni_barcode` (`barcode`),
  ADD UNIQUE KEY `uni_name` (`name`);

--
-- Indexes for table `core_products`
--
ALTER TABLE `core_products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `core_product_categories`
--
ALTER TABLE `core_product_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `core_product_categories0`
--
ALTER TABLE `core_product_categories0`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `core_product_sections`
--
ALTER TABLE `core_product_sections`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `core_product_units`
--
ALTER TABLE `core_product_units`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `core_purchases`
--
ALTER TABLE `core_purchases`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `core_purchase_details`
--
ALTER TABLE `core_purchase_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `core_roles`
--
ALTER TABLE `core_roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `core_sections`
--
ALTER TABLE `core_sections`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `core_status`
--
ALTER TABLE `core_status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `core_stocks`
--
ALTER TABLE `core_stocks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `core_stock_adjustments`
--
ALTER TABLE `core_stock_adjustments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `core_stock_adjustment_details`
--
ALTER TABLE `core_stock_adjustment_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `core_stock_adjustment_types`
--
ALTER TABLE `core_stock_adjustment_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `core_suppliers`
--
ALTER TABLE `core_suppliers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `core_tables`
--
ALTER TABLE `core_tables`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `core_tasks`
--
ALTER TABLE `core_tasks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `core_task_types`
--
ALTER TABLE `core_task_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `core_thanas`
--
ALTER TABLE `core_thanas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `core_transaction_types`
--
ALTER TABLE `core_transaction_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `core_uom`
--
ALTER TABLE `core_uom`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `core_users`
--
ALTER TABLE `core_users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `username_2` (`username`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `mobile` (`mobile`);

--
-- Indexes for table `core_view_order`
--
ALTER TABLE `core_view_order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `core_warehouses`
--
ALTER TABLE `core_warehouses`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `core_availables`
--
ALTER TABLE `core_availables`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `core_contacts`
--
ALTER TABLE `core_contacts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `core_contact_categories`
--
ALTER TABLE `core_contact_categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `core_cosmetics`
--
ALTER TABLE `core_cosmetics`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `core_cosmetics_categories`
--
ALTER TABLE `core_cosmetics_categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `core_customers`
--
ALTER TABLE `core_customers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `core_departments`
--
ALTER TABLE `core_departments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `core_districts`
--
ALTER TABLE `core_districts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `core_divisions`
--
ALTER TABLE `core_divisions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `core_employees`
--
ALTER TABLE `core_employees`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `core_manufacturers`
--
ALTER TABLE `core_manufacturers`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `core_orders`
--
ALTER TABLE `core_orders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `core_order_details`
--
ALTER TABLE `core_order_details`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `core_persons`
--
ALTER TABLE `core_persons`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `core_positions`
--
ALTER TABLE `core_positions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `core_pro`
--
ALTER TABLE `core_pro`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `core_products`
--
ALTER TABLE `core_products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `core_product_categories`
--
ALTER TABLE `core_product_categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `core_product_categories0`
--
ALTER TABLE `core_product_categories0`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `core_product_sections`
--
ALTER TABLE `core_product_sections`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `core_product_units`
--
ALTER TABLE `core_product_units`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `core_purchases`
--
ALTER TABLE `core_purchases`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `core_purchase_details`
--
ALTER TABLE `core_purchase_details`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `core_roles`
--
ALTER TABLE `core_roles`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `core_sections`
--
ALTER TABLE `core_sections`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `core_status`
--
ALTER TABLE `core_status`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `core_stocks`
--
ALTER TABLE `core_stocks`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `core_stock_adjustments`
--
ALTER TABLE `core_stock_adjustments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `core_stock_adjustment_details`
--
ALTER TABLE `core_stock_adjustment_details`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `core_stock_adjustment_types`
--
ALTER TABLE `core_stock_adjustment_types`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `core_suppliers`
--
ALTER TABLE `core_suppliers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `core_tables`
--
ALTER TABLE `core_tables`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `core_tasks`
--
ALTER TABLE `core_tasks`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `core_task_types`
--
ALTER TABLE `core_task_types`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `core_thanas`
--
ALTER TABLE `core_thanas`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `core_transaction_types`
--
ALTER TABLE `core_transaction_types`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `core_uom`
--
ALTER TABLE `core_uom`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `core_users`
--
ALTER TABLE `core_users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=146;

--
-- AUTO_INCREMENT for table `core_view_order`
--
ALTER TABLE `core_view_order`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `core_warehouses`
--
ALTER TABLE `core_warehouses`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
