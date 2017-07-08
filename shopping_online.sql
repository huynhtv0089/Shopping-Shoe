-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 28, 2017 at 12:33 PM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shopping_online`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` int(11) NOT NULL COMMENT '0: Super Admin, 1: Admin, 2: Mod'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `role`) VALUES
(0, 'Administrator', 'Acb123acb!@#', 0),
(4, 'adNguyenAn', 'Acb123acb!@#', 2),
(5, 'adVantoan', 'Bbraun123!@#', 1),
(6, 'adHaidung', 'Acb123acb!@#', 1),
(7, 'adVantoan', 'Bbraun0089!@#', 1);

-- --------------------------------------------------------

--
-- Table structure for table `advertisement`
--

CREATE TABLE `advertisement` (
  `id` varchar(255) NOT NULL,
  `width` varchar(255) NOT NULL,
  `height` varchar(255) NOT NULL,
  `picAds` varchar(255) NOT NULL,
  `code` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `advertisement`
--

INSERT INTO `advertisement` (`id`, `width`, `height`, `picAds`, `code`) VALUES
('adsCenter', '800', '140', '', ''),
('adsLeft', '277', '396', 'l4.jpg', '');

-- --------------------------------------------------------

--
-- Table structure for table `banner`
--

CREATE TABLE `banner` (
  `id` varchar(255) NOT NULL,
  `picBanner` varchar(255) NOT NULL,
  `slideTitle_01` varchar(255) NOT NULL,
  `slidePara_01` varchar(255) NOT NULL,
  `slideTitle_02` varchar(255) NOT NULL,
  `slidePara_02` varchar(255) NOT NULL,
  `slideTitle_03` varchar(255) NOT NULL,
  `slidePara_03` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `banner`
--

INSERT INTO `banner` (`id`, `picBanner`, `slideTitle_01`, `slidePara_01`, `slideTitle_02`, `slidePara_02`, `slideTitle_03`, `slidePara_03`) VALUES
('banner', 'banner_img.jpg', 'Mua hàng trực tuyến', 'Bắt đầu mua hàng nào.....', 'Chọn đôi giày bạn thích nhất', 'Bắt đầu mua hàng nào.....', 'Nhiều ưu đãi khi mua hàng trực tuyến', 'Bắt đầu mua hàng nào.....');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `classify` varchar(255) NOT NULL,
  `parents` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `classify`, `parents`) VALUES
(1, 'Nam', 'x', 0),
(2, 'Nữ', 'x', 0),
(3, 'Phụ kiện', 'x', 0),
(4, 'Giày Boot Nam', 'Nam', 1),
(5, 'Giày Thể Thao & Thời Trang Nam', 'Nam', 1),
(6, 'Giày Tây Nam Cao Cấp', 'Nam', 1),
(7, 'Giày SANDAL - Dép Nam', 'Nam', 1),
(8, 'Giày Mọi Nam', 'Nam', 1),
(9, 'Giày Boot Nữ Hàn Quốc', 'Nữ', 2),
(10, 'Giày OXFORD Nữ', 'Nữ', 2),
(11, 'Giày Thể Thao và Thời Trang Nữ', 'Nữ', 2),
(12, 'Giày SANDAL & Cao Gót Nữ', 'Nữ', 2),
(13, 'Giày Mọi & Búp Bê Nữ', 'Nữ', 2),
(14, 'Dây giày', 'Phụ kiện', 3),
(15, 'Vớ', 'Phụ kiện', 3),
(16, 'Đế Lót Giày', 'Phụ kiện', 3);

-- --------------------------------------------------------

--
-- Table structure for table `checkout`
--

CREATE TABLE `checkout` (
  `id` int(11) NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `price` double NOT NULL,
  `size` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL,
  `status` int(2) NOT NULL COMMENT '0: Chưa thanh toán, 1: Thanh toán',
  `discount` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `checkout`
--

INSERT INTO `checkout` (`id`, `name`, `date`, `time`, `price`, `size`, `quantity`, `status`, `discount`, `total`, `id_product`, `id_user`) VALUES
(226, 'test 4', '2012-12-16', '14:50:43', 195000, '37', 1, 0, 20, 156000, 99, 4),
(227, 'test 3', '2016-12-12', '14:53:03', 0, '40', 1, 0, 10, 0, 97, 4);

-- --------------------------------------------------------

--
-- Table structure for table `classify_user`
--

CREATE TABLE `classify_user` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `classify_user`
--

INSERT INTO `classify_user` (`id`, `name`, `description`) VALUES
(0, 'Default User', 'không giảm giá'),
(1, 'Event User', 'Giảm giá 10%'),
(2, 'Vip User', 'Giảm 20%');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `mail` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `name`, `mail`, `subject`, `message`, `date`, `time`) VALUES
(2, 'Nguyen Van B', 'nguyenvana@gmail.com', 'Thank', 'Thank Admin\r\n..............', '0000-00-00', '00:00:00'),
(3, 'Nguyen Van C', 'nguyenvanc@gmail.com', 'Register', 'How to register ?\r\nPlease, teach me !', '2020-11-16', '18:47:56');

-- --------------------------------------------------------

--
-- Table structure for table `footerinfo1`
--

CREATE TABLE `footerinfo1` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `footerinfo1`
--

INSERT INTO `footerinfo1` (`id`, `name`) VALUES
(1, 'VỀ CHÚNG TÔI'),
(2, 'Thương hiệu giày Shopping Online'),
(3, 'Chuyên phân phối các dòng sản phẩm thời trang về giày nổi tiếng: Nike, Adidas, Puma, Converse, Reebok, Vans, Asics, Saucony, Under Armour, New Blance.....'),
(4, ''),
(5, ''),
(6, '');

-- --------------------------------------------------------

--
-- Table structure for table `footerinfo2`
--

CREATE TABLE `footerinfo2` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `footerinfo2`
--

INSERT INTO `footerinfo2` (`id`, `name`) VALUES
(1, 'Liên hệ'),
(2, '0937 423234'),
(3, 'Email: info@shoppingonline.com'),
(4, '46/3 Đường D2, Quận Bình Thạnh, Thành Phố Hồ Chí Minh'),
(5, ''),
(6, '');

-- --------------------------------------------------------

--
-- Table structure for table `license`
--

CREATE TABLE `license` (
  `id` varchar(255) NOT NULL,
  `name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `license`
--

INSERT INTO `license` (`id`, `name`) VALUES
('license', '© Shopping Onlne 2015 Eshop. All Rights Reserved');

-- --------------------------------------------------------

--
-- Table structure for table `logo`
--

CREATE TABLE `logo` (
  `id` varchar(255) NOT NULL,
  `pic` varchar(11) NOT NULL,
  `picName` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `logo`
--

INSERT INTO `logo` (`id`, `pic`, `picName`) VALUES
('logo', 'E', '-Shop');

-- --------------------------------------------------------

--
-- Table structure for table `mail`
--

CREATE TABLE `mail` (
  `id` int(11) NOT NULL,
  `mailUser` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `mail`
--

INSERT INTO `mail` (`id`, `mailUser`) VALUES
(2, 'nguyenvana@gmail.com'),
(6, 'nguyenvand@gmail.com'),
(7, 'nguyenvana@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `map`
--

CREATE TABLE `map` (
  `id` varchar(255) NOT NULL,
  `iframe` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `map`
--

INSERT INTO `map` (`id`, `iframe`) VALUES
('map', '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3919.1123490702!2d106.71352291427937!3d10.802706492303685!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x317528a4441f8fcd%3A0xabd3f22c879216b1!2zNiDEkMaw4budbmcgRDIsIFBoxrDhu51uZyAyNSwgQsOsbmggVGjhuqFuaCwgSOG7kyBDaMOtIE1pbmgsIFZp4buHdCBOYW0!5e0!3m2!1svi!2s!4v1481378515871" width="550" height="250" frameborder="0" style="border:0" allowfullscreen></iframe>');

-- --------------------------------------------------------

--
-- Table structure for table `policy`
--

CREATE TABLE `policy` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `policy`
--

INSERT INTO `policy` (`id`, `name`) VALUES
(1, 'Giao hàng toàn quốc'),
(2, 'Thanh toán khi nhận hàng'),
(3, 'Đổi trả trong 15 ngày'),
(4, 'Đảm bảo chất lượng'),
(5, 'Miễn phí vận chuyển');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `unsigned_name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `content` text NOT NULL,
  `made_in` varchar(255) NOT NULL,
  `price` double NOT NULL,
  `discount` int(11) NOT NULL COMMENT 'giảm giá %',
  `image_link` varchar(255) NOT NULL COMMENT 'Lưu link file ảnh minh họa cho sản phẩm',
  `image_list` varchar(255) NOT NULL COMMENT 'Lưu danh sách link file ảnh kèm theo cho sản phẩm',
  `size` varchar(255) NOT NULL,
  `category_id` int(11) NOT NULL,
  `hotProduct` int(11) NOT NULL COMMENT '0: Không hiển thị, 1: Hiển thị'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `name`, `unsigned_name`, `description`, `content`, `made_in`, `price`, `discount`, `image_link`, `image_list`, `size`, `category_id`, `hotProduct`) VALUES
(1, 'Sed ut perspiciatis', '', 'Silver beet shallot wakame tomatillo salsify mung bean beetroot groundnut.', '', 'Germany ', 329, 0, 'p1.jpg', 'si.jpg, si1.jpg, si2.jpg', 'S, L, M, XL, XXL', 4, 1),
(2, 'great explorer', '', 'Wattle seed bunya nuts spring onion okra garlic bitterleaf zucchini. ', '', 'Thailand', 599.8, 0, 'p2.jpg', 'si.jpg, si1.jpg, si2.jpg', 'M, L, XL, XXL', 4, 0),
(3, 'similique sunt', '', 'Kohlrabi bok choy broccoli rabe welsh onion spring onion tatsoi ricebean kombu chard.', '', 'Singapore', 359.6, 0, 'p3.jpg', 'si.jpg, si1.jpg, si2.jpg', 'M, L, XL, XXL', 4, 0),
(4, 'shrinking', '', 'Kohlrabi bok choy broccoli rabe welsh onion spring onion tatsoi ricebean kombu chard. ', '', 'Malaysia', 649.99, 0, 'p4.jpg', 'si.jpg, si1.jpg, si2.jpg', 'M, L, XL, XXL', 4, 0),
(5, 'perfectly simple', '', 'Kohlrabi bok choy broccoli rabe welsh onion spring onion tatsoi ricebean kombu chard.', '', 'VietNam', 750, 0, 'p5.jpg', 'si.jpg, si1.jpg, si2.jpg', 'M, L, XL, XXL', 4, 0),
(6, 'equal blame', '', 'Kohlrabi bok choy broccoli rabe welsh onion spring onion tatsoi ricebean kombu chard. ', '', 'USA', 295.59, 0, 'p6.jpg', 'si.jpg, si1.jpg, si2.jpg', 'M, L, XL, XXL', 5, 0),
(7, 'Neque porro', '', 'Kohlrabi bok choy broccoli rabe welsh onion spring onion tatsoi ricebean kombu chard. ', '', 'Japan', 289, 0, 'p7.jpg', 'si.jpg, si1.jpg, si2.jpg', 'M, L, XL, XXL', 5, 0),
(8, 'perfectly simple', '', 'Kohlrabi bok choy broccoli rabe welsh onion spring onion tatsoi ricebean kombu chard. ', '', 'VietNam', 540.6, 0, 'p8.jpg', 'si.jpg, si1.jpg, si2.jpg', 'M, L, XL, XXL', 5, 0),
(9, 'praising pain', '', 'Kohlrabi bok choy broccoli rabe welsh onion spring onion tatsoi ricebean kombu chard. ', '', 'ThaiLan', 229.5, 0, 'p9.jpg', 'si.jpg, si1.jpg, si2.jpg', 'M, L, XL, XXL', 5, 0),
(10, 'Giày Boot Cổ Lửng Đen G100', '', 'Giày Boot Cổ Lửng Đen G100 với kiểu dáng cực kỳ sành điệu, màu sắc sang trọng.', 'Bạn sẽ bị thu hút bởi những đường nét tinh tế, tỉ mỉ từng chi tiết nhỏ. Chất da mềm mịn, bền đẹp chinh phục cả những quý ông khó tính nhất. Độc quyền tại 4MEN.', 'Viet Nam  ', 745, 0, 'g1.jpg', 'g1.jpg, g2.jpg, g3.jpg', '39, 40, 41, 42', 5, 0),
(43, 'Giày Boot Đen G90', '', 'Giày Boot Đen G90 - yêu ngay từ cái nhìn đầu tiên với màu đen sang trọng, kiểu dáng cực kỳ sành điệu.', 'Đường may tinh tế, tỉ mỉ từng chi tiết nhỏ. Chất da mềm mịn, bền đẹp chinh phục cả những quý ông khó tính nhất. Độc quyền tại 4MEN.', 'Viet Nam', 745, 0, 'a1.jpg', 'a1.jpg, a2.jpg, a3.jpg', '38, 39, 40, 41, 43', 5, 0),
(45, 'Giày Boot Cổ Cao Đen G101', '', 'Giày Boot Cổ Cao Đen G101 nổi bật với màu đen cá tính, hiện đại.', 'Chất da mềm mịn, bền đẹp, tạo cảm giác thoải mái, êm ái khi sử dụng. Đường nét thiết kế tinh tế, chỉ may cùng màu tỉ mỉ, chắc chắn. Kiểu boot cổ cao sành điệu, thích hợp cho những chàng trại bụi bặm, cá tính.', 'Viet Nam', 745, 0, 'b1.jpg', 'b1.jpg, b2.jpg, b3.jpg', '38, 39, 40, 41, 42, 43', 6, 0),
(46, 'Giày Boot Nâu G90', '', 'Giày Boot Nâu G90 - yêu ngay từ cái nhìn đầu tiên với màu nâu sang trọng, kiểu dáng cực kỳ sành điệu.', 'Đường may tinh tế, tỉ mỉ từng chi tiết nhỏ. Chất da mềm mịn, bền đẹp chinh phục cả những quý ông khó tính nhất. Độc quyền tại 4MEN.', 'Viet Nam', 745, 0, 'c1.jpg', 'c1.jpg, c2.jpg, c3.jpg', '38, 39, 40, 41, 42, 43', 6, 0),
(52, 'Giày Boot Cổ Lửng Nâu G100', '', 'Giày Boot Cổ Lửng Nâu G100 với kiểu dáng cực kỳ sành điệu, màu sắc sang trọng. ', 'Bạn sẽ bị thu hút bởi những đường nét tinh tế, tỉ mỉ từng chi tiết nhỏ. Chất da mềm mịn, bền đẹp chinh phục cả những quý ông khó tính nhất. Độc quyền tại 4MEN.', 'Viet Nam ', 745, 10, 'd1.jpg', 'd1.jpg, d2.jpg', '38, 39, 40, 41, 42', 6, 0),
(58, 'SHORT NỮ 076004 -1', '', '', '', 'Viet Nam', 195, 0, 'chan_vay_2900__1__500x750.jpg', 'chan_vay_2900__1__500x750.jpg, SHORT_NU_076004__1_(chan_vay_29_(2)).jpg, SHORT_NU_076004__1_(chan_vay_29_(3)).jpg', '38, 39, 40, 41, 42', 6, 0),
(59, 'SHORT NỮ 096001', '', '', '', 'Viet Nam', 195, 0, 'chan_vay_nu_14__4__500x750.jpg', 'chan_vay_nu_14__4__500x750.jpg, SHORT_NU_096001_(chan_vay_nu_14_(1)).jpg, SHORT_NU_096001_(chan_vay_nu_14_(3)).jpg', '38, 39, 40, 41, 42', 6, 0),
(60, 'CHÂN VÁY 086043WH', '', '', '', 'Viet Nam', 195, 0, 'chan_vay_18__4__500x750.jpg', 'chan_vay_18__4__500x750.jpg, CHAN_VAY_086043WH_(chan_vay_18_(1)).jpg, CHAN_VAY_086043WH_(chan_vay_18_(3)).jpg', '39, 40, 41, 42, 43', 6, 0),
(61, 'CHÂN VÁY 086043BL', '', '', '', 'Viet Nam', 195, 0, 'chan_vay_22__4__500x750.jpg', 'chan_vay_22__4__500x750.jpg, CHAN_VAY_086043BL_(chan_vay_22_(1)).jpg, CHAN_VAY_086043BL_(chan_vay_22_(3)).jpg', 'S, M, L, XL, XXL', 6, 0),
(62, 'CHÂN VÁY 086042BL', '', '', '', 'Viet Nam', 195, 0, 'chan_vay_17__3__500x750.jpg', 'chan_vay_17__3__500x750.jpg, chan_vay_22__4__500x750.jpg, CHAN_VAY_086042BL_(chan_vay_17_(2)).jpg', 'S, M, L, XL, XXL', 6, 0),
(63, 'CHÂN VÁY 086041BL', '', '', '', 'Viet Nam', 195, 0, 'CHAN_VAY_21__4__500x750.jpg', 'CHAN_VAY_21__4__500x750.jpg, CHAN_VAY_086041BL_(chan_vay_21_(2)).jpg, CHAN_VAY_086041BL_(chan_vay_21_(3)).jpg', 'M, L, XL, XXL', 6, 0),
(64, 'CHÂN VÁY 086041GR', '', '', '', 'Viet Nam', 195, 0, 'chan_vay_19__3__500x750.jpg', 'chan_vay_19__3__500x750.jpg, CHAN_VAY_086041GR_(chan_vay_19_(1)).jpg, CHAN_VAY_086041GR_(chan_vay_19_(2)).jpg', 'M, L, XL, XXL', 6, 0),
(65, 'GIÀY NỮ 096004', '', '', '', 'Viet Nam', 260, 0, 'giay_nma_20__3__500x750.jpg', 'giay_nma_20__3__500x750.jpg, GIAY_NU_096004_(giay_nma_20_(1)).jpg, GIAY_NU_096004_(giay_nma_20_(2)).jpg', '37, 38, 39, 40, 41, 42', 7, 0),
(66, 'GIÀY NỮ 096003', '', '', '', 'Viet Nam', 260, 0, 'giay_nam_21__3__500x750.jpg', 'giay_nam_21__3__500x750.jpg, GIAY_NU_096003_(giay_nam_21_(1)).jpg, GIAY_NU_096003_(giay_nam_21_(2)).jpg', '37, 38, 39, 40, 41, 42', 7, 0),
(67, 'GIÀY NỮ 096002', '', '', '', 'Viet Nam', 260, 0, 'giay_nam_18__3__500x750.jpg', 'giay_nam_18__3__500x750.jpg, GIAY_NU_096002_(giay_nam_18_(1)).jpg, GIAY_NU_096002_(giay_nam_18_(2)).jpg', '37, 38, 39, 40, 41, 42, 43', 8, 0),
(68, 'GIÀY NỮ 066007', '', '', '', 'Viet Nam', 205, 0, 'dep_nam_4__3__500x750.jpg', 'dep_nam_4__3__500x750.jpg, GiAY_NU_066007_(dep_nam_4_(1)).jpg, GiAY_NU_066007_(dep_nam_4_(2)).jpg', '37, 38, 39, 40, 41, 42, 43', 7, 0),
(69, 'GIÀY NỮ 066006', '', '', '', 'Viet Nam', 205, 0, 'dep_nam_5__4__500x750.jpg', 'dep_nam_5__4__500x750.jpg, GiAY_NU_066006_(dep_nam_5_(1)).jpg, GiAY_NU_066006_(dep_nam_5_(2)).jpg, GiAY_NU_066006_(dep_nam_5_(3)).jpg, GiAY_NU_066006_(dep_nam_5_(6)).jpg', '36, 37, 38, 39, 40, 41, 42, 43, 44', 7, 0),
(70, 'SHORT NỮ 096002', '', '', '', 'Viet Nam', 195, 0, 'short_nu_2__4__500x750.jpg', 'short_nu_2__4__500x750.jpg, SHORT_NU_096002_(short_nu_2_(1)).jpg, SHORT_NU_096002_(short_nu_2_(3)).jpg', 'S, M, L, XL, XXL', 8, 0),
(71, 'SHORT NỮ 086018', '', '', '', 'Viet Nam', 195, 0, 'jean_nu_2__3__500x750.jpg', 'jean_nu_2__3__500x750.jpg, SHORT_NU_086018_(jean_nu_2_(1)).jpg, SHORT_NU_086018_(jean_nu_2_(2)).jpg', '36, 37, 38, 39, 40, 41, 42, 43, 44', 7, 1),
(72, 'SHORT NỮ 086009', '', '', '', 'Viet Nam', 195, 0, 'short_nu_33__2__500x750.jpg', 'short_nu_33__2__500x750.jpg, SHORT_NU_086009_(short_nu_33_(1)).jpg, SHORT_NU_086009_(short_nu_33_(3)).jpg', '36, 37, 38, 39, 40, 41, 42, 43', 8, 1),
(73, 'SHORT NỮ 066024', '', '', '', 'Viet Nam', 195, 0, 'yem_k221__5__500x750.jpg', 'SHORT_NU_066024_(yem_k221_(2)).jpg, SHORT_NU_066024_(yem_k221_(3)).jpg, SHORT_NU_066024_(yem_k221_(4)).jpg, yem_k221__5__500x750.jpg', '36, 37, 38, 39, 40, 41, 42, 43, 44', 8, 1),
(74, 'SHORT NỮ 066005', '', '', '', 'Viet Nam', 195, 0, 'yem_nu_6__3__500x750.jpg', 'SHORT_NU_066005_(yem_nu_6_(1)).jpg, SHORT_NU_066005_(yem_nu_6_(2)).jpg, SHORT_NU_066005_(yem_nu_6_(4)).jpg, yem_nu_6__3__500x750.jpg', '37, 38, 39, 40, 41, 42, 43', 8, 1),
(75, 'KHOÁC KAKI 106003BL', 'khoac-kaki-106003bl', '', '', ' ', 630, 0, 'khoac_nam_n15_(2).jpg', 'khoac_nam_n15_(2).jpg, khoac_nam_n15_(3).jpg, khoac_nam_n15_(4).jpg', 'S, M, L, XL, XXL', 9, 0),
(94, 'test 1', '', '', '', '', 0, 0, 'GiAY_NU_066006_(dep_nam_5_(1)) - Copy.jpg', 'GiAY_NU_066006_(dep_nam_5_(2)) - Copy.jpg', 'S, M, L', 9, 0),
(96, 'test 2', '', '', '', '', 0, 0, 'GiAY_NU_066006_(dep_nam_5_(1)) - Copy.jpg', 'GiAY_NU_066006_(dep_nam_5_(2)) - Copy.jpg', '36, 37, 38, 39, 40, 41, 42', 9, 0),
(97, 'test 3', '', '', '', '', 0, 0, 'GiAY_NU_066006_(dep_nam_5_(1)).jpg', 'GiAY_NU_066006_(dep_nam_5_(1)).jpg', '40, 41, 42, 43, 44', 9, 0),
(99, 'test 4', '', '', '', '   ', 195000, 10, 'GIAY_NU_096004_(giay_nma_20_(2)).jpg', 'dep_nam_5__4__500x750.jpg, GiAY_NU_066006_(dep_nam_5_(1)) - Copy.jpg, GiAY_NU_066006_(dep_nam_5_(1)).jpg', '37, 38, 39, 40, 41', 9, 1),
(100, 'Giày da cổ thấp test 5', 'giay-da-co-thap-test-5', '', '', ' ', 0, 0, 'GIAY_NU_096003_(giay_nam_21_(2)).jpg', 'GIAY_NU_096003_(giay_nam_21_(1)).jpg, GIAY_NU_096003_(giay_nam_21_(2)).jpg, GIAY_NU_096004_(giay_nma_20_(1)).jpg, GIAY_NU_096004_(giay_nma_20_(2)).jpg', '37, 38, 39, 40', 8, 0);

-- --------------------------------------------------------

--
-- Table structure for table `quantity_item`
--

CREATE TABLE `quantity_item` (
  `id` int(11) NOT NULL,
  `size` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL,
  `id_product` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `quantity_item`
--

INSERT INTO `quantity_item` (`id`, `size`, `quantity`, `id_product`) VALUES
(422, '36', 80, 96),
(423, '37', 90, 96),
(424, '38', 90, 96),
(425, '39', 80, 96),
(426, '40', 90, 96),
(427, '41', 90, 96),
(428, '42', 90, 96),
(429, 'S', 49, 94),
(430, 'M', 100, 94),
(431, 'L', 100, 94),
(432, '40', 49, 97),
(433, '41', 45, 97),
(434, '42', 50, 97),
(435, '43', 50, 97),
(436, '44', 50, 97),
(437, '39', 150, 10),
(438, '40', 150, 10),
(439, '41', 150, 10),
(440, '42', 150, 10),
(441, '38', 20, 98),
(442, '39', 30, 98),
(443, '40', 20, 98),
(444, '41', 49, 98),
(445, '37', 4, 99),
(446, '38', 20, 99),
(447, '39', 20, 99),
(448, '40', 20, 99),
(449, '41', 20, 99),
(460, 'S', 470, 75),
(461, 'M', 100, 75),
(462, 'L', 40, 75),
(463, 'XL', 50, 75),
(464, 'XXL', 1000, 75),
(468, '37', 500, 100),
(469, '38', 500, 100),
(470, '39', 50, 100),
(471, '40', 50, 100);

-- --------------------------------------------------------

--
-- Table structure for table `service`
--

CREATE TABLE `service` (
  `id` varchar(255) NOT NULL,
  `picCol_01` varchar(255) NOT NULL,
  `paraCol_01` varchar(255) NOT NULL,
  `titleCol_01` varchar(255) NOT NULL,
  `picCol_02` varchar(255) NOT NULL,
  `titleCol_02` varchar(255) NOT NULL,
  `paraCol_02` varchar(255) NOT NULL,
  `picCol_03` varchar(255) NOT NULL,
  `paraCol_03` varchar(255) NOT NULL,
  `titleCol_03` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `service`
--

INSERT INTO `service` (`id`, `picCol_01`, `paraCol_01`, `titleCol_01`, `picCol_02`, `titleCol_02`, `paraCol_02`, `picCol_03`, `paraCol_03`, `titleCol_03`) VALUES
('service', 'shipping.png', 'Order online', 'Tel:999 4567 8902', 'shipping02.png', 'on orders over $199', 'Free Shipping', 'shipping03.png', 'Order online', 'Tel:999 4567 8902');

-- --------------------------------------------------------

--
-- Table structure for table `tag`
--

CREATE TABLE `tag` (
  `id` varchar(255) NOT NULL,
  `tagHTML` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tag`
--

INSERT INTO `tag` (`id`, `tagHTML`) VALUES
('tag', 'Kitesurf, Super, Duper, Theme, Men, Women, Equipment, Best, Accessories, Men, Apparel, Super, Duper, Theme, Responsive, Women, Equipment');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `firstname` varchar(255) DEFAULT NULL,
  `lastname` varchar(255) DEFAULT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` int(11) NOT NULL,
  `address` text NOT NULL,
  `classify_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `firstname`, `lastname`, `username`, `password`, `email`, `phone`, `address`, `classify_id`) VALUES
(1, 'Kristi E', 'Farmer', 'KristiEFarmer', 'Novocain0089))*(', 'KristiEFarmer@gmail.com', 1656257313, 'quan 3', 1),
(3, 'Paul V', 'Hollars', 'PaulVHollars', 'Abc123!@#', 'PaulVHollars@dayrep.com', 0, '', 2),
(4, 'Nguyen', 'Van A', 'nguyenvana', 'Novocain0089!@#', 'nguyenvana@gmail.com', 938869134, 'Quan 12', 1),
(5, 'William B', 'Shaffer', 'Whadearbary', 'ahShoh8Iecai!', 'WilliamBShaffer@jourrapide.com', 938869146, '4037 Briarwood Road', 0),
(6, 'Jennifer R', 'Alvarez', 'Maketter', 'eechoo1Ah!', 'JenniferRAlvarez@dayrep.com', 938869146, 'q1', 0),
(16, 'Theresa G', 'Gerdes', 'Spichs1931', 'ieC5VaeSae!', 'TheresaGGerdes@teleworm.us', 938869146, '2206 Tyler Avenue', 0),
(17, 'Charles I', 'Cheatham', 'Adaughicell1970', 'eeh3no3Oo!', 'CharlesICheatham@jourrapide.com', 938869133, '2305 Happy Hollow Road', 0),
(18, 'Bruce S', 'Dodd', 'Lonsed', 'aef5Ookai!', 'BruceSDodd@teleworm.us', 938878123, '2356 Despard Street', 0),
(22, 'Fannie R', 'Wright', 'Thavalwary', 'Aej0Itie2ja!', 'FannieRWright@rhyta.com', 938869146, '699 Raoul Wallenberg Place', 0),
(23, 'Peggy A', 'Nelson', 'Foresting', 'QuuzaeQuua5w1!', 'PeggyANelson@rhyta.com', 938869146, '4661 Hamilton Drive', 0),
(24, 'James J', 'Anderson', 'Therul', 'da6johCoda!', 'JamesJAnderson@jourrapide.com', 938869146, '4239 Kelly Drive', 0),
(25, 'Samuel K', 'Phillips', 'Hushan87', 'ucahThiep2!', 'SamuelKPhillips@teleworm.us', 938869146, '973 Holt Street', 0),
(26, 'Lakeshia K', 'Farley', 'Lorguir', 'Aix1sabie!', 'LakeshiaKFarley@rhyta.com', 938869146, '699 Raoul Wallenberg Place', 0),
(27, 'Peggy J', 'Cardwell', 'Ruiter', 'uphuNg6wahPh!', 'FannieRWright@rhyta.com', 938869146, '699 Raoul Wallenberg Place', 0),
(28, 'Earl I', 'Gaines', 'Fation', 'kiTiech7lie!', 'EarlIGaines@rhyta.com', 938869133, '1086 Golden Ridge Road', 0),
(29, 'Antonio L', 'Cheney', 'Hatratilis', 'Nuraes5cahy!', 'AntonioLCheney@armyspy.com', 938869133, '2560 Chipmunk Lane', 0),
(30, 'Virgie G', 'Hesser', 'Preal1968', 'Ebeleer5th!', 'VirgieGHesser@jourrapide.com', 938869133, '492 Poplar Chase Lane', 0),
(31, 'Christopher L', 'Childress', 'Wenteread', 'aeh4uiCh!', 'ChristopherLChildress@rhyta.com', 938869146, '1486 Gladwell Street', 0),
(32, 'Gary D', 'Thomas', 'Fighbrich', 'UeBohsh3hai!', 'GaryDThomas@rhyta.com', 938869133, '3551 Corpening Drive', 0),
(33, 'Alan D', 'Stolte', 'Eaunded', 'faij2jiePh!', 'AlanDStolte@dayrep.com', 938869146, '780 Meadow Drive', 0),
(34, 'Nguyen', 'Van A', 'nguyenvanl', 'Novocain0089!@#', 'nguyenvanl@gmail.com', 938878123, 'Quan 12', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `advertisement`
--
ALTER TABLE `advertisement`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `banner`
--
ALTER TABLE `banner`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `checkout`
--
ALTER TABLE `checkout`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `classify_user`
--
ALTER TABLE `classify_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `footerinfo1`
--
ALTER TABLE `footerinfo1`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `footerinfo2`
--
ALTER TABLE `footerinfo2`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `license`
--
ALTER TABLE `license`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `logo`
--
ALTER TABLE `logo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mail`
--
ALTER TABLE `mail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `policy`
--
ALTER TABLE `policy`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `quantity_item`
--
ALTER TABLE `quantity_item`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `service`
--
ALTER TABLE `service`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tag`
--
ALTER TABLE `tag`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `checkout`
--
ALTER TABLE `checkout`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=228;
--
-- AUTO_INCREMENT for table `classify_user`
--
ALTER TABLE `classify_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `footerinfo1`
--
ALTER TABLE `footerinfo1`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `footerinfo2`
--
ALTER TABLE `footerinfo2`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `mail`
--
ALTER TABLE `mail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `policy`
--
ALTER TABLE `policy`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;
--
-- AUTO_INCREMENT for table `quantity_item`
--
ALTER TABLE `quantity_item`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=472;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
