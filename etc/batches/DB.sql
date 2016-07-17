-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 17, 2016 at 02:52 PM
-- Server version: 5.5.49-0ubuntu0.14.04.1
-- PHP Version: 5.5.9-1ubuntu4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `premard`
--

-- --------------------------------------------------------

--
-- Table structure for table `action_log`
--

CREATE TABLE IF NOT EXISTS `action_log` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ip` varchar(45) NOT NULL,
  `date_time` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `client`
--

CREATE TABLE IF NOT EXISTS `client` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `logo` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `client`
--

INSERT INTO `client` (`id`, `logo`) VALUES
(2, '57878cc477a71.png'),
(3, '57878cce218c6.png'),
(4, '57878cd7d5a1b.png'),
(5, '57878cdf27874.png'),
(6, '57878ce90b18b.png');

-- --------------------------------------------------------

--
-- Table structure for table `content`
--

CREATE TABLE IF NOT EXISTS `content` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category_id` tinyint(1) DEFAULT NULL,
  `sub_category_id` int(11) DEFAULT NULL,
  `label` varchar(255) DEFAULT NULL,
  `content` text,
  `content_type` tinyint(1) DEFAULT NULL,
  `order` int(11) DEFAULT NULL,
  `max` int(11) DEFAULT '255',
  `is_required` tinyint(1) DEFAULT '0',
  `is_multi_lang` tinyint(1) DEFAULT '0',
  `note` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=49 ;

--
-- Dumping data for table `content`
--

INSERT INTO `content` (`id`, `category_id`, `sub_category_id`, `label`, `content`, `content_type`, `order`, `max`, `is_required`, `is_multi_lang`, `note`) VALUES
(10, 1, NULL, 'title', NULL, 1, NULL, 50, 1, 1, NULL),
(11, 1, NULL, 'text', NULL, 2, NULL, NULL, 1, 1, ''),
(12, 1, NULL, 'programmers_title', NULL, 1, NULL, 45, 1, 1, ''),
(13, 1, NULL, 'programmers_value', '85', 1, NULL, NULL, 1, 0, ''),
(14, 1, NULL, 'marketers_title', NULL, 1, NULL, 45, 1, 1, ''),
(15, 1, NULL, 'marketers_value', '70', 1, NULL, NULL, 1, 0, ''),
(16, 1, NULL, 'business_analysts_title', NULL, 1, NULL, NULL, 1, 1, ''),
(17, 1, NULL, 'business_analysts_value', '75', 1, NULL, NULL, 1, 0, ''),
(18, 1, NULL, 'ui_ux_experts_title', NULL, 1, NULL, NULL, 1, 1, ''),
(19, 1, NULL, 'ui_ux_experts_value', '90', 1, NULL, NULL, 1, 0, ''),
(20, 2, NULL, 'title', NULL, 1, NULL, 45, 1, 1, ''),
(21, 3, NULL, 'title', NULL, 1, NULL, NULL, 1, 1, ''),
(22, 4, NULL, 'title', NULL, 1, NULL, NULL, 1, 1, ''),
(23, 4, NULL, 'first_goal', NULL, 2, NULL, NULL, 1, 1, ''),
(24, 4, NULL, 'second_goal', NULL, 2, NULL, NULL, 1, 1, ''),
(25, 4, NULL, 'third_goal', NULL, 2, NULL, NULL, 1, 1, ''),
(26, 4, NULL, 'page', '1', 4, NULL, NULL, 0, 0, ''),
(27, 5, NULL, 'title', NULL, 1, NULL, 45, 1, 1, ''),
(28, 5, NULL, 'text', NULL, 2, NULL, NULL, 1, 1, ''),
(29, 5, NULL, 'first_title', NULL, 1, NULL, 45, 1, 1, ''),
(30, 5, NULL, 'first_value', '80', 4, NULL, NULL, 1, 0, ''),
(31, 5, NULL, 'second_title', NULL, 1, NULL, 45, 1, 1, ''),
(32, 5, NULL, 'second_value', '70', 4, NULL, NULL, 1, 0, ''),
(33, 5, NULL, 'third_title', NULL, 1, NULL, NULL, 1, 1, ''),
(34, 5, NULL, 'third_value', '50', 4, NULL, NULL, 1, 0, ''),
(35, 6, NULL, 'text', NULL, 2, NULL, 400, 1, 1, '255 characters'),
(36, 7, NULL, 'top_title', NULL, 1, NULL, 255, 1, 1, ''),
(37, 7, NULL, 'bottom_title', NULL, 1, NULL, NULL, 1, 1, ''),
(38, 7, NULL, 'address', NULL, 2, NULL, NULL, 1, 1, ''),
(39, 7, NULL, 'phones', '+962 6 581 8 929,+962 6 581 8 92,+962 6 581 8 928', 5, NULL, NULL, 1, 0, ''),
(40, 7, NULL, 'emails', 'test@test.com,muhammad.wardany@mail.com', 5, NULL, NULL, 1, 0, ''),
(41, 7, NULL, 'facebook_url', 'https://www.facebook.com/', 1, NULL, NULL, 0, 0, ''),
(42, 7, NULL, 'twitter_url', 'https://www.facebook.com/', 1, NULL, NULL, 0, 0, ''),
(43, 7, NULL, 'pinterest_url', '', 1, NULL, NULL, 0, 0, ''),
(44, 7, NULL, 'google_plus_url', '', 1, NULL, NULL, 0, 0, ''),
(45, 7, NULL, 'instagram_url', '', 1, NULL, NULL, 0, 0, ''),
(46, 6, NULL, 'title', NULL, 1, NULL, 45, 1, 1, ''),
(47, 5, NULL, 'page', '', 4, NULL, NULL, 0, 0, ''),
(48, 6, NULL, 'page', '2', 4, NULL, NULL, 0, 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `content_translation`
--

CREATE TABLE IF NOT EXISTS `content_translation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `content_id` int(11) DEFAULT NULL,
  `language_id` int(11) DEFAULT NULL,
  `label` varchar(255) DEFAULT NULL,
  `content` text,
  `order` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_content_translation_1_idx` (`content_id`),
  KEY `fk_content_translation_2_idx` (`language_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=41 ;

--
-- Dumping data for table `content_translation`
--

INSERT INTO `content_translation` (`id`, `content_id`, `language_id`, `label`, `content`, `order`) VALUES
(19, 10, 4, 'Title', 'Team up with the Invention Experts', NULL),
(20, 11, 4, 'Text', 'The most important part of successfully getting your invention idea to market is to establish an experienced team with an array of critical skill sets. With our knowledge in product design, invention development, marketing and licensing, Enhance is the team that can help lift your invention to success ', NULL),
(21, 12, 4, 'Programmers Title', 'Programmers', NULL),
(22, 14, 4, 'Marketers Title', 'Marketers', NULL),
(23, 18, 4, 'Ui Ux Experts Title', 'Ui & Ux Experts', NULL),
(24, 16, 4, 'Business Analysts Title', 'Business Analysts', NULL),
(25, 20, 4, 'Title', 'WE ARE EXPERTS IN', NULL),
(26, 22, 4, 'Title', 'our Goals', NULL),
(27, 23, 4, 'First Goal', 'Growing as a world class\r\ntechnology solutions\r\ncompany. ', NULL),
(28, 24, 4, 'Second Goal', 'Building long-lasting\r\nrelationships with our\r\ncustomers. ', NULL),
(29, 25, 4, 'Third Goal', 'Delivering high quality,\r\ninnovative technology\r\nsolutions. ', NULL),
(30, 35, 4, 'Text', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry Lorem Ipsum has been the industry''s standard Lorem Ipsum is simply dummy text of the printing.\r\n\r\ntypesetting industry Lorem Ipsum has been the industry''s standard Lorem Ipsum is simply dummy text of the printing and nd typesetting industry standard. ', NULL),
(31, 36, 4, 'Top Title', 'We''d love to meet and talk about your project and discuss how can we be your best help. If you have a question, need advice or just want to say HI! ', NULL),
(32, 37, 4, 'Bottom Title', 'We’d love to hear from you! ', NULL),
(33, 38, 4, 'Address', 'Al Husseini Complex #53\r\nAbdulla Ghousheh St\r\n7th Floor, Office # 707 ', NULL),
(34, 21, 4, 'Title', 'how we do it', NULL),
(35, 27, 4, 'Title', 'our STRENGTH', NULL),
(36, 28, 4, 'Text', 'Our specialized team has extensive years of experience in solving complex business problems and deliver state of the art solutions to our clients and customers. ', NULL),
(37, 29, 4, 'First Title', 'Usability & Design', NULL),
(38, 31, 4, 'Second Title', 'Conceptual Analysis', NULL),
(39, 33, 4, 'Third Title', 'Programming', NULL),
(40, 46, 4, 'Title', 'Our Added Value', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `experts_in`
--

CREATE TABLE IF NOT EXISTS `experts_in` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `image` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `experts_in`
--

INSERT INTO `experts_in` (`id`, `image`) VALUES
(1, '578763a837b11.png'),
(2, '57876480c8d1c.png'),
(3, '5787648e15ffb.png'),
(4, '5787649a5ef28.png'),
(5, '578764b98bd41.png'),
(6, '578764ca8b6fb.png'),
(7, '578764d78ebe8.png');

-- --------------------------------------------------------

--
-- Table structure for table `experts_in_translation`
--

CREATE TABLE IF NOT EXISTS `experts_in_translation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `expert_id` int(11) DEFAULT NULL,
  `language_code` varchar(5) DEFAULT NULL,
  `title` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_experts_in_translation_1_idx` (`expert_id`),
  KEY `fk_experts_in_translation_2_idx` (`language_code`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `experts_in_translation`
--

INSERT INTO `experts_in_translation` (`id`, `expert_id`, `language_code`, `title`) VALUES
(3, 1, 'en', 'Mobile Experience'),
(4, 2, 'en', 'Mobile Experience'),
(5, 3, 'en', 'Mobile Experience'),
(6, 4, 'en', 'Mobile Experience'),
(7, 5, 'en', 'Mobile Experience'),
(8, 6, 'en', 'Mobile Experience'),
(9, 7, 'en', 'Mobile Experience');

-- --------------------------------------------------------

--
-- Table structure for table `home_slider`
--

CREATE TABLE IF NOT EXISTS `home_slider` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `page_id` int(11) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_home_slider_1_idx` (`page_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `home_slider`
--

INSERT INTO `home_slider` (`id`, `page_id`, `image`) VALUES
(5, NULL, '578654cd2356a.jpg'),
(6, NULL, '578654eabb82d.jpg'),
(7, 1, '5787534bd3117.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `home_slider_translation`
--

CREATE TABLE IF NOT EXISTS `home_slider_translation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `slide_id` int(11) NOT NULL,
  `language_code` varchar(5) NOT NULL,
  `title` varchar(45) NOT NULL,
  `text` varchar(255) DEFAULT NULL,
  `linktext` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_home_slider_translation_1_idx` (`slide_id`),
  KEY `fk_home_slider_translation_5_idx` (`language_code`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=28 ;

--
-- Dumping data for table `home_slider_translation`
--

INSERT INTO `home_slider_translation` (`id`, `slide_id`, `language_code`, `title`, `text`, `linktext`) VALUES
(21, 5, 'en', 'WORLD CLASS INNOVATIVE SOLUTIONS !', 'License your Invention', NULL),
(25, 7, 'en', 'WORLD CLASS INNOVATIVE SOLUTIONS !', 'english text eeeee', NULL),
(27, 6, 'en', 'WORLD CLASS INNOVATIVE SOLUTIONS !', '', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `image`
--

CREATE TABLE IF NOT EXISTS `image` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category_id` int(11) DEFAULT NULL,
  `sub_category_id` int(11) DEFAULT NULL,
  `image` varchar(255) NOT NULL,
  `width` int(11) DEFAULT NULL,
  `height` int(11) DEFAULT NULL,
  `text` text,
  `max` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `image`
--

INSERT INTO `image` (`id`, `category_id`, `sub_category_id`, `image`, `width`, `height`, `text`, `max`) VALUES
(1, 3, NULL, '5787766ba71e3.jpg', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `language`
--

CREATE TABLE IF NOT EXISTS `language` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(5) DEFAULT NULL,
  `title` varchar(45) DEFAULT NULL,
  `flag` varchar(255) DEFAULT NULL,
  `is_default` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `language`
--

INSERT INTO `language` (`id`, `code`, `title`, `flag`, `is_default`) VALUES
(4, 'en', 'English', '', '1');

-- --------------------------------------------------------

--
-- Table structure for table `mailer`
--

CREATE TABLE IF NOT EXISTS `mailer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `host` varchar(255) DEFAULT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `port` int(11) DEFAULT NULL,
  `encryption` varchar(255) DEFAULT NULL,
  `incoming_server` varchar(255) DEFAULT NULL,
  `imap_port` varchar(255) DEFAULT NULL,
  `outgoing_server` varchar(255) DEFAULT NULL,
  `smtp_port` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `title` (`title`),
  UNIQUE KEY `slug` (`slug`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `mailer`
--

INSERT INTO `mailer` (`id`, `type`, `title`, `slug`, `host`, `username`, `password`, `port`, `encryption`, `incoming_server`, `imap_port`, `outgoing_server`, `smtp_port`) VALUES
(1, 1, 'contact email', 'contact_mail', 'whm.premait.solutions', 'developers@egypt.premait.solutions', 'FrbgUSVG5K?#', 587, '', 'premait.me', '993', 'premait.me', '110'),
(2, 1, 'reset password email', 'support_mail', 'whm.premait.solutions', 'developers@egypt.premait.solutions', 'FrbgUSVG5K?#', 587, '', 'premait.me', '993', 'premait.me', '110');

-- --------------------------------------------------------

--
-- Table structure for table `page`
--

CREATE TABLE IF NOT EXISTS `page` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `image` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `page`
--

INSERT INTO `page` (`id`, `image`) VALUES
(1, '5785efefb254b.jpg'),
(2, '578782ad7cb62.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `page_translation`
--

CREATE TABLE IF NOT EXISTS `page_translation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `language_code` varchar(5) DEFAULT NULL,
  `page_id` int(11) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `body` longtext,
  PRIMARY KEY (`id`),
  KEY `fk_page_translation_2_idx` (`page_id`),
  KEY `fk_page_translation_12_idx` (`language_code`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `page_translation`
--

INSERT INTO `page_translation` (`id`, `language_code`, `page_id`, `title`, `body`) VALUES
(4, 'en', 1, 'page title 1', '<p><img alt="" src="/pages-media/1468401356_943205_10200824223261791_1002596456_n.jpg" style="height:720px; width:960px" />test test test</p>\r\n'),
(6, 'en', 2, 'page title 1', '');

-- --------------------------------------------------------

--
-- Table structure for table `portfolio`
--

CREATE TABLE IF NOT EXISTS `portfolio` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `page_id` int(11) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_portfolio_1_idx` (`page_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `portfolio`
--

INSERT INTO `portfolio` (`id`, `page_id`, `image`) VALUES
(5, 1, '5787781f210fd.jpg'),
(6, 1, '578778349326f.jpg'),
(7, 2, '57878318d61f2.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `portfolio_translation`
--

CREATE TABLE IF NOT EXISTS `portfolio_translation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `slide_id` int(11) NOT NULL,
  `language_code` varchar(5) NOT NULL,
  `title` varchar(45) NOT NULL,
  `text` varchar(255) DEFAULT NULL,
  `link_text` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_portfolio_translation_1_idx` (`slide_id`),
  KEY `fk_portfolio_translation_5_idx` (`language_code`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=32 ;

--
-- Dumping data for table `portfolio_translation`
--

INSERT INTO `portfolio_translation` (`id`, `slide_id`, `language_code`, `title`, `text`, `link_text`) VALUES
(28, 6, 'en', 'Write in Arabic', 'the first mobile app for kids to', 'VIEW CASE STUDY'),
(30, 7, 'en', 'Write in Arabic', 'the first mobile app for kids to', 'VIEW CASE STUDY'),
(31, 5, 'en', 'Write in Arabic', 'the first mobile app for kids to', ' VIEW CASE STUDY');

-- --------------------------------------------------------

--
-- Table structure for table `setting`
--

CREATE TABLE IF NOT EXISTS `setting` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `field` varchar(45) DEFAULT NULL,
  `encrypt` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;


--
-- Constraints for dumped tables
--

--
-- Constraints for table `content_translation`
--
ALTER TABLE `content_translation`
  ADD CONSTRAINT `fk_content_translation_1` FOREIGN KEY (`content_id`) REFERENCES `content` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_content_translation_2` FOREIGN KEY (`language_id`) REFERENCES `language` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `experts_in_translation`
--
ALTER TABLE `experts_in_translation`
  ADD CONSTRAINT `fk_experts_in_translation_1` FOREIGN KEY (`expert_id`) REFERENCES `experts_in` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `home_slider`
--
ALTER TABLE `home_slider`
  ADD CONSTRAINT `fk_home_slider_1` FOREIGN KEY (`page_id`) REFERENCES `page` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `home_slider_translation`
--
ALTER TABLE `home_slider_translation`
  ADD CONSTRAINT `fk_home_slider_translation_1` FOREIGN KEY (`slide_id`) REFERENCES `home_slider` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `page_translation`
--
ALTER TABLE `page_translation`
  ADD CONSTRAINT `fk_page_translation_2` FOREIGN KEY (`page_id`) REFERENCES `page` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `portfolio`
--
ALTER TABLE `portfolio`
  ADD CONSTRAINT `fk_portfolio_1` FOREIGN KEY (`page_id`) REFERENCES `page` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `portfolio_translation`
--
ALTER TABLE `portfolio_translation`
  ADD CONSTRAINT `fk_portfolio_translation_1` FOREIGN KEY (`slide_id`) REFERENCES `portfolio` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

-- --------------------------------------------------------

