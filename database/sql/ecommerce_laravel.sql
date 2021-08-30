-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 29, 2021 at 09:17 PM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 7.4.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `km`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_no` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `avatar` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Super Admin' COMMENT 'Admin|Super Admin',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `password`, `phone_no`, `avatar`, `type`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@amarmartbd.com', '$2y$10$r1c5JzBsm0z3X.9pbCEZjurrqIulaFqgKnZaoCLm3Zgbn6YAn.znC', '01951233084', NULL, 'Super Admin', 'k0pg6dbf22vBmzlvvxph92bPlpxkqxTVxVaFvDEsgodjvx5yB2TtOUFTa8s3', '2018-08-28 11:18:25', '2021-06-22 07:23:25');

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `name`, `slug`, `description`, `image`, `created_at`, `updated_at`) VALUES
(2, 'Sony', 'sony', '', '1532150006.png', '2018-07-20 11:13:26', '2018-07-20 11:13:26'),
(3, 'Samsung', 'samsung', '', '1532150024.png', '2018-07-20 11:13:44', '2018-07-20 11:13:44'),
(4, 'Others', 'others-1', NULL, '1532150085.png', '2018-07-20 11:14:46', '2021-08-02 22:18:05'),
(6, 'Man\'s Fashion', 'mans-fashion', 'Man\'s Fashion', '1628007470.jpg', '2019-05-27 13:12:19', '2021-08-02 22:17:50'),
(7, 'Baby Fashions', 'baby-fashions', NULL, NULL, '2019-05-27 13:15:11', '2019-05-27 13:15:11'),
(8, 'Armany', 'armany', NULL, NULL, '2019-05-27 13:15:33', '2019-05-27 13:15:33');

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `order_id` int(10) UNSIGNED DEFAULT NULL,
  `product_size` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ip_address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_quantity` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `carts`
--

INSERT INTO `carts` (`id`, `product_id`, `user_id`, `order_id`, `product_size`, `ip_address`, `product_quantity`, `created_at`, `updated_at`) VALUES
(4, 15, NULL, NULL, NULL, '103.218.25.249', 10, '2019-09-30 05:59:09', '2019-09-30 05:59:13'),
(5, 19, NULL, NULL, NULL, '116.58.201.161', 1, '2019-09-30 09:57:07', '2019-09-30 09:57:07'),
(6, 16, 20, 1, NULL, '103.108.62.13', 2, '2019-09-30 20:58:46', '2019-09-30 21:00:25'),
(7, 13, NULL, NULL, NULL, '103.112.64.13', 2, '2019-10-03 10:44:36', '2019-10-03 10:44:45'),
(8, 16, 20, NULL, NULL, '37.111.199.92', 3, '2019-10-05 14:12:52', '2019-12-24 04:20:38'),
(9, 15, 20, 2, NULL, '103.112.64.13', 1, '2019-10-28 00:46:13', '2019-10-28 00:47:00'),
(10, 14, 20, NULL, NULL, '103.138.212.30', 1, '2019-12-24 04:20:53', '2019-12-24 04:20:53'),
(13, 20, 32, 3, NULL, NULL, 1, '2021-08-03 01:48:39', '2021-08-03 01:49:11'),
(18, 7, 30, 4, 's', NULL, 1, '2021-08-08 10:43:49', '2021-08-08 10:44:15'),
(19, 8, 30, 4, 'm', NULL, 1, '2021-08-08 10:43:51', '2021-08-08 10:44:15'),
(39, 7, NULL, NULL, '3XL', NULL, 1, '2021-08-29 13:11:21', '2021-08-29 13:11:21');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `show_navbar` tinyint(1) NOT NULL DEFAULT 0,
  `show_homepage` tinyint(1) NOT NULL DEFAULT 0,
  `navbar_priority` tinyint(4) NOT NULL DEFAULT 1,
  `homepage_priority` tinyint(4) NOT NULL DEFAULT 1,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `sub_header` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slider_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slider_slogan` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `bg_color` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'transparent',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `show_navbar`, `show_homepage`, `navbar_priority`, `homepage_priority`, `status`, `sub_header`, `slider_name`, `slider_slogan`, `slug`, `description`, `image`, `parent_id`, `bg_color`, `created_at`, `updated_at`) VALUES
(5, 'Women\'s Bottoms', 0, 1, 1, 4, 1, 'Jewelries', 'Jewelry & Ornaments', 'Jewelry & Ornaments', 'jewelry-&-ornaments', NULL, '1628350102.jpg', NULL, '#000000', '2019-09-01 16:14:32', '2021-08-27 05:30:14'),
(6, 'Women\'s Underwears', 0, 1, 1, 5, 1, 'Mens', 'Women\'\'s', 'Women\'s Underwears', 'womens-underwire', NULL, '1628350185.jpg', NULL, '#000000', '2019-09-01 16:14:45', '2021-08-27 05:30:22'),
(7, 'Men\'s Tops', 1, 1, 2, 1, 1, 'Women\'s', 'Men', 'Men', 'mens-tops', NULL, '1628350273.jpg', NULL, '#e6e6e6', '2019-09-01 16:14:59', '2021-08-27 05:29:26'),
(8, 'Men\'s Bottoms', 0, 1, 1, 2, 1, 'Mens', 'Mens', 'Men', 'mens-bottoms', 'Mens', '1628350412.jpg', NULL, '#000000', '2019-09-01 16:15:14', '2021-08-27 05:29:38'),
(20, 'Women\'s Top\'s', 1, 1, 4, 5, 1, 'Women\'s Top\'s', 'Women\'s Top\'s', 'Women\'s Top\'s', 'womens-tops', 'Women\'s Top\'s', '1628350007.jpg', NULL, '#000000', '2021-08-06 21:26:48', '2021-08-22 00:55:42'),
(21, 'Men\'s Underwears', 0, 1, 1, 3, 1, 'Men\'s Underwears', 'Men\'s Underwears', 'Men\'s Underwears', 'mens-underwears', NULL, '1628350509.jpg', NULL, '#000000', '2021-08-06 21:35:09', '2021-08-27 05:30:48'),
(22, 'Men\'s Fashion', 1, 0, 1, 1, 1, 'Men\'s Fashion', 'Men\'s Fashion', 'Men\'s Fashion', 'mens', NULL, '1628350509.jpg', NULL, '#ffffff', '2021-08-06 21:35:09', '2021-08-22 00:56:03'),
(23, 'Women\'s Fashion', 1, 0, 3, 1, 1, 'Women\'s Fashion', 'Women\'s Fashion', 'Women\'s Fashion', 'womens', NULL, NULL, NULL, '#ffffff', '2021-08-07 07:19:14', '2021-08-22 00:50:52');

-- --------------------------------------------------------

--
-- Table structure for table `coupons`
--

CREATE TABLE `coupons` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_order_discount` tinyint(1) NOT NULL DEFAULT 1 COMMENT '0=Item Discount, 1=Order Discount',
  `discount_amount` double(8,2) NOT NULL,
  `criteria_amount` double(8,2) NOT NULL,
  `direct_amount_or_percentage` tinyint(1) NOT NULL DEFAULT 1 COMMENT '1=>Direct Amount, 0=>Percentage Amount',
  `total_quantity` int(11) NOT NULL DEFAULT 1 COMMENT 'Total Coupon Quantity',
  `valid_date` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `coupons`
--

INSERT INTO `coupons` (`id`, `title`, `code`, `description`, `is_order_discount`, `discount_amount`, `criteria_amount`, `direct_amount_or_percentage`, `total_quantity`, `valid_date`, `created_at`, `updated_at`) VALUES
(1, '16 December Bijoy Dibosh', 'bijoy16', NULL, 1, 60.00, 1.00, 1, 91, '2019-12-31', '2019-06-29 08:22:09', '2019-12-24 04:21:38');

-- --------------------------------------------------------

--
-- Table structure for table `districts`
--

CREATE TABLE `districts` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `division_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `districts`
--

INSERT INTO `districts` (`id`, `name`, `division_id`, `created_at`, `updated_at`) VALUES
(2, 'Mymensingh Sadar', 4, '2018-07-20 18:42:21', '2018-07-20 18:42:33'),
(3, 'Khulna Sadar', 5, '2018-07-20 18:42:49', '2018-07-20 18:42:49'),
(5, 'Dhaka', 2, '2018-07-20 18:43:13', '2018-07-20 18:43:13'),
(6, 'Barisal Sadar', 6, '2018-07-20 18:44:42', '2018-07-20 18:44:42'),
(7, 'Bagerhat', 5, '2018-07-20 18:45:37', '2018-07-20 18:45:37');

-- --------------------------------------------------------

--
-- Table structure for table `divisions`
--

CREATE TABLE `divisions` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `priority` tinyint(3) UNSIGNED NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `divisions`
--

INSERT INTO `divisions` (`id`, `name`, `priority`, `created_at`, `updated_at`) VALUES
(2, 'Dhaka', 1, '2018-07-20 18:24:27', '2018-07-20 18:24:27'),
(3, 'Rajshahi', 2, '2018-07-20 18:24:39', '2018-07-20 18:24:39'),
(4, 'Mymensingh', 8, '2018-07-20 18:24:51', '2018-07-20 18:24:51'),
(5, 'Khulna', 4, '2018-07-20 18:25:14', '2018-07-20 18:25:14'),
(6, 'Barisal', 5, '2018-07-20 18:43:36', '2018-07-20 18:43:36'),
(7, 'Chittagong', 3, '2018-07-20 18:43:48', '2018-07-20 18:43:48'),
(8, 'Sylhet', 6, '2018-07-20 18:44:02', '2018-07-20 18:44:02'),
(9, 'Rangpur', 7, '2018-07-20 18:44:14', '2018-07-20 18:44:14'),
(10, 'Dhaka', 1, '2019-12-31 12:27:22', '2019-12-31 12:27:22');

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

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `payment_id` int(10) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_no` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shipping_address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `message` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_paid` tinyint(1) NOT NULL DEFAULT 0,
  `is_completed` tinyint(1) NOT NULL DEFAULT 0,
  `is_seen_by_admin` tinyint(1) NOT NULL DEFAULT 0,
  `delivery_status` tinyint(1) NOT NULL DEFAULT 0,
  `transaction_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `shipping_charge` int(11) NOT NULL DEFAULT 60,
  `custom_discount` int(11) NOT NULL DEFAULT 0,
  `coupon_code` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `payment_id`, `ip_address`, `name`, `phone_no`, `shipping_address`, `email`, `message`, `is_paid`, `is_completed`, `is_seen_by_admin`, `delivery_status`, `transaction_id`, `created_at`, `updated_at`, `shipping_charge`, `custom_discount`, `coupon_code`) VALUES
(1, 20, 1, '103.108.62.13', 'Arman ahmed', '01759128544', 'old town', 'shanewaz12@gmail.com', NULL, 0, 0, 1, 0, NULL, '2019-09-30 21:00:24', '2019-09-30 21:01:07', 60, 60, 'bijoy16'),
(2, 20, 1, '103.112.64.13', 'Arman ahmed', '01759128544', 'rthrty', 'shanewaz12@gmail.com', NULL, 0, 0, 1, 0, NULL, '2019-10-28 00:47:00', '2021-08-02 22:18:19', 60, 60, 'bijoy16'),
(3, 32, 2, '::1', 'Maniruzzaman Akash', '01951233084', 'Patuakhali, Bangladesh', 'manirujjamanakash@gmail.com', NULL, 0, 0, 1, 0, '1902912801982', '2021-08-03 01:49:11', '2021-08-03 01:49:37', 60, 0, NULL),
(4, 30, 1, '::1', 'mr moon', '01521245318', 'dhaka\r\ndhaka', 'rubel@gmail.com', NULL, 1, 0, 1, 0, NULL, '2021-08-08 10:44:14', '2021-08-08 10:51:28', 60, 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('manirujjamanakash@gmail.com', '$2y$10$Xuf6xXHHN.mjmog0oe5Twe0IwgYcCGAX4Piy2V.OzyY1QK91SenoS', '2019-04-25 15:53:28'),
('shanewaz12@gmail.com', '$2y$10$fe7/FncNpsL1P7QvbbWWOukBGn6b9hRUC4Hrx7GQPCLhVVzdDrBna', '2019-08-24 09:08:27'),
('shahnewaz926@gmail.com', '$2y$10$OXNm5EDviW5yO31gqQnVwOHW7QktD6BLDr1lIsEkyUBJ63xJLHvxC', '2019-08-24 09:44:35');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `priority` tinyint(4) NOT NULL DEFAULT 1,
  `short_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Payment No',
  `type` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'agent|personal',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `name`, `image`, `priority`, `short_name`, `no`, `type`, `created_at`, `updated_at`) VALUES
(1, 'Cash In', 'cash_in.jpg', 1, 'cash_in', NULL, NULL, '2018-08-27 20:57:00', '2018-08-27 20:57:00'),
(2, 'Bkash', 'bkash.jpg', 2, 'bkash', '01951233084', 'personal', '2018-08-27 20:57:00', '2018-08-27 20:57:00'),
(3, 'Rocket', 'rocket.jpg', 3, 'rocket', '019512330845', 'personal', '2018-08-27 20:57:00', '2018-08-27 20:57:00');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(10) UNSIGNED NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `brand_id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `occation` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slogan` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `delivery_time` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` int(11) NOT NULL DEFAULT 1,
  `price` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `offer_price` int(11) DEFAULT NULL,
  `discount` float DEFAULT NULL,
  `discount_type` enum('percentage','numeric') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'percentage',
  `warranty` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `admin_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category_id`, `brand_id`, `title`, `occation`, `slogan`, `delivery_time`, `description`, `slug`, `quantity`, `price`, `status`, `offer_price`, `discount`, `discount_type`, `warranty`, `admin_id`, `created_at`, `updated_at`) VALUES
(3, 22, 3, 'Multiposition fan & LED light with USB Charger', 'Opening disount !', 'Grab it now', '3600', 'Multiposition fan & LED light with USB Charger', 'multiposition-fan-led-light-with-usb-charger', 10, 250, 0, 0, NULL, 'percentage', '1', 2, '2019-09-01 19:29:44', '2021-08-22 05:49:38'),
(6, 22, 6, 'Polo T Shirt', 'Polo', '212528', '3600', 'Polo T Shirt Polo T Shirt Polo T Shirt Polo T Shirt', 'polo-t-shirt', 100, 1000, 0, 500, 50, 'percentage', '0', 1, '2019-09-15 02:37:37', '2021-08-22 05:19:06'),
(7, 22, 6, 'New Polo Shirt', 'New Polo Shirt', 'New Polo Shirt', '3600', '<div class=\"cell small-12 medium-6 large-4 medium-offset-1\" style=\"box-sizing: inherit; -webkit-tap-highlight-color: rgba(0, 0, 0, 0); margin: 0px 0px 0px 112.859px; padding: 1rem; flex: 0 0 auto; min-height: 0px; min-width: 0px; width: 451.484px; color: rgb(10, 10, 10); font-family: Arial, sans-serif;\"><h5 style=\"box-sizing: inherit; -webkit-tap-highlight-color: rgba(0, 0, 0, 0); margin-right: 0px; margin-bottom: 1rem; margin-left: 1rem; padding: 0px; font-family: Arial, sans-serif; font-weight: bold; text-rendering: optimizelegibility; font-size: 1.1rem; line-height: 1.4;\">Description</h5><p style=\"box-sizing: inherit; -webkit-tap-highlight-color: rgba(0, 0, 0, 0); margin-right: 0px; margin-bottom: 0px; margin-left: 1rem; padding: 0px; font-size: inherit; line-height: 1.6; text-rendering: optimizelegibility;\"><span style=\"box-sizing: inherit; -webkit-tap-highlight-color: rgba(0, 0, 0, 0);\">The LUXURY Collection comprises of minimalistic, impeccable designs crafted from the world’s finest materials.</span><br style=\"box-sizing: inherit; -webkit-tap-highlight-color: rgba(0, 0, 0, 0);\"></p></div><div class=\"cell small-12 medium-5 large-5 large-offset-2\" style=\"box-sizing: inherit; -webkit-tap-highlight-color: rgba(0, 0, 0, 0); margin: 0px 0px 0px 225.75px; padding: 1rem; flex: 0 0 auto; min-height: 0px; min-width: 0px; width: 564.375px; color: rgb(10, 10, 10); font-family: Arial, sans-serif;\"><h5 style=\"box-sizing: inherit; -webkit-tap-highlight-color: rgba(0, 0, 0, 0); margin-right: 0px; margin-bottom: 1rem; margin-left: 1rem; padding: 0px; font-family: Arial, sans-serif; font-weight: bold; text-rendering: optimizelegibility; font-size: 1.1rem; line-height: 1.4;\">Details</h5><ul style=\"box-sizing: inherit; -webkit-tap-highlight-color: rgba(0, 0, 0, 0); margin-right: 0px; margin-left: 1.25rem; padding: 0px; list-style-position: outside; line-height: 1.6; list-style-type: square;\"><li style=\"box-sizing: inherit; -webkit-tap-highlight-color: rgba(0, 0, 0, 0); margin: 0px 0px 0px 1rem; padding: 0px; font-size: inherit;\"><p style=\"box-sizing: inherit; -webkit-tap-highlight-color: rgba(0, 0, 0, 0); margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; font-size: inherit; line-height: 1.6; text-rendering: optimizelegibility;\">Semi-Formal / Casual</p></li><li style=\"box-sizing: inherit; -webkit-tap-highlight-color: rgba(0, 0, 0, 0); margin: 0px 0px 0px 1rem; padding: 0px; font-size: inherit;\"><p style=\"box-sizing: inherit; -webkit-tap-highlight-color: rgba(0, 0, 0, 0); margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; font-size: inherit; line-height: 1.6; text-rendering: optimizelegibility;\">Contrast Collar &amp; 5cm Folded Cuffs</p></li><li style=\"box-sizing: inherit; -webkit-tap-highlight-color: rgba(0, 0, 0, 0); margin: 0px 0px 0px 1rem; padding: 0px; font-size: inherit;\"><p style=\"box-sizing: inherit; -webkit-tap-highlight-color: rgba(0, 0, 0, 0); margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; font-size: inherit; line-height: 1.6; text-rendering: optimizelegibility;\">Regular Fit</p></li><li style=\"box-sizing: inherit; -webkit-tap-highlight-color: rgba(0, 0, 0, 0); margin: 0px 0px 0px 1rem; padding: 0px; font-size: inherit;\"><p style=\"box-sizing: inherit; -webkit-tap-highlight-color: rgba(0, 0, 0, 0); margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; font-size: inherit; line-height: 1.6; text-rendering: optimizelegibility;\">ILLIYEEN Signature Buttons</p></li></ul></div><div class=\"cell small-12 medium-6 large-4 medium-offset-1\" style=\"box-sizing: inherit; -webkit-tap-highlight-color: rgba(0, 0, 0, 0); margin: 0px 0px 0px 112.859px; padding: 1rem; flex: 0 0 auto; min-height: 0px; min-width: 0px; width: 451.484px; color: rgb(10, 10, 10); font-family: Arial, sans-serif;\"><h5 style=\"box-sizing: inherit; -webkit-tap-highlight-color: rgba(0, 0, 0, 0); margin-right: 0px; margin-bottom: 1rem; margin-left: 1rem; padding: 0px; font-family: Arial, sans-serif; font-weight: bold; text-rendering: optimizelegibility; font-size: 1.1rem; line-height: 1.4;\">Material</h5><ul style=\"box-sizing: inherit; -webkit-tap-highlight-color: rgba(0, 0, 0, 0); margin-right: 0px; margin-left: 1.25rem; padding: 0px; list-style-position: outside; line-height: 1.6; list-style-type: square;\"><li style=\"box-sizing: inherit; -webkit-tap-highlight-color: rgba(0, 0, 0, 0); margin: 0px 0px 0px 1rem; padding: 0px; font-size: inherit;\"><p style=\"box-sizing: inherit; -webkit-tap-highlight-color: rgba(0, 0, 0, 0); margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; font-size: inherit; line-height: 1.6; text-rendering: optimizelegibility;\">100% Fine Cotton</p></li><li style=\"box-sizing: inherit; -webkit-tap-highlight-color: rgba(0, 0, 0, 0); margin: 0px 0px 0px 1rem; padding: 0px; font-size: inherit;\"><p style=\"box-sizing: inherit; -webkit-tap-highlight-color: rgba(0, 0, 0, 0); margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; font-size: inherit; line-height: 1.6; text-rendering: optimizelegibility;\">50s Herringbone Weaved</p></li><li style=\"box-sizing: inherit; -webkit-tap-highlight-color: rgba(0, 0, 0, 0); margin: 0px 0px 0px 1rem; padding: 0px; font-size: inherit;\"><p style=\"box-sizing: inherit; -webkit-tap-highlight-color: rgba(0, 0, 0, 0); margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; font-size: inherit; line-height: 1.6; text-rendering: optimizelegibility;\">130 GSM</p></li><li style=\"box-sizing: inherit; -webkit-tap-highlight-color: rgba(0, 0, 0, 0); margin: 0px 0px 0px 1rem; padding: 0px; font-size: inherit;\"><p style=\"box-sizing: inherit; -webkit-tap-highlight-color: rgba(0, 0, 0, 0); margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; font-size: inherit; line-height: 1.6; text-rendering: optimizelegibility;\">Fabric Finish : Liquid Ammonia + Easy Care</p></li></ul></div><div class=\"cell small-12 medium-5 large-5 large-offset-2\" style=\"box-sizing: inherit; -webkit-tap-highlight-color: rgba(0, 0, 0, 0); margin: 0px 0px 0px 225.75px; padding: 1rem; flex: 0 0 auto; min-height: 0px; min-width: 0px; width: 564.375px; color: rgb(10, 10, 10); font-family: Arial, sans-serif;\"><h5 style=\"box-sizing: inherit; -webkit-tap-highlight-color: rgba(0, 0, 0, 0); margin-right: 0px; margin-bottom: 1rem; margin-left: 1rem; padding: 0px; font-family: Arial, sans-serif; font-weight: bold; text-rendering: optimizelegibility; font-size: 1.1rem; line-height: 1.4;\">Care</h5><ul style=\"box-sizing: inherit; -webkit-tap-highlight-color: rgba(0, 0, 0, 0); margin-right: 0px; margin-left: 1.25rem; padding: 0px; list-style-position: outside; line-height: 1.6; list-style-type: square;\"><li style=\"box-sizing: inherit; -webkit-tap-highlight-color: rgba(0, 0, 0, 0); margin: 0px 0px 0px 1rem; padding: 0px; font-size: inherit;\"><p style=\"box-sizing: inherit; -webkit-tap-highlight-color: rgba(0, 0, 0, 0); margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; font-size: inherit; line-height: 1.6; text-rendering: optimizelegibility;\">Dry Clean Recommended</p></li><li style=\"box-sizing: inherit; -webkit-tap-highlight-color: rgba(0, 0, 0, 0); margin: 0px 0px 0px 1rem; padding: 0px; font-size: inherit;\"><p style=\"box-sizing: inherit; -webkit-tap-highlight-color: rgba(0, 0, 0, 0); margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; font-size: inherit; line-height: 1.6; text-rendering: optimizelegibility;\">Wash Separately With Cool Water</p></li><li style=\"box-sizing: inherit; -webkit-tap-highlight-color: rgba(0, 0, 0, 0); margin: 0px 0px 0px 1rem; padding: 0px; font-size: inherit;\"><p style=\"box-sizing: inherit; -webkit-tap-highlight-color: rgba(0, 0, 0, 0); margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; font-size: inherit; line-height: 1.6; text-rendering: optimizelegibility;\">Do Not Bleach</p></li><li style=\"box-sizing: inherit; -webkit-tap-highlight-color: rgba(0, 0, 0, 0); margin: 0px 0px 0px 1rem; padding: 0px; font-size: inherit;\"><p style=\"box-sizing: inherit; -webkit-tap-highlight-color: rgba(0, 0, 0, 0); margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; font-size: inherit; line-height: 1.6; text-rendering: optimizelegibility;\">Do Not Tumble Dry</p></li><li style=\"box-sizing: inherit; -webkit-tap-highlight-color: rgba(0, 0, 0, 0); margin: 0px 0px 0px 1rem; padding: 0px; font-size: inherit;\"><p style=\"box-sizing: inherit; -webkit-tap-highlight-color: rgba(0, 0, 0, 0); margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; font-size: inherit; line-height: 1.6; text-rendering: optimizelegibility;\">Iron Medium Heat</p></li><li style=\"box-sizing: inherit; -webkit-tap-highlight-color: rgba(0, 0, 0, 0); margin: 0px 0px 0px 1rem; padding: 0px; font-size: inherit;\"><p style=\"box-sizing: inherit; -webkit-tap-highlight-color: rgba(0, 0, 0, 0); margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; font-size: inherit; line-height: 1.6; text-rendering: optimizelegibility;\">Do Not Iron Over The Label</p></li></ul></div>', 'new-polo-shirt', 9, 999, 0, 0, NULL, 'percentage', '0', 1, '2019-09-15 02:39:38', '2021-08-22 05:10:54'),
(8, 22, 6, 'White Polo T-Shirt for Men', 'White Polo T-Shirt', '9029823', '3600', 'Red Polo T-Shirt for Men.\r\nSleeve Cotton T-shirt', 'red-polo-t-shirt-for-men-gents', 10, 250, 0, 125, 50, 'percentage', '0', 1, '2019-09-29 00:13:56', '2021-08-29 02:59:24'),
(9, 22, 6, 'Formal Check Shirt For Men', 'Formal Check Shirt', 'Formal Check Shirt', '12/02/2019', 'Formal Check Shirt \r\nCotton Shirt', 'formal-check-shirt-for-men-gents', 200, 450, 0, 400, NULL, 'percentage', '0', 1, '2019-09-29 00:15:22', '2019-09-29 00:15:22'),
(10, 22, 6, 'T-shirt Gray For Men', 'T-shirt Gray', 'T-shirt Gray', '12/02/2019', 'T-shirt Gray  For Men.\r\nCotton T-shirt.\r\nSweetable in any season', 't-shirt-gray-for-men-gents', 10, 300, 0, 350, 15, 'percentage', NULL, 1, '2019-09-29 00:17:30', '2019-09-29 00:17:30'),
(11, 22, 6, 'Men Sleeve Cotton Formal Shirt', 'Men Sleeve Cotton Formal Shirt', 'Men Sleeve Cotton Formal Shirt', 'Men Sleeve Cotton Formal Shirt', 'Men Sleeve Cotton Formal Shirt\r\nCotton Shirt', 'men-sleeve-cotton-formal-shirt-gents', 200, 800, 0, 900, 40, 'percentage', NULL, 1, '2019-09-29 00:20:32', '2019-09-29 00:20:32'),
(12, 22, 6, 'Polo Shirt -Any Color for Men', 'Polo Shirt -Any Color for Men', 'Polo Shirt -Any Color for Men', '12/02/2019', 'Polo Shirt -Any Color for Men', 'polo-shirt-any-color-for-men', 20, 560, 0, 590, 50, 'percentage', NULL, 1, '2019-09-29 00:22:00', '2019-09-29 00:22:00'),
(13, 23, 8, 'Pink and Blue Mix Sharee for Women', 'Pink and Blue Mix Sharee for Women', 'Pink and Blue Mix Sharee for Women', '12/02/2019', 'Pink and Blue Mix Sharee for Women', 'pink-and-blue-mix-sharee-for-women', 10, 1600, 0, 1900, NULL, 'percentage', '0', 1, '2019-09-29 00:31:04', '2019-09-29 00:31:04'),
(14, 23, 8, 'Blue Party Sharee', 'Blue Party Sharee', 'Blue Party Sharee', '12/02/2019', 'Blue Party Sharee', 'blue-party-sharee', 10, 2500, 0, 3000, 50, 'percentage', NULL, 1, '2019-09-29 00:32:08', '2019-09-29 00:32:08'),
(15, 23, 8, 'Office Sharee For Women - formal', 'Office Sharee For Women - formal', 'Office Sharee For Women - formal', '12/02/2019', 'Office Sharee For Women - formal', 'office-sharee-for-women-formal', 20, 1200, 0, 1500, NULL, 'percentage', '0', 1, '2019-09-29 00:32:49', '2019-09-29 00:32:49'),
(16, 23, 8, 'Party Saluar Kamee for women/girls', 'Party Saluar Kamee for women/girls', 'Party Saluar Kamee for women/girls', '12/02/2019', 'Party Saluar Kamee for women/girls', 'party-saluar-kamee-for-womengirls', 2, 5000, 0, 5500, NULL, 'percentage', NULL, 1, '2019-09-29 00:36:14', '2019-09-29 00:36:14'),
(17, 23, 8, 'Sleeve Cotton Saluar Kameez', 'Sleeve Cotton Saluar Kameez', 'Sleeve Cotton Saluar Kameez', '12/02/2019', 'Sleeve Cotton Saluar Kameez', 'sleeve-cotton-saluar-kameez', 5, 2900, 0, 3000, NULL, 'percentage', NULL, 1, '2019-09-29 00:37:01', '2019-09-29 00:37:01'),
(18, 23, 8, 'Green Color Multi Design Saluar Kameez', 'Green Color Multi Design Saluar Kameez', 'Green Color Multi Design Saluar Kameez', '12/02/2019', 'Green Color Multi Design Saluar Kameez', 'green-color-multi-design-saluar-kameez', 10, 3000, 0, 4000, 50, 'percentage', NULL, 1, '2019-09-29 00:37:52', '2019-09-29 00:37:52'),
(19, 23, 8, 'Silk Saluar Kameez for women', 'Silk Saluar Kameez for women', 'Silk Saluar Kameez for women', '3600', 'Silk Saluar Kameez for women', 'silk-saluar-kameez-for-women', 2, 2900, 0, 0, NULL, 'percentage', NULL, 1, '2019-09-29 00:39:20', '2021-08-29 02:34:17'),
(20, 1, 3, 'Samsung J7 Promo', 'Samsung J7 Promo', 'Samsung J7 Promo', '12/02/2019', 'Samsung J7 Promo', 'samsung-j7-promo', 200, 12000, 0, 13000, NULL, 'percentage', NULL, 1, '2019-09-29 00:40:56', '2019-09-29 00:41:12'),
(22, 23, 4, 'Fashionable Ladies Bag', 'Fashionable Ladies Bag', 'Fashionable Ladies Bag', '3600', 'Fashionable Ladies Bag', 'fashionable-ladies-bag-women', 100, 3500, 0, 3150, 50, 'percentage', '1', 1, '2021-08-02 22:05:16', '2021-08-02 22:05:16'),
(23, 22, 8, 'Premium Panjabi - 210020', 'Panjabi - 210020', 'Panji-210020', '3600', '<div class=\"row\">\r\n   <div class=\"col-sm-6 col-md-6 col-lg-6\">\r\n      <h5>Details </h5>\r\n      <p>Details about product</p><p><br></p></div></div>\r\n\r\n<p><b>Description</b>\r\n</p><p>The Premium Collection is an exclusive selection of elegant, superior quality designs.</p><p><br></p><p>\r\n</p><p><b>\r\n\r\n\r\nDetails</b>\r\n</p><ul><li>\r\nSemi-Formal/Casual\r\n\r\nRegular Fit</li><li>\r\n\r\nILLIYEEN Signature Buttons\r\n\r\n\r\n\r\nMaterial\r\n</li><li>100% Fine Cotton\r\n\r\nCombed </li><li>Compact 60s\r\n\r\nDigital Print\r\n</li><li>\r\nFabric Finish : Liquid Ammonia</li></ul>', 'premium-panjabi-210020', 100, 3450, 0, 0, NULL, 'percentage', '0', 1, '2021-08-26 04:44:12', '2021-08-28 05:04:35');

-- --------------------------------------------------------

--
-- Table structure for table `product_images`
--

CREATE TABLE `product_images` (
  `id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_images`
--

INSERT INTO `product_images` (`id`, `product_id`, `image`, `created_at`, `updated_at`) VALUES
(125, 2, '15674145311.jpg', '2019-09-01 14:55:31', '2019-09-01 14:55:31'),
(126, 2, '15674145312.jpg', '2019-09-01 14:55:31', '2019-09-01 14:55:31'),
(127, 2, '15674145313.jpg', '2019-09-01 14:55:31', '2019-09-01 14:55:31'),
(128, 3, '15674309851.jpg', '2019-09-01 19:29:45', '2019-09-01 19:29:45'),
(129, 3, '15674309852.jpg', '2019-09-01 19:29:45', '2019-09-01 19:29:45'),
(130, 3, '15674309853.jpg', '2019-09-01 19:29:45', '2019-09-01 19:29:45'),
(131, 3, '15674309854.jpg', '2019-09-01 19:29:45', '2019-09-01 19:29:45'),
(132, 3, '15674309855.jpg', '2019-09-01 19:29:45', '2019-09-01 19:29:45'),
(133, 3, '15674309856.jpg', '2019-09-01 19:29:45', '2019-09-01 19:29:45'),
(140, 6, '15685798571.jpg', '2019-09-15 02:37:37', '2019-09-15 02:37:37'),
(141, 6, '15685798572.jpg', '2019-09-15 02:37:37', '2019-09-15 02:37:37'),
(142, 6, '15685798573.jpeg', '2019-09-15 02:37:37', '2019-09-15 02:37:37'),
(143, 7, '15685799781.jpeg', '2019-09-15 02:39:38', '2019-09-15 02:39:38'),
(144, 7, '15685799782.jpeg', '2019-09-15 02:39:39', '2019-09-15 02:39:39'),
(145, 7, '15685799793.jpeg', '2019-09-15 02:39:39', '2019-09-15 02:39:39'),
(146, 7, '15685799794.jpeg', '2019-09-15 02:39:39', '2019-09-15 02:39:39'),
(149, 9, '15697809221.png', '2019-09-29 00:15:22', '2019-09-29 00:15:22'),
(150, 9, '15697809222.jpg', '2019-09-29 00:15:22', '2019-09-29 00:15:22'),
(151, 10, '15697810501.webp', '2019-09-29 00:17:30', '2019-09-29 00:17:30'),
(152, 10, '15697810502.png', '2019-09-29 00:17:31', '2019-09-29 00:17:31'),
(153, 11, '15697812321.png', '2019-09-29 00:20:32', '2019-09-29 00:20:32'),
(154, 11, '15697812322.png', '2019-09-29 00:20:32', '2019-09-29 00:20:32'),
(155, 12, '15697813201.png', '2019-09-29 00:22:00', '2019-09-29 00:22:00'),
(156, 12, '15697813202.png', '2019-09-29 00:22:00', '2019-09-29 00:22:00'),
(157, 13, '15697818641.jpg', '2019-09-29 00:31:04', '2019-09-29 00:31:04'),
(158, 13, '15697818642.jpg', '2019-09-29 00:31:04', '2019-09-29 00:31:04'),
(159, 14, '15697819281.webp', '2019-09-29 00:32:08', '2019-09-29 00:32:08'),
(160, 14, '15697819282.jpg', '2019-09-29 00:32:08', '2019-09-29 00:32:08'),
(161, 15, '15697819691.jpg', '2019-09-29 00:32:49', '2019-09-29 00:32:49'),
(162, 15, '15697819692.jpg', '2019-09-29 00:32:49', '2019-09-29 00:32:49'),
(163, 16, '15697821741.jpg', '2019-09-29 00:36:14', '2019-09-29 00:36:14'),
(164, 16, '15697821742.webp', '2019-09-29 00:36:15', '2019-09-29 00:36:15'),
(165, 17, '15697822211.jpg', '2019-09-29 00:37:01', '2019-09-29 00:37:01'),
(166, 17, '15697822212.jpg', '2019-09-29 00:37:01', '2019-09-29 00:37:01'),
(167, 18, '15697822721.jpg', '2019-09-29 00:37:52', '2019-09-29 00:37:52'),
(168, 18, '15697822722.jpg', '2019-09-29 00:37:52', '2019-09-29 00:37:52'),
(172, 20, '15697824562.jpg', '2019-09-29 00:40:56', '2019-09-29 00:40:56'),
(174, 22, '16280067161.png', '2021-08-02 22:05:17', '2021-08-02 22:05:17'),
(175, 23, '16299962521.webp', '2021-08-26 04:44:12', '2021-08-26 04:44:12'),
(176, 23, '16299962522.webp', '2021-08-26 04:44:13', '2021-08-26 04:44:13'),
(187, 19, '16302490711.webp', '2021-08-29 02:57:51', '2021-08-29 02:57:51'),
(188, 8, '16302491641.webp', '2021-08-29 02:59:24', '2021-08-29 02:59:24'),
(189, 8, '16302491652.webp', '2021-08-29 02:59:25', '2021-08-29 02:59:25');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `point` double(8,2) NOT NULL,
  `is_approved` tinyint(1) NOT NULL DEFAULT 0 COMMENT '0 => unapproved, 1 => approved',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `product_id`, `user_id`, `title`, `description`, `point`, `is_approved`, `created_at`, `updated_at`) VALUES
(1, 3, 19, 'Nice Software', 'sdsdsd', 4.00, 1, '2019-09-05 23:15:41', '2021-08-07 22:31:31');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(10) UNSIGNED NOT NULL,
  `website_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `website_logo` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `favicon` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `website_footer_text` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_cost` double(8,2) UNSIGNED NOT NULL DEFAULT 50.00,
  `notice` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `info` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `website_name`, `website_logo`, `favicon`, `website_footer_text`, `email`, `phone`, `address`, `shipping_cost`, `notice`, `info`, `created_at`, `updated_at`) VALUES
(1, 'The KINGSMAN', '1630002646.png', '1630085087.png', '@copy 2021 all rights reserved', 'info@kingsman.com', '01951233084', 'Dhaka', 50.00, NULL, '{\"order\":{\"shipping_cost\":\"50\"},\"currency\":{\"currency_code\":\"BDT\",\"currency_symbol\":\"\\u09f3\",\"activeCurrency\":{\"decimal\":\"2\",\"decimal_separator\":\".\",\"thousands_separator\":\",\"}},\"social\":{\"facebook\":\"https:\\/\\/facebook.com\\/website\",\"twitter\":\"https:\\/\\/twitter.com\\/website\",\"instagram\":\"https:\\/\\/instagram.com\\/website\",\"linkedin\":\"https:\\/\\/linkedin.com\\/website\",\"pinterest\":\"https:\\/\\/pinterest.com\\/website\",\"youtube\":\"https:\\/\\/youtube.com\\/website\"},\"theme\":{\"base_theme\":\"light\",\"slider\":{\"single_slider\":\"false\",\"enable_two_buttons\":\"true\"},\"header_menu\":{\"enable_all_category\":\"false\",\"enable_single_category\":\"true\"},\"color\":{\"cartbtn\":\"#000000\",\"footer\":\"#000000\"}},\"product\":{\"product_detail\":\"Sample Product Details\"}}', '2021-08-08 11:19:04', '2021-08-29 00:27:31');

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

CREATE TABLE `sliders` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `button_text` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `button_link` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `button_text2` varchar(252) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `button_link2` varchar(252) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `priority` tinyint(3) UNSIGNED NOT NULL DEFAULT 10,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sliders`
--

INSERT INTO `sliders` (`id`, `title`, `description`, `image`, `button_text`, `button_link`, `button_text2`, `button_link2`, `status`, `priority`, `created_at`, `updated_at`) VALUES
(9, 'Denim Icons and Tees', '<p><b>The uniform. Forever jeans </b></p><p><b>and breathable t-shirt.</b></p>', '1628351092.jpeg', 'Shop Women\'s', 'products/category/womens', 'Shop Men\'s', 'products/category/mens', 1, 10, '2021-08-06 12:14:19', '2021-08-06 21:44:54');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `first_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `username` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_no` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `street_address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `division_id` int(10) UNSIGNED NOT NULL COMMENT 'Division Table ID',
  `district_id` int(10) UNSIGNED NOT NULL COMMENT 'District Table ID',
  `status` tinyint(3) UNSIGNED NOT NULL DEFAULT 0 COMMENT '0=Inactive|1=Active|2=Ban',
  `ip_address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `avatar` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `shipping_address` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `api_token` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `username`, `phone_no`, `email`, `password`, `street_address`, `division_id`, `district_id`, `status`, `ip_address`, `avatar`, `shipping_address`, `api_token`, `remember_token`, `created_at`, `updated_at`) VALUES
(19, 'Maniruzzaman', 'Akash', 'maniruzzamanakash', '1951233084', 'manirujjamanakash@gmail.com', '$2y$10$19CCRRhzE0UyV1JxxhS5pu8pRpUn9dZxECOKEScdSh/UQonqL/nqm', 'Patuakhali, Bangladesh', 2, 5, 1, '::1', NULL, NULL, 'c17a8a79ba06864b34fd4101130f72439075da332ba8cad432dca0dc969e', 'lhgYkvRFGTUnSc6s108n9LDmfzyKXE6DElxVRp1LnRcqP1bZPM6PHLLXfbTs', '2019-04-26 00:41:48', '2019-04-26 00:42:52'),
(20, 'Arman', 'ahmed', 'armaanahmed', '01759128544', 'shanewaz12@gmail.com', '$2y$10$hQPpX23JnL0FA.4e0bYiEeLREFZe7uEEaLruY6xiwzXnqoYIXs/XO', 'oldtown,dhaka 1100', 2, 7, 1, '::1', NULL, NULL, 'cb79aa60064846b9ff23b5a53a69372d4c9670a97f590b8b983c53686709', 'Gsq5TJDYiYDInJly2QYLNaWCLKvkylIR1cilQVk28FXXH7aeB9TDMM1klh4u', '2019-05-03 09:56:34', '2019-09-02 19:51:16'),
(29, 'Admin', 'company', 'armaanahmed1', '01986895415', 'shahnewaz926@gmail.com', '$2y$10$.HortIReKQ/NnZhrXzaN7uqZ5cVtaj0mCw.RIREizrbIS6/bQaB.u', '60/2 old town dhaka', 2, 5, 1, '::1', NULL, NULL, '4f3087ca49f9af0b6752de95c09a470cd1539ec8a8c602057c73cccde5c9', 'OjwW9UMnmnCKNlS4xXdc56j1Q75msRg3zS6djR6SKWvsMAA0e5amxwkNTJOF', '2019-08-24 14:35:19', '2019-08-29 11:13:23'),
(30, 'Shahidur Rahman', 'Ansari', 'shahidurrahmanansari', '01934367189', 'rubel@gmail.com', '$2y$10$r1c5JzBsm0z3X.9pbCEZjurrqIulaFqgKnZaoCLm3Zgbn6YAn.znC', '60/2 old town dhaka', 2, 5, 1, '::1', NULL, NULL, 'b66373e472f79ff682cb817b61d9c272739a6e1565dfaa8de0de8f473ff6', NULL, '2019-08-31 22:53:21', '2019-08-31 22:53:49'),
(31, 'Faiyaz', 'ansari', 'faiyazansari', '01986895413', 'maccaf.team@gmail.com', '$2y$10$jJlfwThsxK1R3t/O1zFajOPSqtYXJiYGPnC0q87J0aeGygZEswFrC', 'old town', 5, 7, 0, '103.138.213.110', NULL, NULL, '8bc00eafc4a2a21f4add3a808c7402edee96855a26f91cd11ebe4a3dca34', '6N9Xgo6jO46jDyN6udZNH5Fow50X1pANAmB0ZHhBivbhamX8VV', '2019-12-31 12:29:43', '2019-12-31 12:29:43'),
(32, 'Maniruzzaman', 'Akash', 'maniruzzamanakash1', '01951233084', 'm.akash.cse@gmail.com', '$2y$10$AfM6.ULrLfm20ohjvLrMQObfjZoTSuOhFQfXmO0lmXL67nWf/D3TW', 'Mohakhali', 2, 5, 1, '::1', NULL, NULL, 'e546835a66d927d865c087a478cc2f4e5e0bb0d87a774cc461f6b59790e0', 'pUaEVMmHbGU0nlcAQNL69Gw1JbpQ77z5zyJsFEb2vfbGUknyp2Hpn3vp2M1P', '2021-08-03 01:39:41', '2021-08-03 01:39:41');

-- --------------------------------------------------------

--
-- Table structure for table `wishlists`
--

CREATE TABLE `wishlists` (
  `id` int(10) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `wishlists`
--

INSERT INTO `wishlists` (`id`, `product_id`, `user_id`, `created_at`, `updated_at`) VALUES
(2, 3, 19, '2019-09-14 22:10:05', '2019-09-14 22:10:05'),
(3, 7, 19, '2019-09-15 02:40:05', '2019-09-15 02:40:05'),
(4, 6, 19, '2019-09-15 02:40:07', '2019-09-15 02:40:07'),
(5, 15, 19, '2019-10-23 22:57:52', '2019-10-23 22:57:52');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `slug` (`slug`);

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `carts_user_id_foreign` (`user_id`),
  ADD KEY `carts_product_id_foreign` (`product_id`),
  ADD KEY `carts_order_id_foreign` (`order_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categories_slug_unique` (`slug`);

--
-- Indexes for table `coupons`
--
ALTER TABLE `coupons`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `coupons_code_unique` (`code`);

--
-- Indexes for table `districts`
--
ALTER TABLE `districts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `divisions`
--
ALTER TABLE `divisions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_user_id_foreign` (`user_id`),
  ADD KEY `orders_payment_id_foreign` (`payment_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `payments_short_name_unique` (`short_name`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_images`
--
ALTER TABLE `product_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`),
  ADD KEY `reviews_product_id_foreign` (`product_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_username_unique` (`username`),
  ADD UNIQUE KEY `users_phone_no_unique` (`phone_no`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `wishlists`
--
ALTER TABLE `wishlists`
  ADD PRIMARY KEY (`id`),
  ADD KEY `wishlists_user_id_foreign` (`user_id`),
  ADD KEY `wishlists_product_id_foreign` (`product_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `coupons`
--
ALTER TABLE `coupons`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `districts`
--
ALTER TABLE `districts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `divisions`
--
ALTER TABLE `divisions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `product_images`
--
ALTER TABLE `product_images`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=190;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `wishlists`
--
ALTER TABLE `wishlists`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `carts`
--
ALTER TABLE `carts`
  ADD CONSTRAINT `carts_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `carts_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `carts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_payment_id_foreign` FOREIGN KEY (`payment_id`) REFERENCES `payments` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `reviews_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `reviews_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `wishlists`
--
ALTER TABLE `wishlists`
  ADD CONSTRAINT `wishlists_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `wishlists_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
