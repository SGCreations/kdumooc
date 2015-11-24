-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 24, 2015 at 05:55 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `kdumooc`
--

-- --------------------------------------------------------

--
-- Stand-in structure for view `allstudents`
--
CREATE TABLE IF NOT EXISTS `allstudents` (
`idSTUDENT` int(11)
,`first_name` varchar(100)
,`last_name` varchar(100)
,`registration_no` varchar(45)
,`dob` date
,`gender` varchar(10)
,`nic` varchar(12)
,`email` varchar(200)
,`username` varchar(200)
,`password` varchar(200)
,`deleted` tinyint(1)
,`activated` tinyint(1)
,`verified` tinyint(1)
);
-- --------------------------------------------------------

--
-- Table structure for table `answer`
--

CREATE TABLE IF NOT EXISTS `answer` (
  `idANSWER` int(11) NOT NULL AUTO_INCREMENT,
  `answer` longtext COLLATE utf8_unicode_ci,
  `QUESTIONBANK_idQUESTIONBANK` int(11) NOT NULL,
  `deleted` tinyint(1) DEFAULT NULL,
  `correct_answer` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`idANSWER`),
  KEY `fk_ANSWER_QUESTIONBANK1_idx` (`QUESTIONBANK_idQUESTIONBANK`),
  KEY `PIndex` (`idANSWER`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=16 ;

--
-- Dumping data for table `answer`
--

INSERT INTO `answer` (`idANSWER`, `answer`, `QUESTIONBANK_idQUESTIONBANK`, `deleted`, `correct_answer`) VALUES
(1, 'If Bill is Tom’s Brother, then Tom is Jane’s father and Jane is not Bill’s niece.', 1, 0, 0),
(4, 'sdfsd', 6, 0, 0),
(5, 'sfsd', 6, 0, 0),
(6, 'dsfsdgs', 6, 0, 0),
(7, 'erew', 6, 0, 1),
(8, 'If n is not divisible by 30 then n is divisible by 2 or divisible by 3 or divisible by 5.', 7, 0, 0),
(9, 'If n is not divisible by 30 then n is not divisible by 2 or not divisible by 3 or not divisible by 5.', 7, 0, 0),
(10, 'If n is divisible by 2 and divisible by 3 and divisible by 5 then n is divisible by 30.', 7, 0, 0),
(11, 'If n is not divisible by 2 or not divisible by 3 or not divisible by 5 then n is not divisible by 30.', 7, 0, 0),
(12, 'There exists a person who is a computer scientist and who knows both discrete math and Java or there exists a person who is a mathematician and who knows both discrete math and Java.', 8, 0, 0),
(13, 'There exists a person who is a computer scientist or there exists a person who is a mathematician who knows discrete math or who knows Java.', 8, 0, 1),
(14, 'There exists a person who is a computer scientist and who knows both discrete math and Java or there exists a mathematician who knows both discrete math and Java.', 8, 0, 0),
(15, 'There exists a computer scientist who knows both discrete math and Java or there exists a person who is a mathematician who knows both discrete math and Java.', 8, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `assignment`
--

CREATE TABLE IF NOT EXISTS `assignment` (
  `idASSIGNMENT` int(11) NOT NULL,
  `STUDENT_idSTUDENT` int(11) NOT NULL,
  `timestamp` datetime DEFAULT NULL,
  PRIMARY KEY (`idASSIGNMENT`),
  KEY `fk_ASSIGNMENT_STUDENT1_idx` (`STUDENT_idSTUDENT`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `attempt`
--

CREATE TABLE IF NOT EXISTS `attempt` (
  `idATTEMPT` int(11) NOT NULL,
  `validity` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ASSIGNMENT_idASSIGNMENT` int(11) NOT NULL,
  `QUESTIONBANK_idQUESTIONBANK` int(11) NOT NULL,
  PRIMARY KEY (`idATTEMPT`),
  KEY `fk_ATTEMPT_ASSIGNMENT1_idx` (`ASSIGNMENT_idASSIGNMENT`),
  KEY `fk_ATTEMPT_QUESTIONBANK1_idx` (`QUESTIONBANK_idQUESTIONBANK`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `content`
--

CREATE TABLE IF NOT EXISTS `content` (
  `idCONTENT` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `priority` int(11) DEFAULT NULL,
  `deleted` tinyint(1) DEFAULT NULL,
  `MODULE_idMODULE` int(11) NOT NULL,
  PRIMARY KEY (`idCONTENT`),
  KEY `fk_CONTENT_MODULE1_idx` (`MODULE_idMODULE`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE IF NOT EXISTS `course` (
  `idCOURSE` int(11) NOT NULL AUTO_INCREMENT,
  `no_of_students` int(11) DEFAULT NULL,
  `category` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `duration` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `title` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `LECTURER_idLECTURER` int(11) NOT NULL,
  `deleted` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`idCOURSE`),
  KEY `fk_COURSE_LECTURER1_idx` (`LECTURER_idLECTURER`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=7 ;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`idCOURSE`, `no_of_students`, `category`, `duration`, `title`, `LECTURER_idLECTURER`, `deleted`) VALUES
(1, 40, 'Mathematics', '6', 'Discrete Mathematics 1', 1, 0),
(2, 40, 'Mathematics', '6', 'Discrete Mathematics 2', 1, 0),
(3, 40, 'Mathematics', '6', 'Discrete Mathematics 1', 1, 1),
(4, 40, 'Mathematics', '6', 'Discrete Mathematics 2', 1, 1),
(5, 40, 'Mathematics', '6', 'Discrete Mathematics 2', 1, 1),
(6, 40, 'Mathematics', '6', 'Discrete Mathematics 1', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `forumanswer`
--

CREATE TABLE IF NOT EXISTS `forumanswer` (
  `idFORUMANSWER` int(11) NOT NULL AUTO_INCREMENT,
  `timestamp` timestamp NULL DEFAULT NULL,
  `replier_id` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `rating` int(11) DEFAULT NULL,
  `deleted` tinyint(1) DEFAULT NULL,
  `FORUMQUESTION_idFORUMQUESTION` int(11) NOT NULL,
  PRIMARY KEY (`idFORUMANSWER`),
  KEY `fk_FORUMANSWER_FORUMQUESTION1_idx` (`FORUMQUESTION_idFORUMQUESTION`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `forumquestion`
--

CREATE TABLE IF NOT EXISTS `forumquestion` (
  `idFORUMQUESTION` int(11) NOT NULL AUTO_INCREMENT,
  `timestamp` timestamp NULL DEFAULT NULL,
  `inquirer_id` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `rating` int(11) DEFAULT NULL,
  `deleted` tinyint(1) DEFAULT NULL,
  `COURSE_idCOURSE` int(11) NOT NULL,
  PRIMARY KEY (`idFORUMQUESTION`,`COURSE_idCOURSE`),
  KEY `fk_FORUMQUESTION_COURSE1_idx` (`COURSE_idCOURSE`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `lecturer`
--

CREATE TABLE IF NOT EXISTS `lecturer` (
  `idLECTURER` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `last_name` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `qualifications` varchar(245) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nic` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `gender` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `username` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `deleted` tinyint(1) DEFAULT NULL,
  `activated` tinyint(1) NOT NULL,
  `verified` tinyint(1) NOT NULL,
  PRIMARY KEY (`idLECTURER`,`nic`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=7 ;

--
-- Dumping data for table `lecturer`
--

INSERT INTO `lecturer` (`idLECTURER`, `first_name`, `last_name`, `qualifications`, `nic`, `gender`, `email`, `username`, `password`, `deleted`, `activated`, `verified`) VALUES
(1, 'Neranjaka', 'Jayarathne', 'MSc. in Applied Electronics from the University of Colombo and \r\nBSc. (Hons) Special Degree in Business, Finance and Computational Mathematics.', '869586958V', 'Male', 'neranjake@gmail.com', 'neranjake@gmail.com', '594f803b380a41396ed63dca39503542', 0, 1, 1),
(2, 'Sidath', 'Gajanayaka', '', '942890370v', 'Male', 'sinhalokaya@gmail.com', 'sinhalokaya@gmail.co', '594f803b380a41396ed63dca39503542', 0, 0, 0),
(3, 'Tharindu', 'Weerawardane', 'BSc Eng (Moratuwa), MSc (Bremen, Germany),PhD (Bremen,Germany)\r\nDean -  Faculty of Engineering', '856568452v', 'Male', 'weere@gmail.com', 'weere@gmail.com', '594f803b380a41396ed63dca39503542', 0, 0, 0),
(4, 'Saman', 'Wijethunga', 'BSc', '942890370v', 'Male', 'scgcreations@gmail.com', 'scgcreations@gmail.c', '594f803b380a41396ed63dca39503542', 0, 0, 0),
(5, 'Maheshi', 'Ranaweera', '', '869586958V', 'Female', '4x8x12@gmail.com', '4x8x12@gmail.com', '594f803b380a41396ed63dca39503542', 0, 0, 0),
(6, 'Sidath', 'Gajanayaka', 'Bsc', '942890378v', 'Male', 'sgcreationsdigital@yahoo.co.uk', 'sgcreationsdigital@y', '594f803b380a41396ed63dca39503542', 0, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `module`
--

CREATE TABLE IF NOT EXISTS `module` (
  `idMODULE` int(11) NOT NULL AUTO_INCREMENT,
  `module_name` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `COURSE_idCOURSE` int(11) NOT NULL,
  `deleted` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`idMODULE`),
  KEY `fk_MODULE_COURSE1_idx` (`COURSE_idCOURSE`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Dumping data for table `module`
--

INSERT INTO `module` (`idMODULE`, `module_name`, `COURSE_idCOURSE`, `deleted`) VALUES
(1, 'The Foundations: Logic and Proofs', 1, 0),
(2, 'Basic Structures: Sets, Functions, Sequences, Sums, and Matrices', 1, 0),
(3, 'Induction and Recursion', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `questionbank`
--

CREATE TABLE IF NOT EXISTS `questionbank` (
  `idQUESTIONBANK` int(11) NOT NULL AUTO_INCREMENT,
  `level` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `type` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `content` longtext COLLATE utf8_unicode_ci,
  `deleted` tinyint(1) DEFAULT NULL,
  `MODULE_idMODULE` int(11) NOT NULL,
  PRIMARY KEY (`idQUESTIONBANK`),
  KEY `fk_QUESTIONBANK_MODULE1_idx` (`MODULE_idMODULE`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=9 ;

--
-- Dumping data for table `questionbank`
--

INSERT INTO `questionbank` (`idQUESTIONBANK`, `level`, `type`, `content`, `deleted`, `MODULE_idMODULE`) VALUES
(1, '2', 'MCQ', 'Consider the statement form p ⇒ q where p =“If Tom is Jane’s father then Jane is Bill’s niece” and q =“Bill is Tom’s brother.” Which of the following statements is equivalent to this statement?', 0, 1),
(6, '3', 'MCQ', 'sdfds', 0, 2),
(7, '1', 'MCQ', 'Consider the statement, “If n is divisible by 30 then n is divisible by 2 and by 3 and by 5.” Which of the following statements is equivalent to this statement?', 0, 1),
(8, '2', 'MCQ', ' Which of the following statements is NOT equivalent to the statement, “There exists either a computer scientist or a mathematician who knows both discrete math and Java.”', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `registers`
--

CREATE TABLE IF NOT EXISTS `registers` (
  `STUDENT_idSTUDENT` int(11) NOT NULL,
  `COURSE_idCOURSE` int(11) NOT NULL,
  `start_date` datetime DEFAULT NULL,
  `end_date` datetime DEFAULT NULL,
  PRIMARY KEY (`STUDENT_idSTUDENT`,`COURSE_idCOURSE`),
  KEY `fk_STUDENT_has_COURSE_COURSE1_idx` (`COURSE_idCOURSE`),
  KEY `fk_STUDENT_has_COURSE_STUDENT_idx` (`STUDENT_idSTUDENT`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE IF NOT EXISTS `student` (
  `idSTUDENT` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `last_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `registration_no` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `dob` date NOT NULL,
  `gender` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nic` varchar(12) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `deleted` tinyint(1) DEFAULT NULL,
  `activated` tinyint(1) NOT NULL,
  `verified` tinyint(1) NOT NULL,
  PRIMARY KEY (`idSTUDENT`,`nic`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=7 ;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`idSTUDENT`, `first_name`, `last_name`, `registration_no`, `dob`, `gender`, `nic`, `email`, `username`, `password`, `deleted`, `activated`, `verified`) VALUES
(1, 'Maheshi', 'Ranaweera', 'S0003', '2015-11-04', 'Female', '869586958V', '4x8x12@gmail.com', '4x8x12@gmail.com', '594f803b380a41396ed63dca39503542', 0, 0, 0),
(2, 'Sidath', 'Gajanayaka', 'sss', '2015-11-06', 'Male', '942890370v', 'amilarnb@gmail.com', 'amilarnb@gmail.com', '594f803b380a41396ed63dca39503542', 0, 1, 0),
(3, 'Sudath', 'Weerasinghe', 'S0002', '1997-11-05', 'Male', '895987456V', 'sudarh@gma.com', 'sudarh@gma.com', '594f803b380a41396ed63dca39503542', 1, 1, 0),
(4, 'Sarinda', 'Gamanayaka', 'S0005', '1994-10-15', 'Male', '942890358V', 'scgcreations@gmail.com', 'scgcreations@gmail.c', '594f803b380a41396ed63dca39503542', 0, 0, 0),
(5, 'Vasantha', 'GajanayakaKankanamalage', 'S0002', '1964-04-17', 'Male', '548569856X', 'vasanthagajanayaka@gmail.com', 'vasanthagajanayaka@g', '594f803b380a41396ed63dca39503542', 0, 1, 0),
(6, 'Saman', 'Wijethunga', 'S0002', '2015-11-17', 'Male', '942890371v', 'sgcreationsdigital@yahoo.co.uk', 'sgcreationsdigital@yahoo.co.uk', '594f803b380a41396ed63dca39503542', 0, 1, 0);

-- --------------------------------------------------------

--
-- Structure for view `allstudents`
--
DROP TABLE IF EXISTS `allstudents`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `allstudents` AS select `student`.`idSTUDENT` AS `idSTUDENT`,`student`.`first_name` AS `first_name`,`student`.`last_name` AS `last_name`,`student`.`registration_no` AS `registration_no`,`student`.`dob` AS `dob`,`student`.`gender` AS `gender`,`student`.`nic` AS `nic`,`student`.`email` AS `email`,`student`.`username` AS `username`,`student`.`password` AS `password`,`student`.`deleted` AS `deleted`,`student`.`activated` AS `activated`,`student`.`verified` AS `verified` from `student`;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `answer`
--
ALTER TABLE `answer`
  ADD CONSTRAINT `fk_ANSWER_QUESTIONBANK1` FOREIGN KEY (`QUESTIONBANK_idQUESTIONBANK`) REFERENCES `questionbank` (`idQUESTIONBANK`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `assignment`
--
ALTER TABLE `assignment`
  ADD CONSTRAINT `fk_ASSIGNMENT_STUDENT1` FOREIGN KEY (`STUDENT_idSTUDENT`) REFERENCES `student` (`idSTUDENT`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `attempt`
--
ALTER TABLE `attempt`
  ADD CONSTRAINT `fk_ATTEMPT_ASSIGNMENT1` FOREIGN KEY (`ASSIGNMENT_idASSIGNMENT`) REFERENCES `assignment` (`idASSIGNMENT`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_ATTEMPT_QUESTIONBANK1` FOREIGN KEY (`QUESTIONBANK_idQUESTIONBANK`) REFERENCES `questionbank` (`idQUESTIONBANK`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `content`
--
ALTER TABLE `content`
  ADD CONSTRAINT `fk_CONTENT_MODULE1` FOREIGN KEY (`MODULE_idMODULE`) REFERENCES `module` (`idMODULE`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `course`
--
ALTER TABLE `course`
  ADD CONSTRAINT `fk_COURSE_LECTURER1` FOREIGN KEY (`LECTURER_idLECTURER`) REFERENCES `lecturer` (`idLECTURER`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `forumanswer`
--
ALTER TABLE `forumanswer`
  ADD CONSTRAINT `fk_FORUMANSWER_FORUMQUESTION1` FOREIGN KEY (`FORUMQUESTION_idFORUMQUESTION`) REFERENCES `forumquestion` (`idFORUMQUESTION`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `forumquestion`
--
ALTER TABLE `forumquestion`
  ADD CONSTRAINT `fk_FORUMQUESTION_COURSE1` FOREIGN KEY (`COURSE_idCOURSE`) REFERENCES `course` (`idCOURSE`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `module`
--
ALTER TABLE `module`
  ADD CONSTRAINT `fk_MODULE_COURSE1` FOREIGN KEY (`COURSE_idCOURSE`) REFERENCES `course` (`idCOURSE`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `questionbank`
--
ALTER TABLE `questionbank`
  ADD CONSTRAINT `fk_QUESTIONBANK_MODULE1` FOREIGN KEY (`MODULE_idMODULE`) REFERENCES `module` (`idMODULE`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `registers`
--
ALTER TABLE `registers`
  ADD CONSTRAINT `fk_STUDENT_has_COURSE_COURSE1` FOREIGN KEY (`COURSE_idCOURSE`) REFERENCES `course` (`idCOURSE`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_STUDENT_has_COURSE_STUDENT` FOREIGN KEY (`STUDENT_idSTUDENT`) REFERENCES `student` (`idSTUDENT`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
