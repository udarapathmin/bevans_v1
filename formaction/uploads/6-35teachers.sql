-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 03, 2015 at 08:04 PM
-- Server version: 5.6.20
-- PHP Version: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `ecole_new`
--

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=37 ;

--
-- Dumping data for table `teachers`
--

INSERT INTO `teachers` (`id`, `user_id`, `signature_no`, `email`, `serial_no`, `personal_file_no`, `full_name`, `name_with_initials`, `gender`, `section`, `teacher_register_no`, `nic_no`, `permanent_addr`, `wnop_no`, `service`, `grade`, `nature_of_appointment`, `main_subject_id`, `medium`, `first_appointment_date`, `contact_mobile`, `contact_home`, `dob`, `remarks`, `civil_status`, `created_at`, `updated_at`, `photo_file_name`, `photo_content_type`, `photo_data`, `religion_id`, `nationality_id`, `designation_id`, `educational_qualific`, `professional_qualific`, `promotions`, `increment_date`, `duty_assume_date`, `pension_date`, `joined_date`) VALUES
(4, 2, '222', 'kaushalya.h@yahoo.com', '22222', '2', 'Hiroshani Kaushalya', 'H. Kaushalya', 'f', 1, '4321', '909890989V', 'Rajagiriya', '2', 22, 8, '1', 9, 's', '2015-05-01', '0712222222', '0112222222', '1993-03-03', 'So Good', 's', '2015-03-21 11:38:00', '2015-05-27 00:00:00', 'http://localhost/sep-testmerge/uploads/Chrysanthemum2.jpg', NULL, NULL, 1, 1, 7, 'Bsc degree in sinhala', 'Two years experience with ABC company as a writer', NULL, NULL, NULL, '2043-11-08', '2015-05-27'),
(5, 0, '987', 'dush@mahabaduge.lk', '45646', '23', 'Dushyantha Mahabaduge', 'D. Mahabaduge', 'm', 5, '12546', '921235523V', '34/a kotte para - Gampaha', '360', 20, 12, '1', 1, 't', '2015-04-30', '0712345675', '0112456324', '1980-02-01', 'Good', 'm', '2015-03-21 11:43:00', '2015-05-27 00:00:00', 'http://localhost/sep-testmerge/uploads/Desert.jpg', NULL, NULL, 1, 1, 7, 'Bsc in Civil Engineering , Msc in Compter Science', 'former vice president of ABC college', NULL, NULL, NULL, '2027-07-15', '2015-05-01'),
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
(36, 48, '212', '', '23421', '', 'prabhashi', 'P.P.P.S.P', 'f', 0, '12344', '998765234V', 'Malabe', '', NULL, 10, '1', 0, 's', '0000-00-00', '0712440448', '', '1988-02-09', NULL, 's', '2015-06-15 13:10:22', NULL, 'http://localhost/sep-testmerge/uploads/', NULL, NULL, 1, 1, 0, '', '', NULL, NULL, NULL, '0000-00-00', '2015-06-15');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `teachers`
--
ALTER TABLE `teachers`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `teachers`
--
ALTER TABLE `teachers`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=37;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
