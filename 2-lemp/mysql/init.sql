CREATE TABLE IF NOT EXISTS `users` (
   `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
   `login` varchar(16) COLLATE utf8mb4_unicode_ci NOT NULL,
   `password` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL,
   `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
   `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
   PRIMARY KEY (`id`),
   UNIQUE KEY `login` (`login`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `users` (`login`, `password`) VALUES('admin', MD5('password'));
