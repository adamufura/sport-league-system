-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 27, 2023 at 12:15 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sport_league`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `avatar` varchar(255) NOT NULL DEFAULT 'assets/images/avatars/avatar.png',
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `email`, `avatar`, `password`) VALUES
(1, 'admin', 'admin@sport.com', 'assets/images/avatars/avatar.png', '$2y$10$.RxHd/s/3ijoEIwTM0oJGuvPuq65XsFlef/yDI.Ck6pyWrD25HYuW');

-- --------------------------------------------------------

--
-- Table structure for table `admin_recover`
--

CREATE TABLE `admin_recover` (
  `id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `hash` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `contact_us`
--

CREATE TABLE `contact_us` (
  `id` int(11) NOT NULL,
  `fullnname` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `message_title` varchar(100) NOT NULL,
  `messaget_content` text NOT NULL,
  `data_time` datetime NOT NULL,
  `is_seen` int(2) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `fixtures`
--

CREATE TABLE `fixtures` (
  `id` int(11) NOT NULL,
  `league_id` varchar(20) NOT NULL,
  `home_team` varchar(100) NOT NULL,
  `home_id` varchar(20) NOT NULL,
  `away_id` varchar(20) NOT NULL,
  `away_team` varchar(100) NOT NULL,
  `venue` varchar(100) NOT NULL,
  `match_datetime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `fixtures`
--

INSERT INTO `fixtures` (`id`, `league_id`, `home_team`, `home_id`, `away_id`, `away_team`, `venue`, `match_datetime`) VALUES
(1, 'H2Vj9y', 'Real Madrid', 'RMFC', 'FCB', 'Barcelona', 'Santiago', '2023-11-01 00:00:00'),
(2, 'H2Vj9y', 'Real Madrid', 'RMFC', 'MAN', 'Man City', 'Santiago', '2023-11-01 01:00:00'),
(3, 'H2Vj9y', 'Barcelona', 'FCB', 'RMFC', 'Real Madrid', 'Camp Nou', '2023-11-01 02:00:00'),
(4, 'H2Vj9y', 'Barcelona', 'FCB', 'MAN', 'Man City', 'Camp Nou', '2023-11-01 03:00:00'),
(5, 'H2Vj9y', 'Man City', 'MAN', 'RMFC', 'Real Madrid', 'Etihad', '2023-11-01 04:00:00'),
(6, 'H2Vj9y', 'Man City', 'MAN', 'FCB', 'Barcelona', 'Etihad', '2023-11-01 05:00:00'),
(7, 'K8bZAR', 'Real Madrid', 'RMFC', 'FCB', 'Barcelona', 'Santiago', '2023-11-01 00:00:00'),
(8, 'K8bZAR', 'Real Madrid', 'RMFC', 'MAN', 'Man City', 'Santiago', '2023-11-01 01:00:00'),
(9, 'K8bZAR', 'Barcelona', 'FCB', 'RMFC', 'Real Madrid', 'Camp Nou', '2023-11-01 02:00:00'),
(10, 'K8bZAR', 'Barcelona', 'FCB', 'MAN', 'Man City', 'Camp Nou', '2023-11-01 03:00:00'),
(11, 'K8bZAR', 'Man City', 'MAN', 'RMFC', 'Real Madrid', 'Etihad', '2023-11-01 04:00:00'),
(12, 'K8bZAR', 'Man City', 'MAN', 'FCB', 'Barcelona', 'Etihad', '2023-11-01 05:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `leagues`
--

CREATE TABLE `leagues` (
  `id` int(11) NOT NULL,
  `league_name` varchar(100) NOT NULL,
  `league_id` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `leagues`
--

INSERT INTO `leagues` (`id`, `league_name`, `league_id`) VALUES
(1, 'La Liga', '2OKXFO'),
(2, 'Ligue 1', 'U6UJGL'),
(3, 'PREMIER LEAGUE', 'u7SMQZ'),
(4, 'LA LIGA', 'j3y0mZ'),
(5, 'SERIE A', 'NfWMyb'),
(6, 'BUNDESLIGA', 'IKZnVu'),
(7, 'LIGUE 1', '1lovuq'),
(8, 'EREDIVISIE', 'FadqNS'),
(9, 'PRIMEIRA LIGA', 'hzjJrw'),
(10, 'MAJOR LEAGUE SOCCER', 'WTRoFe'),
(11, 'BRASILEIRãO', 'cpdzY1'),
(12, 'SCOTTISH PREMIERSHIP', 'N3lGLk'),
(13, 'ARGENTINE PRIMERA DIVISIóN', 'fS8Q3u'),
(14, 'BELGIAN PRO LEAGUE', 'K8bZAR'),
(15, 'CAMPEONATO BRASILEIRO SéRIE A', 'tfGClP'),
(16, 'CHAMPIONSHIP', 'A32Bgw'),
(17, 'COPA LIBERTADORES', 'UEC2WY'),
(18, 'LIGA MX', 'QdaGeO'),
(19, 'J1 LEAGUE', 'GP86L4'),
(20, 'SüPER LIG', 'pP5BW5'),
(21, 'RUSSIAN PREMIER LEAGUE', 'uxDuWg'),
(22, 'EFL LEAGUE ONE', 'h84eZp'),
(23, 'PREMIER LEAGUE', 'qM63it'),
(24, 'LA LIGA', '6dLrth'),
(25, 'SERIE A', 'Wk2Wy8'),
(26, 'BUNDESLIGA', 'u2tzmG'),
(27, 'LIGUE 1', '7mzHhL'),
(28, 'EREDIVISIE', 'SimROm'),
(29, 'PRIMEIRA LIGA', 'nIieb7'),
(30, 'MAJOR LEAGUE SOCCER', 'Pe9IVe'),
(31, 'BRASILEIRãO', 'vKwwpB'),
(32, 'SCOTTISH PREMIERSHIP', 'BhRnmF'),
(33, 'ARGENTINE PRIMERA DIVISIóN', '5iFsd9'),
(34, 'BELGIAN PRO LEAGUE', 'j64Lit'),
(35, 'CAMPEONATO BRASILEIRO SéRIE A', 'H2Vj9y'),
(36, 'CHAMPIONSHIP', 'aV5gwQ'),
(37, 'COPA LIBERTADORES', 'OB4U3O'),
(38, 'LIGA MX', 'GJxJZk'),
(39, 'J1 LEAGUE', 's087Bi'),
(40, 'SüPER LIG', 'n3m8XF'),
(41, 'RUSSIAN PREMIER LEAGUE', 'lf70Gu'),
(42, 'EFL LEAGUE ONE', '54wbNb');

-- --------------------------------------------------------

--
-- Table structure for table `players`
--

CREATE TABLE `players` (
  `id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `first_name` varchar(30) NOT NULL,
  `last_name` varchar(30) NOT NULL,
  `name_on_shirt` varchar(50) NOT NULL,
  `phone_number` varchar(20) NOT NULL,
  `position` varchar(30) NOT NULL,
  `address` text NOT NULL,
  `team` text NOT NULL,
  `avatar` varchar(255) NOT NULL DEFAULT 'assets/images/avatars/staff_avatar.png'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `players`
--

INSERT INTO `players` (`id`, `email`, `first_name`, `last_name`, `name_on_shirt`, `phone_number`, `position`, `address`, `team`, `avatar`) VALUES
(1, 'cristiano@gmail.com', 'Cristiano', 'Ronaldo', 'Cristiano', '08123456789', 'Forward', 'Portulal, sporting', 'RMFC', 'assets/images/avatars/cristiano@gmail.com.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `teams`
--

CREATE TABLE `teams` (
  `id` int(10) NOT NULL,
  `team_id` varchar(50) NOT NULL,
  `team_title` varchar(255) NOT NULL,
  `team_slogan` varchar(255) NOT NULL,
  `team_stadium` varchar(255) NOT NULL,
  `team_logo` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `teams`
--

INSERT INTO `teams` (`id`, `team_id`, `team_title`, `team_slogan`, `team_stadium`, `team_logo`) VALUES
(3, 'RMFC', 'Real Madrid', 'Hala Madrid', 'Santiago', 'assets/images/logos/RMFC.png'),
(4, 'FCB', 'Barcelona', 'Culers', 'Camp Nou', 'assets/images/logos/FCB.png'),
(5, 'MAN', 'Man City', 'Citizens', 'Etihad', 'assets/images/logos/MAN.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin_recover`
--
ALTER TABLE `admin_recover`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_us`
--
ALTER TABLE `contact_us`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fixtures`
--
ALTER TABLE `fixtures`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `leagues`
--
ALTER TABLE `leagues`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `players`
--
ALTER TABLE `players`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teams`
--
ALTER TABLE `teams`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `admin_recover`
--
ALTER TABLE `admin_recover`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `contact_us`
--
ALTER TABLE `contact_us`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `fixtures`
--
ALTER TABLE `fixtures`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `leagues`
--
ALTER TABLE `leagues`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `players`
--
ALTER TABLE `players`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `teams`
--
ALTER TABLE `teams`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
