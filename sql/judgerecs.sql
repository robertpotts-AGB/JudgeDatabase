-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 06, 2020 at 04:36 PM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 7.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `judgerecs`
--

-- --------------------------------------------------------

--
-- Table structure for table `judges`
--

CREATE TABLE `judges` (
  `AGB_No` int(11) NOT NULL,
  `FirstName` text NOT NULL,
  `LastName` text NOT NULL,
  `Level` text NOT NULL,
  `County` text NOT NULL,
  `Region` text NOT NULL,
  `isJLO` tinyint(1) NOT NULL,
  `isAdmin` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `judges`
--

INSERT INTO `judges` (`AGB_No`, `FirstName`, `LastName`, `Level`, `County`, `Region`, `isJLO`, `isAdmin`) VALUES
(964787, 'Robert', 'Potts', 'National', 'Berkshire', 'SCAS', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `registered_users`
--

CREATE TABLE `registered_users` (
  `id` int(8) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `display_name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `agb_no` int(11) NOT NULL,
  `level` text NOT NULL,
  `county` text NOT NULL,
  `region` text NOT NULL,
  `isJLO` tinyint(1) NOT NULL,
  `isAdmin` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `registered_users`
--

INSERT INTO `registered_users` (`id`, `user_name`, `display_name`, `password`, `email`, `agb_no`, `level`, `county`, `region`, `isJLO`, `isAdmin`) VALUES
(2, '964788', 'Katy Cumming', 'cumming1', '', 964788, '', '', 'SCAS', 0, 0),
(964787, '964787', 'Rob Potts', '0121d088bc647775952c5433f8af25ae', 'kate@wince.com', 964787, '', '', 'SCAS', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `shootrec`
--

CREATE TABLE `shootrec` (
  `ID` int(11) NOT NULL,
  `AGBNo` int(11) NOT NULL,
  `EvName` text NOT NULL,
  `EvRound` text,
  `EvDate` date NOT NULL,
  `EvOrg` text NOT NULL,
  `EvLevel` text NOT NULL,
  `EvDiscipline` text NOT NULL,
  `EvOptional` text NOT NULL,
  `EvStatus` text NOT NULL,
  `EvRole` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `shootrec`
--

INSERT INTO `shootrec` (`ID`, `AGBNo`, `EvName`, `EvRound`, `EvDate`, `EvOrg`, `EvLevel`, `EvDiscipline`, `EvOptional`, `EvStatus`, `EvRole`) VALUES
(18, 964788, 'Pottsys Shoot 3', NULL, '2020-03-11', 'AGB', 'International', 'Target', 'Indoor', 'WRS', 'COJ'),
(26, 964787, 'Shoot 3', NULL, '2019-12-01', 'WA', 'National', 'Field', 'H2H', 'WRS', 'DOS'),
(27, 964787, 'My Shoot 999', NULL, '2020-04-16', 'WA', 'National', 'Target', 'H2H', 'WRS', 'DOS'),
(28, 964787, 'test90', 'York', '2020-04-02', 'AGB', 'International', 'Target', 'H2H', 'UKRS', 'COJ'),
(75, 964787, 'MyFiasco', 'York', '2020-09-11', 'AGB', 'International', 'Target', '', 'WRS', 'COJ'),
(76, 964787, 'MyFiasco2', 'FITA 900', '2019-12-19', 'WA', 'National', 'Target', '', 'WRS', 'DOS');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `judges`
--
ALTER TABLE `judges`
  ADD PRIMARY KEY (`AGB_No`);

--
-- Indexes for table `registered_users`
--
ALTER TABLE `registered_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shootrec`
--
ALTER TABLE `shootrec`
  ADD PRIMARY KEY (`ID`,`AGBNo`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `registered_users`
--
ALTER TABLE `registered_users`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `shootrec`
--
ALTER TABLE `shootrec`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
