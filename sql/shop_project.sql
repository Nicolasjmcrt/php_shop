-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Oct 27, 2022 at 06:00 AM
-- Server version: 5.7.32
-- PHP Version: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shop_project`
--

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `member_id` int(3) NOT NULL,
  `pseudo` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL,
  `lastname` varchar(60) NOT NULL,
  `firstname` varchar(60) NOT NULL,
  `email` varchar(60) NOT NULL,
  `gender` enum('m','f') NOT NULL,
  `city` varchar(50) NOT NULL,
  `area_code` int(5) UNSIGNED ZEROFILL NOT NULL,
  `address` varchar(100) NOT NULL,
  `status` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`member_id`, `pseudo`, `password`, `lastname`, `firstname`, `email`, `gender`, `city`, `area_code`, `address`, `status`) VALUES
(10, 'Coyotebaba', '$2y$10$ZTLu3dbYUjx.OPOEFGGs9uWI8OIqPkgYkFmE0iLsQxjUiy6N5ZQ3K', 'Jumeaucourt', 'Nicolas', 'jumeaucourtn@gmail.com', 'm', 'Compiègne', 60200, '13 rue René Firmin, apt 247', 0),
(11, 'J.Doe911', '$2y$10$39hvhZ.z4sL.hvMuqqDWiedf6C0uhnHqOIq5wacWurkxi5ywQuOLG', 'Doe', 'John', 'j.doe@gmail.com', 'm', 'Nowhere', 00001, '10 Black Street', 0),
(12, 'Admin', '$2y$10$Aq4kipPWm9BbCI2jMWDLfOnR98ZkCPyqF3G32A4GZMyl4/aB7HXMO', 'Admin', 'Admin', 'admin@gmail.com', 'm', 'Admin City', 00002, 'Admin address', 1),
(13, 'User', '$2y$10$DJRu2qpAzXcRff1BxOvWLu70mVJ2zaBgHK6KnPjFGfDwsENYNv1vm', 'User', 'User', 'user@gmail.com', 'm', 'User City', 00003, 'User address', 0);

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `order_details_id` int(3) NOT NULL,
  `order_id` int(3) DEFAULT NULL,
  `product_id` int(3) DEFAULT NULL,
  `quantity` int(3) NOT NULL,
  `price` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`order_details_id`, `order_id`, `product_id`, `quantity`, `price`) VALUES
(1, 18, 7, 15, 589),
(2, 19, 7, 15, 589),
(3, 20, 21, 2, 589);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `product_id` int(3) NOT NULL,
  `reference` varchar(100) NOT NULL,
  `category` varchar(20) NOT NULL,
  `title` varchar(100) NOT NULL,
  `details` text NOT NULL,
  `color` varchar(100) NOT NULL,
  `size` varchar(20) NOT NULL,
  `gender` enum('m','f','mixed') NOT NULL,
  `picture` varchar(255) NOT NULL,
  `price` int(3) NOT NULL,
  `stock` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `reference`, `category`, `title`, `details`, `color`, `size`, `gender`, `picture`, `price`, `stock`) VALUES
(7, 'A2757B', 'iPad', 'iPad 64Go Wi-Fi', 'The all-new iPad is colorfully reimagined to be more capable, more intuitive, and even more fun. With a new all‑screen design, 10.9-inch Liquid Retina display, and four gorgeous colors, iPad delivers a powerful way to get things done, create, and stay connected.1 Add on essential accessories designed just for iPad and enjoy endless versatility for everything you love to do.', 'Blue', '64Go', 'mixed', 'http://localhost:8888/php_shop/img/1666265381_1888024477_ipad-2022-hero-blue-wifi-select.png', 589, 0),
(8, 'A2757P', 'iPad', 'iPad 64Go Wi-Fi', 'The all-new iPad is colorfully reimagined to be more capable, more intuitive, and even more fun. With a new all‑screen design, 10.9-inch Liquid Retina display, and four gorgeous colors, iPad delivers a powerful way to get things done, create, and stay connected.1 Add on essential accessories designed just for iPad and enjoy endless versatility for everything you love to do.', 'Pink', '64Go', 'mixed', 'http://localhost:8888/php_shop/img/1666265568_264787754_ipad-2022-hero-pink-wifi-select.png', 589, 12),
(17, 'A2890G', 'iPhone', 'iPhone 14 Pro 5G', 'A magical new way to interact with iPhone. Groundbreaking safety features designed to save lives. An innovative 48MP camera for mind-blowing detail. All powered by the ultimate smartphone chip.\r\n\r\nDesigned for durability.\r\n\r\nWith Ceramic Shield, tougher than any smartphone glass. Water resistance.1 Surgical-grade stainless steel. 6.1″ and 6.7″ display sizes.2 All in four Pro colors.', 'Gold', '128 Go', 'mixed', 'http://localhost:8888/php_shop/img/1666337377_A2890G_iphone-14-pro-gold.png', 1329, 28),
(20, 'A2757Y', 'iPad', 'iPad 64Go Wi-Fi', 'The all-new iPad is colorfully reimagined to be more capable, more intuitive, and even more fun. With a new all‑screen design, 10.9-inch Liquid Retina display, and four gorgeous colors, iPad delivers a powerful way to get things done, create, and stay connected.1 Add on essential accessories designed just for iPad and enjoy endless versatility for everything you love to do.', 'Yellow', '64Go', 'mixed', 'http://localhost:8888/php_shop/img/1666354211_A2757Y_ipad-2022-hero-yellow-wifi-select.png', 589, 12),
(21, 'A2757S', 'iPad', 'iPad 64Go Wi-Fi', 'The all-new iPad is colorfully reimagined to be more capable, more intuitive, and even more fun. With a new all‑screen design, 10.9-inch Liquid Retina display, and four gorgeous colors, iPad delivers a powerful way to get things done, create, and stay connected.1 Add on essential accessories designed just for iPad and enjoy endless versatility for everything you love to do.', 'Silver', '64Go', 'mixed', 'http://localhost:8888/php_shop/img/1666354348_A2757S_ipad-2022-hero-silver-wifi-select.png', 589, 0),
(22, 'A2890DP', 'iPhone', 'iPhone 14 Pro 5G', 'A magical new way to interact with iPhone. Groundbreaking safety features designed to save lives. An innovative 48MP camera for mind-blowing detail. All powered by the ultimate smartphone chip.\r\n\r\nDesigned for durability.\r\n\r\nWith Ceramic Shield, tougher than any smartphone glass. Water resistance.1 Surgical-grade stainless steel. 6.1″ and 6.7″ display sizes.2 All in four Pro colors.', 'Deep purple', '128 Go', 'mixed', 'http://localhost:8888/php_shop/img/1666373587_A2890DP_iphone-14-pro-deeppurple.png', 1329, 17),
(23, 'A2890S', 'iPhone', 'iPhone 14 Pro 5G', 'A magical new way to interact with iPhone. Groundbreaking safety features designed to save lives. An innovative 48MP camera for mind-blowing detail. All powered by the ultimate smartphone chip.\r\n\r\nDesigned for durability.\r\n\r\nWith Ceramic Shield, tougher than any smartphone glass. Water resistance.1 Surgical-grade stainless steel. 6.1″ and 6.7″ display sizes.2 All in four Pro colors.', 'Silver', '128 Go', 'mixed', 'http://localhost:8888/php_shop/img/1666373648_A2890S_iphone-14-pro-silver.png', 1329, 32),
(24, 'APWAULT49MID', 'Watch', 'Apple Watch Ultra GPS + Cellular', 'To build the ultimate sports watch, we crafted every element with painstaking attention to detail for unparalleled performance. Titanium strikes the perfect balance between weight, ruggedness, and corrosion resistance. The new case design rises up to surround the flat sapphire crystal and protect it from edge impacts. The Digital Crown is larger and the side button is raised from the case, making them easier to use while you’re wearing gloves.', 'Midnight Ocean Bracelet', '49 mm', 'mixed', 'http://localhost:8888/php_shop/img/1666600012_APWAULT49MID_watch-49-titanium-ultra-ocean.jpeg', 999, 26),
(25, 'MBP16M1P16512SG', 'Mac', 'MacBook Pro 16 M1 Pro 512Go Space Grey', 'Supercharged for pros.\r\nThe most powerful MacBook Pro ever is here. With the blazing-fast M1 Pro or M1 Max chip — the first Apple silicon designed for pros — you get groundbreaking performance and amazing battery life. Add to that a stunning Liquid Retina XDR display, the best camera and audio ever in a Mac laptop, and all the ports you need. The first notebook of its kind, this MacBook Pro is a beast.', 'Space Grey', '512 Go', 'mixed', 'http://localhost:8888/php_shop/img/1666600442_MBP16M1P16512SG_mbp16-spacegray.png', 2749, 34),
(26, 'APMSP', 'AirPods', 'AirPods Max Space Grey', 'Introducing AirPods Max — a perfect balance of exhilarating high-fidelity audio and the effortless magic of AirPods. The ultimate personal listening experience is here.\r\nThe over-ear headphone has been completely reimagined. From cushion to canopy, AirPods Max are designed for an uncompromising fit that creates the optimal acoustic seal for many different head shapes — fully immersing you in every sound.', 'Space Grey', 'Universal', 'mixed', 'http://localhost:8888/php_shop/img/1666601290_APMSP_airpods-max-spacegray.png', 629, 24),
(27, 'ATV4KWF', 'TV/Home', 'Apple TV 4K Wi-Fi 64 Go', 'The new Apple TV 4K brings Apple TV+, Apple Music, Apple Fitness+, and Apple Arcade together with all your favorite streaming apps — in our best‑ever picture and audio quality. With the blazing performance of the A15 Bionic chip, intuitive controls, and seamless interaction with your devices and smart home accessories. It’s everything you love about Apple — on your biggest screen.\r\n									', 'Black', '64Go', 'mixed', 'http://localhost:8888/php_shop/img/1666601662_ATV4KWF_apple-tv-4k.png', 169, 33),
(28, 'MPXCO832W5500X', 'Mac', 'Mac Pro Xeon Core 8', 'Power to change everything. Say hello to a Mac that is extreme in every way. With the greatest performance, expansion, and configurability yet, it is a system created to let a wide range of professionals push the limits of what is possible.\r\nFunction defines form. Every aspect of Mac Pro is designed in pursuit of performance. Built around a stainless steel space frame, an aluminum housing lifts off, allowing 360‑degree access to every component and vast configuration. From there anything is possible.', 'Silver', '512 Go', 'mixed', 'http://localhost:8888/php_shop/img/1666622602_MPXCO832W5500X_mac-pro-2019.png', 6499, 2),
(29, 'MBAM113I256SG', 'Mac', 'MacBook Air M1 8 Go', 'Power. It’s in the Air.\r\nMacBook Air with M1 is an incredibly portable laptop — it’s nimble and quick, with a silent, fanless design and a beautiful Retina display. Thanks to its slim profile and all‑day battery life, this Air moves at the speed of lightness.\r\nSupercharged by the Apple M1 chip', 'Space Grey', '256 Go', 'mixed', 'http://localhost:8888/php_shop/img/1666639104_MBAM113I256SG_macbook-air-space-gray.png', 1199, 12),
(30, 'MBAM113I256GO', 'Mac', 'MacBook Air M1 8 Go', 'Power. It’s in the Air.\r\nMacBook Air with M1 is an incredibly portable laptop — it’s nimble and quick, with a silent, fanless design and a beautiful Retina display. Thanks to its slim profile and all‑day battery life, this Air moves at the speed of lightness.\r\nSupercharged by the Apple M1 chip', 'Gold', '256 Go', 'mixed', 'http://localhost:8888/php_shop/img/1666639400_MBAM113I256GO_macbook-air-gold.png', 1199, 7),
(31, 'MBAM113I256SIL', 'Mac', 'MacBook Air M1 8 Go', 'Power. It’s in the Air.\r\nMacBook Air with M1 is an incredibly portable laptop — it’s nimble and quick, with a silent, fanless design and a beautiful Retina display. Thanks to its slim profile and all‑day battery life, this Air moves at the speed of lightness.\r\nSupercharged by the Apple M1 chip', 'Silver', '256 Go', 'mixed', 'http://localhost:8888/php_shop/img/1666639543_MBAM113I256SIL_macbook-air-silver.png', 1199, 5),
(32, 'IPDPRO13I128GSG', 'iPad', 'iPad Pro 13&quot; Wi-Fi 128 Go', 'Astonishing performance. Incredibly advanced displays. Superfast wireless connectivity. Next-level Apple Pencil capabilities. Powerful new features in iPadOS 16. The ultimate iPad experience.', 'Space Grey', '128 Go', 'mixed', 'http://localhost:8888/php_shop/img/1666644483_IPDPRO13I128GSG_ipad-pro-13-spacegray.png', 1469, 12),
(33, 'HPMNOR', 'TV/Home', 'HomePod mini', 'Jam-packed with innovation, HomePod mini delivers unexpectedly big sound for a speaker of its size. At just 3.3 inches tall, it takes up almost no space but fills the entire room with rich 360‑degree audio that sounds amazing from every angle. Add more than one HomePod mini for truly expansive sound.', 'Orange', 'None', 'mixed', 'http://localhost:8888/php_shop/img/1666644878_HPMNOR_homepod-mini-orange.png', 99, 27),
(34, 'HPMNBL', 'TV/Home', 'HomePod mini', 'Jam-packed with innovation, HomePod mini delivers unexpectedly big sound for a speaker of its size. At just 3.3 inches tall, it takes up almost no space but fills the entire room with rich 360‑degree audio that sounds amazing from every angle. Add more than one HomePod mini for truly expansive sound.', 'Blue', 'None', 'mixed', 'http://localhost:8888/php_shop/img/1666645178_HPMNBL_homepod-mini-blue.png', 99, 14),
(35, 'IMAC24IM1YLW256G', 'Mac', 'iMac 24&quot; M1 8Go Memory With 4.5 Retina Display', 'Say hello to the new iMac.\r\nInspired by the best of Apple. Transformed by the M1 chip. Stands out in any space. Fits perfectly into your life.\r\nThis extraordinary design is only possible thanks to M1, the first system on a chip for Mac. It makes iMac so thin and compact that it fits in more places than ever.', 'Yellow', '256 Go', 'mixed', 'http://localhost:8888/php_shop/img/1666733130_IMAC24IM1YLW256G_imac-24-yellow.png', 1669, 0);

-- --------------------------------------------------------

--
-- Table structure for table `shop_order`
--

CREATE TABLE `shop_order` (
  `order_id` int(3) NOT NULL,
  `member_id` int(3) DEFAULT NULL,
  `amount` int(10) NOT NULL,
  `registration_date` datetime NOT NULL,
  `state` enum('being processed','sent','delivered') NOT NULL DEFAULT 'being processed'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `shop_order`
--

INSERT INTO `shop_order` (`order_id`, `member_id`, `amount`, `registration_date`, `state`) VALUES
(18, 12, 8835, '2022-10-26 17:03:52', 'being processed'),
(19, 12, 8835, '2022-10-26 17:04:08', 'being processed'),
(20, 12, 1178, '2022-10-26 17:05:31', 'being processed');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`member_id`),
  ADD UNIQUE KEY `pseudo` (`pseudo`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`order_details_id`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `shop_order`
--
ALTER TABLE `shop_order`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `member_fk` (`member_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `member_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `order_details_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `shop_order`
--
ALTER TABLE `shop_order`
  MODIFY `order_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `order_id` FOREIGN KEY (`order_id`) REFERENCES `shop_order` (`order_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `product_id` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`) ON DELETE SET NULL ON UPDATE SET NULL;

--
-- Constraints for table `shop_order`
--
ALTER TABLE `shop_order`
  ADD CONSTRAINT `member_fk` FOREIGN KEY (`member_id`) REFERENCES `member` (`member_id`) ON DELETE SET NULL ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
