-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 07, 2018 at 09:47 AM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `job`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE `account` (
  `uid` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`uid`, `username`, `password`, `role`, `status`) VALUES
('0987', 'Steve', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'Employer', 'Blocked'),
('1', 'Farmer', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'Officer', 'Active'),
('12', 'Abcd', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'Officer', 'Active'),
('123456', 'abebe', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'Officer', 'Active'),
('a1', 'melke', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'Officer', 'Blocked'),
('e1', 'sol', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'Administrator', 'Active'),
('E3', 'ayana', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'Employer', 'Active'),
('E4', 'yekoye', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'Officer', 'Active'),
('E8', 'ge', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'Officer', 'Blocked'),
('E9', 'Giz', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'Officer', 'Active'),
('E90', 'Melsew', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'Officer', 'Active'),
('t1', 'abrelo', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'Head Of Civil Service', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `applicantdoc`
--

CREATE TABLE `applicantdoc` (
  `aid` int(255) NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `sex` varchar(100) NOT NULL,
  `phone` int(11) NOT NULL,
  `edulevel` varchar(255) NOT NULL,
  `edu_in_num` int(11) NOT NULL,
  `workexp` varchar(100) NOT NULL,
  `health` varchar(100) NOT NULL,
  `cv` varchar(100) NOT NULL,
  `work_exprience` varchar(100) DEFAULT NULL,
  `educational_background` varchar(100) NOT NULL,
  `jobtitle` text NOT NULL,
  `level` text NOT NULL,
  `orgname` text NOT NULL,
  `registration_date` date NOT NULL,
  `status` varchar(255) NOT NULL,
  `status1` varchar(255) NOT NULL,
  `eid` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `applicantdoc`
--

INSERT INTO `applicantdoc` (`aid`, `fullname`, `sex`, `phone`, `edulevel`, `edu_in_num`, `workexp`, `health`, `cv`, `work_exprience`, `educational_background`, `jobtitle`, `level`, `orgname`, `registration_date`, `status`, `status1`, `eid`) VALUES
(24, 'solomon kidane', 'Male', 1234567890, 'degree', 1, '4', 'Healthy', 'App/0.jpg', 'App/1.jpg', 'App/2.jpg', 'System Admin', 'Level 3 ', 'Civil Service Office', '2024-05-18', 'Approved', 'Tested', 'E3'),
(25, 'Abebaw Solo', 'Male', 1234567890, 'degree', 1, '4', 'Disabled', 'App/Aummer.jpg', 'App/Bereket.jpg', 'App/darmola.jpg', 'System Admin', 'Level 3 ', 'Civil Service Office', '2024-05-18', 'Approved', 'Tested', 'E3'),
(26, 'Aster Kebede', 'Female', 1234567890, 'degree', 1, '4', 'Healthy', 'App/ESETE.jpg', 'App/ESUBALEW.jpg', 'App/Ensmaw.jpg', 'System Admin', 'Level 3 ', 'Civil Service Office', '2024-05-18', 'Approved', 'Tested', 'E3'),
(27, 'AAAAA', 'Male', 642986960, 'degree', 1, '5', 'Disabled', 'App/IMG_20170911_153954.jpg', 'App/jemal.jpg', 'App/Jp.jpg', 'System Admin', 'Level 3 ', 'Civil Service Office', '2024-05-18', 'Approved', 'Tested', 'E3'),
(29, 'BBBBB', 'Male', 1234567890, 'degree', 1, '4', 'Healthy', 'App/Zuriash.jpg', 'App/Znabu.jpg', 'App/TY dolla.jpg', 'System Admin', 'Level 3 ', 'Civil Service Office', '2024-05-18', 'Approved', 'Tested', 'E3'),
(30, 'Melsew Da', 'Male', 1234567890, 'degree', 1, '4', 'Healthy', 'App/WyE0e64PUdtY5ERBrNfXbgEE.jpg', 'App/Zenaw.jpg', 'App/temesgen.jpg', 'Constractor', 'Level 4 ', 'ABCD', '2024-05-18', 'Approved', 'Tested', 'E3'),
(31, 'samiiii', 'Male', 1234567890, 'degree', 1, '4', 'Healthy', 'App/Aummer.jpg', 'App/Bereket.jpg', 'App/darmola.jpg', 'Constractor', 'Level 4 ', 'ABCD', '2025-05-18', 'Approved', 'Tested', 'E3'),
(37, 'solomon kidane', 'Male', 251, 'Masters', 2, '4', 'Disabled', 'App/11.jpg', 'App/9.jpg', 'App/20.jpg', 'Docter', 'Level 11', 'DebreMarkos Hospital', '2001-06-18', 'Approved', '-', 'E3'),
(38, 'Abebe ayana', 'Male', 251, 'degree', 0, '5', 'Healthy', 'App/bd.jpg', 'App/gh.jpg', 'App/w.jpg', 'System Admin', 'Level 3 ', 'Civil Service Office', '2001-06-18', 'Approved', 'Tested', 'E3');

-- --------------------------------------------------------

--
-- Table structure for table `applicantresult`
--

CREATE TABLE `applicantresult` (
  `aid` int(255) NOT NULL,
  `afullname` varchar(255) NOT NULL,
  `organaization_name` varchar(255) NOT NULL,
  `vacancy_title` varchar(255) NOT NULL,
  `sex` varchar(255) NOT NULL,
  `testdate` date NOT NULL,
  `practical` varchar(255) NOT NULL,
  `test` varchar(15) NOT NULL,
  `test2` varchar(255) NOT NULL,
  `interviewdate` date NOT NULL,
  `interview` varchar(15) NOT NULL,
  `total_grade` varchar(100) NOT NULL,
  `status` varchar(255) NOT NULL,
  `status2` varchar(255) NOT NULL,
  `status3` varchar(255) NOT NULL,
  `Assign` varchar(255) NOT NULL,
  `assigneddate` date NOT NULL,
  `status4` varchar(255) NOT NULL,
  `eid_fk` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `applicantresult`
--

INSERT INTO `applicantresult` (`aid`, `afullname`, `organaization_name`, `vacancy_title`, `sex`, `testdate`, `practical`, `test`, `test2`, `interviewdate`, `interview`, `total_grade`, `status`, `status2`, `status3`, `Assign`, `assigneddate`, `status4`, `eid_fk`) VALUES
(24, 'solomon kidane', 'Civil Service Office', 'System Admin', 'Male', '2018-05-02', '', '90', '', '2018-05-02', '5', '95', 'Selected For Interview', '2', 'Approved', '', '0000-00-00', '', 'a1'),
(25, 'Abebaw Solo', 'Civil Service Office', 'System Admin', 'Male', '2018-05-02', '', '90', '', '2018-05-02', '5', '95', 'Selected For Interview', 'selected', 'Approved', 'Recived', '2018-06-18', 'Civil Service Office', 'a1'),
(26, 'Aster Kebede', 'Civil Service Office', 'System Admin', 'Female', '2018-05-02', '', '90', '', '2018-05-02', '6', '99', 'Selected For Interview', '1', 'Approved', 'Assigned', '2018-06-18', 'Civil Service Office', 'a1'),
(27, 'AAAAA', 'Civil Service Office', 'System Admin', 'Male', '2018-05-02', '', '90', '', '2018-05-02', '4', '94', 'Selected For Interview', 'selected', 'Approved', 'Canceled', '2018-06-18', '', 'a1'),
(29, 'BBBBB', 'Civil Service Office', 'System Admin', 'Male', '2018-05-02', '', '30', '', '0000-00-00', '', '30', 'Not Selected For Interview', '', '', '', '0000-00-00', '', 'a1'),
(30, 'Melsew Da', 'ABCD', 'Constractor', 'Male', '2018-05-08', '75', '', '10', '2018-05-09', '10', '95', 'Selected For interview', '', '', '', '0000-00-00', '', 'E3'),
(31, 'samiiii', 'ABCD', 'Constractor', 'Male', '2018-05-01', '', '85', '', '2018-05-02', '8', '93', 'Selected For Interview', '', '', '', '0000-00-00', '', 'E3'),
(38, 'Abebe ayana', 'Civil Service Office', 'System Admin', 'Male', '2018-06-06', '', '90', '', '2018-06-06', '10', '100', 'Selected For Interview', '', '', '', '0000-00-00', '', 'E3');

-- --------------------------------------------------------

--
-- Table structure for table `attempt`
--

CREATE TABLE `attempt` (
  `attempt-id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `comment_id` int(11) NOT NULL,
  `comment_author` varchar(255) NOT NULL,
  `comment_author_email` varchar(255) NOT NULL,
  `comment_author_phone` varchar(255) NOT NULL,
  `comment_content` varchar(255) NOT NULL,
  `comment_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`comment_id`, `comment_author`, `comment_author_email`, `comment_author_phone`, `comment_content`, `comment_date`) VALUES
(1, 'Solomon', 'Sol@gmail.com', '236676487', 'Test', '2018-05-22'),
(5, 'sola', 'M@gmail.com', '1234567890', 'Test This Is Solomon', '2018-05-28');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `eid` varchar(255) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `sex` text NOT NULL,
  `phone` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `workplace` varchar(255) NOT NULL,
  `position` varchar(255) NOT NULL,
  `photo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`eid`, `fullname`, `sex`, `phone`, `email`, `workplace`, `position`, `photo`) VALUES
('0987', 'Steve Jobs', 'Male', '+251 23456789', 'M@gmail.com', 'Apple Company', 'Excutive Co-Founder', 'Zuriash.jpg'),
('1', 'solomon', 'Male', '642986960', 'a@gmail.com', 'DebreMarkos Clinic', 'Farmer', 'Aummer.jpg'),
('12', 'Abcd', 'Male', '642986960', 'a@gmail.com', 'ABCD', 'Constractor', ''),
('123456', 'Abebe ayana', 'Male', '+251 45556667', 'M@gmail.com', 'DebreMarkos Hospital', 'Nurse', '1.jpg'),
('a1', 'Melkamu Awoke', 'Male', '+251936323156', 'M@gmail.com', 'Civil Service Office', 'Head', '1139280.jpg'),
('e1', 'solomon', 'Male', '642986960', 'sol@gmail.com', 'Abma Collage', 'HO', ''),
('e2', 'mule', 'Male', '1234567890', 'a@gmail.com', 'Abma Collage', 'Teacher', ''),
('E3', 'Ayana Genet', 'Male', '642986960', 'a@gmail.com', 'Civil Service Office', 'Employer', 'Aummer.jpg'),
('E4', 'yekoye', 'Male', '1234567890', 'a@gmail.com', 'Civil Service Office', 'Teacher', ''),
('E5', 'Getachew', 'Male', '642986960', 'a@gmail.com', 'Civil Service Office', 'Secretary', ''),
('E6', 'abcd', 'Male', '642986960', 'a@gmail.com', 'DebreMarkos Clinic', 'Docter', ''),
('E7', 'Solomon', 'Male', '1234567890', 'solokidane@gmail.com', 'DebreMarkos Clinic', 'Docter', '1139280.jpg'),
('E8', 'Getachew Takele', 'Male', '642986960', 'a@gmail.com', 'Garden', 'Teacher', 'fWdFNDYd33dXfMTR44g78ftF.jpg'),
('E9', 'Gzachew ', 'Male', '+251 57475765', 'M@gmail.com', 'Civil Service Office', 'Officer', 'Jp.jpg'),
('E90', 'Melsew', 'Male', '+251 78587587', 'melsew@gmail.com', 'Civil Service Office', 'Officer', 'OV.jpg'),
('t1', 'Abreham Abreham', 'Male', '+251 23456789', 'abrelo@gmail.com', 'Civil Service Office', 'Head', 'Bereket.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `job_desc`
--

CREATE TABLE `job_desc` (
  `job_id` varchar(255) NOT NULL,
  `job_title` varchar(100) NOT NULL,
  `permissible` varchar(255) NOT NULL,
  `orgname` text NOT NULL,
  `level_type` varchar(100) NOT NULL,
  `eid` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `job_desc`
--

INSERT INTO `job_desc` (`job_id`, `job_title`, `permissible`, `orgname`, `level_type`, `eid`) VALUES
('101', 'System Admin', '8', 'Civil Service Office', 'Level 3 ', 'E3'),
('102', 'Health Officer', '3', 'DebreMarkos Clinic', 'Level 3 ', 'E3'),
('103', 'English Teacher', '2', 'Abma Secondary School', 'Level 2 ', 'E3'),
('104', 'Finance', '3', 'kebele 05', 'Level 1 ', 'E3'),
('56', 'Constractor', '8', 'ABCD', 'Level 4 ', 'E6'),
('66', 'Docter', '5', 'DebreMarkos Clinic', 'Level 5 ', 'E3'),
('67678', 'Docter', '4', 'DebreMarkos Hospital', 'Level 11', 'E3'),
('j123456', 'Garden', '5', 'Getachew', 'Level 8', 'E3');

-- --------------------------------------------------------

--
-- Table structure for table `level`
--

CREATE TABLE `level` (
  `level_id` int(11) NOT NULL,
  `level_type` varchar(100) NOT NULL,
  `date` date NOT NULL,
  `eid` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `level`
--

INSERT INTO `level` (`level_id`, `level_type`, `date`, `eid`) VALUES
(3, 'Level 1', '2017-05-18', 'E3'),
(4, 'Level 2', '2017-05-18', 'E3'),
(5, 'Level 3', '2019-05-18', 'E3'),
(6, 'Level 4', '2019-05-18', 'E3'),
(7, 'Level 11', '2001-06-18', 'e1');

-- --------------------------------------------------------

--
-- Table structure for table `organization`
--

CREATE TABLE `organization` (
  `orgid` int(11) NOT NULL,
  `orgname` varchar(255) NOT NULL,
  `orgregdate` date NOT NULL,
  `eid` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `organization`
--

INSERT INTO `organization` (`orgid`, `orgname`, `orgregdate`, `eid`) VALUES
(1, 'DebreMarkos Hospital', '2017-05-18', 'e1'),
(7, 'kebele 05', '2017-05-18', 'E3'),
(10, 'Debremarkkos City', '2017-05-18', 'e1'),
(13, 'Apple Company', '2028-05-18', 'e1'),
(15, 'ABCD', '2018-05-09', ''),
(17, 'Civil Service Office', '2031-05-18', 'e1');

-- --------------------------------------------------------

--
-- Table structure for table `postvacany`
--

CREATE TABLE `postvacany` (
  `vid` int(11) NOT NULL,
  `jobid` varchar(255) NOT NULL,
  `jobtitle` varchar(100) NOT NULL,
  `leveltype` varchar(255) NOT NULL,
  `organaization_name` varchar(100) NOT NULL,
  `workprocess` varchar(255) NOT NULL,
  `workdescription` text NOT NULL,
  `posted_date` date NOT NULL,
  `registration_date` date NOT NULL,
  `dead_line` date NOT NULL,
  `test_will_beon` date NOT NULL,
  `postedby` text NOT NULL,
  `requestedno` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `eid` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `postvacany`
--

INSERT INTO `postvacany` (`vid`, `jobid`, `jobtitle`, `leveltype`, `organaization_name`, `workprocess`, `workdescription`, `posted_date`, `registration_date`, `dead_line`, `test_will_beon`, `postedby`, `requestedno`, `status`, `eid`) VALUES
(21, '56', 'Constractor', 'Level 4 ', 'ABCD', 'ExternalTransfer', 'Test  Test Test', '2018-05-17', '2018-05-01', '2018-05-20', '2018-05-10', 'solomon', '1', 'No Applicants Found', 'e1'),
(22, '101', 'System Admin', 'Level 3 ', 'Civil Service Office', 'InternalTransfer', 'Work Experiance: 5 Years, And Above , Salary:5000 Birr,  Employment Type:Contract ,Sex:Male/Female.', '2018-05-18', '2018-05-01', '2018-05-07', '2018-05-10', 'solomon', '2', '', 'e1'),
(24, '56', 'Constractor', 'Level 4 ', 'ABCD', 'Select Work Process', 'Am gonna Graduate After The Defence!!', '2018-05-25', '2018-05-02', '2018-05-02', '2018-05-22', 'Ayana Genet', '1', 'No Applicants Found', 'E3'),
(25, '67678', 'Docter', 'Level 11', 'DebreMarkos Hospital', 'Hiring', 'Employment Type: Part time\r\nWork Experience: One year and above\r\nGender: Male /female\r\nSalary: 5000 Birr\r\n', '2018-05-18', '2018-06-01', '2018-05-20', '2018-06-08', 'ayana', '1', ' ', 'E3'),
(26, '101', 'System Admin', 'Level 3 ', 'Civil Service Office', 'Hiring', 'Employment Type: Part time\r\nWork Experience: One year and above\r\nGender: Male /female\r\nSalary: 5000 Birr\r\n', '2018-05-18', '2018-06-01', '2018-05-20', '2018-06-10', 'ayana', '2', ' ', 'E3');

-- --------------------------------------------------------

--
-- Table structure for table `request`
--

CREATE TABLE `request` (
  `rid` int(255) NOT NULL,
  `jobtitle` varchar(255) NOT NULL,
  `leveltype` varchar(100) NOT NULL,
  `organaization_name` varchar(255) NOT NULL,
  `work_process` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `requestedno` int(11) NOT NULL,
  `work_starting_date` date NOT NULL,
  `requested_by` varchar(100) NOT NULL,
  `budget_availablity_checked_by` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL,
  `job_id` varchar(255) DEFAULT NULL,
  `eid` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `request`
--

INSERT INTO `request` (`rid`, `jobtitle`, `leveltype`, `organaization_name`, `work_process`, `description`, `requestedno`, `work_starting_date`, `requested_by`, `budget_availablity_checked_by`, `status`, `job_id`, `eid`) VALUES
(3, 'Health Officer', 'Level 3 ', 'DebreMarkos Clinic', 'Hiring', '0', 1, '2018-04-02', ',nkhn', 'solomon@gmail.com', 'seen', '102', 'e2'),
(9, 'Constractor', 'Level 4 ', 'ABCD', 'ExternalTransfer', 'Girachew', 1, '2018-05-02', 'abcd', 'abcd@gmail.com', 'No Applicants Found', '56', '12'),
(20, 'System Admin', 'Level 3 ', 'Civil Service Office', 'Promotion', 'GGGGGGG', 2, '2018-06-06', 'yekoye', 'solomon@gmail.com', 'No Applicants Found', '101', 'E4'),
(21, 'System Admin', 'Level 3 ', 'Civil Service Office', 'Hiring', 'Employment Type: Part time\r\nWork Experience: One year and above\r\nGender: Male /female\r\nSalary: 5000 Birr\r\n', 2, '2018-06-20', 'Melsew', 'Getachew', 'Posted', '101', 'E90'),
(22, 'Docter', 'Level 11', 'DebreMarkos Hospital', 'Hiring', 'Employment Type: Part time\r\nWork Experience: One year and above\r\nGender: Male /female\r\nSalary: 5000 Birr\r\n', 1, '2018-06-01', 'abebe', 'solomon@gmail.com', 'Posted', '67678', '123456');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`uid`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `applicantdoc`
--
ALTER TABLE `applicantdoc`
  ADD PRIMARY KEY (`aid`),
  ADD KEY `eid_2` (`eid`);

--
-- Indexes for table `applicantresult`
--
ALTER TABLE `applicantresult`
  ADD PRIMARY KEY (`aid`),
  ADD KEY `eid_fk` (`eid_fk`),
  ADD KEY `aid` (`aid`);

--
-- Indexes for table `attempt`
--
ALTER TABLE `attempt`
  ADD PRIMARY KEY (`attempt-id`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`eid`);

--
-- Indexes for table `job_desc`
--
ALTER TABLE `job_desc`
  ADD PRIMARY KEY (`job_id`),
  ADD KEY `eid` (`eid`);

--
-- Indexes for table `level`
--
ALTER TABLE `level`
  ADD PRIMARY KEY (`level_id`),
  ADD KEY `eid` (`eid`);

--
-- Indexes for table `organization`
--
ALTER TABLE `organization`
  ADD PRIMARY KEY (`orgid`),
  ADD UNIQUE KEY `orgname` (`orgname`),
  ADD KEY `eid` (`eid`);

--
-- Indexes for table `postvacany`
--
ALTER TABLE `postvacany`
  ADD PRIMARY KEY (`vid`),
  ADD KEY `eid` (`eid`);

--
-- Indexes for table `request`
--
ALTER TABLE `request`
  ADD PRIMARY KEY (`rid`),
  ADD KEY `job_id` (`job_id`),
  ADD KEY `eid` (`eid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `applicantdoc`
--
ALTER TABLE `applicantdoc`
  MODIFY `aid` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;
--
-- AUTO_INCREMENT for table `applicantresult`
--
ALTER TABLE `applicantresult`
  MODIFY `aid` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;
--
-- AUTO_INCREMENT for table `attempt`
--
ALTER TABLE `attempt`
  MODIFY `attempt-id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `level`
--
ALTER TABLE `level`
  MODIFY `level_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `organization`
--
ALTER TABLE `organization`
  MODIFY `orgid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `postvacany`
--
ALTER TABLE `postvacany`
  MODIFY `vid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT for table `request`
--
ALTER TABLE `request`
  MODIFY `rid` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `account`
--
ALTER TABLE `account`
  ADD CONSTRAINT `account_ibfk_1` FOREIGN KEY (`uid`) REFERENCES `employee` (`eid`);

--
-- Constraints for table `applicantdoc`
--
ALTER TABLE `applicantdoc`
  ADD CONSTRAINT `applicantdoc_ibfk_1` FOREIGN KEY (`eid`) REFERENCES `employee` (`eid`);

--
-- Constraints for table `applicantresult`
--
ALTER TABLE `applicantresult`
  ADD CONSTRAINT `applicantresult_ibfk_1` FOREIGN KEY (`aid`) REFERENCES `applicantdoc` (`aid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `job_desc`
--
ALTER TABLE `job_desc`
  ADD CONSTRAINT `job_desc_ibfk_1` FOREIGN KEY (`eid`) REFERENCES `employee` (`eid`);

--
-- Constraints for table `level`
--
ALTER TABLE `level`
  ADD CONSTRAINT `level_ibfk_1` FOREIGN KEY (`eid`) REFERENCES `employee` (`eid`);

--
-- Constraints for table `organization`
--
ALTER TABLE `organization`
  ADD CONSTRAINT `organization_ibfk_1` FOREIGN KEY (`eid`) REFERENCES `employee` (`eid`);

--
-- Constraints for table `postvacany`
--
ALTER TABLE `postvacany`
  ADD CONSTRAINT `postvacany_ibfk_1` FOREIGN KEY (`eid`) REFERENCES `employee` (`eid`);

--
-- Constraints for table `request`
--
ALTER TABLE `request`
  ADD CONSTRAINT `request_ibfk_1` FOREIGN KEY (`job_id`) REFERENCES `job_desc` (`job_id`),
  ADD CONSTRAINT `request_ibfk_2` FOREIGN KEY (`eid`) REFERENCES `employee` (`eid`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
