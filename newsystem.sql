-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 20, 2019 at 01:00 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.1.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `newsystem`
--

-- --------------------------------------------------------

--
-- Table structure for table `allocation`
--

CREATE TABLE `allocation` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `project_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `is_delete` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `awsinstance`
--

CREATE TABLE `awsinstance` (
  `id` int(10) UNSIGNED NOT NULL,
  `aws_mid` int(10) UNSIGNED NOT NULL,
  `purpose` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ip` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pem_file` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `awsmaster`
--

CREATE TABLE `awsmaster` (
  `id` int(10) UNSIGNED NOT NULL,
  `aws_client` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `aws_url` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `aws_username` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `aws_password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `forbidden_keywords`
--

CREATE TABLE `forbidden_keywords` (
  `id` int(10) UNSIGNED NOT NULL,
  `keyword` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `foruminstance`
--

CREATE TABLE `foruminstance` (
  `id` int(10) UNSIGNED NOT NULL,
  `forum_mid` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `reply_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `answer` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `forummaster`
--

CREATE TABLE `forummaster` (
  `id` int(10) UNSIGNED NOT NULL,
  `project` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `task` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `question` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `posted_date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `market`
--

CREATE TABLE `market` (
  `id` int(10) UNSIGNED NOT NULL,
  `country` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `rising_talent` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `test` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lancer_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `upwork_password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `security_question` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `security_answer` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `series` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `running` tinyint(1) NOT NULL,
  `bid_date` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `memberdetail`
--

CREATE TABLE `memberdetail` (
  `id` int(10) UNSIGNED NOT NULL,
  `m_id` int(10) UNSIGNED NOT NULL,
  `task_` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `update_` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `track_` int(10) UNSIGNED NOT NULL,
  `screen_` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `member_logs`
--

CREATE TABLE `member_logs` (
  `id` int(10) UNSIGNED NOT NULL,
  `userid` int(10) UNSIGNED NOT NULL,
  `task` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `track_hour` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `validated` int(10) UNSIGNED NOT NULL,
  `penalty` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `log_date` date NOT NULL,
  `summary` varchar(1000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(2, '2018_04_12_101553_create_memberlog_table', 1),
(3, '2018_04_14_002017_create_member_detail_table', 1),
(4, '2018_04_17_121501_create_pictures_table', 1),
(5, '2018_04_23_125217_add_column_to_users_table', 1),
(6, '2018_04_24_130259_create_resources-management_table', 1),
(7, '2018_04_25_041401_create_project_tables', 1),
(8, '2018_04_25_041424_create_market_tables', 1),
(9, '2018_04_25_041424_create_upwork_tables', 1),
(10, '2018_04_25_041515_create_awsmaster_tables', 1),
(11, '2018_04_25_041536_create_awsinstance_tables', 1),
(12, '2018_04_25_041605_create_forummaster_tables', 1),
(13, '2018_04_25_041619_create_foruminstance_tables', 1),
(14, '2018_04_26_131746_create_tasks_table', 1),
(15, '2018_05_03_163556_create_user_infos_table', 1),
(16, '2018_05_09_101112_add_slack_workspace_table', 1),
(17, '2018_05_09_113927_add_columns_to_users_table', 1),
(18, '2018_05_11_071727_add_id_field_to_slack_workspace_table', 1),
(19, '2018_05_11_093933_add_slack_channel_field_to_userinfo_table', 1),
(20, '2018_05_14_073058_change_resources_table_name', 1),
(21, '2018_05_14_140959_add_project_id_field_to_user_infos_table', 1),
(22, '2018_05_15_064630_create_resource_details_table', 1),
(23, '2018_05_15_093008_add_meta_type_column_to_resource_details_table', 1),
(24, '2018_05_16_104655_add_project_id_to_resources_table', 1),
(25, '2018_05_17_072702_add_user_resources_relation_table', 1),
(26, '2018_05_17_122852_create_allocation_table', 1),
(27, '2018_05_18_071314_add_slack_tokens_table', 1),
(28, '2018_05_18_104039_changing_columns_on_slack_wokspaces_table', 1),
(29, '2018_05_18_123333_create_slack_chat_pair_table', 1),
(30, '2018_05_18_123919_update_resource-management', 1),
(31, '2018_05_18_140357_changing_columns_on_slack_workspaces_table_1', 1),
(32, '2018_05_18_143658_deleting_number_column_on_slack_wokspaces_table', 1),
(33, '2018_05_18_144438_change_column_type_resources', 1),
(34, '2018_05_18_195808_create_repositoryallocation_table', 1),
(35, '2018_05_18_200334_add_field_allocation', 1),
(36, '2018_05_18_200843_add_githubid_field_to_user', 1),
(37, '2018_05_19_080435_add_channel_id_column_to_users_table', 1),
(38, '2018_05_19_120225_add_name_column_to_slack_chat_pair_table', 1),
(39, '2018_05_21_083209_add_field_repositoryallocation', 1),
(40, '2018_05_21_232108_modify_field_repositoryallocation', 1),
(41, '2018_05_22_010103_add_defaults_to_users_table', 1),
(42, '2018_05_22_025451_drop_firstname_lastneame_users_table', 1),
(43, '2018_05_23_124623_create_taskcollocation_table', 1),
(44, '2018_05_23_145509_add_keywords_table', 1),
(45, '2018_05_23_174223_modify_field_project_table', 1),
(46, '2018_05_23_224131_modify_field_user_table', 1),
(47, '2018_05_23_224529_modify_field_userinfo_table', 1),
(48, '2018_05_24_222659_add_field_project_table', 1),
(49, '2018_05_25_072107_modify_field_market_table', 1),
(50, '2018_05_28_115936_add_field_users_table', 1),
(51, '2018_05_28_130224_modify_notefield_userinfo_table', 1),
(52, '2018_05_28_133510_add_status_to_market', 1),
(53, '2018_05_28_145904_modify_roomfield_user_table', 1),
(54, '2018_05_28_150116_modify_roomfield_userinfo_table', 1),
(55, '2018_05_29_053638_add_running_to_market', 1),
(56, '2018_05_29_064911_modify_state_to_market', 1),
(57, '2018_05_29_161440_delete_field_user_table', 1),
(58, '2018_05_29_164349_delete_field_userinfo_table', 1),
(59, '2018_05_30_034057_modify_field_repository_table', 1),
(60, '2018_05_30_063555_modify_running_field_to_market', 1),
(61, '2018_05_30_072353_remove_running_field_to_market', 1),
(62, '2018_05_30_072510_add_running_bool_field_to_market', 1),
(63, '2018_05_31_093516_delete_project_column_from_resources_table', 1),
(64, '2018_05_31_121648_add_templates_table', 1),
(65, '2018_06_04_081235_adding_columns_to_resource_details_table', 1),
(66, '2018_06_04_085033_modify_fields_on_market', 1),
(67, '2018_06_04_115713_modify_field_status_on_market', 1),
(68, '2018_06_05_093649_remove_status_from_market', 1),
(69, '2018_06_07_183357_modify_field_bid_date_market_table', 1),
(70, '2019_05_17_162443_create_skypedatas_table', 2),
(71, '2019_05_17_170146_add_pro_url_to_skypedatas', 3);

-- --------------------------------------------------------

--
-- Table structure for table `pictures`
--

CREATE TABLE `pictures` (
  `id` int(10) UNSIGNED NOT NULL,
  `m_id` int(10) UNSIGNED NOT NULL,
  `p_name` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `project`
--

CREATE TABLE `project` (
  `id` int(10) UNSIGNED NOT NULL,
  `p_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `p_client` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meet_time` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `price` double(10,2) DEFAULT NULL,
  `developer` int(11) DEFAULT NULL,
  `mode` int(11) DEFAULT NULL,
  `hot` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `level` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `repository_allocation`
--

CREATE TABLE `repository_allocation` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `repository` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_delete` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `git_username` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `invite_id` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `resources`
--

CREATE TABLE `resources` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `level` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `project_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `resource_details`
--

CREATE TABLE `resource_details` (
  `id` int(10) UNSIGNED NOT NULL,
  `resource_id` int(11) NOT NULL,
  `meta_key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_value` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `meta_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `file_content` blob NOT NULL,
  `file_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `skypedatas`
--

CREATE TABLE `skypedatas` (
  `id` int(10) UNSIGNED NOT NULL,
  `username` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `projectname` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `projectdes` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `skypename` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `pro_url` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `skypedatas`
--

INSERT INTO `skypedatas` (`id`, `username`, `email`, `projectname`, `projectdes`, `skypename`, `created_at`, `updated_at`, `pro_url`) VALUES
(1, 'yang jon', 'jon901@outlook.com', 'customization of Google Map API', 'This project is to make current map design more effectively', 'Cheng', NULL, NULL, 'https://www.freelancer.com/'),
(2, 'George', 'geos@outlook.com', 'Node server', 'this project is to develop server using Node websocket', 'Dave Powell', NULL, NULL, 'https://www.freelancer.com/'),
(3, 'Rodrio meza', 'RTm@outlook.com', 'Project for Rodrio', 'This project is to develop some API to manage Customser info', 'Pt Fe', NULL, NULL, 'https://www.freelancer.com/'),
(4, 'Lionel', 'mes@gmail.com', 'Python project for web design', 'This project is develop website using Wagtail', 'Andy Makoszsd', NULL, NULL, 'https://www.freelancer.com/');

-- --------------------------------------------------------

--
-- Table structure for table `slack_chat_pair`
--

CREATE TABLE `slack_chat_pair` (
  `id` int(10) UNSIGNED NOT NULL,
  `project_id` int(11) NOT NULL,
  `workspace_id_1` int(11) NOT NULL,
  `user_id_1` int(11) NOT NULL,
  `admin_id_1` int(11) NOT NULL,
  `workspace_id_2` int(11) NOT NULL,
  `user_id_2` int(11) NOT NULL,
  `admin_id_2` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `slack_tokens`
--

CREATE TABLE `slack_tokens` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `workspace_id` int(11) NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `slack_workspaces`
--

CREATE TABLE `slack_workspaces` (
  `id` int(10) UNSIGNED NOT NULL,
  `workspace_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `domain` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `id_` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tasks`
--

CREATE TABLE `tasks` (
  `id` int(10) UNSIGNED NOT NULL,
  `task_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `project_id` int(11) NOT NULL,
  `price` double(10,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `task_allocation`
--

CREATE TABLE `task_allocation` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `task_id` int(11) DEFAULT NULL,
  `is_delete` tinyint(4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `templates`
--

CREATE TABLE `templates` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `upwork`
--

CREATE TABLE `upwork` (
  `id` int(10) UNSIGNED NOT NULL,
  `country` int(11) NOT NULL,
  `date` date NOT NULL,
  `rising_talent` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `test` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bid_date` date NOT NULL,
  `lancer_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `upwork_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `upwork_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `security_question` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `security_answer` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `series` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `username` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `lastname` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `firstname` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `level` tinyint(4) NOT NULL DEFAULT '11',
  `type` tinyint(4) NOT NULL DEFAULT '2',
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `slack_user_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT '',
  `workspace_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT '',
  `github_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `channel_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `country` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `age` int(11) NOT NULL DEFAULT '0',
  `time_doctor_email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `time_doctor_password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `time_doctor_token` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` enum('run','running') COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_infos`
--

CREATE TABLE `user_infos` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `stack` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_resource_rel`
--

CREATE TABLE `user_resource_rel` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `resource_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `allocation`
--
ALTER TABLE `allocation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `awsinstance`
--
ALTER TABLE `awsinstance`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `awsmaster`
--
ALTER TABLE `awsmaster`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `forbidden_keywords`
--
ALTER TABLE `forbidden_keywords`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `foruminstance`
--
ALTER TABLE `foruminstance`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `forummaster`
--
ALTER TABLE `forummaster`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `market`
--
ALTER TABLE `market`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `memberdetail`
--
ALTER TABLE `memberdetail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `member_logs`
--
ALTER TABLE `member_logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pictures`
--
ALTER TABLE `pictures`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `project`
--
ALTER TABLE `project`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `repository_allocation`
--
ALTER TABLE `repository_allocation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `resources`
--
ALTER TABLE `resources`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `resource_details`
--
ALTER TABLE `resource_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `skypedatas`
--
ALTER TABLE `skypedatas`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `skypedatas_email_unique` (`email`);

--
-- Indexes for table `slack_chat_pair`
--
ALTER TABLE `slack_chat_pair`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `slack_tokens`
--
ALTER TABLE `slack_tokens`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `slack_workspaces`
--
ALTER TABLE `slack_workspaces`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `task_allocation`
--
ALTER TABLE `task_allocation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `templates`
--
ALTER TABLE `templates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `upwork`
--
ALTER TABLE `upwork`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `user_infos`
--
ALTER TABLE `user_infos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_resource_rel`
--
ALTER TABLE `user_resource_rel`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `allocation`
--
ALTER TABLE `allocation`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `awsinstance`
--
ALTER TABLE `awsinstance`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `awsmaster`
--
ALTER TABLE `awsmaster`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `forbidden_keywords`
--
ALTER TABLE `forbidden_keywords`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `foruminstance`
--
ALTER TABLE `foruminstance`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `forummaster`
--
ALTER TABLE `forummaster`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `market`
--
ALTER TABLE `market`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `memberdetail`
--
ALTER TABLE `memberdetail`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `member_logs`
--
ALTER TABLE `member_logs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT for table `pictures`
--
ALTER TABLE `pictures`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `project`
--
ALTER TABLE `project`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `repository_allocation`
--
ALTER TABLE `repository_allocation`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `resources`
--
ALTER TABLE `resources`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `resource_details`
--
ALTER TABLE `resource_details`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `skypedatas`
--
ALTER TABLE `skypedatas`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `slack_chat_pair`
--
ALTER TABLE `slack_chat_pair`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `slack_tokens`
--
ALTER TABLE `slack_tokens`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `slack_workspaces`
--
ALTER TABLE `slack_workspaces`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tasks`
--
ALTER TABLE `tasks`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `task_allocation`
--
ALTER TABLE `task_allocation`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `templates`
--
ALTER TABLE `templates`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `upwork`
--
ALTER TABLE `upwork`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_infos`
--
ALTER TABLE `user_infos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_resource_rel`
--
ALTER TABLE `user_resource_rel`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
