-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 20, 2019 at 06:44 AM
-- Server version: 10.1.32-MariaDB
-- PHP Version: 5.6.36

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mentor`
--

-- --------------------------------------------------------

--
-- Table structure for table `logs`
--

CREATE TABLE `logs` (
  `id` int(11) NOT NULL,
  `errno` int(2) NOT NULL,
  `errtype` varchar(32) NOT NULL,
  `errstr` text NOT NULL,
  `errfile` varchar(255) NOT NULL,
  `errline` int(4) NOT NULL,
  `user_agent` varchar(120) NOT NULL,
  `ip_address` varchar(45) NOT NULL DEFAULT '0',
  `time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `logs`
--

INSERT INTO `logs` (`id`, `errno`, `errtype`, `errstr`, `errfile`, `errline`, `user_agent`, `ip_address`, `time`) VALUES
(1, 2, 'Warning', 'include(C:\\xampp\\htdocs\\mentor\\application\\views\\errors\\html\\error_general.php): failed to open stream: No such file or directory', 'C:\\xampp\\htdocs\\mentor\\system\\core\\Exceptions.php', 182, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/75.0.3770.80 Safari/537.36', '::1', '2019-06-13 08:38:26'),
(2, 2, 'Warning', 'include(): Failed opening \'C:\\xampp\\htdocs\\mentor\\application\\views\\errors\\html\\error_general.php\' for inclusion (include_path=\'C:\\xampp\\php\\PEAR\')', 'C:\\xampp\\htdocs\\mentor\\system\\core\\Exceptions.php', 182, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/75.0.3770.80 Safari/537.36', '::1', '2019-06-13 08:38:26'),
(3, 8, 'Notice', 'Undefined variable: session', 'C:\\xampp\\htdocs\\mentor\\application\\controllers\\Home.php', 43, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/75.0.3770.80 Safari/537.36', '::1', '2019-06-13 08:51:37'),
(4, 8, 'Notice', 'Undefined variable: session', 'C:\\xampp\\htdocs\\mentor\\application\\controllers\\Home.php', 43, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/75.0.3770.80 Safari/537.36', '::1', '2019-06-13 08:52:21'),
(5, 8, 'Notice', 'Undefined variable: session', 'C:\\xampp\\htdocs\\mentor\\application\\controllers\\Home.php', 43, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/75.0.3770.80 Safari/537.36', '::1', '2019-06-13 08:52:47'),
(6, 8, 'Notice', 'Undefined variable: session', 'C:\\xampp\\htdocs\\mentor\\application\\controllers\\Home.php', 43, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/75.0.3770.80 Safari/537.36', '::1', '2019-06-13 08:57:56');

-- --------------------------------------------------------

--
-- Table structure for table `tblassesmenttype`
--

CREATE TABLE `tblassesmenttype` (
  `AssesmentTypeId` int(11) NOT NULL,
  `StreamTypeId` int(11) NOT NULL,
  `ProgramId` int(11) NOT NULL,
  `AssesmentName` varchar(200) NOT NULL,
  `IsActive` int(1) NOT NULL,
  `CreatedBy` int(11) NOT NULL,
  `CreatedOn` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `UpdatedBy` int(11) NOT NULL,
  `UpdatedOn` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblassesmenttype`
--

INSERT INTO `tblassesmenttype` (`AssesmentTypeId`, `StreamTypeId`, `ProgramId`, `AssesmentName`, `IsActive`, `CreatedBy`, `CreatedOn`, `UpdatedBy`, `UpdatedOn`) VALUES
(1, 1, 1, 'ec ec ecss', 1, 1, '2019-06-10 07:49:22', 0, '2019-06-10 07:49:22'),
(2, 1, 1, 'ec ec ec', 0, 1, '2019-06-10 07:49:28', 0, '2019-06-10 07:49:28'),
(5, 1, 1, 'Aptitude', 1, 1, '2019-06-12 09:09:52', 0, '2019-06-12 09:09:52');

-- --------------------------------------------------------

--
-- Table structure for table `tblblogs`
--

CREATE TABLE `tblblogs` (
  `BlogId` int(11) NOT NULL,
  `FirstName` varchar(100) NOT NULL,
  `UserImage` varchar(100) NOT NULL,
  `BlogTitle` varchar(200) NOT NULL,
  `BlogImage` varchar(100) NOT NULL,
  `BlogDescription` text NOT NULL,
  `IsActive` int(1) NOT NULL,
  `CreatedBy` int(11) NOT NULL,
  `CreatedOn` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `UpdatedBy` int(11) NOT NULL,
  `UpdatedOn` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblblogs`
--

INSERT INTO `tblblogs` (`BlogId`, `FirstName`, `UserImage`, `BlogTitle`, `BlogImage`, `BlogDescription`, `IsActive`, `CreatedBy`, `CreatedOn`, `UpdatedBy`, `UpdatedOn`) VALUES
(1, 'Mitesh', 'mitjjjsssss', 'ggggg', 'kkkkkkkkkkkkkkkkk', '<p>hhhhhhhhhhhhhhhhhhhh</p>\r\n', 0, 1, '2019-06-11 11:11:11', 0, '2019-06-11 11:11:11'),
(2, 'Mitesh', 'mitjjjsssss', 'deffafafcaf', '1.jpg', '<p>hhhhhhhhhhrrrrrrddddddddddd</p>\r\n', 1, 1, '2019-06-11 11:48:04', 0, '2019-06-11 11:48:04'),
(3, 'Mitesh', '3.jpg', 'mmmm', '5.jpg', '<p>kkkkkkkkkkk</p>\r\n', 1, 1, '2019-06-11 12:19:48', 0, '2019-06-11 12:19:48');

-- --------------------------------------------------------

--
-- Table structure for table `tblcontact`
--

CREATE TABLE `tblcontact` (
  `ContactId` int(11) NOT NULL,
  `FirstName` varchar(100) NOT NULL,
  `LastName` varchar(100) NOT NULL,
  `EmailAddress` varchar(100) NOT NULL,
  `MobileNumber` varchar(13) NOT NULL,
  `Message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tblgraduation`
--

CREATE TABLE `tblgraduation` (
  `EducationId` int(11) NOT NULL,
  `UserId` int(11) DEFAULT NULL,
  `EducationName` varchar(200) NOT NULL,
  `UnivesityName` varchar(100) NOT NULL,
  `ClassStream` varchar(100) NOT NULL,
  `Course` varchar(100) DEFAULT NULL,
  `YearofGraduation` varchar(10) NOT NULL,
  `IsActive` int(1) NOT NULL,
  `CreatedBy` int(11) NOT NULL,
  `CreatedOn` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `UpdatedBy` int(11) NOT NULL,
  `UpdatedOn` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tblgraduationsubject`
--

CREATE TABLE `tblgraduationsubject` (
  `EducationSubjectId` int(11) NOT NULL,
  `UserId` int(11) DEFAULT NULL,
  `EducationSubjectName` varchar(100) DEFAULT NULL,
  `SubjectCgpa` varchar(50) DEFAULT NULL,
  `MarksheetImage` varchar(100) DEFAULT NULL,
  `IsActive` int(1) NOT NULL,
  `CreatedBy` int(11) NOT NULL,
  `CreatedOn` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `UpdatedBy` int(11) NOT NULL,
  `UpdatedOn` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tblprogramtype`
--

CREATE TABLE `tblprogramtype` (
  `ProgramId` int(11) NOT NULL,
  `UserId` int(11) DEFAULT NULL,
  `StreamTypeId` int(11) NOT NULL,
  `ProgramName` varchar(200) NOT NULL,
  `ProgramDescription` text NOT NULL,
  `ProgramPrice` float(7,2) NOT NULL,
  `ProgramImage` varchar(100) DEFAULT NULL,
  `IsActive` int(1) NOT NULL,
  `CreatedBy` int(11) NOT NULL,
  `CreatedOn` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `UpdatedBy` int(11) NOT NULL,
  `UpdatedOn` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblprogramtype`
--

INSERT INTO `tblprogramtype` (`ProgramId`, `UserId`, `StreamTypeId`, `ProgramName`, `ProgramDescription`, `ProgramPrice`, `ProgramImage`, `IsActive`, `CreatedBy`, `CreatedOn`, `UpdatedBy`, `UpdatedOn`) VALUES
(1, NULL, 1, 'EC computer', '<p>EC EC EC yy</p>\r\n', 88.00, NULL, 0, 1, '2019-06-10 06:49:58', 0, '2019-06-10 06:49:58');

-- --------------------------------------------------------

--
-- Table structure for table `tblquestion`
--

CREATE TABLE `tblquestion` (
  `QuestionId` int(11) NOT NULL,
  `AssesmentTypeId` int(11) DEFAULT NULL,
  `QuestionImageId` int(11) DEFAULT NULL,
  `QuestionName` text NOT NULL,
  `IsActive` int(1) NOT NULL,
  `CreatedBy` int(11) NOT NULL,
  `CreatedOn` timestamp NULL DEFAULT NULL,
  `UpdatedBy` int(111) NOT NULL,
  `UpdatedOn` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblquestion`
--

INSERT INTO `tblquestion` (`QuestionId`, `AssesmentTypeId`, `QuestionImageId`, `QuestionName`, `IsActive`, `CreatedBy`, `CreatedOn`, `UpdatedBy`, `UpdatedOn`) VALUES
(1, 1, NULL, 'mitesh', 1, 1, '2019-06-10 11:23:23', 1, '2019-06-10 11:23:23'),
(5, 1, NULL, 'mitesh', 0, 1, '2019-06-11 04:11:24', 0, '2019-06-11 04:11:24');

-- --------------------------------------------------------

--
-- Table structure for table `tblquestionanswer`
--

CREATE TABLE `tblquestionanswer` (
  `QuestionAnswerId` int(11) NOT NULL,
  `QuestionId` int(11) NOT NULL,
  `QuestionAnswer` varchar(300) NOT NULL,
  `QuestionAnswerRateId` int(11) NOT NULL,
  `IsActive` int(1) NOT NULL,
  `CreatedBy` int(11) NOT NULL,
  `CreatedOn` timestamp NULL DEFAULT NULL,
  `UpdatedBy` int(11) NOT NULL,
  `UpdatedOn` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblquestionanswer`
--

INSERT INTO `tblquestionanswer` (`QuestionAnswerId`, `QuestionId`, `QuestionAnswer`, `QuestionAnswerRateId`, `IsActive`, `CreatedBy`, `CreatedOn`, `UpdatedBy`, `UpdatedOn`) VALUES
(1, 1, 'goodsss', 1, 1, 1, '2019-06-11 05:45:25', 1, '2019-06-11 05:45:25'),
(2, 1, 'very good', 3, 1, 1, '2019-06-11 05:45:25', 1, '2019-06-11 05:45:25'),
(5, 5, 'yyyyyyyyyy', 3, 1, 1, '2019-06-11 06:37:49', 0, '2019-06-11 06:37:49');

-- --------------------------------------------------------

--
-- Table structure for table `tblquestionanswerrate`
--

CREATE TABLE `tblquestionanswerrate` (
  `QuestionAnswerRateId` int(11) NOT NULL,
  `AnswerRate` float(7,2) NOT NULL,
  `IsActive` int(1) NOT NULL,
  `CreatedBy` int(11) NOT NULL,
  `CreatedOn` timestamp NULL DEFAULT NULL,
  `UpdatedBy` int(11) NOT NULL,
  `UpdatedOn` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblquestionanswerrate`
--

INSERT INTO `tblquestionanswerrate` (`QuestionAnswerRateId`, `AnswerRate`, `IsActive`, `CreatedBy`, `CreatedOn`, `UpdatedBy`, `UpdatedOn`) VALUES
(1, 7.20, 1, 1, '2019-06-10 09:35:24', 0, '2019-06-10 09:35:24'),
(3, 8.20, 1, 1, '2019-06-10 09:48:41', 0, '2019-06-10 09:48:41');

-- --------------------------------------------------------

--
-- Table structure for table `tblquestionpicture`
--

CREATE TABLE `tblquestionpicture` (
  `QuestionImageId` int(11) NOT NULL,
  `AssesmentTypeId` int(11) DEFAULT NULL,
  `QuestionImageType` varchar(100) DEFAULT NULL,
  `QuestionImageName` varchar(300) NOT NULL,
  `IsActive` int(1) NOT NULL,
  `CreatedBy` int(11) NOT NULL,
  `CreatedOn` timestamp NULL DEFAULT NULL,
  `UpdatedBy` int(11) NOT NULL,
  `UpdatedOn` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblquestionpicture`
--

INSERT INTO `tblquestionpicture` (`QuestionImageId`, `AssesmentTypeId`, `QuestionImageType`, `QuestionImageName`, `IsActive`, `CreatedBy`, `CreatedOn`, `UpdatedBy`, `UpdatedOn`) VALUES
(1, NULL, '', '', 0, 1, '2019-06-10 10:18:06', 0, '2019-06-10 10:18:06');

-- --------------------------------------------------------

--
-- Table structure for table `tblschedule`
--

CREATE TABLE `tblschedule` (
  `ScheduleId` int(11) NOT NULL,
  `UserId` int(11) NOT NULL,
  `ScheduleDate` date NOT NULL,
  `ScheduleTime` varchar(50) NOT NULL,
  `MobileNumber` varchar(13) NOT NULL,
  `IsActive` int(1) NOT NULL,
  `CreatedBy` int(11) NOT NULL,
  `CreatedOn` timestamp NULL DEFAULT NULL,
  `UpdatedBy` int(11) NOT NULL,
  `UpdatedOn` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tblsessionconvesation`
--

CREATE TABLE `tblsessionconvesation` (
  `CoversationId` int(11) NOT NULL,
  `UserId` int(11) DEFAULT NULL,
  `CoversationDescription` text NOT NULL,
  `IsActive` int(1) NOT NULL,
  `CreatedBy` int(11) NOT NULL,
  `CreatedOn` timestamp NULL DEFAULT NULL,
  `UpdatedBy` int(11) NOT NULL,
  `UpdatedOn` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tblsessionsuggetion`
--

CREATE TABLE `tblsessionsuggetion` (
  `SessionSuggestionId` int(11) NOT NULL,
  `UserId` int(11) DEFAULT NULL,
  `SuggestionName` varchar(200) NOT NULL,
  `SuggestionDescription` text NOT NULL,
  `IsActive` int(1) NOT NULL,
  `CreatedBy` int(11) NOT NULL,
  `CreatedOn` timestamp NULL DEFAULT NULL,
  `UpdatedBy` int(11) NOT NULL,
  `UpdatedOn` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tblstandard`
--

CREATE TABLE `tblstandard` (
  `StandardId` int(11) NOT NULL,
  `Standard` varchar(100) NOT NULL,
  `IsActive` enum('0','1') NOT NULL DEFAULT '1',
  `CreatedBy` int(11) NOT NULL,
  `CreatedOn` timestamp NULL DEFAULT NULL,
  `UpdatedBy` int(11) NOT NULL,
  `UpdatedOn` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblstandard`
--

INSERT INTO `tblstandard` (`StandardId`, `Standard`, `IsActive`, `CreatedBy`, `CreatedOn`, `UpdatedBy`, `UpdatedOn`) VALUES
(1, '12', '0', 1, '2019-06-10 08:59:10', 0, '2019-06-10 08:59:10');

-- --------------------------------------------------------

--
-- Table structure for table `tblstreamtype`
--

CREATE TABLE `tblstreamtype` (
  `StreamTypeId` int(11) NOT NULL,
  `StreamName` varchar(200) NOT NULL,
  `IsActive` int(1) NOT NULL,
  `CreatedBy` int(11) NOT NULL,
  `CreatedOn` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `UpdatedBy` int(11) NOT NULL,
  `UpdatedOn` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblstreamtype`
--

INSERT INTO `tblstreamtype` (`StreamTypeId`, `StreamName`, `IsActive`, `CreatedBy`, `CreatedOn`, `UpdatedBy`, `UpdatedOn`) VALUES
(1, 'Program', 1, 1, '2019-06-10 06:46:05', 0, '2019-06-10 06:46:05');

-- --------------------------------------------------------

--
-- Table structure for table `tbluser`
--

CREATE TABLE `tbluser` (
  `UserId` int(11) NOT NULL,
  `RoleId` int(1) DEFAULT NULL COMMENT 'Admin="1",User="2"',
  `StreamId` int(11) NOT NULL,
  `FirstName` varchar(100) NOT NULL,
  `LastName` varchar(100) NOT NULL,
  `EmailAddress` varchar(100) NOT NULL,
  `Password` varchar(100) NOT NULL,
  `PhoneNumber` varchar(13) NOT NULL,
  `Address` varchar(400) NOT NULL,
  `ProfileImage` varchar(100) DEFAULT NULL,
  `Gender` varchar(6) NOT NULL,
  `City` varchar(100) NOT NULL,
  `ResetPasswordCode` varchar(20) DEFAULT NULL,
  `IsActive` int(1) NOT NULL,
  `CreatedBy` int(11) NOT NULL,
  `CreatedOn` timestamp NULL DEFAULT NULL,
  `UpdatedBy` int(11) NOT NULL,
  `UpdatedOn` timestamp NULL DEFAULT NULL,
  `oauth_provider` enum('','facebook','google') DEFAULT NULL,
  `oauth_uid` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbluser`
--

INSERT INTO `tbluser` (`UserId`, `RoleId`, `StreamId`, `FirstName`, `LastName`, `EmailAddress`, `Password`, `PhoneNumber`, `Address`, `ProfileImage`, `Gender`, `City`, `ResetPasswordCode`, `IsActive`, `CreatedBy`, `CreatedOn`, `UpdatedBy`, `UpdatedOn`, `oauth_provider`, `oauth_uid`) VALUES
(1, 1, 1, 'Mitesh', 'Patel', 'mitnp16@gmail.com', '12345678', '12345678', 'anand', NULL, 'male', 'anand', 'reer', 1, 1, '2019-06-13 08:27:57', 1, '2019-06-13 08:27:57', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbluseranswer`
--

CREATE TABLE `tbluseranswer` (
  `UserAnswerId` int(11) NOT NULL,
  `UserId` int(11) NOT NULL,
  `QuestionId` int(11) NOT NULL,
  `QuestionAnswerId` int(11) NOT NULL,
  `IsActive` int(1) NOT NULL,
  `CreatedBy` int(11) NOT NULL,
  `CreatedOn` timestamp NULL DEFAULT NULL,
  `UpdatedBy` int(11) NOT NULL,
  `UpdatedOn` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbluserfamilydetail`
--

CREATE TABLE `tbluserfamilydetail` (
  `UserFamilyId` int(11) NOT NULL,
  `UserId` int(11) DEFAULT NULL,
  `FatherName` varchar(100) NOT NULL,
  `FatherProfession` varchar(100) NOT NULL,
  `MotherName` varchar(100) NOT NULL,
  `MotherProfession` varchar(100) NOT NULL,
  `IsActive` int(1) NOT NULL,
  `CreatedBy` int(11) NOT NULL,
  `CreatedOn` timestamp NULL DEFAULT NULL,
  `UpdatedBy` int(11) NOT NULL,
  `UpdatedOn` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbluserrole`
--

CREATE TABLE `tbluserrole` (
  `RoleId` int(11) NOT NULL,
  `RoleName` varchar(100) NOT NULL,
  `IsActive` int(1) NOT NULL,
  `CreatedBy` int(11) NOT NULL,
  `CreatedOn` timestamp NULL DEFAULT NULL,
  `UpdatedBy` int(11) NOT NULL,
  `UpdatedOn` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbluserrole`
--

INSERT INTO `tbluserrole` (`RoleId`, `RoleName`, `IsActive`, `CreatedBy`, `CreatedOn`, `UpdatedBy`, `UpdatedOn`) VALUES
(1, 'Admin', 1, 1, '2019-06-10 05:50:51', 0, '2019-06-10 05:50:51');

-- --------------------------------------------------------

--
-- Table structure for table `tblusersession`
--

CREATE TABLE `tblusersession` (
  `UserSessionId` int(11) NOT NULL,
  `stream_id` int(11) NOT NULL,
  `standard_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `Usersession_name` varchar(255) NOT NULL,
  `StartDate` date NOT NULL,
  `Timeing` time NOT NULL,
  `location` varchar(255) NOT NULL,
  `IsActive` int(1) NOT NULL,
  `status` enum('Pending','Complete','Reshedule') NOT NULL,
  `CreatedBy` int(11) NOT NULL,
  `CreatedOn` timestamp NULL DEFAULT NULL,
  `UpdatedBy` int(11) NOT NULL,
  `UpdatedOn` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblusersession`
--

INSERT INTO `tblusersession` (`UserSessionId`, `stream_id`, `standard_id`, `user_id`, `Usersession_name`, `StartDate`, `Timeing`, `location`, `IsActive`, `status`, `CreatedBy`, `CreatedOn`, `UpdatedBy`, `UpdatedOn`) VALUES
(2, 2, 1, 1, '1', '2019-06-13', '02:56:00', 'Surat', 1, 'Reshedule', 0, '2019-06-13 04:00:00', 0, '2019-06-13 06:56:51');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `logs`
--
ALTER TABLE `logs`
  ADD PRIMARY KEY (`id`,`ip_address`,`user_agent`);

--
-- Indexes for table `tblassesmenttype`
--
ALTER TABLE `tblassesmenttype`
  ADD PRIMARY KEY (`AssesmentTypeId`),
  ADD KEY `StreamTypeId` (`StreamTypeId`),
  ADD KEY `ProgramId` (`ProgramId`);

--
-- Indexes for table `tblblogs`
--
ALTER TABLE `tblblogs`
  ADD PRIMARY KEY (`BlogId`);

--
-- Indexes for table `tblcontact`
--
ALTER TABLE `tblcontact`
  ADD PRIMARY KEY (`ContactId`);

--
-- Indexes for table `tblgraduation`
--
ALTER TABLE `tblgraduation`
  ADD PRIMARY KEY (`EducationId`);

--
-- Indexes for table `tblgraduationsubject`
--
ALTER TABLE `tblgraduationsubject`
  ADD PRIMARY KEY (`EducationSubjectId`);

--
-- Indexes for table `tblprogramtype`
--
ALTER TABLE `tblprogramtype`
  ADD PRIMARY KEY (`ProgramId`),
  ADD KEY `UserId` (`UserId`),
  ADD KEY `StreamTypeId` (`StreamTypeId`);

--
-- Indexes for table `tblquestion`
--
ALTER TABLE `tblquestion`
  ADD PRIMARY KEY (`QuestionId`),
  ADD KEY `AssesmentTypeId` (`AssesmentTypeId`),
  ADD KEY `AssesmentTypeId_2` (`AssesmentTypeId`),
  ADD KEY `QuestionImageId` (`QuestionImageId`);

--
-- Indexes for table `tblquestionanswer`
--
ALTER TABLE `tblquestionanswer`
  ADD PRIMARY KEY (`QuestionAnswerId`),
  ADD KEY `QuestionId` (`QuestionId`),
  ADD KEY `QuestionAnswerRateId` (`QuestionAnswerRateId`);

--
-- Indexes for table `tblquestionanswerrate`
--
ALTER TABLE `tblquestionanswerrate`
  ADD PRIMARY KEY (`QuestionAnswerRateId`);

--
-- Indexes for table `tblquestionpicture`
--
ALTER TABLE `tblquestionpicture`
  ADD PRIMARY KEY (`QuestionImageId`);

--
-- Indexes for table `tblschedule`
--
ALTER TABLE `tblschedule`
  ADD PRIMARY KEY (`ScheduleId`);

--
-- Indexes for table `tblsessionconvesation`
--
ALTER TABLE `tblsessionconvesation`
  ADD PRIMARY KEY (`CoversationId`);

--
-- Indexes for table `tblsessionsuggetion`
--
ALTER TABLE `tblsessionsuggetion`
  ADD PRIMARY KEY (`SessionSuggestionId`);

--
-- Indexes for table `tblstandard`
--
ALTER TABLE `tblstandard`
  ADD PRIMARY KEY (`StandardId`);

--
-- Indexes for table `tblstreamtype`
--
ALTER TABLE `tblstreamtype`
  ADD PRIMARY KEY (`StreamTypeId`);

--
-- Indexes for table `tbluser`
--
ALTER TABLE `tbluser`
  ADD PRIMARY KEY (`UserId`),
  ADD KEY `StreamId` (`StreamId`);

--
-- Indexes for table `tbluseranswer`
--
ALTER TABLE `tbluseranswer`
  ADD PRIMARY KEY (`UserAnswerId`),
  ADD KEY `UserId` (`UserId`),
  ADD KEY `QuestionId` (`QuestionId`),
  ADD KEY `QuestionAnswerId` (`QuestionAnswerId`),
  ADD KEY `QuestionAnswerId_2` (`QuestionAnswerId`);

--
-- Indexes for table `tbluserfamilydetail`
--
ALTER TABLE `tbluserfamilydetail`
  ADD PRIMARY KEY (`UserFamilyId`);

--
-- Indexes for table `tbluserrole`
--
ALTER TABLE `tbluserrole`
  ADD PRIMARY KEY (`RoleId`);

--
-- Indexes for table `tblusersession`
--
ALTER TABLE `tblusersession`
  ADD PRIMARY KEY (`UserSessionId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `logs`
--
ALTER TABLE `logs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tblassesmenttype`
--
ALTER TABLE `tblassesmenttype`
  MODIFY `AssesmentTypeId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tblblogs`
--
ALTER TABLE `tblblogs`
  MODIFY `BlogId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tblcontact`
--
ALTER TABLE `tblcontact`
  MODIFY `ContactId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tblgraduation`
--
ALTER TABLE `tblgraduation`
  MODIFY `EducationId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tblgraduationsubject`
--
ALTER TABLE `tblgraduationsubject`
  MODIFY `EducationSubjectId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tblprogramtype`
--
ALTER TABLE `tblprogramtype`
  MODIFY `ProgramId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tblquestion`
--
ALTER TABLE `tblquestion`
  MODIFY `QuestionId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tblquestionanswer`
--
ALTER TABLE `tblquestionanswer`
  MODIFY `QuestionAnswerId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tblquestionanswerrate`
--
ALTER TABLE `tblquestionanswerrate`
  MODIFY `QuestionAnswerRateId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tblquestionpicture`
--
ALTER TABLE `tblquestionpicture`
  MODIFY `QuestionImageId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tblschedule`
--
ALTER TABLE `tblschedule`
  MODIFY `ScheduleId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tblsessionconvesation`
--
ALTER TABLE `tblsessionconvesation`
  MODIFY `CoversationId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tblsessionsuggetion`
--
ALTER TABLE `tblsessionsuggetion`
  MODIFY `SessionSuggestionId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tblstandard`
--
ALTER TABLE `tblstandard`
  MODIFY `StandardId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tblstreamtype`
--
ALTER TABLE `tblstreamtype`
  MODIFY `StreamTypeId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbluser`
--
ALTER TABLE `tbluser`
  MODIFY `UserId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbluseranswer`
--
ALTER TABLE `tbluseranswer`
  MODIFY `UserAnswerId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbluserfamilydetail`
--
ALTER TABLE `tbluserfamilydetail`
  MODIFY `UserFamilyId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbluserrole`
--
ALTER TABLE `tbluserrole`
  MODIFY `RoleId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tblusersession`
--
ALTER TABLE `tblusersession`
  MODIFY `UserSessionId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tblassesmenttype`
--
ALTER TABLE `tblassesmenttype`
  ADD CONSTRAINT `tblassesmenttype_ibfk_1` FOREIGN KEY (`StreamTypeId`) REFERENCES `tblstreamtype` (`StreamTypeId`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tblassesmenttype_ibfk_2` FOREIGN KEY (`ProgramId`) REFERENCES `tblprogramtype` (`ProgramId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tblprogramtype`
--
ALTER TABLE `tblprogramtype`
  ADD CONSTRAINT `tblprogramtype_ibfk_1` FOREIGN KEY (`UserId`) REFERENCES `tbluser` (`UserId`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tblprogramtype_ibfk_2` FOREIGN KEY (`StreamTypeId`) REFERENCES `tblstreamtype` (`StreamTypeId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tblquestion`
--
ALTER TABLE `tblquestion`
  ADD CONSTRAINT `tblquestion_ibfk_1` FOREIGN KEY (`AssesmentTypeId`) REFERENCES `tblassesmenttype` (`AssesmentTypeId`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tblquestion_ibfk_2` FOREIGN KEY (`QuestionImageId`) REFERENCES `tblquestionpicture` (`QuestionImageId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tblquestionanswer`
--
ALTER TABLE `tblquestionanswer`
  ADD CONSTRAINT `tblquestionanswer_ibfk_1` FOREIGN KEY (`QuestionId`) REFERENCES `tblquestion` (`QuestionId`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tblquestionanswer_ibfk_2` FOREIGN KEY (`QuestionAnswerRateId`) REFERENCES `tblquestionanswerrate` (`QuestionAnswerRateId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbluser`
--
ALTER TABLE `tbluser`
  ADD CONSTRAINT `tbluser_ibfk_1` FOREIGN KEY (`StreamId`) REFERENCES `tblstreamtype` (`StreamTypeId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbluseranswer`
--
ALTER TABLE `tbluseranswer`
  ADD CONSTRAINT `tbluseranswer_ibfk_1` FOREIGN KEY (`UserId`) REFERENCES `tbluser` (`UserId`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbluseranswer_ibfk_2` FOREIGN KEY (`QuestionId`) REFERENCES `tblquestion` (`QuestionId`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbluseranswer_ibfk_3` FOREIGN KEY (`QuestionAnswerId`) REFERENCES `tblquestionanswer` (`QuestionAnswerId`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
