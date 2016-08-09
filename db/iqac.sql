-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 23, 2016 at 07:30 AM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `iqac`
--

-- --------------------------------------------------------

--
-- Table structure for table `administrations`
--

CREATE TABLE IF NOT EXISTS `administrations` (
`AdministrationsId` int(11) NOT NULL,
  `UsertypeId` int(11) NOT NULL,
  `UserId` int(11) NOT NULL,
  `SessionId` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `FacultyId` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `administrations`
--

INSERT INTO `administrations` (`AdministrationsId`, `UsertypeId`, `UserId`, `SessionId`, `status`, `FacultyId`) VALUES
(3, 2, 1, 1, 0, 1),
(4, 3, 5, 1, 1, 1),
(6, 4, 7, 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE IF NOT EXISTS `course` (
`CourseId` int(11) NOT NULL,
  `CourseName` varchar(250) NOT NULL,
  `Tittle` varchar(250) NOT NULL,
  `Credit` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`CourseId`, `CourseName`, `Tittle`, `Credit`) VALUES
(1, 'Database Management System', 'CSE311', 3),
(2, 'Computer Fundamentals', 'CSE112', 3),
(3, 'Mathematics-I: Differential and Integral Calculus', 'MAT111', 3),
(4, 'Basic Functional English and English Spoken', 'ENG113', 3),
(5, 'Physics-I: Mechanics, Heat & Thermodynamics,Waves & Oscillation, Optics', 'PHY113', 3);

-- --------------------------------------------------------

--
-- Table structure for table `depertment`
--

CREATE TABLE IF NOT EXISTS `depertment` (
`DepertmentId` int(11) NOT NULL,
  `Name` varchar(250) NOT NULL,
  `FacultyId` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `depertment`
--

INSERT INTO `depertment` (`DepertmentId`, `Name`, `FacultyId`) VALUES
(1, 'Computer Science and Engineering', 1),
(2, 'Software Engineering', 1);

-- --------------------------------------------------------

--
-- Table structure for table `faculty`
--

CREATE TABLE IF NOT EXISTS `faculty` (
`FacultyId` int(11) NOT NULL,
  `Name` varchar(250) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `faculty`
--

INSERT INTO `faculty` (`FacultyId`, `Name`) VALUES
(1, 'Faculty of Science and Information Technology'),
(2, 'Faculty of Business & Economics');

-- --------------------------------------------------------

--
-- Table structure for table `section`
--

CREATE TABLE IF NOT EXISTS `section` (
`SectionId` int(11) NOT NULL,
  `SectionName` varchar(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `section`
--

INSERT INTO `section` (`SectionId`, `SectionName`) VALUES
(1, 'A');

-- --------------------------------------------------------

--
-- Table structure for table `semester`
--

CREATE TABLE IF NOT EXISTS `semester` (
`SemesterId` int(11) NOT NULL,
  `Name` varchar(250) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `semester`
--

INSERT INTO `semester` (`SemesterId`, `Name`) VALUES
(1, 'Summer'),
(2, 'Spring'),
(3, 'Fall');

-- --------------------------------------------------------

--
-- Table structure for table `session`
--

CREATE TABLE IF NOT EXISTS `session` (
`SessionId` int(11) NOT NULL,
  `SemesterId` int(11) NOT NULL,
  `YearId` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `session`
--

INSERT INTO `session` (`SessionId`, `SemesterId`, `YearId`) VALUES
(1, 1, 1),
(2, 2, 1),
(3, 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE IF NOT EXISTS `status` (
`StatusId` int(11) NOT NULL,
  `UserId` int(11) NOT NULL,
  `SessionId` int(11) NOT NULL,
  `Status` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`StatusId`, `UserId`, `SessionId`, `Status`) VALUES
(1, 1, 1, 0),
(2, 2, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `store`
--

CREATE TABLE IF NOT EXISTS `store` (
`StoreId` int(11) NOT NULL,
  `UserId` int(11) NOT NULL,
  `SessionId` int(11) NOT NULL,
  `CourseId` int(11) NOT NULL,
  `SectionId` int(11) NOT NULL,
  `CourseOutline` int(11) NOT NULL,
  `ClassTaken` int(11) NOT NULL,
  `ClassTest` int(11) NOT NULL,
  `PresentationTaken` int(11) NOT NULL,
  `AssignmentTaken` int(11) NOT NULL,
  `CourseCovered` int(11) NOT NULL,
  `FinalTermExamTaken` varchar(250) NOT NULL,
  `MidTermExamTaken` varchar(250) NOT NULL,
  `MidQuestion` varchar(250) NOT NULL,
  `FinalQuestion` varchar(250) NOT NULL,
  `Attaindence` varchar(250) NOT NULL,
  `GoogleClassroom` varchar(250) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `store`
--

INSERT INTO `store` (`StoreId`, `UserId`, `SessionId`, `CourseId`, `SectionId`, `CourseOutline`, `ClassTaken`, `ClassTest`, `PresentationTaken`, `AssignmentTaken`, `CourseCovered`, `FinalTermExamTaken`, `MidTermExamTaken`, `MidQuestion`, `FinalQuestion`, `Attaindence`, `GoogleClassroom`, `status`) VALUES
(2, 1, 1, 1, 1, 0, 15, 5, 4, 5, 1, 'Yes', 'Yes', './store/upload_MidTermExam/SAH-CSE311-A-2014-Summer.pdf', './store/upload_FinalTermExam/SAH-CSE311-A-2014-Summer.pdf', './store/upload_Attandence/SAH-CSE311-A-2014-Summer.pdf', 'che311.google.om', 2),
(3, 1, 1, 5, 1, 0, 21, 4, 5, 3, 0, 'Yes', 'Yes', './store/upload_MidTermExam/SAH-PHY113-A-2014-Summer.pdf', './store/upload_FinalTermExam/SAH-PHY113-A-2014-Summer.pdf', './store/upload_Attandence/SAH-PHY113-A-2014-Summer.pdf', 'php.google.com', 2),
(4, 2, 1, 1, 1, 0, 0, 2, 2, 2, 0, 'Yes', 'Yes', '', '', '', '', 2),
(5, 2, 1, 2, 1, 0, 0, 2, 2, 2, 0, 'Yes', 'Yes', '', '', '', '', 2),
(6, 2, 1, 3, 1, 0, 0, 2, 2, 2, 0, 'Yes', 'Yes', '', '', '', '', 2),
(7, 2, 1, 4, 1, 0, 0, 2, 2, 2, 0, 'Yes', 'Yes', '', '', '', '', 2),
(8, 2, 1, 5, 1, 0, 0, 2, 2, 2, 0, 'Yes', 'Yes', '', '', '', '', 2);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
`UserId` int(11) NOT NULL,
  `Email` varchar(250) NOT NULL,
  `Password` varchar(250) NOT NULL,
  `FullName` varchar(250) NOT NULL,
  `SortName` varchar(250) NOT NULL,
  `Designation` varchar(250) NOT NULL,
  `DepertmentId` int(11) NOT NULL,
  `EmployeeId` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`UserId`, `Email`, `Password`, `FullName`, `SortName`, `Designation`, `DepertmentId`, `EmployeeId`) VALUES
(1, 'aktarhossain@daffodilvarsity.edu.bd', '123456', 'Prof. Dr. Syed Akhter Hossain', 'SAH', 'Head', 1, 710000607),
(2, 'drfokhray@daffodilvarsity.edu.bd', '123456', 'Professor Dr. Md. Fokhray Hossain', 'FH', 'Professor', 1, 710000367),
(3, 'drnoori@daffodilvarsity.edu.bd', '123456', 'Dr. Sheak Rashed Haider Noori', 'SRHN', 'Assistant Professor', 1, 710001060),
(4, 'anirban@daffodilvarsity.edu.bd', '123456', 'Shikha Anirban', 'SA', 'Assistant Professor', 2, 710000717),
(5, 'deanfsit@daffodilvarsity.edu.bd', '123456', 'Dr. S.M. Mahbub Ul Haque Majumder', 'MUHM', 'Dean', 1, 710000168),
(7, 'Shuvrohosain@gmail.com', '123456', 'Shuvro Hosain', 'SH', 'IQAC HEAD', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `usertype`
--

CREATE TABLE IF NOT EXISTS `usertype` (
`UserTypeId` int(11) NOT NULL,
  `Name` varchar(250) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `usertype`
--

INSERT INTO `usertype` (`UserTypeId`, `Name`) VALUES
(1, 'Teacher'),
(2, 'Head'),
(3, 'Dean'),
(4, 'IQAC Head');

-- --------------------------------------------------------

--
-- Table structure for table `usertyperelation`
--

CREATE TABLE IF NOT EXISTS `usertyperelation` (
`UserTypeRelationId` int(11) NOT NULL,
  `UsertypeId` int(11) NOT NULL,
  `UserId` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `usertyperelation`
--

INSERT INTO `usertyperelation` (`UserTypeRelationId`, `UsertypeId`, `UserId`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 2, 1),
(4, 3, 5),
(5, 4, 7);

-- --------------------------------------------------------

--
-- Table structure for table `year`
--

CREATE TABLE IF NOT EXISTS `year` (
`YearId` int(11) NOT NULL,
  `Name` varchar(250) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `year`
--

INSERT INTO `year` (`YearId`, `Name`) VALUES
(1, '2014'),
(2, '2015'),
(3, '2016');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `administrations`
--
ALTER TABLE `administrations`
 ADD PRIMARY KEY (`AdministrationsId`), ADD KEY `UsertypeId` (`UsertypeId`,`UserId`,`SessionId`), ADD KEY `UserId` (`UserId`), ADD KEY `SessionId` (`SessionId`), ADD KEY `FacultyId` (`FacultyId`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
 ADD PRIMARY KEY (`CourseId`);

--
-- Indexes for table `depertment`
--
ALTER TABLE `depertment`
 ADD PRIMARY KEY (`DepertmentId`), ADD KEY `FacultyId` (`FacultyId`);

--
-- Indexes for table `faculty`
--
ALTER TABLE `faculty`
 ADD PRIMARY KEY (`FacultyId`);

--
-- Indexes for table `section`
--
ALTER TABLE `section`
 ADD PRIMARY KEY (`SectionId`);

--
-- Indexes for table `semester`
--
ALTER TABLE `semester`
 ADD PRIMARY KEY (`SemesterId`);

--
-- Indexes for table `session`
--
ALTER TABLE `session`
 ADD PRIMARY KEY (`SessionId`), ADD KEY `SemesterId` (`SemesterId`,`YearId`), ADD KEY `YearId` (`YearId`);

--
-- Indexes for table `status`
--
ALTER TABLE `status`
 ADD PRIMARY KEY (`StatusId`), ADD KEY `UserId` (`UserId`,`SessionId`), ADD KEY `SessionId` (`SessionId`);

--
-- Indexes for table `store`
--
ALTER TABLE `store`
 ADD PRIMARY KEY (`StoreId`), ADD KEY `UserId` (`UserId`), ADD KEY `SessionId` (`SessionId`), ADD KEY `SessionId_2` (`SessionId`), ADD KEY `CourseId` (`CourseId`), ADD KEY `SectionId` (`SectionId`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
 ADD PRIMARY KEY (`UserId`), ADD UNIQUE KEY `Email` (`Email`), ADD UNIQUE KEY `EmployeeId` (`EmployeeId`), ADD KEY `DepertmentId` (`DepertmentId`);

--
-- Indexes for table `usertype`
--
ALTER TABLE `usertype`
 ADD PRIMARY KEY (`UserTypeId`);

--
-- Indexes for table `usertyperelation`
--
ALTER TABLE `usertyperelation`
 ADD PRIMARY KEY (`UserTypeRelationId`), ADD KEY `UsertypeId` (`UsertypeId`,`UserId`), ADD KEY `UserId` (`UserId`);

--
-- Indexes for table `year`
--
ALTER TABLE `year`
 ADD PRIMARY KEY (`YearId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `administrations`
--
ALTER TABLE `administrations`
MODIFY `AdministrationsId` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
MODIFY `CourseId` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `depertment`
--
ALTER TABLE `depertment`
MODIFY `DepertmentId` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `faculty`
--
ALTER TABLE `faculty`
MODIFY `FacultyId` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `section`
--
ALTER TABLE `section`
MODIFY `SectionId` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `semester`
--
ALTER TABLE `semester`
MODIFY `SemesterId` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `session`
--
ALTER TABLE `session`
MODIFY `SessionId` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `status`
--
ALTER TABLE `status`
MODIFY `StatusId` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `store`
--
ALTER TABLE `store`
MODIFY `StoreId` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
MODIFY `UserId` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `usertype`
--
ALTER TABLE `usertype`
MODIFY `UserTypeId` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `usertyperelation`
--
ALTER TABLE `usertyperelation`
MODIFY `UserTypeRelationId` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `year`
--
ALTER TABLE `year`
MODIFY `YearId` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `administrations`
--
ALTER TABLE `administrations`
ADD CONSTRAINT `a1` FOREIGN KEY (`UsertypeId`) REFERENCES `usertype` (`UserTypeId`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `a2` FOREIGN KEY (`UserId`) REFERENCES `user` (`UserId`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `a3` FOREIGN KEY (`SessionId`) REFERENCES `session` (`SessionId`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `a4888` FOREIGN KEY (`FacultyId`) REFERENCES `faculty` (`FacultyId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `depertment`
--
ALTER TABLE `depertment`
ADD CONSTRAINT `fk3` FOREIGN KEY (`FacultyId`) REFERENCES `faculty` (`FacultyId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `session`
--
ALTER TABLE `session`
ADD CONSTRAINT `f6` FOREIGN KEY (`SemesterId`) REFERENCES `semester` (`SemesterId`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `f8` FOREIGN KEY (`YearId`) REFERENCES `year` (`YearId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `status`
--
ALTER TABLE `status`
ADD CONSTRAINT `f10` FOREIGN KEY (`SessionId`) REFERENCES `session` (`SessionId`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `f11` FOREIGN KEY (`UserId`) REFERENCES `user` (`UserId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `store`
--
ALTER TABLE `store`
ADD CONSTRAINT `q1` FOREIGN KEY (`UserId`) REFERENCES `user` (`UserId`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `q2` FOREIGN KEY (`SessionId`) REFERENCES `session` (`SessionId`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `q3` FOREIGN KEY (`CourseId`) REFERENCES `course` (`CourseId`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `q4` FOREIGN KEY (`SectionId`) REFERENCES `section` (`SectionId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user`
--
ALTER TABLE `user`
ADD CONSTRAINT `f88` FOREIGN KEY (`DepertmentId`) REFERENCES `depertment` (`DepertmentId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `usertyperelation`
--
ALTER TABLE `usertyperelation`
ADD CONSTRAINT `fk` FOREIGN KEY (`UsertypeId`) REFERENCES `usertype` (`UserTypeId`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `fk2` FOREIGN KEY (`UserId`) REFERENCES `user` (`UserId`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
