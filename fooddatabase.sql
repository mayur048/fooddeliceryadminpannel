-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 10, 2021 at 07:41 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fooddatabase`
--

-- --------------------------------------------------------

--
-- Table structure for table `city`
--

CREATE TABLE `city` (
  `cityId` int(11) NOT NULL,
  `cityName` varchar(100) NOT NULL,
  `isActive` tinyint(1) NOT NULL DEFAULT 1,
  `createDate` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `userId` int(11) NOT NULL,
  `email` varchar(60) NOT NULL,
  `password` varchar(100) NOT NULL,
  `phone` bigint(20) NOT NULL,
  `roleId` int(11) NOT NULL,
  `isActive` tinyint(1) NOT NULL,
  `createDate` datetime NOT NULL DEFAULT current_timestamp(),
  `updataDate` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`userId`, `email`, `password`, `phone`, `roleId`, `isActive`, `createDate`, `updataDate`) VALUES
(1, 'Shadow@walker.com', 'dhX97@#dfkj', 9192599959, 1, 1, '2021-02-04 18:00:34', '2021-02-04 18:00:54');

-- --------------------------------------------------------

--
-- Table structure for table `ordereditems`
--

CREATE TABLE `ordereditems` (
  `productId` int(11) NOT NULL,
  `orderId` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ordereditems`
--

INSERT INTO `ordereditems` (`productId`, `orderId`, `quantity`) VALUES
(1, 2, 6),
(1, 1, 3);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `productId` int(11) NOT NULL,
  `shopId` int(11) NOT NULL,
  `ProductDesc` varchar(500) NOT NULL,
  `ProductSummary` varchar(100) NOT NULL,
  `Price` int(11) NOT NULL,
  `DiscountPrice` int(11) NOT NULL,
  `ProductCategoryId` int(11) NOT NULL,
  `isActive` tinyint(1) NOT NULL DEFAULT 1,
  `createDate` datetime NOT NULL DEFAULT current_timestamp(),
  `updataDate` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`productId`, `shopId`, `ProductDesc`, `ProductSummary`, `Price`, `DiscountPrice`, `ProductCategoryId`, `isActive`, `createDate`, `updataDate`) VALUES
(1, 1, 'SomeThing', 'wow', 5000, 10000, 1, 1, '2021-02-10 18:02:31', '2021-02-10 18:02:31');

-- --------------------------------------------------------

--
-- Table structure for table `productcategory`
--

CREATE TABLE `productcategory` (
  `ProductCategoryID` int(11) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `userId` int(11) NOT NULL,
  `isActive` tinyint(1) NOT NULL DEFAULT 1,
  `createDate` datetime NOT NULL DEFAULT current_timestamp(),
  `updataDate` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `productcategory`
--

INSERT INTO `productcategory` (`ProductCategoryID`, `Name`, `userId`, `isActive`, `createDate`, `updataDate`) VALUES
(1, 'sweets', 1, 1, '2021-02-10 18:02:31', '2021-02-25 18:02:31');

-- --------------------------------------------------------

--
-- Table structure for table `productorder`
--

CREATE TABLE `productorder` (
  `OrderId` int(11) NOT NULL,
  `shopId` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `totalAmount` int(11) NOT NULL,
  `paymentMethod` varchar(50) NOT NULL,
  `isActive` tinyint(1) NOT NULL DEFAULT 1,
  `createDate` datetime NOT NULL DEFAULT current_timestamp(),
  `updataDate` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `productorder`
--

INSERT INTO `productorder` (`OrderId`, `shopId`, `userId`, `totalAmount`, `paymentMethod`, `isActive`, `createDate`, `updataDate`) VALUES
(1, 1, 1, 100000, 'cod', 1, '2021-02-10 18:02:31', '2021-02-25 18:02:31');

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `RoleId` int(11) NOT NULL,
  `RoleName` varchar(50) NOT NULL,
  `isActive` tinyint(1) NOT NULL DEFAULT 1,
  `createDate` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`RoleId`, `RoleName`, `isActive`, `createDate`) VALUES
(1, 'super Admin', 1, '2020-05-28 23:00:00'),
(2, 'admin', 1, '2021-02-05 20:25:57');

-- --------------------------------------------------------

--
-- Table structure for table `shop`
--

CREATE TABLE `shop` (
  `ShopId` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `ShopeName` varchar(200) NOT NULL,
  `PhomeNo` bigint(20) NOT NULL,
  `Address` varchar(200) NOT NULL,
  `street` varchar(50) NOT NULL,
  `pinCode` int(11) NOT NULL,
  `createDate` datetime NOT NULL DEFAULT current_timestamp(),
  `updataDate` datetime NOT NULL DEFAULT current_timestamp(),
  `isActive` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `shop`
--

INSERT INTO `shop` (`ShopId`, `userId`, `ShopeName`, `PhomeNo`, `Address`, `street`, `pinCode`, `createDate`, `updataDate`, `isActive`) VALUES
(1, 1, 'Shadownet', 91937999959, 'room no 13 t48, old barrack', 'chembur camp', 400075, '2021-02-10 18:02:31', '2021-02-25 18:02:31', 0);

-- --------------------------------------------------------

--
-- Table structure for table `state`
--

CREATE TABLE `state` (
  `stateId` int(11) NOT NULL,
  `stateName` varchar(50) NOT NULL,
  `isActive` int(11) NOT NULL DEFAULT 1,
  `createDate` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `state`
--

INSERT INTO `state` (`stateId`, `stateName`, `isActive`, `createDate`) VALUES
(1, 'maharastra', 1, '2021-02-05 20:30:24');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `city`
--
ALTER TABLE `city`
  ADD PRIMARY KEY (`cityId`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`userId`) USING BTREE;

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`productId`);

--
-- Indexes for table `productcategory`
--
ALTER TABLE `productcategory`
  ADD PRIMARY KEY (`ProductCategoryID`);

--
-- Indexes for table `productorder`
--
ALTER TABLE `productorder`
  ADD PRIMARY KEY (`OrderId`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`RoleId`);

--
-- Indexes for table `shop`
--
ALTER TABLE `shop`
  ADD PRIMARY KEY (`ShopId`);

--
-- Indexes for table `state`
--
ALTER TABLE `state`
  ADD PRIMARY KEY (`stateId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `city`
--
ALTER TABLE `city`
  MODIFY `cityId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `userId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `productId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `productcategory`
--
ALTER TABLE `productcategory`
  MODIFY `ProductCategoryID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `productorder`
--
ALTER TABLE `productorder`
  MODIFY `OrderId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `RoleId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `shop`
--
ALTER TABLE `shop`
  MODIFY `ShopId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `state`
--
ALTER TABLE `state`
  MODIFY `stateId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
