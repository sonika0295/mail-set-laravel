-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 16, 2024 at 07:46 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mail-set-laravel`
--

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(200) DEFAULT NULL,
  `status` enum('0','1','','') NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Books', '1', '2024-04-10 05:38:17', '2024-04-10 05:38:17', '2024-04-10 05:38:17'),
(2, 'Electronics', '1', '2024-04-10 05:38:17', '2024-04-10 05:56:28', '2024-04-10 05:38:17'),
(3, 'Clothing', '1', '2024-04-10 05:38:17', '2024-04-10 05:38:17', '2024-04-10 05:38:17'),
(4, 'Furniture', '1', '2024-04-10 05:38:17', '2024-04-10 05:58:35', '2024-04-10 05:38:17'),
(5, 'Other', '1', '2024-04-10 05:38:17', '2024-04-10 05:38:17', '2024-04-10 05:38:17');

-- --------------------------------------------------------

--
-- Table structure for table `ch_favorites`
--

CREATE TABLE `ch_favorites` (
  `id` char(36) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `favorite_id` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ch_messages`
--

CREATE TABLE `ch_messages` (
  `id` char(36) NOT NULL,
  `from_id` bigint(20) NOT NULL,
  `to_id` bigint(20) NOT NULL,
  `body` varchar(5000) DEFAULT NULL,
  `attachment` varchar(255) DEFAULT NULL,
  `seen` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ch_messages`
--

INSERT INTO `ch_messages` (`id`, `from_id`, `to_id`, `body`, `attachment`, `seen`, `created_at`, `updated_at`) VALUES
('2dd99666-7904-49c7-a986-fc44e701072e', 28, 32, 'gret', NULL, 1, '2024-04-11 03:00:14', '2024-04-11 03:00:27'),
('3e57e19a-1480-4369-a96a-68719ec44d2a', 32, 32, 'Say &#039;hi&#039; and start messaging', NULL, 1, '2024-04-13 07:36:11', '2024-04-13 07:36:18'),
('55d3fd3a-3786-4fdd-a9b3-5952d6979908', 32, 28, '', '{\"new_name\":\"38bf50b7-a315-467d-a55f-08a85941c2ec.jpg\",\"old_name\":\"house.jpg\"}', 1, '2024-04-11 02:59:14', '2024-04-11 03:00:04'),
('5c6d4ba8-7da0-46ca-a34a-d8ceb5efd395', 28, 24, 'hye', NULL, 0, '2024-04-11 02:25:18', '2024-04-11 02:25:18'),
('7b52bf38-bf9a-4bee-988e-d894e100e9e9', 32, 29, 'hi ritu', NULL, 1, '2024-04-11 04:19:39', '2024-04-11 04:19:45'),
('7fc9d09d-09fe-46f7-8bae-dcc4f11a6118', 32, 28, 'hi soniya', NULL, 1, '2024-04-11 02:24:02', '2024-04-11 02:24:15'),
('b200059f-b6d5-4e03-a435-4921017492ce', 32, 32, 'hi', NULL, 0, '2024-04-13 11:42:33', '2024-04-13 11:42:33'),
('bccad879-68ca-405c-87cc-8bedee131110', 29, 32, 'i am fine', NULL, 1, '2024-04-11 04:19:49', '2024-04-11 04:19:52'),
('bdb6b033-eadc-4bb2-afb9-9054dd860510', 29, 32, 'hi sonika', NULL, 1, '2024-04-11 04:18:23', '2024-04-11 04:19:34'),
('cd925d72-086d-4371-bfe8-7975e2319a78', 28, 32, 'hi tester\r\nthis side sonika', NULL, 1, '2024-04-11 02:24:26', '2024-04-11 02:24:31'),
('d5382b8f-33f6-48c0-bc60-b7cdb0b686f3', 32, 31, 'sdfsdf', NULL, 0, '2024-04-13 11:39:57', '2024-04-13 11:39:57'),
('fd0d30de-e14d-481b-a1d8-f28637659cf2', 32, 29, 'how are you', NULL, 1, '2024-04-11 04:19:42', '2024-04-11 04:19:45');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `category` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `price` decimal(10,2) NOT NULL,
  `image` varchar(200) DEFAULT NULL,
  `status` enum('0','1','','') NOT NULL DEFAULT '1',
  `slug` varchar(200) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `deleted_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`id`, `user_id`, `category`, `name`, `description`, `price`, `image`, `status`, `slug`, `created_at`, `updated_at`, `deleted_at`) VALUES
(8, 32, '5', 'IFB 25 L Solo Microwave Oven (25PM2S, IFBJ0, Silver)', '25L Capacity: Suitable for families with 5 to 6 members\r\nSolo: Can be used for Reheating, Melting and Cooking\r\nIFB offer a super warranty 1 year on Microwave Oven & 3 years on magnetron & cavity\r\nIncluded in the Box : Microwave Oven, Unit Glass Turntable, Wire Rack, Quick Guide Label, Warranty Card', 7290.00, '/storage/items/1712761966_819s6STd6pL._SX679_.jpg', '1', 'ifb-25-l-solo-microwave-oven-25pm2s-ifbj0-silver', '2024-04-10 09:42:46', '2024-04-11 08:22:12', '2024-04-10 15:12:46'),
(9, 32, '2', 'Samsung 7 kg Fully-Automatic Top Loading Washing Machine (WA70A4002GS/TL, Imperial Silver, Awarded as Washing Machine Brand of the year )', 'ully-automatic top load washing machine: Affordable with great wash quality Easy to use\r\nCapacity 7 kg: Suitable for 3 – 4 members\r\nEnergy Star rating : 3 Star- energy efficiency\r\nManufacturer Warranty:2 year comprehensive warranty on the product\r\nMotor: 680 RPM: Higher spin speeds helps in faster washing and drying With its high speed and efficiency it\'s perfect for busy households and those who want to get laundry done quickly and effectively\r\nWash Programs: 4 Wash Programs – Normal Quick Wash Soak+Normal Delicates Eco Tub Clean Energy Saving\r\nDrum type : Diamond Drum| Pulsator : Center Jet| Drum Material : Stainless Steel', 16190.00, '/storage/items/1712762056_510mV2GAtkL._SY879_.jpg', '1', 'samsung-7-kg-fully-automatic-top-loading-washing-machine-wa70a4002gstl-imperial-silver-awarded-as-washing-machine-brand-of-the-year', '2024-04-10 09:44:16', '2024-04-11 08:22:12', '2024-04-10 15:14:16'),
(10, 32, '2', 'NIBOSI Women Watches Fashion Analogue Watches for Women Ladies Watches with Leather Strap Waterproof Women Wrist Watches Birthday Gift', 'About this project: NIBOSI has always been inspired by Indian creativity and ingenuity. We\'ve been working to bring new life to the industry by making quality fashion watches and accessories that are fun and easy to', 799.00, '/storage/items/1712762158_61erqqkm3wL._SX679_.jpg', '1', 'nibosi-women-watches-fashion-analogue-watches-for-women-ladies-watches-with-leather-strap-waterproof-women-wrist-watches-birthday-gift', '2024-04-10 09:45:58', '2024-04-11 08:22:12', '2024-04-10 15:15:58'),
(11, 32, '2', 'Fossil Carlie Gold Quartz Stainless Steel Watch ES5329', '28mm case, 12mm band width, mineral crystal, Quartz movement with 3-hand analog display, imported.\r\nRound stainless steel case, with a silver dial.\r\nGold, stainless steel bracelet.\r\nWater resistant up to 50m: Wearable while swimming in shallow water.\r\nWarranty type:Manufacturer; 2 Years Warranty', 11995.00, '/storage/items/1712762228_61Anu6oK0aL._SX679_.jpg', '1', 'fossil-carlie-gold-quartz-stainless-steel-watch-es5329', '2024-04-10 09:47:08', '2024-04-11 08:22:12', '2024-04-10 15:17:08'),
(12, 32, '1', 'Don\'t Believe Everything You Think (English) Paperback – 25', 'Discover how to conquer anxiety, self-doubt, and self-sabotage without depending on motivation or willpower. \'Don\'t Believe Everything You Think\' uncovers the core of psychological suffering and offers insights to effortlessly shape the life you crave. Learn to detach from negativity, embrace love and joy, escape negative thought cycles, and tap into inner wisdom. The message is clear: anyone can attain peace, love, and fulfillment, irrespective of their history. It\'s not about rewiring your brain, but expanding your consciousness for lasting transformation. Within this book, delve into the core of emotional suffering and receive insights on effortlessly curating the life you aspire to.', 169.00, '/storage/items/1712762313_715qi-cIbML._SY466_.png', '1', 'dont-believe-everything-you-think-english-paperback-25', '2024-04-10 09:48:33', '2024-04-11 08:22:12', '2024-04-10 15:18:33'),
(13, 32, '1', 'Addition and Subtraction Activity Book For Children - 80+ Activities Inside [Paperback] Wonder House Books Paperback – Import, 30 July 2022', 'This Addition and Subtraction Activity Book is a means to give young mathematicians ample practice to improve their skills in mathematics. The level of difficulty of the two concepts is gradually increased through fun activities. Reinforcement of both these concepts is done in simple and two-digit addition and subtraction and in problem solving too. Pleasing illustrations will keep the young minds occupied as they sharpen their critical and reasoning skills in a delightful manner and put them to use in daily life.', 109.00, '/storage/items/1712762313_715qi-cIbML._SY466_.jpeg', '1', 'addition-and-subtraction-activity-book-for-children-80-activities-inside-paperback-wonder-house-books-paperback-import-30-july-2022', '2024-04-10 09:49:38', '2024-04-11 08:22:12', '2024-04-10 15:19:38'),
(14, 32, '4', 'UW UrbanWood Sheesham Wood 5 Seater Sofa Set for Living Room Home Office Solid Wooden 3+1+1 Seater Sofa Set Furniture (Walnut Finish with Beige Cushion)', 'Wooden 5 Seater Sofa Set Dimension: 3 Seater Sofa- Length (70 inch), Width (28 inch), Height (32 inch); 1 Seater Sofa- Length (28 inch), Width (28 inch), Height (32 inch)\r\nMaterial: Sheesham Wood; Colour: Walnut Finish with Beige Cushion ; Style: Modern; (Center table and pillows not included)\r\nSpacious Seating: This 5-seater sofa set includes a three-seater sofa, along with two single-seater sofas, providing ample seating space for family and guests in the living room, home office, or any other area.\r\nVersatile Use: Sheesham Wood Furniture, Solid Wood Furniture, Furniture for Living Room, Solid Wood Sofa Set, is perfect for the living room, home office, or any other communal area, this sofa set provides comfortable seating for family gatherings, entertaining guests, or simply lounging.\r\nThis wooden sofa requires basic self assembly at customers end and comes with self assembly (DIY) instructions along with necessary accessories', 28421.00, '/storage/items/1712762466_81pkoJQrHLL._AC_CR0,0,0,0_SX615_SY462_.jpg', '1', 'uw-urbanwood-sheesham-wood-5-seater-sofa-set-for-living-room-home-office-solid-wooden-311-seater-sofa-set-furniture-walnut-finish-with-beige-cushion', '2024-04-10 09:51:06', '2024-04-11 08:22:12', '2024-04-10 15:21:06'),
(15, 32, '4', 'Douceur Furnitures Solid Sheesham Wood Five 5 Seater Sofa Set for Living Room/Guest Room/Office/Hotels & Cafe || Finish:-Natural Teak ||', '★ Douceur Furniture Direct Factory product to your home\r\n★ Product Dimension : Three Seater 75 in X 29 in X 35 In Diameter, One Seater 31 in X 29 in X 35 in Diameter , Load Capacity- 300\r\n★ Seating Capacity: 5 Seater | Finish Color: Natural Finish, Upholstery Color - Grey , Style: Modern\r\n★ Primary Material: Sheesham Wood | Secondary Material: MDF (Is Only Applicable For Those Products Which Have Drawers) | Product Name: Wooden Five Seater Sofa Set For Living Room & Office.\r\n★ Assembly Or Installation Is Based On DIY (Do It Yourself) Basis\r\n★ Three Layer Of Coating Which Protect Wood From Termites\r\n★ Package Includes : 3 + 1 + 1 Sofa Set With Cushions , Screw And Assembly Instructions', 28999.00, '/storage/items/1712762549_81UwCYx6hCL._SX679_.jpg', '1', 'douceur-furnitures-solid-sheesham-wood-five-5-seater-sofa-set-for-living-roomguest-roomofficehotels-cafe-finish-natural-teak', '2024-04-10 09:52:29', '2024-04-11 08:22:12', '2024-04-10 15:22:29'),
(16, 32, '3', 'Genric Women Cotton Un-Stitched Dress Material', 'Very good quality cotton material. The dupatta bleeds a little colour on washing, so be careful. The colour combination of the suit is a bit unusual so I liked it. The dupatta itself is long enough to be converted into a separate kurta, if desired. The material is exceptionally soft and the final look with piping design (by a good tailor) is very beautiful for office wear.', 2699.00, '/storage/items/1712762668_81CfTkqk9BL._SY250_.jpg', '0', 'genric-women-cotton-un-stitched-dress-material', '2024-04-10 09:54:28', '2024-04-13 11:17:45', '2024-04-10 15:24:28'),
(17, 31, '3', 'DURGA HANDLOOMS Dhakai Jamdani Unstitched Silk Suit with Dupatta', 'Weave Type: Unstitched Handloom Silk Suit Piece\r\nMaterial: Handlooms Silk (Soft)\r\nIncludes: Unstiched Kurti and Dupatta', 949.00, '/storage/items/1712762728_810MG4V59uL._SY741_.jpg', '1', 'durga-handlooms-dhakai-jamdani-unstitched-silk-suit-with-dupatta', '2024-04-10 09:55:28', '2024-04-13 11:17:29', '2024-04-10 15:25:28'),
(18, 28, '4', 'house', 'wrwer', 1254.00, '/storage/items/1712824020_house.jpg', '1', 'house', '2024-04-11 02:57:01', '2024-04-11 02:57:01', '2024-04-11 08:27:01');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2024_04_11_999999_add_active_status_to_users', 2),
(5, '2024_04_11_999999_add_avatar_to_users', 2),
(6, '2024_04_11_999999_add_dark_mode_to_users', 2),
(7, '2024_04_11_999999_add_messenger_color_to_users', 2),
(8, '2024_04_11_999999_create_chatify_favorites_table', 2),
(9, '2024_04_11_999999_create_chatify_messages_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `requests`
--

CREATE TABLE `requests` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `image` mediumblob DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('Iu0MuoOuSkHibzlQR0Mzxjb9y1OdwcIxRZ4oFcAT', 32, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/123.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiMGcwY2RpQ1kxaVFyS2lzNENPWFZlYjd6c2ZqMEtIeUxsUjFoTWtQdSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDg6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9mcm9udC9qcy9wb3BwZXIubWluLmpzLm1hcCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6MzoidXJsIjthOjA6e31zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aTozMjt9', 1713028498),
('mDkOJc2gBuC7JktatL6WBdO1TKposKw1Y1dF3ELD', 32, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/123.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiTTFXU3E5UzY4c2ZqT3F1NFRGb0RGb1ROaENaZkRuUVN3WTUyVU5PYSI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czozOiJ1cmwiO2E6MDp7fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjMxOiJodHRwOi8vMTI3LjAuMC4xOjgwMDAvanMvYXBwLmpzIjt9czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MzI7fQ==', 1713021040),
('z3OXs8fBY0FEa9QaFWVoZD4GZQdGuTQD9guPg875', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/123.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiaVBtSlpabVFpYzZvendUMURWelZkZmZ0cTEyRzdOOXRteUdQeGNXSCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDg6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9mcm9udC9qcy9wb3BwZXIubWluLmpzLm1hcCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1713027147);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `phone_number` varchar(200) DEFAULT NULL,
  `address` varchar(200) DEFAULT NULL,
  `card_information` varchar(200) DEFAULT NULL,
  `verification_code` varchar(200) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `active_status` tinyint(1) NOT NULL DEFAULT 0,
  `avatar` varchar(255) NOT NULL DEFAULT 'avatar.png',
  `dark_mode` tinyint(1) NOT NULL DEFAULT 0,
  `messenger_color` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `phone_number`, `address`, `card_information`, `verification_code`, `created_at`, `updated_at`, `active_status`, `avatar`, `dark_mode`, `messenger_color`) VALUES
(24, 'Anjali', 'anjali@monmouth.edu', '2024-04-06 10:35:32', '$2y$12$9UVabjGQPfC1wMClJ4..kuQNIZp6waPCj66uef/j7LVyfKdwlXecu', NULL, '2123', 'ertertert', '21548787541212', '8751', '2024-04-06 10:35:05', '2024-04-06 10:35:32', 0, 'avatar.png', 0, NULL),
(25, 'Kajal', 'kajal@monmouth.edu', '2024-04-09 10:28:34', '$2y$12$yEojmlKULvu3.lFVKfSmpuOfDKOoY8PnOGWEEmYOde8SavhBIGQ2S', NULL, '324524234', 'sdf', '34534534545', '8578', '2024-04-09 10:19:39', '2024-04-09 10:28:34', 0, 'avatar.png', 0, NULL),
(26, 'Leena', 'leena@monmouth.edu', '2024-04-09 10:35:56', '$2y$12$J48mt.hllChAenVMIXPHbOQCXi/ZbNE0ls6G/380Ly4NtKjA5HZTK', NULL, '2114324345435435435', 'sdff', '34534534545', '3703', '2024-04-09 10:35:37', '2024-04-09 10:35:56', 0, 'avatar.png', 0, NULL),
(27, 'Priti', 'priti@monmouth.edu', '2024-04-09 10:44:13', '$2y$12$MNVZ4.V6/MYZlSioPPZlIeoLCruUJHzItT94PZruPixQzkFQQcAA.', NULL, '21143243454354', 'werwer', '43242342345346', '8808', '2024-04-09 10:43:31', '2024-04-09 10:44:13', 0, 'avatar.png', 0, NULL),
(28, 'Ravita', 'ravita@monmouth.edu', '2024-04-09 10:52:38', '$2y$12$jqaObxR.NCk6nA0QzzC3u.hqca48op7tPaNQoszt/h7DVV9I7YU5m', NULL, '21143243454354', 'werwer', '21548787541212', '6285', '2024-04-09 10:52:19', '2024-04-11 03:04:39', 1, 'avatar.png', 0, NULL),
(29, 'Ritu', 'ritu@monmouth.edu', '2024-04-09 10:55:35', '$2y$12$QiYbolPm/uy6Q.wWcQYXP.v5pg0k33FYXLLwdqgRVS2V3T81DbIWK', NULL, '21143243454354', 'ttttttttt', '34', '4413', '2024-04-09 10:55:24', '2024-04-11 04:19:26', 1, 'avatar.png', 0, NULL),
(30, 'test', 'tester@monmouth.edu', NULL, '$2y$12$iJBbY0xgHrgdVQo514IenO9Q4V8tiVPDorMGByYo575R4G4wkgCdu', NULL, '21143243454354', 'test add', '43242342345346', '8065', '2024-04-09 11:16:27', '2024-04-09 11:16:27', 0, 'avatar.png', 0, NULL),
(31, 'sonika patel', 'adminmmmm@monmouth.edu', NULL, '$2y$12$Za4sf6kwwsngLZqTIxJVHeOvvSqpDTh4600TlgA9IE7KtejGmR2Ti', NULL, '21143243454354', 'test add', '43242342345346', '9780', '2024-04-09 11:25:01', '2024-04-09 11:25:01', 0, 'avatar.png', 0, NULL),
(32, 'sonika patel', 'sonika@monmouth.edu', '2024-04-09 11:28:40', '$2y$12$QiYbolPm/uy6Q.wWcQYXP.v5pg0k33FYXLLwdqgRVS2V3T81DbIWK', NULL, '3698521478', 'test user one address', '1234567891011', '4644', '2024-04-09 11:27:49', '2024-04-11 04:19:59', 0, 'avatar.png', 0, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ch_favorites`
--
ALTER TABLE `ch_favorites`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ch_messages`
--
ALTER TABLE `ch_messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `requests`
--
ALTER TABLE `requests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

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
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `requests`
--
ALTER TABLE `requests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
