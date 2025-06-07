-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th5 24, 2025 lúc 06:58 AM
-- Phiên bản máy phục vụ: 10.4.32-MariaDB
-- Phiên bản PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `finance`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `carts`
--

CREATE TABLE `carts` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `all_price` varchar(30) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `phone` varchar(15) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `name` varchar(120) DEFAULT NULL,
  `content` text DEFAULT NULL,
  `img` varchar(255) DEFAULT NULL,
  `parent` int(11) DEFAULT NULL,
  `title` varchar(120) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `status` varchar(11) DEFAULT NULL,
  `sort_by` varchar(10) DEFAULT NULL,
  `view` int(11) DEFAULT NULL,
  `icon` varchar(100) DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `categories`
--

INSERT INTO `categories` (`id`, `user_id`, `name`, `content`, `img`, `parent`, `title`, `description`, `status`, `sort_by`, `view`, `icon`, `slug`, `created_at`, `updated_at`) VALUES
(106, 1, 'blog', NULL, NULL, 0, NULL, NULL, 'true', 'News', 8, NULL, 'blog', '2025-05-21 19:31:07', '2025-05-23 21:03:01'),
(107, 1, 'Forex EA', NULL, NULL, 0, NULL, NULL, 'true', 'News', 1, NULL, 'forex-ea', '2025-05-23 21:00:13', '2025-05-23 21:01:20'),
(108, 1, 'Forex Indicators', NULL, NULL, 0, NULL, NULL, 'true', 'News', 2, NULL, 'forex-indicators', '2025-05-23 21:00:39', '2025-05-23 21:01:21'),
(109, 1, 'Premium Indicators', NULL, NULL, 0, NULL, NULL, 'true', 'Page', 3, NULL, 'premium-indicators', '2025-05-23 21:01:04', '2025-05-23 21:01:22'),
(110, 1, 'Strategies', NULL, NULL, 0, NULL, NULL, 'true', 'News', 4, NULL, 'strategies', '2025-05-23 21:02:02', '2025-05-23 21:02:06'),
(111, 1, 'Binary', NULL, NULL, 0, NULL, NULL, 'true', 'News', 5, NULL, 'binary', '2025-05-23 21:02:30', '2025-05-23 21:02:59'),
(112, 1, 'Education', NULL, NULL, 0, NULL, NULL, 'true', 'News', 6, NULL, 'education', '2025-05-23 21:02:48', '2025-05-23 21:03:00'),
(113, 1, 'Brokers', NULL, NULL, 0, NULL, NULL, 'true', 'Page', 7, NULL, 'brokers', '2025-05-23 21:03:19', '2025-05-23 21:03:23'),
(114, 1, 'MT4 EA', NULL, NULL, 107, NULL, NULL, 'true', 'News', NULL, NULL, 'mt4-ea', '2025-05-23 21:29:02', '2025-05-23 21:29:02'),
(115, 1, 'MT5 EA', NULL, NULL, 107, NULL, NULL, 'true', 'News', NULL, NULL, 'mt5-ea', '2025-05-23 21:29:24', '2025-05-23 21:29:24');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `customers`
--

CREATE TABLE `customers` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `phone` varchar(50) DEFAULT NULL,
  `email` varchar(150) DEFAULT NULL,
  `status` varchar(50) DEFAULT 'true',
  `title` varchar(255) DEFAULT NULL,
  `content` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `images`
--

CREATE TABLE `images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `post_id` int(11) DEFAULT NULL,
  `section_id` int(11) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `img` varchar(255) DEFAULT NULL,
  `note` varchar(10) DEFAULT NULL,
  `content` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `menus`
--

CREATE TABLE `menus` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `img` varchar(255) DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `view` int(11) DEFAULT NULL,
  `parent` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `menus`
--

INSERT INTO `menus` (`id`, `user_id`, `name`, `img`, `slug`, `view`, `parent`, `created_at`, `updated_at`) VALUES
(92, 1, 'Blog', NULL, 'blog', 8, 0, '2025-05-22 02:31:22', '2025-05-24 04:04:44'),
(93, 1, 'Forex EA', NULL, 'forex-ea', 1, 0, '2025-05-24 04:03:58', '2025-05-24 04:04:40'),
(94, 1, 'Forex Indicators', NULL, 'forex-indicators', 2, 0, '2025-05-24 04:04:04', '2025-05-24 04:04:41'),
(95, 1, 'Premium Indicators', NULL, 'premium-indicators', 3, 0, '2025-05-24 04:04:11', '2025-05-24 04:04:41'),
(96, 1, 'Strategies', NULL, 'strategies', 4, 0, '2025-05-24 04:04:21', '2025-05-24 04:04:41'),
(97, 1, 'Binary', NULL, 'binary', 5, 0, '2025-05-24 04:04:27', '2025-05-24 04:04:42'),
(98, 1, 'Education', NULL, 'education', 6, 0, '2025-05-24 04:04:33', '2025-05-24 04:04:42'),
(99, 1, 'Brokers', NULL, 'brokers', 7, 0, '2025-05-24 04:04:38', '2025-05-24 04:04:43'),
(100, 1, 'MT4 EA', NULL, 'mt4-ea', NULL, 93, '2025-05-24 04:31:11', '2025-05-24 04:31:11'),
(101, 1, 'MT5 EA', NULL, 'mt5-ea', NULL, 93, '2025-05-24 04:31:19', '2025-05-24 04:31:19');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(7, '2023_04_13_035737_create_images_table', 2),
(10, '2023_04_13_084106_create_provinces_table', 3);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `options`
--

CREATE TABLE `options` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `name` varchar(120) DEFAULT NULL,
  `sku` varchar(50) DEFAULT NULL,
  `content` text DEFAULT NULL,
  `img` varchar(255) DEFAULT NULL,
  `parent` int(11) DEFAULT NULL,
  `title` varchar(120) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `status` varchar(11) DEFAULT NULL,
  `sort_by` varchar(10) DEFAULT NULL,
  `view` int(11) DEFAULT NULL,
  `icon` varchar(100) DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `cart_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `unit` varchar(20) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `name` varchar(120) DEFAULT NULL,
  `detail` text DEFAULT NULL,
  `content` text DEFAULT NULL,
  `status` varchar(11) DEFAULT NULL,
  `hot` varchar(10) DEFAULT NULL,
  `sort_by` varchar(10) DEFAULT NULL,
  `slug` varchar(255) NOT NULL,
  `img` varchar(255) DEFAULT NULL,
  `price` varchar(50) DEFAULT NULL,
  `price_max` varchar(50) DEFAULT NULL,
  `unit` varchar(50) DEFAULT NULL,
  `acreage` int(11) DEFAULT NULL,
  `acreage_max` int(11) DEFAULT NULL,
  `bedroom` int(11) DEFAULT NULL,
  `bedroom_max` int(11) DEFAULT NULL,
  `wc` int(11) DEFAULT NULL,
  `wc_max` int(11) DEFAULT NULL,
  `total_product` int(11) DEFAULT NULL,
  `province_id` int(11) DEFAULT NULL,
  `district_id` int(11) DEFAULT NULL,
  `ward_id` int(11) DEFAULT NULL,
  `street_id` int(11) DEFAULT NULL,
  `address` varchar(150) DEFAULT NULL,
  `monopoly` varchar(50) DEFAULT NULL,
  `for_sale` varchar(50) DEFAULT NULL,
  `new_product` varchar(50) DEFAULT NULL,
  `maps` text DEFAULT NULL,
  `title` varchar(120) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `posts`
--

INSERT INTO `posts` (`id`, `user_id`, `category_id`, `name`, `detail`, `content`, `status`, `hot`, `sort_by`, `slug`, `img`, `price`, `price_max`, `unit`, `acreage`, `acreage_max`, `bedroom`, `bedroom_max`, `wc`, `wc_max`, `total_product`, `province_id`, `district_id`, `ward_id`, `street_id`, `address`, `monopoly`, `for_sale`, `new_product`, `maps`, `title`, `description`, `created_at`, `updated_at`) VALUES
(725, 1, 106, 'Many desktop publishing packages & will uncover many web sites', 'Many desktop publishing packages & will uncover many web sites', '<p>Many desktop publishing packages &amp; will uncover many web sites</p><p>Many desktop publishing packages &amp; will uncover many web sites</p><p>Many desktop publishing packages &amp; will uncover many web sites</p><figure class=\"image\"><img src=\"http://localhost/www/finance/public/uploads/1747881414.webp\"></figure>', 'true', NULL, 'News', 'many-desktop-publishing-packages-will-uncover-many-web-sites', 'tong-the-du-an-sun-ponte-residences-toa-lac-ben-bo-song-han-tho-mong-duoc-phat-trien-boi-chu-dau-tu-sun-group.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2025-05-21 19:36:58', '2025-05-21 19:36:58');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `promotions`
--

CREATE TABLE `promotions` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `parent` int(11) DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `img` varchar(255) DEFAULT NULL,
  `content` text DEFAULT NULL,
  `status` varchar(20) DEFAULT NULL,
  `title` varchar(150) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sections`
--

CREATE TABLE `sections` (
  `id` int(11) NOT NULL,
  `post_id` int(11) DEFAULT NULL,
  `stt` int(11) DEFAULT NULL,
  `tab` varchar(100) DEFAULT NULL,
  `heading` varchar(150) DEFAULT NULL,
  `content` text DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `settings`
--

CREATE TABLE `settings` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `address` varchar(150) DEFAULT NULL,
  `title` varchar(150) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `exchange` varchar(12) DEFAULT NULL,
  `footer` text DEFAULT NULL,
  `header` text DEFAULT NULL,
  `hotline` varchar(15) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `facebook` varchar(100) DEFAULT NULL,
  `youtube` varchar(100) DEFAULT NULL,
  `maps` text DEFAULT NULL,
  `content_cart` text DEFAULT NULL,
  `img` varchar(100) DEFAULT NULL,
  `favicon` varchar(100) DEFAULT NULL,
  `status` varchar(10) DEFAULT NULL,
  `diamond` varchar(50) DEFAULT NULL,
  `gold` varchar(50) DEFAULT NULL,
  `silver` varchar(50) DEFAULT NULL,
  `copper` varchar(50) DEFAULT NULL,
  `register` text DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `settings`
--

INSERT INTO `settings` (`id`, `user_id`, `name`, `address`, `title`, `description`, `exchange`, `footer`, `header`, `hotline`, `email`, `facebook`, `youtube`, `maps`, `content_cart`, `img`, `favicon`, `status`, `diamond`, `gold`, `silver`, `copper`, `register`, `created_at`, `updated_at`) VALUES
(1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'logo_-01.png', 'favicon_30.png', NULL, '20000000', '10000000', '5000000', '1000000', NULL, NULL, '2025-05-21 02:02:47');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sliders`
--

CREATE TABLE `sliders` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `img` varchar(255) DEFAULT NULL,
  `note` varchar(100) DEFAULT NULL,
  `content` text DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `img` varchar(255) DEFAULT NULL,
  `gender` varchar(20) DEFAULT NULL,
  `yourname` varchar(100) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `address` varchar(150) DEFAULT NULL,
  `rank` varchar(50) DEFAULT NULL,
  `total` varchar(50) DEFAULT NULL,
  `phone` varchar(15) DEFAULT NULL,
  `facebook` varchar(255) DEFAULT NULL,
  `permission` int(11) DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `img`, `gender`, `yourname`, `email`, `address`, `rank`, `total`, `phone`, `facebook`, `permission`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Nguyễn Văn Tuấn', '430283906_1776968522811987_8281687731139390845_n.jpg', 'Nam', 'Tuấn Nguyễn', 'tuan.pn92@gmail.com', 'Hà Nội', 'Kim cương', '36097000', '0977572947', NULL, 1, NULL, '$2y$10$9fz78ri8PAvBIbSerrENiuTjo5WlAXRXdfCtkh.40ByOcTeSNYCsO', NULL, '2023-03-20 09:17:19', '2025-05-22 19:50:40');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Chỉ mục cho bảng `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `options`
--
ALTER TABLE `options`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Chỉ mục cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Chỉ mục cho bảng `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `promotions`
--
ALTER TABLE `promotions`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `sections`
--
ALTER TABLE `sections`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `carts`
--
ALTER TABLE `carts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=116;

--
-- AUTO_INCREMENT cho bảng `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `images`
--
ALTER TABLE `images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2797;

--
-- AUTO_INCREMENT cho bảng `menus`
--
ALTER TABLE `menus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT cho bảng `options`
--
ALTER TABLE `options`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=121;

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- AUTO_INCREMENT cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=726;

--
-- AUTO_INCREMENT cho bảng `promotions`
--
ALTER TABLE `promotions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT cho bảng `sections`
--
ALTER TABLE `sections`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=326;

--
-- AUTO_INCREMENT cho bảng `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
