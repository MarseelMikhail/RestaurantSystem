-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 12, 2022 at 04:24 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `online_orders`
--

-- --------------------------------------------------------

--
-- Table structure for table `coupon`
--

CREATE TABLE `coupon` (
  `cpid` int(11) NOT NULL,
  `couponCode` varchar(10) DEFAULT NULL,
  `discount` decimal(3,2) DEFAULT NULL,
  `isEnable` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `coupon`
--

INSERT INTO `coupon` (`cpid`, `couponCode`, `discount`, `isEnable`) VALUES
(1, 'DISCOUNT20', '0.20', 1);

-- --------------------------------------------------------

--
-- Table structure for table `customerdetails`
--

CREATE TABLE `customerdetails` (
  `CDid` int(11) NOT NULL,
  `address` varchar(40) NOT NULL,
  `phone` varchar(12) NOT NULL,
  `postal` int(11) NOT NULL,
  `uid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customerdetails`
--

INSERT INTO `customerdetails` (`CDid`, `address`, `phone`, `postal`, `uid`) VALUES
(17, 'mailbox- 018 CW, college west', '6399991248', 0, 2),
(25, '3737 Wascana parkway, College west,mailb', '6399991248', 0, 2),
(27, 'qq', '0012345', 0, 5);

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `mid` int(11) NOT NULL,
  `foodName` varchar(20) DEFAULT NULL,
  `foodDescription` varchar(255) DEFAULT NULL,
  `foodImage` varchar(255) DEFAULT NULL,
  `foodPrice` decimal(10,2) DEFAULT NULL,
  `inStock` int(11) DEFAULT 1,
  `isDelete` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`mid`, `foodName`, `foodDescription`, `foodImage`, `foodPrice`, `inStock`, `isDelete`) VALUES
(1, 'Fries', 'Potato fries', 'http://sample', '5.99', 1, 0),
(2, 'Burger', 'Chicken burger', 'http://sample', '6.99', 1, 0),
(3, 'Coke', 'Coca Cola', 'http://sample', '1.99', 1, 0),
(4, 'kaka', 'blandd', 'CSSS Event-1.png', '43.80', NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `oid` int(11) NOT NULL,
  `orderPlaceDate` datetime DEFAULT NULL,
  `arriveIn` int(11) DEFAULT NULL,
  `orderState` int(11) DEFAULT NULL,
  `orderNote` varchar(255) DEFAULT NULL,
  `isPaid` int(11) DEFAULT NULL,
  `orderedRestaurant` varchar(30) DEFAULT NULL,
  `uid` int(11) DEFAULT NULL,
  `cpid` int(11) DEFAULT NULL,
  `order_total` decimal(6,2) DEFAULT NULL,
  `CDid` int(11) NOT NULL,
  `pid` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`oid`, `orderPlaceDate`, `arriveIn`, `orderState`, `orderNote`, `isPaid`, `orderedRestaurant`, `uid`, `cpid`, `order_total`, `CDid`, `pid`) VALUES
(1, '2022-10-19 22:44:22', 35, 1, 'Call an ambulance but not for me', 1, 'KFC', 4, NULL, NULL, 0, 0),
(2, '2022-10-19 23:41:54', 30, 1, 'Call me', 1, 'MCD', 5, NULL, NULL, 0, 0),
(77, '2022-12-08 18:17:43', 35, 0, 'none', 1, 'MCD', 2, NULL, '9.99', 0, 0),
(78, '2022-12-08 18:19:25', 35, 0, 'none', 1, 'MCD', 2, NULL, '9.99', 0, 0),
(79, '2022-12-09 02:51:31', 35, 0, 'none', 1, 'MCD', 2, NULL, '9.99', 0, 0),
(80, '2022-12-09 17:53:35', 35, 0, 'none', 1, 'MCD', 2, NULL, '9.99', 0, 0),
(83, '2022-12-10 18:51:15', 35, 0, 'none', 1, 'MCD', 2, NULL, '9.99', 0, 0),
(85, '2022-12-10 20:12:40', 35, 0, 'none', 1, 'MCD', 2, NULL, '9.99', 0, 0),
(88, '2022-12-10 20:19:38', 35, 0, 'none', 1, 'MCD', 2, NULL, '100.00', 0, 0),
(97, '2022-12-10 20:35:55', 35, 0, 'none', 1, 'MCD', 2, NULL, '6.99', 0, 0),
(99, '2022-12-10 21:12:00', 35, 0, 'none', 1, 'MCD', 2, NULL, '12.98', 0, 0),
(100, '2022-12-11 01:01:58', 35, 0, 'none', 1, 'MCD', 2, NULL, '12.98', 0, 0),
(128, '2022-12-11 02:23:21', 35, 0, 'none', 1, 'MCD', 2, NULL, '6.99', 0, 0),
(1018, '2022-12-11 03:12:14', 35, 0, 'none', 1, 'MCD', 2, NULL, '50.79', 0, 0),
(1027, '2022-12-11 12:45:37', 35, 0, 'none', 1, 'MCD', 5, NULL, '12.98', 27, 26),
(1028, '2022-12-11 12:49:13', 35, 0, 'none', 1, 'MCD', 5, NULL, '56.78', 27, 26),
(1030, '2022-12-11 13:06:26', 35, 0, 'new note', 1, 'MCD', 5, NULL, '7.98', 27, 26),
(1031, '2022-12-11 14:04:08', 35, 0, 'garam', 1, 'MCD', 5, NULL, '9.97', 27, 26),
(1032, '2022-12-11 14:49:42', 35, 0, 'new', 1, 'MCD', 2, NULL, '64.76', 17, 25),
(1033, '2022-12-11 15:00:20', 35, 0, 'dfgsfg', 1, 'MCD', 2, NULL, '18.97', 25, 25),
(1034, '2022-12-11 15:16:39', 35, 0, 'new', 1, 'MCD', 2, NULL, '58.77', 17, 25),
(1035, '2022-12-11 20:13:40', 35, 0, 'new', 1, 'MCD', 2, NULL, '7.98', 17, 25);

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `id` int(10) NOT NULL,
  `mid` int(11) NOT NULL,
  `oid` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `item_total` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`id`, `mid`, `oid`, `quantity`, `item_total`) VALUES
(1110, 1, 1030, 1, 5.99),
(1111, 3, 1030, 1, 1.99),
(1112, 1, 1031, 1, 5.99),
(1113, 3, 1031, 2, 3.98),
(1114, 1, 1032, 2, 11.98),
(1115, 2, 1032, 1, 6.99),
(1116, 3, 1032, 1, 1.99),
(1117, 4, 1032, 1, 43.8),
(1118, 1, 1033, 2, 11.98),
(1119, 2, 1033, 1, 6.99),
(1120, 1, 1034, 1, 5.99),
(1121, 2, 1034, 1, 6.99),
(1122, 3, 1034, 1, 1.99),
(1123, 4, 1034, 1, 43.8),
(1124, 1, 1035, 1, 5.99),
(1125, 3, 1035, 1, 1.99);

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `pid` int(11) NOT NULL,
  `cardholder` varchar(30) DEFAULT NULL,
  `cardNumber` varchar(20) DEFAULT NULL,
  `cvv` int(11) DEFAULT NULL,
  `uid` int(11) DEFAULT NULL,
  `exp` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`pid`, `cardholder`, `cardNumber`, `cvv`, `uid`, `exp`) VALUES
(25, 'kakaa', '12341234', 123, 2, '123'),
(26, 'qq', 'qq', 0, 5, 'qq');

-- --------------------------------------------------------

--
-- Table structure for table `restaurant`
--

CREATE TABLE `restaurant` (
  `pid` int(11) NOT NULL,
  `restaurantName` varchar(30) DEFAULT NULL,
  `restaurantDescription` varchar(255) DEFAULT NULL,
  `restaurantImage` varchar(255) DEFAULT NULL,
  `restaurantAddress` varchar(255) DEFAULT NULL,
  `restaurantPhone` varchar(15) DEFAULT NULL,
  `openHour` varchar(100) DEFAULT NULL,
  `isOpen` int(11) DEFAULT NULL,
  `restaurantPostalCode` varchar(7) DEFAULT NULL,
  `oid` int(11) DEFAULT NULL,
  `mid` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `restaurant`
--

INSERT INTO `restaurant` (`pid`, `restaurantName`, `restaurantDescription`, `restaurantImage`, `restaurantAddress`, `restaurantPhone`, `openHour`, `isOpen`, `restaurantPostalCode`, `oid`, `mid`) VALUES
(1, 'KFC', 'kentucky fried chicken', 'http://sample', '2020 Wascana Parkway', '3067776666', '9:00 am to 10:00 pm', 1, 'S4S 2A3', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `uid` int(11) NOT NULL,
  `firstName` varchar(30) DEFAULT NULL,
  `lastName` varchar(30) DEFAULT NULL,
  `userName` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(20) NOT NULL,
  `accountType` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`uid`, `firstName`, `lastName`, `userName`, `email`, `password`, `accountType`) VALUES
(1, 'Jane', 'Doe', 'Jane Doe\'s account', 'janedoe@gmail.com', '123456', 0),
(2, 'kk', 'kkk', 'kkk', 'kkk', 'kkkk', 0),
(4, 'Keerat', 'Tanwar', 'kaka', 'tanwarkeerat@gmail.com', 'kaka', 0),
(5, 'q', 'q', 'q', 'q', 'q', 0),
(8, 'manager', 'manager', 'manager', 'manager', 'manager', 1),
(10, 'Keerat', 'Tanwar', 'new1', 'tanwarkeerat@gmail.com', '123', 0),
(11, 'Keerat', 'Tanwar', 'new1', 'tanwarkeerat@gmail.com', '123', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `coupon`
--
ALTER TABLE `coupon`
  ADD PRIMARY KEY (`cpid`);

--
-- Indexes for table `customerdetails`
--
ALTER TABLE `customerdetails`
  ADD PRIMARY KEY (`CDid`),
  ADD KEY `uid` (`uid`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`mid`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`oid`),
  ADD KEY `uid` (`uid`),
  ADD KEY `cpid` (`cpid`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `mid` (`mid`),
  ADD KEY `oid` (`oid`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`pid`),
  ADD KEY `uid` (`uid`);

--
-- Indexes for table `restaurant`
--
ALTER TABLE `restaurant`
  ADD PRIMARY KEY (`pid`),
  ADD KEY `oid` (`oid`),
  ADD KEY `mid` (`mid`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`uid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `coupon`
--
ALTER TABLE `coupon`
  MODIFY `cpid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `customerdetails`
--
ALTER TABLE `customerdetails`
  MODIFY `CDid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `mid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `oid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1036;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1126;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `pid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `restaurant`
--
ALTER TABLE `restaurant`
  MODIFY `pid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `customerdetails`
--
ALTER TABLE `customerdetails`
  ADD CONSTRAINT `customerdetails_ibfk_1` FOREIGN KEY (`uid`) REFERENCES `user` (`uid`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`uid`) REFERENCES `user` (`uid`),
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`cpid`) REFERENCES `coupon` (`cpid`);

--
-- Constraints for table `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `order_details_ibfk_1` FOREIGN KEY (`mid`) REFERENCES `menu` (`mid`),
  ADD CONSTRAINT `order_details_ibfk_2` FOREIGN KEY (`oid`) REFERENCES `orders` (`oid`);

--
-- Constraints for table `payment`
--
ALTER TABLE `payment`
  ADD CONSTRAINT `payment_ibfk_1` FOREIGN KEY (`uid`) REFERENCES `user` (`uid`) ON DELETE CASCADE;

--
-- Constraints for table `restaurant`
--
ALTER TABLE `restaurant`
  ADD CONSTRAINT `restaurant_ibfk_1` FOREIGN KEY (`oid`) REFERENCES `orders` (`oid`),
  ADD CONSTRAINT `restaurant_ibfk_2` FOREIGN KEY (`mid`) REFERENCES `menu` (`mid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
