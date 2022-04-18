-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 30, 2020 at 07:38 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project_planner`
--

-- --------------------------------------------------------

--
-- Table structure for table `entries`
--

CREATE TABLE `entries` (
  `pid` int(11) NOT NULL,
  `mid` int(11) NOT NULL,
  `insertentry` varchar(2000) NOT NULL,
  `checked` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `entries`
--

INSERT INTO `entries` (`pid`, `mid`, `insertentry`, `checked`) VALUES
(7, 2, 'Add demo', 1),
(7, 5, 'dance', 1),
(8, 5, 'tada', 1),
(8, 6, 'talk', 1),
(8, 6, 'walk', 1),
(17, 3, 'draw', 0);

-- --------------------------------------------------------

--
-- Table structure for table `entry`
--

CREATE TABLE `entry` (
  `pid` int(30) NOT NULL,
  `content` varchar(9000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `entry`
--

INSERT INTO `entry` (`pid`, `content`) VALUES
(7, '<table border=\"1\" cellpadding=\"1\" cellspacing=\"1\" style=\"width:500px\">\r\n	<tbody>\r\n		<tr>\r\n			<td>ooooo</td>\r\n			<td>lllll</td>\r\n		</tr>\r\n		<tr>\r\n			<td>fyjffj</td>\r\n			<td>oof</td>\r\n		</tr>\r\n		<tr>\r\n			<td>accha</td>\r\n			<td>thikkay</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<h1>Project Planner dfdhdfh</h1>\r\n\r\n<blockquote>\r\n<p>Hi hello ssuppp .........How is life what is thiS bheaviour!]</p>\r\n</blockquote>\r\n\r\n<p><strong>Not accepted</strong></p>\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `member_table`
--

CREATE TABLE `member_table` (
  `pid` int(11) NOT NULL,
  `member` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `member_table`
--

INSERT INTO `member_table` (`pid`, `member`) VALUES
(7, 'neha'),
(7, 'nikis'),
(8, 'nikis'),
(8, 'neha'),
(7, 'suzy'),
(7, 'ams'),
(8, 'ams'),
(8, 'nikam'),
(0, 'neha'),
(17, 'neha'),
(7, 'nikam');

-- --------------------------------------------------------

--
-- Table structure for table `member_task`
--

CREATE TABLE `member_task` (
  `pid` int(11) NOT NULL,
  `mid` int(11) NOT NULL,
  `mtask` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `member_task`
--

INSERT INTO `member_task` (`pid`, `mid`, `mtask`) VALUES
(7, 2, 'zooooooooooommmmmmmmmmmmm'),
(8, 2, 'talk');

-- --------------------------------------------------------

--
-- Table structure for table `project_table`
--

CREATE TABLE `project_table` (
  `id` int(11) NOT NULL,
  `pname` varchar(100) NOT NULL,
  `ppass` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `project_table`
--

INSERT INTO `project_table` (`id`, `pname`, `ppass`) VALUES
(1, 'Website', '654321'),
(2, 'nikisss', 'nikis'),
(3, 'website-2', '1457896'),
(4, 'android', '142536'),
(5, 'blockchain', '17894561'),
(6, 'tada', 'tada'),
(7, 'pp', 'pp'),
(8, 'p2p', 'p2p'),
(9, 'zoom', 'zoom'),
(10, 'sorry', 'sorry'),
(11, 'zing', 'zing'),
(12, 'zap', 'zap'),
(13, 'zip', 'zip'),
(14, 'zup', 'zup'),
(15, 'nik', 'nik'),
(16, 'tip', 'tip'),
(17, 'top', 'top');

-- --------------------------------------------------------

--
-- Table structure for table `todolist`
--

CREATE TABLE `todolist` (
  `pid` int(11) NOT NULL,
  `mid` int(11) NOT NULL,
  `list` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `user_table`
--

CREATE TABLE `user_table` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `uname` varchar(50) NOT NULL,
  `upass` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_table`
--

INSERT INTO `user_table` (`id`, `name`, `uname`, `upass`) VALUES
(1, 'niks', 'niks', 'niks'),
(2, 'nikis', 'nikis', 'nikis'),
(3, 'neha', 'neha', 'neha'),
(4, 'suzy', 'suzy', 'suzy'),
(5, 'ams', 'ams', 'ams'),
(6, 'nikam', 'nikam', 'nikam');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `entry`
--
ALTER TABLE `entry`
  ADD PRIMARY KEY (`pid`);

--
-- Indexes for table `member_task`
--
ALTER TABLE `member_task`
  ADD PRIMARY KEY (`pid`),
  ADD KEY `mid` (`mid`);

--
-- Indexes for table `project_table`
--
ALTER TABLE `project_table`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `todolist`
--
ALTER TABLE `todolist`
  ADD PRIMARY KEY (`pid`),
  ADD KEY `mid` (`mid`);

--
-- Indexes for table `user_table`
--
ALTER TABLE `user_table`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `project_table`
--
ALTER TABLE `project_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `user_table`
--
ALTER TABLE `user_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `member_task`
--
ALTER TABLE `member_task`
  ADD CONSTRAINT `member_task_ibfk_1` FOREIGN KEY (`pid`) REFERENCES `project_table` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `member_task_ibfk_2` FOREIGN KEY (`mid`) REFERENCES `user_table` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `todolist`
--
ALTER TABLE `todolist`
  ADD CONSTRAINT `todolist_ibfk_1` FOREIGN KEY (`pid`) REFERENCES `project_table` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `todolist_ibfk_2` FOREIGN KEY (`mid`) REFERENCES `user_table` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
