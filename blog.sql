-- -------------------------------------------------------------
-- TablePlus 6.6.5(626)
--
-- https://tableplus.com/
--
-- Database: blog
-- Generation Time: 2025-08-26 22:06:03.1790
-- -------------------------------------------------------------


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


DROP TABLE IF EXISTS `articles`;
CREATE TABLE `articles` (
  `id` int NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `articles` (`id`, `title`, `content`, `created_at`) VALUES
(6, 'The Future of Web Development', '<h1>The Future of Web Development</h1>\n     <p>Web development has <strong>evolved rapidly</strong> in the last decade. From static HTML pages to fully dynamic, real-time, and AI-driven experiences, the journey has been remarkable.</p>\n\n     <h2>1. Frontend Evolution</h2>\n     <p>Frameworks like <em>React</em>, <em>Vue.js</em>, and <em>Angular</em> dominate the frontend world. They allow developers to build <u>scalable</u> and <u>interactive</u> applications.</p>\n     <ul>\n        <li>React – Virtual DOM for performance</li>\n        <li>Vue.js – Simplicity and flexibility</li>\n        <li>Angular – Full-fledged enterprise solution</li>\n     </ul>\n\n     <h2>2. Backend Trends</h2>\n     <blockquote>\n        <p>"The backend is no longer just about data. It's about <strong>speed</strong>, <strong>scalability</strong>, and <strong>security</strong>."</p>\n     </blockquote>\n\n     <h2>3. Example Code</h2>\n     <pre><code>&lt;?php\n     echo \"Hello, Web Development in 2025!\";\n     ?&gt;</code></pre>\n\n     <h2>Conclusion</h2>\n     <p>The future of web development is <mark>bright</mark>, with endless opportunities for developers who are willing to adapt and learn.</p>', '2025-08-18 16:24:59'),
(7, 'Healthy Living in a Digital World', '<h1>Healthy Living in a Digital World</h1>\n     <p>Technology makes our lives easier, but it also comes with <strong>challenges for physical and mental health</strong>. It's important to find balance.</p>\n\n     <h2>1. Physical Health</h2>\n     <p>Tips to stay active:</p>\n     <ul>\n        <li>Take a <em>10-minute walk</em> every hour.</li>\n        <li>Stretch while working long hours.</li>\n        <li>Use standing desks when possible.</li>\n     </ul>\n\n     <h2>2. Mental Wellness</h2>\n     <p>Practices like <strong>meditation</strong>, <strong>mindful breathing</strong>, and <strong>journaling</strong> can reduce stress.</p>\n\n     <h2>3. Balanced Screen Time</h2>\n     <p>Set <u>boundaries</u> for screen time. Try the <code>20-20-20 rule</code>: every 20 minutes, look at something 20 feet away for 20 seconds.</p>\n\n     <h2>Quote</h2>\n     <blockquote>\n        <p>"Health is not valued until sickness comes." – Thomas Fuller</p>\n     </blockquote>\n\n     <h2>Conclusion</h2>\n     <p>A balanced lifestyle in the digital age is possible with <mark>discipline and awareness</mark>.</p>', '2025-08-20 10:15:00'),
(8, 'Exploring the Beauty of the Maldives', '<h1>Exploring the Beauty of the Maldives</h1>\n     <p>The Maldives is a paradise of <strong>crystal-clear waters</strong>, <em>white sandy beaches</em>, and vibrant coral reefs.</p>\n\n     <h2>1. Culture & Traditions</h2>\n     <p>The Maldivian culture is a unique blend of South Asian, Arab, and African influences.</p>\n\n     <h2>2. Top Islands to Visit</h2>\n     <ul>\n        <li>Maafushi – Budget friendly</li>\n        <li>Baa Atoll – UNESCO Biosphere Reserve</li>\n        <li>Vaikaradhoo – Local island experience</li>\n     </ul>\n\n     <h2>3. Marine Life</h2>\n     <p>Diving in the Maldives introduces you to <code>whale sharks</code>, <code>manta rays</code>, and <code>colorful corals</code>.</p>\n\n     <h2>Travel Tip</h2>\n     <blockquote>\n        <p>"Take only memories, leave only footprints."</p>\n     </blockquote>\n\n     <h2>Conclusion</h2>\n     <p>If paradise has a name, it's the <mark>Maldives</mark>.</p>', '2025-08-22 09:45:30'),
(9, 'Mastering PHP for Beginners', '<h1>Mastering PHP for Beginners</h1>\n     <p>PHP is one of the most widely used programming languages for the web. It powers platforms like <strong>WordPress</strong>, <strong>Drupal</strong>, and <strong>Laravel</strong>.</p>\n\n     <h2>1. Why Learn PHP?</h2>\n     <ul>\n        <li>Easy to get started</li>\n        <li>Runs on almost every hosting service</li>\n        <li>Large community support</li>\n     </ul>\n\n     <h2>2. Hello World Example</h2>\n     <pre><code>&lt;?php\n     echo \"Hello, world!\";\n     ?&gt;</code></pre>\n\n     <h2>3. Database Example</h2>\n     <pre><code>&lt;?php\n     $conn = new mysqli(\"localhost\", \"root\", \"\", \"mydb\");\n     $result = $conn->query(\"SELECT * FROM articles\");\n     ?&gt;</code></pre>\n\n     <h2>4. Best Practices</h2>\n     <ol>\n        <li>Always sanitize user input</li>\n        <li>Use prepared statements</li>\n        <li>Follow MVC pattern when possible</li>\n     </ol>\n\n     <h2>Conclusion</h2>\n     <p>Learning PHP opens doors to <mark>web development opportunities</mark> worldwide.</p>', '2025-08-25 18:50:00');


DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL UNIQUE,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL UNIQUE,
  `role` enum('admin','user') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'user',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `users` (`id`, `username`, `password`, `email`, `role`, `created_at`) VALUES
(1, 'admin', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'admin@example.com', 'admin', '2025-08-28 12:00:00'),
(2, 'user1', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'user1@example.com', 'user', '2025-08-28 12:00:00');



/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;