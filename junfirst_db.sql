-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 07, 2018 at 11:39 AM
-- Server version: 10.1.29-MariaDB
-- PHP Version: 7.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `junfirst_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_brands`
--

CREATE TABLE `tbl_brands` (
  `id` int(11) NOT NULL,
  `brand_name` varchar(32) NOT NULL,
  `brand_image` varchar(120) NOT NULL,
  `status` enum('1','0') NOT NULL,
  `created_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_brands`
--

INSERT INTO `tbl_brands` (`id`, `brand_name`, `brand_image`, `status`, `created_on`) VALUES
(3, 'brand1', 'letters-2077227_960_720.png', '1', '2018-06-04 15:01:29'),
(4, 'brand2', 'Baltimore_Ravens_B.png', '1', '2018-06-04 15:01:44'),
(5, 'Nike', 'nike.png', '1', '2018-06-05 13:00:30'),
(8, 'adidas', 'logo-adidas.png', '1', '2018-06-05 13:02:50'),
(10, 'wrwer', 'logo-converse.png', '1', '2018-06-06 16:29:28'),
(11, 'rtet', 'large_weaintgotnohistory.com.minimal.png', '0', '2018-06-06 16:29:35');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_colors`
--

CREATE TABLE `tbl_colors` (
  `id` int(11) NOT NULL,
  `color_name` varchar(32) NOT NULL,
  `status` enum('1','0') NOT NULL,
  `created_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_colors`
--

INSERT INTO `tbl_colors` (`id`, `color_name`, `status`, `created_on`) VALUES
(1, 'red', '1', '2018-06-04 00:00:00'),
(2, 'green', '1', '0000-00-00 00:00:00'),
(3, 'blue', '1', '0000-00-00 00:00:00'),
(4, 'white', '1', '0000-00-00 00:00:00'),
(5, 'black', '1', '0000-00-00 00:00:00'),
(6, 'yellow', '1', '0000-00-00 00:00:00'),
(7, 'orange', '1', '0000-00-00 00:00:00'),
(8, 'pink', '1', '0000-00-00 00:00:00'),
(9, 'maroon', '1', '0000-00-00 00:00:00'),
(10, 'brown', '1', '0000-00-00 00:00:00'),
(11, 'voilet', '1', '0000-00-00 00:00:00'),
(12, 'grey', '1', '0000-00-00 00:00:00'),
(13, 'gold', '1', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_designs`
--

CREATE TABLE `tbl_designs` (
  `id` int(11) NOT NULL,
  `design_name` varchar(32) NOT NULL,
  `design_image` varchar(120) NOT NULL,
  `status` enum('1','0') NOT NULL,
  `created_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_designs`
--

INSERT INTO `tbl_designs` (`id`, `design_name`, `design_image`, `status`, `created_on`) VALUES
(1, 'design1', 'men-formal-shirts-500x500.jpg', '1', '2018-06-04 14:56:15'),
(2, 'teste', 'images (4).jpg', '1', '2018-06-05 13:31:24');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_products`
--

CREATE TABLE `tbl_products` (
  `id` int(11) NOT NULL,
  `name` varchar(48) NOT NULL,
  `price` float NOT NULL,
  `color_id` int(11) NOT NULL,
  `brand_id` int(11) NOT NULL,
  `design_id` int(11) NOT NULL,
  `size` varchar(11) NOT NULL,
  `image` varchar(64) NOT NULL,
  `description` varchar(325) NOT NULL,
  `quantity` int(11) NOT NULL,
  `tax` float NOT NULL,
  `shipping_charges` float NOT NULL,
  `cash_on_delivery` enum('0','1') NOT NULL,
  `remaining_items` int(11) NOT NULL,
  `status` enum('1','0') NOT NULL,
  `created_on` datetime NOT NULL,
  `updated_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_products`
--

INSERT INTO `tbl_products` (`id`, `name`, `price`, `color_id`, `brand_id`, `design_id`, `size`, `image`, `description`, `quantity`, `tax`, `shipping_charges`, `cash_on_delivery`, `remaining_items`, `status`, `created_on`, `updated_on`) VALUES
(1, '232', 100, 1, 3, 1, 's', 'men-s-party-wear-shirt-500x500.jpg', 'this is test description this is test description this is test description this is test description this is test description this is test description this is test description this is test description this is test description ', 100, 0, 0, '0', 100, '1', '0000-00-00 00:00:00', '2018-06-07 09:21:41'),
(2, 'product1', 100, 3, 3, 1, 's', 'images (6).jpg', 'this is test description this is test description this is test description this is test description this is test description this is test description this is test description this is test description this is test description ', 100, 0, 0, '1', 100, '1', '0000-00-00 00:00:00', '2018-06-07 09:21:41'),
(3, 'dfgg', 1200, 4, 4, 1, 'm', 'ea7b0b3d066597639e040ff9087474f1.jpg', 'this is test description this is test description this is test description this is test description this is test description this is test description this is test description this is test description this is test description this is test description this is test description ', 100, 0, 10, '0', 100, '1', '0000-00-00 00:00:00', '2018-06-07 09:21:41'),
(4, 'dgfd', 2299, 3, 3, 1, 'xxl', 'men-s-party-wear-shirt-500x500.jpg', 'this is test description this is test description this is test description this is test description this is test description this is test description this is test description this is test description this is test description this is test description this is test description this is test description this is test description ', 100, 0, 20, '0', 100, '1', '0000-00-00 00:00:00', '2018-06-07 09:21:41'),
(5, 'ssdfs', 1000, 5, 8, 1, 'l', 'images (5).jpg', 'this is test description.this is test description.this is test description. this is test description.this is test description.this is test description.this is test description.this is test description.this is test description.this is test description.this is test description.this is test description.this is test description', 100, 0, 0, '0', 100, '1', '0000-00-00 00:00:00', '2018-06-07 09:21:41'),
(6, 'product6', 1200, 2, 4, 1, 'xl', 'men-s-maroon-party-wear-shirt-500x500.jpg', 'sfd ds fdsd dssdf s sdfdss sf sfdsfsfs sdf sfsd fsfsf sfsf sfsfd ds fdsd dssdf s sdfdss sf sfdsfsfs sdf sfsd fsfsf sfsf sfsfd ds fdsd dssdf s sdfdss sf sfdsfsfs sdf sfsd fsfsf sfsf sfsfd ds fdsd dssdf s sdfdss sf sfdsfsfs sdf sfsd fsfsf sfsf sfsfd ds fdsd dssdf s sdfdss sf sfdsfsfs sdf sfsd fsfsf sfsf sfsfd ds fdsd dssdf s ', 100, 0, 0, '0', 100, '1', '0000-00-00 00:00:00', '2018-06-07 09:21:41'),
(7, 'product7', 500, 4, 5, 1, 'm', 'download (2).jpg', 'asad sda dadsaadsdad adsadad aadsadasdad asd sda dsadasd ada dsdada ad a ad asda dsadadadda asdadasd aasad sda dadsaadsdad adsadad aadsadasdad asd sda dsadasd ada dsdada ad a ad asda dsadadadda asdadasd aasad sda dadsaadsdad adsadad aadsadasdad asd sda dsadasd ada dsdada ad a ad asda dsadadadda asdadasd a', 100, 0, 0, '0', 100, '1', '0000-00-00 00:00:00', '2018-06-07 09:21:41'),
(8, 'product8', 1500, 3, 8, 1, 'xl', 'logo-adidas.png', 'sdfs dfs sfsfsf sfs sdfsd sf sdf sfsdfsfsfs sdsdfsfsds fsdfsfdf sdfsfssfs sd sfsfsfsf sfsdfd d dfsfs sdfsd sf sdfsfsfsfsfs sdfsdfsdfsdfsressr sref sd sfsdfsfs dsf sdfs fsdf sfs fs fs', 100, 0, 0, '1', 100, '1', '0000-00-00 00:00:00', '2018-06-07 09:21:41'),
(9, 'product9', 2000, 8, 4, 1, 'l', 'men-formal-shirts-500x500.jpg', 'adsadadsadsa ad as ad asd asd asad asdsd asd adas dasdas dad a asd asdsadaadasdwedszsef e wer wse reser s esre sdfs fst rtss tadsadadsadsa ad as ad asd asd asad asdsd asd adas dasdas dad a asd asdsadaadasdwedszsef e wer wse reser s esre sdfs fst rtss t', 100, 0, 0, '0', 100, '1', '0000-00-00 00:00:00', '2018-06-07 09:21:41'),
(10, 'product10', 600, 7, 3, 2, 'l', 'images (4).jpg', 'sfdsfsdfsds fsdf sdssfsd fsfsdfs fsddfsdfs fsdf sdfs fsf sdfsf dfsf sdsf sfsfsdfsdfsfsdfs sdfsd fsdfsdfdsf sf sdfsd fsdfsdfds fsdf sdfsfs sdf sd fssfdsfsdfsds fsdf sdssfsd fsfsdfs fsddfsdfs fsdf sdfs fsf sdfsf dfsf sdsf sfsfsdfsdfsfsdfs sdfsd fsdfsdfdsf sf sdfsd fsdfsdfds fsdf sdfsfs sdf sd fs', 100, 0, 0, '0', 100, '1', '0000-00-00 00:00:00', '2018-06-07 09:21:41'),
(11, 'product11', 600, 4, 5, 2, 'l', 'ra,unisex_tshirt,x2950,fafafa_ca443f4786,front-c,648,590,750,100', 'sfdsfsdfsds fsdf sdssfsd fsfsdfs fsddfsdfs fsdf sdfs fsf sdfsf dfsf sdsf sfsfsdfsdfsfsdfs sdfsd fsdfsdfdsf sf sdfsd fsdfsdfds fsdf sdfsfs sdf sd fssfdsfsdfsds fsdf sdssfsd fsfsdfs fsddfsdfs fsdf sdfs fsf sdfsf dfsf sdsf sfsfsdfsdfsfsdfs sdfsd fsdfsdfdsf sf sdfsd fsdfsdfds fsdf sdfsfs sdf sd fs', 100, 0, 50, '0', 100, '1', '0000-00-00 00:00:00', '2018-06-07 09:21:41'),
(12, 'product12', 450, 9, 8, 2, 'l', 'download (1).jpg', 'sfdsfsdfsds fsdf sdssfsd fsfsdfs fsddfsdfs fsdf sdfs fsf sdfsf dfsf sdsf sfsfsdfsdfsfsdfs sdfsd fsdfsdfdsf sf sdfsd fsdfsdfds fsdf sdfsfs sdf sd fssfdsfsdfsds fsdf sdssfsd fsfsdfs fsddfsdfs fsdf sdfs fsf sdfsf dfsf sdsf sfsfsdfsdfsfsdfs sdfsd fsdfsdfdsf sf sdfsd fsdfsdfds fsdf sdfsfs sdf sd fssfdsfsdfsds fsdf sdssfsd fsfsdf', 100, 0, 0, '0', 100, '1', '0000-00-00 00:00:00', '2018-06-07 09:21:41'),
(13, 'product20', 1299, 3, 5, 2, 'l', 's-l300.jpg', 'this is sample product. this product having 10/- tax and 55/- shipping charges and Cash on delivery available to this product', 150, 10, 55, '1', 150, '1', '0000-00-00 00:00:00', '2018-06-07 09:26:47'),
(14, 'product21', 1099, 5, 8, 1, 'm', 'mens-formal-shirt-500x500.jpg', 'this is product 21 , this product not having tax and shipping charges and Cash on delivery not available  on this product', 50, 0, 0, '0', 50, '1', '2018-06-07 11:36:20', '2018-06-07 06:06:20');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_brands`
--
ALTER TABLE `tbl_brands`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `brand_name` (`brand_name`);

--
-- Indexes for table `tbl_colors`
--
ALTER TABLE `tbl_colors`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `color_nane` (`color_name`);

--
-- Indexes for table `tbl_designs`
--
ALTER TABLE `tbl_designs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `design_name` (`design_name`);

--
-- Indexes for table `tbl_products`
--
ALTER TABLE `tbl_products`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_brands`
--
ALTER TABLE `tbl_brands`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tbl_colors`
--
ALTER TABLE `tbl_colors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tbl_designs`
--
ALTER TABLE `tbl_designs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_products`
--
ALTER TABLE `tbl_products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
