-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 26, 2019 at 04:06 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ql_csvctb`
--

-- --------------------------------------------------------

--
-- Table structure for table `dexuatmua`
--

CREATE TABLE `dexuatmua` (
  `idtb` int(11) NOT NULL,
  `tentb` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `soluong` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kiemke`
--

CREATE TABLE `kiemke` (
  `idkk` int(11) NOT NULL,
  `idNV_QL` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `diadiem` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kiemke`
--

INSERT INTO `kiemke` (`idkk`, `idNV_QL`, `date`, `diadiem`) VALUES
(1, 'NV002', '2019-04-27', 'B1.P504'),
(9, 'NV002', '2019-04-27', 'D5.P304'),
(10, 'NV002', '2019-05-02', 'B1.P703'),
(15, 'NV001', '2019-05-02', 'B1.P504'),
(24, 'NV001', '2019-05-02', 'B1.P1002'),
(25, 'NV002', '2019-05-16', 'B1.P504'),
(43, 'NV002', '2019-05-06', 'B1.P601'),
(44, 'NV002', '2019-05-12', 'B1.P601'),
(45, 'NV002', '2019-05-15', 'B1.P601'),
(46, 'NV002', '2019-05-16', 'B1.P601'),
(47, 'QL001', '2019-05-17', 'B1.P701'),
(48, 'QL001', '2019-05-17', 'B1.P601');

-- --------------------------------------------------------

--
-- Table structure for table `kiemke_tb`
--

CREATE TABLE `kiemke_tb` (
  `idkk` int(11) NOT NULL,
  `idTB` int(11) NOT NULL,
  `ketquakk` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kiemke_tb`
--

INSERT INTO `kiemke_tb` (`idkk`, `idTB`, `ketquakk`) VALUES
(1, 1, 'Thanh lý'),
(1, 8, 'Thanh lý'),
(1, 9, 'Thanh lý'),
(28, 10, 'Bình thường'),
(28, 11, 'Bình thường'),
(30, 10, 'Bình thường'),
(30, 11, 'Bình thường'),
(31, 10, 'Bình thường'),
(31, 11, 'Bình thường'),
(32, 10, 'Bình thường'),
(32, 11, 'Bình thường'),
(33, 10, 'Bình thường'),
(33, 11, 'Bình thường'),
(34, 10, 'Bình thường'),
(34, 11, 'Bình thường'),
(35, 10, 'Bình thường'),
(35, 11, 'Bình thường'),
(36, 10, 'Bình thường'),
(36, 11, 'Bình thường'),
(37, 10, 'Bình thường'),
(37, 11, 'Bình thường'),
(38, 10, 'Bình thường'),
(38, 11, 'Bình thường'),
(40, 10, 'Bình thường'),
(40, 11, 'Bình thường'),
(37, 10, 'Cần sửa chữa'),
(37, 11, 'Cần sửa chữa'),
(37, 10, 'Bình thường'),
(37, 11, 'Bình thường'),
(43, 10, ''),
(43, 11, ''),
(43, 10, 'Bình thường'),
(43, 11, 'Bình thường'),
(44, 10, 'Bình thường'),
(44, 11, 'Bình thường'),
(45, 10, 'Thanh lý'),
(45, 11, 'Bình thường'),
(46, 10, 'Bình thường'),
(46, 11, 'Cần sửa chữa'),
(48, 10, 'Bình thường'),
(48, 11, 'Bình thường'),
(48, 24, 'Bình thường'),
(48, 25, 'Bình thường'),
(48, 26, 'Thanh lý'),
(48, 27, 'Thanh lý');

-- --------------------------------------------------------

--
-- Table structure for table `nv_ql`
--

CREATE TABLE `nv_ql` (
  `idNV_QL` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `matkhau` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hoten` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `quyen` int(100) DEFAULT NULL,
  `chucvu` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `DV` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `nv_ql`
--

INSERT INTO `nv_ql` (`idNV_QL`, `matkhau`, `hoten`, `quyen`, `chucvu`, `DV`) VALUES
('NV001', '1', 'Vũ Dương', 0, 'Nhân viên', 'Bộ môn Công nghệ phần mềm'),
('NV002', '1', 'Hoàng Văn Bách', 0, 'Nhân viên', 'Bộ môn Công nghệ phần mềm'),
('NV003', '2', 'Nguyễn Hồng', 0, 'Quản lý csvc', 'Bộ môn Công nghệ phần mềm'),
('NV1234', '19981998', 'Hồng Nguyễn', 0, 'Quản lý phòng máy', 'Trường'),
('QL001', '2', 'Đăng', 1, 'Nhân viên ', 'Bộ môn Công nghệ phần mềm'),
('QL8a99', '1', 'Nguyễn Thuỳ Dương', 1, 'QL CNPM', 'CNPM');

-- --------------------------------------------------------

--
-- Table structure for table `phongbann`
--

CREATE TABLE `phongbann` (
  `idPhongban` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `TenP` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Diadiem` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Dientich` int(11) DEFAULT NULL,
  `ĐVSD` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `phongbann`
--

INSERT INTO `phongbann` (`idPhongban`, `TenP`, `Diadiem`, `Dientich`, `ĐVSD`) VALUES
('1', 'Văn phòng Viện CNTT&TT', 'B1.P504', 100, 'VPV'),
('10', 'Phòng thí nghiệm BM Khoa học máy tính', 'B1.P703', 100, 'BMKHMT'),
('11', 'Phòng thí nghiệm BM Truyền thông và Mạng máy tính', 'B1.P801', 100, 'BMTTMMT'),
('12', 'Phòng thí nghiệm BM Kỹ thuật máy tính', 'B1.P802', 100, 'BMKTMT'),
('13', 'Phòng thí nghiệm Hệ thống máy tính', 'B1.P505', 100, 'PTNNC'),
('14', 'Phòng Hội thảo', 'B1.P803', 200, 'PTNNC'),
('15', 'Phòng thí nghiệm đang xây dựng', 'B1.P901', 100, 'PTNNC'),
('16', 'Phòng thí nghiệm đang xây dựng', 'B1.P902', 100, 'PTNNC'),
('17', 'Phòng thí nghiệm đang xây dựng', 'B1.P1001', 100, 'PTNNC'),
('18', 'Phòng thí nghiệm đang xây dựng', 'B1.P1002', 100, 'PTNNC'),
('19', 'Văn phòng Trung tâm máy tính', 'D5.P301', 40, 'TTMT'),
('2', 'Ban Giám đốc Viện', 'B1.P503', 40, 'VPV'),
('20', 'Phòng thực hành máy tính 1', 'D5.P302', 70, 'TTMT'),
('21', 'Phòng thực hành máy tính 2', 'D5.P303', 70, 'TTMT'),
('22', 'Phòng thực hành máy tính 3', 'D5.P304', 70, 'TTMT'),
('23', 'Phòng thực hành máy tính 4', 'D5.P305', 70, 'TTMT'),
('24', 'Phòng thực hành máy tính 5', 'D5.P306', 70, 'TTMT'),
('25', 'Văn phòng Dự án', 'TVTQB.P806', 100, 'VN'),
('26', 'Ban quản lý Dự án', 'TVTQB.P802,3', 80, 'VN'),
('27', 'Phòng chuyên gia 1 (tư vấn JICA)', 'TVTQB.P801', 70, 'VN'),
('28', 'Phòng chuyên gia 2 (tư vấn PADECO)', 'TVTQB.P804', 70, 'VN'),
('29', 'Phòng họp', 'TVTQB.P805', 200, 'VN'),
('3', 'Văn phòng Bộ môn Kỹ thuật máy tính', 'B1.P502', 80, 'BMKTMT'),
('30', 'Phòng giáo viên Tiếng Nhật', 'TVTQB.P806,7', 50, 'VN'),
('31', 'Phòng Hội thảo', 'TVTQB.P816', 150, 'VN'),
('32', 'Các phòng thực hành máy tính', 'TVTQB.P811,14', 80, 'VN'),
('33', 'Phòng thực hành Mạch Logic', 'TVTQB.P819', 100, 'VN'),
('34', 'Phòng nghiên cứu cho sinh viên', 'TVTQB.P817', 150, 'VN'),
('35', 'Thư viện', 'TVTQB.P818', 200, 'VN'),
('36', 'Phòng máy chủ', 'TVTQB.P924B', 50, 'VN'),
('4', 'Văn phòng Bộ môn Truyền thông và Mạng máy tính', 'B1.P501', 80, 'BMTTMMT'),
('5', 'Văn phòng Bộ môn Công nghệ phần mềm', 'B1.P601', 80, 'BMCNPM'),
('6', 'Văn phòng Bộ môn Khoa học máy tính', 'B1.P602', 80, 'BMKHMT'),
('7', 'Văn phòng Bộ môn Hệ thống thông tin', 'B1.P603', 80, 'BMHTTT'),
('8', 'Phòng thí nghiệm BM Công nghệ phần mềm', 'B1.P701', 100, 'BMCNPM'),
('9', 'Phòng thí nghiệm BM Hệ thống thông tin', 'B1.P702', 100, 'BMHTTT');

-- --------------------------------------------------------

--
-- Table structure for table `thietbi`
--

CREATE TABLE `thietbi` (
  `idthietbi` int(11) NOT NULL,
  `codetb` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tenTB` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Soluong` int(11) DEFAULT NULL,
  `Namsd` int(11) DEFAULT NULL,
  `Trangthai` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Ghichu` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `idPhongban` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `thietbi`
--

INSERT INTO `thietbi` (`idthietbi`, `codetb`, `tenTB`, `Soluong`, `Namsd`, `Trangthai`, `Ghichu`, `idPhongban`, `status`) VALUES
(1, 'CATALYS', 'SWITCH CATALYS (25 port 10/100)', 1, 8, '50%', NULL, '1', '1'),
(2, 'X3B82722401981', 'Chuột quang', 2, 5, '70%', NULL, '8', '1'),
(3, 'KMR46B17P78OE', 'Máy tính thương hiệu IBM', 1, 12, '30%', NULL, '8', '1'),
(4, 'KX-TC267BX-B', 'Phích điện TOSHIBA', 1, 7, '50%', NULL, '8', '1'),
(5, 'AJ4C34036', 'Điều hoà Panasonic', 1, 3, '90%', NULL, '8', '1'),
(6, '512DDR', 'Máy tính thương hiệu HP P4/2.8GH/512DDR/80GbHDD/ CDRom', 1, 7, '20%', NULL, '10', '1'),
(7, '512DDR/80GbHDD', 'Máy tính thương hiệu 3C P4/2.8GH/512DDR/80GbHDD/ CDRom', 2, 12, '30%', NULL, '2', '1'),
(8, 'PT-LB60NTEA', 'Máy chiếu Panasonic', 2, 9, '70%', NULL, '1', '1'),
(9, 'QD400-MG', 'Quạt điện VinaWind', 6, 11, '70%', NULL, '1', '0'),
(10, 'MR-15j-GY', 'Tủ lạnh Mitsubishi J-Club', 1, 10, '40%', '', '5', '1'),
(11, 'KQA-99609', 'Điện thoại bàn', 1, 7, '20%', 'Cần sửa chữa', '5', '1'),
(12, 'MF4150', 'Máy in ImageClass ', 1, 10, '40%', NULL, '8', '1'),
(13, 'TL-WR740N', 'Wifi Router TP-LINK TL-WR740N', 2, 3, '90%', NULL, '8', '1'),
(14, 'AXCVBN12', 'Laptop Dell 7453', 1, 0, '100%', 'Mới', '1', '1'),
(15, 'AXCVBN123', 'Laptop Asus 7453', 1, 1, '95%', '', '1', '1'),
(22, 'CNBS09237', 'PC GJ0987', 1, 0, '100%', 'Mới', '10', '1'),
(23, 'J2AXCVBN12', 'Laptop DP', 1, 5, '60%', '', '10', '1'),
(24, 'GH12345', 'Cáp PCJ12', 10, 0, '100%', '', '5', '1'),
(25, 'AV05521-000', 'Chuột không dây logitech', 10, 1, '95%', '', '5', '1'),
(26, 'J2AXCVBN12dwe', 'Laptop Dell 7453', 1, 6, '60%', '', '5', '0'),
(27, 'AXCVBN12tetrsg', 'Laptop DP', 1, 7, '20%', '', '5', '0');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dexuatmua`
--
ALTER TABLE `dexuatmua`
  ADD PRIMARY KEY (`idtb`);

--
-- Indexes for table `kiemke`
--
ALTER TABLE `kiemke`
  ADD PRIMARY KEY (`idkk`),
  ADD KEY `keyy2_idx` (`idNV_QL`);

--
-- Indexes for table `kiemke_tb`
--
ALTER TABLE `kiemke_tb`
  ADD KEY `keyy2_idx` (`idTB`),
  ADD KEY `keyy1` (`idkk`);

--
-- Indexes for table `nv_ql`
--
ALTER TABLE `nv_ql`
  ADD PRIMARY KEY (`idNV_QL`);

--
-- Indexes for table `phongbann`
--
ALTER TABLE `phongbann`
  ADD PRIMARY KEY (`idPhongban`);

--
-- Indexes for table `thietbi`
--
ALTER TABLE `thietbi`
  ADD PRIMARY KEY (`idthietbi`),
  ADD KEY `key2_idx` (`idPhongban`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dexuatmua`
--
ALTER TABLE `dexuatmua`
  MODIFY `idtb` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kiemke`
--
ALTER TABLE `kiemke`
  MODIFY `idkk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `thietbi`
--
ALTER TABLE `thietbi`
  MODIFY `idthietbi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `kiemke`
--
ALTER TABLE `kiemke`
  ADD CONSTRAINT `keyy1` FOREIGN KEY (`idNV_QL`) REFERENCES `nv_ql` (`idNV_QL`);

--
-- Constraints for table `kiemke_tb`
--
ALTER TABLE `kiemke_tb`
  ADD CONSTRAINT `forkey1` FOREIGN KEY (`idkk`) REFERENCES `kiemke` (`idkk`),
  ADD CONSTRAINT `forkey2` FOREIGN KEY (`idTB`) REFERENCES `thietbi` (`idthietbi`);

--
-- Constraints for table `thietbi`
--
ALTER TABLE `thietbi`
  ADD CONSTRAINT `key2` FOREIGN KEY (`idPhongban`) REFERENCES `phongbann` (`idPhongban`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
