-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Máy chủ: localhost:3306
-- Thời gian đã tạo: Th5 05, 2021 lúc 03:44 PM
-- Phiên bản máy phục vụ: 10.2.37-MariaDB-cll-lve
-- Phiên bản PHP: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `t6quayngocnro_cc`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `baidang`
--

CREATE TABLE `baidang` (
  `id` int(11) UNSIGNED NOT NULL,
  `nguoidang` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `loai_taikhoan` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `loai_random` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `taikhoan` text COLLATE utf8_unicode_ci NOT NULL,
  `matkhau` text COLLATE utf8_unicode_ci NOT NULL,
  `hinhanh_gioithieu` text COLLATE utf8_unicode_ci NOT NULL,
  `hinhanh` text COLLATE utf8_unicode_ci NOT NULL,
  `noidung` text COLLATE utf8_unicode_ci NOT NULL,
  `tuong` text COLLATE utf8_unicode_ci NOT NULL,
  `trangphuc` text COLLATE utf8_unicode_ci NOT NULL,
  `bangngoc` text COLLATE utf8_unicode_ci NOT NULL,
  `xephang` text COLLATE utf8_unicode_ci NOT NULL,
  `khung` text COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `sodienthoai` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `facebook` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `nro_hanhtinh` text COLLATE utf8_unicode_ci NOT NULL,
  `nro_maychu` text COLLATE utf8_unicode_ci NOT NULL,
  `nro_dangky` text COLLATE utf8_unicode_ci NOT NULL,
  `nro_bongtai` text COLLATE utf8_unicode_ci NOT NULL,
  `nro_sosinhcode` text COLLATE utf8_unicode_ci NOT NULL,
  `noibat` text COLLATE utf8_unicode_ci NOT NULL,
  `taikhoan_vip` int(11) NOT NULL,
  `trangthai` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `gia` int(255) NOT NULL,
  `thoigian` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `dulieu_ATM`
--

CREATE TABLE `dulieu_ATM` (
  `id` int(11) UNSIGNED NOT NULL,
  `nganhang` text COLLATE utf8_unicode_ci NOT NULL,
  `sotaikhoan` text COLLATE utf8_unicode_ci NOT NULL,
  `chutaikhoan` text COLLATE utf8_unicode_ci NOT NULL,
  `chinhanh` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `dulieu_ATM`
--

INSERT INTO `dulieu_ATM` (`id`, `nganhang`, `sotaikhoan`, `chutaikhoan`, `chinhanh`) VALUES
(3, 'TSR', 'admin', 'ADMIN', 'Thesieure.com'),
(2, 'TCSR', 'admin', 'Tổng Văn Thống', 'Thecaosieure.com');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `giohang`
--

CREATE TABLE `giohang` (
  `id` int(11) UNSIGNED NOT NULL,
  `id_nick` int(11) NOT NULL,
  `id_taikhoan` int(11) NOT NULL,
  `sotien` int(255) NOT NULL,
  `thoigian` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `giohang`
--

INSERT INTO `giohang` (`id`, `id_nick`, `id_taikhoan`, `sotien`, `thoigian`) VALUES
(35, 138, 4, 15000, '2019-09-22 18:41:07');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hethong_quantri`
--

CREATE TABLE `hethong_quantri` (
  `tenmien` text COLLATE utf8_unicode_ci NOT NULL,
  `logo` text COLLATE utf8_unicode_ci NOT NULL,
  `mota_logo` text COLLATE utf8_unicode_ci NOT NULL,
  `icon` text COLLATE utf8_unicode_ci NOT NULL,
  `Email` text COLLATE utf8_unicode_ci NOT NULL,
  `sodienthoai` text COLLATE utf8_unicode_ci NOT NULL,
  `facebook` text COLLATE utf8_unicode_ci NOT NULL,
  `diachi` text COLLATE utf8_unicode_ci NOT NULL,
  `thongbao` text COLLATE utf8_unicode_ci NOT NULL,
  `baotri` text COLLATE utf8_unicode_ci NOT NULL,
  `youtube` text COLLATE utf8_unicode_ci NOT NULL,
  `tukhoa` text COLLATE utf8_unicode_ci NOT NULL,
  `tieude` text COLLATE utf8_unicode_ci NOT NULL,
  `matkhau` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `hethong_quantri`
--

INSERT INTO `hethong_quantri` (`tenmien`, `logo`, `mota_logo`, `icon`, `Email`, `sodienthoai`, `facebook`, `diachi`, `thongbao`, `baotri`, `youtube`, `tukhoa`, `tieude`, `matkhau`) VALUES
('https://t1620208506.quayngocnro.com', '', 'DAILYSIEURE.COM', '/danhmuc_hinhanh/icon.png', 'admin@gmail.com', '0123456789', 'https://www.facebook.com/', 'Việt Nam', 'Website chuyên cung Cấp Tài Khoản Game giá Rẻ Uy Tín', '0', 'https://youtube.com/', 'shop,acc,game', 'SHOP BÁN ACC GAME', '14e1b600b1fd579f47433b88e8d85291');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `lichsu_giaodich`
--

CREATE TABLE `lichsu_giaodich` (
  `id` int(11) UNSIGNED NOT NULL,
  `id_nguoichuyen` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `nguoi_chuyen` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `nguoi_nhan` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `sotien` int(255) NOT NULL,
  `thoigian` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `lichsu_muanick`
--

CREATE TABLE `lichsu_muanick` (
  `id` int(11) UNSIGNED NOT NULL,
  `loai_taikhoan` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `taikhoan_id` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `taikhoan_nick_id` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `taikhoan` text COLLATE utf8_unicode_ci NOT NULL,
  `matkhau` text COLLATE utf8_unicode_ci NOT NULL,
  `gia` int(255) NOT NULL,
  `thoigian` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `lichsu_naptien`
--

CREATE TABLE `lichsu_naptien` (
  `id` int(11) UNSIGNED NOT NULL,
  `taikhoan_id` int(11) NOT NULL,
  `hovaten` text COLLATE utf8_unicode_ci NOT NULL,
  `loaithe` text COLLATE utf8_unicode_ci NOT NULL,
  `menhgia` text COLLATE utf8_unicode_ci NOT NULL,
  `serial` text COLLATE utf8_unicode_ci NOT NULL,
  `mathe` text COLLATE utf8_unicode_ci NOT NULL,
  `thucnhan` int(255) NOT NULL,
  `trangthai` int(255) NOT NULL,
  `thoigian` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `muathe`
--

CREATE TABLE `muathe` (
  `id` int(11) UNSIGNED NOT NULL,
  `taikhoan_id` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `hovaten` text COLLATE utf8_unicode_ci NOT NULL,
  `loaithe` text COLLATE utf8_unicode_ci NOT NULL,
  `menhgia` text COLLATE utf8_unicode_ci NOT NULL,
  `mathe` text COLLATE utf8_unicode_ci NOT NULL,
  `noidung` text COLLATE utf8_unicode_ci NOT NULL,
  `serial` text COLLATE utf8_unicode_ci NOT NULL,
  `trangthai` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `thoigian` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nguoidung`
--

CREATE TABLE `nguoidung` (
  `id` int(11) UNSIGNED NOT NULL,
  `taikhoan_id` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `matkhau` text COLLATE utf8_unicode_ci NOT NULL,
  `matkhau2` text COLLATE utf8_unicode_ci NOT NULL,
  `hovaten` text COLLATE utf8_unicode_ci NOT NULL,
  `email` text COLLATE utf8_unicode_ci NOT NULL,
  `sodienthoai` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `chucvu` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `tien` int(100) NOT NULL DEFAULT 0,
  `khoa` int(11) DEFAULT 0,
  `thoigian` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `nguoidung`
--

INSERT INTO `nguoidung` (`id`, `taikhoan_id`, `matkhau`, `matkhau2`, `hovaten`, `email`, `sodienthoai`, `chucvu`, `tien`, `khoa`, `thoigian`) VALUES
(8, '', '027bbf44cec10011627cebd0808f8d0f', '70bc1a53b34281fd387120fe8ab5f3b0', 'cac@cac.cac', 'cac@cac.cac', '0222222222', 'quantri', 10000, 0, '2020-07-30 15:11:19');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `to9xvn_napthenhanh`
--

CREATE TABLE `to9xvn_napthenhanh` (
  `ID` bigint(20) NOT NULL,
  `uid` varchar(32) NOT NULL,
  `sotien` int(11) NOT NULL,
  `seri` varchar(32) NOT NULL,
  `code` varchar(32) NOT NULL,
  `loaithe` varchar(32) NOT NULL,
  `time` varchar(32) NOT NULL,
  `noidung` text NOT NULL,
  `tinhtrang` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `baidang`
--
ALTER TABLE `baidang`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `dulieu_ATM`
--
ALTER TABLE `dulieu_ATM`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `giohang`
--
ALTER TABLE `giohang`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `lichsu_giaodich`
--
ALTER TABLE `lichsu_giaodich`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `lichsu_muanick`
--
ALTER TABLE `lichsu_muanick`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `lichsu_naptien`
--
ALTER TABLE `lichsu_naptien`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `muathe`
--
ALTER TABLE `muathe`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `nguoidung`
--
ALTER TABLE `nguoidung`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `to9xvn_napthenhanh`
--
ALTER TABLE `to9xvn_napthenhanh`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `baidang`
--
ALTER TABLE `baidang`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `dulieu_ATM`
--
ALTER TABLE `dulieu_ATM`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `giohang`
--
ALTER TABLE `giohang`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT cho bảng `lichsu_giaodich`
--
ALTER TABLE `lichsu_giaodich`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `lichsu_muanick`
--
ALTER TABLE `lichsu_muanick`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `lichsu_naptien`
--
ALTER TABLE `lichsu_naptien`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `muathe`
--
ALTER TABLE `muathe`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `nguoidung`
--
ALTER TABLE `nguoidung`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `to9xvn_napthenhanh`
--
ALTER TABLE `to9xvn_napthenhanh`
  MODIFY `ID` bigint(20) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
