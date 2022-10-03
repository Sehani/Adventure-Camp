-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jul 10, 2021 at 02:50 PM
-- Server version: 5.7.31
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `database`
--

-- --------------------------------------------------------

--
-- Table structure for table `administrator`
--

DROP TABLE IF EXISTS `administrator`;
CREATE TABLE IF NOT EXISTS `administrator` (
  `userid` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `firstname` varchar(255) DEFAULT NULL,
  `lastname` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT 'active',
  `role` varchar(255) DEFAULT NULL,
  `userImg` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`userid`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `administrator`
--

INSERT INTO `administrator` (`userid`, `username`, `password`, `firstname`, `lastname`, `email`, `status`, `role`, `userImg`) VALUES
(1, 'admin', 'admin123', 'Olympia', 'Olympix', 'olympia@gmail.com', 'active', 'admin', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `all_rooms`
--

DROP TABLE IF EXISTS `all_rooms`;
CREATE TABLE IF NOT EXISTS `all_rooms` (
  `room_no` int(2) NOT NULL AUTO_INCREMENT,
  `Room_type` varchar(50) NOT NULL,
  PRIMARY KEY (`room_no`)
) ENGINE=MyISAM AUTO_INCREMENT=37 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `all_rooms`
--

INSERT INTO `all_rooms` (`room_no`, `Room_type`) VALUES
(1, 'Single Room Non AC'),
(2, 'Single Room Non AC'),
(3, 'Single Room Non AC'),
(4, 'Single Room Non AC'),
(5, 'Single Room Non AC'),
(6, 'Single Room Non AC'),
(7, 'Single Room Non AC'),
(8, 'Single Room Non AC'),
(9, 'Single Room AC'),
(10, 'Single Room AC'),
(11, 'Single Room AC'),
(12, 'Single Room AC'),
(13, 'Single Room AC'),
(14, 'Double Room Non AC'),
(15, 'Double Room Non AC'),
(16, 'Double Room Non AC'),
(17, 'Double Room Non AC'),
(18, 'Double Room Non AC'),
(19, 'Double Room Non AC'),
(20, 'Double Room Non AC'),
(21, 'Double Room AC'),
(22, 'Double Room AC'),
(23, 'Double Room AC'),
(24, 'Double Room AC'),
(25, 'Four Person Room Non AC'),
(26, 'Four Person Room Non AC'),
(27, 'Four Person Room Non AC'),
(28, 'Four Person Room Non AC'),
(29, 'Four Person Room Non AC'),
(30, 'Four Person Room Non AC'),
(31, 'Four Person Room AC'),
(32, 'Four Person Room AC'),
(33, 'Four Person Room AC'),
(34, 'Ten Person Room Non AC'),
(35, 'Ten Person Room Non AC'),
(36, 'Twenty Person Hall Non AC');

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

DROP TABLE IF EXISTS `booking`;
CREATE TABLE IF NOT EXISTS `booking` (
  `booking_id` int(11) NOT NULL AUTO_INCREMENT,
  `customer_id` int(11) DEFAULT NULL,
  `pack_id` int(11) DEFAULT NULL,
  `paid_status` varchar(255) DEFAULT NULL,
  `due_amount` varchar(40) DEFAULT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `contact_number` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `no_of_rooms` varchar(50) DEFAULT NULL,
  `no_of_tents` varchar(50) DEFAULT NULL,
  `no_of_people` varchar(255) DEFAULT NULL,
  `adults` varchar(255) DEFAULT NULL,
  `childern` varchar(255) DEFAULT NULL,
  `room_type` varchar(50) DEFAULT NULL,
  `tent_type` varchar(50) DEFAULT NULL,
  `meals_type` varchar(50) DEFAULT NULL,
  `check_in_date` date DEFAULT NULL,
  `check_out_date` date DEFAULT NULL,
  `add_date` date DEFAULT NULL,
  `update_date` datetime DEFAULT NULL,
  `status` varchar(255) DEFAULT 'active',
  PRIMARY KEY (`booking_id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`booking_id`, `customer_id`, `pack_id`, `paid_status`, `due_amount`, `first_name`, `last_name`, `contact_number`, `email`, `no_of_rooms`, `no_of_tents`, `no_of_people`, `adults`, `childern`, `room_type`, `tent_type`, `meals_type`, `check_in_date`, `check_out_date`, `add_date`, `update_date`, `status`) VALUES
(1, 1, 1000, 'paid', '2673', 'Udaya', 'De Zoysa', '0715375179', 'udaya@ozonedesk.com', '4', '4', '8', '4', '4', '1', '1', '1', '2021-07-08', '2021-07-11', '2021-07-08', NULL, 'active'),
(2, 1, 1001, 'unpaid', '1984', 'Udaya', 'De Zoysa', '0715375179', 'udaya@ozonedesk.com', '4', '4', '8', '4', '4', '1', '1', '1', '2021-07-08', '2021-07-09', '2021-07-08', NULL, 'active'),
(3, 1, 1001, 'unpaid', '2392', 'Udaya', 'De Zoysa', '0715375179', 'udaya@ozonedesk.com', '4', '4', '8', '4', '4', '2', '2', '3', '2021-07-08', '2021-07-19', '2021-07-08', NULL, 'active'),
(4, 1, 1001, 'unpaid', '1984', 'Udaya', 'De Zoysa', '0715375179', 'udaya@ozonedesk.com', '4', '4', '8', '4', '4', '1', '1', '1', '2021-07-08', '2021-07-17', '2021-07-08', NULL, 'active'),
(5, 1, 1001, 'unpaid', '1984', 'Udaya', 'De Zoysa', '0715375179', 'udaya@ozonedesk.com', '4', '4', '8', '4', '4', '1', '1', '1', '2021-07-02', '2021-07-15', '2021-07-08', NULL, 'active'),
(6, 1, 1001, 'unpaid', '830', 'Udaya', 'De Zoysa', '0715375179', 'udaya@ozonedesk.com', '2', '2', '4', '2', '2', '1', '1', '1', '2021-07-08', '2021-07-08', '2021-07-08', NULL, 'active'),
(7, 1, 1001, 'unpaid', '2784', 'Udaya', 'De Zoysa', '0715375179', 'udaya@ozonedesk.com', '4', '4', '8', '4', '4', '1', '1', '1', '2021-07-08', '2021-07-13', '2021-07-08', NULL, 'active'),
(8, 1, 1001, 'unpaid', '2824', 'Amila', 'Sadaruwan', '0715375179', 'amila@ozonedesk.com', '4', '4', '8', '4', '4', '1', '1', '1', '2021-07-08', '2021-07-10', '2021-07-08', NULL, 'active'),
(9, 1, 1001, 'unpaid', '2576', 'Udaya', 'De Zoysa', '0715375179', 'udaya@ozonedesk.com', '4', '4', '8', '4', '4', '1', '1', '1', '2021-07-02', '2021-07-14', '2021-07-08', NULL, 'active'),
(10, 2, 1000, 'unpaid', '4695', 'Thisara', 'Dilshani', '0094123456789', 'thisaradilshani821@gmail.com', '2', '3', '10', '6', '4', '1', '1', '1', '2021-07-12', '2021-07-14', '2021-07-10', '2021-07-10 20:04:04', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `booking_activity`
--

DROP TABLE IF EXISTS `booking_activity`;
CREATE TABLE IF NOT EXISTS `booking_activity` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `book_id` int(11) DEFAULT NULL,
  `activity_id` int(11) DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `booking_activity`
--

INSERT INTO `booking_activity` (`id`, `book_id`, `activity_id`, `date`) VALUES
(1, 1, 2, '2021-07-08 04:56:46'),
(2, 1, 3, '2021-07-08 04:56:46'),
(3, 1, 4, '2021-07-08 04:56:46'),
(4, 2, 4, '2021-07-08 05:31:03'),
(5, 2, 9, '2021-07-08 05:31:03'),
(6, 3, 3, '2021-07-08 05:32:10'),
(7, 3, 4, '2021-07-08 05:32:10'),
(8, 4, 2, '2021-07-08 05:33:38'),
(9, 4, 13, '2021-07-08 05:33:38'),
(10, 5, 2, '2021-07-08 05:34:19'),
(11, 5, 5, '2021-07-08 05:34:19'),
(12, 5, 11, '2021-07-08 05:34:19'),
(13, 6, 2, '2021-07-08 05:35:36'),
(14, 6, 3, '2021-07-08 05:35:36'),
(15, 7, 11, '2021-07-08 05:37:27'),
(16, 7, 12, '2021-07-08 05:37:27'),
(17, 8, 2, '2021-07-08 05:39:24'),
(18, 8, 4, '2021-07-08 05:39:24'),
(19, 9, 2, '2021-07-08 05:42:08'),
(20, 9, 3, '2021-07-08 05:42:08'),
(21, 10, 16, '2021-07-10 19:57:38');

-- --------------------------------------------------------

--
-- Table structure for table `camp_activity`
--

DROP TABLE IF EXISTS `camp_activity`;
CREATE TABLE IF NOT EXISTS `camp_activity` (
  `aid` int(11) NOT NULL AUTO_INCREMENT,
  `ac_name` varchar(255) DEFAULT NULL,
  `ac_price` varchar(255) DEFAULT NULL,
  `ac_status` varchar(255) DEFAULT NULL,
  `ac_desc` varchar(255) DEFAULT NULL,
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`aid`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `camp_activity`
--

INSERT INTO `camp_activity` (`aid`, `ac_name`, `ac_price`, `ac_status`, `ac_desc`, `date_created`) VALUES
(1, 'White Water Rafting', '150', 'active', 'Rafting and whitewater rafting are recreational outdoor activities which use an inflatable raft to navigate a river or other body of water. This is often done on whitewater or different degrees of rough water. Dealing with risk is often a part of the expe', '2021-07-02 08:48:16'),
(2, 'Waterfall trekking', '50', 'active', NULL, '2021-07-02 08:27:06'),
(3, 'Flat water rafting', '24', 'active', 'ewerwe ', '2021-07-02 08:00:24'),
(4, 'River expeditions', '55', 'active', '', '2021-07-02 08:00:52'),
(5, 'Waterfall abseiling', '75', 'active', '', '2021-07-02 08:02:16'),
(6, 'Boat Safari', '30', 'active', '', '2021-07-02 08:02:34'),
(7, 'Hot air baloon', '125', 'active', '', '2021-07-02 08:02:45'),
(8, 'Zip lining', '32', 'active', '', '2021-07-02 08:02:55'),
(9, 'Paragliding', '100', 'active', '', '2021-07-02 08:03:07'),
(10, 'Hiking', '45', 'active', '', '2021-07-02 08:03:18'),
(11, 'Forest trekking', '50', 'active', '', '2021-07-02 08:03:28'),
(12, 'Cycling', '50', 'active', '', '2021-07-02 08:03:44'),
(13, 'Bird watching', '20', 'active', '', '2021-07-02 08:03:53'),
(14, 'Archery', '15', 'active', '', '2021-07-02 08:04:10'),
(15, 'Safari', '42', 'active', '', '2021-07-02 08:04:22'),
(16, 'Night Camping', '30', 'active', 'Nigth Capmign for 10 person ', '2021-07-02 12:15:20');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

DROP TABLE IF EXISTS `contact`;
CREATE TABLE IF NOT EXISTS `contact` (
  `name` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `message` varchar(300) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

DROP TABLE IF EXISTS `customer`;
CREATE TABLE IF NOT EXISTS `customer` (
  `Customer_id` varchar(8) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Contact_no` int(10) NOT NULL,
  `Date_of_Birth` date NOT NULL,
  `Gender` varchar(7) NOT NULL,
  `Age` int(3) NOT NULL,
  PRIMARY KEY (`Customer_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `meals`
--

DROP TABLE IF EXISTS `meals`;
CREATE TABLE IF NOT EXISTS `meals` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Meals_type` varchar(50) NOT NULL,
  `price` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `meals`
--

INSERT INTO `meals` (`id`, `Meals_type`, `price`) VALUES
(1, 'Breakfast ', '2.50'),
(2, 'Lunch ', '3.00'),
(3, 'Dinner', '3.50'),
(4, 'None', '0.00'),
(5, 'Breakfast + Lunch', '5.50'),
(6, 'Lunch + Dinner', '6.50'),
(7, 'Breakfast + Dinner', '6.00'),
(8, 'Breakfast + Lunch + Dinner', '9.00');

-- --------------------------------------------------------

--
-- Table structure for table `packages`
--

DROP TABLE IF EXISTS `packages`;
CREATE TABLE IF NOT EXISTS `packages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pack_name` varchar(255) DEFAULT NULL,
  `pack_type` varchar(255) DEFAULT NULL,
  `pack_price` varchar(255) DEFAULT NULL,
  `pack_details` varchar(255) DEFAULT NULL,
  `pack_status` varchar(255) DEFAULT NULL,
  `pack_img` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1007 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `packages`
--

INSERT INTO `packages` (`id`, `pack_name`, `pack_type`, `pack_price`, `pack_details`, `pack_status`, `pack_img`) VALUES
(1000, 'Package A', 'per person', '200', 'Pick this holiday for a relaxing vacation in Paris and Switzerland. Your tour embarks from Paris. Enjoy an excursion to popular attractions like the iconic Eiffel Tower. After experiencing the beautiful city, you will drive past mustard fields through Bur', 'active', 'userImage/1_1.jpg'),
(1001, 'Package B', 'per person', '142', 'The two-wire zip-line stretches for more than half a kilometer, slides at 80kmph and offers a bird’s-eye view of the beautiful hills of the island.\r\nGet on board at Mini Adam’s Peak and fly over iconic tea estates and lush greenery overlooking the famous ', 'active', 'userImage/8.jpg'),
(1002, 'Package C', 'per person', '167', 'Create unique adventures from Olympia. Each package has a different activities and you can choose various accommodation types. If you stay for one night you would be able to do many adventure and leisure activities.', 'active', 'userImage/9.jpg'),
(1003, 'Package D', 'per person', '166', 'Create unique adventures from Olympia. Each package has a different activities and you can choose various accommodation types. If you stay for one night you would be able to do many adventure and leisure activities.', 'active', 'userImage/a.jpg'),
(1004, 'Package E', 'per person', '260', 'Create unique adventures from Olympia. Each package has a different activities and you can choose various accommodation types. If you stay for one night you would be able to do many adventure and leisure activities.', 'active', 'userImage/9.jpg'),
(1005, 'Package F', 'per person', '110', 'Create unique adventures from Olympia. Each package has a different activities and you can choose various accommodation types. If you stay for one night you would be able to do many adventure and leisure activities.', 'active', 'userImage/11_1.jpg'),
(1006, 'Accommodation only', 'Family Package', '', 'Create unique adventures from Olympia. Each package has a different activities and you can choose various accommodation types. If you stay for one night you would be able to do many adventure and leisure activities.', 'active', 'userImage/room6.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `packages_activity_list`
--

DROP TABLE IF EXISTS `packages_activity_list`;
CREATE TABLE IF NOT EXISTS `packages_activity_list` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `package_id` int(11) DEFAULT NULL,
  `activity_id` int(11) DEFAULT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `addby` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `packages_activity_list`
--

INSERT INTO `packages_activity_list` (`id`, `package_id`, `activity_id`, `date`, `addby`) VALUES
(1, 1000, 1, '2021-07-02 12:17:40', '1'),
(2, 1000, 7, '2021-07-02 12:17:40', '1'),
(3, 1000, 10, '2021-07-02 12:17:40', '1'),
(4, 1000, 16, '2021-07-02 12:17:40', '1'),
(5, 1001, 2, '2021-07-02 18:10:20', '1'),
(6, 1001, 8, '2021-07-02 18:10:20', '1'),
(7, 1001, 14, '2021-07-02 18:10:20', '1'),
(8, 1001, 15, '2021-07-02 18:10:20', '1'),
(9, 1002, 3, '2021-07-10 14:00:02', '2'),
(10, 1002, 9, '2021-07-10 14:00:02', '2'),
(11, 1002, 12, '2021-07-10 14:00:02', '2'),
(12, 1003, 4, '2021-07-10 14:04:12', '2'),
(13, 1003, 5, '2021-07-10 14:04:12', '2'),
(14, 1003, 6, '2021-07-10 14:04:12', '2'),
(15, 1004, 7, '2021-07-10 14:06:27', '2'),
(16, 1004, 8, '2021-07-10 14:06:27', '2'),
(17, 1004, 9, '2021-07-10 14:06:27', '2'),
(18, 1005, 11, '2021-07-10 14:08:05', '2'),
(19, 1005, 12, '2021-07-10 14:08:05', '2'),
(20, 1005, 14, '2021-07-10 14:08:05', '2');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

DROP TABLE IF EXISTS `payments`;
CREATE TABLE IF NOT EXISTS `payments` (
  `pay_id` int(11) NOT NULL AUTO_INCREMENT,
  `customer_id` int(11) DEFAULT NULL,
  `booking_id` int(11) DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `payment_date` datetime DEFAULT NULL,
  `total` varchar(55) DEFAULT NULL,
  `status` varchar(55) DEFAULT NULL,
  PRIMARY KEY (`pay_id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`pay_id`, `customer_id`, `booking_id`, `date`, `payment_date`, `total`, `status`) VALUES
(1, 1, 1, '2021-07-08 04:56:46', '2021-07-08 05:20:19', '2673', 'paid'),
(2, 1, 2, '2021-07-08 05:31:03', NULL, '1984', 'unpaid'),
(3, 1, 3, '2021-07-08 05:32:10', NULL, '2392', 'unpaid'),
(4, 1, 4, '2021-07-08 05:33:38', NULL, '1984', 'unpaid'),
(5, 1, 5, '2021-07-08 05:34:19', NULL, '1984', 'unpaid'),
(6, 1, 6, '2021-07-08 05:35:36', NULL, '830', 'unpaid'),
(7, 1, 7, '2021-07-08 05:37:27', NULL, '2784', 'unpaid'),
(8, 1, 8, '2021-07-08 05:39:24', NULL, '2824', 'unpaid'),
(9, 1, 9, '2021-07-08 05:42:08', NULL, '2576', 'unpaid'),
(10, 2, 10, '2021-07-10 19:57:38', NULL, '4695', 'unpaid');

-- --------------------------------------------------------

--
-- Table structure for table `receiptionist`
--

DROP TABLE IF EXISTS `receiptionist`;
CREATE TABLE IF NOT EXISTS `receiptionist` (
  `Recep_id` varchar(8) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Contact_no` int(10) NOT NULL,
  PRIMARY KEY (`Recep_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

DROP TABLE IF EXISTS `rooms`;
CREATE TABLE IF NOT EXISTS `rooms` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `total_rooms` int(2) DEFAULT NULL,
  `Room_type` varchar(50) NOT NULL,
  `price` varchar(255) DEFAULT NULL,
  `max_guest` int(3) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`id`, `total_rooms`, `Room_type`, `price`, `max_guest`) VALUES
(1, 8, 'Single Room Non AC', '15.00', 1),
(2, 5, 'Single Room AC', '25.00', 1),
(3, 7, 'Double Room Non AC', '20.00', 2),
(4, 4, 'Double Room AC', '35.00', 2),
(5, 6, 'Four Person Room Non AC', '30.00', 4),
(6, 3, 'Four Person Room AC', '40.00', 4),
(7, 2, 'Ten Person Hall Non AC', '60.00', 10),
(8, 1, 'Twenty Person Hall Non AC', '100.00', 20),
(9, 0, 'None', '0.00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tent`
--

DROP TABLE IF EXISTS `tent`;
CREATE TABLE IF NOT EXISTS `tent` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Tent_type` varchar(10) NOT NULL,
  `price` varchar(255) DEFAULT NULL,
  `max_guest` int(3) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tent`
--

INSERT INTO `tent` (`id`, `Tent_type`, `price`, `max_guest`) VALUES
(1, 'XS Tent', '5.25', 1),
(2, 'S tent', '5.50', 2),
(3, 'M tent', '5.75', 4),
(4, 'L tent', '6.50', 6),
(5, 'XL tent', '7.25', 8),
(6, 'None', '0.00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `usertable`
--

DROP TABLE IF EXISTS `usertable`;
CREATE TABLE IF NOT EXISTS `usertable` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `password` varchar(100) NOT NULL,
  `code` mediumint(50) NOT NULL,
  `status` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `usertable`
--

INSERT INTO `usertable` (`id`, `name`, `email`, `password`, `code`, `status`) VALUES
(1, 'Udaya Nadeeshan De Zoysa', 'unzoysa.un@gmail.com', '$2y$10$w3G8tPOINj33ve6g3G0o/ekjwx5GWRBUqrz3EgibheFK6tzKiiuwG', 0, 'verified'),
(2, 'Thisara', 'thisaradilshani821@gmail.com', '$2y$10$hsLFEvtTXK3xliYr1QYvXOlrDelCk2Ac7bI5EZ.KaPl3r4K6CZcEK', 0, 'verified');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
