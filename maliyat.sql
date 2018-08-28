-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le :  mar. 28 août 2018 à 16:48
-- Version du serveur :  10.1.35-MariaDB
-- Version de PHP :  7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `maliyat`
--

-- --------------------------------------------------------

--
-- Structure de la table `banks`
--

CREATE TABLE `banks` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `account_number` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `initial_balance` double(8,2) NOT NULL,
  `current_balance` double(8,2) NOT NULL,
  `iban_number` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `percentage_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `percentage_value` double(8,2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `banks`
--

INSERT INTO `banks` (`id`, `name`, `account_number`, `initial_balance`, `current_balance`, `iban_number`, `percentage_name`, `percentage_value`, `created_at`, `updated_at`) VALUES
(1, 'بنك مصر', '111-222-333', 1500.00, 2200.00, '123456789', NULL, NULL, '2018-08-28 11:42:36', '2018-08-28 12:00:00'),
(2, 'بنك البركة', '555 222 480', 3000.00, 1545.00, '987654321', NULL, NULL, '2018-08-28 11:43:08', '2018-08-28 12:00:21'),
(3, 'بنك الزيتونة', '12121212', 2500.00, 3900.00, '1005002', 'نسبة زيتونية', 5.00, '2018-08-28 11:43:59', '2018-08-28 12:00:46');

-- --------------------------------------------------------

--
-- Structure de la table `bank_transfers`
--

CREATE TABLE `bank_transfers` (
  `id` int(10) UNSIGNED NOT NULL,
  `from_bank_id` int(11) NOT NULL,
  `to_bank_id` int(11) NOT NULL,
  `transfer_amount` double(8,2) NOT NULL,
  `net_transfer_amount` double(8,2) NOT NULL,
  `percentage_id` int(11) DEFAULT NULL,
  `transfer_percentage` double(8,2) NOT NULL,
  `attachement` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `bank_transfers`
--

INSERT INTO `bank_transfers` (`id`, `from_bank_id`, `to_bank_id`, `transfer_amount`, `net_transfer_amount`, `percentage_id`, `transfer_percentage`, `attachement`, `created_at`, `updated_at`) VALUES
(1, 1, 2, 500.00, 495.00, 1, 5.00, NULL, '2018-08-28 11:45:02', '2018-08-28 11:45:02'),
(2, 2, 3, 1000.00, 800.00, 2, 200.00, NULL, '2018-08-28 11:45:25', '2018-08-28 11:45:25'),
(3, 2, 1, 1000.00, 1000.00, NULL, 0.00, NULL, '2018-08-28 11:45:59', '2018-08-28 11:45:59');

-- --------------------------------------------------------

--
-- Structure de la table `clients`
--

CREATE TABLE `clients` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `attachement` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `clients`
--

INSERT INTO `clients` (`id`, `name`, `description`, `attachement`, `created_at`, `updated_at`) VALUES
(1, 'employee', NULL, NULL, '2018-08-28 11:49:45', '2018-08-28 11:49:45'),
(2, 'بليغ', 'أخي في الله', NULL, '2018-08-28 11:50:17', '2018-08-28 11:50:17');

-- --------------------------------------------------------

--
-- Structure de la table `employees`
--

CREATE TABLE `employees` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `task_id` int(11) NOT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `attachement` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `employees`
--

INSERT INTO `employees` (`id`, `name`, `phone`, `email`, `task_id`, `description`, `attachement`, `created_at`, `updated_at`) VALUES
(1, 'محمد أحمد', '22334455', 'mouhamed_ahmed@gmail.com', 1, 'مبرمج جديد', NULL, '2018-08-28 11:52:45', '2018-08-28 11:52:45'),
(2, 'علي بن سلامة', '00966121255', 'alislama@hotmail.fr', 2, 'علي القوي', NULL, '2018-08-28 11:54:39', '2018-08-28 11:54:39');

-- --------------------------------------------------------

--
-- Structure de la table `employee_accounts`
--

CREATE TABLE `employee_accounts` (
  `id` int(10) UNSIGNED NOT NULL,
  `bank_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bank_account_number` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `paypal_email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `check_number` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `transfer_method_id` int(11) NOT NULL,
  `other_method_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `other_method_number` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `default_number` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `employee_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `employee_accounts`
--

INSERT INTO `employee_accounts` (`id`, `bank_name`, `bank_account_number`, `paypal_email`, `check_number`, `transfer_method_id`, `other_method_name`, `other_method_number`, `default_number`, `employee_id`, `created_at`, `updated_at`) VALUES
(1, NULL, NULL, 'mouhamed_ahmed@gmail.com', NULL, 1, NULL, NULL, NULL, 1, '2018-08-28 11:52:45', '2018-08-28 11:52:45'),
(2, 'بنك الراجحي', '553 412 540', NULL, NULL, 2, NULL, NULL, NULL, 2, '2018-08-28 11:54:40', '2018-08-28 11:54:40'),
(3, 'بنك الراجحي', '441 682 960', NULL, NULL, 2, NULL, NULL, NULL, 2, '2018-08-28 11:54:40', '2018-08-28 11:54:40');

-- --------------------------------------------------------

--
-- Structure de la table `expected_payments`
--

CREATE TABLE `expected_payments` (
  `id` int(10) UNSIGNED NOT NULL,
  `project_id` int(11) NOT NULL,
  `index` int(11) NOT NULL,
  `value` double(8,2) NOT NULL,
  `paid_value` double(8,2) NOT NULL,
  `remaining_value` double(8,2) NOT NULL,
  `date` datetime NOT NULL,
  `state` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `expected_payments`
--

INSERT INTO `expected_payments` (`id`, `project_id`, `index`, `value`, `paid_value`, `remaining_value`, `date`, `state`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 200.00, 200.00, 0.00, '2018-08-05 12:57:12', 'Paid', '2018-08-28 11:57:12', '2018-08-28 12:00:00'),
(2, 1, 2, 150.00, 50.00, 100.00, '2018-08-15 12:57:12', 'Unpaid', '2018-08-28 11:57:12', '2018-08-28 12:00:21'),
(3, 1, 3, 150.00, 0.00, 150.00, '2018-08-31 12:57:12', 'Unpaid', '2018-08-28 11:57:12', '2018-08-28 11:57:12'),
(4, 2, 1, 1000.00, 600.00, 400.00, '2018-07-25 12:58:59', 'Unpaid', '2018-08-28 11:58:59', '2018-08-28 12:00:46'),
(5, 2, 2, 600.00, 0.00, 600.00, '2018-08-30 12:58:59', 'Unpaid', '2018-08-28 11:58:59', '2018-08-28 11:58:59'),
(6, 2, 3, 400.00, 0.00, 400.00, '2018-09-05 12:58:59', 'Unpaid', '2018-08-28 11:58:59', '2018-08-28 11:58:59'),
(7, 2, 4, 500.00, 0.00, 500.00, '2018-09-06 12:58:59', 'Unpaid', '2018-08-28 11:58:59', '2018-08-28 11:58:59');

-- --------------------------------------------------------

--
-- Structure de la table `expenses`
--

CREATE TABLE `expenses` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expense_type_id` int(11) NOT NULL,
  `details` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `project_id` int(11) NOT NULL,
  `service_id` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `bank_id` int(11) NOT NULL,
  `transfer_method_id` int(11) NOT NULL,
  `value` double(8,2) NOT NULL,
  `value_plus_percentage` double(8,2) NOT NULL,
  `percentage_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` datetime NOT NULL,
  `attachement` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `expense_types`
--

CREATE TABLE `expense_types` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `expense_types`
--

INSERT INTO `expense_types` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'مشروع', '2018-08-28 11:22:09', '2018-08-28 11:22:09'),
(2, 'خدمة', '2018-08-28 11:22:15', '2018-08-28 11:22:15'),
(3, 'مكافئة', '2018-08-28 11:23:19', '2018-08-28 11:23:19'),
(4, 'عمولة', '2018-08-28 11:23:24', '2018-08-28 11:23:24');

-- --------------------------------------------------------

--
-- Structure de la table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2018_08_04_133450_create_clients_table', 1),
(4, '2018_08_04_144228_create_tasks_table', 1),
(5, '2018_08_06_104325_create_transfer_methods_table', 1),
(6, '2018_08_06_130139_create_employees_table', 1),
(7, '2018_08_06_140225_create_employee_accounts_table', 1),
(8, '2018_08_10_103611_create_settings_table', 1),
(9, '2018_08_10_105807_create_expense_types_table', 1),
(10, '2018_08_10_145657_create_banks_table', 1),
(11, '2018_08_12_194354_create_percentages_table', 1),
(12, '2018_08_12_211900_create_bank_transfers_table', 1),
(13, '2018_08_16_102441_create_projects_table', 1),
(14, '2018_08_16_111546_create_expected_payments_table', 1),
(15, '2018_08_17_080008_create_real_payments_table', 1),
(16, '2018_08_20_150528_create_services_table', 1),
(17, '2018_08_23_092814_create_expenses_table', 1);

-- --------------------------------------------------------

--
-- Structure de la table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `percentages`
--

CREATE TABLE `percentages` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` double(8,2) NOT NULL,
  `remarks` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `percentages`
--

INSERT INTO `percentages` (`id`, `name`, `value`, `remarks`, `created_at`, `updated_at`) VALUES
(1, 'نسبة تشغيلية', 1.00, 'نسبة تشغيلية', '2018-08-28 11:44:26', '2018-08-28 11:44:26'),
(2, 'نسبة مسقطة', 20.00, 'نسبة مسقطة مالحيط', '2018-08-28 11:44:49', '2018-08-28 11:44:49');

-- --------------------------------------------------------

--
-- Structure de la table `projects`
--

CREATE TABLE `projects` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `start_date` datetime NOT NULL,
  `end_date` datetime NOT NULL,
  `details` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `client_id` int(11) NOT NULL,
  `total_cost` double(8,2) NOT NULL,
  `attachement` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remarks` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `finished` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `projects`
--

INSERT INTO `projects` (`id`, `name`, `start_date`, `end_date`, `details`, `client_id`, `total_cost`, `attachement`, `remarks`, `finished`, `created_at`, `updated_at`) VALUES
(1, 'تصميم موقع خيرتك', '2018-08-03 12:57:11', '2018-09-01 12:57:11', 'تصميم موقع خيرتك باستخدام laravel', 1, 500.00, 'micro0.1554433_1535461031.jpg', NULL, 0, '2018-08-28 11:57:11', '2018-08-28 11:57:11'),
(2, 'برمجة اغوية', '2018-07-04 12:58:59', '2018-09-06 12:58:59', 'لا توجد', 2, 2500.00, NULL, NULL, 1, '2018-08-28 11:58:59', '2018-08-28 11:59:30');

-- --------------------------------------------------------

--
-- Structure de la table `real_payments`
--

CREATE TABLE `real_payments` (
  `id` int(10) UNSIGNED NOT NULL,
  `expected_payment_id` int(11) NOT NULL,
  `project_id` int(11) NOT NULL,
  `paid_value` double(8,2) NOT NULL,
  `transfer_method_id` int(11) DEFAULT NULL,
  `to_bank_id` int(11) NOT NULL,
  `date` datetime NOT NULL,
  `from_bank_id` int(11) DEFAULT NULL,
  `from_bank_number` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `check_number` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `paypal_email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `transferer_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `attachement` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `real_payments`
--

INSERT INTO `real_payments` (`id`, `expected_payment_id`, `project_id`, `paid_value`, `transfer_method_id`, `to_bank_id`, `date`, `from_bank_id`, `from_bank_number`, `check_number`, `paypal_email`, `transferer_name`, `attachement`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 200.00, NULL, 1, '2018-08-28 13:00:01', NULL, NULL, NULL, NULL, 'ربيع', NULL, '2018-08-28 12:00:01', '2018-08-28 12:00:01'),
(2, 2, 1, 50.00, 1, 2, '2018-08-28 13:00:21', NULL, NULL, NULL, 'paypal@mail.com', NULL, NULL, '2018-08-28 12:00:21', '2018-08-28 12:00:21'),
(3, 4, 2, 600.00, 2, 3, '2018-08-28 13:00:46', 2, '123123123', NULL, NULL, NULL, NULL, '2018-08-28 12:00:46', '2018-08-28 12:00:46');

-- --------------------------------------------------------

--
-- Structure de la table `services`
--

CREATE TABLE `services` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_cost` double(8,2) DEFAULT NULL,
  `start_date` datetime DEFAULT NULL,
  `end_date` datetime DEFAULT NULL,
  `details` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `attachement` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remarks` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `finished` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `settings`
--

CREATE TABLE `settings` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `settings`
--

INSERT INTO `settings` (`id`, `title`, `created_at`, `updated_at`) VALUES
(1, 'نظام الماليات', NULL, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `tasks`
--

CREATE TABLE `tasks` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `tasks`
--

INSERT INTO `tasks` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'مبرمج', '2018-08-28 11:21:59', '2018-08-28 11:21:59'),
(2, 'مصمم', '2018-08-28 11:22:03', '2018-08-28 11:22:03');

-- --------------------------------------------------------

--
-- Structure de la table `transfer_methods`
--

CREATE TABLE `transfer_methods` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `transfer_methods`
--

INSERT INTO `transfer_methods` (`id`, `name`, `created_at`, `updated_at`) VALUES
(0, 'أخرى', '2018-08-28 11:24:19', '2018-08-28 11:24:19'),
(1, 'باي بال', '2018-08-28 11:23:56', '2018-08-28 11:23:56'),
(2, 'بنك', '2018-08-28 11:24:08', '2018-08-28 11:24:08'),
(3, 'شيك', '2018-08-28 11:24:12', '2018-08-28 11:24:12');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `username` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `permissions` varchar(1200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `remember_token`, `phone`, `description`, `photo`, `permissions`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@admin.com', '$2y$12$UatY12z8rSEIK4bZhiVDBewZCOOm7ytXc6OQwv4SM48hCgLdjLShq', NULL, '0', NULL, 'noimage.jpg', NULL, NULL, NULL),
(2, 'ربيع', 'rabibenyoussef@hotmail.fr', '$2y$10$GHx2kUh6ugAwXsheqN2NxOdFM4j.8vkkwMFGVApJG9YQM9aJFfZe.', NULL, '96536335', NULL, 'noimage.jpg', 'a:37:{i:0;s:10:\"projectAdd\";i:1;s:11:\"projectEdit\";i:2;s:13:\"projectDelete\";i:3;s:11:\"projectShow\";i:4;s:15:\"projectDownload\";i:5;s:10:\"serviceAdd\";i:6;s:11:\"serviceEdit\";i:7;s:13:\"serviceDelete\";i:8;s:11:\"serviceShow\";i:9;s:15:\"serviceDownload\";i:10;s:10:\"paymentAdd\";i:11;s:11:\"paymentEdit\";i:12;s:13:\"paymentDelete\";i:13;s:11:\"paymentShow\";i:14;s:19:\"paymentDownloadPaid\";i:15;s:23:\"paymentDownloadReceived\";i:16;s:10:\"expenseAdd\";i:17;s:11:\"expenseEdit\";i:18;s:13:\"expenseDelete\";i:19;s:11:\"expenseShow\";i:20;s:19:\"expenseDownloadPain\";i:21;s:23:\"expenseDownloadReceived\";i:22;s:18:\"settingsGeneralAdd\";i:23;s:19:\"settingsGeneralEdit\";i:24;s:15:\"settingsBankAdd\";i:25;s:16:\"settingsBankEdit\";i:26;s:16:\"settingsTransfer\";i:27;s:21:\"settingsPercentageAdd\";i:28;s:12:\"usersUserAdd\";i:29;s:14:\"usersClientAdd\";i:30;s:16:\"usersEmployeeAdd\";i:31;s:13:\"usersUserEdit\";i:32;s:15:\"usersClientEdit\";i:33;s:17:\"usersEmployeeEdit\";i:34;s:15:\"usersUserDelete\";i:35;s:17:\"usersClientDelete\";i:36;s:19:\"usersEmployeeDelete\";}', '2018-08-28 11:48:29', '2018-08-28 11:48:29'),
(3, 'Issam', 'issam@gmail.com', '$2y$10$qohBNOQ01M9/blAU8eLVheXOGlep71G83VpNSHL7Ibnx7lh3L4awu', NULL, '20202020', NULL, 'noimage.jpg', 'a:10:{i:0;s:10:\"projectAdd\";i:1;s:11:\"projectEdit\";i:2;s:11:\"projectShow\";i:3;s:10:\"serviceAdd\";i:4;s:11:\"serviceEdit\";i:5;s:11:\"serviceShow\";i:6;s:10:\"expenseAdd\";i:7;s:11:\"expenseEdit\";i:8;s:11:\"expenseShow\";i:9;s:23:\"expenseDownloadReceived\";}', '2018-08-28 11:49:31', '2018-08-28 11:49:31');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `banks`
--
ALTER TABLE `banks`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `bank_transfers`
--
ALTER TABLE `bank_transfers`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `employee_accounts`
--
ALTER TABLE `employee_accounts`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `expected_payments`
--
ALTER TABLE `expected_payments`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `expenses`
--
ALTER TABLE `expenses`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `expense_types`
--
ALTER TABLE `expense_types`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Index pour la table `percentages`
--
ALTER TABLE `percentages`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `real_payments`
--
ALTER TABLE `real_payments`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `transfer_methods`
--
ALTER TABLE `transfer_methods`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `banks`
--
ALTER TABLE `banks`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `bank_transfers`
--
ALTER TABLE `bank_transfers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `clients`
--
ALTER TABLE `clients`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `employee_accounts`
--
ALTER TABLE `employee_accounts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `expected_payments`
--
ALTER TABLE `expected_payments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `expenses`
--
ALTER TABLE `expenses`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `expense_types`
--
ALTER TABLE `expense_types`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT pour la table `percentages`
--
ALTER TABLE `percentages`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `projects`
--
ALTER TABLE `projects`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `real_payments`
--
ALTER TABLE `real_payments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `services`
--
ALTER TABLE `services`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `tasks`
--
ALTER TABLE `tasks`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `transfer_methods`
--
ALTER TABLE `transfer_methods`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
