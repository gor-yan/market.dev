-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1
-- Время создания: Апр 10 2017 г., 16:39
-- Версия сервера: 10.1.13-MariaDB
-- Версия PHP: 5.6.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `market`
--

-- --------------------------------------------------------

--
-- Структура таблицы `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `categories`
--

INSERT INTO `categories` (`id`, `name`, `parent_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Web, Mobile & Software Dev', NULL, '2017-03-25 16:49:36', '2017-03-25 16:49:36', NULL),
(2, 'IT & Networking', NULL, '2017-03-25 16:49:36', '2017-03-25 16:49:36', NULL),
(3, 'Design & Creative', NULL, '2017-03-25 16:49:36', '2017-03-25 16:49:36', NULL),
(4, 'Web Development', 1, '2017-03-25 16:49:36', '2017-03-25 16:49:36', NULL),
(5, 'Mobile development', 1, '2017-03-25 16:49:36', '2017-03-25 16:49:36', NULL),
(6, 'DevOps', 2, '2017-03-25 16:49:36', '2017-03-25 16:49:36', NULL),
(7, 'Network Administration', 2, '2017-03-25 16:49:36', '2017-03-25 16:49:36', NULL),
(8, 'Web Design', 3, '2017-03-25 16:49:36', '2017-03-25 16:49:36', NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `category_job`
--

CREATE TABLE `category_job` (
  `id` int(10) UNSIGNED NOT NULL,
  `job_id` int(10) UNSIGNED NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `category_job`
--

INSERT INTO `category_job` (`id`, `job_id`, `category_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2017-04-01 12:43:54', '2017-04-01 12:43:54'),
(2, 1, 5, '2017-04-01 12:43:54', '2017-04-01 12:43:54'),
(3, 2, 1, '2017-04-01 12:44:39', '2017-04-01 12:44:39'),
(4, 2, 6, '2017-04-01 12:44:39', '2017-04-01 12:44:39'),
(5, 3, 2, '2017-04-02 04:01:51', '2017-04-02 04:01:51'),
(6, 3, 5, '2017-04-02 04:01:51', '2017-04-02 04:01:51');

-- --------------------------------------------------------

--
-- Структура таблицы `category_user`
--

CREATE TABLE `category_user` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `category_user`
--

INSERT INTO `category_user` (`id`, `user_id`, `category_id`, `created_at`, `updated_at`) VALUES
(14, 1, 4, '2017-03-25 17:32:04', '2017-03-25 17:32:04'),
(16, 1, 1, '2017-03-25 17:33:27', '2017-03-25 17:33:27'),
(18, 1, 5, '2017-03-26 05:07:02', '2017-03-26 05:07:02');

-- --------------------------------------------------------

--
-- Структура таблицы `jobs`
--

CREATE TABLE `jobs` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `attached_files` text COLLATE utf8mb4_unicode_ci,
  `type` enum('fixed','hourly') COLLATE utf8mb4_unicode_ci NOT NULL,
  `hourly_limit` int(11) DEFAULT NULL,
  `budget` double(8,2) NOT NULL,
  `status` enum('new','closed','progress','finished') COLLATE utf8mb4_unicode_ci NOT NULL,
  `open_untill` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `jobs`
--

INSERT INTO `jobs` (`id`, `user_id`, `title`, `description`, `attached_files`, `type`, `hourly_limit`, `budget`, `status`, `open_untill`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 2, 'Job Title', 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has\r\n                                                roots in a piece of classical Latin literature from 45 BC, making it over\r\n                                                2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney\r\n                                                College in Virginia,', '58dfd8ca944ad.pdf', 'hourly', 150, 650.00, 'new', '2017-04-30', '2017-04-01 12:43:54', '2017-04-01 15:44:01', NULL),
(2, 2, 'Job Title154', 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has\r\n                                                roots in a piece of classical Latin literature from 45 BC, making it over\r\n                                                2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney\r\n                                                College in Virginia,', '58dfd8f772016.pdf', 'hourly', 15087, 55078.00, 'new', '2017-04-29', '2017-04-01 12:44:39', '2017-04-01 12:44:39', NULL),
(3, 2, 'My Job', 'My Description', NULL, 'hourly', 80, 55.00, 'new', '2017-04-22', '2017-04-02 04:01:51', '2017-04-02 04:01:51', NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(12, '2014_10_12_000000_create_users_table', 1),
(13, '2014_10_12_100000_create_password_resets_table', 1),
(14, '2017_03_12_225941_create_categories_tbl', 1),
(15, '2017_03_12_230144_create_skills_tbl', 1),
(16, '2017_03_12_231610_create_freelancer_skills_tbl', 1),
(17, '2017_03_13_032302_create_cat_user_tbl', 1),
(18, '2017_03_15_055038_create_notifications_table', 1),
(19, '2017_03_15_070804_create_posted_jobs_table', 1),
(20, '2017_03_17_135107_add_country_iso_coulmn', 1),
(21, '2017_03_24_180035_create_user_portfolio_tbl', 1),
(22, '2017_03_24_180150_create_user_employment_tbl', 1),
(23, '2017_03_24_200854_create_user_education_tbl', 2),
(27, '2017_04_01_123118_create_jobs_table', 3),
(29, '2017_04_02_090641_proposals', 4);

-- --------------------------------------------------------

--
-- Структура таблицы `notifications`
--

CREATE TABLE `notifications` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_id` int(10) UNSIGNED NOT NULL,
  `notifiable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `data` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `proposals`
--

CREATE TABLE `proposals` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `job_id` int(10) UNSIGNED NOT NULL,
  `cover_letter` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rate` double(8,2) NOT NULL,
  `estimation` int(11) NOT NULL,
  `other_info` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `proposals`
--

INSERT INTO `proposals` (`id`, `user_id`, `job_id`, `cover_letter`, `rate`, `estimation`, `other_info`, `created_at`, `updated_at`) VALUES
(4, 1, 1, 'Test Cover Letter', 12.00, 156, NULL, '2017-04-02 06:26:05', '2017-04-08 08:03:39'),
(5, 1, 2, 'Test Cover Letter 2', 25.00, 14, NULL, '2017-04-08 06:28:01', '2017-04-08 08:04:15');

-- --------------------------------------------------------

--
-- Структура таблицы `skills`
--

CREATE TABLE `skills` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `skills`
--

INSERT INTO `skills` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Skill 1', '2017-03-25 16:50:39', '2017-03-25 16:50:39'),
(2, 'Skill 2', '2017-03-25 16:50:39', '2017-03-25 16:50:39'),
(3, 'Skill 3', '2017-03-25 16:50:39', '2017-03-25 16:50:39'),
(4, 'Skill 4', '2017-03-25 16:50:39', '2017-03-25 16:50:39'),
(5, 'Skill 5', '2017-03-25 16:50:39', '2017-03-25 16:50:39'),
(6, 'Skill 6', '2017-03-25 16:50:39', '2017-03-25 16:50:39'),
(7, 'Skill 7', '2017-03-25 16:50:39', '2017-03-25 16:50:39'),
(8, 'Skill 8', '2017-03-25 16:50:39', '2017-03-25 16:50:39');

-- --------------------------------------------------------

--
-- Структура таблицы `skill_job`
--

CREATE TABLE `skill_job` (
  `id` int(10) UNSIGNED NOT NULL,
  `job_id` int(10) UNSIGNED NOT NULL,
  `skill_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `skill_job`
--

INSERT INTO `skill_job` (`id`, `job_id`, `skill_id`, `created_at`, `updated_at`) VALUES
(1, 1, 2, '2017-04-01 12:43:54', '2017-04-01 12:43:54'),
(2, 2, 2, '2017-04-01 12:44:39', '2017-04-01 12:44:39'),
(3, 2, 3, '2017-04-01 12:44:39', '2017-04-01 12:44:39'),
(4, 2, 5, '2017-04-01 12:44:39', '2017-04-01 12:44:39'),
(5, 3, 2, '2017-04-02 04:01:51', '2017-04-02 04:01:51'),
(6, 3, 3, '2017-04-02 04:01:51', '2017-04-02 04:01:51'),
(7, 3, 4, '2017-04-02 04:01:51', '2017-04-02 04:01:51');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `userIdentity` char(36) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'user_58d57de9a4df3',
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `surname` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` enum('freelancer','client','superAdmin','admin') COLLATE utf8mb4_unicode_ci NOT NULL,
  `balance` decimal(8,2) DEFAULT NULL,
  `country` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country_iso` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address1` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address2` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `account_status` enum('filled','empty','blocked') COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `userIdentity`, `name`, `surname`, `email`, `password`, `role`, `balance`, `country`, `country_iso`, `city`, `address1`, `address2`, `phone`, `description`, `image`, `account_status`, `remember_token`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'user_58d57e2dccad3', 'Andrey ', 'Romanov', 'free@admin.com', '$2y$10$iy50QgmJ84H/kKTXX/qTTOcolW4jlj8OvI6MyP0xj8iuE80YTGIeS', 'freelancer', NULL, 'Andorra', 'ad', 'city', 'address1', 'address2', '123456798', 'Description  fgnhgfhf', '', 'filled', '9mb5aBgMOhCTR2ElHExiaE3fqLrMT9v6K7pYk8XlyzCGtNag0adAm8OG2rzT', '2017-03-24 16:14:37', '2017-03-26 05:12:24', NULL),
(2, 'user_58d57de9a4df3', 'Client', 'Client', 'admin@admin.com', '$2y$10$IpkC9fP6Pnjo6aMxyVWCEehdxhBj/UQBjmcMe5o31/YgyAGc6f.la', 'client', NULL, 'Russia', 'Ru', 'city', 'address1', 'address2', '123456798', 'DDesctiptionsdvsdvsvsDesctiptionsdvsdvsvsDesctiptionsdvsdvsvsDesctiptionsdvsdvsvsDesctiptionsdvsdvsvsDesctiptionsdvsdvsvsDesctiptionsdvsdvsvsDesctiptionsdvsdvsvsDesctiptionsdvsdvsvsDesctiptionsdvsdvsvsDesctiptionsdvsdvsvsDesctiptionsdvsdvsvsDe', NULL, 'filled', 'nkIhuwHMXuH5fTKCpYLFRgpNQUEVhvR17UwTo0wU8lGLQpa8oAmj3MPlmSxl', '2017-03-24 16:14:38', '2017-04-01 15:36:11', NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `user_education`
--

CREATE TABLE `user_education` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `university_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `degree` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `from` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `to` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `user_education`
--

INSERT INTO `user_education` (`id`, `user_id`, `university_name`, `degree`, `description`, `from`, `to`) VALUES
(3, 1, 'University Name', 'University  Degree', 'Description University', '2017-03-01', '2017-03-31'),
(5, 1, 'Univ Name', 'Univ Degree', 'Descccc', '2017-03-01', NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `user_employment`
--

CREATE TABLE `user_employment` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `office_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `position` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `from` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `to` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `user_employment`
--

INSERT INTO `user_employment` (`id`, `user_id`, `office_name`, `position`, `description`, `from`, `to`) VALUES
(1, 1, 'Office Name', 'Position', 'Desc For Office Job', '2017-03-10', '2017-03-30'),
(2, 1, 'Second Office', 'Second Position', 'Desc for Second Position', '2017-03-22', NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `user_portfolio`
--

CREATE TABLE `user_portfolio` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `user_portfolio`
--

INSERT INTO `user_portfolio` (`id`, `user_id`, `title`, `description`, `image`) VALUES
(17, 1, 'Dynamically add directives', 'Description', 'img_58d6e451783aa.jpg'),
(18, 1, 'My Title', 'Description', 'img_58d7851daef91.jpg');

-- --------------------------------------------------------

--
-- Структура таблицы `user_skill`
--

CREATE TABLE `user_skill` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `skill_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `user_skill`
--

INSERT INTO `user_skill` (`id`, `user_id`, `skill_id`, `created_at`, `updated_at`) VALUES
(7, 1, 5, '2017-03-25 17:35:34', '2017-03-25 17:35:34'),
(9, 1, 8, '2017-03-25 17:35:48', '2017-03-25 17:35:48');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `category_job`
--
ALTER TABLE `category_job`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_job_job_id_foreign` (`job_id`),
  ADD KEY `category_job_category_id_foreign` (`category_id`);

--
-- Индексы таблицы `category_user`
--
ALTER TABLE `category_user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_user_user_id_foreign` (`user_id`),
  ADD KEY `category_user_category_id_foreign` (`category_id`);

--
-- Индексы таблицы `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notifications_notifiable_id_notifiable_type_index` (`notifiable_id`,`notifiable_type`);

--
-- Индексы таблицы `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`),
  ADD KEY `password_resets_token_index` (`token`);

--
-- Индексы таблицы `proposals`
--
ALTER TABLE `proposals`
  ADD PRIMARY KEY (`id`),
  ADD KEY `proposals_job_id_foreign` (`job_id`),
  ADD KEY `proposals_user_id_foreign` (`user_id`);

--
-- Индексы таблицы `skills`
--
ALTER TABLE `skills`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `skill_job`
--
ALTER TABLE `skill_job`
  ADD PRIMARY KEY (`id`),
  ADD KEY `skill_job_job_id_foreign` (`job_id`),
  ADD KEY `skill_job_skill_id_foreign` (`skill_id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_useridentity_unique` (`userIdentity`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Индексы таблицы `user_education`
--
ALTER TABLE `user_education`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_education_user_id_foreign` (`user_id`);

--
-- Индексы таблицы `user_employment`
--
ALTER TABLE `user_employment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_employment_user_id_foreign` (`user_id`);

--
-- Индексы таблицы `user_portfolio`
--
ALTER TABLE `user_portfolio`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_portfolio_user_id_foreign` (`user_id`);

--
-- Индексы таблицы `user_skill`
--
ALTER TABLE `user_skill`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_skill_user_id_foreign` (`user_id`),
  ADD KEY `user_skill_skill_id_foreign` (`skill_id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT для таблицы `category_job`
--
ALTER TABLE `category_job`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT для таблицы `category_user`
--
ALTER TABLE `category_user`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT для таблицы `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT для таблицы `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
--
-- AUTO_INCREMENT для таблицы `proposals`
--
ALTER TABLE `proposals`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT для таблицы `skills`
--
ALTER TABLE `skills`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT для таблицы `skill_job`
--
ALTER TABLE `skill_job`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT для таблицы `user_education`
--
ALTER TABLE `user_education`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT для таблицы `user_employment`
--
ALTER TABLE `user_employment`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT для таблицы `user_portfolio`
--
ALTER TABLE `user_portfolio`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT для таблицы `user_skill`
--
ALTER TABLE `user_skill`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `category_job`
--
ALTER TABLE `category_job`
  ADD CONSTRAINT `category_job_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `category_job_job_id_foreign` FOREIGN KEY (`job_id`) REFERENCES `jobs` (`id`);

--
-- Ограничения внешнего ключа таблицы `category_user`
--
ALTER TABLE `category_user`
  ADD CONSTRAINT `category_user_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `category_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Ограничения внешнего ключа таблицы `proposals`
--
ALTER TABLE `proposals`
  ADD CONSTRAINT `proposals_job_id_foreign` FOREIGN KEY (`job_id`) REFERENCES `jobs` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `proposals_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `skill_job`
--
ALTER TABLE `skill_job`
  ADD CONSTRAINT `skill_job_job_id_foreign` FOREIGN KEY (`job_id`) REFERENCES `jobs` (`id`),
  ADD CONSTRAINT `skill_job_skill_id_foreign` FOREIGN KEY (`skill_id`) REFERENCES `skills` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `user_education`
--
ALTER TABLE `user_education`
  ADD CONSTRAINT `user_education_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Ограничения внешнего ключа таблицы `user_employment`
--
ALTER TABLE `user_employment`
  ADD CONSTRAINT `user_employment_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Ограничения внешнего ключа таблицы `user_portfolio`
--
ALTER TABLE `user_portfolio`
  ADD CONSTRAINT `user_portfolio_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Ограничения внешнего ключа таблицы `user_skill`
--
ALTER TABLE `user_skill`
  ADD CONSTRAINT `user_skill_skill_id_foreign` FOREIGN KEY (`skill_id`) REFERENCES `skills` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `user_skill_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
