-- phpMyAdmin SQL Dump
-- version 4.5.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 20, 2021 at 07:14 AM
-- Server version: 5.7.11
-- PHP Version: 5.6.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hores`
--

-- --------------------------------------------------------

--
-- Table structure for table `hores_bookings`
--

CREATE TABLE `hores_bookings` (
  `id` int(11) NOT NULL,
  `booking_id` varchar(25) NOT NULL,
  `client_id` varchar(100) NOT NULL,
  `room_id` int(11) NOT NULL,
  `rooms_booked` int(11) NOT NULL,
  `guests` int(11) NOT NULL,
  `days` int(11) NOT NULL,
  `total_charges` varchar(25) NOT NULL,
  `payment_mode` varchar(15) NOT NULL,
  `check_in_date` varchar(25) NOT NULL,
  `check_in_time` varchar(25) NOT NULL,
  `check_out_date` varchar(25) NOT NULL,
  `check_out_time` varchar(25) NOT NULL,
  `booking_date` varchar(25) NOT NULL,
  `booking_time` varchar(25) NOT NULL,
  `status` varchar(20) NOT NULL,
  `starred` varchar(5) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hores_bookings`
--

INSERT INTO `hores_bookings` (`id`, `booking_id`, `client_id`, `room_id`, `rooms_booked`, `guests`, `days`, `total_charges`, `payment_mode`, `check_in_date`, `check_in_time`, `check_out_date`, `check_out_time`, `booking_date`, `booking_time`, `status`, `starred`) VALUES
(2, '1494787702', '76b1ff592070c5bbb45d480eb9456cd760038117002b0', 443517117, 1, 2, 8, '20000', 'cash', '04/01/2021', '9 : 28 AM', '12/01/2021', '9 : 28 AM', '18/01/2021', '09:30am', 'pending', 'no');

-- --------------------------------------------------------

--
-- Table structure for table `hores_clients`
--

CREATE TABLE `hores_clients` (
  `id` int(11) NOT NULL,
  `client_id` varchar(100) NOT NULL,
  `profile_image` text NOT NULL,
  `profile_image_thumb` text NOT NULL,
  `title` varchar(10) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `password` text NOT NULL,
  `verification_code` varchar(10) NOT NULL,
  `email_verified` varchar(5) NOT NULL,
  `company` varchar(50) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `city` varchar(50) DEFAULT NULL,
  `country` varchar(100) DEFAULT NULL,
  `preferences` text,
  `login_status` varchar(15) NOT NULL,
  `account_status` varchar(15) NOT NULL,
  `date_added` varchar(25) NOT NULL,
  `time_added` varchar(25) NOT NULL,
  `starred` varchar(5) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hores_clients`
--

INSERT INTO `hores_clients` (`id`, `client_id`, `profile_image`, `profile_image_thumb`, `title`, `name`, `email`, `phone`, `password`, `verification_code`, `email_verified`, `company`, `address`, `city`, `country`, `preferences`, `login_status`, `account_status`, `date_added`, `time_added`, `starred`) VALUES
(1, '76b1ff592070c5bbb45d480eb9456cd760038117002b0', 'assets/media/profile_images/profile_image.png', 'assets/media/profile_images/profile_image.png', 'Mr.', 'Code Chizi', 'codechizi@gmail.com', '2541234567', '$2y$10$Sn2oCGANjTJKzzsyFB5RGufIV4XZAq1ZBoLbi9lUo/mRyXodjjdHm', '78789', 'yes', NULL, NULL, NULL, NULL, NULL, 'offline', 'active', '17/01/2021', '3:13am', 'no'),
(2, '29a1df4646cb3417c19994a59a3e022a60054bb826691', 'assets/media/profile_images/profile_image.png', 'assets/media/profile_images/profile_image.png', 'Mr.', 'john doe', 'johndoe@gmail.com', '2546768686', '$2y$10$KaFGi1JUpVuPg4C5xtZmCO.Gwp1WdELqx1IE1IK0vLLDGSTqKy892', '68605', 'no', NULL, NULL, NULL, NULL, NULL, 'offline', 'active', '18/01/2021', '11:50am', 'no');

-- --------------------------------------------------------

--
-- Table structure for table `hores_details`
--

CREATE TABLE `hores_details` (
  `id` int(11) NOT NULL,
  `sys_name` varchar(50) NOT NULL,
  `address` varchar(100) NOT NULL,
  `phone1` varchar(20) NOT NULL,
  `phone2` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `sys_version` varchar(25) NOT NULL,
  `date_added` varchar(25) NOT NULL,
  `time_added` varchar(25) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hores_details`
--

INSERT INTO `hores_details` (`id`, `sys_name`, `address`, `phone1`, `phone2`, `email`, `sys_version`, `date_added`, `time_added`) VALUES
(1, 'fairmont hotel', 'P.O.Box 58581 00200,Nairobi,Kenya', '+25420226500', '+254202216796', 'kenya.reservation@fairmont.com', '1.1', '16/01/2021', '7:20am');

-- --------------------------------------------------------

--
-- Table structure for table `hores_login_time`
--

CREATE TABLE `hores_login_time` (
  `id` int(11) NOT NULL,
  `userid` varchar(100) NOT NULL,
  `login_date` varchar(25) NOT NULL,
  `login_time` varchar(25) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hores_login_time`
--

INSERT INTO `hores_login_time` (`id`, `userid`, `login_date`, `login_time`) VALUES
(1, '0cff77b0236870347688a02acf3e39e85f09b46d525b4', '16/01/2021', '07:36pm'),
(2, '0cff77b0236870347688a02acf3e39e85f09b46d525b4', '16/01/2021', '07:54pm'),
(3, '0cff77b0236870347688a02acf3e39e85f09b46d525b4', '16/01/2021', '08:10pm'),
(4, '0cff77b0236870347688a02acf3e39e85f09b46d525b4', '16/01/2021', '11:58pm'),
(5, '0cff77b0236870347688a02acf3e39e85f09b46d525b4', '17/01/2021', '12:03am'),
(6, '0cff77b0236870347688a02acf3e39e85f09b46d525b4', '17/01/2021', '12:04am'),
(7, '0cff77b0236870347688a02acf3e39e85f09b46d525b4', '17/01/2021', '07:51am'),
(8, '0cff77b0236870347688a02acf3e39e85f09b46d525b4', '17/01/2021', '11:21am'),
(9, '0cff77b0236870347688a02acf3e39e85f09b46d525b4', '17/01/2021', '03:03pm'),
(10, '76b1ff592070c5bbb45d480eb9456cd760038117002b0', '17/01/2021', '07:34pm'),
(11, '76b1ff592070c5bbb45d480eb9456cd760038117002b0', '17/01/2021', '08:07pm'),
(12, '76b1ff592070c5bbb45d480eb9456cd760038117002b0', '18/01/2021', '12:14am'),
(13, '76b1ff592070c5bbb45d480eb9456cd760038117002b0', '18/01/2021', '08:16am'),
(14, '76b1ff592070c5bbb45d480eb9456cd760038117002b0', '18/01/2021', '10:47am'),
(15, '0cff77b0236870347688a02acf3e39e85f09b46d525b4', '18/01/2021', '10:51am'),
(16, '76b1ff592070c5bbb45d480eb9456cd760038117002b0', '18/01/2021', '11:24am'),
(17, '0cff77b0236870347688a02acf3e39e85f09b46d525b4', '18/01/2021', '11:25am'),
(18, '0cff77b0236870347688a02acf3e39e85f09b46d525b4', '18/01/2021', '11:26am'),
(19, '0cff77b0236870347688a02acf3e39e85f09b46d525b4', '18/01/2021', '11:26am'),
(20, '76b1ff592070c5bbb45d480eb9456cd760038117002b0', '18/01/2021', '12:03pm'),
(21, '0cff77b0236870347688a02acf3e39e85f09b46d525b4', '18/01/2021', '12:04pm'),
(22, '76b1ff592070c5bbb45d480eb9456cd760038117002b0', '19/01/2021', '03:55pm'),
(23, '76b1ff592070c5bbb45d480eb9456cd760038117002b0', '20/01/2021', '08:09am'),
(24, '0cff77b0236870347688a02acf3e39e85f09b46d525b4', '20/01/2021', '09:17am'),
(25, '0cff77b0236870347688a02acf3e39e85f09b46d525b4', '20/01/2021', '09:45am'),
(26, '76b1ff592070c5bbb45d480eb9456cd760038117002b0', '20/01/2021', '09:56am'),
(27, '0cff77b0236870347688a02acf3e39e85f09b46d525b4', '20/01/2021', '10:13am');

-- --------------------------------------------------------

--
-- Table structure for table `hores_logout_time`
--

CREATE TABLE `hores_logout_time` (
  `id` int(11) NOT NULL,
  `userid` varchar(100) NOT NULL,
  `logout_date` varchar(25) NOT NULL,
  `logout_time` varchar(25) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hores_logout_time`
--

INSERT INTO `hores_logout_time` (`id`, `userid`, `logout_date`, `logout_time`) VALUES
(1, '76b1ff592070c5bbb45d480eb9456cd760038117002b0', '17/01/2021', '08:04pm'),
(2, '76b1ff592070c5bbb45d480eb9456cd760038117002b0', '18/01/2021', '10:46am'),
(3, '76b1ff592070c5bbb45d480eb9456cd760038117002b0', '18/01/2021', '10:50am'),
(4, '0cff77b0236870347688a02acf3e39e85f09b46d525b4', '18/01/2021', '11:22am'),
(5, '76b1ff592070c5bbb45d480eb9456cd760038117002b0', '18/01/2021', '11:25am'),
(6, '0cff77b0236870347688a02acf3e39e85f09b46d525b4', '18/01/2021', '11:25am'),
(7, '0cff77b0236870347688a02acf3e39e85f09b46d525b4', '18/01/2021', '11:26am'),
(8, '0cff77b0236870347688a02acf3e39e85f09b46d525b4', '18/01/2021', '11:38am'),
(9, '29a1df4646cb3417c19994a59a3e022a60054bb826691', '18/01/2021', '11:50am'),
(10, '76b1ff592070c5bbb45d480eb9456cd760038117002b0', '18/01/2021', '12:04pm'),
(11, '76b1ff592070c5bbb45d480eb9456cd760038117002b0', '20/01/2021', '09:17am'),
(12, '0cff77b0236870347688a02acf3e39e85f09b46d525b4', '20/01/2021', '09:39am'),
(13, '0cff77b0236870347688a02acf3e39e85f09b46d525b4', '20/01/2021', '09:54am'),
(14, '76b1ff592070c5bbb45d480eb9456cd760038117002b0', '20/01/2021', '10:13am'),
(15, '0cff77b0236870347688a02acf3e39e85f09b46d525b4', '20/01/2021', '10:14am');

-- --------------------------------------------------------

--
-- Table structure for table `hores_perm`
--

CREATE TABLE `hores_perm` (
  `id` int(11) NOT NULL,
  `userid` varchar(100) NOT NULL,
  `dashboard` int(11) NOT NULL DEFAULT '0',
  `bookings` int(11) NOT NULL DEFAULT '0',
  `clients` int(11) NOT NULL DEFAULT '0',
  `rooms` int(11) NOT NULL DEFAULT '0',
  `reports` int(11) NOT NULL DEFAULT '0',
  `users` int(11) NOT NULL DEFAULT '0',
  `user_logs` int(11) NOT NULL DEFAULT '0',
  `config` int(11) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hores_perm`
--

INSERT INTO `hores_perm` (`id`, `userid`, `dashboard`, `bookings`, `clients`, `rooms`, `reports`, `users`, `user_logs`, `config`) VALUES
(1, '0cff77b0236870347688a02acf3e39e85f09b46d525b4', 1, 1, 1, 1, 1, 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `hores_reviews`
--

CREATE TABLE `hores_reviews` (
  `id` int(11) NOT NULL,
  `review_id` varchar(25) NOT NULL,
  `room_id` varchar(25) NOT NULL,
  `client_id` varchar(100) NOT NULL,
  `rating` int(11) NOT NULL,
  `review` text NOT NULL,
  `review_date` varchar(25) NOT NULL,
  `review_time` varchar(25) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `hores_rooms`
--

CREATE TABLE `hores_rooms` (
  `id` int(11) NOT NULL,
  `room_id` varchar(25) NOT NULL,
  `room_image_thumb` text NOT NULL,
  `type` varchar(50) NOT NULL,
  `capacity` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `available` int(11) NOT NULL,
  `description` text NOT NULL,
  `charges` varchar(25) NOT NULL,
  `date_added` varchar(25) NOT NULL,
  `time_added` varchar(25) NOT NULL,
  `added_by` varchar(100) NOT NULL,
  `updated_by` varchar(100) DEFAULT NULL,
  `starred` varchar(5) NOT NULL,
  `status` varchar(15) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hores_rooms`
--

INSERT INTO `hores_rooms` (`id`, `room_id`, `room_image_thumb`, `type`, `capacity`, `total`, `available`, `description`, `charges`, `date_added`, `time_added`, `added_by`, `updated_by`, `starred`, `status`) VALUES
(1, '370460327', './assets/media/uploads/rooms/images_(60)_thumb.jpeg', 'deluxe', 3, 20, 20, '&lt;p&gt;These deluxe rooms let you relax as you admire a beautiful view of the pool. Stay connected as you enjoy our free WiFi amd watch movies with our 32 inch LCD TV and DVD player. Refresh yourself as you take a step into our rain shower.&lt;/p&gt;&lt;p&gt;&lt;strong&gt;Room Features&lt;/strong&gt;&lt;/p&gt;&lt;ul&gt;&lt;li&gt;In room tea and coffee&lt;/li&gt;&lt;li&gt;Writing desk&lt;/li&gt;&lt;li&gt;Personal safe&lt;/li&gt;&lt;li&gt;Minibar&lt;/li&gt;&lt;li&gt;Refrigerator&lt;/li&gt;&lt;li&gt;Air conditioning&lt;/li&gt;&lt;/ul&gt;', '5000', '20/01/2021', '09:25am', '0cff77b0236870347688a02acf3e39e85f09b46d525b4', NULL, 'no', 'active'),
(2, '1856614266', './assets/media/uploads/rooms/images_(63)_thumb.jpeg', 'single room', 1, 20, 20, '&lt;p&gt;Our comfortable single rooms are just the right size if you are travelling alone. In addition to the comfortable hotel lounge, the room is equipped with smart TV,WiFi and iPod docking station. With a size of 14.5m2, our single rooms offer all the space and comfort you need during your stay.&lt;/p&gt;&lt;p&gt;&lt;strong&gt;Room Features&lt;/strong&gt;&lt;/p&gt;&lt;ul&gt;&lt;li&gt;Air conditioning&lt;/li&gt;&lt;li&gt;Free WiFi&lt;/li&gt;&lt;li&gt;Hairdryer&lt;/li&gt;&lt;li&gt;Rain shower&lt;/li&gt;&lt;li&gt;Fridge&lt;/li&gt;&lt;/ul&gt;', '2500', '20/01/2021', '09:31am', '0cff77b0236870347688a02acf3e39e85f09b46d525b4', NULL, 'no', 'active'),
(3, '1841377325', './assets/media/uploads/rooms/images_(66)_thumb.jpeg', 'double room', 2, 2, 2, '&lt;p&gt;All our double rooms are around 14m2 and feature a double bed oe two single beds, fridge and microwave,tea and coffe facilities,plasma TV,hair dryer and toiletries.&lt;/p&gt;&lt;p&gt;&lt;strong&gt;Room Features&lt;/strong&gt;&lt;/p&gt;&lt;ul&gt;&lt;li&gt;Fridge&lt;/li&gt;&lt;li&gt;Microwave&lt;/li&gt;&lt;li&gt;Free WiFi&lt;/li&gt;&lt;li&gt;Fully Air Conditioned&lt;/li&gt;&lt;li&gt;Flat Screen Television&lt;/li&gt;&lt;li&gt;Central heating&lt;/li&gt;&lt;/ul&gt;', '4500', '20/01/2021', '09:37am', '0cff77b0236870347688a02acf3e39e85f09b46d525b4', NULL, 'no', 'active'),
(4, '235330087', './assets/media/uploads/rooms/images_(72)_thumb.jpeg', 'master suite', 5, 5, 5, '&lt;p&gt;Be treated to excellent views of the pool and the surrounding areas. This two bedroom suite of 193sqm is elegantly decorated and beautifully attired. It includes a king bed, a twin bed and a separate living room, an office and a kitchen. This suite is ideal for executive business travellers and families.&lt;/p&gt;&lt;p&gt;This suite offers a 40-inch LED Tv in the bedroom as well in the dining room. The bathroom which is fitted with a separate bathtub alongside a walk in rain shower,whilst there is a second bathroom and walk in closets for guests. Free WiFi, in room air conditioning and safe are also available.&lt;/p&gt;&lt;p&gt;&lt;strong&gt;Room Features&lt;/strong&gt;&lt;/p&gt;&lt;ul&gt;&lt;li&gt;Air conditioning&lt;/li&gt;&lt;li&gt;Coffee/Tea maker&lt;/li&gt;&lt;li&gt;Complimentary bottled water&lt;/li&gt;&lt;li&gt;Flooring:Carpetted&lt;/li&gt;&lt;li&gt;Free high speed internet access&lt;/li&gt;&lt;li&gt;In-room safe&lt;/li&gt;&lt;li&gt;Iron and ironing board&lt;/li&gt;&lt;li&gt;King bed&lt;/li&gt;&lt;li&gt;Minibar&lt;/li&gt;&lt;li&gt;Non-smoking rooms available&lt;/li&gt;&lt;li&gt;Flat screen TV&lt;/li&gt;&lt;li&gt;Separate dining area&lt;/li&gt;&lt;li&gt;Separate living room&lt;/li&gt;&lt;li&gt;Twin bed&lt;/li&gt;&lt;li&gt;Telephone&lt;/li&gt;&lt;li&gt;Walk in closet&lt;/li&gt;&lt;li&gt;Free Parking&lt;/li&gt;&lt;/ul&gt;', '15000', '20/01/2021', '09:54am', '0cff77b0236870347688a02acf3e39e85f09b46d525b4', NULL, 'no', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `hores_room_images`
--

CREATE TABLE `hores_room_images` (
  `id` int(11) NOT NULL,
  `room_id` int(11) NOT NULL,
  `room_image` text NOT NULL,
  `room_image_thumb` text NOT NULL,
  `date_added` varchar(25) NOT NULL,
  `time_added` varchar(25) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hores_room_images`
--

INSERT INTO `hores_room_images` (`id`, `room_id`, `room_image`, `room_image_thumb`, `date_added`, `time_added`) VALUES
(1, 370460327, './assets/media/uploads/rooms/images_(60).jpeg', './assets/media/uploads/rooms/images_(60)_thumb.jpeg', '20/01/2021', '09:25am'),
(2, 370460327, './assets/media/uploads/rooms/images_(61).jpeg', './assets/media/uploads/rooms/images_(61)_thumb.jpeg', '20/01/2021', '09:25am'),
(3, 370460327, './assets/media/uploads/rooms/images_(62).jpeg', './assets/media/uploads/rooms/images_(62)_thumb.jpeg', '20/01/2021', '09:25am'),
(4, 1856614266, './assets/media/uploads/rooms/images_(63).jpeg', './assets/media/uploads/rooms/images_(63)_thumb.jpeg', '20/01/2021', '09:31am'),
(5, 1856614266, './assets/media/uploads/rooms/images_(64).jpeg', './assets/media/uploads/rooms/images_(64)_thumb.jpeg', '20/01/2021', '09:31am'),
(6, 1856614266, './assets/media/uploads/rooms/images_(65).jpeg', './assets/media/uploads/rooms/images_(65)_thumb.jpeg', '20/01/2021', '09:31am'),
(7, 1841377325, './assets/media/uploads/rooms/images_(66).jpeg', './assets/media/uploads/rooms/images_(66)_thumb.jpeg', '20/01/2021', '09:37am'),
(8, 1841377325, './assets/media/uploads/rooms/images_(67).jpeg', './assets/media/uploads/rooms/images_(67)_thumb.jpeg', '20/01/2021', '09:37am'),
(9, 1841377325, './assets/media/uploads/rooms/images_(68).jpeg', './assets/media/uploads/rooms/images_(68)_thumb.jpeg', '20/01/2021', '09:37am'),
(10, 235330087, './assets/media/uploads/rooms/images_(72).jpeg', './assets/media/uploads/rooms/images_(72)_thumb.jpeg', '20/01/2021', '09:54am'),
(11, 235330087, './assets/media/uploads/rooms/images_(73).jpeg', './assets/media/uploads/rooms/images_(73)_thumb.jpeg', '20/01/2021', '09:54am'),
(12, 235330087, './assets/media/uploads/rooms/images_(74).jpeg', './assets/media/uploads/rooms/images_(74)_thumb.jpeg', '20/01/2021', '09:54am');

-- --------------------------------------------------------

--
-- Table structure for table `hores_users`
--

CREATE TABLE `hores_users` (
  `id` int(11) NOT NULL,
  `userid` varchar(100) NOT NULL,
  `role` varchar(15) NOT NULL,
  `profile_image` text NOT NULL,
  `profile_image_thumb` text NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` text NOT NULL,
  `verification_code` varchar(10) NOT NULL,
  `login_status` varchar(15) NOT NULL,
  `account_status` varchar(15) NOT NULL,
  `date_added` varchar(25) NOT NULL,
  `time_added` varchar(25) NOT NULL,
  `starred` varchar(5) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hores_users`
--

INSERT INTO `hores_users` (`id`, `userid`, `role`, `profile_image`, `profile_image_thumb`, `username`, `email`, `password`, `verification_code`, `login_status`, `account_status`, `date_added`, `time_added`, `starred`) VALUES
(1, '0cff77b0236870347688a02acf3e39e85f09b46d525b4', 'admin', 'assets/media/profile_images/profile_image.png', 'assets/media/profile_images/profile_image.png', 'admin', 'admin@fairmont.com', '$2y$10$Sn2oCGANjTJKzzsyFB5RGufIV4XZAq1ZBoLbi9lUo/mRyXodjjdHm', '55090', 'offline', 'active', '12/11/2020', '05:29pm', 'no'),
(2, '76b1ff592070c5bbb45d480eb9456cd760038117002b0', 'employee', './assets/media/uploads/profile_images/becky_g-shower.png', './assets/media/uploads/profile_images/becky_g-shower_thumb.png', 'githash', 'githash.vg@gmail.com', '$2y$10$rQR001HIdDMY4l1IRcwLlemW7KoulYZCifSVucdXfidW.eQqyF8jW', '31336', 'offline', 'active', '17/01/2021', '03:13am', 'yes');

-- --------------------------------------------------------

--
-- Table structure for table `hores_user_logs`
--

CREATE TABLE `hores_user_logs` (
  `id` int(11) NOT NULL,
  `userid` varchar(100) NOT NULL,
  `action` text NOT NULL,
  `date_occured` varchar(25) NOT NULL,
  `time_occured` varchar(25) NOT NULL,
  `starred` varchar(5) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hores_user_logs`
--

INSERT INTO `hores_user_logs` (`id`, `userid`, `action`, `date_occured`, `time_occured`, `starred`) VALUES
(1, '0cff77b0236870347688a02acf3e39e85f09b46d525b4', 'James Wairimu added a new room:Deluxe', '17/01/2021', '03:11pm', 'no'),
(2, '0cff77b0236870347688a02acf3e39e85f09b46d525b4', 'James Wairimu added a new room:Deluxe', '20/01/2021', '09:25am', 'no'),
(3, '0cff77b0236870347688a02acf3e39e85f09b46d525b4', 'James Wairimu added a new room:Single Room', '20/01/2021', '09:31am', 'no'),
(4, '0cff77b0236870347688a02acf3e39e85f09b46d525b4', 'James Wairimu added a new room:Double Room', '20/01/2021', '09:37am', 'no'),
(5, '0cff77b0236870347688a02acf3e39e85f09b46d525b4', 'James Wairimu added a new room:Master Suite', '20/01/2021', '09:54am', 'no');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `hores_bookings`
--
ALTER TABLE `hores_bookings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hores_clients`
--
ALTER TABLE `hores_clients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hores_details`
--
ALTER TABLE `hores_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hores_login_time`
--
ALTER TABLE `hores_login_time`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hores_logout_time`
--
ALTER TABLE `hores_logout_time`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hores_perm`
--
ALTER TABLE `hores_perm`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hores_reviews`
--
ALTER TABLE `hores_reviews`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hores_rooms`
--
ALTER TABLE `hores_rooms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hores_room_images`
--
ALTER TABLE `hores_room_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hores_users`
--
ALTER TABLE `hores_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hores_user_logs`
--
ALTER TABLE `hores_user_logs`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `hores_bookings`
--
ALTER TABLE `hores_bookings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `hores_clients`
--
ALTER TABLE `hores_clients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `hores_details`
--
ALTER TABLE `hores_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `hores_login_time`
--
ALTER TABLE `hores_login_time`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT for table `hores_logout_time`
--
ALTER TABLE `hores_logout_time`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `hores_perm`
--
ALTER TABLE `hores_perm`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `hores_reviews`
--
ALTER TABLE `hores_reviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `hores_rooms`
--
ALTER TABLE `hores_rooms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `hores_room_images`
--
ALTER TABLE `hores_room_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `hores_users`
--
ALTER TABLE `hores_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `hores_user_logs`
--
ALTER TABLE `hores_user_logs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
