-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 06, 2022 at 12:25 PM
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
  `lead_type` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `close_status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `appointments_tbl`
--

INSERT INTO `appointments_tbl` (`appointment_id`, `client`, `status`, `remarks`, `service`, `lead_type`, `date`, `close_status`) VALUES
(1, 'bhavi', 'progress', 'nothing', 'website', 'hot', '2022-05-02', 'non-closing');

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
(4, 6, 'personal', 'personal work', 0, '2022-04-27', '2022-04-28', '0000-00-00', '2022-04-27');

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
(84, 1, '2022-05-06 12:22:16', NULL, '175.101.26.36', 1);

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
(10, 'chinnu6202@gmail.com', 'a7f17d20f07f92896ef601cd24cd0f8b', 2, 1),
(11, 'krishnapriyavemulapalli696@gmail.com', '7af6c76492c84a6fe17925241acaf81d', 2, 1),
(12, 'shariffsimpson@gmail.com', '66532e1976bf2cb494e710271ebb563c', 2, 1),
(13, 'prathyushabommidi@gmail.com', '4c6939d28a61ad19604db0d6decc05ce', 2, 1),
(14, 'veduruvadauday@gmail.com', '7da7191cd7f4192b3a938236eff616a6', 2, 1),
(15, 'sairamkada0290@gmail.com', '22cb5bd67047ca4a478cf7dd0ad00dd5', 2, 1),
(16, 'deviprasanna243@gmail.com', '11debd92c2bbcbacc187799176adb3b5', 2, 1),
(17, 'anthonykunche.kamal@gmail.com', 'd6042d96e57b2da00af983deccf5ecc1', 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `projects_tbl`
--

CREATE TABLE `projects_tbl` (
  `id` int(11) NOT NULL,
  `project_name` varchar(255) NOT NULL,
  `project_link` varchar(255) NOT NULL,
  `project_details` longtext NOT NULL,
  `status` int(11) NOT NULL,
  `date_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `projects_tbl`
--

INSERT INTO `projects_tbl` (`id`, `project_name`, `project_link`, `project_details`, `status`, `date_time`) VALUES
(3, 'Bhavi creations', 'https://bhavicreations.com/', 'our company website', 0, '2022-04-02 00:00:00'),
(4, 'Bhavi Meds', 'https://bhavimeds.com/', 'Hospital management system', 0, '2022-04-25 00:00:00'),
(5, 'Bhavi digitalVcard', 'https://bhavidigitalvcard.com/', 'Our digital business card platform makes designing a card simple, convenient, and reliable. create what you need in Just 5 minutes', 0, '2022-04-20 00:00:00'),
(6, 'VLK Solutions', 'http://www.vlksol.com/', 'We created Website for VLk Solutions', 0, '2022-01-03 00:00:00'),
(7, 'Liftonics', 'http://www.liftonics.com/', 'We created a Website for liftonics', 0, '2022-01-06 00:00:00'),
(8, 'Anna Real Estate', 'http://annarealestate.in/', 'We created a Websites and social media pages', 0, '2022-01-08 00:00:00'),
(9, 'First Focus services', 'https://firstfocusservices.com/', 'We created a Website but not completed', 0, '2022-01-06 00:00:00'),
(10, 'On me Security', 'http://www.onmesecurity.com/', 'We created a website', 0, '2022-01-06 00:00:00'),
(11, 'Huckleberry it solutions', 'https://huckleberryitsolutions.com/', 'We created a website and social media pages and posters', 0, '2022-01-06 00:00:00'),
(12, 'AIEV', 'http://aiev.in/', 'We created a website', 0, '2022-01-06 00:00:00'),
(13, 'Pets World', 'https://bhavicreations.com/', 'Visiting card, Pamplate', 0, '2022-05-04 00:00:00'),
(14, 'A1 Services', 'https://bhavicreations.com/', 'Designed logo', 0, '2022-05-01 00:00:00'),
(16, 'Sri Shanmukha Bio plantiec', 'https://bhavicreations.com/', 'Broucher', 0, '2022-04-25 00:00:00');

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
  `task_status` varchar(255) NOT NULL,
  `due_date` date NOT NULL,
  `completed_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `project_tasks_tbl`
--

INSERT INTO `project_tasks_tbl` (`id`, `project_id`, `assigned_to`, `task_name`, `task_details`, `task_status`, `due_date`, `completed_date`) VALUES
(0, 0, '0', 'Unallocated Task', 'Unallocated Task', 'completed', '2022-04-24', '2022-04-30'),
(4, 2, '6', 'Home Page Content Changes', 'Home Page Content Changes', 'completed', '2022-04-24', '2022-04-30'),
(5, 1, '6', 'sample', 'sample task details', 'pending', '2022-04-30', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `salary_tbl`
--

CREATE TABLE `salary_tbl` (
  `id` int(11) NOT NULL,
  `staff_id` int(11) NOT NULL,
  `basic_salary` bigint(20) NOT NULL,
  `allowance` bigint(20) NOT NULL,
  `total` bigint(20) NOT NULL,
  `added_by` int(11) NOT NULL,
  `updated_on` date NOT NULL,
  `added_on` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `salary_tbl`
--

INSERT INTO `salary_tbl` (`id`, `staff_id`, `basic_salary`, `allowance`, `total`, `added_by`, `updated_on`, `added_on`) VALUES
(1, 2, 20000, 0, 20000, 1, '0000-00-00', '2019-10-04 05:33:29'),
(2, 3, 18000, 0, 18000, 1, '0000-00-00', '2019-10-04 05:34:01'),
(3, 4, 15000, 2500, 17500, 1, '0000-00-00', '2019-10-04 05:34:14'),
(6, 6, 20000, 2000, 22000, 1, '0000-00-00', '2022-04-25 11:26:06'),
(8, 10, 15000, 0, 15000, 1, '0000-00-00', '2022-05-06 12:36:08'),
(9, 12, 15000, 0, 15000, 1, '0000-00-00', '2022-05-06 12:36:08'),
(10, 13, 6000, 0, 6000, 1, '0000-00-00', '2022-05-06 12:36:08'),
(11, 14, 15000, 0, 15000, 1, '0000-00-00', '2022-05-06 12:36:08'),
(13, 9, 50000, 0, 50000, 1, '0000-00-00', '2022-05-06 12:36:23'),
(14, 11, 15000, 0, 15000, 1, '0000-00-00', '2022-05-06 12:37:05'),
(15, 17, 30000, 0, 30000, 1, '0000-00-00', '2022-05-06 12:37:05'),
(16, 15, 2598, 0, 2598, 1, '0000-00-00', '2022-05-06 13:30:50');

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
  `added_by` int(11) NOT NULL,
  `updated_on` date NOT NULL,
  `added_on` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `staff_tbl`
--

INSERT INTO `staff_tbl` (`id`, `staff_name`, `gender`, `email`, `mobile`, `dob`, `doj`, `employee_id`, `blood_group`, `address`, `city`, `state`, `country`, `department_id`, `pic`, `added_by`, `updated_on`, `added_on`) VALUES
(1, 'Bhavi Creations', 'Male', 'bhavicreations2022@gmail.com', 123456789, '2022-04-15', '2022-04-15', '', '', 'kakinada', 'kakinada', 'Andhra Pradesh', 'India', 0, 'default-pic.jpg', 1, '0000-00-00', '2022-04-20 13:48:12'),
(9, 'Ch Naga Phaneendra', 'Male', 'phanIchalikonda@gmail.com', 8686394079, '1992-11-20', '2022-02-24', 'BCKKD001', 'A+', '41-1/14-205, Near nirmala sishu bhavan,Krishnalanka, Vijayawada', 'vijayawada', 'AP', 'India', 6, 'WhatsApp_Image_2022-05-06_at_4_56_03_PM.jpeg', 1, '0000-00-00', '2022-05-06 11:32:31'),
(10, 'Adina Venkata Raju', 'Male', 'chinnu6202@gmail.com', 7842800565, '1994-08-25', '2022-03-18', 'BCKKD002', 'A+', '9-33-111, 16th ward, NZP-RPL Road,Sukaplli, Repalle Mandal,Guntur-522265', 'Guntur', 'Andhra pradesh', 'India', 7, 'Image_Venkat.jpeg', 1, '0000-00-00', '2022-05-06 11:46:20'),
(11, 'Gottipati krishna priya', 'Female', 'krishnapriyavemulapalli696@gmail.com', 7093639208, '1988-10-14', '2022-04-01', 'BCKKD003', 'O+', '2-141, Old Harijanawada Tenneru, krishna Andhra pradesh-521260', 'Vijyawada', 'Andhra Pradesh', 'India', 9, 'priya.jpeg', 1, '0000-00-00', '2022-05-06 11:55:40'),
(12, 'Shaik Mahaboob Shariff', 'Male', 'shariffsimpson@gmail.com', 8712387490, '1998-12-18', '2022-03-01', 'BCKKD004', 'B+', 'Urvasi, kancharapalem,visakhapatnam', 'visakhapatnam', 'Andhra Pradesh', 'India', 7, 'shariff.png', 1, '0000-00-00', '2022-05-06 12:06:03'),
(13, 'Bommidi Pratyusha', 'Female', 'prathyushabommidi@gmail.com', 8106563840, '1991-03-07', '2022-03-08', 'BCKKD005', 'O+', '8-91, ff-1, Shirdi sai nagar road, tadigadapa donka road, yenmalakuduru, vijayawada-7', 'Vijayawada', 'Andhra Pradesh', 'India', 7, 'pratyusha.jpeg', 1, '0000-00-00', '2022-05-06 12:11:06'),
(14, 'Veduruvada Uday Kumar', 'Male', 'veduruvadauday@gmail.com', 8712965092, '1995-09-15', '2022-03-03', 'BCKKD006', 'B+', '4-36/1, Bolashankar Nagar, near  old Shivalayam temple, Kutubullapur,Rangareddi,Andhra pradesh , 500055', 'Kutubullapur', 'Andhra Pradesh', 'India', 7, 'uday.jpg', 1, '0000-00-00', '2022-05-06 12:16:14'),
(15, 'Kada sairam', 'Male', 'sairamkada0290@gmail.com', 9440491273, '1997-12-02', '2022-04-25', 'BCKKD007', 'A+', 'Bodhilanka, K Gangavaram mandal, Bhatlapalika,Dangeru, Andhra Pradesh,533263', 'Draksharama', 'Andhra Pradesh', 'India', 7, 'sai.jpg', 1, '0000-00-00', '2022-05-06 12:27:17'),
(16, 'Juttuga Devi prasanna', 'Female', 'deviprasanna243@gmail.com', 9676212573, '2000-05-29', '2022-04-27', 'BCKKD008', 'B+', '3-81 Dongalagudem K.Gangavaram mandal,Bhatlapalika, dangeru, Andhra pradesh- 533263', 'Draksharama', 'Andhra Pradesh', 'India', 8, 'prasanna.jpg', 1, '0000-00-00', '2022-05-06 12:30:14'),
(17, 'Kunche Kamal Kumar', 'Male', 'anthonykunche.kamal@gmail.com', 9052555608, '1980-12-22', '2022-05-02', 'BCKKD009', 'B+', '3-16-15/3A Rajalaksmi nagar Gudarigunta, Kakinada', 'Kakinada', 'Andhra Pradesh', 'India', 9, 'Image_Kamal.jpg', 1, '0000-00-00', '2022-05-06 12:33:21');

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
  MODIFY `appointment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `login_records_tbl`
--
ALTER TABLE `login_records_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;

--
-- AUTO_INCREMENT for table `login_tbl`
--
ALTER TABLE `login_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `projects_tbl`
--
ALTER TABLE `projects_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `project_tasks_tbl`
--
ALTER TABLE `project_tasks_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `salary_tbl`
--
ALTER TABLE `salary_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `staff_tbl`
--
ALTER TABLE `staff_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `work_reports_tbl`
--
ALTER TABLE `work_reports_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
