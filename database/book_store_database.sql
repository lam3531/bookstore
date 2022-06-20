-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th6 11, 2022 lúc 08:52 AM
-- Phiên bản máy phục vụ: 10.4.18-MariaDB
-- Phiên bản PHP: 8.0.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `book_store`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `admin_id` int(11) NOT NULL,
  `admin_name` varchar(255) NOT NULL,
  `admin_email` varchar(255) NOT NULL,
  `admin_user` varchar(255) NOT NULL,
  `admin_pass` varchar(255) NOT NULL,
  `level` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tbl_admin`
--

INSERT INTO `tbl_admin` (`admin_id`, `admin_name`, `admin_email`, `admin_user`, `admin_pass`, `level`) VALUES
(1, 'Phong', 'phong_admin@gmail.com', 'phong_admin', 'e10adc3949ba59abbe56e057f20f883e', 0),
(2, 'Lam', 'lam@gmail.com', 'lam_admin', 'e10adc3949ba59abbe56e057f20f883e', 0),
(3, 'Quản lý 1', 'qly1@gmail.com', 'qlt1_admin', 'e10adc3949ba59abbe56e057f20f883e', 1),
(4, 'Nhân viên 2', 'nv2@gmail.com', 'nv1_admin', 'e10adc3949ba59abbe56e057f20f883e', 2),
(5, 'Nhân viên 1', 'nv1@gmail.com', 'nv1_admin', 'e10adc3949ba59abbe56e057f20f883e', 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_brand`
--

CREATE TABLE `tbl_brand` (
  `brand_id` int(11) NOT NULL,
  `brand_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tbl_brand`
--

INSERT INTO `tbl_brand` (`brand_id`, `brand_name`) VALUES
(4, 'NXB Giáo Dục Việt Nam'),
(9, 'Nhã Nam'),
(10, 'Nhà Xuất Bản Kim Đồng'),
(11, 'NXB Phụ Nữ Việt Nam'),
(12, 'NXB Tổng hợp HCM'),
(13, 'Hachette Book Group');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_cart`
--

CREATE TABLE `tbl_cart` (
  `cart_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `section_id` varchar(255) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_price` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL,
  `product_image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_category`
--

CREATE TABLE `tbl_category` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tbl_category`
--

INSERT INTO `tbl_category` (`category_id`, `category_name`) VALUES
(1, 'Văn học'),
(2, 'Thiếu nhi'),
(3, 'Sách giáo khoa'),
(4, 'Kinh tế'),
(5, 'Tâm lý kĩ năng'),
(6, 'Sách nước ngoài');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_comment`
--

CREATE TABLE `tbl_comment` (
  `comment_id` int(11) NOT NULL,
  `customer_name` varchar(255) NOT NULL,
  `comment_info` text NOT NULL,
  `product_id` int(11) NOT NULL,
  `blog_id` int(11) NOT NULL,
  `customer_image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tbl_comment`
--

INSERT INTO `tbl_comment` (`comment_id`, `customer_name`, `comment_info`, `product_id`, `blog_id`, `customer_image`) VALUES
(1, 'nfaisfna', '12345', 5, 0, '');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_customer`
--

CREATE TABLE `tbl_customer` (
  `customer_id` int(11) NOT NULL,
  `customer_name` varchar(255) NOT NULL,
  `customer_address` varchar(255) NOT NULL,
  `customer_city` varchar(255) NOT NULL,
  `customer_district` varchar(255) NOT NULL,
  `customer_phone` varchar(10) NOT NULL,
  `customer_email` varchar(255) NOT NULL,
  `customer_password` varchar(255) NOT NULL,
  `customer_ci` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tbl_customer`
--

INSERT INTO `tbl_customer` (`customer_id`, `customer_name`, `customer_address`, `customer_city`, `customer_district`, `customer_phone`, `customer_email`, `customer_password`, `customer_ci`) VALUES
(1, '1', '1', '1', '1', '1', '1@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '1'),
(2, 'hưng ', 'đỗ hwung ', 'hưng ', 'đỗ', '02569875', 'iodky19@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '1234567897'),
(3, 'nguyen van a', 'Khâm Thiên', 'Hà Nội', 'Đống Đa', '012345678', 'a@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '051516165'),
(4, 'àihaifha', 'Khâm Thiên', 'Hà Nội', 'Đống Đa', '0911122410', 'b@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '091212122222');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_order`
--

CREATE TABLE `tbl_order` (
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `product_price` varchar(255) NOT NULL,
  `product_image` varchar(255) NOT NULL,
  `date_order` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tbl_order`
--

INSERT INTO `tbl_order` (`order_id`, `product_id`, `product_name`, `customer_id`, `quantity`, `product_price`, `product_image`, `date_order`, `status`) VALUES
(2, 7, 'Chú Thuật Hồi Chiến', 1, 5, '150000', 'chu_thuat_hoi_chien_-_tap_1_-_ban_thuong.jpg', '2022-06-09 02:53:08', 3),
(3, 7, 'Chú Thuật Hồi Chiến', 2, 3, '90000', 'chu_thuat_hoi_chien_-_tap_1_-_ban_thuong.jpg', '2022-06-09 02:56:34', 3),
(4, 33, 'Bí Mật Tư Duy Triệu Phú', 1, 2, '176000', 'kt1.jpg', '2022-06-09 18:14:54', 3),
(5, 34, 'Outliers: The Story of Success', 1, 3, '507000', 'snn1.jpg', '2022-06-10 02:29:24', 3),
(6, 12, 'Chậm Lại Giữa Thế Gian Vội Vã', 3, 2, '120000', 'vh2.jpg', '2022-06-11 03:03:38', 3),
(7, 34, 'Outliers: The Story of Success', 3, 2, '338000', 'snn1.jpg', '2022-06-11 03:03:38', 3),
(8, 74, ' Ghost Boys', 2, 4, '492000', 'snn5.jpg', '2022-06-11 06:01:52', 3),
(9, 57, 'Rừng Nauy', 4, 1, '130000', 'vh14.jpg', '2022-06-11 06:29:51', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_product`
--

CREATE TABLE `tbl_product` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `category_id` int(11) NOT NULL,
  `brand_id` int(11) NOT NULL,
  `product_desc` varchar(255) NOT NULL,
  `product_image` varchar(255) NOT NULL,
  `product_type` int(11) NOT NULL,
  `product_price` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tbl_product`
--

INSERT INTO `tbl_product` (`product_id`, `product_name`, `category_id`, `brand_id`, `product_desc`, `product_image`, `product_type`, `product_price`) VALUES
(11, 'Nhà Giả Kim', 1, 9, '<p><em>Tất cả những trải nghiệm trong chuyến phi&ecirc;u du theo đuổi vận mệnh của m&igrave;nh đ&atilde; gi&uacute;p Santiago thấu hiểu được &yacute; nghĩa s&acirc;u xa nhất của hạnh ph&uacute;c, h&ograve;a hợp với vũ trụ v&agrave; con người</em><span>.</', 'vh1.jpg', 1, '67000'),
(12, 'Chậm Lại Giữa Thế Gian Vội Vã', 1, 9, '<p>S&aacute;ch văn học&gt;&gt;&gt;&gt;</p>', 'vh2.jpg', 0, '60000'),
(13, 'Cây Cam Ngọt Của Tôi', 1, 9, '<p><span>&ldquo;Vị chua ch&aacute;t của c&aacute;i ngh&egrave;o h&ograve;a trộn với vị ngọt ng&agrave;o khi kh&aacute;m ph&aacute; ra những điều khiến cuộc đời n&agrave;y đ&aacute;ng sống... một t&aacute;c phẩm kinh điển của Brazil.&rdquo;</span></p>', 'vh3.jpg', 1, '92000'),
(14, 'Giết Con Chim Nhại', 1, 9, '<p><span>N&agrave;o, h&atilde;y mở cuốn s&aacute;ch n&agrave;y ra. Bạn phải l&agrave;m quen ngay với bố Atticus của hai anh em - Jem v&agrave; Scout, &ocirc;ng bố luật sư c&oacute; một c&aacute;ch ri&ecirc;ng, để những đứa trẻ của m&igrave;nh cứng.</span>', 'vh4.jpg', 1, '96000'),
(19, 'Bí Mật Của Naoko', 1, 9, '<p>Cuộc sống của Hirasule tr&ocirc;i qua hết sức b&igrave;nh lặng, cho đến một ng&agrave;y tai nạn giao th&ocirc;ng khủng khiếp xảy ra v&agrave; g&atilde; mất đi người vợ y&ecirc;u qu&yacute; nhất của m&igrave;nh, c&ograve;n đứa con g&aacute;i b&eacute;.<', 'vh8.jpg', 1, '95000'),
(20, 'Phía Sau Nghi Can X', 1, 9, '<p>S&aacute;ch văn học&gt;</p>', 'vh9.jpg', 1, '90000'),
(21, 'Hiệu Sách Nhỏ Ở Paris', 1, 9, '<p>S&aacute;ch văn học&gt;&gt;</p>', 'vh10.jpg', 1, '120000'),
(22, 'Hoàng Tử Bé', 2, 10, '<p>S&aacute;ch thiếu nhi</p>', 'tn1.jpg', 0, '33000'),
(23, 'Mẹ Hỏi Bé Trả Lời 2-3 Tuổi', 2, 10, '<p>S&aacute;ch thiếu nhi</p>', 'tn2.jpg', 1, '26000'),
(24, 'Con Sẽ Tự Giác', 2, 10, '<p>S&aacute;ch thiếu nhi</p>', 'tn3.jpg', 1, '42000'),
(25, 'Trong Cái Không Có Gì Không?', 2, 10, '<p>S&aacute;ch thiếu nhi</p>', 'tn4.jpg', 1, '136000'),
(26, 'Vòng Quanh Thế Giới: Mỹ', 2, 10, '<p>S&aacute;ch thiếu nhi</p>', 'tn5.jpg', 1, '10000'),
(27, 'Vòng Quanh Thế Giới: Nhật Bản', 2, 10, '<p>S&aacute;ch thiếu nhi</p>', 'tn6.jpg', 1, '10200'),
(28, 'Vòng Quanh Thế Giới: Thái Lan', 2, 10, '<p>S&aacute;ch thiếu nhi</p>', 'tn7.jpg', 1, '10000'),
(29, 'Vòng Quanh Thế Giới: Việt Nam', 2, 10, '<p>S&aacute;ch thiếu nhi</p>', 'tn8.jpg', 1, '10200'),
(30, 'Dế Mèn Phiêu Lưu Ký ', 2, 10, '<p>S&aacute;ch thiếu nhi</p>', 'tn9.jpg', 1, '42000'),
(31, 'Vì Sao Tớ Yêu Bố', 2, 10, '<p>S&aacute;ch thiếu nhi</p>', 'tn10.jpg', 1, '21000'),
(32, 'Tiếng Anh 12', 3, 4, '<p>S&aacute;ch gi&aacute;o khoa</p>', 'sgk1.jpg', 1, '39000'),
(33, 'Bí Mật Tư Duy Triệu Phú', 4, 12, '<p>S&aacute;ch kinh tế</p>', 'kt1.jpg', 0, '88000'),
(34, 'Outliers: The Story of Success', 6, 13, '<p>S&aacute;ch nước ngo&agrave;i</p>', 'snn1.jpg', 0, '169000'),
(35, 'Ngữ Văn 11', 3, 4, '<p>S&aacute;ch Ngữ Văn 11</p>', 'sgk2.jpg', 1, '10000'),
(36, 'Giải Tích 12', 3, 4, '<p>Giải t&iacute;ch 12</p>', 'sgk3.jpg', 1, '12000'),
(37, 'Vật Lí 12', 3, 4, '<p>Vật L&iacute; 12</p>', 'sgk4.jpg', 1, '13000'),
(38, 'Lịch Sử 7', 3, 4, '<p>Lịch Sử 7</p>', 'sgk5.jpg', 1, '15000'),
(39, 'Hình Học 11', 3, 4, '<p>H&igrave;nh học 11</p>', 'sgk6.jpg', 1, '8000'),
(40, 'Đại Số 10', 3, 4, '<p>Đại Số 10</p>', 'sgk8.jpg', 1, '9000'),
(41, 'Tiếng Việt 3', 3, 4, '<p>Tiếng Việt 3</p>', 'sgk9.jpg', 1, '20000'),
(42, 'Mĩ Thuật ', 0, 0, '<p>Mĩ thuật&nbsp;</p>', 'sgk10.jpg', 1, '10000'),
(43, 'Công Nghệ 7', 3, 4, '<p>C&ocirc;ng nghệ 7</p>', 'sgk11.jpg', 1, '15000'),
(45, 'Giáo Dục Công Dân 7 ', 3, 4, '<p>Gi&aacute;o dục c&ocirc;ng d&acirc;n 7</p>', 'sgk13.jpg', 1, '8000'),
(46, 'Âm Nhạc Và Mĩ Thuật 7', 3, 4, '<p>&Acirc;m nhạc v&agrave; Mĩ thuật 7&nbsp;</p>', 'sgk14.jpg', 1, '20000'),
(47, 'Tin Học 10', 3, 4, '<p>Tin học 10</p>', 'sgk15.jpg', 1, '11000'),
(48, 'Sinh Học 7', 0, 0, '<p>Sinh học 7&nbsp;</p>', 'sgk16.jpg', 1, '16000'),
(49, 'Giáo Dục Quốc Phòng 10', 3, 4, '<p>Gi&aacute;o dục quốc ph&ograve;ng 10</p>', 'sgk17.jpg', 1, '8000'),
(50, 'Địa Lí 7', 3, 4, '<p>Địa l&iacute; 7</p>', 'sgk12.jpg', 1, '15000'),
(51, 'Kỳ Diệu Của Tạp Hóa Namiya', 1, 9, '<p><span>Một đ&ecirc;m vội v&atilde; lẩn trốn sau phi vụ khoắng đồ nh&agrave; người, Atsuya, Shota v&agrave; Kouhei đ&atilde; rẽ v&agrave;o l&aacute;nh tạm trong một căn nh&agrave; hoang b&ecirc;n con dốc vắng người qua lại.</span></p>', 'vh5.jpg', 1, '84000'),
(52, ' Tớ Muốn Ăn Tụy Của Cậu', 1, 9, '<p><span>&ldquo;T&ocirc;i kh&ocirc;ng biết về ng&agrave;y mai của t&ocirc;i - người vẫn c&ograve;n thời gian, nhưng t&ocirc;i đ&atilde; nghĩ ng&agrave;y mai của c&ocirc; ấy - người chẳng c&ograve;n mấy thời gian đ&atilde; được hẹn trước.</span></p>', 'vh6.jpg', 1, '75000'),
(53, 'Chú Bé Mang Pyjama Sọc', 1, 9, '<p><span>Rất kh&oacute; mi&ecirc;u tả c&acirc;u chuyện về Ch&uacute; b&eacute; mang pyjama sọc n&agrave;y.</span></p>', 'vh7.jpg', 1, '54000'),
(54, ' Tàn Ngày Để Lại', 1, 9, '<p><span>Stevens l&agrave; một quản gia người Anh với tất cả mọi h&agrave;m nghĩa của từ n&agrave;y: tận tụy, chỉn chu, trung th&agrave;nh, v&agrave; tr&ecirc;n hết, lu&ocirc;n lu&ocirc;n c&oacute; một &yacute; thức m&atilde;nh liệt về phẩm gi&aacute;.</s', 'vh11.jpg', 1, '143000'),
(55, 'Chiến Binh Cầu Vồng', 1, 9, '<p><span>Trong ng&agrave;y khai giảng, nhờ sự xuất hiện v&agrave;o ph&uacute;t ch&oacute;t của cậu b&eacute; thiểu năng tr&iacute; tuệ Harun, trường Muhammadiyah may mắn tho&aacute;t khỏi nguy cơ đ&oacute;ng cửa.</span></p>', 'vh12.jpg', 1, '92000'),
(56, 'Một Lít Nước Mắt', 1, 9, '<p><em>&ldquo;H&atilde;y sống! M&igrave;nh muốn h&iacute;t thở thật s&acirc;u dưới trời xanh.&rdquo;</em></p>', 'vh13.jpg', 1, '72000'),
(57, 'Rừng Nauy', 1, 9, '<p><span>C&acirc;u chuyện bắt đầu từ một chuyến bay trong ng&agrave;y mưa ảm đạm, một người đ&agrave;n &ocirc;ng 37 tuổi chợt nghe thấy b&agrave;i h&aacute;t gắn liền với h&igrave;nh ảnh người y&ecirc;u cũ, thế l&agrave; qu&aacute; khứ &ugrave;a về.</span', 'vh14.jpg', 1, '130000'),
(58, ' Đừng Bán Bảo Hiểm', 4, 12, '<p><span>L&agrave; cuốn s&aacute;ch t&acirc;m huyết của t&aacute;c giả Pilot Nguyễn, người đ&atilde; trưởng th&agrave;nh từ một tư vấn vi&ecirc;n, nền tảng để anh c&oacute; những trải nghiệm hữu dụng cho những vị tr&iacute; quản l&yacute; cao cấp sau n&ag', 'kt2.jpg', 1, '96000'),
(59, 'Kẻ Hủy Diệt', 4, 12, '<p><span>Đ&acirc;y l&agrave; tuyển tập c&aacute;c b&agrave;i b&aacute;o về c&ocirc;ng nghệ của một c&acirc;y b&uacute;t chuy&ecirc;n về c&ocirc;ng nghệ.</span></p>', 'kt3.jpg', 1, '121000'),
(60, 'Đi Bán Đam Mê', 4, 12, '<p><span>Những năm gần đ&acirc;y đề t&agrave;i khởi nghiệp trở th&agrave;nh đề t&agrave;i t&acirc;m điểm của x&atilde; hội, ai cũng muốn khởi nghiệp, cũng muốn x&acirc;y dựng cơ sở, mở rộng đầu tư sản xuất kinh doanh, g&oacute;p phần l&agrave;m gi&agrave;', 'kt4.jpg', 1, '84000'),
(61, 'Làm Điều Quan Trọng', 4, 12, '<p><strong>L&agrave;m Điều Quan Trọng</strong><span>&nbsp;Google, Intel, Adobe, Youtube,&hellip; đ&atilde; dịch chuyển thế giới bằng OKRs như thế n&agrave;o?</span></p>', 'kt5.jpg', 1, '123000'),
(62, ' Tiktok Marketing', 4, 12, '<p><span>TikTok đang b&ugrave;ng nổ ở mọi nơi v&agrave; đ&atilde; trở th&agrave;nh một trong những ứng dụng được tải xuống nhiều nhất thế giới.</span></p>', 'kt6.jpg', 1, '83000'),
(63, ' Đắc Nhân Tâm', 5, 11, '<p><span>L&agrave; quyển s&aacute;ch của mọi thời đại v&agrave; một hiện tượng đ&aacute;ng kinh ngạc trong ng&agrave;nh xuất bản Hoa Kỳ.</span></p>', 'tlkn1.jpg', 1, '68000'),
(64, ' Càng Kỷ Luật, Càng Tự Do', 5, 11, '<p><span>KỶ LUẬT vốn l&agrave; v&aacute;n cờ bạn phải tự đấu với ch&iacute;nh m&igrave;nh.</span></p>', 'tlkn2.jpg', 1, '82000'),
(65, 'Đi Tìm Lẽ Sống', 5, 11, '<p>ĐI T&Igrave;M LẼ SỐNG CỦA VIKTOR FRANKL L&Agrave; MỘT TRONG NHỮNG QUYỂN S&Aacute;CH KINH ĐIỂN CỦA THỜI ĐẠI.</p>', 'tlkn3.jpg', 1, '62000'),
(66, ' Tư Duy Phản Biện', 5, 11, '<p><span>L&agrave; ch&igrave;a kh&oacute;a để bạn tho&aacute;t khỏi những lối m&ograve;n trong suy nghĩ, gi&uacute;p bạn giải quyết c&aacute;c vấn đề kh&oacute; khăn một c&aacute;ch s&aacute;ng tạo v&agrave; hiệu quả hơn.</span></p>', 'tlkn4.jpg', 1, '51000'),
(67, ' Một Đời Như Kẻ Tìm Đường', 5, 11, '<p><span>Khoảnh khắc kh&oacute; chịu nhất c&oacute; lẽ l&agrave; khi m&igrave;nh đ&atilde; lỡ chọn một hướng đi, nhưng ngộ được rằng con đường n&agrave;y nhiều ch&ocirc;ng gai, lắm r&agrave;o cản v&agrave; lại c&ograve;n kh&ocirc;ng ph&ugrave; hợp.</span>', 'tlkn5.jpg', 1, '148000'),
(68, ' Kỷ Luật Tự Giác', 5, 11, '<p><span>Theo bạn th&igrave;, thế n&agrave;o l&agrave; tự do?</span>&gt;</p>', 'tlkn6.jpg', 1, '67000'),
(69, ' Tâm Lý Học Biểu Cảm', 5, 11, '<p><span>Cuốn s&aacute;ch dạy bạn c&aacute;ch nh&igrave;n thấu người kh&aacute;c một c&aacute;ch r&otilde; r&agrave;ng nhất v&agrave; ch&acirc;n thực nhất</span></p>', 'tlkn7.jpg', 1, '80000'),
(70, '1 Ngày Bằng 48 Giờ', 5, 11, '<p><span>Thời gian mỗi ng&agrave;y của ch&uacute;ng ta chỉ c&oacute; 24 giờ, nếu kh&ocirc;ng c&oacute; phương ph&aacute;p quản l&yacute; hiệu quả, khoa học, bạn sẽ lu&ocirc;n trong t&igrave;nh trạng qu&aacute; tải v&agrave; mệt mỏi v&igrave; kh&ocirc;ng x', 'tlkn8.jpg', 1, '60000'),
(71, ' The Goldfinch', 6, 13, '<p><span>A young New Yorker grieving his mother\'s death is pulled into a gritty underworld of art and wealth in this extraordinary</span></p>', 'snn2.jpg', 1, '207000'),
(72, ' Pachinko', 6, 13, '<p><em>\"There could only be a few winners, and a lot of losers. And yet we played on, because we had hope that we might be the lucky ones.\"</em></p>', 'snn3.jpg', 1, '338000'),
(73, ' Love, Rosie', 6, 13, '<p><span>The basis for the forthcoming motion picture starring Lily Collins and Sam Claflin! What happens when two people who are meant to be together can\'t seem to get it right? Rosie and Alex are destined for each other, and everyone seems to know it bu', 'snn4.jpg', 1, '169000'),
(74, ' Ghost Boys', 6, 13, '<p>A heartbreaking and powerful story about a black boy killed by a police officer, drawing connections through history, from award-winning author Jewell Parker Rhodes&gt;</p>', 'snn5.jpg', 1, '123000');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_slide`
--

CREATE TABLE `tbl_slide` (
  `slide_id` int(11) NOT NULL,
  `slide_name` varchar(255) NOT NULL,
  `slide_type` int(11) NOT NULL,
  `slide_image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tbl_slide`
--

INSERT INTO `tbl_slide` (`slide_id`, `slide_name`, `slide_type`, `slide_image`) VALUES
(5, 'slide1', 1, 'brandday04_2022_1980book_310.jpg'),
(6, 'slide2', 1, 'coupon_310x210bo2.png'),
(7, 'slide3', 1, 'MCBOOKS_310x210.png');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Chỉ mục cho bảng `tbl_brand`
--
ALTER TABLE `tbl_brand`
  ADD PRIMARY KEY (`brand_id`);

--
-- Chỉ mục cho bảng `tbl_cart`
--
ALTER TABLE `tbl_cart`
  ADD PRIMARY KEY (`cart_id`);

--
-- Chỉ mục cho bảng `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`category_id`);

--
-- Chỉ mục cho bảng `tbl_comment`
--
ALTER TABLE `tbl_comment`
  ADD PRIMARY KEY (`comment_id`);

--
-- Chỉ mục cho bảng `tbl_customer`
--
ALTER TABLE `tbl_customer`
  ADD PRIMARY KEY (`customer_id`);

--
-- Chỉ mục cho bảng `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD PRIMARY KEY (`order_id`);

--
-- Chỉ mục cho bảng `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `category_id` (`category_id`,`brand_id`);

--
-- Chỉ mục cho bảng `tbl_slide`
--
ALTER TABLE `tbl_slide`
  ADD PRIMARY KEY (`slide_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `tbl_brand`
--
ALTER TABLE `tbl_brand`
  MODIFY `brand_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT cho bảng `tbl_cart`
--
ALTER TABLE `tbl_cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT cho bảng `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `tbl_comment`
--
ALTER TABLE `tbl_comment`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `tbl_customer`
--
ALTER TABLE `tbl_customer`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `tbl_order`
--
ALTER TABLE `tbl_order`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `tbl_product`
--
ALTER TABLE `tbl_product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- AUTO_INCREMENT cho bảng `tbl_slide`
--
ALTER TABLE `tbl_slide`
  MODIFY `slide_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
