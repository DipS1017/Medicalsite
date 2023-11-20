-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 16, 2023 at 07:15 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hospital`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_login`
--

CREATE TABLE `admin_login` (
  `id` int(11) NOT NULL,
  `Admin_Name` varchar(99) NOT NULL,
  `Admin_Password` varchar(99) NOT NULL,
  `doc_id` int(11) DEFAULT NULL,
  `docname` varchar(50) NOT NULL,
  `contactid` int(11) DEFAULT NULL,
  `contactname` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin_login`
--

INSERT INTO `admin_login` (`id`, `Admin_Name`, `Admin_Password`, `doc_id`, `docname`, `contactid`, `contactname`) VALUES
(1, 'Admin', 'Admin', NULL, '', NULL, '');

-- --------------------------------------------------------

--
-- Table structure for table `appointments`
--

CREATE TABLE `appointments` (
  `id` int(99) NOT NULL,
  `Name` varchar(99) NOT NULL,
  `Email` varchar(99) NOT NULL,
  `Phone` varchar(99) NOT NULL,
  `Doctor` varchar(99) NOT NULL,
  `Date` varchar(99) NOT NULL,
  `Time` varchar(99) NOT NULL,
  `Message` varchar(99) NOT NULL,
  `doctorid` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `appointments`
--

INSERT INTO `appointments` (`id`, `Name`, `Email`, `Phone`, `Doctor`, `Date`, `Time`, `Message`, `doctorid`) VALUES
(1, 'Dipesh Shrestha', 'dipesh18@gmail.com', '9801734682', 'Dr. Ethan Sullivan', '2023-08-15', '21:30', 'TEST', NULL),
(2, 'bibash Shrestha', 'bibash18@gmail.com', '9801734682', 'Dr. Benjamin Davis', '2023-08-15', '23:00', 'TEST 2', NULL),
(3, 'karan maharjan', 'karan18@gmail.com', '9813574537', 'Dr. Benjamin Davis', '2023-08-16', '07:00', 'TEST 3', NULL),
(4, 'TEST ', 'number@gmail.com', '9801734682', 'Dr. Olivia Bennett', '2023-08-14', '22:02', 'TEST4', NULL),
(5, 'sweekar', 'sweekar@gmail.com', '9801734682', 'Dr. John Doe', '2023-08-14', '12:00', 'Test 5', NULL),
(6, 'Dipesh Shrestha', 'dipesh18@gmail.com', '9801734682', 'Dr. Olivia Bennett', '2023-08-14', '23:23', 'test 5', NULL),
(7, 'Dipesh ', 'prime@gmail.com', '9801017372', 'Dr. Christopher Anderson', '2023-08-17', '12:00', 'Testing ,,,,,,,,', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` int(11) NOT NULL,
  `name` varchar(99) NOT NULL,
  `email` varchar(99) NOT NULL,
  `message` varchar(99) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `name`, `email`, `message`) VALUES
(1, 'Dipesh Shrestha', 'dipesh18@gmail.com', 'TEST'),
(2, 'bibash Shrestha', 'bibash18@gmail.com', 'TEST 2');

-- --------------------------------------------------------

--
-- Table structure for table `doctors`
--

CREATE TABLE `doctors` (
  `Id` int(11) NOT NULL,
  `Pic` varchar(100) NOT NULL,
  `Name` varchar(99) NOT NULL,
  `Department` varchar(99) NOT NULL,
  `Discription` varchar(99) NOT NULL,
  `User_id` int(11) DEFAULT NULL,
  `username` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `doctors`
--

INSERT INTO `doctors` (`Id`, `Pic`, `Name`, `Department`, `Discription`, `User_id`, `username`) VALUES
(7, '', 'John Doe', 'Neurollogy', 'Dr. John Doe is a highly skilled and dedicated neurologist who specializes in diagnosing and treati', NULL, ''),
(8, '', 'Michael Johnson', 'Neurollogy', 'Dr. Michael Johnson is a highly esteemed neurologist with a passion for providing comprehensive car', NULL, ''),
(9, '', 'Benjamin Davis', 'Cardiology', 'Dr. Benjamin Davis is a highly skilled and experienced cardiologist dedicated to providing exceptio', NULL, ''),
(10, '', 'Christopher Anderson', 'Cardiology', 'Dr. Christopher Anderson is a highly skilled and dedicated cardiologist who specializes in diagnosi', NULL, ''),
(11, 'images/ped2.jpg', 'Christopher Anderson', 'Cardiology', 'Dr. Christopher Anderson is a highly skilled and dedicated cardiologist who specializes in diagnosi', NULL, '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_login`
--
ALTER TABLE `admin_login`
  ADD PRIMARY KEY (`id`),
  ADD KEY `docname` (`doc_id`),
  ADD KEY `contactname` (`contactid`);

--
-- Indexes for table `appointments`
--
ALTER TABLE `appointments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `doctors` (`doctorid`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `doctors`
--
ALTER TABLE `doctors`
  ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_login`
--
ALTER TABLE `admin_login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `appointments`
--
ALTER TABLE `appointments`
  MODIFY `id` int(99) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `doctors`
--
ALTER TABLE `doctors`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admin_login`
--
ALTER TABLE `admin_login`
  ADD CONSTRAINT `contactname` FOREIGN KEY (`contactid`) REFERENCES `contacts` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `docname` FOREIGN KEY (`doc_id`) REFERENCES `doctors` (`Id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `appointments`
--
ALTER TABLE `appointments`
  ADD CONSTRAINT `doctors` FOREIGN KEY (`doctorid`) REFERENCES `doctors` (`Id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `doctors`
--
ALTER TABLE `doctors`
  ADD CONSTRAINT `user name` FOREIGN KEY (`User_id`) REFERENCES `appointments` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
