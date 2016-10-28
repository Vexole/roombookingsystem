-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 29, 2016 at 05:39 PM
-- Server version: 5.6.24
-- PHP Version: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `room_booking`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `a_name` varchar(50) NOT NULL,
  `a_password` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `d_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `booked_room`
--

CREATE TABLE IF NOT EXISTS `booked_room` (
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `bookedDate` date NOT NULL,
  `startTime` time NOT NULL,
  `finishTime` time NOT NULL,
  `courseCode` varchar(50) NOT NULL,
  `teacherMail` varchar(50) NOT NULL,
  `roomNo` int(11) NOT NULL,
  `blockNo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `booked_room`
--

INSERT INTO `booked_room` (`status`, `bookedDate`, `startTime`, `finishTime`, `courseCode`, `teacherMail`, `roomNo`, `blockNo`) VALUES
(0, '2016-09-29', '21:00:00', '23:00:00', 'COMP 304', 'rbista@ku.edu.np', 5, 12),
(0, '2016-09-29', '21:00:00', '23:00:00', 'COMP 304', 'rbista@ku.edu.np', 2, 12),
(0, '2016-09-29', '23:00:00', '23:30:00', 'COMP 304', 'skhanal@ku.edu.np', 4, 12),
(0, '2016-09-30', '09:00:00', '11:00:00', 'MGTS 401', 'skhanal@ku.edu.np', 4, 12);

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE IF NOT EXISTS `course` (
  `courseName` varchar(50) NOT NULL,
  `departmentName` varchar(50) NOT NULL,
  `courseCode` varchar(50) NOT NULL,
  `year` int(11) NOT NULL,
  `semester` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`courseName`, `departmentName`, `courseCode`, `year`, `semester`) VALUES
('Control', 'Mechanical', 'COEG 304', 3, 2),
('Computer Networking', 'Computer Science and Engineering', 'COMP 101', 1, 2),
('C Programming', 'Computer Science and Engineering', 'COMP102', 1, 1),
('Engineering Management', 'Management', 'MGTS 401', 4, 1);

-- --------------------------------------------------------

--
-- Table structure for table `course_associated`
--

CREATE TABLE IF NOT EXISTS `course_associated` (
  `t_id` int(50) NOT NULL,
  `c_code_associated` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `date`
--

CREATE TABLE IF NOT EXISTS `date` (
  `date_id` int(50) NOT NULL,
  `d_date` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE IF NOT EXISTS `department` (
  `departmentName` varchar(50) NOT NULL,
  `blockNo` int(50) NOT NULL,
  `numberOfRooms` int(11) NOT NULL,
  `photo_id` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`departmentName`, `blockNo`, `numberOfRooms`, `photo_id`) VALUES
('Administration', 7, 15, 0),
('Bio. Tech', 10, 7, 0),
('CE', 5, 28, 0),
('CivilE', 11, 5, 0),
('Electrical', 4, 8, 0),
('GE', 9, 10, 0),
('Geomatics', 3, 8, 0),
('Geometics', 20, 5, 0),
('Gol Ghar', 6, 5, 0),
('ME', 8, 27, 0),
('Pharmacy', 12, 9, 0);

-- --------------------------------------------------------

--
-- Table structure for table `room`
--

CREATE TABLE IF NOT EXISTS `room` (
  `roomNo` int(11) NOT NULL,
  `capacity` int(50) NOT NULL,
  `blockNo` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `room`
--

INSERT INTO `room` (`roomNo`, `capacity`, `blockNo`) VALUES
(8, 40, 8),
(1, 60, 7),
(12, 60, 5),
(7, 40, 3),
(5, 40, 12),
(4, 40, 12),
(2, 40, 12),
(7, 60, 25),
(5, 45, 23),
(50, 45, 3);

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

CREATE TABLE IF NOT EXISTS `teacher` (
  `teacherMail` varchar(50) NOT NULL,
  `departmentName` varchar(50) NOT NULL,
  `teacherName` varchar(50) NOT NULL,
  `teacherID` int(50) NOT NULL,
  `number` bigint(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`teacherMail`, `departmentName`, `teacherName`, `teacherID`, `number`) VALUES
('rbista@ku.edu.np', 'CE', 'Rabindra Bista', 3, 9841235687),
('skhanal@ku.edu.np', 'Computer Engineering', 'Santosh Khanal', 4, 9841256398),
('nepal@ku.edu.np', 'Computer Engineering', 'Sushil Nepal', 5, 9841256320),
('pkharel@ku.edu.np', 'Computer', 'Purshottam Kharel', 6, 9852143600);

-- --------------------------------------------------------

--
-- Table structure for table `time`
--

CREATE TABLE IF NOT EXISTS `time` (
  `time_id` int(50) NOT NULL,
  `t_time` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `userID` int(11) NOT NULL,
  `userName` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `school` varchar(30) NOT NULL,
  `department` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userID`, `userName`, `password`, `school`, `department`) VALUES
(1, 'admin123', '0192023a7bbd73250516f069df18b500', 'Engineering', 'CE'),
(2, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Engg', 'CE'),
(3, 'Bigyan', '3a2e3811d8479ec4f2789ba6389564c9', 'Engineering', 'CE');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`courseCode`), ADD UNIQUE KEY `courseName` (`courseName`);

--
-- Indexes for table `date`
--
ALTER TABLE `date`
  ADD PRIMARY KEY (`date_id`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`departmentName`,`blockNo`), ADD UNIQUE KEY `departmentName` (`departmentName`);

--
-- Indexes for table `teacher`
--
ALTER TABLE `teacher`
  ADD PRIMARY KEY (`teacherID`), ADD UNIQUE KEY `teacherMail` (`teacherMail`);

--
-- Indexes for table `time`
--
ALTER TABLE `time`
  ADD PRIMARY KEY (`time_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `teacher`
--
ALTER TABLE `teacher`
  MODIFY `teacherID` int(50) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
