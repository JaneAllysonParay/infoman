-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 23, 2025 at 05:32 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbit2c`
--

-- --------------------------------------------------------

--
-- Table structure for table `tblcourse`
--

CREATE TABLE `tblcourse` (
  `fldindex` int(10) NOT NULL,
  `course_code` varchar(50) NOT NULL,
  `course_title` varchar(50) NOT NULL,
  `units` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblcourse`
--

INSERT INTO `tblcourse` (`fldindex`, `course_code`, `course_title`, `units`) VALUES
(1, 'BSIT', 'BS Information Technology', 3),
(2, 'BSIT', 'DSAJDJDi', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tblstudent`
--

CREATE TABLE `tblstudent` (
  `fldindex` int(10) NOT NULL,
  `fldstudentnumber` varchar(50) NOT NULL,
  `fldlastname` varchar(50) NOT NULL,
  `fldfirstname` varchar(50) NOT NULL,
  `fldmiddlename` varchar(50) NOT NULL,
  `fldprogramofstudy` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblstudent`
--

INSERT INTO `tblstudent` (`fldindex`, `fldstudentnumber`, `fldlastname`, `fldfirstname`, `fldmiddlename`, `fldprogramofstudy`) VALUES
(1, '2023350761', 'Del Rosario', 'Renz Andrei', 'Tolentino', ''),
(2, '1321321', 'Balion', 'Angel', 'Bendicion', ''),
(3, '20202', 'Del ', 'Renz', 'Tole', 'IT'),
(4, '12321', 'Talens', 'xyre', 'Dominique', 'IT'),
(5, '12321', 'dsads', 'dsadas', 'sdadsa', 'IT');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
