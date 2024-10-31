-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 31, 2024 at 03:35 PM
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
-- Database: `blog_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `email`, `username`, `password`, `image`) VALUES
(1, 'Sancho@gmail.com', 'Sancho', '$2y$10$Uswl6aiF87bIAlEclYs1GecKwt6vb1lLRfJzbh8MlNkwmrzUvclPq', 'AVT-67239522953b69.76806055.jpg'),
(2, 'HoangLe@gmail.com', 'Hoang Le', '$2y$10$KtNEBr2G8r4PQp5TTaccou4y9fZ8YsnM00IdkF4VZF6KFkF.ygBcq', 'AVT-672395607b7bd5.01044788.gif');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `category` varchar(127) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `category`) VALUES
(1, 'Information Technology'),
(2, 'Diddy and his slaves'),
(3, 'Tokusatsu'),
(4, 'Anime'),
(6, 'Donghua');

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `comment_id` int(11) NOT NULL,
  `comment` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`comment_id`, `comment`, `user_id`, `post_id`, `created_at`) VALUES
(1, 'Big bang funny bruh', 1, 4, '2024-10-27 18:38:30');

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `post_id` int(11) NOT NULL,
  `post_title` varchar(127) NOT NULL,
  `post_text` text NOT NULL,
  `category` int(11) NOT NULL,
  `cover_url` varchar(255) NOT NULL DEFAULT 'default.jpg',
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`post_id`, `post_title`, `post_text`, `category`, `cover_url`, `created_at`) VALUES
(1, 'Blog title', 'Blog text, just simply like this, don\'t hold your breath, hahaha, baka yarou.', 1, 'COVER-67226df08826f1.39347834.png', '2024-10-22 20:08:50'),
(2, 'BlOg TiTlE', 'it\'s strange, doesn\'t it? haha', 1, 'COVER-672084d422e016.46029410.jpg', '2024-10-22 20:14:18'),
(3, 'Alan Walker bị chụp lén tại Việt Nam!!!', '&lt;Báo Chơi Đồ đưa tin&gt;', 2, 'COVER-671cde2909b922.18328059.jpg', '2024-10-26 19:18:49'),
(4, 'Giải cứu Dốc cơ lỏ Huy Nguyễn khỏi bàn tay của ông trùm Hollywood Diddy!', '<div>Năm 2009, Huy Nguyễn, a.k.a Chí Huy Bieber, đã bị rapper Diddy bắt về biệt thự riêng và tổ chức những bữa tiệc thác loạn khét tiếng tại xứ sở cờ hoa, tiêu biểu là các bữa tiệc trắng, Lemonparty... Được biết biệt thự của ông trùm này có đến 1000 can dầu trẻ em (dầu làm từ trẻ em)... Báo Lá Cải đưa tin.</div>', 2, 'COVER-671db0e9f26830.93782503.png', '2024-10-27 10:18:01'),
(5, 'Lorem Ipsum', '<div><h2 style=\"margin-bottom: 10px; font-family: DauphinPlain; font-size: 24px; line-height: 24px; color: rgb(0, 0, 0);\">What is Lorem Ipsum?</h2><div><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</div></div><div><br></div><div><h2 style=\"margin-bottom: 10px; font-family: DauphinPlain; font-size: 24px; line-height: 24px; color: rgb(0, 0, 0);\">Why do we use it?</h2><div>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</div></div><div><br></div><div><h2 style=\"margin-bottom: 10px; font-family: DauphinPlain; font-size: 24px; line-height: 24px; color: rgb(0, 0, 0);\">Where does it come from?</h2><div>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.</div></div><div><br></div><div><br></div>', 6, 'default.jpg', '2024-10-30 21:30:20'),
(6, 'HAHA', '<div>Geats is overrated</div><div><br></div>', 3, 'COVER-672394fd828bb2.93020322.gif', '2024-10-31 21:31:55');

-- --------------------------------------------------------

--
-- Table structure for table `post_dislike`
--

CREATE TABLE `post_dislike` (
  `dislike_id` int(11) NOT NULL,
  `disliked_by` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `disliked_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `post_dislike`
--

INSERT INTO `post_dislike` (`dislike_id`, `disliked_by`, `post_id`, `disliked_at`) VALUES
(1, 3, 4, '2024-10-29 11:13:21');

-- --------------------------------------------------------

--
-- Table structure for table `post_like`
--

CREATE TABLE `post_like` (
  `like_id` int(11) NOT NULL,
  `like_by` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `liked_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `post_like`
--

INSERT INTO `post_like` (`like_id`, `like_by`, `post_id`, `liked_at`) VALUES
(1, 3, 4, '2024-10-27 21:43:16');

-- --------------------------------------------------------

--
-- Table structure for table `post_share`
--

CREATE TABLE `post_share` (
  `share_id` int(11) NOT NULL,
  `shared_by` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `shared_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `post_share`
--

INSERT INTO `post_share` (`share_id`, `shared_by`, `post_id`, `shared_at`) VALUES
(1, 3, 4, '2024-10-29 11:10:41');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `username`, `password`) VALUES
(1, 'DaoDucThienTon@gmail.com', 'Thái Thanh Đạo Đức Thiên Tôn', '$2y$10$WXqMYYjwKG9Jj6z5DS6q/.RJWrzA67mpXxCF4Ce72onf7ad5riHdG'),
(2, 'NguyenThuyThienTon@gmail.com', 'Ngọc Thanh Nguyên Thủy Thiên Tôn', '$2y$10$.7EgYaWUkW0dHdPdggcbieV5IcCualePA79nEuEZmb3p76y27sDFi'),
(3, 'LinhBaoThienTon@gmail.com', 'Thượng Thanh Linh Bảo Thiên Tôn', '$2y$10$96YATI7nQ8qEOAa7kv5znOQeAl7AfrZmj5mxMR49F12tBMDch2Gfi'),
(4, 'HaoThienThuongDe@gmail.com', 'Hạo Thiên Thượng Đế', '$2y$10$h/5MjKiaTVesTJrKGxiTy.8MYq/M2WEIq8KNPUjVyg.UdmhYvMz7G'),
(5, 'baohg23it@gmail.com', 'Bảo Hồ', '$2y$10$gOwm0FmlIGGRDPFMFwRq4egXxRr1duMA5XySeP0y29ZaO2820O8r2'),
(6, 'ducpn23it@gmail.com', 'Đức Phạm', '$2y$10$vbRWsFupoilCrATt94iyFOCv2hH6D5K0VDfYD1ns80YY1qVA5So2C'),
(7, 'hoanglt23it@gmail.com', 'Hoàng Lê', '$2y$10$ykIxg56azfBBRSGWPyVCxe9eAHd9nAul8sO9NQa0wRxb71NLxbVpe'),
(8, 'huync23it@gmail.com', 'Huy Nguyễn', '$2y$10$XuLCYFpluqsqXGjxzSymTecPFornIoPF.hkqxo0Q2W.1iTD6q9/fy'),
(9, 'khoaphd23it@gmail.com', 'Khoa Phạm', '$2y$10$bKrO8ke3un2z2do3uD8SEOv7dOapftxbH7z2R45VNOuFfMKxkX77C');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`post_id`);

--
-- Indexes for table `post_dislike`
--
ALTER TABLE `post_dislike`
  ADD PRIMARY KEY (`dislike_id`);

--
-- Indexes for table `post_like`
--
ALTER TABLE `post_like`
  ADD PRIMARY KEY (`like_id`);

--
-- Indexes for table `post_share`
--
ALTER TABLE `post_share`
  ADD PRIMARY KEY (`share_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `post_dislike`
--
ALTER TABLE `post_dislike`
  MODIFY `dislike_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `post_like`
--
ALTER TABLE `post_like`
  MODIFY `like_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `post_share`
--
ALTER TABLE `post_share`
  MODIFY `share_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1000;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
