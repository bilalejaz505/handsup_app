/*
Navicat MySQL Data Transfer

Source Server         : localhost_3306
Source Server Version : 50051
Source Host           : localhost:3306
Source Database       : sms_db

Target Server Type    : MYSQL
Target Server Version : 50051
File Encoding         : 65001

Date: 2015-05-24 17:36:01
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `challan`
-- ----------------------------
DROP TABLE IF EXISTS `challan`;
CREATE TABLE `challan` (
  `ch_id` int(10) NOT NULL auto_increment,
  `std_name` varchar(50) NOT NULL,
  `f_name` varchar(50) NOT NULL,
  `class_sec` varchar(30) NOT NULL,
  `issue_date` varchar(20) NOT NULL,
  `due_date` varchar(20) NOT NULL,
  `tui_fee` int(30) NOT NULL,
  `adm_fee` int(30) NOT NULL,
  `reg_fee` int(30) NOT NULL,
  `misc` int(30) NOT NULL,
  `trip` int(30) NOT NULL,
  `lab` int(30) NOT NULL,
  `comp` int(30) NOT NULL,
  `arre` int(30) NOT NULL,
  `fine` int(30) NOT NULL,
  `pay_aftr_date` int(30) NOT NULL,
  PRIMARY KEY  (`ch_id`)
) ENGINE=MyISAM AUTO_INCREMENT=55 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of challan
-- ----------------------------
INSERT INTO `challan` VALUES ('51', 'imran', 'Mushtaq      ', '6th', '2013-09-21', '2013-09-28', '1000', '2000', '1000', '500', '4000', '4000', '500', '100', '200', '0');
INSERT INTO `challan` VALUES ('54', 'Hamad', 'Irfan', '6th', '2013-10-02', '2013-10-09', '10', '10', '10', '10', '10', '10', '10', '10', '10', '0');
INSERT INTO `challan` VALUES ('49', 'Basat ', 'Muhammad', '5th', '2013-09-27', '2013-09-30', '1000', '2000', '4000', '500', '1000', '3000', '1000', '200', '100', '0');
INSERT INTO `challan` VALUES ('48', 'Akram', 'Mansoor Ahmad ', '2nd', '2013-09-19', '2013-09-26', '1200', '1500', '500', '500', '100', '200', '500', '100', '100', '0');
INSERT INTO `challan` VALUES ('47', 'Basat ', 'Syed Abid ', '1st', '2013-09-20', '2013-09-26', '2500', '3000', '1500', '500', '100', '1200', '1500', '50', '0', '0');
INSERT INTO `challan` VALUES ('53', 'IDREES', 'CH NOOR ', '10th', '2013-10-04', '2013-10-08', '1000', '2000', '3000', '300', '300', '2000', '4000', '1000', '1000', '0');

-- ----------------------------
-- Table structure for `class`
-- ----------------------------
DROP TABLE IF EXISTS `class`;
CREATE TABLE `class` (
  `C_id` int(10) NOT NULL auto_increment,
  `Class` varchar(20) NOT NULL,
  PRIMARY KEY  (`C_id`)
) ENGINE=MyISAM AUTO_INCREMENT=35 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of class
-- ----------------------------
INSERT INTO `class` VALUES ('1', '1st');
INSERT INTO `class` VALUES ('2', '2nd');
INSERT INTO `class` VALUES ('3', '3rd');
INSERT INTO `class` VALUES ('4', '4th');
INSERT INTO `class` VALUES ('5', '5th');
INSERT INTO `class` VALUES ('6', '6th');
INSERT INTO `class` VALUES ('7', '7th');
INSERT INTO `class` VALUES ('8', '8th');
INSERT INTO `class` VALUES ('9', '9th');
INSERT INTO `class` VALUES ('10', '10th');
INSERT INTO `class` VALUES ('11', '1st year');
INSERT INTO `class` VALUES ('12', '2nd year');

-- ----------------------------
-- Table structure for `class_res`
-- ----------------------------
DROP TABLE IF EXISTS `class_res`;
CREATE TABLE `class_res` (
  `C_id` int(10) NOT NULL auto_increment,
  `Class` varchar(20) NOT NULL,
  PRIMARY KEY  (`C_id`)
) ENGINE=MyISAM AUTO_INCREMENT=54 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of class_res
-- ----------------------------
INSERT INTO `class_res` VALUES ('1', '1st A');
INSERT INTO `class_res` VALUES ('2', '1st B');
INSERT INTO `class_res` VALUES ('3', '1st C');
INSERT INTO `class_res` VALUES ('4', '2nd A');
INSERT INTO `class_res` VALUES ('5', '2nd B');
INSERT INTO `class_res` VALUES ('6', '2nd C');
INSERT INTO `class_res` VALUES ('7', '3rd A');
INSERT INTO `class_res` VALUES ('8', '3rd B');
INSERT INTO `class_res` VALUES ('9', '3rd C');
INSERT INTO `class_res` VALUES ('10', '4th A');
INSERT INTO `class_res` VALUES ('11', '4th B');
INSERT INTO `class_res` VALUES ('12', '4th C');
INSERT INTO `class_res` VALUES ('36', '5th A');
INSERT INTO `class_res` VALUES ('37', '5th B');
INSERT INTO `class_res` VALUES ('38', '5th C');
INSERT INTO `class_res` VALUES ('39', '6th A');
INSERT INTO `class_res` VALUES ('40', '6th B');
INSERT INTO `class_res` VALUES ('41', '6th C');
INSERT INTO `class_res` VALUES ('42', '7th A');
INSERT INTO `class_res` VALUES ('43', '7th B');
INSERT INTO `class_res` VALUES ('44', '7th C');
INSERT INTO `class_res` VALUES ('45', '8th A');
INSERT INTO `class_res` VALUES ('46', '8th B');
INSERT INTO `class_res` VALUES ('47', '8th C');
INSERT INTO `class_res` VALUES ('48', '9th A');
INSERT INTO `class_res` VALUES ('49', '9th B');
INSERT INTO `class_res` VALUES ('50', '9th C');
INSERT INTO `class_res` VALUES ('51', '10th A');
INSERT INTO `class_res` VALUES ('52', '10th B');
INSERT INTO `class_res` VALUES ('53', '10th C');

-- ----------------------------
-- Table structure for `code_bill`
-- ----------------------------
DROP TABLE IF EXISTS `code_bill`;
CREATE TABLE `code_bill` (
  `bill_id` int(1) NOT NULL auto_increment,
  `bill_code` varchar(50) NOT NULL,
  PRIMARY KEY  (`bill_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of code_bill
-- ----------------------------
INSERT INTO `code_bill` VALUES ('1', 'National Bank, Multan.');

-- ----------------------------
-- Table structure for `code_head`
-- ----------------------------
DROP TABLE IF EXISTS `code_head`;
CREATE TABLE `code_head` (
  `hd_id` int(10) NOT NULL auto_increment,
  `head_code` varchar(100) NOT NULL,
  PRIMARY KEY  (`hd_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of code_head
-- ----------------------------
INSERT INTO `code_head` VALUES ('1', 'Govt.Nusrat ul Islam Higher Secondary School Multan Cantt.');

-- ----------------------------
-- Table structure for `salary`
-- ----------------------------
DROP TABLE IF EXISTS `salary`;
CREATE TABLE `salary` (
  `sal_id` int(10) NOT NULL auto_increment,
  `stf_name` varchar(50) NOT NULL,
  `stf_desig` varchar(30) NOT NULL,
  `mon_yr` varchar(30) NOT NULL,
  `cheq_no` varchar(30) NOT NULL,
  `sal_date` varchar(30) NOT NULL,
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
  PRIMARY KEY  (`sal_id`)
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of salary
-- ----------------------------
INSERT INTO `salary` VALUES ('19', 'Mushtaq Ahmad', 'SST(Art)', '2013-10-01', '30333676', '2013-10-04', '34000', '2566', '5000', '0', '4432', '1435', '2810', '731869', '22485', '1020', '0', '0', '0');
INSERT INTO `salary` VALUES ('20', 'Muhammad Saeed', 'EST', '2013-10-01', '30333249', '2013-10-03', '15400', '0', '1840', '0', '1588', '1056', '1000', '0', '10277', '0', '0', '0', '0');

-- ----------------------------
-- Table structure for `staff`
-- ----------------------------
DROP TABLE IF EXISTS `staff`;
CREATE TABLE `staff` (
  `sf_id` int(50) NOT NULL auto_increment,
  `f_name` varchar(30) NOT NULL,
  `l_name` varchar(30) NOT NULL,
  `fath_name` varchar(30) NOT NULL,
  `dob` varchar(20) NOT NULL,
  `gender` varchar(30) NOT NULL,
  `relig` varchar(30) NOT NULL,
  `cnic` varchar(50) NOT NULL,
  `desig` varchar(30) NOT NULL,
  `dept` varchar(30) NOT NULL,
  `email` varchar(40) NOT NULL,
  `adrs` varchar(300) NOT NULL,
  `mob` varchar(30) NOT NULL,
  `bps` int(10) NOT NULL,
  `remarks` varchar(20) NOT NULL,
  `Qul_acd` varchar(20) default NULL,
  `Qul_prof` varchar(20) default NULL,
  `Domi` varchar(100) default NULL,
  `joining_date` varchar(100) default NULL,
  `date_award` varchar(100) default NULL,
  `date_pp` varchar(100) default NULL,
  PRIMARY KEY  (`sf_id`)
) ENGINE=MyISAM AUTO_INCREMENT=50 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of staff
-- ----------------------------
INSERT INTO `staff` VALUES ('30', 'Muhammad', 'Idrees', 'Ch Noor Muhammad', '17-12-1969', '', 'Islam', '36302-5591320-3', 'EST(Eng)', 'Education', 'idrees_tooba786@yaho.coom', 'Al-Noor 2147/b New Shalimar Colony Bosan Road Multam.', '03009639034', '14', 'Permanent', 'M.Sc IT', 'BEd,MEd', 'Multan', '02-09-1995', '02-09-1995', '02-09-1995');
INSERT INTO `staff` VALUES ('37', 'Mansoor Ahmad ', ' Khan', 'Ahmad Nawaz khan', '06-09-1962', 'Male', 'Islam', '36302-4951284-1', 'Principal', 'Education', 'nil', 'House No.1,Khan street,Nasheman Colony Multan', '03009639081 ,03336113600', '19', 'Permanent', 'M.A-II', 'M.Ed', 'Multan', '01-04-1998', '10-06-2008', '10-06-2008');
INSERT INTO `staff` VALUES ('38', 'Mushtaq      ', 'Ahmad      ', 'Rustam Ali', '10-02-1956', 'Male', 'Islam', '36302-0306573-9', 'SST', 'Education', 'Nill', 'Qasim bella Multan.', '03216340267', '17', 'Permanent', 'M.A(Pol.Sc)-III', 'B.Ed', 'Multan', '01-09-1981	', '01-11-1987	', '01-04-1997');
INSERT INTO `staff` VALUES ('39', 'Zahid ', 'Hussain      ', 'Shaukat Ali	', '17-03-1968	', 'Male', 'Islam', '36303-0973170-7', 'SST.Sc	', 'Education', 'Nill', 'Qasim bella Multan', ' 0614518971,03217326462', '17', 'Permanent', 'M.A(Eco)-II	', 'B.Ed', 'Multan', '30-10-1990	', '30-10-1990	', '29-01-2000	');
INSERT INTO `staff` VALUES ('40', 'Nadeem ', 'Anjum   ', 'Sh. Habib Ahmad	', '11-05-1966', 'Male', 'Islam', '36302-9668398-7', 'SST.Sc	', 'Education', 'Nill', 'Saddar bazar Multan Cantt. ', ' 0614785388,03009635463', '0', 'Permanent', 'B.Sc', 'B.Ed', 'Multan', '16-05-1993', '27-03-2009', '01-06-1999');
INSERT INTO `staff` VALUES ('48', 'Muhammad', 'Saeed', 'Muhammad Yousf', '1959-03-01', 'Male', 'Islam', '36303-0277874-1', 'jc', 'Education', 'Nill', '12B,Alfalah Colony,Basti Braran Multan.', '.4780861,03216345608', '7', 'Permanent', 'F.A	', 'F.A', '', '01-03-1959', '08-07-1985', '12-02-1990	27-11-2000	');
INSERT INTO `staff` VALUES ('41', 'Syed Abid ', 'Hussain ', 'Syed Khushi Muhammad	', '12-10-1965', 'Male', 'Islam', '36302-0475775-7', 'SST	', 'Education', 'syedabidhussainbukhari@ymail.com', 'T.Block New Multan.', ' 0614552514,03006363650', '16', 'Permanent', 'B.A	', 'M.Ed', 'Multan', '07-03-1988', '08-11-2002', '08-11-2002	');
INSERT INTO `staff` VALUES ('42', 'Riaz Ahmad', 'Shahid ', 'Muhammad Pehlwan', '12-09-1965', 'Male', 'Islam', '36304-1363066-7', 'SST	', 'Education', 'Nill', 'Basti Manzoor Abad Lodhran Road Shujahabad.', '03017535008', '16', 'Permanent', 'M.A(Isl)-II', 'M.Ed', ' Shujahabad', '13-09-84', '27-05-2005', '27-05-2005');
INSERT INTO `staff` VALUES ('43', 'Abdul ', 'Rashid ', 'Ch. Noor Muhammad	', '16-12-1957', 'Male', 'Islam', '36302-0331639-5', 'EST', 'Education', 'Nill', 'Old Shujabad road Multan.', ' 4580199', '14', 'Permanent', 'F.A	', 'C.T	', 'Multan', '22-12-1982', '01-06-1988', '30-12-1998');
INSERT INTO `staff` VALUES ('44', 'Muthar', 'Khan', 'Chauhar Khan	', '18-05-1957', 'Male', 'Islam', '36302-0286803-7	', 'EST	', 'Education', 'Nill', 'Mumtazabad Colony Multan.', ' 231205,03007359323', '14', 'Permanent', 'Matric	', 'Diploma', 'Multan', '12-12-1978', '22-11-1986', '12-12-1978');

-- ----------------------------
-- Table structure for `students`
-- ----------------------------
DROP TABLE IF EXISTS `students`;
CREATE TABLE `students` (
  `s_id` int(4) NOT NULL auto_increment,
  `sname` varchar(50) NOT NULL,
  `mname` varchar(50) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `nic_1` int(20) NOT NULL,
  `nic_2` int(20) NOT NULL,
  `nic_3` int(20) NOT NULL,
  `gender` varchar(50) NOT NULL,
  `relig` varchar(50) NOT NULL,
  `dob` varchar(20) NOT NULL,
  `accu` varchar(50) NOT NULL,
  `tel_1` varchar(20) NOT NULL,
  `tel_2` varchar(20) NOT NULL,
  `mob_no_1` varchar(20) NOT NULL,
  `mob_no_2` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `hostel` varchar(50) NOT NULL,
  `adrs` varchar(100) NOT NULL,
  `image` varchar(50) NOT NULL,
  `adname` varchar(50) NOT NULL,
  `adno` varchar(50) NOT NULL,
  `pclass` varchar(50) NOT NULL,
  `phone_no_1` varchar(20) NOT NULL,
  `phone_no_2` varchar(20) NOT NULL,
  `Cdate` varchar(20) NOT NULL,
  `ins_add` varchar(50) NOT NULL,
  `sname1` varchar(50) NOT NULL,
  `sname2` varchar(50) NOT NULL,
  `fname1` varchar(50) NOT NULL,
  `fname2` varchar(50) NOT NULL,
  `class1` varchar(50) NOT NULL,
  `class2` varchar(50) NOT NULL,
  `adno1` varchar(50) NOT NULL,
  `adno2` varchar(50) NOT NULL,
  `add_date` varchar(20) NOT NULL,
  `class` varchar(50) NOT NULL,
  `section` varchar(50) NOT NULL,
  `session` varchar(20) NOT NULL,
  `fee_status` varchar(50) NOT NULL,
  `adm` varchar(50) NOT NULL,
  `reg` varchar(20) NOT NULL,
  PRIMARY KEY  (`s_id`)
) ENGINE=MyISAM AUTO_INCREMENT=208 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of students
-- ----------------------------
INSERT INTO `students` VALUES ('194', 'Tooba ', 'Farhana', 'Fateh Baba', '26302', '5678675', '8', 'Male', 'Islam', '1998-05-13', 'Business', '062', '6750240', '0306', '2222222', 'idrees_tooba786@yahoo.com', 'Yes', 'Mumtazabad Colony Multan.', '15112012188.jpg', 'KW school', '8901', '1st', '065', '9200088', 'Aug 24, 1995', 'Bosan Road Multan', 'Hamad', 'Laal Zada', 'Saeed ', 'akram', '9th', '9th', '1234', '1111', '2013-09-09', '1st', 'A', '2012-14', 'paid', 'Approved', '2838');
INSERT INTO `students` VALUES ('195', 'Zahid', 'Hnifan', 'Fateh Baba', '26302', '5678675', '9', 'Male', 'Islam', '2007-02-15', 'Teaching', '062', '1234567', '0300', '6507296', 'idrees_tooba786@yahoo.com', 'Yes', 'Mumtazabad Colony Multan.', '', 'abc model school', '999', '5th', '065', '1234567', 'Sep 10, 2013', 'NFC Multan', 'Arif', 'jazib', 'Saeed ', 'HANAN', '1st', '1st', '1111', '1122', '2013-09-11', '9th', 'Iqbql', '2011-13', 'paid', 'Approved', '12784');
INSERT INTO `students` VALUES ('193', 'Asif', 'Ameran BiBi', 'Akram Khan', '12345', '2314458', '7', 'Male', 'Islam', '1997-07-21', 'worker', '062', '1234567', '0306', '6507296', 'Nill', 'Yes', 'Al-Noor 2147/b New Shalimar Co', '', 'Govt College Multan', '33333', '7th', '065', '4444556', 'Sep 11, 2013', 'Bosan Road Multan', 'Zeshan', 'mehboob', 'kamran', 'jamal', '7th', '7th', '7891', '7892', '2013-09-07', '2nd year', 'Iqbql', '2011-13', 'paid', 'Approved', '7890');
INSERT INTO `students` VALUES ('190', 'Shaukat', 'Samar', 'Sha Leel', '36302', '1234567', '0', 'Male', 'Islam', '2008-03-03', 'worker', '062', '1234567', '0321', '9634567', 'call_62001@yahoo.com', 'Yes', 'Al-Noor 2147/b New Shalimar Co', '', 'KW school', '12345', '7th', '065', '9200088', 'Sep 04, 2013', 'multan college multam.', 'Amjad', 'Bahder', 'Dost Mohammad', 'Dr Ali', '4th', '4th', '4567', '4568', '2013-09-04', '8th', 'Allama', '2009', 'paid', 'Approved', '45689');
INSERT INTO `students` VALUES ('191', 'Ch Qader', 'Qamul', 'Ch Qamur', '26302', '2222222', '9', 'Male', 'Islam', '1994-07-19', 'worker', '222', '2222222', '0345', '6300025', 'call_62001@yahoo.com', 'Yes', 'Al-Noor 2147/b New Shalimar Co', 'IMG10336.jpg', 'Govt College Multan', '223344', '5th', '233', '1234567', 'Aug 07, 2013', 'NFC Multan', 'Waseem', 'Asad', 'Asad', 'Waseem', '5th', '5th', '5678', '5679', '2013-09-05', '10th', '5a', '2013-14', 'paid', 'Approved', '5678');
INSERT INTO `students` VALUES ('192', 'Danial ', 'Dadi', 'Gohar', '26302', '5591320', '6', 'Male', 'Non Muslim', '2006-06-06', 'Driver', '061', '4256789', '0313', '6576895', 'Dal.com', 'Yes', 'Mumtazabad Colony Multan.', 'IMG10343.jpg', 'Govt College Multan', '6789', '6th', '065', '9090909', 'Sep 18, 2013', 'new multan, multan', 'Deldar', 'kamal', 'BUX khan', 'Saeed', '6th', '6th', '6789', '6780', '2013-09-06', '1st', 'Iqbql', '2013-14', 'paid', 'Approved', '2837');
INSERT INTO `students` VALUES ('189', 'Ch Nawaz', 'asdf', 'M Ali', '36302', '9087631', '2', 'Male', 'Islam', '2007-02-01', 'Teaching', '061', '2244159', '0333', '8764539', 'call_62001@yahoo.com', 'Yes', 'T.Block New Multan.', '15112012188.jpg', 'Aslam', '1234', '3rd', '065', '8956432', 'Sep 01, 2013', 'new multan, multan', 'Talib', 'Taher', 'Tabusum', 'Tabish', '2nd', '2nd', '23456', '23457', '2013-09-02', '7th', 'Jenah', '2009-14', 'paid', 'Approved', '23458');
INSERT INTO `students` VALUES ('188', 'Babar', 'Babara', 'Badsha', '36302', '2314259', '0', 'Male', 'Islam', '2007-02-01', 'Mazdori', '061', '6546789', '0300', '9633438', 'Nill', 'Yes', 'Basti Manzoor Abad Lodhran Road Shujahabad.', 'IMG10337.jpg', 'Model School Multan', '999', '1st', '065', '786809', 'Sep 03, 2013', 'multan college multam.', 'Deldar', 'Danial', 'Dost Mohammad', 'Belal', '3rd', '3rd', '2345', '2346', '2013-09-16', '2nd year', 'Quid Azam', '2011-13', 'paid', 'Approved', '3425');
INSERT INTO `students` VALUES ('187', 'Babar', 'Babra', 'Basheer', '36302', '2323234', '2', 'Male', 'Islam', '2007-02-02', 'Driver', '061', '2244390', '0345', '6784532', 'call_62001@yahoo.com', 'Yes', 'Al-Noor 2147/b New Shalimar Co', 'IMG10347.jpg', 'NFC School', '678', '7th', '061', '9200776', 'Sep 04, 2013', 'NFC Multan', 'Banheel', 'Bahder', 'BUX khan', 'AD Kahan', '2nd', '2nd', '234', '235', '2013-09-02', '8th', 'Gazali', '2000-01', 'paid', 'Approved', '2345');
INSERT INTO `students` VALUES ('186', 'Amjad', 'Ameran BiBi', 'Akram Khan', '36302', '1234567', '1', 'Male', 'Islam', '2006-01-06', 'Business', '061', '1234567', '0333', '9633333', 'Nill', 'Yes', 'T.Block New Multan.', '', 'Model School Multan', '123', '8th', '061', '9090909', 'Sep 15, 2013', 'Bosan Road Multan', 'Ajmal', 'Akmal', 'Akram', 'Akbar', '1st', '1st', '12', '123', '2013-09-16', '9th', 'Jenah', '2012-13', 'paid', 'Approved', '9090');
INSERT INTO `students` VALUES ('196', 'Arbaz', 'xyz', 'Abdul Salam', '36302', '7865432', '9', 'Male', 'Islam', '1996-02-02', 'Worker', '061', '5849548', '0306', '6507296', 'Nill', 'No', 'Street no 6 Cha Jamu Wala', '249576_485921784762938_913008534_n.jpg', 'Govt.Bukhari School', '1234', '10th', '061', '9200076', 'Apr 06, 2011', 'Multan', 'sajid', 'waseem', 'Aashiq', 'Akram', '1st year', '1st year', '123', '124', '2011-06-10', '1st year', 'ICS', '2013-14', 'paid', 'Approved', '22');
INSERT INTO `students` VALUES ('197', 'Muzamil', 'azs', 'Mehmod Hassan', '36302', '2875258', '2', 'Male', 'Islam', '1995-07-05', 'PR Worker', '061', '9861691', '0301', '7788813', 'Nill', 'No', 'House # 366 St # 2 Gujar Khada Multan', '', 'Alamdar School Multan', '1234', '10th', '061', '9090909', 'Apr 07, 2011', 'Multan', 'Arbaz', 'Khalid', 'Abdul Salam', 'M Yasin', '1st year', '1st year', '1234', '3456', '2011-05-12', '1st year', 'ICS', '2013-14', 'paid', 'Approved', '24');
INSERT INTO `students` VALUES ('198', 'Khalid', 'xyz', 'M Yasin', '36302', '2327499', '9', 'Male', 'Islam', '1996-05-02', 'Post Master', '065', '7858628', '0306', '7433623', 'Nill', 'Yes', 'Ward no 8 Besti Khudad Multan', '', 'Govt.Nusrat Islam Mulatan', '345', '10th', '061', '9200880', 'Apr 08, 2011', 'Multan Cantt', 'Muzamil', 'Asad', 'Mehhmood Haassan', 'Mehboob', '1st year', '1st year', '678899', '4567', '2011-05-12', '1st year', 'ICS', '2013-14', 'paid', 'Approved', '25');
INSERT INTO `students` VALUES ('199', 'Danish', 'xyz', 'Muhammad Rafiq', '36302', '5678675', '9', 'Male', 'Islam', '1997-03-15', 'Army Offficer', '061', '5465794', '0300', '5080171', 'Nill', 'Yes', 'House # 111/112  Old Sujha Bad Road Multan', '', 'FG Boys School no2 Multan', '0099', '10th', '061', '9090909', 'Mar 07, 2013', 'Multan', 'Hamza', 'Sami', 'M Ilyas', 'M Yasin', '1st year', '1st year', '13', '12', '2013-06-05', '1st year', 'ICS', '2013-14', 'paid', 'Approved', '50');
INSERT INTO `students` VALUES ('200', 'Ameer Hamza', 'abc', 'Muhammad Ilyas', '36302', '2222222', '2', 'Male', 'Islam', '1997-10-29', 'Worker', '042', '4567689', '0301', '7524076', 'Nill', 'No', 'House #1045 Jenah street Sader Bazar Multanee', '', 'Govt.Nusrat Islam Mulatan', '456', '10th', '061', '9200088', 'May 09, 2013', 'Multan Cantt', 'Hamza', 'Arbaz', 'M Yasin', 'Belal', '7th', '7th', '344', '444', '2013-09-18', '1st', 'ICS', '2013-14', 'paid', 'Approved', '09');
INSERT INTO `students` VALUES ('201', 'Sami ur Rahman', 'abc', 'M Yasin', '36302', '5678675', '4', 'Male', 'Islam', '1994-07-15', 'Electretion', '062', '1234567', '0300', '6969030', 'Nill', 'No', 'House # 296 First Home School Indestury Stat Multan', '', 'Govt.CTM High School Multan', '334', '10th', '061', '9200088', 'Apr 10, 2013', 'Multan', 'Amjad', 'kamal', 'Saeed ', 'Belal', '3rd', '6th', '2243', '345', '2013-09-04', '1st year', 'ICS', '2013-14', 'paid', 'Approved', '11');
INSERT INTO `students` VALUES ('207', 'Asad', 'XyZ', 'Ch Saeed', '36302', '5678675', '4', 'Male', 'Islam', '1996-12-02', 'Business', '061', '2224435', '0300', '6300025', 'Nill', 'No', 'Al-Noor 2147/b New Shalimar Colony Bosan Road Multam.', 'IMG10076.jpg', 'Zameer Public School', '12345', '7th', '065', '4444556', 'Sep 11, 2013', 'Multan', 'Amjad', 'kamal', 'Saeed ', 'Akbar', '3rd', '6th', '1111', '1122', '2013-10-02', '10th', 'A', '2013-14', 'paid', 'Approved', '523137');

-- ----------------------------
-- Table structure for `stud_attendance`
-- ----------------------------
DROP TABLE IF EXISTS `stud_attendance`;
CREATE TABLE `stud_attendance` (
  `Sr_No` int(10) NOT NULL auto_increment,
  `Class_Name` varchar(50) NOT NULL,
  `Section` varchar(50) NOT NULL,
  `Enrollment` varchar(50) NOT NULL,
  `Absent` varchar(50) NOT NULL,
  `Leave1` varchar(50) NOT NULL,
  `Sick_Leave` varchar(50) NOT NULL,
  `Present` varchar(50) NOT NULL,
  `Total1` varchar(50) NOT NULL,
  `Date` varchar(100) NOT NULL,
  `Day` varbinary(50) NOT NULL,
  PRIMARY KEY  (`Sr_No`)
) ENGINE=InnoDB AUTO_INCREMENT=76 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of stud_attendance
-- ----------------------------
INSERT INTO `stud_attendance` VALUES ('14', '10th', 'A', '52', '3', '', '', '', '', '2013-09-23', 0x4D6F6E646179);
INSERT INTO `stud_attendance` VALUES ('15', '10th', 'B', '50', '6', '4', '', '', '', '2013-09-23', 0x4D6F6E646179);
INSERT INTO `stud_attendance` VALUES ('16', '10th', 'C', '40', '10', '2', '1', '', '', '2013-09-23', 0x4D6F6E646179);
INSERT INTO `stud_attendance` VALUES ('17', '9th', 'A', '53', '', '', '', '', '', '2013-09-23', 0x4D6F6E646179);
INSERT INTO `stud_attendance` VALUES ('18', '9th', 'B', '72', '4', '2', '', '', '', '2013-09-23', 0x4D6F6E646179);
INSERT INTO `stud_attendance` VALUES ('19', '9th', 'C', '75', '5', '', '', '', '', '2013-09-23', 0x4D6F6E646179);
INSERT INTO `stud_attendance` VALUES ('21', '8th', 'A', '52', '', '', '', '', '', '2013-09-23', 0x4D6F6E646179);
INSERT INTO `stud_attendance` VALUES ('22', '8th', 'B', '61', '9', '2', '', '', '', '2013-09-23', 0x4D6F6E646179);
INSERT INTO `stud_attendance` VALUES ('23', '8th', 'C', '68', '10', '', '', '', '', '2013-09-23', 0x4D6F6E646179);
INSERT INTO `stud_attendance` VALUES ('24', '7th', 'A', '60', '5', '', '', '', '', '2013-09-23', 0x4D6F6E646179);
INSERT INTO `stud_attendance` VALUES ('25', '7th', 'B', '58', '10', '', '1', '', '', '2013-09-23', 0x4D6F6E646179);
INSERT INTO `stud_attendance` VALUES ('26', '7th', 'C', '63', '12', '1', '', '', '', '2013-09-23', 0x4D6F6E646179);
INSERT INTO `stud_attendance` VALUES ('27', '6th', 'A', '66', '3', '', '', '', '', '2013-09-23', 0x4D6F6E646179);
INSERT INTO `stud_attendance` VALUES ('28', '6th', 'B', '71', '7', '2', '', '', '', '2013-09-23', 0x4D6F6E646179);
INSERT INTO `stud_attendance` VALUES ('29', '6th', 'C', '65', '10', '', '', '', '', '2013-09-23', 0x4D6F6E646179);
INSERT INTO `stud_attendance` VALUES ('30', '10th', 'A', '52', '3', '', '', '', '', '2013-09-24', 0x54756573646179);
INSERT INTO `stud_attendance` VALUES ('31', '10th', 'B', '50', '1', '3', '', '', '', '2013-09-24', 0x54756573646179);
INSERT INTO `stud_attendance` VALUES ('32', '10th', 'C', '40', '6', '3', '1', '', '', '2013-09-24', 0x54756573646179);
INSERT INTO `stud_attendance` VALUES ('33', '9th', 'A', '53', '', '', '', '', '', '2013-09-24', 0x54756573646179);
INSERT INTO `stud_attendance` VALUES ('34', '9th', 'B', '72', '10', '2', '', '', '', '2013-09-24', 0x54756573646179);
INSERT INTO `stud_attendance` VALUES ('35', '9th', 'C', '75', '12', '', '', '', '', '2013-09-24', 0x54756573646179);
INSERT INTO `stud_attendance` VALUES ('36', '8th', 'A', '52', '', '', '', '', '', '2013-09-24', 0x54756573646179);
INSERT INTO `stud_attendance` VALUES ('37', '8th', 'B', '61', '21', '', '', '', '', '2013-09-24', 0x54756573646179);
INSERT INTO `stud_attendance` VALUES ('38', '8th', 'C', '68', '7', '', '', '', '', '2013-09-24', 0x54756573646179);
INSERT INTO `stud_attendance` VALUES ('39', '7th', 'A', '60', '3', '2', '', '', '', '2013-09-24', 0x54756573646179);
INSERT INTO `stud_attendance` VALUES ('40', '7th', 'B', '58', '', '2', '', '', '', '2013-09-24', 0x54756573646179);
INSERT INTO `stud_attendance` VALUES ('41', '7th', 'C', '63', '', '', '2', '', '', '2013-09-24', 0x54756573646179);
INSERT INTO `stud_attendance` VALUES ('42', '6th', 'A', '66', '4', '2', '', '', '', '2013-09-24', 0x54756573646179);
INSERT INTO `stud_attendance` VALUES ('43', '6th', 'B', '72', '4', '2', '1', '', '', '2013-09-24', 0x54756573646179);
INSERT INTO `stud_attendance` VALUES ('44', '6th', 'C', '65', '10', '', '', '', '', '2013-09-24', 0x54756573646179);
INSERT INTO `stud_attendance` VALUES ('45', '10th', 'A', '52', '2', '1', '', '', '', '2013-09-25', 0x5765646E6573646179);
INSERT INTO `stud_attendance` VALUES ('46', '10th', 'B', '50', '1', '2', '', '', '', '2013-09-25', 0x5765646E6573646179);
INSERT INTO `stud_attendance` VALUES ('47', '10th', 'C', '40', '5', '2', '1', '', '', '2013-09-25', 0x5765646E6573646179);
INSERT INTO `stud_attendance` VALUES ('48', '9th', 'A', '53', '', '', '', '', '', '2013-09-25', 0x5765646E6573646179);
INSERT INTO `stud_attendance` VALUES ('49', '9th', 'B', '72', '8', '2', '', '', '', '2013-09-25', 0x5765646E6573646179);
INSERT INTO `stud_attendance` VALUES ('50', '8th', 'A', '52', '', '', '', '', '', '2013-09-25', 0x5765646E6573646179);
INSERT INTO `stud_attendance` VALUES ('51', '8th', 'B', '61', '7', '2', '', '', '', '2013-09-25', 0x5765646E6573646179);
INSERT INTO `stud_attendance` VALUES ('52', '8th', 'C', '68', '4', '', '2', '', '', '2013-09-25', 0x5765646E6573646179);
INSERT INTO `stud_attendance` VALUES ('53', '7th', 'A', '60', '6', '', '', '', '', '2013-09-25', 0x5765646E6573646179);
INSERT INTO `stud_attendance` VALUES ('54', '7th', 'B', '58', '11', '', '', '', '', '2013-09-25', 0x5765646E6573646179);
INSERT INTO `stud_attendance` VALUES ('55', '7th', 'C', '63', '', '', '', '', '', '2013-09-25', 0x5765646E6573646179);
INSERT INTO `stud_attendance` VALUES ('56', '6th', 'A', '67', '7', '2', '', '', '', '2013-09-25', 0x5765646E6573646179);
INSERT INTO `stud_attendance` VALUES ('57', '6th', 'B', '72', '5', '2', '', '', '', '2013-09-25', 0x5765646E6573646179);
INSERT INTO `stud_attendance` VALUES ('58', '6th', 'C', '65', '7', '3', '', '', '', '2013-09-25', 0x5765646E6573646179);
INSERT INTO `stud_attendance` VALUES ('59', '10th', 'A', '52', '2', '2', '', '', '', '2013-09-26', 0x5468757273646179);
INSERT INTO `stud_attendance` VALUES ('60', '10th', 'B', '50', '5', '', '3', '', '', '2013-09-26', 0x5468757273646179);
INSERT INTO `stud_attendance` VALUES ('61', '10th', 'C', '40', '6', '2', '', '', '', '2013-09-26', 0x5468757273646179);
INSERT INTO `stud_attendance` VALUES ('62', '9th', 'A', '53', '', '', '', '', '', '2013-09-26', 0x5468757273646179);
INSERT INTO `stud_attendance` VALUES ('63', '9th', 'B', '72', '3', '4', '', '', '', '2013-09-26', 0x5468757273646179);
INSERT INTO `stud_attendance` VALUES ('64', '9th', 'C', '75', '5', '', '', '', '', '2013-09-26', 0x5468757273646179);
INSERT INTO `stud_attendance` VALUES ('65', '8th', 'A', '52', '6', '', '', '', '', '2013-09-26', 0x5468757273646179);
INSERT INTO `stud_attendance` VALUES ('66', '8th', 'B', '61', '6', '3', '', '', '', '2013-09-26', 0x5468757273646179);
INSERT INTO `stud_attendance` VALUES ('67', '8th', 'C', '68', '2', '1', '', '', '', '2013-09-26', 0x5468757273646179);
INSERT INTO `stud_attendance` VALUES ('69', '7th', 'A', '60', '5', '', '', '', '', '2013-09-26', 0x5468757273646179);
INSERT INTO `stud_attendance` VALUES ('70', '7th', 'B', '58', '5', '', '', '', '', '', 0x4D6F6E646179);
INSERT INTO `stud_attendance` VALUES ('71', '7th', 'C', '', '', '', '', '', '', '', 0x4D6F6E646179);
INSERT INTO `stud_attendance` VALUES ('72', '7th', 'C', '63', '', '', '', '', '', '2013-09-26', 0x5468757273646179);
INSERT INTO `stud_attendance` VALUES ('73', '6th', 'A', '67', '6', '1', '', '', '', '2013-09-26', 0x5468757273646179);
INSERT INTO `stud_attendance` VALUES ('74', '6th', 'B', '72', '4', '2', '', '', '', '2013-09-26', 0x5468757273646179);
INSERT INTO `stud_attendance` VALUES ('75', '6th', 'C', '64', '4', '', '', '', '', '2013-09-26', 0x5468757273646179);

-- ----------------------------
-- Table structure for `stud_data`
-- ----------------------------
DROP TABLE IF EXISTS `stud_data`;
CREATE TABLE `stud_data` (
  `a_id` int(4) NOT NULL auto_increment,
  `s_name` varchar(50) NOT NULL,
  `f_name` varchar(50) NOT NULL,
  `cnic` varchar(13) NOT NULL,
  `roll_no` int(30) NOT NULL,
  `gender` varchar(30) NOT NULL,
  `class` varchar(30) NOT NULL,
  `section` varchar(30) NOT NULL,
  `session` varchar(10) NOT NULL,
  PRIMARY KEY  (`a_id`)
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of stud_data
-- ----------------------------
INSERT INTO `stud_data` VALUES ('14', 'Arsalan Javeed', 'Javeed Iqbal', '3630207987309', '3', 'Male', '9th', 'C', '2013');
INSERT INTO `stud_data` VALUES ('13', 'Arbaz', 'Mushtaq      ', '363024567889', '1', 'Male', '4th', 'ICS', '2009');
INSERT INTO `stud_data` VALUES ('12', 'Mohammad Idrees', 'Ch Noor Muhammad', '3630255913214', '2836', 'Male', '1st year', 'ICS', '2013');
INSERT INTO `stud_data` VALUES ('15', 'Abid', 'Kamal', '3630255913225', '87', 'Male', '3rd', 'A', '2013-14');
INSERT INTO `stud_data` VALUES ('16', 'Masood', 'Maqbool', '2656554356787', '789', 'Male', '1st year', 'C', '2013-14');
INSERT INTO `stud_data` VALUES ('17', 'Imran', 'Mushtaq      ', '2656554356787', '23', 'Male', '9th', 'C', '2012-14');
INSERT INTO `stud_data` VALUES ('18', 'Danial', 'Gohar', '3630255913203', '2837', 'Male', '1st', 'Iqbql', '2013-14');
INSERT INTO `stud_data` VALUES ('19', 'Masud', 'Maqbool ', '3602-5578456-', '3390', 'Male', '10th', 'Allama', '2009-14');
INSERT INTO `stud_data` VALUES ('20', 'Shaukat', 'Karam Alahi', '36302-0475775', '45689', 'Male', '8th', 'A', '2013-14');

-- ----------------------------
-- Table structure for `testtable`
-- ----------------------------
DROP TABLE IF EXISTS `testtable`;
CREATE TABLE `testtable` (
  `testId` int(10) NOT NULL auto_increment,
  `class` varchar(10) NOT NULL,
  `month` varchar(50) NOT NULL,
  `total` varchar(4) default NULL,
  `s_name` varchar(100) default NULL,
  `eng` varchar(3) default NULL,
  `urdu` varchar(3) default NULL,
  `maths` varchar(3) default NULL,
  `pak` varchar(3) default NULL,
  `islam` varchar(3) default NULL,
  `phy` varchar(3) default NULL,
  `che` varchar(3) default NULL,
  `science` varchar(3) default NULL,
  `bio` varchar(3) default NULL,
  `elec` varchar(3) default NULL,
  `comp` varchar(3) default NULL,
  `edu` varchar(3) default NULL,
  `civ` varchar(3) default NULL,
  `arab` varchar(3) default NULL,
  `isl_elec` varchar(3) default NULL,
  PRIMARY KEY  (`testId`)
) ENGINE=MyISAM AUTO_INCREMENT=48 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of testtable
-- ----------------------------
INSERT INTO `testtable` VALUES ('44', '6th B', '2013-08-23', '8500', 'Zeshan1', '60', '99', '72', '67', '60', '60', '', '', '', '', '90', '', '', '', '80');
INSERT INTO `testtable` VALUES ('43', '9th C', '2012-09-17', '', 'Saqib', '150', '150', '100', '75', '75', '100', '100', '', '100', '101', '', '', '', '', '');
INSERT INTO `testtable` VALUES ('42', '9th C', '2011-03-23', '850', 'Noman', '88', '88', '88', '85', '68', '89', '88', '', '', '', '99', '', '', '', '');
INSERT INTO `testtable` VALUES ('41', '10th B', '2013-10-20', '850', 'Baber Ali ', '60', '75', '99', '65', '60', '60', '76', '', '', '', '90', '', '', '', '');
INSERT INTO `testtable` VALUES ('40', '10th B', '2013-08-23', '850', 'Bilal', '80', '68', '72', '65', '70', '67', '76', '', '89', '', '', '', '', '', '');
INSERT INTO `testtable` VALUES ('39', '10th B', '2013-04-19', '850', 'Baber', '90', '99', '99', '67', '67', '98', '97', '', '95', '', '', '', '', '', '');
INSERT INTO `testtable` VALUES ('38', '10th C', '2013-06-25', '850', 'Aamir', '80', '89', '87', '85', '70', '67', '88', '', '89', '', '', '', '', '', '');
INSERT INTO `testtable` VALUES ('37', '10th C', '2013-08-11', '850', 'Arif', '60', '68', '67', '65', '60', '60', '66', '', '67', '', '', '', '', '', '');
INSERT INTO `testtable` VALUES ('36', '10th C', '2013-03-28', '850', 'Arbaz', '70', '75', '72', '71', '70', '78', '76', '', '76', '', '', '', '', '', '');
INSERT INTO `testtable` VALUES ('46', '3rd A', '2013-10-08', '850', 'Abid', '80', '89', '67', '65', '60', '', '', '79', '', '90', '', '', '88', '', '');
INSERT INTO `testtable` VALUES ('47', '9th C', '2012-10-02', '850', 'Arsalan Javeed', '88', '99', '100', '67', '70', '', '', '', '', '', '', '90', '80', '87', '');

-- ----------------------------
-- Table structure for `user`
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `u_id` int(2) NOT NULL auto_increment,
  `f_name` varchar(30) NOT NULL,
  `l_name` varchar(30) NOT NULL,
  `desig` varchar(30) NOT NULL,
  `user` varchar(30) NOT NULL,
  `pass` varchar(30) NOT NULL,
  PRIMARY KEY  (`u_id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES ('8', 'Muhammad Idrees', 'Ch', 'EST(Eng)', 'Idrees', 'tooba');
