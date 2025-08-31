-- Drop tables in correct order (because of foreign key)
DROP TABLE IF EXISTS `articles`;
DROP TABLE IF EXISTS `categories`;
DROP TABLE IF EXISTS `users`;

-- Categories table
CREATE TABLE `categories` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `categories` (`id`, `name`, `description`, `created_at`) VALUES
(1, 'Technology', 'Articles about technology, programming, and web development', '2025-08-31 12:00:00'),
(2, 'Health & Wellness', 'Articles about health, fitness, and mental wellness', '2025-08-31 12:00:00'),
(3, 'Travel', 'Travel guides, experiences, and destination reviews', '2025-08-31 12:00:00'),
(4, 'Education', 'Learning resources, tutorials, and educational content', '2025-08-31 12:00:00');

ALTER TABLE `categories` AUTO_INCREMENT = 5;

-- Articles table
CREATE TABLE `articles` (
  `id` int NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `category_id` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `fk_category` (`category_id`),
  CONSTRAINT `fk_category` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `articles` (`id`, `title`, `content`, `category_id`, `created_at`) VALUES
(6, 'The Future of Web Development', '<h1>The Future of Web Development</h1> ...', 1, '2025-08-18 16:24:59'),
(7, 'Healthy Living in a Digital World', '<h1>Healthy Living in a Digital World</h1> ...', 2, '2025-08-20 10:15:00'),
(8, 'Exploring the Beauty of the Maldives', '<h1>Exploring the Beauty of the Maldives</h1> ...', 3, '2025-08-22 09:45:30'),
(9, 'Mastering PHP for Beginners', '<h1>Mastering PHP for Beginners</h1> ...', 4, '2025-08-25 18:50:00');

ALTER TABLE `articles` AUTO_INCREMENT = 10;

-- Users table
CREATE TABLE `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL UNIQUE,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL UNIQUE,
  `role` enum('admin','user') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'user',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `users` (`id`, `username`, `password`, `email`, `role`, `created_at`) VALUES
(1, 'admin', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'admin@example.com', 'admin', '2025-08-28 12:00:00'),
(2, 'user1', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'user1@example.com', 'user', '2025-08-28 12:00:00');

ALTER TABLE `users` AUTO_INCREMENT = 3;
