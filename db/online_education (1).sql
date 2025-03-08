-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 25, 2024 at 07:05 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `online_education`
--

-- --------------------------------------------------------

--
-- Table structure for table `achive_students`
--

CREATE TABLE `achive_students` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `student_id` int(11) NOT NULL,
  `description` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `achive_students`
--

INSERT INTO `achive_students` (`id`, `student_id`, `description`, `created_at`, `updated_at`) VALUES
(2, 1, 'A foodbank is a non-profit tha charitable organization that  distributes food those who have difficulty purchasing enough to avoid hunger.', '2024-03-29 22:04:33', '2024-03-29 22:04:33'),
(3, 1, 'A foodbank is a non-profit tha charitable organization that distributes food those who have difficulty purchasing enough to avoid hunger.', '2024-03-29 22:19:57', '2024-03-29 22:19:57'),
(4, 1, 'A foodbank is a non-profit tha charitable organization that distributes food those who have difficulty purchasing enough to avoid hunger.', '2024-03-29 22:20:02', '2024-03-29 22:20:02'),
(5, 1, 'A foodbank is a non-profit tha charitable organization that distributes food those who have difficulty purchasing enough to avoid hunger.', '2024-03-29 22:20:08', '2024-03-29 22:20:08'),
(6, 1, 'A foodbank is a non-profit tha charitable organization that distributes food those who have difficulty purchasing enough to avoid hunger.', '2024-03-29 22:20:13', '2024-03-29 22:20:13'),
(7, 1, 'A foodbank is a non-profit tha charitable organization that distributes food those who have difficulty purchasing enough to avoid hunger.', '2024-03-29 22:20:19', '2024-03-29 22:20:19'),
(8, 1, 'A foodbank is a non-profit tha charitable organization that distributes food those who have difficulty purchasing enough to avoid hunger.', '2024-03-29 22:20:25', '2024-03-29 22:20:25'),
(9, 1, 'A foodbank is a non-profit tha charitable organization that distributes food those who have difficulty purchasing enough to avoid hunger.', '2024-03-29 22:20:30', '2024-03-29 22:20:30');

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `role` int(11) DEFAULT 0 COMMENT '0=user,1=admin,2=branch,3=staff',
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `status` tinyint(4) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `role`, `username`, `email`, `email_verified_at`, `password`, `status`, `image`, `phone`, `address`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 1, 'admin', 'admin@gmail.com', NULL, '$2y$12$e/tFKhTdJx1kW98RWLSSJugLtS7Mg5TMlBURwisRDPeX/U14HcnTq', 0, NULL, NULL, NULL, NULL, '2024-03-17 01:14:38', '2024-03-18 22:31:45'),
(2, 'staff', 3, 'staff', 'staff@gmail.com', NULL, '$2y$12$Z8H3UJbcfHUYsZPjUzsXNeY0lH8kZogu56yiPLw1H4kwt5vmjtG.q', 1, 'backend/images/user/240317-5BVMDJ.png', '01675992034', NULL, NULL, '2024-03-17 01:15:41', '2024-04-23 06:48:38');

-- --------------------------------------------------------

--
-- Table structure for table `admission_payments`
--

CREATE TABLE `admission_payments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `student_id` int(11) NOT NULL,
  `date` varchar(500) NOT NULL,
  `amount` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admission_payments`
--

INSERT INTO `admission_payments` (`id`, `student_id`, `date`, `amount`, `created_at`, `updated_at`) VALUES
(1, 1, '2024-03-26', 50, '2024-03-26 03:52:14', '2024-03-26 03:52:14'),
(2, 1, '2024-03-27', 50, '2024-03-26 21:37:29', '2024-03-26 21:37:29'),
(3, 1, '2024-03-27', 400, '2024-03-26 21:37:49', '2024-03-26 21:37:49'),
(4, 1, '2024-03-27', 100, '2024-03-26 21:42:25', '2024-03-26 21:42:25');

-- --------------------------------------------------------

--
-- Table structure for table `banner_sections`
--

CREATE TABLE `banner_sections` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `sub_title` varchar(255) NOT NULL,
  `description` varchar(2550) NOT NULL,
  `image` varchar(255) NOT NULL,
  `youtube_link` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `banner_sections`
--

INSERT INTO `banner_sections` (`id`, `title`, `sub_title`, `description`, `image`, `youtube_link`, `created_at`, `updated_at`) VALUES
(1, 'যুব উন্নয়ন', 'কম্পিউটার ও শর্টহ্যান্ড প্রশিক্ষণ কেন্দ্র', 'আমাদের প্রতিষ্ঠানের পক্ষ থেকে আপনাদের সকলকে জানাই আন্তরিক শুভেচ্ছা। আমরা দীর্ঘ একযুগেরও বেশি সময় ধরে তথ্য ও প্রযুক্তির উন্নয়নে কাজ করে আসছি। তারই ধারাবাহিকতায়, আমাদের আঞ্চলিক শাখা সমূহের মাধ্যমে তৃণমূল পর্যায়ে প্রযুক্তিতে পিছিয়ে থাকা জনগোষ্ঠিকে, কম্পিউটার প্রশিক্ষণের মাধ্যমে দক্ষ জনশক্তিতে রুপান্তরিত করতে আমরা নিরলসভাবে কাজ করে আসছি। আমাদের মূল লক্ষ্য বেকার জনগোষ্ঠিকে প্রযুক্তিভিত্তিক আত্মনির্ভরশীল করে গড়ে তোলা এবং বাংলাদেশ সরকারের ডিজিটাল বাংলাদেশকে স্মার্ট বাংলাদেশে রুপান্তর করা।', 'backend/images/bannerSection/shutterstock_161192600.jpg', 'https://www.youtube.com/watch?v=f4EuOXlA98w', '2024-03-31 03:53:17', '2024-04-01 03:58:26');

-- --------------------------------------------------------

--
-- Table structure for table `batches`
--

CREATE TABLE `batches` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `start_time` varchar(255) NOT NULL,
  `end_time` varchar(255) NOT NULL,
  `total_sit` int(255) NOT NULL,
  `weekdays` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1 COMMENT '0=>inactive,1=>active',
  `description` varchar(550) DEFAULT NULL,
  `branch_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `batches`
--

INSERT INTO `batches` (`id`, `name`, `start_time`, `end_time`, `total_sit`, `weekdays`, `status`, `description`, `branch_id`, `created_at`, `updated_at`) VALUES
(2, 'beli', '10:20', '12:20', 1, 'Sun,Tue,Thu', 1, 'dvfbgvnmj', 1, '2024-03-20 22:52:32', '2024-04-23 06:03:34'),
(3, 'Ganchil', '08:00', '10:00', 2, 'Sat,Mon,Wed', 1, 'ewfgfb', 1, '2024-04-22 23:15:26', '2024-04-23 06:25:20'),
(4, 'joba', '10:00', '00:00', 2, 'Sat,Mon,Wed', 1, 'wefgfb', 1, '2024-04-22 23:17:21', '2024-04-23 06:03:19'),
(5, 'new batch', '18:05', '20:10', 2, 'Sat,Sun,Mon,Tue,Wed,Thu', 0, NULL, 1, '2024-04-23 06:05:43', '2024-04-23 07:01:29');

-- --------------------------------------------------------

--
-- Table structure for table `boards`
--

CREATE TABLE `boards` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `boards`
--

INSERT INTO `boards` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Dhaka', '2024-03-24 23:53:19', '2024-03-24 23:53:19'),
(2, 'Cumilla', '2024-03-24 23:53:26', '2024-03-24 23:53:26'),
(3, 'Rajshahi', '2024-03-24 23:53:37', '2024-03-24 23:53:37');

-- --------------------------------------------------------

--
-- Table structure for table `branches`
--

CREATE TABLE `branches` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `fathers_name` varchar(255) DEFAULT NULL,
  `mothers_name` varchar(255) DEFAULT NULL,
  `nationality` varchar(255) DEFAULT NULL,
  `gender` varchar(255) DEFAULT NULL,
  `religion` varchar(255) DEFAULT NULL,
  `division_id` int(11) DEFAULT NULL,
  `district_id` int(11) DEFAULT NULL,
  `upazilla_id` int(11) DEFAULT NULL,
  `post_office` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `center_code` varchar(255) DEFAULT NULL,
  `institute_name_en` varchar(255) DEFAULT NULL,
  `institute_name_bn` varchar(255) DEFAULT NULL,
  `institute_age` varchar(255) DEFAULT NULL,
  `facebook_link` varchar(255) DEFAULT NULL,
  `youtube_link` varchar(255) DEFAULT NULL,
  `institute_division` varchar(255) DEFAULT NULL,
  `institute_district` varchar(255) DEFAULT NULL,
  `institute_upazilla` varchar(255) DEFAULT NULL,
  `institute_post_code` varchar(255) DEFAULT NULL,
  `institute_address` varchar(255) DEFAULT NULL,
  `nid_card_img` varchar(255) DEFAULT NULL,
  `trade_licence_img` varchar(255) DEFAULT NULL,
  `signature_img` varchar(255) DEFAULT NULL,
  `registration_balance` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `branches`
--

INSERT INTO `branches` (`id`, `name`, `email`, `password`, `status`, `image`, `phone`, `fathers_name`, `mothers_name`, `nationality`, `gender`, `religion`, `division_id`, `district_id`, `upazilla_id`, `post_office`, `address`, `center_code`, `institute_name_en`, `institute_name_bn`, `institute_age`, `facebook_link`, `youtube_link`, `institute_division`, `institute_district`, `institute_upazilla`, `institute_post_code`, `institute_address`, `nid_card_img`, `trade_licence_img`, `signature_img`, `registration_balance`, `created_at`, `updated_at`) VALUES
(7, 'Susan Weeks', 'ximu@mailinator.com', '$2y$12$YieHgkWibTiNQ0B4zjYaeunEcfUR3F9rcLtlrYHtIJZ41PZVxgm3G', 1, 'backend/images/branch/transaction.png', '07125478754', 'Kirby Cox', 'Maisie Garcia', 'Kimberly Snider', 'Female', 'Clark Fischer', 4, 1, 1, '2345', 'asfgh', '4354', 'aswergtnjm', 'erfgthnjm', '4', 'regthnmnb', 'sdfghn', '4', '1', '1', '4545', 'dfghnm', 'backend/images/NIDimg/istockphoto-918365260-2048x2048.jpg', 'backend/images/TradeLicenceimg/Laptop-computer.webp', 'backend/images/Signatureimg/images (1).jfif', NULL, '2024-03-21 00:01:47', '2024-04-23 06:58:34');

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `session_id` varchar(255) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `course_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `carts`
--

INSERT INTO `carts` (`id`, `session_id`, `user_id`, `course_id`, `created_at`, `updated_at`) VALUES
(6, '660ce8511a585', NULL, 3, '2024-04-03 00:58:23', '2024-04-03 00:58:23'),
(7, '660ce8511a585', NULL, 4, '2024-04-03 00:58:24', '2024-04-03 00:58:24'),
(8, '660ce8511a585', NULL, 5, '2024-04-03 00:58:25', '2024-04-03 00:58:25');

-- --------------------------------------------------------

--
-- Table structure for table `counters`
--

CREATE TABLE `counters` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `count_o1` varchar(255) NOT NULL,
  `count_o2` varchar(500) NOT NULL,
  `count_o3` varchar(500) NOT NULL,
  `count_o4` varchar(500) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `counters`
--

INSERT INTO `counters` (`id`, `count_o1`, `count_o2`, `count_o3`, `count_o4`, `created_at`, `updated_at`) VALUES
(1, '4544', '75', '45', '6754', '2024-03-27 04:13:09', '2024-03-27 04:15:48');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `priority` int(255) NOT NULL,
  `course_fee` double NOT NULL,
  `discount` int(11) DEFAULT NULL,
  `discount_fee` double DEFAULT NULL,
  `total_video` int(11) DEFAULT NULL,
  `total_hours` int(11) DEFAULT NULL,
  `total_sheet` int(11) DEFAULT NULL,
  `total_mcq` int(11) DEFAULT NULL,
  `teacher_id` int(11) DEFAULT 0,
  `course_view` int(11) DEFAULT 1 COMMENT '0=>offline,1=>online',
  `course_type` int(11) NOT NULL DEFAULT 1 COMMENT '0=>unpaid,1=>paid',
  `status` int(11) NOT NULL DEFAULT 1 COMMENT '0=>inactive,1=>active',
  `description` longtext DEFAULT NULL,
  `branch_id` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `name`, `slug`, `image`, `priority`, `course_fee`, `discount`, `discount_fee`, `total_video`, `total_hours`, `total_sheet`, `total_mcq`, `teacher_id`, `course_view`, `course_type`, `status`, `description`, `branch_id`, `created_at`, `updated_at`) VALUES
(1, 'Application Program', 'application-program', 'backend/images/course/cta_bg.jpg', 3, 789, 500, 289, 11, 2, 11, 120, 0, 1, 1, 1, '<h2 class=\"lg:text-2xl md:text-xl text-lg font-medium text-black\" style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; scroll-behavior: smooth; border-width: 0px; border-style: solid; border-color: rgb(229, 231, 235); --tw-border-spacing-x: 0; --tw-border-spacing-y: 0; --tw-translate-x: 0; --tw-translate-y: 0; --tw-rotate: 0; --tw-skew-x: 0; --tw-skew-y: 0; --tw-scale-x: 1; --tw-scale-y: 1; --tw-pan-x: ; --tw-pan-y: ; --tw-pinch-zoom: ; --tw-scroll-snap-strictness: proximity; --tw-gradient-from-position: ; --tw-gradient-via-position: ; --tw-gradient-to-position: ; --tw-ordinal: ; --tw-slashed-zero: ; --tw-numeric-figure: ; --tw-numeric-spacing: ; --tw-numeric-fraction: ; --tw-ring-inset: ; --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgb(59 130 246 / 0.5); --tw-ring-offset-shadow: 0 0 #0000; --tw-ring-shadow: 0 0 #0000; --tw-shadow: 0 0 #0000; --tw-shadow-colored: 0 0 #0000; --tw-blur: ; --tw-brightness: ; --tw-contrast: ; --tw-grayscale: ; --tw-hue-rotate: ; --tw-invert: ; --tw-saturate: ; --tw-sepia: ; --tw-drop-shadow: ; --tw-backdrop-blur: ; --tw-backdrop-brightness: ; --tw-backdrop-contrast: ; --tw-backdrop-grayscale: ; --tw-backdrop-hue-rotate: ; --tw-backdrop-invert: ; --tw-backdrop-opacity: ; --tw-backdrop-saturate: ; --tw-backdrop-sepia: ; --tw-contain-size: ; --tw-contain-layout: ; --tw-contain-paint: ; --tw-contain-style: ; font-size: 1.5rem; line-height: 2rem; --tw-text-opacity: 1; font-family: Oswald, sans-serif;\"><b>Overview</b></h2><h2 class=\"lg:text-2xl md:text-xl text-lg font-medium text-black\" style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; scroll-behavior: smooth; border-width: 0px; border-style: solid; border-color: rgb(229, 231, 235); --tw-border-spacing-x: 0; --tw-border-spacing-y: 0; --tw-translate-x: 0; --tw-translate-y: 0; --tw-rotate: 0; --tw-skew-x: 0; --tw-skew-y: 0; --tw-scale-x: 1; --tw-scale-y: 1; --tw-pan-x: ; --tw-pan-y: ; --tw-pinch-zoom: ; --tw-scroll-snap-strictness: proximity; --tw-gradient-from-position: ; --tw-gradient-via-position: ; --tw-gradient-to-position: ; --tw-ordinal: ; --tw-slashed-zero: ; --tw-numeric-figure: ; --tw-numeric-spacing: ; --tw-numeric-fraction: ; --tw-ring-inset: ; --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgb(59 130 246 / 0.5); --tw-ring-offset-shadow: 0 0 #0000; --tw-ring-shadow: 0 0 #0000; --tw-shadow: 0 0 #0000; --tw-shadow-colored: 0 0 #0000; --tw-blur: ; --tw-brightness: ; --tw-contrast: ; --tw-grayscale: ; --tw-hue-rotate: ; --tw-invert: ; --tw-saturate: ; --tw-sepia: ; --tw-drop-shadow: ; --tw-backdrop-blur: ; --tw-backdrop-brightness: ; --tw-backdrop-contrast: ; --tw-backdrop-grayscale: ; --tw-backdrop-hue-rotate: ; --tw-backdrop-invert: ; --tw-backdrop-opacity: ; --tw-backdrop-saturate: ; --tw-backdrop-sepia: ; --tw-contain-size: ; --tw-contain-layout: ; --tw-contain-paint: ; --tw-contain-style: ; font-size: 1.5rem; line-height: 2rem; --tw-text-opacity: 1; font-family: Oswald, sans-serif;\">our worldwide annual spend on digital advertising surpassing $325 billion, it’s no surprise that different apches to online marketing are becoming available. One of these new approaches is performance or digital performance marketing. Keep reading to learn all about performance marketing<font color=\"#000000\" style=\"background-color: rgb(255, 255, 0);\">, from how it work</font>s to it compares to digital marketing. Plus, get insight into the benefits and risks of performance marketing and how itcan affect your company’s long-term success and profitability. Performance marketing is an approach to digitalmarketing or advertising where businesses only pay when a specific result occurs. This result could be a new lead,sale, or other outcome agreed upon by the advertiser and business. Performance marketing involves channels such as affiliate marketing, online advertising.</h2><p style=\"margin: 1.25rem 0px 0px; padding: 0px; scroll-behavior: smooth; border-width: 0px; border-style: solid; border-color: rgb(229, 231, 235); --tw-border-spacing-x: 0; --tw-border-spacing-y: 0; --tw-translate-x: 0; --tw-translate-y: 0; --tw-rotate: 0; --tw-skew-x: 0; --tw-skew-y: 0; --tw-scale-x: 1; --tw-scale-y: 1; --tw-pan-x: ; --tw-pan-y: ; --tw-pinch-zoom: ; --tw-scroll-snap-strictness: proximity; --tw-gradient-from-position: ; --tw-gradient-via-position: ; --tw-gradient-to-position: ; --tw-ordinal: ; --tw-slashed-zero: ; --tw-numeric-figure: ; --tw-numeric-spacing: ; --tw-numeric-fraction: ; --tw-ring-inset: ; --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgb(59 130 246 / 0.5); --tw-ring-offset-shadow: 0 0 #0000; --tw-ring-shadow: 0 0 #0000; --tw-shadow: 0 0 #0000; --tw-shadow-colored: 0 0 #0000; --tw-blur: ; --tw-brightness: ; --tw-contrast: ; --tw-grayscale: ; --tw-hue-rotate: ; --tw-invert: ; --tw-saturate: ; --tw-sepia: ; --tw-drop-shadow: ; --tw-backdrop-blur: ; --tw-backdrop-brightness: ; --tw-backdrop-contrast: ; --tw-backdrop-grayscale: ; --tw-backdrop-hue-rotate: ; --tw-backdrop-invert: ; --tw-backdrop-opacity: ; --tw-backdrop-saturate: ; --tw-backdrop-sepia: ; --tw-contain-size: ; --tw-contain-layout: ; --tw-contain-paint: ; --tw-contain-style: ; color: rgb(0, 0, 0); font-family: Oswald, sans-serif; font-size: medium;\"></p><p style=\"margin: 1.25rem 0px 0px; padding: 0px; scroll-behavior: smooth; border-width: 0px; border-style: solid; border-color: rgb(229, 231, 235); --tw-border-spacing-x: 0; --tw-border-spacing-y: 0; --tw-translate-x: 0; --tw-translate-y: 0; --tw-rotate: 0; --tw-skew-x: 0; --tw-skew-y: 0; --tw-scale-x: 1; --tw-scale-y: 1; --tw-pan-x: ; --tw-pan-y: ; --tw-pinch-zoom: ; --tw-scroll-snap-strictness: proximity; --tw-gradient-from-position: ; --tw-gradient-via-position: ; --tw-gradient-to-position: ; --tw-ordinal: ; --tw-slashed-zero: ; --tw-numeric-figure: ; --tw-numeric-spacing: ; --tw-numeric-fraction: ; --tw-ring-inset: ; --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgb(59 130 246 / 0.5); --tw-ring-offset-shadow: 0 0 #0000; --tw-ring-shadow: 0 0 #0000; --tw-shadow: 0 0 #0000; --tw-shadow-colored: 0 0 #0000; --tw-blur: ; --tw-brightness: ; --tw-contrast: ; --tw-grayscale: ; --tw-hue-rotate: ; --tw-invert: ; --tw-saturate: ; --tw-sepia: ; --tw-drop-shadow: ; --tw-backdrop-blur: ; --tw-backdrop-brightness: ; --tw-backdrop-contrast: ; --tw-backdrop-grayscale: ; --tw-backdrop-hue-rotate: ; --tw-backdrop-invert: ; --tw-backdrop-opacity: ; --tw-backdrop-saturate: ; --tw-backdrop-sepia: ; --tw-contain-size: ; --tw-contain-layout: ; --tw-contain-paint: ; --tw-contain-style: ; color: rgb(0, 0, 0); font-family: Oswald, sans-serif; font-size: medium;\"><ul class=\"overview-features mt-8 text-gray-800 font-open-sans font-medium\" style=\"margin: 2rem 0px 0px; padding: 0px; scroll-behavior: smooth; border-width: 0px; border-style: solid; border-color: rgb(229, 231, 235); --tw-border-spacing-x: 0; --tw-border-spacing-y: 0; --tw-translate-x: 0; --tw-translate-y: 0; --tw-rotate: 0; --tw-skew-x: 0; --tw-skew-y: 0; --tw-scale-x: 1; --tw-scale-y: 1; --tw-pan-x: ; --tw-pan-y: ; --tw-pinch-zoom: ; --tw-scroll-snap-strictness: proximity; --tw-gradient-from-position: ; --tw-gradient-via-position: ; --tw-gradient-to-position: ; --tw-ordinal: ; --tw-slashed-zero: ; --tw-numeric-figure: ; --tw-numeric-spacing: ; --tw-numeric-fraction: ; --tw-ring-inset: ; --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgb(59 130 246 / 0.5); --tw-ring-offset-shadow: 0 0 #0000; --tw-ring-shadow: 0 0 #0000; --tw-shadow: 0 0 #0000; --tw-shadow-colored: 0 0 #0000; --tw-blur: ; --tw-brightness: ; --tw-contrast: ; --tw-grayscale: ; --tw-hue-rotate: ; --tw-invert: ; --tw-saturate: ; --tw-sepia: ; --tw-drop-shadow: ; --tw-backdrop-blur: ; --tw-backdrop-brightness: ; --tw-backdrop-contrast: ; --tw-backdrop-grayscale: ; --tw-backdrop-hue-rotate: ; --tw-backdrop-invert: ; --tw-backdrop-opacity: ; --tw-backdrop-saturate: ; --tw-backdrop-sepia: ; --tw-contain-size: ; --tw-contain-layout: ; --tw-contain-paint: ; --tw-contain-style: ; list-style: none; font-family: &quot;Open Sans&quot;, sans-serif; --tw-text-opacity: 1; color: rgb(31 41 55 / var(--tw-text-opacity));\"><ul></ul></ul></p><ul><li style=\"margin: 0px; padding: 0px 0px 0px 15px; scroll-behavior: smooth; border-width: 0px; border-style: solid; border-color: rgb(229, 231, 235); --tw-border-spacing-x: 0; --tw-border-spacing-y: 0; --tw-translate-x: 0; --tw-translate-y: 0; --tw-rotate: 0; --tw-skew-x: 0; --tw-skew-y: 0; --tw-scale-x: 1; --tw-scale-y: 1; --tw-pan-x: ; --tw-pan-y: ; --tw-pinch-zoom: ; --tw-scroll-snap-strictness: proximity; --tw-gradient-from-position: ; --tw-gradient-via-position: ; --tw-gradient-to-position: ; --tw-ordinal: ; --tw-slashed-zero: ; --tw-numeric-figure: ; --tw-numeric-spacing: ; --tw-numeric-fraction: ; --tw-ring-inset: ; --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgb(59 130 246 / 0.5); --tw-ring-offset-shadow: 0 0 #0000; --tw-ring-shadow: 0 0 #0000; --tw-shadow: 0 0 #0000; --tw-shadow-colored: 0 0 #0000; --tw-blur: ; --tw-brightness: ; --tw-contrast: ; --tw-grayscale: ; --tw-hue-rotate: ; --tw-invert: ; --tw-saturate: ; --tw-sepia: ; --tw-drop-shadow: ; --tw-backdrop-blur: ; --tw-backdrop-brightness: ; --tw-backdrop-contrast: ; --tw-backdrop-grayscale: ; --tw-backdrop-hue-rotate: ; --tw-backdrop-invert: ; --tw-backdrop-opacity: ; --tw-backdrop-saturate: ; --tw-backdrop-sepia: ; --tw-contain-size: ; --tw-contain-layout: ; --tw-contain-paint: ; --tw-contain-style: ; position: relative; font-size: 16px;\">Another way to promote reflection, not perfection</li><li style=\"margin: 0px; padding: 0px 0px 0px 15px; scroll-behavior: smooth; border-width: 0px; border-style: solid; border-color: rgb(229, 231, 235); --tw-border-spacing-x: 0; --tw-border-spacing-y: 0; --tw-translate-x: 0; --tw-translate-y: 0; --tw-rotate: 0; --tw-skew-x: 0; --tw-skew-y: 0; --tw-scale-x: 1; --tw-scale-y: 1; --tw-pan-x: ; --tw-pan-y: ; --tw-pinch-zoom: ; --tw-scroll-snap-strictness: proximity; --tw-gradient-from-position: ; --tw-gradient-via-position: ; --tw-gradient-to-position: ; --tw-ordinal: ; --tw-slashed-zero: ; --tw-numeric-figure: ; --tw-numeric-spacing: ; --tw-numeric-fraction: ; --tw-ring-inset: ; --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgb(59 130 246 / 0.5); --tw-ring-offset-shadow: 0 0 #0000; --tw-ring-shadow: 0 0 #0000; --tw-shadow: 0 0 #0000; --tw-shadow-colored: 0 0 #0000; --tw-blur: ; --tw-brightness: ; --tw-contrast: ; --tw-grayscale: ; --tw-hue-rotate: ; --tw-invert: ; --tw-saturate: ; --tw-sepia: ; --tw-drop-shadow: ; --tw-backdrop-blur: ; --tw-backdrop-brightness: ; --tw-backdrop-contrast: ; --tw-backdrop-grayscale: ; --tw-backdrop-hue-rotate: ; --tw-backdrop-invert: ; --tw-backdrop-opacity: ; --tw-backdrop-saturate: ; --tw-backdrop-sepia: ; --tw-contain-size: ; --tw-contain-layout: ; --tw-contain-paint: ; --tw-contain-style: ; position: relative; font-size: 16px;\">This practice will help students think interdependently</li><li style=\"margin: 0px; padding: 0px 0px 0px 15px; scroll-behavior: smooth; border-width: 0px; border-style: solid; border-color: rgb(229, 231, 235); --tw-border-spacing-x: 0; --tw-border-spacing-y: 0; --tw-translate-x: 0; --tw-translate-y: 0; --tw-rotate: 0; --tw-skew-x: 0; --tw-skew-y: 0; --tw-scale-x: 1; --tw-scale-y: 1; --tw-pan-x: ; --tw-pan-y: ; --tw-pinch-zoom: ; --tw-scroll-snap-strictness: proximity; --tw-gradient-from-position: ; --tw-gradient-via-position: ; --tw-gradient-to-position: ; --tw-ordinal: ; --tw-slashed-zero: ; --tw-numeric-figure: ; --tw-numeric-spacing: ; --tw-numeric-fraction: ; --tw-ring-inset: ; --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgb(59 130 246 / 0.5); --tw-ring-offset-shadow: 0 0 #0000; --tw-ring-shadow: 0 0 #0000; --tw-shadow: 0 0 #0000; --tw-shadow-colored: 0 0 #0000; --tw-blur: ; --tw-brightness: ; --tw-contrast: ; --tw-grayscale: ; --tw-hue-rotate: ; --tw-invert: ; --tw-saturate: ; --tw-sepia: ; --tw-drop-shadow: ; --tw-backdrop-blur: ; --tw-backdrop-brightness: ; --tw-backdrop-contrast: ; --tw-backdrop-grayscale: ; --tw-backdrop-hue-rotate: ; --tw-backdrop-invert: ; --tw-backdrop-opacity: ; --tw-backdrop-saturate: ; --tw-backdrop-sepia: ; --tw-contain-size: ; --tw-contain-layout: ; --tw-contain-paint: ; --tw-contain-style: ; position: relative; font-size: 16px;\">Self-reflection requires courage and patience</li><li style=\"margin: 0px; padding: 0px 0px 0px 15px; scroll-behavior: smooth; border-width: 0px; border-style: solid; border-color: rgb(229, 231, 235); --tw-border-spacing-x: 0; --tw-border-spacing-y: 0; --tw-translate-x: 0; --tw-translate-y: 0; --tw-rotate: 0; --tw-skew-x: 0; --tw-skew-y: 0; --tw-scale-x: 1; --tw-scale-y: 1; --tw-pan-x: ; --tw-pan-y: ; --tw-pinch-zoom: ; --tw-scroll-snap-strictness: proximity; --tw-gradient-from-position: ; --tw-gradient-via-position: ; --tw-gradient-to-position: ; --tw-ordinal: ; --tw-slashed-zero: ; --tw-numeric-figure: ; --tw-numeric-spacing: ; --tw-numeric-fraction: ; --tw-ring-inset: ; --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgb(59 130 246 / 0.5); --tw-ring-offset-shadow: 0 0 #0000; --tw-ring-shadow: 0 0 #0000; --tw-shadow: 0 0 #0000; --tw-shadow-colored: 0 0 #0000; --tw-blur: ; --tw-brightness: ; --tw-contrast: ; --tw-grayscale: ; --tw-hue-rotate: ; --tw-invert: ; --tw-saturate: ; --tw-sepia: ; --tw-drop-shadow: ; --tw-backdrop-blur: ; --tw-backdrop-brightness: ; --tw-backdrop-contrast: ; --tw-backdrop-grayscale: ; --tw-backdrop-hue-rotate: ; --tw-backdrop-invert: ; --tw-backdrop-opacity: ; --tw-backdrop-saturate: ; --tw-backdrop-sepia: ; --tw-contain-size: ; --tw-contain-layout: ; --tw-contain-paint: ; --tw-contain-style: ; position: relative; font-size: 16px;\">Teaching students to be self-reflective will give them a skill</li></ul>', 0, '2024-03-22 23:02:36', '2024-04-01 04:01:16'),
(3, 'web design', 'web-design', 'backend/images/course/top_courses_thumb07.jpg', 2, 800, 50, 750, 11, 2, 11, 120, 0, 1, 1, 0, '<h2 class=\"lg:text-2xl md:text-xl text-lg font-medium text-black\" style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; scroll-behavior: smooth; border-width: 0px; border-style: solid; border-color: rgb(229, 231, 235); --tw-border-spacing-x: 0; --tw-border-spacing-y: 0; --tw-translate-x: 0; --tw-translate-y: 0; --tw-rotate: 0; --tw-skew-x: 0; --tw-skew-y: 0; --tw-scale-x: 1; --tw-scale-y: 1; --tw-pan-x: ; --tw-pan-y: ; --tw-pinch-zoom: ; --tw-scroll-snap-strictness: proximity; --tw-gradient-from-position: ; --tw-gradient-via-position: ; --tw-gradient-to-position: ; --tw-ordinal: ; --tw-slashed-zero: ; --tw-numeric-figure: ; --tw-numeric-spacing: ; --tw-numeric-fraction: ; --tw-ring-inset: ; --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgb(59 130 246 / 0.5); --tw-ring-offset-shadow: 0 0 #0000; --tw-ring-shadow: 0 0 #0000; --tw-shadow: 0 0 #0000; --tw-shadow-colored: 0 0 #0000; --tw-blur: ; --tw-brightness: ; --tw-contrast: ; --tw-grayscale: ; --tw-hue-rotate: ; --tw-invert: ; --tw-saturate: ; --tw-sepia: ; --tw-drop-shadow: ; --tw-backdrop-blur: ; --tw-backdrop-brightness: ; --tw-backdrop-contrast: ; --tw-backdrop-grayscale: ; --tw-backdrop-hue-rotate: ; --tw-backdrop-invert: ; --tw-backdrop-opacity: ; --tw-backdrop-saturate: ; --tw-backdrop-sepia: ; --tw-contain-size: ; --tw-contain-layout: ; --tw-contain-paint: ; --tw-contain-style: ; font-size: 1.5rem; line-height: 2rem; --tw-text-opacity: 1; font-family: Oswald, sans-serif;\"><b>Overview</b></h2><p style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; scroll-behavior: smooth; border-width: 0px; border-style: solid; border-color: rgb(229, 231, 235); --tw-border-spacing-x: 0; --tw-border-spacing-y: 0; --tw-translate-x: 0; --tw-translate-y: 0; --tw-rotate: 0; --tw-skew-x: 0; --tw-skew-y: 0; --tw-scale-x: 1; --tw-scale-y: 1; --tw-pan-x: ; --tw-pan-y: ; --tw-pinch-zoom: ; --tw-scroll-snap-strictness: proximity; --tw-gradient-from-position: ; --tw-gradient-via-position: ; --tw-gradient-to-position: ; --tw-ordinal: ; --tw-slashed-zero: ; --tw-numeric-figure: ; --tw-numeric-spacing: ; --tw-numeric-fraction: ; --tw-ring-inset: ; --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgb(59 130 246 / 0.5); --tw-ring-offset-shadow: 0 0 #0000; --tw-ring-shadow: 0 0 #0000; --tw-shadow: 0 0 #0000; --tw-shadow-colored: 0 0 #0000; --tw-blur: ; --tw-brightness: ; --tw-contrast: ; --tw-grayscale: ; --tw-hue-rotate: ; --tw-invert: ; --tw-saturate: ; --tw-sepia: ; --tw-drop-shadow: ; --tw-backdrop-blur: ; --tw-backdrop-brightness: ; --tw-backdrop-contrast: ; --tw-backdrop-grayscale: ; --tw-backdrop-hue-rotate: ; --tw-backdrop-invert: ; --tw-backdrop-opacity: ; --tw-backdrop-saturate: ; --tw-backdrop-sepia: ; --tw-contain-size: ; --tw-contain-layout: ; --tw-contain-paint: ; --tw-contain-style: ; font-size: 1.5rem; line-height: 2rem; --tw-text-opacity: 1; font-family: Oswald, sans-serif;\">our worldwide annual spend on digital advertising surpassing $325 billion, it’s no surprise that different apches to online marketing are becoming available. One of these new approaches is performance or digital performance marketing. Keep reading to learn all about performance marketing, from how it works to it compares to digital marketing. Plus, get insight into the <font color=\"#000000\" style=\"background-color: rgb(255, 156, 0);\">benefits and risks of performance</font> marketing and how itcan affect your company’s long-term success and profitability. Performance marketing is an approach to digitalmarketing or advertising where businesses only pay when a specific result occurs. This result could be a new lead,sale, or other outcome agreed upon by the advertiser and business. Performance <font color=\"#000000\" style=\"background-color: rgb(99, 74, 165);\">marketing involves channels</font> such as affiliate marketing, online advertising.</p><p style=\"margin: 1.25rem 0px 0px; padding: 0px; scroll-behavior: smooth; border-width: 0px; border-style: solid; border-color: rgb(229, 231, 235); --tw-border-spacing-x: 0; --tw-border-spacing-y: 0; --tw-translate-x: 0; --tw-translate-y: 0; --tw-rotate: 0; --tw-skew-x: 0; --tw-skew-y: 0; --tw-scale-x: 1; --tw-scale-y: 1; --tw-pan-x: ; --tw-pan-y: ; --tw-pinch-zoom: ; --tw-scroll-snap-strictness: proximity; --tw-gradient-from-position: ; --tw-gradient-via-position: ; --tw-gradient-to-position: ; --tw-ordinal: ; --tw-slashed-zero: ; --tw-numeric-figure: ; --tw-numeric-spacing: ; --tw-numeric-fraction: ; --tw-ring-inset: ; --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgb(59 130 246 / 0.5); --tw-ring-offset-shadow: 0 0 #0000; --tw-ring-shadow: 0 0 #0000; --tw-shadow: 0 0 #0000; --tw-shadow-colored: 0 0 #0000; --tw-blur: ; --tw-brightness: ; --tw-contrast: ; --tw-grayscale: ; --tw-hue-rotate: ; --tw-invert: ; --tw-saturate: ; --tw-sepia: ; --tw-drop-shadow: ; --tw-backdrop-blur: ; --tw-backdrop-brightness: ; --tw-backdrop-contrast: ; --tw-backdrop-grayscale: ; --tw-backdrop-hue-rotate: ; --tw-backdrop-invert: ; --tw-backdrop-opacity: ; --tw-backdrop-saturate: ; --tw-backdrop-sepia: ; --tw-contain-size: ; --tw-contain-layout: ; --tw-contain-paint: ; --tw-contain-style: ; color: rgb(0, 0, 0); font-family: Oswald, sans-serif; font-size: medium;\"></p><p style=\"margin: 1.25rem 0px 0px; padding: 0px; scroll-behavior: smooth; border-width: 0px; border-style: solid; border-color: rgb(229, 231, 235); --tw-border-spacing-x: 0; --tw-border-spacing-y: 0; --tw-translate-x: 0; --tw-translate-y: 0; --tw-rotate: 0; --tw-skew-x: 0; --tw-skew-y: 0; --tw-scale-x: 1; --tw-scale-y: 1; --tw-pan-x: ; --tw-pan-y: ; --tw-pinch-zoom: ; --tw-scroll-snap-strictness: proximity; --tw-gradient-from-position: ; --tw-gradient-via-position: ; --tw-gradient-to-position: ; --tw-ordinal: ; --tw-slashed-zero: ; --tw-numeric-figure: ; --tw-numeric-spacing: ; --tw-numeric-fraction: ; --tw-ring-inset: ; --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgb(59 130 246 / 0.5); --tw-ring-offset-shadow: 0 0 #0000; --tw-ring-shadow: 0 0 #0000; --tw-shadow: 0 0 #0000; --tw-shadow-colored: 0 0 #0000; --tw-blur: ; --tw-brightness: ; --tw-contrast: ; --tw-grayscale: ; --tw-hue-rotate: ; --tw-invert: ; --tw-saturate: ; --tw-sepia: ; --tw-drop-shadow: ; --tw-backdrop-blur: ; --tw-backdrop-brightness: ; --tw-backdrop-contrast: ; --tw-backdrop-grayscale: ; --tw-backdrop-hue-rotate: ; --tw-backdrop-invert: ; --tw-backdrop-opacity: ; --tw-backdrop-saturate: ; --tw-backdrop-sepia: ; --tw-contain-size: ; --tw-contain-layout: ; --tw-contain-paint: ; --tw-contain-style: ; color: rgb(0, 0, 0); font-family: Oswald, sans-serif; font-size: medium;\"><ul class=\"overview-features mt-8 text-gray-800 font-open-sans font-medium\" style=\"margin: 2rem 0px 0px; padding: 0px; scroll-behavior: smooth; border-width: 0px; border-style: solid; border-color: rgb(229, 231, 235); --tw-border-spacing-x: 0; --tw-border-spacing-y: 0; --tw-translate-x: 0; --tw-translate-y: 0; --tw-rotate: 0; --tw-skew-x: 0; --tw-skew-y: 0; --tw-scale-x: 1; --tw-scale-y: 1; --tw-pan-x: ; --tw-pan-y: ; --tw-pinch-zoom: ; --tw-scroll-snap-strictness: proximity; --tw-gradient-from-position: ; --tw-gradient-via-position: ; --tw-gradient-to-position: ; --tw-ordinal: ; --tw-slashed-zero: ; --tw-numeric-figure: ; --tw-numeric-spacing: ; --tw-numeric-fraction: ; --tw-ring-inset: ; --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgb(59 130 246 / 0.5); --tw-ring-offset-shadow: 0 0 #0000; --tw-ring-shadow: 0 0 #0000; --tw-shadow: 0 0 #0000; --tw-shadow-colored: 0 0 #0000; --tw-blur: ; --tw-brightness: ; --tw-contrast: ; --tw-grayscale: ; --tw-hue-rotate: ; --tw-invert: ; --tw-saturate: ; --tw-sepia: ; --tw-drop-shadow: ; --tw-backdrop-blur: ; --tw-backdrop-brightness: ; --tw-backdrop-contrast: ; --tw-backdrop-grayscale: ; --tw-backdrop-hue-rotate: ; --tw-backdrop-invert: ; --tw-backdrop-opacity: ; --tw-backdrop-saturate: ; --tw-backdrop-sepia: ; --tw-contain-size: ; --tw-contain-layout: ; --tw-contain-paint: ; --tw-contain-style: ; list-style: none; font-family: &quot;Open Sans&quot;, sans-serif; --tw-text-opacity: 1; color: rgb(31 41 55 / var(--tw-text-opacity));\"><ul></ul></ul></p><ul><li style=\"margin: 0px; padding: 0px 0px 0px 15px; scroll-behavior: smooth; border-width: 0px; border-style: solid; border-color: rgb(229, 231, 235); --tw-border-spacing-x: 0; --tw-border-spacing-y: 0; --tw-translate-x: 0; --tw-translate-y: 0; --tw-rotate: 0; --tw-skew-x: 0; --tw-skew-y: 0; --tw-scale-x: 1; --tw-scale-y: 1; --tw-pan-x: ; --tw-pan-y: ; --tw-pinch-zoom: ; --tw-scroll-snap-strictness: proximity; --tw-gradient-from-position: ; --tw-gradient-via-position: ; --tw-gradient-to-position: ; --tw-ordinal: ; --tw-slashed-zero: ; --tw-numeric-figure: ; --tw-numeric-spacing: ; --tw-numeric-fraction: ; --tw-ring-inset: ; --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgb(59 130 246 / 0.5); --tw-ring-offset-shadow: 0 0 #0000; --tw-ring-shadow: 0 0 #0000; --tw-shadow: 0 0 #0000; --tw-shadow-colored: 0 0 #0000; --tw-blur: ; --tw-brightness: ; --tw-contrast: ; --tw-grayscale: ; --tw-hue-rotate: ; --tw-invert: ; --tw-saturate: ; --tw-sepia: ; --tw-drop-shadow: ; --tw-backdrop-blur: ; --tw-backdrop-brightness: ; --tw-backdrop-contrast: ; --tw-backdrop-grayscale: ; --tw-backdrop-hue-rotate: ; --tw-backdrop-invert: ; --tw-backdrop-opacity: ; --tw-backdrop-saturate: ; --tw-backdrop-sepia: ; --tw-contain-size: ; --tw-contain-layout: ; --tw-contain-paint: ; --tw-contain-style: ; position: relative; font-size: 16px;\"><b>Another way to promote reflection, not perfection</b></li><li style=\"margin: 0px; padding: 0px 0px 0px 15px; scroll-behavior: smooth; border-width: 0px; border-style: solid; border-color: rgb(229, 231, 235); --tw-border-spacing-x: 0; --tw-border-spacing-y: 0; --tw-translate-x: 0; --tw-translate-y: 0; --tw-rotate: 0; --tw-skew-x: 0; --tw-skew-y: 0; --tw-scale-x: 1; --tw-scale-y: 1; --tw-pan-x: ; --tw-pan-y: ; --tw-pinch-zoom: ; --tw-scroll-snap-strictness: proximity; --tw-gradient-from-position: ; --tw-gradient-via-position: ; --tw-gradient-to-position: ; --tw-ordinal: ; --tw-slashed-zero: ; --tw-numeric-figure: ; --tw-numeric-spacing: ; --tw-numeric-fraction: ; --tw-ring-inset: ; --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgb(59 130 246 / 0.5); --tw-ring-offset-shadow: 0 0 #0000; --tw-ring-shadow: 0 0 #0000; --tw-shadow: 0 0 #0000; --tw-shadow-colored: 0 0 #0000; --tw-blur: ; --tw-brightness: ; --tw-contrast: ; --tw-grayscale: ; --tw-hue-rotate: ; --tw-invert: ; --tw-saturate: ; --tw-sepia: ; --tw-drop-shadow: ; --tw-backdrop-blur: ; --tw-backdrop-brightness: ; --tw-backdrop-contrast: ; --tw-backdrop-grayscale: ; --tw-backdrop-hue-rotate: ; --tw-backdrop-invert: ; --tw-backdrop-opacity: ; --tw-backdrop-saturate: ; --tw-backdrop-sepia: ; --tw-contain-size: ; --tw-contain-layout: ; --tw-contain-paint: ; --tw-contain-style: ; position: relative; font-size: 16px;\"><b>This practice will help students think interdependently</b></li><li style=\"margin: 0px; padding: 0px 0px 0px 15px; scroll-behavior: smooth; border-width: 0px; border-style: solid; border-color: rgb(229, 231, 235); --tw-border-spacing-x: 0; --tw-border-spacing-y: 0; --tw-translate-x: 0; --tw-translate-y: 0; --tw-rotate: 0; --tw-skew-x: 0; --tw-skew-y: 0; --tw-scale-x: 1; --tw-scale-y: 1; --tw-pan-x: ; --tw-pan-y: ; --tw-pinch-zoom: ; --tw-scroll-snap-strictness: proximity; --tw-gradient-from-position: ; --tw-gradient-via-position: ; --tw-gradient-to-position: ; --tw-ordinal: ; --tw-slashed-zero: ; --tw-numeric-figure: ; --tw-numeric-spacing: ; --tw-numeric-fraction: ; --tw-ring-inset: ; --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgb(59 130 246 / 0.5); --tw-ring-offset-shadow: 0 0 #0000; --tw-ring-shadow: 0 0 #0000; --tw-shadow: 0 0 #0000; --tw-shadow-colored: 0 0 #0000; --tw-blur: ; --tw-brightness: ; --tw-contrast: ; --tw-grayscale: ; --tw-hue-rotate: ; --tw-invert: ; --tw-saturate: ; --tw-sepia: ; --tw-drop-shadow: ; --tw-backdrop-blur: ; --tw-backdrop-brightness: ; --tw-backdrop-contrast: ; --tw-backdrop-grayscale: ; --tw-backdrop-hue-rotate: ; --tw-backdrop-invert: ; --tw-backdrop-opacity: ; --tw-backdrop-saturate: ; --tw-backdrop-sepia: ; --tw-contain-size: ; --tw-contain-layout: ; --tw-contain-paint: ; --tw-contain-style: ; position: relative; font-size: 16px;\"><b>Self-reflection requires courage and patience</b></li><li style=\"margin: 0px; padding: 0px 0px 0px 15px; scroll-behavior: smooth; border-width: 0px; border-style: solid; border-color: rgb(229, 231, 235); --tw-border-spacing-x: 0; --tw-border-spacing-y: 0; --tw-translate-x: 0; --tw-translate-y: 0; --tw-rotate: 0; --tw-skew-x: 0; --tw-skew-y: 0; --tw-scale-x: 1; --tw-scale-y: 1; --tw-pan-x: ; --tw-pan-y: ; --tw-pinch-zoom: ; --tw-scroll-snap-strictness: proximity; --tw-gradient-from-position: ; --tw-gradient-via-position: ; --tw-gradient-to-position: ; --tw-ordinal: ; --tw-slashed-zero: ; --tw-numeric-figure: ; --tw-numeric-spacing: ; --tw-numeric-fraction: ; --tw-ring-inset: ; --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgb(59 130 246 / 0.5); --tw-ring-offset-shadow: 0 0 #0000; --tw-ring-shadow: 0 0 #0000; --tw-shadow: 0 0 #0000; --tw-shadow-colored: 0 0 #0000; --tw-blur: ; --tw-brightness: ; --tw-contrast: ; --tw-grayscale: ; --tw-hue-rotate: ; --tw-invert: ; --tw-saturate: ; --tw-sepia: ; --tw-drop-shadow: ; --tw-backdrop-blur: ; --tw-backdrop-brightness: ; --tw-backdrop-contrast: ; --tw-backdrop-grayscale: ; --tw-backdrop-hue-rotate: ; --tw-backdrop-invert: ; --tw-backdrop-opacity: ; --tw-backdrop-saturate: ; --tw-backdrop-sepia: ; --tw-contain-size: ; --tw-contain-layout: ; --tw-contain-paint: ; --tw-contain-style: ; position: relative; font-size: 16px;\"><b>Teaching students to be self-reflective will give them a skill</b></li></ul>', 0, '2024-03-24 01:00:35', '2024-04-23 22:33:56'),
(4, 'Graphics Design', 'graphics-design', 'backend/images/course/top_courses_thumb04.jpg', 1, 500, 0, NULL, 48, 8, 25, 140, 0, 1, 1, 0, '<h2 class=\"lg:text-2xl md:text-xl text-lg font-medium text-black\" style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; scroll-behavior: smooth; border-width: 0px; border-style: solid; border-color: rgb(229, 231, 235); --tw-border-spacing-x: 0; --tw-border-spacing-y: 0; --tw-translate-x: 0; --tw-translate-y: 0; --tw-rotate: 0; --tw-skew-x: 0; --tw-skew-y: 0; --tw-scale-x: 1; --tw-scale-y: 1; --tw-pan-x: ; --tw-pan-y: ; --tw-pinch-zoom: ; --tw-scroll-snap-strictness: proximity; --tw-gradient-from-position: ; --tw-gradient-via-position: ; --tw-gradient-to-position: ; --tw-ordinal: ; --tw-slashed-zero: ; --tw-numeric-figure: ; --tw-numeric-spacing: ; --tw-numeric-fraction: ; --tw-ring-inset: ; --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgb(59 130 246 / 0.5); --tw-ring-offset-shadow: 0 0 #0000; --tw-ring-shadow: 0 0 #0000; --tw-shadow: 0 0 #0000; --tw-shadow-colored: 0 0 #0000; --tw-blur: ; --tw-brightness: ; --tw-contrast: ; --tw-grayscale: ; --tw-hue-rotate: ; --tw-invert: ; --tw-saturate: ; --tw-sepia: ; --tw-drop-shadow: ; --tw-backdrop-blur: ; --tw-backdrop-brightness: ; --tw-backdrop-contrast: ; --tw-backdrop-grayscale: ; --tw-backdrop-hue-rotate: ; --tw-backdrop-invert: ; --tw-backdrop-opacity: ; --tw-backdrop-saturate: ; --tw-backdrop-sepia: ; --tw-contain-size: ; --tw-contain-layout: ; --tw-contain-paint: ; --tw-contain-style: ; font-size: 1.5rem; line-height: 2rem; --tw-text-opacity: 1; font-family: Oswald, sans-serif;\"><b>Overview</b></h2><p style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; scroll-behavior: smooth; border-width: 0px; border-style: solid; border-color: rgb(229, 231, 235); --tw-border-spacing-x: 0; --tw-border-spacing-y: 0; --tw-translate-x: 0; --tw-translate-y: 0; --tw-rotate: 0; --tw-skew-x: 0; --tw-skew-y: 0; --tw-scale-x: 1; --tw-scale-y: 1; --tw-pan-x: ; --tw-pan-y: ; --tw-pinch-zoom: ; --tw-scroll-snap-strictness: proximity; --tw-gradient-from-position: ; --tw-gradient-via-position: ; --tw-gradient-to-position: ; --tw-ordinal: ; --tw-slashed-zero: ; --tw-numeric-figure: ; --tw-numeric-spacing: ; --tw-numeric-fraction: ; --tw-ring-inset: ; --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgb(59 130 246 / 0.5); --tw-ring-offset-shadow: 0 0 #0000; --tw-ring-shadow: 0 0 #0000; --tw-shadow: 0 0 #0000; --tw-shadow-colored: 0 0 #0000; --tw-blur: ; --tw-brightness: ; --tw-contrast: ; --tw-grayscale: ; --tw-hue-rotate: ; --tw-invert: ; --tw-saturate: ; --tw-sepia: ; --tw-drop-shadow: ; --tw-backdrop-blur: ; --tw-backdrop-brightness: ; --tw-backdrop-contrast: ; --tw-backdrop-grayscale: ; --tw-backdrop-hue-rotate: ; --tw-backdrop-invert: ; --tw-backdrop-opacity: ; --tw-backdrop-saturate: ; --tw-backdrop-sepia: ; --tw-contain-size: ; --tw-contain-layout: ; --tw-contain-paint: ; --tw-contain-style: ; font-size: 1.5rem; line-height: 2rem; --tw-text-opacity: 1; font-family: Oswald, sans-serif;\">our worldwide annual spend on digital advertising surpassing $325 billion, it’s no surprise that different apches to online marketing are becoming available. One of these new approaches is performance or digital performance marketing. Keep reading to learn all about performance marketing, from how it works to it compares to digital marketing. Plus, get insight into the benefits and risks of performance marketing and how itcan <font color=\"#000000\" style=\"background-color: rgb(255, 255, 0);\">affect your company’s long-term succ</font>ess and profitability. Performance marketing is an approach to digitalmarketing or advertising where businesses only pay when a specific result occurs. This result could be a new lead,sale, or other outcome agreed upon by the advertiser and business. Performance marketing involves channels such as affiliate marketing, online advertising.</p><p style=\"margin: 1.25rem 0px 0px; padding: 0px; scroll-behavior: smooth; border-width: 0px; border-style: solid; border-color: rgb(229, 231, 235); --tw-border-spacing-x: 0; --tw-border-spacing-y: 0; --tw-translate-x: 0; --tw-translate-y: 0; --tw-rotate: 0; --tw-skew-x: 0; --tw-skew-y: 0; --tw-scale-x: 1; --tw-scale-y: 1; --tw-pan-x: ; --tw-pan-y: ; --tw-pinch-zoom: ; --tw-scroll-snap-strictness: proximity; --tw-gradient-from-position: ; --tw-gradient-via-position: ; --tw-gradient-to-position: ; --tw-ordinal: ; --tw-slashed-zero: ; --tw-numeric-figure: ; --tw-numeric-spacing: ; --tw-numeric-fraction: ; --tw-ring-inset: ; --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgb(59 130 246 / 0.5); --tw-ring-offset-shadow: 0 0 #0000; --tw-ring-shadow: 0 0 #0000; --tw-shadow: 0 0 #0000; --tw-shadow-colored: 0 0 #0000; --tw-blur: ; --tw-brightness: ; --tw-contrast: ; --tw-grayscale: ; --tw-hue-rotate: ; --tw-invert: ; --tw-saturate: ; --tw-sepia: ; --tw-drop-shadow: ; --tw-backdrop-blur: ; --tw-backdrop-brightness: ; --tw-backdrop-contrast: ; --tw-backdrop-grayscale: ; --tw-backdrop-hue-rotate: ; --tw-backdrop-invert: ; --tw-backdrop-opacity: ; --tw-backdrop-saturate: ; --tw-backdrop-sepia: ; --tw-contain-size: ; --tw-contain-layout: ; --tw-contain-paint: ; --tw-contain-style: ; color: rgb(0, 0, 0); font-family: Oswald, sans-serif; font-size: medium;\"></p><p style=\"margin: 1.25rem 0px 0px; padding: 0px; scroll-behavior: smooth; border-width: 0px; border-style: solid; border-color: rgb(229, 231, 235); --tw-border-spacing-x: 0; --tw-border-spacing-y: 0; --tw-translate-x: 0; --tw-translate-y: 0; --tw-rotate: 0; --tw-skew-x: 0; --tw-skew-y: 0; --tw-scale-x: 1; --tw-scale-y: 1; --tw-pan-x: ; --tw-pan-y: ; --tw-pinch-zoom: ; --tw-scroll-snap-strictness: proximity; --tw-gradient-from-position: ; --tw-gradient-via-position: ; --tw-gradient-to-position: ; --tw-ordinal: ; --tw-slashed-zero: ; --tw-numeric-figure: ; --tw-numeric-spacing: ; --tw-numeric-fraction: ; --tw-ring-inset: ; --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgb(59 130 246 / 0.5); --tw-ring-offset-shadow: 0 0 #0000; --tw-ring-shadow: 0 0 #0000; --tw-shadow: 0 0 #0000; --tw-shadow-colored: 0 0 #0000; --tw-blur: ; --tw-brightness: ; --tw-contrast: ; --tw-grayscale: ; --tw-hue-rotate: ; --tw-invert: ; --tw-saturate: ; --tw-sepia: ; --tw-drop-shadow: ; --tw-backdrop-blur: ; --tw-backdrop-brightness: ; --tw-backdrop-contrast: ; --tw-backdrop-grayscale: ; --tw-backdrop-hue-rotate: ; --tw-backdrop-invert: ; --tw-backdrop-opacity: ; --tw-backdrop-saturate: ; --tw-backdrop-sepia: ; --tw-contain-size: ; --tw-contain-layout: ; --tw-contain-paint: ; --tw-contain-style: ; color: rgb(0, 0, 0); font-family: Oswald, sans-serif; font-size: medium;\"><ul class=\"overview-features mt-8 text-gray-800 font-open-sans font-medium\" style=\"margin: 2rem 0px 0px; padding: 0px; scroll-behavior: smooth; border-width: 0px; border-style: solid; border-color: rgb(229, 231, 235); --tw-border-spacing-x: 0; --tw-border-spacing-y: 0; --tw-translate-x: 0; --tw-translate-y: 0; --tw-rotate: 0; --tw-skew-x: 0; --tw-skew-y: 0; --tw-scale-x: 1; --tw-scale-y: 1; --tw-pan-x: ; --tw-pan-y: ; --tw-pinch-zoom: ; --tw-scroll-snap-strictness: proximity; --tw-gradient-from-position: ; --tw-gradient-via-position: ; --tw-gradient-to-position: ; --tw-ordinal: ; --tw-slashed-zero: ; --tw-numeric-figure: ; --tw-numeric-spacing: ; --tw-numeric-fraction: ; --tw-ring-inset: ; --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgb(59 130 246 / 0.5); --tw-ring-offset-shadow: 0 0 #0000; --tw-ring-shadow: 0 0 #0000; --tw-shadow: 0 0 #0000; --tw-shadow-colored: 0 0 #0000; --tw-blur: ; --tw-brightness: ; --tw-contrast: ; --tw-grayscale: ; --tw-hue-rotate: ; --tw-invert: ; --tw-saturate: ; --tw-sepia: ; --tw-drop-shadow: ; --tw-backdrop-blur: ; --tw-backdrop-brightness: ; --tw-backdrop-contrast: ; --tw-backdrop-grayscale: ; --tw-backdrop-hue-rotate: ; --tw-backdrop-invert: ; --tw-backdrop-opacity: ; --tw-backdrop-saturate: ; --tw-backdrop-sepia: ; --tw-contain-size: ; --tw-contain-layout: ; --tw-contain-paint: ; --tw-contain-style: ; list-style: none; font-family: &quot;Open Sans&quot;, sans-serif; --tw-text-opacity: 1; color: rgb(31 41 55 / var(--tw-text-opacity));\"><ul></ul></ul></p><ul><li style=\"margin: 0px; padding: 0px 0px 0px 15px; scroll-behavior: smooth; border-width: 0px; border-style: solid; border-color: rgb(229, 231, 235); --tw-border-spacing-x: 0; --tw-border-spacing-y: 0; --tw-translate-x: 0; --tw-translate-y: 0; --tw-rotate: 0; --tw-skew-x: 0; --tw-skew-y: 0; --tw-scale-x: 1; --tw-scale-y: 1; --tw-pan-x: ; --tw-pan-y: ; --tw-pinch-zoom: ; --tw-scroll-snap-strictness: proximity; --tw-gradient-from-position: ; --tw-gradient-via-position: ; --tw-gradient-to-position: ; --tw-ordinal: ; --tw-slashed-zero: ; --tw-numeric-figure: ; --tw-numeric-spacing: ; --tw-numeric-fraction: ; --tw-ring-inset: ; --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgb(59 130 246 / 0.5); --tw-ring-offset-shadow: 0 0 #0000; --tw-ring-shadow: 0 0 #0000; --tw-shadow: 0 0 #0000; --tw-shadow-colored: 0 0 #0000; --tw-blur: ; --tw-brightness: ; --tw-contrast: ; --tw-grayscale: ; --tw-hue-rotate: ; --tw-invert: ; --tw-saturate: ; --tw-sepia: ; --tw-drop-shadow: ; --tw-backdrop-blur: ; --tw-backdrop-brightness: ; --tw-backdrop-contrast: ; --tw-backdrop-grayscale: ; --tw-backdrop-hue-rotate: ; --tw-backdrop-invert: ; --tw-backdrop-opacity: ; --tw-backdrop-saturate: ; --tw-backdrop-sepia: ; --tw-contain-size: ; --tw-contain-layout: ; --tw-contain-paint: ; --tw-contain-style: ; position: relative; font-size: 16px;\"><b>Another way to promote reflection, not perfection</b></li><li style=\"margin: 0px; padding: 0px 0px 0px 15px; scroll-behavior: smooth; border-width: 0px; border-style: solid; border-color: rgb(229, 231, 235); --tw-border-spacing-x: 0; --tw-border-spacing-y: 0; --tw-translate-x: 0; --tw-translate-y: 0; --tw-rotate: 0; --tw-skew-x: 0; --tw-skew-y: 0; --tw-scale-x: 1; --tw-scale-y: 1; --tw-pan-x: ; --tw-pan-y: ; --tw-pinch-zoom: ; --tw-scroll-snap-strictness: proximity; --tw-gradient-from-position: ; --tw-gradient-via-position: ; --tw-gradient-to-position: ; --tw-ordinal: ; --tw-slashed-zero: ; --tw-numeric-figure: ; --tw-numeric-spacing: ; --tw-numeric-fraction: ; --tw-ring-inset: ; --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgb(59 130 246 / 0.5); --tw-ring-offset-shadow: 0 0 #0000; --tw-ring-shadow: 0 0 #0000; --tw-shadow: 0 0 #0000; --tw-shadow-colored: 0 0 #0000; --tw-blur: ; --tw-brightness: ; --tw-contrast: ; --tw-grayscale: ; --tw-hue-rotate: ; --tw-invert: ; --tw-saturate: ; --tw-sepia: ; --tw-drop-shadow: ; --tw-backdrop-blur: ; --tw-backdrop-brightness: ; --tw-backdrop-contrast: ; --tw-backdrop-grayscale: ; --tw-backdrop-hue-rotate: ; --tw-backdrop-invert: ; --tw-backdrop-opacity: ; --tw-backdrop-saturate: ; --tw-backdrop-sepia: ; --tw-contain-size: ; --tw-contain-layout: ; --tw-contain-paint: ; --tw-contain-style: ; position: relative; font-size: 16px;\"><b>This practice will help students think interdependently</b></li><li style=\"margin: 0px; padding: 0px 0px 0px 15px; scroll-behavior: smooth; border-width: 0px; border-style: solid; border-color: rgb(229, 231, 235); --tw-border-spacing-x: 0; --tw-border-spacing-y: 0; --tw-translate-x: 0; --tw-translate-y: 0; --tw-rotate: 0; --tw-skew-x: 0; --tw-skew-y: 0; --tw-scale-x: 1; --tw-scale-y: 1; --tw-pan-x: ; --tw-pan-y: ; --tw-pinch-zoom: ; --tw-scroll-snap-strictness: proximity; --tw-gradient-from-position: ; --tw-gradient-via-position: ; --tw-gradient-to-position: ; --tw-ordinal: ; --tw-slashed-zero: ; --tw-numeric-figure: ; --tw-numeric-spacing: ; --tw-numeric-fraction: ; --tw-ring-inset: ; --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgb(59 130 246 / 0.5); --tw-ring-offset-shadow: 0 0 #0000; --tw-ring-shadow: 0 0 #0000; --tw-shadow: 0 0 #0000; --tw-shadow-colored: 0 0 #0000; --tw-blur: ; --tw-brightness: ; --tw-contrast: ; --tw-grayscale: ; --tw-hue-rotate: ; --tw-invert: ; --tw-saturate: ; --tw-sepia: ; --tw-drop-shadow: ; --tw-backdrop-blur: ; --tw-backdrop-brightness: ; --tw-backdrop-contrast: ; --tw-backdrop-grayscale: ; --tw-backdrop-hue-rotate: ; --tw-backdrop-invert: ; --tw-backdrop-opacity: ; --tw-backdrop-saturate: ; --tw-backdrop-sepia: ; --tw-contain-size: ; --tw-contain-layout: ; --tw-contain-paint: ; --tw-contain-style: ; position: relative; font-size: 16px;\"><b>Self-reflection requires courage and patience</b></li><li style=\"margin: 0px; padding: 0px 0px 0px 15px; scroll-behavior: smooth; border-width: 0px; border-style: solid; border-color: rgb(229, 231, 235); --tw-border-spacing-x: 0; --tw-border-spacing-y: 0; --tw-translate-x: 0; --tw-translate-y: 0; --tw-rotate: 0; --tw-skew-x: 0; --tw-skew-y: 0; --tw-scale-x: 1; --tw-scale-y: 1; --tw-pan-x: ; --tw-pan-y: ; --tw-pinch-zoom: ; --tw-scroll-snap-strictness: proximity; --tw-gradient-from-position: ; --tw-gradient-via-position: ; --tw-gradient-to-position: ; --tw-ordinal: ; --tw-slashed-zero: ; --tw-numeric-figure: ; --tw-numeric-spacing: ; --tw-numeric-fraction: ; --tw-ring-inset: ; --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgb(59 130 246 / 0.5); --tw-ring-offset-shadow: 0 0 #0000; --tw-ring-shadow: 0 0 #0000; --tw-shadow: 0 0 #0000; --tw-shadow-colored: 0 0 #0000; --tw-blur: ; --tw-brightness: ; --tw-contrast: ; --tw-grayscale: ; --tw-hue-rotate: ; --tw-invert: ; --tw-saturate: ; --tw-sepia: ; --tw-drop-shadow: ; --tw-backdrop-blur: ; --tw-backdrop-brightness: ; --tw-backdrop-contrast: ; --tw-backdrop-grayscale: ; --tw-backdrop-hue-rotate: ; --tw-backdrop-invert: ; --tw-backdrop-opacity: ; --tw-backdrop-saturate: ; --tw-backdrop-sepia: ; --tw-contain-size: ; --tw-contain-layout: ; --tw-contain-paint: ; --tw-contain-style: ; position: relative; font-size: 16px;\"><b>Teaching students to be self-reflective will give them a skill</b></li></ul>', 0, '2024-03-29 23:31:17', '2024-04-23 07:03:00');
INSERT INTO `courses` (`id`, `name`, `slug`, `image`, `priority`, `course_fee`, `discount`, `discount_fee`, `total_video`, `total_hours`, `total_sheet`, `total_mcq`, `teacher_id`, `course_view`, `course_type`, `status`, `description`, `branch_id`, `created_at`, `updated_at`) VALUES
(5, 'Complete Office Application Program', 'complete-office-application-program', 'backend/images/course/top_courses_thumb06.jpg', 4, 1200, 80, 1120, 48, 8, 25, 140, 0, 1, 1, 1, '<p style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; scroll-behavior: smooth; border-width: 0px; border-style: solid; border-color: rgb(229, 231, 235); --tw-border-spacing-x: 0; --tw-border-spacing-y: 0; --tw-translate-x: 0; --tw-translate-y: 0; --tw-rotate: 0; --tw-skew-x: 0; --tw-skew-y: 0; --tw-scale-x: 1; --tw-scale-y: 1; --tw-pan-x: ; --tw-pan-y: ; --tw-pinch-zoom: ; --tw-scroll-snap-strictness: proximity; --tw-gradient-from-position: ; --tw-gradient-via-position: ; --tw-gradient-to-position: ; --tw-ordinal: ; --tw-slashed-zero: ; --tw-numeric-figure: ; --tw-numeric-spacing: ; --tw-numeric-fraction: ; --tw-ring-inset: ; --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgb(59 130 246 / 0.5); --tw-ring-offset-shadow: 0 0 #0000; --tw-ring-shadow: 0 0 #0000; --tw-shadow: 0 0 #0000; --tw-shadow-colored: 0 0 #0000; --tw-blur: ; --tw-brightness: ; --tw-contrast: ; --tw-grayscale: ; --tw-hue-rotate: ; --tw-invert: ; --tw-saturate: ; --tw-sepia: ; --tw-drop-shadow: ; --tw-backdrop-blur: ; --tw-backdrop-brightness: ; --tw-backdrop-contrast: ; --tw-backdrop-grayscale: ; --tw-backdrop-hue-rotate: ; --tw-backdrop-invert: ; --tw-backdrop-opacity: ; --tw-backdrop-saturate: ; --tw-backdrop-sepia: ; --tw-contain-size: ; --tw-contain-layout: ; --tw-contain-paint: ; --tw-contain-style: ; font-size: 1.5rem; line-height: 2rem; --tw-text-opacity: 1; font-family: Oswald, sans-serif;\"><b>Overview</b></p><h2 class=\"lg:text-2xl md:text-xl text-lg font-medium text-black\" style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; scroll-behavior: smooth; border-width: 0px; border-style: solid; border-color: rgb(229, 231, 235); --tw-border-spacing-x: 0; --tw-border-spacing-y: 0; --tw-translate-x: 0; --tw-translate-y: 0; --tw-rotate: 0; --tw-skew-x: 0; --tw-skew-y: 0; --tw-scale-x: 1; --tw-scale-y: 1; --tw-pan-x: ; --tw-pan-y: ; --tw-pinch-zoom: ; --tw-scroll-snap-strictness: proximity; --tw-gradient-from-position: ; --tw-gradient-via-position: ; --tw-gradient-to-position: ; --tw-ordinal: ; --tw-slashed-zero: ; --tw-numeric-figure: ; --tw-numeric-spacing: ; --tw-numeric-fraction: ; --tw-ring-inset: ; --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgb(59 130 246 / 0.5); --tw-ring-offset-shadow: 0 0 #0000; --tw-ring-shadow: 0 0 #0000; --tw-shadow: 0 0 #0000; --tw-shadow-colored: 0 0 #0000; --tw-blur: ; --tw-brightness: ; --tw-contrast: ; --tw-grayscale: ; --tw-hue-rotate: ; --tw-invert: ; --tw-saturate: ; --tw-sepia: ; --tw-drop-shadow: ; --tw-backdrop-blur: ; --tw-backdrop-brightness: ; --tw-backdrop-contrast: ; --tw-backdrop-grayscale: ; --tw-backdrop-hue-rotate: ; --tw-backdrop-invert: ; --tw-backdrop-opacity: ; --tw-backdrop-saturate: ; --tw-backdrop-sepia: ; --tw-contain-size: ; --tw-contain-layout: ; --tw-contain-paint: ; --tw-contain-style: ; font-size: 1.5rem; line-height: 2rem; --tw-text-opacity: 1; font-family: Oswald, sans-serif;\">our worldwide annual spend on digital advertising surpassing $325 billion, it’s no surprise that different apches to online marketing are becoming available. One of these new approaches is performance or digital performance marketing. Keep reading to learn all about <font color=\"#000000\" style=\"background-color: rgb(255, 255, 0);\">performance marketing,</font> from how it works to it compares to digital marketing. Plus, get insight into the benefits and risks of performance marketing and how itcan affect your company’s long-term success and profitability. Performance marketing is an approach to digitalmarketing or advertising where businesses only pay when a specific result occurs. This result could be a new lead,sale, or other outcome agreed upon by the advertiser and business. <font style=\"background-color: rgb(255, 255, 0);\" color=\"#e79439\">Performance marketing </font>involves channels such as affiliate marketing, online advertising.</h2><p style=\"margin: 1.25rem 0px 0px; padding: 0px; scroll-behavior: smooth; border-width: 0px; border-style: solid; border-color: rgb(229, 231, 235); --tw-border-spacing-x: 0; --tw-border-spacing-y: 0; --tw-translate-x: 0; --tw-translate-y: 0; --tw-rotate: 0; --tw-skew-x: 0; --tw-skew-y: 0; --tw-scale-x: 1; --tw-scale-y: 1; --tw-pan-x: ; --tw-pan-y: ; --tw-pinch-zoom: ; --tw-scroll-snap-strictness: proximity; --tw-gradient-from-position: ; --tw-gradient-via-position: ; --tw-gradient-to-position: ; --tw-ordinal: ; --tw-slashed-zero: ; --tw-numeric-figure: ; --tw-numeric-spacing: ; --tw-numeric-fraction: ; --tw-ring-inset: ; --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgb(59 130 246 / 0.5); --tw-ring-offset-shadow: 0 0 #0000; --tw-ring-shadow: 0 0 #0000; --tw-shadow: 0 0 #0000; --tw-shadow-colored: 0 0 #0000; --tw-blur: ; --tw-brightness: ; --tw-contrast: ; --tw-grayscale: ; --tw-hue-rotate: ; --tw-invert: ; --tw-saturate: ; --tw-sepia: ; --tw-drop-shadow: ; --tw-backdrop-blur: ; --tw-backdrop-brightness: ; --tw-backdrop-contrast: ; --tw-backdrop-grayscale: ; --tw-backdrop-hue-rotate: ; --tw-backdrop-invert: ; --tw-backdrop-opacity: ; --tw-backdrop-saturate: ; --tw-backdrop-sepia: ; --tw-contain-size: ; --tw-contain-layout: ; --tw-contain-paint: ; --tw-contain-style: ; color: rgb(0, 0, 0); font-family: Oswald, sans-serif; font-size: medium;\"></p><p style=\"margin: 1.25rem 0px 0px; padding: 0px; scroll-behavior: smooth; border-width: 0px; border-style: solid; border-color: rgb(229, 231, 235); --tw-border-spacing-x: 0; --tw-border-spacing-y: 0; --tw-translate-x: 0; --tw-translate-y: 0; --tw-rotate: 0; --tw-skew-x: 0; --tw-skew-y: 0; --tw-scale-x: 1; --tw-scale-y: 1; --tw-pan-x: ; --tw-pan-y: ; --tw-pinch-zoom: ; --tw-scroll-snap-strictness: proximity; --tw-gradient-from-position: ; --tw-gradient-via-position: ; --tw-gradient-to-position: ; --tw-ordinal: ; --tw-slashed-zero: ; --tw-numeric-figure: ; --tw-numeric-spacing: ; --tw-numeric-fraction: ; --tw-ring-inset: ; --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgb(59 130 246 / 0.5); --tw-ring-offset-shadow: 0 0 #0000; --tw-ring-shadow: 0 0 #0000; --tw-shadow: 0 0 #0000; --tw-shadow-colored: 0 0 #0000; --tw-blur: ; --tw-brightness: ; --tw-contrast: ; --tw-grayscale: ; --tw-hue-rotate: ; --tw-invert: ; --tw-saturate: ; --tw-sepia: ; --tw-drop-shadow: ; --tw-backdrop-blur: ; --tw-backdrop-brightness: ; --tw-backdrop-contrast: ; --tw-backdrop-grayscale: ; --tw-backdrop-hue-rotate: ; --tw-backdrop-invert: ; --tw-backdrop-opacity: ; --tw-backdrop-saturate: ; --tw-backdrop-sepia: ; --tw-contain-size: ; --tw-contain-layout: ; --tw-contain-paint: ; --tw-contain-style: ; color: rgb(0, 0, 0); font-family: Oswald, sans-serif; font-size: medium;\"><ul class=\"overview-features mt-8 text-gray-800 font-open-sans font-medium\" style=\"margin: 2rem 0px 0px; padding: 0px; scroll-behavior: smooth; border-width: 0px; border-style: solid; border-color: rgb(229, 231, 235); --tw-border-spacing-x: 0; --tw-border-spacing-y: 0; --tw-translate-x: 0; --tw-translate-y: 0; --tw-rotate: 0; --tw-skew-x: 0; --tw-skew-y: 0; --tw-scale-x: 1; --tw-scale-y: 1; --tw-pan-x: ; --tw-pan-y: ; --tw-pinch-zoom: ; --tw-scroll-snap-strictness: proximity; --tw-gradient-from-position: ; --tw-gradient-via-position: ; --tw-gradient-to-position: ; --tw-ordinal: ; --tw-slashed-zero: ; --tw-numeric-figure: ; --tw-numeric-spacing: ; --tw-numeric-fraction: ; --tw-ring-inset: ; --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgb(59 130 246 / 0.5); --tw-ring-offset-shadow: 0 0 #0000; --tw-ring-shadow: 0 0 #0000; --tw-shadow: 0 0 #0000; --tw-shadow-colored: 0 0 #0000; --tw-blur: ; --tw-brightness: ; --tw-contrast: ; --tw-grayscale: ; --tw-hue-rotate: ; --tw-invert: ; --tw-saturate: ; --tw-sepia: ; --tw-drop-shadow: ; --tw-backdrop-blur: ; --tw-backdrop-brightness: ; --tw-backdrop-contrast: ; --tw-backdrop-grayscale: ; --tw-backdrop-hue-rotate: ; --tw-backdrop-invert: ; --tw-backdrop-opacity: ; --tw-backdrop-saturate: ; --tw-backdrop-sepia: ; --tw-contain-size: ; --tw-contain-layout: ; --tw-contain-paint: ; --tw-contain-style: ; list-style: none; font-family: &quot;Open Sans&quot;, sans-serif; --tw-text-opacity: 1; color: rgb(31 41 55 / var(--tw-text-opacity));\"><ul></ul></ul></p><ul><li style=\"margin: 0px; padding: 0px 0px 0px 15px; scroll-behavior: smooth; border-width: 0px; border-style: solid; border-color: rgb(229, 231, 235); --tw-border-spacing-x: 0; --tw-border-spacing-y: 0; --tw-translate-x: 0; --tw-translate-y: 0; --tw-rotate: 0; --tw-skew-x: 0; --tw-skew-y: 0; --tw-scale-x: 1; --tw-scale-y: 1; --tw-pan-x: ; --tw-pan-y: ; --tw-pinch-zoom: ; --tw-scroll-snap-strictness: proximity; --tw-gradient-from-position: ; --tw-gradient-via-position: ; --tw-gradient-to-position: ; --tw-ordinal: ; --tw-slashed-zero: ; --tw-numeric-figure: ; --tw-numeric-spacing: ; --tw-numeric-fraction: ; --tw-ring-inset: ; --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgb(59 130 246 / 0.5); --tw-ring-offset-shadow: 0 0 #0000; --tw-ring-shadow: 0 0 #0000; --tw-shadow: 0 0 #0000; --tw-shadow-colored: 0 0 #0000; --tw-blur: ; --tw-brightness: ; --tw-contrast: ; --tw-grayscale: ; --tw-hue-rotate: ; --tw-invert: ; --tw-saturate: ; --tw-sepia: ; --tw-drop-shadow: ; --tw-backdrop-blur: ; --tw-backdrop-brightness: ; --tw-backdrop-contrast: ; --tw-backdrop-grayscale: ; --tw-backdrop-hue-rotate: ; --tw-backdrop-invert: ; --tw-backdrop-opacity: ; --tw-backdrop-saturate: ; --tw-backdrop-sepia: ; --tw-contain-size: ; --tw-contain-layout: ; --tw-contain-paint: ; --tw-contain-style: ; position: relative; font-size: 16px;\">Another way to promote reflection, not perfection</li><li style=\"margin: 0px; padding: 0px 0px 0px 15px; scroll-behavior: smooth; border-width: 0px; border-style: solid; border-color: rgb(229, 231, 235); --tw-border-spacing-x: 0; --tw-border-spacing-y: 0; --tw-translate-x: 0; --tw-translate-y: 0; --tw-rotate: 0; --tw-skew-x: 0; --tw-skew-y: 0; --tw-scale-x: 1; --tw-scale-y: 1; --tw-pan-x: ; --tw-pan-y: ; --tw-pinch-zoom: ; --tw-scroll-snap-strictness: proximity; --tw-gradient-from-position: ; --tw-gradient-via-position: ; --tw-gradient-to-position: ; --tw-ordinal: ; --tw-slashed-zero: ; --tw-numeric-figure: ; --tw-numeric-spacing: ; --tw-numeric-fraction: ; --tw-ring-inset: ; --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgb(59 130 246 / 0.5); --tw-ring-offset-shadow: 0 0 #0000; --tw-ring-shadow: 0 0 #0000; --tw-shadow: 0 0 #0000; --tw-shadow-colored: 0 0 #0000; --tw-blur: ; --tw-brightness: ; --tw-contrast: ; --tw-grayscale: ; --tw-hue-rotate: ; --tw-invert: ; --tw-saturate: ; --tw-sepia: ; --tw-drop-shadow: ; --tw-backdrop-blur: ; --tw-backdrop-brightness: ; --tw-backdrop-contrast: ; --tw-backdrop-grayscale: ; --tw-backdrop-hue-rotate: ; --tw-backdrop-invert: ; --tw-backdrop-opacity: ; --tw-backdrop-saturate: ; --tw-backdrop-sepia: ; --tw-contain-size: ; --tw-contain-layout: ; --tw-contain-paint: ; --tw-contain-style: ; position: relative; font-size: 16px;\">This practice will help students think interdependently</li><li style=\"margin: 0px; padding: 0px 0px 0px 15px; scroll-behavior: smooth; border-width: 0px; border-style: solid; border-color: rgb(229, 231, 235); --tw-border-spacing-x: 0; --tw-border-spacing-y: 0; --tw-translate-x: 0; --tw-translate-y: 0; --tw-rotate: 0; --tw-skew-x: 0; --tw-skew-y: 0; --tw-scale-x: 1; --tw-scale-y: 1; --tw-pan-x: ; --tw-pan-y: ; --tw-pinch-zoom: ; --tw-scroll-snap-strictness: proximity; --tw-gradient-from-position: ; --tw-gradient-via-position: ; --tw-gradient-to-position: ; --tw-ordinal: ; --tw-slashed-zero: ; --tw-numeric-figure: ; --tw-numeric-spacing: ; --tw-numeric-fraction: ; --tw-ring-inset: ; --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgb(59 130 246 / 0.5); --tw-ring-offset-shadow: 0 0 #0000; --tw-ring-shadow: 0 0 #0000; --tw-shadow: 0 0 #0000; --tw-shadow-colored: 0 0 #0000; --tw-blur: ; --tw-brightness: ; --tw-contrast: ; --tw-grayscale: ; --tw-hue-rotate: ; --tw-invert: ; --tw-saturate: ; --tw-sepia: ; --tw-drop-shadow: ; --tw-backdrop-blur: ; --tw-backdrop-brightness: ; --tw-backdrop-contrast: ; --tw-backdrop-grayscale: ; --tw-backdrop-hue-rotate: ; --tw-backdrop-invert: ; --tw-backdrop-opacity: ; --tw-backdrop-saturate: ; --tw-backdrop-sepia: ; --tw-contain-size: ; --tw-contain-layout: ; --tw-contain-paint: ; --tw-contain-style: ; position: relative; font-size: 16px;\">Self-reflection requires courage and patience</li><li style=\"margin: 0px; padding: 0px 0px 0px 15px; scroll-behavior: smooth; border-width: 0px; border-style: solid; border-color: rgb(229, 231, 235); --tw-border-spacing-x: 0; --tw-border-spacing-y: 0; --tw-translate-x: 0; --tw-translate-y: 0; --tw-rotate: 0; --tw-skew-x: 0; --tw-skew-y: 0; --tw-scale-x: 1; --tw-scale-y: 1; --tw-pan-x: ; --tw-pan-y: ; --tw-pinch-zoom: ; --tw-scroll-snap-strictness: proximity; --tw-gradient-from-position: ; --tw-gradient-via-position: ; --tw-gradient-to-position: ; --tw-ordinal: ; --tw-slashed-zero: ; --tw-numeric-figure: ; --tw-numeric-spacing: ; --tw-numeric-fraction: ; --tw-ring-inset: ; --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgb(59 130 246 / 0.5); --tw-ring-offset-shadow: 0 0 #0000; --tw-ring-shadow: 0 0 #0000; --tw-shadow: 0 0 #0000; --tw-shadow-colored: 0 0 #0000; --tw-blur: ; --tw-brightness: ; --tw-contrast: ; --tw-grayscale: ; --tw-hue-rotate: ; --tw-invert: ; --tw-saturate: ; --tw-sepia: ; --tw-drop-shadow: ; --tw-backdrop-blur: ; --tw-backdrop-brightness: ; --tw-backdrop-contrast: ; --tw-backdrop-grayscale: ; --tw-backdrop-hue-rotate: ; --tw-backdrop-invert: ; --tw-backdrop-opacity: ; --tw-backdrop-saturate: ; --tw-backdrop-sepia: ; --tw-contain-size: ; --tw-contain-layout: ; --tw-contain-paint: ; --tw-contain-style: ; position: relative; font-size: 16px;\">Teaching students to be self-reflective will give them a skill</li></ul>', 0, '2024-03-29 23:36:46', '2024-04-01 03:59:35');

-- --------------------------------------------------------

--
-- Table structure for table `course_details`
--

CREATE TABLE `course_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `header_title` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `course_id` int(11) NOT NULL,
  `type` int(11) DEFAULT 0 COMMENT '0=>no_video,1=>youtube_link,2=>upload_video',
  `url_video` varchar(255) DEFAULT NULL,
  `upload_video` varchar(255) DEFAULT NULL,
  `pdf` varchar(255) DEFAULT NULL,
  `priority` varchar(255) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `description` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `course_details`
--

INSERT INTO `course_details` (`id`, `header_title`, `title`, `course_id`, `type`, `url_video`, `upload_video`, `pdf`, `priority`, `status`, `description`, `created_at`, `updated_at`) VALUES
(1, 'lession one', 'Getting Unsupported image type', 1, 1, 'https://www.youtube.com/watch?v=f4EuOXlA98w', 'backend/videos/coursevideo/1711260726.mp4', 'backend/pdf/coursepdf/1711260726.pdf', '1', 1, 'qwrfgtuyhjl.', '2024-03-24 00:12:06', '2024-03-31 02:22:51'),
(3, 'Justin Vance', 'Kaye Cummings', 3, 2, 'https://youtu.be/bmh13SFG6RM?si=N4YNiidzvwwcoPr8', 'backend/videos/coursevideo/1711274328.mp4', '', '8', 1, 'Libero sit dolores', '2024-03-24 01:01:27', '2024-03-24 03:58:48'),
(4, 'Test', 'Test', 5, 1, 'https://www.youtube.com/watch?v=nxcr2X0Wwhw', '', 'backend/pdf/coursepdf/1712040959.jpg', '1', 0, '<p>asfdasd</p>', '2024-04-02 00:55:59', '2024-04-23 07:03:28');

-- --------------------------------------------------------

--
-- Table structure for table `districts`
--

CREATE TABLE `districts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `priority` int(255) DEFAULT NULL,
  `status` int(11) DEFAULT 1,
  `division_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `divisions`
--

CREATE TABLE `divisions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `priority` int(255) DEFAULT NULL,
  `status` int(11) DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `divisions`
--

INSERT INTO `divisions` (`id`, `name`, `priority`, `status`, `created_at`, `updated_at`) VALUES
(6, 'Dhaka', 2, 0, '2024-03-20 03:45:18', '2024-04-23 04:20:05');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `image` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL,
  `time` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `short_description` varchar(255) NOT NULL,
  `description` mediumtext NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `title`, `slug`, `image`, `date`, `time`, `location`, `short_description`, `description`, `created_at`, `updated_at`) VALUES
(2, 'CONVOCATION FOR GRADUTE STUDENTS', 'convocation-for-gradute-students', 'backend/images/event/images.jfif', '2024-04-02', '00:42', 'Uttara , Dhaka', 'Lorem, ipsum dolor sit amet consectetur adipisicing elit.', '<p><span style=\"color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, sans-serif; font-size: medium;\">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Suscipit iusto a aperiam accusantium laborum molestiae porro exercitationem atque doloribus, eius fugiat odio similique error itaque omnis quam? Odio voluptatum doloremque praesentium quibusdam impedit quia, non labore expedita quisquam sint possimus illum aliquam in eum sequi itaque obcaecati</span><span style=\"font-family: &quot;Open Sans&quot;, sans-serif; font-size: medium; background-color: rgb(255, 255, 0);\"><font color=\"#000000\"> corrupti architecto la</font></span><span style=\"color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, sans-serif; font-size: medium;\">udantium. Lorem ipsum dolor sit amet consectetur adipisicing elit. Saepe eligendi quibusdam corrupti debitis repudiandae dolores vero impedit? Quasi in veritatis qui modi nemo minus totam, voluptatem voluptate ut,</span><br style=\"margin: 0px; padding: 0px; scroll-behavior: smooth; border-width: 0px; border-style: solid; border-color: rgb(229, 231, 235); --tw-border-spacing-x: 0; --tw-border-spacing-y: 0; --tw-translate-x: 0; --tw-translate-y: 0; --tw-rotate: 0; --tw-skew-x: 0; --tw-skew-y: 0; --tw-scale-x: 1; --tw-scale-y: 1; --tw-pan-x: ; --tw-pan-y: ; --tw-pinch-zoom: ; --tw-scroll-snap-strictness: proximity; --tw-gradient-from-position: ; --tw-gradient-via-position: ; --tw-gradient-to-position: ; --tw-ordinal: ; --tw-slashed-zero: ; --tw-numeric-figure: ; --tw-numeric-spacing: ; --tw-numeric-fraction: ; --tw-ring-inset: ; --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgb(59 130 246 / 0.5); --tw-ring-offset-shadow: 0 0 #0000; --tw-ring-shadow: 0 0 #0000; --tw-shadow: 0 0 #0000; --tw-shadow-colored: 0 0 #0000; --tw-blur: ; --tw-brightness: ; --tw-contrast: ; --tw-grayscale: ; --tw-hue-rotate: ; --tw-invert: ; --tw-saturate: ; --tw-sepia: ; --tw-drop-shadow: ; --tw-backdrop-blur: ; --tw-backdrop-brightness: ; --tw-backdrop-contrast: ; --tw-backdrop-grayscale: ; --tw-backdrop-hue-rotate: ; --tw-backdrop-invert: ; --tw-backdrop-opacity: ; --tw-backdrop-saturate: ; --tw-backdrop-sepia: ; --tw-contain-size: ; --tw-contain-layout: ; --tw-contain-paint: ; --tw-contain-style: ; color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, sans-serif; font-size: medium;\"><br style=\"margin: 0px; padding: 0px; scroll-behavior: smooth; border-width: 0px; border-style: solid; border-color: rgb(229, 231, 235); --tw-border-spacing-x: 0; --tw-border-spacing-y: 0; --tw-translate-x: 0; --tw-translate-y: 0; --tw-rotate: 0; --tw-skew-x: 0; --tw-skew-y: 0; --tw-scale-x: 1; --tw-scale-y: 1; --tw-pan-x: ; --tw-pan-y: ; --tw-pinch-zoom: ; --tw-scroll-snap-strictness: proximity; --tw-gradient-from-position: ; --tw-gradient-via-position: ; --tw-gradient-to-position: ; --tw-ordinal: ; --tw-slashed-zero: ; --tw-numeric-figure: ; --tw-numeric-spacing: ; --tw-numeric-fraction: ; --tw-ring-inset: ; --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgb(59 130 246 / 0.5); --tw-ring-offset-shadow: 0 0 #0000; --tw-ring-shadow: 0 0 #0000; --tw-shadow: 0 0 #0000; --tw-shadow-colored: 0 0 #0000; --tw-blur: ; --tw-brightness: ; --tw-contrast: ; --tw-grayscale: ; --tw-hue-rotate: ; --tw-invert: ; --tw-saturate: ; --tw-sepia: ; --tw-drop-shadow: ; --tw-backdrop-blur: ; --tw-backdrop-brightness: ; --tw-backdrop-contrast: ; --tw-backdrop-grayscale: ; --tw-backdrop-hue-rotate: ; --tw-backdrop-invert: ; --tw-backdrop-opacity: ; --tw-backdrop-saturate: ; --tw-backdrop-sepia: ; --tw-contain-size: ; --tw-contain-layout: ; --tw-contain-paint: ; --tw-contain-style: ; color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, sans-serif; font-size: medium;\"><span style=\"color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, sans-serif; font-size: medium;\">perferendis cupiditate atque quia fuga consequatur porro officia id similique distinctio libero culpa eaque? Aperiam voluptate molestiae recusandae optio laudantium repellendus magni dolore iste impedit! Sint, nam. Reprehenderit, libero iure.</span><br></p>', '2024-03-30 23:43:29', '2024-03-31 00:23:28'),
(3, 'CONVOCATION FOR GRADUTE STUDENTS fdgb', 'convocation-for-gradute-students-fdgb', 'backend/images/event/images (1).jfif', '2024-03-23', '02:10', 'Uttara , Dhaka', 'Lorem, ipsum dolor sit amet consectetur adipisicing elit.', '<p><span style=\"color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, sans-serif; font-size: medium;\">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Suscipit iusto a aperiam accusantium laborum molestiae porro exercitationem atque doloribus, eius fugiat odio similique error itaque omnis quam? Odio voluptatum doloremque praesentium quibusdam impedit quia, non labore expedita quisquam sint possimus illum aliquam in eum sequi itaque obcaecati corrupti </span><span style=\"font-family: &quot;Open Sans&quot;, sans-serif; font-size: medium; background-color: rgb(255, 255, 0);\"><font color=\"#000000\">architecto laudantiu</font></span><span style=\"color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, sans-serif; font-size: medium;\">m. Lorem ipsum dolor sit amet consectetur adipisicing elit. Saepe eligendi quibusdam corrupti debitis repudiandae dolores vero impedit? Quasi in veritatis qui modi nemo minus totam, voluptatem voluptate ut,</span><br style=\"margin: 0px; padding: 0px; scroll-behavior: smooth; border-width: 0px; border-style: solid; border-color: rgb(229, 231, 235); --tw-border-spacing-x: 0; --tw-border-spacing-y: 0; --tw-translate-x: 0; --tw-translate-y: 0; --tw-rotate: 0; --tw-skew-x: 0; --tw-skew-y: 0; --tw-scale-x: 1; --tw-scale-y: 1; --tw-pan-x: ; --tw-pan-y: ; --tw-pinch-zoom: ; --tw-scroll-snap-strictness: proximity; --tw-gradient-from-position: ; --tw-gradient-via-position: ; --tw-gradient-to-position: ; --tw-ordinal: ; --tw-slashed-zero: ; --tw-numeric-figure: ; --tw-numeric-spacing: ; --tw-numeric-fraction: ; --tw-ring-inset: ; --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgb(59 130 246 / 0.5); --tw-ring-offset-shadow: 0 0 #0000; --tw-ring-shadow: 0 0 #0000; --tw-shadow: 0 0 #0000; --tw-shadow-colored: 0 0 #0000; --tw-blur: ; --tw-brightness: ; --tw-contrast: ; --tw-grayscale: ; --tw-hue-rotate: ; --tw-invert: ; --tw-saturate: ; --tw-sepia: ; --tw-drop-shadow: ; --tw-backdrop-blur: ; --tw-backdrop-brightness: ; --tw-backdrop-contrast: ; --tw-backdrop-grayscale: ; --tw-backdrop-hue-rotate: ; --tw-backdrop-invert: ; --tw-backdrop-opacity: ; --tw-backdrop-saturate: ; --tw-backdrop-sepia: ; --tw-contain-size: ; --tw-contain-layout: ; --tw-contain-paint: ; --tw-contain-style: ; color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, sans-serif; font-size: medium;\"><br style=\"margin: 0px; padding: 0px; scroll-behavior: smooth; border-width: 0px; border-style: solid; border-color: rgb(229, 231, 235); --tw-border-spacing-x: 0; --tw-border-spacing-y: 0; --tw-translate-x: 0; --tw-translate-y: 0; --tw-rotate: 0; --tw-skew-x: 0; --tw-skew-y: 0; --tw-scale-x: 1; --tw-scale-y: 1; --tw-pan-x: ; --tw-pan-y: ; --tw-pinch-zoom: ; --tw-scroll-snap-strictness: proximity; --tw-gradient-from-position: ; --tw-gradient-via-position: ; --tw-gradient-to-position: ; --tw-ordinal: ; --tw-slashed-zero: ; --tw-numeric-figure: ; --tw-numeric-spacing: ; --tw-numeric-fraction: ; --tw-ring-inset: ; --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgb(59 130 246 / 0.5); --tw-ring-offset-shadow: 0 0 #0000; --tw-ring-shadow: 0 0 #0000; --tw-shadow: 0 0 #0000; --tw-shadow-colored: 0 0 #0000; --tw-blur: ; --tw-brightness: ; --tw-contrast: ; --tw-grayscale: ; --tw-hue-rotate: ; --tw-invert: ; --tw-saturate: ; --tw-sepia: ; --tw-drop-shadow: ; --tw-backdrop-blur: ; --tw-backdrop-brightness: ; --tw-backdrop-contrast: ; --tw-backdrop-grayscale: ; --tw-backdrop-hue-rotate: ; --tw-backdrop-invert: ; --tw-backdrop-opacity: ; --tw-backdrop-saturate: ; --tw-backdrop-sepia: ; --tw-contain-size: ; --tw-contain-layout: ; --tw-contain-paint: ; --tw-contain-style: ; color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, sans-serif; font-size: medium;\"><span style=\"color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, sans-serif; font-size: medium;\">perferendis cupiditate atque quia fuga consequatur porro officia id similique distinctio libero culpa eaque? Aperiam voluptate molestiae recusandae optio laudantium repellendus magni dolore iste impedit! Sint, nam. Reprehenderit, libero iure.</span><br></p>', '2024-03-31 00:09:38', '2024-03-31 00:23:51'),
(4, 'What is Lorem Ipsum?', 'what-is-lorem-ipsum', 'backend/images/event/download (1).jfif', '2024-04-10', '17:30', 'Uttara , Dhaka', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry', '<p><strong style=\"margin: 0px; padding: 0px; color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; text-align: justify;\">Lorem Ipsum</strong><span style=\"color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; text-align: justify;\">&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letra<b>set sheets containing Lorem Ipsum passages</b>, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</span></p><p><strong style=\"margin: 0px; padding: 0px; color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; text-align: justify;\">Lorem Ipsum</strong><span style=\"color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; text-align: justify;\">&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</span><span style=\"color: rgb(0, 0, 0); font-family: &quot;Open Sans&quot;, Arial, sans-serif; font-size: 14px; text-align: justify;\"><br></span><br></p>', '2024-03-31 01:37:20', '2024-03-31 01:37:20');

-- --------------------------------------------------------

--
-- Table structure for table `examinations`
--

CREATE TABLE `examinations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `examinations`
--

INSERT INTO `examinations` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'JSC', '2024-03-24 23:45:20', '2024-03-24 23:45:20'),
(2, 'SSC', '2024-03-24 23:52:42', '2024-03-24 23:52:42');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `galleries`
--

CREATE TABLE `galleries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `filename` varchar(255) NOT NULL,
  `file_size` varchar(255) DEFAULT NULL,
  `path_name` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `galleries`
--

INSERT INTO `galleries` (`id`, `filename`, `file_size`, `path_name`, `created_at`, `updated_at`) VALUES
(1, '2022-01-11-image-2.webp', '101', 'backend/images/galley/2022-01-11-image-2.webp', '2024-03-21 00:30:17', '2024-03-21 00:30:17'),
(2, '1788090007377003.jpg', '148', 'backend/images/galley/1788090007377003.jpg', '2024-03-21 00:30:17', '2024-03-21 00:30:17'),
(3, '1788603546303014.jpeg', '94', 'backend/images/galley/1788603546303014.jpeg', '2024-03-21 00:30:17', '2024-03-21 00:30:17'),
(4, '16323327831619241714761747856.jpg', '98', 'backend/images/galley/16323327831619241714761747856.jpg', '2024-03-21 00:30:17', '2024-03-21 00:30:17'),
(5, 'awd_infinity_black_package_165hz.webp', '94', 'backend/images/galley/awd_infinity_black_package_165hz.webp', '2024-03-21 00:30:18', '2024-03-21 00:30:18'),
(6, 'testimonial_bg.jpg', '83', 'backend/images/galley/testimonial_bg.jpg', '2024-03-21 00:30:18', '2024-03-21 00:30:18'),
(7, 'transaction.png', '79', 'backend/images/galley/transaction.png', '2024-03-21 00:30:18', '2024-03-21 00:30:18'),
(8, '1788090007377003 - Copy.jpg', '148', 'backend/images/galley/1788090007377003 - Copy.jpg', '2024-03-21 00:30:19', '2024-03-21 00:30:19'),
(9, 'bkash.png', '41', 'backend/images/galley/bkash.png', '2024-03-21 00:31:29', '2024-03-21 00:31:29'),
(10, 'cash.png', '66', 'backend/images/galley/cash.png', '2024-03-21 00:31:29', '2024-03-21 00:31:29'),
(11, 'header-bg.png', '5', 'backend/images/galley/header-bg.png', '2024-03-21 00:31:30', '2024-03-21 00:31:30'),
(12, 'istockphoto-918365260-2048x2048.jpg', '184', 'backend/images/galley/istockphoto-918365260-2048x2048.jpg', '2024-03-21 00:31:30', '2024-03-21 00:31:30'),
(13, 'istockphoto-1150803465-2048x2048.jpg', '213', 'backend/images/galley/istockphoto-1150803465-2048x2048.jpg', '2024-03-21 00:31:31', '2024-03-21 00:31:31'),
(14, 'Laptop-computer.webp', '41', 'backend/images/galley/Laptop-computer.webp', '2024-03-21 00:31:31', '2024-03-21 00:31:31'),
(16, 'transaction.png', '79', 'backend/images/galley/transaction.png', '2024-03-21 00:31:32', '2024-03-21 00:31:32'),
(17, '16785275329fc645587d663b00682d11d0458bab0e.png', '191', 'backend/images/galley/16785275329fc645587d663b00682d11d0458bab0e.png', '2024-04-02 00:50:25', '2024-04-02 00:50:25'),
(18, '16323327831619241714761747856.jpg', '98', 'backend/images/galley/16323327831619241714761747856.jpg', '2024-04-02 00:50:25', '2024-04-02 00:50:25'),
(20, '16785275329fc645587d663b00682d11d0458bab0e - Copy.png', '191', 'backend/images/galley/16785275329fc645587d663b00682d11d0458bab0e - Copy.png', '2024-04-02 00:51:06', '2024-04-02 00:51:06'),
(21, '2022-01-11-image-2.webp', '101', 'backend/images/galley/2022-01-11-image-2.webp', '2024-04-02 00:51:07', '2024-04-02 00:51:07'),
(22, '16785275329fc645587d663b00682d11d0458bab0e.png', '191', 'backend/images/galley/16785275329fc645587d663b00682d11d0458bab0e.png', '2024-04-02 00:51:07', '2024-04-02 00:51:07'),
(23, '1788090007377003 - Copy.jpg', '148', 'backend/images/galley/1788090007377003 - Copy.jpg', '2024-04-02 00:51:08', '2024-04-02 00:51:08'),
(24, '1788090007377003.jpg', '148', 'backend/images/galley/1788090007377003.jpg', '2024-04-02 00:51:08', '2024-04-02 00:51:08'),
(25, '1788603546303014.jpeg', '94', 'backend/images/galley/1788603546303014.jpeg', '2024-04-02 00:51:08', '2024-04-02 00:51:08'),
(26, '1788708637218702.jpg', '64', 'backend/images/galley/1788708637218702.jpg', '2024-04-02 00:51:09', '2024-04-02 00:51:09'),
(27, '16323327831619241714761747856.jpg', '98', 'backend/images/galley/16323327831619241714761747856.jpg', '2024-04-02 00:51:09', '2024-04-02 00:51:09'),
(28, 'awd_infinity_black_package_165hz.webp', '94', 'backend/images/galley/awd_infinity_black_package_165hz.webp', '2024-04-02 00:51:09', '2024-04-02 00:51:09'),
(29, 'bkash.png', '41', 'backend/images/galley/bkash.png', '2024-04-02 00:51:10', '2024-04-02 00:51:10'),
(30, 'istockphoto-918365260-2048x2048.jpg', '184', 'backend/images/galley/istockphoto-918365260-2048x2048.jpg', '2024-04-02 00:51:10', '2024-04-02 00:51:10'),
(31, 'istockphoto-1150803465-2048x2048.jpg', '213', 'backend/images/galley/istockphoto-1150803465-2048x2048.jpg', '2024-04-02 00:51:11', '2024-04-02 00:51:11');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2024_03_12_084435_create_admins_table', 1),
(6, '2024_03_18_052813_create_branches_table', 2),
(7, '2024_03_20_042929_create_divisions_table', 3),
(8, '2024_03_20_083753_create_districts_table', 4),
(9, '2024_03_20_091621_create_upazillas_table', 5),
(10, '2024_03_20_101559_create_batches_table', 6),
(11, '2024_03_18_061621_create_galleries_table', 7),
(12, '2024_03_21_081606_create_courses_table', 8),
(13, '2024_03_23_082847_create_course_details_table', 9),
(14, '2024_03_24_035300_create_course_details_table', 10),
(15, '2024_03_24_060613_create_course_details_table', 11),
(16, '2024_03_23_060430_create_students_table', 12),
(17, '2024_03_25_041328_create_examinations_table', 13),
(18, '2024_03_25_041257_create_boards_table', 14),
(19, '2024_03_25_041219_create_sessions_table', 15),
(20, '2024_03_25_090653_create_students_table', 16),
(21, '2024_03_26_061723_create_admission_payments_table', 17),
(22, '2024_03_27_051024_create_services_table', 18),
(23, '2024_03_27_094147_create_counters_table', 19),
(24, '2024_03_27_102124_create_achive_students_table', 20),
(25, '2024_03_31_043642_create_events_table', 21),
(26, '2024_03_31_081651_create_banner_sections_table', 22),
(27, '2024_03_31_100316_create_settings_table', 23),
(28, '2024_04_03_041807_create_carts_table', 24),
(29, '2024_04_23_055702_create_results_table', 25);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `results`
--

CREATE TABLE `results` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `student_id` bigint(20) NOT NULL,
  `cgpa` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `results`
--

INSERT INTO `results` (`id`, `student_id`, `cgpa`, `date`, `created_at`, `updated_at`) VALUES
(1, 3, 'B', '2024-04-24', '2024-04-23 04:06:23', '2024-04-23 05:35:31'),
(2, 5, 'A+', '2024-04-10', '2024-04-23 04:21:57', '2024-04-23 04:21:57'),
(3, 1, 'A', '2024-04-25', '2024-04-23 04:27:40', '2024-04-23 04:27:40');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `priority` int(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `title`, `priority`, `description`, `created_at`, `updated_at`) VALUES
(2, 'গ্রাফিক ডিজাইন', 1, 'একজন দক্ষ ডিজিটাল মার্কেটার হতে হলে আপনাকে ডিজিটাল প্ল্যাটফর্মে পারদর্শী হতে হবে। আর এজন্য যা কিছু জানা প্রয়োজন, তার সবই থাকছে আমাদের কোর্সে।', '2024-03-27 00:20:42', '2024-03-29 21:37:29'),
(3, 'ডিজিটাল মার্কেটিং', 2, 'একজন দক্ষ ডিজিটাল মার্কেটার হতে হলে আপনাকে ডিজিটাল প্ল্যাটফর্মে পারদর্শী হতে হবে। আর এজন্য যা কিছু জানা প্রয়োজন, তার সবই থাকছে আমাদের কোর্সে।', '2024-03-29 21:37:48', '2024-03-29 21:37:48'),
(4, 'ওয়েব ডিজাইন', 3, 'একজন দক্ষ ডিজিটাল মার্কেটার হতে হলে আপনাকে ডিজিটাল প্ল্যাটফর্মে পারদর্শী হতে হবে। আর এজন্য যা কিছু জানা প্রয়োজন, তার সবই থাকছে আমাদের কোর্সে।', '2024-03-29 21:38:41', '2024-03-29 21:38:41');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'January-March(3Month)', '2024-03-24 23:54:14', '2024-03-24 23:54:14'),
(2, 'July-September(3 Month)', '2024-03-24 23:54:49', '2024-03-24 23:54:49');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `value` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `name`, `value`, `created_at`, `updated_at`) VALUES
(1, 'site_name', 'Melinda Bruce', '2024-04-01 00:48:24', '2024-04-01 00:48:24'),
(2, 'email', 'xopyto@mailinator.com', '2024-04-01 00:48:24', '2024-04-01 00:48:24'),
(3, 'phone', 'Alana Whitfield', '2024-04-01 00:48:24', '2024-04-01 00:48:24'),
(4, 'open_hour', 'Madeline Ashley', '2024-04-01 00:48:24', '2024-04-01 00:48:24'),
(5, 'whats_up', '017695411212', '2024-04-01 00:48:24', '2024-04-01 03:09:06'),
(6, 'address', 'Uttara ,Dhaka', '2024-04-01 00:48:24', '2024-04-01 03:09:06'),
(7, 'facebook_link', 'https://www.facebook.com', '2024-04-01 00:48:24', '2024-04-01 03:06:19'),
(8, 'youtube_link', 'https://www.youtube.com/', '2024-04-01 00:48:24', '2024-04-01 03:08:34'),
(9, 'linkedin', 'https://www.linkedin.com/', '2024-04-01 00:48:24', '2024-04-01 03:08:34'),
(10, 'pintarest', 'https://www.pinterest.com/', '2024-04-01 00:48:24', '2024-04-01 03:08:34'),
(11, 'instagram', 'https://www.instagram.com/', '2024-04-01 00:48:24', '2024-04-01 03:08:34'),
(12, 'header_logo', 'backend/images/setting/logo.png', '2024-04-01 00:48:24', '2024-04-01 01:57:18'),
(13, 'footer_logo', 'backend/images/setting/logo.png', '2024-04-01 00:48:24', '2024-04-03 00:14:14'),
(14, 'fav_icon', 'backend/images/setting/logo.png', '2024-04-01 00:48:24', '2024-04-03 00:14:14'),
(15, 'notice', 'ভর্তি বিজ্ঞপ্তিঃ আমাদের সকল আঞ্চলিক শাখায় তিন ও ছয় মাস মেয়াদী  অফিস এ্যাপ্লিকেশন কোর্সে জুনয়ারি - জুন এবং জুনয়ারি - মার্চ ২০২৪ সেশনে ভর্তি চলছে ।বিঃ দ্রঃ ভর্তি প্রক্রিয়া অনলান।3', '2024-04-01 02:52:50', '2024-04-01 03:03:17');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `student_roll` varchar(255) DEFAULT '0',
  `name_en` varchar(255) NOT NULL,
  `name_bn` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `fathers_name` varchar(255) NOT NULL,
  `mothers_name` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `gurdian_phone` varchar(255) NOT NULL,
  `present_address` varchar(255) NOT NULL,
  `premanent_address` varchar(255) NOT NULL,
  `dob` varchar(255) NOT NULL,
  `blood_group` varchar(255) DEFAULT NULL,
  `nationality` varchar(255) DEFAULT NULL,
  `gender` varchar(255) NOT NULL,
  `religion` varchar(255) NOT NULL,
  `document_image` varchar(255) DEFAULT NULL,
  `exam_id` int(11) NOT NULL,
  `board_id` int(11) NOT NULL,
  `roll` varchar(255) NOT NULL,
  `registration` varchar(255) NOT NULL,
  `exam_year` varchar(255) NOT NULL,
  `admission_date` varchar(255) NOT NULL,
  `session_id` int(11) NOT NULL,
  `session_start` varchar(255) NOT NULL,
  `session_end` varchar(255) NOT NULL,
  `course_id` int(11) NOT NULL,
  `batch_id` int(11) NOT NULL,
  `admission_fee` varchar(255) NOT NULL,
  `discount` varchar(255) DEFAULT NULL,
  `payable_amount` varchar(255) NOT NULL,
  `paid` varchar(255) DEFAULT NULL,
  `due` varchar(255) DEFAULT NULL,
  `created_by` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `student_roll`, `name_en`, `name_bn`, `image`, `fathers_name`, `mothers_name`, `email`, `phone`, `gurdian_phone`, `present_address`, `premanent_address`, `dob`, `blood_group`, `nationality`, `gender`, `religion`, `document_image`, `exam_id`, `board_id`, `roll`, `registration`, `exam_year`, `admission_date`, `session_id`, `session_start`, `session_end`, `course_id`, `batch_id`, `admission_fee`, `discount`, `payable_amount`, `paid`, `due`, `created_by`, `created_at`, `updated_at`) VALUES
(1, '01', 'Sylvia Heath', 'Kameko Mueller', 'backend/images/student/testi_avatar01.png', 'Yvette Woods', 'Fitzgerald Langley', 'staff@gmail.com', '01754534131', '01323544531', 'Stephen Farrell', 'Amal Howell', '2009-10-14', 'AB-', 'Jared Pittman', 'Male', 'Muslim', 'backend/images/studentdocument/download (1).jfif', 2, 3, '3245', '456789765432', '2010', '1975-04-02', 2, '31', '587', 1, 2, '900', '0', '900', '500', '400', '', '2024-03-25 03:20:05', '2024-04-01 04:07:28'),
(3, '03', 'Aladdin Nixon', 'Kiara Anderson', 'backend/images/student/Flower_stock_photo.jpg', 'Grant Mckinney', 'Montana Rollins', 'wokehar@mailinator.com', '01755555554', '01755557895', 'Castor Cantu', 'Germaine Cantrell', '1993-08-07', 'AB-', 'Minerva Reyes', 'Male', 'Muslim', '', 2, 3, '78545', '789456', '2026', '1971-08-17', 1, '810', '823', 5, 3, '2500', '200', '2300', NULL, '2300', '', '2024-04-22 23:33:26', '2024-04-22 23:33:26'),
(4, '04', 'Buckminster Hendrix', 'Yuli Chase', 'backend/images/student/grassy-field-with-shadows-trees-during-stunning-sunset-evening_410516-23213.jpg', 'Kirk Odonnell', 'Xenos Beck', 'memomif@mailinator.com', '01675992031', '01755557893', 'Caldwell Pace', 'Farrah Osborn', '1970-02-17', 'AB-', 'Bevis Clarke', 'Male', 'Muslim', '', 2, 3, '78543', '789456', '2014', '2022-11-02', 2, '97', '286', 1, 2, '2500', '50', '2450', NULL, '2450', '', '2024-04-22 23:44:34', '2024-04-24 00:41:30'),
(5, '05', 'Fulton Hammond', 'Zia Chavez', 'backend/images/student/download (2).jfif', 'Doris Lawrence', 'Helen Daniels', 'gizesiwa@mailinator.com', '01675996534', '01755557899', 'Glenna Guthrie', 'Stephen Gutierrez', '2023-04-09', 'AB-', 'Jaime Shields', 'Female', 'Muslim', '', 1, 1, '78547', '789458', '2023', '1981-02-22', 2, '338', '967', 4, 3, '2500', '20', '2480', NULL, '2480', '', '2024-04-22 23:45:47', '2024-04-24 00:38:58'),
(6, '06', 'Paula Bird', 'Celeste Hickman', 'backend/images/student/fghj.PNG', 'Shaine Holmes', 'Sacha Roberts', 'cyhuh@mailinator.com', '01675988031', '01755757899', 'Lucas Blackwell', 'Rae Perry', '2002-01-25', 'O-', 'Cleo Vinson', 'Male', 'Muslim', '', 2, 1, '78587', '789445', '1995', '1998-04-13', 2, '134', '182', 5, 5, '2500', '50', '2450', NULL, '2450', '1', '2024-04-24 05:11:15', '2024-04-24 05:11:15');

-- --------------------------------------------------------

--
-- Table structure for table `upazillas`
--

CREATE TABLE `upazillas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `priority` int(255) DEFAULT NULL,
  `status` int(11) DEFAULT 1,
  `division_id` int(11) NOT NULL,
  `district_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `achive_students`
--
ALTER TABLE `achive_students`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_username_unique` (`username`),
  ADD UNIQUE KEY `admins_email_unique` (`email`),
  ADD UNIQUE KEY `admins_phone_unique` (`phone`);

--
-- Indexes for table `admission_payments`
--
ALTER TABLE `admission_payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `banner_sections`
--
ALTER TABLE `banner_sections`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `batches`
--
ALTER TABLE `batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `boards`
--
ALTER TABLE `boards`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `branches`
--
ALTER TABLE `branches`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `branches_email_unique` (`email`),
  ADD UNIQUE KEY `branches_phone_unique` (`phone`);

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `counters`
--
ALTER TABLE `counters`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `course_details`
--
ALTER TABLE `course_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `districts`
--
ALTER TABLE `districts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `divisions`
--
ALTER TABLE `divisions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `examinations`
--
ALTER TABLE `examinations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `galleries`
--
ALTER TABLE `galleries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `results`
--
ALTER TABLE `results`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `upazillas`
--
ALTER TABLE `upazillas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `achive_students`
--
ALTER TABLE `achive_students`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `admission_payments`
--
ALTER TABLE `admission_payments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `banner_sections`
--
ALTER TABLE `banner_sections`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `batches`
--
ALTER TABLE `batches`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `boards`
--
ALTER TABLE `boards`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `branches`
--
ALTER TABLE `branches`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `counters`
--
ALTER TABLE `counters`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `course_details`
--
ALTER TABLE `course_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `districts`
--
ALTER TABLE `districts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `divisions`
--
ALTER TABLE `divisions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `examinations`
--
ALTER TABLE `examinations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `galleries`
--
ALTER TABLE `galleries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `results`
--
ALTER TABLE `results`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `sessions`
--
ALTER TABLE `sessions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `upazillas`
--
ALTER TABLE `upazillas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
