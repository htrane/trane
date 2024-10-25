-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 11, 2024 lúc 11:08 AM
-- Phiên bản máy phục vụ: 10.4.28-MariaDB
-- Phiên bản PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `phpnc`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `ad_product`
--

CREATE TABLE `ad_product` (
  `ma_loaisp` varchar(50) NOT NULL,
  `masp` varchar(50) NOT NULL,
  `tensp` varchar(100) NOT NULL,
  `hinhanh` varchar(100) DEFAULT NULL,
  `soluong` int(11) DEFAULT NULL,
  `gianhap` int(11) DEFAULT NULL,
  `giaxuat` int(11) DEFAULT NULL,
  `khuyenmai` int(11) DEFAULT NULL,
  `mota` varchar(200) DEFAULT NULL,
  `create_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `ad_product`
--

INSERT INTO `ad_product` (`ma_loaisp`, `masp`, `tensp`, `hinhanh`, `soluong`, `gianhap`, `giaxuat`, `khuyenmai`, `mota`, `create_date`) VALUES
('LSP01', 'SP001', 'Sách 1', 'h1.jpg', 10, 100000, 120000, 10, 'Mô tả sản phẩm quyển sách rách', '2023-10-01'),
('LSP01', 'SP002', 'Sản phẩm 2', 's1\r\n.jpeg', 15, 150000, 170000, 15, 'Mô tả sản phẩm 2', '2023-10-02'),
('LSP02', 'SP003', 'Sản phẩm 3', 's3.jpeg', 20, 200000, 230000, 20, 'Mô tả sản phẩm 3', '2023-10-03'),
('LSP03', 'SP004', 'sách 4', 's2.jpeg', 5, 500000, 550000, 5, 'Mô tả sản phẩm 4', '2023-10-04');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `categories`
--

INSERT INTO `categories` (`id`, `category_name`, `description`, `created_at`) VALUES
(7, 'hien123', '', '2024-10-11 07:57:54');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `ad_product`
--
ALTER TABLE `ad_product`
  ADD PRIMARY KEY (`masp`);

--
-- Chỉ mục cho bảng `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
