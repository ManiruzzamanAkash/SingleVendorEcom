-- -------------------------------------------------------------
-- TablePlus 4.0.0(370)
--
-- https://tableplus.com/
--
-- Database: ecommerce_laravel
-- Generation Time: 2021-08-08 20:24:31.2910
-- -------------------------------------------------------------


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


CREATE TABLE `admins` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_no` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `avatar` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Super Admin' COMMENT 'Admin|Super Admin',
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `admins_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `brands` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `image` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `slug` (`slug`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `carts` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `product_id` int unsigned NOT NULL,
  `user_id` int unsigned DEFAULT NULL,
  `order_id` int unsigned DEFAULT NULL,
  `ip_address` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_quantity` int NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `carts_user_id_foreign` (`user_id`),
  KEY `carts_product_id_foreign` (`product_id`),
  KEY `carts_order_id_foreign` (`order_id`),
  CONSTRAINT `carts_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE,
  CONSTRAINT `carts_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  CONSTRAINT `carts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `categories` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `show_navbar` tinyint(1) NOT NULL DEFAULT '0',
  `show_homepage` tinyint(1) NOT NULL DEFAULT '0',
  `navbar_priority` tinyint NOT NULL DEFAULT '1',
  `homepage_priority` tinyint NOT NULL DEFAULT '1',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `sub_header` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `slider_name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `slider_slogan` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `image` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parent_id` int DEFAULT NULL,
  `bg_color` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'transparent',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `categories_slug_unique` (`slug`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `coupons` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `is_order_discount` tinyint(1) NOT NULL DEFAULT '1' COMMENT '0=Item Discount, 1=Order Discount',
  `discount_amount` double(8,2) NOT NULL,
  `criteria_amount` double(8,2) NOT NULL,
  `direct_amount_or_percentage` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1=>Direct Amount, 0=>Percentage Amount',
  `total_quantity` int NOT NULL DEFAULT '1' COMMENT 'Total Coupon Quantity',
  `valid_date` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `coupons_code_unique` (`code`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `districts` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `division_id` int unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `divisions` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `priority` tinyint unsigned NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `orders` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int unsigned DEFAULT NULL,
  `payment_id` int unsigned DEFAULT NULL,
  `ip_address` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_no` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `shipping_address` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `message` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `is_paid` tinyint(1) NOT NULL DEFAULT '0',
  `is_completed` tinyint(1) NOT NULL DEFAULT '0',
  `is_seen_by_admin` tinyint(1) NOT NULL DEFAULT '0',
  `delivery_status` tinyint(1) NOT NULL DEFAULT '0',
  `transaction_id` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `shipping_charge` int NOT NULL DEFAULT '60',
  `custom_discount` int NOT NULL DEFAULT '0',
  `coupon_code` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `orders_user_id_foreign` (`user_id`),
  KEY `orders_payment_id_foreign` (`payment_id`),
  CONSTRAINT `orders_payment_id_foreign` FOREIGN KEY (`payment_id`) REFERENCES `payments` (`id`) ON DELETE CASCADE,
  CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `password_resets` (
  `email` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `payments` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `priority` tinyint NOT NULL DEFAULT '1',
  `short_name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `no` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Payment No',
  `type` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'agent|personal',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `payments_short_name_unique` (`short_name`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `product_images` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `product_id` int unsigned NOT NULL,
  `image` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=175 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `products` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `category_id` int unsigned NOT NULL,
  `brand_id` int unsigned NOT NULL,
  `title` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `occation` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slogan` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `delivery_time` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `slug` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` int NOT NULL DEFAULT '1',
  `price` int NOT NULL,
  `status` tinyint NOT NULL DEFAULT '0',
  `offer_price` int DEFAULT NULL,
  `discount` float DEFAULT NULL,
  `discount_type` enum('percentage','numeric') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'percentage',
  `warranty` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `admin_id` int unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `reviews` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `product_id` int unsigned NOT NULL,
  `user_id` int unsigned NOT NULL,
  `title` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `point` double(8,2) NOT NULL,
  `is_approved` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0 => unapproved, 1 => approved',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `reviews_product_id_foreign` (`product_id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `reviews_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  CONSTRAINT `reviews_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `settings` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `website_name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `website_logo` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `website_footer_text` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_cost` double(8,2) unsigned NOT NULL DEFAULT '50.00',
  `notice` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `info` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `sliders` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `image` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `button_text` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `button_link` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `button_text2` varchar(252) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `button_link2` varchar(252) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `priority` tinyint unsigned NOT NULL DEFAULT '10',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `users` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `first_name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `username` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_no` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `street_address` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `division_id` int unsigned NOT NULL COMMENT 'Division Table ID',
  `district_id` int unsigned NOT NULL COMMENT 'District Table ID',
  `status` tinyint unsigned NOT NULL DEFAULT '0' COMMENT '0=Inactive|1=Active|2=Ban',
  `ip_address` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `avatar` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_address` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `api_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_username_unique` (`username`),
  UNIQUE KEY `users_phone_no_unique` (`phone_no`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

CREATE TABLE `wishlists` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `product_id` int unsigned NOT NULL,
  `user_id` int unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `wishlists_user_id_foreign` (`user_id`),
  KEY `wishlists_product_id_foreign` (`product_id`),
  CONSTRAINT `wishlists_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  CONSTRAINT `wishlists_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `admins` (`id`, `name`, `email`, `password`, `phone_no`, `avatar`, `type`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@amarmartbd.com', '$2y$10$r1c5JzBsm0z3X.9pbCEZjurrqIulaFqgKnZaoCLm3Zgbn6YAn.znC', '01951233084', NULL, 'Super Admin', 'k0pg6dbf22vBmzlvvxph92bPlpxkqxTVxVaFvDEsgodjvx5yB2TtOUFTa8s3', '2018-08-29 05:18:25', '2021-06-23 01:23:25');

INSERT INTO `brands` (`id`, `name`, `slug`, `description`, `image`, `created_at`, `updated_at`) VALUES
(2, 'Sony', 'sony', '', '1532150006.png', '2018-07-21 05:13:26', '2018-07-21 05:13:26'),
(3, 'Samsung', 'samsung', '', '1532150024.png', '2018-07-21 05:13:44', '2018-07-21 05:13:44'),
(4, 'Others', 'others-1', NULL, '1532150085.png', '2018-07-21 05:14:46', '2021-08-03 16:18:05'),
(6, 'Man\'s Fashion', 'mans-fashion', 'Man\'s Fashion', '1628007470.jpg', '2019-05-28 07:12:19', '2021-08-03 16:17:50'),
(7, 'Baby Fashions', 'baby-fashions', NULL, NULL, '2019-05-28 07:15:11', '2019-05-28 07:15:11'),
(8, 'Armany', 'armany', NULL, NULL, '2019-05-28 07:15:33', '2019-05-28 07:15:33');

INSERT INTO `carts` (`id`, `product_id`, `user_id`, `order_id`, `ip_address`, `product_quantity`, `created_at`, `updated_at`) VALUES
(4, 15, NULL, NULL, '103.218.25.249', 10, '2019-09-30 23:59:09', '2019-09-30 23:59:13'),
(5, 19, NULL, NULL, '116.58.201.161', 1, '2019-10-01 03:57:07', '2019-10-01 03:57:07'),
(6, 16, 20, 1, '103.108.62.13', 2, '2019-10-01 14:58:46', '2019-10-01 15:00:25'),
(7, 13, NULL, NULL, '103.112.64.13', 2, '2019-10-04 04:44:36', '2019-10-04 04:44:45'),
(8, 16, 20, NULL, '37.111.199.92', 3, '2019-10-06 08:12:52', '2019-12-24 22:20:38'),
(9, 15, 20, 2, '103.112.64.13', 1, '2019-10-28 18:46:13', '2019-10-28 18:47:00'),
(10, 14, 20, NULL, '103.138.212.30', 1, '2019-12-24 22:20:53', '2019-12-24 22:20:53'),
(13, 20, 32, 3, NULL, 1, '2021-08-03 19:48:39', '2021-08-03 19:49:11'),
(18, 6, NULL, NULL, NULL, 1, '2021-08-08 05:33:44', '2021-08-08 05:33:44'),
(19, 8, NULL, NULL, NULL, 1, '2021-08-08 05:33:45', '2021-08-08 05:33:45'),
(20, 13, 32, 4, NULL, 3, '2021-08-08 08:32:18', '2021-08-08 09:30:45'),
(23, 6, 32, NULL, NULL, 2, '2021-08-08 13:58:50', '2021-08-08 14:02:23');

INSERT INTO `categories` (`id`, `name`, `show_navbar`, `show_homepage`, `navbar_priority`, `homepage_priority`, `status`, `sub_header`, `slider_name`, `slider_slogan`, `slug`, `description`, `image`, `parent_id`, `bg_color`, `created_at`, `updated_at`) VALUES
(5, 'Women\'s Bottoms', 1, 1, 3, 1, 1, 'Jewelries', 'Jewelry & Ornaments', 'Jewelry & Ornaments', 'jewelry-&-ornaments', NULL, '1628350102.jpg', NULL, '#000000', '2019-09-02 10:14:32', '2021-08-08 06:38:17'),
(6, 'Women\'s Underwears', 0, 1, 3, 2, 1, 'Mens', 'Women\'\'s', 'Women\'s Underwears', 'womens-underwire', NULL, '1628350185.jpg', NULL, '#000000', '2019-09-02 10:14:45', '2021-08-08 06:37:36'),
(7, 'Men\'s Tops', 0, 1, 1, 3, 1, 'Women\'s', 'Men', 'Men', 'mens-tops', NULL, '1628350273.jpg', NULL, 'transparent', '2019-09-02 10:14:59', '2021-08-07 15:31:13'),
(8, 'Men\'s Bottoms', 0, 1, 1, 4, 1, 'Mens', 'Mens', 'Men', 'mens-bottoms', 'Mens', '1628350412.jpg', NULL, 'transparent', '2019-09-02 10:15:14', '2021-08-07 19:48:08'),
(20, 'Women\'s Top\'s', 0, 1, 1, 5, 1, 'Women\'s Top\'s', 'Women\'s Top\'s', 'Women\'s Top\'s', 'womens-tops', 'Women\'s Top\'s', '1628350007.jpg', NULL, 'transparent', '2021-08-07 15:26:48', '2021-08-07 15:35:36'),
(21, 'Men\'s Underwears', 0, 1, 1, 6, 1, 'Men\'s Underwears', 'Men\'s Underwears', 'Men\'s Underwears', 'mens-underwears', NULL, '1628350509.jpg', NULL, 'transparent', '2021-08-07 15:35:09', '2021-08-07 15:35:09'),
(22, 'Men\'s Fashion', 1, 0, 1, 1, 1, 'Men\'s Fashion', 'Men\'s Fashion', 'Men\'s Fashion', 'mens', NULL, '1628350509.jpg', NULL, '#f7f7f7', '2021-08-07 15:35:09', '2021-08-08 06:33:07'),
(23, 'Women\'s Fashion', 1, 0, 2, 1, 1, 'Women\'s Fashion', 'Women\'s Fashion', 'Women\'s Fashion', 'womens', NULL, NULL, NULL, '#ffffff', '2021-08-08 01:19:14', '2021-08-08 02:59:52');

INSERT INTO `coupons` (`id`, `title`, `code`, `description`, `is_order_discount`, `discount_amount`, `criteria_amount`, `direct_amount_or_percentage`, `total_quantity`, `valid_date`, `created_at`, `updated_at`) VALUES
(1, '16 December Bijoy Dibosh', 'bijoy16', NULL, 1, 60.00, 1.00, 1, 91, '2019-12-31', '2019-06-30 02:22:09', '2019-12-24 22:21:38');

INSERT INTO `districts` (`id`, `name`, `division_id`, `created_at`, `updated_at`) VALUES
(2, 'Mymensingh Sadar', 4, '2018-07-21 12:42:21', '2018-07-21 12:42:33'),
(3, 'Khulna Sadar', 5, '2018-07-21 12:42:49', '2018-07-21 12:42:49'),
(5, 'Dhaka', 2, '2018-07-21 12:43:13', '2018-07-21 12:43:13'),
(6, 'Barisal Sadar', 6, '2018-07-21 12:44:42', '2018-07-21 12:44:42'),
(7, 'Bagerhat', 5, '2018-07-21 12:45:37', '2018-07-21 12:45:37');

INSERT INTO `divisions` (`id`, `name`, `priority`, `created_at`, `updated_at`) VALUES
(2, 'Dhaka', 1, '2018-07-21 12:24:27', '2018-07-21 12:24:27'),
(3, 'Rajshahi', 2, '2018-07-21 12:24:39', '2018-07-21 12:24:39'),
(4, 'Mymensingh', 8, '2018-07-21 12:24:51', '2018-07-21 12:24:51'),
(5, 'Khulna', 4, '2018-07-21 12:25:14', '2018-07-21 12:25:14'),
(6, 'Barisal', 5, '2018-07-21 12:43:36', '2018-07-21 12:43:36'),
(7, 'Chittagong', 3, '2018-07-21 12:43:48', '2018-07-21 12:43:48'),
(8, 'Sylhet', 6, '2018-07-21 12:44:02', '2018-07-21 12:44:02'),
(9, 'Rangpur', 7, '2018-07-21 12:44:14', '2018-07-21 12:44:14'),
(10, 'Dhaka', 1, '2020-01-01 06:27:22', '2020-01-01 06:27:22');

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(2, '2014_10_12_100000_create_password_resets_table', 1),
(6, '2018_02_23_015040_create_brands_table', 2),
(10, '2014_10_12_000000_create_users_table', 3),
(11, '2018_07_21_115850_create_divisions_table', 4),
(12, '2018_07_21_115908_create_districts_table', 4),
(14, '2018_08_28_034133_create_carts_table', 5),
(16, '2018_08_28_085245_create_payments_table', 7),
(18, '2018_02_23_015128_create_admins_table', 9),
(19, '2019_02_24_043826_create_sliders_table', 10),
(20, '2019_05_26_175156_create_wishlists_table', 11),
(21, '2019_06_01_201010_create_reviews_table', 12),
(24, '2019_06_29_185945_create_coupons_table', 13),
(26, '2018_02_23_020211_create_product_images_table', 14),
(28, '2018_08_28_033110_create_orders_table', 16),
(33, '2018_02_22_165732_create_products_table', 19),
(34, '2018_02_23_014906_create_categories_table', 20),
(35, '2018_08_28_083714_create_settings_table', 21);

INSERT INTO `orders` (`id`, `user_id`, `payment_id`, `ip_address`, `name`, `phone_no`, `shipping_address`, `email`, `message`, `is_paid`, `is_completed`, `is_seen_by_admin`, `delivery_status`, `transaction_id`, `created_at`, `updated_at`, `shipping_charge`, `custom_discount`, `coupon_code`) VALUES
(1, 20, 1, '103.108.62.13', 'Arman ahmed', '01759128544', 'old town', 'shanewaz12@gmail.com', NULL, 0, 0, 1, 0, NULL, '2019-10-01 15:00:24', '2019-10-01 15:01:07', 60, 60, 'bijoy16'),
(2, 20, 1, '103.112.64.13', 'Arman ahmed', '01759128544', 'rthrty', 'shanewaz12@gmail.com', NULL, 0, 0, 1, 0, NULL, '2019-10-28 18:47:00', '2021-08-03 16:18:19', 60, 60, 'bijoy16'),
(3, 32, 2, '::1', 'Maniruzzaman Akash', '01951233084', 'Patuakhali, Bangladesh', 'manirujjamanakash@gmail.com', NULL, 0, 0, 1, 0, '1902912801982', '2021-08-03 19:49:11', '2021-08-03 19:49:37', 60, 0, NULL),
(4, 32, 1, '::1', 'Maniruzzaman Akash', '01951233084', 'Dhaka', 'm.akash.cse@gmail.com', 'Please sent it here...', 0, 0, 0, 0, NULL, '2021-08-08 09:30:45', '2021-08-08 09:30:45', 60, 0, NULL);

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('manirujjamanakash@gmail.com', '$2y$10$Xuf6xXHHN.mjmog0oe5Twe0IwgYcCGAX4Piy2V.OzyY1QK91SenoS', '2019-04-26 09:53:28'),
('shanewaz12@gmail.com', '$2y$10$fe7/FncNpsL1P7QvbbWWOukBGn6b9hRUC4Hrx7GQPCLhVVzdDrBna', '2019-08-25 03:08:27'),
('shahnewaz926@gmail.com', '$2y$10$OXNm5EDviW5yO31gqQnVwOHW7QktD6BLDr1lIsEkyUBJ63xJLHvxC', '2019-08-25 03:44:35');

INSERT INTO `payments` (`id`, `name`, `image`, `priority`, `short_name`, `no`, `type`, `created_at`, `updated_at`) VALUES
(1, 'Cash In', 'cash_in.jpg', 1, 'cash_in', NULL, NULL, '2018-08-28 14:57:00', '2018-08-28 14:57:00'),
(2, 'Bkash', 'bkash.jpg', 2, 'bkash', '01951233084', 'personal', '2018-08-28 14:57:00', '2018-08-28 14:57:00'),
(3, 'Rocket', 'rocket.jpg', 3, 'rocket', '019512330845', 'personal', '2018-08-28 14:57:00', '2018-08-28 14:57:00');

INSERT INTO `product_images` (`id`, `product_id`, `image`, `created_at`, `updated_at`) VALUES
(125, 2, '15674145311.jpg', '2019-09-02 08:55:31', '2019-09-02 08:55:31'),
(126, 2, '15674145312.jpg', '2019-09-02 08:55:31', '2019-09-02 08:55:31'),
(127, 2, '15674145313.jpg', '2019-09-02 08:55:31', '2019-09-02 08:55:31'),
(128, 3, '15674309851.jpg', '2019-09-02 13:29:45', '2019-09-02 13:29:45'),
(129, 3, '15674309852.jpg', '2019-09-02 13:29:45', '2019-09-02 13:29:45'),
(130, 3, '15674309853.jpg', '2019-09-02 13:29:45', '2019-09-02 13:29:45'),
(131, 3, '15674309854.jpg', '2019-09-02 13:29:45', '2019-09-02 13:29:45'),
(132, 3, '15674309855.jpg', '2019-09-02 13:29:45', '2019-09-02 13:29:45'),
(133, 3, '15674309856.jpg', '2019-09-02 13:29:45', '2019-09-02 13:29:45'),
(140, 6, '15685798571.jpg', '2019-09-15 20:37:37', '2019-09-15 20:37:37'),
(141, 6, '15685798572.jpg', '2019-09-15 20:37:37', '2019-09-15 20:37:37'),
(142, 6, '15685798573.jpeg', '2019-09-15 20:37:37', '2019-09-15 20:37:37'),
(143, 7, '15685799781.jpeg', '2019-09-15 20:39:38', '2019-09-15 20:39:38'),
(144, 7, '15685799782.jpeg', '2019-09-15 20:39:39', '2019-09-15 20:39:39'),
(145, 7, '15685799793.jpeg', '2019-09-15 20:39:39', '2019-09-15 20:39:39'),
(146, 7, '15685799794.jpeg', '2019-09-15 20:39:39', '2019-09-15 20:39:39'),
(147, 8, '15697808361.png', '2019-09-29 18:13:56', '2019-09-29 18:13:56'),
(148, 8, '15697808362.png', '2019-09-29 18:13:56', '2019-09-29 18:13:56'),
(149, 9, '15697809221.png', '2019-09-29 18:15:22', '2019-09-29 18:15:22'),
(150, 9, '15697809222.jpg', '2019-09-29 18:15:22', '2019-09-29 18:15:22'),
(151, 10, '15697810501.webp', '2019-09-29 18:17:30', '2019-09-29 18:17:30'),
(152, 10, '15697810502.png', '2019-09-29 18:17:31', '2019-09-29 18:17:31'),
(153, 11, '15697812321.png', '2019-09-29 18:20:32', '2019-09-29 18:20:32'),
(154, 11, '15697812322.png', '2019-09-29 18:20:32', '2019-09-29 18:20:32'),
(155, 12, '15697813201.png', '2019-09-29 18:22:00', '2019-09-29 18:22:00'),
(156, 12, '15697813202.png', '2019-09-29 18:22:00', '2019-09-29 18:22:00'),
(157, 13, '15697818641.jpg', '2019-09-29 18:31:04', '2019-09-29 18:31:04'),
(158, 13, '15697818642.jpg', '2019-09-29 18:31:04', '2019-09-29 18:31:04'),
(159, 14, '15697819281.webp', '2019-09-29 18:32:08', '2019-09-29 18:32:08'),
(160, 14, '15697819282.jpg', '2019-09-29 18:32:08', '2019-09-29 18:32:08'),
(161, 15, '15697819691.jpg', '2019-09-29 18:32:49', '2019-09-29 18:32:49'),
(162, 15, '15697819692.jpg', '2019-09-29 18:32:49', '2019-09-29 18:32:49'),
(163, 16, '15697821741.jpg', '2019-09-29 18:36:14', '2019-09-29 18:36:14'),
(164, 16, '15697821742.webp', '2019-09-29 18:36:15', '2019-09-29 18:36:15'),
(165, 17, '15697822211.jpg', '2019-09-29 18:37:01', '2019-09-29 18:37:01'),
(166, 17, '15697822212.jpg', '2019-09-29 18:37:01', '2019-09-29 18:37:01'),
(167, 18, '15697822721.jpg', '2019-09-29 18:37:52', '2019-09-29 18:37:52'),
(168, 18, '15697822722.jpg', '2019-09-29 18:37:52', '2019-09-29 18:37:52'),
(169, 19, '15697823601.jpg', '2019-09-29 18:39:20', '2019-09-29 18:39:20'),
(170, 19, '15697823602.jpg', '2019-09-29 18:39:20', '2019-09-29 18:39:20'),
(171, 20, '15697824561.jpg', '2019-09-29 18:40:56', '2019-09-29 18:40:56'),
(172, 20, '15697824562.jpg', '2019-09-29 18:40:56', '2019-09-29 18:40:56'),
(174, 22, '16280067161.png', '2021-08-03 16:05:17', '2021-08-03 16:05:17');

INSERT INTO `products` (`id`, `category_id`, `brand_id`, `title`, `occation`, `slogan`, `delivery_time`, `description`, `slug`, `quantity`, `price`, `status`, `offer_price`, `discount`, `discount_type`, `warranty`, `admin_id`, `created_at`, `updated_at`) VALUES
(3, 1, 3, 'Multiposition fan & LED light with USB Charger', 'Opening disount !', 'Grab it now', '2 - 5', 'Multiposition fan & LED light with USB Charger', 'multiposition-fan-led-light-with-usb-charger', 10, 250, 0, 320, NULL, 'percentage', '1', 2, '2019-09-02 13:29:44', '2019-09-02 13:29:44'),
(6, 22, 6, 'Polo T Shirt', 'Polo', 'Polo T Shirt', '3600', 'Polo T Shirt Polo T Shirt Polo T Shirt Polo T Shirt', 'polo-t-shirt', 100, 1000, 0, 500, 50, 'percentage', '0', 1, '2019-09-15 20:37:37', '2021-08-08 13:52:15'),
(7, 22, 6, 'New Polo Shirt', 'New Polo Shirt', 'New Polo Shirt', '3600', 'New Polo Shirt New Polo Shirt', 'new-polo-shirt', 9, 999, 0, 899, 10, 'percentage', '0', 1, '2019-09-15 20:39:38', '2021-08-08 13:58:32'),
(8, 22, 6, 'Red Polo T-Shirt for Men', 'Red Polo T-Shirt', 'Red Polo T-Shirt', '3600', 'Red Polo T-Shirt for Men.\r\nSleeve Cotton T-shirt', 'red-polo-t-shirt-for-men-gents', 10, 250, 0, 125, 50, 'percentage', '0', 1, '2019-09-29 18:13:56', '2021-08-08 13:52:28'),
(9, 22, 6, 'Formal Check Shirt For Men', 'Formal Check Shirt', 'Formal Check Shirt', '12/02/2019', 'Formal Check Shirt \r\nCotton Shirt', 'formal-check-shirt-for-men-gents', 200, 450, 0, 400, NULL, 'percentage', '0', 1, '2019-09-29 18:15:22', '2019-09-29 18:15:22'),
(10, 22, 6, 'T-shirt Gray For Men', 'T-shirt Gray', 'T-shirt Gray', '3600', 'T-shirt Gray  For Men.\r\nCotton T-shirt.\r\nSweetable in any season', 't-shirt-gray-for-men-gents', 10, 300, 0, 255, 15, 'percentage', NULL, 1, '2019-09-29 18:17:30', '2021-08-08 13:53:36'),
(11, 22, 6, 'Men Sleeve Cotton Formal Shirt', 'Men Sleeve Cotton Formal Shirt', 'Men Sleeve Cotton Formal Shirt', '3600', 'Men Sleeve Cotton Formal Shirt\r\nCotton Shirt', 'men-sleeve-cotton-formal-shirt-gents', 200, 800, 0, 320, 60, 'percentage', NULL, 1, '2019-09-29 18:20:32', '2021-08-08 13:53:27'),
(12, 22, 6, 'Polo Shirt -Any Color for Men', 'Polo Shirt -Any Color for Men', 'Polo Shirt -Any Color for Men', '3600', 'Polo Shirt -Any Color for Men', 'polo-shirt-any-color-for-men', 20, 560, 0, 532, 5, 'percentage', NULL, 1, '2019-09-29 18:22:00', '2021-08-08 13:53:13'),
(13, 23, 8, 'Pink and Blue Mix Sharee for Women', 'Pink and Blue Mix Sharee for Women', 'Pink and Blue Mix Sharee for Women', '12/02/2019', 'Pink and Blue Mix Sharee for Women', 'pink-and-blue-mix-sharee-for-women', 10, 1600, 0, 1900, NULL, 'percentage', '0', 1, '2019-09-29 18:31:04', '2019-09-29 18:31:04'),
(14, 23, 8, 'Blue Party Sharee', 'Blue Party Sharee', 'Blue Party Sharee', '3600', 'Blue Party Sharee', 'blue-party-sharee', 10, 2500, 0, 2000, 20, 'percentage', NULL, 1, '2019-09-29 18:32:08', '2021-08-08 13:53:00'),
(15, 23, 8, 'Office Sharee For Women - formal', 'Office Sharee For Women - formal', 'Office Sharee For Women - formal', '12/02/2019', 'Office Sharee For Women - formal', 'office-sharee-for-women-formal', 20, 1200, 0, 1500, NULL, 'percentage', '0', 1, '2019-09-29 18:32:49', '2019-09-29 18:32:49'),
(16, 23, 8, 'Party Saluar Kamee for women/girls', 'Party Saluar Kamee for women/girls', 'Party Saluar Kamee for women/girls', '12/02/2019', 'Party Saluar Kamee for women/girls', 'party-saluar-kamee-for-womengirls', 2, 5000, 0, 5500, NULL, 'percentage', NULL, 1, '2019-09-29 18:36:14', '2019-09-29 18:36:14'),
(17, 23, 8, 'Sleeve Cotton Saluar Kameez', 'Sleeve Cotton Saluar Kameez', 'Sleeve Cotton Saluar Kameez', '12/02/2019', 'Sleeve Cotton Saluar Kameez', 'sleeve-cotton-saluar-kameez', 5, 2900, 0, 3000, NULL, 'percentage', NULL, 1, '2019-09-29 18:37:01', '2019-09-29 18:37:01'),
(18, 23, 8, 'Green Color Multi Design Saluar Kameez', 'Green Color Multi Design Saluar Kameez', 'Green Color Multi Design Saluar Kameez', '3600', 'Green Color Multi Design Saluar Kameez', 'green-color-multi-design-saluar-kameez', 10, 3000, 0, 2700, 10, 'percentage', NULL, 1, '2019-09-29 18:37:52', '2021-08-08 13:52:50'),
(19, 23, 8, 'Silk Saluar Kameez for women', 'Silk Saluar Kameez for women', 'Silk Saluar Kameez for women', '12/02/2019', 'Silk Saluar Kameez for women', 'silk-saluar-kameez-for-women', 2, 2900, 0, 3000, NULL, 'percentage', NULL, 1, '2019-09-29 18:39:20', '2019-09-29 18:39:20'),
(20, 1, 3, 'Samsung J7 Promo', 'Samsung J7 Promo', 'Samsung J7 Promo', '12/02/2019', 'Samsung J7 Promo', 'samsung-j7-promo', 200, 12000, 0, 13000, NULL, 'percentage', NULL, 1, '2019-09-29 18:40:56', '2019-09-29 18:41:12'),
(22, 23, 4, 'Fashionable Ladies Bag', 'Fashionable Ladies Bag', 'Fashionable Ladies Bag', '3600', 'Fashionable Ladies Bag', 'fashionable-ladies-bag-women', 100, 3500, 0, 2800, 20, 'percentage', '1', 1, '2021-08-03 16:05:16', '2021-08-08 13:52:38');

INSERT INTO `reviews` (`id`, `product_id`, `user_id`, `title`, `description`, `point`, `is_approved`, `created_at`, `updated_at`) VALUES
(1, 3, 19, 'Nice Software', 'sdsdsd', 4.00, 0, '2019-09-06 17:15:41', '2019-09-06 17:15:41');

INSERT INTO `settings` (`id`, `website_name`, `website_logo`, `website_footer_text`, `email`, `phone`, `address`, `shipping_cost`, `notice`, `info`, `created_at`, `updated_at`) VALUES
(1, 'The KINGSMAN', '1628432441.png', '@copy; 2021 all rights reserved', 'info@kingsman.com', '01951233084', 'Dhaka', 50.00, NULL, '{\"order\":{\"shipping_cost\":\"50\"},\"social\":{\"facebook\":\"https:\\/\\/facebook.com\\/the-kings-man\",\"twitter\":\"https:\\/\\/twitter.com\\/website\",\"instagram\":\"https:\\/\\/instagram.com\\/website\",\"linkedin\":\"https:\\/\\/linkedin.com\\/website\",\"pinterest\":\"https:\\/\\/pinterest.com\\/website\",\"youtube\":\"https:\\/\\/youtube.com\\/website\"},\"theme\":{\"base_theme\":\"light\",\"slider\":{\"single_slider\":\"false\",\"enable_two_buttons\":\"true\"},\"header_menu\":{\"enable_all_category\":\"false\",\"enable_single_category\":\"true\"}}}', '2021-08-06 17:04:01', '2021-08-08 14:21:09');

INSERT INTO `sliders` (`id`, `title`, `description`, `image`, `button_text`, `button_link`, `button_text2`, `button_link2`, `status`, `priority`, `created_at`, `updated_at`) VALUES
(9, 'Denim Icons and Tees', '<p><b>The uniform. Forever jeans </b></p><p><b>and breathable t-shirt.</b></p>', '1628351092.jpeg', 'Shop Women\'s', 'products/category/womens', 'Shop Men\'s', 'products/category/mens', 1, 10, '2021-08-07 06:14:19', '2021-08-07 15:44:54');

INSERT INTO `users` (`id`, `first_name`, `last_name`, `username`, `phone_no`, `email`, `password`, `street_address`, `division_id`, `district_id`, `status`, `ip_address`, `avatar`, `shipping_address`, `api_token`, `remember_token`, `created_at`, `updated_at`) VALUES
(19, 'Maniruzzaman', 'Akash', 'maniruzzamanakash', '1951233084', 'manirujjamanakash@gmail.com', '$2y$10$19CCRRhzE0UyV1JxxhS5pu8pRpUn9dZxECOKEScdSh/UQonqL/nqm', 'Patuakhali, Bangladesh', 2, 5, 1, '::1', NULL, NULL, 'c17a8a79ba06864b34fd4101130f72439075da332ba8cad432dca0dc969e', 'lhgYkvRFGTUnSc6s108n9LDmfzyKXE6DElxVRp1LnRcqP1bZPM6PHLLXfbTs', '2019-04-26 18:41:48', '2019-04-26 18:42:52'),
(20, 'Arman', 'ahmed', 'armaanahmed', '01759128544', 'shanewaz12@gmail.com', '$2y$10$hQPpX23JnL0FA.4e0bYiEeLREFZe7uEEaLruY6xiwzXnqoYIXs/XO', 'oldtown,dhaka 1100', 2, 7, 1, '::1', NULL, NULL, 'cb79aa60064846b9ff23b5a53a69372d4c9670a97f590b8b983c53686709', 'Gsq5TJDYiYDInJly2QYLNaWCLKvkylIR1cilQVk28FXXH7aeB9TDMM1klh4u', '2019-05-04 03:56:34', '2019-09-03 13:51:16'),
(29, 'Admin', 'company', 'armaanahmed1', '01986895415', 'shahnewaz926@gmail.com', '$2y$10$.HortIReKQ/NnZhrXzaN7uqZ5cVtaj0mCw.RIREizrbIS6/bQaB.u', '60/2 old town dhaka', 2, 5, 1, '::1', NULL, NULL, '4f3087ca49f9af0b6752de95c09a470cd1539ec8a8c602057c73cccde5c9', 'OjwW9UMnmnCKNlS4xXdc56j1Q75msRg3zS6djR6SKWvsMAA0e5amxwkNTJOF', '2019-08-25 08:35:19', '2019-08-30 05:13:23'),
(30, 'Shahidur Rahman', 'Ansari', 'shahidurrahmanansari', '01934367189', 'rajiul2018@gmail.com', '$2y$10$BMRG3nYtwV3z9TbD2oOm5.6b9fPmulSl/BrM3cQQ3HHSfKoQ8H7a2', '60/2 old town dhaka', 2, 5, 1, '::1', NULL, NULL, 'b66373e472f79ff682cb817b61d9c272739a6e1565dfaa8de0de8f473ff6', NULL, '2019-09-01 16:53:21', '2019-09-01 16:53:49'),
(31, 'Faiyaz', 'ansari', 'faiyazansari', '01986895413', 'maccaf.team@gmail.com', '$2y$10$jJlfwThsxK1R3t/O1zFajOPSqtYXJiYGPnC0q87J0aeGygZEswFrC', 'old town', 5, 7, 0, '103.138.213.110', NULL, NULL, '8bc00eafc4a2a21f4add3a808c7402edee96855a26f91cd11ebe4a3dca34', '6N9Xgo6jO46jDyN6udZNH5Fow50X1pANAmB0ZHhBivbhamX8VV', '2020-01-01 06:29:43', '2020-01-01 06:29:43'),
(32, 'Maniruzzaman', 'Akash', 'maniruzzamanakash1', '01951233084', 'm.akash.cse@gmail.com', '$2y$10$AfM6.ULrLfm20ohjvLrMQObfjZoTSuOhFQfXmO0lmXL67nWf/D3TW', 'Mohakhali', 2, 5, 1, '::1', NULL, NULL, 'e546835a66d927d865c087a478cc2f4e5e0bb0d87a774cc461f6b59790e0', 'pUaEVMmHbGU0nlcAQNL69Gw1JbpQ77z5zyJsFEb2vfbGUknyp2Hpn3vp2M1P', '2021-08-03 19:39:41', '2021-08-03 19:39:41');

INSERT INTO `wishlists` (`id`, `product_id`, `user_id`, `created_at`, `updated_at`) VALUES
(2, 3, 19, '2019-09-15 16:10:05', '2019-09-15 16:10:05'),
(3, 7, 19, '2019-09-15 20:40:05', '2019-09-15 20:40:05'),
(4, 6, 19, '2019-09-15 20:40:07', '2019-09-15 20:40:07'),
(5, 15, 19, '2019-10-24 16:57:52', '2019-10-24 16:57:52'),
(6, 6, 32, '2021-08-08 05:54:51', '2021-08-08 05:54:51'),
(7, 14, 32, '2021-08-08 06:26:59', '2021-08-08 06:26:59');



/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;