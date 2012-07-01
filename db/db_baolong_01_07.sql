-- phpMyAdmin SQL Dump
-- version 3.4.10.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 01, 2012 at 06:14 AM
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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=38 ;

--
-- Dumping data for table `ci_postmeta`
--

INSERT INTO `ci_postmeta` (`meta_id`, `post_id`, `meta_key`, `meta_value`) VALUES
(1, 19, 'featured_image', '/baolong/application/elfinder/php/../files/hoa-long.png'),
(2, 19, 'price', '35,000 VND'),
(3, 20, 'featured_image', '/baolong/application/elfinder/php/../files/con%20xoa%20bop.gif'),
(4, 20, 'price', '20,000 VND'),
(5, 21, 'featured_image', '/baolong/application/elfinder/php/../files/nuoc%20suc%20mieng%20da%20hoa%20tieu.gif'),
(6, 21, 'price', '35,000 VND'),
(7, 22, 'featured_image', '/baolong/application/elfinder/php/../files/tiem%20long.gif'),
(8, 22, 'price', '35,000 VND'),
(9, 13, 'featured_image', '/baolong/application/elfinder/php/../files/hoa-long.png'),
(10, 13, 'price', '35,000 VND'),
(11, 14, 'featured_image', '/baolong/application/elfinder/php/../files/sieu%20nhan%20tieu%20bao.gif'),
(12, 14, 'price', '48,000 VND'),
(13, 15, 'featured_image', '/baolong/application/elfinder/php/../files/Tra-thanh-long-3d.png'),
(14, 15, 'price', '30,000 VND'),
(15, 16, 'featured_image', '/baolong/application/elfinder/php/../files/bach-long-thuy.png'),
(16, 16, 'price', '25,000 VND'),
(17, 17, 'featured_image', '/baolong/application/elfinder/php/../files/ngoc-duong-sam.png'),
(18, 17, 'price', '300,000 VND'),
(19, 18, 'featured_image', ''),
(20, 18, 'price', '250,000 VND'),
(21, 9, 'featured_image', '/baolong/application/elfinder/php/../files/thutuonglao.jpg'),
(23, 11, 'featured_image', '/baolong/application/elfinder/php/../files/thutuonglao.jpg'),
(24, 8, 'featured_image', '/baolong/application/elfinder/php/../files/voykisu.jpg'),
(25, 12, 'featured_image', '/baolong/application/elfinder/php/../files/thutuonglao.jpg'),
(26, 23, 'featured_image', '/baolong/application/elfinder/php/../files/lon-sam-quy.png'),
(27, 23, 'price', '10,000 VND'),
(28, 24, 'featured_image', '/baolong/application/elfinder/php/../files/bo%20than%20hoan%20mem.gif'),
(29, 24, 'price', '100,000 VND'),
(34, 27, 'featured_image', '/baolong/application/elfinder/php/../files/sam-ngoc-duong.gif'),
(32, 26, 'featured_image', '/baolong/application/elfinder/php/../files/ruou-vang-dau.gif'),
(33, 26, 'price', '200,000 VND'),
(35, 27, 'price', '300,000 VND'),
(36, 28, 'featured_image', '/baolong/application/elfinder/php/../files/linh-chi-luc-vi.gif'),
(37, 28, 'price', '35,000 VND');

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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=29 ;

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
(9, 2, '2012-06-25 00:00:00', '2012-06-25 00:00:00', '<p>\r\n	&ldquo;Tiền n&agrave;o của nấy th&ocirc;i. 10.000 đồng/cốc th&igrave; lấy đ&acirc;u ra hoa quả tươi, đường m&iacute;a &ldquo;xịn&rdquo;, hay thậm ch&iacute; đỗ, bột, dầu chuối nguy&ecirc;n chất?&rdquo;, chủ một qu&aacute;n ch&egrave; tự chọn, vỉa h&egrave; th&uacute; thật.</p>\r\n', 'Ăn chè tự chọn vỉa hè: Thượng đế đang tự đầu độc mình!', '“Tiền nào của nấy thôi. 10.000 đồng/cốc thì lấy đâu ra hoa quả tươi, đường mía “xịn”, hay thậm chí đỗ, bột, dầu chuối nguyên chất?”, chủ một quán chè tự chọn, vỉa hè thú thật.', 'publish', 'open', 'open', '', '', '', '', '2012-06-30 03:26:50', '0000-00-00 00:00:00', '', 0, '', 0, 'post', '', 0),
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
(23, 1, '2012-06-30 05:56:47', '0000-00-00 00:00:00', '<div class="productinfo">\r\n	<h4>\r\n		C&ocirc;ng dụng:</h4>\r\n	<div class="info">\r\n		Hỗ trợ tăng, cường sinh lực, chống mệt mỏi trước hoặc sau khi lao động mệt mỏi thể lực v&agrave; tr&iacute; &oacute;c. Lon 240 ml.</div>\r\n	<h4>\r\n		C&aacute;ch d&ugrave;ng:</h4>\r\n	<h4>\r\n		Th&agrave;nh phần:</h4>\r\n	<div class="info">\r\n		Nh&acirc;n s&acirc;m 2,5%&nbsp;<br />\r\n		Đương quy 5 %</div>\r\n</div>\r\n<p>\r\n	&nbsp;</p>\r\n', 'Nước uống sâm quy', 'Hỗ trợ tăng, cường sinh lực, chống mệt mỏi trước hoặc sau khi lao động mệt mỏi thể lực và trí óc. Lon 240 ml.', 'publish', 'open', 'open', '', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', 0, '', 0, 'product', '', 0);

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
(28, 34, 0);

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
