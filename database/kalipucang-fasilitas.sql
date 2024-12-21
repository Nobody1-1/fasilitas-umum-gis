-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               8.0.30 - MySQL Community Server - GPL
-- Server OS:                    Win64
-- HeidiSQL Version:             12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for kalipucang-fasilitas
DROP DATABASE IF EXISTS `kalipucang-fasilitas`;
CREATE DATABASE IF NOT EXISTS `kalipucang-fasilitas` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `kalipucang-fasilitas`;

-- Dumping structure for table kalipucang-fasilitas.cache
DROP TABLE IF EXISTS `cache`;
CREATE TABLE IF NOT EXISTS `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table kalipucang-fasilitas.cache: ~4 rows (approximately)
REPLACE INTO `cache` (`key`, `value`, `expiration`) VALUES
	('albab@gmail.com|127.0.0.1', 'i:3;', 1734787356),
	('albab@gmail.com|127.0.0.1:timer', 'i:1734787356;', 1734787356),
	('albablo12@gmail.com|127.0.0.1', 'i:1;', 1734792738),
	('albablo12@gmail.com|127.0.0.1:timer', 'i:1734792738;', 1734792738);

-- Dumping structure for table kalipucang-fasilitas.cache_locks
DROP TABLE IF EXISTS `cache_locks`;
CREATE TABLE IF NOT EXISTS `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL,
  PRIMARY KEY (`key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table kalipucang-fasilitas.cache_locks: ~0 rows (approximately)

-- Dumping structure for table kalipucang-fasilitas.facilities
DROP TABLE IF EXISTS `facilities`;
CREATE TABLE IF NOT EXISTS `facilities` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `total_visits` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `latitude` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `longitude` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=48 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table kalipucang-fasilitas.facilities: ~21 rows (approximately)
REPLACE INTO `facilities` (`id`, `name`, `category`, `description`, `total_visits`, `created_at`, `updated_at`, `latitude`, `longitude`, `image`) VALUES
	(7, 'Lapangan Kwanten', 'Recreational', 'Lapangan rekreasi untuk acara komunitas dan olahraga.', 0, '2024-12-14 20:38:44', NULL, '-6.7580432819336', '110.71742767552', NULL),
	(12, 'Masjid Jami\' Masjidur Rohim', 'Religious', 'Masjid yang menjadi pusat kegiatan keagamaan masyarakat.', 1, '2024-12-14 20:38:39', '2024-12-16 06:06:36', '-6.7544807951921', '110.71617406988', NULL),
	(13, 'Mushola Rodhlotul Muttaqin', 'Religious', 'Mushola kecil yang nyaman untuk beribadah.', 2, '2024-12-14 20:38:38', '2024-12-16 06:49:32', '-6.7573337761111', '110.71431052845', NULL),
	(30, 'sman 1 welahan', 'Education', 'Sekolah menengah atas yang terkenal di daerah Welahan.', 0, '2024-12-21 20:39:10', NULL, '-6.7556814685677', '110.72463217211', NULL),
	(31, 'smpn 1 welahan', 'Education', 'Sekolah menengah pertama yang menyediakan pendidikan berkualitas di Welahan.', 0, '2024-12-21 20:39:11', NULL, '-6.7525812722922', '110.72461289036', NULL),
	(32, 'SD Negeri 4 Kalipucang Kulon', 'Education', 'Sekolah dasar yang melayani komunitas Kalipucang Kulon.', 0, '2024-12-21 20:39:12', NULL, '-6.749054434304', '110.71882741935', NULL),
	(33, 'smpn 2 welahan', 'Education', 'Sekolah menengah pertama yang dikenal dengan program akademik unggulannya.', 0, '2024-12-21 20:39:13', NULL, '-6.7707360488556', '110.72461289036', NULL),
	(34, 'Islamic Center Kalipucang Kulon Welahan Jepara', 'Religious', 'Pusat komunitas Islam yang berlokasi di Kalipucang Kulon.', 0, '2024-12-21 20:39:14', NULL, '-6.7602523878464', '110.7210080016', NULL),
	(35, 'Klinik Kesehatan Dr.Abdul Hadi', 'Health', 'Klinik kesehatan terpercaya yang menyediakan layanan medis di daerah tersebut.', 0, NULL, NULL, '-6.7652117665728', '110.72473419007', NULL),
	(36, 'Lapangan Kwanten', 'Recreational', 'Lapangan rekreasi untuk acara komunitas dan olahraga.', 0, NULL, NULL, '-6.7580432819336', '110.71742767552', NULL),
	(37, 'Masjid Jami\' Nurul Ula', 'Religious', 'Masjid utama yang melayani komunitas Muslim lokal.', 0, NULL, NULL, '-6.7707415146787', '110.72441060236', NULL),
	(38, 'Bimbel Rafka 2', 'Education', 'Pusat bimbingan belajar untuk siswa yang ingin meningkatkan prestasi akademik.', 0, NULL, NULL, '-6.7617178309306', '110.71397079048', NULL),
	(39, 'POSKESDES Kalipucang Kulon', 'Health', 'Pos kesehatan desa yang menyediakan layanan kesehatan dasar.', 0, NULL, NULL, '-6.7584398693848', '110.71693315479', NULL),
	(40, 'Masjid Jami\' Rodhotul Muttaqin', 'Religious', 'Masjid dengan fasilitas ibadah yang nyaman bagi masyarakat.', 0, NULL, NULL, '-6.7614289626822', '110.72081525489', NULL),
	(41, 'Masjid Jami\' Masjidur Rohim', 'Religious', 'Masjid yang menjadi pusat kegiatan keagamaan masyarakat.', 0, NULL, NULL, '-6.7544807951921', '110.71617406988', NULL),
	(42, 'Mushola Rodhlotul Muttaqin', 'Religious', 'Mushola kecil yang nyaman untuk beribadah.', 0, NULL, NULL, '-6.7573337761111', '110.71431052845', NULL),
	(43, 'Masjid Jami\' Al-Huda', 'Religious', 'Masjid dengan suasana yang damai dan fasilitas lengkap.', 0, NULL, NULL, '-6.765820443615', '110.72125352049', NULL),
	(44, 'Mushola Mbah Kaprawi Al Istiqomah', 'Religious', 'Mushola yang sering digunakan untuk kegiatan ibadah warga sekitar.', 0, NULL, NULL, '-6.758265103072', '110.71672091492', NULL),
	(45, 'Masjid Baitur Rahman', 'Religious', 'Masjid besar dengan kapasitas yang luas.', 0, NULL, NULL, '-6.7601615623392', '110.7137597563', NULL),
	(46, 'Mushola Al-Istiqomah', 'Religious', 'Tempat ibadah yang bersih dan nyaman.', 0, NULL, NULL, '-6.7623566245054', '110.72033519958', NULL),
	(47, 'YAYASAN KALI ILMU', 'Education', 'Yayasan pendidikan yang mendukung perkembangan ilmu pengetahuan.', 0, NULL, NULL, '-6.7577387717016', '110.71382644115', NULL);

-- Dumping structure for table kalipucang-fasilitas.failed_jobs
DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table kalipucang-fasilitas.failed_jobs: ~0 rows (approximately)

-- Dumping structure for table kalipucang-fasilitas.jobs
DROP TABLE IF EXISTS `jobs`;
CREATE TABLE IF NOT EXISTS `jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint unsigned NOT NULL,
  `reserved_at` int unsigned DEFAULT NULL,
  `available_at` int unsigned NOT NULL,
  `created_at` int unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `jobs_queue_index` (`queue`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table kalipucang-fasilitas.jobs: ~0 rows (approximately)

-- Dumping structure for table kalipucang-fasilitas.job_batches
DROP TABLE IF EXISTS `job_batches`;
CREATE TABLE IF NOT EXISTS `job_batches` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table kalipucang-fasilitas.job_batches: ~0 rows (approximately)

-- Dumping structure for table kalipucang-fasilitas.migrations
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table kalipucang-fasilitas.migrations: ~12 rows (approximately)
REPLACE INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '0001_01_01_000000_create_users_table', 1),
	(2, '0001_01_01_000001_create_cache_table', 1),
	(3, '0001_01_01_000002_create_jobs_table', 1),
	(4, '2024_12_13_210452_create_facilities_table', 2),
	(5, '2024_12_13_210453_create_reports_table', 2),
	(6, '2024_12_14_141224_create_reviews_table', 2),
	(7, '2024_12_14_141305_create_users_table', 3),
	(8, '2024_12_14_152645_add_created_at_to_users_table', 4),
	(9, '2024_12_14_193321_modify_facilities_table', 5),
	(10, '2024_12_14_193723_modify_reviews_table', 6),
	(11, '2024_12_14_193853_modify_reviews_table', 7),
	(12, '2024_12_14_194121_modify_reviews_table', 8),
	(13, '2024_12_14_194131_modify_reviews_table', 8);

-- Dumping structure for table kalipucang-fasilitas.password_reset_tokens
DROP TABLE IF EXISTS `password_reset_tokens`;
CREATE TABLE IF NOT EXISTS `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table kalipucang-fasilitas.password_reset_tokens: ~0 rows (approximately)

-- Dumping structure for table kalipucang-fasilitas.reports
DROP TABLE IF EXISTS `reports`;
CREATE TABLE IF NOT EXISTS `reports` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint unsigned NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `reports_user_id_foreign` (`user_id`),
  CONSTRAINT `reports_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table kalipucang-fasilitas.reports: ~0 rows (approximately)

-- Dumping structure for table kalipucang-fasilitas.reviews
DROP TABLE IF EXISTS `reviews`;
CREATE TABLE IF NOT EXISTS `reviews` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint unsigned NOT NULL,
  `facility_id` bigint unsigned NOT NULL,
  `rating` int NOT NULL,
  `comment` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `reviews_user_id_foreign` (`user_id`),
  KEY `reviews_facility_id_foreign` (`facility_id`),
  CONSTRAINT `reviews_facility_id_foreign` FOREIGN KEY (`facility_id`) REFERENCES `facilities` (`id`) ON DELETE CASCADE,
  CONSTRAINT `reviews_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table kalipucang-fasilitas.reviews: ~3 rows (approximately)
REPLACE INTO `reviews` (`id`, `user_id`, `facility_id`, `rating`, `comment`, `created_at`, `updated_at`) VALUES
	(1, 3, 12, 5, 'vgcgcgffg', '2024-12-16 12:43:05', NULL),
	(2, 3, 12, 3, 'ecbekc edc ', '2024-12-16 12:44:35', NULL),
	(3, 1, 7, 4, 'cfcfvfv', '2024-12-21 16:38:00', NULL);

-- Dumping structure for table kalipucang-fasilitas.sessions
DROP TABLE IF EXISTS `sessions`;
CREATE TABLE IF NOT EXISTS `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint unsigned DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table kalipucang-fasilitas.sessions: ~3 rows (approximately)
REPLACE INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
	('7Qcj0RrYXJ3j9rPee9srCCcGIK6UUPj2Si47ekjK', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'YToyOntzOjY6Il90b2tlbiI7czo0MDoiRnRWMnRoalM1RFdFNnhNYkdBYkgyYkl1Y1l4aVNsRDEya1d0Q3R2ZyI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1734814114),
	('jmziOkaii4c1k0QSG2KvQDqwazFXbcK5kG3QpDN4', 3, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiazhLVFpuUVp6QVo3N1J3WUNYTDdVMHM0U1djc29BT1hoRFRGcHVTcSI7czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czoyNToiaHR0cDovLzEyNy4wLjAuMTo4MDAwL21hcCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjM7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mzg6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9mYXNpbGl0YXM/cXVlcnk9Ijt9fQ==', 1734814459),
	('X4cwep0jROLK5pON40sp7s52YhAbcZM4Q3zjTkdF', 3, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiTld2bnlBNkdnbDdqdHRMcW1JdU80WVNSRWpDSXlUZnc1UnRDaHR5SCI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDA6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMC9mYXNpbGl0YXM/cXVlcnk9c2QiO31zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aTozO30=', 1734803730);

-- Dumping structure for table kalipucang-fasilitas.users
DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'user',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table kalipucang-fasilitas.users: ~4 rows (approximately)
REPLACE INTO `users` (`id`, `name`, `email`, `password`, `role`, `created_at`, `updated_at`) VALUES
	(1, 'Albab', 'Albab@gmail.com', '$2y$12$NFywe7nbJ9l0Olzi/wnoh.xpMmWoLThQhdQO26n3kYOvO4GRjWlmS', 'admin', '2024-12-21 13:10:53', '2024-12-14 11:06:31'),
	(2, 'admin', 'admin@gmail.com', 'admin', 'admin', '2024-12-21 13:12:35', NULL),
	(3, 'ahmad', 'ahmad@gmail.com', '$2y$12$5tMCWHqeXa44uqm69srlG.shw.R/eNS6n2lMD7LkV7M7aTxV6LCjC', 'user', '2024-12-14 11:24:26', '2024-12-14 11:24:26'),
	(4, 'albab', 'albab12@gmail.com', '$2y$12$xjIXjPsCLAOiX6DdauHyDOS31IZ12ZtotoOGq2PILHl50u3e1EgMO', 'admin', '2024-12-21 07:15:32', '2024-12-21 07:15:32'),
	(5, 'albab1', 'albablos12@gmail.com', '$2y$12$kKBg/FF9peBi6fF8bYVceOOqblzRw5WY0Ytoc2ziJUHnWlCK1NaDO', 'user', '2024-12-21 07:48:53', '2024-12-21 07:48:53');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
