-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 17, 2015 at 09:51 PM
-- Server version: 5.5.16
-- PHP Version: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `osms`
--

-- --------------------------------------------------------

--
-- Table structure for table `parent`
--

CREATE TABLE  `parent` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `fname` text NOT NULL,
  `mname` text NOT NULL,
  `lname` text NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(50) NOT NULL,
  `student_id` varchar(11) NOT NULL,
  `status` int(1) NOT NULL,
  `user_level` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;

--
-- Dumping data for table `parent`
--

INSERT INTO `parent` (`id`, `fname`, `mname`, `lname`, `username`, `password`, `student_id`, `status`, `user_level`) VALUES
(18, 'Mark', 'S', 'Sam', 'parent', 'd0e45878043844ffc41aac437e86b602', 'S1208/001', 1, 'parent'),
(19, 'Charles', 'G', 'Charles', 'parent1', 'd0e45878043844ffc41aac437e86b602', 'S1208/002', 1, 'parent');

-- --------------------------------------------------------

--
-- Table structure for table `results`
--

CREATE TABLE  `results` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `subject_id` varchar(11) NOT NULL,
  `student_id` varchar(11) NOT NULL,
  `marks` int(11) NOT NULL,
  `status` int(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `results`
--

INSERT INTO `results` (`id`, `subject_id`, `student_id`, `marks`, `status`) VALUES
(2, 'MATH2016', 'S1208/001', 56, 1),
(3, 'HIST2015', 'S1208/001', 25, 1);

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE  `subjects` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `subcode` varchar(20) NOT NULL,
  `name` varchar(32) NOT NULL,
  `year` varchar(4) NOT NULL,
  `teacher_id` varchar(11) NOT NULL,
  `status` int(1) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `subcode` (`subcode`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`id`, `subcode`, `name`, `year`, `teacher_id`, `status`) VALUES
(4, 'HIST2015', 'History', '2015', 'STF01', 1),
(5, 'MATH2015', 'Maths', '2015', 'ST02', 1),
(6, 'ENG2017', 'English', '2017', 'STF01', 1),
(7, 'MATH2018', 'Maths', '2018', 'ST03', 1),
(8, 'HIST2017', 'History', '2017', 'ST04', 1),
(9, 'BIO2016', 'Biology', '2016', 'ST03', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE  users(
  id integer NOT NULL AUTO_INCREMENT,
  username varchar(20) NOT NULL,
  password varchar(50) NOT NULL,
  status int(1) NOT NULL,
  user_level varchar(10) NOT NULL,
  info_id INTEGER NOT NULL,
  PRIMARY KEY (`id`)
  FOREIGN KEY info_id REFERENCES user_info`(info_id)
  ON CASCADE DELETE ON CASCADE UPDATE
) ENGINE=InnoDB;
CREATE TABLE  `user_info` (
  `info_id` integer AUTO_INCREMENT NOT NULL,
  `fname` varchar(20) NOT NULL,
  `mname` varchar(20) NOT NULL,
  `lname` varchar(20) NOT NULL,
  `gender` varchar(6) NOT NULL,
  `id` int(11) NOT NULL,
  PRIMARY KEY (`info_id`)
   FOREIGN KEY id REFERENCES users(id)
  ON CASCADE DELETE ON CASCADE UPDATE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `status`, `user_level`, `info_id`) VALUES
(54, 'admin', '21232f297a57a5a743894a0e4a801fc3', 1, 'admin', 'ADM01'),
(61, 'student', 'cd73502828457d15655bbd7a63fb0bc8', 1, 'student', 'S1208/001'),
(62, 'student1', 'cd73502828457d15655bbd7a63fb0bc8', 1, 'student', 'S1208/002'),
(63, 'teacher', '8d788385431273d11e8b43bb78f3aa41', 1, 'teacher', 'STF01'),
(64, 'teacher1', '8d788385431273d11e8b43bb78f3aa41', 1, 'teacher', 'ST02'),
(65, 'teacher2', '8d788385431273d11e8b43bb78f3aa41', 1, 'teacher', 'ST03'),
(66, 'teacher3', '8d788385431273d11e8b43bb78f3aa41', 1, 'teacher', 'ST04');

-- --------------------------------------------------------

--
-- Table structure for table `user_info`
--

--
-- Dumping data for table `user_info`
--

INSERT INTO `user_info` (`fname`, `mname`, `lname`, `gender`) VALUES
('Yona', 'Y', 'Hosea', 'Male'),
('James', 'Mangi', 'Sam', 'male'),
('Mary', 'M', 'Charles', 'Female'),
('Beka', 'S', 'Mwai', 'Male'),
('Ally', 'M', 'Sai', 'male'),
('Salum', 'B', 'Pai', 'Male'),
('Dora', 'B', 'Kev', 'Female');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
