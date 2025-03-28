-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Mar 26, 2025 at 11:01 AM
-- Server version: 8.0.41-0ubuntu0.22.04.1
-- PHP Version: 8.1.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `satna`
--

-- --------------------------------------------------------

--
-- Table structure for table `activity_log`
--

CREATE TABLE `activity_log` (
  `id` bigint UNSIGNED NOT NULL,
  `log_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject_type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `event` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `subject_id` bigint UNSIGNED DEFAULT NULL,
  `causer_type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `causer_id` bigint UNSIGNED DEFAULT NULL,
  `properties` json DEFAULT NULL,
  `batch_uuid` char(36) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `activity_log`
--

INSERT INTO `activity_log` (`id`, `log_name`, `description`, `subject_type`, `event`, `subject_id`, `causer_type`, `causer_id`, `properties`, `batch_uuid`, `created_at`, `updated_at`) VALUES
(1, 'default', 'Created Event', 'App\\Models\\Event', NULL, 1, NULL, NULL, '{\"attributes\": {\"id\": 1, \"url\": \"roles\", \"name\": \"New Role Created\", \"created_at\": \"2024-11-12 15:35:11\", \"updated_at\": \"2024-11-12 15:35:11\", \"description\": \"A new role was created\"}}', NULL, '2024-11-12 15:35:11', '2024-11-12 15:35:11'),
(2, 'default', 'Created Event', 'App\\Models\\Event', NULL, 2, NULL, NULL, '{\"attributes\": {\"id\": 2, \"url\": \"roles\", \"name\": \"Role Modified\", \"created_at\": \"2024-11-12 15:35:11\", \"updated_at\": \"2024-11-12 15:35:11\", \"description\": \"A role was modified\"}}', NULL, '2024-11-12 15:35:11', '2024-11-12 15:35:11'),
(3, 'default', 'Created Event', 'App\\Models\\Event', NULL, 3, NULL, NULL, '{\"attributes\": {\"id\": 3, \"url\": \"users\", \"name\": \"New User Created\", \"created_at\": \"2024-11-12 15:35:11\", \"updated_at\": \"2024-11-12 15:35:11\", \"description\": \"A new user was created\"}}', NULL, '2024-11-12 15:35:11', '2024-11-12 15:35:11'),
(4, 'default', 'Created Event', 'App\\Models\\Event', NULL, 4, NULL, NULL, '{\"attributes\": {\"id\": 4, \"url\": \"users\", \"name\": \"User Modified\", \"created_at\": \"2024-11-12 15:35:11\", \"updated_at\": \"2024-11-12 15:35:11\", \"description\": \"User account was modified\"}}', NULL, '2024-11-12 15:35:11', '2024-11-12 15:35:11'),
(5, 'default', 'Created Event', 'App\\Models\\Event', NULL, 5, NULL, NULL, '{\"attributes\": {\"id\": 5, \"url\": \"departments\", \"name\": \"Department Created\", \"created_at\": \"2024-11-12 15:35:11\", \"updated_at\": \"2024-11-12 15:35:11\", \"description\": \"A new department was created\"}}', NULL, '2024-11-12 15:35:11', '2024-11-12 15:35:11'),
(6, 'default', 'Created Event', 'App\\Models\\Event', NULL, 6, NULL, NULL, '{\"attributes\": {\"id\": 6, \"url\": \"departments\", \"name\": \"Department Modified\", \"created_at\": \"2024-11-12 15:35:11\", \"updated_at\": \"2024-11-12 15:35:11\", \"description\": \"A department was modified\"}}', NULL, '2024-11-12 15:35:11', '2024-11-12 15:35:11'),
(7, 'default', 'Created Event', 'App\\Models\\Event', NULL, 7, NULL, NULL, '{\"attributes\": {\"id\": 7, \"url\": \"departments\", \"name\": \"Department Deleted\", \"created_at\": \"2024-11-12 15:35:11\", \"updated_at\": \"2024-11-12 15:35:11\", \"description\": \"A department was deleted\"}}', NULL, '2024-11-12 15:35:11', '2024-11-12 15:35:11'),
(8, 'default', 'Created Event', 'App\\Models\\Event', NULL, 8, NULL, NULL, '{\"attributes\": {\"id\": 8, \"url\": \"services\", \"name\": \"Service Created\", \"created_at\": \"2024-11-12 15:35:11\", \"updated_at\": \"2024-11-12 15:35:11\", \"description\": \"A new service was created\"}}', NULL, '2024-11-12 15:35:11', '2024-11-12 15:35:11'),
(9, 'default', 'Created Event', 'App\\Models\\Event', NULL, 9, NULL, NULL, '{\"attributes\": {\"id\": 9, \"url\": \"services\", \"name\": \"Service Modified\", \"created_at\": \"2024-11-12 15:35:11\", \"updated_at\": \"2024-11-12 15:35:11\", \"description\": \"A service was modified\"}}', NULL, '2024-11-12 15:35:11', '2024-11-12 15:35:11'),
(10, 'default', 'Created Event', 'App\\Models\\Event', NULL, 10, NULL, NULL, '{\"attributes\": {\"id\": 10, \"url\": \"services\", \"name\": \"Service Deleted\", \"created_at\": \"2024-11-12 15:35:11\", \"updated_at\": \"2024-11-12 15:35:11\", \"description\": \"A service was deleted\"}}', NULL, '2024-11-12 15:35:11', '2024-11-12 15:35:11'),
(11, 'default', 'Created Event', 'App\\Models\\Event', NULL, 11, NULL, NULL, '{\"attributes\": {\"id\": 11, \"url\": \"doctors\", \"name\": \"Doctor Created\", \"created_at\": \"2024-11-12 15:35:11\", \"updated_at\": \"2024-11-12 15:35:11\", \"description\": \"A new doctor was created\"}}', NULL, '2024-11-12 15:35:11', '2024-11-12 15:35:11'),
(12, 'default', 'Created Event', 'App\\Models\\Event', NULL, 12, NULL, NULL, '{\"attributes\": {\"id\": 12, \"url\": \"doctors\", \"name\": \"Doctor Updated\", \"created_at\": \"2024-11-12 15:35:11\", \"updated_at\": \"2024-11-12 15:35:11\", \"description\": \"Doctor information was updated\"}}', NULL, '2024-11-12 15:35:11', '2024-11-12 15:35:11'),
(13, 'default', 'Created Event', 'App\\Models\\Event', NULL, 13, NULL, NULL, '{\"attributes\": {\"id\": 13, \"url\": \"doctors\", \"name\": \"Doctor Deleted\", \"created_at\": \"2024-11-12 15:35:11\", \"updated_at\": \"2024-11-12 15:35:11\", \"description\": \"Doctor was deleted\"}}', NULL, '2024-11-12 15:35:11', '2024-11-12 15:35:11'),
(14, 'default', 'Created Event', 'App\\Models\\Event', NULL, 14, NULL, NULL, '{\"attributes\": {\"id\": 14, \"url\": \"doctors\", \"name\": \"Doctor Status Updated\", \"created_at\": \"2024-11-12 15:35:11\", \"updated_at\": \"2024-11-12 15:35:11\", \"description\": \"Doctor status was updated\"}}', NULL, '2024-11-12 15:35:11', '2024-11-12 15:35:11'),
(15, 'default', 'User logged in', NULL, NULL, NULL, 'App\\Models\\User', 1, '{\"ip\": \"72.255.9.74\", \"os\": \"Windows\", \"event\": \"login\", \"device\": \"Desktop\", \"browser\": \"Chrome\", \"location\": \"Karachi, Sindh, Pakistan\", \"user_agent\": \"Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/130.0.0.0 Safari/537.36\"}', NULL, '2024-11-15 12:07:32', '2024-11-15 12:07:32'),
(16, 'default', 'User logged in', NULL, NULL, NULL, 'App\\Models\\User', 1, '{\"ip\": \"2402:e000:548:f69d:38a9:63ee:2a3c:7fa1\", \"os\": \"Windows\", \"event\": \"login\", \"device\": \"Desktop\", \"browser\": \"Chrome\", \"location\": \"Karachi, Sindh, Pakistan\", \"user_agent\": \"Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36 Edg/131.0.0.0\"}', NULL, '2024-11-19 08:16:07', '2024-11-19 08:16:07'),
(17, 'default', 'Created Department', 'App\\Models\\Department', NULL, 1, 'App\\Models\\User', 1, '{\"attributes\": {\"id\": 1, \"name\": \"Medicen\", \"sequence\": \"0\", \"created_at\": \"2024-11-19 08:16:49\", \"updated_at\": \"2024-11-19 08:16:49\"}}', NULL, '2024-11-19 08:16:49', '2024-11-19 08:16:49'),
(18, 'default', 'Created Department', 'App\\Models\\Department', NULL, 2, 'App\\Models\\User', 1, '{\"attributes\": {\"id\": 2, \"name\": \"OPD\", \"sequence\": \"1\", \"created_at\": \"2024-11-19 08:17:10\", \"updated_at\": \"2024-11-19 08:17:10\"}}', NULL, '2024-11-19 08:17:10', '2024-11-19 08:17:10'),
(19, 'default', 'Created Service', 'App\\Models\\Service', NULL, 1, 'App\\Models\\User', 1, '{\"attributes\": {\"id\": 1, \"name\": \"Clinic Obesity\", \"charges\": \"2000\", \"created_at\": \"2024-11-19 08:18:05\", \"updated_at\": \"2024-11-19 08:18:05\", \"department_id\": \"2\"}}', NULL, '2024-11-19 08:18:05', '2024-11-19 08:18:05'),
(20, 'default', 'Created Doctor', 'App\\Models\\Doctor', NULL, 1, 'App\\Models\\User', 1, '{\"attributes\": {\"id\": 1, \"dob\": \"1979-02-12\", \"sex\": \"Male\", \"cnic\": \"4101_-1924069-9\", \"name\": \"Dr Satna\", \"image\": \"doctors/x5cWi85MbknkyVnMDT7jGcQUggoh3kumAae0UUl3.jpg\", \"address\": \"sfdsf\", \"religion\": null, \"bank_name\": null, \"doctor_id\": \"1\", \"created_at\": \"2024-11-19 08:23:24\", \"specialist\": \"skin\", \"updated_at\": \"2024-11-19 08:23:24\", \"payment_mode\": \"Cash\", \"account_title\": null, \"department_id\": \"1\", \"account_number\": null, \"clinic_portion\": \"80\", \"contact_number\": \"(0300) 285-2247\", \"doctor_charges\": \"5000\", \"doctor_portion\": \"20\", \"marital_status\": \"Single\", \"date_of_appointment\": \"2024-11-19\", \"emergency_contact_name\": \"0202020000\", \"emergency_contact_number\": \"03002852241\", \"emergency_contact_relation\": \"00000000000\"}}', NULL, '2024-11-19 08:23:24', '2024-11-19 08:23:24'),
(21, 'default', 'Created Qualification', 'App\\Models\\Qualification', NULL, 1, 'App\\Models\\User', 1, '{\"attributes\": {\"id\": 1, \"degree\": \"MBBS\", \"majors\": \"Medicen\", \"doctor_id\": 1, \"created_at\": \"2024-11-19 08:23:24\", \"updated_at\": \"2024-11-19 08:23:24\", \"institution\": \"Dawo\"}}', NULL, '2024-11-19 08:23:24', '2024-11-19 08:23:24'),
(22, 'default', 'Created Experience', 'App\\Models\\Experience', NULL, 1, 'App\\Models\\User', 1, '{\"attributes\": {\"id\": 1, \"end_date\": \"2024-11-19\", \"doctor_id\": 1, \"created_at\": \"2024-11-19 08:23:24\", \"start_date\": \"2024-11-05\", \"updated_at\": \"2024-11-19 08:23:24\", \"designation\": \"head of skin\", \"last_employer\": \"Down Medican\"}}', NULL, '2024-11-19 08:23:24', '2024-11-19 08:23:24'),
(23, 'default', 'User logged in', NULL, NULL, NULL, 'App\\Models\\User', 1, '{\"ip\": \"39.48.209.133\", \"os\": \"Windows\", \"event\": \"login\", \"device\": \"Desktop\", \"browser\": \"Chrome\", \"location\": \"Karachi, Sindh, Pakistan\", \"user_agent\": \"Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36\"}', NULL, '2024-11-19 15:00:51', '2024-11-19 15:00:51'),
(24, 'default', 'Updated User', 'App\\Models\\User', NULL, 1, 'App\\Models\\User', 1, '{\"old\": {\"id\": 1, \"name\": \"Admin\", \"email\": \"admin@themesbrand.com\", \"image\": null, \"password\": \"$2y$10$lC9z9FNo7I4aAwxWSnHqq.RNyCnSsNtWsEG.t.ocrXcSRDnPQFlbO\", \"is_active\": 1, \"created_at\": \"2024-11-12T15:35:11.000000Z\", \"updated_at\": null, \"remember_token\": null, \"google2fa_secret\": null, \"email_2fa_enabled\": null, \"email_verified_at\": null}, \"attributes\": {\"remember_token\": \"RJOvmHdQdsoungiyEd0mMhxgYeJu18LQ7GrYq62Z2a9TXs96dEN9oU62yaiM\"}}', NULL, '2024-11-20 15:16:23', '2024-11-20 15:16:23'),
(25, 'default', 'User logged in', NULL, NULL, NULL, 'App\\Models\\User', 1, '{\"ip\": \"72.255.9.74\", \"os\": \"Windows\", \"event\": \"login\", \"device\": \"Desktop\", \"browser\": \"Chrome\", \"location\": \"Karachi, Sindh, Pakistan\", \"user_agent\": \"Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36\"}', NULL, '2024-11-20 15:16:24', '2024-11-20 15:16:24'),
(26, 'default', 'User logged in', NULL, NULL, NULL, 'App\\Models\\User', 1, '{\"ip\": \"72.255.9.74\", \"os\": \"Windows\", \"event\": \"login\", \"device\": \"Desktop\", \"browser\": \"Chrome\", \"location\": \"Karachi, Sindh, Pakistan\", \"user_agent\": \"Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36\"}', NULL, '2024-11-25 12:55:32', '2024-11-25 12:55:32'),
(27, 'default', 'User logged in', NULL, NULL, NULL, 'App\\Models\\User', 1, '{\"ip\": \"72.255.9.74\", \"os\": \"Windows\", \"event\": \"login\", \"device\": \"Desktop\", \"browser\": \"Chrome\", \"location\": \"Karachi, Sindh, Pakistan\", \"user_agent\": \"Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36\"}', NULL, '2024-11-25 13:55:47', '2024-11-25 13:55:47'),
(28, 'default', 'Created Patient', 'App\\Models\\Patient', NULL, 1001, 'App\\Models\\User', 1, '{\"attributes\": {\"id\": 1001, \"note\": null, \"type\": \"Regular Patient\", \"doctor_id\": null, \"fc_number\": 1001, \"created_at\": \"2024-11-25 14:01:08\", \"spouse_dob\": \"1974-02-12\", \"updated_at\": \"2024-11-25 14:01:08\", \"file_number\": null, \"patient_dob\": \"1978-02-12\", \"spouse_cnic\": \"42139-3939393-9\", \"spouse_name\": \"razia\", \"patient_cnic\": \"42101-1924069-9\", \"patient_name\": \"Aslam\", \"spouse_address\": \"gulshan\", \"spouse_contact\": \"(0300) 000-0000\", \"patient_address\": \"gulshsn\", \"patient_contact\": \"(0300) 285-2247\", \"how_did_you_know\": \"Social Media\", \"spouse_occupation\": \"housewife\", \"patient_occupation\": \"Job\", \"doctor_coordinator_id\": \"1\", \"emergency_contact_number\": \"(0300) 000-0000\", \"emergency_contact_person\": \"sk\", \"emergency_contact_relation\": \"bro\"}}', NULL, '2024-11-25 14:01:08', '2024-11-25 14:01:08'),
(29, 'default', 'Updated Patient', 'App\\Models\\Patient', NULL, 1001, 'App\\Models\\User', 1, '{\"old\": {\"id\": 1001, \"note\": null, \"type\": \"Regular Patient\", \"doctor_id\": null, \"fc_number\": \"1001\", \"created_at\": \"2024-11-25T14:01:08.000000Z\", \"deleted_at\": null, \"spouse_dob\": \"1974-02-12\", \"updated_at\": \"2024-11-25T14:01:08.000000Z\", \"file_number\": null, \"patient_dob\": \"1978-02-12\", \"spouse_cnic\": \"42139-3939393-9\", \"spouse_name\": \"razia\", \"patient_cnic\": \"42101-1924069-9\", \"patient_name\": \"Aslam\", \"spouse_address\": \"gulshan\", \"spouse_contact\": \"(0300) 000-0000\", \"patient_address\": \"gulshsn\", \"patient_contact\": \"(0300) 285-2247\", \"how_did_you_know\": \"Social Media\", \"spouse_occupation\": \"housewife\", \"patient_occupation\": \"Job\", \"doctor_coordinator_id\": 1, \"emergency_contact_number\": \"(0300) 000-0000\", \"emergency_contact_person\": \"sk\", \"emergency_contact_relation\": \"bro\"}, \"attributes\": {\"doctor_id\": \"1\", \"updated_at\": \"2024-11-25 14:01:52\", \"file_number\": 1001}}', NULL, '2024-11-25 14:01:52', '2024-11-25 14:01:52'),
(30, 'default', 'User logged in', NULL, NULL, NULL, 'App\\Models\\User', 1, '{\"ip\": \"39.53.203.231\", \"os\": \"Windows\", \"event\": \"login\", \"device\": \"Desktop\", \"browser\": \"Chrome\", \"location\": \"Karachi, Sindh, Pakistan\", \"user_agent\": \"Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36\"}', NULL, '2024-11-26 11:16:01', '2024-11-26 11:16:01'),
(31, 'default', 'User logged in', NULL, NULL, NULL, 'App\\Models\\User', 1, '{\"ip\": \"39.53.203.231\", \"os\": \"Linux\", \"event\": \"login\", \"device\": \"Mobile\", \"browser\": \"Chrome\", \"location\": \"Karachi, Sindh, Pakistan\", \"user_agent\": \"Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36\"}', NULL, '2024-11-26 11:18:06', '2024-11-26 11:18:06'),
(32, 'default', 'User logged in', NULL, NULL, NULL, 'App\\Models\\User', 1, '{\"ip\": \"72.255.9.74\", \"os\": \"Windows\", \"event\": \"login\", \"device\": \"Desktop\", \"browser\": \"Chrome\", \"location\": \"Karachi, Sindh, Pakistan\", \"user_agent\": \"Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36\"}', NULL, '2024-11-26 12:09:00', '2024-11-26 12:09:00'),
(33, 'default', 'User logged in', NULL, NULL, NULL, 'App\\Models\\User', 1, '{\"ip\": \"72.255.9.74\", \"os\": \"Windows\", \"event\": \"login\", \"device\": \"Desktop\", \"browser\": \"Chrome\", \"location\": \"Karachi, Sindh, Pakistan\", \"user_agent\": \"Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36\"}', NULL, '2024-11-27 09:45:22', '2024-11-27 09:45:22'),
(34, 'default', 'User logged in', NULL, NULL, NULL, 'App\\Models\\User', 1, '{\"ip\": \"2400:adc1:10c:7000:cd08:f58b:b7e7:929e\", \"os\": \"Windows\", \"event\": \"login\", \"device\": \"Desktop\", \"browser\": \"Chrome\", \"location\": \"Karachi, Sindh, Pakistan\", \"user_agent\": \"Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36\"}', NULL, '2024-12-01 17:45:40', '2024-12-01 17:45:40'),
(35, 'default', 'Created Department', 'App\\Models\\Department', NULL, 3, 'App\\Models\\User', 1, '{\"attributes\": {\"id\": 3, \"name\": \"Infertility/Gynaecology/Obstetrice\", \"sequence\": \"1\", \"created_at\": \"2024-12-01 17:48:24\", \"updated_at\": \"2024-12-01 17:48:24\"}}', NULL, '2024-12-01 17:48:24', '2024-12-01 17:48:24'),
(36, 'default', 'Deleted Department', 'App\\Models\\Department', NULL, 2, 'App\\Models\\User', 1, '{\"attributes\": {\"id\": 2, \"name\": \"OPD\", \"sequence\": 1, \"created_at\": \"2024-11-19T08:17:10.000000Z\", \"updated_at\": \"2024-11-19T08:17:10.000000Z\"}}', NULL, '2024-12-01 17:48:28', '2024-12-01 17:48:28'),
(37, 'default', 'Deleted Department', 'App\\Models\\Department', NULL, 1, 'App\\Models\\User', 1, '{\"attributes\": {\"id\": 1, \"name\": \"Medicen\", \"sequence\": 0, \"created_at\": \"2024-11-19T08:16:49.000000Z\", \"updated_at\": \"2024-11-19T08:16:49.000000Z\"}}', NULL, '2024-12-01 17:48:31', '2024-12-01 17:48:31'),
(38, 'default', 'Created Department', 'App\\Models\\Department', NULL, 4, 'App\\Models\\User', 1, '{\"attributes\": {\"id\": 4, \"name\": \"Urology\", \"sequence\": \"2\", \"created_at\": \"2024-12-01 17:48:42\", \"updated_at\": \"2024-12-01 17:48:42\"}}', NULL, '2024-12-01 17:48:42', '2024-12-01 17:48:42'),
(39, 'default', 'Created Department', 'App\\Models\\Department', NULL, 5, 'App\\Models\\User', 1, '{\"attributes\": {\"id\": 5, \"name\": \"Endocrinology\", \"sequence\": \"3\", \"created_at\": \"2024-12-01 17:48:58\", \"updated_at\": \"2024-12-01 17:48:58\"}}', NULL, '2024-12-01 17:48:58', '2024-12-01 17:48:58'),
(40, 'default', 'Created Department', 'App\\Models\\Department', NULL, 6, 'App\\Models\\User', 1, '{\"attributes\": {\"id\": 6, \"name\": \"Clinic Coordinators\", \"sequence\": \"4\", \"created_at\": \"2024-12-01 17:49:11\", \"updated_at\": \"2024-12-01 17:49:11\"}}', NULL, '2024-12-01 17:49:11', '2024-12-01 17:49:11'),
(41, 'default', 'Created Department', 'App\\Models\\Department', NULL, 7, 'App\\Models\\User', 1, '{\"attributes\": {\"id\": 7, \"name\": \"Ultrasound\", \"sequence\": \"5\", \"created_at\": \"2024-12-01 17:49:20\", \"updated_at\": \"2024-12-01 17:49:20\"}}', NULL, '2024-12-01 17:49:20', '2024-12-01 17:49:20'),
(42, 'default', 'Updated Department', 'App\\Models\\Department', NULL, 7, 'App\\Models\\User', 1, '{\"old\": {\"id\": 7, \"name\": \"Ultrasound\", \"sequence\": 5, \"created_at\": \"2024-12-01T17:49:20.000000Z\", \"updated_at\": \"2024-12-01T17:49:20.000000Z\"}, \"attributes\": {\"name\": \"Ultrasound/Xrays\", \"updated_at\": \"2024-12-01 17:49:34\"}}', NULL, '2024-12-01 17:49:34', '2024-12-01 17:49:34'),
(43, 'default', 'Updated Department', 'App\\Models\\Department', NULL, 7, 'App\\Models\\User', 1, '{\"old\": {\"id\": 7, \"name\": \"Ultrasound/Xrays\", \"sequence\": 5, \"created_at\": \"2024-12-01T17:49:20.000000Z\", \"updated_at\": \"2024-12-01T17:49:34.000000Z\"}, \"attributes\": {\"name\": \"Ultrasound\", \"updated_at\": \"2024-12-01 17:49:41\"}}', NULL, '2024-12-01 17:49:41', '2024-12-01 17:49:41'),
(44, 'default', 'Created Department', 'App\\Models\\Department', NULL, 8, 'App\\Models\\User', 1, '{\"attributes\": {\"id\": 8, \"name\": \"Laboratory\", \"sequence\": \"6\", \"created_at\": \"2024-12-01 17:53:11\", \"updated_at\": \"2024-12-01 17:53:11\"}}', NULL, '2024-12-01 17:53:11', '2024-12-01 17:53:11'),
(45, 'default', 'Created Service', 'App\\Models\\Service', NULL, 2, 'App\\Models\\User', 1, '{\"attributes\": {\"id\": 2, \"name\": \"Blood Test\", \"charges\": \"1000\", \"created_at\": \"2024-12-01 17:53:29\", \"updated_at\": \"2024-12-01 17:53:29\", \"department_id\": \"8\"}}', NULL, '2024-12-01 17:53:29', '2024-12-01 17:53:29'),
(46, 'default', 'Created Service', 'App\\Models\\Service', NULL, 3, 'App\\Models\\User', 1, '{\"attributes\": {\"id\": 3, \"name\": \"Semen Analysis\", \"charges\": \"3000\", \"created_at\": \"2024-12-01 17:54:43\", \"updated_at\": \"2024-12-01 17:54:43\", \"department_id\": \"8\"}}', NULL, '2024-12-01 17:54:43', '2024-12-01 17:54:43'),
(47, 'default', 'Created Service', 'App\\Models\\Service', NULL, 4, 'App\\Models\\User', 1, '{\"attributes\": {\"id\": 4, \"name\": \"Ultrasound\", \"charges\": \"3500\", \"created_at\": \"2024-12-01 17:55:53\", \"updated_at\": \"2024-12-01 17:55:53\", \"department_id\": \"7\"}}', NULL, '2024-12-01 17:55:53', '2024-12-01 17:55:53'),
(48, 'default', 'Created Doctor', 'App\\Models\\Doctor', NULL, 2, 'App\\Models\\User', 1, '{\"attributes\": {\"id\": 2, \"dob\": \"2010-02-10\", \"sex\": \"Female\", \"cnic\": \"52644-4440525-5\", \"name\": \"Dr. Naveera\", \"address\": \"Karachi\", \"religion\": \"Islam\", \"bank_name\": null, \"doctor_id\": \"1005\", \"created_at\": \"2024-12-01 18:00:08\", \"specialist\": \"Infertility\", \"updated_at\": \"2024-12-01 18:00:08\", \"payment_mode\": \"Cash\", \"account_title\": null, \"department_id\": \"3\", \"account_number\": null, \"clinic_portion\": \"40\", \"contact_number\": \"(0333) 256-5895\", \"doctor_charges\": \"2500\", \"doctor_portion\": \"60\", \"marital_status\": \"Married\", \"date_of_appointment\": \"2002-05-07\", \"emergency_contact_name\": \"Asx\", \"emergency_contact_number\": \"1468466444\", \"emergency_contact_relation\": \"sadef\"}}', NULL, '2024-12-01 18:00:08', '2024-12-01 18:00:08'),
(49, 'default', 'Created Qualification', 'App\\Models\\Qualification', NULL, 2, 'App\\Models\\User', 1, '{\"attributes\": {\"id\": 2, \"degree\": \"Adegtret\", \"majors\": \"feewr\", \"doctor_id\": 2, \"created_at\": \"2024-12-01 18:00:08\", \"updated_at\": \"2024-12-01 18:00:08\", \"institution\": \"egrgr\"}}', NULL, '2024-12-01 18:00:08', '2024-12-01 18:00:08'),
(50, 'default', 'Created Qualification', 'App\\Models\\Qualification', NULL, 3, 'App\\Models\\User', 1, '{\"attributes\": {\"id\": 3, \"degree\": \"rewewr\", \"majors\": \"rewewre\", \"doctor_id\": 2, \"created_at\": \"2024-12-01 18:00:08\", \"updated_at\": \"2024-12-01 18:00:08\", \"institution\": \"ewwerwer\"}}', NULL, '2024-12-01 18:00:08', '2024-12-01 18:00:08'),
(51, 'default', 'Created Experience', 'App\\Models\\Experience', NULL, 2, 'App\\Models\\User', 1, '{\"attributes\": {\"id\": 2, \"end_date\": \"2004-02-05\", \"doctor_id\": 2, \"created_at\": \"2024-12-01 18:00:08\", \"start_date\": \"2000-10-03\", \"updated_at\": \"2024-12-01 18:00:08\", \"designation\": \"tweewtwet\", \"last_employer\": \"wrwert\"}}', NULL, '2024-12-01 18:00:08', '2024-12-01 18:00:08'),
(52, 'default', 'Created Doctor', 'App\\Models\\Doctor', NULL, 3, 'App\\Models\\User', 1, '{\"attributes\": {\"id\": 3, \"dob\": \"2000-01-02\", \"sex\": \"Male\", \"cnic\": \"44346-4858888-8\", \"name\": \"Dr Iqbal Shahzad\", \"address\": \"Karachi\", \"religion\": \"Islam\", \"bank_name\": \"Meezan Bank\", \"doctor_id\": \"1002\", \"created_at\": \"2024-12-01 18:02:55\", \"specialist\": \"Urology\", \"updated_at\": \"2024-12-01 18:02:55\", \"payment_mode\": \"Bank Transfer\", \"account_title\": \"Iqbal Shahzad\", \"department_id\": \"4\", \"account_number\": \"0144-252564856-8\", \"clinic_portion\": \"45\", \"contact_number\": \"(0333) 256-5895\", \"doctor_charges\": \"4500\", \"doctor_portion\": \"55\", \"marital_status\": \"Married\", \"date_of_appointment\": \"2023-06-01\", \"emergency_contact_name\": \"dshkue\", \"emergency_contact_number\": \"1468466444\", \"emergency_contact_relation\": \"erewrwer\"}}', NULL, '2024-12-01 18:02:55', '2024-12-01 18:02:55'),
(53, 'default', 'Created Qualification', 'App\\Models\\Qualification', NULL, 4, 'App\\Models\\User', 1, '{\"attributes\": {\"id\": 4, \"degree\": \"dsjgwda\", \"majors\": \"jkafeewh\", \"doctor_id\": 3, \"created_at\": \"2024-12-01 18:02:55\", \"updated_at\": \"2024-12-01 18:02:55\", \"institution\": \"kdshkhdf\"}}', NULL, '2024-12-01 18:02:55', '2024-12-01 18:02:55'),
(54, 'default', 'Created Experience', 'App\\Models\\Experience', NULL, 3, 'App\\Models\\User', 1, '{\"attributes\": {\"id\": 3, \"end_date\": \"2005-01-02\", \"doctor_id\": 3, \"created_at\": \"2024-12-01 18:02:55\", \"start_date\": \"2002-01-01\", \"updated_at\": \"2024-12-01 18:02:55\", \"designation\": \"dfuewg\", \"last_employer\": \"awheuqrh\"}}', NULL, '2024-12-01 18:02:55', '2024-12-01 18:02:55'),
(55, 'default', 'Created Patient', 'App\\Models\\Patient', NULL, 1002, 'App\\Models\\User', 1, '{\"attributes\": {\"id\": 1002, \"note\": \"Test case 01\", \"type\": \"Free Consultancy\", \"doctor_id\": null, \"fc_number\": 1002, \"created_at\": \"2024-12-01 18:05:04\", \"spouse_dob\": \"1998-01-05\", \"updated_at\": \"2024-12-01 18:05:04\", \"file_number\": null, \"patient_dob\": \"1998-01-05\", \"spouse_cnic\": \"51546-5465444-4\", \"spouse_name\": \"Ali\", \"patient_cnic\": \"15648-4841351-6\", \"patient_name\": \"Alisha\", \"spouse_address\": \"Karachi\", \"spouse_contact\": \"(0345) 454-4444\", \"patient_address\": \"Karachi\", \"patient_contact\": \"(0354) 545-4545\", \"how_did_you_know\": \"Referral\", \"spouse_occupation\": null, \"patient_occupation\": null, \"doctor_coordinator_id\": \"1\", \"emergency_contact_number\": \"(0355) 555-5555\", \"emergency_contact_person\": \"rwrt\", \"emergency_contact_relation\": \"reyyt\"}}', NULL, '2024-12-01 18:05:04', '2024-12-01 18:05:04'),
(56, 'default', 'Updated Patient', 'App\\Models\\Patient', NULL, 1002, 'App\\Models\\User', 1, '{\"old\": {\"id\": 1002, \"note\": \"Test case 01\", \"type\": \"Free Consultancy\", \"doctor_id\": null, \"fc_number\": \"1002\", \"created_at\": \"2024-12-01T18:05:04.000000Z\", \"deleted_at\": null, \"spouse_dob\": \"1998-01-05\", \"updated_at\": \"2024-12-01T18:05:04.000000Z\", \"file_number\": null, \"patient_dob\": \"1998-01-05\", \"spouse_cnic\": \"51546-5465444-4\", \"spouse_name\": \"Ali\", \"patient_cnic\": \"15648-4841351-6\", \"patient_name\": \"Alisha\", \"spouse_address\": \"Karachi\", \"spouse_contact\": \"(0345) 454-4444\", \"patient_address\": \"Karachi\", \"patient_contact\": \"(0354) 545-4545\", \"how_did_you_know\": \"Referral\", \"spouse_occupation\": null, \"patient_occupation\": null, \"doctor_coordinator_id\": 1, \"emergency_contact_number\": \"(0355) 555-5555\", \"emergency_contact_person\": \"rwrt\", \"emergency_contact_relation\": \"reyyt\"}, \"attributes\": {\"updated_at\": \"2024-12-01 18:05:29\", \"doctor_coordinator_id\": \"2\"}}', NULL, '2024-12-01 18:05:29', '2024-12-01 18:05:29'),
(57, 'default', 'User logged in', NULL, NULL, NULL, 'App\\Models\\User', 1, '{\"ip\": \"2400:adc1:168:d300:88:50:fe7c:df6b\", \"os\": \"Windows\", \"event\": \"login\", \"device\": \"Desktop\", \"browser\": \"Chrome\", \"location\": \"Karachi, Sindh, Pakistan\", \"user_agent\": \"Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36 Edg/131.0.0.0\"}', NULL, '2024-12-02 05:40:35', '2024-12-02 05:40:35'),
(58, 'default', 'Created Department', 'App\\Models\\Department', NULL, 9, 'App\\Models\\User', 1, '{\"attributes\": {\"id\": 9, \"name\": \"xyz\", \"sequence\": \"7\", \"created_at\": \"2024-12-02 05:41:24\", \"updated_at\": \"2024-12-02 05:41:24\"}}', NULL, '2024-12-02 05:41:24', '2024-12-02 05:41:24'),
(59, 'default', 'Deleted Department', 'App\\Models\\Department', NULL, 9, 'App\\Models\\User', 1, '{\"attributes\": {\"id\": 9, \"name\": \"xyz\", \"sequence\": 7, \"created_at\": \"2024-12-02T05:41:24.000000Z\", \"updated_at\": \"2024-12-02T05:41:24.000000Z\"}}', NULL, '2024-12-02 05:41:36', '2024-12-02 05:41:36'),
(60, 'default', 'Created Department', 'App\\Models\\Department', NULL, 10, 'App\\Models\\User', 1, '{\"attributes\": {\"id\": 10, \"name\": \"ANALYSIS\", \"sequence\": \"7\", \"created_at\": \"2024-12-02 05:42:27\", \"updated_at\": \"2024-12-02 05:42:27\"}}', NULL, '2024-12-02 05:42:27', '2024-12-02 05:42:27'),
(61, 'default', 'Created Service', 'App\\Models\\Service', NULL, 5, 'App\\Models\\User', 1, '{\"attributes\": {\"id\": 5, \"name\": \"Hair Prp\", \"charges\": \"15000\", \"created_at\": \"2024-12-02 05:44:55\", \"updated_at\": \"2024-12-02 05:44:55\", \"department_id\": \"6\"}}', NULL, '2024-12-02 05:44:55', '2024-12-02 05:44:55'),
(62, 'default', 'Created Doctor', 'App\\Models\\Doctor', NULL, 4, 'App\\Models\\User', 1, '{\"attributes\": {\"id\": 4, \"dob\": \"2024-12-04\", \"sex\": \"Male\", \"cnic\": \"45864-4444444-4\", \"name\": \"Dr Zaryab Setna\", \"address\": \"1 BATH ISLAND ROAD, BATH ISLAND KARACHI\\r\\nTHE FERTILITY CLINIC (PRIVATE) LIMITED\", \"religion\": null, \"bank_name\": null, \"doctor_id\": \"1004\", \"created_at\": \"2024-12-02 05:51:33\", \"specialist\": \"ABC\", \"updated_at\": \"2024-12-02 05:51:33\", \"payment_mode\": \"Cash\", \"account_title\": null, \"department_id\": \"3\", \"account_number\": null, \"clinic_portion\": \"0\", \"contact_number\": \"(0333) 030-5560\", \"doctor_charges\": \"4000\", \"doctor_portion\": \"100\", \"marital_status\": \"Married\", \"date_of_appointment\": \"2023-02-02\", \"emergency_contact_name\": \"ACs\", \"emergency_contact_number\": \"ewrttewet\", \"emergency_contact_relation\": \"werer\"}}', NULL, '2024-12-02 05:51:33', '2024-12-02 05:51:33'),
(63, 'default', 'Created Qualification', 'App\\Models\\Qualification', NULL, 5, 'App\\Models\\User', 1, '{\"attributes\": {\"id\": 5, \"degree\": \"ewtewt\", \"majors\": \"wtewet\", \"doctor_id\": 4, \"created_at\": \"2024-12-02 05:51:33\", \"updated_at\": \"2024-12-02 05:51:33\", \"institution\": \"wtewtewte\"}}', NULL, '2024-12-02 05:51:33', '2024-12-02 05:51:33'),
(64, 'default', 'Created Experience', 'App\\Models\\Experience', NULL, 4, 'App\\Models\\User', 1, '{\"attributes\": {\"id\": 4, \"end_date\": \"2024-12-02\", \"doctor_id\": 4, \"created_at\": \"2024-12-02 05:51:33\", \"start_date\": \"2024-12-02\", \"updated_at\": \"2024-12-02 05:51:33\", \"designation\": \"wetewt\", \"last_employer\": \"tewet\"}}', NULL, '2024-12-02 05:51:33', '2024-12-02 05:51:33'),
(65, 'default', 'Created Patient', 'App\\Models\\Patient', NULL, 1003, 'App\\Models\\User', 1, '{\"attributes\": {\"id\": 1003, \"note\": null, \"type\": \"Free Consultancy\", \"doctor_id\": null, \"fc_number\": 1003, \"created_at\": \"2024-12-02 05:52:38\", \"spouse_dob\": \"2024-12-10\", \"updated_at\": \"2024-12-02 05:52:38\", \"file_number\": null, \"patient_dob\": \"2024-12-18\", \"spouse_cnic\": \"45555-5555555-5\", \"spouse_name\": \"dhtuy\", \"patient_cnic\": \"46898-9999999-9\", \"patient_name\": \"ABVDf\", \"spouse_address\": \"1 BATH ISLAND ROAD, BATH ISLAND KARACHI\\r\\nTHE FERTILITY CLINIC (PRIVATE) LIMITED\", \"spouse_contact\": \"(0333) 030-5560\", \"patient_address\": \"1 BATH ISLAND ROAD, BATH ISLAND KARACHI\\r\\nTHE FERTILITY CLINIC (PRIVATE) LIMITED\", \"patient_contact\": \"(0388) 699-5555\", \"how_did_you_know\": \"Social Media\", \"spouse_occupation\": \"fff\", \"patient_occupation\": \"ABC\", \"doctor_coordinator_id\": \"4\", \"emergency_contact_number\": \"(0333) 030-5560\", \"emergency_contact_person\": \"nayyar aziz\", \"emergency_contact_relation\": \"werer\"}}', NULL, '2024-12-02 05:52:38', '2024-12-02 05:52:38'),
(66, 'default', 'Updated Patient', 'App\\Models\\Patient', NULL, 1001, 'App\\Models\\User', 1, '{\"old\": {\"id\": 1001, \"note\": null, \"type\": \"Regular Patient\", \"doctor_id\": 1, \"fc_number\": \"1001\", \"created_at\": \"2024-11-25T14:01:08.000000Z\", \"deleted_at\": null, \"spouse_dob\": \"1974-02-12\", \"updated_at\": \"2024-11-25T14:01:52.000000Z\", \"file_number\": \"1001\", \"patient_dob\": \"1978-02-12\", \"spouse_cnic\": \"42139-3939393-9\", \"spouse_name\": \"razia\", \"patient_cnic\": \"42101-1924069-9\", \"patient_name\": \"Aslam\", \"spouse_address\": \"gulshan\", \"spouse_contact\": \"(0300) 000-0000\", \"patient_address\": \"gulshsn\", \"patient_contact\": \"(0300) 285-2247\", \"how_did_you_know\": \"Social Media\", \"spouse_occupation\": \"housewife\", \"patient_occupation\": \"Job\", \"doctor_coordinator_id\": 1, \"emergency_contact_number\": \"(0300) 000-0000\", \"emergency_contact_person\": \"sk\", \"emergency_contact_relation\": \"bro\"}, \"attributes\": {\"doctor_id\": \"4\", \"updated_at\": \"2024-12-02 05:52:57\", \"doctor_coordinator_id\": \"4\"}}', NULL, '2024-12-02 05:52:57', '2024-12-02 05:52:57'),
(67, 'default', 'Created Patient', 'App\\Models\\Patient', NULL, 1004, 'App\\Models\\User', 1, '{\"attributes\": {\"id\": 1004, \"note\": null, \"type\": \"Free Consultancy\", \"doctor_id\": null, \"fc_number\": 1004, \"created_at\": \"2024-12-02 06:28:53\", \"spouse_dob\": \"1958-03-18\", \"updated_at\": \"2024-12-02 06:28:53\", \"file_number\": null, \"patient_dob\": \"1960-02-16\", \"spouse_cnic\": \"22934-6842531-5\", \"spouse_name\": \"GARDEZI\", \"patient_cnic\": \"44983-6287631-1\", \"patient_name\": \"MRS GARDEZI\", \"spouse_address\": \"CLIFTON\", \"spouse_contact\": \"(0333) 666-9358\", \"patient_address\": \"1 BATH ISLAND ROAD, BATH ISLAND KARACHI\\r\\nTHE FERTILITY CLINIC (PRIVATE) LIMITED\", \"patient_contact\": null, \"how_did_you_know\": null, \"spouse_occupation\": \"JOB\", \"patient_occupation\": \"fff\", \"doctor_coordinator_id\": \"4\", \"emergency_contact_number\": \"(0333) 532-4329\", \"emergency_contact_person\": \"03343536789\", \"emergency_contact_relation\": \"SISTER\"}}', NULL, '2024-12-02 06:28:53', '2024-12-02 06:28:53'),
(68, 'default', 'Updated Patient', 'App\\Models\\Patient', NULL, 1004, 'App\\Models\\User', 1, '{\"old\": {\"id\": 1004, \"note\": null, \"type\": \"Free Consultancy\", \"doctor_id\": null, \"fc_number\": \"1004\", \"created_at\": \"2024-12-02T06:28:53.000000Z\", \"deleted_at\": null, \"spouse_dob\": \"1958-03-18\", \"updated_at\": \"2024-12-02T06:28:53.000000Z\", \"file_number\": null, \"patient_dob\": \"1960-02-16\", \"spouse_cnic\": \"22934-6842531-5\", \"spouse_name\": \"GARDEZI\", \"patient_cnic\": \"44983-6287631-1\", \"patient_name\": \"MRS GARDEZI\", \"spouse_address\": \"CLIFTON\", \"spouse_contact\": \"(0333) 666-9358\", \"patient_address\": \"1 BATH ISLAND ROAD, BATH ISLAND KARACHI\\r\\nTHE FERTILITY CLINIC (PRIVATE) LIMITED\", \"patient_contact\": null, \"how_did_you_know\": null, \"spouse_occupation\": \"JOB\", \"patient_occupation\": \"fff\", \"doctor_coordinator_id\": 4, \"emergency_contact_number\": \"(0333) 532-4329\", \"emergency_contact_person\": \"03343536789\", \"emergency_contact_relation\": \"SISTER\"}, \"attributes\": {\"type\": \"Regular Patient\", \"doctor_id\": \"4\", \"updated_at\": \"2024-12-02 06:44:55\", \"file_number\": 1002}}', NULL, '2024-12-02 06:44:55', '2024-12-02 06:44:55'),
(69, 'default', 'Created Patient', 'App\\Models\\Patient', NULL, 1005, 'App\\Models\\User', 1, '{\"attributes\": {\"id\": 1005, \"note\": null, \"type\": \"Regular Patient\", \"doctor_id\": \"4\", \"fc_number\": 1005, \"created_at\": \"2024-12-02 06:48:45\", \"spouse_dob\": \"1998-12-15\", \"updated_at\": \"2024-12-02 06:48:45\", \"file_number\": 1003, \"patient_dob\": \"1999-07-02\", \"spouse_cnic\": \"16464-3232565-4\", \"spouse_name\": \"SHANKAR\", \"patient_cnic\": \"32168-4632645-4\", \"patient_name\": \"SONIA\", \"spouse_address\": \"KPS\", \"spouse_contact\": \"(0333) 329-4299\", \"patient_address\": \"KPS\", \"patient_contact\": \"(0333) 294-2990\", \"how_did_you_know\": null, \"spouse_occupation\": \"JOB\", \"patient_occupation\": \"HOUSE WIFE\", \"doctor_coordinator_id\": \"1\", \"emergency_contact_number\": \"(0328) 344-3484\", \"emergency_contact_person\": \"0333-3645268\", \"emergency_contact_relation\": \"BROTHER\"}}', NULL, '2024-12-02 06:48:45', '2024-12-02 06:48:45'),
(70, 'default', 'Created Patient', 'App\\Models\\Patient', NULL, 1006, 'App\\Models\\User', 1, '{\"attributes\": {\"id\": 1006, \"note\": null, \"type\": \"Regular Patient\", \"doctor_id\": \"4\", \"fc_number\": 1006, \"created_at\": \"2024-12-02 06:54:08\", \"spouse_dob\": \"1999-06-23\", \"updated_at\": \"2024-12-02 06:54:08\", \"file_number\": 1004, \"patient_dob\": \"2000-05-05\", \"spouse_cnic\": \"42201-5470011-5\", \"spouse_name\": \"JAWWAD ASIF\", \"patient_cnic\": \"42000-8482592-8\", \"patient_name\": \"MARYUM\", \"spouse_address\": \"KARACHI\", \"spouse_contact\": \"(0333) 332-2128\", \"patient_address\": \"KARACHI\", \"patient_contact\": \"(0332) 421-1139\", \"how_did_you_know\": null, \"spouse_occupation\": \"JOB\", \"patient_occupation\": \"JOB\", \"doctor_coordinator_id\": \"4\", \"emergency_contact_number\": \"(0333) 333-5558\", \"emergency_contact_person\": \"RIDA\", \"emergency_contact_relation\": \"SISTER\"}}', NULL, '2024-12-02 06:54:08', '2024-12-02 06:54:08'),
(71, 'default', 'Created Patient', 'App\\Models\\Patient', NULL, 1007, 'App\\Models\\User', 1, '{\"attributes\": {\"id\": 1007, \"note\": null, \"type\": \"Regular Patient\", \"doctor_id\": \"4\", \"fc_number\": 1007, \"created_at\": \"2024-12-02 06:57:39\", \"spouse_dob\": \"1985-11-13\", \"updated_at\": \"2024-12-02 06:57:39\", \"file_number\": 1005, \"patient_dob\": \"1992-05-21\", \"spouse_cnic\": \"16468-4765645-9\", \"spouse_name\": \"KARIM\", \"patient_cnic\": \"14965-6465694-7\", \"patient_name\": \"ALYNA\", \"spouse_address\": \"KARACHI\", \"spouse_contact\": \"(0303) 051-9999\", \"patient_address\": \"KARCHI\", \"patient_contact\": \"(0303) 051-9996\", \"how_did_you_know\": null, \"spouse_occupation\": \"ONLINE\", \"patient_occupation\": \"JOB\", \"doctor_coordinator_id\": \"4\", \"emergency_contact_number\": \"(0303) 051-9999\", \"emergency_contact_person\": \"KARIM\", \"emergency_contact_relation\": \"HUSBAND\"}}', NULL, '2024-12-02 06:57:39', '2024-12-02 06:57:39'),
(72, 'default', 'Created Patient', 'App\\Models\\Patient', NULL, 1008, 'App\\Models\\User', 1, '{\"attributes\": {\"id\": 1008, \"note\": null, \"type\": \"Regular Patient\", \"doctor_id\": \"4\", \"fc_number\": 1008, \"created_at\": \"2024-12-02 07:01:54\", \"spouse_dob\": \"1990-12-11\", \"updated_at\": \"2024-12-02 07:01:54\", \"file_number\": 1006, \"patient_dob\": \"1992-11-25\", \"spouse_cnic\": \"16544-3646434-5\", \"spouse_name\": \"SAUD MAGSI\", \"patient_cnic\": \"43203-7221528-4\", \"patient_name\": \"FARWA\", \"spouse_address\": \"KARACHISAUD\", \"spouse_contact\": \"(0334) 589-9629\", \"patient_address\": \"KARACHI\", \"patient_contact\": \"(0333) 134-0587\", \"how_did_you_know\": null, \"spouse_occupation\": \"ON WORK\", \"patient_occupation\": \"JO\", \"doctor_coordinator_id\": \"4\", \"emergency_contact_number\": \"(0333) 426-5646\", \"emergency_contact_person\": \"SAUD\", \"emergency_contact_relation\": \"HUSBAND\"}}', NULL, '2024-12-02 07:01:54', '2024-12-02 07:01:54'),
(73, 'default', 'Created Patient', 'App\\Models\\Patient', NULL, 1009, 'App\\Models\\User', 1, '{\"attributes\": {\"id\": 1009, \"note\": null, \"type\": \"Regular Patient\", \"doctor_id\": \"4\", \"fc_number\": 1009, \"created_at\": \"2024-12-02 07:05:55\", \"spouse_dob\": \"1998-06-14\", \"updated_at\": \"2024-12-02 07:05:55\", \"file_number\": 1007, \"patient_dob\": \"2000-07-06\", \"spouse_cnic\": \"44210-1328976-2\", \"spouse_name\": \"JAWED\", \"patient_cnic\": \"04421-9863542-8\", \"patient_name\": \"MYRA\", \"spouse_address\": \"CLIFTON\", \"spouse_contact\": \"(0332) 186-8558\", \"patient_address\": \"CLIFTON\", \"patient_contact\": \"(0321) 570-0634\", \"how_did_you_know\": null, \"spouse_occupation\": \"ON WORK\", \"patient_occupation\": \"JOB\", \"doctor_coordinator_id\": \"4\", \"emergency_contact_number\": \"(0332) 186-8558\", \"emergency_contact_person\": \"JAWED\", \"emergency_contact_relation\": \"HUSBAND\"}}', NULL, '2024-12-02 07:05:55', '2024-12-02 07:05:55'),
(74, 'default', 'Created Patient', 'App\\Models\\Patient', NULL, 1010, 'App\\Models\\User', 1, '{\"attributes\": {\"id\": 1010, \"note\": null, \"type\": \"Regular Patient\", \"doctor_id\": \"4\", \"fc_number\": 1010, \"created_at\": \"2024-12-02 07:09:09\", \"spouse_dob\": \"1989-05-12\", \"updated_at\": \"2024-12-02 07:09:09\", \"file_number\": 1008, \"patient_dob\": \"1998-02-25\", \"spouse_cnic\": \"42201-8896648-1\", \"spouse_name\": \"BILAL\", \"patient_cnic\": \"42000-1775126-0\", \"patient_name\": \"KANWAL\", \"spouse_address\": \"KARACHI\", \"spouse_contact\": \"(0330) 284-3834\", \"patient_address\": \"KARACHI\", \"patient_contact\": \"(0331) 529-8651\", \"how_did_you_know\": null, \"spouse_occupation\": \"ON WORK\", \"patient_occupation\": \"HOUSE WIFE\", \"doctor_coordinator_id\": \"4\", \"emergency_contact_number\": \"(0333) 272-8615\", \"emergency_contact_person\": \"ASIF\", \"emergency_contact_relation\": \"FATHER\"}}', NULL, '2024-12-02 07:09:09', '2024-12-02 07:09:09'),
(75, 'default', 'Created Patient', 'App\\Models\\Patient', NULL, 1011, 'App\\Models\\User', 1, '{\"attributes\": {\"id\": 1011, \"note\": null, \"type\": \"Regular Patient\", \"doctor_id\": \"4\", \"fc_number\": 1011, \"created_at\": \"2024-12-02 07:11:57\", \"spouse_dob\": \"1997-08-06\", \"updated_at\": \"2024-12-02 07:11:57\", \"file_number\": 1009, \"patient_dob\": \"2000-06-25\", \"spouse_cnic\": \"42201-9683889-1\", \"spouse_name\": \"BADAR\", \"patient_cnic\": \"42201-3658792-1\", \"patient_name\": \"JAVERIA\", \"spouse_address\": \"KARACHI\", \"spouse_contact\": \"(0328) 921-3982\", \"patient_address\": \"KARACHI\", \"patient_contact\": \"(0322) 579-8737\", \"how_did_you_know\": null, \"spouse_occupation\": \"JOB\", \"patient_occupation\": \"JOB\", \"doctor_coordinator_id\": \"4\", \"emergency_contact_number\": \"(0330) 284-3834\", \"emergency_contact_person\": \"NAZIA ASIF\", \"emergency_contact_relation\": \"SISTER\"}}', NULL, '2024-12-02 07:11:57', '2024-12-02 07:11:57'),
(76, 'default', 'Created Patient', 'App\\Models\\Patient', NULL, 1012, 'App\\Models\\User', 1, '{\"attributes\": {\"id\": 1012, \"note\": null, \"type\": \"Regular Patient\", \"doctor_id\": \"4\", \"fc_number\": 1012, \"created_at\": \"2024-12-02 07:16:41\", \"spouse_dob\": \"1982-09-25\", \"updated_at\": \"2024-12-02 07:16:41\", \"file_number\": 1010, \"patient_dob\": \"1989-05-24\", \"spouse_cnic\": \"42201-4866086-3\", \"spouse_name\": \"BADARFARRUKH KAMAL\", \"patient_cnic\": \"42201-4866086-3\", \"patient_name\": \"NIDA\", \"spouse_address\": \"KARACHI\", \"spouse_contact\": \"(0330) 284-3834\", \"patient_address\": \"KARACHI\", \"patient_contact\": \"(0323) 218-0728\", \"how_did_you_know\": null, \"spouse_occupation\": \"JOB\", \"patient_occupation\": \"H\", \"doctor_coordinator_id\": \"4\", \"emergency_contact_number\": \"(0333) 327-2861\", \"emergency_contact_person\": \"NAZIA ASIF\", \"emergency_contact_relation\": \"SISTER\"}}', NULL, '2024-12-02 07:16:41', '2024-12-02 07:16:41'),
(77, 'default', 'Created Patient', 'App\\Models\\Patient', NULL, 1013, 'App\\Models\\User', 1, '{\"attributes\": {\"id\": 1013, \"note\": null, \"type\": \"Regular Patient\", \"doctor_id\": \"4\", \"fc_number\": 1013, \"created_at\": \"2024-12-02 07:26:25\", \"spouse_dob\": \"1976-12-07\", \"updated_at\": \"2024-12-02 07:26:25\", \"file_number\": 1011, \"patient_dob\": \"1980-04-27\", \"spouse_cnic\": \"16468-4765645-9\", \"spouse_name\": \"IRFAN\", \"patient_cnic\": \"42201-9876354-9\", \"patient_name\": \"TAYYABA\", \"spouse_address\": \"KARACHI\", \"spouse_contact\": \"(0333) 332-7286\", \"patient_address\": \"KARACHI\", \"patient_contact\": \"(0322) 419-9090\", \"how_did_you_know\": null, \"spouse_occupation\": \"JOB\", \"patient_occupation\": \"HOUSE WIFE\", \"doctor_coordinator_id\": \"4\", \"emergency_contact_number\": \"(0333) 218-6855\", \"emergency_contact_person\": \"NAZIA ASIF\", \"emergency_contact_relation\": \"SISTER\"}}', NULL, '2024-12-02 07:26:25', '2024-12-02 07:26:25'),
(78, 'default', 'Created Patient', 'App\\Models\\Patient', NULL, 1014, 'App\\Models\\User', 1, '{\"attributes\": {\"id\": 1014, \"note\": null, \"type\": \"Free Consultancy\", \"doctor_id\": \"4\", \"fc_number\": 1014, \"created_at\": \"2024-12-02 07:28:32\", \"spouse_dob\": \"1991-04-25\", \"updated_at\": \"2024-12-02 07:28:32\", \"file_number\": 1012, \"patient_dob\": \"1994-04-25\", \"spouse_cnic\": \"22934-6842531-5\", \"spouse_name\": \"FIZAL\", \"patient_cnic\": \"14965-6405694-7\", \"patient_name\": \"DR FIZZA FATIMA\", \"spouse_address\": \"KARACHI\", \"spouse_contact\": \"(0333) 327-2861\", \"patient_address\": \"KARACHI\", \"patient_contact\": null, \"how_did_you_know\": null, \"spouse_occupation\": \"JOB\", \"patient_occupation\": \"fff\", \"doctor_coordinator_id\": \"4\", \"emergency_contact_number\": \"(0333) 332-7286\", \"emergency_contact_person\": \"NAZIA ASIF\", \"emergency_contact_relation\": \"SISTER\"}}', NULL, '2024-12-02 07:28:32', '2024-12-02 07:28:32'),
(79, 'default', 'Created Payment', 'App\\Models\\Payment', NULL, 1001, 'App\\Models\\User', 1, '{\"attributes\": {\"id\": 1001, \"total\": 4000, \"remarks\": null, \"discount\": \"0\", \"fc_number\": \"1010\", \"sub_total\": \"4000.00\", \"created_at\": \"2024-12-02 07:31:28\", \"patient_id\": 1010, \"updated_at\": \"2024-12-02 07:31:28\", \"doctor_name\": \"Dr Zaryab Setna\", \"file_number\": \"1008\", \"patient_type\": \"Regular Patient\", \"payment_mode\": \"Cash\", \"clinic_portion\": \"0.00\", \"doctor_charges\": \"4000.00\", \"doctor_portion\": \"100.00\", \"doctor_department_name\": \"Infertility/Gynaecology/Obstetrice\"}}', NULL, '2024-12-02 07:31:28', '2024-12-02 07:31:28'),
(80, 'default', 'Created Patient', 'App\\Models\\Patient', NULL, 1015, 'App\\Models\\User', 1, '{\"attributes\": {\"id\": 1015, \"note\": null, \"type\": \"Regular Patient\", \"doctor_id\": \"4\", \"fc_number\": 1015, \"created_at\": \"2024-12-02 07:34:47\", \"spouse_dob\": \"2004-10-27\", \"updated_at\": \"2024-12-02 07:34:47\", \"file_number\": 1013, \"patient_dob\": \"2008-07-20\", \"spouse_cnic\": \"42201-9735468-2\", \"spouse_name\": \"MARTINEZ\", \"patient_cnic\": \"42201-3697235-9\", \"patient_name\": \"IRENE\", \"spouse_address\": \"1 BATH ISLAND ROAD, BATH ISLAND KARACHI\\r\\nTHE FERTILITY CLINIC (PRIVATE) LIMITED\", \"spouse_contact\": null, \"patient_address\": \"KARACHI\", \"patient_contact\": \"(0300) 922-3022\", \"how_did_you_know\": null, \"spouse_occupation\": \"JOB\", \"patient_occupation\": \"JOB\", \"doctor_coordinator_id\": \"4\", \"emergency_contact_number\": \"(0330) 284-3834\", \"emergency_contact_person\": \"nayyar aziz\", \"emergency_contact_relation\": \"SISTER\"}}', NULL, '2024-12-02 07:34:47', '2024-12-02 07:34:47'),
(81, 'default', 'Created Patient', 'App\\Models\\Patient', NULL, 1016, 'App\\Models\\User', 1, '{\"attributes\": {\"id\": 1016, \"note\": null, \"type\": \"Regular Patient\", \"doctor_id\": \"4\", \"fc_number\": 1016, \"created_at\": \"2024-12-02 07:47:31\", \"spouse_dob\": \"1999-05-16\", \"updated_at\": \"2024-12-02 07:47:31\", \"file_number\": 1014, \"patient_dob\": \"2001-03-22\", \"spouse_cnic\": \"41101-3679824-5\", \"spouse_name\": \"RAMNABI\", \"patient_cnic\": \"42201-2213345-6\", \"patient_name\": \"SIMRAN\", \"spouse_address\": \"KARACHI\", \"spouse_contact\": \"(0333) 333-2598\", \"patient_address\": \"KARACHI\", \"patient_contact\": \"(0300) 821-5492\", \"how_did_you_know\": null, \"spouse_occupation\": \"JOB\", \"patient_occupation\": \"JOB\", \"doctor_coordinator_id\": \"4\", \"emergency_contact_number\": \"(0335) 980-3694\", \"emergency_contact_person\": \"nayyar aziz\", \"emergency_contact_relation\": \"SISTER\"}}', NULL, '2024-12-02 07:47:31', '2024-12-02 07:47:31'),
(82, 'default', 'Created Patient', 'App\\Models\\Patient', NULL, 1017, 'App\\Models\\User', 1, '{\"attributes\": {\"id\": 1017, \"note\": null, \"type\": \"Regular Patient\", \"doctor_id\": \"4\", \"fc_number\": 1017, \"created_at\": \"2024-12-02 07:50:00\", \"spouse_dob\": \"1976-01-11\", \"updated_at\": \"2024-12-02 07:50:00\", \"file_number\": 1015, \"patient_dob\": \"1978-02-11\", \"spouse_cnic\": \"40001-3297823-1\", \"spouse_name\": \"HUSSAIN\", \"patient_cnic\": \"40011-3864972-0\", \"patient_name\": \"MRS KOKAB\", \"spouse_address\": \"KARACHI\", \"spouse_contact\": \"(0333) 286-6694\", \"patient_address\": \"KARACHI\", \"patient_contact\": \"(0321) 221-7555\", \"how_did_you_know\": null, \"spouse_occupation\": \"JOB\", \"patient_occupation\": \"HOUSE WIFE\", \"doctor_coordinator_id\": \"4\", \"emergency_contact_number\": \"(0333) 086-9721\", \"emergency_contact_person\": \"RUB\", \"emergency_contact_relation\": \"SISTER\"}}', NULL, '2024-12-02 07:50:00', '2024-12-02 07:50:00'),
(83, 'default', 'Created Payment', 'App\\Models\\Payment', NULL, 1002, 'App\\Models\\User', 1, '{\"attributes\": {\"id\": 1002, \"total\": 4000, \"remarks\": null, \"discount\": \"0\", \"fc_number\": \"1009\", \"sub_total\": \"4000.00\", \"created_at\": \"2024-12-02 07:53:25\", \"patient_id\": 1009, \"updated_at\": \"2024-12-02 07:53:25\", \"doctor_name\": \"Dr Zaryab Setna\", \"file_number\": \"1007\", \"patient_type\": \"Regular Patient\", \"payment_mode\": \"CC\", \"clinic_portion\": \"0.00\", \"doctor_charges\": \"4000.00\", \"doctor_portion\": \"100.00\", \"doctor_department_name\": \"Infertility/Gynaecology/Obstetrice\"}}', NULL, '2024-12-02 07:53:25', '2024-12-02 07:53:25'),
(84, 'default', 'Created Patient', 'App\\Models\\Patient', NULL, 1018, 'App\\Models\\User', 1, '{\"attributes\": {\"id\": 1018, \"note\": null, \"type\": \"Regular Patient\", \"doctor_id\": \"4\", \"fc_number\": 1018, \"created_at\": \"2024-12-02 07:55:19\", \"spouse_dob\": \"1994-11-27\", \"updated_at\": \"2024-12-02 07:55:19\", \"file_number\": 1016, \"patient_dob\": \"1995-05-25\", \"spouse_cnic\": \"21654-6431646-8\", \"spouse_name\": \"ALI\", \"patient_cnic\": \"16486-5323468-4\", \"patient_name\": \"AYESHA ALI\", \"spouse_address\": \"KARACHI\", \"spouse_contact\": \"(0316) 468-4313\", \"patient_address\": \"KARACHI\", \"patient_contact\": \"(0332) 825-2001\", \"how_did_you_know\": null, \"spouse_occupation\": \"JOB\", \"patient_occupation\": \"HOUSE WIFE\", \"doctor_coordinator_id\": \"4\", \"emergency_contact_number\": \"(0315) 646-1312\", \"emergency_contact_person\": \"RUB\", \"emergency_contact_relation\": \"SISTER\"}}', NULL, '2024-12-02 07:55:19', '2024-12-02 07:55:19'),
(85, 'default', 'Created Payment', 'App\\Models\\Payment', NULL, 1003, 'App\\Models\\User', 1, '{\"attributes\": {\"id\": 1003, \"total\": 0, \"remarks\": null, \"discount\": \"4000\", \"fc_number\": \"1004\", \"sub_total\": \"4000.00\", \"created_at\": \"2024-12-02 07:58:27\", \"patient_id\": 1004, \"updated_at\": \"2024-12-02 07:58:27\", \"doctor_name\": \"Dr Zaryab Setna\", \"file_number\": \"1002\", \"patient_type\": \"Regular Patient\", \"payment_mode\": \"Cash\", \"clinic_portion\": \"0.00\", \"doctor_charges\": \"4000.00\", \"doctor_portion\": \"100.00\", \"doctor_department_name\": \"Infertility/Gynaecology/Obstetrice\"}}', NULL, '2024-12-02 07:58:27', '2024-12-02 07:58:27');
INSERT INTO `activity_log` (`id`, `log_name`, `description`, `subject_type`, `event`, `subject_id`, `causer_type`, `causer_id`, `properties`, `batch_uuid`, `created_at`, `updated_at`) VALUES
(86, 'default', 'User logged in', NULL, NULL, NULL, 'App\\Models\\User', 1, '{\"ip\": \"202.47.36.226\", \"os\": \"Windows\", \"event\": \"login\", \"device\": \"Desktop\", \"browser\": \"Chrome\", \"location\": \"Karachi, Sindh, Pakistan\", \"user_agent\": \"Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36 Edg/131.0.0.0\"}', NULL, '2024-12-02 08:23:02', '2024-12-02 08:23:02'),
(87, 'default', 'Created Patient', 'App\\Models\\Patient', NULL, 1019, 'App\\Models\\User', 1, '{\"attributes\": {\"id\": 1019, \"note\": null, \"type\": \"Regular Patient\", \"doctor_id\": \"4\", \"fc_number\": 1019, \"created_at\": \"2024-12-02 08:24:08\", \"spouse_dob\": \"1983-05-02\", \"updated_at\": \"2024-12-02 08:24:08\", \"file_number\": 1017, \"patient_dob\": \"1985-05-05\", \"spouse_cnic\": \"32483-1218483-2\", \"spouse_name\": \"SIDDIQUE\", \"patient_cnic\": \"15644-6854321-6\", \"patient_name\": \"HIFZA\", \"spouse_address\": \"KARACHI\", \"spouse_contact\": \"(0326) 565-2132\", \"patient_address\": \"KARACHI\", \"patient_contact\": \"(0301) 140-2484\", \"how_did_you_know\": null, \"spouse_occupation\": \"JOB\", \"patient_occupation\": \"HOUSE WIFE\", \"doctor_coordinator_id\": \"4\", \"emergency_contact_number\": \"(0345) 684-9863\", \"emergency_contact_person\": \"RUB\", \"emergency_contact_relation\": \"SISTER\"}}', NULL, '2024-12-02 08:24:08', '2024-12-02 08:24:08'),
(88, 'default', 'Created Payment', 'App\\Models\\Payment', NULL, 1004, 'App\\Models\\User', 1, '{\"attributes\": {\"id\": 1004, \"total\": 4000, \"remarks\": null, \"discount\": \"0\", \"fc_number\": \"1009\", \"sub_total\": \"4000.00\", \"created_at\": \"2024-12-02 08:29:56\", \"patient_id\": 1009, \"updated_at\": \"2024-12-02 08:29:56\", \"doctor_name\": \"Dr Zaryab Setna\", \"file_number\": \"1007\", \"patient_type\": \"Regular Patient\", \"payment_mode\": \"Cash\", \"clinic_portion\": \"0.00\", \"doctor_charges\": \"4000.00\", \"doctor_portion\": \"100.00\", \"doctor_department_name\": \"Infertility/Gynaecology/Obstetrice\"}}', NULL, '2024-12-02 08:29:56', '2024-12-02 08:29:56'),
(89, 'default', 'Created Payment', 'App\\Models\\Payment', NULL, 1005, 'App\\Models\\User', 1, '{\"attributes\": {\"id\": 1005, \"total\": 4000, \"remarks\": null, \"discount\": \"0\", \"fc_number\": \"1004\", \"sub_total\": \"4000.00\", \"created_at\": \"2024-12-02 08:30:38\", \"patient_id\": 1004, \"updated_at\": \"2024-12-02 08:30:38\", \"doctor_name\": \"Dr Zaryab Setna\", \"file_number\": \"1002\", \"patient_type\": \"Regular Patient\", \"payment_mode\": \"Cash\", \"clinic_portion\": \"0.00\", \"doctor_charges\": \"4000.00\", \"doctor_portion\": \"100.00\", \"doctor_department_name\": \"Infertility/Gynaecology/Obstetrice\"}}', NULL, '2024-12-02 08:30:38', '2024-12-02 08:30:38'),
(90, 'default', 'Created Payment', 'App\\Models\\Payment', NULL, 1006, 'App\\Models\\User', 1, '{\"attributes\": {\"id\": 1006, \"total\": 4000, \"remarks\": null, \"discount\": \"0\", \"fc_number\": \"1006\", \"sub_total\": \"4000.00\", \"created_at\": \"2024-12-02 08:31:47\", \"patient_id\": 1006, \"updated_at\": \"2024-12-02 08:31:47\", \"doctor_name\": \"Dr Zaryab Setna\", \"file_number\": \"1004\", \"patient_type\": \"Regular Patient\", \"payment_mode\": \"Cash\", \"clinic_portion\": \"0.00\", \"doctor_charges\": \"4000.00\", \"doctor_portion\": \"100.00\", \"doctor_department_name\": \"Infertility/Gynaecology/Obstetrice\"}}', NULL, '2024-12-02 08:31:47', '2024-12-02 08:31:47'),
(91, 'default', 'Updated Payment', 'App\\Models\\Payment', NULL, 1004, 'App\\Models\\User', 1, '{\"old\": {\"id\": 1004, \"total\": \"4000.00\", \"closed\": 0, \"remarks\": null, \"discount\": \"0.00\", \"refunded\": 0, \"fc_number\": \"1009\", \"sub_total\": \"4000.00\", \"created_at\": \"2024-12-02T08:29:56.000000Z\", \"patient_id\": 1009, \"updated_at\": \"2024-12-02T08:29:56.000000Z\", \"doctor_name\": \"Dr Zaryab Setna\", \"file_number\": \"1007\", \"patient_type\": \"Regular Patient\", \"payment_mode\": \"Cash\", \"clinic_portion\": \"0.00\", \"doctor_charges\": \"4000.00\", \"doctor_portion\": \"100.00\", \"doctor_department_name\": \"Infertility/Gynaecology/Obstetrice\"}, \"attributes\": {\"refunded\": true, \"updated_at\": \"2024-12-02 08:32:30\"}}', NULL, '2024-12-02 08:32:30', '2024-12-02 08:32:30'),
(92, 'default', 'Updated Payment', 'App\\Models\\Payment', NULL, 1003, 'App\\Models\\User', 1, '{\"old\": {\"id\": 1003, \"total\": \"0.00\", \"closed\": 0, \"remarks\": null, \"discount\": \"4000.00\", \"refunded\": 0, \"fc_number\": \"1004\", \"sub_total\": \"4000.00\", \"created_at\": \"2024-12-02T07:58:27.000000Z\", \"patient_id\": 1004, \"updated_at\": \"2024-12-02T07:58:27.000000Z\", \"doctor_name\": \"Dr Zaryab Setna\", \"file_number\": \"1002\", \"patient_type\": \"Regular Patient\", \"payment_mode\": \"Cash\", \"clinic_portion\": \"0.00\", \"doctor_charges\": \"4000.00\", \"doctor_portion\": \"100.00\", \"doctor_department_name\": \"Infertility/Gynaecology/Obstetrice\"}, \"attributes\": {\"refunded\": true, \"updated_at\": \"2024-12-02 08:33:16\"}}', NULL, '2024-12-02 08:33:16', '2024-12-02 08:33:16'),
(93, 'default', 'Created Patient', 'App\\Models\\Patient', NULL, 1020, 'App\\Models\\User', 1, '{\"attributes\": {\"id\": 1020, \"note\": null, \"type\": \"Free Consultancy\", \"doctor_id\": \"4\", \"fc_number\": 1020, \"created_at\": \"2024-12-02 08:33:16\", \"spouse_dob\": \"1998-08-05\", \"updated_at\": \"2024-12-02 08:33:16\", \"file_number\": 1018, \"patient_dob\": \"1996-02-25\", \"spouse_cnic\": \"64654-6468465-4\", \"spouse_name\": \"NASIR\", \"patient_cnic\": \"42554-5481548-9\", \"patient_name\": \"ZAINAB NASIR\", \"spouse_address\": \"KARACHI\", \"spouse_contact\": \"(0358) 154-6164\", \"patient_address\": \"KARACHI\", \"patient_contact\": \"(0325) 254-9654\", \"how_did_you_know\": null, \"spouse_occupation\": null, \"patient_occupation\": null, \"doctor_coordinator_id\": \"4\", \"emergency_contact_number\": \"(0325) 444-5416\", \"emergency_contact_person\": \"SAIMA\", \"emergency_contact_relation\": \"SON\"}}', NULL, '2024-12-02 08:33:16', '2024-12-02 08:33:16'),
(94, 'default', 'Created Payment', 'App\\Models\\Payment', NULL, 1007, 'App\\Models\\User', 1, '{\"attributes\": {\"id\": 1007, \"total\": 4000, \"remarks\": null, \"discount\": \"0\", \"fc_number\": \"1020\", \"sub_total\": \"4000.00\", \"created_at\": \"2024-12-02 08:34:05\", \"patient_id\": 1020, \"updated_at\": \"2024-12-02 08:34:05\", \"doctor_name\": \"Dr Zaryab Setna\", \"file_number\": \"1018\", \"patient_type\": \"Free Consultancy\", \"payment_mode\": \"Cash\", \"clinic_portion\": \"0.00\", \"doctor_charges\": \"4000.00\", \"doctor_portion\": \"100.00\", \"doctor_department_name\": \"Infertility/Gynaecology/Obstetrice\"}}', NULL, '2024-12-02 08:34:05', '2024-12-02 08:34:05'),
(95, 'default', 'Created Payment', 'App\\Models\\Payment', NULL, 1008, 'App\\Models\\User', 1, '{\"attributes\": {\"id\": 1008, \"total\": 4000, \"remarks\": null, \"discount\": \"0\", \"fc_number\": \"1011\", \"sub_total\": \"4000.00\", \"created_at\": \"2024-12-02 08:37:06\", \"patient_id\": 1011, \"updated_at\": \"2024-12-02 08:37:06\", \"doctor_name\": \"Dr Zaryab Setna\", \"file_number\": \"1009\", \"patient_type\": \"Regular Patient\", \"payment_mode\": \"CC\", \"clinic_portion\": \"0.00\", \"doctor_charges\": \"4000.00\", \"doctor_portion\": \"100.00\", \"doctor_department_name\": \"Infertility/Gynaecology/Obstetrice\"}}', NULL, '2024-12-02 08:37:06', '2024-12-02 08:37:06'),
(96, 'default', 'Updated Payment', 'App\\Models\\Payment', NULL, 1002, 'App\\Models\\User', 1, '{\"old\": {\"id\": 1002, \"total\": \"4000.00\", \"closed\": 0, \"remarks\": null, \"discount\": \"0.00\", \"refunded\": 0, \"fc_number\": \"1009\", \"sub_total\": \"4000.00\", \"created_at\": \"2024-12-02T07:53:25.000000Z\", \"patient_id\": 1009, \"updated_at\": \"2024-12-02T07:53:25.000000Z\", \"doctor_name\": \"Dr Zaryab Setna\", \"file_number\": \"1007\", \"patient_type\": \"Regular Patient\", \"payment_mode\": \"CC\", \"clinic_portion\": \"0.00\", \"doctor_charges\": \"4000.00\", \"doctor_portion\": \"100.00\", \"doctor_department_name\": \"Infertility/Gynaecology/Obstetrice\"}, \"attributes\": {\"refunded\": true, \"updated_at\": \"2024-12-02 08:39:35\"}}', NULL, '2024-12-02 08:39:35', '2024-12-02 08:39:35'),
(97, 'default', 'Created Payment', 'App\\Models\\Payment', NULL, 1009, 'App\\Models\\User', 1, '{\"attributes\": {\"id\": 1009, \"total\": 4000, \"remarks\": null, \"discount\": \"0\", \"fc_number\": \"1009\", \"sub_total\": \"4000.00\", \"created_at\": \"2024-12-02 08:44:17\", \"patient_id\": 1009, \"updated_at\": \"2024-12-02 08:44:17\", \"doctor_name\": \"Dr Zaryab Setna\", \"file_number\": \"1007\", \"patient_type\": \"Regular Patient\", \"payment_mode\": \"Cash\", \"clinic_portion\": \"0.00\", \"doctor_charges\": \"4000.00\", \"doctor_portion\": \"100.00\", \"doctor_department_name\": \"Infertility/Gynaecology/Obstetrice\"}}', NULL, '2024-12-02 08:44:17', '2024-12-02 08:44:17'),
(98, 'default', 'Created Patient', 'App\\Models\\Patient', NULL, 1021, 'App\\Models\\User', 1, '{\"attributes\": {\"id\": 1021, \"note\": null, \"type\": \"Free Consultancy\", \"doctor_id\": \"4\", \"fc_number\": 1021, \"created_at\": \"2024-12-02 08:46:17\", \"spouse_dob\": \"0975-04-25\", \"updated_at\": \"2024-12-02 08:46:17\", \"file_number\": 1019, \"patient_dob\": \"1995-08-25\", \"spouse_cnic\": \"16465-4846443-4\", \"spouse_name\": \"KHURRUM\", \"patient_cnic\": \"24546-4646516-4\", \"patient_name\": \"RUKHSANA KHURRUM\", \"spouse_address\": \"KARACHI\", \"spouse_contact\": \"(0315) 465-4465\", \"patient_address\": \"KARACHI\", \"patient_contact\": \"(0356) 215-4511\", \"how_did_you_know\": null, \"spouse_occupation\": null, \"patient_occupation\": null, \"doctor_coordinator_id\": \"4\", \"emergency_contact_number\": \"(0325) 454-6454\", \"emergency_contact_person\": \"KIRAN\", \"emergency_contact_relation\": \"SISTER\"}}', NULL, '2024-12-02 08:46:17', '2024-12-02 08:46:17'),
(99, 'default', 'Deleted Patient', 'App\\Models\\Patient', NULL, 1021, 'App\\Models\\User', 1, '{\"attributes\": {\"id\": 1021, \"note\": null, \"type\": \"Free Consultancy\", \"doctor_id\": 4, \"fc_number\": \"1021\", \"created_at\": \"2024-12-02T08:46:17.000000Z\", \"deleted_at\": \"2024-12-02T08:46:51.000000Z\", \"spouse_dob\": \"0975-04-25\", \"updated_at\": \"2024-12-02T08:46:51.000000Z\", \"file_number\": \"1019\", \"patient_dob\": \"1995-08-25\", \"spouse_cnic\": \"16465-4846443-4\", \"spouse_name\": \"KHURRUM\", \"patient_cnic\": \"24546-4646516-4\", \"patient_name\": \"RUKHSANA KHURRUM\", \"spouse_address\": \"KARACHI\", \"spouse_contact\": \"(0315) 465-4465\", \"patient_address\": \"KARACHI\", \"patient_contact\": \"(0356) 215-4511\", \"how_did_you_know\": null, \"spouse_occupation\": null, \"patient_occupation\": null, \"doctor_coordinator_id\": 4, \"emergency_contact_number\": \"(0325) 454-6454\", \"emergency_contact_person\": \"KIRAN\", \"emergency_contact_relation\": \"SISTER\"}}', NULL, '2024-12-02 08:46:51', '2024-12-02 08:46:51'),
(100, 'default', 'Created Payment', 'App\\Models\\Payment', NULL, 1010, 'App\\Models\\User', 1, '{\"attributes\": {\"id\": 1010, \"total\": 4000, \"remarks\": null, \"discount\": \"0\", \"fc_number\": \"1014\", \"sub_total\": \"4000.00\", \"created_at\": \"2024-12-02 08:48:28\", \"patient_id\": 1014, \"updated_at\": \"2024-12-02 08:48:28\", \"doctor_name\": \"Dr Zaryab Setna\", \"file_number\": \"1012\", \"patient_type\": \"Free Consultancy\", \"payment_mode\": \"Cash\", \"clinic_portion\": \"0.00\", \"doctor_charges\": \"4000.00\", \"doctor_portion\": \"100.00\", \"doctor_department_name\": \"Infertility/Gynaecology/Obstetrice\"}}', NULL, '2024-12-02 08:48:28', '2024-12-02 08:48:28'),
(101, 'default', 'Updated User', 'App\\Models\\User', NULL, 1, 'App\\Models\\User', 1, '{\"old\": {\"id\": 1, \"name\": \"Admin\", \"email\": \"admin@themesbrand.com\", \"image\": null, \"password\": \"$2y$10$lC9z9FNo7I4aAwxWSnHqq.RNyCnSsNtWsEG.t.ocrXcSRDnPQFlbO\", \"is_active\": 1, \"created_at\": \"2024-11-12T15:35:11.000000Z\", \"updated_at\": null, \"remember_token\": \"RJOvmHdQdsoungiyEd0mMhxgYeJu18LQ7GrYq62Z2a9TXs96dEN9oU62yaiM\", \"google2fa_secret\": null, \"email_2fa_enabled\": null, \"email_verified_at\": null}, \"attributes\": {\"remember_token\": \"fbAHxBWXSxTgtjc5GG52HfXpRKkrfIKNXhVLFxmcRUvFrgGHIcHpXdhfeNAU\"}}', NULL, '2024-12-02 09:23:33', '2024-12-02 09:23:33'),
(102, 'default', 'User logged out', NULL, NULL, NULL, 'App\\Models\\User', 1, '{\"ip\": \"202.47.36.226\", \"os\": \"Windows\", \"device\": \"Desktop\", \"browser\": \"Chrome\", \"location\": \"Karachi, Sindh, Pakistan\", \"user_agent\": \"Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36 Edg/131.0.0.0\"}', NULL, '2024-12-02 09:23:33', '2024-12-02 09:23:33'),
(103, 'default', 'User logged in', NULL, NULL, NULL, 'App\\Models\\User', 1, '{\"ip\": \"202.47.36.226\", \"os\": \"Windows\", \"event\": \"login\", \"device\": \"Desktop\", \"browser\": \"Chrome\", \"location\": \"Karachi, Sindh, Pakistan\", \"user_agent\": \"Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36 Edg/131.0.0.0\"}', NULL, '2024-12-02 09:23:37', '2024-12-02 09:23:37'),
(104, 'default', 'User logged in', NULL, NULL, NULL, 'App\\Models\\User', 1, '{\"ip\": \"72.255.9.74\", \"os\": \"Windows\", \"event\": \"login\", \"device\": \"Desktop\", \"browser\": \"Chrome\", \"location\": \"Karachi, Sindh, Pakistan\", \"user_agent\": \"Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36\"}', NULL, '2024-12-04 14:04:46', '2024-12-04 14:04:46'),
(105, 'default', 'Created Payment', 'App\\Models\\Payment', NULL, 1011, 'App\\Models\\User', 1, '{\"attributes\": {\"id\": 1011, \"total\": 4000, \"remarks\": null, \"discount\": \"0\", \"fc_number\": \"1003\", \"sub_total\": 4000, \"created_at\": \"2024-12-04 16:08:06\", \"patient_id\": 1003, \"updated_at\": \"2024-12-04 16:08:06\", \"file_number\": null, \"patient_type\": \"Free Consultancy\", \"payment_mode\": \"Cash\"}}', NULL, '2024-12-04 16:08:06', '2024-12-04 16:08:06'),
(106, 'default', 'Created PaymentService', 'App\\Models\\PaymentService', NULL, 1, 'App\\Models\\User', 1, '{\"attributes\": {\"id\": 1, \"charges\": \"1000.00\", \"created_at\": \"2024-12-04 16:08:06\", \"payment_id\": 1011, \"updated_at\": \"2024-12-04 16:08:06\", \"service_name\": \"Blood Test\", \"department_name\": \"Laboratory\"}}', NULL, '2024-12-04 16:08:06', '2024-12-04 16:08:06'),
(107, 'default', 'Created PaymentService', 'App\\Models\\PaymentService', NULL, 2, 'App\\Models\\User', 1, '{\"attributes\": {\"id\": 2, \"charges\": \"3000.00\", \"created_at\": \"2024-12-04 16:08:06\", \"payment_id\": 1011, \"updated_at\": \"2024-12-04 16:08:06\", \"service_name\": \"Semen Analysis\", \"department_name\": \"Laboratory\"}}', NULL, '2024-12-04 16:08:06', '2024-12-04 16:08:06'),
(108, 'default', 'Created Patient', 'App\\Models\\Patient', NULL, 1035, 'App\\Models\\User', 1, '{\"attributes\": {\"id\": 1035, \"note\": \"Placeat labore qui\", \"type\": \"Regular Patient\", \"doctor_id\": \"3\", \"fc_number\": 1022, \"created_at\": \"2024-12-04 16:17:45\", \"spouse_dob\": \"1985-09-08\", \"updated_at\": \"2024-12-04 16:17:45\", \"file_number\": 1020, \"patient_dob\": \"2015-04-06\", \"spouse_cnic\": \"44444-4444444-4\", \"spouse_name\": \"Remedios Washington\", \"patient_cnic\": \"44444-4444444-4\", \"patient_name\": \"Paula Gould\", \"spouse_address\": \"Qui possimus quaera\", \"spouse_contact\": \"(0355) 555-5555\", \"patient_address\": \"Totam sint soluta vo\", \"patient_contact\": \"(0355) 555-5555\", \"how_did_you_know\": \"Other\", \"spouse_occupation\": \"Enim quia id beatae\", \"patient_occupation\": \"Voluptas mollitia es\", \"doctor_coordinator_id\": \"1\", \"emergency_contact_number\": \"(0355) 555-5555\", \"emergency_contact_person\": \"Nisi consectetur est\", \"emergency_contact_relation\": \"Velit natus nihil h\"}}', NULL, '2024-12-04 16:17:45', '2024-12-04 16:17:45'),
(109, 'default', 'Deleted Patient', 'App\\Models\\Patient', NULL, 1035, 'App\\Models\\User', 1, '{\"attributes\": {\"id\": 1035, \"note\": \"Placeat labore qui\", \"type\": \"Regular Patient\", \"doctor_id\": 3, \"fc_number\": \"1022\", \"created_at\": \"2024-12-04T16:17:45.000000Z\", \"deleted_at\": \"2024-12-04T16:18:05.000000Z\", \"spouse_dob\": \"1985-09-08\", \"updated_at\": \"2024-12-04T16:18:05.000000Z\", \"file_number\": \"1020\", \"patient_dob\": \"2015-04-06\", \"spouse_cnic\": \"44444-4444444-4\", \"spouse_name\": \"Remedios Washington\", \"patient_cnic\": \"44444-4444444-4\", \"patient_name\": \"Paula Gould\", \"spouse_address\": \"Qui possimus quaera\", \"spouse_contact\": \"(0355) 555-5555\", \"patient_address\": \"Totam sint soluta vo\", \"patient_contact\": \"(0355) 555-5555\", \"how_did_you_know\": \"Other\", \"spouse_occupation\": \"Enim quia id beatae\", \"patient_occupation\": \"Voluptas mollitia es\", \"doctor_coordinator_id\": 1, \"emergency_contact_number\": \"(0355) 555-5555\", \"emergency_contact_person\": \"Nisi consectetur est\", \"emergency_contact_relation\": \"Velit natus nihil h\"}}', NULL, '2024-12-04 16:18:05', '2024-12-04 16:18:05'),
(110, 'default', 'User logged in', NULL, NULL, NULL, 'App\\Models\\User', 1, '{\"ip\": \"2400:adc1:168:d300:d584:21dc:2d00:9fb4\", \"os\": \"Windows\", \"event\": \"login\", \"device\": \"Desktop\", \"browser\": \"Chrome\", \"location\": \"Karachi, Sindh, Pakistan\", \"user_agent\": \"Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36 Edg/131.0.0.0\"}', NULL, '2024-12-05 07:46:56', '2024-12-05 07:46:56'),
(111, 'default', 'Created Patient', 'App\\Models\\Patient', NULL, 1036, 'App\\Models\\User', 1, '{\"attributes\": {\"id\": 1036, \"note\": null, \"type\": \"Regular Patient\", \"doctor_id\": \"2\", \"fc_number\": 1023, \"created_at\": \"2024-12-05 07:51:08\", \"spouse_dob\": \"1980-09-14\", \"updated_at\": \"2024-12-05 07:51:08\", \"file_number\": 1021, \"patient_dob\": \"1985-07-07\", \"spouse_cnic\": \"22934-6842531-4\", \"spouse_name\": \"USMAN\", \"patient_cnic\": \"46898-9999999-8\", \"patient_name\": \"BARIRA\", \"spouse_address\": \"KARACHI\", \"spouse_contact\": \"(0311) 399-3905\", \"patient_address\": \"KARACHI\", \"patient_contact\": \"(0311) 399-3904\", \"how_did_you_know\": null, \"spouse_occupation\": \"JOB\", \"patient_occupation\": \"HOUSE WIFE\", \"doctor_coordinator_id\": \"2\", \"emergency_contact_number\": \"(0303) 333-6987\", \"emergency_contact_person\": \"MAHA\", \"emergency_contact_relation\": \"FRIEND\"}}', NULL, '2024-12-05 07:51:08', '2024-12-05 07:51:08'),
(112, 'default', 'Updated Doctor', 'App\\Models\\Doctor', NULL, 2, 'App\\Models\\User', 1, '{\"old\": {\"id\": 2, \"dob\": \"2010-02-10\", \"sex\": \"Female\", \"cnic\": \"52644-4440525-5\", \"name\": \"Dr. Naveera\", \"image\": null, \"address\": \"Karachi\", \"religion\": \"Islam\", \"bank_name\": null, \"doctor_id\": \"1005\", \"is_active\": 1, \"created_at\": \"2024-12-01T18:00:08.000000Z\", \"deleted_at\": null, \"specialist\": \"Infertility\", \"updated_at\": \"2024-12-01T18:00:08.000000Z\", \"payment_mode\": \"Cash\", \"account_title\": null, \"department_id\": 3, \"account_number\": null, \"clinic_portion\": \"40.00\", \"contact_number\": \"(0333) 256-5895\", \"doctor_charges\": \"2500.00\", \"doctor_portion\": \"60.00\", \"marital_status\": \"Married\", \"date_of_appointment\": \"2002-05-07\", \"emergency_contact_name\": \"Asx\", \"emergency_contact_number\": \"1468466444\", \"emergency_contact_relation\": \"sadef\"}, \"attributes\": {\"updated_at\": \"2024-12-05 07:59:13\", \"clinic_portion\": \"40\", \"doctor_charges\": \"3000.00\"}}', NULL, '2024-12-05 07:59:13', '2024-12-05 07:59:13'),
(113, 'default', 'Created Qualification', 'App\\Models\\Qualification', NULL, 6, 'App\\Models\\User', 1, '{\"attributes\": {\"id\": 6, \"degree\": \"Adegtret\", \"majors\": \"feewr\", \"doctor_id\": 2, \"created_at\": \"2024-12-05 07:59:13\", \"updated_at\": \"2024-12-05 07:59:13\", \"institution\": \"egrgr\"}}', NULL, '2024-12-05 07:59:13', '2024-12-05 07:59:13'),
(114, 'default', 'Created Qualification', 'App\\Models\\Qualification', NULL, 7, 'App\\Models\\User', 1, '{\"attributes\": {\"id\": 7, \"degree\": \"rewewr\", \"majors\": \"rewewre\", \"doctor_id\": 2, \"created_at\": \"2024-12-05 07:59:13\", \"updated_at\": \"2024-12-05 07:59:13\", \"institution\": \"ewwerwer\"}}', NULL, '2024-12-05 07:59:13', '2024-12-05 07:59:13'),
(115, 'default', 'Created Experience', 'App\\Models\\Experience', NULL, 5, 'App\\Models\\User', 1, '{\"attributes\": {\"id\": 5, \"end_date\": \"2004-02-05\", \"doctor_id\": 2, \"created_at\": \"2024-12-05 07:59:13\", \"start_date\": \"2000-10-03\", \"updated_at\": \"2024-12-05 07:59:13\", \"designation\": \"tweewtwet\", \"last_employer\": \"wrwert\"}}', NULL, '2024-12-05 07:59:13', '2024-12-05 07:59:13'),
(116, 'default', 'Created Patient', 'App\\Models\\Patient', NULL, 1037, 'App\\Models\\User', 1, '{\"attributes\": {\"id\": 1037, \"note\": null, \"type\": \"Regular Patient\", \"doctor_id\": \"2\", \"fc_number\": 1024, \"created_at\": \"2024-12-05 08:03:08\", \"spouse_dob\": \"1999-03-06\", \"updated_at\": \"2024-12-05 08:03:08\", \"file_number\": 1022, \"patient_dob\": \"2002-10-24\", \"spouse_cnic\": \"42101-7015551-9\", \"spouse_name\": \"MUBEEN\", \"patient_cnic\": \"42201-9842242-6\", \"patient_name\": \"MARIYAM\", \"spouse_address\": \"KARACHI\", \"spouse_contact\": \"(0332) 120-0035\", \"patient_address\": \"KARACHI\", \"patient_contact\": \"(0335) 739-9990\", \"how_did_you_know\": null, \"spouse_occupation\": \"JOB\", \"patient_occupation\": \"HOUSE WIFE\", \"doctor_coordinator_id\": \"2\", \"emergency_contact_number\": \"(0325) 698-7235\", \"emergency_contact_person\": \"BATOOL\", \"emergency_contact_relation\": \"FRIEND\"}}', NULL, '2024-12-05 08:03:08', '2024-12-05 08:03:08'),
(117, 'default', 'Created Patient', 'App\\Models\\Patient', NULL, 1038, 'App\\Models\\User', 1, '{\"attributes\": {\"id\": 1038, \"note\": null, \"type\": \"Regular Patient\", \"doctor_id\": \"2\", \"fc_number\": 1025, \"created_at\": \"2024-12-05 08:05:56\", \"spouse_dob\": \"1986-10-25\", \"updated_at\": \"2024-12-05 08:05:56\", \"file_number\": 1023, \"patient_dob\": \"1990-11-30\", \"spouse_cnic\": \"42101-5326815-7\", \"spouse_name\": \"DANIYAL\", \"patient_cnic\": \"42201-6482029-0\", \"patient_name\": \"FAHA\", \"spouse_address\": \"KARACHI\", \"spouse_contact\": \"(0333) 324-1113\", \"patient_address\": \"KARACHI\", \"patient_contact\": \"(0333) 128-1918\", \"how_did_you_know\": null, \"spouse_occupation\": \"JOB\", \"patient_occupation\": \"HOUSE WIFE\", \"doctor_coordinator_id\": \"2\", \"emergency_contact_number\": \"(0323) 897-3465\", \"emergency_contact_person\": \"BATOOL\", \"emergency_contact_relation\": \"FRIEND\"}}', NULL, '2024-12-05 08:05:56', '2024-12-05 08:05:56'),
(118, 'default', 'Created Patient', 'App\\Models\\Patient', NULL, 1039, 'App\\Models\\User', 1, '{\"attributes\": {\"id\": 1039, \"note\": null, \"type\": \"Regular Patient\", \"doctor_id\": \"2\", \"fc_number\": 1026, \"created_at\": \"2024-12-05 08:11:03\", \"spouse_dob\": \"1986-12-28\", \"updated_at\": \"2024-12-05 08:11:03\", \"file_number\": 1024, \"patient_dob\": \"1988-03-13\", \"spouse_cnic\": \"42101-9166903-7\", \"spouse_name\": \"SYED NAVEED KAZMI\", \"patient_cnic\": \"42101-9851771-8\", \"patient_name\": \"MEHWISH\", \"spouse_address\": \"KARACHI\", \"spouse_contact\": \"(0332) 568-7162\", \"patient_address\": \"KARACHI\", \"patient_contact\": \"(0334) 633-3289\", \"how_did_you_know\": null, \"spouse_occupation\": \"JOB\", \"patient_occupation\": \"JOB\", \"doctor_coordinator_id\": \"2\", \"emergency_contact_number\": \"(0368) 932-5555\", \"emergency_contact_person\": \"MAHA\", \"emergency_contact_relation\": \"FRIEND\"}}', NULL, '2024-12-05 08:11:03', '2024-12-05 08:11:03'),
(119, 'default', 'Created Patient', 'App\\Models\\Patient', NULL, 1040, 'App\\Models\\User', 1, '{\"attributes\": {\"id\": 1040, \"note\": null, \"type\": \"Regular Patient\", \"doctor_id\": \"2\", \"fc_number\": 1027, \"created_at\": \"2024-12-05 08:13:50\", \"spouse_dob\": \"1978-08-07\", \"updated_at\": \"2024-12-05 08:13:50\", \"file_number\": 1025, \"patient_dob\": \"1980-06-04\", \"spouse_cnic\": \"32164-9651236-5\", \"spouse_name\": \"MUHAMMAD\", \"patient_cnic\": \"16264-5984623-2\", \"patient_name\": \"BUSHRA\", \"spouse_address\": \"KARACHI\", \"spouse_contact\": null, \"patient_address\": null, \"patient_contact\": null, \"how_did_you_know\": null, \"spouse_occupation\": null, \"patient_occupation\": null, \"doctor_coordinator_id\": \"2\", \"emergency_contact_number\": \"(0325) 695-6564\", \"emergency_contact_person\": \"NAZIA ASIF\", \"emergency_contact_relation\": \"FRIEND\"}}', NULL, '2024-12-05 08:13:50', '2024-12-05 08:13:50'),
(120, 'default', 'Created Patient', 'App\\Models\\Patient', NULL, 1041, 'App\\Models\\User', 1, '{\"attributes\": {\"id\": 1041, \"note\": null, \"type\": \"Regular Patient\", \"doctor_id\": \"2\", \"fc_number\": 1028, \"created_at\": \"2024-12-05 08:20:03\", \"spouse_dob\": null, \"updated_at\": \"2024-12-05 08:20:03\", \"file_number\": 1026, \"patient_dob\": \"1984-09-02\", \"spouse_cnic\": \"13416-6235646-3\", \"spouse_name\": \"NOMAN IQBAL\", \"patient_cnic\": \"42000-0484756-7\", \"patient_name\": \"MEHWISH\", \"spouse_address\": \"KARACHI\", \"spouse_contact\": \"(0332) 127-7771\", \"patient_address\": \"KARACHI\", \"patient_contact\": \"(0332) 127-6513\", \"how_did_you_know\": null, \"spouse_occupation\": \"JOB\", \"patient_occupation\": \"HOUSE WIFE\", \"doctor_coordinator_id\": \"2\", \"emergency_contact_number\": \"(0328) 629-9999\", \"emergency_contact_person\": \"NAZIA ASIF\", \"emergency_contact_relation\": \"FRIEND\"}}', NULL, '2024-12-05 08:20:03', '2024-12-05 08:20:03'),
(121, 'default', 'Created Patient', 'App\\Models\\Patient', NULL, 1042, 'App\\Models\\User', 1, '{\"attributes\": {\"id\": 1042, \"note\": null, \"type\": \"Regular Patient\", \"doctor_id\": \"2\", \"fc_number\": 1029, \"created_at\": \"2024-12-05 08:22:12\", \"spouse_dob\": \"1980-09-25\", \"updated_at\": \"2024-12-05 08:22:12\", \"file_number\": 1027, \"patient_dob\": \"1986-07-05\", \"spouse_cnic\": \"42201-6859721-1\", \"spouse_name\": \"ABDUL BASIT\", \"patient_cnic\": \"42201-9687321-0\", \"patient_name\": \"MUQADDAS\", \"spouse_address\": \"KARACHI\", \"spouse_contact\": \"(0335) 282-1960\", \"patient_address\": \"KARACHI\", \"patient_contact\": \"(0335) 282-0691\", \"how_did_you_know\": null, \"spouse_occupation\": \"JOB\", \"patient_occupation\": \"HOUSE WIFE\", \"doctor_coordinator_id\": \"2\", \"emergency_contact_number\": \"(0332) 569-5656\", \"emergency_contact_person\": \"NAZIA ASIF\", \"emergency_contact_relation\": \"FRIEND\"}}', NULL, '2024-12-05 08:22:12', '2024-12-05 08:22:12'),
(122, 'default', 'Created Patient', 'App\\Models\\Patient', NULL, 1043, 'App\\Models\\User', 1, '{\"attributes\": {\"id\": 1043, \"note\": null, \"type\": \"Regular Patient\", \"doctor_id\": \"2\", \"fc_number\": 1030, \"created_at\": \"2024-12-05 08:25:56\", \"spouse_dob\": \"1986-04-08\", \"updated_at\": \"2024-12-05 08:25:56\", \"file_number\": 1028, \"patient_dob\": \"1982-05-14\", \"spouse_cnic\": \"42230-1983266-6\", \"spouse_name\": \"ABDUL AHMED\", \"patient_cnic\": \"42202-6348378-2\", \"patient_name\": \"FARZANA JATOI\", \"spouse_address\": \"KARACHI\", \"spouse_contact\": \"(0333) 022-2022\", \"patient_address\": \"KARACHI\", \"patient_contact\": \"(0333) 822-2002\", \"how_did_you_know\": null, \"spouse_occupation\": \"JOB\", \"patient_occupation\": \"HOUSE WIFE\", \"doctor_coordinator_id\": \"2\", \"emergency_contact_number\": \"(0333) 256-9565\", \"emergency_contact_person\": \"NAZIA ASIF\", \"emergency_contact_relation\": \"FRIEND\"}}', NULL, '2024-12-05 08:25:56', '2024-12-05 08:25:56'),
(123, 'default', 'Created Patient', 'App\\Models\\Patient', NULL, 1044, 'App\\Models\\User', 1, '{\"attributes\": {\"id\": 1044, \"note\": null, \"type\": \"Regular Patient\", \"doctor_id\": \"2\", \"fc_number\": 1031, \"created_at\": \"2024-12-05 08:28:06\", \"spouse_dob\": \"1992-01-24\", \"updated_at\": \"2024-12-05 08:28:06\", \"file_number\": 1029, \"patient_dob\": \"1997-05-05\", \"spouse_cnic\": \"42301-9930138-5\", \"spouse_name\": \"ANUS\", \"patient_cnic\": \"42301-4592499-8\", \"patient_name\": \"MARYUM ANAS\", \"spouse_address\": \"KARACHI\", \"spouse_contact\": \"(0333) 436-4648\", \"patient_address\": \"KARACHI\", \"patient_contact\": \"(0333) 522-1091\", \"how_did_you_know\": null, \"spouse_occupation\": \"JOB\", \"patient_occupation\": \"JOB\", \"doctor_coordinator_id\": \"2\", \"emergency_contact_number\": \"(0332) 569-8723\", \"emergency_contact_person\": \"QURATULAIN\", \"emergency_contact_relation\": \"FRIEND\"}}', NULL, '2024-12-05 08:28:06', '2024-12-05 08:28:06'),
(124, 'default', 'Created Patient', 'App\\Models\\Patient', NULL, 1045, 'App\\Models\\User', 1, '{\"attributes\": {\"id\": 1045, \"note\": null, \"type\": \"Regular Patient\", \"doctor_id\": \"2\", \"fc_number\": 1032, \"created_at\": \"2024-12-05 08:33:21\", \"spouse_dob\": \"1980-10-20\", \"updated_at\": \"2024-12-05 08:33:21\", \"file_number\": 1030, \"patient_dob\": \"1986-03-26\", \"spouse_cnic\": \"42201-3697586-4\", \"spouse_name\": \"SAIFULLAHA KHAN\", \"patient_cnic\": \"42201-6397832-1\", \"patient_name\": \"SADIA\", \"spouse_address\": \"KARACHI\", \"spouse_contact\": \"(0333) 333-8164\", \"patient_address\": \"KARACHI\", \"patient_contact\": \"(0305) 241-6377\", \"how_did_you_know\": null, \"spouse_occupation\": \"HOUSE WIFE\", \"patient_occupation\": \"HOUSE WIFE\", \"doctor_coordinator_id\": \"2\", \"emergency_contact_number\": \"(0332) 862-9999\", \"emergency_contact_person\": \"NAZIA ASIF\", \"emergency_contact_relation\": \"SISTER\"}}', NULL, '2024-12-05 08:33:21', '2024-12-05 08:33:21'),
(125, 'default', 'Created Patient', 'App\\Models\\Patient', NULL, 1046, 'App\\Models\\User', 1, '{\"attributes\": {\"id\": 1046, \"note\": null, \"type\": \"Regular Patient\", \"doctor_id\": \"2\", \"fc_number\": 1033, \"created_at\": \"2024-12-05 08:38:03\", \"spouse_dob\": \"1988-01-01\", \"updated_at\": \"2024-12-05 08:38:03\", \"file_number\": 1031, \"patient_dob\": \"2001-12-20\", \"spouse_cnic\": \"36101-3037952-5\", \"spouse_name\": \"MUBASHIR ALI\", \"patient_cnic\": \"36101-1682466-2\", \"patient_name\": \"RIMSHA RIAZ\", \"spouse_address\": \"KARACHI\", \"spouse_contact\": \"(0334) 428-7747\", \"patient_address\": null, \"patient_contact\": null, \"how_did_you_know\": null, \"spouse_occupation\": \"JOB\", \"patient_occupation\": null, \"doctor_coordinator_id\": \"2\", \"emergency_contact_number\": \"(0333) 256-9872\", \"emergency_contact_person\": \"GULAM MURTAZA\", \"emergency_contact_relation\": \"BROTHER\"}}', NULL, '2024-12-05 08:38:03', '2024-12-05 08:38:03'),
(126, 'default', 'Created Patient', 'App\\Models\\Patient', NULL, 1047, 'App\\Models\\User', 1, '{\"attributes\": {\"id\": 1047, \"note\": null, \"type\": \"Regular Patient\", \"doctor_id\": \"2\", \"fc_number\": 1034, \"created_at\": \"2024-12-05 08:40:04\", \"spouse_dob\": \"1998-08-16\", \"updated_at\": \"2024-12-05 08:40:04\", \"file_number\": 1032, \"patient_dob\": \"2000-10-01\", \"spouse_cnic\": \"42222-2686584-1\", \"spouse_name\": \"WASEEM\", \"patient_cnic\": \"42201-3897362-1\", \"patient_name\": \"NADIA\", \"spouse_address\": \"KARACHI\", \"spouse_contact\": \"(0338) 642-2222\", \"patient_address\": \"KARACHI\", \"patient_contact\": \"(0346) 211-6094\", \"how_did_you_know\": null, \"spouse_occupation\": \"JOB\", \"patient_occupation\": \"JOB\", \"doctor_coordinator_id\": \"2\", \"emergency_contact_number\": \"(0338) 677-9555\", \"emergency_contact_person\": \"BARI\", \"emergency_contact_relation\": \"FRIEND\"}}', NULL, '2024-12-05 08:40:04', '2024-12-05 08:40:04'),
(127, 'default', 'Created Patient', 'App\\Models\\Patient', NULL, 1048, 'App\\Models\\User', 1, '{\"attributes\": {\"id\": 1048, \"note\": null, \"type\": \"Regular Patient\", \"doctor_id\": \"2\", \"fc_number\": 1035, \"created_at\": \"2024-12-05 08:43:35\", \"spouse_dob\": \"1997-02-19\", \"updated_at\": \"2024-12-05 08:43:35\", \"file_number\": 1033, \"patient_dob\": \"1999-07-14\", \"spouse_cnic\": \"31646-4531354-6\", \"spouse_name\": \"TARIQ\", \"patient_cnic\": \"42201-9873691-1\", \"patient_name\": \"AIMEN\", \"spouse_address\": \"KARACHI\", \"spouse_contact\": \"(0323) 821-6562\", \"patient_address\": \"KARACHI\", \"patient_contact\": \"(0300) 212-2728\", \"how_did_you_know\": null, \"spouse_occupation\": \"JOB\", \"patient_occupation\": \"JOB\", \"doctor_coordinator_id\": \"2\", \"emergency_contact_number\": \"(0321) 646-8413\", \"emergency_contact_person\": \"BARI\", \"emergency_contact_relation\": \"FRIEND\"}}', NULL, '2024-12-05 08:43:35', '2024-12-05 08:43:35'),
(128, 'default', 'Created Patient', 'App\\Models\\Patient', NULL, 1049, 'App\\Models\\User', 1, '{\"attributes\": {\"id\": 1049, \"note\": null, \"type\": \"Regular Patient\", \"doctor_id\": \"2\", \"fc_number\": 1036, \"created_at\": \"2024-12-05 08:46:04\", \"spouse_dob\": \"1993-11-11\", \"updated_at\": \"2024-12-05 08:46:04\", \"file_number\": 1034, \"patient_dob\": \"1994-11-12\", \"spouse_cnic\": \"42201-8546464-6\", \"spouse_name\": \"TAHIR\", \"patient_cnic\": \"42201-9765648-9\", \"patient_name\": \"FATIMA\", \"spouse_address\": \"KARACHI\", \"spouse_contact\": \"(0335) 833-3495\", \"patient_address\": \"KARACHI\", \"patient_contact\": \"(0333) 285-6455\", \"how_did_you_know\": null, \"spouse_occupation\": \"JOB\", \"patient_occupation\": \"JOB\", \"doctor_coordinator_id\": \"2\", \"emergency_contact_number\": \"(0354) 668-4985\", \"emergency_contact_person\": \"RAUF\", \"emergency_contact_relation\": \"FRIEND\"}}', NULL, '2024-12-05 08:46:04', '2024-12-05 08:46:04'),
(129, 'default', 'Created Patient', 'App\\Models\\Patient', NULL, 1050, 'App\\Models\\User', 1, '{\"attributes\": {\"id\": 1050, \"note\": null, \"type\": \"Regular Patient\", \"doctor_id\": \"2\", \"fc_number\": 1037, \"created_at\": \"2024-12-05 08:51:37\", \"spouse_dob\": \"1988-12-06\", \"updated_at\": \"2024-12-05 08:51:37\", \"file_number\": 1035, \"patient_dob\": \"1985-06-05\", \"spouse_cnic\": \"13564-8946546-8\", \"spouse_name\": \"NIAZI\", \"patient_cnic\": \"24301-5486449-9\", \"patient_name\": \"SIDRA NIAZI\", \"spouse_address\": \"KARACHI\", \"spouse_contact\": \"(0378) 465-4664\", \"patient_address\": \"KARACHI\", \"patient_contact\": \"(0335) 498-6486\", \"how_did_you_know\": \"Referral\", \"spouse_occupation\": \"JOB\", \"patient_occupation\": \"HOUSEWIFE\", \"doctor_coordinator_id\": \"2\", \"emergency_contact_number\": \"(0384) 655-4645\", \"emergency_contact_person\": \"SHAZIA\", \"emergency_contact_relation\": \"MOTHER\"}}', NULL, '2024-12-05 08:51:37', '2024-12-05 08:51:37'),
(130, 'default', 'Created Payment', 'App\\Models\\Payment', NULL, 1012, 'App\\Models\\User', 1, '{\"attributes\": {\"id\": 1012, \"total\": 3000, \"remarks\": null, \"discount\": \"0\", \"fc_number\": \"1023\", \"sub_total\": \"3000.00\", \"created_at\": \"2024-12-05 12:05:42\", \"patient_id\": 1036, \"updated_at\": \"2024-12-05 12:05:42\", \"doctor_name\": \"Dr. Naveera\", \"file_number\": \"1021\", \"patient_type\": \"Regular Patient\", \"payment_mode\": \"CC\", \"clinic_portion\": \"40.00\", \"doctor_charges\": \"3000.00\", \"doctor_portion\": \"60.00\", \"doctor_department_name\": \"Infertility/Gynaecology/Obstetrice\"}}', NULL, '2024-12-05 12:05:42', '2024-12-05 12:05:42'),
(131, 'default', 'Created Payment', 'App\\Models\\Payment', NULL, 1013, 'App\\Models\\User', 1, '{\"attributes\": {\"id\": 1013, \"total\": 3000, \"remarks\": null, \"discount\": \"0\", \"fc_number\": \"1024\", \"sub_total\": \"3000.00\", \"created_at\": \"2024-12-05 12:06:02\", \"patient_id\": 1037, \"updated_at\": \"2024-12-05 12:06:02\", \"doctor_name\": \"Dr. Naveera\", \"file_number\": \"1022\", \"patient_type\": \"Regular Patient\", \"payment_mode\": \"CC\", \"clinic_portion\": \"40.00\", \"doctor_charges\": \"3000.00\", \"doctor_portion\": \"60.00\", \"doctor_department_name\": \"Infertility/Gynaecology/Obstetrice\"}}', NULL, '2024-12-05 12:06:02', '2024-12-05 12:06:02'),
(132, 'default', 'Created Payment', 'App\\Models\\Payment', NULL, 1014, 'App\\Models\\User', 1, '{\"attributes\": {\"id\": 1014, \"total\": 3000, \"remarks\": null, \"discount\": \"0\", \"fc_number\": \"1025\", \"sub_total\": \"3000.00\", \"created_at\": \"2024-12-05 12:06:20\", \"patient_id\": 1038, \"updated_at\": \"2024-12-05 12:06:20\", \"doctor_name\": \"Dr. Naveera\", \"file_number\": \"1023\", \"patient_type\": \"Regular Patient\", \"payment_mode\": \"Cash\", \"clinic_portion\": \"40.00\", \"doctor_charges\": \"3000.00\", \"doctor_portion\": \"60.00\", \"doctor_department_name\": \"Infertility/Gynaecology/Obstetrice\"}}', NULL, '2024-12-05 12:06:20', '2024-12-05 12:06:20'),
(133, 'default', 'Created Payment', 'App\\Models\\Payment', NULL, 1015, 'App\\Models\\User', 1, '{\"attributes\": {\"id\": 1015, \"total\": 3000, \"remarks\": null, \"discount\": \"0\", \"fc_number\": \"1027\", \"sub_total\": \"3000.00\", \"created_at\": \"2024-12-05 12:06:45\", \"patient_id\": 1040, \"updated_at\": \"2024-12-05 12:06:45\", \"doctor_name\": \"Dr. Naveera\", \"file_number\": \"1025\", \"patient_type\": \"Regular Patient\", \"payment_mode\": \"Cash\", \"clinic_portion\": \"40.00\", \"doctor_charges\": \"3000.00\", \"doctor_portion\": \"60.00\", \"doctor_department_name\": \"Infertility/Gynaecology/Obstetrice\"}}', NULL, '2024-12-05 12:06:45', '2024-12-05 12:06:45'),
(134, 'default', 'Created Payment', 'App\\Models\\Payment', NULL, 1016, 'App\\Models\\User', 1, '{\"attributes\": {\"id\": 1016, \"total\": 3000, \"remarks\": null, \"discount\": \"0\", \"fc_number\": \"1029\", \"sub_total\": \"3000.00\", \"created_at\": \"2024-12-05 12:07:05\", \"patient_id\": 1042, \"updated_at\": \"2024-12-05 12:07:05\", \"doctor_name\": \"Dr. Naveera\", \"file_number\": \"1027\", \"patient_type\": \"Regular Patient\", \"payment_mode\": \"Cash\", \"clinic_portion\": \"40.00\", \"doctor_charges\": \"3000.00\", \"doctor_portion\": \"60.00\", \"doctor_department_name\": \"Infertility/Gynaecology/Obstetrice\"}}', NULL, '2024-12-05 12:07:05', '2024-12-05 12:07:05'),
(135, 'default', 'Created Payment', 'App\\Models\\Payment', NULL, 1017, 'App\\Models\\User', 1, '{\"attributes\": {\"id\": 1017, \"total\": 3000, \"remarks\": null, \"discount\": \"0\", \"fc_number\": \"1030\", \"sub_total\": \"3000.00\", \"created_at\": \"2024-12-05 12:07:18\", \"patient_id\": 1043, \"updated_at\": \"2024-12-05 12:07:18\", \"doctor_name\": \"Dr. Naveera\", \"file_number\": \"1028\", \"patient_type\": \"Regular Patient\", \"payment_mode\": \"Cash\", \"clinic_portion\": \"40.00\", \"doctor_charges\": \"3000.00\", \"doctor_portion\": \"60.00\", \"doctor_department_name\": \"Infertility/Gynaecology/Obstetrice\"}}', NULL, '2024-12-05 12:07:18', '2024-12-05 12:07:18'),
(136, 'default', 'Created Payment', 'App\\Models\\Payment', NULL, 1018, 'App\\Models\\User', 1, '{\"attributes\": {\"id\": 1018, \"total\": 3000, \"remarks\": null, \"discount\": \"0\", \"fc_number\": \"1031\", \"sub_total\": \"3000.00\", \"created_at\": \"2024-12-05 12:07:33\", \"patient_id\": 1044, \"updated_at\": \"2024-12-05 12:07:33\", \"doctor_name\": \"Dr. Naveera\", \"file_number\": \"1029\", \"patient_type\": \"Regular Patient\", \"payment_mode\": \"Cash\", \"clinic_portion\": \"40.00\", \"doctor_charges\": \"3000.00\", \"doctor_portion\": \"60.00\", \"doctor_department_name\": \"Infertility/Gynaecology/Obstetrice\"}}', NULL, '2024-12-05 12:07:33', '2024-12-05 12:07:33'),
(137, 'default', 'Created Payment', 'App\\Models\\Payment', NULL, 1019, 'App\\Models\\User', 1, '{\"attributes\": {\"id\": 1019, \"total\": 3000, \"remarks\": null, \"discount\": \"0\", \"fc_number\": \"1032\", \"sub_total\": \"3000.00\", \"created_at\": \"2024-12-05 12:07:49\", \"patient_id\": 1045, \"updated_at\": \"2024-12-05 12:07:49\", \"doctor_name\": \"Dr. Naveera\", \"file_number\": \"1030\", \"patient_type\": \"Regular Patient\", \"payment_mode\": \"Online\", \"clinic_portion\": \"40.00\", \"doctor_charges\": \"3000.00\", \"doctor_portion\": \"60.00\", \"doctor_department_name\": \"Infertility/Gynaecology/Obstetrice\"}}', NULL, '2024-12-05 12:07:49', '2024-12-05 12:07:49'),
(138, 'default', 'Created Payment', 'App\\Models\\Payment', NULL, 1020, 'App\\Models\\User', 1, '{\"attributes\": {\"id\": 1020, \"total\": 3000, \"remarks\": null, \"discount\": \"0\", \"fc_number\": \"1033\", \"sub_total\": \"3000.00\", \"created_at\": \"2024-12-05 12:08:05\", \"patient_id\": 1046, \"updated_at\": \"2024-12-05 12:08:05\", \"doctor_name\": \"Dr. Naveera\", \"file_number\": \"1031\", \"patient_type\": \"Regular Patient\", \"payment_mode\": \"CC\", \"clinic_portion\": \"40.00\", \"doctor_charges\": \"3000.00\", \"doctor_portion\": \"60.00\", \"doctor_department_name\": \"Infertility/Gynaecology/Obstetrice\"}}', NULL, '2024-12-05 12:08:05', '2024-12-05 12:08:05'),
(139, 'default', 'Created Payment', 'App\\Models\\Payment', NULL, 1021, 'App\\Models\\User', 1, '{\"attributes\": {\"id\": 1021, \"total\": 3000, \"remarks\": null, \"discount\": \"0\", \"fc_number\": \"1034\", \"sub_total\": \"3000.00\", \"created_at\": \"2024-12-05 12:08:51\", \"patient_id\": 1047, \"updated_at\": \"2024-12-05 12:08:51\", \"doctor_name\": \"Dr. Naveera\", \"file_number\": \"1032\", \"patient_type\": \"Regular Patient\", \"payment_mode\": \"Cash\", \"clinic_portion\": \"40.00\", \"doctor_charges\": \"3000.00\", \"doctor_portion\": \"60.00\", \"doctor_department_name\": \"Infertility/Gynaecology/Obstetrice\"}}', NULL, '2024-12-05 12:08:51', '2024-12-05 12:08:51'),
(140, 'default', 'Created Payment', 'App\\Models\\Payment', NULL, 1022, 'App\\Models\\User', 1, '{\"attributes\": {\"id\": 1022, \"total\": 3000, \"remarks\": null, \"discount\": \"0\", \"fc_number\": \"1036\", \"sub_total\": \"3000.00\", \"created_at\": \"2024-12-05 12:09:11\", \"patient_id\": 1049, \"updated_at\": \"2024-12-05 12:09:11\", \"doctor_name\": \"Dr. Naveera\", \"file_number\": \"1034\", \"patient_type\": \"Regular Patient\", \"payment_mode\": \"CC\", \"clinic_portion\": \"40.00\", \"doctor_charges\": \"3000.00\", \"doctor_portion\": \"60.00\", \"doctor_department_name\": \"Infertility/Gynaecology/Obstetrice\"}}', NULL, '2024-12-05 12:09:11', '2024-12-05 12:09:11'),
(141, 'default', 'Created Payment', 'App\\Models\\Payment', NULL, 1023, 'App\\Models\\User', 1, '{\"attributes\": {\"id\": 1023, \"total\": 3000, \"remarks\": null, \"discount\": \"0\", \"fc_number\": \"1037\", \"sub_total\": \"3000.00\", \"created_at\": \"2024-12-05 12:09:30\", \"patient_id\": 1050, \"updated_at\": \"2024-12-05 12:09:30\", \"doctor_name\": \"Dr. Naveera\", \"file_number\": \"1035\", \"patient_type\": \"Regular Patient\", \"payment_mode\": \"Cash\", \"clinic_portion\": \"40.00\", \"doctor_charges\": \"3000.00\", \"doctor_portion\": \"60.00\", \"doctor_department_name\": \"Infertility/Gynaecology/Obstetrice\"}}', NULL, '2024-12-05 12:09:30', '2024-12-05 12:09:30'),
(142, 'default', 'Created Patient', 'App\\Models\\Patient', NULL, 1051, 'App\\Models\\User', 1, '{\"attributes\": {\"id\": 1051, \"note\": null, \"type\": \"Regular Patient\", \"doctor_id\": \"2\", \"fc_number\": 1038, \"created_at\": \"2024-12-05 12:12:22\", \"spouse_dob\": \"1986-12-23\", \"updated_at\": \"2024-12-05 12:12:22\", \"file_number\": 1036, \"patient_dob\": \"1986-12-24\", \"spouse_cnic\": \"41306-0860996-7\", \"spouse_name\": \"SOHAIL\", \"patient_cnic\": \"42201-8516561-4\", \"patient_name\": \"IQRA\", \"spouse_address\": \"KARACHI\", \"spouse_contact\": \"(0330) 020-0911\", \"patient_address\": \"KARACHI\", \"patient_contact\": \"(0332) 220-0911\", \"how_did_you_know\": null, \"spouse_occupation\": \"JOB\", \"patient_occupation\": \"JOB\", \"doctor_coordinator_id\": \"2\", \"emergency_contact_number\": \"(0333) 256-9872\", \"emergency_contact_person\": \"IRUM\", \"emergency_contact_relation\": \"FRIEND\"}}', NULL, '2024-12-05 12:12:22', '2024-12-05 12:12:22'),
(143, 'default', 'Created Payment', 'App\\Models\\Payment', NULL, 1024, 'App\\Models\\User', 1, '{\"attributes\": {\"id\": 1024, \"total\": 3000, \"remarks\": null, \"discount\": \"0\", \"fc_number\": \"1038\", \"sub_total\": \"3000.00\", \"created_at\": \"2024-12-05 12:13:02\", \"patient_id\": 1051, \"updated_at\": \"2024-12-05 12:13:02\", \"doctor_name\": \"Dr. Naveera\", \"file_number\": \"1036\", \"patient_type\": \"Regular Patient\", \"payment_mode\": \"CC\", \"clinic_portion\": \"40.00\", \"doctor_charges\": \"3000.00\", \"doctor_portion\": \"60.00\", \"doctor_department_name\": \"Infertility/Gynaecology/Obstetrice\"}}', NULL, '2024-12-05 12:13:02', '2024-12-05 12:13:02'),
(144, 'default', 'Created Patient', 'App\\Models\\Patient', NULL, 1052, 'App\\Models\\User', 1, '{\"attributes\": {\"id\": 1052, \"note\": null, \"type\": \"Free Consultancy\", \"doctor_id\": \"2\", \"fc_number\": 1039, \"created_at\": \"2024-12-05 12:14:58\", \"spouse_dob\": \"1983-03-15\", \"updated_at\": \"2024-12-05 12:14:58\", \"file_number\": 1037, \"patient_dob\": \"1986-10-22\", \"spouse_cnic\": \"22934-6842531-5\", \"spouse_name\": \"HAMEED\", \"patient_cnic\": \"22306-9785432-1\", \"patient_name\": \"NAFEESA\", \"spouse_address\": \"KARACHI\", \"spouse_contact\": \"(0333) 256-9565\", \"patient_address\": \"KARACHI\", \"patient_contact\": \"(0333) 256-9872\", \"how_did_you_know\": null, \"spouse_occupation\": \"JOB\", \"patient_occupation\": \"JOB\", \"doctor_coordinator_id\": \"2\", \"emergency_contact_number\": \"(0333) 327-2861\", \"emergency_contact_person\": \"IRUM\", \"emergency_contact_relation\": \"FRIEND\"}}', NULL, '2024-12-05 12:14:58', '2024-12-05 12:14:58'),
(145, 'default', 'Created Payment', 'App\\Models\\Payment', NULL, 1025, 'App\\Models\\User', 1, '{\"attributes\": {\"id\": 1025, \"total\": 3000, \"remarks\": null, \"discount\": \"0\", \"fc_number\": \"1039\", \"sub_total\": \"3000.00\", \"created_at\": \"2024-12-05 12:15:11\", \"patient_id\": 1052, \"updated_at\": \"2024-12-05 12:15:11\", \"doctor_name\": \"Dr. Naveera\", \"file_number\": \"1037\", \"patient_type\": \"Free Consultancy\", \"payment_mode\": \"Cash\", \"clinic_portion\": \"40.00\", \"doctor_charges\": \"3000.00\", \"doctor_portion\": \"60.00\", \"doctor_department_name\": \"Infertility/Gynaecology/Obstetrice\"}}', NULL, '2024-12-05 12:15:11', '2024-12-05 12:15:11'),
(146, 'default', 'Created Patient', 'App\\Models\\Patient', NULL, 1053, 'App\\Models\\User', 1, '{\"attributes\": {\"id\": 1053, \"note\": null, \"type\": \"Regular Patient\", \"doctor_id\": \"2\", \"fc_number\": 1040, \"created_at\": \"2024-12-05 12:18:19\", \"spouse_dob\": \"1984-12-13\", \"updated_at\": \"2024-12-05 12:18:19\", \"file_number\": 1038, \"patient_dob\": \"1988-07-11\", \"spouse_cnic\": \"42201-8362183-1\", \"spouse_name\": \"ZUBAIR\", \"patient_cnic\": \"42003-9872653-3\", \"patient_name\": \"FAIZA\", \"spouse_address\": null, \"spouse_contact\": null, \"patient_address\": null, \"patient_contact\": null, \"how_did_you_know\": null, \"spouse_occupation\": null, \"patient_occupation\": null, \"doctor_coordinator_id\": \"2\", \"emergency_contact_number\": \"(0336) 824-9422\", \"emergency_contact_person\": \"WAQAR\", \"emergency_contact_relation\": \"S\"}}', NULL, '2024-12-05 12:18:19', '2024-12-05 12:18:19'),
(147, 'default', 'Created Payment', 'App\\Models\\Payment', NULL, 1026, 'App\\Models\\User', 1, '{\"attributes\": {\"id\": 1026, \"total\": 3000, \"remarks\": null, \"discount\": \"0\", \"fc_number\": \"1040\", \"sub_total\": \"3000.00\", \"created_at\": \"2024-12-05 12:19:34\", \"patient_id\": 1053, \"updated_at\": \"2024-12-05 12:19:34\", \"doctor_name\": \"Dr. Naveera\", \"file_number\": \"1038\", \"patient_type\": \"Regular Patient\", \"payment_mode\": \"Cash\", \"clinic_portion\": \"40.00\", \"doctor_charges\": \"3000.00\", \"doctor_portion\": \"60.00\", \"doctor_department_name\": \"Infertility/Gynaecology/Obstetrice\"}}', NULL, '2024-12-05 12:19:34', '2024-12-05 12:19:34'),
(148, 'default', 'Created Patient', 'App\\Models\\Patient', NULL, 1054, 'App\\Models\\User', 1, '{\"attributes\": {\"id\": 1054, \"note\": null, \"type\": \"Regular Patient\", \"doctor_id\": \"2\", \"fc_number\": 1041, \"created_at\": \"2024-12-05 12:21:25\", \"spouse_dob\": \"2001-12-14\", \"updated_at\": \"2024-12-05 12:21:25\", \"file_number\": 1039, \"patient_dob\": \"2002-08-12\", \"spouse_cnic\": \"42220-7398642-1\", \"spouse_name\": \"ZAHID\", \"patient_cnic\": \"42201-9368763-1\", \"patient_name\": \"ANUM ZEHRA\", \"spouse_address\": \"KARACHI\", \"spouse_contact\": \"(0336) 789-6421\", \"patient_address\": \"KARACHI\", \"patient_contact\": \"(0336) 209-3055\", \"how_did_you_know\": null, \"spouse_occupation\": \"JOB\", \"patient_occupation\": \"JOB\", \"doctor_coordinator_id\": \"2\", \"emergency_contact_number\": \"(0333) 555-6666\", \"emergency_contact_person\": \"GULAM MURTAZA\", \"emergency_contact_relation\": \"BROTHER\"}}', NULL, '2024-12-05 12:21:25', '2024-12-05 12:21:25');
INSERT INTO `activity_log` (`id`, `log_name`, `description`, `subject_type`, `event`, `subject_id`, `causer_type`, `causer_id`, `properties`, `batch_uuid`, `created_at`, `updated_at`) VALUES
(149, 'default', 'Created Payment', 'App\\Models\\Payment', NULL, 1027, 'App\\Models\\User', 1, '{\"attributes\": {\"id\": 1027, \"total\": 3000, \"remarks\": null, \"discount\": \"0\", \"fc_number\": \"1041\", \"sub_total\": \"3000.00\", \"created_at\": \"2024-12-05 12:21:47\", \"patient_id\": 1054, \"updated_at\": \"2024-12-05 12:21:47\", \"doctor_name\": \"Dr. Naveera\", \"file_number\": \"1039\", \"patient_type\": \"Regular Patient\", \"payment_mode\": \"Online\", \"clinic_portion\": \"40.00\", \"doctor_charges\": \"3000.00\", \"doctor_portion\": \"60.00\", \"doctor_department_name\": \"Infertility/Gynaecology/Obstetrice\"}}', NULL, '2024-12-05 12:21:47', '2024-12-05 12:21:47'),
(150, 'default', 'Created Payment', 'App\\Models\\Payment', NULL, 1028, 'App\\Models\\User', 1, '{\"attributes\": {\"id\": 1028, \"total\": 3000, \"remarks\": null, \"discount\": \"0\", \"fc_number\": \"1034\", \"sub_total\": \"3000.00\", \"created_at\": \"2024-12-05 12:27:30\", \"patient_id\": 1047, \"updated_at\": \"2024-12-05 12:27:30\", \"doctor_name\": \"Dr. Naveera\", \"file_number\": \"1032\", \"patient_type\": \"Regular Patient\", \"payment_mode\": \"CC\", \"clinic_portion\": \"40.00\", \"doctor_charges\": \"3000.00\", \"doctor_portion\": \"60.00\", \"doctor_department_name\": \"Infertility/Gynaecology/Obstetrice\"}}', NULL, '2024-12-05 12:27:30', '2024-12-05 12:27:30'),
(151, 'default', 'User logged in', NULL, NULL, NULL, 'App\\Models\\User', 1, '{\"ip\": \"72.255.9.74\", \"os\": \"Windows\", \"event\": \"login\", \"device\": \"Desktop\", \"browser\": \"Chrome\", \"location\": \"Karachi, Sindh, Pakistan\", \"user_agent\": \"Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36\"}', NULL, '2024-12-10 11:46:29', '2024-12-10 11:46:29'),
(152, 'default', 'Created Department', 'App\\Models\\Department', NULL, 11, 'App\\Models\\User', 1, '{\"attributes\": {\"id\": 11, \"name\": \"TF\", \"sequence\": \"1\", \"created_at\": \"2024-12-10 11:55:33\", \"updated_at\": \"2024-12-10 11:55:33\"}}', NULL, '2024-12-10 11:55:33', '2024-12-10 11:55:33'),
(153, 'default', 'Deleted Department', 'App\\Models\\Department', NULL, 11, 'App\\Models\\User', 1, '{\"attributes\": {\"id\": 11, \"name\": \"TF\", \"sequence\": 1, \"created_at\": \"2024-12-10T11:55:33.000000Z\", \"updated_at\": \"2024-12-10T11:55:33.000000Z\"}}', NULL, '2024-12-10 11:55:40', '2024-12-10 11:55:40'),
(154, 'default', 'Updated Doctor', 'App\\Models\\Doctor', NULL, 1, 'App\\Models\\User', 1, '{\"old\": {\"id\": 1, \"dob\": \"1979-02-12\", \"sex\": \"Male\", \"cnic\": \"4101_-1924069-9\", \"name\": \"Dr Satna\", \"image\": \"doctors/x5cWi85MbknkyVnMDT7jGcQUggoh3kumAae0UUl3.jpg\", \"address\": \"sfdsf\", \"religion\": null, \"bank_name\": null, \"doctor_id\": \"1\", \"is_active\": 1, \"created_at\": \"2024-11-19T08:23:24.000000Z\", \"deleted_at\": null, \"specialist\": \"skin\", \"updated_at\": \"2024-11-19T08:23:24.000000Z\", \"payment_mode\": \"Cash\", \"account_title\": null, \"department_id\": null, \"account_number\": null, \"clinic_portion\": \"80.00\", \"contact_number\": \"(0300) 285-2247\", \"doctor_charges\": \"5000.00\", \"doctor_portion\": \"20.00\", \"marital_status\": \"Single\", \"date_of_appointment\": \"2024-11-19\", \"emergency_contact_name\": \"0202020000\", \"emergency_contact_number\": \"03002852241\", \"emergency_contact_relation\": \"00000000000\"}, \"attributes\": {\"is_active\": false, \"updated_at\": \"2024-12-10 12:05:32\"}}', NULL, '2024-12-10 12:05:32', '2024-12-10 12:05:32'),
(155, 'default', 'Updated Doctor', 'App\\Models\\Doctor', NULL, 1, 'App\\Models\\User', 1, '{\"old\": {\"id\": 1, \"dob\": \"1979-02-12\", \"sex\": \"Male\", \"cnic\": \"4101_-1924069-9\", \"name\": \"Dr Satna\", \"image\": \"doctors/x5cWi85MbknkyVnMDT7jGcQUggoh3kumAae0UUl3.jpg\", \"address\": \"sfdsf\", \"religion\": null, \"bank_name\": null, \"doctor_id\": \"1\", \"is_active\": 0, \"created_at\": \"2024-11-19T08:23:24.000000Z\", \"deleted_at\": null, \"specialist\": \"skin\", \"updated_at\": \"2024-12-10T12:05:32.000000Z\", \"payment_mode\": \"Cash\", \"account_title\": null, \"department_id\": null, \"account_number\": null, \"clinic_portion\": \"80.00\", \"contact_number\": \"(0300) 285-2247\", \"doctor_charges\": \"5000.00\", \"doctor_portion\": \"20.00\", \"marital_status\": \"Single\", \"date_of_appointment\": \"2024-11-19\", \"emergency_contact_name\": \"0202020000\", \"emergency_contact_number\": \"03002852241\", \"emergency_contact_relation\": \"00000000000\"}, \"attributes\": {\"is_active\": true, \"updated_at\": \"2024-12-10 12:05:33\"}}', NULL, '2024-12-10 12:05:33', '2024-12-10 12:05:33'),
(156, 'default', 'User logged in', NULL, NULL, NULL, 'App\\Models\\User', 1, '{\"ip\": \"72.255.9.74\", \"os\": \"Windows\", \"event\": \"login\", \"device\": \"Desktop\", \"browser\": \"Chrome\", \"location\": \"Karachi, Sindh, Pakistan\", \"user_agent\": \"Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36\"}', NULL, '2024-12-13 10:47:21', '2024-12-13 10:47:21'),
(157, 'default', 'Created Service', 'App\\Models\\Service', NULL, 6, 'App\\Models\\User', 1, '{\"attributes\": {\"id\": 6, \"name\": \"Test Services\", \"charges\": \"80000\", \"created_at\": \"2024-12-13 10:48:19\", \"updated_at\": \"2024-12-13 10:48:19\", \"department_id\": \"5\"}}', NULL, '2024-12-13 10:48:19', '2024-12-13 10:48:19'),
(158, 'default', 'User logged in', NULL, NULL, NULL, 'App\\Models\\User', 1, '{\"ip\": \"2400:adc1:168:d300:6f24:c211:6911:28cd\", \"os\": \"Windows\", \"event\": \"login\", \"device\": \"Desktop\", \"browser\": \"Chrome\", \"location\": \"Karachi, Sindh, Pakistan\", \"user_agent\": \"Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36 Edg/131.0.0.0\"}', NULL, '2024-12-14 11:21:48', '2024-12-14 11:21:48'),
(159, 'default', 'User logged in', NULL, NULL, NULL, 'App\\Models\\User', 1, '{\"ip\": \"202.47.36.226\", \"os\": \"Windows\", \"event\": \"login\", \"device\": \"Desktop\", \"browser\": \"Chrome\", \"location\": \"Karachi, Sindh, Pakistan\", \"user_agent\": \"Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36 Edg/131.0.0.0\"}', NULL, '2025-01-06 12:30:09', '2025-01-06 12:30:09'),
(160, 'default', 'Created Patient', 'App\\Models\\Patient', NULL, 1055, 'App\\Models\\User', 1, '{\"attributes\": {\"id\": 1055, \"note\": null, \"type\": \"Regular Patient\", \"doctor_id\": \"1\", \"fc_number\": 1042, \"created_at\": \"2025-01-06 12:33:57\", \"spouse_dob\": \"1976-01-19\", \"updated_at\": \"2025-01-06 12:33:57\", \"file_number\": 1040, \"patient_dob\": \"1980-07-07\", \"spouse_cnic\": \"35466-5365695-6\", \"spouse_name\": \"AZIZ\", \"patient_cnic\": \"16464-3623646-4\", \"patient_name\": \"NAYYAR\", \"spouse_address\": \"KARACHI\", \"spouse_contact\": \"(0353) 438-6465\", \"patient_address\": \"KARACHI\", \"patient_contact\": \"(0335) 646-4131\", \"how_did_you_know\": null, \"spouse_occupation\": \"JOB\", \"patient_occupation\": \"HOUSEWIFE\", \"doctor_coordinator_id\": \"1\", \"emergency_contact_number\": \"(0335) 468-7985\", \"emergency_contact_person\": \"DUA\", \"emergency_contact_relation\": \"DAUGHTER\"}}', NULL, '2025-01-06 12:33:57', '2025-01-06 12:33:57'),
(161, 'default', 'Created Patient', 'App\\Models\\Patient', NULL, 1056, 'App\\Models\\User', 1, '{\"attributes\": {\"id\": 1056, \"note\": null, \"type\": \"Regular Patient\", \"doctor_id\": \"3\", \"fc_number\": 1043, \"created_at\": \"2025-01-06 12:38:39\", \"spouse_dob\": \"1967-04-30\", \"updated_at\": \"2025-01-06 12:38:39\", \"file_number\": 1041, \"patient_dob\": \"1976-01-19\", \"spouse_cnic\": \"51654-6953654-8\", \"spouse_name\": \"AZIZ\", \"patient_cnic\": \"35498-7652312-2\", \"patient_name\": \"AZIZ\", \"spouse_address\": \"KARACHI\", \"spouse_contact\": \"(0316) 546-8796\", \"patient_address\": \"KARACHI\", \"patient_contact\": \"(0351) 364-6945\", \"how_did_you_know\": \"Social Media\", \"spouse_occupation\": \"JOB\", \"patient_occupation\": \"JOB\", \"doctor_coordinator_id\": \"3\", \"emergency_contact_number\": \"(0354) 898-9876\", \"emergency_contact_person\": \"DUA\", \"emergency_contact_relation\": \"DAUGHTER\"}}', NULL, '2025-01-06 12:38:39', '2025-01-06 12:38:39'),
(162, 'default', 'User logged in', NULL, NULL, NULL, 'App\\Models\\User', 1, '{\"ip\": \"103.7.61.61\", \"os\": \"Windows\", \"event\": \"login\", \"device\": \"Desktop\", \"browser\": \"Chrome\", \"location\": \"Karachi, Sindh, Pakistan\", \"user_agent\": \"Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36\"}', NULL, '2025-01-06 16:17:51', '2025-01-06 16:17:51'),
(163, 'default', 'Created Patient', 'App\\Models\\Patient', NULL, 1057, 'App\\Models\\User', 1, '{\"attributes\": {\"id\": 1057, \"note\": \"just a gyne patient\", \"type\": \"Regular Patient\", \"doctor_id\": \"2\", \"fc_number\": 1044, \"created_at\": \"2025-01-06 16:25:33\", \"spouse_dob\": \"0001-01-01\", \"updated_at\": \"2025-01-06 16:25:33\", \"file_number\": 1042, \"patient_dob\": \"1978-02-21\", \"spouse_cnic\": \"00000-0000000-0\", \"spouse_name\": \"nothing\", \"patient_cnic\": \"42301-0000000-0\", \"patient_name\": \"subhana\", \"spouse_address\": null, \"spouse_contact\": \"(0300) 000-0000\", \"patient_address\": \"karachi\", \"patient_contact\": \"(0340) 123-0017\", \"how_did_you_know\": \"Referral\", \"spouse_occupation\": \"-\", \"patient_occupation\": \"job\", \"doctor_coordinator_id\": \"2\", \"emergency_contact_number\": \"(0323) 456-0099\", \"emergency_contact_person\": \"aiman\", \"emergency_contact_relation\": \"sister\"}}', NULL, '2025-01-06 16:25:33', '2025-01-06 16:25:33'),
(164, 'default', 'Created Payment', 'App\\Models\\Payment', NULL, 1029, 'App\\Models\\User', 1, '{\"attributes\": {\"id\": 1029, \"total\": 4000, \"remarks\": null, \"discount\": \"0\", \"fc_number\": \"1001\", \"sub_total\": \"4000.00\", \"created_at\": \"2025-01-06 16:30:40\", \"patient_id\": 1001, \"updated_at\": \"2025-01-06 16:30:40\", \"doctor_name\": \"Dr Zaryab Setna\", \"file_number\": \"1001\", \"patient_type\": \"Regular Patient\", \"payment_mode\": \"Cash\", \"clinic_portion\": \"0.00\", \"doctor_charges\": \"4000.00\", \"doctor_portion\": \"100.00\", \"doctor_department_name\": \"Infertility/Gynaecology/Obstetrice\"}}', NULL, '2025-01-06 16:30:40', '2025-01-06 16:30:40'),
(165, 'default', 'User logged in', NULL, NULL, NULL, 'App\\Models\\User', 1, '{\"ip\": \"39.48.187.114\", \"os\": \"Windows\", \"event\": \"login\", \"device\": \"Desktop\", \"browser\": \"Chrome\", \"location\": \"Karachi, Sindh, Pakistan\", \"user_agent\": \"Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36\"}', NULL, '2025-01-08 12:20:58', '2025-01-08 12:20:58'),
(166, 'default', 'User logged in', NULL, NULL, NULL, 'App\\Models\\User', 1, '{\"ip\": \"202.47.36.226\", \"os\": \"Windows\", \"event\": \"login\", \"device\": \"Desktop\", \"browser\": \"Chrome\", \"location\": \"Karachi, Sindh, Pakistan\", \"user_agent\": \"Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36\"}', NULL, '2025-01-14 10:46:18', '2025-01-14 10:46:18'),
(167, 'default', 'Created Payment', 'App\\Models\\Payment', NULL, 1030, 'App\\Models\\User', 1, '{\"attributes\": {\"id\": 1030, \"total\": 1000, \"remarks\": null, \"discount\": \"0\", \"fc_number\": \"1001\", \"sub_total\": 1000, \"created_at\": \"2025-01-14 10:51:03\", \"patient_id\": 1001, \"updated_at\": \"2025-01-14 10:51:03\", \"file_number\": \"1001\", \"patient_type\": \"Regular Patient\", \"payment_mode\": \"Cash\"}}', NULL, '2025-01-14 10:51:03', '2025-01-14 10:51:03'),
(168, 'default', 'Created PaymentService', 'App\\Models\\PaymentService', NULL, 3, 'App\\Models\\User', 1, '{\"attributes\": {\"id\": 3, \"charges\": \"1000.00\", \"created_at\": \"2025-01-14 10:51:03\", \"payment_id\": 1030, \"updated_at\": \"2025-01-14 10:51:03\", \"service_name\": \"Blood Test\", \"department_name\": \"Laboratory\"}}', NULL, '2025-01-14 10:51:03', '2025-01-14 10:51:03'),
(169, 'default', 'User logged in', NULL, NULL, NULL, 'App\\Models\\User', 1, '{\"ip\": \"202.47.36.226\", \"os\": \"Windows\", \"event\": \"login\", \"device\": \"Desktop\", \"browser\": \"Chrome\", \"location\": \"Karachi, Sindh, Pakistan\", \"user_agent\": \"Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36 Edg/131.0.0.0\"}', NULL, '2025-01-14 10:59:30', '2025-01-14 10:59:30'),
(170, 'default', 'Updated Patient', 'App\\Models\\Patient', NULL, 1002, 'App\\Models\\User', 1, '{\"old\": {\"id\": 1002, \"note\": \"Test case 01\", \"type\": \"Free Consultancy\", \"doctor_id\": null, \"fc_number\": \"1002\", \"created_at\": \"2024-12-01T18:05:04.000000Z\", \"deleted_at\": null, \"spouse_dob\": \"1998-01-05\", \"updated_at\": \"2024-12-01T18:05:29.000000Z\", \"file_number\": null, \"patient_dob\": \"1998-01-05\", \"spouse_cnic\": \"51546-5465444-4\", \"spouse_name\": \"Ali\", \"patient_cnic\": \"15648-4841351-6\", \"patient_name\": \"Alisha\", \"spouse_address\": \"Karachi\", \"spouse_contact\": \"(0345) 454-4444\", \"patient_address\": \"Karachi\", \"patient_contact\": \"(0354) 545-4545\", \"how_did_you_know\": \"Referral\", \"spouse_occupation\": null, \"patient_occupation\": null, \"doctor_coordinator_id\": 2, \"emergency_contact_number\": \"(0355) 555-5555\", \"emergency_contact_person\": \"rwrt\", \"emergency_contact_relation\": \"reyyt\"}, \"attributes\": {\"type\": \"Regular Patient\", \"doctor_id\": \"2\", \"updated_at\": \"2025-01-14 11:05:36\", \"file_number\": 1043}}', NULL, '2025-01-14 11:05:36', '2025-01-14 11:05:36'),
(171, 'default', 'Updated Service', 'App\\Models\\Service', NULL, 2, 'App\\Models\\User', 1, '{\"old\": {\"id\": 2, \"name\": \"Blood Test\", \"charges\": \"1000.00\", \"created_at\": \"2024-12-01T17:53:29.000000Z\", \"updated_at\": \"2024-12-01T17:53:29.000000Z\", \"department_id\": 8}, \"attributes\": {\"name\": \"ALISHA\", \"charges\": \"3000\", \"updated_at\": \"2025-01-14 11:21:37\"}}', NULL, '2025-01-14 11:21:37', '2025-01-14 11:21:37'),
(172, 'default', 'Created Service', 'App\\Models\\Service', NULL, 7, 'App\\Models\\User', 1, '{\"attributes\": {\"id\": 7, \"name\": \"MINAL\", \"charges\": \"4000\", \"created_at\": \"2025-01-14 11:23:02\", \"updated_at\": \"2025-01-14 11:23:02\", \"department_id\": \"7\"}}', NULL, '2025-01-14 11:23:02', '2025-01-14 11:23:02'),
(173, 'default', 'Created Service', 'App\\Models\\Service', NULL, 8, 'App\\Models\\User', 1, '{\"attributes\": {\"id\": 8, \"name\": \"Minal\", \"charges\": \"4000\", \"created_at\": \"2025-01-14 11:39:29\", \"updated_at\": \"2025-01-14 11:39:29\", \"department_id\": \"7\"}}', NULL, '2025-01-14 11:39:29', '2025-01-14 11:39:29'),
(174, 'default', 'Created Service', 'App\\Models\\Service', NULL, 9, 'App\\Models\\User', 1, '{\"attributes\": {\"id\": 9, \"name\": \"Minal\", \"charges\": \"4000\", \"created_at\": \"2025-01-14 12:28:21\", \"updated_at\": \"2025-01-14 12:28:21\", \"department_id\": \"7\"}}', NULL, '2025-01-14 12:28:21', '2025-01-14 12:28:21'),
(175, 'default', 'Deleted Service', 'App\\Models\\Service', NULL, 9, 'App\\Models\\User', 1, '{\"attributes\": {\"id\": 9, \"name\": \"Minal\", \"charges\": \"4000.00\", \"created_at\": \"2025-01-14T12:28:21.000000Z\", \"updated_at\": \"2025-01-14T12:28:21.000000Z\", \"department_id\": 7}}', NULL, '2025-01-14 12:42:16', '2025-01-14 12:42:16'),
(176, 'default', 'Deleted Service', 'App\\Models\\Service', NULL, 8, 'App\\Models\\User', 1, '{\"attributes\": {\"id\": 8, \"name\": \"Minal\", \"charges\": \"4000.00\", \"created_at\": \"2025-01-14T11:39:29.000000Z\", \"updated_at\": \"2025-01-14T11:39:29.000000Z\", \"department_id\": 7}}', NULL, '2025-01-14 12:42:20', '2025-01-14 12:42:20'),
(177, 'default', 'User logged in', NULL, NULL, NULL, 'App\\Models\\User', 1, '{\"ip\": \"202.47.36.226\", \"os\": \"Windows\", \"event\": \"login\", \"device\": \"Desktop\", \"browser\": \"Chrome\", \"location\": \"Karachi, Sindh, Pakistan\", \"user_agent\": \"Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36 Edg/131.0.0.0\"}', NULL, '2025-01-15 10:01:20', '2025-01-15 10:01:20'),
(178, 'default', 'Created Service', 'App\\Models\\Service', NULL, 10, 'App\\Models\\User', 1, '{\"attributes\": {\"id\": 10, \"name\": \"AZIZ MOMBANI\", \"charges\": \"3000\", \"created_at\": \"2025-01-15 10:03:44\", \"updated_at\": \"2025-01-15 10:03:44\", \"department_id\": \"10\"}}', NULL, '2025-01-15 10:03:44', '2025-01-15 10:03:44'),
(179, 'default', 'User logged in', NULL, NULL, NULL, 'App\\Models\\User', 1, '{\"ip\": \"72.255.9.74\", \"os\": \"Windows\", \"event\": \"login\", \"device\": \"Desktop\", \"browser\": \"Chrome\", \"location\": \"Karachi, Sindh, Pakistan\", \"user_agent\": \"Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/132.0.0.0 Safari/537.36\"}', NULL, '2025-01-17 07:21:16', '2025-01-17 07:21:16'),
(180, 'default', 'Created Department', 'App\\Models\\Department', NULL, 12, 'App\\Models\\User', 1, '{\"attributes\": {\"id\": 12, \"name\": \"TEST DEPARTMENT\", \"sequence\": \"1\", \"created_at\": \"2025-01-17 07:23:02\", \"updated_at\": \"2025-01-17 07:23:02\"}}', NULL, '2025-01-17 07:23:02', '2025-01-17 07:23:02'),
(181, 'default', 'Created Service', 'App\\Models\\Service', NULL, 11, 'App\\Models\\User', 1, '{\"attributes\": {\"id\": 11, \"name\": \"Ultrasound\", \"charges\": \"8000\", \"created_at\": \"2025-01-17 07:23:39\", \"updated_at\": \"2025-01-17 07:23:39\", \"department_id\": \"7\"}}', NULL, '2025-01-17 07:23:39', '2025-01-17 07:23:39'),
(182, 'default', 'Deleted Service', 'App\\Models\\Service', NULL, 11, 'App\\Models\\User', 1, '{\"attributes\": {\"id\": 11, \"name\": \"Ultrasound\", \"charges\": \"8000.00\", \"created_at\": \"2025-01-17T07:23:39.000000Z\", \"updated_at\": \"2025-01-17T07:23:39.000000Z\", \"department_id\": 7}}', NULL, '2025-01-17 07:23:47', '2025-01-17 07:23:47'),
(183, 'default', 'Created Service', 'App\\Models\\Service', NULL, 12, 'App\\Models\\User', 1, '{\"attributes\": {\"id\": 12, \"name\": \"Ultrasound\", \"charges\": \"8500\", \"created_at\": \"2025-01-17 07:24:12\", \"updated_at\": \"2025-01-17 07:24:12\", \"department_id\": \"7\"}}', NULL, '2025-01-17 07:24:12', '2025-01-17 07:24:12'),
(184, 'default', 'Updated Service', 'App\\Models\\Service', NULL, 2, 'App\\Models\\User', 1, '{\"old\": {\"id\": 2, \"name\": \"ALISHA\", \"charges\": \"3000.00\", \"created_at\": \"2024-12-01T17:53:29.000000Z\", \"updated_at\": \"2025-01-14T11:21:37.000000Z\", \"department_id\": 8}, \"attributes\": {\"name\": \"ALISHA IIS\", \"updated_at\": \"2025-01-17 07:31:20\"}}', NULL, '2025-01-17 07:31:20', '2025-01-17 07:31:20'),
(185, 'default', 'Created Doctor', 'App\\Models\\Doctor', NULL, 5, 'App\\Models\\User', 1, '{\"attributes\": {\"id\": 5, \"dob\": \"1970-08-08\", \"sex\": \"Male\", \"cnic\": \"99999-9999999-9\", \"name\": \"Doctor Test\", \"image\": \"doctors/lyDhus2UiVGpnJPbfGv5Emx378Rh9wTyWTM3Ympx.jpg\", \"address\": \"B-108 Clifton street 6\", \"religion\": \"Islam\", \"bank_name\": null, \"doctor_id\": \"10029\", \"created_at\": \"2025-01-17 07:36:13\", \"specialist\": \"Ultrasound\", \"updated_at\": \"2025-01-17 07:36:13\", \"payment_mode\": \"Cash\", \"account_title\": null, \"department_id\": \"7\", \"account_number\": null, \"clinic_portion\": \"70\", \"contact_number\": \"(0366) 666-6666\", \"doctor_charges\": \"6000\", \"doctor_portion\": \"30\", \"marital_status\": \"Married\", \"date_of_appointment\": \"2000-03-01\", \"emergency_contact_name\": \"Asiya\", \"emergency_contact_number\": \"098765344647\", \"emergency_contact_relation\": \"Wife\"}}', NULL, '2025-01-17 07:36:13', '2025-01-17 07:36:13'),
(186, 'default', 'Created Qualification', 'App\\Models\\Qualification', NULL, 8, 'App\\Models\\User', 1, '{\"attributes\": {\"id\": 8, \"degree\": \"MBBS\", \"majors\": \"Ultrasonic\", \"doctor_id\": 5, \"created_at\": \"2025-01-17 07:36:13\", \"updated_at\": \"2025-01-17 07:36:13\", \"institution\": \"KMS\"}}', NULL, '2025-01-17 07:36:13', '2025-01-17 07:36:13'),
(187, 'default', 'Created Experience', 'App\\Models\\Experience', NULL, 6, 'App\\Models\\User', 1, '{\"attributes\": {\"id\": 6, \"end_date\": \"2000-01-01\", \"doctor_id\": 5, \"created_at\": \"2025-01-17 07:36:13\", \"start_date\": \"1999-01-01\", \"updated_at\": \"2025-01-17 07:36:13\", \"designation\": \"Doctor\", \"last_employer\": \"Liaquat Hospital\"}}', NULL, '2025-01-17 07:36:13', '2025-01-17 07:36:13'),
(188, 'default', 'Updated Doctor', 'App\\Models\\Doctor', NULL, 5, 'App\\Models\\User', 1, '{\"old\": {\"id\": 5, \"dob\": \"1970-08-08\", \"sex\": \"Male\", \"cnic\": \"99999-9999999-9\", \"name\": \"Doctor Test\", \"image\": \"doctors/lyDhus2UiVGpnJPbfGv5Emx378Rh9wTyWTM3Ympx.jpg\", \"address\": \"B-108 Clifton street 6\", \"religion\": \"Islam\", \"bank_name\": null, \"doctor_id\": \"10029\", \"is_active\": 1, \"created_at\": \"2025-01-17T07:36:13.000000Z\", \"deleted_at\": null, \"specialist\": \"Ultrasound\", \"updated_at\": \"2025-01-17T07:36:13.000000Z\", \"payment_mode\": \"Cash\", \"account_title\": null, \"department_id\": 7, \"account_number\": null, \"clinic_portion\": \"70.00\", \"contact_number\": \"(0366) 666-6666\", \"doctor_charges\": \"6000.00\", \"doctor_portion\": \"30.00\", \"marital_status\": \"Married\", \"date_of_appointment\": \"2000-03-01\", \"emergency_contact_name\": \"Asiya\", \"emergency_contact_number\": \"098765344647\", \"emergency_contact_relation\": \"Wife\"}, \"attributes\": {\"is_active\": false, \"updated_at\": \"2025-01-17 07:36:20\"}}', NULL, '2025-01-17 07:36:20', '2025-01-17 07:36:20'),
(189, 'default', 'Updated Doctor', 'App\\Models\\Doctor', NULL, 5, 'App\\Models\\User', 1, '{\"old\": {\"id\": 5, \"dob\": \"1970-08-08\", \"sex\": \"Male\", \"cnic\": \"99999-9999999-9\", \"name\": \"Doctor Test\", \"image\": \"doctors/lyDhus2UiVGpnJPbfGv5Emx378Rh9wTyWTM3Ympx.jpg\", \"address\": \"B-108 Clifton street 6\", \"religion\": \"Islam\", \"bank_name\": null, \"doctor_id\": \"10029\", \"is_active\": 0, \"created_at\": \"2025-01-17T07:36:13.000000Z\", \"deleted_at\": null, \"specialist\": \"Ultrasound\", \"updated_at\": \"2025-01-17T07:36:20.000000Z\", \"payment_mode\": \"Cash\", \"account_title\": null, \"department_id\": 7, \"account_number\": null, \"clinic_portion\": \"70.00\", \"contact_number\": \"(0366) 666-6666\", \"doctor_charges\": \"6000.00\", \"doctor_portion\": \"30.00\", \"marital_status\": \"Married\", \"date_of_appointment\": \"2000-03-01\", \"emergency_contact_name\": \"Asiya\", \"emergency_contact_number\": \"098765344647\", \"emergency_contact_relation\": \"Wife\"}, \"attributes\": {\"is_active\": true, \"updated_at\": \"2025-01-17 07:36:22\"}}', NULL, '2025-01-17 07:36:22', '2025-01-17 07:36:22'),
(190, 'default', 'Updated Doctor', 'App\\Models\\Doctor', NULL, 5, 'App\\Models\\User', 1, '{\"old\": {\"id\": 5, \"dob\": \"1970-08-08\", \"sex\": \"Male\", \"cnic\": \"99999-9999999-9\", \"name\": \"Doctor Test\", \"image\": \"doctors/lyDhus2UiVGpnJPbfGv5Emx378Rh9wTyWTM3Ympx.jpg\", \"address\": \"B-108 Clifton street 6\", \"religion\": \"Islam\", \"bank_name\": null, \"doctor_id\": \"10029\", \"is_active\": 1, \"created_at\": \"2025-01-17T07:36:13.000000Z\", \"deleted_at\": null, \"specialist\": \"Ultrasound\", \"updated_at\": \"2025-01-17T07:36:22.000000Z\", \"payment_mode\": \"Cash\", \"account_title\": null, \"department_id\": 7, \"account_number\": null, \"clinic_portion\": \"70.00\", \"contact_number\": \"(0366) 666-6666\", \"doctor_charges\": \"6000.00\", \"doctor_portion\": \"30.00\", \"marital_status\": \"Married\", \"date_of_appointment\": \"2000-03-01\", \"emergency_contact_name\": \"Asiya\", \"emergency_contact_number\": \"098765344647\", \"emergency_contact_relation\": \"Wife\"}, \"attributes\": {\"name\": \"Doctor Test 12\", \"updated_at\": \"2025-01-17 07:37:10\", \"clinic_portion\": \"70\"}}', NULL, '2025-01-17 07:37:10', '2025-01-17 07:37:10'),
(191, 'default', 'Created Qualification', 'App\\Models\\Qualification', NULL, 9, 'App\\Models\\User', 1, '{\"attributes\": {\"id\": 9, \"degree\": \"MBBS\", \"majors\": \"Ultrasonic\", \"doctor_id\": 5, \"created_at\": \"2025-01-17 07:37:10\", \"updated_at\": \"2025-01-17 07:37:10\", \"institution\": \"KMS\"}}', NULL, '2025-01-17 07:37:10', '2025-01-17 07:37:10'),
(192, 'default', 'Created Experience', 'App\\Models\\Experience', NULL, 7, 'App\\Models\\User', 1, '{\"attributes\": {\"id\": 7, \"end_date\": \"2000-01-01\", \"doctor_id\": 5, \"created_at\": \"2025-01-17 07:37:10\", \"start_date\": \"1999-01-01\", \"updated_at\": \"2025-01-17 07:37:10\", \"designation\": \"Doctor\", \"last_employer\": \"Liaquat Hospital\"}}', NULL, '2025-01-17 07:37:10', '2025-01-17 07:37:10'),
(193, 'default', 'Created Patient', 'App\\Models\\Patient', NULL, 1058, 'App\\Models\\User', 1, '{\"attributes\": {\"id\": 1058, \"note\": \"Patient with 10% discount\", \"type\": \"Regular Patient\", \"doctor_id\": \"5\", \"fc_number\": 1045, \"created_at\": \"2025-01-17 07:46:09\", \"spouse_dob\": \"1980-01-01\", \"updated_at\": \"2025-01-17 07:46:09\", \"file_number\": 1044, \"patient_dob\": \"1990-01-01\", \"spouse_cnic\": \"33333-3333333-3\", \"spouse_name\": \"Alam\", \"patient_cnic\": \"33333-3333333-3\", \"patient_name\": \"ABC Patient\", \"spouse_address\": \"karachi\", \"spouse_contact\": \"(0333) 333-3333\", \"patient_address\": \"Karachi\", \"patient_contact\": \"(0322) 222-2222\", \"how_did_you_know\": \"Social Media\", \"spouse_occupation\": \"Director\", \"patient_occupation\": \"Teacher\", \"doctor_coordinator_id\": \"1\", \"emergency_contact_number\": \"(0333) 333-3333\", \"emergency_contact_person\": \"Zia\", \"emergency_contact_relation\": \"Father\"}}', NULL, '2025-01-17 07:46:09', '2025-01-17 07:46:09'),
(194, 'default', 'Created Patient', 'App\\Models\\Patient', NULL, 1059, 'App\\Models\\User', 1, '{\"attributes\": {\"id\": 1059, \"note\": \"gf\", \"type\": \"Free Consultancy\", \"doctor_id\": null, \"fc_number\": 1046, \"created_at\": \"2025-01-17 07:58:13\", \"spouse_dob\": \"1980-11-11\", \"updated_at\": \"2025-01-17 07:58:13\", \"file_number\": null, \"patient_dob\": \"1990-01-01\", \"spouse_cnic\": \"33333-3333333-3\", \"spouse_name\": \"Alam\", \"patient_cnic\": \"88888-8888888-8\", \"patient_name\": \"ABC Patient\", \"spouse_address\": \"Karachi\", \"spouse_contact\": \"(0333) 333-3333\", \"patient_address\": \"Karachi\", \"patient_contact\": \"(0322) 222-2222\", \"how_did_you_know\": \"Social Media\", \"spouse_occupation\": \"Director\", \"patient_occupation\": \"Teacher\", \"doctor_coordinator_id\": \"5\", \"emergency_contact_number\": \"(0333) 333-3333\", \"emergency_contact_person\": \"Zia\", \"emergency_contact_relation\": \"Father\"}}', NULL, '2025-01-17 07:58:13', '2025-01-17 07:58:13'),
(195, 'default', 'Created Payment', 'App\\Models\\Payment', NULL, 1031, 'App\\Models\\User', 1, '{\"attributes\": {\"id\": 1031, \"total\": 13000, \"remarks\": \"discount is given by doctor Naveera\", \"discount\": \"2000\", \"fc_number\": \"1023\", \"sub_total\": 15000, \"created_at\": \"2025-01-17 08:06:12\", \"patient_id\": 1036, \"updated_at\": \"2025-01-17 08:06:12\", \"file_number\": \"1021\", \"patient_type\": \"Regular Patient\", \"payment_mode\": \"Cash\"}}', NULL, '2025-01-17 08:06:12', '2025-01-17 08:06:12'),
(196, 'default', 'Created PaymentService', 'App\\Models\\PaymentService', NULL, 4, 'App\\Models\\User', 1, '{\"attributes\": {\"id\": 4, \"charges\": \"3500.00\", \"created_at\": \"2025-01-17 08:06:12\", \"payment_id\": 1031, \"updated_at\": \"2025-01-17 08:06:12\", \"service_name\": \"Ultrasound\", \"department_name\": \"Ultrasound\"}}', NULL, '2025-01-17 08:06:12', '2025-01-17 08:06:12'),
(197, 'default', 'Created PaymentService', 'App\\Models\\PaymentService', NULL, 5, 'App\\Models\\User', 1, '{\"attributes\": {\"id\": 5, \"charges\": \"3000.00\", \"created_at\": \"2025-01-17 08:06:12\", \"payment_id\": 1031, \"updated_at\": \"2025-01-17 08:06:12\", \"service_name\": \"AZIZ MOMBANI\", \"department_name\": \"ANALYSIS\"}}', NULL, '2025-01-17 08:06:12', '2025-01-17 08:06:12'),
(198, 'default', 'Created PaymentService', 'App\\Models\\PaymentService', NULL, 6, 'App\\Models\\User', 1, '{\"attributes\": {\"id\": 6, \"charges\": \"8500.00\", \"created_at\": \"2025-01-17 08:06:12\", \"payment_id\": 1031, \"updated_at\": \"2025-01-17 08:06:12\", \"service_name\": \"Ultrasound\", \"department_name\": \"Ultrasound\"}}', NULL, '2025-01-17 08:06:12', '2025-01-17 08:06:12'),
(199, 'default', 'Updated Payment', 'App\\Models\\Payment', NULL, 1009, 'App\\Models\\User', 1, '{\"old\": {\"id\": 1009, \"total\": \"4000.00\", \"closed\": 0, \"remarks\": null, \"discount\": \"0.00\", \"refunded\": 0, \"fc_number\": \"1009\", \"sub_total\": \"4000.00\", \"created_at\": \"2024-12-02T08:44:17.000000Z\", \"patient_id\": 1009, \"updated_at\": \"2024-12-02T08:44:17.000000Z\", \"doctor_name\": \"Dr Zaryab Setna\", \"file_number\": \"1007\", \"patient_type\": \"Regular Patient\", \"payment_mode\": \"Cash\", \"clinic_portion\": \"0.00\", \"doctor_charges\": \"4000.00\", \"doctor_portion\": \"100.00\", \"doctor_department_name\": \"Infertility/Gynaecology/Obstetrice\"}, \"attributes\": {\"refunded\": true, \"updated_at\": \"2025-01-17 08:06:52\"}}', NULL, '2025-01-17 08:06:52', '2025-01-17 08:06:52'),
(200, 'default', 'Created Payment', 'App\\Models\\Payment', NULL, 1032, 'App\\Models\\User', 1, '{\"attributes\": {\"id\": 1032, \"total\": 3000, \"remarks\": null, \"discount\": \"0\", \"fc_number\": \"1023\", \"sub_total\": \"3000.00\", \"created_at\": \"2025-01-17 08:08:07\", \"patient_id\": 1036, \"updated_at\": \"2025-01-17 08:08:07\", \"doctor_name\": \"Dr. Naveera\", \"file_number\": \"1021\", \"patient_type\": \"Regular Patient\", \"payment_mode\": \"Cash\", \"clinic_portion\": \"40.00\", \"doctor_charges\": \"3000.00\", \"doctor_portion\": \"60.00\", \"doctor_department_name\": \"Infertility/Gynaecology/Obstetrice\"}}', NULL, '2025-01-17 08:08:07', '2025-01-17 08:08:07'),
(201, 'default', 'Updated Payment', 'App\\Models\\Payment', NULL, 1006, 'App\\Models\\User', 1, '{\"old\": {\"id\": 1006, \"total\": \"4000.00\", \"closed\": 0, \"remarks\": null, \"discount\": \"0.00\", \"refunded\": 0, \"fc_number\": \"1006\", \"sub_total\": \"4000.00\", \"created_at\": \"2024-12-02T08:31:47.000000Z\", \"patient_id\": 1006, \"updated_at\": \"2024-12-02T08:31:47.000000Z\", \"doctor_name\": \"Dr Zaryab Setna\", \"file_number\": \"1004\", \"patient_type\": \"Regular Patient\", \"payment_mode\": \"Cash\", \"clinic_portion\": \"0.00\", \"doctor_charges\": \"4000.00\", \"doctor_portion\": \"100.00\", \"doctor_department_name\": \"Infertility/Gynaecology/Obstetrice\"}, \"attributes\": {\"refunded\": true, \"updated_at\": \"2025-01-17 08:08:36\"}}', NULL, '2025-01-17 08:08:36', '2025-01-17 08:08:36'),
(202, 'default', 'User logged in', NULL, NULL, NULL, 'App\\Models\\User', 1, '{\"ip\": \"72.255.9.74\", \"os\": \"Windows\", \"event\": \"login\", \"device\": \"Desktop\", \"browser\": \"Chrome\", \"location\": \"Karachi, Sindh, Pakistan\", \"user_agent\": \"Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/132.0.0.0 Safari/537.36\"}', NULL, '2025-01-18 14:55:40', '2025-01-18 14:55:40'),
(203, 'default', 'User logged in', NULL, NULL, NULL, 'App\\Models\\User', 1, '{\"ip\": \"72.255.9.74\", \"os\": \"Windows\", \"event\": \"login\", \"device\": \"Desktop\", \"browser\": \"Chrome\", \"location\": \"Karachi, Sindh, Pakistan\", \"user_agent\": \"Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/132.0.0.0 Safari/537.36\"}', NULL, '2025-01-20 10:53:48', '2025-01-20 10:53:48'),
(204, 'default', 'Updated Doctor', 'App\\Models\\Doctor', NULL, 1, 'App\\Models\\User', 1, '{\"old\": {\"id\": 1, \"dob\": \"1979-02-12\", \"sex\": \"Male\", \"cnic\": \"4101_-1924069-9\", \"name\": \"Dr Satna\", \"image\": \"doctors/x5cWi85MbknkyVnMDT7jGcQUggoh3kumAae0UUl3.jpg\", \"address\": \"sfdsf\", \"religion\": null, \"bank_name\": null, \"doctor_id\": \"1\", \"is_active\": 1, \"created_at\": \"2024-11-19T08:23:24.000000Z\", \"deleted_at\": null, \"specialist\": \"skin\", \"updated_at\": \"2024-12-10T12:05:33.000000Z\", \"payment_mode\": \"Cash\", \"account_title\": null, \"department_id\": null, \"account_number\": null, \"clinic_portion\": \"80.00\", \"contact_number\": \"(0300) 285-2247\", \"doctor_charges\": \"5000.00\", \"doctor_portion\": \"20.00\", \"marital_status\": \"Single\", \"date_of_appointment\": \"2024-11-19\", \"emergency_contact_name\": \"0202020000\", \"emergency_contact_number\": \"03002852241\", \"emergency_contact_relation\": \"00000000000\"}, \"attributes\": {\"cnic\": \"41011-9240699-1\", \"image\": \"doctors/XbMXUek9kcEWN1EAUg9iYnbqdNUcpizVTZPNoFUH.png\", \"updated_at\": \"2025-01-20 11:08:01\", \"department_id\": \"3\", \"clinic_portion\": \"80\", \"emergency_contact_number\": \"(0330) 028-5224\"}}', NULL, '2025-01-20 11:08:01', '2025-01-20 11:08:01'),
(205, 'default', 'Created Qualification', 'App\\Models\\Qualification', NULL, 10, 'App\\Models\\User', 1, '{\"attributes\": {\"id\": 10, \"degree\": \"MBBS\", \"majors\": \"Medicen\", \"doctor_id\": 1, \"created_at\": \"2025-01-20 11:08:01\", \"updated_at\": \"2025-01-20 11:08:01\", \"institution\": \"Dawo\"}}', NULL, '2025-01-20 11:08:01', '2025-01-20 11:08:01'),
(206, 'default', 'Created Experience', 'App\\Models\\Experience', NULL, 8, 'App\\Models\\User', 1, '{\"attributes\": {\"id\": 8, \"end_date\": \"2024-11-19\", \"doctor_id\": 1, \"created_at\": \"2025-01-20 11:08:01\", \"start_date\": \"2024-11-05\", \"updated_at\": \"2025-01-20 11:08:01\", \"designation\": \"head of skin\", \"last_employer\": \"Down Medican\"}}', NULL, '2025-01-20 11:08:01', '2025-01-20 11:08:01'),
(207, 'default', 'Updated Doctor', 'App\\Models\\Doctor', NULL, 2, 'App\\Models\\User', 1, '{\"old\": {\"id\": 2, \"dob\": \"2010-02-10\", \"sex\": \"Female\", \"cnic\": \"52644-4440525-5\", \"name\": \"Dr. Naveera\", \"image\": null, \"address\": \"Karachi\", \"religion\": \"Islam\", \"bank_name\": null, \"doctor_id\": \"1005\", \"is_active\": 1, \"created_at\": \"2024-12-01T18:00:08.000000Z\", \"deleted_at\": null, \"specialist\": \"Infertility\", \"updated_at\": \"2024-12-05T07:59:13.000000Z\", \"payment_mode\": \"Cash\", \"account_title\": null, \"department_id\": 3, \"account_number\": null, \"clinic_portion\": \"40.00\", \"contact_number\": \"(0333) 256-5895\", \"doctor_charges\": \"3000.00\", \"doctor_portion\": \"60.00\", \"marital_status\": \"Married\", \"date_of_appointment\": \"2002-05-07\", \"emergency_contact_name\": \"Asx\", \"emergency_contact_number\": \"1468466444\", \"emergency_contact_relation\": \"sadef\"}, \"attributes\": {\"is_active\": false, \"updated_at\": \"2025-01-20 12:15:08\"}}', NULL, '2025-01-20 12:15:08', '2025-01-20 12:15:08'),
(208, 'default', 'Updated Doctor', 'App\\Models\\Doctor', NULL, 2, 'App\\Models\\User', 1, '{\"old\": {\"id\": 2, \"dob\": \"2010-02-10\", \"sex\": \"Female\", \"cnic\": \"52644-4440525-5\", \"name\": \"Dr. Naveera\", \"image\": null, \"address\": \"Karachi\", \"religion\": \"Islam\", \"bank_name\": null, \"doctor_id\": \"1005\", \"is_active\": 0, \"created_at\": \"2024-12-01T18:00:08.000000Z\", \"deleted_at\": null, \"specialist\": \"Infertility\", \"updated_at\": \"2025-01-20T12:15:08.000000Z\", \"payment_mode\": \"Cash\", \"account_title\": null, \"department_id\": 3, \"account_number\": null, \"clinic_portion\": \"40.00\", \"contact_number\": \"(0333) 256-5895\", \"doctor_charges\": \"3000.00\", \"doctor_portion\": \"60.00\", \"marital_status\": \"Married\", \"date_of_appointment\": \"2002-05-07\", \"emergency_contact_name\": \"Asx\", \"emergency_contact_number\": \"1468466444\", \"emergency_contact_relation\": \"sadef\"}, \"attributes\": {\"is_active\": true, \"updated_at\": \"2025-01-20 12:15:09\"}}', NULL, '2025-01-20 12:15:09', '2025-01-20 12:15:09'),
(209, 'default', 'User logged in', NULL, NULL, NULL, 'App\\Models\\User', 1, '{\"ip\": \"103.7.61.61\", \"os\": \"Windows\", \"event\": \"login\", \"device\": \"Desktop\", \"browser\": \"Chrome\", \"location\": \"Karachi, Sindh, Pakistan\", \"user_agent\": \"Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36\"}', NULL, '2025-01-21 18:56:41', '2025-01-21 18:56:41'),
(210, 'default', 'Created Payment', 'App\\Models\\Payment', NULL, 1033, 'App\\Models\\User', 1, '{\"attributes\": {\"id\": 1033, \"total\": 4000, \"remarks\": null, \"discount\": \"0\", \"fc_number\": \"1001\", \"sub_total\": \"4000.00\", \"created_at\": \"2025-01-21 18:58:56\", \"patient_id\": 1001, \"updated_at\": \"2025-01-21 18:58:56\", \"doctor_name\": \"Dr Zaryab Setna\", \"file_number\": \"1001\", \"patient_type\": \"Regular Patient\", \"payment_mode\": \"Cash\", \"clinic_portion\": \"0.00\", \"doctor_charges\": \"4000.00\", \"doctor_portion\": \"100.00\", \"doctor_department_name\": \"Infertility/Gynaecology/Obstetrice\"}}', NULL, '2025-01-21 18:58:56', '2025-01-21 18:58:56'),
(211, 'default', 'Deleted Service', 'App\\Models\\Service', NULL, 7, 'App\\Models\\User', 1, '{\"attributes\": {\"id\": 7, \"name\": \"MINAL\", \"charges\": \"4000.00\", \"created_at\": \"2025-01-14T11:23:02.000000Z\", \"updated_at\": \"2025-01-14T11:23:02.000000Z\", \"department_id\": 7}}', NULL, '2025-01-21 19:04:52', '2025-01-21 19:04:52'),
(212, 'default', 'Created Department', 'App\\Models\\Department', NULL, 13, 'App\\Models\\User', 1, '{\"attributes\": {\"id\": 13, \"name\": \"OT DAY CARE\", \"sequence\": \"12\", \"created_at\": \"2025-01-21 19:36:11\", \"updated_at\": \"2025-01-21 19:36:11\"}}', NULL, '2025-01-21 19:36:11', '2025-01-21 19:36:11'),
(213, 'default', 'User logged in', NULL, NULL, NULL, 'App\\Models\\User', 1, '{\"ip\": \"72.255.9.74\", \"os\": \"Windows\", \"event\": \"login\", \"device\": \"Desktop\", \"browser\": \"Chrome\", \"location\": \"Karachi, Sindh, Pakistan\", \"user_agent\": \"Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/132.0.0.0 Safari/537.36\"}', NULL, '2025-01-22 05:01:44', '2025-01-22 05:01:44'),
(214, 'default', 'Created Payment', 'App\\Models\\Payment', NULL, 1034, 'App\\Models\\User', 1, '{\"attributes\": {\"id\": 1034, \"total\": 5500, \"remarks\": \"500 discount given by doctor\", \"discount\": \"500\", \"fc_number\": \"1033\", \"sub_total\": 6000, \"created_at\": \"2025-01-22 05:02:45\", \"patient_id\": 1046, \"updated_at\": \"2025-01-22 05:02:45\", \"file_number\": \"1031\", \"patient_type\": \"Regular Patient\", \"payment_mode\": \"CC\"}}', NULL, '2025-01-22 05:02:45', '2025-01-22 05:02:45'),
(215, 'default', 'Created PaymentService', 'App\\Models\\PaymentService', NULL, 7, 'App\\Models\\User', 1, '{\"attributes\": {\"id\": 7, \"charges\": \"3000.00\", \"created_at\": \"2025-01-22 05:02:45\", \"payment_id\": 1034, \"updated_at\": \"2025-01-22 05:02:45\", \"service_name\": \"ALISHA IIS\", \"department_name\": \"Laboratory\"}}', NULL, '2025-01-22 05:02:45', '2025-01-22 05:02:45'),
(216, 'default', 'Created PaymentService', 'App\\Models\\PaymentService', NULL, 8, 'App\\Models\\User', 1, '{\"attributes\": {\"id\": 8, \"charges\": \"3000.00\", \"created_at\": \"2025-01-22 05:02:45\", \"payment_id\": 1034, \"updated_at\": \"2025-01-22 05:02:45\", \"service_name\": \"Semen Analysis\", \"department_name\": \"Laboratory\"}}', NULL, '2025-01-22 05:02:45', '2025-01-22 05:02:45'),
(217, 'default', 'Created Payment', 'App\\Models\\Payment', NULL, 1035, 'App\\Models\\User', 1, '{\"attributes\": {\"id\": 1035, \"total\": 90000, \"remarks\": \"5000 discount\", \"discount\": \"5000\", \"fc_number\": \"1033\", \"sub_total\": 95000, \"created_at\": \"2025-01-22 05:04:46\", \"patient_id\": 1046, \"updated_at\": \"2025-01-22 05:04:46\", \"file_number\": \"1031\", \"patient_type\": \"Regular Patient\", \"payment_mode\": \"CC\"}}', NULL, '2025-01-22 05:04:46', '2025-01-22 05:04:46'),
(218, 'default', 'Created PaymentService', 'App\\Models\\PaymentService', NULL, 9, 'App\\Models\\User', 1, '{\"attributes\": {\"id\": 9, \"charges\": \"15000.00\", \"created_at\": \"2025-01-22 05:04:46\", \"payment_id\": 1035, \"updated_at\": \"2025-01-22 05:04:46\", \"service_name\": \"Hair Prp\", \"department_name\": \"Clinic Coordinators\"}}', NULL, '2025-01-22 05:04:46', '2025-01-22 05:04:46'),
(219, 'default', 'Created PaymentService', 'App\\Models\\PaymentService', NULL, 10, 'App\\Models\\User', 1, '{\"attributes\": {\"id\": 10, \"charges\": \"80000.00\", \"created_at\": \"2025-01-22 05:04:46\", \"payment_id\": 1035, \"updated_at\": \"2025-01-22 05:04:46\", \"service_name\": \"Test Services\", \"department_name\": \"Endocrinology\"}}', NULL, '2025-01-22 05:04:46', '2025-01-22 05:04:46'),
(220, 'default', 'User logged in', NULL, NULL, NULL, 'App\\Models\\User', 1, '{\"ip\": \"202.47.36.226\", \"os\": \"Windows\", \"event\": \"login\", \"device\": \"Desktop\", \"browser\": \"Chrome\", \"location\": \"Karachi, Sindh, Pakistan\", \"user_agent\": \"Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/132.0.0.0 Safari/537.36 Edg/132.0.0.0\"}', NULL, '2025-01-22 06:22:57', '2025-01-22 06:22:57'),
(221, 'default', 'Updated Department', 'App\\Models\\Department', NULL, 10, 'App\\Models\\User', 1, '{\"old\": {\"id\": 10, \"name\": \"ANALYSIS\", \"sequence\": 7, \"created_at\": \"2024-12-02T05:42:27.000000Z\", \"updated_at\": \"2024-12-02T05:42:27.000000Z\"}, \"attributes\": {\"sequence\": \"1\", \"updated_at\": \"2025-01-22 06:33:53\"}}', NULL, '2025-01-22 06:33:53', '2025-01-22 06:33:53'),
(222, 'default', 'Created Service', 'App\\Models\\Service', NULL, 13, 'App\\Models\\User', 1, '{\"attributes\": {\"id\": 13, \"name\": \"FWB\", \"charges\": \"4000\", \"created_at\": \"2025-01-22 06:48:37\", \"updated_at\": \"2025-01-22 06:48:37\", \"department_id\": \"7\"}}', NULL, '2025-01-22 06:48:37', '2025-01-22 06:48:37'),
(223, 'default', 'Created Payment', 'App\\Models\\Payment', NULL, 1036, 'App\\Models\\User', 1, '{\"attributes\": {\"id\": 1036, \"total\": 4000, \"remarks\": null, \"discount\": \"0\", \"fc_number\": \"1032\", \"sub_total\": 4000, \"created_at\": \"2025-01-22 06:51:05\", \"patient_id\": 1045, \"updated_at\": \"2025-01-22 06:51:05\", \"file_number\": \"1030\", \"patient_type\": \"Regular Patient\", \"payment_mode\": \"CC\"}}', NULL, '2025-01-22 06:51:05', '2025-01-22 06:51:05'),
(224, 'default', 'Created PaymentService', 'App\\Models\\PaymentService', NULL, 11, 'App\\Models\\User', 1, '{\"attributes\": {\"id\": 11, \"charges\": \"4000.00\", \"created_at\": \"2025-01-22 06:51:05\", \"payment_id\": 1036, \"updated_at\": \"2025-01-22 06:51:05\", \"service_name\": \"FWB\", \"department_name\": \"Ultrasound\"}}', NULL, '2025-01-22 06:51:05', '2025-01-22 06:51:05'),
(225, 'default', 'User logged in', NULL, NULL, NULL, 'App\\Models\\User', 1, '{\"ip\": \"72.255.9.74\", \"os\": \"Windows\", \"event\": \"login\", \"device\": \"Desktop\", \"browser\": \"Chrome\", \"location\": \"Karachi, Sindh, Pakistan\", \"user_agent\": \"Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/132.0.0.0 Safari/537.36\"}', NULL, '2025-01-24 09:59:49', '2025-01-24 09:59:49'),
(226, 'default', 'Created Doctor', 'App\\Models\\Doctor', NULL, 6, 'App\\Models\\User', 1, '{\"attributes\": {\"id\": 6, \"dob\": \"1990-09-24\", \"sex\": \"Male\", \"cnic\": \"99999-9999999-1\", \"name\": \"TEST Doctor\", \"address\": \"Karachi\", \"religion\": \"Islam\", \"bank_name\": null, \"doctor_id\": \"100302\", \"created_at\": \"2025-01-24 10:18:35\", \"specialist\": \"Ultrasound\", \"updated_at\": \"2025-01-24 10:18:35\", \"payment_mode\": \"Cash\", \"account_title\": null, \"department_id\": \"7\", \"account_number\": null, \"clinic_portion\": \"50\", \"contact_number\": \"(0366) 666-6666\", \"doctor_charges\": \"3000\", \"doctor_portion\": \"50\", \"marital_status\": \"Single\", \"date_of_appointment\": \"2016-10-10\", \"emergency_contact_name\": \"Asiya\", \"emergency_contact_number\": \"(0333) 333-3333\", \"emergency_contact_relation\": \"Father\"}}', NULL, '2025-01-24 10:18:35', '2025-01-24 10:18:35'),
(227, 'default', 'Created Qualification', 'App\\Models\\Qualification', NULL, 11, 'App\\Models\\User', 1, '{\"attributes\": {\"id\": 11, \"degree\": \"MBBS\", \"majors\": \"Ultrasonic\", \"doctor_id\": 6, \"created_at\": \"2025-01-24 10:18:35\", \"updated_at\": \"2025-01-24 10:18:35\", \"institution\": \"KMS\"}}', NULL, '2025-01-24 10:18:35', '2025-01-24 10:18:35'),
(228, 'default', 'Created Experience', 'App\\Models\\Experience', NULL, 9, 'App\\Models\\User', 1, '{\"attributes\": {\"id\": 9, \"end_date\": \"1111-01-01\", \"doctor_id\": 6, \"created_at\": \"2025-01-24 10:18:35\", \"start_date\": \"1111-01-01\", \"updated_at\": \"2025-01-24 10:18:35\", \"designation\": \"Doctor\", \"last_employer\": \"Liaquat Hospital\"}}', NULL, '2025-01-24 10:18:35', '2025-01-24 10:18:35'),
(229, 'default', 'Created Payment', 'App\\Models\\Payment', NULL, 1037, 'App\\Models\\User', 1, '{\"attributes\": {\"id\": 1037, \"total\": 2500, \"remarks\": \"Card payment done\", \"discount\": \"500\", \"fc_number\": \"1033\", \"sub_total\": \"3000.00\", \"created_at\": \"2025-01-24 10:59:26\", \"patient_id\": 1046, \"updated_at\": \"2025-01-24 10:59:26\", \"doctor_name\": \"Dr. Naveera\", \"file_number\": \"1031\", \"patient_type\": \"Regular Patient\", \"payment_mode\": \"CC\", \"clinic_portion\": \"40.00\", \"doctor_charges\": \"3000.00\", \"doctor_portion\": \"60.00\", \"doctor_department_name\": \"Infertility/Gynaecology/Obstetrice\"}}', NULL, '2025-01-24 10:59:26', '2025-01-24 10:59:26'),
(230, 'default', 'Created Payment', 'App\\Models\\Payment', NULL, 1038, 'App\\Models\\User', 1, '{\"attributes\": {\"id\": 1038, \"total\": 1000, \"remarks\": null, \"discount\": \"2000\", \"fc_number\": \"1033\", \"sub_total\": \"3000.00\", \"created_at\": \"2025-01-24 11:00:13\", \"patient_id\": 1046, \"updated_at\": \"2025-01-24 11:00:13\", \"doctor_name\": \"Dr. Naveera\", \"file_number\": \"1031\", \"patient_type\": \"Regular Patient\", \"payment_mode\": \"Cash\", \"clinic_portion\": \"40.00\", \"doctor_charges\": \"3000.00\", \"doctor_portion\": \"60.00\", \"doctor_department_name\": \"Infertility/Gynaecology/Obstetrice\"}}', NULL, '2025-01-24 11:00:13', '2025-01-24 11:00:13'),
(231, 'default', 'Updated User', 'App\\Models\\User', NULL, 1, 'App\\Models\\User', 1, '{\"old\": {\"id\": 1, \"name\": \"Admin\", \"email\": \"admin@themesbrand.com\", \"image\": null, \"password\": \"$2y$10$lC9z9FNo7I4aAwxWSnHqq.RNyCnSsNtWsEG.t.ocrXcSRDnPQFlbO\", \"is_active\": 1, \"created_at\": \"2024-11-12T15:35:11.000000Z\", \"updated_at\": null, \"remember_token\": \"fbAHxBWXSxTgtjc5GG52HfXpRKkrfIKNXhVLFxmcRUvFrgGHIcHpXdhfeNAU\", \"google2fa_secret\": null, \"email_2fa_enabled\": null, \"email_verified_at\": null}, \"attributes\": {\"remember_token\": \"YFxcjUwNV13s5UwOuDSYJSNyauNhLLZNzS7jhmLKYqjnS7QCILHmxZj8uv2e\"}}', NULL, '2025-01-24 11:31:35', '2025-01-24 11:31:35'),
(232, 'default', 'User logged out', NULL, NULL, NULL, 'App\\Models\\User', 1, '{\"ip\": \"72.255.9.74\", \"os\": \"Windows\", \"device\": \"Desktop\", \"browser\": \"Chrome\", \"location\": \"Karachi, Sindh, Pakistan\", \"user_agent\": \"Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/132.0.0.0 Safari/537.36\"}', NULL, '2025-01-24 11:31:36', '2025-01-24 11:31:36'),
(233, 'default', 'User logged in', NULL, NULL, NULL, 'App\\Models\\User', 1, '{\"ip\": \"202.47.36.226\", \"os\": \"Windows\", \"event\": \"login\", \"device\": \"Desktop\", \"browser\": \"Chrome\", \"location\": \"Karachi, Sindh, Pakistan\", \"user_agent\": \"Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/133.0.0.0 Safari/537.36 Edg/133.0.0.0\"}', NULL, '2025-02-18 08:25:58', '2025-02-18 08:25:58'),
(234, 'default', 'User logged in', NULL, NULL, NULL, 'App\\Models\\User', 1, '{\"ip\": \"202.47.36.226\", \"os\": \"Windows\", \"event\": \"login\", \"device\": \"Desktop\", \"browser\": \"Chrome\", \"location\": \"Karachi, Sindh, Pakistan\", \"user_agent\": \"Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/133.0.0.0 Safari/537.36 Edg/133.0.0.0\"}', NULL, '2025-02-19 05:56:46', '2025-02-19 05:56:46'),
(235, 'default', 'User logged in', NULL, NULL, NULL, 'App\\Models\\User', 1, '{\"ip\": \"202.47.36.226\", \"os\": \"Windows\", \"event\": \"login\", \"device\": \"Desktop\", \"browser\": \"Chrome\", \"location\": \"Karachi, Sindh, Pakistan\", \"user_agent\": \"Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/133.0.0.0 Safari/537.36 Edg/133.0.0.0\"}', NULL, '2025-02-23 04:12:10', '2025-02-23 04:12:10'),
(236, 'default', 'User logged in', NULL, NULL, NULL, 'App\\Models\\User', 1, '{\"ip\": \"72.255.9.74\", \"os\": \"Windows\", \"event\": \"login\", \"device\": \"Desktop\", \"browser\": \"Chrome\", \"location\": \"Karachi, Sindh, Pakistan\", \"user_agent\": \"Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/133.0.0.0 Safari/537.36\"}', NULL, '2025-02-28 15:17:49', '2025-02-28 15:17:49');
INSERT INTO `activity_log` (`id`, `log_name`, `description`, `subject_type`, `event`, `subject_id`, `causer_type`, `causer_id`, `properties`, `batch_uuid`, `created_at`, `updated_at`) VALUES
(237, 'default', 'Updated User', 'App\\Models\\User', NULL, 1, 'App\\Models\\User', 1, '{\"old\": {\"id\": 1, \"name\": \"Admin\", \"email\": \"admin@themesbrand.com\", \"image\": null, \"password\": \"$2y$10$lC9z9FNo7I4aAwxWSnHqq.RNyCnSsNtWsEG.t.ocrXcSRDnPQFlbO\", \"is_active\": 1, \"created_at\": \"2024-11-12T15:35:11.000000Z\", \"updated_at\": null, \"remember_token\": \"YFxcjUwNV13s5UwOuDSYJSNyauNhLLZNzS7jhmLKYqjnS7QCILHmxZj8uv2e\", \"google2fa_secret\": null, \"email_2fa_enabled\": null, \"email_verified_at\": null}, \"attributes\": {\"remember_token\": \"BhzzFJVeI9uYThVWdenDLa4KyAS6EaezYluW53USHleAY5IQG3sJuBlQx1WI\"}}', NULL, '2025-02-28 16:23:29', '2025-02-28 16:23:29'),
(238, 'default', 'User logged out', NULL, NULL, NULL, 'App\\Models\\User', 1, '{\"ip\": \"72.255.9.74\", \"os\": \"Windows\", \"device\": \"Desktop\", \"browser\": \"Chrome\", \"location\": \"Karachi, Sindh, Pakistan\", \"user_agent\": \"Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/133.0.0.0 Safari/537.36\"}', NULL, '2025-02-28 16:23:30', '2025-02-28 16:23:30'),
(239, 'default', 'User logged in', NULL, NULL, NULL, 'App\\Models\\User', 1, '{\"ip\": \"72.255.9.74\", \"os\": \"Windows\", \"event\": \"login\", \"device\": \"Desktop\", \"browser\": \"Chrome\", \"location\": \"Karachi, Sindh, Pakistan\", \"user_agent\": \"Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/133.0.0.0 Safari/537.36\"}', NULL, '2025-02-28 16:23:32', '2025-02-28 16:23:32'),
(240, 'default', 'User logged in', NULL, NULL, NULL, 'App\\Models\\User', 1, '{\"ip\": \"2400:adc1:168:d300:58a:c045:386d:41a6\", \"os\": \"Windows\", \"event\": \"login\", \"device\": \"Desktop\", \"browser\": \"Chrome\", \"location\": \"Karachi, Sindh, Pakistan\", \"user_agent\": \"Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36 Edg/134.0.0.0\"}', NULL, '2025-03-11 06:34:02', '2025-03-11 06:34:02'),
(241, 'default', 'User logged in', NULL, NULL, NULL, 'App\\Models\\User', 1, '{\"ip\": \"202.47.36.226\", \"os\": \"Windows\", \"event\": \"login\", \"device\": \"Desktop\", \"browser\": \"Chrome\", \"location\": \"Karachi, Sindh, Pakistan\", \"user_agent\": \"Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36\"}', NULL, '2025-03-17 10:19:45', '2025-03-17 10:19:45'),
(242, 'default', 'User logged in', NULL, NULL, NULL, 'App\\Models\\User', 1, '{\"ip\": \"2400:adc1:168:d300:349e:ae2c:91cc:ebee\", \"os\": \"Windows\", \"event\": \"login\", \"device\": \"Desktop\", \"browser\": \"Chrome\", \"location\": \"Karachi, Sindh, Pakistan\", \"user_agent\": \"Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36 Edg/134.0.0.0\"}', NULL, '2025-03-17 10:24:07', '2025-03-17 10:24:07'),
(243, 'default', 'User logged in', NULL, NULL, NULL, 'App\\Models\\User', 1, '{\"ip\": \"72.255.9.74\", \"os\": \"Windows\", \"event\": \"login\", \"device\": \"Desktop\", \"browser\": \"Chrome\", \"location\": \"Karachi, Sindh, Pakistan\", \"user_agent\": \"Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36\"}', NULL, '2025-03-24 06:24:42', '2025-03-24 06:24:42'),
(244, 'default', 'Created Payment', 'App\\Models\\Payment', NULL, 1039, 'App\\Models\\User', 1, '{\"attributes\": {\"id\": 1039, \"total\": 83000, \"remarks\": null, \"discount\": \"0\", \"fc_number\": \"1023\", \"sub_total\": 83000, \"created_at\": \"2025-03-24 06:27:16\", \"patient_id\": 1036, \"updated_at\": \"2025-03-24 06:27:16\", \"file_number\": \"1021\", \"patient_type\": \"Regular Patient\", \"payment_mode\": \"Cash\"}}', NULL, '2025-03-24 06:27:16', '2025-03-24 06:27:16'),
(245, 'default', 'Created PaymentService', 'App\\Models\\PaymentService', NULL, 12, 'App\\Models\\User', 1, '{\"attributes\": {\"id\": 12, \"charges\": \"3000.00\", \"created_at\": \"2025-03-24 06:27:16\", \"payment_id\": 1039, \"updated_at\": \"2025-03-24 06:27:16\", \"service_name\": \"ALISHA IIS\", \"department_name\": \"Laboratory\"}}', NULL, '2025-03-24 06:27:16', '2025-03-24 06:27:16'),
(246, 'default', 'Created PaymentService', 'App\\Models\\PaymentService', NULL, 13, 'App\\Models\\User', 1, '{\"attributes\": {\"id\": 13, \"charges\": \"80000.00\", \"created_at\": \"2025-03-24 06:27:16\", \"payment_id\": 1039, \"updated_at\": \"2025-03-24 06:27:16\", \"service_name\": \"Test Services\", \"department_name\": \"Endocrinology\"}}', NULL, '2025-03-24 06:27:16', '2025-03-24 06:27:16'),
(247, 'default', 'Created Payment', 'App\\Models\\Payment', NULL, 1040, 'App\\Models\\User', 1, '{\"attributes\": {\"id\": 1040, \"total\": 3000, \"remarks\": null, \"discount\": \"0\", \"fc_number\": \"1023\", \"sub_total\": \"3000.00\", \"created_at\": \"2025-03-24 06:29:01\", \"patient_id\": 1036, \"updated_at\": \"2025-03-24 06:29:01\", \"doctor_name\": \"Dr. Naveera\", \"file_number\": \"1021\", \"patient_type\": \"Regular Patient\", \"payment_mode\": \"Cash\", \"clinic_portion\": \"40.00\", \"doctor_charges\": \"3000.00\", \"doctor_portion\": \"60.00\", \"doctor_department_name\": \"Infertility/Gynaecology/Obstetrice\"}}', NULL, '2025-03-24 06:29:01', '2025-03-24 06:29:01'),
(248, 'default', 'User logged in', NULL, NULL, NULL, 'App\\Models\\User', 1, '{\"ip\": \"202.47.36.226\", \"os\": \"Windows\", \"event\": \"login\", \"device\": \"Desktop\", \"browser\": \"Chrome\", \"location\": \"Karachi, Sindh, Pakistan\", \"user_agent\": \"Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36\"}', NULL, '2025-03-24 06:36:46', '2025-03-24 06:36:46'),
(249, 'default', 'Created Patient', 'App\\Models\\Patient', NULL, 1060, 'App\\Models\\User', 1, '{\"attributes\": {\"id\": 1060, \"note\": null, \"type\": \"Free Consultancy\", \"doctor_id\": null, \"fc_number\": 1047, \"created_at\": \"2025-03-24 06:39:08\", \"spouse_dob\": \"2025-03-24\", \"updated_at\": \"2025-03-24 06:39:08\", \"file_number\": null, \"patient_dob\": \"2025-03-24\", \"spouse_cnic\": null, \"spouse_name\": \"Alam\", \"patient_cnic\": \"65444-4444444-4\", \"patient_name\": \"ABC Patient\", \"spouse_address\": null, \"spouse_contact\": null, \"patient_address\": null, \"patient_contact\": \"(0322) 222-2222\", \"how_did_you_know\": \"Social Media\", \"spouse_occupation\": null, \"patient_occupation\": null, \"doctor_coordinator_id\": \"1\", \"emergency_contact_number\": \"(0333) 333-3333\", \"emergency_contact_person\": \"03405550117\", \"emergency_contact_relation\": \"Father\"}}', NULL, '2025-03-24 06:39:08', '2025-03-24 06:39:08'),
(250, 'default', 'Updated Patient', 'App\\Models\\Patient', NULL, 1060, 'App\\Models\\User', 1, '{\"old\": {\"id\": 1060, \"note\": null, \"type\": \"Free Consultancy\", \"doctor_id\": null, \"fc_number\": \"1047\", \"created_at\": \"2025-03-24T06:39:08.000000Z\", \"deleted_at\": null, \"spouse_dob\": \"2025-03-24\", \"updated_at\": \"2025-03-24T06:39:08.000000Z\", \"file_number\": null, \"patient_dob\": \"2025-03-24\", \"spouse_cnic\": null, \"spouse_name\": \"Alam\", \"patient_cnic\": \"65444-4444444-4\", \"patient_name\": \"ABC Patient\", \"spouse_address\": null, \"spouse_contact\": null, \"patient_address\": null, \"patient_contact\": \"(0322) 222-2222\", \"how_did_you_know\": \"Social Media\", \"spouse_occupation\": null, \"patient_occupation\": null, \"doctor_coordinator_id\": 1, \"emergency_contact_number\": \"(0333) 333-3333\", \"emergency_contact_person\": \"03405550117\", \"emergency_contact_relation\": \"Father\"}, \"attributes\": {\"type\": \"Regular Patient\", \"doctor_id\": \"3\", \"updated_at\": \"2025-03-24 06:40:12\", \"file_number\": 1045}}', NULL, '2025-03-24 06:40:12', '2025-03-24 06:40:12'),
(251, 'default', 'Created Payment', 'App\\Models\\Payment', NULL, 1041, 'App\\Models\\User', 1, '{\"attributes\": {\"id\": 1041, \"total\": 4000, \"remarks\": null, \"discount\": \"500\", \"fc_number\": \"1047\", \"sub_total\": \"4500.00\", \"created_at\": \"2025-03-24 06:40:27\", \"patient_id\": 1060, \"updated_at\": \"2025-03-24 06:40:27\", \"doctor_name\": \"Dr Iqbal Shahzad\", \"file_number\": \"1045\", \"patient_type\": \"Regular Patient\", \"payment_mode\": \"Online\", \"clinic_portion\": \"45.00\", \"doctor_charges\": \"4500.00\", \"doctor_portion\": \"55.00\", \"doctor_department_name\": \"Urology\"}}', NULL, '2025-03-24 06:40:27', '2025-03-24 06:40:27'),
(252, 'default', 'Updated Payment', 'App\\Models\\Payment', NULL, 1041, 'App\\Models\\User', 1, '{\"old\": {\"id\": 1041, \"total\": \"4000.00\", \"closed\": 0, \"remarks\": null, \"discount\": \"500.00\", \"refunded\": 0, \"fc_number\": \"1047\", \"sub_total\": \"4500.00\", \"created_at\": \"2025-03-24T06:40:27.000000Z\", \"patient_id\": 1060, \"updated_at\": \"2025-03-24T06:40:27.000000Z\", \"doctor_name\": \"Dr Iqbal Shahzad\", \"file_number\": \"1045\", \"patient_type\": \"Regular Patient\", \"payment_mode\": \"Online\", \"clinic_portion\": \"45.00\", \"doctor_charges\": \"4500.00\", \"doctor_portion\": \"55.00\", \"doctor_department_name\": \"Urology\"}, \"attributes\": {\"refunded\": true, \"updated_at\": \"2025-03-24 06:42:12\"}}', NULL, '2025-03-24 06:42:12', '2025-03-24 06:42:12'),
(253, 'default', 'User logged in', NULL, NULL, NULL, 'App\\Models\\User', 1, '{\"ip\": \"2400:adc1:168:d300:29c7:14ef:525a:cec8\", \"os\": \"Windows\", \"event\": \"login\", \"device\": \"Desktop\", \"browser\": \"Chrome\", \"location\": \"Karachi, Sindh, Pakistan\", \"user_agent\": \"Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36 Edg/134.0.0.0\"}', NULL, '2025-03-24 06:59:54', '2025-03-24 06:59:54'),
(254, 'default', 'Created Department', 'App\\Models\\Department', NULL, 14, 'App\\Models\\User', 1, '{\"attributes\": {\"id\": 14, \"name\": \"Test Department 24 Mar\", \"sequence\": \"25\", \"created_at\": \"2025-03-24 07:35:10\", \"updated_at\": \"2025-03-24 07:35:10\"}}', NULL, '2025-03-24 07:35:10', '2025-03-24 07:35:10'),
(255, 'default', 'Created Service', 'App\\Models\\Service', NULL, 14, 'App\\Models\\User', 1, '{\"attributes\": {\"id\": 14, \"name\": \"Test Service 24 Mar\", \"charges\": \"2000\", \"created_at\": \"2025-03-24 07:36:43\", \"updated_at\": \"2025-03-24 07:36:43\", \"department_id\": \"14\"}}', NULL, '2025-03-24 07:36:43', '2025-03-24 07:36:43'),
(256, 'default', 'Deleted Department', 'App\\Models\\Department', NULL, 12, 'App\\Models\\User', 1, '{\"attributes\": {\"id\": 12, \"name\": \"TEST DEPARTMENT\", \"sequence\": 1, \"created_at\": \"2025-01-17T07:23:02.000000Z\", \"updated_at\": \"2025-01-17T07:23:02.000000Z\"}}', NULL, '2025-03-24 07:36:59', '2025-03-24 07:36:59'),
(257, 'default', 'Deleted Service', 'App\\Models\\Service', NULL, 12, 'App\\Models\\User', 1, '{\"attributes\": {\"id\": 12, \"name\": \"Ultrasound\", \"charges\": \"8500.00\", \"created_at\": \"2025-01-17T07:24:12.000000Z\", \"updated_at\": \"2025-01-17T07:24:12.000000Z\", \"department_id\": 7}}', NULL, '2025-03-24 07:37:12', '2025-03-24 07:37:12'),
(258, 'default', 'Created Payment', 'App\\Models\\Payment', NULL, 1042, 'App\\Models\\User', 1, '{\"attributes\": {\"id\": 1042, \"total\": 4500, \"remarks\": null, \"discount\": \"0\", \"fc_number\": \"1047\", \"sub_total\": \"4500.00\", \"created_at\": \"2025-03-24 08:53:34\", \"patient_id\": 1060, \"updated_at\": \"2025-03-24 08:53:34\", \"doctor_name\": \"Dr Iqbal Shahzad\", \"file_number\": \"1045\", \"patient_type\": \"Regular Patient\", \"payment_mode\": \"Cash\", \"clinic_portion\": \"45.00\", \"doctor_charges\": \"4500.00\", \"doctor_portion\": \"55.00\", \"doctor_department_name\": \"Urology\"}}', NULL, '2025-03-24 08:53:34', '2025-03-24 08:53:34'),
(259, 'default', 'User logged in', NULL, NULL, NULL, 'App\\Models\\User', 1, '{\"ip\": \"72.255.9.74\", \"os\": \"Windows\", \"event\": \"login\", \"device\": \"Desktop\", \"browser\": \"Chrome\", \"location\": \"Karachi, Sindh, Pakistan\", \"user_agent\": \"Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36\"}', NULL, '2025-03-26 09:53:12', '2025-03-26 09:53:12');

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sequence` int UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`id`, `name`, `sequence`, `created_at`, `updated_at`) VALUES
(3, 'Infertility/Gynaecology/Obstetrice', 1, '2024-12-01 17:48:24', '2024-12-01 17:48:24'),
(4, 'Urology', 2, '2024-12-01 17:48:42', '2024-12-01 17:48:42'),
(5, 'Endocrinology', 3, '2024-12-01 17:48:58', '2024-12-01 17:48:58'),
(6, 'Clinic Coordinators', 4, '2024-12-01 17:49:11', '2024-12-01 17:49:11'),
(7, 'Ultrasound', 5, '2024-12-01 17:49:20', '2024-12-01 17:49:41'),
(8, 'Laboratory', 6, '2024-12-01 17:53:11', '2024-12-01 17:53:11'),
(10, 'ANALYSIS', 1, '2024-12-02 05:42:27', '2025-01-22 06:33:53'),
(13, 'OT DAY CARE', 12, '2025-01-21 19:36:11', '2025-01-21 19:36:11'),
(14, 'Test Department 24 Mar', 25, '2025-03-24 07:35:10', '2025-03-24 07:35:10');

-- --------------------------------------------------------

--
-- Table structure for table `doctors`
--

CREATE TABLE `doctors` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dob` date NOT NULL,
  `sex` enum('Male','Female') COLLATE utf8mb4_unicode_ci NOT NULL,
  `religion` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `doctor_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cnic` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_number` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `date_of_appointment` date NOT NULL,
  `marital_status` enum('Single','Married','Divorced') COLLATE utf8mb4_unicode_ci NOT NULL,
  `specialist` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `department_id` bigint UNSIGNED DEFAULT NULL,
  `emergency_contact_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `emergency_contact_relation` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `emergency_contact_number` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_mode` enum('Bank Transfer','Cash') COLLATE utf8mb4_unicode_ci NOT NULL,
  `account_title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `account_number` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bank_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `doctor_charges` decimal(10,2) NOT NULL,
  `doctor_portion` decimal(5,2) NOT NULL,
  `clinic_portion` decimal(5,2) NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `doctors`
--

INSERT INTO `doctors` (`id`, `name`, `dob`, `sex`, `religion`, `doctor_id`, `cnic`, `contact_number`, `address`, `date_of_appointment`, `marital_status`, `specialist`, `department_id`, `emergency_contact_name`, `emergency_contact_relation`, `emergency_contact_number`, `payment_mode`, `account_title`, `account_number`, `bank_name`, `doctor_charges`, `doctor_portion`, `clinic_portion`, `image`, `is_active`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Dr Satna', '1979-02-12', 'Male', NULL, '1', '41011-9240699-1', '(0300) 285-2247', 'sfdsf', '2024-11-19', 'Single', 'skin', 3, '0202020000', '00000000000', '(0330) 028-5224', 'Cash', NULL, NULL, NULL, 5000.00, 20.00, 80.00, 'doctors/XbMXUek9kcEWN1EAUg9iYnbqdNUcpizVTZPNoFUH.png', 1, '2024-11-19 08:23:24', '2025-01-20 11:08:01', NULL),
(2, 'Dr. Naveera', '2010-02-10', 'Female', 'Islam', '1005', '52644-4440525-5', '(0333) 256-5895', 'Karachi', '2002-05-07', 'Married', 'Infertility', 3, 'Asx', 'sadef', '1468466444', 'Cash', NULL, NULL, NULL, 3000.00, 60.00, 40.00, NULL, 1, '2024-12-01 18:00:08', '2025-01-20 12:15:09', NULL),
(3, 'Dr Iqbal Shahzad', '2000-01-02', 'Male', 'Islam', '1002', '44346-4858888-8', '(0333) 256-5895', 'Karachi', '2023-06-01', 'Married', 'Urology', 4, 'dshkue', 'erewrwer', '1468466444', 'Bank Transfer', 'Iqbal Shahzad', '0144-252564856-8', 'Meezan Bank', 4500.00, 55.00, 45.00, NULL, 1, '2024-12-01 18:02:55', '2024-12-01 18:02:55', NULL),
(4, 'Dr Zaryab Setna', '2024-12-04', 'Male', NULL, '1004', '45864-4444444-4', '(0333) 030-5560', '1 BATH ISLAND ROAD, BATH ISLAND KARACHI\r\nTHE FERTILITY CLINIC (PRIVATE) LIMITED', '2023-02-02', 'Married', 'ABC', 3, 'ACs', 'werer', 'ewrttewet', 'Cash', NULL, NULL, NULL, 4000.00, 100.00, 0.00, NULL, 1, '2024-12-02 05:51:33', '2024-12-02 05:51:33', NULL),
(5, 'Doctor Test 12', '1970-08-08', 'Male', 'Islam', '10029', '99999-9999999-9', '(0366) 666-6666', 'B-108 Clifton street 6', '2000-03-01', 'Married', 'Ultrasound', 7, 'Asiya', 'Wife', '098765344647', 'Cash', NULL, NULL, NULL, 6000.00, 30.00, 70.00, 'doctors/lyDhus2UiVGpnJPbfGv5Emx378Rh9wTyWTM3Ympx.jpg', 1, '2025-01-17 07:36:13', '2025-01-17 07:37:10', NULL),
(6, 'TEST Doctor', '1990-09-24', 'Male', 'Islam', '100302', '99999-9999999-1', '(0366) 666-6666', 'Karachi', '2016-10-10', 'Single', 'Ultrasound', 7, 'Asiya', 'Father', '(0333) 333-3333', 'Cash', NULL, NULL, NULL, 3000.00, 50.00, 50.00, NULL, 1, '2025-01-24 10:18:35', '2025-01-24 10:18:35', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `url` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `name`, `description`, `url`, `created_at`, `updated_at`) VALUES
(1, 'New Role Created', 'A new role was created', 'roles', '2024-11-12 15:35:11', '2024-11-12 15:35:11'),
(2, 'Role Modified', 'A role was modified', 'roles', '2024-11-12 15:35:11', '2024-11-12 15:35:11'),
(3, 'New User Created', 'A new user was created', 'users', '2024-11-12 15:35:11', '2024-11-12 15:35:11'),
(4, 'User Modified', 'User account was modified', 'users', '2024-11-12 15:35:11', '2024-11-12 15:35:11'),
(5, 'Department Created', 'A new department was created', 'departments', '2024-11-12 15:35:11', '2024-11-12 15:35:11'),
(6, 'Department Modified', 'A department was modified', 'departments', '2024-11-12 15:35:11', '2024-11-12 15:35:11'),
(7, 'Department Deleted', 'A department was deleted', 'departments', '2024-11-12 15:35:11', '2024-11-12 15:35:11'),
(8, 'Service Created', 'A new service was created', 'services', '2024-11-12 15:35:11', '2024-11-12 15:35:11'),
(9, 'Service Modified', 'A service was modified', 'services', '2024-11-12 15:35:11', '2024-11-12 15:35:11'),
(10, 'Service Deleted', 'A service was deleted', 'services', '2024-11-12 15:35:11', '2024-11-12 15:35:11'),
(11, 'Doctor Created', 'A new doctor was created', 'doctors', '2024-11-12 15:35:11', '2024-11-12 15:35:11'),
(12, 'Doctor Updated', 'Doctor information was updated', 'doctors', '2024-11-12 15:35:11', '2024-11-12 15:35:11'),
(13, 'Doctor Deleted', 'Doctor was deleted', 'doctors', '2024-11-12 15:35:11', '2024-11-12 15:35:11'),
(14, 'Doctor Status Updated', 'Doctor status was updated', 'doctors', '2024-11-12 15:35:11', '2024-11-12 15:35:11');

-- --------------------------------------------------------

--
-- Table structure for table `experiences`
--

CREATE TABLE `experiences` (
  `id` bigint UNSIGNED NOT NULL,
  `doctor_id` bigint UNSIGNED NOT NULL,
  `last_employer` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `designation` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `experiences`
--

INSERT INTO `experiences` (`id`, `doctor_id`, `last_employer`, `designation`, `start_date`, `end_date`, `created_at`, `updated_at`) VALUES
(3, 3, 'awheuqrh', 'dfuewg', '2002-01-01', '2005-01-02', '2024-12-01 18:02:55', '2024-12-01 18:02:55'),
(4, 4, 'tewet', 'wetewt', '2024-12-02', '2024-12-02', '2024-12-02 05:51:33', '2024-12-02 05:51:33'),
(5, 2, 'wrwert', 'tweewtwet', '2000-10-03', '2004-02-05', '2024-12-05 07:59:13', '2024-12-05 07:59:13'),
(7, 5, 'Liaquat Hospital', 'Doctor', '1999-01-01', '2000-01-01', '2025-01-17 07:37:10', '2025-01-17 07:37:10'),
(8, 1, 'Down Medican', 'head of skin', '2024-11-05', '2024-11-19', '2025-01-20 11:08:01', '2025-01-20 11:08:01'),
(9, 6, 'Liaquat Hospital', 'Doctor', '1111-01-01', '1111-01-01', '2025-01-24 10:18:35', '2025-01-24 10:18:35');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
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
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(96, '2024_11_06_131718_add_deleted_at_to_multiple_tables', 2),
(124, '2014_10_12_000000_create_users_table', 3),
(125, '2014_10_12_100000_create_password_resets_table', 3),
(126, '2019_08_19_000000_create_failed_jobs_table', 3),
(127, '2024_09_06_100003_create_settings_table', 3),
(128, '2024_09_08_163740_create_permission_tables', 3),
(129, '2024_09_12_144651_create_events_table', 3),
(130, '2024_09_12_144651_create_user_event_subscriptions_table', 3),
(131, '2024_09_13_233535_create_notifications_table', 3),
(132, '2024_09_16_091911_create_activity_log_table', 3),
(133, '2024_09_16_091912_add_event_column_to_activity_log_table', 3),
(134, '2024_09_16_091913_add_batch_uuid_column_to_activity_log_table', 3),
(135, '2024_09_17_205335_create_departments_table', 3),
(136, '2024_09_17_223236_create_services_table', 3),
(137, '2024_09_17_230622_create_doctors_table', 3),
(138, '2024_09_17_231610_create_qualifications_table', 3),
(139, '2024_09_17_231611_create_experiences_table', 3),
(140, '2024_10_30_094607_create_patients_table', 3),
(141, '2024_11_08_105423_create_payments_table', 3),
(142, '2024_11_08_105905_create_payment_services_table', 3);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint UNSIGNED NOT NULL,
  `model_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint UNSIGNED NOT NULL,
  `model_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 1);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_id` bigint UNSIGNED NOT NULL,
  `data` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Table structure for table `patients`
--

CREATE TABLE `patients` (
  `id` bigint UNSIGNED NOT NULL,
  `patient_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `patient_dob` date NOT NULL,
  `patient_cnic` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `patient_contact` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `patient_occupation` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `patient_address` text COLLATE utf8mb4_unicode_ci,
  `spouse_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `spouse_dob` date DEFAULT NULL,
  `spouse_cnic` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `spouse_contact` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `spouse_occupation` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `spouse_address` text COLLATE utf8mb4_unicode_ci,
  `how_did_you_know` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `note` text COLLATE utf8mb4_unicode_ci,
  `emergency_contact_person` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `emergency_contact_relation` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `emergency_contact_number` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` enum('Free Consultancy','Regular Patient') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Free Consultancy',
  `fc_number` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `doctor_coordinator_id` bigint UNSIGNED DEFAULT NULL,
  `file_number` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `doctor_id` bigint UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `patients`
--

INSERT INTO `patients` (`id`, `patient_name`, `patient_dob`, `patient_cnic`, `patient_contact`, `patient_occupation`, `patient_address`, `spouse_name`, `spouse_dob`, `spouse_cnic`, `spouse_contact`, `spouse_occupation`, `spouse_address`, `how_did_you_know`, `note`, `emergency_contact_person`, `emergency_contact_relation`, `emergency_contact_number`, `type`, `fc_number`, `doctor_coordinator_id`, `file_number`, `doctor_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1001, 'Aslam', '1978-02-12', '42101-1924069-9', '(0300) 285-2247', 'Job', 'gulshsn', 'razia', '1974-02-12', '42139-3939393-9', '(0300) 000-0000', 'housewife', 'gulshan', 'Social Media', NULL, 'sk', 'bro', '(0300) 000-0000', 'Regular Patient', '1001', 4, '1001', 4, '2024-11-25 14:01:08', '2024-12-02 05:52:57', NULL),
(1002, 'Alisha', '1998-01-05', '15648-4841351-6', '(0354) 545-4545', NULL, 'Karachi', 'Ali', '1998-01-05', '51546-5465444-4', '(0345) 454-4444', NULL, 'Karachi', 'Referral', 'Test case 01', 'rwrt', 'reyyt', '(0355) 555-5555', 'Regular Patient', '1002', 2, '1043', 2, '2024-12-01 18:05:04', '2025-01-14 11:05:36', NULL),
(1003, 'ABVDf', '2024-12-18', '46898-9999999-9', '(0388) 699-5555', 'ABC', '1 BATH ISLAND ROAD, BATH ISLAND KARACHI\r\nTHE FERTILITY CLINIC (PRIVATE) LIMITED', 'dhtuy', '2024-12-10', '45555-5555555-5', '(0333) 030-5560', 'fff', '1 BATH ISLAND ROAD, BATH ISLAND KARACHI\r\nTHE FERTILITY CLINIC (PRIVATE) LIMITED', 'Social Media', NULL, 'nayyar aziz', 'werer', '(0333) 030-5560', 'Free Consultancy', '1003', 4, NULL, NULL, '2024-12-02 05:52:38', '2024-12-02 05:52:38', NULL),
(1004, 'MRS GARDEZI', '1960-02-16', '44983-6287631-1', NULL, 'fff', '1 BATH ISLAND ROAD, BATH ISLAND KARACHI\r\nTHE FERTILITY CLINIC (PRIVATE) LIMITED', 'GARDEZI', '1958-03-18', '22934-6842531-5', '(0333) 666-9358', 'JOB', 'CLIFTON', NULL, NULL, '03343536789', 'SISTER', '(0333) 532-4329', 'Regular Patient', '1004', 4, '1002', 4, '2024-12-02 06:28:53', '2024-12-02 06:44:55', NULL),
(1005, 'SONIA', '1999-07-02', '32168-4632645-4', '(0333) 294-2990', 'HOUSE WIFE', 'KPS', 'SHANKAR', '1998-12-15', '16464-3232565-4', '(0333) 329-4299', 'JOB', 'KPS', NULL, NULL, '0333-3645268', 'BROTHER', '(0328) 344-3484', 'Regular Patient', '1005', 1, '1003', 4, '2024-12-02 06:48:45', '2024-12-02 06:48:45', NULL),
(1006, 'MARYUM', '2000-05-05', '42000-8482592-8', '(0332) 421-1139', 'JOB', 'KARACHI', 'JAWWAD ASIF', '1999-06-23', '42201-5470011-5', '(0333) 332-2128', 'JOB', 'KARACHI', NULL, NULL, 'RIDA', 'SISTER', '(0333) 333-5558', 'Regular Patient', '1006', 4, '1004', 4, '2024-12-02 06:54:08', '2024-12-02 06:54:08', NULL),
(1007, 'ALYNA', '1992-05-21', '14965-6465694-7', '(0303) 051-9996', 'JOB', 'KARCHI', 'KARIM', '1985-11-13', '16468-4765645-9', '(0303) 051-9999', 'ONLINE', 'KARACHI', NULL, NULL, 'KARIM', 'HUSBAND', '(0303) 051-9999', 'Regular Patient', '1007', 4, '1005', 4, '2024-12-02 06:57:39', '2024-12-02 06:57:39', NULL),
(1008, 'FARWA', '1992-11-25', '43203-7221528-4', '(0333) 134-0587', 'JO', 'KARACHI', 'SAUD MAGSI', '1990-12-11', '16544-3646434-5', '(0334) 589-9629', 'ON WORK', 'KARACHISAUD', NULL, NULL, 'SAUD', 'HUSBAND', '(0333) 426-5646', 'Regular Patient', '1008', 4, '1006', 4, '2024-12-02 07:01:54', '2024-12-02 07:01:54', NULL),
(1009, 'MYRA', '2000-07-06', '04421-9863542-8', '(0321) 570-0634', 'JOB', 'CLIFTON', 'JAWED', '1998-06-14', '44210-1328976-2', '(0332) 186-8558', 'ON WORK', 'CLIFTON', NULL, NULL, 'JAWED', 'HUSBAND', '(0332) 186-8558', 'Regular Patient', '1009', 4, '1007', 4, '2024-12-02 07:05:55', '2024-12-02 07:05:55', NULL),
(1010, 'KANWAL', '1998-02-25', '42000-1775126-0', '(0331) 529-8651', 'HOUSE WIFE', 'KARACHI', 'BILAL', '1989-05-12', '42201-8896648-1', '(0330) 284-3834', 'ON WORK', 'KARACHI', NULL, NULL, 'ASIF', 'FATHER', '(0333) 272-8615', 'Regular Patient', '1010', 4, '1008', 4, '2024-12-02 07:09:09', '2024-12-02 07:09:09', NULL),
(1011, 'JAVERIA', '2000-06-25', '42201-3658792-1', '(0322) 579-8737', 'JOB', 'KARACHI', 'BADAR', '1997-08-06', '42201-9683889-1', '(0328) 921-3982', 'JOB', 'KARACHI', NULL, NULL, 'NAZIA ASIF', 'SISTER', '(0330) 284-3834', 'Regular Patient', '1011', 4, '1009', 4, '2024-12-02 07:11:57', '2024-12-02 07:11:57', NULL),
(1012, 'NIDA', '1989-05-24', '42201-4866086-3', '(0323) 218-0728', 'H', 'KARACHI', 'BADARFARRUKH KAMAL', '1982-09-25', '42201-4866086-3', '(0330) 284-3834', 'JOB', 'KARACHI', NULL, NULL, 'NAZIA ASIF', 'SISTER', '(0333) 327-2861', 'Regular Patient', '1012', 4, '1010', 4, '2024-12-02 07:16:41', '2024-12-02 07:16:41', NULL),
(1013, 'TAYYABA', '1980-04-27', '42201-9876354-9', '(0322) 419-9090', 'HOUSE WIFE', 'KARACHI', 'IRFAN', '1976-12-07', '16468-4765645-9', '(0333) 332-7286', 'JOB', 'KARACHI', NULL, NULL, 'NAZIA ASIF', 'SISTER', '(0333) 218-6855', 'Regular Patient', '1013', 4, '1011', 4, '2024-12-02 07:26:25', '2024-12-02 07:26:25', NULL),
(1014, 'DR FIZZA FATIMA', '1994-04-25', '14965-6405694-7', NULL, 'fff', 'KARACHI', 'FIZAL', '1991-04-25', '22934-6842531-5', '(0333) 327-2861', 'JOB', 'KARACHI', NULL, NULL, 'NAZIA ASIF', 'SISTER', '(0333) 332-7286', 'Free Consultancy', '1014', 4, '1012', 4, '2024-12-02 07:28:32', '2024-12-02 07:28:32', NULL),
(1015, 'IRENE', '2008-07-20', '42201-3697235-9', '(0300) 922-3022', 'JOB', 'KARACHI', 'MARTINEZ', '2004-10-27', '42201-9735468-2', NULL, 'JOB', '1 BATH ISLAND ROAD, BATH ISLAND KARACHI\r\nTHE FERTILITY CLINIC (PRIVATE) LIMITED', NULL, NULL, 'nayyar aziz', 'SISTER', '(0330) 284-3834', 'Regular Patient', '1015', 4, '1013', 4, '2024-12-02 07:34:47', '2024-12-02 07:34:47', NULL),
(1016, 'SIMRAN', '2001-03-22', '42201-2213345-6', '(0300) 821-5492', 'JOB', 'KARACHI', 'RAMNABI', '1999-05-16', '41101-3679824-5', '(0333) 333-2598', 'JOB', 'KARACHI', NULL, NULL, 'nayyar aziz', 'SISTER', '(0335) 980-3694', 'Regular Patient', '1016', 4, '1014', 4, '2024-12-02 07:47:31', '2024-12-02 07:47:31', NULL),
(1017, 'MRS KOKAB', '1978-02-11', '40011-3864972-0', '(0321) 221-7555', 'HOUSE WIFE', 'KARACHI', 'HUSSAIN', '1976-01-11', '40001-3297823-1', '(0333) 286-6694', 'JOB', 'KARACHI', NULL, NULL, 'RUB', 'SISTER', '(0333) 086-9721', 'Regular Patient', '1017', 4, '1015', 4, '2024-12-02 07:50:00', '2024-12-02 07:50:00', NULL),
(1018, 'AYESHA ALI', '1995-05-25', '16486-5323468-4', '(0332) 825-2001', 'HOUSE WIFE', 'KARACHI', 'ALI', '1994-11-27', '21654-6431646-8', '(0316) 468-4313', 'JOB', 'KARACHI', NULL, NULL, 'RUB', 'SISTER', '(0315) 646-1312', 'Regular Patient', '1018', 4, '1016', 4, '2024-12-02 07:55:19', '2024-12-02 07:55:19', NULL),
(1019, 'HIFZA', '1985-05-05', '15644-6854321-6', '(0301) 140-2484', 'HOUSE WIFE', 'KARACHI', 'SIDDIQUE', '1983-05-02', '32483-1218483-2', '(0326) 565-2132', 'JOB', 'KARACHI', NULL, NULL, 'RUB', 'SISTER', '(0345) 684-9863', 'Regular Patient', '1019', 4, '1017', 4, '2024-12-02 08:24:08', '2024-12-02 08:24:08', NULL),
(1020, 'ZAINAB NASIR', '1996-02-25', '42554-5481548-9', '(0325) 254-9654', NULL, 'KARACHI', 'NASIR', '1998-08-05', '64654-6468465-4', '(0358) 154-6164', NULL, 'KARACHI', NULL, NULL, 'SAIMA', 'SON', '(0325) 444-5416', 'Free Consultancy', '1020', 4, '1018', 4, '2024-12-02 08:33:16', '2024-12-02 08:33:16', NULL),
(1021, 'RUKHSANA KHURRUM', '1995-08-25', '24546-4646516-4', '(0356) 215-4511', NULL, 'KARACHI', 'KHURRUM', '0975-04-25', '16465-4846443-4', '(0315) 465-4465', NULL, 'KARACHI', NULL, NULL, 'KIRAN', 'SISTER', '(0325) 454-6454', 'Free Consultancy', '1021', 4, '1019', 4, '2024-12-02 08:46:17', '2024-12-02 08:46:51', '2024-12-02 08:46:51'),
(1035, 'Paula Gould', '2015-04-06', '44444-4444444-4', '(0355) 555-5555', 'Voluptas mollitia es', 'Totam sint soluta vo', 'Remedios Washington', '1985-09-08', '44444-4444444-4', '(0355) 555-5555', 'Enim quia id beatae', 'Qui possimus quaera', 'Other', 'Placeat labore qui', 'Nisi consectetur est', 'Velit natus nihil h', '(0355) 555-5555', 'Regular Patient', '1022', 1, '1020', 3, '2024-12-04 16:17:45', '2024-12-04 16:18:05', '2024-12-04 16:18:05'),
(1036, 'BARIRA', '1985-07-07', '46898-9999999-8', '(0311) 399-3904', 'HOUSE WIFE', 'KARACHI', 'USMAN', '1980-09-14', '22934-6842531-4', '(0311) 399-3905', 'JOB', 'KARACHI', NULL, NULL, 'MAHA', 'FRIEND', '(0303) 333-6987', 'Regular Patient', '1023', 2, '1021', 2, '2024-12-05 07:51:08', '2024-12-05 07:51:08', NULL),
(1037, 'MARIYAM', '2002-10-24', '42201-9842242-6', '(0335) 739-9990', 'HOUSE WIFE', 'KARACHI', 'MUBEEN', '1999-03-06', '42101-7015551-9', '(0332) 120-0035', 'JOB', 'KARACHI', NULL, NULL, 'BATOOL', 'FRIEND', '(0325) 698-7235', 'Regular Patient', '1024', 2, '1022', 2, '2024-12-05 08:03:08', '2024-12-05 08:03:08', NULL),
(1038, 'FAHA', '1990-11-30', '42201-6482029-0', '(0333) 128-1918', 'HOUSE WIFE', 'KARACHI', 'DANIYAL', '1986-10-25', '42101-5326815-7', '(0333) 324-1113', 'JOB', 'KARACHI', NULL, NULL, 'BATOOL', 'FRIEND', '(0323) 897-3465', 'Regular Patient', '1025', 2, '1023', 2, '2024-12-05 08:05:56', '2024-12-05 08:05:56', NULL),
(1039, 'MEHWISH', '1988-03-13', '42101-9851771-8', '(0334) 633-3289', 'JOB', 'KARACHI', 'SYED NAVEED KAZMI', '1986-12-28', '42101-9166903-7', '(0332) 568-7162', 'JOB', 'KARACHI', NULL, NULL, 'MAHA', 'FRIEND', '(0368) 932-5555', 'Regular Patient', '1026', 2, '1024', 2, '2024-12-05 08:11:03', '2024-12-05 08:11:03', NULL),
(1040, 'BUSHRA', '1980-06-04', '16264-5984623-2', NULL, NULL, NULL, 'MUHAMMAD', '1978-08-07', '32164-9651236-5', NULL, NULL, 'KARACHI', NULL, NULL, 'NAZIA ASIF', 'FRIEND', '(0325) 695-6564', 'Regular Patient', '1027', 2, '1025', 2, '2024-12-05 08:13:50', '2024-12-05 08:13:50', NULL),
(1041, 'MEHWISH', '1984-09-02', '42000-0484756-7', '(0332) 127-6513', 'HOUSE WIFE', 'KARACHI', 'NOMAN IQBAL', NULL, '13416-6235646-3', '(0332) 127-7771', 'JOB', 'KARACHI', NULL, NULL, 'NAZIA ASIF', 'FRIEND', '(0328) 629-9999', 'Regular Patient', '1028', 2, '1026', 2, '2024-12-05 08:20:03', '2024-12-05 08:20:03', NULL),
(1042, 'MUQADDAS', '1986-07-05', '42201-9687321-0', '(0335) 282-0691', 'HOUSE WIFE', 'KARACHI', 'ABDUL BASIT', '1980-09-25', '42201-6859721-1', '(0335) 282-1960', 'JOB', 'KARACHI', NULL, NULL, 'NAZIA ASIF', 'FRIEND', '(0332) 569-5656', 'Regular Patient', '1029', 2, '1027', 2, '2024-12-05 08:22:12', '2024-12-05 08:22:12', NULL),
(1043, 'FARZANA JATOI', '1982-05-14', '42202-6348378-2', '(0333) 822-2002', 'HOUSE WIFE', 'KARACHI', 'ABDUL AHMED', '1986-04-08', '42230-1983266-6', '(0333) 022-2022', 'JOB', 'KARACHI', NULL, NULL, 'NAZIA ASIF', 'FRIEND', '(0333) 256-9565', 'Regular Patient', '1030', 2, '1028', 2, '2024-12-05 08:25:56', '2024-12-05 08:25:56', NULL),
(1044, 'MARYUM ANAS', '1997-05-05', '42301-4592499-8', '(0333) 522-1091', 'JOB', 'KARACHI', 'ANUS', '1992-01-24', '42301-9930138-5', '(0333) 436-4648', 'JOB', 'KARACHI', NULL, NULL, 'QURATULAIN', 'FRIEND', '(0332) 569-8723', 'Regular Patient', '1031', 2, '1029', 2, '2024-12-05 08:28:06', '2024-12-05 08:28:06', NULL),
(1045, 'SADIA', '1986-03-26', '42201-6397832-1', '(0305) 241-6377', 'HOUSE WIFE', 'KARACHI', 'SAIFULLAHA KHAN', '1980-10-20', '42201-3697586-4', '(0333) 333-8164', 'HOUSE WIFE', 'KARACHI', NULL, NULL, 'NAZIA ASIF', 'SISTER', '(0332) 862-9999', 'Regular Patient', '1032', 2, '1030', 2, '2024-12-05 08:33:21', '2024-12-05 08:33:21', NULL),
(1046, 'RIMSHA RIAZ', '2001-12-20', '36101-1682466-2', NULL, NULL, NULL, 'MUBASHIR ALI', '1988-01-01', '36101-3037952-5', '(0334) 428-7747', 'JOB', 'KARACHI', NULL, NULL, 'GULAM MURTAZA', 'BROTHER', '(0333) 256-9872', 'Regular Patient', '1033', 2, '1031', 2, '2024-12-05 08:38:03', '2024-12-05 08:38:03', NULL),
(1047, 'NADIA', '2000-10-01', '42201-3897362-1', '(0346) 211-6094', 'JOB', 'KARACHI', 'WASEEM', '1998-08-16', '42222-2686584-1', '(0338) 642-2222', 'JOB', 'KARACHI', NULL, NULL, 'BARI', 'FRIEND', '(0338) 677-9555', 'Regular Patient', '1034', 2, '1032', 2, '2024-12-05 08:40:04', '2024-12-05 08:40:04', NULL),
(1048, 'AIMEN', '1999-07-14', '42201-9873691-1', '(0300) 212-2728', 'JOB', 'KARACHI', 'TARIQ', '1997-02-19', '31646-4531354-6', '(0323) 821-6562', 'JOB', 'KARACHI', NULL, NULL, 'BARI', 'FRIEND', '(0321) 646-8413', 'Regular Patient', '1035', 2, '1033', 2, '2024-12-05 08:43:35', '2024-12-05 08:43:35', NULL),
(1049, 'FATIMA', '1994-11-12', '42201-9765648-9', '(0333) 285-6455', 'JOB', 'KARACHI', 'TAHIR', '1993-11-11', '42201-8546464-6', '(0335) 833-3495', 'JOB', 'KARACHI', NULL, NULL, 'RAUF', 'FRIEND', '(0354) 668-4985', 'Regular Patient', '1036', 2, '1034', 2, '2024-12-05 08:46:04', '2024-12-05 08:46:04', NULL),
(1050, 'SIDRA NIAZI', '1985-06-05', '24301-5486449-9', '(0335) 498-6486', 'HOUSEWIFE', 'KARACHI', 'NIAZI', '1988-12-06', '13564-8946546-8', '(0378) 465-4664', 'JOB', 'KARACHI', 'Referral', NULL, 'SHAZIA', 'MOTHER', '(0384) 655-4645', 'Regular Patient', '1037', 2, '1035', 2, '2024-12-05 08:51:37', '2024-12-05 08:51:37', NULL),
(1051, 'IQRA', '1986-12-24', '42201-8516561-4', '(0332) 220-0911', 'JOB', 'KARACHI', 'SOHAIL', '1986-12-23', '41306-0860996-7', '(0330) 020-0911', 'JOB', 'KARACHI', NULL, NULL, 'IRUM', 'FRIEND', '(0333) 256-9872', 'Regular Patient', '1038', 2, '1036', 2, '2024-12-05 12:12:22', '2024-12-05 12:12:22', NULL),
(1052, 'NAFEESA', '1986-10-22', '22306-9785432-1', '(0333) 256-9872', 'JOB', 'KARACHI', 'HAMEED', '1983-03-15', '22934-6842531-5', '(0333) 256-9565', 'JOB', 'KARACHI', NULL, NULL, 'IRUM', 'FRIEND', '(0333) 327-2861', 'Free Consultancy', '1039', 2, '1037', 2, '2024-12-05 12:14:58', '2024-12-05 12:14:58', NULL),
(1053, 'FAIZA', '1988-07-11', '42003-9872653-3', NULL, NULL, NULL, 'ZUBAIR', '1984-12-13', '42201-8362183-1', NULL, NULL, NULL, NULL, NULL, 'WAQAR', 'S', '(0336) 824-9422', 'Regular Patient', '1040', 2, '1038', 2, '2024-12-05 12:18:19', '2024-12-05 12:18:19', NULL),
(1054, 'ANUM ZEHRA', '2002-08-12', '42201-9368763-1', '(0336) 209-3055', 'JOB', 'KARACHI', 'ZAHID', '2001-12-14', '42220-7398642-1', '(0336) 789-6421', 'JOB', 'KARACHI', NULL, NULL, 'GULAM MURTAZA', 'BROTHER', '(0333) 555-6666', 'Regular Patient', '1041', 2, '1039', 2, '2024-12-05 12:21:25', '2024-12-05 12:21:25', NULL),
(1055, 'NAYYAR', '1980-07-07', '16464-3623646-4', '(0335) 646-4131', 'HOUSEWIFE', 'KARACHI', 'AZIZ', '1976-01-19', '35466-5365695-6', '(0353) 438-6465', 'JOB', 'KARACHI', NULL, NULL, 'DUA', 'DAUGHTER', '(0335) 468-7985', 'Regular Patient', '1042', 1, '1040', 1, '2025-01-06 12:33:57', '2025-01-06 12:33:57', NULL),
(1056, 'AZIZ', '1976-01-19', '35498-7652312-2', '(0351) 364-6945', 'JOB', 'KARACHI', 'AZIZ', '1967-04-30', '51654-6953654-8', '(0316) 546-8796', 'JOB', 'KARACHI', 'Social Media', NULL, 'DUA', 'DAUGHTER', '(0354) 898-9876', 'Regular Patient', '1043', 3, '1041', 3, '2025-01-06 12:38:39', '2025-01-06 12:38:39', NULL),
(1057, 'subhana', '1978-02-21', '42301-0000000-0', '(0340) 123-0017', 'job', 'karachi', 'nothing', '0001-01-01', '00000-0000000-0', '(0300) 000-0000', '-', NULL, 'Referral', 'just a gyne patient', 'aiman', 'sister', '(0323) 456-0099', 'Regular Patient', '1044', 2, '1042', 2, '2025-01-06 16:25:33', '2025-01-06 16:25:33', NULL),
(1058, 'ABC Patient', '1990-01-01', '33333-3333333-3', '(0322) 222-2222', 'Teacher', 'Karachi', 'Alam', '1980-01-01', '33333-3333333-3', '(0333) 333-3333', 'Director', 'karachi', 'Social Media', 'Patient with 10% discount', 'Zia', 'Father', '(0333) 333-3333', 'Regular Patient', '1045', 1, '1044', 5, '2025-01-17 07:46:09', '2025-01-17 07:46:09', NULL),
(1059, 'ABC Patient', '1990-01-01', '88888-8888888-8', '(0322) 222-2222', 'Teacher', 'Karachi', 'Alam', '1980-11-11', '33333-3333333-3', '(0333) 333-3333', 'Director', 'Karachi', 'Social Media', 'gf', 'Zia', 'Father', '(0333) 333-3333', 'Free Consultancy', '1046', 5, NULL, NULL, '2025-01-17 07:58:13', '2025-01-17 07:58:13', NULL),
(1060, 'ABC Patient', '2025-03-24', '65444-4444444-4', '(0322) 222-2222', NULL, NULL, 'Alam', '2025-03-24', NULL, NULL, NULL, NULL, 'Social Media', NULL, '03405550117', 'Father', '(0333) 333-3333', 'Regular Patient', '1047', 1, '1045', 3, '2025-03-24 06:39:08', '2025-03-24 06:40:12', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` bigint UNSIGNED NOT NULL,
  `patient_id` bigint UNSIGNED NOT NULL,
  `fc_number` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file_number` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `patient_type` enum('Free Consultancy','Regular Patient') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Free Consultancy',
  `doctor_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `doctor_department_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `doctor_charges` decimal(10,2) NOT NULL DEFAULT '0.00',
  `doctor_portion` decimal(10,2) NOT NULL DEFAULT '0.00',
  `clinic_portion` decimal(10,2) NOT NULL DEFAULT '0.00',
  `sub_total` decimal(10,2) NOT NULL DEFAULT '0.00',
  `discount` decimal(10,2) NOT NULL DEFAULT '0.00',
  `total` decimal(10,2) NOT NULL DEFAULT '0.00',
  `payment_mode` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remarks` text COLLATE utf8mb4_unicode_ci,
  `refunded` tinyint(1) NOT NULL DEFAULT '0',
  `closed` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `patient_id`, `fc_number`, `file_number`, `patient_type`, `doctor_name`, `doctor_department_name`, `doctor_charges`, `doctor_portion`, `clinic_portion`, `sub_total`, `discount`, `total`, `payment_mode`, `remarks`, `refunded`, `closed`, `created_at`, `updated_at`) VALUES
(1001, 1010, '1010', '1008', 'Regular Patient', 'Dr Zaryab Setna', 'Infertility/Gynaecology/Obstetrice', 4000.00, 100.00, 0.00, 4000.00, 0.00, 4000.00, 'Cash', NULL, 0, 0, '2024-12-02 07:31:28', '2024-12-02 07:31:28'),
(1002, 1009, '1009', '1007', 'Regular Patient', 'Dr Zaryab Setna', 'Infertility/Gynaecology/Obstetrice', 4000.00, 100.00, 0.00, 4000.00, 0.00, 4000.00, 'CC', NULL, 1, 0, '2024-12-02 07:53:25', '2024-12-02 08:39:35'),
(1003, 1004, '1004', '1002', 'Regular Patient', 'Dr Zaryab Setna', 'Infertility/Gynaecology/Obstetrice', 4000.00, 100.00, 0.00, 4000.00, 4000.00, 0.00, 'Cash', NULL, 1, 0, '2024-12-02 07:58:27', '2024-12-02 08:33:16'),
(1004, 1009, '1009', '1007', 'Regular Patient', 'Dr Zaryab Setna', 'Infertility/Gynaecology/Obstetrice', 4000.00, 100.00, 0.00, 4000.00, 0.00, 4000.00, 'Cash', NULL, 1, 0, '2024-12-02 08:29:56', '2024-12-02 08:32:30'),
(1005, 1004, '1004', '1002', 'Regular Patient', 'Dr Zaryab Setna', 'Infertility/Gynaecology/Obstetrice', 4000.00, 100.00, 0.00, 4000.00, 0.00, 4000.00, 'Cash', NULL, 0, 0, '2024-12-02 08:30:38', '2024-12-02 08:30:38'),
(1006, 1006, '1006', '1004', 'Regular Patient', 'Dr Zaryab Setna', 'Infertility/Gynaecology/Obstetrice', 4000.00, 100.00, 0.00, 4000.00, 0.00, 4000.00, 'Cash', NULL, 1, 0, '2024-12-02 08:31:47', '2025-01-17 08:08:36'),
(1007, 1020, '1020', '1018', 'Free Consultancy', 'Dr Zaryab Setna', 'Infertility/Gynaecology/Obstetrice', 4000.00, 100.00, 0.00, 4000.00, 0.00, 4000.00, 'Cash', NULL, 0, 0, '2024-12-02 08:34:05', '2024-12-02 08:34:05'),
(1008, 1011, '1011', '1009', 'Regular Patient', 'Dr Zaryab Setna', 'Infertility/Gynaecology/Obstetrice', 4000.00, 100.00, 0.00, 4000.00, 0.00, 4000.00, 'CC', NULL, 0, 0, '2024-12-02 08:37:06', '2024-12-02 08:37:06'),
(1009, 1009, '1009', '1007', 'Regular Patient', 'Dr Zaryab Setna', 'Infertility/Gynaecology/Obstetrice', 4000.00, 100.00, 0.00, 4000.00, 0.00, 4000.00, 'Cash', NULL, 1, 0, '2024-12-02 08:44:17', '2025-01-17 08:06:52'),
(1010, 1014, '1014', '1012', 'Free Consultancy', 'Dr Zaryab Setna', 'Infertility/Gynaecology/Obstetrice', 4000.00, 100.00, 0.00, 4000.00, 0.00, 4000.00, 'Cash', NULL, 0, 0, '2024-12-02 08:48:28', '2024-12-02 08:48:28'),
(1011, 1003, '1003', NULL, 'Free Consultancy', NULL, NULL, 0.00, 0.00, 0.00, 4000.00, 0.00, 4000.00, 'Cash', NULL, 0, 0, '2024-12-04 16:08:06', '2024-12-04 16:08:06'),
(1012, 1036, '1023', '1021', 'Regular Patient', 'Dr. Naveera', 'Infertility/Gynaecology/Obstetrice', 3000.00, 60.00, 40.00, 3000.00, 0.00, 3000.00, 'CC', NULL, 0, 1, '2024-12-05 12:05:42', '2024-12-05 12:25:17'),
(1013, 1037, '1024', '1022', 'Regular Patient', 'Dr. Naveera', 'Infertility/Gynaecology/Obstetrice', 3000.00, 60.00, 40.00, 3000.00, 0.00, 3000.00, 'CC', NULL, 0, 1, '2024-12-05 12:06:02', '2024-12-05 12:25:17'),
(1014, 1038, '1025', '1023', 'Regular Patient', 'Dr. Naveera', 'Infertility/Gynaecology/Obstetrice', 3000.00, 60.00, 40.00, 3000.00, 0.00, 3000.00, 'Cash', NULL, 0, 1, '2024-12-05 12:06:20', '2024-12-05 12:25:17'),
(1015, 1040, '1027', '1025', 'Regular Patient', 'Dr. Naveera', 'Infertility/Gynaecology/Obstetrice', 3000.00, 60.00, 40.00, 3000.00, 0.00, 3000.00, 'Cash', NULL, 0, 1, '2024-12-05 12:06:45', '2024-12-05 12:25:17'),
(1016, 1042, '1029', '1027', 'Regular Patient', 'Dr. Naveera', 'Infertility/Gynaecology/Obstetrice', 3000.00, 60.00, 40.00, 3000.00, 0.00, 3000.00, 'Cash', NULL, 0, 1, '2024-12-05 12:07:05', '2024-12-05 12:25:17'),
(1017, 1043, '1030', '1028', 'Regular Patient', 'Dr. Naveera', 'Infertility/Gynaecology/Obstetrice', 3000.00, 60.00, 40.00, 3000.00, 0.00, 3000.00, 'Cash', NULL, 0, 1, '2024-12-05 12:07:18', '2024-12-05 12:25:17'),
(1018, 1044, '1031', '1029', 'Regular Patient', 'Dr. Naveera', 'Infertility/Gynaecology/Obstetrice', 3000.00, 60.00, 40.00, 3000.00, 0.00, 3000.00, 'Cash', NULL, 0, 1, '2024-12-05 12:07:33', '2024-12-05 12:25:17'),
(1019, 1045, '1032', '1030', 'Regular Patient', 'Dr. Naveera', 'Infertility/Gynaecology/Obstetrice', 3000.00, 60.00, 40.00, 3000.00, 0.00, 3000.00, 'Online', NULL, 0, 1, '2024-12-05 12:07:49', '2024-12-05 12:25:17'),
(1020, 1046, '1033', '1031', 'Regular Patient', 'Dr. Naveera', 'Infertility/Gynaecology/Obstetrice', 3000.00, 60.00, 40.00, 3000.00, 0.00, 3000.00, 'CC', NULL, 0, 1, '2024-12-05 12:08:05', '2024-12-05 12:25:17'),
(1021, 1047, '1034', '1032', 'Regular Patient', 'Dr. Naveera', 'Infertility/Gynaecology/Obstetrice', 3000.00, 60.00, 40.00, 3000.00, 0.00, 3000.00, 'Cash', NULL, 0, 1, '2024-12-05 12:08:51', '2024-12-05 12:25:17'),
(1022, 1049, '1036', '1034', 'Regular Patient', 'Dr. Naveera', 'Infertility/Gynaecology/Obstetrice', 3000.00, 60.00, 40.00, 3000.00, 0.00, 3000.00, 'CC', NULL, 0, 1, '2024-12-05 12:09:11', '2024-12-05 12:25:17'),
(1023, 1050, '1037', '1035', 'Regular Patient', 'Dr. Naveera', 'Infertility/Gynaecology/Obstetrice', 3000.00, 60.00, 40.00, 3000.00, 0.00, 3000.00, 'Cash', NULL, 0, 1, '2024-12-05 12:09:30', '2024-12-05 12:25:17'),
(1024, 1051, '1038', '1036', 'Regular Patient', 'Dr. Naveera', 'Infertility/Gynaecology/Obstetrice', 3000.00, 60.00, 40.00, 3000.00, 0.00, 3000.00, 'CC', NULL, 0, 1, '2024-12-05 12:13:02', '2024-12-05 12:25:17'),
(1025, 1052, '1039', '1037', 'Free Consultancy', 'Dr. Naveera', 'Infertility/Gynaecology/Obstetrice', 3000.00, 60.00, 40.00, 3000.00, 0.00, 3000.00, 'Cash', NULL, 0, 1, '2024-12-05 12:15:11', '2024-12-05 12:25:17'),
(1026, 1053, '1040', '1038', 'Regular Patient', 'Dr. Naveera', 'Infertility/Gynaecology/Obstetrice', 3000.00, 60.00, 40.00, 3000.00, 0.00, 3000.00, 'Cash', NULL, 0, 1, '2024-12-05 12:19:34', '2024-12-05 12:25:17'),
(1027, 1054, '1041', '1039', 'Regular Patient', 'Dr. Naveera', 'Infertility/Gynaecology/Obstetrice', 3000.00, 60.00, 40.00, 3000.00, 0.00, 3000.00, 'Online', NULL, 0, 1, '2024-12-05 12:21:47', '2024-12-05 12:25:17'),
(1028, 1047, '1034', '1032', 'Regular Patient', 'Dr. Naveera', 'Infertility/Gynaecology/Obstetrice', 3000.00, 60.00, 40.00, 3000.00, 0.00, 3000.00, 'CC', NULL, 0, 0, '2024-12-05 12:27:30', '2024-12-05 12:27:30'),
(1029, 1001, '1001', '1001', 'Regular Patient', 'Dr Zaryab Setna', 'Infertility/Gynaecology/Obstetrice', 4000.00, 100.00, 0.00, 4000.00, 0.00, 4000.00, 'Cash', NULL, 0, 0, '2025-01-06 16:30:40', '2025-01-06 16:30:40'),
(1030, 1001, '1001', '1001', 'Regular Patient', NULL, NULL, 0.00, 0.00, 0.00, 1000.00, 0.00, 1000.00, 'Cash', NULL, 0, 0, '2025-01-14 10:51:03', '2025-01-14 10:51:03'),
(1031, 1036, '1023', '1021', 'Regular Patient', NULL, NULL, 0.00, 0.00, 0.00, 15000.00, 2000.00, 13000.00, 'Cash', 'discount is given by doctor Naveera', 0, 1, '2025-01-17 08:06:12', '2025-01-17 08:08:26'),
(1032, 1036, '1023', '1021', 'Regular Patient', 'Dr. Naveera', 'Infertility/Gynaecology/Obstetrice', 3000.00, 60.00, 40.00, 3000.00, 0.00, 3000.00, 'Cash', NULL, 0, 1, '2025-01-17 08:08:07', '2025-01-17 08:08:26'),
(1033, 1001, '1001', '1001', 'Regular Patient', 'Dr Zaryab Setna', 'Infertility/Gynaecology/Obstetrice', 4000.00, 100.00, 0.00, 4000.00, 0.00, 4000.00, 'Cash', NULL, 0, 1, '2025-01-21 18:58:56', '2025-01-21 19:35:16'),
(1034, 1046, '1033', '1031', 'Regular Patient', NULL, NULL, 0.00, 0.00, 0.00, 6000.00, 500.00, 5500.00, 'CC', '500 discount given by doctor', 0, 0, '2025-01-22 05:02:45', '2025-01-22 05:02:45'),
(1035, 1046, '1033', '1031', 'Regular Patient', NULL, NULL, 0.00, 0.00, 0.00, 95000.00, 5000.00, 90000.00, 'CC', '5000 discount', 0, 0, '2025-01-22 05:04:46', '2025-01-22 05:04:46'),
(1036, 1045, '1032', '1030', 'Regular Patient', NULL, NULL, 0.00, 0.00, 0.00, 4000.00, 0.00, 4000.00, 'CC', NULL, 0, 0, '2025-01-22 06:51:05', '2025-01-22 06:51:05'),
(1037, 1046, '1033', '1031', 'Regular Patient', 'Dr. Naveera', 'Infertility/Gynaecology/Obstetrice', 3000.00, 60.00, 40.00, 3000.00, 500.00, 2500.00, 'CC', 'Card payment done', 0, 1, '2025-01-24 10:59:26', '2025-01-24 10:59:53'),
(1038, 1046, '1033', '1031', 'Regular Patient', 'Dr. Naveera', 'Infertility/Gynaecology/Obstetrice', 3000.00, 60.00, 40.00, 3000.00, 2000.00, 1000.00, 'Cash', NULL, 0, 0, '2025-01-24 11:00:13', '2025-01-24 11:00:13'),
(1039, 1036, '1023', '1021', 'Regular Patient', NULL, NULL, 0.00, 0.00, 0.00, 83000.00, 0.00, 83000.00, 'Cash', NULL, 0, 1, '2025-03-24 06:27:16', '2025-03-24 08:56:59'),
(1040, 1036, '1023', '1021', 'Regular Patient', 'Dr. Naveera', 'Infertility/Gynaecology/Obstetrice', 3000.00, 60.00, 40.00, 3000.00, 0.00, 3000.00, 'Cash', NULL, 0, 1, '2025-03-24 06:29:01', '2025-03-24 08:56:59'),
(1041, 1060, '1047', '1045', 'Regular Patient', 'Dr Iqbal Shahzad', 'Urology', 4500.00, 55.00, 45.00, 4500.00, 500.00, 4000.00, 'Online', NULL, 1, 1, '2025-03-24 06:40:27', '2025-03-24 08:56:59'),
(1042, 1060, '1047', '1045', 'Regular Patient', 'Dr Iqbal Shahzad', 'Urology', 4500.00, 55.00, 45.00, 4500.00, 0.00, 4500.00, 'Cash', NULL, 0, 1, '2025-03-24 08:53:34', '2025-03-24 08:56:59');

-- --------------------------------------------------------

--
-- Table structure for table `payment_services`
--

CREATE TABLE `payment_services` (
  `id` bigint UNSIGNED NOT NULL,
  `payment_id` bigint UNSIGNED NOT NULL,
  `service_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `department_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `charges` decimal(10,2) NOT NULL DEFAULT '0.00',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payment_services`
--

INSERT INTO `payment_services` (`id`, `payment_id`, `service_name`, `department_name`, `charges`, `created_at`, `updated_at`) VALUES
(1, 1011, 'Blood Test', 'Laboratory', 1000.00, '2024-12-04 16:08:06', '2024-12-04 16:08:06'),
(2, 1011, 'Semen Analysis', 'Laboratory', 3000.00, '2024-12-04 16:08:06', '2024-12-04 16:08:06'),
(3, 1030, 'Blood Test', 'Laboratory', 1000.00, '2025-01-14 10:51:03', '2025-01-14 10:51:03'),
(4, 1031, 'Ultrasound', 'Ultrasound', 3500.00, '2025-01-17 08:06:12', '2025-01-17 08:06:12'),
(5, 1031, 'AZIZ MOMBANI', 'ANALYSIS', 3000.00, '2025-01-17 08:06:12', '2025-01-17 08:06:12'),
(6, 1031, 'Ultrasound', 'Ultrasound', 8500.00, '2025-01-17 08:06:12', '2025-01-17 08:06:12'),
(7, 1034, 'ALISHA IIS', 'Laboratory', 3000.00, '2025-01-22 05:02:45', '2025-01-22 05:02:45'),
(8, 1034, 'Semen Analysis', 'Laboratory', 3000.00, '2025-01-22 05:02:45', '2025-01-22 05:02:45'),
(9, 1035, 'Hair Prp', 'Clinic Coordinators', 15000.00, '2025-01-22 05:04:46', '2025-01-22 05:04:46'),
(10, 1035, 'Test Services', 'Endocrinology', 80000.00, '2025-01-22 05:04:46', '2025-01-22 05:04:46'),
(11, 1036, 'FWB', 'Ultrasound', 4000.00, '2025-01-22 06:51:05', '2025-01-22 06:51:05'),
(12, 1039, 'ALISHA IIS', 'Laboratory', 3000.00, '2025-03-24 06:27:16', '2025-03-24 06:27:16'),
(13, 1039, 'Test Services', 'Endocrinology', 80000.00, '2025-03-24 06:27:16', '2025-03-24 06:27:16');

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'View Settings', 'web', '2024-11-12 15:35:11', '2024-11-12 15:35:11'),
(2, 'Modify Settings', 'web', '2024-11-12 15:35:11', '2024-11-12 15:35:11'),
(3, 'View Roles', 'web', '2024-11-12 15:35:11', '2024-11-12 15:35:11'),
(4, 'Modify Roles', 'web', '2024-11-12 15:35:11', '2024-11-12 15:35:11'),
(5, 'View Users', 'web', '2024-11-12 15:35:11', '2024-11-12 15:35:11'),
(6, 'Modify Users', 'web', '2024-11-12 15:35:11', '2024-11-12 15:35:11'),
(7, 'Modify User Status', 'web', '2024-11-12 15:35:11', '2024-11-12 15:35:11'),
(8, 'All User Activity Logs', 'web', '2024-11-12 15:35:11', '2024-11-12 15:35:11'),
(9, 'Create Department', 'web', '2024-11-12 15:35:11', '2024-11-12 15:35:11'),
(10, 'Edit Department', 'web', '2024-11-12 15:35:11', '2024-11-12 15:35:11'),
(11, 'Delete Department', 'web', '2024-11-12 15:35:11', '2024-11-12 15:35:11'),
(12, 'View Department', 'web', '2024-11-12 15:35:11', '2024-11-12 15:35:11'),
(13, 'View Service', 'web', '2024-11-12 15:35:11', '2024-11-12 15:35:11'),
(14, 'Create Service', 'web', '2024-11-12 15:35:11', '2024-11-12 15:35:11'),
(15, 'Edit Service', 'web', '2024-11-12 15:35:11', '2024-11-12 15:35:11'),
(16, 'Delete Service', 'web', '2024-11-12 15:35:11', '2024-11-12 15:35:11'),
(17, 'View Doctor', 'web', '2024-11-12 15:35:11', '2024-11-12 15:35:11'),
(18, 'Create Doctor', 'web', '2024-11-12 15:35:11', '2024-11-12 15:35:11'),
(19, 'Edit Doctor', 'web', '2024-11-12 15:35:11', '2024-11-12 15:35:11'),
(20, 'Delete Doctor', 'web', '2024-11-12 15:35:11', '2024-11-12 15:35:11'),
(21, 'Modify Doctor Status', 'web', '2024-11-12 15:35:11', '2024-11-12 15:35:11'),
(22, 'View Patients', 'web', '2024-11-12 15:35:11', '2024-11-12 15:35:11'),
(23, 'Create Patients', 'web', '2024-11-12 15:35:11', '2024-11-12 15:35:11'),
(24, 'Edit Patients', 'web', '2024-11-12 15:35:11', '2024-11-12 15:35:11'),
(25, 'Delete Patients', 'web', '2024-11-12 15:35:11', '2024-11-12 15:35:11'),
(26, 'View Payments', 'web', '2024-11-12 15:35:11', '2024-11-12 15:35:11'),
(27, 'Add Charges', 'web', '2024-11-12 15:35:11', '2024-11-12 15:35:11'),
(28, 'Daily Closing', 'web', '2024-11-12 15:35:11', '2024-11-12 15:35:11'),
(29, 'Refund Payments', 'web', '2024-11-12 15:35:11', '2024-11-12 15:35:11'),
(30, 'View Reports', 'web', '2024-11-12 15:35:11', '2024-11-12 15:35:11'),
(31, 'View Doctor Daily Report', 'web', '2025-02-28 16:21:28', '2025-02-28 16:21:28');

-- --------------------------------------------------------

--
-- Table structure for table `qualifications`
--

CREATE TABLE `qualifications` (
  `id` bigint UNSIGNED NOT NULL,
  `doctor_id` bigint UNSIGNED NOT NULL,
  `degree` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `majors` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `institution` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `qualifications`
--

INSERT INTO `qualifications` (`id`, `doctor_id`, `degree`, `majors`, `institution`, `created_at`, `updated_at`) VALUES
(4, 3, 'dsjgwda', 'jkafeewh', 'kdshkhdf', '2024-12-01 18:02:55', '2024-12-01 18:02:55'),
(5, 4, 'ewtewt', 'wtewet', 'wtewtewte', '2024-12-02 05:51:33', '2024-12-02 05:51:33'),
(6, 2, 'Adegtret', 'feewr', 'egrgr', '2024-12-05 07:59:13', '2024-12-05 07:59:13'),
(7, 2, 'rewewr', 'rewewre', 'ewwerwer', '2024-12-05 07:59:13', '2024-12-05 07:59:13'),
(9, 5, 'MBBS', 'Ultrasonic', 'KMS', '2025-01-17 07:37:10', '2025-01-17 07:37:10'),
(10, 1, 'MBBS', 'Medicen', 'Dawo', '2025-01-20 11:08:01', '2025-01-20 11:08:01'),
(11, 6, 'MBBS', 'Ultrasonic', 'KMS', '2025-01-24 10:18:35', '2025-01-24 10:18:35');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'web', '2024-11-12 15:35:11', '2024-11-12 15:35:11'),
(2, 'Role 1', 'web', '2024-11-26 12:12:57', '2024-11-26 12:12:57');

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint UNSIGNED NOT NULL,
  `role_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1, 1),
(2, 1),
(3, 1),
(4, 1),
(5, 1),
(6, 1),
(7, 1),
(8, 1),
(9, 1),
(10, 1),
(11, 1),
(12, 1),
(13, 1),
(14, 1),
(15, 1),
(16, 1),
(17, 1),
(18, 1),
(19, 1),
(20, 1),
(21, 1),
(22, 1),
(23, 1),
(24, 1),
(25, 1),
(26, 1),
(27, 1),
(28, 1),
(29, 1),
(30, 1),
(31, 1),
(1, 2),
(3, 2),
(5, 2),
(12, 2),
(13, 2),
(17, 2),
(22, 2),
(26, 2),
(30, 2);

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `department_id` bigint UNSIGNED NOT NULL,
  `charges` decimal(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `name`, `department_id`, `charges`, `created_at`, `updated_at`) VALUES
(2, 'ALISHA IIS', 8, 3000.00, '2024-12-01 17:53:29', '2025-01-17 07:31:20'),
(3, 'Semen Analysis', 8, 3000.00, '2024-12-01 17:54:43', '2024-12-01 17:54:43'),
(4, 'Ultrasound', 7, 3500.00, '2024-12-01 17:55:53', '2024-12-01 17:55:53'),
(5, 'Hair Prp', 6, 15000.00, '2024-12-02 05:44:55', '2024-12-02 05:44:55'),
(6, 'Test Services', 5, 80000.00, '2024-12-13 10:48:19', '2024-12-13 10:48:19'),
(10, 'AZIZ MOMBANI', 10, 3000.00, '2025-01-15 10:03:44', '2025-01-15 10:03:44'),
(13, 'FWB', 7, 4000.00, '2025-01-22 06:48:37', '2025-01-22 06:48:37'),
(14, 'Test Service 24 Mar', 14, 2000.00, '2025-03-24 07:36:43', '2025-03-24 07:36:43');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` bigint UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `logo_light` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `logo_dark` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `fav_icon` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `smtp_email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `smtp_password` text COLLATE utf8mb4_unicode_ci,
  `smtp_host` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `smtp_port` int DEFAULT NULL,
  `encryption` enum('None','SSL','TLS') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'None',
  `enable_push_notifications` tinyint(1) NOT NULL DEFAULT '0',
  `onesignal_app_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `onesignal_api_key` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `enable_email_notifications` tinyint(1) NOT NULL DEFAULT '0',
  `enable_2fa` tinyint(1) NOT NULL DEFAULT '0',
  `require_2fa_for_users` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `title`, `description`, `logo_light`, `logo_dark`, `fav_icon`, `phone`, `email`, `smtp_email`, `smtp_password`, `smtp_host`, `smtp_port`, `encryption`, `enable_push_notifications`, `onesignal_app_id`, `onesignal_api_key`, `enable_email_notifications`, `enable_2fa`, `require_2fa_for_users`, `created_at`, `updated_at`) VALUES
(1, 'My Website', 'This is the default site description.', NULL, NULL, NULL, '123-456-7890', 'info@mywebsite.com', 'noreply@projectview.live', 'eyJpdiI6IlhvckxzcmN6dmduMnFxanp0dHBCREE9PSIsInZhbHVlIjoiUGM5dFkxSzVqd09TVGJYbDhvVzU3Zz09IiwibWFjIjoiMGJjYWQ5MzVjNTI4ODI1NWU1YjVjZjE3ZGYxMTU2YmZmMDc0MDZlOTc0MjFlNDk4OWUzNGE2ZWVhMjhlMTNjMyIsInRhZyI6IiJ9', 'projectview.live', 465, 'SSL', 0, NULL, NULL, 0, 0, 0, '2024-11-12 15:35:11', '2024-11-12 15:35:11');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `google2fa_secret` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_2fa_enabled` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `image`, `email`, `email_verified_at`, `password`, `remember_token`, `google2fa_secret`, `email_2fa_enabled`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'Admin', NULL, 'admin@themesbrand.com', NULL, '$2y$10$lC9z9FNo7I4aAwxWSnHqq.RNyCnSsNtWsEG.t.ocrXcSRDnPQFlbO', 'BhzzFJVeI9uYThVWdenDLa4KyAS6EaezYluW53USHleAY5IQG3sJuBlQx1WI', NULL, NULL, 1, '2024-11-12 15:35:11', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_event_subscriptions`
--

CREATE TABLE `user_event_subscriptions` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `event_id` bigint UNSIGNED NOT NULL,
  `notify_via_mail` tinyint(1) NOT NULL DEFAULT '0',
  `notify_via_one_signal` tinyint(1) NOT NULL DEFAULT '0',
  `notify_via_database` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activity_log`
--
ALTER TABLE `activity_log`
  ADD PRIMARY KEY (`id`),
  ADD KEY `subject` (`subject_type`,`subject_id`),
  ADD KEY `causer` (`causer_type`,`causer_id`),
  ADD KEY `activity_log_log_name_index` (`log_name`);

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `departments_name_unique` (`name`);

--
-- Indexes for table `doctors`
--
ALTER TABLE `doctors`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `doctors_doctor_id_unique` (`doctor_id`),
  ADD UNIQUE KEY `doctors_cnic_unique` (`cnic`),
  ADD KEY `doctors_department_id_foreign` (`department_id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `experiences`
--
ALTER TABLE `experiences`
  ADD PRIMARY KEY (`id`),
  ADD KEY `experiences_doctor_id_foreign` (`doctor_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notifications_notifiable_type_notifiable_id_index` (`notifiable_type`,`notifiable_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `patients`
--
ALTER TABLE `patients`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `patients_patient_cnic_unique` (`patient_cnic`),
  ADD UNIQUE KEY `patients_fc_number_unique` (`fc_number`),
  ADD UNIQUE KEY `patients_file_number_unique` (`file_number`),
  ADD KEY `patients_doctor_coordinator_id_foreign` (`doctor_coordinator_id`),
  ADD KEY `patients_doctor_id_foreign` (`doctor_id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `payments_patient_id_foreign` (`patient_id`);

--
-- Indexes for table `payment_services`
--
ALTER TABLE `payment_services`
  ADD PRIMARY KEY (`id`),
  ADD KEY `payment_services_payment_id_foreign` (`payment_id`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `qualifications`
--
ALTER TABLE `qualifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `qualifications_doctor_id_foreign` (`doctor_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`),
  ADD KEY `services_department_id_foreign` (`department_id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `user_event_subscriptions`
--
ALTER TABLE `user_event_subscriptions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_event_subscriptions_user_id_event_id_unique` (`user_id`,`event_id`),
  ADD KEY `user_event_subscriptions_event_id_foreign` (`event_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activity_log`
--
ALTER TABLE `activity_log`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=260;

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `doctors`
--
ALTER TABLE `doctors`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `experiences`
--
ALTER TABLE `experiences`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=143;

--
-- AUTO_INCREMENT for table `patients`
--
ALTER TABLE `patients`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1061;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1043;

--
-- AUTO_INCREMENT for table `payment_services`
--
ALTER TABLE `payment_services`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `qualifications`
--
ALTER TABLE `qualifications`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user_event_subscriptions`
--
ALTER TABLE `user_event_subscriptions`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `doctors`
--
ALTER TABLE `doctors`
  ADD CONSTRAINT `doctors_department_id_foreign` FOREIGN KEY (`department_id`) REFERENCES `departments` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `experiences`
--
ALTER TABLE `experiences`
  ADD CONSTRAINT `experiences_doctor_id_foreign` FOREIGN KEY (`doctor_id`) REFERENCES `doctors` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `patients`
--
ALTER TABLE `patients`
  ADD CONSTRAINT `patients_doctor_coordinator_id_foreign` FOREIGN KEY (`doctor_coordinator_id`) REFERENCES `doctors` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `patients_doctor_id_foreign` FOREIGN KEY (`doctor_id`) REFERENCES `doctors` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `payments`
--
ALTER TABLE `payments`
  ADD CONSTRAINT `payments_patient_id_foreign` FOREIGN KEY (`patient_id`) REFERENCES `patients` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `payment_services`
--
ALTER TABLE `payment_services`
  ADD CONSTRAINT `payment_services_payment_id_foreign` FOREIGN KEY (`payment_id`) REFERENCES `payments` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `qualifications`
--
ALTER TABLE `qualifications`
  ADD CONSTRAINT `qualifications_doctor_id_foreign` FOREIGN KEY (`doctor_id`) REFERENCES `doctors` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `services`
--
ALTER TABLE `services`
  ADD CONSTRAINT `services_department_id_foreign` FOREIGN KEY (`department_id`) REFERENCES `departments` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `user_event_subscriptions`
--
ALTER TABLE `user_event_subscriptions`
  ADD CONSTRAINT `user_event_subscriptions_event_id_foreign` FOREIGN KEY (`event_id`) REFERENCES `events` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `user_event_subscriptions_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
