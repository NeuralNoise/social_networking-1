-- phpMyAdmin SQL Dump
-- version 3.2.0.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 05, 2010 at 06:20 AM
-- Server version: 5.1.36
-- PHP Version: 5.3.0

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `db_mygang`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_account_info`
--

CREATE TABLE IF NOT EXISTS `tbl_account_info` (
  `user_id` int(20) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(50) NOT NULL,
  `email_id` varchar(40) NOT NULL,
  `password` varchar(50) NOT NULL,
  `first_name` varchar(30) NOT NULL,
  `last_name` varchar(40) NOT NULL,
  `gender` varchar(7) NOT NULL,
  `birth_day` int(2) NOT NULL,
  `birth_month` varchar(20) NOT NULL,
  `birth_year` int(4) NOT NULL,
  `country` varchar(60) NOT NULL,
  `city` varchar(40) NOT NULL,
  `relationship_status` varchar(40) NOT NULL,
  `high_school` varchar(40) NOT NULL,
  `college` varchar(40) NOT NULL,
  `company` varchar(40) NOT NULL,
  `about_me` varchar(2000) NOT NULL,
  `hobbies` varchar(400) NOT NULL,
  `contact_no` bigint(15) NOT NULL,
  `alt_contact_no` bigint(15) NOT NULL,
  `alt_email_id` varchar(40) NOT NULL,
  `user_status` int(1) NOT NULL DEFAULT '1',
  `last_login` date NOT NULL,
  `admin_status` int(1) NOT NULL,
  `sec_que` int(1) NOT NULL,
  `sec_ans` varchar(20) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `tbl_account_info`
--

INSERT INTO `tbl_account_info` (`user_id`, `user_name`, `email_id`, `password`, `first_name`, `last_name`, `gender`, `birth_day`, `birth_month`, `birth_year`, `country`, `city`, `relationship_status`, `high_school`, `college`, `company`, `about_me`, `hobbies`, `contact_no`, `alt_contact_no`, `alt_email_id`, `user_status`, `last_login`, `admin_status`, `sec_que`, `sec_ans`) VALUES
(1, 'admin', 'my.gang@rediff.com', 'sespolytechnic', '', '', '', 0, '', 0, '', '', '', '', '', '', '', '', 0, 0, '', 1, '2010-04-02', 1, 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_friend_info`
--

CREATE TABLE IF NOT EXISTS `tbl_friend_info` (
  `user_id` int(20) NOT NULL,
  `friend_id` int(20) NOT NULL,
  `friend_status` int(1) NOT NULL DEFAULT '0',
  KEY `user_id` (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_friend_info`
--


-- --------------------------------------------------------

--
-- Table structure for table `tbl_img_info`
--

CREATE TABLE IF NOT EXISTS `tbl_img_info` (
  `img_id` int(20) NOT NULL AUTO_INCREMENT,
  `user_id` int(20) NOT NULL,
  `img_name` varchar(50) NOT NULL,
  `album_id` int(20) NOT NULL,
  `img_path` varchar(50) NOT NULL,
  `img_desc` varchar(500) NOT NULL,
  `img_alt` varchar(50) NOT NULL,
  PRIMARY KEY (`img_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `tbl_img_info`
--


-- --------------------------------------------------------

--
-- Table structure for table `tbl_scrapbook_info`
--

CREATE TABLE IF NOT EXISTS `tbl_scrapbook_info` (
  `message_id` int(11) NOT NULL AUTO_INCREMENT,
  `receiver_id` int(20) NOT NULL,
  `sender_id` int(20) NOT NULL,
  `receive_date_time` date NOT NULL,
  `msg` varchar(2000) NOT NULL,
  PRIMARY KEY (`message_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC AUTO_INCREMENT=1 ;

--
-- Dumping data for table `tbl_scrapbook_info`
--

