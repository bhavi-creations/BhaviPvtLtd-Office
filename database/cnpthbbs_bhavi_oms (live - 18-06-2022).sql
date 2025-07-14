-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 18, 2022 at 12:23 PM
-- Server version: 10.3.34-MariaDB-log-cll-lve
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cnpthbbs_bhavi_oms`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointments_tbl`
--

CREATE TABLE `appointments_tbl` (
  `appointment_id` int(11) NOT NULL,
  `client` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `remarks` longtext NOT NULL,
  `service` varchar(255) NOT NULL,
  `images` longtext NOT NULL,
  `location` longtext NOT NULL,
  `lead_type` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `follow_up_date` date NOT NULL,
  `close_status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `appointments_tbl`
--

INSERT INTO `appointments_tbl` (`appointment_id`, `client`, `status`, `remarks`, `service`, `images`, `location`, `lead_type`, `date`, `follow_up_date`, `close_status`) VALUES
(4, 'IVY OVERSEAS', 'Client meeting', 'Need to change quotation', 'Bulk WhatsApp', '', '16.9840344,82.2404355', 'hot', '2022-05-23', '2022-05-30', 'non-closing'),
(5, 'Foundation hospital', 'Client meeting', 'Need time', 'H M S', '', '16.9658778,82.2447714', 'hot', '2022-05-23', '2022-05-30', 'closing'),
(6, 'PRIME HOSPITAL', 'Visit', 'Meeting at 6pm today', 'Website', '', '16.9658778,82.2447714', 'hot', '2022-05-23', '2022-05-30', 'non-closing'),
(7, 'Furniture world', 'Client meeting', 'Need to change plan', '', '', '16.9621092,82.235745', 'hot', '2022-05-23', '2022-05-30', 'non-closing'),
(8, 'Tanishqgold jewellery', 'Visit', 'Need to discuss with MD', 'Social media marketing', '', '16.9470732,82.2318993', 'cold', '2022-05-24', '2022-05-31', 'non-closing'),
(9, 'Sri Raj jewellery mall', 'Visit', 'Call after two days', 'Digital marketing', '', '16.9475939,82.2319507', 'cold', '2022-05-24', '2022-05-31', 'non-closing'),
(10, 'Jain jewelly mall', 'Visit', 'If need they will call', '', '', '16.9476437,82.2320207', 'cold', '2022-05-24', '2022-05-31', 'non-closing'),
(11, 'PSV jewellery', 'Visit', 'He will call', 'Digital marketing', '', '16.9480715,82.2319942', 'cold', '2022-05-24', '2022-05-31', 'non-closing'),
(12, 'Sri Ram jems and jewellery', 'Visit', 'He will call ..', 'Digital marketing', '', '16.9484351,82.2319817', 'cold', '2022-05-24', '2022-05-31', 'non-closing'),
(13, 'Jewel park', 'Visit', 'Call after 5', '', '', '16.9491842,82.2320491', 'cold', '2022-05-24', '2022-05-31', 'non-closing'),
(14, 'Raj jewellery mall', 'Visit', 'Manager will discuss with MD and then he will call', 'Social media marketing', '', '16.9500543,82.2323769', 'hot', '2022-05-24', '2022-05-31', 'non-closing'),
(15, 'VAYYAARE ART', 'Client meeting', 'Need tome', 'Website', '', '16.95074,82.2320153', 'cold', '2022-05-24', '2022-05-31', 'non-closing'),
(16, 'LAXMI HOSPITAL', 'Visit', 'Takes time ,they will call', '', '', '16.9725297,82.2486651', 'cold', '2022-05-25', '2022-06-01', 'non-closing'),
(17, 'VASUNDARA SILVERS', 'Visit', 'Call after two days', '', '', '16.9482594,82.2315323', 'cold', '2022-05-25', '2022-06-01', 'non-closing'),
(18, 'PSR&SONS JEWELLERY', 'Visit', 'If need he will call', '', '', '16.9470257,82.2335394', 'cold', '2022-05-25', '2022-06-01', 'non-closing'),
(19, 'Sri Lalitha jewellery', 'Visit', 'He will call if need', '', '', '16.9470257,82.2335394', 'cold', '2022-05-25', '2022-06-01', 'non-closing'),
(20, 'Sriya jewellery', 'Visit', 'If need he will call', '', '', '16.9470257,82.2335394', 'cold', '2022-05-25', '2022-06-01', 'non-closing'),
(21, 'Jhani diamonds and jewellery', 'Visit', 'Call after two\'days', '', '', '16.9470257,82.2335394', 'cold', '2022-05-25', '2022-06-01', 'non-closing'),
(22, 'RAJDEEP JEWELLERY', 'Visit', 'Not interested', '', '', '16.9709223,82.2360165', 'cold', '2022-05-26', '2022-06-02', 'non-closing'),
(23, 'Sri  Lakshmi pearl and jewellery', 'Visit', 'He will call', '', '', '16.9728779,82.236722', 'cold', '2022-05-26', '2022-06-02', 'non-closing'),
(24, 'Sri  Lakshmi pearl and jewellery', 'Visit', 'He will call', '', '', '17.0245085,82.2329142', 'cold', '2022-05-26', '2022-06-02', 'non-closing'),
(25, 'Aditya developes', 'Client meeting', 'Bulk WhatsApp', '', '', '16.9841034,82.2408633', 'cold', '2022-05-26', '2022-06-02', 'non-closing'),
(26, 'SRI BHAVANI MULTYSPESALITY DENTAL HOSPITAL', 'Visit', 'Meet doctor at 7 pm', 'Website', '', '16.9710295,82.235975', 'cold', '2022-05-26', '2022-06-02', 'non-closing'),
(27, 'City hospital', 'Client meeting', 'Meet him tomorrow', '', '', '16.9953165,82.2473855', 'cold', '2022-05-30', '2022-06-06', 'non-closing'),
(28, 'HOME COMFORTS', 'Visit', 'If need any service they will call(hr)', '', '', '16.9947512,82.2444259', 'cold', '2022-05-30', '2022-06-06', 'non-closing'),
(29, 'Aditya developes', 'Client meeting', 'Follow up', '', '', '16.9842693,82.2408675', 'cold', '2022-05-30', '2022-06-06', 'non-closing'),
(30, 'Greenwood school', 'Visit', 'They will call', 'Social media marketing', '', '16.9921692,82.2461046', 'cold', '2022-05-31', '2022-06-07', 'non-closing'),
(31, 'City hospital', 'Client meeting', 'Send the quotation', 'All services', '', '16.9952695,82.2473629', 'cold', '2022-06-01', '2022-06-08', 'non-closing'),
(32, 'Delhi public kids school', 'Visit', 'Need to visit head office', '', '', '17.0017628,82.2623591', 'cold', '2022-06-01', '2022-06-08', 'non-closing'),
(33, 'Sunrise school kkd', 'Visit', 'No need', '', '', '16.9983399,82.2631323', 'cold', '2022-06-01', '2022-06-08', 'non-closing'),
(34, 'My value vision opticals', 'Visit', 'Call after two days', 'Bulk WhatsApp', '', '16.9513007,82.2353418', 'hot', '2022-06-01', '2022-06-08', 'non-closing'),
(35, 'M m car care', 'Visit', 'He will call in twodays', 'Website', '', '16.9573028,82.2335794', 'cold', '2022-06-01', '2022-06-08', 'non-closing'),
(36, 'SUBHANIKETAN SCHOOL', 'Visit', 'If need any service they will call', '', '', '16.9977089,82.2302496', 'cold', '2022-06-02', '2022-06-09', 'non-closing'),
(37, 'Delhi public school', 'Visit', 'Brouchers required', '', '', '17.0127786,82.2321289', 'hot', '2022-06-02', '2022-06-09', 'non-closing'),
(38, 'Apex super spesality dental hospital', 'Visit', 'Contact next week', 'Website', '', '16.9718354,82.246849', 'cold', '2022-06-03', '2022-06-10', 'non-closing'),
(39, 'Sri bhemeswara real-estate', 'Visit', 'Contact monday', '', '', '16.9678448,82.2426104', 'cold', '2022-06-03', '2022-06-10', 'non-closing'),
(40, 'Atharva constructions', 'Visit', 'Need to call ', '', '', '16.9678159,82.2426633', 'cold', '2022-06-03', '2022-06-10', 'non-closing'),
(41, 'Honeygroup', 'Visit', 'They will call ', '', '', '16.9675559,82.2441467', 'cold', '2022-06-03', '2022-06-10', 'non-closing'),
(42, 'First cry ', 'Visit', 'Follow up', 'Bulk WhatsApp', '', '16.9531293,82.2343305', 'cold', '2022-06-04', '2022-06-11', 'non-closing'),
(43, 'Tru moto', 'Visit', 'He will call', '', '', '16.9536454,82.2362838', 'cold', '2022-06-04', '2022-06-11', 'non-closing'),
(44, 'Sri AP medicals', 'Visit', 'Need to contact owner', '', '', '16.9491209,82.2340392', 'cold', '2022-06-04', '2022-06-11', 'non-closing'),
(45, 'Penta ramchandra and sons', 'Visit', 'They will call', '', '', '16.9490265,82.2342443', 'cold', '2022-06-04', '2022-06-11', 'non-closing'),
(46, 'B new mobiles', 'Visit', '', '', '', '16.9490265,82.2342443', 'cold', '2022-06-04', '2022-06-11', 'non-closing'),
(47, 'Sri Srinivasa furniture', 'Visit', 'He will call', 'Website', '', '16.9581294,82.233692', 'cold', '2022-06-04', '2022-06-11', 'non-closing'),
(48, 'Ballons zone and decoration', 'Visit', 'Need time', 'Website', '', '16.9507147,82.2332945', 'cold', '2022-06-06', '2022-06-13', 'non-closing'),
(49, 'Rainbow restaurent', 'Visit', 'Call after two\'days', 'Website', '', '16.9722391,82.2332186', 'cold', '2022-06-06', '2022-06-13', 'non-closing'),
(50, 'Elite luxury family spa', 'Visit', 'They will call', 'Website', '', '16.9725031,82.2331178', 'cold', '2022-06-06', '2022-06-13', 'non-closing');

-- --------------------------------------------------------

--
-- Table structure for table `country_tbl`
--

CREATE TABLE `country_tbl` (
  `id` int(11) NOT NULL,
  `country_code` varchar(2) NOT NULL DEFAULT '',
  `country_name` varchar(100) NOT NULL DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `country_tbl`
--

INSERT INTO `country_tbl` (`id`, `country_code`, `country_name`) VALUES
(1, 'AF', 'Afghanistan'),
(2, 'AL', 'Albania'),
(3, 'DZ', 'Algeria'),
(4, 'DS', 'American Samoa'),
(5, 'AD', 'Andorra'),
(6, 'AO', 'Angola'),
(7, 'AI', 'Anguilla'),
(8, 'AQ', 'Antarctica'),
(9, 'AG', 'Antigua and Barbuda'),
(10, 'AR', 'Argentina'),
(11, 'AM', 'Armenia'),
(12, 'AW', 'Aruba'),
(13, 'AU', 'Australia'),
(14, 'AT', 'Austria'),
(15, 'AZ', 'Azerbaijan'),
(16, 'BS', 'Bahamas'),
(17, 'BH', 'Bahrain'),
(18, 'BD', 'Bangladesh'),
(19, 'BB', 'Barbados'),
(20, 'BY', 'Belarus'),
(21, 'BE', 'Belgium'),
(22, 'BZ', 'Belize'),
(23, 'BJ', 'Benin'),
(24, 'BM', 'Bermuda'),
(25, 'BT', 'Bhutan'),
(26, 'BO', 'Bolivia'),
(27, 'BA', 'Bosnia and Herzegovina'),
(28, 'BW', 'Botswana'),
(29, 'BV', 'Bouvet Island'),
(30, 'BR', 'Brazil'),
(31, 'IO', 'British Indian Ocean Territory'),
(32, 'BN', 'Brunei Darussalam'),
(33, 'BG', 'Bulgaria'),
(34, 'BF', 'Burkina Faso'),
(35, 'BI', 'Burundi'),
(36, 'KH', 'Cambodia'),
(37, 'CM', 'Cameroon'),
(38, 'CA', 'Canada'),
(39, 'CV', 'Cape Verde'),
(40, 'KY', 'Cayman Islands'),
(41, 'CF', 'Central African Republic'),
(42, 'TD', 'Chad'),
(43, 'CL', 'Chile'),
(44, 'CN', 'China'),
(45, 'CX', 'Christmas Island'),
(46, 'CC', 'Cocos (Keeling) Islands'),
(47, 'CO', 'Colombia'),
(48, 'KM', 'Comoros'),
(49, 'CD', 'Democratic Republic of the Congo'),
(50, 'CG', 'Republic of Congo'),
(51, 'CK', 'Cook Islands'),
(52, 'CR', 'Costa Rica'),
(53, 'HR', 'Croatia (Hrvatska)'),
(54, 'CU', 'Cuba'),
(55, 'CY', 'Cyprus'),
(56, 'CZ', 'Czech Republic'),
(57, 'DK', 'Denmark'),
(58, 'DJ', 'Djibouti'),
(59, 'DM', 'Dominica'),
(60, 'DO', 'Dominican Republic'),
(61, 'TP', 'East Timor'),
(62, 'EC', 'Ecuador'),
(63, 'EG', 'Egypt'),
(64, 'SV', 'El Salvador'),
(65, 'GQ', 'Equatorial Guinea'),
(66, 'ER', 'Eritrea'),
(67, 'EE', 'Estonia'),
(68, 'ET', 'Ethiopia'),
(69, 'FK', 'Falkland Islands (Malvinas)'),
(70, 'FO', 'Faroe Islands'),
(71, 'FJ', 'Fiji'),
(72, 'FI', 'Finland'),
(73, 'FR', 'France'),
(74, 'FX', 'France, Metropolitan'),
(75, 'GF', 'French Guiana'),
(76, 'PF', 'French Polynesia'),
(77, 'TF', 'French Southern Territories'),
(78, 'GA', 'Gabon'),
(79, 'GM', 'Gambia'),
(80, 'GE', 'Georgia'),
(81, 'DE', 'Germany'),
(82, 'GH', 'Ghana'),
(83, 'GI', 'Gibraltar'),
(84, 'GK', 'Guernsey'),
(85, 'GR', 'Greece'),
(86, 'GL', 'Greenland'),
(87, 'GD', 'Grenada'),
(88, 'GP', 'Guadeloupe'),
(89, 'GU', 'Guam'),
(90, 'GT', 'Guatemala'),
(91, 'GN', 'Guinea'),
(92, 'GW', 'Guinea-Bissau'),
(93, 'GY', 'Guyana'),
(94, 'HT', 'Haiti'),
(95, 'HM', 'Heard and Mc Donald Islands'),
(96, 'HN', 'Honduras'),
(97, 'HK', 'Hong Kong'),
(98, 'HU', 'Hungary'),
(99, 'IS', 'Iceland'),
(100, 'IN', 'India'),
(101, 'IM', 'Isle of Man'),
(102, 'ID', 'Indonesia'),
(103, 'IR', 'Iran (Islamic Republic of)'),
(104, 'IQ', 'Iraq'),
(105, 'IE', 'Ireland'),
(106, 'IL', 'Israel'),
(107, 'IT', 'Italy'),
(108, 'CI', 'Ivory Coast'),
(109, 'JE', 'Jersey'),
(110, 'JM', 'Jamaica'),
(111, 'JP', 'Japan'),
(112, 'JO', 'Jordan'),
(113, 'KZ', 'Kazakhstan'),
(114, 'KE', 'Kenya'),
(115, 'KI', 'Kiribati'),
(116, 'KP', 'Korea, Democratic People\'s Republic of'),
(117, 'KR', 'Korea, Republic of'),
(118, 'XK', 'Kosovo'),
(119, 'KW', 'Kuwait'),
(120, 'KG', 'Kyrgyzstan'),
(121, 'LA', 'Lao People\'s Democratic Republic'),
(122, 'LV', 'Latvia'),
(123, 'LB', 'Lebanon'),
(124, 'LS', 'Lesotho'),
(125, 'LR', 'Liberia'),
(126, 'LY', 'Libyan Arab Jamahiriya'),
(127, 'LI', 'Liechtenstein'),
(128, 'LT', 'Lithuania'),
(129, 'LU', 'Luxembourg'),
(130, 'MO', 'Macau'),
(131, 'MK', 'North Macedonia'),
(132, 'MG', 'Madagascar'),
(133, 'MW', 'Malawi'),
(134, 'MY', 'Malaysia'),
(135, 'MV', 'Maldives'),
(136, 'ML', 'Mali'),
(137, 'MT', 'Malta'),
(138, 'MH', 'Marshall Islands'),
(139, 'MQ', 'Martinique'),
(140, 'MR', 'Mauritania'),
(141, 'MU', 'Mauritius'),
(142, 'TY', 'Mayotte'),
(143, 'MX', 'Mexico'),
(144, 'FM', 'Micronesia, Federated States of'),
(145, 'MD', 'Moldova, Republic of'),
(146, 'MC', 'Monaco'),
(147, 'MN', 'Mongolia'),
(148, 'ME', 'Montenegro'),
(149, 'MS', 'Montserrat'),
(150, 'MA', 'Morocco'),
(151, 'MZ', 'Mozambique'),
(152, 'MM', 'Myanmar'),
(153, 'NA', 'Namibia'),
(154, 'NR', 'Nauru'),
(155, 'NP', 'Nepal'),
(156, 'NL', 'Netherlands'),
(157, 'AN', 'Netherlands Antilles'),
(158, 'NC', 'New Caledonia'),
(159, 'NZ', 'New Zealand'),
(160, 'NI', 'Nicaragua'),
(161, 'NE', 'Niger'),
(162, 'NG', 'Nigeria'),
(163, 'NU', 'Niue'),
(164, 'NF', 'Norfolk Island'),
(165, 'MP', 'Northern Mariana Islands'),
(166, 'NO', 'Norway'),
(167, 'OM', 'Oman'),
(168, 'PK', 'Pakistan'),
(169, 'PW', 'Palau'),
(170, 'PS', 'Palestine'),
(171, 'PA', 'Panama'),
(172, 'PG', 'Papua New Guinea'),
(173, 'PY', 'Paraguay'),
(174, 'PE', 'Peru'),
(175, 'PH', 'Philippines'),
(176, 'PN', 'Pitcairn'),
(177, 'PL', 'Poland'),
(178, 'PT', 'Portugal'),
(179, 'PR', 'Puerto Rico'),
(180, 'QA', 'Qatar'),
(181, 'RE', 'Reunion'),
(182, 'RO', 'Romania'),
(183, 'RU', 'Russian Federation'),
(184, 'RW', 'Rwanda'),
(185, 'KN', 'Saint Kitts and Nevis'),
(186, 'LC', 'Saint Lucia'),
(187, 'VC', 'Saint Vincent and the Grenadines'),
(188, 'WS', 'Samoa'),
(189, 'SM', 'San Marino'),
(190, 'ST', 'Sao Tome and Principe'),
(191, 'SA', 'Saudi Arabia'),
(192, 'SN', 'Senegal'),
(193, 'RS', 'Serbia'),
(194, 'SC', 'Seychelles'),
(195, 'SL', 'Sierra Leone'),
(196, 'SG', 'Singapore'),
(197, 'SK', 'Slovakia'),
(198, 'SI', 'Slovenia'),
(199, 'SB', 'Solomon Islands'),
(200, 'SO', 'Somalia'),
(201, 'ZA', 'South Africa'),
(202, 'GS', 'South Georgia South Sandwich Islands'),
(203, 'SS', 'South Sudan'),
(204, 'ES', 'Spain'),
(205, 'LK', 'Sri Lanka'),
(206, 'SH', 'St. Helena'),
(207, 'PM', 'St. Pierre and Miquelon'),
(208, 'SD', 'Sudan'),
(209, 'SR', 'Suriname'),
(210, 'SJ', 'Svalbard and Jan Mayen Islands'),
(211, 'SZ', 'Swaziland'),
(212, 'SE', 'Sweden'),
(213, 'CH', 'Switzerland'),
(214, 'SY', 'Syrian Arab Republic'),
(215, 'TW', 'Taiwan'),
(216, 'TJ', 'Tajikistan'),
(217, 'TZ', 'Tanzania, United Republic of'),
(218, 'TH', 'Thailand'),
(219, 'TG', 'Togo'),
(220, 'TK', 'Tokelau'),
(221, 'TO', 'Tonga'),
(222, 'TT', 'Trinidad and Tobago'),
(223, 'TN', 'Tunisia'),
(224, 'TR', 'Turkey'),
(225, 'TM', 'Turkmenistan'),
(226, 'TC', 'Turks and Caicos Islands'),
(227, 'TV', 'Tuvalu'),
(228, 'UG', 'Uganda'),
(229, 'UA', 'Ukraine'),
(230, 'AE', 'United Arab Emirates'),
(231, 'GB', 'United Kingdom'),
(232, 'US', 'United States'),
(233, 'UM', 'United States minor outlying islands'),
(234, 'UY', 'Uruguay'),
(235, 'UZ', 'Uzbekistan'),
(236, 'VU', 'Vanuatu'),
(237, 'VA', 'Vatican City State'),
(238, 'VE', 'Venezuela'),
(239, 'VN', 'Vietnam'),
(240, 'VG', 'Virgin Islands (British)'),
(241, 'VI', 'Virgin Islands (U.S.)'),
(242, 'WF', 'Wallis and Futuna Islands'),
(243, 'EH', 'Western Sahara'),
(244, 'YE', 'Yemen'),
(245, 'ZM', 'Zambia'),
(246, 'ZW', 'Zimbabwe');

-- --------------------------------------------------------

--
-- Table structure for table `department_tbl`
--

CREATE TABLE `department_tbl` (
  `id` int(11) NOT NULL,
  `department_name` varchar(100) NOT NULL,
  `city` varchar(255) NOT NULL,
  `added_on` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `department_tbl`
--

INSERT INTO `department_tbl` (`id`, `department_name`, `city`, `added_on`) VALUES
(0, 'Admin', '', '2022-04-25 15:22:26'),
(6, 'Management', 'Kakinada', '2022-04-30 09:14:31'),
(7, 'Technical', 'Kakinada', '2022-04-30 09:14:46'),
(8, 'Admin', 'Kakinada', '2022-04-30 09:14:57'),
(9, 'Marketing', 'Kakinada', '2022-04-30 09:15:08');

-- --------------------------------------------------------

--
-- Table structure for table `holidays_tbl`
--

CREATE TABLE `holidays_tbl` (
  `id` int(11) NOT NULL,
  `holiday_name` varchar(255) NOT NULL,
  `holiday_date` date NOT NULL,
  `holiday_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `holidays_tbl`
--

INSERT INTO `holidays_tbl` (`id`, `holiday_name`, `holiday_date`, `holiday_status`) VALUES
(1, 'Good Friday', '2022-04-15', 1),
(4, 'May Day', '2022-05-01', 1),
(6, 'Ramzan ', '2022-05-03', 1),
(7, 'mayday', '2022-05-01', 1),
(8, 'Independence Day', '2022-08-15', 1),
(9, 'Krishnastami', '2022-08-18', 1),
(10, 'Vinayaka Chavithi', '2022-08-31', 1),
(11, 'Gandhi Jayanthi', '2022-10-02', 1),
(12, 'Maha Navami', '2022-10-04', 1),
(13, 'Dussehra', '2022-10-05', 1),
(14, 'Diwali', '2022-10-24', 1),
(15, 'Christmas', '2022-10-25', 1);

-- --------------------------------------------------------

--
-- Table structure for table `leave_tbl`
--

CREATE TABLE `leave_tbl` (
  `id` int(11) NOT NULL,
  `staff_id` int(11) NOT NULL,
  `leave_reason` varchar(90) NOT NULL,
  `description` text NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `leave_from` date NOT NULL,
  `leave_to` date NOT NULL,
  `updated_on` date NOT NULL,
  `applied_on` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `leave_tbl`
--

INSERT INTO `leave_tbl` (`id`, `staff_id`, `leave_reason`, `description`, `status`, `leave_from`, `leave_to`, `updated_on`, `applied_on`) VALUES
(1, 2, 'Headache', 'Headache', 1, '2019-10-07', '2019-10-09', '0000-00-00', '2019-10-04'),
(2, 5, 'Casual Leave', 'allow me foe leave', 1, '2022-04-12', '2022-04-12', '0000-00-00', '2022-04-11'),
(3, 6, 'Casual Leave', 'refgtf', 2, '2022-04-24', '2022-04-24', '0000-00-00', '2022-04-22'),
(4, 6, 'personal', 'personal work', 0, '2022-04-27', '2022-04-28', '0000-00-00', '2022-04-27'),
(5, 15, 'For Hospital Lab Tests', 'please Approve my leave', 0, '2022-05-31', '2022-06-01', '0000-00-00', '2022-05-30'),
(6, 10, 'My brother marriage ', 'My brother marriage on 9th june 2022. So i have to attend please grant my leave', 0, '2022-06-08', '2022-06-10', '0000-00-00', '2022-06-06');

-- --------------------------------------------------------

--
-- Table structure for table `login_records_tbl`
--

CREATE TABLE `login_records_tbl` (
  `id` int(11) NOT NULL,
  `staff_id` int(11) NOT NULL,
  `login_date_time` datetime NOT NULL,
  `logout_date_time` datetime DEFAULT NULL,
  `ip_address` varchar(100) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login_records_tbl`
--

INSERT INTO `login_records_tbl` (`id`, `staff_id`, `login_date_time`, `logout_date_time`, `ip_address`, `status`) VALUES
(6, 6, '2022-04-14 17:18:22', '2022-04-14 17:28:44', '::1', 1),
(7, 1, '2022-04-14 17:29:09', '2022-04-14 17:30:03', '::1', 1),
(8, 1, '2022-04-14 17:30:58', '2022-04-14 17:31:08', '::1', 1),
(9, 1, '2022-04-16 15:59:15', '2022-04-16 16:00:04', '::1', 1),
(10, 1, '2022-04-16 16:00:11', '2022-04-16 16:48:49', '::1', 1),
(11, 6, '2022-04-16 16:48:54', '2022-04-16 16:50:16', '::1', 1),
(12, 6, '2022-04-16 16:50:19', '2022-04-16 17:00:35', '::1', 1),
(13, 6, '2022-04-16 17:00:37', '2022-04-16 17:33:52', '::1', 1),
(14, 1, '2022-04-16 17:33:58', '2022-04-16 17:35:49', '::1', 1),
(15, 6, '2022-04-16 17:35:53', '2022-04-16 17:36:16', '::1', 1),
(16, 1, '2022-04-16 17:36:19', NULL, '::1', 1),
(17, 1, '2022-04-20 15:47:43', '2022-04-20 16:07:57', '::1', 1),
(18, 6, '2022-04-20 16:08:01', NULL, '::1', 1),
(19, 6, '2022-04-20 16:46:54', '2022-04-20 17:03:50', '::1', 1),
(20, 1, '2022-04-20 17:03:54', '2022-04-20 17:15:31', '::1', 1),
(21, 6, '2022-04-20 17:15:34', '2022-04-20 17:16:40', '::1', 1),
(22, 1, '2022-04-20 17:16:44', '2022-04-20 17:20:02', '::1', 1),
(23, 6, '2022-04-20 17:20:05', NULL, '::1', 1),
(24, 1, '2022-04-22 08:03:09', '2022-04-22 08:16:24', '::1', 1),
(25, 6, '2022-04-22 08:16:28', '2022-04-22 08:16:49', '::1', 1),
(26, 1, '2022-04-22 08:16:54', '2022-04-22 08:21:20', '::1', 1),
(27, 6, '2022-04-22 08:21:25', '2022-04-22 08:21:51', '::1', 1),
(28, 1, '2022-04-22 08:21:56', '2022-04-22 08:22:11', '::1', 1),
(29, 6, '2022-04-22 08:22:15', '2022-04-22 09:10:09', '::1', 1),
(30, 1, '2022-04-22 09:10:13', '2022-04-22 09:40:22', '::1', 1),
(31, 6, '2022-04-22 09:40:25', '2022-04-22 09:46:54', '::1', 1),
(32, 1, '2022-04-22 09:46:58', '2022-04-22 09:52:41', '::1', 1),
(33, 6, '2022-04-22 09:52:45', '2022-04-22 09:58:21', '::1', 1),
(34, 1, '2022-04-22 09:58:24', NULL, '::1', 1),
(35, 1, '2022-04-23 09:32:09', NULL, '::1', 1),
(36, 1, '2022-04-23 15:47:04', NULL, '::1', 1),
(37, 1, '2022-04-25 12:26:45', '2022-04-25 13:23:09', '::1', 1),
(38, 6, '2022-04-25 13:23:24', '2022-04-25 13:24:31', '::1', 1),
(39, 1, '2022-04-25 13:24:40', '2022-04-25 13:28:10', '::1', 1),
(40, 1, '2022-04-25 15:33:38', '2022-04-25 15:34:13', '::1', 1),
(41, 6, '2022-04-25 15:34:17', '2022-04-25 15:43:02', '::1', 1),
(42, 1, '2022-04-25 15:43:06', '2022-04-25 15:43:55', '::1', 1),
(43, 6, '2022-04-25 15:43:58', '2022-04-25 16:45:40', '::1', 1),
(44, 1, '2022-04-25 16:45:49', '2022-04-25 17:26:16', '::1', 1),
(45, 6, '2022-04-25 17:26:19', '2022-04-25 17:34:09', '::1', 1),
(46, 6, '2022-04-25 17:34:12', '2022-04-25 17:37:43', '::1', 1),
(47, 1, '2022-04-25 17:37:47', '2022-04-25 17:38:48', '::1', 1),
(48, 1, '2022-04-25 17:38:51', NULL, '::1', 1),
(49, 1, '2022-04-25 12:28:56', NULL, '175.101.26.36', 1),
(50, 1, '2022-04-25 12:30:49', '2022-04-25 12:33:16', '175.101.26.36', 1),
(51, 6, '2022-04-25 12:33:32', NULL, '175.101.26.36', 1),
(52, 1, '2022-04-25 12:40:54', NULL, '175.101.26.36', 1),
(53, 1, '2022-04-25 12:49:13', '2022-04-25 12:56:02', '175.101.26.36', 1),
(54, 6, '2022-04-25 12:56:23', '2022-04-25 12:56:51', '175.101.26.36', 1),
(55, 1, '2022-04-25 13:16:05', '2022-04-25 13:17:42', '175.101.26.36', 1),
(56, 1, '2022-04-27 00:44:05', '2022-04-27 02:22:11', '49.156.148.14', 1),
(57, 6, '2022-04-27 02:23:25', NULL, '49.156.148.14', 1),
(58, 1, '2022-04-27 10:43:43', '2022-04-27 10:46:37', '175.101.26.36', 1),
(59, 6, '2022-04-27 10:46:45', '2022-04-27 11:05:47', '175.101.26.36', 1),
(60, 1, '2022-04-27 11:00:34', '2022-04-27 11:08:09', '49.156.148.14', 1),
(61, 1, '2022-04-27 11:05:50', '2022-04-27 11:06:26', '175.101.26.36', 1),
(62, 6, '2022-04-27 11:08:37', '2022-04-27 11:10:16', '49.156.148.14', 1),
(63, 1, '2022-04-27 11:10:21', '2022-04-27 11:17:27', '49.156.148.14', 1),
(64, 1, '2022-04-27 11:12:29', NULL, '175.101.26.36', 1),
(65, 6, '2022-04-27 11:17:32', '2022-04-27 11:18:16', '49.156.148.14', 1),
(66, 1, '2022-04-27 11:18:21', NULL, '49.156.148.14', 1),
(67, 1, '2022-04-28 08:59:10', '2022-04-28 08:59:43', '49.156.148.14', 1),
(68, 6, '2022-04-28 08:59:47', NULL, '49.156.148.14', 1),
(69, 1, '2022-04-28 12:14:07', NULL, '175.101.26.36', 1),
(70, 6, '2022-04-28 13:16:09', NULL, '49.205.210.160', 1),
(71, 1, '2022-04-29 07:18:44', NULL, '49.156.148.14', 1),
(72, 1, '2022-04-30 04:52:25', NULL, '49.156.148.14', 1),
(73, 1, '2022-04-30 09:46:56', NULL, '175.101.26.36', 1),
(74, 1, '2022-04-30 10:25:01', NULL, '175.101.26.36', 1),
(75, 1, '2022-04-30 11:39:55', NULL, '175.101.26.36', 1),
(76, 1, '2022-04-30 12:46:05', NULL, '175.101.26.36', 1),
(77, 1, '2022-05-02 05:01:22', '2022-05-02 05:02:41', '175.101.26.36', 1),
(78, 1, '2022-05-02 05:02:51', '2022-05-02 05:03:16', '175.101.26.36', 1),
(79, 1, '2022-05-02 11:37:03', '2022-05-02 11:40:04', '175.101.26.36', 1),
(80, 1, '2022-05-03 11:55:36', NULL, '175.101.26.36', 1),
(81, 1, '2022-05-03 13:27:39', '2022-05-03 13:28:48', '49.156.148.14', 1),
(82, 1, '2022-05-06 07:19:40', NULL, '49.156.148.14', 1),
(83, 1, '2022-05-06 07:36:08', NULL, '49.156.148.14', 1),
(84, 1, '2022-05-06 12:22:16', '2022-05-06 12:35:21', '175.101.26.36', 1),
(85, 14, '2022-05-06 12:35:31', '2022-05-06 12:38:56', '175.101.26.36', 1),
(86, 1, '2022-05-07 10:41:56', NULL, '49.156.148.14', 1),
(87, 14, '2022-05-09 18:50:00', '2022-05-09 22:06:42', '175.101.26.36', 1),
(88, 1, '2022-05-09 21:05:56', NULL, '175.101.26.36', 1),
(89, 1, '2022-05-09 21:31:59', NULL, '49.156.148.14', 1),
(90, 1, '2022-05-09 22:06:51', '2022-05-09 22:12:32', '175.101.26.36', 1),
(91, 1, '2022-05-09 22:13:15', '2022-05-09 22:18:28', '175.101.26.36', 1),
(92, 14, '2022-05-09 22:18:38', '2022-05-09 22:21:15', '175.101.26.36', 1),
(93, 1, '2022-05-09 22:32:10', '2022-05-09 22:35:30', '175.101.26.36', 1),
(94, 14, '2022-05-09 22:35:35', '2022-05-09 22:36:02', '175.101.26.36', 1),
(95, 1, '2022-05-09 22:36:07', '2022-05-09 22:36:38', '175.101.26.36', 1),
(96, 14, '2022-05-09 22:36:42', '2022-05-09 22:37:53', '175.101.26.36', 1),
(97, 1, '2022-05-10 09:53:47', NULL, '49.156.148.14', 1),
(98, 1, '2022-05-10 12:42:17', NULL, '49.156.148.14', 1),
(99, 14, '2022-05-10 19:17:31', NULL, '175.101.26.36', 1),
(100, 14, '2022-05-10 21:49:01', '2022-05-10 22:01:02', '175.101.26.36', 1),
(101, 14, '2022-05-12 18:47:13', '2022-05-12 22:05:22', '175.101.26.36', 1),
(102, 14, '2022-05-14 19:09:10', NULL, '175.101.26.36', 1),
(103, 14, '2022-05-14 21:43:41', '2022-05-14 21:45:48', '175.101.26.36', 1),
(104, 14, '2022-05-16 19:03:19', NULL, '175.101.26.36', 1),
(105, 1, '2022-05-16 22:19:18', '2022-05-16 22:22:09', '175.101.26.36', 1),
(106, 1, '2022-05-16 23:13:46', NULL, '49.156.148.14', 1),
(107, 1, '2022-05-17 10:19:27', NULL, '106.217.213.192', 1),
(108, 11, '2022-05-17 11:00:52', NULL, '115.98.12.54', 1),
(109, 14, '2022-05-17 19:00:10', '2022-05-17 21:58:31', '175.101.26.36', 1),
(111, 1, '2022-05-18 15:13:11', NULL, '49.156.148.14', 1),
(112, 14, '2022-05-18 19:05:26', NULL, '175.101.26.36', 1),
(113, 14, '2022-05-18 21:35:07', '2022-05-18 22:00:31', '175.101.26.36', 1),
(114, 14, '2022-05-19 18:57:43', NULL, '175.101.26.36', 1),
(115, 14, '2022-05-19 22:13:08', '2022-05-19 22:13:50', '175.101.26.36', 1),
(116, 14, '2022-05-20 19:03:30', '2022-05-20 22:07:28', '175.101.26.36', 1),
(117, 1, '2022-05-20 22:07:40', '2022-05-20 22:09:10', '175.101.26.36', 1),
(118, 1, '2022-05-21 20:02:13', '2022-05-21 21:40:32', '175.101.26.36', 1),
(119, 14, '2022-05-21 21:40:42', '2022-05-21 21:41:59', '175.101.26.36', 1),
(120, 14, '2022-05-21 21:44:14', NULL, '175.101.26.36', 1),
(121, 1, '2022-05-22 10:29:10', NULL, '49.156.148.14', 1),
(122, 14, '2022-05-22 19:26:00', NULL, '175.101.26.36', 1),
(123, 14, '2022-05-22 21:37:27', '2022-05-22 21:40:17', '175.101.26.36', 1),
(124, 14, '2022-05-22 21:40:21', NULL, '175.101.26.36', 1),
(125, 14, '2022-05-22 21:42:45', '2022-05-22 21:44:26', '175.101.26.36', 1),
(126, 1, '2022-05-22 21:43:05', '2022-05-22 21:53:57', '175.101.26.36', 1),
(127, 14, '2022-05-22 21:44:29', '2022-05-22 21:46:28', '175.101.26.36', 1),
(128, 14, '2022-05-22 21:46:32', '2022-05-22 21:51:50', '175.101.26.36', 1),
(129, 14, '2022-05-22 21:48:10', NULL, '175.101.26.36', 1),
(130, 14, '2022-05-22 21:52:17', '2022-05-22 21:52:22', '175.101.26.36', 1),
(131, 14, '2022-05-22 21:52:40', '2022-05-22 21:52:48', '175.101.26.36', 1),
(132, 1, '2022-05-23 09:15:55', NULL, '49.156.148.14', 1),
(133, 16, '2022-05-23 09:41:28', NULL, '49.156.148.14', 1),
(134, 15, '2022-05-23 09:41:39', NULL, '49.156.148.14', 1),
(135, 10, '2022-05-23 09:45:30', NULL, '49.156.148.14', 1),
(136, 17, '2022-05-23 09:47:21', NULL, '49.156.148.14', 1),
(137, 17, '2022-05-23 09:58:44', NULL, '49.156.148.14', 1),
(138, 15, '2022-05-23 15:32:14', NULL, '49.156.148.14', 1),
(139, 15, '2022-05-23 15:34:53', NULL, '223.187.76.176', 1),
(140, 10, '2022-05-23 15:34:59', NULL, '49.156.148.14', 1),
(141, 17, '2022-05-23 16:39:22', NULL, '117.246.72.72', 1),
(142, 15, '2022-05-23 18:35:05', NULL, '49.156.148.14', 1),
(143, 16, '2022-05-23 18:40:29', NULL, '49.156.148.14', 1),
(144, 14, '2022-05-23 18:57:22', NULL, '175.101.26.36', 1),
(145, 14, '2022-05-23 21:43:01', NULL, '175.101.26.36', 1),
(146, 15, '2022-05-24 09:36:33', NULL, '223.187.76.186', 1),
(147, 16, '2022-05-24 10:03:39', NULL, '49.156.148.14', 1),
(148, 17, '2022-05-24 11:18:48', NULL, '223.187.56.185', 1),
(149, 17, '2022-05-24 17:45:00', NULL, '49.156.148.14', 1),
(150, 16, '2022-05-24 18:26:46', NULL, '49.156.148.14', 1),
(151, 15, '2022-05-24 18:28:07', NULL, '49.156.148.14', 1),
(152, 14, '2022-05-24 19:07:26', NULL, '175.101.26.36', 1),
(153, 14, '2022-05-24 22:05:47', NULL, '175.101.26.36', 1),
(154, 16, '2022-05-25 10:00:27', NULL, '49.156.148.14', 1),
(155, 17, '2022-05-25 10:02:48', NULL, '49.156.148.14', 1),
(156, 17, '2022-05-25 10:53:57', NULL, '117.249.159.93', 1),
(157, 15, '2022-05-25 18:45:08', NULL, '49.156.148.14', 1),
(158, 16, '2022-05-25 18:49:23', NULL, '49.156.148.14', 1),
(159, 14, '2022-05-25 19:03:49', NULL, '175.101.26.36', 1),
(160, 14, '2022-05-25 22:07:05', '2022-05-25 22:07:26', '175.101.26.36', 1),
(161, 17, '2022-05-26 11:02:49', NULL, '117.249.159.93', 1),
(162, 16, '2022-05-26 11:20:27', NULL, '49.156.148.14', 1),
(163, 17, '2022-05-26 17:37:04', NULL, '117.249.159.93', 1),
(164, 15, '2022-05-26 18:32:17', NULL, '49.156.148.14', 1),
(165, 16, '2022-05-26 18:41:43', NULL, '49.156.148.14', 1),
(166, 14, '2022-05-26 18:54:36', NULL, '175.101.26.36', 1),
(167, 15, '2022-05-27 10:08:39', NULL, '49.156.148.14', 1),
(168, 16, '2022-05-27 18:30:38', NULL, '49.156.148.14', 1),
(169, 14, '2022-05-27 18:47:14', '2022-05-27 22:04:33', '175.101.26.36', 1),
(170, 15, '2022-05-27 18:48:06', NULL, '49.156.148.14', 1),
(171, 15, '2022-05-28 15:03:56', NULL, '223.185.92.167', 1),
(172, 15, '2022-05-28 15:03:57', NULL, '223.185.92.167', 1),
(173, 14, '2022-05-28 18:55:40', NULL, '175.101.26.36', 1),
(174, 14, '2022-05-28 22:07:01', '2022-05-28 22:07:17', '175.101.26.36', 1),
(175, 17, '2022-05-30 10:34:11', NULL, '117.251.237.0', 1),
(176, 15, '2022-05-30 17:00:51', NULL, '49.156.148.14', 1),
(177, 14, '2022-05-30 18:53:06', NULL, '175.101.26.36', 1),
(178, 14, '2022-05-30 22:05:07', '2022-05-30 22:05:53', '175.101.26.36', 1),
(179, 15, '2022-05-31 00:21:50', NULL, '223.185.108.181', 1),
(180, 16, '2022-05-31 10:35:54', NULL, '49.156.148.14', 1),
(181, 17, '2022-05-31 10:56:25', NULL, '117.246.80.32', 1),
(182, 1, '2022-05-31 12:39:16', NULL, '49.37.152.17', 1),
(183, 14, '2022-05-31 19:02:08', NULL, '175.101.26.36', 1),
(184, 14, '2022-05-31 22:01:30', '2022-05-31 22:02:24', '175.101.26.36', 1),
(185, 16, '2022-06-01 10:02:36', NULL, '49.156.148.14', 1),
(186, 17, '2022-06-01 11:12:25', NULL, '117.246.80.32', 1),
(187, 17, '2022-06-01 16:16:17', NULL, '117.246.80.32', 1),
(188, 16, '2022-06-01 18:53:04', NULL, '49.156.148.14', 1),
(189, 15, '2022-06-01 18:53:39', NULL, '49.156.148.14', 1),
(190, 14, '2022-06-01 20:05:28', NULL, '175.101.26.36', 1),
(191, 17, '2022-06-02 11:24:15', NULL, '117.246.177.197', 1),
(192, 15, '2022-06-02 18:32:00', NULL, '49.156.148.14', 1),
(193, 16, '2022-06-02 18:42:09', NULL, '49.156.148.14', 1),
(194, 14, '2022-06-02 18:57:19', NULL, '175.101.26.36', 1),
(195, 17, '2022-06-03 11:53:28', NULL, '117.246.205.38', 1),
(196, 15, '2022-06-03 12:43:24', NULL, '49.156.148.14', 1),
(197, 15, '2022-06-03 17:59:45', NULL, '49.156.148.14', 1),
(198, 16, '2022-06-03 18:20:28', NULL, '49.156.148.14', 1),
(199, 1, '2022-06-03 20:14:15', '2022-06-03 20:15:27', '106.217.245.240', 1),
(200, 14, '2022-06-03 20:15:34', NULL, '106.217.245.240', 1),
(201, 14, '2022-06-03 21:41:24', NULL, '175.101.26.36', 1),
(202, 17, '2022-06-04 10:23:15', NULL, '49.156.148.14', 1),
(203, 17, '2022-06-04 15:48:17', NULL, '49.156.148.14', 1),
(204, 14, '2022-06-04 19:24:00', NULL, '175.101.26.36', 1),
(205, 16, '2022-06-04 19:25:42', NULL, '49.156.148.14', 1),
(206, 1, '2022-06-05 09:08:12', NULL, '43.241.66.98', 1),
(207, 16, '2022-06-06 11:54:56', NULL, '106.217.231.3', 1),
(208, 10, '2022-06-06 11:59:14', NULL, '106.76.212.94', 1),
(209, 17, '2022-06-06 16:31:13', NULL, '117.242.89.189', 1),
(210, 15, '2022-06-06 18:05:55', '2022-06-06 18:10:28', '49.156.148.14', 1),
(211, 16, '2022-06-06 18:10:46', NULL, '106.77.162.0', 1),
(212, 14, '2022-06-06 18:52:14', NULL, '175.101.26.36', 1),
(213, 14, '2022-06-06 21:03:55', NULL, '175.101.26.36', 1),
(214, 10, '2022-06-07 18:48:48', NULL, '106.77.166.27', 1),
(215, 16, '2022-06-07 18:56:10', '2022-06-07 18:56:44', '106.77.166.27', 1),
(216, 15, '2022-06-07 18:56:51', NULL, '106.77.166.27', 1),
(217, 14, '2022-06-07 18:58:22', NULL, '175.101.26.36', 1),
(218, 16, '2022-06-07 19:00:27', NULL, '106.77.166.27', 1),
(219, 14, '2022-06-07 21:41:11', NULL, '175.101.26.36', 1),
(220, 15, '2022-06-08 18:11:19', '2022-06-08 18:19:27', '49.156.148.14', 1),
(221, 14, '2022-06-08 19:05:25', NULL, '175.101.26.36', 1),
(222, 14, '2022-06-08 22:05:47', NULL, '175.101.26.36', 1),
(223, 15, '2022-06-09 18:32:16', NULL, '49.156.148.14', 1),
(224, 16, '2022-06-09 18:43:28', NULL, '49.156.148.14', 1),
(225, 14, '2022-06-09 19:09:37', NULL, '175.101.26.36', 1),
(226, 14, '2022-06-09 21:42:26', NULL, '175.101.26.36', 1),
(227, 16, '2022-06-10 18:52:14', NULL, '49.156.148.14', 1),
(228, 15, '2022-06-10 18:52:22', NULL, '49.156.148.14', 1),
(229, 14, '2022-06-11 19:19:03', NULL, '175.101.26.36', 1),
(230, 14, '2022-06-11 21:50:07', '2022-06-11 21:50:25', '175.101.26.36', 1),
(231, 15, '2022-06-13 18:26:55', '2022-06-13 18:29:51', '49.156.148.14', 1),
(232, 1, '2022-06-13 22:16:34', '2022-06-13 22:26:29', '175.101.26.36', 1),
(233, 1, '2022-06-13 22:29:25', NULL, '49.156.148.14', 1),
(234, 10, '2022-06-14 09:39:34', NULL, '49.156.148.14', 1),
(235, 14, '2022-06-14 12:22:48', '2022-06-14 12:23:07', '175.101.26.36', 1),
(236, 15, '2022-06-14 18:02:37', NULL, '49.156.148.14', 1),
(237, 16, '2022-06-14 18:02:39', NULL, '49.156.148.14', 1),
(238, 14, '2022-06-14 19:12:26', NULL, '175.101.26.36', 1),
(239, 14, '2022-06-14 22:15:54', NULL, '175.101.26.36', 1),
(240, 10, '2022-06-15 10:00:46', NULL, '49.156.148.14', 1),
(241, 10, '2022-06-15 18:42:17', NULL, '49.156.148.14', 1),
(242, 16, '2022-06-15 18:59:00', NULL, '49.156.148.14', 1),
(243, 14, '2022-06-15 21:54:27', NULL, '175.101.26.36', 1),
(244, 15, '2022-06-16 18:24:21', NULL, '49.156.148.14', 1),
(245, 14, '2022-06-16 19:00:09', NULL, '175.101.26.36', 1),
(246, 14, '2022-06-16 22:02:40', NULL, '175.101.26.36', 1),
(247, 15, '2022-06-17 18:29:50', NULL, '49.156.148.14', 1),
(248, 16, '2022-06-17 18:30:37', NULL, '49.156.148.14', 1),
(249, 1, '2022-06-18 21:50:57', NULL, '175.101.26.36', 1);

-- --------------------------------------------------------

--
-- Table structure for table `login_tbl`
--

CREATE TABLE `login_tbl` (
  `id` int(11) NOT NULL,
  `username` varchar(80) NOT NULL,
  `password` varchar(80) NOT NULL,
  `usertype` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login_tbl`
--

INSERT INTO `login_tbl` (`id`, `username`, `password`, `usertype`, `status`) VALUES
(1, 'bhavicreations', 'e10adc3949ba59abbe56e057f20f883e', 1, 1),
(9, 'phanIchalikonda@gmail.com', '5fc2e462c572fc2741e6b4512aac6127', 2, 1),
(10, 'chinnu6202@gmail.com', '8a56537150713fb51c0a33605a8be3e1', 2, 1),
(11, 'krishnapriyavemulapalli696@gmail.com', '7af6c76492c84a6fe17925241acaf81d', 2, 1),
(12, 'shariffsimpson@gmail.com', '66532e1976bf2cb494e710271ebb563c', 2, 1),
(13, 'prathyushabommidi@gmail.com', '4c6939d28a61ad19604db0d6decc05ce', 2, 1),
(14, 'veduruvadauday@gmail.com', '7da7191cd7f4192b3a938236eff616a6', 2, 1),
(15, 'sairamkada0290@gmail.com', '22cb5bd67047ca4a478cf7dd0ad00dd5', 2, 1),
(16, 'deviprasanna243@gmail.com', '11debd92c2bbcbacc187799176adb3b5', 2, 1),
(17, 'anthonykunche.kamal@gmail.com', 'd6042d96e57b2da00af983deccf5ecc1', 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `permissions_tbl`
--

CREATE TABLE `permissions_tbl` (
  `permission_id` int(11) NOT NULL,
  `staff_id` int(11) NOT NULL,
  `module` varchar(255) NOT NULL,
  `permission` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `permissions_tbl`
--

INSERT INTO `permissions_tbl` (`permission_id`, `staff_id`, `module`, `permission`) VALUES
(2, 17, 'marketing', 'edit_access'),
(3, 11, 'marketing', 'edit_access');

-- --------------------------------------------------------

--
-- Table structure for table `products_tbl`
--

CREATE TABLE `products_tbl` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `brand_name` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `date_added` date NOT NULL,
  `expiry_date` date NOT NULL,
  `original_price` double NOT NULL,
  `selling_price` double NOT NULL,
  `supplier` int(11) NOT NULL,
  `quantity` bigint(20) NOT NULL,
  `quantity_left` bigint(20) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products_tbl`
--

INSERT INTO `products_tbl` (`product_id`, `product_name`, `brand_name`, `category`, `date_added`, `expiry_date`, `original_price`, `selling_price`, `supplier`, `quantity`, `quantity_left`, `status`) VALUES
(1, 'Shampoo', 'Clinic Plus', 'shampoo', '2022-06-17', '2022-06-30', 9, 10, 4, 100, 80, 1),
(2, 'Hair Conditioner', 'Clinic Plus', 'Conditioner', '2022-06-17', '2022-07-10', 200, 225, 4, 50, 50, 1);

-- --------------------------------------------------------

--
-- Table structure for table `projects_tbl`
--

CREATE TABLE `projects_tbl` (
  `id` int(11) NOT NULL,
  `project_name` varchar(255) NOT NULL,
  `project_link` varchar(255) NOT NULL,
  `project_details` longtext NOT NULL,
  `project_files` longtext NOT NULL,
  `status` int(11) NOT NULL,
  `date_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `projects_tbl`
--

INSERT INTO `projects_tbl` (`id`, `project_name`, `project_link`, `project_details`, `project_files`, `status`, `date_time`) VALUES
(0, 'Unallocated Project', '', '**** DONT DELETE THIS ****', '', 1, '2022-04-02 00:00:00'),
(7, 'Liftonics', 'http://www.liftonics.com/', 'We created a Website for liftonics', '', 0, '2022-01-06 00:00:00'),
(16, 'Sri Shanmukha Bio plantiec', 'https://bhavicreations.com/', 'Broucher', '', 0, '2022-04-25 00:00:00'),
(22, 'VLK Solutions', 'http://www.vlksol.com/', 'we created a website', '', 1, '2022-01-01 00:00:00'),
(25, 'Bhavi Creations Blog', '', 'Run the blog daily', '', 1, '2022-05-17 00:00:00'),
(26, 'Google My Business', 'https://www.google.com/search?q=bhavi+creations&oq=bhavi+creations&aqs=chrome.0.69i59j35i39j69i59j69i60l3.4497j0j7&sourceid=chrome&ie=UTF-8', 'Add Cover pic, Products/Service pics and description, Interior and exterior pics as per my guidelines.\r\nCreate service Images ', '', 1, '2022-05-23 00:00:00'),
(27, 'Blog', '', 'Create Blog content \r\nTopics - Importance of social media management/marketing\r\nHow social media attract people(Business)\r\n', '', 1, '2022-05-23 00:00:00'),
(28, 'QA', '', 'Check all content and post on social media \r\nsave the client\\\'s phone numbers and details on social media\r\n', '', 1, '2022-05-23 00:00:00'),
(29, 'SEO', '', 'Work on SEO', '', 1, '2022-05-23 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `project_tasks_tbl`
--

CREATE TABLE `project_tasks_tbl` (
  `id` int(11) NOT NULL,
  `project_id` int(11) NOT NULL,
  `assigned_to` varchar(255) NOT NULL,
  `task_name` varchar(255) NOT NULL,
  `task_details` longtext NOT NULL,
  `task_daily` int(11) NOT NULL,
  `task_priority` varchar(255) NOT NULL,
  `task_status` varchar(255) NOT NULL,
  `due_date` date NOT NULL,
  `completed_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `project_tasks_tbl`
--

INSERT INTO `project_tasks_tbl` (`id`, `project_id`, `assigned_to`, `task_name`, `task_details`, `task_daily`, `task_priority`, `task_status`, `due_date`, `completed_date`) VALUES
(0, 0, '1', 'Unallocated Task', '**** DONT DELETE THIS ****', 0, 'low', 'completed', '2022-04-24', '2022-04-30'),
(8, 0, '14', 'Web Push Notifications', 'Notifications for staff', 0, 'low', 'pending', '2022-05-31', '0000-00-00'),
(9, 20, '14', 'Marketing Module', 'Appointments & work report/visit only for marketing team (permission based), with photo and location upload', 0, 'low', 'pending', '2022-05-31', '0000-00-00'),
(10, 20, '14', 'Filter based on Date', 'Staff, Salary, Leaves, Tasks, Attendence should be filtered based on date', 0, 'low', 'pending', '2022-05-31', '0000-00-00'),
(11, 0, '14', 'Hospital website template', 'Create a html template PDF for hospital website', 0, 'high', 'completed', '2022-05-12', '0000-00-00'),
(12, 26, '15,10', 'Google my business', 'Add Cover pic, Products/Service pics and description, Interior and exterior pics as per my guidelines.\r\nAdd service Images with Concept', 1, 'high', 'pending', '2022-05-23', '2022-05-23'),
(13, 27, '15,13', 'Bloging', 'Create Blog content \r\nTopics - Importance of social media management/marketing\r\nHow social media attract people(Business)\r\nafterthat post it', 1, 'high', 'pending', '2022-05-23', '2022-05-23'),
(14, 29, '10', 'Bhavi Creation SEO', 'Work on SEO', 0, 'high', 'pending', '2022-05-23', '2022-06-23');

-- --------------------------------------------------------

--
-- Table structure for table `salary_tbl`
--

CREATE TABLE `salary_tbl` (
  `id` int(11) NOT NULL,
  `staff_id` int(11) NOT NULL,
  `basic_salary` bigint(20) NOT NULL,
  `allowance` bigint(20) NOT NULL,
  `working_days` int(11) NOT NULL,
  `worked_days` int(11) NOT NULL,
  `no_of_leaves` int(11) NOT NULL,
  `salary_per_day` double NOT NULL,
  `total` bigint(20) NOT NULL,
  `added_by` int(11) NOT NULL,
  `updated_on` date NOT NULL,
  `added_on` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `salary_tbl`
--

INSERT INTO `salary_tbl` (`id`, `staff_id`, `basic_salary`, `allowance`, `working_days`, `worked_days`, `no_of_leaves`, `salary_per_day`, `total`, `added_by`, `updated_on`, `added_on`) VALUES
(1, 2, 20000, 0, 31, 31, 0, 0, 20000, 1, '0000-00-00', '2022-05-06 16:45:46'),
(2, 3, 18000, 0, 31, 31, 0, 0, 18000, 1, '0000-00-00', '2022-05-06 16:45:46'),
(3, 4, 15000, 2500, 31, 31, 0, 0, 17500, 1, '0000-00-00', '2022-05-06 16:45:46'),
(6, 6, 20000, 2000, 31, 31, 0, 0, 22000, 1, '0000-00-00', '2022-05-06 16:45:46'),
(8, 10, 15000, 0, 31, 31, 0, 0, 15000, 1, '0000-00-00', '2022-05-06 16:45:46'),
(9, 12, 15000, 0, 31, 31, 0, 0, 15000, 1, '0000-00-00', '2022-05-06 16:45:46'),
(10, 13, 6000, 0, 31, 31, 0, 0, 6000, 1, '0000-00-00', '2022-05-06 16:45:46'),
(11, 14, 15000, 0, 31, 31, 0, 0, 15000, 1, '0000-00-00', '2022-05-06 16:45:46'),
(13, 9, 50000, 0, 31, 31, 0, 0, 50000, 1, '0000-00-00', '2022-05-06 16:45:46'),
(14, 11, 15000, 0, 31, 31, 0, 0, 15000, 1, '0000-00-00', '2022-05-06 16:45:46'),
(15, 17, 30000, 0, 31, 31, 0, 0, 30000, 1, '0000-00-00', '2022-05-06 16:45:46'),
(17, 15, 2400, 0, 31, 31, 0, 0, 2400, 1, '0000-00-00', '2022-05-06 16:45:46');

-- --------------------------------------------------------

--
-- Table structure for table `staff_tbl`
--

CREATE TABLE `staff_tbl` (
  `id` int(11) NOT NULL,
  `staff_name` varchar(150) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `email` varchar(150) NOT NULL,
  `mobile` bigint(20) NOT NULL,
  `dob` date NOT NULL,
  `doj` date NOT NULL,
  `employee_id` varchar(255) NOT NULL,
  `blood_group` varchar(255) NOT NULL,
  `address` text DEFAULT NULL,
  `city` varchar(100) NOT NULL,
  `state` varchar(100) NOT NULL,
  `country` varchar(50) NOT NULL,
  `department_id` int(11) NOT NULL,
  `pic` varchar(150) NOT NULL DEFAULT 'default-pic.jpg',
  `files` longtext NOT NULL,
  `added_by` int(11) NOT NULL,
  `updated_on` date NOT NULL,
  `added_on` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `staff_tbl`
--

INSERT INTO `staff_tbl` (`id`, `staff_name`, `gender`, `email`, `mobile`, `dob`, `doj`, `employee_id`, `blood_group`, `address`, `city`, `state`, `country`, `department_id`, `pic`, `files`, `added_by`, `updated_on`, `added_on`) VALUES
(1, 'Bhavi Creations', 'Male', 'bhavicreations2022@gmail.com', 9642343434, '2022-04-15', '2022-04-15', 'BCKKD000', '', 'kakinada', 'kakinada', 'Andhra Pradesh', 'India', 0, 'bhavi.JPG', '', 0, '0000-00-00', '2022-05-06 16:32:59'),
(9, 'Ch Naga Phaneendra', 'Male', 'phanIchalikonda@gmail.com', 8686394079, '1992-11-20', '2022-02-24', 'BCKKD001', 'A+', '41-1/14-205, Near nirmala sishu bhavan,Krishnalanka, Vijayawada', 'vijayawada', 'AP', 'India', 6, 'WhatsApp_Image_2022-05-06_at_4_56_03_PM.jpeg', '', 1, '0000-00-00', '2022-05-06 11:32:31'),
(10, 'Adina Venkata Raju', 'Male', 'chinnu6202@gmail.com', 7842800565, '1994-08-25', '2022-03-18', 'BCKKD002', 'A+', '9-33-111, 16th ward, NZP-RPL Road,Sukaplli, Repalle Mandal,Guntur-522265', 'Guntur', 'Andhra pradesh', 'India', 7, 'Image_Venkat.jpeg', '', 1, '0000-00-00', '2022-05-06 11:46:20'),
(11, 'Gottipati krishna priya', 'Female', 'krishnapriyavemulapalli696@gmail.com', 7093639208, '1988-10-14', '2022-04-01', 'BCKKD003', 'O+', '2-141, Old Harijanawada Tenneru, krishna Andhra pradesh-521260', 'Vijyawada', 'Andhra Pradesh', 'India', 9, 'priya.jpeg', '', 1, '0000-00-00', '2022-05-06 11:55:40'),
(12, 'Shaik Mahaboob Shariff', 'Male', 'shariffsimpson@gmail.com', 8712387490, '1998-12-18', '2022-03-01', 'BCKKD004', 'B+', 'Urvasi, kancharapalem,visakhapatnam', 'visakhapatnam', 'Andhra Pradesh', 'India', 7, 'shariff.png', '', 1, '0000-00-00', '2022-05-06 12:06:03'),
(13, 'Bommidi Pratyusha', 'Female', 'prathyushabommidi@gmail.com', 8106563840, '1991-03-07', '2022-03-08', 'BCKKD005', 'O+', '8-91, ff-1, Shirdi sai nagar road, tadigadapa donka road, yenmalakuduru, vijayawada-7', 'Vijayawada', 'Andhra Pradesh', 'India', 7, 'pratyusha.jpeg', '', 1, '0000-00-00', '2022-05-06 12:11:06'),
(14, 'Veduruvada Uday Kumar', 'Male', 'veduruvadauday@gmail.com', 8712965092, '1995-09-15', '2022-03-03', 'BCKKD006', 'B+', '4-36/1, Bolashankar Nagar, near  old Shivalayam temple, Kutubullapur, Rangareddi, Telangana, 500055', 'Kutubullapur', 'Telangana', 'India', 7, 'uday.jpg', '', 1, '0000-00-00', '2022-05-09 15:41:14'),
(15, 'Kada sairam', 'Male', 'sairamkada0290@gmail.com', 9440491273, '1997-12-02', '2022-04-25', 'BCKKD007', 'A+', 'Bodhilanka, K Gangavaram mandal, Bhatlapalika,Dangeru, Andhra Pradesh,533263', 'Draksharama', 'Andhra Pradesh', 'India', 7, 'sai.jpg', '', 1, '0000-00-00', '2022-05-06 12:27:17'),
(16, 'Juttuga Devi prasanna', 'Female', 'deviprasanna243@gmail.com', 9676212573, '2000-05-29', '2022-04-27', 'BCKKD008', 'B+', '3-81 Dongalagudem K.Gangavaram mandal,Bhatlapalika, dangeru, Andhra pradesh- 533263', 'Draksharama', 'Andhra Pradesh', 'India', 8, 'prasanna.jpg', '', 1, '0000-00-00', '2022-05-06 12:30:14'),
(17, 'Kunche Kamal Kumar', 'Male', 'anthonykunche.kamal@gmail.com', 9052555608, '1980-12-22', '2022-05-02', 'BCKKD009', 'B+', '3-16-15/3A Rajalaksmi nagar Gudarigunta, Kakinada', 'Kakinada', 'Andhra Pradesh', 'India', 9, 'Image_Kamal.jpg', '', 1, '0000-00-00', '2022-05-06 12:33:21');

-- --------------------------------------------------------

--
-- Table structure for table `suppliers_tbl`
--

CREATE TABLE `suppliers_tbl` (
  `id` int(11) NOT NULL,
  `supplier_name` varchar(255) NOT NULL,
  `address` longtext NOT NULL,
  `contact_name` varchar(255) NOT NULL,
  `contact_phone` varchar(255) NOT NULL,
  `notes` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `suppliers_tbl`
--

INSERT INTO `suppliers_tbl` (`id`, `supplier_name`, `address`, `contact_name`, `contact_phone`, `notes`) VALUES
(4, 'ABC Dealers', 'vijaywada', 'uday', '7326372632', 'assdvgfh'),
(5, 'ABC General Supplier	', 'kakinada', 'uday', '87123324251', 'general dealer');

-- --------------------------------------------------------

--
-- Table structure for table `work_reports_tbl`
--

CREATE TABLE `work_reports_tbl` (
  `id` int(11) NOT NULL,
  `project_id` varchar(255) NOT NULL,
  `task_id` varchar(255) NOT NULL,
  `staff_id` int(11) NOT NULL,
  `work_details` longtext NOT NULL,
  `work_status` varchar(255) NOT NULL,
  `on_date` date NOT NULL,
  `added_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `work_reports_tbl`
--

INSERT INTO `work_reports_tbl` (`id`, `project_id`, `task_id`, `staff_id`, `work_details`, `work_status`, `on_date`, `added_by`) VALUES
(25, '26', '0', 15, '1. Created Google my business product images\r\n2. Changes On A1 Services Poster\r\n3. keyword Research and Post has scheduled\r\n4. Blog (social media marketing) has Posted\r\n5. Blog has Posted', 'Completed', '2022-05-23', 0),
(26, '28', '0', 16, 'organic reach(post/comments/adding groups), facebook visiting cards download and numbers collection, contents checking', 'completed', '2022-05-23', 0),
(27, '0', '0', 14, 'Photography template added\r\nstarted notifications for bhavi online managment system', 'completed', '2022-05-23', 0),
(28, '0', '0', 15, '1. Poster Design\r\n2. keyword research\r\n3.post has scheduled', 'Completed', '2022-05-24', 0),
(29, '28', '0', 16, 'organic reach(post,comment,adding groups),  contacts collection,visiting cards downloadings, contents checking', 'completed', '2022-05-24', 0),
(30, '0', '0', 14, 'bhavi templates\r\nphotography changes - http://templates.bhavicreations.com/photography\r\nspa template - http://templates.bhavicreations.com/spa\r\nsaloon template - http://templates.bhavicreations.com/saloon', 'completed', '2022-05-24', 0),
(31, '0', '0', 15, '1. Poster Design\r\n2. Keyword Research\r\n3. Post Scheduling', 'Completed', '2022-05-25', 0),
(32, '28', '0', 16, 'organic reach(post, comment, groups adding), whatsapp bulk, content checking, download visiting cards from facebook', 'completed', '2022-05-25', 0),
(33, '0', '0', 14, 'Bhavi Meds\r\nChecked all modules & tested (we can change what ever we need)\r\n\r\nPharmacy Software\r\nBhavi meds already have pharmacy module - to check & order medicines\r\nwe need to discuss, if we need more\r\n\r\nPOS Software - Ex: Jewellery Internal Software\r\nI searched some open source code, i will let you know tomorrow about the timings for this.', 'completed', '2022-05-25', 0),
(34, '0', '0', 15, '1. Poster Design\r\n2. Keyword Research \r\n3. Post Has Scheduled\r\n4. Blog Posted', 'Completed', '2022-05-26', 0),
(35, '28', '0', 16, 'organic reach(post,comments), bulk whatsapp , download visiting cards for contacts', 'completed', '2022-05-26', 0),
(36, '28', '0', 16, 'organic reach, bulk whatsapp', 'completed', '2022-05-27', 0),
(37, '0', '0', 15, '1.Posters Design\r\n2. Keyword Research\r\n3. Post has scheduled', 'Completed', '2022-05-27', 0),
(38, '0', '0', 14, 'Worked on\r\n1. liftonics & vlksol - error page removed & updated back\r\n2. bhavicreations blog page started in new sub domain\r\nhttps://blog.bhavicreations.com/\r\n3. Web based POS system checking & timings - 2month if we start from scratch, 1month if we take any open source and change according to our need', 'completed', '2022-05-26', 0),
(39, '0', '0', 14, 'Worked on\r\nBhavi Creations Blog - Design changes\r\nBhavi POS - Downloaded sample project & analyzed the code to start development', 'completed', '2022-05-27', 0),
(40, '0', '0', 14, 'Bhavi POS - checked the code and started db changes', 'completed', '2022-05-28', 0),
(41, '0', '0', 15, '1. Posters Design\r\n2. Keyword Research\r\n3. Blog Posted\r\n4.Posters Scheduled', 'Completed', '2022-05-30', 0),
(42, '0', '0', 14, 'Bhavi POS - code & database formatting\r\nChecked Bhavi Meds for new project', 'completed', '2022-05-30', 0),
(43, '0', '0', 14, 'Bhavi meds\r\ngetting errors, if we run the project the local\r\ni tried to fix but, cant able to fix the errors\r\n\r\nwe can change in live, but if there are major changes, then it will be hard for development & testing.', 'completed', '2022-05-31', 0),
(44, '28', '0', 16, 'organic reach, bulk whatsapp', 'completed', '2022-05-31', 0),
(45, '28', '0', 16, 'organic reach, bulk whatsapp', 'completed', '2022-06-01', 0),
(46, '0', '0', 15, 'Posters Designed\r\nQuotation Template \r\nPortfolio PDF\r\nPost has Scheduled', 'Completed', '2022-06-01', 0),
(47, '0', '0', 14, 'pavanfurniturestore.com\r\ndns problem - it is not pointing to the new server\r\ni cant able to add the theme\r\ni have raised a ticket to support team to solve the dns issue\r\n\r\nbhavi meds\r\nchecked patient reports & doctor refer patient to another doctor\r\nit is complicated than expected\r\ni will continue tomorrow.', 'completed', '2022-06-01', 0),
(48, '0', '0', 15, '1. Poster Designs\r\n2. Post Scheduled\r\n3. Indiamart Catalog Update', 'Completed', '2022-06-02', 0),
(49, '28', '0', 16, 'organic reach,bulk whatsapp, emplyoee sheets details entry', 'completed', '2022-06-02', 0),
(50, '0', '0', 15, 'Poster Designs\r\nPosts scheduling\r\nKeyword Research', 'Completed', '2022-06-03', 0),
(51, '28', '0', 16, 'organic reach, bulk whatsapp, employess data', 'completed', '2022-06-03', 0),
(52, '0', '0', 14, 'pavan furniture store theme search\r\nbhavi pos - planning and structure', 'completed', '2022-06-03', 0),
(53, '28', '0', 16, 'ORGANIC REACH, bulk whatsapp, employees data', 'completed', '2022-06-04', 0),
(54, '29', '29', 10, 'Directory Submissions for bhavicreations', 'completed', '2022-06-01', 0),
(55, '29', '29', 10, 'Submissions for bhavicreations', 'completed', '2022-06-02', 0),
(56, '29', '29', 10, 'Site and Article Submissions for bhavicreations', 'completed', '2022-06-03', 0),
(57, '29', '29', 10, 'Site and Article Submissions for bhavicreations', 'completed', '2022-06-04', 0),
(58, '0', '0', 15, 'Poster Design \r\nPoster Sheduling\r\nWapp PDF ', 'Completed', '2022-06-06', 0),
(59, '0', '0', 16, 'organic reach\r\nbulk whatsapp', 'Completed', '2022-06-06', 0),
(60, '0', '0', 14, 'Bhavi POS\r\nsuppliers module started\r\n----\r\nadded designed by bhavi creations link in all websites, except huckleberry', 'completed', '2022-06-06', 0),
(61, '0', '0', 14, 'bhavicreations dns changes\r\n*bhavi pos *\r\ntheme design changes & modules finalized', 'completed', '2022-06-04', 0),
(62, '0', '0', 10, 'Team meeting and Client meeting\r\nWorked on Facebook groups for AP and TS States', 'pending', '2022-06-07', 0),
(63, '29', '29', 10, 'Site  Submissions for bhavicreations', 'completed', '2022-06-06', 0),
(64, '29', '29', 10, 'Site  Submissions for bhavicreations', 'completed', '2022-06-06', 0),
(65, '0', '0', 15, 'Today Works\r\nPDF Creations.\r\nPoster Design.\r\nFB Business Groups Filtering\r\nBulk Whatsapp PDF Recreation', 'Completed', '2022-06-07', 0),
(66, '28', '0', 16, 'bulk whatsapp, facebook group filter', 'completed', '2022-06-07', 0),
(67, '0', '0', 14, 'pharmacy & claim software analyzation & timings\r\nBhavi POS - suppliers module changes', 'completed', '2022-06-07', 0),
(68, '0', '0', 15, 'Poster design\r\nBacklink Submissions for Bhavi Creations\r\nChanges to Swathi Hearing Poster\r\n', 'Completed', '2022-06-08', 0),
(69, '0', '0', 14, 'pavanfurniturestore - https://pavanfurniturestore.com/\r\navantsacreamery - https://www.avantsacreamery.com/\r\ntheme setups', 'completed', '2022-06-08', 0),
(70, '0', '0', 15, 'Today works\r\nPosters Design\r\nClient Visiting card Design\r\nBacklink Submissions\r\nPoster Scheduling', 'Completed', '2022-06-09', 0),
(71, '28', '0', 16, 'Organic reach, bulks whatsapp, fb groups adding', 'completed', '2022-06-08', 0),
(72, '28', '0', 16, 'organic reach, bulk whatsapp,backlinks submission', 'completed', '2022-06-09', 0),
(73, '0', '0', 14, 'Bhavi POS\r\nSuppliers module completed\r\nTaxes module started - research & planning', 'completed', '2022-06-09', 0),
(74, '0', '0', 15, 'Poster Design\r\nBacklink Submissions\r\nChanges on Swathi Speach And Hearing', 'Completed', '2022-06-10', 0),
(75, '28', '0', 16, 'Organic reach, bulk whatsapp, telecalling, content checking', 'completed', '2022-06-10', 0),
(76, '0', '0', 14, 'Bhavi POS - Taxes Module Changes\r\nBhavi OMS - Planning for Salary Module & Stock in/out module', 'completed', '2022-06-11', 0),
(77, '0', '0', 15, 'Poster Design \r\nKeyword research\r\nPoster Scheduling', 'Completed', '2022-06-13', 0),
(78, '29', '29', 10, 'Submissions for bhavicreations', 'completed', '2022-06-06', 0),
(79, '29', '29', 10, 'Link Submissions\r\nGmail and google my business for Avantsa Creamery', 'completed', '2022-06-13', 0),
(80, '0', '0', 15, 'Poster Design\r\nPoster Scheduling\r\nKeyword Research', 'Completed', '2022-06-14', 0),
(81, '28', '0', 16, 'organic reach, bulk whatsapp, telecalling', 'completed', '2022-06-14', 0),
(82, '29', '29', 10, 'Link Submissions for bhavicreations.com, Proffestional instagram account for Swathi Hearing care  and created google ads manager ', 'completed', '2022-06-14', 0),
(83, '29', '29', 10, 'Link Submissions for bhavicreations.com and facebook page for Pavan Furniture and worked on bulk whatsapp and explained to client', 'completed', '2022-06-15', 0),
(84, '28', '0', 16, 'organic reach, bulkwhatsapp, telecalling, mail creating, furnitures imgaes download', 'completed', '2022-06-15', 0),
(85, '0', '0', 14, 'Bhavi Creations\r\nBlog Changes, Html Lang attr error fix\r\n\r\nCopyright changed to Bhavi Creations Pvt Ltd. in all websites\r\n\r\nPavan Furniture Store\r\nsome categories added & design changes added\r\nthere are lot of products & categories in urbanladder\r\nit will take atleast 1-2 weeks to import all the data properly\r\n\r\nBhavi OMS\r\nstock in/out module is pending', 'completed', '2022-06-15', 0),
(86, '0', '0', 15, 'Poster Deign\r\nKeyword Research\r\nPoster Scheduling\r\nClient poster Design\r\nFurniture Data Collection', 'Completed', '2022-06-15', 0),
(87, '0', '0', 15, 'Poster Design\r\nFurniture Data Collection\r\nLetter Head Change for Client', 'Completed', '2022-06-16', 0),
(88, '0', '0', 14, 'Pavan Furniture Store\r\ndesign changes, logo & some banner images added\r\n\r\nBhavi OMS\r\nstock in/out module started', 'completed', '2022-06-16', 0),
(89, '0', '0', 15, '\r\nPoster Design\r\nBuilding lifting Sites Study And Made Report\r\nPoster Scheduling', 'Completed', '2022-06-17', 0),
(90, '28', '0', 16, 'organic reach, telecalling', 'completed', '2022-06-17', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointments_tbl`
--
ALTER TABLE `appointments_tbl`
  ADD PRIMARY KEY (`appointment_id`);

--
-- Indexes for table `country_tbl`
--
ALTER TABLE `country_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `department_tbl`
--
ALTER TABLE `department_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `holidays_tbl`
--
ALTER TABLE `holidays_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `leave_tbl`
--
ALTER TABLE `leave_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login_records_tbl`
--
ALTER TABLE `login_records_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login_tbl`
--
ALTER TABLE `login_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `permissions_tbl`
--
ALTER TABLE `permissions_tbl`
  ADD PRIMARY KEY (`permission_id`);

--
-- Indexes for table `products_tbl`
--
ALTER TABLE `products_tbl`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `projects_tbl`
--
ALTER TABLE `projects_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `project_tasks_tbl`
--
ALTER TABLE `project_tasks_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `salary_tbl`
--
ALTER TABLE `salary_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `staff_tbl`
--
ALTER TABLE `staff_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `suppliers_tbl`
--
ALTER TABLE `suppliers_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `work_reports_tbl`
--
ALTER TABLE `work_reports_tbl`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appointments_tbl`
--
ALTER TABLE `appointments_tbl`
  MODIFY `appointment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `country_tbl`
--
ALTER TABLE `country_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=247;

--
-- AUTO_INCREMENT for table `department_tbl`
--
ALTER TABLE `department_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `holidays_tbl`
--
ALTER TABLE `holidays_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `leave_tbl`
--
ALTER TABLE `leave_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `login_records_tbl`
--
ALTER TABLE `login_records_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=250;

--
-- AUTO_INCREMENT for table `login_tbl`
--
ALTER TABLE `login_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `permissions_tbl`
--
ALTER TABLE `permissions_tbl`
  MODIFY `permission_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `products_tbl`
--
ALTER TABLE `products_tbl`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `projects_tbl`
--
ALTER TABLE `projects_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `project_tasks_tbl`
--
ALTER TABLE `project_tasks_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `salary_tbl`
--
ALTER TABLE `salary_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `staff_tbl`
--
ALTER TABLE `staff_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `suppliers_tbl`
--
ALTER TABLE `suppliers_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `work_reports_tbl`
--
ALTER TABLE `work_reports_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
