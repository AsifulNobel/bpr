-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 02, 2017 at 10:48 AM
-- Server version: 5.7.20-0ubuntu0.16.04.1
-- PHP Version: 7.0.22-0ubuntu0.16.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `prolab`
--

-- --------------------------------------------------------

--
-- Table structure for table `project`
--

CREATE TABLE `project` (
  `project_id` int(11) NOT NULL,
  `project_title` varchar(100) NOT NULL,
  `project_description` text NOT NULL,
  `project_url` varchar(100) NOT NULL,
  `project_privacy` int(11) NOT NULL DEFAULT '1',
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `project`
--

INSERT INTO `project` (`project_id`, `project_title`, `project_description`, `project_url`, `project_privacy`, `user_id`) VALUES
(9, 'Third', 'The quick brown fox ran over the lazy dog', 'third.zip', 1, 30);

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `ID` int(10) UNSIGNED NOT NULL,
  `review_content` text,
  `user_id` int(11) NOT NULL,
  `project_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `role_id` int(11) NOT NULL,
  `role_name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`role_id`, `role_name`) VALUES
(1, 'Admin'),
(2, 'Normal');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `ID` int(10) UNSIGNED NOT NULL,
  `first_name` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `middle_name` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`ID`, `first_name`, `middle_name`, `last_name`) VALUES
(1, 'Asiful', 'Haque', 'Latif'),
(2, 'John', NULL, 'Doe'),
(3, 'John', NULL, 'Smith'),
(4, 'Robert', 'Haque', 'Bruce'),
(5, 'Barry', 'Allen', NULL),
(6, 'Kevin', 'Barry', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(80) NOT NULL,
  `name` varchar(30) NOT NULL,
  `date_of_birth` date DEFAULT NULL,
  `gender` varchar(10) NOT NULL,
  `photo` varchar(50) DEFAULT NULL,
  `role_id` int(1) DEFAULT '2',
  `user_status` int(1) NOT NULL DEFAULT '0',
  `student_id` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `email`, `password`, `name`, `date_of_birth`, `gender`, `photo`, `role_id`, `user_status`, `student_id`) VALUES
(1, 'admin@northsouth.edu', '$2y$10$TEZvC4iBBuweo4C6Xw2WougtJL/r7QCSHxMWZdyiOEPfGP3S2Pymi', 'Master Admin', '1995-06-02', 'Male', 'Minimalist-Wallpaper-Archer-Forest.jpg', 1, 1, NULL),
(28, 'user2@northsouth.edu', '$2y$10$mZaREYF1Ye6yTgAu6SDb9.R4wI5P/kTQnWTlHUK8nz14hxsXoCUPK', 'user2', '1997-04-02', 'Female', 'default_user_female.jpg', 2, 1, 1239291012),
(30, 'john@northsouth.edu', '$2y$10$TlORhOP7gQzXtDSpK5UZkuMmv046DrBjTq92gbLti85LcauERzmBq', 'John Doe', '1990-02-02', 'Male', 'avatar.png', 2, 1, 1330291012),
(33, 'jane@northsouth.edu', '$2y$10$3iQoodE7voma536f3DWUaua8XJbLoQnegY1Z0ZX/5q3A0Dtmz55EO', 'Jane Doe', '1991-01-02', 'Female', 'default_user_female.jpg', 2, 0, 1431511042),
(35, 'john.smith@northsouth.edu', '$2y$10$kDZV3vv4R4n35AiGnGOn1OTk5zYm4uxtIfiM5G7yscMMpUzThWmGq', 'John Smith', NULL, 'Male', NULL, 2, 0, 1410511042);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `project`
--
ALTER TABLE `project`
  ADD PRIMARY KEY (`project_id`);

--
-- Indexes for table `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`role_id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `project`
--
ALTER TABLE `project`
  MODIFY `project_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `review`
--
ALTER TABLE `review`
  MODIFY `ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `role_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
