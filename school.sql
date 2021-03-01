-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 01, 2021 at 08:29 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `school`
--

-- --------------------------------------------------------

--
-- Table structure for table `appfeedback`
--

CREATE TABLE `appfeedback` (
  `id` int(11) NOT NULL,
  `comment` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `appfeedback`
--

INSERT INTO `appfeedback` (`id`, `comment`) VALUES
(1, 'Areebah sept 21'),
(2, 'Areebah sept 21'),
(3, 'gggggg');

-- --------------------------------------------------------

--
-- Table structure for table `blog`
--

CREATE TABLE `blog` (
  `id` int(11) NOT NULL,
  `author` varchar(100) NOT NULL,
  `date` date NOT NULL,
  `title` varchar(150) NOT NULL,
  `detail` varchar(10000) NOT NULL,
  `image` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `communitymember`
--

CREATE TABLE `communitymember` (
  `communityMember_id` int(20) NOT NULL,
  `communityMember_anonymous_name` varchar(100) NOT NULL,
  `communityMember_email` varchar(100) NOT NULL,
  `communityMember_password` varchar(100) NOT NULL,
  `country_name` varchar(100) NOT NULL,
  `communityMember_state` varchar(100) NOT NULL,
  `communityMember_district` varchar(100) NOT NULL,
  `communityMember_reset_password` bit(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `communitymember`
--

INSERT INTO `communitymember` (`communityMember_id`, `communityMember_anonymous_name`, `communityMember_email`, `communityMember_password`, `country_name`, `communityMember_state`, `communityMember_district`, `communityMember_reset_password`) VALUES
(1, 'lahorecommunity', 'lahorecommunity@gmail.com', 'As12345@', 'Pakistan', 'xyz', 'Lahore', b'0'),
(2, 'hassan', 'abdulhaseeb@gmail.com', 'abcd12', 'Pakistan', 'xyz', 'Lahore', b'0');

-- --------------------------------------------------------

--
-- Table structure for table `confirmreporter`
--

CREATE TABLE `confirmreporter` (
  `id` int(11) NOT NULL,
  `reportAbsence_id` int(11) NOT NULL,
  `reporter_id` int(11) NOT NULL,
  `reporter_role` varchar(50) NOT NULL,
  `vote_status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `confirmreporter`
--

INSERT INTO `confirmreporter` (`id`, `reportAbsence_id`, `reporter_id`, `reporter_role`, `vote_status`) VALUES
(13, 14, 4, 'Student', 'yes'),
(14, 15, 3, 'Student', 'yes'),
(15, 15, 4, 'student', 'yes'),
(16, 16, 3, 'Student', 'yes'),
(17, 17, 4, 'Student', 'yes'),
(18, 18, 4, 'Student', 'yes'),
(19, 18, 9, 'student', 'yes'),
(20, 19, 4, 'Student', 'yes'),
(21, 20, 7, 'Student', 'yes'),
(22, 19, 7, 'Student', 'no'),
(23, 19, 10, 'student', 'yes'),
(24, 21, 10, 'Student', 'yes'),
(25, 22, 10, 'Student', 'yes'),
(26, 23, 12, 'Student', 'yes'),
(27, 24, 13, 'Student', 'yes'),
(28, 25, 13, 'Student', 'yes'),
(29, 24, 12, 'Student', 'yes'),
(30, 23, 13, 'student', 'yes'),
(31, 23, 7, 'student', 'yes'),
(32, 25, 7, 'student', 'no');

-- --------------------------------------------------------

--
-- Table structure for table `country`
--

CREATE TABLE `country` (
  `country_id` int(20) NOT NULL,
  `country_name` varchar(100) NOT NULL,
  `country_code` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `country`
--

INSERT INTO `country` (`country_id`, `country_name`, `country_code`) VALUES
(3, 'Pakistan', 92);

-- --------------------------------------------------------

--
-- Table structure for table `district`
--

CREATE TABLE `district` (
  `dist_id` int(20) NOT NULL,
  `dist_name` varchar(100) NOT NULL,
  `country_name` varchar(100) NOT NULL,
  `dist_state` varchar(100) NOT NULL,
  `dist_userName` varchar(100) NOT NULL,
  `dist_password` varchar(100) NOT NULL,
  `dist_email` varchar(100) DEFAULT NULL,
  `dist_account` varchar(25) DEFAULT NULL,
  `dist_reset_password` bit(1) NOT NULL,
  `block` int(11) NOT NULL,
  `language` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `district`
--

INSERT INTO `district` (`dist_id`, `dist_name`, `country_name`, `dist_state`, `dist_userName`, `dist_password`, `dist_email`, `dist_account`, `dist_reset_password`, `block`, `language`) VALUES
(2, 'Lahore', 'Pakistan', '', 'district_lahore', '3b712de48137572f3849aabd5666a4e3', 'lahorelahore@ha.com', 'approved', b'0', 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `entities`
--

CREATE TABLE `entities` (
  `school` int(11) NOT NULL,
  `teacher` int(11) NOT NULL,
  `student` int(11) NOT NULL,
  `communityMember` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `feedback_id` int(20) NOT NULL,
  `teacher_id` int(20) DEFAULT NULL,
  `student_id` int(20) DEFAULT NULL,
  `parent_id` int(20) DEFAULT NULL,
  `communityMember_id` int(20) DEFAULT NULL,
  `principal_id` int(20) DEFAULT NULL,
  `feedback_type` varchar(100) NOT NULL,
  `feedback_rating` int(20) NOT NULL,
  `feedback_review_text` varchar(1000) NOT NULL,
  `feedback_date` varchar(50) DEFAULT NULL,
  `teacher_feedback_id` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`feedback_id`, `teacher_id`, `student_id`, `parent_id`, `communityMember_id`, `principal_id`, `feedback_type`, `feedback_rating`, `feedback_review_text`, `feedback_date`, `teacher_feedback_id`) VALUES
(18, NULL, 4, NULL, NULL, NULL, 'Public', 5, 'Hello owais', '2020:09:17', 2),
(19, 3, NULL, NULL, NULL, NULL, 'Public', 5, 'Oky bye', '2020:09:20', 2),
(20, 3, NULL, NULL, NULL, NULL, 'Public', 0, 'Vthgjft', '2020:09:20', 3),
(23, NULL, 7, NULL, NULL, NULL, 'Public', 5, 'B whfvjwfjwrkfhb ', '2020:09:20', 2),
(25, NULL, 12, NULL, NULL, NULL, 'Public', 4, 'Public feedback by nick', '2020:09:25', 5);

-- --------------------------------------------------------

--
-- Table structure for table `follow`
--

CREATE TABLE `follow` (
  `follow_id` int(11) NOT NULL,
  `student_id` int(11) DEFAULT NULL,
  `teacher_id` int(11) DEFAULT NULL,
  `communityMember_id` int(11) DEFAULT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `school_id` int(11) DEFAULT NULL,
  `principal_id` int(11) DEFAULT NULL,
  `toBeFollow` int(11) NOT NULL,
  `role` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `follow`
--

INSERT INTO `follow` (`follow_id`, `student_id`, `teacher_id`, `communityMember_id`, `parent_id`, `school_id`, `principal_id`, `toBeFollow`, `role`) VALUES
(6, 1, NULL, NULL, NULL, NULL, NULL, 1, 'teacher'),
(7, NULL, NULL, NULL, 3, NULL, NULL, 1, 'teacher'),
(10, 4, NULL, NULL, NULL, NULL, NULL, 1, 'teacher'),
(11, 6, NULL, NULL, NULL, NULL, NULL, 1, 'teacher'),
(13, 7, NULL, NULL, NULL, NULL, NULL, 1, 'teacher'),
(14, 2, NULL, NULL, NULL, NULL, NULL, 1, 'teacher'),
(15, 2, NULL, NULL, NULL, NULL, NULL, 1, 'teacher'),
(16, 2, NULL, NULL, NULL, NULL, NULL, 1, 'teacher'),
(17, 8, NULL, NULL, NULL, NULL, NULL, 1, 'teacher'),
(18, 3, NULL, NULL, NULL, NULL, NULL, 2, 'teacher'),
(21, 4, NULL, NULL, NULL, NULL, NULL, 2, 'teacher'),
(26, 4, NULL, NULL, NULL, NULL, NULL, 3, 'teacher'),
(33, NULL, 3, NULL, NULL, NULL, NULL, 2, 'teacher'),
(34, NULL, 3, NULL, NULL, NULL, NULL, 3, 'teacher'),
(35, 9, NULL, NULL, NULL, NULL, NULL, 2, 'teacher'),
(36, 9, NULL, NULL, NULL, NULL, NULL, 3, 'teacher'),
(39, 10, NULL, NULL, NULL, NULL, NULL, 1, 'school'),
(42, 11, NULL, NULL, NULL, NULL, NULL, 2, 'teacher'),
(43, 13, NULL, NULL, NULL, NULL, NULL, 5, 'teacher'),
(45, 12, NULL, NULL, NULL, NULL, NULL, 5, 'teacher'),
(46, 7, NULL, NULL, NULL, NULL, NULL, 2, 'teacher'),
(47, 7, NULL, NULL, NULL, NULL, NULL, 3, 'teacher'),
(48, 7, NULL, NULL, NULL, NULL, NULL, 4, 'teacher'),
(49, 7, NULL, NULL, NULL, NULL, NULL, 5, 'teacher'),
(50, 14, NULL, NULL, NULL, NULL, NULL, 5, 'teacher'),
(54, 16, NULL, NULL, NULL, NULL, NULL, 2, 'teacher'),
(55, 16, NULL, NULL, NULL, NULL, NULL, 3, 'teacher'),
(56, 16, NULL, NULL, NULL, NULL, NULL, 4, 'teacher');

-- --------------------------------------------------------

--
-- Table structure for table `gazettedholidays`
--

CREATE TABLE `gazettedholidays` (
  `id` int(11) NOT NULL,
  `gazetted_date` date NOT NULL,
  `gazetted_day` varchar(50) NOT NULL,
  `gazetted_name` varchar(50) NOT NULL,
  `dist_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gazettedholidays`
--

INSERT INTO `gazettedholidays` (`id`, `gazetted_date`, `gazetted_day`, `gazetted_name`, `dist_id`) VALUES
(1, '2020-07-30', 'Wed', 'HOLIDAY', 2);

-- --------------------------------------------------------

--
-- Table structure for table `habit`
--

CREATE TABLE `habit` (
  `id` int(20) NOT NULL,
  `name` varchar(100) NOT NULL,
  `info` varchar(1000) NOT NULL,
  `date` varchar(50) NOT NULL,
  `Student` varchar(50) DEFAULT NULL,
  `Parent` varchar(50) DEFAULT NULL,
  `Teacher` varchar(50) DEFAULT NULL,
  `Principal` varchar(50) DEFAULT NULL,
  `CommunityMember` varchar(50) DEFAULT NULL,
  `DistrictAdmin` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `habit`
--

INSERT INTO `habit` (`id`, `name`, `info`, `date`, `Student`, `Parent`, `Teacher`, `Principal`, `CommunityMember`, `DistrictAdmin`) VALUES
(2, 'COVID-19', 'work from home ', '08-30-2020', 'true', 'true', 'true', 'true', 'true', ''),
(3, 'Pakistan', 'make a trip to Pakistan', '08-30-2020', 'true', 'true', 'true', 'true', 'true', '');

-- --------------------------------------------------------

--
-- Table structure for table `habitstatus`
--

CREATE TABLE `habitstatus` (
  `status_id` int(20) NOT NULL,
  `status` varchar(100) NOT NULL,
  `completed_days` int(20) NOT NULL,
  `user_id` int(20) NOT NULL,
  `user_role` varchar(100) NOT NULL,
  `habit_id` int(20) NOT NULL,
  `date` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `habitstatus`
--

INSERT INTO `habitstatus` (`status_id`, `status`, `completed_days`, `user_id`, `user_role`, `habit_id`, `date`) VALUES
(26, 'complete', 1, 10, 'student', 3, '21-09-2020'),
(27, 'current', 0, 10, 'student', 2, '21-09-2020'),
(28, 'complete', 1, 7, 'Student', 2, '21-09-2020'),
(29, 'complete', 1, 7, 'Student', 2, '21-09-2020'),
(30, 'complete', 0, 7, 'Student', 3, '21-09-2020'),
(31, 'complete', 1, 7, 'Student', 2, ''),
(32, 'complete', 0, 7, 'Student', 3, '21-09-2020'),
(33, 'complete', 1, 7, 'Student', 2, ''),
(34, 'complete', 1, 7, 'Student', 2, ''),
(35, 'current', 1, 2, 'principal', 3, '25-09-2020'),
(36, 'current', 6, 16, 'student', 2, '05-10-2020'),
(37, 'current', 6, 16, 'student', 2, '05-10-2020'),
(38, 'current', 6, 16, 'student', 2, '05-10-2020'),
(39, 'current', 6, 16, 'student', 2, '05-10-2020'),
(40, 'current', 6, 16, 'student', 2, '05-10-2020'),
(41, 'current', 6, 16, 'student', 2, '05-10-2020');

-- --------------------------------------------------------

--
-- Table structure for table `logins`
--

CREATE TABLE `logins` (
  `id` int(11) NOT NULL,
  `type` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `logins`
--

INSERT INTO `logins` (`id`, `type`) VALUES
(1, 'super admin'),
(2, 'district admin'),
(3, 'district admin'),
(4, 'district admin'),
(5, 'super admin'),
(6, 'super admin'),
(7, 'super admin'),
(8, 'super admin'),
(9, 'super admin'),
(10, 'super admin'),
(11, 'super admin'),
(12, 'super admin'),
(13, 'super admin'),
(14, 'super admin'),
(15, 'super admin'),
(16, 'super admin'),
(17, 'super admin'),
(18, 'super admin'),
(19, 'super admin'),
(20, 'super admin'),
(21, 'super admin'),
(22, 'super admin'),
(23, 'super admin'),
(24, 'super admin'),
(25, 'super admin'),
(26, 'super admin'),
(27, 'principal'),
(28, 'principal'),
(29, 'district admin'),
(30, 'super admin'),
(31, 'super admin'),
(32, 'super admin'),
(33, 'super admin');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `detail` varchar(5000) NOT NULL,
  `image` varchar(100) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE `notification` (
  `id` int(11) NOT NULL,
  `dist` varchar(100) DEFAULT NULL,
  `school` varchar(100) DEFAULT NULL,
  `user` varchar(50) NOT NULL,
  `text` varchar(500) NOT NULL,
  `date` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `notification`
--

INSERT INTO `notification` (`id`, `dist`, `school`, `user`, `text`, `date`) VALUES
(2, 'Lahore', 'all', 'Students  ', 'ccc', '09-09-2020'),
(3, 'Lahore', 'all', 'Students  Parents  Community Members  Teachers  Pr', 'hy', '09-15-2020'),
(4, 'all', 'all', 'Students  Parents  Community Members  Teachers  Pr', 'hello arsalan', '09-15-2020'),
(5, 'all', 'all', 'Students  Parents  Community Members  Teachers  Pr', 'r33ff3', '09-16-2020'),
(6, 'Lahore', 'all', 'Students  Community Members  ', 'lkjkj', '09-16-2020'),
(7, 'all', 'all', 'Students  ', 'hello arsalan', '09-16-2020'),
(8, 'all', 'all', 'Students  Parents  Community Members  Teachers  Pr', 'hello all users', '09-16-2020'),
(9, 'all', 'all', 'Students  Parents  Community Members  Teachers  Pr', 'hello all users', '09-16-2020'),
(10, 'Lahore', 'Lahore School', 'Students  Parents  Community Members  Teachers  Pr', 'jghh', '09-16-2020'),
(11, 'Lahore', 'all', 'Students  Parents  Community Members  Teachers  Pr', '555', '09-20-2020'),
(12, 'Lahore', 'Lahore School', 'Students  ', 'five five five', '09-20-2020'),
(13, 'Lahore', 'Lahore School', 'Students  ', 'only five', '09-20-2020'),
(14, 'Lahore', 'UOL', 'Students  Parents  Community Members  Teachers  Pr', 'Hey, this is NIck!', '09-25-2020');

-- --------------------------------------------------------

--
-- Table structure for table `parent`
--

CREATE TABLE `parent` (
  `parent_id` int(11) NOT NULL,
  `parent_anonymous_name` varchar(100) NOT NULL,
  `parent_email` varchar(100) NOT NULL,
  `parent_password` varchar(100) NOT NULL,
  `country_name` varchar(100) NOT NULL,
  `parent_state` varchar(100) NOT NULL,
  `parent_district` varchar(100) NOT NULL,
  `parent_reset_password` bit(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `parent`
--

INSERT INTO `parent` (`parent_id`, `parent_anonymous_name`, `parent_email`, `parent_password`, `country_name`, `parent_state`, `parent_district`, `parent_reset_password`) VALUES
(1, 'lahoreparent', 'lahoreparent@gmail.com', 'As123456@', 'Pakistan', 'xyz', 'Lahore', b'0'),
(2, 'lahoreparent1', 'lahoreparent1@gmail.com', '123456', 'Pakistan', 'xyz', 'Lahore', b'0'),
(3, 'lahoreparent23', 'lahoreparent2@gmail.com', '123456', 'Pakistan', 'xyz', 'Lahore', b'0'),
(4, 'ajmal', 'areebahajmal777@gmail.com', '345678', 'Pakistan', 'xyz', 'Lahore', b'0');

-- --------------------------------------------------------

--
-- Table structure for table `principal`
--

CREATE TABLE `principal` (
  `principal_id` int(11) NOT NULL,
  `principal_name` varchar(100) NOT NULL,
  `principal_email` varchar(100) NOT NULL,
  `principal_password` varchar(100) NOT NULL,
  `country_name` varchar(100) NOT NULL,
  `principal_state` varchar(100) DEFAULT NULL,
  `principal_district` varchar(100) NOT NULL,
  `school_id` int(11) NOT NULL,
  `principal_joiningDate` date NOT NULL,
  `principal_account` varchar(25) DEFAULT NULL,
  `principal_reset_password` bit(1) NOT NULL,
  `block` int(11) NOT NULL,
  `language` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `principal`
--

INSERT INTO `principal` (`principal_id`, `principal_name`, `principal_email`, `principal_password`, `country_name`, `principal_state`, `principal_district`, `school_id`, `principal_joiningDate`, `principal_account`, `principal_reset_password`, `block`, `language`) VALUES
(1, 'Arsalan Don', 'arsalan@lahore.com', 'e10adc3949ba59abbe56e057f20f883e', 'Pakistan', NULL, 'Lahore', 1, '2020-08-28', 'approved', b'0', 0, NULL),
(2, 'UOL Principal', 'uolprincipal@gmail.com', 'c1dbafd257cba14da20c0b0f4cad73ed', 'Pakistan', NULL, 'Lahore', 2, '2020-09-25', 'approved', b'0', 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `reportabsence`
--

CREATE TABLE `reportabsence` (
  `reportAbsence_id` int(11) NOT NULL,
  `reporter_id` int(11) NOT NULL,
  `reporter_role` varchar(50) NOT NULL,
  `teacher_id` int(11) NOT NULL,
  `reportAbsence_date` date NOT NULL,
  `reportAbsence_shift` varchar(100) NOT NULL,
  `report_time` varchar(100) NOT NULL,
  `attendance_status` varchar(50) NOT NULL,
  `teacher_claim` varchar(100) NOT NULL,
  `resolve` varchar(20) DEFAULT NULL,
  `school_id` int(11) NOT NULL,
  `positiveCount` int(11) NOT NULL,
  `negativeCount` int(11) NOT NULL,
  `notification_status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reportabsence`
--

INSERT INTO `reportabsence` (`reportAbsence_id`, `reporter_id`, `reporter_role`, `teacher_id`, `reportAbsence_date`, `reportAbsence_shift`, `report_time`, `attendance_status`, `teacher_claim`, `resolve`, `school_id`, `positiveCount`, `negativeCount`, `notification_status`) VALUES
(14, 4, 'Student', 2, '2020-09-15', 'Afternoon', '02:40:40 PM', 'absent', 'Negated Absence', 'yes', 1, 1, 0, 'expired'),
(15, 3, 'Student', 2, '2020-09-16', 'Afternoon', '03:02:57 PM', 'absent', 'Negated Absence', 'no', 1, 1, 0, 'expired'),
(16, 3, 'Student', 2, '2020-09-17', 'Morning, ', '03:19:00 PM', 'absent', 'Negated Absence', 'no', 1, 1, 0, 'expired'),
(17, 4, 'Student', 3, '2020-09-17', 'Morning, Afternoon', '05:42:45 PM', 'absent', 'Personal Time Off', 'no', 1, 1, 0, 'expired'),
(18, 4, 'Student', 3, '2020-09-19', 'Morning, Afternoon', '12:13:02 PM', 'absent', '', 'no', 1, 2, 0, 'expired'),
(19, 4, 'Student', 2, '2020-09-20', 'Morning, Afternoon', '05:46:58 PM', 'absent', 'No Response', 'no', 1, 1, 1, 'expired'),
(20, 7, 'Student', 3, '2020-09-18', 'Morning, Afternoon', '05:49:14 PM', 'absent', 'No Response', 'no', 1, 0, 0, 'expired'),
(21, 10, 'Student', 2, '2020-09-21', 'Morning, ', '04:45:49 PM', 'absent', 'No Response', 'no', 1, 0, 0, 'expired'),
(22, 10, 'Student', 3, '2020-09-20', 'Morning, Afternoon', '04:48:05 PM', 'absent', 'No Response', 'no', 1, 0, 0, 'expired'),
(23, 12, 'Student', 5, '2020-09-25', 'Morning,Afternoon', '03:47:15 PM', 'absent', 'Negated Absence', 'no', 2, 2, 0, 'expired'),
(24, 13, 'Student', 5, '2020-09-23', 'Morning, Afternoon', '05:52:32 PM', 'absent', 'Negated Absence', 'no', 2, 1, 0, 'expired'),
(25, 13, 'Student', 5, '2020-09-24', 'Morning, Afternoon', '05:55:51 PM', 'absent', 'Negated Absence', 'no', 2, 4, 1, 'expired');

-- --------------------------------------------------------

--
-- Table structure for table `schedule`
--

CREATE TABLE `schedule` (
  `id` int(11) NOT NULL,
  `session_start` date NOT NULL,
  `session_end` date NOT NULL,
  `summer_start` date DEFAULT NULL,
  `summer_end` date DEFAULT NULL,
  `winter_start` date DEFAULT NULL,
  `winter_end` date DEFAULT NULL,
  `dist_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `schedule`
--

INSERT INTO `schedule` (`id`, `session_start`, `session_end`, `summer_start`, `summer_end`, `winter_start`, `winter_end`, `dist_id`) VALUES
(2, '2020-08-29', '2020-09-30', '2020-01-01', '2020-02-01', '2020-10-02', '2020-11-26', 2);

-- --------------------------------------------------------

--
-- Table structure for table `school`
--

CREATE TABLE `school` (
  `school_id` int(11) NOT NULL,
  `school_name` varchar(100) NOT NULL,
  `country_name` varchar(100) NOT NULL,
  `school_state` varchar(100) DEFAULT NULL,
  `school_district` varchar(50) NOT NULL,
  `school_image` varchar(500) DEFAULT 'school_default.png',
  `attendance_percentage` int(50) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `school`
--

INSERT INTO `school` (`school_id`, `school_name`, `country_name`, `school_state`, `school_district`, `school_image`, `attendance_percentage`) VALUES
(1, 'Lahore School', 'Pakistan', NULL, 'Lahore', 'school_default.png', 97),
(2, 'UOL', 'Pakistan', NULL, 'Lahore', 'school_default.png', 99);

-- --------------------------------------------------------

--
-- Table structure for table `schoolfeedback`
--

CREATE TABLE `schoolfeedback` (
  `school_feedback_id` int(11) NOT NULL,
  `teacher_id` int(11) DEFAULT NULL,
  `student_id` int(11) DEFAULT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `principal_id` int(11) DEFAULT NULL,
  `communityMember_id` int(11) DEFAULT NULL,
  `feedback_type` varchar(100) DEFAULT NULL,
  `schoolFeedback_rating` int(11) NOT NULL,
  `schoolFeedback_review` varchar(200) NOT NULL,
  `feedback_date` varchar(50) DEFAULT NULL,
  `school_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `schoolfeedback`
--

INSERT INTO `schoolfeedback` (`school_feedback_id`, `teacher_id`, `student_id`, `parent_id`, `principal_id`, `communityMember_id`, `feedback_type`, `schoolFeedback_rating`, `schoolFeedback_review`, `feedback_date`, `school_id`) VALUES
(1, NULL, 1, NULL, NULL, NULL, 'Public', 3, 'Three star', '2020-08-28', 1),
(2, NULL, NULL, NULL, 1, NULL, 'Public', 4, 'hello test my feedback', '2020-08-31', 1),
(3, NULL, 12, NULL, NULL, NULL, 'Public', 3, 'Feedback 1 for Lahore school', '2020:09:25', 1);

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `student_id` int(11) NOT NULL,
  `student_anonymous_name` varchar(50) NOT NULL,
  `student_email` varchar(100) NOT NULL,
  `student_password` varchar(100) NOT NULL,
  `country_name` varchar(100) NOT NULL,
  `school_id` int(11) DEFAULT NULL,
  `student_state` varchar(50) NOT NULL,
  `student_district` varchar(100) NOT NULL,
  `student_reset_password` bit(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`student_id`, `student_anonymous_name`, `student_email`, `student_password`, `country_name`, `school_id`, `student_state`, `student_district`, `student_reset_password`) VALUES
(1, 'lahorestudent', 'lahorestudent@gmail.com', 'As123456@', 'Pakistan', 2, 'xyz', 'Lahore', b'0'),
(2, 'arslan', 'arslan@gmail.com', '123456', 'Pakistan', 1, '', 'Lahore', b'0'),
(3, 'lahorestudent1', 'lahorestudent1@gmail.com', 'As123456@', 'Pakistan', 1, 'xyz', 'Lahore', b'0'),
(4, 'lahorestudent2', 'lahorestudent12@gmail.com', 'As123456@', 'Pakistan', 1, 'xyz', 'Lahore', b'0'),
(5, 'lahorestudent3', 'lahorestudent3@gmail.com', 'As123456@', 'Pakistan', 2, 'xyz', 'Lahore', b'0'),
(6, 'arslan1', 'arslan1@gmail.com', 'arslan123', 'Pakistan', 1, '', 'Lahore', b'0'),
(7, 'arslanraza', 'arslanraza@gmail.com', '12345678', 'Pakistan', 1, '', 'Lahore', b'0'),
(8, 'waqas', 'waqas@gmail.com', '12345678', 'Pakistan', 1, '', 'Lahore', b'0'),
(9, 'ammar ', 'ammar@gmail.com', '123456', 'Pakistan', 1, '', 'Lahore', b'0'),
(10, 'areebah', 'areebahajmal77@gmail.com', 'areebah12', 'Pakistan', 1, 'xyz', 'Lahore', b'0'),
(11, 'Nickbanglastudent', 'nickcanfield29@gmail.com', '12345', 'Pakistan', 1, 'xyz', 'Lahore', b'0'),
(12, 'nick', 'nick@gmail.com', '123456', 'Pakistan', 2, '', 'Lahore', b'0'),
(13, 'Uolstudent2', 'uolatudnet@gmail.com', '123456', 'Pakistan', 2, 'xyz', 'Lahore', b'0'),
(14, 'abbas', 'mmaoun344@gmail.com', 'pahoreisbak', 'Pakistan', 2, 'xyz', 'Lahore', b'0'),
(15, 'ali', 'Abbas@gmail.com', '12345', 'Pakistan', 1, 'xyz', 'Lahore', b'0'),
(16, 'aliabbas', 'ali@gmail.com', '12345', 'Pakistan', 1, 'xyz', 'Lahore', b'0');

-- --------------------------------------------------------

--
-- Table structure for table `super`
--

CREATE TABLE `super` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `block` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `super`
--

INSERT INTO `super` (`id`, `username`, `password`, `email`, `block`) VALUES
(1, 'super_1', '3b712de48137572f3849aabd5666a4e3', 'super@gmail.com', 0),
(2, 'super_nick', '3b712de48137572f3849aabd5666a4e3', 'nickcanfield29@gmail.com', 2);

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

CREATE TABLE `teacher` (
  `teacher_id` int(11) NOT NULL,
  `school_id` int(11) NOT NULL,
  `teacher_firstName` varchar(100) NOT NULL,
  `teacher_lastName` varchar(100) NOT NULL,
  `teacher_absence` int(11) DEFAULT 0,
  `teacher_email` varchar(100) NOT NULL,
  `teacher_password` varchar(100) NOT NULL,
  `teacher_state` varchar(100) DEFAULT NULL,
  `teacher_district` varchar(100) NOT NULL,
  `country_name` varchar(100) NOT NULL,
  `teacher_shift` varchar(100) DEFAULT NULL,
  `teacher_image` varchar(500) DEFAULT 'teacher_default.png',
  `joining_date` date NOT NULL,
  `follow_status` varchar(50) DEFAULT NULL,
  `teacher_account` varchar(25) NOT NULL,
  `teacher_reset_password` bit(1) NOT NULL,
  `teacher_dispute` int(11) DEFAULT NULL,
  `attendance_percentage` int(50) DEFAULT 100
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`teacher_id`, `school_id`, `teacher_firstName`, `teacher_lastName`, `teacher_absence`, `teacher_email`, `teacher_password`, `teacher_state`, `teacher_district`, `country_name`, `teacher_shift`, `teacher_image`, `joining_date`, `follow_status`, `teacher_account`, `teacher_reset_password`, `teacher_dispute`, `attendance_percentage`) VALUES
(2, 1, 'Teacher ', 'Lahore school', 3, 'teacher@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', NULL, 'Lahore', 'Pakistan', NULL, 'teacher_default.png', '2020-08-11', NULL, 'approved', b'0', 0, 99),
(3, 1, 'Teacher ', 'kamal', 4, 'teacher2@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', NULL, 'Lahore', 'Pakistan', NULL, 'teacher_default.png', '2020-05-01', NULL, 'approved', b'0', NULL, 98),
(4, 1, 'UOL Teacher 1', 'Last', 0, 'uolteacher@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', NULL, 'Lahore', 'Pakistan', NULL, 'teacher_default.png', '2020-09-25', NULL, 'approved', b'0', NULL, 100),
(5, 2, 'UOL Teacher 2', 'Last', 3, 'uolteacher2@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', NULL, 'Lahore', 'Pakistan', NULL, 'teacher_default.png', '2020-09-25', NULL, 'approved', b'0', 5, 99);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `student_id` int(11) DEFAULT NULL,
  `dist_id` int(11) DEFAULT NULL,
  `teacher_id` int(11) DEFAULT NULL,
  `communityMember_id` int(11) DEFAULT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `principal_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`student_id`, `dist_id`, `teacher_id`, `communityMember_id`, `parent_id`, `principal_id`) VALUES
(1, NULL, NULL, NULL, NULL, NULL),
(NULL, NULL, NULL, NULL, 1, NULL),
(11, NULL, NULL, NULL, NULL, NULL),
(13, NULL, NULL, NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appfeedback`
--
ALTER TABLE `appfeedback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `communitymember`
--
ALTER TABLE `communitymember`
  ADD PRIMARY KEY (`communityMember_id`),
  ADD UNIQUE KEY `communityMember_anonymous_name` (`communityMember_anonymous_name`),
  ADD UNIQUE KEY `communityMember_email` (`communityMember_email`),
  ADD KEY `country_name` (`country_name`);

--
-- Indexes for table `confirmreporter`
--
ALTER TABLE `confirmreporter`
  ADD PRIMARY KEY (`id`),
  ADD KEY `reportAbsence_id` (`reportAbsence_id`);

--
-- Indexes for table `country`
--
ALTER TABLE `country`
  ADD PRIMARY KEY (`country_id`),
  ADD UNIQUE KEY `country_name` (`country_name`);

--
-- Indexes for table `district`
--
ALTER TABLE `district`
  ADD PRIMARY KEY (`dist_id`),
  ADD UNIQUE KEY `dist_name` (`dist_name`),
  ADD KEY `country_name` (`country_name`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`feedback_id`),
  ADD KEY `teacher_id` (`teacher_id`),
  ADD KEY `student_id` (`student_id`),
  ADD KEY `parent_id` (`parent_id`),
  ADD KEY `communityMember_id` (`communityMember_id`),
  ADD KEY `principal_id` (`principal_id`);

--
-- Indexes for table `follow`
--
ALTER TABLE `follow`
  ADD PRIMARY KEY (`follow_id`),
  ADD KEY `student_id` (`student_id`),
  ADD KEY `teacher_id` (`teacher_id`),
  ADD KEY `communityMember_id` (`communityMember_id`),
  ADD KEY `parent_id` (`parent_id`),
  ADD KEY `school_id` (`school_id`),
  ADD KEY `principal_id` (`principal_id`);

--
-- Indexes for table `gazettedholidays`
--
ALTER TABLE `gazettedholidays`
  ADD PRIMARY KEY (`id`),
  ADD KEY `dist_id` (`dist_id`);

--
-- Indexes for table `habit`
--
ALTER TABLE `habit`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `habitstatus`
--
ALTER TABLE `habitstatus`
  ADD PRIMARY KEY (`status_id`),
  ADD KEY `habit_id` (`habit_id`);

--
-- Indexes for table `logins`
--
ALTER TABLE `logins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `parent`
--
ALTER TABLE `parent`
  ADD PRIMARY KEY (`parent_id`),
  ADD UNIQUE KEY `parent_anonymous_name` (`parent_anonymous_name`),
  ADD UNIQUE KEY `parent_email` (`parent_email`),
  ADD KEY `country_name` (`country_name`);

--
-- Indexes for table `principal`
--
ALTER TABLE `principal`
  ADD PRIMARY KEY (`principal_id`),
  ADD KEY `school_id` (`school_id`),
  ADD KEY `country_name` (`country_name`);

--
-- Indexes for table `reportabsence`
--
ALTER TABLE `reportabsence`
  ADD PRIMARY KEY (`reportAbsence_id`),
  ADD KEY `teacher_id` (`teacher_id`),
  ADD KEY `school_id` (`school_id`);

--
-- Indexes for table `schedule`
--
ALTER TABLE `schedule`
  ADD PRIMARY KEY (`id`),
  ADD KEY `dist_id` (`dist_id`);

--
-- Indexes for table `school`
--
ALTER TABLE `school`
  ADD PRIMARY KEY (`school_id`),
  ADD UNIQUE KEY `school_name` (`school_name`),
  ADD KEY `country_name` (`country_name`);

--
-- Indexes for table `schoolfeedback`
--
ALTER TABLE `schoolfeedback`
  ADD PRIMARY KEY (`school_feedback_id`),
  ADD KEY `teacher_id` (`teacher_id`),
  ADD KEY `student_id` (`student_id`),
  ADD KEY `parent_id` (`parent_id`),
  ADD KEY `principal_id` (`principal_id`),
  ADD KEY `communityMember_id` (`communityMember_id`),
  ADD KEY `school_id` (`school_id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`student_id`),
  ADD UNIQUE KEY `student_anonymous_name` (`student_anonymous_name`),
  ADD KEY `school_id` (`school_id`),
  ADD KEY `country_name` (`country_name`);

--
-- Indexes for table `super`
--
ALTER TABLE `super`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teacher`
--
ALTER TABLE `teacher`
  ADD PRIMARY KEY (`teacher_id`),
  ADD KEY `school_id` (`school_id`),
  ADD KEY `country_name` (`country_name`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD KEY `student_id` (`student_id`),
  ADD KEY `teacher_id` (`teacher_id`),
  ADD KEY `communityMember_id` (`communityMember_id`),
  ADD KEY `parent_id` (`parent_id`),
  ADD KEY `principal_id` (`principal_id`),
  ADD KEY `dist_id` (`dist_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appfeedback`
--
ALTER TABLE `appfeedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `blog`
--
ALTER TABLE `blog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `communitymember`
--
ALTER TABLE `communitymember`
  MODIFY `communityMember_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `confirmreporter`
--
ALTER TABLE `confirmreporter`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `country`
--
ALTER TABLE `country`
  MODIFY `country_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `district`
--
ALTER TABLE `district`
  MODIFY `dist_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `feedback_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `follow`
--
ALTER TABLE `follow`
  MODIFY `follow_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `gazettedholidays`
--
ALTER TABLE `gazettedholidays`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `habit`
--
ALTER TABLE `habit`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `habitstatus`
--
ALTER TABLE `habitstatus`
  MODIFY `status_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `logins`
--
ALTER TABLE `logins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `notification`
--
ALTER TABLE `notification`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `parent`
--
ALTER TABLE `parent`
  MODIFY `parent_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `principal`
--
ALTER TABLE `principal`
  MODIFY `principal_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `reportabsence`
--
ALTER TABLE `reportabsence`
  MODIFY `reportAbsence_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `schedule`
--
ALTER TABLE `schedule`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `school`
--
ALTER TABLE `school`
  MODIFY `school_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `schoolfeedback`
--
ALTER TABLE `schoolfeedback`
  MODIFY `school_feedback_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `student_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `super`
--
ALTER TABLE `super`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `teacher`
--
ALTER TABLE `teacher`
  MODIFY `teacher_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `communitymember`
--
ALTER TABLE `communitymember`
  ADD CONSTRAINT `communitymember_ibfk_1` FOREIGN KEY (`country_name`) REFERENCES `country` (`country_name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `confirmreporter`
--
ALTER TABLE `confirmreporter`
  ADD CONSTRAINT `confirmreporter_ibfk_1` FOREIGN KEY (`reportAbsence_id`) REFERENCES `reportabsence` (`reportAbsence_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `district`
--
ALTER TABLE `district`
  ADD CONSTRAINT `district_ibfk_1` FOREIGN KEY (`country_name`) REFERENCES `country` (`country_name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `feedback`
--
ALTER TABLE `feedback`
  ADD CONSTRAINT `feedback_ibfk_1` FOREIGN KEY (`teacher_id`) REFERENCES `teacher` (`teacher_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `feedback_ibfk_2` FOREIGN KEY (`student_id`) REFERENCES `student` (`student_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `feedback_ibfk_3` FOREIGN KEY (`parent_id`) REFERENCES `parent` (`parent_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `feedback_ibfk_4` FOREIGN KEY (`communityMember_id`) REFERENCES `communitymember` (`communityMember_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `feedback_ibfk_5` FOREIGN KEY (`principal_id`) REFERENCES `principal` (`principal_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `follow`
--
ALTER TABLE `follow`
  ADD CONSTRAINT `follow_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `student` (`student_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `follow_ibfk_2` FOREIGN KEY (`teacher_id`) REFERENCES `teacher` (`teacher_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `follow_ibfk_3` FOREIGN KEY (`communityMember_id`) REFERENCES `communitymember` (`communityMember_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `follow_ibfk_4` FOREIGN KEY (`parent_id`) REFERENCES `parent` (`parent_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `follow_ibfk_5` FOREIGN KEY (`school_id`) REFERENCES `school` (`school_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `follow_ibfk_6` FOREIGN KEY (`principal_id`) REFERENCES `principal` (`principal_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `gazettedholidays`
--
ALTER TABLE `gazettedholidays`
  ADD CONSTRAINT `gazettedholidays_ibfk_1` FOREIGN KEY (`dist_id`) REFERENCES `district` (`dist_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `habitstatus`
--
ALTER TABLE `habitstatus`
  ADD CONSTRAINT `habitstatus_ibfk_1` FOREIGN KEY (`habit_id`) REFERENCES `habit` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `parent`
--
ALTER TABLE `parent`
  ADD CONSTRAINT `parent_ibfk_1` FOREIGN KEY (`country_name`) REFERENCES `country` (`country_name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `principal`
--
ALTER TABLE `principal`
  ADD CONSTRAINT `principal_ibfk_1` FOREIGN KEY (`school_id`) REFERENCES `school` (`school_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `principal_ibfk_2` FOREIGN KEY (`country_name`) REFERENCES `country` (`country_name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `reportabsence`
--
ALTER TABLE `reportabsence`
  ADD CONSTRAINT `reportAbsence_ibfk_1` FOREIGN KEY (`teacher_id`) REFERENCES `teacher` (`teacher_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `zishan` FOREIGN KEY (`school_id`) REFERENCES `school` (`school_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `schedule`
--
ALTER TABLE `schedule`
  ADD CONSTRAINT `schedule_ibfk_1` FOREIGN KEY (`dist_id`) REFERENCES `district` (`dist_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `school`
--
ALTER TABLE `school`
  ADD CONSTRAINT `school_ibfk_1` FOREIGN KEY (`country_name`) REFERENCES `country` (`country_name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `schoolfeedback`
--
ALTER TABLE `schoolfeedback`
  ADD CONSTRAINT `schoolFeedback_ibfk_1` FOREIGN KEY (`communityMember_id`) REFERENCES `communitymember` (`communityMember_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `schoolFeedback_ibfk_2` FOREIGN KEY (`parent_id`) REFERENCES `parent` (`parent_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `schoolFeedback_ibfk_3` FOREIGN KEY (`principal_id`) REFERENCES `principal` (`principal_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `schoolFeedback_ibfk_4` FOREIGN KEY (`school_id`) REFERENCES `school` (`school_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `schoolFeedback_ibfk_5` FOREIGN KEY (`student_id`) REFERENCES `student` (`student_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `schoolFeedback_ibfk_6` FOREIGN KEY (`teacher_id`) REFERENCES `teacher` (`teacher_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `student`
--
ALTER TABLE `student`
  ADD CONSTRAINT `student_ibfk_1` FOREIGN KEY (`school_id`) REFERENCES `school` (`school_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `student_ibfk_2` FOREIGN KEY (`country_name`) REFERENCES `country` (`country_name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `teacher`
--
ALTER TABLE `teacher`
  ADD CONSTRAINT `fk` FOREIGN KEY (`school_id`) REFERENCES `school` (`school_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `teacher_ibfk_1` FOREIGN KEY (`country_name`) REFERENCES `country` (`country_name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `student` (`student_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_ibfk_2` FOREIGN KEY (`parent_id`) REFERENCES `parent` (`parent_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_ibfk_3` FOREIGN KEY (`communityMember_id`) REFERENCES `communitymember` (`communityMember_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_ibfk_4` FOREIGN KEY (`principal_id`) REFERENCES `principal` (`principal_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_ibfk_5` FOREIGN KEY (`teacher_id`) REFERENCES `teacher` (`teacher_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_ibfk_6` FOREIGN KEY (`dist_id`) REFERENCES `district` (`dist_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
