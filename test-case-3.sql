-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 21, 2018 at 04:07 PM
-- Server version: 10.1.35-MariaDB
-- PHP Version: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `test-case-3`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `cat_id` int(8) NOT NULL,
  `cat_name` varchar(255) NOT NULL,
  `cat_description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_name`, `cat_description`) VALUES
(1, 'Movies', 'Movies'),
(2, 'Education', 'study '),
(3, 'Sports', 'games'),
(4, 'Institute', 'Collages and all'),
(5, 'Science And Technology', 'Science And Technology'),
(6, 'Mathematics', 'Mathematics'),
(7, 'Programming', 'Computer programming'),
(8, 'Tours and Travel', 'Tours and Travel'),
(9, 'Entertainment', 'Entertainment'),
(10, 'Cooking', 'Cooking'),
(11, 'Designing', 'Desiging'),
(12, 'Fashion and Style', 'Fashion and Style'),
(13, 'Restarurants ', 'Restarurants'),
(14, 'Books', 'Books'),
(15, 'Literature', 'Literature'),
(16, 'Writers and Authors', 'Writers and Authors'),
(17, 'Actor and Actress', 'Actor and Actress');

-- --------------------------------------------------------

--
-- Table structure for table `replies`
--

CREATE TABLE `replies` (
  `reply_id` int(8) NOT NULL,
  `reply_content` text NOT NULL,
  `reply_date` datetime NOT NULL,
  `reply_topic` int(8) NOT NULL,
  `reply_by` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `replies`
--

INSERT INTO `replies` (`reply_id`, `reply_content`, `reply_date`, `reply_topic`, `reply_by`) VALUES
(1, 'Okay..! Thats okay..Fine!!..', '2018-09-23 20:15:11', 2, 1),
(2, 'I think C will be best to start with..', '2018-09-25 20:02:00', 71, 7),
(3, 'That\'s really great', '2018-09-25 20:03:00', 47, 2),
(4, 'If you are beginner then I will prefer C to start with..', '2018-09-25 20:04:00', 71, 6),
(5, 'Okay!!', '2018-09-25 22:49:00', 19, 2),
(6, 'Yeah.. Sure!!', '0000-00-00 00:00:00', 53, 2);

-- --------------------------------------------------------

--
-- Table structure for table `topics`
--

CREATE TABLE `topics` (
  `topic_id` int(8) NOT NULL,
  `topic_subject` text NOT NULL,
  `topic_date` datetime NOT NULL,
  `topic_cat` int(8) NOT NULL,
  `topic_by` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `topics`
--

INSERT INTO `topics` (`topic_id`, `topic_subject`, `topic_date`, `topic_cat`, `topic_by`) VALUES
(2, 'Here the question goes from the category. The question is asked by a certain user with a valid user name and password. So that\'s it..', '2018-09-23 20:14:21', 1, 1),
(4, 'A lot of explanation is in the comments I made in the file, so be sure to check them out. The processing of the data takes place in three parts:\r\n\r\nValidating the data\r\nIf the data is not valid, show the form again\r\nIf the data is valid, save the record i', '2018-09-23 09:00:00', 1, 2),
(5, 'On line 1 we have the INSERT INTO statement which speaks for itself. The table name is specified on the second line. The words between the brackets represent the columns in which we want to insert the data. The VALUES statement tells the database we\'re do', '2018-09-23 20:25:00', 1, 1),
(6, 'Also, you can see that the function sha1() is used to encrypt the user\'s password. This is also a very important thing to remember. Never insert a plain password as-is. You MUST always encrypt it. Imagine a hacker who somehow manages to get access to your', '2018-09-23 21:44:00', 2, 2),
(19, 'questions lies this okay', '2018-09-24 01:27:15', 3, 2),
(29, 'Narula Institute of Technology..', '2018-09-24 01:58:14', 4, 2),
(47, 'The category problem is almost solved for today.. Next user should get a feature to add his own category if required category is not present..', '2018-09-24 02:22:32', 2, 2),
(53, 'active class problem need to be sloved..', '2018-09-24 20:48:17', 2, 2),
(70, 'Best fashion store in Kolkata?', '2018-09-24 22:38:16', 12, 6),
(71, 'Which Programming language is best to start with..?', '2018-09-25 12:59:09', 7, 7),
(72, 'mxbiugxiuH', '2018-10-03 10:55:51', 5, 9);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(255) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `user_pass` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_date` datetime NOT NULL,
  `user_level` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `ph_no` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_pass`, `user_email`, `user_date`, `user_level`, `first_name`, `last_name`, `ph_no`) VALUES
(1, 'akd', '686976a994814c9aec9f5a566a0e48054dda9962', 'akd@g.com', '2018-09-24 14:17:02', 0, 'AKD', ' ', '9898987563'),
(2, 'greek_god', '686976a994814c9aec9f5a566a0e48054dda9962', 'greek_god@mail.com', '2018-09-24 14:18:28', 0, 'Greek', 'God', '98654711230'),
(6, 'wangdu_pungsug', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', 'wandu_punsung@rediffmail.com', '2018-09-24 22:17:29', 0, 'punsung', 'wangdu', '9873012654'),
(7, 'biswas_barun', '65547f3cffa968a6703d428712b43b69f512cf14', 'barun_biswas@hotmail.com', '2018-09-25 12:57:44', 0, 'Barun', 'Biswas', '9873216540'),
(8, 'atul', '00ab32a8f4dad5a57615960b56b58eccdb2b4896', 'anand@g.com', '2018-09-25 14:27:56', 0, 'Atul', 'Anad', '789654123'),
(9, 'nunu', 'a82414e7c774a2d3ab0f9bef50c5f36a40c47d1f', 'nunu@g.com', '2018-10-03 10:55:23', 0, 'atanu', 'mondal', '789456123'),
(10, '', 'da39a3ee5e6b4b0d3255bfef95601890afd80709', 'D', '2018-10-03 11:09:31', 0, 'DSASDAD', 'SAADSASD', '9');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_id`),
  ADD UNIQUE KEY `cat_name` (`cat_name`);

--
-- Indexes for table `replies`
--
ALTER TABLE `replies`
  ADD PRIMARY KEY (`reply_id`),
  ADD KEY `reply_topic` (`reply_topic`),
  ADD KEY `reply_by` (`reply_by`);

--
-- Indexes for table `topics`
--
ALTER TABLE `topics`
  ADD PRIMARY KEY (`topic_id`),
  ADD KEY `topic_cat` (`topic_cat`),
  ADD KEY `topic_by` (`topic_by`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `user_name` (`user_name`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `replies`
--
ALTER TABLE `replies`
  MODIFY `reply_id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `topics`
--
ALTER TABLE `topics`
  MODIFY `topic_id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `replies`
--
ALTER TABLE `replies`
  ADD CONSTRAINT `replies_ibfk_1` FOREIGN KEY (`reply_topic`) REFERENCES `topics` (`topic_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `replies_ibfk_2` FOREIGN KEY (`reply_by`) REFERENCES `users` (`user_id`) ON UPDATE CASCADE;

--
-- Constraints for table `topics`
--
ALTER TABLE `topics`
  ADD CONSTRAINT `topics_ibfk_1` FOREIGN KEY (`topic_cat`) REFERENCES `categories` (`cat_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `topics_ibfk_2` FOREIGN KEY (`topic_by`) REFERENCES `users` (`user_id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
