-- phpMyAdmin SQL Dump
-- version 4.1.8
-- http://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Generation Time: Oct 13, 2014 at 10:50 AM
-- Server version: 5.6.10
-- PHP Version: 5.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `autocon`
--

-- --------------------------------------------------------

--
-- Table structure for table `db_tabprefixblog`
--

DROP TABLE IF EXISTS `db_tabprefixblog`;
CREATE TABLE IF NOT EXISTS `db_tabprefixblog` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` char(30) NOT NULL,
  `featured_img` char(200) NOT NULL,
  `title` char(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `description` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `created_by` int(11) NOT NULL,
  `create_time` int(11) NOT NULL,
  `status` int(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `db_tabprefixblog`
--

INSERT INTO `db_tabprefixblog` (`id`, `type`, `featured_img`, `title`, `description`, `created_by`, `create_time`, `status`) VALUES
(1, 'blog', 'ferrari.jpg', 'Lorem ipsum doller sit amaet Lorem ipsum doller sit amaet', '<p>Lorem ipsum doller sit amaet.Lorem ipsum doller sit amaet.Lorem ipsum doller sit amaet.Lorem ipsum doller sit amaet.Lorem ipsum doller sit amaet.Lorem ipsum doller sit amaet.Lorem ipsum doller sit amaet.Lorem ipsum doller sit amaet.Lorem ipsum doller sit amaet.Lorem ipsum doller sit amaet.Lorem ipsum doller sit amaet.Lorem ipsum doller sit amaet.Lorem ipsum doller sit amaet.Lorem ipsum doller sit amaet.Lorem ipsum doller sit amaet.Lorem ipsum doller sit amaet.Lorem ipsum doller sit amaet.Lorem ipsum doller sit amaet.Lorem ipsum doller sit amaet.Lorem ipsum doller sit amaet.Lorem ipsum doller sit amaet.Lorem ipsum doller sit amaet.Lorem ipsum doller sit amaet.Lorem ipsum doller sit amaet.Lorem ipsum doller sit amaet.Lorem ipsum doller sit amaet.Lorem ipsum doller sit amaet.Lorem ipsum doller sit amaet.Lorem ipsum doller sit amaet.Lorem ipsum doller sit amaet.</p>\r\n<p> </p>\r\n<p>Lorem ipsum doller sit amaet.Lorem ipsum doller sit amaet.Lorem ipsum doller sit amaet.Lorem ipsum doller sit amaet.Lorem ipsum doller sit amaet.Lorem ipsum doller sit amaet.Lorem ipsum doller sit amaet.Lorem ipsum doller sit amaet.Lorem ipsum doller sit amaet.Lorem ipsum doller sit amaet.Lorem ipsum doller sit amaet.Lorem ipsum doller sit amaet.Lorem ipsum doller sit amaet.Lorem ipsum doller sit amaet.Lorem ipsum doller sit amaet.Lorem ipsum doller sit amaet.Lorem ipsum doller sit amaet.Lorem ipsum doller sit amaet.Lorem ipsum doller sit amaet.Lorem ipsum doller sit amaet.Lorem ipsum doller sit amaet.Lorem ipsum doller sit amaet.Lorem ipsum doller sit amaet.Lorem ipsum doller sit amaet.Lorem ipsum doller sit amaet.Lorem ipsum doller sit amaet.Lorem ipsum doller sit amaet.Lorem ipsum doller sit amaet.Lorem ipsum doller sit amaet.Lorem ipsum doller sit amaet.Lorem ipsum doller sit amaet.Lorem ipsum doller sit amaet.</p>', 1, 1410854808, 1),
(2, 'news', 'bike.jpg', 'Lorem ipsum news ipsum', '<p>Lorem ipsum doller sit amaet.Lorem ipsum doller sit amaet.Lorem ipsum doller sit amaet.Lorem ipsum doller sit amaet.Lorem ipsum doller sit amaet.Lorem ipsum doller sit amaet.Lorem ipsum doller sit amaet.Lorem ipsum doller sit amaet.Lorem ipsum doller sit amaet.Lorem ipsum doller sit amaet.Lorem ipsum doller sit amaet.Lorem ipsum doller sit amaet.Lorem ipsum doller sit amaet.Lorem ipsum doller sit amaet.Lorem ipsum doller sit amaet.Lorem ipsum doller sit amaet.Lorem ipsum doller sit amaet.Lorem ipsum doller sit amaet.</p>', 1, 1410855039, 1);

-- --------------------------------------------------------

--
-- Table structure for table `db_tabprefixblog_meta`
--

DROP TABLE IF EXISTS `db_tabprefixblog_meta`;
CREATE TABLE IF NOT EXISTS `db_tabprefixblog_meta` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `blog_id` int(11) NOT NULL,
  `key` char(50) NOT NULL,
  `value` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `status` int(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `db_tabprefixbrandmodels`
--

DROP TABLE IF EXISTS `db_tabprefixbrandmodels`;
CREATE TABLE IF NOT EXISTS `db_tabprefixbrandmodels` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `parent` int(11) NOT NULL,
  `name` char(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `type` char(10) NOT NULL,
  `status` int(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=208 ;

--
-- Dumping data for table `db_tabprefixbrandmodels`
--

INSERT INTO `db_tabprefixbrandmodels` (`id`, `parent`, `name`, `type`, `status`) VALUES
(1, 0, 'Alfa Romeo', 'brand', 1),
(2, 0, ' Acura', 'brand', 1),
(3, 0, ' Aston Martin', 'brand', 1),
(4, 0, ' Audi', 'brand', 1),
(5, 0, ' Bentley', 'brand', 1),
(6, 0, ' BMW', 'brand', 1),
(7, 0, ' Cadillac', 'brand', 1),
(8, 0, ' Chevrolet', 'brand', 1),
(9, 0, ' Chrysler', 'brand', 1),
(10, 0, ' Citroen', 'brand', 1),
(11, 0, ' Corvette', 'brand', 1),
(12, 0, ' Dacia', 'brand', 1),
(13, 0, ' Dodge', 'brand', 1),
(14, 0, ' Ferrari', 'brand', 1),
(15, 0, ' Fiat', 'brand', 1),
(16, 0, ' Ford', 'brand', 1),
(17, 0, ' GMC', 'brand', 1),
(18, 0, ' Honda', 'brand', 1),
(19, 0, ' Hyundai', 'brand', 1),
(20, 0, ' Infiniti', 'brand', 1),
(21, 0, ' Isuzu', 'brand', 1),
(22, 0, ' Jaguar', 'brand', 1),
(23, 0, ' Jeep', 'brand', 1),
(24, 0, ' KIA', 'brand', 1),
(25, 0, ' Lamborghini', 'brand', 1),
(26, 0, ' Lancia', 'brand', 1),
(27, 0, ' Land Rover', 'brand', 1),
(28, 0, ' Lexus', 'brand', 1),
(29, 0, ' Lotus', 'brand', 1),
(30, 0, ' Maserati', 'brand', 1),
(31, 0, ' Mazda', 'brand', 1),
(32, 0, ' McLaren', 'brand', 1),
(33, 0, ' Mercedes-Benz', 'brand', 1),
(34, 0, ' Mini', 'brand', 1),
(35, 0, ' Mitsubishi', 'brand', 1),
(36, 0, ' Nissan', 'brand', 1),
(37, 0, ' Opel', 'brand', 1),
(38, 0, ' Peugeot', 'brand', 1),
(39, 0, ' Porsche', 'brand', 1),
(40, 0, ' Proton', 'brand', 1),
(41, 0, ' Renault', 'brand', 1),
(42, 0, ' Rolls-Royce', 'brand', 1),
(43, 0, ' Saab', 'brand', 1),
(44, 0, ' Seat', 'brand', 1),
(45, 0, ' Skoda', 'brand', 1),
(46, 0, ' Subaru', 'brand', 1),
(47, 0, ' Suzuki', 'brand', 1),
(48, 0, ' Toyota', 'brand', 1),
(49, 0, ' Vauxhall', 'brand', 1),
(50, 0, ' Volkswagen', 'brand', 1),
(51, 0, ' Volvo', 'brand', 1),
(52, 6, 'F48', 'model', 1),
(53, 6, 'F80', 'model', 1),
(54, 6, 'F82', 'model', 1),
(55, 6, 'F83', 'model', 1),
(56, 6, 'F85', 'model', 1),
(57, 6, 'F86', 'model', 1),
(58, 6, 'G11', 'model', 1),
(59, 6, 'G12', 'model', 1),
(60, 6, 'G30', 'model', 1),
(61, 6, 'E24', 'model', 1),
(62, 6, 'M3', 'model', 1),
(63, 6, 'M5', 'model', 1),
(64, 6, 'Z4 Roadster', 'model', 1),
(65, 6, 'X6M', 'model', 1),
(66, 4, 'A1', 'model', 1),
(67, 4, 'A4', 'model', 1),
(68, 4, 'A5', 'model', 1),
(69, 4, 'A6', 'model', 1),
(70, 4, 'A7', 'model', 1),
(71, 4, 'A8', 'model', 1),
(72, 4, 'TT', 'model', 1),
(73, 4, 'R8', 'model', 1),
(74, 4, 'Q3', 'model', 1),
(75, 4, 'Q5', 'model', 1),
(76, 4, 'Q7', 'model', 1),
(77, 48, 'Prius', 'model', 1),
(78, 48, 'Celica', 'model', 1),
(79, 48, 'Supra', 'model', 1),
(80, 48, 'Carina', 'model', 1),
(81, 48, 'Camry', 'model', 1),
(82, 48, 'MR2', 'model', 1),
(83, 48, 'Premio', 'model', 1),
(84, 48, 'Corolla', 'model', 1),
(85, 48, 'Allion', 'model', 1),
(86, 48, 'Axio', 'model', 1),
(87, 16, 'Escape', 'model', 1),
(88, 16, 'Mustang', 'model', 1),
(89, 16, 'Fusion', 'model', 1),
(90, 16, 'Taurus', 'model', 1),
(91, 16, 'Explorer', 'model', 1),
(92, 16, 'Edge', 'model', 1),
(93, 16, 'Fiesta', 'model', 1),
(94, 39, 'Cayenne', 'model', 1),
(95, 39, '911', 'model', 1),
(96, 39, 'Boxster', 'model', 1),
(97, 39, '912', 'model', 1),
(98, 39, 'Panamera', 'model', 1),
(99, 39, 'Carrera', 'model', 1),
(100, 39, 'Cayman', 'model', 1),
(101, 7, 'Escalade', 'model', 1),
(102, 7, 'CTS-V', 'model', 1),
(103, 7, 'SRX', 'model', 1),
(104, 7, 'Eldorado', 'model', 1),
(105, 7, 'Cimarron', 'model', 1),
(106, 7, 'Seville', 'model', 1),
(107, 7, 'XTS', 'model', 1),
(108, 7, 'ATS', 'model', 1),
(109, 14, '750 Monza', 'model', 1),
(110, 14, 'Barchetta', 'model', 1),
(111, 14, '312PB', 'model', 1),
(112, 14, 'Testa Rossa', 'model', 1),
(113, 14, '330 LMB', 'model', 1),
(114, 14, '458 Italia', 'model', 1),
(115, 1, 'MiTo', 'model', 1),
(116, 1, 'Giulietta', 'model', 1),
(117, 1, '4C', 'model', 1),
(118, 2, 'ILX', 'model', 1),
(119, 2, 'MDX', 'model', 1),
(120, 2, 'RDX', 'model', 1),
(121, 2, 'RLX', 'model', 1),
(122, 2, 'TLX', 'model', 1),
(123, 3, 'V8 Vantage', 'model', 1),
(124, 3, 'V12 Vantage', 'model', 1),
(125, 3, 'DB9', 'model', 1),
(126, 3, 'Vanquish', 'model', 1),
(127, 3, 'Rapide', 'model', 1),
(128, 8, 'Agile', 'model', 1),
(129, 8, 'Aveo', 'model', 1),
(130, 8, 'Celta', 'model', 1),
(131, 8, 'Classic', 'model', 1),
(132, 8, 'Lova', 'model', 1),
(133, 8, 'Lanos', 'model', 1),
(134, 8, 'Onix', 'model', 1),
(135, 8, 'Prisma', 'model', 1),
(136, 8, 'Sail', 'model', 1),
(137, 8, 'Sonic', 'model', 1),
(138, 8, 'Spark', 'model', 1),
(139, 8, 'Cobalt', 'model', 1),
(140, 8, 'Cruze', 'model', 1),
(141, 8, 'Lacetti', 'model', 1),
(142, 8, 'Volt', 'model', 1),
(143, 8, 'Malibu', 'model', 1),
(144, 8, 'Caprice', 'model', 1),
(145, 8, 'Impala', 'model', 1),
(146, 8, 'Lumina', 'model', 1),
(147, 8, 'SS', 'model', 1),
(148, 8, 'Corvette', 'model', 1),
(149, 8, 'Camaro', 'model', 1),
(150, 8, 'Orlando', 'model', 1),
(151, 8, 'Spin', 'model', 1),
(152, 8, 'Tavera', 'model', 1),
(153, 8, 'Captiva', 'model', 1),
(154, 8, 'Niva', 'model', 1),
(155, 8, 'Colorado', 'model', 1),
(156, 8, 'Express', 'model', 1),
(157, 8, 'Montana', 'model', 1),
(158, 8, 'Tornado', 'model', 1),
(159, 9, 'Ypsilon', 'model', 1),
(160, 9, 'Delta', 'model', 1),
(161, 9, '300', 'model', 1),
(162, 9, 'Grand Voyager', 'model', 1),
(163, 10, 'C1', 'model', 1),
(164, 10, 'C4 Picasso', 'model', 1),
(165, 10, 'Aircross', 'model', 1),
(166, 10, 'C- Elysse', 'model', 1),
(167, 10, 'C3 Picasso', 'model', 1),
(168, 10, 'C4', 'model', 1),
(169, 10, 'C4 Cactus', 'model', 1),
(170, 13, 'Avenger', 'model', 1),
(171, 13, 'Grand Caravan', 'model', 1),
(172, 13, 'Challenger', 'model', 1),
(173, 13, 'Charger', 'model', 1),
(174, 13, 'Dart', 'model', 1),
(175, 13, 'Durango', 'model', 1),
(176, 13, 'Journey', 'model', 1),
(177, 17, 'Sierra', 'model', 1),
(178, 17, 'Syclone', 'model', 1),
(179, 17, 'Sonoma', 'model', 1),
(180, 17, 'Canyon', 'model', 1),
(181, 17, 'TopKick', 'model', 1),
(182, 17, 'Forward', 'model', 1),
(183, 17, 'W-Series', 'model', 1),
(184, 17, 'T-Series', 'model', 1),
(185, 17, 'Typhoon', 'model', 1),
(186, 17, 'Envoy', 'model', 1),
(187, 17, 'Acadia', 'model', 1),
(188, 17, 'Terrain', 'model', 1),
(189, 18, 'Accord', 'model', 1),
(190, 18, 'Acty', 'model', 1),
(191, 18, 'Brio', 'model', 1),
(192, 18, 'City', 'model', 1),
(193, 18, 'Civic', 'model', 1),
(194, 18, 'CR-V', 'model', 1),
(195, 18, 'Elysion', 'model', 1),
(196, 18, 'HR-V', 'model', 1),
(197, 18, 'NSX', 'model', 1),
(198, 18, 'Pilot', 'model', 1),
(199, 18, 'Shuttle', 'model', 1),
(200, 18, 'Vamos', 'model', 1),
(201, 18, 'ZEST', 'model', 1),
(202, 19, 'Accent', 'model', 1),
(203, 19, 'Ventam Genesis', 'model', 1),
(204, 19, 'Eon', 'model', 1),
(205, 19, 'Atos', 'model', 1),
(206, 19, 'Santro', 'model', 1),
(207, 19, 'Avante', 'model', 1);

-- --------------------------------------------------------

--
-- Table structure for table `db_tabprefixemailtmpl`
--

DROP TABLE IF EXISTS `db_tabprefixemailtmpl`;
CREATE TABLE IF NOT EXISTS `db_tabprefixemailtmpl` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email_name` char(100) NOT NULL,
  `values` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `status` int(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `db_tabprefixemailtmpl`
--

INSERT INTO `db_tabprefixemailtmpl` (`id`, `email_name`, `values`, `status`) VALUES
(1, 'confirmation_email', '{"subject":"Confirmation email","body":"Hi #username,\\r\\nYour signup is successful. Please follow the below link for activating your account:\\r\\n \\r\\n#activationlink\\r\\n\\t\\t\\t\\t\\t\\t\\t\\t\\t\\t\\r\\nThanks\\r\\n#webadmin","avl_vars":"#username,#useremail,#activationlink,#webadmin"}', 1),
(2, 'recovery_email', '{"subject":"Recovery email","body":"Hi #username,\\r\\nWe have received an account recovery request from your email. Please follow the below link for setting new password \\r\\n\\r\\n#recoverylink\\r\\n\\r\\nThanks\\r\\n#webadmin","avl_vars":"#username,#recoverylink,#webadmin"}', 1),
(3, 'signup_notification_email', '{"subject":"Notification email","body":"Hi #username,\\nWe''ve received signup information from you. Once you''ve finish the payment, your account will be activated. You can return to this page by following the following link: \\n\\n#recoverylink\\n\\nThanks\\n#webadmin","avl_vars":"#username,#recoverylink,#webadmin"}', 1),
(4, 'payment_confirmation_email', '{"subject":"Confirmation email","body":"Hi #username,\\nYour account is confirmed. Please follow the below link for login\\n\\n#loginlink\\n\\nThanks\\n#webadmin","avl_vars":"#username,#loginlink,#webadmin"}', 1);

-- --------------------------------------------------------

--
-- Table structure for table `db_tabprefixlanguage`
--

DROP TABLE IF EXISTS `db_tabprefixlanguage`;
CREATE TABLE IF NOT EXISTS `db_tabprefixlanguage` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `unique_id` char(100) NOT NULL,
  `lang` char(50) NOT NULL,
  `short_name` char(5) NOT NULL,
  `values` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `status` int(1) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `unique_id` (`unique_id`),
  UNIQUE KEY `lang` (`lang`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `db_tabprefixlanguage`
--

INSERT INTO `db_tabprefixlanguage` (`id`, `unique_id`, `lang`, `short_name`, `values`, `status`) VALUES
(1, 'English-en', 'English', 'en', '{"condition_new":"New","condition_used":"Used","condition_pre_owned":"Certified Pre Owned","condition_recondition":"Recondition","condition_other":"Other","condition_sold":"Sold","condition_available":"Available","sign_in":"Sign In","sign_up":"Sign Up","admin_panel":"Admin Panel","logout":"Logout","advanced_search":"Advanced Search","home":"Home","about":"About","contact":"Contact","plain_search":"Plain Search","ignore_this_section":"Ignore this section","location_search":"Location Search","country":"Country","state_province":"State\\/Province","city":"City","price":"Price","phone":"Phone","first_name":"First Name","last_name":"Last Name","company_name":"Company Name","register":"Register","type":"Type","details":"Details","view_all":"View All","order_by":"Order By","none":"None","terms_and_conditions":"Terms and Confition","reg_success_message":"Your account registration is successfull. An email was sent to your email. Please follow that email to activate your account.Thanks","limit":"Limit","usage":"Usage","recover":"Recover","oops":"Oops, page not found","share_this":"Share This","status":"Status","description":"Description","location_map":"Location Map","image_gallery":"Image Gallery","summary":"Summary","overview":"Overview","address":"Address","message":"Message","username":"Username","about_me":"About Me","type_filters":"Type Filters","email_subject":"Email Subject","all":"All","deleted":"Deleted","contact_us":"Contact Us","active":"Active","pending":"Pending","reported":"Reported","featured_video":"Featured Video","embed_video_url":"Embeded Video Url","profile_picture":"Profile Picture","cars":"Cars","car":"Car","manufacturers":"Manufacturers","car_type":"Car Type","car_manufacturer":"Car Manufacturer","car_model":"Car Model","year":"Year","mileage":"Mileage","condition":"Condition","specifications":"Specifications","dimensions":"Dimensions","reg_no":"Registration No.","engine_size":"Engine Size","engine_type":"Engine Type","exterior_color":"Exterior Color","interior_color":"Interior Color","fuel_type":"Fuel Type","safety_rating":"Safety Rating","standard_seating":"Standard Seating","steering_type":"Steering Type","height":"Height","width":"Width","length":"Length","wheelbase":"Wheelbase","track_rear":"Track Rear","track_front":"Track Front","ground_clearance":"Ground Clearance","manufacturer":"Manufacturer","body_type":"Body Type","featured_cars":"Featured Cars","recent_cars":"Recent Cars","select_manufacturer":"Select Manufacturer","select_model":"Select Model","price_range":"Price Range","select_type":"Select Type","model_year":"Model Year","filter_vehicles":"Filter Vehicles","no_cars_found":"No Cars Found","dealers":"Dealers","all_dealers":"All Dealers","top_dealers":"Top Dealers","top_cars":"Top Cars","dealer_cars":"Dealer Cars","dealer_location":"Dealer Location","dealer":"Dealer","model":"Model","zip_code":"Zip Code","transmission":"Transmission","tags":"Tags","no_dealers_found":"No Dealers Found","dealer_vehicles":"Dealer Vehicles","result":"Result","dealer_not_found":"Dealer not Found","payment_finish_title":"Payment Complete","payment_renew_title":"Payment Complete","payment_finish_text":"Your payment is complete. As soon as we recieved confirmation from paypal your account will be activated","payment_renew_text":"Your payment is complete. As soon as we recieved confirmation from paypal your account will be renewed","payment_cancel_title":"Payment Cancel","payment_cancel_text":"Your payment is canceled","feature_payment_finish":"Your payment is complete. As soon as we recieve confirmation from paypal, your estate will be featured.","feature_payment_cancel":"Your payment is canceled.","payment_notification":"You are going to make an payment. A email is sent to your email. You can back to this step anytime from the link on that email.","type_filers":"Type Filters","view_listing":"View Listing","car_added_successfully":"Car Added Successfully","email_tracker":"Email Tracker","bulk_email":"Bulk Email","other_info":"Other Info","basic_info":"Basic Info","contact_subject":"Contact Subject","dealer_panel":"Dealer Panel","list_your_car":"List Your Car","share":"Share","search":"Search","all_email_to_dealer":"All Email To Dealer","embed_preview":"Embed Preview","car_brochure":"Car Brochure","pages":"Pages","post_not_found":"No Post Found","blog":"Blog","news":"News","article":"Article","change_package":"Change Package","bi_payment_cancel_title":"Payment Cancelled","mileage_range":"Mileage Range","select_transmission_type":"Select Transmission","select_car_condition":"Select Condition","enter_above_text":"Enter Above Text"}', 1),
(3, 'Spanish-es', 'Spanish', 'es', '{"condition_new":"Nuevo","condition_used":"Utilizado","condition_pre_owned":"Usados \\u200b\\u200bcertificados","condition_recondition":"Reacondicionar","condition_other":"Otra","condition_sold":"Vendido","condition_available":"Disponible","sign_in":"Iniciar sesi\\u00f3n","sign_up":"Registrarse","admin_panel":"Panel de administraci\\u00f3n","logout":"Salir","advanced_search":"B\\u00fasqueda avanzada","home":"Inicio","about":"Acerca de","contact":"Contacto","plain_search":"Llanura Buscar","ignore_this_section":"No haga caso de esta secci\\u00f3n","location_search":"Buscar una localidad","country":"Pa\\u00eds","state_province":"Estado\\/Provincia","city":"Ciudad","price":"Precio","phone":"Tel\\u00e9fono","first_name":"Nombre","last_name":"Apellidos","company_name":"Nombre de la empresa","register":"Registro","type":"Tipo","details":"Detalles","view_all":"Ver todo","order_by":"Ordenar por:","none":"Ninguno","terms_and_conditions":"T\\u00e9rminos y Confition","reg_success_message":"Su registro de la cuenta es exitosa. Un correo electr\\u00f3nico fue enviado a su correo electr\\u00f3nico. Por favor, siga ese correo para activar sus account.Thanks","limit":"L\\u00edmite","usage":"Uso","recover":"Recuperar","oops":"Vaya, p\\u00e1gina no encontrada","share_this":"Share This","status":"Estado","description":"Descripci\\u00f3n","location_map":"Mapa de ubicaci\\u00f3n","image_gallery":"Galer\\u00eda de im\\u00e1genes","summary":"Resumen","overview":"Generalidades","address":"Direcci\\u00f3n","message":"Mensaje","username":"Nombre de usuario","about_me":"Acerca de m\\u00ed","type_filters":"Tipo de Filtros","email_subject":"L\\u00ednea de asunto del correo electr\\u00f3nico","all":"Todos","deleted":"Borrado","contact_us":"Cont\\u00e1ctenos","active":"Activo","pending":"Pendiente","reported":"Reportado","featured_video":"Video del d\\u00eda","embed_video_url":"Embeded V\\u00eddeo Url","profile_picture":"Foto de Perfil","cars":"Coches","car":"Coche","manufacturers":"Fabricantes","car_type":"Tipo de Veh\\u00edculo","car_manufacturer":"Fabricante de coches","car_model":"Modelo de coche","year":"A\\u00f1o","mileage":"Kilometraje","condition":"Condici\\u00f3n","specifications":"Especificaciones","dimensions":"Dimensiones","reg_no":"N\\u00famero de registro","engine_size":"Tama\\u00f1o del motor","engine_type":"Motor de combusti\\u00f3n interna","exterior_color":"Color Exterior","interior_color":"Color Interior","fuel_type":"Combustible","safety_rating":"Clasificaci\\u00f3n de seguridad","standard_seating":"Norma Asientos","steering_type":"Tipo de direcci\\u00f3n","height":"Altura","width":"Ancho","length":"Periodo","wheelbase":"Distancia entre ejes","track_rear":"V\\u00eda trasera","track_front":"V\\u00eda delantera","ground_clearance":"Distancia al suelo","manufacturer":"Fabricante","body_type":"Tipo de cuerpo","featured_cars":"Coches destacados","recent_cars":"Coches recientes","select_manufacturer":"Seleccione un fabricante","select_model":"Seleccione el modelo","price_range":"Rango de precios","select_type":"Seleccionar tipo","model_year":"Modelo A\\u00f1o","filter_vehicles":"Filtro Veh\\u00edculos","no_cars_found":"No hay coches encontrados","dealers":"Distribuidores","all_dealers":"Todos los Distribuidores","top_dealers":"Top Distribuidores","top_cars":"Top Cars","dealer_cars":"Coches del concesionario","dealer_location":"Dealer Ubicaci\\u00f3n","dealer":"Comerciante","model":"Modelo","zip_code":"C\\u00f3digo ZIP","transmission":"Transmisi\\u00f3n","tags":"Etiquetas","no_dealers_found":"No se han encontrado Distribuidores","dealer_vehicles":"Veh\\u00edculos Comerciante","result":"Resultado","dealer_not_found":"Dealer no encontrado","payment_finish_title":"Completo pago","payment_renew_title":"Completo pago","payment_finish_text":"Su pago se ha realizado. Tan pronto como recibimos la confirmaci\\u00f3n de paypal a su cuenta se activar\\u00e1","payment_renew_text":"Su pago se ha realizado. Tan pronto como recibimos la confirmaci\\u00f3n de paypal a su cuenta se renovar\\u00e1","payment_cancel_title":"Pago Cancelar","payment_cancel_text":"Su pago se cancela","feature_payment_finish":"Su pago se ha realizado. Tan pronto como recibamos la confirmaci\\u00f3n de paypal, se presentar\\u00e1 su patrimonio.","feature_payment_cancel":"Su pago se cancela.","payment_notification":"Usted va a hacer un pago. Un correo electr\\u00f3nico se env\\u00eda a su correo electr\\u00f3nico. Puede realizar una copia de este paso en cualquier momento desde el enlace de ese correo electr\\u00f3nico.","type_filers":"Tipo de Filtros","view_listing":"Ver Detalles","car_added_successfully":"Coche agregado con \\u00e9xito","email_tracker":"Email Rastreador","bulk_email":"Correo electr\\u00f3nico masivo","other_info":"Otra informaci\\u00f3n","basic_info":"Informaci\\u00f3n B\\u00e1sica","contact_subject":"Contacto Asunto","dealer_panel":"Panel Dealer","list_your_car":"Vende tu Auto","share":"Compartir","search":"Buscar","all_email_to_dealer":"Todo el correo a Dealer","embed_preview":"Insertar Prevista","car_brochure":"Folleto de coches","pages":"P\\u00e1ginas","post_not_found":"No Mensaje Found","blog":"Blog","news":"Noticias","article":"Art\\u00edculo","change_package":"Cambiar Paquete","bi_payment_cancel_title":"Pago Cancelado","mileage_range":"Rango Kilometraje","select_transmission_type":"Seleccione una Transmisi\\u00f3n","select_car_condition":"Seleccionar Estado","enter_above_text":"Introduzca el texto por encima"}', 1),
(4, 'Russian-ru', 'Russian', 'ru', '{"condition_new":"\\u0421\\u043e\\u0437\\u0434\\u0430\\u0442\\u044c","condition_used":"\\u0418\\u0441\\u043f\\u043e\\u043b\\u044c\\u0437\\u0443\\u0435\\u043c\\u044b\\u0439","condition_pre_owned":"\\u0421\\u0435\\u0440\\u0442\\u0438\\u0444\\u0438\\u0446\\u0438\\u0440\\u043e\\u0432\\u0430\\u043d\\u043d\\u044b\\u0439 \\u041f\\u0440\\u0435\\u0434 \\u041d\\u0430\\u0445\\u043e\\u0434\\u044f\\u0449\\u0438\\u0439\\u0441\\u044f \\u0432 \\u0441\\u043e\\u0431\\u0441\\u0442\\u0432\\u0435\\u043d\\u043d\\u043e\\u0441\\u0442\\u0438","condition_recondition":"\\u0412\\u043e\\u0441\\u0441\\u0442\\u0430\\u043d\\u0430\\u0432\\u043b\\u0438\\u0432\\u0430\\u0442\\u044c","condition_other":"\\u041f\\u0440\\u043e\\u0447\\u0435\\u0435","condition_sold":"\\u041f\\u0440\\u043e\\u0434\\u0430\\u043d\\u043d\\u044b\\u0439","condition_available":"\\u0414\\u043e\\u0441\\u0442\\u0443\\u043f\\u043d\\u044b\\u0439","sign_in":"\\u0432\\u043e\\u0439\\u0434\\u0438\\u0442\\u0435 \\u0432 \\u0441\\u0438\\u0441\\u0442\\u0435\\u043c\\u0443","sign_up":"\\u0417\\u0430\\u0440\\u0435\\u0433\\u0438\\u0441\\u0442\\u0440\\u0438\\u0440\\u043e\\u0432\\u0430\\u0442\\u044c\\u0441\\u044f","admin_panel":"\\u041f\\u0430\\u043d\\u0435\\u043b\\u044c \\u0430\\u0434\\u043c\\u0438\\u043d\\u0438\\u0441\\u0442\\u0440\\u0430\\u0442\\u043e\\u0440\\u0430","logout":"\\u0412\\u044b\\u0445\\u043e\\u0434","advanced_search":"\\u0440\\u0430\\u0441\\u0448\\u0438\\u0440\\u0435\\u043d\\u043d\\u044b\\u0439 \\u043f\\u043e\\u0438\\u0441\\u043a","home":"\\u0414\\u043e\\u043c","about":"\\u041e \\u043d\\u0430\\u0441","contact":"\\u041a\\u043e\\u043d\\u0442\\u0430\\u043a\\u0442\\u044b","plain_search":"\\u041e\\u0431\\u044b\\u0447\\u043d\\u0430\\u044f \\u041f\\u043e\\u0438\\u0441\\u043a","ignore_this_section":"\\u041f\\u0440\\u043e\\u043f\\u0443\\u0441\\u0442\\u0438\\u0442\\u0435 \\u044d\\u0442\\u043e\\u0442 \\u0440\\u0430\\u0437\\u0434\\u0435\\u043b","location_search":"\\u0420\\u0430\\u0441\\u043f\\u043e\\u043b\\u043e\\u0436\\u0435\\u043d\\u0438\\u0435 \\u043f\\u043e\\u0438\\u0441\\u043a","country":"\\u0421\\u0442\\u0440\\u0430\\u043d\\u0430","state_province":"\\u0428\\u0442\\u0430\\u0442\\/\\u043e\\u0431\\u043b\\u0430\\u0441\\u0442\\u044c","city":"\\u0413\\u043e\\u0440\\u043e\\u0434","price":"\\u0426\\u0435\\u043d\\u0430","phone":"\\u0422\\u0435\\u043b\\u0435\\u0444\\u043e\\u043d","first_name":"\\u0418\\u043c\\u044f","last_name":"\\u0424\\u0430\\u043c\\u0438\\u043b\\u0438\\u044f","company_name":"\\u041d\\u0430\\u0437\\u0432\\u0430\\u043d\\u0438\\u0435 \\u043a\\u043e\\u043c\\u043f\\u0430\\u043d\\u0438\\u0438","register":"\\u0417\\u0430\\u0440\\u0435\\u0433\\u0438\\u0441\\u0442\\u0440\\u0438\\u0440\\u043e\\u0432\\u0430\\u0442\\u044c\\u0441\\u044f","type":"\\u0422\\u0438\\u043f","details":"\\u041f\\u043e\\u0434\\u0440\\u043e\\u0431\\u043d\\u043e\\u0441\\u0442\\u0438","view_all":"\\u041c\\u043e\\u043d\\u0438\\u0442\\u043e\\u0440\\u044b \\u042d\\u043b\\u0435\\u043a\\u0442\\u0440\\u043e\\u043d\\u0438\\u043a\\u0430 \\u0438 \\u043f\\u0440\\u0438\\u043d\\u0430\\u0434\\u043b\\u0435\\u0436\\u043d\\u043e\\u0441\\u0442\\u0438","order_by":"\\u0421\\u043e\\u0440\\u0442\\u0438\\u0440\\u043e\\u0432\\u0430\\u0442\\u044c \\u043f\\u043e:","none":"\\u041d\\u0435\\u0442","terms_and_conditions":"\\u0423\\u0441\\u043b\\u043e\\u0432\\u0438\\u044f \\u0438 Confition","reg_success_message":"\\u0412\\u0430\\u0448 \\u0440\\u0435\\u0433\\u0438\\u0441\\u0442\\u0440\\u0430\\u0446\\u0438\\u043e\\u043d\\u043d\\u044b\\u0439 \\u0441\\u0447\\u0435\\u0442 \\u0443\\u0434\\u0430\\u0447\\u043d\\u043e\\u0439. \\u041f\\u0438\\u0441\\u044c\\u043c\\u043e \\u0431\\u044b\\u043b\\u043e \\u043e\\u0442\\u043f\\u0440\\u0430\\u0432\\u043b\\u0435\\u043d\\u043e \\u043f\\u043e \\u044d\\u043b\\u0435\\u043a\\u0442\\u0440\\u043e\\u043d\\u043d\\u043e\\u0439 \\u043f\\u043e\\u0447\\u0442\\u0435. \\u041f\\u043e\\u0436\\u0430\\u043b\\u0443\\u0439\\u0441\\u0442\\u0430, \\u0441\\u043b\\u0435\\u0434\\u0443\\u0439\\u0442\\u0435 \\u0442\\u0443 \\u044d\\u043b\\u0435\\u043a\\u0442\\u0440\\u043e\\u043d\\u043d\\u0443\\u044e \\u043f\\u043e\\u0447\\u0442\\u0443, \\u0447\\u0442\\u043e\\u0431\\u044b \\u0430\\u043a\\u0442\\u0438\\u0432\\u0438\\u0440\\u043e\\u0432\\u0430\\u0442\\u044c account.Thanks","limit":"\\u041f\\u0440\\u0435\\u0434\\u0435\\u043b","usage":"\\u041f\\u043e\\u043b\\u044c\\u0437\\u0430:","recover":"\\u0412\\u043e\\u0441\\u0441\\u0442\\u0430\\u043d\\u043e\\u0432\\u043b\\u0435\\u043d\\u0438\\u0435","oops":"\\u041d\\u0430\\u043c, \\u0441\\u0442\\u0440\\u0430\\u043d\\u0438\\u0446\\u0430 \\u043d\\u0435 \\u043d\\u0430\\u0439\\u0434\\u0435\\u043d\\u0430","share_this":"\\u041f\\u043e\\u0434\\u0435\\u043b\\u0438\\u0442\\u044c\\u0441\\u044f \\u044d\\u0442\\u043e\\u0439","status":"\\u0421\\u043e\\u0441\\u0442\\u043e\\u044f\\u043d\\u0438\\u0435","description":"\\u041e\\u043f\\u0438\\u0441\\u0430\\u043d\\u0438\\u0435","location_map":"\\u0420\\u0430\\u0441\\u043f\\u043e\\u043b\\u043e\\u0436\\u0435\\u043d\\u0438\\u0435 \\u043d\\u0430 \\u043a\\u0430\\u0440\\u0442\\u0435","image_gallery":"\\u041f\\u043e\\u0434\\u0434\\u0435\\u0440\\u0436\\u043a\\u0430","summary":"\\u0420\\u0435\\u0437\\u044e\\u043c\\u0435","overview":"\\u041e\\u0431\\u0449\\u0438\\u0439 \\u043e\\u0431\\u0437\\u043e\\u0440","address":"\\u0410\\u0434\\u0440\\u0435\\u0441","message":"\\u0421\\u043e\\u043e\\u0431\\u0449\\u0435\\u043d\\u0438\\u0435","username":"\\u043f\\u0430\\u044b\\u0432\\u043f\\u0430\\u0432\\u041f\\u043e\\u043b\\u044c\\u0437\\u043e\\u0432\\u0430\\u0442\\u0435\\u043b\\u044c","about_me":"\\u041e\\u0431\\u043e \\u043c\\u043d\\u0435","type_filters":"\\u0422\\u0438\\u043f \\u0424\\u0438\\u043b\\u044c\\u0442\\u0440\\u044b","email_subject":"\\u0422\\u0435\\u043c\\u0430 \\u044d\\u043b\\u0435\\u043a\\u0442\\u0440\\u043e\\u043d\\u043d\\u043e\\u0433\\u043e \\u043f\\u0438\\u0441\\u044c\\u043c\\u0430","all":"\\u0412\\u0441\\u0435","deleted":"Delete","contact_us":"\\u041e\\u0431\\u0440\\u0430\\u0442\\u043d\\u0430\\u044f \\u0441\\u0432\\u044f\\u0437\\u044c","active":"\\u0410\\u043a\\u0442\\u0438\\u0432\\u0435\\u043d","pending":"\\u0412 \\u043e\\u0436\\u0438\\u0434\\u0430\\u043d\\u0438\\u0438","reported":"\\u0421\\u043e\\u043e\\u0431\\u0449\\u0430\\u0435\\u0442\\u0441\\u044f","featured_video":"\\u041b\\u0443\\u0447\\u0448\\u0435\\u0435 \\u0432\\u0438\\u0434\\u0435\\u043e","embed_video_url":"Embeded \\u0421\\u0441\\u044b\\u043b\\u043a\\u0430 \\u043d\\u0430 \\u0432\\u0438\\u0434\\u0435\\u043e","profile_picture":"\\u041f\\u0440\\u043e\\u0444\\u0438\\u043b\\u044c \\u0444\\u043e\\u0442\\u043e","cars":"\\u041b\\u0435\\u0433\\u043a\\u043e\\u0432\\u044b\\u0435 \\u0430\\u0432\\u0442\\u043e\\u043c\\u043e\\u043c\\u0431\\u0438\\u043b\\u0438","car":"\\u0410\\u0432\\u0442\\u043e\\u0430\\u0432\\u0430\\u0440\\u0438\\u0438","manufacturers":"\\u041e\\u0431\\u0440\\u0430\\u0431\\u0430\\u0442\\u044b\\u0432\\u0430\\u044e\\u0449\\u0430\\u044f \\u043f\\u0440\\u043e\\u043c\\u044b\\u0448\\u043b\\u0435\\u043d\\u043d\\u043e\\u0441\\u0442\\u044c","car_type":"\\u0422\\u0438\\u043f \\u0430\\u0432\\u0442\\u043e\\u043c\\u043e\\u0431\\u0438\\u043b\\u044f","car_manufacturer":"\\u0410\\u0432\\u0442\\u043e\\u043c\\u043e\\u0431\\u0438\\u043b\\u044c \\u041f\\u0440\\u043e\\u0438\\u0437\\u0432\\u043e\\u0434\\u0438\\u0442\\u0435\\u043b\\u044c","car_model":"\\u041c\\u043e\\u0434\\u0435\\u043b\\u044c \\u0430\\u0432\\u0442\\u043e\\u043c\\u043e\\u0431\\u0438\\u043b\\u044f","year":"\\u0413\\u043e\\u0434","mileage":"\\u041f\\u0440\\u043e\\u0431\\u0435\\u0433","condition":"\\u0421\\u043e\\u0441\\u0442\\u043e\\u044f\\u043d\\u0438\\u0435","specifications":"\\u0425\\u0430\\u0440\\u0430\\u043a\\u0442\\u0435\\u0440\\u0438\\u0441\\u0442\\u0438\\u043a\\u0438","dimensions":"\\u0420\\u0430\\u0437\\u043c\\u0435\\u0440\\u044b","reg_no":"\\u0440\\u0435\\u0433\\u0438\\u0441\\u0442\\u0440\\u0430\\u0446\\u0438\\u043e\\u043d\\u043d\\u044b\\u0439 \\u2116 ______","engine_size":"\\u0420\\u0430\\u0431\\u043e\\u0447\\u0438\\u0439 \\u043e\\u0431\\u044a\\u0451\\u043c","engine_type":"\\u0422\\u0438\\u043f \\u0434\\u0432\\u0438\\u0433\\u0430\\u0442\\u0435\\u043b\\u044f","exterior_color":"\\u0426\\u0432\\u0435\\u0442 \\u043a\\u0443\\u0437\\u043e\\u0432\\u0430","interior_color":"''\\u0426\\u0432\\u0435\\u0442 \\u0438\\u043d\\u0442\\u0435\\u0440\\u044c\\u0435\\u0440\\u0430''","fuel_type":"\\u0422\\u0438\\u043f \\u0442\\u043e\\u043f\\u043b\\u0438\\u0432\\u0430","safety_rating":"\\u0423\\u0440\\u043e\\u0432\\u0435\\u043d\\u044c \\u0431\\u0435\\u0437\\u043e\\u043f\\u0430\\u0441\\u043d\\u043e\\u0441\\u0442\\u0438","standard_seating":"\\u0421\\u0442\\u0430\\u043d\\u0434\\u0430\\u0440\\u0442\\u043d\\u044b\\u0439 \\u0413\\u043e\\u0441\\u0442\\u0438\\u043d\\u044b\\u0439","steering_type":"\\u0422\\u0438\\u043f \\u0440\\u0443\\u043b\\u044f","height":"\\u0412\\u044b\\u0441\\u043e\\u0442\\u0430","width":"\\u0428\\u0438\\u0440\\u0438\\u043d\\u0430","length":"Length","wheelbase":"\\u0414\\u043b\\u0438\\u043d\\u0430","track_rear":"\\u041a\\u043e\\u043b\\u0435\\u044f \\u0437\\u0430\\u0434\\u043d\\u0438\\u0445 \\u043a\\u043e\\u043b\\u0435\\u0441","track_front":"\\u041a\\u043e\\u043b\\u0435\\u044f \\u043f\\u0435\\u0440\\u0435\\u0434\\u043d\\u044f\\u044f","ground_clearance":"\\u0414\\u043e\\u0440\\u043e\\u0436\\u043d\\u044b\\u0439 \\u043f\\u0440\\u043e\\u0441\\u0432\\u0435\\u0442","manufacturer":"\\u041f\\u0440\\u043e\\u0438\\u0437\\u0432\\u043e\\u0434\\u0438\\u0442\\u0435\\u043b\\u044c","body_type":"\\u0422\\u0438\\u043f \\u043a\\u0443\\u0437\\u043e\\u0432\\u0430","featured_cars":"\\u0418\\u0437\\u0431\\u0440\\u0430\\u043d\\u043d\\u044b\\u0435 \\u0410\\u0432\\u0442\\u043e\\u043c\\u043e\\u0431\\u0438\\u043b\\u0438","recent_cars":"\\u041f\\u043e\\u0441\\u043b\\u0435\\u0434\\u043d\\u0438\\u0435 \\u0410\\u0432\\u0442\\u043e\\u043c\\u043e\\u0431\\u0438\\u043b\\u0438","select_manufacturer":"\\u0412\\u044b\\u0431\\u0435\\u0440\\u0438\\u0442\\u0435 \\u043f\\u0440\\u043e\\u0438\\u0437\\u0432\\u043e\\u0434\\u0438\\u0442\\u0435\\u043b\\u044f","select_model":"\\u0412\\u044b\\u0431\\u0435\\u0440\\u0438\\u0442\\u0435 \\u043c\\u043e\\u0434\\u0435\\u043b\\u044c","price_range":"\\u0414\\u0438\\u0430\\u043f\\u0430\\u0437\\u043e\\u043d \\u0446\\u0435\\u043d","select_type":"\\u0412\\u044b\\u0431\\u0435\\u0440\\u0438\\u0442\\u0435 \\u0442\\u0438\\u043f","model_year":"\\u0413\\u043e\\u0434","filter_vehicles":"\\u0424\\u0438\\u043b\\u044c\\u0442\\u0440 \\u0430\\u0432\\u0442\\u043e\\u043c\\u043e\\u0431\\u0438\\u043b\\u044c","no_cars_found":"\\u041d\\u0435\\u0442 \\u0410\\u0432\\u0442\\u043e\\u043c\\u043e\\u0431\\u0438\\u043b\\u0438 \\u043d\\u0430\\u0439\\u0434\\u0435\\u043d\\u044b","dealers":"\\u0410\\u043a\\u0441\\u0435\\u0441\\u0441\\u0443\\u0430\\u0440\\u044b","all_dealers":"\\u0412\\u0441\\u0435 \\u0434\\u0438\\u043b\\u0435\\u0440\\u044b","top_dealers":"\\u041b\\u0443\\u0447\\u0448\\u0438\\u0435 \\u0434\\u0438\\u043b\\u0435\\u0440\\u044b","top_cars":"\\u041b\\u0443\\u0447\\u0448\\u0438\\u0435 \\u0430\\u0432\\u0442\\u043e\\u043c\\u043e\\u0431\\u0438\\u043b\\u0438","dealer_cars":"\\u0414\\u0438\\u043b\\u0435\\u0440\\u0441\\u043a\\u0438\\u0435 \\u0410\\u0432\\u0442\\u043e\\u043c\\u043e\\u0431\\u0438\\u043b\\u0438","dealer_location":"\\u0414\\u0438\\u043b\\u0435\\u0440 \\u0420\\u0430\\u0441\\u043f\\u043e\\u043b\\u043e\\u0436\\u0435\\u043d\\u0438\\u0435","dealer":"\\u0414\\u0438\\u043b\\u0435\\u0440","model":"\\u041c\\u043e\\u0434\\u0435\\u043b\\u044c:","zip_code":"ZIP-\\u043a\\u043e\\u0434","transmission":"\\u041f\\u0435\\u0440\\u0435\\u0434\\u0430\\u0447\\u0430","tags":"\\u0422\\u0430\\u0433","no_dealers_found":"\\u041d\\u0435\\u0442 \\u0414\\u0438\\u043b\\u0435\\u0440\\u044b \\u043d\\u0435 \\u043d\\u0430\\u0439\\u0434\\u0435\\u043d\\u044b","dealer_vehicles":"\\u0414\\u0438\\u043b\\u0435\\u0440\\u0441\\u043a\\u0438\\u0435 \\u0430\\u0432\\u0442\\u043e\\u043c\\u043e\\u0431\\u0438\\u043b\\u044c","result":"\\u0420\\u0435\\u0437\\u0443\\u043b\\u044c\\u0442\\u0430\\u0442","dealer_not_found":"\\u0414\\u0438\\u043b\\u0435\\u0440 \\u043d\\u0435 \\u043d\\u0430\\u0439\\u0434\\u0435\\u043d\\u044b","payment_finish_title":"\\u041e\\u043f\\u043b\\u0430\\u0442\\u0430 \\u041f\\u043e\\u043b\\u043d\\u044b\\u0439","payment_renew_title":"\\u041e\\u043f\\u043b\\u0430\\u0442\\u0430 \\u041f\\u043e\\u043b\\u043d\\u044b\\u0439","payment_finish_text":"\\u0412\\u0430\\u0448 \\u043f\\u043b\\u0430\\u0442\\u0435\\u0436 \\u0431\\u0443\\u0434\\u0435\\u0442 \\u0437\\u0430\\u0432\\u0435\\u0440\\u0448\\u0435\\u043d\\u0430. \\u041a\\u0430\\u043a \\u0442\\u043e\\u043b\\u044c\\u043a\\u043e \\u043c\\u044b \\u043f\\u043e\\u043b\\u0443\\u0447\\u0438\\u043b\\u0438 \\u043f\\u043e\\u0434\\u0442\\u0432\\u0435\\u0440\\u0436\\u0434\\u0435\\u043d\\u0438\\u0435 \\u043e\\u0442 Paypal \\u0412\\u0430\\u0448 \\u0430\\u043a\\u043a\\u0430\\u0443\\u043d\\u0442 \\u0431\\u0443\\u0434\\u0435\\u0442 \\u0430\\u043a\\u0442\\u0438\\u0432\\u0438\\u0440\\u043e\\u0432\\u0430\\u043d","payment_renew_text":"\\u0412\\u0430\\u0448 \\u043f\\u043b\\u0430\\u0442\\u0435\\u0436 \\u0431\\u0443\\u0434\\u0435\\u0442 \\u0437\\u0430\\u0432\\u0435\\u0440\\u0448\\u0435\\u043d\\u0430. \\u041a\\u0430\\u043a \\u0442\\u043e\\u043b\\u044c\\u043a\\u043e \\u043c\\u044b \\u043f\\u043e\\u043b\\u0443\\u0447\\u0438\\u043b\\u0438 \\u043f\\u043e\\u0434\\u0442\\u0432\\u0435\\u0440\\u0436\\u0434\\u0435\\u043d\\u0438\\u0435 \\u043e\\u0442 PayPal \\u0430\\u043a\\u043a\\u0430\\u0443\\u043d\\u0442 \\u0431\\u0443\\u0434\\u0435\\u0442 \\u043f\\u0440\\u043e\\u0434\\u043b\\u0435\\u043d","payment_cancel_title":"\\u041e\\u043f\\u043b\\u0430\\u0442\\u0430 \\u041e\\u0442\\u043c\\u0435\\u043d\\u0438\\u0442\\u044c","payment_cancel_text":"\\u0412\\u0430\\u0448 \\u043f\\u043b\\u0430\\u0442\\u0435\\u0436 \\u0431\\u0443\\u0434\\u0435\\u0442 \\u043e\\u0442\\u043c\\u0435\\u043d\\u0435\\u043d","feature_payment_finish":"\\u0412\\u0430\\u0448 \\u043f\\u043b\\u0430\\u0442\\u0435\\u0436 \\u0431\\u0443\\u0434\\u0435\\u0442 \\u0437\\u0430\\u0432\\u0435\\u0440\\u0448\\u0435\\u043d\\u0430. \\u041a\\u0430\\u043a \\u0442\\u043e\\u043b\\u044c\\u043a\\u043e \\u043c\\u044b \\u043f\\u043e\\u043b\\u0443\\u0447\\u0438\\u043c \\u043f\\u043e\\u0434\\u0442\\u0432\\u0435\\u0440\\u0436\\u0434\\u0435\\u043d\\u0438\\u0435 \\u043e\\u0442 PayPal, \\u0432\\u0430\\u0448\\u0435 \\u0438\\u043c\\u0443\\u0449\\u0435\\u0441\\u0442\\u0432\\u043e \\u0431\\u0443\\u0434\\u0435\\u0442 \\u043f\\u043e\\u043a\\u0430\\u0437\\u0430\\u043d.","feature_payment_cancel":"\\u0412\\u0430\\u0448 \\u043f\\u043b\\u0430\\u0442\\u0435\\u0436 \\u0431\\u0443\\u0434\\u0435\\u0442 \\u043e\\u0442\\u043c\\u0435\\u043d\\u0435\\u043d.","payment_notification":"\\u0412\\u044b \\u0441\\u043e\\u0431\\u0438\\u0440\\u0430\\u0435\\u0442\\u0435\\u0441\\u044c \\u0441\\u043e\\u0432\\u0435\\u0440\\u0448\\u0438\\u0442\\u044c \\u043f\\u043b\\u0430\\u0442\\u0435\\u0436. \\u041f\\u0438\\u0441\\u044c\\u043c\\u043e \\u0431\\u0443\\u0434\\u0435\\u0442 \\u043e\\u0442\\u043f\\u0440\\u0430\\u0432\\u043b\\u0435\\u043d\\u043e \\u043f\\u043e \\u044d\\u043b\\u0435\\u043a\\u0442\\u0440\\u043e\\u043d\\u043d\\u043e\\u0439 \\u043f\\u043e\\u0447\\u0442\\u0435. \\u0412\\u044b \\u043c\\u043e\\u0436\\u0435\\u0442\\u0435 \\u0432\\u0435\\u0440\\u043d\\u0443\\u0442\\u044c\\u0441\\u044f \\u043a \\u044d\\u0442\\u043e\\u0439 \\u0441\\u0442\\u0430\\u0434\\u0438\\u0438 \\u0432 \\u043b\\u044e\\u0431\\u043e\\u0435 \\u0432\\u0440\\u0435\\u043c\\u044f \\u043f\\u043e \\u0441\\u0441\\u044b\\u043b\\u043a\\u0435 \\u043d\\u0430 \\u044d\\u0442\\u043e\\u0439 \\u044d\\u043b\\u0435\\u043a\\u0442\\u0440\\u043e\\u043d\\u043d\\u043e\\u0439 \\u043f\\u043e\\u0447\\u0442\\u0435.","type_filers":"\\u0422\\u0438\\u043f \\u0424\\u0438\\u043b\\u044c\\u0442\\u0440\\u044b","view_listing":"\\u041f\\u0440\\u043e\\u0441\\u043c\\u043e\\u0442\\u0440\\u0435\\u0442\\u044c \\u0441\\u043f\\u0438\\u0441\\u043e\\u043a","car_added_successfully":"\\u0410\\u0432\\u0442\\u043e\\u043c\\u043e\\u0431\\u0438\\u043b\\u044c \\u0443\\u0441\\u043f\\u0435\\u0448\\u043d\\u043e \\u0434\\u043e\\u0431\\u0430\\u0432\\u043b\\u0435\\u043d","email_tracker":"E-mail Tracker","bulk_email":"\\u0421\\u043f\\u0430\\u043c","other_info":"\\u0414\\u0440\\u0443\\u0433\\u0438\\u0435 \\u0438\\u043d\\u0444\\u043e\\u0440\\u043c\\u0430\\u0446\\u0438\\u044f","basic_info":"\\u041e\\u0441\\u043d\\u043e\\u0432\\u043d\\u0430\\u044f \\u0438\\u043d\\u0444\\u043e\\u0440\\u043c\\u0430\\u0446\\u0438\\u044f","contact_subject":"\\u0421\\u0432\\u044f\\u0437\\u0430\\u0442\\u044c\\u0441\\u044f \\u0441 \\u0443\\u0447\\u0435\\u0442\\u043e\\u043c","dealer_panel":"\\u041f\\u0430\\u043d\\u0435\\u043b\\u044c \\u0414\\u0438\\u043b\\u0435\\u0440","list_your_car":"\\u041f\\u0435\\u0440\\u0435\\u0447\\u0438\\u0441\\u043b\\u0438\\u0442\\u0435 \\u0412\\u0430\\u0448 \\u0410\\u0432\\u0442\\u043e\\u043c\\u043e\\u0431\\u0438\\u043b\\u044c","share":"\\u0414\\u0435\\u043b\\u0438\\u0442\\u0435\\u0441\\u044c","search":"\\u041f\\u043e\\u0438\\u0441\\u043a","all_email_to_dealer":"\\u0412\\u0441\\u0435 E-mail \\u0414\\u043b\\u044f \\u0434\\u0438\\u043b\\u0435\\u0440\\u043e\\u043c","embed_preview":"\\u0412\\u0441\\u0442\\u0430\\u0432\\u0438\\u0442\\u044c \\u0438\\u0437\\u043e\\u0431\\u0440\\u0430\\u0436\\u0435\\u043d\\u0438\\u0435","car_brochure":"\\u0410\\u0432\\u0442\\u043e\\u043c\\u043e\\u0431\\u0438\\u043b\\u044c \\u0411\\u0440\\u043e\\u0448\\u044e\\u0440\\u0430","pages":"\\u0421\\u0442\\u0440\\u0430\\u043d\\u0438\\u0446\\u044b","post_not_found":"\\u041d\\u0435\\u0442 \\u0421\\u043e\\u043e\\u0431\\u0449\\u0435\\u043d\\u0438\\u0435 \\u043d\\u0435 \\u043d\\u0430\\u0439\\u0434\\u0435\\u043d\\u044b","blog":"\\u0411\\u043b\\u043e\\u0433","news":"\\u041d\\u043e\\u0432\\u043e\\u0441\\u0442\\u0438","article":"\\u0410\\u0440\\u0442\\u0438\\u043a\\u0443\\u043b","change_package":"Change Package","bi_payment_cancel_title":"Payment Cancelled","mileage_range":"\\u041f\\u0440\\u043e\\u0431\\u0435\\u0433 \\u0414\\u0438\\u0430\\u043f\\u0430\\u0437\\u043e\\u043d","select_transmission_type":"\\u0412\\u044b\\u0431\\u0435\\u0440\\u0438\\u0442\\u0435 \\u041a\\u043e\\u0440\\u043e\\u0431\\u043a\\u0443","select_car_condition":"\\u0412\\u044b\\u0431\\u0435\\u0440\\u0438\\u0442\\u0435 \\u0421\\u043e\\u0441\\u0442\\u043e\\u044f\\u043d\\u0438\\u0435","enter_above_text":"\\u0412\\u0432\\u0435\\u0434\\u0438\\u0442\\u0435 \\u0442\\u0435\\u043a\\u0441\\u0442."}', 1),
(5, 'Arabic-ar', 'Arabic', 'ar', '{"condition_new":"\\u062c\\u062f\\u064a\\u062f","condition_used":"\\u062a\\u0633\\u062a\\u0639\\u0645\\u0644","condition_pre_owned":"\\u0628\\u0627\\u0644\\u0636\\u0645\\u0627\\u0646","condition_recondition":"\\u0631\\u0645\\u0645","condition_other":"\\u0622\\u062e\\u0631","condition_sold":"\\u0628\\u0627\\u0639\\u062a","condition_available":"\\u0645\\u062a\\u0648\\u0641\\u0631","sign_in":"\\u062a\\u0633\\u062c\\u064a\\u0644 \\u0627\\u0644\\u062f\\u062e\\u0648\\u0644","sign_up":"\\u0633\\u062c\\u0644 \\u0627\\u0644\\u0627\\u0634\\u062a\\u0631\\u0627\\u0643","admin_panel":"\\u0644\\u0648\\u062d\\u0629 \\u0627\\u0644\\u0645\\u0634\\u0631\\u0641","logout":"\\u062a\\u0633\\u062c\\u064a\\u0644 \\u0627\\u0644\\u062e\\u0631\\u0648\\u062c","advanced_search":"\\u0628\\u062d\\u062b \\u0645\\u062a\\u0642\\u062f\\u0645","home":"\\u0627\\u0644\\u0635\\u0641\\u062d\\u0629 \\u0627\\u0644\\u0631\\u0626\\u064a\\u0633\\u064a\\u0629","about":"\\u0646\\u0628\\u0630\\u0629","contact":"\\u0627\\u0644\\u0627\\u062a\\u0635\\u0627\\u0644","plain_search":"\\u0628\\u062d\\u062b \\u0639\\u0627\\u062f\\u064a","ignore_this_section":"\\u062a\\u062c\\u0627\\u0647\\u0644 \\u0647\\u0630\\u0627 \\u0627\\u0644\\u0642\\u0633\\u0645","location_search":"\\u0627\\u0644\\u0628\\u062d\\u062b \\u0639\\u0646 \\u0645\\u0643\\u0627\\u0646","country":"\\u0627\\u0644\\u0628\\u0644\\u062f","state_province":"\\u0627\\u0644\\u0645\\u062d\\u0627\\u0641\\u0638\\u0629\\/\\u0627\\u0644\\u0645\\u0646\\u0637\\u0642\\u0629","city":"\\u0627\\u0644\\u0645\\u062f\\u064a\\u0646\\u0629","price":"\\u0633\\u0639\\u0631","phone":"\\u0627\\u0644\\u0647\\u0627\\u062a\\u0641","first_name":"\\u0627\\u0644\\u0627\\u0633\\u0645 \\u0627\\u0644\\u0623\\u0648\\u0644","last_name":"\\u0627\\u0633\\u0645 \\u0627\\u0644\\u0639\\u0627\\u0626\\u0644\\u0629","company_name":"\\u0627\\u0633\\u0645 \\u0627\\u0644\\u0634\\u0631\\u0643\\u0629","register":"\\u062a\\u0633\\u062c\\u064a\\u0644","type":"\\u0627\\u0644\\u0646\\u0648\\u0639","details":"\\u0627\\u0644\\u062a\\u0641\\u0627\\u0635\\u064a\\u0644","view_all":"\\u0639\\u0631\\u0636 \\u0627\\u0644\\u0643\\u0644","order_by":"\\u0627\\u0644\\u062a\\u0631\\u062a\\u064a\\u0628 \\u062d\\u0633\\u0628","none":"\\u0644\\u0627 \\u0634\\u064a\\u0621","terms_and_conditions":"\\u0634\\u0631\\u0648\\u0637 \\u0648Confition","reg_success_message":"\\u062a\\u0633\\u062c\\u064a\\u0644 \\u062d\\u0633\\u0627\\u0628\\u0643 \\u0646\\u0627\\u062c\\u062d\\u0627. \\u062a\\u0645 \\u0625\\u0631\\u0633\\u0627\\u0644 \\u0631\\u0633\\u0627\\u0644\\u0629 \\u0625\\u0644\\u0643\\u062a\\u0631\\u0648\\u0646\\u064a\\u0629 \\u0625\\u0644\\u0649 \\u0627\\u0644\\u0628\\u0631\\u064a\\u062f \\u0627\\u0644\\u0625\\u0644\\u0643\\u062a\\u0631\\u0648\\u0646\\u064a \\u0627\\u0644\\u062e\\u0627\\u0635 \\u0628\\u0643. \\u064a\\u0631\\u062c\\u0649 \\u0627\\u062a\\u0628\\u0627\\u0639 \\u0623\\u0646 \\u0627\\u0644\\u0628\\u0631\\u064a\\u062f \\u0627\\u0644\\u0625\\u0644\\u0643\\u062a\\u0631\\u0648\\u0646\\u064a \\u0644\\u062a\\u0646\\u0634\\u064a\\u0637 account.Thanks \\u0627\\u0644\\u062e\\u0627\\u0635\\u0629 \\u0628\\u0643","limit":"\\u0627\\u0644\\u062d\\u062f","usage":"\\u0627\\u0633\\u062a\\u062e\\u062f\\u0627\\u0645","recover":"\\u064a\\u0633\\u062a\\u0631\\u062f","oops":"\\u0639\\u0641\\u0648\\u0627\\u060c \\u0644\\u0645 \\u064a\\u062a\\u0645 \\u0627\\u0644\\u0639\\u062b\\u0648\\u0631 \\u0639\\u0644\\u0649 \\u0627\\u0644\\u0635\\u0641\\u062d\\u0629","share_this":"\\u0634\\u0627\\u0631\\u0643 \\u0647\\u0630\\u0627","status":"\\u0627\\u0644\\u062d\\u0627\\u0644\\u0629","description":"\\u0627\\u0644\\u0628\\u064a\\u0627\\u0646","location_map":"\\u0627\\u0646\\u0642\\u0631 \\u0647\\u0646\\u0627 \\u0644\\u0644\\u0628\\u062f\\u0621 \\u0641\\u064a \\u0627\\u0644\\u062a\\u062b\\u0628\\u064a\\u062a.","image_gallery":"\\u0645\\u0639\\u0631\\u0636 \\u0627\\u0644\\u0635\\u0648\\u0631","summary":"\\u0627\\u0644\\u0645\\u0644\\u062e\\u0635","overview":"\\u0646\\u0638\\u0631\\u0629 \\u0639\\u0627\\u0645\\u0629","address":"\\u0627\\u0644\\u0639\\u0646\\u0648\\u0627\\u0646","message":"\\u0627\\u0644\\u0631\\u0633\\u0627\\u0644\\u0629","username":"\\u0645\\u0633\\u062a\\u062e\\u062f\\u0645","about_me":"\\u0645\\u0639\\u0644\\u0648\\u0645\\u0627\\u062a \\u0639\\u0646\\u064a","type_filters":"\\u0646\\u0648\\u0639 \\u0627\\u0644\\u0641\\u0644\\u0627\\u062a\\u0631","email_subject":"\\u0645\\u0648\\u0636\\u0648\\u0639 \\u0627\\u0644\\u0631\\u0633\\u0627\\u0644\\u0629","all":"\\u0643\\u0627\\u0641\\u0629 \\u0627\\u0644\\u0625\\u0635\\u062f\\u0627\\u0631\\u0627\\u062a","deleted":"\\u0645\\u062d\\u0630\\u0648\\u0641","contact_us":"\\u0627\\u062a\\u0635\\u0644 \\u0628\\u0646\\u0627","active":"\\u0646\\u0634\\u0637","pending":"\\u0645\\u0639\\u0644\\u0642","reported":"\\u0645\\u0646\\u0642\\u0648\\u0644","featured_video":"\\u0634\\u0627\\u0631\\u0643 \\u0627\\u0644\\u0641\\u064a\\u062f\\u064a\\u0648","embed_video_url":"\\u0645\\u0637\\u0639\\u0645 \\u0628 \\u0631\\u0627\\u0628\\u0637 \\u0627\\u0644\\u0641\\u064a\\u062f\\u064a\\u0648","profile_picture":"\\u0627\\u0644\\u0635\\u0648\\u0631\\u0629 \\u0627\\u0644\\u0634\\u062e\\u0635\\u064a\\u0629","cars":"\\u0627\\u0644\\u0633\\u064a\\u0627\\u0631\\u0627\\u062a","car":"\\u0633\\u064a\\u0627\\u0631\\u0629","manufacturers":"\\u0645\\u0635\\u0646\\u0651\\u0639\\u0648\\u0646","car_type":"\\u0646\\u0648\\u0639 \\u0627\\u0644\\u0633\\u064a\\u0627\\u0631\\u0629","car_manufacturer":"\\u0633\\u064a\\u0627\\u0631\\u0629 \\u0627\\u0644\\u0635\\u0627\\u0646\\u0639","car_model":"\\u0646\\u0648\\u0639 \\u0627\\u0644\\u0633\\u064a\\u0627\\u0631\\u0629","year":"\\u0627\\u0644\\u0633\\u0646\\u0629","mileage":"\\u0639\\u062f\\u062f \\u0627\\u0644\\u0623\\u0645\\u064a\\u0627\\u0644","condition":"\\u0627\\u0644\\u0634\\u0631\\u0637","specifications":"\\u0627\\u0644\\u062e\\u0635\\u0627\\u0626\\u0635","dimensions":"\\u0627\\u0644\\u0623\\u0628\\u0639\\u0627\\u062f","reg_no":"\\u062a\\u0633\\u062c\\u064a\\u0644 \\u0631\\u0642\\u0645","engine_size":"\\u062d\\u062c\\u0645 \\u0627\\u0644\\u0645\\u062d\\u0631\\u0643","engine_type":"\\u0646\\u0648\\u0639 \\u0627\\u0644\\u0645\\u062d\\u0631\\u0643","exterior_color":"\\u0627\\u0644\\u0644\\u0648\\u0646 \\u0627\\u0644\\u062e\\u0627\\u0631\\u062c\\u064a","interior_color":"\\u0627\\u0644\\u0644\\u0648\\u0646 \\u0627\\u0644\\u062f\\u0627\\u062e\\u0644\\u064a","fuel_type":"\\u0646\\u0648\\u0639 \\u0627\\u0644\\u0648\\u0642\\u0648\\u062f","safety_rating":"\\u0633\\u0644\\u0627\\u0645\\u0629 \\u0627\\u0644\\u062a\\u0635\\u0648\\u064a\\u062a","standard_seating":"\\u0627\\u0644\\u062c\\u0644\\u0648\\u0633 \\u0627\\u0644\\u0642\\u064a\\u0627\\u0633\\u064a\\u0629","steering_type":"\\u0646\\u0648\\u0639 \\u0627\\u0644\\u0642\\u064a\\u0627\\u062f\\u0629","height":"\\u0627\\u0644\\u0627\\u0631\\u062a\\u0641\\u0627\\u0639","width":"\\u0639\\u0631\\u0636","length":"\\u0627\\u0644\\u0637\\u0648\\u0644","wheelbase":"\\u0642\\u0627\\u0639\\u062f\\u0629 \\u0627\\u0644\\u0639\\u062c\\u0644\\u0627\\u062a","track_rear":"\\u0627\\u0644\\u0645\\u0633\\u0627\\u0631 \\u0627\\u0644\\u062e\\u0644\\u0641\\u064a","track_front":"\\u062c\\u0628\\u0647\\u0629 \\u0627\\u0644\\u0645\\u0633\\u0627\\u0631","ground_clearance":"\\u062a\\u0637\\u0647\\u064a\\u0631 \\u0627\\u0644\\u0623\\u0631\\u0636","manufacturer":"\\u062a\\u0635\\u0646\\u064a\\u0639","body_type":"\\u0646\\u0648\\u0639 \\u0627\\u0644\\u062c\\u0633\\u0645","featured_cars":"\\u0633\\u064a\\u0627\\u0631\\u0627\\u062a \\u0645\\u0645\\u064a\\u0632\\u0629","recent_cars":"\\u0633\\u064a\\u0627\\u0631\\u0627\\u062a \\u062d\\u062f\\u064a\\u062b\\u0629","select_manufacturer":"\\u0627\\u062e\\u062a\\u0631 \\u0627\\u0644\\u0635\\u0627\\u0646\\u0639","select_model":"\\u0627\\u062e\\u062a\\u0631 \\u0627\\u0644\\u0645\\u0648\\u062f\\u064a\\u0644","price_range":"\\u0627\\u0644\\u0646\\u0637\\u0627\\u0642 \\u0627\\u0644\\u0633\\u0639\\u0631\\u064a","select_type":"\\u0627\\u062e\\u062a\\u0627\\u0631\\u064a \\u0646\\u0645\\u0637\\u064b\\u0627","model_year":"\\u0633\\u0646\\u0629 \\u0627\\u0644\\u0625\\u0635\\u062f\\u0627\\u0631:","filter_vehicles":"\\u0645\\u0631\\u0634\\u062d \\u0627\\u0644\\u0645\\u0631\\u0643\\u0628\\u0627\\u062a","no_cars_found":"\\u0644\\u0627 \\u062a\\u0648\\u062c\\u062f \\u0633\\u064a\\u0627\\u0631\\u0627\\u062a","dealers":"\\u062a\\u062c\\u0627\\u0631","all_dealers":"\\u062c\\u0645\\u064a\\u0639 \\u062a\\u062c\\u0627\\u0631","top_dealers":"\\u0643\\u0628\\u0627\\u0631 \\u062a\\u062c\\u0627\\u0631","top_cars":"\\u0623\\u0639\\u0644\\u0649 \\u0633\\u064a\\u0627\\u0631\\u0627\\u062a","dealer_cars":"\\u062a\\u0627\\u062c\\u0631 \\u0633\\u064a\\u0627\\u0631\\u0627\\u062a","dealer_location":"\\u062a\\u0627\\u062c\\u0631 \\u0627\\u0644\\u0645\\u0648\\u0642\\u0639","dealer":"\\u062a\\u0627\\u062c\\u0631","model":"\\u0627\\u0644\\u0645\\u0648\\u062f\\u064a\\u0644","zip_code":"\\u0627\\u0644\\u0631\\u0645\\u0632 \\u0627\\u0644\\u0628\\u0631\\u064a\\u062f\\u064a","transmission":"\\u0646\\u0627\\u0642\\u0644 \\u0627\\u0644\\u062d\\u0631\\u0643\\u0629","tags":"\\u0639\\u0644\\u0627\\u0645\\u0627\\u062a","no_dealers_found":"\\u0644\\u0645 \\u064a\\u062a\\u0645 \\u0627\\u0644\\u0639\\u062b\\u0648\\u0631 \\u0639\\u0644\\u0649 \\u062a\\u062c\\u0627\\u0631","dealer_vehicles":"\\u062a\\u0627\\u062c\\u0631 \\u0633\\u064a\\u0627\\u0631\\u0627\\u062a","result":"\\u0627\\u0644\\u0646\\u062a\\u064a\\u062ckayfa haloka","dealer_not_found":"\\u0644\\u0645 \\u064a\\u062a\\u0645 \\u0627\\u0644\\u0639\\u062b\\u0648\\u0631 \\u0639\\u0644\\u0649 \\u062a\\u0627\\u062c\\u0631","payment_finish_title":"\\u0627\\u0644\\u062f\\u0641\\u0639 \\u0627\\u0644\\u0643\\u0627\\u0645\\u0644","payment_renew_title":"\\u0627\\u0644\\u062f\\u0641\\u0639 \\u0627\\u0644\\u0643\\u0627\\u0645\\u0644","payment_finish_text":"\\u0627\\u0644\\u062f\\u0641\\u0639 \\u0643\\u0627\\u0645\\u0644\\u0629. \\u0628\\u0623\\u0633\\u0631\\u0639 \\u0645\\u0627 \\u062a\\u0644\\u0642\\u064a \\u062a\\u0623\\u0643\\u064a\\u062f \\u0645\\u0646 \\u0628\\u0627\\u064a \\u0628\\u0627\\u0644 \\u0633\\u064a\\u062a\\u0645 \\u062a\\u0641\\u0639\\u064a\\u0644 \\u062d\\u0633\\u0627\\u0628\\u0643","payment_renew_text":"\\u0627\\u0644\\u062f\\u0641\\u0639 \\u0643\\u0627\\u0645\\u0644\\u0629. \\u0628\\u0623\\u0633\\u0631\\u0639 \\u0645\\u0627 \\u062a\\u0644\\u0642\\u064a \\u062a\\u0623\\u0643\\u064a\\u062f \\u0645\\u0646 \\u0628\\u0627\\u064a \\u0628\\u0627\\u0644 \\u0633\\u064a\\u062a\\u0645 \\u062a\\u062c\\u062f\\u064a\\u062f \\u062d\\u0633\\u0627\\u0628\\u0643","payment_cancel_title":"\\u062f\\u0641\\u0639 \\u0625\\u0644\\u063a\\u0627\\u0621","payment_cancel_text":"\\u062a\\u0645 \\u0625\\u0644\\u063a\\u0627\\u0621 \\u062f\\u0641\\u0639\\u0643","feature_payment_finish":"\\u0627\\u0644\\u062f\\u0641\\u0639 \\u0643\\u0627\\u0645\\u0644\\u0629. \\u062d\\u0627\\u0644\\u0645\\u0627 \\u0646\\u062d\\u0635\\u0644 \\u062a\\u0623\\u0643\\u064a\\u062f\\u0627 \\u0645\\u0646 \\u0628\\u0627\\u064a \\u0628\\u0627\\u0644\\u060c \\u0648\\u0633\\u0648\\u0641 \\u062a\\u0643\\u0648\\u0646 \\u0648\\u0627\\u0631\\u062f\\u0629 \\u0627\\u0644\\u0639\\u0642\\u0627\\u0631\\u0627\\u062a \\u0627\\u0644\\u062e\\u0627\\u0635\\u0629 \\u0628\\u0643.","feature_payment_cancel":"\\u062a\\u0645 \\u0625\\u0644\\u063a\\u0627\\u0621 \\u062f\\u0641\\u0639\\u062a\\u0643.","payment_notification":"\\u0623\\u0646\\u062a \\u0630\\u0627\\u0647\\u0628 \\u0644\\u062c\\u0639\\u0644 \\u0627\\u0644\\u062f\\u0641\\u0639. \\u064a\\u062a\\u0645 \\u0625\\u0631\\u0633\\u0627\\u0644 \\u0631\\u0633\\u0627\\u0644\\u0629 \\u0625\\u0644\\u0649 \\u0627\\u0644\\u0628\\u0631\\u064a\\u062f \\u0627\\u0644\\u0625\\u0644\\u0643\\u062a\\u0631\\u0648\\u0646\\u064a \\u0627\\u0644\\u062e\\u0627\\u0635 \\u0628\\u0643. \\u064a\\u0645\\u0643\\u0646\\u0643 \\u0627\\u0644\\u0639\\u0648\\u062f\\u0629 \\u0625\\u0644\\u0649 \\u0647\\u0630\\u0647 \\u0627\\u0644\\u062e\\u0637\\u0648\\u0629 \\u0641\\u064a \\u0623\\u064a \\u0648\\u0642\\u062a \\u0645\\u0646 \\u0648\\u0635\\u0644\\u0629 \\u0639\\u0644\\u0649 \\u0623\\u0646 \\u0627\\u0644\\u0628\\u0631\\u064a\\u062f \\u0627\\u0644\\u0625\\u0644\\u0643\\u062a\\u0631\\u0648\\u0646\\u064a.","type_filers":"\\u0646\\u0648\\u0639 \\u0627\\u0644\\u0641\\u0644\\u0627\\u062a\\u0631","view_listing":"\\u0639\\u0631\\u0636 \\u0642\\u0627\\u0626\\u0645\\u0629","car_added_successfully":"\\u0648\\u0627\\u0636\\u0627\\u0641 \\u0627\\u0644\\u0633\\u064a\\u0627\\u0631\\u0629 \\u0628\\u0646\\u062c\\u0627\\u062d","email_tracker":"\\u0627\\u0644\\u0628\\u0631\\u064a\\u062f \\u0627\\u0644\\u0625\\u0644\\u0643\\u062a\\u0631\\u0648\\u0646\\u064a \\u0627\\u0644\\u0645\\u0642\\u062a\\u0641\\u064a","bulk_email":"\\u0627\\u0644\\u0633\\u0627\\u0626\\u0628\\u0629 \\u0627\\u0644\\u0628\\u0631\\u064a\\u062f \\u0627\\u0644\\u0625\\u0644\\u0643\\u062a\\u0631\\u0648\\u0646\\u064a","other_info":"\\u0645\\u0639\\u0644\\u0648\\u0645\\u0627\\u062a \\u0623\\u062e\\u0631\\u0649","basic_info":"\\u0645\\u0639\\u0644\\u0648\\u0645\\u0627\\u062a \\u0623\\u0633\\u0627\\u0633\\u064a\\u0629","contact_subject":"\\u0627\\u0644\\u0627\\u062a\\u0635\\u0627\\u0644 \\u0627\\u0644\\u0645\\u0648\\u0636\\u0648\\u0639","dealer_panel":"\\u0644\\u0648\\u062d\\u0629 \\u062a\\u0627\\u062c\\u0631","list_your_car":"\\u0642\\u0627\\u0626\\u0645\\u0629 \\u0633\\u064a\\u0627\\u0631\\u062a\\u0643","share":"\\u0645\\u0634\\u0627\\u0631\\u0643\\u0629","search":"\\u0628\\u062d\\u062b","all_email_to_dealer":"\\u0643\\u0644 \\u0631\\u0633\\u0627\\u0644\\u0629 \\u0625\\u0644\\u0649 \\u0627\\u0644\\u062a\\u0627\\u062c\\u0631","embed_preview":"\\u062a\\u0636\\u0645\\u064a\\u0646 \\u0645\\u0639\\u0627\\u064a\\u0646\\u0629","car_brochure":"\\u0643\\u062a\\u064a\\u0628 \\u0627\\u0644\\u0633\\u064a\\u0627\\u0631\\u0629","pages":"\\u0635\\u0641\\u062d\\u0629","post_not_found":"\\u0644\\u0627 \\u064a\\u0648\\u062c\\u062f \\u0631\\u062f","blog":"\\u0645\\u062f\\u0648\\u0646\\u0629","news":"\\u0623\\u062e\\u0628\\u0627\\u0631","article":"\\u0645\\u0642\\u0627\\u0644\\u0629","change_package":"\\u062a\\u063a\\u064a\\u064a\\u0631 \\u062d\\u0632\\u0645\\u0629","bi_payment_cancel_title":"\\u062f\\u0641\\u0639 \\u0627\\u0644\\u063a\\u064a\\u062a","mileage_range":"\\u0627\\u0644\\u0645\\u062f\\u0649 \\u0627\\u0644\\u0623\\u0645\\u064a\\u0627\\u0644","select_transmission_type":"\\u062d\\u062f\\u062f \\u0627\\u0644\\u0625\\u0631\\u0633\\u0627\\u0644","select_car_condition":"\\u062d\\u062f\\u062f \\u0627\\u0644\\u0634\\u0631\\u0637","enter_above_text":"\\u0623\\u062f\\u062e\\u0644 \\u0627\\u0644\\u0646\\u0635 \\u0623\\u0639\\u0644\\u0627\\u0647"}', 1),
(6, 'Turkish-tr', 'Turkish', 'tr', '{"condition_new":"New","condition_used":"Used","condition_pre_owned":"Certified Pre Owned","condition_recondition":"Recondition","condition_other":"Other","condition_sold":"Sold","condition_available":"Available","sign_in":"Sign In","sign_up":"Sign Up","admin_panel":"Admin Panel","logout":"Logout","advanced_search":"Advanced Search","home":"Home","about":"About","contact":"Contact","plain_search":"Plain Search","ignore_this_section":"Ignore this section","location_search":"Location Search","country":"Country","state_province":"State\\/Province","city":"City","price":"Price","phone":"Phone","first_name":"First Name","last_name":"Last Name","company_name":"Company Name","register":"Register","type":"Type","details":"Details","view_all":"View All","order_by":"Order By","none":"None","terms_and_conditions":"Terms and Confition","reg_success_message":"Your account registration is successfull. An email was sent to your email. Please follow that email to activate your account.Thanks","limit":"Limit","usage":"Usage","recover":"Recover","oops":"Oops, page not found","share_this":"Share This","status":"Status","description":"Description","location_map":"Location Map","image_gallery":"Image Gallery","summary":"Summary","overview":"Overview","address":"Address","message":"Message","username":"Username","about_me":"About Me","type_filters":"Type Filters","email_subject":"Email Subject","all":"All","deleted":"Deleted","contact_us":"Contact Us","active":"Active","pending":"Pending","reported":"Reported","featured_video":"Featured Video","embed_video_url":"Embeded Video Url","profile_picture":"Profile Picture","cars":"Cars","car":"Car","manufacturers":"Manufacturers","car_type":"Car Type","car_manufacturer":"Car Manufacturer","car_model":"Car Model","year":"Year","mileage":"Mileage","condition":"Condition","specifications":"Specifications","dimensions":"Dimensions","reg_no":"Registration No.","engine_size":"Engine Size","engine_type":"Engine Type","exterior_color":"Exterior Color","interior_color":"Interior Color","fuel_type":"Fuel Type","safety_rating":"Safety Rating","standard_seating":"Standard Seating","steering_type":"Steering Type","height":"Height","width":"Width","length":"Length","wheelbase":"Wheelbase","track_rear":"Track Rear","track_front":"Track Front","ground_clearance":"Ground Clearance","manufacturer":"Manufacturer","body_type":"Body Type","featured_cars":"Featured Cars","recent_cars":"Recent Cars","select_manufacturer":"Select Manufacturer","select_model":"Select Model","price_range":"Price Range","select_type":"Select Type","model_year":"Model Year","filter_vehicles":"Filter Vehicles","no_cars_found":"No Cars Found","dealers":"Dealers","all_dealers":"All Dealers","top_dealers":"Top Dealers","top_cars":"Top Cars","dealer_cars":"Dealer Cars","dealer_location":"Dealer Location","dealer":"Dealer","model":"Model","zip_code":"Zip Code","transmission":"Transmission","tags":"Tags","no_dealers_found":"No Dealers Found","dealer_vehicles":"Dealer Vehicles","result":"Result","dealer_not_found":"Dealer not Found","payment_finish_title":"Payment Complete","payment_renew_title":"Payment Complete","payment_finish_text":"Your payment is complete. As soon as we recieved confirmation from paypal your account will be activated","payment_renew_text":"Your payment is complete. As soon as we recieved confirmation from paypal your account will be renewed","payment_cancel_title":"Payment Cancel","payment_cancel_text":"Your payment is canceled","feature_payment_finish":"Your payment is complete. As soon as we recieve confirmation from paypal, your estate will be featured.","feature_payment_cancel":"Your payment is canceled.","payment_notification":"You are going to make an payment. A email is sent to your email. You can back to this step anytime from the link on that email.","type_filers":"Type Filters","view_listing":"View Listing","car_added_successfully":"Car Added Successfully","email_tracker":"Email Tracker","bulk_email":"Bulk Email","other_info":"Other Info","basic_info":"Basic Info","contact_subject":"Contact Subject","dealer_panel":"Dealer Panel","list_your_car":"List Your Car","share":"Share","search":"Search","all_email_to_dealer":"All Email To Dealer","embed_preview":"Embed Preview","car_brochure":"Car Brochure","pages":"Pages","post_not_found":"No Post Found","blog":"Blog","news":"News","article":"Article","change_package":"Change Package","bi_payment_cancel_title":"Payment Cancelled","mileage_range":"Kilometre Aral\\u0131\\u011f\\u0131","select_transmission_type":"Se\\u00e7 \\u0130letim","select_car_condition":"Se\\u00e7iniz Durum","enter_above_text":"\\u00dcst\\u00fc Metin Girin"}', 1),
(7, 'Dutch-nl', 'Dutch', 'nl', '{"condition_new":"New","condition_used":"Used","condition_pre_owned":"Certified Pre Owned","condition_recondition":"Recondition","condition_other":"Other","condition_sold":"Sold","condition_available":"Available","sign_in":"Sign In","sign_up":"Sign Up","admin_panel":"Admin Panel","logout":"Logout","advanced_search":"Advanced Search","home":"Home","about":"About","contact":"Contact","plain_search":"Plain Search","ignore_this_section":"Ignore this section","location_search":"Location Search","country":"Country","state_province":"State\\/Province","city":"City","price":"Price","phone":"Phone","first_name":"First Name","last_name":"Last Name","company_name":"Company Name","register":"Register","type":"Type","details":"Details","view_all":"View All","order_by":"Order By","none":"None","terms_and_conditions":"Terms and Confition","reg_success_message":"Your account registration is successfull. An email was sent to your email. Please follow that email to activate your account.Thanks","limit":"Limit","usage":"Usage","recover":"Recover","oops":"Oops, page not found","share_this":"Share This","status":"Status","description":"Description","location_map":"Location Map","image_gallery":"Image Gallery","summary":"Summary","overview":"Overview","address":"Address","message":"Message","username":"Username","about_me":"About Me","type_filters":"Type Filters","email_subject":"Email Subject","all":"All","deleted":"Deleted","contact_us":"Contact Us","active":"Active","pending":"Pending","reported":"Reported","featured_video":"Featured Video","embed_video_url":"Embeded Video Url","profile_picture":"Profile Picture","cars":"Cars","car":"Car","manufacturers":"Manufacturers","car_type":"Car Type","car_manufacturer":"Car Manufacturer","car_model":"Car Model","year":"Year","mileage":"Mileage","condition":"Condition","specifications":"Specifications","dimensions":"Dimensions","reg_no":"Registration No.","engine_size":"Engine Size","engine_type":"Engine Type","exterior_color":"Exterior Color","interior_color":"Interior Color","fuel_type":"Fuel Type","safety_rating":"Safety Rating","standard_seating":"Standard Seating","steering_type":"Steering Type","height":"Height","width":"Width","length":"Length","wheelbase":"Wheelbase","track_rear":"Track Rear","track_front":"Track Front","ground_clearance":"Ground Clearance","manufacturer":"Manufacturer","body_type":"Body Type","featured_cars":"Featured Cars","recent_cars":"Recent Cars","select_manufacturer":"Select Manufacturer","select_model":"Select Model","price_range":"Price Range","select_type":"Select Type","model_year":"Model Year","filter_vehicles":"Filter Vehicles","no_cars_found":"No Cars Found","dealers":"Dealers","all_dealers":"All Dealers","top_dealers":"Top Dealers","top_cars":"Top Cars","dealer_cars":"Dealer Cars","dealer_location":"Dealer Location","dealer":"Dealer","model":"Model","zip_code":"Zip Code","transmission":"Transmission","tags":"Tags","no_dealers_found":"No Dealers Found","dealer_vehicles":"Dealer Vehicles","result":"Result","dealer_not_found":"Dealer not Found","payment_finish_title":"Payment Complete","payment_renew_title":"Payment Complete","payment_finish_text":"Your payment is complete. As soon as we recieved confirmation from paypal your account will be activated","payment_renew_text":"Your payment is complete. As soon as we recieved confirmation from paypal your account will be renewed","payment_cancel_title":"Payment Cancel","payment_cancel_text":"Your payment is canceled","feature_payment_finish":"Your payment is complete. As soon as we recieve confirmation from paypal, your estate will be featured.","feature_payment_cancel":"Your payment is canceled.","payment_notification":"You are going to make an payment. A email is sent to your email. You can back to this step anytime from the link on that email.","type_filers":"Type Filters","view_listing":"View Listing","car_added_successfully":"Car Added Successfully","email_tracker":"Email Tracker","bulk_email":"Bulk Email","other_info":"Other Info","basic_info":"Basic Info","contact_subject":"Contact Subject","dealer_panel":"Dealer Panel","list_your_car":"List Your Car","share":"Share","search":"Search","all_email_to_dealer":"All Email To Dealer","embed_preview":"Embed Preview","car_brochure":"Car Brochure","pages":"Pages","post_not_found":"No Post Found","blog":"Blog","news":"News","article":"Article","change_package":"Change Package","bi_payment_cancel_title":"Payment Cancelled","mileage_range":"Kilometerstand Range","select_transmission_type":"Selecteer Transmissie","select_car_condition":"Selecteer Condition","enter_above_text":"Voer bovenstaande tekst"}', 1),
(8, 'French-fr', 'French', 'fr', '{"condition_new":"New","condition_used":"Used","condition_pre_owned":"Certified Pre Owned","condition_recondition":"Recondition","condition_other":"Other","condition_sold":"Sold","condition_available":"Available","sign_in":"Sign In","sign_up":"Sign Up","admin_panel":"Admin Panel","logout":"Logout","advanced_search":"Advanced Search","home":"Home","about":"About","contact":"Contact","plain_search":"Plain Search","ignore_this_section":"Ignore this section","location_search":"Location Search","country":"Country","state_province":"State\\/Province","city":"City","price":"Price","phone":"Phone","first_name":"First Name","last_name":"Last Name","company_name":"Company Name","register":"Register","type":"Type","details":"Details","view_all":"View All","order_by":"Order By","none":"None","terms_and_conditions":"Terms and Confition","reg_success_message":"Your account registration is successfull. An email was sent to your email. Please follow that email to activate your account.Thanks","limit":"Limit","usage":"Usage","recover":"Recover","oops":"Oops, page not found","share_this":"Share This","status":"Status","description":"Description","location_map":"Location Map","image_gallery":"Image Gallery","summary":"Summary","overview":"Overview","address":"Address","message":"Message","username":"Username","about_me":"About Me","type_filters":"Type Filters","email_subject":"Email Subject","all":"All","deleted":"Deleted","contact_us":"Contact Us","active":"Active","pending":"Pending","reported":"Reported","featured_video":"Featured Video","embed_video_url":"Embeded Video Url","profile_picture":"Profile Picture","cars":"Cars","car":"Car","manufacturers":"Manufacturers","car_type":"Car Type","car_manufacturer":"Car Manufacturer","car_model":"Car Model","year":"Year","mileage":"Mileage","condition":"Condition","specifications":"Specifications","dimensions":"Dimensions","reg_no":"Registration No.","engine_size":"Engine Size","engine_type":"Engine Type","exterior_color":"Exterior Color","interior_color":"Interior Color","fuel_type":"Fuel Type","safety_rating":"Safety Rating","standard_seating":"Standard Seating","steering_type":"Steering Type","height":"Height","width":"Width","length":"Length","wheelbase":"Wheelbase","track_rear":"Track Rear","track_front":"Track Front","ground_clearance":"Ground Clearance","manufacturer":"Manufacturer","body_type":"Body Type","featured_cars":"Featured Cars","recent_cars":"Recent Cars","select_manufacturer":"Select Manufacturer","select_model":"Select Model","price_range":"Price Range","select_type":"Select Type","model_year":"Model Year","filter_vehicles":"Filter Vehicles","no_cars_found":"No Cars Found","dealers":"Dealers","all_dealers":"All Dealers","top_dealers":"Top Dealers","top_cars":"Top Cars","dealer_cars":"Dealer Cars","dealer_location":"Dealer Location","dealer":"Dealer","model":"Model","zip_code":"Zip Code","transmission":"Transmission","tags":"Tags","no_dealers_found":"No Dealers Found","dealer_vehicles":"Dealer Vehicles","result":"Result","dealer_not_found":"Dealer not Found","payment_finish_title":"Payment Complete","payment_renew_title":"Payment Complete","payment_finish_text":"Your payment is complete. As soon as we recieved confirmation from paypal your account will be activated","payment_renew_text":"Your payment is complete. As soon as we recieved confirmation from paypal your account will be renewed","payment_cancel_title":"Payment Cancel","payment_cancel_text":"Your payment is canceled","feature_payment_finish":"Your payment is complete. As soon as we recieve confirmation from paypal, your estate will be featured.","feature_payment_cancel":"Your payment is canceled.","payment_notification":"You are going to make an payment. A email is sent to your email. You can back to this step anytime from the link on that email.","type_filers":"Type Filters","view_listing":"View Listing","car_added_successfully":"Car Added Successfully","email_tracker":"Email Tracker","bulk_email":"Bulk Email","other_info":"Other Info","basic_info":"Basic Info","contact_subject":"Contact Subject","dealer_panel":"Dealer Panel","list_your_car":"List Your Car","share":"Share","search":"Search","all_email_to_dealer":"All Email To Dealer","embed_preview":"Embed Preview","car_brochure":"Car Brochure","pages":"Pages","post_not_found":"No Post Found","blog":"Blog","news":"News","article":"Article","change_package":"Change Package","bi_payment_cancel_title":"Payment Cancelled","mileage_range":"Gamme Kilom\\u00e9trage","select_transmission_type":"Choisissez Transmission","select_car_condition":"S\\u00e9lectionner condition","enter_above_text":"Entrez le texte du dessus"}', 1),
(9, 'Deutsch-de', 'Deutsch', 'de', '{"condition_new":"Neu","condition_used":"Gebraucht","condition_pre_owned":"Certified Pre Owned","condition_recondition":"Holen","condition_other":"Sonstiges","condition_sold":"Verkauft","condition_available":"Verf\\u00fcgbar","sign_in":"Anmelden","sign_up":"Anmelden","admin_panel":"Admin Panel","logout":"Abmelden","advanced_search":"Erweiterte Suche","home":"Startseite","about":"\\u00dcber","contact":"Kontakt","plain_search":"Plain Suche","ignore_this_section":"Ignorieren Sie diesen Abschnitt","location_search":"Standort Suche","country":"Land","state_province":"Bundesland","city":"Ort","price":"Preis","phone":"Telefon","first_name":"Vorname","last_name":"Nachname","company_name":"Firmenname","register":"Registrieren","type":"Typ","details":"N\\u00e4here Informationen","view_all":"Alle ansehen","order_by":"Bestellung von","none":"Keine","terms_and_conditions":"Gesch\\u00e4fts confition","reg_success_message":"Ihr Konto Anmeldung ist erfolgreich. Eine E-Mail an Ihre E-Mail gesendet. Bitte folgen Sie diese E-Mail zu Ihrem account.Thanks aktivieren","limit":"Eingeschr\\u00e4nkte","usage":"Nutzung","recover":"Wiederherstellen","oops":"Seite nicht gefunden","share_this":"Bookmarken","status":"Status","description":"Beschreibung","location_map":"Lageplan","image_gallery":"Andere Ansichten","summary":"Zusammenfassung","overview":"\\u00dcberblick","address":"Adresse","message":"Nachricht","username":"Benutzername","about_me":"\\u00dcber mich","type_filters":"Art Filter","email_subject":"Betreffzeile der E-Mail","all":"Alle","deleted":"Gel\\u00f6scht","contact_us":"Kontaktieren Sie uns","active":"Aktiv","pending":"Ausstehend","reported":"Berichtete","featured_video":"Featured Video","embed_video_url":"Eingebetteten Video URL","profile_picture":"Profil Bild","cars":"Autos","car":"Auto","manufacturers":"Produktionsprozess","car_type":"Fahrzeugtyp","car_manufacturer":"Auto Hersteller","car_model":"Auto-Modell","year":"Jahr","mileage":"Kraftstoffverbrauch","condition":"Bedingung","specifications":"Technische Angaben","dimensions":"Abmessungen","reg_no":"Eintragungsnummer","engine_size":"Hubraum","engine_type":"Verbrennungskraftmaschine","exterior_color":"Farbe des \\u00c4u\\u00dferen","interior_color":"Interieurfarbe","fuel_type":"Kraftstofftyp:","safety_rating":"Klassifikationsgesellschaft","standard_seating":"Standardsitze","steering_type":"Lenk Typ","height":"H\\u00f6he","width":"Breite","length":"L\\u00e4nge","wheelbase":"Radstand","track_rear":"Spur hinten","track_front":"Spurweite vorn","ground_clearance":"Bodenfreiheit","manufacturer":"Hersteller","body_type":"K\\u00f6rperbau","featured_cars":"Besondere Autos","recent_cars":"Letzte Autos","select_manufacturer":"Hersteller ausw\\u00e4hlen","select_model":"Modell w\\u00e4hlen","price_range":"Preiskategorie","select_type":"Typ ausw\\u00e4hlen","model_year":"Modelljahr","filter_vehicles":"Filter Fahrzeuge","no_cars_found":"Keine Autos gefunden","dealers":"Dealer","all_dealers":"Alle H\\u00e4ndler","top_dealers":"Top-H\\u00e4ndler","dealer_cars":"H\\u00e4ndler Cars","dealer_location":"H\\u00e4ndlerstandort","dealer":"Dealer","model":"Modell","zip_code":"Postleitzahl","transmission":"\\u00dcbermittlung","tags":"Tags","no_dealers_found":"Keine H\\u00e4ndler gefunden","dealer_vehicles":"H\\u00e4ndler Fahrzeuge","result":"Ergebnis","dealer_not_found":"H\\u00e4ndler nicht gefunden","payment_finish_title":"Zahlung ist erfolgt","payment_renew_title":"Zahlung ist erfolgt","payment_finish_text":"Ihre Zahlung ist abgeschlossen. Sobald wir bekamen Best\\u00e4tigung von PayPal wird Ihr Konto aktiviert werden","payment_renew_text":"Ihre Zahlung ist abgeschlossen. Sobald wir bekamen Best\\u00e4tigung von PayPal wird Ihr Konto erneuert werden","payment_cancel_title":"Zahlung stornieren","payment_cancel_text":"Ihre Zahlung gel\\u00f6scht wird","feature_payment_finish":"Ihre Zahlung ist abgeschlossen. Sobald wir erhalten Best\\u00e4tigung von PayPal, wird Ihr Immobilien sehen sein.","feature_payment_cancel":"Ihre Zahlung gel\\u00f6scht wird.","payment_notification":"Sie sind dabei, eine Zahlung zu leisten. Eine E-Mail an Ihre E-Mail gesendet. Sie k\\u00f6nnen jederzeit zu diesem Schritt \\u00fcber den Link auf diese E-Mail zur\\u00fcck.","type_filers":"Art Filter","view_listing":"Eintr\\u00e4ge anzeigen","car_added_successfully":"Auto erfolgreich abgegeben","email_tracker":"E-Mail-Tracker","bulk_email":"Spam","other_info":"Weitere Info","basic_info":"Grundlegende Info","contact_subject":"Kontakt Thema","dealer_panel":"H\\u00e4ndler-Panel","list_your_car":"Listen Sie Ihren Auto","share":"Freigeben","search":"Suche","all_email_to_dealer":"Alle E-Mail, um H\\u00e4ndler","embed_preview":"Embed Vorschau","car_brochure":"Auto-Brosch\\u00fcre","pages":"Seiten","post_not_found":"Keinen Beitrag gefunden","blog":"Blog","news":"Neuigkeiten","article":"Artikel","top_cars":"Top Cars","mileage_range":"Laufleistungsbereich","select_transmission_type":"W\\u00e4hlen Transmission","select_car_condition":"Bedingung ausw\\u00e4hlen","enter_above_text":"Geben Sie obigen Text"}', 1),
(10, 'fr-fr-fr-fr', 'fr-fr', 'fr-fr', '{"condition_new":"NEW","condition_used":"Used","condition_pre_owned":"PC d''occasion certifi\\u00e9s","condition_recondition":"Remise en \\u00e9tat","condition_other":"Autre","condition_sold":"Vente","condition_available":"Available","sign_in":"Sign In","sign_up":"Sign Up","admin_panel":"Admin Panel","logout":"Logout","advanced_search":"Advanced Search","home":"Home","about":"About","contact":"Contact","plain_search":"Plain Search","ignore_this_section":"Ignore this section","location_search":"Location Search","country":"Country","state_province":"State\\/Province","city":"City","price":"Price","phone":"Phone","first_name":"First Name","last_name":"Last Name","company_name":"Company Name","register":"Enregistrer","type":"Type","details":"Details","view_all":"View All","order_by":"Order By","none":"None","terms_and_conditions":"Termes et Confition","reg_success_message":"Votre inscription en compte est r\\u00e9ussie. Un e-mail a \\u00e9t\\u00e9 envoy\\u00e9 \\u00e0 votre adresse email. il vous pla\\u00eet suivre ce courriel pour activer vos account.Thanks","limit":"Limit","usage":"Usage","recover":"Recover","oops":"Oops, page not found","share_this":"Share This","status":"Statut","description":"Description","location_map":"Carte de localisation","image_gallery":"Image Gallery","summary":"Summary","overview":"Aper\\u00e7u","address":"Adresse","message":"Message","username":"Nom utilisateur","about_me":"\\u00c0 propos de moi","type_filters":"Filtres","email_subject":"Email Subject","all":"ALL","deleted":"Deleted","contact_us":"Contactez-nous","active":"Active","pending":"Pending","reported":"Rapport\\u00e9","featured_video":"Featured Video","embed_video_url":"Embeded Video Url","profile_picture":"Profile Picture","cars":"Voitures","car":"Car","manufacturers":"Industrie manufacturi\\u00e8re","car_type":"Type de voiture","car_manufacturer":"Constructeur automobile","car_model":"Car Model","year":"Year","mileage":"Mileage","condition":"Condition","specifications":"Caract\\u00e9ristiques techniques","dimensions":"Dimensions","reg_no":"N\\u00b0 d''enregistrement","engine_size":"Taille du moteur","engine_type":"Type de moteur","exterior_color":"Couleur ext\\u00e9rieure","interior_color":"Interior Color","fuel_type":"Type de carburant","safety_rating":"Cote de s\\u00e9curit\\u00e9","standard_seating":"Standard Seating","steering_type":"Type de direction","height":"Height","width":"Width","length":"Longueur","wheelbase":"Empattement","track_rear":"Voie arri\\u00e8re","track_front":"Voie avant","ground_clearance":"Garde au sol","manufacturer":"Fabricant","body_type":"Type carrosserie","featured_cars":"Voitures recommand\\u00e9es","recent_cars":"Voitures r\\u00e9centes","select_manufacturer":"S\\u00e9lectionnez le fabricant","select_model":"S\\u00e9lectionnez le mod\\u00e8le","price_range":"Price Range","select_type":"Select Type","model_year":"Model Year","filter_vehicles":"Filter Vehicles","no_cars_found":"No Cars Found","dealers":"Dealers","all_dealers":"Tous les concessionnaires","top_dealers":"Haut de la page revendeurs","dealer_cars":"Garage Cars","dealer_location":"Emplacement de garage","dealer":"Concessionnaire","model":"Model","zip_code":"Zip Code","transmission":"Transmission","tags":"Mots cl\\u00e9s","no_dealers_found":"Aucun concessionnaires trouv\\u00e9s","dealer_vehicles":"V\\u00e9hicules de concessionnaire","result":"R\\u00e9sultat","dealer_not_found":"Dealer not Found","payment_finish_title":"Le paiement complet","payment_renew_title":"Le paiement complet","payment_finish_text":"Your payment is complete. As soon as we recieved confirmation from paypal your account will be activated","payment_renew_text":"Your payment is complete. As soon as we recieved confirmation from paypal your account will be renewed","payment_cancel_title":"Payment Cancel","payment_cancel_text":"Your payment is canceled","feature_payment_finish":"Your payment is complete. As soon as we recieve confirmation from paypal, your estate will be featured.","feature_payment_cancel":"Your payment is canceled.","payment_notification":"You are going to make an payment. A email is sent to your email. You can back to this step anytime from the link on that email.","type_filers":"Type Filters","view_listing":"View Listing","car_added_successfully":"Car Added Successfully","email_tracker":"Email Tracker","bulk_email":"Bulk Email","other_info":"Other Info","basic_info":"Basic Info","contact_subject":"Contacter sujet","dealer_panel":"Panneau garage","list_your_car":"La liste de votre voiture","share":"Share","search":"Search","all_email_to_dealer":"All Email To Dealer","embed_preview":"Embed Preview","car_brochure":"Car Brochure","pages":"Pages","post_not_found":"No Post Found","blog":"Blog","news":"Actualit\\u00e9s","article":"Article","top_cars":"Top voitures"}', 0),
(11, 'Svenska-Sv', 'Svenska', 'Sv', '{"condition_new":"Nytt","condition_used":"Anv\\u00e4nda","condition_pre_owned":"Certifierad Begagnad","condition_recondition":"Rekonditionerar","condition_other":"Annat","condition_sold":"S\\u00e5ld","condition_available":"Drifts\\u00e4kerhet","sign_in":"Logga in","sign_up":"Registrera","admin_panel":"Admin Panel","logout":"Logga ut","advanced_search":"Avancerad s\\u00f6kning","home":"Hem","about":"Om","contact":"Kontakt","plain_search":"Vanligt S\\u00f6k","ignore_this_section":"Ignorera detta avsnitt","location_search":"Plats S\\u00f6k","country":"Land","state_province":"Delstat\\/provins","city":"Ort","price":"Pris","phone":"Telefon","first_name":"F\\u00f6rnamn","last_name":"Efternamn","company_name":"F\\u00f6retagsnamn","register":"Registrera","type":"Typ","details":"Detaljer","view_all":"Visa Alla","order_by":"Sortera efter:","none":"Inga","terms_and_conditions":"Villkor och Confition","reg_success_message":"Ditt konto registrering \\u00e4r lyckad. Ett e-postmeddelande skickades till din e-post. F\\u00f6lj detta mail f\\u00f6r att aktivera dina account.Thanks","limit":"Limes","usage":"Anv\\u00e4ndning","recover":"\\u00c5tervinna","oops":"Oj, sidan hittades inte","share_this":"Dela denna app","status":"Status","description":"Beskrivning","location_map":"Location Map","image_gallery":"Andra vinklar","summary":"Slutsats","overview":"\\u00d6versikt","address":"Adress","message":"Meddelande","username":"Anv\\u00e4ndare","about_me":"\\ufeffOm mig","type_filters":"Typ Filter","email_subject":"E-post \\u00c4mne","all":"ALL","deleted":"Raderad","contact_us":"Kontakta oss","active":"Aktiv","pending":"V\\u00e4ntar","reported":"Rapporterad","featured_video":"Featured Video","embed_video_url":"Embeded Video Url","profile_picture":"Profilbild","cars":"Bilar","car":"Bil","manufacturers":"Tillverkningsindustri","car_type":"Biltyp","car_manufacturer":"Bil Tillverkare","car_model":"Bilmodell","year":"\\u00c5r","mileage":"K\\u00f6rstr\\u00e4cka","condition":"Standardfilter","specifications":"Specifikationer","dimensions":"M\\u00e5tt","reg_no":"Registreringsnummer","engine_size":"Slagvolym","engine_type":"Motortyp","exterior_color":"Exteri\\u00f6r F\\u00e4rg","interior_color":"Interior Color","fuel_type":"Br\\u00e4nsle","safety_rating":"S\\u00e4kerhets Betyg","standard_seating":"Standardsitt","steering_type":"Styr Type","height":"H\\u00f6jd","width":"Bredd","length":"L\\u00e4ngd","wheelbase":"Axelavst\\u00e5nd","track_rear":"Track Rear","track_front":"Sp\\u00e5r Front","ground_clearance":"Frig\\u00e5ngsh\\u00f6jd","manufacturer":"Tillverkningsindustri","body_type":"Kroppstyper","featured_cars":"Utvalda Cars","recent_cars":"Nyliga Bilar","select_manufacturer":"V\\u00e4lj tillverkare","select_model":"V\\u00e4lj modell","price_range":"Prisintervall","select_type":"V\\u00e4lj typ","model_year":"\\u00e5rsmodell.","filter_vehicles":"Filtrera Fordon","no_cars_found":"Inga bilar funna","dealers":"F\\u00f6rs\\u00e4ljare","all_dealers":"Alla \\u00e5terf\\u00f6rs\\u00e4ljare","top_dealers":"Top \\u00c5terf\\u00f6rs\\u00e4ljare","top_cars":"Top Cars","dealer_cars":"Dealer Cars","dealer_location":"Hitta \\u00c5terf\\u00f6rs\\u00e4ljare","dealer":"\\u00c5terf\\u00f6rs\\u00e4ljare","model":"Modell","zip_code":"postnummer","transmission":"Transmission","tags":"Taggar","no_dealers_found":"Inga \\u00c5terf\\u00f6rs\\u00e4ljare Hittade","dealer_vehicles":"F\\u00f6rs\\u00e4ljare Fordon","result":"Resultat","dealer_not_found":"Dealer inte hittas","payment_finish_title":"Betalning Komplett","payment_renew_title":"Betalning Komplett","payment_finish_text":"Din betalning \\u00e4r klar. S\\u00e5 fort vi f\\u00e5tt bekr\\u00e4ftelse fr\\u00e5n paypal kontot aktiveras","payment_renew_text":"Din betalning \\u00e4r klar. S\\u00e5 fort vi f\\u00e5tt bekr\\u00e4ftelse fr\\u00e5n paypal kontot kommer att f\\u00f6rnyas","payment_cancel_title":"Betalning Avbryt","payment_cancel_text":"Betalningen avbryts","feature_payment_finish":"Din betalning \\u00e4r klar. S\\u00e5 fort vi f\\u00e5r en bekr\\u00e4ftelse fr\\u00e5n paypal kommer din egendom att presenteras.","feature_payment_cancel":"Din betalning avbryts.","payment_notification":"Du kommer att g\\u00f6ra en betalning. Ett e-postmeddelande skickas till din e-post. Du kan tillbaka till det h\\u00e4r steget n\\u00e4r som helst fr\\u00e5n l\\u00e4nken p\\u00e5 denna e-post.","type_filers":"Typ Filter","view_listing":"View Listing","car_added_successfully":"Bil Inkom framg\\u00e5ngsrikt","email_tracker":"E Tracker","bulk_email":"Skr\\u00e4ppost","other_info":"Annan information","basic_info":"Grundl\\u00e4ggande Info","contact_subject":"Kontakta \\u00c4mne","dealer_panel":"F\\u00f6rs\\u00e4ljare Panel","list_your_car":"Lista din bil","share":"Dela","search":"S\\u00f6k","all_email_to_dealer":"All e-post till \\u00e5terf\\u00f6rs\\u00e4ljare","embed_preview":"B\\u00e4dda Preview","car_brochure":"Bil Brochure","pages":"Page","post_not_found":"Nr Post Funnet","blog":"Blogg","news":"Nyheter","article":"Artikel","change_package":"F\\u00f6r\\u00e4ndring av paket","bi_payment_cancel_title":"Betalning Inst\\u00e4lld"}', 0),
(13, 'finnish-fi', 'finnish', 'fi', '{"condition_new":"Uusi","condition_used":"K\\u00e4ytetyt","condition_pre_owned":"Sertifioitu Pre K\\u00e4ytetyt koneet","condition_recondition":"Kunnostaa","condition_other":"Muu","condition_sold":"Myiv\\u00e4t","condition_available":"Saatavuus","sign_in":"Kirjaudu","sign_up":"Rekister\\u00f6idy","admin_panel":"Admin Panel","logout":"Kirjaudu ulos","advanced_search":"Tarkennettu haku","home":"Etusivu","about":"Yleist\\u00e4","contact":"Yhteystiedot","plain_search":"Tavallinen haku","ignore_this_section":"Ohita t\\u00e4m\\u00e4 kohta","location_search":"Sijainti Haku","country":"Maa","state_province":"Osavaltio tai provinssi","city":"Kaupunki","price":"Hinta","phone":"Puhelin","first_name":"Etunimi","last_name":"Sukunimi","company_name":"Yrityksen nimi","register":"Rekister\\u00f6idy","type":"Tyyppi","details":"Tiedot","view_all":"N\\u00e4yt\\u00e4 kaikki","order_by":"J\\u00e4rjestys:","none":"Ei mit\\u00e4\\u00e4n","terms_and_conditions":"Ehdot ja Confition","reg_success_message":"Tilisi rekister\\u00f6inti on onnistunut. S\\u00e4hk\\u00f6posti on l\\u00e4hetetty s\\u00e4hk\\u00f6postiisi. Noudata ett\\u00e4 s\\u00e4hk\\u00f6postiosoite aktivoida account.Thanks","limit":"Raja","usage":"k\\u00e4ytt\\u00f6","recover":"Recover","oops":"Hups, sivua ei l\\u00f6ydy","share_this":"Jaa t\\u00e4m\\u00e4 sovellus","status":"Liite 11","description":"Kuvaus","location_map":"Sijainti kartalla","image_gallery":"Kuvagalleria","summary":"Tiivistelm\\u00e4","overview":"Yleiskatsaus","address":"Osoite","message":"Viesti","username":"K\\u00e4ytt\\u00e4j\\u00e4tunnus","about_me":"Tietoja minusta","type_filters":"Tyyppi Suodattimet","email_subject":"S\\u00e4hk\\u00f6postin aiherivi","all":"Kaikki","deleted":"poistettu","contact_us":"Contact","active":"Aktiivinen","pending":"Odottaa","reported":"Raportoitu","featured_video":"Featured Video","embed_video_url":"Piintynyt videon URL","profile_picture":"Profiilikuvaa","cars":"Autot","car":"Auto","manufacturers":"Tuotantotekniikka","car_type":"Auton tyyppi","car_manufacturer":"Autonvalmistaja","car_model":"Auton malli","year":"Vuosi","mileage":"Ajoneuvon polttoaineenkulutus","condition":"Olosuhteet","specifications":"Tekniset tiedot","dimensions":"Mittasuhteet","reg_no":"2 Rekister\\u00f6intinumero","engine_size":"Moottorin iskutilavuus","engine_type":"Moottorityyppi","exterior_color":"Ulkov\\u00e4ri","interior_color":"Sisusta","fuel_type":"Polttoaine","safety_rating":"Turvallisuus Arvostelu","standard_seating":"Vakio Istuin","steering_type":"OHJAUS","height":"Korkeus","width":"Leveys","length":"Pituus","wheelbase":"Akseliv\\u00e4li","track_rear":"Track Taka","track_front":"Raideleveys edess\\u00e4","ground_clearance":"Maavara","manufacturer":"Valmistaja","body_type":"Citymaasturi","featured_cars":"Ohjelmaan Autot","recent_cars":"Viimeaikaiset Cars","select_manufacturer":"Valitse Valmistaja","select_model":"Valitse malli","price_range":"Hintaluokka","select_type":"Valitse tyyppi","model_year":"vuosimalli.","filter_vehicles":"Suodatin Ajoneuvot","no_cars_found":"Ei autoja l\\u00f6ydy","dealers":"J\\u00e4lleenmyyj\\u00e4t","all_dealers":"Kaikki J\\u00e4lleenmyyj\\u00e4t","top_dealers":"Top J\\u00e4lleenmyyj\\u00e4t","top_cars":"Top Cars","dealer_cars":"Dealer Autot","dealer_location":"J\\u00e4lleenmyyj\\u00e4n sijainti","dealer":"J\\u00e4lleenmyyj\\u00e4","model":"Malli","zip_code":"Postinumero","transmission":"L\\u00e4hett\\u00e4minen","tags":"Tagit","no_dealers_found":"Ei J\\u00e4lleenmyyj\\u00e4t l\\u00f6ydy","dealer_vehicles":"Dealer Ajoneuvot","result":"Lopputulos","dealer_not_found":"J\\u00e4lleenmyyj\\u00e4 ei l\\u00f6ydy","payment_finish_title":"Maksu Complete","payment_renew_title":"Maksu Complete","payment_finish_text":"Sinun maksu on suoritettu. Heti kun saamme Vastaanotetut vahvistuksen paypal tilisi aktivoidaan","payment_renew_text":"Sinun maksu on suoritettu. Heti kun saamme Vastaanotetut vahvistuksen paypal tilillesi uusitaan","payment_cancel_title":"Maksu Peruuta","payment_cancel_text":"Maksu on peruutettu","feature_payment_finish":"Sinun maksu on suoritettu. Heti kun saamme vastaanottaa vahvistuksen paypal, teid\\u00e4n kiinteist\\u00f6 on esill\\u00e4.","feature_payment_cancel":"Maksu on peruutettu.","payment_notification":"Aiot tehd\\u00e4 maksun. S\\u00e4hk\\u00f6posti l\\u00e4hetet\\u00e4\\u00e4n s\\u00e4hk\\u00f6postiisi. Voit takaisin t\\u00e4h\\u00e4n vaiheeseen milloin siit\\u00e4 linkin ett\\u00e4 s\\u00e4hk\\u00f6posti.","type_filers":"Tyyppi Suodattimet","view_listing":"N\\u00e4yt\\u00e4 Listing","car_added_successfully":"Auton lis\\u00e4\\u00e4minen onnistui","email_tracker":"S\\u00e4hk\\u00f6posti Tracker","bulk_email":"Bulk Email","other_info":"Muu tieto","basic_info":"Perustiedot","contact_subject":"Yhteystiedot Aihe","dealer_panel":"J\\u00e4lleenmyyj\\u00e4 Panel","list_your_car":"Listaa Car","share":"Jakaa","search":"Etsi","all_email_to_dealer":"Kaikki S\\u00e4hk\\u00f6posti Liikkeen","embed_preview":"Upota Esikatselu","car_brochure":"Auton Esite","pages":"Page","post_not_found":"Ei Post l\\u00f6ydy","blog":"Blogi","news":"Uutiset","article":"Artikkeli","change_package":"Muuta Paketti","bi_payment_cancel_title":"Maksu peruutettu"}', 0),
(14, 'italiano-it', 'italiano', 'it', '{"condition_new":"Novit\\u00e0","condition_used":"Utilizzato","condition_pre_owned":"Certificato di propriet\\u00e0 di Pre","condition_recondition":"Ricondizionare","condition_other":"Altro","condition_sold":"Venduto","condition_available":"Disponibile","sign_in":"Login","sign_up":"Iscriviti","admin_panel":"Pannello di amministrazione","logout":"Esci","advanced_search":"Ricerca avanzata","home":"Home","about":"Info","contact":"Contatti","plain_search":"Ricerca semplice","ignore_this_section":"Ignorare questa sezione","location_search":"Location Search","country":"Paese","state_province":"Stato\\/Provincia","city":"Citt\\u00e0","price":"Prezzo","phone":"Telefono","first_name":"Nome","last_name":"Cognome","company_name":"Nome azienda","register":"Registrazione","type":"Tipo","details":"Dettagli","view_all":"Visualizza tutti","order_by":"Ordina per","none":"Nessuno","terms_and_conditions":"Termini e Confition","reg_success_message":"La registrazione dell''account \\u00e8 successo. Un''email \\u00e8 stata inviata al tuo indirizzo email. Si prega di seguire quell''email per attivare il tuo account.Grazie","limit":"Limite","usage":"Per\\u00a0","recover":"Guarire","oops":"Impossibile trovare la pagina","share_this":"Condividi questa App","status":"Stato","description":"Descrizione","location_map":"Mappa dei luoghi","image_gallery":"Viste alternative","summary":"Riepilogo","overview":"Panoramica","address":"Indirizzo","message":"Messaggio","username":"Nome utente","about_me":"Dettagli personali","type_filters":"Filtri di tipo","email_subject":"Oggetto del messaggio","all":"Tutte","deleted":"Soppresso","contact_us":"Contatti","active":"Attivo","pending":"In attesa","reported":"Indicati","featured_video":"VIDEO IN PRIMO PIANO","embed_video_url":"Url embeded Video","profile_picture":"Immagine profilo","cars":"Autovetture","car":"Autovettura","manufacturers":"Attivit\\u00e0 manifatturiera","car_type":"Tipo di auto","car_manufacturer":"Fornitore di automobile","car_model":"Modello di auto","year":"Anno","mileage":"Indennit\\u00e0 di trasferta","condition":"Condizione","specifications":"Specifiche","dimensions":"Dimensioni","reg_no":"Num.Di Iscriz.","engine_size":"Cilindrata","engine_type":"Tipo di motore","exterior_color":"Colore esterno","interior_color":"Colore interni","fuel_type":"Tipo di carburante","safety_rating":"Rating di sicurezza","standard_seating":"Posti a sedere standard","steering_type":"Sterzo tipo","height":"Altezza","width":"Larghezza","length":"Lunghezza","wheelbase":"Passo \\/ Wheelbase","track_rear":"Pista posteriore","track_front":"Pista anteriore","ground_clearance":"Distanza dal terreno:","manufacturer":"Produttore","body_type":"Fisico","featured_cars":"Vetrina auto","recent_cars":"Vetture recenti","select_manufacturer":"Seleziona produttore:","select_model":"Seleziona modello","price_range":"Economico","select_type":"Seleziona tipo","model_year":"anno del modello.","filter_vehicles":"Filtro veicoli","no_cars_found":"Nessuna auto trovata","dealers":"Dealer","all_dealers":"Tutti i concessionari","top_dealers":"Concessionari Top","top_cars":"Top Car","dealer_cars":"Concessionario auto","dealer_location":"Posizione di rivenditore","dealer":"Dealer","model":"Modello","zip_code":"CAP","transmission":"Trasmissione","tags":"Tag","no_dealers_found":"No commercianti trovati","dealer_vehicles":"Rivenditore veicoli","result":"Risultato","dealer_not_found":"Rivenditore non trovato","payment_finish_title":"Pagamento completo","payment_renew_title":"Pagamento completo","payment_finish_text":"Il pagamento \\u00e8 completo. Non appena abbiamo ricevuto conferma da paypal account verr\\u00e0 attivato","payment_renew_text":"Il pagamento \\u00e8 completo. Non appena abbiamo ricevuto conferma da paypal account sar\\u00e0 rinnovato","payment_cancel_title":"Pagamento Annulla","payment_cancel_text":"Il pagamento viene annullato","feature_payment_finish":"Il pagamento \\u00e8 completo. Non appena riceveremo conferma da paypal, sar\\u00e0 presenti la tenuta.","feature_payment_cancel":"Il pagamento viene annullato.","payment_notification":"Avete intenzione di effettuare un pagamento. Un''e-mail viene inviata alla tua email. \\u00c8 possibile effettuare questo passaggio in qualsiasi momento dal link su quell''email.","type_filers":"Filtri di tipo","view_listing":"Visualizzazione elenco","car_added_successfully":"Auto aggiunta con successo","email_tracker":"E-mail Tracker","bulk_email":"Spam","other_info":"Altre informazioni","basic_info":"Informazioni di base","contact_subject":"Contattare il soggetto","dealer_panel":"Pannello rivenditore","list_your_car":"Elencare la tua auto","share":"Condividi","search":"Cerca","all_email_to_dealer":"Tutte le Email al rivenditore","embed_preview":"Incorporare anteprima","car_brochure":"Brochure auto","pages":"Pagine","post_not_found":"No Post trovato","blog":"Blog","news":"Notizia","article":"Articolo","change_package":"Cambia pacchetto","bi_payment_cancel_title":"Pagamento annullato"}', 0),
(15, 'Polski-pl_PL', 'Polski', 'pl_PL', '{"condition_new":"New","condition_used":"Used","condition_pre_owned":"Certified Pre Owned","condition_recondition":"Recondition","condition_other":"Other","condition_sold":"Sold","condition_available":"Available","sign_in":"Sign In","sign_up":"Sign Up","admin_panel":"Admin Panel","logout":"Logout","advanced_search":"Advanced Search","home":"Home","about":"About","contact":"Contact","plain_search":"Plain Search","ignore_this_section":"Ignore this section","location_search":"Location Search","country":"Country","state_province":"State\\/Province","city":"City","price":"Price","phone":"Phone","first_name":"First Name","last_name":"Last Name","company_name":"Company Name","register":"Register","type":"Type","details":"Details","view_all":"View All","order_by":"Order By","none":"None","terms_and_conditions":"Terms and Confition","reg_success_message":"Your account registration is successfull. An email was sent to your email. Please follow that email to activate your account.Thanks","limit":"Limit","usage":"Usage","recover":"Recover","oops":"Oops, page not found","share_this":"Share This","status":"Status","description":"Description","location_map":"Location Map","image_gallery":"Image Gallery","summary":"Summary","overview":"Overview","address":"Address","message":"Message","username":"Username","about_me":"About Me","type_filters":"Type Filters","email_subject":"Email Subject","all":"All","deleted":"Deleted","contact_us":"Contact Us","active":"Active","pending":"Pending","reported":"Reported","featured_video":"Featured Video","embed_video_url":"Embeded Video Url","profile_picture":"Profile Picture","cars":"Cars","car":"Car","manufacturers":"Manufacturers","car_type":"Car Type","car_manufacturer":"Car Manufacturer","car_model":"Car Model","year":"Year","mileage":"Mileage","condition":"Condition","specifications":"Specifications","dimensions":"Dimensions","reg_no":"Registration No.","engine_size":"Engine Size","engine_type":"Engine Type","exterior_color":"Exterior Color","interior_color":"Interior Color","fuel_type":"Fuel Type","safety_rating":"Safety Rating","standard_seating":"Standard Seating","steering_type":"Steering Type","height":"Height","width":"Width","length":"Length","wheelbase":"Wheelbase","track_rear":"Track Rear","track_front":"Track Front","ground_clearance":"Ground Clearance","manufacturer":"Manufacturer","body_type":"Body Type","featured_cars":"Featured Cars","recent_cars":"Recent Cars","select_manufacturer":"Select Manufacturer","select_model":"Select Model","price_range":"Price Range","select_type":"Select Type","model_year":"Model Year","filter_vehicles":"Filter Vehicles","no_cars_found":"No Cars Found","dealers":"Dealers","all_dealers":"All Dealers","top_dealers":"Top Dealers","top_cars":"Top Cars","dealer_cars":"Dealer Cars","dealer_location":"Dealer Location","dealer":"Dealer","model":"Model","zip_code":"Zip Code","transmission":"Transmission","tags":"Tags","no_dealers_found":"No Dealers Found","dealer_vehicles":"Dealer Vehicles","result":"Result","dealer_not_found":"Dealer not Found","payment_finish_title":"Payment Complete","payment_renew_title":"Payment Complete","payment_finish_text":"Your payment is complete. As soon as we recieved confirmation from paypal your account will be activated","payment_renew_text":"Your payment is complete. As soon as we recieved confirmation from paypal your account will be renewed","payment_cancel_title":"Payment Cancel","payment_cancel_text":"Your payment is canceled","feature_payment_finish":"Your payment is complete. As soon as we recieve confirmation from paypal, your estate will be featured.","feature_payment_cancel":"Your payment is canceled.","payment_notification":"You are going to make an payment. A email is sent to your email. You can back to this step anytime from the link on that email.","type_filers":"Type Filters","view_listing":"View Listing","car_added_successfully":"Car Added Successfully","email_tracker":"Email Tracker","bulk_email":"Bulk Email","other_info":"Other Info","basic_info":"Basic Info","contact_subject":"Contact Subject","dealer_panel":"Dealer Panel","list_your_car":"List Your Car","share":"Share","search":"Search","all_email_to_dealer":"All Email To Dealer","embed_preview":"Embed Preview","car_brochure":"Car Brochure","pages":"Pages","post_not_found":"No Post Found","blog":"Blog","news":"News","article":"Article","change_package":"Change Package","bi_payment_cancel_title":"Payment Cancelled"}', 0),
(16, 'Português Brasileiro-pt-br', 'Português Brasileiro', 'pt-br', '{"condition_new":"Novo","condition_used":"Utilizado","condition_pre_owned":"Certified Pre-possu\\u00eddo","condition_recondition":"Recondicionamento","condition_other":"Outros","condition_sold":"Vendida!","condition_available":"Dispon\\u00edvel","sign_in":"Iniciar sess\\u00e3o","sign_up":"Registe-se","admin_panel":"Painel de administra\\u00e7\\u00e3o","logout":"Sair","advanced_search":"Pesquisa Avan\\u00e7ada","home":"In\\u00edcio","about":"Sobre","contact":"Contato","plain_search":"Pesquisa simples","ignore_this_section":"Ignorar esta se\\u00e7\\u00e3o","location_search":"Busca local","country":"Pa\\u00eds","state_province":"Estado\\/Prov\\u00edncia","city":"Cidade","price":"Pre\\u00e7o","phone":"Telefone","first_name":"Nome","last_name":"Sobrenome","company_name":"Nome da Empresa","register":"Registrar","type":"Tipo","details":"Detalhes","view_all":"Ver tudo","order_by":"Ordenar por:","none":"Nenhuma","terms_and_conditions":"Termos e Confition","reg_success_message":"Seu registro de conta \\u00e9 bem-sucedida. Um e-mail foi enviado para seu e-mail. Por favor, siga o e-mail para ativar sua conta.Obrigado","limit":"Limite","usage":"Utiliza\\u00e7\\u00e3o","recover":"Recuperar","oops":"P\\u00e1gina n\\u00e3o encontrada","share_this":"Partilhar esta aplica\\u00e7\\u00e3o","status":"Estado","description":"Descri\\u00e7\\u00e3o","location_map":"Mapa da Localiza\\u00e7\\u00e3o","image_gallery":"Galeria de Imagens","summary":"Resumo","overview":"Informa\\u00e7\\u00f5es gerais","address":"Endere\\u00e7o","message":"Mensagem","username":"Nome do usu\\u00e1rio","about_me":"sobre mim","type_filters":"Filtros do tipo","email_subject":"Assunto do e-mail","all":"Tudo","deleted":"Eliminado","contact_us":"Entre em contato conosco","active":"Ativo","pending":"Pendente","reported":"Informou","featured_video":"V\\u00eddeo em destaque","embed_video_url":"Url do embeded v\\u00eddeo","profile_picture":"A sua imagem de perfil","cars":"Ve\\u00edculos","car":"Carro","manufacturers":"Ind\\u00fastria manufatureira","car_type":"Tipo de carro","car_manufacturer":"Ind\\u00fastria automobil\\u00edstica","car_model":"Modelo do carro","year":"Ano","mileage":"Quilometragem","condition":"Condi\\u00e7\\u00e3o","specifications":"Especifica\\u00e7\\u00f5es","dimensions":"Dimens\\u00f5es","reg_no":"N\\u00famero de registo","engine_size":"Cilindrada","engine_type":"\\ufeffTipo de motor","exterior_color":"Cor exterior","interior_color":"Cor interior","fuel_type":"Tipo de Combust\\u00edvel","safety_rating":"Classifica\\u00e7\\u00e3o de seguran\\u00e7a","standard_seating":"Assento padr\\u00e3o","steering_type":"Tipo de dire\\u00e7\\u00e3o","height":"Altura","width":"Largura","length":"Comprimento","wheelbase":"Dist\\u00e2ncia entre os eixos","track_rear":"Trilha traseira","track_front":"Trilha dianteira","ground_clearance":"Dist\\u00e2ncia ao solo","manufacturer":"fabricante","body_type":"Tipo de corpo","featured_cars":"Carros Indicados:","recent_cars":"Carros recentes","select_manufacturer":"Selecione o fabricante","select_model":"Selecione o modelo","price_range":"Faixa de pre\\u00e7o","select_type":"Seleccionar o Tipo","model_year":"ano do modelo.","filter_vehicles":"Filtro de ve\\u00edculos","no_cars_found":"Carros n\\u00e3o encontrados","dealers":"Traficantes","all_dealers":"Todos os negociantes","top_dealers":"Principais revendedores","top_cars":"Top carros","dealer_cars":"Carros de revendedor","dealer_location":"Localiza\\u00e7\\u00e3o de revendedor","dealer":"Revendedor","model":"Modelo","zip_code":"C\\u00f3digo Postal (CEP)","transmission":"Transmiss\\u00e3o","tags":"Marca\\u00e7\\u00f5es","no_dealers_found":"Nenhum concession\\u00e1rios encontrados","dealer_vehicles":"Ve\\u00edculos de revendedor","result":"Resultado","dealer_not_found":"Traficante n\\u00e3o encontrado","payment_finish_title":"Pagamento completo","payment_renew_title":"Pagamento completo","payment_finish_text":"Seu pagamento \\u00e9 completo. Assim que recebemos a confirma\\u00e7\\u00e3o do PagSeguro, que sua conta ser\\u00e1 ativada","payment_renew_text":"Seu pagamento \\u00e9 completo. Assim que recebemos a confirma\\u00e7\\u00e3o do PagSeguro, que sua conta ser\\u00e1 renovada","payment_cancel_title":"Cancelar pagamento","payment_cancel_text":"Seu pagamento \\u00e9 cancelado","feature_payment_finish":"Seu pagamento \\u00e9 completo. Assim que recebermos a confirma\\u00e7\\u00e3o do PagSeguro, sua propriedade ser\\u00e1 apresentada.","feature_payment_cancel":"Seu pagamento \\u00e9 cancelado.","payment_notification":"Voc\\u00ea vai fazer um pagamento. Um e-mail \\u00e9 enviado para seu e-mail. Voc\\u00ea pode voltar para esta etapa a qualquer momento no link no e-mail.","type_filers":"Filtros do tipo","view_listing":"Ver listagem","car_added_successfully":"Carro adicionado com sucesso","email_tracker":"Email Tracker","bulk_email":"Spam","other_info":"Outras Informa\\u00e7\\u00f5es","basic_info":"Informa\\u00e7\\u00e3o b\\u00e1sica","contact_subject":"Assunto contato","dealer_panel":"Painel de revendedor","list_your_car":"Listar seu carro","share":"Partilhar","search":"Pesquisar","all_email_to_dealer":"Todos os E-mail para revendedor","embed_preview":"Incorporar Preview","car_brochure":"Brochura de carro","pages":"P\\u00e1ginas","post_not_found":"N\\u00e3o Post encontrado","blog":"Blog","news":"Not\\u00edcias","article":"Artigo","change_package":"Mudan\\u00e7a de pacote","bi_payment_cancel_title":"Pagamento cancelado"}', 0),
(17, 'Portugues-pt-pt-pt', 'Portugues-pt', 'pt-pt', '{"condition_new":"Novo","condition_used":"Utilizado","condition_pre_owned":"Certificado pr\\u00e9 propriedade","condition_recondition":"Recondicionar","condition_other":"Outros","condition_sold":"Vendida!","condition_available":"Dispon\\u00edvel","sign_in":"Iniciar sess\\u00e3o","sign_up":"Registe-se","admin_panel":"Painel de Administra\\u00e7\\u00e3o","logout":"Sair","advanced_search":"Pesquisa Avan\\u00e7ada","home":"In\\u00edcio","about":"Sobre","contact":"Contato","plain_search":"Pesquisa Plain","ignore_this_section":"Ignorar esta se\\u00e7\\u00e3o","location_search":"Localiza\\u00e7\\u00e3o Pesquisa","country":"Pa\\u00eds","state_province":"Estado\\/Prov\\u00edncia","city":"Cidade","price":"Pre\\u00e7o","phone":"Telefone","first_name":"Nome","last_name":"Sobrenome","company_name":"Nome da Empresa","register":"Registrar","type":"Tipo","details":"Detalhes","view_all":"Ver tudo","order_by":"Ordenar por:","none":"Nenhuma","terms_and_conditions":"Termos e Confition","reg_success_message":"O seu registo conta \\u00e9 bem sucedido. Um e-mail foi enviado para o seu e-mail. Por favor, siga o e-mail para ativar suas account.Thanks","limit":"Limite","usage":"Utiliza\\u00e7\\u00e3o","recover":"Recuperar","oops":"P\\u00e1gina n\\u00e3o encontrada","share_this":"Partilhar esta aplica\\u00e7\\u00e3o","status":"Estado","description":"Descri\\u00e7\\u00e3o","location_map":"Mapa da Localiza\\u00e7\\u00e3o","image_gallery":"Galeria de Imagens","summary":"Resumo","overview":"Informa\\u00e7\\u00f5es gerais","address":"Endere\\u00e7o","message":"Mensagem","username":"Nome do usu\\u00e1rio","about_me":"sobre mim","type_filters":"Tipo Filtros","email_subject":"Assunto do e-mail","all":"Tudo","deleted":"Exclu\\u00eddo","contact_us":"Entre em contato conosco","active":"Ativo","pending":"Pendente","reported":"Informou","featured_video":"V\\u00eddeo em Destaque","embed_video_url":"Embeded Video Url","profile_picture":"A sua imagem de perfil","cars":"Ve\\u00edculos","car":"Carro","manufacturers":"Ind\\u00fastria manufatureira","car_type":"Tipo de carro","car_manufacturer":"Ind\\u00fastria automobil\\u00edstica","car_model":"Modelo de carro","year":"Ano","mileage":"Quilometragem","condition":"Condi\\u00e7\\u00e3o","specifications":"Especifica\\u00e7\\u00f5es","dimensions":"Dimens\\u00f5es","reg_no":"N\\u00famero de registo","engine_size":"Cilindrada","engine_type":"\\ufeffTipo de motor","exterior_color":"Cor Exterior","interior_color":"Cor Interior","fuel_type":"Tipo de Combust\\u00edvel","safety_rating":"Classifica\\u00e7\\u00e3o de seguran\\u00e7a","standard_seating":"Estar Padr\\u00e3o","steering_type":"Tipo de dire\\u00e7\\u00e3o","height":"Altura","width":"Largura","length":"Comprimento","wheelbase":"Dist\\u00e2ncia entre os eixos","track_rear":"Via traseira","track_front":"Eixo frente","ground_clearance":"Dist\\u00e2ncia ao solo","manufacturer":"Fabricante","body_type":"Tipo f\\u00edsico","featured_cars":"Carros em destaque","recent_cars":"Carros recentes","select_manufacturer":"Selecionar fabricante","select_model":"Selecione o Modelo","price_range":"Faixa de Pre\\u00e7o","select_type":"Seleccionar o Tipo","model_year":"ano do modelo.","filter_vehicles":"Filtro Ve\\u00edculos","no_cars_found":"N\\u00e3o h\\u00e1 carros encontrados","dealers":"Dealers","all_dealers":"Todos os Negociantes","top_dealers":"Top Dealers","top_cars":"Melhores Carros","dealer_cars":"Negociante de Carros","dealer_location":"Revendedor Local","dealer":"Revendedor","model":"Modelo","zip_code":"C\\u00f3digo Postal (CEP)","transmission":"Transmiss\\u00e3o","tags":"Marca\\u00e7\\u00f5es","no_dealers_found":"N\\u00e3o Dealers Encontrado","dealer_vehicles":"Negociante Ve\\u00edculos","result":"Resultado","dealer_not_found":"Comerciantes n\\u00e3o encontrado","payment_finish_title":"Completar o pagamento","payment_renew_title":"Completar o pagamento","payment_finish_text":"Seu pagamento est\\u00e1 completo. Assim que recebeu a confirma\\u00e7\\u00e3o do paypal sua conta ser\\u00e1 ativada","payment_renew_text":"Seu pagamento est\\u00e1 completo. Assim que recebeu a confirma\\u00e7\\u00e3o do paypal a sua conta ser\\u00e1 renovada","payment_cancel_title":"Pagamento Cancelar","payment_cancel_text":"O seu pagamento \\u00e9 cancelado","feature_payment_finish":"Seu pagamento est\\u00e1 completo. Assim que receber a confirma\\u00e7\\u00e3o do paypal, sua propriedade ser\\u00e1 apresentado.","feature_payment_cancel":"Seu pagamento ser\\u00e1 cancelado.","payment_notification":"Voc\\u00ea vai fazer um pagamento. Um e-mail \\u00e9 enviado para o seu e-mail. Voc\\u00ea pode voltar para esta etapa a qualquer hora a partir do link em que e-mail.","type_filers":"Tipo Filtros","view_listing":"Veja detalhes","car_added_successfully":"Carro adicionado com sucesso","email_tracker":"Email Tracker","bulk_email":"Spam","other_info":"Outras Informa\\u00e7\\u00f5es","basic_info":"Informa\\u00e7\\u00e3o B\\u00e1sica","contact_subject":"Contato Assunto","dealer_panel":"Painel de Revendedor","list_your_car":"Anuncie seu carro","share":"Partilhar","search":"Pesquisar","all_email_to_dealer":"Todos os e-mail Para Revendedor","embed_preview":"Embed pr\\u00e9via","car_brochure":"Brochura Car","pages":"P\\u00e1ginas","post_not_found":"Nenhum post encontrado","blog":"Blog","news":"Not\\u00edcias","article":"Artigo","change_package":"Escolher Pacote","bi_payment_cancel_title":"Pagamento Cancelado"}', 0);

-- --------------------------------------------------------

--
-- Table structure for table `db_tabprefixlocations`
--

DROP TABLE IF EXISTS `db_tabprefixlocations`;
CREATE TABLE IF NOT EXISTS `db_tabprefixlocations` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `parent` int(11) NOT NULL,
  `name` char(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `type` char(10) NOT NULL,
  `status` int(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=77 ;

--
-- Dumping data for table `db_tabprefixlocations`
--

INSERT INTO `db_tabprefixlocations` (`id`, `parent`, `name`, `type`, `status`) VALUES
(1, 0, 'USA', 'country', 1),
(2, 0, ' Canada', 'country', 1),
(3, 0, ' UK', 'country', 1),
(4, 0, ' Mexico', 'country', 1),
(5, 1, 'Alabama', 'state', 1),
(6, 1, ' Alaska', 'state', 1),
(7, 1, ' Arizona', 'state', 1),
(8, 1, ' Arkansas', 'state', 1),
(9, 1, ' California', 'state', 1),
(10, 1, ' Colorado', 'state', 1),
(11, 1, ' Connecticut', 'state', 1),
(12, 1, ' Delaware', 'state', 1),
(13, 1, ' Florida', 'state', 1),
(14, 1, ' Georgia', 'state', 1),
(15, 1, ' Hawaii', 'state', 1),
(16, 1, ' Idaho', 'state', 1),
(17, 1, ' Illinois', 'state', 1),
(18, 1, ' Indiana', 'state', 1),
(19, 1, ' Iowa', 'state', 1),
(20, 1, ' Kansas', 'state', 1),
(21, 1, ' Kentucky', 'state', 1),
(22, 1, ' Louisiana', 'state', 1),
(23, 1, ' Maine', 'state', 1),
(24, 1, ' Maryland', 'state', 1),
(25, 1, ' Massachusetts', 'state', 1),
(26, 1, ' Michigan', 'state', 1),
(27, 1, ' Minnesota', 'state', 1),
(28, 1, ' Mississippi', 'state', 1),
(29, 1, ' Missouri', 'state', 1),
(30, 1, ' Montana', 'state', 1),
(31, 1, ' Nebraska', 'state', 1),
(32, 1, ' Nevada', 'state', 1),
(33, 1, ' New Hampshire', 'state', 1),
(34, 1, ' New Jersey', 'state', 1),
(35, 1, ' New Mexico', 'state', 1),
(36, 1, ' New York', 'state', 1),
(37, 1, ' North Carolina', 'state', 1),
(38, 1, ' North Dakota', 'state', 1),
(39, 1, ' Ohio', 'state', 1),
(40, 1, ' Oklahoma', 'state', 1),
(41, 1, ' Oregon', 'state', 1),
(42, 1, ' Pennsylvania', 'state', 1),
(43, 1, ' Rhode Island', 'state', 1),
(44, 1, ' South Carolina', 'state', 1),
(45, 1, ' South Dakota', 'state', 1),
(46, 1, ' Tennessee', 'state', 1),
(47, 1, ' Texas', 'state', 1),
(48, 1, ' Utah', 'state', 1),
(49, 1, ' Vermont', 'state', 1),
(50, 1, ' Virginia', 'state', 1),
(51, 1, ' Washington', 'state', 1),
(52, 1, ' West Virginia', 'state', 1),
(53, 1, ' Wisconsin', 'state', 1),
(54, 1, ' Wyoming', 'state', 1),
(55, 2, 'Alberta', 'state', 1),
(56, 2, ' British Columbia', 'state', 1),
(57, 2, ' Manitoba', 'state', 1),
(58, 2, ' New Brunswick', 'state', 1),
(59, 2, ' Newfoundland', 'state', 1),
(60, 2, ' Northwest Territories', 'state', 1),
(61, 2, ' Nova Scotia', 'state', 1),
(62, 2, ' Nunavut', 'state', 1),
(63, 2, ' Ontario', 'state', 1),
(64, 2, ' Prince Edward Island', 'state', 1),
(65, 2, ' Quebec', 'state', 1),
(66, 2, ' Saskatchewan', 'state', 1),
(67, 2, ' Yukon', 'state', 1),
(68, 9, 'Los Angeles', 'city', 1),
(69, 9, 'San Diego', 'city', 1),
(70, 9, 'Palm Sprigs', 'city', 1),
(71, 9, 'San Francisco', 'city', 1),
(72, 9, 'Long Beach', 'city', 1),
(73, 9, 'Pleasanton', 'city', 1),
(74, 3, 'Birmingham', 'state', 0),
(75, 14, 'Atlanta', 'city', 1),
(76, 9, 'San Farnando', 'city', 1);

-- --------------------------------------------------------

--
-- Table structure for table `db_tabprefixmedia`
--

DROP TABLE IF EXISTS `db_tabprefixmedia`;
CREATE TABLE IF NOT EXISTS `db_tabprefixmedia` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `media_name` char(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `media_url` mediumtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `create_time` datetime NOT NULL,
  `created_by` int(10) NOT NULL,
  `status` int(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `db_tabprefixoptions`
--

DROP TABLE IF EXISTS `db_tabprefixoptions`;
CREATE TABLE IF NOT EXISTS `db_tabprefixoptions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `key` char(255) NOT NULL,
  `values` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `status` int(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `db_tabprefixoptions`
--

INSERT INTO `db_tabprefixoptions` (`id`, `key`, `values`, `status`) VALUES
(1, 'paypal', '{"item_name":"Bookit Service Booking","email":"shimulcsedu@gmail.com","currency":"USD","sandbox":"On"}', 1),
(2, 'site_settings', '{"site_title":"Autocon","footer_text":"Autocon 2014, all rights reserved","site_logo":"http:\\/\\/localhost\\/autocon\\/assets\\/images\\/logo\\/autocon1.png","site_lang":"en","site_direction":"ltr","site_direction_rules":"required","default_layout":"1","ga_tracking_code":"","meta_description":"Post Car Dealership","key_words":"car dealer, auto, engine","crawl_after":"3"}', 1),
(3, 'active_theme', 'default', 1),
(4, 'positions', '[{"name":"content_top","status":1,"widgets":false},{"name":"content_bottom","status":1,"widgets":false},{"name":"right_bar_home","status":1,"widgets":["all_types","top_cars","top_dealers","facebook_like_box"]},{"name":"right_bar","status":1,"widgets":false},{"name":"right_bar_posts","status":1,"widgets":["all_types","facebook_like_box","top_dealers"]},{"name":"right_bar_post_detail","status":1,"widgets":["all_types","facebook_like_box","top_dealers"]},{"name":"footer_first_column","status":1,"widgets":["contact_text"]},{"name":"footer_second_column","status":1,"widgets":["follow_us"]},{"name":"footer_third_column","status":1,"widgets":["short_description"]},{"name":"right_bar_all_dealer","status":1,"widgets":["top_dealers","all_types","featured_cars"]},{"name":"right_bar_dealer_cars","status":1,"widgets":["all_types","top_cars"]},{"name":"right_bar_general","status":1,"widgets":["all_types","featured_cars","top_dealers"]},{"name":"side_bar_advance_search","status":1,"widgets":["plain_search_widget","all_types","featured_cars"]}]', 1),
(5, 'top_menu', '[{"id":"1","parent":0},{"id":"7","parent":0},{"id":"2","parent":"7"},{"id":"6","parent":"7"},{"id":"9","parent":"7"},{"id":"8","parent":"7"},{"id":"10","parent":"7"},{"id":"3","parent":"7"},{"id":"4","parent":0}]', 1),
(6, 'wordfilters', '{"bitch":"b***h","fuck":"f**k"}', 1),
(7, 'basic_settings', '{"publish_directly":"Yes","publish_directl_rules":"required","do_water_mark":"Yes","do_water_mark_rules":"required","water_mark_text":"@dbc","water_mark_text_rules":"required","enable_fb_login":"Yes","enable_fb_login_rules":"required","fb_app_id":"462520657185800","fb_app_id_rules":"required","fb_secret_key":"320d2893c6d89e135418d14cb510d89f","fb_secret_key_rules":"required","enable_gplus_login":"Yes","enable_gplus_login_rules":"required","gplus_app_id":"107878798713-inf6f7gfik9br4nc6iun54eccb8h7oqo.apps.googleusercontent.com","gplus_app_id_rules":"required","gplus_secret_key":"RgFEewdswHgjNb3zyODNWcz1","gplus_secret_key_rules":"required"}', 1),
(8, 'purchase_key', '', 1),
(9, 'item_id', '', 1),
(10, 'autocon_settings', '{"publish_directly":"Yes","publish_directly_rules":"required","system_currency":"USD","system_currency_type":"0","system_currency_rules":"required","enable_signup":"Yes","enable_signup_rules":"required","enable_pricing":"Yes","enable_pricing_rules":"required","hide_posts_if_expired":"No","hide_posts_if_expired_rules":"required","mileage_unit":"miles","show_admin_agent":"Yes","show_admin_agent_rules":"required","currency_placing":"before_with_no_gap","currency_placing_rules":"required","min_car_price":"0","max_car_price":"80000","enable_bank_transfer":"Yes","enable_bank_transfer_rules":"required","signup_payment_bank_instruction":"Put your bank transfer instructions here\\r\\n#account no\\r\\nNB: Please remember to add your email id with transfer code","signup_payment_bank_instruction_rules":"required","enable_feature_payment":"No","enable_feature_payment_rules":"required","feature_charge":"","feature_charge_rules":"","feature_day_limit":"","feature_day_limit_rules":"","featured_payment_bank_instruction":"","enable_fb_login":"No","enable_fb_login_rules":"required","fb_app_id":"","fb_app_id_rules":"","fb_secret_key":"","fb_secret_key_rules":""}', 1),
(11, 'paypal_settings', '{"enable_sandbox_mode":"Yes","enable_sandbox_mode_rules":"required","item_name":"Car Dealer Package","item_name_rules":"required","email":"seller@paypalsandbox.com","email_rules":"required","currency":"USD","currency_rules":"required","finish_url":"account\\/finish_url","finish_url_rules":"required","cancel_url":"account\\/cancel_url","cancel_url_rules":"required"}', 1),
(12, 'banner_settings', '{"menu_bg_color":"rgba(14,144,160,0.91)","menu_text_color":"#ffffff","search_bg":"car63.jpg","map_latitude":"34.0204989","map_longitude":"-118.4117325","map_zoom":"8"}', 1),
(13, 'webadmin_email', '{"contact_email":"shimulcsedu@gmail.com","webadmin_name":"Webadmin","webadmin_email":"support@webhelios.com"}', 1);

-- --------------------------------------------------------

--
-- Table structure for table `db_tabprefixpackages`
--

DROP TABLE IF EXISTS `db_tabprefixpackages`;
CREATE TABLE IF NOT EXISTS `db_tabprefixpackages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(300) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `description` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `price` decimal(11,2) NOT NULL,
  `max_post` int(11) NOT NULL,
  `expiration_time` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `db_tabprefixpackages`
--

INSERT INTO `db_tabprefixpackages` (`id`, `title`, `description`, `price`, `max_post`, `expiration_time`, `status`) VALUES
(1, 'Basic', 'Sample Package Description...', 5.00, 10, 30, 1),
(2, 'Normal', '', 10.00, 10, 60, 1),
(3, 'Free', 'Free Package for all user', 0.00, 50, 365, 1);

-- --------------------------------------------------------

--
-- Table structure for table `db_tabprefixpages`
--

DROP TABLE IF EXISTS `db_tabprefixpages`;
CREATE TABLE IF NOT EXISTS `db_tabprefixpages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `alias` char(50) NOT NULL,
  `show_in_menu` int(1) NOT NULL DEFAULT '1',
  `layout` int(1) NOT NULL,
  `content_from` char(10) NOT NULL DEFAULT 'Manual',
  `title` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `url` char(150) NOT NULL,
  `content` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `sidebar` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `seo_settings` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `create_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` int(1) NOT NULL DEFAULT '1',
  `editable` int(1) NOT NULL DEFAULT '1',
  `parent` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `db_tabprefixpages`
--

INSERT INTO `db_tabprefixpages` (`id`, `alias`, `show_in_menu`, `layout`, `content_from`, `title`, `url`, `content`, `sidebar`, `seo_settings`, `create_time`, `status`, `editable`, `parent`) VALUES
(1, 'DBC_home', 1, 1, 'Url', '[home]', '', '', '', '{"meta_description":"test meta lorem ispum","key_words":"meme,gag,fufu","crawl_after":"3"}', '2013-12-20 13:46:23', 1, 0, 0),
(2, 'DBC_search', 1, 1, 'Url', '[advanced_search]', 'show/search', '', '', '', '2013-12-20 13:46:41', 1, 0, 0),
(3, 'DBC_about', 1, 1, 'Manual', '[about]', '', '<p>sit amet</p>', '<p>doller</p>', '', '2013-12-20 13:47:00', 1, 0, 0),
(4, 'contact', 1, 1, 'Url', '[contact]', 'show/contact', '', '', '{"meta_description":"contact us page for memento, this meta will be read by search engine","key_words":"fun, contact, gag","crawl_after":"3"}', '2014-06-23 15:42:26', 1, 1, 0),
(5, 'DBC_advanced_search', 1, 0, 'Url', '[DBC_ADVANCED_SEARCH]', '', '', '', '{"meta_description":"","key_words":"","crawl_after":""}', '2014-07-20 09:01:25', 0, 1, 0),
(6, 'dealers', 1, 0, 'Url', '[dealers]', 'show/dealer', '', '', '{"meta_description":"","key_words":"","crawl_after":""}', '2014-07-21 14:52:04', 1, 1, 0),
(7, 'pages', 1, 0, 'Manual', '[pages]', 'show/page/pages', '', '', '{"meta_description":"","key_words":"","crawl_after":""}', '2014-09-15 10:26:14', 1, 1, 0),
(8, 'blog', 1, 2, 'Url', '[blog]', 'show/post/blog', '', '', '{"meta_description":"","key_words":"","crawl_after":""}', '2014-09-16 08:13:08', 1, 1, 0),
(9, 'news', 1, 2, 'Url', '[news]', 'show/post/news', '', '', '{"meta_description":"","key_words":"","crawl_after":""}', '2014-09-16 08:13:57', 1, 1, 0),
(10, 'article', 1, 2, 'Url', '[article]', 'show/post/article', '', '', '{"meta_description":"","key_words":"","crawl_after":""}', '2014-09-16 08:15:15', 1, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `db_tabprefixplugins`
--

DROP TABLE IF EXISTS `db_tabprefixplugins`;
CREATE TABLE IF NOT EXISTS `db_tabprefixplugins` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `plugin` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `status` int(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `db_tabprefixposts`
--

DROP TABLE IF EXISTS `db_tabprefixposts`;
CREATE TABLE IF NOT EXISTS `db_tabprefixposts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `unique_id` char(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `car_type` char(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `brand` int(11) NOT NULL,
  `model` int(11) NOT NULL,
  `year` int(4) NOT NULL,
  `condition` char(250) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `mileage` int(11) NOT NULL,
  `transmission` char(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `price` decimal(15,2) NOT NULL,
  `reg_no` char(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `engine_size` char(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `engine_type` char(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `exterior_color` char(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `interior_color` char(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `fuel_type` char(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `safety_rating` int(2) NOT NULL,
  `no_of_seats` int(11) NOT NULL,
  `steering_type` char(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `height` char(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `width` char(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `length` char(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `wheel_base` char(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `track_rear` char(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `track_front` char(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `ground_clearance` char(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `featured_img` char(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `gallery` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `facilities` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `created_by` int(11) NOT NULL,
  `create_time` int(11) NOT NULL,
  `publish_time` date NOT NULL,
  `status` int(1) NOT NULL,
  `featured` int(1) NOT NULL DEFAULT '0',
  `report` int(11) NOT NULL DEFAULT '0',
  `total_view` int(10) NOT NULL DEFAULT '0',
  `search_meta` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `unique_id` (`unique_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `db_tabprefixposts`
--

INSERT INTO `db_tabprefixposts` (`id`, `unique_id`, `car_type`, `brand`, `model`, `year`, `condition`, `mileage`, `transmission`, `price`, `reg_no`, `engine_size`, `engine_type`, `exterior_color`, `interior_color`, `fuel_type`, `safety_rating`, `no_of_seats`, `steering_type`, `height`, `width`, `length`, `wheel_base`, `track_rear`, `track_front`, `ground_clearance`, `featured_img`, `gallery`, `facilities`, `created_by`, `create_time`, `publish_time`, `status`, `featured`, `report`, `total_view`, `search_meta`) VALUES
(1, '541210edd6dd9', 'Coupe', 6, 59, 2012, 'condition_new', 1000, 'Automatic', 200000.00, '', '2.3L', 'V8', 'Blue', 'Grey', 'Gas', 5, 4, 'Power Steering', '55.6 in', '71.7 in', '180.4 in', '108.7 in', '23 in', '20 in', '12 in', 'url.jpg', '["BMW-M3-8.jpg","bmw-m3-coupe.jpg","670x377Image.jpg"]', '', 1, 0, '0000-00-00', 1, 0, 0, 3, 'Coupe  BMW G12 2012 Automatic New Gas  New BMW Car Aliquam vel egestas turpis. Proin sollicitudin imperdiet nisi ac \nrutrum. Sed imperdiet libero malesuada erat cursus eu pulvinar tellus \nrhoncus. Ut eget tellus neque, faucibus ornare odio. Fusce sagittis \nhendrerit mi a sollicitudin.\nLorem ipsum dolor sit amet, consectetur adipiscing elit. \nEtiam ullamcorper libero sed ante auctor vel gravida nunc placerat. \nSuspendisse molestie posuere sem, in viverra dolor venenatis sit amet. \nAliquam gravida nibh quis justo pulvinar luctus. Phasellus a malesuada \nmassa. Mauris elementum tempus nisi, vitae ullamcorper sem ultricies \nvitae. Nullam consectetur lacinia nisi, quis laoreet magna pulvinar in. \nClass aptent taciti sociosqu ad litora torquent per conubia nostra, per \ninceptos himenaeos. In hac habitasse platea dictumst. Cum sociis natoque\n penatibus et magnis dis parturient montes, nascetur ridiculus mus. Morbi\n eu sapien ac diam facilisis vehicula nec sit amet odio. Vivamus quis \ndui ac nulla molestie blandit eu in nunc. In justo erat, lacinia in \nvulputate non, tristique eu mi. Aliquam tristique dapibus tempor. \nVivamus malesuada tempor urna, in convallis massa lacinia sed. Phasellus\n gravida auctor vestibulum. Suspendisse potenti. In tincidunt felis \nbibendum nunc tempus sagittis. Praesent elit dolor, ultricies interdum \nporta sit amet, iaculis in neque. Nullam urna ante, tempus vel iaculis \nnec, rutrum sit amet nulla. Morbi vestibulum ante in turpis ultricies in\n tincidunt sapien iaculis. Aenean feugiat rhoncus arcu, at luctus libero\n blandit tempus. Vivamus rutrum tellus quis leo placerat eu adipiscing \npurus vehicula.<br>bmw, new, sports car'),
(2, '54121e6f58fe2', 'Sports Car', 4, 73, 2014, 'condition_new', 2000, 'Automatic', 250000.00, 'NE 781001', '5.2 L', 'V10', 'Red', 'Black', 'Gas', 5, 2, 'Power Steering', '49.0 in', '76.0 in', '174.6 in', '104.3 in', '23 in', '20 in', '12 in', 'abt-audi-r8.jpg', '["2012-audi-r8-collection-s_600x0w.jpg","Audi_R8_Facelift_(2013)3.jpg","car_photo_343885.jpg"]', '', 1, 0, '0000-00-00', 1, 1, 0, 3, 'Sports Car  Audi R8 2014 Automatic New Gas  Audi for Sale Aliquam vel egestas turpis. Proin sollicitudin imperdiet nisi ac \nrutrum. Sed imperdiet libero malesuada erat cursus eu pulvinar tellus \nrhoncus. Ut eget tellus neque, faucibus ornare odio. Fusce sagittis \nhendrerit mi a sollicitudin.\nLorem ipsum dolor sit amet, consectetur adipiscing elit. \nEtiam ullamcorper libero sed ante auctor vel gravida nunc placerat. \nSuspendisse molestie posuere sem, in viverra dolor venenatis sit amet. \nAliquam gravida nibh quis justo pulvinar luctus. Phasellus a malesuada \nmassa. Mauris elementum tempus nisi, vitae ullamcorper sem ultricies \nvitae. Nullam consectetur lacinia nisi, quis laoreet magna pulvinar in. \nClass aptent taciti sociosqu ad litora torquent per conubia nostra, per \ninceptos himenaeos. In hac habitasse platea dictumst. Cum sociis natoque\n penatibus et magnis dis parturient montes, nascetur ridiculus mus. Morbi\n eu sapien ac diam facilisis vehicula nec sit amet odio. Vivamus quis \ndui ac nulla molestie blandit eu in nunc. In justo erat, lacinia in \nvulputate non, tristique eu mi. Aliquam tristique dapibus tempor. \nVivamus malesuada tempor urna, in convallis massa lacinia sed. Phasellus\n gravida auctor vestibulum. Suspendisse potenti. In tincidunt felis \nbibendum nunc tempus sagittis. Praesent elit dolor, ultricies interdum \nporta sit amet, iaculis in neque. Nullam urna ante, tempus vel iaculis \nnec, rutrum sit amet nulla. Morbi vestibulum ante in turpis ultricies in\n tincidunt sapien iaculis. Aenean feugiat rhoncus arcu, at luctus libero\n blandit tempus. Vivamus rutrum tellus quis leo placerat eu adipiscing \npurus vehicula.<br>audi, sports car, speed'),
(3, '541225943fa62', 'Sedan', 48, 77, 2010, 'condition_used', 6000, 'Automatic', 50000.00, 'ZMR 2090', '1.8-liter', 'Hybrid Engine', 'White', 'Brown', 'Gas', 4, 4, 'Power Steering', '49.0 in', '76.0 in', '174.6 in', '104.3 in', '23 in', '20 in', '12 in', '05-Prius-Exteriorb-950x577.jpg', '["prius-url.jpg","01_2010_toyota_prius_realorrender_opte.jpg"]', '', 1, 0, '0000-00-00', 1, 0, 0, 5, 'Sedan  Toyota Prius 2010 Automatic Used Gas  Hybrid Car Aliquam vel egestas turpis. Proin sollicitudin imperdiet nisi ac \nrutrum. Sed imperdiet libero malesuada erat cursus eu pulvinar tellus \nrhoncus. Ut eget tellus neque, faucibus ornare odio. Fusce sagittis \nhendrerit mi a sollicitudin.\nLorem ipsum dolor sit amet, consectetur adipiscing elit. \nEtiam ullamcorper libero sed ante auctor vel gravida nunc placerat. \nSuspendisse molestie posuere sem, in viverra dolor venenatis sit amet. \nAliquam gravida nibh quis justo pulvinar luctus. Phasellus a malesuada \nmassa. Mauris elementum tempus nisi, vitae ullamcorper sem ultricies \nvitae. Nullam consectetur lacinia nisi, quis laoreet magna pulvinar in. \nClass aptent taciti sociosqu ad litora torquent per conubia nostra, per \ninceptos himenaeos. In hac habitasse platea dictumst. Cum sociis natoque\n penatibus et magnis dis parturient montes, nascetur ridiculus mus. Morbi\n eu sapien ac diam facilisis vehicula nec sit amet odio. Vivamus quis \ndui ac nulla molestie blandit eu in nunc. In justo erat, lacinia in \nvulputate non, tristique eu mi. Aliquam tristique dapibus tempor. \nVivamus malesuada tempor urna, in convallis massa lacinia sed. Phasellus\n gravida auctor vestibulum. Suspendisse potenti. In tincidunt felis \nbibendum nunc tempus sagittis. Praesent elit dolor, ultricies interdum \nporta sit amet, iaculis in neque. Nullam urna ante, tempus vel iaculis \nnec, rutrum sit amet nulla. Morbi vestibulum ante in turpis ultricies in\n tincidunt sapien iaculis. Aenean feugiat rhoncus arcu, at luctus libero\n blandit tempus. Vivamus rutrum tellus quis leo placerat eu adipiscing \npurus vehicula.<br>prius, toyota, low fuel, cost'),
(4, '54135d664bf6b', 'SUV', 16, 87, 2009, 'condition_new', 1000, 'Automatic', 30000.00, 'DDGt123', '3.0 L', 'V6', 'Black', 'Grey', 'Octane', 4, 6, 'Power', '67.9 in', '71.1 in', '174.7 in', '103.1 in', '50 in', '45in', '25 in', 'ford_escape.jpg', '[""]', '', 1, 0, '0000-00-00', 1, 1, 0, 2, 'SUV  Ford Escape 2009 Automatic New Octane  Ford SUV  Aliquam vel egestas turpis. Proin sollicitudin imperdiet nisi ac \nrutrum. Sed imperdiet libero malesuada erat cursus eu pulvinar tellus \nrhoncus. Ut eget tellus neque, faucibus ornare odio. Fusce sagittis \nhendrerit mi a sollicitudin.\nLorem ipsum dolor sit amet, consectetur adipiscing elit. \nEtiam ullamcorper libero sed ante auctor vel gravida nunc placerat. \nSuspendisse molestie posuere sem, in viverra dolor venenatis sit amet. \nAliquam gravida nibh quis justo pulvinar luctus. Phasellus a malesuada \nmassa. Mauris elementum tempus nisi, vitae ullamcorper sem ultricies \nvitae. Nullam consectetur lacinia nisi, quis laoreet magna pulvinar in. \nClass aptent taciti sociosqu ad litora torquent per conubia nostra, per \ninceptos himenaeos. In hac habitasse platea dictumst. Cum sociis natoque\n penatibus et magnis dis parturient montes, nascetur ridiculus mus. Morbi\n eu sapien ac diam facilisis vehicula nec sit amet odio. Vivamus quis \ndui ac nulla molestie blandit eu in nunc. In justo erat, lacinia in \nvulputate non, tristique eu mi. Aliquam tristique dapibus tempor. \nVivamus malesuada tempor urna, in convallis massa lacinia sed. Phasellus\n gravida auctor vestibulum. Suspendisse potenti. In tincidunt felis \nbibendum nunc tempus sagittis. Praesent elit dolor, ultricies interdum \nporta sit amet, iaculis in neque. Nullam urna ante, tempus vel iaculis \nnec, rutrum sit amet nulla. Morbi vestibulum ante in turpis ultricies in\n tincidunt sapien iaculis. Aenean feugiat rhoncus arcu, at luctus libero\n blandit tempus. Vivamus rutrum tellus quis leo placerat eu adipiscing \npurus vehicula.suv, ford, new, sale'),
(5, '54141ef3619e6', 'Luxury Car', 7, 108, 2013, 'condition_new', 2000, 'Automatic', 70000.00, 'Ex-71252', '2.5 L', 'Ecotech I4', 'Red', 'Brown', 'Gas', 5, 5, 'Power Steering', '55.9 in', '71.1 in', '182.8 in', '109.3 in', '23 in', '20 in', '12 in', '2013-cadillac-ats-026.jpg', '[""]', '', 1, 0, '0000-00-00', 1, 1, 0, 7, 'Luxury Car  Cadillac ATS 2013 Automatic New Gas  Cadillac Luxury Car with a very very long long title text Aliquam vel egestas turpis. Proin sollicitudin imperdiet nisi ac \r\nrutrum. Sed imperdiet libero malesuada erat cursus eu pulvinar tellus \r\nrhoncus. Ut eget tellus neque, faucibus ornare odio. Fusce sagittis \r\nhendrerit mi a sollicitudin.\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit. \r\nEtiam ullamcorper libero sed ante auctor vel gravida nunc placerat. \r\nSuspendisse molestie posuere sem, in viverra dolor venenatis sit amet. \r\nAliquam gravida nibh quis justo pulvinar luctus. Phasellus a malesuada \r\nmassa. Mauris elementum tempus nisi, vitae ullamcorper sem ultricies \r\nvitae. Nullam consectetur lacinia nisi, quis laoreet magna pulvinar in. \r\nClass aptent taciti sociosqu ad litora torquent per conubia nostra, per \r\ninceptos himenaeos. In hac habitasse platea dictumst. Cum sociis natoque\r\n penatibus et magnis dis parturient montes, nascetur ridiculus mus. Morbi\r\n eu sapien ac diam facilisis vehicula nec sit amet odio. Vivamus quis \r\ndui ac nulla molestie blandit eu in nunc. In justo erat, lacinia in \r\nvulputate non, tristique eu mi. Aliquam tristique dapibus tempor. \r\nVivamus malesuada tempor urna, in convallis massa lacinia sed. Phasellus\r\n gravida auctor vestibulum. Suspendisse potenti. In tincidunt felis \r\nbibendum nunc tempus sagittis. Praesent elit dolor, ultricies interdum \r\nporta sit amet, iaculis in neque. Nullam urna ante, tempus vel iaculis \r\nnec, rutrum sit amet nulla. Morbi vestibulum ante in turpis ultricies in\r\n tincidunt sapien iaculis. Aenean feugiat rhoncus arcu, at luctus libero\r\n blandit tempus. Vivamus rutrum tellus quis leo placerat eu adipiscing \r\npurus vehicula.<br>cadillac, luxury car, sedan'),
(6, '54142087d425b', 'Sports Car', 14, 114, 2011, 'condition_new', 200, 'Automatic', 400000.00, 'Not Given', '4.5L', 'V8', 'Red', 'Leather', 'Gas', 5, 2, 'Power Steering', '47.8 in', '76.3 in', '178.2 in', '104.3 in', '', '', '12 in', 'ferrari_458.jpg', '["ferrari_458.jpg","ferrari-458-italia_1527561i.jpg","2013-ferrari-458-italia-spider-interior.jpg"]', '', 1, 0, '0000-00-00', 1, 1, 0, 14, 'Sports Car  Ferrari 458 Italia 2011 Automatic New Gas  Ferrari For Sale Aliquam vel egestas turpis. Proin sollicitudin imperdiet nisi ac \nrutrum. Sed imperdiet libero malesuada erat cursus eu pulvinar tellus \nrhoncus. Ut eget tellus neque, faucibus ornare odio. Fusce sagittis \nhendrerit mi a sollicitudin.\nLorem ipsum dolor sit amet, consectetur adipiscing elit. \nEtiam ullamcorper libero sed ante auctor vel gravida nunc placerat. \nSuspendisse molestie posuere sem, in viverra dolor venenatis sit amet. \nAliquam gravida nibh quis justo pulvinar luctus. Phasellus a malesuada \nmassa. Mauris elementum tempus nisi, vitae ullamcorper sem ultricies \nvitae. Nullam consectetur lacinia nisi, quis laoreet magna pulvinar in. \nClass aptent taciti sociosqu ad litora torquent per conubia nostra, per \ninceptos himenaeos. In hac habitasse platea dictumst. Cum sociis natoque\n penatibus et magnis dis parturient montes, nascetur ridiculus mus. Morbi\n eu sapien ac diam facilisis vehicula nec sit amet odio. Vivamus quis \ndui ac nulla molestie blandit eu in nunc. In justo erat, lacinia in \nvulputate non, tristique eu mi. Aliquam tristique dapibus tempor. \nVivamus malesuada tempor urna, in convallis massa lacinia sed. Phasellus\n gravida auctor vestibulum. Suspendisse potenti. In tincidunt felis \nbibendum nunc tempus sagittis. Praesent elit dolor, ultricies interdum \nporta sit amet, iaculis in neque. Nullam urna ante, tempus vel iaculis \nnec, rutrum sit amet nulla. Morbi vestibulum ante in turpis ultricies in\n tincidunt sapien iaculis. Aenean feugiat rhoncus arcu, at luctus libero\n blandit tempus. Vivamus rutrum tellus quis leo placerat eu adipiscing \npurus vehicula.<br>ferrai, italy, luxury');

-- --------------------------------------------------------

--
-- Table structure for table `db_tabprefixpost_meta`
--

DROP TABLE IF EXISTS `db_tabprefixpost_meta`;
CREATE TABLE IF NOT EXISTS `db_tabprefixpost_meta` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `post_id` int(11) NOT NULL,
  `key` char(50) NOT NULL,
  `value` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `status` int(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=37 ;

--
-- Dumping data for table `db_tabprefixpost_meta`
--

INSERT INTO `db_tabprefixpost_meta` (`id`, `post_id`, `key`, `value`, `status`) VALUES
(1, 1, 'title', '{"en":"New BMW Car"}', 1),
(2, 1, 'description', '{"en":"Aliquam vel egestas turpis. Proin sollicitudin imperdiet nisi ac \\nrutrum. Sed imperdiet libero malesuada erat cursus eu pulvinar tellus \\nrhoncus. Ut eget tellus neque, faucibus ornare odio. Fusce sagittis \\nhendrerit mi a sollicitudin.\\nLorem ipsum dolor sit amet, consectetur adipiscing elit. \\nEtiam ullamcorper libero sed ante auctor vel gravida nunc placerat. \\nSuspendisse molestie posuere sem, in viverra dolor venenatis sit amet. \\nAliquam gravida nibh quis justo pulvinar luctus. Phasellus a malesuada \\nmassa. Mauris elementum tempus nisi, vitae ullamcorper sem ultricies \\nvitae. Nullam consectetur lacinia nisi, quis laoreet magna pulvinar in. \\nClass aptent taciti sociosqu ad litora torquent per conubia nostra, per \\ninceptos himenaeos. In hac habitasse platea dictumst. Cum sociis natoque\\n penatibus et magnis dis parturient montes, nascetur ridiculus mus. Morbi\\n eu sapien ac diam facilisis vehicula nec sit amet odio. Vivamus quis \\ndui ac nulla molestie blandit eu in nunc. In justo erat, lacinia in \\nvulputate non, tristique eu mi. Aliquam tristique dapibus tempor. \\nVivamus malesuada tempor urna, in convallis massa lacinia sed. Phasellus\\n gravida auctor vestibulum. Suspendisse potenti. In tincidunt felis \\nbibendum nunc tempus sagittis. Praesent elit dolor, ultricies interdum \\nporta sit amet, iaculis in neque. Nullam urna ante, tempus vel iaculis \\nnec, rutrum sit amet nulla. Morbi vestibulum ante in turpis ultricies in\\n tincidunt sapien iaculis. Aenean feugiat rhoncus arcu, at luctus libero\\n blandit tempus. Vivamus rutrum tellus quis leo placerat eu adipiscing \\npurus vehicula.<br>"}', 1),
(3, 1, 'tags', 'bmw, new, sports car', 1),
(4, 1, 'custom_values', '{"post_id":"3","key":"description","status":1,"value":"{\\"en\\":\\"Aliquam vel egestas turpis. Proin sollicitudin imperdiet nisi ac \\\\nrutrum. Sed imperdiet libero malesuada erat cursus eu pulvinar tellus \\\\nrhoncus. Ut eget tellus neque, faucibus ornare odio. Fusce sagittis \\\\nhendrerit mi a sollicitudin.\\\\nLorem ipsum dolor sit amet, consectetur adipiscing elit. \\\\nEtiam ullamcorper libero sed ante auctor vel gravida nunc placerat. \\\\nSuspendisse molestie posuere sem, in viverra dolor venenatis sit amet. \\\\nAliquam gravida nibh quis justo pulvinar luctus. Phasellus a malesuada \\\\nmassa. Mauris elementum tempus nisi, vitae ullamcorper sem ultricies \\\\nvitae. Nullam consectetur lacinia nisi, quis laoreet magna pulvinar in. \\\\nClass aptent taciti sociosqu ad litora torquent per conubia nostra, per \\\\ninceptos himenaeos. In hac habitasse platea dictumst. Cum sociis natoque\\\\n penatibus et magnis dis parturient montes, nascetur ridiculus mus. Morbi\\\\n eu sapien ac diam facilisis vehicula nec sit amet odio. Vivamus quis \\\\ndui ac nulla molestie blandit eu in nunc. In justo erat, lacinia in \\\\nvulputate non, tristique eu mi. Aliquam tristique dapibus tempor. \\\\nVivamus malesuada tempor urna, in convallis massa lacinia sed. Phasellus\\\\n gravida auctor vestibulum. Suspendisse potenti. In tincidunt felis \\\\nbibendum nunc tempus sagittis. Praesent elit dolor, ultricies interdum \\\\nporta sit amet, iaculis in neque. Nullam urna ante, tempus vel iaculis \\\\nnec, rutrum sit amet nulla. Morbi vestibulum ante in turpis ultricies in\\\\n tincidunt sapien iaculis. Aenean feugiat rhoncus arcu, at luctus libero\\\\n blandit tempus. Vivamus rutrum tellus quis leo placerat eu adipiscing \\\\npurus vehicula.<br>\\"}"}', 1),
(5, 1, 'video_url', 'http://www.youtube.com/watch?v=JgXnbgS_XBk', 1),
(6, 1, 'car_brochure', 'n/a', 1),
(7, 2, 'title', '{"en":"Audi for Sale"}', 1),
(8, 2, 'description', '{"en":"Aliquam vel egestas turpis. Proin sollicitudin imperdiet nisi ac \\nrutrum. Sed imperdiet libero malesuada erat cursus eu pulvinar tellus \\nrhoncus. Ut eget tellus neque, faucibus ornare odio. Fusce sagittis \\nhendrerit mi a sollicitudin.\\nLorem ipsum dolor sit amet, consectetur adipiscing elit. \\nEtiam ullamcorper libero sed ante auctor vel gravida nunc placerat. \\nSuspendisse molestie posuere sem, in viverra dolor venenatis sit amet. \\nAliquam gravida nibh quis justo pulvinar luctus. Phasellus a malesuada \\nmassa. Mauris elementum tempus nisi, vitae ullamcorper sem ultricies \\nvitae. Nullam consectetur lacinia nisi, quis laoreet magna pulvinar in. \\nClass aptent taciti sociosqu ad litora torquent per conubia nostra, per \\ninceptos himenaeos. In hac habitasse platea dictumst. Cum sociis natoque\\n penatibus et magnis dis parturient montes, nascetur ridiculus mus. Morbi\\n eu sapien ac diam facilisis vehicula nec sit amet odio. Vivamus quis \\ndui ac nulla molestie blandit eu in nunc. In justo erat, lacinia in \\nvulputate non, tristique eu mi. Aliquam tristique dapibus tempor. \\nVivamus malesuada tempor urna, in convallis massa lacinia sed. Phasellus\\n gravida auctor vestibulum. Suspendisse potenti. In tincidunt felis \\nbibendum nunc tempus sagittis. Praesent elit dolor, ultricies interdum \\nporta sit amet, iaculis in neque. Nullam urna ante, tempus vel iaculis \\nnec, rutrum sit amet nulla. Morbi vestibulum ante in turpis ultricies in\\n tincidunt sapien iaculis. Aenean feugiat rhoncus arcu, at luctus libero\\n blandit tempus. Vivamus rutrum tellus quis leo placerat eu adipiscing \\npurus vehicula.<br>"}', 1),
(9, 2, 'tags', 'audi, sports car, speed', 1),
(10, 2, 'custom_values', '{"post_id":"4","key":"description","status":1,"value":"{\\"en\\":\\"Aliquam vel egestas turpis. Proin sollicitudin imperdiet nisi ac \\\\nrutrum. Sed imperdiet libero malesuada erat cursus eu pulvinar tellus \\\\nrhoncus. Ut eget tellus neque, faucibus ornare odio. Fusce sagittis \\\\nhendrerit mi a sollicitudin.\\\\nLorem ipsum dolor sit amet, consectetur adipiscing elit. \\\\nEtiam ullamcorper libero sed ante auctor vel gravida nunc placerat. \\\\nSuspendisse molestie posuere sem, in viverra dolor venenatis sit amet. \\\\nAliquam gravida nibh quis justo pulvinar luctus. Phasellus a malesuada \\\\nmassa. Mauris elementum tempus nisi, vitae ullamcorper sem ultricies \\\\nvitae. Nullam consectetur lacinia nisi, quis laoreet magna pulvinar in. \\\\nClass aptent taciti sociosqu ad litora torquent per conubia nostra, per \\\\ninceptos himenaeos. In hac habitasse platea dictumst. Cum sociis natoque\\\\n penatibus et magnis dis parturient montes, nascetur ridiculus mus. Morbi\\\\n eu sapien ac diam facilisis vehicula nec sit amet odio. Vivamus quis \\\\ndui ac nulla molestie blandit eu in nunc. In justo erat, lacinia in \\\\nvulputate non, tristique eu mi. Aliquam tristique dapibus tempor. \\\\nVivamus malesuada tempor urna, in convallis massa lacinia sed. Phasellus\\\\n gravida auctor vestibulum. Suspendisse potenti. In tincidunt felis \\\\nbibendum nunc tempus sagittis. Praesent elit dolor, ultricies interdum \\\\nporta sit amet, iaculis in neque. Nullam urna ante, tempus vel iaculis \\\\nnec, rutrum sit amet nulla. Morbi vestibulum ante in turpis ultricies in\\\\n tincidunt sapien iaculis. Aenean feugiat rhoncus arcu, at luctus libero\\\\n blandit tempus. Vivamus rutrum tellus quis leo placerat eu adipiscing \\\\npurus vehicula.<br>\\"}"}', 1),
(11, 2, 'video_url', 'https://www.youtube.com/watch?v=XzLjwSpNB-c', 1),
(12, 2, 'car_brochure', 'n/a', 1),
(13, 3, 'title', '{"en":"Hybrid Car"}', 1),
(14, 3, 'description', '{"en":"Aliquam vel egestas turpis. Proin sollicitudin imperdiet nisi ac \\nrutrum. Sed imperdiet libero malesuada erat cursus eu pulvinar tellus \\nrhoncus. Ut eget tellus neque, faucibus ornare odio. Fusce sagittis \\nhendrerit mi a sollicitudin.\\nLorem ipsum dolor sit amet, consectetur adipiscing elit. \\nEtiam ullamcorper libero sed ante auctor vel gravida nunc placerat. \\nSuspendisse molestie posuere sem, in viverra dolor venenatis sit amet. \\nAliquam gravida nibh quis justo pulvinar luctus. Phasellus a malesuada \\nmassa. Mauris elementum tempus nisi, vitae ullamcorper sem ultricies \\nvitae. Nullam consectetur lacinia nisi, quis laoreet magna pulvinar in. \\nClass aptent taciti sociosqu ad litora torquent per conubia nostra, per \\ninceptos himenaeos. In hac habitasse platea dictumst. Cum sociis natoque\\n penatibus et magnis dis parturient montes, nascetur ridiculus mus. Morbi\\n eu sapien ac diam facilisis vehicula nec sit amet odio. Vivamus quis \\ndui ac nulla molestie blandit eu in nunc. In justo erat, lacinia in \\nvulputate non, tristique eu mi. Aliquam tristique dapibus tempor. \\nVivamus malesuada tempor urna, in convallis massa lacinia sed. Phasellus\\n gravida auctor vestibulum. Suspendisse potenti. In tincidunt felis \\nbibendum nunc tempus sagittis. Praesent elit dolor, ultricies interdum \\nporta sit amet, iaculis in neque. Nullam urna ante, tempus vel iaculis \\nnec, rutrum sit amet nulla. Morbi vestibulum ante in turpis ultricies in\\n tincidunt sapien iaculis. Aenean feugiat rhoncus arcu, at luctus libero\\n blandit tempus. Vivamus rutrum tellus quis leo placerat eu adipiscing \\npurus vehicula.<br>"}', 1),
(15, 3, 'tags', 'prius, toyota, low fuel, cost', 1),
(16, 3, 'custom_values', '{"post_id":"5","key":"description","status":1,"value":"{\\"en\\":\\"Aliquam vel egestas turpis. Proin sollicitudin imperdiet nisi ac \\\\nrutrum. Sed imperdiet libero malesuada erat cursus eu pulvinar tellus \\\\nrhoncus. Ut eget tellus neque, faucibus ornare odio. Fusce sagittis \\\\nhendrerit mi a sollicitudin.\\\\nLorem ipsum dolor sit amet, consectetur adipiscing elit. \\\\nEtiam ullamcorper libero sed ante auctor vel gravida nunc placerat. \\\\nSuspendisse molestie posuere sem, in viverra dolor venenatis sit amet. \\\\nAliquam gravida nibh quis justo pulvinar luctus. Phasellus a malesuada \\\\nmassa. Mauris elementum tempus nisi, vitae ullamcorper sem ultricies \\\\nvitae. Nullam consectetur lacinia nisi, quis laoreet magna pulvinar in. \\\\nClass aptent taciti sociosqu ad litora torquent per conubia nostra, per \\\\ninceptos himenaeos. In hac habitasse platea dictumst. Cum sociis natoque\\\\n penatibus et magnis dis parturient montes, nascetur ridiculus mus. Morbi\\\\n eu sapien ac diam facilisis vehicula nec sit amet odio. Vivamus quis \\\\ndui ac nulla molestie blandit eu in nunc. In justo erat, lacinia in \\\\nvulputate non, tristique eu mi. Aliquam tristique dapibus tempor. \\\\nVivamus malesuada tempor urna, in convallis massa lacinia sed. Phasellus\\\\n gravida auctor vestibulum. Suspendisse potenti. In tincidunt felis \\\\nbibendum nunc tempus sagittis. Praesent elit dolor, ultricies interdum \\\\nporta sit amet, iaculis in neque. Nullam urna ante, tempus vel iaculis \\\\nnec, rutrum sit amet nulla. Morbi vestibulum ante in turpis ultricies in\\\\n tincidunt sapien iaculis. Aenean feugiat rhoncus arcu, at luctus libero\\\\n blandit tempus. Vivamus rutrum tellus quis leo placerat eu adipiscing \\\\npurus vehicula.<br>\\"}"}', 1),
(17, 3, 'video_url', 'https://www.youtube.com/watch?v=tfhM-EGCT1Y', 1),
(18, 3, 'car_brochure', 'n/a', 1),
(19, 4, 'title', '{"en":"Ford SUV "}', 1),
(20, 4, 'description', '{"en":"Aliquam vel egestas turpis. Proin sollicitudin imperdiet nisi ac \\nrutrum. Sed imperdiet libero malesuada erat cursus eu pulvinar tellus \\nrhoncus. Ut eget tellus neque, faucibus ornare odio. Fusce sagittis \\nhendrerit mi a sollicitudin.\\nLorem ipsum dolor sit amet, consectetur adipiscing elit. \\nEtiam ullamcorper libero sed ante auctor vel gravida nunc placerat. \\nSuspendisse molestie posuere sem, in viverra dolor venenatis sit amet. \\nAliquam gravida nibh quis justo pulvinar luctus. Phasellus a malesuada \\nmassa. Mauris elementum tempus nisi, vitae ullamcorper sem ultricies \\nvitae. Nullam consectetur lacinia nisi, quis laoreet magna pulvinar in. \\nClass aptent taciti sociosqu ad litora torquent per conubia nostra, per \\ninceptos himenaeos. In hac habitasse platea dictumst. Cum sociis natoque\\n penatibus et magnis dis parturient montes, nascetur ridiculus mus. Morbi\\n eu sapien ac diam facilisis vehicula nec sit amet odio. Vivamus quis \\ndui ac nulla molestie blandit eu in nunc. In justo erat, lacinia in \\nvulputate non, tristique eu mi. Aliquam tristique dapibus tempor. \\nVivamus malesuada tempor urna, in convallis massa lacinia sed. Phasellus\\n gravida auctor vestibulum. Suspendisse potenti. In tincidunt felis \\nbibendum nunc tempus sagittis. Praesent elit dolor, ultricies interdum \\nporta sit amet, iaculis in neque. Nullam urna ante, tempus vel iaculis \\nnec, rutrum sit amet nulla. Morbi vestibulum ante in turpis ultricies in\\n tincidunt sapien iaculis. Aenean feugiat rhoncus arcu, at luctus libero\\n blandit tempus. Vivamus rutrum tellus quis leo placerat eu adipiscing \\npurus vehicula."}', 1),
(21, 4, 'tags', 'suv, ford, new, sale', 1),
(22, 4, 'custom_values', '{"post_id":"6","key":"description","status":1,"value":"{\\"en\\":\\"Aliquam vel egestas turpis. Proin sollicitudin imperdiet nisi ac \\\\nrutrum. Sed imperdiet libero malesuada erat cursus eu pulvinar tellus \\\\nrhoncus. Ut eget tellus neque, faucibus ornare odio. Fusce sagittis \\\\nhendrerit mi a sollicitudin.\\\\nLorem ipsum dolor sit amet, consectetur adipiscing elit. \\\\nEtiam ullamcorper libero sed ante auctor vel gravida nunc placerat. \\\\nSuspendisse molestie posuere sem, in viverra dolor venenatis sit amet. \\\\nAliquam gravida nibh quis justo pulvinar luctus. Phasellus a malesuada \\\\nmassa. Mauris elementum tempus nisi, vitae ullamcorper sem ultricies \\\\nvitae. Nullam consectetur lacinia nisi, quis laoreet magna pulvinar in. \\\\nClass aptent taciti sociosqu ad litora torquent per conubia nostra, per \\\\ninceptos himenaeos. In hac habitasse platea dictumst. Cum sociis natoque\\\\n penatibus et magnis dis parturient montes, nascetur ridiculus mus. Morbi\\\\n eu sapien ac diam facilisis vehicula nec sit amet odio. Vivamus quis \\\\ndui ac nulla molestie blandit eu in nunc. In justo erat, lacinia in \\\\nvulputate non, tristique eu mi. Aliquam tristique dapibus tempor. \\\\nVivamus malesuada tempor urna, in convallis massa lacinia sed. Phasellus\\\\n gravida auctor vestibulum. Suspendisse potenti. In tincidunt felis \\\\nbibendum nunc tempus sagittis. Praesent elit dolor, ultricies interdum \\\\nporta sit amet, iaculis in neque. Nullam urna ante, tempus vel iaculis \\\\nnec, rutrum sit amet nulla. Morbi vestibulum ante in turpis ultricies in\\\\n tincidunt sapien iaculis. Aenean feugiat rhoncus arcu, at luctus libero\\\\n blandit tempus. Vivamus rutrum tellus quis leo placerat eu adipiscing \\\\npurus vehicula.\\"}"}', 1),
(23, 4, 'video_url', 'http://www.youtube.com/watch?v=2pLZd06u9Ng', 1),
(24, 4, 'car_brochure', '', 1),
(25, 5, 'title', '{"en":"Cadillac Luxury Car with a very very long long title text"}', 1),
(26, 5, 'description', '{"en":"Aliquam vel egestas turpis. Proin sollicitudin imperdiet nisi ac \\r\\nrutrum. Sed imperdiet libero malesuada erat cursus eu pulvinar tellus \\r\\nrhoncus. Ut eget tellus neque, faucibus ornare odio. Fusce sagittis \\r\\nhendrerit mi a sollicitudin.\\r\\nLorem ipsum dolor sit amet, consectetur adipiscing elit. \\r\\nEtiam ullamcorper libero sed ante auctor vel gravida nunc placerat. \\r\\nSuspendisse molestie posuere sem, in viverra dolor venenatis sit amet. \\r\\nAliquam gravida nibh quis justo pulvinar luctus. Phasellus a malesuada \\r\\nmassa. Mauris elementum tempus nisi, vitae ullamcorper sem ultricies \\r\\nvitae. Nullam consectetur lacinia nisi, quis laoreet magna pulvinar in. \\r\\nClass aptent taciti sociosqu ad litora torquent per conubia nostra, per \\r\\ninceptos himenaeos. In hac habitasse platea dictumst. Cum sociis natoque\\r\\n penatibus et magnis dis parturient montes, nascetur ridiculus mus. Morbi\\r\\n eu sapien ac diam facilisis vehicula nec sit amet odio. Vivamus quis \\r\\ndui ac nulla molestie blandit eu in nunc. In justo erat, lacinia in \\r\\nvulputate non, tristique eu mi. Aliquam tristique dapibus tempor. \\r\\nVivamus malesuada tempor urna, in convallis massa lacinia sed. Phasellus\\r\\n gravida auctor vestibulum. Suspendisse potenti. In tincidunt felis \\r\\nbibendum nunc tempus sagittis. Praesent elit dolor, ultricies interdum \\r\\nporta sit amet, iaculis in neque. Nullam urna ante, tempus vel iaculis \\r\\nnec, rutrum sit amet nulla. Morbi vestibulum ante in turpis ultricies in\\r\\n tincidunt sapien iaculis. Aenean feugiat rhoncus arcu, at luctus libero\\r\\n blandit tempus. Vivamus rutrum tellus quis leo placerat eu adipiscing \\r\\npurus vehicula.<br>"}', 1),
(27, 5, 'tags', 'cadillac, luxury car, sedan', 1),
(28, 5, 'custom_values', '{"post_id":"7","key":"description","status":1,"value":"{\\"en\\":\\"Aliquam vel egestas turpis. Proin sollicitudin imperdiet nisi ac \\\\r\\\\nrutrum. Sed imperdiet libero malesuada erat cursus eu pulvinar tellus \\\\r\\\\nrhoncus. Ut eget tellus neque, faucibus ornare odio. Fusce sagittis \\\\r\\\\nhendrerit mi a sollicitudin.\\\\r\\\\nLorem ipsum dolor sit amet, consectetur adipiscing elit. \\\\r\\\\nEtiam ullamcorper libero sed ante auctor vel gravida nunc placerat. \\\\r\\\\nSuspendisse molestie posuere sem, in viverra dolor venenatis sit amet. \\\\r\\\\nAliquam gravida nibh quis justo pulvinar luctus. Phasellus a malesuada \\\\r\\\\nmassa. Mauris elementum tempus nisi, vitae ullamcorper sem ultricies \\\\r\\\\nvitae. Nullam consectetur lacinia nisi, quis laoreet magna pulvinar in. \\\\r\\\\nClass aptent taciti sociosqu ad litora torquent per conubia nostra, per \\\\r\\\\ninceptos himenaeos. In hac habitasse platea dictumst. Cum sociis natoque\\\\r\\\\n penatibus et magnis dis parturient montes, nascetur ridiculus mus. Morbi\\\\r\\\\n eu sapien ac diam facilisis vehicula nec sit amet odio. Vivamus quis \\\\r\\\\ndui ac nulla molestie blandit eu in nunc. In justo erat, lacinia in \\\\r\\\\nvulputate non, tristique eu mi. Aliquam tristique dapibus tempor. \\\\r\\\\nVivamus malesuada tempor urna, in convallis massa lacinia sed. Phasellus\\\\r\\\\n gravida auctor vestibulum. Suspendisse potenti. In tincidunt felis \\\\r\\\\nbibendum nunc tempus sagittis. Praesent elit dolor, ultricies interdum \\\\r\\\\nporta sit amet, iaculis in neque. Nullam urna ante, tempus vel iaculis \\\\r\\\\nnec, rutrum sit amet nulla. Morbi vestibulum ante in turpis ultricies in\\\\r\\\\n tincidunt sapien iaculis. Aenean feugiat rhoncus arcu, at luctus libero\\\\r\\\\n blandit tempus. Vivamus rutrum tellus quis leo placerat eu adipiscing \\\\r\\\\npurus vehicula.<br>\\"}"}', 1),
(29, 5, 'video_url', '', 1),
(30, 5, 'car_brochure', '', 1),
(31, 6, 'title', '{"en":"Ferrari For Sale"}', 1),
(32, 6, 'description', '{"en":"Aliquam vel egestas turpis. Proin sollicitudin imperdiet nisi ac \\nrutrum. Sed imperdiet libero malesuada erat cursus eu pulvinar tellus \\nrhoncus. Ut eget tellus neque, faucibus ornare odio. Fusce sagittis \\nhendrerit mi a sollicitudin.\\nLorem ipsum dolor sit amet, consectetur adipiscing elit. \\nEtiam ullamcorper libero sed ante auctor vel gravida nunc placerat. \\nSuspendisse molestie posuere sem, in viverra dolor venenatis sit amet. \\nAliquam gravida nibh quis justo pulvinar luctus. Phasellus a malesuada \\nmassa. Mauris elementum tempus nisi, vitae ullamcorper sem ultricies \\nvitae. Nullam consectetur lacinia nisi, quis laoreet magna pulvinar in. \\nClass aptent taciti sociosqu ad litora torquent per conubia nostra, per \\ninceptos himenaeos. In hac habitasse platea dictumst. Cum sociis natoque\\n penatibus et magnis dis parturient montes, nascetur ridiculus mus. Morbi\\n eu sapien ac diam facilisis vehicula nec sit amet odio. Vivamus quis \\ndui ac nulla molestie blandit eu in nunc. In justo erat, lacinia in \\nvulputate non, tristique eu mi. Aliquam tristique dapibus tempor. \\nVivamus malesuada tempor urna, in convallis massa lacinia sed. Phasellus\\n gravida auctor vestibulum. Suspendisse potenti. In tincidunt felis \\nbibendum nunc tempus sagittis. Praesent elit dolor, ultricies interdum \\nporta sit amet, iaculis in neque. Nullam urna ante, tempus vel iaculis \\nnec, rutrum sit amet nulla. Morbi vestibulum ante in turpis ultricies in\\n tincidunt sapien iaculis. Aenean feugiat rhoncus arcu, at luctus libero\\n blandit tempus. Vivamus rutrum tellus quis leo placerat eu adipiscing \\npurus vehicula.<br>"}', 1),
(33, 6, 'tags', 'ferrai, italy, luxury', 1),
(34, 6, 'custom_values', '{"post_id":"8","key":"description","status":1,"value":"{\\"en\\":\\"Aliquam vel egestas turpis. Proin sollicitudin imperdiet nisi ac \\\\nrutrum. Sed imperdiet libero malesuada erat cursus eu pulvinar tellus \\\\nrhoncus. Ut eget tellus neque, faucibus ornare odio. Fusce sagittis \\\\nhendrerit mi a sollicitudin.\\\\nLorem ipsum dolor sit amet, consectetur adipiscing elit. \\\\nEtiam ullamcorper libero sed ante auctor vel gravida nunc placerat. \\\\nSuspendisse molestie posuere sem, in viverra dolor venenatis sit amet. \\\\nAliquam gravida nibh quis justo pulvinar luctus. Phasellus a malesuada \\\\nmassa. Mauris elementum tempus nisi, vitae ullamcorper sem ultricies \\\\nvitae. Nullam consectetur lacinia nisi, quis laoreet magna pulvinar in. \\\\nClass aptent taciti sociosqu ad litora torquent per conubia nostra, per \\\\ninceptos himenaeos. In hac habitasse platea dictumst. Cum sociis natoque\\\\n penatibus et magnis dis parturient montes, nascetur ridiculus mus. Morbi\\\\n eu sapien ac diam facilisis vehicula nec sit amet odio. Vivamus quis \\\\ndui ac nulla molestie blandit eu in nunc. In justo erat, lacinia in \\\\nvulputate non, tristique eu mi. Aliquam tristique dapibus tempor. \\\\nVivamus malesuada tempor urna, in convallis massa lacinia sed. Phasellus\\\\n gravida auctor vestibulum. Suspendisse potenti. In tincidunt felis \\\\nbibendum nunc tempus sagittis. Praesent elit dolor, ultricies interdum \\\\nporta sit amet, iaculis in neque. Nullam urna ante, tempus vel iaculis \\\\nnec, rutrum sit amet nulla. Morbi vestibulum ante in turpis ultricies in\\\\n tincidunt sapien iaculis. Aenean feugiat rhoncus arcu, at luctus libero\\\\n blandit tempus. Vivamus rutrum tellus quis leo placerat eu adipiscing \\\\npurus vehicula.<br>\\"}"}', 1),
(35, 6, 'video_url', 'https://www.youtube.com/watch?v=G8sM-FgvvXE', 1),
(36, 6, 'car_brochure', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `db_tabprefixsessions`
--

DROP TABLE IF EXISTS `db_tabprefixsessions`;
CREATE TABLE IF NOT EXISTS `db_tabprefixsessions` (
  `session_id` varchar(40) NOT NULL DEFAULT '0',
  `ip_address` varchar(16) NOT NULL DEFAULT '0',
  `user_agent` varchar(50) NOT NULL,
  `last_activity` int(10) unsigned NOT NULL DEFAULT '0',
  `user_data` text NOT NULL,
  PRIMARY KEY (`session_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `db_tabprefixusers`
--

DROP TABLE IF EXISTS `db_tabprefixusers`;
CREATE TABLE IF NOT EXISTS `db_tabprefixusers` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `user_type` int(3) NOT NULL,
  `first_name` char(40) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `last_name` char(40) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `gender` char(10) NOT NULL DEFAULT '',
  `profile_photo` char(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `user_name` char(100) NOT NULL,
  `user_email` char(100) NOT NULL,
  `password` char(255) NOT NULL,
  `remember_me_key` char(255) NOT NULL DEFAULT '',
  `recovery_key` char(255) NOT NULL DEFAULT '',
  `confirmation_key` char(30) NOT NULL DEFAULT '',
  `confirmed` int(1) NOT NULL DEFAULT '1',
  `confirmed_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `status` int(1) NOT NULL DEFAULT '0',
  `banned` int(11) NOT NULL DEFAULT '0',
  `banned_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `banned_till` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `db_tabprefixusers`
--

-- --------------------------------------------------------

--
-- Table structure for table `db_tabprefixusertype`
--

DROP TABLE IF EXISTS `db_tabprefixusertype`;
CREATE TABLE IF NOT EXISTS `db_tabprefixusertype` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `name` char(20) NOT NULL,
  `status` int(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `db_tabprefixusertype`
--

INSERT INTO `db_tabprefixusertype` (`id`, `name`, `status`) VALUES
(1, 'admin', 1),
(2, 'agent', 1);

-- --------------------------------------------------------

--
-- Table structure for table `db_tabprefixuser_meta`
--

DROP TABLE IF EXISTS `db_tabprefixuser_meta`;
CREATE TABLE IF NOT EXISTS `db_tabprefixuser_meta` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `key` char(30) NOT NULL,
  `value` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `status` int(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `db_tabprefixuser_meta`
--

INSERT INTO `db_tabprefixuser_meta` (`id`, `user_id`, `key`, `value`, `status`) VALUES
(1, 1, 'post_count', '7', 1),
(2, 1, 'company_name', 'Hayday Auto Company', 1),
(3, 1, 'phone', '(541) 754-3010', 1),
(4, 1, 'about_me', 'Hello World', 1),
(5, 1, 'fb_profile', 'www.facebook.com/webhelios?ref=br_tf', 1),
(6, 1, 'twitter_profile', 'twitter.com/webheliosteam', 1),
(7, 1, 'li_profile', 'www.linkedin.com/company/webhelios', 1),
(8, 1, 'gp_profile', 'plus.google.com/+Webheliosteam/about', 1),
(9, 1, 'user_address', '712 Griswold Ave', 1),
(10, 1, 'user_country', '1', 1),
(11, 1, 'user_state', '9', 1),
(12, 1, 'user_city', '76', 1),
(13, 1, 'user_zip', '91340', 1),
(14, 1, 'user_latitude', '34.287342', 1),
(15, 1, 'user_longitude', '-118.42862400000001', 1),
(16, 1, 'query_email#1410698854', '{"sender_email":"alam@webhelios.com","sender_name":"Saad Naufel","subject":"Why Ferrari","msg":"Blaah blaah"}', 1),
(17, 2, 'query_email#1410699081', '{"sender_email":"info@webhelios.com","sender_name":"John Doe","subject":"What''s the Rush","msg":"Blaah blaah"}', 1);

-- --------------------------------------------------------

--
-- Table structure for table `db_tabprefixuser_package`
--

DROP TABLE IF EXISTS `db_tabprefixuser_package`;
CREATE TABLE IF NOT EXISTS `db_tabprefixuser_package` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `unique_id` char(100) NOT NULL,
  `user_id` int(11) NOT NULL,
  `package_id` int(11) NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `request_date` date NOT NULL,
  `activation_date` date NOT NULL,
  `expirtion_date` date NOT NULL,
  `is_active` int(1) NOT NULL COMMENT '0=no,2=pending,1=active',
  `status` int(1) NOT NULL COMMENT '0=deleted,1=active',
  `payment_medium` char(20) NOT NULL DEFAULT 'paypal',
  `response_log` text NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `unique_id` (`unique_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `db_tabprefixuser_package`
--

INSERT INTO `db_tabprefixuser_package` (`id`, `unique_id`, `user_id`, `package_id`, `amount`, `request_date`, `activation_date`, `expirtion_date`, `is_active`, `status`, `payment_medium`, `response_log`) VALUES
(1, '54156ba6a3c4f', 3, 3, 0.00, '2014-09-14', '2014-09-14', '2015-09-14', 1, 1, 'paypal', ''),
(2, '5416b6a22e448', 4, 1, 5.00, '2014-09-15', '0000-00-00', '0000-00-00', 2, 1, 'paypal', ''),
(3, '54180ebf53063', 5, 1, 5.00, '2014-09-16', '0000-00-00', '0000-00-00', 2, 1, 'paypal', '');

-- --------------------------------------------------------

--
-- Table structure for table `db_tabprefixwidgets`
--

DROP TABLE IF EXISTS `db_tabprefixwidgets`;
CREATE TABLE IF NOT EXISTS `db_tabprefixwidgets` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` char(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `alias` char(23) NOT NULL,
  `params` text NOT NULL,
  `status` int(1) NOT NULL,
  `editable` int(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `db_tabprefixwidgets`
--

INSERT INTO `db_tabprefixwidgets` (`id`, `name`, `alias`, `params`, `status`, `editable`) VALUES
(1, 'All types', 'all_types', '', 1, 1),
(3, 'Top Dealers', 'top_dealers', '', 1, 1),
(4, 'Featured Cars', 'featured_cars', '', 1, 1),
(5, 'Top cars', 'top_cars', '', 1, 1),
(6, 'Language selector', 'language_selector', '', 1, 1),
(7, 'Facebook like box', 'facebook_like_box', '', 1, 1),
(8, 'Contact text', 'contact_text', '', 1, 1),
(9, 'Follow us', 'follow_us', '', 1, 1),
(10, 'News Post', 'news_post', '', 1, 1),
(11, 'Blog Post', 'blog_post', '', 1, 1),
(12, 'Article Post', 'article_post', '', 1, 1),
(13, 'Short Description', 'short_description', '', 1, 1),
(14, 'Plain Search Widget', 'plain_search_widget', '', 1, 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
