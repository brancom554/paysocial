

CREATE TABLE IF NOT EXISTS `categories` (
  `idcategory` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `code` varchar(11) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `category` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `numproducts` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`idcategory`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

CREATE TABLE IF NOT EXISTS `plugins` (
  `id` int(6) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `is_installed` tinyint(1) unsigned NOT NULL,
  `date_installed` int(10) unsigned NOT NULL,
  `installed_by_user_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

CREATE TABLE IF NOT EXISTS `plugins_cache` (
  `id` int(6) unsigned NOT NULL AUTO_INCREMENT,
  `plugin_name` char(50) COLLATE utf8_unicode_ci NOT NULL,
  `event_name` char(50) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `plugin_name` (`plugin_name`,`event_name`) USING BTREE
) ENGINE=MEMORY  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

INSERT INTO `plugins_cache` (`id`, `plugin_name`, `event_name`) VALUES
(1, 'not_found_11a6c', 'onPageLoad');

CREATE TABLE IF NOT EXISTS `plugins_installed` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `marketplace_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

CREATE TABLE IF NOT EXISTS `plugins_tables` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `table` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `table` (`table`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

CREATE TABLE IF NOT EXISTS `products` (
  `idproduct` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `code` varchar(11) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `idcategory` int(10) unsigned NOT NULL,
  `title` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `fileproduct` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `linkproduct` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `imageproduct` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `ikey` varchar(15) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `numviews` int(10) unsigned NOT NULL DEFAULT '0',
  `numactionsok` int(10) unsigned NOT NULL DEFAULT '0',
  `idsocialpay` int(10) unsigned NOT NULL,
  `type_product` tinyint(1) unsigned NOT NULL COMMENT '1: Link   2: File',
  `created` int(10) unsigned NOT NULL,
  `status` tinyint(3) unsigned NOT NULL DEFAULT '1' COMMENT '0: inactive   1: active',
  `prev_download` int(10) unsigned NOT NULL,
  `last_download` int(10) unsigned NOT NULL,
  `prev_view` int(10) unsigned NOT NULL,
  `last_view` int(10) unsigned NOT NULL,
  PRIMARY KEY (`idproduct`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

CREATE TABLE IF NOT EXISTS `sections` (
  `idsection` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `section` varchar(11) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `texthtml` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`idsection`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=6 ;

INSERT INTO `sections` (`idsection`, `section`, `texthtml`) VALUES
(1, 'about', 'My text html for section "About".'),
(2, 'privacy', 'My text html for section "Privacy Policy".'),
(3, 'termsofuse', 'My text html for section "Terms of Use".'),
(4, 'disclaimer', 'My text html for section "Disclaimer".'),
(5, 'contact', 'My text html for section "Contact".');

CREATE TABLE IF NOT EXISTS `settings` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `word` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `value` text COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `word` (`word`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=16 ;

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

CREATE TABLE IF NOT EXISTS `socialpay` (
  `idsocialpay` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `code` varchar(11) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `name_socialpay` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `fb_like_available` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `fb_like_url` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `gplus_available` tinyint(1) unsigned NOT NULL,
  `gplus_url` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tw_tweet_available` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `tw_tweet_url` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tw_tweet_tweet` varchar(140) COLLATE utf8_unicode_ci NOT NULL,
  `fb_share_available` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `fb_share_url` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `fb_share_caption` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `fb_share_description` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `tw_follow_available` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `tw_follow_url` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `in_share_available` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `in_share_url` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created` int(10) unsigned NOT NULL,
  PRIMARY KEY (`idsocialpay`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

INSERT INTO `socialpay` (`idsocialpay`, `code`, `name_socialpay`, `fb_like_available`, `fb_like_url`, `gplus_available`, `gplus_url`, `tw_tweet_available`, `tw_tweet_url`, `tw_tweet_tweet`, `fb_share_available`, `fb_share_url`, `fb_share_caption`, `fb_share_description`, `tw_follow_available`, `tw_follow_url`, `in_share_available`, `in_share_url`, `created`) VALUES
(1, 'dqqXzqhhXJj', 'Default SocialPay', 1, 'http://www.koyllur.com', 1, 'http://www.koyllur.com', 1, 'http://koyllur.com', 'Visit my Site Web ...', 0, 'http://www.codecanyon.com', '', '', 1, 'https://twitter.com/koyllurdev', 0, '', 1438699501);

CREATE TABLE IF NOT EXISTS `users` (
  `iduser` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(11) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `firstname` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `lastname` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `validated` tinyint(1) NOT NULL DEFAULT '0',
  `datevalidated` int(10) unsigned NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `language` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `previousaccess` int(10) unsigned NOT NULL,
  `ippreviousaccess` bigint(20) unsigned NOT NULL,
  `lastaccess` int(10) unsigned NOT NULL,
  `iplastaccess` bigint(20) unsigned NOT NULL,
  `lastclick` int(10) unsigned NOT NULL,
  `is_admin` tinyint(1) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`iduser`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

INSERT INTO `users` (`iduser`, `code`, `firstname`, `lastname`, `email`, `password`, `validated`, `datevalidated`, `active`, `language`, `previousaccess`, `ippreviousaccess`, `lastaccess`, `iplastaccess`, `lastclick`, `is_admin`) VALUES
(1, 'v2a0YBx3bgB', 'Koyllur', 'Developers', 'demo@koyllur.com', 'e10adc3949ba59abbe56e057f20f883e', 0, 0, 1, '', 1435910349, 2130706433, 1439225390, 0, 1439232127, 1);

