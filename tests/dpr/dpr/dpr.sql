-- phpMyAdmin SQL Dump
-- version 4.5.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 22, 2016 at 09:05 PM
-- Server version: 5.7.11
-- PHP Version: 5.6.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dpr`
--

-- --------------------------------------------------------

--
-- Table structure for table `available_jobs`
--

CREATE TABLE `available_jobs` (
  `id` int(11) NOT NULL COMMENT 'serial indexing for storage and retrieval',
  `ref_no` varchar(10) NOT NULL COMMENT 'reference number of the opening',
  `position` varchar(50) NOT NULL COMMENT 'position',
  `qualification` varchar(100) NOT NULL COMMENT 'qualification required',
  `created_at` timestamp NULL DEFAULT NULL COMMENT AS `date and time the information was created`,
  `updated_at` timestamp NULL DEFAULT NULL COMMENT AS `date and time the information was modified`,
  `description` text NOT NULL,
  `type` int(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `available_jobs`
--

INSERT INTO `available_jobs` (`id`, `ref_no`, `position`, `qualification`, `created_at`, `updated_at`, `description`, `type`) VALUES
(1, 'dpr/333', 'Architect', 'Bsc', NULL, NULL, 'LOrem ipseumACVVVVVVLOrem ipseumACVVVVVVLOrem ipseumACVVVVVVLOrem ipseumACVVVVVVLOrem ipseumACVVVVVVLOrem ipseumACVVVVVVLOrem ipseumACVVVVVVLOrem ipseumACVVVVVVLOrem ipseumACVVVVVVLOrem ipseumACVVVVVVLOrem ipseumACVVVVVVLOrem ipseumACVVVVVVLOrem ipseumACVVVVVVLOrem ipseumACVVVVVVLOrem ipseumACVVVVVVLOrem ipseumACVVVVVVLOrem ipseumACVVVVVVLOrem ipseumACVVVVVVLOrem ipseumACVVVVVVLOrem ipseumACVVVVVVLOrem ipseumACVVVVVVLOrem ipseumACVVVVVV', 1);

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` bigint(20) NOT NULL,
  `user_ref` bigint(20) NOT NULL,
  `street` text NOT NULL COMMENT 'the street and street number ',
  `city` varchar(100) NOT NULL COMMENT 'city where the applicant stays',
  `state` varchar(20) NOT NULL COMMENT 'state where the user stays which might be different from the state of origin',
  `state_origin` varchar(20) NOT NULL COMMENT 'state of origin',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `institutions`
--

CREATE TABLE `institutions` (
  `id` bigint(20) NOT NULL COMMENT 'serial number for indexing the users for better retrieval',
  `user_ref` bigint(20) NOT NULL COMMENT 'a foreign key that references the user id in the users table to identify a particular user to his or her educational information',
  `name` varchar(200) NOT NULL COMMENT 'name of the institution',
  `start_month` varchar(10) NOT NULL COMMENT 'the month the applicant started the institution',
  `start_year` int(11) NOT NULL COMMENT 'the year of entry into the institution',
  `end_month` varchar(10) NOT NULL COMMENT 'the month the applicant graduated from the selected institution',
  `end_year` int(11) NOT NULL COMMENT 'the year the applicant graduated from the institution',
  `qualification` varchar(100) NOT NULL COMMENT 'the qualification accuqired from the institution',
  `created_at` timestamp NULL DEFAULT NULL COMMENT AS `the date and time the information was created`,
  `updated_at` timestamp NULL DEFAULT NULL COMMENT AS `the date and time the information was updated`
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2014_10_12_000000_create_users_table', 1),
('2014_10_12_100000_create_password_resets_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `professional_quals`
--

CREATE TABLE `professional_quals` (
  `id` bigint(20) NOT NULL COMMENT 'serial number for quick referencing',
  `user_ref` bigint(20) NOT NULL COMMENT 'the user reference number, a foreign key to identify specific users from the users table',
  `name` varchar(200) NOT NULL COMMENT 'the name of the professional body',
  `start_month` varchar(20) NOT NULL COMMENT 'month the professional qualification was obtained',
  `start_year` int(11) NOT NULL COMMENT 'year the professional qualification was obtained',
  `end_month` varchar(20) DEFAULT NULL COMMENT AS `month the qualification will expire or be due for renewal where applicable`,
  `end_year` int(11) DEFAULT NULL COMMENT AS `year the qualification will expire or due for renewal where applicable`,
  `created_at` timestamp NULL DEFAULT NULL COMMENT AS `date and time the information was uploaded`,
  `updated_at` timestamp NULL DEFAULT NULL COMMENT AS `date and time the information was modified`
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `qualifications_required`
--

CREATE TABLE `qualifications_required` (
  `id` int(11) NOT NULL COMMENT 'serial number for referencing, storage and retrieval',
  `ref_no` varchar(10) NOT NULL COMMENT 'foreign key to link the referenced job in the experienced_hire and graduate_trainee table',
  `qualification` varchar(100) NOT NULL COMMENT 'qualification required',
  `created_at` timestamp NULL DEFAULT NULL COMMENT AS `date and time the information was uploaded`,
  `updated_at` timestamp NULL DEFAULT NULL COMMENT AS `date and time the information was uploaded`
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `referees`
--

CREATE TABLE `referees` (
  `id` bigint(20) NOT NULL COMMENT 'serial indexing for better storage and retrieval',
  `user_ref` bigint(20) NOT NULL COMMENT 'foreign key to reference the applicants unique information',
  `name` varchar(100) NOT NULL COMMENT 'name of the referee',
  `organization` varchar(200) NOT NULL COMMENT 'the organization the referee works in',
  `position` varchar(100) NOT NULL COMMENT 'position of the employee at the organization',
  `email` varchar(100) NOT NULL COMMENT 'referees email in case of verification',
  `primary_phone` varchar(13) NOT NULL COMMENT 'referees phone number ',
  `sec_phone` varchar(13) DEFAULT NULL COMMENT AS `referees alternative phone number where applicable`,
  `created_at` timestamp NULL DEFAULT NULL COMMENT AS `the date and time information was uploaded`,
  `updated_at` timestamp NULL DEFAULT NULL COMMENT AS `the date and time the information was updated.`
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `relevant_exp`
--

CREATE TABLE `relevant_exp` (
  `id` bigint(20) NOT NULL COMMENT 'serial indexing for quick storage and retrieval',
  `user_id` bigint(20) NOT NULL COMMENT 'a foreign key to identify specific users data',
  `name` varchar(100) NOT NULL COMMENT 'name of the industry where the experience was obtained',
  `position` varchar(100) NOT NULL COMMENT 'the position at the selected industry',
  `address` text NOT NULL COMMENT 'location address of the industry selected',
  `url` text COMMENT 'website url to the organizations web site where applicable',
  `start_month` varchar(20) NOT NULL COMMENT 'month started',
  `start_year` int(11) NOT NULL COMMENT 'year started',
  `end_month` varchar(20) NOT NULL COMMENT 'month ended',
  `end_year` int(11) NOT NULL COMMENT 'year ended',
  `created_at` timestamp NULL DEFAULT NULL COMMENT AS `date and time the information was createed`,
  `updated_at` timestamp NULL DEFAULT NULL COMMENT AS `date and time the information was updated`
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `type` int(1) NOT NULL DEFAULT '0',
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `dob` date NOT NULL,
  `age` int(2) NOT NULL,
  `sex` char(1) COLLATE utf8_unicode_ci NOT NULL,
  `state_of_origin` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `phone_num` char(11) COLLATE utf8_unicode_ci NOT NULL,
  `lga` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `marital_status` char(11) COLLATE utf8_unicode_ci NOT NULL,
  `image` char(20) COLLATE utf8_unicode_ci NOT NULL,
  `f_name` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `l_name` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `m_name` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `maiden_name` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `complete` int(1) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `type`, `email`, `password`, `remember_token`, `created_at`, `updated_at`, `dob`, `age`, `sex`, `state_of_origin`, `phone_num`, `lga`, `marital_status`, `image`, `f_name`, `l_name`, `m_name`, `maiden_name`, `complete`) VALUES
(10, 0, 'olorundaolaoluwa@gmail.com', '$2y$10$kUNOCDxDaDHhKzUH/vMg8O0tgPodoJkf066Aj2F0D2YzDOJSZU7CW', '0Hlmz1X9bS3keM7YCrj5nyAO8roaoWv85y6Ex6JvkFAT0tNf3AmKu5CqHp0C', '2016-08-22 17:58:36', '2016-08-22 20:02:47', '0000-00-00', 0, '', '', '', '', '', '', 'Olorunda', 'Taiwo', 'Olaoluwa', 'Olufisayo', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `available_jobs`
--
ALTER TABLE `available_jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ref_no` (`ref_no`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_ref` (`user_ref`);

--
-- Indexes for table `institutions`
--
ALTER TABLE `institutions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_ref` (`user_ref`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`),
  ADD KEY `password_resets_token_index` (`token`);

--
-- Indexes for table `professional_quals`
--
ALTER TABLE `professional_quals`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_ref` (`user_ref`);

--
-- Indexes for table `qualifications_required`
--
ALTER TABLE `qualifications_required`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `referees`
--
ALTER TABLE `referees`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_ref` (`user_ref`);

--
-- Indexes for table `relevant_exp`
--
ALTER TABLE `relevant_exp`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_id` (`user_id`);

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
-- AUTO_INCREMENT for table `available_jobs`
--
ALTER TABLE `available_jobs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'serial indexing for storage and retrieval', AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `institutions`
--
ALTER TABLE `institutions`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT COMMENT 'serial number for indexing the users for better retrieval';
--
-- AUTO_INCREMENT for table `professional_quals`
--
ALTER TABLE `professional_quals`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT COMMENT 'serial number for quick referencing';
--
-- AUTO_INCREMENT for table `qualifications_required`
--
ALTER TABLE `qualifications_required`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'serial number for referencing, storage and retrieval';
--
-- AUTO_INCREMENT for table `referees`
--
ALTER TABLE `referees`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT COMMENT 'serial indexing for better storage and retrieval';
--
-- AUTO_INCREMENT for table `relevant_exp`
--
ALTER TABLE `relevant_exp`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT COMMENT 'serial indexing for quick storage and retrieval';
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
