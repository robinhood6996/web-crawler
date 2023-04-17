-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 02, 2023 at 06:59 PM
-- Server version: 8.0.30
-- PHP Version: 8.0.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jobs`
--

-- --------------------------------------------------------

--
-- Table structure for table `articles`
--

CREATE TABLE `articles` (
  `id` bigint UNSIGNED NOT NULL,
  `url` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `title` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `name` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `location` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telefon` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ansprechpartner` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `webseite` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `datum` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `file1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file3` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hrfr` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nr` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `plz` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ort` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type_status` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `articles`
--

INSERT INTO `articles` (`id`, `url`, `title`, `name`, `location`, `status`, `email`, `telefon`, `ansprechpartner`, `webseite`, `description`, `datum`, `created_at`, `updated_at`, `file1`, `file2`, `file3`, `hrfr`, `nr`, `plz`, `ort`, `type_status`) VALUES
(3, 'https://www.lipsum.com/', 'id no 3', 'robin', 'sfs', 'deleted', NULL, NULL, NULL, NULL, 'sdfsfsfds', NULL, NULL, '2023-04-01 12:49:01', NULL, NULL, NULL, NULL, 'a', 'a', 'a', ''),
(4, 'https://www.lipsum.com/', 'te', 'robin', 'sdfsf', 'confirmed', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-03-29 11:57:13', NULL, NULL, NULL, NULL, NULL, NULL, NULL, ''),
(5, 'https://www.lipsum.com/', 'sdfsfid no 5 robin', 'sfdss', 'sfs', 'confirmed', NULL, NULL, NULL, NULL, 'kjdfkjfskjkld', NULL, NULL, '2023-03-29 10:10:12', NULL, NULL, NULL, NULL, NULL, NULL, NULL, ''),
(6, 'https://www.lipsum.com/', 'id no 6', 'deleted', 'deleted', 'confirmed', NULL, NULL, NULL, NULL, 'HP is one of the biggest Laptop brands in the world. Owned by Hewlett-Packard which is now called HP Inc. HP is known for its premium quality laptop and Notebook PCs. HP was founded in 1939 in Palo Alto, California as a small electronic measurement and test equipment manufacturer. The garage is now a digital museum with a plaque calling it the birthplace of Silicon Valley.\n', NULL, NULL, '2023-03-29 09:54:34', NULL, NULL, NULL, NULL, NULL, NULL, NULL, ''),
(7, 'https://popsql.com/', 'Title copy', 'RObin', 'Dhaka', 'confirmed', 'robin@gmail.com', '029999393993', 'dsklfjfkl dkfjkfljs', 'https://popsql.com/', 'hdklfjdklfjsd;fsklfsf', NULL, '2023-03-30 12:34:51', '2023-04-01 14:14:47', NULL, NULL, NULL, NULL, NULL, NULL, NULL, ''),
(8, 'https://popsql.com/', 'Title copy', 'RObin', 'Dhaka', 'deleted', 'robin@gmail.com', '029999393993', 'dsklfjfkl dkfjkfljs', 'https://popsql.com/', NULL, NULL, '2023-03-30 12:36:47', '2023-04-01 12:48:03', NULL, NULL, NULL, NULL, NULL, NULL, NULL, ''),
(9, 'https://popsql.com/', 'Title copy', 'RObin', 'Dhaka', 'deleted', 'robin@gmail.com', '029999393993', 'dsklfjfkl dkfjkfljs', 'https://popsql.com/', 'edie', NULL, '2023-03-30 12:36:47', '2023-04-01 12:48:39', NULL, NULL, NULL, NULL, NULL, NULL, NULL, ''),
(10, 'https://www.lipsum.com/', 'id no 3', 'robin', 'sfs', 'pending', NULL, NULL, NULL, NULL, 'sdfsfsfds', '2023-04-29', NULL, '2023-04-02 10:55:19', 'storage/app/indeed/rDOgQAftWb0aa9tGUvnjySz2O9QjWtf4JuYlwupI.png', 'storage/app/indeed/MPuYotouOy8v0T1ULqIkCa9SVZb0zflQi4HsoLif.jpg', NULL, NULL, NULL, NULL, NULL, 'sonstiges_angebot'),
(11, 'https://www.lipsum.com/', 'te', 'robin', 'sdfsf', 'confirmed', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2023-03-29 11:57:13', NULL, NULL, NULL, NULL, NULL, NULL, NULL, ''),
(12, 'https://www.lipsum.com/', 'sdfsfid no 5 robin', 'sfdss', 'sfs', 'confirmed', NULL, NULL, NULL, NULL, 'kjdfkjfskjkld', NULL, NULL, '2023-03-29 10:10:12', NULL, NULL, NULL, NULL, NULL, NULL, NULL, ''),
(13, 'https://www.lipsum.com/', 'id no 6', 'deleted', 'deleted', 'confirmed', NULL, NULL, NULL, NULL, 'HP is one of the biggest Laptop brands in the world. Owned by Hewlett-Packard which is now called HP Inc. HP is known for its premium quality laptop and Notebook PCs. HP was founded in 1939 in Palo Alto, California as a small electronic measurement and test equipment manufacturer. The garage is now a digital museum with a plaque calling it the birthplace of Silicon Valley.\r\n', NULL, NULL, '2023-03-29 09:54:34', NULL, NULL, NULL, NULL, NULL, NULL, NULL, ''),
(14, 'https://popsql.com/', 'Title copy', 'RObin', 'Dhaka', 'pending', 'robin@gmail.com', '029999393993', 'dsklfjfkl dkfjkfljs', 'https://popsql.com/', 'hdklfjdklfjsd;fsklfsf', NULL, '2023-03-30 12:34:51', '2023-04-02 10:55:23', NULL, NULL, NULL, 'herr', NULL, NULL, NULL, 'kein_interesse'),
(15, 'https://popsql.com/', 'Title copy', 'RObin', 'Dhaka', 'pending', 'robin@gmail.com', '029999393993', 'dsklfjfkl dkfjkfljs', 'https://popsql.com/', 'edie', NULL, '2023-03-30 12:36:47', '2023-03-30 12:36:47', NULL, NULL, NULL, NULL, NULL, NULL, NULL, ''),
(16, 'https://popsql.com/', 'Title copy', 'RObin', 'Dhaka', 'pending', 'robin@gmail.com', '029999393993', 'dsklfjfkl dkfjkfljs', 'https://popsql.com/', 'edie', NULL, '2023-03-30 12:36:47', '2023-03-30 12:36:47', NULL, NULL, NULL, NULL, NULL, NULL, NULL, ''),
(17, 'https://popsql.com/', 'Title copy', 'RObin', 'Dhaka', 'pending', 'robin@gmail.com', '029999393993', 'dsklfjfkl dkfjkfljs', 'https://popsql.com/', 'edie', NULL, '2023-03-30 12:36:47', '2023-03-30 12:36:47', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '');

-- --------------------------------------------------------

--
-- Table structure for table `assign_articles`
--

CREATE TABLE `assign_articles` (
  `id` bigint UNSIGNED NOT NULL,
  `origin_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `origin_id` bigint UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `assign_articles`
--

INSERT INTO `assign_articles` (`id`, `origin_type`, `origin_id`, `created_at`, `updated_at`, `user_id`) VALUES
(43, 'App\\Models\\Indeed', 1, '2023-04-02 12:27:08', '2023-04-02 12:27:08', 3),
(44, 'App\\Models\\Article', 4, '2023-04-02 12:36:19', '2023-04-02 12:36:19', 5);

-- --------------------------------------------------------

--
-- Table structure for table `colors`
--

CREATE TABLE `colors` (
  `id` int NOT NULL,
  `name` varchar(100) NOT NULL,
  `type` varchar(50) NOT NULL,
  `status` int NOT NULL DEFAULT '1',
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `colors`
--

INSERT INTO `colors` (`id`, `name`, `type`, `status`, `updated_at`, `created_at`) VALUES
(21, 'Test', 'regal', 1, '2023-03-25 23:21:00', '2023-03-25 23:21:00');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `freelancer_maps`
--

CREATE TABLE `freelancer_maps` (
  `id` bigint UNSIGNED NOT NULL,
  `url` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `title` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `name` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `location` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telefon` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ansprechpartner` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `webseite` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `datum` date DEFAULT NULL,
  `file1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file3` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hrfr` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nr` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `plz` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ort` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type_status` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `freelancer_maps`
--

INSERT INTO `freelancer_maps` (`id`, `url`, `title`, `name`, `location`, `status`, `email`, `telefon`, `ansprechpartner`, `webseite`, `description`, `created_at`, `updated_at`, `datum`, `file1`, `file2`, `file3`, `hrfr`, `nr`, `plz`, `ort`, `type_status`) VALUES
(1, 'sdsf', 'Freelancer', 'Robin indeed', 'Dhaka, Bnagladesh', 'deleted', 'robinypb@yahoo.com', '01870800306', 'Let it go', 'www.facebook.com', 'sdfsffsfdf', NULL, '2023-04-02 09:46:01', '2023-04-13', NULL, NULL, NULL, 'herr', 'a', 'a', 'a', NULL),
(2, 'https://popsql.com/', 'Title copy', 'RObin', 'Dhaka', 'pending', 'robin@gmail.com', '029999393993', 'dsklfjfkl dkfjkfljs', 'https://popsql.com/', 'ddddd', NULL, '2023-04-02 10:51:37', '2023-04-01', NULL, NULL, NULL, 'herr', '1', 'zxc', 'zxccxz', 'wartet');

-- --------------------------------------------------------

--
-- Table structure for table `indeeds`
--

CREATE TABLE `indeeds` (
  `id` bigint UNSIGNED NOT NULL,
  `url` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `title` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `name` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `location` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telefon` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ansprechpartner` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `webseite` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `datum` date DEFAULT NULL,
  `file1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file3` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hrfr` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nr` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `plz` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ort` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type_status` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `indeeds`
--

INSERT INTO `indeeds` (`id`, `url`, `title`, `name`, `location`, `status`, `email`, `telefon`, `ansprechpartner`, `webseite`, `description`, `created_at`, `updated_at`, `datum`, `file1`, `file2`, `file3`, `hrfr`, `nr`, `plz`, `ort`, `type_status`) VALUES
(1, 'sdsf hhh', 'Indeed edited eee', 'Robin indeed', 'Dhaka, Bnagladesh', 'pending', 'robinypb@yahoo.com', '01870800306', 'Let it go', 'www.facebook.com', 'lorem ipsum', NULL, '2023-04-02 10:55:07', '2023-04-28', 'storage/app/indeed/yNUOq7Q0ZfiFSrX6YgHcwfbayCHHXxKsh3b8lQ1r.jpg', 'storage/app/indeed/Oa92FUw8y6n9jjDksg2E2RP25Lqy0AwazMfpqWif.png', NULL, 'frau', 'a', 'a', 'a', 'webseite_angebot'),
(2, 'sdsf hhh', 'Indeed 2', 'Robin indeed', 'Dhaka, Bnagladesh', 'pending', 'robinypb@yahoo.com', '01870800306', 'Let it go', 'www.facebook.com', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', NULL, '2023-04-02 10:55:12', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'wartet');

-- --------------------------------------------------------

--
-- Table structure for table `menu4`
--

CREATE TABLE `menu4` (
  `id` bigint UNSIGNED NOT NULL DEFAULT '0',
  `url` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `title` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `name` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `location` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telefon` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ansprechpartner` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `webseite` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `menu4`
--

INSERT INTO `menu4` (`id`, `url`, `title`, `name`, `location`, `status`, `email`, `telefon`, `ansprechpartner`, `webseite`, `description`, `created_at`, `updated_at`) VALUES
(1, 'sdsf hhh', 'Indeed edited eee', 'Robin indeed', 'Dhaka, Bnagladesh', 'pending', 'robinypb@yahoo.com', '01870800306', 'Let it go', 'www.facebook.com', 'lorem ipsum', NULL, '2023-03-30 23:47:56'),
(2, 'sdsf hhh', 'Indeed 2', 'Robin indeed', 'Dhaka, Bnagladesh', 'pending', 'robinypb@yahoo.com', '01870800306', 'Let it go', 'www.facebook.com', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', NULL, '2023-03-30 23:52:48');

-- --------------------------------------------------------

--
-- Table structure for table `menu5`
--

CREATE TABLE `menu5` (
  `id` bigint UNSIGNED NOT NULL DEFAULT '0',
  `url` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `title` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `name` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `location` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telefon` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ansprechpartner` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `webseite` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `menu5`
--

INSERT INTO `menu5` (`id`, `url`, `title`, `name`, `location`, `status`, `email`, `telefon`, `ansprechpartner`, `webseite`, `description`, `created_at`, `updated_at`) VALUES
(1, 'sdsf hhh', 'Indeed edited eee', 'Robin indeed', 'Dhaka, Bnagladesh', 'pending', 'robinypb@yahoo.com', '01870800306', 'Let it go', 'www.facebook.com', 'lorem ipsum', NULL, '2023-03-30 23:47:56'),
(2, 'sdsf hhh', 'Indeed 2', 'Robin indeed', 'Dhaka, Bnagladesh', 'pending', 'robinypb@yahoo.com', '01870800306', 'Let it go', 'www.facebook.com', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', NULL, '2023-03-30 23:52:48');

-- --------------------------------------------------------

--
-- Table structure for table `menu6`
--

CREATE TABLE `menu6` (
  `id` bigint UNSIGNED NOT NULL DEFAULT '0',
  `url` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `title` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `name` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `location` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telefon` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ansprechpartner` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `webseite` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `menu6`
--

INSERT INTO `menu6` (`id`, `url`, `title`, `name`, `location`, `status`, `email`, `telefon`, `ansprechpartner`, `webseite`, `description`, `created_at`, `updated_at`) VALUES
(3, 'https://www.lipsum.com/', 'id no 3', 'robin', 'sfs', 'pending', NULL, NULL, NULL, NULL, 'sdfsfsfds', NULL, '2023-03-29 11:57:11'),
(4, 'https://www.lipsum.com/', 'te', 'robin', 'sdfsf', 'confirmed', NULL, NULL, NULL, NULL, NULL, NULL, '2023-03-29 11:57:13'),
(5, 'https://www.lipsum.com/', 'sdfsfid no 5 robin', 'sfdss', 'sfs', 'confirmed', NULL, NULL, NULL, NULL, 'kjdfkjfskjkld', NULL, '2023-03-29 10:10:12'),
(6, 'https://www.lipsum.com/', 'id no 6', 'deleted', 'deleted', 'confirmed', NULL, NULL, NULL, NULL, 'HP is one of the biggest Laptop brands in the world. Owned by Hewlett-Packard which is now called HP Inc. HP is known for its premium quality laptop and Notebook PCs. HP was founded in 1939 in Palo Alto, California as a small electronic measurement and test equipment manufacturer. The garage is now a digital museum with a plaque calling it the birthplace of Silicon Valley.\n', NULL, '2023-03-29 09:54:34'),
(7, 'https://popsql.com/', 'Title copy', 'RObin', 'Dhaka', 'pending', 'robin@gmail.com', '029999393993', 'dsklfjfkl dkfjkfljs', 'https://popsql.com/', 'hdklfjdklfjsd;fsklfsf', '2023-03-30 12:34:51', '2023-03-30 12:34:51'),
(8, 'https://popsql.com/', 'Title copy', 'RObin', 'Dhaka', 'pending', 'robin@gmail.com', '029999393993', 'dsklfjfkl dkfjkfljs', 'https://popsql.com/', 'edie', '2023-03-30 12:36:47', '2023-03-30 12:36:47');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_03_16_153759_create_articles_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order_by` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` tinyint DEFAULT '0' COMMENT '0 =admin, 1=manager',
  `column` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `order_by`, `role`, `column`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@erp.com', NULL, '$2y$10$ZBh9Pt.hlbBKI4Xof/HdqujuXBH7/qqTrGNXmGvlre04wFbcXl6b.', NULL, 'desc', 0, 'url', '2023-03-16 11:41:12', '2023-03-30 12:48:15'),
(2, 'manager', 'manager@erp.com', NULL, '$2y$10$ZBh9Pt.hlbBKI4Xof/HdqujuXBH7/qqTrGNXmGvlre04wFbcXl6b.', NULL, 'asc', 1, 'title', '2023-03-16 11:41:12', '2023-03-25 11:01:15'),
(3, 'test-manager1', 'test-manager1@gmail.com', NULL, '$2y$10$oCVdoOjIUTa0DzGhEIUQ5.X3N3G5xQWCFCsjrcJo.7aLrcr5m3jwi', NULL, NULL, 1, NULL, '2023-04-01 15:19:48', '2023-04-01 15:19:48'),
(4, 'test-manager2', 'test-manager2@gmail.com', NULL, '$2y$10$U1GeMrX2.Ev8Ery48rq3yus/gLat7XX1bQvi5PiawIjon9iXqd9Xu', NULL, NULL, 1, NULL, '2023-04-01 15:24:18', '2023-04-01 15:24:18'),
(5, 'test-manager3', 'test-manager3@gmail.com', NULL, '$2y$10$SMBDROUd5WHPhU5EjwJ6ZO6JHe50/nAyIr06TghEoObb0tV1K05im', NULL, NULL, 1, NULL, '2023-04-01 15:24:46', '2023-04-01 15:24:46');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `assign_articles`
--
ALTER TABLE `assign_articles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `file_managers_origin_type_origin_id_index` (`origin_type`,`origin_id`);

--
-- Indexes for table `freelancer_maps`
--
ALTER TABLE `freelancer_maps`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `indeeds`
--
ALTER TABLE `indeeds`
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
-- AUTO_INCREMENT for table `articles`
--
ALTER TABLE `articles`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `assign_articles`
--
ALTER TABLE `assign_articles`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `freelancer_maps`
--
ALTER TABLE `freelancer_maps`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `indeeds`
--
ALTER TABLE `indeeds`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
