-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 17, 2025 at 11:06 AM
-- Server version: 10.6.22-MariaDB-0ubuntu0.22.04.1
-- PHP Version: 8.1.2-1ubuntu2.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `office`
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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

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
-- Table structure for table `clients_tbl`
--

CREATE TABLE `clients_tbl` (
  `client_id` int(11) NOT NULL,
  `client_name` varchar(255) NOT NULL DEFAULT '',
  `client_email` varchar(255) NOT NULL DEFAULT '',
  `client_mobile` varchar(255) NOT NULL DEFAULT '',
  `client_address` longtext NOT NULL DEFAULT '',
  `client_details` longtext NOT NULL,
  `refered_by` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `updated_on` datetime NOT NULL,
  `added_on` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `clients_tbl`
--

INSERT INTO `clients_tbl` (`client_id`, `client_name`, `client_email`, `client_mobile`, `client_address`, `client_details`, `refered_by`, `status`, `updated_on`, `added_on`) VALUES
(7, 'D.V.S. Kiran Raju, M.D.S - Srinivasa Multi Speciality Dental Hospital', 'srinivasadentalkakinada@gmail.com', '9569568567', 'Rama Rao Peta, Kakinada, Andhra Pradesh 533001', 'Dental Hospital', 'Revanth Garu - Brand Buzz', 1, '2025-07-13 12:51:01', '2025-07-13 12:30:16'),
(8, 'Dr. B. Suresh Kumar MDD(Ortho) - Krishna Denta Cure', 'drsureshkumar1.com@gmail.com', '92466 58770', '29-33-9/10, Devi Chowk Circle, near Alluri Sita Rama Raju Junction, Jampet, Rajamahendravaram, Andhra Pradesh 533104', 'Dental Hospital', 'Kiran Raju Garu (Srinivasa Dental)', 1, '2025-07-13 12:37:07', '2025-07-13 12:33:38'),
(9, 'Dr. Kalyan Chakravarty B.D.S - Apple Dental', 'appledentalclinic2025@gmail.com', '9293056083', 'D.No.22-1-10, 1st Floor, A.G. Complex, Phool Baugh Road, Near Ambatisatram Jn., Vizianagaram - 535 002', 'Dental Hospital', 'Suresh Garu - Krishna Dental', 1, '2025-07-13 12:53:43', '2025-07-13 12:53:04'),
(10, 'Dr. Abhilash - Vision Multi Speciality Dental Hospital ', 'visiondentalguntur@gmail.com', '93914 57072', 'Ngo’s Colony Main Road, Corner, 5th Line, opposite prudhvi prisitine, Venkata Ramana Colony, Guntur, Andhra Pradesh 522004', 'Dental Hospital', '', 1, '2025-07-13 13:05:51', '2025-07-13 13:05:28'),
(11, 'Dr.K.V.Krishnam Raju - Teeth Denture & implants specialist - LEELA SUPER SPECIALITY DENTAL HOSPITAL', 'leeladentalcare123@gmail.com', '9493782298,  7674824667', 'D.NO: 2-18-9/1, opposite to old SP Office Road Near RMC Ground Madhavnagar,Kakinada-533003', 'Dental Hospital ', '', 1, '0000-00-00 00:00:00', '2025-07-13 13:09:51'),
(12, 'Dr. P. Indeevar Reddy B.D.S.,M.D.S (periodonist & Implantologist) - Revansh Dental Hospital', 'revanshdentalphysiotherapy@gmail.com', '9493346026, 9666289499', 'Revansh Dental Hospital\r\nOpposite Icici Bank,1st Floor,Above Jawed Habeeb,mangalagiri-Tenali Road,Mangalagiri-522503', 'Dental Hospital', '', 1, '0000-00-00 00:00:00', '2025-07-13 13:12:31'),
(13, 'Dr. P. S. Subhash M.B.B.S., M.S., M.Ch (Plastic Surgery) Fellowship in Microsurgery (Tata Medical Center) -  For BeaYoutiful You ', 'drsubashplasticsurgery@gmail.com', '9989802260 , 8885111587', '3rd Floor, Near Subbayya Hotel, Kondayya palem Bridge Road, Ramarao peta, Kakinada', 'Plastic Surgeon ', '', 1, '0000-00-00 00:00:00', '2025-07-13 13:18:17'),
(14, 'Dr. K.Priyanka, MBBS, MS  Gynaecologist and Obstetrician - LEELA HOSPITAL - Women’s health care ', 'leelawomenshealthcare@gmail.com', '91006 86678', 'Sp office , near RMC ground, opposite Main Road, Madhavnagar, Kakinada, Andhra Pradesh 533003 ', 'Gynaecologist and Obstetrician', '', 1, '0000-00-00 00:00:00', '2025-07-13 13:23:58'),
(15, 'Renew Skin Clinic ', 'renewneurostar@gmail.com', '9032591108', 'Neurostar Hospital, B Block, Kakinada -533003', 'Skin Clinic ', '', 1, '0000-00-00 00:00:00', '2025-07-13 13:27:38'),
(16, 'Neurostar Multi Speciality Hospital - ', 'neurostar36@gmail.com', '9121476777 , 9885943399', '67-19-1, opp. Ashram School, Nagamalli Thota, Kakinada, 533003', '', '', 1, '0000-00-00 00:00:00', '2025-07-13 13:30:39'),
(17, 'Dr. Rao Sowmya Manasa  MBBS, MD (DVL) Consultant Dermatologist &  Cosmetologist -  Sri Hari Skin & Kidney Clinic', 'srihariskinclinic@gmail.com', '6301931396', '22-2-7 Mathrusri complex, Raja Rammohan Roy street, Kakinada, 533001(Beside MRO office)', 'Skin Clinic ', '', 1, '0000-00-00 00:00:00', '2025-07-13 13:35:37'),
(18, 'Dr. K Pradeep Bhaskar  MBBS,DNB(Rad Onc)  FIGRS(Fellowship in Stereotactic Radiosurgery)  consultant Radiation Oncologist - Ask Oncology', 'prabhaleo2003@gmail.com', ' 84069 07980', 'ADB Rd, near Achampet Junction, Kakinada, \r\nAndhra Pradesh 533005', 'Radiation Oncologist', '', 1, '0000-00-00 00:00:00', '2025-07-13 13:40:11'),
(19, 'Sreenikashrcenter', 'Sreenikashrcenter@gmail.com', '93921 89262', 'Road No. 12, Allwyn X Road, Indra Reddy Allwyn Colony, Hafeezpet, Hyderabad, Telangana 500049', 'Speech & Hearing Center ', '', 1, '0000-00-00 00:00:00', '2025-07-13 13:43:07');

-- --------------------------------------------------------

--
-- Table structure for table `client_advance_tbl`
--

CREATE TABLE `client_advance_tbl` (
  `id` int(11) NOT NULL,
  `client_name` varchar(255) NOT NULL,
  `advance_type` varchar(50) DEFAULT NULL,
  `amount` decimal(10,2) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date DEFAULT NULL,
  `description` text DEFAULT NULL,
  `total_installments` int(3) NOT NULL DEFAULT 1,
  `monthly_installment_amount` decimal(10,2) NOT NULL,
  `paid_amount` decimal(10,2) DEFAULT 0.00,
  `balance_amount` decimal(10,2) NOT NULL,
  `status` varchar(20) NOT NULL DEFAULT 'Active',
  `approved_by` int(11) DEFAULT NULL,
  `approved_at` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `company_assets_tbl`
--

CREATE TABLE `company_assets_tbl` (
  `id` int(11) NOT NULL,
  `company_logo_path` varchar(255) DEFAULT NULL,
  `company_stamp_path` varchar(255) DEFAULT NULL,
  `digital_signature_path` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `company_assets_tbl`
--

INSERT INTO `company_assets_tbl` (`id`, `company_logo_path`, `company_stamp_path`, `digital_signature_path`, `created_at`, `updated_at`) VALUES
(1, '417f5095c689e9902c483c4ea2869186.png', NULL, 'c955ddd255b2e80dec3eac82d4a5e877.jpeg', '2025-07-14 23:45:08', '2025-07-17 09:25:34');

-- --------------------------------------------------------

--
-- Table structure for table `country_tbl`
--

CREATE TABLE `country_tbl` (
  `id` int(11) NOT NULL,
  `country_code` varchar(2) NOT NULL DEFAULT '',
  `country_name` varchar(100) NOT NULL DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `department_tbl`
--

INSERT INTO `department_tbl` (`id`, `department_name`, `city`, `added_on`) VALUES
(0, 'Admin', '', '2022-04-25 15:22:26'),
(20, 'Admin', 'Kakinada', '2025-03-01 12:07:49'),
(21, 'Social Media Management', 'kakinada', '2025-03-01 12:05:58'),
(22, 'Desiging', 'Kakinada', '2025-03-01 12:06:07'),
(23, 'SEO', 'Kakinada', '2025-03-01 12:06:14'),
(24, 'Website development', 'Kakinada', '2025-03-01 12:06:56'),
(25, 'Content writters', 'Kakinada', '2025-03-01 12:07:12'),
(26, 'Quality checkers', 'Kakinada', '2025-03-01 12:07:24'),
(27, 'Tellecaller ', 'Kakinada', '2025-07-13 06:48:24'),
(28, 'Marketing Executive', 'Kakinada', '2025-07-13 08:17:21');

-- --------------------------------------------------------

--
-- Table structure for table `holidays_tbl`
--

CREATE TABLE `holidays_tbl` (
  `id` int(11) NOT NULL,
  `holiday_name` varchar(255) NOT NULL,
  `holiday_date` date NOT NULL,
  `holiday_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `holidays_tbl`
--

INSERT INTO `holidays_tbl` (`id`, `holiday_name`, `holiday_date`, `holiday_status`) VALUES
(17, '3rd Saturday', '2025-03-15', 1),
(18, 'UGADI', '2025-03-30', 1),
(19, 'RAMZAN', '2025-03-31', 1);

-- --------------------------------------------------------

--
-- Table structure for table `installment_payments_tbl`
--

CREATE TABLE `installment_payments_tbl` (
  `id` int(11) NOT NULL,
  `client_advance_id` int(11) NOT NULL,
  `payment_date` date NOT NULL,
  `amount_paid` decimal(10,2) NOT NULL,
  `payment_method` varchar(50) DEFAULT NULL,
  `remarks` text DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `installment_payments_tbl`
--

INSERT INTO `installment_payments_tbl` (`id`, `client_advance_id`, `payment_date`, `amount_paid`, `payment_method`, `remarks`, `created_at`) VALUES
(1, 2, '2025-07-15', 5000.00, 'cash', '', '2025-07-15 17:33:58'),
(2, 2, '2025-07-15', 10000.00, '', '', '2025-07-15 17:34:06'),
(3, 2, '2025-07-15', 5000.00, '', '', '2025-07-15 17:34:28');

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `leave_tbl`
--

INSERT INTO `leave_tbl` (`id`, `staff_id`, `leave_reason`, `description`, `status`, `leave_from`, `leave_to`, `updated_on`, `applied_on`) VALUES
(1, 2, 'Headache', 'Headache', 1, '2019-10-07', '2019-10-09', '0000-00-00', '2019-10-04'),
(2, 5, 'Casual Leave', 'allow me foe leave', 1, '2022-04-12', '2022-04-12', '0000-00-00', '2022-04-11'),
(3, 6, 'Casual Leave', 'refgtf', 2, '2022-04-24', '2022-04-24', '0000-00-00', '2022-04-22'),
(4, 6, 'personal', 'personal work', 0, '2022-04-27', '2022-04-28', '0000-00-00', '2022-04-27'),
(5, 15, 'For Hospital Lab Tests', 'please Approve my leave', 0, '2022-05-31', '2022-06-01', '0000-00-00', '2022-05-30'),
(6, 10, 'My brother marriage ', 'My brother marriage on 9th june 2022. So i have to attend please grant my leave', 0, '2022-06-08', '2022-06-10', '0000-00-00', '2022-06-06'),
(7, 60, 'To Attend and participating family function at mummidivaram ', 'sir, i want to my family function at my home town mummidivaram at Tuesday and i return to office at Wednesday . please grant me a one day leave for me', 0, '2025-03-18', '2025-03-19', '0000-00-00', '2025-03-14'),
(8, 59, 'To attend family event', 'Sir, i want a leave for one day on Wednesday on this week because of attend of a family event ', 0, '2025-03-26', '2025-03-27', '0000-00-00', '2025-03-24'),
(9, 64, 'work', '', 0, '2025-03-24', '2025-03-24', '0000-00-00', '2025-03-26'),
(10, 62, 'GOING TO TIRUPATI ', 'sir I\'m Traveling to tirupati for personal reasons. so I need leave from friday afternoon onwards and saturday. sunday and monday are public holidays as usual and then tuesday consider as casual leave  . please let me know if any further informations required. Thank you for your understanding.', 0, '2025-03-29', '2025-04-01', '0000-00-00', '2025-03-27');

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

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
(249, 1, '2022-06-18 21:50:57', '2022-06-18 21:58:09', '175.101.26.36', 1),
(250, 14, '2022-06-18 21:58:14', NULL, '175.101.26.36', 1),
(251, 1, '2022-06-18 23:42:35', NULL, '49.156.148.14', 1),
(252, 10, '2022-06-20 11:28:47', NULL, '49.156.148.14', 1),
(253, 10, '2022-06-20 18:26:11', NULL, '49.156.148.14', 1),
(254, 16, '2022-06-20 18:26:16', NULL, '49.156.148.14', 1),
(255, 15, '2022-06-20 18:26:48', NULL, '49.156.148.14', 1),
(256, 1, '2022-06-21 11:33:38', NULL, '49.156.148.14', 1),
(257, 1, '2022-06-21 11:34:27', '2022-06-21 11:43:36', '175.101.26.36', 1),
(258, 15, '2022-06-21 18:21:56', NULL, '49.156.148.14', 1),
(259, 10, '2022-06-21 18:34:53', NULL, '49.156.148.14', 1),
(260, 1, '2022-06-21 19:10:44', NULL, '49.156.148.14', 1),
(261, 15, '2022-06-22 18:51:04', NULL, '49.156.148.14', 1),
(262, 16, '2022-06-22 18:59:02', NULL, '49.156.148.14', 1),
(263, 15, '2022-06-23 18:38:34', NULL, '49.156.148.14', 1),
(264, 16, '2022-06-23 18:41:37', NULL, '49.156.148.14', 1),
(265, 16, '2022-06-23 18:41:38', NULL, '49.156.148.14', 1),
(266, 15, '2022-06-24 18:50:35', NULL, '49.156.148.14', 1),
(267, 1, '2022-06-25 10:54:30', NULL, '49.156.148.14', 1),
(268, 16, '2022-06-27 18:26:49', NULL, '49.156.148.14', 1),
(269, 15, '2022-06-27 18:40:03', NULL, '49.156.148.14', 1),
(270, 16, '2022-06-28 19:22:19', NULL, '49.156.148.14', 1),
(271, 15, '2022-06-29 18:35:52', NULL, '49.156.148.14', 1),
(272, 16, '2022-06-29 18:42:38', NULL, '49.156.148.14', 1),
(273, 10, '2022-06-30 15:02:50', NULL, '49.156.148.14', 1),
(274, 16, '2022-06-30 18:53:07', NULL, '49.156.148.14', 1),
(275, 15, '2022-06-30 18:53:22', NULL, '49.156.148.14', 1),
(276, 16, '2022-07-01 18:23:42', NULL, '49.156.148.14', 1),
(277, 15, '2022-07-01 18:23:58', NULL, '49.156.148.14', 1),
(278, 16, '2022-07-01 18:24:25', NULL, '49.156.148.14', 1),
(279, 16, '2022-07-02 18:17:33', NULL, '49.156.148.14', 1),
(280, 15, '2022-07-02 18:25:32', NULL, '49.156.148.14', 1),
(281, 10, '2022-07-04 17:04:47', NULL, '49.156.148.14', 1),
(282, 15, '2022-07-04 18:28:18', '2022-07-04 18:32:23', '49.156.148.14', 1),
(283, 10, '2022-07-05 17:36:17', NULL, '49.156.148.14', 1),
(284, 15, '2022-07-05 18:41:24', NULL, '49.156.148.14', 1),
(285, 15, '2022-07-07 18:31:22', NULL, '49.156.148.14', 1),
(286, 15, '2022-07-08 18:34:35', NULL, '49.156.148.14', 1),
(287, 17, '2022-07-13 12:35:07', NULL, '106.77.166.113', 1),
(288, 10, '2022-07-14 14:19:36', NULL, '223.185.98.81', 1),
(289, 15, '2022-07-15 18:14:33', NULL, '49.156.148.14', 1),
(290, 1, '2022-07-18 22:08:03', '2022-07-18 22:11:12', '175.101.26.36', 1),
(291, 10, '2022-07-19 14:37:59', NULL, '49.156.148.14', 1),
(292, 10, '2022-07-19 18:28:33', NULL, '49.156.148.14', 1),
(293, 10, '2022-07-20 18:28:36', NULL, '49.156.148.14', 1),
(294, 1, '2022-07-25 15:56:53', '2022-07-25 15:59:34', '49.156.148.14', 1),
(295, 14, '2022-07-25 15:59:40', '2022-07-25 17:10:33', '49.156.148.14', 1),
(296, 1, '2022-07-25 17:10:39', NULL, '49.156.148.14', 1),
(297, 10, '2022-07-28 19:54:46', NULL, '49.156.148.14', 1),
(298, 1, '2022-07-29 18:31:16', NULL, '106.217.199.52', 1),
(299, 1, '2022-08-25 11:25:59', NULL, '49.156.148.14', 1),
(300, 1, '2022-08-29 11:02:39', NULL, '175.101.26.34', 1),
(301, 1, '2022-08-30 11:53:52', NULL, '223.185.67.132', 1),
(302, 1, '2022-09-16 12:05:12', NULL, '223.227.105.202', 1),
(303, 15, '2022-09-18 11:26:41', NULL, '157.48.217.163', 1),
(304, 1, '2022-09-21 14:56:47', NULL, '106.217.199.56', 1),
(305, 1, '2022-10-08 11:58:14', NULL, '223.185.115.154', 1),
(306, 1, '2022-10-08 13:41:01', NULL, '106.0.38.71', 1),
(307, 1, '2022-10-08 17:49:02', NULL, '144.48.225.121', 1),
(308, 1, '2022-10-20 15:16:27', NULL, '106.217.199.28', 1),
(309, 1, '2022-10-22 12:39:59', NULL, '106.217.199.18', 1),
(310, 1, '2022-10-25 10:17:19', NULL, '223.187.51.134', 1),
(311, 1, '2022-10-25 18:23:55', NULL, '106.0.38.71', 1),
(312, 1, '2022-10-25 18:26:05', '2022-10-25 18:34:07', '43.241.66.6', 1),
(313, 1, '2022-11-05 16:02:55', NULL, '223.187.44.176', 1),
(314, 1, '2022-11-05 21:09:36', NULL, '202.133.63.227', 1),
(315, 1, '2022-11-05 21:56:23', NULL, '49.37.130.25', 1),
(316, 1, '2022-11-26 19:11:37', NULL, '106.0.38.29', 1),
(317, 1, '2022-11-26 19:25:41', NULL, '202.133.63.227', 1),
(318, 15, '2023-03-10 12:42:11', '2023-03-10 12:42:53', '203.109.75.147', 1),
(319, 1, '2023-04-15 16:12:14', NULL, '202.133.63.226', 1),
(320, 1, '2023-04-15 16:14:22', NULL, '202.133.63.226', 1),
(321, 1, '2023-04-20 16:16:29', NULL, '223.187.35.152', 1),
(322, 1, '2023-04-20 17:05:08', NULL, '202.133.63.226', 1),
(323, 1, '2023-10-12 20:39:35', NULL, '152.58.197.30', 1),
(324, 14, '2023-10-12 20:58:51', NULL, '152.58.197.30', 1),
(325, 1, '2023-10-17 19:47:10', NULL, '106.195.75.152', 1),
(326, 1, '2023-10-18 00:25:16', NULL, '49.37.131.102', 1),
(327, 1, '2023-10-18 06:23:58', NULL, '202.133.63.226', 1),
(328, 1, '2023-10-18 21:30:57', NULL, '202.133.63.226', 1),
(329, 20, '2023-10-18 21:35:29', NULL, '202.133.63.226', 1),
(330, 1, '2023-10-19 09:52:13', NULL, '49.47.232.38', 1),
(331, 1, '2023-10-19 22:21:50', NULL, '202.133.63.226', 1),
(332, 1, '2023-10-21 12:35:40', NULL, '202.133.63.226', 1),
(333, 1, '2023-11-25 21:12:44', NULL, '202.133.63.226', 1),
(334, 1, '2023-11-27 14:32:14', NULL, '106.195.77.131', 1),
(335, 1, '2023-11-30 16:18:30', NULL, '49.47.234.112', 1),
(336, 1, '2023-12-28 15:59:09', NULL, '202.133.63.226', 1),
(337, 1, '2023-12-28 16:54:47', NULL, '202.133.63.226', 1),
(338, 1, '2023-12-28 20:34:35', NULL, '49.47.233.205', 1),
(339, 1, '2023-12-28 20:38:19', NULL, '202.133.63.226', 1),
(340, 1, '2023-12-29 10:36:05', NULL, '49.47.233.205', 1),
(341, 1, '2023-12-29 10:37:23', NULL, '49.47.233.205', 1),
(342, 1, '2023-12-29 11:46:25', NULL, '202.133.63.226', 1),
(343, 36, '2023-12-29 15:37:46', '2023-12-29 15:39:43', '49.47.233.205', 1),
(344, 24, '2023-12-29 19:14:48', NULL, '223.187.2.131', 1),
(345, 1, '2023-12-29 19:16:22', NULL, '223.187.2.131', 1),
(346, 1, '2023-12-30 08:58:44', NULL, '49.47.233.205', 1),
(347, 28, '2023-12-30 16:59:09', NULL, '49.47.233.205', 1),
(348, 23, '2023-12-30 17:05:03', NULL, '49.47.233.205', 1),
(349, 24, '2024-01-02 10:39:21', NULL, '49.47.233.205', 1),
(350, 24, '2024-01-03 11:20:10', NULL, '49.47.233.214', 1),
(351, 24, '2024-01-06 11:50:42', NULL, '49.47.232.33', 1),
(352, 1, '2024-01-06 13:13:29', NULL, '49.47.232.33', 1),
(353, 23, '2024-01-06 13:20:25', NULL, '49.47.232.33', 1),
(354, 22, '2024-01-06 13:22:47', NULL, '49.47.232.33', 1),
(355, 30, '2024-01-06 13:22:58', NULL, '49.47.232.33', 1),
(356, 22, '2024-01-06 13:27:24', NULL, '49.47.232.33', 1),
(357, 32, '2024-01-06 13:33:33', NULL, '49.47.232.33', 1),
(358, 27, '2024-01-06 13:37:37', NULL, '49.47.232.33', 1),
(359, 28, '2024-01-06 13:38:24', NULL, '49.47.232.33', 1),
(360, 34, '2024-01-06 13:50:37', NULL, '49.205.99.183', 1),
(361, 31, '2024-01-06 14:33:39', NULL, '49.47.232.33', 1),
(362, 22, '2024-01-06 14:40:50', NULL, '157.47.60.35', 1),
(363, 26, '2024-01-06 20:17:27', NULL, '122.173.150.5', 1),
(364, 24, '2024-01-10 15:11:27', NULL, '49.43.202.40', 1),
(365, 24, '2024-01-11 10:27:22', NULL, '49.43.202.40', 1),
(366, 30, '2024-01-11 11:49:17', NULL, '49.43.202.40', 1),
(367, 26, '2024-01-17 19:23:20', '2024-01-17 19:38:14', '171.78.187.194', 1),
(368, 25, '2024-01-17 19:24:32', '2024-01-17 19:39:53', '223.196.193.159', 1),
(369, 32, '2024-01-17 19:25:43', '2024-01-17 19:38:46', '203.109.75.215', 1),
(370, 32, '2024-01-17 19:38:58', '2024-01-17 19:39:09', '203.109.75.215', 1),
(371, 25, '2024-01-17 19:39:57', NULL, '223.196.193.159', 1),
(372, 25, '2024-01-17 23:06:40', NULL, '223.196.193.159', 1),
(373, 27, '2024-01-18 09:29:08', NULL, '49.43.202.214', 1),
(374, 23, '2024-01-18 09:29:33', NULL, '157.47.107.155', 1),
(375, 24, '2024-01-18 09:31:50', NULL, '223.238.62.109', 1),
(376, 27, '2024-01-18 09:31:52', NULL, '49.43.202.214', 1),
(377, 30, '2024-01-18 09:32:37', NULL, '49.43.202.214', 1),
(378, 26, '2024-01-18 09:33:34', NULL, '49.43.202.214', 1),
(379, 31, '2024-01-18 09:33:51', NULL, '49.43.202.214', 1),
(380, 33, '2024-01-18 09:34:23', NULL, '152.58.197.239', 1),
(381, 22, '2024-01-18 09:36:59', NULL, '157.47.30.109', 1),
(382, 28, '2024-01-18 09:37:13', NULL, '49.43.202.214', 1),
(383, 25, '2024-01-18 09:39:46', NULL, '49.43.202.214', 1),
(384, 21, '2024-01-18 09:42:10', NULL, '49.43.202.214', 1),
(385, 32, '2024-01-18 09:44:58', NULL, '49.43.202.214', 1),
(386, 1, '2024-01-18 10:07:30', NULL, '49.43.202.214', 1),
(387, 29, '2024-01-18 10:15:43', NULL, '49.43.202.214', 1),
(388, 22, '2024-01-18 18:18:39', '2024-01-18 18:19:06', '49.43.202.214', 1),
(389, 23, '2024-01-18 18:21:02', NULL, '49.43.202.214', 1),
(390, 31, '2024-01-18 18:26:58', NULL, '49.43.202.214', 1),
(391, 31, '2024-01-18 18:26:58', '2024-01-18 18:32:30', '49.43.202.214', 1),
(392, 25, '2024-01-18 18:32:06', '2024-01-18 18:32:40', '49.43.202.214', 1),
(393, 28, '2024-01-18 18:33:43', NULL, '49.43.202.214', 1),
(394, 29, '2024-01-18 18:37:04', NULL, '49.43.202.214', 1),
(395, 29, '2024-01-18 18:37:04', NULL, '49.43.202.214', 1),
(396, 27, '2024-01-18 18:40:32', NULL, '49.43.202.214', 1),
(397, 22, '2024-01-19 09:16:42', NULL, '157.47.25.239', 1),
(398, 30, '2024-01-19 09:24:40', NULL, '49.43.202.214', 1),
(399, 31, '2024-01-19 09:27:16', NULL, '49.43.202.214', 1),
(400, 27, '2024-01-19 09:28:12', NULL, '157.48.188.13', 1),
(401, 27, '2024-01-19 09:28:27', NULL, '157.48.188.13', 1),
(402, 26, '2024-01-19 09:30:59', NULL, '49.43.202.214', 1),
(403, 32, '2024-01-19 09:33:59', NULL, '49.43.202.214', 1),
(404, 25, '2024-01-19 09:34:21', NULL, '49.43.202.214', 1),
(405, 24, '2024-01-19 09:36:43', NULL, '223.238.62.109', 1),
(406, 28, '2024-01-19 09:37:58', NULL, '49.43.202.214', 1),
(407, 36, '2024-01-19 09:39:27', NULL, '49.37.134.153', 1),
(408, 21, '2024-01-19 09:42:26', NULL, '49.43.202.214', 1),
(409, 33, '2024-01-19 09:43:45', NULL, '152.58.197.55', 1),
(410, 33, '2024-01-19 09:43:46', NULL, '152.58.197.55', 1),
(411, 1, '2024-01-19 09:49:43', NULL, '49.43.202.214', 1),
(412, 29, '2024-01-19 09:50:05', NULL, '223.185.86.19', 1),
(413, 1, '2024-01-19 11:28:51', '2024-01-19 11:32:27', '202.133.63.226', 1),
(414, 22, '2024-01-19 18:37:16', '2024-01-19 18:38:02', '49.43.202.214', 1),
(415, 25, '2024-01-19 18:40:31', NULL, '49.43.202.214', 1),
(416, 25, '2024-01-19 18:40:32', '2024-01-19 18:40:37', '49.43.202.214', 1),
(417, 31, '2024-01-19 18:41:06', NULL, '49.43.202.214', 1),
(418, 31, '2024-01-19 18:41:07', '2024-01-19 18:41:17', '49.43.202.214', 1),
(419, 32, '2024-01-19 18:41:37', '2024-01-19 18:41:59', '49.43.202.214', 1),
(420, 26, '2024-01-19 18:42:10', '2024-01-19 18:42:17', '49.43.202.214', 1),
(421, 28, '2024-01-19 18:42:47', NULL, '49.43.202.214', 1),
(422, 28, '2024-01-19 18:42:57', NULL, '49.43.202.214', 1),
(423, 28, '2024-01-19 18:43:08', '2024-01-19 18:43:12', '49.43.202.214', 1),
(424, 33, '2024-01-19 18:43:38', '2024-01-19 18:43:43', '152.59.194.251', 1),
(425, 27, '2024-01-20 09:22:13', NULL, '157.48.165.105', 1),
(426, 23, '2024-01-20 09:25:39', NULL, '157.47.3.105', 1),
(427, 26, '2024-01-20 09:30:07', NULL, '49.43.202.214', 1),
(428, 30, '2024-01-20 09:30:22', NULL, '49.43.202.214', 1),
(429, 31, '2024-01-20 09:32:12', NULL, '106.195.68.212', 1),
(430, 25, '2024-01-20 09:36:25', NULL, '157.47.97.37', 1),
(431, 22, '2024-01-20 09:46:55', NULL, '157.48.66.80', 1),
(432, 28, '2024-01-20 09:47:18', NULL, '49.43.202.214', 1),
(433, 29, '2024-01-20 09:47:22', NULL, '223.187.22.7', 1),
(434, 28, '2024-01-20 09:47:27', NULL, '49.43.202.214', 1),
(435, 36, '2024-01-20 09:49:10', NULL, '49.43.202.214', 1),
(436, 32, '2024-01-20 09:49:30', NULL, '49.43.202.214', 1),
(437, 24, '2024-01-20 09:49:55', NULL, '223.238.62.109', 1),
(438, 25, '2024-01-20 18:34:03', '2024-01-20 18:34:08', '49.43.202.214', 1),
(439, 28, '2024-01-20 18:35:39', NULL, '49.43.202.214', 1),
(440, 28, '2024-01-20 18:35:40', '2024-01-20 18:35:43', '49.43.202.214', 1),
(441, 22, '2024-01-20 18:38:30', '2024-01-20 18:39:08', '157.48.73.214', 1),
(442, 36, '2024-01-20 18:38:32', NULL, '49.43.202.214', 1),
(443, 36, '2024-01-20 18:38:33', NULL, '49.43.202.214', 1),
(444, 28, '2024-01-20 18:38:55', '2024-01-20 18:39:16', '49.43.202.214', 1),
(445, 28, '2024-01-20 18:39:20', NULL, '49.43.202.214', 1),
(446, 23, '2024-01-22 09:21:54', NULL, '157.47.117.206', 1),
(447, 25, '2024-01-22 09:24:31', NULL, '49.43.202.214', 1),
(448, 30, '2024-01-22 09:28:44', NULL, '49.43.202.214', 1),
(449, 31, '2024-01-22 09:29:38', NULL, '49.43.202.214', 1),
(450, 27, '2024-01-22 09:30:11', NULL, '49.43.202.214', 1),
(451, 26, '2024-01-22 09:30:54', NULL, '49.43.202.214', 1),
(452, 32, '2024-01-22 09:40:11', NULL, '49.43.202.214', 1),
(453, 28, '2024-01-22 09:43:22', NULL, '49.43.202.214', 1),
(454, 24, '2024-01-22 09:50:56', NULL, '223.238.62.109', 1),
(455, 29, '2024-01-22 09:51:16', NULL, '49.43.202.214', 1),
(456, 36, '2024-01-22 09:55:12', NULL, '49.43.202.214', 1),
(457, 1, '2024-01-22 11:19:52', NULL, '49.43.202.214', 1),
(458, 24, '2024-01-22 11:22:37', NULL, '49.43.202.214', 1),
(459, 32, '2024-01-22 12:06:26', NULL, '49.43.202.214', 1),
(460, 32, '2024-01-22 12:10:20', NULL, '49.43.202.214', 1),
(461, 28, '2024-01-22 18:46:37', '2024-01-22 18:46:42', '49.43.202.214', 1),
(462, 25, '2024-01-22 18:46:40', NULL, '49.43.202.214', 1),
(463, 25, '2024-01-22 18:46:41', '2024-01-22 18:46:48', '49.43.202.214', 1),
(464, 29, '2024-01-22 18:51:20', NULL, '49.43.202.214', 1),
(465, 25, '2024-01-23 08:13:18', NULL, '49.43.202.214', 1),
(466, 31, '2024-01-23 09:14:36', NULL, '49.43.202.214', 1),
(467, 31, '2024-01-23 09:14:37', NULL, '49.43.202.214', 1),
(468, 30, '2024-01-23 09:30:50', NULL, '157.47.125.253', 1),
(469, 24, '2024-01-23 09:36:29', NULL, '49.43.202.214', 1),
(470, 27, '2024-01-23 09:37:10', NULL, '49.43.202.214', 1),
(471, 36, '2024-01-23 09:44:11', NULL, '49.43.202.214', 1),
(472, 36, '2024-01-23 09:44:12', NULL, '49.43.202.214', 1),
(473, 28, '2024-01-23 10:03:29', NULL, '49.43.202.214', 1),
(474, 28, '2024-01-23 18:44:03', '2024-01-23 18:44:07', '49.43.203.193', 1),
(475, 28, '2024-01-23 18:44:17', NULL, '49.43.203.193', 1),
(476, 31, '2024-01-23 18:45:12', '2024-01-23 18:45:15', '49.43.203.193', 1),
(477, 23, '2024-01-24 08:58:44', NULL, '49.43.203.193', 1),
(478, 30, '2024-01-24 09:22:24', NULL, '49.43.203.193', 1),
(479, 26, '2024-01-24 09:23:12', NULL, '49.43.203.193', 1),
(480, 31, '2024-01-24 09:25:36', NULL, '49.43.203.193', 1),
(481, 31, '2024-01-24 09:25:36', NULL, '49.43.203.193', 1),
(482, 22, '2024-01-24 09:29:46', NULL, '49.43.203.193', 1),
(483, 27, '2024-01-24 09:30:09', NULL, '157.48.173.92', 1),
(484, 28, '2024-01-24 09:30:11', NULL, '49.43.203.193', 1),
(485, 36, '2024-01-24 09:30:28', NULL, '49.43.203.193', 1),
(486, 36, '2024-01-24 09:30:29', NULL, '49.43.203.193', 1),
(487, 21, '2024-01-24 09:30:37', NULL, '49.43.203.193', 1),
(488, 32, '2024-01-24 09:33:58', NULL, '49.43.203.193', 1),
(489, 25, '2024-01-24 09:35:52', NULL, '157.47.38.22', 1),
(490, 25, '2024-01-24 09:35:52', NULL, '157.47.38.22', 1),
(491, 24, '2024-01-24 09:39:55', NULL, '223.187.2.150', 1),
(492, 29, '2024-01-24 09:56:40', NULL, '223.187.54.0', 1),
(493, 32, '2024-01-24 15:16:06', NULL, '49.43.203.193', 1),
(494, 28, '2024-01-24 18:37:27', '2024-01-24 18:37:32', '49.43.203.193', 1),
(495, 25, '2024-01-24 18:39:11', '2024-01-24 18:39:17', '49.43.203.193', 1),
(496, 26, '2024-01-24 18:42:36', '2024-01-24 18:42:42', '49.43.203.193', 1),
(497, 30, '2024-01-25 09:21:52', NULL, '49.43.203.193', 1),
(498, 25, '2024-01-25 09:24:29', NULL, '49.43.203.193', 1),
(499, 27, '2024-01-25 09:31:47', NULL, '157.47.59.152', 1),
(500, 1, '2024-01-25 09:33:09', NULL, '49.43.203.193', 1),
(501, 32, '2024-01-25 09:34:12', NULL, '49.43.203.193', 1),
(502, 24, '2024-01-25 09:34:15', NULL, '223.187.34.135', 1),
(503, 22, '2024-01-25 09:41:08', NULL, '49.43.203.193', 1),
(504, 36, '2024-01-25 09:41:12', NULL, '49.43.203.193', 1),
(505, 36, '2024-01-25 09:41:13', NULL, '49.43.203.193', 1),
(506, 32, '2024-01-25 12:23:55', NULL, '49.43.203.193', 1),
(507, 1, '2024-01-25 12:24:23', NULL, '49.43.203.193', 1),
(508, 1, '2024-01-25 12:25:11', '2024-01-25 12:32:29', '49.43.203.193', 1),
(509, 1, '2024-01-25 12:31:06', NULL, '202.133.63.226', 1),
(510, 32, '2024-01-25 12:32:36', '2024-01-25 12:44:01', '49.43.203.193', 1),
(511, 1, '2024-01-25 12:44:08', NULL, '49.43.203.193', 1),
(512, 1, '2024-01-25 15:29:27', NULL, '49.43.203.193', 1),
(513, 25, '2024-01-25 18:29:25', '2024-01-25 18:29:29', '49.43.203.193', 1),
(514, 25, '2024-01-25 18:29:34', NULL, '49.43.203.193', 1),
(515, 1, '2024-01-27 00:18:40', '2024-01-27 00:21:18', '202.133.63.226', 1),
(516, 29, '2024-01-27 09:12:24', NULL, '106.221.185.39', 1),
(517, 25, '2024-01-27 09:20:47', NULL, '157.47.93.128', 1),
(518, 27, '2024-01-27 09:28:01', NULL, '49.43.203.193', 1),
(519, 30, '2024-01-27 09:29:48', NULL, '49.43.203.193', 1),
(520, 23, '2024-01-27 09:30:23', NULL, '157.47.53.0', 1),
(521, 26, '2024-01-27 09:31:29', NULL, '49.43.203.193', 1),
(522, 32, '2024-01-27 09:33:29', NULL, '49.43.203.193', 1),
(523, 22, '2024-01-27 09:59:17', NULL, '49.43.203.193', 1),
(524, 22, '2024-01-27 09:59:18', '2024-01-27 09:59:52', '49.43.203.193', 1),
(525, 36, '2024-01-27 09:59:43', NULL, '49.43.203.193', 1),
(526, 24, '2024-01-27 09:59:50', NULL, '49.43.203.193', 1),
(527, 23, '2024-01-27 16:25:03', NULL, '49.43.203.193', 1),
(528, 22, '2024-01-27 18:52:11', '2024-01-27 18:52:18', '49.43.203.193', 1),
(529, 25, '2024-01-27 18:53:20', '2024-01-27 18:53:23', '49.43.203.193', 1),
(530, 29, '2024-01-27 18:53:45', NULL, '223.185.118.26', 1),
(531, 25, '2024-01-29 09:20:34', NULL, '49.43.203.193', 1),
(532, 31, '2024-01-29 09:21:16', NULL, '49.43.203.193', 1),
(533, 31, '2024-01-29 09:21:17', NULL, '49.43.203.193', 1),
(534, 26, '2024-01-29 09:21:59', NULL, '49.43.203.193', 1),
(535, 30, '2024-01-29 09:23:32', NULL, '157.48.220.151', 1),
(536, 23, '2024-01-29 09:25:37', NULL, '157.48.192.145', 1),
(537, 23, '2024-01-29 09:25:38', NULL, '157.48.192.145', 1),
(538, 27, '2024-01-29 09:37:59', NULL, '157.48.143.141', 1),
(539, 22, '2024-01-29 09:45:56', NULL, '157.47.55.24', 1),
(540, 32, '2024-01-29 09:57:51', NULL, '49.43.203.193', 1),
(541, 1, '2024-01-29 11:19:33', NULL, '202.133.63.226', 1),
(542, 24, '2024-01-29 12:33:55', NULL, '223.187.2.131', 1),
(543, 32, '2024-01-29 17:24:43', NULL, '49.43.203.193', 1),
(544, 25, '2024-01-29 18:27:44', '2024-01-29 18:31:02', '49.43.203.193', 1),
(545, 26, '2024-01-29 18:29:13', '2024-01-29 18:31:09', '49.43.203.193', 1),
(546, 32, '2024-01-30 09:08:45', NULL, '49.43.203.193', 1),
(547, 30, '2024-01-30 09:19:10', NULL, '157.47.45.228', 1),
(548, 25, '2024-01-30 09:21:51', NULL, '157.47.68.146', 1),
(549, 23, '2024-01-30 09:23:40', NULL, '157.47.11.57', 1),
(550, 23, '2024-01-30 09:23:41', NULL, '157.47.11.57', 1),
(551, 26, '2024-01-30 09:25:08', NULL, '49.43.203.193', 1),
(552, 22, '2024-01-30 09:33:30', NULL, '157.47.49.242', 1),
(553, 27, '2024-01-30 09:35:42', NULL, '49.43.203.193', 1),
(554, 36, '2024-01-30 09:38:10', NULL, '49.43.203.193', 1),
(555, 24, '2024-01-30 09:59:45', NULL, '223.185.114.154', 1),
(556, 26, '2024-01-30 18:29:55', '2024-01-30 18:30:16', '49.43.203.193', 1),
(557, 32, '2024-01-30 18:30:13', '2024-01-30 18:30:22', '49.43.203.193', 1),
(558, 25, '2024-01-30 18:30:14', '2024-01-30 18:30:20', '49.43.203.193', 1),
(559, 23, '2024-01-31 09:05:34', NULL, '49.43.203.193', 1),
(560, 30, '2024-01-31 09:23:12', NULL, '157.47.101.126', 1),
(561, 26, '2024-01-31 09:24:51', NULL, '49.43.203.193', 1),
(562, 31, '2024-01-31 09:30:12', NULL, '49.43.203.193', 1),
(563, 25, '2024-01-31 09:31:49', NULL, '157.47.67.201', 1),
(564, 1, '2024-01-31 09:36:23', NULL, '49.43.203.193', 1),
(565, 27, '2024-01-31 09:39:01', NULL, '49.43.203.193', 1),
(566, 24, '2024-01-31 09:51:20', NULL, '27.59.217.72', 1),
(567, 25, '2024-01-31 19:06:30', '2024-01-31 19:06:40', '49.43.203.193', 1),
(568, 23, '2024-02-01 09:13:58', NULL, '157.47.58.125', 1),
(569, 23, '2024-02-01 09:14:14', NULL, '157.47.58.125', 1),
(570, 30, '2024-02-01 09:24:10', NULL, '157.47.62.131', 1),
(571, 26, '2024-02-01 09:25:41', NULL, '49.43.203.193', 1),
(572, 31, '2024-02-01 09:26:34', NULL, '49.43.203.193', 1),
(573, 25, '2024-02-01 09:29:06', NULL, '157.47.80.77', 1),
(574, 27, '2024-02-01 09:35:52', NULL, '157.47.38.222', 1),
(575, 36, '2024-02-01 09:56:27', NULL, '49.43.203.193', 1),
(576, 22, '2024-02-01 09:56:41', '2024-02-01 10:00:50', '49.43.203.193', 1),
(577, 25, '2024-02-01 18:31:08', '2024-02-01 18:31:12', '49.43.203.193', 1),
(578, 26, '2024-02-01 18:31:38', '2024-02-01 18:31:47', '49.43.203.193', 1),
(579, 31, '2024-02-01 18:37:24', NULL, '49.43.203.193', 1),
(580, 31, '2024-02-01 18:37:25', '2024-02-01 18:37:30', '49.43.203.193', 1),
(581, 30, '2024-02-02 09:22:52', NULL, '157.48.179.71', 1),
(582, 31, '2024-02-02 09:23:11', NULL, '49.43.203.193', 1),
(583, 31, '2024-02-02 09:23:11', NULL, '49.43.203.193', 1),
(584, 32, '2024-02-02 09:23:45', NULL, '49.43.203.193', 1),
(585, 26, '2024-02-02 09:31:57', NULL, '49.43.203.193', 1),
(586, 22, '2024-02-02 09:33:58', '2024-02-02 09:34:04', '157.47.65.44', 1),
(587, 36, '2024-02-02 09:34:23', NULL, '49.43.203.193', 1),
(588, 23, '2024-02-02 09:36:32', NULL, '49.43.203.193', 1),
(589, 23, '2024-02-02 17:06:12', NULL, '49.43.203.193', 1),
(590, 32, '2024-02-02 17:41:27', NULL, '49.43.203.193', 1),
(591, 23, '2024-02-03 09:22:51', NULL, '49.43.203.193', 1),
(592, 22, '2024-02-03 09:31:33', NULL, '157.47.76.118', 1),
(593, 36, '2024-02-03 09:32:09', NULL, '49.43.203.193', 1),
(594, 36, '2024-02-03 09:32:10', NULL, '49.43.203.193', 1),
(595, 25, '2024-02-03 09:36:29', NULL, '49.43.203.193', 1),
(596, 31, '2024-02-03 09:38:21', NULL, '152.59.196.169', 1),
(597, 31, '2024-02-03 09:38:22', NULL, '152.59.196.169', 1),
(598, 29, '2024-02-03 09:47:26', NULL, '49.43.203.193', 1),
(599, 27, '2024-02-03 09:48:22', NULL, '49.43.203.193', 1),
(600, 25, '2024-02-03 11:42:31', NULL, '49.43.203.193', 1),
(601, 25, '2024-02-03 18:47:09', '2024-02-03 18:47:13', '49.43.203.193', 1),
(602, 26, '2024-02-03 18:47:48', '2024-02-03 18:47:53', '49.43.203.193', 1),
(603, 31, '2024-02-03 18:50:54', NULL, '152.59.196.158', 1),
(604, 31, '2024-02-03 18:50:54', '2024-02-03 18:50:56', '152.59.196.158', 1),
(605, 23, '2024-02-05 09:18:11', NULL, '157.48.158.245', 1),
(606, 25, '2024-02-05 09:35:27', NULL, '49.43.203.193', 1),
(607, 31, '2024-02-05 09:36:17', NULL, '49.43.203.193', 1),
(608, 31, '2024-02-05 09:36:18', NULL, '49.43.203.193', 1),
(609, 26, '2024-02-05 09:39:42', NULL, '49.43.203.193', 1),
(610, 30, '2024-02-05 09:47:47', NULL, '157.48.82.171', 1),
(611, 27, '2024-02-05 09:49:42', NULL, '49.43.203.193', 1),
(612, 32, '2024-02-05 09:55:21', NULL, '49.43.203.193', 1),
(613, 23, '2024-02-06 09:20:40', NULL, '49.43.203.193', 1),
(614, 25, '2024-02-06 09:31:22', NULL, '157.47.25.140', 1),
(615, 26, '2024-02-06 09:32:08', NULL, '49.43.203.193', 1),
(616, 30, '2024-02-06 09:36:18', NULL, '157.47.38.236', 1),
(617, 31, '2024-02-06 09:36:50', NULL, '49.43.203.193', 1),
(618, 27, '2024-02-06 10:12:16', NULL, '49.43.203.193', 1),
(619, 22, '2024-02-07 09:28:38', NULL, '49.43.203.193', 1),
(620, 30, '2024-02-07 09:30:46', NULL, '157.47.22.192', 1),
(621, 25, '2024-02-07 09:32:33', NULL, '157.47.2.148', 1),
(622, 32, '2024-02-07 09:33:18', NULL, '49.43.203.193', 1),
(623, 31, '2024-02-07 09:34:07', NULL, '152.58.196.28', 1),
(624, 31, '2024-02-07 09:34:08', NULL, '152.58.196.28', 1),
(625, 25, '2024-02-07 18:30:41', '2024-02-07 18:30:45', '49.43.203.193', 1),
(626, 23, '2024-02-08 09:10:25', NULL, '49.43.203.193', 1),
(627, 30, '2024-02-08 09:18:10', NULL, '157.48.200.187', 1),
(628, 32, '2024-02-08 09:21:54', NULL, '49.43.203.193', 1),
(629, 31, '2024-02-08 09:32:01', NULL, '49.43.203.193', 1),
(630, 31, '2024-02-08 09:32:01', NULL, '49.43.203.193', 1),
(631, 22, '2024-02-08 09:34:12', NULL, '157.47.83.127', 1),
(632, 25, '2024-02-08 09:35:06', NULL, '49.43.203.193', 1),
(633, 26, '2024-02-08 09:37:14', NULL, '49.43.203.193', 1),
(634, 27, '2024-02-08 09:41:43', NULL, '157.48.205.68', 1),
(635, 25, '2024-02-08 18:30:52', '2024-02-08 18:30:56', '49.43.203.193', 1),
(636, 32, '2024-02-09 09:10:18', NULL, '49.43.203.193', 1),
(637, 26, '2024-02-09 09:26:39', NULL, '49.43.203.193', 1),
(638, 22, '2024-02-09 09:32:03', NULL, '157.48.190.241', 1),
(639, 31, '2024-02-09 09:35:00', NULL, '49.43.203.193', 1),
(640, 31, '2024-02-09 09:35:01', NULL, '49.43.203.193', 1),
(641, 25, '2024-02-09 09:36:40', NULL, '49.43.203.193', 1),
(642, 27, '2024-02-09 09:49:09', NULL, '49.43.203.193', 1),
(643, 25, '2024-02-09 18:29:23', '2024-02-09 18:32:18', '49.43.203.193', 1),
(644, 29, '2024-02-09 18:30:17', NULL, '49.43.203.193', 1),
(645, 29, '2024-02-09 18:30:17', NULL, '49.43.203.193', 1),
(646, 31, '2024-02-10 09:18:28', NULL, '49.43.203.193', 1),
(647, 31, '2024-02-10 09:18:28', NULL, '49.43.203.193', 1),
(648, 26, '2024-02-10 09:26:25', NULL, '49.43.203.193', 1),
(649, 27, '2024-02-10 09:33:31', NULL, '157.48.66.174', 1),
(650, 32, '2024-02-10 09:37:38', NULL, '49.43.203.193', 1),
(651, 29, '2024-02-10 09:41:05', NULL, '223.187.22.6', 1),
(652, 25, '2024-02-10 09:46:39', NULL, '49.43.203.193', 1),
(653, 30, '2024-02-10 09:47:29', NULL, '157.48.246.161', 1),
(654, 1, '2024-02-10 15:19:32', NULL, '202.133.63.226', 1),
(655, 1, '2024-02-10 15:19:46', '2024-02-10 15:20:22', '202.133.63.226', 1),
(656, 20, '2024-02-10 15:20:57', '2024-02-10 15:21:12', '202.133.63.226', 1),
(657, 25, '2024-02-10 18:40:05', '2024-02-10 18:40:07', '49.43.203.193', 1),
(658, 29, '2024-02-10 18:46:35', NULL, '49.43.203.193', 1),
(659, 30, '2024-02-12 09:27:08', NULL, '157.47.116.13', 1),
(660, 23, '2024-02-12 09:30:26', NULL, '157.47.56.65', 1),
(661, 26, '2024-02-12 09:33:47', NULL, '49.43.203.193', 1),
(662, 36, '2024-02-12 09:35:17', NULL, '49.43.203.193', 1),
(663, 22, '2024-02-12 09:35:29', NULL, '49.43.203.193', 1),
(664, 27, '2024-02-12 09:41:40', NULL, '49.43.203.193', 1),
(665, 29, '2024-02-12 09:50:08', NULL, '223.185.86.3', 1),
(666, 25, '2024-02-12 18:11:10', NULL, '49.43.203.193', 1),
(667, 30, '2024-02-13 09:23:56', NULL, '157.47.64.205', 1),
(668, 31, '2024-02-13 09:32:52', NULL, '49.43.203.193', 1),
(669, 22, '2024-02-13 09:38:34', NULL, '157.48.247.165', 1),
(670, 1, '2024-02-13 09:39:00', NULL, '49.43.203.193', 1),
(671, 32, '2024-02-13 09:39:14', NULL, '49.43.203.193', 1),
(672, 25, '2024-02-13 09:42:18', NULL, '49.43.203.193', 1),
(673, 26, '2024-02-13 09:46:10', '2024-02-13 09:49:41', '49.43.203.193', 1),
(674, 25, '2024-02-13 18:30:31', '2024-02-13 18:30:36', '49.43.203.193', 1),
(675, 31, '2024-02-14 09:23:30', NULL, '49.43.203.193', 1),
(676, 29, '2024-02-14 09:29:52', NULL, '49.43.203.193', 1),
(677, 25, '2024-02-14 09:31:01', NULL, '49.43.203.193', 1),
(678, 26, '2024-02-14 09:32:37', NULL, '49.43.203.193', 1),
(679, 27, '2024-02-14 09:48:49', NULL, '49.43.203.193', 1),
(680, 25, '2024-02-14 13:29:27', NULL, '49.43.203.193', 1),
(681, 23, '2024-02-14 14:00:20', NULL, '157.47.89.176', 1),
(682, 25, '2024-02-14 18:26:02', '2024-02-14 18:30:31', '49.43.203.193', 1),
(683, 23, '2024-02-15 09:18:34', NULL, '157.47.55.193', 1),
(684, 26, '2024-02-15 09:23:17', NULL, '49.43.203.193', 1),
(685, 31, '2024-02-15 09:24:34', NULL, '49.43.203.193', 1),
(686, 32, '2024-02-15 09:28:03', NULL, '49.43.203.193', 1),
(687, 25, '2024-02-15 09:28:34', NULL, '49.43.203.193', 1),
(688, 25, '2024-02-15 09:28:41', NULL, '49.43.203.193', 1),
(689, 25, '2024-02-15 18:49:17', '2024-02-15 18:49:20', '49.43.203.193', 1),
(690, 30, '2024-02-16 09:27:34', NULL, '157.48.234.8', 1),
(691, 23, '2024-02-16 09:28:27', NULL, '49.43.203.193', 1),
(692, 26, '2024-02-16 09:31:28', NULL, '49.43.203.193', 1),
(693, 31, '2024-02-16 09:31:30', NULL, '49.43.203.193', 1),
(694, 25, '2024-02-16 09:36:27', NULL, '49.43.203.193', 1),
(695, 27, '2024-02-16 09:45:58', NULL, '49.43.203.193', 1),
(696, 32, '2024-02-16 09:46:25', NULL, '49.43.203.193', 1),
(697, 25, '2024-02-16 19:44:27', '2024-02-16 19:44:31', '49.43.203.193', 1),
(698, 1, '2024-02-16 19:50:38', '2024-02-16 20:00:50', '202.133.63.226', 1),
(699, 1, '2024-02-16 19:56:53', NULL, '203.109.75.192', 1),
(700, 1, '2024-02-16 20:01:12', NULL, '202.133.63.226', 1),
(701, 30, '2024-02-19 09:20:27', NULL, '157.47.56.1', 1),
(702, 23, '2024-02-19 09:25:40', NULL, '49.43.203.193', 1),
(703, 31, '2024-02-19 09:29:16', NULL, '49.43.203.193', 1),
(704, 32, '2024-02-19 09:43:45', '2024-02-19 09:43:55', '49.43.203.193', 1),
(705, 1, '2024-02-19 09:44:06', NULL, '49.43.203.193', 1),
(706, 26, '2024-02-19 09:45:25', NULL, '49.43.203.193', 1),
(707, 25, '2024-02-19 09:45:32', NULL, '49.43.203.193', 1),
(708, 26, '2024-02-19 09:50:28', NULL, '49.43.203.193', 1),
(709, 26, '2024-02-19 12:57:51', '2024-02-19 12:58:16', '49.43.203.193', 1),
(710, 26, '2024-02-19 12:58:18', NULL, '49.43.203.193', 1),
(711, 25, '2024-02-19 18:36:04', '2024-02-19 18:36:07', '49.43.203.193', 1),
(712, 1, '2024-02-19 20:35:02', NULL, '202.133.63.226', 1),
(713, 30, '2024-02-20 09:25:58', NULL, '157.48.244.208', 1),
(714, 27, '2024-02-20 09:34:13', NULL, '49.43.203.193', 1),
(715, 32, '2024-02-20 09:36:01', '2024-02-20 09:48:45', '49.43.203.193', 1),
(716, 1, '2024-02-20 09:37:10', '2024-02-20 09:40:11', '49.43.203.193', 1),
(717, 31, '2024-02-20 09:37:30', NULL, '49.43.203.193', 1),
(718, 26, '2024-02-20 09:39:59', NULL, '49.43.203.193', 1),
(719, 25, '2024-02-20 09:47:21', NULL, '49.43.203.193', 1),
(720, 32, '2024-02-20 09:48:28', NULL, '49.43.203.193', 1),
(721, 1, '2024-02-20 09:48:50', NULL, '49.43.203.193', 1),
(722, 26, '2024-02-20 09:49:00', NULL, '49.43.203.193', 1),
(723, 1, '2024-02-20 12:38:15', NULL, '202.133.63.226', 1),
(724, 1, '2024-02-20 12:41:46', NULL, '49.43.203.193', 1),
(725, 1, '2024-02-20 12:52:46', NULL, '49.43.203.193', 1),
(726, 22, '2024-02-20 14:31:00', NULL, '157.48.248.166', 1),
(727, 23, '2024-02-20 14:31:04', NULL, '157.48.164.120', 1),
(728, 1, '2024-02-20 14:54:00', NULL, '49.43.203.193', 1),
(729, 1, '2024-02-20 15:16:16', NULL, '49.43.203.193', 1),
(730, 1, '2024-02-20 15:26:29', NULL, '49.43.203.193', 1),
(731, 1, '2024-02-20 16:35:45', NULL, '49.43.203.193', 1),
(732, 44, '2024-02-21 09:29:10', NULL, '49.43.203.193', 1),
(733, 51, '2024-02-21 09:29:25', NULL, '157.47.34.220', 1),
(734, 46, '2024-02-21 09:32:39', NULL, '49.43.203.193', 1),
(735, 47, '2024-02-21 09:38:44', NULL, '49.43.203.193', 1),
(736, 43, '2024-02-21 09:52:15', NULL, '157.48.154.5', 1),
(737, 46, '2024-02-21 18:36:42', '2024-02-21 18:36:46', '49.43.203.193', 1),
(738, 47, '2024-02-22 09:37:24', NULL, '49.43.203.193', 1),
(739, 46, '2024-02-22 09:44:49', NULL, '49.43.203.193', 1),
(740, 44, '2024-02-22 10:07:18', NULL, '49.43.203.193', 1),
(741, 46, '2024-02-22 18:59:22', '2024-02-22 18:59:25', '49.43.203.193', 1),
(742, 46, '2024-02-23 11:58:04', NULL, '49.43.201.135', 1),
(743, 46, '2024-02-23 18:48:24', '2024-02-23 18:48:31', '49.43.201.135', 1),
(744, 51, '2024-02-24 09:18:03', NULL, '157.48.228.77', 1),
(745, 53, '2024-02-24 09:18:07', NULL, '49.43.201.135', 1),
(746, 44, '2024-02-24 09:24:09', NULL, '49.43.201.135', 1),
(747, 46, '2024-02-24 09:42:01', NULL, '49.43.201.135', 1),
(748, 47, '2024-02-24 09:42:21', NULL, '49.43.201.135', 1),
(749, 61, '2024-02-24 09:42:41', NULL, '49.43.201.135', 1),
(750, 46, '2024-02-24 18:48:09', '2024-02-24 18:48:11', '49.43.201.135', 1),
(751, 51, '2024-02-26 09:25:19', NULL, '49.43.201.135', 1),
(752, 46, '2024-02-26 09:35:08', NULL, '49.43.201.135', 1),
(753, 51, '2024-02-27 09:22:49', NULL, '157.47.100.191', 1),
(754, 46, '2024-02-27 09:48:22', NULL, '49.43.201.135', 1),
(755, 1, '2024-02-27 12:12:25', NULL, '49.43.201.135', 1),
(756, 46, '2024-02-27 18:31:13', '2024-02-27 18:31:16', '49.43.201.135', 1),
(757, 47, '2024-02-29 09:21:58', '2024-02-29 09:22:30', '49.43.201.135', 1),
(758, 51, '2024-02-29 09:28:16', NULL, '157.47.115.205', 1),
(759, 46, '2024-02-29 09:35:24', NULL, '49.43.201.135', 1),
(760, 61, '2024-02-29 09:44:46', NULL, '49.43.201.135', 1),
(761, 53, '2024-02-29 09:46:05', NULL, '49.43.201.135', 1),
(762, 61, '2024-03-01 09:24:29', NULL, '49.43.201.229', 1),
(763, 46, '2024-03-01 09:30:49', NULL, '49.43.201.229', 1),
(764, 46, '2024-03-01 18:43:15', '2024-03-01 18:43:18', '49.43.201.229', 1),
(765, 46, '2024-03-02 09:44:55', NULL, '49.43.201.229', 1),
(766, 46, '2024-03-02 18:49:54', '2024-03-02 18:49:59', '49.43.201.229', 1),
(767, 51, '2024-03-04 09:21:08', NULL, '157.48.221.149', 1),
(768, 46, '2024-03-04 09:21:10', NULL, '49.43.201.229', 1),
(769, 47, '2024-03-04 09:25:26', NULL, '49.43.201.229', 1),
(770, 53, '2024-03-04 09:34:54', NULL, '49.43.201.229', 1),
(771, 46, '2024-03-04 19:05:37', '2024-03-04 19:05:40', '49.43.201.229', 1),
(772, 47, '2024-03-05 09:33:59', NULL, '49.43.201.229', 1),
(773, 46, '2024-03-05 09:34:50', NULL, '49.43.201.229', 1),
(774, 46, '2024-03-05 18:41:06', '2024-03-05 18:41:09', '49.43.201.229', 1),
(775, 47, '2024-03-06 09:30:16', NULL, '49.43.201.229', 1),
(776, 46, '2024-03-06 09:30:16', NULL, '49.43.201.229', 1),
(777, 46, '2024-03-06 18:42:30', '2024-03-06 18:42:34', '49.43.201.229', 1),
(778, 47, '2024-03-07 09:34:30', NULL, '49.43.201.229', 1),
(779, 46, '2024-03-07 09:37:03', NULL, '49.43.201.229', 1),
(780, 61, '2024-03-07 09:37:39', NULL, '49.43.201.229', 1),
(781, 46, '2024-03-07 12:33:53', NULL, '49.43.201.229', 1),
(782, 46, '2024-03-07 19:02:31', '2024-03-07 19:02:35', '49.43.201.229', 1),
(783, 61, '2024-03-09 09:23:35', NULL, '49.43.201.229', 1),
(784, 46, '2024-03-09 09:30:10', NULL, '49.43.201.229', 1),
(785, 1, '2024-03-09 12:44:38', NULL, '49.43.201.229', 1),
(786, 44, '2024-03-09 18:42:16', NULL, '49.43.201.229', 1),
(787, 46, '2024-03-09 18:57:59', '2024-03-09 18:58:03', '49.43.201.229', 1),
(788, 1, '2024-03-09 20:24:13', NULL, '123.201.175.13', 1),
(789, 53, '2024-03-09 20:28:17', NULL, '123.201.175.13', 1),
(790, 61, '2024-03-10 09:31:27', NULL, '49.43.201.229', 1),
(791, 46, '2024-03-10 09:33:38', NULL, '49.43.201.229', 1),
(792, 47, '2024-03-10 09:34:30', NULL, '49.43.201.229', 1),
(793, 53, '2024-03-10 09:35:05', NULL, '49.43.201.229', 1),
(794, 43, '2024-03-10 09:35:59', NULL, '178.162.227.75', 1),
(795, 43, '2024-03-10 09:36:00', NULL, '178.162.227.75', 1),
(796, 1, '2024-03-10 12:04:26', NULL, '49.43.201.229', 1),
(797, 44, '2024-03-10 13:23:21', NULL, '49.43.201.229', 1),
(798, 46, '2024-03-10 18:49:13', '2024-03-10 18:49:16', '49.43.201.229', 1),
(799, 53, '2024-03-11 09:12:20', NULL, '49.43.201.229', 1),
(800, 51, '2024-03-11 09:23:50', NULL, '157.48.175.24', 1),
(801, 46, '2024-03-11 09:27:20', NULL, '49.43.201.229', 1),
(802, 47, '2024-03-11 09:30:40', NULL, '49.43.201.229', 1),
(803, 43, '2024-03-11 09:38:04', NULL, '49.43.201.229', 1),
(804, 61, '2024-03-11 10:05:01', NULL, '49.43.201.229', 1),
(805, 1, '2024-03-11 10:15:58', NULL, '122.181.217.226', 1),
(806, 49, '2024-03-11 10:25:24', NULL, '49.43.201.229', 1),
(807, 1, '2024-03-11 17:10:03', NULL, '122.181.217.226', 1),
(808, 46, '2024-03-11 18:29:06', '2024-03-11 18:30:21', '49.43.201.229', 1),
(809, 47, '2024-03-12 09:26:35', NULL, '49.43.201.229', 1),
(810, 51, '2024-03-12 09:32:53', NULL, '157.47.97.91', 1),
(811, 43, '2024-03-12 09:36:40', NULL, '157.48.127.181', 1),
(812, 61, '2024-03-12 11:25:39', NULL, '49.43.201.229', 1),
(813, 46, '2024-03-12 18:40:07', '2024-03-12 18:40:10', '49.43.201.229', 1),
(814, 47, '2024-03-13 09:28:08', NULL, '49.43.201.229', 1),
(815, 51, '2024-03-13 09:29:09', NULL, '157.47.12.203', 1),
(816, 46, '2024-03-13 09:34:36', NULL, '49.43.201.229', 1),
(817, 43, '2024-03-13 09:45:21', NULL, '157.48.172.253', 1),
(818, 46, '2024-03-13 18:50:44', '2024-03-13 18:50:47', '49.43.201.229', 1),
(819, 51, '2024-03-14 09:32:59', NULL, '157.48.192.4', 1),
(820, 46, '2024-03-14 09:35:25', NULL, '49.43.201.229', 1),
(821, 43, '2024-03-14 09:39:10', NULL, '157.48.221.115', 1),
(822, 46, '2024-03-14 18:40:49', NULL, '49.43.201.229', 1),
(823, 51, '2024-03-15 09:31:19', NULL, '157.47.98.166', 1);
INSERT INTO `login_records_tbl` (`id`, `staff_id`, `login_date_time`, `logout_date_time`, `ip_address`, `status`) VALUES
(824, 46, '2024-03-15 09:36:32', NULL, '49.43.201.229', 1),
(825, 43, '2024-03-15 09:37:14', NULL, '157.48.203.157', 1),
(826, 43, '2024-03-19 09:26:38', NULL, '157.47.126.81', 1),
(827, 43, '2024-03-20 09:34:58', NULL, '157.48.66.196', 1),
(828, 46, '2024-03-20 09:38:12', NULL, '49.43.201.229', 1),
(829, 46, '2024-03-21 09:34:39', NULL, '49.43.203.93', 1),
(830, 47, '2024-03-21 09:45:32', NULL, '49.43.203.93', 1),
(831, 53, '2024-03-21 11:05:41', NULL, '49.43.203.93', 1),
(832, 46, '2024-03-21 18:41:58', '2024-03-21 18:42:03', '49.43.203.93', 1),
(833, 46, '2024-03-21 18:42:04', NULL, '49.43.203.93', 1),
(834, 43, '2024-03-22 09:34:11', NULL, '49.43.203.93', 1),
(835, 46, '2024-03-22 09:36:21', NULL, '49.43.203.93', 1),
(836, 46, '2024-03-22 18:38:36', '2024-03-22 18:38:42', '49.43.203.93', 1),
(837, 46, '2024-03-25 09:33:42', NULL, '49.43.203.162', 1),
(838, 46, '2024-03-25 18:44:30', '2024-03-25 18:44:34', '49.43.203.162', 1),
(839, 46, '2024-03-25 18:47:57', NULL, '49.43.203.162', 1),
(840, 46, '2024-03-26 09:30:35', NULL, '49.43.203.162', 1),
(841, 43, '2024-03-26 09:31:16', NULL, '157.48.226.200', 1),
(842, 47, '2024-03-26 09:31:51', NULL, '49.43.203.162', 1),
(843, 1, '2024-03-26 10:16:54', '2024-03-26 10:31:15', '49.43.203.162', 1),
(844, 47, '2024-03-26 10:20:53', NULL, '49.43.203.162', 1),
(845, 53, '2024-03-26 10:31:21', NULL, '49.43.203.162', 1),
(846, 47, '2024-03-26 10:31:29', NULL, '49.43.203.162', 1),
(847, 46, '2024-03-26 18:35:41', '2024-03-26 18:35:45', '49.43.203.162', 1),
(848, 43, '2024-03-27 09:28:18', NULL, '157.47.42.20', 1),
(849, 46, '2024-03-27 09:32:33', NULL, '49.43.203.162', 1),
(850, 47, '2024-03-27 09:32:40', NULL, '49.43.203.162', 1),
(851, 46, '2024-03-27 18:34:57', '2024-03-27 18:35:00', '49.43.203.162', 1),
(852, 46, '2024-03-28 09:24:03', NULL, '49.43.203.162', 1),
(853, 43, '2024-03-28 09:40:56', NULL, '157.48.95.67', 1),
(854, 47, '2024-03-30 10:27:26', NULL, '49.43.203.162', 1),
(855, 46, '2024-03-30 10:27:28', NULL, '49.43.203.162', 1),
(856, 47, '2024-03-30 10:27:34', NULL, '49.43.203.162', 1),
(857, 46, '2024-03-30 18:39:56', '2024-03-30 18:39:59', '49.37.135.47', 1),
(858, 43, '2024-04-01 09:30:48', NULL, '157.47.29.222', 1),
(859, 46, '2024-04-01 09:31:34', NULL, '49.37.135.47', 1),
(860, 47, '2024-04-01 09:35:13', NULL, '49.37.135.47', 1),
(861, 43, '2024-04-02 09:26:01', NULL, '157.48.74.222', 1),
(862, 43, '2024-04-03 09:30:06', NULL, '157.48.90.148', 1),
(863, 46, '2024-04-03 09:31:59', NULL, '49.37.128.239', 1),
(864, 46, '2024-04-03 18:42:29', '2024-04-03 18:42:32', '49.37.128.147', 1),
(865, 43, '2024-04-04 09:16:20', NULL, '49.37.128.147', 1),
(866, 47, '2024-04-04 09:22:32', NULL, '49.37.128.147', 1),
(867, 46, '2024-04-04 09:32:33', NULL, '49.37.128.147', 1),
(868, 46, '2024-04-04 18:44:44', '2024-04-04 18:44:46', '49.37.128.147', 1),
(869, 43, '2024-04-05 09:29:47', NULL, '49.37.128.147', 1),
(870, 43, '2024-04-06 09:29:12', NULL, '157.47.22.84', 1),
(871, 46, '2024-04-06 09:38:33', NULL, '49.37.128.147', 1),
(872, 46, '2024-04-06 18:34:46', '2024-04-06 18:34:50', '49.37.128.147', 1),
(873, 46, '2024-04-08 09:29:19', NULL, '49.37.128.147', 1),
(874, 46, '2024-04-08 18:39:17', '2024-04-08 18:39:27', '49.37.128.147', 1),
(875, 46, '2024-04-08 18:39:30', NULL, '49.37.128.147', 1),
(876, 46, '2024-04-10 09:31:57', NULL, '49.37.128.147', 1),
(877, 43, '2024-04-10 09:33:51', NULL, '157.47.24.160', 1),
(878, 1, '2024-04-10 12:16:24', NULL, '49.37.128.147', 1),
(879, 46, '2024-04-10 18:34:45', '2024-04-10 18:34:47', '49.37.128.147', 1),
(880, 46, '2024-04-11 09:31:45', NULL, '49.37.133.228', 1),
(881, 43, '2024-04-11 09:31:46', NULL, '157.47.11.148', 1),
(882, 46, '2024-04-12 09:48:49', NULL, '49.37.133.228', 1),
(883, 43, '2024-04-13 09:33:36', NULL, '157.48.128.54', 1),
(884, 46, '2024-04-13 09:58:15', NULL, '49.37.133.228', 1),
(885, 46, '2024-04-13 18:50:05', '2024-04-13 18:50:08', '49.37.133.228', 1),
(886, 43, '2024-04-15 09:24:38', NULL, '49.37.133.228', 1),
(887, 46, '2024-04-15 10:43:59', NULL, '49.37.133.228', 1),
(888, 1, '2024-04-15 11:56:01', NULL, '49.37.133.228', 1),
(889, 1, '2024-04-15 11:57:08', NULL, '49.37.133.228', 1),
(890, 1, '2024-04-15 12:00:01', NULL, '103.80.14.111', 1),
(891, 51, '2024-04-15 12:02:24', NULL, '49.37.133.228', 1),
(892, 1, '2024-04-15 14:39:21', '2024-04-15 15:55:59', '49.37.133.228', 1),
(893, 53, '2024-04-15 15:56:17', '2024-04-15 16:56:23', '49.37.133.228', 1),
(894, 1, '2024-04-15 16:56:29', '2024-04-15 16:57:18', '49.37.133.228', 1),
(895, 1, '2024-04-15 17:08:05', '2024-04-15 17:09:10', '49.37.133.228', 1),
(896, 46, '2024-04-15 18:32:34', NULL, '49.37.133.228', 1),
(897, 43, '2024-04-16 09:23:50', NULL, '157.47.45.195', 1),
(898, 46, '2024-04-16 09:31:17', NULL, '49.37.133.228', 1),
(899, 1, '2024-04-16 11:23:57', NULL, '49.37.133.228', 1),
(900, 43, '2024-04-18 09:27:19', NULL, '157.47.14.90', 1),
(901, 46, '2024-04-18 09:32:51', NULL, '49.37.133.228', 1),
(902, 1, '2024-04-18 13:17:06', NULL, '103.49.55.204', 1),
(903, 43, '2024-04-19 09:24:58', NULL, '49.37.133.228', 1),
(904, 46, '2024-04-19 09:45:01', NULL, '49.37.133.228', 1),
(905, 46, '2024-04-22 09:37:57', NULL, '49.37.133.228', 1),
(906, 43, '2024-04-22 09:51:22', NULL, '157.47.35.126', 1),
(907, 43, '2024-04-23 09:51:52', NULL, '157.47.103.50', 1),
(908, 44, '2024-04-23 10:14:13', NULL, '106.76.192.136', 1),
(909, 53, '2024-04-23 10:23:01', NULL, '49.37.133.64', 1),
(910, 46, '2024-04-23 11:04:35', NULL, '49.37.133.64', 1),
(911, 46, '2024-04-23 18:35:35', '2024-04-23 18:35:41', '49.37.133.64', 1),
(912, 46, '2024-04-24 09:48:51', NULL, '49.37.133.64', 1),
(913, 44, '2024-04-24 13:06:03', NULL, '122.162.51.132', 1),
(914, 46, '2024-04-25 09:41:53', NULL, '49.37.133.64', 1),
(915, 43, '2024-04-25 09:47:39', NULL, '49.37.133.64', 1),
(916, 44, '2024-04-25 12:50:17', NULL, '157.47.19.1', 1),
(917, 46, '2024-04-26 09:44:37', NULL, '49.37.133.64', 1),
(918, 43, '2024-04-27 09:49:56', NULL, '157.47.120.160', 1),
(919, 44, '2024-04-30 11:37:46', '2024-04-30 11:39:37', '49.37.133.64', 1),
(920, 1, '2024-04-30 11:40:01', '2024-04-30 11:44:58', '49.37.133.64', 1),
(921, 44, '2024-04-30 11:45:00', NULL, '49.37.133.64', 1),
(922, 1, '2024-04-30 12:16:56', NULL, '49.37.133.64', 1),
(923, 43, '2024-04-30 15:18:43', NULL, '49.37.133.64', 1),
(924, 46, '2024-05-02 09:27:19', NULL, '49.37.133.64', 1),
(925, 46, '2024-05-03 09:35:17', NULL, '49.37.133.64', 1),
(926, 1, '2024-05-03 10:14:46', NULL, '49.37.133.64', 1),
(927, 41, '2024-05-03 10:15:48', NULL, '49.37.133.64', 1),
(928, 44, '2024-05-08 09:38:55', NULL, '49.37.133.64', 1),
(929, 1, '2024-05-09 15:11:22', NULL, '49.37.133.64', 1),
(930, 1, '2024-05-16 17:08:30', NULL, '49.37.133.64', 1),
(931, 1, '2024-06-13 20:09:21', NULL, '49.37.133.160', 1),
(932, 1, '2024-06-13 20:09:45', NULL, '117.99.199.118', 1),
(933, 45, '2024-06-13 20:11:49', NULL, '117.99.199.118', 1),
(934, 1, '2024-08-07 11:39:13', '2024-08-07 11:41:25', '202.133.63.226', 1),
(935, 1, '2025-02-21 16:45:11', NULL, '152.58.233.63', 1),
(936, 44, '2025-02-25 10:14:41', NULL, '49.43.200.9', 1),
(937, 44, '2025-03-01 17:04:15', NULL, '49.43.203.13', 1),
(938, 1, '2025-03-01 17:13:43', NULL, '49.43.203.13', 1),
(939, 1, '2025-03-01 17:14:04', '2025-03-01 17:14:10', '103.186.128.194', 1),
(940, 53, '2025-03-03 12:31:59', NULL, '106.51.61.146', 1),
(941, 1, '2025-03-03 16:57:42', '2025-03-03 20:01:01', '49.43.200.48', 1),
(942, 1, '2025-03-03 17:03:33', NULL, '49.43.200.48', 1),
(943, 1, '2025-03-03 17:15:59', NULL, '49.43.200.48', 1),
(944, 62, '2025-03-03 18:38:38', '2025-03-03 18:42:40', '49.43.200.48', 1),
(945, 62, '2025-03-03 18:44:43', NULL, '49.43.200.48', 1),
(946, 62, '2025-03-03 18:56:12', NULL, '49.43.200.48', 1),
(947, 59, '2025-03-03 19:52:55', '2025-03-03 20:08:09', '49.43.200.48', 1),
(948, 1, '2025-03-03 20:01:56', NULL, '103.186.128.194', 1),
(949, 1, '2025-03-03 20:02:05', NULL, '49.43.200.48', 1),
(950, 65, '2025-03-03 20:04:24', NULL, '103.186.128.194', 1),
(951, 65, '2025-03-03 20:08:32', NULL, '49.43.200.48', 1),
(952, 1, '2025-03-07 06:18:08', '2025-03-07 06:19:35', '103.186.128.194', 1),
(953, 65, '2025-03-07 06:20:05', '2025-03-07 06:20:40', '103.186.128.194', 1),
(954, 1, '2025-03-07 06:21:09', NULL, '103.186.128.194', 1),
(955, 1, '2025-03-07 06:35:16', NULL, '106.195.71.14', 1),
(956, 1, '2025-03-07 08:17:27', NULL, '49.43.200.48', 1),
(957, 65, '2025-03-07 09:05:40', NULL, '49.43.200.48', 1),
(958, 62, '2025-03-07 09:07:48', NULL, '49.43.200.48', 1),
(959, 61, '2025-03-07 10:04:26', NULL, '49.43.200.48', 1),
(960, 60, '2025-03-07 10:05:10', NULL, '49.43.200.48', 1),
(961, 1, '2025-03-07 12:07:22', '2025-03-07 12:08:59', '49.43.200.48', 1),
(962, 1, '2025-03-07 12:10:14', '2025-03-07 12:11:13', '49.43.200.48', 1),
(963, 59, '2025-03-07 12:11:38', NULL, '49.43.200.48', 1),
(964, 1, '2025-03-07 15:36:52', NULL, '49.43.200.48', 1),
(965, 61, '2025-03-07 18:00:42', '2025-03-07 18:08:29', '49.43.200.48', 1),
(966, 65, '2025-03-07 18:09:06', NULL, '49.43.200.48', 1),
(967, 62, '2025-03-07 18:09:19', NULL, '49.43.200.48', 1),
(968, 64, '2025-03-07 18:13:26', NULL, '103.174.160.13', 1),
(969, 63, '2025-03-07 19:16:41', NULL, '223.196.174.84', 1),
(970, 59, '2025-03-07 20:24:50', NULL, '223.196.170.159', 1),
(971, 64, '2025-03-07 22:37:47', NULL, '103.174.160.13', 1),
(972, 65, '2025-03-08 09:02:29', NULL, '49.43.200.48', 1),
(973, 61, '2025-03-08 09:03:10', NULL, '152.59.203.100', 1),
(974, 62, '2025-03-08 09:09:03', NULL, '49.43.200.48', 1),
(975, 1, '2025-03-08 09:11:41', NULL, '49.43.200.48', 1),
(976, 60, '2025-03-08 09:37:30', NULL, '49.43.200.48', 1),
(977, 59, '2025-03-08 09:38:25', NULL, '49.43.200.48', 1),
(978, 61, '2025-03-08 09:39:12', NULL, '49.43.200.48', 1),
(979, 1, '2025-03-08 12:09:54', NULL, '49.43.200.48', 1),
(980, 59, '2025-03-08 18:07:18', NULL, '117.99.198.9', 1),
(981, 64, '2025-03-08 18:39:42', NULL, '103.174.160.175', 1),
(982, 62, '2025-03-08 18:43:40', NULL, '49.43.200.48', 1),
(983, 65, '2025-03-08 18:46:31', NULL, '49.43.200.48', 1),
(984, 63, '2025-03-08 20:01:16', NULL, '106.215.168.71', 1),
(985, 65, '2025-03-10 08:55:21', '2025-03-10 23:29:24', '49.43.200.48', 1),
(986, 62, '2025-03-10 08:58:14', '2025-03-10 23:29:24', '49.43.200.48', 1),
(987, 61, '2025-03-10 09:03:32', '2025-03-10 23:29:24', '152.59.203.176', 1),
(988, 60, '2025-03-10 09:16:00', '2025-03-10 23:29:24', '49.43.200.48', 1),
(989, 59, '2025-03-10 10:44:20', '2025-03-10 23:29:24', '49.43.200.48', 1),
(990, 1, '2025-03-10 14:03:27', '2025-03-10 23:29:24', '49.43.200.48', 1),
(991, 61, '2025-03-10 14:07:10', '2025-03-10 23:29:24', '49.43.200.48', 1),
(992, 61, '2025-03-10 14:37:00', '2025-03-10 23:29:24', '49.43.200.48', 1),
(993, 65, '2025-03-10 18:01:34', '2025-03-10 23:29:24', '49.43.200.48', 1),
(994, 62, '2025-03-10 18:02:29', '2025-03-10 23:29:24', '49.43.200.48', 1),
(995, 63, '2025-03-10 18:22:36', '2025-03-10 23:29:24', '223.196.173.218', 1),
(996, 64, '2025-03-10 18:56:06', '2025-03-10 23:29:24', '103.174.160.235', 1),
(997, 59, '2025-03-10 19:50:45', '2025-03-10 23:29:24', '223.196.174.122', 1),
(998, 1, '2025-03-10 21:01:33', '2025-03-10 23:29:24', '103.186.128.194', 1),
(1001, 62, '2025-03-11 08:59:48', '2025-03-11 18:00:54', '49.43.200.48', 1),
(1002, 65, '2025-03-11 09:04:19', '2025-03-11 18:01:29', '49.43.200.48', 1),
(1003, 65, '2025-03-12 08:53:15', '2025-03-12 18:29:42', '49.43.200.48', 1),
(1004, 62, '2025-03-12 09:05:04', '2025-03-12 18:10:12', '49.43.200.48', 1),
(1005, 59, '2025-03-12 17:48:13', '2025-03-12 18:31:45', '49.43.203.81', 1),
(1006, 60, '2025-03-12 17:49:41', '2025-03-12 18:07:54', '49.43.203.81', 1),
(1007, 64, '2025-03-12 22:22:00', NULL, '103.174.160.115', 1),
(1008, 62, '2025-03-13 09:00:30', '2025-03-13 18:20:03', '49.43.203.81', 1),
(1009, 65, '2025-03-13 09:01:03', '2025-03-13 18:15:40', '49.43.203.81', 1),
(1010, 59, '2025-03-13 09:06:10', '2025-03-13 18:14:50', '49.43.203.81', 1),
(1011, 60, '2025-03-13 09:13:49', '2025-03-13 18:13:17', '49.43.203.81', 1),
(1012, 61, '2025-03-13 09:14:23', '2025-03-13 18:26:03', '49.43.203.81', 1),
(1013, 64, '2025-03-13 18:33:21', NULL, '103.174.160.115', 1),
(1014, 63, '2025-03-13 19:19:41', '2025-03-13 22:19:07', '223.196.170.157', 1),
(1015, 61, '2025-03-14 08:53:09', '2025-03-14 18:05:35', '49.43.203.81', 1),
(1016, 62, '2025-03-14 08:58:09', '2025-03-14 18:33:56', '49.43.203.81', 1),
(1017, 59, '2025-03-14 09:06:17', '2025-03-14 18:16:37', '223.187.71.223', 1),
(1018, 65, '2025-03-14 09:09:50', '2025-03-14 18:34:48', '49.43.203.81', 1),
(1019, 60, '2025-03-14 09:10:39', '2025-03-14 18:32:33', '49.43.203.81', 1),
(1020, 63, '2025-03-14 19:16:43', '2025-03-14 23:32:56', '157.47.83.252', 1),
(1021, 63, '2025-03-15 21:32:10', '2025-03-15 23:03:24', '223.196.174.117', 1),
(1022, 59, '2025-03-17 08:59:54', '2025-03-17 18:00:59', '223.196.170.160', 1),
(1023, 65, '2025-03-17 09:01:29', '2025-03-17 18:08:51', '49.15.211.1', 1),
(1024, 61, '2025-03-17 09:01:42', '2025-03-17 18:08:58', '152.59.202.95', 1),
(1025, 62, '2025-03-17 09:29:35', '2025-03-17 18:08:01', '106.217.192.138', 1),
(1026, 60, '2025-03-17 11:28:58', '2025-03-17 18:26:48', '152.59.205.111', 1),
(1027, 60, '2025-03-17 11:28:59', '2025-03-17 18:27:23', '152.59.205.111', 1),
(1028, 63, '2025-03-17 17:59:10', '2025-03-17 21:30:02', '106.215.173.112', 1),
(1029, 64, '2025-03-17 18:53:10', NULL, '103.174.160.237', 1),
(1030, 59, '2025-03-18 09:00:22', NULL, '223.196.174.118', 1),
(1031, 65, '2025-03-18 09:00:33', '2025-03-18 18:04:45', '223.228.100.205', 1),
(1032, 61, '2025-03-18 09:00:51', NULL, '152.59.203.46', 1),
(1033, 62, '2025-03-18 09:03:32', '2025-03-18 18:02:27', '223.228.102.191', 1),
(1034, 60, '2025-03-18 09:53:42', '2025-03-18 18:45:28', '152.59.203.228', 1),
(1035, 63, '2025-03-18 19:25:59', '2025-03-18 22:22:01', '223.196.173.48', 1),
(1036, 61, '2025-03-19 09:00:55', '2025-03-19 18:37:48', '152.59.203.28', 1),
(1037, 65, '2025-03-19 09:00:59', NULL, '223.228.103.129', 1),
(1038, 62, '2025-03-19 09:01:43', '2025-03-19 18:09:41', '49.37.128.162', 1),
(1039, 59, '2025-03-19 09:04:56', '2025-03-19 18:01:26', '106.195.74.11', 1),
(1040, 60, '2025-03-19 09:07:58', '2025-03-19 18:22:13', '152.59.205.252', 1),
(1041, 63, '2025-03-19 20:43:19', '2025-03-19 22:57:52', '106.215.173.112', 1),
(1042, 65, '2025-03-20 08:58:07', '2025-03-20 18:13:19', '49.43.202.226', 1),
(1043, 61, '2025-03-20 08:58:29', '2025-03-20 18:07:53', '49.43.202.226', 1),
(1044, 62, '2025-03-20 09:03:16', '2025-03-20 18:13:32', '49.43.202.226', 1),
(1045, 60, '2025-03-20 09:04:54', '2025-03-20 19:50:22', '49.43.202.226', 1),
(1046, 59, '2025-03-20 09:15:17', '2025-03-20 18:10:48', '49.43.202.226', 1),
(1047, 63, '2025-03-20 21:01:33', '2025-03-20 23:08:24', '223.196.172.243', 1),
(1048, 61, '2025-03-21 09:00:50', '2025-03-21 18:04:31', '49.43.201.122', 1),
(1049, 62, '2025-03-21 09:01:45', '2025-03-21 18:04:52', '49.43.201.122', 1),
(1050, 65, '2025-03-21 09:03:21', '2025-03-21 18:05:21', '49.43.201.122', 1),
(1051, 60, '2025-03-21 09:06:11', '2025-03-21 18:06:07', '152.59.203.162', 1),
(1052, 59, '2025-03-21 09:07:05', '2025-03-21 18:07:21', '49.43.201.122', 1),
(1053, 63, '2025-03-21 18:27:04', '2025-03-21 22:43:02', '223.196.172.138', 1),
(1054, 63, '2025-03-21 22:43:29', '2025-03-21 22:43:38', '223.196.171.230', 1),
(1055, 61, '2025-03-22 09:00:32', NULL, '49.43.203.114', 1),
(1056, 62, '2025-03-22 09:03:22', '2025-03-22 18:03:02', '223.227.96.33', 1),
(1057, 65, '2025-03-22 09:05:10', '2025-03-22 18:02:27', '106.76.208.186', 1),
(1058, 60, '2025-03-22 09:07:51', '2025-03-22 18:03:40', '49.43.203.114', 1),
(1059, 59, '2025-03-22 09:18:45', '2025-03-22 18:05:44', '49.43.203.114', 1),
(1060, 61, '2025-03-24 08:57:43', '2025-03-24 18:04:50', '43.241.66.86', 1),
(1061, 65, '2025-03-24 09:04:32', '2025-03-24 18:07:59', '49.43.201.65', 1),
(1062, 59, '2025-03-24 10:31:18', '2025-03-24 18:10:18', '43.241.66.86', 1),
(1063, 62, '2025-03-24 10:34:22', '2025-03-24 18:23:30', '49.43.201.65', 1),
(1064, 60, '2025-03-24 10:34:41', '2025-03-24 18:07:45', '49.43.201.65', 1),
(1065, 63, '2025-03-24 19:30:52', '2025-03-24 23:23:44', '223.196.171.231', 1),
(1066, 65, '2025-03-25 08:58:45', '2025-03-25 18:03:56', '49.43.201.65', 1),
(1067, 61, '2025-03-25 09:00:31', '2025-03-25 18:04:04', '49.43.201.65', 1),
(1068, 59, '2025-03-25 09:16:26', '2025-03-25 18:04:50', '49.43.201.65', 1),
(1069, 62, '2025-03-25 09:16:47', '2025-03-25 18:19:22', '106.217.128.179', 1),
(1070, 60, '2025-03-25 09:19:10', '2025-03-25 18:03:50', '49.43.201.65', 1),
(1071, 62, '2025-03-26 09:03:32', '2025-03-26 18:55:52', '49.43.201.65', 1),
(1072, 65, '2025-03-26 09:04:50', '2025-03-26 18:55:06', '49.43.201.65', 1),
(1073, 61, '2025-03-26 09:06:30', '2025-03-26 18:02:35', '152.59.205.35', 1),
(1074, 60, '2025-03-26 09:09:20', '2025-03-26 18:03:02', '49.43.201.65', 1),
(1075, 59, '2025-03-26 09:16:30', '2025-03-26 18:37:30', '49.43.201.65', 1),
(1076, 64, '2025-03-26 19:13:23', '2025-03-26 22:56:16', '103.174.160.17', 1),
(1077, 60, '2025-03-27 08:27:02', '2025-03-27 18:04:40', '49.43.201.65', 1),
(1078, 62, '2025-03-27 08:35:40', '2025-03-27 18:09:00', '49.43.201.65', 1),
(1079, 65, '2025-03-27 08:37:11', '2025-03-27 18:00:58', '49.43.201.65', 1),
(1080, 67, '2025-03-27 09:01:06', '2025-03-27 18:00:41', '223.228.96.53', 1),
(1081, 61, '2025-03-27 09:01:19', '2025-03-27 18:00:54', '49.43.201.65', 1),
(1082, 68, '2025-03-27 09:02:06', '2025-03-27 18:02:45', '49.43.201.65', 1),
(1083, 59, '2025-03-27 09:03:10', '2025-03-27 18:08:15', '49.43.201.65', 1),
(1084, 64, '2025-03-27 18:57:30', '2025-03-27 22:30:27', '103.174.160.17', 1),
(1085, 63, '2025-03-27 21:26:24', '2025-03-27 23:12:27', '223.196.168.47', 1),
(1086, 62, '2025-03-28 08:58:49', NULL, '49.43.201.65', 1),
(1087, 67, '2025-03-28 09:01:24', '2025-03-28 18:00:06', '106.195.70.76', 1),
(1088, 65, '2025-03-28 09:02:18', '2025-03-28 18:00:21', '49.43.201.65', 1),
(1089, 59, '2025-03-28 09:13:19', '2025-03-28 18:08:32', '152.59.204.99', 1),
(1090, 61, '2025-03-28 09:14:10', '2025-03-28 18:01:18', '152.59.202.51', 1),
(1091, 68, '2025-03-28 09:14:39', '2025-03-28 18:01:14', '157.48.146.109', 1),
(1092, 60, '2025-03-28 09:34:06', '2025-03-28 18:00:34', '49.43.201.65', 1),
(1093, 63, '2025-03-28 18:48:58', NULL, '223.196.172.245', 1),
(1094, 65, '2025-03-29 08:59:18', '2025-03-29 18:01:01', '49.43.201.65', 1),
(1095, 67, '2025-03-29 09:00:03', '2025-03-29 18:00:29', '106.195.66.47', 1),
(1096, 61, '2025-03-29 09:01:48', '2025-03-29 18:14:26', '152.59.202.241', 1),
(1097, 59, '2025-03-29 09:32:04', '2025-03-29 18:18:43', '27.59.54.84', 1),
(1098, 60, '2025-03-29 18:14:06', NULL, '49.43.201.65', 1),
(1099, 63, '2025-03-29 21:22:28', '2025-03-29 22:46:47', '223.196.170.158', 1),
(1100, 65, '2025-04-01 08:46:34', '2025-04-01 18:00:27', '49.43.201.65', 1),
(1101, 67, '2025-04-01 09:00:08', '2025-04-01 18:00:23', '223.228.102.255', 1),
(1102, 60, '2025-04-01 09:05:49', '2025-04-01 18:01:36', '49.43.201.65', 1),
(1103, 68, '2025-04-01 09:10:09', '2025-04-01 18:03:41', '157.48.190.9', 1),
(1104, 61, '2025-04-01 09:10:59', '2025-04-01 18:25:57', '152.59.202.207', 1),
(1105, 59, '2025-04-01 09:14:21', '2025-04-01 18:42:14', '152.59.204.47', 1),
(1106, 63, '2025-04-01 19:01:14', '2025-04-01 23:03:11', '106.215.175.114', 1),
(1107, 64, '2025-04-01 19:03:38', NULL, '103.174.160.66', 1),
(1108, 62, '2025-04-02 08:58:10', '2025-04-02 18:24:15', '106.217.128.137', 1),
(1109, 67, '2025-04-02 08:58:31', '2025-04-02 18:05:11', '106.221.183.100', 1),
(1110, 60, '2025-04-02 09:07:12', '2025-04-02 18:13:36', '49.43.201.65', 1),
(1111, 61, '2025-04-02 09:11:16', '2025-04-02 18:05:37', '49.43.201.65', 1),
(1112, 65, '2025-04-02 09:12:50', '2025-04-02 18:09:31', '49.43.201.65', 1),
(1113, 59, '2025-04-02 09:20:55', '2025-04-02 18:11:02', '152.59.205.165', 1),
(1114, 68, '2025-04-02 09:24:13', '2025-04-02 18:12:05', '157.47.59.129', 1),
(1115, 63, '2025-04-02 19:23:58', NULL, '106.215.175.114', 1),
(1116, 67, '2025-04-03 08:53:11', '2025-04-03 18:04:11', '49.43.201.65', 1),
(1117, 60, '2025-04-03 08:54:01', NULL, '49.43.201.65', 1),
(1118, 68, '2025-04-03 09:02:16', '2025-04-03 18:03:57', '157.48.165.79', 1),
(1119, 61, '2025-04-03 09:03:53', '2025-04-03 18:03:01', '152.59.205.92', 1),
(1120, 65, '2025-04-03 09:04:10', '2025-04-03 18:03:54', '49.43.201.65', 1),
(1121, 62, '2025-04-03 09:04:11', '2025-04-03 18:04:24', '223.187.32.76', 1),
(1122, 59, '2025-04-03 09:30:52', '2025-04-03 18:08:41', '152.59.204.214', 1),
(1123, 63, '2025-04-03 19:07:28', NULL, '223.196.173.56', 1),
(1124, 63, '2025-04-04 00:31:24', NULL, '223.196.173.0', 1),
(1125, 67, '2025-04-04 08:51:59', '2025-04-04 18:01:47', '223.228.96.49', 1),
(1126, 62, '2025-04-04 09:00:06', '2025-04-04 18:09:46', '49.43.201.65', 1),
(1127, 60, '2025-04-04 09:01:00', '2025-04-04 18:09:17', '152.59.205.69', 1),
(1128, 68, '2025-04-04 09:01:29', '2025-04-04 18:04:24', '157.47.76.126', 1),
(1129, 65, '2025-04-04 09:07:19', '2025-04-04 18:02:57', '49.43.201.65', 1),
(1130, 59, '2025-04-04 09:08:23', '2025-04-04 18:09:25', '152.59.202.120', 1),
(1131, 61, '2025-04-04 09:12:25', '2025-04-04 18:01:03', '49.43.201.65', 1),
(1132, 67, '2025-04-05 08:41:23', '2025-04-05 18:00:41', '223.228.108.128', 1),
(1133, 62, '2025-04-05 09:00:42', '2025-04-05 18:02:36', '49.43.201.65', 1),
(1134, 65, '2025-04-05 09:03:54', '2025-04-05 18:02:15', '49.43.201.65', 1),
(1135, 60, '2025-04-05 09:06:25', '2025-04-05 18:23:51', '152.59.204.234', 1),
(1136, 61, '2025-04-05 09:11:29', NULL, '152.59.203.49', 1),
(1137, 68, '2025-04-05 09:13:51', NULL, '157.48.163.55', 1),
(1138, 59, '2025-04-05 09:15:02', '2025-04-05 18:06:40', '152.59.203.96', 1),
(1139, 63, '2025-04-05 21:15:44', NULL, '223.196.172.244', 1),
(1140, 67, '2025-04-07 08:56:16', '2025-04-07 18:13:34', '106.221.180.37', 1),
(1141, 65, '2025-04-07 08:57:15', '2025-04-07 18:16:14', '49.43.201.65', 1),
(1142, 61, '2025-04-07 08:59:07', '2025-04-07 18:06:50', '152.59.205.32', 1),
(1143, 60, '2025-04-07 09:06:05', '2025-04-07 18:19:51', '152.59.204.189', 1),
(1144, 59, '2025-04-07 09:11:15', '2025-04-07 18:13:41', '152.59.204.140', 1),
(1145, 62, '2025-04-07 09:17:42', '2025-04-07 18:29:38', '49.43.201.65', 1),
(1146, 68, '2025-04-07 09:17:50', '2025-04-07 18:14:50', '157.48.186.249', 1),
(1147, 63, '2025-04-07 18:49:15', NULL, '223.196.168.133', 1),
(1148, 67, '2025-04-08 08:58:43', '2025-04-08 18:10:00', '106.221.182.225', 1),
(1149, 65, '2025-04-08 08:59:16', '2025-04-08 18:55:49', '49.43.201.65', 1),
(1150, 62, '2025-04-08 09:00:35', '2025-04-08 18:10:21', '49.43.201.65', 1),
(1151, 61, '2025-04-08 09:04:25', '2025-04-08 18:03:14', '152.59.205.220', 1),
(1152, 68, '2025-04-08 09:05:40', NULL, '157.48.160.166', 1),
(1153, 60, '2025-04-08 09:05:40', '2025-04-08 18:09:49', '152.59.203.204', 1),
(1154, 59, '2025-04-08 09:13:27', '2025-04-08 18:10:22', '49.43.201.65', 1),
(1155, 63, '2025-04-08 22:11:44', NULL, '223.196.168.190', 1),
(1156, 63, '2025-04-08 22:11:44', NULL, '223.196.168.190', 1),
(1157, 63, '2025-04-08 22:11:44', NULL, '223.196.168.190', 1),
(1158, 65, '2025-04-09 08:53:41', '2025-04-09 18:13:02', '49.156.148.34', 1),
(1159, 61, '2025-04-09 08:59:46', '2025-04-09 18:10:49', '49.156.148.34', 1),
(1160, 67, '2025-04-09 09:04:46', '2025-04-09 18:17:49', '106.195.67.18', 1),
(1161, 68, '2025-04-09 09:08:36', '2025-04-09 18:36:55', '157.47.36.123', 1),
(1162, 62, '2025-04-09 09:09:13', '2025-04-09 18:24:57', '49.43.201.77', 1),
(1163, 60, '2025-04-09 09:15:30', '2025-04-09 18:16:18', '152.59.202.1', 1),
(1164, 63, '2025-04-09 23:21:52', NULL, '223.196.174.130', 1),
(1165, 67, '2025-04-10 08:52:37', '2025-04-10 18:13:04', '49.43.201.77', 1),
(1166, 61, '2025-04-10 09:00:32', '2025-04-10 18:01:14', '49.43.201.77', 1),
(1167, 65, '2025-04-10 09:05:57', '2025-04-10 18:11:59', '49.43.201.77', 1),
(1168, 59, '2025-04-10 09:12:15', '2025-04-10 18:11:53', '49.43.201.77', 1),
(1169, 60, '2025-04-10 09:12:27', '2025-04-10 18:13:36', '152.59.204.5', 1),
(1170, 68, '2025-04-10 09:16:15', '2025-04-10 18:12:02', '157.48.139.50', 1),
(1171, 62, '2025-04-10 18:12:57', '2025-04-10 18:13:15', '49.43.201.77', 1),
(1172, 63, '2025-04-10 19:27:14', NULL, '223.196.168.193', 1),
(1173, 65, '2025-04-11 08:58:08', '2025-04-11 18:13:28', '49.156.148.34', 1),
(1174, 61, '2025-04-11 08:58:42', '2025-04-11 18:12:16', '49.43.201.77', 1),
(1175, 60, '2025-04-11 09:03:11', '2025-04-11 20:30:01', '152.59.204.236', 1),
(1176, 59, '2025-04-11 09:08:53', '2025-04-11 18:16:18', '49.43.201.77', 1),
(1177, 67, '2025-04-11 09:09:51', '2025-04-11 18:12:27', '106.195.64.230', 1),
(1178, 68, '2025-04-11 09:19:48', '2025-04-11 18:15:54', '157.48.149.76', 1),
(1179, 62, '2025-04-11 18:17:27', '2025-04-11 18:17:34', '49.43.201.77', 1),
(1180, 63, '2025-04-11 20:21:32', NULL, '223.196.174.128', 1),
(1181, 67, '2025-04-12 08:57:43', '2025-04-12 18:00:09', '223.228.105.229', 1),
(1182, 65, '2025-04-12 08:59:59', '2025-04-12 18:00:31', '49.43.201.77', 1),
(1183, 61, '2025-04-12 09:00:28', '2025-04-12 18:01:08', '223.187.59.78', 1),
(1184, 62, '2025-04-12 09:09:23', '2025-04-12 18:04:59', '49.43.201.77', 1),
(1185, 59, '2025-04-12 09:09:39', '2025-04-12 18:04:38', '49.43.201.77', 1),
(1186, 68, '2025-04-12 09:11:59', '2025-04-12 18:01:28', '157.48.156.22', 1),
(1187, 60, '2025-04-12 09:29:40', '2025-04-12 18:06:43', '152.59.203.230', 1),
(1188, 61, '2025-04-14 08:57:48', '2025-04-14 18:08:48', '223.187.59.78', 1),
(1189, 65, '2025-04-14 09:03:31', '2025-04-14 18:16:16', '49.43.201.77', 1),
(1190, 59, '2025-04-14 09:14:47', '2025-04-14 18:18:15', '49.43.201.77', 1),
(1191, 62, '2025-04-14 09:19:17', '2025-04-14 18:32:07', '223.187.0.67', 1),
(1192, 68, '2025-04-14 09:21:15', '2025-04-14 18:17:14', '157.47.37.43', 1),
(1193, 67, '2025-04-15 08:58:33', '2025-04-15 18:06:22', '49.43.201.77', 1),
(1194, 62, '2025-04-15 08:59:56', '2025-04-15 19:05:49', '49.43.201.77', 1),
(1195, 61, '2025-04-15 09:00:21', '2025-04-15 18:00:42', '49.43.201.77', 1),
(1196, 60, '2025-04-15 09:02:30', '2025-04-15 18:39:20', '152.59.203.227', 1),
(1197, 65, '2025-04-15 09:07:10', '2025-04-15 18:05:54', '49.43.201.77', 1),
(1198, 59, '2025-04-15 09:12:18', '2025-04-15 19:04:31', '49.43.201.77', 1),
(1199, 68, '2025-04-15 09:12:50', '2025-04-15 18:12:09', '157.47.71.64', 1),
(1200, 63, '2025-04-15 19:43:17', NULL, '223.196.173.53', 1),
(1201, 65, '2025-04-16 08:54:22', '2025-04-16 18:03:48', '49.43.201.77', 1),
(1202, 67, '2025-04-16 08:57:33', '2025-04-16 18:07:04', '27.59.63.47', 1),
(1203, 62, '2025-04-16 08:59:51', '2025-04-16 18:07:58', '27.59.216.37', 1),
(1204, 60, '2025-04-16 09:00:06', '2025-04-16 18:08:09', '49.43.201.77', 1),
(1205, 61, '2025-04-16 09:02:40', NULL, '49.43.201.77', 1),
(1206, 59, '2025-04-16 09:10:07', '2025-04-16 18:07:58', '49.43.201.77', 1),
(1207, 68, '2025-04-16 09:15:07', '2025-04-16 18:08:12', '157.47.115.208', 1),
(1208, 67, '2025-04-17 08:51:32', '2025-04-17 18:08:54', '106.195.74.53', 1),
(1209, 60, '2025-04-17 08:59:11', '2025-04-17 18:31:57', '152.59.203.50', 1),
(1210, 65, '2025-04-17 09:04:12', '2025-04-17 18:10:23', '49.43.201.77', 1),
(1211, 62, '2025-04-17 09:07:04', '2025-04-17 18:32:06', '49.43.201.77', 1),
(1212, 61, '2025-04-17 09:07:09', '2025-04-17 18:08:46', '49.43.201.77', 1),
(1213, 59, '2025-04-17 09:12:37', '2025-04-17 18:18:14', '49.43.201.77', 1),
(1214, 68, '2025-04-17 09:20:26', '2025-04-17 18:13:22', '157.47.51.204', 1),
(1215, 63, '2025-04-17 21:01:15', NULL, '223.196.169.194', 1),
(1216, 67, '2025-04-18 08:57:30', '2025-04-18 18:29:26', '106.216.200.241', 1),
(1217, 61, '2025-04-18 09:03:25', '2025-04-18 18:07:02', '49.43.201.77', 1),
(1218, 65, '2025-04-18 09:08:05', '2025-04-18 18:29:15', '49.43.201.77', 1),
(1219, 62, '2025-04-18 09:08:22', '2025-04-18 19:03:45', '49.43.201.77', 1),
(1220, 60, '2025-04-18 09:10:05', NULL, '49.43.201.77', 1),
(1221, 59, '2025-04-18 09:13:54', '2025-04-18 17:29:22', '223.228.99.144', 1),
(1222, 68, '2025-04-18 18:29:33', '2025-04-18 18:29:43', '49.43.201.77', 1),
(1223, 63, '2025-04-18 18:55:52', NULL, '106.215.173.13', 1),
(1224, 67, '2025-04-21 08:49:11', '2025-04-21 18:02:30', '106.195.65.73', 1),
(1225, 65, '2025-04-21 08:58:42', '2025-04-21 18:01:29', '49.43.201.77', 1),
(1226, 68, '2025-04-21 09:04:13', NULL, '157.47.107.14', 1),
(1227, 61, '2025-04-21 09:08:51', '2025-04-21 18:03:50', '49.43.201.77', 1),
(1228, 62, '2025-04-21 09:10:03', NULL, '49.43.201.77', 1),
(1229, 60, '2025-04-21 09:12:03', NULL, '152.59.204.124', 1),
(1230, 59, '2025-04-21 14:29:02', NULL, '223.196.168.133', 1),
(1231, 67, '2025-04-22 09:01:15', '2025-04-22 18:01:47', '106.195.69.61', 1),
(1232, 62, '2025-04-22 09:02:43', '2025-04-22 18:19:54', '223.187.16.75', 1),
(1233, 61, '2025-04-22 09:04:09', '2025-04-22 18:01:03', '152.59.204.66', 1),
(1234, 65, '2025-04-22 09:04:16', '2025-04-22 18:01:03', '49.43.203.125', 1),
(1235, 68, '2025-04-22 09:15:28', '2025-04-22 19:54:20', '157.47.31.90', 1),
(1236, 59, '2025-04-22 09:36:06', '2025-04-22 18:09:12', '223.228.108.17', 1),
(1237, 67, '2025-04-23 08:59:53', '2025-04-23 18:39:59', '106.195.68.181', 1),
(1238, 61, '2025-04-23 09:07:39', NULL, '49.43.203.125', 1),
(1239, 62, '2025-04-23 09:08:04', '2025-04-23 18:32:11', '49.43.203.125', 1),
(1240, 68, '2025-04-23 09:28:36', '2025-04-23 18:11:02', '157.47.96.69', 1),
(1241, 65, '2025-04-23 09:42:11', '2025-04-23 18:19:36', '49.43.203.125', 1),
(1242, 67, '2025-04-24 08:50:32', '2025-04-24 18:07:08', '223.228.96.61', 1),
(1243, 65, '2025-04-24 09:01:28', '2025-04-24 18:09:14', '49.43.203.125', 1),
(1244, 60, '2025-04-24 09:02:55', '2025-04-24 18:03:52', '49.43.203.125', 1),
(1245, 61, '2025-04-24 09:03:10', NULL, '49.43.203.125', 1),
(1246, 62, '2025-04-24 09:08:38', '2025-04-24 18:18:52', '49.43.203.125', 1),
(1247, 68, '2025-04-24 09:15:07', '2025-04-24 18:05:04', '157.48.186.231', 1),
(1248, 59, '2025-04-24 09:31:36', '2025-04-24 18:04:27', '117.99.196.133', 1),
(1249, 67, '2025-04-25 08:58:05', '2025-04-25 18:04:29', '106.221.189.6', 1),
(1250, 59, '2025-04-25 09:03:30', '2025-04-25 18:07:41', '223.196.168.196', 1),
(1251, 62, '2025-04-25 09:04:09', NULL, '49.43.203.125', 1),
(1252, 61, '2025-04-25 09:05:49', NULL, '152.59.203.187', 1),
(1253, 65, '2025-04-25 09:06:37', '2025-04-25 18:03:24', '49.43.203.125', 1),
(1254, 68, '2025-04-25 09:15:07', '2025-04-25 18:05:26', '157.48.172.120', 1),
(1255, 60, '2025-04-25 10:01:41', '2025-04-25 18:18:08', '152.59.205.161', 1),
(1256, 63, '2025-04-25 19:41:58', NULL, '157.47.123.202', 1),
(1257, 67, '2025-04-26 08:52:57', '2025-04-26 18:02:33', '27.59.61.213', 1),
(1258, 65, '2025-04-26 08:54:53', '2025-04-26 18:00:59', '49.43.203.125', 1),
(1259, 60, '2025-04-26 09:13:43', '2025-04-26 18:30:12', '49.43.203.125', 1),
(1260, 68, '2025-04-26 09:16:33', '2025-04-26 18:02:01', '49.43.203.125', 1),
(1261, 62, '2025-04-26 11:31:00', '2025-04-26 18:06:23', '49.43.203.125', 1),
(1262, 59, '2025-04-26 13:29:05', '2025-04-26 18:29:44', '117.99.198.0', 1),
(1263, 67, '2025-04-28 08:50:08', '2025-04-28 18:04:42', '223.228.108.211', 1),
(1264, 59, '2025-04-28 08:59:14', '2025-04-28 18:10:44', '106.221.182.212', 1),
(1265, 65, '2025-04-28 09:10:08', '2025-04-28 18:12:35', '223.228.108.94', 1),
(1266, 60, '2025-04-28 09:10:53', '2025-04-28 18:18:20', '152.59.202.9', 1),
(1267, 62, '2025-04-28 09:21:40', NULL, '49.43.201.120', 1),
(1268, 68, '2025-04-28 10:39:26', '2025-04-28 18:13:10', '157.48.148.149', 1),
(1269, 67, '2025-04-29 08:53:21', '2025-04-29 18:24:29', '106.221.178.174', 1),
(1270, 60, '2025-04-29 09:04:48', '2025-04-29 18:16:39', '152.59.204.116', 1),
(1271, 59, '2025-04-29 09:05:49', '2025-04-29 18:03:39', '223.196.174.130', 1),
(1272, 65, '2025-04-29 09:05:51', '2025-04-29 18:08:36', '49.43.201.120', 1),
(1273, 68, '2025-04-29 09:15:21', '2025-04-29 18:08:15', '157.48.171.205', 1),
(1274, 61, '2025-04-29 14:13:48', NULL, '49.43.201.120', 1),
(1275, 62, '2025-04-29 14:18:23', '2025-04-29 18:44:17', '49.43.201.120', 1),
(1276, 67, '2025-04-30 08:42:56', '2025-04-30 18:18:00', '27.59.55.57', 1),
(1277, 59, '2025-04-30 09:01:38', '2025-04-30 18:06:27', '223.196.168.193', 1),
(1278, 62, '2025-04-30 09:04:34', '2025-04-30 18:44:45', '49.43.201.120', 1),
(1279, 61, '2025-04-30 09:14:26', NULL, '152.59.205.4', 1),
(1280, 60, '2025-04-30 09:14:43', '2025-04-30 18:29:17', '152.59.203.29', 1),
(1281, 65, '2025-04-30 09:16:27', NULL, '49.43.201.120', 1),
(1282, 68, '2025-04-30 09:27:09', NULL, '157.47.63.158', 1),
(1283, 59, '2025-05-01 09:01:47', '2025-05-01 18:01:27', '223.196.168.198', 1),
(1284, 60, '2025-05-01 09:05:33', NULL, '152.59.204.40', 1),
(1285, 67, '2025-05-01 09:05:50', '2025-05-01 18:10:37', '106.221.186.31', 1),
(1286, 65, '2025-05-01 09:06:41', '2025-05-01 18:10:43', '49.43.202.101', 1),
(1287, 62, '2025-05-01 09:16:07', '2025-05-01 18:15:36', '49.43.202.101', 1),
(1288, 67, '2025-05-02 08:55:56', '2025-05-02 18:02:23', '106.221.182.93', 1),
(1289, 65, '2025-05-02 09:02:15', '2025-05-02 18:02:15', '49.43.201.129', 1),
(1290, 59, '2025-05-02 09:02:16', '2025-05-02 18:20:15', '27.59.62.182', 1),
(1291, 61, '2025-05-02 09:04:04', '2025-05-02 12:35:59', '152.59.204.210', 1),
(1292, 68, '2025-05-02 09:22:45', '2025-05-02 18:03:46', '157.47.51.252', 1),
(1293, 62, '2025-05-02 18:21:13', '2025-05-02 18:21:20', '49.37.128.70', 1),
(1294, 65, '2025-05-03 08:51:56', '2025-05-03 18:00:55', '49.15.215.194', 1),
(1295, 59, '2025-05-03 09:01:20', '2025-05-03 18:12:56', '223.196.174.115', 1),
(1296, 61, '2025-05-03 09:03:57', '2025-05-03 18:22:02', '152.59.203.18', 1),
(1297, 67, '2025-05-03 09:04:38', NULL, '106.221.187.105', 1),
(1298, 60, '2025-05-03 09:04:57', '2025-05-03 18:02:57', '152.59.202.122', 1),
(1299, 62, '2025-05-03 09:08:55', '2025-05-03 19:44:31', '223.185.64.76', 1),
(1300, 68, '2025-05-03 09:15:01', '2025-05-03 18:58:49', '157.47.117.9', 1),
(1301, 67, '2025-05-05 08:28:00', '2025-05-05 18:02:19', '106.216.202.14', 1),
(1302, 62, '2025-05-05 09:00:59', '2025-05-05 18:01:42', '49.43.201.45', 1),
(1303, 65, '2025-05-05 09:10:35', '2025-05-05 18:00:29', '49.43.201.45', 1),
(1304, 60, '2025-05-05 09:19:39', '2025-05-05 18:02:32', '49.43.201.45', 1),
(1305, 59, '2025-05-05 09:28:17', '2025-05-05 18:01:15', '106.195.76.42', 1),
(1306, 68, '2025-05-05 18:03:16', '2025-05-05 18:03:19', '49.43.201.45', 1),
(1307, 67, '2025-05-06 08:51:30', '2025-05-06 18:04:37', '49.43.201.45', 1),
(1308, 61, '2025-05-06 09:00:06', '2025-05-06 18:02:46', '49.43.201.45', 1),
(1309, 60, '2025-05-06 09:00:19', NULL, '49.43.201.45', 1),
(1310, 59, '2025-05-06 09:02:54', '2025-05-06 18:01:02', '223.196.168.117', 1),
(1311, 65, '2025-05-06 09:03:54', '2025-05-06 18:00:36', '49.43.201.45', 1),
(1312, 62, '2025-05-06 09:13:19', '2025-05-06 18:05:04', '49.43.201.45', 1),
(1313, 68, '2025-05-06 09:14:54', NULL, '157.48.183.31', 1),
(1314, 67, '2025-05-07 08:50:05', '2025-05-07 18:14:00', '223.228.109.204', 1),
(1315, 61, '2025-05-07 08:53:32', '2025-05-07 18:04:03', '49.43.201.45', 1),
(1316, 65, '2025-05-07 08:55:13', '2025-05-07 18:06:24', '49.43.201.45', 1),
(1317, 59, '2025-05-07 09:00:58', '2025-05-07 18:06:55', '223.196.171.82', 1),
(1318, 60, '2025-05-07 09:17:59', '2025-05-07 18:09:00', '152.59.205.76', 1),
(1319, 68, '2025-05-07 09:19:55', NULL, '157.48.135.218', 1),
(1320, 62, '2025-05-07 18:13:43', '2025-05-07 18:13:46', '49.43.201.45', 1),
(1321, 65, '2025-05-08 09:05:24', '2025-05-08 18:00:45', '223.185.80.240', 1),
(1322, 67, '2025-05-08 09:06:42', '2025-05-08 18:03:03', '223.187.25.85', 1),
(1323, 60, '2025-05-08 09:09:35', '2025-05-08 18:03:04', '152.59.204.55', 1),
(1324, 59, '2025-05-08 09:10:11', '2025-05-08 18:04:03', '117.99.205.160', 1),
(1325, 62, '2025-05-08 09:13:02', '2025-05-08 18:04:12', '49.43.201.45', 1),
(1326, 68, '2025-05-08 09:13:55', '2025-05-08 18:28:35', '157.47.24.29', 1),
(1327, 61, '2025-05-08 13:36:38', '2025-05-08 18:01:22', '49.43.201.45', 1),
(1328, 63, '2025-05-08 18:35:16', NULL, '157.48.130.179', 1),
(1329, 65, '2025-05-09 08:56:02', '2025-05-09 18:00:35', '49.43.201.45', 1),
(1330, 67, '2025-05-09 08:56:19', '2025-05-09 18:04:03', '117.99.192.155', 1),
(1331, 62, '2025-05-09 09:01:12', NULL, '49.43.201.45', 1),
(1332, 59, '2025-05-09 09:06:22', '2025-05-09 18:00:58', '223.196.168.198', 1),
(1333, 60, '2025-05-09 09:12:25', '2025-05-09 18:07:08', '152.59.202.144', 1),
(1334, 60, '2025-05-09 09:12:25', NULL, '152.59.202.144', 1),
(1335, 68, '2025-05-09 09:15:53', '2025-05-09 18:06:54', '157.47.73.102', 1),
(1336, 67, '2025-05-10 08:59:37', '2025-05-10 18:02:15', '49.43.202.25', 1),
(1337, 65, '2025-05-10 09:00:57', '2025-05-10 18:00:45', '49.43.202.25', 1),
(1338, 59, '2025-05-10 09:01:46', '2025-05-10 18:01:09', '223.228.102.186', 1),
(1339, 62, '2025-05-10 09:03:41', '2025-05-10 18:24:51', '49.43.202.25', 1),
(1340, 68, '2025-05-10 09:23:52', '2025-05-10 18:33:28', '49.43.202.25', 1),
(1341, 65, '2025-05-12 08:57:08', '2025-05-12 18:30:54', '49.43.203.3', 1),
(1342, 67, '2025-05-12 08:59:07', '2025-05-12 18:22:32', '223.228.110.124', 1),
(1343, 59, '2025-05-12 09:07:10', '2025-05-12 18:03:27', '223.196.174.127', 1),
(1344, 62, '2025-05-12 09:12:53', '2025-05-12 18:31:49', '223.185.80.95', 1),
(1345, 68, '2025-05-12 09:15:55', '2025-05-12 18:13:49', '157.48.173.0', 1),
(1346, 60, '2025-05-12 10:20:11', '2025-05-12 18:05:46', '49.43.203.3', 1),
(1347, 67, '2025-05-13 08:56:27', '2025-05-13 18:02:26', '106.195.72.131', 1),
(1348, 65, '2025-05-13 08:59:41', '2025-05-13 18:00:59', '49.43.203.225', 1),
(1349, 59, '2025-05-13 09:00:50', '2025-05-13 18:00:47', '223.228.105.146', 1),
(1350, 62, '2025-05-13 09:10:15', '2025-05-13 19:04:43', '49.43.203.225', 1),
(1351, 68, '2025-05-13 09:48:06', '2025-05-13 18:01:42', '157.47.86.125', 1),
(1352, 60, '2025-05-13 18:01:35', NULL, '49.43.203.225', 1),
(1353, 67, '2025-05-14 08:58:14', '2025-05-14 18:03:52', '49.43.203.225', 1),
(1354, 61, '2025-05-14 08:58:46', '2025-05-14 18:06:20', '49.43.203.225', 1),
(1355, 59, '2025-05-14 09:00:11', '2025-05-14 18:02:24', '106.216.201.255', 1),
(1356, 65, '2025-05-14 09:02:21', '2025-05-14 18:04:02', '49.43.203.225', 1),
(1357, 60, '2025-05-14 09:06:49', '2025-05-14 18:05:11', '49.43.203.225', 1),
(1358, 62, '2025-05-14 09:16:38', '2025-05-14 18:06:45', '49.43.203.225', 1),
(1359, 68, '2025-05-14 18:16:20', NULL, '157.47.29.144', 1),
(1360, 67, '2025-05-15 08:54:50', '2025-05-15 18:02:17', '223.228.105.164', 1),
(1361, 59, '2025-05-15 09:00:29', '2025-05-15 18:01:39', '152.59.203.146', 1),
(1362, 65, '2025-05-15 09:04:26', '2025-05-15 18:01:28', '49.43.203.225', 1),
(1363, 60, '2025-05-15 09:09:09', '2025-05-15 18:02:51', '152.59.205.237', 1),
(1364, 62, '2025-05-15 09:15:57', NULL, '49.43.203.225', 1),
(1365, 68, '2025-05-15 18:11:52', '2025-05-15 18:11:57', '157.48.132.105', 1),
(1366, 65, '2025-05-16 09:00:18', '2025-05-16 18:02:32', '49.43.203.225', 1),
(1367, 59, '2025-05-16 09:04:31', '2025-05-16 18:06:05', '152.59.204.254', 1),
(1368, 60, '2025-05-16 09:05:05', '2025-05-16 18:04:25', '152.59.205.182', 1),
(1369, 67, '2025-05-16 09:05:26', '2025-05-16 21:37:36', '49.43.203.225', 1),
(1370, 61, '2025-05-16 09:06:56', '2025-05-16 18:03:25', '152.57.146.70', 1),
(1371, 62, '2025-05-16 09:27:27', '2025-05-16 18:03:47', '49.43.203.225', 1),
(1372, 68, '2025-05-16 09:41:52', '2025-05-16 18:24:39', '157.48.178.161', 1),
(1373, 62, '2025-05-16 18:11:46', '2025-05-16 18:11:51', '223.187.16.88', 1),
(1374, 65, '2025-05-19 08:54:58', '2025-05-19 18:52:03', '49.43.203.225', 1),
(1375, 67, '2025-05-19 08:59:35', '2025-05-19 18:01:45', '49.43.203.225', 1),
(1376, 59, '2025-05-19 09:00:10', '2025-05-19 18:01:30', '223.196.173.2', 1),
(1377, 60, '2025-05-19 09:10:31', '2025-05-19 18:05:04', '152.59.203.93', 1),
(1378, 61, '2025-05-19 09:14:17', NULL, '152.59.202.13', 1),
(1379, 62, '2025-05-19 09:14:39', '2025-05-19 18:54:20', '49.43.203.225', 1),
(1380, 67, '2025-05-20 09:00:29', '2025-05-20 18:12:25', '49.43.203.225', 1),
(1381, 59, '2025-05-20 09:00:37', NULL, '152.59.204.73', 1),
(1382, 65, '2025-05-20 09:05:31', '2025-05-20 18:06:57', '49.43.203.225', 1),
(1383, 61, '2025-05-20 09:34:04', '2025-05-20 18:08:37', '49.43.203.225', 1),
(1384, 62, '2025-05-20 09:42:01', '2025-05-20 18:09:58', '49.43.203.225', 1),
(1385, 68, '2025-05-20 14:40:56', '2025-05-20 18:03:09', '49.43.203.225', 1),
(1386, 60, '2025-05-20 18:01:50', '2025-05-20 18:01:54', '49.43.203.225', 1),
(1387, 65, '2025-05-21 08:57:44', '2025-05-21 18:00:50', '49.43.203.225', 1),
(1388, 60, '2025-05-21 08:58:21', '2025-05-21 18:03:05', '152.59.205.118', 1),
(1389, 67, '2025-05-21 09:04:04', '2025-05-21 18:00:03', '223.228.99.95', 1),
(1390, 62, '2025-05-21 09:06:25', '2025-05-21 18:03:00', '49.43.203.225', 1),
(1391, 61, '2025-05-21 09:07:28', NULL, '152.59.204.194', 1),
(1392, 59, '2025-05-21 09:31:18', '2025-05-21 18:02:40', '152.59.205.61', 1),
(1393, 67, '2025-05-22 08:55:26', NULL, '49.43.203.225', 1),
(1394, 59, '2025-05-22 09:02:54', '2025-05-22 18:05:12', '157.50.91.1', 1),
(1395, 62, '2025-05-22 09:05:12', NULL, '49.43.203.225', 1),
(1396, 60, '2025-05-22 09:05:30', '2025-05-22 18:08:02', '157.50.103.28', 1),
(1397, 61, '2025-05-22 09:06:17', '2025-05-22 18:04:32', '157.50.95.237', 1),
(1398, 65, '2025-05-22 14:34:38', '2025-05-22 21:18:35', '49.43.203.225', 1),
(1399, 65, '2025-05-23 08:51:28', '2025-05-23 18:00:25', '49.43.203.225', 1),
(1400, 61, '2025-05-23 08:52:56', '2025-05-23 18:00:38', '49.43.203.225', 1),
(1401, 59, '2025-05-23 09:00:47', '2025-05-23 18:02:15', '157.50.96.124', 1),
(1402, 62, '2025-05-23 09:56:15', '2025-05-23 18:59:32', '49.43.203.225', 1),
(1403, 65, '2025-05-24 08:45:12', '2025-05-24 18:01:04', '49.43.203.225', 1),
(1404, 67, '2025-05-24 08:56:44', '2025-05-24 18:50:11', '106.221.179.216', 1),
(1405, 59, '2025-05-24 08:59:26', '2025-05-24 18:00:58', '223.196.174.130', 1),
(1406, 60, '2025-05-24 09:02:25', '2025-05-24 18:24:47', '157.50.92.107', 1),
(1407, 61, '2025-05-24 09:09:06', NULL, '157.50.96.157', 1),
(1408, 62, '2025-05-24 09:09:41', '2025-05-24 19:05:54', '49.43.203.225', 1),
(1409, 59, '2025-05-26 09:01:20', '2025-05-26 18:09:25', '223.196.169.255', 1),
(1410, 65, '2025-05-26 09:05:57', '2025-05-26 18:13:10', '49.43.203.225', 1),
(1411, 62, '2025-05-26 09:06:26', '2025-05-26 18:14:09', '49.43.203.225', 1),
(1412, 60, '2025-05-26 18:13:07', '2025-05-26 18:13:13', '49.43.203.225', 1),
(1413, 60, '2025-05-26 18:13:07', NULL, '49.43.203.225', 1),
(1414, 67, '2025-05-27 08:56:32', '2025-05-27 18:03:43', '49.43.203.225', 1),
(1415, 65, '2025-05-27 08:58:47', '2025-05-27 18:00:47', '49.43.203.225', 1),
(1416, 60, '2025-05-27 09:00:56', '2025-05-27 18:06:02', '157.50.92.237', 1),
(1417, 61, '2025-05-27 09:08:50', NULL, '157.50.94.111', 1),
(1418, 59, '2025-05-27 09:19:43', '2025-05-27 18:04:23', '106.221.189.165', 1),
(1419, 59, '2025-05-28 08:59:40', NULL, '223.228.110.204', 1),
(1420, 60, '2025-05-28 09:00:16', NULL, '157.50.95.201', 1),
(1421, 61, '2025-05-28 09:06:07', NULL, '49.43.203.225', 1),
(1422, 67, '2025-05-28 09:08:02', NULL, '27.59.55.178', 1),
(1423, 65, '2025-05-28 09:14:09', NULL, '49.43.203.225', 1),
(1424, 62, '2025-05-28 09:40:10', NULL, '49.43.203.225', 1),
(1425, 1, '2025-05-28 10:53:32', NULL, '49.43.203.225', 1),
(1426, 61, '2025-05-28 12:25:16', NULL, '49.43.203.225', 1),
(1427, 1, '2025-05-28 12:41:04', NULL, '49.43.203.225', 1),
(1428, 59, '2025-05-28 18:00:25', '2025-05-28 18:00:47', '223.196.168.193', 1),
(1429, 67, '2025-05-28 18:02:03', '2025-05-28 18:02:29', '49.43.203.225', 1),
(1430, 65, '2025-05-28 18:02:17', '2025-05-28 18:02:46', '49.43.203.225', 1),
(1431, 61, '2025-05-28 18:02:18', NULL, '49.43.203.225', 1),
(1432, 62, '2025-05-28 18:02:48', NULL, '49.43.203.225', 1),
(1433, 60, '2025-05-28 18:03:07', NULL, '49.43.203.225', 1),
(1434, 65, '2025-05-28 18:03:23', NULL, '49.43.203.225', 1),
(1435, 67, '2025-05-28 19:42:34', '2025-05-28 19:43:38', '106.221.191.222', 1),
(1436, 67, '2025-05-29 08:58:21', NULL, '49.43.203.225', 1),
(1437, 59, '2025-05-29 08:59:58', NULL, '223.196.169.244', 1),
(1438, 65, '2025-05-29 09:01:49', NULL, '49.43.203.225', 1),
(1439, 60, '2025-05-29 09:02:21', NULL, '157.50.89.146', 1),
(1440, 60, '2025-05-29 09:02:38', NULL, '157.50.88.193', 1),
(1441, 61, '2025-05-29 09:08:16', NULL, '157.50.94.60', 1),
(1442, 59, '2025-05-29 18:03:53', '2025-05-29 18:04:00', '157.50.92.170', 1),
(1443, 61, '2025-05-29 18:04:31', NULL, '49.43.203.225', 1),
(1444, 60, '2025-05-29 18:06:33', NULL, '157.50.91.99', 1),
(1445, 67, '2025-05-30 08:57:03', NULL, '49.43.203.225', 1),
(1446, 65, '2025-05-30 08:57:32', NULL, '49.43.203.225', 1),
(1447, 59, '2025-05-30 09:03:20', NULL, '157.50.92.66', 1),
(1448, 67, '2025-05-30 18:03:49', '2025-05-30 18:03:54', '49.43.203.225', 1),
(1449, 59, '2025-05-30 18:04:00', '2025-05-30 18:05:29', '223.196.168.133', 1),
(1450, 67, '2025-05-31 08:55:22', NULL, '106.195.64.177', 1),
(1451, 59, '2025-05-31 09:00:32', NULL, '157.50.96.126', 1),
(1452, 65, '2025-05-31 09:05:47', NULL, '49.43.203.225', 1),
(1453, 59, '2025-05-31 18:03:28', '2025-05-31 18:03:30', '223.196.173.72', 1),
(1454, 65, '2025-06-02 08:57:19', NULL, '49.43.203.225', 1),
(1455, 59, '2025-06-02 09:00:46', NULL, '157.50.102.172', 1),
(1456, 67, '2025-06-02 09:06:44', NULL, '106.221.191.252', 1),
(1457, 62, '2025-06-02 09:07:46', NULL, '49.43.203.225', 1),
(1458, 59, '2025-06-02 18:10:14', '2025-06-02 18:10:16', '157.50.98.82', 1),
(1459, 59, '2025-06-03 09:00:07', NULL, '223.196.173.53', 1),
(1460, 67, '2025-06-03 09:06:16', NULL, '49.43.203.225', 1),
(1461, 65, '2025-06-03 09:10:23', NULL, '49.43.203.225', 1),
(1462, 61, '2025-06-03 09:11:23', NULL, '49.43.203.225', 1),
(1463, 60, '2025-06-03 09:11:45', NULL, '49.43.203.225', 1),
(1464, 60, '2025-06-03 09:13:05', NULL, '157.50.89.228', 1),
(1465, 67, '2025-06-03 18:00:12', '2025-06-03 18:00:14', '223.228.111.179', 1),
(1466, 65, '2025-06-03 18:00:43', '2025-06-03 18:00:48', '49.43.203.225', 1),
(1467, 59, '2025-06-03 18:02:02', '2025-06-03 18:02:05', '223.196.172.246', 1),
(1468, 67, '2025-06-04 09:00:07', NULL, '223.228.104.228', 1),
(1469, 59, '2025-06-04 09:00:20', NULL, '157.50.98.244', 1),
(1470, 59, '2025-06-04 15:40:18', '2025-06-04 18:00:50', '223.196.173.61', 1),
(1471, 59, '2025-06-05 08:59:27', '2025-06-05 18:03:23', '157.50.101.137', 1),
(1472, 1, '2025-06-05 20:25:06', NULL, '103.186.128.194', 1),
(1473, 59, '2025-06-06 08:59:58', '2025-06-06 18:01:50', '152.57.158.154', 1),
(1474, 67, '2025-06-06 09:04:24', '2025-06-06 18:01:42', '223.228.98.82', 1),
(1475, 65, '2025-06-06 09:07:03', '2025-06-06 18:01:42', '49.43.200.157', 1),
(1476, 61, '2025-06-06 15:16:50', '2025-06-06 15:20:43', '49.43.200.157', 1),
(1477, 61, '2025-06-06 15:21:23', '2025-06-06 15:21:26', '49.43.200.157', 1),
(1478, 60, '2025-06-06 15:21:29', NULL, '49.43.200.157', 1),
(1479, 67, '2025-06-07 09:01:58', NULL, '49.43.200.157', 1),
(1480, 62, '2025-06-07 09:02:27', NULL, '49.43.200.157', 1),
(1481, 59, '2025-06-07 09:03:00', '2025-06-07 18:04:20', '157.50.96.220', 1),
(1482, 65, '2025-06-07 09:10:45', '2025-06-07 18:43:42', '49.43.200.157', 1),
(1483, 59, '2025-06-09 08:54:30', '2025-06-09 18:21:26', '157.50.98.19', 1),
(1484, 67, '2025-06-09 09:01:50', '2025-06-09 18:26:21', '106.216.207.6', 1),
(1485, 60, '2025-06-09 09:09:41', NULL, '157.50.98.60', 1),
(1486, 65, '2025-06-09 09:09:59', '2025-06-09 18:19:03', '49.43.200.157', 1),
(1487, 61, '2025-06-09 09:10:19', NULL, '157.50.97.116', 1),
(1488, 67, '2025-06-10 09:00:36', '2025-06-10 18:00:43', '106.216.206.168', 1),
(1489, 61, '2025-06-10 09:12:02', NULL, '49.43.200.157', 1),
(1490, 59, '2025-06-10 09:25:13', '2025-06-10 18:05:23', '157.50.93.122', 1),
(1491, 65, '2025-06-10 11:51:27', '2025-06-10 18:01:06', '49.43.200.157', 1),
(1492, 60, '2025-06-10 13:12:26', '2025-06-10 18:11:24', '49.43.200.157', 1),
(1493, 67, '2025-06-11 08:58:28', '2025-06-11 18:50:39', '49.43.200.157', 1),
(1494, 61, '2025-06-11 09:05:46', NULL, '157.50.97.214', 1),
(1495, 59, '2025-06-11 09:08:25', NULL, '157.50.93.102', 1),
(1496, 65, '2025-06-11 09:09:41', NULL, '49.43.200.157', 1),
(1497, 60, '2025-06-11 11:34:09', '2025-06-11 18:14:44', '49.43.200.157', 1),
(1498, 67, '2025-06-12 08:58:46', '2025-06-12 18:01:10', '27.59.53.137', 1),
(1499, 60, '2025-06-12 09:01:21', '2025-06-12 18:06:56', '157.50.91.160', 1),
(1500, 65, '2025-06-12 09:04:56', '2025-06-12 18:01:00', '49.43.200.157', 1),
(1501, 61, '2025-06-12 09:08:42', '2025-06-12 18:02:11', '157.50.88.155', 1),
(1502, 59, '2025-06-12 09:18:45', '2025-06-12 18:03:03', '49.43.200.157', 1),
(1503, 67, '2025-06-13 08:57:14', '2025-06-13 18:00:52', '49.43.201.29', 1),
(1504, 65, '2025-06-13 09:04:23', '2025-06-13 18:02:07', '106.76.175.239', 1),
(1505, 61, '2025-06-13 09:05:08', '2025-06-13 18:03:33', '157.50.88.7', 1),
(1506, 60, '2025-06-13 09:12:52', '2025-06-13 18:03:43', '49.43.201.29', 1),
(1507, 59, '2025-06-13 09:24:14', '2025-06-13 18:06:03', '49.43.201.29', 1),
(1508, 62, '2025-06-13 18:06:06', '2025-06-13 18:06:14', '223.187.16.67', 1),
(1509, 65, '2025-06-14 08:52:58', '2025-06-14 18:09:05', '49.43.201.157', 1),
(1510, 67, '2025-06-14 08:58:33', '2025-06-14 18:07:00', '49.43.201.157', 1),
(1511, 60, '2025-06-14 09:03:11', '2025-06-14 18:12:01', '157.50.100.13', 1),
(1512, 62, '2025-06-14 09:05:48', NULL, '49.43.201.157', 1),
(1513, 61, '2025-06-14 09:10:33', '2025-06-14 18:07:08', '117.99.193.11', 1),
(1514, 59, '2025-06-16 08:47:46', '2025-06-16 19:08:35', '49.43.203.112', 1),
(1515, 65, '2025-06-16 08:59:34', '2025-06-16 18:11:14', '49.43.203.112', 1),
(1516, 60, '2025-06-16 09:03:13', '2025-06-16 18:15:39', '49.43.203.112', 1),
(1517, 67, '2025-06-16 09:03:15', NULL, '117.99.199.210', 1),
(1518, 61, '2025-06-16 09:06:33', '2025-06-16 19:29:08', '157.50.93.216', 1),
(1519, 62, '2025-06-16 09:10:02', '2025-06-16 18:59:52', '49.43.203.112', 1),
(1520, 67, '2025-06-17 09:01:59', NULL, '223.228.97.227', 1),
(1521, 65, '2025-06-17 09:08:42', NULL, '49.43.203.84', 1),
(1522, 62, '2025-06-17 09:10:56', '2025-06-17 19:22:26', '49.43.203.84', 1),
(1523, 60, '2025-06-17 09:11:07', '2025-06-17 19:29:38', '157.50.95.122', 1),
(1524, 61, '2025-06-17 09:14:21', NULL, '157.50.100.42', 1),
(1525, 59, '2025-06-17 09:20:34', '2025-06-17 18:18:25', '49.43.203.84', 1),
(1526, 62, '2025-06-18 09:03:16', '2025-06-18 18:06:49', '49.43.203.84', 1),
(1527, 60, '2025-06-18 09:03:32', '2025-06-18 18:06:50', '157.50.92.106', 1),
(1528, 59, '2025-06-18 09:22:20', '2025-06-18 18:06:40', '49.43.203.84', 1),
(1529, 67, '2025-06-19 09:03:54', NULL, '49.43.200.234', 1),
(1530, 61, '2025-06-19 09:12:23', '2025-06-19 18:10:12', '49.43.200.234', 1),
(1531, 62, '2025-06-19 09:14:42', '2025-06-19 18:53:49', '49.43.200.234', 1),
(1532, 59, '2025-06-19 18:08:37', '2025-06-19 18:08:48', '49.43.200.234', 1),
(1533, 61, '2025-06-20 08:41:47', NULL, '157.50.94.29', 1),
(1534, 62, '2025-06-20 09:05:08', NULL, '49.43.200.234', 1),
(1535, 59, '2025-06-20 09:18:50', '2025-06-20 18:57:26', '49.43.200.234', 1),
(1536, 60, '2025-06-20 18:30:47', '2025-06-20 18:30:49', '157.50.101.192', 1),
(1537, 67, '2025-06-23 09:07:33', NULL, '49.43.203.160', 1),
(1538, 65, '2025-06-23 09:07:42', '2025-06-23 18:02:46', '49.43.203.160', 1),
(1539, 62, '2025-06-23 09:08:04', '2025-06-23 18:09:36', '49.43.203.160', 1),
(1540, 61, '2025-06-23 09:15:31', NULL, '49.43.203.160', 1);
INSERT INTO `login_records_tbl` (`id`, `staff_id`, `login_date_time`, `logout_date_time`, `ip_address`, `status`) VALUES
(1541, 59, '2025-06-23 09:28:32', NULL, '49.43.203.160', 1),
(1542, 60, '2025-06-23 18:04:47', '2025-06-23 18:04:49', '157.50.90.94', 1),
(1543, 61, '2025-06-24 09:05:18', '2025-06-24 18:05:05', '49.43.203.160', 1),
(1544, 65, '2025-06-24 09:06:13', '2025-06-24 18:02:36', '49.43.203.160', 1),
(1545, 60, '2025-06-24 09:09:28', '2025-06-24 18:44:59', '157.50.91.46', 1),
(1546, 59, '2025-06-24 09:26:14', '2025-06-24 18:11:01', '49.43.203.160', 1),
(1547, 62, '2025-06-24 18:11:48', '2025-06-24 18:11:57', '223.182.32.6', 1),
(1548, 61, '2025-06-25 09:09:12', '2025-06-25 18:11:38', '49.43.202.46', 1),
(1549, 65, '2025-06-25 09:10:34', '2025-06-25 18:10:46', '49.43.202.46', 1),
(1550, 62, '2025-06-25 09:10:48', NULL, '49.43.202.46', 1),
(1551, 60, '2025-06-25 09:20:32', '2025-06-25 18:11:18', '157.50.89.28', 1),
(1552, 59, '2025-06-25 09:27:26', '2025-06-25 19:56:29', '49.43.202.46', 1),
(1553, 62, '2025-06-26 09:08:13', '2025-06-26 18:18:24', '49.43.202.46', 1),
(1554, 60, '2025-06-26 09:14:14', '2025-06-26 18:25:40', '157.50.98.206', 1),
(1555, 65, '2025-06-26 09:18:13', '2025-06-26 18:18:11', '49.43.202.46', 1),
(1556, 59, '2025-06-26 09:22:24', '2025-06-26 18:10:10', '49.43.202.46', 1),
(1557, 65, '2025-06-27 08:57:09', '2025-06-27 18:22:28', '49.43.202.248', 1),
(1558, 62, '2025-06-27 09:04:12', '2025-06-27 18:13:36', '49.43.202.248', 1),
(1559, 60, '2025-06-27 09:09:43', '2025-06-27 18:12:57', '157.50.97.183', 1),
(1560, 59, '2025-06-27 09:31:08', '2025-06-27 18:15:45', '49.43.202.248', 1),
(1561, 67, '2025-06-28 08:58:41', NULL, '223.228.107.118', 1),
(1562, 65, '2025-06-28 08:59:19', '2025-06-28 18:30:56', '49.43.202.248', 1),
(1563, 62, '2025-06-28 09:07:59', NULL, '49.43.202.248', 1),
(1564, 61, '2025-06-28 09:11:32', NULL, '152.59.202.184', 1),
(1565, 59, '2025-06-28 09:20:28', '2025-06-28 18:12:09', '49.43.202.248', 1),
(1566, 67, '2025-06-30 09:01:19', NULL, '49.43.202.122', 1),
(1567, 62, '2025-06-30 09:06:48', NULL, '49.43.202.122', 1),
(1568, 65, '2025-06-30 09:12:50', '2025-06-30 18:08:28', '223.185.114.141', 1),
(1569, 59, '2025-06-30 18:06:13', NULL, '49.43.202.122', 1),
(1570, 65, '2025-07-01 09:05:48', '2025-07-01 18:33:42', '49.43.201.93', 1),
(1571, 59, '2025-07-01 09:29:05', '2025-07-01 18:18:05', '49.43.201.93', 1),
(1572, 60, '2025-07-01 09:40:58', '2025-07-01 18:20:54', '49.43.201.93', 1),
(1573, 62, '2025-07-01 18:35:04', '2025-07-01 18:35:07', '223.187.32.67', 1),
(1574, 61, '2025-07-02 09:06:47', NULL, '49.43.200.131', 1),
(1575, 62, '2025-07-02 09:06:56', '2025-07-02 19:30:59', '49.43.200.131', 1),
(1576, 60, '2025-07-02 09:17:51', '2025-07-02 18:28:41', '157.50.89.147', 1),
(1577, 65, '2025-07-02 09:23:03', '2025-07-02 18:22:05', '223.185.82.132', 1),
(1578, 59, '2025-07-02 09:27:59', '2025-07-02 18:32:52', '49.43.200.131', 1),
(1579, 60, '2025-07-03 09:10:19', '2025-07-03 18:11:49', '157.50.90.9', 1),
(1580, 65, '2025-07-03 09:11:34', NULL, '49.43.202.181', 1),
(1581, 62, '2025-07-03 09:12:10', NULL, '49.43.202.181', 1),
(1582, 59, '2025-07-03 09:16:38', '2025-07-03 18:11:14', '49.43.202.181', 1),
(1583, 67, '2025-07-04 09:06:55', NULL, '49.43.203.62', 1),
(1584, 60, '2025-07-04 09:10:16', '2025-07-04 18:14:49', '157.50.101.244', 1),
(1585, 59, '2025-07-04 09:10:35', '2025-07-04 18:08:27', '49.43.203.62', 1),
(1586, 65, '2025-07-04 09:12:31', '2025-07-04 18:09:50', '49.43.203.62', 1),
(1587, 62, '2025-07-05 08:58:39', NULL, '49.43.201.0', 1),
(1588, 61, '2025-07-05 09:06:10', NULL, '49.43.201.0', 1),
(1589, 60, '2025-07-05 09:07:04', '2025-07-05 18:35:40', '157.50.101.99', 1),
(1590, 65, '2025-07-05 09:13:33', '2025-07-05 18:15:47', '49.43.201.0', 1),
(1591, 59, '2025-07-05 09:19:45', '2025-07-05 18:12:41', '49.43.201.0', 1),
(1592, 61, '2025-07-07 08:58:12', NULL, '152.57.146.36', 1),
(1593, 59, '2025-07-07 08:58:25', '2025-07-07 18:15:20', '49.43.201.0', 1),
(1594, 65, '2025-07-07 09:12:36', NULL, '49.43.201.0', 1),
(1595, 60, '2025-07-07 09:38:03', '2025-07-07 18:13:48', '157.50.93.235', 1),
(1596, 61, '2025-07-08 08:41:43', '2025-07-08 18:02:04', '152.57.167.82', 1),
(1597, 60, '2025-07-08 08:58:38', '2025-07-08 18:10:31', '157.50.90.155', 1),
(1598, 65, '2025-07-08 09:15:21', '2025-07-08 18:02:05', '223.185.98.136', 1),
(1599, 59, '2025-07-08 09:18:27', '2025-07-08 18:05:14', '49.43.200.133', 1),
(1600, 62, '2025-07-08 18:05:41', '2025-07-08 18:05:51', '223.187.16.91', 1),
(1601, 61, '2025-07-09 08:52:48', '2025-07-09 18:25:17', '152.57.234.184', 1),
(1602, 67, '2025-07-09 08:53:24', NULL, '49.43.200.133', 1),
(1603, 60, '2025-07-09 09:07:18', '2025-07-09 18:25:31', '157.50.91.194', 1),
(1604, 65, '2025-07-09 09:14:39', '2025-07-09 18:10:01', '49.43.200.133', 1),
(1605, 59, '2025-07-09 09:20:20', NULL, '49.43.200.133', 1),
(1606, 62, '2025-07-09 09:43:19', '2025-07-09 18:12:17', '49.43.200.133', 1),
(1607, 61, '2025-07-10 08:55:50', NULL, '152.57.234.47', 1),
(1608, 67, '2025-07-10 08:57:26', NULL, '49.43.200.136', 1),
(1609, 60, '2025-07-10 09:04:33', '2025-07-10 18:30:00', '157.50.92.142', 1),
(1610, 65, '2025-07-10 09:10:41', '2025-07-10 18:59:54', '49.43.200.136', 1),
(1611, 59, '2025-07-10 09:17:47', '2025-07-10 18:49:07', '49.43.200.136', 1),
(1612, 62, '2025-07-10 18:59:38', '2025-07-10 18:59:41', '49.43.200.136', 1),
(1613, 61, '2025-07-11 08:54:21', '2025-07-11 18:20:58', '49.43.200.76', 1),
(1614, 67, '2025-07-11 08:56:15', NULL, '49.43.200.76', 1),
(1615, 60, '2025-07-11 09:05:40', '2025-07-11 18:40:46', '157.50.97.128', 1),
(1616, 69, '2025-07-11 09:06:24', '2025-07-11 18:18:13', '49.43.200.76', 1),
(1617, 65, '2025-07-11 09:07:17', '2025-07-11 18:23:06', '49.43.200.76', 1),
(1618, 62, '2025-07-11 09:07:55', NULL, '49.43.200.76', 1),
(1619, 59, '2025-07-11 09:14:43', '2025-07-11 18:17:55', '49.43.200.76', 1),
(1620, 67, '2025-07-12 08:54:48', NULL, '49.43.202.175', 1),
(1621, 60, '2025-07-12 09:04:45', '2025-07-12 18:39:25', '157.50.90.69', 1),
(1622, 65, '2025-07-12 09:07:19', '2025-07-12 18:20:54', '49.43.202.175', 1),
(1623, 69, '2025-07-12 09:07:38', '2025-07-12 18:38:56', '117.99.199.196', 1),
(1624, 62, '2025-07-12 09:07:45', '2025-07-12 18:28:36', '49.43.202.175', 1),
(1625, 59, '2025-07-12 09:15:31', '2025-07-12 18:24:32', '49.43.202.175', 1),
(1626, 61, '2025-07-12 09:15:54', NULL, '49.43.202.175', 1),
(1627, 61, '2025-07-13 10:04:52', '2025-07-13 16:12:53', '49.43.203.154', 1),
(1628, 67, '2025-07-13 12:01:41', '2025-07-13 16:13:07', '106.216.199.32', 1),
(1629, 65, '2025-07-13 12:01:45', '2025-07-13 16:13:06', '49.43.203.154', 1),
(1630, 62, '2025-07-13 12:13:16', '2025-07-13 16:13:38', '49.43.203.154', 1),
(1631, 60, '2025-07-13 16:13:49', '2025-07-13 16:13:52', '157.50.93.153', 1),
(1632, 61, '2025-07-14 08:44:50', '2025-07-14 23:44:49', '223.187.75.70', 1),
(1633, 67, '2025-07-14 08:49:43', NULL, '223.228.123.109', 1),
(1634, 59, '2025-07-14 08:54:00', NULL, '49.43.202.52', 1),
(1635, 69, '2025-07-14 09:04:03', NULL, '27.59.53.225', 1),
(1636, 62, '2025-07-14 09:04:52', NULL, '49.43.202.52', 1),
(1637, 60, '2025-07-14 09:08:27', NULL, '157.50.91.132', 1),
(1638, 65, '2025-07-14 09:19:01', NULL, '49.43.202.52', 1),
(1639, 1, '2025-07-14 18:01:38', NULL, '49.43.202.52', 1),
(1640, 1, '2025-07-14 18:01:40', NULL, '49.43.202.52', 1),
(1641, 1, '2025-07-14 18:01:42', NULL, '49.43.202.52', 1),
(1642, 1, '2025-07-14 18:01:52', NULL, '49.43.202.52', 1),
(1643, 1, '2025-07-14 18:02:19', NULL, '49.43.202.52', 1),
(1644, 1, '2025-07-14 18:02:25', NULL, '49.43.202.52', 1),
(1645, 61, '2025-07-14 18:03:55', '2025-07-14 23:44:55', '49.43.202.52', 1),
(1646, 1, '2025-07-14 18:04:25', NULL, '49.43.202.52', 1),
(1647, 67, '2025-07-14 18:04:46', NULL, '49.43.202.52', 1),
(1648, 67, '2025-07-14 18:05:02', NULL, '49.43.202.52', 1),
(1649, 67, '2025-07-14 18:05:05', NULL, '49.43.202.52', 1),
(1650, 67, '2025-07-14 18:05:07', NULL, '49.43.202.52', 1),
(1651, 67, '2025-07-14 18:05:12', NULL, '49.43.202.52', 1),
(1652, 67, '2025-07-14 18:05:25', NULL, '223.228.114.25', 1),
(1653, 67, '2025-07-14 18:05:28', NULL, '223.228.114.25', 1),
(1654, 67, '2025-07-14 18:05:30', NULL, '223.228.114.25', 1),
(1655, 67, '2025-07-14 18:05:33', NULL, '223.228.114.25', 1),
(1656, 62, '2025-07-14 18:05:51', NULL, '49.43.202.52', 1),
(1657, 1, '2025-07-14 18:07:26', NULL, '49.43.202.52', 1),
(1658, 65, '2025-07-14 18:08:20', NULL, '49.43.202.52', 1),
(1659, 65, '2025-07-14 18:08:24', NULL, '49.43.202.52', 1),
(1660, 65, '2025-07-14 18:08:26', NULL, '49.43.202.52', 1),
(1661, 65, '2025-07-14 18:08:30', NULL, '49.43.202.52', 1),
(1662, 65, '2025-07-14 18:08:38', NULL, '49.43.202.52', 1),
(1663, 65, '2025-07-14 18:09:04', '2025-07-14 18:09:56', '49.43.202.52', 1),
(1664, 1, '2025-07-14 18:09:12', NULL, '49.43.202.52', 1),
(1665, 65, '2025-07-14 18:09:59', '2025-07-14 18:10:03', '49.43.202.52', 1),
(1666, 61, '2025-07-14 18:12:18', NULL, '49.43.202.52', 1),
(1667, 60, '2025-07-14 18:12:53', NULL, '157.50.91.51', 1),
(1668, 1, '2025-07-14 19:27:45', NULL, '49.37.134.2', 1),
(1669, 1, '2025-07-14 19:43:29', NULL, '49.37.134.2', 1),
(1670, 59, '2025-07-14 21:32:31', NULL, '117.99.203.235', 1),
(1671, 61, '2025-07-15 09:07:55', '2025-07-15 19:13:32', '49.43.203.138', 1),
(1672, 59, '2025-07-15 09:08:59', NULL, '49.43.203.138', 1),
(1673, 60, '2025-07-15 09:11:16', '2025-07-15 18:15:30', '157.50.99.113', 1),
(1674, 62, '2025-07-15 09:13:30', '2025-07-15 18:10:56', '49.43.203.138', 1),
(1675, 67, '2025-07-15 09:13:50', NULL, '223.228.125.136', 1),
(1676, 65, '2025-07-15 09:14:00', '2025-07-15 18:11:50', '49.43.203.138', 1),
(1677, 67, '2025-07-16 08:52:52', '2025-07-16 18:03:20', '49.43.202.215', 1),
(1678, 61, '2025-07-16 09:00:09', '2025-07-16 18:04:11', '117.99.197.122', 1),
(1679, 62, '2025-07-16 09:08:33', '2025-07-16 18:04:06', '49.43.202.215', 1),
(1680, 60, '2025-07-16 09:12:10', '2025-07-16 18:10:19', '157.50.90.245', 1),
(1681, 59, '2025-07-16 09:13:31', '2025-07-16 18:05:47', '49.43.202.215', 1),
(1682, 65, '2025-07-16 09:15:29', '2025-07-16 18:02:48', '49.43.202.215', 1),
(1683, 67, '2025-07-17 08:56:10', NULL, '223.228.109.94', 1),
(1684, 61, '2025-07-17 09:01:59', NULL, '117.99.197.20', 1),
(1685, 65, '2025-07-17 09:05:04', NULL, '49.43.202.249', 1),
(1686, 62, '2025-07-17 09:08:06', NULL, '49.43.202.249', 1),
(1687, 60, '2025-07-17 09:10:20', NULL, '157.50.99.44', 1),
(1688, 59, '2025-07-17 09:12:12', NULL, '49.43.202.249', 1);

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `login_tbl`
--

INSERT INTO `login_tbl` (`id`, `username`, `password`, `usertype`, `status`) VALUES
(1, 'bhavicreations', '34e59e638501f09468e1e9364c34f95f', 1, 1),
(46, 'kusuhema76@gmail.com', 'de5d17c0559a9c119b3ebbe6a4a19fa8', 2, 1),
(47, 'dharmadanandini@gmail.com', '3c366d9536e81ec3bb12ab2151e65f1f', 2, 1),
(51, 'ramyakeerthi329@gmail.com', 'd27be0b38551e0096c6544a250da28db', 2, 1),
(53, 'rajkumar16371@gmail.com', '8fffa09391a77d0481a69128077cd173', 2, 1),
(55, 'kandukuridevakumari@gmail.com', '15dade6601f8b03619b83131d6058f93', 2, 1),
(58, 'thota.lohitha1999@gmail.com', 'd37d398fa9ed89bed0c3b8888ce7df86', 2, 1),
(59, 'venktareddy2998@gmail.com', 'a8c242e13b0426d86d2d4c2280ac2e1c', 2, 1),
(60, 'manimalladi05@gmail.com', 'c11c12d70d3ee2215a19671d5472052a', 2, 1),
(61, 'rameshpilli1428@gmail.com', 'a1d434fd73195508cb7cba8740022653', 2, 1),
(62, 'satishkumar8179233470@gmail.com', 'f07d7a94d5c3be034c78d653bdffd48a', 2, 1),
(63, 'satyasaimahi@gmail.com', 'ee83c52a2a147cd87db08a39ef7d0732', 2, 1),
(64, 'Pydiabhi1313@gmail.com', '84533124becf261c7f77a2792287c08f', 2, 1),
(65, 'gowridevireddy001@gmail.com', '1f6e3ad711ef952e3d389dd2eef73eda', 2, 1),
(66, '100nayasam98@gmail.com', 'bb4bcb26395dadf2022e9757361594c5', 2, 1),
(67, 'srivinayanandipati25@gmail.com', '91e37785bb989033f0c7b0d6f3bdd2c7', 2, 1),
(68, 'durgadevi13813@gmail.com', '22196ddb66c51bdbb1a7d86392b26915', 2, 1),
(69, 'villuriprasanthi2004@gmail.com', 'c139b5aedb18401c441a9bb8471fd2d6', 2, 1),
(70, 'veduruvadauday@gmail.com ', '7da7191cd7f4192b3a938236eff616a6', 2, 1),
(71, 'ravitejamudadha0000@gmail.com ', 'cbf675c099494efc86ecd8be208be60e', 2, 1),
(72, 'kvvsuryanarayana3@gmail.com', '7f8a1e3e9193416c18243b0e27940101', 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `permissions_tbl`
--

CREATE TABLE `permissions_tbl` (
  `permission_id` int(11) NOT NULL,
  `staff_id` int(11) NOT NULL,
  `module` varchar(255) NOT NULL,
  `permission` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `permissions_tbl`
--

INSERT INTO `permissions_tbl` (`permission_id`, `staff_id`, `module`, `permission`) VALUES
(2, 17, 'marketing', 'edit_access'),
(3, 11, 'marketing', 'edit_access'),
(4, 66, 'marketing', 'edit_access');

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `project_tasks_tbl`
--

CREATE TABLE `project_tasks_tbl` (
  `id` int(11) NOT NULL,
  `project_id` int(11) NOT NULL,
  `assigned_to` varchar(255) NOT NULL,
  `department` int(11) NOT NULL,
  `task_name` varchar(255) NOT NULL,
  `task_details` longtext NOT NULL,
  `task_daily` int(11) NOT NULL,
  `task_priority` varchar(255) NOT NULL,
  `task_status` varchar(255) NOT NULL,
  `due_date` date NOT NULL,
  `completed_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `quote`
--

CREATE TABLE `quote` (
  `id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `project_duration` varchar(255) NOT NULL,
  `digital_services` longtext NOT NULL,
  `images` varchar(255) NOT NULL,
  `description` longtext NOT NULL,
  `SEO` longtext NOT NULL,
  `links` longtext NOT NULL,
  `payment_installments` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `quote`
--

INSERT INTO `quote` (`id`, `client_id`, `project_duration`, `digital_services`, `images`, `description`, `SEO`, `links`, `payment_installments`) VALUES
(3, 7, '', '', 'not-selected', '', '', '', 0),
(7, 7, '', '', 'not-selected', '', '', '', 0),
(8, 8, '11-02-2025  to 11-02-2026', '', 'yearly', '', '', '', 0),
(9, 9, '10-03-2025 to 10-03-2026', '', 'not-selected', '', '', '', 0),
(10, 10, '', '', 'not-selected', '', '', '', 0),
(11, 11, '', '', 'not-selected', '', '', '', 0),
(12, 12, '', '', 'not-selected', '', '', '', 0),
(13, 13, '', '', 'not-selected', '', '', '', 0),
(14, 14, '', '', 'not-selected', '', '', '', 0),
(15, 15, '', '', 'not-selected', '', '', '', 0),
(16, 16, '', '', 'not-selected', '', '', '', 0),
(17, 17, '', '', 'not-selected', '', '', '', 0),
(18, 18, '', '', 'not-selected', '', '', '', 0),
(19, 19, '', '', 'not-selected', '', '', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `salary_tbl`
--

CREATE TABLE `salary_tbl` (
  `id` int(11) NOT NULL,
  `staff_id` int(11) NOT NULL,
  `basic_salary` bigint(20) NOT NULL,
  `month` int(2) NOT NULL,
  `year` int(4) NOT NULL,
  `allowance` bigint(20) NOT NULL,
  `gross_salary` decimal(10,2) DEFAULT 0.00,
  `working_days` int(11) NOT NULL,
  `worked_days` int(11) NOT NULL,
  `actual_login_days` int(11) DEFAULT 0,
  `added_working_days` int(11) DEFAULT 0,
  `payslip` varchar(255) DEFAULT NULL,
  `no_of_leaves` int(11) NOT NULL,
  `salary_per_day` double NOT NULL,
  `total` bigint(20) NOT NULL,
  `pf_deduction` decimal(10,2) DEFAULT 0.00,
  `esi_deduction` decimal(10,2) DEFAULT 0.00,
  `professional_tax_deduction` decimal(10,2) DEFAULT 0.00,
  `tds_deduction` decimal(10,2) DEFAULT 0.00,
  `other_deductions` decimal(10,2) DEFAULT 0.00,
  `net_payable_salary` decimal(10,2) DEFAULT 0.00,
  `payslip_pdf_path` varchar(255) DEFAULT NULL,
  `added_by` int(11) NOT NULL,
  `updated_on` date NOT NULL,
  `added_on` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `salary_tbl`
--

INSERT INTO `salary_tbl` (`id`, `staff_id`, `basic_salary`, `month`, `year`, `allowance`, `gross_salary`, `working_days`, `worked_days`, `actual_login_days`, `added_working_days`, `payslip`, `no_of_leaves`, `salary_per_day`, `total`, `pf_deduction`, `esi_deduction`, `professional_tax_deduction`, `tds_deduction`, `other_deductions`, `net_payable_salary`, `payslip_pdf_path`, `added_by`, `updated_on`, `added_on`) VALUES
(1, 62, 17000, 0, 0, 0, 0.00, 0, 0, 0, 0, NULL, 0, 0, 0, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, NULL, 1, '2025-05-27', '2025-05-28 04:42:54'),
(4, 59, 12000, 0, 0, 0, 0.00, 0, 0, 0, 0, NULL, 0, 0, 0, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, NULL, 1, '2025-05-27', '2025-05-28 04:42:26'),
(5, 60, 8000, 0, 0, 0, 0.00, 0, 0, 0, 0, NULL, 0, 0, 0, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, NULL, 1, '2025-05-27', '2025-05-27 09:08:11'),
(6, 61, 15000, 0, 0, 0, 0.00, 0, 0, 0, 0, NULL, 0, 0, 0, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, NULL, 1, '2025-05-27', '2025-05-27 10:09:04'),
(8, 63, 5000, 0, 0, 0, 0.00, 0, 0, 0, 0, NULL, 0, 0, 0, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, NULL, 0, '0000-00-00', '2025-05-28 04:43:12'),
(9, 84, 30000, 0, 0, 0, 0.00, 0, 0, 0, 0, NULL, 0, 0, 0, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, NULL, 0, '0000-00-00', '2025-05-27 10:21:15'),
(10, 83, 50000, 0, 0, 0, 0.00, 0, 0, 0, 0, NULL, 0, 0, 0, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, NULL, 0, '0000-00-00', '2025-05-27 10:45:20'),
(11, 64, 6500, 0, 0, 0, 0.00, 0, 0, 0, 0, NULL, 0, 0, 0, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, NULL, 0, '0000-00-00', '2025-05-28 04:43:25'),
(12, 65, 12000, 0, 0, 0, 0.00, 0, 0, 0, 0, NULL, 0, 0, 0, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, NULL, 0, '0000-00-00', '2025-05-28 04:44:25'),
(13, 66, 15000, 0, 0, 0, 0.00, 0, 0, 0, 0, NULL, 0, 0, 0, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, NULL, 0, '0000-00-00', '2025-07-13 06:51:56'),
(14, 67, 13000, 0, 0, 0, 0.00, 0, 0, 0, 0, NULL, 0, 0, 0, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, NULL, 0, '0000-00-00', '2025-05-28 04:45:30'),
(15, 69, 9000, 0, 0, 0, 0.00, 0, 0, 0, 0, NULL, 0, 0, 0, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, NULL, 0, '0000-00-00', '2025-07-10 12:17:53'),
(16, 70, 10000, 0, 0, 0, 0.00, 0, 0, 0, 0, NULL, 0, 0, 0, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, NULL, 0, '0000-00-00', '2025-07-14 04:15:27'),
(17, 71, 25000, 0, 0, 0, 0.00, 0, 0, 0, 0, NULL, 0, 0, 0, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, NULL, 0, '0000-00-00', '2025-07-14 04:56:56'),
(18, 72, 20000, 0, 0, 0, 0.00, 0, 0, 0, 0, NULL, 0, 0, 0, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, NULL, 0, '0000-00-00', '2025-07-14 05:03:52');

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
  `designation` varchar(255) DEFAULT NULL,
  `bank_name` varchar(255) DEFAULT NULL,
  `bank_account_no` varchar(255) DEFAULT NULL,
  `ifsc_code` varchar(255) DEFAULT NULL,
  `pan_adhar_no` varchar(255) DEFAULT NULL,
  `pic` varchar(150) NOT NULL DEFAULT 'default-pic.jpg',
  `files` longtext NOT NULL,
  `added_by` int(11) NOT NULL,
  `updated_on` date NOT NULL,
  `added_on` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `salary` int(20) DEFAULT 0,
  `branch` varchar(250) NOT NULL,
  `certificate` varchar(255) DEFAULT NULL,
  `hike` int(255) DEFAULT 0,
  `bond` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `staff_tbl`
--

INSERT INTO `staff_tbl` (`id`, `staff_name`, `gender`, `email`, `mobile`, `dob`, `doj`, `employee_id`, `blood_group`, `address`, `city`, `state`, `country`, `department_id`, `designation`, `bank_name`, `bank_account_no`, `ifsc_code`, `pan_adhar_no`, `pic`, `files`, `added_by`, `updated_on`, `added_on`, `salary`, `branch`, `certificate`, `hike`, `bond`, `description`) VALUES
(1, 'Bhavi Creations', 'Male', 'bhavicreations2022@gmail.com', 9642343434, '2022-04-15', '2022-04-15', 'BCKKD000', '', 'kakinada', 'kakinada', 'Andhra Pradesh', 'India', 0, NULL, NULL, NULL, NULL, NULL, 'bhavi.JPG', '', 0, '0000-00-00', '2025-05-27 06:56:27', 0, '', '', 0, '', ''),
(46, 'Kusu Hema sri', 'Female', 'kusuhema76@gmail.com', 8341350693, '2002-12-22', '2023-11-09', 'BCPLKKD009', 'o+', '4-45  ,meraka Veedhi  Kesavaram ', 'Kesavaram', 'Andhra pradesh', 'India', 16, NULL, NULL, NULL, NULL, NULL, 'hema.JPG', '', 1, '0000-00-00', '2025-05-27 06:56:27', 0, '', '', 0, '', ''),
(47, 'Dharmada Yuva Nandini', 'Female', 'dharmadanandini@gmail.com', 9581198995, '2001-08-27', '2023-11-09', 'BCPLKKD0010', 'o+', '24-8-151/6A, venkateswara colony, old bus stand, kakinada', 'Kakinada', 'Andhra pradesh', 'India', 16, NULL, NULL, NULL, NULL, NULL, 'nandini_(2).jpeg', '', 1, '0000-00-00', '2025-05-27 06:56:27', 0, '', '', 0, '', ''),
(51, 'Keerthi Ramya', 'Female', 'ramyakeerthi329@gmail.com', 7093253905, '2001-04-10', '2023-11-24', 'BCPLKKD0014', 'B+', 'D no:3-32,Gandham vari veedhi,chandrampalem,samarlakota mandal,E.G.Dist.-533450', 'Chandrampalem', 'Andhra pradesh', 'India', 14, NULL, NULL, NULL, NULL, NULL, 'ramya.jpeg', '', 1, '0000-00-00', '2025-05-27 06:56:27', 0, '', '', 0, '', ''),
(53, 'Giduthuri Rajkumar', 'Male', 'rajkumar16371@gmail.com', 7981885538, '2001-05-11', '2023-12-11', 'BCPLKKD0016', 'A+', '5-155, YSr Colony, Madhavapatnam, Samlkota mandal., Kakinada District,AP 533005', 'Kakinada', 'Andhra pradesh', 'India', 16, NULL, NULL, NULL, NULL, NULL, 'raj.JPG', '', 1, '0000-00-00', '2025-05-27 06:56:27', 0, '', '', 0, '', ''),
(55, 'Kandukuri Deva Kumari', 'Female', 'kandukuridevakumari@gmail.com', 7287850487, '2003-06-01', '2024-01-01', 'BCPLKKD0018', 'o+', '4-102,Salipeta,kovvuru mandal,ramalayam street,vadapalli,East godavari Dist,AP-534350', 'Vadapalli', 'Andhra pradesh', 'India', 16, NULL, NULL, NULL, NULL, NULL, 'devakumari1.jpg', '', 1, '0000-00-00', '2025-05-27 06:56:27', 0, '', '', 0, '', ''),
(58, 'THOTA LOHITHA', 'Female', 'thota.lohitha1999@gmail.com', 7989106027, '1999-07-08', '2024-02-28', 'BCPLRJY0020', 'AB+', 'D no : 62-4-23/31,Ramarao pet,Jagannaickpur,Kakinada.', 'RAJAHMUNDRY', 'Andhra Pradesh', 'India', 14, NULL, NULL, NULL, NULL, NULL, 'default-pic.jpg', '', 1, '0000-00-00', '2025-05-27 06:56:27', 0, '', '', 0, '', ''),
(59, 'Padala Venkata Reddy', 'Male', 'venktareddy2998@gmail.com', 9133689619, '1998-09-02', '2024-03-01', 'BCPLKKD0004', 'b(+ve) ', 'D.No- 8-112, behind panchayathi office, kuthukuluru 533264', 'Kuthukuluru ', 'Andhra Pradesh ', 'India', 23, NULL, NULL, NULL, NULL, NULL, 'reddy_seo.png', '', 0, '0000-00-00', '2025-07-13 06:53:10', 12000, '', '', 0, '', ''),
(60, 'Malladi Mohan Mani Kumar ', 'Male', 'manimalladi05@gmail.com', 6281802727, '2002-01-10', '2024-11-06', 'BCPLKKD0007', 'b(+ve) ', 'D.NO: 62-22-10, Lakshmi Nagar, Jagannadhapuram ,kakinada 533002', 'kakinada ', 'Andhra Pradesh', 'India', 24, NULL, NULL, NULL, NULL, NULL, 'manikanta_developer.png', '', 0, '0000-00-00', '2025-07-13 06:52:23', 8000, '', '', 0, '', ''),
(61, 'Pilli Ramesh', 'Male', 'rameshpilli1428@gmail.com', 9705605208, '2000-08-14', '2023-11-24', 'BCPLKKD0003', 'O (+ve)', 'D.NO : 1-313/3, Rajeev Nagar 5, Rayudupalem Kakinada 533005', 'Kakinada', 'Andhra Pradesh', 'India', 24, NULL, NULL, NULL, NULL, NULL, 'ramesh.jpg', '', 0, '0000-00-00', '2025-07-13 07:19:50', 15000, '', '', 0, '', ''),
(62, 'Kathirisetty Sathish ', 'Male', 'satishkumar8179233470@gmail.com', 8179233470, '2002-04-14', '2024-07-05', 'BCPLKKD0005', 'O (+ve)', 'D.NO- 10-28 Gollapeta, Jagampeta Mandalam , katravulapalli 533437', 'Katravulapalli , Jaggampeta mandal kakinada ', 'Andhra Pradesh', 'India', 22, NULL, NULL, NULL, NULL, NULL, 'sathish_designer.png', '', 0, '0000-00-00', '2025-07-13 06:46:16', 17000, '', '', 0, '', ''),
(63, 'Bandaru Satya Sai', 'Male', 'satyasaimahi@gmail.com', 7032799163, '2002-08-02', '2024-11-01', 'BCPLKKD0008', 'O (+ve)', 'D.NO - 2-67 , Madhura Nagar, kakinada 533004', 'Kakinada', 'Andhra Pradesh', 'India', 22, NULL, NULL, NULL, NULL, NULL, 'SATYA.jpg', '', 0, '0000-00-00', '2025-07-13 06:47:38', 5000, '', '', 0, '', ''),
(64, 'Paidinaga Abhiram ', 'Male', 'Pydiabhi1313@gmail.com', 9381994017, '2003-10-13', '2024-11-13', 'BCPLKKD0009', 'A (+ve)', 'D.NO- 41-3-38, biyyapu kotla bazaar, Krishna lanka, vijayawada ,520013', 'Vijayawada', 'Andhra Pradesh', 'India', 22, NULL, NULL, NULL, NULL, NULL, 'abhi_ram_designer.png', '', 0, '0000-00-00', '2025-07-13 06:44:06', 6500, '', '', 0, '', ''),
(65, 'Reddy Gowri Devi', 'Female', 'gowridevireddy001@gmail.com', 7416735875, '2002-05-01', '2024-07-05', 'BCPLKKD0006', 'O (+ve)', 'D.NO- 1-1-70/1 , Ram Sai Street , Near Bhanugudi Junction kakinada 533003', 'Kakinada', 'Andhra Pradesh', 'India', 21, NULL, NULL, NULL, NULL, NULL, 'devi.png', '', 0, '0000-00-00', '2025-07-13 06:43:18', 12000, '', '', 0, '', ''),
(66, 'Yasam Vineela Naga Sai ', 'Female', '100nayasam98@gmail.com', 9652591298, '1998-12-09', '2025-02-01', 'BCPLKKD0001', 'O (-ve)', 'Plot no 28, H No 70, 17-28, Road, Opposite to New RTO Office,, Behind J.N.T.U.Engineering College Play Ground, Ranga Rao Nagar,', 'Kakinada', 'Andhra Pradesh', 'India', 20, NULL, NULL, NULL, NULL, NULL, 'WhatsApp_Image_2025-07-13_at_12_19_19_PM.jpeg', '', 0, '0000-00-00', '2025-07-13 06:51:56', 15000, '', '', 0, '', ''),
(67, 'Sri Vinaya Nandipati ', 'Female', 'srivinayanandipati25@gmail.com', 9515953841, '2003-01-25', '2025-03-24', 'BCPLKKD00010', 'O (+ve)', '1-14/1 Near post office Panduru , kakinada Rural 533005', 'Kakinada', 'Andhra Pradesh', 'India', 22, NULL, NULL, NULL, NULL, NULL, 'vinaya.png', '', 0, '0000-00-00', '2025-07-13 06:41:47', 13000, '', '', 0, '', ''),
(69, 'Villuri Prasanthi', 'Female', 'villuriprasanthi2004@gmail.com', 9959852681, '2004-03-09', '2004-03-09', 'BCPLKKD0011', 'b(+ve) ', '38 - 4 - 13 Vigneswara Apartments Tilak Street kakinada 533001', 'Kakinada', 'Andhra Pradesh', 'India', 27, NULL, NULL, NULL, NULL, NULL, 'prasanthi1.jpg', '', 0, '0000-00-00', '2025-07-13 06:50:26', 9000, '', NULL, 0, NULL, NULL),
(70, 'Veduruvada Uday', 'Male', 'veduruvadauday@gmail.com ', 8712965092, '1995-09-15', '2022-03-01', 'BCPLKKD0012', 'b(+ve) ', 'Plot 78, road no 4, Bhoomi reddy colony, Quthbullapur, Hyderabad 500055', 'Hyderabad', 'Telangana', 'India', 24, NULL, NULL, NULL, NULL, NULL, 'profile.png', '', 1, '0000-00-00', '2025-07-14 04:15:27', 10000, '', NULL, 0, NULL, NULL),
(71, 'Raviteja mudadha', 'Male', 'ravitejamudadha0000@gmail.com ', 8106900876, '1998-03-24', '2025-07-10', 'BCPLKKD0013', 'O (+ve)', '27-9-32 Dhigumarthi vari Street, temple street  sri vikhasa junior college 533001\r\n', 'Kakinada', 'Andhra Pradesh', 'India', 28, NULL, NULL, NULL, NULL, NULL, 'CamScanner_09-21-2020_14_15_22_61_page-0001.jpg', '', 1, '0000-00-00', '2025-07-14 04:56:56', 25000, '', NULL, 0, NULL, NULL),
(72, 'Kokkirimetla.Veeravenkatasuryanarayana', 'Male', 'kvvsuryanarayana3@gmail.com', 9573636186, '1993-03-09', '2025-07-11', 'BCPLKKD0014', 'O (+ve)', 's/o Sathiraju Dno.24-5-38/1Kammavarisavaram Ramachandrapuram 533255', 'Ramachandrapuram ', 'Andhra Pradesh', 'India', 28, NULL, NULL, NULL, NULL, NULL, 'surya_narayana.jpg', '', 1, '0000-00-00', '2025-07-14 05:03:52', 20000, '', NULL, 0, NULL, NULL);

--
-- Triggers `staff_tbl`
--
DELIMITER $$
CREATE TRIGGER `after_staff_insert` AFTER INSERT ON `staff_tbl` FOR EACH ROW BEGIN
    INSERT INTO salary_tbl (staff_id, basic_salary)
    VALUES (NEW.id, NEW.salary);
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `after_staff_update` AFTER UPDATE ON `staff_tbl` FOR EACH ROW BEGIN
    IF NEW.salary <> OLD.salary THEN
        UPDATE salary_tbl
        SET basic_salary = NEW.salary
        WHERE staff_id = NEW.id;
    END IF;
END
$$
DELIMITER ;

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `suppliers_tbl`
--

INSERT INTO `suppliers_tbl` (`id`, `supplier_name`, `address`, `contact_name`, `contact_phone`, `notes`) VALUES
(4, 'ABC Dealers', 'vijaywada', 'uday', '7326372632', 'assdvgfh'),
(5, 'ABC General Supplier	', 'kakinada', 'uday', '87123324251', 'general dealer'),
(7, 'SURYA', 'ADDRESS', 'SURYA', '383948393', 'GADAGDGDAS '),
(8, 'SURYA', 'ADDRESS', 'SURYA', '383948393', 'GADAGDGDAS ');

-- --------------------------------------------------------

--
-- Table structure for table `worksheet_tbl`
--

CREATE TABLE `worksheet_tbl` (
  `id` int(11) NOT NULL,
  `project_task_id` int(11) NOT NULL,
  `department` int(11) NOT NULL,
  `staff_id` int(11) NOT NULL,
  `client_name` varchar(255) DEFAULT NULL,
  `assign_date` date DEFAULT NULL,
  `work_type_designer` varchar(255) DEFAULT NULL,
  `work_type_socialmedia` varchar(255) DEFAULT NULL,
  `website_type` varchar(255) DEFAULT NULL,
  `desc_designer` longtext DEFAULT NULL,
  `desc_socialmedia` longtext DEFAULT NULL,
  `desc_website` longtext DEFAULT NULL,
  `desc_SEO` longtext DEFAULT NULL,
  `ref_link_designer` longtext DEFAULT NULL,
  `content_designer` longtext DEFAULT NULL,
  `ref_file_designer` varchar(255) DEFAULT NULL,
  `p_kw_SEO` longtext DEFAULT NULL,
  `target_kw_SEO` longtext DEFAULT NULL,
  `gmb_SEO` longtext DEFAULT NULL,
  `delivery_date` date DEFAULT NULL,
  `fb_ads_socialmedia` longtext DEFAULT NULL,
  `g_ads_socialmedia` longtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `work_reports_tbl`
--

INSERT INTO `work_reports_tbl` (`id`, `project_id`, `task_id`, `staff_id`, `work_details`, `work_status`, `on_date`, `added_by`) VALUES
(4, '26', '139', 61, 'service pages and index page complete total changes ', 'Completed', '2025-03-13', 0),
(5, '26', '139', 61, 'apple dental domine transfers to aws and files uploaded in live completed\r\n\r\ncoupen website : jobs pages completed \r\n\r\nsrinivasa aligments changes ', 'Completed', '2025-03-14', 0),
(6, '26', '139', 61, 'Coupons website, slow work progress due to Internet issues from wfh', 'Pending', '2025-03-17', 0),
(7, '26', '139', 61, 'Events page completed in coupons website ', 'In Progress', '2025-03-18', 0),
(8, '26', '139', 61, 'Work progress delay due to network issue', 'In Progress', '2025-03-19', 0),
(9, '26', '139', 61, 'Kkd hub website travel page and website changes done ', 'In Progress', '2025-03-20', 0),
(10, '26', '139', 61, 'kkd hub backend services added ', 'In Progress', '2025-03-21', 0),
(11, '26', '139', 61, 'kkd hub, admin panel properties added function completed,\r\nneed  to show them in ui pages', 'In Progress', '2025-03-22', 0),
(12, '26', '139', 61, 'kkd hub, backend panel  view and filter function added in admin panel ', 'In Progress', '2025-03-24', 0),
(13, '26', '139', 61, 'kkd hu properties modules completed ', 'In Progress', '2025-03-25', 0),
(14, '26', '139', 61, 'travels page functionalty cleared, need to display on frontend ', 'In Progress', '2025-03-26', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointments_tbl`
--
ALTER TABLE `appointments_tbl`
  ADD PRIMARY KEY (`appointment_id`);

--
-- Indexes for table `clients_tbl`
--
ALTER TABLE `clients_tbl`
  ADD PRIMARY KEY (`client_id`);

--
-- Indexes for table `client_advance_tbl`
--
ALTER TABLE `client_advance_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `company_assets_tbl`
--
ALTER TABLE `company_assets_tbl`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `installment_payments_tbl`
--
ALTER TABLE `installment_payments_tbl`
  ADD PRIMARY KEY (`id`),
  ADD KEY `client_advance_id` (`client_advance_id`);

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
-- Indexes for table `quote`
--
ALTER TABLE `quote`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `salary_tbl`
--
ALTER TABLE `salary_tbl`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_salary` (`staff_id`,`updated_on`);

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
-- Indexes for table `worksheet_tbl`
--
ALTER TABLE `worksheet_tbl`
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
-- AUTO_INCREMENT for table `clients_tbl`
--
ALTER TABLE `clients_tbl`
  MODIFY `client_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `client_advance_tbl`
--
ALTER TABLE `client_advance_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `company_assets_tbl`
--
ALTER TABLE `company_assets_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `country_tbl`
--
ALTER TABLE `country_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=247;

--
-- AUTO_INCREMENT for table `department_tbl`
--
ALTER TABLE `department_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `holidays_tbl`
--
ALTER TABLE `holidays_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `installment_payments_tbl`
--
ALTER TABLE `installment_payments_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `leave_tbl`
--
ALTER TABLE `leave_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `login_records_tbl`
--
ALTER TABLE `login_records_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1689;

--
-- AUTO_INCREMENT for table `login_tbl`
--
ALTER TABLE `login_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT for table `permissions_tbl`
--
ALTER TABLE `permissions_tbl`
  MODIFY `permission_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `products_tbl`
--
ALTER TABLE `products_tbl`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `projects_tbl`
--
ALTER TABLE `projects_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `project_tasks_tbl`
--
ALTER TABLE `project_tasks_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=163;

--
-- AUTO_INCREMENT for table `quote`
--
ALTER TABLE `quote`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `salary_tbl`
--
ALTER TABLE `salary_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `staff_tbl`
--
ALTER TABLE `staff_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;

--
-- AUTO_INCREMENT for table `suppliers_tbl`
--
ALTER TABLE `suppliers_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `worksheet_tbl`
--
ALTER TABLE `worksheet_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=142;

--
-- AUTO_INCREMENT for table `work_reports_tbl`
--
ALTER TABLE `work_reports_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
