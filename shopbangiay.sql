-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th3 05, 2020 lúc 08:38 PM
-- Phiên bản máy phục vụ: 10.4.11-MariaDB
-- Phiên bản PHP: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `shopbangiay`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `brands`
--

CREATE TABLE `brands` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `logo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `brands`
--

INSERT INTO `brands` (`id`, `name`, `logo`, `created_at`, `updated_at`) VALUES
(1, 'Nike', '/photos/1/Brand/1.png', '2020-03-03 11:22:55', '2020-03-03 11:22:55'),
(2, 'Adidas', '/photos/1/Brand/2.png', '2020-03-03 11:23:35', '2020-03-03 11:23:35'),
(3, 'Vans', '/photos/1/Brand/3.png', '2020-03-03 11:24:04', '2020-03-03 11:24:04'),
(4, 'Gucci', '/photos/1/Brand/4.png', '2020-03-03 11:24:24', '2020-03-03 11:24:24'),
(5, 'Fendi', '/photos/1/Brand/5.png', '2020-03-03 11:24:33', '2020-03-03 11:24:33');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_parent` bigint(20) NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `categories`
--

INSERT INTO `categories` (`id`, `category_parent`, `name`, `slug`, `created_at`, `updated_at`) VALUES
(1, 0, 'Giày nam', 'giay-nam', '2020-03-03 11:27:15', '2020-03-03 11:27:15'),
(2, 0, 'Giày nữ', 'giay-nu', '2020-03-03 11:27:25', '2020-03-03 11:27:25'),
(3, 0, 'Giày trẻ em', 'giay-tre-em', '2020-03-03 11:27:36', '2020-03-03 11:27:36'),
(4, 1, 'Giày thể thao nam', 'giay-the-thao-nam', '2020-03-03 11:27:45', '2020-03-03 11:28:27'),
(5, 2, 'Giày thể thao nữ', 'giay-the-thao-nu', '2020-03-03 11:28:02', '2020-03-03 11:28:02'),
(6, 3, 'Giày thể thao trẻ em', 'giay-the-thao-tre-em', '2020-03-03 11:28:16', '2020-03-03 11:28:16');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `customers`
--

CREATE TABLE `customers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` char(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` int(11) NOT NULL,
  `note` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `customers`
--

INSERT INTO `customers` (`id`, `name`, `email`, `address`, `phone`, `note`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin123@gmail.com', '232 Phạm Văn Đồng', 337067439, 'size 40', '2020-03-05 02:00:45', '2020-03-05 02:00:45'),
(2, 'Admin', 'admin123@gmail.com', '232 Phạm Văn ĐỒng', 337067439, 'size 40', '2020-03-05 02:03:13', '2020-03-05 02:03:13'),
(3, 'Admin', 'admin123@gmail.com', '232 Phạm Văn ĐỒng', 337067439, 'size 40', '2020-03-05 02:03:57', '2020-03-05 02:03:57'),
(4, 'thanhlong', 'thanhlong@gmail.com', '232 Phạm Văn Đồng', 975595556, '232 Phạm Văn Đồng', '2020-03-05 02:11:00', '2020-03-05 02:11:00'),
(5, 'bichngoc', 'bichngoc@gmail.com', 'Phạm Hùng', 337067439, 'Phạm Hùng', '2020-03-05 10:43:31', '2020-03-05 10:43:31'),
(6, 'bichngoc', 'bichngoc@gmail.com', '123 Cầu Giấy', 111111111, 'size 38', '2020-03-05 12:30:36', '2020-03-05 12:30:36');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `logins`
--

CREATE TABLE `logins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `customer_id` bigint(20) NOT NULL,
  `username` char(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_11_26_160033_create_customers_table', 1),
(4, '2019_11_26_162341_create_categories_table', 1),
(5, '2019_11_27_134531_create_orders_table', 1),
(6, '2019_12_18_180606_products_table', 1),
(7, '2019_12_20_045839_create_product_images_table', 1),
(8, '2020_02_17_151900_create_options_table', 1),
(9, '2020_02_18_032904_create_slides_table', 1),
(10, '2020_02_20_050536_create_order_details_table', 1),
(11, '2020_03_03_164406_create_brands_table', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `options`
--

CREATE TABLE `options` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `option` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `options`
--

INSERT INTO `options` (`id`, `option`, `value`, `created_at`, `updated_at`) VALUES
(1, 'phone', '0337067439', NULL, NULL),
(2, 'email', 'adupacpac1234@gmail.com', NULL, NULL),
(3, 'address', '238 Hoàng Quốc Việt, Cổ Nhuế, Cầu Giấy, Hà Nội', NULL, NULL),
(4, 'cot1', 'Giao hàng miễn phí', NULL, NULL),
(5, 'cot2', 'Chính sách hoàn trả', NULL, NULL),
(6, 'cot3', 'Hỗ trợ 24/7', NULL, NULL),
(7, 'cot4', 'Thanh toán an toàn', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `customer_id` bigint(20) NOT NULL,
  `total` double NOT NULL,
  `note` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `payment` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `orders`
--

INSERT INTO `orders` (`id`, `customer_id`, `total`, `note`, `status`, `payment`, `created_at`, `updated_at`) VALUES
(1, 1, 6000000, 'size 40', 0, 'cash', '2020-03-05 02:00:45', '2020-03-05 10:44:45'),
(2, 2, 1000000, 'size 40', 2, 'cash', '2020-03-05 02:03:13', '2020-03-05 10:44:21'),
(3, 3, 1000000, 'size 40', 2, 'cash', '2020-03-05 02:03:57', '2020-03-05 10:44:24'),
(4, 4, 2000000, '232 Phạm Văn Đồng', 2, 'credit', '2020-03-05 02:11:00', '2020-03-05 02:11:17'),
(5, 5, 2000000, 'Phạm Hùng', 2, 'credit', '2020-03-05 10:43:31', '2020-03-05 10:44:11'),
(6, 6, 2000000, 'size 38', 0, 'cash', '2020-03-05 12:30:36', '2020-03-05 12:30:36');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order_details`
--

CREATE TABLE `order_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) NOT NULL,
  `product_id` bigint(20) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` double NOT NULL,
  `sale_price` double DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `order_details`
--

INSERT INTO `order_details` (`id`, `order_id`, `product_id`, `quantity`, `price`, `sale_price`, `created_at`, `updated_at`) VALUES
(1, 3, 9, 1, 1000000, NULL, '2020-03-05 02:03:57', '2020-03-05 02:03:57'),
(2, 4, 12, 1, 2000000, NULL, '2020-03-05 02:11:00', '2020-03-05 02:11:00'),
(3, 5, 9, 1, 1000000, NULL, '2020-03-05 10:43:31', '2020-03-05 10:43:31'),
(4, 5, 8, 1, 1000000, NULL, '2020-03-05 10:43:31', '2020-03-05 10:43:31'),
(5, 6, 9, 1, 1000000, NULL, '2020-03-05 12:30:36', '2020-03-05 12:30:36'),
(6, 6, 8, 1, 1000000, NULL, '2020-03-05 12:30:36', '2020-03-05 12:30:36');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `cat_id` bigint(20) NOT NULL,
  `brand_id` bigint(20) NOT NULL,
  `name` char(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int(11) NOT NULL,
  `sale_price` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `number` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`id`, `cat_id`, `brand_id`, `name`, `slug`, `description`, `image`, `price`, `sale_price`, `status`, `number`, `created_at`, `updated_at`) VALUES
(1, 4, 1, 'Nike air force 1', 'nike-air-force-1', '<p>Nike air force 1</p>', '/photos/1/Product/p1.jpg', 3652417, 1000000, 1, 5, '2020-03-03 11:59:55', '2020-03-03 12:13:10'),
(2, 5, 1, 'Nike air force 2', 'nike-air-force-2', '<p>Nike air force 2</p>', '/photos/1/Product/p2.jpg', 2541789, 1000000, 1, 10, '2020-03-03 12:37:28', '2020-03-03 12:37:28'),
(3, 6, 1, 'Nike air force 3', 'nike-air-force-3', '<p>Nike air force 3</p>', '/photos/1/Product/p3.jpg', 2541789, 1000000, 1, 15, '2020-03-03 12:38:21', '2020-03-03 12:38:21'),
(4, 4, 2, 'Adidas ultra boost 1', 'adidas-ultra-boost-1', '<p>Adidas ultra boost 1</p>', '/photos/1/Product/p4.jpg', 9685417, 1000000, 1, 20, '2020-03-03 12:40:45', '2020-03-03 12:40:45'),
(5, 5, 2, 'Adidas ultra boost 2', 'adidas-ultra-boost-2', '<p>Adidas ultra boost 2</p>', '/photos/1/Product/p5.jpg', 6541237, 1000000, 1, 25, '2020-03-03 12:41:50', '2020-03-03 12:41:50'),
(7, 4, 3, 'Vans old skool 1', 'vans-old-skool-1', '<p>Vans old skool 1</p>', '/photos/1/Product/p8.jpg', 3652417, 1000000, 1, 35, '2020-03-03 12:45:42', '2020-03-03 12:45:42'),
(8, 5, 3, 'Vans old skool 2', 'vans-old-skool-2', '<p>Vans old skool</p>', '/photos/1/Product/s-p1.jpg', 2145367, 1000000, 1, 40, '2020-03-03 12:46:22', '2020-03-03 12:46:22'),
(9, 6, 3, 'Vans old skool 3', 'vans-old-skool-3', '<p>Vans old skool 3</p>', '/photos/1/Product/e-p1.png', 1236547, 1000000, 1, 45, '2020-03-03 12:47:12', '2020-03-03 12:47:12'),
(10, 4, 4, 'Gucci Tennis 1', 'gucci-tennis-1', '<p>Gucci Tennis 1</p>', '/photos/1/Product/exclusive.jpg', 3214657, 1000000, 1, 50, '2020-03-03 12:49:36', '2020-03-03 12:49:36'),
(11, 6, 5, 'Fendi 1', 'fendi-1', '<p>Fendi 1</p>', '/photos/1/Product/exclusive.jpg', 1000000, 0, 1, 6, '2020-03-05 01:49:29', '2020-03-05 01:49:29');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product_images`
--

CREATE TABLE `product_images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `product_images`
--

INSERT INTO `product_images` (`id`, `image`, `product_id`, `created_at`, `updated_at`) VALUES
(1, '/photos/1/Product/p2.jpg', 1, '2020-03-03 11:59:55', '2020-03-03 11:59:55'),
(2, '/photos/1/Product/p3.jpg', 1, '2020-03-03 11:59:55', '2020-03-03 11:59:55'),
(3, '/photos/1/Product/p3.jpg', 2, '2020-03-03 12:37:28', '2020-03-03 12:37:28'),
(4, '/photos/1/Product/p4.jpg', 2, '2020-03-03 12:37:28', '2020-03-03 12:37:28'),
(5, '/photos/1/Product/p4.jpg', 3, '2020-03-03 12:38:21', '2020-03-03 12:38:21'),
(6, '/photos/1/Product/p5.jpg', 3, '2020-03-03 12:38:21', '2020-03-03 12:38:21'),
(7, '/photos/1/Product/p5.jpg', 4, '2020-03-03 12:40:45', '2020-03-03 12:40:45'),
(8, '/photos/1/Product/p6.jpg', 4, '2020-03-03 12:40:45', '2020-03-03 12:40:45'),
(9, '/photos/1/Product/p6.jpg', 5, '2020-03-03 12:41:50', '2020-03-03 12:41:50'),
(10, '/photos/1/Product/p7.jpg', 5, '2020-03-03 12:41:50', '2020-03-03 12:41:50'),
(13, '/photos/1/Product/s-p1.jpg', 7, '2020-03-03 12:45:42', '2020-03-03 12:45:42'),
(14, '/photos/1/Product/exclusive.jpg', 7, '2020-03-03 12:45:42', '2020-03-03 12:45:42'),
(15, '/photos/1/Product/e-p1.png', 8, '2020-03-03 12:46:22', '2020-03-03 12:46:22'),
(16, '/photos/1/Product/exclusive.jpg', 8, '2020-03-03 12:46:22', '2020-03-03 12:46:22'),
(17, '/photos/1/Product/exclusive.jpg', 9, '2020-03-03 12:47:12', '2020-03-03 12:47:12'),
(18, '/photos/1/Product/p1.jpg', 9, '2020-03-03 12:47:12', '2020-03-03 12:47:12'),
(19, '/photos/1/Product/p1.jpg', 10, '2020-03-03 12:49:36', '2020-03-03 12:49:36'),
(20, '/photos/1/Product/p2.jpg', 10, '2020-03-03 12:49:36', '2020-03-03 12:49:36'),
(21, '/photos/1/Category/c2.jpg', 11, '2020-03-05 01:49:29', '2020-03-05 01:49:29'),
(22, '/photos/1/Category/c3.jpg', 11, '2020-03-05 01:49:29', '2020-03-05 01:49:29');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `slides`
--

CREATE TABLE `slides` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `descriptions` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `link` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title_link` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `slides`
--

INSERT INTO `slides` (`id`, `title`, `descriptions`, `link`, `title_link`, `image`, `type`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Nike air force new', 'Nike air force new Nike air force new Nike air force new Nike air force new Nike air force new Nike air force new Nike air force new Nike air force new Nike air force new Nike air force new Nike air force new Nike air force new Nike air force new Nike air force new Nike air force new Nike air force new Nike air force new Nike air force new Nike air force new Nike air force new.', NULL, 'Mua ngay', '/photos/1/banner/banner-img.png', '0', 1, '2020-03-03 12:24:20', '2020-03-03 12:24:20'),
(2, 'New Shoe', 'New Shoe  New Shoe New Shoe New Shoe New Shoe  New Shoe New Shoe New Shoe New Shoe  New Shoe New Shoe New Shoe New Shoe  New Shoe New Shoe New Shoe New Shoe  New Shoe New Shoe New Shoe New Shoe  New Shoe New Shoe New Shoe New Shoe  New Shoe New Shoe New Shoe New Shoe  New Shoe New Shoe New Shoe New Shoe  New Shoe New Shoe New Shoe.', NULL, 'Mua luôn', '/photos/1/banner/banner-img.png', '0', 1, '2020-03-03 12:25:27', '2020-03-03 12:25:27'),
(3, 'hello kitty', NULL, NULL, NULL, '/photos/1/Category/c1.jpg', '1', 1, '2020-03-03 12:27:49', '2020-03-03 12:27:49'),
(4, 'hi', NULL, NULL, NULL, '/photos/1/Category/c2.jpg', '2', 1, '2020-03-03 12:29:05', '2020-03-03 12:29:05'),
(5, 'hello', NULL, NULL, NULL, '/photos/1/Category/c3.jpg', '2', 1, '2020-03-03 12:29:34', '2020-03-03 12:29:34'),
(6, 'xin chào 1000 người đang xem nha!', NULL, NULL, NULL, '/photos/1/Category/c4.jpg', '3', 1, '2020-03-03 12:30:03', '2020-03-03 12:30:03'),
(7, 'Tao có súng nè', 'bằng bằng bằng bằng bằng bằng bằng bằng bằng bằng bằng bằng bằng bằng bằng bằng bằng bằng bằng bằng bằng bằng bằng bằng bằng bằng bằng bằng bằng bằng bằng bằng bằng bằng bằng bằng bằng bằng bằng bằng.', NULL, NULL, '/photos/1/Category/c5.jpg', '4', 1, '2020-03-03 12:30:28', '2020-03-03 12:34:22'),
(8, 'Thời gian ưu đãi có hạn', 'Nhanh chân đặt hàng đi nào mọi người ơi!', NULL, 'Mua ngay', '/photos/1/Category/c5.jpg', '5', 1, '2020-03-03 12:31:33', '2020-03-03 12:31:33');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `full_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `avartar` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` tinyint(4) DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `full_name`, `address`, `phone`, `avartar`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin123@gmail.com', '$2y$10$IGSLCEqWGi0mc7fpCRX5cuhis.ikI16y32rvaQbEFmM3eQq48u2Qm', NULL, NULL, NULL, NULL, 1, '9Wycui5y1NWoHEvIaboKmUqjYAFqxUO387BBBwegMDvybPJdlSzyVEPEQJ27', NULL, NULL),
(3, 'thanhlong', 'thanhlong@gmail.com', '$2y$10$sGcmfqwAwCvGKXURuQFyFOAO/Fytw9f2KuPlT9eOj42FfNevQ/vuS', NULL, NULL, NULL, NULL, 1, 'NSmD7SxoW7I3y5EcGPbsdnEuBEHbdopCNplAz9Wh89bOv57JVwflD9nX2maD', '2020-03-05 11:05:48', '2020-03-05 11:19:02'),
(4, 'ngocngoc', 'ngocngoc@gmail.com', '$2y$10$7cnAI.uRwo/iW27LAuv34eci6A3lLKZeCbVXFPtaywPzJWUVVIg/K', NULL, NULL, NULL, NULL, 1, NULL, '2020-03-05 11:21:04', '2020-03-05 11:21:10'),
(5, 'bichngoc', 'bichngoc@gmail.com', '$2y$10$0nBmhuxFrqsV7AdZ.hrXHu2Py8/bo1XKarHgjr.mOX3Z7SxyXAeVW', NULL, '123 Cầu Giấy', '0111111111', NULL, 1, NULL, '2020-03-05 12:30:36', '2020-03-05 12:36:41');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categories_slug_unique` (`slug`);

--
-- Chỉ mục cho bảng `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `logins`
--
ALTER TABLE `logins`
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
-- Chỉ mục cho bảng `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `products_slug_unique` (`slug`);

--
-- Chỉ mục cho bảng `product_images`
--
ALTER TABLE `product_images`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `slides`
--
ALTER TABLE `slides`
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
-- AUTO_INCREMENT cho bảng `brands`
--
ALTER TABLE `brands`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `customers`
--
ALTER TABLE `customers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `logins`
--
ALTER TABLE `logins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT cho bảng `options`
--
ALTER TABLE `options`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT cho bảng `product_images`
--
ALTER TABLE `product_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT cho bảng `slides`
--
ALTER TABLE `slides`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
