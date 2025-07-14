-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 17, 2022 at 06:12 PM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.4

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
(1, 'bhavi', 'progress', 'nothing', 'website', 'cold', '2022-05-02', 'closing');

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
  `added_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `department_tbl`
--

INSERT INTO `department_tbl` (`id`, `department_name`, `city`, `added_on`) VALUES
(0, 'Admin', '', '2022-04-25 15:22:26'),
(1, 'HR', '', '2019-10-04 05:25:01'),
(2, 'Development', '', '2019-10-04 05:25:09'),
(3, 'Designing', '', '2019-10-04 05:25:15'),
(4, 'Manager', '', '2022-04-23 14:03:22'),
(5, 'Manager', 'Hyderabad', '2022-04-28 15:14:06');

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
(3, 'Ugadhi', '2022-04-09', 1),
(4, 'May Day', '2022-05-01', 1);

-- --------------------------------------------------------

--
-- Table structure for table `leave_tbl`
--

CREATE TABLE `leave_tbl` (
  `id` int(11) NOT NULL,
  `staff_id` int(11) NOT NULL,
  `leave_reason` varchar(90) NOT NULL,
  `description` text NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
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
(3, 6, 'Casual Leave', 'refgtf', 2, '2022-04-24', '2022-04-28', '0000-00-00', '2022-04-22');

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
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login_records_tbl`
--

INSERT INTO `login_records_tbl` (`id`, `staff_id`, `login_date_time`, `logout_date_time`, `ip_address`, `status`) VALUES
(6, 6, '2022-04-14 17:18:22', '2022-04-14 17:28:44', '::1', 1),
(7, 1, '2022-04-14 17:29:09', '2022-04-14 17:30:03', '::1', 1),
(8, 1, '2022-04-14 17:30:58', '2022-04-14 17:31:08', '::1', 1),
(9, 1, '2022-04-16 15:59:15', '2022-04-16 16:00:04', '::1', 1),
(10, 1, '2022-04-16 16:00:11', '2022-05-16 19:58:09', '::1', 1),
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
(49, 1, '2022-04-28 16:33:27', NULL, '::1', 1),
(50, 6, '2022-04-28 16:42:32', NULL, '::1', 1),
(51, 1, '2022-05-02 16:27:15', NULL, '::1', 1),
(52, 6, '2022-05-02 17:16:02', NULL, '::1', 1),
(53, 6, '2022-05-02 17:23:03', NULL, '::1', 1),
(54, 1, '2022-05-03 16:30:32', '2022-05-03 16:52:23', '::1', 1),
(55, 6, '2022-05-03 16:52:26', '2022-05-03 16:55:26', '::1', 1),
(56, 1, '2022-05-03 16:55:30', '2022-05-03 17:23:35', '::1', 1),
(57, 1, '2022-05-03 17:27:28', '2022-05-03 17:27:42', '::1', 1),
(58, 1, '2022-05-06 15:49:05', '2022-05-06 16:46:52', '::1', 1),
(59, 6, '2022-05-06 16:46:56', '2022-05-06 16:47:09', '::1', 1),
(60, 1, '2022-05-06 16:47:19', NULL, '::1', 1),
(61, 1, '2022-05-07 15:35:38', '2022-05-07 15:37:01', '::1', 1),
(62, 6, '2022-05-07 15:37:06', '2022-05-07 15:47:17', '::1', 1),
(63, 1, '2022-05-07 15:47:20', NULL, '::1', 1),
(64, 1, '2022-05-09 15:22:33', '2022-05-09 15:56:22', '::1', 1),
(65, 1, '2022-05-09 15:56:25', '2022-05-09 15:58:34', '::1', 1),
(66, 1, '2022-05-09 15:58:37', '2022-05-09 15:59:44', '::1', 1),
(67, 1, '2022-05-09 15:59:48', '2022-05-09 19:31:40', '::1', 1),
(68, 1, '2022-05-09 19:31:42', '2022-05-09 19:32:18', '::1', 1),
(69, 1, '2022-05-09 19:32:20', NULL, '::1', 1),
(70, 1, '2022-05-10 19:48:52', '2022-05-10 20:25:54', '::1', 1),
(71, 1, '2022-05-10 21:54:20', '2022-05-10 21:54:23', '::1', 1),
(72, 6, '2022-05-10 21:54:26', NULL, '::1', 1),
(73, 1, '2022-05-12 20:33:02', NULL, '::1', 1),
(74, 1, '2022-05-14 19:28:54', NULL, '::1', 1),
(75, 1, '2022-05-16 19:58:15', NULL, '::1', 1),
(76, 1, '2022-05-17 19:30:10', NULL, '::1', 1),
(77, 6, '2022-05-17 20:14:31', NULL, '::1', 1);

-- --------------------------------------------------------

--
-- Table structure for table `login_tbl`
--

CREATE TABLE `login_tbl` (
  `id` int(11) NOT NULL,
  `username` varchar(80) NOT NULL,
  `password` varchar(80) NOT NULL,
  `usertype` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login_tbl`
--

INSERT INTO `login_tbl` (`id`, `username`, `password`, `usertype`, `status`) VALUES
(1, 'bhavicreations2022@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 1, 1),
(6, 'veduruvadauday@gmail.com', '7da7191cd7f4192b3a938236eff616a6', 2, 1),
(7, 'veduruvadauday@gmail.com', '7da7191cd7f4192b3a938236eff616a6', 2, 1),
(8, 'veduruvadauday1@gmail.com', '7da7191cd7f4192b3a938236eff616a6', 2, 1),
(9, 'veduruvadaudasy@gmail.com', '89354e98f122a2020ed0d4dd538b744f', 2, 1),
(10, 'veduruvadaudayasd@gmail.com', '7da7191cd7f4192b3a938236eff616a6', 2, 1),
(11, 'veduruvadauday@gmail.com', '7da7191cd7f4192b3a938236eff616a6', 2, 1),
(12, 'uk@gmail.com', 'b31d044bd85096b976a305fc9b1a9767', 2, 1);

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
(2, 'Unallocated Project', '', '', '1652109001_1651854843_avatar.png,', 1, '2022-05-06 00:00:00'),
(18, 'sample', '', '', '', 0, '2022-05-07 00:00:00');

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
(0, 0, '0', 'Unallocated Task', 'Unallocated Task', 0, 'high', 'completed', '2022-04-24', '2022-04-30'),
(4, 2, '6', 'Home Page Content Changes', 'Home Page Content Changes', 0, 'medium', 'completed', '2022-04-24', '2022-04-30'),
(5, 1, '6', 'sample', 'sdfsf', 0, 'low', 'pending', '2022-04-30', '0000-00-00'),
(6, 2, '7', 'sample', 'adf', 0, 'high', 'completed', '2022-05-15', '0000-00-00'),
(7, 0, '11,9,8,7,6,1', 'dgs', 'dfhdgj', 0, 'low', 'dgh', '2022-05-21', '2022-05-22'),
(8, 2, '10', 'New', 'sd', 1, 'medium', 'completed', '2022-05-17', '0000-00-00'),
(9, 2, '9', 'test', 'sdg', 0, 'low', 'completed', '2022-05-17', '0000-00-00'),
(10, 2, '9', 'ttt', 'tett', 0, 'low', 'completed', '2022-05-17', '0000-00-00'),
(11, 2, '9', 'trtrt', 'trtrt', 1, 'low', 'completed', '2022-05-17', '0000-00-00'),
(12, 2, '9', 'sdfsdfsdf', 'sdf', 1, 'high', 'sdf', '2022-05-17', '0000-00-00');

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
  `added_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `salary_tbl`
--

INSERT INTO `salary_tbl` (`id`, `staff_id`, `basic_salary`, `allowance`, `total`, `added_by`, `updated_on`, `added_on`) VALUES
(1, 2, 20000, 0, 20000, 1, '0000-00-00', '2019-10-04 05:33:29'),
(2, 3, 18000, 0, 18000, 1, '0000-00-00', '2019-10-04 05:34:01'),
(3, 4, 15000, 2500, 17500, 1, '0000-00-00', '2019-10-04 05:34:14'),
(6, 6, 20000, 2000, 22000, 1, '0000-00-00', '2022-04-25 11:26:06');

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
  `address` text,
  `city` varchar(100) NOT NULL,
  `state` varchar(100) NOT NULL,
  `country` varchar(50) NOT NULL,
  `department_id` int(11) NOT NULL,
  `pic` varchar(150) NOT NULL DEFAULT 'default-pic.jpg',
  `files` longtext NOT NULL,
  `added_by` int(11) NOT NULL,
  `updated_on` date NOT NULL,
  `added_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `staff_tbl`
--

INSERT INTO `staff_tbl` (`id`, `staff_name`, `gender`, `email`, `mobile`, `dob`, `doj`, `employee_id`, `blood_group`, `address`, `city`, `state`, `country`, `department_id`, `pic`, `files`, `added_by`, `updated_on`, `added_on`) VALUES
(1, 'Bhavi Creations', 'Male', 'bhavicreations2022@gmail.com', 9642343434, '2022-04-15', '2022-04-15', 'EMP0125', '', 'kakinada', 'kakinada', 'Andhra Pradesh', 'India', 0, 'default-pic.jpg', '', 1, '0000-00-00', '2022-05-06 14:42:36'),
(6, 'Uday Kumar Veduruvada', 'Male', 'veduruvadauday@gmail.com', 8712965092, '1995-09-15', '2022-03-03', '3235345da', 'b+', 'Quthbullapur.', 'Hyderabad', 'Telangana', 'India', 2, 'thirumala-removebg-preview.png', '', 0, '0000-00-00', '2022-05-06 14:47:04'),
(7, 'Uday Kumar Veduruvada', 'Male', 'veduruvadauday@gmail.com', 8712965092, '2022-06-22', '2022-04-30', '3235345', 'b+', '4-36/1, Bola Shankar Nagar, Quthbullapur\r\nNear old shivalayam temple', 'Hyderabad', 'Telangana', 'India', 2, 'default-pic.jpg', '', 1, '0000-00-00', '2022-05-06 13:52:11'),
(8, 'Uday Kumar Veduruvada', 'Male', 'veduruvadauday1@gmail.com', 8712965092, '2022-05-08', '2022-05-13', 'E0001', 'b+', '4-36/1, Bola Shankar Nagar, Quthbullapur\r\nNear old shivalayam temple', 'Hyderabad', 'Telangana', 'India', 2, 'default-pic.jpg', '', 1, '0000-00-00', '2022-05-09 15:25:48'),
(9, 'Uday Kumar Veduruvada', 'Male', 'veduruvadaudasy@gmail.com', 7129650925, '2022-05-22', '2022-05-15', 'zxc', 'b+', '4-36/1, Bola Shankar Nagar, Quthbullapur\r\nNear old shivalayam temple', 'Hyderabad', 'Telangana', 'India', 2, '1651937714_Homepage_and_about_us_page_content_(1)1.docx', '', 1, '0000-00-00', '2022-05-09 15:26:34'),
(10, 'Uday Kumar Veduruvada', 'Male', 'veduruvadaudayasd@gmail.com', 8712965092, '2022-05-07', '2022-05-08', 'adadf', 'adf', '4-36/1, Bola Shankar Nagar, Quthbullapur\r\nNear old shivalayam temple', 'Hyderabad', 'Telangana', 'India', 2, '1651937837_user1-128x1281.jpg', '', 1, '0000-00-00', '2022-05-09 15:27:07'),
(11, 'Uday Kumar Veduruvadaad', 'Male', 'veduruvadauday@gmail.com', 8712965092, '2022-05-08', '2022-05-15', 'asd', 'asf', '4-36/1, Bola Shankar Nagar, Quthbullapur\r\nNear old shivalayam temple', 'Hyderabad', 'Telangana', 'India', 1, '1651938193_WhatsApp_Image_2022-03-19_at_1_49_06_PM1.jpeg', '', 1, '0000-00-00', '2022-05-09 15:26:55'),
(12, 'uk', 'Male', 'uk@gmail.com', 8745764568, '2022-05-14', '2022-05-12', 'adsda', 'adfadf', 'asfsdvsdv sd sd ', 'adf', 'adf', 'Bangladesh', 2, 'user1-128x128.jpg', '1652104366_tiles.pdf,1652103467_experience.jpg,1652103467_textile.jpg', 0, '0000-00-00', '2022-05-09 13:55:16');

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
(12, '2', '0', 6, 'tyuuj ttu', 't iyui', '2022-05-29', 0),
(13, '18', '0', 6, 'fgh', 'completed', '2022-05-10', 0),
(14, '18', '2', 6, 'h', 'gchj', '2022-05-10', 0);

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
  MODIFY `appointment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `country_tbl`
--
ALTER TABLE `country_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=247;

--
-- AUTO_INCREMENT for table `department_tbl`
--
ALTER TABLE `department_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `holidays_tbl`
--
ALTER TABLE `holidays_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `leave_tbl`
--
ALTER TABLE `leave_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `login_records_tbl`
--
ALTER TABLE `login_records_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- AUTO_INCREMENT for table `login_tbl`
--
ALTER TABLE `login_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `projects_tbl`
--
ALTER TABLE `projects_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `project_tasks_tbl`
--
ALTER TABLE `project_tasks_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `salary_tbl`
--
ALTER TABLE `salary_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `staff_tbl`
--
ALTER TABLE `staff_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `work_reports_tbl`
--
ALTER TABLE `work_reports_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
