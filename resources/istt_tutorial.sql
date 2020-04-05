-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 04, 2020 at 03:18 PM
-- Server version: 10.1.33-MariaDB
-- PHP Version: 7.2.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `istt_tutorial`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(100) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `username`, `email`, `password`) VALUES
(1, 'sadek', 'sadeknurul5@gmail.com', '4321');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` int(100) NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` text NOT NULL,
  `date` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `name`, `image`, `date`) VALUES
(1, 'Neural Network', 'images.png', '4th Sep, 2019'),
(2, 'Web Development', 'web.jpg', '4th Sep, 2019'),
(5, 'Android App Development', '2bb1082bad.jpg', ' 9th  September 2019 , 7:39 pm');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(100) NOT NULL,
  `name` varchar(255) NOT NULL,
  `session` varchar(200) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `name`, `session`, `email`, `password`, `date`) VALUES
(1, 'Sadek Nurul', '2015-2016', 'sadek@gmail.com', '1234', '4th Sep, 2019'),
(3, 'Taohid Al Farabi', '2015-2016', 'taafarabi@gmail.com', '1234', ' 9th  September 2019 , 7:48 pm');

-- --------------------------------------------------------

--
-- Table structure for table `tutorials`
--

CREATE TABLE `tutorials` (
  `id` int(100) NOT NULL,
  `title` varchar(255) NOT NULL,
  `course_id` int(100) NOT NULL,
  `link` text NOT NULL,
  `category` varchar(100) NOT NULL,
  `date` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tutorials`
--

INSERT INTO `tutorials` (`id`, `title`, `course_id`, `link`, `category`, `date`) VALUES
(1, 'Over view of Variable', 2, 'https://www.youtube.com/', 'video', '4th Sep, 2019'),
(2, 'Array and String', 2, 'https://www.youtube.com/', 'video', '4th Sep, 2019'),
(3, 'Derivative', 1, 'https://stackoverflow.com/', 'document', '4th Sep, 2019'),
(4, 'Derivative', 2, 'https://stackoverflow.com/', 'document', '4th Sep, 2019'),
(5, 'Over view of Variable', 1, 'https://www.youtube.com/', 'video', '4th Sep, 2019'),
(8, 'Branching', 2, 'https://www.youtube.com/', 'video', ' 9th  September 2019 , 7:45 pm');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tutorials`
--
ALTER TABLE `tutorials`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tutorials`
--
ALTER TABLE `tutorials`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
