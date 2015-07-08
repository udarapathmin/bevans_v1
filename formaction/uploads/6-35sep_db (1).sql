-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 06, 2015 at 03:47 PM
-- Server version: 5.6.24
-- PHP Version: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `sep_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `activity_feed`
--

CREATE TABLE IF NOT EXISTS `activity_feed` (
  `id` int(11) NOT NULL,
  `initiator_id` int(11) NOT NULL,
  `activity_type` int(11) NOT NULL,
  `activity_time` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `activity_type`
--

CREATE TABLE IF NOT EXISTS `activity_type` (
  `id` int(11) NOT NULL,
  `name` varchar(120) NOT NULL,
  `color_code` varchar(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `apply_leaves`
--

CREATE TABLE IF NOT EXISTS `apply_leaves` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `teacher_id` int(11) DEFAULT NULL,
  `leave_type_id` int(11) DEFAULT NULL,
  `is_half_day` tinyint(1) DEFAULT NULL,
  `applied_date` date NOT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `reason` varchar(255) DEFAULT NULL,
  `leave_status` int(1) NOT NULL COMMENT '0 - Pending , 1 - Apdproved , 2 - Rejecte',
  `remarks` varchar(255) DEFAULT NULL,
  `no_of_days` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=48 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `apply_leaves`
--

INSERT INTO `apply_leaves` (`id`, `user_id`, `teacher_id`, `leave_type_id`, `is_half_day`, `applied_date`, `start_date`, `end_date`, `reason`, `leave_status`, `remarks`, `no_of_days`) VALUES
(32, 2, 4, 1, 0, '2015-05-24', '2015-05-25', '2015-05-29', 'duty bug fix 1', 0, NULL, 1),
(33, 2, 4, 4, 0, '2015-05-24', '2015-05-25', '2015-06-01', 'test', 2, 'Leave Reject', 6),
(34, 2, 4, 3, 0, '2015-05-24', '2015-05-25', '2015-05-29', 'test', 2, 'Leave Reject', 3),
(35, 2, 4, 3, 0, '2015-05-24', '2015-05-25', '2015-06-01', 'test', 2, 'Leave Reject', 6),
(36, 2, 4, 3, 0, '2015-05-24', '2015-05-25', '2015-06-01', 'test', 2, 'Leave Reject', 4),
(37, 2, 4, 4, 0, '2015-05-24', '2015-05-25', '2015-06-01', 'test', 1, 'Leave Approved', 4),
(38, 4, 8, 1, 0, '2015-05-24', '2015-05-26', '2015-05-29', 'sample admin leave', 1, 'Leave Approved', 2),
(39, 12, 13, 1, 0, '2015-05-24', '2015-06-01', '2015-06-05', 'supun leaves', 1, 'Leave Approved', 4),
(40, 14, 15, 2, 0, '2015-05-24', '2015-05-27', '2015-05-31', 'edd', 0, NULL, 2),
(41, 2, 4, 2, 0, '2015-06-02', '2016-06-11', '2016-06-24', 'asfaf', 0, NULL, 0),
(42, 2, 4, 2, 0, '2015-06-02', '2015-06-11', '2015-06-14', 'asfaf', 0, NULL, 2),
(43, 2, 4, 1, 1, '2015-06-17', '2015-06-26', '2015-06-26', 'half day test', 1, 'Leave Approved', 1),
(44, 2, 4, 1, 1, '2015-06-17', '2015-06-29', '2015-06-29', 'test | Half Day', 0, NULL, 1),
(45, 2, 4, 1, 1, '2015-06-17', '2015-06-29', '2015-06-29', 'gedara yannam test | Half Day', 0, NULL, 1),
(46, 2, 4, 1, 1, '2015-06-17', '2015-06-26', '2015-06-26', 'teata | Half Day for extra short leaves', 0, NULL, 1),
(47, 2, 4, 1, 1, '2015-06-17', '2015-06-25', '2015-06-25', 'test | Half Day for extra short leaves', 0, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `apply_short_leaves`
--

CREATE TABLE IF NOT EXISTS `apply_short_leaves` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `teacher_id` int(11) NOT NULL,
  `leave_Type` int(11) NOT NULL COMMENT '1 - Short Leaves 2 - Half day',
  `applied_date` date NOT NULL,
  `date` date NOT NULL,
  `reason` varchar(255) NOT NULL,
  `status` int(11) NOT NULL COMMENT '0 - Pending 1 - Approved 2 - Rejected',
  `remarks` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `apply_short_leaves`
--

INSERT INTO `apply_short_leaves` (`id`, `user_id`, `teacher_id`, `leave_Type`, `applied_date`, `date`, `reason`, `status`, `remarks`) VALUES
(16, 2, 4, 1, '2015-06-17', '2015-06-18', 'short leave ekak oneh', 1, 'Short Leave Approved'),
(17, 2, 4, 1, '2015-06-17', '2015-06-19', 'short leave thawa ekak', 0, ''),
(18, 2, 4, 1, '2015-06-17', '2015-06-26', 'teata', 2, ''),
(19, 2, 4, 1, '2015-06-17', '2015-06-25', 'test', 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `archived_students`
--

CREATE TABLE IF NOT EXISTS `archived_students` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `admission_no` varchar(255) DEFAULT NULL,
  `admission_date` date DEFAULT NULL,
  `full_name` varchar(255) DEFAULT NULL,
  `name_with_initials` varchar(255) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `gender` char(1) DEFAULT NULL,
  `nic_no` varchar(10) DEFAULT NULL,
  `language` varchar(1) DEFAULT NULL,
  `religion` varchar(3) DEFAULT NULL,
  `permanent_addr` varchar(512) DEFAULT NULL,
  `contact_home` varchar(15) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `house_id` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `photo_file_name` varchar(255) DEFAULT NULL,
  `photo_content_type` varchar(255) DEFAULT NULL,
  `photo_data` mediumblob
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `archived_teachers`
--

CREATE TABLE IF NOT EXISTS `archived_teachers` (
  `id` int(11) NOT NULL,
  `signature_no` varchar(10) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `serial_no` varchar(10) DEFAULT NULL,
  `personal_file_no` varchar(20) DEFAULT NULL,
  `full_name` varchar(255) DEFAULT NULL,
  `name_with_initials` varchar(255) DEFAULT NULL,
  `gender` char(1) DEFAULT NULL,
  `section` int(11) DEFAULT NULL,
  `teacher_register_no` varchar(30) DEFAULT NULL,
  `nic_no` varchar(10) DEFAULT NULL,
  `permanent_addr` varchar(512) DEFAULT NULL,
  `wnop_no` varchar(20) DEFAULT NULL,
  `service` int(11) DEFAULT NULL,
  `grade` int(11) DEFAULT NULL,
  `nature_of_appointment` varchar(40) DEFAULT NULL,
  `main_subject_id` int(11) DEFAULT NULL,
  `medium` char(1) DEFAULT NULL,
  `first_appointment_date` date DEFAULT NULL,
  `contact_mobile` varchar(15) DEFAULT NULL,
  `contact_home` varchar(15) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `remarks` varchar(255) DEFAULT NULL,
  `civil_status` char(1) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `photo_file_name` varchar(255) DEFAULT NULL,
  `photo_content_type` varchar(255) DEFAULT NULL,
  `photo_data` mediumblob
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `ci_cookies`
--

CREATE TABLE IF NOT EXISTS `ci_cookies` (
  `id` int(11) NOT NULL,
  `cookie_id` varchar(255) DEFAULT NULL,
  `netid` varchar(255) DEFAULT NULL,
  `ip_address` varchar(255) DEFAULT NULL,
  `user_agent` varchar(255) DEFAULT NULL,
  `orig_page_requested` varchar(120) DEFAULT NULL,
  `php_session_id` varchar(40) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ci_sessions`
--

CREATE TABLE IF NOT EXISTS `ci_sessions` (
  `session_id` varchar(40) NOT NULL DEFAULT '0',
  `ip_address` varchar(45) NOT NULL DEFAULT '0',
  `user_agent` varchar(120) NOT NULL,
  `last_activity` int(10) unsigned NOT NULL DEFAULT '0',
  `user_data` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ci_sessions`
--

INSERT INTO `ci_sessions` (`session_id`, `ip_address`, `user_agent`, `last_activity`, `user_data`) VALUES
('4d21b5ae37fb292e39263096be294f50', '::1', 'Mozilla/5.0 (Windows NT 6.3; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/42.0.2311.152 Safari/537.36', 1432183365, 'a:8:{s:9:"user_data";s:0:"";s:9:"logged_in";b:1;s:2:"id";s:1:"1";s:8:"username";s:5:"admin";s:8:"password";s:32:"21232f297a57a5a743894a0e4a801fc3";s:10:"first_name";s:6:"System";s:9:"last_name";s:5:"Admin";s:9:"user_type";s:1:"A";}'),
('bf18c29b71908d4dec2a61fd84d5b6ea', '127.0.0.1', 'Mozilla/5.0 (Windows NT 6.1; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/42.0.2311.135 Safari/537.36', 1431424271, 'a:8:{s:9:"user_data";s:0:"";s:9:"logged_in";b:1;s:2:"id";s:1:"1";s:8:"username";s:5:"admin";s:8:"password";s:32:"21232f297a57a5a743894a0e4a801fc3";s:10:"first_name";s:6:"System";s:9:"last_name";s:5:"Admin";s:9:"user_type";s:1:"A";}');

-- --------------------------------------------------------

--
-- Table structure for table `classes`
--

CREATE TABLE IF NOT EXISTS `classes` (
  `id` int(11) NOT NULL,
  `grade_id` int(11) DEFAULT NULL,
  `name` varchar(120) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `classes`
--

INSERT INTO `classes` (`id`, `grade_id`, `name`) VALUES
(1, 7, '7D'),
(2, 8, '8D'),
(3, 9, '9A'),
(4, 9, '9B');

-- --------------------------------------------------------

--
-- Table structure for table `class_timetable`
--

CREATE TABLE IF NOT EXISTS `class_timetable` (
  `id` int(11) NOT NULL,
  `class_id` int(11) DEFAULT NULL,
  `year` year(4) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `class_timetable`
--

INSERT INTO `class_timetable` (`id`, `class_id`, `year`) VALUES
(4, 2, 2015),
(5, 4, 2015),
(6, 2, 2014),
(7, 3, 2015);

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE IF NOT EXISTS `events` (
  `id` int(11) NOT NULL,
  `title` varchar(1000) DEFAULT NULL,
  `description` text,
  `start_time` time DEFAULT NULL,
  `end_time` time DEFAULT NULL,
  `in_charge_id` varchar(100) DEFAULT NULL,
  `is_sport_event` tinyint(1) DEFAULT NULL,
  `society_or_sport_id` int(11) DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `status` varchar(100) DEFAULT NULL,
  `budget` int(11) DEFAULT NULL,
  `details` text,
  `location` varchar(100) DEFAULT NULL,
  `guest` varchar(100) DEFAULT NULL,
  `event_type` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `title`, `description`, `start_time`, `end_time`, `in_charge_id`, `is_sport_event`, `society_or_sport_id`, `start_date`, `end_date`, `status`, `budget`, `details`, `location`, `guest`, `event_type`) VALUES
(1, 'sports meeting', 'we will be organizing a new sport meet', '00:00:00', '00:00:00', NULL, NULL, NULL, '2015-04-11', '2015-04-11', 'rejected', NULL, NULL, NULL, NULL, NULL),
(2, 'race event', 'we will be organizing inter school championship game', '00:00:00', '01:00:00', NULL, NULL, NULL, '2015-04-11', '2015-04-11', 'rejected', NULL, NULL, NULL, NULL, NULL),
(3, 'race event', 'we will be organizing inter school championship game', '03:16:00', '01:00:00', NULL, NULL, NULL, '2015-04-11', '2015-04-11', 'cancelled', NULL, NULL, NULL, NULL, NULL),
(4, 'jsjsjsss', '', '00:00:00', '00:00:00', NULL, NULL, NULL, '2015-05-12', '2015-05-20', 'cancelled', NULL, NULL, NULL, NULL, NULL),
(5, 'badminton championship', 'Inter school championship', '07:06:00', '13:58:00', NULL, NULL, NULL, '2015-04-12', '2015-04-12', 'cancelled', NULL, 'Only the student who are passed to attempt this event is allowed to come', 'school main stadium', 'sanath jayasuriya', NULL),
(6, 'test1', 'testing 1', '00:00:00', '00:00:00', NULL, NULL, NULL, '2015-04-12', '0000-00-00', 'cancelled', NULL, NULL, NULL, NULL, NULL),
(7, 'cricket carnival', 'we will be organizing a cricket festival', '13:07:00', '18:06:00', NULL, NULL, NULL, '2015-04-12', '2015-04-12', 'success', NULL, 'All student has to participate this event', 'school play groundd', 'kumar sangakkara', NULL),
(8, 'Marathon Competition', 'We will be organizing a marathon competition to improve', '07:19:00', '18:13:00', '919394969', NULL, NULL, '2015-04-12', '2015-04-15', 'success', 500000, 'This is event is organizing by rotract students. So if you are interested in doing something, you can join this event ', 'school play ground', 'susanthika jayasinghe ', NULL),
(9, 'bicycle race', 'Science society members organizing this event', '08:04:00', '00:54:00', '0', NULL, NULL, '2015-04-30', '2015-05-01', 'success', 29000, 'All students can participate this event. But we only choose 20 students out of those', 'main street', 'roshan mahanama', NULL),
(10, 'Computer game championship', 'Student interactive media organizing this event', '07:09:00', '14:15:00', '891234567', NULL, NULL, '2015-04-28', '2015-04-29', 'success', 20000, 'this event is sooo awesome!!!!!', 'computer lab', 'mark zuckerberg', 'Sports Festival'),
(11, 'Chess game championship', 'We will organize this event', '07:09:00', '14:15:00', '891234567', NULL, NULL, '2015-04-28', '2015-04-29', 'approved', 20000, NULL, NULL, NULL, 'Sports Festival'),
(12, 'testing1', 'just a testing', '12:00:00', '13:00:00', '0', NULL, NULL, '2015-04-28', '2015-04-28', 'pending', 0, NULL, NULL, NULL, 'New Year Festival'),
(13, 'testing1', 'dsaddd', '12:00:00', '13:00:00', '0', NULL, NULL, '2015-04-28', '2015-04-28', 'pending', 0, NULL, NULL, NULL, 'Sports Festival'),
(14, 'testing1wqq', 'dsaddddwddw', '12:00:00', '13:00:00', '0', NULL, NULL, '2015-04-28', '2015-04-28', 'pending', 0, NULL, NULL, NULL, 'Computer competition'),
(15, 'dddd', 'ddsawsedwed', '13:01:00', '01:59:00', '2112121', NULL, NULL, '2015-04-28', '2015-04-02', 'pending', 232233, NULL, NULL, NULL, 'Computer competition'),
(16, 'sports day', 'a sport event', '13:02:00', '16:16:00', '921235523V', NULL, NULL, '2015-05-08', '2015-05-16', 'pending', 290000, NULL, NULL, NULL, 'Sports Festival'),
(17, 'dfsffdrfdsf', 'dfdfdfd', '02:00:00', '14:00:00', '921235523V', NULL, NULL, '2015-05-08', '2015-05-23', 'pending', 500000, NULL, NULL, NULL, 'Sports Festival'),
(18, 'Marathon Competition', 'ssaddasdsadasd', '00:00:00', '01:59:00', '921235523V', NULL, NULL, '2015-05-30', '2015-05-12', 'cancelled', 1121212, 'just a marathon race to improve moral of the student', 'around school area', 'sanath jayasuriya', 'Sports Festival'),
(19, 'Maha Bima Dansal', '12th year science section students are organizing this event', '17:00:00', '19:30:00', '263531654V', NULL, NULL, '2015-05-18', '2015-05-18', 'success', 250000, 'All students can participate for this event for no reason. ', 'In front of school main gate', 'mahinda rajapakshe', 'Wesak Dansal'),
(20, 'Maha Pahan kudu Competition', 'Buddhist society is organizing this event ', '08:11:00', '14:00:00', '921235523V', NULL, NULL, '2015-05-21', '2015-05-23', 'success', 300000, 'fffffsdf', 'sdsdsd', '', 'New Year Festival'),
(21, 'Astronomical night', 'all science students are organizing this event. Four school students are participating this event', '19:00:00', '20:00:00', '921235523V', NULL, NULL, '2015-05-14', '2015-05-15', 'pending', 200000, NULL, NULL, NULL, 'Sports Festival'),
(22, 'Wesak Charika', 'Prefects are organizing this event for students', '13:00:00', '18:00:00', '263531654V', NULL, NULL, '2015-05-14', '2015-05-15', 'rejected', 20000, NULL, NULL, NULL, 'Wesak Event'),
(23, 'testing2', 'This is just a event for the Christmas festival. ', '00:00:00', '12:00:00', '263531654V', NULL, NULL, '2015-12-25', '2015-12-25', 'success', 20000, 'All students have to participate that event. What you have ti do is to just come.', 'school main stadium', 'St. Clause', 'Christmas festival'),
(24, 'new event', 'hello', '01:00:00', '13:00:00', '921235523V', NULL, NULL, '2015-05-14', '2015-05-22', 'success', 300000, 'just a new event', 'around school area', 'susanthika jayasinghe ', 'New Year Festival'),
(25, 'test', 'testing ', '13:00:00', '13:00:00', '921235523V', NULL, NULL, '2015-05-13', '2015-05-14', 'success', 26000, 'testing event', 'play ground', '', 'poson ');

-- --------------------------------------------------------

--
-- Table structure for table `event_type`
--

CREATE TABLE IF NOT EXISTS `event_type` (
  `id` int(11) NOT NULL,
  `event_type` varchar(100) DEFAULT NULL,
  `description` text
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `event_type`
--

INSERT INTO `event_type` (`id`, `event_type`, `description`) VALUES
(3, 'New Year Festival', 'Student Affairs Comity is responsible for organizing this event'),
(4, 'Wesak Event', 'Prefects are responsible for organizing this event. It will be held on may.'),
(5, 'Shramadana', 'All the prefects and students are organizing this event to keep the environment clean'),
(6, 'Computer competition', 'The IT professionals are organizing this event for students who are interested in this field. '),
(8, 'Wesak Dansal', 'We will be organizing a "vesak bima dansla" for every year'),
(9, 'Christmas festival', 'Every December this event is organizing  '),
(10, 'just a testing', 'This is going to be awesome'),
(12, 'Science Day', 'Organized by a/l science section'),
(14, 'Sports Festival', 'It is organized by Student Comity in this school'),
(15, 'poson ', 'science students are organizingf');

-- --------------------------------------------------------

--
-- Table structure for table `exams`
--

CREATE TABLE IF NOT EXISTS `exams` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `grade_id` int(11) DEFAULT NULL,
  `year` char(4) DEFAULT NULL,
  `start_date` datetime DEFAULT NULL,
  `end_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `exam_marks`
--

CREATE TABLE IF NOT EXISTS `exam_marks` (
  `exam_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `marks` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `exam_subjects`
--

CREATE TABLE IF NOT EXISTS `exam_subjects` (
  `exam_id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `government_exams`
--

CREATE TABLE IF NOT EXISTS `government_exams` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `year` char(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `government_exam_admission_nos`
--

CREATE TABLE IF NOT EXISTS `government_exam_admission_nos` (
  `government_exam_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `admission_no` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `government_exam_marks`
--

CREATE TABLE IF NOT EXISTS `government_exam_marks` (
  `government_exam_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `grade` char(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `grades`
--

CREATE TABLE IF NOT EXISTS `grades` (
  `id` int(11) NOT NULL,
  `section_id` int(11) DEFAULT NULL,
  `head_user_id` int(11) DEFAULT NULL,
  `name` varchar(120) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `guardians`
--

CREATE TABLE IF NOT EXISTS `guardians` (
  `id` int(11) NOT NULL,
  `student_id` int(11) DEFAULT NULL,
  `fullname` varchar(255) DEFAULT NULL,
  `name_with_initials` varchar(255) DEFAULT NULL,
  `relation` varchar(255) DEFAULT NULL,
  `contact_mobile` varchar(15) DEFAULT NULL,
  `contact_home` varchar(15) DEFAULT NULL,
  `addr` varchar(400) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `occupation` varchar(255) DEFAULT NULL,
  `gender` char(1) DEFAULT NULL,
  `is_pastpupil` tinyint(1) DEFAULT '0',
  `house_id` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `guardians`
--

INSERT INTO `guardians` (`id`, `student_id`, `fullname`, `name_with_initials`, `relation`, `contact_mobile`, `contact_home`, `addr`, `dob`, `occupation`, `gender`, `is_pastpupil`, `house_id`) VALUES
(1, 16, 'Anton', 'A. D. Karunarathna', 'f', '1234567890', '1234567890', 'agagagaga', '1957-07-04', '1234567890', 'm', 1, NULL),
(2, 19, 'Melisa', 'M. P. Thomas', 'm', '1234567890', '1234567890', '1234567890', '1956-07-04', 'Teacher', 'f', 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `houses`
--

CREATE TABLE IF NOT EXISTS `houses` (
  `id` int(11) NOT NULL,
  `house_name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `leave_status`
--

CREATE TABLE IF NOT EXISTS `leave_status` (
  `id` int(11) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `leave_status`
--

INSERT INTO `leave_status` (`id`, `status`) VALUES
(0, 'Pending'),
(1, 'Approved'),
(2, 'Rejected');

-- --------------------------------------------------------

--
-- Table structure for table `leave_types`
--

CREATE TABLE IF NOT EXISTS `leave_types` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `max_leave_count` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `leave_types`
--

INSERT INTO `leave_types` (`id`, `name`, `max_leave_count`) VALUES
(1, 'Casual', 20),
(2, 'Medical', 21),
(3, 'Duty', 0),
(4, 'Other', 0),
(5, 'Maternity', 84);

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE IF NOT EXISTS `news` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `content` text,
  `author_id` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `sections`
--

CREATE TABLE IF NOT EXISTS `sections` (
  `id` int(11) NOT NULL,
  `name` varchar(120) DEFAULT NULL,
  `head_user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `short_leave_types`
--

CREATE TABLE IF NOT EXISTS `short_leave_types` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `short_leave_types`
--

INSERT INTO `short_leave_types` (`id`, `name`) VALUES
(1, 'Short Leave'),
(2, 'Half Day');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE IF NOT EXISTS `students` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `admission_no` varchar(255) DEFAULT NULL,
  `admission_date` date DEFAULT NULL,
  `full_name` varchar(255) DEFAULT NULL,
  `name_with_initials` varchar(255) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `gender` char(1) DEFAULT NULL,
  `nic_no` varchar(10) DEFAULT NULL,
  `language` varchar(1) DEFAULT NULL,
  `religion` varchar(3) DEFAULT NULL,
  `permanent_addr` varchar(512) DEFAULT NULL,
  `contact_home` varchar(15) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `house_id` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `photo_file_name` varchar(255) DEFAULT NULL,
  `photo_content_type` varchar(255) DEFAULT NULL,
  `photo_data` mediumblob
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `user_id`, `admission_no`, `admission_date`, `full_name`, `name_with_initials`, `dob`, `gender`, `nic_no`, `language`, `religion`, `permanent_addr`, `contact_home`, `email`, `house_id`, `created_at`, `updated_at`, `photo_file_name`, `photo_content_type`, `photo_data`) VALUES
(1, 16, '1122', '2004-07-04', 'Udara Karunarathna', 'U. P. D. Karunarathna', '1999-07-04', 'M', '456789889V', 's', '1', 'ahah', '1234567890', 'ninetenone@gmail.com', 0, '2015-07-03 20:40:26', NULL, NULL, NULL, NULL),
(2, 19, '5545', '2010-07-04', 'Arun Thomas', 'A. P. Thomas', '1997-07-04', 'M', '956789889V', 's', '4', '1234567890', '1234567890', 'udarapathmin@gmail.com', 2, '2015-07-04 08:25:47', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `student_class`
--

CREATE TABLE IF NOT EXISTS `student_class` (
  `student_id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  `year` char(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE IF NOT EXISTS `subjects` (
  `id` int(11) NOT NULL,
  `subject_name` varchar(120) DEFAULT NULL,
  `subject_code` varchar(120) DEFAULT NULL,
  `section_id` int(11) DEFAULT NULL,
  `subject_incharge_id` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`id`, `subject_name`, `subject_code`, `section_id`, `subject_incharge_id`) VALUES
(1, 'Physics', 'AL001', 1, 4),
(2, 'Chemistry', 'AL002', 1, 5);

-- --------------------------------------------------------

--
-- Table structure for table `system_config`
--

CREATE TABLE IF NOT EXISTS `system_config` (
  `is_strong_password` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `system_config`
--

INSERT INTO `system_config` (`is_strong_password`) VALUES
(0);

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

CREATE TABLE IF NOT EXISTS `teachers` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `signature_no` varchar(10) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `serial_no` varchar(10) DEFAULT NULL,
  `personal_file_no` varchar(20) DEFAULT NULL,
  `full_name` varchar(255) DEFAULT NULL,
  `name_with_initials` varchar(255) DEFAULT NULL,
  `gender` char(1) DEFAULT NULL,
  `section` int(11) DEFAULT NULL,
  `teacher_register_no` varchar(30) DEFAULT NULL,
  `nic_no` varchar(10) DEFAULT NULL,
  `permanent_addr` varchar(512) DEFAULT NULL,
  `wnop_no` varchar(20) DEFAULT NULL,
  `service` int(11) DEFAULT NULL,
  `grade` int(11) DEFAULT NULL,
  `nature_of_appointment` varchar(40) DEFAULT NULL,
  `main_subject_id` int(11) DEFAULT NULL,
  `medium` char(1) DEFAULT NULL,
  `first_appointment_date` date DEFAULT NULL,
  `contact_mobile` varchar(15) DEFAULT NULL,
  `contact_home` varchar(15) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `remarks` varchar(255) DEFAULT NULL,
  `civil_status` char(1) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `photo_file_name` varchar(255) DEFAULT NULL,
  `photo_content_type` varchar(255) DEFAULT NULL,
  `photo_data` mediumblob,
  `religion_id` int(11) DEFAULT NULL,
  `nationality_id` int(11) DEFAULT NULL,
  `designation_id` int(11) DEFAULT NULL,
  `educational_qualific` text,
  `professional_qualific` text,
  `promotions` text,
  `increment_date` date DEFAULT NULL,
  `duty_assume_date` date DEFAULT NULL,
  `pension_date` date DEFAULT NULL,
  `joined_date` date DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `teachers`
--

INSERT INTO `teachers` (`id`, `user_id`, `signature_no`, `email`, `serial_no`, `personal_file_no`, `full_name`, `name_with_initials`, `gender`, `section`, `teacher_register_no`, `nic_no`, `permanent_addr`, `wnop_no`, `service`, `grade`, `nature_of_appointment`, `main_subject_id`, `medium`, `first_appointment_date`, `contact_mobile`, `contact_home`, `dob`, `remarks`, `civil_status`, `created_at`, `updated_at`, `photo_file_name`, `photo_content_type`, `photo_data`, `religion_id`, `nationality_id`, `designation_id`, `educational_qualific`, `professional_qualific`, `promotions`, `increment_date`, `duty_assume_date`, `pension_date`, `joined_date`) VALUES
(4, 2, '222', 'kaushalya.h@yahoo.com', '22222', '2', 'Hiroshani Kaushalya', 'H. Kaushalya', 'f', 1, '4321', '909890989V', 'Rajagiriya', '2', 22, 8, '1', 9, 's', '2015-05-01', '0712222222', '0112222222', '1993-03-03', 'So Good', 's', '2015-03-21 11:38:00', '2015-05-27 00:00:00', 'http://localhost/sep-testmerge/uploads/Chrysanthemum2.jpg', NULL, NULL, 1, 1, 7, 'Bsc degree in sinhala', 'Two years experience with ABC company as a writer', NULL, NULL, NULL, '2043-11-08', '2015-05-27'),
(5, 18, '987', 'dush@mahabaduge.lk', '45646', '23', 'Dushyantha Mahabaduge', 'D. Mahabaduge', 'm', 5, '12546', '921235523V', '34/a kotte para - Gampaha', '360', 20, 12, '1', 1, 't', '2015-04-30', '0712345675', '0112456324', '1980-02-01', 'Good', 'm', '2015-03-21 11:43:00', '2015-05-27 00:00:00', 'http://localhost/gitsep/sep/uploads/307804_2086096962551_1782903218_n.jpg', NULL, NULL, 1, 1, 7, 'Bsc in Civil Engineering , Msc in Compter Science', 'former vice president of ABC college', NULL, NULL, NULL, '2027-07-15', '2015-05-01'),
(8, 4, '65666', 'badde@sakya.lk', '785', NULL, 'Samitha Rathnayake', 'S Rathnayake', 'm', 5, NULL, '655214253V', 'Sakya, Nugegoda', '235621', NULL, 9, NULL, 5, 'e', '2015-03-21', '0712345675', '0112456324', '1989-03-21', NULL, 'w', '2015-03-21 11:57:00', NULL, 'http://localhost/sep-testmerge/uploads/Add-Male-User2562.png', NULL, NULL, 2, 2, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(9, 5, '999', '', '90000', '2', 'Manoj Solangarachchi', 'M.Solangarachchi', 'm', 7, '8', '750002513V', 'Nugegoda Colombo', '89', 0, 13, '2', 8, 's', '2015-06-01', '0743222111', '', '1995-05-22', 'Good', 'm', '2015-03-21 12:02:00', '2015-06-01 00:00:00', 'http://localhost/sep-testmerge/uploads/Desert.jpg', NULL, NULL, 1, 1, 7, '123', '456', '2', '2026-02-02', NULL, '2021-02-09', '2015-05-29'),
(10, 6, '55555', 'sanna@sanna.lk', '222', NULL, 'Sannasgala', 'S Sannasgala', 'm', 1, NULL, '685242569V', 'Sakya, Nugegoda', '52', NULL, 5, NULL, 11, 's', '2015-03-19', '0712345675', '0112456324', '1960-02-06', NULL, 'w', '2015-03-21 03:03:00', NULL, 'http://localhost/sep-testmerge/uploads/wade1.jpg', NULL, NULL, 2, 2, 5, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(12, 10, '25555', 'udarapathmin@gmail.com', '520', NULL, 'Udara Karunarathna', 'Udara Karunarathna', 'm', 0, NULL, '933564152V', '266/8 Kohomban watta', '1', NULL, 0, NULL, 0, 's', '2015-03-11', '0766663414', '0112456324', '1993-03-31', NULL, 'm', '2015-03-22 07:58:42', NULL, 'http://localhost/sep-testmerge/uploads/Chrysanthemum2.jpg', NULL, NULL, 2, 1, 6, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(13, 12, '123699', 'warunaskysliit@gmail.com', '555', NULL, 'supun sudaraka', 'S.Sudaraka', 'm', 0, NULL, '909876576v', '266/8 Kohomban watta', '1', NULL, 0, NULL, 0, 'n', '2015-03-15', '0766663414', '0112456324', '1995-03-22', NULL, 'm', '2015-03-22 08:42:50', NULL, 'http://localhost/sep-testmerge/uploads/Penguins2.jpg', NULL, NULL, 1, 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(15, 14, '12367', 'udarapathmin@gmail.com', '124', NULL, 'gunathilaka m.s.s', 'gunathilaka', 'm', 2, NULL, '988256787v', '266/8 Kohomban watta', '201', NULL, 10, NULL, 10, 'e', '2015-03-11', '0766663414', '0112456324', '1991-03-22', NULL, 's', '2015-03-22 10:13:14', NULL, 'http://localhost/sep-testmerge/uploads/Add-Male-User2562.png', NULL, NULL, 3, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(20, NULL, '980', 'ssgunathilaka@gmail.com', '99946', '56', 'hello sajja', 'H. sajja', 'm', 1, '45356', '999999999v', 'colombo', '2', 21, 10, '3', 9, 't', '2015-05-28', '0743222111', '0112334455', '1992-12-12', 'Good', 'm', '2015-05-13 04:52:07', '2015-05-29 00:00:00', 'http://localhost/sep-testmerge/uploads/Desert.jpg', NULL, NULL, 1, 1, 7, 'Bsc degree ', 'no qualifications', '2', '2015-05-31', NULL, '2015-05-31', '2015-05-30'),
(21, 16, '22211', 'badde@yahoo.com', '100', NULL, 'testing1', 'test1', 'm', 1, NULL, '888899990v', 'kandy', '34', NULL, 5, NULL, 6, 's', '2015-05-13', '0772334455', '0112334455', '1993-12-12', NULL, 's', '2015-05-13 05:02:36', NULL, 'http://localhost/sep-testmerge/uploads/wade1.jpg', NULL, NULL, 2, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(24, 44, '919', 'ssgunathilaka@gmail.com', '99199', '1234', 'Namali jayasinghe', 'N. Jayasinghe', 'f', 7, '9999', '889966556v', 'galle', '1', 4, 8, '2', 9, 's', '2015-05-25', '0712440448', '0112456654', '1992-06-04', 'Good', 'm', '2015-05-26 05:41:19', '2015-05-31 00:00:00', 'http://localhost/sep-testmerge/uploads/Add-Male-User2562.png', NULL, NULL, 1, 1, 7, 'Bsc. Degree specialization in IT', 'Pissu hadei :p', '3', '2015-05-31', NULL, '2045-05-31', '2015-05-26'),
(25, 18, '111', 'ssgunathilaka@gmail.com', '11111', '125', 'Malawara Arachchige Sajith Sudharshana Gunathilaka', 'M.A.S.S Gunathilaka', 'm', 5, '1234', '939297896V', '372/4 pipe road, thalangama north - koswatta', '12', 12, 1, '1', 1, 's', '2015-05-15', '0712440448', '0112790170', '1993-11-08', 'good', 's', '2015-05-15 07:56:52', '2015-05-29 00:00:00', 'http://localhost/sep-testmerge/uploads/Chrysanthemum2.jpg', NULL, NULL, 1, 1, 3, 'dferrrwerewr', 'trtrettetet', '3', '2015-05-30', NULL, '2015-05-31', '2015-05-01'),
(26, 19, '888', '', '12323', NULL, 'Sachi Ruth', 'S.R', 'f', 0, NULL, '990099009V', 'galle', '', NULL, 0, NULL, 0, 'n', '2015-05-15', '0743222111', '', '1992-12-12', NULL, 's', '2015-05-15 18:46:46', NULL, 'http://localhost/sep-testmerge/uploads/Add-Male-User2562.png', NULL, NULL, 1, 1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(30, 46, '880', 'arunthms01@gmail.com', '39899', '456', 'Arun Thomas', 'A.P Thomas', 'm', 3, '12335', '991122443V', 'kandy', '1', 2, 11, '1', 1, 's', '2015-05-29', '0772334455', '0112334455', '1920-05-29', 'Good', 's', '2015-05-15 19:16:54', '2015-05-31 00:00:00', 'http://localhost/sep-testmerge/uploads/wade1.jpg', NULL, NULL, 5, 1, 7, 'Bsc Degree specialization in Software Engineering ', 'Working in a Software Company for 6 months', '2', '2015-05-28', NULL, '2034-12-30', '2015-05-07'),
(32, 25, '900', 'badde@yahoo.com', '12320', '789', 'Vihanga uwanthaka', 'T.W.V.U Madushan', 'm', 5, 'a', '991122449V', 'Malabe', '34', 0, 9, '3', 3, 's', '2015-05-01', '0772334455', '0112790170', '1992-05-30', 'Good', 'w', '2015-05-30 13:34:27', '2015-05-30 00:00:00', 'http://localhost/sep-testmerge/uploads/Desert.jpg', NULL, NULL, 6, 1, 7, 'no', 'no', '1', '2015-05-29', NULL, '2015-05-07', '2015-05-30'),
(33, 43, '678', '', '89087', '9098', 'Pradeep Rangana', 'P. Rangana', 'm', 5, '890', '898909898V', 'Rajagiriya', '67', NULL, 8, '3', 6, 't', '2015-05-31', '0712922921', '0112299562', '1968-04-12', NULL, 'm', '2015-05-31 16:51:49', NULL, 'http://localhost/sep-testmerge/uploads/Add-Male-User2562.png', NULL, NULL, 5, 1, 7, 'Just a training', 'Former teacher of kingswood college', NULL, NULL, NULL, '2015-05-04', '1971-06-14'),
(34, 45, '121', 'don.philip@yahoo.com', '23213', '89', 'Don Philip Kumara', 'D.P Kumara', 'm', 4, '111', '898909908V', 'mannarama', '23', NULL, 12, '2', 6, 't', '2015-06-01', '0772334455', '0112299562', '1975-02-26', NULL, 'm', '2015-06-01 09:25:04', NULL, 'http://localhost/sep-testmerge/uploads/Chrysanthemum2.jpg', NULL, NULL, 2, 2, 7, 'No', 'No', NULL, NULL, NULL, '2036-07-17', '2015-06-01'),
(35, 47, '1', '', '1234', '', 'Madhushan Minditha', 'M. Minditha', 'm', 3, '12344', '919395979V', 'colombo', '', NULL, 9, '3', 5, 's', '0000-00-00', '0712922921', '', '1991-07-17', NULL, 'm', '2015-06-01 13:15:29', NULL, 'http://localhost/sep-testmerge/uploads/,,_fbdbs.jpg', NULL, NULL, 1, 1, 7, '', '', NULL, NULL, NULL, '0000-00-00', '2015-06-01'),
(36, 48, '212', '', '23421', '', 'prabhashi', 'P.P.P.S.P', 'f', 0, '12344', '998765234V', 'Malabe', '', NULL, 10, '1', 0, 's', '0000-00-00', '0712440448', '', '1988-02-09', NULL, 's', '2015-06-15 13:10:22', NULL, 'http://localhost/sep-testmerge/uploads/', NULL, NULL, 1, 1, 0, '', '', NULL, NULL, NULL, '0000-00-00', '2015-06-15'),
(37, 17, '123', 'udarapathmin@gmail.com', '55555', '156', 'Anton Dias Karunarathna', 'A. D. Karunarathna', 'm', 4, '1234', '573564150V', '266/ Kohomban watta', '123', NULL, 7, '1', 2, 's', '1980-07-04', '0717863444', '0717863444', '1957-07-04', NULL, 'm', '2015-07-04 07:37:53', NULL, 'http://localhost/gitsep/sep/uploads/10687373_10203183984150972_2513763604645423514_o.jpg', NULL, NULL, 1, 1, 7, 'asgag', 'agaga', NULL, NULL, NULL, '2017-07-04', '2015-06-30');

-- --------------------------------------------------------

--
-- Table structure for table `teacher_attendance`
--

CREATE TABLE IF NOT EXISTS `teacher_attendance` (
  `teacher_id` int(11) NOT NULL,
  `signature_no` int(11) NOT NULL,
  `is_present` tinyint(1) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teacher_attendance`
--

INSERT INTO `teacher_attendance` (`teacher_id`, `signature_no`, `is_present`, `date`) VALUES
(4, 67844, 1, '2015-05-12'),
(10, 55555, 1, '2015-05-22'),
(12, 25555, 1, '2015-05-12'),
(12, 25555, 1, '2015-05-22'),
(13, 123699, 1, '2015-05-22'),
(14, 69975, 1, '2015-05-22');

-- --------------------------------------------------------

--
-- Table structure for table `temp_teacher_attendance`
--

CREATE TABLE IF NOT EXISTS `temp_teacher_attendance` (
  `teacher_id` int(11) NOT NULL,
  `signature_no` int(11) NOT NULL,
  `is_present` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `temp_teacher_attendance`
--

INSERT INTO `temp_teacher_attendance` (`teacher_id`, `signature_no`, `is_present`) VALUES
(10, 55555, 1),
(13, 123699, 1),
(15, 12367, 1);

-- --------------------------------------------------------

--
-- Table structure for table `timetable_slot`
--

CREATE TABLE IF NOT EXISTS `timetable_slot` (
  `timetable_id` int(11) NOT NULL,
  `slot_id` char(3) NOT NULL,
  `teacher_id` int(11) DEFAULT NULL,
  `subject_id` int(11) DEFAULT NULL,
  `year` year(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `timetable_slot`
--

INSERT INTO `timetable_slot` (`timetable_id`, `slot_id`, `teacher_id`, `subject_id`, `year`) VALUES
(4, 'FR4', 15, 1, 2015),
(4, 'MO1', 9, 1, 2015),
(4, 'TU3', 8, 1, 2015),
(4, 'WE3', 10, 1, 2015),
(5, 'MO1', 4, 1, 2015),
(5, 'TH1', 12, 1, 2015),
(5, 'TU4', 13, 1, 2015),
(7, 'TU1', 5, 1, 2015);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(128) NOT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `user_type` char(1) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `profile_img` text,
  `lastvisit_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `superuser` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `first_name`, `last_name`, `user_type`, `created_at`, `email`, `profile_img`, `lastvisit_at`, `superuser`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'System', 'Admin', 'A', '2015-03-15 09:51:00', '', 'http://localhost:81/sep/uploads/profile_img1.png', '0000-00-00 00:00:00', 1),
(2, 'teacher', '8d788385431273d11e8b43bb78f3aa41', 'Teacher', 'System', 'T', '2015-03-21 00:00:00', '', '', '0000-00-00 00:00:00', 0),
(3, 'udara', '6fd9dc767551bf70beed1e95a15a576e', 'Udara', 'Karunarathna', 'A', '2015-03-21 10:22:04', 'udarapath@gmail.com', NULL, '0000-00-00 00:00:00', 1),
(4, 'badde', '8d788385431273d11e8b43bb78f3aa41', 'Badde', 'Badde', 'T', '2015-03-21 11:57:00', '', NULL, '0000-00-00 00:00:00', 0),
(6, 'sanna', '6c5b7397d808461eb9863b3f24cbcdb4', NULL, NULL, '', '2015-03-21 03:03:00', '', NULL, '0000-00-00 00:00:00', 0),
(10, 'udarapath', '7702c717c66cf8b997496c94cf654179', NULL, NULL, 'T', '2015-03-22 08:12:36', NULL, NULL, '0000-00-00 00:00:00', 0),
(12, 'sajja', '009c5b3132af48f4064d1f635767717a', NULL, NULL, 'T', '2015-03-22 08:42:58', NULL, NULL, '0000-00-00 00:00:00', 0),
(13, 'udara93', 'afb317578f85a604534fd7a8e3bfa4a3', NULL, NULL, 'T', '2015-03-22 09:31:20', NULL, NULL, '0000-00-00 00:00:00', 0),
(14, 'sajjanew', '99dbd6fde57f2b454915383d7027ecce', NULL, NULL, 'T', '2015-03-22 10:13:40', NULL, NULL, '0000-00-00 00:00:00', 0),
(15, 'udara1', '6b357695d1c4bcd55ae58e0a0f6d1a12', NULL, NULL, 'T', '2015-05-10 09:48:55', NULL, NULL, '0000-00-00 00:00:00', 0),
(16, '1122', 'd607442b268de5aed04df19ff8bf8212', NULL, NULL, 'S', '2015-07-03 20:40:26', NULL, NULL, '0000-00-00 00:00:00', 0),
(17, 'adkaru', '1e159b6c2ddbe4e01fea0aced0f431d0', NULL, NULL, 'T', '2015-07-04 07:38:39', NULL, NULL, '0000-00-00 00:00:00', 0),
(18, 'dushyantha', '14c37ad04697b7e251971c98c3438edb', NULL, NULL, 'T', '2015-07-04 07:48:23', NULL, NULL, '0000-00-00 00:00:00', 0),
(19, '5545', 'e99a18c428cb38d5f260853678922e03', NULL, NULL, 'S', '2015-07-04 08:25:48', NULL, NULL, '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `year_plan`
--

CREATE TABLE IF NOT EXISTS `year_plan` (
  `id` int(11) NOT NULL,
  `name` varchar(25) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `status` tinyint(4) NOT NULL COMMENT '1 - Active 0 - Inactive',
  `t1_start_date` date NOT NULL,
  `t1_end_date` date NOT NULL,
  `t2_start_date` date NOT NULL,
  `t2_end_date` date NOT NULL,
  `t3_start_date` date NOT NULL,
  `t3_end_date` date NOT NULL,
  `structure` text
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `year_plan`
--

INSERT INTO `year_plan` (`id`, `name`, `start_date`, `end_date`, `status`, `t1_start_date`, `t1_end_date`, `t2_start_date`, `t2_end_date`, `t3_start_date`, `t3_end_date`, `structure`) VALUES
(6, 'AY2015', '2015-01-01', '2015-12-31', 1, '2015-01-05', '2015-04-10', '2015-04-20', '2015-08-03', '2015-09-07', '2015-12-04', '2015-01-01=1, 2015-01-02=1, 2015-01-03=1, 2015-01-04=1, 2015-01-05=0, 2015-01-06=0, 2015-01-07=0, 2015-01-08=0, 2015-01-09=0, 2015-01-10=1, 2015-01-11=1, 2015-01-12=0, 2015-01-13=0, 2015-01-14=0, 2015-01-15=0, 2015-01-16=0, 2015-01-17=1, 2015-01-18=1, 2015-01-19=0, 2015-01-20=0, 2015-01-21=0, 2015-01-22=0, 2015-01-23=0, 2015-01-24=1, 2015-01-25=1, 2015-01-26=0, 2015-01-27=0, 2015-01-28=0, 2015-01-29=0, 2015-01-30=0, 2015-01-31=1, 2015-02-01=1, 2015-02-02=0, 2015-02-03=0, 2015-02-04=0, 2015-02-05=0, 2015-02-06=0, 2015-02-07=1, 2015-02-08=1, 2015-02-09=0, 2015-02-10=0, 2015-02-11=0, 2015-02-12=0, 2015-02-13=0, 2015-02-14=1, 2015-02-15=1, 2015-02-16=0, 2015-02-17=0, 2015-02-18=0, 2015-02-19=0, 2015-02-20=0, 2015-02-21=1, 2015-02-22=1, 2015-02-23=0, 2015-02-24=0, 2015-02-25=0, 2015-02-26=0, 2015-02-27=0, 2015-02-28=1, 2015-03-01=1, 2015-03-02=0, 2015-03-03=0, 2015-03-04=0, 2015-03-05=0, 2015-03-06=0, 2015-03-07=1, 2015-03-08=1, 2015-03-09=0, 2015-03-10=0, 2015-03-11=0, 2015-03-12=0, 2015-03-13=0, 2015-03-14=1, 2015-03-15=1, 2015-03-16=0, 2015-03-17=0, 2015-03-18=0, 2015-03-19=0, 2015-03-20=0, 2015-03-21=1, 2015-03-22=1, 2015-03-23=0, 2015-03-24=0, 2015-03-25=0, 2015-03-26=0, 2015-03-27=0, 2015-03-28=1, 2015-03-29=1, 2015-03-30=0, 2015-03-31=0, 2015-04-01=0, 2015-04-02=0, 2015-04-03=0, 2015-04-04=1, 2015-04-05=1, 2015-04-06=0, 2015-04-07=0, 2015-04-08=0, 2015-04-09=0, 2015-04-10=0, 2015-04-11=1, 2015-04-12=1, 2015-04-13=1, 2015-04-14=1, 2015-04-15=1, 2015-04-16=1, 2015-04-17=1, 2015-04-18=1, 2015-04-19=1, 2015-04-20=0, 2015-04-21=0, 2015-04-22=0, 2015-04-23=0, 2015-04-24=0, 2015-04-25=1, 2015-04-26=1, 2015-04-27=0, 2015-04-28=0, 2015-04-29=0, 2015-04-30=0, 2015-05-01=0, 2015-05-02=1, 2015-05-03=1, 2015-05-04=0, 2015-05-05=2, 2015-05-06=0, 2015-05-07=0, 2015-05-08=0, 2015-05-09=1, 2015-05-10=1, 2015-05-11=0, 2015-05-12=0, 2015-05-13=3, 2015-05-14=0, 2015-05-15=0, 2015-05-16=1, 2015-05-17=1, 2015-05-18=0, 2015-05-19=0, 2015-05-20=0, 2015-05-21=0, 2015-05-22=0, 2015-05-23=5, 2015-05-24=5, 2015-05-25=0, 2015-05-26=0, 2015-05-27=2, 2015-05-28=0, 2015-05-29=0, 2015-05-30=1, 2015-05-31=1, 2015-06-01=0, 2015-06-02=0, 2015-06-03=0, 2015-06-04=0, 2015-06-05=0, 2015-06-06=1, 2015-06-07=1, 2015-06-08=0, 2015-06-09=0, 2015-06-10=0, 2015-06-11=0, 2015-06-12=0, 2015-06-13=1, 2015-06-14=1, 2015-06-15=0, 2015-06-16=0, 2015-06-17=0, 2015-06-18=0, 2015-06-19=0, 2015-06-20=1, 2015-06-21=1, 2015-06-22=0, 2015-06-23=0, 2015-06-24=0, 2015-06-25=0, 2015-06-26=0, 2015-06-27=1, 2015-06-28=1, 2015-06-29=0, 2015-06-30=0, 2015-07-01=0, 2015-07-02=0, 2015-07-03=0, 2015-07-04=1, 2015-07-05=1, 2015-07-06=0, 2015-07-07=0, 2015-07-08=0, 2015-07-09=0, 2015-07-10=0, 2015-07-11=1, 2015-07-12=1, 2015-07-13=0, 2015-07-14=0, 2015-07-15=0, 2015-07-16=0, 2015-07-17=0, 2015-07-18=1, 2015-07-19=1, 2015-07-20=0, 2015-07-21=0, 2015-07-22=2, 2015-07-23=0, 2015-07-24=0, 2015-07-25=1, 2015-07-26=1, 2015-07-27=0, 2015-07-28=0, 2015-07-29=0, 2015-07-30=3, 2015-07-31=0, 2015-08-01=5, 2015-08-02=1, 2015-08-03=0, 2015-08-04=1, 2015-08-05=1, 2015-08-06=1, 2015-08-07=1, 2015-08-08=1, 2015-08-09=1, 2015-08-10=1, 2015-08-11=1, 2015-08-12=1, 2015-08-13=1, 2015-08-14=1, 2015-08-15=1, 2015-08-16=1, 2015-08-17=1, 2015-08-18=1, 2015-08-19=1, 2015-08-20=1, 2015-08-21=1, 2015-08-22=1, 2015-08-23=1, 2015-08-24=1, 2015-08-25=1, 2015-08-26=1, 2015-08-27=1, 2015-08-28=1, 2015-08-29=1, 2015-08-30=1, 2015-08-31=1, 2015-09-01=1, 2015-09-02=1, 2015-09-03=1, 2015-09-04=1, 2015-09-05=1, 2015-09-06=1, 2015-09-07=0, 2015-09-08=0, 2015-09-09=0, 2015-09-10=0, 2015-09-11=0, 2015-09-12=1, 2015-09-13=1, 2015-09-14=0, 2015-09-15=0, 2015-09-16=0, 2015-09-17=0, 2015-09-18=0, 2015-09-19=1, 2015-09-20=1, 2015-09-21=0, 2015-09-22=0, 2015-09-23=0, 2015-09-24=0, 2015-09-25=0, 2015-09-26=1, 2015-09-27=1, 2015-09-28=0, 2015-09-29=0, 2015-09-30=0, 2015-10-01=0, 2015-10-02=0, 2015-10-03=1, 2015-10-04=1, 2015-10-05=0, 2015-10-06=0, 2015-10-07=0, 2015-10-08=0, 2015-10-09=0, 2015-10-10=1, 2015-10-11=1, 2015-10-12=0, 2015-10-13=0, 2015-10-14=0, 2015-10-15=0, 2015-10-16=0, 2015-10-17=1, 2015-10-18=1, 2015-10-19=0, 2015-10-20=0, 2015-10-21=0, 2015-10-22=0, 2015-10-23=0, 2015-10-24=1, 2015-10-25=1, 2015-10-26=0, 2015-10-27=0, 2015-10-28=0, 2015-10-29=0, 2015-10-30=0, 2015-10-31=1, 2015-11-01=1, 2015-11-02=0, 2015-11-03=0, 2015-11-04=0, 2015-11-05=0, 2015-11-06=0, 2015-11-07=1, 2015-11-08=1, 2015-11-09=0, 2015-11-10=0, 2015-11-11=0, 2015-11-12=0, 2015-11-13=0, 2015-11-14=1, 2015-11-15=1, 2015-11-16=0, 2015-11-17=0, 2015-11-18=0, 2015-11-19=0, 2015-11-20=0, 2015-11-21=1, 2015-11-22=1, 2015-11-23=0, 2015-11-24=0, 2015-11-25=0, 2015-11-26=0, 2015-11-27=0, 2015-11-28=1, 2015-11-29=1, 2015-11-30=0, 2015-12-01=0, 2015-12-02=0, 2015-12-03=0, 2015-12-04=0, 2015-12-05=1, 2015-12-06=1, 2015-12-07=1, 2015-12-08=1, 2015-12-09=1, 2015-12-10=1, 2015-12-11=1, 2015-12-12=1, 2015-12-13=1, 2015-12-14=1, 2015-12-15=1, 2015-12-16=1, 2015-12-17=1, 2015-12-18=1, 2015-12-19=1, 2015-12-20=1, 2015-12-21=1, 2015-12-22=1, 2015-12-23=1, 2015-12-24=1, 2015-12-25=1, 2015-12-26=1, 2015-12-27=1, 2015-12-28=1, 2015-12-29=1, 2015-12-30=1, 2015-12-31=1'),
(7, 'AY2016', '2016-01-01', '2016-12-31', 0, '2016-01-12', '2016-01-04', '2016-05-01', '2016-08-12', '2016-09-01', '2016-12-12', '2016-01-01=1, 2016-01-02=1, 2016-01-03=1, 2016-01-04=1, 2016-01-05=1, 2016-01-06=1, 2016-01-07=1, 2016-01-08=1, 2016-01-09=1, 2016-01-10=1, 2016-01-11=1, 2016-01-12=0, 2016-01-13=0, 2016-01-14=0, 2016-01-15=0, 2016-01-16=1, 2016-01-17=1, 2016-01-18=0, 2016-01-19=0, 2016-01-20=0, 2016-01-21=1, 2016-01-22=1, 2016-01-23=1, 2016-01-24=1, 2016-01-25=1, 2016-01-26=1, 2016-01-27=1, 2016-01-28=1, 2016-01-29=1, 2016-01-30=1, 2016-01-31=1, 2016-02-01=1, 2016-02-02=1, 2016-02-03=1, 2016-02-04=1, 2016-02-05=1, 2016-02-06=1, 2016-02-07=1, 2016-02-08=1, 2016-02-09=1, 2016-02-10=1, 2016-02-11=1, 2016-02-12=1, 2016-02-13=1, 2016-02-14=1, 2016-02-15=1, 2016-02-16=1, 2016-02-17=1, 2016-02-18=1, 2016-02-19=1, 2016-02-20=1, 2016-02-21=1, 2016-02-22=1, 2016-02-23=1, 2016-02-24=1, 2016-02-25=1, 2016-02-26=1, 2016-02-27=1, 2016-02-28=1, 2016-02-29=1, 2016-03-01=1, 2016-03-02=1, 2016-03-03=1, 2016-03-04=1, 2016-03-05=1, 2016-03-06=1, 2016-03-07=1, 2016-03-08=1, 2016-03-09=1, 2016-03-10=1, 2016-03-11=1, 2016-03-12=1, 2016-03-13=1, 2016-03-14=1, 2016-03-15=1, 2016-03-16=1, 2016-03-17=1, 2016-03-18=1, 2016-03-19=1, 2016-03-20=1, 2016-03-21=1, 2016-03-22=1, 2016-03-23=1, 2016-03-24=1, 2016-03-25=1, 2016-03-26=1, 2016-03-27=1, 2016-03-28=1, 2016-03-29=1, 2016-03-30=1, 2016-03-31=1, 2016-04-01=1, 2016-04-02=1, 2016-04-03=1, 2016-04-04=1, 2016-04-05=1, 2016-04-06=1, 2016-04-07=1, 2016-04-08=1, 2016-04-09=1, 2016-04-10=1, 2016-04-11=1, 2016-04-12=1, 2016-04-13=1, 2016-04-14=1, 2016-04-15=1, 2016-04-16=1, 2016-04-17=1, 2016-04-18=1, 2016-04-19=1, 2016-04-20=1, 2016-04-21=1, 2016-04-22=1, 2016-04-23=1, 2016-04-24=1, 2016-04-25=1, 2016-04-26=1, 2016-04-27=1, 2016-04-28=1, 2016-04-29=1, 2016-04-30=1, 2016-05-01=1, 2016-05-02=0, 2016-05-03=0, 2016-05-04=0, 2016-05-05=0, 2016-05-06=0, 2016-05-07=1, 2016-05-08=1, 2016-05-09=0, 2016-05-10=0, 2016-05-11=0, 2016-05-12=0, 2016-05-13=0, 2016-05-14=1, 2016-05-15=1, 2016-05-16=0, 2016-05-17=0, 2016-05-18=0, 2016-05-19=0, 2016-05-20=0, 2016-05-21=1, 2016-05-22=1, 2016-05-23=0, 2016-05-24=0, 2016-05-25=0, 2016-05-26=0, 2016-05-27=0, 2016-05-28=1, 2016-05-29=1, 2016-05-30=0, 2016-05-31=0, 2016-06-01=0, 2016-06-02=0, 2016-06-03=0, 2016-06-04=1, 2016-06-05=1, 2016-06-06=0, 2016-06-07=0, 2016-06-08=0, 2016-06-09=0, 2016-06-10=0, 2016-06-11=1, 2016-06-12=1, 2016-06-13=0, 2016-06-14=0, 2016-06-15=0, 2016-06-16=0, 2016-06-17=0, 2016-06-18=1, 2016-06-19=1, 2016-06-20=0, 2016-06-21=0, 2016-06-22=0, 2016-06-23=0, 2016-06-24=0, 2016-06-25=1, 2016-06-26=1, 2016-06-27=0, 2016-06-28=0, 2016-06-29=0, 2016-06-30=0, 2016-07-01=0, 2016-07-02=1, 2016-07-03=1, 2016-07-04=0, 2016-07-05=0, 2016-07-06=0, 2016-07-07=0, 2016-07-08=0, 2016-07-09=1, 2016-07-10=1, 2016-07-11=0, 2016-07-12=0, 2016-07-13=0, 2016-07-14=0, 2016-07-15=0, 2016-07-16=1, 2016-07-17=1, 2016-07-18=0, 2016-07-19=0, 2016-07-20=0, 2016-07-21=0, 2016-07-22=0, 2016-07-23=1, 2016-07-24=1, 2016-07-25=0, 2016-07-26=0, 2016-07-27=0, 2016-07-28=0, 2016-07-29=0, 2016-07-30=1, 2016-07-31=1, 2016-08-01=0, 2016-08-02=0, 2016-08-03=0, 2016-08-04=0, 2016-08-05=0, 2016-08-06=1, 2016-08-07=1, 2016-08-08=0, 2016-08-09=0, 2016-08-10=0, 2016-08-11=0, 2016-08-12=0, 2016-08-13=1, 2016-08-14=1, 2016-08-15=1, 2016-08-16=1, 2016-08-17=1, 2016-08-18=1, 2016-08-19=1, 2016-08-20=1, 2016-08-21=1, 2016-08-22=1, 2016-08-23=1, 2016-08-24=1, 2016-08-25=1, 2016-08-26=1, 2016-08-27=1, 2016-08-28=1, 2016-08-29=1, 2016-08-30=1, 2016-08-31=1, 2016-09-01=0, 2016-09-02=0, 2016-09-03=1, 2016-09-04=1, 2016-09-05=0, 2016-09-06=0, 2016-09-07=0, 2016-09-08=0, 2016-09-09=0, 2016-09-10=1, 2016-09-11=1, 2016-09-12=0, 2016-09-13=0, 2016-09-14=0, 2016-09-15=0, 2016-09-16=0, 2016-09-17=1, 2016-09-18=1, 2016-09-19=0, 2016-09-20=0, 2016-09-21=0, 2016-09-22=0, 2016-09-23=0, 2016-09-24=1, 2016-09-25=1, 2016-09-26=0, 2016-09-27=0, 2016-09-28=0, 2016-09-29=0, 2016-09-30=0, 2016-10-01=1, 2016-10-02=1, 2016-10-03=0, 2016-10-04=0, 2016-10-05=0, 2016-10-06=0, 2016-10-07=0, 2016-10-08=1, 2016-10-09=1, 2016-10-10=0, 2016-10-11=0, 2016-10-12=0, 2016-10-13=0, 2016-10-14=0, 2016-10-15=1, 2016-10-16=1, 2016-10-17=0, 2016-10-18=0, 2016-10-19=0, 2016-10-20=0, 2016-10-21=0, 2016-10-22=1, 2016-10-23=1, 2016-10-24=0, 2016-10-25=0, 2016-10-26=0, 2016-10-27=0, 2016-10-28=0, 2016-10-29=1, 2016-10-30=1, 2016-10-31=0, 2016-11-01=0, 2016-11-02=0, 2016-11-03=0, 2016-11-04=0, 2016-11-05=1, 2016-11-06=1, 2016-11-07=0, 2016-11-08=0, 2016-11-09=0, 2016-11-10=0, 2016-11-11=0, 2016-11-12=1, 2016-11-13=1, 2016-11-14=0, 2016-11-15=0, 2016-11-16=0, 2016-11-17=0, 2016-11-18=0, 2016-11-19=1, 2016-11-20=1, 2016-11-21=0, 2016-11-22=0, 2016-11-23=0, 2016-11-24=0, 2016-11-25=0, 2016-11-26=1, 2016-11-27=1, 2016-11-28=0, 2016-11-29=0, 2016-11-30=0, 2016-12-01=0, 2016-12-02=0, 2016-12-03=1, 2016-12-04=1, 2016-12-05=0, 2016-12-06=0, 2016-12-07=0, 2016-12-08=0, 2016-12-09=0, 2016-12-10=1, 2016-12-11=1, 2016-12-12=0, 2016-12-13=1, 2016-12-14=1, 2016-12-15=1, 2016-12-16=1, 2016-12-17=1, 2016-12-18=1, 2016-12-19=1, 2016-12-20=1, 2016-12-21=1, 2016-12-22=1, 2016-12-23=1, 2016-12-24=1, 2016-12-25=1, 2016-12-26=1, 2016-12-27=1, 2016-12-28=1, 2016-12-29=1, 2016-12-30=1, 2016-12-31=1');

-- --------------------------------------------------------

--
-- Table structure for table `year_plan_temp_date`
--

CREATE TABLE IF NOT EXISTS `year_plan_temp_date` (
  `id` int(11) NOT NULL,
  `year_id` int(11) NOT NULL,
  `date` varchar(255) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `year_plan_temp_date`
--

INSERT INTO `year_plan_temp_date` (`id`, `year_id`, `date`, `status`) VALUES
(1, 6, '2015-05-06', 0),
(4, 6, '2015-05-27', 0),
(7, 6, '2015-05-23', 1),
(10, 6, '2015-05-23', 1),
(11, 6, '2015-05-05', 0),
(12, 6, '2015-05-13', 0),
(14, 6, '2015-05-24', 1),
(15, 6, '2015-05-27', 0),
(16, 6, '2015-07-22', 0),
(17, 6, '2015-07-30', 0),
(18, 6, '2015-08-01', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activity_feed`
--
ALTER TABLE `activity_feed`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `activity_type`
--
ALTER TABLE `activity_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `apply_leaves`
--
ALTER TABLE `apply_leaves`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `apply_short_leaves`
--
ALTER TABLE `apply_short_leaves`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `archived_students`
--
ALTER TABLE `archived_students`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `archived_teachers`
--
ALTER TABLE `archived_teachers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ci_cookies`
--
ALTER TABLE `ci_cookies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ci_sessions`
--
ALTER TABLE `ci_sessions`
  ADD PRIMARY KEY (`session_id`), ADD KEY `last_activity_idx` (`last_activity`);

--
-- Indexes for table `classes`
--
ALTER TABLE `classes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `class_timetable`
--
ALTER TABLE `class_timetable`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `event_type`
--
ALTER TABLE `event_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `exams`
--
ALTER TABLE `exams`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `exam_marks`
--
ALTER TABLE `exam_marks`
  ADD PRIMARY KEY (`exam_id`,`student_id`,`subject_id`);

--
-- Indexes for table `exam_subjects`
--
ALTER TABLE `exam_subjects`
  ADD PRIMARY KEY (`exam_id`,`subject_id`);

--
-- Indexes for table `government_exams`
--
ALTER TABLE `government_exams`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `government_exam_admission_nos`
--
ALTER TABLE `government_exam_admission_nos`
  ADD PRIMARY KEY (`government_exam_id`,`student_id`,`admission_no`);

--
-- Indexes for table `grades`
--
ALTER TABLE `grades`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `guardians`
--
ALTER TABLE `guardians`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `houses`
--
ALTER TABLE `houses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `leave_status`
--
ALTER TABLE `leave_status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `leave_types`
--
ALTER TABLE `leave_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sections`
--
ALTER TABLE `sections`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `short_leave_types`
--
ALTER TABLE `short_leave_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_class`
--
ALTER TABLE `student_class`
  ADD PRIMARY KEY (`student_id`,`class_id`,`year`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teacher_attendance`
--
ALTER TABLE `teacher_attendance`
  ADD PRIMARY KEY (`teacher_id`,`signature_no`,`date`);

--
-- Indexes for table `temp_teacher_attendance`
--
ALTER TABLE `temp_teacher_attendance`
  ADD PRIMARY KEY (`teacher_id`,`signature_no`);

--
-- Indexes for table `timetable_slot`
--
ALTER TABLE `timetable_slot`
  ADD PRIMARY KEY (`timetable_id`,`slot_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `year_plan`
--
ALTER TABLE `year_plan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `year_plan_temp_date`
--
ALTER TABLE `year_plan_temp_date`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activity_feed`
--
ALTER TABLE `activity_feed`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `activity_type`
--
ALTER TABLE `activity_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `apply_leaves`
--
ALTER TABLE `apply_leaves`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=48;
--
-- AUTO_INCREMENT for table `apply_short_leaves`
--
ALTER TABLE `apply_short_leaves`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `archived_students`
--
ALTER TABLE `archived_students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `archived_teachers`
--
ALTER TABLE `archived_teachers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `ci_cookies`
--
ALTER TABLE `ci_cookies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `classes`
--
ALTER TABLE `classes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `class_timetable`
--
ALTER TABLE `class_timetable`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `event_type`
--
ALTER TABLE `event_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `exams`
--
ALTER TABLE `exams`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `government_exams`
--
ALTER TABLE `government_exams`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `grades`
--
ALTER TABLE `grades`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `guardians`
--
ALTER TABLE `guardians`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `houses`
--
ALTER TABLE `houses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `leave_types`
--
ALTER TABLE `leave_types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `sections`
--
ALTER TABLE `sections`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `teachers`
--
ALTER TABLE `teachers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=38;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `year_plan`
--
ALTER TABLE `year_plan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `year_plan_temp_date`
--
ALTER TABLE `year_plan_temp_date`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=19;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
