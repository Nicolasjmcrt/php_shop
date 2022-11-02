-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:8889
-- Généré le : mer. 02 nov. 2022 à 15:47
-- Version du serveur : 5.7.34
-- Version de PHP : 7.4.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `shop_project`
--

-- --------------------------------------------------------

--
-- Structure de la table `member`
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
-- Déchargement des données de la table `member`
--

INSERT INTO `member` (`member_id`, `pseudo`, `password`, `lastname`, `firstname`, `email`, `gender`, `city`, `area_code`, `address`, `status`) VALUES
(11, 'J.Doe911', '$2y$10$39hvhZ.z4sL.hvMuqqDWiedf6C0uhnHqOIq5wacWurkxi5ywQuOLG', 'Doe', 'John', 'j.doe@gmail.com', 'm', 'Nowhere', 00001, '10 Black Street', 2),
(12, 'Admin', '$2y$10$Aq4kipPWm9BbCI2jMWDLfOnR98ZkCPyqF3G32A4GZMyl4/aB7HXMO', 'Admin', 'Admin', 'admin@gmail.com', 'm', 'Admin City', 00002, 'Admin address', 1),
(14, 'User', '$2y$10$wsEi85rQZsuAsrpsGxKKD.ph1exzRjLOqJNHv4jtTSinEiS/gGDMa', 'User', 'User', 'user@gmail.com', 'm', 'User City', 02245, 'User Address', 0);

-- --------------------------------------------------------

--
-- Structure de la table `order_details`
--

CREATE TABLE `order_details` (
  `order_details_id` int(3) NOT NULL,
  `order_id` int(3) DEFAULT NULL,
  `product_id` int(3) DEFAULT NULL,
  `quantity` int(3) NOT NULL,
  `price` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `order_details`
--

INSERT INTO `order_details` (`order_details_id`, `order_id`, `product_id`, `quantity`, `price`) VALUES
(1, 18, 7, 15, 589),
(2, 19, 7, 15, 589),
(3, 20, 21, 2, 589),
(4, 21, 21, 7, 589),
(5, 22, 32, 3, 1469),
(6, 23, 32, 2, 1469),
(7, 24, 40, 2, 2849),
(8, 25, 35, 1, 1669),
(10, 26, 23, 2, 1329),
(11, 27, 47, 1, 949),
(13, 29, 45, 1, 1479),
(15, 30, 20, 1, 589),
(17, 31, 23, 1, 1329),
(19, 32, 48, 1, 299),
(21, 33, 40, 1, 2849),
(22, 33, 25, 1, 2749),
(23, 34, 22, 1, 1329),
(24, 34, 24, 1, 999),
(25, 34, 33, 1, 99),
(26, 35, 7, 1, 589),
(27, 35, 17, 1, 1329),
(28, 36, 51, 1, 1669);

-- --------------------------------------------------------

--
-- Structure de la table `product`
--

CREATE TABLE `product` (
  `product_id` int(3) NOT NULL,
  `reference` varchar(100) NOT NULL,
  `category` varchar(20) NOT NULL,
  `sub_category` varchar(255) DEFAULT NULL,
  `title` varchar(100) NOT NULL,
  `details` text NOT NULL,
  `color` varchar(100) NOT NULL,
  `size` varchar(100) NOT NULL,
  `gender` enum('m','f','mixed') NOT NULL,
  `picture` varchar(255) NOT NULL,
  `price` int(3) NOT NULL,
  `stock` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `product`
--

INSERT INTO `product` (`product_id`, `reference`, `category`, `sub_category`, `title`, `details`, `color`, `size`, `gender`, `picture`, `price`, `stock`) VALUES
(7, 'A2757B', 'iPad', 'iPad 10th gen', 'iPad 64Go Wi-Fi', 'The all-new iPad is colorfully reimagined to be more capable, more intuitive, and even more fun. With a new all‑screen design, 10.9-inch Liquid Retina display, and four gorgeous colors, iPad delivers a powerful way to get things done, create, and stay connected.1 Add on essential accessories designed just for iPad and enjoy endless versatility for everything you love to do.', 'Blue', '64Go', 'mixed', 'http://localhost:8888/php_shop/img/1666265381_1888024477_ipad-2022-hero-blue-wifi-select.png', 589, 13),
(8, 'A2757P', 'iPad', 'iPad 10th gen', 'iPad 64Go Wi-Fi', 'The all-new iPad is colorfully reimagined to be more capable, more intuitive, and even more fun. With a new all‑screen design, 10.9-inch Liquid Retina display, and four gorgeous colors, iPad delivers a powerful way to get things done, create, and stay connected.1 Add on essential accessories designed just for iPad and enjoy endless versatility for everything you love to do.', 'Pink', '64Go', 'mixed', 'http://localhost:8888/php_shop/img/1666265568_264787754_ipad-2022-hero-pink-wifi-select.png', 589, 12),
(17, 'A2890G', 'iPhone', 'iPhone 14 Pro', 'iPhone 14 Pro', 'A magical new way to interact with iPhone. Groundbreaking safety features designed to save lives. An innovative 48MP camera for mind-blowing detail. All powered by the ultimate smartphone chip.\r\n\r\nDesigned for durability.\r\n\r\nWith Ceramic Shield, tougher than any smartphone glass. Water resistance.1 Surgical-grade stainless steel. 6.1″ and 6.7″ display sizes.2 All in four Pro colors.', 'Gold', 'Pro 128 Go', 'mixed', 'http://localhost:8888/php_shop/img/1666337377_A2890G_iphone-14-pro-gold.png', 1329, 27),
(20, 'A2757Y', 'iPad', 'iPad 10th gen', 'iPad 64Go Wi-Fi', 'The all-new iPad is colorfully reimagined to be more capable, more intuitive, and even more fun. With a new all‑screen design, 10.9-inch Liquid Retina display, and four gorgeous colors, iPad delivers a powerful way to get things done, create, and stay connected.1 Add on essential accessories designed just for iPad and enjoy endless versatility for everything you love to do.', 'Yellow', '64Go', 'mixed', 'http://localhost:8888/php_shop/img/1666354211_A2757Y_ipad-2022-hero-yellow-wifi-select.png', 589, 11),
(21, 'A2757S', 'iPad', 'iPad 10th gen', 'iPad 64Go Wi-Fi', 'The all-new iPad is colorfully reimagined to be more capable, more intuitive, and even more fun. With a new all‑screen design, 10.9-inch Liquid Retina display, and four gorgeous colors, iPad delivers a powerful way to get things done, create, and stay connected.1 Add on essential accessories designed just for iPad and enjoy endless versatility for everything you love to do.', 'Silver', '64Go', 'mixed', 'http://localhost:8888/php_shop/img/1666354348_A2757S_ipad-2022-hero-silver-wifi-select.png', 589, 14),
(22, 'A2890DP', 'iPhone', 'iPhone 14 Pro', 'iPhone 14 Pro', 'A magical new way to interact with iPhone. Groundbreaking safety features designed to save lives. An innovative 48MP camera for mind-blowing detail. All powered by the ultimate smartphone chip.\n\nDesigned for durability.\n\nWith Ceramic Shield, tougher than any smartphone glass. Water resistance.1 Surgical-grade stainless steel. 6.1″ and 6.7″ display sizes.2 All in four Pro colors.', 'Deep purple', 'Pro 128 Go', 'mixed', 'http://localhost:8888/php_shop/img/1666373587_A2890DP_iphone-14-pro-deeppurple.png', 1329, 16),
(23, 'A2890S', 'iPhone', 'iPhone 14 Pro', 'iPhone 14 Pro', 'A magical new way to interact with iPhone. Groundbreaking safety features designed to save lives. An innovative 48MP camera for mind-blowing detail. All powered by the ultimate smartphone chip.\r\n\r\nDesigned for durability.\r\n\r\nWith Ceramic Shield, tougher than any smartphone glass. Water resistance.1 Surgical-grade stainless steel. 6.1″ and 6.7″ display sizes.2 All in four Pro colors.', 'Silver', 'Pro 128 Go', 'mixed', 'http://localhost:8888/php_shop/img/1666373648_A2890S_iphone-14-pro-silver.png', 1329, 29),
(24, 'APWAULT49MID', 'Watch', 'Apple Watch Ultra', 'Titanium Case with Midnight Ocean Band', 'To build the ultimate sports watch, we crafted every element with painstaking attention to detail for unparalleled performance. Titanium strikes the perfect balance between weight, ruggedness, and corrosion resistance. The new case design rises up to surround the flat sapphire crystal and protect it from edge impacts. The Digital Crown is larger and the side button is raised from the case, making them easier to use while you’re wearing gloves.', 'Midnight', '49 mm', 'mixed', 'http://localhost:8888/php_shop/img/1666600012_APWAULT49MID_watch-49-titanium-ultra-ocean.png', 999, 25),
(25, 'MBP16M1P16512SG', 'Mac', 'MacBook Pro 14” and 16”', 'MacBook Pro 16 M1 Pro 512Go Space Grey', 'Supercharged for pros.\r\nThe most powerful MacBook Pro ever is here. With the blazing-fast M1 Pro or M1 Max chip — the first Apple silicon designed for pros — you get groundbreaking performance and amazing battery life. Add to that a stunning Liquid Retina XDR display, the best camera and audio ever in a Mac laptop, and all the ports you need. The first notebook of its kind, this MacBook Pro is a beast.', 'Space Grey', '512 Go', 'mixed', 'http://localhost:8888/php_shop/img/1666600442_MBP16M1P16512SG_mbp16-spacegray.png', 2749, 33),
(26, 'APMSP', 'AirPods', 'AirPods Max', 'AirPods Max Space Grey', 'Introducing AirPods Max — a perfect balance of exhilarating high-fidelity audio and the effortless magic of AirPods. The ultimate personal listening experience is here.\r\nThe over-ear headphone has been completely reimagined. From cushion to canopy, AirPods Max are designed for an uncompromising fit that creates the optimal acoustic seal for many different head shapes — fully immersing you in every sound.', 'Space Grey', 'Universal', 'mixed', 'http://localhost:8888/php_shop/img/1666601290_APMSP_airpods-max-spacegray.png', 629, 24),
(27, 'ATV4KWF', 'TV/Home', 'Apple TV 4K', 'Apple TV 4K Wi-Fi 64 Go', 'The new Apple TV 4K brings Apple TV+, Apple Music, Apple Fitness+, and Apple Arcade together with all your favorite streaming apps — in our best‑ever picture and audio quality. With the blazing performance of the A15 Bionic chip, intuitive controls, and seamless interaction with your devices and smart home accessories. It’s everything you love about Apple — on your biggest screen.\r\n									', 'Black', '64Go', 'mixed', 'http://localhost:8888/php_shop/img/1666601662_ATV4KWF_apple-tv-4k.png', 169, 32),
(28, 'MPXCO832W5500X', 'Mac', 'Mac Pro', 'Mac Pro Xeon Core 8', 'Power to change everything. Say hello to a Mac that is extreme in every way. With the greatest performance, expansion, and configurability yet, it is a system created to let a wide range of professionals push the limits of what is possible.\r\nFunction defines form. Every aspect of Mac Pro is designed in pursuit of performance. Built around a stainless steel space frame, an aluminum housing lifts off, allowing 360‑degree access to every component and vast configuration. From there anything is possible.', 'Silver', '512 Go', 'mixed', 'http://localhost:8888/php_shop/img/1666622602_MPXCO832W5500X_mac-pro-2019.png', 6499, 2),
(29, 'MBAM113I256SG', 'Mac', 'MacBook Air M1', 'MacBook Air M1 8 Go', 'Power. It’s in the Air.\r\nMacBook Air with M1 is an incredibly portable laptop — it’s nimble and quick, with a silent, fanless design and a beautiful Retina display. Thanks to its slim profile and all‑day battery life, this Air moves at the speed of lightness.\r\nSupercharged by the Apple M1 chip', 'Space Grey', '256 Go', 'mixed', 'http://localhost:8888/php_shop/img/1666639104_MBAM113I256SG_macbook-air-space-gray.png', 1199, 12),
(30, 'MBAM113I256GO', 'Mac', 'MacBook Air M1', 'MacBook Air M1 8 Go', 'Power. It’s in the Air.\r\nMacBook Air with M1 is an incredibly portable laptop — it’s nimble and quick, with a silent, fanless design and a beautiful Retina display. Thanks to its slim profile and all‑day battery life, this Air moves at the speed of lightness.\r\nSupercharged by the Apple M1 chip', 'Gold', '256 Go', 'mixed', 'http://localhost:8888/php_shop/img/1666639400_MBAM113I256GO_macbook-air-gold.png', 1199, 7),
(31, 'MBAM113I256SIL', 'Mac', 'MacBook Air M1', 'MacBook Air M1 8 Go', 'Power. It’s in the Air.\r\nMacBook Air with M1 is an incredibly portable laptop — it’s nimble and quick, with a silent, fanless design and a beautiful Retina display. Thanks to its slim profile and all‑day battery life, this Air moves at the speed of lightness.\r\nSupercharged by the Apple M1 chip', 'Silver', '256 Go', 'mixed', 'http://localhost:8888/php_shop/img/1666639543_MBAM113I256SIL_macbook-air-silver.png', 1199, 5),
(32, 'IPDPRO13I128GSG', 'iPad', 'iPad Pro', 'iPad Pro 12.9&quot; Wi-Fi 128 Go', 'Astonishing performance. Incredibly advanced displays. Superfast wireless connectivity. Next-level Apple Pencil capabilities. Powerful new features in iPadOS 16. The ultimate iPad experience.', 'Space Grey', '128 Go', 'mixed', 'http://localhost:8888/php_shop/img/1666644483_IPDPRO13I128GSG_ipad-pro-13-spacegray.png', 1469, 7),
(33, 'HPMNOR', 'TV/Home', 'HomePod mini', 'HomePod mini', 'Jam-packed with innovation, HomePod mini delivers unexpectedly big sound for a speaker of its size. At just 3.3 inches tall, it takes up almost no space but fills the entire room with rich 360‑degree audio that sounds amazing from every angle. Add more than one HomePod mini for truly expansive sound.', 'Orange', 'None', 'mixed', 'http://localhost:8888/php_shop/img/1666644878_HPMNOR_homepod-mini-orange.png', 99, 26),
(34, 'HPMNBL', 'TV/Home', 'HomePod mini', 'HomePod mini', 'Jam-packed with innovation, HomePod mini delivers unexpectedly big sound for a speaker of its size. At just 3.3 inches tall, it takes up almost no space but fills the entire room with rich 360‑degree audio that sounds amazing from every angle. Add more than one HomePod mini for truly expansive sound.', 'Blue', 'None', 'mixed', 'http://localhost:8888/php_shop/img/1666645178_HPMNBL_homepod-mini-blue.png', 99, 14),
(35, 'IMAC24IM1YLW256G', 'Mac', 'iMac 24”', 'iMac 24&quot; M1 8Go Memory With 4.5 Retina Display', 'Say hello to the new iMac.\nInspired by the best of Apple. Transformed by the M1 chip. Stands out in any space. Fits perfectly into your life.\nThis extraordinary design is only possible thanks to M1, the first system on a chip for Mac. It makes iMac so thin and compact that it fits in more places than ever.', 'Yellow', '256 Go', 'mixed', 'http://localhost:8888/php_shop/img/1666733130_IMAC24IM1YLW256G_imac-24-yellow.png', 1669, 10),
(36, 'IPDPRO13I128GSIL', 'iPad', 'iPad Pro', 'iPad Pro 12.9&quot; Wi-Fi 128 Go', 'Astonishing performance. Incredibly advanced displays. Superfast wireless connectivity. Next-level Apple Pencil capabilities. Powerful new features in iPadOS 16. The ultimate iPad experience.', 'Silver', '128 Go', 'mixed', 'http://localhost:8888/php_shop/img/1666899689_IPDPRO13I128GSIL_ipad-pro-13-silver.png', 1469, 21),
(37, 'IPDPRO13I256GSG', 'iPad', 'iPad Pro', 'iPad Pro 12.9&quot; Wi-Fi 256 Go', 'Astonishing performance. Incredibly advanced displays. Superfast wireless connectivity. Next-level Apple Pencil capabilities. Powerful new features in iPadOS 16. The ultimate iPad experience.', 'Space Grey', '256 Go', 'mixed', 'http://localhost:8888/php_shop/img/1667127754_IPDPRO13I256GSG_ipad-pro-13-spacegray.png', 1599, 15),
(38, 'IPDPRO13I512GSG', 'iPad', 'iPad Pro', 'iPad Pro 12.9&quot; Wi-Fi 512 Go', 'Astonishing performance. Incredibly advanced displays. Superfast wireless connectivity. Next-level Apple Pencil capabilities. Powerful new features in iPadOS 16. The ultimate iPad experience.', 'Space Grey', '512 Go', 'mixed', 'http://localhost:8888/php_shop/img/1666900081_IPDPRO13I512GSG_ipad-pro-13-spacegray.png', 1849, 12),
(39, 'IPDPRO13I1TSG', 'iPad', 'iPad Pro', 'iPad Pro 12.9&quot; Wi-Fi 1 To', 'Astonishing performance. Incredibly advanced displays. Superfast wireless connectivity. Next-level Apple Pencil capabilities. Powerful new features in iPadOS 16. The ultimate iPad experience.', 'Space Grey', '1 To', 'mixed', 'http://localhost:8888/php_shop/img/1666900153_IPDPRO13I1TSG_ipad-pro-13-spacegray.png', 2349, 8),
(40, 'IPDPRO13I2TSG', 'iPad', 'iPad Pro', 'iPad Pro 12.9&quot; Wi-Fi 2 To', 'Astonishing performance. Incredibly advanced displays. Superfast wireless connectivity. Next-level Apple Pencil capabilities. Powerful new features in iPadOS 16. The ultimate iPad experience.', 'Space Grey', '2 To', 'mixed', 'http://localhost:8888/php_shop/img/1666900228_IPDPRO13I2TSG_ipad-pro-13-spacegray.png', 2849, 1),
(41, 'IPDPRO13I256GSIL', 'iPad', 'iPad Pro', 'iPad Pro 12.9&quot; Wi-Fi 256 Go', 'Astonishing performance. Incredibly advanced displays. Superfast wireless connectivity. Next-level Apple Pencil capabilities. Powerful new features in iPadOS 16. The ultimate iPad experience.', 'Silver', '256 Go', 'mixed', 'http://localhost:8888/php_shop/img/1666900409_IPDPRO13I256GSIL_ipad-pro-13-silver.png', 1599, 17),
(42, 'IPDPRO13I512GSIL', 'iPad', 'iPad Pro', 'iPad Pro 12.9&quot; Wi-Fi 512 Go', 'Astonishing performance. Incredibly advanced displays. Superfast wireless connectivity. Next-level Apple Pencil capabilities. Powerful new features in iPadOS 16. The ultimate iPad experience.', 'Silver', '512 Go', 'mixed', 'http://localhost:8888/php_shop/img/1666900620_IPDPRO13I512GSIL_ipad-pro-13-silver.png', 1849, 12),
(43, 'IPDPRO13I1TSIL', 'iPad', 'iPad Pro', 'iPad Pro 12.9&quot; Wi-Fi 1 To', 'Astonishing performance. Incredibly advanced displays. Superfast wireless connectivity. Next-level Apple Pencil capabilities. Powerful new features in iPadOS 16. The ultimate iPad experience.', 'Silver', '1 To', 'mixed', 'http://localhost:8888/php_shop/img/1666900707_IPDPRO13I1TSIL_ipad-pro-13-silver.png', 2349, 8),
(44, 'IPDPRO13I2TSIL', 'iPad', 'iPad Pro', 'iPad Pro 12.9&quot; Wi-Fi 2 To	', 'Astonishing performance. Incredibly advanced displays. Superfast wireless connectivity. Next-level Apple Pencil capabilities. Powerful new features in iPadOS 16. The ultimate iPad experience.', 'Silver', '2 To', 'mixed', 'http://localhost:8888/php_shop/img/1666900821_IPDPRO13I2TSIL_ipad-pro-13-silver.png', 2849, 4),
(45, 'IP14PMX128DP', 'iPhone', 'iPhone 14 Pro', 'iPhone 14 Pro', 'A magical new way to interact with iPhone. Groundbreaking safety features designed to save lives. An innovative 48MP camera for mind-blowing detail. All powered by the ultimate smartphone chip.\r\n\r\nDesigned for durability.\r\n\r\nWith Ceramic Shield, tougher than any smartphone glass. Water resistance.1 Surgical-grade stainless steel. 6.1″ and 6.7″ display sizes.2 All in four Pro colors.', 'Deep purple', 'Pro Max 128 Go', 'mixed', 'http://localhost:8888/php_shop/img/1666901722_IP14PMX128DP_iphone-14-pro-6-7inch-deeppurple.png', 1479, 21),
(46, 'IP14PMX256DP', 'iPhone', 'iPhone 14 Pro', 'iPhone 14 Pro	', 'A magical new way to interact with iPhone. Groundbreaking safety features designed to save lives. An innovative 48MP camera for mind-blowing detail. All powered by the ultimate smartphone chip.\r\n\r\nDesigned for durability.\r\n\r\nWith Ceramic Shield, tougher than any smartphone glass. Water resistance.1 Surgical-grade stainless steel. 6.1″ and 6.7″ display sizes.2 All in four Pro colors.', 'Deep purple', 'Pro Max 256 Go', 'mixed', 'http://localhost:8888/php_shop/img/1666901803_IP14PMX256DP_iphone-14-pro-6-7inch-deeppurple.png', 1609, 16),
(47, 'APWAS845GLDUMBER', 'Watch', 'Apple Watch Series 8', 'Gold Stainless Steel Case with Leather Link / Umber', 'The stainless steel case is durable and polished to a shiny, mirror-like finish.\r\n\r\nThe Leather Link is made from handcrafted Roux Granada leather with no clasps or buckles and has embedded magnets for a secure and adjustable fit.', 'Gold Stainless Steel Case with Umber Leather Link', '45mm', 'mixed', 'http://localhost:8888/php_shop/img/1666902602_APWAS845GLDUMBER_watch-45-stainless-gold-8s.png', 949, 12),
(48, 'AP2TH', 'AirPods', 'AirPods Pro', 'AirPods Pro (2nd generation)', 'AirPods Pro have been reengineered for even richer audio experiences. Next-level Active Noise Cancellation and Adaptive Transparency reduce more external noise. Spatial Audio takes immersion to a remarkably personal level. Touch control now lets you adjust volume with a swipe. And a leap in power delivers 6 hours of battery life from a single charge.', 'White', 'None', 'mixed', 'http://localhost:8888/php_shop/img/1666902940_AP2TH_airpods-pro-2th.png', 299, 50),
(49, 'AP3RDLIGHTCHARCASE', 'AirPods', 'AirPods 3rd gen', 'AirPods (3rd generation)', 'It’s magic, remastered.\nWith Personalized Spatial Audio that places sound all around you, Adaptive EQ that tunes music to your ears, and longer battery life that charges up in a snap. It shrugs off sweat and sprinkles,\nand delivers an\nexperience that’s simply magical. Taking sound in totally new directions.', 'White', 'With Lightning Charging Case', 'mixed', 'http://localhost:8888/php_shop/img/1666903494_AP3RDLIGHTCHARCASE_airpods-3rd.png', 209, 73),
(50, 'AP3RDMAGSAFECHARCASE	', 'AirPods', 'AirPods 3rd gen', 'AirPods (3rd generation)', 'It’s magic, remastered.\r\nWith Personalized Spatial Audio that places sound all around you, Adaptive EQ that tunes music to your ears, and longer battery life that charges up in a snap. It shrugs off sweat and sprinkles,\r\nand delivers an\r\nexperience that’s simply magical. Taking sound in totally new directions.', 'White', 'with MagSafe Charging Case', 'mixed', 'http://localhost:8888/php_shop/img/1666903494_AP3RDLIGHTCHARCASE_airpods-3rd.png', 219, 47),
(51, 'IMAC24IM1BLU256G', 'Mac', 'iMac 24”', 'iMac 24&quot; M1 8Go Memory With 4.5 Retina Display', 'Say hello to the new iMac.\r\nInspired by the best of Apple. Transformed by the M1 chip. Stands out in any space. Fits perfectly into your life.\r\nThis extraordinary design is only possible thanks to M1, the first system on a chip for Mac. It makes iMac so thin and compact that it fits in more places than ever.', 'Blue', '256 Go', 'mixed', 'http://localhost:8888/php_shop/img/1667141896_IMAC24IM1BLU256G_imac-24-blue.png', 1669, 8),
(52, 'APA64GSG', 'iPad', 'iPad Air', 'iPad Air 64Go Wi-Fi Space Grey', 'Light. Bright.\nFull of might.\nSupercharged by the Apple M1 chip.\nBlazing-fast 5G.\nWorks with Apple Pencil and Magic Keyboard.\n12MP Ultra Wide front camera\nwith Center Stage.\nFive gorgeous colors.', 'Space Grey', '64Go', 'mixed', 'http://localhost:8888/php_shop/img/1667381025_APA64GSG_ipad-air-select-wifi-spacegray.png', 789, 17),
(53, 'APA64GBLU', 'iPad', 'iPad Air', 'iPad Air 64Go Wi-Fi Blue', 'Light. Bright.\r\nFull of might.\r\nSupercharged by the Apple M1 chip.\r\nBlazing-fast 5G.\r\nWorks with Apple Pencil and Magic Keyboard.\r\n12MP Ultra Wide front camera\r\nwith Center Stage.\r\nFive gorgeous colors.', 'Blue', '64Go', 'mixed', 'http://localhost:8888/php_shop/img/1667381174_APA64GBLU_ipad-air-select-wifi-blue.png', 789, 24),
(54, 'APA64GPIN', 'iPad', 'iPad Air', 'iPad Air 64Go Wi-Fi Pink', 'Light. Bright.\r\nFull of might.\r\nSupercharged by the Apple M1 chip.\r\nBlazing-fast 5G.\r\nWorks with Apple Pencil and Magic Keyboard.\r\n12MP Ultra Wide front camera\r\nwith Center Stage.\r\nFive gorgeous colors.', 'Pink', '64Go', 'mixed', 'http://localhost:8888/php_shop/img/1667381329_APA64GPIN_ipad-air-select-wifi-pink.png', 789, 23),
(55, 'APA64GPUR', 'iPad', 'iPad Air', 'iPad Air 64Go Wi-Fi Purple', 'Light. Bright.\r\nFull of might.\r\nSupercharged by the Apple M1 chip.\r\nBlazing-fast 5G.\r\nWorks with Apple Pencil and Magic Keyboard.\r\n12MP Ultra Wide front camera\r\nwith Center Stage.\r\nFive gorgeous colors.', 'Purple', '64Go', 'mixed', 'http://localhost:8888/php_shop/img/1667381396_APA64GPUR_ipad-air-select-wifi-purple.png', 789, 16),
(56, 'APA64GSTLI', 'iPad', 'iPad Air', 'iPad Air 64Go Wi-Fi Starlight', 'Light. Bright.\r\nFull of might.\r\nSupercharged by the Apple M1 chip.\r\nBlazing-fast 5G.\r\nWorks with Apple Pencil and Magic Keyboard.\r\n12MP Ultra Wide front camera\r\nwith Center Stage.\r\nFive gorgeous colors.', 'Starlight', '64Go', 'mixed', 'http://localhost:8888/php_shop/img/1667381471_APA64GSTLI_ipad-air-select-wifi-starlight.png', 789, 31),
(57, 'IPAD9TH64GSG', 'iPad', 'iPad 9th gen', 'iPad 9th generation Wi-Fi 64Go Space Grey', 'Powerful. Easy to use. Versatile. iPad is designed for all the things you love to do. Work, play, create, learn, stay connected, and more. All at an incredible value.\nThe A13 Bionic chip makes everything responsive, from messaging to web browsing to using multiple apps at once.\nA fast GPU gives you the graphics performance you need. Perfect for playing immersive games and more.\nA more powerful Neural Engine drives machine learning–based features like Live Text in iPadOS.\nThe A13 Bionic chip effortlessly powers advanced apps like Adobe Fresco and Procreate.\nWith all-day battery life, iPad is ready to work or play for as long as you need it.1\nWith incredible detail and vivid colors, the 10.2‑inch Retina display is perfect for watching movies, working on a project, or drawing your next masterpiece.\nTrue Tone adjusts the display to the color temperature of the room to make viewing comfortable in any light.', 'Space Grey', '64Go', 'mixed', 'http://localhost:8888/php_shop/img/1667383693_IPAD9TH64GSG_ipad-2021-hero-space-wifi.png', 439, 12),
(58, 'IPAD9TH64GSIL', 'iPad', 'iPad 9th gen', 'iPad 9th generation Wi-Fi 64Go Silver', 'Powerful. Easy to use. Versatile. iPad is designed for all the things you love to do. Work, play, create, learn, stay connected, and more. All at an incredible value.\r\nThe A13 Bionic chip makes everything responsive, from messaging to web browsing to using multiple apps at once.\r\nA fast GPU gives you the graphics performance you need. Perfect for playing immersive games and more.\r\nA more powerful Neural Engine drives machine learning–based features like Live Text in iPadOS.\r\nThe A13 Bionic chip effortlessly powers advanced apps like Adobe Fresco and Procreate.\r\nWith all-day battery life, iPad is ready to work or play for as long as you need it.1\r\nWith incredible detail and vivid colors, the 10.2‑inch Retina display is perfect for watching movies, working on a project, or drawing your next masterpiece.\r\nTrue Tone adjusts the display to the color temperature of the room to make viewing comfortable in any light.', 'Silver', '64Go', 'mixed', 'http://localhost:8888/php_shop/img/1667383987_IPAD9TH64GSIL_ipad-2021-hero-silver-wifi.png', 439, 11),
(59, 'IPAD9TH256GSG', 'iPad', 'iPad 9th gen', 'iPad 9th generation Wi-Fi 256Go Space Grey', 'Powerful. Easy to use. Versatile. iPad is designed for all the things you love to do. Work, play, create, learn, stay connected, and more. All at an incredible value.\r\nThe A13 Bionic chip makes everything responsive, from messaging to web browsing to using multiple apps at once.\r\nA fast GPU gives you the graphics performance you need. Perfect for playing immersive games and more.\r\nA more powerful Neural Engine drives machine learning–based features like Live Text in iPadOS.\r\nThe A13 Bionic chip effortlessly powers advanced apps like Adobe Fresco and Procreate.\r\nWith all-day battery life, iPad is ready to work or play for as long as you need it.1\r\nWith incredible detail and vivid colors, the 10.2‑inch Retina display is perfect for watching movies, working on a project, or drawing your next masterpiece.\r\nTrue Tone adjusts the display to the color temperature of the room to make viewing comfortable in any light.', 'Space Grey', '256 Go', 'mixed', 'http://localhost:8888/php_shop/img/1667384204_IPAD9TH256GSG_ipad-2021-hero-space-wifi.png', 639, 11),
(60, 'IPAD9TH256GSIL', 'iPad', 'iPad 9th gen', 'iPad 9th generation Wi-Fi 256Go Silver', 'Powerful. Easy to use. Versatile. iPad is designed for all the things you love to do. Work, play, create, learn, stay connected, and more. All at an incredible value.\r\nThe A13 Bionic chip makes everything responsive, from messaging to web browsing to using multiple apps at once.\r\nA fast GPU gives you the graphics performance you need. Perfect for playing immersive games and more.\r\nA more powerful Neural Engine drives machine learning–based features like Live Text in iPadOS.\r\nThe A13 Bionic chip effortlessly powers advanced apps like Adobe Fresco and Procreate.\r\nWith all-day battery life, iPad is ready to work or play for as long as you need it.1\r\nWith incredible detail and vivid colors, the 10.2‑inch Retina display is perfect for watching movies, working on a project, or drawing your next masterpiece.\r\nTrue Tone adjusts the display to the color temperature of the room to make viewing comfortable in any light.', 'Silver', '256 Go', 'mixed', 'http://localhost:8888/php_shop/img/1667384254_IPAD9TH256GSIL_ipad-2021-hero-silver-wifi.png', 639, 8),
(61, 'IPAMIN64GSG', 'iPad', 'iPad mini', 'iPad mini Wi-Fi 64Go Space Grey', 'All-screen design.\nStunning all around.\niPad mini is meticulously designed to be absolutely beautiful. An all-new enclosure features a new, larger edge-to-edge screen, along with narrow borders and elegant rounded corners.\nThe 8.3-inch Liquid Retina display features True Tone, P3 wide color, and ultralow reflectivity, making text sharp and colors vivid, wherever you are.\nApple Pencil attaches magnetically to the side of iPad mini, so it’s always with you and ready for a spur-of-the-moment sketch or spontaneous brainstorming session.2\n\n', 'Space Grey', '64Go', 'mixed', 'http://localhost:8888/php_shop/img/1667384529_IPAMIN64GSG_ipad-mini-select-wifi-space-gray.png', 659, 12),
(62, 'IPAMIN64GPIN', 'iPad', 'iPad mini', 'iPad mini Wi-Fi 64Go Pink', 'All-screen design.\r\nStunning all around.\r\niPad mini is meticulously designed to be absolutely beautiful. An all-new enclosure features a new, larger edge-to-edge screen, along with narrow borders and elegant rounded corners.\r\nThe 8.3-inch Liquid Retina display features True Tone, P3 wide color, and ultralow reflectivity, making text sharp and colors vivid, wherever you are.\r\nApple Pencil attaches magnetically to the side of iPad mini, so it’s always with you and ready for a spur-of-the-moment sketch or spontaneous brainstorming session.2\r\n\r\n', 'Pink', '64Go', 'mixed', 'http://localhost:8888/php_shop/img/1667384601_IPAMIN64GPIN_ipad-mini-select-wifi-pink.png', 659, 9),
(63, 'IPAMIN64GPUR', 'iPad', 'iPad mini', 'iPad mini Wi-Fi 64Go Purple', 'All-screen design.\r\nStunning all around.\r\niPad mini is meticulously designed to be absolutely beautiful. An all-new enclosure features a new, larger edge-to-edge screen, along with narrow borders and elegant rounded corners.\r\nThe 8.3-inch Liquid Retina display features True Tone, P3 wide color, and ultralow reflectivity, making text sharp and colors vivid, wherever you are.\r\nApple Pencil attaches magnetically to the side of iPad mini, so it’s always with you and ready for a spur-of-the-moment sketch or spontaneous brainstorming session.2\r\n\r\n', 'Purple', '64Go', 'mixed', 'http://localhost:8888/php_shop/img/1667384663_IPAMIN64GPUR_ipad-mini-select-wifi-purple.png', 659, 11),
(64, 'IPAMIN64GSTALI', 'iPad', 'iPad mini', 'iPad mini Wi-Fi 64Go Starlight', 'All-screen design.\r\nStunning all around.\r\niPad mini is meticulously designed to be absolutely beautiful. An all-new enclosure features a new, larger edge-to-edge screen, along with narrow borders and elegant rounded corners.\r\nThe 8.3-inch Liquid Retina display features True Tone, P3 wide color, and ultralow reflectivity, making text sharp and colors vivid, wherever you are.\r\nApple Pencil attaches magnetically to the side of iPad mini, so it’s always with you and ready for a spur-of-the-moment sketch or spontaneous brainstorming session.2\r\n\r\n', 'Starlight', '64Go', 'mixed', 'http://localhost:8888/php_shop/img/1667384716_IPAMIN64GSTALI_ipad-mini-select-wifi-starlight.png', 659, 14),
(65, 'IP14128GBLU', 'iPhone', 'iPhone 14', 'iPhone 14 128Go 5G Blue', 'Big and bigger.Our longest battery life ever.\nEmergency SOS via satellite.\nA huge leap in low-light photos.\nWonderfull.', 'Blue', '128 Go', 'mixed', 'http://localhost:8888/php_shop/img/1667386412_IP14128GBLU_iphone-14--blue.png', 1019, 34),
(66, 'IP14128GPUR', 'iPhone', 'iPhone 14', 'iPhone 14 128Go 5G Purple	', 'Big and bigger.Our longest battery life ever.\r\nEmergency SOS via satellite.\r\nA huge leap in low-light photos.\r\nWonderfull.', 'Purple', '128 Go', 'mixed', 'http://localhost:8888/php_shop/img/1667386488_IP14128GPUR_iphone-14-purple.png', 1019, 27),
(67, 'IP14128GMID', 'iPhone', 'iPhone 14', 'iPhone 14 128Go 5G Midnight	', 'Big and bigger.Our longest battery life ever.\r\nEmergency SOS via satellite.\r\nA huge leap in low-light photos.\r\nWonderfull.', 'Midnight', '128 Go', 'mixed', 'http://localhost:8888/php_shop/img/1667386541_IP14128GMID_iphone-14-midnight.png', 1019, 23),
(68, 'IP14128GSTALI', 'iPhone', 'iPhone 14', 'iPhone 14 128Go 5G Starlight	', 'Big and bigger.Our longest battery life ever.\nEmergency SOS via satellite.\nA huge leap in low-light photos.\nWonderfull.', 'Starlight', '128 Go', 'mixed', 'http://localhost:8888/php_shop/img/1667386595_IP14128GSTALI_iphone-14-starlight.png', 1019, 23),
(69, 'IP14128GPRODRED', 'iPhone', 'iPhone 14', 'iPhone 14 128Go 5G (Product)Red	', 'Big and bigger.Our longest battery life ever.\r\nEmergency SOS via satellite.\r\nA huge leap in low-light photos.\r\nWonderfull.', '(Product)Red', '128 Go', 'mixed', 'http://localhost:8888/php_shop/img/1667386702_IP14128GPRODRED_iphone-14-red.png', 1019, 21),
(70, 'IP13128GBLU', 'iPhone', 'iPhone 13', 'iPhone 13 128Go 5G Blue', 'Green, Pink, Blue, Midnight, Starlight, and (PRODUCT)RED\n6.1-inch Super Retina XDR display with HDR and True Tone1\nCeramic Shield front, glass back and aluminum design\nWater resistant to a depth of 6 meters for up to 30 minutes (IP68)5\nDual 12MP camera system (Main and Ultra Wide) with Portrait mode, Night mode, Deep Fusion, Smart HDR 4, Photographic Styles, Cinematic mode in 1080p at 30 fps, and Dolby Vision HDR video recording up to 4K at 60 fps\n12MP TrueDepth front camera with Portrait mode, Night mode, Deep Fusion, Smart HDR 4, Photographic Styles, Cinematic mode in 1080p at 30 fps, Dolby Vision HDR video recording up to 4K at 60 fps, and slo-mo video support for 1080p at 120 fps\nEmergency SOS\n5G and Gigabit LTE4\nA15 Bionic chip with 6-core CPU, 4-core GPU, and 16-core Neural Engine\nBattery life: Up to 19 hours video playback; up to 15 hours video playback (streamed)3\nFace ID for secure authentication and Apple Pay\nCompatible with MagSafe accessories\nMagSafe and Qi wireless charging15\nFast-charge capable', 'Blue', '128 Go', 'mixed', 'http://localhost:8888/php_shop/img/1667387516_IP13128GBLU_iphone-13-blue.png', 909, 11),
(71, 'IP13128GPIN', 'iPhone', 'iPhone 13', 'iPhone 13 128Go 5G Pink	', 'Green, Pink, Blue, Midnight, Starlight, and (PRODUCT)RED\r\n6.1-inch Super Retina XDR display with HDR and True Tone1\r\nCeramic Shield front, glass back and aluminum design\r\nWater resistant to a depth of 6 meters for up to 30 minutes (IP68)5\r\nDual 12MP camera system (Main and Ultra Wide) with Portrait mode, Night mode, Deep Fusion, Smart HDR 4, Photographic Styles, Cinematic mode in 1080p at 30 fps, and Dolby Vision HDR video recording up to 4K at 60 fps\r\n12MP TrueDepth front camera with Portrait mode, Night mode, Deep Fusion, Smart HDR 4, Photographic Styles, Cinematic mode in 1080p at 30 fps, Dolby Vision HDR video recording up to 4K at 60 fps, and slo-mo video support for 1080p at 120 fps\r\nEmergency SOS\r\n5G and Gigabit LTE4\r\nA15 Bionic chip with 6-core CPU, 4-core GPU, and 16-core Neural Engine\r\nBattery life: Up to 19 hours video playback; up to 15 hours video playback (streamed)3\r\nFace ID for secure authentication and Apple Pay\r\nCompatible with MagSafe accessories\r\nMagSafe and Qi wireless charging15\r\nFast-charge capable', 'Pink', '128 Go', 'mixed', 'http://localhost:8888/php_shop/img/1667387605_IP13128GPIN_iphone-13-pink.png', 909, 6),
(72, 'IP13128GMID', 'iPhone', 'iPhone 13', 'iPhone 13 128Go 5G Midnight	', 'Green, Pink, Blue, Midnight, Starlight, and (PRODUCT)RED\r\n6.1-inch Super Retina XDR display with HDR and True Tone1\r\nCeramic Shield front, glass back and aluminum design\r\nWater resistant to a depth of 6 meters for up to 30 minutes (IP68)5\r\nDual 12MP camera system (Main and Ultra Wide) with Portrait mode, Night mode, Deep Fusion, Smart HDR 4, Photographic Styles, Cinematic mode in 1080p at 30 fps, and Dolby Vision HDR video recording up to 4K at 60 fps\r\n12MP TrueDepth front camera with Portrait mode, Night mode, Deep Fusion, Smart HDR 4, Photographic Styles, Cinematic mode in 1080p at 30 fps, Dolby Vision HDR video recording up to 4K at 60 fps, and slo-mo video support for 1080p at 120 fps\r\nEmergency SOS\r\n5G and Gigabit LTE4\r\nA15 Bionic chip with 6-core CPU, 4-core GPU, and 16-core Neural Engine\r\nBattery life: Up to 19 hours video playback; up to 15 hours video playback (streamed)3\r\nFace ID for secure authentication and Apple Pay\r\nCompatible with MagSafe accessories\r\nMagSafe and Qi wireless charging15\r\nFast-charge capable', 'Midnight', '128 Go', 'mixed', 'http://localhost:8888/php_shop/img/1667387656_IP13128GMID_iphone-13-midnight.png', 909, 7),
(73, 'IP13128GSTALIG', 'iPhone', 'iPhone 13', 'iPhone 13 128Go 5G Starlight	', 'Green, Pink, Blue, Midnight, Starlight, and (PRODUCT)RED\r\n6.1-inch Super Retina XDR display with HDR and True Tone1\r\nCeramic Shield front, glass back and aluminum design\r\nWater resistant to a depth of 6 meters for up to 30 minutes (IP68)5\r\nDual 12MP camera system (Main and Ultra Wide) with Portrait mode, Night mode, Deep Fusion, Smart HDR 4, Photographic Styles, Cinematic mode in 1080p at 30 fps, and Dolby Vision HDR video recording up to 4K at 60 fps\r\n12MP TrueDepth front camera with Portrait mode, Night mode, Deep Fusion, Smart HDR 4, Photographic Styles, Cinematic mode in 1080p at 30 fps, Dolby Vision HDR video recording up to 4K at 60 fps, and slo-mo video support for 1080p at 120 fps\r\nEmergency SOS\r\n5G and Gigabit LTE4\r\nA15 Bionic chip with 6-core CPU, 4-core GPU, and 16-core Neural Engine\r\nBattery life: Up to 19 hours video playback; up to 15 hours video playback (streamed)3\r\nFace ID for secure authentication and Apple Pay\r\nCompatible with MagSafe accessories\r\nMagSafe and Qi wireless charging15\r\nFast-charge capable', 'Starlight', '128 Go', 'mixed', 'http://localhost:8888/php_shop/img/1667387715_IP13128GSTALIG_iphone-13-starlight.png', 909, 9),
(74, 'IP13128GGREE', 'iPhone', 'iPhone 13', 'iPhone 13 128Go 5G Green	', 'Green, Pink, Blue, Midnight, Starlight, and (PRODUCT)RED\r\n6.1-inch Super Retina XDR display with HDR and True Tone1\r\nCeramic Shield front, glass back and aluminum design\r\nWater resistant to a depth of 6 meters for up to 30 minutes (IP68)5\r\nDual 12MP camera system (Main and Ultra Wide) with Portrait mode, Night mode, Deep Fusion, Smart HDR 4, Photographic Styles, Cinematic mode in 1080p at 30 fps, and Dolby Vision HDR video recording up to 4K at 60 fps\r\n12MP TrueDepth front camera with Portrait mode, Night mode, Deep Fusion, Smart HDR 4, Photographic Styles, Cinematic mode in 1080p at 30 fps, Dolby Vision HDR video recording up to 4K at 60 fps, and slo-mo video support for 1080p at 120 fps\r\nEmergency SOS\r\n5G and Gigabit LTE4\r\nA15 Bionic chip with 6-core CPU, 4-core GPU, and 16-core Neural Engine\r\nBattery life: Up to 19 hours video playback; up to 15 hours video playback (streamed)3\r\nFace ID for secure authentication and Apple Pay\r\nCompatible with MagSafe accessories\r\nMagSafe and Qi wireless charging15\r\nFast-charge capable', 'Green', '128 Go', 'mixed', 'http://localhost:8888/php_shop/img/1667387768_IP13128GGREE_iphone-13-green.png', 909, 4),
(75, 'IP13128GRED', 'iPhone', 'iPhone 13', 'iPhone 13 128Go 5G (Product)Red	', 'Green, Pink, Blue, Midnight, Starlight, and (PRODUCT)RED\r\n6.1-inch Super Retina XDR display with HDR and True Tone1\r\nCeramic Shield front, glass back and aluminum design\r\nWater resistant to a depth of 6 meters for up to 30 minutes (IP68)5\r\nDual 12MP camera system (Main and Ultra Wide) with Portrait mode, Night mode, Deep Fusion, Smart HDR 4, Photographic Styles, Cinematic mode in 1080p at 30 fps, and Dolby Vision HDR video recording up to 4K at 60 fps\r\n12MP TrueDepth front camera with Portrait mode, Night mode, Deep Fusion, Smart HDR 4, Photographic Styles, Cinematic mode in 1080p at 30 fps, Dolby Vision HDR video recording up to 4K at 60 fps, and slo-mo video support for 1080p at 120 fps\r\nEmergency SOS\r\n5G and Gigabit LTE4\r\nA15 Bionic chip with 6-core CPU, 4-core GPU, and 16-core Neural Engine\r\nBattery life: Up to 19 hours video playback; up to 15 hours video playback (streamed)3\r\nFace ID for secure authentication and Apple Pay\r\nCompatible with MagSafe accessories\r\nMagSafe and Qi wireless charging15\r\nFast-charge capable', '(Product)Red', '128 Go', 'mixed', 'http://localhost:8888/php_shop/img/1667387825_IP13128GRED_iphone-13-product-red.png', 909, 5),
(76, 'IPSE64GMID', 'iPhone', 'iPhone SE', 'iPhone SE 64Go 5G Midnight', 'A chip that really zips.\nA leap in battery life.\nA fast 5G connection.\nA design that\'s made to last.\nA superstar camera.\nA button you call Home.\nAt the heart of iPhone SE you’ll find\nthe same superpowerful A15 Bionic\nchip that’s in iPhone 13.\nA15 Bionic enhances nearly everything you do. Apps load in a flash and feel so fluid.\nBut that’s not all.\nYou get incredibly\nsmooth graphics\nperformance for gaming.\nA15 Bionic even powers advanced photography features that make each part of your photo — faces, places, everything — look fabulous.\nA highly efficient chip, an enhanced battery, and iOS 16 work together to boost battery life. When you do need to charge, just place iPhone SE on a wireless charger. Or connect a 20W or higher adapter to fast charge from zero to up to 50 percent charge in 30 minutes flat.', 'Midnight', '64Go', 'mixed', 'http://localhost:8888/php_shop/img/1667388403_IPSE64GMID_iphone-se-midnight.png', 559, 23),
(77, 'IPSE64GSTALIG', 'iPhone', 'iPhone SE', 'iPhone SE 64Go 5G Starlight	', 'A chip that really zips.\r\nA leap in battery life.\r\nA fast 5G connection.\r\nA design that\'s made to last.\r\nA superstar camera.\r\nA button you call Home.\r\nAt the heart of iPhone SE you’ll find\r\nthe same superpowerful A15 Bionic\r\nchip that’s in iPhone 13.\r\nA15 Bionic enhances nearly everything you do. Apps load in a flash and feel so fluid.\r\nBut that’s not all.\r\nYou get incredibly\r\nsmooth graphics\r\nperformance for gaming.\r\nA15 Bionic even powers advanced photography features that make each part of your photo — faces, places, everything — look fabulous.\r\nA highly efficient chip, an enhanced battery, and iOS 16 work together to boost battery life. When you do need to charge, just place iPhone SE on a wireless charger. Or connect a 20W or higher adapter to fast charge from zero to up to 50 percent charge in 30 minutes flat.', 'Starlight', '64Go', 'mixed', 'http://localhost:8888/php_shop/img/1667402797_IPSE64GSTALIG_iphone-se-starlight.png', 559, 6),
(78, 'IPSE64GRED', 'iPhone', 'iPhone SE', 'iPhone SE 64Go 5G (Product)Red	', 'A chip that really zips.\r\nA leap in battery life.\r\nA fast 5G connection.\r\nA design that\'s made to last.\r\nA superstar camera.\r\nA button you call Home.\r\nAt the heart of iPhone SE you’ll find\r\nthe same superpowerful A15 Bionic\r\nchip that’s in iPhone 13.\r\nA15 Bionic enhances nearly everything you do. Apps load in a flash and feel so fluid.\r\nBut that’s not all.\r\nYou get incredibly\r\nsmooth graphics\r\nperformance for gaming.\r\nA15 Bionic even powers advanced photography features that make each part of your photo — faces, places, everything — look fabulous.\r\nA highly efficient chip, an enhanced battery, and iOS 16 work together to boost battery life. When you do need to charge, just place iPhone SE on a wireless charger. Or connect a 20W or higher adapter to fast charge from zero to up to 50 percent charge in 30 minutes flat.', '(Product)Red', '64Go', 'mixed', 'http://localhost:8888/php_shop/img/1667388555_IPSE64GRED_iphone-se-product-red.png', 559, 8),
(79, 'APWAS845GLDINK', 'Watch', 'Apple Watch Series 8', 'Gold Stainless Steel Case with Leather Link / Ink', 'A healthy leap ahead.\nYour essential companion is now even more powerful. Introducing temperature sensing for deeper insights into women’s health. Crash Detection to get help in an emergency. Sleep stages to better understand your sleep. And new ways to train using the enhanced Workout app. The future of health never looked so good.\nBeautiful.\nAnd made to\nstay that way.', 'Ink', '45mm', 'mixed', 'http://localhost:8888/php_shop/img/1667393318_APWAS845GLDINK_watch-41-stainless-gold-cell-ink.png', 899, 23),
(80, 'APWAS845GLDMID', 'Watch', 'Apple Watch Series 8', 'Gold Stainless Steel Case with Leather Link / Midnight', 'A healthy leap ahead.\nYour essential companion is now even more powerful. Introducing temperature sensing for deeper insights into women’s health. Crash Detection to get help in an emergency. Sleep stages to better understand your sleep. And new ways to train using the enhanced Workout app. The future of health never looked so good.\nBeautiful.\nAnd made to\nstay that way.', 'Midnight', '45mm', 'mixed', 'http://localhost:8888/php_shop/img/1667393644_APWAS845GLDMID_watch-41-stainless-gold-cell-midnight.png', 899, 15),
(81, 'APWAS845SILSUNG', 'Watch', 'Apple Watch Series 8', 'Silver Aluminum Case with Solo Loop', 'A healthy leap ahead.\r\nYour essential companion is now even more powerful. Introducing temperature sensing for deeper insights into women’s health. Crash Detection to get help in an emergency. Sleep stages to better understand your sleep. And new ways to train using the enhanced Workout app. The future of health never looked so good.\r\nBeautiful.\r\nAnd made to\r\nstay that way.', 'Sunglow', '45mm', 'mixed', 'http://localhost:8888/php_shop/img/1667394471_APWAS845SILSUNG_watch-41-alum-silver-sunglow.png', 499, 12),
(82, 'APWAS845SILSUCC', 'Watch', 'Apple Watch Series 8', 'Silver Aluminum Case with Solo Loop	', 'A healthy leap ahead.\r\nYour essential companion is now even more powerful. Introducing temperature sensing for deeper insights into women’s health. Crash Detection to get help in an emergency. Sleep stages to better understand your sleep. And new ways to train using the enhanced Workout app. The future of health never looked so good.\r\nBeautiful.\r\nAnd made to\r\nstay that way.', 'Succulent', '45mm', 'mixed', 'http://localhost:8888/php_shop/img/1667394617_APWAS845SILSUCC_watch-41-alum-silver-suculent.png', 499, 15),
(83, 'APWAS845SILCHAPIN', 'Watch', 'Apple Watch Series 8', 'Silver Aluminum Case with Solo Loop	', 'A healthy leap ahead.\r\nYour essential companion is now even more powerful. Introducing temperature sensing for deeper insights into women’s health. Crash Detection to get help in an emergency. Sleep stages to better understand your sleep. And new ways to train using the enhanced Workout app. The future of health never looked so good.\r\nBeautiful.\r\nAnd made to\r\nstay that way.', 'Chalk Pink', '45mm', 'mixed', 'http://localhost:8888/php_shop/img/1667394732_APWAS845SILCHAPIN_MKWA3ref_VW_34FR+watch-41-alum-silver-chalk-pink.png', 499, 8),
(84, 'APWAS845SILSTOBLU', 'Watch', 'Apple Watch Series 8', 'Silver Aluminum Case with Solo Loop	', 'A healthy leap ahead.\r\nYour essential companion is now even more powerful. Introducing temperature sensing for deeper insights into women’s health. Crash Detection to get help in an emergency. Sleep stages to better understand your sleep. And new ways to train using the enhanced Workout app. The future of health never looked so good.\r\nBeautiful.\r\nAnd made to\r\nstay that way.', 'Storm Blue', '45mm', 'mixed', 'http://localhost:8888/php_shop/img/1667394836_APWAS845SILSTOBLU_MPD83ref_VW_34FR+watch-41-alum-silver-storm-blue.png', 499, 11),
(85, 'APWAS845SILMIDN', 'Watch', 'Apple Watch Series 8', 'Silver Aluminum Case with Solo Loop	', 'A healthy leap ahead.\r\nYour essential companion is now even more powerful. Introducing temperature sensing for deeper insights into women’s health. Crash Detection to get help in an emergency. Sleep stages to better understand your sleep. And new ways to train using the enhanced Workout app. The future of health never looked so good.\r\nBeautiful.\r\nAnd made to\r\nstay that way.', 'Midnight', '45mm', 'mixed', 'http://localhost:8888/php_shop/img/1667394934_APWAS845SILMIDN_MPDJ3ref_VW_34FR+watch-41-alum-silver-midnight.png', 499, 13),
(86, 'APWAS845SILSTALIG', 'Watch', 'Apple Watch Series 8', 'Silver Aluminum Case with Solo Loop	', 'A healthy leap ahead.\r\nYour essential companion is now even more powerful. Introducing temperature sensing for deeper insights into women’s health. Crash Detection to get help in an emergency. Sleep stages to better understand your sleep. And new ways to train using the enhanced Workout app. The future of health never looked so good.\r\nBeautiful.\r\nAnd made to\r\nstay that way.', 'Starlight', '45mm', 'mixed', 'http://localhost:8888/php_shop/img/1667395028_APWAS845SILSTALIG_MKVJ3ref_VW_34FR+watch-41-alum-silver-starlight.png', 499, 14),
(87, 'APWASE44STALIGRAIFOR', 'Watch', 'Apple Watch SE', 'Starlight Aluminum Case with Braided Solo Loop / Rainforest', 'A great deal to love.\nThree stylish case colors. Powerful sensors for insights about your health and fitness. Innovative safety features. Convenient ways to stay connected.\nA faster dual-core processor for added performance. Apple Watch SE is feature packed, and now it’s a better value than ever.', 'Rainforest', '44mm', 'mixed', 'http://localhost:8888/php_shop/img/1667395981_APWASE44STALIGRAIFOR_MQGM3ref_VW_34FR+watch-44-alum-starlight-rain.png', 349, 12),
(88, 'APWASE44STALIGSLABLU', 'Watch', 'Apple Watch SE', 'Starlight Aluminum Case with Braided Solo Loop ', 'A great deal to love.\r\nThree stylish case colors. Powerful sensors for insights about your health and fitness. Innovative safety features. Convenient ways to stay connected.\r\nA faster dual-core processor for added performance. Apple Watch SE is feature packed, and now it’s a better value than ever.', 'Slate Blue', '44mm', 'mixed', 'http://localhost:8888/php_shop/img/1667396100_APWASE44STALIGSLABLU_MP953ref_VW_34FR+watch-40-alum-starlight-state.png', 349, 8),
(89, 'APWASE44STALIGBEIG', 'Watch', 'Apple Watch SE', 'Starlight Aluminum Case with Braided Solo Loop	', 'A great deal to love.\r\nThree stylish case colors. Powerful sensors for insights about your health and fitness. Innovative safety features. Convenient ways to stay connected.\r\nA faster dual-core processor for added performance. Apple Watch SE is feature packed, and now it’s a better value than ever.', 'Beige', '44mm', 'mixed', 'http://localhost:8888/php_shop/img/1667396400_APWASE44STALIGBEIG_MP9Q3ref_VW_34FR+watch-40-alum-starlight-beige.png', 349, 9),
(90, 'APWASE44STALIGMIDN', 'Watch', 'Apple Watch SE', 'Starlight Aluminum Case with Braided Solo Loop	', 'A great deal to love.\r\nThree stylish case colors. Powerful sensors for insights about your health and fitness. Innovative safety features. Convenient ways to stay connected.\r\nA faster dual-core processor for added performance. Apple Watch SE is feature packed, and now it’s a better value than ever.', 'Midnight', '44mm', 'mixed', 'http://localhost:8888/php_shop/img/1667396582_APWASE44STALIGMIDN_MPA13ref_VW_34FR+watch-40-alum-starlight-midnight.png', 349, 14),
(91, 'APWASE44STALIGBLAUNI', 'Watch', 'Apple Watch SE', 'Starlight Aluminum Case with Braided Solo Loop	', 'A great deal to love.\r\nThree stylish case colors. Powerful sensors for insights about your health and fitness. Innovative safety features. Convenient ways to stay connected.\r\nA faster dual-core processor for added performance. Apple Watch SE is feature packed, and now it’s a better value than ever.', 'Black Unity', '44mm', 'mixed', 'http://localhost:8888/php_shop/img/1667396690_APWASE44STALIGBLAUNI_MMW93ref_VW_34FR+watch-40-alum-starlight-nc-se_VW_34FR_WF_CO+watch-face-41-braided-black-unity.png', 349, 12),
(92, 'APWASE44STALIGPRIEDI', 'Watch', 'Apple Watch SE', 'Starlight Aluminum Case with Braided Solo Loop	', 'A great deal to love.\r\nThree stylish case colors. Powerful sensors for insights about your health and fitness. Innovative safety features. Convenient ways to stay connected.\r\nA faster dual-core processor for added performance. Apple Watch SE is feature packed, and now it’s a better value than ever.', 'Pride Edition', '44mm', 'mixed', 'http://localhost:8888/php_shop/img/1667396787_APWASE44STALIGPRIEDI_MJX03ref_VW_34FR+watch-40-alum-starlight-nc-se_VW_34FR_WF_CO+watch-face-41-braided-pride.png', 349, 11),
(93, 'APWASE44STALIGPRODRED', 'Watch', 'Apple Watch SE', 'Starlight Aluminum Case with Braided Solo Loop	', 'A great deal to love.\r\nThree stylish case colors. Powerful sensors for insights about your health and fitness. Innovative safety features. Convenient ways to stay connected.\r\nA faster dual-core processor for added performance. Apple Watch SE is feature packed, and now it’s a better value than ever.', '(Product)Red', '44mm', 'mixed', 'http://localhost:8888/php_shop/img/1667396883_APWASE44STALIGPRODRED_MP9F3ref_VW_34FR+watch-40-alum-starlight-red.png', 349, 17);
INSERT INTO `product` (`product_id`, `reference`, `category`, `sub_category`, `title`, `details`, `color`, `size`, `gender`, `picture`, `price`, `stock`) VALUES
(94, 'APWAULT49WHI', 'Watch', 'Apple Watch Ultra', 'Titanium Case with White Ocean Band', 'To build the ultimate sports watch, we crafted every element with painstaking attention to detail for unparalleled performance. Titanium strikes the perfect balance between weight, ruggedness, and corrosion resistance. The new case design rises up to surround the flat sapphire crystal and protect it from edge impacts. The Digital Crown is larger and the side button is raised from the case, making them easier to use while you’re wearing gloves.', 'White', '49 mm', 'mixed', 'http://localhost:8888/php_shop/img/1667397276_APWAULT49WHI_MQE93_VW_34FR+watch-49-titanium-ultra_VW_34FR_WF_CO+watch-face-49-ocean-ultra-white.png', 999, 12),
(95, 'APWAULT49YELLO', 'Watch', 'Apple Watch Ultra', 'Titanium Case with Yellow Ocean Band', 'To build the ultimate sports watch, we crafted every element with painstaking attention to detail for unparalleled performance. Titanium strikes the perfect balance between weight, ruggedness, and corrosion resistance. The new case design rises up to surround the flat sapphire crystal and protect it from edge impacts. The Digital Crown is larger and the side button is raised from the case, making them easier to use while you’re wearing gloves.', 'Yellow', '49 mm', 'mixed', 'http://localhost:8888/php_shop/img/1667397424_APWAULT49YELLO_MQEC3_VW_34FR+watch-49-titanium-ultra_VW_34FR_WF_CO+watch-face-49-ocean-ultra-yellow.png', 999, 17);

-- --------------------------------------------------------

--
-- Structure de la table `shop_order`
--

CREATE TABLE `shop_order` (
  `order_id` int(3) NOT NULL,
  `member_id` int(3) DEFAULT NULL,
  `amount` int(10) NOT NULL,
  `registration_date` datetime NOT NULL,
  `state` enum('being processed','sent','delivered') NOT NULL DEFAULT 'being processed'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `shop_order`
--

INSERT INTO `shop_order` (`order_id`, `member_id`, `amount`, `registration_date`, `state`) VALUES
(18, 12, 8835, '2022-10-26 17:03:52', 'delivered'),
(19, 12, 8835, '2022-10-26 17:04:08', 'delivered'),
(20, 12, 1178, '2022-10-26 17:05:31', 'delivered'),
(21, 12, 4123, '2022-10-27 09:23:32', 'sent'),
(22, 12, 4407, '2022-10-27 21:33:44', 'sent'),
(23, 14, 2938, '2022-10-27 23:32:31', 'sent'),
(24, 14, 5698, '2022-10-27 23:35:22', 'sent'),
(25, 12, 1838, '2022-10-28 15:52:29', 'being processed'),
(26, 12, 2658, '2022-10-28 15:59:13', 'being processed'),
(27, 12, 3798, '2022-10-28 16:00:27', 'being processed'),
(29, 12, 2428, '2022-10-28 16:02:51', 'being processed'),
(30, 12, 1538, '2022-10-28 16:08:42', 'being processed'),
(31, 12, 1628, '2022-10-28 16:12:56', 'being processed'),
(32, 12, 1778, '2022-10-28 16:14:24', 'being processed'),
(33, 12, 5598, '2022-10-28 16:15:48', 'being processed'),
(34, 12, 2427, '2022-10-28 16:17:13', 'being processed'),
(35, 12, 1918, '2022-10-28 16:22:15', 'being processed'),
(36, 14, 1669, '2022-10-30 17:38:58', 'being processed');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`member_id`),
  ADD UNIQUE KEY `pseudo` (`pseudo`);

--
-- Index pour la table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`order_details_id`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Index pour la table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`);

--
-- Index pour la table `shop_order`
--
ALTER TABLE `shop_order`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `member_fk` (`member_id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `member`
--
ALTER TABLE `member`
  MODIFY `member_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT pour la table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `order_details_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT pour la table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=96;

--
-- AUTO_INCREMENT pour la table `shop_order`
--
ALTER TABLE `shop_order`
  MODIFY `order_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `order_id` FOREIGN KEY (`order_id`) REFERENCES `shop_order` (`order_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `product_id` FOREIGN KEY (`product_id`) REFERENCES `product` (`product_id`) ON DELETE SET NULL ON UPDATE SET NULL;

--
-- Contraintes pour la table `shop_order`
--
ALTER TABLE `shop_order`
  ADD CONSTRAINT `member_fk` FOREIGN KEY (`member_id`) REFERENCES `member` (`member_id`) ON DELETE SET NULL ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
