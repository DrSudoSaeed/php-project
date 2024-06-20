-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 20, 2024 at 12:55 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pubgmobile`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
  `id` int(11) NOT NULL,
  `img` varchar(255) NOT NULL,
  `lvl` int(5) NOT NULL,
  `name` varchar(255) NOT NULL,
  `rank` varchar(255) NOT NULL,
  `uc` int(50) NOT NULL,
  `sesione` varchar(255) NOT NULL,
  `sesionem` varchar(255) NOT NULL,
  `skinu` varchar(300) NOT NULL,
  `linked` varchar(120) NOT NULL,
  `linktree` varchar(50) NOT NULL,
  `formacc` text NOT NULL,
  `price` int(100) NOT NULL,
  `buylink` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `vaz` varchar(20) NOT NULL DEFAULT 'yes',
  `created` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`id`, `img`, `lvl`, `name`, `rank`, `uc`, `sesione`, `sesionem`, `skinu`, `linked`, `linktree`, `formacc`, `price`, `buylink`, `username`, `vaz`, `created`) VALUES
(127, '7n9z9Z5011CT9gDh19su5841BSw2jz1n.jpg', 70, 'saeed', 'ace', 0, '', '', 'دوج‌زرد‌ دوج نارنجی امفور‌جوکر5 کانکs17', 'google', 'no', '<p>کانکور سیزن s17</p><p>\r\nدوج زرد کمیاب</p><p>\r\nدوج نارنجی</p><p>&nbsp;کمیاب\r\nامفور جوکر لول&nbsp;</p><p>5\r\nست مویمایی</p>', 14400000, 'http://localhost/pubg/detail.php?url=zLwqr', 'saeed', 'no', ''),
(128, '7n9z9Z5011CT9gDh19su5841BSw2jzn (1).jpg', 75, 'tataloo', 'ace master', 0, '', '', 'امفور جوکر لول 5 ', 'google', 'yes', '<p><strong>ست اینواندر</strong></p><p><strong>\r\nست گانسولیگر</strong></p><p><strong>\r\nست کماندار\r\n</strong></p><p><strong>هلمت یخی</strong></p><p>\r\nهلمت ست اپگریدی</p><p>&nbsp;درختی\r\nپیرهن بلک&nbsp;</p><p>کمیاب\r\nپیرهن لجنذ&nbsp;</p><p>کمیاب\r\nشورت</p><p>&nbsp;متیک\r\nبک پک&nbsp;</p><p>دلفین\r\nبک پک</p><p>&nbsp;ست اپگریدی درخت</p>', 21100000, 'http://localhost/pubg/detail.php?url=syhQD', 'saeed', 'no', ''),
(129, '7n9z9Z5011CT9gDh19su5841BSw2jz2.jpg', 66, 'سعید', 'ace master', 0, '', '', 'گروزا لول 4 ام بیست لول 4 ام هفتصد لول 2', 'google facebook', 'no', '<p>آس کا اس لول <i><strong>1\r\n</strong></i></p><p><i><strong>1صدتیر لول&nbsp;</strong></i></p><p><i><strong>1\r\nایوجی لول</strong></i></p><p><i><strong>\r\nمینی 14 لول 1</strong></i></p><p><i><strong>\r\nقمه لول&nbsp;</strong></i></p><p><i><strong>1\r\nیو ام پی لول&nbsp;</strong></i></p><p>2\r\nپن لول&nbsp;</p><p>2\r\nتامسون لول 1\r\n</p><p>پیپی لول 1\r\n3</p><p>&nbsp;جایگاه گان باز\r\nدو جایگاه ماشین باز</p>', 6800000, 'http://localhost/pubg/detail.php?url=2ajFu', 'saeed', 'yes', ''),
(130, '7n9z9Z5011CT9gDh19su5841BSw2jz3n.jpg', 66, 'مملی', 'ace master', 0, '', '', 'گروزا لول 4 ام بیست لول 4 ام هفتصد لول 2 جوکر4', 'google facebook', 'yes', '<p>متیک فشن</p><p>\r\n70 متیک\r\n</p><p>جدا از دوج ها پیکان</p><p>&nbsp;سیزن 6 و 12\r\nموتور قدیمی فرانسوی\r\n</p><p>هفت اسکین بگی\r\nفول اسکین قای</p><p>ق \r\nدوتا مینی بوس یکی تانک</p><p>\r\nاسکیت پرنده لجند مال لباس آپگریدی جنگلی\r\n</p><p>دو عدد چتر لجند قدیمی\r\nاز سیزن</p><p>&nbsp;s5 پلی اکانت به شدت قدیمی واقن ارزش خرید داره\r\n8</p><p>&nbsp;متیک فورج</p><p>\r\n1 متریال با 9 مینی متریال</p>', 5700000, 'http://localhost/pubg/detail.php?url=Hg2DQ', 'saeed', 'yes', ''),
(131, 'ikhj.JPG', 70, 'tinam', 'thrth', 0, '', '', 'ندارد', 'yjhtryjhytr', 'yjtjt', '<p>ii;\'o\';uo;u-o</p>', 5100003, 'http://localhost/pubg/detail.php?url=Vezxv', 'Amir', 'no', '');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `user_id` int(12) NOT NULL,
  `post_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `user_id`, `post_id`) VALUES
(63, 1, 123),
(64, 1, 123),
(65, 1, 125),
(66, 1, 123),
(67, 1, 114),
(68, 1, 114),
(69, 1, 114);

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `name` varchar(120) NOT NULL,
  `mobile` int(11) NOT NULL,
  `email` varchar(200) NOT NULL,
  `message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `name`, `mobile`, `email`, `message`) VALUES
(5, 'saeed', 2147483647, 'shetabhostin@gmail.com', 'salam'),
(6, 'amir', 2147483647, 'shetabhostin@gmail.com', 'khobi');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `mobile` varchar(11) NOT NULL,
  `email` varchar(150) NOT NULL,
  `password` varchar(100) NOT NULL,
  `otp` varchar(10) NOT NULL,
  `admin` enum('yes','no') NOT NULL DEFAULT 'no',
  `role` enum('admin','user','super') NOT NULL DEFAULT 'user',
  `profile` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `mobile`, `email`, `password`, `otp`, `admin`, `role`, `profile`) VALUES
(1, 'saeed', '09014442222', 'saeeds@gmail.com', '123', '', 'no', 'super', 'photo_۲۰۲۴-۰۶-۱۲_۲۳-۱۸-۳۸.jpg'),
(2, 'sara', '09015981', 'sara@gmail.com', '1234', '', 'no', 'user', ''),
(3, 'tina', '09010367768', 'tina@gmail.com', 'saeed', '', 'no', 'super', 'photo_2024-06-14_12-58-26.jpg'),
(4, 'ali', '09157556543', 'mahdi@gmail.com', 'mahdi', '', 'no', 'super', 'IMG_20190930_200612_488.jpg'),
(5, 'sudosaeed', '09015555525', 'drsudosaeed@gmail.com', '12345', '', 'yes', 'admin', ''),
(6, 'nik', '09797987767', 'niko@gmail.com', '123456', '', 'no', 'user', ''),
(7, 'sina', '0968685667', 'sin@gmail.com', '1234567', '', 'no', 'super', ''),
(8, 'nika', '09045646469', 'nika@gmail.com', '12345678', '', 'no', 'user', ''),
(13, 'Amir', '09034445566', 'Amir@gmail.com', 'amir', '', 'no', 'user', ''),
(35, 'سعید', '09015981443', 'sa@gmail.com', 'saeed', '', 'no', 'user', ''),
(39, 'yaman', '09015983465', 'yaman@gmail.com', '1234', '', 'no', 'user', 'city-man-person-people-35183.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`id`);
ALTER TABLE `accounts` ADD FULLTEXT KEY `buylink` (`buylink`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accounts`
--
ALTER TABLE `accounts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=132;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
