-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 07, 2013 at 07:08 PM
-- Server version: 5.5.32
-- PHP Version: 5.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `mkyrrh_makaya`
--
CREATE DATABASE IF NOT EXISTS `mkyrrh_makaya` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
USE `mkyrrh_makaya`;

--
-- Dumping data for table `article`
--

INSERT INTO `article` (`article_id`, `article_image`, `article_title`, `article_body`, `article_type_id`, `article_status`, `user_id`, `date_created`, `last_modified`) VALUES
(1, '3_20131101170429.jpg', 'Penchang the Creator', '3_20131101170429.jpg', 2, 1, 1, NULL, NULL),
(2, '3_20131101170429.jpg', 'Jayvz the Great', '3_20131101170429.jpg', 2, 1, 1, NULL, NULL),
(4, '15_20131026195144.jpg', 'The Greeny Ballpen', '<p>Lorem ipsum dolor sit amet, saperet expetenda complectitur pro no, graeco doctus eleifend pro ei. Sonet detraxit vis ex, salutandi suscipiantur et mea, quo odio labore temporibus cu. Eu sed ponderum perpetua dissentiunt, pri consequat concludaturque te, te usu wisi scribentur. Magna legendos an his. Iisque luptatum his at, te wisi tincidunt voluptatum has, justo percipit sea et.</p>\n<p>Lorem ipsum dolor sit amet, saperet expetenda complectitur pro no, graeco doctus eleifend pro ei. Sonet detraxit vis ex, salutandi suscipiantur et mea, quo odio labore temporibus cu. Eu sed ponderum perpetua dissentiunt, pri consequat concludaturque te, te usu wisi scribentur. Magna legendos an his. Iisque luptatum his at, te wisi tincidunt voluptatum has, justo percipit sea et.</p>\n<p>Lorem ipsum dolor sit amet, saperet expetenda complectitur pro no, graeco doctus eleifend pro ei. Sonet detraxit vis ex, salutandi suscipiantur et mea, quo odio labore temporibus cu. Eu sed ponderum perpetua dissentiunt, pri consequat concludaturque te, te usu wisi scribentur. Magna legendos an his. Iisque luptatum his at, te wisi tincidunt voluptatum has, justo percipit sea et.</p>', 1, 1, 1, '2013-10-26 11:51:44', NULL),
(5, '16_20131027120404.jpg', 'Pink Ballpen Song', '<p>What does the fox say?</p>\n<p class="verse">Ring-ding-ding-ding-dingeringeding!<br /> Gering-ding-ding-ding-dingeringeding!<br /> Gering-ding-ding-ding-dingeringeding!</p>', 1, 1, 1, '2013-10-26 12:17:46', '2013-10-27 17:04:04'),
(8, '1_20131101152156.jpg', 'GKonomiks The Story', '<p>GKonomics International, Inc. is a non-stock, non-profit organization, incorporated in 2009. We are a Gawad Kalinga partner in social enterprise development.</p>', 3, 1, 1, '2013-11-01 07:21:56', '2013-11-01 07:27:38'),
(9, '3_20131101170429.jpg', '2GO Philippnines Article', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum</p>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum</p>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum</p>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborumLorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborumLorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum</p>', 3, 1, 1, '2013-11-01 09:04:29', '2013-11-03 08:58:10'),
(10, '7_20131111202415.png', 'The GKonomics', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum</p>\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum</p>\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum</p>', 3, 1, 1, '2013-11-12 02:24:15', NULL),
(11, '4_20131116031557.jpg', 'Bluish Ballpen', '<p>&lt;p&gt;Lorem ipsum dolor sit amet, saperet expetenda complectitur pro no, graeco doctus eleifend pro ei. Sonet detraxit vis ex, salutandi suscipiantur et mea, quo odio labore temporibus cu. Eu sed ponderum perpetua dissentiunt, pri consequat concludaturque te, te usu wisi scribentur. Magna legendos an his. Iisque luptatum his at, te wisi tincidunt voluptatum has, justo percipit sea et.&lt;/p&gt;</p>\n<p>&lt;p&gt;Lorem ipsum dolor sit amet, saperet expetenda complectitur pro no, graeco doctus eleifend pro ei. Sonet detraxit vis ex, salutandi suscipiantur et mea, quo odio labore temporibus cu. Eu sed ponderum perpetua dissentiunt, pri consequat concludaturque te, te usu wisi scribentur. Magna legendos an his. Iisque luptatum his at, te wisi tincidunt voluptatum has, justo percipit sea et.&lt;/p&gt;</p>\n<p>&lt;p&gt;Lorem ipsum dolor sit amet, saperet expetenda complectitur pro no, graeco doctus eleifend pro ei. Sonet detraxit vis ex, salutandi suscipiantur et mea, quo odio labore temporibus cu. Eu sed ponderum perpetua dissentiunt, pri consequat concludaturque te, te usu wisi scribentur. Magna legendos an his. Iisque luptatum his at, te wisi tincidunt voluptatum has, justo percipit sea et.&lt;/p&gt;</p>', 1, 1, 1, '2013-11-16 09:15:57', NULL);

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
(2, 'Mang Jayvz', 'He is creating website.', 1, 2, 1, NULL, '2013-11-03 11:39:26');

--
-- Dumping data for table `artisan_album`
--

INSERT INTO `artisan_album` (`artisan_album_id`, `artisan_image`, `artisan_id`, `is_primary`, `date_added`) VALUES
(1, '20130921015223.jpeg', 1, 0, '2013-10-19 10:49:43'),
(2, '20130921015223.jpeg', 2, 0, '2013-10-19 10:49:43'),
(3, '2_20131027114646.jpg', 2, 1, '2013-10-27 16:46:46'),
(4, '3_20131103193732.jpg', 3, 1, '2013-11-03 11:37:32'),
(5, '4_20131103193834.jpg', 4, 1, '2013-11-03 11:38:34'),
(6, '1_20131116060832.jpeg', 1, 1, '2013-11-16 12:08:33');

--
-- Dumping data for table `artisan_product`
--

INSERT INTO `artisan_product` (`ap_id`, `artisan_id`, `product_id`, `date_added`) VALUES
(1, 1, 3, '2013-10-19 09:42:21'),
(2, 1, 4, '2013-10-19 09:42:21'),
(3, 2, 5, '2013-10-19 09:42:38'),
(7, 1, 15, '2013-10-26 11:21:41'),
(8, 2, 15, '2013-10-26 11:21:41'),
(9, 1, 16, '2013-10-26 12:02:09'),
(10, 2, 17, '2013-11-30 11:01:37'),
(11, 2, 18, '2013-11-30 11:01:56'),
(12, 2, 19, '2013-11-30 11:02:15');

--
-- Dumping data for table `collection`
--

INSERT INTO `collection` (`collection_id`, `collection_name`, `collection_status`, `date_created`, `last_modified`) VALUES
(1, 'Home And Office', 1, NULL, NULL),
(2, 'House and Lot', 1, '2013-10-14 06:06:57', '2013-11-30 11:31:12'),
(3, 'Kitchen Showcase', 1, '2013-10-14 06:06:57', '0000-00-00 00:00:00');

--
-- Dumping data for table `collection_artisan`
--

INSERT INTO `collection_artisan` (`ca_id`, `collection_id`, `artisan_id`, `date_added`) VALUES
(1, 3, 1, '2013-11-16 09:13:33');

--
-- Dumping data for table `collection_enterprise`
--

INSERT INTO `collection_enterprise` (`ce_id`, `collection_id`, `enterprise_id`, `date_added`) VALUES
(1, 1, 5, '2013-11-03 10:55:09'),
(2, 3, 5, '2013-11-03 10:55:09'),
(3, 1, 6, '2013-11-03 11:04:45'),
(4, 1, 7, '2013-11-03 11:13:02'),
(5, 2, 7, '2013-11-03 11:13:02'),
(6, 3, 7, '2013-11-03 11:13:02'),
(7, 1, 8, '2013-11-03 11:13:25');

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
(10, 3, 16, '2013-10-26 12:02:09'),
(11, 3, 4, '2013-11-16 12:06:19'),
(12, 2, 17, '2013-11-30 11:01:37'),
(13, 2, 18, '2013-11-30 11:01:56'),
(14, 2, 19, '2013-11-30 11:02:15');

--
-- Dumping data for table `enterprise`
--

INSERT INTO `enterprise` (`enterprise_id`, `enterprise_name`, `enterprise_description`, `enterprise_status`, `article_id`, `date_created`, `last_modified`) VALUES
(7, 'GKonomics', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum', 1, 10, '2013-11-03 11:13:02', '2013-11-12 02:24:15'),
(8, '2GO Philippines', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum', 1, 9, '2013-11-03 11:13:25', NULL);

--
-- Dumping data for table `enterprise_album`
--

INSERT INTO `enterprise_album` (`enterprise_album_id`, `enterprise_id`, `enterprise_image`, `is_primary`, `date_added`) VALUES
(3, 1, '1_20131101154614.jpg', 1, '2013-11-01 07:46:14'),
(4, 3, '3_20131101165401.jpg', 1, '2013-11-01 08:54:01'),
(5, 3, '3_20131101165401.jpg', 0, '2013-11-01 08:54:01'),
(6, 3, '3_20131101171537.jpg', 0, '2013-11-01 09:15:37'),
(7, 2, '2_20131103181026.jpg', 1, '2013-11-03 10:10:27'),
(8, 4, '4_20131103182545.jpg', 1, '2013-11-03 10:25:45'),
(9, 5, '5_20131103185509.jpg', 1, '2013-11-03 10:55:09'),
(10, 6, '6_20131103190445.jpg', 1, '2013-11-03 11:04:45'),
(11, 7, '7_20131103191302.jpg', 1, '2013-11-03 11:13:02'),
(12, 8, '8_20131103191325.jpg', 1, '2013-11-03 11:13:25'),
(13, 8, '8_20131103194106.jpg', 0, '2013-11-03 11:41:06');

--
-- Dumping data for table `enterprise_artisan`
--

INSERT INTO `enterprise_artisan` (`ea_id`, `enterprise_id`, `artisan_id`, `date_added`) VALUES
(1, 7, 1, '2013-11-16 09:07:50'),
(2, 7, 2, '2013-11-16 09:07:53'),
(3, 8, 3, '2013-11-03 11:37:32'),
(4, 8, 4, '2013-11-03 11:38:34');

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`feedback_id`, `feedback_subject`, `feedback_email`, `feedback_message`, `date_added`) VALUES
(1, 'Good', 'jacyncampasa@yahoo.com', 'Lorem ipsum dolor sit amet, saperet expetenda complectitur pro no, graeco doctus eleifend pro ei. Sonet detraxit vis ex, salutandi suscipiantur et mea, quo odio labore temporibus cu. Eu sed ponderum perpetua dissentiunt, pri consequat concludaturque te, te usu wisi scribentur. Magna legendos an his. Iisque luptatum his at, te wisi tincidunt voluptatum has, justo percipit sea et.', '2013-11-16 11:53:06');

--
-- Dumping data for table `page`
--

INSERT INTO `page` (`page_id`, `page_name`, `page_uri`, `page_description`, `page_body`, `page_status`, `user_id`, `date_created`, `last_modified`) VALUES
(1, 'About Us', 'about-us', 'This is the about us page.', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras ac augue et diam feugiat elementum vitae nec nisi. Aenean in turpis sit amet diam congue lobortis eu et turpis. Cras eros augue, iaculis et urna vitae, adipiscing sollicitudin nisi. Morbi pulvinar interdum augue, vitae viverra lacus. Aenean tincidunt sodales nunc a hendrerit. Donec pretium porta lacus, ut luctus arcu sollicitudin vitae. Quisque eget hendrerit nunc, eu sodales nibh. Maecenas dictum, augue ultricies ultricies pharetra, diam nisi tincidunt nibh, vitae bibendum urna leo in eros. Vestibulum felis tortor, feugiat a neque at, bibendum posuere nulla. In id nulla quis nibh hendrerit sagittis. Vestibulum blandit, tellus et convallis bibendum, lorem velit adipiscing enim, ut ornare metus urna sit amet libero. Aenean ut sapien sed enim placerat ultrices sed eget ligula. Aliquam convallis elit et massa vehicula, at tincidunt magna sodales. Morbi bibendum lacus at eros porttitor, quis scelerisque magna sollicitudin. Donec vel ipsum in nisi faucibus feugiat. Nulla congue, sem non posuere tempor, eros ipsum ornare lacus, eu lobortis dolor sem vitae nulla. Nullam accumsan ligula sit amet lacus dictum, id lobortis ipsum cursus. Ut tincidunt aliquet elit in sagittis. Aliquam a lacus sed diam interdum venenatis non id erat. Aliquam eget luctus nisi, vel fermentum turpis. Morbi placerat nulla sed bibendum consectetur. Ut eu mi at est malesuada sodales a ultricies quam. Maecenas at metus in massa convallis venenatis ac blandit ligula. Aliquam erat volutpat. Nullam id convallis lorem, vitae lacinia neque. Aliquam erat volutpat. Cras tincidunt id velit tincidunt mollis. Phasellus quis urna nibh. Ut neque urna, rhoncus nec odio quis, pharetra sollicitudin neque. Integer vestibulum massa sem, sit amet vehicula nunc vestibulum ut. Donec quis lacinia lacus, et venenatis mi. Duis ac consectetur leo. Etiam euismod, felis nec placerat gravida, leo sapien sollicitudin orci, at malesuada ligula nulla tempus massa. Quisque velit erat, pretium in laoreet vitae, fringilla ac tellus. Duis ut dictum felis. Ut sed sem nibh. Donec viverra auctor libero, at aliquam lorem laoreet tincidunt. Nullam accumsan est dolor, vitae mattis neque placerat nec. Phasellus tortor libero, posuere malesuada auctor eu, eleifend et leo. Donec aliquet lobortis imperdiet. Ut scelerisque justo eget sapien pretium adipiscing. Maecenas nunc sem, semper volutpat ligula vulputate, fringilla interdum orci. Quisque vel convallis augue. Ut et purus sed odio interdum placerat vel vel tortor. Donec mattis, arcu id tempus feugiat, diam diam auctor sapien, sed elementum enim felis in ante. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Donec vitae nisl at sapien consectetur semper id sit amet leo. Donec viverra sit amet sem non sollicitudin. Duis convallis odio justo, a faucibus odio bibendum eget. Fusce vestibulum, turpis ut porta fringilla, magna sapien vestibulum nisi, at porta dolor odio eu risus. Vestibulum facilisis nulla ac lorem feugiat auctor. Duis eu ligula ut augue laoreet auctor. Curabitur in massa rhoncus, facilisis lorem ut, cursus justo. Vestibulum nec justo mauris</p>', 1, 1, '2013-12-07 02:33:08', '2013-12-07 02:33:26'),
(3, 'Test', '', 'Test', '<p>Test</p>', 0, 1, '2013-12-07 02:34:06', NULL),
(4, 'Acknowledgements', 'acknowledgements', 'lorem ipsum', '<p>lorem ipsum</p>', 1, 1, '2013-12-06 16:00:00', NULL),
(5, 'Partners', 'partners', 'test', '<p>test</p>', 1, 1, '2013-12-07 10:27:50', '2013-12-07 10:28:26'),
(6, 'Terms Of Use', 'terms-of-use', 'test', 'test', 1, 1, '2013-12-06 16:00:00', NULL),
(7, 'FAQ', 'frequently-asked-questions', 'test', 'test', 1, 1, '2013-12-06 16:00:00', NULL);

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `product_name`, `product_description`, `product_quantity`, `product_status`, `width`, `height`, `length`, `weight`, `price`, `is_highlighted`, `article_id`, `date_created`, `product_last_modified`) VALUES
(4, 'Blue Ballpen', 'a shiny red ballpen. Lorem ipsum dolor sit amet, saperet expetenda complectitur pro no, graeco doctus eleifend pro ei. Sonet detraxit vis ex, salutandi suscipiantur et mea, quo odio labore temporibus cu. Eu sed ponderum perpetua dissentiunt, pri consequat concludaturque te, te usu wisi scribentur. Magna legendos an his. Iisque luptatum his at, te wisi tincidunt voluptatum has, justo percipit sea et.', 6, 1, 5, 10, 0, 2, '5.25', 0, 11, '2013-10-14 08:23:32', '2013-11-16 09:15:57'),
(15, 'Green Ballpen', 'Lorem ipsum dolor sit amet, saperet expetenda complectitur pro no, graeco doctus eleifend pro ei. Sonet detraxit vis ex, salutandi suscipiantur et mea, quo odio labore temporibus cu. Eu sed ponderum perpetua dissentiunt, pri consequat concludaturque te, te usu wisi scribentur. Magna legendos an his. Iisque luptatum his at, te wisi tincidunt voluptatum has, justo percipit sea et.', 6, 1, 1, 2, 3, 4, '5.00', 0, 4, '2013-10-26 11:21:41', '2013-10-26 11:51:44'),
(16, 'Pink Ballpen', 'Lorem ipsum dolor sit amet, saperet expetenda complectitur pro no, graeco doctus eleifend pro ei. Sonet detraxit vis ex, salutandi suscipiantur et mea, quo odio labore temporibus cu. Eu sed ponderum perpetua dissentiunt, pri consequat concludaturque te, te usu wisi scribentur. Magna legendos an his. Iisque luptatum his at, te wisi tincidunt voluptatum has, justo percipit sea et.', 6, 1, 1, 2, 3, 4, '10.00', 1, 5, '2013-10-26 12:02:09', '2013-11-23 07:44:18'),
(17, 'Test to be deleted', 'Ttt', 1, 0, 1, 1, 1, 12, '1.00', 0, 0, '2013-11-30 11:01:37', NULL);

--
-- Dumping data for table `product_album`
--

INSERT INTO `product_album` (`product_album_id`, `product_image`, `product_id`, `is_primary`, `date_added`) VALUES
(2, '4_20131026173548.jpg', 4, 1, '2013-10-19 10:46:59'),
(4, '4_20131026173637.jpg', 4, 0, '2013-10-26 09:36:37'),
(5, '4_20131026173714.jpg', 4, 0, '2013-10-26 09:37:14'),
(6, '15_20131026192141.jpg', 15, 1, '2013-10-26 09:37:14'),
(7, '15_20131026193901.jpg', 15, 0, '2013-10-26 11:39:01'),
(8, '16_20131026200209.jpg', 16, 1, '2013-10-26 12:02:09');

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `user_email`, `user_password`, `firstname`, `lastname`, `user_type`, `user_status`, `date_created`, `last_modified`, `access_token`, `activation_code`) VALUES
(1, 'jayvzolazo@gmail.com', 'dfe74cac7654a17b5b717091daec8b2693fe03e1', 'Jayvz', 'Olazo', 1, 1, '2013-10-13 07:58:00', NULL, '538491af934f37e94060926dc9d344883c56483b', ''),
(13, 'jacyncampasa@gmail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'Jacyn', 'Olazo', 4, 1, '2013-11-16 11:44:40', '2013-11-16 13:11:09', '', '445aa41f688e99e25166bb79972b60eabce9d5b2'),
(14, 'jacyncampasa@yahoo.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'Jacyn2', 'Campasa2', 4, 1, '2013-11-16 11:51:46', NULL, '', '143b378d6bedfec189455e6efdbf131d5eafda46');

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
