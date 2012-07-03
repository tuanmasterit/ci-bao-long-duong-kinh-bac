-- phpMyAdmin SQL Dump
-- version 3.4.10.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 03, 2012 at 03:42 PM
-- Server version: 5.5.8
-- PHP Version: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `db_baolong`
--

-- --------------------------------------------------------

--
-- Table structure for table `ci_commentmeta`
--

CREATE TABLE IF NOT EXISTS `ci_commentmeta` (
  `meta_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `comment_id` bigint(20) unsigned NOT NULL DEFAULT '0',
  `meta_key` varchar(255) DEFAULT NULL,
  `meta_value` longtext,
  PRIMARY KEY (`meta_id`),
  KEY `comment_id` (`comment_id`),
  KEY `meta_key` (`meta_key`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `ci_comments`
--

CREATE TABLE IF NOT EXISTS `ci_comments` (
  `comment_ID` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `comment_post_ID` bigint(20) unsigned NOT NULL DEFAULT '0',
  `comment_author` tinytext NOT NULL,
  `comment_author_email` varchar(100) NOT NULL DEFAULT '',
  `comment_author_url` varchar(200) NOT NULL DEFAULT '',
  `comment_author_IP` varchar(100) NOT NULL DEFAULT '',
  `comment_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `comment_date_gmt` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `comment_content` text NOT NULL,
  `comment_karma` int(11) NOT NULL DEFAULT '0',
  `comment_approved` varchar(20) NOT NULL DEFAULT '1',
  `comment_agent` varchar(255) NOT NULL DEFAULT '',
  `comment_type` varchar(20) NOT NULL DEFAULT '',
  `comment_parent` bigint(20) unsigned NOT NULL DEFAULT '0',
  `user_id` bigint(20) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`comment_ID`),
  KEY `comment_approved` (`comment_approved`),
  KEY `comment_post_ID` (`comment_post_ID`),
  KEY `comment_approved_date_gmt` (`comment_approved`,`comment_date_gmt`),
  KEY `comment_date_gmt` (`comment_date_gmt`),
  KEY `comment_parent` (`comment_parent`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `ci_comments`
--

INSERT INTO `ci_comments` (`comment_ID`, `comment_post_ID`, `comment_author`, `comment_author_email`, `comment_author_url`, `comment_author_IP`, `comment_date`, `comment_date_gmt`, `comment_content`, `comment_karma`, `comment_approved`, `comment_agent`, `comment_type`, `comment_parent`, `user_id`) VALUES
(1, 1, 'Mr WordPress', '', 'http://wordpress.org/', '', '2012-06-12 15:26:35', '2012-06-12 15:26:35', 'Hi, this is a comment.<br />To delete a comment, just log in and view the post&#039;s comments. There you will have the option to edit or delete them.', 0, '1', '', '', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `ci_links`
--

CREATE TABLE IF NOT EXISTS `ci_links` (
  `link_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `link_url` varchar(255) NOT NULL DEFAULT '',
  `link_name` varchar(255) NOT NULL DEFAULT '',
  `link_image` varchar(255) NOT NULL DEFAULT '',
  `link_target` varchar(25) NOT NULL DEFAULT '',
  `link_description` varchar(255) NOT NULL DEFAULT '',
  `link_visible` varchar(20) NOT NULL DEFAULT 'Y',
  `link_owner` bigint(20) unsigned NOT NULL DEFAULT '1',
  `link_rating` int(11) NOT NULL DEFAULT '0',
  `link_updated` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `link_rel` varchar(255) NOT NULL DEFAULT '',
  `link_notes` mediumtext NOT NULL,
  `link_rss` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`link_id`),
  KEY `link_visible` (`link_visible`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `ci_links`
--

INSERT INTO `ci_links` (`link_id`, `link_url`, `link_name`, `link_image`, `link_target`, `link_description`, `link_visible`, `link_owner`, `link_rating`, `link_updated`, `link_rel`, `link_notes`, `link_rss`) VALUES
(1, 'http://codex.wordpress.org/', 'Documentation', '', '', '', 'Y', 1, 0, '0000-00-00 00:00:00', '', '', ''),
(2, 'http://wordpress.org/news/', 'WordPress Blog', '', '', '', 'Y', 1, 0, '0000-00-00 00:00:00', '', '', 'http://wordpress.org/news/feed/'),
(3, 'http://wordpress.org/extend/ideas/', 'Suggest Ideas', '', '', '', 'Y', 1, 0, '0000-00-00 00:00:00', '', '', ''),
(4, 'http://wordpress.org/support/', 'Support Forum', '', '', '', 'Y', 1, 0, '0000-00-00 00:00:00', '', '', ''),
(5, 'http://wordpress.org/extend/plugins/', 'Plugins', '', '', '', 'Y', 1, 0, '0000-00-00 00:00:00', '', '', ''),
(6, 'http://wordpress.org/extend/themes/', 'Themes', '', '', '', 'Y', 1, 0, '0000-00-00 00:00:00', '', '', ''),
(7, 'http://planet.wordpress.org/', 'WordPress Planet', '', '', '', 'Y', 1, 0, '0000-00-00 00:00:00', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `ci_options`
--

CREATE TABLE IF NOT EXISTS `ci_options` (
  `option_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `blog_id` int(11) NOT NULL DEFAULT '0',
  `option_name` varchar(64) NOT NULL DEFAULT '',
  `option_value` longtext NOT NULL,
  `autoload` varchar(20) NOT NULL DEFAULT 'yes',
  PRIMARY KEY (`option_id`),
  UNIQUE KEY `option_name` (`option_name`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=107 ;

--
-- Dumping data for table `ci_options`
--

INSERT INTO `ci_options` (`option_id`, `blog_id`, `option_name`, `option_value`, `autoload`) VALUES
(1, 0, '_site_transient_timeout_theme_roots', '1339521994', 'yes'),
(2, 0, '_site_transient_theme_roots', 'a:2:{s:12:"twentyeleven";s:7:"/themes";s:9:"twentyten";s:7:"/themes";}', 'yes'),
(3, 0, 'siteurl', 'http://localhost/wordpress', 'yes'),
(4, 0, 'blogname', 'Bút Danh', 'yes'),
(5, 0, 'blogdescription', 'Just another WordPress site', 'yes'),
(6, 0, 'users_can_register', '0', 'yes'),
(7, 0, 'admin_email', 'vinhnt@tasvis.com.vn', 'yes'),
(8, 0, 'start_of_week', '1', 'yes'),
(9, 0, 'use_balanceTags', '0', 'yes'),
(10, 0, 'use_smilies', '1', 'yes'),
(11, 0, 'require_name_email', '1', 'yes'),
(12, 0, 'comments_notify', '1', 'yes'),
(13, 0, 'posts_per_rss', '10', 'yes'),
(14, 0, 'rss_use_excerpt', '0', 'yes'),
(15, 0, 'mailserver_url', 'mail.example.com', 'yes'),
(16, 0, 'mailserver_login', 'login@example.com', 'yes'),
(17, 0, 'mailserver_pass', 'password', 'yes'),
(18, 0, 'mailserver_port', '110', 'yes'),
(19, 0, 'default_category', '1', 'yes'),
(20, 0, 'default_comment_status', 'open', 'yes'),
(21, 0, 'default_ping_status', 'open', 'yes'),
(22, 0, 'default_pingback_flag', '1', 'yes'),
(23, 0, 'default_post_edit_rows', '20', 'yes'),
(24, 0, 'posts_per_page', '10', 'yes'),
(25, 0, 'date_format', 'F j, Y', 'yes'),
(26, 0, 'time_format', 'g:i a', 'yes'),
(27, 0, 'links_updated_date_format', 'F j, Y g:i a', 'yes'),
(28, 0, 'links_recently_updated_prepend', '<em>', 'yes'),
(29, 0, 'links_recently_updated_append', '</em>', 'yes'),
(30, 0, 'links_recently_updated_time', '120', 'yes'),
(31, 0, 'comment_moderation', '0', 'yes'),
(32, 0, 'moderation_notify', '1', 'yes'),
(33, 0, 'permalink_structure', '', 'yes'),
(34, 0, 'gzipcompression', '0', 'yes'),
(35, 0, 'hack_file', '0', 'yes'),
(36, 0, 'blog_charset', 'UTF-8', 'yes'),
(37, 0, 'moderation_keys', '', 'no'),
(38, 0, 'active_plugins', 'a:0:{}', 'yes'),
(39, 0, 'home', 'http://localhost/wordpress', 'yes'),
(40, 0, 'category_base', '', 'yes'),
(41, 0, 'ping_sites', 'http://rpc.pingomatic.com/', 'yes'),
(42, 0, 'advanced_edit', '0', 'yes'),
(43, 0, 'comment_max_links', '2', 'yes'),
(44, 0, 'gmt_offset', '0', 'yes'),
(45, 0, 'default_email_category', '1', 'yes'),
(46, 0, 'recently_edited', '', 'no'),
(47, 0, 'template', 'twentyeleven', 'yes'),
(48, 0, 'stylesheet', 'twentyeleven', 'yes'),
(49, 0, 'comment_whitelist', '1', 'yes'),
(50, 0, 'blacklist_keys', '', 'no'),
(51, 0, 'comment_registration', '0', 'yes'),
(52, 0, 'rss_language', 'en', 'yes'),
(53, 0, 'html_type', 'text/html', 'yes'),
(54, 0, 'use_trackback', '0', 'yes'),
(55, 0, 'default_role', 'subscriber', 'yes'),
(56, 0, 'db_version', '19470', 'yes'),
(57, 0, 'uploads_use_yearmonth_folders', '1', 'yes'),
(58, 0, 'upload_path', '', 'yes'),
(59, 0, 'blog_public', '1', 'yes'),
(60, 0, 'default_link_category', '2', 'yes'),
(61, 0, 'show_on_front', 'posts', 'yes'),
(62, 0, 'tag_base', '', 'yes'),
(63, 0, 'show_avatars', '1', 'yes'),
(64, 0, 'avatar_rating', 'G', 'yes'),
(65, 0, 'upload_url_path', '', 'yes'),
(66, 0, 'thumbnail_size_w', '150', 'yes'),
(67, 0, 'thumbnail_size_h', '150', 'yes'),
(68, 0, 'thumbnail_crop', '1', 'yes'),
(69, 0, 'medium_size_w', '300', 'yes'),
(70, 0, 'medium_size_h', '300', 'yes'),
(71, 0, 'avatar_default', 'mystery', 'yes'),
(72, 0, 'enable_app', '0', 'yes'),
(73, 0, 'enable_xmlrpc', '0', 'yes'),
(74, 0, 'large_size_w', '1024', 'yes'),
(75, 0, 'large_size_h', '1024', 'yes'),
(76, 0, 'image_default_link_type', 'file', 'yes'),
(77, 0, 'image_default_size', '', 'yes'),
(78, 0, 'image_default_align', '', 'yes'),
(79, 0, 'close_comments_for_old_posts', '0', 'yes'),
(80, 0, 'close_comments_days_old', '14', 'yes'),
(81, 0, 'thread_comments', '1', 'yes'),
(82, 0, 'thread_comments_depth', '5', 'yes'),
(83, 0, 'page_comments', '0', 'yes'),
(84, 0, 'comments_per_page', '50', 'yes'),
(85, 0, 'default_comments_page', 'newest', 'yes'),
(86, 0, 'comment_order', 'asc', 'yes'),
(87, 0, 'sticky_posts', 'a:0:{}', 'yes'),
(88, 0, 'widget_categories', 'a:2:{i:2;a:4:{s:5:"title";s:0:"";s:5:"count";i:0;s:12:"hierarchical";i:0;s:8:"dropdown";i:0;}s:12:"_multiwidget";i:1;}', 'yes'),
(89, 0, 'widget_text', 'a:0:{}', 'yes'),
(90, 0, 'widget_rss', 'a:0:{}', 'yes'),
(91, 0, 'timezone_string', '', 'yes'),
(92, 0, 'embed_autourls', '1', 'yes'),
(93, 0, 'embed_size_w', '', 'yes'),
(94, 0, 'embed_size_h', '600', 'yes'),
(95, 0, 'page_for_posts', '0', 'yes'),
(96, 0, 'page_on_front', '0', 'yes'),
(97, 0, 'default_post_format', '0', 'yes'),
(98, 0, 'initial_db_version', '19470', 'yes'),
(99, 0, 'ci_user_roles', 'a:5:{s:13:"administrator";a:2:{s:4:"name";s:13:"Administrator";s:12:"capabilities";a:62:{s:13:"switch_themes";b:1;s:11:"edit_themes";b:1;s:16:"activate_plugins";b:1;s:12:"edit_plugins";b:1;s:10:"edit_users";b:1;s:10:"edit_files";b:1;s:14:"manage_options";b:1;s:17:"moderate_comments";b:1;s:17:"manage_categories";b:1;s:12:"manage_links";b:1;s:12:"upload_files";b:1;s:6:"import";b:1;s:15:"unfiltered_html";b:1;s:10:"edit_posts";b:1;s:17:"edit_others_posts";b:1;s:20:"edit_published_posts";b:1;s:13:"publish_posts";b:1;s:10:"edit_pages";b:1;s:4:"read";b:1;s:8:"level_10";b:1;s:7:"level_9";b:1;s:7:"level_8";b:1;s:7:"level_7";b:1;s:7:"level_6";b:1;s:7:"level_5";b:1;s:7:"level_4";b:1;s:7:"level_3";b:1;s:7:"level_2";b:1;s:7:"level_1";b:1;s:7:"level_0";b:1;s:17:"edit_others_pages";b:1;s:20:"edit_published_pages";b:1;s:13:"publish_pages";b:1;s:12:"delete_pages";b:1;s:19:"delete_others_pages";b:1;s:22:"delete_published_pages";b:1;s:12:"delete_posts";b:1;s:19:"delete_others_posts";b:1;s:22:"delete_published_posts";b:1;s:20:"delete_private_posts";b:1;s:18:"edit_private_posts";b:1;s:18:"read_private_posts";b:1;s:20:"delete_private_pages";b:1;s:18:"edit_private_pages";b:1;s:18:"read_private_pages";b:1;s:12:"delete_users";b:1;s:12:"create_users";b:1;s:17:"unfiltered_upload";b:1;s:14:"edit_dashboard";b:1;s:14:"update_plugins";b:1;s:14:"delete_plugins";b:1;s:15:"install_plugins";b:1;s:13:"update_themes";b:1;s:14:"install_themes";b:1;s:11:"update_core";b:1;s:10:"list_users";b:1;s:12:"remove_users";b:1;s:9:"add_users";b:1;s:13:"promote_users";b:1;s:18:"edit_theme_options";b:1;s:13:"delete_themes";b:1;s:6:"export";b:1;}}s:6:"editor";a:2:{s:4:"name";s:6:"Editor";s:12:"capabilities";a:34:{s:17:"moderate_comments";b:1;s:17:"manage_categories";b:1;s:12:"manage_links";b:1;s:12:"upload_files";b:1;s:15:"unfiltered_html";b:1;s:10:"edit_posts";b:1;s:17:"edit_others_posts";b:1;s:20:"edit_published_posts";b:1;s:13:"publish_posts";b:1;s:10:"edit_pages";b:1;s:4:"read";b:1;s:7:"level_7";b:1;s:7:"level_6";b:1;s:7:"level_5";b:1;s:7:"level_4";b:1;s:7:"level_3";b:1;s:7:"level_2";b:1;s:7:"level_1";b:1;s:7:"level_0";b:1;s:17:"edit_others_pages";b:1;s:20:"edit_published_pages";b:1;s:13:"publish_pages";b:1;s:12:"delete_pages";b:1;s:19:"delete_others_pages";b:1;s:22:"delete_published_pages";b:1;s:12:"delete_posts";b:1;s:19:"delete_others_posts";b:1;s:22:"delete_published_posts";b:1;s:20:"delete_private_posts";b:1;s:18:"edit_private_posts";b:1;s:18:"read_private_posts";b:1;s:20:"delete_private_pages";b:1;s:18:"edit_private_pages";b:1;s:18:"read_private_pages";b:1;}}s:6:"author";a:2:{s:4:"name";s:6:"Author";s:12:"capabilities";a:10:{s:12:"upload_files";b:1;s:10:"edit_posts";b:1;s:20:"edit_published_posts";b:1;s:13:"publish_posts";b:1;s:4:"read";b:1;s:7:"level_2";b:1;s:7:"level_1";b:1;s:7:"level_0";b:1;s:12:"delete_posts";b:1;s:22:"delete_published_posts";b:1;}}s:11:"contributor";a:2:{s:4:"name";s:11:"Contributor";s:12:"capabilities";a:5:{s:10:"edit_posts";b:1;s:4:"read";b:1;s:7:"level_1";b:1;s:7:"level_0";b:1;s:12:"delete_posts";b:1;}}s:10:"subscriber";a:2:{s:4:"name";s:10:"Subscriber";s:12:"capabilities";a:2:{s:4:"read";b:1;s:7:"level_0";b:1;}}}', 'yes'),
(100, 0, 'widget_search', 'a:2:{i:2;a:1:{s:5:"title";s:0:"";}s:12:"_multiwidget";i:1;}', 'yes'),
(101, 0, 'widget_recent-posts', 'a:2:{i:2;a:2:{s:5:"title";s:0:"";s:6:"number";i:5;}s:12:"_multiwidget";i:1;}', 'yes'),
(102, 0, 'widget_recent-comments', 'a:2:{i:2;a:2:{s:5:"title";s:0:"";s:6:"number";i:5;}s:12:"_multiwidget";i:1;}', 'yes'),
(103, 0, 'widget_archives', 'a:2:{i:2;a:3:{s:5:"title";s:0:"";s:5:"count";i:0;s:8:"dropdown";i:0;}s:12:"_multiwidget";i:1;}', 'yes'),
(104, 0, 'widget_meta', 'a:2:{i:2;a:1:{s:5:"title";s:0:"";}s:12:"_multiwidget";i:1;}', 'yes'),
(105, 0, 'sidebars_widgets', 'a:7:{s:19:"wp_inactive_widgets";a:0:{}s:9:"sidebar-1";a:6:{i:0;s:8:"search-2";i:1;s:14:"recent-posts-2";i:2;s:17:"recent-comments-2";i:3;s:10:"archives-2";i:4;s:12:"categories-2";i:5;s:6:"meta-2";}s:9:"sidebar-2";a:0:{}s:9:"sidebar-3";a:0:{}s:9:"sidebar-4";a:0:{}s:9:"sidebar-5";a:0:{}s:13:"array_version";i:3;}', 'yes'),
(106, 0, 'cron', 'a:2:{i:1339514800;a:3:{s:16:"wp_version_check";a:1:{s:32:"40cd750bba9870f18aada2478b24840a";a:3:{s:8:"schedule";s:10:"twicedaily";s:4:"args";a:0:{}s:8:"interval";i:43200;}}s:17:"wp_update_plugins";a:1:{s:32:"40cd750bba9870f18aada2478b24840a";a:3:{s:8:"schedule";s:10:"twicedaily";s:4:"args";a:0:{}s:8:"interval";i:43200;}}s:16:"wp_update_themes";a:1:{s:32:"40cd750bba9870f18aada2478b24840a";a:3:{s:8:"schedule";s:10:"twicedaily";s:4:"args";a:0:{}s:8:"interval";i:43200;}}}s:7:"version";i:2;}', 'yes');

-- --------------------------------------------------------

--
-- Table structure for table `ci_postmeta`
--

CREATE TABLE IF NOT EXISTS `ci_postmeta` (
  `meta_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `post_id` bigint(20) unsigned NOT NULL DEFAULT '0',
  `meta_key` varchar(255) DEFAULT NULL,
  `meta_value` longtext,
  PRIMARY KEY (`meta_id`),
  KEY `post_id` (`post_id`),
  KEY `meta_key` (`meta_key`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=39 ;

--
-- Dumping data for table `ci_postmeta`
--

INSERT INTO `ci_postmeta` (`meta_id`, `post_id`, `meta_key`, `meta_value`) VALUES
(1, 19, 'featured_image', '/baolong/application/elfinder/php/../files/hoa-long.png'),
(2, 19, 'giathitruong', '35,000 VND'),
(3, 20, 'featured_image', '/baolong/application/elfinder/php/../files/con%20xoa%20bop.gif'),
(4, 20, 'giathitruong', '20,000 VND'),
(5, 21, 'featured_image', '/baolong/application/elfinder/php/../files/nuoc%20suc%20mieng%20da%20hoa%20tieu.gif'),
(6, 21, 'giathitruong', '35,000 VND'),
(7, 22, 'featured_image', '/baolong/application/elfinder/php/../files/tiem%20long.gif'),
(8, 22, 'giathitruong', '35,000 VND'),
(9, 13, 'featured_image', '/baolong/application/elfinder/php/../files/hoa-long.png'),
(10, 13, 'giathitruong', '35,000 VND'),
(11, 14, 'featured_image', '/baolong/application/elfinder/php/../files/sieu%20nhan%20tieu%20bao.gif'),
(12, 14, 'giathitruong', '48,000 VND'),
(13, 15, 'featured_image', '/baolong/application/elfinder/php/../files/Tra-thanh-long-3d.png'),
(14, 15, 'giathitruong', '30,000 VND'),
(15, 16, 'featured_image', '/baolong/application/elfinder/php/../files/bach-long-thuy.png'),
(16, 16, 'giathitruong', '25,000 VND'),
(17, 17, 'featured_image', '/baolong/application/elfinder/php/../files/ngoc-duong-sam.png'),
(18, 17, 'giathitruong', '300,000 VND'),
(19, 18, 'featured_image', ''),
(20, 18, 'giathitruong', '250,000 VND'),
(21, 9, 'featured_image', '/baolong/application/elfinder/php/../files/thutuonglao.jpg'),
(23, 11, 'featured_image', '/baolong/application/elfinder/php/../files/thutuonglao.jpg'),
(24, 8, 'featured_image', '/baolong/application/elfinder/php/../files/voykisu.jpg'),
(25, 12, 'featured_image', '/baolong/application/elfinder/php/../files/thutuonglao.jpg'),
(26, 23, 'featured_image', '/baolong/application/elfinder/php/../files/lon-sam-quy.png'),
(27, 23, 'giathitruong', '10,000 VND'),
(28, 24, 'featured_image', '/baolong/application/elfinder/php/../files/bo%20than%20hoan%20mem.gif'),
(29, 24, 'giathitruong', '100,000 VND'),
(34, 27, 'featured_image', '/baolong/application/elfinder/php/../files/sam-ngoc-duong.gif'),
(32, 26, 'featured_image', '/baolong/application/elfinder/php/../files/ruou-vang-dau.gif'),
(33, 26, 'giathitruong', '200,000 VND'),
(35, 27, 'giathitruong', '300,000 VND'),
(36, 28, 'featured_image', '/baolong/application/elfinder/php/../files/linh-chi-luc-vi.gif'),
(37, 28, 'giathitruong', '35,000 VND'),
(38, 29, 'featured_image', '/baolong/application/elfinder/php/../files/nhieu-nan-nhan-chi-biet-than-than-trach-phan-khi-sap-bay-phong-kham-bac-si-chui.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `ci_posts`
--

CREATE TABLE IF NOT EXISTS `ci_posts` (
  `ID` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `post_author` bigint(20) unsigned NOT NULL DEFAULT '0',
  `post_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `post_date_gmt` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `post_content` longtext NOT NULL,
  `post_title` text NOT NULL,
  `post_excerpt` text NOT NULL,
  `post_status` varchar(20) NOT NULL DEFAULT 'publish',
  `comment_status` varchar(20) NOT NULL DEFAULT 'open',
  `ping_status` varchar(20) NOT NULL DEFAULT 'open',
  `post_password` varchar(20) NOT NULL DEFAULT '',
  `post_name` varchar(200) NOT NULL DEFAULT '',
  `to_ping` text NOT NULL,
  `pinged` text NOT NULL,
  `post_modified` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `post_modified_gmt` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `post_content_filtered` text NOT NULL,
  `post_parent` bigint(20) unsigned NOT NULL DEFAULT '0',
  `guid` varchar(255) NOT NULL DEFAULT '',
  `menu_order` int(11) NOT NULL DEFAULT '0',
  `post_type` varchar(20) NOT NULL DEFAULT 'post',
  `post_mime_type` varchar(100) NOT NULL DEFAULT '',
  `comment_count` bigint(20) NOT NULL DEFAULT '0',
  PRIMARY KEY (`ID`),
  KEY `post_name` (`post_name`),
  KEY `type_status_date` (`post_type`,`post_status`,`post_date`,`ID`),
  KEY `post_parent` (`post_parent`),
  KEY `post_author` (`post_author`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=30 ;

--
-- Dumping data for table `ci_posts`
--

INSERT INTO `ci_posts` (`ID`, `post_author`, `post_date`, `post_date_gmt`, `post_content`, `post_title`, `post_excerpt`, `post_status`, `comment_status`, `ping_status`, `post_password`, `post_name`, `to_ping`, `pinged`, `post_modified`, `post_modified_gmt`, `post_content_filtered`, `post_parent`, `guid`, `menu_order`, `post_type`, `post_mime_type`, `comment_count`) VALUES
(1, 1, '2012-06-12 15:26:35', '2012-06-12 15:26:35', 'Welcome to WordPress. This is your first post. Edit or delete it, then start blogging!', 'Hello world!', '', 'publish', 'open', 'open', '', 'hello-world', '', '', '2012-06-12 15:26:35', '2012-06-12 15:26:35', '', 0, 'http://localhost/wordpress/?p=1', 0, 'post', '', 1),
(2, 1, '2012-06-12 15:26:35', '2012-06-12 15:26:35', 'This is an example page. It''s different from a blog post because it will stay in one place and will show up in your site navigation (in most themes). Most people start with an About page that introduces them to potential site visitors. It might say something like this:\n\n<blockquote>Hi there! I''m a bike messenger by day, aspiring actor by night, and this is my blog. I live in Los Angeles, have a great dog named Jack, and I like pi&#241;a coladas. (And gettin'' caught in the rain.)</blockquote>\n\n...or something like this:\n\n<blockquote>The XYZ Doohickey Company was founded in 1971, and has been providing quality doohickies to the public ever since. Located in Gotham City, XYZ employs over 2,000 people and does all kinds of awesome things for the Gotham community.</blockquote>\n\nAs a new WordPress user, you should go to <a href="http://localhost/wordpress/wp-admin/">your dashboard</a> to delete this page and create new pages for your content. Have fun!', 'Sample Page', '', 'publish', 'open', 'open', '', 'sample-page', '', '', '2012-06-12 15:26:35', '2012-06-12 15:26:35', '', 0, 'http://localhost/wordpress/?page_id=2', 0, 'page', '', 0),
(3, 0, '2012-06-12 15:26:35', '0000-00-00 00:00:00', 'content', 'title', 'excerpt', 'publish', 'open', 'open', '', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', 0, 'guid', 0, 'post', '', 0),
(24, 1, '2012-06-30 06:48:08', '0000-00-00 00:00:00', '<h4>\r\n	C&ocirc;ng dụng:</h4>\r\n<div class="info">\r\n	Bổ thận tr&aacute;ng dương, sinh tinh, tăng lực, chữa chứng đau lưng, mệt mỏi, di mộng tinh, liệt dương.</div>\r\n<h4>\r\n	C&aacute;ch d&ugrave;ng:</h4>\r\n<div class="info">\r\n	<span style="padding-top: 0px; padding-right: 0px; padding-bottom: 0px; padding-left: 0px; margin-top: 0px; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; line-height: 24px; text-align: justify; background-color: #ffffff; font-family: arial; font-size: 12px; color: #4c4c4c;">Đọc kỹ hướng dẫn sử dụng trước khi d&ugrave;ng.</span><span style="padding-top: 0px; padding-right: 0px; padding-bottom: 0px; padding-left: 0px; margin-top: 0px; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; line-height: 24px; text-align: justify; background-color: #ffffff; font-family: arial; font-size: 12px; color: #4c4c4c;">&nbsp;</span><span style="padding-top: 0px; padding-right: 0px; padding-bottom: 0px; padding-left: 0px; margin-top: 0px; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; line-height: 24px; text-align: justify; background-color: #ffffff; font-family: arial; font-size: 12px; color: #4c4c4c;">&nbsp;</span><span style="line-height: 24px; text-align: justify; background-color: #ffffff; font-family: arial; font-size: 12px; color: #4c4c4c;">&nbsp;</span></div>\r\n<h4>\r\n	Th&agrave;nh phần:</h4>\r\n', 'Bổ thận hoàn', 'Bổ thận tráng dương, sinh tinh, tăng lực, chữa chứng đau lưng, mệt mỏi, di mộng tinh, liệt dương.', 'publish', 'open', 'open', '', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', 0, '', 0, 'product', '', 0),
(27, 1, '2012-07-01 05:53:52', '0000-00-00 00:00:00', '<p>\r\n	&nbsp;</p>\r\n<h4 style="padding: 0px; margin: 0px; color: rgb(0, 166, 81); text-transform: uppercase; font-family: Arial; line-height: 24px; text-align: justify; ">\r\n	C&Ocirc;NG DỤNG:</h4>\r\n<div class="info" style="padding: 0px; margin: 0px 0px 20px; color: rgb(76, 76, 76); font-family: Arial; line-height: 24px; text-align: justify; ">\r\n	Bổ thận, tăng lực, tăng &quot;sức bền&quot; trị chứng &quot;bất lực&quot;</div>\r\n<h4 style="padding: 0px; margin: 0px; color: rgb(0, 166, 81); text-transform: uppercase; font-family: Arial; line-height: 24px; text-align: justify; ">\r\n	C&Aacute;CH D&Ugrave;NG:</h4>\r\n<div class="info" style="padding: 0px; margin: 0px 0px 20px; color: rgb(76, 76, 76); font-family: Arial; line-height: 24px; text-align: justify; ">\r\n	<span style="padding: 0px; margin: 0px; font-family: arial; ">Đọc kỹ hướng dẫn sử dụng trước khi d&ugrave;ng.</span><span style="padding: 0px; margin: 0px; font-family: arial; ">&nbsp;</span><span style="padding: 0px; margin: 0px; font-family: arial; ">&nbsp;</span><span style="padding: 0px; margin: 0px; font-family: arial; ">&nbsp;</span><span style="padding: 0px; margin: 0px; font-family: arial; ">&nbsp;</span><span style="padding: 0px; margin: 0px; font-family: arial; ">&nbsp;</span></div>\r\n<h4 style="padding: 0px; margin: 0px; color: rgb(0, 166, 81); text-transform: uppercase; font-family: Arial; line-height: 24px; text-align: justify; ">\r\n	TH&Agrave;NH PHẦN:</h4>\r\n', 'Sâm Ngọc Dương', 'Bổ thận, tăng lực, tăng "sức bền" trị chứng "bất lực"', 'publish', 'open', 'open', '', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', 0, '', 0, 'product', '', 0),
(26, 1, '2012-07-01 03:32:31', '0000-00-00 00:00:00', '<p>\r\n	&nbsp;</p>\r\n<h4 style="padding: 0px; margin: 0px; color: rgb(0, 166, 81); text-transform: uppercase; font-family: Arial; line-height: 24px; text-align: justify; ">\r\n	C&Ocirc;NG DỤNG:</h4>\r\n<div class="info" style="padding: 0px; margin: 0px 0px 20px; color: rgb(76, 76, 76); font-family: Arial; line-height: 24px; text-align: justify; ">\r\n	Bổ gan, thận, nu&ocirc;i m&aacute;u. Chữa chứng suy nhược, t&oacute;c bạc sớm, t&oacute;c rụng, &ugrave; tai.</div>\r\n<h4 style="padding: 0px; margin: 0px; color: rgb(0, 166, 81); text-transform: uppercase; font-family: Arial; line-height: 24px; text-align: justify; ">\r\n	C&Aacute;CH D&Ugrave;NG:</h4>\r\n<div class="info" style="padding: 0px; margin: 0px 0px 20px; color: rgb(76, 76, 76); font-family: Arial; line-height: 24px; text-align: justify; ">\r\n	<span style="padding: 0px; margin: 0px; font-family: arial; ">Đọc kỹ hướng dẫn sử dụng trước khi d&ugrave;ng.</span><span style="padding: 0px; margin: 0px; font-family: arial; ">&nbsp;</span><span style="padding: 0px; margin: 0px; font-family: arial; ">&nbsp;</span><span style="padding: 0px; margin: 0px; font-family: arial; ">&nbsp;</span><span style="padding: 0px; margin: 0px; font-family: arial; ">&nbsp;</span><span style="padding: 0px; margin: 0px; font-family: arial; ">&nbsp;</span></div>\r\n<h4 style="padding: 0px; margin: 0px; color: rgb(0, 166, 81); text-transform: uppercase; font-family: Arial; line-height: 24px; text-align: justify; ">\r\n	TH&Agrave;NH PHẦN:</h4>\r\n', 'Rượu vang dâu', 'Bổ gan, thận, nuôi máu. Chữa chứng suy nhược, tóc bạc sớm, tóc rụng, ù tai.', 'publish', 'open', 'open', '', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', 0, '', 0, 'product', '', 0),
(8, 2, '2012-06-24 00:00:00', '2012-06-24 02:00:00', '<h2 class="Lead">\r\n	Một số cơ quan b&aacute;o ch&iacute; v&agrave; c&aacute;c trang mạng của Trung Quốc đăng &yacute; kiến ph&aacute;t biểu của một v&agrave;i tướng lĩnh Trung Quốc k&ecirc;u gọi qu&acirc;n sự h&oacute;a &quot;Tam Sa&quot;, &quot;tr&ecirc;n c&aacute;c đảo của Tam Sa chỗ n&agrave;o đ&oacute;ng qu&acirc;n được th&igrave; đ&oacute;ng qu&acirc;n&quot;.<br />\r\n	&gt; <a class="Lead" href="http://vnexpress.net/gl/the-gioi/tu-lieu/2012/06/trung-quoc-cong-khai-y-do-doc-chiem-bien-dong/">Trung Quốc c&ocirc;ng khai &yacute; đồ độc chiếm biển Đ&ocirc;ng</a></h2>\r\n<p class="Normal">\r\n	Ng&agrave;y 21/6, trang mạng của Bộ D&acirc;n ch&iacute;nh Trung Quốc th&ocirc;ng b&aacute;o việc Quốc vụ viện nước n&agrave;y ph&ecirc; chuẩn quyết định th&agrave;nh lập c&aacute;i gọi l&agrave; &quot;th&agrave;nh phố Tam Sa&quot; với phạm vi quản l&yacute; bao gồm hai quần đảo Ho&agrave;ng Sa v&agrave; Trường Sa của Việt Nam. Trung Quốc ho&agrave;n to&agrave;n kh&ocirc;ng c&oacute; ph&aacute;p l&yacute; để th&agrave;nh lập đơn vị h&agrave;nh ch&iacute;nh tr&ecirc;n l&atilde;nh thổ của một quốc gia c&oacute; chủ quyền như Việt Nam.</p>\r\n<p class="Normal">\r\n	Đ&atilde; từ l&acirc;u, &iacute;t nhất l&agrave; từ thế kỷ 17, c&aacute;c nh&agrave; nước Việt Nam đ&atilde; thực thi chủ quyền, tiến h&agrave;nh quản l&yacute;, khai th&aacute;c h&ograve;a b&igrave;nh li&ecirc;n tục hai quần đảo Ho&agrave;ng Sa v&agrave; Trường Sa khi n&oacute; chưa thuộc về l&atilde;nh thổ của bất kỳ quốc gia n&agrave;o. C&aacute;c chứng cứ ph&aacute;p l&yacute; lịch sử khẳng định chủ quyền của Việt Nam đối với hai quần đảo n&agrave;y đang được lưu giữ kh&ocirc;ng chỉ ở c&aacute;c cơ quan lưu trữ của Việt Nam, m&agrave; c&ograve;n đang được lưu giữ ở trung t&acirc;m lưu trữ của c&aacute;c nước như Ph&aacute;p, Mỹ, Nhật, H&agrave; Lan, Anh...</p>\r\n<table align="center" border="0" cellpadding="3" cellspacing="0" width="1">\r\n	<tbody>\r\n		<tr>\r\n			<td>\r\n				<img alt="Ảnh tư liệu." height="563" src="http://vnexpress.net/Files/Subject/3b/bd/8d/9a/Dai-nam-nhat-thong-toan-do_.jpg" width="400" /></td>\r\n		</tr>\r\n		<tr>\r\n			<td class="Image">\r\n				C&aacute;c quần đảo Ho&agrave;ng Sa v&agrave; Trường Sa được thể hiện trong Đại Nam nhất thống to&agrave;n đồ (năm 1834-1840). <em>Ảnh tư liệu.</em></td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n<p>\r\n	&nbsp;</p>\r\n', 'Võ y ký sự', 'Võ y ký sự', 'publish', 'open', 'open', '', '', '', '', '2012-06-30 03:41:19', '0000-00-00 00:00:00', '', 0, '', 0, 'post', '', 0),
(9, 2, '2012-06-25 00:00:00', '2012-06-25 00:00:00', '<p>\r\n	&nbsp;</p>\r\n<p>\r\n	C&aacute;ch đ&acirc;y chừng 15 năm, &ocirc;ng Dương Qu&aacute;t, khi ấy l&agrave; Chủ nhiệm Ủy ban D&acirc;n số- Kế hoạch h&oacute;a gia đ&igrave;nh tỉnh Quảng Trị khẳng định, Việt Nam c&oacute; thể sản xuất được thuốc tr&aacute;nh thai đơn giản, hiệu quả, &iacute;t tốn k&eacute;m từ l&aacute; c&acirc;y rừng.</p>\r\n<p>\r\n	&nbsp;</p>\r\n<div align="center">\r\n	<img alt="Chủ đất người Ma Coong, Đinh Xon kể về lá thuốc lạ của dân tộc mình - ảnh GĐ&amp;CS" src="http://dantri4.vcmedia.vn/i:FaA3gEccccccccccccos/Image/2012/06/macoong2712_f07f9/chu-dat-nguoi-ma-coong-dinh-xon-ke-ve-la-thuoc-la-cua-dan-toc-minh-anh-gdampcs.jpg" /><br />\r\n	Chủ đất người Ma Coong, Đinh Xon kể về l&aacute; thuốc lạ của d&acirc;n tộc m&igrave;nh - ảnh GĐ&amp;CS</div>\r\n<p>\r\n	&nbsp;</p>\r\n<p>\r\n	Theo &ocirc;ng Qu&aacute;t, đồng b&agrave;o d&acirc;n tộc V&acirc;n Kiều, Pa C&ocirc; ở t&iacute;t s&acirc;u tr&ecirc;n đỉnh Trường Sơn, nếu kh&ocirc;ng muốn c&oacute; con, mỗi khi l&agrave;m chuyện ấy, người d&acirc;n chỉ cần &ldquo;yểm&rdquo; một mẩu l&aacute; c&acirc;y lạ dưới chiếu l&agrave; cứ&hellip; thoải m&aacute;i.</p>\r\n<p>\r\n	&nbsp;</p>\r\n<p>\r\n	Mỗi năm, người Ma Coong đều c&oacute; một đ&ecirc;m d&agrave;nh cho t&igrave;nh y&ecirc;u đ&ocirc;i lứa, ấy l&agrave; v&agrave;o ng&agrave;y 16 th&aacute;ng Gi&ecirc;ng hằng năm. Người Ma Coong gọi đ&ecirc;m t&igrave;nh đ&oacute; l&agrave; đ&ecirc;m đập trống. Đ&ecirc;m ấy, trai g&aacute;i y&ecirc;u nhau, thậm ch&iacute; cả những người đ&atilde; c&oacute; gia đ&igrave;nh đều c&oacute; thể đến với nhau, trao cho nhau tất cả những thứ thuộc về t&igrave;nh y&ecirc;u nam nữ.</p>\r\n<p>\r\n	&nbsp;</p>\r\n<p>\r\n	Sau đ&ecirc;m t&igrave;nh ấy, nếu ai&hellip; v&ocirc; &yacute; m&agrave; để bạn t&igrave;nh của m&igrave;nh c&oacute; thai th&igrave; d&ugrave; c&oacute; trăng gi&oacute; qua đường cũng phải cắn răng m&agrave; cưới. Kh&ocirc;ng những thế, kẻ g&acirc;y hậu quả xấu đ&oacute; c&ograve;n phải &ldquo;nộp phạt&rdquo; cho bản nhiều rượu, nhiều thịt th&igrave; mới được bỏ qua.</p>\r\n<p>\r\n	&nbsp;</p>\r\n<div align="center">\r\n	<img alt="Ông Quát nghiên cứu loại lá cây này từ hơn 15 năm nay... Ảnh: SGGP" src="http://dantri4.vcmedia.vn/i:FaA3gEccccccccccccos/Image/2012/06/latranhthai2712_f1f74/ong-quat-nghien-cuu-loai-la-cay-nay-tu-hon-15-nam-nay-anh-sggp.jpg" /><br />\r\n	&Ocirc;ng Qu&aacute;t nghi&ecirc;n cứu loại l&aacute; c&acirc;y n&agrave;y từ hơn 15 năm nay... Ảnh: SGGP</div>\r\n<p>\r\n	&nbsp;</p>\r\n<p>\r\n	&ldquo;Người Ma Coong c&oacute; l&aacute; c&acirc;y rừng kỳ lạ lắm, đ&ecirc;m t&igrave;nh chỉ cần ngắt một l&aacute; ấy mang theo b&ecirc;n m&igrave;nh th&igrave; kh&ocirc;ng lo chuyện đ&oacute; đ&acirc;u!&rdquo;.</p>\r\n<p>\r\n	&nbsp;</p>\r\n<p>\r\n	Khi đ&atilde; y&ecirc;n t&acirc;m về sự an to&agrave;n của b&agrave;i thuốc, tại huyện Triệu Phong (Quảng Trị), cũng bằng l&aacute; c&acirc;y tr&ecirc;n, &ocirc;ng Qu&aacute;t cũng đ&atilde; &ldquo;thử&rdquo; tr&ecirc;n 19 cặp vợ chồng được lựa chọn ngẫu nhi&ecirc;n. Kết quả 18 cặp trong số đ&oacute; đ&atilde; ngừa thai được đ&uacute;ng theo &yacute; muốn của m&igrave;nh.</p>\r\n<p>\r\n	&nbsp;</p>\r\n<p>\r\n	Sau nhiều lần thăm d&ograve;, &ocirc;ng biết, loại l&aacute; diệu kỳ đ&oacute; đồng b&agrave;o gọi l&agrave; l&aacute; a-năng. Thế nhưng, cũng giống như nhiều trường hợp kh&aacute;c, đồng b&agrave;o kh&ocirc;ng cho &ocirc;ng thấy lo&agrave;i l&aacute; thần diệu đ&oacute;.</p>\r\n<p>\r\n	&nbsp;</p>\r\n<p>\r\n	&Ocirc;ng Qu&aacute;t phải nộp lễ c&uacute;ng Gi&agrave;ng gồm một con lợn 70 kg v&agrave; 100 kg gạo mới đưa được c&acirc;y về. Từ năm 1996, &ocirc;ng bắt đầu tập trung nghi&ecirc;n cứu về n&oacute;.</p>\r\n<p>\r\n	&nbsp;</p>\r\n<p>\r\n	Suốt mấy năm lặn lội ở khắp c&aacute;c bản l&agrave;ng, rồi v&ugrave;i m&igrave;nh ở c&aacute;c trung t&acirc;m nghi&ecirc;n cứu, th&iacute; nghiệm ở cả trung ương lẫn địa phương, &ocirc;ng Qu&aacute;t v&agrave; c&aacute;c cộng sự nhiệt th&agrave;nh của m&igrave;nh l&agrave; những thầy thuốc người d&acirc;n tộc nổi tiếng ở Hướng H&oacute;a đ&atilde; thu được những kết quả đ&aacute;ng mừng.</p>\r\n<p>\r\n	&nbsp;</p>\r\n<p>\r\n	Khi c&oacute; được những l&aacute; thuốc thần b&iacute; của một số thầy lang c&oacute; tiếng ở Khe Sanh (Hướng H&oacute;a), lần đầu ti&ecirc;n, &ocirc;ng l&agrave;m th&iacute; nghiệm tr&ecirc;n thỏ. Kết quả l&agrave; d&ugrave; đến chu kỳ sinh nở nhưng hấp thụ thứ l&aacute; c&acirc;y đặc biệt n&agrave;y những c&aacute; thể thỏ c&aacute;i đ&atilde; kh&ocirc;ng thể mang thai.</p>\r\n<p>\r\n	&nbsp;</p>\r\n<p>\r\n	Lần thứ hai, để t&igrave;m phản ứng phụ của thuốc, &ocirc;ng đ&atilde; thử tr&ecirc;n những c&aacute; thể chuột bạch tại Trường Đại học Y khoa Huế. Kết quả cũng v&ocirc; c&ugrave;ng mỹ m&atilde;n, l&aacute; thuốc tr&ecirc;n kh&ocirc;ng g&acirc;y bất cứ một phản ứng phụ n&agrave;o.</p>\r\n<p>\r\n	&nbsp;</p>\r\n<p>\r\n	Theo &ocirc;ng Qu&aacute;t, sở dĩ đến giờ, c&ocirc;ng tr&igrave;nh của &ocirc;ng vẫn chưa về đến đ&iacute;ch l&agrave; bởi thiếu kinh ph&iacute;, th&ecirc;m nữa, chưa c&oacute; bất cứ kết luận khoa học về những biến chứng l&acirc;u d&agrave;i khi sử dụng b&agrave;i thuốc n&agrave;y. C&ograve;n một kh&oacute; khăn nữa, theo &ocirc;ng Qu&aacute;t, đ&oacute; l&agrave; sự b&iacute; hiểm đến kh&oacute; l&yacute; giải của l&aacute; a năng.</p>\r\n<p>\r\n	&nbsp;</p>\r\n<p>\r\n	B&aacute;c sĩ Nguyễn Thị Hương, Ph&oacute; Chủ tịch Hội đ&ocirc;ng y tỉnh Quảng Trị khẳng định &ldquo;Đ&uacute;ng l&agrave; l&aacute; A Năng l&agrave; loại c&acirc;y thuốc c&oacute; c&ocirc;ng dụng tr&aacute;nh thai, đ&atilde; được đồng b&agrave;o người V&acirc;n Kiều sử dụng nhiều năm nay.</p>\r\n<p>\r\n	&nbsp;</p>\r\n<div align="center">\r\n	<img alt="Ông Quát nghiên cứu loại lá cây này từ hơn 15 năm nay... Ảnh: SGGP" src="http://dantri4.vcmedia.vn/i:FaA3gEccccccccccccos/Image/2012/06/caytranhthai2712_7e0b4/ongquatnghiencuuloailacaynaytuhon15namnayanhsggp.jpg" /><br />\r\n	Theo giải th&iacute;ch của c&aacute;c nh&agrave; khoa học th&igrave; c&acirc;y A Năng thuộc họ Amarylli (thuộc chi Crium), chưa x&aacute;c định lo&agrave;i nhưng gần lo&agrave;i Crium Serrulatum - ảnh GĐCS</div>\r\n<p>\r\n	&nbsp;</p>\r\n<p>\r\n	Như đ&atilde; n&oacute;i, d&ugrave; th&acirc;n thiết tới đ&acirc;u th&igrave; đồng b&agrave;o d&acirc;n tộc vẫn giấu b&iacute; quyết của m&igrave;nh. Bởi thế, d&ugrave; c&oacute; được giống c&acirc;y qu&yacute; đ&oacute;, d&ugrave; trồng xanh um như những c&acirc;y cảnh kh&aacute;c trong nh&agrave;, nhưng nếu kh&ocirc;ng phải do người d&acirc;n tộc đặt thuốc th&igrave; a năng chỉ l&agrave; thứ l&aacute; v&ocirc; tri.</p>\r\n<p>\r\n	&nbsp;</p>\r\n<p>\r\n	Cố gặng hỏi xem họ c&ograve;n b&iacute; quyết g&igrave; nữa khi sử dụng loại l&aacute; c&acirc;y n&agrave;y, nhưng lần n&agrave;o &ocirc;ng cũng chỉ nhận được c&acirc;u trả lời chung chung: A năng l&agrave; l&aacute; thuốc của Gi&agrave;ng. Đem về xu&ocirc;i Gi&agrave;ng kh&ocirc;ng đồng &yacute; n&ecirc;n v&ocirc; t&aacute;c dụng&hellip;</p>\r\n<p>\r\n	&nbsp;</p>\r\n<p>\r\n	&Ocirc;ng Qu&aacute;t tiết lộ, tuy c&ocirc;ng tr&igrave;nh của &ocirc;ng vẫn đang dang dở nhưng đ&atilde; c&oacute; rất nhiều nh&agrave; khoa học c&oacute; tiếng ở cả trong v&agrave;i ngo&agrave;i nước đ&atilde; t&igrave;m tới, hỏi mua lại to&agrave;n bộ kết quả nghi&ecirc;n cứu, t&igrave;m hiểu đ&oacute; với gi&aacute; v&agrave;i tỉ đồng.</p>\r\n<p>\r\n	&nbsp;</p>\r\n<p>\r\n	Tuy nhi&ecirc;n, &ocirc;ng từ chối bởi &ocirc;ng muốn tự m&igrave;nh ho&agrave;n thiện c&ocirc;ng tr&igrave;nh khoa học n&agrave;y...</p>\r\n<p>\r\n	&nbsp;</p>\r\n<p align="right">\r\n	Theo&nbsp;Kiến thức</p>\r\n', 'Bí ẩn lá cây giúp nam nữ... ngừa thai', 'Nếu không muốn có con, mỗi khi làm chuyện ấy, người dân chỉ cần “yểm” một mẩu lá cây lạ dưới chiếu là cứ… thoải mái.', 'publish', 'open', 'open', '', '', '', '', '2012-07-02 05:12:19', '0000-00-00 00:00:00', '', 0, '', 0, 'post', '', 0),
(11, 2, '2012-06-25 00:00:00', '2012-06-25 00:00:00', '<p>\r\n	Một cốc nước &eacute;p tr&aacute;i c&acirc;y kh&ocirc;ng những cung cấp năng lượng hoạt động cho cả ng&agrave;y, xua đi c&aacute;i n&oacute;ng oi bức của m&ugrave;a h&egrave; m&agrave; c&ograve;n l&agrave; &ldquo;trợ thủ&rdquo; đắc lực cho vẻ tươi s&aacute;ng khỏe mạnh của l&agrave;n da.</p>\r\n', 'Cách làm nước ép trái cây bổ dưỡng', 'Một cốc nước ép trái cây không những cung cấp năng lượng hoạt động cho cả ngày, xua đi cái nóng oi bức của mùa hè mà còn là “trợ thủ” đắc lực cho vẻ tươi sáng khỏe mạnh của làn da.', 'publish', 'open', 'open', '', '', '', '', '2012-06-30 03:39:17', '0000-00-00 00:00:00', '', 0, '', 0, 'post', '', 0),
(12, 2, '2012-06-25 00:00:00', '2012-06-25 00:00:00', '<p>\r\n	(D&acirc;n tr&iacute;) - Hiểu r&otilde; những nguy cơ hiện hữu trong ch&iacute;nh những đồ d&ugrave;ng th&acirc;n thiện hằng ng&agrave;y, bạn sẽ biết c&aacute;ch lựa chọn những sản phẩm n&agrave;o an to&agrave;n cho sức khoẻ cả nh&agrave;.</p>\r\n', 'Lánh xa các chất độc quanh ta', '(Dân trí) - Hiểu rõ những nguy cơ hiện hữu trong chính những đồ dùng thân thiện hằng ngày, bạn sẽ biết cách lựa chọn những sản phẩm nào an toàn cho sức khoẻ cả nhà.', 'publish', 'open', 'open', '', '', '', '', '2012-06-30 03:43:42', '0000-00-00 00:00:00', '', 0, '', 0, 'post', '', 0),
(13, 1, '2012-06-26 00:00:00', '2012-06-26 00:00:00', '<h4>\r\n	C&ocirc;ng dụng:</h4>\r\n<div class="info">\r\n	Chữa phong thấp, vi&ecirc;m khớp, vi&ecirc;m đau thần kinh tọa, đau t&ecirc; nhức mỏi th&acirc;n thể, vi&ecirc;m đau cột sống, bại liệt b&aacute;n th&acirc;n.</div>\r\n<h4>\r\n	C&aacute;ch d&ugrave;ng:</h4>\r\n<div class="info">\r\n	Đọc kĩ hướng dẫn sử dụng trước khi d&ugrave;ng.</div>\r\n<h4>\r\n	Th&agrave;nh phần:</h4>\r\n', 'Hỏa Long', 'Chữa phong thấp, viêm khớp, viêm đau thần kinh tọa, đau tê nhức mỏi thân thể, viêm đau cột sống, bại liệt bán thân.', 'publish', 'open', 'open', '', '', '', '', '2012-06-30 03:13:29', '0000-00-00 00:00:00', '', 0, '', 0, 'product', '', 0),
(14, 1, '2012-06-26 00:00:00', '2012-06-26 00:00:00', '<h4>\r\n	C&ocirc;ng dụng:</h4>\r\n<div class="info">\r\n	Bổ tỳ, ti&ecirc;u cam, dưỡng n&atilde;o, tăng sức đề kh&aacute;ng, ph&aacute;t triển tr&iacute; tu&ecirc;. Chữa chứng k&eacute;m ăn, khỏ ngủ, gầy yếu, da xanh v&agrave;ng, rồi loạn ti&ecirc;u ho&aacute;, mồ h&ocirc;i trộm, mệt mỏi, lười hoạt động, trầm cảm, ngại n&oacute;i, sợ h&atilde;i, chậm ph&aacute;t triển.&nbsp;</div>\r\n<h4>\r\n	C&aacute;ch d&ugrave;ng:</h4>\r\n<div class="info">\r\n	<span style="padding: 0px; margin: 0px; line-height: 24px; text-align: justify; background-color: #ffffff; font-size: 12px; font-family: arial; color: #4c4c4c;">Đọc kỹ hướng dẫn sử dụng trước khi d&ugrave;ng.</span> <span style="padding: 0px; margin: 0px; line-height: 24px; text-align: justify; background-color: #ffffff; font-size: 12px; font-family: arial; color: #4c4c4c;">&nbsp;</span> <span style="padding: 0px; margin: 0px; line-height: 24px; text-align: justify; background-color: #ffffff; font-size: 12px; font-family: arial; color: #4c4c4c;">&nbsp;</span> <span style="line-height: 24px; text-align: justify; background-color: #ffffff; font-size: 12px; font-family: arial; color: #4c4c4c;">&nbsp;</span></div>\r\n<h4>\r\n	Th&agrave;nh phần:</h4>\r\n<div class="info">\r\n	&nbsp;</div>\r\n', 'Siêu nhân tiểu bảo', 'Bổ tỳ, tiêu cam, dưỡng não, tăng sức đề kháng, phát triển trí tuê. Chữa chứng kém ăn, khỏ ngủ, gầy yếu, da xanh vàng, rồi loạn tiêu hoá, mồ hôi trộm, mệt mỏi, lười hoạt động, trầm cảm, ngại nói, sợ hãi, chậm phát triển. ', 'publish', 'open', 'open', '', '', '', '', '2012-06-30 03:17:25', '0000-00-00 00:00:00', '', 0, '', 0, 'product', '', 0),
(15, 1, '2012-06-26 00:00:00', '2012-06-26 00:00:00', '<h4>\r\n	C&ocirc;ng dụng:</h4>\r\n<div class="info">\r\n	Hỗ trợ, điều ho&agrave; đường huyết cho người bị bệnh tiểu đường m&aacute;t gan, th&ocirc;ng tiểu.</div>\r\n<h4>\r\n	C&aacute;ch d&ugrave;ng:</h4>\r\n<div class="info">\r\n	<span style="padding-top: 0px; padding-right: 0px; padding-bottom: 0px; padding-left: 0px; margin-top: 0px; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; line-height: 24px; text-align: justify; background-color: #ffffff; font-family: arial; font-size: 12px; color: #4c4c4c;">Đọc kỹ hướng dẫn sử dụng trước khi d&ugrave;ng.</span> <span style="padding-top: 0px; padding-right: 0px; padding-bottom: 0px; padding-left: 0px; margin-top: 0px; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; line-height: 24px; text-align: justify; background-color: #ffffff; font-family: arial; font-size: 12px; color: #4c4c4c;">&nbsp;</span> <span style="padding-top: 0px; padding-right: 0px; padding-bottom: 0px; padding-left: 0px; margin-top: 0px; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; line-height: 24px; text-align: justify; background-color: #ffffff; font-family: arial; font-size: 12px; color: #4c4c4c;">&nbsp;</span> <span style="padding-top: 0px; padding-right: 0px; padding-bottom: 0px; padding-left: 0px; margin-top: 0px; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; line-height: 24px; text-align: justify; background-color: #ffffff; font-family: arial; font-size: 12px; color: #4c4c4c;">&nbsp;</span> <span style="padding-top: 0px; padding-right: 0px; padding-bottom: 0px; padding-left: 0px; margin-top: 0px; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; line-height: 24px; text-align: justify; background-color: #ffffff; font-family: arial; font-size: 12px; color: #4c4c4c;">&nbsp;</span> <span style="line-height: 24px; text-align: justify; background-color: #ffffff; font-family: arial; font-size: 12px; color: #4c4c4c;">&nbsp;</span></div>\r\n<h4>\r\n	Th&agrave;nh phần:</h4>\r\n<div class="info">\r\n	&nbsp;</div>\r\n', 'Trà thanh long', 'Hỗ trợ, điều hoà đường huyết cho người bị bệnh tiểu đường mát gan, thông tiểu.', 'publish', 'open', 'open', '', '', '', '', '2012-06-30 03:20:29', '0000-00-00 00:00:00', '', 0, '', 0, 'product', '', 0),
(28, 1, '2012-07-01 06:02:19', '0000-00-00 00:00:00', '<p>\r\n	&nbsp;</p>\r\n<h4 style="padding: 0px; margin: 0px; color: rgb(0, 166, 81); text-transform: uppercase; font-family: Arial; line-height: 24px; text-align: justify; ">\r\n	C&Ocirc;NG DỤNG:</h4>\r\n<div class="info" style="padding: 0px; margin: 0px 0px 20px; color: rgb(76, 76, 76); font-family: Arial; line-height: 24px; text-align: justify; ">\r\n	Bổ thận, tư &acirc;m, chữa chứng mệt mỏi, thận hư, k&eacute;m ăn, kh&oacute; ngủ, suy yếu sinh l&yacute;.</div>\r\n<h4 style="padding: 0px; margin: 0px; color: rgb(0, 166, 81); text-transform: uppercase; font-family: Arial; line-height: 24px; text-align: justify; ">\r\n	C&Aacute;CH D&Ugrave;NG:</h4>\r\n<div class="info" style="padding: 0px; margin: 0px 0px 20px; color: rgb(76, 76, 76); font-family: Arial; line-height: 24px; text-align: justify; ">\r\n	<span style="padding: 0px; margin: 0px; font-family: arial; ">Đọc kỹ hướng dẫn sử dụng trước khi d&ugrave;ng.</span><span style="padding: 0px; margin: 0px; font-family: arial; ">&nbsp;</span><span style="padding: 0px; margin: 0px; font-family: arial; ">&nbsp;</span><span style="padding: 0px; margin: 0px; font-family: arial; ">&nbsp;</span></div>\r\n<h4 style="padding: 0px; margin: 0px; color: rgb(0, 166, 81); text-transform: uppercase; font-family: Arial; line-height: 24px; text-align: justify; ">\r\n	TH&Agrave;NH PHẦN:</h4>\r\n', 'Linh chi lục vị', 'Bổ thận, tư âm, chữa chứng mệt mỏi, thận hư, kém ăn, khó ngủ, suy yếu sinh lý.', 'publish', 'open', 'open', '', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', 0, '', 0, 'product', '', 0),
(16, 1, '2012-06-26 00:00:00', '2012-06-26 00:00:00', '<h4>\r\n	C&ocirc;ng dụng:</h4>\r\n<div class="info">\r\n	M&aacute;t phổi, ti&ecirc;u đ&agrave;m, trị ho gi&oacute;, vi&ecirc;m họng, vi&ecirc;m phế quản, hen suyễn.</div>\r\n<h4>\r\n	C&aacute;ch d&ugrave;ng:</h4>\r\n<div class="info">\r\n	<span style="padding-top: 0px; padding-right: 0px; padding-bottom: 0px; padding-left: 0px; margin-top: 0px; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; line-height: 24px; text-align: justify; background-color: #ffffff; font-family: arial; font-size: 12px; color: #4c4c4c;">Đọc kỹ hướng dẫn sử dụng trước khi d&ugrave;ng.</span> <span style="line-height: 24px; text-align: justify; background-color: #ffffff; font-family: arial; font-size: 12px; color: #4c4c4c;">&nbsp;</span></div>\r\n<h4>\r\n	Th&agrave;nh phần:</h4>\r\n<div class="info">\r\n	&nbsp;</div>\r\n', 'Bạch long thủy', 'Mát phổi, tiêu đàm, trị ho gió, viêm họng, viêm phế quản, hen suyễn.', 'publish', 'open', 'open', '', '', '', '', '2012-06-30 03:22:43', '0000-00-00 00:00:00', '', 0, '', 0, 'product', '', 0),
(17, 1, '2012-06-26 00:00:00', '2012-06-26 00:00:00', '<div class="productinfo">\r\n	<h4>\r\n		C&ocirc;ng dụng:</h4>\r\n	<div class="info">\r\n		Chai 500ml. Bổ thận tr&aacute;ng dương, tăng cường sức khoẻ, tăng cường sinh lực.</div>\r\n	<h4>\r\n		C&aacute;ch d&ugrave;ng:</h4>\r\n	<div class="info">\r\n		&nbsp;</div>\r\n	<h4>\r\n		Th&agrave;nh phần:</h4>\r\n	<div class="info">\r\n		&nbsp;</div>\r\n</div>\r\n<p>\r\n	&nbsp;</p>\r\n', 'Rượu ngọc dương sâm', 'Chai 500ml. Bổ thận tráng dương, tăng cường sức khoẻ, tăng cường sinh lực.', 'publish', 'open', 'open', '', '', '', '', '2012-06-30 03:24:24', '0000-00-00 00:00:00', '', 0, '', 0, 'product', '', 0),
(18, 1, '2012-06-26 00:00:00', '2012-06-26 00:00:00', '<h4>\r\n	C&ocirc;ng dụng:</h4>\r\n<div class="info">\r\n	Chai 500ml. Phục hồi cơ thể sau lao động mệt nhọc, chữa chứng k&eacute;m ăn, kh&oacute; ngủ, đau lưng, nhức mỏi, thận suy, liệt dương.</div>\r\n<h4>\r\n	C&aacute;ch d&ugrave;ng:</h4>\r\n<div class="info">\r\n	&nbsp;</div>\r\n<h4>\r\n	Th&agrave;nh phần:</h4>\r\n<div class="info">\r\n	&nbsp;</div>\r\n', 'Rượu sâm quế tửu', 'Chai 500ml. Phục hồi cơ thể sau lao động mệt nhọc, chữa chứng kém ăn, khó ngủ, đau lưng, nhức mỏi, thận suy, liệt dương.', 'publish', 'open', 'open', '', '', '', '', '2012-06-30 03:25:12', '0000-00-00 00:00:00', '', 0, '', 0, 'product', '', 0),
(19, 1, '2012-06-28 00:00:00', '2012-06-28 00:00:00', '<p>\r\n	<strong>C&ocirc;ng dụng</strong>:</p>\r\n<p>\r\n	Chữa phong thấp, vi&ecirc;m khớp, vi&ecirc;m đau thần kinh tọa, đau t&ecirc; nhức mỏi th&acirc;n thể, vi&ecirc;m đau cột sống, bại liệt b&aacute;n th&acirc;n. C&aacute;ch d&ugrave;ng: Đọc kĩ hướng dẫn sử dụng trước khi d&ugrave;ng.</p>\r\n<p>\r\n	<strong>Th&agrave;nh phần</strong>:</p>\r\n', 'Hỏa Long', 'Chữa phong thấp, viêm khớp, viêm đau thần kinh tọa, đau tê nhức mỏi thân thể, viêm đau cột sống, bại liệt bán thân.', 'publish', 'open', 'open', '', '', '', '', '2012-06-30 03:01:54', '0000-00-00 00:00:00', '', 0, '', 0, 'product', '', 0),
(20, 1, '2012-06-28 00:00:00', '2012-06-28 00:00:00', '<p>\r\n	<strong>C&ocirc;ng dụng</strong>:</p>\r\n<p>\r\n	Chữa chấn thương, sưng đau, bầm t&iacute;m, đau t&ecirc; nhức mỏi do phong thấp, phục hồi chức năng sau khi bị trật khớp, nh&atilde;o d&acirc;y chằng.</p>\r\n<p>\r\n	<strong>C&aacute;ch d&ugrave;ng</strong>:</p>\r\n<p>\r\n	Đọc kỹ hướng dẫn sử dụng trước khi d&ugrave;ng.</p>\r\n<p>\r\n	&nbsp;</p>\r\n', 'Cồn xoa bóp', 'Chữa chấn thương, sưng đau, bầm tím, đau tê nhức mỏi do phong thấp, phục hồi chức năng sau khi bị trật khớp, nhão dây chằng.', 'publish', 'open', 'open', '', '', '', 'Công dụng:\r\nChữa chấn thương, sưng đau, bầm tím, đau tê nhức mỏi do phong thấp, phục hồi chức năng sau khi bị trật khớp, nhão dây chằng.\r\nCách dùng:\r\nĐọc kỹ hướng dẫn sử dụng trước khi dùng.    \r\nThành phần:', '2012-06-30 03:05:11', '0000-00-00 00:00:00', '', 0, '', 0, 'product', '', 0),
(21, 1, '2012-06-28 00:00:00', '2012-06-28 00:00:00', '<p>\r\n	<strong>C&ocirc;ng dụng</strong>:</p>\r\n<p>\r\n	Trị s&acirc;u răng, vi&ecirc;m lợi, vi&ecirc;m họng hạt.</p>\r\n<p>\r\n	<strong>C&aacute;ch d&ugrave;ng</strong>: Đọc kỹ hướng dẫn sử dụng trước khi d&ugrave;ng.</p>\r\n<p>\r\n	<strong>Th&agrave;nh phần</strong>:</p>\r\n', 'Nước súc miệng dã hoa tiêu', 'Trị sâu răng, viêm lợi, viêm họng hạt.', 'publish', 'open', 'open', '', '', '', '', '2012-06-30 03:07:25', '0000-00-00 00:00:00', '', 0, '', 0, 'product', '', 0),
(22, 1, '2012-06-28 00:00:00', '2012-06-28 00:00:00', '<p>\r\n	<strong>C&ocirc;ng dụng</strong>:</p>\r\n<p>\r\n	Chữa vi&ecirc;m đại tr&agrave;ng m&atilde;n t&iacute;nh, vi&ecirc;m lo&eacute;t h&agrave;nh t&aacute; tr&agrave;ng v&agrave; c&aacute;c chứng ti&ecirc;u chảy, kiết lỵ, đau bụng đầy hơi, kh&oacute; ti&ecirc;u, rối loạn ti&ecirc;u ho&aacute;</p>\r\n<p>\r\n	<strong>C&aacute;ch d&ugrave;ng</strong>: Đọc kỹ hướng dẫn sử dụng trước khi d&ugrave;ng.</p>\r\n<p>\r\n	<strong>Th&agrave;nh phần</strong>:</p>\r\n', 'Tiềm long', ' Chữa viêm đại tràng mãn tính, viêm loét hành tá tràng và các chứng tiêu chảy, kiết lỵ, đau bụng đầy hơi, khó tiêu, rối loạn tiêu hoá', 'publish', 'open', 'open', '', '', '', '', '2012-06-30 03:09:46', '0000-00-00 00:00:00', '', 0, '', 0, 'product', '', 0),
(23, 1, '2012-06-30 05:56:47', '0000-00-00 00:00:00', '<div class="productinfo">\r\n	<h4>\r\n		C&ocirc;ng dụng:</h4>\r\n	<div class="info">\r\n		Hỗ trợ tăng, cường sinh lực, chống mệt mỏi trước hoặc sau khi lao động mệt mỏi thể lực v&agrave; tr&iacute; &oacute;c. Lon 240 ml.</div>\r\n	<h4>\r\n		C&aacute;ch d&ugrave;ng:</h4>\r\n	<h4>\r\n		Th&agrave;nh phần:</h4>\r\n	<div class="info">\r\n		Nh&acirc;n s&acirc;m 2,5%&nbsp;<br />\r\n		Đương quy 5 %</div>\r\n</div>\r\n<p>\r\n	&nbsp;</p>\r\n', 'Nước uống sâm quy', 'Hỗ trợ tăng, cường sinh lực, chống mệt mỏi trước hoặc sau khi lao động mệt mỏi thể lực và trí óc. Lon 240 ml.', 'publish', 'open', 'open', '', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', 0, '', 0, 'product', '', 0),
(29, 2, '2012-07-02 05:15:19', '0000-00-00 00:00:00', '<p>\r\n	&nbsp;</p>\r\n<p>\r\n	Bệnh b&eacute; &ldquo;x&eacute;&rdquo; ra to</p>\r\n<p>\r\n	&nbsp;</p>\r\n<p>\r\n	Sau khi xem những đoạn quảng c&aacute;o m&agrave; ph&ograve;ng kh&aacute;m đa khoa Đầm Sen ở đường H&ograve;a B&igrave;nh, Q.11, TPHCM &ldquo;nổ&rdquo; về b&aacute;c sĩ Trung Quốc trị liệu hiệu quả c&aacute;c bệnh về sản phụ khoa, ng&agrave;y 11/5 chị Trần Thị T. ngụ ở TP Bu&ocirc;n Ma Thuột, tỉnh Đắk Lắk đ&atilde; tới chữa bệnh. B&aacute;c sĩ Ng&ocirc; Lương Ngọc, tự giới thiệu đến từ Đ&agrave;i Loan kh&aacute;m cho chị.</p>\r\n<p>\r\n	&nbsp;</p>\r\n<p>\r\n	&ldquo;Kh&aacute;m xong, &ocirc;ng ta cho biết t&ocirc;i bị huyết trắng, nguy cơ chuyển sang ung thư nếu kh&ocirc;ng điều trị sớm. Thậm ch&iacute; họ c&ograve;n bảo rất dễ bị nhiễm HIV&rdquo;, chị T. thuật lại.</p>\r\n<p>\r\n	&nbsp;</p>\r\n<p>\r\n	Liệu tr&igrave;nh chữa bệnh cho chị T., được c&aacute;c b&aacute;c sĩ ở ph&ograve;ng kh&aacute;m đưa ra trong v&ograve;ng 3 th&aacute;ng. Theo đ&oacute;, mỗi ng&agrave;y phải truyền 3 chai dịch với 2 mũi thuốc v&agrave; uống th&ecirc;m một số thuốc kh&aacute;c.</p>\r\n<p>\r\n	&nbsp;</p>\r\n<p>\r\n	Đến ng&agrave;y 20/6, khi Thanh tra Sở Y tế TPHCM kiểm tra v&agrave; ph&aacute;t hiện nhiều b&aacute;c sĩ &ldquo;chui&rdquo; người Trung Quốc th&aacute;o chạy th&igrave; chị T., đ&atilde; chi ph&iacute; cho ph&ograve;ng kh&aacute;m hơn 50 triệu đồng. Trong khi sang kh&aacute;m ở BV An Sinh TPHCM, chị T. được chẩn đo&aacute;n chỉ bị vi&ecirc;m tuyến lộ, điều trị đơn giản v&agrave; chi ph&iacute; rất thấp.</p>\r\n<p>\r\n	&nbsp;</p>\r\n<p>\r\n	Chị Chu Thị Hằng Ng., 41 tuổi ở Q. T&acirc;n Ph&uacute;, TPHCM cũng chỉ bị vi&ecirc;m nhiễm phụ khoa nhưng khi tới đ&acirc;y, &ldquo;b&aacute;c sĩ&rdquo; Trung Quốc ph&aacute;n ung thư cổ tử cung buộc phải điều trị với ph&aacute;c đồ 20 ng&agrave;y.</p>\r\n<p>\r\n	&nbsp;</p>\r\n<p>\r\n	&ldquo;Cũng truyền dịch ghi to&agrave;n chữ Trung Quốc với ch&iacute;ch thuốc m&agrave; t&ocirc;i kh&ocirc;ng r&otilde; thuốc g&igrave;. Nhưng v&igrave; họ trấn an thuốc n&agrave;y điều trị hiệu quả n&ecirc;n t&ocirc;i tin. Ai d&egrave; mới đ&acirc;y b&aacute;o ch&iacute; phản &aacute;nh to&agrave;n thuốc kh&ocirc;ng nguồn gốc&rdquo;, chị Ng. n&oacute;i. Đ&oacute;ng hơn 10 triệu đồng cho ph&ograve;ng kh&aacute;m Đầm Sen nhưng khi đến đ&ograve;i tiền lại chị Ng. chỉ nhận được c&aacute;i lắc đầu từ chối.</p>\r\n<p>\r\n	&nbsp;</p>\r\n<p>\r\n	Bị dọa sắp chết đến nơi do ung thư từ b&aacute;c sĩ Trung Quốc ở ph&ograve;ng kh&aacute;m Tr&agrave;ng An, Q. 11 n&ecirc;n chị Trần Hồng A. 45 tuổi ở Thuận An, tỉnh B&igrave;nh Dương phải r&aacute;ng chạy tiền để điều trị.</p>\r\n<p>\r\n	&nbsp;</p>\r\n<p>\r\n	Chị A. cho biết, đến khi ph&aacute;t hiện sai phạm tại ph&ograve;ng kh&aacute;m n&agrave;y, chị sang khoa Phụ sản ở BV Đại học Y dược TPHCM thăm kh&aacute;m, l&agrave;m c&aacute;c si&ecirc;u &acirc;m v&agrave; x&eacute;t nghiệm mới biết m&igrave;nh bị buồng trứng đa nang chứ kh&ocirc;ng phải ung thư như lời b&aacute;c sĩ ở ph&ograve;ng kh&aacute;m khẳng định.</p>\r\n<p>\r\n	&nbsp;</p>\r\n<p>\r\n	Rất may cho chị A. l&agrave; mới điều trị được 5 ng&agrave;y, tốn 12 triệu đồng. Mặc d&ugrave; c&aacute;c x&eacute;t nghiệm ở BV An Sinh đều kh&ocirc;ng ph&aacute;t hiện ra tế b&agrave;o ung thư nhưng chị Nguyễn D. H. 43 tuổi đến từ Long An được ph&ograve;ng kh&aacute;m Đ&ocirc;ng Phương &ldquo;ph&aacute;n&rdquo; ung thư tử cung, nguy hiểm đến t&iacute;nh mạng. Tin lời, chị H. cũng đ&oacute;ng 50% chi ph&iacute; với số tiền 25 triệu đồng.</p>\r\n<p>\r\n	&nbsp;</p>\r\n<p>\r\n	Mất tiền&hellip; r&aacute;ng chịu!</p>\r\n<p>\r\n	&nbsp;</p>\r\n<div align="center">\r\n	<img alt="Thuốc không nguồn gốc, nhãn mác tràn đầy trong các phòng khám Trung Quốc." src="http://dantri4.vcmedia.vn/i:FaA3gEccccccccccccos/Image/2012/06/thuoc-PK-TQ-2712_a04f8/thuoc-khong-nguon-goc-nhan-mac-tran-day-trong-cac-phong-kham-trung-quoc.jpg" /><br />\r\n	Thuốc kh&ocirc;ng nguồn gốc, nh&atilde;n m&aacute;c tr&agrave;n đầy trong c&aacute;c ph&ograve;ng kh&aacute;m Trung Quốc.&nbsp;&nbsp;Ảnh: L.N.</div>\r\n<p>\r\n	&nbsp;</p>\r\n<p>\r\n	Sau khi nhận được chiếc quạt nhựa in quảng c&aacute;o b&aacute;c sĩ Trung Quốc kh&aacute;m bệnh nam khoa giỏi tại ph&ograve;ng kh&aacute;m Trung Nam ở đường 3-2, Q.11 từ tay một người ph&aacute;t tờ rơi, b&agrave; Trần Thị H. ở 30/3A, tổ 14, phường Linh Xu&acirc;n, Q. Thủ Đức đưa con trai l&agrave; Trần H.H. 20 tuổi đến trị bệnh đau r&aacute;t đường tiểu.</p>\r\n<p>\r\n	&nbsp;</p>\r\n<p>\r\n	Th&ocirc;ng dịch vi&ecirc;n cho biết b&aacute;c sĩ Trần người Trung Quốc kh&aacute;m cho ch&aacute;u H. &ldquo;B&aacute;c sĩ Trần n&oacute;i phải mổ cho ch&aacute;u gấp nếu kh&ocirc;ng sẽ bị v&ocirc; sinh. Với gi&aacute; m&agrave; b&aacute;c sĩ n&agrave;y n&oacute;i l&agrave; khoảng 4 triệu đồng n&ecirc;n t&ocirc;i chấp nhận&rdquo;, chị H. kể.</p>\r\n<p>\r\n	&nbsp;</p>\r\n<p>\r\n	Mổ xong, chị H. nhận được bịch thuốc vi&ecirc;n m&agrave;u đen được th&ocirc;ng dịch vi&ecirc;n y&ecirc;u cầu về nấu th&agrave;nh nước v&agrave; cho con uống hằng ng&agrave;y. Mỗi ng&agrave;y phải đưa ch&aacute;u đến ph&ograve;ng kh&aacute;m n&agrave;y chiếu đ&egrave;n tia hồng ngoại để trị dứt vi khuẩn v&igrave; sợ nhiễm tr&ugrave;ng.</p>\r\n<p>\r\n	&nbsp;</p>\r\n<p>\r\n	&ldquo;Họ n&oacute;i mổ 3,5 triệu đồng nhưng khi t&iacute;nh to&aacute;n tiền c&ocirc;ng mổ với thuốc ng&agrave;y đầu l&ecirc;n 10 triệu đồng&rdquo;, chị H. n&oacute;i. L&agrave;m nghề nhặt ve chai, cuộc sống khốn kh&oacute; nhưng lo cho con n&ecirc;n chị H. phải chạy vạy tiền để điều trị cho con đủ 12 ng&agrave;y kh&ocirc;ng sẽ &ldquo;bị nhiễm tr&ugrave;ng v&agrave; v&ocirc; sinh&rdquo; như lời b&aacute;c sĩ dặn.</p>\r\n<p>\r\n	&nbsp;</p>\r\n<p>\r\n	Sau 12 ng&agrave;y điều trị, chi ph&iacute; cho ca mổ đ&atilde; l&ecirc;n 42 triệu đồng nhưng &ldquo;của qu&yacute;&rdquo; của con vẫn bị sưng l&ecirc;n. Qu&aacute; lo lắng, chị H. đưa con sang BV B&igrave;nh D&acirc;n. Sau 3 ng&agrave;y nằm viện với chi ph&iacute; 3 triệu đồng, H. xuất viện trong t&igrave;nh trạng khỏe mạnh.</p>\r\n<p>\r\n	&nbsp;</p>\r\n<p>\r\n	&ldquo;T&ocirc;i l&ecirc;n ph&ograve;ng kh&aacute;m Trung&nbsp;Nam&nbsp;gặp b&aacute;c sĩ Trần, hỏi sao b&ecirc;n B&igrave;nh D&acirc;n rẻ m&agrave; bệnh hết liền. &Ocirc;ng Trần n&oacute;i: &ldquo;Ăn phở ngo&agrave;i đường phải kh&aacute;c t&ocirc; phở ở kh&aacute;ch sạn 5 sao chứ&rdquo;, chị H. kể.</p>\r\n<p>\r\n	&nbsp;</p>\r\n<p>\r\n	Chị Nguyễn Thị Anh T., ở x&atilde; An Ph&uacute;, huyện Củ Chi cho biết, c&aacute;ch đ&acirc;y 15 ng&agrave;y, chị đưa con g&aacute;i 16 tuổi đến Ph&ograve;ng kh&aacute;m y học cổ truyền Đ&ocirc;ng Phương ở C&aacute;ch Mạng Th&aacute;ng 8, Q. T&acirc;n B&igrave;nh kh&aacute;m trĩ.</p>\r\n<p>\r\n	&nbsp;</p>\r\n<p>\r\n	Mặc d&ugrave; kh&ocirc;ng c&oacute; chức năng cắt trĩ nhưng ph&ograve;ng kh&aacute;m n&agrave;y cũng mổ trĩ. Đến ng&agrave;y 23/6, chị T. đến ph&ograve;ng kh&aacute;m n&agrave;y lấy thuốc theo hẹn, th&igrave; nh&acirc;n vi&ecirc;n cho biết, b&aacute;c sĩ Trung Quốc đi vắng n&ecirc;n &ldquo;cứ cho con g&aacute;i ng&acirc;m nước n&oacute;ng với muối hột để s&aacute;t tr&ugrave;ng vết thương&rdquo;.</p>\r\n<p>\r\n	&nbsp;</p>\r\n<p>\r\n	&ldquo;T&ocirc;i đ&atilde; đ&oacute;ng gần 30 triệu đồng cho ca mổ, giờ họ lại bảo d&ugrave;ng nước muối để rửa vết thương, quả l&agrave; kh&ocirc;ng chấp nhận được&rdquo;, chị T. bức x&uacute;c. Chị đưa con g&aacute;i sang BV B&igrave;nh D&acirc;n để được chăm s&oacute;c, quay về ph&ograve;ng kh&aacute;m y&ecirc;u cầu bồi thường, th&igrave; nh&acirc;n vi&ecirc;n cho biết, b&aacute;c sĩ điều trị cho con chị đ&atilde; nghỉ việc rồi.</p>\r\n<p>\r\n	&nbsp;</p>\r\n<p>\r\n	Chiều 1/7, b&aacute;c sĩ Phạm Kim B&igrave;nh- quyền Ch&aacute;nh Thanh tra Sở Y tế TPHCM cho biết, về chức năng, Sở Y tế chỉ kiểm tra chuy&ecirc;n m&ocirc;n, giấy ph&eacute;p h&agrave;nh nghề của c&aacute;c ph&ograve;ng kh&aacute;m, chứ kh&ocirc;ng c&oacute; chức năng đứng ra y&ecirc;u cầu c&aacute;c cơ sở n&agrave;y bồi thường cho người bệnh. &ldquo;Tuy nhi&ecirc;n, người bệnh nếu c&oacute; cam kết về điều trị bệnh từ c&aacute;c ph&ograve;ng kh&aacute;m, c&oacute; giấy tờ chứng minh đầy đủ đ&atilde; điều trị ở đ&acirc;y th&igrave; c&oacute; thể khởi kiện ra t&ograve;a&rdquo;, b&aacute;c sĩ B&igrave;nh cho biết.</p>\r\n<p>\r\n	&nbsp;</p>\r\n<p>\r\n	Phạt 2 ph&ograve;ng kh&aacute;m Trung Quốc vi phạm m&ocirc;i trường</p>\r\n<p>\r\n	&nbsp;</p>\r\n<p>\r\n	Cục Cảnh s&aacute;t Ph&ograve;ng chống tội phạm về m&ocirc;i trường- Bộ C&ocirc;ng an vừa ra quyết định xử phạt vi phạm h&agrave;nh ch&iacute;nh về bảo vệ m&ocirc;i trường đối với hai ph&ograve;ng kh&aacute;m Y học Trung Quốc (141 Phan Đăng Lưu, Q. Ph&uacute; Nhuận) v&agrave; Ph&ograve;ng kh&aacute;m đa khoa quốc tế Trung Nam (1509 đường Ba Th&aacute;ng Hai, Q.11, TPHCM) với tổng số tiền 270 triệu đồng.</p>\r\n<p>\r\n	&nbsp;</p>\r\n<p>\r\n	&nbsp;2 ph&ograve;ng kh&aacute;m n&agrave;y bị ph&aacute;t hiện kh&ocirc;ng c&oacute; bản cam kết bảo vệ m&ocirc;i trường v&agrave; đề &aacute;n bảo vệ m&ocirc;i trường kh&ocirc;ng được x&aacute;c nhận theo quy định; kh&ocirc;ng ph&acirc;n loại chất thải nguy hại, để lẫn chất thải nguy hại kh&aacute;c loại với nhau hoặc chất thải kh&aacute;c; kh&ocirc;ng bố tr&iacute; nơi an to&agrave;n để lưu giữ tạm thời chất thải nguy hại.</p>\r\n<p>\r\n	&nbsp;</p>\r\n<p align="right">\r\n	Theo&nbsp;L&ecirc; Nguyễn</p>\r\n<p align="right">\r\n	Tiền phong</p>\r\n', 'Bệnh nhân sập bẫy phòng khám Trung Quốc kêu trời', 'Người bệnh phải chịu cảnh tiền mất tật mang khi đến chữa trị tại các phòng khám Trung Quốc và không có người bệnh nào được các phòng khám này lo… hậu sự cố.', 'publish', 'open', 'open', '', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', 0, '', 0, 'post', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `ci_terms`
--

CREATE TABLE IF NOT EXISTS `ci_terms` (
  `term_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL DEFAULT '',
  `slug` varchar(200) NOT NULL DEFAULT '',
  `term_group` bigint(10) NOT NULL DEFAULT '0',
  PRIMARY KEY (`term_id`),
  UNIQUE KEY `slug` (`slug`),
  KEY `name` (`name`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=35 ;

--
-- Dumping data for table `ci_terms`
--

INSERT INTO `ci_terms` (`term_id`, `name`, `slug`, `term_group`) VALUES
(1, 'Chính trị', 'chính_trị', 0),
(2, 'Blogroll', 'blogroll', 0),
(17, 'Tin tức nổi bật', 'tin_tuc_noi_bat', 0),
(4, 'Kinh tế', 'kinh_tế', 0),
(5, 'Văn hóa', 'văn_hóa', 0),
(6, 'Thể thao', 'thể_thao', 0),
(7, 'Pháp luật', 'pháp_luật', 0),
(14, 'Toán học', 'toán_học', 0),
(15, 'Văn học', 'văn_học', 0),
(16, 'Tin tức tiêu biểu', 'tin_tuc_tieu_bieu', 0),
(18, 'Đông dược', 'đông_dược', 0),
(19, 'Mỹ phẩm', 'mỹ_phẩm', 0),
(20, 'Thực phẩm chức năng', 'thực_phẩm_chức_năng', 0),
(21, 'Rượu', 'rượu', 0),
(22, 'Trà thảo dược', 'trà_thảo_dược', 0),
(23, 'Bệnh cơ xương khớp', 'bệnh_cơ_xương_khớp', 0),
(24, 'Bệnh hô hấp - Tai mũi họng', 'bệnh_hô_hấp_tai_mũi_họng', 0),
(25, 'Bệnh tiêu hóa - Trĩ - Gan mật', 'bệnh_tiêu_hóa_trĩ_gan_mật', 0),
(26, 'Bệnh sinh dục - Tiết niệu', 'bệnh_sinh_dục_tiết_niệu', 0),
(27, 'Bệnh tim mạch - Huyết áp', 'bệnh_tim_mạch_huyết_áp', 0),
(28, 'Màng đắp mặt', 'màng_đắp_mặt', 0),
(29, 'Dầu gội đầu', 'dầu_gội_đầu', 0),
(30, 'Kem dưỡng da', 'kem_dưỡng_da', 0),
(31, 'Sữa rửa mặt', 'sữa_rửa_mặt', 0),
(32, 'Sữa tắm', 'sữa_tắm', 0),
(33, 'Sản phẩm nổi bật', 'sản_phẩm_nổi_bật', 0),
(34, 'Tuần hoàn não - Thần kinh', 'tuần_hoàn_não_thần_kinh', 0);

-- --------------------------------------------------------

--
-- Table structure for table `ci_term_relationships`
--

CREATE TABLE IF NOT EXISTS `ci_term_relationships` (
  `object_id` bigint(20) unsigned NOT NULL DEFAULT '0',
  `term_taxonomy_id` bigint(20) unsigned NOT NULL DEFAULT '0',
  `term_order` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`object_id`,`term_taxonomy_id`),
  KEY `term_taxonomy_id` (`term_taxonomy_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ci_term_relationships`
--

INSERT INTO `ci_term_relationships` (`object_id`, `term_taxonomy_id`, `term_order`) VALUES
(1, 2, 0),
(2, 2, 0),
(3, 2, 0),
(4, 2, 0),
(5, 2, 0),
(6, 2, 0),
(23, 20, 0),
(1, 1, 0),
(11, 16, 0),
(8, 17, 0),
(9, 16, 0),
(23, 23, 0),
(11, 17, 0),
(12, 16, 0),
(13, 33, 0),
(14, 33, 0),
(15, 33, 0),
(16, 33, 0),
(17, 33, 0),
(18, 33, 0),
(19, 23, 0),
(21, 24, 0),
(22, 25, 0),
(20, 23, 0),
(24, 23, 0),
(26, 21, 0),
(27, 21, 0),
(28, 34, 0),
(29, 16, 0);

-- --------------------------------------------------------

--
-- Table structure for table `ci_term_taxonomy`
--

CREATE TABLE IF NOT EXISTS `ci_term_taxonomy` (
  `term_taxonomy_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `term_id` bigint(20) unsigned NOT NULL DEFAULT '0',
  `taxonomy` varchar(32) NOT NULL DEFAULT '',
  `description` longtext NOT NULL,
  `parent` bigint(20) unsigned NOT NULL DEFAULT '0',
  `count` bigint(20) NOT NULL DEFAULT '0',
  PRIMARY KEY (`term_taxonomy_id`),
  UNIQUE KEY `term_id_taxonomy` (`term_id`,`taxonomy`),
  KEY `taxonomy` (`taxonomy`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=35 ;

--
-- Dumping data for table `ci_term_taxonomy`
--

INSERT INTO `ci_term_taxonomy` (`term_taxonomy_id`, `term_id`, `taxonomy`, `description`, `parent`, `count`) VALUES
(1, 1, 'category', '', 0, 1),
(2, 2, 'link_category', '', 0, 7),
(17, 17, 'category', 'Tin tức nổi bật', 0, 0),
(4, 4, 'category', '', 0, 0),
(5, 5, 'category', '', 0, 0),
(6, 6, 'category', '', 0, 0),
(7, 7, 'category', '', 0, 0),
(14, 14, 'category', 'Toán học', 1, 0),
(15, 15, 'category', 'Văn học', 5, 0),
(16, 16, 'category', 'Tin tức tiêu biểu', 0, 0),
(18, 18, 'catpro', 'Đông dược Bảo Long', 0, 0),
(19, 19, 'catpro', 'Mỹ phẩm', 0, 0),
(20, 20, 'catpro', 'Thực phẩm chức năng', 0, 0),
(21, 21, 'catpro', 'Rượu', 0, 0),
(22, 22, 'catpro', 'Trà thảo dược', 0, 0),
(23, 23, 'catpro', 'Bệnh cơ xương khớp', 18, 0),
(24, 24, 'catpro', 'Bệnh hô hấp - Tai mũi họng', 18, 0),
(25, 25, 'catpro', 'Bệnh tiêu hóa - Trĩ - Gan mật', 18, 0),
(26, 26, 'catpro', 'Bệnh sinh dục - Tiết niệu', 18, 0),
(27, 27, 'catpro', 'Bệnh tim mạch - Huyết áp', 18, 0),
(28, 28, 'catpro', 'Màng đắp mặt', 19, 0),
(29, 29, 'catpro', 'Dầu gội đầu', 19, 0),
(30, 30, 'catpro', 'Kem dưỡng da', 19, 0),
(31, 31, 'catpro', 'Sữa rửa mặt', 19, 0),
(32, 32, 'catpro', 'Sữa tắm', 19, 0),
(33, 33, 'catpro', 'Sản phẩm nổi bật', 0, 0),
(34, 34, 'catpro', 'Tuần hoàn não - Thần kinh', 18, 0);

-- --------------------------------------------------------

--
-- Table structure for table `ci_usermeta`
--

CREATE TABLE IF NOT EXISTS `ci_usermeta` (
  `umeta_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned NOT NULL DEFAULT '0',
  `meta_key` varchar(255) DEFAULT NULL,
  `meta_value` longtext,
  PRIMARY KEY (`umeta_id`),
  KEY `user_id` (`user_id`),
  KEY `meta_key` (`meta_key`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=34 ;

--
-- Dumping data for table `ci_usermeta`
--

INSERT INTO `ci_usermeta` (`umeta_id`, `user_id`, `meta_key`, `meta_value`) VALUES
(1, 1, 'first_name', ''),
(2, 1, 'last_name', ''),
(3, 1, 'nickname', 'admin'),
(4, 1, 'description', ''),
(5, 1, 'rich_editing', 'true'),
(6, 1, 'comment_shortcuts', 'false'),
(7, 1, 'admin_color', 'fresh'),
(8, 1, 'use_ssl', '0'),
(9, 1, 'show_admin_bar_front', 'true'),
(10, 1, 'ci_capabilities', 'a:1:{s:13:"administrator";s:1:"1";}'),
(11, 1, 'ci_user_level', '10'),
(12, 1, 'dismissed_wp_pointers', 'wp330_toolbar,wp330_media_uploader,wp330_saving_widgets'),
(13, 1, 'show_welcome_panel', '1'),
(14, 2, 'group', 'butdanh'),
(15, 3, 'group', 'butdanh'),
(16, 4, 'group', 'butdanh'),
(17, 5, 'group', 'butdanh'),
(18, 6, 'group', 'butdanh'),
(19, 7, 'group', 'thanhvien'),
(20, 8, 'group', 'thanhvien'),
(21, 9, 'group', 'thanhvien'),
(26, 14, 'group', 'hoivien'),
(25, 13, 'group', 'hoivien'),
(28, 16, 'group', 'hoivien'),
(29, 17, 'group', 'hoivien'),
(30, 18, 'group', 'hoivien'),
(31, 19, 'group', 'hoivien'),
(32, 20, 'group', 'hoivien'),
(33, 21, 'group', 'hoivien');

-- --------------------------------------------------------

--
-- Table structure for table `ci_users`
--

CREATE TABLE IF NOT EXISTS `ci_users` (
  `ID` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_login` varchar(60) NOT NULL DEFAULT '',
  `user_pass` varchar(64) NOT NULL DEFAULT '',
  `user_nicename` varchar(50) NOT NULL DEFAULT '',
  `user_email` varchar(100) NOT NULL DEFAULT '',
  `user_url` varchar(100) NOT NULL DEFAULT '',
  `user_registered` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `user_activation_key` varchar(60) NOT NULL DEFAULT '',
  `user_status` int(11) NOT NULL DEFAULT '0',
  `display_name` varchar(250) NOT NULL DEFAULT '',
  PRIMARY KEY (`ID`),
  KEY `user_login_key` (`user_login`),
  KEY `user_nicename` (`user_nicename`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=22 ;

--
-- Dumping data for table `ci_users`
--

INSERT INTO `ci_users` (`ID`, `user_login`, `user_pass`, `user_nicename`, `user_email`, `user_url`, `user_registered`, `user_activation_key`, `user_status`, `display_name`) VALUES
(1, 'admin', 'admin@123', 'admin', 'vinhnt@tasvis.com.vn', '', '2012-06-12 15:26:34', '', 0, 'admin'),
(2, '', '', 'Viết Thịnh', '', '', '0000-00-00 00:00:00', '', 0, 'Viết Thịnh'),
(3, '', '', 'Anh Thư', '', '', '0000-00-00 00:00:00', '', 0, 'Anh Thư'),
(4, '', '', 'Lê Phi', '', '', '0000-00-00 00:00:00', '', 0, 'Lê Phi'),
(5, '', '', 'Vạn Bảo', '', '', '0000-00-00 00:00:00', '', 0, 'Vạn Bảo'),
(6, '', '', 'Hoàng Giang', '', '', '0000-00-00 00:00:00', '', 0, 'Hoàng Giang'),
(7, 'vanhung90_hd', '123456', 'Phạm Văn Hưng', 'phamvanhung0818@gmail.com', '', '0000-00-00 00:00:00', '', 0, 'HungPV'),
(8, 'vinhnt', 'vinhnt', 'Nguyễn Tất Vinh', 'vinhnt333@yahoo.com', '', '0000-00-00 00:00:00', '', 0, 'Nguyễn Tất Vinh'),
(9, 'minhhv', '', 'Hà Văn Minh', 'minhhv@yahoo.com.vn', '', '2012-06-23 08:41:02', '', 0, 'Hà Văn Minh'),
(13, 'hungpv', '', 'hungpv', 'vanhung90_hd@yahoo.com', '', '2012-06-23 04:50:31', '', 0, 'Phạm Văn Hưng'),
(14, 'vanhung90', '', 'vanhung90', 'vanhung90_hd@yahoo.com', '', '2012-06-23 04:51:01', '', 0, 'Phạm Văn Hưng'),
(16, 'nva', '', 'Nguyễn Văn A', 'nva@yahoo.com', '', '2012-06-23 05:28:35', '', 0, 'Nguyễn Văn A'),
(17, 'nvb', '', 'Nguyễn Văn B', 'nvb@yahoo.com', '', '2012-06-23 05:28:55', '', 0, 'Nguyễn Văn B'),
(18, 'nvc', '', 'Nguyễn Văn C', 'nvc@yahoo.com', '', '2012-06-23 05:29:19', '', 0, 'Nguyễn Văn C'),
(19, 'nvd', '', 'Nguyễn Văn D', 'nvd@yahoo.com', '', '2012-06-23 05:29:43', '', 0, 'Nguyễn Văn D'),
(20, 'nve', '', 'Nguyễn Văn E', 'nve@yahoo.com', '', '2012-06-23 05:36:27', '', 0, 'Nguyễn Văn E'),
(21, 'nvf', '', 'Nguyễn Văn F', 'nvf@yahoo.com', '', '2012-06-23 05:37:03', '', 0, 'Nguyễn Văn F');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
