-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th12 01, 2017 lúc 09:08 SA
-- Phiên bản máy phục vụ: 10.1.21-MariaDB
-- Phiên bản PHP: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `qltruong-tieu-hoc-4`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `buoihoc`
--

CREATE TABLE `buoihoc` (
  `thoikhoabieu_id` int(255) NOT NULL,
  `thoigianbieu_id` int(255) NOT NULL,
  `thu` int(255) NOT NULL,
  `monhoc_id` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `buoihoc`
--

INSERT INTO `buoihoc` (`thoikhoabieu_id`, `thoigianbieu_id`, `thu`, `monhoc_id`) VALUES
(105, 1, 1, 10),
(105, 2, 1, 11),
(105, 3, 1, 10),
(105, 4, 1, 11),
(105, 5, 1, 6),
(105, 1, 2, 2),
(105, 2, 2, 1),
(105, 3, 2, 10),
(105, 4, 2, 6),
(105, 5, 2, 9),
(105, 1, 3, 2),
(105, 2, 3, 4),
(105, 3, 3, 5),
(105, 4, 3, 7),
(105, 5, 3, 8),
(105, 1, 4, 1),
(105, 2, 4, 3),
(105, 3, 4, 9),
(105, 4, 4, 9),
(105, 5, 4, 10),
(105, 1, 5, 2),
(105, 2, 5, 1),
(105, 3, 5, 10),
(105, 4, 5, 9),
(105, 5, 5, 8),
(108, 1, 1, 1),
(108, 2, 1, 2),
(108, 3, 1, 3),
(108, 4, 1, 4),
(108, 5, 1, 5),
(108, 1, 2, 6),
(108, 2, 2, 7),
(108, 3, 2, 8),
(108, 4, 2, 9),
(108, 5, 2, 9),
(108, 1, 3, 10),
(108, 2, 3, 11),
(108, 3, 3, 2),
(108, 4, 3, 11),
(108, 5, 3, 10),
(108, 1, 4, 2),
(108, 2, 4, 7),
(108, 3, 4, 11),
(108, 4, 4, 10),
(108, 5, 4, 6),
(108, 1, 5, 4),
(108, 2, 5, 2),
(108, 3, 5, 3),
(108, 4, 5, 8),
(108, 5, 5, 11);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `dantoc`
--

CREATE TABLE `dantoc` (
  `id` int(255) NOT NULL,
  `ten` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `dantoc`
--

INSERT INTO `dantoc` (`id`, `ten`) VALUES
(1, 'Kinh'),
(2, 'Thái'),
(3, 'Tày'),
(4, 'Mường'),
(5, 'Khơ Me'),
(6, 'HMông'),
(7, 'Nùng'),
(8, 'Hoa'),
(9, 'Gia Rai'),
(10, 'Ba Na'),
(11, 'Chăm'),
(12, 'Ê Đê');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `diem`
--

CREATE TABLE `diem` (
  `id` int(255) NOT NULL,
  `hocsinh_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `monhoc_id` int(255) NOT NULL,
  `namhoc_id` int(255) NOT NULL,
  `hocky_id` int(255) NOT NULL,
  `lop_id` int(255) NOT NULL,
  `loaidiem_id` int(255) NOT NULL,
  `diem` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `diem`
--

INSERT INTO `diem` (`id`, `hocsinh_id`, `monhoc_id`, `namhoc_id`, `hocky_id`, `lop_id`, `loaidiem_id`, `diem`) VALUES
(1, '1', 6, 6, 1, 1, 1, 0),
(2, '1', 6, 6, 1, 1, 1, 0),
(3, '1', 6, 6, 1, 1, 3, 0),
(4, '2', 6, 6, 1, 1, 3, 3),
(5, '2', 6, 6, 1, 1, 2, 2),
(6, '2', 6, 6, 1, 1, 1, 1),
(7, '123456794', 1, 6, 1, 1, 1, -1),
(8, '98765432', 1, 6, 1, 1, 1, 0),
(9, '123456794', 2, 6, 1, 1, 1, 0),
(10, '22', 1, 6, 1, 1, 1, 1),
(11, '22', 1, 6, 1, 1, 2, -1),
(12, '22', 1, 6, 1, 1, 3, -1),
(13, '2', 1, 5, 1, 2, 1, 2),
(14, '2', 1, 5, 1, 2, 2, 3),
(15, '2', 1, 5, 1, 2, 3, 4),
(16, '123456796', 1, 6, 1, 1, 1, 0),
(17, '38', 1, 5, 1, 2, 1, 1),
(18, '38', 1, 5, 1, 2, 2, 2),
(19, '38', 1, 5, 1, 2, 3, 5),
(20, '2', 1, 6, 1, 2, 1, 1),
(21, '2', 1, 6, 1, 2, 2, 2),
(22, '2', 1, 6, 1, 2, 3, 3),
(23, '38', 1, 6, 1, 2, 1, 1),
(24, '38', 1, 6, 1, 2, 2, 2),
(25, '38', 1, 6, 1, 2, 3, 3),
(26, '20', 1, 6, 1, 3, 1, 2),
(27, '20', 1, 6, 1, 3, 2, 2),
(28, '20', 1, 6, 1, 3, 3, 3),
(29, '29', 1, 6, 1, 3, 1, 1),
(30, '29', 1, 6, 1, 3, 2, 2),
(31, '29', 1, 6, 1, 3, 3, 3),
(35, '31', 1, 6, 1, 3, 1, 8),
(36, '31', 1, 6, 1, 3, 2, 8),
(37, '31', 1, 6, 1, 3, 3, 8),
(41, '28', 1, 6, 1, 3, 1, 2),
(42, '28', 1, 6, 1, 3, 2, 0),
(43, '28', 1, 6, 1, 3, 3, 3),
(44, '30', 1, 6, 1, 3, 1, 0),
(45, '30', 1, 6, 1, 3, 2, 0),
(46, '30', 1, 6, 1, 3, 3, 0),
(47, '28', 2, 6, 1, 3, 1, 1),
(48, '28', 2, 6, 1, 3, 2, 2),
(49, '28', 2, 6, 1, 3, 3, 3),
(50, '29', 2, 6, 1, 3, 1, 5),
(51, '29', 2, 6, 1, 3, 2, 5),
(52, '29', 2, 6, 1, 3, 3, 0),
(53, '30', 2, 6, 1, 3, 1, 1),
(54, '30', 2, 6, 1, 3, 2, 2),
(55, '30', 2, 6, 1, 3, 3, 6),
(56, '31', 2, 6, 1, 3, 1, 1),
(57, '31', 2, 6, 1, 3, 2, 0),
(58, '31', 2, 6, 1, 3, 3, 10);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `diemdanh`
--

CREATE TABLE `diemdanh` (
  `id` int(255) NOT NULL,
  `hocsinh_id` int(255) NOT NULL,
  `lop_id` int(255) NOT NULL,
  `hocky_id` int(255) NOT NULL,
  `namhoc_id` int(255) NOT NULL,
  `ngayvang` date NOT NULL,
  `ghichu` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `diemdanh`
--

INSERT INTO `diemdanh` (`id`, `hocsinh_id`, `lop_id`, `hocky_id`, `namhoc_id`, `ngayvang`, `ghichu`) VALUES
(7, 5, 15, 1, 1, '2017-10-20', 'sfdh'),
(8, 17, 13, 1, 6, '2017-10-20', 'dèdefg'),
(10, 38, 1, 2, 6, '2017-11-11', 'ok'),
(11, 38, 1, 2, 6, '2017-11-11', 'ok'),
(13, 2, 2, 1, 6, '2017-11-26', 'abc'),
(14, 38, 2, 1, 6, '2017-11-26', 'bcd123'),
(15, 2, 2, 1, 6, '2017-11-26', 'hhh'),
(16, 38, 2, 1, 6, '2017-11-26', 'abc'),
(17, 28, 3, 1, 6, '2017-12-01', 'nghỉ ok'),
(18, 29, 3, 1, 6, '2017-12-01', 'ok'),
(19, 31, 3, 1, 6, '2017-12-01', 'not ok');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `giaovien`
--

CREATE TABLE `giaovien` (
  `id` int(255) NOT NULL,
  `hoten` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `huyen_id` int(255) NOT NULL,
  `sodienthoai` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `loaimonhoc_id` int(255) NOT NULL,
  `gioitinh` int(1) NOT NULL,
  `ngaysinh` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `giaovien`
--

INSERT INTO `giaovien` (`id`, `hoten`, `huyen_id`, `sodienthoai`, `loaimonhoc_id`, `gioitinh`, `ngaysinh`) VALUES
(1003, 'Nguyễn Mai An', 3, '123456789', 1, 0, '1996-05-26'),
(1004, 'Nguyễn Vĩ', 1, '', 2, 0, '1998-01-03'),
(1005, 'Nguyễn An Hạnh', 8, '0123456221', 2, 1, '1997-06-21'),
(1006, 'Hồ Khải Sinh', 9, '0123456221', 3, 1, '1997-05-29'),
(1007, 'Hồ Hải Nghĩa', 1, '', 3, 0, '1996-03-25'),
(1008, 'Lý Lam', 1, '0123456221', 2, 0, '1996-02-07'),
(1009, 'Trần Văn Giáp', 11, '0134456221', 2, 1, '1995-02-12'),
(1010, 'Lý Văn Tuất', 54, '0123456221', 2, 0, '1997-03-21'),
(1011, 'Hồ Hợi', 11, '0123456221', 3, 0, '1998-12-17'),
(1012, 'Đinh Văn Phùng', 1, '', 2, 0, '1995-08-08'),
(1013, 'Mai Thị Tuyết', 78, '0123456221', 1, 0, '1997-03-14'),
(1014, 'Trần Lâm Lang', 9, '0123456221', 2, 0, '1995-12-20'),
(1111, 'Trần Tình', 11, '0123456221', 2, 1, '1999-04-11'),
(1112, 'Thu Hiếu', 1, '0979241562', 1, 1, '2017-11-07');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `gioithieu`
--

CREATE TABLE `gioithieu` (
  `id` int(255) NOT NULL,
  `ten` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `mota` text COLLATE utf8_unicode_ci NOT NULL,
  `active` int(10) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `gioithieu`
--

INSERT INTO `gioithieu` (`id`, `ten`, `mota`, `active`) VALUES
(1, 'THÔNG ĐIỆP TỪ\r\nLÃNH ĐẠO NHÀ TRƯỜNG', '<p>Quý phụ huynh và các em học sinh thân mến!</p>\r\n				<p>Hệ thống Trường tiểu học HQHDH theo đuổi tầm\r\n					nhìn trở thành một hệ thống trường học xuất sắc, không ngừng lớn\r\n					mạnh - nơi cung cấp cho học sinh nền tảng học vấn vững chắc, thông\r\n					qua sự kết hợp hài hòa Chương trình Giáo dục Quốc gia với Chương\r\n					trình Giáo dục Quốc tế Cambridge, giúp các em sẵn sàng đương đầu\r\n					với thử thách của cuộc sống cũng như thành công ở những bậc học cao\r\n					hơn, đồng thời vẫn gìn giữ những giá trị văn hóa, truyền thống của\r\n					dân tộc.</p>\r\n				<p>Để đạt được tầm nhìn quan trọng trên, HQHDH đã và đang xây dựng\r\n					một đội ngũ vững mạnh các giáo viên, nhân viên, các nhà quản lý\r\n					trong và ngoài nước có trình độ chuyên môn cao, giàu kinh nghiệm và\r\n					nhiệt huyết, góp phần thực hiện một cách hiệu quả những chương\r\n					trình giáo dục mà HQHDH đã cam kết. Ngoài ra, HQHDH hướng đến việc giao\r\n					tiếp thường xuyên với Phụ huynh, khuyến khích tối đa sự đồng hành\r\n					của Phụ huynh nhằm tạo nên một mối gắn kết chặt chẽ mà ở đó, Phụ\r\n					huynh đóng vai trò hỗ trợ đắc lực, giúp cho giáo viên có thể phát\r\n					triển tối đa tiềm năng của học sinh.</p>\r\n				<p>Tại HQHDH, chúng tôi hiểu rằng không có gì quan trọng với trẻ\r\n					hơn là cơ hội nhận được nền tảng giáo dục tốt nhất, giúp các em\r\n					thành công trong tương lai. Chúng tôi tự hào HQHDH là nơi mang lại\r\n					cho học sinh những nền tảng này. Chúng tôi áp dụng những phương\r\n					pháo giảng dạy tiên tiến cập nhật nhất nhằm trang bị cho học sinh\r\n					phông văn hóa và kiến thức học thuật vững vàng, song song với những\r\n					kỹ năng sống thực tiễn và những giá trị sống, phẩm chất cá nhân tốt\r\n					đẹp. Chúng tôi cũng hướng đến mục tiêu tạo ra một môi trường học\r\n					đường thoải mái, lành mạnh và an toàn, nơi mà mỗi học sinh đều có\r\n					những trải nghiệm thú vị và có cơ hội thể hiện lòng tốt, tình yêu\r\n					thương và sự tôn trọng, nơi mà các em được khích lệ một cách tích\r\n					cực để thể hiện tối đa khả năng thiên phú của mình. Chương trình\r\n					Giá trị Cốt lõi của HQHDH sẽ hỗ trợ mục tiêu trên và được nêu rõ\r\n					trong tài liệu này.</p>\r\n				<p>Chúng tôi cũng mong muốn mỗi học sinh đều đạt được những\r\n					thành tích học tập tốt và ngày càng trưởng thành về mặt trí tuệ\r\n					cũng như xã hội. Chúng tôi tin tưởng rằng những tài năng trẻ ngày\r\n					hôm nay sẽ gặt hái thành công rạng rỡ trong tương lai khi các em\r\n					được trang bị một nền tảng giáo dục tốt ngay từ khi còn nhỏ. Chúng\r\n					tôi hy vọng rằng thời gian các em học tập tại HQHDH sẽ là khoảng thời\r\n					gian đẹp nhất và đáng nhớ nhất trong suốt quãng đời học sinh của\r\n					các em.</p>\r\n				<p>Bùi Ngọc Quốc</p>\r\n				<p>Hiệu trưởng HQHDH.</p>', 1),
(2, 'GIỚI THIỆU', 'Hệ thống trường tiểu học HQHDH được thành\r\n								lập vào năm 2017, đào tạo từ bậc mầm non đến hết bậc phổ thông\r\n								trung học. HQHDH được chính phủ Việt Nam cấp phép hoạt động và nằm\r\n								trong hệ thống giáo dục quốc gia. Hiện HQHDH đang giảng dạy hơn\r\n								6.300 học sinh từ mầm non đến lớp 12 tại 7 cơ sở nằm ở thành phố\r\n								Đà Nẵng.', 0),
(3, 'Tầm nhìn', 'Trở thành một hệ thống trường học xuất sắc và không ngừng\r\n							phát triển – nơi trang bị cho học sinh nền tảng vững vàng thông\r\n							qua sự kết hợp hài hòa giữa Chương trình Giáo dục Quốc gia và\r\n							Chương trình Giáo dục Quốc tế, giúp các em thành công ở các bậc\r\n							học cao hơn và trong cuộc sống, đồng thời vẫn gìn giữ những giá\r\n							trị truyền thống của Việt Nam.', 0),
(4, 'Sứ mệnh', '<ul>\r\n							<li>HQHDH sẽ xác định một cách rõ ràng các giá trị cốt lõi và\r\n								tạo điều kiện tốt nhất cho tất cả các bên liên quan cống hiến\r\n								nhằm đạt được tiêu chuẩn cao nhất của mỗi giá trị trên tinh thần\r\n								cải tiến liên tục.&nbsp;</li>\r\n							<li>HQHDH sẽ kết hợp giảng dạy hài hòa Chương trình Giáo dục\r\n								Quốc gia và Chương trình Giáo dục Quốc tế, giúp học sinh thông\r\n								thạo cả tiếng Việt và tiếng Anh.&nbsp;</li>\r\n							<li>HQHDH sẽ xây dựng một tập thể xuất sắc các nhà quản lý,\r\n								giáo viên và nhân viên trong nước và quốc tế - những người thực\r\n								hiện một cách nhiệt huyết và hiệu quả những chương trình giáo\r\n								dục của HQHDH.</li>\r\n							<li>&nbsp;HQHDH sẽ liên tục xây dựng mối giao tiếp thường\r\n								xuyên và quan hệ gắn kết với phụ huynh mà ở đó phụ huynh đóng\r\n								vai trò hỗ trợ đắc lực, giúp giáo viên phát triển tối đa tiềm\r\n								năng của học sinh.&nbsp;</li>\r\n							<li>HQHDH sẽ thu hút ngày càng nhiều học sinh cũng như mở rộng\r\n								số lượng cơ sở giáo dục trên nền tảng của trách nhiệm và phát\r\n								triển bền vững.</li>\r\n						</ul>', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hanhkiem`
--

CREATE TABLE `hanhkiem` (
  `id` int(255) NOT NULL,
  `ten` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `hanhkiem`
--

INSERT INTO `hanhkiem` (`id`, `ten`) VALUES
(1, 'Tốt'),
(2, 'Khá'),
(3, 'Trung bình'),
(4, 'Yếu');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hoatdong`
--

CREATE TABLE `hoatdong` (
  `id` int(255) NOT NULL,
  `ten` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `mota` text COLLATE utf8_unicode_ci NOT NULL,
  `hinh` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `ngay` date NOT NULL,
  `active` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `hoatdong`
--

INSERT INTO `hoatdong` (`id`, `ten`, `mota`, `hinh`, `ngay`, `active`) VALUES
(1, 'HỘI THI VIẾT CHỮ ĐẸP', 'Việc luyện viết chữ đẹp là luyện cho mỗi người đức tính cẩn thận, kiên trì và nâng cao năng khiếu thẩm mỹ, óc quan sát, sáng tạo. Hơn bao giờ hết, các cô giáo, thầy giáo phải lấy mình làm gương trong việc tự tạo thói quen viết chữ đẹp, rèn giũa nét chữ để dìu dắt, hướng dẫn học trò, nhất là đối với những nét bút đầu đời của học sinh.Quan trọng là phải giúp các em nắm vững tất cả các nét cơ bản, sau đó hướng dẫn, định hướng cho các em viết những nét sáng tạo. Rèn chữ cho học sinh phải thật sự kiên trì và nhẫn nại, nhất là khi sửa đổi cho các em từ nét này sang nét khác.\r\n    Nét hấp dẫn của hội thi lần này là phần thi thực hành viết bảng của giáo viên. Với thời gian 10 phút, các giáo viên rất nhanh nhẹn thể hiện một đoạn văn, một đoạn thơ để thể hiện kỹ năng viết chữ.\r\n    Được tận mắt xem các giáo viên thể hiện phần thi, mới thấy được để có nét chữ đẹp cần rất nhiều yếu tố, từ tư thế viết, cách cầm phấn cho đến việc điều chỉnh nét bút liền mạch, điêu luyện.\r\n    Hội thi viết chữ đẹp là cơ hội để các thí sinh trau dồi kỹ năng viết chữ đẹp, gìn giữ vở sạch, tạo khí thế thi đua sôi nổi. Bởi muốn viết được một nét chữ đẹp phải trải qua một quá trình dày công khổ luyện.\r\n    Từ quá trình đó, các em sẽ hình thành đức tính kiên trì, bền bỉ, sáng tạo, biết nhận thức cái đẹp cùng với thói quen cần mẫn, chăm chỉ. Đây chính là thước đo văn hoá và trí tuệ trong quá trình phát triển của học sinh.\r\n    Có thể thấy, chất lượng của hội thi được khẳng định khi không chỉ khơi dậy tình yêu tiếng Việt ở các em học sinh mà cả thầy, cô giáo. Duy trì hội thi hằng năm cũng nhằm mục đích thực hiện phong trào “Xây dựng trường học thân thiện, học sinh tích cực” và góp phần nâng cao chất lượng giáo dục. ', 'http://dantricdn.com/xyBCccccccccccccmEeWt12a5GNDTc/Image/2015/07/tqt-80023-572da.jpg', '2017-10-20', 1),
(2, 'NGHỈ HÈ: LÀM SAO ĐỂ VỪA CHƠI VỪA HỌC?', 'Nghỉ hè: Làm sao để vừa chơi vừa học?. Kỳ nghỉ hè sắp đến gần, nhiều phụ huynh bắt đầu lên kế hoạch hè cho con em mình. Làm sao để các con vừa được vui chơi thỏa thích, bổ sung kiến thức, các kỹ năng còn thiếu mà cha mẹ vẫn có thể quản lý tốt các con với quỹ thời gian ít ỏi của mình?\r\nTheo các chuyên gia tâm lý học, những năm gần đây, kỳ nghỉ hè của các em học sinh Việt Nam, đặc biệt là các em học sinh ở thành phố, đã trở thành \"kỳ học thứ 3\". Thực tế, các em có thể học được rất nhiều điều lý thú và bổ ích trong thời gian này một cách không gượng ép nếu các bậc cha mẹ biết lắng nghe tâm lý của các em, hướng các em tới niềm say mê, yêu thích và đặt việc học vào một môi trường mở, gần gũi với thiên nhiên cũng như môi trường giao tiếp xung quanh.\r\nÔng Garrath Bell, Giám đốc Đào tạo của Trung tâm Giáo dục và đào tạo Úc (ACET) đã trải nghiệm rất nhiều chương trình học hè khác nhau tại Úc, Hàn Quốc và Việt Nam. Theo ông, mùa hè là thời điểm rất tốt để tạo cơ hội cho học sinh tập trung vào các khóa học Anh ngữ của mình và được \"tắm\" mình trong môi trường tiếng Anh. Song để đạt được hiệu quả cao nhất, một khóa học Anh ngữ cần phải cân bằng giữa học và các hoạt động ngoại khóa như dã ngoại, câu lạc bộ kỹ năng và các dự án nhóm để các em đồng thời phát triển được khả năng giao tiếp, hợp tác, sáng tạo và tư duy phản biện.\r\n \r\n\r\nVới hơn 10 năm uy tín trong Đào tạo chương trình tiếng Anh chất lượng cao tại tại Việt Nam, và đã giúp cho hàng ngàn học viên thành công để chuẩn bị du học và theo học ở các Học viện ở nước ngoài và các Học viện Quốc tế tại Việt Nam, ACET đã đầu tư xây dựng chương trình Anh ngữ FIRST STEPS để có thể đáp ứng được nhu cầu về chất lượng cũng như phù hợp với tâm lý lứa tuổi học sinh cấp 2. Chương trình First Steps được xây dựng một cách công phu với Phiên Bản Mùa Hè Nước Úc, với hy vọng mang đến cho các em học sinh cấp 2 một trải nghiệm “Học Mà Chơi” hoàn toàn khác biệt, một trải nghiệm về một mùa hè nước Úc ngay tại Việt Nam.', 'http://dantricdn.com/xyBCccccccccccccmEeWt12a5GNDTc/Image/2015/07/tqt-80023-572da.jpg', '2017-10-20', 0),
(3, 'THÔNG TIN THAM KHẢO VỀ HỆ THỐNG GIÁO DỤC VIỆT NAM', 'Giáo dục cấp nhà trẻ - mẫu giáo\r\nNhà trẻ và mẫu giáo dành cho trẻ từ 3 đến 6 tuổi với mục đích hình thành tư duy cho trẻ. Tạo những thói quen, tập tính ngay trong giai đoạn này.\r\n \r\n     Giáo dục cơ bản\r\nCấp tiểu học\r\nBắt đầu năm 6 tuổi đến hết năm 11 tuổi. gồm có 5 trình độ, từ lớp 1 đến lớp 5. Đây là cấp học bắt buộc đối với mọi công dân. Học sinh phải học các môn sau: Toán, Tiếng Việt, Tự nhiên và Xã hội (lớp 1, 2, và 3), Khoa học (lớp 4 và 5), Lịch sử (lớp 4 và 5), Địa lý (lớp 4 và 5), Âm nhạc, Mỹ thuật, Đạo đức, Thể dục, Tin học (tự chọn), Tiếng Anh (lớp 3, 4, và 5. Ngoài ra, một số trường cho học sinh học tiếng Anh bắt đầu từ năm lớp 1, lớp 2). Để kết thúc bậc tiểu học, học sinh phải trải qua kỳ thi tốt nghiệp tiểu học.\r\nCấp trung học cơ sở\r\nCấp II gồm có 4 trình độ, từ lớp 6 đến lớp 9, bắt đầu từ 11 đến 15 tuổi. Học sinh đến trường phải học các môn sau: Toán, Vật lý, Hoá học (lớp 8 và 9), Sinh học, Công nghệ, Ngữ văn, Lịch sử, Địa lý, Giáo dục Công dân, Ngoại ngữ (Anh, Pháp, Nga, Trung, Nhật),Thể dục, Âm nhạc, Mỹ thuật, Tin học (máy vi tính hoặc điện toán). Ngoài ra học sinh có thêm một số tiết bắt buộc như: giáo dục ngoài giờ lên lớp, giáo dục hướng nghiệp (lớp 9), sử ca học đường...\r\nGiáo dục tiểu học và giáo dục trung học cơ sở là các cấp học phổ cập.\r\nCấp trung học phổ thông\r\nCấp III gồm 3 trình độ, từ lớp 10 đến lớp 12, bắt đầu từ 15 đến 18 tuổi. Để tốt nghiệp cấp III, học sinh phải tham gia kỳ thi tốt nghiệp trung học phổ thông của Bộ Giáo dục và Đào tạo Việt Nam.\r\n \r\n     Giáo dục chuyên biệt\r\nTrung tâm GDTX\r\nNơi phổ cập giáo dục cho tất cả các lứa tuổi.\r\nTrường giáo dưỡng\r\nĐây là loại hình trường đặc biệt dành cho các thanh thiếu niên hư hỏng, phạm tội. Trong trường, các học sinh này được học văn hoá, được dạy nghề, giáo dục đạo đức để có thể ra trường, về địa phương sau một vài năm.\r\n \r\n     Giáo dục sau phổ thông\r\nTrung cấp, dạy nghề\r\nLà chương trình học dạy nghề dành cho người không đủ điều kiện vào đại học hoặc cao đẳng.\r\nCao đẳng\r\nSinh viên phải tham gia kỳ thi tuyển sinh trực tiếp vào cao đẳng hoặc điểm thi vào đại học thấp hơn điểm quy định nhưng lại đủ để vào cao đẳng thì đăng ký vào học cao đẳng. Chương trình cao đẳng thông thường kéo dài 3 năm. Tuy nhiên, một số trường cao đẳng có thể kéo dài đến 3,5 năm hoặc 4 năm để phù hợp với chương trình học.\r\nĐại học\r\nHọc sinh tốt nghiệp cấp III muốn vào các trường đại học phải tham gia kỳ thi tuyển sinh đại học. Chương trình bậc đại học của Việt Nam kéo dài từ 4 đến 6 năm; 2 năm đầu là chương trình đại học đại cương, 2 (hay 4) năm sau là chương trình chuyên ngành. Dù là ngành gì, sinh viên phải học một số tiết về quốc phòng an ninh.\r\n \r\n     Giáo dục sau đại học\r\nCao học\r\nCác cá nhân sau khi tốt nghiệp đại học, có nhu cầu học cao học, vượt qua kỳ thi tuyển sinh cao học hằng năm sẽ được tham dự các khoá đào tạo cao học. Thời gian đào tạo thường là 3 năm, có thể dài hơn hoặc ngắn hơn phụ thuộc vào quy định của chuyên ngành và của cơ sở đào tạo. Sau khi tốt nghiệp, học viên cao học được cấp bằng thạc sĩ.\r\nNghiên cứu sinh\r\nĐây là bậc đào tạo cao nhất ở Việt Nam hiện nay. Tất cả các cá nhân tốt nghiệp từ đại học trở lên đều có quyền làm nghiên cứu sinh với điều kiện phải vượt qua kỳ thi tuyển nghiên cứu sinh hàng năm. Thời gian làm nghiên cứu sinh thường là 4 năm với người có bằng cử nhân hay kỹ sư và 3 năm với người có bằng thạc sĩ. Sau khi hoàn thành thời gian và bảo vệ thành công luận án, các nghiên cứu sinh sẽ được cấp bằng tiến sĩ.', 'http://imgs.baobacgiang.com.vn/2015/09/16/15/20150916151408-a2.jpg', '2017-10-20', 0),
(4, 'Tổ chức văn nghệ chào mừng ngày 20-10', 'Để chào mừng ngày phụ nữ Việt Nam, nhà trường tổ chức buổi biểu diễn văn nghệ. Yêu cầu học sinh mặc đồng phục, có mặt tại trường vào lúc 8h sáng ngày 20-10', 'http://imgs.baobacgiang.com.vn/2015/09/16/15/20150916151408-a2.jpg', '2017-10-20', 0),
(5, 'Thông báo đăng kí tiết mục văn nghệ chào mừng ngày 20-10', 'Để chào mừng ngày phụ nữ Việt Nam, nhà trường tổ chức buổi biểu diễn văn nghệ. Yêu cầu cac lớp đăng kí dự thi các tiết mục văn nghệ', 'http://imgs.baobacgiang.com.vn/2015/09/16/15/20150916151408-a2.jpg', '2017-10-20', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hocky`
--

CREATE TABLE `hocky` (
  `id` int(255) NOT NULL,
  `ten` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `heso` int(255) NOT NULL,
  `sotuan` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `hocky`
--

INSERT INTO `hocky` (`id`, `ten`, `heso`, `sotuan`) VALUES
(1, 'Học Kì 1', 1, 18),
(2, 'Học Kì 2', 2, 18);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hocluc`
--

CREATE TABLE `hocluc` (
  `id` int(255) NOT NULL,
  `ten` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `diemcantren` float NOT NULL,
  `diemcanduoi` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `hocluc`
--

INSERT INTO `hocluc` (`id`, `ten`, `diemcantren`, `diemcanduoi`) VALUES
(1, 'Giỏi', 10, 8),
(2, 'Khá', 7.9, 6.5),
(3, 'Giỏi', 6.4, 5),
(4, 'Giỏi', 4.9, 3.5);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hocsinh`
--

CREATE TABLE `hocsinh` (
  `id` int(255) NOT NULL,
  `hoten` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `gioitinh` int(1) NOT NULL,
  `ngaysinh` date NOT NULL,
  `huyen_id` int(255) NOT NULL,
  `dantoc_id` int(255) NOT NULL,
  `tongiao_id` int(255) NOT NULL,
  `hotencha` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `nghenghiepcha_id` int(255) NOT NULL,
  `hotenme` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `nghenghiepme_id` int(255) NOT NULL,
  `sodienthoai` varchar(11) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `hocsinh`
--

INSERT INTO `hocsinh` (`id`, `hoten`, `gioitinh`, `ngaysinh`, `huyen_id`, `dantoc_id`, `tongiao_id`, `hotencha`, `nghenghiepcha_id`, `hotenme`, `nghenghiepme_id`, `sodienthoai`) VALUES
(10012, 'Nguyễn Văn Minh', 0, '2010-09-21', 3, 1, 1, 'Nguyễn Văn Bình', 5, 'Lê Minh châu', 5, '123456789'),
(10013, 'Nguyễn Hạnh', 0, '2010-09-21', 1, 1, 1, 'Văn Bình', 1, 'Lê Minh châu', 1, '123456789'),
(10014, 'Lê Minh châu', 1, '2010-09-21', 1, 1, 1, 'Lê châu', 1, 'Trần Lợi', 1, '123456789'),
(10015, 'Trần Lợi', 0, '2010-09-21', 1, 1, 1, 'Trần Lam', 1, 'Vĩnh Phúc', 1, '123456789'),
(10016, 'Trần Sĩ', 0, '2010-09-21', 1, 1, 1, 'Trần Mai', 1, 'Trần Lợi Lộc', 1, '123456789'),
(10017, 'Nguyễn Hạnh Nga', 0, '2010-09-21', 1, 1, 1, 'Văn Bình', 1, 'Lê Minh châu', 1, '123456789'),
(10018, 'Lê Minh Nghĩa', 1, '2010-09-21', 1, 1, 1, 'Lê châu', 1, 'Trần Lợi', 1, '123456789'),
(10019, 'Trần Long', 0, '2010-09-21', 1, 1, 1, 'Trần Lam', 1, 'Vĩnh Phúc', 1, '123456789'),
(10021, 'Nguyễn Anh', 0, '2010-09-21', 1, 1, 1, 'Văn Bình', 1, 'Lê Minh châu', 1, '123456789'),
(10022, 'Lê Minh Lâm', 1, '2010-09-21', 1, 1, 1, 'Lê châu', 1, 'Trần Lợi', 1, '123456789'),
(10023, 'Trần Ngô', 0, '2010-09-21', 1, 1, 1, 'Trần Lam', 1, 'Vĩnh Phúc', 1, '123456789'),
(10024, 'Trần Sinh', 0, '2010-09-21', 1, 1, 1, 'Trần Mai', 1, 'Trần Lợi Lộc', 1, '123456789'),
(10025, 'Nguyễn Nga', 1, '2010-09-21', 1, 1, 1, 'Văn Bình', 1, 'Lê Minh châu', 1, '123456789'),
(10026, 'Lê Nghĩa', 0, '2010-09-21', 1, 1, 1, 'Lê châu', 1, 'Trần Lợi', 1, '123456789'),
(10027, 'Trần Long Quyền', 0, '2010-09-21', 1, 1, 1, 'Trần Lam', 1, 'Vĩnh Phúc', 1, '123456789'),
(10028, 'Trần Tâm', 1, '2010-09-21', 1, 1, 1, 'Trần Mai', 1, 'Trần Lợi Lộc', 1, '123456789'),
(10029, 'Nguyễn Anh Tình', 1, '2010-09-21', 1, 1, 1, 'Văn Bình', 1, 'Lê Minh châu', 1, '123456789'),
(10030, 'Lê Minh Tâm', 1, '2010-09-21', 1, 1, 1, 'Lê châu', 1, 'Trần Lợi', 1, '123456789'),
(10031, 'Trần Hoa', 1, '2010-09-21', 1, 1, 1, 'Trần Lam', 1, 'Vĩnh Phúc', 1, '123456789'),
(10032, 'Trần Sinh', 0, '2010-09-21', 1, 1, 1, 'Trần Mai', 1, 'Trần Lợi Lộc', 1, '123456789'),
(10033, 'Nguyễn Thơ', 1, '2010-09-21', 1, 1, 1, 'Văn Bình', 1, 'Lê Minh châu', 1, '123456789'),
(10034, 'Vi Nghĩa', 0, '2010-09-21', 1, 1, 1, 'Lê châu', 1, 'Trần Lợi', 1, '123456789'),
(10035, 'Lê Quyền', 0, '2010-09-21', 1, 1, 1, 'Trần Lam', 1, 'Vĩnh Phúc', 1, '123456789'),
(10037, 'Nguyễn Anh Tình', 1, '2010-03-21', 1, 1, 1, 'Văn Bình', 1, 'Lê Minh châu', 1, '123456789'),
(10038, 'Minh Tâm', 1, '2009-03-31', 1, 1, 1, 'Lê châu', 1, 'Trần Lợi', 1, '123456789'),
(10039, 'Lê Hoa', 1, '2009-03-31', 1, 1, 1, 'Trần Lam', 1, 'Vĩnh Phúc', 1, '123456789'),
(10040, 'Khải Sinh', 0, '2009-03-31', 1, 1, 1, 'Trần Mai', 1, 'Trần Lợi Lộc', 1, '123456789'),
(10041, 'Nguyễn Mai', 1, '2009-03-31', 1, 1, 1, 'Văn Bình', 1, 'Lê Minh châu', 1, '123456789'),
(10042, 'Vi Hòa', 0, '2009-03-31', 1, 1, 1, 'Lê châu', 1, 'Trần Lợi', 1, '123456789'),
(10043, 'Lê Quyền Linh', 0, '2009-03-31', 1, 1, 1, 'Trần Lam', 1, 'Vĩnh Phúc', 1, '123456789'),
(10044, 'Nguyễn Tâm', 1, '2009-03-31', 1, 1, 1, 'Trần Mai', 1, 'Trần Lợi Lộc', 1, '123456789'),
(10045, 'Nguyễn Tình', 1, '2009-03-31', 1, 1, 1, 'Văn Bình', 1, 'Lê Minh châu', 1, '123456789'),
(10046, 'Minh Tâm Anh ', 1, '2009-03-31', 1, 1, 1, 'Lê châu', 1, 'Trần Lợi', 1, '123456789'),
(10047, 'Lê Hoa Hà', 1, '2009-03-31', 1, 1, 1, 'Trần Lam', 1, 'Vĩnh Phúc', 1, '123456789'),
(10048, 'Nguyễn Sinh ', 0, '2009-03-31', 1, 1, 1, 'Trần Mai', 1, 'Trần Lợi Lộc', 1, '123456789'),
(10049, 'Nguyễn Thơ', 1, '2009-03-31', 1, 1, 1, 'Văn Bình', 1, 'Lê Minh châu', 1, '123456789'),
(10050, 'Vi Nghĩa', 0, '2009-03-31', 1, 1, 1, 'Lê châu', 1, 'Trần Lợi', 1, '123456789'),
(10051, 'Lê Quyền', 0, '2009-03-31', 1, 1, 1, 'Trần Lam', 1, 'Vĩnh Phúc', 1, '123456789'),
(10052, 'Nguyễn Trần Tâm', 1, '2009-03-31', 1, 1, 1, 'Trần Mai', 1, 'Trần Lợi Lộc', 1, '123456789'),
(10053, 'Nguyễn Anh Tình', 1, '2009-03-31', 1, 1, 1, 'Văn Bình', 1, 'Lê Minh châu', 1, '123456789'),
(10054, 'Minh Tâm', 1, '2009-03-31', 1, 1, 1, 'Lê châu', 1, 'Trần Lợi', 1, '123456789'),
(10055, 'Lê Hoa', 1, '2009-03-31', 1, 1, 1, 'Trần Lam', 1, 'Vĩnh Phúc', 1, '123456789'),
(10056, 'Khải Sinh', 0, '2009-03-31', 1, 1, 1, 'Trần Mai', 1, 'Trần Lợi Lộc', 1, '123456789'),
(10057, 'Nguyễn Mai', 1, '2009-03-31', 1, 1, 1, 'Văn Bình', 1, 'Lê Minh châu', 1, '123456789'),
(10058, 'Vi Hòa', 0, '2009-03-31', 1, 1, 1, 'Lê châu', 1, 'Trần Lợi', 1, '123456789'),
(10059, 'Lê Quyền Linh', 0, '2009-03-31', 1, 1, 1, 'Trần Lam', 1, 'Vĩnh Phúc', 1, '123456789'),
(10060, 'Nguyễn Tâm', 1, '2009-03-31', 1, 1, 1, 'Trần Mai', 1, 'Trần Lợi Lộc', 1, '123456789'),
(10061, 'Nguyễn Tình', 1, '2009-03-31', 1, 1, 1, 'Văn Bình', 1, 'Lê Minh châu', 1, '123456789'),
(10062, 'Minh Tâm Anh ', 1, '2009-03-31', 1, 1, 1, 'Lê châu', 1, 'Trần Lợi', 1, '123456789'),
(10063, 'Lê Hoa Hà', 1, '2008-02-21', 1, 1, 1, 'Trần Lam', 1, 'Vĩnh Phúc', 1, '123456789'),
(10064, 'Nguyễn Sinh ', 0, '2008-02-21', 1, 1, 1, 'Trần Mai', 1, 'Trần Lợi Lộc', 1, '123456789'),
(10065, 'Lê Nguyễn Thơ', 1, '2008-02-21', 1, 1, 1, 'Văn Bình', 1, 'Lê Minh châu', 1, '123456789'),
(10066, 'Lê Vi Nghĩa', 0, '2008-02-21', 1, 1, 1, 'Lê châu', 1, 'Trần Lợi', 1, '123456789'),
(10067, 'Trần Quyền', 0, '2008-02-21', 1, 1, 1, 'Trần Lam', 1, 'Vĩnh Phúc', 1, '123456789'),
(10068, 'Nguyễn Tâm', 1, '2008-02-21', 1, 1, 1, 'Trần Mai', 1, 'Trần Lợi Lộc', 1, '123456789'),
(10069, 'Trần Anh Tình', 1, '2008-02-21', 1, 1, 1, 'Văn Bình', 1, 'Lê Minh châu', 1, '123456789'),
(10070, 'Minh Tâm', 1, '2008-02-21', 1, 1, 1, 'Lê châu', 1, 'Trần Lợi', 1, '123456789'),
(10071, 'Lê Hoa', 1, '2008-02-21', 1, 1, 1, 'Trần Lam', 1, 'Vĩnh Phúc', 1, '123456789'),
(10072, 'Lê Khải Sinh', 0, '2008-02-21', 1, 1, 1, 'Trần Mai', 1, 'Trần Lợi Lộc', 1, '123456789'),
(10073, 'Nguyễn Mai', 1, '2008-02-21', 1, 1, 1, 'Văn Bình', 1, 'Lê Minh châu', 1, '123456789'),
(10074, 'Lê Vi Hòa', 0, '2008-02-21', 1, 1, 1, 'Lê châu', 1, 'Trần Lợi', 1, '123456789'),
(10075, 'Quyền Linh', 0, '2008-02-21', 1, 1, 1, 'Trần Lam', 1, 'Vĩnh Phúc', 1, '123456789'),
(10076, 'Nguyễn Tâm', 1, '2008-02-21', 1, 1, 1, 'Trần Mai', 1, 'Trần Lợi Lộc', 1, '123456789'),
(10077, 'Trần Tình', 1, '2008-02-21', 1, 1, 1, 'Văn Bình', 1, 'Lê Minh châu', 1, '123456789'),
(10078, 'Minh Tâm Anh ', 1, '2008-02-21', 1, 1, 1, 'Lê châu', 1, 'Trần Lợi', 1, '123456789'),
(10079, 'Lê Hoa Hà', 1, '2008-02-21', 1, 1, 1, 'Trần Lam', 1, 'Vĩnh Phúc', 1, '123456789'),
(10080, 'Lê Sinh ', 0, '2008-02-21', 1, 1, 1, 'Trần Mai', 1, 'Trần Lợi Lộc', 1, '123456789'),
(10081, 'Ngô Nguyễn Thơ', 1, '2008-02-21', 1, 1, 1, 'Văn Bình', 1, 'Ngô Minh châu', 1, '123456789'),
(10082, 'Ngô Vi Nghĩa', 0, '2008-02-21', 1, 1, 1, 'Ngô châu', 1, 'Trần Lợi', 1, '123456789'),
(10083, 'Trần Quyền', 0, '2008-02-21', 1, 1, 1, 'Trần Lam', 1, 'Vĩnh Phúc', 1, '123456789'),
(10084, 'Nguyễn Tâm', 1, '2008-02-21', 1, 1, 1, 'Trần Mai', 1, 'Trần Lợi Lộc', 1, '123456789'),
(10085, 'Trần Anh Tình', 1, '2008-02-21', 1, 1, 1, 'Văn Bình', 1, 'Ngô Minh châu', 1, '123456789'),
(10086, 'Minh Tâm', 1, '2007-05-21', 1, 1, 1, 'Ngô châu', 1, 'Trần Lợi', 1, '123456789'),
(10087, 'Ngô Hoa', 1, '2007-05-21', 1, 1, 1, 'Trần Lam', 1, 'Vĩnh Phúc', 1, '123456789'),
(10088, 'Ngô Khải Sinh', 0, '2007-05-21', 1, 1, 1, 'Trần Mai', 1, 'Trần Lợi Lộc', 1, '123456789'),
(10089, 'Nguyễn Mai', 1, '2007-05-21', 1, 1, 1, 'Văn Bình', 1, 'Ngô Minh châu', 1, '123456789'),
(10090, 'Ngô Vi Hòa', 0, '2007-05-21', 1, 1, 1, 'Ngô châu', 1, 'Trần Lợi', 1, '123456789'),
(10091, 'Quyền Linh', 0, '2007-05-21', 1, 1, 1, 'Trần Lam', 1, 'Vĩnh Phúc', 1, '123456789'),
(10092, 'Nguyễn Tâm', 1, '2007-05-21', 1, 1, 1, 'Trần Mai', 1, 'Trần Lợi Lộc', 1, '123456789'),
(10093, 'Trần Tình', 1, '2007-05-21', 1, 1, 1, 'Văn Bình', 1, 'Ngô Minh châu', 1, '123456789'),
(10094, 'Minh Tâm Anh ', 1, '2007-05-21', 1, 1, 1, 'Ngô châu', 1, 'Trần Lợi', 1, '123456789'),
(10095, 'Ngô Hoa Hà', 1, '2007-05-21', 1, 1, 1, 'Trần Lam', 1, 'Vĩnh Phúc', 1, '123456789'),
(10096, 'Ngô Sinh ', 0, '2007-05-21', 1, 1, 1, 'Trần Mai', 1, 'Trần Lợi Lộc', 1, '123456789'),
(10097, 'Lý Nguyễn Thơ', 1, '2007-05-21', 1, 1, 1, 'Văn Bình', 1, 'Lý Minh châu', 1, '123456789'),
(10098, 'Lý Vi Nghĩa', 0, '2007-05-21', 1, 1, 1, 'Lý châu', 1, 'Trần Lợi', 1, '123456789'),
(10099, 'Trần Quyền', 0, '2007-05-21', 1, 1, 1, 'Trần Lam', 1, 'Vĩnh Phúc', 1, '123456789'),
(10100, 'Nguyễn Tâm', 1, '2007-05-21', 1, 1, 1, 'Trần Mai', 1, 'Trần Lợi Lộc', 1, '123456789'),
(10101, 'Trần Anh Tình', 1, '2007-05-21', 1, 1, 1, 'Văn Bình', 1, 'Lý Minh châu', 1, '123456789'),
(10102, 'Minh Tâm', 1, '2007-05-21', 1, 1, 1, 'Lý châu', 1, 'Trần Lợi', 1, '123456789'),
(10103, 'Lý Hoa', 1, '2007-05-21', 1, 1, 1, 'Trần Lam', 1, 'Vĩnh Phúc', 1, '123456789'),
(10104, 'Lý Khải Sinh', 0, '2007-05-21', 1, 1, 1, 'Trần Mai', 1, 'Trần Lợi Lộc', 1, '123456789'),
(10105, 'Nguyễn Mai', 1, '2006-05-11', 1, 1, 1, 'Văn Bình', 1, 'Lý Minh châu', 1, '123456789'),
(10106, 'Lý Vi Hòa', 0, '2006-05-11', 1, 1, 1, 'Lý châu', 1, 'Trần Lợi', 1, '123456789'),
(10107, 'Quyền Linh', 0, '2006-05-11', 1, 1, 1, 'Trần Lam', 1, 'Vĩnh Phúc', 1, '123456789'),
(10108, 'Nguyễn Tâm', 1, '2006-05-11', 1, 1, 1, 'Trần Mai', 1, 'Trần Lợi Lộc', 1, '123456789'),
(10109, 'Trần Tình', 1, '2006-05-11', 1, 1, 1, 'Văn Bình', 1, 'Lý Minh châu', 1, '123456789'),
(10110, 'Minh Tâm Anh ', 1, '2006-05-11', 1, 1, 1, 'Lý châu', 1, 'Trần Lợi', 1, '123456789'),
(10111, 'Lý Hoa Hà', 1, '2006-05-11', 1, 1, 1, 'Trần Lam', 1, 'Vĩnh Phúc', 1, '123456789'),
(10112, 'Lý Sinh ', 0, '2006-05-11', 1, 1, 1, 'Trần Mai', 1, 'Trần Lợi Lộc', 1, '123456789'),
(10113, 'Hồ Nguyễn Thơ', 1, '2006-05-11', 1, 1, 1, 'Văn Bình', 1, 'Hồ Minh châu', 1, '123456789'),
(10114, 'Hồ Vi Nghĩa', 0, '2006-05-11', 1, 1, 1, 'Hồ châu', 1, 'Trần Lợi', 1, '123456789'),
(10115, 'Trần Quyền', 0, '2006-05-11', 1, 1, 1, 'Trần Lam', 1, 'Vĩnh Phúc', 1, '123456789'),
(10116, 'Nguyễn Tâm', 1, '2006-05-11', 1, 1, 1, 'Trần Mai', 1, 'Trần Lợi Lộc', 1, '123456789'),
(10117, 'Trần Anh Tình', 1, '2006-05-11', 1, 1, 1, 'Văn Bình', 1, 'Hồ Minh châu', 1, '123456789'),
(10118, 'Minh Tâm', 1, '2006-05-11', 1, 1, 1, 'Hồ châu', 1, 'Trần Lợi', 1, '123456789'),
(10119, 'Hồ Hoa', 1, '2006-05-11', 1, 1, 1, 'Trần Lam', 1, 'Vĩnh Phúc', 1, '123456789'),
(10120, 'Hồ Khải Sinh', 0, '2006-05-11', 1, 1, 1, 'Trần Mai', 1, 'Trần Lợi Lộc', 1, '123456789'),
(10121, 'Nguyễn Mai', 1, '2006-05-11', 1, 1, 1, 'Văn Bình', 1, 'Hồ Minh châu', 1, '123456789'),
(10122, 'Hồ Vi Hòa', 0, '2006-05-11', 1, 1, 1, 'Hồ châu', 1, 'Trần Lợi', 1, '123456789'),
(10123, 'Quyền Linh', 0, '2006-05-11', 1, 1, 1, 'Trần Lam', 1, 'Vĩnh Phúc', 1, '123456789'),
(10124, 'Nguyễn Tâm', 1, '2006-05-11', 1, 1, 1, 'Trần Mai', 1, 'Trần Lợi Lộc', 1, '123456789'),
(10125, 'Trần Tình', 1, '2006-05-11', 1, 1, 1, 'Văn Bình', 1, 'Hồ Minh châu', 1, '123456789'),
(10126, 'Minh Tâm Anh ', 1, '2006-05-11', 1, 1, 1, 'Hồ châu', 1, 'Trần Lợi', 1, '123456789'),
(10127, 'Hồ Hoa Hà', 1, '2006-05-11', 1, 1, 1, 'Trần Lam', 1, 'Vĩnh Phúc', 1, '123456789'),
(10128, 'Hồ Sinh ', 0, '2006-05-11', 1, 1, 1, 'Trần Mai', 1, 'Trần Lợi Lộc', 1, '123456789'),
(10129, 'abcdemo', 0, '2017-11-30', 12, 1, 3, 'abc', 1, 'abc', 1, '0979241562'),
(21111, 'Nguyễn Văn An', 0, '2010-09-21', 4, 3, 2, 'Nguyễn Văn Bình', 1, 'Lê Minh châu', 1, '123456789');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hocsinhthoihoc`
--

CREATE TABLE `hocsinhthoihoc` (
  `hocsinh_id` int(255) NOT NULL,
  `ngaythoihoc` date NOT NULL,
  `ghichu` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `hocsinhthoihoc`
--

INSERT INTO `hocsinhthoihoc` (`hocsinh_id`, `ngaythoihoc`, `ghichu`) VALUES
(10023, '2017-09-22', 'Chuyển trường');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `huyen`
--

CREATE TABLE `huyen` (
  `id` int(11) NOT NULL,
  `ten` varchar(100) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `tinh_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `huyen`
--

INSERT INTO `huyen` (`id`, `ten`, `tinh_id`) VALUES
(1, 'Thành phố Long Xuyên', 2),
(2, 'Thị xã Châu Đốc', 2),
(3, 'Huyện An Phú', 2),
(4, 'Huyện Tân Châu', 2),
(5, 'Huyện Phú Tân', 2),
(6, 'Huyện Tịnh Biên', 2),
(7, 'Huyện Tri Tôn', 2),
(8, 'Huyện Châu Phú', 2),
(9, 'Huyện Chợ Mới', 2),
(10, 'Huyện Châu Thành', 2),
(11, 'Huyện Thoại Sơn', 2),
(12, 'Thành phố Vũng Tàu', 3),
(13, 'Thị xã Bà Rịa', 3),
(14, 'Huyện Xuyên Mộc', 3),
(15, 'Huyện Long Điền', 3),
(16, 'Huyện Côn Đảo', 3),
(17, 'Huyện Tân Thành', 3),
(18, 'Huyện Châu Đức', 3),
(19, 'Huyện Đất Đỏ', 3),
(20, 'Thị xã Thủ Dầu Một', 4),
(21, 'Huyện Bến Cát', 4),
(22, 'Huyện Tân Uyên', 4),
(23, 'Huyện Thuận An', 4),
(24, 'Huyện Dĩ An', 4),
(25, 'Huyện Phú Giáo', 4),
(26, 'Huyện Dầu Tiếng', 4),
(27, 'Thị xã Đồng Xoài', 5),
(28, 'Huyện Đồng Phú', 5),
(29, 'Huyện Chơn Thành', 5),
(30, 'Huyện Bình Long', 5),
(31, 'Huyện Lộc Ninh', 5),
(32, 'Huyện Bù Đốp', 5),
(33, 'Huyện Phước Long', 5),
(34, 'Huyện Bù Đăng', 5),
(35, 'Thành phố Phan Thiết', 6),
(37, 'Huyện Tuy Phong', 6),
(38, 'Huyện Bắc Bình', 6),
(39, 'Huyện Hàm Thuận Bắc', 6),
(40, 'Huyện Hàm Thuận Nam', 6),
(41, 'Huyện Hàm Tân', 6),
(42, 'Huyện Đức Linh', 6),
(43, 'Huyện Tánh Linh', 6),
(44, 'Huyện đảo Phú Quý', 6),
(45, 'Thị xã LaGi', 6),
(46, 'Thành phố Quy Nhơn', 7),
(47, 'Huyện An Lão', 7),
(48, 'Huyện Hoài Ân', 7),
(49, 'Huyện Hoài Nhơn', 7),
(50, 'Huyện Phù Mỹ', 7),
(51, 'Huyện Phù Cát', 7),
(52, 'Huyện Vĩnh Thạnh', 7),
(53, 'Huyện Tây Sơn', 7),
(54, 'Huyện Vân Canh', 7),
(55, 'Huyện An Nhơn', 7),
(56, 'Huyện Tuy Phước', 7),
(57, 'Thành phố Bắc Giang', 8),
(58, 'Huyện Yên Thế', 8),
(59, 'Huyện Lục Ngạn', 8),
(60, 'Huyện Sơn Động', 8),
(61, 'Huyện Lục Nam', 8),
(62, 'Huyện Tân Yên', 8),
(63, 'Huyện Hiệp Hoà', 8),
(64, 'Huyện Lạng Giang', 8),
(65, 'Huyện Việt Yên', 8),
(66, 'Huyện Yên Dũng', 8),
(67, 'Thị xã Bắc Kạn', 9),
(68, 'Huyện Chợ Đồn', 9),
(69, 'Huyện Bạch Thông', 9),
(70, 'Huyện Na Rì', 9),
(71, 'Huyện Ngân Sơn', 9),
(72, 'Huyện Ba Bể', 9),
(73, 'Huyện Chợ Mới', 9),
(74, 'Huyện Pác Nặm', 9),
(75, 'Thành phố Bắc Ninh', 10),
(76, 'Huyện Yên Phong', 10),
(77, 'Huyện Quế Võ', 10),
(78, 'Huyện Tiên Du', 10),
(79, 'Huyện Từ Sơn', 10),
(80, 'Huyện Thuận Thành', 10),
(81, 'Huyện Gia Bình', 10),
(82, 'Huyện Lương Tài', 10);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `ketqua`
--

CREATE TABLE `ketqua` (
  `id` int(255) NOT NULL,
  `ten` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khoilop`
--

CREATE TABLE `khoilop` (
  `id` int(255) NOT NULL,
  `ten` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `khoilop`
--

INSERT INTO `khoilop` (`id`, `ten`) VALUES
(1, 'Khối lớp 1'),
(2, 'Khối lớp 2'),
(3, 'Khối lớp 3'),
(4, 'Khối lớp 4'),
(5, 'Khối lớp 5');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `kq_ca_nam_mon_hoc`
--

CREATE TABLE `kq_ca_nam_mon_hoc` (
  `hocsinh_id` int(255) NOT NULL,
  `monhoc_id` int(255) NOT NULL,
  `namhoc_id` int(255) NOT NULL,
  `lop_id` int(255) NOT NULL,
  `dtb_ca_nam` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `kq_ca_nam_mon_hoc`
--

INSERT INTO `kq_ca_nam_mon_hoc` (`hocsinh_id`, `monhoc_id`, `namhoc_id`, `lop_id`, `dtb_ca_nam`) VALUES
(2, 1, 5, 2, 4),
(38, 1, 5, 2, 5);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `kq_ca_nam_tong_hop`
--

CREATE TABLE `kq_ca_nam_tong_hop` (
  `hocsinh_id` int(255) NOT NULL,
  `lop_id` int(255) NOT NULL,
  `namhoc_id` int(255) NOT NULL,
  `hocluc_id` int(255) NOT NULL DEFAULT '0',
  `hanhkiem_id` int(255) NOT NULL,
  `dtb_ca_nam` float NOT NULL,
  `ketqua_id` int(255) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `kq_hoc_ky_mon_hoc`
--

CREATE TABLE `kq_hoc_ky_mon_hoc` (
  `hocsinh_id` int(255) NOT NULL,
  `monhoc_id` int(255) NOT NULL,
  `namhoc_id` int(255) NOT NULL,
  `hocky_id` int(255) NOT NULL,
  `lop_id` int(255) NOT NULL,
  `dtb` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `kq_hoc_ky_mon_hoc`
--

INSERT INTO `kq_hoc_ky_mon_hoc` (`hocsinh_id`, `monhoc_id`, `namhoc_id`, `hocky_id`, `lop_id`, `dtb`) VALUES
(2, 1, 5, 1, 2, 3.33),
(2, 1, 5, 2, 2, 3),
(2, 1, 6, 1, 2, 2.33),
(20, 1, 6, 1, 3, 2.5),
(28, 1, 6, 1, 3, 1.83),
(29, 1, 6, 1, 3, 2.33),
(30, 1, 6, 1, 3, 0),
(31, 1, 6, 1, 3, 8),
(38, 1, 5, 1, 2, 3.33),
(38, 1, 5, 2, 2, 3),
(38, 1, 6, 1, 2, 2.33),
(28, 2, 6, 1, 3, 2.33),
(29, 2, 6, 1, 3, 2.5),
(30, 2, 6, 1, 3, 3.83),
(31, 2, 6, 1, 3, 5.17),
(28, 2, 6, 1, 3, 2.33),
(29, 2, 6, 1, 3, 2.5),
(30, 2, 6, 1, 3, 3.83),
(31, 2, 6, 1, 3, 5.17),
(28, 2, 6, 1, 3, 2.33),
(29, 2, 6, 1, 3, 2.5),
(30, 2, 6, 1, 3, 3.83),
(31, 2, 6, 1, 3, 5.17);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `kq_hoc_ky_tong_hop`
--

CREATE TABLE `kq_hoc_ky_tong_hop` (
  `hocsinh_id` int(255) NOT NULL,
  `lop_id` int(255) NOT NULL,
  `namhoc_id` int(255) NOT NULL,
  `hocky_id` int(255) NOT NULL,
  `hocluc_id` int(255) NOT NULL DEFAULT '0',
  `hanhkiem_id` int(255) NOT NULL,
  `dtb_mon_hoc_ky` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `lienhe`
--

CREATE TABLE `lienhe` (
  `id` int(255) NOT NULL,
  `hoten` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `sodienthoai` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `noidung` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `loaidiem`
--

CREATE TABLE `loaidiem` (
  `id` int(255) NOT NULL,
  `ten` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `heso` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `loaidiem`
--

INSERT INTO `loaidiem` (`id`, `ten`, `heso`) VALUES
(1, 'Hệ số 1', 1),
(2, 'Hệ số 2', 2),
(3, 'Hệ số 3', 3);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `loaimonhoc`
--

CREATE TABLE `loaimonhoc` (
  `id` int(255) NOT NULL,
  `ten` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `loaimonhoc`
--

INSERT INTO `loaimonhoc` (`id`, `ten`) VALUES
(1, 'Môn chủ nhiệm'),
(2, 'Ngoại ngữ'),
(3, 'Giáo dục thể chất');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `loainguoidung`
--

CREATE TABLE `loainguoidung` (
  `MaLoaiNguoiDung` int(255) NOT NULL,
  `TenLoaiNguoiDung` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `loainguoidung`
--

INSERT INTO `loainguoidung` (`MaLoaiNguoiDung`, `TenLoaiNguoiDung`) VALUES
(1, 'Admin'),
(2, 'Học Sinh'),
(3, 'Giáo Viên'),
(4, 'Khách');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `lop`
--

CREATE TABLE `lop` (
  `id` int(255) NOT NULL,
  `ten` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `khoilop_id` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `lop`
--

INSERT INTO `lop` (`id`, `ten`, `khoilop_id`) VALUES
(1, '1A', 1),
(2, '1B', 1),
(3, '1C', 1),
(4, '1D', 1),
(5, '2A', 2),
(6, '2B', 2),
(7, '2C', 2),
(8, '2D', 2),
(9, '3A', 3),
(10, '3B', 3),
(11, '3C', 3),
(12, '3D', 3),
(13, '4A', 4),
(14, '4B', 4),
(15, '4C', 4),
(16, '4D', 4),
(17, '5A', 5),
(18, '5B', 5),
(19, '5C', 5),
(20, '5D', 5);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `monhoc`
--

CREATE TABLE `monhoc` (
  `id` int(255) NOT NULL,
  `ten` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `heso` int(255) NOT NULL,
  `loaimonhoc_id` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `monhoc`
--

INSERT INTO `monhoc` (`id`, `ten`, `heso`, `loaimonhoc_id`) VALUES
(1, 'Toán', 2, 1),
(2, 'Tiếng Việt', 2, 1),
(3, 'Đạo đức', 1, 1),
(4, 'Tự nhiên và xã hội', 1, 1),
(5, 'Lịch sử và Địa lý ', 1, 1),
(6, 'Anh Văn', 1, 2),
(7, 'Khoa học', 1, 1),
(8, 'Tin học và Công nghệ', 1, 1),
(9, 'Giáo dục thể chất', 1, 3),
(10, 'Nghệ thuật', 1, 1),
(11, 'Hoạt động trải nghiệm', 1, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `namhoc`
--

CREATE TABLE `namhoc` (
  `id` int(255) NOT NULL,
  `ten` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `namhoc`
--

INSERT INTO `namhoc` (`id`, `ten`) VALUES
(1, '2011-2012'),
(2, '2012-2013'),
(3, '2013-2014'),
(4, '2014-2015'),
(5, '2016-2017'),
(6, '2017-2018');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nghenghiep`
--

CREATE TABLE `nghenghiep` (
  `id` int(255) NOT NULL,
  `ten` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `nghenghiep`
--

INSERT INTO `nghenghiep` (`id`, `ten`) VALUES
(1, 'NGHỆ THUẬT - THIẾT KẾ'),
(2, 'KINH DOANH - THƯƠNG MẠI'),
(3, 'KỸ THUẬT - CÔNG NGHỆ'),
(4, 'LUẬT - TƯ PHÁP'),
(5, 'Y DƯỢC'),
(6, 'KHOA HỌC - GIÁO DỤC'),
(7, 'BÁO CHÍ - XUẤT BẢN'),
(8, 'GIẢI TRÍ - TRUYỀN THÔNG'),
(9, 'THỰC PHẨM - ẨM THỰC'),
(10, 'CÔNG CHÁNH'),
(11, 'THỂ THAO'),
(12, 'CÔNG AN - QUÂN ĐỘI');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nguoidung`
--

CREATE TABLE `nguoidung` (
  `id` int(255) NOT NULL,
  `maso` int(255) NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `permission` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `active` int(10) NOT NULL DEFAULT '1',
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `nguoidung`
--

INSERT INTO `nguoidung` (`id`, `maso`, `password`, `permission`, `active`, `email`) VALUES
(1, 123, '81dc9bdb52d04dc20036dbd8313ed055', '1', 1, ''),
(2, 1111, '385eb530dabad6ce2d7250a1423aec9d', '2', 1, ''),
(3, 10012, 'aaa42296669b958c3cee6c0475c8093e', '3', 0, 'a@gmail.com'),
(4, 1112, 'e10adc3949ba59abbe56e057f20f883e', '2', 1, 'acvb');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `phancong`
--

CREATE TABLE `phancong` (
  `id` int(11) NOT NULL,
  `thoikhoabieu_id` int(11) DEFAULT NULL,
  `giaovien_id` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `phancong`
--

INSERT INTO `phancong` (`id`, `thoikhoabieu_id`, `giaovien_id`) VALUES
(1, 1, '1001'),
(2, 3, '1002'),
(3, 4, '1003'),
(4, 7, '1004'),
(6, 7, '1006'),
(7, 6, '1007'),
(9, 3, '1009'),
(33, 2, '1033'),
(34, 1, '1034'),
(35, 3, '1035'),
(36, 3, '1036'),
(37, 2, '1037'),
(38, 2, '1038'),
(39, 105, '1039'),
(40, 105, '1040'),
(41, 6, '1041');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `phanlop`
--

CREATE TABLE `phanlop` (
  `id` int(255) NOT NULL,
  `namhoc_id` int(255) NOT NULL,
  `lop_id` int(255) NOT NULL,
  `hocsinh_id` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `phanlop`
--

INSERT INTO `phanlop` (`id`, `namhoc_id`, `lop_id`, `hocsinh_id`) VALUES
(247, 6, 1, 10247),
(248, 6, 1, 10248),
(249, 6, 1, 10249),
(250, 6, 1, 10250),
(251, 6, 1, 10251),
(252, 6, 1, 10252),
(253, 6, 1, 10253),
(254, 6, 1, 10254),
(255, 6, 1, 10255),
(256, 6, 2, 10256),
(257, 6, 2, 10257),
(258, 6, 2, 10258),
(259, 6, 2, 10259),
(260, 6, 2, 10260),
(261, 6, 2, 10261),
(262, 6, 2, 10262),
(263, 6, 2, 10263),
(264, 6, 2, 10264),
(265, 6, 3, 10265),
(266, 6, 3, 10266),
(267, 6, 3, 10267),
(268, 6, 3, 10268),
(269, 6, 4, 10269),
(270, 6, 4, 10270),
(271, 6, 4, 10271),
(272, 6, 4, 10272),
(273, 6, 4, 10273),
(274, 6, 4, 10274),
(275, 6, 5, 10275),
(276, 6, 5, 10276),
(277, 6, 5, 10277),
(278, 6, 5, 10278),
(279, 6, 5, 10279),
(280, 6, 5, 10280),
(281, 6, 6, 10281),
(282, 6, 6, 10282),
(283, 6, 6, 10283),
(284, 6, 6, 10284),
(285, 6, 6, 10285),
(286, 6, 7, 10286),
(287, 6, 7, 10287),
(288, 6, 7, 10288),
(289, 6, 7, 10289),
(290, 6, 7, 10290),
(291, 6, 7, 10291),
(292, 6, 8, 10292),
(293, 6, 8, 10293),
(294, 6, 8, 10294),
(295, 6, 8, 10295),
(296, 6, 8, 10296),
(297, 6, 9, 10297),
(298, 6, 9, 10298),
(299, 6, 9, 10299),
(300, 6, 9, 10300),
(301, 6, 9, 10301),
(302, 6, 9, 10302),
(303, 6, 10, 10303),
(304, 6, 10, 10304),
(305, 6, 10, 10305),
(306, 6, 10, 10306),
(307, 6, 10, 10307),
(308, 6, 10, 10308),
(309, 6, 11, 10309),
(310, 6, 11, 10310),
(311, 6, 11, 10311),
(312, 6, 11, 10312),
(313, 6, 11, 10313),
(314, 6, 12, 10314),
(315, 6, 12, 10315),
(316, 6, 12, 10316),
(317, 6, 12, 10317),
(318, 6, 12, 10318),
(319, 6, 12, 10319),
(320, 6, 13, 10320),
(321, 6, 13, 10321),
(322, 6, 13, 10322),
(323, 6, 13, 10323),
(324, 6, 13, 10324),
(325, 6, 13, 10325),
(326, 6, 14, 10326),
(327, 6, 14, 10327),
(328, 6, 14, 10328),
(329, 6, 14, 10329),
(330, 6, 14, 10330),
(331, 6, 15, 10331),
(332, 6, 15, 10332),
(333, 6, 15, 10333),
(334, 6, 15, 10334),
(335, 6, 15, 10335),
(336, 6, 15, 10336),
(337, 6, 16, 10337),
(338, 6, 16, 10338),
(339, 6, 16, 10339),
(340, 6, 16, 10340),
(341, 6, 16, 10341),
(342, 6, 16, 10342),
(343, 6, 17, 10343),
(344, 6, 17, 10344),
(345, 6, 17, 10345),
(346, 6, 17, 10346),
(347, 6, 17, 10347),
(348, 6, 18, 10348),
(349, 6, 18, 10349),
(350, 6, 18, 10350),
(351, 6, 18, 10351),
(352, 6, 18, 10352),
(353, 6, 18, 10353),
(354, 6, 18, 10354),
(355, 6, 18, 10355),
(356, 6, 18, 10356),
(357, 6, 19, 10357),
(358, 6, 19, 10358),
(359, 6, 19, 10359),
(360, 6, 20, 10360),
(361, 6, 20, 10361),
(362, 6, 20, 10362),
(363, 6, 20, 10363),
(364, 6, 20, 10364),
(365, 6, 18, 10365),
(366, 6, 18, 10366),
(367, 6, 20, 10367),
(368, 6, 20, 10368),
(369, 6, 20, 10369),
(370, 6, 20, 10370);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `thoigianbieu`
--

CREATE TABLE `thoigianbieu` (
  `id` int(255) NOT NULL,
  `giobatdau` time NOT NULL,
  `gioketthuc` time NOT NULL,
  `noidung` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `thoigianbieu`
--

INSERT INTO `thoigianbieu` (`id`, `giobatdau`, `gioketthuc`, `noidung`) VALUES
(1, '07:00:00', '07:00:00', 'Tiết 1'),
(2, '08:00:00', '09:00:00', 'Tiết 2'),
(3, '09:00:00', '10:00:00', 'Tiết 3'),
(4, '10:00:00', '11:00:00', 'Tiết 4'),
(5, '11:00:00', '12:00:00', 'Tiết 5'),
(6, '13:30:00', '14:30:00', 'Tiết 6'),
(7, '14:30:00', '15:30:00', 'Tiết 7'),
(8, '15:30:00', '16:30:00', 'Tiết 8'),
(9, '16:30:00', '17:30:00', 'Tiết 9');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `thoikhoabieu`
--

CREATE TABLE `thoikhoabieu` (
  `id` int(255) NOT NULL,
  `lop_id` int(11) DEFAULT NULL,
  `namhoc_id` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `hocky_id` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `thoikhoabieu`
--

INSERT INTO `thoikhoabieu` (`id`, `lop_id`, `namhoc_id`, `hocky_id`) VALUES
(3, 20, '6', '1'),
(4, 19, '6', '1'),
(5, 13, '6', '1'),
(6, 3, '6', '1'),
(7, 4, '6', '1'),
(105, 1, '6', '1'),
(108, 2, '6', '1');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `thuvien`
--

CREATE TABLE `thuvien` (
  `id` int(255) NOT NULL,
  `tentailieu` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `hinh` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `mota` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tiethoc`
--

CREATE TABLE `tiethoc` (
  `id` int(255) NOT NULL,
  `monhoc_id` int(255) NOT NULL,
  `khoilop_id` int(255) NOT NULL,
  `hocky_id` int(255) NOT NULL,
  `sotiet` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tiethoc`
--

INSERT INTO `tiethoc` (`id`, `monhoc_id`, `khoilop_id`, `hocky_id`, `sotiet`) VALUES
(1, 2, 1, 2, 46),
(2, 1, 5, 1, 37),
(3, 9, 2, 2, 26),
(4, 10, 1, 2, 56),
(5, 2, 4, 2, 44),
(6, 7, 3, 2, 23),
(7, 3, 5, 2, 51),
(8, 11, 4, 1, 20),
(9, 2, 1, 2, 26),
(10, 6, 3, 1, 28),
(11, 8, 5, 2, 34),
(12, 6, 2, 2, 32),
(13, 4, 5, 1, 36),
(14, 2, 3, 1, 50),
(15, 4, 3, 2, 24),
(16, 1, 3, 1, 21),
(17, 9, 4, 1, 60),
(18, 9, 3, 2, 19),
(19, 6, 5, 2, 29),
(20, 2, 4, 2, 43),
(21, 9, 2, 1, 39),
(22, 7, 2, 2, 42),
(23, 7, 5, 2, 56),
(24, 11, 3, 2, 27),
(25, 11, 2, 2, 56),
(26, 11, 5, 2, 57),
(27, 9, 4, 1, 58),
(28, 1, 4, 1, 53),
(29, 6, 1, 2, 56),
(30, 9, 2, 1, 44),
(31, 8, 5, 1, 52),
(32, 6, 4, 2, 32),
(33, 9, 1, 2, 20),
(34, 8, 5, 2, 59),
(35, 2, 3, 2, 57),
(36, 2, 1, 1, 40),
(37, 3, 4, 1, 59),
(38, 9, 1, 2, 29),
(39, 7, 3, 1, 31),
(40, 2, 3, 1, 51),
(41, 10, 2, 2, 53),
(42, 9, 3, 1, 51),
(43, 10, 3, 1, 43),
(44, 5, 5, 1, 49),
(45, 9, 4, 2, 54),
(46, 3, 5, 1, 44),
(47, 6, 1, 2, 60),
(48, 11, 2, 2, 28),
(49, 6, 3, 1, 33),
(50, 5, 4, 1, 31),
(51, 1, 3, 2, 34),
(52, 9, 1, 1, 34),
(53, 6, 4, 2, 22),
(54, 8, 5, 1, 34),
(55, 3, 2, 1, 36),
(56, 11, 5, 1, 53),
(57, 3, 1, 2, 30),
(58, 5, 4, 1, 19),
(59, 7, 5, 1, 23),
(60, 5, 1, 1, 44),
(61, 1, 2, 1, 46),
(62, 7, 2, 2, 42),
(63, 8, 2, 2, 56),
(64, 3, 3, 2, 42),
(65, 11, 5, 1, 53),
(66, 10, 1, 2, 57),
(67, 7, 3, 1, 49),
(68, 11, 2, 1, 53),
(69, 2, 4, 2, 46),
(70, 6, 3, 2, 57),
(71, 10, 2, 1, 20),
(72, 6, 4, 1, 48),
(73, 8, 1, 1, 60),
(74, 6, 2, 2, 51),
(75, 6, 4, 2, 34),
(76, 4, 3, 1, 40),
(77, 6, 3, 2, 60),
(78, 4, 2, 2, 40),
(79, 9, 5, 2, 42),
(80, 6, 5, 1, 53),
(81, 4, 4, 2, 30),
(82, 1, 4, 2, 32),
(83, 4, 3, 1, 26),
(84, 1, 5, 2, 56),
(85, 1, 3, 2, 50),
(86, 10, 5, 1, 18),
(87, 1, 5, 2, 20),
(88, 2, 3, 1, 33),
(89, 7, 1, 1, 42),
(90, 5, 3, 1, 23),
(91, 1, 5, 1, 43),
(92, 6, 4, 2, 54),
(93, 6, 5, 1, 57),
(94, 3, 5, 1, 54),
(95, 10, 1, 2, 53),
(96, 9, 5, 1, 18),
(97, 3, 1, 2, 41),
(98, 6, 1, 2, 46),
(99, 3, 1, 1, 33),
(100, 7, 1, 2, 52),
(101, 8, 3, 2, 39),
(102, 6, 1, 2, 30),
(103, 5, 5, 1, 48),
(104, 8, 3, 2, 24),
(105, 5, 2, 1, 54),
(106, 3, 3, 2, 56),
(107, 9, 3, 1, 52),
(108, 7, 2, 1, 32),
(109, 8, 5, 2, 19),
(110, 1, 3, 2, 22),
(111, 5, 1, 2, 54),
(112, 1, 3, 2, 51),
(113, 11, 1, 1, 35),
(114, 7, 1, 2, 25),
(115, 10, 3, 1, 34),
(116, 10, 3, 1, 42),
(117, 3, 5, 1, 38),
(118, 7, 2, 2, 38),
(119, 4, 1, 2, 44),
(120, 7, 4, 1, 40),
(121, 3, 4, 2, 21),
(122, 8, 3, 2, 32),
(123, 5, 1, 2, 44),
(124, 10, 1, 2, 30),
(125, 4, 4, 2, 45),
(126, 10, 1, 1, 31),
(127, 5, 3, 2, 57),
(128, 2, 2, 2, 21),
(129, 8, 3, 2, 41),
(130, 9, 1, 2, 44),
(131, 9, 5, 2, 29),
(132, 11, 1, 1, 37),
(133, 4, 1, 1, 48),
(134, 2, 4, 2, 35),
(135, 11, 2, 2, 49),
(136, 7, 3, 2, 60),
(137, 1, 2, 2, 52),
(138, 7, 1, 1, 44),
(139, 6, 2, 1, 38),
(140, 1, 4, 1, 51),
(141, 7, 1, 1, 29),
(142, 9, 2, 1, 33),
(143, 10, 2, 2, 36),
(144, 3, 4, 1, 34),
(145, 8, 5, 1, 22),
(146, 3, 4, 1, 41),
(147, 5, 5, 2, 55),
(148, 4, 1, 2, 24),
(149, 11, 4, 2, 22),
(150, 7, 1, 2, 46),
(151, 10, 5, 1, 36),
(152, 1, 5, 2, 21),
(153, 10, 3, 1, 27),
(154, 7, 5, 1, 20),
(155, 2, 4, 2, 33),
(156, 6, 2, 2, 51),
(157, 3, 2, 2, 31),
(158, 11, 4, 2, 58),
(159, 7, 1, 1, 37),
(160, 4, 5, 2, 19),
(161, 1, 3, 2, 21),
(162, 1, 1, 1, 33),
(163, 7, 3, 2, 23),
(164, 4, 3, 2, 20),
(165, 5, 4, 2, 55),
(166, 11, 2, 1, 33),
(167, 11, 3, 2, 38),
(168, 10, 2, 1, 45),
(169, 4, 3, 1, 24),
(170, 4, 5, 2, 20),
(171, 4, 2, 2, 43),
(172, 3, 3, 1, 31),
(173, 3, 3, 1, 45),
(174, 10, 3, 2, 25),
(175, 1, 5, 2, 59),
(176, 6, 2, 1, 52),
(177, 3, 3, 2, 41),
(178, 8, 2, 1, 39),
(179, 8, 1, 2, 60),
(180, 1, 5, 2, 51),
(181, 8, 2, 1, 52),
(182, 7, 5, 2, 48),
(183, 7, 2, 2, 46),
(184, 6, 5, 1, 23),
(185, 10, 2, 1, 26),
(186, 9, 4, 1, 37),
(187, 10, 3, 2, 43),
(188, 1, 2, 1, 25),
(189, 5, 2, 2, 31),
(190, 4, 3, 2, 39),
(191, 2, 1, 2, 38),
(192, 9, 3, 2, 42),
(193, 11, 2, 2, 58),
(194, 4, 3, 2, 28),
(195, 5, 1, 2, 45),
(196, 6, 4, 2, 26),
(197, 10, 3, 1, 41),
(198, 5, 4, 1, 52),
(199, 6, 5, 2, 53),
(200, 9, 1, 2, 46),
(201, 1, 2, 2, 46),
(202, 11, 2, 2, 23),
(203, 7, 2, 1, 31),
(204, 8, 5, 2, 47),
(205, 8, 1, 2, 60),
(206, 7, 4, 1, 21),
(207, 1, 1, 1, 34),
(208, 10, 3, 2, 48),
(209, 8, 2, 2, 41),
(210, 1, 2, 1, 42),
(211, 10, 1, 2, 23),
(212, 7, 3, 2, 37),
(213, 6, 5, 2, 44),
(214, 4, 4, 2, 43),
(215, 3, 2, 2, 51),
(216, 5, 5, 1, 47),
(217, 7, 1, 1, 55),
(218, 9, 5, 1, 25),
(219, 2, 1, 2, 51),
(220, 5, 3, 2, 23),
(221, 10, 1, 1, 58),
(222, 5, 4, 2, 34),
(223, 4, 4, 1, 23),
(224, 10, 5, 2, 48),
(225, 1, 5, 2, 54),
(226, 5, 5, 1, 43),
(227, 11, 5, 1, 30),
(228, 8, 4, 1, 53),
(229, 2, 3, 1, 53),
(230, 6, 4, 2, 31),
(231, 4, 2, 1, 37),
(232, 10, 4, 1, 47),
(233, 5, 1, 2, 23),
(234, 7, 3, 1, 19),
(235, 4, 3, 1, 28),
(236, 4, 1, 2, 46),
(237, 4, 2, 1, 23),
(238, 5, 2, 1, 36),
(239, 1, 3, 2, 22),
(240, 2, 1, 1, 34),
(241, 4, 4, 1, 44),
(242, 2, 4, 2, 43),
(243, 11, 1, 1, 20),
(244, 7, 3, 1, 30),
(245, 2, 1, 2, 33),
(246, 6, 4, 1, 32),
(247, 7, 5, 2, 33),
(248, 3, 4, 1, 44),
(249, 2, 1, 2, 44),
(250, 4, 4, 1, 54),
(251, 5, 5, 1, 38),
(252, 10, 2, 2, 50),
(253, 11, 5, 1, 46),
(254, 2, 3, 2, 47),
(255, 1, 4, 1, 33),
(256, 5, 1, 1, 22),
(257, 8, 5, 2, 44),
(258, 11, 2, 1, 33),
(259, 5, 2, 1, 33),
(260, 8, 5, 2, 37),
(261, 2, 3, 2, 49),
(262, 1, 4, 1, 59),
(263, 7, 3, 1, 34),
(264, 4, 1, 2, 45),
(265, 7, 5, 2, 50),
(266, 7, 5, 2, 25),
(267, 1, 2, 2, 46),
(268, 3, 3, 1, 31),
(269, 8, 3, 2, 55),
(270, 3, 5, 1, 31),
(271, 3, 1, 1, 34),
(272, 9, 2, 1, 35),
(273, 3, 4, 1, 47),
(274, 8, 5, 1, 54),
(275, 6, 4, 2, 31),
(276, 4, 3, 2, 32),
(277, 7, 5, 2, 24),
(278, 11, 3, 1, 32),
(279, 11, 2, 1, 21),
(280, 10, 5, 2, 35),
(281, 1, 5, 1, 33),
(282, 9, 4, 1, 46),
(283, 4, 1, 1, 29),
(284, 5, 5, 1, 56),
(285, 6, 5, 1, 18),
(286, 8, 1, 2, 44),
(287, 5, 5, 2, 58),
(288, 7, 4, 2, 20),
(289, 7, 1, 2, 45),
(290, 8, 1, 1, 42),
(291, 7, 1, 1, 37),
(292, 1, 4, 2, 45),
(293, 2, 5, 1, 45),
(294, 9, 2, 1, 38),
(295, 10, 1, 2, 40),
(296, 8, 1, 2, 60),
(297, 6, 3, 2, 60),
(298, 11, 2, 2, 26),
(299, 10, 3, 2, 54),
(300, 4, 4, 2, 27),
(301, 3, 1, 2, 18),
(302, 6, 2, 2, 42),
(303, 4, 5, 1, 30),
(304, 9, 1, 2, 41),
(305, 5, 5, 1, 18),
(306, 1, 4, 1, 36),
(307, 6, 5, 1, 41),
(308, 2, 1, 2, 18),
(309, 5, 5, 1, 43),
(310, 2, 1, 1, 54),
(311, 5, 2, 2, 41),
(312, 3, 3, 2, 42),
(313, 11, 1, 2, 20),
(314, 8, 5, 1, 18),
(315, 10, 4, 2, 37),
(316, 10, 5, 1, 47),
(317, 7, 1, 1, 18),
(318, 4, 5, 1, 49),
(319, 7, 5, 2, 54),
(320, 7, 2, 1, 54),
(321, 4, 5, 2, 37),
(322, 6, 3, 2, 19),
(323, 9, 1, 1, 28),
(324, 5, 1, 1, 45),
(325, 3, 4, 1, 43),
(326, 9, 2, 1, 60),
(327, 9, 4, 2, 32),
(328, 2, 4, 1, 55),
(329, 3, 5, 1, 36),
(330, 1, 2, 1, 35),
(331, 9, 5, 1, 45),
(332, 5, 1, 1, 19),
(333, 2, 4, 1, 24),
(334, 11, 5, 1, 27),
(335, 11, 2, 1, 41),
(336, 6, 3, 1, 28),
(337, 1, 2, 2, 33),
(338, 5, 3, 1, 47),
(339, 9, 5, 2, 59),
(340, 4, 4, 2, 43),
(341, 7, 1, 2, 47),
(342, 3, 5, 2, 45),
(343, 6, 5, 2, 37),
(344, 6, 4, 1, 57),
(345, 11, 4, 1, 19),
(346, 9, 4, 1, 56),
(347, 1, 4, 1, 47),
(348, 6, 4, 2, 53),
(349, 7, 5, 2, 34),
(350, 5, 4, 2, 25),
(351, 8, 5, 2, 22),
(352, 1, 3, 2, 46),
(353, 2, 1, 1, 21),
(354, 11, 5, 2, 41),
(355, 5, 4, 1, 29),
(356, 1, 5, 2, 19),
(357, 10, 5, 1, 42),
(358, 7, 1, 1, 32),
(359, 10, 3, 1, 25),
(360, 2, 3, 1, 39),
(361, 1, 2, 2, 51),
(362, 5, 3, 2, 19),
(363, 10, 4, 2, 21),
(364, 9, 2, 1, 46),
(365, 4, 1, 2, 58),
(366, 11, 2, 1, 25),
(367, 1, 4, 1, 44),
(368, 4, 1, 2, 60),
(369, 9, 5, 1, 47),
(370, 2, 1, 1, 21),
(371, 9, 1, 2, 30),
(372, 10, 5, 2, 36),
(373, 5, 4, 1, 57),
(374, 11, 5, 2, 31),
(375, 3, 4, 1, 45),
(376, 10, 1, 2, 34),
(377, 10, 2, 2, 59),
(378, 10, 4, 2, 42),
(379, 7, 5, 1, 31),
(380, 1, 5, 1, 21),
(381, 10, 1, 2, 29),
(382, 3, 1, 1, 21),
(383, 8, 4, 2, 22),
(384, 9, 2, 1, 53),
(385, 7, 5, 2, 59),
(386, 3, 5, 2, 39),
(387, 10, 2, 1, 60),
(388, 11, 1, 1, 60),
(389, 6, 1, 2, 20),
(390, 7, 1, 1, 47),
(391, 9, 1, 2, 30),
(392, 1, 4, 2, 48),
(393, 8, 3, 2, 56),
(394, 7, 3, 2, 43),
(395, 5, 3, 1, 46),
(396, 3, 3, 2, 40),
(397, 5, 4, 1, 38),
(398, 5, 5, 1, 45),
(399, 9, 2, 2, 58),
(400, 11, 4, 2, 27);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tinh`
--

CREATE TABLE `tinh` (
  `id` int(11) NOT NULL,
  `ten` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `tinh`
--

INSERT INTO `tinh` (`id`, `ten`) VALUES
(2, 'An Giang'),
(3, 'Bà Rịa Vũng Tàu'),
(4, 'Bình Dương'),
(5, 'Bình Phước'),
(6, 'Bình Thuận'),
(7, 'Bình Định'),
(8, 'Bắc Giang'),
(9, 'Bắc Kạn'),
(10, 'Bắc Ninh'),
(11, 'Bến Tre'),
(12, 'Cao Bằng'),
(13, 'Cà Mau'),
(14, 'Cần Thơ'),
(15, 'Gia Lai'),
(16, 'Hà Giang'),
(17, 'Hà Nam'),
(18, 'Hà Nội'),
(19, 'Hà Tĩnh'),
(20, 'Hòa Bình'),
(21, 'Hưng Yên'),
(22, 'Hải Dương'),
(23, 'Hải Phòng'),
(24, 'Hồ Chí Minh'),
(25, 'Khánh Hòa'),
(26, 'Kiên Giang'),
(27, 'Kon Tum'),
(28, 'Lai Châu'),
(29, 'Long An'),
(30, 'Lào Cai'),
(31, 'Lâm Đồng'),
(32, 'Lạng Sơn'),
(33, 'Nam Định'),
(34, 'Nghệ An'),
(35, 'Ninh Bình'),
(36, 'Ninh Thuận'),
(37, 'Phú Thọ'),
(38, 'Phú Yên'),
(40, 'Quảng Nam'),
(41, 'Quảng Ngãi'),
(42, 'Quảng Ninh'),
(43, 'Quảng Trị'),
(44, 'Sơn La'),
(45, 'Thanh Hóa'),
(46, 'Thái Bình'),
(47, 'Thái Nguyên'),
(48, 'Thừa Thiên Huế'),
(49, 'Tiền Giang'),
(50, 'Trà Vinh'),
(51, 'Tuyên Quang'),
(52, 'Tây Ninh'),
(53, 'Vĩnh Long'),
(54, 'Vĩnh Phúc'),
(55, 'Yên Bái'),
(56, 'Đà Nẵng'),
(57, 'Đắk Lắk'),
(58, 'Đồng Nai'),
(59, 'Đồng Tháp'),
(60, 'Bạc Liêu'),
(61, 'Sóc Trăng'),
(62, 'Hậu Giang'),
(63, 'Đắk Nông'),
(64, 'Điện Biên');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tongiao`
--

CREATE TABLE `tongiao` (
  `id` int(255) NOT NULL,
  `ten` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tongiao`
--

INSERT INTO `tongiao` (`id`, `ten`) VALUES
(1, 'không'),
(2, 'Đạo Phật'),
(3, 'Thiên Chúa giáo');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `xep_loai_hanh_kiem`
--

CREATE TABLE `xep_loai_hanh_kiem` (
  `id` int(255) NOT NULL,
  `hocsinh_id` int(255) NOT NULL,
  `hanhkiem_id` int(255) NOT NULL,
  `namhoc_id` int(255) NOT NULL,
  `hocky_id` int(255) NOT NULL,
  `lop_id` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `xep_loai_hanh_kiem`
--

INSERT INTO `xep_loai_hanh_kiem` (`id`, `hocsinh_id`, `hanhkiem_id`, `namhoc_id`, `hocky_id`, `lop_id`) VALUES
(1, 53, 2, 5, 1, 8),
(2, 59, 3, 4, 2, 14),
(3, 87, 3, 1, 2, 16),
(4, 68, 4, 2, 2, 2),
(5, 60, 2, 1, 2, 15),
(6, 97, 3, 4, 2, 19),
(7, 10, 4, 6, 1, 9),
(8, 92, 3, 2, 2, 7),
(9, 93, 2, 5, 2, 8),
(10, 84, 4, 5, 1, 13),
(11, 75, 2, 3, 1, 9),
(13, 17, 2, 5, 2, 17),
(14, 59, 2, 1, 2, 7),
(15, 13, 4, 4, 2, 8),
(16, 62, 4, 1, 2, 17),
(17, 85, 1, 5, 2, 2),
(18, 93, 2, 1, 1, 19),
(20, 31, 4, 5, 2, 16),
(21, 45, 4, 1, 1, 13),
(22, 48, 3, 5, 1, 3),
(23, 1, 4, 4, 1, 14),
(24, 19, 3, 2, 2, 11),
(25, 41, 3, 3, 2, 8),
(26, 18, 4, 2, 2, 12),
(27, 14, 2, 2, 2, 4),
(28, 50, 2, 4, 1, 16),
(29, 58, 1, 3, 1, 7),
(30, 13, 3, 6, 2, 10),
(31, 4, 4, 2, 1, 17),
(32, 49, 2, 5, 2, 12),
(33, 64, 4, 2, 1, 15),
(34, 17, 1, 2, 2, 10),
(35, 95, 1, 2, 2, 20),
(36, 85, 2, 2, 2, 8),
(37, 33, 1, 4, 1, 8),
(38, 46, 1, 6, 1, 17),
(39, 65, 2, 5, 2, 18),
(41, 83, 2, 6, 2, 15),
(43, 7, 2, 3, 1, 18),
(44, 19, 3, 3, 1, 11),
(45, 23, 3, 1, 1, 14),
(46, 54, 2, 3, 1, 7),
(47, 95, 2, 5, 2, 15),
(48, 41, 4, 2, 1, 15),
(49, 7, 2, 3, 1, 16),
(50, 2, 4, 5, 1, 14),
(51, 1, 3, 3, 2, 11),
(52, 3, 4, 2, 1, 7),
(53, 82, 3, 3, 1, 16),
(54, 63, 2, 6, 2, 5),
(55, 84, 2, 4, 1, 16),
(56, 7, 1, 2, 1, 11),
(57, 74, 3, 5, 2, 3),
(58, 8, 3, 6, 2, 5),
(59, 13, 1, 5, 2, 17),
(60, 47, 1, 5, 2, 11),
(61, 52, 4, 6, 1, 15),
(62, 9, 4, 5, 2, 2),
(63, 42, 2, 5, 2, 12),
(64, 82, 3, 6, 1, 12),
(65, 39, 1, 2, 2, 14),
(66, 78, 2, 5, 2, 3),
(67, 1, 4, 1, 2, 8),
(68, 90, 1, 5, 2, 8),
(69, 29, 2, 5, 1, 14),
(70, 21, 4, 2, 2, 13),
(71, 93, 4, 1, 1, 2),
(72, 61, 1, 1, 2, 12),
(73, 73, 4, 5, 1, 8),
(74, 68, 3, 5, 1, 10),
(75, 27, 2, 4, 1, 11),
(76, 83, 2, 4, 2, 5),
(77, 43, 3, 2, 1, 6),
(79, 13, 1, 1, 2, 9),
(80, 38, 3, 3, 2, 1),
(81, 49, 2, 6, 1, 1),
(82, 10, 1, 4, 2, 4),
(83, 99, 2, 6, 2, 13),
(84, 34, 1, 5, 1, 20),
(85, 82, 1, 1, 2, 14),
(86, 77, 4, 6, 1, 20),
(87, 95, 1, 2, 1, 14),
(88, 81, 4, 1, 1, 18),
(89, 94, 4, 6, 2, 7),
(90, 73, 2, 3, 1, 10),
(91, 68, 4, 5, 1, 19),
(92, 75, 4, 3, 2, 2),
(93, 29, 4, 5, 2, 10),
(94, 93, 3, 3, 2, 7),
(95, 71, 4, 2, 1, 10),
(97, 30, 2, 6, 1, 3),
(98, 98, 1, 6, 2, 15),
(99, 28, 1, 3, 2, 18),
(100, 95, 4, 5, 1, 5),
(101, 11, 1, 6, 1, 12),
(102, 54, 3, 3, 1, 13),
(103, 88, 4, 6, 2, 12),
(104, 66, 3, 3, 2, 13),
(105, 81, 2, 2, 2, 10),
(106, 27, 1, 3, 1, 7),
(107, 26, 3, 5, 2, 12),
(108, 16, 3, 6, 1, 17),
(109, 100, 1, 2, 2, 3),
(110, 65, 1, 5, 2, 16),
(111, 62, 2, 6, 1, 3),
(112, 20, 4, 3, 2, 4),
(115, 66, 1, 6, 2, 20),
(117, 96, 2, 2, 2, 18),
(118, 60, 4, 5, 1, 8),
(120, 65, 3, 6, 1, 1),
(121, 87, 1, 1, 1, 15),
(122, 3, 2, 4, 2, 3),
(123, 78, 2, 6, 1, 17),
(124, 21, 3, 3, 2, 14),
(125, 47, 1, 4, 1, 16),
(126, 56, 2, 2, 1, 19),
(127, 80, 4, 2, 2, 18),
(128, 86, 3, 2, 2, 8),
(129, 62, 2, 2, 1, 2),
(130, 6, 1, 4, 2, 19),
(131, 13, 3, 6, 2, 3),
(132, 76, 3, 4, 2, 3),
(133, 2, 2, 5, 1, 7),
(134, 82, 3, 1, 2, 2),
(135, 93, 3, 3, 2, 10),
(136, 95, 2, 1, 1, 18),
(137, 42, 4, 3, 1, 10),
(138, 45, 4, 6, 1, 16),
(139, 26, 3, 6, 1, 3),
(140, 84, 3, 3, 1, 18),
(141, 27, 1, 5, 1, 9),
(142, 29, 1, 2, 1, 5),
(143, 64, 4, 2, 1, 12),
(144, 70, 2, 6, 2, 20),
(145, 81, 1, 5, 1, 20),
(146, 9, 4, 6, 1, 11),
(147, 38, 3, 6, 2, 10),
(148, 50, 3, 5, 2, 4),
(149, 11, 2, 6, 2, 3),
(151, 88, 2, 5, 2, 9),
(152, 42, 3, 2, 1, 7),
(153, 89, 1, 6, 1, 12),
(154, 83, 1, 4, 2, 4),
(155, 64, 4, 6, 1, 18),
(156, 19, 3, 1, 1, 9),
(157, 94, 3, 4, 2, 10),
(158, 47, 2, 5, 2, 13),
(159, 28, 1, 3, 1, 15),
(160, 24, 3, 1, 1, 10),
(161, 73, 1, 5, 2, 18),
(162, 58, 2, 4, 2, 3),
(163, 83, 2, 2, 1, 16),
(164, 14, 1, 2, 2, 6),
(166, 82, 2, 5, 1, 10),
(167, 3, 4, 1, 1, 2),
(169, 49, 4, 3, 2, 20),
(171, 66, 4, 4, 2, 7),
(172, 34, 3, 3, 2, 14),
(173, 28, 2, 2, 1, 9),
(174, 17, 4, 3, 2, 6),
(175, 58, 1, 6, 2, 4),
(176, 57, 1, 2, 1, 2),
(177, 76, 4, 5, 1, 13),
(179, 75, 4, 5, 1, 14),
(180, 23, 3, 2, 1, 9),
(181, 7, 2, 4, 1, 14),
(182, 39, 3, 4, 2, 6),
(183, 19, 1, 6, 1, 15),
(185, 64, 4, 6, 2, 18),
(186, 29, 1, 5, 2, 10),
(187, 91, 4, 1, 2, 19),
(188, 54, 3, 2, 1, 9),
(189, 88, 1, 2, 2, 2),
(190, 44, 2, 4, 2, 17),
(191, 73, 3, 3, 1, 4),
(192, 83, 3, 4, 1, 18),
(193, 50, 2, 1, 1, 7),
(194, 93, 3, 2, 1, 16),
(195, 64, 2, 2, 2, 15),
(196, 48, 3, 5, 1, 17),
(198, 89, 3, 3, 2, 4),
(199, 14, 4, 3, 1, 2),
(200, 71, 4, 3, 1, 5),
(201, 20, 4, 6, 1, 3),
(202, 22, 1, 6, 1, 1),
(203, 38, 1, 6, 1, 1),
(204, 98, 1, 6, 1, 1),
(205, 1234567, 1, 6, 1, 1),
(206, 98765432, 1, 6, 1, 1),
(207, 123456790, 1, 6, 1, 1),
(208, 123456791, 1, 6, 1, 1),
(209, 123456792, 1, 6, 1, 1),
(210, 123456793, 1, 6, 1, 1),
(211, 123456794, 0, 6, 1, 1),
(216, 2, 1, 6, 1, 2),
(217, 38, 2, 6, 1, 2),
(218, 20, 1, 6, 1, 2),
(219, 21, 1, 6, 1, 2),
(220, 22, 1, 6, 1, 2),
(221, 23, 1, 6, 1, 2),
(222, 24, 1, 6, 1, 2),
(223, 25, 1, 6, 1, 2),
(224, 26, 1, 6, 1, 2),
(225, 27, 1, 6, 1, 2),
(226, 18, 1, 6, 1, 2),
(227, 19, 1, 6, 1, 2),
(228, 129, 1, 6, 1, 2),
(229, 11, 1, 6, 1, 2),
(230, 12, 1, 6, 1, 2),
(231, 13, 0, 6, 1, 2);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `dantoc`
--
ALTER TABLE `dantoc`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `diem`
--
ALTER TABLE `diem`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `diemdanh`
--
ALTER TABLE `diemdanh`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `giaovien`
--
ALTER TABLE `giaovien`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `gioithieu`
--
ALTER TABLE `gioithieu`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `hanhkiem`
--
ALTER TABLE `hanhkiem`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `hoatdong`
--
ALTER TABLE `hoatdong`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `hocky`
--
ALTER TABLE `hocky`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `hocluc`
--
ALTER TABLE `hocluc`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `hocsinh`
--
ALTER TABLE `hocsinh`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `hocsinhthoihoc`
--
ALTER TABLE `hocsinhthoihoc`
  ADD PRIMARY KEY (`hocsinh_id`);

--
-- Chỉ mục cho bảng `huyen`
--
ALTER TABLE `huyen`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `ketqua`
--
ALTER TABLE `ketqua`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `khoilop`
--
ALTER TABLE `khoilop`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `kq_ca_nam_mon_hoc`
--
ALTER TABLE `kq_ca_nam_mon_hoc`
  ADD PRIMARY KEY (`hocsinh_id`,`monhoc_id`,`namhoc_id`,`lop_id`);

--
-- Chỉ mục cho bảng `kq_ca_nam_tong_hop`
--
ALTER TABLE `kq_ca_nam_tong_hop`
  ADD PRIMARY KEY (`hocsinh_id`,`lop_id`,`namhoc_id`);

--
-- Chỉ mục cho bảng `kq_hoc_ky_tong_hop`
--
ALTER TABLE `kq_hoc_ky_tong_hop`
  ADD PRIMARY KEY (`hocsinh_id`,`lop_id`,`namhoc_id`,`hocky_id`);

--
-- Chỉ mục cho bảng `lienhe`
--
ALTER TABLE `lienhe`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `loaidiem`
--
ALTER TABLE `loaidiem`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `loaimonhoc`
--
ALTER TABLE `loaimonhoc`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `loainguoidung`
--
ALTER TABLE `loainguoidung`
  ADD PRIMARY KEY (`MaLoaiNguoiDung`);

--
-- Chỉ mục cho bảng `lop`
--
ALTER TABLE `lop`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `monhoc`
--
ALTER TABLE `monhoc`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `namhoc`
--
ALTER TABLE `namhoc`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `nghenghiep`
--
ALTER TABLE `nghenghiep`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `nguoidung`
--
ALTER TABLE `nguoidung`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `phancong`
--
ALTER TABLE `phancong`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `phanlop`
--
ALTER TABLE `phanlop`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `thoigianbieu`
--
ALTER TABLE `thoigianbieu`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `thoikhoabieu`
--
ALTER TABLE `thoikhoabieu`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `thuvien`
--
ALTER TABLE `thuvien`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tiethoc`
--
ALTER TABLE `tiethoc`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tinh`
--
ALTER TABLE `tinh`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tongiao`
--
ALTER TABLE `tongiao`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `xep_loai_hanh_kiem`
--
ALTER TABLE `xep_loai_hanh_kiem`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `dantoc`
--
ALTER TABLE `dantoc`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT cho bảng `diem`
--
ALTER TABLE `diem`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;
--
-- AUTO_INCREMENT cho bảng `diemdanh`
--
ALTER TABLE `diemdanh`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT cho bảng `giaovien`
--
ALTER TABLE `giaovien`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2112;
--
-- AUTO_INCREMENT cho bảng `gioithieu`
--
ALTER TABLE `gioithieu`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT cho bảng `hanhkiem`
--
ALTER TABLE `hanhkiem`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT cho bảng `hoatdong`
--
ALTER TABLE `hoatdong`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT cho bảng `hocky`
--
ALTER TABLE `hocky`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT cho bảng `hocluc`
--
ALTER TABLE `hocluc`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT cho bảng `hocsinh`
--
ALTER TABLE `hocsinh`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21112;
--
-- AUTO_INCREMENT cho bảng `ketqua`
--
ALTER TABLE `ketqua`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT cho bảng `khoilop`
--
ALTER TABLE `khoilop`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT cho bảng `lienhe`
--
ALTER TABLE `lienhe`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT cho bảng `loaidiem`
--
ALTER TABLE `loaidiem`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT cho bảng `loaimonhoc`
--
ALTER TABLE `loaimonhoc`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT cho bảng `loainguoidung`
--
ALTER TABLE `loainguoidung`
  MODIFY `MaLoaiNguoiDung` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT cho bảng `lop`
--
ALTER TABLE `lop`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT cho bảng `monhoc`
--
ALTER TABLE `monhoc`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT cho bảng `namhoc`
--
ALTER TABLE `namhoc`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT cho bảng `nghenghiep`
--
ALTER TABLE `nghenghiep`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT cho bảng `nguoidung`
--
ALTER TABLE `nguoidung`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT cho bảng `phancong`
--
ALTER TABLE `phancong`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;
--
-- AUTO_INCREMENT cho bảng `phanlop`
--
ALTER TABLE `phanlop`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=371;
--
-- AUTO_INCREMENT cho bảng `thoigianbieu`
--
ALTER TABLE `thoigianbieu`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT cho bảng `thoikhoabieu`
--
ALTER TABLE `thoikhoabieu`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=109;
--
-- AUTO_INCREMENT cho bảng `thuvien`
--
ALTER TABLE `thuvien`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT cho bảng `tiethoc`
--
ALTER TABLE `tiethoc`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=401;
--
-- AUTO_INCREMENT cho bảng `tongiao`
--
ALTER TABLE `tongiao`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT cho bảng `xep_loai_hanh_kiem`
--
ALTER TABLE `xep_loai_hanh_kiem`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=232;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
