-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 04, 2023 at 06:12 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.3.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `espot_rov`
--

-- --------------------------------------------------------

--
-- Table structure for table `frm_team`
--

CREATE TABLE `frm_team` (
  `id` int(11) NOT NULL,
  `team_id` int(11) NOT NULL,
  `match_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `frm_team`
--

INSERT INTO `frm_team` (`id`, `team_id`, `match_id`) VALUES
(7, 9, 10),
(8, 10, 10),
(9, 9, 11),
(10, 10, 11),
(11, 9, 12),
(12, 10, 12),
(13, 9, 13),
(14, 9, 13),
(15, 9, 15),
(16, 9, 15);

-- --------------------------------------------------------

--
-- Table structure for table `heros`
--

CREATE TABLE `heros` (
  `hero_id` int(11) NOT NULL,
  `hero_name` varchar(255) NOT NULL,
  `img_hero` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `heros`
--

INSERT INTO `heros` (`hero_id`, `hero_name`, `img_hero`) VALUES
(3, 'van', '2023020405532335460497.png'),
(4, 'Yorn1', '2023020405552935529820.jpg'),
(5, 'aa', '2023020415115620205864.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `lanes`
--

CREATE TABLE `lanes` (
  `lane_id` int(11) NOT NULL,
  `name_lane` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `lanes`
--

INSERT INTO `lanes` (`lane_id`, `name_lane`) VALUES
(3, 'Dark'),
(4, 'MID');

-- --------------------------------------------------------

--
-- Table structure for table `matchs`
--

CREATE TABLE `matchs` (
  `match_id` int(11) NOT NULL,
  `team_A` int(11) NOT NULL,
  `team_B` int(11) NOT NULL,
  `date` date NOT NULL,
  `tour_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `matchs`
--

INSERT INTO `matchs` (`match_id`, `team_A`, `team_B`, `date`, `tour_id`) VALUES
(10, 9, 10, '2023-02-04', 8),
(11, 9, 10, '2023-02-04', 8),
(12, 9, 10, '2023-02-04', 9),
(13, 9, 9, '2023-02-10', 8),
(14, 9, 9, '2023-02-04', 8),
(15, 9, 9, '2023-02-04', 8);

-- --------------------------------------------------------

--
-- Table structure for table `match_details`
--

CREATE TABLE `match_details` (
  `m_detail_id` int(11) NOT NULL,
  `match_name` varchar(255) NOT NULL,
  `match_id` int(11) NOT NULL,
  `time` varchar(10) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `match_details`
--

INSERT INTO `match_details` (`m_detail_id`, `match_name`, `match_id`, `time`, `status`) VALUES
(23, 'ROUND 1', 10, '', '9'),
(24, '', 11, '', '9'),
(25, 'ROUND 1-1', 12, '', ''),
(26, '', 0, '', ''),
(27, 'tt', 0, 'tt', ''),
(28, 'ROUND 1', 0, '', ''),
(29, 'bbb', 0, '', ''),
(30, '0', 13, '', ''),
(31, '', 13, '', ''),
(32, '', 13, '', '');

-- --------------------------------------------------------

--
-- Table structure for table `match_player_details`
--

CREATE TABLE `match_player_details` (
  `p_detail_id` int(11) NOT NULL,
  `hero_id` int(11) NOT NULL,
  `player_id` int(11) NOT NULL,
  `kills` int(11) NOT NULL,
  `assist` int(11) NOT NULL,
  `death` int(11) NOT NULL,
  `gold` double(8,2) NOT NULL,
  `mvp` double(8,2) NOT NULL,
  `atk` double(8,2) NOT NULL,
  `def` double(8,2) NOT NULL,
  `team_fight` double(8,2) NOT NULL,
  `m_detail_id` int(11) NOT NULL,
  `lane_id` int(11) NOT NULL,
  `team_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `match_player_details`
--

INSERT INTO `match_player_details` (`p_detail_id`, `hero_id`, `player_id`, `kills`, `assist`, `death`, `gold`, `mvp`, `atk`, `def`, `team_fight`, `m_detail_id`, `lane_id`, `team_id`) VALUES
(8, 3, 4, 1, 1, 1, 1.00, 1.00, 1.00, 1.00, 1.00, 21, 3, 9),
(9, 4, 5, 1, 1, 1, 1.00, 1.00, 1.00, 1.00, 1.00, 21, 3, 9),
(10, 3, 4, 2, 5, 12, 2.00, 2.00, 2.00, 2.00, 2.00, 25, 0, 9),
(11, 4, 6, 6, 5, 4, 2.00, 4.00, 8.00, 5.00, 2.00, 25, 3, 10);

-- --------------------------------------------------------

--
-- Table structure for table `players`
--

CREATE TABLE `players` (
  `player_id` int(11) NOT NULL,
  `ingame_name` varchar(255) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `nick_name` varchar(255) NOT NULL,
  `img_player` varchar(255) NOT NULL,
  `team_id` int(11) NOT NULL,
  `tell` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `players`
--

INSERT INTO `players` (`player_id`, `ingame_name`, `fname`, `lname`, `nick_name`, `img_player`, `team_id`, `tell`) VALUES
(4, 'play1•', 'play1', 'play1', 'play1', '2023020407441064467336.jpg', 9, 'dplay1'),
(5, 'play2', 'play2', 'play2', 'play2', '2023020410360365279114.png', 9, 'play2'),
(6, 'playB1', 'playB1', 'playB1', 'playB1', '2023020410361630892750.jpg', 10, 'playB1'),
(7, 'playB2', 'playB2', 'playB2', 'playB2', '2023020410362833158839.jpg', 10, 'playB2');

-- --------------------------------------------------------

--
-- Table structure for table `positions`
--

CREATE TABLE `positions` (
  `position_id` int(11) NOT NULL,
  `position_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `schools`
--

CREATE TABLE `schools` (
  `school_id` int(11) NOT NULL,
  `school_name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `img_school` varchar(255) NOT NULL,
  `tell` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `schools`
--

INSERT INTO `schools` (`school_id`, `school_name`, `address`, `img_school`, `tell`) VALUES
(4, 'SCHOOL2', 'SCHOOL2', '2023020410345923643227.jpg', 'SCHOOL2'),
(5, 'SCHOOL3', 'SCHOOL3', '2023020410350749957614.png', 'SCHOOL3');

-- --------------------------------------------------------

--
-- Table structure for table `summary`
--

CREATE TABLE `summary` (
  `id` int(11) NOT NULL,
  `team_win` int(11) NOT NULL,
  `m_detail_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `summary`
--

INSERT INTO `summary` (`id`, `team_win`, `m_detail_id`) VALUES
(8, 10, 17),
(10, 10, 18),
(11, 9, 19),
(13, 10, 20),
(16, 10, 22),
(19, 10, 21),
(20, 9, 23),
(21, 9, 24);

-- --------------------------------------------------------

--
-- Table structure for table `teams`
--

CREATE TABLE `teams` (
  `team_id` int(11) NOT NULL,
  `team_name` varchar(255) NOT NULL,
  `school_id` int(11) NOT NULL,
  `img_team` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `teams`
--

INSERT INTO `teams` (`team_id`, `team_name`, `school_id`, `img_team`, `user_id`) VALUES
(9, 'THAI1', 4, '2023020406422467094011.png', 1),
(10, 'THAI12', 5, '2023020410353127877352.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tournaments`
--

CREATE TABLE `tournaments` (
  `tour_id` int(11) NOT NULL,
  `tour_name` varchar(255) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tournaments`
--

INSERT INTO `tournaments` (`tour_id`, `tour_name`, `start_date`, `end_date`) VALUES
(8, 'PRO', '2023-02-04', '2023-02-04'),
(9, '111', '2023-02-04', '2023-02-04');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `tell` varchar(255) NOT NULL,
  `position_id` int(11) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `password`, `fname`, `lname`, `tell`, `position_id`, `status`) VALUES
(1, 'admin', 'MQ==', 'ผู้ดูแลระบบ12', 'ROV1', '11', 0, '1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `frm_team`
--
ALTER TABLE `frm_team`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `heros`
--
ALTER TABLE `heros`
  ADD PRIMARY KEY (`hero_id`);

--
-- Indexes for table `lanes`
--
ALTER TABLE `lanes`
  ADD PRIMARY KEY (`lane_id`);

--
-- Indexes for table `matchs`
--
ALTER TABLE `matchs`
  ADD PRIMARY KEY (`match_id`);

--
-- Indexes for table `match_details`
--
ALTER TABLE `match_details`
  ADD PRIMARY KEY (`m_detail_id`);

--
-- Indexes for table `match_player_details`
--
ALTER TABLE `match_player_details`
  ADD PRIMARY KEY (`p_detail_id`);

--
-- Indexes for table `players`
--
ALTER TABLE `players`
  ADD PRIMARY KEY (`player_id`);

--
-- Indexes for table `positions`
--
ALTER TABLE `positions`
  ADD PRIMARY KEY (`position_id`);

--
-- Indexes for table `schools`
--
ALTER TABLE `schools`
  ADD PRIMARY KEY (`school_id`);

--
-- Indexes for table `summary`
--
ALTER TABLE `summary`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teams`
--
ALTER TABLE `teams`
  ADD PRIMARY KEY (`team_id`);

--
-- Indexes for table `tournaments`
--
ALTER TABLE `tournaments`
  ADD PRIMARY KEY (`tour_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `frm_team`
--
ALTER TABLE `frm_team`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `heros`
--
ALTER TABLE `heros`
  MODIFY `hero_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `lanes`
--
ALTER TABLE `lanes`
  MODIFY `lane_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `matchs`
--
ALTER TABLE `matchs`
  MODIFY `match_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `match_details`
--
ALTER TABLE `match_details`
  MODIFY `m_detail_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `match_player_details`
--
ALTER TABLE `match_player_details`
  MODIFY `p_detail_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `players`
--
ALTER TABLE `players`
  MODIFY `player_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `schools`
--
ALTER TABLE `schools`
  MODIFY `school_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `summary`
--
ALTER TABLE `summary`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `teams`
--
ALTER TABLE `teams`
  MODIFY `team_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tournaments`
--
ALTER TABLE `tournaments`
  MODIFY `tour_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
