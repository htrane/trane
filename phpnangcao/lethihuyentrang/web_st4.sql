-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 08, 2024 lúc 07:13 PM
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
-- Cơ sở dữ liệu: `web_st4`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `adproduct`
--

CREATE TABLE `adproduct` (
  `ma_loaisp` varchar(255) NOT NULL,
  `ma_sp` varchar(255) NOT NULL,
  `tensp` varchar(255) NOT NULL,
  `hinhanh` varchar(255) NOT NULL,
  `gianhap` int(11) NOT NULL,
  `giaxuat` int(11) NOT NULL,
  `khuyenmai` varchar(255) NOT NULL,
  `soluong` int(11) NOT NULL,
  `motasp` varchar(255) NOT NULL,
  `ngay_nhap` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `adproducttype`
--

CREATE TABLE `adproducttype` (
  `Ma_loaisp` varchar(100) NOT NULL,
  `Ten_loaisp` varchar(100) NOT NULL,
  `Mota_loaisp` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `adproduct`
--
ALTER TABLE `adproduct`
  ADD PRIMARY KEY (`ma_sp`);

--
-- Chỉ mục cho bảng `adproducttype`
--
ALTER TABLE `adproducttype`
  ADD PRIMARY KEY (`Ma_loaisp`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
