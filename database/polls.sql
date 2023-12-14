-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 14, 2023 at 05:57 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `polls`
--

-- --------------------------------------------------------

--
-- Table structure for table `candidates`
--

CREATE TABLE `candidates` (
  `cand_id` int(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `poll_id` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `candidates`
--

INSERT INTO `candidates` (`cand_id`, `username`, `poll_id`) VALUES
(9, 'Ben', 4),
(10, 'Jimmy', 4),
(11, 'Fred', 4);

-- --------------------------------------------------------

--
-- Table structure for table `polls`
--

CREATE TABLE `polls` (
  `poll_id` int(255) NOT NULL,
  `poll_title` varchar(255) NOT NULL,
  `usr_token` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `polls`
--

INSERT INTO `polls` (`poll_id`, `poll_title`, `usr_token`) VALUES
(4, 'President of Majasociet Directing Manager', 5);

-- --------------------------------------------------------

--
-- Table structure for table `poll_users`
--

CREATE TABLE `poll_users` (
  `usr_id` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `mail` varchar(255) NOT NULL,
  `pwd` varchar(255) NOT NULL,
  `usr_token` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `poll_users`
--

INSERT INTO `poll_users` (`usr_id`, `username`, `mail`, `pwd`, `usr_token`) VALUES
('Q-UHTZwBYCrj80FEIhuGzofDmKvkatMxAqdl4p1gXPNnLJR3eVUb9', 'Osborn Maja', 'osbornmaja@gmail.com', '$2y$12$SdQwfAiV5dQs9t/LfQCLx./P/dYWRvVCmZ7Je9ucxREZ6zeGFWpxm', 5),
('Q-UvUReJCEIZ5Nlo7p1gfTYWASmsQiBuzH8FPyrhD0V3M4XaGwkdK', 'Mangaro', 'osbornmangaro@gmail.com', '$2y$12$eVqcq.UWFt5EDcMVod7i6.uGCrtlpYJrvFb0n2xHxbtan7af/pdSC', 6),
('Q-UkDpnGhL7B8f0b2ZY3stq6OcvKIHiPwxV9QdulUMaEFzm1rJSyT', 'Rm', 'rmmangaro@gmail.com', '$2y$12$sELY8iAFSM9niUMOAth0tusmMfganhjH9EK.u0LBy2g8rlNfl.GW2', 7),
('Q-US6dYuK4WR5sZ8xVkzHNgvBIablw1D709E2e3AfqtLrMUihTynJ', 'Rhoda', 'rhodaanzazi@yahoo.com', '$2y$12$Tu432Xd2nejF.tQPOOo08.BH9gNvlQuxyh9nb4Oul3ozN2ZgTx2Qq', 8);

-- --------------------------------------------------------

--
-- Table structure for table `registered_voters`
--

CREATE TABLE `registered_voters` (
  `reg_voter_id` int(255) NOT NULL,
  `poll_id` int(255) NOT NULL,
  `usr_token` int(255) NOT NULL,
  `date_registered` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `registered_voters`
--

INSERT INTO `registered_voters` (`reg_voter_id`, `poll_id`, `usr_token`, `date_registered`) VALUES
(10, 4, 6, 'Tuesday 12th of December 2023 02:21:22 PM'),
(11, 4, 7, 'Tuesday 12th of December 2023 02:32:08 PM'),
(12, 4, 5, 'Tuesday 12th of December 2023 04:03:02 PM');

-- --------------------------------------------------------

--
-- Table structure for table `voters`
--

CREATE TABLE `voters` (
  `voter_id` int(255) NOT NULL,
  `usr_token` int(255) NOT NULL,
  `cand_id` int(255) NOT NULL,
  `poll_id` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `voters`
--

INSERT INTO `voters` (`voter_id`, `usr_token`, `cand_id`, `poll_id`) VALUES
(13, 6, 9, 4),
(14, 5, 9, 4);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `candidates`
--
ALTER TABLE `candidates`
  ADD PRIMARY KEY (`cand_id`);

--
-- Indexes for table `polls`
--
ALTER TABLE `polls`
  ADD PRIMARY KEY (`poll_id`);

--
-- Indexes for table `poll_users`
--
ALTER TABLE `poll_users`
  ADD PRIMARY KEY (`usr_token`);

--
-- Indexes for table `registered_voters`
--
ALTER TABLE `registered_voters`
  ADD PRIMARY KEY (`reg_voter_id`);

--
-- Indexes for table `voters`
--
ALTER TABLE `voters`
  ADD PRIMARY KEY (`voter_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `candidates`
--
ALTER TABLE `candidates`
  MODIFY `cand_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `polls`
--
ALTER TABLE `polls`
  MODIFY `poll_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `poll_users`
--
ALTER TABLE `poll_users`
  MODIFY `usr_token` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `registered_voters`
--
ALTER TABLE `registered_voters`
  MODIFY `reg_voter_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `voters`
--
ALTER TABLE `voters`
  MODIFY `voter_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
