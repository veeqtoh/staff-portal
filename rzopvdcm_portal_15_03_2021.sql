-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 15, 2021 at 09:08 AM
-- Server version: 5.7.33
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rzopvdcm_portal`
--

-- --------------------------------------------------------

--
-- Table structure for table `audits`
--

CREATE TABLE `audits` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `action` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parameter` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `audits`
--

INSERT INTO `audits` (`id`, `user_id`, `action`, `parameter`, `created_at`, `updated_at`) VALUES
(12, 9, 'Created a new requisition', 'travelling to PH for a meeting', '2021-02-19 21:18:07', '2021-02-19 21:18:07'),
(13, 3, 'Created a new requisition', 'delivery of groceries to NUE defender', '2021-03-01 11:49:09', '2021-03-01 11:49:09'),
(14, 1, 'Approved a requisition', '6', '2021-03-01 11:51:32', '2021-03-01 11:51:32'),
(15, 6, 'Approved a requisition', '6', '2021-03-01 11:58:53', '2021-03-01 11:58:53'),
(16, 7, 'Approved a requisition', '6', '2021-03-01 12:02:38', '2021-03-01 12:02:38');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Crew - NUE Defender', 'crew-nue-defender', NULL, '2021-02-04 08:36:28', '2021-02-04 08:36:28'),
(2, 'Crew - SVS Guardsman', 'crew-svs-guardsman', NULL, '2021-02-04 08:36:28', '2021-02-04 08:36:28'),
(3, 'Crew - NUE Defender I', 'crew-nue-defender-i', NULL, '2021-02-04 08:36:28', '2021-02-04 08:36:28'),
(4, 'Crew - NUE Swift', 'crew-nue-swift', NULL, '2021-02-04 08:36:28', '2021-02-04 08:36:28'),
(5, 'Crew - NUE Strider', 'crew-nue-strider', NULL, '2021-02-04 08:36:28', '2021-02-04 08:36:28'),
(6, 'Staff', 'staff', NULL, '2021-02-04 08:36:28', '2021-02-04 08:36:28'),
(7, 'Crew - NUE Lince', 'crew-nue-lince', NULL, '2021-02-04 08:36:28', '2021-02-04 08:36:28');

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL COMMENT 'Each department belongs to a category',
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`id`, `category_id`, `name`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 1, 'Crew Member - NUE Defender', NULL, '2021-02-04 08:36:28', '2021-02-04 08:36:28'),
(2, 2, 'Crew Member - SVS Guardsman', NULL, '2021-02-04 08:36:28', '2021-02-04 08:36:28'),
(3, 3, 'Crew Member - NUE Defender I', NULL, '2021-02-04 08:36:28', '2021-02-04 08:36:28'),
(4, 4, 'Crew Member - NUE Swift', NULL, '2021-02-04 08:36:28', '2021-02-04 08:36:28'),
(5, 5, 'Crew Member - NUE Strider', NULL, '2021-02-04 08:36:28', '2021-02-04 08:36:28'),
(6, 6, 'Accounts Department', NULL, '2021-02-04 08:36:28', '2021-02-04 08:36:28'),
(7, 6, 'Admin', NULL, '2021-02-04 08:36:28', '2021-02-04 08:36:28'),
(8, 6, 'Business Development Department', NULL, '2021-02-04 08:36:28', '2021-02-04 08:36:28'),
(9, 6, 'Chartering Department', NULL, '2021-02-04 08:36:28', '2021-02-04 08:36:28'),
(10, 6, 'Facility Management Department', NULL, '2021-02-04 08:36:28', '2021-02-04 08:36:28'),
(11, 6, 'Legal/Document Control Department', NULL, '2021-02-04 08:36:28', '2021-02-04 08:36:28'),
(12, 6, 'Marine Operations Department', NULL, '2021-02-04 08:36:28', '2021-02-04 08:36:28'),
(13, 6, 'HR Department', NULL, '2021-02-04 08:36:28', '2021-02-04 08:36:28'),
(14, 6, 'HSE Deprtment', NULL, '2021-02-04 08:36:28', '2021-02-04 08:36:28'),
(15, 6, 'IT Department', NULL, '2021-02-04 08:36:28', '2021-02-04 08:36:28'),
(16, 6, 'Procurement Department', NULL, '2021-02-04 08:36:28', '2021-02-04 08:36:28'),
(17, 7, 'Crew Member - NUE Lince', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2020_10_31_114246_create_categories_table', 1),
(2, '2020_10_31_114611_create_departments_table', 1),
(3, '2020_10_31_114612_create_positions_table', 1),
(4, '2020_10_31_120000_create_users_table', 1),
(5, '2020_10_31_125409_create_profiles_table', 1),
(6, '2020_11_13_100000_create_password_resets_table', 1),
(7, '2020_11_14_000000_create_failed_jobs_table', 1),
(8, '2021_01_06_194344_create_pfas_table', 1),
(9, '2021_01_07_102838_create_reportstos_table', 1),
(10, '2021_01_26_100413_create_payrolls_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `mid` int(11) NOT NULL,
  `sender` int(11) NOT NULL,
  `receiver` int(11) NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'SENT',
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `mid`, `sender`, `receiver`, `status`, `type`, `message`, `created_at`, `updated_at`) VALUES
(1, 5, 9, 10, 'SENT', 'Requisition', 'pending requisition approval', '2021-02-19 21:18:07', '2021-02-19 21:18:07'),
(2, 6, 3, 1, 'READ', 'Requisition', 'pending requisition approval', '2021-03-01 11:49:10', '2021-03-01 11:49:10'),
(3, 6, 1, 6, 'READ', 'Requisition', 'pending requisition approval', '2021-03-01 11:51:32', '2021-03-01 11:51:32'),
(4, 6, 6, 7, 'READ', 'Requisition', 'pending requisition approval', '2021-03-01 11:58:53', '2021-03-01 11:58:53');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payrolls`
--

CREATE TABLE `payrolls` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `employee_id` bigint(20) UNSIGNED NOT NULL,
  `ref` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `days_worked` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `day_rate` decimal(15,2) NOT NULL,
  `basic` decimal(15,2) NOT NULL,
  `housing` decimal(15,2) NOT NULL,
  `transport` decimal(15,2) NOT NULL,
  `entertainment` decimal(15,2) NOT NULL,
  `meal_allowance` decimal(15,2) NOT NULL,
  `utility_allowance` decimal(15,2) NOT NULL,
  `gross_income` decimal(15,2) NOT NULL,
  `gross_pay` decimal(15,2) NOT NULL,
  `total_tax_relief` decimal(15,2) NOT NULL,
  `taxable_pay` decimal(15,2) NOT NULL,
  `total_statutory_deductions` decimal(15,2) NOT NULL,
  `employer_pension_contribution` decimal(15,2) NOT NULL,
  `total_pension_contribution` decimal(15,2) NOT NULL,
  `paye_tax` decimal(15,2) NOT NULL,
  `pension_contribution` decimal(15,2) NOT NULL,
  `net_pay` decimal(15,2) NOT NULL,
  `loan_deduction` decimal(15,2) NOT NULL DEFAULT '0.00',
  `salary_overpayment` decimal(15,2) NOT NULL DEFAULT '0.00',
  `total_deductions` decimal(15,2) NOT NULL DEFAULT '0.00',
  `reimbursements` decimal(15,2) NOT NULL DEFAULT '0.00',
  `loan_addition` decimal(15,2) NOT NULL DEFAULT '0.00',
  `net_salary` decimal(15,2) NOT NULL,
  `month_of` date NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL COMMENT '1 - office staff; 2 - Crew',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payrolls`
--

INSERT INTO `payrolls` (`id`, `employee_id`, `ref`, `days_worked`, `day_rate`, `basic`, `housing`, `transport`, `entertainment`, `meal_allowance`, `utility_allowance`, `gross_income`, `gross_pay`, `total_tax_relief`, `taxable_pay`, `total_statutory_deductions`, `employer_pension_contribution`, `total_pension_contribution`, `paye_tax`, `pension_contribution`, `net_pay`, `loan_deduction`, `salary_overpayment`, `total_deductions`, `reimbursements`, `loan_addition`, `net_salary`, `month_of`, `category_id`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 3, '9B4DF', '30', 13333.33, 35000.00, 14000.00, 14000.00, 21000.00, 28000.00, 28000.00, 400000.00, 140000.00, 49706.67, 90293.33, 15584.00, 6300.00, 11340.00, 10544.00, 5040.00, 260000.00, 0.00, 0.00, 0.00, 0.00, 0.00, 124416.00, '2021-01-30', 6, NULL, '2021-02-05 22:39:07', '2021-02-05 22:39:07'),
(2, 5, 'B9103', '30', 10000.00, 26250.00, 10500.00, 10500.00, 15750.00, 21000.00, 21000.00, 300000.00, 105000.00, 41446.67, 63553.33, 10313.00, 4725.00, 8505.00, 6533.00, 3780.00, 195000.00, 0.00, 0.00, 0.00, 0.00, 0.00, 94687.00, '2021-01-30', 6, NULL, '2021-02-09 14:14:43', '2021-02-09 14:14:43'),
(3, 9, '7E83B', '30', 8333.33, 21875.00, 8750.00, 8750.00, 13125.00, 17500.00, 17500.00, 250000.00, 87500.00, 37316.67, 50183.33, 7677.50, 3937.50, 7087.50, 4527.50, 3150.00, 162500.00, 12000.00, 0.00, 0.00, 25000.00, 15000.00, 79822.50, '2021-02-19', 6, NULL, '2021-02-19 16:04:41', '2021-02-19 16:04:41'),
(4, 10, '04623', '30', 8333.33, 21875.00, 8750.00, 8750.00, 13125.00, 17500.00, 17500.00, 250000.00, 87500.00, 37316.67, 50183.33, 7677.50, 3937.50, 7087.50, 4527.50, 3150.00, 162500.00, 0.00, 0.00, 0.00, 0.00, 0.00, 79822.50, '2021-02-19', 6, NULL, '2021-02-19 16:11:30', '2021-02-19 16:11:30'),
(5, 1, 'B5E83', '31', 6451.61, 17500.00, 7000.00, 7000.00, 10500.00, 14000.00, 14000.00, 200000.00, 70000.00, 33186.67, 36813.33, 5569.47, 3150.00, 5670.00, 3049.47, 2520.00, 130000.00, 0.00, 0.00, 0.00, 0.00, 0.00, 64430.53, '2021-02-17', 6, NULL, '2021-02-19 16:29:35', '2021-02-19 16:29:35'),
(6, 5, 'AA20E', '30', 10000.00, 26250.00, 10500.00, 10500.00, 15750.00, 21000.00, 21000.00, 300000.00, 105000.00, 41446.67, 63553.33, 10313.00, 4725.00, 8505.00, 6533.00, 3780.00, 195000.00, 20000.00, 0.00, 0.00, 40000.00, 0.00, 94687.00, '2021-02-26', 6, NULL, '2021-03-01 11:32:54', '2021-03-01 11:32:54');

-- --------------------------------------------------------

--
-- Table structure for table `pfas`
--

CREATE TABLE `pfas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pfas`
--

INSERT INTO `pfas` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'AIICO Pension Managers Limited', '2021-02-04 08:36:29', '2021-02-04 08:36:29'),
(2, 'APT Pension Fund Managers Limited', '2021-02-04 08:36:29', '2021-02-04 08:36:29'),
(3, 'ARM Pension Managers Limited', '2021-02-04 08:36:29', '2021-02-04 08:36:29'),
(4, 'AXA Mansard Pension Limited', '2021-02-04 08:36:29', '2021-02-04 08:36:29'),
(5, 'CrusaderSterling Pensions Limited', '2021-02-04 08:36:29', '2021-02-04 08:36:29'),
(6, 'FCMB Pensions Limited', '2021-02-04 08:36:29', '2021-02-04 08:36:29'),
(7, 'Fidelity Pension Managers', '2021-02-04 08:36:29', '2021-02-04 08:36:29'),
(8, 'First Guarantee Pension Limited', '2021-02-04 08:36:29', '2021-02-04 08:36:29'),
(9, 'IEI-Anchor Pension Managers Limited', '2021-02-04 08:36:29', '2021-02-04 08:36:29'),
(10, 'Investment One Pension Managers Limited', '2021-02-04 08:36:29', '2021-02-04 08:36:29'),
(11, 'Leadway Pensure PFA Limited', '2021-02-04 08:36:29', '2021-02-04 08:36:29'),
(12, 'NLPC Pension Fund Administrators Limited', '2021-02-04 08:36:29', '2021-02-04 08:36:29'),
(13, 'NPF Pensions Limited', '2021-02-04 08:36:29', '2021-02-04 08:36:29'),
(14, 'OAK Pensions Limited', '2021-02-04 08:36:29', '2021-02-04 08:36:29'),
(15, 'Pensions Alliance Limited', '2021-02-04 08:36:29', '2021-02-04 08:36:29'),
(16, 'Premium Pension Limited', '2021-02-04 08:36:29', '2021-02-04 08:36:29'),
(17, 'Radix Pension Managers Limited', '2021-02-04 08:36:29', '2021-02-04 08:36:29'),
(18, 'Sigma Pensions Limited', '2021-02-04 08:36:29', '2021-02-04 08:36:29'),
(19, 'Stanbic IBTC Pension Managers Limited', '2021-02-04 08:36:29', '2021-02-04 08:36:29'),
(20, 'Veritas Glanvills Pensions Limited', '2021-02-04 08:36:29', '2021-02-04 08:36:29');

-- --------------------------------------------------------

--
-- Table structure for table `positions`
--

CREATE TABLE `positions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `department_id` bigint(20) UNSIGNED NOT NULL COMMENT 'Each position belongs to a department',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `positions`
--

INSERT INTO `positions` (`id`, `name`, `slug`, `department_id`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Master', 'master', 1, NULL, '2021-02-04 08:36:28', '2021-02-04 08:36:28'),
(2, 'Chief Mate', 'chief-mate', 1, NULL, '2021-02-04 08:36:28', '2021-02-04 08:36:28'),
(3, 'Chief Engineer', 'chief-engineer', 1, NULL, '2021-02-04 08:36:28', '2021-02-04 08:36:28'),
(4, 'Second Engineer', 'second-engineer', 1, NULL, '2021-02-04 08:36:28', '2021-02-04 08:36:28'),
(5, 'Cook', 'cook', 1, NULL, '2021-02-04 08:36:28', '2021-02-04 08:36:28'),
(6, 'E.T.O', 'e-t-o', 1, NULL, '2021-02-04 08:36:28', '2021-02-04 08:36:28'),
(7, 'Cadet', 'cadet', 1, NULL, '2021-02-04 08:36:28', '2021-02-04 08:36:28'),
(8, 'A/B', 'a-b', 1, NULL, '2021-02-04 08:36:28', '2021-02-04 08:36:28'),
(9, 'Oiler', 'oiler', 1, NULL, '2021-02-04 08:36:28', '2021-02-04 08:36:28'),
(10, 'Chief Officer', 'chief-officer', 1, NULL, '2021-02-04 08:36:28', '2021-02-04 08:36:28'),
(11, 'Able Seaman', 'able-seaman', 1, NULL, '2021-02-04 08:36:28', '2021-02-04 08:36:28'),
(12, 'Electrician', 'electrician', 1, NULL, '2021-02-04 08:36:28', '2021-02-04 08:36:28'),
(13, 'Rating forming part of Engine watch', 'rating-forming-part-of-engine-watch', 1, NULL, '2021-02-04 08:36:28', '2021-02-04 08:36:28'),
(14, 'Master', 'master', 2, NULL, '2021-02-04 08:36:28', '2021-02-04 08:36:28'),
(15, 'Chief Mate', 'chief-mate', 2, NULL, '2021-02-04 08:36:28', '2021-02-04 08:36:28'),
(16, 'Chief Engineer', 'chief-engineer', 2, NULL, '2021-02-04 08:36:28', '2021-02-04 08:36:28'),
(17, 'Second Engineer', 'second-engineer', 2, NULL, '2021-02-04 08:36:28', '2021-02-04 08:36:28'),
(18, 'Cook', 'cook', 2, NULL, '2021-02-04 08:36:28', '2021-02-04 08:36:28'),
(19, 'E.T.O', 'e-t-o', 2, NULL, '2021-02-04 08:36:28', '2021-02-04 08:36:28'),
(20, 'Cadet', 'cadet', 2, NULL, '2021-02-04 08:36:28', '2021-02-04 08:36:28'),
(21, 'A/B', 'a-b', 2, NULL, '2021-02-04 08:36:28', '2021-02-04 08:36:28'),
(22, 'Oiler', 'oiler', 2, NULL, '2021-02-04 08:36:28', '2021-02-04 08:36:28'),
(23, 'Chief Officer', 'chief-officer', 2, NULL, '2021-02-04 08:36:28', '2021-02-04 08:36:28'),
(24, 'Able Seaman', 'able-seaman', 2, NULL, '2021-02-04 08:36:28', '2021-02-04 08:36:28'),
(25, 'Electrician', 'electrician', 2, NULL, '2021-02-04 08:36:28', '2021-02-04 08:36:28'),
(26, 'Rating forming part of Engine watch', 'rating-forming-part-of-engine-watch', 2, NULL, '2021-02-04 08:36:28', '2021-02-04 08:36:28'),
(27, 'Master', 'master', 3, NULL, '2021-02-04 08:36:28', '2021-02-04 08:36:28'),
(28, 'Chief Mate', 'chief-mate', 3, NULL, '2021-02-04 08:36:28', '2021-02-04 08:36:28'),
(29, 'Chief Engineer', 'chief-engineer', 3, NULL, '2021-02-04 08:36:28', '2021-02-04 08:36:28'),
(30, 'Second Engineer', 'second-engineer', 3, NULL, '2021-02-04 08:36:28', '2021-02-04 08:36:28'),
(31, 'Cook', 'cook', 3, NULL, '2021-02-04 08:36:28', '2021-02-04 08:36:28'),
(32, 'E.T.O', 'e-t-o', 3, NULL, '2021-02-04 08:36:28', '2021-02-04 08:36:28'),
(33, 'Cadet', 'cadet', 3, NULL, '2021-02-04 08:36:28', '2021-02-04 08:36:28'),
(34, 'A/B', 'a-b', 3, NULL, '2021-02-04 08:36:28', '2021-02-04 08:36:28'),
(35, 'Oiler', 'oiler', 3, NULL, '2021-02-04 08:36:28', '2021-02-04 08:36:28'),
(36, 'Chief Officer', 'chief-officer', 3, NULL, '2021-02-04 08:36:28', '2021-02-04 08:36:28'),
(37, 'Able Seaman', 'able-seaman', 3, NULL, '2021-02-04 08:36:28', '2021-02-04 08:36:28'),
(38, 'Electrician', 'electrician', 3, NULL, '2021-02-04 08:36:28', '2021-02-04 08:36:28'),
(39, 'Rating forming part of Engine watch', 'rating-forming-part-of-engine-watch', 3, NULL, '2021-02-04 08:36:28', '2021-02-04 08:36:28'),
(40, 'Master', 'master', 4, NULL, '2021-02-04 08:36:28', '2021-02-04 08:36:28'),
(41, 'Chief Mate', 'chief-mate', 4, NULL, '2021-02-04 08:36:28', '2021-02-04 08:36:28'),
(42, 'Second Engineer', 'second-engineer', 4, NULL, '2021-02-04 08:36:28', '2021-02-04 08:36:28'),
(43, 'Chief Engineer', 'chief-engineer', 4, NULL, '2021-02-04 08:36:28', '2021-02-04 08:36:28'),
(44, 'Cook', 'cook', 4, NULL, '2021-02-04 08:36:28', '2021-02-04 08:36:28'),
(45, 'E.T.O', 'e-t-o', 4, NULL, '2021-02-04 08:36:28', '2021-02-04 08:36:28'),
(46, 'Cadet', 'cadet', 4, NULL, '2021-02-04 08:36:28', '2021-02-04 08:36:28'),
(47, 'A/B', 'a-b', 4, NULL, '2021-02-04 08:36:28', '2021-02-04 08:36:28'),
(48, 'Oiler', 'oiler', 4, NULL, '2021-02-04 08:36:28', '2021-02-04 08:36:28'),
(49, 'Chief Officer', 'chief-officer', 4, NULL, '2021-02-04 08:36:28', '2021-02-04 08:36:28'),
(50, 'Able Seaman', 'able-seaman', 4, NULL, '2021-02-04 08:36:29', '2021-02-04 08:36:29'),
(51, 'Electrician', 'electrician', 4, NULL, '2021-02-04 08:36:29', '2021-02-04 08:36:29'),
(52, 'Rating forming part of Engine watch', 'rating-forming-part-of-engine-watch', 4, NULL, '2021-02-04 08:36:29', '2021-02-04 08:36:29'),
(53, 'Master', 'master', 5, NULL, '2021-02-04 08:36:29', '2021-02-04 08:36:29'),
(54, 'Chief Mate', 'chief-mate', 5, NULL, '2021-02-04 08:36:29', '2021-02-04 08:36:29'),
(55, 'Second Engineer', 'second-engineer', 5, NULL, '2021-02-04 08:36:29', '2021-02-04 08:36:29'),
(56, 'Chief Engineer', 'chief-engineer', 5, NULL, '2021-02-04 08:36:29', '2021-02-04 08:36:29'),
(57, 'Cook', 'cook', 5, NULL, '2021-02-04 08:36:29', '2021-02-04 08:36:29'),
(58, 'E.T.O', 'e-t-o', 5, NULL, '2021-02-04 08:36:29', '2021-02-04 08:36:29'),
(59, 'Cadet', 'cadet', 5, NULL, '2021-02-04 08:36:29', '2021-02-04 08:36:29'),
(60, 'A/B', 'a-b', 5, NULL, '2021-02-04 08:36:29', '2021-02-04 08:36:29'),
(61, 'Oiler', 'oiler', 5, NULL, '2021-02-04 08:36:29', '2021-02-04 08:36:29'),
(62, 'Chief Officer', 'chief-officer', 5, NULL, '2021-02-04 08:36:29', '2021-02-04 08:36:29'),
(63, 'Able Seaman', 'able-seaman', 5, NULL, '2021-02-04 08:36:29', '2021-02-04 08:36:29'),
(64, 'Electrician', 'electrician', 5, NULL, '2021-02-04 08:36:29', '2021-02-04 08:36:29'),
(65, 'Rating forming part of Engine watch', 'rating-forming-part-of-engine-watch', 5, NULL, '2021-02-04 08:36:29', '2021-02-04 08:36:29'),
(66, 'MD/CEO', 'md-ceo', 7, NULL, '2021-02-04 08:36:29', '2021-02-04 08:36:29'),
(67, 'Legal Analyst', 'legal-analyst', 11, NULL, '2021-02-04 08:36:29', '2021-02-04 08:36:29'),
(68, 'Accountant', 'accountant', 6, NULL, '2021-02-04 08:36:29', '2021-02-04 08:36:29'),
(69, 'Accountant Assistant', 'accountant-assistant', 6, NULL, '2021-02-04 08:36:29', '2021-02-04 08:36:29'),
(70, 'Head, Marine Operations', 'head-marine-operations', 12, NULL, '2021-02-04 08:36:29', '2021-02-04 08:36:29'),
(71, 'Marine Operations Assistant', 'marine-operations-assistant', 12, NULL, '2021-02-04 08:36:29', '2021-02-04 08:36:29'),
(72, 'Head, Information Technology', 'head-information-technology', 15, NULL, '2021-02-04 08:36:29', '2021-02-04 08:36:29'),
(73, 'IT Support Assistant', 'it-support-assistant', 15, NULL, '2021-02-04 08:36:29', '2021-02-04 08:36:29'),
(74, 'Head, Business Development', 'head-business-development', 8, NULL, '2021-02-04 08:36:29', '2021-02-04 08:36:29'),
(75, 'Business Development Assistant', 'business-development-assistant', 8, NULL, '2021-02-04 08:36:29', '2021-02-04 08:36:29'),
(76, 'Head, Procurement', 'head-procurement', 16, NULL, '2021-02-04 08:36:29', '2021-02-04 08:36:29'),
(77, 'Procurement Asistant', 'procurement-assistant', 16, NULL, '2021-02-04 08:36:29', '2021-02-04 08:36:29'),
(78, 'Head, Human Resources', 'head-human-resources', 13, NULL, '2021-02-04 08:36:29', '2021-02-04 08:36:29'),
(79, 'Head, HSE', 'head-hse', 14, NULL, '2021-02-04 08:36:29', '2021-02-04 08:36:29'),
(80, 'HSE Assistant', 'hse-assistant', 14, NULL, '2021-02-04 08:36:29', '2021-02-04 08:36:29'),
(81, 'Admin', 'admin', 7, NULL, '2021-02-04 08:36:29', '2021-02-04 08:36:29'),
(82, 'Facility Manager', 'facility-manager', 10, NULL, '2021-02-04 08:36:29', '2021-02-04 08:36:29'),
(83, 'Driver', 'driver', 7, NULL, '2021-02-04 08:36:29', '2021-02-04 08:36:29'),
(84, 'Master', 'master', 17, NULL, NULL, NULL),
(85, 'Chief Mate', 'chief-mate', 17, NULL, NULL, NULL),
(86, 'Chief Engineer', 'chief-engineer', 17, NULL, NULL, NULL),
(87, 'Second Engineer', 'second-engineer', 17, NULL, NULL, NULL),
(88, 'Cook', 'cook', 17, NULL, NULL, NULL),
(89, 'E.T.O', 'e-t-o', 17, NULL, NULL, NULL),
(90, 'Cadet', 'cadet', 17, NULL, NULL, NULL),
(91, 'A/B', 'a-b', 17, NULL, NULL, NULL),
(92, 'Oiler', 'oiler', 17, NULL, NULL, NULL),
(93, 'Chief Officer', 'chief-officer', 17, NULL, NULL, NULL),
(94, 'Able Seaman', 'able-seaman', 17, NULL, NULL, NULL),
(95, 'Electrician', 'electrician', 17, NULL, NULL, NULL),
(96, 'Rating forming part of Engine watch', 'rating-forming-part-of-engine-watch', 17, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `profiles`
--

CREATE TABLE `profiles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `emp_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Employee ID',
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Display Picture',
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `start_date` date DEFAULT NULL COMMENT 'Join Date',
  `nhf_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pfa_id` bigint(20) UNSIGNED DEFAULT NULL,
  `rsa_pin_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `grade` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `r_address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `p_address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `d_o_b` date DEFAULT NULL,
  `p_o_b` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nationality` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state_of_origin` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `home_town` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `local_govt` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `marital_status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `religion` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name_of_spouse` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `maiden_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `spouse_phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address_of_spouse` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `next_of_kin_ben` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `relationship_ben` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address_ben` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tel_ben` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `next_of_kin_em` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `relationship_em` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address_em` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tel_em` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `disability` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `height` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `weight` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `blood_group` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `genotype` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hobbies` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `languages` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `indebted` tinyint(1) NOT NULL DEFAULT '0',
  `debt_details` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `intention` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `convict` tinyint(1) NOT NULL DEFAULT '0',
  `crime_details` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bank_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `account_no` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sort_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `salary_basis` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `salary` decimal(15,2) NOT NULL DEFAULT '0.00',
  `payment_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cv` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Curriculum Vitae',
  `mid` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'means of Identification',
  `aca_cert` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Academic Certificate',
  `sa` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Skill Aquisition',
  `contract_letter` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `coc` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Certidicate of Competency',
  `med_cert` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Medical Certificate',
  `stcw` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `paffp` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Proficiency in Advanced Fire Fighting and Prevention',
  `parpo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Proficiency in ARP (Operational)',
  `pecdis` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Proficiency in Electronic Chart Display System',
  `pefa` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Proficiency in Elementary First Aid',
  `ism` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Certificate in International Safety Management',
  `pscrb` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Proficiency Survival Craft and Rescue Boat',
  `pssr` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Proficiency in Personal Safety and Social Responsibilities',
  `pst` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Proficiency in Survival Techniques',
  `psso` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Proficiency as Ship Security Officer',
  `gdmss` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'GDMSS - General Operators Certificate',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `profiles`
--

INSERT INTO `profiles` (`id`, `user_id`, `emp_id`, `avatar`, `gender`, `start_date`, `nhf_no`, `pfa_id`, `rsa_pin_no`, `grade`, `r_address`, `p_address`, `title`, `phone`, `d_o_b`, `p_o_b`, `nationality`, `state_of_origin`, `home_town`, `local_govt`, `marital_status`, `religion`, `name_of_spouse`, `maiden_name`, `spouse_phone`, `address_of_spouse`, `next_of_kin_ben`, `relationship_ben`, `address_ben`, `tel_ben`, `next_of_kin_em`, `relationship_em`, `address_em`, `tel_em`, `disability`, `height`, `weight`, `blood_group`, `genotype`, `hobbies`, `languages`, `indebted`, `debt_details`, `intention`, `convict`, `crime_details`, `bank_name`, `account_no`, `sort_code`, `salary_basis`, `salary`, `payment_type`, `cv`, `mid`, `aca_cert`, `sa`, `contract_letter`, `coc`, `med_cert`, `stcw`, `paffp`, `parpo`, `pecdis`, `pefa`, `ism`, `pscrb`, `pssr`, `pst`, `psso`, `gdmss`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 1, NULL, 'storage/uploads/employees/1/dp/me_1612431845.jpg', 'm', '2018-11-26', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, 0, NULL, 'GUARANTY TRUST', '0000006754', NULL, NULL, 0.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-02-04 08:36:29', '2021-03-01 11:24:32'),
(2, 2, 'NUE-001', 'storage/uploads/employees/dp/avatar.jpg', 'm', '2014-01-01', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '7033715446', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, 0.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-02-04 10:58:32', '2021-02-04 10:58:32'),
(3, 3, '10034', 'storage/uploads/employees/dp/avatar.jpg', 'f', '2021-01-02', '1111111', 1, 'PEN5464748', 'Analyst', 'Murfreesboro, TN 37132', '11b', 'Mr', '6158982947', '2021-02-28', 'Lagos, Nigeria', 'Nigeria', 'LA', 'Ikosi', 'OWAN EAST', 'Single', 'Christianity', 'Yemi', 'Ogubanjo', '0984547489', '15 Aina Street', 'Sophie', 'Samuel', '11 ogunnaike', NULL, 'Yomi Agunbiade', 'Brother', '8 Billings way', NULL, 'Non', '1.93', '78', 'AA', 'OO', NULL, NULL, 1, '3,000,000.00 in loans', 'Installmental repayment plans', 0, NULL, 'GUARANTY TRUST', '000004444', NULL, 'Monthly', 400000.00, 'Bank Transfer', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-02-04 12:07:38', '2021-02-09 15:21:26'),
(4, 4, '1126', 'storage/uploads/employees/dp/avatar.jpg', 'm', '2020-12-15', '152427362425', NULL, NULL, NULL, NULL, NULL, NULL, '7777777', NULL, NULL, NULL, NULL, NULL, NULL, '-', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, 0, NULL, 'GTB', '0554789786', NULL, 'Monthly', 240000.00, 'Bank Transfer', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-02-06 15:37:39', '2021-02-07 13:26:23'),
(5, 5, '2345', 'storage/uploads/employees/dp/avatar.jpg', 'f', '2021-01-01', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '555 555 555', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, 0.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-02-09 12:28:27', '2021-02-09 12:28:27'),
(6, 6, '1999', 'storage/uploads/employees/dp/avatar.jpg', 'm', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '99999999', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, 0.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-02-18 19:06:58', '2021-02-18 19:06:58'),
(7, 7, '345', 'storage/uploads/employees/dp/avatar.jpg', 'f', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '88888888', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, 0.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-02-18 19:15:12', '2021-02-18 19:15:12'),
(8, 8, '54356', 'storage/uploads/employees/dp/avatar.jpg', 'f', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '6666666', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, 0.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-02-18 19:22:54', '2021-02-18 19:22:54'),
(9, 9, '6579', 'storage/uploads/employees/9/dp/1613749443carmatlogo.PNG', 'f', '2019-01-09', '5367363', NULL, '3yt364535376533', NULL, '11 oshodi', '11b', NULL, '8656373993', '1999-06-20', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, 0.00, NULL, 'storage/uploads/employees/9/documents/ADEYEMOA_A-CV_1614098356.doc', 'storage/uploads/employees/9/documents/512x512_1614098356.jpg', 'storage/uploads/employees/9/documents/coren-cert_1614098356.pdf', 'storage/uploads/employees/9/documents/alph_1614098356.jpg', 'storage/uploads/employees/9/documents/ogunnaike-PHCN_1614000977.pdf', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-02-19 15:44:04', '2021-02-23 16:39:16'),
(10, 10, '322356', 'storage/uploads/employees/10/dp/1613749911violence2.jpg', 'f', '2019-01-10', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '435433444', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, 0.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-02-19 15:51:52', '2021-02-19 15:51:52'),
(11, 11, 'NUEVS-001', 'storage/uploads/employees/dp/avatar.jpg', 'm', '2020-01-01', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '+2348123267184', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, 0.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-02-24 10:39:56', '2021-02-24 10:39:56');

-- --------------------------------------------------------

--
-- Table structure for table `reports`
--

CREATE TABLE `reports` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL COMMENT 'report was created by this user',
  `report_date` date NOT NULL COMMENT 'report due date',
  `report` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Report File',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reports`
--

INSERT INTO `reports` (`id`, `category_id`, `user_id`, `report_date`, `report`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 6, 1, '2021-02-01', 'storage/uploads/employees/1/reports/CERTIFICATEOFNIGERIANREGISTRY_1612888460.pdf', NULL, '2021-02-09 16:34:20', '2021-02-09 16:34:20'),
(2, 6, 1, '2021-02-10', 'storage/uploads/employees/1/reports/CERTIFICATEOFNIGERIANREGISTRY_1612888589.pdf', NULL, '2021-02-09 16:36:29', '2021-02-09 16:36:29'),
(3, 1, 11, '2021-02-24', 'storage/uploads/employees/11/reports/OrderofPrecedence&SeatingArrangement_1614163433.pdf', NULL, '2021-02-24 10:43:54', '2021-02-24 10:43:54'),
(4, 6, 1, '2021-02-26', 'storage/uploads/employees/1/reports/Datasek_TrainingInstitute_Courses_1614598532.pdf', NULL, '2021-03-01 11:35:33', '2021-03-01 11:35:33');

-- --------------------------------------------------------

--
-- Table structure for table `reports_tos`
--

CREATE TABLE `reports_tos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL COMMENT 'This user reports to',
  `reports_to` bigint(20) UNSIGNED DEFAULT NULL COMMENT 'This user',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `requisitions`
--

CREATE TABLE `requisitions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `rid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_by` int(11) NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `beneficiary` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `reason` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` int(11) NOT NULL,
  `unit_price` decimal(10,2) UNSIGNED NOT NULL,
  `amount` decimal(10,2) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `requisitions`
--

INSERT INTO `requisitions` (`id`, `rid`, `created_by`, `type`, `status`, `beneficiary`, `reason`, `description`, `quantity`, `unit_price`, `amount`, `created_at`, `updated_at`) VALUES
(5, 'rid4043', 9, 'cash_advance', 'SENT', '9', 'travelling to PH for a meeting', 'Travelling and need cash', 3, 50000.00, 150000.00, '2021-02-19 21:18:07', '2021-02-19 21:18:07'),
(6, 'rid43050', 3, 'cash_advance', 'PAID', '3', 'delivery of groceries to NUE defender', 'livestock and beverages', 5, 50000.00, 250000.00, '2021-03-01 11:49:09', '2021-03-01 11:49:09');

-- --------------------------------------------------------

--
-- Table structure for table `req_documents`
--

CREATE TABLE `req_documents` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `rid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `req_histories`
--

CREATE TABLE `req_histories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `requistion_id` int(11) NOT NULL,
  `sender` int(11) NOT NULL,
  `receiver` int(11) NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'PENDING',
  `comment` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `req_histories`
--

INSERT INTO `req_histories` (`id`, `requistion_id`, `sender`, `receiver`, `status`, `comment`, `created_at`, `updated_at`) VALUES
(16, 5, 9, 10, 'PENDING', NULL, '2021-02-19 21:18:07', '2021-02-19 21:18:07'),
(17, 6, 3, 1, 'PENDING', NULL, '2021-03-01 11:49:10', '2021-03-01 11:49:10'),
(18, 6, 3, 1, 'APPROVED', 'requisition approved', '2021-03-01 11:51:32', '2021-03-01 11:51:32'),
(19, 6, 1, 6, 'PENDING', NULL, '2021-03-01 11:51:32', '2021-03-01 11:51:32'),
(20, 6, 1, 6, 'APPROVED', 'there is budget for this item', '2021-03-01 11:58:53', '2021-03-01 11:58:53'),
(21, 6, 6, 7, 'PENDING', NULL, '2021-03-01 11:58:53', '2021-03-01 11:58:53'),
(22, 6, 6, 7, 'APPROVED', 'Payment made', '2021-03-01 12:02:38', '2021-03-01 12:02:38');

-- --------------------------------------------------------

--
-- Table structure for table `req_roles`
--

CREATE TABLE `req_roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `req_roles`
--

INSERT INTO `req_roles` (`id`, `role_name`, `created_at`, `updated_at`) VALUES
(1, 'Users', NULL, NULL),
(2, 'Audit/Control', NULL, NULL),
(3, 'Budget controller', NULL, NULL),
(4, 'Super Admin', NULL, NULL),
(5, 'Disbursement', NULL, NULL),
(6, 'MD/CEO', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `req_users`
--

CREATE TABLE `req_users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `supervisor_id` int(11) DEFAULT NULL,
  `role_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `req_users`
--

INSERT INTO `req_users` (`id`, `user_id`, `supervisor_id`, `role_id`, `created_at`, `updated_at`) VALUES
(1, 4, 4, 4, '2021-01-06 22:30:58', '2021-01-06 22:30:58'),
(15, 3, 1, 1, '2021-02-09 15:40:46', '2021-02-09 15:40:46'),
(16, 2, NULL, 3, '2021-02-18 15:17:32', '2021-02-18 15:17:32'),
(17, 9, 10, 1, '2021-02-19 15:57:00', '2021-02-19 15:57:00'),
(18, 1, NULL, 1, '2021-02-19 15:58:37', '2021-02-19 15:58:37'),
(19, 6, NULL, 3, '2021-02-19 16:22:51', '2021-02-19 16:22:51'),
(20, 7, NULL, 5, '2021-02-19 16:23:19', '2021-02-19 16:23:19'),
(21, 8, NULL, 1, '2021-02-19 16:23:48', '2021-02-19 16:23:48'),
(22, 8, NULL, 5, '2021-02-19 16:23:48', '2021-02-19 16:23:48');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `f_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'first name',
  `l_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'last name',
  `o_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'other name',
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'first_name-other_name-last_name',
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `supervisor_id` int(10) UNSIGNED NOT NULL DEFAULT '0' COMMENT 'line manager ID | 0 - Supervisor',
  `role` tinyint(4) NOT NULL DEFAULT '0' COMMENT '0 - staff; 1 - HR; 3 - Admin; 4 - MD; 5 - Crew',
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `department_id` int(10) UNSIGNED DEFAULT NULL COMMENT 'employee department',
  `position_id` bigint(20) UNSIGNED NOT NULL COMMENT 'employee position',
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `f_name`, `l_name`, `o_name`, `slug`, `email`, `email_verified_at`, `supervisor_id`, `role`, `category_id`, `department_id`, `position_id`, `password`, `remember_token`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Victor ', 'Ukam', '', 'victor-ukam', 'victor.ukam@nueoffshore.com', NULL, 0, 1, 6, 15, 72, '$2y$10$vMJTKytmf7tDRN.gfwWdW.QmlBwnJP4R4R1HW3KLnVdP3Sf6vCKhe', NULL, NULL, '2021-02-04 08:36:29', '2021-02-04 08:36:29'),
(2, 'Uyi', 'Igbinigie', '', 'uyi-igbinigie', 'uyi.igbinigie@nueoffshore.com', NULL, 0, 4, 6, 7, 66, '$2y$10$jPhI1jDewARklyufGdNugesZzS.5Cy7n1tf3b2Pyx/2CYV5uaqlFW', NULL, NULL, '2021-02-04 10:58:32', '2021-02-23 16:38:46'),
(3, 'Blessing', 'TestName', '', 'blessing-testname', 'blessing@nueoffshore.com', NULL, 0, 0, 6, 8, 75, '$2y$10$hAfZclFa15iQF2cCh00Wk.COlaaK7DWYetq7DkZTkApLw3BEUCQWm', NULL, NULL, '2021-02-04 12:07:13', '2021-02-04 12:07:13'),
(4, 'Admin', 'Req', '', 'admin-req', 'admin@gmail.com', NULL, 0, 0, 6, 15, 72, '$2y$10$bPDOIKqg.Grid6zJQ5Wc9e.AARJ1VR7iybDcx9tC7ZVoaYfGr/ewS', NULL, NULL, '2021-02-06 15:37:39', '2021-02-06 15:37:39'),
(5, 'Sandra', 'Blessing', '', 'sandra-blessing', 'sandra@mail.com', NULL, 0, 0, 6, 8, 74, '$2y$10$/i.I1McK7mZY/kYEVvZQW.JkrUwXRd2DN6n/W/AEUv1Zf5xnaheTq', NULL, NULL, '2021-02-09 12:28:27', '2021-02-09 12:28:27'),
(6, 'Budget', 'Controller2', '', 'budget-controller2', 'controller2@nueoffshore.com', NULL, 0, 0, 6, 6, 68, '$2y$10$vMJTKytmf7tDRN.gfwWdW.QmlBwnJP4R4R1HW3KLnVdP3Sf6vCKhe', NULL, NULL, '2021-02-18 19:06:58', '2021-02-18 19:06:58'),
(7, 'Disbursement1', 'Officer', '', 'disbursement1-officer', 'disbursement1@nueoffshore.com', NULL, 0, 0, 6, 6, 69, '$2y$10$vMJTKytmf7tDRN.gfwWdW.QmlBwnJP4R4R1HW3KLnVdP3Sf6vCKhe', NULL, NULL, '2021-02-18 19:15:12', '2021-02-18 19:15:12'),
(8, 'Disbursement2', 'Officer', '', 'disbursement2-officer', 'disbursement2@nueoffshore.com', NULL, 0, 0, 6, 6, 69, '$2y$10$nwa5DBL9OqKrEj8f0kVrj.JLD84DEWcHfEVN3R8uA.Xv4WwW0GKM.', NULL, NULL, '2021-02-18 19:22:54', '2021-02-18 19:22:54'),
(9, 'Lydia', 'Test2', '', 'lydia-test2', 'lydia@nueoffshore.com', NULL, 0, 0, 6, 16, 77, '$2y$10$KoQ1Juoeo9IfOLUJuoV/be2.RPmXqEGqyuQCid.SM9lqT1x0CMvPq', 'VvbHBqpaaPraAdsktcZk5sogT21UgbEG6lOEz21BXMWOTKJotDw5OQEFP8Ca', NULL, '2021-02-19 15:44:03', '2021-02-19 15:44:03'),
(10, 'Amaka', 'Obi-o', '', 'amaka-obi-o', 'amaka@nueoffshore.com', NULL, 0, 0, 6, 16, 76, '$2y$10$cXJ5biQvfJX/w9oO/.A3xOzcxsntIEXoFo5/QLf4QIhvMbISvdCh6', NULL, NULL, '2021-02-19 15:51:51', '2021-02-19 15:51:51'),
(11, 'Magnus', 'Minima', '', 'magnus-minima', 'magnus.minima@nueoffshore.com', NULL, 0, 5, 1, 1, 1, '$2y$10$53X/t8YLD8U7k2F3fEqpUOCA1eJogJ7msIGjG16tOjwQJq4aCSHIO', NULL, NULL, '2021-02-24 10:39:56', '2021-02-24 10:39:56');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `audits`
--
ALTER TABLE `audits`
  ADD PRIMARY KEY (`id`),
  ADD KEY `audits_user_id_foreign` (`user_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `departments_category_id_index` (`category_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notifications_sender_foreign` (`sender`),
  ADD KEY `notifications_receiver_foreign` (`receiver`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `payrolls`
--
ALTER TABLE `payrolls`
  ADD PRIMARY KEY (`id`),
  ADD KEY `payrolls_employee_id_index` (`employee_id`),
  ADD KEY `payrolls_category_id_index` (`category_id`);

--
-- Indexes for table `pfas`
--
ALTER TABLE `pfas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `positions`
--
ALTER TABLE `positions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `positions_department_id_index` (`department_id`);

--
-- Indexes for table `profiles`
--
ALTER TABLE `profiles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `profiles_user_id_index` (`user_id`);

--
-- Indexes for table `reports`
--
ALTER TABLE `reports`
  ADD PRIMARY KEY (`id`),
  ADD KEY `reports_category_id_index` (`category_id`),
  ADD KEY `reports_user_id_index` (`user_id`);

--
-- Indexes for table `reports_tos`
--
ALTER TABLE `reports_tos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `reports_tos_user_id_index` (`user_id`),
  ADD KEY `reports_tos_reports_to_index` (`reports_to`);

--
-- Indexes for table `requisitions`
--
ALTER TABLE `requisitions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `requisitions_created_by_foreign` (`created_by`);

--
-- Indexes for table `req_documents`
--
ALTER TABLE `req_documents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `req_histories`
--
ALTER TABLE `req_histories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `req_histories_requistion_id_foreign` (`requistion_id`),
  ADD KEY `req_histories_sender_foreign` (`sender`),
  ADD KEY `req_histories_receiver_foreign` (`receiver`);

--
-- Indexes for table `req_roles`
--
ALTER TABLE `req_roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `req_users`
--
ALTER TABLE `req_users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `req_users_user_id_foreign` (`user_id`),
  ADD KEY `req_users_supervisor_id_foreign` (`supervisor_id`),
  ADD KEY `req_users_role_id_foreign` (`role_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_category_id_index` (`category_id`),
  ADD KEY `users_position_id_index` (`position_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `audits`
--
ALTER TABLE `audits`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `payrolls`
--
ALTER TABLE `payrolls`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `pfas`
--
ALTER TABLE `pfas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `positions`
--
ALTER TABLE `positions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=97;

--
-- AUTO_INCREMENT for table `profiles`
--
ALTER TABLE `profiles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `reports`
--
ALTER TABLE `reports`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `reports_tos`
--
ALTER TABLE `reports_tos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `requisitions`
--
ALTER TABLE `requisitions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `req_documents`
--
ALTER TABLE `req_documents`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `req_histories`
--
ALTER TABLE `req_histories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `req_roles`
--
ALTER TABLE `req_roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `req_users`
--
ALTER TABLE `req_users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `departments`
--
ALTER TABLE `departments`
  ADD CONSTRAINT `departments_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `payrolls`
--
ALTER TABLE `payrolls`
  ADD CONSTRAINT `payrolls_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `payrolls_employee_id_foreign` FOREIGN KEY (`employee_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `positions`
--
ALTER TABLE `positions`
  ADD CONSTRAINT `positions_department_id_foreign` FOREIGN KEY (`department_id`) REFERENCES `departments` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `profiles`
--
ALTER TABLE `profiles`
  ADD CONSTRAINT `profiles_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `reports`
--
ALTER TABLE `reports`
  ADD CONSTRAINT `reports_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `reports_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `reports_tos`
--
ALTER TABLE `reports_tos`
  ADD CONSTRAINT `reports_tos_reports_to_foreign` FOREIGN KEY (`reports_to`) REFERENCES `users` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `reports_tos_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `users_position_id_foreign` FOREIGN KEY (`position_id`) REFERENCES `positions` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
