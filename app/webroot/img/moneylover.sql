-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 21, 2016 at 01:12 PM
-- Server version: 5.6.26
-- PHP Version: 5.6.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `moneylover`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(11) NOT NULL,
  `category_name` varchar(20) NOT NULL,
  `category_type` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category_name`, `category_type`) VALUES
(1, 'Nợ', 'Nợ'),
(2, 'Cho vay', 'Cho Vay'),
(3, 'Ăn uống', 'Chi Tiêu'),
(4, 'Người yêu, bạn bè', 'Chi Tiêu'),
(5, 'Di chuyển', 'Chi Tiêu'),
(6, 'Hóa đơn', 'Chi Tiêu'),
(7, 'Tiện ích', 'Chi Tiêu'),
(8, 'Mua sắm', 'Chi Tiêu'),
(9, 'Giải trí', 'Chi Tiêu'),
(10, 'Du lịch', 'Chi Tiêu'),
(11, 'Sức khỏe', 'Chi Tiêu'),
(12, 'Đầu tư', 'Chi Tiêu'),
(13, 'Khoản chi khác', 'Chi Tiêu'),
(14, 'Học bổng', 'Thu Nhập'),
(15, 'Lương', 'Thu Nhập'),
(16, 'Thưởng', 'Thu Nhập'),
(17, 'Tiền lãi', 'Thu Nhập'),
(18, 'Khoản thu khác', 'Thu Nhập'),
(20, 'Giúp Đỡ', 'Cho Vay'),
(21, 'Học Phí', 'Chi Tiêu'),
(22, 'Trả lương công nhân', 'Chi Tiêu');

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE IF NOT EXISTS `transactions` (
  `id` int(11) NOT NULL,
  `amount` bigint(20) NOT NULL,
  `create_date` date NOT NULL,
  `note` varchar(255) DEFAULT NULL,
  `wallet_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `slug` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`id`, `amount`, `create_date`, `note`, `wallet_id`, `category_id`, `user_id`, `slug`) VALUES
(13, 100000, '2016-04-12', 'Mua đồ dùng cá nhân', 6, 8, 23, 'mua-do-dung-ca-nhan-75961'),
(17, 150000, '2016-04-13', 'Mua đồ dùng', 6, 8, 23, 'mua-do-dung-92707'),
(18, 10000, '2016-04-13', 'Ăn sáng', 6, 3, 23, 'an-sang-68903'),
(19, 50000, '2016-04-29', 'Nạp thẻ điện thoại', 6, 6, 23, 'nap-the-dien-thoai-38657'),
(20, 100000, '2016-04-30', 'Ăn hội', 6, 4, 23, 'an-hoi-11255'),
(21, 200000, '2016-05-02', 'Hội lớp', 6, 3, 23, 'hoi-lop-98157'),
(22, 600000, '2016-05-08', 'Nợ', 6, 16, 23, 'no-57290'),
(23, 500000, '2016-05-08', 'Cho vay', 6, 2, 23, 'cho-vay-82693'),
(24, 1000000, '2016-05-08', 'Mua đồ dùng học tập', 6, 8, 23, 'mua-do-dung-hoc-tap-54563'),
(27, 50000, '2016-05-09', 'Mua đồ dùng cá nhân', 6, 7, 23, 'mua-do-dung-ca-nhan-84190'),
(29, 50000, '2016-05-09', 'Mua đồ', 6, 8, 23, 'mua-do-15666'),
(33, 2000000, '2016-04-09', 'Tiền phạt', 25, 16, 24, 'tien-phat-45266'),
(34, 100000000, '2016-05-09', 'Lương tháng 5', 25, 15, 24, 'luong-thang-5-51662'),
(36, 200000000, '2016-05-14', 'Trả lương công nhân', 25, 22, 24, 'tra-luong-cong-nhan-87835');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL,
  `username` varchar(32) NOT NULL,
  `password` varchar(255) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `avatar` varchar(255) DEFAULT NULL,
  `role` varchar(12) NOT NULL DEFAULT 'admin',
  `code` varchar(255) DEFAULT NULL,
  `actived` tinyint(2) NOT NULL DEFAULT '0',
  `register_code` varchar(255) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `fullname`, `address`, `email`, `avatar`, `role`, `code`, `actived`, `register_code`) VALUES
(20, 'vinhkt_58', '$2a$10$sp0rhH0tVHxYAI1RjGVRlu7BxeopNCXGmwYiaxCcG9oipscd8kN6G', 'Kiều Trọng Vĩnh UET', 'England', 'vinhkt_58@vnu.edu.vn', '/img/1391524_199106213609048_1563754927_n.jpg', 'admin', '18ed1f2fef163ff49c1c0a97c51e4e99', 1, NULL),
(23, 'cuongnm_58@vnu.edu.vn', '$2a$10$t22mw4X0.KHPd8/omgwzrO0118WhpzT7AmdkdnOnSpgEGnDSNuPWe', 'Nguyễn Mạnh Cường', 'Netherlands', 'manhcuong.9x91@gmail.com', '/img/chao em.jpg', 'admin', 'b6f9bdaabd9778390af3e1b7d2eb2bf6', 1, NULL),
(24, 'vinhkt_58@vnu.edu.vn', '$2a$10$sp0rhH0tVHxYAI1RjGVRlu7BxeopNCXGmwYiaxCcG9oipscd8kN6G', 'Kiều Trọng Vĩnh', 'Germany', 'vinhkieu@vnu.edu.vn', '/img/den gio uong thuoc roi.jpg', 'admin', NULL, 1, NULL),
(25, 'cuongnm_58', '$2a$10$sp0rhH0tVHxYAI1RjGVRlu7BxeopNCXGmwYiaxCcG9oipscd8kN6G', 'Nguyễn Mạnh Cường', 'France', 'cuongmanh@vnu.edu.vn', '/img/1002085_301616826641876_844369973_n.jpg', 'admin', NULL, 1, NULL),
(41, 'lephuong95', '$2a$10$3TIZciDn654Y9p5gPc5WcucB33WwLNi.LdhroiTGil2toMsLbBgZW', 'Lê Phương', 'Hà Nội - Việt Nam', 'pixicumi@gmail.com', '/img/default_avatar.png', 'admin', '5f9f38757410871e0726924f559912ac', 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `wallets`
--

CREATE TABLE IF NOT EXISTS `wallets` (
  `id` int(11) NOT NULL,
  `wallet_name` varchar(255) NOT NULL,
  `currency` varchar(255) NOT NULL,
  `banlances` bigint(20) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `slug` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `wallets`
--

INSERT INTO `wallets` (`id`, `wallet_name`, `currency`, `banlances`, `user_id`, `slug`) VALUES
(6, 'Tiền Mặt', 'VND (₫)', 30000000, 23, 'tien-mat-64681'),
(13, 'Quỹ Đen', 'VND (₫)', 99900000, 23, 'quy-den-41102'),
(24, 'Tiền Mặt', 'VND', 10000000, 25, 'tien-mat-77535'),
(25, 'Tiền Mặt', 'USD', 2000000, 24, 'tien-mat-60028');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `wallet_id` (`wallet_id`),
  ADD KEY `category_id` (`category_id`),
  ADD KEY `userid` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wallets`
--
ALTER TABLE `wallets`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=37;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=42;
--
-- AUTO_INCREMENT for table `wallets`
--
ALTER TABLE `wallets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=26;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `transactions`
--
ALTER TABLE `transactions`
  ADD CONSTRAINT `category_id` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `userid` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `wallet_id` FOREIGN KEY (`wallet_id`) REFERENCES `wallets` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `wallets`
--
ALTER TABLE `wallets`
  ADD CONSTRAINT `user_id` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
