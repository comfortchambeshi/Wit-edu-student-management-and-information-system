-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 10, 2022 at 05:04 PM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 7.4.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `earth`
--

-- --------------------------------------------------------

--
-- Table structure for table `about_us`
--

CREATE TABLE `about_us` (
  `id` int(11) NOT NULL,
  `vission_statement` varchar(255) NOT NULL,
  `mission` varchar(255) NOT NULL,
  `started_date` datetime NOT NULL DEFAULT current_timestamp(),
  `aim` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `accountants`
--

CREATE TABLE `accountants` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `added_by` varchar(255) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `profile_pic` text NOT NULL,
  `phone` text NOT NULL,
  `username` varchar(255) NOT NULL,
  `registered_date` datetime NOT NULL DEFAULT current_timestamp(),
  `city_town` varchar(255) NOT NULL,
  `postal_code` varchar(255) NOT NULL,
  `nrc` varchar(255) NOT NULL,
  `dob` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `acc_login_tokens`
--

CREATE TABLE `acc_login_tokens` (
  `id` int(11) UNSIGNED NOT NULL,
  `token` char(64) NOT NULL DEFAULT '',
  `acc_id` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `acc_login_tokens`
--

INSERT INTO `acc_login_tokens` (`id`, `token`, `acc_id`) VALUES
(2, 'c80abe0de021f27089d1939fe3e1b4980aa6c09e', 1);

-- --------------------------------------------------------

--
-- Table structure for table `administrators`
--

CREATE TABLE `administrators` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `profile_pic` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `admin_login_tokens`
--

CREATE TABLE `admin_login_tokens` (
  `id` int(11) UNSIGNED NOT NULL,
  `token` char(64) NOT NULL DEFAULT '',
  `admin_id` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `admission`
--

CREATE TABLE `admission` (
  `id` int(11) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `dob` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone_number` varchar(255) NOT NULL,
  `course_id` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `results_file` varchar(255) NOT NULL,
  `study_mode` varchar(255) NOT NULL,
  `nrc_number` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `payment_file` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `appearance`
--

CREATE TABLE `appearance` (
  `id` int(11) NOT NULL,
  `non_logged_header_bg` text NOT NULL,
  `logged_header_bg` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `appearance`
--

INSERT INTO `appearance` (`id`, `non_logged_header_bg`, `logged_header_bg`) VALUES
(1, '#5d911d', '#00060a');

-- --------------------------------------------------------

--
-- Table structure for table `assignments`
--

CREATE TABLE `assignments` (
  `id` int(11) NOT NULL,
  `deadline` date NOT NULL,
  `s_from` int(11) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `accademic_year` varchar(255) NOT NULL,
  `file` text NOT NULL,
  `start` datetime NOT NULL,
  `name` varchar(255) NOT NULL,
  `class` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `cart_items`
--

CREATE TABLE `cart_items` (
  `id` int(11) NOT NULL,
  `item_name` varchar(255) NOT NULL,
  `added_by` varchar(255) NOT NULL,
  `item_date` datetime NOT NULL DEFAULT current_timestamp(),
  `fee` varchar(255) NOT NULL,
  `study_years` varchar(255) NOT NULL,
  `study_modes` text NOT NULL,
  `semesters` varchar(255) NOT NULL,
  `user_type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `classes`
--

CREATE TABLE `classes` (
  `id` int(11) NOT NULL,
  `class_name` varchar(255) NOT NULL,
  `class_rep_name` varchar(255) NOT NULL,
  `added_date` datetime NOT NULL DEFAULT current_timestamp(),
  `added_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `classes`
--

INSERT INTO `classes` (`id`, `class_name`, `class_rep_name`, `added_date`, `added_by`) VALUES
(1, 'A', '', '2001-11-20 00:00:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `class_info`
--

CREATE TABLE `class_info` (
  `id` int(11) NOT NULL,
  `teacher` int(11) NOT NULL,
  `class_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `contents`
--

CREATE TABLE `contents` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `cont_id` int(11) NOT NULL,
  `main_content` varchar(255) NOT NULL,
  `datetime` datetime NOT NULL,
  `user_id` int(11) NOT NULL,
  `user_type` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `course_details`
--

CREATE TABLE `course_details` (
  `id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `course_from` int(11) NOT NULL,
  `course_to` int(11) NOT NULL,
  `status` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `cron_entries`
--

CREATE TABLE `cron_entries` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `date_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `started` datetime NOT NULL DEFAULT current_timestamp(),
  `ending` datetime NOT NULL DEFAULT current_timestamp(),
  `description` varchar(100) NOT NULL,
  `added_by` int(11) NOT NULL,
  `venue` varchar(255) NOT NULL,
  `starting_time` varchar(255) NOT NULL,
  `ending_time` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `examiners`
--

CREATE TABLE `examiners` (
  `id` int(11) NOT NULL,
  `teacher_id` int(11) NOT NULL,
  `added_by` int(11) NOT NULL,
  `added_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `exams`
--

CREATE TABLE `exams` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `exams`
--

INSERT INTO `exams` (`id`, `name`) VALUES
(1, 'general'),
(2, 'fianl');

-- --------------------------------------------------------

--
-- Table structure for table `exams_category`
--

CREATE TABLE `exams_category` (
  `id` int(11) NOT NULL,
  `e_name` varchar(255) NOT NULL,
  `exam_from` int(11) NOT NULL,
  `published_date` date NOT NULL,
  `exam_category` varchar(255) NOT NULL,
  `e_status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `exams_name`
--

CREATE TABLE `exams_name` (
  `id` int(11) NOT NULL COMMENT '\r\n',
  `name` varchar(255) NOT NULL,
  `added_by` varchar(255) NOT NULL,
  `added_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `exam_results`
--

CREATE TABLE `exam_results` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `marks_to` int(11) NOT NULL,
  `marks_from` int(11) NOT NULL,
  `obtained_marks` varchar(255) NOT NULL,
  `grade` varchar(255) NOT NULL,
  `comment` varchar(255) NOT NULL,
  `exam_id` varchar(255) NOT NULL,
  `e_year` year(4) NOT NULL,
  `class` varchar(255) NOT NULL,
  `script_file` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `e_answers`
--

CREATE TABLE `e_answers` (
  `id` int(11) NOT NULL,
  `comment_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `user_type` varchar(255) NOT NULL,
  `body` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `e_classes`
--

CREATE TABLE `e_classes` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `class_type` varchar(255) NOT NULL,
  `start_datetime` datetime NOT NULL,
  `physical_class_id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `study_year` varchar(255) NOT NULL,
  `study_mode` varchar(255) NOT NULL,
  `ending_time` time NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `e_comments`
--

CREATE TABLE `e_comments` (
  `id` int(11) NOT NULL,
  `commenter_type` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `datetime` datetime NOT NULL,
  `body` text NOT NULL,
  `class_id` int(11) NOT NULL,
  `attachements` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `fees_study_years`
--

CREATE TABLE `fees_study_years` (
  `id` int(11) NOT NULL,
  `fee_id` int(11) NOT NULL,
  `year` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `fees_year`
--

CREATE TABLE `fees_year` (
  `id` int(11) NOT NULL,
  `fee_id` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `fee_study_modes`
--

CREATE TABLE `fee_study_modes` (
  `id` int(11) NOT NULL,
  `fee_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE `gallery` (
  `id` int(11) NOT NULL,
  `file_name` varchar(255) NOT NULL,
  `added_date` datetime NOT NULL DEFAULT current_timestamp(),
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `added_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `homepage_slider`
--

CREATE TABLE `homepage_slider` (
  `id` int(11) NOT NULL,
  `file_name` varchar(255) NOT NULL,
  `added_date` datetime NOT NULL DEFAULT current_timestamp(),
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `hostels`
--

CREATE TABLE `hostels` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `added_by` int(11) NOT NULL,
  `added_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `invoices`
--

CREATE TABLE `invoices` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `fee` int(11) NOT NULL,
  `due_date` varchar(500) NOT NULL,
  `generated_date` datetime DEFAULT NULL,
  `user_type` varchar(255) NOT NULL,
  `semesters` varchar(255) NOT NULL,
  `study_years` text NOT NULL,
  `study_modes` varchar(255) NOT NULL,
  `added_by` int(11) NOT NULL,
  `gen_date` datetime NOT NULL DEFAULT current_timestamp(),
  `inv_type` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `lecturers`
--

CREATE TABLE `lecturers` (
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `profile_pic` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `id` int(11) NOT NULL,
  `mobile_number` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `registered_date` datetime NOT NULL DEFAULT current_timestamp(),
  `subjects_id` varchar(255) NOT NULL,
  `ts_number` varchar(255) NOT NULL,
  `dob` varchar(255) NOT NULL,
  `nrc` varchar(255) NOT NULL,
  `city_town` varchar(255) NOT NULL,
  `postal_code` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `librarians`
--

CREATE TABLE `librarians` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `role` varchar(255) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `added_by` int(11) NOT NULL,
  `phone_number` varchar(255) NOT NULL,
  `nrc` varchar(255) NOT NULL,
  `profile_pic` text NOT NULL,
  `dob` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `registered_date` datetime NOT NULL DEFAULT current_timestamp(),
  `username` varchar(255) DEFAULT NULL,
  `city_town` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `library_books`
--

CREATE TABLE `library_books` (
  `id` int(11) NOT NULL,
  `book_name` varchar(255) NOT NULL,
  `added_date` datetime NOT NULL DEFAULT current_timestamp(),
  `book_file` text NOT NULL,
  `book_cover` text NOT NULL,
  `added_by` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `library_books`
--

INSERT INTO `library_books` (`id`, `book_name`, `added_date`, `book_file`, `book_cover`, `added_by`, `subject_id`) VALUES
(1, 'A day in life', '2022-01-08 21:56:02', '9f90ad6f6b3f33d5e3f493f4a6b62f44.pdf.61d9ec5258cab6.94206203.pdf', '9f90ad6f6b3f33d5e3f493f4a6b62f44.png.61d9ec5258c988.22660343.png', 7, 1),
(2, 'A day in life', '2022-01-08 21:56:54', '01a8b72dbb27955dc775dd9861f2629c.pdf.61d9ec86012f51.50343073.pdf', '01a8b72dbb27955dc775dd9861f2629c.png.61d9ec86012ea1.43173397.png', 7, 1);

-- --------------------------------------------------------

--
-- Table structure for table `lib_login_tokens`
--

CREATE TABLE `lib_login_tokens` (
  `id` int(11) UNSIGNED NOT NULL,
  `token` char(64) NOT NULL DEFAULT '',
  `lib_id` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `login_tokens`
--

CREATE TABLE `login_tokens` (
  `id` int(11) UNSIGNED NOT NULL,
  `token` char(64) NOT NULL DEFAULT '',
  `user_id` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `mail_settings`
--

CREATE TABLE `mail_settings` (
  `id` int(11) NOT NULL,
  `host` text NOT NULL,
  `port` int(11) NOT NULL,
  `username` int(11) NOT NULL,
  `password` varchar(255) NOT NULL,
  `sent_from` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `msg_from` int(11) NOT NULL,
  `sent_to` int(11) NOT NULL,
  `read_or_unread` varchar(255) NOT NULL,
  `viewed` varchar(22) NOT NULL,
  `body` text NOT NULL,
  `datestatus` datetime NOT NULL DEFAULT current_timestamp(),
  `msg_title` varchar(255) NOT NULL,
  `to_type` varchar(255) NOT NULL,
  `from_type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `messages_replys`
--

CREATE TABLE `messages_replys` (
  `id` int(11) NOT NULL,
  `from_u` int(11) NOT NULL,
  `sent_to` int(11) NOT NULL,
  `body` text NOT NULL,
  `date_sent` datetime NOT NULL DEFAULT current_timestamp(),
  `to_type` varchar(255) NOT NULL,
  `from_type` varchar(255) NOT NULL,
  `msg_id` int(11) NOT NULL,
  `msg_from` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `body` text NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp(),
  `added_by` int(11) NOT NULL,
  `cover_file` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `news_comments`
--

CREATE TABLE `news_comments` (
  `id` int(11) NOT NULL,
  `news_id` int(11) NOT NULL,
  `added_by` int(11) NOT NULL,
  `body` text NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `parents`
--

CREATE TABLE `parents` (
  `id` int(11) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `phone_number` varchar(255) NOT NULL,
  `added_date` date NOT NULL,
  `added_by` int(11) NOT NULL,
  `nrc` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `profile_pic` text NOT NULL,
  `gender` varchar(255) NOT NULL,
  `dob` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `parents_login_tokens`
--

CREATE TABLE `parents_login_tokens` (
  `id` int(11) UNSIGNED NOT NULL,
  `token` char(64) NOT NULL DEFAULT '',
  `parent_id` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `password_tokens`
--

CREATE TABLE `password_tokens` (
  `id` int(11) NOT NULL,
  `token` varchar(255) NOT NULL,
  `to_type` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` int(11) NOT NULL,
  `payment_by` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `deposit_slip_file` text NOT NULL,
  `proceeded_by` int(11) NOT NULL,
  `payment_date` datetime NOT NULL DEFAULT current_timestamp(),
  `amount_paid` varchar(255) NOT NULL,
  `reference` text NOT NULL,
  `reject_description` text NOT NULL,
  `invoice_id` int(11) NOT NULL,
  `last_paid` varchar(250) NOT NULL,
  `total_paid` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `payments_balances`
--

CREATE TABLE `payments_balances` (
  `id` int(11) NOT NULL,
  `balance` int(11) NOT NULL,
  `proceeded_by` varchar(255) NOT NULL,
  `balance_to` varchar(255) NOT NULL,
  `date_issued` datetime NOT NULL DEFAULT current_timestamp(),
  `item_id` int(11) NOT NULL,
  `paid` int(250) NOT NULL,
  `due_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pending_books`
--

CREATE TABLE `pending_books` (
  `id` int(11) NOT NULL,
  `book_to` int(11) NOT NULL,
  `book_from` int(11) NOT NULL,
  `book_name` varchar(255) NOT NULL,
  `book_date` datetime NOT NULL DEFAULT current_timestamp(),
  `return_date` datetime NOT NULL DEFAULT current_timestamp(),
  `book_id` int(11) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `physical_library`
--

CREATE TABLE `physical_library` (
  `id` int(11) NOT NULL,
  `book_name` varchar(22) NOT NULL,
  `book_status` varchar(22) NOT NULL,
  `rent_by` int(11) NOT NULL,
  `due_date` date NOT NULL,
  `borrower_id` int(11) NOT NULL,
  `category` varchar(255) NOT NULL,
  `book_number` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `prgramme_outline`
--

CREATE TABLE `prgramme_outline` (
  `id` int(11) NOT NULL,
  `programme_id` int(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `added_date` datetime NOT NULL DEFAULT current_timestamp(),
  `added_by` int(11) NOT NULL,
  `description` text NOT NULL,
  `owner` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `programmes`
--

CREATE TABLE `programmes` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `added_date` datetime NOT NULL DEFAULT current_timestamp(),
  `year` datetime NOT NULL DEFAULT current_timestamp(),
  `year_number` int(11) NOT NULL,
  `p_from` int(11) NOT NULL,
  `p_to` date NOT NULL,
  `class_id` varchar(255) NOT NULL,
  `cover_file` text NOT NULL,
  `added_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `programmes`
--

INSERT INTO `programmes` (`id`, `name`, `description`, `added_date`, `year`, `year_number`, `p_from`, `p_to`, `class_id`, `cover_file`, `added_by`) VALUES
(1, 'Computer Science', 'Test covered,', '2020-11-01 08:25:14', '2020-11-01 08:25:14', 0, 0, '0000-00-00', '', '13eca86b346f80c4fc109c44eae608f6.jpg.5f9eb73a069758.18431739.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `results`
--

CREATE TABLE `results` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `sent_from` int(11) NOT NULL,
  `grade` varchar(255) NOT NULL,
  `results_file` text NOT NULL,
  `comment` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `returning_students`
--

CREATE TABLE `returning_students` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `date_reported` int(11) NOT NULL,
  `fees_paid` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slip_file` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `site_info`
--

CREATE TABLE `site_info` (
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `site_directory` varchar(255) NOT NULL,
  `id` int(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `about_us` text NOT NULL,
  `phone2` varchar(255) NOT NULL,
  `motto` text NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `small_logo` varchar(255) NOT NULL,
  `big_logo` text NOT NULL,
  `currency` varchar(250) DEFAULT 'ZMW',
  `currency_code` varchar(255) NOT NULL DEFAULT 'K',
  `bank_name` varchar(255) DEFAULT NULL,
  `bank_acc_number` varchar(255) DEFAULT NULL,
  `bank_acc_name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `site_info`
--

INSERT INTO `site_info` (`name`, `description`, `url`, `site_directory`, `id`, `email`, `phone`, `address`, `about_us`, `phone2`, `motto`, `full_name`, `small_logo`, `big_logo`, `currency`, `currency_code`, `bank_name`, `bank_acc_number`, `bank_acc_name`) VALUES
('edearthwit', 'Pioneers in Health Sciences Training', 'http://localhost/edearth', 'edearth', 1, 'info@wilevels.com', '9877689', 'Ng\'answa road', 'A test school', '0968793843', '+260 963691106', 'Coding is poetry', 'ac3cbd132a5b7869498fcc0ca37f0c52.jpg.6394a7f73c0842.28721762.jpg', '9ecfb838e796450328f1b2fd20c9c818.jpg.6394a90b6702a7.54540880.jpg', 'USD', '$', 'Zanaco', '87823663', 'Willo');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `system_id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `student_password` varchar(255) NOT NULL,
  `registered_date` datetime NOT NULL DEFAULT current_timestamp(),
  `programme_id` int(255) NOT NULL,
  `student_email` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `profile_pic` varchar(255) NOT NULL,
  `class_id` int(255) NOT NULL,
  `NRC_NO` varchar(255) NOT NULL,
  `Birth_Date` varchar(255) NOT NULL,
  `Hostel_number` varchar(255) NOT NULL,
  `Hostel_name` varchar(255) NOT NULL,
  `study_mode` varchar(255) NOT NULL,
  `phone_number` varchar(255) NOT NULL,
  `city_town` varchar(255) NOT NULL,
  `sponsor_first_name` varchar(255) NOT NULL,
  `sponsor_last_name` varchar(255) NOT NULL,
  `sponser_mobile_number` varchar(255) NOT NULL,
  `is_bursary` varchar(255) NOT NULL,
  `bursary_percentage` text NOT NULL,
  `year` varchar(255) NOT NULL,
  `exam_number` text NOT NULL,
  `country` varchar(255) NOT NULL,
  `semester` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `Health_Condition` varchar(255) NOT NULL,
  `health_problem` varchar(255) NOT NULL,
  `acc_status` varchar(255) NOT NULL,
  `relationship_with_sponsor` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`system_id`, `first_name`, `last_name`, `student_password`, `registered_date`, `programme_id`, `student_email`, `gender`, `profile_pic`, `class_id`, `NRC_NO`, `Birth_Date`, `Hostel_number`, `Hostel_name`, `study_mode`, `phone_number`, `city_town`, `sponsor_first_name`, `sponsor_last_name`, `sponser_mobile_number`, `is_bursary`, `bursary_percentage`, `year`, `exam_number`, `country`, `semester`, `username`, `Health_Condition`, `health_problem`, `acc_status`, `relationship_with_sponsor`) VALUES
(1, 'Comfort', 'Bwalya', '$2y$10$2mOBh48yIYQY3xguOxi4eOcRib4DQhrVMAr7T.dQZdqdntYEDkiOG', '2020-11-01 00:00:00', 1, 'comfortchambeshi4@gmail.com', 'Male', 'student.png', 1, '12345678', '2022-08-06', '', '', 'Distance', '12345678', 'Serenje', '', '', '', 'no', '10', 'one', '12345678', 'Zambia', 'first', '12345678', 'Medical', '', 'pending', ''),
(2, 'John', 'Billionaire', '$2y$10$Jyd5vA6Wr.9H6CR9iuTzTe/sijWH4YsKF96RLnWW8V24a5M0bL5Xu', '2020-12-08 00:00:00', 1, 'witlevels04@gmail.com', 'Male', 'student.png', 1, '2221121/67/1', '2001-08-06', '009777777777777', '009777777777777', 'Distance', '07450321139', 'Walsall', '', '', '', 'yes', '40%', 'one', '221', 'United Kingdom', 'first', '221', 'Medical', '', 'pending', ''),
(13, 'Factor', 'Ls', '$2y$10$r6cN1ncFyzbicUFIVHp3leZ1FmEymVbejfsXKhOXoyw2U//hI7yJq', '2022-12-10 00:00:00', 1, 'comfortchambeshi@gmail.com', 'Male', '5747ab2d5ab8ceac7604c84450be12ef.png.6394a4c87de795.81544891.png', 1, '2897827822', '2022-12-10', '', '', 'Distance', '0972927679', 'Oldo', 'jkjkjk', 'jkjkjkjk', 'jkjkjkjkjk', 'no', '10', 'one', '16794444', 'Zambia', 'first', '16794444', 'No illness', 'kdjjd', 'pending', 'mother');

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `added_by` int(11) NOT NULL,
  `added_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `submitted_assigments`
--

CREATE TABLE `submitted_assigments` (
  `id` int(11) NOT NULL,
  `assignment_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `submitted_date` datetime NOT NULL,
  `file` text NOT NULL,
  `mark_status` varchar(255) NOT NULL,
  `given_marks` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `teacher_login_tokens`
--

CREATE TABLE `teacher_login_tokens` (
  `id` int(11) UNSIGNED NOT NULL,
  `token` char(64) NOT NULL DEFAULT '',
  `teacher_id` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user_alerts`
--

CREATE TABLE `user_alerts` (
  `id` int(11) NOT NULL,
  `alert_to` int(11) NOT NULL,
  `alert_info` varchar(255) NOT NULL,
  `alert_date` datetime NOT NULL DEFAULT current_timestamp(),
  `read_or_unread` varchar(255) NOT NULL,
  `alert_url` varchar(255) NOT NULL,
  `alert_img` text NOT NULL,
  `alert_totype` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about_us`
--
ALTER TABLE `about_us`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `accountants`
--
ALTER TABLE `accountants`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `acc_login_tokens`
--
ALTER TABLE `acc_login_tokens`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `administrators`
--
ALTER TABLE `administrators`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin_login_tokens`
--
ALTER TABLE `admin_login_tokens`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admission`
--
ALTER TABLE `admission`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `appearance`
--
ALTER TABLE `appearance`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `assignments`
--
ALTER TABLE `assignments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart_items`
--
ALTER TABLE `cart_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `classes`
--
ALTER TABLE `classes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `class_info`
--
ALTER TABLE `class_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contents`
--
ALTER TABLE `contents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `course_details`
--
ALTER TABLE `course_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cron_entries`
--
ALTER TABLE `cron_entries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `examiners`
--
ALTER TABLE `examiners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `exams`
--
ALTER TABLE `exams`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `exams_category`
--
ALTER TABLE `exams_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `exams_name`
--
ALTER TABLE `exams_name`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `exam_results`
--
ALTER TABLE `exam_results`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `e_answers`
--
ALTER TABLE `e_answers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `e_classes`
--
ALTER TABLE `e_classes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `e_comments`
--
ALTER TABLE `e_comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fees_study_years`
--
ALTER TABLE `fees_study_years`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fees_year`
--
ALTER TABLE `fees_year`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fee_study_modes`
--
ALTER TABLE `fee_study_modes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `homepage_slider`
--
ALTER TABLE `homepage_slider`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hostels`
--
ALTER TABLE `hostels`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `invoices`
--
ALTER TABLE `invoices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lecturers`
--
ALTER TABLE `lecturers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `librarians`
--
ALTER TABLE `librarians`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `library_books`
--
ALTER TABLE `library_books`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lib_login_tokens`
--
ALTER TABLE `lib_login_tokens`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login_tokens`
--
ALTER TABLE `login_tokens`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mail_settings`
--
ALTER TABLE `mail_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages_replys`
--
ALTER TABLE `messages_replys`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `msg_id` (`id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news_comments`
--
ALTER TABLE `news_comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `parents`
--
ALTER TABLE `parents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `parents_login_tokens`
--
ALTER TABLE `parents_login_tokens`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_tokens`
--
ALTER TABLE `password_tokens`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payments_balances`
--
ALTER TABLE `payments_balances`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `physical_library`
--
ALTER TABLE `physical_library`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `prgramme_outline`
--
ALTER TABLE `prgramme_outline`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `programmes`
--
ALTER TABLE `programmes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `results`
--
ALTER TABLE `results`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `returning_students`
--
ALTER TABLE `returning_students`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `site_info`
--
ALTER TABLE `site_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`system_id`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `submitted_assigments`
--
ALTER TABLE `submitted_assigments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teacher_login_tokens`
--
ALTER TABLE `teacher_login_tokens`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_alerts`
--
ALTER TABLE `user_alerts`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `about_us`
--
ALTER TABLE `about_us`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `accountants`
--
ALTER TABLE `accountants`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `acc_login_tokens`
--
ALTER TABLE `acc_login_tokens`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `administrators`
--
ALTER TABLE `administrators`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `admin_login_tokens`
--
ALTER TABLE `admin_login_tokens`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `admission`
--
ALTER TABLE `admission`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `appearance`
--
ALTER TABLE `appearance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `assignments`
--
ALTER TABLE `assignments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cart_items`
--
ALTER TABLE `cart_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `classes`
--
ALTER TABLE `classes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `class_info`
--
ALTER TABLE `class_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `contents`
--
ALTER TABLE `contents`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `course_details`
--
ALTER TABLE `course_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cron_entries`
--
ALTER TABLE `cron_entries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `examiners`
--
ALTER TABLE `examiners`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `exams`
--
ALTER TABLE `exams`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `exams_category`
--
ALTER TABLE `exams_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `exams_name`
--
ALTER TABLE `exams_name`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '\r\n';

--
-- AUTO_INCREMENT for table `exam_results`
--
ALTER TABLE `exam_results`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `e_answers`
--
ALTER TABLE `e_answers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `e_classes`
--
ALTER TABLE `e_classes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `e_comments`
--
ALTER TABLE `e_comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `fees_study_years`
--
ALTER TABLE `fees_study_years`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `fees_year`
--
ALTER TABLE `fees_year`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `fee_study_modes`
--
ALTER TABLE `fee_study_modes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gallery`
--
ALTER TABLE `gallery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `homepage_slider`
--
ALTER TABLE `homepage_slider`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `hostels`
--
ALTER TABLE `hostels`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `invoices`
--
ALTER TABLE `invoices`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `lecturers`
--
ALTER TABLE `lecturers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `librarians`
--
ALTER TABLE `librarians`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `library_books`
--
ALTER TABLE `library_books`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `lib_login_tokens`
--
ALTER TABLE `lib_login_tokens`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `login_tokens`
--
ALTER TABLE `login_tokens`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `mail_settings`
--
ALTER TABLE `mail_settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `messages_replys`
--
ALTER TABLE `messages_replys`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `news_comments`
--
ALTER TABLE `news_comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `parents`
--
ALTER TABLE `parents`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `parents_login_tokens`
--
ALTER TABLE `parents_login_tokens`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `password_tokens`
--
ALTER TABLE `password_tokens`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payments_balances`
--
ALTER TABLE `payments_balances`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `physical_library`
--
ALTER TABLE `physical_library`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `prgramme_outline`
--
ALTER TABLE `prgramme_outline`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `programmes`
--
ALTER TABLE `programmes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `results`
--
ALTER TABLE `results`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `returning_students`
--
ALTER TABLE `returning_students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `site_info`
--
ALTER TABLE `site_info`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `system_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `submitted_assigments`
--
ALTER TABLE `submitted_assigments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `teacher_login_tokens`
--
ALTER TABLE `teacher_login_tokens`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_alerts`
--
ALTER TABLE `user_alerts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
