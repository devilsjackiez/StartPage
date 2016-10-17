-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 07, 2016 at 05:25 AM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `start_page`
--
CREATE DATABASE IF NOT EXISTS `startpage` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `startpage`;

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

DROP TABLE IF EXISTS `brands`;
CREATE TABLE `brands` (
  `id_brands` int(11) NOT NULL,
  `name` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id_brands`, `name`) VALUES
(1001, 'CLBS'),
(1002, 'Cando'),
(1003, 'DBS'),
(1004, 'ZQS');

-- --------------------------------------------------------

--
-- Table structure for table `brand_role_tool`
--

DROP TABLE IF EXISTS `brand_role_tool`;
CREATE TABLE `brand_role_tool` (
  `id_brand_role_tool` int(11) NOT NULL,
  `id_role` int(11) NOT NULL,
  `id_brand` int(11) NOT NULL,
  `id_tool` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `brand_role_tool`
--

INSERT INTO `brand_role_tool` (`id_brand_role_tool`, `id_role`, `id_brand`, `id_tool`) VALUES
(1025, 1, 1001, 1),
(1026, 1, 1001, 2),
(1027, 1, 1001, 3),
(1028, 1, 1001, 4),
(1030, 1, 1001, 6),
(814, 1, 1002, 1),
(815, 1, 1002, 2),
(816, 1, 1002, 3),
(817, 1, 1002, 4),
(613, 1, 1003, 1),
(614, 1, 1003, 2),
(615, 1, 1003, 3),
(646, 1, 1004, 1),
(647, 1, 1004, 2),
(648, 1, 1004, 3),
(649, 1, 1004, 4),
(958, 2, 1001, 1),
(959, 2, 1001, 2),
(960, 2, 1001, 3),
(961, 2, 1001, 4),
(504, 2, 1003, 2),
(505, 2, 1003, 3),
(506, 2, 1003, 4),
(981, 3, 1001, 1),
(979, 3, 1001, 4),
(1018, 4, 1001, 1),
(313, 4, 1002, 1),
(314, 4, 1002, 2),
(315, 4, 1002, 3),
(507, 4, 1003, 1),
(508, 4, 1003, 2),
(509, 4, 1003, 3),
(1040, 5, 1001, 1),
(1044, 5, 1001, 2),
(1041, 5, 1001, 3),
(1042, 5, 1001, 4),
(1043, 5, 1001, 6),
(1045, 5, 1001, 7),
(1051, 6, 1001, 1),
(1052, 6, 1001, 2),
(1053, 6, 1001, 3),
(1054, 6, 1001, 4),
(1055, 6, 1001, 6),
(1056, 6, 1001, 7);

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

DROP TABLE IF EXISTS `employee`;
CREATE TABLE `employee` (
  `id_employee` int(11) NOT NULL DEFAULT '0',
  `name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_brand` int(11) DEFAULT NULL,
  `username` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_role` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`id_employee`, `name`, `id_brand`, `username`, `password`, `id_role`) VALUES
(1, 'Administrator', 1001, 'admin', 'admin', 1),
(2, 'Pim', 1002, 'pim', 'pim', 1),
(4, 'Jang', 1004, 'ta', 'jang', 2),
(5, 'Jackrin Patanasutakit', 1001, 'j.patanasutakit', 'baynalove', 1);

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

DROP TABLE IF EXISTS `role`;
CREATE TABLE `role` (
  `id_role` int(11) NOT NULL,
  `name` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id_role`, `name`) VALUES
(1, 'Agent'),
(2, 'Team Leader'),
(3, 'HR'),
(4, 'Trainer'),
(5, 'Manager'),
(6, 'Non-Agent'),
(7, 'Customer Support');

-- --------------------------------------------------------

--
-- Table structure for table `test-data`
--

DROP TABLE IF EXISTS `test-data`;
CREATE TABLE `test-data` (
  `id` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tools`
--

DROP TABLE IF EXISTS `tools`;
CREATE TABLE `tools` (
  `id_tools` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `info` varchar(213) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `img` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tools`
--

INSERT INTO `tools` (`id_tools`, `name`, `info`, `url`, `img`) VALUES
(1, 'Confluence', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes.', 'http://confluence.berlin-hq.local/', 'uploads/welcome.png'),
(2, 'QAS', 'The Quality Assurance Scheme (QAS) is a voluntary accreditation scheme for Organisations (or identifiable parts of an organisation) that employ one or more members of the Institute and Faculty of Actuaries (IFoA).', 'http://qas.coast.ebuero.de/qas/web/frontend/web/', 'uploads/SWPN.jpg'),
(3, 'CAI', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes.', 'http://www.google.co.th/', 'uploads/SWPN.jpg'),
(4, 'CLBS Library', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes.', 'http://clbsapps.berlin-hq.local/clbslibrary/', 'uploads/Library-ICON.png'),
(6, 'CLBS Food Order', 'Order food for eat.', 'http://foodorder/', 'uploads/Foodorder.png'),
(7, 'CLBS Massage Calendar', 'Massage Service for employee in CLBS Company', 'http://vmwinweb05.berlin-hq.local/massagecalendar/', 'uploads/icon-massage-w400h400@2x.png');

-- --------------------------------------------------------

--
-- Table structure for table `tool_role`
--

DROP TABLE IF EXISTS `tool_role`;
CREATE TABLE `tool_role` (
  `id_tool_role` int(11) NOT NULL,
  `id_roles` int(11) NOT NULL,
  `id_tools` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tool_role`
--

INSERT INTO `tool_role` (`id_tool_role`, `id_roles`, `id_tools`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 1, 3),
(4, 1, 4),
(5, 1, 5),
(6, 1, 6),
(7, 2, 1),
(8, 2, 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id_brands`);

--
-- Indexes for table `brand_role_tool`
--
ALTER TABLE `brand_role_tool`
  ADD PRIMARY KEY (`id_brand_role_tool`),
  ADD UNIQUE KEY `uq_brand_role_tool` (`id_role`,`id_brand`,`id_tool`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`id_employee`),
  ADD UNIQUE KEY `id_employee` (`id_employee`);

--
-- Indexes for table `tools`
--
ALTER TABLE `tools`
  ADD PRIMARY KEY (`id_tools`);

--
-- Indexes for table `tool_role`
--
ALTER TABLE `tool_role`
  ADD PRIMARY KEY (`id_tool_role`),
  ADD UNIQUE KEY `uq_tool_role` (`id_roles`,`id_tools`),
  ADD KEY `id_roles` (`id_roles`,`id_tools`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id_brands` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1005;
--
-- AUTO_INCREMENT for table `brand_role_tool`
--
ALTER TABLE `brand_role_tool`
  MODIFY `id_brand_role_tool` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1057;
--
-- AUTO_INCREMENT for table `tools`
--
ALTER TABLE `tools`
  MODIFY `id_tools` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `tool_role`
--
ALTER TABLE `tool_role`
  MODIFY `id_tool_role` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
