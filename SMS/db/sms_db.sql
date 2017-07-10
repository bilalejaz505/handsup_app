/*
Navicat MySQL Data Transfer

Source Server         : localhost_3306
Source Server Version : 50527
Source Host           : localhost:3306
Source Database       : sms_db

Target Server Type    : MYSQL
Target Server Version : 50527
File Encoding         : 65001

Date: 2015-10-31 22:33:48
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `challan`
-- ----------------------------
DROP TABLE IF EXISTS `challan`;
CREATE TABLE `challan` (
  `ch_id` int(10) NOT NULL AUTO_INCREMENT,
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
  PRIMARY KEY (`ch_id`)
) ENGINE=MyISAM AUTO_INCREMENT=57 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of challan
-- ----------------------------
INSERT INTO `challan` VALUES ('1', 'Tooba Malik', 'Fateh Baba', '9th', '2015-09-05', '2015-10-15', '578', '6696', '0', '88', '787', '0', '890', '0', '0', '789');
INSERT INTO `challan` VALUES ('2', 'Zahid Chandia', 'Sajid Chandia', '8th', '2015-07-14', '2015-10-08', '7787', '0', '889', '0', '0', '0', '600', '0', '0', '878');

-- ----------------------------
-- Table structure for `class`
-- ----------------------------
DROP TABLE IF EXISTS `class`;
CREATE TABLE `class` (
  `C_id` int(10) NOT NULL AUTO_INCREMENT,
  `Class` varchar(20) NOT NULL,
  PRIMARY KEY (`C_id`)
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

-- ----------------------------
-- Table structure for `class_res`
-- ----------------------------
DROP TABLE IF EXISTS `class_res`;
CREATE TABLE `class_res` (
  `C_id` int(10) NOT NULL AUTO_INCREMENT,
  `Class` varchar(20) NOT NULL,
  PRIMARY KEY (`C_id`)
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
  `bill_id` int(1) NOT NULL AUTO_INCREMENT,
  `bill_code` varchar(50) NOT NULL,
  PRIMARY KEY (`bill_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of code_bill
-- ----------------------------
INSERT INTO `code_bill` VALUES ('1', 'National Bank, Layyah');

-- ----------------------------
-- Table structure for `code_head`
-- ----------------------------
DROP TABLE IF EXISTS `code_head`;
CREATE TABLE `code_head` (
  `hd_id` int(10) NOT NULL AUTO_INCREMENT,
  `head_code` varchar(100) NOT NULL,
  PRIMARY KEY (`hd_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of code_head
-- ----------------------------
INSERT INTO `code_head` VALUES ('1', 'Zakariyan Educational System Layyah');

-- ----------------------------
-- Table structure for `salary`
-- ----------------------------
DROP TABLE IF EXISTS `salary`;
CREATE TABLE `salary` (
  `sal_id` int(10) NOT NULL AUTO_INCREMENT,
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
  PRIMARY KEY (`sal_id`)
) ENGINE=MyISAM AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of salary
-- ----------------------------
INSERT INTO `salary` VALUES ('21', 'Ejaz Shah', 'Principal', '2015-10-01', '661', '2015-10-01', '25000', '776', '7875', '0', '0', '0', '6678', '9999', '334', '400', '0', '0', '0');
INSERT INTO `salary` VALUES ('22', 'Muhammad Idrees', 'EST(Eng)', '2015-10-01', '662', '2015-10-01', '15000', '77', '660', '0', '0', '0', '5000', '0', '779', '400', '0', '0', '0');

-- ----------------------------
-- Table structure for `staff`
-- ----------------------------
DROP TABLE IF EXISTS `staff`;
CREATE TABLE `staff` (
  `sf_id` int(50) NOT NULL AUTO_INCREMENT,
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
  `Qul_acd` varchar(20) DEFAULT NULL,
  `Qul_prof` varchar(20) DEFAULT NULL,
  `Domi` varchar(100) DEFAULT NULL,
  `joining_date` varchar(100) DEFAULT NULL,
  `date_award` varchar(100) DEFAULT NULL,
  `date_pp` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`sf_id`)
) ENGINE=MyISAM AUTO_INCREMENT=51 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of staff
-- ----------------------------
INSERT INTO `staff` VALUES ('1', 'Muhammad', 'Idrees', 'Ch Noor Muhammad', '17-12-1969', 'Male', 'Islam', '32203-5591320-3', 'EST(Eng)', 'Education', 'idrees_tooba786@yaho.coom', 'Al-Noor 2147/b New Housing Layyah', '03009639034', '14', 'Permanent', 'M.Sc IT', 'BEd,MEd', 'Layyah', '02-09-1995', '02-09-1995', '02-09-1995');
INSERT INTO `staff` VALUES ('2', 'Ejaz ', 'Shah', 'Karim Shah', '1972-02-03', 'Male', 'Islam', '32203-9243851-8', 'Principal', 'Biology', 'Ejaz667@yahoo.com', 'Mohalla Faizabad Layyah', '03087864532', '0', 'Permanent', 'Msc Biology', 'Med', 'Layyah', '02-5-1998', '', '02-5-1998');

-- ----------------------------
-- Table structure for `students`
-- ----------------------------
DROP TABLE IF EXISTS `students`;
CREATE TABLE `students` (
  `s_id` int(4) NOT NULL AUTO_INCREMENT,
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
  PRIMARY KEY (`s_id`)
) ENGINE=MyISAM AUTO_INCREMENT=210 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of students
-- ----------------------------
INSERT INTO `students` VALUES ('1', 'Tooba  Malik', 'Farhana', 'Fateh Baba', '23203', '5678675', '8', 'Male', 'Islam', '2004-05-13', 'Business', '061', '6750240', '0306', '2227868', 'idrees_tooba786@yahoo.com', 'Yes', 'TDA Colony Layyah.', '', 'Ibne-Khaldoon School Layyah', '8901', '9th', '065', '9200088', '', 'Hosing Colony Layyah', 'Hamad', 'Laal Zada', 'Saeed ', 'akram', '8th', '', '1234', '1111', '2015-09-09', '9th', 'A', '2015-16', 'paid', 'Approved', '2838');
INSERT INTO `students` VALUES ('2', 'Zahid Chandia', 'Rabia', 'Sajid Chandia', '32203', '2678665', '9', 'Male', 'Islam', '2003-02-15', 'Teaching', '061', '9846263', '0300', '6507296', 'Zahidjan112@gmail.com', 'Yes', 'Mumtazabad Colony Layyah.', '', 'Govt Model school', '999', '7th', '065', '7837583', '', 'Sun Rise Publick School', '', '', '', '', '', '', '', '', '2015-08-3', '8th', 'B', '2015-16', 'paid', 'Approved', '12784');

-- ----------------------------
-- Table structure for `stud_attendance`
-- ----------------------------
DROP TABLE IF EXISTS `stud_attendance`;
CREATE TABLE `stud_attendance` (
  `Sr_No` int(10) NOT NULL AUTO_INCREMENT,
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
  PRIMARY KEY (`Sr_No`)
) ENGINE=InnoDB AUTO_INCREMENT=80 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of stud_attendance
-- ----------------------------
INSERT INTO `stud_attendance` VALUES ('77', '8th', 'B', '50', '5', '2', '1', '', '', '2015-11-26', 0x4D6F6E646179);
INSERT INTO `stud_attendance` VALUES ('78', '9th', 'A', '56', '2', '1', '0', '', '', '2015-11-26', 0x4D6F6E646179);

-- ----------------------------
-- Table structure for `stud_data`
-- ----------------------------
DROP TABLE IF EXISTS `stud_data`;
CREATE TABLE `stud_data` (
  `a_id` int(4) NOT NULL AUTO_INCREMENT,
  `s_name` varchar(50) NOT NULL,
  `f_name` varchar(50) NOT NULL,
  `cnic` varchar(13) NOT NULL,
  `roll_no` int(30) NOT NULL,
  `gender` varchar(30) NOT NULL,
  `class` varchar(30) NOT NULL,
  `section` varchar(30) NOT NULL,
  `session` varchar(10) NOT NULL,
  PRIMARY KEY (`a_id`)
) ENGINE=MyISAM AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of stud_data
-- ----------------------------
INSERT INTO `stud_data` VALUES ('14', 'Tooba Malik', 'Fateh Baba', '3220307987302', '3', 'Female', '1st A', '', '2015-16');
INSERT INTO `stud_data` VALUES ('13', 'Zahid Chandia', 'Sajid Chandia', '3220355913203', '1', 'Male', '1st A', '', '2005-16');

-- ----------------------------
-- Table structure for `testtable`
-- ----------------------------
DROP TABLE IF EXISTS `testtable`;
CREATE TABLE `testtable` (
  `testId` int(10) NOT NULL AUTO_INCREMENT,
  `class` varchar(10) NOT NULL,
  `month` varchar(50) NOT NULL,
  `total` varchar(4) DEFAULT NULL,
  `s_name` varchar(100) DEFAULT NULL,
  `eng` varchar(3) DEFAULT NULL,
  `urdu` varchar(3) DEFAULT NULL,
  `maths` varchar(3) DEFAULT NULL,
  `pak` varchar(3) DEFAULT NULL,
  `islam` varchar(3) DEFAULT NULL,
  `phy` varchar(3) DEFAULT NULL,
  `che` varchar(3) DEFAULT NULL,
  `science` varchar(3) DEFAULT NULL,
  `bio` varchar(3) DEFAULT NULL,
  `elec` varchar(3) DEFAULT NULL,
  `comp` varchar(3) DEFAULT NULL,
  `edu` varchar(3) DEFAULT NULL,
  `civ` varchar(3) DEFAULT NULL,
  `arab` varchar(3) DEFAULT NULL,
  `isl_elec` varchar(3) DEFAULT NULL,
  PRIMARY KEY (`testId`)
) ENGINE=MyISAM AUTO_INCREMENT=51 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of testtable
-- ----------------------------
INSERT INTO `testtable` VALUES ('1', '9th A', '2015-11-17', '600', 'Tooba Malik', '', '70', '78', '77', '67', '67', '80', '', '', '', '', '', '', '', '');
INSERT INTO `testtable` VALUES ('2', '8th B', '2015-12-24', '400', 'Zahid Chandia', '60', '', '', '56', '', '78', '80', '', '', '', '', '', '', '', '');

-- ----------------------------
-- Table structure for `user`
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `u_id` int(2) NOT NULL AUTO_INCREMENT,
  `f_name` varchar(30) NOT NULL,
  `l_name` varchar(30) NOT NULL,
  `desig` varchar(30) NOT NULL,
  `user` varchar(30) NOT NULL,
  `pass` varchar(30) NOT NULL,
  PRIMARY KEY (`u_id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES ('1', 'Mohsin', 'Khan', 'EST', 'admin', 'admin');
INSERT INTO `user` VALUES ('2', 'Ahsan', 'Khan', 'SST', 'admin', 'admin');
