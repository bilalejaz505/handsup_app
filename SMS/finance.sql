-- phpMyAdmin SQL Dump
-- version 3.2.0.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 27, 2013 at 07:47 AM
-- Server version: 5.1.36
-- PHP Version: 5.3.0

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `finance`
--

-- --------------------------------------------------------

--
-- Table structure for table `challan`
--

CREATE TABLE IF NOT EXISTS `challan` (
  `ch_id` int(4) NOT NULL AUTO_INCREMENT,
  `std_name` varchar(50) NOT NULL,
  `f_name` varchar(50) NOT NULL,
  `class_sec` varchar(30) NOT NULL,
  `issue_date` date NOT NULL,
  `due_date` date NOT NULL,
  `tui_fee` int(30) NOT NULL,
  `adm_fee` int(30) NOT NULL,
  `reg_fee` int(30) NOT NULL,
  `misc` int(30) NOT NULL,
  `trip` int(30) NOT NULL,
  `lab` int(30) NOT NULL,
  `comp` int(30) NOT NULL,
  `arre` int(30) NOT NULL,
  `pay_bfor_date` int(11) NOT NULL,
  `fine` int(30) NOT NULL,
  `pay_aftr_date` int(11) NOT NULL,
  PRIMARY KEY (`ch_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=32 ;

--
-- Dumping data for table `challan`
--

INSERT INTO `challan` (`ch_id`, `std_name`, `f_name`, `class_sec`, `issue_date`, `due_date`, `tui_fee`, `adm_fee`, `reg_fee`, `misc`, `trip`, `lab`, `comp`, `arre`, `pay_bfor_date`, `fine`, `pay_aftr_date`) VALUES
(15, 'Kamran Ali', 'Ali Ahmad', '4th', '2013-02-07', '2013-02-10', 200, 2400, 400, 0, 0, 100, 100, 0, 3200, 150, 3350),
(16, 'Ali Imran', 'Abbas Ali', '10th', '2011-04-05', '2011-07-12', 1250, 2400, 400, 0, 0, 0, 0, 0, 1200, 150, 1450),
(13, 'Asad Abbas', 'Abbas Ali', '7th', '2011-04-05', '2011-10-05', 200, 600, 400, 0, 0, 0, 0, 0, 1200, 250, 2050),
(17, 'Ali', 'Abbas Ali', '10th', '2011-04-05', '2011-10-05', 12, 12, 12, 0, 0, 0, 0, 0, 1200, 150, 1450),
(18, 'asad', 'asad', '4th', '2011-04-05', '2011-07-12', 500, 12, 12, 0, 0, 0, 0, 0, 1200, 150, 1450),
(19, 'Kamran Ali', 'Kamran Ali', '8th', '2011-04-05', '2011-07-12', 12, 12, 12, 0, 0, 0, 0, 0, 48, 100, 148);

-- --------------------------------------------------------

--
-- Table structure for table `class`
--

CREATE TABLE IF NOT EXISTS `class` (
  `C_id` int(2) NOT NULL AUTO_INCREMENT,
  `Class` varchar(20) NOT NULL,
  PRIMARY KEY (`C_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=35 ;

--
-- Dumping data for table `class`
--

INSERT INTO `class` (`C_id`, `Class`) VALUES
(1, '1st'),
(2, '2nd'),
(7, '7th'),
(4, '4th'),
(5, '5th'),
(6, '6th'),
(8, '8th'),
(3, '3rd'),
(9, '9th'),
(10, '10th');

-- --------------------------------------------------------

--
-- Table structure for table `code_bill`
--

CREATE TABLE IF NOT EXISTS `code_bill` (
  `bill_id` int(1) NOT NULL AUTO_INCREMENT,
  `bill_code` varchar(50) NOT NULL,
  PRIMARY KEY (`bill_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `code_bill`
--

INSERT INTO `code_bill` (`bill_id`, `bill_code`) VALUES
(1, 'National Bank, Khanewal 01076548345 (0107)');

-- --------------------------------------------------------

--
-- Table structure for table `code_head`
--

CREATE TABLE IF NOT EXISTS `code_head` (
  `hd_id` int(1) NOT NULL AUTO_INCREMENT,
  `head_code` varchar(50) NOT NULL,
  PRIMARY KEY (`hd_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `code_head`
--

INSERT INTO `code_head` (`hd_id`, `head_code`) VALUES
(1, 'School Managment System');

-- --------------------------------------------------------

--
-- Table structure for table `code_staff`
--

CREATE TABLE IF NOT EXISTS `code_staff` (
  `stf_id` int(1) NOT NULL AUTO_INCREMENT,
  `staff_code` varchar(30) NOT NULL,
  PRIMARY KEY (`stf_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `code_staff`
--

INSERT INTO `code_staff` (`stf_id`, `staff_code`) VALUES
(1, 'ims_stf_');

-- --------------------------------------------------------

--
-- Table structure for table `code_stud`
--

CREATE TABLE IF NOT EXISTS `code_stud` (
  `std_id` int(1) NOT NULL AUTO_INCREMENT,
  `stud_code` varchar(30) NOT NULL,
  PRIMARY KEY (`std_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `code_stud`
--

INSERT INTO `code_stud` (`std_id`, `stud_code`) VALUES
(1, 'ims_std_');

-- --------------------------------------------------------

--
-- Table structure for table `expense`
--

CREATE TABLE IF NOT EXISTS `expense` (
  `exid` int(4) NOT NULL AUTO_INCREMENT,
  `date_exp` date NOT NULL,
  `exp_1` varchar(50) NOT NULL,
  `to_name` varchar(50) NOT NULL,
  `dr_exp` int(30) NOT NULL,
  PRIMARY KEY (`exid`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `expense`
--

INSERT INTO `expense` (`exid`, `date_exp`, `exp_1`, `to_name`, `dr_exp`) VALUES
(1, '2012-12-03', 'Electricity Bill', 'Wapda', 2450),
(4, '2013-02-14', 'Building Rent', 'Ali', 4500),
(3, '2012-07-23', 'Telephone bill', 'Ali', 1278),
(5, '2013-02-27', 'Salary of Admin', 'Staff', 20000),
(6, '2013-02-28', 'Salary of Admin', 'Staff', 15000),
(7, '2013-03-05', 'Salary of Admin', 'Staff', 15000),
(8, '2013-03-23', 'Salary of Admin', 'Ali', 500);

-- --------------------------------------------------------

--
-- Table structure for table `ex_part`
--

CREATE TABLE IF NOT EXISTS `ex_part` (
  `ex_id` int(2) NOT NULL AUTO_INCREMENT,
  `ex_part` varchar(100) NOT NULL,
  PRIMARY KEY (`ex_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `ex_part`
--

INSERT INTO `ex_part` (`ex_id`, `ex_part`) VALUES
(9, 'Telephone bill'),
(7, 'Salary of Admin'),
(8, 'Salary of Teaching Staff'),
(10, 'Electricity Bill'),
(11, 'Building Rent');

-- --------------------------------------------------------

--
-- Table structure for table `income`
--

CREATE TABLE IF NOT EXISTS `income` (
  `inid` int(4) NOT NULL AUTO_INCREMENT,
  `date_inc` date NOT NULL,
  `inc_1` varchar(50) NOT NULL,
  `from_name` varchar(50) NOT NULL,
  `cr_inc` int(20) NOT NULL,
  PRIMARY KEY (`inid`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `income`
--

INSERT INTO `income` (`inid`, `date_inc`, `inc_1`, `from_name`, `cr_inc`) VALUES
(2, '2012-12-15', 'Sales of Prospectus', 'Students', 16460),
(4, '2012-12-15', 'Admission Fee', 'Students', 25080),
(5, '2013-02-08', 'Sales of Prospectus', 'Students', 2500),
(6, '2013-02-28', 'Admission Fee', 'Students', 5000),
(7, '2013-03-05', 'Admission Fee', 'Students', 18000);

-- --------------------------------------------------------

--
-- Table structure for table `in_part`
--

CREATE TABLE IF NOT EXISTS `in_part` (
  `in_id` int(2) NOT NULL AUTO_INCREMENT,
  `in_part` varchar(100) NOT NULL,
  PRIMARY KEY (`in_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `in_part`
--

INSERT INTO `in_part` (`in_id`, `in_part`) VALUES
(3, 'Admission Fee'),
(4, 'Sales of Prospectus');

-- --------------------------------------------------------

--
-- Table structure for table `salary`
--

CREATE TABLE IF NOT EXISTS `salary` (
  `sal_id` int(4) NOT NULL AUTO_INCREMENT,
  `stf_name` varchar(50) NOT NULL,
  `stf_desig` varchar(30) NOT NULL,
  `mon_yr` varchar(30) NOT NULL,
  `cheq_no` int(30) NOT NULL,
  `sal_date` date NOT NULL,
  `sal_1` int(30) NOT NULL,
  `sal_2` int(30) NOT NULL,
  `sal_3` int(30) NOT NULL,
  `sal_4` int(30) NOT NULL,
  `sal_5` int(30) NOT NULL,
  `sal_6` int(30) NOT NULL,
  `sal_7` int(30) NOT NULL,
  `sal_8` int(30) NOT NULL,
  `sal_9` int(30) NOT NULL,
  `sal_10` int(30) NOT NULL,
  `total_add` int(30) NOT NULL,
  `total_ded` int(30) NOT NULL,
  `net_sal` int(30) NOT NULL,
  PRIMARY KEY (`sal_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `salary`
--

INSERT INTO `salary` (`sal_id`, `stf_name`, `stf_desig`, `mon_yr`, `cheq_no`, `sal_date`, `sal_1`, `sal_2`, `sal_3`, `sal_4`, `sal_5`, `sal_6`, `sal_7`, `sal_8`, `sal_9`, `sal_10`, `total_add`, `total_ded`, `net_sal`) VALUES
(1, 'Muhammad Ahmad Khan', 'Teacher', '02/13', 2039764654, '2013-03-05', 20000, 0, 0, 0, 3000, 0, 0, 0, 0, 0, 23000, 0, 23000),
(5, 'Ferzana Karim Noon', 'Teacher', '02/13', 2045664764, '2013-03-27', 20000, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 20000);

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE IF NOT EXISTS `staff` (
  `sf_id` int(3) NOT NULL AUTO_INCREMENT,
  `f_name` varchar(30) NOT NULL,
  `l_name` varchar(30) NOT NULL,
  `fath_name` varchar(30) NOT NULL,
  `dob` date NOT NULL,
  `gender` varchar(30) NOT NULL,
  `relig` varchar(30) NOT NULL,
  `cnic` bigint(30) NOT NULL,
  `desig` varchar(30) NOT NULL,
  `dept` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `adrs` varchar(30) NOT NULL,
  `mob` bigint(30) NOT NULL,
  `b_sal` int(30) NOT NULL,
  `remarks` varchar(20) NOT NULL,
  PRIMARY KEY (`sf_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`sf_id`, `f_name`, `l_name`, `fath_name`, `dob`, `gender`, `relig`, `cnic`, `desig`, `dept`, `email`, `adrs`, `mob`, `b_sal`, `remarks`) VALUES
(9, 'Ejaz ', 'Hussain', 'Wilayat Hussain', '0000-00-00', 'Male', 'Islam', 2656554356787, 'Lecturer', 'Science', 'mubeen.asghar.efl147@live.com', 'Block 17', 3005465765, 23000, 'Parmanent'),
(15, 'Abbas Ali', 'Alam', 'Alam Ali', '1987-03-19', '', 'Islam', 1234567890123, 'Lecturer', 'Science', 'asd@gmail.com', 'block no 5', 3244543456, 12000, 'Visiting Faculity'),
(10, 'Shazia', 'Alam', 'Alam Ali', '1988-06-05', 'Female', 'Islam', 7656554356787, 'Teacher', 'Science', 'sazia123@live.com', 'Multan', 3244543456, 23000, 'Parmanent'),
(7, 'Zia-ul-Haq', 'Qureshi', 'Abdul Ghafoor', '1996-06-22', 'Male', 'Islam', 32456435674, 'Lecturer', 'Science', 'ziaulhaq147@live.com', 'Multan', 3244543456, 25000, 'Contract Base'),
(12, 'Ferzana', 'Karim Noon', 'Karim Noon', '1996-06-22', 'Female', 'Islam', 1234567890123, 'Ustani', 'Arts', 'sazia123@live.com', 'Layya', 3445566767, 12000, 'Parmanent');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE IF NOT EXISTS `students` (
  `s_id` int(4) NOT NULL AUTO_INCREMENT,
  `sname` varchar(50) NOT NULL,
  `mname` varchar(50) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `nic_1` int(20) NOT NULL,
  `nic_2` int(20) NOT NULL,
  `nic_3` int(20) NOT NULL,
  `gender` varchar(50) NOT NULL,
  `relig` varchar(50) NOT NULL,
  `dob` date NOT NULL,
  `accu` varchar(50) NOT NULL,
  `tel_1` int(20) NOT NULL,
  `tel_2` int(20) NOT NULL,
  `mob_no_1` int(20) NOT NULL,
  `mob_no_2` int(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `hostel` varchar(50) NOT NULL,
  `adrs` varchar(50) NOT NULL,
  `image` varchar(50) NOT NULL,
  `adname` varchar(50) NOT NULL,
  `adno` int(50) NOT NULL,
  `pclass` varchar(50) NOT NULL,
  `phone_no_1` int(20) NOT NULL,
  `phone_no_2` int(20) NOT NULL,
  `Cdate` date NOT NULL,
  `ins_add` varchar(50) NOT NULL,
  `sname1` varchar(50) NOT NULL,
  `sname2` varchar(50) NOT NULL,
  `fname1` varchar(50) NOT NULL,
  `fname2` varchar(50) NOT NULL,
  `class1` varchar(50) NOT NULL,
  `class2` varchar(50) NOT NULL,
  `adno1` int(50) NOT NULL,
  `adno2` int(50) NOT NULL,
  `add_date` date NOT NULL,
  `class` varchar(50) NOT NULL,
  `section` varchar(50) NOT NULL,
  `session` year(4) NOT NULL,
  `fee_status` varchar(50) NOT NULL,
  `adm` varchar(50) NOT NULL,
  `remarks` int(20) NOT NULL,
  PRIMARY KEY (`s_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=137 ;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`s_id`, `sname`, `mname`, `fname`, `nic_1`, `nic_2`, `nic_3`, `gender`, `relig`, `dob`, `accu`, `tel_1`, `tel_2`, `mob_no_1`, `mob_no_2`, `email`, `hostel`, `adrs`, `image`, `adname`, `adno`, `pclass`, `phone_no_1`, `phone_no_2`, `Cdate`, `ins_add`, `sname1`, `sname2`, `fname1`, `fname2`, `class1`, `class2`, `adno1`, `adno2`, `add_date`, `class`, `section`, `session`, `fee_status`, `adm`, `remarks`) VALUES
(13, 'Asad', 'Amna', 'Abid', 2147483647, 0, 0, 'Male', 'islam', '1988-06-05', 'Govt. Servant', 648765432, 0, 321, 2365375, 'asd@gmail.com', 'No', 'block no 5', '67068_4279387555130_1591858517_n.jpg', 'GCT', 234, '5', 62, 0, '2011-03-12', 'khanewal', 'ali', '', 'abid', '', '', '', 345, 0, '2013-02-05', '5', 'B', 2012, 'Not-Paid', 'Not-Approved', 3),
(110, 'waqas', 'Shazia', 'Muhammad Ali Khan', 0, 0, 0, '', 'Islam', '1988-11-14', '', 0, 0, 0, 0, '', 'Yes', '', '', '', 0, '', 0, 0, '0000-00-00', '', '', '', '', '', '', '', 0, 0, '0000-00-00', '1', 'A', 2012, 'paid', 'Approved', 4),
(135, 'faizan', 'Maria', 'Afzal', 24252, 6465467, 5, 'Female', 'hgchj', '1988-11-14', 'fhgf', 65, 1234675, 334, 6576548, 'asd@gmail.com', 'Yes', 'block no 5', '', 'Govt. College Multan', 245, '6', 64, 5467547, '2005-04-11', 'khanewal', '', '', '', '', '', '', 0, 0, '2013-02-05', '4', 'B', 2013, 'Not-Paid', 'Not-Approved', 1);

-- --------------------------------------------------------

--
-- Table structure for table `stud_data`
--

CREATE TABLE IF NOT EXISTS `stud_data` (
  `a_id` int(4) NOT NULL AUTO_INCREMENT,
  `s_name` varchar(50) NOT NULL,
  `f_name` varchar(50) NOT NULL,
  `cnic` bigint(30) NOT NULL,
  `roll_no` int(30) NOT NULL,
  `gender` varchar(30) NOT NULL,
  `class` varchar(30) NOT NULL,
  `section` varchar(20) NOT NULL,
  `session` varchar(4) NOT NULL,
  PRIMARY KEY (`a_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `stud_data`
--

INSERT INTO `stud_data` (`a_id`, `s_name`, `f_name`, `cnic`, `roll_no`, `gender`, `class`, `section`, `session`) VALUES
(1, 'Hina Gill', 'Fawad Gill', 2344326546368, 4, 'Female', '3rd', 'B', '2012'),
(2, 'Ali Imran Gilani', 'Imran Ali', 3245665434578, 5, 'Male', '3rd', 'A', '2012'),
(3, 'Danish', 'Amjad', 3456345345673, 4, 'Male', '4th', 'C', '2011'),
(8, 'Ali Imran', 'Ali', 1234567890123, 5, 'Male', '5th', 'B', '2013');

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE IF NOT EXISTS `subjects` (
  `Sb_id` int(3) NOT NULL AUTO_INCREMENT,
  `C_id` int(3) NOT NULL,
  `subjects` varchar(50) NOT NULL,
  PRIMARY KEY (`Sb_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`Sb_id`, `C_id`, `subjects`) VALUES
(1, 9, 'English'),
(2, 9, 'Urdu'),
(3, 9, 'Mathematics'),
(4, 9, 'Economics'),
(5, 9, 'Principles of Commerce'),
(6, 9, 'Islamiyat'),
(7, 10, 'English'),
(8, 10, 'Urdu'),
(9, 10, 'Statistics'),
(10, 10, 'Geography'),
(11, 10, 'Pak Study'),
(12, 10, 'Banking/Computer'),
(14, 20, 'French');

-- --------------------------------------------------------

--
-- Table structure for table `testtable`
--

CREATE TABLE IF NOT EXISTS `testtable` (
  `testId` int(2) NOT NULL AUTO_INCREMENT,
  `a_id` int(11) NOT NULL,
  `month` varchar(50) NOT NULL,
  `science` varchar(50) NOT NULL,
  `eng` int(50) NOT NULL,
  `urdu` int(50) NOT NULL,
  `maths` int(50) NOT NULL,
  `pak` int(50) NOT NULL,
  `islam` int(50) NOT NULL,
  `phy` varchar(50) NOT NULL,
  `che` varchar(50) NOT NULL,
  `bio` varchar(50) NOT NULL,
  `comp` varchar(50) NOT NULL,
  `elec` varchar(50) NOT NULL,
  `obtained` int(50) NOT NULL,
  `total` int(50) NOT NULL,
  PRIMARY KEY (`testId`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `testtable`
--

INSERT INTO `testtable` (`testId`, `a_id`, `month`, `science`, `eng`, `urdu`, `maths`, `pak`, `islam`, `phy`, `che`, `bio`, `comp`, `elec`, `obtained`, `total`) VALUES
(2, 2, 'October', '45', 45, 46, 34, 36, 39, '46', '35', '40', '44', '', 410, 500),
(1, 1, 'August', '434', 386, 438, 485, 477, 484, '435', '355', '', '397', '345', 4236, 5000),
(4, 3, 'January', '44', 45, 46, 43, 37, 49, '44', '39', '', '48', '49', 444, 500),
(5, 3, 'March', '39', 35, 41, 42, 46, 35, '40', '33', '', '49', '48', 408, 500),
(3, 2, 'May', '45', 47, 47, 36, 39, 44, '40', '35', '37', '40', '', 410, 500),
(8, 0, 'January', '', 0, 0, 0, 0, 0, '', '', '', '', '', 0, 0),
(9, 0, 'December', '2', 2, 2, 2, 2, 2, '2', '2', '', '2', '2', 20, 2222),
(10, 8, 'January', '38', 54, 45, 67, 53, 43, '54', '34', '', '34', '43', 465, 400);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `u_id` int(2) NOT NULL AUTO_INCREMENT,
  `f_name` varchar(30) NOT NULL,
  `l_name` varchar(30) NOT NULL,
  `desig` varchar(30) NOT NULL,
  `user` varchar(30) NOT NULL,
  `pass` varchar(30) NOT NULL,
  PRIMARY KEY (`u_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`u_id`, `f_name`, `l_name`, `desig`, `user`, `pass`) VALUES
(1, 'Ali', 'Imran', 'Web Developer', 'ali', 'ali'),
(7, 'Asif ', 'Shehzad', 'Manager', 'asif', 'asif');
