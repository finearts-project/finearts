-- phpMyAdmin SQL Dump
-- version 4.6.6deb5ubuntu0.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 25, 2020 at 01:41 AM
-- Server version: 5.7.32-0ubuntu0.18.04.1
-- PHP Version: 7.4.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fine_arts`
--

-- --------------------------------------------------------

--
-- Table structure for table `activity_form`
--

CREATE TABLE `activity_form` (
  `id` int(11) NOT NULL,
  `event_id` varchar(10) DEFAULT NULL,
  `event_name` varchar(200) NOT NULL,
  `sub_event_id` varchar(10) DEFAULT NULL,
  `student_reg_no` varchar(200) NOT NULL,
  `student_name` varchar(200) NOT NULL,
  `sub_event_name` varchar(200) NOT NULL,
  `programe_name` varchar(200) NOT NULL,
  `level` varchar(200) NOT NULL,
  `venue` text NOT NULL,
  `from_date` date NOT NULL,
  `to_date` date NOT NULL,
  `coordinator_name` varchar(200) NOT NULL,
  `org_by` varchar(200) NOT NULL,
  `cat` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `activity_form`
--

INSERT INTO `activity_form` (`id`, `event_id`, `event_name`, `sub_event_id`, `student_reg_no`, `student_name`, `sub_event_name`, `programe_name`, `level`, `venue`, `from_date`, `to_date`, `coordinator_name`, `org_by`, `cat`) VALUES
(1, '1', 'ghj', '1', '', '', '1', '1', '1', '1', '2020-12-24', '2020-12-24', '1', '1', '1'),
(2, '1', 'vocal', '1', '', '', 'Quiz', 'sdf', '2', 'sdfg', '2020-12-24', '2020-12-24', '1', 'sdftg', 'solo'),
(3, '1', 'vocal', '1', 'dfgh', 'zsdf', 'Quiz', 'sdf', '2', 'sdfg', '2020-12-24', '2020-12-24', '1', 'sdftg', 'solo'),
(4, '1', 'vocal', '1', 'dfgh', 'zsdf', 'Quiz', 'sdf', '2', 'sdfg', '2020-12-24', '2020-12-24', '1', 'sdftg', 'solo'),
(5, '1', 'vocal', '1', 'dfgh', 'zsdf', 'Quiz', 'sdrf', '1', 'sdrf', '2020-12-24', '2020-12-24', '1', 'asdf', 'solo'),
(6, '1', 'vocal', '1', 'dfgh', 'zsdf', 'Quiz', 'sdrf', '1', 'sdrf', '2020-12-24', '2020-12-24', '1', 'asdf', 'solo'),
(7, '1', 'vocal', '1', 'dfgh', 'zsdf', 'Quiz', 'Activity Form', '2', 'Activity Form', '2020-12-24', '2020-12-25', '1', 'Activity Form', 'solo'),
(8, '1', 'vocal', '1', 'dfgh', 'zsdf', 'Quiz', 'Activity Form', '2', 'Activity Form', '2020-12-24', '2020-12-25', '1', 'Activity Form', 'solo'),
(9, '1', 'vocal', '1', 'dfgh', 'dfh', 'Quiz', 'Activity Form', '2', 'Activity Form', '2020-12-24', '2020-12-25', '1', 'Activity Form', 'solo'),
(10, '1', 'vocal', '1', 'activity_form.php', 'activity_form.php', 'Quiz', 'Activity Form', '2', 'Activity Form', '2020-12-24', '2020-12-25', '1', 'Activity Form', 'solo'),
(11, '1', 'vocal', '1', 'dfgh', 'zsdf', 'Quiz', 'test', '2', 'ser', '2020-12-24', '2020-12-24', '1', 'Activity Form', 'solo'),
(12, '1', 'vocal', '1', 'dfgh', 'zsdf', 'Quiz', 'test', '2', 'ser', '2020-12-24', '2020-12-24', '1', 'Activity Form', 'solo'),
(13, '1', 'vocal', '1', 'dfgh', 'dfh', 'Quiz', 'test', '2', 'ser', '2020-12-24', '2020-12-24', '1', 'Activity Form', 'solo'),
(14, '1', 'vocal', '1', 'activity_form.php', 'activity_form.php', 'Quiz', 'test', '2', 'ser', '2020-12-24', '2020-12-24', '1', 'Activity Form', 'solo'),
(15, '1', 'vocal', '1', 'dfgh', 'dfh', 'Quiz', 'test', '2', 'ser', '2020-12-24', '2020-12-24', '1', 'Activity Form', 'solo');

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `role` varchar(100) NOT NULL,
  `status` enum('Y','N') NOT NULL DEFAULT 'N',
  `create_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `email`, `password`, `role`, `status`, `create_date`) VALUES
(1, 'coordinator@gmail.com', '1234', 'coordinator', 'N', '2020-12-22 00:00:00'),
(2, 'director@gmail.com', '1234', 'director', 'N', '2020-12-22 00:00:00'),
(3, 'admin@gmial.com', 'admin', 'admin', 'N', '2020-12-24 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `coordinators`
--

CREATE TABLE `coordinators` (
  `id` int(11) NOT NULL,
  `coordinator_reg_no` varchar(200) NOT NULL,
  `name` varchar(200) NOT NULL,
  `designation` text,
  `delete_status` enum('Y','N') NOT NULL DEFAULT 'N',
  `create_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `coordinators`
--

INSERT INTO `coordinators` (`id`, `coordinator_reg_no`, `name`, `designation`, `delete_status`, `create_date`) VALUES
(2, '2', 'coor_2222sssssssccc', 'sd', 'Y', '2020-12-24 00:00:00'),
(3, '3', 'coor_3', NULL, 'Y', '2020-12-24 00:00:00'),
(5, '1', '1', '1', 'Y', '2020-12-24 00:00:00'),
(6, ' asf', ' sdf', ' zdf', 'Y', '2020-12-24 00:00:00'),
(7, ' 2', ' coor_2', ' sdf', 'Y', '2020-12-25 00:00:00'),
(8, ' 2', ' coor_2', ' sadfasdf', 'Y', '2020-12-25 00:00:00'),
(9, ' 2', ' coor_2', ' sadfasdf', 'Y', '2020-12-25 00:00:00'),
(10, ' 2', ' coor_2', ' zdf', 'Y', '2020-12-25 00:00:00'),
(11, '11', 'coor_11', '1', 'Y', '2020-12-09 00:00:00'),
(12, ' 2', ' coor_2', ' zsd', 'Y', '2020-12-25 00:00:00'),
(13, ' 2', ' coor_2', ' zsdzsd', 'Y', '2020-12-25 00:00:00'),
(14, ' 2', ' coor_2', ' Sd', 'Y', '2020-12-25 00:00:00'),
(15, ' 2', ' coor_2', ' ', 'Y', '2020-12-25 00:00:00'),
(16, ' 2', ' coor_2', ' test', 'Y', '2020-12-25 00:00:00'),
(17, ' 2', ' test', ' test', 'Y', '2020-12-25 00:00:00'),
(18, ' 2', ' coor_2', ' asdf', 'Y', '2020-12-25 00:00:00'),
(19, ' 2', ' coor_2', ' zxf', 'Y', '2020-12-25 00:00:00'),
(20, ' 2', ' coor_2', ' zdf', 'Y', '2020-12-25 00:00:00'),
(21, ' dddddddddddd', ' ddddddddddddd', ' dddddddddddd', 'Y', '2020-12-25 00:00:00'),
(22, ' asf', ' sdf', ' zdf', 'N', '2020-12-25 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `event_id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `description` text NOT NULL,
  `type` varchar(100) NOT NULL,
  `status` enum('Y','N') NOT NULL DEFAULT 'N',
  `create_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`event_id`, `name`, `description`, `type`, `status`, `create_date`) VALUES
(1, 'vocal1', 'vocal1weew', 'solo1', 'Y', '2020-12-23 00:00:00'),
(2, 'Dance', 'zsf', 'group', 'Y', '2020-12-23 00:00:00'),
(3, 'Instrumantal', '', 'solo', 'Y', '2020-12-23 00:00:00'),
(4, 'Theater Event', '', 'group', 'Y', '2020-12-23 00:00:00'),
(5, 'Litral Event', '', 'solo', 'Y', '2020-12-23 00:00:00'),
(6, 'Drawing', '', 'group', 'Y', '2020-12-23 00:00:00'),
(7, 'dfg', 'demo', ' ', 'Y', '2020-12-25 00:00:00'),
(8, '', 'name', ' ', 'Y', '2020-12-25 00:00:00'),
(9, '', 'name', ' ', 'Y', '2020-12-25 00:00:00'),
(10, 'evname', 'evname', ' ', 'Y', '2020-12-25 00:00:00'),
(11, 'echo $query;exit;', 'echo $query;exit;', ' ', 'N', '2020-12-25 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `event_entry`
--

CREATE TABLE `event_entry` (
  `id` int(11) NOT NULL,
  `event_name` varchar(200) NOT NULL,
  `event_id` varchar(10) DEFAULT NULL,
  `sub_event_name` varchar(200) NOT NULL,
  `sub_event_id` varchar(10) DEFAULT NULL,
  `type` varchar(100) NOT NULL,
  `status` enum('Y','N') NOT NULL DEFAULT 'N',
  `create_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `event_entry`
--

INSERT INTO `event_entry` (`id`, `event_name`, `event_id`, `sub_event_name`, `sub_event_id`, `type`, `status`, `create_date`) VALUES
(1, 'demo', '1', 'demo', '1', 'demo', 'N', '2020-12-02 00:00:00'),
(2, 'vocal', '1', 'Quiz ', '1', ' solo', 'N', '2023-12-20 00:00:00'),
(3, 'Dance', '2', 'Debate ', '2', ' group', 'N', '2023-12-20 00:00:00'),
(4, 'Dance', '2', 'Debate ', '2', ' group', 'N', '2023-12-20 00:00:00'),
(5, 'vocal', '1', 'Quiz ', '1', ' solo', 'N', '2023-12-20 00:00:00'),
(6, 'vocal', '1', 'Quiz ', '1', ' solo', 'N', '2023-12-20 00:00:00'),
(7, 'vocal', '1', 'Quiz ', '1', ' solo', 'N', '2024-12-20 00:00:00'),
(8, 'Dance', '2', 'Debate ', '2', ' group', 'N', '2024-12-20 00:00:00'),
(9, 'vocal', '1', 'Quiz ', '1', ' solo', 'N', '2024-12-20 00:00:00'),
(10, 'vocal', '1', 'Quiz ', '1', ' solo', 'N', '2024-12-20 00:00:00'),
(11, 'vocal', '1', 'Quiz ', '1', ' solo', 'N', '2024-12-20 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `event_level`
--

CREATE TABLE `event_level` (
  `id` int(11) NOT NULL,
  `level` varchar(200) NOT NULL,
  `delete_status` enum('Y','N') NOT NULL DEFAULT 'N',
  `create_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `event_level`
--

INSERT INTO `event_level` (`id`, `level`, `delete_status`, `create_date`) VALUES
(1, 'local', 'N', '2020-12-24 00:00:00'),
(2, 'inter', 'N', '2020-12-24 00:00:00'),
(3, 'Intra', 'N', '2020-12-24 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `post_activity`
--

CREATE TABLE `post_activity` (
  `id` int(11) NOT NULL,
  `event_name` varchar(100) NOT NULL,
  `event_id` varchar(10) DEFAULT NULL,
  `sub_event_name` varchar(100) NOT NULL,
  `sub_event_id` varchar(10) DEFAULT NULL,
  `from_date` date NOT NULL,
  `to_date` date NOT NULL,
  `org_by` varchar(100) NOT NULL,
  `level` varchar(100) NOT NULL,
  `over_all` varchar(100) NOT NULL,
  `photo` text NOT NULL,
  `reg_no` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `course` varchar(100) NOT NULL,
  `year` varchar(100) NOT NULL,
  `coordinator_name` varchar(100) NOT NULL,
  `created_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `post_activity`
--

INSERT INTO `post_activity` (`id`, `event_name`, `event_id`, `sub_event_name`, `sub_event_id`, `from_date`, `to_date`, `org_by`, `level`, `over_all`, `photo`, `reg_no`, `name`, `course`, `year`, `coordinator_name`, `created_date`) VALUES
(1, '1', '1', '1', '1', '2020-12-24', '2020-12-09', '1', '1', '1', '1', '1', '1', '11', '11', '11', '2020-12-24'),
(2, 'vocal', '1', 'Quiz', '1', '2020-12-24', '2020-12-24', 'Activity Form ', '2', 'runner', 'photo', 'dfg', 'dfg', 'pg', '2', '1', '2020-12-24'),
(3, 'vocal', '1', 'Quiz', '1', '2020-12-24', '2020-12-24', 'Activity Form ', '2', 'runner', 'photo', 'dfg', 'dfg', 'pg', '2', '1', '2020-12-24'),
(4, 'vocal', '1', 'Quiz', '1', '2020-12-24', '2020-12-24', 'Activity Form ', 'local', 'winner', 'photo', 'dfg', 'dfg', 'ug', '2', 'coor_1', '2020-12-24'),
(5, 'vocal', '1', 'Quiz', '1', '2020-12-24', '2020-12-24', 'Activity Form ', 'local', 'winner', 'photo', 'dfg', 'dfg', 'ug', '2', 'coor_1', '2020-12-24'),
(6, 'vocal', '1', 'Quiz', '1', '2020-12-24', '2020-12-24', 'Activity Form ', 'local', 'winner', 'photo', 'dfg', 'dfg', 'ug', '2', 'coor_1', '2020-12-24'),
(7, 'vocal', '1', 'Quiz', '1', '2020-12-24', '2020-12-24', 'Activity Form ', 'local', 'winner', 'photo', 'dfg', 'dfg', 'ug', '2', 'coor_1', '2020-12-24'),
(8, 'vocal', '1', 'Quiz', '1', '2020-12-24', '2020-12-24', 'Activity Form ', 'local', 'winner', 'photo', 'dfg', 'dfg', 'ug', '2', 'coor_1', '2020-12-24'),
(9, 'vocal', '1', 'Quiz', '1', '2020-12-24', '2020-12-24', 'Activity Form ', 'local', 'winner', 'photo', 'dfg', 'dfg', 'ug', '2', 'coor_1', '2020-12-24'),
(10, 'vocal', '1', 'Quiz', '1', '2020-12-24', '2020-12-24', 'Activity Form ', 'local', 'winner', 'photo', 'dfg', 'dfg', 'ug', '2', 'coor_1', '2020-12-24'),
(11, 'vocal', '1', 'Quiz', '1', '2020-12-24', '2020-12-24', 'Activity Form ', 'local', 'winner', 'photo', 'dfg', 'dfg', 'ug', '2', 'coor_1', '2020-12-24'),
(12, 'vocal', '1', 'Quiz', '1', '2020-12-24', '2020-12-24', 'Activity Form ', 'local', 'winner', 'photo', 'dfg', 'dfg', 'ug', '2', 'coor_1', '2020-12-24'),
(13, 'vocal', '1', 'Quiz', '1', '2020-12-24', '2020-12-24', 'Activity Form ', 'inter', 'winner', 'photo', 'dfg', 'dfg', 'ug', '1', 'coor_1', '2020-12-24'),
(14, 'Dance', '2', '', ' ', '2020-12-24', '2020-12-24', 'Activity Form ', 'inter', 'runner', 'photo', 'dfg', 'dfg', 'ug', '1', 'coor_1', '2020-12-24'),
(15, 'Dance', '2', '', '', '2020-12-24', '2020-12-24', 'Activity Form ', 'inter', 'runner', 'photo', 'dfg', 'dfg', 'ug', '1', 'coor_1', '2020-12-24');

-- --------------------------------------------------------

--
-- Table structure for table `selection_form`
--

CREATE TABLE `selection_form` (
  `id` int(11) NOT NULL,
  `event_id` varchar(10) DEFAULT NULL,
  `sub_event_id` varchar(10) DEFAULT NULL,
  `event_name` varchar(200) NOT NULL,
  `sub_event_name` varchar(200) NOT NULL,
  `register_no` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `course` varchar(50) NOT NULL,
  `year` varchar(50) NOT NULL,
  `event_date` date DEFAULT NULL,
  `create_date` datetime NOT NULL,
  `delete_status` enum('Y','N') NOT NULL DEFAULT 'N'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `selection_form`
--

INSERT INTO `selection_form` (`id`, `event_id`, `sub_event_id`, `event_name`, `sub_event_name`, `register_no`, `name`, `course`, `year`, `event_date`, `create_date`, `delete_status`) VALUES
(1, '0', '0', '', '', 'fgh', 'sdfh', 'ds', 'fgh', NULL, '2020-12-23 00:00:00', 'N'),
(2, '0', '0', '', '', 'fgh', 'fgh', 'dfgh', 'fdgh', NULL, '2020-12-23 00:00:00', 'N'),
(3, '0', '0', '', '', 'asd', 'asd', 'ug', '1', NULL, '2020-12-23 00:00:00', 'N'),
(4, '0', '0', '', '', '18mx258', 'pradeep', 'pg', '3', NULL, '2020-12-23 00:00:00', 'N'),
(5, '0', '0', '', '', '18mx254', 'Janani', 'pg', '3', NULL, '2020-12-23 00:00:00', 'N'),
(6, '1', '1', 'vocal', 'Quiz', '18', 'jan', 'ug', '1', NULL, '2020-12-23 00:00:00', 'N'),
(7, '1', '1', 'vocal', 'Quiz', '14', 'pra', 'ug', '1', NULL, '2020-12-23 00:00:00', 'N'),
(8, '1', '1', 'vocal', 'Quiz', '18', 'jan', 'ug', '1', NULL, '2020-12-23 00:00:00', 'N'),
(9, '1', '1', 'vocal', 'Quiz', '14', 'pra', 'ug', '1', NULL, '2020-12-23 00:00:00', 'N'),
(10, '1', '1', 'vocal', 'Quiz', 'dfh', 'dfgh', 'ug', '1', NULL, '2020-12-24 00:00:00', 'N'),
(11, '1', '1', 'vocal', 'Quiz', 'zsdf', 'dfgh', 'ug', '1', '2020-12-24', '2020-12-24 00:00:00', 'N'),
(12, '1', '1', 'vocal', 'Quiz', 'zsdf', 'dfgh', 'ug', '1', '2020-12-24', '2020-12-24 00:00:00', 'N'),
(13, '2', '2', 'Dance', 'Debate', 'demo', 'demo', 'ug', '2', '2020-12-24', '2020-12-24 00:00:00', 'N'),
(14, '2', '2', 'Dance', 'Debate', 'demo', 'demo', 'ug', '1', '2020-12-24', '2020-12-24 00:00:00', 'N'),
(15, '2', '2', 'Dance', 'Debate', 'demo', 'demo', 'ug', '2', '2020-12-24', '2020-12-24 00:00:00', 'N'),
(16, '2', '2', 'Dance', 'Debate', 'demo', 'demo', 'ug', '1', '2020-12-24', '2020-12-24 00:00:00', 'N'),
(17, '1', '1', 'vocal', 'Quiz', 'dfh', 'dfgh', 'ug', '2', '2020-12-24', '2020-12-24 00:00:00', 'N'),
(18, '1', '1', 'vocal', 'Quiz', 'activity_form.php', 'activity_form.php', 'ug', '2', '2020-12-24', '2020-12-24 00:00:00', 'N'),
(19, '1', '1', 'vocal', 'Quiz', 'dfh', 'dfgh', 'ug', '1', '2020-12-24', '2020-12-24 00:00:00', 'N');

-- --------------------------------------------------------

--
-- Table structure for table `sub_events`
--

CREATE TABLE `sub_events` (
  `id` int(11) NOT NULL,
  `event_id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `description` text NOT NULL,
  `type` varchar(100) NOT NULL,
  `status` enum('Y','N') NOT NULL DEFAULT 'N',
  `create_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sub_events`
--

INSERT INTO `sub_events` (`id`, `event_id`, `name`, `description`, `type`, `status`, `create_date`) VALUES
(1, 1, 'Quiz', '', 'solo', 'N', '2020-12-23 00:00:00'),
(2, 2, 'Debate', '', 'group', 'N', '2020-12-23 00:00:00'),
(3, 6, 'Rangoli', '', 'solo', 'N', '2020-12-23 00:00:00'),
(4, 4, 'Mimicry', '', 'solo', 'N', '2020-12-23 00:00:00'),
(5, 5, 'Mime', '', 'solo', 'N', '2020-12-23 00:00:00'),
(6, 3, 'Mono Acting', '', 'solo', 'N', '2020-12-23 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activity_form`
--
ALTER TABLE `activity_form`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coordinators`
--
ALTER TABLE `coordinators`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`event_id`);

--
-- Indexes for table `event_entry`
--
ALTER TABLE `event_entry`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `event_level`
--
ALTER TABLE `event_level`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `post_activity`
--
ALTER TABLE `post_activity`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `selection_form`
--
ALTER TABLE `selection_form`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sub_events`
--
ALTER TABLE `sub_events`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activity_form`
--
ALTER TABLE `activity_form`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `coordinators`
--
ALTER TABLE `coordinators`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `event_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `event_entry`
--
ALTER TABLE `event_entry`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `event_level`
--
ALTER TABLE `event_level`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `post_activity`
--
ALTER TABLE `post_activity`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `selection_form`
--
ALTER TABLE `selection_form`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `sub_events`
--
ALTER TABLE `sub_events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
