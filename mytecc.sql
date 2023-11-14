-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 14, 2023 at 01:39 PM
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
-- Database: `mytecc`
--

-- --------------------------------------------------------

--
-- Table structure for table `requests`
--

CREATE TABLE `requests` (
  `reqID` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `reqNam` varchar(250) NOT NULL,
  `reqProgram` varchar(250) NOT NULL,
  `reqOrganizer` varchar(250) NOT NULL,
  `reqPhone` varchar(20) NOT NULL,
  `reqVenue` varchar(250) NOT NULL,
  `reqDate` date NOT NULL,
  `reqTime` time NOT NULL,
  `appDate` date NOT NULL,
  `status` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `requests`
--

INSERT INTO `requests` (`reqID`, `userID`, `reqNam`, `reqProgram`, `reqOrganizer`, `reqPhone`, `reqVenue`, `reqDate`, `reqTime`, `appDate`, `status`) VALUES
(1, 2, 'Ahmad', 'Flutter Workshop', 'MYTECC Club', '0183725364', 'Dewan Albiruni', '2023-03-09', '09:30:00', '2023-11-14', 'APPROVED');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userID` int(11) NOT NULL,
  `userFullname` varchar(250) NOT NULL,
  `userEmail` varchar(250) NOT NULL,
  `userPass` varchar(250) NOT NULL,
  `userGender` varchar(250) NOT NULL,
  `userAddress` varchar(250) NOT NULL,
  `userCity` varchar(250) NOT NULL,
  `userPostcode` varchar(10) NOT NULL,
  `userState` varchar(250) NOT NULL,
  `userCountry` varchar(250) NOT NULL,
  `userType` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userID`, `userFullname`, `userEmail`, `userPass`, `userGender`, `userAddress`, `userCity`, `userPostcode`, `userState`, `userCountry`, `userType`) VALUES
(1, 'admin', 'admin@mytecc.com', '1234', 'Female', 'UiTM', 'Raub', '28302', 'Pahang', 'Malaysia', 'admin'),
(2, 'Ain Farhana', 'awesomeffy@gmail.com', '1234', 'Female', '08-1-06 Apartment Rosana Villa', 'Puchong', '47130', 'Selangor', 'Malaysia', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `requests`
--
ALTER TABLE `requests`
  ADD PRIMARY KEY (`reqID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `requests`
--
ALTER TABLE `requests`
  MODIFY `reqID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
