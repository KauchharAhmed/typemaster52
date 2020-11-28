-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 04, 2019 at 10:45 AM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_typemaster`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(10) UNSIGNED NOT NULL,
  `step_id` int(11) DEFAULT NULL,
  `first_name` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `last_name` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(250) COLLATE utf8_unicode_ci NOT NULL COMMENT 'username',
  `mobile` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `gender` tinyint(4) NOT NULL COMMENT '1 = male 2 = female 3 = others',
  `type` tinyint(4) NOT NULL COMMENT '1 = Admin 2 = user',
  `password` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `birthdate` date NOT NULL,
  `birth_certificate_no` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `nid_no` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `old_loged_time` datetime NOT NULL,
  `new_loged_time` datetime NOT NULL,
  `recover_code` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `address` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL COMMENT '1=active 0=inactive 3=reject',
  `image` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` date NOT NULL,
  `modified_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `step_id`, `first_name`, `last_name`, `email`, `mobile`, `gender`, `type`, `password`, `birthdate`, `birth_certificate_no`, `nid_no`, `old_loged_time`, `new_loged_time`, `recover_code`, `address`, `status`, `image`, `created_at`, `modified_at`) VALUES
(1, NULL, 'Towfiqul', 'Islam', 'admin@gmail.com', '01723626707', 1, 1, '291944668a2843fab3b89f26f3f5a79c77de77d3', '1995-01-01', '123', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', '', 1, '', '2019-12-04', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_big_registration`
--

CREATE TABLE `tbl_big_registration` (
  `id` int(11) NOT NULL,
  `step_id` int(10) DEFAULT NULL,
  `student_name_bangla` varchar(250) DEFAULT NULL,
  `student_name_english` varchar(250) DEFAULT NULL,
  `student_birth_date` date DEFAULT NULL,
  `birth_registration_no` varchar(250) DEFAULT NULL,
  `birth_certificate_photo` varchar(250) DEFAULT NULL,
  `student_blood_group` varchar(250) DEFAULT NULL,
  `student_nid_number` varchar(250) DEFAULT NULL,
  `nationality` varchar(250) DEFAULT NULL,
  `student_email` varchar(250) DEFAULT NULL COMMENT 'username',
  `password` varchar(100) DEFAULT NULL,
  `type` tinyint(4) DEFAULT NULL COMMENT '1 = admin 2 = user',
  `gender` varchar(250) DEFAULT NULL,
  `religion` varchar(250) DEFAULT NULL,
  `student_mobile` varchar(250) DEFAULT NULL,
  `occupation` varchar(250) DEFAULT NULL,
  `student_photo` varchar(200) DEFAULT NULL,
  `st_exam_name_1` varchar(250) DEFAULT NULL,
  `st_department_1` varchar(250) DEFAULT NULL,
  `st_institute_1` varchar(250) DEFAULT NULL,
  `st_year_1` varchar(250) DEFAULT NULL,
  `st_board_1` varchar(250) DEFAULT NULL,
  `st_grad_1` varchar(250) DEFAULT NULL,
  `st_exam_name_2` varchar(250) DEFAULT NULL,
  `st_department_2` varchar(250) DEFAULT NULL,
  `st_institute_2` varchar(250) DEFAULT NULL,
  `st_year_2` varchar(250) DEFAULT NULL,
  `st_board_2` varchar(250) DEFAULT NULL,
  `st_grad_2` varchar(250) DEFAULT NULL,
  `father_name_english` varchar(250) DEFAULT NULL,
  `father_name_bangla` varchar(250) DEFAULT NULL,
  `father_birth_date` date DEFAULT NULL,
  `father_blood_group` varchar(250) DEFAULT NULL,
  `father_nid_number` varchar(250) DEFAULT NULL,
  `father_nid_scan_photo` varchar(250) DEFAULT NULL,
  `father_nationality` varchar(250) DEFAULT NULL,
  `father_email` varchar(250) DEFAULT NULL,
  `father_religion` varchar(250) DEFAULT NULL,
  `father_mobile` varchar(250) DEFAULT NULL,
  `father_occupation` varchar(250) DEFAULT NULL,
  `father_image` varchar(250) DEFAULT NULL,
  `fa_exam_name_1` varchar(250) DEFAULT NULL,
  `fa_department_1` varchar(250) DEFAULT NULL,
  `fa_institute_1` varchar(250) DEFAULT NULL,
  `fa_year_1` varchar(250) DEFAULT NULL,
  `fa_board_1` varchar(250) DEFAULT NULL,
  `fa_grad_1` varchar(250) DEFAULT NULL,
  `fa_exam_name_2` varchar(250) DEFAULT NULL,
  `fa_department_2` varchar(250) DEFAULT NULL,
  `fa_institute_2` varchar(250) DEFAULT NULL,
  `fa_year_2` varchar(250) DEFAULT NULL,
  `fa_board_2` varchar(250) DEFAULT NULL,
  `fa_grad_2` varchar(250) DEFAULT NULL,
  `mother_name_english` varchar(250) DEFAULT NULL,
  `mother_name_bangla` varchar(250) DEFAULT NULL,
  `mother_birth_date` date DEFAULT NULL,
  `mother_blood_group` varchar(100) DEFAULT NULL,
  `mother_nid_number` varchar(250) DEFAULT NULL,
  `mother_nid_scan_photo` varchar(250) DEFAULT NULL,
  `mother_nationality` varchar(250) DEFAULT NULL,
  `mother_email` varchar(250) DEFAULT NULL,
  `mother_religion` varchar(100) DEFAULT NULL,
  `mother_mobile` varchar(250) DEFAULT NULL,
  `mother_occupation` varchar(250) DEFAULT NULL,
  `mother_photo` varchar(250) DEFAULT NULL,
  `mo_exam_name_1` varchar(250) DEFAULT NULL,
  `mo_department_1` varchar(250) DEFAULT NULL,
  `mo_institute_1` varchar(250) DEFAULT NULL,
  `mo_year_1` varchar(250) DEFAULT NULL,
  `mo_board_1` varchar(250) DEFAULT NULL,
  `mo_grade_1` varchar(250) DEFAULT NULL,
  `mo_exam_name_2` varchar(250) DEFAULT NULL,
  `mo_department_2` varchar(250) DEFAULT NULL,
  `mo_institute_2` varchar(250) DEFAULT NULL,
  `mo_year_2` varchar(250) DEFAULT NULL,
  `mo_board_2` varchar(250) DEFAULT NULL,
  `mo_grade_2` varchar(250) DEFAULT NULL,
  `pre_division_id` int(11) DEFAULT NULL,
  `pre_district_id` int(11) DEFAULT NULL,
  `pre_thana_id` int(11) DEFAULT NULL,
  `pre_post` varchar(250) DEFAULT NULL,
  `pre_post_code` varchar(250) DEFAULT NULL,
  `pre_village` varchar(250) DEFAULT NULL,
  `pre_ward_number` varchar(250) DEFAULT NULL,
  `pre_road_number` varchar(250) DEFAULT NULL,
  `pre_house_number` varchar(250) DEFAULT NULL,
  `same_as_present` tinyint(4) DEFAULT NULL,
  `per_division_id` varchar(250) DEFAULT NULL,
  `per_district_id` varchar(250) DEFAULT NULL,
  `per_thana_id` varchar(250) DEFAULT NULL,
  `per_post` varchar(250) DEFAULT NULL,
  `per_post_code` varchar(250) DEFAULT NULL,
  `per_village` varchar(250) DEFAULT NULL,
  `per_ward` varchar(250) DEFAULT NULL,
  `per_road_number` varchar(250) DEFAULT NULL,
  `per_house_number` varchar(250) DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL,
  `unique_id` varchar(250) DEFAULT NULL,
  `registration_number` varchar(250) DEFAULT NULL,
  `created_date` date DEFAULT NULL,
  `modify_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_big_registration`
--

INSERT INTO `tbl_big_registration` (`id`, `step_id`, `student_name_bangla`, `student_name_english`, `student_birth_date`, `birth_registration_no`, `birth_certificate_photo`, `student_blood_group`, `student_nid_number`, `nationality`, `student_email`, `password`, `type`, `gender`, `religion`, `student_mobile`, `occupation`, `student_photo`, `st_exam_name_1`, `st_department_1`, `st_institute_1`, `st_year_1`, `st_board_1`, `st_grad_1`, `st_exam_name_2`, `st_department_2`, `st_institute_2`, `st_year_2`, `st_board_2`, `st_grad_2`, `father_name_english`, `father_name_bangla`, `father_birth_date`, `father_blood_group`, `father_nid_number`, `father_nid_scan_photo`, `father_nationality`, `father_email`, `father_religion`, `father_mobile`, `father_occupation`, `father_image`, `fa_exam_name_1`, `fa_department_1`, `fa_institute_1`, `fa_year_1`, `fa_board_1`, `fa_grad_1`, `fa_exam_name_2`, `fa_department_2`, `fa_institute_2`, `fa_year_2`, `fa_board_2`, `fa_grad_2`, `mother_name_english`, `mother_name_bangla`, `mother_birth_date`, `mother_blood_group`, `mother_nid_number`, `mother_nid_scan_photo`, `mother_nationality`, `mother_email`, `mother_religion`, `mother_mobile`, `mother_occupation`, `mother_photo`, `mo_exam_name_1`, `mo_department_1`, `mo_institute_1`, `mo_year_1`, `mo_board_1`, `mo_grade_1`, `mo_exam_name_2`, `mo_department_2`, `mo_institute_2`, `mo_year_2`, `mo_board_2`, `mo_grade_2`, `pre_division_id`, `pre_district_id`, `pre_thana_id`, `pre_post`, `pre_post_code`, `pre_village`, `pre_ward_number`, `pre_road_number`, `pre_house_number`, `same_as_present`, `per_division_id`, `per_district_id`, `per_thana_id`, `per_post`, `per_post_code`, `per_village`, `per_ward`, `per_road_number`, `per_house_number`, `status`, `unique_id`, `registration_number`, `created_date`, `modify_date`) VALUES
(1, 2, '', 'Md Siam Uddin', '1999-11-01', '121421', '', '0', '', 'Bangladeshi', 'admin@gmail.com', '291944668a2843fab3b89f26f3f5a79c77de77d3', 1, '0', '0', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'aaa', '', '1977-07-04', '0', '', '', '', '', '0', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'aa', '', '0188-03-02', '0', '', '', '', '', '0', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1, 2, 6, '', '', '', '', '', '', 0, '', '', '', '', '', '', '', '', '', 1, '254,916874623', '659,403951825', '2019-07-26', '0000-00-00'),
(2, 1, '', 'Siam', '1990-02-03', '123648975251216', '', '', '', 'Bangladeshi', 'phpsiamuddin@gmail.com', '4782436345d9025c879a3aa689dda112a1072879', 2, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'dsf', '', '6465-05-03', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'sdf', '', '5456-04-17', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 3, 35, 250, '', '', '', '', '', '', 0, '', '', '', '', '', '', '', '', NULL, 1, '715,530590966', '746,810273760', '2019-10-20', NULL),
(4, 2, '', 'Liton', '1990-03-03', '123648975251219', '', '', '', 'Bangladeshi', 'liton@yahoo.com', '291944668a2843fab3b89f26f3f5a79c77de77d3', 2, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'sdf', 'sd', '6465-04-03', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'sdf', '', '5456-09-17', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 3, 35, 250, '', '', '', '', '', '', 0, '', '', '', '', '', '', '', '', NULL, 1, '380,340240597', '495,806324889', '2019-10-20', NULL),
(5, 3, '', 'Rayhan', '1990-03-03', '123648975251218', '', '', '', 'Bangladeshi', 'rayhanspi@gmail.com', '291944668a2843fab3b89f26f3f5a79c77de77d3', 2, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'sdf', '', '6465-03-03', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'asdf', '', '5456-09-16', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 3, 35, 250, '', '', '', '', '', '', 0, '', '', '', '', '', '', '', '', NULL, 1, '540,122373011', '543,888096301', '2019-10-20', NULL),
(6, 3, '', 'Avijit', '1998-11-30', '1234567891234', '', '', '', 'Bangladeshi', 'programmer.avijit@gmail.com', '291944668a2843fab3b89f26f3f5a79c77de77d3', 2, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Lakhan Ghosh', '', '1970-03-18', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'Archana', '', '1980-09-15', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 3, 35, 242, '', '', '', '', '', '', 1, '', '', '', '', '', '', '', '', NULL, 1, '248,888691573', '645,594967016', '2019-10-26', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_contact`
--

CREATE TABLE `tbl_contact` (
  `id` int(11) NOT NULL,
  `group_id` int(11) NOT NULL,
  `contact_name` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `contact_mobile` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `remarks` mediumtext COLLATE utf8_unicode_ci NOT NULL,
  `created_at` date NOT NULL,
  `modified_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_contact`
--

INSERT INTO `tbl_contact` (`id`, `group_id`, `contact_name`, `contact_mobile`, `remarks`, `created_at`, `modified_at`) VALUES
(2, 2, 'Rayhan Vai', '01729661197', 'Head. of Software Dept.', '2019-10-01', '2019-10-01'),
(4, 2, 'Avijit', '01765568945', 'Junior Programmer', '2019-10-01', NULL),
(5, 2, 'Siam Vai', '01710450614', 'Project Manager', '2019-10-01', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_contact_type`
--

CREATE TABLE `tbl_contact_type` (
  `id` int(11) NOT NULL,
  `contact_type` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` date NOT NULL,
  `modified_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_district`
--

CREATE TABLE `tbl_district` (
  `id` int(11) NOT NULL,
  `division_id` varchar(100) NOT NULL,
  `district_name` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_district`
--

INSERT INTO `tbl_district` (`id`, `division_id`, `district_name`) VALUES
(1, '1', 'DHAKA'),
(2, '1', 'FARIDPUR'),
(3, '1', 'GAZIPUR'),
(4, '1', 'GOPALGANJ'),
(5, '1', 'JAMALPUR'),
(6, '1', 'MADARIPUR'),
(7, '1', 'MANIKGANJ'),
(8, '1', 'KISHOREGANJ'),
(9, '1', 'MUNSHIGANJ'),
(10, '1', 'MYMENSINGH'),
(11, '1', 'NETROKONA'),
(12, '1', 'RAJBARI'),
(13, '1', 'SHERPUR'),
(14, '1', 'NARAYANGANJ'),
(15, '1', 'SHARIATPUR'),
(16, '1', 'TANGAIL'),
(17, '1', 'NARSINGDI'),
(18, '2', 'BAGERHAT'),
(19, '2', 'CHUADANGA'),
(20, '2', 'JESSORE '),
(21, '2', 'JHENAIDAH '),
(22, '2', 'KHULNA'),
(23, '2', 'KUSHTIA '),
(24, '2', 'MEHERPUR'),
(25, '2', 'MAGURA'),
(26, '2', 'NARAIL '),
(27, '2', 'SATKHIRA '),
(28, '3', 'BOGRA '),
(29, '3', 'JOYPURHAT '),
(30, '3', 'NAOGAON '),
(31, '3', 'NATORE'),
(32, '3', 'C.NAWABGANJ'),
(33, '3', 'PABNA'),
(34, '3', 'RAJSHAHI'),
(35, '3', 'SIRAJGANJ'),
(36, '4', 'GAIBANDHA '),
(37, '4', 'KURIGRAM '),
(38, '4', 'LALMONIRHAT'),
(39, '4', 'NILPHAMARI'),
(40, '4', 'PANCHAGARH'),
(41, '4', 'RANGPUR'),
(42, '4', 'THAKURGAON '),
(43, '4', 'DINAJPUR '),
(44, '5', 'HABIGANJ'),
(45, '5', 'MOULVIBAZAR'),
(46, '5', 'SUNAMGANJ '),
(47, '5', 'SYLHET '),
(48, '6', 'BARISAL '),
(49, '6', 'BARGUNA'),
(50, '6', 'BHOLA '),
(51, '6', 'JHALOKATHI'),
(52, '6', 'PATUAKHALI'),
(53, '6', 'PIROJPUR '),
(54, '7', 'BANDARBAN'),
(55, '7', 'BRAHMANBARIA '),
(56, '7', 'CHANDPUR '),
(57, '7', 'CHITTAGONG '),
(58, '7', 'COMILLA '),
(59, '7', 'COXâ€™S BAZAR'),
(60, '7', 'FENI '),
(61, '7', 'KHAGRACHARI '),
(62, '7', 'LAKSHMIPUR '),
(63, '7', 'NOAKHALI '),
(64, '7', 'RANGAMATI ');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_division`
--

CREATE TABLE `tbl_division` (
  `id` int(11) NOT NULL,
  `division_name` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_division`
--

INSERT INTO `tbl_division` (`id`, `division_name`) VALUES
(1, 'Dhaka'),
(2, 'Khulna'),
(3, 'Rajshahi'),
(4, 'Rangpur'),
(5, 'Sylhet'),
(6, 'Barisal'),
(7, 'Chittagong');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_exam_fee`
--

CREATE TABLE `tbl_exam_fee` (
  `id` int(11) NOT NULL,
  `amount` decimal(40,2) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `modified_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_exam_fee`
--

INSERT INTO `tbl_exam_fee` (`id`, `amount`, `status`, `modified_at`) VALUES
(1, '150.00', 0, '2019-12-03');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_exam_result`
--

CREATE TABLE `tbl_exam_result` (
  `id` int(11) NOT NULL,
  `session_id` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `step_id` int(11) NOT NULL,
  `paragraph_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `exam_time` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `time_out` varchar(200) COLLATE utf8_unicode_ci NOT NULL COMMENT '1 = force_submit 2 = manually ',
  `c_time` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `word` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `typed_word` text COLLATE utf8_unicode_ci,
  `wrong_word` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `score` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_time` time NOT NULL,
  `created_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_group`
--

CREATE TABLE `tbl_group` (
  `id` int(11) NOT NULL,
  `group_name` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_group`
--

INSERT INTO `tbl_group` (`id`, `group_name`, `created_at`) VALUES
(1, 'Personal', '2019-09-30'),
(2, 'Official', '2019-09-30');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_paragraph`
--

CREATE TABLE `tbl_paragraph` (
  `id` int(11) NOT NULL,
  `paragraph` mediumtext NOT NULL,
  `how_times` int(11) NOT NULL,
  `paragraph_title` varchar(250) NOT NULL,
  `word` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL COMMENT '1 = Active 2 = De-active',
  `created_at` date NOT NULL,
  `updated_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_paragraph`
--

INSERT INTO `tbl_paragraph` (`id`, `paragraph`, `how_times`, `paragraph_title`, `word`, `status`, `created_at`, `updated_at`) VALUES
(1, 'I Love python coding. it is awesome', 60, 'Title-1', 7, 2, '2019-10-19', '2019-10-28'),
(2, 'Python is high Level programming Language.', 180, 'Title-2', 6, 2, '2019-10-19', '2019-10-28'),
(3, 'I Love Python Coding.', 40, 'Title-3', 4, 2, '2019-10-21', '2019-10-28'),
(4, 'asdasd', 6, 'Title-4', 1, 2, '2019-10-26', '2019-10-28'),
(5, 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).', 120, 'Paragraph for Session 2018-2019', 104, 2, '2019-10-28', '2019-10-28'),
(6, 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like)', 180, 'Hlw World', 104, 1, '2019-11-30', '2019-11-30');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_password_change_history`
--

CREATE TABLE `tbl_password_change_history` (
  `id` int(11) NOT NULL,
  `admin_id` int(11) NOT NULL,
  `password` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `type` tinyint(4) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_time` time NOT NULL,
  `created_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_payment`
--

CREATE TABLE `tbl_payment` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `session_id` int(11) NOT NULL,
  `paragraph_id` int(11) NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `bkash_number` text COLLATE utf8_unicode_ci NOT NULL,
  `transanction_id` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_payment`
--

INSERT INTO `tbl_payment` (`id`, `user_id`, `session_id`, `paragraph_id`, `amount`, `bkash_number`, `transanction_id`, `status`, `created_at`) VALUES
(1, 5, 3, 2, '200.00', '01919626707', '456454', 0, '2019-11-22');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_registration_fee_payment`
--

CREATE TABLE `tbl_registration_fee_payment` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `random_number` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `amount` decimal(40,2) NOT NULL,
  `bkash_number` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `transaction_id` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL COMMENT '0 = pending , 1 = approved',
  `created_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_step`
--

CREATE TABLE `tbl_step` (
  `id` int(11) NOT NULL,
  `step_name` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `paragraph_id` int(10) NOT NULL,
  `amount` decimal(40,2) NOT NULL,
  `created_at` date NOT NULL,
  `modified_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_step`
--

INSERT INTO `tbl_step` (`id`, `step_name`, `paragraph_id`, `amount`, `created_at`, `modified_at`) VALUES
(2, 'Session 2019-2020', 1, '15.00', '2019-10-26', '0000-00-00'),
(3, 'session 2018-2019', 2, '100.00', '2019-10-26', '0000-00-00'),
(4, 'November Test 2019', 2, '0.00', '2019-10-26', '0000-00-00'),
(6, 'November-December 2019', 5, '0.00', '2019-11-28', '2019-11-28'),
(7, 'December 2018-2019', 5, '120.00', '2019-11-30', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_upzela`
--

CREATE TABLE `tbl_upzela` (
  `id` int(11) NOT NULL,
  `district_id` int(11) NOT NULL,
  `upzela_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_upzela`
--

INSERT INTO `tbl_upzela` (`id`, `district_id`, `upzela_name`) VALUES
(1, 1, 'KERANIGANJ'),
(2, 1, 'NAWABGANJ'),
(3, 1, 'DHAMRAI'),
(4, 1, 'DOHAR'),
(5, 1, 'SAVAR'),
(6, 2, 'FARIDPUR SADAR'),
(7, 2, 'BOALMARI'),
(8, 2, 'MADHUKHALI'),
(9, 2, 'ALFADANGA'),
(10, 2, 'BHANGA'),
(11, 2, 'SADARPUR'),
(12, 2, 'SALTHA'),
(13, 2, 'NAGARKANDA'),
(14, 2, 'NAGARKANDA'),
(15, 3, 'GAZIPUR SADAR'),
(16, 3, 'KALIAKOIR'),
(17, 3, 'KALIGANJ'),
(18, 3, 'KAPASIA'),
(19, 3, 'SREEPUR'),
(20, 4, 'GOPALGANJ SADAR'),
(21, 4, 'KASIANI'),
(22, 4, 'KOTALIPARA'),
(23, 4, 'MUKSUDPUR'),
(24, 4, 'TUNGIPARA'),
(25, 5, 'JAMALPUR SADAR'),
(26, 5, 'BAKSHIGANJ'),
(27, 5, 'DEWANGANJ'),
(28, 5, 'ISLAMPUR'),
(29, 5, 'MADARGANJ'),
(30, 5, 'MELENDAH'),
(31, 5, 'SARISHABARI'),
(32, 6, 'MADARIPUR SADAR'),
(33, 6, 'KALKINI'),
(34, 6, 'RAJOIR'),
(35, 6, 'SHIBCHAR'),
(36, 7, 'MANIKGANJ SADAR'),
(37, 7, 'DAULATPUR'),
(38, 7, 'GHIOR'),
(39, 7, 'HARIRAMPUR'),
(40, 7, 'SATURIA'),
(41, 7, 'SHIBALAYA'),
(42, 7, 'SINGAIR'),
(43, 8, 'KISHOREGANJ SADAR'),
(44, 8, 'BAJITPUR'),
(45, 8, 'PAKUNDIA'),
(46, 8, 'NIKLI'),
(47, 8, 'TARAIL'),
(48, 8, 'MITHAMOIN'),
(49, 8, 'KULIARCHAR'),
(50, 8, 'KATIADI'),
(51, 8, 'KARIMGANJ'),
(52, 8, 'ITNA'),
(53, 8, 'AUSTAGRAM'),
(54, 8, 'BHAIRAB'),
(55, 8, 'HOSSAINPUR'),
(56, 9, 'MUNSHIGANJ SADAR'),
(57, 9, 'GAZARIA'),
(58, 9, 'LOHAJANG'),
(59, 9, 'SERAJDIKHAN'),
(60, 9, 'SREENAGAR'),
(61, 9, 'TONGIBARI'),
(62, 10, 'MYMENSINGH SADAR'),
(63, 10, 'ISHWARGANJ'),
(64, 10, 'PHULPUR'),
(65, 10, 'NANDAIL'),
(66, 10, 'TRISHAL'),
(67, 10, 'HALUAGHAT'),
(68, 10, 'GAURIPUR'),
(69, 10, 'GAFFARGAON'),
(70, 10, 'FULBARI'),
(71, 10, 'DHOBAURA'),
(72, 10, 'BHALUKA'),
(73, 10, 'MUKTAGACHA'),
(74, 10, 'TARAKANDA'),
(75, 11, 'NETROKONA SADAR'),
(76, 11, 'KENDUA'),
(77, 11, 'PURBADHALA'),
(78, 11, 'MOHANGANJ'),
(79, 11, 'MADAN'),
(80, 11, 'KALMAKANDA'),
(81, 11, 'KHALIAJURI'),
(82, 11, 'DURGAPUR'),
(83, 11, 'ATPARA'),
(84, 11, 'BARHATTA'),
(85, 12, 'RAJBARI SADAR'),
(86, 12, 'BALIA KANDI'),
(87, 12, 'GOALANDAGHAT'),
(88, 12, 'PANGSHA'),
(89, 12, 'KALUKHALI'),
(90, 13, 'SHERPUR SADAR'),
(91, 13, 'SREEBORDI'),
(92, 13, 'NAKLA'),
(93, 13, 'JHENAIGATI'),
(94, 13, 'NALITABARI'),
(95, 14, 'NARAYANGANJ SADAR'),
(96, 14, 'ARAIHAZAR'),
(97, 14, 'SONARGAON'),
(98, 14, 'BANDAR'),
(99, 14, 'RUPGANJ'),
(100, 15, 'SHARIATPUR SADAR'),
(101, 15, 'BHEDARGANJ'),
(102, 15, 'DAMUDYA'),
(103, 15, 'GOSHAIRHAT'),
(104, 15, 'NARIA'),
(105, 15, 'JANJIRA'),
(106, 16, 'TANGAIL SADAR'),
(107, 16, 'BASAIL'),
(108, 16, 'BHUAPUR'),
(109, 16, 'DELDUAR'),
(110, 16, 'GHATAIL'),
(111, 16, 'GOPALPUR'),
(112, 16, 'KALIHATI'),
(113, 16, 'MADHUPUR'),
(114, 16, 'MIRZAPUR'),
(115, 16, 'NAGARPUR'),
(116, 16, 'SAKHIPUR'),
(117, 16, 'DHANBARI'),
(118, 17, 'NARSINGDI SADAR'),
(119, 17, 'BELABO'),
(120, 17, 'MANOHARDI'),
(121, 17, 'PALASH'),
(122, 17, 'RAIPURA'),
(123, 17, 'SHIBPUR'),
(124, 18, 'BAGERHAT SADAR'),
(126, 18, 'CHITALMARI'),
(127, 18, 'FAKIRHAT'),
(128, 18, 'KACHUA'),
(129, 18, 'MOLLAHAT'),
(130, 18, 'MONGLA'),
(131, 18, 'MORRELGANJ'),
(132, 18, 'RAMPAL'),
(133, 18, 'SARANKHOLA'),
(134, 19, 'CHUADANGA SADAR'),
(135, 19, 'ALAMDANGA'),
(136, 19, 'DAMURHUDA'),
(137, 19, 'JIBAN NAGAR'),
(138, 20, 'JESSORE SADAR'),
(139, 20, 'ABHOYNAGAR'),
(140, 20, 'BAGHER PARA'),
(141, 20, 'CHAUGACHA'),
(142, 20, 'JHIKARGACHA'),
(143, 20, 'KESHABPUR'),
(144, 20, 'MANIRAMPUR'),
(145, 20, 'SHARSHA'),
(146, 21, 'JHENAIDAHA SADAR'),
(147, 21, 'KALIGANJ'),
(148, 21, 'HARINAKUNDA'),
(149, 21, 'KOTCHANDPUR'),
(150, 21, 'MAHESHPUR'),
(151, 21, 'SHAILKUPA'),
(152, 22, 'BATIAGHATA'),
(153, 22, 'DACOPE'),
(154, 22, 'DIGHALIA'),
(155, 22, 'DUMURIA'),
(156, 22, 'KOYRA'),
(157, 22, 'PAIKGACHA'),
(158, 22, 'PHULTALA'),
(159, 22, 'RUPSA'),
(160, 22, 'TEROKHADA'),
(161, 23, 'KUSHTIA SADAR'),
(162, 23, 'BHERAMARA'),
(163, 23, 'DAULATPUR'),
(164, 23, 'KHOKSHA'),
(165, 23, 'KUMARKHALI'),
(166, 23, 'MIRPUR'),
(167, 24, 'MEHERPUR SADAR'),
(168, 24, 'MOJIBNAGAR'),
(169, 24, 'GANGNI'),
(170, 25, 'MAGURA SADAR'),
(171, 24, 'MOHAMMADPUR'),
(172, 24, 'SHALIKHA'),
(173, 24, 'SREEPUR'),
(174, 26, 'NARAIL SADAR'),
(175, 26, 'LOHAGARA'),
(176, 26, 'KALIA'),
(177, 27, 'SATKHIRA SADAR'),
(178, 27, 'ASSASUNI'),
(179, 27, 'DEBHATA'),
(180, 27, 'KALAROA'),
(181, 27, 'KALIGANJ'),
(182, 27, 'SHYAMNAGAR'),
(183, 27, 'TALA'),
(184, 28, 'BOGRA SADAR'),
(185, 28, 'ADAMDIGHI'),
(186, 28, 'DHUNAT'),
(187, 28, 'DHUPCHANCHIA'),
(188, 28, 'GABTALI'),
(189, 28, 'KAHALOO'),
(190, 28, 'NANDIGRAM'),
(191, 28, 'SARIAKANDI'),
(192, 28, 'SHERPUR'),
(193, 28, 'SHIBGANJ'),
(194, 28, 'SHAJAHANPUR'),
(195, 28, 'SONATOLA'),
(196, 29, 'JOYPURHAT SADAR'),
(197, 29, 'AKKELPUR'),
(198, 29, 'KALAI'),
(199, 29, 'KHETLAL'),
(200, 29, 'PANCHBIBI'),
(201, 30, 'NAOGAON SADAR'),
(202, 30, 'ATRAI'),
(203, 30, 'BADALGACHI'),
(204, 30, 'DHAMOIRHAT'),
(205, 30, 'MANDA'),
(206, 30, 'MOHADEVPUR'),
(207, 30, 'NIAMATPUR'),
(208, 30, 'PATNITALA'),
(209, 30, 'PORSHA'),
(210, 30, 'RANINAGAR'),
(211, 30, 'SHAPAHAR'),
(212, 31, 'NATORE SADAR'),
(213, 31, 'BAGATIPARA'),
(214, 31, 'BARAIGRAM'),
(215, 31, 'GURUDASPUR'),
(216, 31, 'LALPUR'),
(217, 31, 'SINGRA'),
(218, 31, 'NALDANGA'),
(219, 32, 'C.NAWABGANJ SADAR'),
(220, 32, 'BHOLAHAT'),
(221, 32, 'GOMASTAPUR'),
(222, 32, 'NACHOLE'),
(223, 32, 'SHIBGANJ'),
(224, 33, 'PABNA SADAR'),
(225, 33, 'ATGHARIA'),
(226, 33, 'BERA'),
(227, 33, 'BHANGURA'),
(228, 33, 'CHATMOHAR'),
(229, 33, 'FARIDPUR'),
(230, 33, 'ISHWARDI'),
(231, 33, 'SANTHIA'),
(232, 33, 'SUJANAGAR'),
(233, 34, 'BAGHA'),
(234, 34, 'BAGHMARA'),
(235, 34, 'CHARGHAT'),
(236, 34, 'DURGAPUR'),
(237, 34, 'GODAGARI'),
(238, 34, 'MOHANPUR'),
(239, 34, 'PABA'),
(240, 34, 'PUTHIA'),
(241, 34, 'TANORE'),
(242, 35, 'SIRAJGANJ SADAR'),
(243, 35, 'BELKUCHI'),
(244, 35, 'CHOWHALI'),
(245, 35, 'KAMARKHANDA'),
(246, 35, 'KAZIPUR'),
(247, 35, 'RAIGANJ\r\n'),
(248, 35, 'SHAHJADPUR'),
(249, 35, 'TARASH'),
(250, 35, 'ULLAHPARA'),
(251, 36, 'GAIBANDHA SADAR'),
(252, 36, 'GOBINDAGANJ'),
(253, 36, 'FULCHHARI'),
(254, 36, 'PALASHBARI'),
(255, 36, 'SADULLAPUR'),
(256, 36, 'SHAGHATA'),
(257, 36, 'SUNDARGANJ'),
(258, 37, 'KURIGRAM SADAR'),
(259, 37, 'BHURUNGAMARI'),
(260, 37, 'CHAR RAJIBPUR'),
(261, 37, 'CHILMARI'),
(262, 37, 'PHULBARI'),
(263, 37, 'NAGESWARI'),
(264, 37, 'RAJARHAT'),
(265, 37, 'ROWMARI'),
(266, 37, 'ULIPUR'),
(267, 38, 'LALMONIRHAT SADAR'),
(268, 38, 'ADITMARI'),
(269, 38, 'HATIBANDHA'),
(270, 38, 'PATGRAM'),
(271, 38, 'KALIGANJ'),
(272, 39, 'NILPHAMARI SADAR'),
(273, 39, 'KISHOREGANJ'),
(274, 39, 'JALDHAKA'),
(275, 39, 'DOMAR'),
(276, 39, 'DIMLA'),
(277, 39, 'SAYEDPUR'),
(278, 40, 'PANCHAGARH SADAR'),
(279, 40, 'ATWARI'),
(280, 40, 'BODA'),
(281, 40, 'DEBIGANJ'),
(282, 40, 'TETULIA'),
(283, 41, 'RANGPUR SADAR'),
(284, 41, 'BADARGANJ'),
(285, 41, 'GANGACHARA'),
(286, 41, 'KAUNIA'),
(287, 41, 'MITAH PUKUR'),
(288, 41, 'PIRGACHA'),
(289, 41, 'PIRGANJ'),
(290, 41, 'TARAGANJ'),
(291, 42, 'THAKURGAON SADAR'),
(292, 42, 'BALIADANGI'),
(293, 42, 'HARIPUR'),
(294, 42, 'PIRGANJ'),
(295, 42, 'RANISANKAIL'),
(296, 43, 'DINAJPUR SADAR'),
(297, 43, 'BIRAMPUR'),
(298, 43, 'BIRGANJ'),
(299, 43, 'BOCHAGANJ'),
(300, 43, 'CHIRIRBANDAR'),
(301, 43, 'FULBARI'),
(302, 43, 'GHORAGHAT'),
(303, 41, 'HAKIMPUR'),
(304, 41, 'KAHAROL'),
(305, 43, 'KHANSHAMA'),
(306, 43, 'NAWABGANJ'),
(307, 43, 'PARBATIPUR'),
(308, 43, 'BIRAL'),
(309, 44, 'HABIGANJ SADAR'),
(310, 44, 'AZMIRIGANJ'),
(311, 44, 'BAHUBAL'),
(312, 44, 'BANIACHONG'),
(313, 44, 'CHUNARUGHAT'),
(314, 44, 'LAKHAI'),
(315, 44, 'MADHABPUR'),
(316, 44, 'NABIGANJ'),
(317, 45, 'MOULVIBAZAR SADAR'),
(318, 45, 'BARLEKHA'),
(319, 45, 'KAMALGANJ'),
(320, 45, 'KULAURA'),
(321, 45, 'RAJNAGAR'),
(322, 45, 'SREEMANGAL'),
(323, 45, 'JURI'),
(324, 46, 'SUNAMGANJ SADAR'),
(325, 46, 'BISWAMVARPUR'),
(326, 46, 'CHATAK'),
(327, 46, 'DERAI'),
(328, 46, 'DHARAMPASHA'),
(329, 46, 'DOWARABAZAR'),
(330, 46, 'JAGANNATHPUR'),
(331, 46, 'JAMALGANJ'),
(332, 46, 'SULLA'),
(333, 46, 'TAHIRPUR'),
(334, 46, 'SUNAMGANJ DAKSHIN'),
(335, 47, 'SYLHET SADAR'),
(336, 47, 'BALAGANJ'),
(337, 47, 'BEANI BAZAR'),
(338, 47, 'BISWANATH'),
(339, 47, 'COMPANIGANJ'),
(340, 47, 'FENCHUGANJ'),
(341, 47, 'GOLAPGANJ'),
(342, 47, 'GOWAINGHAT'),
(343, 47, 'JOINTIAPUR'),
(344, 47, 'KANAIGHAT'),
(345, 47, 'DAKSHIN SURMA'),
(346, 47, 'ZAKIGANJ'),
(347, 47, 'OSMANINAGAR'),
(348, 48, 'BARISAL SADAR'),
(349, 48, 'AGAILJHARA'),
(350, 48, 'BABUGANJ'),
(351, 48, 'BAKERGANJ'),
(352, 48, 'BANARIPARA'),
(353, 48, 'GOURANADI'),
(354, 48, 'HIZLA'),
(355, 48, 'MEHENDIGANJ'),
(356, 48, 'MULADI'),
(357, 48, 'UZIRPUR'),
(358, 49, 'BARGUNA SADAR '),
(359, 49, 'AMTALI'),
(360, 49, 'BAMNA'),
(361, 49, 'BETAGI'),
(362, 49, 'PATHARGHATA'),
(363, 49, 'TALTALI'),
(364, 50, 'BHOLA SADAR'),
(365, 50, 'BURHANUDDIN'),
(366, 50, 'CHARFASSION'),
(367, 50, 'DAULATKHAN'),
(368, 50, 'LALMOHAN'),
(369, 50, 'MONPURA'),
(370, 50, 'TAZUMUDDIN'),
(371, 51, 'JHALOKATHI SADAR'),
(372, 51, 'KATHALIA'),
(373, 51, 'NALCHITY'),
(374, 51, 'RAJAPUR'),
(375, 52, 'PATUAKHALI SADAR'),
(376, 52, 'BAUPHAL'),
(377, 52, 'DASHMINA'),
(378, 52, 'DUMKI'),
(379, 52, 'GALACHIPA'),
(380, 52, 'KALAPARA'),
(381, 52, 'MIRZA GANJ'),
(382, 52, 'RANGABALI '),
(383, 53, 'PIROJPUR SADAR'),
(384, 53, 'BHANDARIA'),
(385, 53, 'KAWKHALI'),
(386, 53, 'MATBARIA'),
(387, 53, 'NAZIRPUR'),
(388, 53, 'NESARABAD'),
(389, 53, 'ZIA NAGAR'),
(390, 54, 'BANDARBAN SADAR'),
(391, 54, 'ALIKADAM'),
(392, 54, 'LAMA'),
(393, 54, 'NAIKHONGCHHARI'),
(394, 54, 'ROWANGCHHARI'),
(395, 54, 'RUMA'),
(396, 54, 'THANCHI'),
(397, 55, 'BRAHMANBARIA SADAR'),
(398, 55, 'AKHAURA'),
(399, 55, 'ASHUGANJ'),
(400, 55, 'BANCHARAMPUR'),
(401, 55, 'KASBA'),
(402, 55, 'NABINAGAR'),
(403, 55, 'NASIRNAGAR'),
(404, 55, 'SARAIL'),
(405, 55, 'BIJOYNAGAR'),
(406, 56, 'CHANDPUR SADAR'),
(407, 56, 'FARIDGANJ'),
(408, 56, 'HAIM CHAR'),
(409, 56, 'HAJIGANJ'),
(410, 56, 'KACHUA'),
(411, 56, 'DAKSHIN MATLAB'),
(412, 56, 'UTTAR MATLAB'),
(413, 56, 'SHAHRASTI'),
(414, 57, 'ANOWARA'),
(415, 57, 'BANSHKHALI'),
(416, 57, 'BOAL KHALI'),
(417, 57, 'CHANDANAISH'),
(418, 57, 'FATIKCHHARI'),
(419, 57, 'HATHAZARI'),
(420, 57, 'LOHAGARA'),
(421, 57, 'MIRSHARAI'),
(422, 57, 'PATIYA'),
(423, 57, 'RANGUNIA'),
(424, 57, 'RAUJAN'),
(425, 57, 'SANDWIP'),
(426, 57, 'SATKANIA'),
(427, 57, 'KARNAFULI'),
(428, 57, 'SITAKUNDA'),
(429, 58, 'COMILLA SADAR'),
(430, 58, 'BARURA'),
(431, 58, 'BRAHMANPARA'),
(432, 58, 'BURICHONG'),
(433, 58, 'CHANDINA'),
(434, 58, 'CHOUDDAGRAM'),
(435, 58, 'DAUDKANDI'),
(436, 58, 'DEBIDWAR'),
(437, 58, 'HOMNA'),
(438, 58, 'LAKSHAM'),
(439, 58, 'MEGHNA'),
(440, 58, 'MURADNAGAR'),
(441, 58, 'NANGALKOT'),
(442, 58, 'TITAS'),
(443, 58, 'COMILLA DAKSHIN'),
(444, 58, 'MONOHORGANJ'),
(445, 59, 'COX’ S BAZAR SADAR'),
(446, 59, 'CHAKORIA'),
(447, 59, 'KUTUBDIA'),
(448, 59, 'MOHESKHALI'),
(449, 59, 'RAMU'),
(450, 59, 'TEKNAF'),
(451, 59, 'UKHIYA'),
(452, 59, 'PEKUA'),
(453, 60, 'FENI SADAR'),
(454, 60, 'CHAGALNIYA'),
(455, 60, 'DAGANBHUIYAN'),
(456, 60, 'PORSHURAM'),
(457, 60, 'SONAGAZI'),
(458, 60, 'FULGAZI'),
(459, 61, 'KHAGRCHARI SADAR'),
(460, 61, 'DIGHINALA'),
(461, 61, 'LAXMICHARI'),
(462, 61, 'MAHALCHARI'),
(463, 61, 'MANIKCHARI'),
(464, 61, 'MATIRANGA'),
(465, 61, 'PANCHARI'),
(466, 61, 'RAMGARH'),
(467, 61, 'GUIMARA'),
(468, 62, 'LAKSHMIPUR SADAR'),
(469, 62, 'RAIPUR'),
(470, 62, 'RAMGANJ'),
(471, 62, 'RAMGATI'),
(472, 62, 'KAMALNAGAR'),
(473, 63, 'NOAKHALI SADAR'),
(474, 63, 'BEGUMGANJ'),
(475, 63, 'CHATKHIL'),
(476, 63, 'COMPANIGANJ'),
(477, 63, 'HATIYA'),
(478, 63, 'SUBARNA CHAR'),
(479, 63, 'SONAIMURI'),
(480, 63, 'SENBAGH'),
(481, 63, 'KABIRHAT'),
(482, 64, 'RANGAMATI SADAR'),
(483, 64, 'BAGHAICHARI'),
(484, 64, 'BARKAL'),
(485, 64, 'KAUKHALI'),
(486, 64, 'BELAICHHARI'),
(487, 64, 'KAPTAI'),
(488, 64, 'JURAICHARI'),
(489, 64, 'LANGADU'),
(490, 64, 'NANNIARCHAR'),
(491, 64, 'RAJASTHALI'),
(492, 35, 'SALANGA');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_wrong_typed_word`
--

CREATE TABLE `tbl_wrong_typed_word` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `session_id` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `paragraph_id` int(11) DEFAULT NULL,
  `typedWord` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `databaseWord` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` date DEFAULT NULL,
  `created_time` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_wrong_typed_word`
--

INSERT INTO `tbl_wrong_typed_word` (`id`, `user_id`, `session_id`, `paragraph_id`, `typedWord`, `databaseWord`, `created_at`, `created_time`) VALUES
(1, 2, '8549415922', 2, 'Py', 'Python', '2019-10-20', '21:02:17'),
(2, 2, '8549415922', 2, 'level', 'Level', '2019-10-20', '21:02:17'),
(3, 2, '8549415922', 2, 'prg', 'programming', '2019-10-20', '21:02:17'),
(4, 3, '2515962481', 2, 'Pyh', 'Python', '2019-10-20', '21:24:33'),
(5, 3, '2515962481', 2, 'us', 'is', '2019-10-20', '21:24:33'),
(6, 3, '2515962481', 2, 'progrannuib', 'programming', '2019-10-20', '21:24:33'),
(7, 3, '2515962481', 2, 'klad', 'Language.', '2019-10-20', '21:24:33'),
(8, 4, '7848385337', 2, 'Pysd', 'Python', '2019-10-20', '21:25:23');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_big_registration`
--
ALTER TABLE `tbl_big_registration`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_contact`
--
ALTER TABLE `tbl_contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_contact_type`
--
ALTER TABLE `tbl_contact_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_district`
--
ALTER TABLE `tbl_district`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_division`
--
ALTER TABLE `tbl_division`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_exam_fee`
--
ALTER TABLE `tbl_exam_fee`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_exam_result`
--
ALTER TABLE `tbl_exam_result`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_group`
--
ALTER TABLE `tbl_group`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_paragraph`
--
ALTER TABLE `tbl_paragraph`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_password_change_history`
--
ALTER TABLE `tbl_password_change_history`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_payment`
--
ALTER TABLE `tbl_payment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_registration_fee_payment`
--
ALTER TABLE `tbl_registration_fee_payment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_step`
--
ALTER TABLE `tbl_step`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_upzela`
--
ALTER TABLE `tbl_upzela`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_wrong_typed_word`
--
ALTER TABLE `tbl_wrong_typed_word`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_big_registration`
--
ALTER TABLE `tbl_big_registration`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_contact`
--
ALTER TABLE `tbl_contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_contact_type`
--
ALTER TABLE `tbl_contact_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_district`
--
ALTER TABLE `tbl_district`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `tbl_division`
--
ALTER TABLE `tbl_division`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_exam_fee`
--
ALTER TABLE `tbl_exam_fee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_exam_result`
--
ALTER TABLE `tbl_exam_result`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_group`
--
ALTER TABLE `tbl_group`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_paragraph`
--
ALTER TABLE `tbl_paragraph`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_password_change_history`
--
ALTER TABLE `tbl_password_change_history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_payment`
--
ALTER TABLE `tbl_payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_registration_fee_payment`
--
ALTER TABLE `tbl_registration_fee_payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_step`
--
ALTER TABLE `tbl_step`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_upzela`
--
ALTER TABLE `tbl_upzela`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=493;

--
-- AUTO_INCREMENT for table `tbl_wrong_typed_word`
--
ALTER TABLE `tbl_wrong_typed_word`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
