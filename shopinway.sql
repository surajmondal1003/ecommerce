-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 20, 2018 at 08:21 AM
-- Server version: 10.1.36-MariaDB
-- PHP Version: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shopinway`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Atanu', 'artage.in@gmail.com', '$2y$10$fdJL/gt8AwSWaMPgvEO6.eA/8FdErTlP246d0i97aPS45pMjFuZDa', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `attributes`
--

CREATE TABLE `attributes` (
  `attr_id` int(10) UNSIGNED NOT NULL,
  `attr_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_active` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `attributes`
--

INSERT INTO `attributes` (`attr_id`, `attr_name`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'Publisher', 'active', '2018-11-05 05:33:49', '2018-11-05 05:33:49'),
(2, 'Edition', 'active', '2018-11-05 05:33:55', '2018-11-05 05:33:55'),
(3, 'ISBN-10', 'active', '2018-11-05 05:34:03', '2018-11-05 05:34:03'),
(4, 'ISBN-13', 'active', '2018-11-05 05:34:10', '2018-11-05 05:34:10'),
(5, 'Language', 'active', '2018-11-05 05:34:17', '2018-11-05 05:34:17'),
(6, 'Number Of Pages', 'active', '2018-11-05 05:34:26', '2018-11-05 05:34:26');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `category_id` int(10) UNSIGNED NOT NULL,
  `category_parent` int(11) NOT NULL,
  `category_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_url` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_position` int(11) NOT NULL,
  `is_active` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `category_parent`, `category_name`, `category_url`, `category_position`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 0, 'Academics and Professional', 'academics-and-professional', 0, 'active', '2018-11-05 05:33:07', '2018-11-15 04:54:11'),
(2, 0, 'Entrance Exam', 'entrance-exam', 0, 'active', '2018-11-05 05:50:38', '2018-11-05 05:51:40'),
(3, 0, 'Children & Young Adult', 'children -young-adult', 0, 'active', '2018-11-05 05:55:07', '2018-11-05 05:55:07'),
(4, 0, 'Business & Managment', 'business- managment', 0, 'active', '2018-11-05 05:58:26', '2018-11-05 05:58:26'),
(5, 0, 'Makaut', 'makaut', 0, 'active', '2018-11-05 05:59:37', '2018-11-05 05:59:37'),
(6, 0, 'School Books', 'school -books', 0, 'active', '2018-11-05 06:00:44', '2018-11-05 06:00:44'),
(7, 1, 'Computer & Internet Books', 'computer-internet-books', 0, 'active', '2018-11-05 06:04:14', '2018-11-05 06:04:14'),
(8, 1, 'MAKAUT(WBUT) Books', 'makaut-wbut-books', 0, 'active', '2018-11-05 06:06:32', '2018-11-05 06:06:32'),
(9, 1, 'Engineering Books', 'engineering-books', 0, 'active', '2018-11-05 06:08:33', '2018-11-05 06:08:33'),
(10, 1, 'Law Books', 'law-books', 0, 'active', '2018-11-05 06:09:32', '2018-11-05 06:09:32'),
(11, 1, 'Medical Books', 'medical-books', 0, 'active', '2018-11-05 06:10:25', '2018-11-05 06:10:25'),
(12, 1, 'Commerce Books', 'commerce-books', 0, 'active', '2018-11-05 06:11:38', '2018-11-05 06:11:38'),
(13, 1, 'Management Books', 'management-books', 0, 'active', '2018-11-05 06:12:40', '2018-11-05 06:12:40'),
(14, 1, 'Science Books', 'science-books', 0, 'active', '2018-11-05 06:13:47', '2018-11-05 06:13:47'),
(15, 2, 'Banking Exams', 'banking-exams', 0, 'active', '2018-11-05 06:15:11', '2018-11-05 06:15:11'),
(16, 2, 'Civil Services Exams', 'civil-services-exams', 0, 'active', '2018-11-05 06:16:22', '2018-11-05 06:16:22'),
(17, 2, 'Defence Services Exams', 'defence-services-exams', 0, 'active', '2018-11-05 06:18:06', '2018-11-05 06:18:06'),
(18, 2, 'Engineering Exams', 'engineering-exams', 0, 'active', '2018-11-05 06:19:08', '2018-11-05 06:19:08'),
(19, 2, 'Government Exams', 'government-exams', 0, 'active', '2018-11-05 06:20:08', '2018-11-05 06:20:08'),
(20, 2, 'International Exams', 'international-exams', 0, 'active', '2018-11-05 06:20:58', '2018-11-05 06:20:58'),
(21, 2, 'Law Exams', 'law-exams', 0, 'active', '2018-11-05 06:21:48', '2018-11-05 06:21:48'),
(22, 2, 'Management Exams', 'management-exams', 0, 'active', '2018-11-05 06:22:42', '2018-11-05 06:22:42'),
(23, 2, 'Medical Exams', 'medical-exams', 0, 'active', '2018-11-05 06:23:59', '2018-11-05 06:23:59'),
(24, 3, 'Action & Adventure', 'action-adventure', 0, 'active', '2018-11-05 06:25:18', '2018-11-05 06:25:18'),
(25, 3, 'Biographical', 'biographical', 0, 'active', '2018-11-05 06:26:03', '2018-11-05 06:26:03'),
(26, 3, 'Children Books', 'children-books', 0, 'active', '2018-11-05 06:27:17', '2018-11-05 06:27:17'),
(27, 3, 'Fantasy & Horror', 'fantasy-horror', 0, 'active', '2018-11-05 06:28:28', '2018-11-05 06:28:28'),
(28, 3, 'Literature Collections', 'literature-collections', 0, 'active', '2018-11-05 06:29:38', '2018-11-05 06:29:38'),
(29, 3, 'Mystery & Detective', 'mystery-detective', 0, 'active', '2018-11-05 06:30:42', '2018-11-05 06:30:42'),
(30, 3, 'Religious', 'religious', 0, 'active', '2018-11-05 06:31:10', '2018-11-05 06:31:10'),
(31, 3, 'Science Fiction', 'science-fiction', 0, 'active', '2018-11-05 06:33:36', '2018-11-05 06:33:36'),
(32, 4, 'Accounting', 'accounting', 0, 'active', '2018-11-05 06:34:54', '2018-11-05 06:34:54'),
(33, 4, 'Business & Economics', 'business-economics', 0, 'active', '2018-11-05 06:37:45', '2018-11-05 06:37:45'),
(34, 4, 'Finance', 'finance', 0, 'active', '2018-11-05 06:38:21', '2018-11-05 06:38:21'),
(35, 4, 'Management', 'management', 0, 'active', '2018-11-05 06:38:55', '2018-11-05 06:38:55'),
(36, 5, 'MAKAUT (B.Tech)', 'makaut-b-tech', 0, 'active', '2018-11-05 06:42:34', '2018-11-05 06:42:34'),
(37, 5, 'MAKAUT (Management)', 'makaut-management', 0, 'active', '2018-11-05 06:44:08', '2018-11-05 06:44:08'),
(38, 5, 'MATRIX (Polytechnic)', 'matrix-polytechnic', 0, 'active', '2018-11-05 06:45:21', '2018-11-05 06:45:21'),
(39, 6, 'Academic School Books', 'academic-school-books', 0, 'active', '2018-11-05 06:47:04', '2018-11-05 06:47:04'),
(40, 6, 'Olympiads & Scholarship Exams', 'olympiads-scholarship-exams', 0, 'active', '2018-11-05 06:48:32', '2018-11-05 06:48:32'),
(41, 6, 'School Text-Books', 'school-text-books', 0, 'active', '2018-11-05 06:50:06', '2018-11-05 06:50:06'),
(42, 9, 'BioTechnology Books', 'bio-technology-books', 0, 'active', '2018-11-05 06:54:04', '2018-11-05 06:54:04'),
(43, 9, 'Chemical Engineering Books', 'chemical-engineering-books', 0, 'active', '2018-11-05 06:57:25', '2018-11-05 06:57:25'),
(44, 9, 'Civil Engineering Books', 'civil-engineering-books', 0, 'active', '2018-11-05 06:59:48', '2018-11-05 06:59:48'),
(45, 9, 'Electrical & Electronics Engineering Books', 'electrical-electronics-engineering-books', 0, 'active', '2018-11-05 07:01:54', '2018-11-05 07:01:54'),
(46, 9, 'Mechanical Engineering', 'mechanical-engineering', 0, 'active', '2018-11-05 07:03:15', '2018-11-05 07:03:15'),
(47, 10, 'Bar Exam Books', 'bar-exam-books', 0, 'active', '2018-11-05 07:10:40', '2018-11-05 07:10:40'),
(48, 10, 'Business Law Books', 'business-law-books', 0, 'active', '2018-11-05 07:11:55', '2018-11-05 07:11:55'),
(49, 10, 'Constitutional Law Books', 'constitutiona-law-books', 0, 'active', '2018-11-05 07:14:00', '2018-11-05 07:14:00'),
(50, 10, 'Criminal Law Books', 'criminal-law-books', 0, 'active', '2018-11-05 07:16:28', '2018-11-05 07:16:28'),
(51, 10, 'Legal Reference Books', 'legal-reference-books', 0, 'active', '2018-11-05 07:18:43', '2018-11-05 07:18:43'),
(52, 10, 'Tax Law Books', 'tax-law-books', 0, 'active', '2018-11-05 07:20:06', '2018-11-05 07:20:06'),
(53, 11, 'Allied Health Services Books', 'allied-health-services-books', 0, 'active', '2018-11-05 07:23:46', '2018-11-05 07:23:46'),
(54, 11, 'Dentistry Books', 'dentistry-books', 0, 'active', '2018-11-05 07:26:13', '2018-11-05 07:26:13'),
(55, 11, 'Nursing Books', 'nursing-books', 0, 'active', '2018-11-05 07:27:19', '2018-11-05 07:27:19'),
(56, 11, 'Nutrition Books', 'nutrition-books', 0, 'active', '2018-11-05 07:29:01', '2018-11-05 07:29:01'),
(57, 11, 'Reference Books', 'reference-books', 0, 'active', '2018-11-05 07:31:10', '2018-11-05 07:31:10'),
(58, 11, 'Research Books', 'research-books', 0, 'active', '2018-11-05 07:32:17', '2018-11-05 07:32:17'),
(59, 11, 'Medicine Books', 'medicine-books', 0, 'active', '2018-11-05 07:33:28', '2018-11-05 07:33:28'),
(60, 14, 'Biology Books', 'biology-books', 0, 'active', '2018-11-05 07:35:36', '2018-11-05 07:35:36'),
(61, 14, 'Chemistry Books', 'chemistry-books', 0, 'active', '2018-11-05 07:36:47', '2018-11-05 07:36:47'),
(62, 14, 'Earth & Environmental Books', 'earth-environmental-books', 0, 'active', '2018-11-05 07:38:11', '2018-11-05 07:38:11'),
(63, 14, 'Mechanics Books', 'mechanics-books', 0, 'active', '2018-11-05 07:41:37', '2018-11-05 07:41:37'),
(64, 14, 'Physics Books', 'physics-books', 0, 'active', '2018-11-05 07:42:26', '2018-11-05 07:42:26'),
(65, 36, 'First Year (B.Tech)', 'first-year-b-tech', 0, 'active', '2018-11-05 07:58:25', '2018-11-05 07:58:25'),
(66, 36, 'Applied Electronics & Instrumentation Engg', 'applied-electronics-instrumentation-engg', 0, 'active', '2018-11-05 08:00:28', '2018-11-05 08:00:28'),
(67, 36, 'Civil Engineering', 'civil-engineering', 0, 'active', '2018-11-07 01:52:12', '2018-11-07 01:52:12'),
(68, 36, 'Computer Science & Engg', 'computer-science-engg', 0, 'active', '2018-11-07 01:53:49', '2018-11-07 01:53:49'),
(69, 36, 'Electrical Engineering', 'electrical-engineering', 0, 'active', '2018-11-07 01:55:14', '2018-11-07 01:55:14'),
(70, 36, 'Electronics & Communication Engg', 'electronics-communication-engg', 0, 'active', '2018-11-07 01:56:40', '2018-11-07 01:56:40'),
(71, 36, 'Information Technology', 'information-technology', 0, 'active', '2018-11-07 01:58:43', '2018-11-07 01:58:43'),
(72, 36, 'Mechanical Engineering', 'mechanical-engineering', 0, 'active', '2018-11-07 01:59:36', '2018-11-07 01:59:36'),
(73, 37, 'BBA', 'bba', 0, 'active', '2018-11-07 02:01:03', '2018-11-07 02:01:03'),
(74, 37, 'BCA', 'bca', 0, 'active', '2018-11-07 02:01:51', '2018-11-07 02:01:51'),
(75, 37, 'MBA', 'mba', 0, 'active', '2018-11-07 02:02:37', '2018-11-07 02:02:37'),
(76, 37, 'MCA', 'mca', 0, 'active', '2018-11-07 02:03:32', '2018-11-07 02:03:32'),
(77, 38, 'First Year (Polytechnic)', 'first-year-polytechnic', 0, 'active', '2018-11-07 02:05:35', '2018-11-07 02:12:26'),
(78, 38, 'Civil Engineering', 'civil-engineering', 0, 'active', '2018-11-07 02:07:36', '2018-11-07 02:12:01'),
(79, 38, 'Computer Science & Technology', 'computer-science-technology', 0, 'active', '2018-11-07 02:10:49', '2018-11-07 02:10:49'),
(80, 38, 'Electrical Engineering', 'electrical-engineering', 0, 'active', '2018-11-07 02:12:42', '2018-11-07 02:12:42'),
(81, 38, 'Electronics & TeleCommunication', 'electronics-teleCommunication', 0, 'active', '2018-11-07 02:13:58', '2018-11-07 02:13:58'),
(82, 38, 'Mechanical Engineering', 'mechanical-engineering', 0, 'active', '2018-11-07 02:14:58', '2018-11-07 02:14:58');

-- --------------------------------------------------------

--
-- Table structure for table `customers_address`
--

CREATE TABLE `customers_address` (
  `id` int(10) UNSIGNED NOT NULL,
  `users_id` int(11) NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `city_village` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `state` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pin_code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'India',
  `country_code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '+91',
  `is_primary` enum('1','0') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `discounts`
--

CREATE TABLE `discounts` (
  `discount_id` int(10) UNSIGNED NOT NULL,
  `discount_percent` decimal(10,2) NOT NULL,
  `discount_plan` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_active` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `discounts`
--

INSERT INTO `discounts` (`discount_id`, `discount_percent`, `discount_plan`, `is_active`, `created_at`, `updated_at`) VALUES
(1, '10.00', 'FLAT 10% OFF', 'active', '2018-11-05 05:33:33', '2018-11-05 05:33:33'),
(2, '20.00', 'UPTO 20% OFF', 'active', '2018-11-08 04:29:08', '2018-11-08 04:29:08'),
(3, '25.00', 'UPTO 25% OFF', 'active', '2018-11-08 04:30:10', '2018-11-08 04:30:10');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2018_09_15_091341_create_pages_table', 1),
(4, '2018_09_15_093128_page_meta', 1),
(5, '2018_09_27_055647_create_subscribers_table', 1),
(6, '2018_10_11_090225_create_categories_table', 1),
(7, '2018_10_12_111219_create_products_table', 1),
(8, '2018_10_12_111456_create_productattributes_table', 1),
(9, '2018_10_12_111553_create_productcategory_relations_table', 1),
(10, '2018_10_12_111621_create_attributes_table', 1),
(11, '2018_10_20_054751_create_discounts_table', 1),
(12, '2018_10_20_064334_create_admin_table', 1),
(13, '2018_10_20_091613_create_customers_address_table', 1),
(14, '2018_10_22_104726_create_productdiscounts_table', 1),
(15, '2018_10_23_115810_create_product_images_table', 1),
(16, '2018_10_30_064539_create_shippingzones_table', 1),
(17, '2018_10_30_090627_create_shippingpincodes_table', 1),
(18, '2018_10_30_103938_create_shippingprices_table', 1),
(19, '2018_11_02_094942_create_useraddresses_table', 2),
(20, '2018_11_05_105028_create_stocks_table', 3),
(21, '2018_11_19_054524_create_wishlists_table', 4);

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `page_id` int(10) UNSIGNED NOT NULL,
  `parent_id` int(11) NOT NULL,
  `page_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `page_url` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `position` int(11) NOT NULL,
  `location` enum('header','footer','both','link') COLLATE utf8mb4_unicode_ci NOT NULL,
  `ip_address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_active` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`page_id`, `parent_id`, `page_name`, `page_url`, `position`, `location`, `ip_address`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 0, 'Thank You', 'thank-you', 70, 'link', '0', 'active', '2018-11-02 02:07:33', '2018-11-02 02:21:08');

-- --------------------------------------------------------

--
-- Table structure for table `page_banners`
--

CREATE TABLE `page_banners` (
  `id` int(10) UNSIGNED NOT NULL,
  `page_id` int(11) NOT NULL,
  `banner_path` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `banner_content` text COLLATE utf8mb4_unicode_ci,
  `is_active` enum('active','inactive') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ip_address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `page_banners`
--

INSERT INTO `page_banners` (`id`, `page_id`, `banner_path`, `banner_content`, `is_active`, `ip_address`, `created_at`, `updated_at`) VALUES
(1, 1, NULL, NULL, NULL, '0', '2018-11-02 02:07:33', '2018-11-02 02:07:33');

-- --------------------------------------------------------

--
-- Table structure for table `page_contents`
--

CREATE TABLE `page_contents` (
  `id` int(10) UNSIGNED NOT NULL,
  `page_id` int(11) NOT NULL,
  `page_content` text COLLATE utf8mb4_unicode_ci,
  `ip_address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `page_contents`
--

INSERT INTO `page_contents` (`id`, `page_id`, `page_content`, `ip_address`, `created_at`, `updated_at`) VALUES
(1, 1, NULL, '0', '2018-11-02 02:07:33', '2018-11-02 02:07:33');

-- --------------------------------------------------------

--
-- Table structure for table `page_metas`
--

CREATE TABLE `page_metas` (
  `id` int(10) UNSIGNED NOT NULL,
  `page_id` int(11) NOT NULL,
  `meta_description` text COLLATE utf8mb4_unicode_ci,
  `page_title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `meta_keyword` text COLLATE utf8mb4_unicode_ci,
  `meta_robot` text COLLATE utf8mb4_unicode_ci,
  `meta_revisit_after` text COLLATE utf8mb4_unicode_ci,
  `canonical_link` text COLLATE utf8mb4_unicode_ci,
  `og_locale` text COLLATE utf8mb4_unicode_ci,
  `og_type` text COLLATE utf8mb4_unicode_ci,
  `og_image` text COLLATE utf8mb4_unicode_ci,
  `og_title` text COLLATE utf8mb4_unicode_ci,
  `og_description` text COLLATE utf8mb4_unicode_ci,
  `og_url` text COLLATE utf8mb4_unicode_ci,
  `og_site_name` text COLLATE utf8mb4_unicode_ci,
  `extraheadcode` text COLLATE utf8mb4_unicode_ci,
  `msvalidate` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `p_domain_verify` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alexaverifyid` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dc_title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `geo_region` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `geo_placename` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `geo_position` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `icbm` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `place_location_latitude` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `place_location_longitude` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `business_contact_street_address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `business_contact_locality` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `business_contact_postal_code` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `business_contact_country_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `business_contact_email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `business_contact_phone_number` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `business_contact_website` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `twitter_card` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `twitter_description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `twitter_title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `twitter_site` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `twitter_image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `twitter_creator` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ip_address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `page_metas`
--

INSERT INTO `page_metas` (`id`, `page_id`, `meta_description`, `page_title`, `meta_keyword`, `meta_robot`, `meta_revisit_after`, `canonical_link`, `og_locale`, `og_type`, `og_image`, `og_title`, `og_description`, `og_url`, `og_site_name`, `extraheadcode`, `msvalidate`, `p_domain_verify`, `alexaverifyid`, `dc_title`, `geo_region`, `geo_placename`, `geo_position`, `icbm`, `place_location_latitude`, `place_location_longitude`, `business_contact_street_address`, `business_contact_locality`, `business_contact_postal_code`, `business_contact_country_name`, `business_contact_email`, `business_contact_phone_number`, `business_contact_website`, `twitter_card`, `twitter_description`, `twitter_title`, `twitter_site`, `twitter_image`, `twitter_creator`, `ip_address`, `created_at`, `updated_at`) VALUES
(1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', '2018-11-02 02:07:33', '2018-11-02 02:07:33');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `productattributes`
--

CREATE TABLE `productattributes` (
  `productattributes_id` int(10) UNSIGNED NOT NULL,
  `product_id` int(11) NOT NULL,
  `attr_id` int(11) NOT NULL,
  `attr_value` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `productattributes`
--

INSERT INTO `productattributes` (`productattributes_id`, `product_id`, `attr_id`, `attr_value`, `created_at`, `updated_at`) VALUES
(7, 2, 1, 'Made Easy', NULL, NULL),
(8, 2, 2, '2016', NULL, NULL),
(9, 2, 3, '9351471950', NULL, NULL),
(10, 2, 4, '9351471950', NULL, NULL),
(11, 2, 5, 'English', NULL, NULL),
(12, 2, 6, '250', NULL, NULL),
(13, 3, 1, 'Pearson Education', NULL, NULL),
(14, 3, 2, '2009', NULL, NULL),
(15, 3, 3, '8131726886', NULL, NULL),
(16, 3, 4, '978-8131726884', NULL, NULL),
(17, 3, 5, 'English', NULL, NULL),
(18, 3, 6, '1088', NULL, NULL),
(19, 4, 1, 'CreateSpace Independent Publishing Platform', NULL, NULL),
(20, 4, 2, '2013', NULL, NULL),
(21, 4, 5, 'English', NULL, NULL),
(22, 4, 6, '254', NULL, NULL),
(23, 5, 1, 'Disha Publication', NULL, NULL),
(24, 5, 2, '2016', NULL, NULL),
(25, 5, 3, '9386146452', NULL, NULL),
(26, 5, 5, 'English', NULL, NULL),
(27, 5, 6, '200', NULL, NULL),
(28, 6, 1, 'MATRIX EDUCARE PVT. LTD.', NULL, NULL),
(29, 6, 2, '2018', NULL, NULL),
(30, 7, 1, 'Disha Publication', NULL, NULL),
(31, 7, 2, '2014', NULL, NULL),
(32, 7, 3, '938408963X', NULL, NULL),
(33, 7, 4, '978-9384089634', NULL, NULL),
(34, 7, 5, 'English', NULL, NULL),
(35, 7, 6, '270 pages', NULL, NULL),
(36, 8, 1, 'MTG Learning Media Private Limited', NULL, NULL),
(37, 8, 2, '2016', NULL, NULL),
(38, 8, 3, '938596626X', NULL, NULL),
(39, 8, 4, '978-9385966262', NULL, NULL),
(40, 8, 5, 'English', NULL, NULL),
(41, 8, 6, '336', NULL, NULL),
(42, 9, 1, 'MTG Learning Media Private Limited', NULL, NULL),
(43, 9, 2, '2016', NULL, NULL),
(44, 9, 3, '9385875833', NULL, NULL),
(45, 9, 4, '978-9385875830', NULL, NULL),
(46, 9, 5, 'English', NULL, NULL),
(47, 9, 6, '200', NULL, NULL),
(48, 10, 1, 'CreateSpace Independent Publishing Platform', NULL, NULL),
(49, 10, 2, '2014', NULL, NULL),
(50, 10, 3, '1502893274', NULL, NULL),
(51, 10, 4, '978-1502893277', NULL, NULL),
(52, 10, 5, 'English', NULL, NULL),
(53, 10, 6, '30', NULL, NULL),
(54, 11, 1, 'Taxmann', NULL, NULL),
(55, 11, 2, '2015', NULL, NULL),
(56, 11, 3, '8184782462', NULL, NULL),
(57, 11, 4, '978-8184782462', NULL, NULL),
(58, 11, 5, 'English', NULL, NULL),
(59, 12, 1, 'CreateSpace Independent Publishing Platform', NULL, NULL),
(60, 12, 2, '2014', NULL, NULL),
(61, 12, 3, '1505610885', NULL, NULL),
(62, 12, 4, '978-1505610888', NULL, NULL),
(63, 12, 5, 'English', NULL, NULL),
(64, 12, 6, '42', NULL, NULL),
(65, 13, 1, 'V & S Publishers', NULL, NULL),
(66, 13, 2, '2014', NULL, NULL),
(67, 13, 3, '9350571234', NULL, NULL),
(68, 13, 4, '978-9350571231', NULL, NULL),
(69, 13, 5, 'English', NULL, NULL),
(70, 13, 6, '328', NULL, NULL),
(71, 14, 1, 'McGraw Hill Education', NULL, NULL),
(72, 14, 2, '2011', NULL, NULL),
(73, 14, 3, '0070435065', NULL, NULL),
(74, 14, 4, '978-0070435063', NULL, NULL),
(75, 14, 5, 'English', NULL, NULL),
(76, 14, 6, '598', NULL, NULL),
(77, 15, 1, 'Pearson Education', NULL, NULL),
(78, 15, 2, '2012', NULL, NULL),
(79, 15, 3, '8131774333', NULL, NULL),
(80, 15, 4, '978-8131774335', NULL, NULL),
(81, 15, 5, 'English', NULL, NULL),
(82, 15, 6, '400', NULL, NULL),
(83, 16, 1, 'Springer Nature', NULL, NULL),
(84, 16, 2, '2014', NULL, NULL),
(85, 16, 3, '3319034421', NULL, NULL),
(86, 16, 4, '978-3319034423', NULL, NULL),
(87, 16, 5, 'English', NULL, NULL),
(88, 16, 6, '263', NULL, NULL),
(89, 17, 1, 'Lake George Press', NULL, NULL),
(90, 17, 2, '2014', NULL, NULL),
(91, 17, 3, '0692336842', NULL, NULL),
(92, 17, 4, '978-0692336847', NULL, NULL),
(93, 17, 5, 'English', NULL, NULL),
(94, 17, 6, '94', NULL, NULL),
(95, 18, 1, 'Rupa Publications Private Limited', NULL, NULL),
(96, 18, 2, '2016', NULL, NULL),
(97, 18, 3, '8129130904', NULL, NULL),
(98, 18, 4, '978-8129130907', NULL, NULL),
(99, 18, 5, 'English', NULL, NULL),
(100, 18, 6, '432', NULL, NULL),
(101, 19, 1, 'Kalpaz Publications', NULL, NULL),
(102, 19, 2, '2006', NULL, NULL),
(103, 19, 3, '8178353938', NULL, NULL),
(104, 19, 4, '978-8178353937', NULL, NULL),
(105, 19, 5, 'English', NULL, NULL),
(106, 19, 6, '496', NULL, NULL),
(107, 20, 1, 'Oxford University Press', NULL, NULL),
(108, 20, 2, '2015', NULL, NULL),
(109, 20, 3, '0198745621', NULL, NULL),
(110, 20, 4, '9780198745624', NULL, NULL),
(111, 20, 5, 'English', NULL, NULL),
(112, 20, 6, '184', NULL, NULL),
(113, 21, 1, 'Pearson', NULL, NULL),
(114, 21, 2, '2014', NULL, NULL),
(115, 21, 4, '978-0273792871', NULL, NULL),
(116, 21, 5, 'English', NULL, NULL),
(117, 21, 6, '192', NULL, NULL),
(118, 22, 1, 'CreateSpace Independent Publishing Platform', NULL, NULL),
(119, 22, 2, '2015', NULL, NULL),
(120, 22, 3, '1517409179', NULL, NULL),
(121, 22, 4, '978-1517409173', NULL, NULL),
(122, 22, 5, 'English', NULL, NULL),
(123, 22, 6, '58', NULL, NULL),
(124, 23, 1, 'Central Law Publications', NULL, NULL),
(125, 23, 2, '2015', NULL, NULL),
(126, 23, 3, '938496106X', NULL, NULL),
(127, 23, 4, '978-9384961060', NULL, NULL),
(128, 23, 5, 'English', NULL, NULL),
(129, 23, 6, '492', NULL, NULL),
(130, 24, 1, 'Eastern Book Company', NULL, NULL),
(131, 24, 2, '2015', NULL, NULL),
(132, 24, 3, '9351451550', NULL, NULL),
(133, 24, 4, '978-9351451556', NULL, NULL),
(134, 24, 5, 'English', NULL, NULL),
(135, 24, 6, '928', NULL, NULL),
(136, 25, 1, 'CNBC TV18', NULL, NULL),
(137, 25, 2, '2012', NULL, NULL),
(138, 25, 3, '9380200471', NULL, NULL),
(139, 25, 4, '978-9380200477', NULL, NULL),
(140, 25, 5, 'English', NULL, NULL),
(141, 26, 1, 'Disha Publication', NULL, NULL),
(142, 26, 2, '2016', NULL, NULL),
(143, 26, 3, '8193288971', NULL, NULL),
(144, 26, 4, '978-8193288979', NULL, NULL),
(145, 26, 5, 'English', NULL, NULL),
(146, 26, 6, '360', NULL, NULL),
(147, 27, 1, 'Disha Publication', NULL, NULL),
(148, 27, 2, '2016', NULL, NULL),
(149, 27, 3, '9386146258', NULL, NULL),
(150, 27, 4, '9789386146250', NULL, NULL),
(151, 27, 5, 'English', NULL, NULL),
(152, 27, 6, '456', NULL, NULL),
(163, 31, 5, 'English', NULL, NULL),
(164, 31, 6, '908', NULL, NULL),
(165, 32, 1, 'Chhaya Prakashani Pvt. Ltd.', NULL, NULL),
(166, 32, 2, '2015', NULL, NULL),
(167, 32, 4, '978-81-906486-0-8', NULL, NULL),
(168, 32, 5, 'English', NULL, NULL),
(169, 32, 6, '405', NULL, NULL),
(170, 33, 1, 'S Chand', NULL, NULL),
(171, 33, 3, '8121927838', NULL, NULL),
(172, 33, 4, '9788121927833', NULL, NULL),
(173, 33, 5, 'English', NULL, NULL),
(174, 34, 1, 'Made Easy Publications', NULL, NULL),
(175, 34, 2, '2015', NULL, NULL),
(176, 34, 3, '9351471098', NULL, NULL),
(177, 34, 4, '978-9351471097', NULL, NULL),
(178, 34, 5, 'English', NULL, NULL),
(179, 35, 1, 'Disha Publication', NULL, NULL),
(180, 35, 2, '2016', NULL, NULL),
(181, 35, 3, '9386146258', NULL, NULL),
(182, 35, 4, '9789386146250', NULL, NULL),
(183, 35, 5, 'English', NULL, NULL),
(184, 35, 6, '456', NULL, NULL),
(185, 36, 5, 'English', NULL, NULL),
(186, 36, 6, '480', NULL, NULL),
(187, 37, 1, 'Disha Publication', NULL, NULL),
(188, 37, 2, '2016', NULL, NULL),
(189, 37, 3, '9386146053', NULL, NULL),
(190, 37, 4, '978-9386146052', NULL, NULL),
(191, 37, 5, 'English', NULL, NULL),
(192, 37, 6, '444', NULL, NULL),
(193, 38, 1, 'Vikas Publishing House', NULL, NULL),
(194, 38, 2, '2015', NULL, NULL),
(195, 38, 3, '9325980827', NULL, NULL),
(196, 38, 4, '978-9325980822', NULL, NULL),
(197, 38, 5, 'English', NULL, NULL),
(198, 38, 6, '480', NULL, NULL),
(199, 39, 1, 'Addison Wesley', NULL, NULL),
(200, 39, 2, '2016', NULL, NULL),
(201, 39, 3, '0132930218', NULL, NULL),
(202, 39, 4, '978-0132930215', NULL, NULL),
(203, 39, 5, 'English', NULL, NULL),
(204, 39, 6, '688', NULL, NULL),
(205, 40, 1, 'S. Chand', NULL, NULL),
(206, 40, 2, '2012', NULL, NULL),
(207, 40, 3, '8121926149', NULL, NULL),
(208, 40, 4, '9788121926140', NULL, NULL),
(209, 40, 5, 'English', NULL, NULL),
(210, 41, 1, 'Mcgraw Hill Education', NULL, NULL),
(211, 41, 2, '2014', NULL, NULL),
(212, 41, 3, '933920431X', NULL, NULL),
(213, 41, 4, '9789339204310', NULL, NULL),
(214, 41, 5, 'English', NULL, NULL),
(215, 42, 1, 'Wiley India', NULL, NULL),
(216, 42, 2, '2012', NULL, NULL),
(217, 42, 3, '8126536365', NULL, NULL),
(218, 42, 4, '9788126536368', NULL, NULL),
(219, 42, 5, 'English', NULL, NULL),
(220, 43, 1, 'Made Easy Publications', NULL, NULL),
(221, 43, 2, '2015', NULL, NULL),
(222, 43, 3, '9351471098', NULL, NULL),
(223, 43, 4, '978-9351471097', NULL, NULL),
(224, 43, 5, 'English', NULL, NULL),
(225, 44, 1, 'S.K. Kataria & Sons', NULL, NULL),
(226, 44, 2, '2013', NULL, NULL),
(227, 44, 3, '9350142724', NULL, NULL),
(228, 44, 4, '978-9350142721', NULL, NULL),
(229, 44, 5, 'English', NULL, NULL),
(230, 45, 1, 'CBS', NULL, NULL),
(231, 45, 2, '2012', NULL, NULL),
(232, 45, 3, '8123911718', NULL, NULL),
(233, 45, 4, '9788123911717', NULL, NULL),
(234, 45, 5, 'English', NULL, NULL),
(235, 46, 1, 'Made Easy', NULL, NULL),
(236, 46, 2, '2016', NULL, NULL),
(237, 46, 3, '9351471934', NULL, NULL),
(238, 46, 4, '978-9351471936', NULL, NULL),
(239, 46, 5, 'English', NULL, NULL),
(240, 46, 6, '640', NULL, NULL),
(241, 47, 1, 'Laxmi Publication', NULL, NULL),
(242, 47, 2, '2016', NULL, NULL),
(243, 47, 3, '8131807045', NULL, NULL),
(244, 47, 4, '978-8131807040', NULL, NULL),
(245, 47, 5, 'English', NULL, NULL),
(246, 48, 1, 'S.K. Kataria & Sons', NULL, NULL),
(247, 48, 2, '2013', NULL, NULL),
(248, 48, 3, '9350143747', NULL, NULL),
(249, 48, 4, '978-9350143742', NULL, NULL),
(250, 48, 5, 'English', NULL, NULL),
(251, 49, 1, 'S Chand And Company', NULL, NULL),
(252, 49, 2, '2001', NULL, NULL),
(253, 49, 3, '8121920728', NULL, NULL),
(254, 49, 4, '978-8121920728', NULL, NULL),
(255, 49, 5, 'English', NULL, NULL),
(256, 50, 1, 'Forgotten Books', NULL, NULL),
(257, 50, 2, '2015', NULL, NULL),
(258, 50, 3, '1330644689', NULL, NULL),
(259, 50, 4, '978-1330644683', NULL, NULL),
(260, 50, 5, 'English', NULL, NULL),
(261, 51, 1, 'S Chand', NULL, NULL),
(262, 51, 2, '2007', NULL, NULL),
(263, 51, 3, '8121926165', NULL, NULL),
(264, 51, 4, '978-8121926164', NULL, NULL),
(265, 51, 5, 'English', NULL, NULL),
(266, 52, 1, 'Oxford University Press', NULL, NULL),
(267, 52, 2, '2008', NULL, NULL),
(268, 52, 3, '0199217718', NULL, NULL),
(269, 52, 4, '978-0199217717', NULL, NULL),
(270, 52, 5, 'English', NULL, NULL),
(271, 52, 6, '440', NULL, NULL),
(296, 53, 1, 'Universal Law Publishing - An imprint of LexisNexis', NULL, NULL),
(297, 53, 2, '2015', NULL, NULL),
(298, 53, 3, '9350355868', NULL, NULL),
(299, 53, 4, '978-9350355862', NULL, NULL),
(300, 53, 5, 'English', NULL, NULL),
(301, 53, 6, '654', NULL, NULL),
(308, 54, 1, 'Universal Law Publishing', NULL, NULL),
(309, 54, 2, '2015', NULL, NULL),
(310, 54, 3, '8175344067', NULL, NULL),
(311, 54, 4, '978-8175344068', NULL, NULL),
(312, 54, 5, 'English', NULL, NULL),
(313, 54, 6, '3546', NULL, NULL),
(344, 55, 1, 'Cambridge University Press', NULL, NULL),
(345, 55, 2, '2012', NULL, NULL),
(346, 55, 3, '1107655382', NULL, NULL),
(347, 55, 4, '978-1107655386', NULL, NULL),
(348, 55, 5, 'English', NULL, NULL),
(349, 56, 1, 'Oxford University Press', NULL, NULL),
(350, 56, 2, '2012', NULL, NULL),
(351, 56, 3, '0198075995', NULL, NULL),
(352, 56, 4, '978-0198075998', NULL, NULL),
(353, 56, 5, 'English', NULL, NULL),
(354, 56, 6, '428', NULL, NULL),
(385, 1, 1, 'CreateSpace Independent Publishing Platform', NULL, NULL),
(386, 1, 2, '2018', NULL, NULL),
(387, 1, 3, '1537729640', NULL, NULL),
(388, 1, 4, '978-1537729640', NULL, NULL),
(389, 1, 5, 'English', NULL, NULL),
(390, 1, 6, '108 pages', NULL, NULL),
(391, 57, 1, 'SAGE Texts', NULL, NULL),
(392, 57, 2, '2014', NULL, NULL),
(393, 57, 3, '9351507718', NULL, NULL),
(394, 57, 4, '978-9351507710', NULL, NULL),
(395, 57, 5, 'English', NULL, NULL),
(396, 58, 1, 'Excel Books', NULL, NULL),
(397, 58, 2, '2013', NULL, NULL),
(398, 58, 3, '9350626209', NULL, NULL),
(399, 58, 4, '9789350626207', NULL, NULL),
(400, 58, 5, 'English', NULL, NULL),
(401, 58, 6, '614', NULL, NULL),
(402, 59, 1, 'S. CHAND', NULL, NULL),
(403, 59, 2, '2016', NULL, NULL),
(404, 59, 3, '9352531299', NULL, NULL),
(405, 59, 4, '978-9352531295', NULL, NULL),
(406, 59, 5, 'English', NULL, NULL),
(407, 60, 1, 'Brain Mapping Academy', NULL, NULL),
(408, 60, 2, '2016', NULL, NULL),
(409, 60, 3, '9382058508', NULL, NULL),
(410, 60, 4, '978-9382058502', NULL, NULL),
(411, 60, 5, 'English', NULL, NULL),
(412, 60, 6, '130', NULL, NULL),
(413, 61, 1, 'Sahitya Bhawan Publications', NULL, NULL),
(414, 61, 2, '2016', NULL, NULL),
(415, 61, 3, '9351730603', NULL, NULL),
(416, 61, 4, '978-9351730606', NULL, NULL),
(417, 61, 5, 'English', NULL, NULL),
(418, 62, 1, 'Pearson Education India', NULL, NULL),
(419, 62, 2, '2002', NULL, NULL),
(420, 62, 3, '8131717607', NULL, NULL),
(421, 62, 4, '978-8131717608', NULL, NULL),
(422, 62, 5, 'English', NULL, NULL),
(423, 63, 1, 'I.k. International Group', NULL, NULL),
(424, 63, 2, '2004', NULL, NULL),
(425, 63, 3, '8188237469', NULL, NULL),
(426, 63, 4, '9788188237463', NULL, NULL),
(427, 63, 5, 'English', NULL, NULL),
(428, 64, 1, 'Jaypee Brothers Medical Publishers', NULL, NULL),
(429, 64, 2, '2006', NULL, NULL),
(430, 64, 3, '8180615383', NULL, NULL),
(431, 64, 4, '9788180615382', NULL, NULL),
(432, 64, 5, 'English', NULL, NULL),
(433, 65, 1, 'Oxford University Press', NULL, NULL),
(434, 65, 2, '2016', NULL, NULL),
(435, 65, 3, '0198722826', NULL, NULL),
(436, 65, 4, '978-0198722823', NULL, NULL),
(437, 65, 5, 'English', NULL, NULL),
(438, 66, 1, 'Arihant Prakashan', NULL, NULL),
(439, 66, 2, '2015', NULL, NULL),
(440, 66, 3, '9352036182', NULL, NULL),
(441, 66, 4, '9789352036189', NULL, NULL),
(442, 66, 5, 'English', NULL, NULL),
(443, 66, 6, '720', NULL, NULL),
(444, 67, 1, 'Pearson Education', NULL, NULL),
(445, 67, 2, '2016', NULL, NULL),
(446, 67, 3, '9332575746', NULL, NULL),
(447, 67, 4, '9789332575745', NULL, NULL),
(448, 67, 5, 'English', NULL, NULL),
(449, 68, 1, 'Vayu Education Of India', NULL, NULL),
(450, 68, 2, '2016', NULL, NULL),
(451, 68, 3, '9380712014', NULL, NULL),
(452, 68, 4, '9789380712017', NULL, NULL),
(453, 68, 5, 'English', NULL, NULL),
(454, 69, 1, 'Krishna Prakashan Media P. Ltd.-Meerut', NULL, NULL),
(455, 69, 3, '8182836832', NULL, NULL),
(456, 69, 4, '9788182836839', NULL, NULL),
(457, 69, 5, 'English', NULL, NULL),
(458, 70, 1, 'Jaypee Brothers', NULL, NULL),
(459, 70, 2, '2008', NULL, NULL),
(460, 70, 3, '8184484178', NULL, NULL),
(461, 70, 4, '9788184484175', NULL, NULL),
(462, 70, 5, 'English', NULL, NULL),
(463, 71, 1, 'Prentice Hall India Learning Private Limited', NULL, NULL),
(464, 71, 2, '2008', NULL, NULL),
(465, 71, 3, '8120336356', NULL, NULL),
(466, 71, 4, '978-8120336353', NULL, NULL),
(467, 72, 1, 'Createspace', NULL, NULL),
(468, 72, 3, '1491256443', NULL, NULL),
(469, 72, 4, '9781491256442', NULL, NULL),
(470, 72, 5, 'English', NULL, NULL),
(471, 73, 1, 'MTG Learning Media Private Limited', NULL, NULL),
(472, 73, 2, '2016', NULL, NULL),
(473, 73, 3, '9385966863', NULL, NULL),
(474, 73, 4, '978-9385966866', NULL, NULL),
(475, 73, 5, 'English', NULL, NULL),
(476, 73, 6, '408', NULL, NULL),
(477, 74, 1, 'Disha Publication', NULL, NULL),
(478, 74, 2, '2015', NULL, NULL),
(479, 74, 3, '9385576410', NULL, NULL),
(480, 74, 4, '978-9385576416', NULL, NULL),
(481, 74, 5, 'English', NULL, NULL),
(482, 74, 6, '1108', NULL, NULL),
(483, 75, 1, 'Arihant Publications', NULL, NULL),
(484, 75, 2, '2016', NULL, NULL),
(485, 75, 3, '9351410439', NULL, NULL),
(486, 75, 4, '9789351410430', NULL, NULL),
(487, 76, 1, 'Hodder Education', NULL, NULL),
(488, 76, 2, '2014', NULL, NULL),
(489, 76, 3, '1444181394', NULL, NULL),
(490, 76, 4, '978-1444181395', NULL, NULL),
(491, 76, 5, 'English', NULL, NULL),
(492, 76, 6, '504 pages', NULL, NULL),
(493, 77, 1, 'QUE', NULL, NULL),
(494, 77, 2, '2013', NULL, NULL),
(495, 77, 3, '0789751984', NULL, NULL),
(496, 77, 4, '978-0789751980', NULL, NULL),
(497, 77, 5, 'English', NULL, NULL),
(498, 77, 6, '352', NULL, NULL),
(499, 78, 1, 'McGraw Hill Education', NULL, NULL),
(500, 78, 2, '2010', NULL, NULL),
(501, 78, 3, '0070702101', NULL, NULL),
(502, 78, 4, '978-0070702103', NULL, NULL),
(503, 78, 5, 'English', NULL, NULL),
(504, 78, 6, '810', NULL, NULL),
(505, 79, 1, 'MTG Learning Media (P) Ltd.', NULL, NULL),
(506, 79, 2, '2016', NULL, NULL),
(507, 79, 3, '9385966626', NULL, NULL),
(508, 79, 4, '9789385966620', NULL, NULL),
(509, 79, 5, 'English', NULL, NULL),
(510, 79, 6, '360', NULL, NULL),
(511, 80, 1, 'MTG Learning Media Pvt Ltd', NULL, NULL),
(512, 80, 2, '2016', NULL, NULL),
(513, 80, 3, '9385966634', NULL, NULL),
(514, 80, 4, '9789385966637', NULL, NULL),
(515, 80, 5, 'English', NULL, NULL),
(516, 80, 6, '410', NULL, NULL),
(517, 81, 1, 'MTG Learning Media Pvt Ltd', NULL, NULL),
(518, 81, 2, '2016', NULL, NULL),
(519, 81, 3, '9385966618', NULL, NULL),
(520, 81, 4, '9789385966613', NULL, NULL),
(521, 81, 5, 'English', NULL, NULL),
(522, 81, 6, '470', NULL, NULL),
(523, 82, 1, 'Disha Publication', NULL, NULL),
(524, 82, 2, '2016', NULL, NULL),
(525, 82, 3, '9384905690', NULL, NULL),
(526, 82, 4, '978-9384905699', NULL, NULL),
(527, 82, 5, 'English', NULL, NULL),
(528, 82, 6, '352', NULL, NULL),
(529, 83, 1, 'Arihant', NULL, NULL),
(530, 83, 2, '2016', NULL, NULL),
(531, 83, 3, '8183482856', NULL, NULL),
(532, 83, 4, '978-8183482851', NULL, NULL),
(533, 83, 5, 'English', NULL, NULL),
(534, 83, 6, '558', NULL, NULL),
(535, 84, 1, 'Disha Publication', NULL, NULL),
(536, 84, 2, '2016', NULL, NULL),
(537, 84, 3, '9386146452', NULL, NULL),
(538, 84, 4, '978-9386146458', NULL, NULL),
(539, 84, 5, 'English', NULL, NULL),
(540, 84, 6, '200', NULL, NULL),
(541, 85, 1, 'Disha', NULL, NULL),
(542, 85, 2, '2016', NULL, NULL),
(543, 85, 3, '9386146827', NULL, NULL),
(544, 85, 4, '9789386146823', NULL, NULL),
(545, 85, 5, 'English', NULL, NULL),
(546, 86, 1, 'Arihant', NULL, NULL),
(547, 86, 2, '2016', NULL, NULL),
(548, 86, 3, '9386179067', NULL, NULL),
(549, 86, 4, '978-9386179067', NULL, NULL),
(550, 86, 5, 'English', NULL, NULL),
(551, 87, 1, 'McGraw Hill Education', NULL, NULL),
(552, 87, 2, '2016', NULL, NULL),
(553, 87, 3, '935260346X', NULL, NULL),
(554, 87, 4, '9789352603466', NULL, NULL),
(555, 88, 1, 'Arihant Publication', NULL, NULL),
(556, 88, 2, '2017', NULL, NULL),
(557, 88, 3, '9311123773', NULL, NULL),
(558, 88, 4, '978-9311123776', NULL, NULL),
(559, 88, 5, 'English', NULL, NULL),
(560, 89, 1, 'Arihant', NULL, NULL),
(561, 89, 2, '2017', NULL, NULL),
(562, 89, 3, '9350943409', NULL, NULL),
(563, 89, 4, '9789350943403', NULL, NULL),
(564, 89, 5, 'English', NULL, NULL),
(565, 90, 1, 'Ramesh Publishing', NULL, NULL),
(566, 90, 2, '2017,2018', NULL, NULL),
(567, 90, 3, '9350121417', NULL, NULL),
(568, 90, 4, '9789350121412', NULL, NULL),
(569, 90, 5, 'English', NULL, NULL),
(570, 91, 1, 'Arihant Publications', NULL, NULL),
(571, 91, 2, '2016', NULL, NULL),
(572, 91, 3, '9386179997', NULL, NULL),
(573, 91, 4, '978-9386179999', NULL, NULL),
(574, 91, 5, 'English', NULL, NULL),
(575, 91, 6, '562', NULL, NULL),
(576, 92, 1, 'TBS Planet', NULL, NULL),
(577, 92, 5, 'English', NULL, NULL),
(578, 92, 6, '24', NULL, NULL),
(579, 93, 1, 'HarperCollins Publisher', NULL, NULL),
(580, 93, 2, '0007490623', NULL, NULL),
(581, 93, 3, '9780007490622', NULL, NULL),
(582, 93, 6, '576', NULL, NULL),
(583, 94, 1, 'Transworld', NULL, NULL),
(584, 95, 1, 'EMBASSY BOOKS', NULL, NULL),
(585, 95, 3, '9380227702', NULL, NULL),
(586, 95, 4, '9789380227702', NULL, NULL),
(587, 96, 1, 'PENGUIN INDIA', NULL, NULL),
(588, 96, 3, '0144001012', NULL, NULL),
(589, 96, 4, '9780144001019', NULL, NULL),
(590, 96, 6, '144', NULL, NULL),
(591, 97, 1, 'Penguin Publishing Group', NULL, NULL),
(592, 97, 3, '0451171357', NULL, NULL),
(593, 97, 4, '9780451171351', NULL, NULL),
(594, 98, 1, 'Princeton Review', NULL, NULL),
(595, 98, 2, '2015', NULL, NULL),
(596, 98, 3, '1101881755', NULL, NULL),
(597, 98, 4, '9781101881750', NULL, NULL),
(598, 99, 1, 'Arihant Publications', NULL, NULL),
(599, 99, 2, '2016', NULL, NULL),
(600, 99, 3, '9386179458', NULL, NULL),
(601, 99, 4, '978-9386179456', NULL, NULL),
(602, 99, 5, 'English', NULL, NULL),
(603, 99, 6, '448', NULL, NULL),
(604, 100, 1, 'Arihant Publications', NULL, NULL),
(605, 100, 2, '2016', NULL, NULL),
(606, 100, 3, '938617944X', NULL, NULL),
(607, 100, 4, '978-9386179449', NULL, NULL),
(608, 100, 5, '480', NULL, NULL),
(609, 101, 1, 'Leadstart Publishing Pvt Ltd', NULL, NULL),
(610, 101, 2, '938157605X', NULL, NULL),
(611, 101, 3, '9789381576052', NULL, NULL),
(612, 101, 6, '500', NULL, NULL),
(613, 102, 1, 'Harper Collins Publishers India', NULL, NULL),
(614, 102, 3, '8172234988', NULL, NULL),
(615, 102, 4, '9788172234980', NULL, NULL),
(616, 102, 6, '192', NULL, NULL),
(617, 103, 1, 'Oswaal Books', NULL, NULL),
(618, 103, 2, '1 May 2016', NULL, NULL),
(619, 103, 3, '9351277585', NULL, NULL),
(620, 103, 4, '978-9351277583', NULL, NULL),
(621, 103, 5, 'English', NULL, NULL),
(622, 103, 6, '103', NULL, NULL),
(623, 104, 1, 'G.K. Publications Private Limited', NULL, NULL),
(624, 104, 2, '2016', NULL, NULL),
(625, 104, 3, '935144953X', NULL, NULL),
(626, 104, 4, '978-9351449539', NULL, NULL),
(627, 104, 5, 'English', NULL, NULL),
(628, 104, 6, '292', NULL, NULL),
(629, 105, 1, 'Penguin Books Limited', NULL, NULL),
(630, 105, 2, '2015', NULL, NULL),
(631, 105, 3, '0143333623', NULL, NULL),
(632, 105, 4, '978-0143333623', NULL, NULL),
(633, 105, 5, 'English', NULL, NULL),
(634, 105, 6, '176', NULL, NULL),
(635, 106, 1, 'Bloomsbury Press', NULL, NULL),
(636, 106, 2, '2014', NULL, NULL),
(637, 106, 3, '1408855712', NULL, NULL),
(638, 106, 4, '978-1408855713', NULL, NULL),
(639, 106, 5, 'English', NULL, NULL),
(640, 106, 6, '608', NULL, NULL),
(641, 107, 1, 'Westland', NULL, NULL),
(642, 107, 3, '9380658796', NULL, NULL),
(643, 107, 4, '9789380658797', NULL, NULL),
(644, 107, 6, '414', NULL, NULL),
(645, 108, 1, 'Westland', NULL, NULL),
(646, 108, 2, '2013', NULL, NULL),
(647, 108, 3, '9382618341', NULL, NULL),
(648, 108, 4, '9789382618348', NULL, NULL),
(649, 108, 6, '600', NULL, NULL),
(650, 109, 1, 'HarperCollins Publisher', NULL, NULL),
(651, 109, 2, '2002', NULL, NULL),
(652, 109, 3, '0007282540', NULL, NULL),
(653, 109, 4, '9780007282548', NULL, NULL),
(654, 109, 6, '368', NULL, NULL),
(655, 110, 1, 'V&S Publisher', NULL, NULL),
(656, 110, 2, '2016', NULL, NULL),
(657, 110, 3, '9357940960', NULL, NULL),
(658, 110, 4, '978-9357940962', NULL, NULL),
(659, 110, 5, 'English', NULL, NULL),
(660, 110, 6, '48', NULL, NULL),
(661, 111, 1, 'Westland', NULL, NULL),
(662, 111, 3, '9380658745', NULL, NULL),
(663, 111, 4, '9789380658742', NULL, NULL),
(664, 111, 6, '412', NULL, NULL),
(665, 112, 1, 'Little, Brown Book', NULL, NULL),
(666, 112, 2, '2007', NULL, NULL),
(667, 112, 3, '1904233651', NULL, NULL),
(668, 112, 4, '978-1904233657', NULL, NULL),
(669, 112, 5, 'English', NULL, NULL),
(670, 112, 6, '464', NULL, NULL),
(671, 113, 1, 'Rachna Sagar', NULL, NULL),
(672, 113, 3, '8187863765', NULL, NULL),
(673, 113, 4, '9788187863762', NULL, NULL),
(674, 113, 5, 'English', NULL, NULL),
(675, 114, 1, 'Westland', NULL, NULL),
(676, 114, 2, '2016', NULL, NULL),
(677, 114, 3, '9385724061', NULL, NULL),
(678, 114, 4, '978-9385724060', NULL, NULL),
(679, 114, 5, 'English', NULL, NULL),
(680, 114, 6, '588', NULL, NULL),
(681, 115, 1, 'S Chand 2010', NULL, NULL),
(682, 115, 5, 'Engliish', NULL, NULL),
(683, 115, 6, '728', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `productcategory_relations`
--

CREATE TABLE `productcategory_relations` (
  `prodcat_rltn_id` int(10) UNSIGNED NOT NULL,
  `category_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `productcategory_relations`
--

INSERT INTO `productcategory_relations` (`prodcat_rltn_id`, `category_id`, `product_id`, `created_at`, `updated_at`) VALUES
(2, 18, 2, NULL, NULL),
(3, 2, 2, NULL, NULL),
(4, 7, 3, NULL, NULL),
(5, 1, 3, NULL, NULL),
(6, 7, 4, NULL, NULL),
(7, 1, 4, NULL, NULL),
(8, 15, 5, NULL, NULL),
(9, 2, 5, NULL, NULL),
(10, 38, 6, NULL, NULL),
(11, 5, 6, NULL, NULL),
(12, 53, 7, NULL, NULL),
(13, 11, 7, NULL, NULL),
(14, 1, 7, NULL, NULL),
(15, 53, 8, NULL, NULL),
(16, 11, 8, NULL, NULL),
(17, 1, 8, NULL, NULL),
(18, 53, 9, NULL, NULL),
(19, 11, 9, NULL, NULL),
(20, 1, 9, NULL, NULL),
(21, 47, 10, NULL, NULL),
(22, 10, 10, NULL, NULL),
(23, 1, 10, NULL, NULL),
(24, 47, 11, NULL, NULL),
(25, 10, 11, NULL, NULL),
(26, 1, 11, NULL, NULL),
(27, 47, 12, NULL, NULL),
(28, 10, 12, NULL, NULL),
(29, 1, 12, NULL, NULL),
(30, 47, 13, NULL, NULL),
(31, 10, 13, NULL, NULL),
(32, 1, 13, NULL, NULL),
(33, 47, 14, NULL, NULL),
(34, 10, 14, NULL, NULL),
(35, 1, 14, NULL, NULL),
(36, 47, 15, NULL, NULL),
(37, 10, 15, NULL, NULL),
(38, 1, 15, NULL, NULL),
(39, 47, 16, NULL, NULL),
(40, 10, 16, NULL, NULL),
(41, 1, 16, NULL, NULL),
(42, 47, 17, NULL, NULL),
(43, 10, 17, NULL, NULL),
(44, 1, 17, NULL, NULL),
(45, 47, 18, NULL, NULL),
(46, 10, 18, NULL, NULL),
(47, 1, 18, NULL, NULL),
(48, 47, 19, NULL, NULL),
(49, 10, 19, NULL, NULL),
(50, 1, 19, NULL, NULL),
(51, 47, 20, NULL, NULL),
(52, 10, 20, NULL, NULL),
(53, 1, 20, NULL, NULL),
(54, 47, 21, NULL, NULL),
(55, 10, 21, NULL, NULL),
(56, 1, 21, NULL, NULL),
(57, 48, 22, NULL, NULL),
(58, 10, 22, NULL, NULL),
(59, 1, 22, NULL, NULL),
(60, 48, 23, NULL, NULL),
(61, 10, 23, NULL, NULL),
(62, 1, 23, NULL, NULL),
(63, 48, 24, NULL, NULL),
(64, 10, 24, NULL, NULL),
(65, 1, 24, NULL, NULL),
(66, 48, 25, NULL, NULL),
(67, 10, 25, NULL, NULL),
(68, 1, 25, NULL, NULL),
(69, 7, 26, NULL, NULL),
(70, 1, 26, NULL, NULL),
(71, 7, 27, NULL, NULL),
(72, 1, 27, NULL, NULL),
(79, 8, 31, NULL, NULL),
(80, 1, 31, NULL, NULL),
(81, 8, 32, NULL, NULL),
(82, 1, 32, NULL, NULL),
(83, 8, 33, NULL, NULL),
(84, 1, 33, NULL, NULL),
(85, 9, 34, NULL, NULL),
(86, 1, 34, NULL, NULL),
(87, 9, 35, NULL, NULL),
(88, 1, 35, NULL, NULL),
(89, 9, 36, NULL, NULL),
(90, 1, 36, NULL, NULL),
(91, 42, 37, NULL, NULL),
(92, 9, 37, NULL, NULL),
(93, 1, 37, NULL, NULL),
(94, 42, 38, NULL, NULL),
(95, 9, 38, NULL, NULL),
(96, 1, 38, NULL, NULL),
(97, 42, 39, NULL, NULL),
(98, 9, 39, NULL, NULL),
(99, 1, 39, NULL, NULL),
(100, 43, 40, NULL, NULL),
(101, 9, 40, NULL, NULL),
(102, 1, 40, NULL, NULL),
(103, 43, 41, NULL, NULL),
(104, 9, 41, NULL, NULL),
(105, 1, 41, NULL, NULL),
(106, 43, 42, NULL, NULL),
(107, 9, 42, NULL, NULL),
(108, 1, 42, NULL, NULL),
(109, 44, 34, NULL, NULL),
(110, 44, 43, NULL, NULL),
(111, 9, 43, NULL, NULL),
(112, 1, 43, NULL, NULL),
(113, 44, 44, NULL, NULL),
(114, 9, 44, NULL, NULL),
(115, 1, 44, NULL, NULL),
(116, 44, 45, NULL, NULL),
(117, 9, 45, NULL, NULL),
(118, 1, 45, NULL, NULL),
(119, 45, 46, NULL, NULL),
(120, 9, 46, NULL, NULL),
(121, 1, 46, NULL, NULL),
(122, 45, 47, NULL, NULL),
(123, 9, 47, NULL, NULL),
(124, 1, 47, NULL, NULL),
(125, 45, 48, NULL, NULL),
(126, 9, 48, NULL, NULL),
(127, 1, 48, NULL, NULL),
(128, 46, 49, NULL, NULL),
(129, 9, 49, NULL, NULL),
(130, 1, 49, NULL, NULL),
(131, 46, 50, NULL, NULL),
(132, 9, 50, NULL, NULL),
(133, 1, 50, NULL, NULL),
(134, 46, 51, NULL, NULL),
(135, 9, 51, NULL, NULL),
(136, 1, 51, NULL, NULL),
(137, 49, 52, NULL, NULL),
(138, 10, 52, NULL, NULL),
(139, 1, 52, NULL, NULL),
(148, 49, 53, NULL, NULL),
(149, 10, 53, NULL, NULL),
(150, 1, 53, NULL, NULL),
(153, 49, 54, NULL, NULL),
(154, 10, 54, NULL, NULL),
(155, 1, 54, NULL, NULL),
(166, 50, 55, NULL, NULL),
(167, 10, 55, NULL, NULL),
(168, 1, 55, NULL, NULL),
(169, 50, 56, NULL, NULL),
(170, 10, 56, NULL, NULL),
(171, 1, 56, NULL, NULL),
(182, 1, 1, NULL, NULL),
(183, 7, 1, NULL, NULL),
(184, 50, 57, NULL, NULL),
(185, 10, 57, NULL, NULL),
(186, 1, 57, NULL, NULL),
(187, 51, 58, NULL, NULL),
(188, 10, 58, NULL, NULL),
(189, 1, 58, NULL, NULL),
(190, 51, 59, NULL, NULL),
(191, 10, 59, NULL, NULL),
(192, 1, 59, NULL, NULL),
(193, 52, 60, NULL, NULL),
(194, 10, 60, NULL, NULL),
(195, 1, 60, NULL, NULL),
(196, 52, 61, NULL, NULL),
(197, 10, 61, NULL, NULL),
(198, 1, 61, NULL, NULL),
(199, 60, 62, NULL, NULL),
(200, 14, 62, NULL, NULL),
(201, 1, 62, NULL, NULL),
(202, 60, 63, NULL, NULL),
(203, 14, 63, NULL, NULL),
(204, 1, 63, NULL, NULL),
(205, 60, 64, NULL, NULL),
(206, 14, 64, NULL, NULL),
(207, 1, 64, NULL, NULL),
(208, 61, 65, NULL, NULL),
(209, 14, 65, NULL, NULL),
(210, 1, 65, NULL, NULL),
(211, 61, 66, NULL, NULL),
(212, 14, 66, NULL, NULL),
(213, 1, 66, NULL, NULL),
(214, 62, 67, NULL, NULL),
(215, 14, 67, NULL, NULL),
(216, 1, 67, NULL, NULL),
(217, 62, 68, NULL, NULL),
(218, 14, 68, NULL, NULL),
(219, 1, 68, NULL, NULL),
(220, 62, 69, NULL, NULL),
(221, 14, 69, NULL, NULL),
(222, 1, 69, NULL, NULL),
(223, 63, 70, NULL, NULL),
(224, 14, 70, NULL, NULL),
(225, 1, 70, NULL, NULL),
(226, 63, 71, NULL, NULL),
(227, 14, 71, NULL, NULL),
(228, 1, 71, NULL, NULL),
(229, 63, 72, NULL, NULL),
(230, 14, 72, NULL, NULL),
(231, 1, 72, NULL, NULL),
(232, 64, 73, NULL, NULL),
(233, 14, 73, NULL, NULL),
(234, 1, 73, NULL, NULL),
(235, 64, 74, NULL, NULL),
(236, 14, 74, NULL, NULL),
(237, 1, 74, NULL, NULL),
(238, 64, 75, NULL, NULL),
(239, 14, 75, NULL, NULL),
(240, 1, 75, NULL, NULL),
(241, 12, 76, NULL, NULL),
(242, 1, 76, NULL, NULL),
(243, 12, 77, NULL, NULL),
(244, 1, 77, NULL, NULL),
(245, 12, 78, NULL, NULL),
(246, 1, 78, NULL, NULL),
(247, 13, 79, NULL, NULL),
(248, 1, 79, NULL, NULL),
(249, 13, 80, NULL, NULL),
(250, 1, 80, NULL, NULL),
(251, 13, 81, NULL, NULL),
(252, 1, 81, NULL, NULL),
(253, 15, 82, NULL, NULL),
(254, 2, 82, NULL, NULL),
(255, 15, 83, NULL, NULL),
(256, 2, 83, NULL, NULL),
(257, 15, 84, NULL, NULL),
(258, 2, 84, NULL, NULL),
(259, 16, 85, NULL, NULL),
(260, 2, 85, NULL, NULL),
(261, 16, 86, NULL, NULL),
(262, 2, 86, NULL, NULL),
(263, 16, 87, NULL, NULL),
(264, 2, 87, NULL, NULL),
(265, 17, 88, NULL, NULL),
(266, 2, 88, NULL, NULL),
(267, 17, 89, NULL, NULL),
(268, 2, 89, NULL, NULL),
(269, 17, 90, NULL, NULL),
(270, 2, 90, NULL, NULL),
(271, 23, 91, NULL, NULL),
(272, 2, 91, NULL, NULL),
(273, 24, 92, NULL, NULL),
(274, 3, 92, NULL, NULL),
(275, 24, 93, NULL, NULL),
(276, 3, 93, NULL, NULL),
(277, 24, 94, NULL, NULL),
(278, 3, 94, NULL, NULL),
(279, 25, 95, NULL, NULL),
(280, 3, 95, NULL, NULL),
(281, 25, 96, NULL, NULL),
(282, 3, 96, NULL, NULL),
(283, 25, 97, NULL, NULL),
(284, 3, 97, NULL, NULL),
(285, 26, 98, NULL, NULL),
(286, 3, 98, NULL, NULL),
(287, 26, 99, NULL, NULL),
(288, 3, 99, NULL, NULL),
(289, 26, 100, NULL, NULL),
(290, 3, 100, NULL, NULL),
(291, 27, 101, NULL, NULL),
(292, 3, 101, NULL, NULL),
(293, 27, 102, NULL, NULL),
(294, 3, 102, NULL, NULL),
(295, 27, 103, NULL, NULL),
(296, 3, 103, NULL, NULL),
(297, 28, 104, NULL, NULL),
(298, 3, 104, NULL, NULL),
(299, 28, 105, NULL, NULL),
(300, 3, 105, NULL, NULL),
(301, 28, 106, NULL, NULL),
(302, 3, 106, NULL, NULL),
(303, 29, 107, NULL, NULL),
(304, 3, 107, NULL, NULL),
(305, 29, 108, NULL, NULL),
(306, 3, 108, NULL, NULL),
(307, 29, 109, NULL, NULL),
(308, 3, 109, NULL, NULL),
(309, 30, 110, NULL, NULL),
(310, 3, 110, NULL, NULL),
(311, 30, 111, NULL, NULL),
(312, 3, 111, NULL, NULL),
(313, 31, 112, NULL, NULL),
(314, 3, 112, NULL, NULL),
(315, 31, 113, NULL, NULL),
(316, 3, 113, NULL, NULL),
(317, 31, 114, NULL, NULL),
(318, 3, 114, NULL, NULL),
(319, 32, 115, NULL, NULL),
(320, 4, 115, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `productdiscounts`
--

CREATE TABLE `productdiscounts` (
  `productdiscount_id` int(10) UNSIGNED NOT NULL,
  `discount_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `productdiscounts`
--

INSERT INTO `productdiscounts` (`productdiscount_id`, `discount_id`, `product_id`, `created_at`, `updated_at`) VALUES
(2, 1, 2, NULL, NULL),
(3, 1, 3, NULL, NULL),
(4, 1, 9, NULL, NULL),
(5, 1, 10, NULL, NULL),
(6, 1, 11, NULL, NULL),
(7, 1, 13, NULL, NULL),
(8, 1, 14, NULL, NULL),
(9, 1, 15, NULL, NULL),
(10, 1, 16, NULL, NULL),
(11, 1, 17, NULL, NULL),
(12, 1, 18, NULL, NULL),
(13, 1, 19, NULL, NULL),
(14, 1, 20, NULL, NULL),
(15, 1, 21, NULL, NULL),
(16, 2, 22, NULL, NULL),
(17, 1, 23, NULL, NULL),
(18, 3, 24, NULL, NULL),
(19, 2, 25, NULL, NULL),
(20, 1, 26, NULL, NULL),
(21, 2, 27, NULL, NULL),
(25, 2, 31, NULL, NULL),
(26, 3, 32, NULL, NULL),
(27, 1, 33, NULL, NULL),
(28, 1, 34, NULL, NULL),
(29, 2, 35, NULL, NULL),
(30, 1, 36, NULL, NULL),
(31, 3, 38, NULL, NULL),
(32, 3, 39, NULL, NULL),
(33, 2, 40, NULL, NULL),
(34, 1, 41, NULL, NULL),
(35, 2, 42, NULL, NULL),
(36, 2, 43, NULL, NULL),
(37, 2, 44, NULL, NULL),
(38, 2, 45, NULL, NULL),
(39, 2, 46, NULL, NULL),
(40, 2, 47, NULL, NULL),
(41, 2, 48, NULL, NULL),
(42, 1, 49, NULL, NULL),
(43, 2, 50, NULL, NULL),
(44, 1, 51, NULL, NULL),
(45, 2, 52, NULL, NULL),
(50, 2, 53, NULL, NULL),
(52, 3, 54, NULL, NULL),
(58, 1, 55, NULL, NULL),
(59, 1, 56, NULL, NULL),
(65, 2, 1, NULL, NULL),
(66, 2, 57, NULL, NULL),
(67, 3, 58, NULL, NULL),
(68, 2, 59, NULL, NULL),
(69, 2, 60, NULL, NULL),
(70, 1, 61, NULL, NULL),
(71, 2, 62, NULL, NULL),
(72, 1, 63, NULL, NULL),
(73, 2, 64, NULL, NULL),
(74, 2, 65, NULL, NULL),
(75, 3, 66, NULL, NULL),
(76, 2, 67, NULL, NULL),
(77, 2, 68, NULL, NULL),
(78, 2, 69, NULL, NULL),
(79, 2, 70, NULL, NULL),
(80, 2, 71, NULL, NULL),
(81, 2, 72, NULL, NULL),
(82, 3, 73, NULL, NULL),
(83, 3, 74, NULL, NULL),
(84, 2, 75, NULL, NULL),
(85, 3, 76, NULL, NULL),
(86, 1, 77, NULL, NULL),
(87, 2, 78, NULL, NULL),
(88, 3, 79, NULL, NULL),
(89, 2, 80, NULL, NULL),
(90, 3, 81, NULL, NULL),
(91, 2, 82, NULL, NULL),
(92, 2, 83, NULL, NULL),
(93, 1, 84, NULL, NULL),
(94, 2, 85, NULL, NULL),
(95, 2, 86, NULL, NULL),
(96, 2, 87, NULL, NULL),
(97, 2, 88, NULL, NULL),
(98, 2, 89, NULL, NULL),
(99, 1, 90, NULL, NULL),
(100, 3, 91, NULL, NULL),
(101, 2, 92, NULL, NULL),
(102, 2, 93, NULL, NULL),
(103, 2, 94, NULL, NULL),
(104, 3, 95, NULL, NULL),
(105, 2, 96, NULL, NULL),
(106, 1, 97, NULL, NULL),
(107, 2, 98, NULL, NULL),
(108, 2, 99, NULL, NULL),
(109, 2, 100, NULL, NULL),
(110, 2, 101, NULL, NULL),
(111, 2, 102, NULL, NULL),
(112, 3, 103, NULL, NULL),
(113, 2, 104, NULL, NULL),
(114, 1, 105, NULL, NULL),
(115, 2, 106, NULL, NULL),
(116, 2, 107, NULL, NULL),
(117, 2, 108, NULL, NULL),
(118, 2, 109, NULL, NULL),
(119, 2, 110, NULL, NULL),
(120, 2, 111, NULL, NULL),
(121, 2, 112, NULL, NULL),
(122, 3, 113, NULL, NULL),
(123, 2, 114, NULL, NULL),
(124, 3, 115, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(10) UNSIGNED NOT NULL,
  `product_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_url` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `sku` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `regular_price` decimal(10,2) NOT NULL,
  `discount_price` decimal(10,2) NOT NULL,
  `taxable` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `is_active` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'active',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_name`, `product_url`, `product_code`, `description`, `sku`, `regular_price`, `discount_price`, `taxable`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'A Beginners Guide to Ios 10 and Iphone 7 / 7 Plus', 'a-beginners-guide-to-Ios-10-and-Iphone-7', 'SAPCNIDA', 'If you believe some news stories, the latest iPhone update (iOS 10) is radically different and you should beware of updating! They\'re wrong! This book is for both new users of iPhone and those upgrading to the latest update. I\'ll walk you through the changes and show you why updating is nothing to be afraid of. So why do you need this book? This book was written for my parents; people who needed to know as much as possible, as quickly as possible. There are people who want to know every single little detail about the iPhone, and you will find that in Apple\'s comprehensive manual. If you are like my parents though, new to the iPhone and just want to learn all the basics in about 30 to 60 minutes or an hour that is, then this guide will help you. People who just want to know how to add their contacts, how to take photos, and how to email. It\'s not for advanced users, though if you are upgrading from the previous Apple iOS (iOS 9) then you will most probably find it useful. If you are ready to learn read on!', 'SAPCNIDA', '612.00', '559.00', '1', 'active', '2018-11-05 05:36:18', '2018-11-15 02:43:46'),
(2, 'GATE 2017 Computer Science & IT', 'gate-computer-science-it', 'SENEEQ', 'GATE 2017 Computer Science & IT- Made Easy,  focuses on the syllabus that will need to be mastered for those attempting to pass GATE. The revised and updated book is designed to help GATE aspiring candidates to strengthen their understanding of the concepts of the Computer Science & IT and prepare for the upcoming examination. The book approaches the subject in a very conceptual and coherent manner. The whole book has been divided into topic-wise sections. At the beginning of each subject, analysis of previous papers is given to improve the understanding of subject. This book also contains the conventional questions asked in GATE before 2003. The answers and the explanations of the questions along with the formula and details are provided in a lucid manner, which will facilitate easy mastering of the concepts and their applications. The salient feature of the book is that it covers all the requirements of students and boosts their confidence in preparing for GATE.', 'SENEEQ', '775.00', '549.00', '1', 'active', '2018-11-07 05:59:40', '2018-11-07 05:59:40'),
(3, 'A Programmer\'s Guide To Java SCJP Certification : A Comprehensive Primer', 'a-programmer\'s-guide-to-java-certification -a-comprehensive-primer', 'SAPCNIES', 'This book will help you prepare for and pass the Sun Certified Programmer for the Java Platform SE 6 (CX-310-065) Exam. It is written for any experienced programmer (with or without previous knowledge of Java) interested in mastering the Java programming language and passing the SCJP 1.6 Exam. A Programmer\'s Guide to Java SCJP Certification, Third Edition, provides detailed coverage of all exam topics and objectives, readily runnable code examples, programming exercises, extensive review questions and a new mock exam. In addition, as a comprehensive primer to the Java programming language, this book is an invaluable reference tool. This new edition has been thoroughly updated to focus on the latest version of the exam (CX-310-065). In particular, it contains in-depth explanations of the language features. Their usage is illustrated by way of code scenarios, as required by the exam. The companion Web site contains a version of the SCJP 1.6 Exam Simulator developed by the authors. The site also contains the complete source code for all the book\'s examples, as well as solutions to the programming exercises.', 'SAPCNIES', '789.00', '639.00', '1', 'active', '2018-11-07 07:01:24', '2018-11-07 07:01:24'),
(4, 'A Software Engineer Learns Html5, JavaScript and Jquery', 'a-software-engineer-learns-html5-javascript-and-jquery', 'SAPCNIGR', 'HTML5 web applications are now capable of matching or exceeding the scale and sophistication of desktop applications, but with the unique advantage of running natively inside the web browsers on billions of desktop computers, phones, TVs and tablets.', 'SAPCNIGR', '1569.00', '1419.00', '1', 'active', '2018-11-07 07:47:24', '2018-11-07 07:47:24'),
(5, '20 Practice Sets for IBPS PO Preliminary Exam with 5 Online Tests', '20-practice-sets-for-ibps-po-preliminary-exam-with-5-online-tests', 'SENBKAN', '20 Practice Sets for IBPS Bank PO Preliminary Exam is the revised 2nd edition which has been upgraded with 5 Online Tests for the Prelim Exam.  The book provides 20 Practice Sets - 15 in the book and 5 Online - for the Preliminary Exam  Each Test contains all the 3 sections Reasoning Ability, Quantitative Aptitude and English Language as per the latest pattern.  The solution to each Test is provided at the end of the book. The online tests come with Insta Results and detailed Solutions. This book will really help the students in developing the required Speed and Strike Rate, which will increase their final score in the exam.', 'SENBKAN', '190.00', '179.00', '1', 'active', '2018-11-08 00:40:03', '2018-11-08 00:40:03'),
(6, 'ETE 6th Semester MATRIX (Polytechnic) Organizer', 'ETE 6th Semester MATRIX (Polytechnic) Organizer', 'MPETE6', 'MATRIX is the most popular name among the engineering students. This is a single book which contains all subjects for Electronics & Telecommunication Engineering 3rd Year 6th Semester, consists more than 10 years of  Polytechnic question-answers. Each subject is organised chapter wise, according to Polytechnic syllabus and every chapter contains the Polytechnic questions with solutions, year wise in sequencial order. It is a real helpful guide for examination purpose. Students will get weightage of the chapters and will be more focused.', 'MPETE6', '480.00', '389.00', '1', 'active', '2018-11-08 00:56:34', '2018-11-08 00:56:34'),
(7, '27 Years NEET/ PMT Topicwise Solved Papers CHEMISTRY', '27 Years neet-pmt-topicwise Solved Papers chemistry', 'CHEM27', 'The first ever NEET was held in the month of May 2013. The book also contains the detailed solutions of the NEET paper held on May 18 in Karnataka region (NEET dates were postponed in Karnataka because of assembly elections in the state). Topic-wise Solved Papers are the most important resources must for every student for 3 reasons: They show what types of questions have been asked in the actual exam - knowledge/understanding/application/analytical, theoretical/numerical, Simple MCQ/Assertion-Reason/Passage based MCQ/Matching MCQ/Picture based/Statement based MCQ. They show the trend of the paper over the past years - helps in understanding the examiner\'s psyche to understand what to expect and what not to expect in the exam. To spot the most important and least important topics for the exam - the number of questions asked from each topic in the various years. CBSE - AIPMT + NEET Topic-wise Solved Papers CHEMISTRY contains the past year papers of CBSE-PMT, 1988 to 2012, 2014 (all the years in which CBSE PMT was held) + NEET 2013, distributed in 31 Topics.', 'CHEM27', '225.00', '225.00', '1', 'active', '2018-11-08 01:18:05', '2018-11-08 01:18:05'),
(8, 'class 4 Work Book And Reasoning Book Combo For Nso-imo-ieo-nco (English 2016)', 'class-4-work-book-and-reasoning-book-combo-for-nsoimoieonco-english-2016', 'MTGWRB4', 'class 4 Work Book And Reasoning Book Combo For Nso-imo-ieo-nco (English 2016):his combo is a set of 5 books (1) National Science Olympiad (2) International Maths Olympiad (3) International English Olympiad (4) Official Reasoning Book (5) National Cyber Olympiad.', 'MTGWRB4', '470.00', '449.00', '1', 'active', '2018-11-08 01:40:20', '2018-11-08 01:40:20'),
(9, 'The Official Olympiads Book of Reasoning Class 10', 'the-official-olympiads-book-of-reasoning-class-10', 'MTGOBR10', 'The Official Olympiads  Book of Reasoning Class 10:  Our intelligence and ability to reason is what makes us human. Reasoning skills can be applied in almost every area of our lives. A gauge of one’s intellectual abilities, reasoning enables people to understand ideas and concepts better, and arrive at logical conclusions. Reasoning skills, therefore, have become a part of all sort of testing. Similar to other skills, reasoning can be improved and enhanced through practice and repetition. MTG has design this series of reasoning books to help students appearing for various Olympiads like Science Olympiad, Maths Olympiad, Cyber Olympiad, and other competitive exams.', 'MTGOBR10', '200.00', '179.00', '1', 'active', '2018-11-08 01:47:36', '2018-11-08 01:47:36'),
(10, '75% Torts, Criminal Law, and Contracts Essays', '75-torts-criminal-law-and-contracts-essays', 'SAPLAW', 'This book is not an outline. This book is help for Exams. - Look Inside Easy Law School Semester Reading - A Norma\'s Big Law books Selection - LOOK INSIDE! ! Scoring an A or an A minus in Contracts, Torts, or Criminal Law without knowing everything, means argumentatively \"solutional\" writing. There is a handful of arguments expected on any essay question. Master how to implement these points-rich arguments and do so effortlessly, without knowing every single rule of law that exists. Contracts Torts and Contract law implemented.', 'SAPLAW', '1760.00', '1589.00', '1', 'active', '2018-11-08 01:58:15', '2018-11-08 01:58:15'),
(11, 'Business Communication And Organization And Management', 'business-communication-and-organization-and-management', 'SAPLAX', 'Business Communication And Organization And Management', 'SAPLAX', '395.00', '359.00', '1', 'active', '2018-11-08 02:06:56', '2018-11-08 02:06:56'),
(12, 'Common Law and Ucc Contracts Law for Universities', 'common-law-and-ucc-contracts-law-for-universities', 'SAPLBB', 'This law book if for direct Exam help. This is not merely an outline. - Author\'s multiple bar essays were published after the bar exam. Norma\'s Big Law Books - Have produced published model law school essays The most fundamental elements of Common law contracts a well as the most fundamental elements of the sale of goods under the Uniform Commercial Code are explained, defined and illustrated in a clear and straightforward way to create the Contracts law foundation we will need for the rest of our study career. - Look Inside And Confirm.', 'SAPLBB', '1768.00', '1599.00', '1', 'active', '2018-11-08 02:15:45', '2018-11-08 02:15:45'),
(13, 'CONCISE DICTIONARY OF MANAGEMENT', 'concise-dictionary-of-management', 'SAPLAE', 'This dictionary of management includes the main terminology used in business, plus many more frequently used expressions found in business and management. The definitions are designed to be quick, easy, precise and accurate and have been produced in alphabetical order from A – Z.  This concise dictionary will meet all your needs on management terminology, theories, definitions from various fields of business and management, including jargon, abbreviations and more, in fact any of the vocabulary you might expect to find in a dictionary of this kind. All important terms connected with « Marketing « Finance « Human Resources « Managerial Economics « Organisational Behaviour etc. are covered. Another important feature is the inclusion of leading personalities, organizations and their contributions. Due to relative and growing importance, one chapter has been attributed on the subject of \'Management Theory and Principles\'.  Illustrations and examples, where appropriate, have been added. Even for an average reader, who has not made a special study of commerce subjects, explanations of terms will be found to be easily comprehensible.', 'SAPLAE', '195.00', '179.00', '1', 'active', '2018-11-08 02:22:10', '2018-11-08 02:22:10'),
(14, 'CYBER LAW SIMPLIFIED', 'cyber-law-simplified', 'SAPLAD', '“Interesting, meaningful and expressive. Today, organizations are grappling with the cyber-legal ramifications of their strategies and policies. The book seeks to address this need in a lucid manner and is therefore an asset for decision-makers who may not have a strong foundation in law. In particular, the implications of the Information Technology Act, 2000 have been explained in an easy-to-understand language. On the whole, a book for the times ahead.”   India is in the midst of a cyber-legal-commercial revolution. In order to provide a smooth transition for e-commerce and e-governance, the IT Act, 2000 has been enacted by the Indian Parliament. The Act provides a legal framework for e-commerce and is a step towards facilitating and enforcing legal discipline.  Cyber Law Simplified presents a harmonious analysis of the key provisions of the TI Act, 2000 in consonance with the relevant aspects of several other laws of the land which impact jurisdiction in the cyber work. The book offers solutions to critical cyber-legal problems and would facilitate legal planning, decision making and cyber-legal compliance in the e-world. The simple and reader friendly style of writing would provide a clear understanding of the subject to managers in the areas of systems, business, legal, tax or human resources; CEOs; COOs; CTOs; and IT consultants', 'SAPLAD', '875.00', '709.00', '1', 'active', '2018-11-08 03:30:42', '2018-11-08 03:30:42'),
(15, 'Financial Derivatives : The Currency and Rates Factor', 'financial-derivatives--the-currency-and-rates-factor', 'SAPLAJ', 'To be financially literate in today\'s market, students and professionals in the field of finance must have a solid understanding of the concepts, instruments and application of financial derivatives. This text offers a broad based introduction to financial derivatives and covers both the technical aspects of these instruments and information about the markets in which they are traded. The text balances rigor and accessibility through a clear writing style, a graduated mathematical treatment and an integration of numerous examples and worked out activities to illustrate the application of techniques and facilitate self-assessment.', 'SAPLAJ', '459.00', '419.00', '1', 'active', '2018-11-08 03:34:44', '2018-11-08 03:34:44'),
(16, 'Goals of Civil Justice and Civil Procedure in Contemporary Judicial Systems', 'goals-of-civil-justice-and-civil-procedure-in-contemporary-judicial-systems', 'SAPLAT', 'This book is a collection of papers that address a fundamental question: What is the role of civil justice and civil procedure in the various national traditions in the contemporary world? The book presents striking differences among a range of countries and legal traditions, but also points to common trends and open issues. It brings together prominent experts, professionals and scholars from both civil and common law jurisdictions. It represents all main legal traditions ranging from Europe (Germanic and Romanic countries, Scandinavia, ex-Socialist countries) and Russia to the Americas (North and South) and China (Mainland and Hong Kong). While addressing the main issue – the goals of civil justice – the book discusses the most topical concerns regarding the functioning and efficiency of national systems of civil justice. These include concerns such as finding the appropriate balance between accurate fact-finding and the right to a fair trial within a reasonable time, the processing of hard cases and the function of civil justice as a specific public service. In the mosaic of contrasts and oppositions special place is devoted to the continuing battle between the individualistic/liberal approach and the collectivist/paternalistic approach – the battle in which, seemingly, paternalistic tendencies regain momentum in a number of contemporary justice systems.', 'SAPLAT', '9030.00', '8129.00', '1', 'active', '2018-11-08 03:38:47', '2018-11-08 03:38:47'),
(17, 'How to Write Bar Exam Essays', 'how-to-write-bar-exam-essays', 'SAPLAY', 'Everyone seems to have one part of the bar exam that they dislike more than the others. For some, it is the MBE; for others, the performance test. But, based on surveys of my Bar Exam Mind blog readers, the majority of bar exam students have the most trouble writing bar exam essays.  How to Write Bar Exam Essays gives you a systematic and uncomplicated approach to writing quality bar exam essays.  In addition to being systematic, this book is also a quick read. Most bar exam essay books are huge tomes that take days of struggle to get through. This is unfortunate because the most important thing you can do to ensure you will pass the essay portion of the bar exam is to practice writing essays.  This book shows you how to practice the right way.  How to Write Bar Exam Essays begins with a chapter discussing the right mindset for bar exam preparation. It is important to have the right mindset so you can handle the inevitable highs and lows you will encounter while studying for the bar exam.', 'SAPLAY', '1017.00', '919.00', '1', 'active', '2018-11-08 03:45:07', '2018-11-08 03:45:07'),
(18, 'INDIA\'S PARLIAMENTARY DEMOCRACY ON TRIAL', 'indias-parliamentary-democracy-on-trial', 'SAPLAS', 'India is the worlds largest, most vibrant and stable democracy, a fact generally attributed to Nehrus vision and firm commitment to parliamentary democracy. Today, however, there is widespread disenchantment in the country vis-s-vis the institution of the Parliament. Over the years, it has been marginalized, devalued and made dysfunctional', 'SAPLAS', '395.00', '359.00', '1', 'active', '2018-11-08 03:52:10', '2018-11-08 03:52:10'),
(19, 'Land And People of Indian States & Union Territories (India)', 'land-and-people-of-indian-states--union-territories-india', 'SAPLAV', 'About The Author:- The Editors S.C. Bhatt, had been a writer and journalist with long years of experience as head of important departments in the government. He headed the News Services Division of All India Radio, Publications Division, Directorate of Advertising and Visual Publicity (DAVP) and Research and Reference Division. In the last mentioned department it was his responsibility to produce papers and writeups on matters of importance to the government and the public. Under his supervision the \"INDIA-A Reference Annual\" was produced, both from the Research as well as Reference division. Gopal Bhargava, a prolific writer and author of several books, was a senior official in Town and Country Planning Organization, Ministry of Urban Development, Government of India. First educated at Mayo College Ajmer, and a Post -graduate in Economics from Lucknow University, he is a regular contributor to leading newspapers and academic journals. So far, he has published a good number of papers and articles on various issues, concerning urban development, which is his forte. The map given on the back cover jacket is only illustrative and not true to scale. Contents:- Contents: List of Tables 12: Preface 13: Introduction 15: 1. History 17-28: India-Gupta and Harsha-The Classical Age; The Southern Rivals;: Southern Dynasties in India; The Mughal Empire.: 2. Physical Aspects 29-34: Physical Background; Physical Features; Geological Structure;: Rivers; Climate; Flora; Fauna.: 3. Population 35-70: Population; Population Density; Sex Ratio; Literacy.: 4. Scheduled Caste 71-78: Welfare of Scheduled Castes; Constitutional Safeguards.: 5. Scheduled Tribe 79-85: Scheduled Tribes Development; Special Central Assistance; Scheme: for Primitive Tribal Groups; Tribal Research Institutes.: 6. Other Backward Classes 87-115: Welfare of Backward Classes; National Backward Classes Finance: and Development Corporation; Schemes for the Welfare of the OBCs;: Identification of OBCs; Parliament/Legist', 'SAPLAV', '1350.00', '1219.00', '1', 'active', '2018-11-08 03:57:16', '2018-11-08 03:57:16'),
(20, 'Law A Very Short Introduction', 'law-a-very-short-introduction', 'SAPLAL', 'General readers interested in law, the processes of law, and the various legal systems around the world. Also students of law, philosophy, politics, and the social sciences at undergraduate level and beyond.    About the Author Raymond Wacks is Emeritus Professor of Law and Legal Theory at the University of Hong Kong. He is a prolific and influential writer on legal theory and human rights, in particular the protection of privacy, on which he is a leading international authority. Previous books include Understanding Jurisprudence: An Introduction to Legal Theory (OUP, 2012), Philosophy of Law: A Very Short Introduction (OUP, 2006), and Privacy: A Very Short Introduction (OUP, 2015), which is now in its second edition.', 'SAPLAL', '549.00', '499.00', '1', 'active', '2018-11-08 04:18:26', '2018-11-08 04:18:26'),
(21, 'Law Express Exam Success', 'law-express-exam-success', 'SAPLBA', 'Law Express: Exam Success is designed to help you to relate all your reading and study throughout your course specifically to exam situations. Understand quickly what is required, organise your revision, and learn the key points with ease, to get the grades you need. Tested with examiners and students', 'SAPLBA', '1493.00', '1349.00', '1', 'active', '2018-11-08 04:25:03', '2018-11-08 04:25:03'),
(22, 'An Introduction to Intellectual Property Rights', 'an-introduction-to-intellectual-property-rights', 'SAPLBM', 'The concept of intellectual property states that certain products of human intellect should be afforded the same protective rights that apply to physical properties. It refers to the ownership of intangible and non-physical goods. Since intellectual properties are intangible, it is more difficult to protect them than other types of properties. Because of its monetary implications, Intellectual Property is often used as a legal term to safeguard the rights of creators and inventors. Intellectual Property Rights (IPR) helps to encourage and protect inventors and creators by giving them exclusive rights over their work for a set period of time. This book gives a brief introduction to the concept of Intellectual Property Rights (IPR) and the various components of IPR. It will be a useful book to the student community as well as the public at large.', 'SAPLBM', '457.00', '419.00', '1', 'active', '2018-11-08 04:35:59', '2018-11-08 04:35:59'),
(23, 'Arbitration and Conciliation Act (with ADR)', 'arbitration-and-conciliation-act-with-adr', 'SAPLBN', 'This book provides clear and comprehensive explanation of Law of Arbitration and Conciliation and Alternate Dispute Resolution systems. It is a ready reckoner for many who want to be acquainted with the process of arbitration. The current edition of this book contains the recent judicial pronouncements of the Supreme Court and High Court on various important issues like Arbitration Agreement, Non Party when subjected to Arbitration, Appointment of Foreign Arbitrator in International Commercial Arbitration, Territorial Jurisdiction of the High Court in appointment of Arbitrator, Refusal to appoint arbitrator in allegation of fraud, Mandate of arbitrator when cannot be terminated, Court\'s assistance in Arbitration, Enforcement of Foreign Award and Nationality of arbitrator in case of Foreign Arbitration. It is expected that incorporation of these topics would be extremely useful for the students\' fraternity, academicians, legal professionals and researchers in the field of ADR.', 'SAPLBN', '320.00', '289.00', '1', 'active', '2018-11-08 04:49:39', '2018-11-08 04:49:39'),
(24, 'Company Law', 'company-law', 'SAPLBC', 'In the present edition the author has discussed new concepts introduced by the Companies Act, 2013 such as class action suits, one person company, corporate social responsibility, constitution of National Company Law Tribunal, power of a company to buy its own securities, reduction of share capital, corporate governance, mergers and amalgamations, role and liability of independent directors, function of the Directors\' Nomination and Remuneration Committee, depositor\'s protection, etc.', 'SAPLBC', '651.00', '589.00', '1', 'active', '2018-11-08 04:55:10', '2018-11-08 04:55:10'),
(25, 'Financial Instruments IFRS and IND', 'financial-instruments-ifrs-and-ind', 'SAPLBI', 'The objective of bringing out a separate book on standards of financial instruments is to guide the readers with an easy-to-understand approach. This book on IFRS made easy aims at simplifying the complex phenomenon involved in understanding the principles in terms of classificatio, presentation and reporting of financial instruments. The various concepts related to financial instruments have been addressed. This book covers IAS 39, IAS 32, IFRS 7 and IFRS 9 in detail along with a section on latest updation on topics like hedging, de-recognition, netting and Off-setting and impairment that are still in the process of finalisation. For those who would like to have a refresher on Derivatives, there is a section that covers \"A Primer on Derivatives\". As a value edition to the reading material, we have enclosed a CD that covers, Audio/Visual overview of all the clauses covered under each standard at one shot. This will provide a quick understanding if the coverage in each standard. Experts view captured on video that would give the readers some practical insights and clarity on the standards', 'SAPLBI', '1199.00', '1079.00', '1', 'active', '2018-11-08 05:59:08', '2018-11-08 05:59:08'),
(26, 'Speed Test for GATE Computer Science & Information Technology', 'speed-test-for-gate-computer-science--information-technology', 'SENEEBT', '101 Speed Tests for GATE Computer Science and Information Technology aims at improving your speed and strike rate so as to improve your score. How is this product different? • The book is divided into 101 Speed tests covering three sections with all the topics from General Aptitude, Engineering Mathematics, Technical Section. • These three sections are further divided into 88 topics. • General Aptitude is divided into 10 topics covering Verbal ability and Numerical Ability. • Engineering Mathematics is divided into 15 topics covering Discrete Mathematics; Linear Algebra; Calculus; Probability. • Technical Section is divided into 63 topics covering Digital Logic; Computer Organization and Architecture; Programming and Data Structures; Algorithms; Theory of Computation; Compiler Design; Operating System; Databases; Computer Networks. • 3 Section tests on General Aptitude, Engineering Mathematics, Technical Section. • 10 Full Tests on GATE 2017 Syllabus. • 2400+ Questions with Explanation covering both MCQs and Numerical Answer Type Questions asked in the Exam. • Authentic Solutions to every questions It is our strong belief that if an aspirant works hard on the cues provided through each of the tests he/she can improve his/her learning and finally the SCORE by at least 15-20%', 'SENEEBT', '300.00', '229.00', '1', 'active', '2018-11-13 06:31:42', '2018-11-13 06:31:42'),
(27, '17 years GATE Computer Science & Information Technology Topicwise Solved Papers (2000 - 16) with 4 Online Practice Sets', '17-years-gate-computer-science--information-technology-topicwise-solved-papers-2000--16-with-4-online-practice-sets', 'SENEEAR', '17 years GATE Computer Science & Information Technology Topic-wise Solved Papers (2000 - 16) The book covers fully solved past 17 years question papers from the year 2000 to the year 2016. The salient features are: The book has 3 sections - General Aptitude, Engineering Mathematics and Technical Section. Each section has been divided into Topics. Aptitude - 2 parts divided into 9 Topics, Engineering Mathematics - 8 Topics and Technical Section - 11. Each chapter has 3 parts - Quick Revision Material, Past questions and the Solutions. The Quick Revision Material list the main points and the formulas of the chapter which will help the students in revising the chapter quickly.', 'SENEEAR', '400.00', '299.00', '1', 'active', '2018-11-13 06:38:27', '2018-11-13 06:38:27'),
(31, 'A Modern Approach To Verbal & Non-Verbal Reasoning (English)', 'a-modern-approach-to-verbal--nonverbal-reasoning-english', 'VNVRS16', 'About the Book The book A Modern Approach To Verbal & Non-Verbal Reasoning is a book that has been written with the clear intent of helping you ace this section in whatever competitive examinations you plan to give. It aims to better your reasoning skills as well.  The book has been divided into two distinct sections. The first one is that of Verbal Reasoning, which comprises of two subdivisions that elaborate on various topics. The second section is titled Non-Verbal Reasoning, which branches off into several related topics.A Modern Approach To Verbal & Non-Verbal Reasoning is a book that is bound to be of great help to those students who are gearing up for their entrance examinations. Whether you\'re giving an exam for your MBA, or Civil services, this book can give you the insight that you need to crack the necessary exams. Even if you\'re applying for a job in a bank, the tax department, or the railway department, you can benefit immensely from the information that this book provides you with.  A Modern Approach to Verbal & Non-Verbal Reasoning has been published by S Chand and Co Ltd in the year 2010 and is available in paperback.', 'VNVRS16', '925.00', '579.00', '1', 'active', '2018-11-14 00:19:32', '2018-11-14 00:19:32'),
(32, 'A Text Book Of Basic Engineering Physics (First Year)', 'a-text-book-of-basic-engineering-physics-first-year', 'PH101', 'Follows the WBUT Physics syllabus (Code PH-101) for B. Tech students of all streams(1st year,1st semester).  Oscillation, Physical Optics, Laser, Fiber Optics, Quantum Physics and Crystallography in one book. Comprehensive discussions on basic concepts.', 'PH101', '310.00', '279.00', '1', 'active', '2018-11-14 00:28:36', '2018-11-14 00:28:36'),
(33, 'A Textbook Of Applied Electronics', 'a-textbook-of-applied-electronics', 'SAPEEEGL', 'A Textbook Of Applied Electronics', 'SAPEEEGL', '825.00', '825.00', '1', 'active', '2018-11-14 00:34:26', '2018-11-14 00:34:26'),
(34, 'Civil Engineering Topic-wise Objective Solved Papers', 'civil-engineering-topicwise-objective-solved-papers', 'ECE00014', 'Civil Engineering Topic-wise Objective Solved Papers', 'ECE00014', '650.00', '529.00', '1', 'active', '2018-11-14 00:51:37', '2018-11-14 00:51:37'),
(35, '17 years GATE Computer Science & Information Technology Topicwise Solved Papers (2000 - 16) with 4 Online Practice Sets', '17-years-gate-computer-science--information-technology-topicwise-solved-papers-2000--16-with-4-online-practice-sets', 'SENEEAR', '17 years GATE Computer Science & Information Technology Topic-wise Solved Papers (2000 - 16) The book covers fully solved past 17 years question papers from the year 2000 to the year 2016. The salient features are: The book has 3 sections - General Aptitude, Engineering Mathematics and Technical Section. Each section has been divided into Topics. Aptitude - 2 parts divided into 9 Topics, Engineering Mathematics - 8 Topics and Technical Section - 11. Each chapter has 3 parts - Quick Revision Material, Past questions and the Solutions. The Quick Revision Material list the main points and the formulas of the chapter which will help the students in revising the chapter quickly.', 'SENEEAR', '400.00', '299.00', '1', 'active', '2018-11-14 00:56:47', '2018-11-14 00:56:47'),
(36, '37 Years Chapterwise Solved Papers (2015-1979) IIT-JEE-Mathematics (English)', '37-years-chapterwise-solved-papers-20151979-iitjeemathematics-english', 'JEEM375', 'The present book for JEE Main and Advanced Mathematics has been divided into 26 Chapters namely Complex Numbers, Theory of Equations, Sequences & Series, Permutations & Combinations, Binomial Theorem, Probability, Matrices & Determinants, Functions, Limits, Continuity & Differentiability, Application of Derivatives, Indefinite Integration, Definite Integration, Area, Differential Equations, Straight Line & Pair of Straight Lines, Circle, Parabola, Ellipse, Hyperbola, Trigonometrical Ratios & Identities, Trigonometrical Equations, Inverse Circular Functions, Properties of Triangles, Vectors, 3D Geometry and Miscellaneous, according to the syllabi of the entrance examination. This specialized book contains last 37 Years’ (1979-2015) Chapterwise Solved Questions of IIT JEE Mathematics along with previous years’ solved papers of IIT JEE and JEE Main & Advanced. The entire syllabus of Class 11th and 12th has been dealt with comprehensively in this book. Also all the previous years’ questions along with their authentic & accurate solutions have been covered chapterwise and Topicwise in this book. Also wherever required necessary study material required for comprehensive understanding has been included in each chapter. Solved Paper 2015 JEE Advanced has also been included to help aspirants get an insight into the current pattern of the examination and the types of questions asked therein. As the book contains ample number of previous solved questions and relevant theoretical content, it for sure will help the aspirants score higher in the upcoming JEE Main and Advanced Entrance Examination 2016.', 'JEEM375', '390.00', '309.00', '1', 'active', '2018-11-14 01:02:07', '2018-11-14 01:02:07'),
(37, '29 Years NEET/ AIPMT Topic Wise Solved Papers BIOLOGY', '29-years-neet-aipmt-topic-wise-solved-papers-biology', 'BIOPT', '• NEET/ AIPMT Topic-wise Solved Papers BIOLOGY contains the past year papers of NEET/ AIPMT, 1988 to 2016 (including NEET 2013 & 2016 Ph I) distributed in 38 Topics.  • The Topics have been arranged exactly in accordance to the NCERT books so as to make it 100% convenient to Class 11 & 12 students.  • The fully solved CBSE Mains papers of 2011 & 2012 (the only objective CBSE Mains paper held) have also been incorporated in the book topic-wise.  • The detailed solutions of all questions are provided at the end of each chapter to bring conceptual clarity.  • The students are advised to attempt questions of a topic immediately after they complete a topic in their class/school/home.  • The book contains around 3170+ MILESTONE PROBLEMS IN BIOLOGY.', 'BIOPT', '325.00', '289.00', '1', 'active', '2018-11-14 01:15:50', '2018-11-14 01:15:50'),
(38, 'A First Course In Computers (Based on Windows 8 and MS Office 2013)', 'a-first-course-in-computers-based-on-windows-8-and-ms-office-2013', 'SAPCNIGL', 'If you are one of those who love technology, not for technology\'s sake but for what it can do for you and if you want to be able to say that you \"Know Computers\" instead of \"No Computers\", this is the book for you! A First Course in Computers is a computer manual, quick guide, helpdesk and your computer teacher, all rolled in one. Just keep the book in front of you, look at the sample exercises given at the beginning of each section and start following the step-by-step visual instructions to complete the exercise. Learn easily and effectively - learn by doing. Book Features: Computer Background: Get to know a brief history of computers, different parts of a computer Basic Terms and Concepts: Demystify the computer jargon - bits and bytes, hardware and software, memory and storage Windows 8: Commonly used features and how to get the maximum out of them. How to customize your PC to your needs and preferences Windows 8.1: What\'s new, as compared to Windows 8 MS Word: Create aesthetically appealing documents - letters, reports, memos, faxes, etc quickly and easily. Do spell check and mail merge, create office and personal templates and a lot more MS Excel: Create highly functional spreadsheets, involving tables, graphs and Clip Art images. Sort, filter and query data based upon single or multiple criteria MS PowerPoint: Create effective and visually appealing presentations using text, graphs, movie and animation clips, images organization charts, etc Internet: What is Internet, how to set up a TCP/IP account and configure a modem, surf the Net, create free email accounts, send and receive emails, search the Web for jobs, friends, products, services or any subject, Internet chat and telephony', 'SAPCNIGL', '299.00', '219.00', '1', 'active', '2018-11-14 01:25:23', '2018-11-14 01:25:23'),
(39, 'A Programmer\'s Guide to Java SE 8 Oracle Certified Associate', 'a-programmers-guide-to-java-se-8-oracle-certified-associate', 'SAPCNIGJ', 'Unique among Java tutorials, A Programmer’s Guide to Java SE 8 Oracle Certified Associate (OCA)combines an integrated, expert introduction to Java SE 8 with comprehensive coverage of Oracle’s new Java SE 8 OCA exam 1Z0-808.   Based on Mughal and Rasmussen’s highly regarded guide to the original SCJP Certification, this streamlined volume has been thoroughly revised to reflect major changes in the new Java SE 8 OCA exam. It features an increased focus on analyzing code scenarios and not just individual language constructs, and each exam objective is thoroughly addressed, reflecting the latest Java SE 8 features, API classes, and best practices for effective programming.   Other features include Summaries that clearly state what topics to read for each objective of the Java SE 8 OCA exam Dozens of exam-relevant review questions with annotated answers Programming exercises and solutions to put theory into practice A mock exam with realistic questions to find out if you are ready to take the official exam An introduction to essential concepts in object-oriented programming (OOP) and functional-style programming In-depth coverage of declarations, access control, operators, flow control, OOP techniques, lambda expressions, key API classes, and more Program output demonstrating expected results from complete Java programs Advice on avoiding common pitfalls in writing Java code and on taking the certification exam Extensive use of UML (Unified Modeling Language) for illustration purposes', 'SAPCNIGJ', '3720.00', '3349.00', '1', 'active', '2018-11-14 01:31:16', '2018-11-14 01:31:16'),
(40, 'A Textbook of Organic Chemistry 21st Edition', 'a-textbook-of-organic-chemistry-21st-edition', 'SAPECHDL', 'This examination-oriented book breaks the intricacies of organic chemistry into easy-to-understand steps which gives students necessary foundation to build upon, learn, adn ultimately understand organic chemistry in a way that is efficient as well as long-lasting. The textbook has been written with the students in mind. The language is simple, explanations clear, and presentation very systematic. Step-by-step mechanisms are given throughout. Subject is modern, error-free and up-to-date. This is first Indian organic chemistry textbook completely done in 4-color and on computer. This is also an important textbook for the Engineering and Medical College Entrance Exams', 'SAPECHDL', '925.00', '739.00', '1', 'active', '2018-11-14 01:39:26', '2018-11-14 01:39:26'),
(41, 'A Textbook of Physical Chemistry Volume 5', 'a-textbook-of-physical-chemistry-volume-5', 'SAPECHDS', 'This book is the fifth of the six-volume series, which provides an extensive coverage of Physical Chemistry. Each volume includes a large number of illustrative numerical and typical problems to highlight the principles involved. IUPAC recommendations and SI units have been adopted throughout.The present book describes Adsorption, Chemical Kinetics, Photochemistry, Statistical Thermodynamics, and Macromolecules. A new chapter on Introduction to Irreversible Processes has been added.', 'SAPECHDS', '550.00', '439.00', '1', 'active', '2018-11-14 01:44:25', '2018-11-14 01:44:25'),
(42, 'Analysis And Performance Of Fiber Composites 3rd Edition', 'analysis-and-performance-of-fiber-composites-3rd-edition', 'SAPECHEX', 'Analysis and Composites of Fibre Composites is very helpful to students of civil engineering. The book includes an explanation of all the important concepts in this subject like fibres, matrices, unidirectional composites, orthotropic lamina and much more. The explanations in the book provide the reader with a good understanding and a better efficiency in the subject.', 'SAPECHEX', '709.00', '569.00', '1', 'active', '2018-11-14 01:52:23', '2018-11-14 01:52:23'),
(43, 'Civil Engineering Topic-wise Objective Solved Papers', 'civil-engineering-topicwise-objective-solved-papers', 'ECE00014', 'Civil Engineering Topic-wise Objective Solved Papers', 'ECE00014', '650.00', '529.00', '1', 'active', '2018-11-14 02:08:06', '2018-11-14 02:08:06'),
(44, 'A Course In Civil Engineering Drawing', 'a-course-in-civil-engineering-drawing', 'CED000013', 'A Course In Civil Engineering Drawing', 'CED000013', '395.00', '339.00', '1', 'active', '2018-11-14 02:15:14', '2018-11-14 02:15:14'),
(45, 'A Dictionary Of Civil Engineering', 'a-dictionary-of-civil-engineering', 'SAPECH', 'It is an attempt made by the author to prepare “A Dictionary of Civil Engineering” explaining the common terms used in this field. Civil Engineering terms are arranged alphabetically with their meaning application and self-explanatory illustrations. It is needless to mention that various books have been consulted in preparation of this book. If the terms which have not been included in this are brought to the notice of the author it would be highly appreciated and acknowledged.', 'SAPECH', '350.00', '279.00', '1', 'active', '2018-11-14 02:19:03', '2018-11-14 02:19:03'),
(46, 'GATE-2017: Electrical Engineering Solved Papers', 'gate2017-electrical-engineering-solved-papers', 'SENEEW', 'GATE is an all-India examination that first and foremost tests the all-inclusive understanding of a variety of undergraduate subjects in engineering and science. GATE is conducted in cooperation by the Indian Institute of Science and seven Indian Institutes of Technology (Bombay, Delhi, Guwahati, Kanpur, Kharagpur, Madras and Roorkee). The New Edition Of Gate 2017 Solved Papers: Civil Engineering has been Fully Revised, Updated and Edited. The Whole Book has been Divided into Topic wise Sections. At the Beginning of Each Subject, Analysis of Previous Papers are Given to Improve the Understanding of Subject. This Book also Contains the Conventional Questions Asked in Gate Before 2003. New Edition Of Gate 2017 Solved Papers: Civil Engineering contains 10 Practice Sets which have been designed as per the online format of GATE 2017. The practice sets cover all types of questions recently asked in the GATE Electrical Engineering Examination so as to help aspirants get an insight into the various types of questions asked in the examination.', 'SENEEW', '675.00', '469.00', '1', 'active', '2018-11-14 03:36:11', '2018-11-14 03:36:11'),
(47, 'A Course in Electrical Engineering Materials Pb', 'a-course-in-electrical-engineering-materials-pb', 'SAPEEEHV', 'A Course in Electrical Engineering Materials Pb', 'SAPEEEHV', '450.00', '389.00', '1', 'active', '2018-11-14 04:04:32', '2018-11-14 04:04:32'),
(48, 'A Course In Electrical Power Paperback', 'a-course-in-electrical-power-paperback', 'SAPEEEHY', 'A Course In Electrical Power Paperback', 'SAPEEEHY', '825.00', '739.00', '1', 'active', '2018-11-14 05:14:24', '2018-11-14 05:14:24'),
(49, 'A Text Book Of Transportation Engineering (English)', 'a-text-book-of-transportation-engineering-english', 'TE0001', 'A Text Book Of Transportation Engineering (English)', 'TE0001', '395.00', '359.00', '1', 'active', '2018-11-14 05:22:40', '2018-11-14 05:22:40'),
(50, 'A Text-Book for Architects,Surveyors,Engineers,Medical Officers', 'a-textbook-for-architectssurveyorsengineersmedical-officers', 'ASM00015', 'A Text-Book for Architects,Surveyors,Engineers,Medical Officers', 'ASM00015', '1314.00', '1.00', '1', 'active', '2018-11-14 06:16:35', '2018-11-14 06:16:35'),
(51, 'A Textbook Of Engineering Mechanics(English)', 'a-textbook-of-engineering-mechanicsenglish', 'TEM0007', 'A Textbook Of Engineering Mechanics(English)', 'TEM0007', '695.00', '549.00', '1', 'active', '2018-11-14 06:25:23', '2018-11-14 06:25:23'),
(52, 'Basic Documents in International Law', 'basic-documents-in-international-law', 'SAPLCLAE', 'Basic Documents in International Law provides exactly what it says in the title - the essential, basic, and most important documents needed for the study and understanding of international law. Collated by a world-leading expert, this focused selection of documents will be an excellent resource for both students and practitioners.', 'SAPLCLAE', '3011.00', '2709.00', '1', 'active', '2018-11-15 02:11:49', '2018-11-15 02:11:49'),
(53, 'Constitution of India', 'constitution-of-india', 'SAPLBR', 'Constitution of India by P.M. Bakshi', 'SAPLBR', '295.00', '269.00', '1', 'active', '2018-11-15 02:16:38', '2018-11-15 02:16:38'),
(54, 'Constitutional Law of India', 'constitutional-law-of-india', 'SAPLCLAD', 'Constitutional Law of India (In 3 Volumes)', 'SAPLCLAD', '4250.00', '3829.00', '1', 'active', '2018-11-15 02:21:49', '2018-11-15 02:21:49'),
(55, 'An Introduction To International Criminal Law And Procedure South Asian Edition', 'an-introduction-to-international-criminal-law-and-procedure-south-asian-edition', 'SAPLCRH', 'This market-leading textbook gives an authoritative account of international criminal law, and focuses on what the student needs to know - the crimes that are dealt with by international courts and tribunals as well as the procedures that police the investigation and prosecution of those crimes. The reader is guided through controversies with an accessible, yet sophisticated approach by the author team of four international lawyers, with experience both of teaching the subject, and as negotiators at the foundation of the International Criminal Court and the Rome conference. It is an invaluable introduction for all students of international criminal law and international relations, and now covers developments in the ICC, victims\' rights, and alternatives to international criminal justice, as well as including extended coverage of terrorism. Short, well chosen excerpts allow students to familiarise themselves with primary material from a wide range of sources. An extensive package of online resources is also available.', 'SAPLCRH', '3873.00', '3489.00', '1', 'active', '2018-11-15 02:30:32', '2018-11-15 02:30:32'),
(56, 'Arrest, Detention, and Criminal Justice System: A Study in the Context of the Constitution of India', 'arrest-detention-and-criminal-justice-system-a-study-in-the-context-of-the-constitution-of-india', 'SAPLCRD', 'Fundamental rights enshrined in the Constitution of India protect Indian citizens against the misuse of powers by the state. However, for maintaining law and order, the state authorities often disregard important constitutional provisions and commit human right violations. This book critically examines the criminal justice system in India, focusing on interpretations by the Supreme Court of India. It also analyses the existing laws for arrest and detention and the constitutional validity of punitive measures. Important gap areas such as low conviction rate, weakness of prosecuting agencies, an archaic judicial system, and indiscriminate enforcement of arrest and detention laws have also been addressed. In the light of constitutional provisions, the volume discusses the relevance of procedural safeguards against the arbitrary conduct of the state. With a special focus on individual rights and maintenance of law and order, it suggests ways to balance state\'s responsibilities to bring crime.', 'SAPLCRD', '895.00', '829.00', '1', 'active', '2018-11-15 02:34:26', '2018-11-15 02:34:26'),
(57, 'Constitution of India, Professional Ethics and Human Rights', 'constitution-of-india-professional-ethics-and-human-rights', 'SAPLLRE', 'Written as per the latest Visvesvaraya Technological University (VTU)-prescribed syllabus (for B.E./B.Tech. I & II semesters), Constitution of India, Professional Ethics and Human Rights provides a comprehensive overview of the Constitution of India, the basics of human rights and practice of professional ethics. This textbook aids easy understanding and helps in successfully achieving the objectives and outcomes of this course in the most efficient and effective manner.', 'SAPLLRE', '250.00', '229.00', '1', 'active', '2018-11-15 02:46:20', '2018-11-15 02:46:20'),
(58, 'Business Law : 5th Edition', 'business-law--5th-edition', 'SAPLTLI', 'Business Law', 'SAPLTLI', '699.00', '629.00', '1', 'active', '2018-11-15 03:02:28', '2018-11-15 03:02:28'),
(59, 'Datt & Sundharam\'s Indian Economy', 'datt--sundharams-indian-economy', 'SAPLCLAI', 'A thorough revision of the book was necessitated by the rapid changes taking place in the Indian Economy. All these developments have been discussed at appropriate places in the book. The authors have introduced new analysis of the evolving problems and opportunities for the Indian Economy by way of adding new sections and revising existing chapters.', 'SAPLCLAI', '695.00', '559.00', '1', 'active', '2018-11-15 03:07:25', '2018-11-15 03:07:25'),
(60, 'BMA Talent and Olympiad Exams Resource Book for Mathematics Class 6', 'bma-talent-and-olympiad-exams-resource-book-for-mathematics-class-6', 'TLNTOD6', 'BMA Talent and Olympiad Exams Resource Book for Mathematics Class 6: Textbook on olympiads and scholarship exams.', 'TLNTOD6', '130.00', '119.00', '1', 'active', '2018-11-15 03:29:05', '2018-11-15 03:29:05'),
(61, 'Income Tax Law & Accounts', 'income-tax-law--accounts', 'SAPLTLC', 'Thoroughly revised, enlarged and updated edition Incorporating the provisions of The Finance Act, 2016 and The Income Tax Act, 1961 as amended up-to-date', 'SAPLTLC', '425.00', '389.00', '1', 'active', '2018-11-15 03:34:43', '2018-11-15 03:34:43'),
(62, 'Animal Nutrition', 'animal-nutrition', 'SAPSEEH', 'The latest edition of this classic text, now in a larger format with improved artwork, continues to provide a clear and comprehensive introduction to the science and practice of animal nutrition.', 'SAPSEEH', '889.00', '719.00', '1', 'active', '2018-11-15 03:52:35', '2018-11-15 03:52:35');
INSERT INTO `products` (`product_id`, `product_name`, `product_url`, `product_code`, `description`, `sku`, `regular_price`, `discount_price`, `taxable`, `is_active`, `created_at`, `updated_at`) VALUES
(63, 'At the Bench-A Laboratory Navigator Updated Edition 01 Edition', 'at-the-bencha-laboratory-navigator-updated-edition-01-edition', 'SAPEBTLE', 'At the Bench: A Laboratory Navigator a unique handbook for living and working in the laboratory. Much more than a simple primer or lab manual, this book is an essential aid to understanding: • how research groups work at a human level and how to fit in • what equipment is essential, and how to use it properly • how to get started and get organized • how to set up an experiment • how to handle and use data and reference sources • how to present yourself and your results in print and in person Dr. Barker offers advice, moral support, social etiquette, and professional reassurance along with assume-nothing, step-by-step instructions for those basic but vital laboratory procedures that experienced investigators knowbut may not realize novices don\'t. If you are a graduate student, a physician with research intentions, or a laboratory technician, this book is indispensable.', 'SAPEBTLE', '445.00', '445.00', '1', 'active', '2018-11-15 03:59:26', '2018-11-15 03:59:26'),
(64, 'BIOCHEMISTRY-INSTANT NOTES FOR MEDICAL STUDENTS 1st Edition', 'biochemistryinstant-notes-for-medical-students-1st-edition', 'SAPEBTLA', 'Chemistry of Carbohydrates  Chemistry of Proteins  Chemistry of Lipids  Chemistry of Nucleic Acids  Enzymes  Digestion and Absorption  Biological Oxidation  Carbohydrate Metabolism  Lipid Metabolism  Amino Acid Metabolism  Heme (Porphyrin) Metabolism  Vitamins  Minerals  Nutrition  Acid Base Balance  Molecular Biology  Cell: Structure and Function  Hormones  Detoxification  Nucleotide Metabolism  Viva  Miscellaneous  Mnemonics  Case Reports  Index', 'SAPEBTLA', '495.00', '495.00', '1', 'active', '2018-11-15 04:30:37', '2018-11-15 04:30:37'),
(65, 'A Dictionary of Chemistry (Oxford Quick Reference)', 'a-dictionary-of-chemistry-oxford-quick-reference', 'SAPSCHAE', 'A Dictionary of Chemistry (Oxford Quick Reference):  This revised and updated edition of the popular dictionary covers all aspects of chemistry, from physical chemistry to biochemistry, with wide coverage in areas such as nuclear magnetic resonance, polymer chemistry, nanotechnology and graphene, and absolute configuration. This edition includes new and updated diagrams and biographical entries on key figures, featured entries on major topics such as polymers and crystal defects, and a chronology charting the main discoveries in atomic theory, biochemistry, explosives, and plastics.', 'SAPSCHAE', '310.00', '279.00', '1', 'active', '2018-11-15 04:35:32', '2018-11-15 04:35:32'),
(66, 'CBSE All in One CHEMISTRY Class 11th', 'cbse-all-in-one-chemistry-class-11th', 'SAPSCHDA', 'CBSE All in One CHEMISTRY Class 11th:  CBSE All In One Chemistry Class 11th was published in the year 2015 by Arihant Publications.', 'SAPSCHDA', '450.00', '279.00', '1', 'active', '2018-11-15 04:47:09', '2018-11-15 04:47:09'),
(67, 'Ecology, 6/e Sixth Edition', 'ecology-6e-sixth-edition', 'SAPSEEG', 'Charles Krebs\' best-selling majors-level text approaches ecology as a series of problems that are best understood by evaluating empirical evidence through data analysis and application of quantitative reasoning. No other text presents analytical, quantitative, and statistical ecological information in an equally accessible style for students. Reflecting the way ecologists actually practice, the new edition emphasizes the role of experiments in testing ecological ideas and discusses many contemporary and controversial problems related to distribution and abundance. Ecology: The Experimental Analysis of Distribution and Abundance, Sixth Edition builds on a clear writing style, historical perspective, and emphasis on data analysis with an updated, reorganized discussion of key topics and two new chapters on climate change and animal behavior. Key concepts and key terms are now included at the beginning of each chapter to help students focus on what is most important within each chapter, mathematical analyses are broken down step by step in a new feature called Working with the Data, concepts are reinforced throughout the text with examples from the literature, and end-of-chapter questions and problems emphasize application.', 'SAPSEEG', '669.00', '549.00', '1', 'active', '2018-11-15 05:49:01', '2018-11-15 05:49:01'),
(68, 'Energy Environment Ecology & Society', 'energy-environment-ecology--society', 'SAPSEEF', 'Energy Environment Ecology & Society', 'SAPSEEF', '180.00', '169.00', '1', 'active', '2018-11-15 06:05:50', '2018-11-15 06:05:50'),
(69, 'Environmental Chemistry (Code-271)', 'environmental-chemistry-code271', 'SAPSEEI', 'Environmental Chemistry', 'SAPSEEI', '850.00', '769.00', '1', 'active', '2018-11-15 06:15:32', '2018-11-15 06:15:32'),
(70, 'Medical Research 1st Edition', 'medical-research-1st-edition', 'SAPMRSC', 'Deals with all the steps from conception through presentation of research work. Separate chapters on clinical, public health, mental health, qualitative and laboratory research. Provides guidance on applying for research grants. Would prove valuable while writing a thesis or a research paper, or preparing for a presentation at a conference. Goes into the technical as well as philosophical issues concerning the ethics of experimentation animal as well as human', 'SAPMRSC', '600.00', '539.00', '1', 'active', '2018-11-15 06:25:06', '2018-11-15 06:25:06'),
(71, 'QUANTUM MECHANICS', 'quantum-mechanics', 'SAPSMCA', 'The Second Edition of this concise and compact text offers students a thorough understanding of the basic principles of quantum mechanics and their applications to various physical and chemical problems. This thoroughly class-texted material aims to bridge the gap between the books which give highly theoretical treatments and the ones which present only the descriptive accounts of quantum mechanics. Every effort has been made to make the book explanatory, exhaustive and student friendly. The text focuses its attention on problem-solving to accelerate the student\'s grasp of the basic concepts and their applications. It includes new chapters on Field Quantization and Chemical Bonding. It provides new sections on Rayleigh Scattering and Raman Scattering. It offers additional worked examples and problems illustrating the various concepts involved. This textbook is designed as a textbook for postgraduate and advanced undergraduate courses in physics and chemistry. Solutions Manual containing the solutions to chapter-end exercises is available for instructors', 'SAPSMCA', '350.00', '269.00', '1', 'active', '2018-11-15 06:36:14', '2018-11-15 06:36:14'),
(72, 'Screening for Methicillin-Resistant Staphylococcus Aureus (Mrsa)', 'screening-for-methicillinresistant-staphylococcus-aureus-mrsa', 'SAPMRSL', 'Screening for Methicillin-Resistant Staphylococcus Aureus (Mrsa)', 'SAPMRSL', '1525.00', '1525.00', '1', 'active', '2018-11-15 07:04:25', '2018-11-15 07:04:25'),
(73, '10 Years CBSE Chapter wise Topic wise Physics', '10-years-cbse-chapter-wise-topic-wise-physics', 'SAPSPHQ', '10 Years CBSE Chapter wise Topic wise Physics: We feel pleased and delighted in presenting the book “CBSE Chapter wise- Topic wise Physics”. Special efforts have been put to produce this book in order to equip students with practice material including previous 10 years’ CBSE \'Board Examination\' questions. It will give them comprehensive knowledge of subject according to the latest syllabus and pattern of CBSE \'Board Examination\'. The book will be helpful in imparting students a clear and vivid understanding of the subject.', 'SAPSPHQ', '250.00', '219.00', '1', 'active', '2018-11-15 07:23:56', '2018-11-15 07:23:56'),
(74, 'Ace Physics Vol 1 and 2 for class 11 and 12', 'ace-physics-vol-1-and-2-for-class-11-and-12', 'SSBSTCA', 'Ace Physics Vol 1 and 2 for class 11 and 12', 'SSBSTCA', '740.00', '549.00', '1', 'active', '2018-11-15 07:39:18', '2018-11-15 07:39:18'),
(75, 'CBSE All in One PHYSICS Class 12th', 'cbse-all-in-one-physics-class-12th', 'SSBSTA', 'CBSE All in One PHYSICS Class 12th: CBSE All in One PHYSICS Class 12th', 'SSBSTA', '440.00', '269.00', '1', 'active', '2018-11-15 07:53:54', '2018-11-15 07:53:54'),
(76, 'Cambridge International AS and A Level Business', 'cambridge-international-as-and-a-level-business', 'SAPLAB', 'This title covers the entire syllabus for Cambridge International Examinations\' International AS and A Level Business . It is divided into separate sections for AS and A Level making it ideal for students studying both the AS and the A Level and also those taking the AS examinations at the end of their first year. - Illustrates key concepts using examples from multinationals and businesses that operate around the world - Provides practice throughout the course with carefully selected past paper questions, covering all question types, at the end of each chapter - Using and interpreting data feature emphasises and illustrates the importance of numeracy both in terms of calculations and interpreting numerical     data - Free Revision and practice CD includes interactive tests, selected answers, additional activities, and a glossary', 'SAPLAB', '3144.00', '2829.00', '1', 'active', '2018-11-16 03:48:28', '2018-11-16 03:48:28'),
(77, 'C Programming Absolute Beginner\'s Guide', 'c-programming-absolute-beginners-guide', 'SAPCNIHH', 'Write powerful C programs…without becoming a technical expert! This book is the fastest way to get comfortable with C, one incredibly clear and easy step at a time. You’ll learn all the basics: how to organize programs, store and display data, work with variables, operators, I/O, pointers, arrays, functions, and much more. C programming has neverbeen this simple! Who knew how simple C programming could be? This is today’s best beginner’s guide to writing C programs–and to learning skills you can use with practically any language. Its simple, practical instructions will help you start creating useful, reliable C code, from games to mobile apps. Plus, it’s fully updated for the new C11 standard and today’s free, open source tools! Here’s a small sample of what you’ll learn: • Discover free C programming tools for Windows, OS X, or Linux • Understand the parts of a C program and how they fit together • Generate output and display it on the screen • Interact with users and respond to their input • Make the most of variables by using assignments and expressions • Control programs by testing data and using logical operators • Save time and effort by using loops and other techniques • Build powerful data-entry routines with simple built-in functions • Manipulate text with strings • Store information, so it’s easy to access and use • Manage your data with arrays, pointers, and data structures • Use functions to make programs easier to write and maintain • Let C handle all your program’s math for you • Handle your computer’s memory as efficiently as possible • Make programs more powerful with preprocessing directives', 'SAPCNIHH', '1629.00', '1469.00', '1', 'active', '2018-11-16 03:55:08', '2018-11-16 03:55:08'),
(78, 'Advanced Computer Architecture', 'advanced-computer-architecture', 'SAPCNIFG', 'The new edition offers a balanced treatment of theory, technology architecture and software used by advanced computer systems. It presents state-of-the-art principles and techniques for designing and programming parallel, vector, and scalable computer systems. The emphasis on parallelism, scalability and programmability lends an added flavor to this text. Two new chapters have been added on Instruction Level Parallelism and Recent Advancements in Computer Architecture.', 'SAPCNIFG', '750.00', '609.00', '1', 'active', '2018-11-16 04:25:28', '2018-11-16 04:25:28'),
(79, '39 Years Complete JEE Advance Chapterwise Solutions - Chemistry', '39-years-complete-jee-advance-chapterwise-solutions--chemistry', 'JEEC00016', '39 Years Complete JEE Advance Chapter wise Solutions - Chemistry is the book developed especially for students aiming for engineering entrance exams, JEE advanced. Students looking for answers of subjective questions of previous year JEE advanced papers can refer this book. It accommodates 39 years of IIT-JEE/JEE Advanced; chapter wise solved Chemistry papers.', 'JEEC00016', '400.00', '349.00', '1', 'active', '2018-11-16 04:33:38', '2018-11-16 04:33:38'),
(80, '39 Years Complete JEE Advance Chapterwise Solutions - Maths', '39-years-complete-jee-advance-chapterwise-solutions--maths', 'JEE0016', 'It is designed to brush up complete Mathematics preparation with actual questions came in last 39 Years of JEE Exams. Meticulously demonstrated solutions of this book, will clarify doubts while solving the papers. This book is a tool designed to fine tune all the efforts you have made till now and improve your performance in exam.It is recommended for those looking for answers of previous year JEE Advanced subjective questions. It completes your study and preparation of JEE Advanced exam.', 'JEE0016', '400.00', '349.00', '1', 'active', '2018-11-16 04:43:23', '2018-11-16 04:43:23'),
(81, '39 Years Complete JEE Advance Chapterwise Solutions - Physics', '39-years-complete-jee-advance-chapterwise-solutions--physics', 'JEEA00016', '39 Years Complete JEE Advance Chapter wise Solutions - Physics is the book developed especially for students aiming for engineering entrance exams, JEE advanced. Students looking for answers of subjective questions of previous year JEE advanced papers can refer this book. It accommodates 39 years of IIT-JEE/JEE Advanced; chapter wise solved Physics papers.', 'JEEA00016', '400.00', '349.00', '1', 'active', '2018-11-16 04:56:17', '2018-11-16 04:56:17'),
(82, '101 Speed Tests for IBPS & SBI Bank PO Exam', '101-speed-tests-for-ibps--sbi-bank-po-exam', 'SENBKD', '101 Speed Tests for SBI & IBPS Bank PO Exam, 3rd Edition is a must-have tool for all aspirants, who wish to appear in banking examinations and crack them with big numbers. Increase your opportunity to succeed in the upcoming bank PO exam. This book covers all the major aspects and essentials required to crack the exam in least number of attempts. 101 Speed Tests for SBI & IBPS Bank PO Exam book is based on the TRP concept (Test, Revise and Practice) and aim to help enhance student\'s speed, accuracy and score. The book is divided into five sections covering all the chapters: Quantitative Aptitude, Reasoning Ability, English, Computer Knowledge and General Knowledge', 'SENBKD', '315.00', '239.00', '1', 'active', '2018-11-16 05:33:11', '2018-11-16 05:33:11'),
(83, '151 Essays', '151-essays', 'SENBKAK', 'Nowadays number of competitive and recruitment examinations test the writing ability of the aspirants by including a descriptive English section in the exam. The Descriptive English section covers essay and passage writing to evaluate the effective writing skills of the aspirants. The present book contains ample number of essays which are or may be asked in a number of competitive & recruitment examinations. This book has been designed for the aspirants of UPSC Mains, various State PSCs and other competitive examinations. This book contains 169 essays covering topics of Contemporary, Social, Environmental, Political, Education, Economic, Science & Technology, International, Personalities, Proverbial & Idiomatic, Sports, etc. The essays in the book are meant to provide guidance, knowledge of the topic and stimulating the imagination & enhancing the power of analyzing of the students. The book also contains a list of Important Quotations.', 'SENBKAK', '335.00', '209.00', '1', 'active', '2018-11-16 05:39:41', '2018-11-16 05:39:41'),
(84, '20 Practice Sets for IBPS PO Preliminary Exam with 5 Online Tests', '20-practice-sets-for-ibps-po-preliminary-exam-with-5-online-tests', 'SENBKAN', '20 Practice Sets for IBPS Bank PO Preliminary Exam is the revised 2nd edition which has been upgraded with 5 Online Tests for the Prelim Exam.  The book provides 20 Practice Sets - 15 in the book and 5 Online - for the Preliminary Exam  Each Test contains all the 3 sections Reasoning Ability, Quantitative Aptitude and English Language as per the latest pattern.  The solution to each Test is provided at the end of the book. The online tests come with Insta Results and detailed Solutions. This book will really help the students in developing the required Speed and Strike Rate, which will increase their final score in the exam.', 'SENBKAN', '190.00', '179.00', '1', 'active', '2018-11-16 05:43:50', '2018-11-16 05:43:50'),
(85, '22 Years CSAT General Studies IAS Prelims Topic-wise Solved Papers', '22-years-csat-general-studies-ias-prelims-topicwise-solved-papers', 'SENCSI', '\"Disha\'s BESTSELLER \"\"22 Years CSAT General Studies IAS Prelims Topic-wise Solved Papers (1995-2016)\"\" consists of past years solved papers of the General Studies Paper 1 & 2 distributed into 8 Units and 52 Topics. This is the 7th edition of the book and has been thoroughly revised and updated. The book has been designed in 2 colour so as to improve the readability of the book. The book has been further empowered this year with topic-wise Questions of IAS Main Past Papers of GS Paper 1-4 from 2013-2015 since the syllabus changed. The book also provides Essays divided topic-wise from 1993-2015. The book further covers a Special Section on: (i) Budget 2016 (ii) Bills & Acts (iii) Govt. Policies & Schemes (iv) Diary of National Events 2016; The book has been divided into 8 broad UNITS, which have been further divided into the 52 topics. Although the book contains 37 chapters, certain chapters like Physics, Chemistry, Biology and Trends in Science & Technology are further divided into Topics. The strength of the book lies in the Errorless DETAILED Solutions. The book is 100% useful for both the General Studies papers (1 and 2) of the Prelims/ CSAT.', 'SENCSI', '440.00', '329.00', '1', 'active', '2018-11-16 05:55:19', '2018-11-16 05:55:19'),
(86, 'Arihant 14000 Objective Questions General Studies English', 'arihant-14000-objective-questions-general-studies-english', 'SENCSR', 'Arihant 14000 Objective Questions General Studies English', 'SENCSR', '550.00', '359.00', '1', 'active', '2018-11-16 06:19:29', '2018-11-16 06:19:29'),
(87, 'Books General Studies Paper I 2017', 'books-general-studies-paper-i-2017', 'SENCST', 'Revised and updated every year with the latest developments and events in every field, McGraw Hill’s General Studies Paper 1 Manual has served as a complete self-study guide for thousands of civil services aspirants for the past 33 years.\\nThe manual is systematically structured by treating each subject as a whole, and then organizing relevant information in such a way so as to cater to the specific needs of the readers. Each subject has been developed by a specialist trained in teaching that subject to the beginners. The multiple-choice questions have been accordingly framed as per the UPSC syllabus. The section on Current Events of national and international importance has been updated till August 2016, which gives a complete panorama of national and international affairs.', 'SENCST', '1545.00', '1039.00', '1', 'active', '2018-11-16 06:41:19', '2018-11-16 06:41:19'),
(88, '15 Practice Sets Ordnance Trade Apprentice for Non-ITI Exam 2017', '15-practice-sets-ordnance-trade-apprentice-for-noniti-exam-2017', 'SENDSR', 'An editorial team of highly skilled professionals at Arihant, works hand in glove to ensure that the students receive the best and accurate content through our books. From inception till the book comes out from print, the whole team comprising of authors, editors, proof-readers and various other involved in shaping the book put in their best efforts, knowledge and experience to produce the rigorous content the students receive. Keeping in mind the specific requirements of the students and various examinations, the carefully designed exam oriented and exam ready content comes out only after intensive research and analysis. The experts have adopted whole new style of presenting the content which is easily understandable, leaving behind the old traditional methods which once used to be the most effective. They have been developing the latest content and updates as per the needs and requirements of the students making our books a hallmark for quality and reliability for the past 15 years.', 'SENDSR', '135.00', '119.00', '1', 'active', '2018-11-16 06:46:57', '2018-11-16 06:46:57'),
(89, 'AFCAT (Air Force Common Admission Test)', 'afcat-air-force-common-admission-test', 'SENDSD', 'The Air Force Common Admission Test (AFCAT) is conducted by the Indian Air Force for recruiting Indian men and women candidates as commissioned officers in flying, technical and ground duty branches. This book has been designed for the candidates preparing for AFCAT conducted by the Indian Air Force.', 'SENDSD', '335.00', '219.00', '1', 'active', '2018-11-16 06:57:21', '2018-11-16 06:57:21'),
(90, 'AFCAT (Air Force Common Admission Test) Exam Guide', 'afcat-air-force-common-admission-test-exam-guide', 'SENDSE', 'This comprehensive book is specially developed for the candidates of AFCAT (Air Force Common Admission Test) for Flying & Technical Branch. This book includes Study Material & Previous Years Papers (Solved) for the purpose of practice of questions based on the latest pattern of the examination. Detailed Explanatory Answers have also been provided for the selected questions for Better Understanding of the Candidates', 'SENDSE', '385.00', '279.00', '1', 'active', '2018-11-16 07:05:37', '2018-11-16 07:05:37'),
(91, '16 Years Solved papers AIIMS Entrance Exam (English)', '16-years-solved-papers-aiims-entrance-exam-english', 'AIIMS16', 'The present book for AIIMS MBBS Entrance contains last 16 years’ (2001-2016) Solved Papers of AIIMS MBBS Entrance Exam. The previous years’ solved papers have been designed to help aspirants get an insight into the current and the previous years’ examination patterns. The previous years’ solved papers not only help the candidates understand the types of questions asked in the examination but also serve as a major tool for practicing large number of questions. The book contains authentic and elaborate solutions of the questions asked in the previous years’ AIIMS MBBS Entrance Examinations. The solutions to the previous years’ papers have been covered in detail for comprehensive understanding of the concepts on which the questions are based. As the book contains ample number of previous years’ solved papers, it for sure will help aspirants get an insight into the examination pattern and the types of questions asked in previous years’ AIIMS MBBS Entrance Examinations.', 'AIIMS16', '425.00', '409.00', '1', 'active', '2018-11-16 07:29:25', '2018-11-16 07:29:25'),
(92, 'A Flying Jatt - The Hands of Death (English)', 'a-flying-jatt--the-hands-of-death-english', 'JATTFLY', '\"A Flying Jatt\" is India\'s youngest superhero. Based on the movie \"A Flying Jatt\" by Balaji Motion Pictures starring Tiger Shroff, Jacqueline Fernandes and Nathan Jones in lead roles, this comic book is an action adventure of The Flying Jatt as he unravels a mystery behind mutated fishes.', 'JATTFLY', '199.00', '149.00', '1', 'active', '2018-11-17 01:25:40', '2018-11-17 01:25:40'),
(93, 'Angel of the Dark (English)(Paperback)', 'angel-of-the-dark-englishpaperback', 'AOD10', 'Sidney Sheldon’s Angel Of The Dark revolves around LAPD sleuth Danny McGuire, who is working on his biggest murder investigation. The story takes off from the suspicious and violent murder of wealthy art dealer Andrew Jakes, while his young wife Angela is violently raped and assaulted. McGuire is moved by the plight of the helpless widow and vows to solve the mystery.  Sidney Sheldon’s Angel Of The Dark takes a further turn with the sudden disappearance of the beautiful Angela, who was the only witness that McGuire had, within days of her release from the hospital. Ten years pass and Danny McGuire battles a severe obsession with Angela, the crime and her moving face. Regaining his sanity, he relocates to France where he starts a new life with Interpol and a beautiful wife. Just when life seems blissful, McGuire runs into Matt Daley, the estranged son of Andrew Jakes.  Matt’s enquiries into his father’s murder have thrown up some shocking clues. The duo discovers three similar killings all over the world. All the victims were older and wealthy men, and their wives were assaulted every time. The widow in question always donated some of the money to charities for children and disappeared. Is this the same killer, a ruthless and stunning criminal who assumes various identities?  The duo pursues this shadowy figure from Los Angeles to Italy, and even in London and the French Riviera. Another murder occurs in Hong Kong, and Danny reaches Mumbai in order to prevent the next crime. The investigation suffers due to Matt’s obsession with Lisa Baring, another beautiful victim. The story has thrilling twists and is sure to keep readers hooked till the very end.', 'AOD10', '350.00', '309.00', '1', 'active', '2018-11-17 03:43:17', '2018-11-17 03:43:17'),
(94, 'Digital Fortress (English) (Paperback)', 'digital-fortress-english-paperback', 'DFT889', 'Digital Fortress, a science fiction thriller novel by Dan Brown, was published in 1998 and since then has been translated into several foreign languages.  To avoid public unrest, the common man of course is kept oblivious of the fact that the NSA is using its supercomputer, the TRANSLTR, to pry into their emails, with the objective of maintaining national security. Anxiety starts brewing, when an NSA expellee, devises an ingenious algorithm that is effective in formulating codes that even the TRANSLTR is incapable of decrypting.  Stumped by this new dilemma, Strathmore, commander of NSA, assigns the head cryptographer, Susan Fletcher to translate it. As Susan works on cracking this complicated cipher, Digital Fortress, she discerns the identity of the coder: Ensei Tankado, who strictly disapproves infringing upon people’s private lives! Susan further discovers that Tankado’s design, is to auction the Digital Fortress algorithm on his website and if this isn’t bad enough, ‘NDAKOTA’, his partner would expose it freely to the world, in the event of Tankado’s death. This would be too big a blow for the NSA.  Before enough can be done to crack the code however, news arrives from Seville that Tankado had died of what seemed to be a heart attack. When Commander Strathmore dispatches Susan’s fiancé to salvage the victim’s thumb ring, which he believes holds the key to disclose digital Fortress, Becker arrives to find that Tankado entrusted the ring to someone just before he died. While Becker tries to gather further information, an unknown assassin goes around slaughtering everyone that he has questioned.  The story spins deeper into the labyrinth with a series of events all taking place synchronously; we witness the enigmatic phone conversation between Numakata and NDAKOTA. The book ends by revealing the true identity of NDAKOTA and finally, the secret of Digital Fortress.  The novel is quite fast paced and like all of Dan Brown’s books, has received favorable reviews world over.', 'DFT889', '399.00', '349.00', '1', 'active', '2018-11-17 03:55:23', '2018-11-17 03:55:23'),
(95, 'Air Hostess Diaries (English)(PP)', 'air-hostess-diaries-englishpp', 'AHD105', 'Let\'s be honest. All of us has always been curious about the life of an air-hostess. Women have wanted to be in their shoes, and men have wanted to be, well, in their arms. The industry has always been associated with glamour.  So we take a beautiful lady who is patient, efficient,knows what to do in an emergency, has fluent communication skills and a knowledge of understanding and handling people all the time – dress her up in an immaculate uniform and there you have a potential air-hostess.  What is it like have a high flying career, staying in deluxe hotel rooms, meeting new people each day from students to celebrities?  Enter the world Priety Singh, Air Hostess Extraordinary. You will share the exciting experiences that she and her fellow cabin crew members face day in and day out. You will live the life they lead and share the bonding they forge with each other. You will be exposed to the innermost secrets of this glamourous profession as Priety records all her varied experiences and learning.  Read about airline parties, boyfriend problems, house hunting pub visits and all that makes the world of an air-hostess the exciting world it is – a coaster ride of ups, downs and round abouts', 'AHD105', '150.00', '129.00', '1', 'active', '2018-11-17 04:17:55', '2018-11-17 04:17:55'),
(96, 'Old Man And His God (English)(Paperback)', 'old-man-and-his-god-englishpaperback', 'OMA15', 'The Old Man And His God is a collection of short stories by Sudha Murthy based on her own experiences as she encounters many different kinds of people in the course of her work.  Summary Of The Book  In the introduction to The Old Man And His God, the author says that she is often asked how such interesting incidents happen to her. Her answer is that these are ordinary incidents and encounters that occur in the life of everyone. It is just that many people do not observe and record them.  The book contains stories that hold up a mirror to every characteristic of humanity, generosity, selfishness, greed, contentment, and ambition. These are tales of people’s behavior and reactions in ordinary circumstances and during crisis.  She tells the story of a banyan tree in a remote village in Karnataka that gives shelter to travelers under its shade, and of the man who sits on a stone under the tree and lets passersby share the seat and their troubles with him, acting as a counselor to them, letting them unburden their worries on him for a while.  There are stories of women trying to make a difference in the community against odds, of acts of selfishness and generosity in times of disaster, of young professionals and the attitudes that make some of them succeed in the corporate race.  There is also the title story of an old couple in a small temple, who give the author shelter during a storm. They then refuse an offer of help from her, saying that they are happy with what they have, offering a lesson in contentment.  As the author herself points out, the stories in The Old Man And His God are ordinary events that might happen to anyone. In her case, she is sensitive enough that they leave a lasting impression upon her and she learns from each of them. She also happens to be a good writer who shares these experiences with her readers.  About Sudha Murthy  Sudha Murthy is the chairman of Infosys Foundation.  She has written numerous other books like Gently Falls The Bakula, Dollar Bahu, Wise and Otherwise, and How I Taught My Grandmother To Read And Other Stories.  Sudha Murthy, who holds a Master’s Degree in Computer Science from IISc, was the first female engineer to be hired by TELCO. She is active in many social causes. She has received the R. K. Narayan\'s Award for Literature and the Padma Shri. She is married to Narayana Murthy, the co-founder of Infosys.  buy online with DealsPolo.com', 'OMA15', '250.00', '229.00', '1', 'active', '2018-11-17 04:27:18', '2018-11-17 04:27:18'),
(97, 'The Agony and the Ecstasy: A Biographical Novel of Michelangelo(Paperback)', 'the-agony-and-the-ecstasy-a-biographical-novel-of-michelangelopaperback', 'AAE102', 'Summary of the Book  In the wake of the Renaissance, amidst the turbulence and chaos of artists trying to make a living and the Church’s tribulations as warring Popes, the de’Medici family and the crazed monk Savonarola clashed constantly, one man was about to rewrite history. He was a born lover of women, and his charisma and talent drew beauties such as the daughter of Lorenzo de’Medici himself, and the melancholic and gorgeous Vittoria Colonna. He was born into a family of small-scale bankers in the heart of Tuscany. Despite his parents’ hope that he would study grammar, the boy had other things in mind. Destiny had decided that the world needed a sculptor, an artist like it had never seen before. It found him in this boy, this man who would be driven by the Church and by his own insane dedication to his work to create some of the greatest works of art in history. That man was Michelangelo Buonarroti, and this is his story.  About Irving Stone  Irving Stone was an American writer, known for his biographical novels. He has also written Lust For Life, the biography of Vincent Van Gogh and Dear Theo, a collection of Van Gogh’s letters to his brother.  The Agony and the Ecstasy was adapted into a 1965 film starring Charlton Heston and Rex Harrison.', 'AAE102', '350.00', '319.00', '1', 'active', '2018-11-17 05:51:27', '2018-11-17 05:51:27'),
(98, '500 Practice Questions For The New Sat (English)', '500-practice-questions-for-the-new-sat-english', 'NW500', '500 Practice Questions For The New Sat (English):Want to crack the New SAT Test that you have always wanted to? Of course, you can succeed by scoring high scores in your New SAT by making 500+ Practice Questions for The New Sat your study partner. This book has all the practice questions & answers specifically created for the redesigned SAT exam! You will be able to have a look at all the types of questions on the redesigned SAT. The New SAT has a greater emphasis on advanced math, evidence-based reading and writing, critical reading skills, and real-world analysis. Every practice question has a detailed answer, and explanations with step-by-step strategies you will need. The book has an introductory guide to the major changes on the SAT Hands-on exposure to the new four-choice format, and multi-step problems, passage-based grammar questions, and extended thinking grid-ins. It is important to work through all 500+ practice questions since the higher-level math and critical-reading skills are tested. It is also very important to use your current knowledge, and use specific drills to improve your skills. 500+ Practice Questions for The New Sat is authored and published by Princeton Review.', 'NW500', '699.00', '599.00', '1', 'active', '2018-11-17 05:57:05', '2018-11-17 05:57:05'),
(99, 'All In One MATHEMATICS CBSE Class 10th Term II', 'all-in-one-mathematics-cbse-class-10th-term-ii', 'AOMCBSE10', 'All In One MATHEMATICS CBSE Class 10th Term II:The fully revised and updated edition has been authored by an experienced examiner providing all explanations and guidance needed for effective study and for ultimately achieving success in the CBSE Class X Term-II Mathematics examination. The whole syllabus for Mathematics Class X Term II has been divided into nine chapters namely Quadratic Equations, Arithmetic Progressions, Circles, Constructions, Some Applications of Trigonometry, Probability, Coordinate Geometry, Areas Related to Circles and Surface Areas and Volumes, each containing complete study of all the chapters covered in the NCERT Mathematics Textbook along with complete explanation of all the questions given in the textbook. The book contains solutions to all NCERT Textbook Exercise questions. Also separate sections for summative assessment and formative assessment have been provided in the book. The Summative Assessment section contains questions in the format in which these are asked in the examinations i.e. very short answer type, short answer type, long answer type and application oriented questions. The challengers section containing ample number of unsolved questions has also been provided for assessing the level of preparation. Also 10 full length sample question papers strictly based on the whole syllabus and pattern of the examination have been provided at the end of the book to help aspirants get feel of the real examination and help them in self-analyzing the level of preparation for the upcoming Class X Term-II Mathematics examination.', 'AOMCBSE10', '295.00', '219.00', '1', 'active', '2018-11-17 06:01:04', '2018-11-17 06:01:04'),
(100, 'All In one SCIENCE CBSE Class 10th Term II', 'all-in-one-science-cbse-class-10th-term-ii', 'AOSCBSEII', 'All In one SCIENCE CBSE Class 10th Term II:As the name suggests, this book has been designed to serve the purpose of complete study, complete practice and complete assessment. This book has been a first choice of teachers and students since its first edition. The book has been designed for the students of Class X preparing for Science Term-II Examination strictly on the lines of CBSE Science curriculum. The fully revised and updated edition has been authored by an experienced examiner providing all explanations and guidance needed for effective study and for ultimately achieving success in the CBSE Class X Term- examination. The whole syllabus for Science Class X Term II has been divided into eight chapters namely Carbon and Its Compounds, Periodic Classification of Elements, How do Organisms Reproduce, Heredity and Evolution, Light: Reflection and Refraction, the Human Eye and the Colourful World, Our Environment and Management of Natural Resources, each containing complete study of all the chapters covered in the NCERT Science Textbook along with complete explanation of all the questions given in the textbook. The book contains solutions to all NCERT Textbook Exercise questions. Also separate sections for summative assessment and formative assessment have been provided in the book. The Summative Assessment section contains questions in the format in which these are asked in the examinations i.e. very short answer type, short answer type, long answer type and application oriented questions. The challengers section containing ample number of unsolved questions has also been provided for assessing the level of preparation. Also 10 full length sample question papers strictly based on the whole syllabus and pattern of the examination have been provided at the end of the book to help aspirants get feel of the real examination and help them in self-analyzing the level of preparation for the upcoming Class X Term-II Science examination. As the revised and updated version of this bestseller book focuses on topical study followed by cumulative practice, this book for sure will help the aspirants score high grades in the upcoming Class X Science Term-II examination.', 'AOSCBSEII', '295.00', '249.00', '1', 'active', '2018-11-17 06:07:28', '2018-11-17 06:07:28'),
(101, 'ASURA TALES OF THE VANQUISHED : THE STORY OF RAVANA AND HIS PEOPLE (English)(Paperback)', 'asura-tales-of-the-vanquished-the-story-of-ravana-and-his-people-englishpaperback', 'ATR12', 'Asura: Tale Of The Vanquished is a retelling of the famous Indian epic, Ramayana, from the villain\'s point of view.  Summary Of The Book  In this bestseller, Neelakantan tries to break the age old tradition where history is always narrated by the victors.Asura: Tale Of The Vanquished dares to narrate the tale of the Asura people. Blending mythology, religion and history, the book narrates the tale from Ravana and Bhadra\'s perspective.  The book talks about how the Asura community is more liberal than the orthodox Deva clan, which was highly biased. It also attacks the evil practices of the Brahmin caste. From the tale of Mahabali, Vamana, and Sita’s Agni-Pareeksha, to Jatayu’s meeting with Ravana, the author reveals the many human emotions behind these stories and logically presents a new perspective for the readers.  How wrong was Ravana to challenge the mighty gods for his daughter\'s sake? Was he evil for deciding to lead life in his own terms? Was he wrong for freeing the people from the caste-cased Deva reign? The author takes the readers on an enthralling journey and poses many such complex questions.  Bhadra is a creative character who gives voice to the common man, who is lost amidst the villains and heroes. The author has been appreciated for his eye for detail, which gives life to his work. The right blend of good language and interesting twists keeps the book engaging.  Published in 2012, the book has topped many bestseller lists including the 2012 Crossword and the bestseller list ofCNN IBN.  About Anand Neelakantan  Anand Neelakantan is a talented narrator from India. Asura: The Tale of the Vanquished is Neelakantan’s debut novel. He is currently working on another mythological tale that details the Kaurava’s version of the Mahabharata. He has a few satirical short stories to his credit.  Born in Kerala, Anand has been fascinated with mythology since his childhood. He is married to Aparna, and has two children, Abhinav and Ananya. Besides writing, Anand enjoys oil painting, reading, and drawing cartoons.', 'ATR12', '349.00', '319.00', '1', 'active', '2018-11-17 06:22:26', '2018-11-17 06:22:26'),
(102, 'THE ALCHEMIST (English)(Paperback)', 'the-alchemist-englishpaperback', 'TMP01', 'A novel rich in metaphors and symbolism, The Alchemist is a story based on the adventures of a young shepherd boy, who, upon deciding to follow his prophetic dreams, sets on a treasure hunt. This journey introduces him to some remarkable people who leave an indelible and profound mark on him.  Summary Of The Book  The Alchemist was first published in 1988. The protagonist of the story, a young Andalusian shepherd boy named Santiago, is plagued with recurring dreams, wherein a mysterious child urges him to look for buried treasure at the base of the Egyptian pyramids. Determined, he leaves Spain and heads towards Egypt. En route, he meets the King of Salem, a man named Melchizedek. Melchizedek introduces Santiago to the concept of a ‘Personal Legend’ or a personal map or a quest that guides him to what his heart truly desires.  While attempting to cross the Sahara desert on the way to Egypt, he joins a caravan which is driven by an Englishman who is aspiring to be an alchemist. During a stop over in Al-Fayoum, Santiago meets Fatima, a young girl of exceeding beauty who steals his heart. He asks her to marry him, but she declines saying that she will do so only once he has found the treasure he seeks. In the Saharan oasis of Al-Fayoum, Santiago meets a 200 year old alchemist who decides to accompany him on his expedition. He imparts wisdom and valuable knowledge to Santiago, who eventually understands why the supposed treasure keeps evading him.  Having sold over 65 million copies worldwide, The Alchemist is marked by its profound simplicity, the easy flow of the story, and the poignant moral it tries to teach the reader, that worldly possessions and extravagance are immaterial when compared to finding your own ‘Personal Legend’.  About Paulo Coelho  Paulo Coelho, born in 1947, is an author and songwriter.  He has authored Eleven Minutes, Veronika Decides to Die, The Witch of Portobello, Brida, The Pilgrimage, and The Zahir.  One of the most popular authors in the world, Coelho initially had a very lucrative career as a lyricist and theatre director, but he quit that to become a full-time writer. Having published over thirty books, Coelho also maintains a regular blog called Walking The Path. He has been awarded numerous prestigious international awards such as the Crystal Award by the World Economic Forum, the The Honorable Award of the President of the Republic by the President of Bulgaria, and was named the Messenger of Peace of the United Nations in 2007. His wife, Christina Oiticica, and him, divide their time between Europe and Rio de Janeiro.  buy online with DealsPolo.com', 'TMP01', '299.00', '269.00', '1', 'active', '2018-11-17 06:29:00', '2018-11-17 06:29:00'),
(103, 'The Canterville Ghost English', 'the-canterville-ghost-english', 'TCGS11', 'The Canterville Ghost English: The Canterville Ghost English', 'TCGS11', '69.00', '69.00', '1', 'active', '2018-11-17 06:37:26', '2018-11-17 06:37:26'),
(104, 'English Maximizer for NTSE (National Talent Search Examination)', 'english-maximizer-for-ntse-national-talent-search-examination', 'MAXNTSE7', 'English Maximizer for NTSE (National Talent Search Examination)', 'MAXNTSE7', '195.00', '169.00', '1', 'active', '2018-11-19 00:32:02', '2018-11-19 00:32:02'),
(105, 'Grandma\'s Bag of Stories', 'grandmas-bag-of-stories', 'GRNDMA', 'Memories of a grandparent spinning tales around animals and mysterious characters have kept many of us rapt till date. Sudha Murty\'s Grandma’s Bag of Stories is simply delightful. The story starts with Anand, Krishna, Raghu and Meena arriving at their grandparents’ house in Shiggaon. Overjoyed Ajji and Ajja(Grandmother and grandfather in Kannada) get the house ready, while Ajji prepares delicious snacks for children. Finally, times comes when everyone gathers around Ajji, as she opens her big bag of stories. She tells stories of kings and cheats, princesses and onions, monkeys and mice and scorpions and hidden treasures', 'GRNDMA', '250.00', '199.00', '1', 'active', '2018-11-19 00:40:06', '2018-11-19 00:40:06'),
(106, 'Harry Potter and the Deathly Hallows (English)', 'harry-potter-and-the-deathly-hallows-english', 'HPCJR7', 'Harry Potter and the Deathly Hallows (English): Harry Potter is going to leave the Dursleys and Privet Drive for one last time. The future awaiting him is full of threats for everybody associated with him. As such, Harry has lost much till now. In order to set himself free, Harry has to demolish Voldemort’s residual Horcruxes. Further, he has to conquer the Dark Lord’s forces of devil with the help of his friends Ron and Hermione. In this conclusive edition of the Harry Potter series, Harry has to leave his most trustworthy friends and move forward to a last dreadful journey. This new edition is a class-apart and a part of the internationally acclaimed series. This book has an enormous level of child appeal. So, this can be passed on to the next generations. IT’S TIME TO PASS THE MAGIC ON.', 'HPCJR7', '699.00', '619.00', '1', 'active', '2018-11-19 00:44:55', '2018-11-19 00:44:55'),
(107, 'The Secret Of The Nagas (English)(Paperback)', 'the-secret-of-the-nagas-englishpaperback', 'TSN112', 'Today, He is a God. 4000 years ago, He was just a man.   The hunt is on. The sinister Naga warrior has killed his friend Brahaspati and now stalks his wife Sati. Shiva, the Tibetan immigrant who is the prophesied destroyer of evil, will not rest till he finds his demonic adversary. His vengeance and the path to evil will lead him to the door of the Nagas, the serpent people. Of that he is certain.   The evidence of the malevolent rise of evil is everywhere. A kingdom is dying as it is held to ransom for a miracle drug. A crown prince is murdered. The Vasudevs ? Shiva?s philosopher guides ? betray his unquestioning faith as they take the aid of the dark side. Even the perfect empire, Meluha is riddled with a terrible secret in Maika, the city of births. Unknown to Shiva, a master puppeteer is playing a grand game.   In a journey that will take him across the length and breadth of ancient India, Shiva searches for the truth in a land of deadly mysteries ? only to find that nothing is what it seems.   Fierce battles will be fought. Surprising alliances will be forged. Unbelievable secrets will be revealed in this second book of the Shiva Trilogy, the sequel to the #1 national bestseller, The Immortals of Meluha.  About the Author Amish is a 36 year old, IIM (Kolkata) educated boring banker turned happy author. The success of his debut book, The Immortals of Meluha (Book 1 of the Shiva Trilogy), encouraged him to give up a fourteen year old career in financial services to focus on writing. He is passionate about history, mythology and philosophy. He believes there is beauty and meaning in all world cultures and religions. The Secret of the Nagas is the second book of the Shiva Trilogy.   Amish lives in Mumbai with his wife Preeti and son Neel. He is presently working on the third book of the Shiva Trilogy, The Oath of the Vayuputras.', 'TSN112', '295.00', '269.00', '1', 'active', '2018-11-19 00:49:42', '2018-11-19 00:49:42');
INSERT INTO `products` (`product_id`, `product_name`, `product_url`, `product_code`, `description`, `sku`, `regular_price`, `discount_price`, `taxable`, `is_active`, `created_at`, `updated_at`) VALUES
(108, 'The Oath of the Vayuputras: Shiva Trilogy 3 (English)(Paperback)', 'the-oath-of-the-vayuputras-shiva-trilogy-3-englishpaperback', 'OTV101', 'India’s own super hero is finally here. Shiva has risen yet again to destroy the evildoers. The last of the Shiva Trilogy, this book promises to keep the readers gripped while the great warrior discovers who his true enemies are and gives it his all to destroy them.  Summary of the Book  The Oath of the Vayuputras is the final book of the Shiva Trilogy. In the earlier books of the trilogy, Shiva finds out that the Nagas are not his enemies and joins hands with them to reach the root of all evil. This book will have answers to ‘the Neelkanth’s’ questions about his fate, the choices he made previously and karma.  Further, in the concluding book of the trilogy, Shiva reaches Panchavati, the capital of Naga where he will come face to face with his greatest enemy. Will he win the battle over his wicked enemies, who are out to destroy him and his legacy?  The Oath of the Vayuputras will also reveal the reason of Shiva’s close friend Brahaspati’s disappearance and reappearance at the end of the second book, The Secret of the Nagas. Further the relationship between Daksha, the king of Meluha and the mysterious temple priests will also be exposed in this last part of the trilogy. Shiva seeks helps from the Vayuputras in the quest to conquer all evil.  The great warrior will encounter the real intentions of some characters he deemed to be close to him. Some new characters will add that extra vitality to the entire plot, especially Shiva’s greatest enemy whose name sends shivers down the spines of many great warriors.  An interesting journey of a warrior who is turned into a God by his followers because of his deeds and war against the evil, this book is sure to have its readers’ full attention. A good read which will make one reflect on their actions, this book like the two earlier books of the trilogy focuses on philosophy, religion and the never ending battle between the good and the evil.  About Amish Tripathi  Amish Tripathi, is an author who gave up his banking job to live his dream of becoming a writer. He is an IIM (Kolkata) graduate and worked for 14 years in the financial services industry. He has penned down three books as part of theShiva Trilogy 3, which have received raving reviews and critical appreciation. His style of writing is fresh and has given birth to a new era of literature in India. With philosophy, religion, karma and myth as his main areas of focus, Amish has weaved his plots around them and conquered the hearts of many readers with his riveting ideas. Amish lives with his wife Preethi and son Neel in Mumbai. As is evident from his books, Amish has a passion for religion, philosophy, mythology and history.  buy online with DealsPolo.com', 'OTV101', '395.00', '349.00', '1', 'active', '2018-11-19 00:59:26', '2018-11-19 00:59:26'),
(109, 'The Murder of Roger Ackroyd (English)(Paperback)', 'the-murder-of-roger-ackroyd-englishpaperback', 'TMR153', 'Agatha Christie spins her most famous tale yet, a mystery that baffles even the great and powerful Hercule Poirot in The Murder of Roger Ackroyd.  Summary of the Book  When Roger Ackroyd is found murdered, the event rocks the little English village of King’s Abbot. Ackroyd was to marry the beautiful widow Ferrars, who’d died merely a few hours before of an accidental overdose of veronal. Who murdered Roger Ackroyd, and more importantly, why? Hercule Poirot comes to the little village to find the answers, and he soon discovers that this is going to be an unusual case.  About Agatha Christie  Agatha Christie was an English novelist best known for her murder mystery novels. She created several best-selling storylines centred around timeless characters such as Hercule Poirot, Miss Marple, Tommy and Tuppence and Parker Pyne. Some of her best-known books are Curtain: Poirot’s Last Case, And Then There Were None and The Murder of Roger Ackroyd.', 'TMR153', '359.00', '319.00', '1', 'active', '2018-11-19 01:03:45', '2018-11-19 01:03:45'),
(110, 'Olympiad Planner 9', 'olympiad-planner-9', 'ODPLNR9', 'Olympiad Planner 9: Textbook on olympiads and scholarship exams.', 'ODPLNR9', '100.00', '92.00', '1', 'active', '2018-11-19 01:11:33', '2018-11-19 01:11:33'),
(111, 'The Immortals of Meluha (English)(Paperback)', 'the-immortals-of-meluha-englishpaperback', 'TIM141', 'The Immortals Of Meluha is a thrilling story about a warrior named Shiva, who is given the responsibility to protect the empire of Meluha from dangerous intruders. This mythological novel is fast-paced, and focuses on duty, love, principles and more.  Summary Of The Book  The land of Meluha is an empire created by Lord Rama, and it is ruled by the Suryavanshis. This empire is powerful and proud, however, the Saraswati river that is their source of water is slowing drying up. On top of that, the empire is at war with the Chandravanshis who have allied with The Nagas, a group of sinister and deformed human beings who have extraordinary martial art skills.  The Immortals Of Meluha, published in 2010, is the first story of the trilogy. Daksha, the king of the Suryavanshis, realizes that his empire needs help. He invites a tribe from Tibet to help him fight off the enemies. The Tibetan Guna tribe is lead by Shiva, who is a fearless soldier, and the only one who does not fall ill on arriving at Meluha. To everyone\'s surprise, Shiva’s throat turns blue.  The locals believe that this warrior is their fabled saviour Lord Shiva, also known as Neelkanth. Shiva goes to Devagiri to meet Daksha and his daughter Princess Sati. There, he learns about the dangerous wars and terror attacks that the Chandravanshis have carried out on the Meluhans.  The brave warrior gets enraged, and declares a full war on the enemy. Readers will find this mythological fantasy to be gripping and exciting. Questions about Shiva’s duty, destiny, and karma arise throughout the book. The author has written a book that is adventurous, mystifying, and captivating, but at the same time he also has thrown light onto the subjects of what is evil, and who is truly a hero.  This page-turner is a treat for readers who enjoy history, fantasy, and adventure. The Immortals Of Meluha received good reviews from leading newspapers, and was a bestseller within its first week of release.   About Amish Tripathi  Amish Tripathi, born in 1974, is an Indian author. The second book of the series, The Secret of the Nagas, was published in 2011. The third and the last, The Oath of the Vayuputras, was released in 2013. The author’s books have become the fastest selling book series in the history of Indian publishing. A total of 1.7 million copies have been sold, with a gross retail sale of Rs. 40 crores.  Tripathi’s books revolve around religious and mythological topics, as he is a devotee of Lord Shiva. Tripathi graduated from the Indian Institute of Management, Calcutta, and worked in the financial sector for fourteen years in companies such as IDBI Federal Life Insurance, Standard Chartered, and DBS Bank. In 2012, he was ranked at position 85 of Forbes India’s Celebrity 100 list.', 'TIM141', '295.00', '249.00', '1', 'active', '2018-11-19 01:30:36', '2018-11-19 01:30:36'),
(112, 'Twilight (English)', 'twilight-english', 'Twilight', 'Twilight (Twilight Saga) is written by Stephenie Meyer. The author of the book has released 4 novels annually from 2005 to 2008. The story is based on a teenage girl named Bella Swan who moves to Forks, Washington and falls in love with Edward Cullen, who is a 104 year old vampire. The book has gained popularity, since the release of its first novel in 2005. The love story of a girl and a vampire was popular amongst all age groups. All the four books have won various awards and most notably the 2008 British Book Award for \"Children\'s Book of the Year\" for Breaking Dawn, whereas the entire series had won the 2009 Kids\' Choice Award for Favourite Book. Globally, 120 million copies of the series have sold out in more than 37 languages. Consecutively, the four books have set the record of bestselling novel in 2008. The books later turned into The Twilight Saga series of motion pictures by Summit Entertainment. After the release of first three books the adaptation of the film took place and the first film was released in November 2011 and the second in November 2012, whereas the fourth book is adapted into two full-length films. Alike, the novel Twilight, the series Twilight Saga had broken all the records at the box office. The book is available at reasonable rates.', 'Twilight', '482.00', '429.00', '1', 'active', '2018-11-19 01:37:42', '2018-11-19 01:37:42'),
(113, 'Together with Biology for ClassX', 'together-with-biology-for-classx', 'TBC10', 'Together with Biology for ClassX', 'TBC10', '220.00', '205.00', '1', 'active', '2018-11-19 01:44:13', '2018-11-19 01:44:13'),
(114, 'The Sialkot Saga (English)', 'the-sialkot-saga-english', 'SIALKOT', 'When it’s a question of money, everybody is of the same religion.’ The trajectories of Arvind and Arbaaz, both ‘businessmen’ of a kind whose lives are unwillingly intertwined, ricochet off one another while they play out their sinister and murderous plots of personal and professional one-upmanship, all the while breaking every rule in the book. Both are unaware that what they seek and fight over is the very obstacle in realising an ancient secret that dates back to a time long forgotten. And yet, at the heart of it all, there lies tenderness... and pathos... and blood... and rare moments of an almost exalted happiness. So, can it be that a man is both sinner and saint, victor and victim, black and white? Ashwin Sanghi, master storyteller and spinner of yarns, weaves together once more threads of the past and present, fact and fiction, history and mythology, business and politics, love and hatred while dangling you ceaselessly over the cliff with this chilling multi-layered narrative, keeping you guessing till the totally unguessable end. And you’re left wondering whether it’s a matter of faith... or fate?', 'SIALKOT', '350.00', '299.00', '1', 'active', '2018-11-19 01:48:54', '2018-11-19 01:48:54'),
(115, 'A New Approach Financial Accounting For Professional Student (English)', 'a-new-approach-financial-accounting-for-professional-student-english', 'ANAFA4PS', 'This book \"A New Approach to Financial Accounting\" has been specially designed to make your first acounting experience meaningful and interesting For Professional Students. Table Of Contents: Chapter-1: Accounting: The Language of Business Chapter-2: Accounting Principles: The Foundation of Accounting Chapter-3: Double Entry System and Accounting Equation Chapter-4: Journal & Its Subdivision Chapter-5: Ledger Chapter-6: Cash Book & Bank Reconciliation Statement Chapter-7: Trial Balance & Errors Chapter-8: Capital, Revenue & Reserves Chapter-9: Asset Accounting Chapter-10: Financial Statements Chapter-11: Accounting for Non-Profit Making Organisation Chapter-12: Accounting for Shares & Debentures Chapter-13: Corporate Financial Statement & Annual Report Chapter-14: Cash Flow Statement Chapter-15: Financial Statement Analysis', 'ANAFA4PS', '295.00', '269.00', '1', 'active', '2018-11-19 02:08:26', '2018-11-19 02:08:26');

-- --------------------------------------------------------

--
-- Table structure for table `product_images`
--

CREATE TABLE `product_images` (
  `id` int(10) UNSIGNED NOT NULL,
  `product_id` int(11) NOT NULL,
  `image_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_primary` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_images`
--

INSERT INTO `product_images` (`id`, `product_id`, `image_name`, `is_primary`, `created_at`, `updated_at`) VALUES
(3, 2, '/photos/1/MATRIX-550x470.jpg', '1', NULL, NULL),
(4, 4, '/photos/1/MATRIX-550x470.jpg', '1', NULL, NULL),
(5, 5, '/photos/1/27 Years NEET PMT Topicwise Solved Papers CHEMISTRY-550x470.jpg', '1', NULL, NULL),
(6, 6, '/photos/1/MATRIX-550x470.jpg', '1', NULL, NULL),
(7, 6, '/photos/1/27 Years NEET PMT Topicwise Solved Papers CHEMISTRY-550x470.jpg', '1', NULL, NULL),
(8, 7, '/photos/1/27 Years NEET PMT Topicwise Solved Papers CHEMISTRY-550x470.jpg', '1', NULL, NULL),
(9, 8, '/photos/1/class 4 Work Book And Reasoning Book Combo For Nso imo ieo nco English 2016-550x470.jpg', '1', NULL, NULL),
(10, 9, '/photos/1/The Official Olympiads Book of Reasoning For Class 10  English-550x470.jpg', '1', NULL, NULL),
(11, 10, '/photos/1/SAPLAW-550x470.jpg', '1', NULL, NULL),
(12, 11, '/photos/1/SAPLAX-550x470.jpeg', '1', NULL, NULL),
(13, 12, '/photos/1/27 Years NEET PMT Topicwise Solved Papers CHEMISTRY-550x470.jpg', '1', NULL, NULL),
(14, 13, '/photos/1/SAPLAE-550x470.jpg', '1', NULL, NULL),
(15, 14, '/photos/1/SAPLAD-550x470.jpg', '1', NULL, NULL),
(16, 15, '/photos/1/SAPLAJ-550x470.jpeg', '1', NULL, NULL),
(17, 16, '/photos/1/SAPLAT-550x470.jpeg', '1', NULL, NULL),
(18, 17, '/photos/1/SAPLAY-550x470.jpeg', '1', NULL, NULL),
(19, 18, '/photos/1/SAPLAS-550x470.jpeg', '1', NULL, NULL),
(20, 19, '/photos/1/SAPLAV-320x250.jpg', '1', NULL, NULL),
(21, 20, '/photos/1/SAPLAL-550x470.jpg', '1', NULL, NULL),
(22, 21, '/photos/1/SAPLBA-550x470.jpg', '1', NULL, NULL),
(23, 22, '/photos/1/SAPLBM-550x470.jpg', '1', NULL, NULL),
(24, 23, '/photos/1/SAPLBN-550x470.jpeg', '1', NULL, NULL),
(25, 24, '/photos/1/SAPLBC-550x470.jpeg', '1', NULL, NULL),
(26, 25, '/photos/1/SAPLBI-550x470.jpg', '1', NULL, NULL),
(27, 26, '/photos/1/SENEEBT-550x470.jpg', '1', NULL, NULL),
(28, 27, '/photos/1/SENEEAR-550x470.jpg', '1', NULL, NULL),
(30, 31, '/photos/1/a-modern-approach-to-verbal-non-verbal-reasoning-400x400-shwy123-550x470.jpeg', '1', NULL, NULL),
(31, 31, '/photos/1/a-modern-approach-to-verbal-non-verbal-reasoning-400x400-shwy123-550x470.jpeg', '1', NULL, NULL),
(32, 32, '/photos/1/A Text Book Of Basic Engineering Physics-550x470.jpeg', '1', NULL, NULL),
(33, 32, '/photos/1/A Text Book Of Basic Engineering Physics-550x470.jpeg', '1', NULL, NULL),
(34, 33, '/photos/1/SAPEEEGL-550x470.jpg', '1', NULL, NULL),
(35, 33, '/photos/1/SAPEEEGL-550x470.jpg', '1', NULL, NULL),
(36, 34, '/photos/1/Civil Engineering Topic-wise Objective Solved Papers-550x470.jpg', '1', NULL, NULL),
(37, 34, '/photos/1/Civil Engineering Topic-wise Objective Solved Papers-550x470.jpg', '1', NULL, NULL),
(38, 35, '/photos/1/SENEEAR-550x470 (1).jpg', '1', NULL, NULL),
(39, 35, '/photos/1/SENEEAR-550x470 (1).jpg', '1', NULL, NULL),
(40, 36, '/photos/1/37-years-chapterwise-solved-2015-1979-iit-jee-mathematics-400x400-sinwmee-550x470.jpeg', '1', NULL, NULL),
(41, 36, '/photos/1/37-years-chapterwise-solved-2015-1979-iit-jee-mathematics-400x400-sinwmee-550x470.jpeg', '1', NULL, NULL),
(42, 37, '/photos/1/29 Years NEET AIPMT Topic Wise Solved Papers BIOLOGY-550x470.jpg', '1', NULL, NULL),
(43, 37, '/photos/1/29 Years NEET AIPMT Topic Wise Solved Papers BIOLOGY-550x470.jpg', '1', NULL, NULL),
(44, 38, '/photos/1/SAPCNIGL-550x470.jpg', '1', NULL, NULL),
(45, 38, '/photos/1/SAPCNIGL-550x470.jpg', '1', NULL, NULL),
(46, 39, '/photos/1/SAPCNIGJ-550x470.jpg', '1', NULL, NULL),
(47, 39, '/photos/1/SAPCNIGJ-550x470.jpg', '1', NULL, NULL),
(48, 40, '/photos/1/SAPECHDL-550x470.jpeg', '1', NULL, NULL),
(49, 40, '/photos/1/SAPECHDL-550x470.jpeg', '1', NULL, NULL),
(50, 41, '/photos/1/SAPECHDS-550x470.jpeg', '1', NULL, NULL),
(51, 41, '/photos/1/SAPECHDS-550x470.jpeg', '1', NULL, NULL),
(52, 42, '/photos/1/SAPECHEX-550x470.jpeg', '1', NULL, NULL),
(53, 42, '/photos/1/SAPECHEX-550x470.jpeg', '1', NULL, NULL),
(54, 43, '/photos/1/Civil Engineering Topic-wise Objective Solved Papers-550x470.jpg', '1', NULL, NULL),
(55, 43, '/photos/1/Civil Engineering Topic-wise Objective Solved Papers-550x470.jpg', '1', NULL, NULL),
(56, 44, '/photos/1/A Course In Civil Engineering Drawing-550x470.jpg', '1', NULL, NULL),
(57, 44, '/photos/1/A Course In Civil Engineering Drawing-550x470.jpg', '1', NULL, NULL),
(58, 45, '/photos/1/SAPECH-550x470.jpeg', '1', NULL, NULL),
(59, 45, '/photos/1/SAPECH-550x470.jpeg', '1', NULL, NULL),
(60, 46, '/photos/1/SENEEW-550x470.jpg', '1', NULL, NULL),
(61, 46, '/photos/1/SENEEW-550x470.jpg', '1', NULL, NULL),
(62, 47, '/photos/1/SAPEEEHV-550x470.jpg', '1', NULL, NULL),
(63, 47, '/photos/1/SAPEEEHV-550x470.jpg', '1', NULL, NULL),
(64, 48, '/photos/1/SAPEEEHY-550x470.jpg', '1', NULL, NULL),
(65, 48, '/photos/1/SAPEEEHY-550x470.jpg', '1', NULL, NULL),
(66, 49, '/photos/1/A Text Book Of Transportation Engineering (English)-550x470.jpg', '1', NULL, NULL),
(67, 49, '/photos/1/A Text Book Of Transportation Engineering (English)-550x470.jpg', '1', NULL, NULL),
(68, 50, '/photos/1/A Text-Book for Architects,Surveyors,Engineers,Medical Officers-550x470.jpg', '1', NULL, NULL),
(69, 50, '/photos/1/A Text-Book for Architects,Surveyors,Engineers,Medical Officers-550x470.jpg', '1', NULL, NULL),
(70, 51, '/photos/1/A Textbook Of Engineering Mechanics(English)-550x470.jpg', '1', NULL, NULL),
(71, 51, '/photos/1/A Textbook Of Engineering Mechanics(English)-550x470.jpg', '1', NULL, NULL),
(76, 52, '/photos/1/SAPLCLAE-550x470.jpg', '1', NULL, NULL),
(77, 52, '/photos/1/SAPLCLAE-550x470.jpg', '1', NULL, NULL),
(82, 53, '/photos/1/SAPLBR-550x470.jpeg', '1', NULL, NULL),
(83, 53, '/photos/1/SAPLBR-550x470.jpeg', '1', NULL, NULL),
(85, 54, '/photos/1/SAPLCLAD-550x470.jpg', '1', NULL, NULL),
(86, 54, '/photos/1/SAPLCLAD-550x470.jpg', '1', NULL, NULL),
(94, 55, '/photos/1/SAPLCRH-550x470.jpg', '1', NULL, NULL),
(95, 55, '/photos/1/SAPLCRH-550x470.jpg', '1', NULL, NULL),
(96, 56, '/photos/1/SAPLCRD-550x470.jpg', '1', NULL, NULL),
(97, 56, '/photos/1/SAPLCRD-550x470.jpg', '1', NULL, NULL),
(107, 1, '/photos/1/SAPCNIDA-550x470.jpg', '1', NULL, NULL),
(108, 1, '/photos/1/SAPCNIDA-550x470.jpg', '0', NULL, NULL),
(109, 57, '/photos/1/SAPLLRE-550x470.jpg', '1', NULL, NULL),
(110, 57, '/photos/1/SAPLLRE-550x470.jpg', '1', NULL, NULL),
(111, 58, '/photos/1/SAPLTLI-550x470.jpg', '1', NULL, NULL),
(112, 58, '/photos/1/SAPLTLI-550x470.jpg', '1', NULL, NULL),
(113, 59, '/photos/1/SAPLCLAI-550x470.jpg', '1', NULL, NULL),
(114, 59, '/photos/1/SAPLCLAI-550x470.jpg', '1', NULL, NULL),
(115, 60, '/photos/1/BMA Talent and Olympiad Exams Resource Book for Mathematics Class 6-550x470.jpg', '1', NULL, NULL),
(116, 61, '/photos/1/SAPLTLC-550x470.jpg', '1', NULL, NULL),
(117, 61, '/photos/1/SAPLTLC-550x470.jpg', '1', NULL, NULL),
(118, 62, '/photos/1/SAPSEEH-550x470.jpg', '1', NULL, NULL),
(119, 63, '/photos/1/SAPEBTLE-550x470.jpeg', '1', NULL, NULL),
(120, 63, '/photos/1/SAPEBTLE-550x470.jpeg', '1', NULL, NULL),
(121, 64, '/photos/1/SAPEBTLA-550x470.jpeg', '1', NULL, NULL),
(122, 64, '/photos/1/SAPEBTLA-550x470.jpeg', '1', NULL, NULL),
(123, 65, '/photos/1/SAPSCHAE-550x470.jpg', '1', NULL, NULL),
(124, 65, '/photos/1/SAPSCHAE-550x470.jpg', '1', NULL, NULL),
(125, 66, '/photos/1/SAPSCHDA-550x470.jpg', '1', NULL, NULL),
(126, 67, '/photos/1/SAPSEEG-550x470.jpeg', '1', NULL, NULL),
(127, 67, '/photos/1/SAPSEEG-550x470.jpeg', '1', NULL, NULL),
(128, 68, '/photos/1/SAPSEEF-550x470.jpg', '1', NULL, NULL),
(129, 68, '/photos/1/SAPSEEF-550x470.jpg', '1', NULL, NULL),
(130, 69, '/photos/1/SAPSEEI-550x470.jpg', '1', NULL, NULL),
(131, 69, '/photos/1/SAPSEEI-550x470.jpg', '1', NULL, NULL),
(132, 70, '/photos/1/SAPMRSC-550x470.jpeg', '1', NULL, NULL),
(133, 70, '/photos/1/SAPMRSC-550x470.jpeg', '1', NULL, NULL),
(134, 71, '/photos/1/SAPSMCA-550x470.jpg', '1', NULL, NULL),
(135, 71, '/photos/1/SAPSMCA-550x470.jpg', '1', NULL, NULL),
(136, 72, '/photos/1/SAPMRSL-550x470.jpg', '1', NULL, NULL),
(137, 72, '/photos/1/SAPMRSL-550x470.jpg', '1', NULL, NULL),
(138, 73, '/photos/1/SAPSPHQ-550x470.jpg', '1', NULL, NULL),
(139, 73, '/photos/1/SAPSPHQ-550x470.jpg', '1', NULL, NULL),
(140, 74, '/photos/1/SSBSTCA-550x470 (1).jpg', '1', NULL, NULL),
(141, 74, '/photos/1/SSBSTCA-550x470.jpg', '1', NULL, NULL),
(142, 75, '/photos/1/CBSE All in One PHYSICS Class 12th-550x470.jpg', '1', NULL, NULL),
(143, 75, '/photos/1/CBSE All in One PHYSICS Class 12th-550x470.jpg', '1', NULL, NULL),
(144, 76, '/photos/1/SAPLAB-550x470.jpeg', '1', NULL, NULL),
(145, 76, '/photos/1/SAPLAB-550x470.jpeg', '1', NULL, NULL),
(146, 77, '/photos/1/SAPCNIHH-550x470.jpg', '1', NULL, NULL),
(147, 77, '/photos/1/SAPCNIHH-550x470.jpg', '1', NULL, NULL),
(148, 78, '/photos/1/SAPCNIFG-550x470.jpg', '1', NULL, NULL),
(149, 78, '/photos/1/SAPCNIFG-550x470.jpg', '1', NULL, NULL),
(150, 79, '/photos/1/JEEC-550x470.jpg', '1', NULL, NULL),
(151, 79, '/photos/1/JEEC-550x470.jpg', '1', NULL, NULL),
(152, 80, '/photos/1/39 Years Complete JEE Advance Chapterwise Solutions - Maths-550x470.jpg', '1', NULL, NULL),
(153, 80, '/photos/1/39 Years Complete JEE Advance Chapterwise Solutions - Maths-550x470.jpg', '1', NULL, NULL),
(154, 81, '/photos/1/JEE-550x470.jpg', '1', NULL, NULL),
(155, 81, '/photos/1/JEE-550x470.jpg', '1', NULL, NULL),
(156, 82, '/photos/1/SENBKD-550x470.jpg', '1', NULL, NULL),
(157, 82, '/photos/1/SENBKD-550x470.jpg', '1', NULL, NULL),
(158, 83, '/photos/1/SENBKAK-550x470.jpg', '1', NULL, NULL),
(159, 83, '/photos/1/SENBKAK-550x470.jpg', '1', NULL, NULL),
(160, 84, '/photos/1/SENBKAN-550x470.jpg', '1', NULL, NULL),
(161, 84, '/photos/1/SENBKAN-550x470.jpg', '1', NULL, NULL),
(162, 85, '/photos/1/SENCSI-550x470.jpeg', '1', NULL, NULL),
(163, 85, '/photos/1/SENCSI-550x470.jpeg', '1', NULL, NULL),
(164, 86, '/photos/1/SENCSR-550x470.jpg', '1', NULL, NULL),
(165, 86, '/photos/1/SENCSR-550x470.jpg', '1', NULL, NULL),
(166, 87, '/photos/1/SENCST-550x470.jpeg', '1', NULL, NULL),
(167, 87, '/photos/1/SENCST-550x470.jpeg', '1', NULL, NULL),
(168, 88, '/photos/1/SENDSR-550x470.jpg', '1', NULL, NULL),
(169, 88, '/photos/1/SENDSR-550x470.jpg', '1', NULL, NULL),
(170, 89, '/photos/1/SENDSD-550x470.jpg', '1', NULL, NULL),
(171, 89, '/photos/1/SENDSD-550x470.jpg', '1', NULL, NULL),
(172, 90, '/photos/1/SENDSE-550x470.jpeg', '1', NULL, NULL),
(173, 90, '/photos/1/SENDSE-550x470.jpeg', '1', NULL, NULL),
(174, 91, '/photos/1/16 Years Solved papers AIIMS  Entrance Exam (English)-550x470.jpg', '1', NULL, NULL),
(175, 91, '/photos/1/16 Years Solved papers AIIMS  Entrance Exam (English)-550x470.jpg', '1', NULL, NULL),
(176, 92, '/photos/1/A Flying Jatt - The Hands of Death (English)-550x470.jpeg', '1', NULL, NULL),
(177, 92, '/photos/1/A Flying Jatt - The Hands of Death (English)-550x470.jpeg', '1', NULL, NULL),
(178, 93, '/photos/1/2630fe760356681a686401bdae62690a21ac7becfc39a5b9abeff9dade17c6f6-550x470.jpg', '1', NULL, NULL),
(179, 93, '/photos/1/2630fe760356681a686401bdae62690a21ac7becfc39a5b9abeff9dade17c6f6-550x470.jpg', '1', NULL, NULL),
(180, 93, '/photos/1/2630fe760356681a686401bdae62690a21ac7becfc39a5b9abeff9dade17c6f6-550x470.jpg', '1', NULL, NULL),
(181, 94, '/photos/1/download (1)-550x470.jpg', '1', NULL, NULL),
(182, 94, '/photos/1/download (1)-550x470.jpg', '1', NULL, NULL),
(183, 95, '/photos/1/air-hostess-diaries-400x400-imaefwgtmwsavdrq-550x470.jpeg', '1', NULL, NULL),
(184, 95, '/photos/1/air-hostess-diaries-400x400-imaefwgtmwsavdrq-550x470.jpeg', '1', NULL, NULL),
(185, 96, '/photos/1/1c18acd96e52eb875c9da3b4dc15bc4fac32f47391f123ee23afef90abebb947-550x470.jpg', '1', NULL, NULL),
(186, 96, '/photos/1/1c18acd96e52eb875c9da3b4dc15bc4fac32f47391f123ee23afef90abebb947-550x470.jpg', '1', NULL, NULL),
(187, 97, '/photos/1/the-agony-and-the-ecstasy-a-biographical-novel-of-michelangelo-400x400-imaeajqjh6npf6bj-550x470.jpeg', '1', NULL, NULL),
(188, 97, '/photos/1/the-agony-and-the-ecstasy-a-biographical-novel-of-michelangelo-400x400-imaeajqjh6npf6bj-550x470.jpeg', '1', NULL, NULL),
(189, 98, '/photos/1/500 Practice Questions For The New Sat (English)-550x470.jpg', '1', NULL, NULL),
(190, 98, '/photos/1/500 Practice Questions For The New Sat (English)-550x470.jpg', '1', NULL, NULL),
(191, 99, '/photos/1/All In One MATHEMATICS CBSE Class 10th Term II-550x470.jpg', '1', NULL, NULL),
(192, 99, '/photos/1/All In One MATHEMATICS CBSE Class 10th Term II-550x470.jpg', '1', NULL, NULL),
(193, 100, '/photos/1/All In one SCIENCE CBSE Class 10th Term II-550x470.jpg', '1', NULL, NULL),
(194, 100, '/photos/1/All In one SCIENCE CBSE Class 10th Term II-550x470.jpg', '1', NULL, NULL),
(195, 101, '/photos/1/asura-tale-of-the-vanquished-400x400-imad8fcfjugrgcny-550x470 (1).jpeg', '1', NULL, NULL),
(196, 101, '/photos/1/asura-tale-of-the-vanquished-400x400-imad8fcfjugrgcny-550x470 (1).jpeg', '1', NULL, NULL),
(197, 102, '/photos/1/the-alchemist-400x400-imadk282hypgngze-550x470.jpeg', '1', NULL, NULL),
(198, 102, '/photos/1/the-alchemist-400x400-imadk282hypgngze-550x470.jpeg', '1', NULL, NULL),
(199, 103, '/photos/1/The Canterville Ghost English-550x470.jpg', '1', NULL, NULL),
(200, 103, '/photos/1/The Canterville Ghost English-550x470.jpg', '1', NULL, NULL),
(201, 104, '/photos/1/English Maximizer for NTSE (National Talent Search Examination)-550x470.jpg', '1', NULL, NULL),
(202, 104, '/photos/1/English Maximizer for NTSE (National Talent Search Examination)-550x470.jpg', '1', NULL, NULL),
(203, 105, '/photos/1/Grandma Bag of Stories-550x470.jpg', '1', NULL, NULL),
(204, 105, '/photos/1/Grandma Bag of Stories-550x470.jpg', '1', NULL, NULL),
(205, 106, '/photos/1/Harry Potter and the Deathly Hallows (English)-550x470.jpg', '1', NULL, NULL),
(206, 106, '/photos/1/Harry Potter and the Deathly Hallows (English)-550x470.jpg', '1', NULL, NULL),
(207, 107, '/photos/1/9953ecb6c2d246cc65d316b58cd1ea9a6f0983e261aa34948637f2663a18a761 (1)-550x470.jpg', '1', NULL, NULL),
(208, 107, '/photos/1/9953ecb6c2d246cc65d316b58cd1ea9a6f0983e261aa34948637f2663a18a761 (1)-550x470.jpg', '1', NULL, NULL),
(209, 108, '/photos/1/The_Oath_of_the_Vayuputras-550x470.jpg', '1', NULL, NULL),
(210, 108, '/photos/1/The_Oath_of_the_Vayuputras-550x470.jpg', '1', NULL, NULL),
(211, 109, '/photos/1/2f39bf223f3671ba93df45cdd6fabdf2bf47e161c3b9ab9b541378134136a9f8-550x470.jpg', '1', NULL, NULL),
(212, 109, '/photos/1/2f39bf223f3671ba93df45cdd6fabdf2bf47e161c3b9ab9b541378134136a9f8-550x470.jpg', '1', NULL, NULL),
(213, 110, '/photos/1/Olympiad Planner 9-550x470.jpg', '1', NULL, NULL),
(214, 110, '/photos/1/Olympiad Planner 9-550x470.jpg', '1', NULL, NULL),
(215, 111, '/photos/1/the-immortals-of-meluha-400x400-imaefsreykksfta2-550x470.jpeg', '1', NULL, NULL),
(216, 111, '/photos/1/the-immortals-of-meluha-400x400-imaefsreykksfta2-550x470.jpeg', '1', NULL, NULL),
(217, 112, '/photos/1/Twilight (English)-550x470.jpeg', '1', NULL, NULL),
(218, 112, '/photos/1/Twilight (English)-550x470.jpeg', '1', NULL, NULL),
(219, 113, '/photos/1/Together with Biology for ClassX-550x470.jpg', '1', NULL, NULL),
(220, 113, '/photos/1/Together with Biology for ClassX-550x470.jpg', '1', NULL, NULL),
(221, 114, '/photos/1/The Sialkot Saga (English)-550x470.jpeg', '1', NULL, NULL),
(222, 114, '/photos/1/The Sialkot Saga (English)-550x470.jpeg', '1', NULL, NULL),
(223, 115, '/photos/1/A New Approach Financial Accounting For Professional Student (English)-550x470.jpg', '1', NULL, NULL),
(224, 115, '/photos/1/A New Approach Financial Accounting For Professional Student (English)-550x470.jpg', '1', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `shippingpincodes`
--

CREATE TABLE `shippingpincodes` (
  `zone_pincode_id` int(10) UNSIGNED NOT NULL,
  `zone_id` int(11) NOT NULL,
  `pincode` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `shippingpincodes`
--

INSERT INTO `shippingpincodes` (`zone_pincode_id`, `zone_id`, `pincode`, `created_at`, `updated_at`) VALUES
(1, 1, '700090', NULL, '2018-11-15 04:49:55'),
(2, 1, '700028', NULL, '2018-11-15 04:49:55'),
(3, 1, '700065', NULL, '2018-11-15 04:49:55'),
(4, 1, '700007', NULL, '2018-11-15 04:49:55'),
(5, 1, '700012', NULL, '2018-11-15 04:49:55');

-- --------------------------------------------------------

--
-- Table structure for table `shippingprices`
--

CREATE TABLE `shippingprices` (
  `shippingprice_id` int(10) UNSIGNED NOT NULL,
  `zone_id` int(11) NOT NULL,
  `shipping_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shipping_price` decimal(10,2) NOT NULL,
  `min_price` decimal(10,2) NOT NULL,
  `max_price` decimal(10,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `shippingprices`
--

INSERT INTO `shippingprices` (`shippingprice_id`, `zone_id`, `shipping_name`, `shipping_price`, `min_price`, `max_price`, `created_at`, `updated_at`) VALUES
(1, 1, 'Royal Express', '40.00', '1.00', '500.00', NULL, '2018-11-15 04:49:55'),
(2, 1, 'DTDC', '25.00', '501.00', '3000.00', NULL, '2018-11-15 04:49:55');

-- --------------------------------------------------------

--
-- Table structure for table `shippingzones`
--

CREATE TABLE `shippingzones` (
  `zone_id` int(10) UNSIGNED NOT NULL,
  `zone_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `shippingzones`
--

INSERT INTO `shippingzones` (`zone_id`, `zone_name`, `created_at`, `updated_at`) VALUES
(1, 'East', '2018-11-15 04:45:51', '2018-11-15 04:49:55');

-- --------------------------------------------------------

--
-- Table structure for table `stocks`
--

CREATE TABLE `stocks` (
  `stock_id` int(10) UNSIGNED NOT NULL,
  `product_id` int(11) NOT NULL,
  `qty` decimal(10,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `stocks`
--

INSERT INTO `stocks` (`stock_id`, `product_id`, `qty`, `created_at`, `updated_at`) VALUES
(1, 1, '10.00', '2018-11-05 05:36:18', '2018-11-05 05:36:18'),
(2, 1, '5.00', '2018-11-07 01:03:14', '2018-11-07 01:03:14'),
(3, 1, '5.00', '2018-11-07 01:05:48', '2018-11-07 01:05:48'),
(4, 1, '5.00', '2018-11-07 01:29:38', '2018-11-07 01:29:38'),
(5, 1, '5.00', '2018-11-07 02:06:16', '2018-11-07 02:06:16'),
(6, 2, '15.00', '2018-11-07 05:59:40', '2018-11-07 05:59:40'),
(7, 3, '15.00', '2018-11-07 07:01:24', '2018-11-07 07:01:24'),
(8, 4, '5.00', '2018-11-07 07:47:24', '2018-11-07 07:47:24'),
(9, 5, '10.00', '2018-11-08 00:40:03', '2018-11-08 00:40:03'),
(10, 6, '9.00', '2018-11-08 00:56:34', '2018-11-08 00:56:34'),
(11, 7, '8.00', '2018-11-08 01:18:05', '2018-11-08 01:18:05'),
(12, 8, '9.00', '2018-11-08 01:40:20', '2018-11-08 01:40:20'),
(13, 9, '5.00', '2018-11-08 01:47:36', '2018-11-08 01:47:36'),
(14, 10, '5.00', '2018-11-08 01:58:15', '2018-11-08 01:58:15'),
(15, 11, '4.00', '2018-11-08 02:06:56', '2018-11-08 02:06:56'),
(16, 12, '7.00', '2018-11-08 02:15:45', '2018-11-08 02:15:45'),
(17, 13, '5.00', '2018-11-08 02:22:10', '2018-11-08 02:22:10'),
(18, 14, '4.00', '2018-11-08 03:30:42', '2018-11-08 03:30:42'),
(19, 15, '4.00', '2018-11-08 03:34:44', '2018-11-08 03:34:44'),
(20, 16, '2.00', '2018-11-08 03:38:47', '2018-11-08 03:38:47'),
(21, 17, '6.00', '2018-11-08 03:45:08', '2018-11-08 03:45:08'),
(22, 18, '6.00', '2018-11-08 03:52:10', '2018-11-08 03:52:10'),
(23, 19, '5.00', '2018-11-08 03:57:16', '2018-11-08 03:57:16'),
(24, 20, '8.00', '2018-11-08 04:18:26', '2018-11-08 04:18:26'),
(25, 21, '7.00', '2018-11-08 04:25:03', '2018-11-08 04:25:03'),
(26, 22, '6.00', '2018-11-08 04:35:59', '2018-11-08 04:35:59'),
(27, 23, '3.00', '2018-11-08 04:49:39', '2018-11-08 04:49:39'),
(28, 24, '5.00', '2018-11-08 04:55:10', '2018-11-08 04:55:10'),
(29, 25, '6.00', '2018-11-08 05:59:08', '2018-11-08 05:59:08'),
(30, 26, '2.00', '2018-11-13 06:31:42', '2018-11-13 06:31:42'),
(31, 27, '4.00', '2018-11-13 06:38:27', '2018-11-13 06:38:27'),
(35, 31, '5.00', '2018-11-14 00:19:32', '2018-11-14 00:19:32'),
(36, 32, '3.00', '2018-11-14 00:28:36', '2018-11-14 00:28:36'),
(37, 33, '4.00', '2018-11-14 00:34:26', '2018-11-14 00:34:26'),
(38, 34, '6.00', '2018-11-14 00:51:38', '2018-11-14 00:51:38'),
(39, 35, '3.00', '2018-11-14 00:56:47', '2018-11-14 00:56:47'),
(40, 36, '7.00', '2018-11-14 01:02:07', '2018-11-14 01:02:07'),
(41, 37, '3.00', '2018-11-14 01:15:50', '2018-11-14 01:15:50'),
(42, 38, '4.00', '2018-11-14 01:25:23', '2018-11-14 01:25:23'),
(43, 39, '4.00', '2018-11-14 01:31:16', '2018-11-14 01:31:16'),
(44, 40, '2.00', '2018-11-14 01:39:26', '2018-11-14 01:39:26'),
(45, 41, '3.00', '2018-11-14 01:44:25', '2018-11-14 01:44:25'),
(46, 42, '4.00', '2018-11-14 01:52:23', '2018-11-14 01:52:23'),
(47, 43, '4.00', '2018-11-14 02:08:06', '2018-11-14 02:08:06'),
(48, 44, '4.00', '2018-11-14 02:15:14', '2018-11-14 02:15:14'),
(49, 45, '3.00', '2018-11-14 02:19:03', '2018-11-14 02:19:03'),
(50, 46, '3.00', '2018-11-14 03:36:11', '2018-11-14 03:36:11'),
(51, 47, '3.00', '2018-11-14 04:04:32', '2018-11-14 04:04:32'),
(52, 48, '3.00', '2018-11-14 05:14:24', '2018-11-14 05:14:24'),
(53, 49, '4.00', '2018-11-14 05:22:40', '2018-11-14 05:22:40'),
(54, 50, '2.00', '2018-11-14 06:16:35', '2018-11-14 06:16:35'),
(55, 51, '5.00', '2018-11-14 06:25:23', '2018-11-14 06:25:23'),
(56, 52, '5.00', '2018-11-15 02:11:49', '2018-11-15 02:11:49'),
(57, 53, '7.00', '2018-11-15 02:16:38', '2018-11-15 02:16:38'),
(58, 54, '4.00', '2018-11-15 02:21:49', '2018-11-15 02:21:49'),
(59, 55, '5.00', '2018-11-15 02:30:32', '2018-11-15 02:30:32'),
(60, 56, '7.00', '2018-11-15 02:34:26', '2018-11-15 02:34:26'),
(61, 57, '8.00', '2018-11-15 02:46:20', '2018-11-15 02:46:20'),
(62, 58, '5.00', '2018-11-15 03:02:28', '2018-11-15 03:02:28'),
(63, 59, '5.00', '2018-11-15 03:07:25', '2018-11-15 03:07:25'),
(64, 60, '5.00', '2018-11-15 03:29:05', '2018-11-15 03:29:05'),
(65, 61, '6.00', '2018-11-15 03:34:43', '2018-11-15 03:34:43'),
(66, 62, '3.00', '2018-11-15 03:52:35', '2018-11-15 03:52:35'),
(67, 63, '6.00', '2018-11-15 03:59:26', '2018-11-15 03:59:26'),
(68, 64, '5.00', '2018-11-15 04:30:38', '2018-11-15 04:30:38'),
(69, 65, '2.00', '2018-11-15 04:35:32', '2018-11-15 04:35:32'),
(70, 66, '3.00', '2018-11-15 04:47:09', '2018-11-15 04:47:09'),
(71, 67, '5.00', '2018-11-15 05:49:01', '2018-11-15 05:49:01'),
(72, 68, '9.00', '2018-11-15 06:05:50', '2018-11-15 06:05:50'),
(73, 69, '8.00', '2018-11-15 06:15:32', '2018-11-15 06:15:32'),
(74, 70, '7.00', '2018-11-15 06:25:06', '2018-11-15 06:25:06'),
(75, 71, '7.00', '2018-11-15 06:36:14', '2018-11-15 06:36:14'),
(76, 72, '5.00', '2018-11-15 07:04:25', '2018-11-15 07:04:25'),
(77, 73, '6.00', '2018-11-15 07:23:56', '2018-11-15 07:23:56'),
(78, 74, '9.00', '2018-11-15 07:39:18', '2018-11-15 07:39:18'),
(79, 75, '8.00', '2018-11-15 07:53:54', '2018-11-15 07:53:54'),
(80, 76, '8.00', '2018-11-16 03:48:28', '2018-11-16 03:48:28'),
(81, 77, '8.00', '2018-11-16 03:55:08', '2018-11-16 03:55:08'),
(82, 78, '8.00', '2018-11-16 04:25:29', '2018-11-16 04:25:29'),
(83, 79, '3.00', '2018-11-16 04:33:38', '2018-11-16 04:33:38'),
(84, 80, '1.00', '2018-11-16 04:43:23', '2018-11-16 04:43:23'),
(85, 81, '1.00', '2018-11-16 04:56:17', '2018-11-16 04:56:17'),
(86, 82, '4.00', '2018-11-16 05:33:11', '2018-11-16 05:33:11'),
(87, 83, '1.00', '2018-11-16 05:39:41', '2018-11-16 05:39:41'),
(88, 84, '2.00', '2018-11-16 05:43:50', '2018-11-16 05:43:50'),
(89, 85, '1.00', '2018-11-16 05:55:19', '2018-11-16 05:55:19'),
(90, 86, '8.00', '2018-11-16 06:19:29', '2018-11-16 06:19:29'),
(91, 87, '6.00', '2018-11-16 06:41:19', '2018-11-16 06:41:19'),
(92, 88, '8.00', '2018-11-16 06:46:57', '2018-11-16 06:46:57'),
(93, 89, '4.00', '2018-11-16 06:57:21', '2018-11-16 06:57:21'),
(94, 90, '8.00', '2018-11-16 07:05:37', '2018-11-16 07:05:37'),
(95, 91, '2.00', '2018-11-16 07:29:26', '2018-11-16 07:29:26'),
(96, 92, '2.00', '2018-11-17 01:25:41', '2018-11-17 01:25:41'),
(97, 93, '9.00', '2018-11-17 03:43:17', '2018-11-17 03:43:17'),
(98, 94, '2.00', '2018-11-17 03:55:23', '2018-11-17 03:55:23'),
(99, 95, '6.00', '2018-11-17 04:17:55', '2018-11-17 04:17:55'),
(100, 96, '2.00', '2018-11-17 04:27:18', '2018-11-17 04:27:18'),
(101, 97, '4.00', '2018-11-17 05:51:27', '2018-11-17 05:51:27'),
(102, 98, '6.00', '2018-11-17 05:57:05', '2018-11-17 05:57:05'),
(103, 99, '5.00', '2018-11-17 06:01:04', '2018-11-17 06:01:04'),
(104, 100, '1.00', '2018-11-17 06:07:28', '2018-11-17 06:07:28'),
(105, 101, '9.00', '2018-11-17 06:22:26', '2018-11-17 06:22:26'),
(106, 102, '4.00', '2018-11-17 06:29:00', '2018-11-17 06:29:00'),
(107, 103, '8.00', '2018-11-17 06:37:26', '2018-11-17 06:37:26'),
(108, 104, '4.00', '2018-11-19 00:32:03', '2018-11-19 00:32:03'),
(109, 105, '4.00', '2018-11-19 00:40:07', '2018-11-19 00:40:07'),
(110, 106, '5.00', '2018-11-19 00:44:55', '2018-11-19 00:44:55'),
(111, 107, '6.00', '2018-11-19 00:49:42', '2018-11-19 00:49:42'),
(112, 108, '3.00', '2018-11-19 00:59:26', '2018-11-19 00:59:26'),
(113, 109, '2.00', '2018-11-19 01:03:45', '2018-11-19 01:03:45'),
(114, 110, '9.00', '2018-11-19 01:11:33', '2018-11-19 01:11:33'),
(115, 111, '6.00', '2018-11-19 01:30:36', '2018-11-19 01:30:36'),
(116, 112, '2.00', '2018-11-19 01:37:42', '2018-11-19 01:37:42'),
(117, 113, '6.00', '2018-11-19 01:44:13', '2018-11-19 01:44:13'),
(118, 114, '5.00', '2018-11-19 01:48:55', '2018-11-19 01:48:55'),
(119, 115, '6.00', '2018-11-19 02:08:26', '2018-11-19 02:08:26');

-- --------------------------------------------------------

--
-- Table structure for table `subscribers`
--

CREATE TABLE `subscribers` (
  `id` int(10) UNSIGNED NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subscription_status` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subscribers`
--

INSERT INTO `subscribers` (`id`, `email`, `subscription_status`, `created_at`, `updated_at`) VALUES
(1, 'jonneystar@gmail.com', '1', '2018-11-05 03:32:47', '2018-11-05 03:32:47'),
(2, 'atanu.khorat@gmail.com', '1', '2018-11-05 04:02:53', '2018-11-05 04:02:53');

-- --------------------------------------------------------

--
-- Table structure for table `useraddresses`
--

CREATE TABLE `useraddresses` (
  `user_address_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `landmark` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pincode` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_default` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `useraddresses`
--

INSERT INTO `useraddresses` (`user_address_id`, `user_id`, `address`, `landmark`, `city`, `pincode`, `country`, `is_default`, `created_at`, `updated_at`) VALUES
(1, 9, '28 GOPI BOSE LANE , BOWBAZAR , KOLKATA - 700012', 'West Bengal', 'KOLKATA', '700012', 'INDIA', '1', '2018-11-03 00:49:12', '2018-11-03 00:49:12'),
(2, 9, 'DUM DUM CANTONMENT,Subhas Nagar', 'Near Uttarpara', 'KOLKATA', '700065', 'INDIA', '0', '2018-11-03 00:57:18', '2018-11-05 00:31:23'),
(3, 9, '19/1/7 NABIN CHANDRA DAS ROAD', 'NEAR PALBARI', 'KOLKATA', '700090', 'INDIA', '0', '2018-11-03 08:00:59', '2018-11-03 08:00:59'),
(7, 10, '28 GOPI BOSE LANE , BOWBAZAR , KOLKATA - 700012', 'West Bengal', 'KOLKATA', '700012', 'INDIA', '1', '2018-11-05 04:01:41', '2018-11-05 04:01:41'),
(8, 11, '28 GOPI BOSE LANE , BOWBAZAR , KOLKATA - 700012', 'West Bengal', 'KOLKATA', '700012', 'INDIA', '1', '2018-11-05 04:03:25', '2018-11-05 04:03:35');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `activation_key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` enum('active','inactive') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'inactive',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `mobile`, `password`, `activation_key`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(4, 'Apu Das', 'apu.das@gmail.com', '9681042267', '$2y$10$MPtRgIQxlA1YOEic.rJ7SO1jzsC.sH8njvrrQV2ENIdnyds20Z7H6', '', 'inactive', NULL, '2018-11-01 05:42:48', '2018-11-01 05:42:48'),
(9, 'Suraj Mondal', 'surajmondal1003@gmail.com', '9681418751', '$2y$10$sgQIZpvsYaWGabblSIQK7O0qJo0CdqIgG3KL3zIvNtBEoxcipF3Ia', '6c383786fef88bec0faad5fcb6623fbcbc18cafa9069f99e4f5680e3b75e1ba9', 'active', 'YmKAGJRUqZn2X03gJIScKA8f5oeEGmG3ovh0D3OXuiw8FUyb8pyRskMNDdIS', '2018-11-01 07:45:58', '2018-11-05 04:35:24'),
(10, 'Piyali Mondal', 'jonneystar@gmail.com', '8013134344', '$2y$10$ub7pvYUwkQnBypgHwoCJOeWhrgVH7eoCoxC8BAsvpg8.1iKTfWJeG', '1a42a7e419d03ce37f91fe909e8cb21e7ecd4ef57be9230bf101135c59dadc11', 'active', 'EQaaTzt6SeI6qo7gGGafe5ndXTOoc7oP9X9jQ3tQhmrsYftkRXdHDSXVkEqe', '2018-11-05 03:32:47', '2018-11-05 03:36:00'),
(11, 'Atanu Khorat', 'atanu.khorat@gmail.com', '9433417717', '$2y$10$PwCvgr0U8Gy/fyOSwZCGSeXwqqfcpDMI0U4PvEwN3fv01tf9nDdYm', '9c75efdd7b32a51339ccc3c1f2c86c6659243e22b72fc5271d50f71431a33411', 'active', 'TUqaTkLo6pwmRpT9m0R1K9ncJwVcQLFjB1fFYoLoTpxzV5tUG6UFyLOmPPOy', '2018-11-05 04:02:53', '2018-11-05 04:30:04');

-- --------------------------------------------------------

--
-- Table structure for table `wishlists`
--

CREATE TABLE `wishlists` (
  `wishlist_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `wishlists`
--

INSERT INTO `wishlists` (`wishlist_id`, `user_id`, `product_id`, `created_at`, `updated_at`) VALUES
(28, 9, 37, '2018-11-19 05:40:57', '2018-11-19 05:40:57'),
(29, 9, 38, '2018-11-19 05:40:58', '2018-11-19 05:40:58'),
(30, 9, 39, '2018-11-19 05:41:00', '2018-11-19 05:41:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indexes for table `attributes`
--
ALTER TABLE `attributes`
  ADD PRIMARY KEY (`attr_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `customers_address`
--
ALTER TABLE `customers_address`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `discounts`
--
ALTER TABLE `discounts`
  ADD PRIMARY KEY (`discount_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`page_id`);

--
-- Indexes for table `page_banners`
--
ALTER TABLE `page_banners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `page_contents`
--
ALTER TABLE `page_contents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `page_metas`
--
ALTER TABLE `page_metas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `productattributes`
--
ALTER TABLE `productattributes`
  ADD PRIMARY KEY (`productattributes_id`);

--
-- Indexes for table `productcategory_relations`
--
ALTER TABLE `productcategory_relations`
  ADD PRIMARY KEY (`prodcat_rltn_id`);

--
-- Indexes for table `productdiscounts`
--
ALTER TABLE `productdiscounts`
  ADD PRIMARY KEY (`productdiscount_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `product_images`
--
ALTER TABLE `product_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shippingpincodes`
--
ALTER TABLE `shippingpincodes`
  ADD PRIMARY KEY (`zone_pincode_id`);

--
-- Indexes for table `shippingprices`
--
ALTER TABLE `shippingprices`
  ADD PRIMARY KEY (`shippingprice_id`);

--
-- Indexes for table `shippingzones`
--
ALTER TABLE `shippingzones`
  ADD PRIMARY KEY (`zone_id`);

--
-- Indexes for table `stocks`
--
ALTER TABLE `stocks`
  ADD PRIMARY KEY (`stock_id`);

--
-- Indexes for table `subscribers`
--
ALTER TABLE `subscribers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `useraddresses`
--
ALTER TABLE `useraddresses`
  ADD PRIMARY KEY (`user_address_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_mobile_unique` (`mobile`);

--
-- Indexes for table `wishlists`
--
ALTER TABLE `wishlists`
  ADD PRIMARY KEY (`wishlist_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `attributes`
--
ALTER TABLE `attributes`
  MODIFY `attr_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;

--
-- AUTO_INCREMENT for table `customers_address`
--
ALTER TABLE `customers_address`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `discounts`
--
ALTER TABLE `discounts`
  MODIFY `discount_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `page_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `page_banners`
--
ALTER TABLE `page_banners`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `page_contents`
--
ALTER TABLE `page_contents`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `page_metas`
--
ALTER TABLE `page_metas`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `productattributes`
--
ALTER TABLE `productattributes`
  MODIFY `productattributes_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=684;

--
-- AUTO_INCREMENT for table `productcategory_relations`
--
ALTER TABLE `productcategory_relations`
  MODIFY `prodcat_rltn_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=321;

--
-- AUTO_INCREMENT for table `productdiscounts`
--
ALTER TABLE `productdiscounts`
  MODIFY `productdiscount_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=125;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=116;

--
-- AUTO_INCREMENT for table `product_images`
--
ALTER TABLE `product_images`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=225;

--
-- AUTO_INCREMENT for table `shippingpincodes`
--
ALTER TABLE `shippingpincodes`
  MODIFY `zone_pincode_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `shippingprices`
--
ALTER TABLE `shippingprices`
  MODIFY `shippingprice_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `shippingzones`
--
ALTER TABLE `shippingzones`
  MODIFY `zone_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `stocks`
--
ALTER TABLE `stocks`
  MODIFY `stock_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=120;

--
-- AUTO_INCREMENT for table `subscribers`
--
ALTER TABLE `subscribers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `useraddresses`
--
ALTER TABLE `useraddresses`
  MODIFY `user_address_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `wishlists`
--
ALTER TABLE `wishlists`
  MODIFY `wishlist_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
