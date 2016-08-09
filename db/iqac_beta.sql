-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 09, 2015 at 08:47 AM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `iqac_beta`
--

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE IF NOT EXISTS `course` (
`CourseId` int(11) NOT NULL,
  `CourseTittle` varchar(250) NOT NULL,
  `CourseName` varchar(250) NOT NULL,
  `Credit` varchar(250) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`CourseId`, `CourseTittle`, `CourseName`, `Credit`) VALUES
(1, 'Web Engineering\r\n', 'Web Engineering\r\n', '3'),
(2, 'Modeling and Simulation', 'Modeling and Simulation', '3'),
(3, 'Artificial Intelligence\r\n', 'Artificial Intelligence\r\n', '3'),
(4, 'Introduction to Bioinformatics\r\n', 'Introduction to Bioinformatics\r\n', '3');

-- --------------------------------------------------------

--
-- Table structure for table `depertment`
--

CREATE TABLE IF NOT EXISTS `depertment` (
`DeptId` int(11) NOT NULL,
  `DeptName` varchar(250) NOT NULL,
  `FactName` varchar(250) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `depertment`
--

INSERT INTO `depertment` (`DeptId`, `DeptName`, `FactName`) VALUES
(1, 'CSE', 'FIST'),
(2, 'SWF', 'FIST');

-- --------------------------------------------------------

--
-- Table structure for table `semester`
--

CREATE TABLE IF NOT EXISTS `semester` (
`semId` int(11) NOT NULL,
  `semiTittle` varchar(250) NOT NULL,
  `semName` varchar(250) NOT NULL,
  `Year` varchar(250) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `semester`
--

INSERT INTO `semester` (`semId`, `semiTittle`, `semName`, `Year`) VALUES
(1, 'sum', 'Summar', '2015'),
(2, 'Fall', 'Fall', '2015'),
(3, 'Spring', 'Spring', '2015');

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE IF NOT EXISTS `status` (
`StatusId` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `semiID` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`StatusId`, `userId`, `semiID`, `status`) VALUES
(1, 2, 2, 0);

-- --------------------------------------------------------

--
-- Table structure for table `storage`
--

CREATE TABLE IF NOT EXISTS `storage` (
`storageId` int(11) NOT NULL,
  `CourseId` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `secsion` varchar(250) DEFAULT NULL,
  `numberOfClass` int(11) DEFAULT NULL,
  `Assignment` int(11) DEFAULT NULL,
  `Presentation` int(11) DEFAULT NULL,
  `LfsLink` varchar(250) DEFAULT NULL,
  `CourseOutline` varchar(250) DEFAULT NULL,
  `MidExam` varchar(250) DEFAULT NULL,
  `FinalExam` varchar(250) DEFAULT NULL,
  `CourseOutlineCovered` varchar(250) DEFAULT NULL,
  `attendance` varchar(250) DEFAULT NULL,
  `semId` int(11) NOT NULL,
  `CourseName` varchar(250) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `storage`
--

INSERT INTO `storage` (`storageId`, `CourseId`, `userid`, `secsion`, `numberOfClass`, `Assignment`, `Presentation`, `LfsLink`, `CourseOutline`, `MidExam`, `FinalExam`, `CourseOutlineCovered`, `attendance`, `semId`, `CourseName`) VALUES
(3, 1, 2, NULL, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 'Web Engineering'),
(4, 2, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 'Modeling and Simulation'),
(5, 3, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 'Artificial Intelligence'),
(6, 4, 2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 'Introduction to Bioinformatics\r\n	');

-- --------------------------------------------------------

--
-- Table structure for table `userdb`
--

CREATE TABLE IF NOT EXISTS `userdb` (
`UserId` int(11) NOT NULL,
  `Email` varchar(250) NOT NULL,
  `Password` varchar(250) NOT NULL,
  `name` varchar(250) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `userdb`
--

INSERT INTO `userdb` (`UserId`, `Email`, `Password`, `name`) VALUES
(1, 'aktarhossain@daffodilvarsity.edu.bd', '123456', 'Prof. Dr. Syed Akhter Hossain'),
(2, 'narayan@daffodilvarsity.edu.bd', '123456', 'Mr. Narayan Ranjan Chakraborty'),
(3, 'ahmedalmarouf@gmail.com ', '123456', 'Mr. Ahmed Al Marouf');

-- --------------------------------------------------------

--
-- Table structure for table `userdbxusertypexdepertment`
--

CREATE TABLE IF NOT EXISTS `userdbxusertypexdepertment` (
`tableId` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `usertypeId` int(11) NOT NULL,
  `deptId` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `userdbxusertypexdepertment`
--

INSERT INTO `userdbxusertypexdepertment` (`tableId`, `userId`, `usertypeId`, `deptId`) VALUES
(1, 1, 1, 1),
(2, 2, 2, 1),
(3, 3, 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `usertypedb`
--

CREATE TABLE IF NOT EXISTS `usertypedb` (
`TypeId` int(11) NOT NULL,
  `TypeName` varchar(250) NOT NULL,
  `Designation` varchar(250) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `usertypedb`
--

INSERT INTO `usertypedb` (`TypeId`, `TypeName`, `Designation`) VALUES
(1, 'Head', 'FIST'),
(2, 'Teacher', 'FIST'),
(3, 'Admin', 'FIST');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `course`
--
ALTER TABLE `course`
 ADD PRIMARY KEY (`CourseId`), ADD KEY `CourseName` (`CourseName`);

--
-- Indexes for table `depertment`
--
ALTER TABLE `depertment`
 ADD PRIMARY KEY (`DeptId`), ADD KEY `DeptId` (`DeptId`);

--
-- Indexes for table `semester`
--
ALTER TABLE `semester`
 ADD PRIMARY KEY (`semId`);

--
-- Indexes for table `status`
--
ALTER TABLE `status`
 ADD PRIMARY KEY (`StatusId`), ADD KEY `userId` (`userId`), ADD KEY `semiID` (`semiID`);

--
-- Indexes for table `storage`
--
ALTER TABLE `storage`
 ADD PRIMARY KEY (`storageId`), ADD KEY `CourseId` (`CourseId`), ADD KEY `userid` (`userid`), ADD KEY `CourseName` (`CourseName`);

--
-- Indexes for table `userdb`
--
ALTER TABLE `userdb`
 ADD PRIMARY KEY (`UserId`), ADD KEY `UserId` (`UserId`);

--
-- Indexes for table `userdbxusertypexdepertment`
--
ALTER TABLE `userdbxusertypexdepertment`
 ADD PRIMARY KEY (`tableId`), ADD KEY `userId` (`userId`), ADD KEY `usertypeId` (`usertypeId`), ADD KEY `deptId` (`deptId`);

--
-- Indexes for table `usertypedb`
--
ALTER TABLE `usertypedb`
 ADD PRIMARY KEY (`TypeId`), ADD KEY `TypeId` (`TypeId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
MODIFY `CourseId` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `depertment`
--
ALTER TABLE `depertment`
MODIFY `DeptId` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `semester`
--
ALTER TABLE `semester`
MODIFY `semId` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `status`
--
ALTER TABLE `status`
MODIFY `StatusId` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `storage`
--
ALTER TABLE `storage`
MODIFY `storageId` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `userdb`
--
ALTER TABLE `userdb`
MODIFY `UserId` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `userdbxusertypexdepertment`
--
ALTER TABLE `userdbxusertypexdepertment`
MODIFY `tableId` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `usertypedb`
--
ALTER TABLE `usertypedb`
MODIFY `TypeId` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `status`
--
ALTER TABLE `status`
ADD CONSTRAINT `status_ibfk_1` FOREIGN KEY (`userId`) REFERENCES `userdb` (`UserId`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `status_ibfk_2` FOREIGN KEY (`semiID`) REFERENCES `semester` (`semId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `storage`
--
ALTER TABLE `storage`
ADD CONSTRAINT `storage_ibfk_1` FOREIGN KEY (`CourseId`) REFERENCES `course` (`CourseId`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `storage_ibfk_2` FOREIGN KEY (`userid`) REFERENCES `userdb` (`UserId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `userdbxusertypexdepertment`
--
ALTER TABLE `userdbxusertypexdepertment`
ADD CONSTRAINT `userdbxusertypexdepertment_ibfk_1` FOREIGN KEY (`userId`) REFERENCES `userdb` (`UserId`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `userdbxusertypexdepertment_ibfk_2` FOREIGN KEY (`usertypeId`) REFERENCES `usertypedb` (`TypeId`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `userdbxusertypexdepertment_ibfk_3` FOREIGN KEY (`deptId`) REFERENCES `depertment` (`DeptId`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
