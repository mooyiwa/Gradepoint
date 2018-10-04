-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 02, 2018 at 05:11 PM
-- Server version: 5.7.14
-- PHP Version: 7.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gp_offline`
--

-- --------------------------------------------------------

--
-- Table structure for table `assessment`
--

CREATE TABLE `assessment` (
  `id` int(11) NOT NULL,
  `cate` varchar(200) NOT NULL,
  `school` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `assessment`
--

INSERT INTO `assessment` (`id`, `cate`, `school`) VALUES
(4, 'Psychomotor Skills', 'Ideal Model College'),
(5, 'Affective Domain', 'Ideal Model College');

-- --------------------------------------------------------

--
-- Table structure for table `assessments`
--

CREATE TABLE `assessments` (
  `id` int(11) NOT NULL,
  `cate` varchar(200) NOT NULL,
  `area` varchar(255) NOT NULL,
  `score` varchar(5) NOT NULL,
  `term` varchar(5) NOT NULL,
  `year` varchar(25) NOT NULL,
  `studentID` varchar(200) NOT NULL,
  `teacherID` varchar(200) NOT NULL,
  `school` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `assessments`
--

INSERT INTO `assessments` (`id`, `cate`, `area`, `score`, `term`, `year`, `studentID`, `teacherID`, `school`) VALUES
(9, 'Affective Domain', 'Class Attendance', '4', '1', '2017/2018', 'abu.musa', 'tina.lawal', 'Ideal Model College'),
(10, 'Affective Domain', 'Class Attendance', '5', '1', '2017/2018', 'tona.joseph', 'tina.lawal', 'Ideal Model College'),
(11, 'Affective Domain', 'Health', '4', '1', '2017/2018', 'tona.joseph', 'tina.lawal', 'Ideal Model College'),
(12, 'Affective Domain', 'Iniative', '4', '1', '2017/2018', 'tona.joseph', 'tina.lawal', 'Ideal Model College'),
(13, 'Affective Domain', 'Neatness', '5', '1', '2017/2018', 'tona.joseph', 'tina.lawal', 'Ideal Model College'),
(14, 'Affective Domain', 'Organizational Ability', '3', '1', '2017/2018', 'tona.joseph', 'tina.lawal', 'Ideal Model College'),
(15, 'Affective Domain', 'Politeness', '4', '1', '2017/2018', 'tona.joseph', 'tina.lawal', 'Ideal Model College'),
(16, 'Affective Domain', 'Punctuality', '4', '1', '2017/2018', 'tona.joseph', 'tina.lawal', 'Ideal Model College'),
(17, 'Affective Domain', 'Relationship with Teacher', '5', '1', '2017/2018', 'tona.joseph', 'tina.lawal', 'Ideal Model College'),
(18, 'Affective Domain', 'Responsibility', '4', '1', '2017/2018', 'tona.joseph', 'tina.lawal', 'Ideal Model College'),
(19, 'Affective Domain', 'Spirit of Co-operation', '3', '1', '2017/2018', 'tona.joseph', 'tina.lawal', 'Ideal Model College');

-- --------------------------------------------------------

--
-- Table structure for table `assessment_items`
--

CREATE TABLE `assessment_items` (
  `id` int(11) NOT NULL,
  `cate` varchar(200) NOT NULL,
  `item` varchar(200) NOT NULL,
  `school` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `assessment_items`
--

INSERT INTO `assessment_items` (`id`, `cate`, `item`, `school`) VALUES
(1, 'Affective Domain', 'Class Attendance', 'Ideal Model College'),
(2, 'Affective Domain', 'Neatness', 'Ideal Model College'),
(3, 'Affective Domain', 'Punctuality', 'Ideal Model College'),
(4, 'Affective Domain', 'Responsibility', 'Ideal Model College'),
(5, 'Affective Domain', 'Health', 'Ideal Model College'),
(6, 'Affective Domain', 'Organizational Ability', 'Ideal Model College'),
(7, 'Affective Domain', 'Relationship with Teacher', 'Ideal Model College'),
(8, 'Affective Domain', 'Politeness', 'Ideal Model College'),
(9, 'Affective Domain', 'Spirit of Co-operation', 'Ideal Model College'),
(10, 'Affective Domain', 'Iniative', 'Ideal Model College'),
(11, 'Psychomotor Skills', 'Communication Skills', 'Ideal Model College'),
(12, 'Psychomotor Skills', 'Musical Skills', 'Ideal Model College'),
(13, 'Psychomotor Skills', 'Craft', 'Ideal Model College'),
(14, 'Psychomotor Skills', 'Sports', 'Ideal Model College'),
(15, 'Psychomotor Skills', 'Hardworking', 'Ideal Model College');

-- --------------------------------------------------------

--
-- Table structure for table `banks`
--

CREATE TABLE `banks` (
  `id` int(11) NOT NULL,
  `bank` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `banks`
--

INSERT INTO `banks` (`id`, `bank`) VALUES
(4, 'Zenith');

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `id` int(11) NOT NULL,
  `book_name` varchar(255) NOT NULL,
  `category` varchar(100) NOT NULL,
  `pdf_id` varchar(255) NOT NULL,
  `author_name` varchar(255) NOT NULL,
  `desc` text NOT NULL,
  `school` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`id`, `book_name`, `category`, `pdf_id`, `author_name`, `desc`, `school`) VALUES
(1, 'Grammar Test 01', 'English', 'Grammar Test 01.pdf', 'Bamidele Silas', 'Test of grammar', 'St Joseph\'s Nursery & Primary School'),
(2, 'Grammar Test 02', 'English', 'Grammar Test 02.pdf', 'Bamidele Silas', 'Test of grammar', 'St Joseph\'s Nursery & Primary School'),
(3, 'World Currencies', 'Civic Education', 'World Currencies.pdf', 'Bamidele Silas', 'A list of world currencies.', 'St Joseph\'s Nursery & Primary School'),
(4, 'How a law is passed', 'Civic Education', 'How a law is passd.pdf', 'Mike Bonner, Arthur Meier Schlesinger', 'How a law or bill is passed', 'St Joseph\'s Nursery & Primary School'),
(5, 'How To Do Almost Anything', 'Life Skills', 'How To Do Almost Anything.pdf', 'Chicago Tribune Staff', 'Life Skills', 'St Joseph\'s Nursery & Primary School'),
(6, 'The 30day Abs Challenge', 'Health Education', 'The 30 Day Abs Challenge.pdf', 'Arnel Ricafranca', 'Physical Fitness', 'St Joseph\'s Nursery & Primary School'),
(7, 'React Js', 'Programming', 'React.js Essentials.pdf', 'Artemij F.', 'Front End dev.', 'Tade Schools');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `category` varchar(100) NOT NULL,
  `school` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category`, `school`) VALUES
(1, 'Mathematics', 'St Joseph\'s Nursery & Primary School'),
(2, 'English', 'St Joseph\'s Nursery & Primary School'),
(3, 'Fine Art', 'St Joseph\'s Nursery & Primary School'),
(4, 'Health Education', 'St Joseph\'s Nursery & Primary School'),
(5, 'Civic Education', 'St Joseph\'s Nursery & Primary School'),
(6, 'Phonetics', 'St Joseph\'s Nursery & Primary School'),
(7, 'Literature in English', 'St Joseph\'s Nursery & Primary School'),
(8, 'Q and Verbal Reasoning', 'St Joseph\'s Nursery & Primary School'),
(9, 'P.T.A', 'St Joseph\'s Nursery & Primary School'),
(10, 'Holiday Assignment', 'St Joseph\'s Nursery & Primary School'),
(11, 'Project Work', 'St Joseph\'s Nursery & Primary School'),
(12, 'Life Skills', 'St Joseph\'s Nursery & Primary School'),
(13, 'Biology', 'Tade Schools'),
(14, 'Parenting', 'Tade Schools'),
(15, 'PTA', 'Tade Schools'),
(16, 'Holiday Assignment', 'Tade Schools'),
(17, 'Mathematics', 'Tade Schools'),
(18, 'Programming', 'Tade Schools');

-- --------------------------------------------------------

--
-- Table structure for table `classes`
--

CREATE TABLE `classes` (
  `id` int(11) NOT NULL,
  `class` varchar(100) NOT NULL,
  `year` varchar(100) NOT NULL,
  `classteacher` varchar(200) NOT NULL,
  `school` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `classes`
--

INSERT INTO `classes` (`id`, `class`, `year`, `classteacher`, `school`) VALUES
(1, 'Primary 1 Blue', '2016/2017', 'olugbami.abigail', 'St Joseph\'s Nursery & Primary School'),
(2, 'Primary 1 Brown', '2016/2017', 'bola.amoateng', 'St Joseph\'s Nursery & Primary School'),
(3, 'Primary 1 Green', '2016/2017', 'esther.okoro', 'St Joseph\'s Nursery & Primary School'),
(4, 'Primary 1 Yellow', '2016/2017', 'fadile.sanmi', 'St Joseph\'s Nursery & Primary School'),
(5, 'Primary 2 Blue', '2016/2017', 'wofai.iwara', 'St Joseph\'s Nursery & Primary School'),
(6, 'Primary 2 Brown', '2016/2017', 'olowa.christiana', 'St Joseph\'s Nursery & Primary School'),
(7, 'Primary 2 Green ', '2016/2017', 'toyin.adebayo', 'St Joseph\'s Nursery & Primary School'),
(8, 'Primary 2 Yellow', '2016/2017', 'juliet.oluwole', 'St Joseph\'s Nursery & Primary School'),
(9, 'Primary 3 Blue', '2016/2017', 'adeniyi.adedokun', 'St Joseph\'s Nursery & Primary School'),
(10, 'Primary 3 Brown', '2016/2017', 'agoha.c', 'St Joseph\'s Nursery & Primary School'),
(11, 'Primary 3 Green', '2016/2017', 'ronke.adebiyi', 'St Joseph\'s Nursery & Primary School'),
(12, 'Primary 3 Yellow', '2016/2017', 'okojie.bridget', 'St Joseph\'s Nursery & Primary School'),
(13, 'Primary 4 Blue', '2016/2017', 'bukola.cornelius', 'St Joseph\'s Nursery & Primary School'),
(14, 'Primary 4 Brown', '2016/2017', 'olorunfemi.deborah', 'St Joseph\'s Nursery & Primary School'),
(15, 'Primary 4 Green', '2016/2017', 'david.emmanuel', 'St Joseph\'s Nursery & Primary School'),
(16, 'Primary 4 Yellow', '2016/2017', 'ajayi.titus', 'St Joseph\'s Nursery & Primary School'),
(17, 'Primary 4 Pink', '2016/2017', 'okoye.john', 'St Joseph\'s Nursery & Primary School'),
(18, 'Primary 5 Blue', '2016/2017', 'adebayo.victoria', 'St Joseph\'s Nursery & Primary School'),
(19, 'Primary 5 Brown', '2016/2017', 'adesina.joel', 'St Joseph\'s Nursery & Primary School'),
(20, 'Primary 5 Green ', '2016/2017', 'olagunju.t', 'St Joseph\'s Nursery & Primary School'),
(21, 'Primary 5 Yellow', '2016/2017', 'afolabi.oluwole', 'St Joseph\'s Nursery & Primary School'),
(22, 'Primary 6 Blue', '2016/2017', 'david.samrock', 'St Joseph\'s Nursery & Primary School'),
(23, 'Primary 6 Brown', '2016/2017', 'olayioye.sunkanmi', 'St Joseph\'s Nursery & Primary School'),
(24, 'Primary 6 Green', '2016/2017', 'adu.temitope', 'St Joseph\'s Nursery & Primary School'),
(25, 'JSS1A', '2016/2017', 'adeleke.george', 'Ideal Model College'),
(26, 'JSS2B', '2016/2017', 'tina.lawal', 'Ideal Model College'),
(27, 'JSS3C', '', 'adeleke.george', 'Ideal Model College'),
(29, 'SS2B', '', '', 'Ideal Model College'),
(30, 'test class 1', '', '', 'Ideal Model College'),
(31, 'SS1A', '', '', 'Koko toddlers'),
(32, 'SS1B', '', '', 'Koko toddlers'),
(33, 'SS2A', '', '', 'Koko toddlers'),
(34, 'SS2B', '2014/2015', 'noo', 'Koko toddlers'),
(35, 'SS2C', '', '', 'Koko toddlers'),
(36, 'JS1A', '2016/2017', 'bola.george', 'Tade Schools'),
(37, 'JS1B', '', '', 'Tade Schools'),
(38, 'JS2A', '', '', 'Tade Schools'),
(39, 'JS2B', '', '', 'Tade Schools'),
(40, 'JS3A', '', '', 'Tade Schools'),
(41, 'PRY 1', '', '', 'Ideal Model College'),
(42, 'PRY 2', '', '', 'Ideal Model College'),
(43, 'PRY 3', '', '', 'Ideal Model College'),
(44, 'PRY 4', '', '', 'Ideal Model College'),
(45, 'PRY 5', '2018/2019', 'seye.john', 'Ideal Model College');

-- --------------------------------------------------------

--
-- Table structure for table `college`
--

CREATE TABLE `college` (
  `collegeName` varchar(100) NOT NULL,
  `collegeAddress` varchar(255) NOT NULL,
  `city` char(10) NOT NULL,
  `state` char(10) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `collegeCode` char(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `college`
--

INSERT INTO `college` (`collegeName`, `collegeAddress`, `city`, `state`, `phone`, `collegeCode`) VALUES
('best brights LA', '12 GRA Rd', 'Ocean city', 'Lagos', '7030098434', 'bbla');

-- --------------------------------------------------------

--
-- Table structure for table `elib_users`
--

CREATE TABLE `elib_users` (
  `ID` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `who` char(10) NOT NULL,
  `password1` varchar(255) NOT NULL,
  `password2` varchar(255) NOT NULL,
  `school` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `elib_users`
--

INSERT INTO `elib_users` (`ID`, `username`, `who`, `password1`, `password2`, `school`) VALUES
(53, 'admin1', 'admin', '7c6a180b36896a0a8c02787eeafb0e4c', '7c6a180b36896a0a8c02787eeafb0e4c', '');

-- --------------------------------------------------------

--
-- Table structure for table `grades`
--

CREATE TABLE `grades` (
  `id` int(11) NOT NULL,
  `grade` char(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `grades`
--

INSERT INTO `grades` (`id`, `grade`) VALUES
(1, 'A'),
(2, 'B'),
(3, 'C'),
(4, 'D'),
(5, 'E'),
(6, 'F');

-- --------------------------------------------------------

--
-- Table structure for table `marks`
--

CREATE TABLE `marks` (
  `id` int(11) NOT NULL,
  `score` float(15,2) NOT NULL,
  `user` varchar(100) NOT NULL,
  `school` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `id` int(11) NOT NULL,
  `slipno` varchar(100) NOT NULL,
  `student_id` varchar(100) NOT NULL DEFAULT '',
  `date` varchar(25) NOT NULL,
  `class` varchar(100) NOT NULL DEFAULT '',
  `year` char(50) DEFAULT NULL,
  `term` char(1) DEFAULT NULL,
  `status` char(15) DEFAULT NULL,
  `amount` float(15,2) DEFAULT NULL,
  `desc` varchar(225) NOT NULL,
  `timestamp` datetime NOT NULL,
  `school` varchar(255) NOT NULL,
  `txn_id` varchar(100) NOT NULL,
  `auth` varchar(100) NOT NULL,
  `bank` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `positions`
--

CREATE TABLE `positions` (
  `id` int(11) NOT NULL,
  `studentID` varchar(100) NOT NULL,
  `score` float(15,1) NOT NULL,
  `authID` varchar(100) NOT NULL,
  `school` varchar(255) NOT NULL,
  `rank` varchar(10) NOT NULL,
  `year` varchar(50) NOT NULL,
  `term` varchar(25) NOT NULL,
  `class` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `results`
--

CREATE TABLE `results` (
  `id` int(11) NOT NULL,
  `studentID` char(200) NOT NULL,
  `class` varchar(100) NOT NULL,
  `subject` varchar(100) NOT NULL,
  `ca1` float(15,1) NOT NULL,
  `ca2` float(15,1) NOT NULL,
  `ca3` float(15,1) NOT NULL,
  `exam1` float(15,1) NOT NULL,
  `exam2` float(15,1) NOT NULL,
  `exam3` float(15,1) NOT NULL,
  `total1` float(15,1) NOT NULL,
  `total2` float(15,1) NOT NULL,
  `total3` float(15,1) NOT NULL,
  `grade1` char(1) NOT NULL,
  `grade2` char(1) NOT NULL,
  `grade3` char(1) NOT NULL,
  `positions1` char(6) NOT NULL,
  `positions2` char(6) NOT NULL,
  `positions3` char(6) NOT NULL,
  `year` varchar(100) NOT NULL,
  `teacherID` varchar(200) NOT NULL,
  `school` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `school`
--

CREATE TABLE `school` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` int(11) NOT NULL,
  `session` varchar(100) NOT NULL,
  `school` varchar(255) NOT NULL,
  `status` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `level` varchar(100) NOT NULL DEFAULT '',
  `sex` char(1) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `photo_id` varchar(255) NOT NULL,
  `school` varchar(255) NOT NULL,
  `year` varchar(100) NOT NULL,
  `teacherID` varchar(100) DEFAULT NULL,
  `status` varchar(15) NOT NULL,
  `payStatus` char(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `subjectpositions`
--

CREATE TABLE `subjectpositions` (
  `studentID` varchar(100) NOT NULL,
  `class` varchar(100) NOT NULL,
  `total` float NOT NULL,
  `teacherID` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `id` int(11) NOT NULL,
  `subject` char(100) NOT NULL,
  `school` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `term_one`
--

CREATE TABLE `term_one` (
  `id` int(11) NOT NULL,
  `studentID` varchar(100) NOT NULL,
  `subject` varchar(100) NOT NULL,
  `ca1` float(15,1) NOT NULL,
  `exam1` float(15,1) NOT NULL,
  `total1` float(15,1) NOT NULL,
  `grade1` char(1) NOT NULL,
  `positions1` char(6) NOT NULL,
  `term` char(1) NOT NULL,
  `year` varchar(100) NOT NULL,
  `teacherID` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `term_three`
--

CREATE TABLE `term_three` (
  `id` int(11) NOT NULL,
  `studentID` varchar(100) NOT NULL,
  `subject` varchar(100) NOT NULL,
  `ca3` float(15,1) NOT NULL,
  `exam3` float(15,1) NOT NULL,
  `total3` float(15,1) NOT NULL,
  `grade3` char(1) NOT NULL,
  `positions3` char(6) NOT NULL,
  `term` char(1) NOT NULL,
  `year` varchar(100) NOT NULL,
  `teacherID` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `term_two`
--

CREATE TABLE `term_two` (
  `id` int(11) NOT NULL,
  `studentID` varchar(100) NOT NULL,
  `subject` varchar(100) NOT NULL,
  `ca2` float(15,1) NOT NULL,
  `exam2` float(15,1) NOT NULL,
  `total2` float(15,1) NOT NULL,
  `grade2` char(1) NOT NULL,
  `positions2` char(6) NOT NULL,
  `term` char(1) NOT NULL,
  `year` varchar(100) NOT NULL,
  `teacherID` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `who` char(25) NOT NULL,
  `password` varchar(255) NOT NULL,
  `pin` varchar(25) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `tsex` char(2) DEFAULT NULL,
  `temail` varchar(255) DEFAULT NULL,
  `tphone` char(100) DEFAULT NULL,
  `taddress` varchar(100) NOT NULL,
  `photo_id` varchar(255) NOT NULL,
  `school` varchar(255) NOT NULL,
  `bank` varchar(255) NOT NULL,
  `session` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `who`, `password`, `pin`, `fullname`, `tsex`, `temail`, `tphone`, `taddress`, `photo_id`, `school`, `bank`, `session`) VALUES
(2, 'admin1', 'admin1', '7c6a180b36896a0a8c02787eeafb0e4c', '', 'IT', 'M', 'admin@aol.com', '7068895548', 'IT lane, BishopsOaks', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `who`
--

CREATE TABLE `who` (
  `id` int(11) NOT NULL,
  `who` char(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `who`
--

INSERT INTO `who` (`id`, `who`) VALUES
(2, 'teacher');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `assessment`
--
ALTER TABLE `assessment`
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `assessments`
--
ALTER TABLE `assessments`
  ADD PRIMARY KEY (`area`,`term`,`year`,`studentID`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `assessment_items`
--
ALTER TABLE `assessment_items`
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `banks`
--
ALTER TABLE `banks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `classes`
--
ALTER TABLE `classes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `college`
--
ALTER TABLE `college`
  ADD PRIMARY KEY (`collegeCode`);

--
-- Indexes for table `elib_users`
--
ALTER TABLE `elib_users`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `grades`
--
ALTER TABLE `grades`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `marks`
--
ALTER TABLE `marks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `paySlipNo` (`slipno`);

--
-- Indexes for table `positions`
--
ALTER TABLE `positions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `results`
--
ALTER TABLE `results`
  ADD PRIMARY KEY (`studentID`,`subject`,`year`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `school`
--
ALTER TABLE `school`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`session`,`school`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`username`,`level`,`school`,`year`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `subjectpositions`
--
ALTER TABLE `subjectpositions`
  ADD PRIMARY KEY (`studentID`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`subject`,`school`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `term_one`
--
ALTER TABLE `term_one`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `studentID` (`studentID`,`subject`,`term`,`year`);

--
-- Indexes for table `term_three`
--
ALTER TABLE `term_three`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `studentID` (`studentID`,`subject`,`term`,`year`);

--
-- Indexes for table `term_two`
--
ALTER TABLE `term_two`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `studentID` (`studentID`,`subject`,`term`,`year`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`username`,`pin`,`school`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `who`
--
ALTER TABLE `who`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `assessment`
--
ALTER TABLE `assessment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `assessments`
--
ALTER TABLE `assessments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `assessment_items`
--
ALTER TABLE `assessment_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `banks`
--
ALTER TABLE `banks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `classes`
--
ALTER TABLE `classes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;
--
-- AUTO_INCREMENT for table `elib_users`
--
ALTER TABLE `elib_users`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;
--
-- AUTO_INCREMENT for table `grades`
--
ALTER TABLE `grades`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `marks`
--
ALTER TABLE `marks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `positions`
--
ALTER TABLE `positions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `results`
--
ALTER TABLE `results`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `school`
--
ALTER TABLE `school`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `sessions`
--
ALTER TABLE `sessions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `term_one`
--
ALTER TABLE `term_one`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `term_three`
--
ALTER TABLE `term_three`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
--
-- AUTO_INCREMENT for table `term_two`
--
ALTER TABLE `term_two`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4562;
--
-- AUTO_INCREMENT for table `who`
--
ALTER TABLE `who`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
