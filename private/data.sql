-- phpMyAdmin SQL Dump
-- version 3.5.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 28, 2013 at 09:01 PM
-- Server version: 5.5.33-31.1
-- PHP Version: 5.3.17

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `mkyrrh_makaya`
--

--
-- Dumping data for table `article`
--

INSERT INTO `article` (`article_id`, `article_image`, `article_title`, `article_body`, `article_type_id`, `article_status`, `user_id`, `date_created`, `last_modified`) VALUES
(4, '15_20131026195144.jpg', 'The Greeny Ballpen', '<p>Lorem ipsum dolor sit amet, saperet expetenda complectitur pro no, graeco doctus eleifend pro ei. Sonet detraxit vis ex, salutandi suscipiantur et mea, quo odio labore temporibus cu. Eu sed ponderum perpetua dissentiunt, pri consequat concludaturque te, te usu wisi scribentur. Magna legendos an his. Iisque luptatum his at, te wisi tincidunt voluptatum has, justo percipit sea et.</p>\r\n<p>Lorem ipsum dolor sit amet, saperet expetenda complectitur pro no, graeco doctus eleifend pro ei. Sonet detraxit vis ex, salutandi suscipiantur et mea, quo odio labore temporibus cu. Eu sed ponderum perpetua dissentiunt, pri consequat concludaturque te, te usu wisi scribentur. Magna legendos an his. Iisque luptatum his at, te wisi tincidunt voluptatum has, justo percipit sea et.</p>\r\n<p>Lorem ipsum dolor sit amet, saperet expetenda complectitur pro no, graeco doctus eleifend pro ei. Sonet detraxit vis ex, salutandi suscipiantur et mea, quo odio labore temporibus cu. Eu sed ponderum perpetua dissentiunt, pri consequat concludaturque te, te usu wisi scribentur. Magna legendos an his. Iisque luptatum his at, te wisi tincidunt voluptatum has, justo percipit sea et.</p>', 1, 0, 1, '2013-10-26 11:51:44', NULL),
(5, '16_20131027120404.jpg', 'Pink Ballpen Song', '<p>What does the fox say?</p>\n<p class="verse">Ring-ding-ding-ding-dingeringeding!<br /> Gering-ding-ding-ding-dingeringeding!<br /> Gering-ding-ding-ding-dingeringeding!</p>', 1, 0, 1, '2013-10-26 12:17:46', '2013-10-27 17:04:04');

--
-- Dumping data for table `article_type`
--

INSERT INTO `article_type` (`article_type_id`, `article_type`) VALUES
(1, 'product'),
(2, 'artisan'),
(3, 'enterprise');

--
-- Dumping data for table `artisan`
--

INSERT INTO `artisan` (`artisan_id`, `artisan_name`, `artisan_description`, `artisan_status`, `article_id`, `enterprise_id`, `date_created`, `last_modified`) VALUES
(1, 'Aleng Penchang', 'She is creating website', 1, 1, 1, NULL, NULL),
(2, 'Mang Jayvz', 'He is creating website', 1, 2, 1, NULL, NULL);

--
-- Dumping data for table `artisan_album`
--

INSERT INTO `artisan_album` (`artisan_album_id`, `artisan_image`, `artisan_id`, `is_primary`, `date_added`) VALUES
(1, '20130921015223.jpeg', 1, 1, '2013-10-19 10:49:43'),
(2, '20130921015223.jpeg', 2, 0, '2013-10-19 10:49:43'),
(3, '2_20131027114646.jpg', 2, 1, '2013-10-27 16:46:46');

--
-- Dumping data for table `artisan_product`
--

INSERT INTO `artisan_product` (`ap_id`, `artisan_id`, `product_id`, `date_added`) VALUES
(1, 1, 3, '2013-10-19 09:42:21'),
(2, 1, 4, '2013-10-19 09:42:21'),
(3, 2, 5, '2013-10-19 09:42:38'),
(4, 2, 4, '2013-10-19 09:42:21'),
(7, 1, 15, '2013-10-26 11:21:41'),
(8, 2, 15, '2013-10-26 11:21:41'),
(9, 1, 16, '2013-10-26 12:02:09');

--
-- Dumping data for table `collection`
--

INSERT INTO `collection` (`collection_id`, `collection_name`, `collection_status`, `date_created`, `last_modified`) VALUES
(1, 'Home And Office', 1, NULL, NULL),
(2, 'House and Lot', 1, '2013-10-14 06:06:57', '0000-00-00 00:00:00'),
(3, 'Kitchen Showcase', 1, '2013-10-14 06:06:57', '0000-00-00 00:00:00');

--
-- Dumping data for table `collection_product`
--

INSERT INTO `collection_product` (`cp_id`, `collection_id`, `product_id`, `date_added`) VALUES
(1, 1, 3, '2013-10-26 09:10:20'),
(2, 2, 4, '2013-10-26 09:10:20'),
(3, 3, 5, '2013-10-26 09:10:20'),
(7, 1, 15, '2013-10-26 11:21:41'),
(8, 2, 15, '2013-10-26 11:21:41'),
(9, 3, 15, '2013-10-26 11:21:41'),
(10, 3, 16, '2013-10-26 12:02:09');

--
-- Dumping data for table `enterprise`
--

INSERT INTO `enterprise` (`enterprise_id`, `enterprise_name`, `enterprise_description`, `enterprise_status`, `article_id`, `date_created`, `last_modified`) VALUES
(1, 'Gkonomiks', 'Gkonomiks Description', 1, 0, '2013-10-19 09:45:23', '2013-10-19 09:45:23'),
(2, 'Manufacturer', 'Manufacturer Description1', 1, 2, '2013-10-19 12:29:50', '2013-10-19 12:29:50');

--
-- Dumping data for table `enterprise_album`
--

INSERT INTO `enterprise_album` (`enterprise_album_id`, `enterprise_id`, `enterprise_image`, `is_primary`, `date_added`) VALUES
(1, 1, '20130921015223.jpeg', 1, '2013-10-19 10:50:08');

--
-- Dumping data for table `enterprise_artisan`
--

INSERT INTO `enterprise_artisan` (`ea_id`, `enterprise_id`, `artisan_id`, `date_added`) VALUES
(1, 1, 1, '2013-10-19 09:45:42'),
(2, 1, 2, '2013-10-19 09:45:42');

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `product_name`, `product_description`, `product_quantity`, `product_status`, `width`, `height`, `length`, `weight`, `price`, `is_highlighted`, `article_id`, `date_created`, `product_last_modified`) VALUES
(3, 'Red Ballpen', 'a shiny red ballpen. Lorem ipsum dolor sit amet, saperet expetenda complectitur pro no, graeco doctus eleifend pro ei. Sonet detraxit vis ex, salutandi suscipiantur et mea, quo odio labore temporibus cu. Eu sed ponderum perpetua dissentiunt, pri consequat concludaturque te, te usu wisi scribentur. Magna legendos an his. Iisque luptatum his at, te wisi tincidunt voluptatum has, justo percipit sea et.', 19, 1, 5, 10, 0, 2, 10.25, 1, 2, '2013-10-14 08:21:20', '2013-10-27 16:45:19'),
(4, 'Blue Ballpen', 'a shiny red ballpen. Lorem ipsum dolor sit amet, saperet expetenda complectitur pro no, graeco doctus eleifend pro ei. Sonet detraxit vis ex, salutandi suscipiantur et mea, quo odio labore temporibus cu. Eu sed ponderum perpetua dissentiunt, pri consequat concludaturque te, te usu wisi scribentur. Magna legendos an his. Iisque luptatum his at, te wisi tincidunt voluptatum has, justo percipit sea et.', 6, 1, 5, 10, 0, 2, 5.25, 0, 1, '2013-10-14 08:23:32', '2013-10-26 09:47:52'),
(5, 'Black Ballpen', 'a shiny black ballpen', 1, 1, 5, 10, 0, 2, 8.25, 0, 3, '2013-10-14 08:23:19', '2013-10-26 11:37:57'),
(15, 'Green Ballpen', 'Lorem ipsum dolor sit amet, saperet expetenda complectitur pro no, graeco doctus eleifend pro ei. Sonet detraxit vis ex, salutandi suscipiantur et mea, quo odio labore temporibus cu. Eu sed ponderum perpetua dissentiunt, pri consequat concludaturque te, te usu wisi scribentur. Magna legendos an his. Iisque luptatum his at, te wisi tincidunt voluptatum has, justo percipit sea et.', 6, 1, 1, 2, 3, 4, 5.00, 0, 4, '2013-10-26 11:21:41', '2013-10-26 11:51:44'),
(16, 'Pink Ballpen', 'Lorem ipsum dolor sit amet, saperet expetenda complectitur pro no, graeco doctus eleifend pro ei. Sonet detraxit vis ex, salutandi suscipiantur et mea, quo odio labore temporibus cu. Eu sed ponderum perpetua dissentiunt, pri consequat concludaturque te, te usu wisi scribentur. Magna legendos an his. Iisque luptatum his at, te wisi tincidunt voluptatum has, justo percipit sea et.', 6, 1, 1, 2, 3, 4, 5.00, 0, 5, '2013-10-26 12:02:09', '2013-10-27 16:45:31');

--
-- Dumping data for table `product_album`
--

INSERT INTO `product_album` (`product_album_id`, `product_image`, `product_id`, `is_primary`, `date_added`) VALUES
(1, '20130921015223.jpeg', 3, 0, '2013-10-19 10:44:22'),
(2, '4_20131026173548.jpg', 4, 1, '2013-10-19 10:46:59'),
(3, '20130921015223.jpeg', 5, 0, '2013-10-19 10:46:59'),
(4, '4_20131026173637.jpg', 4, 0, '2013-10-26 09:36:37'),
(5, '4_20131026173714.jpg', 4, 0, '2013-10-26 09:37:14'),
(6, '15_20131026192141.jpg', 15, 1, '2013-10-26 09:37:14'),
(7, '15_20131026193901.jpg', 15, 0, '2013-10-26 11:39:01'),
(8, '16_20131026200209.jpg', 16, 1, '2013-10-26 12:02:09'),
(9, '5_20131027114451.jpg', 5, 1, '2013-10-27 16:44:51'),
(10, '3_20131027114509.jpg', 3, 1, '2013-10-27 16:45:10');

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `user_email`, `user_password`, `firstname`, `lastname`, `user_type`, `user_status`, `date_created`, `last_modified`, `access_token`) VALUES
(1, 'jayvzolazo@gmail.com', 'dfe74cac7654a17b5b717091daec8b2693fe03e1', 'Jayvz', 'Olazo', 1, 1, '2013-10-13 07:58:00', NULL, 'f4980045416eb655d927288f88ce99f4716c4232');

--
-- Dumping data for table `user_type`
--

INSERT INTO `user_type` (`user_type_id`, `type_name`) VALUES
(1, 'superadmin'),
(2, 'administrator'),
(3, 'staff'),
(4, 'member');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
