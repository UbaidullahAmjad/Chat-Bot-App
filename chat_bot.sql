-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 22, 2020 at 02:17 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `chat_bot`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(100) NOT NULL,
  `admin_name` varchar(200) NOT NULL,
  `admin_password` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_name`, `admin_password`) VALUES
(1, 'Usman Aslam', 'Usman11?'),
(2, 'kashif', '1234');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `post_id` int(100) NOT NULL,
  `user_id` int(100) NOT NULL,
  `picture` varchar(255) NOT NULL,
  `desc_post` text NOT NULL,
  `hash_tags` text NOT NULL,
  `posting_time` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`post_id`, `user_id`, `picture`, `desc_post`, `hash_tags`, `posting_time`) VALUES
(1, 18, 'images\\postsimages\\LoginBG.png', 'it solution provider', '#it #soloution #blah', '12:11 AM'),
(2, 18, 'images\\postsimages\\1.jpg', 'weather is awesome', '#weather #cool #awesom', '12:11 PM'),
(3, 18, 'images\\postsimages\\1.jpg', 'nice weather and i look so good in new skin', '#same old weather #nice', '2020-06-22'),
(4, 3, 'images\\postsimages\\1.jpg', 'nice weather and i look so good in new skin', '#same old weather #nice', '2020-06-22'),
(5, 3, 'images\\postsimages\\1.jpg', 'weather is awesome', '#weather #cool #awesom', '2020-06-22'),
(6, 3, 'images\\postsimages\\LoginBG.png', 'it solution provider', '#it #soloution #blah', '2020-06-22'),
(7, 18, 'images\\postsimages\\4.jpg', 'weather is awesome', '#weather #cool #awesom', '2020-06-22'),
(8, 18, 'images\\postsimages\\6.jpg', 'weather is awesome', '#weather #cool #awesom', '2020-06-22'),
(9, 3, 'images\\postsimages\\5.jpg', 'weather is awesome', '#weather #cool #awesom', '2020-06-22');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(100) NOT NULL,
  `insta_id` varchar(100) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `start_time` text NOT NULL,
  `end_date` text NOT NULL,
  `pic_folder` text NOT NULL,
  `desc_file` text NOT NULL,
  `tags_file` text NOT NULL,
  `comment_file` text NOT NULL,
  `no_post` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `insta_id`, `user_name`, `start_time`, `end_date`, `pic_folder`, `desc_file`, `tags_file`, `comment_file`, `no_post`) VALUES
(3, '12', 'mani', '12/6/2020', '18/6/2020', 'pic_folder_name/angular.png', 'posts_csv/angular2.png', 'hashtag_csv/angular3.png', 'comments/angula1r.png', 2),
(14, '14', 'soban', '13/6/2020', '19/6/2020', 'pic_folder_name/1584007027.png', 'posts_csv/first.csv', 'hashtag_csv/second.csv', 'comments/1583999968.png', 3),
(18, '14', 'arsalan', '20/6/2020', '30/6/2020', 'images/postsimages/LoginBG.png', 'PostTextFile/mysql_to_excel.csv', 'HashTagFileUpload/mysql_to_excel.csv', 'commentsFile/significant_20200307 (2).csv', 2),
(19, '11', 'arsalan', '20/6/2020', '30/6/2020', 'images/postsimages/LoginBG.png', 'PostTextFile/mysql_to_excel.csv', 'HashTagFileUpload/mysql_to_excel.csv', 'commentsFile/mysql_to_excel.csv', 2),
(26, 'arsalan.ak47', 'postsimagespostsimagesLoginBG.png', '20/6/2020', '30/6/2020', 'arsalan1', 'PostTextFile/mysql_to_excel.csv', 'HashTagFileUpload/mysql_to_excel.csv', 'commentsFile/mysql_to_excel.csv', 2),
(27, 'arsalan.ak47', 'arsalan', '20/6/2020', '30/6/2020', 'arsalan', 'PostTextFile/mysql_to_excel.csv', 'HashTagFileUpload/mysql_to_excel.csv', 'commentsFile/mysql_to_excel.csv', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`post_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `post_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
