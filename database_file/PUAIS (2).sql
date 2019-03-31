-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 30, 2019 at 02:53 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `PUAIS`
--

-- --------------------------------------------------------

--
-- Table structure for table `blocks`
--

CREATE TABLE `blocks` (
  `id` int(11) NOT NULL,
  `option_name` varchar(20) NOT NULL,
  `active` tinyint(1) NOT NULL,
  `description` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `blocks`
--

INSERT INTO `blocks` (`id`, `option_name`, `active`, `description`) VALUES
(1, 'Enrollment', 1, 'This option prevents students from registering themselves into a new section');

-- --------------------------------------------------------

--
-- Table structure for table `credit_values`
--

CREATE TABLE `credit_values` (
  `id` int(10) UNSIGNED NOT NULL,
  `semester_id` int(10) UNSIGNED NOT NULL,
  `regular_values` double(8,2) NOT NULL,
  `retake_values` double(8,2) NOT NULL,
  `recourse_values` double(8,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `credit_values`
--

INSERT INTO `credit_values` (`id`, `semester_id`, `regular_values`, `retake_values`, `recourse_values`) VALUES
(1, 1, 1500.00, 500.00, 200.00),
(2, 2, 1000.00, 500.00, 1500.00),
(3, 10, 1000.00, 1000.00, 100.00),
(4, 11, 1000.00, 5000.00, 2000.00),
(5, 12, 1000.00, 500.00, 1500.00),
(6, 3, 1000.00, 1000.00, 1000.00);

-- --------------------------------------------------------

--
-- Table structure for table `max_students`
--

CREATE TABLE `max_students` (
  `id` int(10) UNSIGNED NOT NULL,
  `section_id` int(10) UNSIGNED NOT NULL,
  `max_student` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `max_students`
--

INSERT INTO `max_students` (`id`, `section_id`, `max_student`) VALUES
(1, 1, 60),
(2, 2, 60),
(3, 3, 60),
(4, 4, 60),
(5, 6, 60),
(8, 9, 60),
(9, 10, 60),
(10, 11, 60),
(11, 12, 60),
(12, 13, 60);

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
(61, '2018_12_29_123943_create_semesters_table', 1),
(62, '2018_12_29_123950_create_sessions_table', 1),
(63, '2018_12_29_123958_create_users_table', 1),
(64, '2018_12_29_124007_create_subjects_table', 1),
(65, '2018_12_29_124018_create_sections_table', 1),
(66, '2018_12_29_124028_create_teachers_table', 1),
(67, '2018_12_29_124039_create_sessiondatas_table', 1),
(68, '2018_12_29_124059_create_user_retakes_table', 1),
(69, '2018_12_29_124108_create_user_sections_table', 1),
(70, '2019_01_03_074735_create_credit_values_table', 1),
(71, '2019_01_03_082742_create_max_students_table', 1),
(72, '2019_01_03_163904_create_pre_reqs_table', 1),
(73, '2019_01_24_074520_create_profiles_table', 2),
(74, '2019_01_28_163456_create_payments_table', 3);

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` int(10) UNSIGNED NOT NULL,
  `student_id` bigint(20) UNSIGNED NOT NULL,
  `session_id` int(10) UNSIGNED NOT NULL,
  `reference` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `student_id`, `session_id`, `reference`, `date`) VALUES
(1, 1502910201045, 2, 'E2gcv2sAqPjC2Gx', '2019-02-04');

-- --------------------------------------------------------

--
-- Table structure for table `pre_reqs`
--

CREATE TABLE `pre_reqs` (
  `id` int(10) UNSIGNED NOT NULL,
  `prerequisite_subject_id` int(10) UNSIGNED NOT NULL,
  `subject_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pre_reqs`
--

INSERT INTO `pre_reqs` (`id`, `prerequisite_subject_id`, `subject_id`) VALUES
(10, 1, 4),
(12, 6, 16);

-- --------------------------------------------------------

--
-- Table structure for table `profiles`
--

CREATE TABLE `profiles` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `bdate` date NOT NULL,
  `phoneno` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `profiles`
--

INSERT INTO `profiles` (`id`, `user_id`, `bdate`, `phoneno`, `gender`) VALUES
(1, 1502910201045, '1996-01-01', '01813714236', 'M'),
(2, 1502910201044, '1996-04-07', '8801813714236', 'M');

-- --------------------------------------------------------

--
-- Table structure for table `sections`
--

CREATE TABLE `sections` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `semester_id` int(10) UNSIGNED NOT NULL,
  `session_id` int(10) UNSIGNED DEFAULT NULL,
  `advisor_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sections`
--

INSERT INTO `sections` (`id`, `name`, `semester_id`, `session_id`, `advisor_id`) VALUES
(1, 'C1A', 1, 4, 1123),
(2, 'C1B', 1, 4, 1234),
(3, 'C2A', 2, 4, 1016),
(4, 'C2B', 2, NULL, 1624),
(5, 'C3A', 3, NULL, 1555),
(6, 'C3B', 3, NULL, 1016),
(9, 'C7A', 10, 4, 1402),
(10, 'C7B', 10, 4, 1591),
(11, 'C7C', 10, 4, 1016),
(12, 'C9A', 12, 4, 1642),
(13, 'C4A', 11, 4, 1489);

-- --------------------------------------------------------

--
-- Table structure for table `semesters`
--

CREATE TABLE `semesters` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `active` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `semesters`
--

INSERT INTO `semesters` (`id`, `name`, `active`) VALUES
(1, '1', 1),
(2, '2', 1),
(3, '3', 1),
(10, '7', 1),
(11, '4', 1),
(12, '9', 1);

-- --------------------------------------------------------

--
-- Table structure for table `sessiondatas`
--

CREATE TABLE `sessiondatas` (
  `id` int(10) UNSIGNED NOT NULL,
  `student_id` bigint(20) UNSIGNED NOT NULL,
  `subject_id` int(10) UNSIGNED NOT NULL,
  `section_id` int(10) UNSIGNED NOT NULL,
  `semester_id` int(10) UNSIGNED NOT NULL,
  `type` int(11) NOT NULL,
  `session_id` int(10) UNSIGNED NOT NULL,
  `pending` tinyint(1) NOT NULL,
  `attendance` double(8,2) DEFAULT NULL,
  `rora` double(8,2) DEFAULT NULL,
  `ct` double(8,2) DEFAULT NULL,
  `mid` double(8,2) DEFAULT NULL,
  `final` double(8,2) DEFAULT NULL,
  `grade` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cgpa` double(8,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessiondatas`
--

INSERT INTO `sessiondatas` (`id`, `student_id`, `subject_id`, `section_id`, `semester_id`, `type`, `session_id`, `pending`, `attendance`, `rora`, `ct`, `mid`, `final`, `grade`, `cgpa`) VALUES
(59, 1502910201044, 1, 2, 1, 0, 4, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(60, 1502910201044, 2, 2, 1, 0, 4, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(61, 1502910201044, 3, 2, 1, 0, 4, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` int(10) UNSIGNED NOT NULL,
  `year` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `month` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `active` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `year`, `month`, `active`) VALUES
(2, '2019', 'June', '0'),
(3, '2020', 'January', '0'),
(4, '2019', 'January', '1');

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `credit` double(8,2) NOT NULL,
  `semester_id` int(10) UNSIGNED NOT NULL,
  `active` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`id`, `name`, `code`, `credit`, `semester_id`, `active`) VALUES
(1, 'Engineering Mathematics I', 'MAT 105 (V3)', 3.00, 1, 1),
(2, 'Physics I', 'PHY 101 (V3)', 3.00, 1, 1),
(3, 'Electrical Circuits I', 'EEE 203 (V3)', 3.00, 1, 1),
(4, 'Engineering Mathematics II', 'MAT 107 (V3)', 3.00, 2, 1),
(5, 'Physics II', 'PHY 107 (V3)', 3.00, 2, 1),
(6, 'Structured Programming', 'CSE 103 (V3)', 3.00, 2, 1),
(7, 'Engineering Mathematics III', 'MAT 105 (V3)', 3.00, 3, 1),
(12, 'CGIP', 'CSE 456', 3.00, 10, 1),
(13, 'NNFL', 'CSE 458', 3.00, 10, 1),
(14, 'TC', 'CSE 560', 3.00, 10, 0),
(15, 'CS', 'CSE 340', 3.00, 10, 1),
(16, 'Algorithm', 'CSE 456', 3.00, 11, 1),
(17, 'TC', 'CSE 560', 3.00, 1, 0),
(18, 'abc', 'cse 123', 3.00, 12, 1),
(19, 'cef', 'cse 345', 3.00, 12, 1),
(20, 'vag', 'cse 345', 4.00, 12, 1),
(21, 'Engineering Mathematics I', 'MAT 105 (V3)', 3.00, 12, 0);

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

CREATE TABLE `teachers` (
  `id` int(10) UNSIGNED NOT NULL,
  `subject_id` int(10) UNSIGNED NOT NULL,
  `teacher_id` bigint(20) UNSIGNED NOT NULL,
  `section_id` int(10) UNSIGNED NOT NULL,
  `session_id` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `teachers`
--

INSERT INTO `teachers` (`id`, `subject_id`, `teacher_id`, `section_id`, `session_id`) VALUES
(1, 1, 1167, 1, NULL),
(2, 3, 1121, 1, NULL),
(3, 2, 1234, 1, NULL),
(4, 1, 1485, 2, NULL),
(5, 4, 1167, 3, NULL),
(6, 3, 1642, 2, NULL),
(7, 2, 1555, 2, NULL),
(8, 5, 1619, 3, NULL),
(9, 6, 1591, 3, NULL),
(10, 4, 1489, 4, NULL),
(11, 5, 1591, 4, NULL),
(12, 6, 1121, 4, NULL),
(13, 12, 1167, 9, NULL),
(14, 13, 1123, 11, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin` tinyint(1) NOT NULL,
  `teacher` tinyint(1) NOT NULL,
  `student` tinyint(1) NOT NULL,
  `active` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `name`, `email`, `password`, `image`, `admin`, `teacher`, `student`, `active`) VALUES
(100, 'Admin', 'e@email.com', '1', 'h.jpg', 1, 0, 0, 1),
(1016, 'Helmer Beer DVM', 'mathew88@example.org', '1', 'hello.jpg', 0, 1, 0, 1),
(1039, 'Miss Bria Kozey', 'yboehm@example.org', '1', 'hello.jpg', 0, 1, 0, 1),
(1063, 'Ervin Cruickshank DVM', 'okeefe.joel@example.org', '1', 'hello.jpg', 0, 1, 0, 1),
(1121, 'Dr. Russ Nitzsche IV', 'reina.haley@example.net', '1', 'hello.jpg', 0, 1, 0, 1),
(1123, 'Gerry Dare MD', 'langworth.hal@example.net', '1', 'hello.jpg', 0, 1, 0, 1),
(1167, 'Tia Hoeger', 'delmer70@example.com', '1', 'hello.jpg', 0, 1, 0, 1),
(1223, 'Stephon Koelpin', 'gayle.champlin@example.com', '1', 'hello.jpg', 0, 1, 0, 1),
(1234, 'Mrs. Neva Walsh DDS', 'earnestine.hand@example.net', '1', 'hello.jpg', 0, 1, 0, 1),
(1258, 'Conrad Kub', 'sasha.parker@example.org', '1', 'hello.jpg', 0, 1, 0, 1),
(1339, 'Elna Mohr', 'jbailey@example.com', '1', 'hello.jpg', 0, 1, 0, 1),
(1340, 'Constance Kulas V', 'beth.schimmel@example.com', '1', 'hello.jpg', 0, 1, 0, 1),
(1371, 'Florian Oberbrunner', 'pmoore@example.net', '1', 'hello.jpg', 0, 1, 0, 1),
(1402, 'Marlene Conn', 'ettie.pacocha@example.net', '1', 'hello.jpg', 0, 1, 0, 1),
(1485, 'Javonte Walsh', 'greg.mayer@example.com', '1', 'hello.jpg', 0, 1, 0, 1),
(1489, 'Norris Feil', 'elna.carter@example.net', '1', 'hello.jpg', 0, 1, 0, 1),
(1555, 'Millie Shanahan', 'catharine87@example.org', '1', 'hello.jpg', 0, 1, 0, 1),
(1591, 'Deja Romaguera', 'melisa.leannon@example.org', '1', 'hello.jpg', 0, 1, 0, 1),
(1619, 'Alfreda Klocko', 'diego87@example.net', '1', 'hello.jpg', 0, 1, 0, 1),
(1624, 'Prof. Jett Sawayn IV', 'burley66@example.org', '1', 'hello.jpg', 0, 1, 0, 1),
(1642, 'Bonnie Kiehn MD', 'wschinner@example.com', '1', 'hello.jpg', 0, 1, 0, 1),
(1648, 'Casper Williamson', 'xbraun@example.org', '1', 'hello.jpg', 0, 1, 0, 1),
(1671, 'Ms. Amelia Weber', 'spencer.madie@example.net', '1', 'hello.jpg', 0, 1, 0, 1),
(1710, 'Julia Armstrong DDS', 'vernie88@example.org', '1', 'hello.jpg', 0, 1, 0, 1),
(1726, 'Craig Koepp', 'clarabelle.white@example.org', '1', 'hello.jpg', 0, 1, 0, 1),
(1810, 'Leopoldo Tillman', 'alayna.klocko@example.org', '1', 'hello.jpg', 0, 1, 0, 1),
(1855, 'Mr. Lazaro Pfeffer', 'cydney53@example.net', '1', 'hello.jpg', 0, 1, 0, 1),
(1867, 'Prof. Madilyn Schinner DDS', 'ben43@example.org', '1', 'hello.jpg', 0, 1, 0, 1),
(1903, 'Ms. Amelia Jakubowski', 'laverne.grady@example.net', '1', 'hello.jpg', 0, 1, 0, 1),
(1969, 'Mrs. Winifred Bode', 'flatley.georgianna@example.com', '1', 'hello.jpg', 0, 1, 0, 1),
(1994, 'Deshaun Nikolaus', 'shea94@example.net', '1', 'hello.jpg', 0, 1, 0, 1),
(1502910201044, 'Wahid Sakib', 'wahidsakib@ymail.com', '111111', '208378506.jpg', 0, 0, 1, 1),
(1502910201045, 'Abdul Hakim Rabby', 'zayd@gmail.com', '1', 'h.jpg', 0, 0, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_retakes`
--

CREATE TABLE `user_retakes` (
  `id` int(10) UNSIGNED NOT NULL,
  `student_id` bigint(20) UNSIGNED NOT NULL,
  `subject_id` int(10) UNSIGNED NOT NULL,
  `session_id` int(10) UNSIGNED NOT NULL,
  `section_id` int(10) UNSIGNED NOT NULL,
  `final` double(8,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_sections`
--

CREATE TABLE `user_sections` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `section_id` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_sections`
--

INSERT INTO `user_sections` (`id`, `user_id`, `section_id`) VALUES
(9, 1502910201044, 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blocks`
--
ALTER TABLE `blocks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `credit_values`
--
ALTER TABLE `credit_values`
  ADD PRIMARY KEY (`id`),
  ADD KEY `credit_values_semester_id_foreign` (`semester_id`);

--
-- Indexes for table `max_students`
--
ALTER TABLE `max_students`
  ADD PRIMARY KEY (`id`),
  ADD KEY `max_students_section_id_foreign` (`section_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `payments_student_id_foreign` (`student_id`),
  ADD KEY `payments_session_id_foreign` (`session_id`);

--
-- Indexes for table `pre_reqs`
--
ALTER TABLE `pre_reqs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pre_reqs_prerequisite_subject_id_foreign` (`prerequisite_subject_id`),
  ADD KEY `pre_reqs_subject_id_foreign` (`subject_id`);

--
-- Indexes for table `profiles`
--
ALTER TABLE `profiles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `profiles_user_id_foreign` (`user_id`);

--
-- Indexes for table `sections`
--
ALTER TABLE `sections`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sections_semester_id_foreign` (`semester_id`),
  ADD KEY `sections_session_id_foreign` (`session_id`),
  ADD KEY `sections_advisor_id_foreign` (`advisor_id`);

--
-- Indexes for table `semesters`
--
ALTER TABLE `semesters`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessiondatas`
--
ALTER TABLE `sessiondatas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessiondatas_student_id_foreign` (`student_id`),
  ADD KEY `sessiondatas_subject_id_foreign` (`subject_id`),
  ADD KEY `sessiondatas_section_id_foreign` (`section_id`),
  ADD KEY `sessiondatas_semester_id_foreign` (`semester_id`),
  ADD KEY `sessiondatas_session_id_foreign` (`session_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`id`),
  ADD KEY `subjects_semester_id_foreign` (`semester_id`);

--
-- Indexes for table `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `teachers_subject_id_foreign` (`subject_id`),
  ADD KEY `teachers_teacher_id_foreign` (`teacher_id`),
  ADD KEY `teachers_section_id_foreign` (`section_id`),
  ADD KEY `teachers_session_id_foreign` (`session_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `user_retakes`
--
ALTER TABLE `user_retakes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_retakes_student_id_foreign` (`student_id`),
  ADD KEY `user_retakes_subject_id_foreign` (`subject_id`),
  ADD KEY `user_retakes_session_id_foreign` (`session_id`),
  ADD KEY `user_retakes_section_id_foreign` (`section_id`);

--
-- Indexes for table `user_sections`
--
ALTER TABLE `user_sections`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_sections_user_id_foreign` (`user_id`),
  ADD KEY `user_sections_section_id_foreign` (`section_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blocks`
--
ALTER TABLE `blocks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `credit_values`
--
ALTER TABLE `credit_values`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `max_students`
--
ALTER TABLE `max_students`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pre_reqs`
--
ALTER TABLE `pre_reqs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `profiles`
--
ALTER TABLE `profiles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `sections`
--
ALTER TABLE `sections`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `semesters`
--
ALTER TABLE `semesters`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `sessiondatas`
--
ALTER TABLE `sessiondatas`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `sessions`
--
ALTER TABLE `sessions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `teachers`
--
ALTER TABLE `teachers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1502910201046;

--
-- AUTO_INCREMENT for table `user_retakes`
--
ALTER TABLE `user_retakes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_sections`
--
ALTER TABLE `user_sections`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `credit_values`
--
ALTER TABLE `credit_values`
  ADD CONSTRAINT `credit_values_semester_id_foreign` FOREIGN KEY (`semester_id`) REFERENCES `semesters` (`id`);

--
-- Constraints for table `max_students`
--
ALTER TABLE `max_students`
  ADD CONSTRAINT `max_students_section_id_foreign` FOREIGN KEY (`section_id`) REFERENCES `sections` (`id`);

--
-- Constraints for table `payments`
--
ALTER TABLE `payments`
  ADD CONSTRAINT `payments_session_id_foreign` FOREIGN KEY (`session_id`) REFERENCES `sessions` (`id`),
  ADD CONSTRAINT `payments_student_id_foreign` FOREIGN KEY (`student_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `pre_reqs`
--
ALTER TABLE `pre_reqs`
  ADD CONSTRAINT `pre_reqs_prerequisite_subject_id_foreign` FOREIGN KEY (`prerequisite_subject_id`) REFERENCES `subjects` (`id`),
  ADD CONSTRAINT `pre_reqs_subject_id_foreign` FOREIGN KEY (`subject_id`) REFERENCES `subjects` (`id`);

--
-- Constraints for table `profiles`
--
ALTER TABLE `profiles`
  ADD CONSTRAINT `profiles_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `sections`
--
ALTER TABLE `sections`
  ADD CONSTRAINT `sections_advisor_id_foreign` FOREIGN KEY (`advisor_id`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `sections_semester_id_foreign` FOREIGN KEY (`semester_id`) REFERENCES `semesters` (`id`),
  ADD CONSTRAINT `sections_session_id_foreign` FOREIGN KEY (`session_id`) REFERENCES `sessions` (`id`);

--
-- Constraints for table `sessiondatas`
--
ALTER TABLE `sessiondatas`
  ADD CONSTRAINT `sessiondatas_section_id_foreign` FOREIGN KEY (`section_id`) REFERENCES `sections` (`id`),
  ADD CONSTRAINT `sessiondatas_semester_id_foreign` FOREIGN KEY (`semester_id`) REFERENCES `semesters` (`id`),
  ADD CONSTRAINT `sessiondatas_session_id_foreign` FOREIGN KEY (`session_id`) REFERENCES `sessions` (`id`),
  ADD CONSTRAINT `sessiondatas_student_id_foreign` FOREIGN KEY (`student_id`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `sessiondatas_subject_id_foreign` FOREIGN KEY (`subject_id`) REFERENCES `subjects` (`id`);

--
-- Constraints for table `subjects`
--
ALTER TABLE `subjects`
  ADD CONSTRAINT `subjects_semester_id_foreign` FOREIGN KEY (`semester_id`) REFERENCES `semesters` (`id`);

--
-- Constraints for table `teachers`
--
ALTER TABLE `teachers`
  ADD CONSTRAINT `teachers_section_id_foreign` FOREIGN KEY (`section_id`) REFERENCES `sections` (`id`),
  ADD CONSTRAINT `teachers_session_id_foreign` FOREIGN KEY (`session_id`) REFERENCES `sessions` (`id`),
  ADD CONSTRAINT `teachers_subject_id_foreign` FOREIGN KEY (`subject_id`) REFERENCES `subjects` (`id`),
  ADD CONSTRAINT `teachers_teacher_id_foreign` FOREIGN KEY (`teacher_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `user_retakes`
--
ALTER TABLE `user_retakes`
  ADD CONSTRAINT `user_retakes_section_id_foreign` FOREIGN KEY (`section_id`) REFERENCES `sections` (`id`),
  ADD CONSTRAINT `user_retakes_session_id_foreign` FOREIGN KEY (`session_id`) REFERENCES `sessions` (`id`),
  ADD CONSTRAINT `user_retakes_student_id_foreign` FOREIGN KEY (`student_id`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `user_retakes_subject_id_foreign` FOREIGN KEY (`subject_id`) REFERENCES `subjects` (`id`);

--
-- Constraints for table `user_sections`
--
ALTER TABLE `user_sections`
  ADD CONSTRAINT `user_sections_section_id_foreign` FOREIGN KEY (`section_id`) REFERENCES `sections` (`id`),
  ADD CONSTRAINT `user_sections_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
