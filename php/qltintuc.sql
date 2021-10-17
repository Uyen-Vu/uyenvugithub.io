-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th6 30, 2021 lúc 01:30 PM
-- Phiên bản máy phục vụ: 10.4.14-MariaDB
-- Phiên bản PHP: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `qltintuc`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `loaitin`
--

CREATE TABLE `loaitin` (
  `maloai` int(11) NOT NULL,
  `tenloai` varchar(20) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `loaitin`
--

INSERT INTO `loaitin` (`maloai`, `tenloai`) VALUES
(1, 'tin mới'),
(2, 'tin thể thao'),
(3, 'tin 24h');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tintuc`
--

CREATE TABLE `tintuc` (
  `matin` int(11) NOT NULL,
  `tieude` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `noidung` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `tacgia` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `ngayviet` date NOT NULL,
  `maloaitin` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tintuc`
--

INSERT INTO `tintuc` (`matin`, `tieude`, `noidung`, `tacgia`, `ngayviet`, `maloaitin`) VALUES
(1, 'phòng chống covid', 'triển khai kế hoạch phòng chống dịch bệnh', 'văn dũng', '2021-06-01', 3),
(2, 'euro', 'các nội dung về euro 2020', 'minh hiếu', '2021-06-02', 2),
(3, 'chung tay ủng hộ miền trung', 'quyên góp ủng hộ lũ lụt miền trung', 'tạ thị hiền', '2021-06-10', 1),
(4, 'world cup 2020', 'bóng đá world cup 2020 có gì đổi mới', 'phương thảo', '2021-06-20', 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `matkhau` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `tenhienthi` varchar(25) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `user`
--

INSERT INTO `user` (`user_id`, `matkhau`, `tenhienthi`) VALUES
(101, 'hmd', 'hoangminhduong'),
(102, 'sn', 'sieunhan'),
(103, 'nrt', 'naruto'),
(104, 'spm', 'superman');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `loaitin`
--
ALTER TABLE `loaitin`
  ADD PRIMARY KEY (`maloai`);

--
-- Chỉ mục cho bảng `tintuc`
--
ALTER TABLE `tintuc`
  ADD PRIMARY KEY (`matin`),
  ADD KEY `maloaitin` (`maloaitin`);

--
-- Chỉ mục cho bảng `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `tintuc`
--
ALTER TABLE `tintuc`
  MODIFY `matin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `tintuc`
--
ALTER TABLE `tintuc`
  ADD CONSTRAINT `tintuc_ibfk_1` FOREIGN KEY (`maloaitin`) REFERENCES `loaitin` (`maloai`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
