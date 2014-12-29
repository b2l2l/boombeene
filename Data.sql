-- phpMyAdmin SQL Dump
-- version 4.0.10.6
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 29, 2014 at 02:50 PM
-- Server version: 5.5.40-cll
-- PHP Version: 5.4.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `comqren_kreeen`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE IF NOT EXISTS `admins` (
  `id` bigint(250) NOT NULL AUTO_INCREMENT,
  `username` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `permissions` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`,`username`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `username`, `email`, `password`, `permissions`) VALUES
(1, 'admin', 'bilalbarzinji@gmail.com', 'b9d90722a7f4cf88e6afa84703dc6888', '1');

-- --------------------------------------------------------

--
-- Table structure for table `cards`
--

CREATE TABLE IF NOT EXISTS `cards` (
  `id` bigint(250) NOT NULL AUTO_INCREMENT,
  `card_number` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `card_value` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `used_by` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `date_added` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `date_used` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`,`card_number`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `id` bigint(250) NOT NULL AUTO_INCREMENT,
  `name` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `parents` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `image` longtext COLLATE utf8_unicode_ci,
  `link` longtext COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=39 ;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `parents`, `image`, `link`) VALUES
(1, 'داشکاندنەکان  Discounts', NULL, 'z-949037912.jpg', ''),
(2, 'کاتژمێر  Watches', NULL, NULL, ''),
(3, 'clothes and accessories پۆشاک و پێداویستیەکانی', NULL, NULL, ''),
(4, 'مۆبایل و پێداویستیەکانی  Mobile and Accessories ', NULL, 'z-1103721539.jpg', ''),
(5, 'تابلێت  Tablet', NULL, NULL, ''),
(6, 'هیدفۆن  Headphone ', '-4-|', NULL, ''),
(7, 'پاتری و بانکی شەحن  Battery ', '-4-|', NULL, ''),
(8, 'سپیکەر  Speaker ', '-4-|', NULL, ''),
(9, 'میمۆری  Memory ', '-4-|', '', ''),
(10, 'ئەوانی تر  Other', '-4-|', 'z-1950271858.jpg', ''),
(11, 'کۆمپیوتەر  Computer ', NULL, NULL, ''),
(12, 'لاپتۆپ  Laptops', '-11-|', '', ''),
(13, 'ماوس  Mouse', '-12-|', NULL, ''),
(14, 'کیبۆرد  Keyboard', '-12-|', '', ''),
(15, 'کامێرا  Camera', '-12-|', NULL, ''),
(16, 'جانتا  Bags', '-12-|', NULL, ''),
(17, 'هیدفۆن  Headphones', '-12-|', NULL, ''),
(18, 'پێداویستی تر  Other ', '-12-|', NULL, ''),
(19, 'دیسکتۆپ  Desktop ', '-11-|', NULL, ''),
(20, 'ماوس  Mouse', '-19-|', NULL, ''),
(21, 'کیبۆرد  Keyboard', '-19-|', 'z-2109480225.jpg', ''),
(22, 'کامێرا  Camera', '-19-|', NULL, ''),
(23, 'جانتا  Bags', '-19-|', NULL, ''),
(24, 'هیدفۆن  Headphones', '-19-|', NULL, ''),
(25, 'پێداویستی تر  Other ', '-19-|', NULL, ''),
(27, 'جانتا و کەڤەر  Bags and Covers ', '-5-|', NULL, ''),
(28, 'پارێزەری شاشە  Screen Protector ', '-5-|', NULL, ''),
(29, 'شەحن  Charger ', '-5-|', NULL, ''),
(30, 'بانکی شەحن  Battery Bank ', '-5-|', NULL, ''),
(31, 'پێداویستی تر  Other ', '-5-|', NULL, ''),
(32, 'هارد و فلاش و میمۆری  Hard,Flash,Memory', '-5-|', NULL, ''),
(33, 'مۆبایل  Mobile', '-4-|', 'z-1977341278.jpg', ''),
(34, 'کاتژمێری زیرەک  Smart Watch', '-4-|', NULL, ''),
(35, 'شەحن  Charger ', '-4-|', NULL, ''),
(36, 'کەڤەر + پارێزەری شاشە  Cover + Screen Protector ', '-4-|', NULL, ''),
(37, 'black', '-36-|', NULL, ''),
(38, 'ghnghg', '-1-|', NULL, '');

-- --------------------------------------------------------

--
-- Table structure for table `categories_slider`
--

CREATE TABLE IF NOT EXISTS `categories_slider` (
  `id` bigint(250) NOT NULL AUTO_INCREMENT,
  `image_link` longtext NOT NULL,
  `c_id` varchar(250) NOT NULL,
  `hyperlink` longtext NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `categories_slider`
--

INSERT INTO `categories_slider` (`id`, `image_link`, `c_id`, `hyperlink`) VALUES
(4, 'z-426624403.jpg', '16', ''),
(5, 'z-622409306.jpg', '16', ''),
(6, 'z-356644171.jpg', '11', ''),
(7, 'z-362272434.jpg', '2', ''),
(8, 'z-1624996993.jpg', '2', ''),
(9, 'z-1065033626.jpg', 'index', 'http://yahoo.com/'),
(10, 'z-1531037636.jpg', 'index', ''),
(11, 'z-2101841911.jpg', '1', ''),
(12, 'z-1719254868.jpg', '5', ''),
(13, 'z-57216375.jpg', 'index', 'http://facebook.com/'),
(14, 'z-157441935.jpg', 'index', ''),
(15, 'z-1825907524.jpg', 'index', 'http://www.amazon.com/'),
(16, 'z-1082908520.jpg', '1', ''),
(17, 'z-1959378295.jpg', '11', '');

-- --------------------------------------------------------

--
-- Table structure for table `logs`
--

CREATE TABLE IF NOT EXISTS `logs` (
  `id` bigint(250) NOT NULL AUTO_INCREMENT,
  `event` longtext COLLATE utf8_unicode_ci NOT NULL,
  `date` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=47 ;

--
-- Dumping data for table `logs`
--

INSERT INTO `logs` (`id`, `event`, `date`) VALUES
(1, '130.193.222.19 - 0kre_een - CONTROL PANEL - Logged In', '2014-08-27 18:34:19'),
(2, '130.193.222.19 -  - ibrahim Registered.', '2014-08-27 18:36:47'),
(3, '130.193.222.19 - ibrahim - Logged In', '2014-08-27 18:36:47'),
(4, '130.193.249.54 - 0kre_een - CONTROL PANEL - Logged In', '2014-08-27 22:31:03'),
(5, '130.193.222.19 - ibrahim - (ShopCenter) Bought Item : 3', '2014-08-27 22:57:03'),
(6, '37.58.52.81 -  - Hassan Munam Registered.', '2014-08-28 01:51:09'),
(7, '37.58.52.81 - Hassan Munam - Logged In', '2014-08-28 01:51:10'),
(8, '130.193.196.172 - 0kre_een - CONTROL PANEL - Logged In', '2014-08-30 00:50:25'),
(9, '130.193.196.172 - 0kre_een - CONTROL PANEL - Created Item : Skrillex ', '2014-08-30 00:52:40'),
(10, '92.253.90.224 - 0kre_een - CONTROL PANEL - Logged In', '2014-08-30 04:31:53'),
(11, '130.193.196.172 - 0kre_een - CONTROL PANEL - Logged In', '2014-08-30 04:37:14'),
(12, '130.193.193.198 - bilal - Logged In', '2014-09-03 22:24:02'),
(13, '130.193.247.93 - 0kre_een - CONTROL PANEL - Logged In', '2014-09-06 22:20:43'),
(14, '130.193.247.93 - 0kre_een - CONTROL PANEL - Logged In', '2014-09-06 23:08:43'),
(15, '130.193.210.43 - 0kre_een - CONTROL PANEL - Logged In', '2014-09-07 01:50:53'),
(16, '130.193.198.166 - 0kre_een - CONTROL PANEL - Logged In', '2014-09-09 03:20:58'),
(17, '130.193.205.226 - 0kre_een - CONTROL PANEL - Logged In', '2014-09-10 00:05:54'),
(18, '130.193.200.64 - 0kre_een - CONTROL PANEL - Logged In', '2014-09-10 00:12:16'),
(19, '130.193.210.126 - 0kre_een - CONTROL PANEL - Logged In', '2014-09-16 22:28:48'),
(20, '130.193.210.126 - 0kre_een - CONTROL PANEL - Updated User : 13', '2014-09-16 22:30:15'),
(21, '130.193.210.126 - bilal - Logged In', '2014-09-16 22:30:33'),
(22, '130.193.210.126 - bilal - (Dashboard) Placed Order : https://23.239.129.101:2083/cpsess9734907324/frontend/paper_lantern/filemanager/editit.html?file=ku.php&fileop=&dir=%2Fhome%2Fcomqren%2Fpublic_html%2Fincludes%2Flang&dirop=&charset=&file_charset=utf-8&baseurl=&basedir=', '2014-09-16 23:24:08'),
(23, '130.193.210.126 - bilal - (Dashboard) Placed Order : http://ask.fm/account/questionsddddddddddddddddddddddddddddddddddddddad', '2014-09-16 23:26:43'),
(24, '130.193.210.126 - bilal - (Dashboard) Placed Order : http://ask.fm/account/questionsddddddddddddddddddddddddddddddddddddddad', '2014-09-16 23:26:47'),
(25, '130.193.210.126 - bilal - (Dashboard) Placed Order : http://ask.fm/account/questionsddddddddddddddddddddddddddddddddddddddad', '2014-09-16 23:26:51'),
(26, '130.193.196.4 - ibrahim - Logged In', '2014-09-19 15:46:21'),
(27, '130.193.196.4 - ibrahim - (ShopCenter) Bought Item : 8', '2014-09-19 15:47:37'),
(28, '130.193.195.251 - 0kre_een - CONTROL PANEL - Logged In', '2014-09-21 22:35:34'),
(29, '130.193.195.251 - 0kre_een - CONTROL PANEL - Removed user : 15', '2014-09-21 23:30:30'),
(30, '130.193.195.251 - 0kre_een - CONTROL PANEL - Updated User : 13', '2014-09-21 23:34:44'),
(31, '130.193.195.251 - 0kre_een - CONTROL PANEL - Updated User : 13', '2014-09-21 23:34:50'),
(32, '130.193.195.251 - bilal - Logged In', '2014-09-21 23:58:03'),
(33, '130.193.195.251 - bilal - Logged Out', '2014-09-22 00:05:22'),
(34, '130.193.247.164 - 0kre_een - CONTROL PANEL - Logged In', '2014-09-22 21:46:14'),
(35, '130.193.224.153 -  - heminit Registered.', '2014-10-04 22:45:57'),
(36, '130.193.224.153 - heminit - Logged In', '2014-10-04 22:45:57'),
(37, '130.193.209.26 - 0kre_een  - CONTROL PANEL - Logged In', '2014-10-13 21:43:03'),
(38, '130.193.209.26 - 0kre_een  - CONTROL PANEL - Created Item : فلاشی ساندیسک گگگ', '2014-10-13 21:48:22'),
(39, '95.170.202.195 -  - sinan Registered.', '2014-11-15 14:28:27'),
(40, '95.170.202.195 - sinan - Logged In', '2014-11-15 14:28:27'),
(41, '95.170.202.195 - sinan - (ShopCenter) Bought Item : 15', '2014-11-15 14:30:47'),
(42, '130.193.155.132 -  - ahmed Registered.', '2014-12-03 16:12:16'),
(43, '130.193.155.132 - ahmed - Logged In', '2014-12-03 16:12:16'),
(44, '130.193.155.132 - ahmed - (ShopCenter) Bought Item : 15', '2014-12-03 16:13:01'),
(45, '130.193.213.252 -  - Soran Rasul Registered.', '2014-12-13 00:25:36'),
(46, '130.193.213.252 - Soran Rasul - Logged In', '2014-12-13 00:25:36');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE IF NOT EXISTS `orders` (
  `id` bigint(250) NOT NULL AUTO_INCREMENT,
  `user` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `original_link` longtext COLLATE utf8_unicode_ci NOT NULL,
  `item_name` longtext COLLATE utf8_unicode_ci NOT NULL,
  `item_color` longtext COLLATE utf8_unicode_ci NOT NULL,
  `item_size` longtext COLLATE utf8_unicode_ci NOT NULL,
  `item_model` longtext COLLATE utf8_unicode_ci NOT NULL,
  `item_specs` longtext COLLATE utf8_unicode_ci NOT NULL,
  `quantity` longtext COLLATE utf8_unicode_ci NOT NULL,
  `delivery_type` longtext COLLATE utf8_unicode_ci NOT NULL,
  `original_price` longtext COLLATE utf8_unicode_ci NOT NULL,
  `total_price` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `notes` longtext COLLATE utf8_unicode_ci NOT NULL,
  `date_placed` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `status` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `type` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=12 ;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user`, `original_link`, `item_name`, `item_color`, `item_size`, `item_model`, `item_specs`, `quantity`, `delivery_type`, `original_price`, `total_price`, `notes`, `date_placed`, `status`, `type`) VALUES
(1, 'asdsmakd', '$original_link', '', '', '', '', '', '', '', '$price', '$price', '$notes', '$date_placed', '$status', '$type'),
(6, '$buyer', '$original_link', '$item_name', '$item_color', '$item_size', '$item_model', '$item_specs', '', '$delivery_type', '$price', '$price', '$notes', '$date_placed', '$status', '$type'),
(7, 'bilal', 'https://23.239.129.101:2083/cpsess9734907324/frontend/paper_lantern/filemanager/editit.html?file=ku.php&fileop=&dir=%2Fhome%2Fcomqren%2Fpublic_html%2Fincludes%2Flang&dirop=&charset=&file_charset=utf-8&baseurl=&basedir=', 'Cpanel/Whm', 'blue', 'L', '1921', 'nothing', '1', 'branch_suly', '', '', 'i want it with 10 days ? it''s possible ? i can pay you more for that?', '2014-09-16 23:24:08', 'Waiting For Price Offer ...', 'Dashboard'),
(8, 'bilal', 'http://ask.fm/account/questionsddddddddddddddddddddddddddddddddddddddad', 'askfm', 'yallo', 'S', 'dasd', 'da', '2', 'branch_erbil', '', '', '', '2014-09-16 23:26:43', 'Waiting For Price Offer ...', 'Dashboard'),
(9, 'bilal', 'http://ask.fm/account/questionsddddddddddddddddddddddddddddddddddddddad', 'askfm', 'yallo', 'S', 'dasd', 'da', '2', 'home_suly', '', '', '', '2014-09-16 23:26:47', 'Waiting For Price Offer ...', 'Dashboard'),
(10, 'bilal', 'http://ask.fm/account/questionsddddddddddddddddddddddddddddddddddddddad', 'askfm', 'yallo', 'S', 'dasd', 'da', '2', 'home_erbil', '', '', '', '2014-09-16 23:26:51', 'Waiting For Price Offer ...', 'Dashboard'),
(11, 'ibrahim', '8', 'asdkkmkkmdsak', '', '', '', '-', '1', '-', '', '', ' - Auto Generated By ZShopCenter.', '2014-09-19 15:47:37', 'داواکاریەکەت جێبەجێ کرا', 'ShopCenter');

-- --------------------------------------------------------

--
-- Table structure for table `shop_center`
--

CREATE TABLE IF NOT EXISTS `shop_center` (
  `id` bigint(250) NOT NULL AUTO_INCREMENT,
  `title` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `model` longtext COLLATE utf8_unicode_ci NOT NULL,
  `color` longtext COLLATE utf8_unicode_ci NOT NULL,
  `size` longtext COLLATE utf8_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8_unicode_ci NOT NULL,
  `cat_id` bigint(250) NOT NULL,
  `price` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `delivery_time` longtext COLLATE utf8_unicode_ci NOT NULL,
  `photos` longtext COLLATE utf8_unicode_ci NOT NULL,
  `video` longtext COLLATE utf8_unicode_ci NOT NULL,
  `status` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `ordered` bigint(250) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=16 ;

--
-- Dumping data for table `shop_center`
--

INSERT INTO `shop_center` (`id`, `title`, `model`, `color`, `size`, `description`, `cat_id`, `price`, `delivery_time`, `photos`, `video`, `status`, `ordered`) VALUES
(1, 'Test 1', 'Z1', 'Black', 'N', 'AMAZING Phone', 1, '140', '10 Days', 'SonyZ1.jpg|SonyZ1.jpg|SonyZ1.jpg|', '<iframe width="560" height="315" src="//www.youtube.com/embed/64PtSNdkVqM" frameborder="0" allowfullscreen></iframe>', 'active', NULL),
(2, 'Test 22', 'Testing the shop center items.', 'White', 'Small', 'None', 1, '909', '7 Days', 'SonyZ1.jpg|', 'http://yahoo.com', 'inactive', NULL),
(3, 'Test 2', 'Testing the shop center items', '', '', '', 2, '90', '0', 'SonyZ1.jpg|', 'http://www.youtube.com/watch?v=X3k_gfA4Ago', 'active', 1),
(4, 'Test 3', 'Testing the shop center items', '', '', '', 3, '90', '0', 'SonyZ1.jpg|SonyZ1.jpg|SonyZ1.jpg|', 'http://www.youtube.com/watch?v=X3k_gfA4Ago', 'active', 1),
(5, '$title', '$model', '$color', '$size', '$description', 1, '$price', '$delivery_time', '$photos', '$video', '$status', NULL),
(6, 'testing new item', '20 ', '20 color', '20 cm', '20 thing', 2, '20', '20 days', '', '20 videos', 'inactive', NULL),
(7, 'kmsakdmakdmk', '', '', '', '', 2, '', '', '', '', 'inactive', NULL),
(8, 'asdkkmkkmdsak', '', '', '', '', 2, '', '', 'z-1423344435.jpg|', '', 'active', 2),
(10, 'bbbbbbbbbbb', '', '', '', 'no descr', 3, 'bbbbbbbbbb', '20 days', 'z-1091654045.jpg|', '', 'active', NULL),
(11, 'B Test', '547123', 'Black', 'large', 'the last test :D', 7, '99.99', '1day', 'z-1903537357.jpg|z-174709177.jpg|z-1894037313.jpg|', '<iframe width="854" height="510" src="//www.youtube.com/embed/PkQ5rEJaTmk" frameborder="0" allowfullscreen></iframe>', 'active', 12),
(12, 'nmnmnmnm', 'n2', 'red', 'n3', 'nm nm nmnmnm nmn mn mnm nm nm', 2, '12', '12 days', 'z-1546517405.jpg|', '<iframe width="560" height="315" src="//www.youtube.com/embed/lS22HZ21uKM" frameborder="0" allowfullscreen></iframe>', 'active', 8),
(14, 'Skrillex ', 'Perfect 1092', 'black', 'big', 'skrillex . Dubstep ', 2, '939', '10', 'z-1340380724.jpg|z-30048417.jpg|', '', 'active', NULL),
(15, 'فلاشی ساندیسک گگگ', '', 'سور', 'سس', 'هفگهگگهگهفگ', 1, '25', '10-25', 'z-936858509.jpg|', '', 'active', 2);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(250) NOT NULL AUTO_INCREMENT,
  `username` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `full_name` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `address` longtext COLLATE utf8_unicode_ci NOT NULL,
  `city` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `credits` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`,`username`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=19 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `full_name`, `phone`, `address`, `city`, `credits`) VALUES
(13, 'bilal', 'bilalbarzinji@gmail.com', '1f3d2ccfe9bfd16fa80b793a7a21632d', 'bilal barzinji', '07708512691', 'Erbil - Zanko #99', 'Erbil', '0'),
(14, 'ibrahim', 'ibrahim@tech-kurd.com', 'b2df2809a60b245a27c04bba53c71846', 'ibrahim imad', '07504048880', 'Dream city ', 'Erbil', '0'),
(15, 'heminit', 'kurd90@yahoo.com', '962248af860676d8f47a61b6e5f89061', 'hemin lak', '07504949908', 'mahabad', 'Erbil', '0'),
(16, 'sinan', 'sinan@edicoo.com', '704bcd1b466d08134e2cc935e5472e86', 'Sinan Shukry', '07504718498', 'Erbil', 'Erbil', '0'),
(17, 'ahmed', 'ahmedcars.j@gmail.com', '52d2b7fddcecec6a2d00eed30bca932f', 'ahmed kamal', '+9647509387455', '47 iskan', 'Erbil', '0'),
(18, 'Soran Rasul', 'soran.rasul@gmail.com', 'bbb38978da106efec13185d17489783a', 'Soran Rasul', '07504977920', 'Kurdistan, Hawler, Azadi', 'Erbil', '0');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
