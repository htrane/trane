-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 09, 2024 lúc 06:57 PM
-- Phiên bản máy phục vụ: 10.4.25-MariaDB
-- Phiên bản PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `website`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `adproduct`
--

CREATE TABLE `adproduct` (
  `Ma_loaisp` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ma_sp` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Ten_loaisp` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hinhanh` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gianhap` int(11) NOT NULL,
  `giaxuat` int(11) NOT NULL,
  `soluong` int(11) NOT NULL,
  `khuyenmai` int(11) NOT NULL,
  `Mota_loaisp` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `create_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `adproduct`
--

INSERT INTO `adproduct` (`Ma_loaisp`, `ma_sp`, `Ten_loaisp`, `hinhanh`, `gianhap`, `giaxuat`, `soluong`, `khuyenmai`, `Mota_loaisp`, `create_date`) VALUES
('SAMSUNG', '2', '2', 'images.png', 2, 2, 2, 2, '2', '0002-02-22'),
('PH01', 'M02', 'MÈO 2', 'anh-meo-cute-hinh-cute-meo.jpg', 2000000, 2000000, 19, 15, 'MÈO 2', '2023-12-25'),
('PH01', 'M03', 'Mèo Anh Lông Ngắn', 'meoanhlongngan.jpg', 7000000, 7500000, 3, 10, 'Mèo Anh lông ngắn (British Shorthair) là một giống mèo có nguồn gốc từ Anh. Đây là giống mèo có hình dáng cơ bản rất đặc trưng, với cơ thể chắc chắn, đầu tròn và đôi mắt tròn lớn. Mũi của chúng ngắn và rộng, tạo nên một khuôn mặt hữu hình. Tai nhỏ và đứng thẳng, tạo nên vẻ ngoại hình tròn xinh đặc trưng.  Lông của mèo Anh lông ngắn là đặc điểm nổi bật, có độ dày và mịn, tạo cảm giác bông lụa khi chạm vào. Màu lông đa dạng, bao gồm màu xám, màu xanh, màu kem và nhiều biến thể màu sắc khác nhau. Điều này tạo nên vẻ đẹp sang trọng và quý phái cho giống mèo này.  Mèo Anh lông ngắn thường được mô tả là những chú mèo trầm tĩnh, tĩnh lặng và thân thiện. Họ có tính cách ổn định, không quá nghịch ngợm nhưng vẫn rất thân thiện với con người. Chúng thích nghỉ ngơi và thư giãn, làm cho chúng trở thành những bạn đồng hành lý tưởng trong gia đình.', '2023-11-14'),
('PH01', 'M04', 'Mèo Đen(Mèo Mun)', 'meoden.jpg', 5000000, 6000000, 16, 10, 'Mèo Đen, thường được gọi là Mèo Mun, là một giống mèo quen thuộc với bộ lông đen đẹp mắt, tạo nên vẻ đẹp độc đáo và quyến rũ. Với đôi mắt lớn và sáng, thường có màu vàng, xanh hoặc ngọc lục bảo, chúng toát lên vẻ ngoại hình quý phái và thần bí.\r\n\r\nNgoại hình của Mèo Mun thường mượt mà và bóng mắt, với lông đen đậm và có thể có những đốm trắng nhỏ hoặc dải màu khác nhau, tạo nên sự độc đáo trong từng con mèo.\r\n\r\nTính cách của Mèo Mun là điều đặc biệt thu hút. Chúng thường rất thân thiện và tình cảm với chủ nhân, có khả năng tạo mối liên kết mạnh mẽ và luôn quan tâm đến môi trường xung quanh. Sự nhanh nhẹn và tinh thần chơi đùa của chúng làm cho chúng trở thành bạn đồng hành tuyệt vời, đặc biệt là với trẻ em.\r\n\r\nTrong chăm sóc, Mèo Mun đòi hỏi chế độ dinh dưỡng cân đối và thức ăn chất lượng để duy trì sức khỏe và vẻ đẹp của bộ lông. Việc chải lông thường xuyên cũng là quan trọng để giữ cho bộ lông luôn mềm mại và óng ả.\r\n\r\nMèo Mun có khả năng sinh sản, và việc chăm sóc y tế định kỳ là cần thiết để đảm bảo chúng sống một cuộc sống khỏe mạnh và hạnh phúc. Với vẻ ngoại hình quyến rũ và tính cách thân thiện, Mèo Đen (Mèo Mun) là một người bạn đồng hành độc đáo và đáng yêu cho mọi gia đình yêu mèo.', '2023-11-14'),
('PH01', 'M05', 'Mèo Anh Lông Dài', 'meoanhlongdai.jpg', 8000000, 9500000, 28, 20, 'Chào mừng bạn đến với ShopYazent - điểm đến lý tưởng cho những người yêu thú cưng! Hãy cùng khám phá vẻ đẹp quý phái và độ duyên dáng của Mèo Anh Lông Dài - giống mèo sang trọng đang làm mê đắm hàng nghìn trái tim trên khắp thế giới.\r\n\r\nMèo Anh Lông Dài tại ShopYazent được chọn lọc cẩn thận, đảm bảo về sức khỏe và nguồn gốc. Với bộ lông mềm mại và dài, chúng tạo nên một hình ảnh lộng lẫy và đẳng cấp. Bạn sẽ không thể nào chối từ vẻ quý phái và tính cách thân thiện của những chú mèo này.\r\n\r\nCác đặc điểm nổi bật như đầu tròn, đôi mắt to tròn, và đuôi dài của Mèo Anh Lông Dài khiến chúng trở thành nguồn cảm hứng lý tưởng cho những người yêu mến thú cưng. Bộ lông đa dạng về màu sắc và hoa văn, tạo nên sự độc đáo cho từng cá thể.\r\n\r\nMỗi chú mèo tại ShopYazent đều được chăm sóc đặc biệt để phát triển tính cách ôn hòa và thân thiện. Chúng sẽ là bạn đồng hành tuyệt vời, làm phong phú thêm cuộc sống của bạn.\r\n\r\nHãy đến và trải nghiệm sự đẳng cấp cùng với Mèo Anh Lông Dài tại ShopYazent ngay hôm nay!', '2023-11-14'),
('TA2', 'PT1', 'Pate cho mèo', 'pate.jpg', 20000, 30000, 50, 0, 'Pate lon cho mèo Ostech Gourmet vị Cá ngừ và Gà 400g', '2023-12-26'),
('TA2', 'PT2', 'Pate cho mèo', 'pate-whiskas-cho-meo-con.jpg', 20000, 30000, 46, 20, 'PATE WHISKAS CHO MÈO POCKET OCEAN FISH 80G', '2023-12-26'),
('TA2', 'PT3', 'Pate cho mèo', 'pate-cho-meo-nekko-gravy-ca-ngu.jpg', 20000, 30000, 56, 0, 'Pate cho mèo CIAO Tuna vị cá ngừ', '2023-12-26'),
('PH04', 'TA01', 'Thức Ăn Cho Mèo', 'thucanhchomeo3.jpg', 20000, 35000, 59, 0, 'Sản phẩm thức ăn Cateye được sản xuất dành riêng cho tất cả các chú mèo để cải thiện lông, da và cả hệ tiêu hóa của chúng. Với các thành phần dễ tiêu hóa, hương vị thơm ngon giúp thúc đẩy sự thèm ăn, tăng cường hệ miễn dịch, cải thiện khả năng hấp thụ của mèo để chúng có thể hấp thụ hết các chất dinh dưỡng, nâng cao sức khỏe và giảm tải chất thải tối đa. Thông qua công nghệ tiên tiến CAT’S EYE mang lại hương vị tốt hơn cho mèo của bạn.  Những lợi ích mà các bé mèo sẽ nhận được khi ăn sản phẩm này. Từ đó, chúng ta sẽ hiểu được thức ăn hạt Cateye cho mèo có tốt không.  Dưỡng lông – Bổ sung các dưỡng chất cần thiết để đảm bảo lông của mèo luôn suôn mượt và mềm mại cả ngày.  – Tránh rụng lông  – Công thức với cellulose tự nhiên và bột củ cải đường để giúp kiểm soát búi lông  Giúp mắt luôn sáng khỏe – Thức ăn chứa vitamin A và Taurie cho đôi mắt sáng, khỏe mạnh và thị lực tốt.  Hệ thống miễn dịch mạnh mẽ Dinh dưỡng đầy đủ với các chất chống oxy hóa quan trọng và chất lượng protein cao.  Hệ tiêu hóa khỏe mạnh Công thức dễ tiêu hóa cho phép con mèo của bạn nhận được dinh dưỡng tối ưu từ thức ăn mà ít lãng phí.  Lông sáng bóng và khỏe mạnh – Axit béo omega từ hạt lanh và thịt cá, vitamin A và protein chất lượng cao giúp áo bóng và khỏe mạnh.  Mùi vị tự nhiên – Thức ăn sử dụng các nguyên liệu tự nhiên , không chất tạo mùi, tạo vị cực kỳ an toàn cho thú cưng của bạn.', '2023-12-26'),
('PH01', 'TA1', 'Thức Ăn Cho Mèo', 'thucanchomeo.jpg', 30000, 35000, 60, 0, 'Thức ăn Minino Yum Pure Delight là thức ăn dành cho tất cả giống mèo.\r\n\r\nThành phần dinh dưỡng\r\nThức ăn cho mèo Minino Yum Pure Delight gồm nhiều thành phần như lúa mì, gạo, bột thịt gia cầm, lúa mì, mỡ gia cầm (nguồn Omega 3-6 tự nhiên), bột cá, dầu cá (chứa DHA), Taurine, khoáng chất, Vitamins, Sodium Disulfate, Monocalcium Phosphate, Calcium Carbonate, muối, chất bảo quản, chất chống oxi hóa, chất làm ngon miệng, chiết xuất Yucca Schidigera…\r\n\r\nCông dụng sản phẩm Minino Yum Pure Delight\r\nThức ăn cho mèo Minino Yum Pure Delight được chế biến theo công thức chuyên biệt từ hải sản tươi ngon. Tạo nên một hương vị tuyệt vời cho những chú mèo khó tính nhất. Thành phần từ dầu cá đem lại nhiều protein và omega 3,6. Hỗ trợ được làn da và bộ lông khỏe mạnh, sáng bóng. Chiếc xuất Yucca làm giảm mùi phân. Canxi và các chất vitamin hỗ trợ hệ miễn dịch và khung xương được bền chắc. Đảm bảo được hệ đường ruột hoạt động tốt hơn.', '2023-12-26'),
('PH04', 'TA2', 'Thức Ăn Cho Mèo', '0f196827b645d4d5aadb49f1941cdccb.jpg', 30000, 40000, 56, 0, 'THỨC ĂN HẠT CHO MÈO MININO 1,3kg', '2023-12-26');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `adproducttype`
--

CREATE TABLE `adproducttype` (
  `Ma_loaisp` varchar(50) NOT NULL,
  `Ten_loaisp` varchar(50) NOT NULL,
  `Mota_loaisp` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `adproducttype`
--

INSERT INTO `adproducttype` (`Ma_loaisp`, `Ten_loaisp`, `Mota_loaisp`) VALUES
('1', '12', '12'),
('3', '31', '31'),
('SAMSUNG', 'Samsung Galaxy A12', 'Màu đỏ');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `danhkithanhvien`
--

CREATE TABLE `danhkithanhvien` (
  `FullName` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `UserName` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `PassWord` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `DienThoai` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `GioiTinh` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `QuocTich` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `DiaChi` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `HinhAnh` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `SoThich` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Level` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `danhkithanhvien`
--

INSERT INTO `danhkithanhvien` (`FullName`, `UserName`, `PassWord`, `Email`, `DienThoai`, `GioiTinh`, `QuocTich`, `DiaChi`, `HinhAnh`, `SoThich`, `Level`) VALUES
('Ngọc Anh', 'admin', '12345', 'nguyenngocanhbv2018@gmail.com', '0965313809', 'Nam', 'việt nam', 'Hà Nội', 'images (1).jpg', 'Chơi game', 'quantri'),
('admin', 'admin1', 'admin', 'admin@gmail.com', 'admin', 'Nữ', 'viet nam', 'ha noi', 'images.png', 'game', 'quantri'),
('Nguyễn Ngọc Anh', 'ngocanh1', '12345', 'nguyenngocanhbv2018@gmail.com', '0965313809', 'Nam', 'việt nam', 'Hà Nội', 'images.png', 'Chơi game', 'nguoidung');

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

--
-- Chỉ mục cho bảng `danhkithanhvien`
--
ALTER TABLE `danhkithanhvien`
  ADD PRIMARY KEY (`UserName`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
