-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 01, 2022 at 10:42 AM
-- Server version: 8.0.17
-- PHP Version: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `socialstore`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `idcategory` int(10) UNSIGNED NOT NULL,
  `code` varchar(11) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `category` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `numproducts` int(10) UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`idcategory`, `code`, `category`, `numproducts`) VALUES
(1, 'gRF0gNrPTd6', 'TEST', 0);

-- --------------------------------------------------------

--
-- Table structure for table `plugins`
--

CREATE TABLE `plugins` (
  `id` int(6) UNSIGNED NOT NULL,
  `name` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `is_installed` tinyint(1) UNSIGNED NOT NULL,
  `date_installed` int(10) UNSIGNED NOT NULL,
  `installed_by_user_id` int(10) UNSIGNED NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `plugins_cache`
--

CREATE TABLE `plugins_cache` (
  `id` int(6) UNSIGNED NOT NULL,
  `plugin_name` char(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `event_name` char(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MEMORY DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `plugins_cache`
--

INSERT INTO `plugins_cache` (`id`, `plugin_name`, `event_name`) VALUES
(1, 'not_found_11a6c', 'onPageLoad');

-- --------------------------------------------------------

--
-- Table structure for table `plugins_installed`
--

CREATE TABLE `plugins_installed` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `marketplace_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `plugins_tables`
--

CREATE TABLE `plugins_tables` (
  `id` int(11) NOT NULL,
  `table` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `idproduct` int(10) UNSIGNED NOT NULL,
  `code` varchar(11) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `idcategory` int(10) UNSIGNED NOT NULL,
  `title` varchar(300) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `fileproduct` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `linkproduct` varchar(250) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `imageproduct` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `ikey` varchar(15) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `description` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `numviews` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `numactionsok` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `idsocialpay` int(10) UNSIGNED NOT NULL,
  `type_product` tinyint(1) UNSIGNED NOT NULL COMMENT '1: Link   2: File',
  `created` int(10) UNSIGNED NOT NULL,
  `status` tinyint(3) UNSIGNED NOT NULL DEFAULT '1' COMMENT '0: inactive   1: active',
  `prev_download` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `last_download` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `prev_view` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `last_view` int(10) UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`idproduct`, `code`, `idcategory`, `title`, `fileproduct`, `linkproduct`, `imageproduct`, `ikey`, `description`, `numviews`, `numactionsok`, `idsocialpay`, `type_product`, `created`, `status`, `prev_download`, `last_download`, `prev_view`, `last_view`) VALUES
(1, 'gg', 1, 'hbbouhbiu gviu', '', 'https://google.com', '', 'ggg', 'blihbkh hb lhbkhu hvbkuhvk hv kjhk', 6, 0, 2, 1, 28022022, 1, 0, 0, 1646227237, 1646237216),
(2, '', 0, '', '', '', '', '', '', 0, 0, 2, 0, 12345678, 1, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `sections`
--

CREATE TABLE `sections` (
  `idsection` int(10) UNSIGNED NOT NULL,
  `section` varchar(11) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `texthtml` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `sections`
--

INSERT INTO `sections` (`idsection`, `section`, `texthtml`) VALUES
(1, 'about', 'My text html for section \"About\".'),
(2, 'privacy', 'My text html for section \"Privacy Policy\".'),
(3, 'termsofuse', 'My text html for section \"Terms of Use\".'),
(4, 'disclaimer', 'My text html for section \"Disclaimer\".'),
(5, 'contact', 'My text html for section \"Contact\".');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(10) UNSIGNED NOT NULL,
  `word` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `value` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `word`, `value`) VALUES
(1, 'SITE_TITLE', 'Social Store'),
(2, 'LANGUAGE', 'en'),
(3, 'THEME', 'default'),
(4, 'COMPANY', 'Koyllur Developers'),
(5, 'SITE_DESCRIPTION', 'social store'),
(6, 'SITE_KEYWORDS', 'social, store'),
(7, 'THEME_COLOR', 'yellow'),
(8, 'MY_FACEBOOK', 'http://www.facebook.com'),
(9, 'MY_TWITTER', 'http://www.twitter.com'),
(10, 'MY_YOUTUBE', 'http://www.youtube.com'),
(11, 'PRODUCTS_PER_PAGE', '5'),
(12, 'MOSTVIEWED_PER_PAGE', '12'),
(13, 'TOPLIST_PER_PAGE', '12'),
(14, 'FACEBOOK_ID', '1234567890'),
(15, 'ID_COOKIE', '39446339');

-- --------------------------------------------------------

--
-- Table structure for table `socialpay`
--

CREATE TABLE `socialpay` (
  `idsocialpay` int(10) UNSIGNED NOT NULL,
  `code` varchar(11) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `name_socialpay` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `fb_like_available` tinyint(1) UNSIGNED NOT NULL DEFAULT '0',
  `fb_like_url` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `gplus_available` tinyint(1) UNSIGNED NOT NULL,
  `gplus_url` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `tw_tweet_available` tinyint(1) UNSIGNED NOT NULL DEFAULT '0',
  `tw_tweet_url` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `tw_tweet_tweet` varchar(140) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `fb_share_available` tinyint(1) UNSIGNED NOT NULL DEFAULT '0',
  `fb_share_url` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `fb_share_caption` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `fb_share_description` varchar(300) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `tw_follow_available` tinyint(1) UNSIGNED NOT NULL DEFAULT '0',
  `tw_follow_url` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `in_share_available` tinyint(1) UNSIGNED NOT NULL DEFAULT '0',
  `in_share_url` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `created` int(10) UNSIGNED NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `socialpay`
--

INSERT INTO `socialpay` (`idsocialpay`, `code`, `name_socialpay`, `fb_like_available`, `fb_like_url`, `gplus_available`, `gplus_url`, `tw_tweet_available`, `tw_tweet_url`, `tw_tweet_tweet`, `fb_share_available`, `fb_share_url`, `fb_share_caption`, `fb_share_description`, `tw_follow_available`, `tw_follow_url`, `in_share_available`, `in_share_url`, `created`) VALUES
(1, 'dqqXzqhhXJj', 'Default SocialPay', 1, 'http://www.koyllur.com', 1, 'http://www.koyllur.com', 1, 'http://koyllur.com', 'Visit my Site Web ...', 0, 'http://www.codecanyon.com', '', '', 1, 'https://twitter.com/koyllurdev', 0, '', 1438699501),
(2, 'XXgkvaX6cF3', 'PAYTEST', 1, 'https://google.com', 0, '', 0, '', '', 0, '', '', '', 0, '', 0, '', 1646047666);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `iduser` int(11) NOT NULL,
  `code` varchar(11) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `firstname` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `lastname` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(150) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `validated` tinyint(1) NOT NULL DEFAULT '0',
  `datevalidated` int(10) UNSIGNED NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `language` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `previousaccess` int(10) UNSIGNED NOT NULL,
  `ippreviousaccess` bigint(20) UNSIGNED NOT NULL,
  `lastaccess` int(10) UNSIGNED NOT NULL,
  `iplastaccess` bigint(20) UNSIGNED NOT NULL,
  `lastclick` int(10) UNSIGNED NOT NULL,
  `is_admin` tinyint(1) UNSIGNED NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`iduser`, `code`, `firstname`, `lastname`, `email`, `password`, `validated`, `datevalidated`, `active`, `language`, `previousaccess`, `ippreviousaccess`, `lastaccess`, `iplastaccess`, `lastclick`, `is_admin`) VALUES
(1, 'v2a0YBx3bgB', 'Koyllur', 'Developers', 'demo@koyllur.com', 'e10adc3949ba59abbe56e057f20f883e', 0, 0, 1, '', 1435910349, 2130706433, 1646379068, 2130706433, 1646387748, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`idcategory`);

--
-- Indexes for table `plugins`
--
ALTER TABLE `plugins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `plugins_cache`
--
ALTER TABLE `plugins_cache`
  ADD PRIMARY KEY (`id`),
  ADD KEY `plugin_name` (`plugin_name`,`event_name`) USING BTREE;

--
-- Indexes for table `plugins_installed`
--
ALTER TABLE `plugins_installed`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `plugins_tables`
--
ALTER TABLE `plugins_tables`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `table` (`table`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`idproduct`);

--
-- Indexes for table `sections`
--
ALTER TABLE `sections`
  ADD PRIMARY KEY (`idsection`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `word` (`word`);

--
-- Indexes for table `socialpay`
--
ALTER TABLE `socialpay`
  ADD PRIMARY KEY (`idsocialpay`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`iduser`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `idcategory` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `plugins`
--
ALTER TABLE `plugins`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `plugins_cache`
--
ALTER TABLE `plugins_cache`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `plugins_installed`
--
ALTER TABLE `plugins_installed`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `plugins_tables`
--
ALTER TABLE `plugins_tables`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `idproduct` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `sections`
--
ALTER TABLE `sections`
  MODIFY `idsection` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `socialpay`
--
ALTER TABLE `socialpay`
  MODIFY `idsocialpay` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `iduser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
