-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 13, 2016 at 06:24 PM
-- Server version: 10.1.10-MariaDB
-- PHP Version: 5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cp3_shoptest`
--

-- --------------------------------------------------------

--
-- Table structure for table `apps`
--

CREATE TABLE `apps` (
  `id` int(11) NOT NULL,
  `title` varchar(250) DEFAULT NULL,
  `created` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `apps`
--

INSERT INTO `apps` (`id`, `title`, `created`) VALUES
(1, 'Shop', '2016-06-04 09:03:46');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `parent_id` int(11) NOT NULL,
  `lft` int(11) NOT NULL,
  `rght` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `parent_id`, `lft`, `rght`) VALUES
(0, 'Pages', 0, 11, 12),
(1, 'Car', 0, 1, 10),
(2, 'Toyota', 1, 2, 5),
(3, 'Suzuki', 1, 6, 9),
(4, 'Corolla', 2, 3, 4),
(5, 'Mehran', 3, 7, 8);

-- --------------------------------------------------------

--
-- Table structure for table `categories_fields`
--

CREATE TABLE `categories_fields` (
  `category_id` int(11) NOT NULL,
  `field_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `categories_fields`
--

INSERT INTO `categories_fields` (`category_id`, `field_id`) VALUES
(1, 1),
(1, 11),
(1, 13),
(1, 14),
(2, 2),
(4, 4),
(5, 3),
(5, 4);

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(11) NOT NULL,
  `first_name` varchar(250) DEFAULT NULL,
  `last_name` varchar(250) DEFAULT NULL,
  `email` varchar(250) DEFAULT NULL,
  `password` varchar(250) DEFAULT NULL,
  `registerd_date` timestamp NULL DEFAULT NULL,
  `last_seen` timestamp NULL DEFAULT NULL,
  `city` varchar(250) DEFAULT NULL,
  `country` varchar(250) DEFAULT NULL,
  `billing_address` varchar(250) DEFAULT NULL,
  `phone` varchar(250) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `role` int(11) DEFAULT NULL,
  `pic_url` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `fields`
--

CREATE TABLE `fields` (
  `id` int(11) NOT NULL,
  `fieldTypes_id` int(11) NOT NULL,
  `apps_id` int(11) NOT NULL,
  `title` varchar(50) DEFAULT NULL,
  `created` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `fields`
--

INSERT INTO `fields` (`id`, `fieldTypes_id`, `apps_id`, `title`, `created`) VALUES
(1, 1, 1, 'Engine_no', '2016-06-04 09:04:25'),
(2, 1, 1, 'toyota_barcode', '2016-06-04 09:04:51'),
(3, 1, 1, 'mehran_efi', '2016-06-04 09:05:05'),
(4, 1, 1, 'chasis_no', '2016-06-04 09:23:02'),
(11, 1, 1, 'Model', '2016-06-04 09:33:15'),
(13, 1, 1, 'email', '2016-06-05 16:49:41'),
(14, 1, 1, 'Tyres', '2016-06-05 16:50:18');

-- --------------------------------------------------------

--
-- Table structure for table `fieldtypes`
--

CREATE TABLE `fieldtypes` (
  `id` int(11) NOT NULL,
  `name` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `fieldtypes`
--

INSERT INTO `fieldtypes` (`id`, `name`) VALUES
(1, 'text'),
(2, 'password'),
(3, 'email');

-- --------------------------------------------------------

--
-- Table structure for table `inc_users_phinxlog`
--

CREATE TABLE `inc_users_phinxlog` (
  `version` bigint(20) NOT NULL,
  `migration_name` varchar(100) DEFAULT NULL,
  `start_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `end_time` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `inc_users_phinxlog`
--

INSERT INTO `inc_users_phinxlog` (`version`, `migration_name`, `start_time`, `end_time`) VALUES
(20160609111355, 'CreateUsers', '2016-06-11 06:03:50', '2016-06-11 06:03:51');

-- --------------------------------------------------------

--
-- Table structure for table `menus`
--

CREATE TABLE `menus` (
  `id` int(11) NOT NULL,
  `title` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `menus`
--

INSERT INTO `menus` (`id`, `title`) VALUES
(1, 'Top Navigation'),
(2, 'Footer Navigation');

-- --------------------------------------------------------

--
-- Table structure for table `menu_items`
--

CREATE TABLE `menu_items` (
  `id` int(11) NOT NULL,
  `title` varchar(250) NOT NULL,
  `url` varchar(250) NOT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `menu_id` int(11) NOT NULL,
  `lft` int(10) NOT NULL,
  `rght` int(10) NOT NULL,
  `created` timestamp NULL DEFAULT NULL,
  `modified` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `menu_items`
--

INSERT INTO `menu_items` (`id`, `title`, `url`, `parent_id`, `menu_id`, `lft`, `rght`, `created`, `modified`) VALUES
(1, 'Home', '#', NULL, 1, 1, 2, '2016-06-04 09:00:16', '2016-06-04 09:00:16'),
(2, 'Catalog', '#', NULL, 1, 3, 4, '2016-06-04 09:00:30', '2016-06-04 09:00:30');

-- --------------------------------------------------------

--
-- Table structure for table `nodes`
--

CREATE TABLE `nodes` (
  `id` int(11) NOT NULL,
  `apps_id` int(11) NOT NULL,
  `categories_id` int(11) DEFAULT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `quantity` varchar(255) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `price` varchar(255) DEFAULT NULL,
  `thumb` varchar(250) DEFAULT NULL,
  `image` varchar(250) DEFAULT NULL,
  `node_type` varchar(250) DEFAULT NULL,
  `description` text,
  `lft` int(10) NOT NULL,
  `rght` int(10) NOT NULL,
  `created` timestamp NULL DEFAULT NULL,
  `modified` timestamp NULL DEFAULT NULL,
  `ud_Engine_no` varchar(250) DEFAULT NULL,
  `ud_toyota_barcode` varchar(250) DEFAULT NULL,
  `ud_mehran_efi` varchar(250) DEFAULT NULL,
  `ud_chasis_no` varchar(250) DEFAULT NULL,
  `ud_Model` varchar(250) DEFAULT NULL,
  `ud_email` varchar(250) DEFAULT NULL,
  `ud_Tyres` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `nodes`
--

INSERT INTO `nodes` (`id`, `apps_id`, `categories_id`, `parent_id`, `title`, `quantity`, `status`, `price`, `thumb`, `image`, `node_type`, `description`, `lft`, `rght`, `created`, `modified`, `ud_Engine_no`, `ud_toyota_barcode`, `ud_mehran_efi`, `ud_chasis_no`, `ud_Model`, `ud_email`, `ud_Tyres`) VALUES
(3, 1, 4, NULL, 'Altis', '1', 1, '2200000', '', '', 'product', '', 0, 0, '2016-06-05 11:48:12', '2016-06-08 10:09:28', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(5, 1, 0, NULL, 'Portfolio', '', 1, '', '', '', 'page', 'This page is awesome.', 0, 0, '2016-06-08 08:26:55', '2016-06-08 08:26:55', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(6, 1, 0, NULL, 'Blog', NULL, 1, NULL, NULL, NULL, 'page', 'A wonderful blog to look through!', 0, 0, '2016-06-08 10:33:23', '2016-06-08 10:33:23', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(7, 1, 0, NULL, 'Directory', NULL, 1, NULL, NULL, NULL, 'page', 'Strongest Directory System', 0, 0, '2016-06-08 10:35:29', '2016-06-08 10:36:28', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(8, 1, 0, NULL, '', NULL, 1, NULL, NULL, NULL, 'page', '', 0, 0, '2016-06-08 12:40:48', '2016-06-08 12:40:48', NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `node_images`
--

CREATE TABLE `node_images` (
  `id` int(11) NOT NULL,
  `nodes_id` int(11) NOT NULL,
  `src` varchar(250) DEFAULT NULL,
  `created` timestamp NULL DEFAULT NULL,
  `modified` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `nodes_id` int(11) NOT NULL,
  `customers_id` int(11) NOT NULL,
  `datetime` timestamp NULL DEFAULT NULL,
  `shipping_status` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `prod_total` int(11) DEFAULT NULL,
  `modified` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `phinxlog`
--

CREATE TABLE `phinxlog` (
  `version` bigint(20) NOT NULL,
  `migration_name` varchar(100) DEFAULT NULL,
  `start_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `end_time` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `phinxlog`
--

INSERT INTO `phinxlog` (`version`, `migration_name`, `start_time`, `end_time`) VALUES
(20160301121113, 'ShopEngine', '2016-06-04 03:36:07', '2016-06-04 03:36:12'),
(20160404063306, 'CreateCategoriesFields', '2016-06-04 03:36:12', '2016-06-04 03:36:14'),
(20160522083752, 'CreateMenus', '2016-06-04 03:36:14', '2016-06-04 03:36:15'),
(20160526173311, 'CreateNodeImages', '2016-06-04 03:36:15', '2016-06-04 03:36:15');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL,
  `name` varchar(250) NOT NULL,
  `role` varchar(250) NOT NULL,
  `created` timestamp NULL DEFAULT NULL,
  `modified` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `name`, `role`, `created`, `modified`) VALUES
(2, 'incrediblex', '$2y$10$R9MOttz1tCyfjpbx3hHSNOifMX9taxBL.qbDM4Ps9vDM/IulvOyOS', 'Subhan Ahmed', 'admin', '2016-06-11 11:08:16', '2016-06-11 11:08:16'),
(3, 'faran', '$2y$10$bpCgqYcxDZjzKUggqpo6y.H6E6FksBEY83w9Qx7RdA9OgVSQVNXW2', 'Faran yahya', 'manager', '2016-06-11 19:29:55', '2016-06-11 19:31:12'),
(4, 'hamza', '$2y$10$xh68bJdquGspAG2QC8uwEe.bqy3regxdAM12clw9YJRuaGz3wQvF.', 'Hamza Khan', 'customer', '2016-06-12 10:24:06', '2016-06-12 10:24:06'),
(5, 'subhan', '$2y$10$N7hIy3EMigObhL7sJslB.eTxZbf15gA5q/35jWBY3rTrCNL7N650y', 'Subhan Ahmed', 'admin', '2016-06-12 10:29:28', '2016-06-12 10:29:28'),
(6, 'sohaib', '$2y$10$sl7BI/A4N7qNjrpAtkTMD.BR8XY1mBvZhrBPIKyOyTt713ZdI2z.u', 'Sohaib Asif', 'customer', '2016-06-12 10:33:00', '2016-06-12 10:33:00'),
(7, 'bilal', '$2y$10$N2o7W.wleSl7Qjl6E8oZ/ODc/OLP4ZblR.ZSQplKpJLnRm4Iwnxt2', 'Bilal Ahmed', 'customer', '2016-06-12 10:35:52', '2016-06-12 10:35:52'),
(8, 'Amin', '$2y$10$f0EWrs5/Q1OvjL7vTzx2HuvmLNPCiLa.RZL1GH1eAY/Wb3ALeA1UC', 'Amin Khan', 'customer', '2016-06-12 10:37:41', '2016-06-12 10:37:41'),
(9, 'kashif', '$2y$10$/piziA4G0f/gQemjr2XW7ux/riAccXBDB60OGJhoNgA8xsSWMBaAy', 'Kashif Ahmed', 'customer', '2016-06-12 10:39:59', '2016-06-12 10:39:59');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `apps`
--
ALTER TABLE `apps`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories_fields`
--
ALTER TABLE `categories_fields`
  ADD PRIMARY KEY (`category_id`,`field_id`),
  ADD KEY `category_id` (`category_id`),
  ADD KEY `field_id` (`field_id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fields`
--
ALTER TABLE `fields`
  ADD PRIMARY KEY (`id`),
  ADD KEY `apps_id` (`apps_id`),
  ADD KEY `fieldTypes_id` (`fieldTypes_id`);

--
-- Indexes for table `fieldtypes`
--
ALTER TABLE `fieldtypes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `inc_users_phinxlog`
--
ALTER TABLE `inc_users_phinxlog`
  ADD PRIMARY KEY (`version`);

--
-- Indexes for table `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menu_items`
--
ALTER TABLE `menu_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `menu_id` (`menu_id`);

--
-- Indexes for table `nodes`
--
ALTER TABLE `nodes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `apps_id` (`apps_id`);

--
-- Indexes for table `node_images`
--
ALTER TABLE `node_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nodes_id` (`nodes_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customers_id` (`customers_id`),
  ADD KEY `nodes_id` (`nodes_id`);

--
-- Indexes for table `phinxlog`
--
ALTER TABLE `phinxlog`
  ADD PRIMARY KEY (`version`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `apps`
--
ALTER TABLE `apps`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `fields`
--
ALTER TABLE `fields`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `fieldtypes`
--
ALTER TABLE `fieldtypes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `menus`
--
ALTER TABLE `menus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `menu_items`
--
ALTER TABLE `menu_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `nodes`
--
ALTER TABLE `nodes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `node_images`
--
ALTER TABLE `node_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `categories_fields`
--
ALTER TABLE `categories_fields`
  ADD CONSTRAINT `categories_fields_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`),
  ADD CONSTRAINT `categories_fields_ibfk_2` FOREIGN KEY (`field_id`) REFERENCES `fields` (`id`);

--
-- Constraints for table `fields`
--
ALTER TABLE `fields`
  ADD CONSTRAINT `fields_ibfk_1` FOREIGN KEY (`apps_id`) REFERENCES `apps` (`id`),
  ADD CONSTRAINT `fields_ibfk_2` FOREIGN KEY (`fieldTypes_id`) REFERENCES `fieldtypes` (`id`);

--
-- Constraints for table `menu_items`
--
ALTER TABLE `menu_items`
  ADD CONSTRAINT `menu_items_ibfk_1` FOREIGN KEY (`menu_id`) REFERENCES `menus` (`id`);

--
-- Constraints for table `nodes`
--
ALTER TABLE `nodes`
  ADD CONSTRAINT `nodes_ibfk_1` FOREIGN KEY (`apps_id`) REFERENCES `apps` (`id`);

--
-- Constraints for table `node_images`
--
ALTER TABLE `node_images`
  ADD CONSTRAINT `node_images_ibfk_1` FOREIGN KEY (`nodes_id`) REFERENCES `nodes` (`id`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`customers_id`) REFERENCES `customers` (`id`),
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`nodes_id`) REFERENCES `nodes` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
