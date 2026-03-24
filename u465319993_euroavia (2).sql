-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Mar 22, 2026 at 02:18 PM
-- Server version: 11.8.3-MariaDB-log
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `u465319993_euroavia`
--

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `id` int(11) NOT NULL,
  `stage` int(11) NOT NULL,
  `question_text` text NOT NULL,
  `opt_a` varchar(255) NOT NULL,
  `opt_b` varchar(255) NOT NULL,
  `opt_c` varchar(255) NOT NULL,
  `opt_d` varchar(255) NOT NULL,
  `correct_opt` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id`, `stage`, `question_text`, `opt_a`, `opt_b`, `opt_c`, `opt_d`, `correct_opt`) VALUES
(1, 1, 'Cat face 2+2?', '3', '4', '5', '6', 'b'),
(2, 1, 'Capitala Frantei?', 'Londra', 'Berlin', 'Paris', 'Madrid', 'c'),
(3, 1, 'Care e limbajul pentru baze de date?', 'HTML', 'CSS', 'SQL', 'PHP', 'c'),
(4, 1, 'Cate etape are quiz-ul?', '2', '3', '4', '5', 'c');

-- --------------------------------------------------------

--
-- Table structure for table `schedule`
--

CREATE TABLE `schedule` (
  `stage` int(11) NOT NULL,
  `start_time` datetime NOT NULL,
  `end_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `schedule`
--

INSERT INTO `schedule` (`stage`, `start_time`, `end_time`) VALUES
(1, '2026-03-20 20:45:00', '2026-03-20 23:12:00'),
(2, '2026-03-22 10:00:00', '2026-03-22 20:00:00'),
(3, '2026-03-23 10:00:00', '2026-03-23 20:00:00'),
(4, '2026-03-24 10:00:00', '2026-03-24 20:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `teams`
--

CREATE TABLE `teams` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `current_stage` int(11) DEFAULT 1,
  `time_stage_1` int(11) DEFAULT 0,
  `time_stage_2` int(11) DEFAULT 0,
  `time_stage_3` int(11) DEFAULT 0,
  `time_stage_4` int(11) DEFAULT 0,
  `score_stage_1` float DEFAULT 0,
  `score_stage_2` float DEFAULT 0,
  `score_stage_3` float DEFAULT 0,
  `score_stage_4` float DEFAULT 0,
  `total_score` float DEFAULT 0,
  `cea_mai_frumoasa` int(11) DEFAULT 0,
  `c_motor` int(11) DEFAULT 0,
  `c_asamblare` int(11) DEFAULT 0,
  `c_fire_esc` int(11) DEFAULT 0,
  `c_fir_fir` int(11) DEFAULT 0,
  `c_fire_bat` int(11) DEFAULT 0,
  `c_rotatie` int(11) DEFAULT 0,
  `cm_motor` int(11) DEFAULT 0,
  `cm_esc` int(11) DEFAULT 0,
  `cm_fc` int(11) DEFAULT 0,
  `cm_brat` int(11) DEFAULT 0,
  `cm_platforma` int(11) DEFAULT 0,
  `cm_picior` int(11) DEFAULT 0,
  `cm_capac` int(11) DEFAULT 0,
  `cm_elice` int(11) DEFAULT 0,
  `cm_frame` int(11) DEFAULT 0,
  `cm_scurt` int(11) DEFAULT 0,
  `cm_surub` int(11) DEFAULT 0,
  `cm_piulita` int(11) DEFAULT 0,
  `cm_cauciuc` int(11) DEFAULT 0,
  `cm_unelte` int(11) DEFAULT 0,
  `b_calibrare` int(11) DEFAULT 0,
  `b_axa` int(11) DEFAULT 0,
  `b_port` int(11) DEFAULT 0,
  `b_arming` int(11) DEFAULT 0,
  `b_airmode` int(11) DEFAULT 0,
  `b_voltage` int(11) DEFAULT 0,
  `b_failsafe` int(11) DEFAULT 0,
  `b_protocol` int(11) DEFAULT 0,
  `b_pid` int(11) DEFAULT 0,
  `b_modes` int(11) DEFAULT 0,
  `b_rx` int(11) DEFAULT 0,
  `b_fara_greseala` int(11) DEFAULT 0,
  `bm_flash` int(11) DEFAULT 0,
  `z_obstacol_peste` int(11) DEFAULT 0,
  `z_obstacol_sub` int(11) DEFAULT 0,
  `z_slalom` int(11) DEFAULT 0,
  `z_cerc_trecut` int(11) DEFAULT 0,
  `z_cerc_aterizare` int(11) DEFAULT 0,
  `zm_pamant` int(11) DEFAULT 0,
  `zm_obstacol` int(11) DEFAULT 0,
  `scor_total_drona` float DEFAULT 0,
  `prezentare` int(11) NOT NULL DEFAULT 0,
  `zm_prabusire` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `teams`
--

INSERT INTO `teams` (`id`, `name`, `password`, `current_stage`, `time_stage_1`, `time_stage_2`, `time_stage_3`, `time_stage_4`, `score_stage_1`, `score_stage_2`, `score_stage_3`, `score_stage_4`, `total_score`, `cea_mai_frumoasa`, `c_motor`, `c_asamblare`, `c_fire_esc`, `c_fir_fir`, `c_fire_bat`, `c_rotatie`, `cm_motor`, `cm_esc`, `cm_fc`, `cm_brat`, `cm_platforma`, `cm_picior`, `cm_capac`, `cm_elice`, `cm_frame`, `cm_scurt`, `cm_surub`, `cm_piulita`, `cm_cauciuc`, `cm_unelte`, `b_calibrare`, `b_axa`, `b_port`, `b_arming`, `b_airmode`, `b_voltage`, `b_failsafe`, `b_protocol`, `b_pid`, `b_modes`, `b_rx`, `b_fara_greseala`, `bm_flash`, `z_obstacol_peste`, `z_obstacol_sub`, `z_slalom`, `z_cerc_trecut`, `z_cerc_aterizare`, `zm_pamant`, `zm_obstacol`, `scor_total_drona`, `prezentare`, `zm_prabusire`) VALUES
(1, 'Echipa Alpha', 'parola123', 2, 23, 0, 0, 0, 66.5, 0, 0, 0, 0, 0, 0, 1, 15, 12, 2, 4, 73, 16, 11, 14, 16, 0, 0, 57, 0, 0, 42, 24, 2, 10, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 9, 0, 1, 6, 0, 6, 4, 0, -28445, 0, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `schedule`
--
ALTER TABLE `schedule`
  ADD PRIMARY KEY (`stage`);

--
-- Indexes for table `teams`
--
ALTER TABLE `teams`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `teams`
--
ALTER TABLE `teams`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
