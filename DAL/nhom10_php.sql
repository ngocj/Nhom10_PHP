-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th5 23, 2024 lúc 03:18 PM
-- Phiên bản máy phục vụ: 10.4.32-MariaDB
-- Phiên bản PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `nhom10_php`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cart`
--

CREATE TABLE `cart` (
  `id_Cart` int(11) NOT NULL,
  `user_Id` int(11) NOT NULL,
  `product_Id` int(11) NOT NULL,
  `qty_Purchased` int(11) NOT NULL,
  `product_Name` varchar(100) NOT NULL,
  `product_Price` decimal(10,0) NOT NULL,
  `product_Image` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `category`
--

CREATE TABLE `category` (
  `id_category` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` tinytext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `id_Orders` int(11) NOT NULL,
  `user_Id` int(11) NOT NULL,
  `created_Date` date NOT NULL,
  `received_Date` date NOT NULL,
  `status` varchar(50) NOT NULL,
  `full_Name` varchar(255) NOT NULL,
  `phone_Number` varchar(100) NOT NULL,
  `addess` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders_detail`
--

CREATE TABLE `orders_detail` (
  `id_Detail` int(11) NOT NULL,
  `order_Id` int(11) NOT NULL,
  `product_Id` int(11) NOT NULL,
  `qty_Purchased` int(11) NOT NULL,
  `product_Price` varchar(100) NOT NULL,
  `product_Name` varchar(100) NOT NULL,
  `product_Image` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `id_Products` int(11) NOT NULL,
  `name` int(11) NOT NULL,
  `original_Price` int(11) NOT NULL,
  `promotion_Price` int(11) NOT NULL,
  `image` int(11) NOT NULL,
  `created_By` date NOT NULL,
  `created_Date` date NOT NULL,
  `qty` int(11) NOT NULL,
  `information` varchar(100) NOT NULL,
  `status` tinytext NOT NULL,
  `sold_Count` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id_Users` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `full_Name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id_Cart`),
  ADD KEY `user_Id` (`user_Id`),
  ADD KEY `product_Id` (`product_Id`);

--
-- Chỉ mục cho bảng `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id_category`);

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id_Orders`);

--
-- Chỉ mục cho bảng `orders_detail`
--
ALTER TABLE `orders_detail`
  ADD PRIMARY KEY (`id_Detail`),
  ADD KEY `order_Id` (`order_Id`),
  ADD KEY `product_Id` (`product_Id`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id_Products`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_Users`);

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`user_Id`) REFERENCES `users` (`id_Users`),
  ADD CONSTRAINT `cart_ibfk_2` FOREIGN KEY (`product_Id`) REFERENCES `products` (`id_Products`);

--
-- Các ràng buộc cho bảng `orders_detail`
--
ALTER TABLE `orders_detail`
  ADD CONSTRAINT `orders_detail_ibfk_1` FOREIGN KEY (`order_Id`) REFERENCES `orders` (`id_Orders`),
  ADD CONSTRAINT `orders_detail_ibfk_2` FOREIGN KEY (`product_Id`) REFERENCES `products` (`id_Products`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
