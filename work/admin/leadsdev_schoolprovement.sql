-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 22, 2020 at 04:15 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `leadsdev_schoolprovement`
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
(1, 'this is my comment first hello'),
(2, 'this is very good app'),
(4, 'this'),
(5, 'this is app feedback testing'),
(6, 'You are working on a Great Cause'),
(7, 'Hi amazimg app'),
(8, 'Excellent '),
(9, 'Hi this feednack from a teacher'),
(10, 'Good');

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

--
-- Dumping data for table `blog`
--

INSERT INTO `blog` (`id`, `author`, `date`, `title`, `detail`, `image`) VALUES
(6, 'Khubaib', '2020-03-27', 'the teacher\'s blog', 'the final type of blog we often see are these awesome places for learning, run by teaching staff. They are often of a similar vein to the head\'s blog secondary function - to be channels to share expertise.  teach high school math. I\'ve written two books that support new teachers. I\'m also a proud recipient of the master teacher fellowship from Math For America. Frequency 4 posts / quarter', 'teacher.jpg'),
(8, 'Khubaib', '2020-03-27', 'the pupil\'s blog', 'who better to blog topics from (and about) your school than the very people that you have a school for? We love pupil blogs but do not see them nearly enough.\r\n\r\nWhen done well, it becomes a place that can: Educational consultant specializing in the Common Core State Standards for Mathematics and real-world problem-based learning. I do this while continuing to work full time for a K-12 school district in Southern California as a mathematics teacher specialist. Frequency 1 post / month', 'student.jpg'),
(9, 'dsafcds', '2020-03-27', 'the head\'s blog', 'for many schools, their head / principal is a leader of not only the school itself but of the education sector. We work with many amazing head teachers who are thought leaders and influencers in all sorts of topics, ranging from education technologies to leadership; women in STEM to creativity in the classroom.This is Alfred Thompson\'s blog about computer science education and related topics. High school CS teacher, Education blogger, author, CS education activist, speaker, husband & father of teachers', 'head.jpg'),
(10, 'MUHAMMAD MOEEZ', '2020-04-10', 'Larry Ferlazzo | English Education Blog', 'Larry Ferlazzo talks about websites that will help you teach ELL, ESL and EFL. I teach English, Social Studies and International Baccalaureate classes to English Language Learners and mainstream students at Luther Burbank High School in Sacramento. Frequency 5 posts / day', 'english.jpg'),
(11, 'ahmed', '2020-04-11', 'World History Teachers Blog', 'This is a page a webpage written by high school teachers for those who teach world history and want to find online content as well as technology that you can use in the classroom.Dan who is a former high school math teacher updates on innovations, ideas, and news in math teaching. Dan Meyer has a solid blog that appeals to both his inner nerd as well as the greedy little kid who wants something he can take and apply.', 'world.jpg'),
(13, 'nick', '2020-04-18', 'Nick Goes To Washington', 'Nick went to D.C. He never wants to go back.', 'nick.jpg');

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
(13, 'ali', 'ali123@gmail.com', '12345', 'Pakistan', 'sindh', '', b'0'),
(14, 'moeez', 'muhammadmoeez64@gmail.com', 'moeez123', 'Pakistan', 'xyz', 'Lahore', b'0'),
(15, 'Laiba', 'laiba@gmail.com', '12345', 'Pakistan', 'xyz', 'Lahore', b'0'),
(16, 'com1', 'amiri7856@gmail.com', '12345', 'Pakistan', 'xyz', '', b'0'),
(17, 'Horiya', 'horiya@gmail.com', '12345', 'Pakistan', 'xyz', 'Sampson School District', b'0'),
(18, 'Com22', 'com@gmail.com', '123', 'Pakistan', 'xyz', 'Lahore', b'0');

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
(1, 'Pakistan', 92),
(2, 'India', 91);

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
  `block` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `district`
--

INSERT INTO `district` (`dist_id`, `dist_name`, `country_name`, `dist_state`, `dist_userName`, `dist_password`, `dist_email`, `dist_account`, `dist_reset_password`, `block`) VALUES
(5, 'Lahore', 'Pakistan', 'Punjab', 'district_lahore', '1122', NULL, 'approved', b'0', 0),
(8, 'Sampson School District', 'India', 'Punjab', 'district_sampson', '1122', 'sampson@gmail.com', 'approved', b'0', 0),
(11, 'multan', 'pakistan', 'punjab', 'district_multan', '12345', 'haider@gmail.com', 'approved', b'0', 0);

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

--
-- Dumping data for table `entities`
--

INSERT INTO `entities` (`school`, `teacher`, `student`, `communityMember`) VALUES
(100, 1000, 10000, 500);

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
(286, NULL, NULL, NULL, 18, NULL, NULL, 11, 'school'),
(287, NULL, NULL, NULL, 18, NULL, NULL, 11, 'school'),
(288, NULL, NULL, NULL, 18, NULL, NULL, 18, 'school'),
(289, NULL, NULL, NULL, 18, NULL, NULL, 11, 'school'),
(290, NULL, NULL, NULL, 18, NULL, NULL, 12, 'school'),
(324, 74, NULL, NULL, NULL, NULL, NULL, 19, 'teacher'),
(326, 73, NULL, NULL, NULL, NULL, NULL, 19, 'teacher'),
(327, 74, NULL, NULL, NULL, NULL, NULL, 18, 'school'),
(328, 74, NULL, NULL, NULL, NULL, NULL, 15, 'school'),
(329, 41, NULL, NULL, NULL, NULL, NULL, 19, 'teacher'),
(330, 41, NULL, NULL, NULL, NULL, NULL, 11, 'school'),
(336, 73, NULL, NULL, NULL, NULL, NULL, 19, 'teacher'),
(347, 77, NULL, NULL, NULL, NULL, NULL, 19, 'teacher'),
(360, NULL, NULL, NULL, NULL, NULL, 4, 20, 'teacher'),
(361, 73, NULL, NULL, NULL, NULL, NULL, 20, 'teacher'),
(362, NULL, NULL, NULL, NULL, NULL, 4, 11, 'school'),
(370, 76, NULL, NULL, NULL, NULL, NULL, 21, 'teacher'),
(371, 76, NULL, NULL, NULL, NULL, NULL, 21, 'teacher'),
(373, 76, NULL, NULL, NULL, NULL, NULL, 22, 'teacher'),
(374, 76, NULL, NULL, NULL, NULL, NULL, 19, 'teacher'),
(375, 100, NULL, NULL, NULL, NULL, NULL, 21, 'teacher'),
(379, NULL, NULL, NULL, 30, NULL, NULL, 19, 'teacher'),
(380, NULL, NULL, NULL, 30, NULL, NULL, 20, 'teacher'),
(381, NULL, NULL, NULL, 30, NULL, NULL, 21, 'teacher'),
(383, 101, NULL, NULL, NULL, NULL, NULL, 22, 'teacher'),
(414, 78, NULL, NULL, NULL, NULL, NULL, 21, 'teacher'),
(418, 95, NULL, NULL, NULL, NULL, NULL, 11, 'school'),
(436, NULL, NULL, NULL, NULL, NULL, 4, 22, 'school'),
(439, 95, NULL, NULL, NULL, NULL, NULL, 22, 'teacher'),
(442, 95, NULL, NULL, NULL, NULL, NULL, 15, 'school'),
(443, 95, NULL, NULL, NULL, NULL, NULL, 22, 'school'),
(445, 95, NULL, NULL, NULL, NULL, NULL, 20, 'teacher'),
(448, 95, NULL, NULL, NULL, NULL, NULL, 22, 'teacher'),
(449, 95, NULL, NULL, NULL, NULL, NULL, 21, 'teacher'),
(452, 78, NULL, NULL, NULL, NULL, NULL, 19, 'teacher'),
(454, 78, NULL, NULL, NULL, NULL, NULL, 19, 'teacher'),
(457, 78, NULL, NULL, NULL, NULL, NULL, 22, 'teacher'),
(459, 113, NULL, NULL, NULL, NULL, NULL, 15, 'school'),
(460, 108, NULL, NULL, NULL, NULL, NULL, 11, 'school'),
(463, 113, NULL, NULL, NULL, NULL, NULL, 22, 'school'),
(464, 108, NULL, NULL, NULL, NULL, NULL, 22, 'teacher'),
(467, 113, NULL, NULL, NULL, NULL, NULL, 22, 'teacher'),
(468, 108, NULL, NULL, NULL, NULL, NULL, 29, 'teacher'),
(469, 108, NULL, NULL, NULL, NULL, NULL, 30, 'teacher'),
(470, 113, NULL, NULL, NULL, NULL, NULL, 23, 'teacher'),
(475, 108, NULL, NULL, NULL, NULL, NULL, 21, 'teacher'),
(477, 113, NULL, NULL, NULL, NULL, NULL, 28, 'teacher'),
(479, 113, NULL, NULL, NULL, NULL, NULL, 19, 'teacher'),
(480, 113, NULL, NULL, NULL, NULL, NULL, 20, 'teacher'),
(481, 113, NULL, NULL, NULL, NULL, NULL, 27, 'teacher'),
(482, 108, NULL, NULL, NULL, NULL, NULL, 24, 'school'),
(483, 113, NULL, NULL, NULL, NULL, NULL, 29, 'teacher'),
(485, 108, NULL, NULL, NULL, NULL, NULL, 27, 'teacher'),
(486, 108, NULL, NULL, NULL, NULL, NULL, 23, 'teacher'),
(497, NULL, NULL, NULL, 30, NULL, NULL, 25, 'teacher'),
(498, NULL, NULL, NULL, 33, NULL, NULL, 25, 'teacher'),
(499, 116, NULL, NULL, NULL, NULL, NULL, 25, 'teacher'),
(500, 115, NULL, NULL, NULL, NULL, NULL, 28, 'teacher'),
(501, 115, NULL, NULL, NULL, NULL, NULL, 11, 'school'),
(502, 115, NULL, NULL, NULL, NULL, NULL, 22, 'school'),
(505, NULL, NULL, NULL, 35, NULL, NULL, 19, 'teacher'),
(509, NULL, NULL, NULL, 35, NULL, NULL, 33, 'teacher'),
(512, NULL, NULL, NULL, NULL, NULL, 4, 22, 'school'),
(513, NULL, NULL, NULL, NULL, NULL, 8, 11, 'school'),
(514, 115, NULL, NULL, NULL, NULL, NULL, 25, 'teacher'),
(516, NULL, NULL, NULL, 36, NULL, NULL, 11, 'school'),
(518, 108, NULL, NULL, NULL, NULL, NULL, 19, 'teacher'),
(519, 108, NULL, NULL, NULL, NULL, NULL, 20, 'teacher'),
(521, 95, NULL, NULL, NULL, NULL, NULL, 19, 'teacher'),
(540, 108, NULL, NULL, NULL, NULL, NULL, 25, 'teacher'),
(541, 108, NULL, NULL, NULL, NULL, NULL, 28, 'teacher'),
(542, 108, NULL, NULL, NULL, NULL, NULL, 33, 'teacher');

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
(6, '2020-05-20', 'Wednesday', 'Eid holiday', 5),
(7, '2020-08-14', 'Friday', 'independence day', 5),
(8, '2020-09-06', 'Sunday', 'Defense day', 5),
(10, '2020-07-15', 'Thu', 'Holiday', 8),
(11, '2020-09-17', 'Thu', 'Holiday', 8),
(12, '2020-11-20', 'Thu', 'Holiday', 8),
(13, '2020-11-19', 'Thu', 'Holiday', 8),
(14, '2020-11-26', 'Thu', 'Holiday', 8);

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
(3, 'Exercise!', 'Exercise (even if just walking for 30 minutes) is show to improve your physical and mental health at school. Give it a try! https://www.psychologytoday.com/us/blog/the-athletes-way/201410/8-ways-exercise-can-help-your-child-do-better-in-school', '2/29/2020', 'true', 'true', 'true', 'true', 'true', 'true'),
(4, 'Corona Virus', 'Stay home stay safe!, Work from home', '1/15/2020', 'true', 'true', 'true', 'true', 'true', 'true'),
(5, 'COVID-19', 'work from home', '2/16/2020', 'true', NULL, 'true', NULL, NULL, NULL);

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
  `habit_id` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `habitstatus`
--

INSERT INTO `habitstatus` (`status_id`, `status`, `completed_days`, `user_id`, `user_role`, `habit_id`) VALUES
(105, 'current', 23, 78, 'student', 3),
(106, 'current', 23, 78, 'student', 3),
(112, 'current', 14, 41, 'student', 3),
(113, 'current', 11, 4, 'principal', 3),
(114, 'current', 22, 10, 'community', 4),
(115, 'current', 77, 95, 'student', 4),
(116, 'current', 1, 100, 'parent', 4),
(117, 'current', 6, 101, 'student', 3),
(118, 'current', 3, 104, 'student', 3),
(119, 'current', 3, 110, 'student', 3),
(120, 'current', 1, 95, 'parent', 3),
(121, 'complete', 1, 115, 'student', 5),
(122, 'current', 4, 113, 'student', 3),
(123, 'current', 4, 108, 'student', 3),
(124, 'current', 17, 114, 'student', 3),
(125, 'complete', 1, 115, 'student', 5),
(126, 'current', 1, 115, 'student', 3),
(127, 'current', 0, 20, 'teacher', 3),
(128, 'current', 1, 25, 'teacher', 3),
(129, 'current', 5, 34, 'parent', 3),
(130, 'current', 0, 8, 'parent', 3);

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
(1, 'super Admin'),
(2, 'super Admin'),
(3, 'district admin'),
(4, 'super admin'),
(5, 'principal'),
(6, 'principal'),
(7, 'super admin'),
(8, 'principal'),
(9, 'super admin'),
(10, 'principal'),
(11, 'super admin'),
(12, 'principal'),
(13, 'super admin'),
(14, 'principal'),
(15, 'principal'),
(16, 'principal'),
(17, 'principal'),
(18, 'super admin'),
(19, 'super admin'),
(20, 'principal'),
(21, 'principal'),
(22, 'super admin'),
(23, 'principal'),
(24, 'principal'),
(25, 'super admin'),
(26, 'principal'),
(27, 'principal'),
(28, 'principal'),
(29, 'principal'),
(30, 'principal'),
(31, 'super admin'),
(32, 'principal'),
(33, 'super admin'),
(34, 'super admin'),
(35, 'super admin'),
(36, 'principal'),
(37, 'principal'),
(38, 'principal'),
(39, 'super admin'),
(40, 'super admin'),
(41, 'super admin'),
(42, 'super admin'),
(43, 'super admin'),
(44, 'super admin'),
(45, 'super admin'),
(46, 'super admin'),
(47, 'super admin'),
(48, 'super admin'),
(49, 'super admin'),
(50, 'super admin'),
(51, 'super admin'),
(52, 'super admin'),
(53, 'super admin'),
(54, 'super admin'),
(55, 'super admin'),
(56, 'super admin'),
(57, 'super admin'),
(58, 'super admin'),
(59, 'super admin'),
(60, 'super admin'),
(61, 'super admin'),
(62, 'district admin'),
(63, 'super admin'),
(64, 'principal'),
(65, 'super admin'),
(66, 'super admin'),
(67, 'super admin'),
(68, 'super admin'),
(69, 'super admin'),
(70, 'super admin'),
(71, 'district admin'),
(72, 'super admin'),
(73, 'super admin'),
(74, 'super admin'),
(75, 'principal'),
(76, 'super admin'),
(77, 'principal'),
(78, 'super admin'),
(79, 'super admin'),
(80, 'super admin'),
(81, 'super admin'),
(82, 'super admin'),
(83, 'principal'),
(84, 'super admin'),
(85, 'district admin'),
(86, 'super admin'),
(87, 'super admin'),
(88, 'super admin'),
(89, 'super admin'),
(90, 'super admin'),
(91, 'super admin'),
(92, 'super admin'),
(93, 'principal'),
(94, 'super admin'),
(95, 'principal'),
(96, 'principal'),
(97, 'principal'),
(98, 'super admin'),
(99, 'principal'),
(100, 'super admin'),
(101, 'principal'),
(102, 'principal'),
(103, 'super admin'),
(104, 'principal'),
(105, 'principal'),
(106, 'super admin'),
(107, 'principal'),
(108, 'principal'),
(109, 'super admin'),
(110, 'super admin'),
(111, 'super admin'),
(112, 'super admin'),
(113, 'super admin'),
(114, 'principal'),
(115, 'principal'),
(116, 'super admin'),
(117, 'district admin'),
(118, 'district admin'),
(119, 'district admin'),
(120, 'super admin'),
(121, 'district admin'),
(122, 'super admin'),
(123, 'super admin'),
(124, 'super admin'),
(125, 'super admin'),
(126, 'super admin'),
(127, 'principal'),
(128, 'principal'),
(129, 'super admin'),
(130, 'super admin'),
(131, 'super admin'),
(132, 'super admin'),
(133, 'super admin'),
(134, 'district admin'),
(135, 'super admin'),
(136, 'super admin'),
(137, 'super admin'),
(138, 'super admin'),
(139, 'super admin'),
(140, 'super admin'),
(141, 'district admin'),
(142, 'super admin'),
(143, 'super admin'),
(144, 'super admin'),
(145, 'super admin'),
(146, 'super admin'),
(147, 'super admin'),
(148, 'super admin'),
(149, 'super admin'),
(150, 'super admin'),
(151, 'super admin'),
(152, 'super admin'),
(153, 'super admin'),
(154, 'super admin'),
(155, 'super admin'),
(156, 'super admin'),
(157, 'super admin'),
(158, 'super admin'),
(159, 'super admin'),
(160, 'super admin'),
(161, 'district admin'),
(162, 'district admin'),
(163, 'super admin'),
(164, 'super admin'),
(165, 'super admin'),
(166, 'super admin'),
(167, 'super admin'),
(168, 'super admin'),
(169, 'super admin'),
(170, 'district admin'),
(171, 'super admin'),
(172, 'principal'),
(173, 'super admin'),
(174, 'super admin'),
(175, 'super admin'),
(176, 'super admin'),
(177, 'super admin'),
(178, 'super admin'),
(179, 'super admin'),
(180, 'super admin'),
(181, 'super admin'),
(182, 'super admin'),
(183, 'super admin'),
(184, 'principal'),
(185, 'super admin'),
(186, 'super admin'),
(187, 'district admin'),
(188, 'super admin'),
(189, 'super admin'),
(190, 'super admin'),
(191, 'super admin'),
(192, 'super admin'),
(193, 'super admin'),
(194, 'super admin'),
(195, 'super admin'),
(196, 'super admin'),
(197, 'super admin'),
(198, 'super admin'),
(199, 'super admin'),
(200, 'super admin'),
(201, 'super admin'),
(202, 'district admin'),
(203, 'super admin'),
(204, 'super admin'),
(205, 'super admin'),
(206, 'district admin'),
(207, 'super admin'),
(208, 'principal'),
(209, 'district admin'),
(210, 'district admin'),
(211, 'district admin'),
(212, 'district admin'),
(213, 'district admin'),
(214, 'district admin'),
(215, 'district admin'),
(216, 'district admin'),
(217, 'district admin'),
(218, 'super admin'),
(219, 'principal'),
(220, 'principal'),
(221, 'principal'),
(222, 'district admin'),
(223, 'principal'),
(224, 'principal'),
(225, 'principal'),
(226, 'district admin'),
(227, 'district admin'),
(228, 'super admin'),
(229, 'district admin'),
(230, 'district admin'),
(231, 'super admin'),
(232, 'principal'),
(233, 'super admin'),
(234, 'super admin'),
(235, 'principal'),
(236, 'principal'),
(237, 'super admin'),
(238, 'district admin'),
(239, 'district admin'),
(240, 'district admin'),
(241, 'super admin'),
(242, 'super admin'),
(243, 'super admin'),
(244, 'super admin'),
(245, 'super admin'),
(246, 'super admin'),
(247, 'district admin'),
(248, 'district admin'),
(249, 'district admin'),
(250, 'district admin'),
(251, 'principal'),
(252, 'principal'),
(253, 'principal'),
(254, 'principal'),
(255, 'district admin'),
(256, 'super admin'),
(257, 'district admin'),
(258, 'super admin'),
(259, 'super admin'),
(260, 'super admin'),
(261, 'super admin'),
(262, 'super admin'),
(263, 'super admin'),
(264, 'super admin'),
(265, 'super admin'),
(266, 'super admin'),
(267, 'super admin'),
(268, 'principal'),
(269, 'principal'),
(270, 'super admin'),
(271, 'super admin'),
(272, 'super admin'),
(273, 'super admin'),
(274, 'super admin'),
(275, 'super admin'),
(276, 'principal'),
(277, 'principal'),
(278, 'principal'),
(279, 'super admin'),
(280, 'principal'),
(281, 'principal'),
(282, 'principal'),
(283, 'principal'),
(284, 'principal'),
(285, 'district admin'),
(286, 'principal'),
(287, 'district admin'),
(288, 'district admin'),
(289, 'principal'),
(290, 'super admin'),
(291, 'super admin'),
(292, 'district admin'),
(293, 'super admin'),
(294, 'district admin'),
(295, 'super admin'),
(296, 'district admin'),
(297, 'principal'),
(298, 'principal'),
(299, 'district admin'),
(300, 'principal'),
(301, 'super admin'),
(302, 'principal'),
(303, 'district admin'),
(304, 'super admin'),
(305, 'super admin'),
(306, 'district admin'),
(307, 'district admin'),
(308, 'principal'),
(309, 'super admin'),
(310, 'super admin'),
(311, 'principal'),
(312, 'district admin'),
(313, 'district admin'),
(314, 'super admin'),
(315, 'district admin'),
(316, 'principal'),
(317, 'super admin'),
(318, 'super admin'),
(319, 'super admin'),
(320, 'district admin'),
(321, 'super admin'),
(322, 'district admin'),
(323, 'principal'),
(324, 'district admin'),
(325, 'principal'),
(326, 'district admin'),
(327, 'principal'),
(328, 'super admin'),
(329, 'super admin'),
(330, 'super admin'),
(331, 'super admin'),
(332, 'super admin'),
(333, 'principal'),
(334, 'principal'),
(335, 'super admin'),
(336, 'principal'),
(337, 'super admin'),
(338, 'super admin'),
(339, 'super admin'),
(340, 'super admin'),
(341, 'principal'),
(342, 'principal'),
(343, 'district admin'),
(344, 'super admin'),
(345, 'district admin'),
(346, 'super admin'),
(347, 'super admin'),
(348, 'super admin'),
(349, 'super admin'),
(350, 'super admin'),
(351, 'super admin'),
(352, 'super admin'),
(353, 'super admin'),
(354, 'super admin'),
(355, 'super admin'),
(356, 'district admin'),
(357, 'district admin'),
(358, 'super admin'),
(359, 'district admin'),
(360, 'super admin'),
(361, 'super admin'),
(362, 'principal'),
(363, 'principal'),
(364, 'super admin'),
(365, 'principal'),
(366, 'super admin'),
(367, 'super admin'),
(368, 'super admin'),
(369, 'principal'),
(370, 'district admin'),
(371, 'district admin'),
(372, 'super admin'),
(373, 'district admin'),
(374, 'principal'),
(375, 'super admin'),
(376, 'super admin'),
(377, 'district admin'),
(378, 'district admin'),
(379, 'district admin'),
(380, 'super admin'),
(381, 'district admin'),
(382, 'district admin'),
(383, 'principal'),
(384, 'district admin'),
(385, 'principal'),
(386, 'principal'),
(387, 'super admin'),
(388, 'super admin'),
(389, 'super admin'),
(390, 'super admin'),
(391, 'super admin'),
(392, 'principal'),
(393, 'principal'),
(394, 'district admin'),
(395, 'principal'),
(396, 'super admin'),
(397, 'super admin'),
(398, 'super admin'),
(399, 'super admin'),
(400, 'principal'),
(401, 'super admin'),
(402, 'super admin'),
(403, 'district admin'),
(404, 'super admin'),
(405, 'district admin'),
(406, 'district admin'),
(407, 'district admin'),
(408, 'super admin'),
(409, 'super admin'),
(410, 'super admin'),
(411, 'principal'),
(412, 'principal'),
(413, 'super admin'),
(414, 'super admin'),
(415, 'district admin'),
(416, 'super admin'),
(417, 'super admin'),
(418, 'district admin'),
(419, 'super admin'),
(420, 'district admin'),
(421, 'district admin'),
(422, 'principal'),
(423, 'super admin'),
(424, 'district admin');

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

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `title`, `detail`, `image`, `date`) VALUES
(7, 'School Summer Break', 'The central government is planning to ask schools and higher education institutions to start online classes and keep aside critical, practical lessons for a later time when students can attend classes in person.', 'Testing.jpg', '2020-03-20'),
(14, 'Fund Raised', 'Most people infected with the COVID-19 virus will experience mild to moderate respiratory illness and recover without requiring special treatment.  Older people, and those with underlying medical problems like cardiovascular disease, diabetes, chronic respiratory disease, and cancer are more likely to develop serious illness.\r\n\r\nThe best way to prevent and slow down transmission is be well informed about the COVID-19 virus, the disease it causes and how it spreads. Protect yourself and others from infection by washing your hands or using an alcohol based rub frequently and not touching your face.By the end of 2020, our vision is to have our mobile app available and operational in 100+ schools in countries such as India, Indonesia, Ghana, Guatemala, Ecuador, Pakistan, Bangladesh, and Mozambique where teacher absenteeism is a major issue. By the end of 2025, we plan to help get 10 million students better access to education through our services.', 'gyj.png', '2020-04-22'),
(15, 'Corona Alert', 'Most people infected with the COVID-19 virus will experience mild to moderate respiratory illness and recover without requiring special treatment.  Older people, and those with underlying medical problems like cardiovascular disease, diabetes, chronic respiratory disease, and cancer are more likely to develop serious illness.\r\n\r\nThe best way to prevent and slow down transmission is be well informed about the COVID-19 virus, the disease it causes and how it spreads. Protect yourself and others from infection by washing your hands or using an alcohol based rub frequently and not touching your face. ', 'COVID 19.jpg', '2020-04-20');

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE `notification` (
  `id` int(11) NOT NULL,
  `dist` varchar(100) DEFAULT NULL,
  `school` varchar(100) DEFAULT NULL,
  `user` varchar(50) NOT NULL,
  `text` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `notification`
--

INSERT INTO `notification` (`id`, `dist`, `school`, `user`, `text`) VALUES
(18, 'Lahore', 'UCP', 'Teachers', 'hello'),
(24, '', '', 'Parents', 'cgfgcn'),
(26, '', '', 'Principals', 'hxdshsxh'),
(27, 'Lahore', 'Public', 'Students', 'Do your homework!');

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
(18, 'ali', 'ali123@gmail.com', '12345', 'Pakistan', 'sindh', '', b'0'),
(28, 'Ali Raza', 'aliraza@gmail.com', '12345', 'Pakistan', 'xyz', '', b'0'),
(29, 'amar3', 'amir.sohail056@gmail.com', '123', 'Pakistan', 'xyz', '', b'0'),
(30, 'parent3', 'parent3@gmail.com', '12345', 'Pakistan', 'xyz', 'Lahore', b'0'),
(31, 'Frannyjoejames', 'joesampson@gmail.com', '12345', 'Pakistan', 'xyz', 'Lahore', b'0'),
(32, 'moeez', 'muhammadmoeez64@gmail.com', 'moeez123', 'Pakistan', 'xyz', 'Lahore', b'0'),
(33, 'goodparent', 'Amiri7856@gmail.com', '12345', 'Pakistan', 'xyz', 'Lahore', b'0'),
(34, 'nickcanfield', 'nickcanfieldbiz@gmail.com', '12345', 'Pakistan', 'xyz', 'Sampson School District', b'0'),
(35, 'Parent10', 'parent10@gmail.com', '12345', 'Pakistan', 'xyz', 'Lahore', b'0'),
(36, 'abcx', 'xyz.com', '12345', 'Pakistan', 'xyzz', 'Lahore', b'0');

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
  `block` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `principal`
--

INSERT INTO `principal` (`principal_id`, `principal_name`, `principal_email`, `principal_password`, `country_name`, `principal_state`, `principal_district`, `school_id`, `principal_joiningDate`, `principal_account`, `principal_reset_password`, `block`) VALUES
(4, 'owais', 'owais@gmail.com', '1122', 'Pakistan', NULL, 'lahore', 11, '0000-00-00', 'approved', b'0', 0),
(8, 'nick', 'nick@gmail.com', 'Aa123456', 'Pakistan', 'punjab', 'Sampson School District', 25, '0000-00-00', 'approved', b'0', 0),
(9, 'Khubaib', 'khub@gmail.com', '12345', 'pakistan', 'punjab', 'Lahore', 22, '0000-00-00', 'approved', b'0', 0);

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
(2, '2020-01-01', '2020-12-31', '2020-06-01', '2020-07-31', '2020-12-20', '2020-12-31', 5),
(3, '2020-01-01', '2020-12-31', '2020-06-01', '2020-07-31', '2020-12-20', '2020-12-31', 5),
(4, '2020-08-31', '2021-05-30', '2021-01-15', '2021-05-30', '2020-08-15', '2020-12-30', 8),
(5, '2020-04-21', '2020-04-30', '0000-00-00', '0000-00-00', '0000-00-00', '0000-00-00', 11);

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
  `school_image` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `school`
--

INSERT INTO `school` (`school_id`, `school_name`, `country_name`, `school_state`, `school_district`, `school_image`) VALUES
(11, 'Public', 'Pakistan', 'punjab', 'Lahore', NULL),
(22, 'Cotham Public School', 'Pakistan', 'SF', 'Lahore', 'Cotham Public School.jpg'),
(23, 'Franklin Templeton High School', 'Pakistan', 'Punjab', 'Lahore', NULL),
(24, 'Salapwuk Elementary School', 'Pakistan', 'Punjab', 'Lahore', ''),
(25, 'Sampson City Public School', 'Pakistan', 'Punjab', 'Sampson School District', NULL),
(27, 'Chuuk Public School', 'Pakistan', 'Punjab', 'Sampson School District', NULL);

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
  `schoolFeedback_rating` int(11) NOT NULL,
  `schoolFeedback_review` varchar(200) NOT NULL,
  `feedback_date` varchar(50) DEFAULT NULL,
  `school_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `schoolfeedback`
--

INSERT INTO `schoolfeedback` (`school_feedback_id`, `teacher_id`, `student_id`, `parent_id`, `principal_id`, `communityMember_id`, `schoolFeedback_rating`, `schoolFeedback_review`, `feedback_date`, `school_id`) VALUES
(65, NULL, 95, NULL, NULL, NULL, 5, 'Great School ever i seen', '', 22),
(66, NULL, 95, NULL, NULL, NULL, 5, 'grear testing :))', '', 22),
(68, NULL, 95, NULL, NULL, NULL, 4, 'great school!', '2-3-2020', 11),
(69, NULL, 79, NULL, NULL, NULL, 4, 'very good', '', 23),
(70, NULL, 79, NULL, NULL, NULL, 2, 'very good', '', 23),
(73, NULL, 104, NULL, NULL, NULL, 1, 'Its good', '', 11),
(74, NULL, 78, NULL, NULL, NULL, 4, 'Hello', '', 11),
(75, NULL, 78, NULL, NULL, NULL, 5, 'New', '', 11),
(76, NULL, 78, NULL, NULL, NULL, 5, 'New3', '', 11),
(77, NULL, 108, NULL, NULL, NULL, 5, 'This is a school in johar town lahore', '', 22),
(78, NULL, 113, NULL, NULL, NULL, 3, 'Good school', '', 22),
(79, NULL, 108, NULL, NULL, NULL, 5, 'Testing round 3', '', 22),
(80, NULL, 108, NULL, NULL, NULL, 4, 'Please note that, as of now 04/04/2020,\n\nHamza Manzoor(Hr Officer)\nand\nUmair Khalid(Android App Developer)\n\nwill not be the part of Digital Innovation team anymore. ', '', 22),
(90, NULL, 115, NULL, NULL, NULL, 4, '123check', '', 22),
(91, NULL, 115, NULL, NULL, NULL, 1, '12cehc', '', 22),
(92, NULL, 115, NULL, NULL, NULL, 1, '12345', '', 22),
(93, NULL, 115, NULL, NULL, NULL, 1, '1122444', '', 11),
(94, NULL, NULL, NULL, 8, NULL, 3, 'Good', '', 11),
(97, NULL, 108, NULL, NULL, NULL, 5, 'hi how are you?', NULL, 24);

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
(41, 'mohsin', 'mohsin@gmail', '12345', 'Pakistan', 11, 'pka', '', b'0'),
(73, 'usman ahmad', 'student11@gmail.com', '1234567', 'pakistan', 11, 'lhr', '', b'0'),
(74, 'amar2', 'amiri7856@gmail.com', '123456', 'Pakistan', 11, 'xyz', '', b'0'),
(76, 'Umer', 'umer@gmail.com', '12345', 'Pakistan', 11, 'xyz', '', b'0'),
(77, 'Umer Rana', 'umerrana@gmail.com', '12345', 'Pakistan', 11, 'xyz', '', b'0'),
(78, 'Ali Razaa', 'alizaz@gmail.com', '12345677', 'Pakistan', 11, 'xyz', '', b'0'),
(79, 'ahmad', 'ahmad@gmail.com', '$2y$10$5reHPkdX2EnSUS7X.2pSWuvVBkaH2ZcdtE5xC33ehJaoJoIthaV0q', 'Pakistan', 11, 'xyz', '', b'0'),
(80, 'Ammar', 'umairkhalid045@gmail.com', 'janisojao123', 'Pakistan', 11, 'xyz', 'Lahore', b'0'),
(81, 'Umair', 'umairkhalid045@gmail.com', 'janisojao123', 'Pakistan', 11, 'xyz', 'Lahore', b'0'),
(92, 'Maxp', 'maxp@gmail.com', '12345', 'Pakistan', 11, 'xyz', 'Lahore', b'0'),
(95, 'mystu', 'my@gmail.com', '12345', 'Pakistan', 11, 'xyz', 'Lahore', b'0'),
(98, 'Umer1', 'um@gmail.com', '12345', 'Pakistan', 11, 'xyz', 'Lahore', b'0'),
(100, 'Hassan', 'hassan@gmail.com', '12345', 'Pakistan', 11, 'xyz', 'Lahore', b'0'),
(101, 'Amar Test6', 'amiri7856@gmail.com', '12345', 'Pakistan', 11, 'xyz', 'Lahore', b'0'),
(102, 'Sammy Sam', 'nickcanfieldbiz@gmail.com', '1marco', 'Pakistan', 11, 'xyz', 'Lahore', b'0'),
(104, 'moeez', 'muhammadmoeez64@gmail.com', 'moeez123', 'Pakistan', 11, 'xyz', 'Lahore', b'0'),
(105, 'stu1', 'stu1@gmail.com', '123', 'Pakistan', 11, 'xyz', 'Lahore', b'0'),
(106, 'Student2', 'student2@gmail.com', '12345', 'Pakistan', 23, 'xyz', 'Lahore', b'0'),
(107, 'student1', 'student1@gmail.com', '12345', 'Pakistan', 23, 'xyz', 'Lahore', b'0'),
(108, 'student102', 'student100@gmail.com', '123456', 'Pakistan', 11, 'xyz', 'Lahore', b'0'),
(109, 'Student4', 'student4@gmail.com', '12345', 'Pakistan', 11, 'xyz', 'Lahore', b'0'),
(110, 'stu2', 'stu2@gmail.com', '123', 'Pakistan', 11, 'xyz', 'Lahore', b'0'),
(112, 'student5@', 'ghhh@gmail.co.co', '12345', 'Pakistan', 23, 'xyz', 'Lahore', b'0'),
(113, 'Student8', 'student8@gmail.com', '78910', 'Pakistan', 22, 'xyz', 'Lahore', b'0'),
(114, 'Ahmed', 'ahmed@gmail.com', '123', 'Pakistan', 22, 'xyz', 'Lahore', b'0'),
(115, 'Maz', 'maz@gmail.com', '123', 'Pakistan', 22, 'xyz', 'Lahore', b'0'),
(116, 'Student15', 'student15@gmail.com', '12345', 'Pakistan', 11, 'xyz', 'Lahore', b'0'),
(117, 'Maz2', 'maz2@gmail.com', '123', 'Pakistan', 23, 'xyz', 'Lahore', b'0'),
(118, 'Maz11', 'maz11@gmail.com', '123', 'Pakistan', 22, 'xyz', 'Lahore', b'0'),
(119, 'Hasan', 'ali11@gmail.com', '123', 'Pakistan', 24, 'xyz', 'Lahore', b'0'),
(121, 'ThuDang', 'michelledang2227@gmail.com', '12345', 'Pakistan', 11, 'xyz', 'Lahore', b'0');

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
(1, 'super_1', '1122', 'super@gmail.com', 0),
(2, 'super_nick', '1122', 'nick@gmail.com', 0);

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

CREATE TABLE `teacher` (
  `teacher_id` int(11) NOT NULL,
  `school_id` int(11) NOT NULL,
  `teacher_firstName` varchar(100) NOT NULL,
  `teacher_lastName` varchar(100) NOT NULL,
  `teacher_absence` int(11) DEFAULT NULL,
  `teacher_email` varchar(100) NOT NULL,
  `teacher_password` varchar(100) NOT NULL,
  `teacher_state` varchar(100) DEFAULT NULL,
  `teacher_district` varchar(100) NOT NULL,
  `country_name` varchar(100) NOT NULL,
  `teacher_shift` varchar(100) DEFAULT NULL,
  `teacher_image` varchar(500) DEFAULT NULL,
  `joining_date` date NOT NULL,
  `follow_status` varchar(50) DEFAULT NULL,
  `teacher_account` varchar(25) NOT NULL,
  `teacher_reset_password` bit(1) NOT NULL,
  `teacher_dispute` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`teacher_id`, `school_id`, `teacher_firstName`, `teacher_lastName`, `teacher_absence`, `teacher_email`, `teacher_password`, `teacher_state`, `teacher_district`, `country_name`, `teacher_shift`, `teacher_image`, `joining_date`, `follow_status`, `teacher_account`, `teacher_reset_password`, `teacher_dispute`) VALUES
(44, 11, 'khubaib', 'Waheed', 0, 'khub@gmail.com', '12345', NULL, 'Lahore', 'Pakistan', NULL, '.jpg', '2020-04-22', NULL, 'approved', b'0', NULL),
(46, 11, 'zafar', 'Waheed', 0, 'zafae@gmail.com', '12345', NULL, 'Lahore', 'Pakistan', NULL, NULL, '2020-04-22', NULL, 'approved', b'0', NULL),
(60, 11, 'Zafar', 'ALi', NULL, 'zafar@gmail.com', '12345', NULL, 'lahore', 'Pakistan', NULL, NULL, '2020-04-22', NULL, 'approved', b'0', NULL);

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
(41, NULL, NULL, NULL, NULL, NULL),
(NULL, NULL, NULL, NULL, 18, NULL),
(NULL, NULL, NULL, NULL, 28, NULL),
(73, NULL, NULL, NULL, NULL, NULL),
(74, NULL, NULL, NULL, NULL, NULL),
(NULL, NULL, NULL, NULL, 29, NULL),
(76, NULL, NULL, NULL, NULL, NULL),
(77, NULL, NULL, NULL, NULL, NULL),
(78, NULL, NULL, NULL, NULL, NULL),
(79, NULL, NULL, NULL, NULL, NULL),
(80, NULL, NULL, NULL, NULL, NULL),
(81, NULL, NULL, NULL, NULL, NULL),
(92, NULL, NULL, NULL, NULL, NULL),
(95, NULL, NULL, NULL, NULL, NULL),
(98, NULL, NULL, NULL, NULL, NULL),
(100, NULL, NULL, NULL, NULL, NULL),
(NULL, NULL, NULL, NULL, 30, NULL),
(101, NULL, NULL, NULL, NULL, NULL),
(102, NULL, NULL, NULL, NULL, NULL),
(NULL, NULL, NULL, NULL, 31, NULL),
(104, NULL, NULL, NULL, NULL, NULL),
(NULL, NULL, NULL, NULL, 32, NULL),
(105, NULL, NULL, NULL, NULL, NULL),
(NULL, NULL, NULL, 14, NULL, NULL),
(106, NULL, NULL, NULL, NULL, NULL),
(107, NULL, NULL, NULL, NULL, NULL),
(108, NULL, NULL, NULL, NULL, NULL),
(109, NULL, NULL, NULL, NULL, NULL),
(110, NULL, NULL, NULL, NULL, NULL),
(112, NULL, NULL, NULL, NULL, NULL),
(113, NULL, NULL, NULL, NULL, NULL),
(114, NULL, NULL, NULL, NULL, NULL),
(115, NULL, NULL, NULL, NULL, NULL),
(NULL, NULL, NULL, 15, NULL, NULL),
(NULL, NULL, NULL, 16, NULL, NULL),
(NULL, NULL, NULL, NULL, 33, NULL),
(116, NULL, NULL, NULL, NULL, NULL),
(NULL, NULL, NULL, NULL, 34, NULL),
(117, NULL, NULL, NULL, NULL, NULL),
(118, NULL, NULL, NULL, NULL, NULL),
(119, NULL, NULL, NULL, NULL, NULL),
(NULL, NULL, NULL, 17, NULL, NULL),
(NULL, NULL, NULL, NULL, 35, NULL),
(NULL, NULL, NULL, 18, NULL, NULL),
(121, NULL, NULL, NULL, NULL, NULL),
(NULL, NULL, NULL, NULL, 36, NULL);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `blog`
--
ALTER TABLE `blog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `communitymember`
--
ALTER TABLE `communitymember`
  MODIFY `communityMember_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `confirmreporter`
--
ALTER TABLE `confirmreporter`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=124;

--
-- AUTO_INCREMENT for table `country`
--
ALTER TABLE `country`
  MODIFY `country_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `district`
--
ALTER TABLE `district`
  MODIFY `dist_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `feedback_id` int(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `follow`
--
ALTER TABLE `follow`
  MODIFY `follow_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=552;

--
-- AUTO_INCREMENT for table `gazettedholidays`
--
ALTER TABLE `gazettedholidays`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `habit`
--
ALTER TABLE `habit`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `habitstatus`
--
ALTER TABLE `habitstatus`
  MODIFY `status_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=131;

--
-- AUTO_INCREMENT for table `logins`
--
ALTER TABLE `logins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=425;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `notification`
--
ALTER TABLE `notification`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `parent`
--
ALTER TABLE `parent`
  MODIFY `parent_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `principal`
--
ALTER TABLE `principal`
  MODIFY `principal_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `reportabsence`
--
ALTER TABLE `reportabsence`
  MODIFY `reportAbsence_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=157;

--
-- AUTO_INCREMENT for table `schedule`
--
ALTER TABLE `schedule`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `school`
--
ALTER TABLE `school`
  MODIFY `school_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `schoolfeedback`
--
ALTER TABLE `schoolfeedback`
  MODIFY `school_feedback_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=98;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `student_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=124;

--
-- AUTO_INCREMENT for table `super`
--
ALTER TABLE `super`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `teacher`
--
ALTER TABLE `teacher`
  MODIFY `teacher_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

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
