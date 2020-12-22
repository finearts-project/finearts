-- phpMyAdmin SQL Dump
-- version 4.6.6deb5ubuntu0.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 23, 2020 at 03:54 AM
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
(2, 'director@gmail.com', '1234', 'director', 'N', '2020-12-22 00:00:00');

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
(1, 'vocal', '', 'solo', 'N', '2020-12-23 00:00:00'),
(2, 'Dance', '', 'group', 'N', '2020-12-23 00:00:00'),
(3, 'Instrumantal', '', 'solo', 'N', '2020-12-23 00:00:00'),
(4, 'Theater Event', '', 'group', 'N', '2020-12-23 00:00:00'),
(5, 'Litral Event', '', 'solo', 'N', '2020-12-23 00:00:00'),
(6, 'Drawing', '', 'group', 'N', '2020-12-23 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `event_entry`
--

CREATE TABLE `event_entry` (
  `id` int(11) NOT NULL,
  `event_name` varchar(200) NOT NULL,
  `event_id` int(11) NOT NULL,
  `sub_event_name` varchar(200) NOT NULL,
  `sub_event_id` int(11) NOT NULL,
  `type` varchar(100) NOT NULL,
  `status` enum('Y','N') NOT NULL DEFAULT 'N',
  `create_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `event_entry`
--

INSERT INTO `event_entry` (`id`, `event_name`, `event_id`, `sub_event_name`, `sub_event_id`, `type`, `status`, `create_date`) VALUES
(1, 'demo', 1, 'demo', 1, 'demo', 'N', '2020-12-02 00:00:00'),
(2, 'vocal', 1, 'Quiz ', 1, ' solo', 'N', '2023-12-20 00:00:00'),
(3, 'Dance', 2, 'Debate ', 2, ' group', 'N', '2023-12-20 00:00:00');

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
-- Indexes for table `admin`
--
ALTER TABLE `admin`
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
-- Indexes for table `sub_events`
--
ALTER TABLE `sub_events`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `event_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `event_entry`
--
ALTER TABLE `event_entry`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `sub_events`
--
ALTER TABLE `sub_events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
